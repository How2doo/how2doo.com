/* Page Loader
================================================== */

jQuery(window).load(function() {
    /* Loader */
    jQuery(".pre-loader").fadeOut(500);
});

/*-----------------------------------------------------------------------------------*/
/*    Go to TOP Button Settings
/*-----------------------------------------------------------------------------------*/ 

jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 500) {
        jQuery("#go-top").fadeIn();
    } else {
        jQuery("#go-top").fadeOut();
    }
});
$("#go-top").click(function () {
    jQuery("body,html").animate({ scrollTop: 0 }, 800 );
    return false;
});


/* Full Screen Toggle
================================================== */
$(".open-popup").fullScreenPopup({
        });

jQuery(document).ready(function () {

'use strict';

/* Featured Carousel Slider
================================================== */
    jQuery(".featured_carousel").owlCarousel({
        items: 4,
        navigation: true,
        pagination: true
    });

/* Featured Carousel Slider
================================================== */
    jQuery(".relatedposts_carousel").owlCarousel({
        items: 3,
        navigation: false,
        pagination: true
    });

/* Instagram Slider
================================================== */
    $('.instagram-widget').owlCarousel({
        items: 1,
        loop: true,
        smartSpeed: 1000,
        singleItem: true,
        autoplay: true,
        autoplayTimeout: 3000,
        dots: true,
        nav: false,
        margin: 0,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn'
    });


/* Home SLider Background
================================================== */
    jQuery('.main-slider-bg').each(function(){
        var owl = jQuery(this);
        owl.owlCarousel({
            autoPlay: 6000,
            navigation : false,
            pagination: false,
            singleItem: true,
            transitionStyle: "fade",
        });
    });

/* Progress Bar Animation
================================================== */
    jQuery("[data-progress-animation]").each(function() {
        var $this = jQuery(this);
        $this.appear(function() {
            var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);
            if(delay > 1) $this.css("animation-delay", delay + "ms");
            setTimeout(function() { $this.animate({width: $this.attr("data-progress-animation")}, 800);}, delay);
        }, {accX: 0, accY: -50});
    });
    

/* Home Main SLider
================================================== */

    jQuery(".main-content-slider").owlCarousel({
            autoPlay: 6000,
            autoHeight: true,
            navigation : true,
            pagination: false,
            singleItem: true,
            mouseDrag: false,
            touchDrag: false,
            transitionStyle: "fade",
        });


/* Home Main SLider 2
================================================== */
    jQuery('.main-slider2').each(function(){
        var owl = jQuery(this);
        owl.owlCarousel({
            autoPlay: 6000,
            autoHeight: true,
            navigation : true,
            pagination: false,
            singleItem: true,
            mouseDrag: false,
            touchDrag: false,
            transitionStyle: "fade",
        });
    });


/* Project Slider
================================================== */
    jQuery('.postgallery-slider').each(function(){
        var owl = jQuery(this);
        owl.owlCarousel({
            slideSpeed : 800,
            stopOnHover: true,
            autoPlay: 3500,
            navigation : false,
            pagination: true,
            lazyLoad : true,
            singleItem: true,
            autoHeight : true,
            transitionStyle : "fadeUp",
        });
    });


/* Twitter Feed
================================================== */
    jQuery(".twitter-feed").each(function(){
        jQuery(this).tweet({
            modpath:"twitter/",
            join_text:"auto",
            username:jQuery(".twitter-feed").attr('data-username'),
            count:3,
            template:"{time}{text}{reply_action}{retweet_action}{favorite_action}",
            loading_text:"loading tweets..."
        });
    });

/* Twitter Slider
================================================== */
    jQuery('.twitter-slider .tweet_list').each(function(){
        var owl = jQuery(this);
        owl.owlCarousel({
            stopOnHover: true,
            autoPlay: 6000,
            navigation : false,
            pagination: false,
            singleItem: true,
            transitionStyle: "fade",
            autoHeight: true,
        });
    });



/* Navigation setup
================================================== */
    $('a.scroll').smoothScroll({
            speed: 900,
            offset: -65
    });

/* tooltip
================================================== */   
    jQuery('.re-tooltip').each(function() {
        jQuery('.re-tooltip').tooltip();
    });
 
/* Mobile Menu Reponsive
================================================== */
    $(".open").pageslide()


/* Fit Video
================================================== */  
    jQuery('.fitvid').each(function() {
        jQuery(this).fitVids();
    });


/* FancyBox
================================================== */

    $(".fancybox-effects-d").fancybox({
        padding: 0,

        openEffect : 'elastic',
        openSpeed  : 150,

        closeEffect : 'elastic',
        closeSpeed  : 150,

        closeClick : true,

        helpers : {
            overlay : null
        }
    });


/* All icons
================================================== */
    jQuery(".clients-carousel, .testimonials-carousel").find(".owl-prev").html("");
    jQuery(".clients-carousel, .testimonials-carousel").find(".owl-next").html("");

    jQuery(".main-content-slider, .featured_carousel").find(".owl-prev").html("<i class='fa fa-angle-double-left'></i>");
    jQuery(".main-content-slider, .featured_carousel").find(".owl-next").html("<i class='fa fa-angle-double-right'></i>");

    jQuery( ".twitter-slider .tweet_list .tweet_reply" ).prepend( "<i class='icon-action-redo'></i>" );
    jQuery( ".twitter-slider .tweet_list .tweet_retweet" ).prepend( "<i class='icon-social-twitter'></i>" );
    jQuery( ".twitter-slider .tweet_list .tweet_favorite" ).prepend( "<i class='icon-star'></i>" );


    });


