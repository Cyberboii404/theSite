<?php 
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>


<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to Rippule</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>

<body>
	<header>
		<div class="topnav">
			
		</div>
	
	</header>
<div class="container">
	<div class="form">
			<h3>Login</h3><br>
		<form action="register.php" method="POST">
		
		<input type="email" name="log_email" placeholder="Email Address" value="<?php
		if(isset($_SESSION['log_email'])) {
			echo $_SESSION['log_email'];
		}  
		 ?>" required>
		<br><br>
		<input type="password" name="log_password" placeholder="Password">
		<br><br>
		<input type="submit" name="login_button" value="Login">
		
		<?php if(in_array("Email or password is incorrect<br>", $error_array)) echo "Email or password is incorrect<br>"; ?>
	</form>
	
	
	<form action="register.php" method="POST">
	<input type="text" name="reg_fname" placeholder="First Name" value="<?php
		if(isset($_SESSION['reg_fname'])) {
			echo $_SESSION['reg_fname'];
		}  
		 ?>"  required>
		<br>
	<?php if(in_array("The first name must be between 2 and 25 characters long<br>", $error_array)) echo "The first name must be between 2 and 25 characters long<br>"; ?>
	<input type="text" name="reg_lname" placeholder="Last Name" value="<?php
		if(isset($_SESSION['reg_lname'])) {
			echo $_SESSION['reg_lname'];
		}  
		 ?>" required>
		<br>
		<?php if(in_array("The last name must be between 2 and 25 characters long<br>", $error_array)) echo "The last name must be between 2 and 25 characters long<br>"; ?>
	<input type="email" name="reg_email" placeholder="Email" value="<?php
		if(isset($_SESSION['reg_email'])) {
			echo $_SESSION['reg_email'];
		}  
		 ?>" required>
		<br>
	<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
		if(isset($_SESSION['reg_email2'])) {
			echo $_SESSION['reg_email2'];
		}  
		 ?>" required>
		<br>
		<?php if(in_array("Oops... Someone else is using this email<br>", $error_array)) echo "Oops... Someone else is using this email<br>";
		else if(in_array("Invalid Format<br>", $error_array)) echo "Invalid Format<br>";
		else if(in_array("Make sure the email matches<br>", $error_array)) echo "Make sure the email matches<br>"; ?>
	<input type="password" name="reg_password" placeholder="Password" required>
		<br>
	<input type="password" name="reg_password2" placeholder="Confirm Password" required>
		<br>
		<?php if(in_array("Passwords do not match<br>", $error_array)) echo "Passwords do not match<br>";
		else if(in_array("Your password can only contain English characters and numbers<br>", $error_array)) echo "Your password can only contain English characters and numbers<br>";
		else if(in_array("The password must be between 5 and 30 characters long<br>", $error_array)) echo "The password must be between 5 and 30 characters long<br>"; ?>
	<input type="submit" name="register_button" value="Register">	
		<br>
		<?php if(in_array("<span>You've created your account and can now sign in</span><br>", $error_array)) echo "<span>You've created your account and can now sign in</span><br>"; ?>
	</form>
	</div>
</div>
	
	
	

</body>
</html>