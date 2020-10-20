-- TODO add author
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 02:25 PM
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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `intro` text NOT NULL,
  `main` text NOT NULL,
  `conclusion` text NOT NULL,
  `additionalReadings` text NOT NULL,
  `tags` text NOT NULL,
  `categories` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`title`, `subtitle`, `intro`, `main`, `conclusion`, `additionalReadings`, `tags`, `categories`, `created_at`, `updated_at`) VALUES
('Nikhil', 'Hi there this is nikhil sharma', 'This is the introductory paragraph', 'This is the main body', 'this is the conclusion', 'https://example.com/', '1814114,nikhil', 'Array', '2020-10-20 12:14:32', '2020-10-20 12:14:32'),
('Nikhil', 'Hi there this is nikhil sharma', 'This is the introductory paragraph', 'This is the main body', 'this is the conclusion', 'https://example.com/', '1814114,nikhil', 'Array', '2020-10-20 12:23:35', '2020-10-20 12:23:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
