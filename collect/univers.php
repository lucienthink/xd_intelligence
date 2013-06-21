<?php
/*
*	抓取学校行政部门通知信息
*	Author:  @peaksnail
*	By peaksnail
*/
//	include_once("../config.php");

/*	function __autoload($classname)
	{
		include ("../class/".strtolower($classname).".class.php");

	}
 */

	$m = new Update("univers");
        
	for ($k=1; $k <=6 ; $k++) { 
		$value=include_once("univers/".$k.".php");
		if($value<=0)
		{
		   // $m->debug("univers",$k,$value);
		    continue;
		}
	}



?>
