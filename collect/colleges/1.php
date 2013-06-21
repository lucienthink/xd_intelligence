<?php
//通院
//或得utf8格式网页内容
$url="http://ste.xidian.edu.cn/";
@$content=file_get_contents("http://ste.xidian.edu.cn");
//$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"通知公告");
$content=substr($content,$start);
$end=strpos($content,"快速通道");
$content=substr($content,0,$end);
  preg_match_all('<li.+href=\"(.+)\".+title=\"(.+)\".+class.+\>.+\<span.+style.+\>.+\((.+)\).+\<.+li>',$content,$info);
$m->Insert("通讯工程学院",$info[3],$url,$info[1],$info[2]);

?>
