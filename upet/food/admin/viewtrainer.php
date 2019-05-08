<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php include 'inc/header.php'; ?>

<!--nav start-->
<?php include 'inc/navtrainer.php'; ?>  

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
            <th>Cost</th>
            <th>Year OF Experience</th>
             <th>Course Duration</th>
            <th>Locastion</th>
						<th>Photograph</th>
						<th> Operations </th>
					</tr>
				</thead>
				<tbody>
				<?php 	
					$sql = "SELECT * FROM trainer";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)) {
				?>
					<tr>
						<th scope="row"><?php echo $r['id']; ?></th>
						<td><?php echo $r['tname']; ?></td>
						
            <td><?php echo $r['ttype']; ?></td>
            <td><?php echo $r['tprice']; ?></td>
            <td><?php echo $r['texperinces']; ?></td>
            <td><?php echo $r['courseduration']; ?></td>
            <td><?php echo $r['tlocation']; ?></td>
						<td><?php if($r['thumb']){ echo "Yes";}else{echo "No";} ?></td>
						<td><a href="edittrainer.php?id=<?php echo $r['id']; ?>">Edit</a> | <a href="delettrainer.php?id=<?php echo $r['id']; ?>">Delete</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
