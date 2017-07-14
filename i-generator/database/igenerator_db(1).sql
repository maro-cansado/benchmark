-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 04:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igenerator_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ig_users`
--

CREATE TABLE `ig_users` (
  `id` int(16) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `date_of_birth` date NOT NULL,
  `street` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `number` int(16) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(45) NOT NULL,
  `type` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ig_users`
--

INSERT INTO `ig_users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `date_of_birth`, `street`, `city`, `country`, `number`, `username`, `password`, `role`, `type`, `createdAt`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '2016-02-05', '', '', '', 0, 'admin', '6vuQHWi0l50pKppmglx4ah_jR_SggVnUu-Jrkms2kwg', 'admin', 0, '2017-02-28 03:11:39'),
(5, 'client', 'client', 'client', 'client@gmail.com', '2017-02-11', '', '', '', 0, '', '', 'client', 0, '2017-02-28 07:50:21'),
(7, 'fnames', 'mnames', 'lnames', 'fnames@gmail.com', '0000-00-00', 'streets', 'citys', 'countrys', 12321, '', '', '', 1, '2017-03-02 06:36:37'),
(11, 'firskjh', 'saddjh', 'asldkj', 'sadsa@gmail.com', '0000-00-00', 'sdjh', 'asdlkj', 'asldkj', 123123, '', '', '', 5, '2017-03-07 10:49:49'),
(12, 'aaaaedited', 'aaa', 'asaa', 'aaa@gmail.com', '0000-00-00', 'aaa', 'aa', 'aa', 12332, '', '', '', 6, '2017-03-08 01:21:43'),
(13, 'aaaa', 'aaa', 'asaa', 'aaa@gmail.com', '0000-00-00', 'aaa', 'aa', 'aa', 12332, '', '', '', 1, '2017-03-08 01:22:06'),
(14, 'testfirstname', 'testmiddle', 'testlastname', 'test_email@gmail.com', '0000-00-00', 'test address,dd', 'ttest city', 'test countryq', 123456789, '', '', '', 5, '2017-03-09 02:35:16'),
(15, 'Jaspal', '', 'Dosanjh', 'sample@gmail.com', '2017-03-08', '', '', '', 0, 'jaz', '9CwyY7hKRFlyWuBoR9IR7-dhfdBXRSy6lfSicfORGYI', 'admin', 0, '2017-03-09 12:53:30'),
(16, 'Sumit', '', 'Monga', 'sample123@gmail.com', '2017-03-08', '', '', '', 0, 'sumit', 'J-haHMzAiRpWAP6fIUTXr-AlkSoA7DgEeyMdDz5Urqo', 'admin', 0, '2017-03-09 12:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `ig_user_invoice`
--

CREATE TABLE `ig_user_invoice` (
  `id` int(11) NOT NULL,
  `client_fname` varchar(45) NOT NULL,
  `client_mname` varchar(45) NOT NULL,
  `client_lname` varchar(45) NOT NULL,
  `total_commission` decimal(10,2) NOT NULL,
  `adviser_total` decimal(10,2) NOT NULL,
  `bonuses` decimal(10,2) NOT NULL,
  `cancellation` decimal(10,2) NOT NULL,
  `material_and_software` decimal(10,2) NOT NULL,
  `month_period` varchar(45) NOT NULL,
  `adviser_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ig_user_invoice`
--

INSERT INTO `ig_user_invoice` (`id`, `client_fname`, `client_mname`, `client_lname`, `total_commission`, `adviser_total`, `bonuses`, `cancellation`, `material_and_software`, `month_period`, `adviser_id`) VALUES
(3, 'asdas', 'asdas', 'asd', '99.00', '99.00', '99.00', '99.00', '99.00', '7', 11),
(4, 'asdsa', 'sadsa', 'sadsa', '99.00', '99.00', '99.00', '99.00', '99.00', '7', 7),
(5, 'asdsa', 'sad', 'sadsa', '99.00', '99.00', '99.00', '99.00', '99.00', '7', 7),
(6, 'asdsa', 'sad', 'sadsa', '99.00', '99.00', '99.00', '99.00', '99.00', '7', 7),
(7, 'asdsa', 'sad', 'sadsa', '99.00', '99.00', '99.00', '99.00', '99.00', '7', 7),
(8, 'asdsa', 'sad', 'sadsa', '99.00', '99.00', '99.00', '99.00', '99.00', '7', 7),
(9, 'fdd', 'fff', 'fff', '12.00', '3.00', '44.00', '99.00', '99.00', '7', 12),
(10, 'fdd', 'fff', 'fff', '12.00', '3.00', '44.00', '99.00', '99.00', '7', 13),
(11, '', '', '', '0.00', '0.00', '0.00', '0.00', '0.00', '7', 14),
(12, 'asdsd', 'asdasd', 'asdasd', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 7),
(13, 'asdsd', 'asdasd', 'asdasd', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 7),
(14, 'asdsd', 'asdasd', 'asdasd', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 7),
(15, 'asdsd', 'asdasd', 'asdasd', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 7),
(16, 'asdsd', 'asdasd', 'asdasd', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 7),
(17, 'asdsd', 'asdasd', 'asdasd', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 7),
(18, 'asdsd', 'asdasd', 'asdasd', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 7),
(19, 'asdsd', 'asdasd', 'asdasd', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 7),
(20, 'asdsd', 'asdasd', 'asdasd', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 7),
(21, '', '', '', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 11),
(22, '', '', '', '1000.00', '700.00', '0.00', '100.00', '20.00', '7', 11);

-- --------------------------------------------------------

--
-- Table structure for table `ig_user_settings`
--

CREATE TABLE `ig_user_settings` (
  `id` int(16) NOT NULL,
  `number` varchar(45) NOT NULL,
  `bonus` decimal(10,2) NOT NULL,
  `company` tinyint(1) NOT NULL,
  `material_fee` tinyint(1) NOT NULL,
  `adviser_percentage` varchar(45) NOT NULL,
  `rate_of_commission` int(16) NOT NULL,
  `material_fee_amount` decimal(10,2) NOT NULL,
  `gst` tinyint(1) NOT NULL,
  `gst_age_percent` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ig_user_settings`
