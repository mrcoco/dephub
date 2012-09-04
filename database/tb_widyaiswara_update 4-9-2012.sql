-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 04. September 2012 jam 13:04
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
-- Struktur dari tabel `tb_widyaiswara`
--

CREATE TABLE IF NOT EXISTS `tb_widyaiswara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pangkat` varchar(45) DEFAULT NULL,
  `golongan` varchar(45) DEFAULT NULL,
  `instansi` varchar(45) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `history_jabatan` text NOT NULL,
  `pendidikan_dn` text,
  `pendidikan_ln` text,
  `alamat_rumah` text NOT NULL,
  `tlp_rumah` varchar(20) NOT NULL,
  `alamat_kantor` text NOT NULL,
  `tlp_kantor` varchar(20) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `history_diklat` text NOT NULL,
  `history_kursus` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tb_widyaiswara`
--

INSERT INTO `tb_widyaiswara` (`id`, `nama`, `nip`, `tempat_lahir`, `tanggal_lahir`, `pangkat`, `golongan`, `instansi`, `jabatan`, `history_jabatan`, `pendidikan_dn`, `pendidikan_ln`, `alamat_rumah`, `tlp_rumah`, `alamat_kantor`, `tlp_kantor`, `status`, `history_diklat`, `history_kursus`) VALUES
(7, 'Bambang Shit', '87087909', '', '1901-01-17', '', '', '', '', '<li>2010-2012 : Kuli</li><li>2012-2015 : Mandor</li><li>2016-2020 : Brokir</li>', '<li>2009-2010 : SD</li><li>2000-2003 : SMP</li><li>2003-2008 : SMA</li>', '<li>2009-2010 : S1</li><li>2010-2012 : S2</li>', '', '', '', '', '1', '', '<li>2009 : Survey</li>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
