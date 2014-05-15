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
		
			$sql_que = "SELECT u.*,ut.user_type,(SELECT res_id from tbl_restaurant_branches where branch_id = u.branch_id) as res_id from tbl_users u join tbl_user_types ut on u.user_type_id =ut.user_type_id where 
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
		 // var_dump($_SESSION['auth']);die();
		 if(strpos($_SESSION['auth'][0]['birth_date'],'-') === false){
			$_SESSION['auth'][0]['birth_date'] =  date("Y-m-d", $_SESSION['auth'][0]['birth_date'] );
		 }
		 // echo json_encode($_SESSION['auth'][0]['birth_date'] );
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
         
			if(!isset($_SESSION)){
				session_start();
			} 
			//var_dump($form[13]['value']);die();
		     $this->validate_email_address($form[13]['value'],$user_id);
			// die();
			foreach($form as &$data){     
				if($data['name'] !== 'email_add_verify' && $data['name'] !== 'current_password' ){
					if($data['name'] == 'password' && !empty($data['value']) ){
					
						$data['value'] = sha1($data['value']);
					}
					if($data['name'] == 'birth_date'){
						$data['value'] = strtotime($data['value']);
					}
					$arr[$data['name']] = $data['value'];
				}
			}
			//var_dump($arr);die();
			  unset($arr['radio']); // does not belong to DB fields
			if(empty($arr['password'])){
			  unset($arr['password']);
			}
		//	var_dump($arr);die();
			$results =  $this->update($arr,$wh);
			//var_dump($results);die();
			if($results){
			 foreach($arr as $key=>&$value){
			   $_SESSION['auth'][0][$key] = $value;
			 }
			}
			
			//$json_data = json_encode($results);
			
			/**/
			echo $results;
			
		}
		
		/*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: logout_user
		  Desc: unset the session of the user
          Params: none
		*/ 	

		public function logout_user(){
			if(!isset($_SESSION)){
				session_start();
			} 
			session_destroy();
		}
		
		 /*
		  Author : Justin Xyrel 
		  Date: 05/01/14
		  Function: get_staff
		  Desc: Locate the account of the user where the user type is not equal to customer
		  Params: post data such us $usr(username) and $pwd($password)
		*/ 
		public function get_staff(){	
		  global $conn;
		  
		  if(!isset($_SESSION)){
			session_start();
		  }		
		//  echo "<pre>",print_r($_SESSION['auth']),"</pre>";
		     $fields = array('fname','lname','middle');
			  $res_id = $_SESSION['auth'][0]['res_id'];

			$sql_que = "SELECT u.*,ut.user_type,rb.branch_desc from tbl_users u join tbl_user_types ut on u.user_type_id =ut.user_type_id 
						join tbl_restaurant_branches rb on u.branch_id = rb.branch_id where 
                   rb.res_id= ".$res_id." and u.user_type_id = 4 ";
		 //   var_dump($sql_que);die();
			$query = $conn->query($sql_que);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $json_data = json_encode($results);
  		    echo $json_data;
		}


		
		 /*
		  Author : Justin Xyrel 
		  Date: 05/08/14
		  Function: add_manager
		  Desc: Add manager account
		  Params: post data 
		*/ 
		public function add_manager(){	
		  global $conn;
		  extract($_POST);
		  if(!isset($_SESSION)){
			session_start();
		  }		
		  $this->table = 'tbl_users';
		  $this->validate_email_address($form[13]['value']);
		  
		    foreach($form as $val){
			
			  $val['value'] = ($val['name'] == 'password') ? sha1($val['value']) : $val['value'];
			  $val['value'] = ($val['name'] == 'status') ? (($val['value'] == 'activate') ? '1' : '0') : $val['value'];
			  $fields[$val['name']] = $val['value'];
			  if($val['name'] == 'email_add'){
			     $fields['username'] = $val['value'];
			  }
			}
			$fields['user_type_id'] = 4;

			$response = $this->insert($fields);
			
			if($response > 0){
			   echo json_encode(array('error' => '0' ,'result'=>true));
			}else{
			   echo json_encode(array('error' => '1' , 'err_msg' => 'Please try again.' ));
			}			
		}
		
				
		 /*
		  Author : Justin Xyrel 
		  Date: 05/09/14
		  Function: get_staff
		  Desc: Locate the account of the user where the user type is not equal to customer
		  Params: post data such us $usr(username) and $pwd($password)
		*/ 
		public function get_branches(){	
		  if(!isset($_SESSION)){
			session_start();
		  }		
		  $res_id = $_SESSION['auth'][0]['res_id'];
		  $this->table = 'tbl_restaurant_branches';
		  $fields = array('branch_id','branch_desc');
		  $condition = array('res_id'=>$res_id);
		  $result = $this->select_fields_where($fields,$condition);
		  echo json_encode($result);
		}
		
		 /*
		  Author : Justin Xyrel 
		  Date: 05/12/14
		  Function: send_email
		  Desc: Send mail thru mail function of PHP
		  Params:  {$mail: email_address, $subject : header, $content : content of email }
		*/ 
		
		public function send_email(){
	       extract($_POST);
		   //var_dump($_POST);
		   $result = mail($mail,$subject,$content);
	       echo $mail;
		}
		
		/*
		  Author : Justin Xyrel 
		  Date: 05/13/14
		  Function: validate_email_address
		  Desc: check validation of email
		  Params:  {$email_address}
		*/ 
		
		public function validate_email_address($email_address,$user_id = 0){
	       $this->table = 'tbl_users';
		 //  var_dump($user_id);die();
		   $email_exist  = $this->check_existence("email_add = '".$email_address."' and user_id != '".$user_id."'" );
		 //  var_dump($email_exist);
		   $is_valid_email = filter_var($email_address,FILTER_VALIDATE_EMAIL);
		    if($email_exist){
				echo json_encode(array('error' => '1' , 'err_msg' => 'The email address is already taken.' )); die();
			}elseif(!$is_valid_email){
				echo json_encode(array('error' => '1' , 'err_msg' => 'The email address is invalid.' )); die();	  
			}
		}
		
		/*
		  Author : Justin Xyrel 
		  Date: 05/14/14
		  Function: sysad_report
		  Desc:  shows restaurant report in system admin side
		  Params:  None
		*/ 
		
		public function sysad_report(){
			global $conn;
			extract($_POST);
		//$this->table = 'tbl_restaurant_name';
		 //  var_dump($user_id);die();
		 //  $count_rest = $this->select_count();
		
		 //  echo $results;die();
			$sql_que = "SELECT res_id,res_desc,contact_no,address,branch_no, 
							(SELECT t_u.fname FROM  tbl_users t_u JOIN 
									tbl_restaurant_branches t_b ON t_u.branch_id = t_b.branch_id 
									WHERE t_b.res_id = t_n.res_id AND t_u.user_type_id = 2 limit 1) as admin_fname,
(							SELECT t_u.lname FROM  tbl_users t_u JOIN 
									tbl_restaurant_branches t_b ON t_u.branch_id = t_b.branch_id 
									WHERE t_b.res_id = t_n.res_id AND t_u.user_type_id = 2 limit 1) as admin_lname,
							(SELECT COUNT(*) FROM  tbl_orders t_o JOIN 
									tbl_restaurant_branches t_b ON t_o.branch_id = t_b.branch_id 
									WHERE t_b.res_id = t_n.res_id) as order_count
							FROM tbl_restaurant_name t_n";
			$query = $conn->query($sql_que);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
		//	$results['rest'] = $count_rest;
			//echo $results;die();
		//	$results = $this->get_restaurant_count($results);die();
			//$results['das']='dass';
            $json_data = json_encode($results);
  		    echo $json_data;
		}
		
		/*
		  Author : Justin Xyrel 
		  Date: 05/14/15
		  Function: get_restaurant_count
		  Desc:  get total restaurant count
		  Params:  None
		*/ 
		
		public function get_restaurant_count(){
			$this->table = 'tbl_restaurant_name';
			$results = $this->select_count();
		//	return $results;	
			$json_data = json_encode($results);
  		    echo $json_data;			
		}
	}
	
?>