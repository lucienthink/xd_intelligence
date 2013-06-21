<?php
/*
*	抓取所有信息
*	Author:  @peaksnail
*	By peaksnail
*/
	include("../config.php");
/*
	  function __autoload($classname)
	{
		include ("../class/".strtolower($classname).".class.php");

	}
*/
	include("../class/connect.class.php");
	include("../class/update.class.php");
	$con = new Connect();

	include_once("colleges.php");	
	include_once("lab.php");	
	include_once("univers.php");	
	include_once("org.php");	
	include_once("extra.php");	


	if($con) $con->CloseDB();


?>
