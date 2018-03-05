jQuery(document).ready(function($) {
	console.log('running');

	$('#sort_by_release').change(function(){
        if($(this).attr('checked')){
            $('#appearances-normal-sort').removeClass("eleven columns");
            $('#appearances-normal-sort').addClass("hidden");
            $('#appearances-release-sort').removeClass("hidden");
            $('#appearances-release-sort').addClass("eleven columns");
        }
        else{
            $('#appearances-release-sort').removeClass("eleven columns");
            $('#appearances-release-sort').addClass("hidden");
            $('#appearances-normal-sort').removeClass("hidden");
            $('#appearances-normal-sort').addClass("eleven columns");
            
        }
    });

    if ($('#sort_by_release').attr('checked')) {
        $('#appearances-normal-sort').removeClass("eleven columns");
        $('#appearances-normal-sort').addClass("hidden");
        $('#appearances-release-sort').removeClass("hidden");
        $('#appearances-release-sort').addClass("eleven columns"); 
    }
    else {
        $('#appearances-release-sort').removeClass("eleven columns");
        $('#appearances-release-sort').addClass("hidden");
        $('#appearances-normal-sort').removeClass("hidden");
        $('#appearances-normal-sort').addClass("eleven columns");
    }
});

		