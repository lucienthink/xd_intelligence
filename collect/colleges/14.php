<?php
//研究生院
//或得utf8格式网页内容
$url="http://gr.xidian.edu.cn/";
@$content=file_get_contents("http://gr.xidian.edu.cn");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"全部公告");
$content=substr($content,$start);
$end=strpos($content,"glrk");
$content=substr($content,0,$end);
  preg_match_all('<a.+href=\"(.+)\".+class.+\>(.+)\((.+)\)\<.+a>',$content,$info);
$m->Insert("研究生院",$info[3],$url,$info[1],$info[2]);
//$i=0;
//var_dump($info);//1 link 2 content 3 time
//var_dump($info[1]);
/*
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
