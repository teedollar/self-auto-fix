<!DOCTYPE html>
<html>

<?php

@session_start();
require_once 'class/User.php';
require_once 'class/Thread.php';

$obj_user = new User();
$obj_thread = new Thread();

if((isset($_SESSION['id'])) && (isset($_SESSION['username'])) )
{

	$inbox_unread = $obj_user->getInboxMessage($_SESSION['username']);
	$inbox_unread = $inbox_unread['inbox_unread'];

}

?>
<head>
	<title>Auto Mechanic| Dectect faults :: Repair faults</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
	    rel='stylesheet' type='text/css'>
</head>

<body>
	<!-- header -->
	<div class="header" id="home">
		<div class="content white agile-info">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
						<a class="navbar-brand" href="index.php">
							<h1><span class="fa fa-signal" aria-hidden="true"></span> Self Fixing <label>Find it Fix it</label></h1>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<ul class="nav navbar-nav">

							<!-- <?php
								//if((isset($_SESSION['id'])) && (isset($_SESSION['username'])) )
								{
									?>
									<li><a href="#" class="effect-3">(HI Username)</a></li>
									<?php
								}
							?> -->
								<li><a href="index.php" class="effect-3">Home</a></li>
								<li class="dropdown">
									<a href="forum.php" class="effect-3" >Forum <b></b></a>
									 
								</li>

								
								
								<?php
									if((isset($_SESSION['id'])) && (isset($_SESSION['username'])) )
									{
										?>
											<li><a href="messagelist.php" class="effect-3">Inbox <?php if ($inbox_unread > 0) { echo '('.$inbox_unread.')'; } ?></a></li>

											<li><a href="logout.php" class="effect-3">Logout</a></li>
										<?php
									}else
									{
										?>
											<li><a href="login.php" class="effect-3">Login</a></li>
										<?php
									}
								

								?>

								
								
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>

	<?php 
	if((isset($_SESSION['id'])) && (isset($_SESSION['username'])))
	{
		?>
		<center>
			<i>howdy</i> <b> <?php echo $_SESSION['username'] ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="thread.php"><input type="submit" value="Create Thread" class="btn btn-success"></a>
		</center><br> 
		<?php
	}

	?>

