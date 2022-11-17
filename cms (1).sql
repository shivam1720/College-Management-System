-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 05:25 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_messages`
--

CREATE TABLE `acc_messages` (
  `srno` int(11) NOT NULL,
  `to_id` varchar(15) NOT NULL,
  `from_id` varchar(15) NOT NULL,
  `studentid` varchar(15) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `time_sent` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_messages`
--

INSERT INTO `acc_messages` (`srno`, `to_id`, `from_id`, `studentid`, `subject`, `msg`, `time_sent`, `status`) VALUES
(1, 'accountant', '161240116026', '161240116026', 'Fee Payment', 'File Uploaded Successfully', '0000-00-00 00:00:00', 'Approved'),
(2, 'accountant', 'it_fa_sem6', 'it_fa_sem6', 'Fee Payment', 'File Uploaded Successfully', '0000-00-00 00:00:00', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `it_fa_messages`
--

CREATE TABLE `it_fa_messages` (
  `srno` int(11) NOT NULL,
  `to_id` varchar(15) NOT NULL,
  `from_id` varchar(20) NOT NULL,
  `studentid` varchar(15) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_fa_messages`
--

INSERT INTO `it_fa_messages` (`srno`, `to_id`, `from_id`, `studentid`, `subject`, `msg`, `status`) VALUES
(1, 'it_fa_sem6', 'librarian', '161240116026', 'Registration Form', 'Clear : Fee Payment and Library Reccords', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `lib_messages`
--

CREATE TABLE `lib_messages` (
  `srno` int(11) NOT NULL,
  `to_id` varchar(15) NOT NULL,
  `from_id` varchar(15) NOT NULL,
  `studentid` varchar(15) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lib_messages`
--

INSERT INTO `lib_messages` (`srno`, `to_id`, `from_id`, `studentid`, `subject`, `msg`, `status`) VALUES
(1, 'librarian', 'accountant', '161240116026', 'Registration Form', 'Fee Payment Verified', 'Approved'),
(2, 'librarian', 'accountant', 'it_fa_sem6', 'Registration Form', 'Fee Payment Verified', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `student_messages`
--

CREATE TABLE `student_messages` (
  `srno` int(11) NOT NULL,
  `to_id` varchar(20) NOT NULL,
  `from_id` varchar(20) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_messages`
--

INSERT INTO `student_messages` (`srno`, `to_id`, `from_id`, `studentid`, `subject`, `msg`) VALUES
(1, '161240116026', 'Faculty Advisor', '161240116026', 'Registration Form', 'Registration Completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`) VALUES
('161240116011', 'test'),
('161240116025', 'test'),
('161240116026', 'test'),
('161240116027', 'test'),
('161240116028', 'test'),
('accountant', 'test'),
('it_fa_sem6', 'test'),
('librarian', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_messages`
--
ALTER TABLE `acc_messages`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `it_fa_messages`
--
ALTER TABLE `it_fa_messages`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `lib_messages`
--
ALTER TABLE `lib_messages`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `student_messages`
--
ALTER TABLE `student_messages`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_messages`
--
ALTER TABLE `acc_messages`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `it_fa_messages`
--
ALTER TABLE `it_fa_messages`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lib_messages`
--
ALTER TABLE `lib_messages`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_messages`
--
ALTER TABLE `student_messages`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
