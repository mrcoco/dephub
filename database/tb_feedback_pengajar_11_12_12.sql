-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2012 at 03:34 PM
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

--
-- Table structure for table `tb_feedback_pengajar`
--

DROP TABLE IF EXISTS `tb_feedback_pegajar` (
DROP TABLE IF EXISTS `tb_feedback_pegajar` (
CREATE TABLE IF NOT EXISTS `tb_feedback_pengajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tb_feedback_pengajar`
--

INSERT INTO `tb_feedback_pengajar` (`id`, `id_peserta`, `id_pengajar`, `id_materi`, `id_program`, `id_pertanyaan`, `skor`) VALUES
(1, 290, 27, 3, 19, 29, 86),
(2, 290, 27, 3, 19, 30, 90),
(3, 290, 27, 3, 19, 31, 84),
(4, 290, 27, 3, 19, 32, 74),
(5, 290, 27, 3, 19, 33, 94),
(6, 290, 27, 3, 19, 34, 78),
(7, 290, 27, 3, 19, 35, 90),
(8, 290, 27, 3, 19, 36, 80),
(9, 290, 27, 3, 19, 37, 88),
(10, 290, 27, 3, 19, 38, 75),
(11, 290, 27, 3, 19, 39, 90),
(12, 290, 27, 3, 19, 40, 95),
(13, 290, 25, 3, 19, 29, 86),
(14, 290, 25, 3, 19, 30, 80),
(15, 290, 25, 3, 19, 31, 74),
(16, 290, 25, 3, 19, 32, 89),
(17, 290, 25, 3, 19, 33, 86),
(18, 290, 25, 3, 19, 34, 86),
(19, 290, 25, 3, 19, 35, 76),
(20, 290, 25, 3, 19, 36, 90),
(21, 290, 25, 3, 19, 37, 76),
(22, 290, 25, 3, 19, 38, 88),
(23, 290, 25, 3, 19, 39, 88),
(24, 290, 25, 3, 19, 40, 86);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
