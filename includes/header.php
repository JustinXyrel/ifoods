

	
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
			
			<table id="rightTable" border="1">
				<tr>
					<td style="text-align: center;"><img src="images/brand_logo.png" /></td>
					<td style="text-align: left;">
						<div id="userBox" style="">
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
	