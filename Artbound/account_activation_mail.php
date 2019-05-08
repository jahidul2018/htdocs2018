<?php
	$x= $_GET['activation_code'];
	$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
	mysql_select_db("Artbound") or die ("Couldn't connect to database");
	$query="update users set active=1 and ActivityClearance='Active' where ActivationCode='".$x."'";
	mysql_query($query,$connect) or die("Not Happened");
	header('location: sign_in.php');
?> 