<?php
/*
*	抓取实验室通知信息
*	Author:  @peaksnail
*	By peaksnail
*/
	//include_once("../config.php");

	 /* function __autoload($classname)
	{
		include ("../class/".strtolower($classname).".class.php");

	}
	  */
	$m = new Update("lab");
	for ($k=1; $k <=7 ; $k++) { 
		if(!include_once("lab/".$k.".php"))
		    continue;
	}
		



?>
