-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2023 at 10:48 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33315336_ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nik` int(11) DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `name`, `nik`, `birth_place`, `birth_date`, `parent_name`, `address`, `rt`, `rw`, `kecamatan`, `kelurahan`, `city`, `phone`, `created`, `updated`) VALUES
(1, 1, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-28 21:58:35', NULL),
(2, 5, 'Tommy Anggoro Yunar', 13123, 'asdad', '2023-01-04', 'xczxczc', 'Panjibuwono Residences, Blok AB 4 No. 2, Cluster Brawijaya. Kedung Pengawas, Babelan, Kab. Bekasi', '12', '12', 'zxc', 'zxczxc', 'Bekasi', '08995389200', '2023-01-29 14:30:12', NULL),
(3, 6, 'Yunandi', 12312, 'dasd', '2023-01-24', 'adasd', 'asaca', '12', '12', 'asd', 'sda', 'zxc', '2342342342', '2023-01-29 14:33:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created`, `updated`) VALUES
(1, 'Administrator', '2023-01-29 13:24:13', NULL),
(2, 'Candidate', '2023-01-29 13:24:13', NULL),
(3, 'Pass', '2023-01-29 13:40:23', NULL),
(4, 'Not Pass', '2023-01-29 16:35:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 6),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `updated`) VALUES
(1, 'admin@webmaster.com', '$2y$10$2yCe3yrDljGM5qC37VoGmOPIfUfLAMu51pF/DqZU4njM.G7J2DwWe', '2023-01-28 21:58:35', NULL),
(5, 'tommianggoro@outlook.com', '$2y$10$4qCaZz0baLGyRingL9d8ruOxZDTQMV48j9kxp2JeKjLfRI92g/8gO', '2023-01-29 14:30:12', NULL),
(6, 'yunandi@webmaster.ac.id', '$2y$10$wQCibpSbJrJqBlnFra2yC.OVnS3hzOnmNOcBTYNHjOynEPdxCcngS', '2023-01-29 14:33:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD UNIQUE KEY `role_user.user_id` (`role_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users.email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
