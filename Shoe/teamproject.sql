-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 04:37 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address` int(9) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `city` varchar(15) NOT NULL,
  `postal_code` varchar(7) NOT NULL,
  `province` varchar(15) NOT NULL,
  `street` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `user_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address`, `first_name`, `last_name`, `city`, `postal_code`, `province`, `street`, `country`, `user_id`) VALUES
(24, 'Bob', 'blabla', 'montreal', 'h9z 3x1', 'qc', 'sainte croix', 'canada', 2),
(25, 'Thuyon', 'SAaweae', 'Montreal-west', 'H8Z 3C6', 'Quebec', '893 rue ste catherine', 'Canada', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` int(200) NOT NULL,
  `size` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(7) NOT NULL,
  `qoh` int(200) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `images` varchar(500) NOT NULL,
  `IMGBOTTOM` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `price`, `qoh`, `item_description`, `images`, `IMGBOTTOM`) VALUES
(1, 'Nike2', 100, 100, 'Air max', 'images/grid4.jpg', 'images/grid4-bottom.jpg'),
(4, 'Nike', 150, 120, 'Air max Blue', 'images/grid6.jpg', 'images/grid6-bottom.jpg'),
(5, 'nike', 34, 130, 'fd', 'images/grid3.jpg', 'images/grid3-bottom.jpg'),
(6, 'nike', 34, 130, 'nike air max', 'images/grid5.jpg', 'images/grid5-bottom.jpg'),
(7, 'Nike', 120, 150, 'nike blue', 'images/grid7.jpg', 'images/grid7-bottom.jpg'),
(8, 'nike', 130, 50, 'nike air', 'images/grid8.jpg', 'images/grid8-bottom.jpg'),
(9, 'nike air max black', 130, 120, 'nike air max', 'images/grid9.jpg', 'images/grid9-bottom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(9) NOT NULL,
  `address` int(9) NOT NULL,
  `order_date` date NOT NULL,
  `payment_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address`, `order_date`, `payment_id`) VALUES
(19, 2, 25, '2016-04-23', 3),
(20, 2, 25, '2016-04-23', 3),
(21, 2, 24, '2016-05-03', 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `order_detail_id` int(9) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `sales_price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `order_detail_id`, `item_id`, `quantity`, `sales_price`) VALUES
(19, 99, 4, 2, 150),
(19, 100, 5, 2, 34),
(19, 101, 7, 5, 120),
(20, 102, 4, 2, 150),
(20, 103, 8, 7, 130),
(21, 104, 5, 5, 34);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `credit_type` varchar(20) NOT NULL,
  `card_number` int(16) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `security_code` int(3) NOT NULL,
  `expiration_date` date NOT NULL,
  `address` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `user_id`, `credit_type`, `card_number`, `card_name`, `security_code`, `expiration_date`, `address`) VALUES
(3, 2, 'awd', 123123, 'awdadw', 213, '2001-05-02', 24),
(4, 2, 'mastercard', 2147483647, 'bob', 231, '2020-03-01', 24),
(5, 2, 'mastercard', 2147483647, 'bob', 231, '2020-03-01', 24),
(6, 2, 'visa', 2147483647, 'leo', 701, '2025-01-01', 24);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_type_id`) VALUES
(1, 'admin', 'admin', 1),
(2, 'leo', 'leo', 2),
(3, 'test', 'test', 2),
(13, 'thuyohn', 'thuyohn', 2),
(14, 'check', 'check', 2),
(15, 'leo2', 'leo2', 2),
(16, 'diana', 'diana', 2),
(17, 'randolph', 'randoph', 2),
(18, 'alex', 'alex', 2),
(19, 'j', 'j', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(1) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_user_id_fk` (`user_id`),
  ADD KEY `cart_item_id_fk` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address` (`address`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address` (`address`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_user_type_id_fk` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cart_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_fk` FOREIGN KEY (`address`) REFERENCES `address` (`address`),
  ADD CONSTRAINT `orders_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_detail_order_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD CONSTRAINT `payment_address_fk` FOREIGN KEY (`address`) REFERENCES `address` (`address`),
  ADD CONSTRAINT `payment_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_user_type_id_fk` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
