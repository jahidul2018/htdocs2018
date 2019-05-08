<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="style2.css">
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>
<?php
		$url1=$_SERVER['REQUEST_URI'];
		header("Refresh: 500; URL=$url1");
	?>
	
	<?php include 'connect.php'; ?>

	<?php include 'function.php'; ?>
	  
	<!--<center><?php include 'title_bar.php'; ?> </center>-->

	<?php
	if($_SESSION['user_id']!=true)
	{
		echo"<p>Invalid loging !<br/></p>";
		echo "<a href='login.html' > Try again</a>";
			header('location: index.html');
		}
	?>	
<body>

	<div id="page-wrap">

		<p id="header">INVOICE</p>
		
		<div id="identity">
		
            <p id="address">64/A, 1st floor,
Shajahan Rd, Dhaka 1207
Phone:01681805060

Hours: Open today · 8AM–12PM</p>

		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <p id="customer-title"> COMMUNITY CONFERENCE CENTER BOOKING SYSTEM
</p>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">80000.00tk</div></td>
                </tr>

            </table>
		
		</div>
	<div class="main">	


		
	<h3 class="type3" >Booking Confirmation</h3>


	<p class="type3">Your Name : <b><?php echo $username; ?></b> And You Are a [<?php echo $level_name; ?>]</p>

	<p>
	<?php
	
	if($user_level==1){
	echo " <center><P>#######################</P><h1><a href='admin.php'>ADMIN PANNEL</a></h1></center>";	

		}
	?>
	</p>
	
	<center>

<button onclick="myFunction()" class="refe">Print  Copy</button>

<script>
function myFunction() {
    window.print();
}
</script>
	</center>
<?php 
	
		
		$query="select* from order_product where id='$my_id' and confirm_by_user='1' and confirm_by_admin='1'";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					
					echo"<div class=divbuttom><p class=order>Order Id :".$row['order_product_id']."</p></div>";
					echo"<div class=divbuttom><p class=user>User ID: ".$row['id']."</p></div>";
					echo"<div class=divbuttom><p class=center>Center NO: ".$row['p_id']."</p></div>";
					echo"<div class=divbuttom><p class=order_by>Order by: ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=center_name>Center Name - ".$row['center_name']."</p></div>";
					echo"<div class=divbuttom><p class=order> CONFIRMED </p></div>";
					
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
				
		
	?>
	
	<?php 
	
		
		$query="select* from order_productdate where id='$my_id' and confirm_by_user='1' and confirm_by_admin='1'";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=divtop>";
					echo"<div class=divbuttom><p class=order >  odrer id ".$row['order_product_id']."</p> </div>";
					echo"<div class=divbuttom><p class=user_name>  User name - ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=date>".$row['day']."-".$row['month']."-".$row['year']."</p></div>";
				
					echo"<div class=divbuttom><p class=order>Cost : ".$row['t_cost']."</p></div>";
					echo"<div class=divbuttom><p class=center_name>  Center Name - ".$row['center_name']."</p></div>";
					
					
				echo"<div class=divbuttom><p class=order> CONFIRMED </p></div>";
					echo"</div><br />";
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
				
		
			
		
		
	?>
	<h1></h1>
	
	<div class="userinformation" >
	<?php 
	
		
		$query="select* from users where user_level='2' and id='$my_id' ";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=userdetails>";
					echo"<h2>Your Information</h2>";
					echo"<div class=><h3 >Your name :".$row['username']."</h3></div>";
					echo"<div class=><h3 >User ID: ".$row['id']."</h3></div>";
					echo"<div class=><h3 >First Name: ".$row['first_name']."</h3></div>";
					echo"<div class=><h3 >Last Name: ".$row['last_name']."</h3></div>";
					echo"<div class=><h3 >Email: ".$row['email']."</h3></div>";
					echo"<div class=><h3 >Phone Number: ".$row['phonenumber']."</h3></div>";
					echo"<div ><h3 >Location: ".$row['location']."</h3></div>";
					
			
					
					echo"</div><br />";
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
			
	?></div>		
	
	<h1>Contact Information </h1>
	<h3>Address: 164/A, 1st floor,</h3>
	<h3>Shajahan Rd, Dhaka 1207</h3>
	<h3>Phone:01681805060</h3>
    <h3>Hours: Open today · 8AM–12PM </h3>
	
	<br /><br /><br /><br />
		<br /><br /><br /><br />	<br /><br /><br /><br />
	
<br /><div><a href="index.html" >Back to Home</a><a href="logout.php" > Or Log Out</a></div>
</body>
</html>	
		
		<div id="terms">
		  <h5>Terms</h5>
		  
		</div>
	
	</div>
	
</body>

</html>