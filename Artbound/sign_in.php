




<html>
<head>
	<title>Sign In</title>
	<link href="CSS/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>

	<div id="signin">
	
	
		<div id="page_link">
			<a href="home.php"> Home </a>
			<a href="about.php"> About </a>
			<a href="sign_up1.php"> Sign Up </a>
		</div>
	
		<h4>Sign In</h4>
		<form method="post">
		<?php

					if (isset($_POST['submit']) ){
						session_start();
						$user_name = $_POST['user_name'];
						$password = $_POST['password'];
						
						if($user_name && $password){
							$connect = mysql_connect("localhost", "root", "") or die("couldn't connect to localhost");
							mysql_select_db("Artbound") or die("Database not found");
							
							$query = mysql_query("SELECT * FROM Users WHERE UserName='$user_name' ");
							
							$result=mysql_num_rows($query);
							
							if($result !=0)
							{
								while($row=mysql_fetch_assoc($query))
								{
									$dbUserName=$row['UserName'];
									$dbPassword=$row['Password'];
									$attempts= $row['attempts'];
									$time= $row['timestamp'];
									$active= $row['Active'];
									$login_numbers= $row['LoginNumbers'];
								}
								
								
									if($user_name==$dbUserName && $password==$dbPassword)
									{
										
										if($active==1)
										{
											
											if( $time>time() )
											{
												echo "<p style='color:#FF0000; font-weight:bold; font-size:13.2px; margin-bottom:-44px; margin-top:24px'> Time-out!!!<a href='sign_in.php' style='margin-bottom:-44px; margin-top:24px'> Try again sometime later. </a> </p>";
											}
												
											else
											{
												$query=" update Users set timestamp='0' where UserName='$user_name' ";
												mysql_query($query, $connect) or die(mysql_error());
												
												$query=" update Users set attempts='0' where UserName='$user_name' ";
												mysql_query($query, $connect) or die(mysql_error());
												
												$login_numbers= $login_numbers+1;
												$query=" update Users set LoginNumbers='$login_numbers' where UserName='$user_name' ";
												mysql_query($query, $connect) or die(mysql_error());
													
												$_SESSION['logged_in']=true;
												@$_SESSION['UserName']= $user_name;
												
												if($login_numbers==1)
												{
													header("location:sign_up2.php");
												}
												
												else
												{
													header("location:home.php");
												}
												
											}
											
										}
										else{
											echo "<p style='color:#FF0000; font-weight:bold; font-size:13.2px; margin-bottom:-44px; margin-top:24px'> You didn't activate your account </p>";
										}
										
									}
									else
									{
										$attempts=$attempts+1;
										$query = " update Users set attempts='$attempts' where UserName='$user_name' ";
										mysql_query($query, $connect) or die( mysql_error());
										
										if($attempts>3){
											$time= time()+(60*1);
											$query=" update Users set timestamp='$time' where UserName='$user_name' ";
											mysql_query($query, $connect) or die(mysql_error());
										}
										
										if($attempts>4){
											echo "<p style='color:#FF0000; font-weight:bold; font-size:13.2px; margin-bottom:-44px; margin-top:24px'> Invalid Login Attempts More Than 4 Times. <a href='home.php' style='color:#0000FF'> Try Again </a> Sometime Later. </p>";
										}
										
										else{
											echo "<p style='color:#FF0000; font-weight:bold; font-size:13.2px; margin-bottom:-44px; margin-top:24px'> Invalid User Name or Password. Try Again. </p>";
										}
									}
									
								
							}
							
							else{
								echo "<p style='color:#FF0000; font-weight:bold; font-size:13.2px; margin-bottom:-44px; margin-top:24px'>Invalid Login</p><br>";
							}
							
							
						}
						
						else{
							echo "<p style='color:#FF0000; font-weight:bold; font-size:13.2px; margin-bottom:-44px; margin-top:24px'>Please, enter your User Name and Password</p>";
						}
						

					}

?>

			<input id="uname" type="text" name="user_name" placeholder="User Name"/>
			<input id="pass" type="password" name="password" placeholder="Password"/>
			<input id="submit2" type="submit" name="submit" value="Submit"/>
		</form>
	</div>
	
	<div class="copyright2">
		<p>&copy; 2016 Artbound. All rights reserved | Powered by Pritom Chakraborty</p>
	</div>
				
</body>
</html>




