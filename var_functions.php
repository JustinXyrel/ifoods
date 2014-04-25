<?php
  class var_functions{
	public function is_logged_in(){
	    if(!isset($_SESSION)){
			session_start();
		}
		$result = (!empty($_SESSION['auth'])) ? true : false;
		return $result;
	}
  }

?>