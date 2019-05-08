<?php
	ob_start();
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
<?php include 'inc/header.php'; ?>
<?php 
/*include 'inc/nav.php';*/
 ?>
<?php
if(isset($_POST) & !empty($_POST)){
		$status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
		$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
		$id = filter_var($_POST['orderid'], FILTER_SANITIZE_NUMBER_INT);

			echo $ordprcsql = "INSERT INTO ordertracking (orderid, status, message) VALUES ('$id', '$status', '$message')";
			$ordprcres = mysqli_query($connection, $ordprcsql) or die(mysqli_error($connection));
			if($ordprcres){
				$ordupd = "UPDATE orders SET orderstatus='$status' WHERE id=$id";
				if(mysqli_query($connection, $ordupd)){
					header('location: ordersadopt.php');
				}
			}
}
?>

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
              <li><a href="ordersadopt.php">View Request</a></li>
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
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<!-- <h2>Admin - Order Processing</h2> -->
						<!-- <p>Do you want to cancel Order?</p> -->
					</div>
<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Order Processing</h3> <br>

				<table class="cart-table account-table table table-bordered">
				<thead>
					<tr>
						<th>Order</th>
						<th>INvoice ID</th>
						<th>Date</th>
						<th>Status</th>
						<th>Payment Mode</th>
						<!-- <th>Payment ID</th>
						<th>Transaction ID</th>
						<th>Total</th> -->
					</tr>
				</thead>
				<tbody>

				<?php
					if(isset($_GET['id']) & !empty($_GET['id'])){
						$oid = $_GET['id'];
					}else{
						header('location: orders.php');
					}
					$ordsql = "SELECT * FROM orders WHERE id='$oid'";
					$ordres = mysqli_query($connection, $ordsql);
					while($ordr = mysqli_fetch_assoc($ordres)){
				?>
					<tr>
						<td>
							<?php echo $ordr['id']; ?>
						</td>
						<td>
							<?php echo $ordr['ivid']; ?>
						</td>
						<td>
							<?php echo $ordr['timestamp']; ?>
						</td>
						<td>
							<?php echo $ordr['orderstatus']; ?>			
						</td>
						<td>
							<?php echo $ordr['paymentmode']; ?>
						</td>
						<!-- <td>
							<?php echo $ordr['paymentid']; ?>
						</td>
						<td>
							<?php echo $ordr['trnsid']; ?>
						</td>
						<td>
							 <?php echo $ordr['totalprice']; ?>.00/-
						</td> -->
					</tr>
				<?php } ?>
				</tbody>
			</table>	

						<div class="space30"></div>
							<label class="">Order Status </label>
							<select name="status" class="form-control">
								<option value="">Select Status</option>
								<option value="In Progress">In Progress</option>
								<option value="Dispatched">Dispatched</option>
								<option value="Delivered">Delivered</option>
								<option value="Paid">Payment Confirm</option>
								<option value="Paid"> Confirm</option>
							</select>

							<div class="clearfix space20"></div>
							<label>Message :</label>
							<textarea class="form-control" name="message" cols="10"> </textarea>

					<input type="hidden" name="orderid" value="<?php echo $_GET['id']; ?>">		 
						<div class="space30"></div>
					<input type="submit" class="button btn-lg" value="Update Order Status">
					</div>
				</div>
				
			</div>
		
		</div>		
</form>		
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>
