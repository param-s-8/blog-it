
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
-- RELATIONSHIPS FOR TABLE `registered_users`:
--

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`fname`, `lname`, `email`, `password`, `number`, `preferences`, `user_id`) VALUES
('John', 'Cena', 'cantseeme@gmail.com', 'JohnCena123', 9820776054, 'nature travel politics sports ', 'U104'),
('Nikhil', 'Sharma', 'nikhil@test.com', 'Nikhil123', 9382929393, 'nature travel politics sports tech ', 'U105'),
('Param', 'Shendekar', 'paramv@gmail.com', 'Param123', 9830236209, 'nature travel politics sports tech ', 'U101'),
('Param', 'Shendekar', 'paramvs8@gmail.com', 'Param123', 9930236209, 'nature travel politics ', 'U103'),
('Param', 'Shendekar', 'paramvs@gmail.com', 'Param123', 9930236208, 'nature politics sports tech ', 'U102');
