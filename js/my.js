     AOS.init({
 	duration: 800,
 	easing: 'slide',
 	once: false
 });
     jQuery(document).ready(function($) {

	"use strict";

    //------- Pre Loader --------//  
    $(window).on('load', function () {
        $(".preloader-area").delay(200).fadeOut(500);
    })

})