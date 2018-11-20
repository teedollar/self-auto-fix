<?php
require_once 'public/header.php';

?>


	<div class="inner_content_info_agileits">
		<div class="container">

		<!--  #######################################################################  -->

		<?php

			//selecting all car categories
			$category = $obj_thread->selectAllCarCategories();

			if(isset($_POST['create']))
			{
				
				$topic = $_POST['topic'];
				$cat_id = $_POST['category'];
				$body = $_POST['body'];;

				$obj_thread->saveThread($topic, $cat_id, $body);

			}

		?>

		<!--  #######################################################################  -->

			<div class="inner_sec_grids_info_w3ls">
				<div class="signin-form">
					<div class="login-form-rec">
						<form action="thread.php" method="post">

						<b>Subject</b>
							<input type="text" name="topic"  value="<?php  if(isset($_POST['topic'])) { echo $_POST['topic']; } ?>" >

							<b>Category</b>
							<select id="country13" name="category" class="frm-field required" text-align="left">
								<option value="">Choose a category</option>
								<?php
									foreach ($category as $key => $value) 
									{  ?>

										<option value="<?php echo $value['id']; ?>">
											<?php echo $value['name']; ?>
										</option>

									<?php	
									}
								?>      
							</select>

							<b>Body</b>
							<textarea name="body"> <?php  if(isset($_POST['body'])) { echo $_POST['body']; } ?> 
							</textarea>

							<input type="submit" value="Create" name="create">
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/bootstrap.js"></script>

<?php
require_once 'public/footer.php';

?>
