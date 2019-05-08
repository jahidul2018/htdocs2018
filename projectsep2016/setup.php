<?php
	$con=mysql_connect("localhost","root","") or die("couldnot connect to database");
	$query="drop database if exists project2016";	
	$result=mysql_query($query,$con);
	
		if(!$result)
		{
			echo mysql_error();
		}
		else
		{
			echo "Database dropped<br/>";
		}
	$con=mysql_connect("localhost","root","");

	$query="create database project2016";
	$result=mysql_query($query,$con);
	if(!$result){
		echo mysql_error();
	}
	else{
		echo "project2016 Database created<br/>";
	}
 
 
 
 
	mysql_select_db('project2016');
 
	$query="CREATE TABLE users (
		 id int NOT NULL AUTO_INCREMENT,
		 username varchar(255) NOT NULL,
		 first_name varchar(255) NOT NULL,
		 last_name varchar(255) NOT NULL,
		 password varchar(25) NOT NULL,
		 email varchar(55) NOT NULL,
		 gender varchar(20) NOT NULL,
		
		 user_level int(11),
		 type varchar(255),
		 location varchar(255),
		 phonenumber varchar(255),
		 massage varchar(255),
		 
		 PRIMARY KEY(id))";
	 
	$result=mysql_query($query,$con);
		if(!$result){
			echo mysql_error();
		}
		else{
			echo " users table created<br/>";
		}
 
	$query="INSERT INTO users(username,password,email,user_level,type)values ('mishuk','password123','jahidulalam13@outlook.com',1,'a'),('admin','password123','admin@gmail.com',1,'a'),('mishuk15','password123','jahidulalam13@outlook.com',1,'a')";
		$result=mysql_query($query,$con);
			if(!$result)
			{
				echo mysql_error();
			}
			else{
				echo"users data inserted<br/>";
				}
	//user_level tebel 
	
	$query="CREATE TABLE user_level (
		 id int,
		 name varchar(255),
		 PRIMARY KEY(id))";
 
		$result=mysql_query($query,$con);
			if(!$result){
				echo mysql_error();
			}
			else{
				echo " user_level table created<br/>";
			}			
			
	
			
	$query="INSERT INTO user_level(id,name)values (1,'Admin'),(2,'General User')";
		$result=mysql_query($query,$con);
			if(!$result)
			{
				echo mysql_error();
			}
			else{
				echo"users data inserted<br/>";
				}

	$query="CREATE TABLE venue (
		 p_id int NOT NULL AUTO_INCREMENT,
		 post_name varchar(255),
		 post_price float(11),
		 post_capasity int,
		 post_sqfeet varchar(255),
		 post_image varchar(255),
		 post_content text(1000),
		 post_available_date varchar(255),
		 post_available_time varchar(255),
		 post_status varchar(255),
		 post_availality int,
		 post_sesson varchar(255),
		 
		 PRIMARY KEY(p_id))";
 
		 $result=mysql_query($query,$con);
			 if(!$result){
				 echo mysql_error();
			 }
			 else{
				 echo " venue table created<br/>";
			 }	
	$query="create TABLE date(
		dateid int NOT NULL AUTO_INCREMENT ,
		day varchar(255),
		month varchar(255),
		year varchar(255),
		time varchar(255),
		cost int(11),
		session varchar(255),
		venue_name varchar(255),
		 post_availality int(11),
		PRIMARY KEY(dateid))";	
		
	$result=mysql_query($query,$con);
		if(!$result){
			echo mysql_error();
		}
		else{
			echo "date table created <br/>";
		}

	$query="create TABLE order_product(
		order_product_id int NOT NULL AUTO_INCREMENT ,
		id int(11),
		user_name varchar(255),
		p_id int(11),
		center_name varchar(255),
		t_cost float(11),
		confirm_by_user int,
		confirm_by_admin int,

		PRIMARY KEY(order_product_id))";
	
	$result=mysql_query($query,$con);
	if(!$result){
		echo mysql_error();
	}
	else{
		echo "order_productdate created <br/>";
	}	

		$query="create TABLE order_productdate(
		order_product_id int NOT NULL AUTO_INCREMENT ,
		id int(11),
		user_name varchar(255),
		p_id int(11),
		center_name varchar(255),
		t_cost float(11),
		day varchar(255),
		month varchar(255),
		year varchar(255),
		confirm_by_user int,
		confirm_by_admin int,

		PRIMARY KEY(order_product_id))";
	
	$result=mysql_query($query,$con);
	if(!$result){
		echo mysql_error();
	}
	else{
		echo "order_product created <br/>";
	}
			
	$query="INSERT INTO venue(p_id, post_name, post_price, post_capasity, post_sqfeet, post_image, post_content, post_available_date, post_available_time, post_status, post_availality, post_sesson) VALUES
