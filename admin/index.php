

<?php
require_once '../public/adminheader1.php';

?>
<div class="inner_content_info_agileits">
	<div class="container"><br>

		<!--  #######################################################################  -->

		<?php
			if(isset($_POST['login']))
			{
				$email = strtolower($_POST['email']);
				$password = strtolower($_POST['password']);

				$obj_admin->login($email, $password);

				//echo "jghjghghghghjg hvhvghgj hjvhvh";
			}

			?>

		<!--  #######################################################################  -->

		<div class="inner_sec_grids_info_w3ls">
			<div class="signin-form">
				<div class="login-form-rec">
					<form action="index.php" method="post">
						<input type="email" name="email" placeholder="E-mail">
						<input type="password" name="password" placeholder="Password" >
						<div class="tp">
							<input type="submit" value="Login" name="login">
						</div>
					</form>
				</div><br>
				
			</div>
		</div>
	</div>
</div>
	

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->

	<!-- //password-script -->
	<script type="text/javascript" src="js/bootstrap.js"></script>


	<!-- // footer -->

	<?php
require_once '../public/footer.php';

?>


	