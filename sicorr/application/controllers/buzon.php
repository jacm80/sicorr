<?php
	
	class Buzon_controller extends Controller {
		
		var $usuario_id;

		var $procesados;
		var $enproceso;
		var $nuevos;
		var $todos;
	
		var $wrapper;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
			$this->_pre_inbox( );
		}

		private function _pre_inbox( )
		{
         if (!isset($_SESSION['user_id'])) url::redirect('login/index');
			$i = 0;
			$buzon = array( ); 
			$corr = ORM::factory('correspondencia')->where(array('inactivo'=>0))->order_by('id','DESC')->find_all( );
			////////////////////////////////////////////////////////////////////////////////////////////////////////////
			foreach($corr as $c)
			{
				$buzon[$i] = array(
										'id'				  		=> $c->id,
										'fecha_recibido' 		=> $c->fecha_recibido,
										'nro_oficio'	  		=> $c->nro_oficio,
                              'archivo'            => $c->archivo,
										'contacto'		  		=> $c->contacto->descripcion,
										'asunto'			  		=> $c->asunto,
										'suscrito'		  		=> $c->suscrito,
                              'revisar'            => 0,
										'instrucciones'  		=> array( ),
										'instrucciones_keys' => array( ),
										'adjuntos'		  		=> array( )
										);
				//---------------------------------------------------------------------------------------------------------
            $buzon[$i]['instrucciones'] = Utils::cargar_instrucciones($c->id);	    	
            //---------------------------------------------------------------------------------------------------------
				
				$adjuntos = ORM::factory('adjunto')->where(array('correspondencia_id'=>$c->id))->find_all( );
				$estatusadjuntos = ORM::factory('estatus_adjunto')->find_all( );
            
            $estatus_adjuntos=array();
            
            foreach($estatusadjuntos as $ea)
            {
               $estatus_adjuntos[$ea->id] = $ea->descripcion;
            }


            foreach ($adjuntos as $ad)
				{
               $ultima_revision  = $ad->ultima_revision;
               $ultima_respuesta = $ad->ultima_respuesta;

               if ($ad->ultima_revision  == '0000-00-00 00:00:00') $ultima_revision  ='1950-01-01 00:00:00'; 
               if ($ad->ultima_respuesta == '0000-00-00 00:00:00') $ultima_respuesta ='1950-01-01 00:00:00';
 
					if ($ad->ultima_respuesta > $ultima_revision) $buzon[$i]['revisar'] = 1;

               $dependencia = ORM::factory('dependencia')->where(array('usuario_id'=>$ad->usuario->id))->find( );
					$h_adjunto = array(
												'id'			=> $ad->id,
												'archivo'   => $ad->archivo,
												'director'  => $ad->usuario->nombres . " " . $ad->usuario->apellidos,
												'dependencia_id'  => $dependencia->id,
                                    'direccion'       => $dependencia->direccion,
												'siglas' 	      => $dependencia->siglas,
                                    'color'           => $dependencia->color,
												'mensaje'         => $ad->mensaje,
                                    'respuesta'       => $ad->respuesta,
                                    'estatus_id'      => $ad->estatus_adjunto_id,
                                    'estatus_desc'    => $ad->estatus_adjunto->descripcion,
                                    'estatus_adjuntos'=> $estatus_adjuntos
											);
					if      ($_SESSION['grupo_id']==1) 					  $buzon[$i]['adjuntos'][ ] = $h_adjunto;
					else if ($_SESSION['user_id'] == $ad->usuario_id) $buzon[$i]['adjuntos'][ ] = $h_adjunto;				
				}
				//----------------------------------------------------------------------------------------
				$c_instrucciones = count($buzon[$i]['instrucciones']);
				$c_adjuntos		  = count($buzon[$i]['adjuntos']);
				//////////////////////////////////////////////////////////////////////////////////////////
				if (($c_instrucciones > 0)  AND ($c_adjuntos > 0))  $buzon[$i]['estatus'] = 'Procesado';
				if (($c_instrucciones > 0)  AND ($c_adjuntos < 1))  $buzon[$i]['estatus'] = 'En Proceso'; 
				if (($c_instrucciones == 0) AND ($c_adjuntos == 0)) $buzon[$i]['estatus'] = 'Nuevo'; 
				//////////////////////////////////////////////////////////////////////////////////////////
				$i++;
			}
			$this->_order_status($buzon);
		}

		private function _order_status($buzon)
		{
			$this->procesados	= array( );
			$this->enproceso	= array( );
			$this->nuevos 		= array( );
			$this->todos 		= array( );
			///////////////////////////////////////////////////////////////////////
			foreach ($buzon as $b)
			{
				if ( $b['estatus'] == 'Procesado'  ) $this->procesados[ ] = $b;
				if ( $b['estatus'] == 'En Proceso' ) $this->enproceso[ ]  = $b;
				if ( $b['estatus'] == 'Nuevo'		  ) $this->nuevos[ ] 	 = $b;
			}
			$todos = array_merge($this->nuevos,$this->procesados,$this->enproceso);
			$this->todos = $todos;
		}

		private function _get_inbox( ) 
		{ 
			if ($_SESSION['grupo_id']==1)
			{
				//echo kohana::debug($this->todos);
				return $this->todos;
			}
			else if ($_SESSION['grupo_id']==2) {
				//echo kohana::debug($this->_get_inbox_director( ));
				return $this->_get_inbox_director( );
			}
         else {
            return $this->todos;
         }
		}

		private function _get_inbox_director( )
		{
			$buzon = array( );
			//------------------------------------------
			// LOS QUE ESTAN EN PROCESO
			//------------------------------------------
			$params = array( 'usuario_id' => $_SESSION['user_id'] );
			$dependencia_id = ORM::factory('dependencia')->where($params)->find( )->id;
         //echo "dependencia_id: $dependencia_id";
			///////////////////////////////////////////////////////////////////////////
			foreach ($this->enproceso as $bi)
			{
				foreach ($bi['instrucciones'] as $ins)
				{
					foreach ($ins as $dep)
					{
					   //echo kohana::debug($ins);
						foreach($dep as $d) 
						{
                      //echo "$dependencia_id : ".kohana::debug($dep) ."<br />";
							 //echo "$dependencia_id : {$dep['dependencia_id']} <br />";
							if ($dependencia_id == $dep['dependencia_id']) $buzon[$bi['id']] = $bi;
						}
					}
				}
			}
			//------------------------------------------
			// LOS QUE ESTAN PROCESADOS
			//------------------------------------------
			foreach ($this->procesados as $bi)
			{
				foreach ($bi['instrucciones'] as $ins)
				{
					foreach ($ins as $dep)
					{
						foreach($dep as $d) 
						{
							// echo "$dependencia_id : ".kohana::debug($dep) ."<br />";
							// echo "$dependencia_id : $d <br />";
							if ($dependencia_id == $dep['dependencia_id']) $buzon[$bi['id']] = $bi;
						}
					}
				}
			}
         //echo kohana::debug($buzon);
         //exit;
			return $buzon;	
		}

      public function show_msg_admin( )
      {
			$content = new View('buzon/form-msg-admin');
         $content->render(TRUE);
      }
     		
		public function index( )
		{
			$content = new View('buzon/index');
			$content->buzon = $this->_get_inbox( );
			$this->wrapper->content = $content; 
         $this->wrapper->prototype = 1;
         $this->wrapper->js = array('buzon','lightbox/js/lightbox','modalbox/modalbox');
         $this->wrapper->estilos = array('lightbox','modalbox');
			$this->wrapper->render(TRUE);
		}

      public function show_document( )
      {
         //$tt = new View('')
      }

      public function guardar_respuesta_adjunto( )
      {
         $adjunto = ORM::factory('adjunto')->find($_POST['xid']);
         if ($_SESSION['grupo_id']==1)
         { 
            $adjunto->respuesta = $_POST['respuesta'];
            $adjunto->ultima_respuesta = date("Y-m-d H:i:s"); 
         }
         else
            $adjunto->mensaje = $_POST['respuesta']; 
         $adjunto->save( );
         echo "{ 'success' : true }";
      } 
     
      public function cambiar_estatus_adjunto( )
      {
         $adjunto = ORM::factory('adjunto')->find($_POST['xid']);
         $adjunto->estatus_adjunto_id = $_POST['estatus_id'];
         $adjunto->save( );
      } 
      
      public function cambiar_estatus_adjuntos( )
      {
         $cid = $_POST['cid'];
         $uid = $_POST['uid'];
         $pms = array('correspondencia_id'=>$cid,'usuario_id'=>$uid);
         $adjuntos = ORM::factory('adjunto')->where($pms)->find_all( );
         foreach ($adjuntos as $a)
         {
            $a->ultima_revision = date("Y-m-d H:i:s");
            $a->save( ); 
         }
      }

	}

   
// End Login
