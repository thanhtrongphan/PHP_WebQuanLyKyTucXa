-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2024 at 02:03 PM
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
DROP DATABASE IF EXISTS `dormtest`;
CREATE DATABASE IF NOT EXISTS `dormtest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci;
USE `dormtest`;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `account_list`
--

INSERT INTO `account_list` (`id`, `student_list_id`, `username`, `password`, `avatar`) VALUES
(1, 1, '2001180172', '123', '2001180172_avatar.jpg'),
(2, 2, '2001216143', '123',	'2001216143_avatar.jpg'),
(3, 3, '2001181115', '123',	'2001181115_avatar.jpg'),
(4, 4, '2042210064', '123',	'2001181115_avatar.jpg'),
(5, 5, '2001210969', '123',	'2001181115_avatar.jpg'),
(6, 6, '2007230045', '123',	'2001181115_avatar.jpg'),
(7, 7, '2001215731', '123',	'2001181115_avatar.jpg'),
(8, 8, '2001210746', '123',	'2001181115_avatar.jpg'),
(9, 9, '2033207490', '123',	'2001181115_avatar.jpg'),
(10,10, '2001215750', '123', '2001181115_avatar.jpg'),
(11, 11, '2032210441', '123', '2001181115_avatar.jpg'),
(12, 12, '2001210862', '123', '2001181115_avatar.jpg'),
(13, 13, '2008206876', '123', '2001181115_avatar.jpg'),
(14, 14, '2022200303', '123', '2001181115_avatar.jpg'),
(15, 15, '2004211207', '123', '2001181115_avatar.jpg'),
(16, 16, '2027218540', '123', '2001181115_avatar.jpg'),
(17, 17, '2024200151', '123', '2001181115_avatar.jpg');


-- --------------------------------------------------------

--
-- Table structure for table `dorm_list`
--

DROP TABLE IF EXISTS `dorm_list`;
CREATE TABLE IF NOT EXISTS `dorm_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `dorm_list`
--

INSERT INTO `dorm_list` (`id`, `name`) VALUES
(1, 'Ký túc xá nam'),
(2, 'Ký túc xá nữ');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `payment_list`
--

