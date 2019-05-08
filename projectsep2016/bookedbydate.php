


 <head>
	<title>Booked by date</title>
	<link rel="stylesheet" href="style.css" />
	<meta http-equiv="content-type" content="text/html;charset=utf-8" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div class="main">	
<div class="post_body">

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
	<?php 
		$my_id=$_SESSION['user_id'];	
		$user_query= mysql_query("select username,user_level from users where id='$my_id'");	
		$run_user= mysql_fetch_array($user_query);
		$username =$run_user['username'];
							
							
	?>

<div class="booknow">
<FORM>
<INPUT TYPE="button" onClick="history.go(0)" VALUE="Looking For New Date" class="button8 ">
</FORM>
</div>
<hr>
<hr>
<?php 

include('connect.php');

$query ="select * from date where post_availality='1' ORDER BY RAND()
LIMIT 5 ";

$run=mysql_query($query);

while($row=mysql_fetch_array($run)){  
	$dateid=$row['dateid'];
	
	
	$day=$row['day'];
	$month=$row['month'];
	
	$year=$row['year'];
	$time=$row['time'];
	$cost=$row['cost'];
	$session=$row['session'];
	$venue_name=$row['venue_name'];
	
?>

<div class=""> 
<div class="button7"><p class="button7"><?php echo $day; ?></p></div><div class="button7" ><p div class="button7"><?php echo $month; ?></p></div><div class="button7"><p class="button7"><?php echo $year; ?></p></div>&nbsp; &nbsp; &nbsp;
<div class="button6" ><p div class="button6"><?php echo $time; ?></p></div><div class="button6" ><p div class="button6"><?php echo $session; ?></p></div><div class="button6" ><p div class="button6"><?php echo $cost; ?> TK/</p></div>
<div class="button6" ><p div class="booknow"><?php echo $venue_name; ?></p></div>&nbsp; &nbsp; &nbsp; &nbsp; 
	<div class="button8" ><!--<p div class="button8">Booked Now</p>-->
	<!--order form-->
		<form action="bookedbydate_action.php" method="post">
							
		 <input type="hidden" name="id" value="<?php echo $my_id;?>">
		 <input type="hidden" name="user_name" value=" <?php echo $username;?>">
		 <input type="hidden" name="dateid" value="<?php echo $dateid;?>">
		 <input type="hidden" name="cost" value="<?php echo $cost;?>">
		  <input type="hidden" name="venue" value="<?php echo $venue_name;?>">
		 <input type="hidden" name="day" value="<?php echo $day;?>">
		 <input type="hidden" name="month" value="<?php echo $month;?>">
		 <input type="hidden" name="year" value="<?php echo $year;?>">
		 <input type="hidden" name="insert" value="yes"/>
		 <input type="submit" class="button8 " value="Book Now" onclick="ero()">
	
	</form>
					<!--form clocsed-->  </div>
</div>
<hr>
<hr>
<?php	
}
?>

<p class="type3">you are logged in as <b><?php echo $username; ?></b> and you are a [<?php echo $level_name; ?>]</p>
</div>
</div>