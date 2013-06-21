<?php
//西安电子科技大学后勤服务集团
//或得utf8格式网页内容
$url="http://hqjt.xidian.edu.cn";
$content=file_get_contents("http://hqjt.xidian.edu.cn/index.asp");
//$content=file_get_contents("a");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"index_article");
$content=substr($content,$start);
$end=strpos($content,"友情链接");
$content=substr($content,0,$end);
//echo $content;
preg_match_all('<li.+title.+href=\"(.+)\".+title=\"(.+)\".+target.+span.+style.+999.+\;\"\>(.+)\</span.+\).+>',$content,$info);
//var_dump($info);  // 3 time 2 content 1 link
$m->Insert("西电后勤服务",$info[3],$url,$info[1],$info[2]);
?>
