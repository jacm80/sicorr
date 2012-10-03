<?php

	class Adjunto_Model extends ORM 
	{ 
		protected $belongs_to = array('correspondencia','usuario','estatus_adjunto');
	}	

// End Usuario
