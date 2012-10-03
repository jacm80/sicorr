<?php

	class PDFReportexFecha extends PDF_MC_Table 
	{

		private $height= 266.7;
		private $width = 203.2;
		private $col	= 6;
		private $_h 	= 5;
		public function __construct($o,$m,$p="LETTER")
		{
			parent::__construct($o,$m,$p);
			$this->AddPage();
			$this->SetFont('Arial','',8);
			$this->setmargins(5,0,0);
		}

		public function header( )
		{
			$this->setmargins(5,0,0);
			$this->SetFont('Arial','',8);
			$this->Image(getcwd( ) . '/media/images/ceb_logo.jpg',8,8,15);
			$this->ln(15);
			$this->cell($this->width,5,'REPORTE DE GESTION DE CORRESPONDENCIA',0,0,'C',0);
			$this->ln(7);
			$this->SetFillColor(200,200,200);
			$this->cell($this->width/$this->col,$this->_h,'No. Oficio'		,1,0,'L',1);
			$this->cell($this->width/$this->col,$this->_h,'Fecha Recibido'	,1,0,'L',1);
			$this->cell($this->width/$this->col,$this->_h,'Fecha Oficio'	,1,0,'L',1);
			$this->cell($this->width/$this->col,$this->_h,'Contacto'			,1,0,'L',1);
			$this->cell($this->width/$this->col,$this->_h,'Asunto'			,1,0,'L',1);
			$this->cell($this->width/$this->col,$this->_h,'Suscrito'			,1,1,'L',1);
			//x$this->cell($this->width/$this->col,$this->_h,'Dependencia'		,1,1,'L',1);		
		}


      /*
		private function _get_data( )
		{
			$data = array( );
			$corr = ORM::factory('correspondencia')->find_all( );
			foreach ($corr as $c)
			{
				$data[ ] = array (
										'nro_oficio'	  => $c->nro_oficio,
										'fecha_recibido' => $c->fecha_recibido,
										'fecha_oficio'	  => $c->fecha_oficio,
										'contacto'		  => $c->contacto->descripcion,
										'asunto'			  => $c->asunto,
										'suscrito'		  => $c->suscrito,
										//'dependencia'	  => $c->dependencia->direccion
										);
			}
			return $data;
		}
      */

		private function _set_body($data)
		{
			// $this->cell(ancho,alto,data,borde:1 si 0 no,borde: 1 si 0 no, alineacion L izq R derecha, salto de linea: 1 si 2 no ,J justificacion)
			//$data = $this->_get_data( );
			srand(microtime()*1000000);			
			foreach ($data as $r)
			{
				$this->Row(
					array (
								$r['nro_oficio'],
								$r['fecha_recibido'],
								$r['fecha_oficio'],
								utf8_decode($r['contacto']),
								utf8_decode($r['asunto']),
								utf8_decode($r['suscrito']),
								//$r['dependencia']
							)
						);
			}
		}

		public function Footer( )
		{
			$this->SetY(-10);
			$this->SetFont('Arial','',8);	
			$texto  = 'NOTA: El presente documento no debe se modificado ni alterado.';
			$this->Write(4,utf8_decode($texto));
			$this->Cell(0,10,'Página'." ". $this->PageNo( ),0,0,'C');
		}

		public function render($data)
		{
			$wc = $this->width / $this->col; 
			$this->SetWidths(array($wc,$wc,$wc,$wc,$wc,$wc));
			$this->_set_body($data);
			$fecha=date('d_m_Y');
			$this->output('reporte_correspondecia_'.$fecha.'.pdf','D');
		}
				

	}

?>
