<?php defined('SYSPATH') or die('No direct script access.');
/**
 * ORM Validation exceptions.
 * 
 * $Id: ORM_Validation_Exception.php 4536 2009-09-03 20:10:01Z nodren $
 * 
 * @package    Kohana
 * @author     Kohana Team
 * @copyright  (c) 2008-2009 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class ORM_Validation_Exception_Core extends Database_Exception {
	
	/**
	 * Handles Database Validation Exceptions
	 * 
	 * @param Validation $array
	 * @return 
	 */
	public static function handle_validation($table, Validation $array) 
	{
		$exception = new ORM_Validation_Exception('ORM Validation has failed for :table model',array(':table'=>$table));
		$exception->validation = $array;
		throw $exception;
	} 
} // End ORM_Validation_Exception