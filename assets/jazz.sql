-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2018 at 10:53 AM
-- Server version: 10.3.8-MariaDB-1:10.3.8+maria~bionic
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jazz`
--
CREATE DATABASE IF NOT EXISTS `jazz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jazz`;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` varchar(32) NOT NULL COMMENT 'ktp/passport',
  `name` varchar(32) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birth` datetime NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mtik_server`
--

CREATE TABLE `mtik_server` (
  `id` int(11) NOT NULL,
  `hostname` varchar(15) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(7) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mtik_server`
--

INSERT INTO `mtik_server` (`id`, `hostname`, `username`, `password`, `status`, `created_at`) VALUES
(4, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 01:12:17'),
(5, '123', 'root', 'qwerty', 'Failed', '2018-07-13 01:12:43'),
(6, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 02:03:42'),
(7, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 02:07:09'),
(8, '192.168.1.2', 'root', 'qwerty', 'Failed', '2018-07-13 02:07:33'),
(9, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 02:15:57'),
(10, '192.168.1.2', 'root', 'qwerty', 'Failed', '2018-07-13 02:16:16'),
(11, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 03:10:30'),
(12, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 09:19:40'),
(13, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 10:01:48'),
(14, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 10:09:27'),
(15, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 10:11:48'),
(16, '', 'root', 'qwerty', 'Failed', '2018-07-13 11:09:29'),
(17, '', 'root', 'qwerty', 'Failed', '2018-07-13 11:10:06'),
(18, '', 'root', 'qwerty', 'Failed', '2018-07-13 11:11:03'),
(19, '', 'root', 'qwerty', 'Failed', '2018-07-13 11:14:06'),
(20, '', 'root', 'qwerty', 'Failed', '2018-07-13 11:14:28'),
(21, '', 'root', 'qwerty', 'Failed', '2018-07-13 11:16:05'),
(22, '', 'root', 'qwerty', 'Failed', '2018-07-13 11:19:41'),
(23, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 13:45:30'),
(24, '192.168.1.2', 'root', 'qwerty', 'Failed', '2018-07-13 13:55:34'),
(25, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 13:55:36'),
(26, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 13:57:11'),
(27, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 13:59:41'),
(28, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:02:08'),
(29, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:03:12'),
(30, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:08:14'),
(31, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:08:16'),
(32, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:08:20'),
(33, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:08:20'),
(34, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:08:21'),
(35, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:08:22'),
(36, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:08:26'),
(37, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:08:33'),
(38, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:23:26'),
(39, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 14:34:01'),
(40, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:34:10'),
(41, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 14:34:24'),
(42, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 15:07:27'),
(43, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 15:07:44'),
(44, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 15:08:04'),
(45, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 15:09:33'),
(46, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 15:10:09'),
(47, '192.168.1.2', 'root', 'qwerty', 'Failed', '2018-07-13 15:14:58'),
(48, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 15:15:00'),
(49, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 15:22:44'),
(50, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 16:37:14'),
(51, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 16:40:34'),
(52, '192.168.1.2', 'rfun', 'qwerty', 'Failed', '2018-07-13 16:40:57'),
(53, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 16:41:11'),
(54, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 16:41:16'),
(55, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 16:43:11'),
(56, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 16:46:48'),
(57, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 16:53:49'),
(58, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 16:57:28'),
(59, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 17:01:52'),
(60, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 17:01:53'),
(61, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 17:04:54'),
(62, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 22:15:12'),
(63, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 22:52:51'),
(64, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 22:58:39'),
(65, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-13 23:28:22'),
(66, '192.168.1.2', 'root', 'qwerty', 'Failed', '2018-07-14 00:05:38'),
(67, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 00:05:43'),
(68, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 00:05:52'),
(69, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 00:07:47'),
(70, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 00:08:09'),
(71, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 00:10:57'),
(72, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 00:22:52'),
(73, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 00:26:33'),
(74, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 00:34:14'),
(75, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 00:38:41'),
(76, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 06:30:37'),
(77, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-14 06:37:15'),
(78, '192.168.10.2', 'admin', '', 'Success', '2018-07-14 15:22:45'),
(79, '192.168.100.1', 'admin', '', 'Success', '2018-07-15 15:43:49'),
(80, '192.168.100.1', 'admin', '', 'Failed', '2018-07-15 15:44:48'),
(81, '', 'rfun', '', 'Failed', '2018-07-15 15:48:42'),
(82, '192.168.100.1', 'rfun', '', 'Success', '2018-07-15 15:48:58'),
(83, '192.168.100.1', 'rfun', '', 'Success', '2018-07-15 15:49:26'),
(84, '192.168.100.1', 'rfun', '', 'Success', '2018-07-15 16:11:47'),
(85, '192.168.100.1', 'rfun', '', 'Success', '2018-07-15 16:14:15'),
(86, '192.168.100.1', 'rfun', '', 'Success', '2018-07-15 16:48:36'),
(87, '192.168.100.1', 'rfun', '', 'Failed', '2018-07-15 16:54:39'),
(88, '192.168.100.1', 'rfun', '', 'Failed', '2018-07-15 16:55:27'),
(89, '192.168.100.1', 'rfun', '', 'Success', '2018-07-15 16:58:56'),
(90, '192.168.100.1', 'rfun', '', 'Failed', '2018-07-16 00:48:49'),
(91, '192.168.1.2', 'rfun', '', 'Failed', '2018-07-16 00:49:07'),
(92, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-16 00:49:11'),
(93, '192.168.1.2', 'rfun', 'qwerty', 'Success', '2018-07-17 01:46:02'),
(94, '192.168.100.1', 'rfun', '', 'Success', '2018-07-17 14:02:35'),
(95, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 13:43:42'),
(96, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 15:27:22'),
(97, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 22:55:03'),
(98, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:09:43'),
(99, '192.168.100.1', 'rfun', 'a', 'Failed', '2018-07-19 23:12:34'),
(100, '192.168.100.1', 'rfun', 'a', 'Failed', '2018-07-19 23:15:08'),
(101, '192.168.100.1', 'rfun', 'a', 'Failed', '2018-07-19 23:15:26'),
(102, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:18:46'),
(103, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:20:57'),
(104, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:21:38'),
(105, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:22:20'),
(106, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:22:51'),
(107, '', '', '', 'Failed', '2018-07-19 23:28:07'),
(108, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:28:10'),
(109, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:29:17'),
(110, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:31:12'),
(111, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:31:41'),
(112, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:32:12'),
(113, '192.168.100.1', 'rfun', '', 'Success', '2018-07-19 23:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` varchar(16) NOT NULL COMMENT 'no booking',
  `guest_id` varchar(6) NOT NULL,
  `night` tinyint(4) NOT NULL,
  `arrival_date` datetime NOT NULL,
  `departure_date` datetime NOT NULL,
  `room_type` varchar(7) NOT NULL,
  `room_numb` varchar(3) NOT NULL,
  `adult` tinyint(4) NOT NULL,
  `child` tinyint(4) NOT NULL,
  `status` enum('checkin','checkout') NOT NULL DEFAULT 'checkin',
  `uname_voucher` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` tinyint(4) NOT NULL,
  `numb` varchar(3) NOT NULL,
  `type` varchar(7) NOT NULL,
  `annotation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `numb`, `type`, `annotation`) VALUES
(65, 'B01', 'budget', ''),
(66, '101', 'premium', ''),
(68, '103', 'premium', ''),
(69, '104', 'premium', ''),
(70, '105', 'premium', ''),
(71, '106', 'premium', ''),
(72, '107', 'premium', ''),
(73, '108', 'premium', ''),
(74, 'B02', 'budget', ''),
(75, 'B03', 'budget', ''),
(76, 'B05', 'budget', ''),
(77, 'B04', 'budget', ''),
(78, '102', 'premium', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','operator') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `level`, `created_at`) VALUES
(46, 'Umar Abdullah', 'umar', '$2y$10$48ltVIbtzGSvkSr0D4oj6ODJCkYnyFx6FGfY.Ox4UQGvodQQ33nmC', 'operator', '2018-07-18 19:10:10'),
(58, 'MUHAMMAD ARFANI HIDAYAT', 'rfun', '$2y$10$X3Imdp4cCqvvKXREXuKjMOZhtDhDEz2G.SIY028KXd8GWjEIVwaX2', 'administrator', '2018-07-18 23:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `uptime` varchar(4) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mtik_server`
--
ALTER TABLE `mtik_server`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numb` (`numb`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mtik_server`
--
ALTER TABLE `mtik_server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
