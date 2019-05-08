<?php

session_start();
	
	if(isset($_SESSION['UserName'])!=true){
		//header('location: sign_in.php');
		$user_id="";
		$user_type="";
		$UserName="";
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

	$connect=mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("Artbound") or die(mysql_error());
	$query="SELECT * FROM User_Guide WHERE ID='admin'" or die(mysql_error());
	$result=mysql_query($query, $connect) or die(mysql_error());
	$rows=mysql_num_rows($result);
	
	if($rows==1){
		while($fetch=mysql_fetch_assoc($result)){
			$copyright=$fetch['CopyrightPolicy'];
	
		}
	}


 ?>



<?php

	if(isset($_POST['done'])){
		$copyright2 = $_POST['copyright'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update User_Guide Set CopyrightPolicy = '$copyright2' Where ID = 'admin'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: copyright.php");
		}
	}

	
	
?>

<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Copyright </title>
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
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="UsersGuide">
					
						
					
							
							<form method="post" action="" name="UserGuide">
								
								<label>Copyright Policy</label><br>
								<textarea type="text" id="copyright" name="copyright" maxlength="30000" disabled><?php echo $copyright; ?></textarea>
								<span id="errAguide" class="error7"></span><br/>
								
								<?php if($user_id && $user_type=="admin"){
								?>
								<input style="visibility:visible;" type="button" value="Edit" name="edit" id="edit_btn5" onclick="updateUguide()"/>
								<?php
								}
								?>
								
								<?php if($user_id && $user_type!="admin"){
								?>
								<input style="visibility:hidden;" type="button" value="Edit" name="edit" id="edit_btn5"/>
								<?php
								}
								?>
								
								<?php if(!$user_id){
								?>
								<input style="visibility:hidden;" type="button" value="Edit" name="edit" id="edit_btn5"/>
								<?php
								}
								?>
								
								
								<input type="submit" value="Done" name="done" id="done_btn5" onclick=" return validate();"/>
								
								
								<script type='text/javascript'>
										function updateUguide(){
											
											document.UserGuide.copyright.disabled = false;
											document.UserGuide.done.style.visibility = 'visible';
											document.UserGuide.edit.disabled = true;
											document.UserGuide.edit.style.background = '#4DB6AC';
											document.UserGuide.copyright.style.border = "2px solid #9E9E9E";
											document.UserGuide.copyright.style.background = "#FFFFFF";
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate(){
											var err = 0;
											var erraguide = document.getElementById("errAguide");
											var aguide = document.UserGuide.copyright;
											
											if(aguide.value === "")
											{
												erraguide.innerHTML="Empty field! Please, write something.";
												err++;
											}
											
											else if(aguide.value.length > 25000)
											{
												erraguide.innerHTML="Too Long! Keep it less than 25000 characters.";
												err++;
											}
											
											else
											{
												erraguide.innerHTML = " ";
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