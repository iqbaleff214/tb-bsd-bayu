-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2020 at 04:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_bayu`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(2) NOT NULL,
  `kategori` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 60),
(2, 120);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lb`
-- (See below for the actual view)
--
CREATE TABLE `lb` (
`id` int(11)
,`username` varchar(50)
,`id_user` int(255)
,`benar` int(3)
,`terjawab` int(3)
,`skor` decimal(17,4)
,`kategori` int(5)
,`waktu` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int(11) NOT NULL,
  `id_user` int(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `terjawab` int(3) NOT NULL,
  `benar` int(3) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`id`, `id_user`, `username`, `terjawab`, `benar`, `id_kategori`, `waktu`) VALUES
(1, NULL, 'iqbal', 9, 9, 2, '2019-12-21 05:35:44'),
(2, NULL, '$user', 5, 4, NULL, '2019-12-20 15:07:36'),
(3, 0, 'as', 3, 3, NULL, '2019-12-20 15:17:27'),
(4, 0, 'salma', 3, 3, NULL, '2019-12-20 15:19:01'),
(5, 1, 'admin', 2, 2, NULL, '2019-12-20 15:19:40'),
(6, 0, 'bayu', 0, 0, NULL, '2019-12-20 23:17:57'),
(7, 1, 'admin', 0, 0, 2, '2019-12-21 05:45:01'),
(8, 1, 'admin', 0, 0, NULL, '2019-12-21 00:43:11'),
(9, 1, 'admin', 3, 3, NULL, '2019-12-21 00:49:54'),
(10, 0, 'anonymus', 3, 3, NULL, '2019-12-21 01:03:45'),
(11, 0, 'anonymus', 2, 2, NULL, '2019-12-21 01:04:41'),
(12, 1, 'admin', 4, 4, NULL, '2019-12-21 01:05:24'),
(13, 0, 'iqbal', 40, 38, 1, '2019-12-21 04:08:16'),
(14, 0, 'iqbal', 34, 33, 1, '2019-12-21 04:20:41'),
(15, 1, 'admin', 37, 36, 1, '2019-12-21 04:22:19'),
(16, 0, 'iqbal', 81, 79, 2, '2019-12-21 06:05:15'),
(17, 0, 'sayuti', 7, 6, 1, '2019-12-21 06:43:39'),
(18, 0, 'akbar', 71, 66, 2, '2019-12-21 06:45:49'),
(19, 1, 'admin', 63, 61, 2, '2019-12-21 14:57:05'),
(20, 0, 'Andika Sujanadi', 32, 32, 1, '2019-12-21 14:59:35'),
(21, 0, 'Akrim', 40, 37, 1, '2019-12-21 17:36:45'),
(22, 0, 'Andika Sujanadi', 32, 30, 1, '2019-12-21 17:38:55'),
(23, 0, 'iqbal', 38, 38, 1, '2019-12-21 18:30:33'),
(24, 0, 'anjay', 30, 27, 1, '2019-12-21 22:15:01'),
(25, 1, 'admin', 99, 1, 2, '2019-12-22 03:56:15'),
(26, 1, 'admin', 100, 5, 1, '2019-12-22 03:58:53'),
(27, 2, 'iqbal', 43, 42, 1, '2019-12-22 09:28:00'),
(28, 0, 'yumna', 48, 45, 1, '2019-12-23 02:22:16'),
(29, NULL, 'diary', 3, 2, 1, '2019-12-25 06:07:04'),
(30, 0, 'diary', 2, 2, 1, '2019-12-25 06:09:47'),
(31, 4, 'test', 48, 47, 1, '2019-12-25 06:21:25'),
(32, 4, 'test', 286, 29, 1, '2019-12-25 06:31:02'),
(33, 0, 'iqbal', 46, 45, 1, '2019-12-25 05:01:17'),
(34, 0, 'hafizi', 37, 31, 1, '2019-12-30 03:07:28'),
(35, 6, 'b4yu', 36, 33, 1, '2020-01-04 06:25:27'),
(36, 6, 'b4yu', 33, 32, 1, '2020-01-04 06:27:54'),
(37, 0, '', 209, 20, 1, '2020-01-04 06:40:05'),
(38, 0, 'salam', 31, 30, 1, '2020-01-08 01:37:58'),
(39, 0, 'Haji', 15, 13, 1, '2020-01-13 00:34:49'),
(40, 7, 'faderiganteng', 56, 50, 2, '2020-01-14 07:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'iqbal', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'bayu', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'test', 'd41d8cd98f00b204e9800998ecf8427e'),
(5, 'coba', '20c1a26a55039b30866c9d0aa51953ca'),
(6, 'b4yu', '202cb962ac59075b964b07152d234b70'),
(7, 'faderiganteng', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Structure for view `lb`
--
DROP TABLE IF EXISTS `lb`;
-- Error reading structure for table tb_bayu.lb: #1142 - SHOW VIEW command denied to user 'admin'@'localhost' for table 'lb'

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `leaderboard_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
