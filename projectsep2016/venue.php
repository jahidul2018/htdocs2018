
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

 
 <div class="main">
<fieldset>
<div class="post_body">
<div class=" refe">
<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="LOOKING FOR NEW VENEU" class=" refe  ">
</FORM>
</div>
<?php 

include('connect.php');

$query ="select * from venue where post_availality='1' ORDER BY RAND()
LIMIT 10 ";

$run=mysql_query($query);

while($row=mysql_fetch_array($run)){  
	$post_id=$row['p_id'];
	
	
	$title=$row['post_name'];
	$price=$row['post_price'];
	
	$image=$row['post_image'];
	$content=$row['post_content'];
	
?>


<head>
	<title>venue</title>
	<link rel="stylesheet" href="style.css" />
	<meta http-equiv="content-type" content="text/html;charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div class="row"> 
	  <div class="type"> <div class="type3"><span>Venue Type : </span><?php echo $title; ?></div></div>
		 
		 <div class="image"><div class="image2"><img src="images/<?php echo $image; ?>" alt="image" title=""  width='454' height='200'></div> </div>
	<div class="box"> 

		 <div class="description">
				<?php echo $content ;?>    
			
			 <div class="reservation-btn">
			  <ul>
				<li><a class="btn dafault-btn view-more-btn" href="booked.php?id=<?php echo $post_id;?>"> View More</a></li>
				<li> <a  class="btn dafult-btn book-now" href="booked.php?id=<?php echo $post_id;?>"> Book Now</a></li>
				<li> <a  class="btn dafult-btn book-now" href="index.html"> Home Page</a></li>
			  </ul>
			 </div> 

		  </div>
		
	</div> 
</div>

<?php	
}
?>

<p class="type3">you are logged in as <b><?php echo $username; ?></b> and you are a [<?php echo $level_name; ?>]</p>
</div>
</fieldset>
</div>