<?php
require_once 'public/header.php';

?>


	<div class="inner_content_info_agileits">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle three">Register Now </h3>
			</div><br>

		<!--  #######################################################################  -->

		<?php
			if(isset($_POST['register']))
			{
				$f_name = $_POST['f_name'];
				$l_name = $_POST['l_name'];
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$c_password = $_POST['c_password'];
				$gender = $_POST['gender'];
				$about_u = $_POST['about_u'];

				


				$obj_user->register($f_name, $l_name, $username, $email, $password, $c_password, $gender, $about_u);

			}

		?>

		<!--  #######################################################################  -->

			<div class="inner_sec_grids_info_w3ls">
				<div class="signin-form">
					<div class="login-form-rec">
						<form action="signup.php" method="post">
							<b>Firstname</b>
							<input type="text" name="f_name" value="<?php  if(isset($_POST['f_name'])) { echo $_POST['f_name']; } ?>">

							<b>Lastname</b>
							<input type="text" name="l_name" value="<?php  if(isset($_POST['l_name'])) { echo $_POST['l_name']; } ?>">

							<b>Username</b>
							<input type="text" name="username" value="<?php  if(isset($_POST['username'])) { echo $_POST['username']; } ?>">

							<b>Email</b>
							<input type="email" name="email" value="<?php  if(isset($_POST['email'])) { echo $_POST['email']; } ?>">

							<b>Password</b>
							<input type="password" name="password" id="password1" >

							<b>Password again</b>
							<input type="password" name="c_password" id="password2" >

							<select id="country13" class="frm-field required" name="gender"  value="<?php  if(isset($_POST['gender'])) { echo $_POST['gender']; } ?> ">

							 	<option value="">Choose your gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option> 

							</select>

							<b>About you (not more than 75 characters)</b>
							<textarea name="about_u"> <?php  if(isset($_POST['about_u'])) { echo $_POST['about_u']; } ?> 
							</textarea>

							<input type="submit" value="Register" name="register">
						</form>
					</div>
					<p class="reg"> By clicking register, I agree to your terms</p>

				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/bootstrap.js"></script>

<?php
require_once 'public/footer.php';

?>
