-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2012 at 02:20 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

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

-- baru
-- Table structure for table `tb_feedback_diklat`
--

DROP TABLE IF EXISTS `tb_feedback_diklat`;
CREATE TABLE IF NOT EXISTS `tb_feedback_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tb_feedback_diklat`
--

INSERT INTO `tb_feedback_diklat` (`id`, `id_program`, `id_kategori`, `id_pertanyaan`, `skor`, `id_peserta`) VALUES
(1, 19, 1, 1, 75, 6),
(2, 19, 1, 4, 85, 6),
(3, 19, 1, 5, 70, 6),
(4, 19, 1, 6, 70, 6),
(5, 19, 1, 7, 65, 6),
(6, 19, 2, 8, 85, 6),
(7, 19, 2, 9, 90, 6),
(8, 19, 2, 10, 90, 6),
(9, 19, 2, 11, 85, 6),
(10, 19, 2, 12, 85, 6),
(11, 19, 2, 13, 95, 6),
(12, 19, 2, 14, 90, 6),
(13, 19, 2, 15, 85, 6),
(14, 19, 2, 16, 85, 6),
(15, 19, 2, 17, 100, 6),
(16, 19, 2, 18, 80, 6),
(17, 19, 2, 19, 90, 6),
(18, 19, 3, 20, 75, 6),
(19, 19, 3, 21, 80, 6),
(20, 19, 3, 22, 90, 6),
(21, 19, 3, 23, 95, 6),
(22, 19, 3, 24, 90, 6),
(23, 19, 3, 25, 90, 6),
(24, 19, 3, 26, 95, 6),
(25, 19, 3, 27, 85, 6),
(26, 19, 5, 28, 70, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
