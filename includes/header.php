<?php
	include('scripts.php'); 
	$var_func = new var_functions();
	
	if(!isset($_SESSION)){
		session_start();
	}
	//echo "<pre>",print_r($_SESSION['auth']),"</pre>";
	if($var_func->is_logged_in()){
	    $username = ucfirst($_SESSION['auth']['0']['username']);
		$usertype_id = ucfirst($_SESSION['auth']['0']['user_type_id']);
		$account_type = ucwords(str_replace('_', ' ' ,$_SESSION['auth']['0']['user_type']));
	} else {
		echo "<script>window.location.assign('index.php');</script>";
	}
?>

	
		<div id="contentleft">
			<img src="images/ifoods_logo_2.png" />
		</div>
			
		<div id="middle">
			<div class="col-lg-6" style="width: inherit;">
				<div class="input-group">
					<input type="text" class="form-control" id="header_search" name="header_search" placeholder="Search Product" />
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">Go!</button>
					</span>
				</div><!-- /input-group -->
			</div><!-- /.col-lg-6 -->
		</div>

		<div id="right">
			
			<table id="rightTable" border="0">
				<tr>
					<td style="text-align: center;"><img src="images/brand_logo.png" /></td>
					<td style="text-align: left;">
						<div id="userBox" style="" >
						    <input type = "hidden" id = "ut_id" value="<?php echo $usertype_id; ?>">
							<span>User Name: <?php echo $username; ?></span></br>
							<span><?php echo $account_type; ?></span>
						</div>
					</td>
					<td>
						<div id="slickdiv">
							<ul id="menu" style="display:none;">
								<li><a href="update_profile.php">Profile</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</div>
					<!--	<span class="slicknav_icon" style="cursor: pointer;">
							<span class="slicknav_icon-bar"></span>
							<span class="slicknav_icon-bar"></span>
							<span class="slicknav_icon-bar"></span>
						</span>-->
					</td>
				</tr>
			</table>
		
		</div><!-- /right -->
	