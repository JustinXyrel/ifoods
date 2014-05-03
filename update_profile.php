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
		//var_dump($_SESSION['auth']);?>
		
<html>		
		
<style>

#main_profile table {
	/*width: 100%;*/
	/*margin-bottom: 25px;*/
	/*text-align: left;*/
}

.padding_left {
	padding-left:25px;
}



table h3 {
	font-weight: bold;
}
</style>

<body>

<div id="homeMainContainer">

	<div id="header">
		<?php include 'includes/header.php'; ?>
	</div><!-- /header -->

	<div id="content">
	
		<div id="content_display">
	
		<div id='main_profile' >

			<div id="view_profile">
			
				<div id="validation_msg" class="msg_container"><h2 id="val_msg"></h2></div>
			 
				<table border="0" style="width: 100%;">
					<tr>
						<td colspan="2" style="text-align:left;">
							<h3 style="margin-top: 0px;">Personal Information</h3>
							<div style='display:none;background-color:#FF8073;' id = 'err_msg'></div>
						</td>
						<td style="padding-right: 3px;"><input type="button" id="btn_edit" style="width:50%;height:100%" value="Edit"/></td>
					</tr>
					<tr>
						<td class="padding_left">First Name </td>
						<td class="padding_right"><label name="fname" id="fname"/></label></td>
					</tr>
					<tr>
						<td class="padding_left">Middle Name</td>
						<td class="padding_right"><label name="mname" id="mname"/></label></td>
					</tr>
					<tr>
						<td class="padding_left">Last Name </td>
						<td class="padding_right"><label name="lname" id="lname"/></label></td>
					</tr>
					<tr>
						<td class="padding_left">Gender </td>
						<td style="padding-left">
							<label id="gender"></label>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:left;">
							<h3>Address</h3>
						</td>
					</tr>
					<tr>
						<td class="padding_left">Unit No.</td>
						<td class="padding_right"><label name="unit_no" id="unit_no"/></label></td>
					</tr>
					<tr>
						<td class="padding_left">Building No./ Name</td>
						<td class="padding_right"><label name="building_name" id="building_name"/></label></td>
					</tr>
					<tr>
						<td class="padding_left">Street</td>
						<td class="padding_right"><label name="street" id="street"/></label></td>
					</tr>
					<tr>
						<td class="padding_left">City/ Town</td>
						<td class="padding_right"><label name="town_city" id="town_city"/></label></td>
					</tr>
					<tr>
						<td class="padding_left">State/Province</td>
						<td class="padding_right"><label name="state_province" id="state_province"/></label></td>
					</tr>
					<tr>
						<td class="padding_left">Country</td>
						<td class="padding_right">
						<label  id = "country" name="country">
							</select>
						</td>
					</tr>
					<tr>
						<td class="padding_left">Date of Birth</td>
						<td class="padding_right"><label class='form_date'  style="" name="birth_date" id="birth_date"/></label></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:left;">
							<h3>Contact Information</h3>
						</td>
					</tr>
					<tr>
						<td class="padding_left">Contact No.</td>
						<td class="padding_right"><label name="contact_no" id="contact_no"/></label></td>
					</tr>
					<tr>
						<td class="padding_left">Email Address</td>
						<td class="padding_right"><label name="email_add" id="email_add" /></label></td>
					</tr>
				</table>
				
			</div><!-- /view_profile -->
			

			<div id="update_profile" style="display:none;" >
			
				<form id="update_form" class="ac-login" action="?" method="post">

					<div id="validation_msg" class="msg_container" style="display: none;"><h2 id="val_msg"></h2></div>
		 
					<table border="0" style="width: 100%;">
						<tr>
							<td colspan="2" style="text-align:left;">
								<h3 style="margin-top: 0px;">Personal Information</h3>
								<div style='display:none;background-color:#FF8073;' id = 'err_msg'></div>
							</td>
							<td style="padding-right: 3px;"><input type="button" id="btn_close" value="Close"/></td>
						</tr>
						<tr>
							<td class="padding_left">First Name *</td>
							<td class="padding_right"><input type="text" name="fname" id="fname"/></td>
						</tr>
						<tr>
							<td class="padding_left">Middle Name</td>
							<td class="padding_right"><input type="text" name="mname" id="mname"/></td>
						</tr>
						<tr>
							<td class="padding_left">Last Name *</td>
							<td class="padding_right"><input type="text" name="lname" id="lname"/></td>
						</tr>
						<tr>
							<td class="padding_left">Gender *</td>
							<td style="padding-left: 6px;">
								<input type="radio" name="gender" id="genderOn" value="m" hidden="" checked="">
								<label for="genderOn" class="switch switch--on">Male</label>
								<input type="radio" name="gender" id="genderOff" value="f" hidden="">
								<label for="genderOff" class="switch switch--off">Female</label>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:left;"><h2>Address</h2></td>
						</tr>
						<tr>
							<td class="padding_left">Unit No.</td>
							<td class="padding_right"><input type="text" name="unit_no" id="unit_no"/></td>
						</tr>
						<tr>
							<td class="padding_left">Building No./ Name</td>
							<td class="padding_right"><input type="text" name="building_name" id="building_name"/></td>
						</tr>
						<tr>
							<td class="padding_left">Street *</td>
							<td class="padding_right"><input type="text" name="street" id="street"/></td>
						</tr>
						<tr>
							<td class="padding_left">City/ Town *</td>
							<td class="padding_right"><input type="text" name="town_city" id="town_city"/></td>
						</tr>
						<tr>
							<td class="padding_left">State/Province</td>
							<td class="padding_right"><input type="text" name="state_province" id="state_province"/></td>
						</tr>
						<tr>
							<td class="padding_left">Country *</td>
							<td class="padding_right">
								<select class="res_select"  id = "country" name="country">
									<option value=""></option>
									<option value="Philippines">Philippines</option>
									<option value="Australia">Australia</option>
									<option value="Singapore">Singapore</option>
									<option value="Japan">Japan</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="padding_left">Date of Birth *</td>
							<td class="padding_right"><input class='form_date' type="date" style="" type="text" name="birth_date" id="birth_date"/></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:left;"><h2>Contact Information</h2></td>
						</tr>
						<tr>
							<td class="padding_left">Contact No. *</td>
							<td class="padding_right"><input type="text" name="contact_no" id="contact_no"/></td>
						</tr>
						<tr>
							<td class="padding_left">Email Address *</td>
							<td class="padding_right"><input type="text" name="email_add" id="email_add" placeholder="Enter your email"/></td>
						</tr>

						<tr>
							<td class="padding_left">Current Password *</td>
							<td class="padding_right"><input type="password" id="current_password" name="current_password" placeholder="Current Password"/></td>
						</tr>
						<tr>
							<td class="padding_left">New Password </td>
							<td class="padding_right"><input type="password" id="password" name="password" placeholder="Password"/></td>
						</tr>
						<tr>
							<td></td>
							<td class="padding_right"><input type="password" id="confpass" placeholder="Re-enter Password"/></td>
						</tr>
					</table>
			
					<table border="0"style="text-align:center; margin: 0 auto;">
						<tr>
							<td><input type="hidden" id = "u_id" /></td>
							<td><input type="hidden" id = "cur_p" /></td>
							<td style="padding-right: 3px;"><input type="button" id="btn_submit" value="Save"/></td>
							<td style="padding-left: 3px;"><input id="btn_cancel" type="button" value="Cancel"/></td>
						</tr>
					</table> 
		  
				</form>

			<div id='confirm_add' style='display:none;' >
				<table>
					<tr>
						<td>
							<img src='https://d2g691qpj752hh.cloudfront.net/AcrestaPhilippines/phil1/thumbsUpOrange.png'>
						</td>
						<td>
							Your profile was successfully updated.
						</td>
					</tr>
				</table>
			</div><!-- /confirm_add -->
			
			</div><!-- /update_profile -->
			
		</div><!-- /main_profile -->

		</div><!-- /content_display -->
		
	</div><!-- /content -->
	
		<?php include 'includes/footer.php'; ?>

</div><!-- /homeMainContainer -->

</body>

</html>

<?php


?>