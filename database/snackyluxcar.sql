-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 01, 2021 at 04:44 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snackyluxcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `products_name` varchar(50) NOT NULL,
  `products_quantity` int(2) NOT NULL,
  `products_price` double(20,2) NOT NULL,
  `products_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `products_id`, `products_name`, `products_quantity`, `products_price`, `products_image`) VALUES
(79, 56, 30, 'LAMBORGHINI URUS GRAPHITE CAPSULE', 1, 30000.00, 'urusgracapsule.jpg'),
(81, 58, 19, 'LAMBORGHINI AVENTADOR SV', 9, 30000.00, 'aventadorSVcouple2018.jpg'),
(82, 59, 28, 'LAMBORGHINI URUS 2019', 4, 30000.00, 'urus2019.jpg'),
(83, 59, 16, 'LAMBORGHINI AVENTADOR S ROADSTER', 4, 30000.00, 'aventador_S_Roadster.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `models_id` int(11) NOT NULL,
  `models_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`models_id`, `models_name`) VALUES
(1, 'AVENTADOR'),
(2, 'HURACÁN'),
(3, 'URUS'),
(4, 'LIMITED');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` double(20,2) NOT NULL,
  `created_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `total`, `created_time`) VALUES
(159, 56, 90000.00, '2020/12/31 11:52'),
(160, 56, 30000.00, '2020/12/31 12:58'),
(161, 56, 30000.00, '2020/12/31 13:07'),
(162, 57, 180000.00, '2020/12/31 15:20'),
(163, 57, 150000.00, '2020/12/31 15:57'),
(164, 58, 0.00, '2020/12/31 19:32'),
(165, 60, 180000.00, '2020/12/31 20:01'),
(166, 61, 360000.00, '2020/12/31 20:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `products_price` double(20,2) NOT NULL,
  `products_quantity` int(2) NOT NULL,
  `created_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `products_id`, `products_price`, `products_quantity`, `created_time`) VALUES
(159, 11, 30000.00, 1, '2020/12/31 11:52'),
(159, 16, 30000.00, 1, '2020/12/31 11:52'),
(159, 30, 30000.00, 1, '2020/12/31 11:52'),
(160, 12, 30000.00, 1, '2020/12/31 12:58'),
(161, 9, 30000.00, 1, '2020/12/31 13:07'),
(162, 9, 30000.00, 2, '2020/12/31 15:20'),
(162, 16, 30000.00, 1, '2020/12/31 15:20'),
(162, 29, 30000.00, 3, '2020/12/31 15:20'),
(163, 15, 30000.00, 5, '2020/12/31 15:57'),
(164, 6, 30000.00, 0, '2020/12/31 19:32'),
(165, 25, 30000.00, 2, '2020/12/31 20:01'),
(165, 30, 30000.00, 1, '2020/12/31 20:01'),
(165, 40, 30000.00, 3, '2020/12/31 20:01'),
(166, 16, 30000.00, 5, '2020/12/31 20:16'),
(166, 19, 30000.00, 3, '2020/12/31 20:16'),
(166, 28, 30000.00, 4, '2020/12/31 20:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_name` varchar(50) NOT NULL,
  `products_price` double(20,2) NOT NULL,
  `products_quantity` int(2) NOT NULL,
  `products_detail` varchar(1000) NOT NULL,
  `products_image` varchar(50) NOT NULL,
  `models_id` int(11) NOT NULL,
  `products_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products_price`, `products_quantity`, `products_detail`, `products_image`, `models_id`, `products_type_id`) VALUES
