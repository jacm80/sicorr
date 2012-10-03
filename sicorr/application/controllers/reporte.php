<?php

	// cargar las librerias	
	require Kohana::find_file('vendor','mc_table');
	define('FPDF_FONTPATH', APPPATH . 'font-pdf/');

	class Reporte_controller extends Controller {
		
		var $wrapper;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
         $this->db = Database::instance( );
		}

		/*----------------------------------*/

		public function index( )
		{
			$this->wrapper->prototype = 1;
			$content = new View('reporte/index');
			$this->wrapper->content = $content;
			$this->wrapper->estilos = array('calendar');
			$this->wrapper->js = array('calendar','reporte');
			$this->wrapper->render(TRUE);
		}

		public function correspondenciaxfecha( )
		{
			
         //echo kohana::debug($_POST);
         $pdf = new PDFReportexFecha('P','mm','LETTER');
			$pdf->render($this->_get_data( ));	
		}

      private function _get_data( )
		{

         extract($_POST);
			$data = array( );

         $sql ="
               SELECT e.nro_oficio,
                      e.fecha_recibido,
                      e.fecha_oficio,
                      e.asunto,
                      e.suscrito,
                      c.descripcion as contacto
               FROM  correspondencias e, contactos c
               WHERE e.contacto_id = c.id AND
                     e.inactivo = 0 AND 
                     fecha_recibido BETWEEN '{$fecha_inicio}' AND '{$fecha_fin}'  
               "; 
			$result = $this->db->query($sql);
         //---------------------------------------------------------------------
			foreach ($result as $c)
			{
				$data[ ] = array (
										'nro_oficio'	  => $c->nro_oficio,
										'fecha_recibido' => $c->fecha_recibido,
										'fecha_oficio'	  => $c->fecha_oficio,
										'contacto'		  => $c->contacto,
										'asunto'			  => $c->asunto,
										'suscrito'		  => $c->suscrito
										);
			}
			return $data;
		}
	}	
	
		
// End Login
