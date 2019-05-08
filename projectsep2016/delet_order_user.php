
<html>
	<head>
		<title>profile</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="style2.css">
	</head>
<body>
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

<?php 
	if($user_level =2){
		
		$query="select* from order_product where id='$my_id'";

			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_array($result)){
					echo"<div class=divbuttom><p class=button5>Order Id :".$row['order_product_id']."</p></div>";
					echo"<div class=divbuttom><p class=button5>User ID: ".$row['id']."</p></div>";
					echo"<div class=divbuttom><p class=button5>Center NO: ".$row['p_id']."</p></div>";
					echo"<div class=divbuttom><p class=button5>Order by: ".$row['user_name']."</p></div>";
					echo"<div class=divbuttom><p class=button5>Center Name - ".$row['center_name']."</p></div>";
					echo"<div class=divbuttom><p class=button5><a href='delet_order_user.php?operation=delete&order_product_id=".$row['order_product_id']."'>DELETE</a></p></div>";
				}
			}
			else{
				echo"<center >NO Recored Found!</center>";
			}
				//delete from database;
				if(isset($_GET['operation'])){
					if($_GET['operation']=="delete"){
						$query="delete from order_product where order_product_id=".$_GET['order_product_id'];
							if(mysql_query($query)){
								echo"<center>Recored Deleted!</center>";
		}
			}
				
	}
		
			
		
		}
	?>