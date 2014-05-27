
	$(document).ready(function() {
		function confirm_dialog(){
			$('#confirm_add_user').dialog({
				height: 'auto',
				width: 'auto',
				position: 'top',
				zIndex: 999,
				autoOpen: false,
				modal: true,
 				buttons: {
					'Ok' : function (){
						$(this).dialog('close');
					},
				}
			});
			
		}
		/*
      to be revised.. temporary code - JX
	
	
	*/
	if($('#homeMainContainer').length > 0){
	  if($('input#ut_id').val() == '3'){
		$('div#system_admin').show();
	    
	  //  activate_menu(0);
	  }
	  if($('input#ut_id').val() == '2'){
	   $('div#resto_admin').show();
		//activate_menu(1);
	  }
	  if($('input#ut_id').val() == '4'){
	   $('div#manager').show();
		//activate_menu(1);
	  }
	  if($('input#ut_id').val() > 4 ){
		$('div#staff').show();
		//activate_menu(2);
	  }
	}
	
	
	var win_width = window.innerWidth/1.3;
	var win_height = window.innerHeight/1.05;
	$( "#dialog_staff" ).dialog({
      autoOpen: false,
      height: win_height,	 
      width: win_width,
      position: ['center',20],
	  modal: true,
	  	  open: function() {
			$.ajax({
				url:'controller.php',
				data: {'function_name' : 'get_branches'},
				type: "POST",
				success: function (response){ 
				  var obj = jQuery.parseJSON(response);

					$.ajax({
						url:'form_add_staff.php',
						success: function (response){ 
							$("#dialog_staff").html("");
							$("#dialog_staff").append(response);
								
							$.each(obj,function(index,value){
								var br_id = value['branch_id'];
								var br_desc = value['branch_desc'];
								
								$("select#branch_id").append("<option id='"+br_id+"' value='"+br_id+"'>"+br_desc+"</option>");
								//$('#branch').append("<option>add</option>");
					
				  });
				}
			});
				
	 }

			});
	  },
	  buttons: {
			Save: function() {
			   // var validation_holder = 0;
				var firstname = $("input#fname");
				var lastname = $("input#lname");
				var street = $("input#street");
				var town_city = $("input#town_city");
				var state_province = $("input#state_province");
				var country = $('select[name=country]');
				var branch = $('select[name=branch_id]');
				var birth_date = $('input#birth_date');
				var contact_no = $('input#contact_no');
				var email_add = $('input#email_add');
				var required = [firstname,lastname,street,town_city,country,birth_date,contact_no,email_add,branch];
      
				var count_err = check_required_fields(required);	
			//	var data = {function_name: 'product_delete', branch_id: 9, menu_id: menu_id};
			 //   alert(count_err);
				if(count_err == 0){
					$.ajax({
						url: 'controller.php',
						data:  { 'form' : $("#add_staff_form").serializeArray(),
                   			 'function_name':'add_manager',
                  			  },
						type: "POST",
						success: function(response){
						  console.log(response);
							var obj = jQuery.parseJSON(response);
						
							if(obj['result']){
								$('#validation_msg').fadeOut();
							  // console.log('result is true');
							   var content = "You can now access your account by logging in the ff. information. Username:"+email_add.val()+", Password: "+ $('#password').val() ;
								$.ajax({
									type: 'POST',
									url:'controller.php',
									data: {'mail': email_add.val(),'subject': 'Successful registration','content': content,'function_name':'send_email'},
									success: function (response){ 
									console.log(response);
										var ch = $('table#staff').find('tr').length-2; 
										var clas = $("table#staff tr:nth-child("+ch+")").attr('class');
										var status = ($('input[name=status]').val().trim() == 'activate') ? 'Active' : 'Inactive';
										var odd_even = (clas == 'odd') ? 'even' : 'odd';
										var btn_status = (status == 'Active') ? 'Deactivate' : 'Activate';
									    var add_tbl_row = "<tr class= "+ odd_even +" style='display: table-row'>";
										    add_tbl_row += "<td>"+firstname.val()+" "+ lastname.val()+"</td>";
											add_tbl_row += "<td>"+street.val()+" "+ town_city.val()+" "+ state_province.val()+"</td>";
											add_tbl_row += "<td>"+contact_no.val()+"</td>";
											add_tbl_row += "<td>"+email_add.val()+"</td>";
											add_tbl_row += "<td>"+branch.text().trim()+"</td>";
											add_tbl_row += "<td>restaurant manager</td>";
											add_tbl_row += "<td>"+status+"</td>";
											add_tbl_row += "<td><button id='update_stat'>"+btn_status+"</button></td>";
											add_tbl_row += "</tr>";
										$('table#staff').append(add_tbl_row);
									    $( "#dialog_staff" ).dialog('close');
										confirm_dialog();
										$('#confirm_add_user').dialog('open');  

									}
							   });		
							}else{
								$('div#dialog_staff').scrollTop(0);
							    $('#validation_msg').focus();
							    $('#validation_msg').fadeIn();
								$('#val_msg').text(obj['err_msg']);
							}
						}
					});
				}else{
					$('div#dialog_staff').scrollTop(0);
				    $('#validation_msg').focus();
				    $('#validation_msg').fadeIn();
				    $('#val_msg').text('Please fill in required fields');
				}
			},
			Cancel: function() { $( this ).dialog( "close" );	}
		}
	  });	
	  
	    $('#update_stat').on('click',function(event){
		
		
		});
	  
		$('a#staff').on('click',function(event){
			event.stopImmediatePropagation(); 
			event.preventDefault(); 
			$.ajax({
				type: 'POST',
				url:'controller.php',
						data: {'function_name':'get_staff'},
				success: function (response){ 
					$.ajax({
						type: 'POST',
						url:'staff.php',
						data: {'data':response},
						success: function (response){ 
							$('div#content_bottom').html("");
							$('div#content_bottom').append(response);
						}
					});					
				}
			});
		//alert('you clicked me');
		});

		$('a#add_staff').on('click',function(event){
		    	$( "#dialog_staff" ).dialog('open');
		});

		
		$('a#product').on('click',function(event){
			event.stopImmediatePropagation(); 
			event.preventDefault(); 
					
					$.ajax({
						url:'search.php',
						success: function (response){ 
							$('div#content_bottom').html("");
							$('div#content_bottom').append(response);
						}
					});					
					
		});
	
	    /*For displaying system admin restaurant name report - JX*/
	
		$('a#sysad_report').on('click',function(event){
			event.stopImmediatePropagation(); 
			event.preventDefault(); 
			$.ajax({
				type: 'POST',
				url:'controller.php',
						data: {'function_name':'sysad_report'},
				success: function (response){ 
					$.ajax({
						type: 'POST',
						url:'sysad_report.php',
						data: {'data':response},
						success: function (response){ 
							$('div#content_bottom').html("");
							$('div#content_bottom').append(response);
						}
					});					
				}
			});
		//alert('you clicked me');
		});
		
		/*For displaying system admin restaurant name report - JX*/
	
		$('a#resadmin_report').on('click',function(event){
			event.stopImmediatePropagation(); 
			event.preventDefault(); 
			$.ajax({
				type: 'POST',
				url:'controller.php',
				data: {'function_name':'get_profile'},
				success: function (response){
				 //   console.log(response);
					var obj = jQuery.parseJSON(response);
					var user_res_id = obj[0]['res_id'];
				//	console.log(obj);	console.log(obj[0]); console.log(obj[0]['res_id']);
					 
					$.ajax({
						type: 'POST',
						url:'controller.php',
						data: {'function_name':'restadmin_report','res_id' : user_res_id},
						success: function (response){ 
					//	console.log(response);
							$.ajax({
								type: 'POST',
								url:'restadmin_report.php',
								data: {'data':response},
								success: function (response){ 
									$('div#content_bottom').html("");
									$('div#content_bottom').append(response);
								}	
							});					
						}
					});	
                }				
			});
		//alert('you clicked me');
		});
		
		
	/*	
	function activate_menu(menu){
		$('div#content').find('li.has-sub:eq('+menu+')').addClass("active");
	    $('div#content').find('li.has-sub:eq('+menu+')').show();
		$('div#content').find('li.has-sub:eq('+menu+')').find('ul').show();
		$('div#content').find('li.has-sub:eq('+menu+')').children('a').click()
	}*/
	
		$('a#class').on('click',function(event){
			event.stopImmediatePropagation(); 
			event.preventDefault(); 
			$.ajax({
				type: 'POST',
				url:'controller.php',
						data: {'function_name':'get_class'},
				success: function (response){ 
					$.ajax({
						type: 'POST',
						url:'class.php',
						data: {'data':response},
						success: function (response){ 
							$('div#content_bottom').html("");
							$('div#content_bottom').append(response);
						}
					});					
				}
			});
		//alert('you clicked me');
		});
		
		$('a#add_class').on('click',function(event){
			$('div#dialog_class').dialog('open');
		});
	
		$('div#dialog_class').dialog({
			autoOpen: false,
			height: win_height,	 
			width: win_width,
			position: ['center',20],
			modal: true,
			
	  	  open: function() {
			$.ajax({
				url:'controller.php',
				data: {'function_name' : 'get_branches'},
				type: "POST",
				success: function (response){ 
				  var obj = jQuery.parseJSON(response);

					$.ajax({
						url:'form_add_class.php',
						success: function (response){ 
							$("#dialog_class").html("");
							$("#dialog_class").append(response);
								
							$.each(obj,function(index,value){
								var br_id = value['branch_id'];
								var br_desc = value['branch_desc'];
								
								$("select#branch_id").append("<option id='"+br_id+"' value='"+br_id+"'>"+br_desc+"</option>");
								//$('#branch').append("<option>add</option>");
					
				  });
				}
			});
				
	 }

			});
	  },
	  buttons: {
			Save: function() {
			   // var validation_holder = 0;
				var firstname = $("input#fname");
				var lastname = $("input#lname");
				var street = $("input#street");
				var town_city = $("input#town_city");
				var state_province = $("input#state_province");
				var country = $('select[name=country]');
				var branch = $('select[name=branch_id]');
				var birth_date = $('input#birth_date');
				var contact_no = $('input#contact_no');
				var email_add = $('input#email_add');
				var required = [firstname,lastname,street,town_city,country,birth_date,contact_no,email_add,branch];
      
				var count_err = check_required_fields(required);	
			//	var data = {function_name: 'product_delete', branch_id: 9, menu_id: menu_id};
			 //   alert(count_err);
				if(count_err == 0){
					$.ajax({
						url: 'controller.php',
						data:  { 'form' : $("#add_staff_form").serializeArray(),
                   			 'function_name':'add_manager',
                  			  },
						type: "POST",
						success: function(response){
						  console.log(response);
							var obj = jQuery.parseJSON(response);
						
							if(obj['result']){
								$('#validation_msg').fadeOut();
							  // console.log('result is true');
							   var content = "You can now access your account by logging in the ff. information. Username:"+email_add.val()+", Password: "+ $('#password').val() ;
								$.ajax({
									type: 'POST',
									url:'controller.php',
									data: {'mail': email_add.val(),'subject': 'Successful registration','content': content,'function_name':'send_email'},
									success: function (response){ 
									console.log(response);
										var ch = $('table#staff').find('tr').length-2; 
										var clas = $("table#staff tr:nth-child("+ch+")").attr('class');
										var status = ($('input[name=status]').val().trim() == 'activate') ? 'Active' : 'Inactive';
										var odd_even = (clas == 'odd') ? 'even' : 'odd';
										var btn_status = (status == 'Active') ? 'Deactivate' : 'Activate';
									    var add_tbl_row = "<tr class= "+ odd_even +" style='display: table-row'>";
										    add_tbl_row += "<td>"+firstname.val()+" "+ lastname.val()+"</td>";
											add_tbl_row += "<td>"+street.val()+" "+ town_city.val()+" "+ state_province.val()+"</td>";
											add_tbl_row += "<td>"+contact_no.val()+"</td>";
											add_tbl_row += "<td>"+email_add.val()+"</td>";
											add_tbl_row += "<td>"+branch.text().trim()+"</td>";
											add_tbl_row += "<td>restaurant manager</td>";
											add_tbl_row += "<td>"+status+"</td>";
											add_tbl_row += "<td><button id='update_stat'>"+btn_status+"</button></td>";
											add_tbl_row += "</tr>";
										$('table#staff').append(add_tbl_row);
									    $( "#dialog_staff" ).dialog('close');
										confirm_dialog();
										$('#confirm_add_user').dialog('open');  

									}
							   });		
							}else{
								$('div#dialog_staff').scrollTop(0);
							    $('#validation_msg').focus();
							    $('#validation_msg').fadeIn();
								$('#val_msg').text(obj['err_msg']);
							}
						}
					});
				}else{
					$('div#dialog_staff').scrollTop(0);
				    $('#validation_msg').focus();
				    $('#validation_msg').fadeIn();
				    $('#val_msg').text('Please fill in required fields');
				}
			},
			Cancel: function() { $( this ).dialog( "close" );	}
		}
	  });
	  
		
		
	});
