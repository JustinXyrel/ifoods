<?php
	include('scripts.php');
	include('var_functions.php');
	
	$var_func = new var_functions();
    if($var_func->is_logged_in()){
		echo "<script>  window.location.assign('home.php'); </script>"; 
		die();
	}

 ?>
<style>
 
 #mainContainer {
	max-width: 550px;
	height: 186px;
	
	margin: 15% auto;
 }
 
 #logoBox {
	border-radius: 3px;
	text-align: center;
	max-width: 127px;
	padding: 5px;
	background-color: #e8e8e8;
	margin-bottom: 3px;
	border: 1px solid #7f7f7f;
 }
 
 #logoBox img {
	height: 30px;
 }
 
 #containerBox {
	box-shadow: 0px 3px #919191;
	background: #F0F0F0;
	max-width: 550px;
	height: 186px;
	/* background-color: #FFFFFF; */
	/* border: 1px solid #7f7f7f; */
	border-radius: 5px;
	border-bottom: 21px solid #afafaf;
 }
 
 #BoxHeader {
	height: 33px;
	background-color: #7f7f7f;
	border-radius: 3px 3px 0 0;
	padding-top: 7px;
	padding-left: 18px;
 }
 
 #BoxFooter {
	font-size: 11px;
	text-align: center;
	color: #ffffff;
	padding-top: 14px;
 }
 
 
 .center input[type="text"], input[type="password"] {
	border: 0;
	border-bottom: 1px solid #ccc;
	width: 100%;
	padding: 6px 12px;
	/* border: 1px solid #AAAAAA; */
	border-radius: 3px;
 }
 
 .center td {
	padding: 0 5px 0 5px;
 }
 
 .center input[type="submit"] {
	background-color: #fe0000;
	padding: 6px 24px;
	border: none;
	margin-top: 7px;
	float: right;
	color: #fff;
	border-radius: 3px;
 }
 
 a { color: #e66100 }

 </style>
 
<div id="mainContainer">
 
<div id="logoBox"><img src="images/ifoods_logo.png" /></div>
 
<div id="containerBox">
		
	<div id="BoxHeader"><table style="width: 100%; color: #ffffff; font-weight: bold; font-size: small; padding-top: 5px;"><tr><td>LOGIN TO ADMIN PANEL</td></tr></table></div>
	
	<form method="post" action="#" id="login_form" target="_top">

		<div id = "err_message" style = "background-color:#FF8073; display:none;"></div>
			
		<table class='center' border="0" style="margin: 15px auto; width: 95%;">
			<tr>
				<td>Username</td><td>Password</td>
			</tr>
			<tr>
				<td class="td_padding_left"><input type="text" name="login"></td><td class="td_padding_left"><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="hidden" name="function_name" value="login_user"></td>
			</tr>

			<tr>
				<td><a href="">Forgot your password?</a></td>
				<td><input type="submit" value="Login"></td>
			</tr>
		</table>
		
	</form>

	<div id="BoxFooter" style=""><span class="glyphicon glyphicon-copyright-mark"></span><span> iFoods Corporation | All Rights Reserved 2014</span></div>
	
</div>

</div>


