<?php 

require 'classes/Database.php';
$database = new database;

//THAT WILL HELP TO CHANGE THE $_POST TO CHANGE AS I LIKE ; 
$post =filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//CREATE THE IF FUNCTION FOR INPUT THE DATA INTO DATABAST BY PHP VARIABLE 

if ($post['submit']) {
	$id    = $post['id'];
	$title = $post['title'];
	$body  = $post['body'];
	//echo $title; testing the outpot
	//echo $body; testing the output
	
	//useing the bind method
	$database->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
	$database->bind(':title', $title);
	$database->bind(':body', $body);
	$database->bind(':id', $id);
	$database->execute();
}

//for showing the result with out refresh
$database->query('SELECT * FROM posts');

//$database->bind(':id',2); //binding the data from database as a  condition 

//for showing the data into index page; $bind is use for condition 
//print_r($rows);show the array data for resultset ;
$rows = $database->resultset();
 ?>


 <h1>..................Update Post.................</h1><!--legenf-->
 
 <form method="post" action="<?php $_SERVER['PHP_SELF'];?>"><!--form start-->
 	<LABEL>post id</LABEL><br />
 	<input type="text" name="id" placeholder=" specify a id" /><br><br>
 	<LABEL>post title</LABEL><br />
 	<input type="text" name="title" placeholder=" add a title" /><br><br>
 	<label>post body</label><br>
 	<textarea name="body"></textarea><br><br>
 	<input type="submit" name="submit" value="submit"> 	
 </form><!--form end-->


<h1>Posts</h1>
<div>
<?php foreach ($rows as $row) : ?>
	<div>
		<hr><hr>
		<h3><?php echo $row['title']; ?></h3>
		<p><?php echo $row['body']; ?></p>
		<br>
		<form method="post" action="delete.php"><!--form start-->
			<input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" />
			<input type="submit" name="delete" value="Delete">
		</form><!--end form-->	
	</div>	
<?php endforeach ?>
</div>
