-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 07. Desember 2012 jam 09:56
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
-- Struktur dari tabel `tb_feedback_pengajar`
--

CREATE TABLE IF NOT EXISTS `tb_feedback_pegajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `skor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_feedback_saran`
--

CREATE TABLE IF NOT EXISTS `tb_feedback_saran_pengajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengajar` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `saran` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
