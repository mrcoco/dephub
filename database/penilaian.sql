-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 18. Maret 2013 jam 05:30
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
-- Struktur dari tabel `tb_komponen_penilaian`
--

DROP TABLE IF EXISTS `tb_komponen_penilaian`;
CREATE TABLE IF NOT EXISTS `tb_komponen_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `nama_komponen` varchar(255) NOT NULL,
  `bobot` int(10) NOT NULL,
  `id_materi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_peserta`
--

DROP TABLE IF EXISTS `tb_nilai_peserta`;
CREATE TABLE IF NOT EXISTS `tb_nilai_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_komponen` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nilai` decimal(10,0) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=254 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
