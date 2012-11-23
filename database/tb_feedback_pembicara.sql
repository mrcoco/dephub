-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 23. Nopember 2012 jam 05:27
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

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
-- Struktur dari tabel `tb_feedback_pembicara`
--

CREATE TABLE IF NOT EXISTS `tb_feedback_pembicara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_diklat` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_pembicara` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `c` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  `e` int(11) NOT NULL,
  `f` int(11) NOT NULL,
  `g` int(11) NOT NULL,
  `h` int(11) NOT NULL,
  `i` int(11) NOT NULL,
  `j` int(11) NOT NULL,
  `k` int(11) NOT NULL,
  `l` int(11) NOT NULL,
  `saran` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_feedback_pembicara`
--

INSERT INTO `tb_feedback_pembicara` (`id`, `id_diklat`, `id_program`, `id_pembicara`, `id_materi`, `tanggal`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `saran`) VALUES
(1, 11, 19, 25, 3, '0000-00-00', 100, 90, 80, 90, 70, 60, 80, 90, 90, 90, 100, 90, 'saran'),
(2, 11, 19, 12, 3, '0000-00-00', 100, 90, 80, 90, 100, 90, 80, 90, 90, 100, 100, 90, 'saran'),
(3, 11, 19, 12, 3, '2012-11-23', 100, 90, 80, 90, 100, 90, 80, 90, 90, 100, 100, 90, 'saran');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
