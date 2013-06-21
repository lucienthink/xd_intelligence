<?php
//国际教育学院
//或得utf8格式网页内容
$url="http://sie.xidian.edu.cn/";
@$content=file_get_contents("http://sie.xidian.edu.cn/news.asp");
$content=iconv("gbk","utf-8",$content);
$start=strpos($content,"新闻标题");
$content=substr($content,$start);
$end=strpos($content,"最后页");
$content=substr($content,0,$end);
  preg_match_all('<a.+href=\"(.+)\"\>(.+)\<.+a>',$content,$info);
  //preg_match_all('<td.+hei.+valign.+bgcolor.+\>(.+)\-(.+)\-(.+).+(.+)\ \:(.+)\:(.+)\<.+td>',$content,$info);
  preg_match_all('<td.+hei.+valign.+bgcolor.+\>(.+\-.+\-.+).+(.+\:.+\:.+)\<.+td>',$content,$date);
$m->Insert("国际教育学院",$date[1],$url,$info[1],$info[2]);
//var_dump($info);//1 link 2   content
//var_dump($date);//1 Y-m-d 2   h-M-s
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
