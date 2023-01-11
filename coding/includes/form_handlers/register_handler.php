<?php 
/* Declared Variables */
$fname = ""; //Names
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = ""; //Date user joined
$error_array = array(); //Holds the error mssgs

if(isset($_POST['register_button'])) {
//Reg Values
	//First name
	$fname = strip_tags($_POST['reg_fname']);
	$fname = str_replace(' ', '', $fname);
	$fname = ucfirst(strtolower($fname)); //Capitalizes the name
	$_SESSION['reg_fname'] = $fname; //Stores fname values
	
	$lname = strip_tags($_POST['reg_lname']);
	$lname = str_replace(' ', '', $lname);
	$lname = ucfirst(strtolower($lname));
	$_SESSION['reg_lname'] = $lname;
	
	$em = strip_tags($_POST['reg_email']);
	$em = str_replace(' ', '', $em);
	$em = ucfirst(strtolower($em));
	$_SESSION['reg_email'] = $em;
	
	$em2 = strip_tags($_POST['reg_email2']);
	$em2 = str_replace(' ', '', $em2);
	$em2 = ucfirst(strtolower($em2));
	$_SESSION['reg_email2'] = $em2;
	
	$password = strip_tags($_POST['reg_password']);
	
	$password2 = strip_tags($_POST['reg_password2']);
	
	$date = date("Y-m-d");
	
	if($em == $em2) {
		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
		
		$em = filter_var($em, FILTER_VALIDATE_EMAIL);
		
		//Checking if they match
		$e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$em'");
		//Check number rows returned
		$num_rows = mysqli_num_rows($e_check);
			
			if($num_rows > 0) {
				
				array_push($error_array, "Oops... Someone else is using this email<br>");
			}
			
	}
		else { 
			array_push($error_array, "Invalid Format<br>");
		}
	
	}
	else {
		array_push($error_array, "Make sure the email matches<br>");
	}
	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "The first name must be between 2 and 25 characters long<br>");
	}
	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array, "The last name must be between 2 and 25 characters long<br>");
	}
	if($password != $password2) {
		array_push($error_array, "Passwords do not match<br>");
	}
	else {
		if(preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain English characters and numbers<br>");
		}
	}
	if(strlen($password) > 30 || strlen($password) < 5) {
		array_push($error_array, "The password must be between 5 and 30 characters long<br>");
	}

	if(empty($error_array)) {
		$password = md5($password); // md5 encrypts the password before being sent to the database
		
		// Username Generation
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
		
		$i = 0;
		//if username is already taken add # to it
		while(mysqli_num_rows($check_username_query) != 0 ) {
			$i++; // adds 1 to 1
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
		}
		//Profile Picture Setup
		//Maybe later set up multiple default under random (php can do it)
		$profile_pic = "assets/images/profile_pics/defaults/grey_profile_pic.png";
		
		//VALUES FINALLY
		$query = mysqli_query($con, "INSERT INTO users VALUES('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");
		array_push($error_array, "<span>You've created your account and can now sign in</span><br>");
	
		$_SESSION['reg_fname'] = "";
		$_SESSION['reg_lname'] = "";
		$_SESSION['reg_email'] = "";
		$_SESSION['reg_email2'] = "";
	
	
	}
}
?>