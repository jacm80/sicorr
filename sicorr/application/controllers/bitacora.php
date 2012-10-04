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

      private function _populate_usuarios( )
      {
         $data[0]='Todos';
         $pms = array('grupo_id'=>2);
         $usr = ORM::factory('usuario')->where($pms)->order_by(array('id'=>'DESC'))->find_all( );
         foreach($usr as $u)
         {
            $data[$u->id] = $u->nombres . " " . $u->apellidos;
         }
         return $data;
      }


      private function _get_bitacora( )
      {
         $bitacora = ORM::factory('bitacora')->order_by('id','DESC')->find_all( );
         return $bitacora->as_array( );
      }

		public function index( )
		{
			$this->wrapper->prototype = 1;
			$content = new View('bitacora/index');
         $content->bitacora = $this->_get_bitacora( );
         $content->usuarios = $this->_populate_usuarios( );
			$this->wrapper->content = $content;
			$this->wrapper->js = array('calendar','bitacora');
			$this->wrapper->estilos = array('calendar');         
			$this->wrapper->render(TRUE);
		}

      public function vaciar_bitacora( )
      {
         $this->db->query('TRUNCATE table bitacora');
         Utils::guardar_bitacora('Vaciar la tabla bitacora');
         url::redirect('bitacora');
      }
      
      public function filtrar( )
      {
         extract($_POST);
         // construyendo el query ------------------------------------
         $query = "SELECT * FROM bitacora";
         if (($usuario_id!=0) OR ($fecha!="")) $query.=" WHERE ";      
         if ($usuario_id!=0) $query .= " usuario_id=$usuario_id";
         if (($usuario_id!=0) AND ($fecha!="")) $query.=" AND ";
         if ($fecha!="")     $query .= " fechahora>='$fecha'";
         $query.= " ORDER BY id DESC";
         if ($nreg>0)        $query .= " LIMIT $nreg";
         //------------------------------------------------------------
         $bitacora_rs = $this->db->query($query);
         $bitacora = array( );
         //------------------------------------------------------------
         foreach($bitacora_rs as $b)
         {
            $bitacora[ ] = array(
                                 'id'              => $b->id,
                                 'descripcion'     => $b->descripcion,
                                 'fechahora'       => $b->fechahora,
                                 'nombre_usuario'  => $b->nombre_usuario
                                 );
            
         }
         //------------------------------------------------------------
         $tmp = new View('bitacora/grid');
         $tmp->bitacora = $bitacora;
         $tmp->render(TRUE);
      }

	}	
	
		
// End Bitacora
