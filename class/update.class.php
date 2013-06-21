<?php
/**
*	数据更新类
*	Author: @peaksnail @lucien_think
*	by @lucien_think
*/
	class Update
	{
		public $type;    //判断是什么类型的数据，如学院还是实验室

		function __construct($t){
			$this->type = "xd_".$t;		
		}

		public function CreateTables(){
			$sql = "CREATE TABLE IF NOT EXISTS `".$this->type."` (
				  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
				  `source` char(50) NOT NULL,
				  `url` char(200) NOT NULL,
				  `content` text NOT NULL,
				  `time` varchar(10) NOT NULL,
				  PRIMARY KEY (`id`),
				  UNIQUE KEY `id` (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
		
			if(!mysql_query($sql)) echo "CREATE TABLE WRONG!";
		}

		public function Insert($source,$t,$url,$p,$cont){
			$this->CreateTables();
			$i=0;
			while(!empty($p[$i]))
			{
			    $path=$url.$p[$i];
			    $content=$cont[$i];
			    if(empty($t[$i]))
				$t[$i]=date("Y-m-d");
			    //把时间化为unix时间戳，把过期时间过滤掉
			    //判断抓取的时间的格式，通过传进来的时间字符串长度判断
			    if(strlen($t[$i])<=5)
			    $time=strtotime(date('Y')."-".$t[$i]);
			    else
			    $time=strtotime($t[$i]);
			    $i++;
			    if($this->is_exist($path,$this->type))
				continue;
			    if($time>time())
				continue;
			     $sql="insert into ".$this->type." (source,url,content,time) values('$source','$path','$content','$time')";
			    if(!mysql_query($sql))
			    {
				echo "insert into error\n";
				exit -2;
			    }
			}
		}
		/*
		 * 判断此条信息是否已存在
		 * 如果存在返回1，continue，否则 返回0，插入数据
		 * */
		public function is_exist($url,$table)
		{
			$sql="select id from $table where url='$url'";
			$rs=mysql_query($sql);
			if($rs) $row=mysql_fetch_array($rs);
			if(!empty($row['id']))
			    return 1;
			else return 0;
		}
		 
		/*
		 *对机电工程学院的年月日进行替换，其实可以写模式匹配，这个暂时写不出来，这写个简单函数把年月日替换成 "-"
		 返回替换后的值
		 */
		public function replace ($str)
		{
			$str=str_replace("年","-",$str);
			$str=str_replace("月","-",$str);
			$str=str_replace("日","",$str);
			return $str;
		}
		public function trim_tags($info)
		{
		    $i=0;
		    while(!empty($info[$i]))
		    {
			$info[$i]=strip_tags($info[$i]);
			$i++;
		    }
		    return $info;
		
		}
		//替换amb为空格
		public function replace1 ($path)
		{
		    $i=0;
		    while(!empty($path[1][$i]))
		     {
			    $path[1][$i]=str_replace("amp;","",$path[1][$i]);
			    $i++;
		    }
		    return $path;
		}
			    
		/*public function record ($source,$file,$content)
		{
		$fp=fopen("../log/debug.log","a");    
		if(!$fp)
		{
		    echo "cannot open the log file !";
		    exit -1;
		}
		$content=" from ".$source." ".$file." bug: ".$content."\n";
		if(!fwrite($fp,date("Y-m-d H:i:s")."\n"))
		{
		    echo "cannot write the log file!";
		    exit -2;
		}
		fwrite($fp,$content);
		fclose($fp);
		}
		public function  debug ($source,$file,$value)
		{
		    if($value==0)
			$content="url错误";
		    if($value==-1)
			$content="截取网页内容错误";
		    if($value==-2)
			$content="正则匹配错误";
		    if($value==-3)
			$content="Insert错误";
                     $this->record($source,$file,$content);
		
		}*/
	}


?>
