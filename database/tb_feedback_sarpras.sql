-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 08. Agustus 2012 jam 07:27
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisfo_pusbang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_feedback_sarpras`
--

CREATE TABLE IF NOT EXISTS `tb_feedback_sarpras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `1a` text NOT NULL,
  `1b` text NOT NULL,
  `1c` text NOT NULL,
  `1d` text NOT NULL,
  `1e` text NOT NULL,
  `2a` text NOT NULL,
  `2b` text NOT NULL,
  `2c` text NOT NULL,
  `2d` text NOT NULL,
  `2e` text NOT NULL,
  `2f` text NOT NULL,
  `2g` text NOT NULL,
  `2h` text NOT NULL,
  `2i` text NOT NULL,
  `2j` text NOT NULL,
  `2k` text NOT NULL,
  `2l` text NOT NULL,
  `3a` text NOT NULL,
  `3b` text NOT NULL,
  `3c` text NOT NULL,
  `3d` text NOT NULL,
  `3e` text NOT NULL,
  `3f` text NOT NULL,
  `manfaat` text NOT NULL,
  `kelebihan_catering` text NOT NULL,
  `kekurangan_catering` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_feedback_sarpras`
--

INSERT INTO `tb_feedback_sarpras` (`id`, `id_program`, `1a`, `1b`, `1c`, `1d`, `1e`, `2a`, `2b`, `2c`, `2d`, `2e`, `2f`, `2g`, `2h`, `2i`, `2j`, `2k`, `2l`, `3a`, `3b`, `3c`, `3d`, `3e`, `3f`, `manfaat`, `kelebihan_catering`, `kekurangan_catering`, `keterangan`) VALUES
(1, 1, 'Ga tau###Tes aja lah###Jelek', 'Mana ada###sdvbdsvb ds###', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '', '', '', ''),
(2, 1, 'Ga tau###Tes aja lah###Jelek', 'Mana ada###fsdbdf eewfew ewfewf efew few###', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
