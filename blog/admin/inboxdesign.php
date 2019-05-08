<!DOCTYPE html>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

    <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php 
					if (isset($_GET['paidid'])) {
						$paidid= $_GET['paidid'];
						

					$query= "UPDATE shirt_design SET status = 1  WHERE design_id= '$paidid'";
                    $updatedrow= $db->update($query);
                    if ($updatedrow) {
                         echo "<span class='success'> Order Paid Successfuly !!</span>";

                        
                    }else {
                        echo "<span class='error'> Something wrong !!</span>";
                    }
				}

			?>
    
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="8%">design_id.</th>
							<th width="10%">product_Id</th>
							<th width="10%">mesurment_id</th>
							<th width="10%">price</th>
							<th width="12%">Customer Email</th>
							<th width="10%">phone</th>
							<th width="15%">Address</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query="SELECT design_id, shirt_design.product_id, price, shirt_design.customer_email, measurment_id FROM shirt_design, shirt_measurment, product WHERE shirt_design.customer_email=shirt_measurment.customer_email and shirt_design.product_id=product.product_id and status=0 order by design_id desc";
						$design_order=$db->select($query);

						if ($design_order) {

							$i=0;
							while ($result = $design_order->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							
							<td width="8%"><?php echo $result['design_id']; ?></td>
							<td width="10%"><?php echo $result['product_id']; ?></td>
							<td width="10%"><?php echo $result['measurment_id']; ?></td>
							<td width="10%"><?php echo $result['price'] ?></td>
							<td width="12%"><?php echo $result['customer_email']; ?></td>
							<th width="10%"><?php  ?></th>
							<td width="15%"><?php  ?></td>
							<td width="15%">
								<script>
									var data = '<?php echo $result['product_id']; ?>';
									var data1 = '<?php echo $result['customer_name']; ?> ';

									var data3 = '<?php echo $result['price']; ?>';
								</script>
								<a onclick="PrintElem(data, data1 , data3)" >invoice
								</a> || 
								
								<a href="?paidid=<?php echo $result['design_id'] ?>" onclick="return confirm('Are You Sure To Pay?');">Deliver</a>
								
							</td>
						</tr>
						<?php } }  ?>
					</tbody>
				</table>
               </div>
            </div>

         <div class="box round first grid">
                <h2>Deliver Product</h2>
                <div class="block">        
                   <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="8%">design_id.</th>
							<th width="10%">product_Id</th>
							<th width="10%">price</th>
							<th width="10%">mesurment_id</th>
							<th width="12%">Customer Email</th>
							<th width="10%">phone</th>
							<th width="15%">Address</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$query="SELECT design_id, shirt_design.product_id, price, shirt_design.customer_email, measurment_id FROM shirt_design, shirt_measurment, product WHERE shirt_design.customer_email=shirt_measurment.customer_email and shirt_design.product_id=product.product_id and status=1 order by design_id desc";
						$design_order=$db->select($query);

						if ($design_order) {

							$i=0;
							while ($result = $design_order->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td width="8%"><?php echo $result['design_id']; ?></td>
							<td width="10%"><?php echo $result['product_id']; ?></td>
							<td width="10%"><?php echo $result['measurment_id']; ?></td>
							<td width="10%"><?php echo "500+ ".$result['price'] ?></td>
							
							<td width="12%"><?php echo $result['customer_email']; ?></td>
							<th width="10%"><?php  ?></th>
							<td width="15%"><?php  ?></td>
							<td width="15%">
								<a href="invoice.php?invoice=<?php echo $result['design_id'] ?>">Invoice</a> || 
								<a href="?delid=<?php echo $result['design_id'] ?>" onclick="return confirm('Are You Sure Delete Data ?');">Delete</a>
					

							</td>
						</tr>
						<?php } }  ?>
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
		        mywindow.document.write('<h4>customer_name: '+ data1 +' </h4>');
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