<?php

session_start();
	
	if(isset($_SESSION['UserName'])!=true){
		$UserID="";
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
			$UserID=$fetch['UserID'];
			$user_type=$fetch['UserType'];
			$user_image=$fetch['ProfileImage'];
			$about_user=$fetch['AboutMe'];
	
		}
	}

 ?>
 
 
<?php

	if(isset($_GET["Auction"])){
		 $auction_id=$_GET["Auction"];
	 }
	 
	 $query="SELECT * FROM Auction WHERE AuctionID='$auction_id'";
	 $result=mysql_query($query, $connect);
	 $rows=mysql_num_rows($result);
	 
	 if($rows==1){
		 while($fetch=mysql_fetch_assoc($result)){
			 $user_id=$fetch["UserID"];
			 $art_id=$fetch["ArtID"];
			 $start_date=$fetch["StartDate"];
			 $closing_date=$fetch["ClosingDate"];
			 $initial_bid=$fetch["InitialPrice"];
			 $increment=$fetch["IncrementPerBid"];
		 }
	 }

	 $query="SELECT * FROM Art WHERE ArtID='$art_id'";
	 $result=mysql_query($query, $connect);
	 $rows=mysql_num_rows($result);
	 
	 if($rows==1){
		 while($fetch=mysql_fetch_assoc($result)){
			 $artist_id=$fetch["UserID"];
			 $art_name=$fetch["ArtName"];
			 $art_image=$fetch["ArtImage"];
			 
		 }
	 }
	 
	 $query="SELECT * FROM Users WHERE UserID='$artist_id'";
	 $result=mysql_query($query, $connect);
	 $rows=mysql_num_rows($result);
	 
	 if($rows==1){
		 while($fetch=mysql_fetch_assoc($result)){
			 $first_name=$fetch["FirstName"];
			 $last_name=$fetch["LastName"];
		 }
	 }
?>




