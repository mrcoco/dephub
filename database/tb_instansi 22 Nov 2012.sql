-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 22. Nopember 2012 jam 04:49
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
-- Struktur dari tabel `tb_instansi`
--

DROP TABLE IF EXISTS `tb_instansi`;
CREATE TABLE IF NOT EXISTS `tb_instansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kantor` int(11) NOT NULL,
  `nama_singkat` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tb_instansi`
--

INSERT INTO `tb_instansi` (`id`, `kode_kantor`, `nama_singkat`, `nama_instansi`, `password`) VALUES
(1, 101, 'SETJEN', 'SEKRETARIAT JENDERAL', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 102, 'ITJEN', 'INSPEKTORAT JENDERAL', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 103, 'DITJEN HUBDAT', 'DIREKTORAT JENDERAL PERHUBUNGAN DARAT', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 104, 'DITJEN HUBLA', 'DIREKTORAT JENDERAL HUBUNGAN LAUT', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 105, 'DITJEN HUBUD', 'DIREKTORAT JENDERAL HUBUNGAN UDARA', '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, 111, 'DITJEN PERKA', 'DIREKTORAT JENDERAL PERKERETAAIPAN', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 106, 'BADAN DIKLAT', 'BADAN PENGEMBANGAN SDM PERHUBUNGAN', '5f4dcc3b5aa765d61d8327deb882cf99'),
(8, 107, 'BADAN LITBANG', 'BADAN PENELITIAN DAN PENGEMBANGAN', '5f4dcc3b5aa765d61d8327deb882cf99'),
(9, 109, 'BADAN SARNAS', 'BADAN SAR NASIONAL', '5f4dcc3b5aa765d61d8327deb882cf99');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
