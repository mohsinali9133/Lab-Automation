-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2026 at 09:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_automation`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_id` varchar(20) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_type` varchar(100) DEFAULT NULL,
  `revision_no` varchar(20) DEFAULT NULL,
  `manufacturing_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `product_type`, `revision_no`, `manufacturing_date`, `status`) VALUES
(2, 'INS-1', 'INSULATOR', 'ELECTRICAL', '1', '2026-05-17', 'Completed'),
(3, 'CAP-1', 'CAPICITOR', 'ELECTRICAL', '1', '2026-05-13', 'Completed'),
(4, 'MOT-1', 'MOTHERBOARD', 'ELECTRICAL', '1', '2026-05-03', 'Completed'),
(5, 'CAP-2', 'CAPICITOR', 'ELECTRICAL', '54', '2026-05-13', 'Completed'),
(6, 'CAP-3', 'CAPICITOR', 'ELECTRICAL', '67', '2026-06-01', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `testing_records`
--

CREATE TABLE `testing_records` (
  `id` int(11) NOT NULL,
  `testing_id` varchar(20) DEFAULT NULL,
  `product_id` varchar(20) DEFAULT NULL,
  `test_type` varchar(100) DEFAULT NULL,
  `test_result` varchar(50) DEFAULT NULL,
  `engineer_name` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `testing_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testing_records`
--

INSERT INTO `testing_records` (`id`, `testing_id`, `product_id`, `test_type`, `test_result`, `engineer_name`, `remarks`, `testing_date`) VALUES
(1, 'TEST-1', 'CAP-1', 'ELECTRICAL', 'Passed', 'MOHSIN', 'PASSED', '2026-05-22'),
(2, 'TEST-2', 'INS-1', 'ELECTRICAL', 'Failed', 'MOHSIN', 'FAILED', '2026-05-15'),
(3, 'TEST-3', 'CAP-1', 'ELECTRICAL', 'Failed', 'MOHSIN', 'failed', '2026-05-22'),
(4, 'TEST-4', 'MOT-1', 'ELECTRICAL', 'Passed', 'MOHSIN', 'PASSED', '2026-05-23'),
(5, 'TEST-5', 'CAP-2', 'ELECTRICAL', 'Passed', 'MOHSIN', 'PASSED', '2026-05-25'),
(6, 'TEST-6', 'MOT-1', 'software', 'Failed', 'Ali', 'Failed', '2026-05-19'),
(7, 'TEST-7', 'CAP-3', 'software', 'Passed', 'MOHSIN', 'PASSED', '2026-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin123', 'admin'),
(3, 'mohsin', 'mohsin123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `testing_records`
--
ALTER TABLE `testing_records`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testing_id` (`testing_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testing_records`
--
ALTER TABLE `testing_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
