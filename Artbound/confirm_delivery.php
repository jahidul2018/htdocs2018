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


		if(isset($_GET["auction_id"])){
				$auction_id = $_GET["auction_id"];
		}
				
		$query = "Select * From Auction Where AuctionID = '$auction_id'" or die("Not Found");
		$result = mysql_query($query, $connect) or die("Query didn't work");
		$rows=mysql_num_rows($result);
				
		if($rows == 1){
			while($fetch=mysql_fetch_assoc($result)){
					$art_id=$fetch['ArtID'];
					$artist_id=$fetch['UserID'];
						
			}
		}
		
		
		$query = "Select * From Art Where ArtID = '$art_id'" or die("Not Found");
		$result = mysql_query($query, $connect) or die("Query didn't work");
		$rows=mysql_num_rows($result);
				
		if($rows == 1){
			while($fetch=mysql_fetch_assoc($result)){
					$art_name=$fetch['ArtName'];	
			}
		}
		
		
		$query = "Select * From Users Where UserID = '$artist_id'" or die("Not Found");
		$result = mysql_query($query, $connect) or die("Query didn't work");
		$rows=mysql_num_rows($result);
				
		if($rows == 1){
			while($fetch=mysql_fetch_assoc($result)){
					$first_name=$fetch['FirstName'];	
					$last_name=$fetch['LastName'];	
			}
		}
		
		
		$query=mysql_query("SELECT MAX(BidAmount) AS highest_bid FROM bid WHERE ArtID='$art_id'");
		$row=mysql_fetch_array($query);
		$h_bid=$row['highest_bid'];
						
		$query = mysql_query("SELECT UserName as highest_bidder FROM bid WHERE ArtID='$art_id' AND BidAmount='$h_bid'");
		$row = mysql_fetch_array($query);
		$highest_bidder = $row['highest_bidder'];
		
		
		$query = "Select * From Users Where UserName = '$highest_bidder'" or die("Not Found");
		$result = mysql_query($query, $connect) or die("Query didn't work");
		$rows=mysql_num_rows($result);
				
		if($rows == 1){
			while($fetch=mysql_fetch_assoc($result)){
					$user_id = $fetch['UserID'];
					$contact_number = $fetch['ContactNumber'];
					$winner_name = $fetch['UserName'];
			}
		}
		
		
		$query = "Select * From credit_card Where UserID = '$user_id'" or die("Not Found");
		$result = mysql_query($query, $connect) or die("Query didn't work");
		$rows=mysql_num_rows($result);
				
		if($rows == 1){
			while($fetch=mysql_fetch_assoc($result)){
					$card_type=$fetch['CardType'];	
					$card_number=$fetch['CardNumber'];	
			}
		}
		
		
		$u_mail = "artbound.xplorer@gmail.com";

?>


<html>
<head>
	<title>Confirm Delivery</title>
	<link href="CSS/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>

	<div id="confirm_delivery">
		<h1>Confirm Delivery</h1>
		<hr/>
		
		<div id="g_info">
				<label>Art Name</label> <p> : <?php echo $art_name; ?></p><br/>
				<label>Artist Name</label> <p> : <?php echo $first_name." ".$last_name; ?></p><br/>
				<label>Amount You Placed</label> <p> : <?php echo $h_bid; ?></p><br/>
				<?php 
					if($card_type =="visa" || $card_type=="master card" || $card_type=="american express")
					{
				?>
				<label>Card Info</label> <p> : <?php echo $card_type.", ".$card_number; ?></p><br/>
				<?php
					} 
				?>
				<?php 
					if($card_type =="payoneer" || $card_type=="paypal" || $card_type=="payza")
					{
				?>
				<label>Card Info</label> <p> : <?php echo $card_type; ?></p><br/>
				<?php
					} 
				?>
				<label>Contact Number</label> <p> : <?php echo $contact_number; ?></p><br/>
				
		</div>
		
		<form method="post" name="DeliveryConfirm" >
		
			<label>Billing Address</label>
			<input id="b_add" type="text" name="billing_address" maxlength="100" placeholder="fill up carefully; maxlength:100" required /><br/>
			<label>Shipping Address</label>
			<input id="s_add" type="text" name="shipping_address" maxlength="100" placeholder="fill up carefully; maxlength:100" required /><br/>
			
			<input id="agreement" type="checkbox" required /><p>I Agree to the Artbound's Terms of Service<p/><br/>
			
			<input id="con_add" name="confirm" type="submit" value="Confirm"/>
			
			
			
			<?php
							
				if(isset($_POST["confirm"])){
						$confirm_date = date("Y-m-d");
						$receiving_date = date('Y-m-d', strtotime($confirm_date. ' + 2 days'));
						$billing_address = $_POST["billing_address"];
						$shipping_address = $_POST["shipping_address"];
						$not_paid = "Not Paid";
								
						$query = "INSERT INTO auction_winner(AuctionID, WinnerID, ArtistID, ArtID, BillingAddress, ShippingAddress, ConfirmationDate, ReceivingDate, AmountToBePaid, PaymentStatus) VALUES('$auction_id', '$user_id', '$artist_id', '$art_id', '$billing_address', '$shipping_address', '$confirm_date', '$receiving_date', '$h_bid', '$not_paid')";
						$result = mysql_query($query, $connect);
								
						if(!$result){
								echo "ERROR:".mysql_error();
						}
						
						else{
							
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
							$mail->addAddress($u_mail, 'Admin'); 
							$mail->isHTML(true);              

							$mail->Subject = 'Order report';
							$mail->Body    = '<h4>Hello Admin...</h4><br/><br/> <em>'.$winner_name.'</em> has placed his address for the shipment of artwork <em>'.$art_name.'</em>.<br/><br/>You are permitted to cut '.$h_bid.' BDT from his account.';
							$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

							if(!$mail->send()) {
															
									echo 'Message could not be sent. <br/>';
									echo 'Mailer Error: ' . $mail->ErrorInfo;
							}
							
							else{
								
								echo "<script type='text/javascript'>
												alert('Thank You... You will receive your property within next 3 business day');
												window.location='home.php';
									 </script>";
								
							}
					
						}
							
							
				}
							
			?>
			
		</form>
		
	
		
	</div>
	
	<div class="copyright3">
		<p>&copy; 2016 Artbound. All rights reserved | Powered by Pritom Chakraborty</p>
	</div>
				
</body>
</html>




