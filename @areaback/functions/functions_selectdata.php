<?php
function selectdata($tb,$colume,$whereid,$condition){
	require "include/config.php";

	$sql = "select $colume as data from $tb where $whereid = '$condition'";
	$select = $dbCon->query($sql);
	$re = $select->fetch_object();

	return $re->data;
}


function selectprice($id){
	require "include/config.php";

	$sql = "select prodprice,prodprice_promo from products where prodid = '$id' ";
	$select = $dbCon->query($sql);
	$re = $select->fetch_object();

	if($re->prodprice_promo!=''){
		$price = $re->prodprice_promo;
	}else{
		$price = $re->prodprice;
	}


	return $price;
}


function sex($sex){
	
	if($sex==1){
		$txtsex = "ชาย";
	}elseif($sex==2){
		$txtsex = "หญิง";
	}elseif($sex==3){
		$txtsex = "สาวประเภทสอง";
	}
	
	return $txtsex;
}

function groupmember($id){
	require "include/config.php";

	$sql = "select * from pretty where pretty_id = '$id'";
	$select = $dbCon->query($sql);
	$re = $select->fetch_object();
	
	if($re->pretty==1){
		$txtpretty = "<span class='label label-success'>Pretty</span>";
	}
	if($re->mc==1){
		$txtmc = "<span class='label label-success'>Mc</span>";
	}
	if($re->model==1){
		$txtmodel = "<span class='label label-success'>Model</span>";
	}
	if($re->interlook==1){
		$txtinterlook = "<span class='label label-success'>InterLook</span>";
	}
	if($re->artiste==1){
		$txtartiste = "<span class='label label-success'>Artiste</span>";
	}
	
	
	$mixtext = $txtpretty.' '.$txtmc.' '.$txtmodel.' '.$txtinterlook.' '.$txtartiste;
	return $mixtext;
}

$arrshirt_size = array('SSS','SS','S','S/M','M','M/L','L','L/XL','XL');
$arrpants = array('S','S/M','M','M/L','L','L/XL','XL');
$arrskin = array('ขาว','ขาว/เหลือง','ขาว/ชมพู','แทน/น้ำผึ้ง');
$arrhair = array('ดำ','น้ำตาลอ่อน','น้ำตาลเข้ม','น้ำตาลแดง','ทอง','ทองแดง','ขาว','เขียว','เหลือง','แดง','Blond','Caramel','Chocolate Brown','Expresso','Red hot Cinnamon','Light Auburn','Light Brown','Dark Golden Brown','Medium Ash Brown','Pure Diamond','Ruby Fusion','Blowont Burgundy','Reddish Blonde');
$arreyes = array('ดำ','น้ำตาลอ่อน','น้ำตาลเข้ม','ฟ้า','เขียว','เขียวอมน้ำตาล','น้ำเงิน/ฟ้าเข้ม');
$arrcontactlens = array('ได้','ไม่ได้');
$arrmakeup = array('ได้','ไม่ได้');
$arrtattoo = array('ไม่มี','มี');
$arrorthodontics = array('ไม่มี','มี');
$arrnavel = array('ไม่มี','มี');
$arrpassport = array('ไม่มี','มี');


//form add banner ads
$arrposision = array("1"=>"ด้านบน 728x90px","2"=>"ด้านข้างขวา 300x250px (บน)","3"=>"ด้านข้างขวา 300x250px (กลาง)","4"=>"ด้านข้างขวา 300x250px (ล่าง)","5"=>"หน้าข้อมูลพริตตี้ 300x250px (ตรงกลาง)");
$arrlineads = array('0','1','2','3','4','5','6','7','8','9','10');

?>