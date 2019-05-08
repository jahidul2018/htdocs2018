<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">

<head>
	<title>User Warning</title>
	
	<link rel="stylesheet" type="text/css" href="style_contact.css" />
</head>

<body>
	<?php include ('connect.php'); ?>

<?php include ('function.php'); ?>
<?php
if($_SESSION['user_id']!=true)
{
	echo"<center><h1>YOU ARE NOT LOGIN !<br/></h1></center>";
	echo "<a href='login.html' > Try again</a>";
header('location: login.html');
	}
 ?>	
	
	
<?php 
	 
		if($user_level !=1){

		echo"<img src='images/warnning.gif' alt='warnnin' />";
		echo "<center><h1><a href='logout.php' >  GO BACK TO HOME PAGE !!YOU NEED TO LOGIN AGAIN!! </a></h1></center>";
	}
	else{
		header('location: admin.php');
		
	}
?>

	 
	
	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
	</script>
	<script type="text/javascript">
	_uacct = "UA-68528-29";
	urchinTracker();
	</script>

</body>

</html>