<?php
	class Denegado_controller extends Controller {

      
		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
		}

		public function index( )
		{
			$content = new View('denegado/index');
			$content->render(TRUE); 
		}

	}

?>
