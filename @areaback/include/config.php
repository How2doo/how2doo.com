<?php
ini_set('display_errors', 1);
//error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

// start the session
//session_start();

#################### Db Connect
#กำหนด class การเชื่อมต่อ DB
$dbLocation = "localhost";//ที่อยู่ของฐานข้อมูล
$dbUser = "root";//ชื่อ User
$dbPass = "";//รหัสผ่าน
$dbName = "how2doo_db";//ชื่อฐานข้อมูล
@$dbCon = new mysqli($dbLocation,$dbUser,$dbPass,$dbName);//เชื่อมต่อฐานข้อมูล
$dbCon->set_charset("utf8");//กำหนด charset เป็น utf8
if(mysqli_connect_errno()){
		echo "เชื่อมต่อฐานข้อมูลไม่สำเร็จ"." ".mysqli_connect_error();
		exit();
	} 
	

#################### End Db Connect

$thisFile = str_replace('\\', '/', __FILE__);
$docRoot = $_SERVER['DOCUMENT_ROOT'];

$webRoot  = str_replace(array($docRoot, 'config.php'), '', $thisFile);
$srvRoot  = str_replace('config.php', '', $thisFile);

define('WEB_ROOT', $webRoot);
define('SRV_ROOT', $srvRoot);

?>