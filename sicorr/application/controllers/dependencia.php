<?php
	
	class Dependencia_controller extends Controller {
		
		var $wrapper;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
		}

		/*----------------------------------*/

		private function _populate_usuarios( )
      {
         $data[0]='Seleccione';
         $pms = array('grupo_id'=>2);
         $usr = ORM::factory('usuario')->where($pms)->order_by(array('id'=>'DESC'))->find_all( );
         foreach($usr as $u)
         {
            $data[$u->id] = $u->nombres . " " . $u->apellidos;
         }
         return $data;
      }

		public function index( )
		{
			$data = array( );
         $content = new View('dependencia/index');
			$dependencias = ORM::factory('dependencia')->find_all( );
         foreach($dependencias as $d)
         {
            $data[] = array(
               'id' 			=> $d->id,
			      'direccion' => $d->direccion,
			      'siglas'    => $d->siglas,
			      'director'  => $d->usuario->nombres." ".$d->usuario->apellidos,
			      'color'     => $d->color
            );
         }
			$content->dependencias = $data;
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
		}
		
		public function nuevo( )
		{
			$content = new View('dependencia/form');
			$this->wrapper->prototype = 1;
			$this->wrapper->js = array('jscolor/jscolor','dependencia');
         $content->usuarios = $this->_populate_usuarios( );
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
			
		}

      public function guardar($id=FALSE)
		{
			extract($_POST);		
			/* si el id es falso significa que es un registro nuevo */
			if ($id==FALSE) $depen = ORM::factory('dependencia',FALSE);
			/* de lo contrario se va actualizar un registro */
			else $depen = ORM::factory('dependencia')->find($id);
			$depen->direccion = $direccion;
			$depen->siglas    = $siglas;
			$depen->usuario_id= $usuario_id;
			$depen->color	   = $color;        	
			$depen->save( );
			//------------------------------------------
			$this->session->set_flash('msj','Registro Guardado');
			url::redirect('dependencia');
		}
	
	   public function editar($id)
		{
			$content = new View('dependencia/form');
			$depen = ORM::factory('dependencia')->find($id);
			$content->id 			= $depen->id;
			$content->direccion  = $depen->direccion;
			$content->siglas     = $depen->siglas;
         $content->usuarios   = $this->_populate_usuarios( );
         $content->usuario_id = $depen->usuario_id;
			$content->color      = $depen->color;
			$this->wrapper->content = $content;
			$this->wrapper->prototype = 1;
			$this->wrapper->js = array('jscolor/jscolor','dependencia');
			$this->wrapper->render(TRUE);
		}
	
		// REST
	
		public function eliminar($id)
		{
			$depen = ORM::factory('dependencia')->find($id);
			$depen->delete( );
			//-------------------------------------------
			$this->session->set_flash('msj','Registro Eliminado');
		   url::redirect('dependencia');
      }
         
 }

// End Login
