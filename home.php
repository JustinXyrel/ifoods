<?php
	include('scripts.php'); 
	include('var_functions.php'); 
	$var_func = new var_functions();
	
	if(!isset($_SESSION)){
		session_start();
	}
	if(!$var_func->is_logged_in()){
		echo "<script>window.location.assign('index.php');</script>";
	}
?>

<style>

</style>

<script>

</script>

<body>

<div id="homeMainContainer">

	<div id="header">
		<?php include 'includes/header.php'; ?>
	</div><!-- /header -->

	<div id="content">
	
		<!-- menu left pane -->
		<?php include 'includes/menu_left_pane.php'; ?>
		
		<div id="content_display">
		
		</div><!-- /content_display -->
		
	</div><!-- /content -->
	
	<!-- footer -->
		<?php include 'includes/footer.php'; ?>

</div><!-- /homeMainContainer -->

</body>

