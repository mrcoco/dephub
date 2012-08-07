-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 06, 2012 at 04:05 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dephub_simdik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cv_peserta`
--

CREATE TABLE `tb_cv_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `pangkat` varchar(45) DEFAULT NULL,
  `golongan` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `instansi` varchar(45) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `gelar_akademis` varchar(45) DEFAULT NULL,
  `pendidikan_terakhir` varchar(45) DEFAULT NULL,
  `unit_kerja` varchar(45) DEFAULT NULL,
  `alamat_kantor` text,
  `alamat_rumah` text,
  `agama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_cv_peserta`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_hadir`
--

CREATE TABLE `tb_daftar_hadir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_daftar_hadir`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_evaluasi_penyelenggaraan`
--

CREATE TABLE `tb_evaluasi_penyelenggaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(45) DEFAULT NULL,
  `id_program` varchar(45) DEFAULT NULL,
  `eval1` varchar(255) DEFAULT NULL,
  `eval2` varchar(255) DEFAULT NULL,
  `eval3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_evaluasi_penyelenggaraan`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diklat_message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_kkk`
--

CREATE TABLE `tb_penilaian_kkk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(11) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `ind1` int(11) DEFAULT NULL,
  `ind2` int(11) DEFAULT NULL,
  `ind3` int(11) DEFAULT NULL,
  `id_widyaiswara` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_penilaian_kkk`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_kkol`
--

CREATE TABLE `tb_penilaian_kkol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(11) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `ind1` int(11) DEFAULT NULL,
  `ind2` int(11) DEFAULT NULL,
  `ind3` int(11) DEFAULT NULL,
  `ind4` int(11) DEFAULT NULL,
  `ind5` int(11) DEFAULT NULL,
  `id_widyaiswara` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_penilaian_kkol`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_kkp`
--

CREATE TABLE `tb_penilaian_kkp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(11) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `ind1` int(11) DEFAULT NULL,
  `ind2` int(11) DEFAULT NULL,
  `ind3` int(11) DEFAULT NULL,
  `ind4` int(11) DEFAULT NULL,
  `ind5` int(11) DEFAULT NULL,
  `ind6` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_penilaian_kkp`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_sikap_perilaku`
--

CREATE TABLE `tb_penilaian_sikap_perilaku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` varchar(45) DEFAULT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `dis1` int(11) DEFAULT NULL,
  `dis2` int(11) DEFAULT NULL,
  `dis3` int(11) DEFAULT NULL,
  `dis4` int(11) DEFAULT NULL,
  `pem1` int(11) DEFAULT NULL,
  `pem2` int(11) DEFAULT NULL,
  `pem3` int(11) DEFAULT NULL,
  `pem4` int(11) DEFAULT NULL,
  `ker1` int(11) DEFAULT NULL,
  `ker2` int(11) DEFAULT NULL,
  `ker3` int(11) DEFAULT NULL,
  `ker4` int(11) DEFAULT NULL,
  `pra1` int(11) DEFAULT NULL,
  `pra2` int(11) DEFAULT NULL,
  `pra3` int(11) DEFAULT NULL,
  `pra4` int(11) DEFAULT NULL,
  `id_widyaiswara` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_penilaian_sikap_perilaku`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(25) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `pangkat` varchar(45) DEFAULT NULL,
  `golongan` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `instansi` varchar(45) DEFAULT NULL,
  `id_program` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_peserta`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
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
  `persyaratan` text,
  `materi` text,
  `pelaksana` text,
  `fasilitator` text,
  `jumlah_peserta` varchar(45) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_program`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_registrasi`
--

CREATE TABLE `tb_registrasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) DEFAULT NULL,
  `id_peserta` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_registrasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_schedule`
--

CREATE TABLE `tb_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) DEFAULT NULL,
  `id_widyaiswara` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `materi` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_schedule`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_sociograph`
--

CREATE TABLE `tb_sociograph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(45) DEFAULT NULL,
  `rank1` int(11) DEFAULT NULL,
  `rank2` int(11) DEFAULT NULL,
  `rank3` int(11) DEFAULT NULL,
  `rank4` int(11) DEFAULT NULL,
  `rank5` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_sociograph`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` VALUES(1, 'Perencanaan', '10c4981bb793e1698a83aea43030a388', 1, 'simdik/perencanaan');
INSERT INTO `tb_user` VALUES(2, 'Penyelenggaraan', '10c4981bb793e1698a83aea43030a388', 2, 'simdik/penyelenggaraan');
INSERT INTO `tb_user` VALUES(3, 'Sarana & Prasarana', '10c4981bb793e1698a83aea43030a388', 3, 'simdik/sarpras');
INSERT INTO `tb_user` VALUES(4, 'Administrator', '10c4981bb793e1698a83aea43030a388', 4, 'simdik/administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_widyaiswara`
--

CREATE TABLE `tb_widyaiswara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pangkat` varchar(45) DEFAULT NULL,
  `golongan` varchar(45) DEFAULT NULL,
  `instansi` varchar(45) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `pendidikan_dn` varchar(45) DEFAULT NULL,
  `pendidikan_ln` varchar(45) DEFAULT NULL,
  `alamat_rumah` varchar(45) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_widyaiswara`
--

