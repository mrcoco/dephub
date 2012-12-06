-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 06. Desember 2012 jam 03:56
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
-- Struktur dari tabel `tb_registrasi`
--

CREATE TABLE IF NOT EXISTS `tb_registrasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_diklat` int(11) NOT NULL,
  `id_program` int(11) DEFAULT NULL,
  `id_peserta` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `tahun_daftar` year(4) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `tb_registrasi`
--

INSERT INTO `tb_registrasi` (`id`, `id_diklat`, `id_program`, `id_peserta`, `status`, `tahun_daftar`, `komentar`) VALUES
(21, 11, 0, '3970', 'daftar', 2012, ''),
(20, 11, 19, '290', 'accept', 2012, ''),
(22, 11, 19, '6', 'accept', 2012, ''),
(23, 11, 19, '9', 'accept', 2012, ''),
(25, 11, 19, '821', 'waiting', 2012, ''),
(26, 11, 20, '163', 'accept', 2012, ''),
(27, 11, 20, '84', 'accept', 2012, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
