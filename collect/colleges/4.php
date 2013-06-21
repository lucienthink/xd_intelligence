<?php
//机电工程学院
//链接数据库
//或得utf8格式网页内容

$url="http://eme.xidian.edu.cn";
@$content=file_get_contents("http://eme.xidian.edu.cn");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"01_ok_04_01.gif");
$content=substr($content,$start);
$end=strpos($content,"01_ok_04_06.gif");
$content=substr($content,0,$end);
//$content=file_get_contents("a");
    preg_match_all('<a.+href=\"(.+)\".+title=\"(.+)\">',$content,$info);
    preg_match_all('<span.+STYLE8.+\>\[(.+)\].+br>',$content,$date);
for ($i=0; $i < count($date[1]); $i++) { 
	$date[1][$i] = $m->replace($date[1][$i]);
}
$m->Insert("机电工程学院",$date[1],$url."/",$info[1],$info[2]);
?>
