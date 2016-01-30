<?php
session_start();
require '../include/config.php';
require '../functions/functions_checkuser.php';

$select = isset($_GET['select']) ? $_GET['select'] : '';


switch ($select){
    
    case 'update' :
         updateCog();
         break;
         
    case 'delimg' :
         deleteImg();
         break;
		 
	case 'delimgfavi' :
         deleteImgfavi();
         break;

         
    default :
        // ถ้า select ค้นหาหรือไม่รู้จัก
        // จะย้ายเพจไปที่ index.php
        header('Location: index.php');
}

/*
    Add a user
*/
function updateCog()
{
	require '../include/config.php';
    $name 	= $_POST['txtname'];
    $address 	    = $_POST['txtaddress'];
    $tel1 	        = $_POST['txttel1'];
    $tel2 	        = $_POST['txttel2'];
    $fax 	        = $_POST['txtfax'];
    $email 	 		= $_POST['txtemail'];
    $facebook 	= $_POST['txtfacebook'];
    $google 	    = $_POST['txtgoogle'];
    $line     	    = $_POST['txtline'];
    $youtube 	    = $_POST['txtyoutube'];
    $url     	    	= $_POST['txtwebsite'];
    $status     	= $_POST['status'];
    $instagram 	= $_POST['txtinstagram'];
    $keyword 	= $_POST['txtkeyword'];
    $description 	= $_POST['txtdescription'];
    $tag 			= $_POST['txttag'];
    $file           	= $_FILES['fle']['name'];
    $file_tmp 	    = $_FILES['fle']['tmp_name'];
	$filefavi        	= $_FILES['flefavi']['name'];
    $filefavi_tmp = $_FILES['flefavi']['tmp_name'];
    $date = date("Y-m-d");
	
	
    $update = "UPDATE setting SET setting_name = '$name',
                                          setting_address = '$address',
                                          setting_tel1 = '$tel1',
                                          setting_tel2 = '$tel2',
                                          setting_fax = '$fax',
                                          setting_email = '$email',
                                          setting_facebook = '$facebook',
                                          setting_google = '$google',
                                          setting_line = '$line',
                                          setting_youtube = '$youtube',
                                          setting_website = '$url',
                                          setting_instagram = '$instagram',
                                          setting_keyword = '$keyword',
                                          setting_description = '$description',
                                          setting_tag = '$tag', ";
    if($file != "")
	{
		//check_size_user($file_tmp);
		
		$dot = substr($file,-3,3);
		$pic_name = "logo".$file."-".$date.".".$dot;
		$update .=" setting_logo = '$pic_name' ,";
		copy($file_tmp,"../../images/$pic_name");
     
	}
	
	 if($filefavi != "")
	{
		//check_size_user($file_tmp);
		
		$dot = substr($filefavi,-3,3);
		$pic_name2 = "logofavi".$filefavi."-".$date.".".$dot;
		$update .=" setting_favicon = '$pic_name2' ,";
		copy($filefavi_tmp,"../../images/$pic_name2");
     
	}
    
    $update .="setting_status = '$status' WHERE setting_id = 1";
    $dbCon->query($update) or die($dbCon->error);
	$dbCon->close();                                   
    
    //echo $add_user;
    header('Location: ../setting/cog');    
	exit();          
}


function deleteImg()
{
	require '../include/config.php';
	$id = $_GET['id'];
	$img = $_GET['img'];
	
	
	$update = "UPDATE setting SET setting_logo = '' WHERE setting_id = $id ";
	$dbCon->query($update) or die($dbCon->error);
	
	if($img != "")
	{
		unlink("../../images/$img");
		
	}
	
	header("Location: ../setting/cog");    
	exit(); 
}


function deleteImgfavi()
{
	require '../include/config.php';
	$id = $_GET['id'];
	$img = $_GET['img'];
	
	
	$update = "UPDATE setting SET setting_favicon = '' WHERE setting_id = $id ";
	$dbCon->query($update) or die($dbCon->error);
	
	if($img != "")
	{
		unlink("../../images/$img");
		
	}
	
	header("Location: ../setting/cog");    
	exit(); 
}


?>