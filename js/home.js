
	$(document).ready(function() {
		/*
      to be revised.. temporary code - JX
	
	
	*/
	if($('#homeMainContainer').length > 0){
	  if($('input#ut_id').val() == '3'){
	    activate_menu(0);
	 /*   $('div#content').find('li.has-sub:eq(0)').show();
		$('div#content').find('li.has-sub:eq(0)').addClass("active");
		$('div#content').find('li.has-sub:eq(0)').children('a').click()*/
	  }
	  if($('input#ut_id').val() == '2'){
		activate_menu(1);
	  	/*$('div#content').find('li.has-sub:eq(1)').addClass("active");
	    $('div#content').find('li.has-sub:eq(1)').show();
		$('div#content').find('li.has-sub:eq(1)').children('a').click()*/
	  }
	  if($('input#ut_id').val() > 3 ){
		activate_menu(2);
	   /*	$('div#content').find('li.has-sub:eq(2)').addClass("active");
	    $('div#content').find('li.has-sub:eq(2)').show();
		$('div#content').find('li.has-sub:eq(2)').children('a').click()*/
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
				url:'form_add_staff.php',
				success: function (response){ 
					$("#dialog_staff").html("");
					$("#dialog_staff").append(response);
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
				var birth_date = $('input#birth_date');
				var contact_no = $('input#contact_no');
				var email_add = $('input#email_add');
				var required = [firstname,lastname,street,town_city,country,birth_date,contact_no,email_add];
      
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
						success: function(data){
						console.log(data);
						//$('tr.'+menu_id).fadeOut();
						//$( this ).dialog( "close" );	
						}
					});
				}
			},
			Cancel: function() { $( this ).dialog( "close" );	}
		}
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

	/*	$('a#add_staff').on('click',function(event){
			event.stopImmediatePropagation(); 
			event.preventDefault(); 		
//alert('this');			
			$.ajax({
				url:'form_add_staff.php',
				success: function (response){ 
					$('div#content_bottom').html("");
					$('div#content_bottom').append(response);
				}
			});
		
		});*/
		
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
		//alert('you clicked me');

	  function activate_menu(menu){
		$('div#content').find('li.has-sub:eq('+menu+')').addClass("active");
	    $('div#content').find('li.has-sub:eq('+menu+')').show();
		$('div#content').find('li.has-sub:eq('+menu+')').find('ul').show();
		$('div#content').find('li.has-sub:eq('+menu+')').children('a').click()
	}
	});
/*	$(document).ready(function() {
		//if($('table#staff').length > 0 ){
		$("#searchtable").show();

		$("#staff").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "css/images/up.png", descImage: "css/images/down.png", searchOnField: "#searchOn"});
		//}
	});*/