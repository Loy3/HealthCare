-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 07:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `timeSlot` varchar(250) DEFAULT NULL,
  `idNum` varchar(250) DEFAULT NULL,
  `phoneNum` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `firstName`, `lastName`, `timeSlot`, `idNum`, `phoneNum`, `email`, `date`) VALUES
(3, 'Loy', 'Netshiozwi', '13:00-14:00', '920212546985', '0840009898', 'netshiozwi@gmail.com', '2020-12-01 14:24:41'),
(4, 'Jack', 'Waldo', '12:00-13:00', '9805051238945', '0846655987', 'waldo@yahoo.com', '2020-12-01 14:24:41'),
(5, 'Jack', 'Smith', '16:00-17:00', '9812028579641', '0769988789', 'smithj@gmail.com', '2020-12-01 14:24:41'),
(6, 'Lethabo', 'Makhaba', '15:00-16:00', '9805211238945', '0840008550', 'MakhabaCity@gmail.com', '2020-12-01 14:24:41'),
(7, 'Timmy', 'Turner', '16:00-17:00', '9812058794561', '0864455456', 'turner@gmail.com', '2020-12-01 14:24:41'),
(8, 'Gustavo', 'Tavo', '15:00-16:00', '9805211238945', '0748899321', 'tavo@gmail.com', '2020-12-01 14:24:41'),
(9, 'Lebo', 'Mazebuka', '08:00-09:00', '9505054550085', '0846655987', 'lebo@gmail.com', '2020-12-01 14:24:41'),
(10, 'Loy', 'Ayo', '08:00-09:00', '9705065998085', '0840009898', 'ayo@yahoo.com', '2020-12-01 14:24:41'),
(11, 'Jack', 'Sparrow', '14:00-15:00', '979851505788454', '0845566987', 'sparrow@gmail.com', '2020-12-01 14:24:41'),
(12, 'Gustavo', 'Khube', '11:00-12:00', '98020257889085', '07544653325', 'khube@gmail.com', '2020-12-01 14:24:41'),
(13, 'Loyiso', 'Sanele', '09:00-10:00', '9606135506082', '0663170515', 'bafanamahlangu@gmail.com', '2020-12-01 14:24:41'),
(14, 'Nene', 'Kunene', '12:00-13:00', '85120280057085', '0784563215', 'kunene@yahoo.com', '2020-12-02 04:53:30'),
(15, 'Joy', 'Zulu', '08:00-09:00', '9502225987085', '0607580550', 'zuluJ@yahoo.com', '2020-12-02 07:49:39'),
(16, 'Thebe', 'Lenyora', '16:00-17:00', '6411305840085', '0895428852', 'lenyoraThebe@gmail.com', '2020-12-02 07:52:01'),
(17, 'Mathapelo', 'Mabena', '12:00-13:00', '9205024569085', '0758038585', 'mabenamm@gmail.com', '2020-12-02 08:00:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
