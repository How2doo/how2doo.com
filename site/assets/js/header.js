(function($) {

"use strict";

/* Sticky Header
================================================== */  
    function sticky_header(){
        jQuery(document).ready(function(){
            jQuery('#header').each(function() {
                var homeHeight = jQuery('#home').height() -1,
                    pageHeaderHeight = jQuery('#page-header').height() -1;
                var headerHeight = jQuery('#header').height();

                jQuery(window).scroll(function(){
                    if (jQuery('#home').length == 1 ){
                        if (jQuery(window).scrollTop() > homeHeight) {
                            jQuery(".header-style1").addClass("header-bg");
                        } else {
                            jQuery(".header-style1").removeClass("header-bg");
                        }
                    } else {
                        if (jQuery(window).scrollTop() > pageHeaderHeight) {
                            jQuery(".header-style1").addClass("header-bg");
                        } else {
                            jQuery(".header-style1").removeClass("header-bg");
                        }
                    }
                });
            });
        });
    };

    jQuery(document).ready(function(){
        sticky_header();
    });

    jQuery(window).load(function () {
        sticky_header();
    });


})(jQuery);