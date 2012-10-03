<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Database builder
 *
 * @package    Kohana
 * @author     Kohana Team
 * @copyright  (c) 2008-2009 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Database_Builder_Core {

	// Valid ORDER BY directions
	protected $order_directions = array('ASC', 'DESC', 'RAND()');

	// Database object
	protected $db;

	// Builder members
	protected $select   = array();
	protected $from     = array();
	protected $join     = array();
	protected $where    = array();
	protected $group_by = array();
	protected $having   = array();
	protected $order_by = array();
	protected $limit    = NULL;
	protected $offset   = NULL;
	protected $set      = array();
	protected $columns  = array();
	protected $values   = array();
	protected $type;

	// TTL for caching (using Cache library)
	protected $ttl      = FALSE;

	public function __construct($db = 'default')
	{
		$this->db = $db;
	}

	/**
	 * Resets all query components
	 */
	public function reset()
	{
		$this->select   = array();
		$this->from     = array();
		$this->join     = array();
		$this->where    = array();
		$this->group_by = array();
		$this->having   = array();
		$this->order_by = array();
		$this->limit    = NULL;
		$this->offset   = NULL;
		$this->set      = array();
		$this->values   = array();
	}

	public function __toString()
	{
		return $this->compile();
	}

	/**
	 * Compiles the builder object into a SQL query
	 *
	 * @return string  Compiled query
	 */
	protected function compile()
	{
		if ( ! is_object($this->db))
		{
			// Use default database for compiling to string if none is given
			$this->db = Database::instance($this->db);
		}

		if ($this->type === Database::SELECT)
		{
			// SELECT columns FROM table
			$sql = 'SELECT '.$this->compile_select()."\n".'FROM '.$this->compile_from();
		}
		elseif ($this->type === Database::UPDATE)
		{
			$vals = array();
			foreach ($this->set as $key => $val)
			{
				if (is_string($key))
				{
					// Column = Value
					$vals[] = $key.' = '.$val;
				}
				else
				{
					// Database_Expression
					$vals[] = $val;
				}
			}

			$sql = 'UPDATE '.$this->compile_from()."\n".'SET '.$this->compile_set();
		}
		elseif ($this->type === Database::INSERT)
		{
			$values = array();
			foreach ($this->values as $group)
			{
				// Loop thru each set of values to be inserted
				$values[] = '('.implode(', ', array_map(array($this->db, 'quote'), $group)).')';
			}

			$sql = 'INSERT INTO '.$this->compile_from()."\n".
				   '('.implode(', ', $this->columns).')'."\n".
				   'VALUES '.implode(', ', $values);
		}
		elseif ($this->type === Database::DELETE)
		{
			$sql = 'DELETE FROM '.$this->compile_from();
		}

		if ( ! empty($this->join))
		{
			$sql .= $this->compile_join();
		}

		if ( ! empty($this->where))
		{
			$sql .= "\n".'WHERE '.$this->compile_conditions($this->where);
		}

		if ( ! empty($this->having))
		{
			$sql .= "\n".'HAVING '.$this->compile_conditions($this->having);
		}

		if ( ! empty($this->group_by))
		{
			$sql .= "\n".'GROUP BY '.$this->compile_group_by();
		}

		if ( ! empty($this->order_by))
		{
			$sql .= "\nORDER BY ".$this->compile_order_by();
		}

		if (is_int($this->limit))
		{
			$sql .= "\nLIMIT ".$this->limit;
		}

		if (is_int($this->offset))
		{
			$sql .= "\nOFFSET ".$this->offset;
		}

		return $sql;
	}

	/**
	 * Compiles the SELECT portion of the query
	 *
	 * @return string
	 */
	protected function compile_select()
	{
		$vals = array();

		foreach ($this->select as $name => $alias)
		{
			if (is_string($name))
			{
				$vals[] = $this->db->quote_column(array($name => $alias));
			}
			else
			{
				$vals[] = $this->db->quote_column($alias);
			}
		}

		return implode(', ', $vals);
	}

	/**
	 * Compiles the FROM portion of the query
	 *
	 * @return string
	 */
	protected function compile_from()
	{
		$vals = array();

		foreach ($this->from as $name => $alias)
		{
			if (is_string($name))
			{
				// Using AS format so escape both
				$vals[] = $this->db->quote_table(array($name => $alias));
			}
			else
			{
				// Just using the table name itself
				$vals[] = $this->db->quote_table($alias);
			}
		}

		return implode(', ', $vals);
	}

	/**
	 * Compiles the JOIN portion of the query
	 *
	 * @return string
	 */
	protected function compile_join()
	{
		$sql = '';
		foreach ($this->join as $join)
		{
			list($table, $keys, $type) = $join;

			if ($type !== NULL)
			{
				// Join type
				$sql .= ' '.$type;
			}

			$sql .= ' JOIN '.$table;

			$condition = '';
			if ($keys instanceof Database_Expression)
			{
				// ON conditions are a Database_Expression, so parse it
				$condition = $keys->parse($this->db);
			}
			elseif (is_array($keys))
			{
				// ON condition is an array of table column matches
				foreach ($keys as $key => $value)
				{
					if ( ! empty($condition))
					{
						$condition .= ' AND ';
					}

					$condition .= $this->db->quote_column($key).' = '.$this->db->quote_column($value);
				}
			}

			if ( ! empty($condition))
			{
				// Add ON condition
				$sql .= ' ON ('.$condition.')';
			}
		}

		return $sql;
	}

	/**
	 * Compiles the GROUP BY portion of the query
	 *
	 * @return string
	 */
	protected function compile_group_by()
	{
		$vals = array();

		foreach ($this->group_by as $column)
		{
			// Escape the column
			$vals[] = $this->db->quote_column($column);
		}

		return implode(', ', $vals);
	}

	/**
	 * Compiles the ORDER BY portion of the query
	 *
	 * @return string
	 */
	public function compile_order_by()
	{
		$ordering = array();

		foreach ($this->order_by as $column => $order_by)
		{
			list($column, $direction) = each($order_by);

			$column = $this->db->quote_column($column);

			if ($direction !== NULL)
			{
				$direction = ' '.$direction;
			}

			$ordering[] = $column.$direction;
		}

		return implode(', ', $ordering);
	}

	/**
	 * Compiles the SET portion of the query for UPDATE
	 *
	 * @return string
	 */
	public function compile_set()
	{
		$vals = array();
		foreach ($this->set as $key => $value)
		{
			$key = $this->db->quote_column($key);

			if ($value instanceof Database_Expression)
			{
				// Parse Database_Expressions
				$value = $value->parse($this->db);
			}
			else
			{
				// Just quote the value
				$value = $this->db->quote($value);
			}

			// Using an UPDATE so Key = Val
			$vals[] = $key.' = '.$value;
		}

		return implode(', ', $vals);
	}

	/**
	 * Join tables to the builder
	 *
	 * @param  mixed   Table name or Database_Expression, or an array of them
	 * @param  mixed   Key, or an array of key => value pair, for join condition (can be a Database_Expression)
	 * @param  mixed   Value if $keys is not an array or Database_Expression
	 * @param  string  Join type (LEFT, RIGHT, INNER, etc.)
	 * @return Database_Builder
	 */
	public function join($table, $keys, $value = NULL, $type = NULL)
	{
		if (is_string($keys))
		{
			$keys = array($keys => $value);
		}

		if ($type !== NULL)
		{
			$type = strtoupper($type);
		}

		$this->join[] = array($table, $keys, $type);

		return $this;
	}

	/**
	 * Add tables to the FROM portion of the builder
	 *
	 * @param  mixed  Table name or an array of tables (Key => Val results in 'Key AS Val')
	 * @return Database_Builder
	 */
	public function from($tables)
	{
		if ( ! is_array($tables))
		{
			$tables = func_get_args();
		}

		$this->from = array_merge($this->from, $tables);

		return $this;
	}

	/**
	 * Add fields to the GROUP BY portion
	 *
	 * @param  mixed  Field names or an array of fields
	 * @return Database_Builder
	 */
	public function group_by($columns)
	{
		if ( ! is_array($columns))
		{
			$columns = func_get_args();
		}

		$this->group_by = array_merge($this->group_by, $columns);

		return $this;
	}

	/**
	 * Add conditions to the HAVING clause (AND)
	 *
	 * @param  mixed   Column name or array of columns => vals
	 * @param  string  Operation to perform
	 * @param  mixed   Value
	 * @return Database_Builder
	 */
	public function having($columns, $op = '=', $value = NULL)
	{
		return $this->and_having($columns, $op, $value);
	}

	/**
	 * Add conditions to the HAVING clause (AND)
	 *
	 * @param  mixed   Column name or array of columns => vals
	 * @param  string  Operation to perform
	 * @param  mixed   Value
	 * @return Database_Builder
	 */
	public function and_having($columns, $op = '=', $value = NULL)
	{
		$this->having[] = array('AND' => array($columns, $op, $value));
		return $this;
	}

	/**
	 * Add conditions to the HAVING clause (OR)
	 *
	 * @param  mixed   Column name or array of columns => vals
	 * @param  string  Operation to perform
	 * @param  mixed   Value
	 * @return Database_Builder
	 */
	public function or_having($columns, $op = '=', $value = NULL)
	{
		$this->having[] = array('OR' => array($columns, $op, $value));
		return $this;
	}

	/**
	 * Add fields to the ORDER BY portion
	 *
	 * @param  mixed   Field names or an array of fields (field => direction)
	 * @param  string  Direction or NULL for ascending
	 * @return Database_Builder
	 */
	public function order_by($columns, $direction = NULL)
	{
		if (is_string($columns))
		{
			$columns = array($columns => $direction);
		}

		$this->order_by[] = $columns;

		return $this;
	}

	/**
	 * Limit rows returned
	 *
	 * @param  int  Number of rows
	 * @return Database_Builder
	 */
	public function limit($number)
	{
		$this->limit = (int) $number;

		return $this;
	}

	/**
	 * Offset into result set
	 *
	 * @param  int  Offset
	 * @return Database_Builder
	 */
	public function offset($number)
	{
		$this->offset = (int) $number;

		return $this;
	}

	public function left_join($table, $keys, $value = NULL)
	{
		return $this->join($table, $keys, $value, 'LEFT');
	}

	public function right_join($table, $keys, $value = NULL)
	{
		return $this->join($table, $keys, $value, 'RIGHT');
	}

	public function inner_join($table, $keys, $value = NULL)
	{
		return $this->join($table, $keys, $value, 'INNER');
	}

	public function outer_join($table, $keys, $value = NULL)
	{
		return $this->join($table, $keys, $value, 'OUTER');
	}

	public function full_join($table, $keys, $value = NULL)
	{
		return $this->join($table, $keys, $value, 'FULL');
	}

	public function left_inner_join($table, $keys, $value = NULL)
	{
		return $this->join($table, $keys, $value, 'LEFT INNER');
	}

	public function right_inner_join($table, $keys, $value = NULL)
	{
		return $this->join($table, $keys, $value, 'RIGHT INNER');
	}

	public function open($clause = 'WHERE')
	{
		return $this->and_open($clause);
	}

	public function and_open($clause = 'WHERE')
	{
		if ($clause === 'WHERE')
		{
			$this->where[] = array('AND' => '(');
		}
		else
		{
			$this->having[] = array('AND' => '(');
		}

		return $this;
	}

	public function or_open($clause = 'WHERE')
	{
		if ($clause === 'WHERE')
		{
			$this->where[] = array('OR' => '(');
		}
		else
		{
			$this->having[] = array('OR' => '(');
		}

		return $this;
	}

	public function close($clause = 'WHERE')
	{
		if ($clause === 'WHERE')
		{
			$this->where[] = array(')');
		}
		else
		{
			$this->having[] = array(')');
		}

		return $this;
	}

	/**
	 * Add conditions to the WHERE clause (AND)
	 *
	 * @param  mixed   Column name or array of columns => vals
	 * @param  string  Operation to perform
	 * @param  mixed   Value
	 * @return Database_Builder
	 */
	public function where($columns, $op = '=', $value = NULL)
	{
		return $this->and_where($columns, $op, $value);
	}

	/**
	 * Add conditions to the WHERE clause (AND)
	 *
	 * @param  mixed   Column name or array of columns => vals
	 * @param  string  Operation to perform
	 * @param  mixed   Value
	 * @return Database_Builder
	 */
	public function and_where($columns, $op = '=', $value = NULL)
	{
		$this->where[] = array('AND' => array($columns, $op, $value));
		return $this;
	}

	/**
	 * Add conditions to the WHERE clause (OR)
	 *
	 * @param  mixed   Column name or array of columns => vals
	 * @param  string  Operation to perform
	 * @param  mixed   Value
	 * @return Database_Builder
	 */
	public function or_where($columns, $op = '=', $value = NULL)
	{
		$this->where[] = array('OR' => array($columns, $op, $value));
		return $this;
	}

	/**
	 * Compiles the given clause's conditions
	 *
	 * @param  array  Clause conditions
	 * @return string
	 */
	protected function compile_conditions($groups)
	{
		$last_condition = NULL;

		$sql = '';
		foreach ($groups as $group)
		{
			// Process groups of conditions
			foreach ($group as $logic => $condition)
			{
				if ($condition === '(')
				{
					if ( ! empty($sql) AND $last_condition !== '(')
					{
						// Include logic operator
						$sql .= ' '.$logic.' ';
					}

					$sql .= '(';
				}
				elseif ($condition === ')')
				{
					$sql .= ')';
				}
				else
				{
					list($columns, $op, $value) = $condition;

					// Stores each individual condition
					$vals = array();

					if ($columns instanceof Database_Expression)
					{
						// Parse Database_Expression and add to condition list
						$vals[] = $columns->parse($this->db);
					}
					else
					{
						$op = strtoupper($op);

						if ( ! is_array($columns))
						{
							$columns = array($columns => $value);
						}

						foreach ($columns as $column => $value)
						{
							if ($value instanceof Database_Expression)
							{
								// Parse Database_Expression for right side of operator
								$value = $value->parse($this->db);
							}
							elseif ($value instanceof Database_Builder)
							{
								// Using a subquery
								$value->db = $this->db;
								$value = '('.(string) $value.')';
							}
							elseif (is_array($value))
							{
								if ($op === 'BETWEEN' OR $op === 'NOT BETWEEN')
								{
									// Falls between two values
									$value = $this->db->quote($value[0]).' AND '.$this->db->quote($value[1]);
								}
								else
								{
									// Return as list
									$value = array_map(array($this->db, 'escape'), $value);
									$value = '('.implode(', ', $value).')';
								}
							}
							else
							{
								$value = $this->db->quote($value);
							}

							if ( ! empty($column))
							{
								// Ignore blank columns
								$column = $this->db->quote_column($column);
							}

							// Add to condition list
							$vals[] = $column.' '.$op.' '.$value;
						}
					}

					if ( ! empty($sql) AND $last_condition !== '(')
					{
						// Add the logic operator
						$sql .= ' '.$logic.' ';
					}

					// Join the condition list items together by the given logic operator
					$sql .= implode(' '.$logic.' ', $vals);
				}

				$last_condition = $condition;
			}
		}

		return $sql;
	}

	/**
	 * Set values for UPDATE
	 *
	 * @param  mixed   Column name or array of columns => vals
	 * @param  mixed   Value (can be a Database_Expression)
	 * @return Database_Builder
	 */
	public function set($keys, $value = NULL)
	{
		if (is_string($keys))
		{
			$keys = array($keys => $value);
		}

		$this->set = array_merge($keys, $this->set);

		return $this;
	}

	/**
	 * Columns used for INSERT queries
	 *
	 * @param  array  Columns
	 * @return Database_Builder
	 */
	public function columns($columns)
	{
		if ( ! is_array($columns))
		{
			$columns = func_get_args();
		}

		$this->columns = $columns;

		return $this;
	}

	/**
	 * Values used for INSERT queries
	 *
	 * @param  array  Values
	 * @return Database_Builder
	 */
	public function values($values)
	{
		if ( ! is_array($values))
		{
			$values = func_get_args();
		}

		$this->values[] = $values;

		return $this;
	}

	/**
	 * Create a SELECT query and specify selected columns
	 *
	 * @param  mixed   Column name or array of columns (can be in form Column => Alias)
	 * @return Database_Builder
	 */
	public function select($columns = NULL)
	{
		$this->type = Database::SELECT;

		if ($columns === NULL)
		{
			$columns = array('*');
		}
		elseif ( ! is_array($columns))
		{
			$columns = func_get_args();
		}

		$this->select = array_merge($this->select, $columns);

		return $this;
	}

	/**
	 * Create an UPDATE query
	 *
	 * @param  string  Table name
	 * @param  array   Array of Keys => Values
	 * @param  array   WHERE conditions
	 * @return Database_Builder
	 */
	public function update($table = NULL, $set = NULL, $where = NULL)
	{
		$this->type = Database::UPDATE;

		if (is_array($set))
		{
			$this->set(array_keys($set));
		}

		if ($where !== NULL)
		{
			$this->where($where);
		}

		if ($table !== NULL)
		{
			$this->from($table);
		}

		return $this;
	}

	/**
	 * Create an INSERT query.  Use 'columns' and 'values' methods for multi-row inserts
	 *
	 * @param  string  Table name
	 * @param  array   Array of Keys => Values
	 * @return Database_Builder
	 */
	public function insert($table = NULL, $set = NULL)
	{
		$this->type = Database::INSERT;

		if (is_array($set))
		{
			$this->columns(array_keys($set));
			$this->values(array_values($set));
		}

		if ($table !== NULL)
		{
			$this->from($table);
		}

		return $this;
	}

	/**
	 * Create a DELETE query
	 *
	 * @param  string  Table name
	 * @param  array   WHERE conditions
	 * @return Database_Builder
	 */
	public function delete($table, $where = NULL)
	{
		$this->type = Database::DELETE;

		if ($where !== NULL)
		{
			$this->where($where);
		}

		if ($table !== NULL)
		{
			$this->from($table);
		}

		return $this;
	}

	/**
	 * Count records for a given table
	 *
	 * @param  string  Table name
	 * @param  array   WHERE conditions
	 * @return int
	 */
	public function count_records($table = FALSE, $where = NULL)
	{
		if (count($this->from) < 1)
		{
			if ($table === FALSE)
				throw new Database_Exception('Database count_records requires a table');

			$this->from($table);
		}

		if ($where !== NULL)
		{
			$this->where($where);
		}

		// Grab the count AS records_found
		$result = $this->select(array('COUNT("*")' => 'records_found'))->execute();

		return $result->get('records_found');
	}

	/**
	 * Executes the built query
	 *
	 * @param  mixed  Database name or object
	 * @return Database_Result
	 */
	public function execute($db = NULL)
	{
		if ($db !== NULL)
		{
			$this->db = $db;
		}

		if ( ! is_object($this->db))
		{
			// Get the database instance
			$this->db = Database::instance($this->db);
		}

		$query = $this->compile();

		// Reset the query after executing
		$this->reset();

		if ($this->ttl !== FALSE AND $this->type === Database::SELECT)
		{
			// Return result from cache (only allowed with SELECT)
			return $this->db->query_cache($query, $this->ttl);
		}
		else
		{
			// Load the result (no caching)
			return $this->db->query($query);
		}
	}

	/**
	 * Set caching for the query
	 *
	 * @param  mixed  Time-to-live (FALSE to disable, NULL for Cache default, seconds otherwise)
	 * @return Database_Builder
	 */
	public function cache($ttl = NULL)
	{
		$this->ttl = $ttl;

		return $this;
	}

} // End Database_Builder
