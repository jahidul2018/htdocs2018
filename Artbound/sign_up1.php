<?php

	if(isset($_POST['submit']))
	{
		
			$first_name =mysql_real_escape_string($_POST['first_name']);
			$last_name = $_POST['last_name'];
			$user_name = $_POST['user_name'];
			$email = $_POST['email'];
			$activation_code = md5($_POST['user_name'] + microtime());
			$password = $_POST['password'];
			$user_type = $_POST['user_type'];
			$birth_day = $_POST['birth_day'];
			$birth_month = $_POST['birth_month'];
			$birth_year = $_POST['year'];
			$gender = $_POST['gender'];
			$contact_number = $_POST['contact_number'];
			
			$connect = mysql_connect("localhost", "root", "") or die("Couldn't connect to localhost");
			mysql_select_db("Artbound") or die ("Couldn't connect to database");
			
			$query = "Insert into Users(FirstName, LastName, UserName, Email, Active, ActivationCode, Password, UserType, BirthDay, BirthMonth, BirthYear, Gender, ContactNumber) values('$first_name', '$last_name', '$user_name', '$email', 0, '$activation_code', '$password', '$user_type', '$birth_day', '$birth_month', '$birth_year', '$gender', '$contact_number')";
			
			$result = mysql_query($query, $connect);
			
			if(!$result){
				echo "Error : ".mysql_error();
			}
			
			else{
				require "PHPMailer-master/PHPMailerAutoload.php";
				
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
				$mail->addAddress($email, $user_name); 
				$mail->isHTML(true);              

				$mail->Subject = 'Order report';
				$mail->Body    = '<h4>Hello '.$user_name.'...</h4><br/><br/>Thanks for Subscribing in Artbound.<br/><br/>Click the link below to activate your account.<br/><br/><a href="http://localhost/artbound/account_activation_mail.php?activation_code=' . $activation_code . '"> http://localhost/artbound/account_activation_mail.php?activation_code=' . $activation_code . '</a>';
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if(!$mail->send()) {
					
					echo 'Message could not be sent. <br/>';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				} 
				else {
					header('location: welcome.php');
				}
				
			}
	}

?>



<! DOCTYPE HTML>

