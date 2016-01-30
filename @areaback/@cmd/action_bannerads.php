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
    $name 		= $_POST['txtname'];
    $code 		= $_POST['txtcode'];
    $posision 	= $_POST['txtposision'];
    $line		= $_POST['txtline'];
    $link 		= $_POST['txtlink'];
    $datestart 	= $_POST['datestart'];
    $dateend 	= $_POST['dateend'];
    $status 	= $_POST['status'];
    $file       = $_FILES['fle']['name'];
    $file_tmp 	= $_FILES['fle']['tmp_name'];
    
    $id = NewID('BA','baid','banner_ads');
    
	if($file != "")
	{
		//check_size($file_tmp);
		
		$imgname = md5($file);
		$dot = substr($file,-3,3);
		$pic_name = md5($id).'_'.$imgname ."-".time().".".$dot;
		resize($file_tmp,$pic_name,300,"../../images/banner/ads/tmp/");
		copy($file_tmp,"../../images/banner/ads/$pic_name");
	}


    $insert = "INSERT INTO banner_ads(baid,baname,baimg,bacode,baline,baposition,balink,datestart,dateend,status) 
    			VALUES('$id', '$name','$pic_name', '$code' ,'$line','$posision','$link','$datestart','$dateend','$status')";
    $dbCon->query($insert) or die($dbCon->error);
	$dbCon->close();

    //echo $insert;
    header("Location: ../banner/bannerads");    
    exit();        
}


function editdata()
{
	require '../include/config.php';
    $id = $_POST['id'];
    $name 		= $_POST['txtname'];
    $code 		= $_POST['txtcode'];
    $posision 	= $_POST['txtposision'];
    $line		= $_POST['txtline'];
    $link 		= $_POST['txtlink'];
    $datestart 	= $_POST['datestart'];
    $dateend 	= $_POST['dateend'];
    $status 	= $_POST['status'];
    $file       = $_FILES['fle']['name'];
    $file_tmp 	= $_FILES['fle']['tmp_name'];
    	
    $update = "UPDATE banner_ads SET baname = '$name',
    								 bacode = '$code',
    								 baposition = '$posision',
    								 baline = '$line',
    								 balink = '$link',
    								 datestart = '$datestart',
    								 dateend = '$dateend'";
    
    if($file != "")
	{
		//check_size($file_tmp);
		
		$imgname = md5($file);
		$dot = substr($file,-3,3);
		$pic_name = md5($id).'_'.$imgname ."-".time().".".$dot;
		resize($file_tmp,$pic_name,300,"../../images/banner/ads/tmp/");
		copy($file_tmp,"../../images/banner/ads/$pic_name");
		$update.=",baimg = '$pic_name'";
	}
    
    $update.= ",status = '$status' where baid = '$id' ";
    $dbCon->query($update) or die($dbCon->error);  
	$dbCon->close();
	
    //echo $update;
    header("Location: ../banner/bannerads");    
    exit();          
}



function deldata()
{
	require '../include/config.php';
	$id = $_GET['id'];
	$img = $_GET['img'];

	
	$delete = "DELETE FROM banner_ads WHERE baid = '$id' ";
	$dbCon->query($delete);
	
	if($img!=''){
		unlink("../../images/banner/ads/tmp/$img");
		unlink("../../images/banner/ads/$img");
	}
	$dbCon->close();
	//echo $delete;
	
	header('Location: ../banner/bannerads');    
	exit();  
}


function delimg()
{
	require '../include/config.php';
	$id = $_GET['id'];
	$img = $_GET['img'];
	
	$delimg = "UPDATE banner_ads SET baimg = '' WHERE baid = '$id' ";
	$dbCon->query($delimg);
	
	
	
	if($img!=''){
		unlink("../../images/banner/ads/tmp/$img");
		unlink("../../images/banner/ads/$img");
	}
	
	//echo $delete;
	$dbCon->close();
	header("Location: ../banner/bannerads/edit/$id");    
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

function NewID($prefix,$fill,$tb)
{
		require '../include/config.php';
		//$y = date("y")+43;
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