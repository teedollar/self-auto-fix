

<?php
require_once 'header.php';

$categories =  $obj_thread->selectAllCarCategories();
?>

<div class="container" >
	<div class="row">
		<div class="col-md-1"></div>

		<?php
		foreach ($categories as $key => $value) {
		?>
		<div class="col-md-1" style="padding: 2px">
			<a href="cat_forum.php?cat_id=<?php echo $value['id'] ?>"><?php echo $value['name']; ?> </a>
		</div>
		<div class="col-md-1"><br></div>
		
		<?php
		}
		?>

		<div class="col-md-1"></div>
	</div>
</div>