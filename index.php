<?php
/*
*西电情报处   At 2012/09
*Author: @peaksnail @lucien_think 
*
*
*/
	define( 'IN' , true );

	header('Access-Control-Allow-Origin: *');
	header('Content-type:text/html; charset=UTF-8');
	header('Cache-Control: no-cache');
	header('Pragma: no-cache');


	include_once("config.php");

	function __autoload($classname)
	{
		include ("class/".strtolower($classname).".class.php");

	}
	switch ($_REQUEST['m']) {
		case 'colleges':
			$m = new Main("colleges");
			break;
		case 'lab':
			$m = new Main("lab");
			break;
		case 'univers':
			$m = new Main("univers");
			break;
		case 'org':
			$m = new Main("org");
			break;
		case 'extra':
			$m = new Main("extra");
			break;
		case 'aboutus':
			include("aboutus.php");
			exit();
		case 'archives':
			include("archives.php");
			exit();
		case 'contact':
			include("contact.php");
			exit();
		case 'search':
			$m = new Search();
			include("search.php");
			exit();
		default:
			$m = new Main("all");
			include("showall.php");
			exit();
	}	
	include("showpages.php");

?>