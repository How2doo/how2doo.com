<?php

function putrating($tb,$whereid,$id)
{
	include '@backend/include/config.php';
	$ck = "select rating from $tb where $whereid = '$id' ";	
	$qck = $dbCon->query($ck);
	$reck = $qck->fetch_object();
	
	$num = $reck->rating+1;
	
	$update = "update $tb set rating = '$num' where $whereid = '$id'";
	$dbCon->query($update);
	
}

?>