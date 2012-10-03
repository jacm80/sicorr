<?php

	class ExcelReporte 
	{
		
		var $db;
		var $archivo;

		public function __construct( )
		{
			$this->db = Database::instance( );
		}

		private function isDate($i_sDate)
		{
  		$blnValid = TRUE;
   		if(!preg_match("/^\d{2}\/\d{2}\/\d{4}$/",$i_sDate))
   		{
    		$blnValid = FALSE;
   		}
   		else //format is okay, check that days, months, years are okay
   		{
      	$arrDate 		= explode("/", $i_sDate); // break up date by slash
      	$intDay 		= $arrDate[0];
      	$intMonth 	= $arrDate[1];
      	$intYear 		= $arrDate[2];
      	$intIsDate 	= checkdate($intMonth, $intDay, $intYear);
     		if(!$intIsDate){ $blnValid = FALSE; }
   		}
   		return ($blnValid);
		}
		
		private function _to_excel($data)
		{
			header("Content-type: application/vnd.ms-excel");
			$fecha = date("dmY_his");
			header("Content-Disposition: attachment; filename=Reporte-$this->archivo-$fecha.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			echo "<table>\n";
			foreach($data as $row)
			{
				echo "<tr>\n";
						foreach(array_keys($row) as $k)
						{
							if ($this->isDate($row[$k])) $format = "dd/mm/yyyy";
							else if (is_numeric($row[$k])) 
							{
								$row[$k] = number_format($row[$k],2,'.',',');
								$format  = "#,##0.00";
							}
							else 
							{
								$format  = "@";
								$row[$k] = utf8_decode($row[$k]);
							}
							echo "\t\t<td style='mso-number-format:\"$format\";'>".$row[$k]."</td>\n";
						}
				echo "</tr>\n";
			}
			echo "</table>\n";
		}
		
		private function _get_data($vista,$lista=FALSE)
		{
			$fecha = new Date2mysql( );
			// seleccionar los campos de acuerdo a la vista
			if ($vista == "financiero") 
			{
					$fields = array('numero','descripcion','monto_presupuesto','fecha_firma','monto_contratado',
													'monto_anticipo','monto_contrato_modificado','monto_ejecutado','porcentaje_ejecucion','porc_ejec_fisica','status','fecha_terminacion','porc_ejecu_hist','periodo_presupuesto','validacion_resincion');
			}
			else $fields = array('numero','descripcion','fecha_firma','monto_contratado','contratista',
													 'monto_ejecutado','porc_ejec_fisica','porc_ejec_financiera','status','porc_ejecu_hist','periodo_presupuesto','validacion_resincion');

			$this->db->from('vista_'.$vista)->select($fields);
			
			if ($lista) $this->db->in('contrato_id',$lista);
			$rs = $this->db->get( );
			//--------------------------------------------------------------------------------------------------------------------
			$data;
			foreach ($rs as $r)
			{
				
				foreach($fields as $k) 
				{
					if ($k=="fecha_firma") $row[$k] = $fecha->to_ddmmyyyy($r->$k);
					else $row[$k] = $r->$k;
				}
				
				if ($vista == "financiero") 
				{
					if($r->periodo_presupuesto<=2010){
						$row['porcen_ejecucion'] = $r->porc_ejecu_hist;
					}
				}
				if ($vista == "financiero" or $vista == "general") 
				{
					if($r->validacion_resincion==1){
						$row['status']='Rescindido';
					}
				}
				$data[] = $row;
			}
			//--------------------------------------------------------------------------------------------------------------------
			return $data;
		}
		
		public function render($vista,$lista=FALSE)
		{
			$this->archivo = $vista;
			$this->_to_excel($this->_get_data($vista,$lista));
		}

	}

// End ExcelReporte
