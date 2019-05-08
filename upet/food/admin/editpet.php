<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}

	if(isset($_GET) & !empty($_GET)){
		$id = $_GET['id'];
	}else{
		header('location: pet.php');
	}

if(isset($_POST) & !empty($_POST)){
		$prodname = mysqli_real_escape_string($connection, $_POST['petname']);
		$description = mysqli_real_escape_string($connection, $_POST['petdescription']);
		$category = mysqli_real_escape_string($connection, $_POST['petcategory']);
		$gender = mysqli_real_escape_string($connection, $_POST['gender']);
		$age = mysqli_real_escape_string($connection, $_POST['age']);
		$trained = mysqli_real_escape_string($connection, $_POST['trained']);

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

		$sql = "UPDATE pets SET petname='$prodname', petdescription='$description', petcategory='$category', gender='$gender', age='$age', trained='$trained', thumb='$filepath' WHERE id = $id";
		$res = mysqli_query($connection, $sql);
		if($res){
			$smsg = "Pet Updated";
		}else{
			$fmsg = "Failed to Update Pet";
		}
	}
?>
<?php include 'inc/header.php'; ?>
<!--nav start-->
<div class="menu-wrap">
        <div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
        <ul class="sf-menu">
          <li>
            <a href="index.php">Dashboard</a>
          </li>
          <!-- <li>
            <a href="#">Categories</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="categories.php">View Categories</a></li>
              <li><a href="addcategory.php">Add Category</a></li>
            </ul>
          </li> -->
          <li>
            <a href="#">Pet</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="pet.php">View Pet</a></li>
              <li><a href="addpets.php">Add Pet</a></li>
            </ul>
          </li>

          <li>
            <a href="#">Adoption Request</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="orders.php">View Request</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Customers info</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="customers.php">View Customers</a></li>
              <li><a href="reviews.php">View Reviews</a></li>
            </ul>
          </li>
          <li>
            <a href="#">My Account</a>
            <div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
            <ul>
              <li><a href="">Edit Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      <!--  <div class="header-xtra">
          <div class="s-cart">
            <div class="sc-ico"><i class="fa fa-shopping-cart"></i><em>2</em></div>

            <div class="cart-info">
              <small>You have <em class="highlight">2 item(s)</em> in your shopping bag</small>
              <br>
              <br>
              <div class="ci-item">
                <img src="images/shop/2.jpg" width="70" alt=""/>
                <div class="ci-item-info">
                  <h5><a href="./single-product.html">Product fashion</a></h5>
                  <p>2 x $250.00</p>
                  <div class="ci-edit">
                    <a href="#" class="edit fa fa-edit"></a>
                    <a href="#" class="edit fa fa-trash"></a>
                  </div>
                </div>
              </div>
              <div class="ci-item">
                <img src="images/shop/8.jpg" width="70" alt=""/>
                <div class="ci-item-info">
                  <h5><a href="./single-product.html">Product fashion</a></h5>
                  <p>2 x $250.00</p>
                  <div class="ci-edit">
                    <a href="#" class="edit fa fa-edit"></a>
                    <a href="#" class="edit fa fa-trash"></a>
                  </div>
                </div>
              </div>
              <div class="ci-total">Subtotal: $750.00</div>
              <div class="cart-btn">
                <a href="#">View Bag</a>
                <a href="#">Checkout</a>
              </div>
            </div>
          </div>
          <div class="s-search">
            <div class="ss-ico"><i class="fa fa-search"></i></div>
            <div class="search-block">
              <div class="ssc-inner">
                <form>
                  <input type="text" placeholder="Type Search text here...">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </header>
<!--nav end-->

<!--sectin start-->	

<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
		<!--data coolect-->
			<?php 	
				$sql = "SELECT * FROM pets WHERE id=$id";
				$res = mysqli_query($connection, $sql); 
				$r = mysqli_fetch_assoc($res); 
			?>
			<!--end of query-->

			<form method="post" enctype="multipart/form-data">
				  <div class="form-group">
				  	 <input type="hidden" name="filepath" value="<?php echo $r['thumb']; ?>">
				    <label for="Productname">Pet Name</label>
				    <input type="text" class="form-control" name="petname" id="Productname" value="<?php echo $r['petname']; ?>">
				  </div>
				  <div class="form-group">
				    <label for="productdescription"> Description</label>
				    <textarea class="form-control" name="petdescription" rows="3"><?php echo $r['petdescription']; ?> </textarea>
				  </div>

				  <div class="form-group">
				    <label for="productcategory">Pet Category</label>
				    <select class="form-control" id="productcategory" name="petcategory">
					  <option value="<?php echo $r['petcategory']; ?>"> <?php echo $r['petcategory']; ?> </option>
					  
						<option value="Cat"> Cat </option>
						<option value="Dog"> Dog </option>
						<option value="Birds"> Birds </option>
						<option value="Rabbits"> Rabbits </option>
						<option value="Horses"> Horses </option>
						<option value="Small animals"> Small animals </option>
						<option value="Raptiles"> Raptiles </option>
						<option value="Farm type animals"> Farm type animals </option>	
					</select>
				  </div>

				  <div class="form-group">
				    <label for="Productname">Gender</label>
				    <select class="form-control" id="productcategory" name="gender">
					  <option value="<?php echo $r['gender']; ?>"> <?php echo $r['gender']; ?></option>
					  	<option value="Any"> Any </option>
						<option value="Male"> Male </option>
						<option value="Female"> Female </option>
					</select>	
				  </div>
				  
				  <div class="form-group">
				    <label for="Productname">Age</label>
				    <select class="form-control" id="productcategory" name="age">
					  <option value="<?php echo $r['age']; ?>"><?php echo $r['age']; ?></option>
					  
						<option value="Any"> Any </option>
						<option value="Puppy"> Puppy </option>
						<option value="Kitten"> Kitten </option>
						<option value="Young"> Young </option>
						<option value="Adoult"> Adoult </option>
						<option value="senior"> senior </option>
					</select>	
				  	</div>

					<div class="clearfix space30"></div>
					<h4 class="heading">Trained</h4>
					<div class="clearfix space20"></div>
					<div class="payment-method">
						<div class="row">
						
						<div class="col-md-4">
							<input name="trained" id="radio1" class="css-checkbox" type="radio" checked value="Yes"> <span>Yes</span>
							<!-- <div class="space20"></div> -->
							
						</div>
						
						<div class="col-md-4">
							<input name="trained" id="radio2" class="css-checkbox" type="radio"   value="No"><span> No</span>
							<div class="space20"></div>
							
						</div>
							
					</div>
					<div class="space30"></div>
					</div>

				 <!--  <div class="form-group">
				    <label for="productprice"> Price</label>
				    <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price">
				  </div> -->

				  <div class="form-group">
			    <label for="productimage">Product Image</label>
			    <?php if(isset($r['thumb']) & !empty($r['thumb'])){ ?>
			    <br>
			    	<img src="<?php echo $r['thumb'] ?>" widht="100px" height="100px">
			    	<a href="deletpetimage.php?id=<?php echo $r['id']; ?>">Delete Image</a>
			    <?php }else{ ?>
			    <input type="file" name="productimage" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			    <?php } ?>
			  </div>
				  
				  <button type="submit" class="button btn-lg">Submit</button>
			</form>
			
		</div>
	</div>

</section>
<!--saction end-->
<!--footer start-->
<?php include 'inc/footer.php' ?>
<!--footer end-->