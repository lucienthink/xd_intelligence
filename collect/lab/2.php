<?php
//电工电子实验中心
//或得utf8格式网页内容
$url="http://eelab.xidian.edu.cn/";
if(!$content=file_get_contents("http://eelab.xidian.edu.cn/"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("a");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"newsmore1");
$content=substr($content,$start);
$end=strpos($content,"更多以往通知");
$content=substr($content,0,$end);
preg_match_all('<.+font.+a.+img.+src.+images.+href=\"(.+)\"\ \>\<font.+color=.+006600\"\ \>(.+)\</font.+font.+color.+\>\((.+)\).+font.+>',$content,$info);
$m->Insert("电工电子实验中心",$info[3],$url,$info[1],$info[2]);
//var_dump($info);  // 3 time 2 conten 1 link
?>
