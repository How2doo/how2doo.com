<?php
function selectcog($fill)
{
	require '@backend/include/config.php';
	$sql = "SELECT $fill as data FROM setting WHERE id = 1";
	$query = $dbCon->query($sql);
	$res = $query->fetch_object();
	
	
	return $res->data;
}
?>