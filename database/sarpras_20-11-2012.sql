-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2012 at 08:50 AM
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
-- Table structure for table `tb_sarpras_checklist_kamar`
--

DROP TABLE IF EXISTS `tb_sarpras_checklist_kamar`;
CREATE TABLE IF NOT EXISTS `tb_sarpras_checklist_kamar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kamar` int(11) DEFAULT NULL,
  `lampu1` int(11) DEFAULT '0',
  `lampu2` int(11) DEFAULT '0',
  `lampu3` int(11) DEFAULT '0',
  `lampu4` int(11) DEFAULT '0',
  `lampu5` int(11) DEFAULT '0',
  `toilet1` int(11) DEFAULT '0',
  `toilet2` int(11) DEFAULT '0',
  `toilet3` int(11) DEFAULT '0',
  `toilet4` int(11) DEFAULT '0',
  `toilet5` int(11) DEFAULT '0',
  `ac1` int(11) DEFAULT '0',
  `ac2` int(11) DEFAULT '0',
  `lain_lain` varchar(100) DEFAULT NULL,
  `kebersihan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `tb_sarpras_checklist_kamar`
--

REPLACE INTO `tb_sarpras_checklist_kamar` (`id`, `id_kamar`, `lampu1`, `lampu2`, `lampu3`, `lampu4`, `lampu5`, `toilet1`, `toilet2`, `toilet3`, `toilet4`, `toilet5`, `ac1`, `ac2`, `lain_lain`, `kebersihan`) VALUES
(1, 1101, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(2, 1102, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(3, 1103, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(4, 1104, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(5, 1105, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(6, 1106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(7, 1107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(8, 1108, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(9, 1109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(10, 1110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(11, 1111, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(12, 1112, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(13, 1113, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(14, 1114, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(15, 1115, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(16, 1116, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(17, 1117, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(18, 1118, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(19, 1119, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(20, 1120, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(21, 1121, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(22, 1122, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(23, 1123, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(24, 1124, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(25, 1125, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(26, 1126, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(27, 1127, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(28, 1128, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(29, 1129, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(30, 1130, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(31, 1131, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(32, 1132, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(33, 1133, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(34, 1134, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(35, 1135, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(36, 1136, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(37, 1137, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(38, 1138, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(39, 1201, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(40, 1202, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(41, 1203, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(42, 1204, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(43, 1205, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(44, 1206, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(45, 1207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(46, 1208, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(47, 1209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(48, 1210, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(49, 1211, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(50, 1212, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(51, 1213, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(52, 1214, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(53, 1215, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(54, 1216, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(55, 1217, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(56, 1218, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(57, 1219, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(58, 1220, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(59, 1221, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(60, 1222, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(61, 1223, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(62, 1224, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(63, 1225, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(64, 1226, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(65, 1227, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(66, 1228, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(67, 1229, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(68, 1230, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(69, 1231, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(70, 1232, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(71, 1233, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(72, 1234, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(73, 1235, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(74, 1236, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(75, 1237, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(76, 1238, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(77, 2101, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(78, 2102, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(79, 2103, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(80, 2104, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(81, 2105, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(82, 2106, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(83, 2107, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(84, 2108, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(85, 2109, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(86, 2110, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(87, 2111, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(88, 2112, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(89, 2113, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(90, 2114, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(91, 2115, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(92, 2116, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(93, 2117, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(94, 2118, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(95, 2119, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(96, 2120, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(97, 2121, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(98, 2122, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(99, 2123, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(100, 2124, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(101, 2125, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(102, 2126, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(103, 2127, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(104, 2128, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(105, 2129, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(106, 2130, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(107, 2131, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(108, 2132, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(109, 2133, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(110, 2134, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(111, 2201, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(112, 2202, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(113, 2203, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(114, 2204, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(115, 2205, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(116, 2206, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(117, 2207, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(118, 2208, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(119, 2209, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(120, 2210, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(121, 2211, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(122, 2212, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(123, 2213, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(124, 2214, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(125, 2215, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(126, 2216, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(127, 2217, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(128, 2218, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(129, 2219, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(130, 2220, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(131, 2221, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(132, 2222, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(133, 2223, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(134, 2224, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(135, 2225, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(136, 2226, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(137, 2227, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(138, 2228, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(139, 2229, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(140, 2230, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(141, 2231, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(142, 2232, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(143, 2233, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(144, 2234, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sarpras_checklist_kelas`
--

