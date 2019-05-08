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
	
	
	$connect=mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("Artbound") or die(mysql_error());
	$query="SELECT * FROM credit_card WHERE UserID='$user_id'" or die(mysql_error());
	$result=mysql_query($query, $connect) or die(mysql_error());
	$rows=mysql_num_rows($result);
	
	if($rows==1){
		while($fetch=mysql_fetch_assoc($result)){
			$credit_id = $fetch['CreditID'];
			$national_id = $fetch['NationalID'];
			$nameon_card = $fetch['NameOnCard'];
			$card_type = $fetch['CardType'];
			$card_number = $fetch['CardNumber'];
			$expire_month = $fetch['ExpireMonth']+1;
			$expire_year = $fetch['ExpireYear'];
			$cvv = $fetch['CVV'];
			$email = $fetch['Email'];
			$first_name = $fetch['FirstName'];
			$last_name = $fetch['LastName'];
			$company_name = $fetch['CompanyName'];
			$contact_number = $fetch['ContactNumber'];
			$address_line1 = $fetch['AddressLine1'];
			$address_line2 = $fetch['AddressLine2'];
			$city = $fetch['City'];
			$zip_code = $fetch['ZipCode'];
	
		}
	}
	
	else{
		$card_type = "";
	}

	
 ?>


