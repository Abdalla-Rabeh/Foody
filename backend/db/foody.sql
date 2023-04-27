-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2023 at 01:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'product name',
  `how_to_make` text NOT NULL COMMENT 'how to make that product',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `how_to_make`, `image`) VALUES
(1, 'Product', 'This is Recipe How To Make The Product', 'image'),
(2, 'Product', 'This is Recipe How To Make The Product', 'image'),
(3, 'Product', 'This is Recipe How To Make The Product', 'image'),
(4, 'Product', 'This is Recipe How To Make The Product', 'image'),
(5, 'Product', 'This is Recipe How To Make The Product', 'image'),
(6, 'Product', 'This is Recipe How To Make The Product', 'image'),
(7, 'Product', 'This is Recipe How To Make The Product', 'image'),
(8, 'Product', 'This is Recipe How To Make The Product', 'image'),
(9, 'Product', 'This is Recipe How To Make The Product', 'image'),
(10, 'Product', 'This is Recipe How To Make The Product', 'image'),
(11, 'Product', 'This is Recipe How To Make The Product', 'image'),
(12, 'Product', 'This is Recipe How To Make The Product', 'image'),
(13, 'Product', 'This is Recipe How To Make The Product', 'image'),
(14, 'Product', 'This is Recipe How To Make The Product', 'image'),
(15, 'Product', 'This is Recipe How To Make The Product', 'image'),
(16, 'Product', 'This is Recipe How To Make The Product', 'image'),
(17, 'Product', 'This is Recipe How To Make The Product', 'image'),
(18, 'Product', 'This is Recipe How To Make The Product', 'image'),
(19, 'Product', 'This is Recipe How To Make The Product', 'image'),
(20, 'Product', 'This is Recipe How To Make The Product', 'image'),
(21, 'Product', 'This is Recipe How To Make The Product', 'image'),
(22, 'Product', 'This is Recipe How To Make The Product', 'image'),
(23, 'Product', 'This is Recipe How To Make The Product', 'image'),
(24, 'Product', 'This is Recipe How To Make The Product', 'image'),
(25, 'Product', 'This is Recipe How To Make The Product', 'image'),
(26, 'Product', 'This is Recipe How To Make The Product', 'image'),
(27, 'Product', 'This is Recipe How To Make The Product', 'image'),
(28, 'Product', 'This is Recipe How To Make The Product', 'image'),
(29, 'Product', 'This is Recipe How To Make The Product', 'image'),
(30, 'Product', 'This is Recipe How To Make The Product', 'image'),
(31, 'Product', 'This is Recipe How To Make The Product', 'image'),
(32, 'Product', 'This is Recipe How To Make The Product', 'image'),
(33, 'Product', 'This is Recipe How To Make The Product', 'image');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
