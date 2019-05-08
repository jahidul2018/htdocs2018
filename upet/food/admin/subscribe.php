<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						
						<th>Customer id</th>
						<th>Customer Email</th>
						<th>Customer From</th>
						
						<th>send news</th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM subscribe";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['id']; ?></th>
						<td><?php echo $r['Email']; ?></td>
						
						<td><?php echo $r['timestamp']; ?></td>
						<td><a href="newssend.php?Email=<?php echo $r['Email']; ?>" onclick="return confirm('An Email has been Send to client Email');">By Email</a></td>
						
				<?php } ?>
				</tbody>
			</table>
			<br><br><br><br><br><br><br><br><br><br><br>
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
