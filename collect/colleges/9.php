<?php
//微电子学院
//链接数据库
//或得utf8格式网页内容
	$arr=array(0=>'?id=209',1=>'?id=208',2=>'?id=210',3=>'?id=211');
	for($i=0;$i<4;$i++){
		$url="http://sme.xidian.edu.cn/news.asp";
		@$content=file_get_contents($url.$arr[$i]);
		$content=iconv("gbk","utf-8",$content);
		$start=strpos($content,"xueyuanxinwen_09");
		$content=substr($content,$start);
		$end=strpos($content,"现在是第");
		$content=substr($content,0,$end);
		//匹配时间
		  preg_match_all('<td.+width=\"10.+\".+class.+\>(.+).+\<.+td>',$content,$date);
		//匹配链接
		preg_match_all('<a.+href=\"(.+)\".+target.+>',$content,$link);
		//匹配内容
		$content=str_replace("\n","",$content);
		$content=str_replace("href","\n",$content);
		preg_match_all("*target.+blank\"\>(.+).+\</a\>*", $content, $info);
		$m->Insert("微电子学院",$date[1],$url,$link[1],$info[1]);
		unset($info);
	}
?>
