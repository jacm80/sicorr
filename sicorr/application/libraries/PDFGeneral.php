<?php defined('SYSPATH') OR die('No direct access allowed.');

	class PDFGeneral extends PDF_MC_Table
	{
		public function __construct($o,$m,$p="A4")
		{
			parent::__construct($o,$m,$p);
			$this->AddPage();
			$this->SetFont('Arial','',8);
		}
	
		public function header( )
		{
			$h=5;
			$this->Image(getcwd( ) . '/media/images/escudo.jpg',8,8,25);
			$this->Image(getcwd( ) . '/media/images/sol.jpg',260,8,25);
			$this->SetLeftMargin(32);
			$this->SetFont('Arial','B',10);
			$this->Cell(230,$h,utf8_decode(''),0,1,'L');
			$this->Cell(230,$h,utf8_decode(''),0,1,'L');
			$this->SetFont('Arial','',10);
			$this->Cell(230,$h,utf8_decode(''),0,1,'R');
			$this->SetLeftMargin(10);
			$this->SetFont('Arial','B',10);
			$this->Cell(230,$h,utf8_decode(''),0,1,'R');
			$this->Ln(2);
			$this->Cell(230,$h,utf8_decode('Reporte General de Contratos'),0,1,'L');
			$this->SetFont('Times','B',6);
			$this->Ln($h);
			$this->Cell(27,$h,'COD_CTO.'				,1,0,'C');
			$this->Cell(73,$h,'DESCRIPCION'			,1,0,'C');
			$this->Cell(20,$h,'FECHA CTO.'			,1,0,'C');
			$this->Cell(25,$h,'MONTO CTO.'			,1,0,'C');
			$this->Cell(44,$h,'CONTRATISTA'			,1,0,'C');
			$this->Cell(25,$h,'MONTO EJECUTADO'	,1,0,'C');
			$this->Cell(20,$h,'% EJEC. FISICA'	,1,0,'C');
			$this->Cell(20,$h,'% EJEC. FINAN.'  ,1,0,'C');
			$this->Cell(22,$h,'ESTATUS'					,1,0,'C');
			$this->Ln($h);
		}

		public function Footer( )
		{
			$this->SetY(-10);
			$this->SetFont('Arial','I',8);
			$texto  = 'NOTA: El presente documento no debe ser modificado ni alterado.'; 
			$this->Write(4,utf8_decode($texto));
			$this->Cell(0,10,utf8_decode('Página') . " " . $this->PageNo(),0,0,'C');
		}		

		private function _set_body($data)
		{
			$fecha = new Date2mysql( );
			srand(microtime()*1000000);
			foreach($data as $row)
			{
				$this->Row(array(
												$row['numero'],
												utf8_decode($row['descripcion']),
												$fecha->to_ddmmyyyy($row['fecha_firma']),
												number_format($row['monto_contratado'],2,',','.'),	
												utf8_decode($row['contratista']),
												number_format($row['monto_ejecutado'],2,',','.'),
												number_format($row['porc_ejec_fisica'],0,',','.').'%',
												number_format($row['porc_ejec_financiera'],0,',','.').'%',
												$row['status']
											));
			}
		}

		public function render($data)
		{
			$this->SetWidths(array(27,73,20,25,44,25,20,20,22));
			$this->_set_body($data);
			$fecha=date('d_m_Y');
			$this->output('reporte_general_'.$fecha.'.pdf','D');
		}
	
	}

// END PDFFinanciero */
