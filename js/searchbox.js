/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var searchBoxes = $(".text");
	var searchBox = $("#search");
	var searchBoxDefault = "Enter ZIP/Postal Code or City";
	
	//Effects for both searchbox
	searchBoxes.focus(function(e){
		$(this).addClass("active");
		$(this).parents('div.form-input-box').addClass("search-active");
	});
	searchBoxes.blur(function(e){
		$(this).removeClass("active");
		$(this).parents('div.form-input-box').removeClass("search-active");
	});
	
	
	//Searchbox2 show/hide default text if needed
	searchBox.focus(function(){
		if($(this).attr("value") == searchBoxDefault) $(this).attr("value", "");
	});
	searchBox.blur(function(){
		if($(this).attr("value") == "") $(this).attr("value", searchBoxDefault);
	});
});