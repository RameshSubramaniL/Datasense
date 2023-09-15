-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 10:59 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop_details`
--

CREATE TABLE `shop_details` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `opening_hours` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `payment_methods` varchar(255) DEFAULT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `date_established` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_details`
--

INSERT INTO `shop_details` (`shop_id`, `shop_name`, `address`, `latitude`, `longitude`, `phone_number`, `email`, `description`, `opening_hours`, `image_url`, `payment_methods`, `owner_name`, `date_established`) VALUES
(12, 'ProzoneMall', 'Ganapathy', '11.054774', '76.991530', '78945654', 'prozone@gmail.com', 'Mall', 'Mon-Sat: 9 AM - 7 PM', 'png', 'Cash, Credit Card, Mobile Payments', 'chris', '2022-05-21'),
(13, 'HelmetShop', 'Ganapathy', '11.024279', '76.977798', '789456545', 'helmetshop@gmail.com', 'Helmetshop', 'Mon-Sat: 9 AM - 7 PM', 'png', 'Cash, Credit Card, Mobile Payments', 'chrisjoel', '2021-05-21'),
(14, 'RE Showroom', 'Ganapathy', '11.041121', '76.981822', '789456545', 'REShowRoom@gmail.com', 'RoyalEnfield', 'Mon-Sat: 9 AM - 7 PM', 'png', 'Cash, Credit Card, Mobile Payments', 'chrisjoel', '2021-05-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD PRIMARY KEY (`shop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_details`
--
ALTER TABLE `shop_details`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