<html lang="eng">
	<head>
		<title> Subscribe </title>
		<link href="CSS/style.css" rel="stylesheet" type="text/css"/>
		
		<script type="text/javascript">
			function validate(){
				
				//for First Name
				var err=0;
				var errfname = document.getElementById("errFname");
				var fname = document.subscription.first_name;
				var reg1 = /^[A-Z][a-z]{1,}$/;
				
				if(fname.value === "")
				{
					errfname.innerHTML="This field is required";
					err++;
				}
				
				else if(!reg1.test(fname.value))
				{
					errfname.innerHTML = "Invalid First Name. Correct format: Jack";
					err++;
				}
				
				else
				{
					errfname.innerHTML = " ";
				}
				
				
				//for Last Name
				
				var errlname = document.getElementById("errLname");
				var lname = document.subscription.last_name;
				var reg1 = /^[A-Z][a-z]{1,}$/;
				
				if(lname.value === "")
				{
					errlname.innerHTML = "This field is required";
					err++;
				}
				
				else if(!reg1.test(lname.value))
				{
					errlname.innerHTML = "Invalid Last Name. Correct format: Jones";
					err++;
				}
				
				else
				{
					errlname.innerHTML = " ";
				}
				
				//for User Name
				
				var erruname = document.getElementById("errUname1");
				var uname = document.subscription.user_name;
				var an = /^[a-zA-Z0-9_]*$/;
				if(uname.value === "")
				{
					erruname.innerHTML = "This field is required";
					err++;
				}
				
				else if(uname.value.length < 8)
				{
					erruname.innerHTML = "Must be 8 characters at least";
					err++;
				}

				else if(!an.test(uname.value))
				{
					erruname.innerHTML = "Invalid User Name. Can only contain values A-Z, a-z, 0-9 and _ ";
					err++;
				}
				
				else
				{
					erruname.innerHTML = " ";
				}
				
				//for Email
				
				var erremail = document.getElementById("errEmail1");
				var email = document.subscription.email;
				//var reg = /^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9.]){1,}\.([A-Za-z]{2,4})$/;
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
				
				//for password
				
				var errpass = document.getElementById("errPass");
				var pass = document.subscription.password;
				
				if(pass.value === "")
				{
					errpass.innerHTML = "This field is required";
					err++;
				}
				
				else if(pass.value.length < 8)
				{
					errpass.innerHTML = "Password must have at least 8 characters";
					err++;
				}
				
				else if( !/[a-z]/.test(pass.value) || !/[A-Z]/.test(pass.value) || !/[0-9]/.test(pass.value) || !/[!@#$%^&*~_]/.test(pass.value) )
				{
					errpass.innerHTML = "Must contain at least 1 uppercase letter, lowercase letter, number and special character";
					err++;
				}
				
				else if(pass.value === uname.value)
				{
					errpass.innerHTML = "Password must be different than User Name";
					err++;
				}
				
				else
				{
					errpass.innerHTML = " ";
				}
				
				// for Re-enter Password
				
				var errRepass = document.getElementById("errRepass");
				var repass = document.subscription.reenter_password;
				
				if(repass.value === "")
				{
					errRepass.innerHTML = "This field is required";
					err++;
				}
				
				else if(repass.value !== pass.value)
				{
					errRepass.innerHTML = "Password didn't match";
					err++;
				}
				
				else
				{
					errRepass.innerHTML = " ";
				}
				
				// for User Type
				
				var errutype = document.getElementById("errUtype");
				var utype = document.subscription.user_type;
				
				if(utype.value === "")
				{
					errutype.innerHTML = "Please, select a User Type";
					err++;
				}
				
				else
				{
					errutype.innerHTML = " ";				
				}
				
				//for Birthday
				
				var errbirthdate = document.getElementById("errBirth")
				var birthday = document.subscription.birth_day;
				var birthmonth = document.subscription.birth_month;
				var birthyear = document.subscription.year;
				var date = new Date();
				var cyear = date.getFullYear();
				var cmonth = date.getMonth();
				var cdate = date.getDate();
				var dif = cyear - birthyear.value;
				
				if(birthday.value === "" || birthmonth.value === "" || birthyear.value === "")
				{
					errbirthdate.innerHTML = "These fields are required";
					err++;
				}
				
				else if(utype.value === "")
				{
					errbirthdate.innerHTML = "Please, select User Type first";
					err++;
				}
				
				else if(birthyear.value >= cyear || birthyear.value < 1930)
				{
					errbirthdate.innerHTML = "Invalid Birth Year";
					err++;
				}
				
						// Artist :::
				
				else if(utype.value === "artist")
				{
					if(dif < 25)
					{
						errbirthdate.innerHTML = "Sorry, You have to be at least 25 years old to sign up as an Artist";
						err++;
					}
					
					else if(dif == 25)
					{
						if(birthmonth.value > cmonth)
						{
							errbirthdate.innerHTML = "Sorry, You have to be at least 25 years old to sign up as an Artist";
							err++;
						}
						
						else if(birthmonth.value == cmonth)
						{
							if(birthday.value > cdate)
							{
								errbirthdate.innerHTML = "Sorry, You have to be at least 25 years old to sign up as an Artist";
								err++;
							}
							else
							{
								errbirthdate.innerHTML = "";
							}
						}
						
						else
						{
							errbirthdate.innerHTML = "";
						}
						
					}
					
					else
					{
						errbirthdate.innerHTML = "";
					}
				}
				
						// Collector :::
				
				else if(utype.value === "collector")
				{
					if(dif < 25)
					{
						errbirthdate.innerHTML = "Sorry, You have to be at least 25 years old to sign up as a Collector";
						err++;
					}
					
					else if(dif == 25)
					{
						if(birthmonth.value > cmonth)
						{
							errbirthdate.innerHTML = "Sorry, You have to be at least 25 years old to sign up as a Collector";
							err++;
						}
						
						else if(birthmonth.value == cmonth)
						{
							if(birthday.value > cdate)
							{
								errbirthdate.innerHTML = "Sorry, You have to be at least 25 years old to sign up as a Collector";
								err++;
							}
							else
							{
								errbirthdate.innerHTML = "";
							}
						}
						
						else
						{
							errbirthdate.innerHTML = "";
						}
						
					}
					
					else
					{
						errbirthdate.innerHTML = "";
					}
				}
						
						// Bidder :::
						
				else if(utype.value === "bidder")
				{
					if(dif < 22)
					{
						errbirthdate.innerHTML = "Sorry, You have to be at least 22 years old to sign up as a Bidder";
						err++;
					}
					
					else if(dif == 22)
					{
						if(birthmonth.value > cmonth)
						{
							errbirthdate.innerHTML = "Sorry, You have to be at least 22 years old to sign up as a Bidder";
							err++;
						}
						
						else if(birthmonth.value == cmonth)
						{
							if(birthday.value > cdate)
							{
								errbirthdate.innerHTML = "Sorry, You have to be at least 22 years old to sign up as a Bidder";
								err++;
							}
							else
							{
								errbirthdate.innerHTML = "";
							}
						}
						
						else
						{
							errbirthdate.innerHTML = "";
						}
						
					}
					
					else
					{
						errbirthdate.innerHTML = "";
					}
				}
				
						// Member :::
				
				else if(utype.value === "member")
				{
					if(dif < 16)
					{
						errbirthdate.innerHTML = "Sorry, You have to be at least 16 years old to sign up as a Member";
						err++;
					}
					
					else if(dif == 16)
					{
						if(birthmonth.value > cmonth)
						{
							errbirthdate.innerHTML = "Sorry, You have to be at least 16 years old to sign up as a Member";
							err++;
						}
						
						else if(birthmonth.value == cmonth)
						{
							if(birthday.value > cdate)
							{
								errbirthdate.innerHTML = "Sorry, You have to be at least 16 years old to sign up as a Member";
								err++;
							}
							else
							{
								errbirthdate.innerHTML = "";
							}
						}
						
						else
						{
							errbirthdate.innerHTML = "";
						}
						
					}
					
					else
					{
						errbirthdate.innerHTML = "";
					}
				}
				
				else
				{
					errbirthdate.innerHTML = "";
				}
				
				// for Gender
				
				var errgen = document.getElementById("errGender");
				var gen = document.subscription.gender;
				var flag = 1;
				
				for(var i in gen)
				{
					if(gen[i].checked)
						flag = 0;
				}
				
				if(flag == 1)
				{
					errgen.innerHTML = "Please, select your Gender";
					err++;
				}
				
				else
				{
					errgen.innerHTML = " ";
				}
				
				//for Contact Number
				
				var errcontact = document.getElementById("errContact");
				var contact = document.subscription.contact_number;
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
			</div>
			
			<div class="subscribe">
				<div class="nav1">
					<a href="home.php"> Home </a>
				</div>
				
				<div class="subscribe_body">
				
					<div class="subscribe_area">
					
						<h4> Subscribe here </h4>
						<p> Before subscribing you should understand our <em>Terms of Service</em>, <em>Privacy Policy</em>, <em>Copyright Policy</em> and <em>Guidelines</em>.
							It is strongly recommended that you use your valid information for subscribing.</p>
				
						<form method="post" action="" name="subscription" >
							
									<label> First Name </label>
									<input type="text" id="first_name" name="first_name" maxlength="50" />
									<span id="errFname" class="error"></span>
									
									<label> Last Name </label>
									<input type="text" name="last_name" maxlength="50"/>
									<span id="errLname" class="error"></span>
							
									<label> User Name </label>
									<input type="text" name="user_name" maxlength="50"/>
									<span id="errUname1" class="error"></span>
									
									<label> Email </label>
									<input type="text" name="email" maxlength="50"/>
									<span id="errEmail1" class="error"></span>
									
									<label> Password </label>
									<input type="password" name="password" maxlength="50"/>
									<span id="errPass" class="error"></span>
									
									<label> Re-enter Password </label>
									<input type="password" name="reenter_password" maxlength="50"/>
									<span id="errRepass" class="error"></span>
									
									<label> User Type </label>
									<select id="user_type" name="user_type">
											<option selected="selected" value="">User Type</option>
											<option value="artist"> Artist </option>
											<option value="collector"> Collector </option>
											<option value="bidder"> Bidder </option>
											<option value="member"> Member </option>
									</select>
									<span id="errUtype" class="error"></span>
									
									<label> Birthdate </label>
									
										<select id="birthday" name="birth_day" >
											
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
										
										<select name="birth_month" >
										
											<option selected="selected" value="">Month</option>
											<option value="0">January</option><option value="1">February</option>
											<option value="2">March</option><option value="3">April</option>
											<option value="4">May</option><option value="5">June</option>
											<option value="6">July</option><option value="7">August</option>
											<option value="8">September</option><option value="9">October</option>
											<option value="10">November</option><option value="11">December</option>
										
										</select>
										
										<input id="b_year" type="number" name="year" maxlength="4" placeholder="Year" min="1920" max="2100">
										<span id="errBirth" class="error"></span>
									
									<label> Gender </label>
									<span id="gender">
										<input type="radio" name="gender" id="male" value="male">
										<label id="lbl10" for="male"> Male </label>
									</span>
									
									<span id="gender">
										<input type="radio" name="gender" id="female" value="female">
										<label id="lbl10" for="female">Female</label>
									</span>
									
									<span id="gender">
										<input type="radio" name="gender" id="other" value="other">
										<label id="lbl10" for="other">Other</label>
									</span>
									<span id="errGender" class="error"></span>
															
									<label> Contact Number </label>
									<input type="text" name="contact_number" maxlength="20"/>
									<span id="errContact" class="error"></span>
									
									<p><b>Note:</b> Clicking <em>Submit</em> button means that, you agree to the Artbound <em>Terms of Service</em>, <em>Privacy Policy</em>,
										<em>Copyright Policy</em> and user <em>Guidelines</em>.</p>
									
									<input id="submit1" type="submit" name="submit" value="Submit" onclick=" return validate();" />
							
						</form>
						
					</div>
				
					<div class="subscribe_img">
				
					</div>
				
				</div>
				
				<div class="signed_up">
					<p> Already have an account?</p> 
					<input type="submit" name="sign_in" value="Sign In" onclick="location='sign_in.php'"/>
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