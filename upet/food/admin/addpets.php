<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
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
					if(move_uploaded_file($tmp_name, $location.$name)){
						//$smsg = "Uploaded Successfully";
						echo $sql = "INSERT INTO pets (petname, petdescription, petcategory, gender,age, trained, thumb) VALUES ('$prodname', '$description', '$category', '$gender', '$age', '$trained', '$location$name')";
						$res = mysqli_query($connection, $sql);
						if($res){
							//echo "Product Created";
							header('location: pet.php');
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

			$sql = "INSERT INTO pets (petname, petdescription, petcategory, gender,age, trained) VALUES ('$prodname', '$description', '$category', '$gender', '$age', '$trained')";
			$res = mysqli_query($connection, $sql);
			if($res){
				header('location: pet.php');
			}else{
				$fmsg =  "Failed to Create Pet";
			}
		}
	}
?>
<?php include 'inc/header.php'; ?>
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
	


<section id="content">
	<div class="content-blog">
		<div class="container">
		<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>



			<form method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="Productname">Pet Name</label>
				    <input type="text" class="form-control" name="petname" id="Productname" placeholder="Pet Name" required="">
				  </div>
				  <div class="form-group">
				    <label for="productdescription"> Description</label>
				    <textarea class="form-control" name="petdescription" rows="3" required=""></textarea>
				  </div>

				  <div class="form-group">
				    <label for="productcategory">Pet Category</label>
				    <select class="form-control" id="productcategory" name="petcategory" required="">
					  <option value="">---SELECT CATEGORY---</option>
					  
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
					  <option value="">---SELECT CATEGORY---</option>
					  	<option value="Any"> Any </option>
						<option value="Male" selected> Male </option>
						<option value="Female"> Female </option>
					</select>	
				  </div>
				  
				  <div class="form-group">
				    <label for="Productname">Age</label>
				    <select class="form-control" id="productcategory" name="age">
					  <option value="">---SELECT CATEGORY---</option>
					  
						<option value="Any" selected > Any </option>
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
				    <label for="productimage">Pet Image</label>
				    <input type="file" name="productimage" id="productimage" required="">
				    <p class="help-block">Only jpg are allowed.</p>
				  </div>
				  
				  <button type="submit" class="button btn-lg" onclick="return confirm('Are you sure you want to Submit?');">Submit</button>
			</form>
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
