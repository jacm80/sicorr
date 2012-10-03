<?php defined('SYSPATH') OR die('No direct access allowed.');



	class Auditoria 
   {
   
		public function mAuditoria( )
      {
         $descripcion = '';
         if (isset($_SESSION['user_id']))
         {
            $controlador	= uri::segment(1);
		      $accion 			= uri::segment(2);
            $descripcion   = $controlador;
            if ($accion!='') $descripcion .= ' ('.$accion.')'; 
            //if ($descripcion)
            Utils::guardar_bitacora($descripcion);
         }
      }

	}
		
	Event::add('system.post_controller',array('Auditoria','mAuditoria'));

?>
