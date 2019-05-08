<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
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

<link href="bootstrap3.css" rel="stylesheet">
	
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Customer Name</th>
						<!-- <th>Total Price</th> -->
						<th>Order Status</th>
						<th>Payment Mode</th>
						<th>Order Placed On</th>
						<th>Operations</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
		 		 <?php 	
					$sql = "SELECT o.id, o.totalprice, o.orderstatus, o.paymentmode, o.`timestamp`, u.firstname, u.lastname FROM orders o JOIN usersmeta u WHERE o.uid=u.uid AND ivid LIKE 'Adid%' ORDER BY o.id DESC";
					$res = mysqli_query($connection, $sql); 
					while ($r = mysqli_fetch_assoc($res)){
				?>  

		
					 	
					<tr>
						<th scope="row"><?php echo $r['id']; ?></th>
						<td><?php echo $r['firstname']. " " . $r['lastname']; ?></td>
						<!-- <td><?php echo $r['totalprice']; ?></td> -->
						<td><?php echo $r['orderstatus']; ?></td>
						<td><?php echo $r['paymentmode']; ?></td>
						<td><?php echo $r['timestamp']; ?></td>
						<td><a href="order-process-adopt.php?id=<?php echo $r['id']; ?>">Process Order</a></td>
						<td><a href="petview-order.php?id=<?php echo $r['id']; ?>">Invoice</a></td>
					</tr>
				<?php } 

				?>
				</tbody>
			</table>

			
						<!-- Pagination -->
					
						<!-- End Pagination -->
			
		</div>
	</div>

</section>
<?php include 'inc/footer.php' ?>
