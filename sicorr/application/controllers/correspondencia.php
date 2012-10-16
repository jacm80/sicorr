<?php
	
	class Correspondencia_controller extends Controller {
		
		var $wrapper;
      var $dependencias;
      private $current_cid = NULL;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
			$this->db = Database::instance( );
         $this->_cargar_ary_dependencias( );
         $this->_cargar_ary_instrucciones( );
		}


      private function _cargar_ary_dependencias( )
      {
         $dependencias = ORM::factory('dependencia')->find_all( );
         foreach ($dependencias as $d)
         {
            $this->dependencias[$d->id]=$d->siglas;
         }
      }

      
      private function _cargar_ary_instrucciones( )
      {
         $instrucciones = ORM::factory('instruccion')->find_all( );
         foreach ($instrucciones as $i)
         {
            $this->instrucciones[$i->id]=$i->descripcion;
         }
      }


		/*----------------------------------*/

		private function _get_organismos( )
		{
			$data[0] = 'Seleccione';
			$organismos = ORM::factory('organismo')->find_all( );
			foreach($organismos as $o) $data[$o->id] = $o->descripcion;
			return $data;
		}

      private function _get_dependencias( )
      {
       $data = array();
		 $dependencias = ORM::factory ('dependencia')->find_all( );
		 foreach ($dependencias as $d) $data[ ] = array('id'=>$d->id,'siglas'=>$d->siglas,'direccion'=>$d->direccion);
		 return $data;
	   }
        
      private function _get_instrucciones( ) 
		{
		 $data[0] = 'Seleccione';
		 $instrucciones = ORM::factory('instruccion')->find_all( );
		 foreach ($instrucciones as $i) $data[$i->id] = $i->descripcion;
		 return $data; 	 
		}
	
		public function index( )
		{
         if (!isset($_SESSION['grupo_id'])) url::redirect('login');
			$data = array( );
			$content = new View('correspondencia/index');
			$corr = ORM::factory('correspondencia')->order_by('id','DESC')->find_all( );
			foreach ($corr as $c)
			{
				$data[] = array(
								'id'    		       => $c->id,
								'fecha_recibido'   => $c->fecha_recibido,
								'fecha_oficio'	    => $c->fecha_oficio,
								'nro_oficio'	    => $c->nro_oficio,
								'asunto'		       => $c->asunto,
								'contacto'		    => $c->contacto->descripcion,
								'suscrito'	 	    => $c->suscrito,
								);
			}
			$content->correspondencias = $data;
			$this->wrapper->content = $content;
			$this->wrapper->render(TRUE);
		}
		
		
		public function nuevo( )
		{
			$content = new View('correspondencia/form');
			$content->organismos   = $this->_get_organismos( );
			$content->dependencias = $this->_get_dependencias( );
			$this->wrapper->prototype = 1;
			$this->wrapper->content = $content;
			$this->wrapper->estilos = array('calendar');			
			$this->wrapper->js = array('correspondencia','calendar');
	    	$this->wrapper->render(TRUE);
		}		


      private function _chk_60min_reg($fechahora)
      {
         //$fechahora = '2012-09-27 12:00:00';
         $ahora     = date("Y-m-d H:i:s");
         //-------------------------------------------------
         $fecha1 = preg_split("/[\s-]/", $fechahora);
         $anio1  = $fecha1[0];
         $mes1   = $fecha1[1];
         $dia1   = $fecha1[2];
         $tiempo1  = $fecha1[3];
         $tt1 = preg_split("/[\s:]/",$tiempo1);
         $hora1 = $tt1[0];         
         $min1  = $tt1[1];         
         $seg1  = $tt1[2];         
         //--------------------------------------------------
         $fecha2 = preg_split("/[\s-]/", $ahora);
         $anio2  = $fecha2[0];
         $mes2   = $fecha2[1];
         $dia2   = $fecha2[2];
         $tiempo2  = $fecha2[3];
         $tt2 = preg_split("/[\s:]/",$tiempo2);
         $hora2 = $tt2[0];         
         $min2  = $tt2[1];         
         $seg2  = $tt2[2];         
         /*  
         echo "Año:  $anio1<br />";
         echo "Mes:  $mes1<br />";
         echo "Dia:  $dia1<br />";
         echo "Tiempo: $tiempo1<br />";
         echo "Hora: $hora1<br />";
         echo "Minutos: $min1<br />";
         echo "Segundos: $seg1<br />";
         echo "------------------------------<br />";
         echo "Año:  $anio2<br />";
         echo "Mes:  $mes2<br />";
         echo "Dia:  $dia2<br />";
         echo "Tiempo: $tiempo2<br />";
         echo "Hora: $hora2<br />";
         echo "Minutos: $min2<br />";
         echo "Segundos: $seg2<br />";
         echo "------------------------------<br />";
         */
         $dif = mktime($hora2,$min2,$seg2,$mes2,$dia2,$anio2) - mktime($hora1,$min1,$seg1,$mes1,$dia1,$anio1);       
         if ($dif<3600) return TRUE;
         else return FALSE;
         //echo "La diferencia es de: $dif";
      }

		private function _cargar_info($cid,&$content)
		{
			$corr = ORM::factory('correspondencia')->find($cid); 
			//-------------------------------------------------------
			$content->id		 	 = $corr->id;
			$content->fecha_recibido = $corr->fecha_recibido;
			$content->fecha_oficio	 = $corr->fecha_oficio;
			$content->nro_oficio	 = $corr->nro_oficio;
			$content->suscrito	 = $corr->suscrito;
			$content->organismo	 = $corr->contacto->organismo->descripcion;
			$content->contacto	 = $corr->contacto->descripcion;
			$content->archivo		 = $corr->archivo;
			$content->asunto		 = $corr->asunto;
         $content->canChange   = $this->_chk_60min_reg($corr->fechahora);
		}
		
		private function _cargar_instrucciones($corr_id,&$content)
		{
			$data = array( );
			//if ($_SESSION['grupo_id'] == 1) $params = array('correspondencia_id'=>$corr_id);
			//if ($_SESSION['grupo_id'] == 2) 
         $params = array('correspondencia_id'=>$corr_id);
			//-----------------------------------------------------------------------------
			$instrucciones = ORM::factory('corrinstruccion')->where($params)->find_all( );
			foreach($instrucciones as $i)
			{
            $data[$i->instruccion->descripcion][ ] = array(
				   'id'  => $i->id,
               'dep' => $i->dependencia->siglas,
               'obs' => $i->observaciones
            );
         }
			//-----------------------------------------------------------------------------
			$content->instrucciones = $data;
         return count($data);
		}

      private function _cargar_adjuntos($corr_id,&$content)
      {
		   $data = array( ); $n=1;
			if ($_SESSION['grupo_id'] == 1) 
         {
            $params = array('correspondencia_id'=>$corr_id);
         }
         else {
            $params = array('correspondencia_id'=>$corr_id,'usuario_id'=>$_SESSION['user_id']);
         }
         $adjuntos = ORM::factory('adjunto')->where($params)->find_all( );
         
         foreach ($adjuntos as $a)
         {
            $dep = ORM::factory('dependencia')->where(array('usuario_id'=>$a->usuario_id))->find( );
            $content->dependencia_id = $dep->id;
            $data[ ] = array(
               'no'              => $n,      
               'adjunto_id'      => $a->id,
               'archivo'         => $a->archivo,
               'mensaje'         => $a->mensaje,
               'respuesta'       => $a->respuesta,
               'director'        => $a->usuario->nombres . " " . $a->usuario->apellidos,
               'estatus'         => $a->estatus_adjunto->descripcion,
               'color'           => $dep->color,
               'siglas'          => $dep->siglas,
               'estatus_desc'    => $a->estatus_adjunto->descripcion,
               'estatus_id'      => $a->estatus_adjunto_id,
               'estatus_adjuntos'=> Utils::dropdown_estatus_adjuntos(),
               //---------------------------------------------------------------------
               'grupo_id'     => $dep->usuario->grupo_id
            );
            $n++;
         }
         //echo kohana::debug($data);
         $content->adjuntos = $data;
         return $n;
      }      

		public function editar($cid)
		{
         $_SESSION['cid'] = $cid;
			$this->wrapper->js = array('tabs','correspondencia_tabs');
			$this->wrapper->prototype = 1;
			$this->wrapper->estilos = array('tabs');			
			$content = new View('correspondencia/tabs/tabs_corr');
			$this->wrapper->content = $content;
			$this->_cargar_info($cid,$content);
			$ci = $this->_cargar_instrucciones($cid,$content);  
         $ca = $this->_cargar_adjuntos($cid,$content);
         //if ($ci==0) $ci++;
         //if ($ca==0) $ci++;
         $this->wrapper->js_vars = array('item'=>$ci,'adj'=>$ca);
	    	$this->wrapper->render(TRUE);
		}

      public function llenar_contactos($AS_ARRAY=FALSE,$org_id=FALSE)
		{
			$data[0] = 'Seleccione';
         if (!$org_id) $organismo_id = $_POST['id'];
         else $organismo_id = $org_id;
			$contactos = ORM::factory('contacto')->where(array('organismo_id'=>$organismo_id))->find_all( );
			foreach($contactos as $c)
			{
			  $data[$c->id]=$c->descripcion;
			}
			if (!$AS_ARRAY) echo form::dropdown(array('id'=>'contacto_id','name'=>'contacto_id'),$data,0);
         else return $data;
		}

		public function editar_info($id)
		{
			$content = new View('correspondencia/_form');
			$corr = ORM::factory('correspondencia')->find($id);
			$content->id 					= $corr->id;
			$content->fecha_recibido   = $corr->fecha_recibido;
			$content->fecha_oficio     = $corr->fecha_oficio;
			$content->nro_oficio       = $corr->nro_oficio;
         $content->contacto_id      = $corr->contacto_id;
         $content->organismo_id     = $corr->contacto->organismo->id;
         $content->asunto           = $corr->asunto;
         $content->suscrito         = $corr->suscrito;
			$content->archivo			   = $corr->archivo;
			$content->organismos			= $this->_get_organismos( );
			$content->contactos	      = $this->llenar_contactos(TRUE,$content->organismo_id);
			$this->wrapper->prototype = 1;
			$this->wrapper->estilos = array('calendar');			
         $this->wrapper->js = array('correspondencia','calendar');
			$this->wrapper->content    = $content;
			$this->wrapper->render(TRUE);
		}
		
      
      //private function extension($filename){ return substr(strrchr($filename, '.'), 1); }

		public function guardar($id=FALSE)
		{
         /**/
			extract($_POST);
			// si el id es falso significa que es un registro nuevo
			if ($id==FALSE) $corr = ORM::factory('correspondencia',FALSE);
			// de lo contrario se va actualizar un registro
			else $corr = ORM::factory('correspondencia')->find($id);
         
			$corr->fecha_recibido   = $fecha_recibido;
			$corr->fecha_oficio     = $fecha_oficio;
			$corr->nro_oficio       = $nro_oficio;
			$corr->suscrito         = $suscrito;
			$corr->asunto	         = $asunto;
         $corr->contacto_id      = $contacto_id;
         $corr->fechahora        = date("Y-m-d H:i:s");
         /**/

         if (isset($_POST['elarchivo']))
         {
            if ($_FILES['archivo']['name'] != '')
            {
               $nombre_archivo = uniqid().'.'.Utils::extension($_FILES['archivo']['name']);
               // Subir archivo ------------------------------------------------------------------------------------- 
               $PATH = getcwd( ).'/media/upload/correspondencias';
               $FILE = upload::save($_FILES['archivo'],$nombre_archivo,$PATH,0755);
               $corr->archivo = $nombre_archivo;
            } 
         }
         else {
            $nombre_archivo = uniqid().'.'.Utils::extension($_FILES['archivo']['name']);
            // Subir archivo ------------------------------------------------------------------------------------- 
            $PATH = getcwd( ).'/media/upload/correspondencias';
            $FILE = upload::save($_FILES['archivo'],$nombre_archivo,$PATH,0755);
            $corr->archivo = $nombre_archivo;
         }
         //-----------------------------------------------------------------------------------------------------
			$corr->save( );
			//---------------------------------------------------
			$this->session->set_flash('msj','Registro Guardado');
			url::redirect('correspondencia');
		}
	
      //----------------------------------------------------------------------------------------------------------
		// PERFIL ADMINISTRADOR
      //----------------------------------------------------------------------------------------------------------

		public function add_instruccion( )
		{
			$item = $_POST['item'];
			$tt = new View('correspondencia/tabs/admin/linea_instruccion');
			$tt->dependencias  = $this->_get_dependencias( );
			$tt->instrucciones = $this->_get_instrucciones( );
			$tt->item = $item;
			$tt->render(TRUE);
		}


      public function guardar_instruccion( )
      {
         $item = $_POST['item'];
         $arydp = array( );
         $dependencias = explode(',',$_POST['dependencias']);
         foreach ($dependencias as $d)
         {
            $arydp[] = $this->dependencias[$d];
         }
         if ($item % 2 != 0) $css='tr_azul'; else $css='tr_verde';
         echo "<tr class='$css'>";
         echo "<td>$item</td>";
         echo "<td>".$this->instrucciones[$_POST['instruccion_id']]."</td>";
         echo "<td>".implode(', ',$arydp)."</td>";
         echo "<td>".$_POST['observaciones']."</td>";
         echo "</tr>";
         foreach($dependencias as $d)
         {
            $corr = ORM::factory('corrinstruccion',FALSE);
            $corr->instruccion_id     = $_POST['instruccion_id'];
            $corr->correspondencia_id = $_POST['cid'];
            $corr->observaciones      = $_POST['observaciones'];
            $corr->dependencia_id     = $d;
            $corr->save( );
         }
         /**/
         //echo "ESTA MALO ESA MIERDA";
      }

      //-------------------------------------------------------------------------------------------
      // PERFIL DIRECTOR
      //-------------------------------------------------------------------------------------------

      public function guardar_adjunto( )
      {  
         $item = $_POST['item'];
         $nombre_archivo = uniqid().'.'.Utils::extension($_FILES['documento']['name']);
         
         $mensaje = $_POST['observacion'];
         $user_id = $_SESSION['user_id'];
         $cid     = $_SESSION['cid'];

         $dep_id = ORM::factory('dependencia')->where(array('usuario_id'=>$user_id))->find( )->id;
         
         //----------------------------------------------------------------------------------------------------
         $PATH = getcwd( )."/media/upload/directores/$dep_id";
         
         if (!file_exists($PATH)) mkdir($PATH,0775);
         
         $FILE = upload::save($_FILES['documento'],$nombre_archivo,$PATH,0775);
         //----------------------------------------------------------------------------------------------------

         $adjunto = ORM::factory('adjunto',FALSE);
         $adjunto->correspondencia_id = $cid;
         $adjunto->archivo = $nombre_archivo;
         $adjunto->mensaje = $mensaje;
         $adjunto->estatus_adjunto_id = 'Sin Revisión';
         $adjunto->usuario_id = $user_id;
         $adjunto->save( );
      
         url::redirect("correspondencia/editar/{$cid}/{$user_id}");         

         /*
         if ($item % 2 != 0) $css='tr_azul'; else $css='tr_verde';
         echo "<tr class='$css'>";
         echo "<td>{$adjunto->id}</td>";
         echo "<td>{$adjunto->archivo}</td>"; 
         echo "<td>{$adjunto->mensaje}</td>";
         echo "<td style='text-align:center;'><a href=''>". html::image('media/images/delete.png')  ."</a></td>";
         echo "</tr>";
         */
      }

		public function adjuntar( )
		{
			$adj = $_POST['adj'];
			$tt = new View('correspondencia/tabs/director/linea_upload');
			$tt->adj = $adj;
			$tt->render(TRUE);
		}

		public function eliminar($id)
		{
			$corr = ORM::factory('correspondencia')->find($id);
			$corr->delete( );
			//-------------------------------------------
			$this->session->set_flash('msj','Registro Eliminado');
			url::redirect('correspondencia');
      }

      public function eliminar_adjunto( )
      {
         ORM::factory('adjunto')->find($_POST['id'])->delete( );
      }

      public function cerrar_proceso($id)
      {
         $corr = ORM::factory('correspondencia')->find($id);
         $corr->para_corporativa = 1;
         $corr->save( );
         url::redirect('buzon');
      }

      /*   SEGUIMIENTO DE CORRESPONDENCIAS PROCESADAS  */
      public function procesadas( )
      {
        $content = new View('correspondencia/procesadas/index');
		  $corres  = ORM::factory('correspondencia')
                                          ->where(array('para_corporativa'=>1))
                                          ->find_all( );
         /*----------------------------------------------------------------*/
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
                              'suscrito'       => $c->suscrito,
                              'motivo_corporativa'=>$c->motivo_corporativa
                            );
         }
         /*----------------------------------------------------------------*/
			$content->correspondencias = $data;
			$this->wrapper->content    = $content;
			$this->wrapper->render(TRUE);
 
      }

}
   // End Login
