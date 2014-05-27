<?php
	include('var_functions.php'); 
	$var_func = new var_functions();

	$is_allowed = $var_func->check_user_access('staff');
	
	//var_dump($var_func->join_string(array('staff','crew'))); die();
	if($is_allowed != 1){
	  echo "Authentication of user failed.";die();
	}
 //  var_dump($_POST);
  //echo "<pre>", var_dump(json_decode($_POST['data'],true)), "</pre>";
   $data = json_decode($_POST['data'],true);
 //echo "<pre>", var_dump($data), "</pre>";
?>
<html >

<head>

<script src="js/jquery-1.9.1.js" type="text/javascript" language="javascript"></script>

<script src="js/advancedtable_v2.js" type="text/javascript" language="javascript"></script>
	
<script src="js/jquery-ui.js" type="text/javascript" language="javascript"></script>
<script src="js/home.js" type="text/javascript" language="javascript"></script>

<script language="javascript" type="text/javascript">

	$(document).ready(function() {
		$('select').children().remove();
		$("#searchtable").show();

		$("table#staff").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "css/images/up.png", descImage: "css/images/down.png", searchOnField: "#searchOn"});
	});

</script>

<!--<link href="css/style.css" rel="stylesheet" type="text/css" />-->

<link href="css/advancedtable.css" rel="stylesheet" type="text/css" />

<style>

#searchtable td select, input#search {
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.428571429;
	color: #555555;
	background-color: #ffffff;
	background-image: none;
	border: 1px solid #cccccc;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	-webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
	transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}

</style>

</head>

<body>
    <table>
		<tr>
			<td><a class="btn_edit btn btn-default" id="add_class" style="margin-bottom: 7px;"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New Class</a></td>
		</tr>
	</table>
	<table class="normal" id="searchtable" border="0" cellspacing="4" cellpadding="0" style="display:none; width: 100%; margin-bottom: 10px;">
		<tr>
			<td width="80%">
				Search / Filter:  <select id="searchOn" name="searchOn" style="display:none;"/>&nbsp;&nbsp;<input name="search" type="text" id="search" style="display:none;" />
			</td>
			<td width="20%">
				<div id="loader" style="display:none;"><img src="css/images/loader.gif" alt="Laoder" /></div>
			</td>
		</tr>
	</table><!-- /searchtable -->

	<table width="100%" id="staff" class="advancedtable" border="0" cellspacing="0" cellpadding="0">

		<thead>

			<tr>
				<th>Id</th>
				<th>Class</th>
				<th>Enable</th>
				<th>Disable</th>
				<th>Delete</th>
			</tr>

		</thead>

		<tbody>

		<?php
		foreach($data as $info){
		?>
			<tr id = "<?php echo $info['rest_class_id']; ?>">
				<td>
					<?php echo $info['rest_class_id']; ?>
				</td>
				<td>
					<?php echo $info['res_class_desc']; ?>
				</td>
				<td>
					<input type="radio" name="<?php echo $info['rest_class_id']; ?>" />
				</td>
				<td>
					<input type="radio" name="<?php echo $info['rest_class_id']; ?>" />
				</td>
				<td>
					<input type="checkbox" name="delete" />
				</td>
			</tr>

		<?php
		} 
		?>

		</tbody>

	</table><!-- /staff -->


   

</div>
<div id='dialog_class'>

</div>
</body></html>
 