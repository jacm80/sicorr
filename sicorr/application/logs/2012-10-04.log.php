<?php defined('SYSPATH') or die('No direct script access.'); ?>

2012-10-04 08:19:24 -04:30 --- error: Database_Exception [ 1054 ]: Unknown column 'fecha>' in 'where clause' [ SELECT `bitacora`.*
FROM `bitacora`
WHERE `fecha>` = ' 00:00:00'
ORDER BY `id` DESC
LIMIT 0 ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-10-04 08:19:24 -04:30 --- error: Missing messages entry core.errors.1054 for message core
2012-10-04 08:20:30 -04:30 --- error: Database_Exception [ 1054 ]: Unknown column 'fechahora>' in 'where clause' [ SELECT `bitacora`.*
FROM `bitacora`
WHERE `usuario_id` = '7' AND `fechahora>` = ' 00:00:00'
ORDER BY `id` DESC
LIMIT 0 ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-10-04 08:20:30 -04:30 --- error: Missing messages entry core.errors.1054 for message core
2012-10-04 08:21:49 -04:30 --- error: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '>,  00:00:00)
ORDER BY `id` DESC
LIMIT 0' at line 3 [ SELECT `bitacora`.*
FROM `bitacora`
WHERE `usuario_id` = '7' AND `fechahora` = (>,  00:00:00)
ORDER BY `id` DESC
LIMIT 0 ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-10-04 08:21:49 -04:30 --- error: Missing messages entry core.errors.1064 for message core
2012-10-04 08:25:26 -04:30 --- error: Database_Exception [ 1054 ]: Unknown column 'fechahora>=' in 'where clause' [ SELECT `bitacora`.*
FROM `bitacora`
WHERE `fechahora>=` = ' 00:00:00'
ORDER BY `id` DESC
LIMIT 0 ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-10-04 08:25:26 -04:30 --- error: Missing messages entry core.errors.1054 for message core
2012-10-04 08:26:21 -04:30 --- error: Database_Exception [ 1054 ]: Unknown column 'fechahora>=' in 'where clause' [ SELECT `bitacora`.*
FROM `bitacora`
WHERE `fechahora>=` = ' 00:00:00'
ORDER BY `id` DESC
LIMIT 0 ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-10-04 08:26:21 -04:30 --- error: Missing messages entry core.errors.1054 for message core
2012-10-04 08:35:07 -04:30 --- error: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'order by id DESC' at line 1 [ SELECT * FROM bitacora WHERE order by id DESC ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-10-04 08:35:07 -04:30 --- error: Missing messages entry core.errors.1064 for message core
2012-10-04 08:39:36 -04:30 --- error: Kohana_PHP_Exception [ 1 ]: Call to undefined method Database_Mysql_Result::as_row() ~ APPPATH/controllers/bitacora.php [ 74 ]
2012-10-04 08:46:33 -04:30 --- error: Kohana_PHP_Exception [ 8 ]: Trying to get property of non-object ~ APPPATH/views/bitacora/grid.php [ 8 ]
2012-10-04 08:48:14 -04:30 --- error: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ORDER BY id DESC' at line 1 [ SELECT * FROM bitacora WHERE  usuario_id=5 LIMIT 10 ORDER BY id DESC ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-10-04 08:48:14 -04:30 --- error: Missing messages entry core.errors.1064 for message core
2012-10-04 08:48:56 -04:30 --- error: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ORDER BY id DESC' at line 1 [ SELECT * FROM bitacora LIMIT 10,0 ORDER BY id DESC ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-10-04 08:48:56 -04:30 --- error: Missing messages entry core.errors.1064 for message core
2012-10-04 08:50:21 -04:30 --- error: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'AND fechahora>='2012-10-03' ORDER BY id DESC LIMIT 5' at line 1 [ SELECT * FROM bitacora WHERE  AND fechahora>='2012-10-03' ORDER BY id DESC LIMIT 5 ] ~ SYSPATH/libraries/Database_Mysql_Result.php [ 29 ]
2012-10-04 08:50:21 -04:30 --- error: Missing messages entry core.errors.1064 for message core
