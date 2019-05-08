


<head>
	<title>venue</title>
	<link rel="stylesheet" href="style.css" />
	<meta http-equiv="content-type" content="text/html;charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php include ('connect.php'); ?>

<?php include ('function.php'); ?>
<?php
if($_SESSION['user_id']!=true)
{
	echo"<p>Invalid loging !<br/></p>";
	echo "<a href='login.html' > Try again</a>";
header('location: login.html');
	}
 ?>	

 <body>
<div class="main">
<fieldset>

<div class="post_body2">

<?php 

	include('connect.php');

	$page_id=$_GET['id'];
		   
		$query ="select * from venue where p_id='$page_id'";

		$run=mysql_query($query);
			while($row=mysql_fetch_array($run)){  
			
				$title=$row['post_name'];
				$price=$row['post_price'];
				$capasity=$row['post_capasity'];
				$sqfeet=$row['post_sqfeet'];
				$image=$row['post_image'];
				$content=$row['post_content'];
				$date=$row['post_available_date'];
				$time=$row['post_available_time'];
				$status=$row['post_status'];
				$sesson=$row['post_sesson'];
			
			}
?>



	  <div class="type"> <div class="button2"><center><span>Venue Type : </span><?php echo $title; ?></center></div></div>
		 
		 <div class="imagebooked" ><div class="image2"><center><img src="images/<?php echo $image; ?>" alt="image" title=""  width='700' height='300'></center></div> </div>
		 <div class="content2">
			<div class="">
			<p class="button3"> Booking Price:<?php echo $price;?> TK</p>
				<p class="button3">Venue Capability:<?php echo $capasity;?></p>
					<p class="button3">Squire feet: <?php echo $sqfeet;?></p> 
						<p class="button3">Available Date:<?php echo $date;?></p> 
							<p class="button3">Available Time:<?php echo $time;?></p> 
								<p class="button3">Status:<?php echo $status;?></p> 
									<p class="button3">Session:<?php echo $sesson;?></p> 
			</div>
		 </div>
	<div class="boxbooked"> 

		 <div class="descriptionbooked">
				<?php echo $content;?>    
			<div>
			<?php echo $price;?>
				<?php echo $capasity;?>
					<?php echo $sqfeet;?>
						<?php echo $date;?>
							<?php echo $time;?>
								<?php echo $status;?>
									<?php echo $sesson;?> 
			</div>
			 <div class="reservation-btn" id='bookedres'>
			  <ul>
			  
				<li><a class="button4" href="venue.php">Previous Page</a></li>
				<li class="input">
				
				 <?php 
						$my_id=$_SESSION['user_id'];	
						$user_query= mysql_query("select username,user_level from users where id='$my_id'");	
						$run_user= mysql_fetch_array($user_query);
						$username =$run_user['username'];
							
							
				?>
					<!--order form-->
						<form action="booked_action.php" method="post">
							
								 <input type="hidden" name="id" value="<?php echo $my_id;?>">
								 <input type="hidden" name="user_name" value=" <?php echo $username;?>">
								 <input type="hidden" name="p_id" value="<?php echo $page_id;?>">
								 <input type="hidden" name="post_price" value="<?php echo $price;?>">
								 <input type="hidden" name="center_name" value="<?php echo $title;?>">
								 <input type="hidden" name="insert" value="yes"/>
								 <input type="submit" class="button4" value="Book Now" onclick="ero()">
							
						</form>
					<!--form clocsed-->  
					
				</li>

			  </ul>
			 </div> 

		  </div>
		
		</div> 
	
</div>

<p class="type3">you are logged in as <b><?php echo $username; ?></b> and you are a [<?php echo $level_name; ?>]</p>

<fieldset>
</div>

 </body>