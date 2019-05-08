



<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Home </title>
		
		<link href="css/bar/bar.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/dark/dark.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/default/default.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/light/light.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
		
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
					session_start();
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
			
			<div class="slider">
				
				<div class="slider-wrapper theme-bar">
					<div class="nivoSlider" id="slider">
						<img src="img/img1.jpg" alt=""/>
						<img src="img/img2.jpg" alt=""/>
						<img src="img/img3.jpg" alt=""/>
						<img src="img/img4.jpg" alt=""/>
						<img src="img/img5.jpg" alt=""/>
						<img src="img/img6.jpg" alt=""/>
						<img src="img/img7.jpg" alt=""/>
					</div>
				</div>
				
			</div>
			
			<div class="content">
				<div class="recent">
				
					<h4>Recently Uploaded</h4>
						
				
							<?php
								
								$conn=mysql_connect("localhost", "root", "") or die(mysql_error());
								mysql_select_db("Artbound") or die(mysql_error());
								
								$week_ago = date("d") - 7;
								$today = date("d");
								$upload_month = date("m");
								$upload_year = date("Y");
								
								
								$res=mysql_query("SELECT * FROM Art WHERE UploadDay BETWEEN $week_ago AND $today AND UploadMonth=$upload_month AND UploadYear=$upload_year AND AdminClearance='Allowed' order by rand() limit 3") or die(mysql_error());
								while($row=mysql_fetch_array($res))
								{
									$user_id=$row["UserID"];
									
									$query="SELECT * FROM Users WHERE UserID='$user_id'" or die(mysql_error());
									$result=mysql_query($query, $conn) or die(mysql_error());
									$rows=mysql_num_rows($result);
									
									if($rows==1){
										while($fetch=mysql_fetch_assoc($result)){
												$first_name=$fetch['FirstName'];
												$last_name=$fetch['LastName'];
										}
									}
									?>
									<div class="img_detail_home">
										<div id="img">
											<center><img src="<?php echo "art/".$row["ArtImage"];?>"/></center>
										</div>
										<div id="img_desc">
											<p><a href="better_view.php?ArtID=<?php echo $row["ArtID"];?>"><?php echo $row["ArtName"];?></a> by <a href="art_owner.php?UserID=<?php echo $user_id;?>"><?php echo $first_name." ".$last_name;?></a></p>
										</div>
									</div>
									<?php	
								}
								
							?>
							
						
				
				</div>
				
				
				
				<div class="artist">
				
					<h4>Artist Works</h4>
						
				
							<?php
								
								$conn=mysql_connect("localhost", "root", "") or die(mysql_error());
								mysql_select_db("Artbound") or die(mysql_error());
								
								
								$res=mysql_query("SELECT * FROM users, art WHERE art.UserID=users.UserID AND users.UserType='artist' AND AdminClearance='Allowed' order by rand() limit 3") or die(mysql_error());
								while($row=mysql_fetch_array($res))
								{
									$user_id=$row["UserID"];
									
									$query="SELECT * FROM Users WHERE UserID='$user_id'" or die(mysql_error());
									$result=mysql_query($query, $conn) or die(mysql_error());
									$rows=mysql_num_rows($result);
									
									if($rows==1){
										while($fetch=mysql_fetch_assoc($result)){
												$first_name=$fetch['FirstName'];
												$last_name=$fetch['LastName'];
										}
									}
									?>
									<div class="img_detail_home">
										<div id="img">
											<center><img src="<?php echo "art/".$row["ArtImage"];?>"/></center>
										</div>
										<div id="img_desc">
											<p><a href="better_view.php?ArtID=<?php echo $row["ArtID"];?>"><?php echo $row["ArtName"];?></a> by <a href="art_owner.php?UserID=<?php echo $user_id;?>"><?php echo $first_name." ".$last_name;?></a></p>
										</div>
									</div>
									<?php	
								}
											
							?>
							
				
				</div>
				
				
				
				<div class="collector">
				
				
					<h4>Collected Artworks</h4>
						
				
							<?php
								
								$conn=mysql_connect("localhost", "root", "") or die(mysql_error());
								mysql_select_db("Artbound") or die(mysql_error());
								
								
								$res=mysql_query("SELECT * FROM users, art WHERE art.UserID=users.UserID AND users.UserType='collector' AND AdminClearance='Allowed' order by rand() limit 3") or die(mysql_error());
								while($row=mysql_fetch_array($res))
								{
									$user_id=$row["UserID"];
									
									$query="SELECT * FROM Users WHERE UserID='$user_id'" or die(mysql_error());
									$result=mysql_query($query, $conn) or die(mysql_error());
									$rows=mysql_num_rows($result);
									
									if($rows==1){
										while($fetch=mysql_fetch_assoc($result)){
												$first_name=$fetch['FirstName'];
												$last_name=$fetch['LastName'];
										}
									}
									?>
									<div class="img_detail_home">
										<div id="img">
											<center><img src="<?php echo "art/".$row["ArtImage"];?>"/></center>
										</div>
										<div id="img_desc">
											<p><a href="better_view.php?ArtID=<?php echo $row["ArtID"];?>"><?php echo $row["ArtName"];?></a> by <a href="art_owner.php?UserID=<?php echo $user_id;?>"><?php echo $first_name." ".$last_name;?></a></p>
										</div>
									</div>
									<?php	
								}
											
							?>
				
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
		
		<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
		<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
		<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider();
		});
		</script>
		
	</body>
</html>