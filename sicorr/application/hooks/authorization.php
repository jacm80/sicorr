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
         $ACL = Kohana::config('Authorization.ACL');
         $controlador	= trim(uri::segment(1));
		   $accion 			= trim(uri::segment(2));
         ///////////////////////////////////////////////////////////////////////////////////////////////////
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
         ///////////////////////////////////////////////////////////////////////////////////////////////////
         if (($controlador=='') AND ($accion=='') AND (isset($_SESSION['grupo_id']))) url::redirect('buzon');
      }
	}	
	
	Event::add('system.post_controller',array('Authorization','mAuthentication'));
	Event::add('system.post_controller_constructor',array('Authorization','mAuthorization'));
?>
