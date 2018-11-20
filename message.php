
<?php

if(isset($_GET['u_id']))
{
require_once 'public/header.php';

//  #######################################################################  -->

	if(isset($_POST['send']))
	{
		$message = $_POST['message'];
		$recipent = $_GET['u_id'];


		$obj_user->sendMessage($message, $_SESSION['username'], $recipent);

	}

	//retrieving the conversation

//  #######################################################################  -->
	$message = $obj_user->getMessage($_SESSION['username'], $_GET['u_id'])

?>
	<div class="container">
		
			<div style="border: 1px solid lightblue; border-radius: 30px; margin: 50px; padding: 20px; background: #ffe" >

			<?php
			if(count($message) > 0)
			{

				foreach ($message as $key => $value) {

					if( ($value['receiver'] == $_SESSION['username']) )

					{

					?>

						<div class="row" >

						<!-- Sender, not Session user  -->
							<div align="left" class="col-md-5">
								
									<div style="background: lightblue; padding: 20px; border-radius: 10px; color: #fff; ">
									 		
									 		<?php echo nl2br($value['message']) ?>
									 </div>

								
							</div>

							<div class="col-md-1"></div>

							<div class="col-md-6"></div>
						</div>
						<br>

						<?php

						}

						if( ($value['sender'] == $_SESSION['username']) )

						{

							?>

						<div class="row">
							<!-- Session user  -->
							<div class="col-md-6"></div>

							<div class="col-md-1"></div>

							<div align="right" class="col-md-5">
								
									<div style="background: #e8e8e8; padding: 20px; border-radius: 10px; color: #000; "><?php echo nl2br($value['message']) ?></div>

								
							</div>

						</div>
						<br>

						<?php

						}

					}

				}else
				{
					echo "<center> No conversation between the two of you </center>";
				}

				?>

				
				<br><br>




				<div class="inner_sec_grids_info_w3ls">
					<div class="signin-form">
						<div class="login-form-rec">
							<form action="message.php?u_id=<?php echo $_GET['u_id'] ?>" method="post">
							Message:
								<textarea name="message"> 
								</textarea>

								<input type="submit" value="Send" name="send">
							</form>
						</div>
					</div>
				</div>

		</div>
	</div>

<?php
require_once 'public/footer.php';

}else
{
	echo "You are not authorized to be here";
}

?>