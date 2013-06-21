<?php
/*
*	安全验证类
*	Author:  @lucien_think
*	By @lucien_think
*/
	class Safe
	{
		//url安全验证
		public function urlChecker(){
			if($_SERVER['REQUEST_URI']){
				$url = $_SERVER['REQUEST_URI'];
				$keyword=array("'",";","union"," ","　","and","‘","“");
				foreach ($keyword as  $value) {
					if(strstr($url, $value))  die('<script type="text/javascript" charset="utf-8" async defer>alert("亲，别这样啊！手下留情~~")</script>');
				}
			}
		}

		//page页数安全验证
		public function pChecker(){
			if($_REQUEST['p']){
				if(preg_match("/[^\d]/", $_REQUEST['p']))  die('<script type="text/javascript" charset="utf-8" async defer>alert("亲，别这样啊！手下留情~~")</script>');
				if(strlen($_REQUEST['p'])>3)  die('<script type="text/javascript" charset="utf-8" async defer>alert("亲，别这样啊！手下留情~~")</script>');
			}
		}

		//branch分支安全验证
		public function bChecker(){
			if($_REQUEST['b']){
				if(strlen($_REQUEST['b'])>30)  die('<script type="text/javascript" charset="utf-8" async defer>alert("亲，别这样啊！手下留情~~")</script>');
			}
		}

		//search查询字符串安全验证
		public function sChecker(){
			if($_REQUEST['s']){
				$keyword=array("'",";","union","and","‘","“");
				foreach ($keyword as  $value) {
					if(strstr($_REQUEST['s'], $value))  die('<script type="text/javascript" charset="utf-8" async defer>alert("亲，别这样啊！手下留情~~")</script>');
				}
				$_REQUEST['s'] = strtr($_REQUEST['s'], " ", "%");
			}
		}
	}




?>