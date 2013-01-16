-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2013 at 10:09 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

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
-- Table structure for table `tb_sarpras_checklist_kelas`
--

DROP TABLE IF EXISTS `tb_sarpras_checklist_kelas`;
CREATE TABLE IF NOT EXISTS `tb_sarpras_checklist_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` varchar(45) DEFAULT NULL,
  `l1` varchar(45) DEFAULT '0',
  `l2` int(11) DEFAULT '0',
  `l3` int(11) DEFAULT '0',
  `l4` varchar(45) DEFAULT '0',
  `s1` varchar(45) DEFAULT '0',
  `s2` int(11) DEFAULT '0',
  `m1` varchar(45) DEFAULT '0',
  `m2` int(11) DEFAULT '0',
  `m3` int(11) DEFAULT '0',
  `k1` varchar(45) DEFAULT '0',
  `k2` int(11) DEFAULT '0',
  `k3` int(11) DEFAULT '0',
  `wb` int(11) DEFAULT '0',
  `pb` int(11) DEFAULT '0',
  `fc` int(11) DEFAULT '0',
  `pc1` int(11) DEFAULT '0',
  `pc2` int(11) DEFAULT '0',
  `pc3` int(11) DEFAULT '0',
  `pc4` int(11) DEFAULT '0',
  `jar` int(11) DEFAULT '0',
  `ac` int(11) DEFAULT '0',
  `remac` int(11) DEFAULT '0',
  `remlcd` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_sarpras_checklist_kelas`
--

REPLACE INTO `tb_sarpras_checklist_kelas` (`id`, `id_kelas`, `l1`, `l2`, `l3`, `l4`, `s1`, `s2`, `m1`, `m2`, `m3`, `k1`, `k2`, `k3`, `wb`, `pb`, `fc`, `pc1`, `pc2`, `pc3`, `pc4`, `jar`, `ac`, `remac`, `remlcd`) VALUES
(1, '1', '0', 1, 0, '0', '0', 0, '0', 1, 0, '0', 0, 44, 0, 0, 0, 44, 0, 0, 0, 0, 0, 0, 0),
(2, '2', '0', 0, 0, '0', '0', 1, '0', 0, 0, '0', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '3', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '4', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '5', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '6', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '7', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '8', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, '9', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, '10', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, '11', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, '12', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, '13', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, '14', '0', 0, 0, '0', '0', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
