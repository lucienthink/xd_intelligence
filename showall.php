<?php
/*
*	首页显示页
*	Author:  @lucien_think
*	By lucien
*/
	include("template/top.html");

?>
<script src="js/tag.js" type="text/javascript"></script>

<div class="contents">
	<div class="all-inner">
		<div id="tag">
			<?php
			$data_source = $m->SelectsourceAll();
			if($data_source){
				for ($i=0; $i < count($data_source[0]); $i++) {
					if($data_source[1][$i]){
						foreach ($data_source[1][$i] as $value) {
							echo "<a href='/?m=".substr($data_source[0][$i],3)."&p=&b=".$value."'>".$value."</a>";
						}	
					}
				}
			}				
			?>
		</div>
		<div class="line">
			<div class="cell">
				<h2><a href="/?m=colleges">学院通知</a></h2>
				<ul>
				<?php
					$m->type = "xd_colleges";
					$data = $m->Select(1,6,null);
					if($data){
						foreach ($data as $value) {
							if($value['time']) $time = date("Y-m-d",$value['time']);
							else $time = " ";
							echo "<li><a href='".$value['url']."' target='_blank'>".$value['content']."</a><a href='/?m=".$_REQUEST['m']."&p=".$_REQUEST['p']."&b=".$value['source']."'><small>来自".$value['source']."  </small></a><big>".$time."</big></li>";
						}
					}	
				?>
				</ul>
			</div>
			<div class="cell">
				<h2><a href="/?m=univers">学校通知</a></h2>
				<ul>
				<?php
					$m->type = "xd_univers";
					$data = $m->Select(1,6,null);
					if($data){
						foreach ($data as $value) {
							if($value['time']) $time = date("Y-m-d",$value['time']);
							else $time = " ";
							echo "<li><a href='".$value['url']."' target='_blank'>".$value['content']."</a><a href='/?m=".$_REQUEST['m']."&p=".$_REQUEST['p']."&b=".$value['source']."'><small>来自".$value['source']."  </small></a><big>".$time."</big></li>";
						}
					}	
				?>
				</ul>
			</div>
		</div>
		<div class="line">
			<div class="cell">
				<h2><a href="/?m=lab">实验室通知</a></h2>
				<ul>
				<?php
					$m->type = "xd_lab";
					$data = $m->Select(1,6,null);
					if($data){
						foreach ($data as $value) {
							if($value['time']) $time = date("Y-m-d",$value['time']);
							else $time = " ";
							echo "<li><a href='".$value['url']."' target='_blank'>".$value['content']."</a><a href='/?m=".$_REQUEST['m']."&p=".$_REQUEST['p']."&b=".$value['source']."'><small>来自".$value['source']."  </small></a><big>".$time."</big></li>";
						}
					}	
				?>
				</ul>	
			</div>
			<div class="cell">
				<h2><a href="/?m=org">校内协会</a></h2>
				<ul>
				<?php
					$m->type = "xd_org";
					$data = $m->Select(1,6,null);
					if($data){
						foreach ($data as $value) {
							if($value['time']) $time = date("Y-m-d",$value['time']);
							else $time = " ";
							echo "<li><a href='".$value['url']."' target='_blank'>".$value['content']."</a><a href='/?m=".$_REQUEST['m']."&p=".$_REQUEST['p']."&b=".$value['source']."'><small>来自".$value['source']."  </small></a><big>".$time."</big></li>";
						}
					}	
				?>
				</ul>
			</div>
		</div>	
		<div class="hot">
			<div class="hotcell">
				<h2><a href="/?m=extra&p=&b=论坛热帖">论坛热帖</a></h2>
				<ul>
				<?php
					$m->type = "xd_extra";
					$data = $m->Select(1,6,"论坛热帖");
					if($data){
						foreach ($data as $value) {
							echo "<li><a href='".$value['url']."' target='_blank'>".$value['content']."</a></li>";
						}
					}	
				?>
				</ul>
			</div>
			<div class="hotcell">
				<h2><a href="/?m=extra&p=&b=失物招领">失误招领</a></h2>
					<ul>
						<?php
							$m->type = "xd_extra";
							$data = $m->Select(1,4,"失物招领");
							if($data){
								foreach ($data as $value) {
									echo "<li><a href='".$value['url']."' target='_blank'>".$value['content']."</a></li>";
								}
							}	
						?>
					</ul>
			</div>
			<div class="hotcell">
				<h2><a href="/?m=extra&p=&b=就业招聘">就业招聘</a></h2>
				<ul>
					<?php
						$m->type = "xd_extra";
						$data = $m->Select(1,8,"就业招聘");
						if($data){
							foreach ($data as $value) {
								echo "<li><a href='".$value['url']."' target='_blank'>".$value['content']."</a></li>";
							}
						}	
					?>
				</ul>
			</div>
		</div>
			
	</div>
</div>

<?php
	include("template/footer.html");
?>