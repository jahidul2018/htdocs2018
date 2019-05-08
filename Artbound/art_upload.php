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
	
	if($user_type== "member" || $user_type== "bidder")
	{
		header('location: home.php');
	}

	
 ?>
 
 
 <?php
		
							if(isset($_POST['submit'])){
																
								$imageName=$_FILES['file']['name'];
								$imageSize=$_FILES['file']['size'];
								$imageTemp=$_FILES['file']['tmp_name'];
								$ext = pathinfo($imageName, PATHINFO_EXTENSION);
								
								
								$art_name = $_POST['art_name'];
								$style = $_POST['art_style'];
								$subject = $_POST['art_subject'];
								$medium = $_POST['art_medium'];
								$create_day = $_POST['create_day'];
								$create_month = $_POST['create_month'];
								$create_year = $_POST['create_year'];
								$art_background = $_POST['art_background'];
								$sale_status = $_POST['sale_status'];
								$purchased_by = $_POST['purchased_by'];
								
								$upload_day = date("d");
								$upload_month = date("m");
								$upload_year = date("Y");
								$upload_time = date("h:i:sa");
								$admin_clearance = "Not Allowed";
								$request = 0;
								$report = 0;
								$likes = 0;
								
																
								if($ext=="jpeg" || $ext=="jpg" || $ext=="png"){
									if($imageSize<=5120000 && $imageSize>=51200){
										move_uploaded_file($_FILES['file']['tmp_name'],"art/$imageName") or die("Product not moved");
																		
										$query = "Insert Into art(UserID, ArtImage, ArtName, Style, Subject, Medium, CreateDay, CreateMonth, CreateYear, BackgroundStory, SaleStatus, PurchasedBy, UploadDay, UploadMonth, UploadYear, UploadTime, AdminClearance, AuctionRequest, Report, Likes) Values('$user_id', '$imageName', '$art_name', '$style', '$subject', '$medium', '$create_day', '$create_month', '$create_year', '$art_background', '$sale_status', '$purchased_by', '$upload_day', '$upload_month', '$upload_year', '$upload_time', '$admin_clearance', '$request', '$report', '$likes')";
										$result = mysql_query($query, $connect);
																		
										if(!$result){
											echo "Error: ".mysql_error();
										}
																		
										echo "<script type='text/javascript'>
												alert('Image Uploaded');
												window.location='art_upload.php';
											</script>";
																									 
									}
																	
									else{
										echo "<script type='text/javascript'>alert('Not Supportable. Try an Image between 500KB and 5MB');</script>";
									}
								}
																
								else{
									echo "<script type='text/javascript'>alert('File Type Did Not Match');</script>";
								}
																
																
							}
															

?>
 



