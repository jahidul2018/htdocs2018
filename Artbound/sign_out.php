<?php
		session_start();
		
		if(isset($_POST['sign_out']) || isset($_GET['sign_out'])){

		unset($_SESSION['UserName']);

		session_destroy() or die(mysql_error());

		header("location: sign_in.php");

		exit;
		}

?>