--

INSERT INTO `ig_user_settings` (`id`, `number`, `bonus`, `company`, `material_fee`, `adviser_percentage`, `rate_of_commission`, `material_fee_amount`, `gst`, `gst_age_percent`, `user_id`) VALUES
(1, '21321322', '21.00', 0, 1, '11', 15, '20.00', 1, '15', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ig_user_type`
--

CREATE TABLE `ig_user_type` (
  `id` int(16) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `total_commission` decimal(10,2) NOT NULL,
  `adviser_total` decimal(10,2) NOT NULL,
  `bonuses` decimal(10,2) NOT NULL,
  `cancellation` decimal(10,2) NOT NULL,
  `material_and_software` decimal(10,2) NOT NULL,
  `gst` tinyint(1) NOT NULL,
  `company` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ig_user_type`
--

INSERT INTO `ig_user_type` (`id`, `name`, `description`, `total_commission`, `adviser_total`, `bonuses`, `cancellation`, `material_and_software`, `gst`, `company`) VALUES
(1, 'simple', 'this is sample adviser description', '1000.00', '700.00', '0.00', '100.00', '20.00', 0, 0),
(5, 'Medium', 'this is a medium adviser description', '1000.00', '700.00', '0.00', '100.00', '20.00', 1, 0),
(6, 'Company ', '', '2000.00', '700.00', '0.00', '100.00', '20.00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ig_users`
--
ALTER TABLE `ig_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ig_user_invoice`
--
ALTER TABLE `ig_user_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ig_user_settings`
--
ALTER TABLE `ig_user_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ig_user_type`
--
ALTER TABLE `ig_user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ig_users`
--
ALTER TABLE `ig_users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ig_user_invoice`
--
ALTER TABLE `ig_user_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ig_user_settings`
--
ALTER TABLE `ig_user_settings`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ig_user_type`
--
ALTER TABLE `ig_user_type`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
