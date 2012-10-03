<?php


	class Bitacora_controller extends Controller {
		
		var $wrapper;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
         $this->db = Database::instance( );
		}

		/*----------------------------------*/

      private function _get_bitacora($nfilas="todos")
      {
         if ($nfilas=='todos')
            $bitacora = ORM::factory('bitacora')->order_by('id','DESC')->find_all( );
         else
            $bitacora = ORM::factory('bitacora')->order_by('id','DESC')->limit($nfilas)->find_all( );
         return $bitacora->as_array( );
      }

		public function index( )
		{
			$this->wrapper->prototype = 1;
			$content = new View('bitacora/index');
         $content->bitacora = $this->_get_bitacora( );
			$this->wrapper->content = $content;
			//$this->wrapper->js = array('calendar','reporte');
			$this->wrapper->render(TRUE);
		}

      public function vaciar_bitacora( )
      {
         $this->db->query('TRUNCATE table bitacora');
         Utils::guardar_bitacora('Vaciar la tabla bitacora');
         url::redirect('bitacora');
      }


	}	
	
		
// End Login
