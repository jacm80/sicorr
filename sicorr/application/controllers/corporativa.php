<?php
	
	class Corporativa_controller extends Controller {
		
		var $wrapper;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
		}

		/*----------------------------------*/

	
		public function index( )
		{
         $content = new View('corporativa/index');
			$corres  = ORM::factory('correspondencia')
                                          ->where(array('para_corporativa'=>1))
                                          ->find_all( );
         $data = array( );
         foreach($corres as $c)
         {
            $data[ ] = array(
                              'id'                 => $c->id,
                              'fecha_recibido'     => $c->fecha_recibido,
                              'fecha_oficio'       => $c->fecha_oficio,
                              'nro_oficio'         => $c->nro_oficio,
                              'asunto'             => $c->asunto,
                              'contacto'           => $c->contacto->descripcion,
                              'suscrito'           => $c->suscrito,
                              'motivo_corporativa' => $c->motivo_corporativa,
                              'enviada'            => $c->enviada
                            );
         }
			$content->correspondencias = $data;
         $this->wrapper->prototype = 1;
         $this->wrapper->js = array('modalbox/modalbox','corporativa');
         $this->wrapper->estilos = array('modalbox');
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
		}
		

      public function motivo( )
      {
			$content = new View('corporativa/form-motivo');
         $content->render(TRUE);
      }
	
      public function guardar_motivo( )
      {
         $corr = ORM::factory('correspondencia')->find($_POST['xid']);
         $corr->motivo_corporativa = $_POST['motivo'];
         $corr->save( );
         echo "{ 'success' : true }";
      }

      public function  cambiar_estatus( )
      {
         //echo kohana::debug($_POST);
         $corr = ORM::factory('correspondencia')->find($_POST['xid']);
         $corr->enviada = $_POST['enviada'];
         $corr->save( );
      }

}
// End Login
