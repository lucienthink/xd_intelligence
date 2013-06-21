<?php
//rs失物招领
//或得utf8格式网页内容
$url="http://rs.xidian.edu.cn/";
$content=file_get_contents("http://rs.xidian.edu.cn/forum.php?mod=forumdisplay&fid=142");
//$content=file_get_contents("a");
//$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"版块主题");
$content=substr($content,$start);
$end=strpos($content,"全部悬赏");
$content=substr($content,0,$end);
preg_match_all('<em.+\[.+href.+typeid.+\>.+\</a\>\].+em.+\<.+href=\"(.+)\".+onclick.+class.+\>(.+)\</a>',$content,$info);
$info[1]=$m->replace1($info[1]);
$m->Insert("失物招领",$info[3],$url,$info[1],$info[2]);
//var_dump($info);  // 3 time 2 content 1 link
/*		 function trim_tags($info)
		{
		    $i=0;
		    while(!empty($info[$i]))
		    {
			$info[$i]=strip_tags($info[$i]);
			$i++;
		    }
		    return $info;
		
		}
function replace_dot ($info)
{
 $j=0;
 while(!empty($info[$j]))
 {
     $info[$j]=str_replace(".","-",$info[$j]);
     $j++;
 }
 return $info;
}*/
?>