(1, 'Celebrity ', 80000, 1200, 'Size in feet 122 x 98, Sq feet 8,625, Theater 1200, Round Table 1000 and Reception 1200.', 'clebrity.jpg', 'The ‘Celebrity’ is the epicenter, a unique and purpose built architecture. \r\nThe superb and spacious Celebrity has the world class amenities. \r\nThis grand hall with its beautiful chandelier is suitable for dinners,\r\nparties, seminars, corporate get-togethers or any grand occasion.\r\nA complete kitchen facility is also available.', '6-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(2, 'Business centre ', 60000, 750, 'Size in feet 29 x 25, Sq feet 740, Rectangular 42.', 'business.jpg', 'In business you never get what you deserve; \r\nyou get what you negotiate for. \r\nNegotiation requires cool nerve and the CC \r\n‘Legendary, Eternity, Milestone & Elegant’ \r\ngive you that fresh and soothing feeling of\r\n a place where you can rediscover the strength\r\n of your mind. We have created an ambiance in all\r\n 4 meeting rooms i.e. Legendary, Eternity, \r\nMilestone and Elegant that makes your mind speak.', '21-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(6, 'Business centre ', 60000, 750, 'Size in feet 29 x 25, Sq feet 740, Rectangular 42.', 'business.jpg', 'In business you never get what you deserve; \r\nyou get what you negotiate for. \r\nNegotiation requires cool nerve and the CC \r\n‘Legendary, Eternity, Milestone & Elegant’ \r\ngive you that fresh and soothing feeling of\r\n a place where you can rediscover the strength\r\n of your mind. We have created an ambiance in all\r\n 4 meeting rooms i.e. Legendary, Eternity, \r\nMilestone and Elegant that makes your mind speak.', '8-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(5, 'Art gallery ', 80000, 1200, 'Size in feet 122 x 98, Sq feet 8,625, Theater 1200, Round Table 1000 and Reception 1200.', 'Art.jpg', 'The ‘Art’ is the epicenter, a unique and purpose built architecture. \r\nThe superb and spacious Celebrity has the world class amenities. \r\nThis grand hall with its beautiful chandelier is suitable for dinners,\r\nparties, seminars, corporate get-togethers or any grand occasion.\r\nA complete kitchen facility is also available.', '12-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(4, 'Celebrity ', 80000, 1200, 'Size in feet 122 x 98, Sq feet 8,625, Theater 1200, Round Table 1000 and Reception 1200.', 'clebrity.jpg', 'The ‘Celebrity’ is the epicenter, a unique and purpose built architecture. \r\nThe superb and spacious Celebrity has the world class amenities. \r\nThis grand hall with its beautiful chandelier is suitable for dinners,\r\nparties, seminars, corporate get-togethers or any grand occasion.\r\nA complete kitchen facility is also available.', '18-oct-2016', '6.00 PM', 'Available', 1, 'Evening'),
(11, 'Celebrity ', 80000, 1200, 'Size in feet 122 x 98, Sq feet 8,625, Theater 1200, Round Table 1000 and Reception 1200.', 'clebrity.jpg', 'The ‘Celebrity’ is the epicenter, a unique and purpose built architecture. \r\nThe superb and spacious Celebrity has the world class amenities. \r\nThis grand hall with its beautiful chandelier is suitable for dinners,\r\nparties, seminars, corporate get-togethers or any grand occasion.\r\nA complete kitchen facility is also available.', '6-oct-2016', '8.00 AM', 'Available', 1, 'Evening'),
(21, 'wadding centre ', 60000, 750, 'Size in feet 29 x 25, Sq feet 740, Rectangular 42.', 'curzon-hall-wedding-gal7.jpg', 'In wadding you never get what you deserve; \r\nyou get what you negotiate for. \r\nNegotiation requires cool nerve and the CC \r\n‘Legendary, Eternity, Milestone & Elegant’ \r\ngive you that fresh and soothing feeling of\r\n a place where you can rediscover the strength\r\n of your mind. We have created an ambiance in all\r\n 4 meeting rooms i.e. Legendary, Eternity, \r\nMilestone and Elegant that makes your mind speak.', '21-SEP-2016', '8.00 AM', 'Available', 1, 'Morning'),
(112, 'Celebrity ', 80000, 1200, 'Size in feet 122 x 98, Sq feet 8,625, Theater 1200, Round Table 1000 and Reception 1200.', 'clebrity.jpg', 'The ‘Celebrity’ is the epicenter, a unique and purpose built architecture. \r\nThe superb and spacious Celebrity has the world class amenities. \r\nThis grand hall with its beautiful chandelier is suitable for dinners,\r\nparties, seminars, corporate get-togethers or any grand occasion.\r\nA complete kitchen facility is also available.', '7-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(212, 'Business centre ', 60000, 750, 'Size in feet 29 x 25, Sq feet 740, Rectangular 42.', 'business.jpg', 'In business you never get what you deserve; \r\nyou get what you negotiate for. \r\nNegotiation requires cool nerve and the CC \r\n‘Legendary, Eternity, Milestone & Elegant’ \r\ngive you that fresh and soothing feeling of\r\n a place where you can rediscover the strength\r\n of your mind. We have created an ambiance in all\r\n 4 meeting rooms i.e. Legendary, Eternity, \r\nMilestone and Elegant that makes your mind speak.', '21-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(61, 'Business centre ', 60000, 750, 'Size in feet 29 x 25, Sq feet 740, Rectangular 42.', 'business.jpg', 'In business you never get what you deserve; \r\nyou get what you negotiate for. \r\nNegotiation requires cool nerve and the CC \r\n‘Legendary, Eternity, Milestone & Elegant’ \r\ngive you that fresh and soothing feeling of\r\n a place where you can rediscover the strength\r\n of your mind. We have created an ambiance in all\r\n 4 meeting rooms i.e. Legendary, Eternity, \r\nMilestone and Elegant that makes your mind speak.', '8-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(51, 'Art gallery ', 80000, 1200, 'Size in feet 122 x 98, Sq feet 8,625, Theater 1200, Round Table 1000 and Reception 1200.', 'Art.jpg', 'The ‘Art’ is the epicenter, a unique and purpose built architecture. \r\nThe superb and spacious Celebrity has the world class amenities. \r\nThis grand hall with its beautiful chandelier is suitable for dinners,\r\nparties, seminars, corporate get-togethers or any grand occasion.\r\nA complete kitchen facility is also available.', '12-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(41, 'Celebrity ', 80000, 1200, 'Size in feet 122 x 98, Sq feet 8,625, Theater 1200, Round Table 1000 and Reception 1200.', 'clebrity.jpg', 'The ‘Celebrity’ is the epicenter, a unique and purpose built architecture. \r\nThe superb and spacious Celebrity has the world class amenities. \r\nThis grand hall with its beautiful chandelier is suitable for dinners,\r\nparties, seminars, corporate get-togethers or any grand occasion.\r\nA complete kitchen facility is also available.', '18-oct-2016', '6.00 PM', 'Available', 1, 'Evening'),
(111, 'Celebrity ', 80000, 1200, 'Size in feet 122 x 98, Sq feet 8,625, Theater 1200, Round Table 1000 and Reception 1200.', 'clebrity.jpg', 'The ‘Celebrity’ is the epicenter, a unique and purpose built architecture. \r\nThe superb and spacious Celebrity has the world class amenities. \r\nThis grand hall with its beautiful chandelier is suitable for dinners,\r\nparties, seminars, corporate get-togethers or any grand occasion.\r\nA complete kitchen facility is also available.', '9-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(211, 'wadding centre ', 60000, 750, 'Size in feet 29 x 25, Sq feet 740, Rectangular 42.', 'curzon-hall-wedding-gal7.jpg', 'In wadding you never get what you deserve; \r\nyou get what you negotiate for. \r\nNegotiation requires cool nerve and the CC \r\n‘Legendary, Eternity, Milestone & Elegant’ \r\ngive you that fresh and soothing feeling of\r\n a place where you can rediscover the strength\r\n of your mind. We have created an ambiance in all\r\n 4 meeting rooms i.e. Legendary, Eternity, \r\nMilestone and Elegant that makes your mind speak.', '21-SEP-2016', '8.00 AM', 'Available', 1, 'Morning'),

(3, 'media corner', 40000, 200, 'Size in feet 68 x 51, Sq feet 3,468, Theater 200, Round Table 150 and Reception 200.', 'media.jpg', 'The amenities of international standard media meetings with\r\nall significant facilities are available on both the venues.\r\nBright lighting with sound facilities and special podium will\r\nelevate your media meet to a new height. It can also be used for \r\nsmall parties, get-togethers, cocktails etc.', '10-oct-2016', '8.00 AM', 'Available', 1, 'Morning')";
		$result=mysql_query($query,$con);
		if(!$result){
			echo mysql_error();
		}
		else{
			echo "venue data insert <br/>";
		}
		
		$query="INSERT INTO date (`dateid`, `day`, `month`, `year`, `time`, `cost`, `session`, `venue_name`,post_availality) VALUES
(12, '12', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'Business centre',1),
(3, '16', 'SEP', '2016', '8.00PM', 80000, 'Evening', 'Business centre',1),
(4, '18', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'media corner ',1),
(5, '20', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'Celebrity ',1),
(6, '22', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'media corner  ',1),
(7, '24', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'Celebrity ',1),
(8, '28', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'Business centre',1),
(9, '30', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'media corner  ',1),
(10, '1', 'OCT', '2016', '8.00AM', 80000, 'Morning', 'Business centre',1),
(11, '12', 'OCT', '2016', '8.00AM', 80000, 'Evening', 'Celebrity ',1),
(1, '13', 'OCT', '2016', '8.00PM', 80000, 'Evening', 'media corner ',1),
(14, '22', 'OCT', '2016', '8.00AM', 80000, 'Morning', 'media corner ',1),
(100, '17', 'OCT', '2016', '8.00AM', 80000, 'Morning', 'Business centre',1),
(17, '3', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'Business centre',1),
(13, '1', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'Business centre',1),
(32, '16', 'SEP', '2016', '8.00PM', 80000, 'Evening', 'Business centre',1),
(42, '18', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'media corner ',1),
(52, '20', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'Celebrity ',1),
(62, '22', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'media corner  ',1),
(72, '24', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'Celebrity ',1),
(82, '28', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'Business centre',1),
(92, '30', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'media corner  ',1),
(102, '1', 'OCT', '2016', '8.00AM', 80000, 'Morning', 'Business centre',1),
(112, '12', 'OCT', '2016', '8.00AM', 80000, 'Evening', 'Art gallery',1),
(111, '12', 'OCT', '2016', '8.00AM', 80000, 'Morning', 'Conference corner',1),
(142, '22', 'OCT', '2016', '8.00AM', 80000, 'Morning', 'media corner ',1),
(19, '17', 'OCT', '2016', '8.00AM', 80000, 'Morning', 'Business centre',1),
(171, '3', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'wadding centre',1),
(131, '1', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'Art gallery',1),

(2, '14', 'SEP', '2016', '6.00PM', 80000, 'Evening', 'wadding centre',1)";
	$result=mysql_query($query,$con);
		if(!$result){
			echo mysql_error();
		}
		else{
			echo "date data insert <br/>";
		}

?>