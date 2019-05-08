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
	
		}
	}

	
 ?>



<?php

	if(isset($_POST['done'])){
		$about_me = $_POST['about_me'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update users Set AboutMe = '$about_me' Where UserID = '$user_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register3.php");
		}
	}

?>

<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Edit Profile : About Me </title>
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
					
						<div class="aboutme_info">
					
							
							<form method="post" action="" name="UpdateBio">
								
								<label>About Me</label>
								<textarea type="text" id="about_me" name="about_me" maxlength="3010" rows="18" cols="112" disabled><?php echo $about_user; ?></textarea>
								<span id="errAboutMe" class="error5"></span><br/>
								<input type="button" value="Edit" name="edit" id="edit_btn3" onclick="updateBiography()"/>
								
								<input type="submit" value="Done" name="done" id="done_btn3" onclick=" return validate();"/>
								
								
								<script type='text/javascript'>
										function updateBiography(){
											
											document.UpdateBio.about_me.disabled = false;
											document.UpdateBio.done.style.visibility = 'visible';
											document.UpdateBio.edit.disabled = true;
											document.UpdateBio.edit.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate(){
											var err = 0;
											var erraboutme = document.getElementById("errAboutMe");
											var aboutme = document.UpdateBio.about_me;
											
											if(aboutme.value === "")
											{
												erraboutme.innerHTML="Empty field! Please, write something about yourself.";
												err++;
											}
											
											else if(aboutme.value.length > 3000)
											{
												erraboutme.innerHTML="Too Long! Keep it less than 3000 characters.";
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