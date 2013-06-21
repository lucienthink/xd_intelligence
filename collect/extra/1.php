<?php
//招聘就业
//或得utf8格式网页内容
$url="http://job.xidian.edu.cn/";
if(!$content=file_get_contents("http://job.xidian.edu.cn/"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("c");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"招 聘 会  安 排");
$content=substr($content,$start);
$end=strpos($content,"大学生就业一站式服务系统用户手册");
$content=substr($content,0,$end);
$content=str_replace("href=\"","\n",$content);
  preg_match_all('*(.+)\".+target.+title=\"(.+)\"\>.+\</.+a.+span.+titleTime.+\[(.+)\]*',$content,$info);
$info[2]=trim_tags($info[2]);
$info[3]=replace_dot($info[3]);
$m->Insert("就业招聘",$info[3],$url,$info[1],$info[2]);
//var_dump($info);  // 3 time 2 conten 1 link
		 function trim_tags($info)
		{
		    $i=0;
		    while(!empty($info[$i]))
		    {
			$info[$i]=strip_tags($info[$i]);
			$i++;
		    }
		    return $info;
		
		}
function replace_dot ($info)
{
 $j=0;
 while(!empty($info[$j]))
 {
     $info[$j]=str_replace(".","-",$info[$j]);
     $j++;
 }
 return $info;
}
?>
