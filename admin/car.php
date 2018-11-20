<?php
require_once '../public/adminheader2.php';

?>


	<div class="inner_content_info_agileits">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle three">Add Vehicle </h3>
			</div><br>

			<!--  #######################################################################  -->

			<?php
				//selecting all car categories
				$category = $obj_admin->selectAllCarCategories();

				if(isset($_POST['add']))
				{
					$car_name = $_POST['car_name'];
					$category_name = $_POST['category'];

					$obj_admin->addCar($category_name, $car_name);

				}

			?>

		<!--  #######################################################################  -->

			<div class="inner_sec_grids_info_w3ls">
				<div class="signin-form">
					<div class="login-form-rec">
						<form action="car.php" method="post">
							<input type="text" name="car_name"  placeholder="Car name"  >
							<select id="country13" name="category" class="frm-field required">
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
							
							<input type="submit" value="ADD CAR" name="add">
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
