-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 08:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `c-id` bigint(20) NOT NULL,
  `committee` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`c-id`, `committee`) VALUES
(2, 'Electrical & PA System'),
(5, 'Financial Committee'),
(1, 'Hall Arrangement '),
(3, 'Software Admin'),
(4, 'Stage Management');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `s.no` bigint(20) NOT NULL,
  `user` varchar(150) NOT NULL,
  `password` varchar(30) NOT NULL,
  `acctype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`s.no`, `user`, `password`, `acctype`) VALUES
(1, 'prakash', '1234', 'admin'),
(20, 'mani', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `s.no` int(11) NOT NULL,
  `m_id` varchar(60) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `role` varchar(50) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `committee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`s.no`, `m_id`, `name`, `gender`, `role`, `contact`, `department`, `committee`) VALUES
(1, 'A001', 'gerthanaasir', 'Female', 'Student Volunteers', '9876543102', 'BA.BL Honr ', 'Stage Management');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `uid` bigint(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `age` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `a_no` varchar(120) NOT NULL,
  `add` varchar(255) NOT NULL,
  `contact` varchar(60) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL,
  `zip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`uid`, `name`, `age`, `dob`, `a_no`, `add`, `contact`, `fname`, `state`, `zip`) VALUES
(3, 'mani', '21', '2022-12-19', '857574666567', '937,paraiyur,thungavi post', '6382859779', 'maran', 'tamilnadu', '642203');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `r-id` bigint(20) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r-id`, `role`) VALUES
(1, 'CA Convener'),
(3, 'Co-Convener'),
(2, 'LO Convener'),
(4, 'Student Volunteers');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Particulars` varchar(120) NOT NULL,
  `Day` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Time` time(6) NOT NULL,
  `s_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`c-id`),
  ADD UNIQUE KEY `committee` (`committee`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`s.no`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`s.no`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r-id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `c-id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `s.no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `s.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r-id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `s_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
