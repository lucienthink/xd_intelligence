<?php
//论坛热贴
//或得utf8格式网页内容
$url="http://rs.xidian.edu.cn/";
if(!$content=file_get_contents("http://rs.xidian.edu.cn/forum.php"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("a");
//$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"本周热帖");
$content=substr($content,$start);
$end=strpos($content,"今日水神");
$content=substr($content,0,$end);
//$content=str_replace("href=\"","\n",$content);
  preg_match_all('*回复数.+blank.+>(.+)<.+a.+li.+href=\"(.+)\".+title*',$content,$info);
  preg_match_all('*<ol><li><a href=\"(.+)\".+楼主：*',$content,$one);
  preg_match_all('*回复数.+blank.+>(.+)<.+a.+li.+</ol*',$content,$two);
  //调整信息
  for($j=9;$j>=0;$j--)
  {
      $info[2][$j]=$info[2][$j-1];
      if($j==9)
	  $info[1][$j]=$two[1][0];
      if($j==0)
	  $info[2][$j]=$one[1][$j];
  
  }
$info[1]=trim_tags3($info[1]);
$m->Insert("论坛热帖",$info[3],$url,$info[2],$info[1]);
//var_dump($info);  // 3 time 2 conten 1 link
		 function trim_tags3($info)
		{
		    $i=0;
		    while(!empty($info[$i]))
		    {
			$info[$i]=strip_tags($info[$i]);
			$i++;
		    }
		    return $info;
		
		}
?>
