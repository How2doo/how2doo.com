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
         
    case 'delimg' :
         delimg();
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
    $file       = $_FILES['fle']['name'];
    $file_tmp 	= $_FILES['fle']['tmp_name'];

	if($file != "")
	{
		check_size($file_tmp);
		
		$imgname = md5($file);
		$dot = substr($file,-3,3);
		$pic_name = $imgname ."-".time().".".$dot;
		resize($file_tmp,$pic_name,150,"../../images/catproduct/tmp/");
		copy($file_tmp,"../../images/catproduct/$pic_name");
	}


    $insert = "INSERT INTO catalog(catname,catimg) 
    			VALUES( '$name' , '$pic_name')";
    $dbCon->query($insert) or die($dbCon->error);
	$dbCon->close();

    //echo $insert;
    header("Location: ../products/cat");    
    exit();        
}


function editdata()
{
	require '../include/config.php';
    $id = $_POST['id'];
    $name 	= $_POST['txtname'];
    $file       = $_FILES['fle']['name'];
    $file_tmp 	= $_FILES['fle']['tmp_name'];
    	
    $update = "UPDATE catalog SET catname = '$name'";
    
    if($file != "")
	{
		check_size($file_tmp);
		
		$imgname = md5($file);
		$dot = substr($file,-3,3);
		$pic_name = $imgname ."-".time().".".$dot;
		resize($file_tmp,$pic_name,150,"../../images/catproduct/tmp/");
		copy($file_tmp,"../../images/catproduct/$pic_name");
		$update.=",catimg = '$pic_name'";
	}
    
    $update.= "where catid = '$id' ";
    $dbCon->query($update) or die($dbCon->error);  
	$dbCon->close();
	
    //echo $update;
    header("Location: ../products/cat");    
    exit();          
}



function deldata()
{
	require '../include/config.php';
	$id = $_GET['id'];
	$img = $_GET['img'];

	
	$delete = "DELETE FROM catalog WHERE catid = '$id' ";
	$dbCon->query($delete);
	
	if($img!=''){
		unlink("../../images/catproduct/tmp/$img");
		unlink("../../images/catproduct/$img");
	}
	$dbCon->close();
	//echo $delete;
	
	header('Location: ../products/cat');    
	exit();  
}


function delimg()
{
	require '../include/config.php';
	$id = $_GET['id'];
	$img = $_GET['img'];
	
	$delimg = "UPDATE catalog SET catimg = '' WHERE catid = '$id' ";
	$dbCon->query($delimg);
	
	
	
	if($img!=''){
		unlink("../../images/catproduct/tmp/$img");
		unlink("../../images/catproduct/$img");
	}
	
	//echo $delete;
	$dbCon->close();
	header("Location: ../products/cat/edit/$id");    
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