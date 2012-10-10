-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2012 at 05:46 AM
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
-- Table structure for table `tb_elib_bibliography`
--

CREATE TABLE IF NOT EXISTS `tb_elib_bibliography` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `category` int(2) NOT NULL,
  `type` int(2) NOT NULL,
  `imageurl` text NOT NULL,
  `location` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tb_elib_bibliography`
--

INSERT INTO `tb_elib_bibliography` (`id`, `title`, `category`, `type`, `imageurl`, `location`, `keterangan`) VALUES
(39, 'Coupling2.pdf', 0, 1, '0', './assets/elibrary/uploads/Coupling.pdf', '  ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_category`
--

CREATE TABLE IF NOT EXISTS `tb_elib_category` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categoryname` (`categoryname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_elib_category`
--

INSERT INTO `tb_elib_category` (`id`, `categoryname`) VALUES
(2, ''),
(1, 'Dokumen');
