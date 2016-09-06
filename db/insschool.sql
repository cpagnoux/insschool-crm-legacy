-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2016 at 02:58 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `goody`
--

CREATE TABLE `goody` (
  `goody_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `price` decimal(4,2) DEFAULT NULL,
  `stock` smallint(5) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `teacher_id` tinyint(3) UNSIGNED NOT NULL,
  `day` enum('MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY') NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room_id` tinyint(3) UNSIGNED NOT NULL,
  `costume` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` smallint(5) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal_code` char(5) NOT NULL,
  `city` varchar(50) NOT NULL,
  `cellphone` char(14) DEFAULT NULL,
  `cellphone_father` char(14) DEFAULT NULL,
  `cellphone_mother` char(14) DEFAULT NULL,
  `phone` char(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `means_of_knowledge` enum('POSTER_FLYER','INTERNET','WORD_OF_MOUTH') DEFAULT NULL,
  `volunteer` tinyint(1) NOT NULL DEFAULT '0',
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` smallint(5) UNSIGNED NOT NULL,
  `member_id` smallint(5) UNSIGNED NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_content`
--

CREATE TABLE `order_content` (
  `order_id` smallint(5) UNSIGNED NOT NULL,
  `goody_id` smallint(5) UNSIGNED NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_payment`
--

CREATE TABLE `order_payment` (
  `order_payment_id` smallint(5) UNSIGNED NOT NULL,
  `order_id` smallint(5) UNSIGNED NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `mode` enum('CASH','CHECK') NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pre_registration`
--

CREATE TABLE `pre_registration` (
  `pre_registration_id` smallint(5) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal_code` char(5) NOT NULL,
  `city` varchar(50) NOT NULL,
  `cellphone` char(14) DEFAULT NULL,
  `cellphone_father` char(14) DEFAULT NULL,
  `cellphone_mother` char(14) DEFAULT NULL,
  `phone` char(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `lessons` text NOT NULL,
  `plan` enum('QUARTERLY','ANNUAL') NOT NULL,
  `means_of_knowledge` enum('POSTER_FLYER','INTERNET','WORD_OF_MOUTH') NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` smallint(5) UNSIGNED NOT NULL,
  `member_id` smallint(5) UNSIGNED NOT NULL,
  `season` char(9) NOT NULL,
  `plan` enum('QUARTERLY','ANNUAL') NOT NULL,
  `followed_quarters` set('1','2','3') DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `discount` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `num_payments` tinyint(3) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registration_detail`
--

CREATE TABLE `registration_detail` (
  `registration_id` smallint(5) UNSIGNED NOT NULL,
  `lesson_id` tinyint(3) UNSIGNED NOT NULL,
  `show_participation` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registration_file`
--

CREATE TABLE `registration_file` (
  `registration_id` smallint(5) UNSIGNED NOT NULL,
  `medical_certificate` tinyint(1) NOT NULL DEFAULT '0',
  `insurance` tinyint(1) NOT NULL DEFAULT '0',
  `photo` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registration_payment`
--

CREATE TABLE `registration_payment` (
  `registration_payment_id` smallint(5) UNSIGNED NOT NULL,
  `registration_id` smallint(5) UNSIGNED NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `mode` enum('CASH','CHECK') NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal_code` char(5) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` tinyint(3) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal_code` char(5) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `cellphone` char(14) DEFAULT NULL,
  `phone` char(14) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `absences` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(24) NOT NULL,
  `password` char(128) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goody`
--
ALTER TABLE `goody`
  ADD PRIMARY KEY (`goody_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `day` (`day`,`start_time`,`end_time`,`room_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `last_name` (`last_name`,`first_name`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `order_content`
--
ALTER TABLE `order_content`
  ADD PRIMARY KEY (`order_id`,`goody_id`),
  ADD KEY `goody_id` (`goody_id`);

--
-- Indexes for table `order_payment`
--
ALTER TABLE `order_payment`
  ADD PRIMARY KEY (`order_payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `pre_registration`
--
ALTER TABLE `pre_registration`
  ADD PRIMARY KEY (`pre_registration_id`),
  ADD KEY `last_name` (`last_name`,`first_name`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`),
  ADD UNIQUE KEY `member_id` (`member_id`,`season`);

--
-- Indexes for table `registration_detail`
--
ALTER TABLE `registration_detail`
  ADD PRIMARY KEY (`registration_id`,`lesson_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `registration_file`
--
ALTER TABLE `registration_file`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `registration_payment`
--
ALTER TABLE `registration_payment`
  ADD PRIMARY KEY (`registration_payment_id`),
  ADD KEY `registration_id` (`registration_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `last_name` (`last_name`,`first_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goody`
--
ALTER TABLE `goody`
  MODIFY `goody_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_payment`
--
ALTER TABLE `order_payment`
  MODIFY `order_payment_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pre_registration`
--
ALTER TABLE `pre_registration`
  MODIFY `pre_registration_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration_payment`
--
ALTER TABLE `registration_payment`
  MODIFY `registration_payment_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
