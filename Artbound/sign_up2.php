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
			$UserID=$fetch['UserID'];
			$image=$fetch['ProfileImage'];
			//echo $UserID;
		}
	}
	
	if($image != ""){
		header('location: home.php');
	}
	
 ?>	
 
 
 <?php
		
							if(isset($_POST['Upload'])){
									
									$imageName=$_FILES['file']['name'];
									$imageType=$_FILES['file']['type'];
									$imageSize=$_FILES['file']['size'];
									$imageTemp=$_FILES['file']['tmp_name'];
									
									if($imageType=="image/jpeg" || $imageType=="image/jpg" || $imageType=="image/png"){
										if($imageSize<=2048000 && $imageSize>=51200){
											move_uploaded_file($_FILES['file']['tmp_name'],"upload/$imageName") or die("Product not moved");
											
											echo "<script type='text/javascript'>
													alert('Image Uploaded');
													window.location='sign_up3.php';
													</script>";
											
											 
										}
										
										else{
											echo "<script type='text/javascript'>alert('Poor Image Quality');</script>";
										}
									}
									
									else{
										echo "<script type='text/javascript'>alert('File Type Did Not Match');</script>";
									}
									
									$connect = mysql_connect("127.0.0.1", "root", "") or die("Couldn't connect to localhost");
									mysql_select_db("Artbound") or die("Database couldn't be found");
									
									$query = "Update Users set ProfileImage='$imageName' Where UserID='$UserID'";
									$result = mysql_query($query, $connect);
									
									if(!$result){
										echo "Error: ".mysql_error();
									}
									
								}
								

?>

<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Profile Image </title>
		<link href="CSS/style.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript"> 
		
			function preview(event){
				var output= document.getElementById('output');
				output.src = URL.createObjectURL(event.target.files[0])
			}
		
		</script>
	</head>
	
	<body>
	
		<div class="profile1">
		
			<div class="step">
				<p>Step 1</p>
			</div>
			
			<div class="profile_body">
				<div id="sidebar1">
					<ul class="mcd-menu">
						<li>
							<a href=""  class="active">
								<img src="image/user1.png"/>
								<strong>Profile Image</strong>
								<small>share your image</small>
							</a>
						</li>
						<li>
							<a href="">
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
				
				<div class="profile_img">
					<div id="image_upload">
						<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
						<label>Profile Image</label>
							<div id="image_preview">
								<img id="output" src="" />
							</div>
							
							<div id="selectImage">
							
								<label>Select Your Image</label><br/>
								<input type="file" accept="image/*" onchange="preview(event)" name="file" id="file" required />
								<input type="submit" value="Upload" name="Upload" id="submit" />
							</div>
						</form>
					</div>
					
					<div class="buttons">
					
						<input id="skip1" type="button" onclick="myFunction()" name="skip" value="Skip"/>
						
						<script type="text/javascript">
						function myFunction()
						{
								var r = confirm("About Me information will help other users to know you better. Do you want to skip it?");
								if (r == true)
								{
									window.location.href="sign_up3.php";
								}
						}
						</script>
					</div>
				</div>
			</div>
			
		</div>
	
	</body>
</html>