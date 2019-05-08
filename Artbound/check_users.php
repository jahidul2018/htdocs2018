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


	if(isset($_GET["User"])){
		$userID = $_GET["User"];
	}
	
	$connect=mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("Artbound") or die(mysql_error());
	$query="SELECT * FROM Users WHERE UserID='$userID'" or die(mysql_error());
	$result=mysql_query($query, $connect) or die(mysql_error());
	$rows=mysql_num_rows($result);
	
	if($rows==1){
		while($fetch=mysql_fetch_assoc($result)){
			$firstName=$fetch['FirstName'];
			$lastName=$fetch['LastName'];
			$userName=$fetch['UserName'];
			$userEmail=$fetch['Email'];
			$userType=$fetch['UserType'];
			$birthDay=$fetch['BirthDay'];
			$birthMonth=$fetch['BirthMonth']+1;
			$birthYear=$fetch['BirthYear'];
			$userGender=$fetch['Gender'];
			$userContact=$fetch['ContactNumber'];
			$activityClearance=$fetch['ActivityClearance'];
			$userImage=$fetch['ProfileImage'];
			$aboutUser=$fetch['AboutMe'];
			
		}
	}
		
		$cardType="";
		$query="SELECT * FROM credit_card WHERE UserID='$userID'" or die(mysql_error());
		$result=mysql_query($query, $connect) or die(mysql_error());
		$rowsCard=mysql_num_rows($result);
		
		if($rowsCard==1){
			while($fetch=mysql_fetch_assoc($result)){
				$nationalID=$fetch['NationalID'];
				$nameonCard=$fetch['NameOnCard'];
				$cardType=$fetch['CardType'];
				$cardNumber=$fetch['CardNumber'];
				$expireMonth=$fetch['ExpireMonth'];
				$expireYear=$fetch['ExpireYear'];
				$cvv=$fetch['CVV'];
				$cardEmail=$fetch['Email'];
				$cardFname=$fetch['FirstName'];
				$cardLname=$fetch['LastName'];
				$companyName=$fetch['CompanyName'];
				$cardContact=$fetch['ContactNumber'];
				$addressLine1=$fetch['AddressLine1'];
				$addressLine2=$fetch['AddressLine2'];
				$city=$fetch['City'];
				$zip=$fetch['ZipCode'];
				
			}	
		}
	
		
?>




<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> User Info : <?php echo $userName;?> </title>
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
			
			
			
			
			
			
			
			
			
			<div class="content4">
			
				<?php if($userImage==""){ ?>
				<div id="no_info">
				<p style="font-size:16px;">  No profile picture found </p>
				</div>
				<?php } ?>
			
				<?php if($userImage!=""){ ?>
				<img src="upload/<?php echo $userImage; ?>" />
				<?php
				}
				?>
				
				
				<h3> General Information </h3>
				<div id="g_info">
				<label>Full Name</label> <p> : <?php echo $firstName." ".$lastName; ?></p><br/>
				<label>User Name</label> <p> : <?php echo $userName; ?></p><br/>
				<label>Email</label> <p> : <?php echo $userEmail; ?></p><br/>
				<label>User Type</label> <p> : <?php echo $userType; ?></p><br/>
				<label>Birthday</label> <p> : <?php echo $birthDay."/".$birthMonth."/".$birthYear; ?></p><br/>
				<label>Gender</label> <p> : <?php echo $userGender; ?></p><br/>
				<label>Contact Number</label> <p> : <?php echo $userContact; ?></p><br/>
				<label>Activity Clearance</label> <p> : <?php echo $activityClearance; ?></p><br/>
				</div>
				
				<h3> About User </h3>
				<?php if($aboutUser!=""){ ?>
				<div id="a_info">
				<label>About <?php echo $userName; ?></label><p> : <?php echo $aboutUser; ?></p>
				</div>
				<?php } ?>
				
				<?php if($aboutUser==""){ ?>
				<div id="no_info">
				<label>About <?php echo $userName; ?></label><p> : No information shared </p>
				</div>
				<?php } ?>
				
				
				<h3> Card Information </h3>
				<?php if($cardType=="visa" || $cardType=="american express" || $cardType=="master card" ){ ?>
				<div id="c_info">
					<label>National ID</label><p> : <?php echo $nationalID; ?></p><br/>
					<label>Name on Card</label><p> : <?php echo $nameonCard; ?></p><br/>
					<label>Card Type</label><p> : <?php echo $cardType; ?></p><br/>
					<label>Card Number</label><p> : <?php echo $cardNumber; ?></p><br/>
					<label>Expire Month</label><p> : <?php echo $expireMonth; ?></p><br/>
					<label>Expire Year</label><p> : <?php echo $expireYear; ?></p><br/>
					<label>CVV</label><p> : <?php echo $cvv; ?></p><br/>
					<label>Email</label><p> : <?php echo $cardEmail; ?></p><br/>
					<label>First Name</label><p> : <?php echo $cardFname; ?></p><br/>
					<label>Last Name</label><p> : <?php echo $cardLname; ?></p><br/>
					<label>Company Name</label><p> : <?php echo $companyName; ?></p><br/>
					<label>Contact Number</label><p> : <?php echo $cardContact; ?></p><br/>
					<label>Address Line 1</label><p> : <?php echo $addressLine1; ?></p><br/>
					<label>Address Line 2</label><p> : <?php echo $addressLine2; ?></p><br/>
					<label>City</label><p> : <?php echo $city; ?></p><br/>
					<label>Zip Code</label><p> : <?php echo $zip; ?></p><br/>
				</div>
				<?php } ?>
				
				<?php if($cardType=="paypal" || $cardType=="payoneer" || $cardType=="payza" ){ ?>
				<div id="c_info">
					<label>National ID</label><p> : <?php echo $nationalID; ?></p><br/>
					<label>Card Type</label><p> : <?php echo $cardType; ?></p><br/>
					<label>Email</label><p> : <?php echo $cardEmail; ?></p><br/>
					<label>First Name</label><p> : <?php echo $cardFname; ?></p><br/>
					<label>Last Name</label><p> : <?php echo $cardLname; ?></p><br/>
					
				</div>
				<?php } ?>
				
				<?php if($rowsCard==0){ ?>
				<div id="no_info">
				<label>About Credit Card</label><p> : No information shared </p>
				</div>
				<?php } ?>
				
				
				
				
				
				
				
				
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












