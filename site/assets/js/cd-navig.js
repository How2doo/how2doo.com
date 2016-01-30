/* Nav Menu Dropdown
================================================== */   
jQuery('.side_sidebar').each(function(){
    jQuery('.nav-menu .drop').hover(function() {
      jQuery(this).find('.dropdown').slideDown( "slow" );
    });
    jQuery('.nav-menu .drop').mouseleave(function() {
      jQuery(this).find('.dropdown').slideUp( "slow" );
    });
});


/* Header Slider Menu
================================================== */   
jQuery('.side_sidebar').each(function() {
    jQuery('#toggle-header').click(function(){
        if(jQuery('#toggle-header').hasClass('show-header')) {
            jQuery('.side_sidebar').addClass('shown-header').animate({'right':0}, 800, "easeInOutExpo");
            jQuery('#toggle-header').removeClass('show-header').addClass('hide-header');
            jQuery('#toggle-header').find('i').removeClass('fa fa-bars').addClass('fa fa-times');
        }else if(jQuery('#toggle-header').hasClass('hide-header')) {
            jQuery('.side_sidebar').removeClass('shown-header').animate({'right': '-460px'}, 800, "easeInOutExpo");
            jQuery('#toggle-header').removeClass('hide-header').addClass('show-header');
            jQuery('#toggle-header').find('i').removeClass('fa fa-times').addClass('fa fa-bars');
        }
    });
    jQuery('.side_sidebar').bind( "clickoutside", function(){
        jQuery('.side_sidebar').removeClass('shown-header').animate({'right': '-460px'}, 800, "easeInOutExpo");
        jQuery('#toggle-header').removeClass('hide-header').addClass('show-header');
        jQuery('#toggle-header').find('i').removeClass('fa fa-times').addClass('fa fa-bars');
    });
});
