<?php 

require 'classes/Database.php';
$database = new database;

//THAT WILL HELP TO CHANGE THE $_POST TO CHANGE AS I LIKE ; 
$post =filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//CREATE THE IF FUNCTION FOR INPUT THE DATA INTO DATABAST BY PHP VARIABLE 
if ($post['submit']) {
	$title = $post['title'];
	$body  = $post['body'];
	//echo $title; testing the outpot
	//echo $body; testing the output
	
	//useing the bind method
	$database->query('INSERT INTO posts(title,body) VALUES(:title, :body)');
	$database->bind(':title',$title);
	$database->bind(':body', $body);
	$database->execute();

	if ($database->lastInsertId()) {
		echo "<p>Post Added!</p>";
	}
}

//for showing the result with out refresh
$database->query('SELECT * FROM posts');

//$database->bind(':id',2); //binding the data from database as a  condition 

//for showing the data into index page; $bind is use for condition 
//print_r($rows);show the array data for resultset ;
$rows = $database->resultset();



 ?>


 <h1>Add post</h1>
 <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
 	<LABEL>post title</LABEL><br />
 	<input type="text" name="title" placeholder=" add a title" /><br><br>
 	<label>post body</label><br>
 	<textarea name="body"></textarea><br><br>
 	<input type="submit" name="submit" value="submit"> 	
 </form>


<h1>Posts</h1>
<div>
<?php foreach ($rows as $row) : ?>
	<div>
		<h3><?php echo $row['title']; ?></h3>
		<p><?php echo $row['body']; ?></p>
	</div>	
<?php endforeach ?>
</div>
