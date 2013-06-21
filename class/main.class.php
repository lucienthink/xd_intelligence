<?php
/*
*	查询类
*	Author: @peaksnail @lucien_think
*	by @lucien_think
*/
	class Main extends Safe{
		public $type;    //判断是什么类型的数据，如学院还是实验室
		private $con;

		function __construct($t){
			$this->urlChecker();
			$this->pChecker();
			$this->bChecker();
			$this->type = "xd_".$t;

			$this->con = new Connect();
		}

		

		/*查询内容
		*参数 $page:第几页  $epage:每页条数  $branch:source分类
		*/
		public function Select($page,$epage,$branch){
			if($page&&1!=$page) $page = ($page-1) * $epage;
			else $page = 0;
			$sql = "SELECT * from ".$this->type." order by time desc limit ".$page.", ".$epage;
			if($branch) $sql ="SELECT * from ".$this->type." where source ='".$branch."' order by time desc limit ".$page.", ".$epage;
			$data = mysql_query($sql);	
			if($data){		
				$j=0;
				while ( $row=mysql_fetch_array($data)) {
					foreach ($row as $key => $value) {
						$result[$j][$key]=$value;
					}
					$j++;
				}
			}	
			return $result;

		}

		//
		/*分页
		*参数  $page:显示分页数量 $epage:每页几条
		*/
		public function Page($page,$epage){
			$sql = "SELECT count(id) from ".$this->type;
			if($_REQUEST['b']) $sql .= " where source ='".$_REQUEST['b']."'";
			$c = mysql_query($sql);
			$result = mysql_fetch_array($c);
			$num = ceil($result[0]/$epage);
			$p = new Page();
			$p->Showpage($page,$epage,$num);
		}

	

		//查询source
		public function Selectsource(){
			$sql = "SELECT DISTINCT source from ".$this->type;
			$data = mysql_query($sql);	
			if($data){		
				$j=0;
				while ( $row=mysql_fetch_array($data)) {
					$result[$j]=$row['source'];					
					$j++;
				}
			}
			return $result;
		}

		//查询所有source
		public function SelectsourceAll(){
			$sql = "show tables";
			$table = mysql_query($sql);
			$i = 0;
			while ($tt = mysql_fetch_row($table)) {
				$this->type = $data[0][$i] = $tt[0];
				$data[1][$i] = $this->Selectsource();
				$i++;
			}
			return $data;
		}

		public function __destruct(){
			if($this->con) $this->con->CloseDB();
		}
		
		

	}




?>
