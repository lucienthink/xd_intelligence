<?php
//招聘就业 交大
//或得utf8格式网页内容
$url="http://job.xjtu.edu.cn";
if(!$content=file_get_contents("http://job.xjtu.edu.cn/"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("a");
//$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"中心通告");
$content=substr($content,$start);
$end=strpos($content,"推荐企业");
$content=substr($content,0,$end);
  preg_match_all('*target.+title=\"(.+)\"*',$content,$info);
  preg_match_all('*href=\"(.+)\"*',$content,$link);
  preg_match_all('*<font>(.+)*',$content,$date);
  preg_match_all('*<span>(.+)*',$content,$date1);
  $j=0;
  $n=0;
  while(!empty($link[1][$j]))
  {
      if($j==8 || $j==17 || $j==29)
      {
	  $j++;
	  continue;
      }
      else
      {
      $link[1][$n++]=$link[1][$j++];
      }
  
  }
  $link[1][38]=NULL;
  $n=0;
  for($j=0;$j<38;$j++)
  {
      if($j>21)
	  $date[1][$j]=$date1[1][$n++];
  }
$m->Insert("就业招聘",$date[1],$url,$link[1],$info[1]);
?>
