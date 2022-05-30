-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 09:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`) VALUES
(2, 'Toán', '2022-05-30 07:26:23'),
(3, 'Lập trình', '2022-05-30 07:26:23'),
(4, 'Cuộc sống', '2022-05-30 07:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `img`, `published`, `author_id`, `category_id`, `created_at`) VALUES
(70, 'tieu de 1', '<p>Noi dung 1</p>', 'bbbbbbbb281360270_304261821769737_2643295782735683076_n.jpg', 1, 58, 2, '2022-05-30 07:28:10'),
(71, 'tieu de 2', '<p>noi dung 2</p>', 'bbbbbbbb23233322 copy.png', 1, 58, 3, '2022-05-30 07:28:35'),
(72, 'tieu de 3', '<p>noi dung 3</p>', '278384052_4761727600616800_5258904948488292239_n.jpg', 1, 58, 4, '2022-05-30 07:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`) VALUES
(558, 70, 31, '2022-05-30 07:28:11'),
(560, 71, 31, '2022-05-30 07:28:35'),
(561, 72, 16, '2022-05-30 07:29:02'),
(562, 72, 23, '2022-05-30 07:29:02'),
(563, 72, 29, '2022-05-30 07:29:02'),
(564, 72, 31, '2022-05-30 07:29:02'),
(569, 70, 29, '2022-05-30 07:32:23'),
(570, 70, 16, '2022-05-30 07:32:47'),
(575, 71, 27, '2022-05-30 07:34:39'),
(576, 71, 29, '2022-05-30 07:34:39'),
(577, 71, 21, '2022-05-30 07:34:52'),
(578, 71, 23, '2022-05-30 07:34:52'),
(579, 71, 16, '2022-05-30 07:35:03'),
(580, 70, 21, '2022-05-30 07:35:47'),
(581, 70, 23, '2022-05-30 07:35:47'),
(582, 70, 27, '2022-05-30 07:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`, `created_at`) VALUES
(16, 'Xác suất 1', '2022-05-20 13:18:33'),
(21, 'DA', '2022-05-20 13:19:02'),
(23, 'PHP 2', '2022-05-22 05:43:41'),
(27, 'C', '2022-05-23 02:52:24'),
(29, 'Hoa', '2022-05-24 02:48:08'),
(31, 'C++', '2022-05-29 13:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES
(58, 1, 'tmeid', 'tmeid901@gmail.com', '$2y$10$M/v8ndmEc1Y7eJ4jAFZH3..8gj3C1ma49v.dTAq3nTbIBfAhvdapq', '2022-05-16 07:19:44'),
(62, 0, 'ben', 'chilily3319@gmail.com', '$2y$10$puRHWaX/IFJk67Sk/L9LMejkGYv.9uPEcmBRS1SpALbe3R0VSHxhm', '2022-05-17 08:41:18'),
(63, 1, 'tme', 'tme@gmail.com', '$2y$10$wEuBoEM78feJvR3ZV.q.xOZsZf1zWSAD96qTbIYrR/jBwiHZ8/N3q', '2022-05-17 15:17:30'),
(64, 1, 'oc123', 'oc@gmail.com', '$2y$10$kB6aNeoQC.2oxWJY9mgan.WfTfchFE.9wncubyJQX5oidmPP6gmKu', '2022-05-19 08:02:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`post_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_name` (`tag_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=583;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_ibfk_4` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
