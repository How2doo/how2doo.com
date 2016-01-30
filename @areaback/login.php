<?php
session_start();
require 'include/config.php';  
require 'functions/functions_checkuser.php';


$errorMessage = "กรุณาเข้าสู่ระบบ เพื่อใช้งาน";

if (isset($_POST['txtUserName'])) {
	$result = doLogin();
	
	if ($result != '') {
		$errorMessage = $result;
	}
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin KPI | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="@assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="@assets/bootstrap/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="@assets/bootstrap/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="@assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="@assets/plugins/iCheck/square/blue.css">

	<!--alert-->
    <script src="@assets/dist/sweetalert-dev.js"></script>
 	<link rel="stylesheet" href="@assets/ist/sweetalert.css">
 	
 	<link rel="shortcut icon" href="images/logo_favi.png" type="image/x-icon">
	<link rel="icon" href="images/logo_favi.png" type="image/x-icon">
 	
 	<SCRIPT LANGUAGE="JavaScript">
	<!--
	function chkdata()
     {
     with(formlogin)
       {
       if(txtUserName.value=='')
       {
          sweetAlert('กรุณากรอก Username');txtUserName.focus();
     	return false;
       }
	   if(txtPassword.value=='')
       {
          sweetAlert('กรุณากรอก Password');txtPassword.focus();
     	return false;
       }
	  
       }
      }

    </SCRIPT>
  </head>
  <body class="hold-transition login-page" onload="document.formlogin.username.focus();if(document.formlogin.referer.value.indexOf('#')==-1)document.formlogin.referer.value+=location.hash;" onKeyPress="return disableCtrlKeyCombination(event);" onKeyDown="return disableCtrlKeyCombination(event);">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>KPI</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
        <font color='red'><?=$errorMessage;?></font>
        </p>
        <form name="formlogin" method="post" onsubmit="return chkdata();" autocomplete='off'>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="txtUserName" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="txtPassword" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        <a href="#">I forgot my password</a><br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="@assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="@assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="@assets/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
