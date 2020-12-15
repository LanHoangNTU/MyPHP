-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 04:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Username` varchar(50) NOT NULL,
  `Pwd` varchar(50) NOT NULL,
  `FirstName` varchar(80) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` int(11) NOT NULL,
  `Icon` varchar(50) NOT NULL DEFAULT 'logo.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Username`, `Pwd`, `FirstName`, `LastName`, `Email`, `Role`, `Icon`) VALUES
('adminlan', 'f493f40f2591b6aaf05fc0bbcf5ca603d9bc1659', 'Nguyễn Đình Hoàng', 'Lân', 'lanhoang1718@gmail.com', 1, 'logo.png'),
('lanhoangntu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Nguyễn Hoàng', 'Lân', 'lan.nh.59cntt@ntu.edu.vn', 3, 'sv_3564.jpg'),
('vanhoang123', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Nguyễn Văn', 'Hoàn', 'hoang@gmail.com', 3, 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `Name`) VALUES
(1, 'admin'),
(2, 'lecturer'),
(3, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `Role` (`Role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`Role`) REFERENCES `role` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
