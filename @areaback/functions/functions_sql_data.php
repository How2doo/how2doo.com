<?php
//functions check status
function typenews($id)
{
	require "include/config.php";
	$sql = "select * from type_news where type_id = '$id'";
	$q = $dbCon->query($sql);
	$re = $q->fetch_object();
	
	return $re->type_name_th;
}



?>