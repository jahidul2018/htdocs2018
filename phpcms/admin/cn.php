<?php 

// PHP-CMS
//
//Developed by: 	Humayun Shabbir Bhutta
//Email:			humayun_sa@hotmail.com
//website:			hm.munirbrothers.net
//Location:			Pakistan
//

$link = mysql_connect('localhost', 'root', '', 'phpdbadmin')

        or die("Could not connect");

$db = mysql_select_db("phpdbadmin", $link)
		or die("Could not select database");
?>