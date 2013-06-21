<?php
//失物招领
//或得utf8格式网页内容
$url="http://lost.inxidian.com/";
if(!$content=file_get_contents("http://lost.inxidian.com"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("a");
//$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"详情描述");
$content=substr($content,$start);
$end=strpos($content,"您好！欢迎来到失物招");
$content=substr($content,0,$end);
//$content=str_replace("href=\"","\n",$content);
  preg_match_all('<td.+class.+td_width_10\"\>\<span\>(.+)\</span\>\</td>',$content,$name);
  preg_match_all('<td.+class.+td_width_16\"\>\<span\>(.+)\</span\>\</td>',$content,$date);
  preg_match_all('<td.+class.+td_width_16.+span.+class.+object_place\"\>(.+)\</span\>\</td>',$content,$where);
  preg_match_all('<td.+object_name.+target.+href=(.+).+title.+\>(.+)\</a>',$content,$what);
  //preg_match_all('<td.+target.+blank.+href=(.+).+title.+\>\<span\>(.+)\</span\>\</a>',$content,$detail);
  preg_match_all('<td.+target.+blank.+href=(.+).+title.+\>\<span\>(.+)\</a>',$content,$detail);
  $detail[2]=trim_tags2($detail[2]);
  //结合信息
   $j=0;
 while(!empty($name[1][$j])) 
 {
     $do=($j>6) ? "捡到":"丢失";
 $detail[2][$j]=$name[1][$j]."同学 于".$date[1][$j]."在".$where[1][$j].$do.$what[2][$j]."  详情:".$detail[2][$j];
 $j++; 
 }
$m->Insert("失物招领",$date[1],$url,$detail[1],$detail[2]);
//var_dump($detail);  // 3 time 2 conten 1 link
		 function trim_tags2($info)
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
