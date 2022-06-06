-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 05:15 PM
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
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `created_at`) VALUES
(2, 'Toán cc', 'toan-cc', '2022-05-30 07:26:23'),
(3, 'Lập trình', 'lap-trinh', '2022-05-30 07:26:23'),
(4, 'Cuộc sống', 'cuoc-song', '2022-05-30 07:26:23'),
(6, 'Hoa', 'hoa', '2022-05-30 13:10:56'),
(7, 'Sách', 'sach', '2022-05-30 13:11:27'),
(8, 'Review', 'review', '2022-06-06 03:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
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

INSERT INTO `post` (`id`, `title`, `description`, `slug`, `content`, `img`, `published`, `author_id`, `category_id`, `created_at`) VALUES
(70, 'Tiêu đề 1 (1997)', 'Mô tả 1', 'tieu-de-1-1997', '<p>Nội dung 1</p>\r\n<p>Ảnh 1</p>\r\n<div><img src=\"../../assets/imgs/posts/273660856_4642163195895769_1070998989223424465_n.jpg\" alt=\"Tiêu đề 1\" width=\"400\" height=\"400\"></div>', 'bbbbbbbb281360270_304261821769737_2643295782735683076_n.jpg', 1, 58, 2, '2022-05-30 07:28:10'),
(72, 'Cây đỏ đen', 'Mô tả 2', 'cay-do-den', '<p>noi dung 3</p>\r\n<p>cây đỏ đen</p>', '278384052_4761727600616800_5258904948488292239_n.jpg', 1, 58, 4, '2022-05-30 07:29:02'),
(82, 'Tiêu đề 4', 'Mô tả 4', 'tieu-de-4', '<p>Cọc Vài hay Vài Phạ, cao 50m, là một cột đá tự nhiên trong lòng hồ thủy điện Na Hang, thuộc xã Thượng lâm, huyện Lâm Bình, tỉnh Tuyên Quang. Địa danh này nổi tiếng với truyền thuyết chàng Tài Ngào cứu trâu trời và lòng hiếu thảo của người con dành cho mẹ. Du khách đi thuyền dạo ngang cột đá còn được hướng dẫn viên bản địa gợi ý nên xin một điều ước cho bản thân hoặc gia đình, vì đây là nơi linh thiêng, may mắn.</p>', 'bbb277229511_393919259400034_8127372972762510883_n.jpg', 1, 58, 2, '2022-06-01 14:43:43'),
(87, 'Tiêu đề 12', 'Mô tả 12     ', 'tieu-de-12', '<p>222</p>', 'bbbbbbbbbbbb283669959_3148451705404558_8147808819759808391_n.jpg', 1, 58, 3, '2022-06-02 02:45:04'),
(89, 'Tiêu đề 100', 'Mô tả 100', 'tieu-de-100', '<p>Bà Lan và chồng là ông Trần Minh Châu (ở quận Tân Phú), cùng 65 tuổi, vốn là công nhân chế biến thủy sản đông lạnh Công ty cổ phần thủy sản số 1 (nay là Công ty cổ phần thủy sản Hùng Hậu). Năm 2012, bà về hưu. Với 26 năm làm việc và tham gia bảo hiểm xã hội đầy đủ, tỷ lệ hưởng lương hưu của bà đạt 75%, mỗi tháng nhận gần 1,8 triệu đồng. Nhân viên bảo hiểm xã hội giải thích do mức lương để căn cứ đóng bảo hiểm của bà thấp, trung bình cả quá trình chỉ gần 2,4 triệu đồng nên số tiền hưởng không cao.</p>\r\n<p><img src=\"../../assets/imgs/posts/273660856_4642163195895769_1070998989223424465_n.jpg\" alt=\"\" width=\"400\" height=\"400\"></p>\r\n<p>Rất hay.</p>\r\n<p>Bà Lan và chồng là ông Trần Minh Châu (ở quận Tân Phú), cùng 65 tuổi, vốn là công nhân chế biến thủy sản đông lạnh Công ty cổ phần thủy sản số 1 (nay là Công ty cổ phần thủy sản Hùng Hậu). Năm 2012, bà về hưu. Với 26 năm làm việc và tham gia bảo hiểm xã hội đầy đủ, tỷ lệ hưởng lương hưu của bà đạt 75%, mỗi tháng nhận gần 1,8 triệu đồng. Nhân viên bảo hiểm xã hội giải thích do mức lương để căn cứ đóng bảo hiểm của bà thấp, trung bình cả quá trình chỉ gần 2,4 triệu đồng nên số tiền hưởng không cao.</p>\r\n<p>Bà Lan và chồng là ông Trần Minh Châu (ở quận Tân Phú), cùng 65 tuổi, vốn là công nhân chế biến thủy sản đông lạnh Công ty cổ phần thủy sản số 1 (nay là Công ty cổ phần thủy sản Hùng Hậu). Năm 2012, bà về hưu. Với 26 năm làm việc và tham gia bảo hiểm xã hội đầy đủ, tỷ lệ hưởng lương hưu của bà đạt 75%, mỗi tháng nhận gần 1,8 triệu đồng. Nhân viên bảo hiểm xã hội giải thích do mức lương để căn cứ đóng bảo hiểm của bà thấp, trung bình cả quá trình chỉ gần 2,4 triệu đồng nên số tiền hưởng không cao.</p>\r\n<p>Bà Lan và chồng là ông Trần Minh Châu (ở quận Tân Phú), cùng 65 tuổi, vốn là công nhân chế biến thủy sản đông lạnh Công ty cổ phần thủy sản số 1 (nay là Công ty cổ phần thủy sản Hùng Hậu). Năm 2012, bà về hưu. Với 26 năm làm việc và tham gia bảo hiểm xã hội đầy đủ, tỷ lệ hưởng lương hưu của bà đạt 75%, mỗi tháng nhận gần 1,8 triệu đồng. Nhân viên bảo hiểm xã hội giải thích do mức lương để căn cứ đóng bảo hiểm của bà thấp, trung bình cả quá trình chỉ gần 2,4 triệu đồng nên số tiền hưởng không cao.</p>\r\n<p>Bà Lan và chồng là ông Trần Minh Châu (ở quận Tân Phú), cùng 65 tuổi, vốn là công nhân chế biến thủy sản đông lạnh Công ty cổ phần thủy sản số 1 (nay là Công ty cổ phần thủy sản Hùng Hậu). Năm 2012, bà về hưu. Với 26 năm làm việc và tham gia bảo hiểm xã hội đầy đủ, tỷ lệ hưởng lương hưu của bà đạt 75%, mỗi tháng nhận gần 1,8 triệu đồng. Nhân viên bảo hiểm xã hội giải thích do mức lương để căn cứ đóng bảo hiểm của bà thấp, trung bình cả quá trình chỉ gần 2,4 triệu đồng nên số tiền hưởng không cao.</p>\r\n<p>Bà Lan và chồng là ông Trần Minh Châu (ở quận Tân Phú), cùng 65 tuổi, vốn là công nhân chế biến thủy sản đông lạnh Công ty cổ phần thủy sản số 1 (nay là Công ty cổ phần thủy sản Hùng Hậu). Năm 2012, bà về hưu. Với 26 năm làm việc và tham gia bảo hiểm xã hội đầy đủ, tỷ lệ hưởng lương hưu của bà đạt 75%, mỗi tháng nhận gần 1,8 triệu đồng. Nhân viên bảo hiểm xã hội giải thích do mức lương để căn cứ đóng bảo hiểm của bà thấp, trung bình cả quá trình chỉ gần 2,4 triệu đồng nên số tiền hưởng không cao.</p>', '273660856_4642163195895769_1070998989223424465_n.jpg', 1, 58, 3, '2022-06-02 03:45:03'),
(90, 'Nhập môn lập trình C', 'Mô tả lập trình C', 'nhap-mon-lap-trinh-c', '<p>Đây là tiêu đề của bài viết Nhập môn lập trình C</p>\r\n<p>Đây là nội dung của bài viết nhập môn lập trình C</p>', 'bbbbb277229511_393919259400034_8127372972762510883_n.jpg', 1, 58, 3, '2022-06-02 10:39:32'),
(92, 'dddd', 'dddd', 'dddd', '<p><img src=\"../../assets/imgs/posts/273660856_4642163195895769_1070998989223424465_n.jpg\" alt=\"\" width=\"900\" height=\"900\"></p>', 'b285062340_2848805938755804_1364554525238657361_n.jpg', 1, 58, 2, '2022-06-03 11:09:22');

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
(561, 72, 16, '2022-05-30 07:29:02'),
(562, 72, 23, '2022-05-30 07:29:02'),
(564, 72, 31, '2022-05-30 07:29:02'),
(570, 70, 16, '2022-05-30 07:32:47'),
(597, 82, 23, '2022-06-01 14:43:43'),
(605, 87, 16, '2022-06-02 02:45:04'),
(608, 89, 16, '2022-06-02 03:45:03'),
(609, 89, 21, '2022-06-02 03:45:04'),
(610, 90, 27, '2022-06-02 10:39:32'),
(612, 92, 21, '2022-06-03 11:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`, `slug`, `created_at`) VALUES
(16, 'Xác suất ', 'xac-suat', '2022-05-20 13:18:33'),
(21, 'DA', 'da', '2022-05-20 13:19:02'),
(23, 'PHP 2', 'php-2', '2022-05-22 05:43:41'),
(27, 'C', 'c', '2022-05-23 02:52:24'),
(31, 'C++', 'c', '2022-05-29 13:17:34'),
(32, 'C#', 'c', '2022-06-06 03:49:21');

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
(62, 2, 'ben', 'chilily3319@gmail.com', '$2y$10$puRHWaX/IFJk67Sk/L9LMejkGYv.9uPEcmBRS1SpALbe3R0VSHxhm', '2022-05-17 08:41:18'),
(63, 2, 'tme', 'tme@gmail.com', '$2y$10$wEuBoEM78feJvR3ZV.q.xOZsZf1zWSAD96qTbIYrR/jBwiHZ8/N3q', '2022-05-17 15:17:30'),
(64, 0, 'oc123', 'oc@gmail.com', '$2y$10$kB6aNeoQC.2oxWJY9mgan.WfTfchFE.9wncubyJQX5oidmPP6gmKu', '2022-05-19 08:02:01'),
(67, 0, 'test123', 'test123@gmail.com', '$2y$10$jUYjoPdr3Vi9TaUNBRjVRO1BAbMbEZL6VWf6pP.gJorOKequ9hYBO', '2022-06-01 03:22:35'),
(68, 0, 'test1234', 'test1234@gmail.com', '$2y$10$V6O5Ctp.KvDjymaF.xuvC.iy1dpqYGJJj8jr91UPiwGepfyJ/8Foy', '2022-06-01 03:27:00');

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
  ADD UNIQUE KEY `post_id_tag_id` (`post_id`,`tag_id`) USING BTREE;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
