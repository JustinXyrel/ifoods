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

?>
<html >

<head>

<script src="js/jquery-1.9.1.js" type="text/javascript" language="javascript"></script>

<script src="js/advancedtable_v2.js" type="text/javascript" language="javascript"></script>

<script src="js/home.js" type="text/javascript" language="javascript"></script>

<script language="javascript" type="text/javascript">

	$(document).ready(function() {
		$('select').children().remove();
		$("#searchtable").show();

		$("table#staff").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "css/images/up.png", descImage: "css/images/down.png", searchOnField: "#searchOn"});
		$('select').children('[value=0]').text('Name');
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
			<td><a class="btn_edit btn btn-default" id="add_staff"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New Staff</a></td>
		</tr>
	</table>
     <table class="normal" id="searchtable" border="0" cellspacing="4" cellpadding="0" style="display:none; width: 100%; margin-bottom: 10px;">
       <tr>
         <td width="80%">Search / Filter:  <select id="searchOn" name="searchOn" style="display:none;"/>&nbsp;&nbsp;<input name="search" type="text" id="search" style="display:none;" /></td>
         <td width="20%"><div id="loader" style="display:none;"><img src="css/images/loader.gif" alt="Laoder" /></div></td>
       </tr>
     </table><!-- /searchtable -->

     <table width="100%" id="staff" class="advancedtable" border="0" cellspacing="0" cellpadding="0">

     <thead>

		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Contact No.</th>
			<th>Email Address</th>
			<th>Branch</th>
			<th>Account Type</th>
			<th>Account Status</th>
			<th>Activate</th>
		</tr>

     </thead>

       <tbody>

<?php 	foreach($data as $info){ ?>
			<tr>
		<td>
		 <?php 
		   echo implode(" ", array($info['fname'],$info['mname'],$info['lname']));
		  // $name = $var_func->join_string(array($info['fname'],$info['mname'],$info['lname']));
		   //echo $name;
		 
		 ?>
		</td>
		<td>
		 <?php echo implode(" ", array($info['unit_no'],$info['building_name'],$info['street'],$info['town_city'],$info['state_province'],$info['country']));?>
		</td>
		<td>
		 <?php echo $info['contact_no'];?>
		</td>
		<td>
		 <?php echo $info['email_add'];?>
		</td>
		<td>
		 <?php echo $info['branch_desc'];?>
		</td>
		<td>
		 <?php echo $info['user_type'];?>
		</td>
		<td>
		 <?php echo ($info['status'] == 0) ? 'Inactive' : 'Active';?>
		</td>
      	<td>
		  <button id = "update_stat"><?php echo ($info['status'] == 0) ? 'Activate' : 'Deactivate';?></button>
		</td>
			</tr>

   
   <?php
   } 
   ?>

       </tbody>

     </table><!-- /staff -->


   

</div>

</body></html>
 