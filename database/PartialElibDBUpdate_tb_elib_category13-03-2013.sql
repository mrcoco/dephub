-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2013 at 01:20 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dephub_simdik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_category`
--
DROP TABLE `tb_elib_category`;
CREATE TABLE IF NOT EXISTS `tb_elib_category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(20) NOT NULL,
  `categoryshortname` varchar(20) NOT NULL,
  PRIMARY KEY (`idcategory`),
  UNIQUE KEY `categoryname` (`categoryname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tb_elib_category`
--

INSERT INTO `tb_elib_category` (`idcategory`, `categoryname`, `categoryshortname`) VALUES
(1, 'kategori 1 Jembatan', ''),
(3, 'kategori 3', ''),
(4, 'kategori 4', ''),
(5, 'kategori 5', ''),
(6, 'kategori 6', ''),
(7, 'kategori 7', ''),
(8, 'Tentang Jalan', ''),
(10, 'Tentang Batere', 'AAA'),
(11, 'Tentang Binatang', 'BBB'),
(12, 'Makanan', 'AAB'),
(13, 'Tentang catering', 'AAC'),
(14, 'Tentang Angkatan Dar', 'AAD'),
(15, 'Tentang Energi', 'AAE'),
(16, 'Tentang Farmasi', 'AAF'),
(17, 'Tentang Gajah', 'AAG');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
