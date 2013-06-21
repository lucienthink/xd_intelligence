<?php
/*
*	搜索类
*	Author: @peaksnail @lucien_think
*	by @lucien_think
*/
	class Search extends Safe
	{
		private $con;
		public $pg;
		function __construct()
		{
			$this->urlChecker();
			$this->pChecker();
			$this->sChecker();

			$this->con = new Connect();
		}

		public function Table(){
			$sql = "show tables";
			$table = mysql_query($sql);
			$i = 0;
			while ($tt = mysql_fetch_row($table)) {
				$tables[$i] = $tt[0]; 
				$i++;
			}
			return $tables;
		}

		/*搜索
		*参数 $page:第几页  $epage:每页条数
		*/
		public function Search($page,$epage){
			if($page&&1!=$page) $page = ($page-1) * $epage;
			else $page = 0;
			$tables = $this->Table();
			$k=0;
			for ($i=0; $i < count($tables) ; $i++) { 
				$sql = "SELECT * from ".$tables[$i]." as xd where content like '%".$_REQUEST['s']."%' order by time desc";
				$data = mysql_query($sql);	
				if($data){
					while ( $row=mysql_fetch_array($data)) {
						foreach ($row as $key => $value) {
							$res[$k][$key]=$value;
						}
						$k++;
						if($k >= ($page+$epage)) break;
					}
				}
				$this->pg += mysql_num_rows($data);
			}
			if($res) $result = array_slice($res,$page,$epage);
			$this->pg = ceil($this->pg/$epage);
			return $result;

		}


		/*分页
		*参数  $num:显示分页数量 $epage:每页几条
		*/
		public function Page($num,$epage){			
			$p = new Page();
			$p->Showsearchpage($num,$epage,$this->pg);	
		}

		public function __destruct(){
			if($this->con) $this->con->CloseDB();
		}
	}



?>