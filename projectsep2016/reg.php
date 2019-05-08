<?php
if(count($_POST)>0) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	$message = ucwords($key) . " field is required";
	break;
	}
	}
	/* Password Matching Validation */
	if($_POST['password'] != $_POST['confirm_password']){ 
	$message = 'Passwords should be same<br>'; 
	}

	/* Email Validation */
	if(!isset($message)) {
	if (!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)) {
	$message = "Invalid UserEmail";
	}
	}

	/* Validation to check if gender is selected */
	if(!isset($message)) {
	if(!isset($_POST["gender"])) {
	$message = " Gender field is required";
	}
	}
	if(!isset($message)) {
	if(!isset($_POST["phonenumber"])) {
	$message = " phone number field is required";
	}
	}
	if(!isset($message)) {
	if(!isset($_POST["location"])) {
	$message = " location number field is required";
	}
	}

	/* Validation to check if Terms and Conditions are accepted */
	if(!isset($message)) {
	if(!isset($_POST["terms"])) {
	$message = "Accept Terms and conditions before submit";
	}
	}

	if(!isset($message)) {
		require_once("dbcontroller.php");
		$db_handle = new DBController();
		$query = "INSERT INTO users (username, first_name, last_name, password, email, gender,user_level,type,phonenumber,location) VALUES
		('" . $_POST["userName"] . "', '" . $_POST["firstName"] . "', '" . $_POST["lastName"] . "', '" . $_POST["password"] . "', '" . $_POST["userEmail"] . "', '" . $_POST["gender"] . "','2','a', '" . $_POST["phonenumber"] . "', '" . $_POST["location"] . "')";
		$result = $db_handle->insertQuery($query);
		if(!empty($result)) {
			$message = "You have registered successfully!";	
			unset($_POST);
		} else {
			$message = "Problem in registration. Try Again!";	
		}
	}
}
?>
<html>
<head>
<title>Registration Form</title>
<style>
.message {color: #FF0000;
    font-weight: bold;
    text-align: center;
    width: 173%;
    padding: 10px;
    font-size: 25px;
    margin-left: 136px;}
body{width:610px; background: lightgrey;}
.demo-table {background: rgba(41, 171, 142, 0.93);
    width: 100%;
    border-spacing: initial;
    margin: 20px 0px;
    word-break: break-word;
    table-layout: auto;
    line-height: 1.8em;
    color: #333;
    position: inherit;
    margin-left: 360px;}
.demo-table td {padding: 6px 15px 10px 15px; font-size: 19px;}
.demoInputBox {padding: 7px;border: #F0F0F0 1px solid;border-radius: 4px;}
.btnRegister {padding: 14px;
    padding-right: 54px;
    background-color: #105258;
    border: 0;
    color: #FFF;
    cursor: pointer;
    margin-left: 620px;
    font-size: 17px;}
.btnlogin{ background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;}	
.divbtn{width:173%;}	
</style>
</head>
<body>
<center>
	<form name="frmRegistration" method="post" action="">
	<table border="0" width="500" align="center" class="demo-table" bgcolor="#eeeeee">
	<div class="message"><?php if(isset($message)) echo $message; ?></div>
	<tr>
	<td>Username</td>
	<td><input type="text" class="demoInputBox" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
	</tr>
	<tr>
	<td>First Name</td>
	<td><input type="text" class="demoInputBox" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></td>
	</tr>
	<tr>
	<td>Last Name</td>
	<td><input type="text" class="demoInputBox" name="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></td>
	</tr>
	<tr>
	<td>Password</td>
	<td><input type="password" class="demoInputBox" name="password" value=""></td>
	</tr>
	<tr>
	<td>Confirm Password</td>
	<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
	</tr>
	<tr>
	<td>Email</td>
	<td><input type="text" class="demoInputBox" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
	</tr>
	<tr>
	<td>Gender</td>
	<td><input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") { ?>checked<?php  } ?>> Male
	<input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") { ?>checked<?php  } ?>> Female
	</td>
	</tr>
	<tr>
	<td>Phone Number</td>
	<td><input type="text" class="demoInputBox" name="phonenumber" value="<?php if(isset($_POST['phonenumber'])) echo $_POST['phonenumber']; ?>"></td>
	</tr>
		<tr>
	<td>Address</td>
	<td><input type="text" class="demoInputBox" name="location" value="<?php if(isset($_POST['location'])) echo $_POST['location']; ?>"></td>
	</tr>
	
	
	<tr>
	<td></td>
	<td><input type="checkbox" name="terms"> I accept Terms and Conditions</td>
	</tr>
	</table>
	<div class="divbtn">
	<input type="submit" name="submit" value="Register" class="btnRegister"> 
	<a href="login.html" class="btnlogin">For Login</a>
	</div>
	<div>
	
	</div>
	</form>
</center>
</body></html>