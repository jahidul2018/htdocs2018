<?php 
require 'classes/Database.php';

$database = new Database; 

//create a query for fetch data from database "for binding data " 
$database->query('SELECT * FROM posts WHERE id = :id');

$database->bind(':id',18); //binding the data from database as a  condition 

//for showing the data into index page; $bind is use for condition 
//print_r($rows);show the array data for resultset ;
$rows = $database->resultset();

?>

<h1>Posts</h1>
<div>
<?php foreach ($rows as $row) : ?>
	<div>
		<h3><?php echo $row['title']; ?></h3>
		<p><?php echo $row['body']; ?></p>
	</div>	
<?php endforeach ?>
</div>
