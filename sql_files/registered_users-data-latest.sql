-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 09:15 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogit`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `number` bigint(10) NOT NULL,
  `preferences` text NOT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`fname`, `lname`, `email`, `password`, `number`, `preferences`, `user_id`) VALUES
('John', 'Cena', 'cantseeme@gmail.com', 'JohnCena123', 9820776054, 'nature travel politics sports ', 'U104'),
('Nikhil', 'Sharma', 'nikhil@test.com', 'Nikhil123', 9382929393, 'nature travel politics sports tech ', 'U105'),
('Param', 'Shendekar', 'paramv@gmail.com', 'Param123', 9830236209, 'nature travel politics sports tech ', 'U101'),
('Param', 'Shendekar', 'paramvs8@gmail.com', 'Param123', 9930236209, 'nature travel politics ', 'U103'),
('Param', 'Shendekar', 'paramvs@gmail.com', 'Param123', 9930236208, 'nature politics sports tech ', 'U102');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `user_id` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
