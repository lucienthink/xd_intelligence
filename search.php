<?php
/*
*	搜索页
*	Author:  @lucien_think
*	By lucien
*/
	$data = $m->Search($_REQUEST['p'],15);
	include("template/top.html");

?>


		<div class="contents">
			<div class="ct-main ct-search">
				<ul>
				<?php 
					if($data){
						foreach ($data as $value) {
							if($value['time']) $time = date("Y-m-d",$value['time']);
							else $time = " ";
							echo "<li><a href='".$value['url']."' target='_blank'>".$value['content']."</a><small>来自".$value['source']."  </small><big>".$time."</big></li>";
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
		</div>
<?php
	include("template/footer.html");
?>