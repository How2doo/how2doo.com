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
    $fullname 	= $_POST['txtname'];
    $email	 	= $_POST['txtemail'];
    $active_check = $_POST['status'];
    $date_add = date("Y-m-d");
	
	$id = NewID('N','member_id','member');
	   
    $insert = "INSERT INTO member(member_id,member_name,member_email,status) 
    			VALUES('$id', '$fullname' , '$email', '$active_check')";
    $dbCon->query($insert) or die($dbCon->error);
	$dbCon->close();
    //echo $insert;
    header("Location: ../member/newslater");    
    exit();        
}


function editData()
{
	require '../include/config.php';
    $id = $_POST['id'];
    $fullname 	= $_POST['txtname'];
    $email	 	= $_POST['txtemail'];
    $active_check = $_POST['status'];
    $date_add = date("Y-m-d");
    
    $update = "UPDATE member SET member_name = '$fullname',
                               	 member_email = '$email' ";


    $update.= ",status = '$active_check' where member_id = '$id' ";
    $dbCon->query($update) or die($dbCon->error);  
	$dbCon->close();
	
    //echo $update;
    header("Location: ../member/newslater");    
    exit();          
}


function deleteData()
{
	require '../include/config.php';
	$id = $_GET['id'];

	
	$delete = "DELETE FROM member WHERE member_id = '$id' ";
	$dbCon->query($delete);
	$dbCon->close();
	//echo $delete;
	
	
	header('Location: ../member/newslater');    
	exit();  
}

/*function Upload images*/
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