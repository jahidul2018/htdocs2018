	


<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Large View </title>
		<link href="CSS/style.css" rel="stylesheet" type="text/css"/>
		<script type='text/javascript'>
			function validate(){
					var err = 0;
					var errreport = document.getElementById("errReport");
					var report = document.ArtView.report_art;
											
					if(report.value === "")
					{
						errreport.innerHTML = "This field is required";
						err++;
					}
					
					else if(report.value.length > 2000)
					{
						errreport.innerHTML = "Maximum characters length 2000";
						err++;
					}

					else
					{
						errreport.innerHTML = " ";		
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
			
			
			
			
			
			
			
			
			
			<div class="content2">
				<?php if(isset($_GET["ArtID"])){
					$art_id = $_GET["ArtID"];
				}
				
				$query2 = "Select * From Art Where ArtID = '$art_id'" or die("Not Found");
				$result = mysql_query($query2, $connect) or die("Query didn't work");
				$rows=mysql_num_rows($result);
				
				if($rows == 1){
					while($fetch=mysql_fetch_assoc($result)){
						$art_name=$fetch['ArtName'];
						$artist_id=$fetch['UserID'];
						$art_image=$fetch['ArtImage'];
						$art_style=$fetch['Style'];
						$art_subject=$fetch['Subject'];
						$art_medium=$fetch['Medium'];
						$art_story=$fetch['BackgroundStory'];
						$request_num=$fetch['AuctionRequest'];
						$report_num=$fetch['Report'];
						$like_num=$fetch['Likes'];
						
						
					}
				}
				
				
				$query3 = "Select * From Users Where UserID = '$artist_id'" or die("Not Found");
				$result3 = mysql_query($query3, $connect) or die("Query didn't work");
				$rows3 = mysql_num_rows($result3);
				
				if($rows3 == 1){
					while($fetch=mysql_fetch_assoc($result3)){
						$UserName=$fetch['UserName'];
						$first_name=$fetch['FirstName'];
						$last_name=$fetch['LastName'];
						
					}
				}
				
				?>
				
				<div class="better_view">
					<div id="art_view">
						<img src="<?php echo "art/".$art_image;?>" /><br>
						
						<form method="post" name="ArtView">
						
						<?php
						
						$connect=mysql_connect("localhost", "root", "") or die(mysql_error());
						mysql_select_db("Artbound") or die(mysql_error());
						
						$user_name="";
						$user_id="";
						$credit_id="";
						
						
						if(isset($_SESSION['UserName'])){
							$user_name = $_SESSION['UserName'];
							
							
							$connect=mysql_connect("localhost", "root", "") or die(mysql_error());
							mysql_select_db("Artbound") or die(mysql_error());
							$query="SELECT * FROM Users WHERE UserName='$user_name'" or die(mysql_error());
							$result=mysql_query($query, $connect) or die(mysql_error());
							$rows=mysql_num_rows($result);
							$user_image = "";
							
							if($rows>0){
								while($fetch=mysql_fetch_assoc($result)){
									$user_id=$fetch['UserID'];
									$user_type=$fetch['UserType'];
									$activity_clearance=$fetch['ActivityClearance']; 
									
								}
							}
							
							
						}
						
						
							$query="SELECT * FROM credit_card WHERE UserID='$user_id'" or die(mysql_error());
							$result=mysql_query($query, $connect) or die(mysql_error());
							$rows=mysql_num_rows($result);
							
							if($rows>0){
								while($fetch=mysql_fetch_assoc($result)){
									$credit_id=$fetch['CreditID'];
								}
							}
						
						
						?>
						
						<?php
	
							$connect = mysql_connect("localhost", "root", "") or die(mysql_error());
							$query_request_num= "SELECT * FROM auction_request WHERE UserID='$user_id' AND ArtID='$art_id'";
							$result_request_num= mysql_query($query_request_num, $connect) or die("ERROR: 5");
							$rows_request_num= mysql_num_rows($result_request_num);
							
												
						?>
						
						<?php
	
							$connect = mysql_connect("localhost", "root", "") or die(mysql_error());
							$query_like_num= "SELECT * FROM likes WHERE UserID='$user_id' AND ArtID='$art_id'";
							$result_like_num= mysql_query($query_like_num, $connect) or die("ERROR: 5");
							$rows_like_num= mysql_num_rows($result_like_num);
							
												
						?>


						<?php if($user_name!="" && $rows_like_num == 0 && $activity_clearance=="Active"){?>
							<input type="submit" name="like" value="Like" id="like" />
						<?php }?>
						
						<?php if($user_name!="" && $rows_like_num > 0 && $activity_clearance=="Active"){?>
							<input type="submit" name="like" value="Liked" id="like" disabled />
						<?php }?>
						
						<?php if($user_name ==""){?>
							<input style="margin-left:30px;" type="submit" name="background" value="Background Story" onClick="artBackground()" id="story" /><br/>
						<?php }?>
						
						<?php if($user_name!=""){?>
							<input type="submit" name="background" value="Background Story" onClick="artBackground()" id="story" />
						<?php }?>
						
						<?php if($user_name!="" && $activity_clearance=="Active"){?>
							<input type="submit" name="report" value="Report" onClick="reportArt()" id="report" />
						<?php }?>
							
						

						<?php
							if($user_name!="" && $credit_id!="" && $rows_request_num == 0 && $activity_clearance=="Active" && $UserName!=$user_name){
								if($user_type=="artist" || $user_type=="collector" || $user_type == "bidder"){
						?>
							<input type="submit" name="request" value="Request Auction (<?php echo $request_num;?>)" id="request" /><br/>
						<?php
						
							}
							else{
								?>	
							<input type="submit" name="request" value="Request Auction (<?php echo $request_num;?>)" id="request2" disabled /><br/>
								<?php
							}
						}
						
						?>
						
						<?php
							if($user_name!="" && $rows_request_num > 0 && $activity_clearance=="Active"){
						?>
							<input type="submit" name="request" value="Request Sent (<?php echo $request_num;?>)" id="request" disabled /><br/>
						<?php
							}
						
						?>
						
						
						
							<textarea type="text" name="art_story" id="show_story" disabled> <?php echo $art_story?></textarea>
							<textarea type="text" name="report_art" maxlength="2001" id="write_report" placeholder="
							
							
		Place a report here if something is bothering you. If you have any complain about this art or artist then mention it
		     with appropriate evidences/sources. But, if the report turns out to be a mockery or harassment to someone,
													then you will be banned. " ></textarea><br/>
							
							<span id="errReport" class="errorRep"></span><br/>
							<input type="submit" name="send" value="Send" id="send" onClick="return validate();"/>
							
							<script type='text/javascript'>
										function artBackground(){
											document.ArtView.art_story.style.visibility = 'visible';
											document.ArtView.report_art.style.visibility = 'hidden';
											document.ArtView.background.disabled = true;
											document.ArtView.report.disabled = false;
											document.ArtView.background.style.background = '#4DB6AC';
											document.ArtView.report.style.background = '#009688';
											document.ArtView.send.style.visibility = 'hidden';
										}
										
							</script>
							
							<script type='text/javascript'>
										function reportArt(){
											document.ArtView.art_story.style.visibility = 'hidden';
											document.ArtView.report_art.style.visibility = 'visible';
											document.ArtView.background.disabled = false;
											document.ArtView.report.disabled = true;
											document.ArtView.background.style.background = '#009688';
											document.ArtView.report.style.background = '#4DB6AC';
											document.ArtView.send.style.visibility = 'visible';
										}
										
							</script>
							
							
							
							<?php
							if(isset($_POST["send"])){
								$report = $_POST["report_art"];
								$date = date("d/m/Y");
								$time = date("h:i:sa");
								
								$query="INSERT INTO reports(UserID, ArtID, ReportDetail, ReportDate, ReportTime, ReportChecked) VALUES('$user_id', '$art_id', '$report', '$date', '$time', 'No')";
								$result=mysql_query($query, $connect) or die("Error: 1");
								
								if(!$result){
									echo "Report Not Sent:".mysql_error();
								}
								
								else{
									$report_num = $report_num+1;
									$query="UPDATE art SET Report = '$report_num' WHERE ArtID = '$art_id'";
									$result=mysql_query($query,$connect) or die("ERROR: 2");
									
									if(!$result){
										echo "Not Updated:".mysql_error();
									}
									
								}
								
							}
							
							?>
							
							<?php
							if(isset($_POST["request"])){
								$date = date("d/m/Y");
								$time = date("h:i:sa");
								
								$query="INSERT INTO auction_request(UserID, ArtID, RequestDate, RequestTime) VALUES('$user_id', '$art_id', '$date', '$time')";
								$result=mysql_query($query, $connect) or die("Error: 3");
								
								if(!$result){
									echo "Request Not Sent:".mysql_error();
								}
								
								else{
									$request_num = $request_num+1;
									$query="UPDATE art SET AuctionRequest = '$request_num' WHERE ArtID = '$art_id'";
									$result=mysql_query($query,$connect) or die("ERROR: 4");
									
									if(!$result){
										echo "Not Updated:".mysql_error();
									}
											
								}
								
							}
							
							?>
							
							<?php
							if(isset($_POST["like"])){
								$date = date("d/m/Y");
								$time = date("h:i:sa");
								
								$query="INSERT INTO likes(UserID, ArtID, LikeDate, LikeTime) VALUES('$user_id', '$art_id', '$date', '$time')";
								$result=mysql_query($query, $connect) or die("Error: 3");
								
								if(!$result){
									echo "Request Not Sent:".mysql_error();
								}
								
								else{
									$like_num = $like_num+1;
									$query="UPDATE art SET Likes = '$like_num' WHERE ArtID = '$art_id'";
									$result=mysql_query($query,$connect) or die("ERROR: 4");
									
									if(!$result){
										echo "Not Updated:".mysql_error();
									}
									
								}
								
							}
							
							?>
						
						</form>
					</div>
					
					<div id="art_detail">
						<label>Art Name : </label><p><?php echo $art_name;?></p><br>
						<label>Artist Name : </label><p><a href=""><?php echo $first_name." ".$last_name;?></a></p><br>
						<label>Style : </label><p><?php echo $art_style;?></p><br>
						<label>Subject : </label><p><?php echo $art_subject;?></p><br>
						<label>Medium : </label><p><?php echo $art_medium;?></p><br>
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