<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Bid for Art </title>
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
			
				<?php 
				
					$current_date = date("Y-m-d");
					$current_time = date("H:ia");
					
					
					$query=mysql_query("SELECT MAX(BidAmount) AS max FROM bid WHERE ArtID='$art_id'");
					$row=mysql_fetch_array($query);
					$max=$row['max'];
					
					if(!$max){
						$max=$initial_bid+$increment;
					
					}
					else{
						$max=$max+$increment;
						
					}
				?>
			
				<div class="set_auction2">
				<span>
					<label>Art Name</label><p>: <?php echo $art_name;?></p>
					<label>Artist Full Name</label><p>: <?php echo $first_name." ".$last_name;?></p>
					<label>Start Time</label><p>: <?php echo date("d-m-Y", strtotime($start_date));?></p>
					<label>Closing Time</label><p>: <?php echo date("d-m-Y", strtotime($closing_date));?></p>
				</span>
				
					<img src="art/<?php echo $art_image;?>" />
					
					
					<form method="post" name="bid">
					
					<?php

						$query="SELECT * FROM auction_request WHERE ArtID='$art_id' AND UserID='$UserID'";
						$result=mysql_query($query, $connect);
						$rows=mysql_num_rows($result);
						
						if($rows==1){
							if($current_date >= $start_date && $current_date <= $closing_date){
								
								 ?>
								 
								 <input id="bid" type="submit" name="bid" value="Bid"/>
								 
								 <?php
								
							}
						 }
						 
						 ?>
						 
						 <?php
							
							if(isset($_POST["bid"])){
								$bid_date = date("Y-m-d");
								$bid_time = date("h:ia");
								
								$query = "INSERT INTO bid(ArtID, UserID, UserName, BidDate, BidTime, BidAmount) VALUES('$art_id', '$UserID', '$UserName', '$bid_date', '$bid_time', '$max')";
								$result = mysql_query($query, $connect);
								
								if(!$result){
									echo "ERROR:".mysql_error();
								}
							}
							
						 ?>
					
						 
					
					</form>
					
					
					<form method="post" name="JumpBid">
					
					<?php

						$query="SELECT * FROM auction_request WHERE ArtID='$art_id' AND UserID='$UserID'";
						$result=mysql_query($query, $connect);
						$rows=mysql_num_rows($result);
						
						if($rows==1){
							if($current_date >= $start_date && $current_date <= $closing_date){
							?>
							 <h3> or </h3>
							 <label>Jump Bid</label>
							 <input type="number" name="jump_bid" placeholder="Enter your amount" min="<?php echo $max+500;?>" required /> <p id="note1">Should be more than the expected next bid</p>
							 <span id="errBid" class="error_jump"></span>
							 <input id="jump_bid" type="submit" name="jump" value="Bid" onclick="return validate();"/> 
							<?php
							
							}
						}
							if(isset($_POST["jump"])){
								$jump_bid = $_POST["jump_bid"];
								$bid_date = date("Y-m-d");
								$bid_time = date("h:ia");
								
								$query = "INSERT INTO bid(ArtID, UserID, UserName, BidDate, BidTime, BidAmount) VALUES('$art_id', '$UserID', '$UserName', '$bid_date', '$bid_time', '$jump_bid')";
								$result = mysql_query($query, $connect);
								
								if(!$result){
									echo "ERROR:".mysql_error();
								}
								
							}
						 
						 ?>
						 
					
					</form>
					
					
					<?php
					
						$querynext=mysql_query("SELECT MAX(BidAmount) AS maxnext FROM bid WHERE ArtID='$art_id'");
						$rownext=mysql_fetch_array($querynext);
						$maxnext=$rownext['maxnext'];
						
						if(!$maxnext){
							$maxnext=$initial_bid+$increment;
						}
						else{
							$maxnext=$maxnext+$increment;
						}
					

						$query="SELECT * FROM auction_request WHERE ArtID='$art_id' AND UserID='$UserID'";
						$result=mysql_query($query, $connect);
						$rows=mysql_num_rows($result);
						
						if($rows==1){
							if($current_date >= $start_date && $current_date <= $closing_date){
							 ?>
							 
							<p id="next_bid">Next bid will be <?php echo $maxnext." BDT";?></p>
							 
							 <?php
							}
						 }
						 
					?>
					
					
				</div>
			
			
			
				<div class="set_auction">
				
					<h2 id="h_bid">Highest Bid</h2>
					
					<?php
					
						$query=mysql_query("SELECT MAX(BidAmount) AS highest_bid FROM bid WHERE ArtID='$art_id'");
						$row=mysql_fetch_array($query);
						$h_bid=$row['highest_bid'];
						
						$query = mysql_query("SELECT UserName as highest_bidder FROM bid WHERE ArtID='$art_id' AND BidAmount='$h_bid'");
						$row = mysql_fetch_array($query);
						$highest_bidder = $row['highest_bidder'];
					?>
					<span id="h_bidder">
					<?php if(!$h_bid){
						?>
							<strong style="font-size:17px; color:#BF360C;">No bid yet</strong>
						<?php
					}
					else{
					?>
						<strong><?php echo $highest_bidder;?></strong><p> : <?php echo $h_bid; ?></p>
					<?php
					}
					?>
					</span>
				
					<h2 id="c_bid">Current Bids</h2>
					
					<span id="c_bidder">
					<?php
					
					$res=mysql_query("SELECT UserName AS bidder_name, UserID AS bidder_id FROM bid WHERE ArtID='$art_id' GROUP BY UserName") or die(mysql_error());
					while($row=mysql_fetch_array($res))
					{
						$bidder_id = $row["bidder_id"];
						$bidder_name = $row["bidder_name"];
						
						
						
						$query2 = mysql_query("SELECT MAX(BidAmount) AS user_max FROM bid WHERE UserID='$bidder_id' AND ArtID='$art_id'");
						$row2 = mysql_fetch_array($query2);
						$user_max = $row2['user_max'];
						
						
						?>
						
								<strong><?php echo $bidder_name?> </strong><p> : <?php echo $user_max;?></p><br/>
						
						<?php	
					}
					
					?>
					</span>
					
				</div>
			</div>
			
			<?php
			
				if($current_date > $closing_date){
					
					$q="SELECT * FROM Users WHERE UserName='$highest_bidder'" or die(mysql_error());
					$r=mysql_query($q, $connect) or die(mysql_error());
					$ro=mysql_num_rows($r);
						
					if($ro>0){
						while($fetch=mysql_fetch_assoc($r)){
							$u_mail=$fetch['Email'];
						}
					}
					
					
					
					require_once "PHPMailer-master/PHPMailerAutoload.php";
						
					$mail = new PHPMailer;

					$mail->isSMTP();                               
					$mail->Host = 'smtp.gmail.com'; 
					$mail->SMTPAuth = true;                            
					$mail->Username = 'pc0015@diit.info'; 
					$mail->Password = 'diit123456';           
					$mail->SMTPSecure = 'tls';                           
					$mail->Port = 587;                             
							//$mail->SMTPDebug = 2;                             
												

							//$mail->addAddress('srabon.bilash@outlook.com', 'Srabon Chowdhury'); 
					$mail->addAddress($u_mail, $highest_bidder); 
					$mail->isHTML(true);              

					$mail->Subject = 'Order report';
					$mail->Body    = '<h4>Hello '.$highest_bidder.'...</h4><br/><br/> Congratulations!!! You have won the auction for artwork <em>'.$art_name.'</em>.<br/><br/>You have outbid everyone by bidding '.$h_bid.' BDT.<br/><br/>Please, click the link below to confirm art delivery.<br/><br/>Link : <a href="http://localhost/artbound/confirm_delivery.php?auction_id=' . $auction_id . '">Confirm Delivery</a>';
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					if(!$mail->send()) {
													
							echo 'Message could not be sent. <br/>';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
					}
					
				}
			
			?>
			
			
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
							<li><a href="about.php"> Aim of Artbound </a></li>
							<li><a href="about.php"> Artbound Evolution </a></li>
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