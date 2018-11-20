<?php

if(isset($_GET['cat_id']))
{
	require_once 'public/cat_nav.php';
	$cat_id = $_GET['cat_id'];

	$thread = $obj_thread->selectThreadByCategory($cat_id);

	?>

	<div class="inner_content_info_agileits">
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="location_box1" >
					
						<?php  

							
							foreach ($thread as $key => $value) {
								?>
									<center>
									<a href="description.php?id=<?php echo $value['id'] ?>" style="color: #000">
										<p  class="fa fa-info">&nbsp;&nbsp;&nbsp;&nbsp;
											<b><?php echo  $value['topic'] ?></b>
										</p>
									</a>
									</center>
								<?php
							}

						 ?>
						 	
					</div>
					<hr>
				</div>
			<div class="col-md-1"></div>
		</div>
		
		
	</div>
</div>

<?php

}

?>