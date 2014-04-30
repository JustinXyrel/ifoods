<?php
	include('scripts.php'); 
	include('var_functions.php'); 
	$var_func = new var_functions();
	//var_dump($var_func->is_logged_in());
	if($var_func->is_logged_in()){
		echo "Successfully logged in";
		echo "<button id = 'sign_out'>Sign Out</button>";
	} else {
		echo "Authentication required";
	}
?>

<style>

#homeMainContainer {
	background-color: #f6f6f6;
	width: 90%;
	
	margin: 0 auto;
}

#header {
	height: 65px;
	width: 100%;
	background: #d3d3d3;
	
	padding-left: 20px;
}

#header img {
	height: 53px;
}

#header #leftTable {
	float: left;
	height: 100%;
}

#header #right {
	width: 220px;
	height: 100%;
	
	color: #fff;
	background: #7f7f7f;
}

#header #right .slicknav_icon-bar {
	background-color: #f5f5f5;
	display: block;
	width: 1.125em;
	height: 0.125em;
	-webkit-border-radius: 1px;
	-moz-border-radius: 1px;
	border-radius: 1px;
	-webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 0 1px 0 rgba(0, 0, 0, 0.25);
	box-shadow: 0 1px 0 rgba(0, 0, 0, 0.25);
}

#header #right .slicknav_icon-bar + .slicknav_icon-bar {
	margin-top: 0.188em;
}

#content {
	padding: 36px 20px;
}

#footer {
	width: 90%;
	bottom: 0;
	position: fixed;

	text-align: center;
	padding: 10px;
	color: #fff;
	height: 36px;
	background: #7f7f7f;
}





@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,600,300);
@charset 'UTF-8';
/* Base Styles */
#cssmenu,
#cssmenu ul,
#cssmenu li,
#cssmenu a {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  font-weight: normal;
  text-decoration: none;
  line-height: 1;
  font-family: 'Open Sans', sans-serif;
  font-size: 14px;
  position: relative;
}
#cssmenu a {
  line-height: 1.3;
}
#cssmenu {
  width: 250px;
}
#cssmenu > ul > li > a {
  padding-right: 40px;
  font-size: 25px;
  font-weight: bold;
  display: block;
  background: #ed1144;
  color: #ffffff;
  border-bottom: 1px solid #ffffff;
  text-transform: uppercase;
}
#cssmenu > ul > li > a > span {
  background: #7f7f7f;
  padding: 10px;
  display: block;
  font-size: 13px;
  font-weight: 300;
  cursor: pointer;
}
#cssmenu > ul > li > a:hover {
  text-decoration: none;
}
#cssmenu > ul > li.active {
  border-bottom: none;
}
#cssmenu > ul > li.active > a {
  color: #fff;
}
#cssmenu > ul > li.active > a span {
  /*background: #bd0e36;*/
  background: #ed1144;
}
#cssmenu span.cnt {
  position: absolute;
  top: 8px;
  right: 15px;
  padding: 0;
  margin: 0;
  background: none;
}
/* Sub menu */
#cssmenu ul ul {
  display: none;
}
#cssmenu ul ul li {
  border: 1px solid #e0e0e0;
  border-top: 0;
}
#cssmenu ul ul a {
  padding: 10px;
  display: block;
  color: #7f7f7f;
  font-size: 13px;
}
#cssmenu ul ul a:hover {
  color: #bd0e36;
}
#cssmenu ul ul li {
  background: #ffffff;
}
#cssmenu ul ul li.even {
  background: #fff;
}




/* STRUCTURE */


#contentleft {
	/*width: 290px;*/
	width: 47.3em;
	float: left;
	padding: 5px 15px;
	background: antiquewhite;
}

#middle {
	width: 294px; /* Account for margins + border values */
	float: left;
	padding: 5px 15px;
	margin: 0px 5px 5px 5px;
	background: beige;
}

#right {
	width: 270px;
	padding: 5px 15px;
	float: left;
	background: burlywood;
}


/************************************************************************************
MEDIA QUERIES
*************************************************************************************/
/* for 980px or less */
@media screen and (max-width: 980px) {
	
	#pagewrap {
		width: 90%;
	}
	#contentleft {
		width: 41%;
		padding: 1% 4%;
	}
	#middle {
		width: 41%;
		padding: 1% 4%;
		margin: 0px 0px 5px 5px;
		float: right;
	}
	
	#right {
		clear: both;
		padding: 1% 4%;
		width: auto;
		float: none;
	}

}

/* for 700px or less */
@media screen and (max-width: 600px) {

	#contentleft {
		width: auto;
		float: none;
	}
	
	#middle {
		width: auto;
		float: none;
		margin-left: 0px;
	}
	
	#right {
		width: auto;
		float: none;
	}

}

#contentleft, #middle, #right {
	border: solid 1px #ccc;
}
</style>

<script>
$(document).ready(function(){

	$('#cssmenu > ul > li ul').each(function(index, e){
		var count = $(e).find('li').length;
		var content = '<span class="cnt">' + count + '</span>';
		$(e).closest('li').children('a').append(content);
	});
	
	$('#cssmenu > ul > li > a').click(function() {
		$('#cssmenu li').removeClass('active');
		$(this).closest('li').addClass('active');	
		var checkElement = $(this).next();
		
		if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			$(this).closest('li').removeClass('active');
			checkElement.slideUp('normal');
		}
		if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$('#cssmenu ul ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
		}
		if($(this).closest('li').find('ul').children().length == 0) {
			return true;
		} else {
			return false;	
		}		
	});
	
});

</script>

<html>

<body style="background: #fff;">

<div id="homeMainContainer">

	<div id="header">
	
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
				<table id="" border="0">
					<tr>
						<td style=""><img src="images/brand_logo.png" /></td>
						<td style="text-align: left;">
							<div id="userBox" style="">
								<span>Name</span></br>
								<span>Last Log in:</span>
							</div>
						</td>
						<td>
							<span class="slicknav_icon" style="cursor: pointer;">
								<span class="slicknav_icon-bar"></span>
								<span class="slicknav_icon-bar"></span>
								<span class="slicknav_icon-bar"></span>
							</span>
						</td>
					</tr>
				</table>
			</div>
		
	</div><!-- /header -->
	
	<div id="content">
	
		<div id='cssmenu'>
			<ul>
			   <li class='has-sub'><a><span>Restaurant</span></a>
				  <ul>
					 <li><a href='#'><span>Restaurant Name/ Main Branch</span></a></li>
					 <li><a href='#'><span>Manager Information</span></a></li>
					 
				  </ul>
			   </li>
			   <li class='has-sub'><a><span>Restaurant Admin</span></a>
				  <ul>
					 <li><a href='#'><span>Products</span></a></li>
					 <li><a href='#'><span>Staff</span></a></li>
					 <li><a href='#'><span>Brand</span></a></li>
				  </ul>
			   </li>
			   <li class='has-sub'><a><span>Staff/ Manager</span></a>
				  <ul>
					 <li><a href='#'><span>Transaction</span></a></li>
				  </ul>
			   </li>
			</ul>
		</div><!-- /cssmenu -->
		
	</div><!-- /content -->
	
	<div id="footer">
		<span class="glyphicon glyphicon-copyright-mark"></span><span> iFoods Corporation | All Rights Reserved 2014</span>
	</div><!-- /footer -->

</div><!-- /homeMainContainer -->

</body>

</html>