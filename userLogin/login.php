<?php
session_start();                              // Session start
include 'config.php';                         // Config for database connection
if(isset($_POST['check']))                    // Check form submit with IF Isset function
{
$username =$_POST['username'];                // set username to variable
$password =$_POST['password'];                //set password to variable
$result = mysql_query("SELECT * FROM `admin` WHERE `User`=’$username’ AND Password=’$password'");               //check from database
if(mysql_num_rows ($result) > 0 )
{
$_SESSION['username'] = $username;            // set session name
$_SESSION['password'] = $password;
header('location:mainpage.php');
}
else
{
$err="Authentication Failed Try again!";
}
}
?>
<html>
<head>
<title>Main Page</title>
</head>
<body>
<Center>
<?php if(isset($err)){ echo $err; } ?> <!– Print Error –>

<form method="POST" name="loginauth" target="_self">

User Name: <input name="username" size="20" type="text" />
<br/><br/>
Pass Word: <input name="password" size="20" type="password" />
<br/><br/>
<input name="check" type="submit" value="Authenticate" />
</form>
</center>
</body>
</html>