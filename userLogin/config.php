<?php
$mysql_hostname = "localhost";
$mysql_user = "root";                         // default username in localhost is "root"
$mysql_password = "";                        //password as null
$mysql_database = "developer";               // Db name

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

?>