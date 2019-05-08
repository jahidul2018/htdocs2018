-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2018 at 05:40 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailorshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `catid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`catid`, `name`) VALUES
(1, 'polyester/cotton '),
(2, 'TR Twill Fabric'),
(3, 'Yarn Dyed Flannel'),
(4, ' Rayon Lycra'),
(5, 'Pinpoint Oxford'),
(6, 'Chambray'),
(7, 'Dobby'),
(8, 'End-on-End'),
(9, 'Melange'),
(10, 'Oxford Cloth'),
(11, 'Poplin'),
(12, 'Herringbone'),
(13, 'Seersucke');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_email`, `phone`, `customer_name`, `city`, `postal_code`, `address`) VALUES
(1, 'Mohammadshuvo205@gmail.com', '01704470171', 'Mohammad Shuvo', 'Dhaka', '1207', 'Houe no. 201, Road no 27, Mohammadpur, shekertek Dhaka'),
(2, 'shihav@gmail.com', '01826381263', 'Md Shihav', 'khustia', '1509', 'Houe no. 60, Road no 56, mirdanga, Khustia'),
(3, 'Murad@yahoo.com', '01934697233', 'Mohammad murad', 'Khulna', '1904', 'House. 128, Road no 67, Iqbal Road, Khulna'),
(4, 'Mili@gmail.com', '0192193704', 'Mili', 'Dhaka', '1209', 'House no. 507, Road no 87, Baridhara, Dhaka'),
(5, 'Jahan@gmail.com', '01827394803', 'Md. Jahan', 'Dhaka', '1402', 'House no. 301, Road no 18, Mirpur 10 Dhaka'),
(6, 'moinul@gmail.com', '0189485699', 'Moinul shehav', 'Jessore', '7570', 'house no 18, road no-15 matbari, jessore'),
(7, 'Jahid@gmail.com', '01904470171', 'Mohammad jahid', 'dhaka', '1207', 'asd'),
(15, 'Rapon@gmail.com', '01734598305', 'Ripon Kobir', 'Jeshore', '7450', 'Keshobpur, Sagadari Dhaka'),
(30, 'mukul@gmail.com', '0174539990', 'mukul', 'jeshore', '2387', 'Jeshore, keshobpur'),
(31, 'mukul@gmail.com', '0174539990', 'mukul', 'jeshore', '2387', 'Jeshore, keshobpur'),
(32, 'mukul@gmail.com', '0174539990', 'mukul', 'jeshore', '2387', 'Jeshore, keshobpur'),
(33, 'mukul@gmail.com', '0174539990', 'mukul', 'jeshore', '2387', 'Jeshore, keshobpur'),
(34, 'mukul@gmail.com', '0174539990', 'mukul', 'jeshore', '2387', 'Jeshore, keshobpur'),
(35, 'ra@gamil.com', '3458008345', 'Ripon Kobir', 'Jeshore', '1237', 'jesshore, sagordaei'),
(36, 'sajib@gamil.com', '3454638345', 'shojib Kobir', 'Rajshahi', '1237', 'Rajshahi, sagordaei');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_order`
--

CREATE TABLE `fabric_order` (
  `foid` varchar(255) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `order_date` date NOT NULL,
  `hire_status` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `cash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fabric_order`
--

INSERT INTO `fabric_order` (`foid`, `customer_email`, `product_id`, `size`, `total_price`, `order_date`, `hire_status`, `status`, `cash`) VALUES
('', '', 'pro2', '', 1550.75, '2018-04-19', 'yes', 0, ''),
('10', 'Ripon@gmail.com', 'pro4', 'Cash On Delivary', 1750.25, '2018-04-18', 'yes', 0, 'Cash On Delivary'),
('2', 'shihav@gmail.com', 'p02', 'standard', 120, '2018-03-23', '', 1, 'cash on delivery'),
('5', 'Murad@yahoo.com', 'pro4', 'Standard', 1250.25, '2018-03-23', '', 1, 'Cash On Delivary'),
('6', 'Mili@gmail.com', 'pro4', 'Standard', 1250.25, '2018-03-23', '', 1, 'Cash On Delivary'),
('7', 'Jahan@gmail.com', 'pro4', 'Standard', 1250.25, '2018-03-23', '', 1, 'Cash On Delivary'),
('8', 'moinul@gmail.com', 'pro4', 'Standard', 1250.25, '2018-03-24', '', 1, 'Cash On Delivary'),
('9', 'Ripon@gmail.com', 'pro4', 'Cash On Delivary', 1250.25, '2018-04-18', 'no', 1, 'Cash On Delivary'),
('foid020C56599F', 'sajib@gamil.com', 'pro3658855', 'Standard', 1250.25, '2018-04-19', 'no', 0, 'Cash On Delivary'),
('foid0DC8F15B6D', 'ra@gamil.com', 'pro3658855', 'Standard', 1250.25, '2018-04-19', 'no', 1, 'Cash On Delivary'),
('foid3747D39651', 'sdfgsdf@gmail.com', 'pro2', 'Cash On Delivary', 1050.75, '2018-04-19', 'no', 0, 'Cash On Delivary'),
('foid516A1CB54F', 'Ripon1@gmail.com', 'pro1', 'Cash On Delivary', 990, '2018-04-18', 'no', 0, 'Cash On Delivary'),
('foid5336685200', 'asdfsadfsdas@gmail.com', 'pro2', 'Cash On Delivary', 1050.75, '2018-04-19', 'no', 0, 'Cash On Delivary'),
('foid65AF425DC6', '', 'pro2', '', 1050.75, '2018-04-19', 'no', 0, ''),
('foid70501E3600', '', 'pro2', '', 1050.75, '2018-04-19', 'no', 0, ''),
('foid784AE361AD', 'sdfgsdf@gmail.com', 'pro4', 'Cash On Delivary', 1250.25, '2018-04-18', 'no', 0, 'Cash On Delivary'),
('foidA5A45577BB', 'sdfgsdf@gmail.com', 'pro2', 'Cash On Delivary', 1050.75, '2018-04-19', 'no', 0, 'Cash On Delivary');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(50) NOT NULL,
  `product_typeid` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) CHARACTER SET cp1250 COLLATE cp1250_bin NOT NULL,
  `date` date NOT NULL,
  `Season` varchar(50) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_typeid`, `title`, `price`, `body`, `image`, `author`, `tags`, `date`, `Season`, `weight`) VALUES
