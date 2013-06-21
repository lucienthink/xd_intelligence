<?php
//物理实验
//或得utf8格式网页内容
$url="http://lxy.xidian.edu.cn";
if(!$content=file_get_contents("http://lxy.xidian.edu.cn/pec/PhyEws/default.aspx"))
{
echo "cannot access the website";
return false;
}
//$content=file_get_contents("c");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"忘记密码及其");
$content=substr($content,$start);
$end=strpos($content,"更多通知");
$content=substr($content,0,$end);
//$content=str_replace("href=\"","\n",$content);
  preg_match_all('<td.+a.+href=\'(.+)\'.+target.+blank>',$content,$link);
  preg_match_all('<span.+id.+news.+Label1\"\>(.+)\</span>',$content,$info);
  preg_match_all('*</a>\((.+)\)*',$content,$date);
  $date[1]=replace_slash($date[1]);
$m->Insert("物理实验",$date[1],$url,$link[1],$info[1]);
//var_dump($date);  // 3 time 2 conten 1 link
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
 */
//将时间反转过来
function replace_slash($info)
{
    $j=0;
    while(!empty($info[$j]))
    {
	/*$info[$j]=str_replace("/","-",$info[$j]);
	$info[$j]=str_replace("M","",$info[$j]);
	$info[$j]=str_replace("P","",$info[$j]);
	$info[$j]=str_replace("A","",$info[$j]);*/
	$start=strpos($info[$j]," ");
	$info[$j]=substr($info[$j],0,$start);
	$time=explode("/",$info[$j]);
	$info[$j]=$time[2]."-".$time[0]."-".$time[1];
    	$j++;
    }	
	return $info;
}
?>
