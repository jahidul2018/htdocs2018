<html>
<head>
<title>Admin Pannel</title>
<link rel="stylesheet" href="style.css">

<meta charset="utf-8">
</head>
<body>
<?php
		$url1=$_SERVER['REQUEST_URI'];
		header("Refresh: 5; URL=$url1");
	?>
	
<?php include 'connect.php'; ?>

<?php include 'function.php'; ?>
  
<!--<?php include 'title_bar.php'; ?> -->

<?php
if($_SESSION['user_id']!=true)
{
	echo"<p>Invalid loging !<br/></p>";
	echo "<a href='login.html' > Try again</a>";

	}
 ?>	
 
 
<?php 
if($user_level !=1){
	header('location: login.html');
	}
?>
<div class="main">
<fieldset>	
<a href="index.html" class="button">Home page</a>
<a href="venue.php" class="button">move to venue</a>
<a href="admin.php"  class="button" >Admin pannel</a>
<a href="profile.php" class="button">clear your Booking</a>
<a href="confirmyourbooking.php" class="button">confirm your Booking</a>
<a href="logout.php" class="button">Log Out</a>
		
	<h3 class="type3" >booking confirmation</h3>
	


<center>
<p>Click the button to print the current page.</p>
<button onclick="myFunction()" class="refe">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script>
	</center>
<div class="">
	<?php 
	
		
		$query="select* from users where user_level='2'";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=userdetails1>";
					echo"<div class=><p >user name :".$row['username']."</p></div>";
					echo"<div class=><p >User ID: ".$row['id']."</p></div>";
					echo"<div class=><p >first_name: ".$row['first_name']."</p></div>";
					echo"<div class=><p >last_name: ".$row['last_name']."</p></div>";
					echo"<div class=><p >email: ".$row['email']."</p></div>";
					echo"<div class=><p >phone number: ".$row['phonenumber']."</p></div>";
					echo"<div ><p >location: ".$row['location']."</p></div>";
					
			
					echo"<div class=><p class=> CONFIRM</p></div>";
					echo"</div>";
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
			
	?>	
		<h3>ALL confirm booking</h3>
<?php 
	
		
		$query="select* from order_product where confirm_by_user='1' and confirm_by_admin='1'";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					
					echo"<div class=divbuttom><p class=order>Order Id :".$row['order_product_id']."</p></div>";
					echo"<div class=divbuttom><p class=user>User ID: ".$row['id']."</p></div>";
					echo"<div class=divbuttom><p class=center>Center NO: ".$row['p_id']."</p></div>";
					echo"<div class=divbuttom><p class=order_by>Order by: ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=center_name>Center Name - ".$row['center_name']."</p></div>";
					echo"<div class=divbuttom><p class=delete> CONFIRM</p></div>";
					
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
	?>	
	
	<?php 
	
		
		$query="select* from order_productdate where confirm_by_user='1' and confirm_by_admin='1'";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=divtop>";
					echo"<div class=divbuttom><p class=order >  odrer id ".$row['order_product_id']."</p> </div>";
					echo"<div class=divbuttom><p class=user_name>  User name - ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=date>".$row['day']."-".$row['month']."-".$row['year']."</p></div>";
				
					echo"<div class=divbuttom><p class=order> Cost : ".$row['t_cost']."</p></div>";
					echo"<div class=divbuttom><p class=center_name>  Center Name - ".$row['center_name']."</p></div>";
					
					
				echo"<div class=divbuttom><p class=order>CONFIRM!</p></div>";
					echo"</div>";
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
	?>
	
</div>	


</div>