-- 
-- Table structure for table `likes`
-- 

CREATE TABLE `likes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `like` int(10) NOT NULL,
  `unlike` int(10) NOT NULL,
  `uid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1;



-- --------------------------------------------------------

-- 
-- Table structure for table `products`
-- 

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `image` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4;

-- 
-- Dumping data for table `products`
-- 

INSERT INTO `products` VALUES (1, 'PHP Books', 20.00, '1.jpg', 1);
INSERT INTO `products` VALUES (2, 'RestAPI Code', 10.00, '2.jpg', 1);
INSERT INTO `products` VALUES (3, 'PHPGang Annual Subscription', 100.00, '3.jpg', 1);
