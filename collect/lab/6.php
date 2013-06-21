<?php
//智能感知与图像理解
//或得utf8格式网页内容
$url="http://see.xidian.edu.cn/iiip/";
$content=file_get_contents("http://see.xidian.edu.cn/iiip/");
//$content=file_get_contents("a");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"新闻动态");
$content=substr($content,$start);
$end=strpos($content,"健康的成长");
$content=substr($content,0,$end);
//echo $content;
preg_match_all('*更新时间：(.+)\ *',$content,$date);
preg_match_all('*点击.+blank\'\>(.+)\</a.+td.+font.+999.+\>.+\</font.+img.+href=\'(.+)\'.+title*',$content,$info);
$m->Insert("智能感知与图像理解",$date[1],$url,$info[2],$info[1]);
//var_dump($info);  // 3 time 2 content 1 link
?>
