

<?php
require_once 'public/header.php';

$category = $obj_thread->selectAllCarCategories();

if(isset($_POST['search'])){
	$cat_id = $_POST['cat_id'];
	header("Location: cat_forum.php?cat_id=$cat_id");
}

?>
	<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<div class="container">
					<div class="carousel-caption">
						<h3>Improving workplace <span>Productivity.</span></h3>
						<p>Hire. Train. Retain.</p>
						
					</div>
				</div>
			</div>
			<div class="item item2">
				<div class="container">
					<div class="carousel-caption">
						<h3>Inspiring leadership <span>innovation.</span></h3>
						<p>Hire. Train. Retain.</p>
						
					</div>
				</div>
			</div>
			<div class="item item3">
				<div class="container">
					<div class="carousel-caption">
						<h3>Improving workplace <span>Productivity.</span></h3>
						<p>Hire. Train. Retain.</p>
						
					</div>
				</div>
			</div>
			<div class="item item4">
				<div class="container">
					<div class="carousel-caption">

						<h3>Inspiring leadership <span>innovation.</span></h3>
						<p>Hire. Train. Retain.</p>
						<!-- <div class="agileits-button top_ban_agile">
							<a class="btn btn-primary btn-lg scroll" href="#welcome" role="button">Read More »</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
	</div>
	<!--//banner -->

	<!--/search_form -->
	<div id="search_form" class="search_top">
		<h2>Ask a question and get a real time response</h2>
		<center>
			<form action="index.php" method="post">
				<input type="text" placeholder="Search categories &gt;&gt;" disabled="disabled" >
				<select id="country12" onchange="change_country(this.value)" class="frm-field required" name="cat_id">
					<option value="null"> Select Category</option>
					<?php
						foreach ($category as $key => $value) {
							?>
							<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>

							<?php
						}
					?>
															
				</select>
				<input type="submit" value="Search" name="search">
				<div class="clearfix"></div>
			</form>
		</center>
	</div>
	<!--//search_form -->

	<!-- //banner-bottom -->
	
	<!-- services -->
	<a name="daily_tips">
	<div class="services" id="services">
		<div class="container">
			<div class="tittle_head_w3ls">
				<h3 class="tittle">Automobiles Tips</h3>
			</div>
			<div class="inner_sec_grids_info_w3ls">
				<div class="col-md-3 services-left">
					<div class="services-left-top">

						<h5>Check & Change Oil Regularly</h5>

					</div>
					<div class="services-left-top services-left-top1">

						<h5>Flush the cooling system and change coolant once a year</h5>

					</div>
				</div>
				<div class="col-md-6 services-middle">
					<div class="services-middle-img">
						<img src="images/process.jpg" alt="" />
					</div>
					<div class="services-middle-grids">
						<div class="col-md-6 services-middle-left">
							<div class="services-left-top">

								<h5>Change out oils</h5>

							</div>
						</div>
						<div class="col-md-6 services-middle-left">
							<div class="services-left-top">

								<h5>Keep it clean</h5>

							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 services-left">
					<div class="services-left-top">

						<h5>Moving parts need grease </h5>

					</div>
					<div class="services-left-top services-left-top1">

						<h5>Driveline components require regular lubrication</h5>

					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //services -->

	<!-- // footer -->

	<?php
require_once 'public/footer.php';

?>


	