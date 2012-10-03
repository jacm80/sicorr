<?php
	
	class Menu_controller extends Controller {
		
		var $view;

		public function __construct( )
		{
			parent::__construct( );
			$this->view = new View('wrapper');
			$this->session = Session::instance( );
		}

		/*----------------------------------*/
		public function index( )
		{
			$content = new View('menu/index');
			//$this->view->estilos = array('menu_style');
			$this->view->content = $content;
			$this->view->render(TRUE);
		}
		
		
		
}


// End Login
