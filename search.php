<?php 
	require_once('scripts.php'); 
	require_once('conn.php');
?>

<html>
	<body>
	
	<form id='product_search' style='width: 80%; margin: 0 auto;'>
		 
		<div class='row'>
		  <div class="col-xs-12 col-sm-12 col-md-12 " >
			<div class="input-group" style='padding: 7px; margin: 0 14px;'>
			  <input type="text" class="form-control input-lg" placeholder="Leave this blank to view all products.." name='inp_search' id='inp_search'>
			  <span class="input-group-btn">
				<button class="btn btn-default btn-lg" type="button" id='btn_search'>
					<span class="glyphicon glyphicon-search"></span> Search</button>
			  </span>
			  
			</div><!-- /input-group -->
		  </div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
		
		<div id="search_result" class='table-responsive'></div>
		<div id='dialog-form'></div>
		<div id='dialog-confirm'></div>
	<form>
	
	</body>
</html>