<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Upload Art </title>
		<link href="CSS/style.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript"> 
		
			function preview(event){
				var output= document.getElementById('output');
				output.src = URL.createObjectURL(event.target.files[0])
			}
		
		</script>
		
		<script type="text/javascript"> 
		
			function validate(){
				
				//for Art Image
				var err=0;
				var errimage = document.getElementById("errImage");
				var image = document.subscription.file;
				
				if(image.value === "")
				{
					errimage.innerHTML="This field is required";
					err++;
				}
				
				else
				{
					errimage.innerHTML = " ";
				}
				
				//for Art Name
				
				var erraname = document.getElementById("errAname");
				var aname = document.subscription.art_name;
				var reg1 = /^[a-zA-Z ]*$/;
				
				if(aname.value === "")
				{
					erraname.innerHTML="This field is required";
					err++;
				}
				
				else if(!reg1.test(aname.value))
				{
					erraname.innerHTML = "Invalid Art Name. Only Alphabets and Space are allowed";
					err++;
				}
				
				else if(aname.value.length > 80)
				{
					erraname.innerHTML = "Too long. Keep it less than 80 characters";
					err++;
				}
				
				else
				{
					erraname.innerHTML = " ";
				}
				
				// for Style
				
				var errstyle = document.getElementById("errStyle");
				var style = document.subscription.art_style;
				
				if(style.value === "")
				{
					errstyle.innerHTML = "Please, select a Style";
					err++;
				}
				
				else
				{
					errstyle.innerHTML = " ";				
				}
				
				// for Subject
				
				var errsubject = document.getElementById("errSubject");
				var subject = document.subscription.art_subject;
				
				if(subject.value === "")
				{
					errsubject.innerHTML = "Please, select a Subject";
					err++;
				}
				
				else
				{
					errsubject.innerHTML = " ";				
				}
				
				// for Medium
				
				var errmedium = document.getElementById("errMedium");
				var medium = document.subscription.art_medium;
				
				if(medium.value === "")
				{
					errmedium.innerHTML = "Please, select a Medium";
					err++;
				}
				
				else
				{
					errmedium.innerHTML = " ";				
				}
				
				//for Creation Date
				
				var errdate = document.getElementById("errDate");
				var day = document.subscription.create_day;
				var month = document.subscription.create_month;
				var year = document.subscription.create_year;
				var date = new Date();
				var cyear = date.getFullYear();
				var cmonth = date.getMonth();
				var cdate = date.getDate();
				
				if(day.value === "" || month.value === "" || year.value === "")
				{
					errdate.innerHTML = "These fields are required";
					err++;
				}
				
				else if(year.value > cyear || year.value < 1940)
				{
					errdate.innerHTML = "Invalid Year";
				}
				
				else if(year.value == cyear)
				{
					if(month.value > cmonth)
					{
						errdate.innerHTML = "Invalid Date";
					}
					
					else if(month.value == cmonth)
					{
						if(day.value > cdate){
							errdate.innerHTML = "Invalid Date";
						}
						else{
							errdate.innerHTML = " ";
						}
					}
					
					else
					{
						errdate.innerHTML = " ";
					}
					
					
				}
				
				else
				{
					errdate.innerHTML = " ";				
				}
				
				// for Background Story
				
				var errbackground = document.getElementById("errBackground");
				var background = document.subscription.art_background;
				
				if(background.value === "")
				{
					errbackground.innerHTML = "This field is required";
					err++;
				}
				
				else
				{
					errbackground.innerHTML = " ";				
				}
				
				// for Sale Status
				
				var errsale = document.getElementById("errSale");
				var sale = document.subscription.sale_status;
				
				if(sale.value === "")
				{
					errsale.innerHTML = "Please, select an option";
					err++;
				}
				
				else
				{
					errsale.innerHTML = " ";				
				}
				
				//for Purchased By
				
				var errpurchase = document.getElementById("errPurchase");
				var purchase = document.subscription.purchased_by;
				var reg2 = /^[a-zA-Z ]*$/;
				
				if(!reg2.test(purchase.value))
				{
					errpurchase.innerHTML = "Invalid Name. Only Alphabets and Space are allowed";
					err++;
				}
				
				else if(purchase.value.length > 40)
				{
					errpurchase.innerHTML = "Too long. Keep it less than 40 characters";
					err++;
				}
				
				else
				{
					errpurchase.innerHTML = " ";
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
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="upload_art">
			
				<?php
					if($user_id && $user_type == "artist")
					{
						
				?>
					<div id="sidebar6">
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
								<a href="">
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
								<a href="art_upload.php"  class="active">
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
					if($user_id && $user_type == "collector")
					{
						
				?>
					<div id="sidebar6">
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
								<a href="">
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
								<a href="art_upload.php"  class="active">
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
				
					
					<div id="upload">
					
						<div id="art_preview">
							<img id="output" src="image/art1.png" />
						</div>
						
						<div class="art_info">
							<form method="post" enctype="multipart/form-data" action="" name="subscription" >
									
								<label>Select Your Art</label>
								<input type="file" accept="image/*" onchange="preview(event)" name="file" id="art_img" required /><b>*</b>
								<span id="errImage" class="error3"></span>
								
								<label>Art Name</label>
								<input type="text" id="art_name" name="art_name" maxlength="100" /><b>*</b>
								<span id="errAname" class="error3"></span>
								
								<label>Style</label>
								<select id="art_style" name="art_style">
											<option selected="selected" value="">Style</option>
											<option value="fine art"> Fine Art </option>
											<option value="abstract"> Abstract </option>
											<option value="composite"> Composite </option>
											<option value="modern"> Modern </option>
											<option value="pop art"> Pop Art </option>
								</select><b>*</b>
								<span id="errStyle" class="error3"></span>
								
								<label>Subject</label>
								<select id="art_subject" name="art_subject">
											<option selected="selected" value="">Subject</option>
											<option value="portrait"> Portrait </option>
											<option value="landscape"> Landscape </option>
											<option value="still life"> Still Life </option>
											<option value="nature"> Nature </option>
											<option value="print"> Print </option>
								</select><b>*</b>
								<span id="errSubject" class="error3"></span>
								
								<label>Medium</label>
								<select id="art_medium" name="art_medium">
											<option selected="selected" value="">Medium</option>
											<option value="oil"> Oil </option>
											<option value="watercolour"> Watercolour </option>
											<option value="acrylic"> Acrylic </option>
											<option value="airbrush"> Airbrush </option>
											<option value="digital"> Digital </option>
								</select><b>*</b>
								<span id="errMedium" class="error3"></span>
								
								<label> Creation Date </label>
									
										<select id="c_day" name="create_day" >
											
											<option selected="selected" value="">Day</option><option value="1">1</option>
											<option value="2">2</option><option value="3">3</option>
											<option value="4">4</option><option value="5">5</option>
											<option value="6">6</option><option value="7">7</option>
											<option value="8">8</option><option value="9">9</option>
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
										
										<select id="c_year" name="create_month" >
										
											<option selected="selected" value="">Month</option>
											<option value="0">January</option><option value="1">February</option>
											<option value="2">March</option><option value="3">April</option>
											<option value="4">May</option><option value="5">June</option>
											<option value="6">July</option><option value="7">August</option>
											<option value="8">September</option><option value="9">October</option>
											<option value="10">November</option><option value="11">December</option>
										
										</select>
										
										<input id="c_year" type="number" name="create_year" maxlength="4" placeholder="Year" min="1940" max="<?php $y=date("Y"); echo $y; ?>"><b>*</b>
										<span id="errDate" class="error3"></span>
								
								<label>Background Story</label>
								<textarea type="text" id="art_background" name="art_background" maxlength="3000" rows="12" cols="70"></textarea><b>*</b>
								<span id="errBackground" class="error3"></span>
								
								<label>Sale Status</label>
								<select id="sale_status" name="sale_status">
											<option selected="selected" value="">Sale Status</option>
											<option value="sold"> Sold </option>
											<option value="not sold"> Not Sold </option>
								</select><b>*</b>
								<span id="errSale" class="error3"></span>
								
								<label>Purchased By</label>
								<input type="text" id="purchased_by" name="purchased_by" maxlength="50" />
								<span id="errPurchase" class="error3"></span>		
								
								<input id="upload_btn" type="submit" name="submit" value="Upload" onclick=" return validate();" />
										
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