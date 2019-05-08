-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2016 at 11:09 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2016`
--

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE `date` (
  `dateid` int(11) NOT NULL,
  `day` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `venue_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`dateid`, `day`, `month`, `year`, `time`, `cost`, `session`, `venue_name`) VALUES
(1, '12', 'OCT', '2016', '8.00AM', 80000, 'Morning', 'media corner '),
(2, '14', 'SEP', '2016', '6.00PM', 80000, 'Evening', 'Business centre '),
(3, '16', 'SEP', '2016', '8.00PM', 80000, 'Evening', 'Business centre'),
(4, '18', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'media corner '),
(5, '20', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'Celebrity '),
(6, '22', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'media corner  '),
(7, '24', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'Celebrity '),
(8, '28', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'Business centre'),
(9, '30', 'SEP', '2016', '8.00AM', 80000, 'Evening', 'media corner  '),
(10, '1', 'OCT', '2016', '8.00AM', 80000, 'Morning', 'Business centre'),
(11, '12', 'OCT', '2016', '8.00AM', 80000, 'Evening', 'Celebrity '),
(12, '12', 'SEP', '2016', '8.00AM', 80000, 'Morning', 'Business centre');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `center_name` varchar(255) DEFAULT NULL,
  `t_cost` float DEFAULT NULL,
  `confirm_by_user` int(11) DEFAULT NULL,
  `confirm_by_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `id`, `user_name`, `p_id`, `center_name`, `t_cost`, `confirm_by_user`, `confirm_by_admin`) VALUES
(1, 1, ' mishuk', 1, 'Celebrity ', 80000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_productdate`
--

CREATE TABLE `order_productdate` (
  `order_product_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `center_name` varchar(255) DEFAULT NULL,
  `t_cost` float DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `confirm_by_user` int(11) DEFAULT NULL,
  `confirm_by_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_productdate`
--

INSERT INTO `order_productdate` (`order_product_id`, `id`, `user_name`, `p_id`, `center_name`, `t_cost`, `day`, `month`, `year`, `confirm_by_user`, `confirm_by_admin`) VALUES
(1, 1, ' mishuk', 1, 'media corner ', 80000, '12', 'OCT', '2016', 1, NULL),
(2, 4, ' korim ', 1, 'media corner ', 80000, '12', 'OCT', '2016', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(55) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `user_level` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `massage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `gender`, `user_level`, `type`, `location`, `phonenumber`, `massage`) VALUES
(1, 'mishuk', '', '', 'password123', 'jahidulalam13@outlook.com', '', 1, 'a', NULL, NULL, NULL),
(2, 'admin', '', '', 'password123', 'admin@gmail.com', '', 1, 'a', NULL, NULL, NULL),
(3, 'mishuk15', '', '', 'password123', 'jahidulalam13@outlook.com', '', 1, 'a', NULL, NULL, NULL),
(4, 'korim ', 'mr', 'korim ', 'M!shuk2015.', 'korim@gmail.com', 'Male', 2, 'a', 'Dhaka.bangladesh,1200 ', '01681805060', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `p_id` int(11) NOT NULL,
  `post_name` varchar(255) DEFAULT NULL,
  `post_price` float DEFAULT NULL,
  `post_capasity` int(11) DEFAULT NULL,
  `post_sqfeet` varchar(255) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_content` text,
  `post_available_date` varchar(255) DEFAULT NULL,
  `post_available_time` varchar(255) DEFAULT NULL,
  `post_status` varchar(255) DEFAULT NULL,
  `post_availality` int(11) DEFAULT NULL,
  `post_sesson` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`p_id`, `post_name`, `post_price`, `post_capasity`, `post_sqfeet`, `post_image`, `post_content`, `post_available_date`, `post_available_time`, `post_status`, `post_availality`, `post_sesson`) VALUES
(1, 'Celebrity ', 80000, 1200, 'Size in feet 122 x 98, Sq feet 8,625, Theater 1200, Round Table 1000 and Reception 1200.', 'clebrity.jpg', 'The â€˜Celebrityâ€™ is the epicenter, a unique and purpose built architecture. \r\nThe superb and spacious Celebrity has the world class amenities. \r\nThis grand hall with its beautiful chandelier is suitable for dinners,\r\nparties, seminars, corporate get-togethers or any grand occasion.\r\nA complete kitchen facility is also available.', '6-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(2, 'Business centre ', 60000, 750, 'Size in feet 29 x 25, Sq feet 740, Rectangular 42.', 'business.jpg', 'In business you never get what you deserve; \r\nyou get what you negotiate for. \r\nNegotiation requires cool nerve and the CC \r\nâ€˜Legendary, Eternity, Milestone & Elegantâ€™ \r\ngive you that fresh and soothing feeling of\r\n a place where you can rediscover the strength\r\n of your mind. We have created an ambiance in all\r\n 4 meeting rooms i.e. Legendary, Eternity, \r\nMilestone and Elegant that makes your mind speak.', '8-oct-2016', '8.00 AM', 'Available', 1, 'Morning'),
(3, 'media corner', 40000, 200, 'Size in feet 68 x 51, Sq feet 3,468, Theater 200, Round Table 150 and Reception 200.', 'media.jpg', 'The amenities of international standard media meetings with\r\nall significant facilities are available on both the venues.\r\nBright lighting with sound facilities and special podium will\r\nelevate your media meet to a new height. It can also be used for \r\nsmall parties, get-togethers, cocktails etc.', '10-oct-2016', '8.00 AM', 'Available', 1, 'Morning');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`dateid`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`);

--
-- Indexes for table `order_productdate`
--
ALTER TABLE `order_productdate`
  ADD PRIMARY KEY (`order_product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `date`
--
ALTER TABLE `date`
  MODIFY `dateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_productdate`
--
ALTER TABLE `order_productdate`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
