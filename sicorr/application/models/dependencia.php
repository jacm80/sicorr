<?php

	class Dependencia_Model extends ORM 
	{
		protected $has_many = array('correspondencia');
		protected $belongs_to = array('usuario');
	}	

// End Usuario
