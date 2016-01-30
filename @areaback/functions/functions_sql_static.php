<?php
//count product
function countdatastatic($tb,$wh)
{
	require "include/config.php";
	$sql = "select count(*) as cdata from $tb where $wh";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();
	
	return $re->cdata;
}

function countsaler()
{
	require "include/config.php";
	$sql = "select count(*) as cdata from orders_detail group by prodid";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();
	
	return $re->cdata;	
}


function sumpriceorder()
{
	require "include/config.php";
	$sql = "select sum(grandtotal) as sum from orders";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();
	
	return $re->sum;
}

//functions static select
function staticToday()
{
	require "include/config.php";
	$date = date("Y-m-d");
	
	$sql = "select sum(crating) as sumrating from static_rate where date = '$date' ";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();	
	
	return $re->sumrating;
}

function staticLastday()
{
	require "include/config.php";
	$date = date("Y-m-").(date("d")-1);
	
	$sql = "select sum(crating) as sumrating from static_rate where date = '$date' ";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();	
	
	return $re->sumrating;
	//return $date;
}

function staticMonth()
{
	require "include/config.php";
	$date = date("m");
	
	$sql = "select sum(crating) as sumrating from static_rate where month(date) = '$date' ";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();	
	
	return $re->sumrating;
	//return $date;
}

function staticYear()
{
	require "include/config.php";
	$date = date("Y");
	
	$sql = "select sum(crating) as sumrating from static_rate where YEAR(date) = '$date' ";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();	
	
	return $re->sumrating;
	//return $date;
}

function staticAll()
{
	require "include/config.php";
	
	$sql = "select sum(crating) as sumrating from static_rate";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();	
	
	return $re->sumrating;
	//return $date;
}



?>