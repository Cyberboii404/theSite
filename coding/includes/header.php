<?php 
require 'config/config.php';

if(isset($_SESSION['username'])) {
	$userLoggedin = $_SESSION['username'];
}
else {
	header("Location: register.php");
}

?>


<body>


<div class="wrapper">


</body>