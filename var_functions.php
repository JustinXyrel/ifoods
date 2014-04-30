<?php
  class var_functions{
    /**
	  Author: Justin Xyrel
	  Function: is_logged_in
	  Desc: checks if the user is logged in
	  Params: none
	*/
	public function is_logged_in(){
	    if(!isset($_SESSION)){
			session_start();
		}
		$result = (!empty($_SESSION['auth'])) ? true : false;
		return $result;
	}

  }

?>