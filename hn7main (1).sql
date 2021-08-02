-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 01:05 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hn7main`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `category` varchar(300) NOT NULL,
  `author` varchar(300) NOT NULL,
  `year` varchar(300) NOT NULL,
  `medium` varchar(300) NOT NULL,
  `price` varchar(300) NOT NULL,
  `availability` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`id`, `name`, `category`, `author`, `year`, `medium`, `price`, `availability`) VALUES
(5, 'madolduwa', 'Education', 'martin', '1999', 'Sinhala', '320', '1'),
(6, 'hathpana', 'Entertainment', 'kumarathunga', '2000', 'Sinhala', '300', '1'),
(7, 'peace', 'Education', 'alwis', '2011', 'English', '2300', '0'),
(8, 'war', 'Crime', 'edward', '2003', 'English', '5600', '1'),
(9, 'kumarodaya', 'Entertainment', 'kumarathunga', '2002', 'Sinhala', '250', '1');

-- --------------------------------------------------------

--
-- Table structure for table `issue_return_details`
--

CREATE TABLE `issue_return_details` (
  `id` int(11) NOT NULL,
  `bookname` varchar(300) NOT NULL,
  `userNIC` varchar(300) NOT NULL,
  `issued_from` date NOT NULL,
  `issued_to` date NOT NULL,
  `return_on` date NOT NULL,
  `IsReturn` varchar(300) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `lname` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `nic` varchar(300) NOT NULL,
  `tel` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `fname`, `lname`, `gender`, `nic`, `tel`, `username`, `password`, `usertype`) VALUES
(39, 'dilanka', 'kavinda', 'Male', '78998', '7899959', 'admins', '123', 'student'),
(40, 'sanuka', 'madushiwanka', 'Male', '890', '678', 'adminp', '123', 'professor'),
(42, 'shanaka', 'ranaweera', 'Male', '567488', '474747', 'adminl', '123', 'librarian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `issue_return_details`
--
ALTER TABLE `issue_return_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `issue_return_details`
--
ALTER TABLE `issue_return_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
