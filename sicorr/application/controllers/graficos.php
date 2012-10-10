<?php
	
	class Graficos_controller extends Controller {
		
		var $wrapper;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
		}

      private function _set_graphic_lib()
      {
         $this->wrapper->js = array('amcharts/amcharts','graficos');
      }
	
		public function index( )
		{
			$content = new View('graficos/index');
			$this->wrapper->content = $content;
			//$this->wrapper->prototype = 1;
			$this->_set_graphic_lib( );
			$this->wrapper->render(TRUE);
		}
}
// End Login
