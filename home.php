<?php
 include('scripts.php'); 
 include('var_functions.php'); 
 $var_func = new var_functions();
 //var_dump($var_func->is_logged_in());
  if($var_func->is_logged_in()){
    echo "Successfully logged in";
	echo "<button id = 'sign_out'>Sign Out</button>";
  }else{
    echo "Authentication required";
  }
?>