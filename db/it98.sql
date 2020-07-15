-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 29, 2020 at 04:04 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it98`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

DROP TABLE IF EXISTS `tbl_cat`;
CREATE TABLE IF NOT EXISTS `tbl_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`id`, `catname`) VALUES
(11, 'لوازم ورزشی'),
(12, 'پوشاک'),
(6, 'لوازم خانگی'),
(13, 'لوازم بهداشتی'),
(8, 'مواد غذایی'),
(9, 'لوازم صوتی و تصویری'),
(10, 'موبایل');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_factor`
--

DROP TABLE IF EXISTS `tbl_factor`;
CREATE TABLE IF NOT EXISTS `tbl_factor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coder` int(11) NOT NULL,
  `sid` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `dateins` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_factor`
--

INSERT INTO `tbl_factor` (`id`, `coder`, `sid`, `dateins`, `status`) VALUES
(25, 17010, 'geckgvuu31vku5qdrejs8pth93', '00/00/00', 0),
(22, 5710, 'fgj07hkmdc3jjlbaokj1q5isi0', '00/00/00', 0),
(23, 22632, 'g78ju3r6d56acbmqalkms64dm2', '00/00/00', 0),
(24, 19759, '9dtingam1vm3753j7d9gq2bmu7', '00/00/00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kala`
--

DROP TABLE IF EXISTS `tbl_kala`;
CREATE TABLE IF NOT EXISTS `tbl_kala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idc` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `aks` varchar(10000) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_kala`
--

INSERT INTO `tbl_kala` (`id`, `idc`, `name`, `price`, `qty`, `aks`) VALUES
(31, 6, 'تلوزیون سامسونگ 56 اینچ', 60000000, 12, '7d13ed9c99307bb06443f4f85fa516d6v.jpg'),
(30, 6, 'جاروبرقی پارس', 50000000, 15, '991d2738929fec41676851cb6ac6ff2fr.jpg'),
(27, 11, 'گرمکن ورزشی', 1800000, 100, '12fff6d6dda294ac36dfaa76e1eaf3a0n.jpg'),
(28, 11, 'میله بارفیکس', 1800000, 20, '1c9b291e20e691802e655c3312dc7acex.jpg'),
(29, 12, 'لباس دخترانه طرح پرنسس', 1200000, 30, 'f968ab36451059abee43a500448e6a64s.jpg'),
(32, 8, 'رشته سوپی', 50000, 100, 'f7b52aa014d25c8797bd1cfe5cf14f18i.jpg'),
(33, 8, 'ماکارونی رشته ای', 50000, 400, '77b62470b14e266b6f20e48ae8df06a3i.jpg'),
(34, 10, 'موبایل سامسونگ', 30000000, 5, 'c7c1a03e45e482209fb0d51152fee793l.jpg'),
(35, 9, 'مانیتور 17 اینچ', 12000000, 23, '6471dcc5a2b6f8b50fa617ed636aecc9r.jpg'),
(36, 9, 'کامپیوتر کامل', 70000000, 10, 'f07e32a9a39449f0e32f68f9ff9192f31.jpg'),
(37, 13, 'کرم ضد آفتاب ببک', 123000, 100, '9464198e281dda48d73cfa6f87a2d054m.jpg'),
(38, 13, 'رژ لب بیرکس', 500000, 560, '90c7721bf332dbf9c9852b6cb28b8b97j.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idk` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `dateins` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `sid` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `idk`, `qty`, `dateins`, `sid`, `status`) VALUES
(78, 30, 0, '00/00/00', 'geckgvuu31vku5qdrejs8pth93', 1),
(77, 27, 0, '00/00/00', 'geckgvuu31vku5qdrejs8pth93', 1),
(76, 30, 0, '00/00/00', 'geckgvuu31vku5qdrejs8pth93', 1),
(75, 31, 0, '00/00/00', 'geckgvuu31vku5qdrejs8pth93', 1),
(73, 27, 0, '00/00/00', '9dtingam1vm3753j7d9gq2bmu7', 1),
(74, 32, 0, '00/00/00', '9dtingam1vm3753j7d9gq2bmu7', 1),
(72, 30, 0, '00/00/00', 'g78ju3r6d56acbmqalkms64dm2', 1),
(71, 29, 0, '00/00/00', 'g78ju3r6d56acbmqalkms64dm2', 1),
(69, 30, 0, '00/00/00', 'fgj07hkmdc3jjlbaokj1q5isi0', 1),
(70, 30, 0, '00/00/00', 'g78ju3r6d56acbmqalkms64dm2', 1),
(68, 31, 0, '00/00/00', 'fgj07hkmdc3jjlbaokj1q5isi0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `city` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `family`, `user_name`, `password`, `gender`, `city`) VALUES
(13, 'حسام ', 'محمودی', 'hmahmodi', '123456', 0, '4'),
(12, 'سعید', 'علی مردانی', 'saed', 'mk2288', 0, '3'),
(10, 'علی', 'سلطانی', 'ali', '56231', 1, '2'),
(14, 'جواد', 'کلاهی', 'java', '12345678', 0, '5');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