/* Menu Header icon
================================================== */
    $("header .navicon a").click(function(){
        $(this).fadeOut("slow");
        $(".menu").css({"visibility":"visible", "opacity":"1"});
        $(".menu .menu-logo").addClass("animated fadeInUp");
        $(".menu .menu-list li").addClass("animated fadeInDownBig");
        $(".menu .social-icons").addClass("animated fadeInDown");
        $(".menu").addClass("animated fadeIn");
    });

    $(".menu .close-icon").click(function(){
        $(".menu").css({"visibility":"hidden", "opacity":"0"});
        $(".menu .menu-logo").removeClass("animated fadeInUp");
        $(".menu .menu-list li").removeClass("animated fadeInDownBig");
        $(".menu .social-icons").removeClass("animated fadeInDown");
        $(".menu").removeClass("animated fadeIn");
        $("header .navicon a").fadeIn("slow");
    });




/* Parallax background & Container
================================================== */
jQuery(document).ready(function(){
    function EasyPeasyParallax() {
        scrollPos = jQuery(this).scrollTop();
        jQuery('.homepage.parallax').css({
            'background-position' : '50% ' + (-scrollPos/4)+"px"
        });
        jQuery('.homepage.parallax .container').css({
            'top': (scrollPos/4)+"px",
            'opacity': 1-(scrollPos/250)
        });
    }
    jQuery(document).ready(function(){

        jQuery(window).scroll(function() {

            EasyPeasyParallax();

            //circle progress bar
            pieChart();

        });

        

    });
});

/* Parallax Backgrounds
================================================== */
(function($) {
    'use strict';
    jQuery(document).ready(function(){
        jQuery(window).bind('load', function () {
            parallaxInit();
        });
        function parallaxInit() {
            testMobile = isMobile.any();
            if (testMobile == null) {
                jQuery('.twitter-feed-section').parallax("50%", 0.4);
                jQuery('.clients-section').parallax("50%", 0.4);
                jQuery('.testimonials-section').parallax("50%", 0.4);
                jQuery('.facts-section').parallax("50%", 0.4);
                jQuery('#page-header.parallax-bg').parallax("50%", 0.4);
            }
        }   
        parallaxInit();  
    }); 
    var testMobile;
    var isMobile = {
        BlackBerry: function() { return navigator.userAgent.match(/BlackBerry/i); },
        iOS: function() { return navigator.userAgent.match(/iPhone|iPad|iPod/i); },
        Opera: function() { return navigator.userAgent.match(/Opera Mini/i); },
        Windows: function() { return navigator.userAgent.match(/IEMobile/i); },
        Android: function() { return navigator.userAgent.match(/Android/i); },
        any: function() { return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); }
    };
}(jQuery));


/* Instagram Feed
================================================== */
    if($('.instafeed').length){
        jQuery.fn.spectragram.accessData = {
            accessToken: '1406933036.fedaafa.feec3d50f5194ce5b705a1f11a107e0b',
            clientID: 'fedaafacf224447e8aef74872d3820a1'
        };  
    }   

    $('.instafeed').each(function() {
        var feedID = $(this).attr('data-user-name') + '-';
        $(this).children('ul').spectragram('getUserFeed', {
            query: feedID,
            max: 8
        });
    });

