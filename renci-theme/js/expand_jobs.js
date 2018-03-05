jQuery(document).ready(function($) {
	console.log('running');
	
	$('.see_more').click(function(){
		console.log('clicked');
    	$( this ).closest("div").addClass("employment-hidden");
    	$( this ).closest("div").next("div").removeClass("employment-hidden");

	});

	$('.hide_more').click(function(){
		console.log('clicked');
		$( this ).closest("div").addClass("employment-hidden");
		$( this ).closest("div").prev("div").removeClass("employment-hidden");

	})
});

		