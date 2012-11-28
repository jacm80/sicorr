<?php 
	
	# Libreria para trabajar fechas de mysql
	# transforma una fecha mysql a dd/mm/yyyy
	# y una fecha dd/mm/yyyy a fecha mysql yyyy-mm-dd
	class Date2mysql 
	{
		
		var $date=NULL;
		
		function __construct($date=NULL)
		{
			$this->date = $date;
		}

		function to_mysql($date=FALSE)
		{
			$date = ($date) ? $date : $this->date;
			if (preg_match("/^(\d{2})\/(\d{2})\/(\d{4})$/",$date,$m))
			{
				return $m[3].'-'.$m[2].'-'.$m[1];
			}
			else { return ''; }
		}
		
		function to_ddmmyyyy($date=FALSE)
		{
			$date = ($date) ? $date : $this->date;
			if (preg_match("/^(\d{4})-(\d{2})-(\d{2})$/",$date,$m))
			{
				if($m[3]!='00' and $m[2]!='00' and $m[2]!='0000') return $m[3].'/'.$m[2].'/'.$m[1];
			}
			else { return ""; }
		}

	}

// End Date2mysql
