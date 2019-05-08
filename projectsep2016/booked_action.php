


<head>
	<title>venue</title>
	<link rel="stylesheet" href="style.css" />
	<meta http-equiv="content-type" content="text/html;charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>








	<script>
		function ero() {
		alert(" order confirm ");
		}
		
	</script>
	<?php include 'connect.php'; ?>

	<?php include 'function.php'; ?>
	  
	<!--<center><?php include 'title_bar.php'; ?> </center>-->

	<?php
	if($_SESSION['user_id']!=true)
	{
		echo"<p>Invalid loging !<br/></p>";
		echo "<a href='login.html' > Try again</a>";
			header('location: index.php');
		}
	?>								
	
	<a href="index.html" class="button">Home page</a>
<a href="venue.php" class="button">move to venue</a>
<a href="profile.php" class="button">clear your Booking</a>
<a href="confirmyourbooking.php" class="button">confirm your Booking</a>
<a href="logout.php" class="button">Log Out</a>

<p class="type3">you are logged in as <b><?php echo $username; ?></b> and you are a [<?php echo $level_name; ?>]</p>
    <?php
	
	
	
	if(isset($_POST["insert"])){
		if($_POST["insert"]=="yes"){

			
			
			$page_id=$_POST["p_id"];
			$id=$_POST["id"];
			$price=$_POST['post_price'];
			$user_name=$_POST['user_name'];
			$center_name=$_POST['center_name'];
			$query="insert into order_product(p_id,id,t_cost,user_name,center_name,confirm_by_admin,confirm_by_user) 
			values('$page_id','$id','$price','$user_name','$center_name',2,2)";
			$result=mysql_query($query);
			if($result)
			{
				
				echo"<p class=type3>Your request is accepted<br /></p>";
			
				
			}
			else{
				echo mysql_error();
			}
		}

	}

?>
