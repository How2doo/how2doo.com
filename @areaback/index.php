<?php
//session_start();
require 'include/config.php';  
require 'functions/functions_checkuser.php';
require 'functions/functions_pages.php';
require 'functions/functions_date.php';

$ckweb = $dbCon->query("select * from setting where setting_id = 1");
$reweb = $ckweb->fetch_object();

checkUser();

if (!defined('WEB_ROOT')) {
	exit;
}

	$user = $_SESSION['admin_id'];
	$sql = "SELECT * FROM admin WHERE admin_id = '$user'";
	$q = $dbCon->query($sql);
	$result = $q->fetch_object();
	$userid = $result->admin_id;
	$userfullname = $result->admin_name;
	if($result->admin_img!=''){
		$userimg = $result->admin_img;	
	}else{
		$userimg = "nopic.png";
	}
	
	if($result->admin_level==1){
		$levelname = "ผู้ดูแลระบบ";
	}else{
		$levelname = "ผู้ใช้งานทั่วไป";
	}
//functions orthers
require 'functions/functions_countdata.php';
require 'functions/functions_selectdata.php';
require 'functions/functions_mysql.php';
require 'functions/functions_sql_static.php';
require 'functions/functions_sql_data.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ยินดีต้อนรับสู่ระบบจัดการเว็บไซต์ : Kapongidea.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="Developer By Puwanath baibua" name="author"/>
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=$dir;?>bootstrap/css/bootstrap.min.css">
    <!--new font-->
    <link rel="stylesheet" href="<?=$dir;?>bootstrap/fonts/stylesheet.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=$dir;?>bootstrap/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=$dir;?>bootstrap/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=$dir;?>dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=$dir;?>plugins/datatables/dataTables.bootstrap.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=$dir;?>plugins/iCheck/all.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?=$dir;?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=$dir;?>plugins/select2/select2.min.css">
    <link href="<?=$dir;?>plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=$dir;?>dist/css/skins/skin-blue.min.css">

    <link rel="shortcut icon" href="<?=$url2;?>/images/logo_favi.png" type="image/x-icon">
	<link rel="icon" href="<?=$url2;?>/images/logo_favi.png" type="image/x-icon">
 	
 	<!--style file upload-->
 
	<link href="<?php echo $dir;?>build/fileinput/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $dir;?>build/fileinput/css/jasny-bootstrap.css" rel="stylesheet" type="text/css" />
 	<!--end style file upload-->
  
   <!-- CK Editor -->
   <!--<script src="//cdn.ckeditor.com/4.5.5/full/ckeditor.js"></script>-->
    <script src="<?=$dir;?>ckeditor/ckeditor.js"></script>

  	<!--start fileinput-->
  	<link href="<?=$dir;?>bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  	<link href="<?=$dir;?>plugins/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  	<script src="<?=$dir;?>bootstrap/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  	
  	<script src="<?=$dir;?>plugins/fileinput/js/fileinput.js" type="text/javascript"></script>
 	<script src="<?=$dir;?>plugins/fileinput/js/fileinput_locale_fr.js" type="text/javascript"></script>
  	<script src="<?=$dir;?>plugins/fileinput/js/fileinput_locale_es.js" type="text/javascript"></script>
  	<script src="<?=$dir;?>bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
  	<!--end file input-->
  
  	<!--input select map-->
	<!--<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">-->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
	<!--<link href='http://fonts.googleapis.com/css?family=roboto:100,300,400' rel='stylesheet' type='text/css'>-->
	<link rel="stylesheet" href="<?=$dir;?>map/css/style.css">
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&sensor=false&language=en"></script>
	<script src="<?=$dir;?>map/jquery.geocomplete.js"></script>
	<!--end input select map-->
 
    
    <script src="<?=$dir;?>dist/sweetalert-dev.js"></script>
 	<link rel="stylesheet" href="<?=$dir;?>dist/sweetalert.css">

  </head>

  <!--<body class="hold-transition skin-blue fixed sidebar-mini">-->
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="<?=$url;?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>KPI</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b> Adm<i class="fa fa-lightbulb-o"></i>n</b>KPI</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?=$urlimg;?>/images/user/tmp/<?=$userimg;?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $userfullname;?></span>
                </a>
              </li>
              <li>
              	<a href="?logout" class="dropdown-toggle fa fa-power-off" title="ออกจากระบบ">
                	
                </a>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=$urlimg;?>/images/user/tmp/<?=$userimg;?>" class="img-circle" width="35" height="35" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $userfullname;?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <?=include('models/menu_left.php');?>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $pagename;?>
            <small><?php echo $pagename2;?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?=$url;?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="">อัพเดทระบบ</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
          <?php 
          include $pageroot;
          $dbCon->close();
          ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="http://www.kapongidea.com">KapongIDEA</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">กำลังดำเนินการ</h3>
            <div class="form-group">
				Text
              </div><!-- /.form-group -->

          	</div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">

              <h3 class="control-sidebar-heading">กำลังดำเนินการ</h3>
              <div class="form-group">
				Text
              </div><!-- /.form-group -->

          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=$dir;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=$dir;?>bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?=$dir;?>plugins/iCheck/icheck.min.js"></script>
	<!-- Select2 -->
    <script src="<?=$dir;?>plugins/select2/select2.full.min.js"></script>
    <!-- DataTables -->
    <script src="<?=$dir;?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=$dir;?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=$dir;?>plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?=$dir;?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=$dir;?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=$dir;?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?=$dir;?>plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <script src="<?php echo $dir;?>build/fileinput/js/fileinput.js"></script> 
	<script src="<?php echo $dir;?>build/fileinput/js/jasny-bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?=$dir;?>dist/js/app.min.js"></script>
    

        <script>
          $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false
            });
          });
          
          
          //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
        </script>

        
         <!--<script>
          (function(w,d,s,g,js,fs){
            g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
            js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
            js.src='https://apis.google.com/js/platform.js';
            fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
          }(window,document,'script'));
          </script>-->

  </body>
</html>
