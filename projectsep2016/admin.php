<html>
<head>
<title>Admin Pannel</title>
<link rel="stylesheet" href="style.css">

<meta charset="utf-8">
</head>
<body>
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

<div class="container">
	<section id="content">
	<a href="index.html" class="button">Home page</a>
<a href="venue.php" class="button">move to venue</a>
<a href="profile.php" class="button">clear your Booking</a>
<a href="#" class="button">confirm your Booking</a>
<a href="logout.php" class="button">Log Out</a>

    <h1 class="type2" ><a href="admin.php" >Admin panel</a></h1>
	
    
    
      
<!-- <a href='#' class="type2" >Update Venue Information </a> -->
      
      <br > 
     
     <a href="confirmation.php" class="type2">Final confirmed order</a>
        
        <br >
      
       <a href="orderconfirmbyadmin.php" class="type2">See all Confirm booking by user </a>
       <br >
          

     <a href="seeallbooking.php" class="type2">See All Requested booking </a>
       
      
      <br >
        <a href='admin.php?type=user' class="type2">User setting</a>
		
		<?php 
if(isset($_GET['type']) &&!empty($_GET['type'])){
?>
<center>	
<table>
<tr><td width='150px'>User Name</td><td>Options</td></tr>
<?php 
$list_query=mysql_query("select id,username,type from users where user_level='2'");
while($run_list=mysql_fetch_array($list_query)){
	$u_id=$run_list['id'];
	$u_username=$run_list['username'];
	$u_type=$run_list['type'];
	
	
	
?>
<tr><td><?php echo $u_username?></td>
<td>
<?php 
if($u_type=='a'){
	echo "<a href='option.php?u_id=$u_id&type=$u_type' >Deactivate</a>";
	}
	else{
	echo "<a href='option.php?u_id=$u_id&type=$u_type' >Activate</a>";
		}
?>

</td>

<?php
}
?>
</table>
</center>	
<?php	
} else{
	echo "select option above !";
	
	
}
	
?>

		</div><!-- button -->
        	</section><!-- content -->
</div><!-- container -->
</fieldset>

</p>

</body>
</html>