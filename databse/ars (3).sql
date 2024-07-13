-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 07:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ars`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about` text DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about`, `created_at`) VALUES
(1, 'wakanda', '2023-08-01 17:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(20) NOT NULL,
  `district_id` int(20) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `district_id`, `area`) VALUES
(1, 1, 'Port Blair'),
(2, 1, 'Aberdeen Bazaar'),
(3, 1, 'Haddo'),
(4, 1, 'Dairy Farm'),
(5, 1, 'Garacharma'),
(6, 1, 'Shadipur'),
(7, 1, 'Sippighat'),
(8, 1, 'Chatham'),
(9, 1, 'Dollygunj'),
(10, 1, 'Prothrapur'),
(11, 1, 'Brichgunj'),
(12, 1, 'Brookshabad'),
(13, 1, 'Bathu Basti'),
(14, 1, 'Wimberlygunj'),
(15, 1, 'Manglutan'),
(16, 1, 'Bamboo Flat'),
(17, 1, 'Ferrargunj'),
(18, 1, 'Austinabad'),
(19, 1, 'Chouldari'),
(20, 1, 'Chidiyatapu'),
(21, 1, 'Sippighat Industrial Area'),
(22, 1, 'Delanipur'),
(23, 1, 'Marine Hill'),
(24, 1, 'Lamba Line'),
(25, 1, 'Dandus Point'),
(26, 1, 'Mithakhari'),
(27, 1, 'Pahargaon'),
(28, 1, 'Shyam Nagar'),
(29, 1, 'Buniyadabad'),
(30, 1, 'Prem Nagar'),
(31, 1, 'Minnie Bay'),
(32, 1, 'Badam Basti'),
(33, 1, 'Bathu Basti'),
(34, 1, 'Aghapur'),
(35, 1, 'Nayagaon'),
(36, 1, 'Calicut'),
(37, 1, 'Lamba Line Extension'),
(38, 1, 'Meenakshi'),
(39, 1, 'Garacharma Village'),
(40, 1, 'Naya Basti'),
(41, 1, 'Kero Basti'),
(42, 1, 'Haddo Village'),
(43, 1, 'Pathar Basti'),
(44, 1, 'Dollygunj Village'),
(45, 1, 'Marine Dockyard'),
(46, 1, 'Tirktop'),
(47, 1, 'Garacharma Tehsil'),
(48, 1, 'Kero Tehsil'),
(49, 1, 'Haddo Tehsil'),
(50, 1, 'Port Blair Tehsil'),
(51, 2, 'Mayabunder'),
(52, 2, 'Rangat'),
(53, 2, 'Diglipur'),
(54, 2, 'Baratang Island'),
(55, 2, 'Kadamtala'),
(56, 2, 'Kalighat'),
(57, 2, 'Karmatang'),
(58, 2, 'Bakultala'),
(59, 2, 'Uttara'),
(60, 2, 'Webi'),
(61, 2, 'Ramnagar'),
(62, 2, 'Laxmipur'),
(63, 2, 'Sitanagar'),
(64, 2, 'Karmapur'),
(65, 2, 'Durgapur'),
(66, 2, 'Madhupur'),
(67, 2, 'Betapur'),
(68, 2, 'Bara Tang'),
(69, 2, 'Mitha Khari'),
(70, 2, 'Tamaloo'),
(71, 2, 'Nimbudera'),
(72, 2, 'Bada Karmatang'),
(73, 2, 'Patikayapur'),
(74, 2, 'Mithakhari'),
(75, 2, 'Amkunj'),
(76, 2, 'Laxmipur Tehsil'),
(77, 2, 'Rangat Tehsil'),
(78, 2, 'Kadamtala Tehsil'),
(79, 2, 'Billiground'),
(80, 2, 'Brahamanallah'),
(81, 2, 'Choteylal'),
(82, 2, 'Nimbutala'),
(83, 2, 'Madhupur Baratang'),
(84, 2, 'Kadamtala Baratang'),
(85, 2, 'Dhanikhari'),
(86, 2, 'R K Pur'),
(87, 2, 'R M Pahal'),
(88, 2, 'R K Pur'),
(89, 2, 'School Line'),
(90, 2, 'Wimberlygunj'),
(91, 2, 'Vijay Nagar'),
(92, 2, 'Little Andaman'),
(93, 2, 'Kendriya Vidyalaya No. 1'),
(94, 2, 'Kendriya Vidyalaya No. 2'),
(95, 2, 'Kendriya Vidyalaya No. 3'),
(96, 2, 'Kendriya Vidyalaya No. 4'),
(97, 2, 'Kendriya Vidyalaya No. 5'),
(98, 2, 'Kendriya Vidyalaya No. 6'),
(99, 2, 'Kendriya Vidyalaya No. 7'),
(100, 2, 'Kendriya Vidyalaya No. 8'),
(101, 3, 'Car Nicobar'),
(102, 3, 'Nancowry'),
(103, 3, 'Kamorta'),
(104, 3, 'Great Nicobar'),
(105, 3, 'Katchal'),
(106, 3, 'Teressa'),
(107, 3, 'Chowra'),
(108, 3, 'Trinket'),
(109, 3, 'Nancowry Tehsil'),
(110, 3, 'Kamorta Tehsil'),
(111, 3, 'Teressa Tehsil'),
(112, 3, 'Pilomillow'),
(113, 3, 'Little Nicobar'),
(114, 3, 'Pilopatia'),
(115, 3, 'Sawai'),
(116, 3, 'Kakana'),
(117, 3, 'Teetop'),
(118, 3, 'Big Lapathy'),
(119, 3, 'Pilobatch'),
(120, 3, 'Kondul'),
(121, 3, 'Kinyuka'),
(122, 3, 'Big Lapathy Tehsil'),
(123, 3, 'Mus'),
(124, 3, 'Pulopatia'),
(125, 3, 'Sawai Tehsil'),
(126, 3, 'Kakana Tehsil'),
(127, 3, 'Big Lapathy Tehsil'),
(128, 3, 'Pilobatch Tehsil'),
(129, 3, 'Mus Tehsil'),
(130, 3, 'Pulobatch'),
(131, 3, 'Laing'),
(132, 3, 'Kakana Tehsil'),
(133, 3, 'Arong'),
(134, 3, 'Shoal Bay'),
(135, 3, 'Komath'),
(136, 3, 'Long Island'),
(137, 3, 'Banana Leaf'),
(138, 3, 'Kakana Tehsil'),
(139, 3, 'Arong'),
(140, 3, 'Shoal Bay'),
(141, 3, 'Komath'),
(142, 3, 'Long Island'),
(143, 3, 'Banana Leaf'),
(144, 3, 'Lapathy'),
(145, 3, 'Tappy'),
(146, 3, 'Bompoka'),
(147, 3, 'Great Nicobar Tehsil'),
(148, 3, 'Arong Tehsil'),
(149, 3, 'Shoal Bay Tehsil'),
(150, 3, 'Long Island Tehsil'),
(151, 3, 'Banana Leaf Tehsil'),
(152, 3, 'Lapathy Tehsil'),
(153, 3, 'Tappy Tehsil'),
(154, 3, 'Bompoka Tehsil'),
(155, 3, 'Teressa Tehsil'),
(156, 3, 'Pilomillow Tehsil'),
(157, 3, 'Little Nicobar Tehsil'),
(158, 3, 'Chowra Tehsil'),
(159, 3, 'Trinket Tehsil'),
(160, 3, 'Katchal Tehsil');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'FLAT'),
(2, '2BHK'),
(3, '3BHK');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(11) NOT NULL,
  `tag_line` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `tag_line`, `address`, `contact_no`, `email_id`) VALUES
(1, 'sd', 'sdf', '435345', 'admin@user.com');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(20) NOT NULL,
  `district` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `district`) VALUES
(1, 'South Andaman'),
(2, 'North and Middle Andaman'),
(3, 'Nicobar');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(50) NOT NULL,
  `qr` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `qr`, `date`, `description`) VALUES
(1, 'photo1690909924.jpeg', '2023-08-02', '8779gkj');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `pay` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `query` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `email`, `query`, `name`) VALUES
(1, 'admin@outlook.com', 'asdfa', 'asf');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(200) NOT NULL,
  `user` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `interior` varchar(200) NOT NULL,
  `kitchen` varchar(255) NOT NULL,
  `video` varchar(5000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `room_for` varchar(30) NOT NULL,
  `contact` int(10) NOT NULL,
  `district_id` varchar(50) NOT NULL,
  `area_id` varchar(11) NOT NULL,
  `water` varchar(20) NOT NULL,
  `toilet` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` varchar(225) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Available',
  `rent` int(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `terms` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `district` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `nearby` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `joined` date NOT NULL,
  `pay` varchar(50) DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `gender`, `password`, `district`, `area`, `nearby`, `role`, `status`, `joined`, `pay`) VALUES
(1, 'user', 0, 'adminr@gmail.com', 'male', 'admin', '1', '22', 'a', 'master', 'Active', '0000-00-00', 'Paid'),
(7, 'rakesh', 2147483647, 'admin@outlook.com', 'Male', 'C#@r@C&3r', '2', '63', 'asdfasf', 'admin', 'Active', '2025-06-23', 'Paid'),
(26, 'demo', 99332022, 'demo@gmail.com', 'Male', '123', '2', '53', 'Bathubasti, Port Blair', 'user', 'Active', '2023-07-05', 'Paid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
