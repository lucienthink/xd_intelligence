<?php
//生命科学技术学院
//或得utf8格式网页内容
$url="http://life.xidian.edu.cn/";
@$content=file_get_contents("http://life.xidian.edu.cn");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"学院通知");
$content=substr($content,$start);
$end=strpos($content,"相关链接");
$content=substr($content,0,$end);
  preg_match_all('<span.+class.+date.+\>(.+).+\</span.+href=\"(.+)\"\>(.+)\<.+a.+li>',$content,$info);
$m->Insert("生命科学技术学院",$info[1],$url,$info[2],$info[3]);
//$i=0;
//var_dump($info);//1 time 2 link 3 content

?>
