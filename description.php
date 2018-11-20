<?php

if (isset($_GET['id']))
{
require_once 'public/cat_nav.php';

ob_start();

$thread_id = $_GET['id'];

$thread = $obj_thread->selectThreadDescription($thread_id);


// ###################################################### 


	
	if(isset($_POST['add']))
	{
		
		$comment = $_POST['comment'];
		$thread_id = $thread['id'];
		
		if($obj_thread->addComment($comment, $thread_id)){
			
			$url = "description.php?id=".$thread['id']."#comment";
			//header("Refresh: 0; URL='$url'");
			//header("Location: $url");
		}else
		{
			$url = "description.php?id=".$thread['id']."#comment";
			//header("Refresh: 0; URL='$url'");
			//header("Location: $url");
		}

	}


	//retrieving all thread's comments

	$comment = $obj_thread->selectThreadComment($thread_id);


// ############################################################## 


?>

	<div class="inner_content_info_agileits">
		<div class="container">
			<div class="row"></div>
			<div class="col-md-1"></div>
			<div class="col-md-10">
			<div class="inner_sec_grids_info_w3ls">
				<div class="col-md-12 job_info_left">
					<div class="but_list">
						<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

						<!-- Topic of the thread -->
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation">
									<b><?php echo $thread['topic'] ?></b>
								</li><br><br>

								<div class="location_box1">
									<h4><a href="profile.php?u_id=<?php echo $thread['username'] ?>"><?php echo $thread['username'] ?></a> <span class="m_1"> on <?php echo $thread['dates']." ".$thread['timess'] ?></span></h4>
								</div>
								<br>
							</ul>

							<!-- Topic of the  thread ends here  -->
							<br>

							<!-- body of the  thread starts here  -->
							<div class="location_box1">
								<p><?php echo nl2br($thread['body']) ?></p>
							</div>

							<ul class="links_bottom">
								<li><a><i class="fa fa-comment"> </i><span class="icon_text"> comment(<?php echo $obj_thread->selectNumThreadComment($thread_id) ?>)</span></a></li>
								<!-- <li><a href="description.php?id=<?php //echo $thread_id ?>&l=like"><i class="fa fa-thumbs-up"> </i> <span class="icon_text">Like</span></a></li> -->
								
							</ul>

							<!-- body of the  thread ends here  -->
							<hr>

							<!-- comment of the  thread starts here  -->

							<?php
							if(count($comment) > 0){
								foreach ($comment as $key => $values) {
								?>

								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
										<div class="tab_grid">
											<div class="col-sm-3 loc_1">
												<a ><img src="<?php echo $values['picture'] ?>" alt="" width="10" height="100"></a>
											</div>

											
											<div class="col-sm-9">
												<div class="location_box1">
													<a href="profile.php?u_id=<?php echo $values['posted_by'] ?>"><?php echo $values['posted_by'] ?> </a><span class="m_1">on <?php echo $values['dates']." ".$values['timess'] ?></span>

													<p><?php echo nl2br($values['comment']) ?></p>

													<?php 
														if (isset($_SESSION['id'])) {
														
													?>

													<ul class="links_bottom">
														<li><a href="#"><i class="fa fa-thumbs-up"> </i><span class="icon_text"> Like</span></a></li>
														<li><a href="#"><i class="fa fa-reply"> </i> <span class="icon_text">Reply</span></a></li>
														
													</ul>

													<?php
													}
													?>
												</div>
											</div>

											
											<div class="clearfix"> </div>
										</div>
										
									</div>
								</div>

								<?php
								}
						}
						?>
						<?php 
						if((isset($_SESSION['id'])) && (isset($_SESSION['username'])))
						{
							?>
							<a name="comment">
							<div class="inner_sec_grids_info_w3ls">
								<div class="signin-form">
									<div class="login-form-rec">
										<form action="description.php?id=<?php echo $thread_id ?>" method="post">
											<textarea name="comment" placeholder="Your comment here"> 
											</textarea>

											<input type="submit" value="Add" name="add">
										</form>
									</div>
								</div>
							</div>
							<?php
						}

						?>

							<!-- comments of the  thread ends here  -->
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="col-md-1"></div>
			<div class="clearfix"></div>
		</div>
	</div>


<?php
require_once 'public/footer.php';

}else
{
	echo "Hey!!! you do not have permission to view this page";
}

?>