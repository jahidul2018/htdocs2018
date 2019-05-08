<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

			<?php

				if (isset($_GET['delcat']))  {
       				 $delcatid= $_GET['delcat'];
       				 $delquery= "delete from catagory where catid='$delcatid'";
       				 $delquery= $db->delete($delquery);
       				 	if ($delquery) {
                         echo "<span class='success'> CATAGORY DELETED SUCCESSFULLY !!</span>";
                        
                    }else {
                        echo "<span class='error'> NOR DELETED !!</span>";
                    }
    				}
			  ?>



                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Product Name</th>
							<th>Customer Name</th>
							<th>Order date</th>
							<th>Total Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>


						<?php 
						$firstday_previousmonth=date('Y-m-d', strtotime("first day of previous month"));
						$lasday_previousmonth=date('Y-m-d', strtotime("last day of previous month"));
						//echo $firstday_previousmonth.' '.$lasday_previousmonth;

						/*$query="SELECT title AS 'product Name', customer_name, order_date, price FROM fabric_order, customer, product WHERE fabric_order.customer_email=customer.customer_email and product.product_id=fabric_order.product_id and status=1 AND order_date BETWEEN like '$firstday_previousmonth%' AND LIKE '$lasday_previousmonth%'  order by foid desc";*/


						$cur_date=date('Y-m-d');
						echo "<span style='color:green; font-size:15px'>Todays date </span>".$cur_date."<br>";
						
						  $query="SELECT title AS 'product Name', customer_name, order_date, price FROM fabric_order, customer, product WHERE fabric_order.customer_email=customer.customer_email and product.product_id=fabric_order.product_id and status=1  AND order_date LIKE '$cur_date%' order by foid desc"; 
						$catagory=$db->select($query);
						$sum= "SELECT sum(total_price) AS karim FROM `fabric_order` where order_date LIKE '$cur_date%' and status=1";
						$sum=$db->select($sum);
						$result = mysqli_fetch_array($sum);

					
						echo "<span style='color:green; font-size:15px'>Todays Sale Total </span>".$result['karim']."<br>";
						
						if ($catagory) {

							$i=0;
							while ($result = $catagory->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['product Name']; ?></td>
							<td><?php echo $result['customer_name']; ?></td>
							<td><?php echo $result['order_date']; ?></td>
							<td><?php echo $result['price']; ?></td>

							<td><a href="editcat.php?catid=<?php echo $result['catid'];?>">Edit
								</a> 
								|| <a onclick="return confirm('Are You Sure ?');" href="?delcat=<?php echo $result['catid']; ?>">Delete
								</a> ||
								<script>
									var data = '<?php echo $result['price']; ?> ';
									var data2 = '<?php echo $result['customer_name']; ?> ';
									var data3 = '<?php echo $result['product Name']; ?>';
								</script>
								<a onclick="PrintElem(data, data2 , data3)" >Print
								</a>

							</td>
						</tr>

						<?php } } ?>
					
					</tbody>
				</table>

				
               </div>

            </div>
        </div>


	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    <script type="text/javascript">

    	  function PrintElem(DataArray, data2, data3) {
		//        alert(DataArray);
		        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
		        mywindow.document.write('<html><head><title>' + document.title + '</title>');
		        mywindow.document.write('</head><body >');
		        mywindow.document.write('<h3>' + document.title + '</h3>');
		        mywindow.document.write('<h4>product Name '+ data3 +' </h4>');
		        mywindow.document.write('<h4>price: '+ DataArray +' </h4>');
		        mywindow.document.write('<h4>customer_name: '+ data2 +' </h4>');
		        mywindow.document.write('<h4>Bill:  </h4>');
		        mywindow.document.write('<h4>Items: ' + +'</h4>');
		        console.log(DataArray['items']);

		//        mywindow.document.write(document.getElementById(elem).innerHTML);
		        mywindow.document.write('</body></html>');
		        mywindow.document.close(); // necessary for IE >= 10
		        mywindow.focus(); // necessary for IE >= 10*/
		        mywindow.print();
		        mywindow.close();
		        return true;
		    }
</script>
 

        
        <?php include 'inc/footer.php';?>