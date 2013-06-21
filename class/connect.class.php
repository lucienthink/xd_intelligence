<?php
/*
*	连接类
*	Author: @peaksnail @lucien_think
*	by @lucien_think
*/
	class Connect
	{
		private $conn;
		function __construct()
		{
			if(!$this->conn=mysql_connect(SERVER,USERNAME,PASSWD))
			{
			    echo "connect the server error\n";
			    exit -1;
			}
			mysql_select_db(DBNAME,$this->conn);
			mysql_query("set names 'utf8'");
		}
		public function CloseDB(){
			mysql_close($this->conn);
		}
	}


?>