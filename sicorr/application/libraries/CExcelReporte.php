<?php

	class CExcelReporte 
	{
		
		var $db;

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
      	$arrDate 	= explode("/", $i_sDate); // break up date by slash
      	$intDay 		= $arrDate[0];
      	$intMonth 	= $arrDate[1];
      	$intYear 	= $arrDate[2];
      	$intIsDate 	= checkdate($intMonth, $intDay, $intYear);
     		if(!$intIsDate){ $blnValid = FALSE; }
   		}
   		return ($blnValid);
		}
		
		private function _to_excel($data)
		{
         $filename = 'excel_corr_'.date('dmY_hmi');
			header("Content-type: application/vnd.ms-excel");
			$fecha = date("dmY_his");
			header("Content-Disposition: attachment; filename=Reporte-$filename-$fecha.xls");
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
		
				
		public function render($data)
		{
			$this->_to_excel($data);
		}

	}

// End ExcelReporte
