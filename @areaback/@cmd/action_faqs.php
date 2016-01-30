<?php
session_start();
require '../include/config.php';
require '../functions/functions_checkuser.php';
header("Content-type:text/html;charset=UTF-8");

$select = isset($_GET['select']) ? $_GET['select'] : '';

switch($select){
    
    case 'add' :
         adddata();
         break;
         
    case 'edit' :
         editdata();
         break;
         
    case 'del' :
         deldata();
         break;
         
         
         
    default :
	header('Location: ../index.php');
	break;
}

/*
    Add a user
*/
function adddata()
{
	require '../include/config.php';
    $name 	= $_POST['txtname'];
    $detail 	= $_POST['txtdetail'];
    $userid = $_POST['userid'];
    $status = $_POST['status'];

    $insert = "INSERT INTO faq(question,answer,user_id,status) 
    			VALUES( '$name' , '$detail', '$userid', '$status')";
    $dbCon->query($insert) or die($dbCon->error);
	$dbCon->close();

    //echo $insert;
    header("Location: ../faq");    
    exit();        
}


function editdata()
{
	require '../include/config.php';
    $id = $_POST['id'];
    $name 	= $_POST['txtname'];
    $detail 	= $_POST['txtdetail'];
    $userid = $_POST['userid'];
    $status = $_POST['status'];
    
    $update = "UPDATE faq SET  	question = '$name',
    							answer = '$detail',
    							user_id = '$userid',
    							status = '$status'";
    
    $update.= "where faqid = '$id' ";
    $dbCon->query($update) or die($dbCon->error);  
	$dbCon->close();
	
    //echo $update;
    header("Location: ../faq");    
    exit();          
}



function deldata()
{
	require '../include/config.php';
	$id = $_GET['id'];

	
	$delete = "DELETE FROM faq WHERE faqid = '$id' ";
	$dbCon->query($delete);
	$dbCon->close();
	
	//echo $delete;
	
	header('Location: ../faq');    
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

function check_size($image_tmp)
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


$dbCon->close();
?>