('pro345898', 'pb02', 'white thin material', 990, '<p>Twill fabrics are easily recognizable because they will show diagonal weave or texture. The diagonal effect can range from very fine, subtle twills to much larger Imperial or Cavalry twills. Twills will almost always have a bit of shine, though the degree can depend on the weave, color, and cotton used. Twill is an extremely tight weave,  that can come in extremely high thread counts, some of which might be mistaken for silk. Because of the diagonal texture twill is a bit softer than broadcloth and will drape more easily. Twill won’t give you the same “crisp” look that freshly pressed broadcloth can, but it’s relatively easy to iron and resistant to wrinkles..<p\\>', 'upload/whitethin.jpg', 'Masud', 'white thin material', '2018-03-09', 'spring/ sutmn', 130),
('pro365865', 'pb03', 'blue thing material', 1050.75, '<p>Twill fabrics are easily recognizable because they will show diagonal weave or texture. The diagonal effect can range from very fine, subtle twills to much larger Imperial or Cavalry twills. Twills will almost always have a bit of shine, though the degree can depend on the weave, color, and cotton used. Twill is an extremely tight weave,  that can come in extremely high thread counts, some of which might be mistaken for silk. Because of the diagonal texture twill is a bit softer than broadcloth and will drape more easily. Twill won’t give you the same “crisp” look that freshly pressed broadcloth can, but it’s relatively easy to iron and resistant to wrinkles..<p\\>', 'upload/blue.jpg', 'Masud', 'blue thing material', '2018-03-09', 'summer/rain', 113),
('pro3658855', 'pb02', 'light blue and green check', 1250.25, '<p>Twill fabrics are easily recognizable because they will show diagonal weave or texture. The diagonal effect can range from very fine, subtle twills to much larger Imperial or Cavalry twills. Twills will almost always have a bit of shine, though the degree can depend on the weave, color, and cotton used. Twill is an extremely tight weave,  that can come in extremely high thread counts, some of which might be mistaken for silk. Because of the diagonal texture twill is a bit softer than broadcloth and will drape more easily. Twill won’t give you the same “crisp” look that freshly pressed broadcloth can, but it’s relatively easy to iron and resistant to wrinkles..<p\\>', 'upload/checkblue.jpg', 'admin', 'light blue', '2018-03-09', 'spring/autumn', 141);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_typeid` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  `product_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_typeid`, `cid`, `product_type`) VALUES
('pb02', 1, 'Flannel'),
('pb03', 2, '100% cotton'),
('pb05', 2, 'TW TWill Fabric'),
('pb06', 3, 'yarn dyed flannel');

-- --------------------------------------------------------

--
-- Table structure for table `shirt_design`
--

CREATE TABLE `shirt_design` (
  `design_id` varchar(255) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `pocket` varchar(50) NOT NULL,
  `sleeve` varchar(50) NOT NULL,
  `front` varchar(50) NOT NULL,
  `back_pleats` varchar(50) NOT NULL,
  `bottom` varchar(50) NOT NULL,
  `collar` varchar(50) NOT NULL,
  `cuffs` varchar(50) NOT NULL,
  `other` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shirt_design`
