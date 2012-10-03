<?php defined('SYSPATH') OR die('No direct access allowed.');



	class Authorization 
   {
         
		public function mAuthentication( )
      {  
         $controlador	= uri::segment(1);
		   $accion 			= uri::segment(2);
         if ((!isset($_SESSION['user_id'])) AND ($controlador!='login') AND ($controlador!='denegado')) 	{ url::redirect('login'); }
      }
      
      public function mAuthorization( )
      {
         $ACL = array(
               // Administrator
               '1'=>array(
                  'buzon'           =>array('show_msg_admin','index','guardar_respuesta_adjunto','cambiar_estatus_adjunto','cambiar_estatus_adjuntos'),
                  'consulta'        =>array('llenar_grid','index'),
                  'contacto'        =>array('index','nuevo','guardar','editar','eliminar'),
                  'correspondencia' =>array('index','nuevo','editar','llenar_contactos','editar_info','guardar','add_instruccion',
                                            'guardar_instruccion','guardar_adjunto','adjuntar','eliminar','eliminar_adjunto','cerrar_proceso'),
                  'dependencia'     =>array('index','nuevo','guardar','editar','eliminar'),
                  'organismo'       =>array('index','nuevo','editar','guardar','eliminar'),
                  'reporte'         =>array('index','correspondenciaxfecha'),
                  'usuario'         =>array('index','nuevo','editar','guardar','eliminar'),
                  'denegado'        =>array('index'),
                  'login'           =>array('index','login','logout'),
                  'bitacora'        =>array('index','vaciar_bitacora')
               ),
               // Director
               '2'=>array(
                  'buzon'           =>array('show_msg_admin','index','guardar_respuesta_adjunto','cambiar_estatus_adjuntos'),
                  'consulta'        =>array('llenar_grid','index'),
                  'contacto'        =>array('index','nuevo','guardar','editar'),
                  'correspondencia' =>array('index','nuevo','editar','llenar_contactos','editar_info','guardar',
                                            'guardar_adjunto','adjuntar','eliminar_adjunto'),
                  'dependencia'     =>array('index','nuevo','guardar','editar','eliminar'),
                  'organismo'       =>array('index','nuevo','editar','guardar','eliminar'),
                  'reporte'         =>array('index','correspondenciaxfecha'),
                  'usuario'         =>array('index','nuevo','editar','guardar','eliminar'),
                  'denegado'        =>array('index'),
                  'login'           =>array('index','login','logout')
               ),
               // Operador
               '3'=>array(
                  'buzon'           =>array('index'),
                  'consulta'        =>array('llenar_grid','index'),
                  'contacto'        =>array('index','nuevo','guardar','editar'),
                  'correspondencia' =>array('index','nuevo','editar','llenar_contactos','editar_info','guardar','add_instruccion'),
                  'dependencia'     =>array('index','nuevo','guardar','editar'),
                  'organismo'       =>array('index','nuevo','editar','guardar'),
                  'reporte'         =>array('index','correspondenciaxfecha'),
                  'denegado'        =>array('index'),
                  'login'           =>array('index','login','logout')
               ));


         $controlador	= trim(uri::segment(1));
		   $accion 			= trim(uri::segment(2));

         //echo "CONTROLADOR: $controlador&nbsp;";
         //echo "ACCION:   $accion<br />";
        
         /**/ 
         if (($controlador!='login') AND (isset($_SESSION['user_id'])) AND ($controlador!=""))
         { 
            $grupo = $_SESSION['grupo_id'];     
            if (array_key_exists($controlador,$ACL[$grupo]))
            {
               if ($accion!="")
               {
                  if (!in_array($accion,$ACL[$grupo][$controlador])) url::redirect('denegado'); 
               }
            }
            else url::redirect('denegado');
         }
         /**/
      }


	}
		
	Event::add('system.post_controller',array('Authorization','mAuthentication'));
	Event::add('system.post_controller_constructor',array('Authorization','mAuthorization'));
		/*
		USADO PARA PRUEBAS---------------------------------------------------
		echo "user_id: " . $user_id . "<br />";
		echo kohana::debug($permisos);
		echo "\$current: " 		. url::current( ) 		. "<br />";
		echo "hay accion<br />";
		echo "NO! hay accion<br/>";
		echo "\$accion: " 		. $accion 		. "<br />";
		echo "\$controller: " . $controlador . "<br />";
		echo "\$_SESSION['user']:" . $_SESSION['user'] . "<br />";
		----------------------------------------------------------------------
		*/
?>
