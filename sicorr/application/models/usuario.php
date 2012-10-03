<?php

	class Usuario_Model extends ORM { 

		protected $has_many = array('adjunto','dependencia');
		protected $belongs_to = array('grupo');
	}	

// End Usuario
