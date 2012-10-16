<?php
	
	class Mantenimiento_controller extends Controller {
		
		var $view;

		public function __construct( )
		{
			parent::__construct( );
			$this->view = new View('wrapper');
			$this->session = Session::instance( );
		}

		/*----------------------------------*/
		public function backup( )
		{
         $cdb = Kohana::config('database.default.connection');
         $dbuser = $cdb['user'];
         $dbhost = $cdb['host'];
         $dbpass = $cdb['pass'];
         $dbname = $cdb['database'];
         $backupFile = getcwd( ).'/media/upload/backups/'.$dbname.'_'.date("Ymd-His").'.sql';
         $command = "mysqldump --opt -h $dbhost --user=$dbuser --password=$dbpass $dbname > $backupFile";
         $result = system($command);
         if (!$result) 
         {
            download::force($backupFile);   
         } 
		}
		
		
		
}


// End Login
