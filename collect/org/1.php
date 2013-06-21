<?php
//校团委
//或得utf8格式网页内容
$url="http://youth.xidian.edu.cn/";
$content=file_get_contents("http://youth.xidian.edu.cn/");
//$content=file_get_contents("a");
//$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"midlist");
$content=substr($content,$start);
$end=strpos($content,"研究生会");
$content=substr($content,0,$end);
preg_match_all('<div.+img.+a.+href=\"(.+)\".+target.+blank.+title=\"(.+)\"\>.+\</a.+span\>\[(.+)\]\</span>',$content,$info);
//var_dump($info);  // 3 time 2 conten 1 link
$m->Insert("校团委",$info[3],$url,$info[1],$info[2]);
?>
