-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2019 at 01:41 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delta`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`id`, `name`, `sex`, `dob`, `bio`) VALUES
(1, 'ww', 'Male', '1998-02-08', 'negnogn'),
(2, 'shahrukh', 'Male', '1987-11-21', 'ngwngongw'),
(3, 'Amitabh Bachan', 'Male', '1982-12-12', 'man of bollywood'),
(4, 'Aamir khan', 'Male', '1987-12-11', 'great'),
(5, 'aamir khan', 'Male', '1988-12-11', 'great person'),
(6, 'Aishwarya rai', 'female', '2018-03-09', 'what an acting'),
(7, 'Priyanka chopra', 'female', '1988-08-02', 'priyanka nick jonas');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `no` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` bigint(255) NOT NULL,
  `plot` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cast` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`no`, `name`, `year`, `plot`, `image`, `cast`) VALUES
(5, 'sholay', 1987, 'aoiaoaoai', 'images/vote7.jpg', 'Amitabh Bachan,Aishwarya rai,'),
(67, 'lnonoan', 2018, 'lnoooboqb', 'images/vote4.jpg', 'shahrukh,Amitabh Bachan,Aamir khan,'),
(87, 'knana', 2019, 'nanaonao', 'images/vote7.jpg', 'Amitabh Bachan,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
