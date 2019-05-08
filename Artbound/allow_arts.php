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
	
	if($user_type != "admin"){
		header('location: home.php');
	}

	
 ?>




<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Allow Arts </title>
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
			
			
			
			
			
			
			
			
			
			<div class="content2">
			
				<div class="gallery">
				
				<?php
					
					$conn=mysql_connect("localhost", "root", "") or die(mysql_error());
					mysql_select_db("Artbound") or die(mysql_error());
					
					$page=1;
					$per_page=0;
					if(isset($_POST["page"]))
					{
						$page=$_POST["page"];
						$prev=$page-1;
						$per_page=($page*12)-12;
					}
					
					if(isset($_POST["prev"]))
					{
						$prev=$_POST["previous"];
						$page = $prev;
						$per_page=($prev*12)-12;
					}
					
					if(isset($_POST["next"]))
					{
						$next=$_POST["nex"];
						$page = $next;
						$per_page=($next*12)-12;
					}
					
					$res=mysql_query("SELECT * FROM Art WHERE AdminClearance='Not Allowed' limit $per_page, 12") or die(mysql_error());
					while($row=mysql_fetch_array($res))
					{
						$user_id=$row["UserID"];
						$art_id=$row["ArtID"];
						
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
						<div class="img_detail">
							<div id="img">
								<center><img src="<?php echo "art/".$row["ArtImage"];?>"/></center>
							</div>
							<div id="img_desc3">
								<p><a href="better_view.php?ArtID=<?php echo $art_id;?>"><?php echo $row["ArtName"];?></a> by <a href="art_owner.php?UserID=<?php echo $user_id;?>"><?php echo $first_name." ".$last_name;?></a></p><br/>
								<p><strong>Created At :</strong> <?php echo $row["CreateYear"];?></p><br/>
								<p><strong>Style :</strong> <?php echo $row["Style"];?></p><br/>
								<p><strong>Subject :</strong> <?php echo $row["Subject"];?></p><br/>
								<p><strong>Medium :</strong> <?php echo $row["Medium"];?></p><br/>
									
								<a style="text-decoration:none;" href="allow_arts2.php?Art=<?php echo $art_id; ?>"><input type="submit" name="approve" value="Allow"/></a>
								
							</div>
						</div>
						<?php	
					}
					
					$res1=mysql_query("SELECT * FROM Art WHERE AdminClearance='Not Allowed'");
					$count=mysql_num_rows($res1);
					$a=$count/12;
					$a=ceil($a);
					
					echo "<br/><br/>"
								
				?>
				
				</div>
				
				<div class="page_numb">
					<form method="post">
					
					<?php if($page > 1){ $prev=$page-1;?>
							<input type="hidden" value="<?php echo $prev;?>" name="previous"/>
							<input type="submit" value="Prev" name="prev"/>
					<?php } ?>
					
					<?php
						for($b=1; $b<=$a; $b++)
						{
					?>
							
							<input type="submit" value="<?php echo $b;?>"<?php if($page==$b){echo 'id="marked"';}?> name="page"/>
							
					<?php
						}
					
					?>
					
					<?php if($page < $a){ $next=$page+1;?>
							<input type="hidden" value="<?php echo $next;?>" name="nex"/>
							<input type="submit" value="Next" name="next"/>
					<?php } ?>
					
					</form>
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