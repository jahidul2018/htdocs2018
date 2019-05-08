<?php 
	include("includes/db.php");
	include("functions/functions.php");


	//change 
	/*if(!isset($_SESSION['customer_email']))
	{
		echo "<b>Welcome Guest!</b> <b style='color:yellow'>Shopping Cart</b>";
		
		}
		else {
			
			$c = $_SESSION['customer_email'];
	
	$get_c = "select * from customers where customer_email='$c'";
	
	$run_c = mysqli_query($db, $get_c);
	
	$row_c = mysqli_fetch_array($run_c);
		
	$customer_id = $row_c['customer_id'];

	//change
	
	*/
			//Getting customer ID 
			if(isset($_GET['c_id'])){
				
				$customer_id = $_GET['c_id'];
				
				$c_email = "select * from customers where customer_id='$customer_id'";
				
				$run_email = mysqli_query($con, $c_email); 
				
				$row_email = mysqli_fetch_array($run_email);
				
				$customer_email = $row_email['customer_email'];
				
				$customer_name = $row_email['customer_name'];
				}

			//Getting products price & number of items 

			$ip_add = getRealIpAddr();
					 
					 $total = 0;
				
				$sel_price = "select * from cart where ip_add='$ip_add'";
				
				$run_price = mysqli_query($db, $sel_price); 
				
				$status = 'Pending';
				
				$invoice_no = mt_rand();
				
				$i= 0;
				
				$count_pro = mysqli_num_rows($run_price);
				
				while ($record=mysqli_fetch_array($run_price)){
					
					$pro_id = $record['p_id'];
					
					$pro_price = "select * from products where product_id='$pro_id'";
					
					$run_pro_price = mysqli_query($db,$pro_price); 
					
					while($p_price=mysqli_fetch_array($run_pro_price)){
						
						$product_name = $p_price['product_title'];
						
						$product_price = array($p_price['product_price']);
						
						$values = array_sum($product_price);
						
						$total +=$values;
						
						$i++;
						
						}
					}
			//Getting Quaintity from the cart 

			$get_cart = "select * from cart";

			$run_cart = mysqli_query($con, $get_cart); 

			$get_qty = mysqli_fetch_array($run_cart);

			$qty = $get_qty['qty'];

			if($qty==0){
				
				$qty=1;
				
				$sub_total = $total;
				}
				else {
					
					$qty=$qty;
					
					$sub_total = $total*$qty;
					
					}
					
					 $insert_order = "insert into customer_orders (customer_id, due_amount, invoice_no, total_products, order_date, order_status) values ('$customer_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status')";
					
					$run_order = mysqli_query($con, $insert_order); 

						echo "<script>alert('Order successfully submitted, Thanks!')</script>";
						echo "<script>window.open('customer/my_account.php','_self')</script>";
						
						
						$insert_to_pending_orders = "insert into pending_orders (customer_id, invoice_no, product_id, qty, order_status) values ('$customer_id','$invoice_no','$pro_id','$qty','$status')";
						
						$run_pending_order = mysqli_query($con, $insert_to_pending_orders);
						

						$empty_cart = "delete from cart where ip_add='$ip_add'";
						$run_empty = mysqli_query($con, $empty_cart); 
						
						
			/*
						if(!$run_empty){
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
							$mail->addAddress($customer_email, $customer_name); 
							$mail->isHTML(true);              

							$mail->Subject = 'Order report';
							$mail->Body    = '<h4>Hello '.$customer_name.'...</h4><br/><br/>Thanks .<br/>
							<p>
								Hello dear <b style='color:blue;'>'.$customer_name.'</b> you have ordered some products on our website mysite.com, please find your order details below and pay the dues as soon as possible, so we can proceed your order. Thank you!
							</p>
						
							<table width='600' align='center' bgcolor='#FFCC99' border='2'>
						
								<tr><td><h2>Your Order Details from mysite.com</h2></td></tr>
								
								<tr>
									<th><b>S.N</b></th>
									<th><b>Product Name</b></th>
									<th><b>Quantity</b></th>
									<th><b>Total Price</th></th>
									<th>Invoice No</th>
								</tr>
								
								<tr>
									<td>'.$i.'</td>
									<td>'.$product_name.'</td>
									<td>'.$qty.'</td>
									<td>'.$sub_total.'</td>
									<td>'.$invoice_no.'</td>
								</tr>
						
							</table>
							
							<h3>Please go to your account and pay the dues</h3>
							
							<h2> <a href='http://localhost/My-Shop/MyShop/checkout.php'>Click here</a> to login to your account</h2>
							
							<h3> Thank you for order on - www.upet.com</h3>

							//<br/><a href="http://localhost/artbound/account_activation_mail.php?activation_code=' . $activation_code . '"> http://localhost/artbound/account_activation_mail.php?activation_code=' . $activation_code . '</a>';

							$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

							if(!$mail->send()) {
								
								echo 'Message could not be sent. <br/>';
								echo 'Mailer Error: ' . $mail->ErrorInfo;
							} 
							else {
								header('location: .php');
							}
							
						}

						/*
							$from = 'mysite@academy.com'; 
							
							$subject = 'Order Details'; 
							
							$message = "
							
							<html> 
							<p>
							Hello dear <b style='color:blue;'>$customer_name</b> you have ordered some products on our website mysite.com, please find your order details
							below and pay the dues as soon as possible, so we can proceed your order. Thank you!</p>
							
								<table width='600' align='center' bgcolor='#FFCC99' border='2'>
							
									<tr><td><h2>Your Order Details from mysite.com</h2></td></tr>
									
									<tr>
										<th><b>S.N</b></th>
										<th><b>Product Name</b></th>
										<th><b>Quantity</b></th>
										<th><b>Total Price</th></th>
										<th>Invoice No</th>
									</tr>
									
									<tr>
										<td>$i</td>
										<td>$product_name</td>
										<td>$qty</td>
										<td>$sub_total</td>
										<td>$invoice_no</td>
									</tr>
							
								</table>
								
								<h3>Please go to your account and pay the dues</h3>
								
								<h2> <a href='mysite.com'>Click here</a> to login to your account</h2>
								
								<h3> Thank you for order on - www.MySite.com</h3>
								
							</html>
							
							";
							
							mail($customer_email,$subject,$message,$from);
						
						

			
		}*/
?>

