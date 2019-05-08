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
			$user_type=$fetch['UserType'];
		}
	}
	
	if($user_type != "admin"){
		header('location: home.php');
	}

	
 ?>
 
 
 <?php
 
 if(isset($_GET["Art"])){
	 $art_id=$_GET["Art"];
 }
 
 $query="SELECT * FROM Art WHERE ArtID='$art_id'";
 $result=mysql_query($query, $connect);
 $rows=mysql_num_rows($result);
 
 if($rows==1){
	 while($fetch=mysql_fetch_assoc($result)){
		 $user_id=$fetch["UserID"];
		 $art_name=$fetch["ArtName"];
		 $art_image=$fetch["ArtImage"];
		 $total_requests=$fetch["AuctionRequest"];
	 }
 }
 
 
 
 $query="SELECT * FROM Users WHERE UserID='$user_id'";
 $result=mysql_query($query, $connect);
 $rows=mysql_num_rows($result);
 
 if($rows==1){
	 while($fetch=mysql_fetch_assoc($result)){
		 $artist_name=$fetch["UserName"];
		 $first_name=$fetch["FirstName"];
		 $last_name=$fetch["LastName"];
		
	 }
 }
 
 ?>




<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Allow Auction </title>
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
			
			
			
			
			
			
			
			
			
			<div class="allow_auc">
			
				<div class="set_auction2">
				<span>
					<label>Art Name</label><p>: <?php echo $art_name;?></p>
					<label>Artist User Name</label><p>: <?php echo $artist_name;?></p>
					<label>Artist Full Name</label><p>: <?php echo $first_name." ".$last_name;?></p>
					<label>Total Requests</label><p>: <?php echo $total_requests;?></p>
				</span>
				
					<img src="art/<?php echo $art_image;?>" />
				</div>
			
			
			
				<div class="set_auction">
					
					<?php
					$year=date("Y");
					
					$start_date="";
					$start_time="";
					$closing_date="";
					$closing_time="";
					?>
				
					<h2> Setting Auction</h2>
					
					<form method="post" name="allow_auc">
					
					<label>Starting Date</label>
					
							<select id="auc_time" name="start_day" required >
												
												<option selected="selected" value="">Day</option><option value="01">1</option>
												<option value="02">2</option><option value="03">3</option>
												<option value="04">4</option><option value="05">5</option>
												<option value="06">6</option><option value="07">7</option>
												<option value="08">8</option><option value="09">9</option>
												<option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option>
												<option value="14">14</option><option value="15">15</option>
												<option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option>
												<option value="20">20</option><option value="21">21</option>
												<option value="22">22</option><option value="23">23</option>
												<option value="24">24</option><option value="25">25</option>
												<option value="26">26</option><option value="27">27</option>
												<option value="28">28</option><option value="29">29</option>
												<option value="30">30</option><option value="31">31</option>
											
							</select>
											
							<select name="start_month" required >
											
												<option selected="selected" value="">Month</option>
												<option value="01">January</option><option value="02">February</option>
												<option value="03">March</option><option value="04">April</option>
												<option value="05">May</option><option value="06">June</option>
												<option value="07">July</option><option value="08">August</option>
												<option value="09">September</option><option value="10">October</option>
												<option value="11">November</option><option value="12">December</option>
											
							</select>
					
							<select name="start_year" required >
											
												<option selected="selected" value="">Year</option>
												<option value="<?php echo $year;?>"> <?php echo $year;?> </option>
												<option value="<?php echo $year+1;?>"> <?php echo $year+1;?> </option>
							</select>
													
					
					<label>Closing Date</label>
					
							<select id="auc_time" name="end_day" required >
												
												<option selected="selected" value="">Day</option><option value="01">1</option>
												<option value="02">2</option><option value="03">3</option>
												<option value="04">4</option><option value="05">5</option>
												<option value="06">6</option><option value="07">7</option>
												<option value="08">8</option><option value="09">9</option>
												<option value="10">10</option><option value="11">11</option>
												<option value="12">12</option><option value="13">13</option>
												<option value="14">14</option><option value="15">15</option>
												<option value="16">16</option><option value="17">17</option>
												<option value="18">18</option><option value="19">19</option>
												<option value="20">20</option><option value="21">21</option>
												<option value="22">22</option><option value="23">23</option>
												<option value="24">24</option><option value="25">25</option>
												<option value="26">26</option><option value="27">27</option>
												<option value="28">28</option><option value="29">29</option>
												<option value="30">30</option><option value="31">31</option>
											
							</select>
											
							<select name="end_month" required >
											
												<option selected="selected" value="">Month</option>
												<option value="01">January</option><option value="02">February</option>
												<option value="03">March</option><option value="04">April</option>
												<option value="05">May</option><option value="06">June</option>
												<option value="07">July</option><option value="08">August</option>
												<option value="09">September</option><option value="10">October</option>
												<option value="11">November</option><option value="12">December</option>
											
							</select>
					
							<select name="end_year" required >
											
												<option selected="selected" value="">Year</option>
												<option value="<?php echo $year;?>"> <?php echo $year;?> </option>
												<option value="<?php echo $year+1;?>"> <?php echo $year+1;?> </option>
							</select>
					
					
					<label>Initial Price</label>
					<input type="number" name="initial_price" maxlength="7" required />
					<label>Increment Per Bid</label>
					<input type="number" name="increment" maxlength="4" required/>
					
					
					<input type="submit" name="submit" id="confirm" />
					
					</form>
					
					<?php 
						if(isset($_POST['submit'])){
							$start_day = $_POST['start_day'];
							$start_month = $_POST['start_month'];
							$start_year = $_POST['start_year'];
							
							$end_day = $_POST['end_day'];
							$end_month = $_POST['end_month'];
							$end_year = $_POST['end_year'];
							
							$start_date = $start_year."-".$start_month."-".$start_day;
							$closing_date = $end_year."-".$end_month."-".$end_day;
							
							$initial_price = $_POST['initial_price'];
							$increment = $_POST['increment'];
							
							$query="INSERT INTO Auction(ArtID, UserID, StartDate, ClosingDate, InitialPrice, IncrementPerBid) VALUES('$art_id', '$user_id', '$start_date', '$closing_date', '$initial_price', '$increment')";
							$result = mysql_query($query, $connect);
							
							if(!$result){
								echo "ERROR:".mysql_error();
							}
							
							else{
								$query = "UPDATE art SET AuctionRequest = 0 WHERE ArtID = '$art_id' ";
								
								$result = mysql_query($query, $connect) or die(mysql_error());
		
								if($result){
									?>
									<script>
										window.location = 'ongoing_auction.php';
									</script>
									
									<?php
								}
								
							}
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
	</body>
</html>