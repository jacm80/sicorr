<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-07-31 13:17:27 -04:30 --- error: Kohana_404_Exception [ 43 ]: The page you requested, historico, could not be found. ~ SYSPATH/libraries/Kohana_404_Exception.php [ 42 ]
2012-07-31 14:34:12 -04:30 --- error: Kohana_PHP_Exception [ 8 ]: Undefined property: Reporte_controller::$db ~ APPPATH/controllers/reporte.php [ 56 ]
2012-07-31 14:34:52 -04:30 --- error: Database_Exception [ 1146 ]: Table 'sicorr.e' doesn't exist [ 
               SELECT e.nro_oficio,
                      e.fecha_recibido,
                      e.fecha_oficio,
                      e.asunto,
                      e.suscrito,
                      c.descripcion as contacto
               FROM  e correspondencias,c contactos
               WHERE e.contacto_id = c.id AND
                     e.inactivo = 1 AND 
                     fecha_recibido BETWEEN 2012-07-31 AND 2012-07-31    
                ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-07-31 14:34:52 -04:30 --- error: Missing messages entry core.errors.1146 for message core
2012-07-31 14:35:06 -04:30 --- error: Database_Exception [ 1146 ]: Table 'sicorr.e' doesn't exist [ 
               SELECT e.nro_oficio,
                      e.fecha_recibido,
                      e.fecha_oficio,
                      e.asunto,
                      e.suscrito,
                      c.descripcion as contacto
               FROM  e correspondencias,c contactos
               WHERE e.contacto_id = c.id AND
                     e.inactivo = 1 AND 
                     fecha_recibido BETWEEN 2012-07-02 AND 2012-07-31    
                ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-07-31 14:35:06 -04:30 --- error: Missing messages entry core.errors.1146 for message core
2012-07-31 14:51:00 -04:30 --- error: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND 2012-07-31' at line 10 [ 
               SELECT e.nro_oficio,
                      e.fecha_recibido,
                      e.fecha_oficio,
                      e.asunto,
                      e.suscrito,
                      c.descripcion as contacto
               FROM  correspondencias e, contactos c
               WHERE e.contacto_id = c.id AND
                     e.inactivo = 0 AND 
                     fecha_recibido BETWEEN  AND 2012-07-31    
                ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-07-31 14:51:00 -04:30 --- error: Missing messages entry core.errors.1064 for message core
