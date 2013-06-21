<?php
//西电新闻网
//或得utf8格式网页内容
$url="http://www.xde6.net/";
if(!$content=file_get_contents("http://www.xde6.net/list-1.html"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("a");
//$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"dotblue");
$content=substr($content,$start);
$end=strpos($content,"上一页");
$content=substr($content,0,$end);
  preg_match_all('<mg.+a.+href=\"(.+)\".+target.+\"\>(.+)\</a.+div.+div.+list.+span\>\[(.+)\].+span>',$content,$info);
$m->Insert("论坛热帖",$info[3],$url,$info[1],$info[2]);
//var_dump($info);  // 3 time 2 conten 1 link
?>
