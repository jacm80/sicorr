<?php

	class Correspondencia_Model extends ORM 
	{ 
		protected $belongs_to = array('contacto','dependencia');
		protected $has_many   = array('corrinstruccion','adjuntos');
	}	

// End Correspondencia
