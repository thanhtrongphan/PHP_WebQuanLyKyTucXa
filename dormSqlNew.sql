-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2024 at 01:40 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dormtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_list`
--

DROP TABLE IF EXISTS `account_list`;
CREATE TABLE IF NOT EXISTS `account_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_list_id` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_account_list_student_list1_idx` (`student_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account_list`
--

INSERT INTO `account_list` (`id`, `student_list_id`, `username`, `password`, `avatar`) VALUES
(9, 3, '2001180172', '123', '2001180172_avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dorm_list`
--

DROP TABLE IF EXISTS `dorm_list`;
CREATE TABLE IF NOT EXISTS `dorm_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dorm_list`
--

INSERT INTO `dorm_list` (`id`, `name`) VALUES
(6, 'Ký túc nam 1'),
(7, 'Ký túc nữ 1');

-- --------------------------------------------------------

--
-- Table structure for table `payment_list`
--

DROP TABLE IF EXISTS `payment_list`;
CREATE TABLE IF NOT EXISTS `payment_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `month_of` varchar(50) NOT NULL,
  `amount` float(12,2) NOT NULL DEFAULT '0.00',
  `is_payment` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register_list`
--

DROP TABLE IF EXISTS `register_list`;
CREATE TABLE IF NOT EXISTS `register_list` (
  `id` int NOT NULL,
  `room_list_id` int NOT NULL,
  `account_list_id` int NOT NULL,
  `date` date NOT NULL,
  `is_registed` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registers_list_room_list1_idx` (`room_list_id`),
  KEY `fk_registers_list_account_list1_idx` (`account_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_list`
--

DROP TABLE IF EXISTS `room_list`;
CREATE TABLE IF NOT EXISTS `room_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dorm_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `slots` int NOT NULL DEFAULT '0',
  `price` float(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `dorm_id` (`dorm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`id`, `dorm_id`, `name`, `slots`, `price`) VALUES
(8, 6, 'A101', 4, 300000.00),
(9, 6, 'B102', 2, 1200000.00),
(10, 7, 'D102', 4, 600000.00),
(11, 7, 'C101', 2, 1200000.00);

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

DROP TABLE IF EXISTS `student_list`;
CREATE TABLE IF NOT EXISTS `student_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `course` varchar(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `code`, `name`, `department`, `course`, `gender`, `contact`, `email`, `address`) VALUES
(3, '2001180172', 'Phan Thanh Trong', 'Cong Nghe Thong Tin', 'Cong Nghe Phan Mem', 'Nam', '123456789', 'trong@gmail.com', '55B Tran Phu'),
(5, '123', '123', '123', '123', 'Nam', '123', '123@gmail.com', '112');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_list`
--
ALTER TABLE `account_list`
  ADD CONSTRAINT `fk_account_list_student_list1` FOREIGN KEY (`student_list_id`) REFERENCES `student_list` (`id`);

--
-- Constraints for table `payment_list`
--
ALTER TABLE `payment_list`
  ADD CONSTRAINT `account_id_fk_pl` FOREIGN KEY (`account_id`) REFERENCES `account_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `register_list`
--
ALTER TABLE `register_list`
  ADD CONSTRAINT `fk_registers_list_account_list1` FOREIGN KEY (`account_list_id`) REFERENCES `account_list` (`id`),
  ADD CONSTRAINT `fk_registers_list_room_list1` FOREIGN KEY (`room_list_id`) REFERENCES `room_list` (`id`);

--
-- Constraints for table `room_list`
--
ALTER TABLE `room_list`
  ADD CONSTRAINT `drom_id_fk_rl` FOREIGN KEY (`dorm_id`) REFERENCES `dorm_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
