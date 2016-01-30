<?php
$connect = mysqli_connect("localhost","root","","how2doo_db");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($connect,"utf8");
?>
