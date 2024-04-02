-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 02:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `full_name`, `username`, `password`) VALUES
(14, 'Lakna ', 'Premachandra', '81e3e5600240424d5bb00cce0e86eb47'),
(15, 'chami', 'chami', '202cb962ac59075b964b07152d234b70'),
(16, 'nilani ', 'nilani', '202cb962ac59075b964b07152d234b70'),
(17, 'champi', 'champi', '415051c863371511da2fd95436a55668'),
(18, 'chami', 'chami', '8145ee7c8769fdb233e6cac7d32cfad2');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(225) NOT NULL,
  `in_stock` varchar(50) NOT NULL,
  `out_stock` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`id`, `title`, `image_name`, `in_stock`, `out_stock`) VALUES
(21, 'pizza', 'Category8.png', 'no', 'no'),
(22, 'no', 'Category307.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(50,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category` int(100) UNSIGNED NOT NULL,
  `in_stock` varchar(100) NOT NULL,
  `out_stock` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `food_table`
--

INSERT INTO `food_table` (`id`, `title`, `description`, `price`, `image_name`, `category`, `in_stock`, `out_stock`) VALUES
(3, 'huhfummm', 'djfo', 44, '', 20, 'no', ''),
(4, 'huhfummm', 'djfo', 44, 'f936.png', 20, 'no', ''),
(6, 'kottu', 'kottu large', 500, 'f292.jpg', 20, 'yes', ''),
(7, 'pizza', 'medium', 3000, 'f685.jpg', 22, 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `total` varchar(200) NOT NULL,
  `customer` varchar(150) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `food`, `price`, `qty`, `total`, `customer`, `phone_no`, `address`, `date`, `status`) VALUES
(1, 'huhfummm', '44', '1', '44', '', '', 'ncdhbhfgteyueuf', '2023-12-16 11:07:14', 'Processing'),
(2, 'huhfummm', '44', '10', '440', 'lakna', '6789023567', 'efjuehfoufo', '2023-12-16 11:10:37', 'Dispatched'),
(3, 'huhfummm', '44', '1', '44', 'Nimal', '5775567', 'bhvffygbhunjdcftvgybh', '2023-12-16 01:48:27', 'Delivered'),
(4, 'huhfummm', '44', '1', '44', 'Nimal', '1234567890', 'qwertyuioasdfghjkzxcvbnm', '2023-12-17 02:09:44', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_table`
--

CREATE TABLE `reservation_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `person` int(200) NOT NULL,
  `reservation_date` datetime NOT NULL,
  `reservation_time` time NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reservation_table`
--

INSERT INTO `reservation_table` (`id`, `customer_name`, `phone_number`, `person`, `reservation_date`, `reservation_time`, `message`) VALUES
(2, 'lakna', '1234567890', 10, '2023-12-23 00:00:00', '19:00:00', 'table'),
(3, 'saman', '7898767898', 10, '2023-12-20 00:00:00', '16:30:00', 'table'),
(4, 'samal', '6765676567', 2, '2024-01-03 00:00:00', '23:30:00', 'table'),
(5, 'hahah', '7389', 11, '2023-12-29 00:00:00', '22:35:00', 'table');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'Lakna', 'lakna@gmail.com', '$2y$10$rKwIhYyA1Kz8zYxpfelsHuiV9tOtJWVq4Qjv5ECOnHK.zPWdItuH2'),
(2, 'Saman', 'saman@gmail.com', '$2y$10$j.GShqBjZBdIi/d4tFm3de0TQlFvex5nzfLxmkerfIv2/qPr2ov36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_table`
--
ALTER TABLE `reservation_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation_table`
--
ALTER TABLE `reservation_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
