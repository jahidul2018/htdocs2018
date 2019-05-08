<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Strict//EN">

<head>
	<title>Booking confirmation</title>
	
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="main">
<center>
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

<a href="index.html" class="button">Home page</a>
<a href="venue.php" class="button">move to venue</a>
<a href="profile.php" class="button">clear your Booking</a>
<a href="confirmyourbooking.php" class="button">confirm your Booking</a>
<a href="confirmedbycccbs.php" class="button">Confirmed By CCCBS</a>
<a href="logout.php" class="button">Log Out</a>
		
	<h3 class="type3" >booking confirmation</h3>
	
	
<?php 
	
		
		$query="select* from order_product where id='$my_id' and confirm_by_user='2'";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=divbuttom><p class=order>Order Id :".$row['order_product_id']."</p></div>";
					echo"<div class=divbuttom><p class=user>User ID: ".$row['id']."</p></div>";
					echo"<div class=divbuttom><p class=center>Center NO: ".$row['p_id']."</p></div>";
					echo"<div class=divbuttom><p class=order_by>Order by: ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=center_name>Center Name - ".$row['center_name']."</p></div>";
					echo"<div class=divbuttom><p class=delete><a href='confirmyourbooking.php?operation=delete&order_product_id=".$row['order_product_id']."'>CONFIRM</a></p></div>";
					
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
				//delete from database;
				if(isset($_GET['operation'])){
					if($_GET['operation']=="delete"){
						$query="UPDATE order_product SET confirm_by_user='1' where order_product_id=".$_GET['order_product_id'];
							if(mysql_query($query)){
								echo"<center>Recored Confirm!</center>";
								echo"<h1>Your booking has been confirm within 24 Hours !</h1><br />";
								echo"<h1> Customer care will contact you within A day</h1><br />";
		}
			}
				
	}
		
			
		
		
	?>
	
	<?php 
	
		
		$query="select* from order_productdate where id='$my_id' and confirm_by_user='2' ";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=divtop>";
					echo"<div class=divbuttom><p class=order >  odrer id ".$row['order_product_id']."</p> </div>";
					echo"<div class=divbuttom><p class=user_name>  User name - ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=date>".$row['day']."-".$row['month']."-".$row['year']."</p></div>";
				
					echo"<div class=divbuttom><p class=order> Cost : ".$row['t_cost']."</p></div>";
					echo"<div class=divbuttom><p class=center_name>  Center Name - ".$row['center_name']."</p></div>";
					
					
					echo"<div class=divbuttom><p class=order><a href='confirmyourbooking.php?operation=delete&order_product_id=".$row['order_product_id']."'>CONFIRM!</a></p></div>";
					echo"</div>";
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
				//delete from database;
				if(isset($_GET['operation'])){
					if($_GET['operation']=="delete"){
						$query="UPDATE order_productdate SET confirm_by_user='1' where order_product_id=".$_GET['order_product_id'];
							if(mysql_query($query)){
								echo"<center>Recored Confirm!</center>";
								
		}
			}
				
	}
		
			
		
		
	?>
	





	<div id="page-wrap">

		
		
		<br /><br />	
			
		<br /><br />
		
			
		<h1>Confirm your Booking</h1><br />
		
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

	
	
</div>	
</body>

</html>