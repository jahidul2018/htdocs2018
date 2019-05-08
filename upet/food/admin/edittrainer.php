<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_GET) & !empty($_GET)){
		$id = $_GET['id'];
	}else{
		header('location: viewtrainer.php');
	}

if(isset($_POST) & !empty($_POST)){
		$sheltername = mysqli_real_escape_string($connection, $_POST['tname']);
		$discription = mysqli_real_escape_string($connection, $_POST['tdescription']);
		$sheltertype = mysqli_real_escape_string($connection, $_POST['ttype']);
		$courseduration = mysqli_real_escape_string($connection, $_POST['courseduration']);
		$price = mysqli_real_escape_string($connection, $_POST['tprice']);
		$duration = mysqli_real_escape_string($connection, $_POST['texperinces']);
		$shelterlocation = mysqli_real_escape_string($connection, $_POST['tlocation']);

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
					$filepath = $location.$name;
					if(move_uploaded_file($tmp_name, $filepath)){
						$smsg = "Uploaded Successfully";
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
			$filepath = $_POST['filepath'];
		}	

		$sql = "UPDATE trainer SET tname='$sheltername', tdescription='$discription', ttype='$sheltertype', courseduration='$courseduration', tprice='$price', texperinces='$duration', tlocation='$shelterlocation', thumb='$filepath' WHERE id = $id";
		$res = mysqli_query($connection, $sql);
		if($res){
			$smsg = "Trainer  Updated";
		}else{
			$fmsg = "Failed to Update Trainer";
		}
	}
?>
<?php include 'inc/header.php'; ?>
<!--nav start-->
<?php include 'inc/navtrainer.php'; ?>  
<!--nav end-->

<!--sectin start-->	

<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
		<!--data coolect-->
			<?php 	
				$sql = "SELECT * FROM trainer WHERE id=$id";
				$res = mysqli_query($connection, $sql); 
				$r = mysqli_fetch_assoc($res); 
			?>
			<!--end of query-->
			<!--Start form-->
				<form method="post" enctype="multipart/form-data">
				  <div class="form-group">
				  	<input type="hidden" name="filepath" value="<?php echo $r['thumb']; ?>">
				    <label for="Productname">Trainer Name</label>
				    <input type="text" class="form-control" name="tname" id="Productname" value="<?php echo $r['tname']; ?>">
				  </div>

				  <div class="form-group">
				    <label for="productdescription"> Description</label>
				    <textarea class="form-control" name="tdescription" rows="3" ><?php echo $r['tdescription']; ?></textarea>
				  </div>

				  <div class="form-group">
				    <label for="productcategory"> Experience IN</label>
				    <select class="form-control" id="productcategory" name="ttype">
					 <option value="<?php echo $r['ttype']; ?>"> <?php echo $r['ttype']; ?> </option>
					  
						<option value="Cat"> Cat </option>
						<option value="Dog" > Dog </option>
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
				    <label for="productcategory"> Course Duration</label>
				    <select class="form-control" id="productcategory" name="courseduration">
					   <option value="<?php echo $r['courseduration']; ?>"> <?php echo $r['courseduration']; ?> </option>
					  	<option value="One Month"> One Month </option>
						<option value="Two Month"> Two Month </option>
						<option value="THREE Month"> Three Month </option>
						<option value="Four Month"> Four Month </option>
						<option value="More than Five Month"> More than Five Month </option>
						<option value="More than Ten Month"> More than Ten Month </option>
					</select>
				  </div>

				  <div class="form-group">
				    <label for="productprice"> Cost</label>
				    <input type="number" class="form-control" name="tprice" id="productprice"  min="1" value="<?php echo $r['tprice']; ?>">
				  </div>

				  <div class="form-group">
				    <label for="Productname"> Year of working</label>
				    <select class="form-control" id="productcategory" name="texperinces">
					 <option value="<?php echo $r['texperinces']; ?>"> <?php echo $r['texperinces']; ?> </option>
					  	<option value="A Year" > One year</option>
						<option value="Two Year"> Two year </option>
						<option value="THREE Year"> Three Year </option>
						<option value="Four Year"> Four Year </option>
						<option value="More than Five Year "> More than Five Year </option>
						<option value="More than Ten Year"> More than Ten Year </option>
					</select>	
				  </div>
				  
				  <div class="form-group">
				    <label for="Productname">Location</label>
				    <select class="form-control" id="productcategory" name="tlocation">
					  
					  <option value="<?php echo $r['tlocation']; ?>"> <?php echo $r['tlocation']; ?> </option>
						<option value="Any"> Any </option>
						<option value="Dhaka" > Dhaka </option>
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
			    <label for="productimage"> Image</label>
			    <?php if(isset($r['thumb']) & !empty($r['thumb'])){ ?>
			    <br>
			    	<img src="<?php echo $r['thumb'] ?>" widht="100px" height="100px">
			    	<a href="delettrainerimage.php?id=<?php echo $r['id']; ?>">Delete Image</a>
			    <?php }else{ ?>
			    <input type="file" name="productimage" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			    <?php } ?>
			  </div> 
				  
				  <button type="submit" class="button btn-lg">Submit</button>

			</form>

			<!--End form-->
	
		</div>
	</div>

</section>
<!--saction end-->
<!--footer start-->
<?php include 'inc/footer.php' ?>
<!--footer end-->