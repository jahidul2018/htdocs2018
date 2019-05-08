<?php

session_start();
	
	if($_SESSION['UserName']!=true){
		header('location: sign_in.php');
	}
	
	else{
		$UserName=$_SESSION['UserName'];
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
			$user_image=$fetch['ProfileImage'];
			$about_user=$fetch['AboutMe'];
	
			$UserName = $fetch['UserName'];
			$Email = $fetch['Email'];
			$Password = $fetch['Password'];
			$ContactNumber = $fetch['ContactNumber'];
		}
	}

	
 ?>

<?php

	if(isset($_POST['done1'])){
		$user_name = $_POST['user_name'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update users Set UserName = '$user_name' Where UserID = '$user_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		$_SESSION['UserName'] = $user_name;
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register1.php");
		}
	}

?>

<?php

	if(isset($_POST['done2'])){
		$email = $_POST['email'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update users Set Email = '$email' Where UserID = '$user_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register1.php");
		}
	}

?>

<?php

	if(isset($_POST['done3'])){
		$contact = $_POST['contact_number'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update users Set ContactNumber = '$contact' Where UserID = '$user_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register1.php");
		}
	}

?>

<?php

	if(isset($_POST['done4'])){
		$password = $_POST['password'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update users Set Password = '$password' Where UserID = '$user_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register1.php");
		}
	}

?>

