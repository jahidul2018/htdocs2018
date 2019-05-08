<?php
session_start();
if((!isset ($_SESSION['username']) == true) and (!isset ($_SESSION['password']) == true))             // check session condition
{
unset($_SESSION['username']);                                
unset($_SESSION['password']);
header('location:login.php');
}
$logged = $_SESSION['username'];
?>
<html>
<head>
</head>
<body>
<center>
<h2>Welcome to Main page</h2><h3> Here we go with <a href="Secondpage.php">Second page </a></h3>
<a href=”logout.php”>logout</a>
</center>
</body>
</html>