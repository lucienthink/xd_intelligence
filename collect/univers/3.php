<?php
//教研改革与研究网
//或得utf8格式网页内容
$url="http://jyk.xidian.edu.cn/";
if(!$content=file_get_contents("http://jyk.xidian.edu.cn"))
    return 0;
$content=iconv("gbk","utf-8",$content);
$start=strpos($content," 本站访问统计");
$content=substr($content,$start);
$end=strpos($content,"建议使用");
$content=substr($content,0,$end);
if(empty($content))
    return -1;
  if(!preg_match_all('*更新时间\：(.+)\ *',$content,$date))
      return -2;
  if(!preg_match_all('*点击次数\：.+blank\'\>(.+)\</a.+a.+href=\'(.+)\'.+title*',$content,$info))
      return -2;
if(!$m->Insert("教研改革与研究网",$date[1],$url,$info[2],$info[1]))
    return -3;
//var_dump($info);  //2 link 1 content
?>
