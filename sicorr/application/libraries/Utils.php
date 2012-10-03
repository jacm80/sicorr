<?php

   class Utils {
   
      function extension($filename)
      { 
        return substr(strrchr($filename, '.'), 1); 
      }

      function cargar_instrucciones($corr_id,&$content=FALSE)
		{
			$data = array( );
         $params = array('correspondencia_id'=>$corr_id);
			//-----------------------------------------------------------------------------
			$instrucciones = ORM::factory('corrinstruccion')->where($params)->find_all( );
			foreach($instrucciones as $i)
			{
            $data[$i->instruccion->descripcion][ ] = array(
				   'id'             => $i->id,
               'dep'            => $i->dependencia->siglas,
               'dependencia_id' => $i->dependencia_id,
               'obs'            => $i->observaciones
            );
         }
			//-----------------------------------------------------------------------------
			if ($content) $content->instrucciones = $data;
         else return $data;
		}


      function estado_correspondencia($cid)
      {
         $adjuntos      = ORM::factory('adjunto')->where(array('correspondencia_id'=>$cid))->find_all( );
         $instrucciones = Utils::cargar_instrucciones($cid);
         $c_instrucciones = count($instrucciones);
			$c_adjuntos		  = count($adjuntos);
         //////////////////////////////////////////////////////////////////////////////////////////
			if (($c_instrucciones > 0)  AND ($c_adjuntos > 0))  return 'Procesado';
			if (($c_instrucciones > 0)  AND ($c_adjuntos < 1))  return 'En Proceso'; 
			if (($c_instrucciones == 0) AND ($c_adjuntos == 0)) return 'Nuevo'; 
			//////////////////////////////////////////////////////////////////////////////////////////
      }

      function guardar_bitacora($descripcion)
      {
         $bitacora = ORM::factory('bitacora',0);
         $bitacora->descripcion     = $descripcion;
         $bitacora->fechahora       = date('Y-m-d H:i:s');
         $bitacora->usuario_id      = $_SESSION['user_id'];
         $bitacora->nombre_usuario  = $_SESSION['user_name'];
         $bitacora->save( );
      }



   }

 
?>
