-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 09:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `description`, `image`) VALUES
(7, 'พญาศรีสัตตนาคราช  ', 'เป็นที่เที่ยวนครพนมซึ่งเป็นแลนด์มาร์กของจังหวัดเลยก็ว่าได้ ประดิษฐานบนริมฝั่งแม่น้ำโขง บนลานศรีสัตตนาคราช องค์พญานาคทองเหลืองที่ใหญ่ที่สุดในภาคอีสาน จัดว่าเป็นที่เที่ยวนครพนมในเมืองที่มีความยิ่งใหญ่มากทีเดียว', 'place1.jpg'),
(8, 'วัดพระธาตุเรณู วัดสวย นครพนม เที่ยวนครพนม ไหว้พระทำบุญ', ' พระธาตุเรณู ประดิษฐานที่ วัดพระธาตุเรณู เป็นอีกหนึ่งปูชนียสถานที่สำคัญ โดยประดิษฐานอยู่ไม่ไกลจากพระธาตุพนมมากนัก โดยตั้งอยู่ในตำบลเรณู อำเภอเรณูนคร จังหวัดนครพนม ค่ะ และนับว่าเป็นพระธาตุคู่เมืองชาวเรณูนคร ที่จำลองมาจาก พระธาตุพนมองค์เดิม (องค์ก่อนกรมศิลปากรบูรณะเมื่อปี พ.ศ. 2483)  แต่มีขนาดเล็กกว่า', 'place2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(12, 'beam9412', 'chanwit941222@gmail.com', '$2y$10$GhQuir2M8.eboGZJN8.Jie2jOs.qVdc7eS/zu1b0J49AQQCl4EUVm'),
(13, 'beam123', 'chanwit123@gmail.com', '$2y$10$5cHUt3XpomaOiIM4v3N./.A0hIaDOqQAjc93.LuyCbiOzSLjhX1JO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
