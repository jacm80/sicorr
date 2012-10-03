<?php
	
	class Usuario_controller extends Controller {
		
		var $wrapper;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
		}
      /*----------------------------------*/
		private function _get_grupos( )
		{
			$h[0]='Seleccione';
			$grupos = ORM::factory('grupo')->find_all( );
			foreach($grupos as $g) { $h[$g->id] = $g->descripcion; }
			return $h;
		}
		
		public function index( )
		{
			$content = new View('usuario/index');
			$usuarios = ORM::factory('usuario')->find_all( )->as_array( );
			$content->usuarios = $usuarios;
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
		}
		
		public function nuevo( )
		{
			$content = new View('usuario/form');
			$this->wrapper->prototype = 1;
			$this->wrapper->js = array('usuario');
			$grupos = ORM::factory('grupo')->find_all( );
			$content->grupos = $this->_get_grupos( );
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
		}
		
		public function editar($id)
		{
			$content = new View('usuario/form');
			$usu = ORM::factory('usuario')->find($id);
			$content->id 				= $usu->id;
			$content->usuario           = $usu->usuario;
			$content->nombres			= $usu->nombres;
			$content->apellidos			= $usu->apellidos;
			$content->cedula 			= $usu->cedula;
			$content->password			= $usu->password;
			$content->grupo_id			= $usu->grupo_id;
			$content->grupos = $this->_get_grupos( );
			$this->wrapper->content = $content;
			$this->wrapper->prototype = 1;
			$this->wrapper->js = array('usuario');
			$this->wrapper->render(TRUE);
		}
		
		public function guardar($id=FALSE)
		{
			extract($_POST);
			// $id 				 	 = $_POST['id'];
			// $descripcion  = $_POST['descripcion'];
			// $siglas			 = $_POST['siglas']

			/* si el id es falso significa que es un registro nuevo */
			if ($id==FALSE) $usu = ORM::factory('usuario',FALSE);
			/* de lo contrario se va actualizar un registro */
			else $usu = ORM::factory('usuario')->find($id);
			$usu->usuario = $usuario;
			$usu->nombres = $nombres;
			$usu->apellidos = $apellidos;
			$usu->cedula 	= $cedula;
			$usu->password = sha1($password);
         $usu->grupo_id = $grupo_id;
			//$content->confirmar_password= $usu->confirmar_password;
			$usu->save( );
			//------------------------------------------
			$this->session->set_flash('msj','Registro Guardado');
			url::redirect('usuario');
		}
	
		// REST
	
		public function eliminar($id)
		{
			$usu = ORM::factory('usuario')->find($id);
			$usu->delete( );
			//-------------------------------------------
			$this->session->set_flash('msj','Registro Eliminado');
			url::redirect('usuario');
		}
	}
	

// End Login
