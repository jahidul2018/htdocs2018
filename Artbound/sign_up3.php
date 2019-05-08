<?php

session_start();
	
	if($_SESSION['UserName']!=true){
		header('location: sign_in.php');
	}
	
	else{
		$UserName=$_SESSION['UserName'];
		//echo $UserName;
	}
	
	$connect=mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("Artbound") or die(mysql_error());
	$query="SELECT * FROM Users WHERE UserName='$UserName'" or die(mysql_error());
	$result=mysql_query($query, $connect) or die(mysql_error());
	$rows=mysql_num_rows($result);
	
	if($rows>0){
		while($fetch=mysql_fetch_assoc($result)){
			$user_id=$fetch['UserID'];
			$user_type=$fetch['UserType'];
			$user_about=$fetch['AboutMe'];
		}
	}
	
	if($user_about != ""){
		header('location: sign_up4.php');
	}

	
 ?>

<?php

if(isset($_POST['save']))
	{
		
			$about_me = $_POST['about_me'];
			
			$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
			mysql_select_db("Artbound") or die ("Couldn't connect to database");
			
			$query = "update Users set AboutMe='$about_me' Where UserID='$user_id'";
			
			$result = mysql_query($query, $connect);
			
			if(!$result){
				echo "Error : ".mysql_error();
			}
			
			else{
				header("location: sign_up4.php");
			}
	}
?>



<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> About Me </title>
		<link href="CSS/style.css" rel="stylesheet" type="text/css"/>
	</head>
	
	<body>
	
		<div class="profile">
		
			<div class="step">
				<p>Step 2</p>
			</div>
			
			<div class="profile_body">
				<div id="sidebar3">
					<ul class="mcd-menu">
						<li>
							<a href="">
								<img src="image/user1.png"/>
								<strong>Profile Image</strong>
								<small>share your image</small>
							</a>
						</li>
						<li>
							<a href="" class="active">
								<img src="image/aboutme1.png"/>
								<strong>About Me</strong>
								<small>write about yourself</small>
							</a>
						</li>
						<li>
							<a href="">
								<img src="image/card1.png"/>
								<strong>Credit Card</strong>
								<small>account information</small>
							</a>
						</li>
					</ul>
				</div>
				
				<div class="user_bio">
					<form method="post" action="" name="AboutMe">
						<label>About Me</label>
						<textarea id="about_me" name="about_me" maxlength="2000" placeholder="                 
			
			
			
			
			  You can share a brief details about yourself which might contain information about your          
			  Birthplace, Birth date, Educational Background, how you became interested or involved 
			       in Art, your feelings or philosophy about Art, where you are working right now etc. "></textarea>
			
						<span id="errAboutMe" class="error_about"></span>
						<input type="hidden" name="user_type" value="<?php echo $user_type;?>"/>
						<input id="back" type="button" onclick="backFunction()" name="back" value="Back"/>
						<input id="skip" type="button" onclick="myFunction()" name="skip" value="Skip"/>
						<input id="continue" type="submit" onclick=" return validate();" name="save" value="Save & Continue"/>
						
						<script type="text/javascript">
						function backFunction() {
							window.location.href="sign_up2.php";
						}
						</script>
						
						<script type="text/javascript">
						function myFunction() {
							
							//var utype = document.AboutMe.user_type.value;
							//if(utype!=="artist" && utype!=="collector")
							//{
								var r = confirm("About Me information will help other users to know you better. Do you want to skip it?");
								if (r == true)
								{
									window.location.href="sign_up4.php";
								} 
								else 
								{
									window.location.href="sign_up3.php";
								}
							
							//}
							
							//else
							//{
							//	alert("About Me information will help other users to know you better. As an Artist/Collector you need to fill up this field");	
							//}
						}
						</script>
										
						
						<script type="text/javascript">
						function validate(){
							
							var err=0;
							var erraboutme = document.getElementById("errAboutMe");
							var aboutme = document.AboutMe.about_me.value;
							
							if(aboutme === "")
							{
								erraboutme.innerHTML="Empty field! Please, write something about yourself.";
								err++;
							}
							
							else
							{
								erraboutme.innerHTML = " ";
							}
							
							console.log (err);
				
							if(err==0){
								console.log ( 'well done' );
								return true;
							}
							else{
								
								return false;
							}
						
						}		
									
						</script>		
						
					</form>
				</div>
			</div>
			
		</div>
	
	</body>
</html>