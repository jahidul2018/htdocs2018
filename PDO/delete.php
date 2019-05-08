<?php 

require 'classes/Database.php';
$database = new database;


if ($_POST['delete']) {
	$delete_id = $_POST['delete_id'];
	$database->query('DELETE FROM posts WHERE id=:id');
	$database->bind(':id', $delete_id);
	$database->execute();
}
header('location: postupdate.php');
?>