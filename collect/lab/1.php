<?php
//国学网
//或得utf8格式网页内容
//$url="http://guoxue.xidian.edu.cn/";
$url="";
if(!$content=file_get_contents("http://guoxue.xidian.edu.cn/"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("a");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"右部公告");
$content=substr($content,$start);
$end=strpos($content,"论坛新贴与网站留言");
$content=substr($content,0,$end);
preg_match_all('<li.+style.+float.+right.+\"\>(.+)\</li>',$content,$date);
preg_match_all('<li.+style.+float.+left.+left.+href=\"(.+)\".+target.+blank\"\>(.+)\</a\>\</li>',$content,$info);
$m->Insert("国学网",$date[1],$url,$info[1],$info[2]);
//var_dump($date);  // 3 time 2 conten 1 link
//var_dump($info);  // 3 time 2 conten 1 link
?>
