<?php
	
	class Organismo_controller extends Controller {
		
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
			$content = new View('organismo/index');
			$organismos = ORM::factory('organismo')->find_all( )->as_array( );
			$content->organismos = $organismos;
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
		}

		public function nuevo( )
		{
			$content = new View('organismo/form');
			$this->wrapper->prototype = 1;
			$this->wrapper->js = array('organismo');
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
		}		

		public function editar($id)
		{
			$content = new View('organismo/form');
			$org = ORM::factory('organismo')->find($id);
			$content->id 					= $org->id;
			$content->descripcion = $org->descripcion;
			$content->siglas			= $org->siglas;
			$this->wrapper->content = $content;
			$this->wrapper->prototype = 1;
			$this->wrapper->js = array('organismo');
			$this->wrapper->render(TRUE);
		}
		
		public function guardar($id=FALSE)
		{
			extract($_POST);
			// $id 				 	 = $_POST['id'];
			// $descripcion  = $_POST['descripcion'];
			// $siglas			 = $_POST['siglas']

			/* si el id es falso significa que es un registro nuevo */
			if ($id==FALSE) $org = ORM::factory('organismo',FALSE);
			/* de lo contrario se va actualizar un registro */
			else $org = ORM::factory('organismo')->find($id);
			$org->descripcion = $descripcion;
			$org->siglas	  = $siglas;
			$org->save( );
			//------------------------------------------
			$this->session->set_flash('msj','Registro Guardado');
			url::redirect('organismo');
		}
	
		// REST
	
		public function eliminar($id)
		{
			$org = ORM::factory('organismo')->find($id);
			$org->delete( );
			//-------------------------------------------
			$this->session->set_flash('msj','Registro Eliminado');
			url::redirect('organismo');
		}
 
	}

   
// End Login
