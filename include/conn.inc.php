<?php

$servername = "localhost"; //used because i used localhost for online insert ip address
$dBUsername = "root";
$dBPassword = "";
$dBName = "expense_tracker";

$conn = mysqli_connect( $servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {

die("CONNECTION FAILED: " .mysqli_connect_error());  // check if connection is FAILED

}

?>