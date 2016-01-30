<?php
session_start();
require '../include/config.php';
require '../functions/functions_checkuser.php';
header("Content-type:text/html;charset=UTF-8");

$select = isset($_GET['select']) ? $_GET['select'] : '';

switch($select){
    
    case 'add' :
         addData();
         break;
         
    case 'edit' :
         editData();
         break;
         
    case 'del' :
         deleteData();
         break;
    
    case 'delimg' :
         deleteImg();
         break;
         
         
    default :
	header('Location: ../index.php');
	break;
}

/*
    Add a user
*/
function addData()
{
	require '../include/config.php';
    $user_name 	= $_POST['txtusername'];
    $user_pass 	= $_POST['txtuserpass'];
    $idcard 	= $_POST['txtidcard'];
    $name	 	= $_POST['txtname'];
    $surname 	= $_POST['txtsurname'];
    $address 	= $_POST['txtaddress'];
    $tel	 	= $_POST['txttel'];
    $email	 	= $_POST['txtemail'];
    $province 	= $_POST['txtprovince'];
    $file       = $_FILES['fle']['name'];
    $file_tmp 	= $_FILES['fle']['tmp_name'];
    $active_check = $_POST['status'];
    $pageurl 	= $_POST['pageurl'];
    $mtype 		= $_POST['mtype'];
    $date_add = date("Y-m-d");
	
	$id = NewID('M','member_id','member_register');
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
		//check_size_user($file_tmp);
		
		$imgname = md5($file);
		$dot = substr($file,-3,3);
		$pic_name = $id.'_'.$imgname ."_".$date_add.".".$dot;
		resize($file_tmp,$pic_name,200,"../../images/member/tmp/");
		copy($file_tmp,"../../images/member/$pic_name");
	}
	   
    $insert = "INSERT INTO member_register(member_id,member_name,member_surname,member_address,provincecode,id_card,member_phone,member_email,member_username,member_pass,member_pass2,member_img,$mtype,status_active) 
    			VALUES('$id', '$name' ,'$surname','$address','$province','$idcard','$tel','$email','$user_name', '$mdpass' ,'$user_pass' ,'$pic_name' , '1' , '$active_check')";
    $dbCon->query($insert) or die($dbCon->error);
	$dbCon->close();


    //echo $insert;
    header("Location: ../member/$pageurl");    
    exit();        
    }  
}


function editData()
{
	require '../include/config.php';
    $id = $_POST['id'];
    $user_name 	= $_POST['txtusername'];
    $user_pass 	= $_POST['txtuserpass'];
    $idcard 	= $_POST['txtidcard'];
    $name	 	= $_POST['txtname'];
    $surname 	= $_POST['txtsurname'];
    $address 	= $_POST['txtaddress'];
    $tel	 	= $_POST['txttel'];
    $email	 	= $_POST['txtemail'];
    $province 	= $_POST['txtprovince'];
    $file       = $_FILES['fle']['name'];
    $file_tmp 	= $_FILES['fle']['tmp_name'];
    $active_check = $_POST['status'];
    $pageurl 	= $_POST['pageurl'];
    $mtype 		= $_POST['mtype'];
    $date_add = date("Y-m-d");
	
    $mdpass = md5($user_pass);
    
    $update = "UPDATE member_register SET member_name = '$name',
    									  member_surname = '$surname',
                               			  member_address = '$address',
                               			  provincecode = '$province',
                               			  id_card = '$idcard',
                               			  member_phone = '$tel',
                               			  member_email = '$email',
                               			  member_username = '$user_name' ";
    if($user_pass!=""){
  	$update.=", member_pass = '$mdpass' ,member_pass2 = '$user_pass' ";
   	}
    
    if($file != "")
	{
		//check_size_user($file_tmp);
		$imgname = md5($file);
		$dot = substr($file,-3,3);
		$pic_name = $id.'_'.$imgname."_".$date_add.".".$dot;
		$update.= ",member_img = '$pic_name'";
		resize($file_tmp,$pic_name,200,"../../images/member/tmp/");
		copy($file_tmp,"../../images/member/$pic_name");
        
	}

    $update.= ",status_active = '$active_check' where member_id = '$id' ";
    $dbCon->query($update) or die($dbCon->error);  
	$dbCon->close();
	
    //echo $update;
    header("Location: ../member/$pageurl");    
    exit();          
}


function deleteData()
{
	require '../include/config.php';
	$id = $_GET['id'];
	$pageurl = $_GET['pageurl'];
	$img = $_GET['img'];

	
	$delete = "DELETE FROM member_register WHERE member_id = '$id' ";
	$dbCon->query($delete);
	$dbCon->close();
	//echo $delete;
	
	if($img != "")
	{
		unlink("../../images/member/$img");
		unlink("../../images/member/tmp/$img");
		
	}
	
	
	header("Location: ../member/$pageurl");    
	exit();  
}


function deleteImg()
{
	require '../include/config.php';
	$id = $_GET['id'];
	$pageurl = $_GET['pageurl'];
	$img = $_GET['img'];
	
	
	$update = "UPDATE member_register SET member_img = '' WHERE member_id = '$id' ";
	$dbCon->query($update);
	
	if($img != "")
	{
		unlink("../../images/member/$img");
		unlink("../../images/member/tmp/$img");
		
	}
	$dbCon->close();
	header("Location: ../member/$pageurl/edit/$id");    
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
	$cku  = $dbCon->query("select member_username from member_register  where  member_username = '$username' ") or die($dbCon->error);
	$numr = $cku->num_rows; 
	$dbCon->close();
	
	
	return $numr;
}


function NewID($prefix,$fill,$tb)
{
	require '../include/config.php';
	$y = date("y")+43;
	$sql = "Select Max(substr($fill,-4))+1 as MaxID from $tb";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();
	$new_id = $re->MaxID;
	//$new_id =mysql_result(mysql_query("Select Max(substr($fill,-5))+1 as MaxID from $tb"),0,"MaxID");
		if($new_id==''){ // ถ้าได้เป็นค่าว่าง หรือ null ก็แสดงว่ายังไม่มีข้อมูลในฐานข้อมูล
       		$idnew="$prefix"."0001";
    	}else{
       		$idnew="$prefix".sprintf("%04d",$new_id);//ถ้าไม่ใช่ค่าว่าง
     	}
            
   		$dbCon->close();
   		return $idnew;
}


$dbCon->close();
?>