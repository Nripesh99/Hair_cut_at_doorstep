-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 03:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`id`, `name`, `email`, `password`) VALUES
(1, 'Nripesh', 'nripesh123@gmail.com', '$2y$10$TRpoGXeuaRhubEdF5NP6HuuHFNoDniuMSjzQQ/jHRkD6v2TtDJZki');

-- --------------------------------------------------------

--
-- Table structure for table `agent_register`
--

CREATE TABLE `agent_register` (
  `a_Id` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(55) DEFAULT NULL,
  `Mobile_no` bigint(20) DEFAULT NULL,
  `Password` varchar(65) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent_register`
--

INSERT INTO `agent_register` (`a_Id`, `Name`, `Email`, `Mobile_no`, `Password`, `location`) VALUES
(3, 'hari beckam', 'hari@gmail.com', 9844544445, '$2y$10$GjvsyxDXMSQQH/tGnoVS3OyPYge7j2k7lFAxafOrSzUNsJ5s7b2b2', 'butwal'),
(4, 'Raman', 'raman@gmail.com', 983333333, '$2y$10$sk9ZEcO7yYXnORV.RoOoE.131qxnXfwijTDtBBPq.4K9G4uDFTSii', 'bkt'),
(11, 'david beckam', 'david@gmail.com', 9801122123, '$2y$10$cbiiY3ZpkYZk66259pJFjeph4DKM60OS/XgDDIjlq/1wfabYLXdgq', 'bhaktapur'),
(19, 'dave', 'david123@gmail.com', 1234567890, '$2y$10$WkAFAIIBSJKqb1uBiOxnFeB5/uB3GgKp8g2LIRcCdM2u7C/5HwEtC', 'kathmandu'),
(20, 'Parajuli', 'nripes123h@gmail.com', 9869059835, '$2y$10$Mnc6dqMuLMuk77m7OpreauQocWN5qBqpEW0GIwVx3MDETiomt6bPq', 'ktm');

-- --------------------------------------------------------

--
-- Table structure for table `booking_test`
--

CREATE TABLE `booking_test` (
  `b_id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `s_name` varchar(20) DEFAULT NULL,
  `booking_date` datetime(6) DEFAULT NULL,
  `t_price` int(11) NOT NULL,
  `c_name` varchar(20) DEFAULT NULL,
  `c_adddress` varchar(50) DEFAULT NULL,
  `c_insidevalley` smallint(6) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `status` enum('Accepted','rejected','pending','completed') NOT NULL DEFAULT 'pending',
  `a_Id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_test`
--

INSERT INTO `booking_test` (`b_id`, `s_id`, `s_name`, `booking_date`, `t_price`, `c_name`, `c_adddress`, `c_insidevalley`, `id`, `status`, `a_Id`) VALUES
(1, 2, 'Hair color', '2023-06-14 21:36:39.000000', 650, 'Nripesh', 'Lazimpat', 1, 1, 'rejected', NULL),
(62, 8, 'Facial', '2023-06-25 13:13:46.000000', 173, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(67, 2, 'Hair color', '2023-06-25 13:35:24.000000', 650, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(69, 3, 'Hair straight', '2023-06-25 13:44:57.000000', 550, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(75, 6, 'Beard cut', '2023-06-26 07:20:22.000000', 250, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(76, 1, 'Hair cut', '2023-06-26 16:46:16.000000', 350, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(93, 8, 'Facial', '2023-06-27 21:05:31.000000', 173, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(97, 2, 'Hair color', '2023-06-27 21:43:27.000000', 650, 'Nripesh', 'Lazimpat', 1, 1, 'rejected', NULL),
(98, 1, 'Hair cut', '2023-06-28 07:49:54.000000', 350, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(111, 1, 'Hair cut', '2023-07-03 07:19:39.000000', 350, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 3),
(113, 2, 'Hair color', '2023-07-03 07:23:12.000000', 700, 'NripeshP', 'ktm', 0, 2, 'completed', 3),
(137, 3, 'Hair straight', '2023-07-03 09:30:44.000000', 550, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 4),
(140, 8, 'Facial', '2023-07-03 09:33:43.000000', 223, 'NripeshP', 'ktm', 0, 2, 'completed', 4),
(141, 6, 'Beard cut', '2023-07-03 09:33:48.000000', 300, 'NripeshP', 'ktm', 0, 2, 'completed', 4),
(143, 2, 'Hair color', '2023-07-03 10:28:22.000000', 650, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 4),
(147, 1, 'Hair cut', '2023-07-05 07:53:35.000000', 350, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(206, 1, 'Hair cut', '2023-07-05 19:06:14.000000', 350, 'Nripesh', 'Lazimpat', 1, 1, 'rejected', NULL),
(207, 6, 'Beard cut', '2023-07-05 19:12:09.000000', 250, 'Nripesh', 'Lazimpat', 1, 1, 'rejected', NULL),
(209, 1, 'Hair cut', '2023-07-05 19:21:44.000000', 350, 'Nripesh', 'Lazimpat', 1, 1, 'rejected', NULL),
(225, 1, 'Hair cut', '2023-07-18 15:36:06.000000', 350, 'Nripesh', 'Lazimpat', 1, 1, 'rejected', NULL),
(231, 1, 'Hair cut', '2023-08-07 13:37:37.000000', 350, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(235, 3, 'Hair straight', '2023-08-11 16:11:32.000000', 550, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(237, 2, 'Hair color', '2023-08-12 09:45:27.000000', 650, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(246, 1, 'Hair cut', '2023-08-16 13:09:28.000000', 350, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11),
(249, 2, 'Hair color', '2023-08-16 17:54:03.000000', 650, 'Nripesh', 'Lazimpat', 1, 1, 'completed', 11);

-- --------------------------------------------------------

--
-- Table structure for table `customer_register`
--

CREATE TABLE `customer_register` (
  `Id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile_no` bigint(20) NOT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `location` varchar(55) NOT NULL,
  `Inside_valley` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_register`
--

INSERT INTO `customer_register` (`Id`, `Name`, `Email`, `Mobile_no`, `Password`, `location`, `Inside_valley`) VALUES
(1, 'Nripesh', 'nripesh@gmail.com', 9800110011, '$2y$10$3/MN1TmUYmU5ut21yOEZkexavOzn547oZ4JWySlWLNrBgHA1EW0qG', 'Lazimpat', 1),
(2, 'NripeshP', 'nripesh123@gmail.com', 12312313, '$2y$10$3V1Tw/i3WwIcvCj1dW533.vYaW9dpe9hH36bye2Y4y1Yipy9PJoGK', 'ktm', 0),
(37, 'Shubhang', 'shubhang@gmail.com', 123123123, '$2y$10$w14marCS.gOLiD0cf2sA2ubmP.Uk5/7IDjD0pqOaFfVspFZBxCm4e', 'ok', 0),
(38, 'Himal', 'himal999@gmail.com', 9800000000, '$2y$10$YIicWDlAq0wK5U8ww.HRT.ERZDaVoIbZiPGI5Jv53pIKpEo673qPS', 'kathmandu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `email` varchar(55) NOT NULL,
  `Subject` varchar(34) NOT NULL,
  `message` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `Name`, `email`, `Subject`, `message`) VALUES
(4, 'krishna', 'nripeshparajuli2@gmail.com', 'heloo', 'me'),
(5, 'krishna', 'nripeshparajuli2@gmail.com', 'I need your attention', 'Service not found\n'),
(6, 'Nripesh', 'nr@gmail.com', 'Hello ', 'love the service would again used it'),
(7, 'hari beckam', 'nripeshparajuli2@gmail.com', 'Worked perfectly', 'good user interface.'),
(8, 'hari beckam', 'nripeshparajuli2@gmail.com', 'NRipesh', 'kea '),
(9, 'hari beckam', 'jbaujn@gmail.com', 'auhui', 'hauigyb'),
(13, 'krishna', 'krishna@gmail.com', 'I need your attention', 'Hello i love your service .Greatley appreciated');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(30) DEFAULT NULL,
  `s_price` int(11) DEFAULT NULL,
  `s_time` int(11) NOT NULL,
  `s_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_id`, `s_name`, `s_price`, `s_time`, `s_image`) VALUES
(1, 'Hair cut', 300, 40, 'upload/pexels-dmitry-zvolskiy-1570807.jpg'),
(2, 'Hair color', 600, 60, 'upload/pexels-cottonbro-studio-3993289.jpg'),
(3, 'Hair straight', 500, 60, 'upload/hairstraight.jpg'),
(4, 'Hair and beard cut', 450, 40, 'upload/Iphone_os_architecture.jpeg'),
(5, 'Haircut and color', 800, 65, 'upload/Highlighted-Curls-with-Undercut-Taper-Fade.jpg'),
(6, 'Beard cut', 200, 30, 'upload/aleksandar-andreev-XbM0XATexu8-unsplash.jpg'),
(8, 'Facial', 300, 40, 'upload/facial.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_register`
--
ALTER TABLE `agent_register`
  ADD PRIMARY KEY (`a_Id`);

--
-- Indexes for table `booking_test`
--
ALTER TABLE `booking_test`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `id` (`id`),
  ADD KEY `fk_a_id` (`a_Id`);

--
-- Indexes for table `customer_register`
--
ALTER TABLE `customer_register`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_name` (`s_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agent_register`
--
ALTER TABLE `agent_register`
  MODIFY `a_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `booking_test`
--
ALTER TABLE `booking_test`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `customer_register`
--
ALTER TABLE `customer_register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_test`
--
ALTER TABLE `booking_test`
  ADD CONSTRAINT `booking_test_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `services` (`s_id`),
  ADD CONSTRAINT `booking_test_ibfk_2` FOREIGN KEY (`id`) REFERENCES `customer_register` (`Id`),
  ADD CONSTRAINT `fk_a_id` FOREIGN KEY (`a_Id`) REFERENCES `agent_register` (`a_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
