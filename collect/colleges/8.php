<?php
//理学院
//或得utf8格式网页内容
$url="http://lxy.xidian.edu.cn/";
@$content=file_get_contents("http://lxy.xidian.edu.cn");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"更多");
$content=substr($content,$start);
$end=strpos($content,"学院单位");
$content=substr($content,0,$end);
  preg_match_all('<a.+target.+href=\"(.+)\".+title=\"(.+)\">',$content,$info);
  preg_match_all('<font.+color.+6565\"\>\((.+)\).+font>',$content,$date);
$m->Insert("理学院",$date[1],$url,$info[1],$info[2]);
  /*
$i=0;
$college=8;
while(!empty($info[1][$i]))
{
    $time=$date[1][$i];
    $link=$url."/".$info[1][$i];
    $content=$info[2][$i];
    //把时间化为unix时间戳，把过期时间过滤掉
    $time=strtotime($time);
    $i++;
    insert($time,$college,$link,$content,"xd_colleges");
}
include_once("../close.php");
   */
?>