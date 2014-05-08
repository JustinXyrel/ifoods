
<html>
	<body>
	<div id="add_staff" >
					
						<form id="add_staff_form" class="ac-login" action="?" method="post">

							<div id="validation_msg" class="msg_container" style="display: none;"><h2 id="val_msg"></h2></div>
				 
							<table border="0" style="width: 100%;">
								<tr>
									<td colspan="2" style="text-align:left;">
										<h3 style="margin-top: 0px;">Personal Information</h3>
										<div style='display:none;background-color:#FF8073;' id = 'err_msg'></div>
									</td>

								</tr>
								<tr>
									<td class="padding_left">First Name *</td>
									<td class="padding_right"><input class="form-control" type="text" name="fname" id="fname"/></td>
								</tr>
								<tr>
									<td class="padding_left">Middle Name</td>
									<td class="padding_right"><input class="form-control" type="text" name="mname" id="mname"/></td>
								</tr>
								<tr>
									<td class="padding_left">Last Name *</td>
									<td class="padding_right"><input class="form-control" type="text" name="lname" id="lname"/></td>
								</tr>
								<tr>
									<td class="padding_left">Gender *</td>
									<td style="padding-left: 6px;">
										<!--
										<div class="btn-group">
											<button type="button" id="male" class="btn btn-default" style="width: 100px;">Male</button>
											<button type="button" id="female" class="btn btn-default" style="width: 100px;">Female</button>
										</div>
										-->
										
										<div id="radioset">
											<input type="radio" id="radio1" name="radio" checked><label for="radio1">Male</label>
											<input type="radio" id="radio3" name="radio"><label for="radio3">Female</label>
										</div>
										
										<input type="hidden" id="gender_val" name="gender"/>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:left;"><h3>Address</h3></td>
								</tr>
								<tr>
									<td class="padding_left">Unit No.</td>
									<td class="padding_right"><input class="form-control" type="text" name="unit_no" id="unit_no"/></td>
								</tr>
								<tr>
									<td class="padding_left">Building No./ Name</td>
									<td class="padding_right"><input class="form-control" type="text" name="building_name" id="building_name"/></td>
								</tr>
								<tr>
									<td class="padding_left">Street *</td>
									<td class="padding_right"><input class="form-control" type="text" name="street" id="street"/></td>
								</tr>
								<tr>
									<td class="padding_left">City/ Town *</td>
									<td class="padding_right"><input class="form-control" type="text" name="town_city" id="town_city"/></td>
								</tr>
								<tr>
									<td class="padding_left">State/Province</td>
									<td class="padding_right"><input class="form-control" type="text" name="state_province" id="state_province"/></td>
								</tr>
								<tr>
									<td class="padding_left">Country *</td>
									<td class="padding_right">
										<select class="res_select form-control"  id = "country" name="country">
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
									<td class="padding_right"><input class='form_date form-control' type="date" style="" type="text" name="birth_date" id="birth_date"/></td>
								</tr>
								<tr>
								<td class="padding_left">User Level *</td>
									<td class="padding_right">
										Manager
									</td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:left;"><h3>Contact Information</h3></td>
								</tr>
								<tr>
									<td class="padding_left">Contact No. *</td>
									<td class="padding_right"><input class="form-control" type="text" name="contact_no" id="contact_no"/></td>
								</tr>
								<tr>
									<td class="padding_left">Username / Email Address *</td>
									<td class="padding_right"><input class="form-control" type="email" name="email_add" id="email_add" placeholder="Enter email address"/></td>
								</tr>

								<tr>
									<td class="padding_left">Account Activation*</td>
									<td style="padding-left: 6px;">
										<!--
										<div class="btn-group">
											<button type="button" id="male" class="btn btn-default" style="width: 100px;">Male</button>
											<button type="button" id="female" class="btn btn-default" style="width: 100px;">Female</button>
										</div>
										-->
										
										<div id="radioset">
											<input type="radio" id="radio1" name="radio" checked><label for="radio1">Activate</label>
											<input type="radio" id="radio3" name="radio"><label for="radio3">Deactivate</label>
										</div>
										
										<input type="hidden" id="gender_val" name="gender"/>
									</td>
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
		</div>
	</body>
</html>