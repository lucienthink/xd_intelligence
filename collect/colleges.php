<?php
/*
*	抓取学院通知信息
*	Author:  @peaksnail
*	By peaksnail
*/
//	include_once("../config.php");
/*
	function __autoload($classname)
	{
		include ("../class/".strtolower($classname).".class.php");

	}*/
	$m = new Update("colleges");
	for ($k=1; $k <=15 ; $k++) { 
	    if(!include_once("colleges/".$k.".php"))
		continue;
	}
		



?>
