-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2017 at 12:12 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djit`
--

-- --------------------------------------------------------

--
-- Table structure for table `likecomment`
--

CREATE TABLE `likecomment` (
  `lc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `comment_image` varchar(100) NOT NULL,
  `interest` varchar(30) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  `updated_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likecomment`
--

INSERT INTO `likecomment` (`lc_id`, `user_id`, `thread_id`, `comments`, `comment_image`, `interest`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Very Nice', '', '', '18/02/17', '19/02/17'),
(6, 1, 1, 'Hi', '', 'YES', 'On 20/02/17 at 11:46:45pm', 'On 21/02/17 at 05:22:23am'),
(9, 1, 1, 'Why', '', 'YES', 'On 20/02/17 at 11:47:20pm', 'On 21/02/17 at 05:22:23am'),
(13, 2, 1, 'Yousuf', '1487613561375056_375222609248525_177113527_n.jpg', '', 'On 20/02/17 at 11:59:21pm', ''),
(20, 1, 6, '', '', 'YES', 'On 21/02/17 at 08:45:26am', 'On 21/02/17 at 08:51:57am'),
(25, 1, 6, 'Nice Pic', '1487645799Signature 300x90.png', '', 'On 21/02/17 at 08:56:39am', ''),
(26, 1, 7, '', '', 'YES', 'On 21/02/17 at 05:01:09pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `t_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread` varchar(500) NOT NULL,
  `tImage` varchar(200) NOT NULL,
  `created_at` varchar(30) NOT NULL,
  `updated_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`t_id`, `user_id`, `thread`, `tImage`, `created_at`, `updated_at`) VALUES
(6, 1, 'Feeling Proud for this work', '148764512114494728_1112577028821425_7849747242732865065_n.jpg', 'On 21/02/17 at 08:45:21am', 'On 21/02/17 at 01:37:58pm'),
(7, 1, 'It is sunny today', '1487674827inde11x.jpeg', 'On 21/02/17 at 05:00:27pm', 'On 21/02/17 at 05:01:59pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `last_login` varchar(30) NOT NULL,
  `last_logout` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `address`, `dob`, `created_at`, `updated_at`, `last_login`, `last_logout`) VALUES
(1, 'Md. Mayeen Uddin', 'mayeennbd@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '222/C', '15/11/1993', '18/02/17', '19/02/17', 'On 21/02/17 at 04:59:24pm', 'On 21/02/17 at 01:45:29pm'),
(2, 'Yousuf', 'yousuf@gmail.com', '2', '222/C', '15/12/1993', '18/02/17', '19/02/17', 'On 21/02/17 at 04:59:24pm', ''),
(3, 'Akash', 'akashnbd18@gmail.com', '123', '222/C', '2017-02-07', 'On 19/02/17 at 01:43:23pm', '', 'On 21/02/17 at 04:59:24pm', ''),
(5, '', '', '', '', '', 'On 19/02/17 at 02:10:59pm', '', 'On 21/02/17 at 04:59:24pm', ''),
(6, 'Arif', 'mohammadarif9292@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '222/C', '2017-02-21', 'On 21/02/17 at 08:34:55am', '', 'On 21/02/17 at 04:59:24pm', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likecomment`
--
ALTER TABLE `likecomment`
  ADD PRIMARY KEY (`lc_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likecomment`
--
ALTER TABLE `likecomment`
  MODIFY `lc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