<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Edit Profile : General Info </title>
		<link href="CSS/style.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>
		<main>
			<div class="logo_search">
				<div class="logo">
					<a href="home.php"><img src="image/logo.jpg"/></a>
				</div>
				
				<div class="search">
					<div class="form1">
						<form>
							<input type="text" value=""/>
							<select style="" name="SearchCategory">
								<option value="Art"> Art </option>
								<option value="Artist"> Artist </option>
								<option value="Collector"> Collector </option>
							</select>
						</form>
					</div>
				</div>
				
				<div id="login_status">
					<?php
					//session_start();
						$connect=mysql_connect("localhost", "root", "") or die(mysql_error());
						mysql_select_db("Artbound") or die(mysql_error());
						
						if(isset($_SESSION['UserName'])){
							$user_name = $_SESSION['UserName'];
							echo "<div id='menu_set'>";
							echo "<ul>";
								echo "<li><a href='#'><img src='image/user2.png'/><p>".$user_name."</p></a>";
									echo "<ul>";
										echo "<div id='submenu3'>";
											echo "<div id='column_list2'>";
											echo "<ul>";
											echo "<li><a href='user_profile.php'> Your Profile </a></li>";
											echo "<li><a href='sign_out.php?sign_out=$user_name'> Sign Out </a></li>";
											echo "</ul>";
											echo "</div>";
										echo "</div>";
									echo "</ul>";
								echo "</li>";
							echo "</ul>";
							echo "</div>";
						}
						else
						{
							echo "<p style='padding-top:10px; padding-left:37px; font-weight:bold; color:#FFFFFF; font-size:16px;'><a id='a1' href='sign_in.php' style='color:#FFFFFF; font-weight:bold; font-size:18px; font-family:cambria;'>Sign In</a> / <a href='sign_up1.php' style='color:#FFFFFF; font-weight:bold; font-size:18px; font-family:cambria;'>Sign Up</a></p>";
						}
						
					?>
				</div>
			</div>
			
			<div class="mainmenu">
				<div id="menu">
					<ul>
						<li><a href="about.php"> About </a></li>
						<li><a href="home.php"> Home </a></li>
						
						<li><a href="#"> Art Works </a>
								<ul>
									<div id="submenu">
											<div id="column1">
												<ul>
													<li> Style </li>
													<li><a href="fine_art.php"> Fine Art </a></li>
													<li><a href="abstract.php"> Abstract </a></li>
													<li><a href="composite.php"> Composite </a></li>
													<li><a href="modern.php"> Modern </a></li>
													<li><a href="pop_art.php"> Pop Art </a></li>
												</ul>
											</div>
											
											<div id="column2">
												<ul>
													<li> Subject </li>
													<li><a href="portrait.php"> Portrait </a></li>
													<li><a href="landscape.php"> Landscape </a></li>
													<li><a href="still_life.php"> Still Life </a></li>
													<li><a href="nature.php"> Nature </a></li>
													<li><a href="print.php"> Print </a></li>
												</ul>
											</div>
											
											<div id="column3">
												<ul>
													<li> Medium </li>
													<li><a href="oil.php"> Oil </a></li>
													<li><a href="water_colour.php"> Watercolour </a></li>
													<li><a href="acrylic.php"> Acrylic </a></li>
													<li><a href="airbrush.php"> Airbrush </a></li>
													<li><a href="digital.php"> Digital </a></li>
												</ul>
											</div>
									</div>
								</ul>
						</li>
						
						<li><a href="#"> Recently Arrived </a>
							<ul>
								<div id="submenu2">
									<div id="column_list">
									<ul>
										<li><a href="today.php"> Arrived Today </a></li>
										<li><a href="yesterday.php"> Arrived Yesterday </a></li>
										<li><a href="this_week.php"> Arrived This Week </a></li>
									</ul>
									</div>
								</div>
							</ul>
						</li>
						<li><a href="artist.php"> Artists </a></li>
						<li><a href="collector.php"> Collectors </a></li>
						<li><a href="ongoing_auction.php"> Ongoing Auction </a></li>
					</ul>
				</div>
			</div>
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="your_profile">
			
				<?php
					if($user_id && $user_type == "artist")
					{
						
				?>
					<div id="sidebar5">
						<ul id="mcd-menu2">
							<li>
								<a href="user_profile.php">
									<img src="image/aboutme2.png"/>
									<strong>About Me</strong>
									<small>your short biography</small>
								</a>
							</li>
							<li>
								<a href="art_gallery2.php">
									<img src="image/art1.png"/>
									<strong>Art Contents</strong>
									<small>your artworks</small>
								</a>
							</li>
							<li>
								<a href=""  class="active">
									<img src="image/edit.png"/>
									<strong>Edit Profile</strong>
									<small>change your information</small>
								</a>
								
									<ul>
										<li><a href="edit_register1.php"><img src="image/aboutme2.png"/>General Information</a></li>
										<li><a href="edit_register2.php"><img src="image/user1.png"/>Profile Image</a></li>
										<li><a href="edit_register3.php"><img src="image/aboutme4.png"/>About You</a></li>
										<li><a href="edit_register4.php"><img src="image/card1.png"/>Credit Card</a></li>
									</ul>
								
							</li>
							<li>
								<a href="art_upload.php">
									<img src="image/upload4.png"/>
									<strong>Upload Arts</strong>
									<small>upload your artworks</small>
								</a>
							</li>
						</ul>
					</div>
					
				<?php
					}	
				?>
				
				<?php
					if($user_id && $user_type == "member" || $user_type == "bidder")
					{
						
				?>
					<div id="sidebar5">
						<ul id="mcd-menu2">
							<li>
								<a href="user_profile.php">
									<img src="image/aboutme2.png"/>
									<strong>About Me</strong>
									<small>your short biography</small>
								</a>
							</li>

							<li>
								<a href=""  class="active">
									<img src="image/edit.png"/>
									<strong>Edit Profile</strong>
									<small>change your information</small>
								</a>
								
									<ul>
										<li><a href="edit_register1.php"><img src="image/aboutme2.png"/>General Information</a></li>
										<li><a href="edit_register2.php"><img src="image/user1.png"/>Profile Image</a></li>
										<li><a href="edit_register3.php"><img src="image/aboutme4.png"/>About You</a></li>
										<li><a href="edit_register4.php"><img src="image/card1.png"/>Credit Card</a></li>
									</ul>
								
							</li>

						</ul>
					</div>
					
				<?php
					}	
				?>
				
							
				<?php
					if($user_id && $user_type == "admin")
					{
						
				?>
					<div id="sidebar5">
						<ul id="mcd-menu2">
							<li>
								<a href="user_profile.php">
									<img src="image/aboutme2.png"/>
									<strong>About Me</strong>
									<small>your short biography</small>
								</a>
							</li>

							<li>
								<a href=""   class="active">
									<img src="image/edit.png"/>
									<strong>Edit Profile</strong>
									<small>change your information</small>
								</a>
								
									<ul>
										<li><a href="edit_register1.php"><img src="image/aboutme2.png"/>General Information</a></li>
										<li><a href="edit_register2.php"><img src="image/user1.png"/>Profile Image</a></li>
										<li><a href="edit_register3.php"><img src="image/aboutme4.png"/>About You</a></li>
										<li><a href="edit_register4.php"><img src="image/card1.png"/>Credit Card</a></li>
									</ul>
								
							</li>
							
							<li>
								<a href="">
									<img src="image/edit.png"/>
									<strong>Admin Panel</strong>
									<small>oversee user activities</small>
								</a>
								
									<ul>
										<li><a href="allow_arts.php"><img src="image/aboutme2.png"/>Allow Artworks</a></li>
										<li><a href="check_reports.php"><img src="image/user1.png"/>Check Reports</a></li>
										<li><a href="auction_request.php"><img src="image/aboutme4.png"/>Auction Requests</a></li>
										<li><a href="check_users2.php"><img src="image/aboutme4.png"/>User Information</a></li>
										<li><a href="blocked_users.php"><img src="image/aboutme4.png"/>Blocked Users</a></li>
									</ul>
								
							</li>

						</ul>
					</div>
					
				<?php
					}	
				?>
				
	
				
				
				<?php
					if($user_id && $user_type == "collector")
					{
						
				?>
					<div id="sidebar5">
						<ul id="mcd-menu2">
							<li>
								<a href="user_profile.php">
									<img src="image/aboutme2.png"/>
									<strong>About Me</strong>
									<small>your short biography</small>
								</a>
							</li>
							<li>
								<a href="art_gallery2.php">
									<img src="image/art1.png"/>
									<strong>Collected Arts</strong>
									<small>your collections</small>
								</a>
							</li>
							<li>
								<a href=""  class="active">
									<img src="image/edit.png"/>
									<strong>Edit Profile</strong>
									<small>change your information</small>
								</a>
								
									<ul>
										<li><a href="edit_register1.php"><img src="image/aboutme2.png"/>General Information</a></li>
										<li><a href="edit_register2.php"><img src="image/user1.png"/>Profile Image</a></li>
										<li><a href="edit_register3.php"><img src="image/aboutme4.png"/>About You</a></li>
										<li><a href="edit_register4.php"><img src="image/card1.png"/>Credit Card</a></li>
									</ul>
								
							</li>
							<li>
								<a href="art_upload.php">
									<img src="image/upload4.png"/>
									<strong>Upload Arts</strong>
									<small>upload your art collection</small>
								</a>
							</li>
						</ul>
					</div>
					
				<?php
					}	
				?>
				
					
					<div id="profile_edit1">
					
						<div class="account_info">
						<form method="post" action="" name="UpdateAccount1" >
								<label>User Name</label>
								<p><?php echo $UserName; ?></p>
								<input type="button" value="Edit" name="edit1" id="edit_btn" onclick="updateUname()"/>
								<input type="text" name="user_name" maxlength="50"/>
								<input type="submit" value="Done" name="done1" id="done_btn" onclick=" return validate1();" />
								<span id="errUname" class="error4"></span><br/>
								
								<script type='text/javascript'>
										function updateUname(){
											document.UpdateAccount1.user_name.style.visibility = 'visible';
											document.UpdateAccount1.done1.style.visibility = 'visible';
											document.UpdateAccount1.edit1.disabled = true;
											document.UpdateAccount1.edit1.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate1(){
											var err = 0;
											var erruname = document.getElementById("errUname");
											var uname = document.UpdateAccount1.user_name;
											var an = /^[a-zA-Z0-9_]*$/;
											if(uname.value === "")
											{
												erruname.innerHTML = "This field is required";
												err++;
											}
											
											else if(uname.value.length < 8)
											{
												erruname.innerHTML = "Must be 8 characters at least";
												err++;
											}

											else if(!an.test(uname.value))
											{
												erruname.innerHTML = "Invalid User Name. Can only contain values A-Z, a-z, 0-9 and _ ";
												err++;
											}
											
											else
											{
												erruname.innerHTML = " ";
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
							
							
							<form method="post" action="" name="UpdateAccount2" >
							
								<label>Email</label>
								<p><?php echo $Email; ?></p>
								<input type="button" value="Edit" name="edit2" id="edit_btn" onclick="updateEmail()"/>
								<input type="text" name="email" maxlength="50"/>
								<input type="submit" value="Done" name="done2" id="done_btn" onclick=" return validate2();"/>
								<span id="errEmail" class="error4"></span><br/>
								
								<script type='text/javascript'>
										function updateEmail(){
											document.UpdateAccount2.email.style.visibility = 'visible';
											document.UpdateAccount2.done2.style.visibility = 'visible';
											document.UpdateAccount2.edit2.disabled = true;
											document.UpdateAccount2.edit2.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate2(){
											var err = 0;
											var erremail = document.getElementById("errEmail");
											var email = document.UpdateAccount2.email;
											var reg2 = /^[A-Za-z0-9][A-Za-z0-9._%+-]{0,63}@(?:[A-Za-z0-9]{1,10}\.){1,2}[A-Za-z]{2,4}$/;
											
											if(email.value === "")
											{
												erremail.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg2.test(email.value))
											{
												erremail.innerHTML = "Invalid email address. Correct format: abc.def@example.com";
												err++;
											}
											
											else
											{
												erremail.innerHTML = " ";
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
							
							
							<form method="post" action="" name="UpdateAccount3" >
							
								<label>Contact Number</label>
								<p><?php echo $ContactNumber; ?></p>
								<input type="button" value="Edit" name="edit3" id="edit_btn" onclick="updateContact()"/>
								<input type="text" name="contact_number" maxlength="20"/>
								<input type="submit" value="Done" name="done3" id="done_btn" onclick=" return validate3();"/>
								<span id="errContact" class="error4"></span><br/>
								
								<script type='text/javascript'>
										function updateContact(){
											document.UpdateAccount3.contact_number.style.visibility = 'visible';
											document.UpdateAccount3.done3.style.visibility = 'visible';
											document.UpdateAccount3.edit3.disabled = true;
											document.UpdateAccount3.edit3.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate3(){
											var err = 0;
											var errcontact = document.getElementById("errContact");
											var contact = document.UpdateAccount3.contact_number;
											var reg3 = /^(?:\+?88)?01[15-9]\d{8}$/;
											
											if(contact.value === "")
											{
												errcontact.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg3.test(contact.value))
											{
												errcontact.innerHTML = "Invalid Contact Number. Correct Format: +8801xxxxxxxxx or 01xxxxxxxxx";
												err++;
											}
											
											else
											{
												errcontact.innerHTML = " ";		
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
							
							
							<form method="post" action="" name="UpdateAccount4">
								
								<label>Password</label>
								<p><?php echo $Password; ?></p>
								<input type="button" value="Edit" name="edit4" id="edit_btn" onclick="updatePassword()"/>
								
								<input type="text" name="password" maxlength="50" placeholder="Enter New Password"/>
								<span id="errPassword" class="error4"></span><br/>
								
								<input type="text" name="reenter_password" maxlength="50" placeholder="Re-enter Password" id="repass"/>
								<input type="submit" value="Done" name="done4" id="done_btn" onclick=" return validate4();"/>
								<span id="errRepassword" class="error4"></span><br/>
								
								<script type='text/javascript'>
										function updatePassword(){
											document.UpdateAccount4.password.style.visibility = 'visible';
											document.UpdateAccount4.reenter_password.style.visibility = 'visible';
											document.UpdateAccount4.done4.style.visibility = 'visible';
											document.UpdateAccount4.edit4.disabled = true;
											document.UpdateAccount4.edit4.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate4(){
											var err = 0;
											var errpass = document.getElementById("errPassword");
											var pass = document.UpdateAccount4.password;
											
											if(pass.value === "")
											{
												errpass.innerHTML = "This field is required";
												err++;
											}
											
											else if(pass.value.length < 8)
											{
												errpass.innerHTML = "Password must have at least 8 characters";
												err++;
											}
											
											else if( !/[a-z]/.test(pass.value) || !/[A-Z]/.test(pass.value) || !/[0-9]/.test(pass.value) || !/[!@#$%^&*~_]/.test(pass.value) )
											{
												errpass.innerHTML = "At least 1 uppercase, lowercase, number and special character required";
												err++;
											}
											
											//else if(pass.value === uname.value)
											//{
												//errpass.innerHTML = "Password must be different than User Name";
												//err++;
											//}
											
											else
											{
												errpass.innerHTML = " ";
											}
											
											
											//For Re-enter Password
											
											
											var errRepass = document.getElementById("errRepassword");
											var repass = document.UpdateAccount4.reenter_password;
											
											if(repass.value === "")
											{
												errRepass.innerHTML = "This field is required";
												err++;
											}
											
											else if(repass.value !== pass.value)
											{
												errRepass.innerHTML = "Password didn't match";
												err++;
											}
											
											else
											{
												errRepass.innerHTML = " ";
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
			
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="footer">
			
				<div class="user_guide">
					<div id="guideline">
						<ul>
							<li> Guidelines </li>
							<li><a href="artist_guide.php"> Artist's Guide </a></li>
							<li><a href="collector_guide.php"> Collector's Guide </a></li>
							<li><a href="bidder_guide.php"> Bidder's Guide </a></li>
							<li><a href="member_guide.php"> Member's Guide </a></li>
							<li><a href="faq.php"> FAQ </a></li>
						</ul>
					</div>
					
					<div id="about">
						<ul>
							<li> About </li>
							<li><a href="aim.php"> Aim of Artbound </a></li>
							<li><a href="evolution.php"> Artbound Evolution </a></li>
							<li><a href="contact.php"> Contact Us </a></li>
						</ul>
					</div>	
					
					<div id="terms_conditions">
						<ul>
							<li> Artbound </li>
							<li><a href="terms.php"> Terms of Service </a></li>
							<li><a href="privacy.php"> Privacy Policy </a></li>
							<li><a href="copyright.php"> Copyright Policy </a></li>
						</ul>
					</div>				
				</div>

				<div class="copyright">
					<p>&copy; 2016 Artbound. All rights reserved | Powered by Pritom Chakraborty</p>
				</div>
				
			</div>
			
		</main>
	</body>
</html>