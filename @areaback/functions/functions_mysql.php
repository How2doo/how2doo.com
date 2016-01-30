<?php
//function sql data from database

//sql select province
$sqlprovince = "SELECT * FROM province";
$queryprovince = $dbCon->query($sqlprovince);	

//sql select catalog
$sqlcatalog = "SELECT * FROM catalog";
$querycatalog = $dbCon->query($sqlcatalog);	

//sql select brand
$sqlbrand = "SELECT * FROM brand";
$querybrand = $dbCon->query($sqlbrand);

//sql select varible
$sqlvarible = "SELECT * FROM product_varible";
$queryvarible = $dbCon->query($sqlvarible);

?>