(6, 'LAMBORGHINI HURACAN CAPSULE', 30000.00, 10, 'abc', 'huracancapsule.jpg', 2, 1),
(9, 'LAMBORGHINI HURACAN 2018', 30000.00, 10, 'abc', 'huracancouple2018.jpg', 2, 2),
(10, 'LAMBORGHINI HURACAN EVO', 30000.00, 10, 'abc', 'huracanEVO.jpg', 2, 2),
(11, 'LAMBORGHINI HURACAN EVO RWD', 30000.00, 10, 'abc', 'huracanevorwd.jpg', 2, 3),
(12, 'LAMBORGHINI HURACAN SPYDER', 30000.00, 10, 'abc', 'huracanspyder.jpg', 2, 3),
(13, 'LAMBORGHINI HURACAN STO', 30000.00, 10, 'abc', 'huracansto.jpg', 2, 3),
(15, 'LAMBORGHINI AVENTADOR LP700-41', 30000.00, 10, 'abc', 'aventador_lp700-4.jpg', 1, 1),
(16, 'LAMBORGHINI AVENTADOR S ROADSTER', 30000.00, 7, 'abc', 'aventador_S_Roadster.jpg', 1, 1),
(17, 'LAMBORGHINI AVENTADOR LP580-02', 30000.00, 10, 'abc', 'aventadorlp580-02.jpg', 1, 1),
(18, 'LAMBORGHINI AVENTADOR LP700-4', 30000.00, 10, 'abc', 'aventadorlp700-4.jpeg', 1, 2),
(19, 'LAMBORGHINI AVENTADOR SV', 30000.00, 7, 'abc', 'aventadorSVcouple2018.jpg', 1, 2),
(21, 'LAMBORGHINI AVENTADOR LP750-SV', 30000.00, 10, 'abc', 'aventadorlp750-sv.jpg', 1, 3),
(22, 'LAMBORGHINI AVENTADOR SVJ', 30000.00, 10, 'abc', 'aventadorSVJ.jpg', 1, 3),
(23, 'LAMBORGHINI AVENTADOR SVJ 2021', 30000.00, 10, 'abc', 'aventadorSVJ2021.jpg', 1, 3),
(25, 'LAMBORGHINI URUS ST-X', 30000.00, 10, 'abc', 'urus_ST-X.jpg', 3, 1),
(27, 'LAMBORGHINI URUS', 30000.00, 10, 'abc', 'urus.png', 3, 1),
(28, 'LAMBORGHINI URUS 2019', 30000.00, 6, 'abc', 'urus2019.jpg', 3, 2),
(29, 'LAMBORGHINI URUS 2020', 30000.00, 10, 'abc', 'urus2020.jpg', 3, 2),
(30, 'LAMBORGHINI URUS GRAPHITE CAPSULE', 30000.00, 10, 'abc', 'urusgracapsule.jpg', 3, 2),
(37, 'LAMBORGHINI CENTENARIO', 2000000000.00, 10, 'abc', 'centenario.jpg', 4, 3),
(38, 'LAMBORGHINI VENENO ROASTER', 2000000000.00, 8, 'abc', 'veneno_roadster.jpg', 4, 3),
(39, 'LAMBORGHINI HURACAN LP640-4', 30000.00, 10, 'abc', 'huracan_LP640-4.jpg', 2, 1),
(40, 'LAMBORGHINI HURACAN LP580-02 ', 30000.00, 10, 'abc', 'huracan_LP580-02.jpg', 2, 1),
(41, 'LAMBORGHINI AVENTADOR', 30000.00, 9, 'abc', 'aventador.jpg', 1, 2),
(43, 'LAMBORGHINI ASTERION', 2000000000.00, 0, 'abc', 'asterion.jpg', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products_type`
--

CREATE TABLE `products_type` (
  `products_type_id` int(11) NOT NULL,
  `products_types_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_type`
--

INSERT INTO `products_type` (`products_type_id`, `products_types_name`) VALUES
(1, 'HOT PRODUCTS'),
(2, 'USED'),
(3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `passwordd` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `name`, `phone`, `email`, `address`, `passwordd`, `role`) VALUES
(28, 'admin', 'admin', '1111111111', 'aaaaaa', 'aaaaaa', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(56, 'hnhoangdz', 'sasuke', '0911234567', 'snacky0907@Gmail.com', '89 Lê Đức Thọ Mỹ Đình 2', '827ccb0eea8a706c4c34a16891f84e7b', 'customer'),
(57, 'huyhoang', 'huyhoang', '0918765432', 'sql@gmail.com', 'abc', '202cb962ac59075b964b07152d234b70', 'customer'),
(58, 'dinhhuyhoang', 'hoang', '0913333333', 'abcabc123@gmail.com', '123123', '202cb962ac59075b964b07152d234b70', 'customer'),
(59, 'hoang123', 'hoang', '0918888888', 'pol@gmail.com', 'adas', '202cb962ac59075b964b07152d234b70', 'customer'),
(60, 'hoang321', 'hnnn', '0917777777', 'mal@gmail.com', '1231', '202cb962ac59075b964b07152d234b70', 'customer'),
(61, 'abc123', 'aaaaaaaa', '0912222222', 'noo@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`models_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cus_id` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`products_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `models_id` (`models_id`),
  ADD KEY `products_type_id` (`products_type_id`);

--
-- Indexes for table `products_type`
--
ALTER TABLE `products_type`
  ADD PRIMARY KEY (`products_type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `cus_username` (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `models_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products_type`
--
ALTER TABLE `products_type`
  MODIFY `products_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`models_id`) REFERENCES `models` (`models_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`products_type_id`) REFERENCES `products_type` (`products_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
