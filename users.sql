-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2026 at 09:00 AM
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
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `rice_inventory`
--

CREATE TABLE `rice_inventory` (
  `id` int(11) NOT NULL,
  `variety` varchar(100) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `stock_kg` decimal(10,2) DEFAULT 0.00,
  `price` decimal(10,2) NOT NULL,
  `status` enum('In Stock','Low Stock','Out of Stock') DEFAULT 'In Stock',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rice_inventory`
--

INSERT INTO `rice_inventory` (`id`, `variety`, `grade`, `stock_kg`, `price`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Jasmine', 'Well-Milled', 96.00, 65.00, 'In Stock', '2026-04-16 05:01:57', '2026-04-16 06:29:35'),
(4, 'Sinandomeng', 'Premium', 47.00, 56.00, 'In Stock', '2026-04-16 05:23:19', '2026-04-16 06:28:01'),
(5, 'Brown Rice', 'Premium', 180.00, 60.00, 'In Stock', '2026-04-16 06:24:28', '2026-04-16 06:28:27'),
(6, 'Regular Milled', 'Regular Milled', 15.00, 52.00, 'In Stock', '2026-04-16 06:26:16', '2026-04-16 06:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `sales_transactions`
--

CREATE TABLE `sales_transactions` (
  `id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL,
  `quantity_kg` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `customer_name` varchar(255) DEFAULT 'Walk-in Customer',
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_transactions`
--

INSERT INTO `sales_transactions` (`id`, `variety_id`, `quantity_kg`, `total_price`, `customer_name`, `transaction_date`) VALUES
(1, 3, 2.00, 128.00, 'abegail ', '2026-04-16 05:24:14'),
(2, 4, 1.00, 65.00, 'paul', '2026-04-16 05:40:47'),
(3, 5, 20.00, 1100.00, 'kim', '2026-04-16 06:25:11'),
(4, 6, 5.00, 315.00, 'layan', '2026-04-16 06:27:02'),
(5, 4, 2.00, 130.00, 'abby', '2026-04-16 06:27:28'),
(6, 3, 2.00, 130.00, 'johnrel', '2026-04-16 06:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(4, 'admin1234', 'admin1234@gmail.com', '$2y$10$Sil9v4DTdU6kUO5IBi5ZJedv03DUhMVKHojyjWtnQi5fFQsX8FM3i', '2026-04-16 04:31:03'),
(5, 'Abegail gelba', 'admin12345@gmail.com', '$2y$10$jTr78.eJmctbOFy3V3N2iecqHyrUnZi0I21NYbdZQjY/F5zrB2wLe', '2026-04-16 04:33:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rice_inventory`
--
ALTER TABLE `rice_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_transactions`
--
ALTER TABLE `sales_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variety_id` (`variety_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rice_inventory`
--
ALTER TABLE `rice_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_transactions`
--
ALTER TABLE `sales_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales_transactions`
--
ALTER TABLE `sales_transactions`
  ADD CONSTRAINT `sales_transactions_ibfk_1` FOREIGN KEY (`variety_id`) REFERENCES `rice_inventory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
