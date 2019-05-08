<?php

session_start();
	
	if($_SESSION['UserName']!=true){
		header('location: sign_in.php');
	}
	
	else{
		$UserName=$_SESSION['UserName'];
		//echo $UserName;
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
			//echo $user_type;
		}
	}
	
	
	$query="SELECT * FROM credit_card WHERE UserID='$user_id'" or die(mysql_error());
	$result=mysql_query($query, $connect) or die(mysql_error());
	$rows=mysql_num_rows($result);
	
	if($rows==1){
		header('location: home.php');
	}

	
 ?>

<?php

if(isset($_POST['save']))
	{
		
			$nid = mysql_real_escape_string($_POST['national_id']);
			$user_name = $_POST['user_name'];
			$card_type = $_POST['card_type'];
			$card_number = $_POST['card_number'];
			$expire_month = $_POST['month'];
			$expire_year = $_POST['year'];
			$cvv = $_POST['cvv_code'];
			$email = $_POST['email'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$company_name = $_POST['company'];
			$contact_number = $_POST['contact_number'];
			$address1 = $_POST['address1'];
			$address2 = $_POST['address2'];
			$city = $_POST['city'];
			$zip = $_POST['zip'];
			
			
			$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
			mysql_select_db("Artbound") or die ("Couldn't connect to database");
			
			$query = "Insert into credit_card(UserID, NationalID, NameOnCard, CardType, CardNumber, ExpireMonth, ExpireYear, CVV, Email, FirstName, LastName, CompanyName, ContactNumber, AddressLine1, AddressLine2, City, ZipCode) values('$user_id', '$nid', '$user_name', '$card_type', '$card_number', '$expire_month', '$expire_year', '$cvv', '$email', '$first_name', '$last_name', '$company_name', '$contact_number', '$address1', '$address2', '$city', '$zip')";
			
			
			$result = mysql_query($query, $connect);
			
			if(!$result){
				echo "Error : ".mysql_error();
			}
			
			else{
				header("location: home.php");
			}
	}
	

?>

<?php

if(isset($_POST['submit']))
	{
		
			$nid2 = mysql_real_escape_string($_POST['national_id2']);
			$card_type2 = $_POST['account_type'];
			$email3 = $_POST['email3'];
			$first_name2 = $_POST['first_name2'];
			$last_name2 = $_POST['last_name2'];
			
			
			$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
			mysql_select_db("Artbound") or die ("Couldn't connect to database");
			
			$query = "Insert into credit_card(UserID, NationalID, CardType, Email, FirstName, LastName) values('$user_id', '$nid2', '$card_type2', '$email3', '$first_name2', '$last_name2')";
			
			
			$result = mysql_query($query, $connect);
			
			if(!$result){
				echo "Error : ".mysql_error();
			}
			
			else{
				header("location: home.php");
			}
	}
	

?>



<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Credit Card Information </title>
		<link href="CSS/style.css" rel="stylesheet" type="text/css"/>
		
		<script type="text/javascript">
			function validate(){
				
				//for NID
				var err=0;
				var errnid = document.getElementById("errNID");
				var nid = document.subscriptionCard.national_id;
				var reg1 = /^[0-9]{13}$/;
				
				if(nid.value === "")
				{
					errnid.innerHTML = "This field is required";
					err++;
				}
				
				else if(!reg1.test(nid.value))
				{
					errnid.innerHTML = "Invalid NID Number. Must contain 13 digits.";
					err++;
				}
				
				else
				{
					errnid.innerHTML = " ";		
				}
				
				//for Name on Card
				
				var errusername = document.getElementById("errUsername");
				var username = document.subscriptionCard.user_name;
				//var reg2 = /^[A-Z][a-z]+[\s]?[A-Z][a-z]{1,}$/;
				//var reg2 = /^([A-Z][a-z]\s){1,}[A-Z][a-z\s]{0,}$/;
				//var reg2 = /^[A-Z]+[\s]?[a-zA-Z ]+$/;
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
				
				// for Card Type
				
				var errctype = document.getElementById("errCtype");
				var ctype = document.subscriptionCard.card_type;
				
				if(ctype.value === "")
				{
					errctype.innerHTML = "Please, select your card type";
					err++;
				}
				
				else
				{
					errctype.innerHTML = " ";				
				}
				
				//for Card Number
				
				var errcnumber = document.getElementById("errCnumber");
				var cnumber = document.subscriptionCard.card_number;
				var mcreg = /^(?:5[1-5][0-9]{14})$/;
				var vreg = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
				var aereg = /^(?:3[47][0-9]{13})$/;
				
				if(cnumber.value === "")
				{
					errcnumber.innerHTML = "This field is required";
					err++;
				}
				
				else if(ctype.value === "")
				{
					errcnumber.innerHTML = "Please, select your card type first";
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
				
				// for Expire Date
				
				var erredate = document.getElementById("errEdate");
				var expiremonth = document.subscriptionCard.month;
				var expireyear = document.subscriptionCard.year;
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
				
				//for CVV Code
				
				var errcvv = document.getElementById("errCVV");
				var cvv = document.subscriptionCard.cvv_code;
				var reg4 = /^[0-9]{3,4}$/;
				
				if(cvv.value === "")
				{
					errcvv.innerHTML = "This field is required";
					err++;
				}
				
				else if(!reg4.test(cvv.value))
				{
					errcvv.innerHTML = "Invalid CVV code. Must contain 3 or 4 digits.";
					err++;
				}
				
				else
				{
					errcvv.innerHTML = " ";		
				}
				
				//for Email
				
				var erremail = document.getElementById("errEmail");
				var email = document.subscriptionCard.email;
				var reg5 = /^[A-Za-z0-9][A-Za-z0-9._%+-]{0,63}@(?:[A-Za-z0-9]{1,10}\.){1,2}[A-Za-z]{2,4}$/;
				
				if(email.value === "")
				{
					erremail.innerHTML = "This field is required";
					err++;
				}
				
				else if(!reg5.test(email.value))
				{
					erremail.innerHTML = "Invalid email address. Correct format: abc.def@example.com";
					err++;
				}
				
				else
				{
					erremail.innerHTML = " ";
				}
				
				// for First Name
				
				var errfname = document.getElementById("errFname");
				var fname = document.subscriptionCard.first_name;
				var reg6 = /^[A-Z][a-z]{1,}$/;
				
				if(fname.value === "")
				{
					errfname.innerHTML="This field is required";
					err++;
				}
				
				else if(!reg6.test(fname.value))
				{
					errfname.innerHTML = "Invalid First Name. Correct format: Jack";
					err++;
				}
				
				else
				{
					errfname.innerHTML = " ";
				}
				
				// for Last Name
				
				var errlname = document.getElementById("errLname");
				var lname = document.subscriptionCard.last_name;
				var reg7 = /^[A-Z][a-z]{1,}$/;
				
				if(lname.value === "")
				{
					errlname.innerHTML="This field is required";
					err++;
				}
				
				else if(!reg7.test(lname.value))
				{
					errlname.innerHTML = "Invalid Last Name. Correct format: Jack";
					err++;
				}
				
				else
				{
					errlname.innerHTML = " ";
				}
				
				// for Company Name
				
				var errcompany = document.getElementById("errCompany");
				var company = document.subscriptionCard.company;
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
				
				//for Contact Number
				
				var errcontact = document.getElementById("errContact");
				var contact = document.subscriptionCard.contact_number;
				var reg9 = /^(?:\+?88)?01[15-9]\d{8}$/;
				
				if(contact.value === "")
				{
					errcontact.innerHTML = "This field is required";
					err++;
				}
				
				else if(!reg9.test(contact.value))
				{
					errcontact.innerHTML = "Invalid Contact Number. Correct Format: +8801xxxxxxxxx or 01xxxxxxxxx";
					err++;
				}
				
				else
				{
					errcontact.innerHTML = " ";		
				}
				
				//for Address Line 1
				
				var erraddress1 = document.getElementById("errAddress1");
				var address1 = document.subscriptionCard.address1;
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
				
				//for Address Line 2
				
				var erraddress2 = document.getElementById("errAddress2");
				var address2 = document.subscriptionCard.address2;
				var reg11 = /^[A-Z0-9]([a-zA-Z0-9]|[- ,\.#&])*$/;
				
				if(address2.value === "")
				{
					erraddress2.innerHTML = " ";
					err++;
				}
				
				else if(!reg11.test(address2.value))
				{
					erraddress2.innerHTML = "Invalid address format. Can contain alphabets, numbers, special characters (-/,/./#/&) and space. Ex: 253 N. Cherry St.";
					err++;
				}
				
				else
				{
					erraddress2.innerHTML = " ";		
				}
				
				//for City
				
				var errcity = document.getElementById("errCity");
				var city = document.subscriptionCard.city;
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
				
				//for Zip Code
				
				var errzip = document.getElementById("errZip");
				var zip = document.subscriptionCard.zip;
				var reg13 = /^\d{4}$/;
				
				if(zip.value === "")
				{
					errzip.innerHTML = "This field is required";
					err++;
				}
				
				else if(!reg13.test(zip.value))
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
		
		<script type="text/javascript">
			function validate2(){
				
				//for NID
				var err=0;
				var errnid2 = document.getElementById("errNID2");
				var nid2 = document.subscriptionNcard.national_id2;
				var reg1 = /^[0-9]{13}$/;
				
				if(nid2.value === "")
				{
					errnid2.innerHTML = "This field is required";
					err++;
				}
				
				else if(!reg1.test(nid2.value))
				{
					errnid2.innerHTML = "Invalid NID Number. Must contain 13 digits.";
					err++;
				}
				
				else
				{
					errnid2.innerHTML = " ";		
				}
				
				// for Account Type (Paypal/Payoneer/Payza)
				
				var erratype = document.getElementById("errAtype");
				var atype = document.subscriptionNcard.account_type;
				
				if(atype.value === "")
				{
					erratype.innerHTML = "Please, select your account type";
					err++;
				}
				
				else
				{
					erratype.innerHTML = " ";				
				}
				
				//for Email
				
				var erremail3 = document.getElementById("errEmail3");
				var email3 = document.subscriptionNcard.email3;
				var reg16 = /^[A-Za-z0-9][A-Za-z0-9._%+-]{0,63}@(?:[A-Za-z0-9]{1,10}\.){1,2}[A-Za-z]{2,4}$/;
				
				if(email3.value === "")
				{
					erremail3.innerHTML = "This field is required";
					err++;
				}
				
				else if(!reg16.test(email3.value))
				{
					erremail3.innerHTML = "Invalid email address. Correct format: abc.def@example.com";
					err++;
				}
				
				else
				{
					erremail3.innerHTML = " ";
				}
				
				
				//for First Name 2
				
				var errfname2 = document.getElementById("errFname2");
				var fname2 = document.subscriptionNcard.first_name2;
				var reg14 = /^[A-Z][a-z]{1,}$/;
				
				if(fname2.value === "")
				{
					errfname2.innerHTML="This field is required";
					err++;
				}
				
				else if(!reg14.test(fname2.value))
				{
					errfname2.innerHTML = "Invalid First Name. Correct format: Jack";
					err++;
				}
				
				else
				{
					errfname2.innerHTML = " ";
				}
				
				
				//for Last Name 2
				
				var errlname2 = document.getElementById("errLname2");
				var lname2 = document.subscriptionNcard.last_name2;
				var reg15 = /^[A-Z][a-z]{1,}$/;
				
				if(lname2.value === "")
				{
					errlname2.innerHTML = "This field is required";
					err++;
				}
				
				else if(!reg15.test(lname2.value))
				{
					errlname2.innerHTML = "Invalid Last Name. Correct format: Jones";
					err++;
				}
				
				else
				{
					errlname2.innerHTML = " ";
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
	
		<div class="bank_data">
		
			<div class="step">
				<p>Step 3</p>
			</div>
			
			<div class="profile_bank_data">
				<div id="sidebar4">
					<ul class="mcd-menu">
						<li>
							<a href="">
								<img src="image/user1.png"/>
								<strong>Profile Image</strong>
								<small>share your image</small>
							</a>
						</li>
						<li>
							<a href="">
								<img src="image/aboutme1.png"/>
								<strong>About Me</strong>
								<small>write about yourself</small>
							</a>
						</li>
						<li>
							<a href="" class="active">
								<img src="image/card1.png"/>
								<strong>Credit Card</strong>
								<small>account information</small>
							</a>
						</li>
					</ul>
				</div>
				
				<div class="bank_information">
					<h4 style="margin-left:50px;">Payment Method</h4>
					<p style="margin-left:50px;">Please select your payment method. All users are required to have a valid credit card or Paypal/Payoneer/Payza account on file to buy or sell art works.</p>
						
							<label>Payment Method</label>
							<input type="radio" name="pay_method" id="c_card" value="credit card" onclick="showhideFunction()" checked/>
							<label id="PM" for="c_card">Credit Cards</label>
									
								<script type="text/javascript">
										function showhideFunction(){
											var c = document.getElementById("c_card");
											var credit = document.getElementsByClassName("credit_card");
											var other = document.getElementsByClassName("not_c_card");
											for(var i=0; i!=credit.length; i++)
											{
												if(c.checked)
												{
													credit[i].style.display = "block";
													other[i].style.display = "none";
												}
												else
												{
													credit[i].style.display = "none";
													other[i].style.display = "block";
												}
											
											}
										}
										
										
									</script>		
								
							<input type="radio" name="pay_method" id="others" value="others" onClick="hideshowFunction()"/>
							<label id="PM" for="others">Paypal/Payoneer/Payza</label>
							<span id="errPMethod" class="error"></span>		
							
									<script type="text/javascript">
										function hideshowFunction(){
											var p = document.getElementById("others");
											var other = document.getElementsByClassName("not_c_card");
											var credit = document.getElementsByClassName("credit_card");
											
											for(var j=0; j != other.length; i++)
											{
												if(p.checked)
												{
													other[j].style.display = "block";
													credit[j].style.display = "none";
												}
												else
												{
													other[j].style.display = "none";
													credit[j].style.display = "block";
												}
											
											}
										}
									</script>	
								
						<div class="credit_card" style="display:block;">
						
						<form method="post" action="sign_up4.php" name="subscriptionCard">
						
							<h4>National ID Card</h4>
							
								<label>NID</label>
								<input type="text" id="national_id" name="national_id" maxlength="17" /><b>*</b>
								<span id="errNID" class="Error2"></span>
							
							<h4>Credit Card Information</h4>
							<p>Please enter your credit card information.</p>
								<label>Name on Card</label>
								<input type="text" id="user_name" name="user_name" maxlength="50" /><b>*</b>
								<span id="errUsername" class="Error2"></span>
								
								<label> Account Type </label>
								<select id="card_type" name="card_type">
										<option selected="selected" value="">Card Type</option>
										<option value="master card"> Master Card </option>
										<option value="visa"> VISA </option>
										<option value="american express"> American Express </option>
								</select><b>*</b>
								<span id="errCtype" class="Error2"></span>
								
								<label>Card Number</label>
								<input type="text" id="card_number" name="card_number" maxlength="20" /><b>*</b>
								<span id="errCnumber" class="Error2"></span>
								
								<label> Expire Date </label>
										
								<select id="month" name="month" ><b>*</b>
											
											<option selected="selected" value="">Month</option>
											<option value="0">January</option><option value="1">February</option>
											<option value="2">March</option><option value="3">April</option>
											<option value="4">May</option><option value="5">June</option>
											<option value="6">July</option><option value="7">August</option>
											<option value="8">September</option><option value="9">October</option>
											<option value="10">November</option><option value="11">December</option>
											
								</select>
											
								<input id="year" type="number" name="year" maxlength="4" placeholder="Year" min="<?php $y=date("Y"); echo $y; ?>" max="<?php echo $y+50; ?>"><b>*</b>
								<span id="errEdate" class="Error2"></span>
								
								<label>CVV Code</label>
								<input type="text" id="cvv_code" name="cvv_code" maxlength="5" /><b>*</b>
								<span id="errCVV" class="Error2"></span>
								
							
							<h4>Billing Address</h4>
							<p>Please enter your billing address. The address provided must be linked to the credit card listed above.</p>
								<label>Email</label>
								<input type="text" id="email" name="email" maxlength="50" /><b>*</b>
								<span id="errEmail" class="Error2"></span>
								
								<label>First Name</label>
								<input type="text" id="first_name" name="first_name" maxlength="50" /><b>*</b>
								<span id="errFname" class="Error2"></span>
								
								<label>Last Name</label>
								<input type="text" id="last_name" name="last_name" maxlength="50" /><b>*</b>
								<span id="errLname" class="Error2"></span>
								
								<label>Company</label>
								<input type="text" id="company" name="company" maxlength="70" />
								<span id="errCompany" class="Error2"></span>
								
								<label>Contact Number</label>
								<input type="text" id="contact_number" name="contact_number" maxlength="15" /><b>*</b>
								<span id="errContact" class="Error2"></span>
								
								<label>Address Line 1</label>
								<input type="text" id="address1" name="address1" maxlength="50" /><b>*</b>
								<span id="errAddress1" class="Error2"></span>
								
								<label>Address Line 2</label>
								<input type="text" id="address2" name="address2" maxlength="50" />
								<span id="errAddress2" class="Error2"></span>
								
								<label>City</label>
								<input type="text" id="city" name="city" maxlength="30" /><b>*</b>
								<span id="errCity" class="Error2"></span>
								
								<label>Zip Code</label>
								<input type="text" id="zip" name="zip" maxlength="10" /><b>*</b>
								<span id="errZip" class="Error2"></span>
								
								<input id="back3" type="button" onclick="backFunction()" name="back" value="Back"/>
								<input id="skip3" type="button" onclick="myFunction()" name="skip" value="Skip"/>
								<input id="continue3" type="submit" onclick=" return validate();" name="save" value="Save & Continue"/>
								
								<script type="text/javascript">
								function backFunction() {
									window.location.href="sign_up3.php";
								}
								</script>
								
								<script type="text/javascript">
								function myFunction() {
									
										var r = confirm("About Me information will help other users to know you better. Do you want to skip it?");
										if (r == true)
										{
											window.location.href="home.php";
										} 
										
								}
								</script>
							
						</form>
							
						</div>
							
						<div class="not_c_card" style="display:none;">
						
						<form method="post" action="sign_up4.php" name="subscriptionNcard">
						
							<h4>National ID Card</h4>
							
								<label>NID</label>
								<input type="text" id="national_id" name="national_id2" maxlength="17" /><b>*</b>
								<span id="errNID2" class="Error2"></span>
								
							<h4>Account Info</h4>
							<p>Please enter your account information. The information provided must be linked to the account listed above.</p>						
								<label> Account Type </label>
								<select id="account_type" name="account_type">
										<option selected="selected" value="">Account Type</option>
										<option value="paypal"> Paypal </option>
										<option value="payoneer"> Payoneer </option>
										<option value="payza"> Payza </option>
								</select><b>*</b>
								<span id="errAtype" class="Error2"></span>
								
								<label>Email</label>
								<input type="text" id="email3" name="email3" maxlength="50" /><b>*</b>
								<span id="errEmail3" class="Error2"></span>
								
								<label>First Name</label>
								<input type="text" id="first_name2" name="first_name2" maxlength="50" /><b>*</b>
								<span id="errFname2" class="Error2"></span>
								
								<label>Last Name</label>
								<input type="text" id="last_name2" name="last_name2" maxlength="50" /><b>*</b>
								<span id="errLname2" class="Error2"></span>
								
				
								<input id="back3" type="button" onclick="backFunction()" name="back" value="Back"/>
								<input id="skip3" type="button" onclick="myFunction()" name="skip" value="Skip"/>
								<input id="continue3" type="submit" onclick=" return validate2();" name="submit" value="Save & Continue"/>
								
								<script type="text/javascript">
								function backFunction() {
									window.location.href="sign_up3.php";
								}
								</script>
								
								<script type="text/javascript">
								function myFunction() {
									
										var r = confirm("About Me information will help other users to know you better. Do you want to skip it?");
										if (r == true)
										{
											window.location.href="home.php";
										} 
										
								}
								</script>
						
						</form>
						</div>
				</div>
			</div>
			
		</div>
	
	</body>
</html>