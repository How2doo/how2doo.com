<?php
function countdata($tb,$where){
	require "include/config.php";

	$countdata = $dbCon->query("select count(*) as num from $tb where $where");
	$renum = $countdata->fetch_object();

	return $renum->num;
}


?>