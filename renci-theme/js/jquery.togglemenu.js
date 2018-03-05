/*
* jQuery Toggle Menu Plugin 
* version 0.1
* Created by William Beeler
* (c) 2014
* Developer contact: willbeeler.marketing@gmail.com
* Description: Simple plugin to toggle a mobile menu
*/
(function ( $ ) {
    
    $.fn.toggleMobileMenu = function( options ) {
 
        this.live( "click", function() {
            if ($("#access").is(':visible')) {
                $("#access").hide();
            } else {
                $("#access").show();
            }
        });
        
        return this;
    };
    
}( jQuery ));