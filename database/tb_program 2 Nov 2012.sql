-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 02. Nopember 2012 jam 04:10
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
-- Struktur dari tabel `tb_program`
--

CREATE TABLE IF NOT EXISTS `tb_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `deskripsi` text,
  `tujuan` text,
  `indikator` text,
  `pelaksanaan` text,
  `lama_pendidikan` text,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `materi` text,
  `pelaksana` text,
  `fasilitator` text,
  `jumlah_peserta` int(45) DEFAULT NULL,
  `tempat` text,
  `tahun_program` year(4) NOT NULL,
  `syarat_pendidikan` varchar(255) NOT NULL,
  `syarat_usia` int(11) DEFAULT '-1',
  `syarat_masa_kerja` int(11) DEFAULT '-1',
  `syarat_pangkat_gol` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `tb_program`
--

INSERT INTO `tb_program` (`id`, `name`, `parent`, `deskripsi`, `tujuan`, `indikator`, `pelaksanaan`, `lama_pendidikan`, `tanggal_mulai`, `tanggal_akhir`, `materi`, `pelaksana`, `fasilitator`, `jumlah_peserta`, `tempat`, `tahun_program`, `syarat_pendidikan`, `syarat_usia`, `syarat_masa_kerja`, `syarat_pangkat_gol`) VALUES
(1, 'Diklat Prajabatan', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000, '', -1, -1, ''),
(2, 'Diklat Dalam Jabatan', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000, '', -1, -1, ''),
(3, 'Diklat Teknis', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000, '', -1, -1, ''),
(4, 'Diklat Kepemimpinan', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000, '', -1, -1, ''),
(5, 'Diklat Fungsional', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000, '', -1, -1, ''),
(6, 'Diklat Prajabatan', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000, '', -1, -1, ''),
(7, 'Diklat Teknis Umum', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000, '', -1, -1, ''),
(8, 'Diklat Teknis Manajemen', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000, '', -1, -1, ''),
(9, 'Diklat Fungsional Keahlian', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000, '', -1, -1, ''),
(10, 'Diklat Teknis Fungsional', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0000, '', -1, -1, ''),
(11, 'Diklat Prajab I & II angkatan 1', 1, '', '', '', '', '', '2012-11-04', '2012-11-10', '', '', '', 40, '', 2012, '', 0, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
