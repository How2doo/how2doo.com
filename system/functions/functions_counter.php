<?php
function countdata($tb,$where){
	include '@areaback/include/config.php';

	$countdata = $dbCon->query("select count(*) as num from $tb where $where");
	$renum = $countdata->fetch_object();

	return $renum->num;
}


function countcategory($id){
	
	include '@areaback/include/config.php';

	$countdata = $dbCon->query("select count(*) as num from  post where category_id = '$id'");
	$renum = $countdata->fetch_object();

	return (int)$renum->num;
}

?>