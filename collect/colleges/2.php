<?php
//电子工程学院
//链接数据库
//或得utf8格式网页内容
$url="http://see.xidian.edu.cn/";
@$content=file_get_contents("http://see.xidian.edu.cn");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"新闻通知");
$content=substr($content,$start);
$end=strpos($content,"新闻关键字");
$content=substr($content,0,$end);
$content=str_replace("font ","\n",$content);
    preg_match_all("*\[(.+)\].+href=(.+) target.+blank\>(.+)\</a*",$content,$info);
$m->Insert("电子工程学院",$info[1],$url,$info[2],$info[3]);
/*while(!empty($info[1][$i]))
{
    $college=2;
    $time=$info[1][$i];
    $path=$url."/".$info[2][$i];
    $content=$info[3][$i];
    //把时间化为unix时间戳，把过期时间过滤掉
    $time=strtotime($time);
    $i++;
    if(is_exist($path,"xd_colleges"))
	continue;
     $sql="insert into xd_colleges (colleges,url,content,time) values('$college','$path','$content','$time')";
    if(!mysql_query($sql))
    {
	echo "insert into error\n";
	exit -2;
    }
}
include_once("../close.php");
=======
$m->Insert("电子工程学院",$info[1],$url."/",$info[2],$info[3]);
>>>>>>> .r223
 */
?>
