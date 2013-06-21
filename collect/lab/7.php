<?php
//图书馆
//或得utf8格式网页内容
$url="http://www.lib.xidian.edu.cn/";
$content=file_get_contents("http://www.lib.xidian.edu.cn/news.aspx");
//$content=file_get_contents("a");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"新闻通知");
$content=substr($content,$start);
$end=strpos($content,"下一页");
$content=substr($content,0,$end);
preg_match_all('<a.+href=\'(.+)\'.+list\'\>(.+)\</a\>.+nbsp;\ (.+)\ .+\<br.+>',$content,$info);
$m->Insert("图书馆",$info[3],$url,$info[1],$info[2]);
//var_dump($info);  // 3 time 2 content 1 link
?>
