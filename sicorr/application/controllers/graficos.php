<?php
	
	class Graficos_controller extends Controller {
		
		var $wrapper;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
         $this->db      = Database::instance( );
		}

      private function _set_graphic_lib()
      {
         $this->wrapper->js = array('amcharts/amcharts','graficos');
      }
	

      private function _set_data_graphic( )
      {
         ////////////////////////////////////////////////////////////////////////////////////////////////////////
         $sqlNUEVAS = "SELECT (SELECT COUNT(c.id) 
                        FROM correspondencias c 
                        WHERE c.id 
                        NOT IN (SELECT correspondencia_id FROM corrinstruccion)) AS nuevas";
         $sqlPENDIENTES = "SELECT (SELECT COUNT(c.id) 
                           FROM correspondencias c 
                           WHERE enviada=0 AND 
                                 para_corporativa=0 AND 
                                 c.id NOT IN (SELECT correspondencia_id FROM  adjuntos)) AS pendientes";
         $sqlRESPONDIDAS = "SELECT (SELECT COUNT(c.id)  FROM correspondencias c WHERE enviada=1) AS respondidas";
         ////////////////////////////////////////////////////////////////////////////////////////////////////////
         
         $qryNuevas      = $this->db->query($sqlNUEVAS);
         $qryPendientes  = $this->db->query($sqlPENDIENTES);
         $qryRespondidas = $this->db->query($sqlRESPONDIDAS);

         foreach ($qryNuevas       as $q) $nuevas       = $q->nuevas;
         foreach ($qryPendientes   as $q) $pendientes   = $q->pendientes;
         foreach ($qryRespondidas  as $q) $respondidas  = $q->respondidas;

         $grafico = array(
                           array('items'=>'Nuevas'     ,'nuevas'     => $nuevas),
                           array('items'=>'Pendientes' ,'pendientes' => $pendientes-$nuevas),
                           array('items'=>'Respondidas','respondidas'=> $respondidas)
                         );
         return json_encode($grafico);
      }

		public function index( )
		{
			$content = new View('graficos/index');
         $content->grafico = $this->_set_data_graphic( );
			$this->wrapper->content = $content;
			//$this->wrapper->prototype = 1;
			$this->_set_graphic_lib( );
			$this->wrapper->render(TRUE);
		}
}
// End Login
