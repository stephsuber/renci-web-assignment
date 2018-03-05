jQuery(document).ready(function($) {

	$(window).scroll(function(){
  // get the height of #wrap
  var h = $('#staff-list').height();
  var y = $(window).scrollTop();

  if( y > 170 && !$('#staff-search').hasClass('fixed-control')){
   // if we are show keyboardTips

   $('#staff-search').addClass('fixed-control');
  } 
  else if (y<170) {
  	$('#staff-search').removeClass('fixed-control');
  }
  else {
   	//
  }
 });

	//search each time keyup happens
	$('#staff_search_input input').bind('keyup', function(){ 
		var search_val = $(this).val();
		
		$("#clear-search").fadeIn();
		if ($.trim($("#staff_search_input input").val()) == "") {
		$("#clear-search").fadeOut();
		}
		
		$("body").scrollTop(30);
		//.fixed-control
		
		if ($('#search_names_only').attr('checked')) {
			
			searchName(search_val);	
		}
		else {
			searchAll(search_val);
		}

	});

	//clear the search input box
	$('#staff_search_input #clear-search').bind('click', function(){
	     
		 $("#staff_search_input input").val("");
	     searchAll("");
		
		 $(this).hide();
		
	});
	//search when box gets checked or unchecked
	$('#search_names_only').change(function(){
        var search_val = $('#staff_search_input input').val();
        if($(this).attr('checked')){
            searchName(search_val);
        }
        else{
            searchAll(search_val);
        }
    });
	
	//search just staff names
	function searchName(value) {
		var find = value.split(' ');
	    var re1 = new RegExp(find[0],"i");
	    var re2 = new RegExp(find[1],"i");
	    var re3 = new RegExp(find[2],"i");
	    $('.record').each(function(){
		    $(this).hide();
		    var stri = $(this).find('.name_only').text();
		    var foundin1 = stri.match(re1);
		    var foundin2 = stri.match(re2);   
		    var foundin3 = stri.match(re3); 
		    if(foundin1 && foundin2 && foundin3) {
		        $(this).show();
		    }
		});
	}

	//search all staff info
	function searchAll(value) {
	    var find = value.split(' ');
	    var re1 = new RegExp(find[0],"i");
	    var re2 = new RegExp(find[1],"i");
	    var re3 = new RegExp(find[2],"i");
	    $('.record').each(function(){
	    	$(this).hide();
	    	var stri = $(this).find('.staff_content').text();
	    	var foundin1 = stri.match(re1);
	    	var foundin2 = stri.match(re2);
	    	var foundin3 = stri.match(re3); 
	    	if(foundin1 && foundin2 && foundin3) {
	        	$(this).show();
	    	}
		});
	}
});







		