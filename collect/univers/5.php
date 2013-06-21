<?php
//招生办
//或得utf8格式网页内容
$url="http://zsb.xidian.edu.cn/";
if(!$content=file_get_contents("http://zsb.xidian.edu.cn"))
    return 0;
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"最新信息");
$content=substr($content,$start);
$end=strpos($content,"Copyright");
$content=substr($content,0,$end);
if(empty($content))
    return -1;
  if(!preg_match_all('<li.+a.+href=\"(.+)\".+target.+title.+\"(.+)\">',$content,$info))
      return -2;
$info[1]=$m->replace1($info[1]);
if(!$m->Insert("招生办",$info[3],$url,$info[1],$info[2]))
    return -3;
//var_dump($info);  //1 link 2  content
?>
