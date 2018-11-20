<?php
require_once '../public/adminheader2.php';

?>


	<div class="inner_content_info_agileits">
		<div class="container">

		

			<div class="tittle_head_w3ls">
				<h3 class="tittle three">Add Category Page <?php  ?> </h3>
			</div><br>

			<!--  #######################################################################  -->

			<?php
				if(isset($_POST['add']))
				{
					$category_name = $_POST['cat_name'];

					$obj_admin->addCategory($category_name);

					//echo "jghjghghghghjg hvhvghgj hjvhvh";
				}

			?>

		<!--  #######################################################################  -->

			<div class="inner_sec_grids_info_w3ls">
				<div class="signin-form">
					<div class="login-form-rec">
						<form action="category.php" method="post">
							<input type="text" name="cat_name" placeholder="Category Name" >
							<input type="submit" value="ADD" name="add">
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/bootstrap.js"></script>

<?php
require_once '../public/footer.php';

?>
