-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 08:33 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_travelind`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_comment`
--

CREATE TABLE `t_comment` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_comment`
--

INSERT INTO `t_comment` (`id_comment`, `id_user`, `comment`, `date`, `parent`) VALUES
(56, 4, 'Nice article', '2021-09-01', NULL),
(57, 4, 'Thanks', '2021-09-01', 56),
(58, 5, 'Great', '2021-09-01', NULL),
(59, 5, 'ok', '2021-09-01', 58);

-- --------------------------------------------------------

--
-- Table structure for table `t_like`
--

CREATE TABLE `t_like` (
  `id_like` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_like`
--

INSERT INTO `t_like` (`id_like`, `id_user`, `id_comment`, `type`) VALUES
(15, 4, 46, 0),
(16, 4, 48, 1),
(17, 5, 48, 1),
(18, 5, 50, 1),
(19, 5, 52, 1),
(20, 5, 54, 1),
(21, 4, 56, 1),
(22, 5, 56, 1),
(23, 5, 58, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_post`
--

CREATE TABLE `t_post` (
  `id_post` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_post`
--

INSERT INTO `t_post` (`id_post`, `image`, `destination`, `description`, `about`) VALUES
(4, 'kecak-dance.jpg', 'Kecak Dance', 'Theater &amp; Dance Combination', 'Kecak Dance is regularly performed in many places all over Bali Island. However, the best place to watch this spectacular show is at the Pura Uluwatu, where the dance is performed daily with as background the dramatic sunset.'),
(5, 'mount-bromo.jpg', 'Bromo  Mountain', 'Malang - Sunrise Tour', 'Mount Bromo is a part of the Bromo Tengger Semeru National Park that covers a massive area of 800 square km. the magnificent Mt Bromo  will not disappoint with its spectacular views and dramatic landscapes.  Visitors from around the world come to see the sunrise over Mt Bromo.'),
(9, 'borobudur-temple.jpg', 'Borobudur Temple', 'Yogyakarta', 'Located on the island of Java, the magnificent Borobudur temple is the world\'s biggest Buddhist monument. The temple sits majestically on a hilltop overlooking lush green fields and distant hills. Built between AD 780 and 840 during the reign of Syailendra dynasty, the temple\'s design in Gupta architecture reflects India\'s influence on the region.');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `fullname`, `username`, `password`) VALUES
(3, 'Administrator', 'admin', '$2y$10$uEVesvaayXckyDGgoI2LFeY7kJgsdbXsl9OTWLprw6Q.aPZuTjg5.'),
(4, 'Biko Arya Maulana', 'bikoarya', '$2y$10$Af1Crw6VlWkobSoWoyDppe9nT/s6AAv0pIcfUWZN9kqBVW5A6i3pi'),
(5, 'Rafa Athallah', 'rafa', '$2y$10$GiATotW7Ndz7TuZZ/kiyW./EhHBBM9QE3dP9iuO1we6GomMrA1s1.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_comment`
--
ALTER TABLE `t_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `t_like`
--
ALTER TABLE `t_like`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `t_post`
--
ALTER TABLE `t_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_comment`
--
ALTER TABLE `t_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `t_like`
--
ALTER TABLE `t_like`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `t_post`
--
ALTER TABLE `t_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
