<?php
//雷达信号处理
//或得utf8格式网页内容
$url="http://rsp.xidian.edu.cn/";
if(!$content=file_get_contents("http://rsp.xidian.edu.cn/"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("a");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"网站址地");
$content=substr($content,$start);
$end=strpos($content,"网站搜索");
$content=substr($content,0,$end);
//echo $content;
  preg_match_all('*title=\'.+：(.+)*',$content,$info);
  preg_match_all('</a\>\ \((.+)\)\</li>',$content,$date);
  preg_match_all('*<a.+class.+twice.+href=\'(.+)\'.+title*',$content,$link);
$info[1]=trim_tags5($info[1]);
$m->Insert("雷达信号处理",$date[1],$url,$link[1],$info[1]);
//var_dump($link);  
		 function trim_tags5($info)
		{
		    $i=0;
		    while(!empty($info[$i]))
		    {
			$info[$i]=strip_tags($info[$i]);
			$i++;
		    }
		    return $info;
		
		}
 
?>
