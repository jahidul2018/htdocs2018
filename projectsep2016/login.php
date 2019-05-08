<html>

<head>
<title>login.php</title>
</head>
<body>
<?php include 'connect.php'; ?>

  <?php include 'function.php'; ?>
  


  <?php 
  if(isset($_POST['submit'])){
	  $username =$_POST['username'];
	  $password =$_POST['password'];
	  if(empty($username) or empty($password)){
		  echo "<p>field empty !</p>";
		  
	  }
	  
	  
	  else{
		  $check_login =mysql_query("SELECT id,type FROM users WHERE username='$username' AND password='$password' ");
		 if(mysql_num_rows($check_login)==1){
			 	$run= mysql_fetch_array($check_login);
				$user_id = $run['id'];
				$type =$run['type'];
				if($type=='d'){
					echo "<p> the id is deactivited by the site admin</p>";
					
					}else{
						  $_SESSION['user_id']=$user_id;
								header('location: index.html');
						}
			 }else{
				 echo "<p>user name or password inceract</p>";
				 			header('location: login.html');
				 }
		 
		  }
		
		 
	  } 
       
  ?>
  