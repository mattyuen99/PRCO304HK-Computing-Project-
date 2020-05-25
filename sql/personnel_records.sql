-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 08:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personnel_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `auto_id` int(11) NOT NULL,
  `Service` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `account` text NOT NULL,
  `password` text NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`auto_id`, `Service`, `Phone`, `Date`, `account`, `password`, `address`) VALUES
(19, '\'f2õb9P½MþÞ:©#', 'p¸2³XGüÔiÁÅ1', '2020-05-25', '˜éN»KÄ15¿Ë¾œ®m)', '\rŠ²Û–V¢oÝýÂˆ0–Fý', 'KÂC-è‰¨è½‡´5ž1'),
(20, 'ðUç)CY²_ó[ÝÅ‡\0¯s', 'p¸2³XGüÔiÁÅ1', '2020-05-25', 'p¸2³XGüÔiÁÅ1', '¤Žlƒä;1iö½(É)', 'í!‚=áÍŒþ¾ˆ%FÖûdÇSAó u{J¡¿¯Ä.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `auto_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1: Simple & 2: Master'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`auto_id`, `name`, `email`, `password`, `type`) VALUES
(1, 'read', 'read', 'read', 1),
(5, 'admin', 'admin', 'admin', 2);




--
-- Indexes for dumped tables
--

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`auto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
