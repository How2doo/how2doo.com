<?php 
	ob_start();
	include "@areaback/include/config.php";
	require "system/functions/functions_substr.php";
	require "system/functions/functions_array.php";
	require "system/functions/functions_banner.php";
	require "system/functions/functions_checkuser.php";
	require "system/functions/functions_cog.php";
	require "system/functions/functions_counter.php";
	require "system/functions/functions_date.php";
	require "system/functions/functions_navipage.php";
	require "system/functions/functions_pages.php";
	require "system/functions/functions_rating.php";
?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<head>
  
    <meta charset="UTF-8">
	<title><?=$title;?></title>
	<meta name="description" content="<?=$description;?>">
	<meta name="keywords" content="<?=$keyword;?>">
	<meta property="og:site_name" content="<?=$title;?>"/>
	<meta property="og:title" content="<?=$title;?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="<?=$urlweb;?>"/>
	<meta property="og:image" content="<?=$imageurl;?>"/>
	<meta property="og:locale" content="th_TH"/>
	<meta property="og:description" content="<?=$description;?>"/>
	<meta name="author" content="How2Doo.com">

    <!-- Responsive MetaTag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Page Description and Author -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo $urlimg;?>/images/favicon.ico">

    <!-- CSS Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/responsive.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/font-awesome.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/simple-line-icons.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/themify-icons.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/javascript.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/animate.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/heroslider.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/cd-navig.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo $dir;?>/css/mainmenu.css" media="screen">
    <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  
</head>
<body>


<!-- Page Loader -->
<div class="pre-loader">
    <i class="preloader-icon fa fa-spin"></i>
</div>
<!-- Page Loader -->



<?php include "header.php"; ?>
<?php include($pageroot); ?>
<div id="go-top"><a href="#go-top"><i class="fa fa-long-arrow-up"></i></a></div>
<?php include "footer.php"; ?>




<!--LOAD SCRIPTS-->
<script type="text/javascript" src="<?php echo $dir;?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/jquery.easing.1.3.min.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/header.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/jquery.pageslide.min.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/heroslider.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/jquery.smooth-scroll.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/initmap.min.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/jquery.parallax.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/twitter/jquery.tweet.min.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/spectragram.min.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/contact-form.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/preloader.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/cd-navig.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/jquery.fullscreen-popup.min.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo $dir;?>/js/vaxone-script.js"></script>
    
</body>
</html>