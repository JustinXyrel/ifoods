
		$().ready(function() {

		$("#searchtable").show();

		$("#staff").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "css/images/up.png", descImage: "css/images/down.png", searchOnField: "#searchOn"});

	});
/*	$(document).ready(function() {
		//if($('table#staff').length > 0 ){
		$("#searchtable").show();

		$("#staff").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "css/images/up.png", descImage: "css/images/down.png", searchOnField: "#searchOn"});
		//}
	});*/