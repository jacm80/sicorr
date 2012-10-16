<?php defined('SYSPATH') OR die('No direct access allowed.');

  $config['ACL'] = array(
      // Administrador
      '1'=>array(
            'buzon'           =>array('show_msg_admin','index','guardar_respuesta_adjunto','cambiar_estatus_adjunto','cambiar_estatus_adjuntos'),
            'consulta'        =>array('llenar_grid','index'),
            'contacto'        =>array('index','nuevo','guardar','editar','eliminar'),
            'correspondencia' =>array('index','nuevo','editar','llenar_contactos','editar_info','guardar','add_instruccion',
                                            'guardar_instruccion','guardar_adjunto','adjuntar',
                                            'eliminar','eliminar_adjunto','cerrar_proceso','procesadas'),
            'dependencia'     =>array('index','nuevo','guardar','editar','eliminar'),
            'organismo'       =>array('index','nuevo','editar','guardar','eliminar'),
            'reporte'         =>array('index','correspondenciaxfecha'),
            'usuario'         =>array('index','nuevo','editar','guardar','eliminar'),
            'denegado'        =>array('index'),
            'login'           =>array('index','login','logout'),
            'bitacora'        =>array('index','filtrar','vaciar_bitacora'),
            'graficos'        =>array('index'),
            'mantenimiento'   =>array('backup')
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
      ),
      // Corporativa
      '4'=>array(
                  'login'           =>array('index','login','logout'),
                  'corporativa'     =>array('index','motivo','guardar_motivo','cambiar_estatus'),
                  'denegado'        =>array('index')
               )
);

// End Authorization
