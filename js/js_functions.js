
/*
function: check_required_fields
params: required_fields (e.g required_fields  = {'username': $('input[name=login]'), 'password' : $('input[name=password]')});
usage: to check if the fields have value hence will change the css style if the required field is null
author: Justin ^_-
*/

function check_required_fields(required_fields){
  $.each(required_fields, function(key,value){
    console.log(value.val());
	if(!value.val()){
	    $(value).css('background-color', '#FF8073')
	}    
  });
}