<?php
/*
*	分页显示页
*	Author:  @lucien_think
*	By lucien
*/
	$data = $m->Select($_REQUEST['p'],15,$_REQUEST['b']);
	$data_source = $m->Selectsource();
	include("template/top.html");

?>


		<div class="contents">
			<div class="ct-inner">
				<div class="ct-main">
					<ul>
					<?php
						if($data){
							foreach ($data as $value) {
								if($value['time']) $time = date("Y-m-d",$value['time']);
								else $time = " ";
								echo "<li><a href='".$value['url']."' target='_blank'>".$value['content']."</a><a href='/?m=".$_REQUEST['m']."&p=".$_REQUEST['p']."&b=".$value['source']."'><small>来自".$value['source']."  </small></a><big>".$time."</big></li>";
							}
						}						
					?>
					</ul>
					<div class="page">
						<ul>
						<?php
							$m->Page(12,15);				
						?>
						</ul>
					</div>
				</div>
				<aside class="ct-sidebar">
					<ul>
					<?php
						if($data_source){
							foreach ($data_source as $value) {
								echo "<li><a href='/?m=".$_REQUEST['m']."&p=&b=".$value."'>".$value."</a></li>";
							}
						}
					?>
					</ul>
					<img src="img/aside.gif" alt="">

				</aside>
			</div>
		</div>
<?php
	include("template/footer.html");
?>