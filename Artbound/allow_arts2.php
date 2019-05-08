<?php

if(isset($_GET["Art"])){
	$ArtID = $_GET["Art"];
	
	$connect=mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("Artbound") or die(mysql_error());
	$query="UPDATE art SET AdminClearance='Allowed' WHERE ArtID='$ArtID'" or die(mysql_error());
	$result=mysql_query($query, $connect) or die(mysql_error());
	
	if(!$result){
		echo "ERROR:".mysql_error();
	}
	
	echo "<script type='text/javascript'>
		  window.location='allow_arts.php';
		  </script>";
	
}

?>