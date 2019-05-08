<?php

if(isset($_GET["user"])){
	$UserID = $_GET["user"];
	
	$connect=mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("Artbound") or die(mysql_error());
	$query="UPDATE Users SET ActivityClearance='Active' WHERE UserID='$UserID'" or die(mysql_error());
	$result=mysql_query($query, $connect) or die(mysql_error());
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	
	else{
		header("location: blocked_users.php");
	}
	
}


?>