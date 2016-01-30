<?php
function parse_path() {
  $path = array();
  if (isset($_SERVER['REQUEST_URI'])) {
    $request_path = explode('?', $_SERVER['REQUEST_URI']);

    $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
    $path['call_utf8'] = substr(urldecode($request_path[0]), strlen($path['base']) + 1);
    $path['call'] = utf8_decode($path['call_utf8']);
    if ($path['call'] == basename($_SERVER['PHP_SELF'])) {
      $path['call'] = '';
    }
    $path['call_parts'] = explode('/', $path['call']);

    $path['query_utf8'] = urldecode($request_path[1]);
    $path['query'] = utf8_decode(urldecode($request_path[1]));
    $vars = explode('&', $path['query']);
    foreach ($vars as $var) {
      $t = explode('=', $var);
      $path['query_vars'][$t[0]] = $t[1];
    }
  }
return $path;
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  //$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/how2doo/@areaback";
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"]."/@areaback";
 }
 return $pageURL;
}

function curPageURLweb() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  //$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/how2doo";
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"];
 }
 return $pageURL;
}

$path_info = parse_path();
//echo '<pre>'.print_r($path_info, true).'</pre>';
$dir= curPageURL()."/@assets/";
$url= curPageURL()."/";
$url2= curPageURL();
$urlimg = curPageURL();
$urlweb = curPageURLweb();
//$urlimg = "http://".$_SERVER["SERVER_NAME"]."/pretty/";

$get_part0 = $path_info['call_parts'][0];
$get_part1 = $path_info['call_parts'][1];
$get_part2 = $path_info['call_parts'][2];
$get_part3 = $path_info['call_parts'][3];
$get_part4 = $path_info['call_parts'][4];
$get_part5 = $path_info['call_parts'][5];

//funvtions if

if($get_part0=="setting"){
	
	$pagename = "จัดการข้อมูลพื้นฐาน";
	if($get_part1=="user"){
		$pagename2 = "จัดการข้อมูลผู้ใช้งาน";
		$pageroot = "controllers/userController.php";
	}elseif($get_part1=="cog"){
		$pagename2 = "ตั้งค่าระบบ";
		$pageroot = "controllers/cogController.php";
	}
	
	
}elseif($get_part0=="member"){
	$pagename = "สมาชิก";
	
  if($get_part1=="writer"){
    $pagename2 = "สมาชิกเขียนบทความ";
    $pageroot = "controllers/writerController.php";
  }
  
}elseif($get_part0=="posts"){
	$pagename = "จัดการบทความ";
	$pageroot = "controllers/postsController.php";

	
}elseif($get_part0=="faq"){
	$pagename = "จัดการถามตอบ";
	$pageroot = "controllers/faqController.php";
	
}elseif($get_part0=="mailsystem"){
	$pagename = "ระบบส่งอีเมล์";
	$pageroot = "controllers/mailsystemController.php"; 
	
}elseif($get_part0=="banner"){
	$pagename = "จัดการแบนเนอร์";
  if($get_part1=="bannerads"){
    $pagename2 = "โฆษณา";
    $pageroot = "controllers/banneradsController.php";
  }
  


}else{
	$pagename = "Dashboard";
	$pageroot = "controllers/mainController.php";
}



?>