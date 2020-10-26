
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
-- RELATIONSHIPS FOR TABLE `blogs`:
--   `author`
--       `registered_users` -> `user_id`
--   `author`
--       `registered_users` -> `user_id`
--

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `author`, `title`, `subtitle`, `intro`, `main`, `conclusion`, `additionalReadings`, `tags`, `categories`, `created_at`, `updated_at`) VALUES
(1, 'U105', 'Nikhil', 'Hi there this is nikhil sharma', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor sed viverra ipsum nunc aliquet bibendum. Quam id leo in vitae turpis massa sed elementum. Vitae semper quis lectus nulla. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis. Enim ut tellus elementum sagittis vitae et leo duis. Maecenas accumsan lacus vel facilisis volutpat. Condimentum vitae sapien pellentesque habitant morbi. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'https://example.com/', 'cool,trendy', 'Array', '2020-10-26 17:33:20', '2020-10-26 17:33:20');
