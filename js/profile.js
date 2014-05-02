//console.log($('#update_form').length);

$(document).ready(function(){
 if($('#update_form').length > 0){
	$("#validation_msg").hide();

    $('#btn_edit').click(function(event){
	    event.stopImmediatePropagation();
	   show_hide($('div#update_profile'),$('div#view_profile'));
	});
	
    $('#btn_close').click(function(event){
	   event.stopImmediatePropagation();
	   show_hide($('div#view_profile'),$('div#update_profile'));
	});
	
    $.ajax({
		type:'POST',
        url:'controller.php',
        data: { 'function_name' : 'get_profile',
                  			},
       	success: function (response){ 
			console.log(response);
			var parse_json = $.parseJSON(response);
            var user_profile = parse_json[0];
			var arr = {'lname': user_profile['lname'],
						'mname' : user_profile['mname'],
						'fname' : user_profile['fname'],
						'unit_no' : user_profile['unit_no'],
						'building_no' : user_profile['building_name'],
					    'street' : user_profile['street'],
						'town_city' : user_profile['town_city'],
						'state_province' : user_profile['state_province'],
						'contact_no' :user_profile['contact_no'],
						'email_add' : user_profile['email_add'],
						'birth_date' : user_profile['birth_date'],
						'country' : user_profile['country'],
						'gender' : user_profile['gender'],
						'cur_p' : user_profile['password'],
						'u_id' : user_profile['user_id'],
		 			  };

             $.each(arr,function(key,value){
                if(key == 'gender'){
				    console.log(value);
 					$('input[name=gender]').filter('[value='+value+']').prop('checked',true);
                    $('label#'+key).text((value == 'f') ? 'Female' : 'Male');
				}else{
                    $('input#'+key).val(value);
					$('label#'+key).text(value);
				}                              
             });
		}			 
	});


	
    $("#btn_submit").click(function(event){
      
      var validation_holder = 0;
      var firstname = $("#fname");
      var lastname = $("#lname");
      var street = $("#street");
      var town_city = $("#town_city");
      var state_province = $("#state_province");
      var country = $('select[name=country] :selected');
      var birth_date = $('#birth_date');
      var contact_no = $('#contact_no');
      var email_add = $('#email_add');
      var pass = $('input[name=password]');
      var curr_pass = $('input[name=current_password]');
      
      var email_add_match =  $('#email_add_verify');
      var pass_match = $('#confpass');
      var accept = $('#accept');
      var required = [firstname,lastname,street,town_city,country,birth_date,contact_no,email_add,curr_pass];
       
     jQuery.each( required, function( i, val ) {
       if($(this).val() == ''){
       	$(this).parent().find('p').show();
        $(this).css('background-color', '#FF8073');
        $(this).focus();
          validation_holder = 1;
       }else{
      	 $(this).parent().find('p').hide();
         $(this).css('background-color', '#FFFFFF');
       }
     });
      
      
      var match = [{ m: [ pass_match.val(), pass.val() ] }];
      
      var count = 0;
    //  console.log(pass_match.val()); console.log(pass.val());
	  if(pass_match.val() !==  pass.val()){
	   	 $(pass_match).parent().find('p').hide();
         $(pass).css('background-color', '#FF8073');
         $(pass_match).css('background-color', '#FF8073');   
		 validation_holder = 1;
	  }else{
		 $(pass).css('background-color', '#FFFFFF');   
	     $(pass_match).css('background-color', '#FFFFFF');
	  }
	  
    /*  jQuery.each(match,function(i, val){
        
          if(((val.m)[0]) != ((val.m)[1]))
          {
            if(count == 0){
              $(email_add_match).parent().find('p').show();
              $(email_add_match).focus();
              $(email_add_match).css('background-color', '#FF8073');
              validation_holder = 1;
            }else{
           	 	$(pass_match).parent().find('p').show();
              $(pass_match).focus();
              $(pass_match).css('background-color', '#FF8073');
              validation_holder = 1;
            }
            
          }else{
          	if(count == 0){
            	$(email_add_match).parent().find('p').hide();
              $(email_add_match).css('background-color', '#FFFFFF');
              
            }else{
           	 $(pass_match).parent().find('p').hide();
              $(pass_match).css('background-color', '#FFFFFF');
             
            }
            
          }
        count++;
       
      });
      */
     
     
    
      if(validation_holder == 0) {
         $.ajax({
				type:'POST' ,
                  url:'controller.php',
                  data : {
                         pwd : $('#current_password').val(),
                         function_name : 'sha1_pass', 
                  },
                  success: function (response){   
				//  console.log(response);
                    if($('#cur_p').val() === response ){

                      $.ajax({
						type:'POST',
                  		url:'controller.php',
                        data: { 'params' : {'form' : $("#update_form").serializeArray(),'user_id': $('input#u_id').val(),},
                   			    'function_name':'update_profile',
                  			  },
						success: function (response){ 
						   // $('ne')
						/*     $.ajax({
								type:'POST',
								url:'controller.php',
								data: { 'data' : JSON.stringify($('#update_form').serializeArray()),
										'function_name':'login_success',
								},
								success: function (response){ 
									console.log(response);
									if(response){
						  
										$('#confirm_add').dialog('open');  
									}
								}
							});
							*/
							console.log(response);console.log('a');
                          if(response){
						  
							$('#confirm_add').dialog('open');  
                          }
						}
					  });

                    }else{
                      $('#current_password').css('background-color', '#FF8073');
                    }
							}
					});
  
      }

    });
   
     $('#confirm_add').dialog({
         height: 'auto',
        width: 'auto',
        zIndex: 999,
        autoOpen: false,
        modal: true,
 				buttons: {
				'Ok' : function (){
      		     $(this).dialog('close');
       //    AC.API.Nav('update_profile');
				},
		   }
		  });
	}
		  
	});
  
  $('#bannerBox').removeAttr('onclick');
  if (typeof device !== 'undefined')
  {
    element = document.getElementById('device');
    'Device Name: '     + device.name     + '<br />' + 
      'Device PhoneGap: ' + device.phonegap + '<br />' + 
      'Device Platform: ' + device.platform + '<br />' + 
      'Device UUID: '     + device.uuid     + '<br />' + 
      'Device Version: '  + device.version  + '<br />';
  }


