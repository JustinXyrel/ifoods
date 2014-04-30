<?php include('scripts.php'); 
         if(!isset($_SESSION)){
			session_start();
		  }
		//var_dump($_SESSION['auth']);?>
<style>

  .paddedBox {
    max-width: 800px;
    padding: 0;
    padding-right: 0;
    background-color: transparent;
    border: none;
  }
  
  h1 {
    color: #e73f31;
    font-weight: 300;
    margin-left:0;
    margin-right:0;
  }
  
  #h1_reg {
    color: #FFFFFF;
    text-decoration: none;
    text-shadow: 0px 1px 0px #a18b6d;
    margin-bottom: 0;
    margin-top: 30px;
  }
  
  th, td {
  	padding: 0;
  }
  
  
   input[type="submit"],  input[type="button"]{
    -moz-box-shadow: 0px 1px 0px 0px #99241c;
    -webkit-box-shadow: 0px 1px 0px 0px #99241c;
    box-shadow: 0px 1px 0px 0px #99241c;
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f03427), color-stop(1, #ba1a0f));
    background:-moz-linear-gradient(top, #f03427 5%, #ba1a0f 100%);
    background:-webkit-linear-gradient(top, #f03427 5%, #ba1a0f 100%);
    background:-o-linear-gradient(top, #f03427 5%, #ba1a0f 100%);
    background:-ms-linear-gradient(top, #f03427 5%, #ba1a0f 100%);
    background:linear-gradient(to bottom, #f03427 5%, #ba1a0f 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f03427', endColorstr='#ba1a0f',GradientType=0);
    background-color:#f03427;
    -moz-border-radius:6px;
    -webkit-border-radius:6px;
    border-radius:6px;
    border:1px solid #eb827b;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:arial;
    font-size:15px;
    font-weight:bold;
    padding:6px 24px;
    text-decoration:none;
    text-shadow:0px 1px 0px #575757;
    height: 45px;
    width: 100%;
  } 
  input[type="submit"]:hover,  input[type="button"]:hover {
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ba1a0f), color-stop(1, #f03427));
    background:-moz-linear-gradient(top, #ba1a0f 5%, #f03427 100%);
    background:-webkit-linear-gradient(top, #ba1a0f 5%, #f03427 100%);
    background:-o-linear-gradient(top, #ba1a0f 5%, #f03427 100%);
    background:-ms-linear-gradient(top, #ba1a0f 5%, #f03427 100%);
    background:linear-gradient(to bottom, #ba1a0f 5%, #f03427 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ba1a0f', endColorstr='#f03427',GradientType=0);
    background-color:#ba1a0f;
  }
  input[type="submit"]:active,  input[type="button"]:active  {
    position:relative;
    top:1px;
  }
  
  .switch {
    cursor: pointer;
    font-weight: 600;
    line-height: 1.5em;
    border-radius: 3px;
    padding: 4px 9px;
    display: inline-block;
    -webkit-transition: .15s ease;
    -moz-transition: .15s ease;
    -ms-transition: .15s ease;
    -o-transition: .15s ease;
    transition: .15s ease;
    text-align: center;
    color: #464647;
    width: 43%;
    border: 1px solid #CCC;
    background: #EEE;
    height: 25px;
    float: left;
  }
    
  input[type="radio"]:checked + .switch {
    color: #fff;
  }
    
  input[type="radio"]:checked + .switch--on {
    background-color: #1A5C99;
    
    border: 1px solid #5F5F5F;
  }
    
  input[type="radio"]:checked + .switch--off {
    background-color: #1A5C99;
  }
  
  
  .help-block ul {
    margin-bottom: -10px;
    margin-top: -10px;
    background-color: rgb(245, 197, 197);
    border-radius: 5px;
    border: 1px solid rgb(246, 33, 33);
    padding: 0px;
    list-style: none;
    font-size: small;
    margin-left: 3px;
		width: 90%;
  }
  
  .padding_left {padding-left:25px;}
  
  .padding_right {padding-right:30px;}
  
 textarea, input[type=text], input[type=email], input[type=url], input[type=tel], input[type=password] {
  padding: 6px;
  border: 1px solid #AAA;
}
  
</style>
<div id = 'main_profile' >
<div id = "view_profile">
<div id="validation_msg" class="msg_container"><h2 id="val_msg"></h2></div>
 
  <table border="0" style="width:100%; margin-bottom: 25px; text-align: left;">
    <tr>
      <td colspan="2" style="text-align:left;"><h2 style="margin-top: 0px;">Personal Information</h2><div style='display:none;background-color:#FF8073;' id = 'err_msg'></div></td>
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
          <label id="gender">
        
          </label>
      </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:left;"><h2>Address</h2></td>
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
      <td colspan="2" style="text-align:left;"><h2>Contact Information</h2></td>
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
	

</div>

<div id = "update_profile" style="display:none;" >
<form id="update_form" class="ac-login" action="?" method="post" id="">

<div id="validation_msg" class="msg_container"><h2 id="val_msg"></h2></div>
 
  <table border="0" style="width:100%; margin-bottom: 25px; text-align: left;">
    <tr>
      <td colspan="2" style="text-align:left;"><h2 style="margin-top: 0px;">Personal Information</h2><div style='display:none;background-color:#FF8073;' id = 'err_msg'></div></td>
	  <td style="padding-right: 3px;"><input type="button" id="btn_close" style="width:50%;height:100%" value="Close"/></td>
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
          <label for="genderOn" class="switch switch--on">
            Male
          </label>
          <input type="radio" name="gender" id="genderOff" value="f" hidden="">
          <label for="genderOff" class="switch switch--off">
            Female
          </label>
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
    <tr>
      <td class="padding_left">New Password </td>
      <td class="padding_right"><input type="password" id="password" name="password" placeholder="Password"/></td>
    </tr>
    <tr>
      <td></td>
      <td class="padding_right"><input type="password" id="confpass" placeholder="Re-enter Password"/></td>
    </tr>

  </table>
	
  <table style="margin:0 auto; padding:0; text-align:center; width:80%;">
    <tr>
      <td><input type="hidden" id = "u_id" /></td>
      <td><input type="hidden" id = "cur_p" /></td>
      <td style="padding-right: 3px;"><input type="button" id="btn_submit" style="width:100%; height:45px;" value="Save"/></td>
      <td style="padding-left: 3px;"><input id="btn_cancel" style="width:100%; height:45px;" type="button" value="Cancel"/></td>
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
</div>
</div>
</div>




<?php


?>