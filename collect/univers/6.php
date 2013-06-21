<?php
//组织部
//或得utf8格式网页内容
$url="http://210.27.1.2/new";
if(!$content=file_get_contents("http://210.27.1.2/new/index.asp"))
    return 0;
//$content=file_get_contents("a");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"-工作动态start");
$content=substr($content,$start);
$end=strpos($content,"公示end");
$content=substr($content,0,$end);
if(empty($content))
    return -1;
//echo $content;
  if(!preg_match_all('*\[.+span.+style.+\"\>(.+)\</span.+\]*',$content,$date))
      return -2;
  if(!preg_match_all('<a.+href=\"\.(.+)\".+target.+title=\'(.+)\'\>.+\</a.+td.+>',$content,$info))
      return -2;
if(!$m->Insert("组织部",$date[1],$url,$info[1],$info[2]))
    return -3;
//var_dump($info);  //2 link 1 content
?>
