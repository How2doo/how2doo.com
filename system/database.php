<?php
$connect = mysqli_connect("database_host","database_username","database_password","database");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($connect,"utf8");
?>
