<?php
//计算机网络与信息安全
//或得utf8格式网页内容
$url="http://www.xd-cnis.net/";
if(!$content=file_get_contents("http://www.xd-cnis.net/news_more.asp?lm2=65"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("a");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"实验室通知");
$content=substr($content,$start);
$end=strpos($content,"每页显示");
$content=substr($content,0,$end);
//echo $content;
preg_match_all('<a.+href=\"(.+)\".+target.+color.+\"\>(.+)\</font.+a>',$content,$info);
preg_match_all('*\((.+)\)*',$content,$date);
//var_dump($date);  // 3 time 2 conten 1 link
$j=0;
while(!empty($date[1][$j]))
{
   $date[1][$j]=$m->replace($date[1][$j]);
   $j++;
}
$m->Insert("计算机网络与信息安全",$date[1],$url,$info[1],$info[2]);
?>
