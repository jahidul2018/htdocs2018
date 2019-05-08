<?php 
function search($text){
 //connection to the database
 require 'classes/Database.php';

$database = new Database;

 $text = htmlspecialchars($text);

 $get_name = $db->prepare("SELECT name FROM users WHERE name LIKE concat('%', :name, '%')");
 $get_name = execute(array('name' => $text));

 while ($names = $get_name->fetch(PDO::FETCH_ASSOC)) {

 	echo('<a href="">'.$names['name'].'</a>');
 }

}	
search($_GET['txt']);
 ?>