DROP TABLE IF EXISTS `tb_sarpras_checklist_kelas`;
CREATE TABLE IF NOT EXISTS `tb_sarpras_checklist_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` varchar(45) DEFAULT NULL,
  `l1` int(11) DEFAULT '0',
  `l2` int(11) DEFAULT '0',
  `l3` int(11) DEFAULT '0',
  `l4` int(11) DEFAULT '0',
  `s1` int(11) DEFAULT '0',
  `s2` int(11) DEFAULT '0',
  `m1` int(11) DEFAULT '0',
  `m2` int(11) DEFAULT '0',
  `m3` int(11) DEFAULT '0',
  `k1` int(11) DEFAULT '0',
  `k2` int(11) DEFAULT '0',
  `k3` int(11) DEFAULT '0',
  `wb` int(11) DEFAULT '0',
  `pb` int(11) DEFAULT '0',
  `fc` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_sarpras_checklist_kelas`
--

REPLACE INTO `tb_sarpras_checklist_kelas` (`id`, `id_kelas`, `l1`, `l2`, `l3`, `l4`, `s1`, `s2`, `m1`, `m2`, `m3`, `k1`, `k2`, `k3`, `wb`, `pb`, `fc`) VALUES
(1, '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '4', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '5', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '6', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '7', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, '8', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, '9', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, '10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, '11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, '12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, '13', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sarpras_gedung`
--

DROP TABLE IF EXISTS `tb_sarpras_gedung`;
CREATE TABLE IF NOT EXISTS `tb_sarpras_gedung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_sarpras_gedung`
--

