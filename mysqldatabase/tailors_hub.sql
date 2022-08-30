-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 07:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailors_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_role`) VALUES
(1, 'Akarigbooladipo@gmail.com', '$2y$10$gP31UHpv/riztbxhbLjLyOqLe6UINsoY.SFaYARSHCIzzyQ7FfuBm', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_username` varchar(45) NOT NULL,
  `customer_firstname` varchar(45) NOT NULL,
  `customer_lastname` varchar(45) NOT NULL,
  `customer_gender` varchar(20) DEFAULT NULL,
  `customer_dob` varchar(20) NOT NULL,
  `customer_email` varchar(55) NOT NULL,
  `customer_phone` varchar(24) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_username`, `customer_firstname`, `customer_lastname`, `customer_gender`, `customer_dob`, `customer_email`, `customer_phone`, `customer_password`, `created_at`) VALUES
(3, 'Dclasyc2', 'Oladipo2', 'Akarigbo2', 'male', '1995-12-17', 'olayinka2@yahoo.com', '98977', '123456', '2022-07-08 23:33:43'),
(4, 'Dclasyc3', 'Oladipo3', 'Akarigbo3', 'female', '1990-12-15', 'Dekpour3@gmail.com', '2147483647', '$2y$10$YXNPHvPKpS8n3jX9SFSgg.a9N3wltnF8jtSDjGbsP2YA.kIzctcK6', '2022-07-09 00:07:57'),
(7, 'Dclasyc4', 'Oladipo4', 'Akarigbo4', 'male', '1994-02-17', 'olayinka3@yahoo.com', '07062354783', '$2y$10$fFTXgAaT7EOXRE0X3tFW0eIXPvZ7ZhLoBKOZX5Evvg4MKWr6I9BcO', '2022-07-09 00:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `productimage_url` varchar(225) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `tailor_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_desc`, `product_price`, `productimage_url`, `category_id`, `tailor_id`, `created_at`) VALUES
(2, 'Bridal Dress', 'White wedding dress for you, available in all sizes', 80000, 'ch2546343981657837477.jpg', 17, 3, '2022-07-14 23:24:37'),
(3, 'Fila', 'Multi-coloured Yoruba native cap. Can be worn on almost any native attire', 3500, 'ch20073534321657837693.jpg', 15, 3, '2022-07-14 23:28:13'),
(4, 'Chinos Pants', 'Fitted Chinos pants. Can be made available in any colour of choice. Available in all sizes', 5500, 'ch6223517261657837837.jpg', 9, 3, '2022-07-14 23:30:37'),
(5, 'Lumaris dress', 'Fitted women formal dress with slit sleeve', 24000, 'ch10801027751657962809.jpg', 16, 3, '2022-07-16 10:13:29'),
(6, 'Trouser', 'Ladies trouser for formal occassions', 5000, 'ch12149532901658824615.jpg', 16, 3, '2022-07-26 09:36:55'),
(7, 'Kaftan', 'Fitted Kaftan for men, it comes in all sizes', 20000, 'ch940562871658889498.jpg', 15, 3, '2022-07-27 03:38:18'),
(12, 'Dinner gown', 'This gown fits perfect for any evening occasions', 62000, 'ch11615161511659945992.jpg', 16, 4, '2022-08-08 09:06:32'),
(13, 'Kaftan', 'Nice kaftan for owanbe. Available in all sizes', 35000, 'ch249513171660040449.jpg', 15, 3, '2022-08-09 11:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) NOT NULL,
  `category_name` tinytext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`, `created_at`) VALUES
(9, 'Men Trousers', '2022-07-13 23:51:00'),
(15, 'Men Natives', '2022-07-14 23:00:02'),
(16, 'Women Formal', '2022-07-14 23:00:02'),
(17, 'Women Wedding', '2022-07-14 23:00:02'),
(18, 'Women Native', '2022-07-24 10:04:14'),
(19, 'Women Trousers', '2022-07-27 03:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `review_comment` varchar(500) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `tailor_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `review_comment`, `product_id`, `customer_id`, `tailor_id`, `created_at`) VALUES
(1, 'nice pants', NULL, 4, NULL, '2022-07-23 12:11:59'),
(2, 'nice pants', NULL, 4, NULL, '2022-07-23 13:10:59'),
(3, 'nice pants', NULL, 4, NULL, '2022-07-23 13:10:30'),
(4, 'ash trouser', NULL, 4, NULL, '2022-07-23 13:11:59'),
(5, 'Best fila', NULL, 4, NULL, '2022-07-23 13:11:59'),
(6, 'good to go', NULL, 4, NULL, '2022-07-23 13:11:59'),
(7, 'Lumaris', 5, 4, 3, '2022-07-23 13:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `tailors`
--

CREATE TABLE `tailors` (
  `tailor_id` int(11) NOT NULL,
  `tailor_username` varchar(60) NOT NULL,
  `tailor_firstname` varchar(45) NOT NULL,
  `tailor_lastname` varchar(45) NOT NULL,
  `tailor_gender` varchar(45) NOT NULL,
  `tailor_dob` date NOT NULL,
  `tailor_email` varchar(55) NOT NULL,
  `tailor_phone` varchar(24) NOT NULL,
  `tailor_password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tailors`
--

INSERT INTO `tailors` (`tailor_id`, `tailor_username`, `tailor_firstname`, `tailor_lastname`, `tailor_gender`, `tailor_dob`, `tailor_email`, `tailor_phone`, `tailor_password`, `created_at`) VALUES
(3, 'Kaflam', 'Olayinka', 'Akarigbo', 'female', '1994-03-30', 'olayinka@yahoo.com', '07062326905', '$2y$10$oDxIlddhGPxSRXegrpPfwupgqrlESEfxRENYEebVt1ml0TW0hQI/6', '2022-07-09 08:02:15'),
(4, 'Grandeur by Mipe', 'Olayinka', 'Olasupo', 'female', '1989-03-01', 'olasupo.olayinka@yahoo.com', '07062326909', '$2y$10$oDxIlddhGPxSRXegrpPfwupgqrlESEfxRENYEebVt1ml0TW0hQI/6', '2022-07-10 06:22:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_username_UNIQUE` (`customer_username`),
  ADD UNIQUE KEY `customer_email_UNIQUE` (`customer_email`),
  ADD UNIQUE KEY `customer_phone_UNIQUE` (`customer_phone`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `tailorkey_idx` (`tailor_id`),
  ADD KEY `categorykey_idx` (`category_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `custkey_idx` (`customer_id`),
  ADD KEY `rev_prod_key_idx` (`product_id`),
  ADD KEY `rev_tailorkey_idx` (`tailor_id`);

--
-- Indexes for table `tailors`
--
ALTER TABLE `tailors`
  ADD PRIMARY KEY (`tailor_id`),
  ADD UNIQUE KEY `tailor_email_UNIQUE` (`tailor_email`),
  ADD UNIQUE KEY `tailor_phone_UNIQUE` (`tailor_phone`),
  ADD UNIQUE KEY `tailor_username_UNIQUE` (`tailor_username`),
  ADD UNIQUE KEY `tailor_id_UNIQUE` (`tailor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tailors`
--
ALTER TABLE `tailors`
  MODIFY `tailor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `categorykey` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tailorkey` FOREIGN KEY (`tailor_id`) REFERENCES `tailors` (`tailor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `rev_custkey` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rev_prodkey` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rev_tailorkey` FOREIGN KEY (`tailor_id`) REFERENCES `tailors` (`tailor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
