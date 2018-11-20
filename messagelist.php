
<?php
@session_start();
if(isset($_SESSION['username']))
{
require_once 'public/header.php';

//  #######################################################################  -->



		$all_message = $obj_user->getUserMessage($_SESSION['username']);




?>
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>

			<div class="col-md-10">
				
			<table class="table">
				<?php  
				if(count($all_message) > 0)
				foreach ($all_message as $key => $value) {
				?><tbody>
					<tr>
						<td>
							<a href="message.php?u_id=<?php echo $value['sender']  ?>"><?php 
									echo $value['sender']." (".$value['cnt'].")";

									 
								 ?>
									
								</a>
						</td>
					</tr>

					<tr>
						<td><?php echo $value['message'] ?></td>
					</tr>
				  </tbody>

				<?php

				}
				else
				{
					echo "<center> You currently do not have any message </center>";
				}

				?>
			</table>


			</div>

			<div class="col-md-1"></div>
		</div>
		
			
	</div>

<?php
require_once 'public/footer.php';

}else
{
	echo "You are not authorized to be here";
}

?>