<?php
	
	class Login_controller extends Controller {
		
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
			$content = new View('login/index');
			$this->wrapper->prototype = 1;
			$this->wrapper->js = array('login');
			$this->view->content = $content;
			$this->view->render(TRUE);
		}
		
		public function login( )
		{
			extract($_POST);
			$params = array('usuario'=>$usuario,'password'=>sha1($password));
			$user = ORM::factory('usuario');
			$user->where($params)->find( );
			if (!empty($user->usuario))
			{
				$this->session->create( );
				$this->session->set('user_id',$user->id);
				$this->session->set('user_name',$user->nombres ." " .$user->apellidos);
				$this->session->set('grupo_id',$user->grupo_id);
				$this->session->set('user_grupo',$user->grupo->descripcion);
            Utils::guardar_bitacora('Login del Sistema');
				if ( $_SESSION['grupo_id'] < 3 ) url::redirect('buzon');
				else url::redirect('correspondencia/nuevo');
			}
			else 
			{
				url::redirect('login');
			}
		}

		public function logout( )
		{
         Utils::guardar_bitacora('Salida del Sistema');
			$this->session->destroy( );
			url::redirect('login');
		}	


		/*------------------------------------*/
	}


// End Login
