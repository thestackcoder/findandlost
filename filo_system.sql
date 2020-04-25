-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 02:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filo_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(3, 'admin', '$2y$10$rRqWoYWUSL8NfPqoJGs.auVq4lB.5Ftws3kBrB7GwjjqN2ghQLlU6', '2020-04-20 13:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'pets'),
(2, 'phones'),
(3, 'jewellery');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `description` text DEFAULT NULL,
  `found_place` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `accepted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `color`, `photo`, `description`, `found_place`, `phone_number`, `user_id`, `category_id`, `created_at`, `accepted`) VALUES
(1, 'Black', 'iphone-5-png-5.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'OUtside Rahat Bakery', '03093093', 2, 2, '2020-04-24', 1),
(2, 'Red', 'iphone-5-png-4.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Footpath', '23929322', 1, 2, '2020-04-24', 1),
(12, 'Hex(834D9B)', '1264cb9cba1ad8ace7ce9c0b1e670c2b.jpg', '', 'Pharmacy', '30943043', 2, 1, '2020-04-25', 1),
(13, '#d04ed6', 'paint4.png', '', 'Gujranwala', '94309433', 2, 3, '2020-04-25', 1),
(14, '#fd746c', 'paint box.png', '', 'Gujranwala', '030880466353', 2, 3, '2020-04-25', 1),
(15, 'HSL(45°, 100%, 50%)', 'paint3.png', '', 'Gujranwala', '030880466355', 2, 2, '2020-04-25', 1),
(16, '#fd746c', 'Capture.PNG', '', 'Gujranwala', '030880466355', 2, 2, '2020-04-25', 1),
(17, '#d04ed6', 'Screenshot (4).png', '', 'dsadasd', '+1234567890', 2, 3, '2020-04-25', 1),
(20, '#d04ed6', 'paint2.png', '', 'Pharmacy', '030880466355', 2, 3, '2020-04-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_at`) VALUES
(1, 'somethingelse', '$2y$10$/oswk/BO5Op/lW.7sC6jHuNNisoS2B7Rj/InghFEp59J6UcVRqIae', '2020-04-20 13:23:45'),
(2, 'marythequeen@smartdigitools.com', '$2y$10$2xUBsERkTXWy.37zGuDPX.XmDjdj4bXxbItKx4IsDphViTaHCd1uW', '2020-04-20 13:24:22'),
(3, 'new', '$2y$10$wiq135Ir0cgChlZGihHg4ezFRo370OxPzdpjRHq9U60QypNlFEiTi', '2020-04-20 13:27:09'),
(4, 'student1', '$2y$10$A98fFfgEV7GpX67AQqDRauNcdwvd6ENvgZeEseqOBnaHHoh3AAFvS', '2020-04-20 13:33:13'),
(5, '', '$2y$10$v5kZNGoGUy4tEIsPvwUnqeDa9orlwQojG9S9T4ZOyxHkpK7N4yQdC', '2020-04-24 00:24:22'),
(10, 'kakshi', '$2y$10$bikqDNk..6iqqFWRASq8ee8vitmpSX5znHyI1gyYhQwy8QO4ZPUr.', '2020-04-24 00:28:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
