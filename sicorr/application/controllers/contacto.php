<?php
	
	class Contacto_controller extends Controller {
		
		var $wrapper;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
		}

		/*----------------------------------*/

		private function _get_organismos( )
		{
			$data = array('0'=>'Seleccione');
			$organismos = ORM::factory('organismo')->find_all( );
			foreach($organismos as $o) $data[$o->id] = $o->descripcion;
			return $data;
		}

		public function index( )
		{
         if (!isset($_SESSION['grupo_id'])) { url::redirect('login'); return; }
			$content = new View('contacto/index');
			$contac = ORM::factory('contacto')->find_all( )->as_array( );
			$content->contacto = $contac;
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
		}
		
		public function nuevo( )
		{
			$content = new View('contacto/form');
         $this->wrapper->prototype = 1;
         $this->wrapper->js = array('contacto');
			$content->organismos= $this->_get_organismos( );
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);	
		}		

		//public function editar($id)
		//{
			//$content = new View('correspondencia/form');
			//$corr = ORM::factory('correspondencia')->find($id);
			//$content->id 					= $corr->id;
			//$content->fecha_recibido   = $corr->fecha_recibido;
			//$content->fecha_oficio     = $corr->fecha_oficio;
			//$content->nro_oficio       = $corr->nro_oficio;
			//$content->descripcion      = $corr->descripcion;
			//$content->organismo_id	   = $usu->organismo_id;
			//$content->asunto           = $corr->asunto;
			//$this->wrapper->content    = $content;
			//$this->wrapper->render(TRUE);
	//	}
		
		public function guardar($id=FALSE)
		{
			extract($_POST);
			// $id 				 	 = $_POST['id'];
			// $descripcion  = $_POST['descripcion'];
			// $siglas			 = $_POST['siglas']

			/* si el id es falso significa que es un registro nuevo */
			if ($id==FALSE) $contac = ORM::factory('contacto',FALSE);
			/* de lo contrario se va actualizar un registro */
			else $contac = ORM::factory('contacto')->find($id);
			$contac->descripcion            = $descripcion;
			$contac->organismo_id         = $organismo_id;
			$contac->cargo                  = $cargo;
			$contac->representante          = $representante;
			$contac->telefono_celular	    = $telefono_celular;
			$contac->telefono_oficina      	= $telefono_oficina;
			$contac->email               	= $email;
			$contac->save( );
			//------------------------------------------
			$this->session->set_flash('msj','Registro Guardado');
			url::redirect('contacto');
		}
	
	   public function editar($id)
		{
			$content = new View('contacto/form');
			$contac = ORM::factory('contacto')->find($id);
			$content->id 					= $contac->id;
			$content->descripcion           = $contac->descripcion;
			$content->organismos			= $this->_get_organismos( );
			$content->organismo_id			= $contac->organismo_id;
			$content->cargo                 = $contac->cargo;
			$content->representante         = $contac->representante;
			$content->telefono_celular      = $contac->telefono_celular;
			$content->telefono_oficina      = $contac->telefono_oficina;
			$content->email                 = $contac->email;
			
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
		}
	
		// REST
	
		public function eliminar($id)
		{
			$contac = ORM::factory('contacto')->find($id);
			$contac->delete( );
			//-------------------------------------------
		   $this->session->set_flash('msj','Registro Eliminado');
		   url::redirect('contacto');

		
      }

}
// End Login
