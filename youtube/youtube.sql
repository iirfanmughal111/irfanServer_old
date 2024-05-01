-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2022 at 10:04 PM
-- Server version: 8.0.31-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `youtube_oauth`
--

CREATE TABLE `youtube_oauth` (
  `id` int NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `youtube_oauth`
--

INSERT INTO `youtube_oauth` (`id`, `provider`, `provider_value`) VALUES
(1, 'youtube', '{\"access_token\":\"ya29.a0AeTM1icyJr9v3bHzEsusmrKuudsUO4JLGIS21-vCV07xI9M9CnBtbsD7KgUaLavMwJhJy-8UiPPLum1uvx0FDl5bvKL3IKkWswXs7g6T11FL3zmcHff4XkfDPzcHuDzfkHHGkt4bgnATXKZC1xrJ758ZxlYtaCgYKAQkSARESFQHWtWOmqBUlEnyCm4FlIOTJcLSJNQ0163\",\"token_type\":\"Bearer\",\"refresh_token\":\"1//035yuPG89l_kyCgYIARAAGAMSNwF-L9Ir1SML5ce5ds-gGS8Sx9Yk1ajGudesiwREpjmkur8lCruSZwFbm-831J40XVweoRfRoVs\",\"expires_in\":3599,\"expires_at\":1667755027}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `youtube_oauth`
--
ALTER TABLE `youtube_oauth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `youtube_oauth`
--
ALTER TABLE `youtube_oauth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
