-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2016 at 09:34 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_islam`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_solat`
--

CREATE TABLE `jadwal_solat` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imsak` time NOT NULL,
  `subuh` time NOT NULL,
  `dzuhur` time NOT NULL,
  `ashar` time NOT NULL,
  `magrib` time NOT NULL,
  `isya` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_solat`
--

INSERT INTO `jadwal_solat` (`id`, `date`, `imsak`, `subuh`, `dzuhur`, `ashar`, `magrib`, `isya`) VALUES
(1, '2016-05-31 17:00:00', '04:20:00', '04:30:00', '12:00:00', '15:30:00', '18:00:00', '19:00:00'),
(2, '2016-06-01 17:00:00', '04:20:08', '04:30:08', '12:04:13', '15:30:14', '18:02:07', '19:05:11'),
(3, '2016-06-02 17:00:00', '04:19:07', '04:29:07', '12:10:17', '15:25:20', '17:54:18', '19:13:14'),
(4, '2016-06-03 17:00:00', '04:18:09', '04:29:12', '12:16:27', '15:35:25', '17:53:20', '19:18:26'),
(5, '2016-06-04 17:00:00', '04:25:34', '04:35:28', '12:30:00', '15:22:20', '18:30:12', '19:30:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_solat`
--
ALTER TABLE `jadwal_solat`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
