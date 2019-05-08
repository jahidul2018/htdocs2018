<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php 

	/*if(isset($_GET['u_id']) & !empty($_GET['u_id'])){
		$u_id =$_GET['u_id'];
	}
	if(isset($_GET['type']) & !empty($_GET['type'])){
		$type =$_GET['type'];
	}
	
	if($type ==1 ){
		mysql_query("update users set Active=0 where id='$u_id'");
		header('location: login.php');
	}else if($type ==0){
		mysql_query("update users set Active=1 where id='$u_id'");
		header('location: login.php');
	}*/
?> 
		
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Customer Name</th>
						<th>Customer Mobile</th>
						<th>Customer Email</th>
						<th>Join Date &amp; Time</th>
						<!-- <th>operation</th> -->
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM users u JOIN usersmeta u1 WHERE u.id=u1.uid";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th></th>
						<!-- <th scope="row"><?php echo $r['uid']; ?></th> -->
						<td><?php echo $r['firstname'] . " " . $r['lastname']; ?></td>
						<td><?php echo $r['mobile']; ?></td>
						<td><?php echo $r['email']; ?></td>
						<td><?php echo $r['timestamp']; ?></td>
						<td>

							<?php 

						/*$u_id=$r['uid']; $u_type=$r['Active'];

							if($u_type==1){

								echo "<a href='customers.php?u_id=$u_id&type=$u_type' >Deactivate</a>";
								}
								else{
								echo "<a href='customers.php?u_id=$u_id&type=$u_type' >Activate</a>";
									}*/
							?>
	
						</td>
						
				<?php } ?>
				</tbody>
			</table>
			<br><br><br><br>
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
