-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 25, 2018 at 10:20 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` varchar(32) NOT NULL COMMENT 'ktp/passport',
  `name` varchar(32) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `birth` date NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `name`, `gender`, `birth`, `phone`, `email`, `address`) VALUES
('0123456789', 'Muhammad Arfani Hidayat', 'male', '1993-05-01', '', '', '');

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
(1, '192.168.100.1', 'rfun', '', 'Success', '2018-07-22 15:32:06'),
(2, '192.168.100.1', 'rfun', '', 'Failed', '2018-07-23 09:15:36'),
(3, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 09:15:46'),
(4, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 16:48:25'),
(5, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 17:00:04'),
(6, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 17:00:47'),
(7, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 17:02:20'),
(8, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 17:03:59'),
(9, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 17:45:55'),
(10, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 17:53:50'),
(11, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 18:03:19'),
(12, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 20:11:50'),
(13, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 20:29:34'),
(14, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 20:56:28'),
(15, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 21:09:50'),
(16, '192.168.100.1', 'rfun', '', 'Success', '2018-07-23 21:12:53'),
(17, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 01:39:36'),
(18, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 01:42:32'),
(19, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 01:43:43'),
(20, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 01:44:57'),
(21, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 01:58:59'),
(22, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 02:10:15'),
(23, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 02:25:11'),
(24, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 02:27:21'),
(25, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 02:29:03'),
(26, '192.168.100.1', 'rfun', '', 'Failed', '2018-07-24 02:37:06'),
(27, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 02:40:58'),
(28, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 02:48:11'),
(29, '192.168.100.1', 'rfun', '', 'Failed', '2018-07-24 10:36:12'),
(30, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 10:38:09'),
(31, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 10:57:39'),
(32, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 17:04:49'),
(33, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 20:17:08'),
(34, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 20:43:58'),
(35, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 21:13:29'),
(36, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 21:13:38'),
(37, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 23:25:45'),
(38, '192.168.100.1', 'rfun', '', 'Success', '2018-07-24 23:36:13'),
(39, '192.168.100.1', 'rfun', '', 'Success', '2018-07-25 09:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` varchar(16) NOT NULL COMMENT 'no booking',
  `guest_id` varchar(32) NOT NULL COMMENT 'kpt/passport',
  `night` tinyint(4) NOT NULL,
  `arrival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `room_type` varchar(7) NOT NULL,
  `room_numb` varchar(3) NOT NULL,
  `adult` tinyint(4) NOT NULL,
  `child` tinyint(4) NOT NULL,
  `status` enum('checkin','checkout') NOT NULL DEFAULT 'checkin',
  `extend` tinyint(4) DEFAULT 0,
  `uname_voucher` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `guest_id`, `night`, `arrival_date`, `departure_date`, `room_type`, `room_numb`, `adult`, `child`, `status`, `extend`, `uname_voucher`) VALUES
('104612206', '0123456789', 1, '2018-07-25', '2018-07-26', 'budget', 'B01', 1, 1, 'checkin', 0, 'M'),
('3132621714', '0123456789', 3, '2018-07-24', '2018-07-27', 'premium', '101', 1, 0, 'checkout', 1, 'Muhammad'),
('6540497225', '0123456789', 1, '2018-07-25', '2018-07-26', 'premium', '101', 1, 2, 'checkin', 0, 'Mu'),
('9541961553', '0123456789', 1, '2018-07-25', '2018-07-26', 'premium', '101', 1, 0, 'checkin', 0, 'Muham');

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
(78, '102', 'premium', ''),
(80, 'B01', 'budget', '');

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
(62, 'ARFANI HIDAYAT', 'arfan', '$2y$10$kZ2Dx45oxB/hNezJrLR1ROjwGZYV4/RxT1oIA7.kWh8/t6bvCE/4y', 'administrator', '2018-07-25 09:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `uptime` varchar(4) NOT NULL,
  `profile_user` varchar(16) NOT NULL DEFAULT 'default',
  `disabled` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`username`, `password`, `uptime`, `profile_user`, `disabled`) VALUES
('M', 'M', '1', 'budget2', 'no'),
('Mu', 'Muh', '1', 'premium3', 'no'),
('Muham', 'Mu', '1', 'special', 'no'),
('Muhammad', '012345', '1', 'default', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
