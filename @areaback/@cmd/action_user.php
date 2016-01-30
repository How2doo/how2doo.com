<?php
session_start();
require '../include/config.php';
require '../functions/functions_checkuser.php';
header("Content-type:text/html;charset=UTF-8");

$select = isset($_GET['select']) ? $_GET['select'] : '';

switch($select){
    
    case 'add' :
         addUser();
         break;
         
    case 'edit' :
         editUser();
         break;
         
    case 'del' :
         deleteUser();
         break;
    
    case 'delimg' :
         deleteImg();
         break;
         
    case 'editpassword' :
         editpassword();
         break;
         
         
    default :
	header('Location: ../index.php');
	break;
}

 echo "ทดสอบ";
/*
    Add a user
*/
function addUser()
{
	require '../include/config.php';
    $user_name 	= $_POST['txtusername'];
    $user_pass 	= $_POST['txtuserpass'];
    $fullname 	= $_POST['txtname'];
    $level 	= $_POST['txtlevel'];
    $file       = $_FILES['fle']['name'];
    $file_tmp 	= $_FILES['fle']['tmp_name'];
    $active_check = $_POST['status'];
    $date_add = date("Y-m-d");
	
    $mdpass = md5($user_pass);
    
    $ckuser = checkuseradd($user_name);
    
    if($ckuser > 0)
	{
		?>
		<script type="text/javascript">

			alert("Username มีผู้ใช้งานอยู่แล้ว กรุณาเปลี่ยน Username ใหม่!!!");
			window.history.back();

		</script>
		<?php
		exit();
	}else{
	
	if($file != "")
	{
		check_size_user($file_tmp);
		
		$imgname = md5($file);
		$dot = substr($file,-3,3);
		$pic_name = $imgname ."-".$date_add.".".$dot;
		resize($file_tmp,$pic_name,150,"../images/user/tmp/");
		copy($file_tmp,"../images/user/$pic_name");
	}
	   
    $insert = "INSERT INTO user(fullname,username,userpass,img,levelid,status) 
    			VALUES( '$fullname' , '$user_name' , '$mdpass' , '$pic_name' , '$level', '$active_check')";
    $dbCon->query($insert) or die($dbCon->error);
	


    //echo $insert;
    header("Location: ../setting/user");    
    exit();        
    }  
}


function editUser()
{
	require '../include/config.php';
    $id = $_POST['id'];
    $user_name 	= $_POST['txtusername'];
    $user_pass 	= $_POST['txtuserpass'];
    $fullname 	= $_POST['txtname'];
    $level 	= $_POST['txtlevel'];
    $file       = $_FILES['fle']['name'];
    $file_tmp 	= $_FILES['fle']['tmp_name'];
    $active_check = $_POST['status'];
    $date_add = date("Y-m-d");
	
    $mdpass = md5($user_pass);
    
    $update = "UPDATE user SET fullname = '$fullname',
                               username = '$user_name'";
    if($user_pass!=""){
  	$update.=", userpass = '$mdpass'";
   }
    
    if($file != "")
	{
		check_size_user($file_tmp);
		$imgname = md5($file);
		$dot = substr($file,-3,3);
		$pic_name = $imgname."-".$date_add.".".$dot;
		$update.= ",img = '$pic_name'";
		resize($file_tmp,$pic_name,150,"../images/user/tmp/");
		copy($file_tmp,"../images/user/$pic_name");
        
	}

    $update.= ",levelid = '$level'
               ,status = '$active_check' where user_id = '$id' ";
    $dbCon->query($update) or die($dbCon->error);  
	
	
    //echo $update;
    header("Location: ../setting/user");    
    exit();          
}


function editpassword()
{
	require '../include/config.php';
    $id = $_POST['user_id'];
    $user_passold 	= $_POST['userpass'];
    $user_pass1 	= $_POST['userpassnew1'];
    $user_pass2 	= $_POST['userpassnew2'];

    $mdpass = md5($user_pass1);

    if($user_pass1==$user_pass2)
    {
        $update = "UPDATE user SET userpass = '$mdpass' where user_id = $id";
        $dbCon->query($update);
    }

     //echo $add_user;
    header('Location: ../main');    
	exit();         
}


function deleteUser()
{
	require '../include/config.php';
	$id = $_GET['id'];
	$img = $_GET['img'];

	
	$delete = "DELETE FROM user WHERE user_id = '$id' ";
	$dbCon->query($delete);
	
	//echo $delete;
	
	if($img != "")
	{
		unlink("../images/user/$img");
		unlink("../images/user/tmp/$img");
		
	}
	
	
	header('Location: ../setting/user');    
	exit();  
}


function deleteImg()
{
	require '../include/config.php';
	$id = $_GET['id'];
	$img = $_GET['img'];
	
	
	$update = "UPDATE user SET img = '' WHERE user_id = '$id' ";
	$dbCon->query($update);
	
	if($img != "")
	{
		unlink("../images/user/$img");
		unlink("../images/user/tmp/$img");
		
	}
	
	header("Location: ../setting/user/edit/$id");    
	exit(); 
}



/*function Upload images*/

function resize($image_tmp,$image_name,$width_size,$folder)
{
	$images = $image_tmp;
	$new_images = $image_name;
	$width= $width_size;
	$size=GetimageSize($images);
	$height=round($width*$size[1]/$size[0]);
	$images_orig = ImageCreateFromJPEG($images);
	$photoX = ImagesX($images_orig);
	$photoY = ImagesY($images_orig);
	$images_fin = ImageCreateTrueColor($width, $height);
	ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	ImageJPEG($images_fin,$folder.$new_images);
	ImageDestroy($images_orig);
	ImageDestroy($images_fin);
}

function check_size_user($image_tmp)
{
	$size = getimagesize($image_tmp);
	
	if($size[0] > 500)
	{
		?>
		<script type="text/javascript">

			alert("ขนาดภาพของคุณเกินขนาดที่กำหนดไว้ คือ 500px กรุณาเลือกรูปภาพที่มีขนาดไม่เกิน 500px หรือต่่ำกว่า");
			window.history.back();

		</script>
		<?php
		exit();
	}
}


/* end function Upload images*/
// function check user
function checkuseradd($username)
{
	require '../include/config.php';
	$cku  = $dbCon->query("select username from user  where  username = '$username' ") or die($dbCon->error);
	$numr = $cku->num_rows; 
	return $numr;
}



$dbCon->close();
?>