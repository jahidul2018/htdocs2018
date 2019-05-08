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

<fieldset>	
<a href="index.html" class="button">Home page</a>
<a href="venue.php" class="button">move to venue</a>
<a href="admin.php"  class="button" >Admin pannel</a>
<a href="profile.php" class="button">clear your Booking</a>
<a href="confirmyourbooking.php" class="button">confirm your Booking</a>
<a href="logout.php" class="button">Log Out</a>
		
	<h3 class="type3" >booking confirmation</h3>
	
	
<?php 
	
		
		$query="select* from order_product where confirm_by_user='1' and confirm_by_admin='2' ";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=divbuttom><p class=order>Order Id :".$row['order_product_id']."</p></div>";
					echo"<div class=divbuttom><p class=user>User ID: ".$row['id']."</p></div>";
					echo"<div class=divbuttom><p class=center>Center NO: ".$row['p_id']."</p></div>";
					echo"<div class=divbuttom><p class=order_by>Order by: ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=center_name>Center Name - ".$row['center_name']."</p></div>";
					echo"<div class=divbuttom><p class=delete><a href='orderconfirmbyadmin.php?operation=delete&order_product_id=".$row['order_product_id']."'>CONFIRM</a></p></div>";
					
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
				//delete from database;
				if(isset($_GET['operation'])){
					if($_GET['operation']=="delete"){
						$query="UPDATE order_product SET confirm_by_admin='1' where order_product_id=".$_GET['order_product_id'];
							if(mysql_query($query)){
								echo"<center>Recored Confirm!";
								echo"<h1>Booking has been confirmed !</h1><br />";
								echo"<h1>.</h1><br /></center>";
		}
			}
				
	}
		
			
		
		
	?>
	
	<?php 
	
		
		$query="select* from order_productdate where confirm_by_user='1' and confirm_by_admin='2'";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=divtop>";
					echo"<div class=divbuttom><p class=order >  odrer id ".$row['order_product_id']."</p> </div>";
					echo"<div class=divbuttom><p class=user_name>  User name - ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=date>".$row['day']."-".$row['month']."-".$row['year']."</p></div>";
				
					echo"<div class=divbuttom><p class=order> Cost : ".$row['t_cost']."</p></div>";
					echo"<div class=divbuttom><p class=center_name>  Center Name - ".$row['center_name']."</p></div>";
					
					
					echo"<div class=divbuttom><p class=order><a href='orderconfirmbyadmin.php?operation=delete&order_product_id=".$row['order_product_id']."'>CONFIRM!</a></p></div>";
					echo"</div>";
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
				//delete from database;
				if(isset($_GET['operation'])){
					if($_GET['operation']=="delete"){
						$query="UPDATE order_productdate SET confirm_by_admin='1' where order_product_id=".$_GET['order_product_id'];
							if(mysql_query($query)){
								echo"<center>Recored Confirm!</center>";
								
		}
			}
				
	}
		
			
		
		
	?>
	





	<div id="page-wrap">

		
		
		<br /><br />	
			
		<br /><br />
		
			<center>
		<h1>Admin pannel</h1><br />
		</center>
		<p><a href="index.html">Back to Home</a></p>
	
	</div>
	<p class="type3">you are logged in as <b><?php echo $username; ?></b> and you are a [<?php echo $level_name; ?>]</p>
<center>	
	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
	</script>
	<script type="text/javascript">
	_uacct = "UA-68528-29";
	urchinTracker();
	</script>

	
	
	
</body>

</html>