REPLACE INTO `tb_sarpras_gedung` (`id`, `nama`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sarpras_kamar`
--

DROP TABLE IF EXISTS `tb_sarpras_kamar`;
CREATE TABLE IF NOT EXISTS `tb_sarpras_kamar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kamar` int(11) DEFAULT NULL,
  `asrama` int(11) DEFAULT NULL,
  `lantai` varchar(45) DEFAULT NULL,
  `sayap` enum('Kanan','Kiri') DEFAULT NULL,
  `nomor` int(11) DEFAULT NULL,
  `bed` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1144 ;

--
-- Dumping data for table `tb_sarpras_kamar`
--

REPLACE INTO `tb_sarpras_kamar` (`id`, `nama_kamar`, `asrama`, `lantai`, `sayap`, `nomor`, `bed`, `status`) VALUES
(1, 1101, 1, '1', 'Kanan', 101, 2, 0),
(2, 1102, 1, '1', 'Kanan', 102, 2, 0),
(3, 1103, 1, '1', 'Kanan', 103, 2, 0),
(4, 1104, 1, '1', 'Kanan', 104, 2, 0),
(5, 1105, 1, '1', 'Kanan', 105, 2, 0),
(6, 1106, 1, '1', 'Kanan', 106, 2, 0),
(7, 1107, 1, '1', 'Kanan', 107, 2, 0),
(8, 1108, 1, '1', 'Kanan', 108, 2, 0),
(9, 1109, 1, '1', 'Kanan', 109, 2, 0),
(10, 1110, 1, '1', 'Kanan', 110, 2, 0),
(11, 1111, 1, '1', 'Kanan', 111, 2, 0),
(12, 1112, 1, '1', 'Kanan', 112, 2, 0),
(13, 1113, 1, '1', 'Kanan', 113, 2, 0),
(14, 1114, 1, '1', 'Kanan', 114, 2, 0),
(15, 1115, 1, '1', 'Kanan', 115, 2, 0),
(16, 1116, 1, '1', 'Kanan', 116, 2, 0),
(17, 1117, 1, '1', 'Kanan', 117, 2, 0),
(18, 1118, 1, '1', 'Kanan', 118, 2, 0),
(19, 1119, 1, '1', 'Kanan', 119, 2, 0),
(20, 1120, 1, '1', 'Kanan', 120, 2, 0),
(21, 1121, 1, '1', 'Kanan', 121, 2, 0),
(22, 1122, 1, '1', 'Kanan', 122, 2, 0),
(23, 1123, 1, '1', 'Kanan', 123, 2, 0),
(24, 1124, 1, '1', 'Kanan', 124, 2, 0),
(25, 1125, 1, '1', 'Kanan', 125, 2, 0),
(26, 1126, 1, '1', 'Kanan', 126, 2, 0),
(27, 1127, 1, '1', 'Kanan', 127, 2, 0),
(28, 1128, 1, '1', 'Kanan', 128, 2, 0),
(29, 1129, 1, '1', 'Kanan', 129, 2, 0),
(30, 1130, 1, '1', 'Kanan', 130, 2, 0),
(31, 1131, 1, '1', 'Kanan', 131, 2, 0),
(32, 1132, 1, '1', 'Kanan', 132, 2, 0),
(33, 1133, 1, '1', 'Kanan', 133, 2, 0),
(34, 1134, 1, '1', 'Kanan', 134, 2, 0),
(35, 1135, 1, '1', 'Kanan', 135, 2, 0),
(36, 1136, 1, '1', 'Kanan', 136, 2, 0),
(37, 1137, 1, '1', 'Kanan', 137, 2, 0),
(38, 1138, 1, '1', 'Kanan', 138, 2, 0),
(39, 1201, 1, '2', 'Kanan', 201, 2, 0),
(40, 1202, 1, '2', 'Kanan', 202, 2, 0),
(41, 1203, 1, '2', 'Kanan', 203, 2, 0),
(42, 1204, 1, '2', 'Kanan', 204, 2, 0),
(43, 1205, 1, '2', 'Kanan', 205, 2, 0),
(44, 1206, 1, '2', 'Kanan', 206, 2, 0),
(45, 1207, 1, '2', 'Kanan', 207, 2, 0),
(46, 1208, 1, '2', 'Kanan', 208, 2, 0),
(47, 1209, 1, '2', 'Kanan', 209, 2, 0),
(48, 1210, 1, '2', 'Kanan', 210, 2, 0),
(49, 1211, 1, '2', 'Kanan', 211, 2, 0),
(50, 1212, 1, '2', 'Kanan', 212, 2, 0),
(51, 1213, 1, '2', 'Kanan', 213, 2, 0),
(52, 1214, 1, '2', 'Kanan', 214, 2, 0),
(53, 1215, 1, '2', 'Kanan', 215, 2, 0),
(54, 1216, 1, '2', 'Kanan', 216, 2, 0),
(55, 1217, 1, '2', 'Kanan', 217, 2, 0),
(56, 1218, 1, '2', 'Kiri', 218, 2, 0),
(57, 1219, 1, '2', 'Kiri', 219, 2, 0),
(58, 1220, 1, '2', 'Kiri', 220, 2, 0),
(59, 1221, 1, '2', 'Kiri', 221, 2, 0),
(60, 1222, 1, '2', 'Kiri', 222, 2, 0),
(61, 1223, 1, '2', 'Kiri', 223, 2, 0),
(62, 1224, 1, '2', 'Kiri', 224, 2, 0),
(63, 1225, 1, '2', 'Kiri', 225, 2, 0),
(64, 1226, 1, '2', 'Kiri', 226, 2, 0),
(65, 1227, 1, '2', 'Kiri', 227, 2, 0),
(66, 1228, 1, '2', 'Kiri', 228, 2, 0),
(67, 1229, 1, '2', 'Kiri', 229, 2, 0),
(68, 1230, 1, '2', 'Kiri', 230, 2, 0),
(69, 1231, 1, '2', 'Kiri', 231, 2, 0),
(70, 1232, 1, '2', 'Kiri', 232, 2, 0),
(71, 1233, 1, '2', 'Kiri', 233, 2, 0),
(72, 1234, 1, '2', 'Kiri', 234, 2, 0),
(73, 1235, 1, '2', 'Kiri', 235, 2, 0),
(74, 1236, 1, '2', 'Kiri', 236, 2, 0),
(75, 1237, 1, '2', 'Kiri', 237, 2, 0),
(76, 1238, 1, '2', 'Kiri', 238, 2, 0),
(77, 2101, 2, '1', 'Kanan', 101, 2, 0),
(78, 2102, 2, '1', 'Kanan', 102, 2, 0),
(79, 2103, 2, '1', 'Kanan', 103, 2, 0),
(80, 2104, 2, '1', 'Kanan', 104, 2, 0),
(81, 2105, 2, '1', 'Kanan', 105, 2, 0),
(82, 2106, 2, '1', 'Kanan', 106, 2, 0),
(83, 2107, 2, '1', 'Kanan', 107, 2, 0),
(84, 2108, 2, '1', 'Kanan', 108, 2, 0),
(85, 2109, 2, '1', 'Kanan', 109, 2, 0),
(86, 2110, 2, '1', 'Kanan', 110, 2, 0),
(87, 2111, 2, '1', 'Kanan', 111, 2, 0),
(88, 2112, 2, '1', 'Kanan', 112, 2, 0),
(89, 2113, 2, '1', 'Kanan', 113, 2, 0),
(90, 2114, 2, '1', 'Kanan', 114, 2, 0),
(91, 2115, 2, '1', 'Kanan', 115, 2, 0),
(92, 2116, 2, '1', 'Kanan', 116, 2, 0),
(93, 2117, 2, '1', 'Kanan', 117, 2, 0),
(94, 2118, 2, '1', 'Kanan', 118, 2, 0),
(95, 2119, 2, '1', 'Kanan', 119, 2, 0),
(96, 2120, 2, '1', 'Kanan', 120, 2, 0),
(97, 2121, 2, '1', 'Kiri', 121, 2, 0),
(98, 2122, 2, '1', 'Kiri', 122, 2, 0),
(99, 2123, 2, '1', 'Kiri', 123, 2, 0),
(100, 2124, 2, '1', 'Kiri', 124, 2, 0),
(101, 2125, 2, '1', 'Kiri', 125, 2, 0),
(102, 2126, 2, '1', 'Kiri', 126, 2, 0),
(103, 2127, 2, '1', 'Kiri', 127, 2, 0),
(104, 2128, 2, '1', 'Kiri', 128, 2, 0),
(105, 2129, 2, '1', 'Kiri', 129, 2, 0),
(106, 2130, 2, '1', 'Kiri', 130, 2, 0),
(107, 2131, 2, '1', 'Kiri', 131, 2, 0),
(108, 2132, 2, '1', 'Kiri', 132, 2, 0),
(109, 2133, 2, '1', 'Kiri', 133, 2, 0),
(110, 2134, 2, '1', 'Kiri', 134, 2, 0),
(111, 2201, 2, '2', 'Kanan', 201, 2, 0),
(112, 2202, 2, '2', 'Kanan', 202, 2, 0),
(113, 2203, 2, '2', 'Kanan', 203, 2, 0),
(114, 2204, 2, '2', 'Kanan', 204, 2, 0),
(115, 2205, 2, '2', 'Kanan', 205, 2, 0),
(116, 2206, 2, '2', 'Kanan', 206, 2, 0),
(117, 2207, 2, '2', 'Kanan', 207, 2, 0),
(118, 2208, 2, '2', 'Kanan', 208, 2, 0),
(119, 2209, 2, '2', 'Kanan', 209, 2, 0),
(120, 2210, 2, '2', 'Kanan', 210, 2, 0),
(121, 2211, 2, '2', 'Kanan', 211, 2, 0),
(122, 2212, 2, '2', 'Kanan', 212, 2, 0),
(123, 2213, 2, '2', 'Kanan', 213, 2, 0),
(124, 2214, 2, '2', 'Kanan', 214, 2, 0),
(125, 2215, 2, '2', 'Kanan', 215, 2, 0),
(126, 2216, 2, '2', 'Kanan', 216, 2, 0),
(127, 2217, 2, '2', 'Kanan', 217, 2, 0),
(128, 2218, 2, '2', 'Kanan', 218, 2, 0),
(129, 2219, 2, '2', 'Kanan', 219, 2, 0),
(130, 2220, 2, '2', 'Kanan', 220, 2, 0),
(131, 2221, 2, '2', 'Kiri', 221, 2, 0),
(132, 2222, 2, '2', 'Kiri', 222, 2, 0),
(133, 2223, 2, '2', 'Kiri', 223, 2, 0),
(134, 2224, 2, '2', 'Kiri', 224, 2, 0),
(135, 2225, 2, '2', 'Kiri', 225, 2, 0),
(136, 2226, 2, '2', 'Kiri', 226, 2, 0),
(137, 2227, 2, '2', 'Kiri', 227, 2, 0),
(138, 2228, 2, '2', 'Kiri', 228, 2, 0),
(139, 2229, 2, '2', 'Kiri', 229, 2, 0),
(140, 2230, 2, '2', 'Kiri', 230, 2, 0),
(141, 2231, 2, '2', 'Kiri', 231, 2, 0),
(142, 2232, 2, '2', 'Kiri', 232, 2, 0),
(143, 2233, 2, '2', 'Kiri', 233, 2, 0),
(144, 2234, 2, '2', 'Kiri', 234, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sarpras_kamar_status`
--

DROP TABLE IF EXISTS `tb_sarpras_kamar_status`;
CREATE TABLE IF NOT EXISTS `tb_sarpras_kamar_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_sarpras_kamar_status`
--

REPLACE INTO `tb_sarpras_kamar_status` (`id`, `status`) VALUES
(0, 'tersedia'),
(1, 'rusak'),
(2, 'diperbaiki'),
(3, 'terisi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sarpras_kelas`
--

DROP TABLE IF EXISTS `tb_sarpras_kelas`;
CREATE TABLE IF NOT EXISTS `tb_sarpras_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `mejakursi` int(11) DEFAULT NULL,
  `kondisi` varchar(45) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tb_sarpras_kelas`
--

REPLACE INTO `tb_sarpras_kelas` (`id`, `nama`, `kapasitas`, `mejakursi`, `kondisi`, `keterangan`) VALUES
(0, 'R. Kelas 1.1', 40, 40, 'baru', 'kursi besi'),
(1, 'R. Kelas 1.2', 40, 40, 'baru', 'kursi besi'),
(2, 'R. Kelas 1.3', 40, 40, 'baru', 'kursi besi'),
(3, 'R. Kelas 1.4', 40, 40, 'baru', 'kursi besi'),
(4, 'R. Kelas 1.5', 40, 40, 'baru', 'kursi besi'),
(5, 'R. Kelas 2.1', 40, 40, 'baru', 'kursi besi'),
(6, 'R. Kelas 2.2', 30, 30, 'baru', 'kursi besi'),
(7, 'R. Kelas 2.3', 30, 30, 'baru', 'kursi besi'),
(8, 'R. Kelas 2.4', 40, 40, 'baru', 'kursi besi'),
(9, 'R. Kelas 2.5', 40, 40, 'baru', 'kursi besi'),
(10, 'R. Kelas 3.1', 40, 40, 'baru', 'kursi besi'),
(11, 'R. Kelas 3.2', 30, 30, 'baru', 'kursi besi'),
(12, 'R. Kelas 3.3', 30, 30, 'baru', 'kursi besi'),
(13, 'R. Kelas 3.4', 40, 40, 'baru', 'kursi besi'),
(14, 'R. Kelas 3.5', 40, 40, 'baru', 'kursi besi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sarpras_pemakaian_kamar`
--

DROP TABLE IF EXISTS `tb_sarpras_pemakaian_kamar`;
CREATE TABLE IF NOT EXISTS `tb_sarpras_pemakaian_kamar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kamar_asrama` int(11) DEFAULT NULL,
  `id_program` varchar(45) DEFAULT NULL,
  `id_peserta` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_sarpras_pemakaian_kamar`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_sarpras_pemakaian_kelas`
--

DROP TABLE IF EXISTS `tb_sarpras_pemakaian_kelas`;
CREATE TABLE IF NOT EXISTS `tb_sarpras_pemakaian_kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `tb_sarpras_pemakaian_kelas`
--

REPLACE INTO `tb_sarpras_pemakaian_kelas` (`id`, `id_program`, `id_kelas`, `tanggal`) VALUES
(1, 28, 14, '2012-11-04'),
(2, 28, 14, '2012-11-05'),
(3, 28, 14, '2012-11-06'),
(4, 28, 14, '2012-11-07'),
(5, 28, 14, '2012-11-08'),
(6, 28, 14, '2012-11-09'),
(7, 28, 14, '2012-11-10'),
(8, 28, 14, '2012-11-11'),
(9, 28, 14, '2012-11-12'),
(10, 28, 14, '2012-11-13'),
(11, 28, 14, '2012-11-14'),
(12, 28, 14, '2012-11-15'),
(13, 28, 14, '2012-11-16'),
(14, 28, 14, '2012-11-17'),
(22, 19, 5, '2012-11-11'),
(23, 19, 5, '2012-11-12'),
(24, 19, 5, '2012-11-13'),
(25, 19, 5, '2012-11-14'),
(26, 19, 5, '2012-11-15'),
(27, 19, 5, '2012-11-16'),
(28, 19, 5, '2012-11-17'),
(29, 19, 5, '2012-11-18'),
(30, 19, 5, '2012-11-19'),
(31, 19, 5, '2012-11-20'),
(32, 19, 5, '2012-11-21'),
(33, 19, 5, '2012-11-22'),
(34, 19, 5, '2012-11-23'),
(35, 19, 5, '2012-11-24'),
(78, 29, 9, '2012-11-25'),
(79, 29, 9, '2012-11-26'),
(80, 29, 9, '2012-11-27'),
(81, 29, 9, '2012-11-28'),
(82, 29, 9, '2012-11-29'),
(83, 29, 9, '2012-11-30'),
(84, 29, 9, '2012-12-01'),
(92, 30, 14, '2012-12-02'),
(93, 30, 14, '2012-12-03'),
(94, 30, 14, '2012-12-04'),
(95, 30, 14, '2012-12-05'),
(96, 30, 14, '2012-12-06'),
(97, 30, 14, '2012-12-07'),
(98, 30, 14, '2012-12-08');