--

INSERT INTO `shirt_design` (`design_id`, `customer_email`, `product_id`, `pocket`, `sleeve`, `front`, `back_pleats`, `bottom`, `collar`, `cuffs`, `other`, `status`, `date`) VALUES
('1', 'Jahid@gmail.com', 'pro2', 'Classic pocket', '27', 'French Placket', 'Plain Pleats', 'Tri-Tab Bottom', 'Italian Collar', 'Round Cuffs', 'shoulder Epaucattes, ,Front Se', 1, '2018-03-25'),
('3', 'Rapon@gmail.com', 'pro2', 'No Pocket ', '64', 'French Placket', 'Plain Pleats', 'Tri-Tab Bottom', 'Italian Collar', 'Round Cuffs', 'shoulder Epaucattes, ,Front Se', 0, '0000-00-00'),
('des76D2BF', 'mukul@gmail.com', 'pro345898', 'No Pocket ', '64', 'French Placket', 'Plain Pleats', 'Tri-Tab Bottom', 'Italian Collar', 'Round Cuffs', 'none,design only', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `shirt_measurment`
--

CREATE TABLE `shirt_measurment` (
  `measurment_id` int(11) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `neck` int(11) NOT NULL,
  `chest` int(11) NOT NULL,
  `waist` int(11) NOT NULL,
  `hip` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `sleeve` int(11) NOT NULL,
  `fitness` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shirt_measurment`
--

INSERT INTO `shirt_measurment` (`measurment_id`, `customer_email`, `neck`, `chest`, `waist`, `hip`, `length`, `sleeve`, `fitness`) VALUES
(1, 'Jahid@gmail.com', 10, 30, 12, 30, 25, 27, '0'),
(9, 'Rapon@gmail.com', 12, 34, 35, 36, 13, 64, 'body fit'),
(14, 'mukul@gmail.com', 12, 34, 35, 36, 13, 64, 'body fit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70'),
(2, 'shuvo', '202cb962ac59075b964b07152d234b70'),
(3, 'minhaj', '202cb962ac59075b964b07152d234b70'),
(4, 'rokon', '202cb962ac59075b964b07152d234b70'),
(5, 'bably', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `fabric_order`
--
ALTER TABLE `fabric_order`
  ADD PRIMARY KEY (`foid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_1` (`product_typeid`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_typeid`),
  ADD KEY `fk_3` (`cid`);

--
-- Indexes for table `shirt_design`
--
ALTER TABLE `shirt_design`
  ADD PRIMARY KEY (`design_id`),
  ADD KEY `fk_7` (`customer_email`);

--
-- Indexes for table `shirt_measurment`
--
ALTER TABLE `shirt_measurment`
  ADD PRIMARY KEY (`measurment_id`),
  ADD KEY `fk_6` (`customer_email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `shirt_measurment`
--
ALTER TABLE `shirt_measurment`
  MODIFY `measurment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`product_typeid`) REFERENCES `product_type` (`product_typeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_type`
--
ALTER TABLE `product_type`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`cid`) REFERENCES `catagory` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
