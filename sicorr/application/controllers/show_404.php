<?php
	class show_404_Controller extends Controller {

      
		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
		}

		public function index( )
		{
			$content = new View('custom_404');
			$content->render(TRUE); 
		}

	}

?>
