<?php
$server_name = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "project_db";

$con = mysqli_connect( $server_name, $db_user, $db_pass, $db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>