INSERT INTO `payment_list` (`id`, `account_id`, `month_of`, `amount`, `is_payment`) VALUES
(1, 1, 'Tháng 2', 123.00, 0),
(2, 2, 'Tháng 2', 123.00, 0),
(3, 3, 'Tháng 3', 150.00, 0),
(4, 4, 'Tháng 5', 150.00, 0),
(5, 5, 'Tháng 6', 160.00, 0),
(6, 6, 'Tháng 9', 170.00, 0),
(7, 7, 'Tháng 9', 170.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register_list`
--

DROP TABLE IF EXISTS `register_list`;
CREATE TABLE IF NOT EXISTS `register_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_list_id` int NOT NULL,
  `account_list_id` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registers_list_room_list1_idx` (`room_list_id`),
  KEY `fk_registers_list_account_list1_idx` (`account_list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `register_list`
--

INSERT INTO `register_list` (`id`, `room_list_id`, `account_list_id`, `date`) VALUES
(1, 1, 1, '2024-04-02'),
(2, 1, 2, '2024-04-02'),
(3, 2, 3, '2024-03-10'),
(4, 3, 4, '2024-04-05'),
(5, 4, 5, '2024-02-20'),
(6, 5, 6, '2024-03-20'),
(7, 5, 7, '2024-03-20'),
(8, 6, 8, '2024-04-15'),
(9, 7, 9, '2024-04-08'),
(10, 10, 10, '2024-03-15'),
(11, 10, 11, '2024-03-15'),
(12, 11, 12, '2024-02-12'),
(13, 11, 13, '2024-02-12'),
(14, 12, 14, '2024-04-20'),
(15, 12, 15, '2024-04-20'),
(16, 12, 16, '2024-04-02'),
(17, 12, 17, '2024-04-02');


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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `room_list`
--

INSERT INTO `room_list` (`id`, `dorm_id`, `name`, `slots`, `price`) VALUES
(1, 1, 'A101', 4, 200000.00),
(2, 1, 'A102', 4, 200000.00),
(3, 1, 'A103', 6, 300000.00),
(4, 1, 'A104', 6, 300000.00),
(5, 1, 'A105', 6, 300000.00),
(6, 1, 'A201', 4, 200000.00),
(7, 1, 'A202', 6, 300000.00),
(8, 1, 'A203', 4, 200000.00),
(9, 1, 'A204', 4, 200000.00),
(10, 1, 'A205', 6, 300000.00),
(11, 2, 'B101', 6, 300000.00),
(12, 2, 'B102', 6, 300000.00),
(13, 2, 'B103', 4, 300000.00),
(14, 2, 'B104', 4, 200000.00),
(15, 2, 'B105', 6, 300000.00);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `code`, `name`, `department`, `course`, `gender`, `contact`, `email`, `address`) VALUES
(1, '2001180172', 'Phan Thanh Trong', 'Cong Nghe Thong Tin', 'Cong Nghe Phan Mem', 'Nam', '1', 'thanhtrong72@gmail.com', 'Bình Phước'),
(2, '2001216143', 'Phan Tran Minh Tam', 'Cong Nghe Thong Tin', 'Cong Nghe Phan Mem', 'Nam', '1', 'minhtamm.203@gmail.com', 'Long An'),
(3, '2001181115', 'Phan The Thanh', 'Cong Nghe Thong Tin', 'Cong Nghe Phan Mem', 'Nam', '1', 'thethanhthanh@gmail.com', 'Tây Ninh'),
(4, '2042210064', 'Tran Thai Thanh', 'Cong Nghe Thong Tin', 'Cong Nghe Phan Mem', 'Nam', '1', 'thanhtrantt.2003@gmail.com', 'Bình Thuận'),
(5, '2001210969', 'Nguyen Huu Hieu', 'Cong Nghe Thong Tin', 'Cong Nghe Phan Mem', 'Nam', '1', 'huuhieuhh@gmail.com', 'Lâm Đồng'),
(6, '2007230045', 'Nguyen Thanh Tam', 'Marketing', 'Quan tri Marketing', 'Nam', '1', 'tamnguyen.t@gmail.com', 'Long An'),
(7, '2001215731', 'Tran Trong Phuc', 'Cong Nghe Thuc Pham', 'Cong nghe che bien', 'Nam', '1', 'trongphucc@gmail.com', 'Bình Dương'),
(8, '2001210746', 'Nguyen Chi Cong', 'Co - Dien tu', 'Cong Nghe Y khoa', 'Nam', '1', 'congnguyencc@gmail.com', 'Quãng Ngãi'),
(9, '2033207490', 'Tran Thanh Phat', 'Dien tu', 'Dien tu', 'Nam', '1', 'thanhphatnd@gmail.com', 'Ninh Thuận'),
(10, '2001215750', 'Duong Minh Son', 'Cong Nghe Oto', 'Lap rap Oto', 'Nam', '1', 'songttt@gmail.com', 'Kiên Giang'),
(11, '2032210441', 'Nguyen Bao Tin', 'Luat - Kinh te', 'Luat - Kinh te', 'Nam', '1', 'baotinlagi@gmail.com', 'An Giang'),
(12, '2001210862', 'Nguyen Thanh Tuoi', 'Logictic', 'Quan li chuoi cung ung', 'Nam', '1', 'daigiaxunau@gmail.com', 'Bình Định'),
(13, '2008206876', 'Nguyen Kim Tien', 'Quan tri kinh doanh', 'Quan tri kinh doanh', 'Nam', '1', 'kimtien403@gmail.com', 'Bình Thuận'),
(14, '2022200303', 'Pham Tran Minh Thu', 'Thuong Mai dien tu', 'Thuong mai dien tu', 'Nam', '1', 'minhthumttt@gmail.com', 'Gia Lai'),
(15, '2004211207', 'Nguyen Kim Ngoc Thich', 'Cong Nghe Thong Tin', 'He thong thong tin', 'Nam', '1', 'ngocthich207@gmail.com', 'Bình Thuậm'),
(16, '2027218540', 'Le Thi Yen Nhi', 'Quan tri kinh doanh', 'Quan tri kinh daonh', 'Nam', '1', 'yennhiiizz@gmail.com', 'Bến Tre'),
(17, '2024200151', 'Nguyen Bao Tran', 'Cong Nghe Thuc pham', 'Cong Nghe Phan Mem', 'Nam', '1', 'baotranaa.203@gmail.com', 'Đồng Tháp');


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
