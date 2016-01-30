<?php
function selectdata($tb,$colume,$whereid,$condition){
	include '@backend/include/config.php';

	$sql = "select $colume as data from $tb where $whereid = '$condition'";
	$select = $dbCon->query($sql);
	$re = $select->fetch_object();

	return $re->data;
}

function context($txt)
{
	if($txt=="0" OR $txt==""){
		$t = "-";	
	}else{
		$t = $txt;
	}
	
	return $t;
}


function province($id){
	include '@backend/include/config.php';

	$sql = "select provincename from province where provincecode = '$id'";
	$select = $dbCon->query($sql);
	$re = $select->fetch_object();

	return $re->provincename;
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
	include '@backend/include/config.php';

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

function amountprice(){
	include '@backend/include/config.php';
	
	$Total = 0;
	$SumTotal = 0;
	for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
	{
 		if($_SESSION["strProductID"][$i] != "")
		{
			$sqlcart = "select * from products where prodid = '".$_SESSION["strProductID"][$i]."' ";
			$qcart = $dbCon->query($sqlcart);
			$recart = $qcart->fetch_object();
			if($recart->prodprice_promo!='' AND $recart->prodprice_promo!='0'){
				$price = $recart->prodprice_promo;
			}else{
				$price = $recart->prodprice;
			}
			$num++;
			$Total = $_SESSION["strQty"][$i] * $price;
			$SumTotal = $SumTotal + $Total;	
		}
	}
	
	return "(".$num.") ฿".number_format($SumTotal,2);
}

function selectprice($id){
	include '@backend/include/config.php';

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


function selectsumprice($id,$shipid)
{
	include '@backend/include/config.php';
	
	$sql = "select sum(qty*price) as price from orders_detail where orderid = '$id'";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();
	
	$sh = "select shipamount from shipping where shipid = '$shipid'";
	$qsh = $dbCon->query($sh);
	$resh = $qsh->fetch_object();
	
	
	$price = $re->price+$resh->shipamount;	
	
	
	return $price;
}


//functions static select
function staticToday()
{
	include '@backend/include/config.php';
	$date = date("Y-m-d");
	
	$sql = "select sum(crating) as sumrating from static_rate where date = '$date' ";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();	
	
	return $re->sumrating;
}

function staticLastday()
{
	include '@backend/include/config.php';
	$date = date("Y-m-").(date("d")-1);
	
	$sql = "select sum(crating) as sumrating from static_rate where date = '$date' ";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();	
	
	return $re->sumrating;
	//return $date;
}

function staticMonth()
{
	include '@backend/include/config.php';
	$date = date("m");
	
	$sql = "select sum(crating) as sumrating from static_rate where month(date) = '$date' ";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();	
	
	return $re->sumrating;
	//return $date;
}

function staticYear()
{
	include '@backend/include/config.php';
	$date = date("Y");
	
	$sql = "select sum(crating) as sumrating from static_rate where YEAR(date) = '$date' ";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();	
	
	return $re->sumrating;
	//return $date;
}

function staticAll()
{
	include '@backend/include/config.php';
	
	$sql = "select sum(crating) as sumrating from static_rate";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();	
	
	return $re->sumrating;
	//return $date;
}


function staticIP()
{
	include '@backend/include/config.php';
	$date = date("Y-m-d");
	
	$sql = "select count(*) as sumip from static_ip where date = '$date' ";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();
	
	return $re->sumip;
}

?>