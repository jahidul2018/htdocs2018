<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php include 'inc/header.php'; ?>

<!--nav start-->
<?php include 'inc/navshelter.php'; ?>  

<!--nav end-->
	
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th> Shelter Name</th>
            <th>Type</th>
            <th>price</th>
            <th>Duration</th>
            <th>Locastion</th>
						<th>Photograph</th>
						<th> Operations </th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM shelter";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['id']; ?></th>
						<td><?php echo $r['sheltername']; ?></td>
						
            <td><?php echo $r['sheltertype']; ?></td>
            <td><?php echo $r['price']; ?></td>
            <td><?php echo $r['duration']; ?></td>
            <td><?php echo $r['shelterlocation']; ?></td>
						<td><?php if($r['thumb']){ echo "Yes";}else{echo "No";} ?></td>
						<td><a href="editshelter.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Are you sure you want to Edit?');">Edit</a> | <a href="deletshelter.php?id=<?php echo $r['id']; ?>" onclick="return confirm('Are you sure you want to Remove?');">Delete</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
