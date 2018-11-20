

<?php

if(isset($_GET['u_id']))
{
	require_once 'public/header.php';

	$username = $_GET['u_id'];

	$user = $obj_user->selectUser($username);

	if(($user['num']) == 1)
	{

	?>
	<br><br><br>
		<div class="container">
		<!-- /mid-services -->
		<div class="mid_services">

		<div class="col-md-1"></div>
			<div class="col-md-4">
				<img src="<?php echo $user['picture'] ?>" height="200" width="290"><br><br>

				<center>
				<?php
				if(isset($_SESSION['id']))
				{
					if($user['username'] == $_SESSION['username']){
					
					}else
					{
						?>

						<a href="message.php?u_id=<?php echo $user['username']; ?>"><input type="submit" class="btn btn-default" value="Send Message"></a>
						<?php
					}
				}
					?>
				</center>
			</div>

			<div class="col-md-6 according_inner_grids">
				<center><h4 class="agile_heading two "><?php echo $user['username'] ?>'s Profile</h4></center>
				<div class="according_info">
					<div class="panel-group about_panel" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading"  id="headingOne">
								Full Name
							</div>
							<div class="panel-collapse collapse in" aria-labelledby="headingOne">
								<div class="panel-body panel_text">
									<b><?php echo $user['first_name']." ".$user['last_name'] ?></b>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading"  id="headingOne">
								Gender
							</div>
							<div class="panel-collapse collapse in" aria-labelledby="headingOne">
								<div class="panel-body panel_text">
									<b><?php echo $user['gender'] ?></b>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading"  id="headingOne">
								Email
							</div>
							<div class="panel-collapse collapse in" aria-labelledby="headingOne">
								<div class="panel-body panel_text">
									<b><?php echo $user['email'] ?></b>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading"  id="headingOne">
								About <?php echo $user['username'] ?>
							</div>
							<div class="panel-collapse collapse in" aria-labelledby="headingOne">
								<div class="panel-body panel_text">
									<b><?php echo $user['about_you'] ?></b>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-1"></div>

			
		</div>
		<!-- //mid-services -->
		</div>


	<?php
	require_once 'public/footer.php';
	
	}else
	{
		echo "<center> This is very wrong </center>";
	}

}else
{
	echo "<center> You are not authorized to view this page </center>";
}
?>