-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 09:55 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nepalaqi`
--

-- --------------------------------------------------------

--
-- Table structure for table `backendusers`
--

CREATE TABLE `backendusers` (
  `bid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backendusers`
--

INSERT INTO `backendusers` (`bid`, `username`, `password`, `role`) VALUES
(1, 'nees', 'anki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complain_id` int(11) NOT NULL,
  `pollutionname` text NOT NULL,
  `pollutiondescription` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `pollutionlocation` text NOT NULL,
  `region` text NOT NULL,
  `province` text NOT NULL,
  `road` text NOT NULL,
  `village` text NOT NULL,
  `pollutionimage` text NOT NULL,
  `username` text NOT NULL,
  `usergeolocation` text NOT NULL,
  `useremail` text NOT NULL,
  `userphonenumber` text NOT NULL,
  `usersociallink` text NOT NULL,
  `randombytes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gloginusers`
--

CREATE TABLE `gloginusers` (
  `gid` int(11) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gmail_id` text NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pkey` text NOT NULL,
  `vkey` text NOT NULL,
  `vstatus` tinyint(4) NOT NULL,
  `usercode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backendusers`
--
ALTER TABLE `backendusers`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `gloginusers`
--
ALTER TABLE `gloginusers`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backendusers`
--
ALTER TABLE `backendusers`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gloginusers`
--
ALTER TABLE `gloginusers`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
