<?php
//技术物理学院
//或得utf8格式网页内容
$url="http://stp.xidian.edu.cn/";
$content=file_get_contents("http://stp.xidian.edu.cn/Default.aspx");
$start=strpos($content,"news1top");
$content=substr($content,$start); 
$end=strpos($content,"news4top");
$content=substr($content,0,$end);
$content=str_replace("href","\n",$content);
preg_match_all('*=\"(.+)\".+target.+color.+\>(.+)\<.+font\>*',$content,$info1);
preg_match_all('*=\"(.+)\".+target.+color.+\>(.+)\<.+font.+class.+titleTime.+\>\[(.+)\]\</span.+img*',$content,$info2);
$m->Insert("技术物理学院",$info2[3],$url,$info2[1],$info2[2]);
$m->Insert("技术物理学院",$info1[3],$url,$info1[1],$info1[2]);
//info1网页中没有时间，所以穿进去空置，在main里判断了   1 path 2content 
//info2是好的     1 path 2 content 3 time 

?>
