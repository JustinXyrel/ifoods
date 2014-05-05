<?php
	include('var_functions.php'); 

	$var_func = new var_functions();

	$is_allowed = $var_func->check_user_access('staff');
	if($is_allowed != 1){
	  echo "Authentication of user failed.";die();
	}
 //  var_dump($_POST);
  //echo "<pre>", var_dump(json_decode($_POST['data'],true)), "</pre>";
   $data = json_decode($_POST['data'],true);
	//echo "yahooooo!!";
	

?>
   <table id = "staff">
	<tbody>
	<tr>
	  <th>Name</th>
	  <th>Account Type</th>
	 </tr>
	</tbody>
 <?php 	foreach($data as $info){ ?>
	<tr>
		<td>
		 <?php echo $info['fname'].' '.$info['mname'].' '.$info['lname']?>
		</td>
		<td>
		 <?php echo $info['user_type']?>
		</td>
	</tr>

   
   <?php
   } 
   ?>
      </table>