<?php

	if(isset($_POST['done2'])){
		$NationalID = $_POST['national_id'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set NationalID = '$NationalID' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done1'])){
		$CardType = $_POST['account_type'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set CardType = '$CardType' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done3'])){
		$Email = $_POST['email'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set Email = '$Email' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done4'])){
		$FirstName = $_POST['first_name'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set FirstName = '$FirstName' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done5'])){
		$LastName = $_POST['last_name'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set LastName = '$LastName' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done6'])){
		$NameOnCard = $_POST['user_name'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set NameOnCard = '$NameOnCard' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done7'])){
		$CardNumber = $_POST['card_number'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set CardNumber = '$CardNumber' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done8'])){
		$ExpireMonth = $_POST['month'];
		$ExpireYear = $_POST['year'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set ExpireMonth = '$ExpireMonth', ExpireYear = '$ExpireYear' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done9'])){
		$CVV = $_POST['cvv_code'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set CVV = '$CVV' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done10'])){
		$CompanyName = $_POST['company'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set CompanyName = '$CompanyName' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done11'])){
		$ContactNumber = $_POST['contact_number'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set ContactNumber = '$ContactNumber' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done12'])){
		$AddressLine1 = $_POST['address1'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set AddressLine1 = '$AddressLine1' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done13'])){
		$AddressLine2 = $_POST['address2'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set AddressLine2 = '$AddressLine2' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done14'])){
		$City = $_POST['city'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set City = '$City' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>

<?php

	if(isset($_POST['done15'])){
		$ZipCode = $_POST['zip'];
		
		$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
		mysql_select_db("Artbound") or die ("Couldn't connect to database");
		
		$query = "Update credit_card Set ZipCode = '$ZipCode' Where CreditID = '$credit_id'";
		
		$result = mysql_query($query, $connect) or die(mysql_error());
		
		if(!$result){
			echo "ERROR : ". mysql_error();
		}
		
		else{
			header("location: edit_register4.php");
		}
	}

?>




<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Edit Profile : Credit Card </title>
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
			
			
			
			
			
			
			
			
			
			
			
			
			<div class="your_profile4">
			
				<?php
					if($user_id && $user_type == "artist")
					{
						
				?>
					<div id="sidebar7">
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
					<div id="sidebar7">
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
					<div id="sidebar7">
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
					<div id="sidebar7">
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
				
					
					<div id="profile_edit4">
					
						<div class="card_info">
					
						<?php
						
							if($card_type == "payoneer" || $card_type == "payza" || $card_type == "paypal")
							{
						
						?>		
							<form method="post" action="" name="UpdateNID">
								
								<label>National ID</label>
								<p><?php echo $national_id; ?></p>
								<input type="button" value="Edit" name="edit2" id="edit_btn4" onclick="updateNid()"/>
								<input type="text" id="national_id" name="national_id" maxlength="17" />
								<input type="submit" value="Done" name="done2" id="done_btn4" onclick=" return validate2();" />
								<span id="errNID" class="error6"></span><br/>
								
								
								
								<script type='text/javascript'>
										function updateNid(){
											document.UpdateNID.national_id.style.visibility = 'visible';
											document.UpdateNID.done2.style.visibility = 'visible';
											document.UpdateNID.edit2.disabled = true;
											document.UpdateNID.edit2.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate2(){
											var err = 0;
											var errnid = document.getElementById("errNID");
											var nid = document.UpdateNID.national_id;
											var reg = /^[0-9]{13}$/;
											
											if(nid.value === "")
											{
												errnid.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg.test(nid.value))
											{
												errnid.innerHTML = "Invalid NID Number. Must contain 13 digits.";
												err++;
											}
											
											else
											{
												errnid.innerHTML = " ";		
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
							
							<form method="post" action="" name="UpdateCard1">
								
								<label>Account Type</label>
								<p><?php echo $card_type; ?></p>
								<input type="button" value="Edit" name="edit1" id="edit_btn4" onclick="updateCtype()"/>
								<select id="account_type" name="account_type">
										<option selected="selected" value="">Account Type</option>
										<option value="paypal"> Paypal </option>
										<option value="payoneer"> Payoneer </option>
										<option value="payza"> Payza </option>
								</select>
								<input type="submit" value="Done" name="done1" id="done_btn4" onclick=" return validate1();" />
								<span id="errAtype" class="error6"></span><br/>
								
								
								
								<script type='text/javascript'>
										function updateCtype(){
											document.UpdateCard1.account_type.style.visibility = 'visible';
											document.UpdateCard1.done1.style.visibility = 'visible';
											document.UpdateCard1.edit1.disabled = true;
											document.UpdateCard1.edit1.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate1(){
											var err = 0;
											var erratype = document.getElementById("errAtype");
											var atype = document.UpdateCard1.account_type;
											
											if(atype.value === "")
											{
												erratype.innerHTML = "Please, select your account type";
												err++;
											}
											
											else
											{
												erratype.innerHTML = " ";				
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
							
							<form method="post" action="" name="UpdateEmail" >
								<label>Email</label>
								<p><?php echo $email; ?></p>
								<input type="button" value="Edit" name="edit3" id="edit_btn4" onclick="updateEmail()"/>
								<input type="text" name="email" maxlength="50"/>
								<input type="submit" value="Done" name="done3" id="done_btn4" onclick=" return validate3();"/>
								<span id="errEmail" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateEmail(){
											document.UpdateEmail.email.style.visibility = 'visible';
											document.UpdateEmail.done3.style.visibility = 'visible';
											document.UpdateEmail.edit3.disabled = true;
											document.UpdateEmail.edit3.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate3(){
											var err = 0;
											var erremail = document.getElementById("errEmail");
											var email = document.UpdateEmail.email;
											var reg2 = /^[A-Za-z0-9][A-Za-z0-9._%+-]{0,63}@(?:[A-Za-z0-9]{1,10}\.){1,2}[A-Za-z]{2,4}$/;
											
											if(email.value === "")
											{
												erremail.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg2.test(email.value))
											{
												erremail.innerHTML = "Invalid email address. Correct format: abc.def@example.com";
												err++;
											}
											
											else
											{
												erremail.innerHTML = " ";
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
							
							<form method="post" action="" name="UpdateFname" >
								<label>First Name</label>
								<p><?php echo $first_name; ?></p>
								<input type="button" value="Edit" name="edit4" id="edit_btn4" onclick="updateFname()"/>
								<input type="text" id="first_name" name="first_name" maxlength="50" />
								<input type="submit" value="Done" name="done4" id="done_btn4" onclick=" return validate4();"/>
								<span id="errFname" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateFname(){
											document.UpdateFname.first_name.style.visibility = 'visible';
											document.UpdateFname.done4.style.visibility = 'visible';
											document.UpdateFname.edit4.disabled = true;
											document.UpdateFname.edit4.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate4(){
											var err = 0;
											var errfname = document.getElementById("errFname");
											var fname = document.UpdateFname.first_name;
											var reg = /^[A-Z][a-z]{1,}$/;
											
											if(fname.value === "")
											{
												errfname.innerHTML="This field is required";
												err++;
											}
											
											else if(!reg.test(fname.value))
											{
												errfname.innerHTML = "Invalid First Name. Correct format: Jack";
												err++;
											}
											
											else
											{
												errfname.innerHTML = " ";
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
							
							<form method="post" action="" name="UpdateLname" >
								<label>Last Name</label>
								<p><?php echo $last_name; ?></p>
								<input type="button" value="Edit" name="edit5" id="edit_btn4" onclick="updateLname()"/>
								<input type="text" id="last_name" name="last_name" maxlength="50" />
								<input type="submit" value="Done" name="done5" id="done_btn4" onclick=" return validate5();"/>
								<span id="errLname" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateLname(){
											document.UpdateLname.last_name.style.visibility = 'visible';
											document.UpdateLname.done5.style.visibility = 'visible';
											document.UpdateLname.edit5.disabled = true;
											document.UpdateLname.edit5.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate5(){
											var err = 0;
											var errlname = document.getElementById("errLname");
											var lname = document.UpdateLname.last_name;
											var reg = /^[A-Z][a-z]{1,}$/;
											
											if(lname.value === "")
											{
												errlname.innerHTML="This field is required";
												err++;
											}
											
											else if(!reg.test(lname.value))
											{
												errlname.innerHTML = "Invalid Last Name. Correct format: Jack";
												err++;
											}
											
											else
											{
												errlname.innerHTML = " ";
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
							
						<?php
							}
							
							if($card_type == "visa" || $card_type == "master card" || $card_type == "american express")
							{
						?>
						
						
							<form method="post" action="" name="UpdateNID">
								
								<label>National ID</label>
								<p><?php echo $national_id; ?></p>
								<input type="button" value="Edit" name="edit2" id="edit_btn4" onclick="updateNid()"/>
								<input type="text" id="national_id" name="national_id" maxlength="17" />
								<input type="submit" value="Done" name="done2" id="done_btn4" onclick=" return validate2();" />
								<span id="errNID" class="error6"></span><br/>
								
								
								
								<script type='text/javascript'>
										function updateNid(){
											document.UpdateNID.national_id.style.visibility = 'visible';
											document.UpdateNID.done2.style.visibility = 'visible';
											document.UpdateNID.edit2.disabled = true;
											document.UpdateNID.edit2.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate2(){
											var err = 0;
											var errnid = document.getElementById("errNID");
											var nid = document.UpdateNID.national_id;
											var reg = /^[0-9]{13}$/;
											
											if(nid.value === "")
											{
												errnid.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg.test(nid.value))
											{
												errnid.innerHTML = "Invalid NID Number. Must contain 13 digits.";
												err++;
											}
											
											else
											{
												errnid.innerHTML = " ";		
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
														
							<form method="post" action="" name="UpdateUname" >
								<label>Name on Card</label>
								<p><?php echo $nameon_card; ?></p>
								<input type="button" value="Edit" name="edit6" id="edit_btn4" onclick="updateUname()"/>
								<input type="text" id="user_name" name="user_name" maxlength="50" />
								<input type="submit" value="Done" name="done6" id="done_btn4" onclick=" return validate6();"/>
								<span id="errUsername" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateUname(){
											document.UpdateUname.user_name.style.visibility = 'visible';
											document.UpdateUname.done6.style.visibility = 'visible';
											document.UpdateUname.edit6.disabled = true;
											document.UpdateUname.edit6.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate6(){
											var err = 0;
											var errusername = document.getElementById("errUsername");
											var username = document.UpdateUname.user_name;
											var reg2 = /^[A-Z][a-z]{1,}(?: [A-Z][a-z]*){0,2}$/;
											
											if(username.value === "")
											{
												errusername.innerHTML="This field is required";
												err++;
											}
											
											else if(!reg2.test(username.value))
											{
												errusername.innerHTML = "Invalid Name. Correct format: Jack";
												err++;
											}
											
											else
											{
												errusername.innerHTML = " ";
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
							
							<form method="post" action="" name="UpdateCard1">
								
								<label>Account Type</label>
								<p><?php echo $card_type; ?></p>
								<input type="button" value="Edit" name="edit1" id="edit_btn4" onclick="updateCtype()"/>
								<select id="account_type" name="account_type">
										<option selected="selected" value="">Account Type</option>
										<option value="master card"> Master Card </option>
										<option value="visa"> VISA </option>
										<option value="american express"> American Express </option>
								</select>
								<input type="submit" value="Done" name="done1" id="done_btn4" onclick=" return validate1();" />
								<span id="errAtype" class="error6"></span><br/>
								
								
								
								<script type='text/javascript'>
										function updateCtype(){
											document.UpdateCard1.account_type.style.visibility = 'visible';
											document.UpdateCard1.done1.style.visibility = 'visible';
											document.UpdateCard1.edit1.disabled = true;
											document.UpdateCard1.edit1.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate1(){
											var err = 0;
											var erratype = document.getElementById("errAtype");
											var atype = document.UpdateCard1.account_type;
											
											if(atype.value === "")
											{
												erratype.innerHTML = "Please, select your account type";
												err++;
											}
											
											else
											{
												erratype.innerHTML = " ";				
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
						
							<form method="post" action="" name="UpdateCnumber">
								
								<label>Card Number</label>
								<p><?php echo $card_number; ?></p>
								<input type="button" value="Edit" name="edit7" id="edit_btn4" onclick="updateCnumber()"/>
								<input type="text" id="card_number" name="card_number" maxlength="17" />
								<input type="hidden" id="account_type" name="account_type" value="<?php echo $card_type; ?>" />
								<input type="submit" value="Done" name="done7" id="done_btn4" onclick=" return validate7();" />
								<span id="errCnumber" class="error6"></span><br/>
								
								
								
								<script type='text/javascript'>
										function updateCnumber(){
											document.UpdateCnumber.card_number.style.visibility = 'visible';
											document.UpdateCnumber.done7.style.visibility = 'visible';
											document.UpdateCnumber.edit7.disabled = true;
											document.UpdateCnumber.edit7.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate7(){
											var err = 0;
											var errcnumber = document.getElementById("errCnumber");
											var cnumber = document.UpdateCnumber.card_number;
											var ctype = document.UpdateCnumber.account_type;
											var mcreg = /^(?:5[1-5][0-9]{14})$/;
											var vreg = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
											var aereg = /^(?:3[47][0-9]{13})$/;
											//var ctype = " <?php echo $card_type ?> ";
											
											
											//document.write(ctype);
											
											
											if(cnumber.value === "")
											{
												errcnumber.innerHTML = "This field is required";
												err++;
											}
											
											
												//for Master Card   ::: ::: :::
											
											else if(ctype.value === "master card")
											{
												if(!mcreg.test(cnumber.value))
												{
													errcnumber.innerHTML = "Invalid Master Card format";
													err++;
												}
												
												else
												{
													errcnumber.innerHTML = " ";
												}
											}
											
												//for VISA Card   ::: ::: :::
											
											else if(ctype.value === "visa")
											{
												if(!vreg.test(cnumber.value))
												{
													errcnumber.innerHTML = "Invalid VISA Card format";
													err++;
												}
												
												else
												{
													errcnumber.innerHTML = " ";
												}
											}
											
												//for American Express	::: ::: :::
											
											else if(ctype.value === "american express")
											{
												if(!aereg.test(cnumber.value))
												{
													errcnumber.innerHTML = "Invalid American Express Card format";
													err++;
												}
												
												else
												{
													errcnumber.innerHTML = " ";
												}
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
							
							<form method="post" action="" name="UpdateEdate">
								
								<label>Expire Date</label>
								<p><?php echo $expire_month." ".$expire_year; ?></p>
								<input type="button" value="Edit" name="edit8" id="edit_btn4" onclick="updateEdate()"/>
								<select id="month" name="month" >
											
											<option selected="selected" value="">Month</option>
											<option value="0">January</option><option value="1">February</option>
											<option value="2">March</option><option value="3">April</option>
											<option value="4">May</option><option value="5">June</option>
											<option value="6">July</option><option value="7">August</option>
											<option value="8">September</option><option value="9">October</option>
											<option value="10">November</option><option value="11">December</option>
											
								</select>
								<input id="year" type="number" name="year" maxlength="4" placeholder="Year" min="<?php $y=date("Y"); echo $y; ?>" max="<?php echo $y+50; ?>">
								<input type="submit" value="Done" name="done8" id="done_btn4" onclick=" return validate8();" />
								<span id="errEdate" class="error6"></span><br/>
								
								
								
								<script type='text/javascript'>
										function updateEdate(){
											document.UpdateEdate.month.style.visibility = 'visible';
											document.UpdateEdate.year.style.visibility = 'visible';
											document.UpdateEdate.done8.style.visibility = 'visible';
											document.UpdateEdate.edit8.disabled = true;
											document.UpdateEdate.edit8.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate8(){
											var err = 0;
											var erredate = document.getElementById("errEdate");
											var expiremonth = document.UpdateEdate.month;
											var expireyear = document.UpdateEdate.year;
											var date = new Date();
											var cyear = date.getFullYear();
											var cmonth = date.getMonth();
											
											if(expiremonth.value === "" || expireyear.value === "")
											{
												erredate.innerHTML = "These fields are required";
												err++;
											}
											
											else if(expireyear.value < cyear)
											{
												erredate.innerHTML = "Your card has already been expired";
												err++;
											}
											
											else if(expireyear.value == cyear)
											{
												if(expiremonth.value <= cmonth)
												{
													erredate.innerHTML = "Your card has already been expired";
													err++;
												}
												
												else
												{
													erredate.innerHTML = " ";		
												}
											}
											
											else
											{
												erredate.innerHTML = " ";		
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
							
							<form method="post" action="" name="UpdateCVV">
								
								<label>CVV Code</label>
								<p><?php echo $cvv; ?></p>
								<input type="button" value="Edit" name="edit9" id="edit_btn4" onclick="updateCVV()"/>
								<input type="text" id="cvv_code" name="cvv_code" maxlength="5" />
								<input type="submit" value="Done" name="done9" id="done_btn4" onclick=" return validate9();" />
								<span id="errCVV" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateCVV(){
											document.UpdateCVV.cvv_code.style.visibility = 'visible';
											document.UpdateCVV.done9.style.visibility = 'visible';
											document.UpdateCVV.edit9.disabled = true;
											document.UpdateCVV.edit9.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate9(){
											var err = 0;
											var errcvv = document.getElementById("errCVV");
											var cvv = document.UpdateCVV.cvv_code;
											var reg = /^[0-9]{3,4}$/;
											
											if(cvv.value === "")
											{
												errcvv.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg.test(cvv.value))
											{
												errcvv.innerHTML = "Invalid CVV code. Must contain 3 or 4 digits.";
												err++;
											}
											
											else
											{
												errcvv.innerHTML = " ";		
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
							
							<form method="post" action="" name="UpdateEmail" >
								<label>Email</label>
								<p><?php echo $email; ?></p>
								<input type="button" value="Edit" name="edit3" id="edit_btn4" onclick="updateEmail()"/>
								<input type="text" name="email" maxlength="50"/>
								<input type="submit" value="Done" name="done3" id="done_btn4" onclick=" return validate3();"/>
								<span id="errEmail" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateEmail(){
											document.UpdateEmail.email.style.visibility = 'visible';
											document.UpdateEmail.done3.style.visibility = 'visible';
											document.UpdateEmail.edit3.disabled = true;
											document.UpdateEmail.edit3.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate3(){
											var err = 0;
											var erremail = document.getElementById("errEmail");
											var email = document.UpdateEmail.email;
											var reg2 = /^[A-Za-z0-9][A-Za-z0-9._%+-]{0,63}@(?:[A-Za-z0-9]{1,10}\.){1,2}[A-Za-z]{2,4}$/;
											
											if(email.value === "")
											{
												erremail.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg2.test(email.value))
											{
												erremail.innerHTML = "Invalid email address. Correct format: abc.def@example.com";
												err++;
											}
											
											else
											{
												erremail.innerHTML = " ";
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
							
							<form method="post" action="" name="UpdateFname" >
								<label>First Name</label>
								<p><?php echo $first_name; ?></p>
								<input type="button" value="Edit" name="edit4" id="edit_btn4" onclick="updateFname()"/>
								<input type="text" id="first_name" name="first_name" maxlength="50" />
								<input type="submit" value="Done" name="done4" id="done_btn4" onclick=" return validate4();"/>
								<span id="errFname" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateFname(){
											document.UpdateFname.first_name.style.visibility = 'visible';
											document.UpdateFname.done4.style.visibility = 'visible';
											document.UpdateFname.edit4.disabled = true;
											document.UpdateFname.edit4.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate4(){
											var err = 0;
											var errfname = document.getElementById("errFname");
											var fname = document.UpdateFname.first_name;
											var reg = /^[A-Z][a-z]{1,}$/;
											
											if(fname.value === "")
											{
												errfname.innerHTML="This field is required";
												err++;
											}
											
											else if(!reg.test(fname.value))
											{
												errfname.innerHTML = "Invalid First Name. Correct format: Jack";
												err++;
											}
											
											else
											{
												errfname.innerHTML = " ";
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
							
							<form method="post" action="" name="UpdateLname" >
								<label>Last Name</label>
								<p><?php echo $last_name; ?></p>
								<input type="button" value="Edit" name="edit5" id="edit_btn4" onclick="updateLname()"/>
								<input type="text" id="last_name" name="last_name" maxlength="50" />
								<input type="submit" value="Done" name="done5" id="done_btn4" onclick=" return validate5();"/>
								<span id="errLname" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateLname(){
											document.UpdateLname.last_name.style.visibility = 'visible';
											document.UpdateLname.done5.style.visibility = 'visible';
											document.UpdateLname.edit5.disabled = true;
											document.UpdateLname.edit5.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate5(){
											var err = 0;
											var errlname = document.getElementById("errLname");
											var lname = document.UpdateLname.last_name;
											var reg = /^[A-Z][a-z]{1,}$/;
											
											if(lname.value === "")
											{
												errlname.innerHTML="This field is required";
												err++;
											}
											
											else if(!reg.test(lname.value))
											{
												errlname.innerHTML = "Invalid Last Name. Correct format: Jack";
												err++;
											}
											
											else
											{
												errlname.innerHTML = " ";
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
							
							<form method="post" action="" name="UpdateCompany" >
								<label>Company</label>
								<p><?php echo $company_name; ?></p>
								<input type="button" value="Edit" name="edit10" id="edit_btn4" onclick="updateCompany()"/>
								<input type="text" id="company" name="company" maxlength="70" />
								<input type="submit" value="Done" name="done10" id="done_btn4" onclick=" return validate10();"/>
								<span id="errCompany" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateCompany(){
											document.UpdateCompany.company.style.visibility = 'visible';
											document.UpdateCompany.done10.style.visibility = 'visible';
											document.UpdateCompany.edit10.disabled = true;
											document.UpdateCompany.edit10.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate10(){
											var err = 0;
											var errcompany = document.getElementById("errCompany");
											var company = document.UpdateCompany.company;
											var reg8 = /^[A-Z]([a-zA-Z0-9]|[- @\.#&!])*$/;
											
											if(company.value === "")
											{
												errcompany.innerHTML="This field is required";
												err++;
											}
											
											else if(company.value.length > 60)
											{
												errcompany.innerHTML="Too long. Keep it less than 60 characters.";
												err++;
											}
											
											else if(!reg8.test(company.value))
											{
												errcompany.innerHTML = "Invalid Company Name. Can contain alphabets, numbers, special characters (-/@/./#/&/!) and space. Ex: Jack & Jones";
												err++;
											}
											
											else
											{
												errcompany.innerHTML = " ";
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
							
							<form method="post" action="" name="UpdateContact" >
							
								<label>Contact Number</label>
								<p><?php echo $contact_number; ?></p>
								<input type="button" value="Edit" name="edit11" id="edit_btn" onclick="updateContact()"/>
								<input type="text" name="contact_number" maxlength="15"/>
								<input type="submit" value="Done" name="done11" id="done_btn" onclick=" return validate11();"/>
								<span id="errContact" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateContact(){
											document.UpdateContact.contact_number.style.visibility = 'visible';
											document.UpdateContact.done11.style.visibility = 'visible';
											document.UpdateContact.edit11.disabled = true;
											document.UpdateContact.edit11.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate11(){
											var err = 0;
											var errcontact = document.getElementById("errContact");
											var contact = document.UpdateContact.contact_number;
											var reg3 = /^(?:\+?88)?01[15-9]\d{8}$/;
											
											if(contact.value === "")
											{
												errcontact.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg3.test(contact.value))
											{
												errcontact.innerHTML = "Invalid Contact Number. Correct Format: +8801xxxxxxxxx or 01xxxxxxxxx";
												err++;
											}
											
											else
											{
												errcontact.innerHTML = " ";		
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
							
							<form method="post" action="" name="UpdateAddress1" >
							
								<label>Address Line1</label>
								<p><?php echo $address_line1; ?></p>
								<input type="button" value="Edit" name="edit12" id="edit_btn" onclick="updateAddress1()"/>
								<input type="text" id="address1" name="address1" maxlength="50" />
								<input type="submit" value="Done" name="done12" id="done_btn" onclick=" return validate12();"/>
								<span id="errAddress1" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateAddress1(){
											document.UpdateAddress1.address1.style.visibility = 'visible';
											document.UpdateAddress1.done12.style.visibility = 'visible';
											document.UpdateAddress1.edit12.disabled = true;
											document.UpdateAddress1.edit12.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate12(){
											var err = 0;
											var erraddress1 = document.getElementById("errAddress1");
											var address1 = document.UpdateAddress1.address1;
											var reg10 = /^[A-Z0-9]([a-zA-Z0-9]|[- ,\.#&])*$/;
											
											if(address1.value === "")
											{
												erraddress1.innerHTML = "This field is required";
												err++;
											}
											
											else if(address1.value.length > 40)
											{
												erraddress1.innerHTML = "Too long. Keep it less than 40 characters.";
												err++;
											}
											
											else if(!reg10.test(address1.value))
											{
												erraddress1.innerHTML = "Invalid address format. Can contain alphabets, numbers, special characters (-/,/./#/&) and space. Ex: 253 N. Cherry St.";
												err++;
											}
											
											else
											{
												erraddress1.innerHTML = " ";		
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
							
							<form method="post" action="" name="UpdateAddress2" >
							
								<label>Address Line2</label>
								<p><?php echo $address_line2; ?></p>
								<input type="button" value="Edit" name="edit13" id="edit_btn" onclick="updateAddress2()"/>
								<input type="text" id="address2" name="address2" maxlength="50" />
								<input type="submit" value="Done" name="done13" id="done_btn" onclick=" return validate13();"/>
								<span id="errAddress2" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateAddress2(){
											document.UpdateAddress2.address2.style.visibility = 'visible';
											document.UpdateAddress2.done13.style.visibility = 'visible';
											document.UpdateAddress2.edit13.disabled = true;
											document.UpdateAddress2.edit13.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate13(){
											var err = 0;
											var erraddress2 = document.getElementById("errAddress2");
											var address2 = document.UpdateAddress2.address2;
											var reg10 = /^[A-Z0-9]([a-zA-Z0-9]|[- ,\.#&])*$/;
											
											if(address2.value === "")
											{
												erraddress2.innerHTML = "This field is required";
												err++;
											}
											
											else if(address2.value.length > 40)
											{
												erraddress2.innerHTML = "Too long. Keep it less than 40 characters.";
												err++;
											}
											
											else if(!reg10.test(address2.value))
											{
												erraddress2.innerHTML = "Invalid address format. Can contain alphabets, numbers, special characters (-/,/./#/&) and space. Ex: 253 N. Cherry St.";
												err++;
											}
											
											else
											{
												erraddress2.innerHTML = " ";		
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
							
							<form method="post" action="" name="UpdateCity" >
							
								<label>City</label>
								<p><?php echo $city; ?></p>
								<input type="button" value="Edit" name="edit14" id="edit_btn" onclick="updateCity()"/>
								<input type="text" id="city" name="city" maxlength="30" />
								<input type="submit" value="Done" name="done14" id="done_btn" onclick=" return validate14();"/>
								<span id="errCity" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateCity(){
											document.UpdateCity.city.style.visibility = 'visible';
											document.UpdateCity.done14.style.visibility = 'visible';
											document.UpdateCity.edit14.disabled = true;
											document.UpdateCity.edit14.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate14(){
											var err = 0;
											var errcity = document.getElementById("errCity");
											var city = document.UpdateCity.city;
											var reg12 = /^[A-Z][a-zA-Z\s-]+[a-zA-Z]$/;
											
											if(city.value === "")
											{
												errcity.innerHTML = "This field is reqired";
												err++;
											}
											
											else if(!reg12.test(city.value))
											{
												errcity.innerHTML = "Invalid city name format. Correct Format: Dhaka or Los Angels.";
												err++;
											}
											
											else
											{
												errcity.innerHTML = " ";		
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
							
							<form method="post" action="" name="UpdateZip">
								
								<label>Zip Code</label>
								<p><?php echo $zip_code; ?></p>
								<input type="button" value="Edit" name="edit15" id="edit_btn4" onclick="updateZip()"/>
								<input type="text" id="zip" name="zip" maxlength="5" />
								<input type="submit" value="Done" name="done15" id="done_btn4" onclick=" return validate15();" />
								<span id="errZip" class="error6"></span><br/>
								
								<script type='text/javascript'>
										function updateZip(){
											document.UpdateZip.zip.style.visibility = 'visible';
											document.UpdateZip.done15.style.visibility = 'visible';
											document.UpdateZip.edit15.disabled = true;
											document.UpdateZip.edit15.style.background = '#4DB6AC';
										}
										
								</script>
								
								<script type='text/javascript'>
										function validate15(){
											var err = 0;
											var errzip = document.getElementById("errZip");
											var zip = document.UpdateZip.zip;
											var reg = /^\d{4}$/;
											
											if(zip.value === "")
											{
												errzip.innerHTML = "This field is required";
												err++;
											}
											
											else if(!reg.test(zip.value))
											{
												errzip.innerHTML = "Invalid zip code. Must contain 4 digits.";
												err++;
											}
											
											else
											{
												errzip.innerHTML = " ";		
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
						
						
						<?php
						
							}
							
						?>
						</div>
						
					<?php
							
						if($card_type=="" && $user_type!="member"){
							echo "<p style='width:875px; font-size:14px; margin-left:115px; text-align:center;'>
								  Looks like your Credit Card information is incomplete.
								  Click <a style='color:#1A237E; font-size:17px; font-weight:bold;' href='sign_up4.php'>here</a> , if you want to complete it now.
								  Otherwise, You will not be able to participate in any art auction event.
								  </p>";
						}
						
						if($card_type=="" && $user_type=="member"){
							echo "<p style='width:875px; font-size:14px; margin-left:115px; text-align:center;'>
								  Looks like your Credit Card information is incomplete.
								  Click <a style='color:#1A237E; font-size:17px; font-weight:bold;' href='sign_up4.php'>here</a> , if you want to complete it now.
								  </p>";
							
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