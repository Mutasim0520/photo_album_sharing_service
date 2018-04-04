-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 04:43 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_album_sharing_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `share_count` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `perma_link` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `created_at`, `updated_at`, `name`, `share_count`, `user_id`, `perma_link`, `password`) VALUES
(16, '2018-03-28 20:18:49', '2018-03-28 20:18:49', 'Test Album', 0, 1, '1042375345_Test_Album_1_1522268329', '$2y$10$79/vHHcjzwI/2awotlE8h.OeDWq/BVIl14Z9CbCqYORreH7VQCZky'),
(17, '2018-03-30 09:42:48', '2018-03-30 09:42:48', 'Test Album 2', 0, 1, '2115286669_Test_Album_2_1_1522402968', '$2y$10$tNTSCRlhq/WfChOPdC71hu3BQLEnPUqSb3LTyrEZKs9lw3AwfJBmC'),
(18, '2018-04-02 10:54:46', '2018-04-02 10:54:46', 'Some head Line', 0, 3, '114130021_Some_head_Line_3_1522666486', '$2y$10$y4b/8DpXU2VJczIwM7VcA.yW5nntPePZEUWzhkV8nV/hJSnTCml9W'),
(19, '2018-04-03 14:23:27', '2018-04-03 14:23:27', 'kjjlkj', 0, 3, '451164399_kjjlkj_3_1522765407', '$2y$10$zmH3LOLBeN8ETObZ1BR7AeiazUPu1YlL8qC9BQ4cgg2ab3xeKQyiq');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `album_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `text`, `ip`, `album_id`) VALUES
(1, '2018-03-29 12:52:23', '2018-03-29 12:52:23', 'Very good', '10.63.4.49', 16),
(2, '2018-03-29 14:29:28', '2018-03-29 14:29:28', 'very bad', '127.0.0.1', 16),
(3, '2018-03-29 14:37:22', '2018-03-29 14:37:22', 'Test again', '127.0.0.1', 16),
(4, '2018-03-29 14:38:27', '2018-03-29 14:38:27', 'test', '127.0.0.1', 16),
(5, '2018-03-29 14:39:25', '2018-03-29 14:39:25', 'test', '127.0.0.1', 16),
(6, '2018-03-29 14:40:06', '2018-03-29 14:40:06', 'test', '127.0.0.1', 16),
(7, '2018-03-29 14:40:16', '2018-03-29 14:40:16', 'test', '127.0.0.1', 16),
(8, '2018-04-03 14:03:12', '2018-04-03 14:03:12', 'very good', '127.0.0.1', 17),
(9, '2018-04-03 14:03:20', '2018-04-03 14:03:20', 'verry good', '127.0.0.1', 17);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `album_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `path`, `album_id`, `created_at`, `updated_at`) VALUES
(6, '1522268329023.png', 16, '2018-03-28 20:18:49', '2018-03-28 20:18:49'),
(7, '1522268329124.png', 16, '2018-03-28 20:18:49', '2018-03-28 20:18:49'),
(8, '15224029680bradThumb.jpg', 17, '2018-03-30 09:42:48', '2018-03-30 09:42:48'),
(9, '15224029681heart-large.png', 17, '2018-03-30 09:42:48', '2018-03-30 09:42:48'),
(10, '15224029682onknee-large.jpg', 17, '2018-03-30 09:42:49', '2018-03-30 09:42:49'),
(11, '15224029693onknee-medium.jpg', 17, '2018-03-30 09:42:49', '2018-03-30 09:42:49'),
(12, '15224029694onknee-small.jpg', 17, '2018-03-30 09:42:49', '2018-03-30 09:42:49'),
(13, '15226664860com.PNG', 18, '2018-04-02 10:54:46', '2018-04-02 10:54:46'),
(14, '15226664861com_book.PNG', 18, '2018-04-02 10:54:46', '2018-04-02 10:54:46'),
(15, '15226664862cover.jpg', 18, '2018-04-02 10:54:46', '2018-04-02 10:54:46'),
(16, '15226664863pen.jpeg', 18, '2018-04-02 10:54:46', '2018-04-02 10:54:46'),
(17, '15227654070com.PNG', 19, '2018-04-03 14:23:27', '2018-04-03 14:23:27'),
(18, '15227654071com_book.PNG', 19, '2018-04-03 14:23:27', '2018-04-03 14:23:27'),
(19, '15227654072cover.jpg', 19, '2018-04-03 14:23:27', '2018-04-03 14:23:27'),
(20, '15227654073pen.jpeg', 19, '2018-04-03 14:23:27', '2018-04-03 14:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` int(10) UNSIGNED NOT NULL,
  `album_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `album_id`, `created_at`, `updated_at`, `ip`, `star`) VALUES
(1, 16, '2018-03-29 12:54:07', '2018-03-29 12:54:07', '10.63.4.49', 5),
(2, 16, '2018-03-29 12:54:07', '2018-03-29 12:54:07', '10.63.4.45', 4),
(3, 16, '2018-03-29 12:54:07', '2018-03-29 12:54:07', '10.63.4.40', 3),
(4, 16, '2018-03-29 12:54:07', '2018-03-29 12:54:07', '10.63.4.480', 5),
(5, 16, '2018-03-29 16:48:34', '2018-03-29 16:48:34', '127.0.0.1', 5),
(6, 17, '2018-04-03 14:03:26', '2018-04-03 14:03:26', '127.0.0.1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `remember_token`, `name`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$Suk5ftkQKScUg/6loT5X..BdXODD.5gYOEXA22JHJdOzWbL2xuc..', 'a@b.com', '45x49k8SAspEELDw3KBK8yg9Vm8bQrPqo7WoVv6uVN0IRo7gP8Emp6FcMFQ1', 'ab', '2018-03-28 17:06:47', '2018-04-02 15:03:30'),
(2, '$2y$10$4htdyOQ6bfMLRE.e8O9xhur0H9toLJepQYu1fXDCszyC0xtDXLfpe', 'fuad@gmail.com', NULL, 'fuad', '2018-03-28 11:12:32', '2018-03-28 11:12:32'),
(3, '$2y$10$Yw4W8ro8zsu/u03nRNiCxuBSMZdeqSInQ85pi81tXYPANpqfdE35e', 'Mutasim@gmail.com', 'x4IspnPtUQbMnrgmgaN1dQwniGL5Bo5BGCUZMQalm9SE1kZBVKz6gEf4o9Z4', 'Mutasim', '2018-04-02 04:36:22', '2018-04-03 14:05:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `cons_album_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `cons_album_comment` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `cons_album_photo` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stars`
--
ALTER TABLE `stars`
  ADD CONSTRAINT `cons_album_star` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
