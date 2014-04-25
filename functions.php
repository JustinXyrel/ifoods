<?php

	class functions extends table{
		
		public function search(){
			global $conn;
			extract($_POST);
			$query = $conn->query("SELECT * FROM  tbl_menus WHERE menu_name LIKE '%$search_val%' and branch_id = $branch_id and menu_status != 3" );
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			$default_menu_img = "images/res_logo/no-logo.jpg";
			$results = $this->image_process($results,'menu_img','images/menu/',$default_menu_img); 
			echo $results;    
		}
		
		public function get_product(){
			global $conn;
			extract($_POST);
			$query = $conn->query("SELECT * FROM  tbl_menus WHERE menu_id = $menu_id");
			$results = $query->fetchAll(PDO::FETCH_ASSOC);
			$default_menu_img = "images/res_logo/no-logo.jpg";
			$results = $this->image_process($results,'menu_img','images/menu/',$default_menu_img); 
			echo $results;  
		}
		
		public function product_edit(){
			extract($_POST);
			$this->table = 'tbl_menus';
			$data = $_POST['post'];
			$menu_code = "$branch_id".strtoupper(substr($data[0]['value'], 0, 3));
			
			if($img != '')
			{
				$send['menu_img'] = $menu_code.".jpg";
				$this->save_image_to_folder($img);
			}
			$send['branch_id'] = $branch_id;
			$send['menu_code'] = $menu_code;
			$send['menu_name'] = strtolower($data[0]['value']);
			$send['menu_desc'] = $data[1]['value'];
			$send['menu_price'] = $data[2]['value'];
			$send['menu_status'] = $data[6]['value'];
			$send['menu_category'] = strtolower($data[5]['value']);
			$send['uom'] = $data[4]['value'];    
			$send['quantity'] = $data[3]['value'];

			$cond['menu_id'] = $menu_id;
			$result = $this->update($send,$cond);
		}
		
		//menu_status = 3 = deleted product
		public function product_delete	(){
			extract($_POST);
			$this->table = 'tbl_menus';
			$send['menu_status'] = '3';
			$cond['menu_id'] = $menu_id;
			$result = $this->update($send,$cond);
		}
		
		public function product_add(){
			global $conn;
			extract($_POST);
			$this->table = 'tbl_menus';
			$data = $_POST['post'];
			$menu_code = "$branch_id".strtoupper(substr($data[0]['value'], 0, 3));
			
			$send['branch_id'] = $branch_id;
			$send['menu_code'] = $menu_code;
			$send['menu_img'] = $menu_code.".png";
			$send['menu_name'] = strtolower($data[0]['value']);
			$send['menu_desc'] = $data[1]['value'];
			$send['menu_price'] = $data[2]['value'];
			$send['menu_status'] = $data[6]['value'];
			$send['menu_category'] = strtolower($data[5]['value']);
			$send['uom'] = $data[4]['value'];    
			$send['quantity'] = $data[3]['value'];
			
			$id = $this->insert($send); 
			if($id > 0)
			{
			   $img_required['photo'] = str_replace("data:image/png;base64,","",$img);
			   $img_required['folder'] = 'images/menu';
			   $img_required['title'] = $menu_code;
			   $image = json_encode($img_required, true);
			   echo $this->save_image_to_folder($image);
			}else{
			  echo 0;
			}			
		}
		 /*
		 Author: Mahalia Rose
		 Function: save_image_to_folder
		 Desc: save base64 encoded image file to a folder
		*/
		  public function save_image_to_folder($image)
		  {
			$images_arr = json_decode($image, true);
			extract($images_arr);
			$entry = base64_decode($photo);
			$image = imagecreatefromstring($entry);
			$directory = dirname(__FILE__).DIRECTORY_SEPARATOR."/".$folder."/".DIRECTORY_SEPARATOR."".$title.".jpg";
			header ( 'Content-type:image/jpg' ); 
			imagejpeg($image, $directory);
			imagedestroy ( $image ); 
			return 0;
		  }
	
		/*
		  Author : Justin Xyrel
		  Function: image_base64_decode
		  Desc: Decode an  image using base64 of php
		  Params: {arr: array of data where to locate the image,
				   img_key: key of image in the array, 
				   dir: directory of image, 
				   default_img: default image to use if doesn't have image stored}

		*/
		  private function image_process($arr,$img_key,$dir,$default_img){
			 foreach($arr as &$detail){
				$logo =  base64_encode(file_get_contents($dir.$detail[$img_key]));
				$detail[$img_key] = ((file_exists($dir.$detail[$img_key])) && (!empty($detail[$img_key]))) ? $logo : '';
			 }
		   return json_encode($arr);
		  }
		 /*
		  Author : Justin Xyrel 
		  Date: 04/23/14
		  Function: login_user
		  Desc: Locate the account of the user where the user type is not equal to customer
		  Params: post data such us $usr(username) and $pwd($password)
		*/ 
		public function login_user(){		 
			global $conn;
			extract($_POST);
		
			$sql_que = "SELECT u.*,ut.user_type from tbl_users u join tbl_user_types ut on u.user_type_id =ut.user_type_id where 
                   u.username= '".$usr."' and u.password ='".$pwd."' and u.user_type_id != 1 ";
			$query = $conn->query($sql_que);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $json_data = json_encode($results);
  		   echo $json_data;
		}
		 /*
		  Author : Justin Xyrel 
		  Date: 04/23/14
		  Function: sha1_pass
		  Desc: encrypt the params (which is password) in sha1 , a function mostly used when the js script needs the password to be encoded
          Params: post data such as $usr(username) and $pwd($password)
		*/ 		
		
		public function sha1_pass(){
		   extract($_POST);
		   $pass_encrypted = sha1($pwd);
		   echo $pass_encrypted;
		}
		 /*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: logout
		  Desc: unsets the session which is the basis if the account is logged in
          Params: NONE
		*/ 		
				
		public function logout(){
		  if(!isset($_SESSION)){
			session_start();
		  }
		   unset($_SESSION['auth']);

		}
		 /*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: get_profile
		  Desc: get the current user information thru getting the session['auth']
          Params: NONE
		*/ 				
		public function get_profile(){
		  if(!isset($_SESSION)){
			session_start();
		  }
		  echo json_encode($_SESSION['auth']);
		}
		
		 /*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: login_success
		  Desc: set the session['auth'] if successful logged in
          Params: post data which is the user's account information
		*/ 					
		
		public function login_success(){
		   extract($_POST);
		    if(!isset($_SESSION)){
				session_start();
			}
		   $user_info = json_decode($data,true);
		   $_SESSION['auth'] = $user_info;

		}
		/*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: update_profile
		  Desc: updates the current information of the user including the password of the account
          Params: post data which is the data to be updated
		*/ 	
		public function update_profile(){
			extract($_POST['params']);
			$this->table = 'tbl_users';
			$wh = array('user_id' => $user_id);

			foreach($form as &$data){     
				if($data['name'] !== 'email_add_verify' && $data['name'] !== 'current_password' ){
					if($data['name'] == 'password'){
						$data['value'] = sha1($data['value']);
					}
					if($data['name'] == 'birth_date'){
						$data['value'] = strtotime($data['value']);
				}
					$arr[$data['name']] = $data['value'];
				}
			}

			$results =  $this->update($arr,$wh);
			$json_data = json_encode($results);
			
			/**/
			echo $json_data; 
		}

	}
	
?>