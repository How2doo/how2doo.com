<?php

function ads728($url){
	include '@backend/include/config.php';
	$advert2 = array();
	$date = date("Y-m-d");
	$sql = "select * from banner_ads where baposition = '1' and status = '1' and (datestart <= '$date' and dateend > '$date')";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		if($re->bacode==""){
			$advert2[] = "<img onclick=\"location.href='$re->balink'\" src=\"$url/images/banner/ads/$re->baimg\" alt=\"\" width='728' height='90' title='$re->baname' />";
		}else{
			$advert2[] = $re->bacode;
		}
	}
	
	shuffle($advert2); 
	return $advert2[0];
	
}


function ads300x1($url){
	include '@backend/include/config.php';
	$advert1 = array();
	$date = date("Y-m-d");
	$sql = "select * from banner_ads where baposition = '2' and status = '1' and (datestart <= '$date' and dateend > '$date')";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		if($re->bacode==""){
			$img = "<img onclick=\"location.href='$re->balink'\" src=\"$url/images/banner/ads/$re->baimg\" alt=\"\" width='300' height='250' title='$re->baname' />";
		}else{
			$img = $re->bacode;
		}
		
		array_push($advert1,$img);
	}
	
	//shuffle($advert2); 
	return implode(' ',$advert1);
}

function ads300x2($url){
	include '@backend/include/config.php';
	$advert2 = array();
	$date = date("Y-m-d");
	$sql = "select * from banner_ads where baposition = '3' and status = '1' and (datestart <= '$date' and dateend > '$date')";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		if($re->bacode==""){
			$img = "<img onclick=\"location.href='$re->balink'\" src=\"$url/images/banner/ads/$re->baimg\" alt=\"\" width='300' height='250' title='$re->baname' />";
		}else{
			$img = $re->bacode;
		}
		
		array_push($advert2,$img);
	}
	
	//shuffle($advert2); 
	return implode(' ',$advert2);
}


function ads300x3($url){
	include '@backend/include/config.php';
	$advert3 = array();
	$date = date("Y-m-d");
	$sql = "select * from banner_ads where baposition = '4' and status = '1' and (datestart <= '$date' and dateend > '$date')";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		if($re->bacode==""){
			$img = "<img onclick=\"location.href='$re->balink'\" src=\"$url/images/banner/ads/$re->baimg\" alt=\"\" width='300' height='250' title='$re->baname' />";
		}else{
			$img = $re->bacode;
		}
		
		array_push($advert3,$img);
	}
	
	//shuffle($advert2); 
	return implode(' ',$advert3);
}

function ads300x250_pretty($url){
	include '@backend/include/config.php';
	$advert3 = array();
	$date = date("Y-m-d");
	$sql = "select * from banner_ads where baposition = '5' and status = '1' and (datestart <= '$date' and dateend > '$date')";
	$q = $dbCon->query($sql);
	while($re = $q->fetch_object()){
		if($re->bacode==""){
			$img = "<img onclick=\"location.href='$re->balink'\" src=\"$url/images/banner/ads/$re->baimg\" alt=\"\" width='300' height='250' title='$re->baname' />";
		}else{
			$img = $re->bacode;
		}
		
		array_push($advert3,$img);
	}
	
	//shuffle($advert2); 
	return implode(' ',$advert3);
}


?>