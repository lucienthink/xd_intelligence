<?php
//教务处
//或得utf8格式网页内容
$url="http://jwc.xidian.edu.cn/";
if(!$content=file_get_contents("http://jwc.xidian.edu.cn"))
    return 0;
//$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"同济大学教务处");
$content=substr($content,$start);
$end=strpos($content,"卓越计划");
$content=substr($content,0,$end);
if(empty($content))
    return -1;
  if(!preg_match_all('<LI.+\[(.+)\].+\<A.+href=\"(.+)\".+title=\"(.+)\">',$content,$info))
      return -2;
if(!$m->Insert("教务处",$info[1],$url,$info[2],$info[3]))
    return -3;
//var_dump($info);  //1 time 2 link 3 content
/*
$i=0;
while(!empty($info[1][$i]))
{
    $college=1;
    $time=$info[3][$i];
    $path=$url.$info[1][$i];
    $content=$info[2][$i];
    //把时间化为unix时间戳，把过期时间过滤掉
    $time=strtotime(date('Y')."-".$time);
    $i++;
    if(is_exist($path,"xd_colleges"))
	continue;
    if($time>time())
	continue;
     $sql="insert into xd_colleges (colleges,url,content,time) values('$college','$path','$content','$time')";
    if(!mysql_query($sql))
    {
	echo "insert into error\n";
	exit -2;
    }
}
 */
?>
