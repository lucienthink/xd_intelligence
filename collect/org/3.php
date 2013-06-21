<?php
//电院学生会
//或得utf8格式网页内容
$url="http://see.xidian.edu.cn/xsh";
$content=file_get_contents("http://see.xidian.edu.cn/xsh/");
//$content=file_get_contents("a");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"阅读全文");
$content=substr($content,$start);
$end=strpos($content,"热门文章");
$content=substr($content,0,$end);
$content=str_replace("href","\n",$content);
preg_match_all('*=\"\.(.+)\".+target.+blank\"\>(.+)\</a.+font\>(.+)\</font>*',$content,$info);
//var_dump($info);  // 3 time 2 content 1 link
$m->Insert("电院学生会",$info[3],$url,$info[1],$info[2]);
?>
