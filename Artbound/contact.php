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
			$contact_number=$fetch['ContactNumber'];
			$contact_email=$fetch['ContactEmail'];
			$contact_address=$fetch['ContactAddress'];
	
		}
	}


 ?>



<?php

	if(isset($_POST['done_number'])){
		$cnumber = $_POST['contact_number'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update User_Guide Set ContactNumber = '$cnumber' Where ID = 'admin'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: contact.php");
		}
	}

?>

<?php

	if(isset($_POST['done_email'])){
		$cemail = $_POST['contact_email'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update User_Guide Set ContactEmail = '$cemail' Where ID = 'admin'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: contact.php");
		}
	}

?>

<?php

	if(isset($_POST['done_address'])){
		$caddress = $_POST['contact_address'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update User_Guide Set ContactAddress = '$caddress' Where ID = 'admin'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: contact.php");
		}
	}

?>





<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Contact Us </title>
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
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="CompanyContact">
					
						
					<h3>Contact Us</h3>
							
							<form method="post" action="" name="ContactNumber" id="con_number">
								
								<label>Contact Number</label>
								<p> :  <?php echo $contact_number; ?></p>
								
								
								
								<?php if($user_id && $user_type=="admin"){
								?>
								<input style="visibility:visible;" type="button" value="Edit" name="edit_number" id="cn_btn" onclick="updateCnumber()"/>
								<input type="number" id="contact_number" name="contact_number" maxlength="14"/>
								<input type="submit" value="Done" name="done_number" id="dn_btn" onclick=" return validate1();"/>
								<span id="errCnumber" class="error_cn"></span><br/>
								<?php
								}
								?>
								
								
								
								<script type='text/javascript'>
										function updateCnumber(){
											
											document.ContactNumber.contact_number.style.visibility = 'visible';
											document.ContactNumber.done_number.style.visibility = 'visible';
											document.ContactNumber.edit_number.disabled = true;
											document.ContactNumber.edit_number.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate1(){
											var err = 0;
											var errcnumber = document.getElementById("errCnumber");
											var cnumber = document.ContactNumber.contact_number;
											var reg = /^(?:\+?88)?01[15-9]\d{8}$/;
											
											if(cnumber.value === "")
											{
												errcnumber.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg.test(cnumber.value))
											{
												errcnumber.innerHTML = "Invalid Contact Number. Correct Format: +8801xxxxxxxxx or 01xxxxxxxxx";
												err++;
											}
											
											else
											{
												errcnumber.innerHTML = " ";		
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
							
							
							<form method="post" action="" name="ContactEmail" id="con_email">
								
								<label>Email</label>
								<p> :  <?php echo $contact_email; ?></p>
								
								
								
								<?php if($user_id && $user_type=="admin"){
								?>
								<input style="visibility:visible;" type="button" value="Edit" name="edit_email" id="cn_btn" onclick="updateCemail()"/>
								<input type="text" id="contact_email" name="contact_email" maxlength="50"/>
								<input type="submit" value="Done" name="done_email" id="dn_btn" onclick=" return validate2();"/>
								<span id="errCemail" class="error_cn"></span><br/>
								<?php
								}
								?>
								
								
								
								<script type='text/javascript'>
										function updateCemail(){
											
											document.ContactEmail.contact_email.style.visibility = 'visible';
											document.ContactEmail.done_email.style.visibility = 'visible';
											document.ContactEmail.edit_email.disabled = true;
											document.ContactEmail.edit_email.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate2(){
											var err = 0;
											var errcemail = document.getElementById("errCemail");
											var cemail = document.ContactEmail.contact_email;
											var reg2 = /^[A-Za-z0-9][A-Za-z0-9._%+-]{0,63}@(?:[A-Za-z0-9]{1,10}\.){1,2}[A-Za-z]{2,4}$/;
											
											if(cemail.value === "")
											{
												errcemail.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg2.test(cemail.value))
											{
												errcemail.innerHTML = "Invalid email address. Correct format: abc.def@example.com";
												err++;
											}
											
											else
											{
												errcemail.innerHTML = " ";
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
	
							
							<form method="post" action="" name="ContactAddress" id="con_address">
								
								<label>Address</label>
								<p> :  <?php echo $contact_address; ?></p>
								
								
								
								<?php if($user_id && $user_type=="admin"){
								?>
								<input style="visibility:visible;" type="button" value="Edit" name="edit_address" id="cn_btn" onclick="updateCaddress()"/>
								<input type="text" id="contact_address" name="contact_address" />
								<input type="submit" value="Done" name="done_address" id="dn_btn" onclick=" return validate3();"/>
								<span id="errCaddress" class="error_cn"></span><br/>
								<?php
								}
								?>
								
								
								
								<script type='text/javascript'>
										function updateCaddress(){
											
											document.ContactAddress.contact_address.style.visibility = 'visible';
											document.ContactAddress.done_address.style.visibility = 'visible';
											document.ContactAddress.edit_address.disabled = true;
											document.ContactAddress.edit_address.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate3(){
											var err = 0;
											var errcaddress = document.getElementById("errCaddress");
											var caddress = document.ContactAddress.contact_address;
											
											
											if(caddress.value === "")
											{
												errcaddress.innerHTML = "This field is required";
												err++;
											}
											
											else
											{
												errcaddress.innerHTML = " ";
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