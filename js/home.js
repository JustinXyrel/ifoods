
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
							$('div#content_display').html("");
							$('div#content_display').append(response);
						}
					});					
				}
			});
		//alert('you clicked me');
	});

	$('a#product').on('click',function(event){
			event.stopImmediatePropagation(); 
			event.preventDefault(); 
	
					$.ajax({
						url:'search.php',
						success: function (response){ 
							$('div#content_display').html("");
							$('div#content_display').append(response);
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