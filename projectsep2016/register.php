<html>
<head>
<title>registration form</title>
</head>
<body>
<?php include 'connect.php'; ?>

<?php include 'function.php'; ?>
  
<?php include 'title_bar.php'; ?> 
 
 
 
  <?php 
  if(isset($_POST['submit'])){
	  
	  $username =$_POST['username'];
	  $password =$_POST['password'];
	  $dob=$_POST['location'];
	  $email=$_POST['email'];
	  if(empty($username) or empty($password)or empty($email) or empty($dob)){
		  echo "<p>field empty !</p>";
			header('location: regtstration.html');
	  }else{
		  mysql_query("INSERT INTO users(id,username,password,user_level,type,email,location) VALUES('','$username','$password','2','a','$email','$dob' )");
		  echo "<p> Successfully Register !</p>";
		  header('location: login.html');
		  
		  }
		 header('location: login.html');
		 
	  } 
       
  ?>
  
  
 
</body>
</html>