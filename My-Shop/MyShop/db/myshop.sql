-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2018 at 06:23 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'awpareshan@gmail.com', 'wali'),
(2, 'ayesha@yahoo.com', 'khan');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'Nokia '),
(4, 'Samsung'),
(5, 'Sony'),
(6, 'Motorola'),
(8, 'LG');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'iPods'),
(3, 'Mobiles'),
(4, 'Cameras'),
(5, 'Touch Phones'),
(10, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(9, 'jahidul', 'mike2016trison@gmail.com', '1234', 'India', 'dhaka', 1681805060, '232/2/a ', 'type.png', 1),
(10, 'sujjed', 'sazzed@gmail.com', '1234', 'United States', 'dhaka', 2147483647, '12b34v ', 'hjl.PNG', 1),
(11, 'romiz', 'romiz@gmail.com', '12345', 'India', 'goa', 1681805060, '232/2/a ', 'hjl.PNG', 1),
(12, 'nono', 'nono@gmail.com', '1234', 'Afghanistan', 'dhaka', 1681805060, '232/2/a ', 'type.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(33, 7, 900, 2014691707, 1, '2014-06-28 23:04:20', 'Complete'),
(34, 7, 1400, 1112245032, 1, '2014-06-28 23:09:39', 'Complete'),
(36, 7, 400, 2008519193, 1, '2014-06-28 23:00:03', 'Complete'),
(37, 7, 400, 584737940, 1, '2014-07-05 19:36:04', 'Pending'),
(38, 7, 1200, 754753243, 1, '2014-07-05 19:38:16', 'Pending'),
(39, 8, 9000, 834749060, 2, '2018-08-07 04:57:28', 'Pending'),
(40, 8, 1400, 740671544, 1, '2018-08-07 05:01:14', 'Pending'),
(41, 8, 1400, 2063154431, 1, '2018-08-07 05:06:50', 'Pending'),
(42, 8, 900, 1978912892, 1, '2018-08-07 08:12:00', 'Pending'),
(43, 8, 300, 1918164475, 1, '2018-08-19 16:50:47', 'Pending'),
(44, 8, 2800, 493688043, 1, '2018-08-19 16:54:50', 'Pending'),
(45, 8, 2400, 1582170518, 1, '2018-08-19 18:01:15', 'Pending'),
(46, 12, 10800, 2109874402, 1, '2018-08-19 20:26:50', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(1, 1355767292, 700, 'Bank Transfer', 3453454, 43534, '25-06-2014'),
(2, 512047505, 2000, 'Easypaisa/UBL Omni', 4354351, 12345, '27-06-2014'),
(3, 343866839, 1200, 'Bank Transfer', 353423, 32432, '27-06-2014'),
(4, 2008519193, 400, 'Bank Transfer', 3453454, 43534, '27-06-2014'),
(5, 2014691707, 900, 'Western Union', 3453454, 43534, '25-06-2014'),
(6, 1112245032, 1400, 'Easypaisa/UBL Omni', 3453454, 43534, '27-06-2014'),
(7, 0, 0, 'Select Payment', 0, 0, ''),
(8, 2109874402, 10800, 'Bank Transfer', 12, 2343, '12-12-12'),
(9, 2109874402, 10800, 'Easypaisa/UBL Omni', 12, 2343, '8/20/2018');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(36, 7, 2008519193, 9, 1, 'Complete'),
(46, 8, 1582170518, 11, 2, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(8, 1, 2, '2014-06-11 19:57:47', 'Dell corei7', 'Dell-Inspiron-R-Special-Edition.jpg', 'dell-laptop-battery-problem.jpg', 'Laptops-hp-Pro-Book-300x275.jpg', 300, 'this is a nice dell laptop for sale.', 'DELL, corei7, new, laptops', 'on'),
(9, 4, 4, '2014-06-28 20:48:41', 'Samsung Camera', 'Sony_camera.jpg', 'Canon-EOS-Rebel-T3i.jpg', 'DSLR-camera.jpg', 400, '<p>this is a very nice samsung camera which you can easily buy from this shop with lifetime guarantee and we will give you discount also if you buy it today.&nbsp;</p>', '', 'on'),
(10, 4, 5, '2014-06-28 20:49:40', 'Sony Camera New', 'DSLR-camera.jpg', 'Sony_camera.jpg', 'Canon-EOS-Rebel-T3i.jpg', 900, '<p>Sony camera I like too much and you can buy it easily from this our shop...</p>', '', 'on'),
(11, 3, 3, '2014-06-28 20:50:44', 'Nokia mobile new', 'nokia-windows-200-dollar-tablet2-640x353.jpg', 'Samsung-Galaxy-Tab-tablet.jpg', 'htc-one-sv.jpg', 1200, '<p>Nokia is a great mobile and brand for everyone!</p>', '', 'on'),
(12, 3, 4, '2014-06-28 20:51:51', 'Samsung Galaxy ', 'Samsung-Galaxy-Tab-tablet.jpg', 'HTC-Google-Nexus-One-2.jpg', 'iPad_mini_inHand_Wht_iOS6_PRINT.jpg', 1400, '<p>Samsung galaxy is a great phone to use by everybody in the world for several other things.&nbsp;</p>', '', 'on'),
(13, 1, 1, '2014-06-29 18:19:39', 'HP new Laptop', 'original.jpg', 'dell-laptop-battery-problem.jpg', 'Laptops-hp-Pro-Book-300x275.jpg', 400, '<p>lljlkj khkh kjkh khkh khjhk khj</p>', '', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
