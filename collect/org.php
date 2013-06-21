<?php
/*
*	抓取校内协会通知信息
*	Author:  @peaksnail
*	By peaksnail
*/
	//include_once("../config.php");

	/*function __autoload($classname)
	{
		include ("../class/".strtolower($classname).".class.php");

	}*/

	$m = new Update("org");
	for ($k=1; $k <=4 ; $k++) { 
	if(!include_once("org/".$k.".php"))
	    continue;
	}
		



?>
