-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 23. Nopember 2012 jam 00:55
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
-- Struktur dari tabel `tb_feedback_diklat`
--

CREATE TABLE IF NOT EXISTS `tb_feedback_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `1a` int(11) NOT NULL,
  `1b` int(11) NOT NULL,
  `1c` int(11) NOT NULL,
  `1d` int(11) NOT NULL,
  `1e` int(11) NOT NULL,
  `2a` int(11) NOT NULL,
  `2b` int(11) NOT NULL,
  `2c` int(11) NOT NULL,
  `2d` int(11) NOT NULL,
  `2e` int(11) NOT NULL,
  `2f` int(11) NOT NULL,
  `2g` int(11) NOT NULL,
  `2h` int(11) NOT NULL,
  `2i` int(11) NOT NULL,
  `2j` int(11) NOT NULL,
  `2k` int(11) NOT NULL,
  `2l` int(11) NOT NULL,
  `3a` int(11) NOT NULL,
  `3b` int(11) NOT NULL,
  `3c` int(11) NOT NULL,
  `3d` int(11) NOT NULL,
  `3e` int(11) NOT NULL,
  `3f` int(11) NOT NULL,
  `3g` int(11) NOT NULL,
  `3h` int(11) NOT NULL,
  `catering` int(11) NOT NULL,
  `manfaat` text NOT NULL,
  `saran_catering` text NOT NULL,
  `saran_kurikulum` text NOT NULL,
  `saran_sarpras` text NOT NULL,
  `saran_penyelenggaraan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `tb_feedback_diklat`
--

INSERT INTO `tb_feedback_diklat` (`id`, `id_program`, `1a`, `1b`, `1c`, `1d`, `1e`, `2a`, `2b`, `2c`, `2d`, `2e`, `2f`, `2g`, `2h`, `2i`, `2j`, `2k`, `2l`, `3a`, `3b`, `3c`, `3d`, `3e`, `3f`, `3g`, `3h`, `catering`, `manfaat`, `saran_catering`, `saran_kurikulum`, `saran_sarpras`, `saran_penyelenggaraan`) VALUES
(1, 19, 90, 80, 80, 90, 70, 90, 80, 70, 80, 80, 70, 60, 70, 80, 90, 100, 100, 90, 100, 80, 80, 80, 80, 90, 90, 70, 'saran', 'saran', 'saran', 'saran', 'saran'),
(2, 19, 90, 80, 80, 90, 70, 90, 80, 70, 80, 80, 70, 60, 70, 80, 90, 100, 100, 90, 100, 80, 80, 80, 80, 90, 90, 70, 'saran', 'saran', 'saran', 'saran', 'saran'),
(3, 19, 90, 80, 80, 90, 70, 90, 80, 70, 80, 80, 70, 60, 70, 80, 90, 100, 100, 90, 100, 80, 80, 80, 80, 90, 90, 70, 'saran', 'saran', 'saran', 'saran', 'saran'),
(4, 19, 90, 80, 80, 90, 70, 90, 80, 70, 80, 80, 70, 60, 70, 80, 90, 100, 100, 90, 100, 80, 80, 80, 80, 90, 90, 70, 'saran', 'saran', 'saran', 'saran', 'saran'),
(5, 19, 90, 80, 80, 90, 70, 90, 80, 70, 80, 80, 70, 60, 70, 80, 90, 100, 100, 90, 100, 80, 80, 80, 80, 90, 90, 70, 'saran', 'saran', 'saran', 'saran', 'saran'),
(6, 19, 90, 80, 80, 90, 70, 90, 80, 70, 80, 80, 70, 60, 70, 80, 90, 100, 100, 90, 100, 80, 80, 80, 80, 90, 90, 70, 'saran', 'saran', 'saran', 'saran', 'saran'),
(7, 19, 90, 80, 80, 90, 70, 90, 80, 70, 80, 80, 70, 60, 70, 80, 90, 100, 100, 90, 100, 80, 80, 80, 80, 90, 90, 70, 'saran', 'saran', 'saran', 'saran', 'saran'),
(8, 19, 90, 80, 90, 80, 80, 90, 80, 70, 80, 90, 100, 100, 100, 90, 90, 90, 90, 90, 90, 100, 90, 80, 90, 90, 90, 90, 'manfaat', 'catering', 'saran kurikulum', 'saran sarpras', 'saran diklat');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
