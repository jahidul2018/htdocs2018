<?php

session_start();
if((!isset ($_SESSION['username']) == true) and (!isset ($_SESSION['password']) == true))
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
<h2>Welcome to Second page</h2>

<p>This page is the second page having session name "<?php echo $logged; ?>"
<a href=”logout.php”>logout</a>
</center>
</body>
</html>