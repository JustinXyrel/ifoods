<?php
	include('scripts.php'); 
	include('var_functions.php'); 
	$var_func = new var_functions();
	
	if(!isset($_SESSION)){
		session_start();
	}
	if($var_func->is_logged_in()){
	    $username = ucfirst($_SESSION['auth']['0']['username']);
		$account_type = ucwords(str_replace('_', ' ' ,$_SESSION['auth']['0']['user_type']));
	} else {
		echo "<script>window.location.assign('index.php');</script>";
	}
?>

<style>

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






</style>

<script>
$(document).ready(function(){

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
		<?php include 'includes/header.php'; ?>
	</div><!-- /header -->

	<div id="content">
	
		<div id='cssmenu'>
			<ul>
				<li class='has-sub'><a><span>System Admin</span></a>
					<ul>
						<li><a href='#'><span>Restaurant Name/ Main Branch</span></a></li>
						<li><a href='#'><span>Manager Information</span></a></li>
					 
					</ul>
				</li>
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
		
		<div id="content_display" style="border-top: 37px solid #7f7f7f;">
		
		</div>
		
	</div><!-- /content -->
	
	<div id="footer">
		<span class="glyphicon glyphicon-copyright-mark"></span><span> iFoods Corporation | All Rights Reserved 2014</span>
	</div><!-- /footer -->

</div><!-- /homeMainContainer -->

</body>

</html>