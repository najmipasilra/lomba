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
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `isi` longtext NOT NULL,
  `judul` varchar(255) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `isi`, `judul`, `waktu`) VALUES
(1, 'lorearlmaelrmalemrlamrkaelrklarnjkdbkjasbdhasd', 'Hikmah Puasa', '2016-06-15 08:33:18'),
(2, 'loreamsdsadhcjkahsdkahiuqwydiqtdiutqiuqiud', 'Hal-hal yang di haramkan selama bulan puasa', '2016-06-21 06:17:34'),
(3, 'blablablablablablablablab', 'Manfaat Puasa Bagi Kesehatan', '2016-06-09 04:34:27'),
(4, 'laklaklaklaklaklaklaklaklaklaklaklakalk', 'Turunnya Nuzulul Qur''an', '2016-06-17 04:14:14'),
(5, 'uywquqyuywquyuwyuqyuqwyuqyuqwy', 'Keutamaan Di Bulan Ramadhan', '2016-06-23 01:19:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
