<?php defined('SYSPATH') OR die('No direct access allowed.');


   Event::replace('system.404', array('Kohana_404_Exception', 'trigger'), array('hook_404','my_404'));

   class hook_404
   {
      public function my_404( ) 
      {
         $controler = new show_404_Controller( );
         $controler->index( );
         die( );   
      }
   }

