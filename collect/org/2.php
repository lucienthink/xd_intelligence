<?php
//西电科协
//或得utf8格式网页内容
$url="http://www.xdkexie.com";
$content=file_get_contents("http://www.xdkexie.com/");
//$content=file_get_contents("a");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"资讯");
$content=substr($content,$start);
$end=strpos($content,"友情链接");
$content=substr($content,0,$end);
preg_match_all('<li.+span.+class.+box_r\"\>(.+)\</span.+href=\"(.+)\".+title=\"(.+)\"\>.+\</a\>\</li>',$content,$info);
//var_dump($info);  // 3 time 2 conten 1 link
$m->Insert("西电科协",$info[1],$url,$info[2],$info[3]);
?>
