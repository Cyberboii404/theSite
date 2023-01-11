<?php 
ob_start();
session_start();

$timezone = date_default_timezone_set("America/Kentucky/Louisville");
$con = mysqli_connect("localhost", "root", "", "rippule");

if(mysqli_connect_errno()) {
	echo "Failed to connect: " . mysqli_connect();
}


?>