/* contact form js
================================================== */
    jQuery(document).ready(function($) {
        $("#ajax-contact-form").submit(function() {
        var str = $(this).serialize();
        $.ajax({
          type: "POST",
          url: "inc/contact-process.php",
          data: str,
          success: function(msg) {
          // Message Sent? Show the 'Thank You' message and hide the form
          if(msg == 'OK') {
              result = '<div class="message-sent"><i class="icon-check"></i> Your message has been sent. Thank you!</div>';
              $("#fields").hide();
              setTimeout("location.reload(true);",7000);
          } else {
              result = msg;
          }
          $('#note').html(result);
        }
        });
        return false;
        });
    });


/*-----------------------------------------------------------------------------------*/
/*    Main Menu Settings
/*-----------------------------------------------------------------------------------*/ 

var mainmenu = $('#mainmenu').superfish({
    delay: 400,
    animation: {
        opacity: 'show'
    },
    speed: 'fast',
    autoArrows: false
});   



    
/* Google Map
================================================== */
var MapDiv = jQuery("#gmap"),
    mapAddress = jQuery('#gmap').data('address'),
    mapZoom = (jQuery('#gmap').data('map-zoom')) ? jQuery('#gmap').data('map-zoom') : 16;

var style1 = [];
var style2 = [ { "stylers": [ { "featureType": "all" }, { "saturation": -100 }, { "weight": 0.2 }, { "gamma": 1.2 }, {"lightness": 50 } ] } ];
var style3 = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]}];
var style4 = [{"featureType":"poi","stylers":[{"visibility":"off"}]},{"stylers":[{"saturation":-70},{"lightness":37},{"gamma":1.15}]},{"elementType":"labels","stylers":[{"gamma":1},{"visibility":"on"}]},{"featureType":"road","stylers":[{"lightness":0},{"saturation":0},{"hue":"#ffffff"},{"gamma":0}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"lightness":50},{"saturation":0},{"hue":"#ffffff"}]},{"featureType":"administrative.province","stylers":[{"visibility":"on"},{"lightness":-50}]},{"featureType":"administrative.province","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"lightness":20}]}];
var style5 = [{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]}];
var style6 = [{"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}];
var style7 = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#333739"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2ecc71"}]},{"featureType":"poi","stylers":[{"color":"#2ecc71"},{"lightness":-7}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-28}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"visibility":"on"},{"lightness":-15}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-18}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#2ecc71"},{"lightness":-34}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#333739"},{"weight":0.8}]},{"featureType":"poi.park","stylers":[{"color":"#2ecc71"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#333739"},{"weight":0.3},{"lightness":10}]}];
var style8 = [{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aee2e0"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#abce83"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#769E72"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#7B8758"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#EBF4A4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#8dab68"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#5B5B3F"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ABCE83"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#A4C67D"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#9BBF72"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#EBF4A4"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#87ae79"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#7f2200"},{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"},{"weight":4.1}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#495421"}]},{"featureType":"administrative.neighborhood","elementType":"labels","stylers":[{"visibility":"off"}]}];
var style9 = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.business","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]}];
var style10 = [{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]},{"stylers":[{"saturation":-77}]},{"featureType":"road"}];
var style11 = [ { "stylers": [ { "gamma": 1.58 }, { "saturation": 30 }, { "weight": 0.1 } ] } ];
var style12 = [{"stylers":[{"hue":"#FF9B06"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":10},{"visibility":"simplified"}]}];
    
jQuery(document).ready(function(){
    jQuery('#gmap').each(function(){
        MapDiv.initMap({
            center: mapAddress,
            markers : {
                marker_1: { 
                    position: mapAddress,
                    options : { icon: "images/icons/marker.png" },
                }
            },
            type: "roadmap",
            options: {
                    zoom: mapZoom,
                    zoomControl: false,
                    disableDoubleClickZoom: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    scrollwheel: false,
                    streetViewControl: false,
                    overviewMapControl: false,
                    overviewMapControlOptions: {
                    opened: true
            },
                styles: style1
            }
        });
     });
});