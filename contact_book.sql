-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2017 at 10:57 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `post_code` varchar(20) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `full_name`, `nick_name`, `email`, `street_address`, `city`, `country`, `post_code`, `phone1`, `phone2`, `birthday`, `website`, `created_at`, `updated_at`) VALUES
(8, 9, 'Al Jabed', 'Jabed', 'jabed@gmail.com', ' ', '', '', '0', '151111111', '0', '', '', '0000-00-00', '0000-00-00'),
(9, 2, 'Kalam Rahman', 'Raju', 'kalam@gmail.com', ' ', 'Dilli', 'United States', '', '01722222222', '', '2017-04-20', '', '0000-00-00', '0000-00-00'),
(12, 2, 'Jamal Karim', '', 'jamal@gmail.com', 'Mirpur-12 ,Dhaka ', 'Dhaka', 'Bangladesh', '1205', '0122222222', '', '20/3/1994', 'jamal.bd.com', '0000-00-00', '0000-00-00'),
(13, 3, 'Kasem', '', 'kasem@yahoo.com', ' ', 'Singapur', '99', '0', '012333333', '', '/', '', '0000-00-00', '0000-00-00'),
(16, 10, 'Najmul Ahmed', '', 'najmul2022@gmail.com', ' ', 'Dhaka', '127', '0', '122222223', '0', '', '', '0000-00-00', '0000-00-00'),
(17, 10, 'Julfikar', '', 'julfikar@gmail.com', ' ', '', '', '0', '12222233', '0', '', '', '0000-00-00', '0000-00-00'),
(19, 0, 'Najmul Ahmed', 'Najmul', 'najmul2022@gmail.com', ' ', '', '', '0', '0133333333333', '0', '/', '/', '0000-00-00', '0000-00-00'),
(21, 3, 'Nandan Sarkar', '', 'nandan@gmail.com', ' ', '', '', '', '0173333333', '', '', '', '0000-00-00', '0000-00-00'),
(22, 2, 'Akash Khan', '', 'akash@gmail.com', ' Kustia, Khulna', 'Khulna', 'Bangladesh', '', '0182392234', '', '', '', '0000-00-00', '0000-00-00'),
(24, 2, 'Raihan', 'wew', 'ew@ewewe', ' ', '', '', '', '0000000033333331', '', '/', '', '0000-00-00', '0000-00-00'),
(26, 2, 'dfdf', '', 'rer@erer', ' ', '', '', '', '0000034', '', '', '', '0000-00-00', '0000-00-00'),
(29, 2, 'Samsul Alam ', 'Alom', 'alom@gmail.com', ' ', '', '', '', '01972239021', '', '2017-04-22', '2017-04-22', '0000-00-00', '0000-00-00'),
(30, 2, 'Saman Shikdar', 'saman', 'saman@gmail.com', ' ', '', '', '', '01822129300', '', '2017-04-22', '2017-04-22', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(9) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`) VALUES
(2, 'Najmul', 'Ahmed', 'najmul.ahmed1', '$2y$10$iusesomecrazystrings2ufKKB081n3f/8Ms9kQ/CjwCYmBs2ftqW'),
(3, 'Shohag', 'Sarkar', 'shohag', '$2y$10$iusesomecrazystrings2u1HpoBaJEvZG.RAEEKh1SuI3a.wzgVpG'),
(4, 'Mizan', 'Karim', 'mizan', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW'),
(5, 'Karim', 'Hossan', 'karim.hossan', '$2y$10$iusesomecrazystrings2u8JQfpQrWNkoA2vI3TfZ1DszXy0CeEgi'),
(6, 'Abir', 'ahmed', 'abir', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW'),
(7, 'Abu Jafar', 'Khan', 'abujafar', '$2y$10$iusesomecrazystrings2uPqWZX/hKxwu5aLYVCKijEV8cv/fvcNO'),
(8, 'Tom', 'cros', 'tom', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW'),
(9, 'Karim', 'Riad', 'karim', '$2y$10$iusesomecrazystrings2uZU1BDAKDYZCMuu7WNUsvxV1DObm65bq'),
(10, 'mahfuz', 'Ali', 'mahfuz', '$2y$10$iusesomecrazystrings2uUwz5P8RzUdpHAXNTdYyAFoMvu86Y8zi'),
(11, 's', 'r', 'sakhor', '$2y$10$iusesomecrazystrings2uHlGki6FgUTno2.0CpLKGGW.esNpsXhC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
