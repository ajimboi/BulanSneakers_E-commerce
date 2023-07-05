-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 04:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boolandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `u_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `payment_mode`, `amount_paid`, `u_id`, `order_date`) VALUES
(16, '', '1200', 39, '2021-07-10 14:13:55'),
(17, 'cod', '0', 0, '2021-07-10 14:14:06'),
(18, 'cod', '1200', 39, '2021-07-10 14:15:36'),
(19, 'cod', '1200', 39, '2021-07-10 14:20:25'),
(20, '', '1200', 39, '2021-07-10 14:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_id`, `product_id`, `order_quantity`) VALUES
(8, 9, 1),
(9, 10, 1),
(9, 9, 1),
(10, 9, 1),
(11, 10, 1),
(12, 10, 1),
(13, 12, 1),
(14, 9, 1),
(14, 10, 1),
(15, 23, 3),
(15, 2, 1),
(16, 2, 1),
(18, 3, 1),
(19, 1, 1),
(20, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_image`, `product_code`, `product_qty`, `product_size`) VALUES
(1, 'AIR JORDAN 1 LOW SMOKE GREY UK6', '1200', '../dashboard/dist/img/products/Shoe1.png', 's1001', 0, 6),
(2, 'AIR JORDAN 1 LOW SMOKE GREY UK7', '1200', '../dashboard/dist/img/products/Shoe1.png', 's1002', 0, 7),
(3, 'AIR JORDAN 1 LOW SMOKE GREY UK8', '1200', '../dashboard/dist/img/products/Shoe1.png', 's1003', 0, 8),
(4, 'AIR JORDAN 1 LOW SMOKE GREY UK9', '1200', '../dashboard/dist/img/products/Shoe1.png', 's1004', 0, 9),
(5, 'AIR JORDAN 1 LOW PEBBLED RED UK6', '600', '../dashboard/dist/img/products/Shoe2.png', 's2001', 0, 6),
(6, 'AIR JORDAN 1 LOW PEBBLED RED UK7', '600', '../dashboard/dist/img/products/Shoe2.png', 's2002', 0, 7),
(7, 'AIR JORDAN 1 LOW PEBBLED RED UK8', '600', '../dashboard/dist/img/products/Shoe2.png', 's2003', 0, 8),
(8, 'AIR JORDAN 1 LOW PEBBLED RED UK9', '600', '../dashboard/dist/img/products/Shoe2.png', 's2004', 0, 9),
(9, 'DUNK LOW UNC UK6', '1300', '../dashboard/dist/img/products/Shoe3.png', 's3001', 0, 6),
(10, 'DUNK LOW UNC UK7', '1300', '../dashboard/dist/img/products/Shoe3.png', 's3002', 0, 7),
(11, 'DUNK LOW UNC UK8', '1300', '../dashboard/dist/img/products/Shoe3.png', 's3003', 0, 8),
(12, 'DUNK LOW UNC UK9', '1300', '../dashboard/dist/img/products/Shoe3.png', 's3004', 0, 9),
(13, 'DUNK HIGH BODEGA LEGEND FAUNA BROWN UK6', '1500', '../dashboard/dist/img/products/Shoe4.png', 's4001', 0, 6),
(14, 'DUNK HIGH BODEGA LEGEND FAUNA BROWN UK7', '1500', '../dashboard/dist/img/products/Shoe4.png', 's4002', 0, 7),
(15, 'DUNK HIGH BODEGA LEGEND FAUNA BROWN UK8', '1500', '../dashboard/dist/img/products/Shoe4.png', 's4003', 0, 8),
(16, 'DUNK HIGH BODEGA LEGEND FAUNA BROWN UK9', '1500', '../dashboard/dist/img/products/Shoe4.png', 's4004', 0, 9),
(17, 'AIR JORDAN 1 RETRO COURT PURPLE UK6', '900', '../dashboard/dist/img/products/Shoe5.png', 's5001', 0, 6),
(18, 'AIR JORDAN 1 RETRO COURT PURPLE UK7', '900', '../dashboard/dist/img/products/Shoe5.png', 's5002', 0, 7),
(19, 'AIR JORDAN 1 RETRO COURT PURPLE UK8', '900', '../dashboard/dist/img/products/Shoe5.png', 's5003', 0, 8),
(20, 'AIR JORDAN 1 RETRO COURT PURPLE UK9', '900', '../dashboard/dist/img/products/Shoe5.png', 's5004', 0, 9),
(21, 'AIR JORDAN 1 LOW UNIVERSITY GOLD UK6', '450', '../dashboard/dist/img/products/Shoe6.png', 's6001', 0, 6),
(22, 'AIR JORDAN 1 LOW UNIVERSITY GOLD UK7', '450', '../dashboard/dist/img/products/Shoe6.png', 's6002', 0, 7),
(23, 'AIR JORDAN 1 LOW UNIVERSITY GOLD UK8', '450', '../dashboard/dist/img/products/Shoe6.png', 's6003', 0, 8),
(24, 'AIR JORDAN 1 LOW UNIVERSITY GOLD UK9', '450', '../dashboard/dist/img/products/Shoe6.png', 's6004', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_username` varchar(100) NOT NULL,
  `u_password` text NOT NULL,
  `u_gender` varchar(100) NOT NULL,
  `u_address` varchar(100) NOT NULL,
  `u_phoneNo` varchar(100) NOT NULL,
  `u_fullname` varchar(100) NOT NULL,
  `u_levelid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_username`, `u_password`, `u_gender`, `u_address`, `u_phoneNo`, `u_fullname`, `u_levelid`) VALUES
(34, 'admin@gmail.com', 'admin', '$2y$10$yS4yTFxLhS2cVVXihdVoeeGqeigmi6iiW4IjTInoabN0JG4bqn2ia', 'Male', '', '0123456789', 'John Doe', 'Admin'),
(35, 'member@gmail.com', 'member', '$2y$10$eJwsVLczHUlRET0R8BhY3.XJcquMKbOocfFBZC3hPbVdo1CiVeKje', 'Male', '2238 Lorong Inai 3, Taman Ria Jaya, 08000 Sungai Petani Kedah ', '0123456789', 'Ahmad Alif', 'Member'),
(36, 'ramly@gmail.com', 'ramly', '$2y$10$UgKf6kWjTD3PFy8xfWfG/Ojiv7XZGjMFbL1mZEteyFCGqvph46KuO', 'Male', '', '0123456789', 'Ramly', 'Member'),
(39, 'hzimzmri@gmail.com', 'hzimzmri', '$2y$10$BIgvRgs1BfynAcewdl/Qo.uj8xNPG2Ee29gQy1cgnVp7iErSFFhry', 'Male', '45 den bank crescent S10 5PB', '32321321321', 'Muhd Hazim', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_username` (`u_username`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
