<?php
//实践教学
//或得utf8格式网页内容
$url="http://sjjx.xidian.edu.cn/";
if(!$content=file_get_contents("http://sjjx.xidian.edu.cn"))
    return 0;
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"最新消息");
$content=substr($content,$start);
$end=strpos($content,"图片文档");
$content=substr($content,0,$end);
if(empty($content))
    return -1;
  if(!preg_match_all('<a.+href=\"(.+)\"\>(.+)\</a>',$content,$info))
      return -2;
  if(!preg_match_all('<td.+indl1.+\>(.+)\</td>',$content,$date))
      return -2;
if(!$m->Insert("教务处",$date[1],$url,$info[1],$info[2]))
return -3;
//var_dump($date);  //1 link 2  content
?>
