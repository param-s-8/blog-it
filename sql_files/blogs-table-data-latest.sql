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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
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

INSERT INTO `blogs` (`id`, `author`, `title`, `subtitle`, `intro`, `main`, `conclusion`, `additionalReadings`, `tags`, `categories`, `created_at`, `updated_at`) VALUES
(1, 'U105', 'Nikhil', 'Hi there this is nikhil sharma', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sed viverra ipsum nunc aliquet bibendum. Quam id leo in vitae turpis massa sed elementum. Vitae semper quis lectus nulla. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Enim ut tellus elementum sagittis vitae et leo duis. Maecenas accumsan lacus vel facilisis volutpat. Condimentum vitae sapien pellentesque habitant morbi. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'https://example.com/', 'cool,trendy', 'politics,lifestyle', '2020-10-26 12:03:20', '2020-10-26 12:03:20'),
(2, 'U104', 'Cool And Trendy Stuff', 'Cool and Trendy Stuff', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sed viverra ipsum nunc aliquet bibendum. Quam id leo in vitae turpis massa sed elementum. Vitae semper quis lectus nulla. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Enim ut tellus elementum sagittis vitae et leo duis. Maecenas accumsan lacus vel facilisis volutpat. Condimentum vitae sapien pellentesque habitant morbi. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'https://example.com/', 'cool,trendy', 'politics,sports,travel', '2020-10-26 12:00:20', '2020-10-26 12:00:20'),
(3, 'U103', 'Look what is happening in fashion World', 'Fashion world', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sed viverra ipsum nunc aliquet bibendum. Quam id leo in vitae turpis massa sed elementum. Vitae semper quis lectus nulla. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Enim ut tellus elementum sagittis vitae et leo duis. Maecenas accumsan lacus vel facilisis volutpat. Condimentum vitae sapien pellentesque habitant morbi. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'https://example.com/', 'cool,trendy', 'politics,fashion,lifestyle', '2020-10-16 12:03:20', '2020-10-16 12:03:20'),
(4, 'U101', 'Look at all these food', 'OMG food', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sed viverra ipsum nunc aliquet bibendum. Quam id leo in vitae turpis massa sed elementum. Vitae semper quis lectus nulla. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Enim ut tellus elementum sagittis vitae et leo duis. Maecenas accumsan lacus vel facilisis volutpat. Condimentum vitae sapien pellentesque habitant morbi. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'https://example.com/', 'cool,trendy', 'nature,food', '2020-01-26 12:03:20', '2020-01-26 12:03:20'),
(5, 'U102', 'Did you know about this sport?', 'Isnt it cool', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sed viverra ipsum nunc aliquet bibendum. Quam id leo in vitae turpis massa sed elementum. Vitae semper quis lectus nulla. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Enim ut tellus elementum sagittis vitae et leo duis. Maecenas accumsan lacus vel facilisis volutpat. Condimentum vitae sapien pellentesque habitant morbi. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'https://example.com/', 'cool,trendy', 'nature,politics,sports', '2020-10-06 12:03:20', '2020-10-06 12:03:20'),
(6, 'U105', 'Wow i love to travel', 'travel travel travel', '2Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sed viverra ipsum nunc aliquet bibendum. Quam id leo in vitae turpis massa sed elementum. Vitae semper quis lectus nulla. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Enim ut tellus elementum sagittis vitae et leo duis. Maecenas accumsan lacus vel facilisis volutpat. Condimentum vitae sapien pellentesque habitant morbi. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'https://example.com/', 'cool,trendy', 'travel,food', '2020-10-26 12:03:20', '2020-10-26 12:03:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`author`) REFERENCES `registered_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
