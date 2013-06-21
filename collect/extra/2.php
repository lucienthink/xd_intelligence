<?php
//招聘信息西工大
//或得utf8格式网页内容
$url="http://job.nwpu.edu.cn/nwpujy/";
if(!$content=file_get_contents("http://job.nwpu.edu.cn/nwpujy/index.aspx"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("c");
//$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"tdZhongDianGuanZhu");
$content=substr($content,$start);
$end=strpos($content,"日历控件开始");
$content=substr($content,0,$end);
//$content=str_replace("href=\"","\n",$content);
  preg_match_all('<td.+style.+page_time.+title=(.+)\>.+\</td>',$content,$date);
  preg_match_all('<td.+style.+title=(.+)\>\<.+a.+href=\'(.+)\'.+target.+>',$content,$info);  //16个
  preg_match_all('<td.+style.+span.+title=\'(.+)\'\>\<a.+href=\'(.+)\'.+target.+>',$content,$info1);  //8个
$m->Insert("就业招聘",$date[1],$url,$info[2],$info[1]);
$m->Insert("就业招聘",$info[3],$url,$info[2],$info[1]); //没有时间
?>
