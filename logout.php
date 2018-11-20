<?php
	@session_start();

	if((isset($_SESSION['id'])) && (isset($_SESSION['username'])) ){
		session_destroy();
		unset($_SESSION['id']);
		unset($_SESSION['username']);

		$url = "index.php";
		header("Location:index.php ");
	}

?>