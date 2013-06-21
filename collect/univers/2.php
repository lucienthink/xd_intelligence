<?php
//学工处
//或得utf8格式网页内容
$url="http://xgc.xidian.edu.cn/";
if(!$content=file_get_contents("http://xgc.xidian.edu.cn"))
    return 0;
//$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"通知公告");
$content=substr($content,$start);
$end=strpos($content,"校内导航");
$content=substr($content,0,$end);
if(empty($content))
    return -1;
  if(!preg_match_all('<a.+href=\"(.+)\".+target.+\>(.+)\<.+a.+span\>(.+)\<.+span>',$content,$info))
      return -2;
//$i=0;
/*while(!empty($info[2][$i]))
{
$info[2][$i]=strip_tags($info[2][$i]);
$i++;
}
 */
//$info[2]=$m->trim_tags($info[2]);
$info[2]=trim_tags1($info[2]);
if(!$m->Insert("学工处",$info[3],$url,$info[1],$info[2]))
    return -3;
	 function trim_tags1($info)
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
