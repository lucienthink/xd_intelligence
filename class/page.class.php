<?php
/*
*	分页类
*	Author: @peaksnail @lucien_think
*	by @lucien_think
*/
	class Page
	{
		
		function __construct()
		{
			
		}

		public function Showpage($num,$epage,$page){
			echo "<li class='page_info'>共".$page."页</li>";
			if($_REQUEST['p']) $p = $_REQUEST['p'];
			else $p = 1;
			if(1 == $p) $dom = "";
			else $dom = "<li><a href='/?m=".$_REQUEST['m']."&p=1&b=".$_REQUEST['b']."'><<</a></li>"."<li><a href='/?m=".$_REQUEST['m']."&p=".($p-1)."&b=".$_REQUEST['b']."'><</a></li>";
			echo $dom;
			if($p<=ceil($num/2)){
				for ($i=1; $i <= $num && $i <= $page; $i++) { 
					if($i == $p) echo "<li class='active_page'><a href='/?m=".$_REQUEST['m']."&p=".$i."&b=".$_REQUEST['b']."'>".$i."</a></li>";
					else echo "<li><a href='/?m=".$_REQUEST['m']."&p=".$i."&b=".$_REQUEST['b']."'>".$i."</a></li>";
				}
			}else{
				for ($i=($p-ceil($num/2)); $i < ($p+ceil($num/2)) && $i <= $page; $i++) { 
					if($i == $p) echo "<li class='active_page'><a href='/?m=".$_REQUEST['m']."&p=".$i."&b=".$_REQUEST['b']."'>".$i."</a></li>";
					else echo "<li><a href='/?m=".$_REQUEST['m']."&p=".$i."&b=".$_REQUEST['b']."'>".$i."</a></li>";
				}
			}

			if($page == $p) $dom = "";
			elseif($page != $p) $dom = "<li><a href='/?m=".$_REQUEST['m']."&p=".($p+1)."&b=".$_REQUEST['b']."'>></a></li>"."<li><a href='/?m=".$_REQUEST['m']."&p=".$page."&b=".$_REQUEST['b']."'>>></a></li>";
			else $dom = "<li><a href='/?m=".$_REQUEST['m']."&p=2&b=".$_REQUEST['b']."'>></a></li>"."<li><a href='/?m=".$_REQUEST['m']."&p=".$page."&b=".$_REQUEST['b']."'>>></a></li>";
			echo $dom;	
		}

		public function Showsearchpage($num,$epage,$page){
			echo "<li class='page_info'>共".$page."页</li>";
			if($_REQUEST['p']) $p = $_REQUEST['p'];
			else $p = 1;
			if(1 == $p) $dom = "";
			else $dom = "<li><a href='/?m=".$_REQUEST['m']."&p=1&b=".$_REQUEST['b']."&s=".$_REQUEST['s']."'><<</a></li>"."<li><a href='/?m=".$_REQUEST['m']."&p=".($p-1)."&b=".$_REQUEST['b']."&s=".$_REQUEST['s']."'><</a></li>";
			echo $dom;
			if($p<=ceil($num/2)){
				for ($i=1; $i <= $num && $i <= $page; $i++) { 
					if($i == $p) echo "<li class='active_page'><a href='/?m=".$_REQUEST['m']."&p=".$i."&b=".$_REQUEST['b']."&s=".$_REQUEST['s']."'>".$i."</a></li>";
					else echo "<li><a href='/?m=".$_REQUEST['m']."&p=".$i."&b=".$_REQUEST['b']."&s=".$_REQUEST['s']."'>".$i."</a></li>";
				}
			}else{
				for ($i=($p-ceil($num/2)); $i < ($p+ceil($num/2)) && $i <= $page; $i++) { 
					if($i == $p) echo "<li class='active_page'><a href='/?m=".$_REQUEST['m']."&p=".$i."&b=".$_REQUEST['b']."&s=".$_REQUEST['s']."'>".$i."</a></li>";
					else echo "<li><a href='/?m=".$_REQUEST['m']."&p=".$i."&b=".$_REQUEST['b']."&s=".$_REQUEST['s']."'>".$i."</a></li>";
				}
			}

			if($page == $p) $dom = "";
			elseif($page != $p) $dom = "<li><a href='/?m=".$_REQUEST['m']."&p=".($p+1)."&b=".$_REQUEST['b']."&s=".$_REQUEST['s']."'>></a></li>"."<li><a href='/?m=".$_REQUEST['m']."&p=".$page."&b=".$_REQUEST['b']."&s=".$_REQUEST['s']."'>>></a></li>";
			else $dom = "<li><a href='/?m=".$_REQUEST['m']."&p=2&b=".$_REQUEST['b']."&s=".$_REQUEST['s']."'>></a></li>"."<li><a href='/?m=".$_REQUEST['m']."&p=".$page."&b=".$_REQUEST['b']."&s=".$_REQUEST['s']."'>>></a></li>";
			echo $dom;	
		}

	}


?>