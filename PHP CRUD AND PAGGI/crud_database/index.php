<?php
mysql_connect("localhost","root","");
mysql_select_db("crud_tutorial")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                 
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email Address</th>
                          <th>Mobile Number</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>




                      <?php
                       include 'database.php';
                       $pdo = Database::connect();
                          include("pagination/function.php");
                            $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                            $limit = 5; //if you want to dispaly 10 records per page then you have to change here
                            $startpoint = ($page * $limit) - $limit;
                            $statement = 'customers ORDER BY id DESC'; //you have to pass your query over here//chanre the table1 name


                                $res=mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}") or die(mysql_error());
                                while($row=mysql_fetch_array($res)) {
                                echo '<tr>';
                                echo '<td>'. $row['name'] . '</td>';
                                echo '<td>'. $row['email'] . '</td>';
                                echo '<td>'. $row['mobile'] . '</td>';
                                echo '<td width=250>';
                                echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->

  <?php
echo "<div id='pagingg' >";
echo pagination($statement,$limit,$page);
echo "</div>";
?>
  </body>
</html>