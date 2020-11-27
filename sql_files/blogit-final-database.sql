-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 06:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `blogimg`
--

CREATE TABLE `blogimg` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `blogid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogimg`
--

INSERT INTO `blogimg` (`id`, `userid`, `blogid`, `name`) VALUES
(3, 'U103', 11, 'u103ML model steps.png'),
(4, 'U101', 12, 'u101big data architecture.png'),
(5, 'U103', 13, 'u103fintech partnerships.png'),
(6, 'U102', 14, 'u102FASTag business model.png'),
(7, 'U104', 15, 'u104wp1.PNG'),
(8, 'U102', 16, 'u102wp2.PNG'),
(9, 'U105', 17, 'u105virat.jpg'),
(10, 'U101', 18, 'u101cena.jpg'),
(11, 'U104', 19, 'u104food.jpg'),
(12, 'U103', 20, 'u103mobiles.jpg'),
(13, 'U102', 21, 'u102fashion.jpg'),
(14, 'U105', 22, 'u105cricket.jpg'),
(15, 'U106', 23, 'u106politics.jpg'),
(16, 'U101', 24, 'u101kjsce.jpg');

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
(11, 'U103', 'Ennovate Internship Partner', 'Cricket', 'lets do it', 'cant see me', 'lets finish this', 'https://www.bcci.tv/', 'world,war', 'nature,travel,politics', '2020-11-26 07:38:34', '2020-11-26 07:38:34'),
(12, 'U101', 'Higher Education Partner', 'Dreams of every 10 year old', 'abcdef', 'We don’t look at names, we focus on our skills.', 'We thrive on challenges.', 'https://www.facebook.com/', 'india,cricket', 'politics,sports,tech', '2020-11-26 07:47:27', '2020-11-26 07:47:27'),
(13, 'U103', 'Binovation', 'Life goes on', 'Abcdef', 't has been one week since the Indian Cricket Team arrived in Australia for the long multi-format tour. While the squad remains in quarantine, the boys have been training simultaneously both with the white and red ball.\r\n\r\nThe famed fast bowling unit which is currently without their most experienced campaigner, Ishant Sharma is preparing for another long haul. The pacers have arrived in Australia on the back of an impressive run of over two years. \r\n\r\nThey were lethal on the tours of South Africa, England, Australia and at home against the Protea before India’s last international tour in New Zealand earlier this year.', 'Indian fast bowlers have most number of wickets', 'https://www.bcci.tv/', 'cricket,india', 'nature,travel,politics,sports', '2020-11-26 07:58:19', '2020-11-26 07:58:19'),
(14, 'U102', 'Hello World!', 'lets hope for the best', 'a', 'ab', 'abc', 'https://www.facebook.com/', 'alphabets', 'travel,politics,tech', '2020-11-26 08:10:40', '2020-11-26 08:10:40'),
(15, 'U104', 'PARAMeter here', 'abc', 'abc', 'abc', 'abc', 'https://codeforces.com/', 'code', 'nature,travel,politics,sports,tech', '2020-11-26 08:16:34', '2020-11-26 08:16:34'),
(16, 'U102', 'Nikhil says Hello', 'abc', 'abc', 'abc', 'abc', 'https://www.bcci.tv/', 'abc', 'nature,travel', '2020-11-26 08:34:42', '2020-11-26 08:34:42'),
(17, 'U105', 'King Kohli', 'abc', 'abc', 'abc', 'abc', 'https://www.bcci.tv/', 'acb', 'nature,travel,politics,sports', '2020-11-26 08:35:36', '2020-11-26 08:35:36'),
(18, 'U101', 'Blog Post Test', 'blg test', 'abc', 'abc', 'abc', 'https://codeforces.com/', 'test,wp', 'travel,politics,sports', '2020-11-26 16:34:55', '2020-11-26 16:34:55'),
(19, 'U104', 'CARROT, LENTIL & RAISIN SALAD', 'SERVES 2 | VEGETARIAN & VEGAN FRIENDLY', 'This is an old favourite recipe.', 'This is an old favourite recipe, which we’ve recently given a revamp to make it even better for you. It’s not the most beautiful salad around but it’s incredibly delicious and simple to make. The squash is roasted until tender with cumin and cinnamon, before being tossed with lentils, quinoa, raisins and toasted pine nuts and then drizzled with a tahini, lime and maple dressing. I like to make big batches of this and eat the leftovers for desk lunches across the week, adding a handful of rocket and some avocado when I serve it.', 'Good Food is healthy, tasty and looks pleasant.', 'https://deliciouslyella.com/recipes/carrot-lentil-raisin-salad/', 'food', 'nature,travel', '2020-11-27 04:54:03', '2020-11-27 04:54:03'),
(20, 'U103', 'Android Lollipop Rolls Out!', 'Google’s latest mobile software, plus Ask.fm changes', 'Designing the perfect Lollipop? Should be size of face!', 'Google’s blog post focuses on the design aspects of Lollipop, particularly the way its “material design” aims to be “one consistent design language flexible enough to span devices across mobile, desktop, and beyond”.\r\n\r\nIs the company onto something? If you’re using Lollipop already on one or more devices, how are you finding it, and do you think material design will deliver on Google’s promises?\r\n\r\nWhat new features are looking most useful, and what would you like to see added in future updates? How do you think Android Lollipop stacks up compared to Apple’s iOS 8? The comments are open for your views.', 'What else is on the technology radar today?', 'https://www.theguardian.com/', 'mobile,tech,googe', 'politics,tech', '2020-11-27 04:58:14', '2020-11-27 04:58:14'),
(21, 'U102', 'How to style your favorite sweatsuit', 'Beat the heat!', 'This year has been quite a journey', 'his year has been quite a journey, and the seasonal shifts are moving at a different pace. Comfort in all the chaos has been my number one priority with styling! All the time spent at home has has had me digging to find my perfect versatile sweat suit. Matching suits have made such a strong appearance this year. I’m pretty sure it’s the pandemic’s official uniform.😉\r\n\r\nMy go to is to load up on my favorite jewelry – earrings, a chunky necklace, some bracelets, or whatever your setup is, pile it on for a little extra bling! I like to pair sweats with a good shoe. A chunky sandal, your favorite sneakers or even loafers. Experiment and dig into your accessories for fun! I like to throw a cropped tank, a fitted sports bra, or something light underneath the sweatshirt. The temperature changes often in LA so I need that option to un-layer and relayer. I like tie’ing the sweatshirt over the shoulders or at the waist for a laid back variation.', 'The Tularosa jogger & Malibu crew color look good', 'https://sincerelyjules.com/', 'fashion,lifestyle', 'nature,travel,politics', '2020-11-27 05:07:48', '2020-11-27 05:07:48'),
(22, 'U105', 'T Natarajan added to India’s ODI squad', 'Indian Cricket Blooming!', 'Selection Committee has added T Natarajan to India’s squad', 'The All-India Senior Selection Committee has added T Natarajan to India’s squad for the three-match ODI series against Australia starting Friday.\r\n\r\nNavdeep Saini complained of back spasm and Natarajan has been added as a back-up.\r\n\r\nIndia’s ODI squad: Virat Kohli (C), Shikhar Dhawan, Shubman Gill, KL Rahul (WK), Sanju Samson (WK), Shreyas Iyer, Manish Pandey, Hardik Pandya, Mayank Agarwal, Ravindra Jadeja, Yuzvendra Chahal, Kuldeep Yadav, Jasprit Bumrah, Mohammed Shami, Navdeep Saini, Shardul Thakur, T Natarajan.\r\n\r\nUpdate on Player Fitness\r\n\r\n1. Mr Rohit Sharma – He is presently undergoing rehabilitation at the NCA. Mr Rohit Sharma’s next assessment will be conducted on December 11th following which the BCCI will have clarity on his participation in the upcoming Border-Gavaskar Trophy in Australia.\r\n\r\n1. Mr Rohit Sharma had to come back to Mumbai after the IPL to attend his ailing father. His father is now recuperating well and that has allowed him to travel to the NCA and start his rehabilitation.\r\n\r\n2. Mr Ishant Sharma – Ishant has recovered completely from his side strain injury sustained during IPL 2020 in the U.A.E. While he’s building up his workload in order to achieve Test match fitness, Mr Ishant Sharma has been ruled out of the Border-Gavaskar Trophy.', 'Cricket rocks', 'https://www.bcci.tv/', 'india,cricket,life', 'travel,politics,sports', '2020-11-27 05:13:18', '2020-11-27 05:13:18'),
(23, 'U106', 'Can India recover from toxic politics?', 'A question which intrigues the nation', 'The sheer suddenness of the move, the unpredictability of the move!', 'The 2019 Lok Sabha elections have seen one of the most vitriolic campaigns ever in India. From PM Narendra Modi saying former PM Rajiv Gandhi died as “corrupt number 1”, to Mayawati dragging Modi’s wife into her speech, 2019 has seen it all. The high-pitched campaign comes to an end Friday.\r\n\r\nThePrint asks: Can Indian politics recover from the toxicity of the 2019 Lok Sabha election campaign?\r\nFrom talks of slapping the PM, to calling him a coward and a thief, the opposition parties have stopped at nothing to make this the ugliest campaign ever.\r\n\r\nRahul Gandhi of the Congress is the epitome of double standard – on the one hand, he talks about love, and on the other, he says “Chowkidaar chor hai”. Love and affection can’t exist in the same realm as hate and calling your PM a “thief”. After all, PM Modi is also Rahul Gandhi’s PM.', 'Indian politics can never be the same again', 'https://theprint.in/', 'politics,india,modi', 'travel,politics,tech', '2020-11-27 05:18:28', '2020-11-27 05:18:28'),
(24, 'U101', 'KJSCE best college in Mumbai', 'Well, no prizes for guessing that!', 'The K. J. Somaiya College of Engineering was established in 1983', 'KJ Somaiya College of Engineering is a good college in infrastructure and placements. Placements: The college provides many opportunities for placements. ... Infrastructure: The infrastructure of our college is excellent.', 'Best hai!', 'https://kjsce.somaiya.edu/en', 'kjsce,college', 'nature,travel,politics,sports,tech', '2020-11-27 05:24:30', '2020-11-27 05:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `proimg`
--

CREATE TABLE `proimg` (
  `id` int(11) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `status` int(5) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proimg`
--

INSERT INTO `proimg` (`id`, `userid`, `status`, `name`) VALUES
(2, 'U101', 1, 'u101ParamShendekar.jpg'),
(3, 'U102', 1, 'u102nikhil.jpg'),
(4, 'U103', 1, 'u103cena.jpg'),
(5, 'U104', 1, 'u104indira.jpg'),
(6, 'U105', 1, 'u105virat.jpg'),
(7, 'U106', 1, 'u106modi.jpg');

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
('John', 'Cena', 'cantseeme@gmail.com', 'JohnCena123', 9820746044, 'politics sports tech ', 'U103'),
('Indira', 'Gandhi', 'gandhi@gmail.com', 'Gandhi123', 9696969696, 'nature politics tech ', 'U104'),
('Narendra', 'Modi', 'modi@gmail.com', 'Modi1234', 9930236290, 'travel politics sports tech ', 'U106'),
('Nikhil', 'Sharma', 'nikhil@test.com', 'Nikhil123', 9920920508, 'nature travel politics ', 'U102'),
('Param', 'Shendekar', 'paramvs8@gmail.com', 'Param123', 9930236209, 'travel politics sports ', 'U101'),
('Virat', 'Kohli', 'virat18@gmail.com', 'Virat123', 9181818189, 'travel politics sports ', 'U105');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogimg`
--
ALTER TABLE `blogimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `proimg`
--
ALTER TABLE `proimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogimg`
--
ALTER TABLE `blogimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `proimg`
--
ALTER TABLE `proimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
