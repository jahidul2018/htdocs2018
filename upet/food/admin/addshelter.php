<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_POST) & !empty($_POST)){
		$sheltername = mysqli_real_escape_string($connection, $_POST['sheltername']);
		$discription = mysqli_real_escape_string($connection, $_POST['discription']);
		$sheltertype = mysqli_real_escape_string($connection, $_POST['sheltertype']);
		$price = mysqli_real_escape_string($connection, $_POST['price']);
		$duration = mysqli_real_escape_string($connection, $_POST['duration']);
		$shelterlocation = mysqli_real_escape_string($connection, $_POST['shelterlocation']);

			if(isset($_FILES) & !empty($_FILES)){
			$name = $_FILES['productimage']['name'];
			$size = $_FILES['productimage']['size'];
			$type = $_FILES['productimage']['type'];
			$tmp_name = $_FILES['productimage']['tmp_name'];

			$max_size = 10000000;
			$extension = substr($name, strpos($name, '.') + 1);

			if(isset($name) && !empty($name)){
				if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size<=$max_size){
					$location = "uploads/";
					if(move_uploaded_file($tmp_name, $location.$name)){
						//$smsg = "Uploaded Successfully"; 
						echo $sql = "INSERT INTO shelter (sheltername, discription, sheltertype, price, duration, shelterlocation, thumb) VALUES ('$sheltername', '$discription', '$sheltertype', '$price', '$duration', '$shelterlocation', '$location$name')";
						$res = mysqli_query($connection, $sql);
						if($res){
							//echo "Product Created";
							header('location: viewshelter.php');
						}else{
							$fmsg = "Failed to Create Pet";
						}
					}else{
						$fmsg = "Failed to Upload File";
					}
				}else{
					$fmsg = "Only JPG files are allowed and should be less that 1MB";
				}
			}else{
				$fmsg = "Please Select a File";
			}
		}else{

			$sql = "INSERT INTO shelter (sheltername, discription, sheltertype, price, duration, shelterlocation) VALUES ('$sheltername', '$discription', '$sheltertype', '$price', '$duration', '$shelterlocation')";
			$res = mysqli_query($connection, $sql);
			if($res){
				header('location: viewshelter.php');
			}else{
				$fmsg =  "Failed to Create Pet";
			}
		}
	}
?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/navshelter.php'; ?>	


<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>



			<form method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="Productname">Shelter Name</label>
				    <input type="text" class="form-control" name="sheltername" id="Productname" placeholder=" Add Name" required="">
				  </div>

				  <div class="form-group">
				    <label for="productdescription"> Description</label>
				    <textarea class="form-control" name="discription" rows="3" placeholder="shelter Description" required=""></textarea>
				  </div>

				  <div class="form-group">
				    <label for="productcategory">Shelter Type</label>
				    <select class="form-control" id="productcategory" name="sheltertype">
					  <option value="">---SELECT CATEGORY---</option>
					  
						<option value="Cat"> Cat </option>
						<option value="Dog" selected > Dog </option>
						<option value="Dog and Cat"> Dog and Cat </option>	
						<option value="Birds"> Birds </option>
						<option value="Rabbits"> Rabbits </option>
						<option value="Horses"> Horses </option>
						<option value="Small animals"> Small animals </option>
						<option value="Raptiles"> Raptiles </option>
						<option value="Farm type animals"> Farm type animals </option>
						<option value="Any"> Any </option>		
					</select>
				  </div>

				  <div class="form-group">
				    <label for="productprice">shelter Price</label>
				    <input type="number" class="form-control" name="price" id="productprice"  min="1">
				  </div>

				  <div class="form-group">
				    <label for="Productname">Duration</label>
				    <select class="form-control" id="productcategory" name="duration">
					  <option value="">---SELECT CATEGORY---</option>
					  	<option value="A WEEK" selected > A Week </option>
						<option value="Two WEEK"> Two Week </option>
						<option value="THREE WEEK"> Three Week </option>
						<option value="Four WEEK"> Four Week </option>

						<option value="Less Than A Week"> Less than A Week </option>
					</select>	
				  </div>
				  
				  <div class="form-group">
				    <label for="Productname">Location</label>
				    <select class="form-control" id="productcategory" name="shelterlocation">
					  <option value="">---SELECT CATEGORY---</option>
					  
						<option value="Any"> Any </option>
						<option value="Dhaka" selected > Dhaka </option>
						<option value="Mahmudpur">Mahmudpur  </option>
						<option value="Narayanganj"> Narayanganj </option>
						<option value="Dhanmondi"> Dhanmondi </option>
						<option value="keraniganj"> keraniganj </option>
						<option value="lalmatia"> lalmatia </option>
						<option value="chattagram"> chattagram </option>
						<option value="shyamoli"> shyamoli </option>
						<option value="sylhet"> sylhet </option>
					</select>	
				  	</div>

					<div class="clearfix space30"></div>

				  <div class="form-group">
				    <label for="productimage">Shelter Image</label>
				    <input type="file" name="productimage" id="productimage" required="">
				    <p class="help-block">Only jpg are allowed.</p>
				  </div>
				  
				  <button type="submit" class="button btn-lg">Submit</button>

			</form>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
