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
                              'id'             => $c->id,
                              'fecha_recibido' => $c->fecha_recibido,
                              'fecha_oficio'   => $c->fecha_oficio,
                              'nro_oficio'     => $c->nro_oficio,
                              'asunto'         => $c->asunto,
                              'contacto'       => $c->contacto->descripcion,
                              'suscrito'       => $c->suscrito
                            );
         }
			$content->correspondencias = $data;
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
		}
		
	
}
// End Login
