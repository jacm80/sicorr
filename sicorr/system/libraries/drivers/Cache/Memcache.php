<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Memcache-based Cache driver.
 *
 * $Id$
 *
 * @package    Cache
 * @author     Kohana Team
 * @copyright  (c) 2007-2009 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Cache_Memcache_Driver extends Cache_Driver {
	protected $config;
	protected $backend;
	protected $flags;

	public function __construct($config)
	{
		if ( ! extension_loaded('memcache'))
			throw new Kohana_Exception('cache.extension_not_loaded', 'memcache');
		
		ini_set('memcache.allow_failover', (int) $config['allow_failover']);
		
		$this->config = $config;
		$this->backend = new Memcache;
				
		$this->flags = $config['compression'] ? MEMCACHE_COMPRESSED : FALSE;

		foreach ($config['servers'] as $server)
		{
			// Make sure all required keys are set
			$server += array('host' => '127.0.0.1',
			                 'port' => 11211,
			                 'persistent' => FALSE,
			                 'weight' => 1,
			                 'timeout' => 1,
			                 'retry_interval' => 15
			);

			// Add the server to the pool
			$this->backend->addServer($server['host'], $server['port'], (bool) $server['persistent'], (int) $server['weight'], (int) $server['timeout'], (int) $server['retry_interval'], TRUE, array($this,'_memcache_failure_callback'));
		}
	}

	public function _memcache_failure_callback($host, $port)
	{
		$this->backend->setServerParams($host, $port, 1, -1, FALSE);
		Kohana_Log::add('error', __('Cache: Memcache server down: :host:::port:',array(':host:' => $host,':port:' => $port)));
	}
	
	public function set($items, $tags = NULL, $lifetime = NULL)
	{
		if ($lifetime !== 0)
		{
			// Memcache driver expects unix timestamp
			$lifetime += time();
		}
		
		if ($tags !== NULL)
		{
			Kohana_Log::add('debug', __('Cache: Memcache driver does not support tags'));
		}

		foreach ($items as $key => $value)
		{
			if ( ! $this->backend->set($key, $value, $this->flags, $lifetime))
			{
				return FALSE;
			}
		}
		
		return TRUE;
	}
	
	public function get($keys, $single = FALSE)
	{
		$items = $this->backend->get($keys);
		
		if ($single)
		{
			return ($items = FALSE OR count($items) > 0) ? current($items) : NULL;
		}
		else
		{
			return ($items = FALSE) ? $items : NULL;
		}
	}
	
	/**
	 * Get cache items by tag 
	 */
	public function get_tag($tags)
	{
		Kohana_Log::add('debug', __('Cache: Memcache driver does not support tags'));
		return NULL;
	}

	/**
	 * Delete cache item by key 
	 */
	public function delete($keys)
	{
		foreach ($keys as $key)
		{
			if ( ! $this->backend->delete($key))
			{
				return FALSE;
			}
		}

		return TRUE;
	}

	/**
	 * Delete cache items by tag 
	 */
	public function delete_tag($tags)
	{
		Kohana_Log::add('debug', __('Cache: Memcache driver does not support tags'));
		return NULL;
	}
	
	/**
	 * Empty the cache
	 */
	public function delete_all()
	{
		return $this->backend->flush();
	}
} // End Cache Memcache Driver
