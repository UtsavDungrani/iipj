-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2025 at 05:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iipj_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `recent_updates`
--

CREATE TABLE `recent_updates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `update_type` enum('text','pdf') NOT NULL DEFAULT 'text',
  `content` text DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recent_updates`
--

INSERT INTO `recent_updates` (`id`, `title`, `update_type`, `content`, `file_name`, `file_size`, `is_published`, `published_at`, `created_at`, `updated_at`) VALUES
(8, '9776', 'pdf', NULL, 'update_1763481178_691c965a633617.14261202.pdf', 318038, 1, '2025-11-18 21:22:58', '2025-11-18 15:52:58', '2025-11-18 15:52:58'),
(9, 'jknkjn', 'text', 'nlkn', NULL, NULL, 1, '2025-11-18 21:38:44', '2025-11-18 16:08:44', '2025-11-18 16:08:44'),
(10, 'lknkn', 'text', 'jnlkjn', NULL, NULL, 1, '2025-11-18 21:38:48', '2025-11-18 16:08:48', '2025-11-18 16:08:48'),
(11, 'njkjn', 'text', 'knlkn', NULL, NULL, 1, '2025-11-18 21:38:51', '2025-11-18 16:08:51', '2025-11-18 16:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` enum('admin','editor') DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@iipj.com', '$2y$10$TOyhVQNJeet6dA1lkFdoL.jjMq7ns0poA5Fye95LuR.pvN.vrfnvS', 'Administrator', 'admin', '2025-11-08 00:45:34', '2025-11-08 00:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `volumes`
--

CREATE TABLE `volumes` (
  `id` int(11) NOT NULL,
  `volume_number` int(11) NOT NULL,
  `issue_number` varchar(25) NOT NULL,
  `publication_date` date NOT NULL,
  `page_range` varchar(50) DEFAULT NULL,
  `issn` varchar(50) DEFAULT '3107-7269',
  `cover_image` varchar(255) DEFAULT NULL,
  `volume_pdf` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('draft','published') DEFAULT 'published',
  `total_articles` int(11) DEFAULT 0,
  `total_downloads` int(11) DEFAULT 0,
  `is_special_edition` tinyint(1) NOT NULL DEFAULT 0,
  `special_edition_year` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volumes`
--

INSERT INTO `volumes` (`id`, `volume_number`, `issue_number`, `publication_date`, `page_range`, `issn`, `cover_image`, `volume_pdf`, `description`, `status`, `total_articles`, `total_downloads`, `is_special_edition`, `special_edition_year`, `created_at`, `updated_at`) VALUES
(12, 1, 'august,2025', '2025-09-11', '1-191', '3107-7269', 'cover_1763476016_691c82303e844.png', 'volume_1763476016_691c82303ed76.pdf', '', 'published', 16, 0, 0, NULL, '2025-11-18 14:26:56', '2025-11-18 14:30:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recent_updates`
--
ALTER TABLE `recent_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_recent_updates_published` (`is_published`,`published_at`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_username` (`username`),
  ADD KEY `idx_email` (`email`);

--
-- Indexes for table `volumes`
--
ALTER TABLE `volumes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_volume_issue` (`volume_number`,`issue_number`),
  ADD KEY `idx_publication_date` (`publication_date`),
  ADD KEY `idx_status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recent_updates`
--
ALTER TABLE `recent_updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `volumes`
--
ALTER TABLE `volumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
