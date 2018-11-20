<?php
require_once 'public/header.php';

?>

	
	<!-- /inner_content -->
	<div class="inner_content_info_agileits">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle three">LogIn to your Account </h3>
			</div><br>

			<!--  #######################################################################  -->

		<?php
			if(isset($_POST['login']))
			{

				$username = $_POST['username'];
				$password = $_POST['password'];

				$obj_user->login($username, $password);

			}

		?>

		<!--  #######################################################################  -->
			<div class="inner_sec_grids_info_w3ls">
				<div class="signin-form">
					<div class="login-form-rec">
						<form action="login.php" method="post">
							<input type="text" name="username" placeholder="E-mail" >
							<input type="password" name="password" placeholder="Password" >
							<div class="tp">
								<input type="submit" value="Login" name="login">
							</div>
						</form>
					</div><br>
					<!-- <div class="login-social-grids">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div> -->
					<p><a href="signup.php"> Don't have an account?</a></p>
				</div>
			</div>
		</div>
	</div>
	

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->

	<!-- //password-script -->
	<script type="text/javascript" src="js/bootstrap.js"></script>

<?php
require_once 'public/footer.php';

?>