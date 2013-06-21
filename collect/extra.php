<?php
/*
*	抓取校内热门信息
*	Author:  @peaksnail
*	By peaksnail
*/
	//include_once("../config.php");

	/*function __autoload($classname)
	{
		include ("../class/".strtolower($classname).".class.php");

	}*/
	$m = new Update("extra");
	for ($k=1; $k <=7 ; $k++) { 
		if(!include_once("extra/".$k.".php"))
		    continue;
	}
		



?>
