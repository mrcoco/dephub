DROP TABLE  `tb_elib_author` ,
`tb_elib_bibliography` ,
`tb_elib_books` ,
`tb_elib_category` ;
-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2012 at 08:54 AM
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
-- Table structure for table `tb_elib_author`
--

CREATE TABLE IF NOT EXISTS `tb_elib_author` (
  `idauthor` int(5) NOT NULL AUTO_INCREMENT,
  `authorname` varchar(50) NOT NULL,
  PRIMARY KEY (`idauthor`),
  UNIQUE KEY `authorname` (`authorname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_elib_author`
--

INSERT INTO `tb_elib_author` (`idauthor`, `authorname`) VALUES
(1, 'Pengarang 1'),
(2, 'Pengarang 2'),
(3, 'Pengarang 3'),
(4, 'Pengarang 4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_bibliography`
--

CREATE TABLE IF NOT EXISTS `tb_elib_bibliography` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `idauthor` int(5) NOT NULL,
  `idcategory` int(2) NOT NULL,
  `iduploader` int(5) NOT NULL,
  `type` int(2) NOT NULL,
  `location` text NOT NULL,
  `keterangan` text NOT NULL,
  `tags` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tb_elib_bibliography`
--

INSERT INTO `tb_elib_bibliography` (`id`, `title`, `idauthor`, `idcategory`, `iduploader`, `type`, `location`, `keterangan`, `tags`) VALUES
(39, 'Coupling', 3, 4, 0, 1, './assets/elibrary/uploads/Coupling.pdf', '      ini adalah keterangan      ', '    keyword 1 keyword 2, keyword 3      '),
(40, 'Psiko_tes', 1, 1, 0, 4, './assets/elibrary/uploads/Psiko_tes.docx', 'keterangan psiko tes', ' psiko tes'),
(41, 'merkblatt_zulass_eng', 1, 1, 0, 1, './assets/elibrary/uploads/merkblatt_zulass_eng.pdf', 'bahasa jerman', 'jerman ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_books`
--

CREATE TABLE IF NOT EXISTS `tb_elib_books` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `idauthor` int(5) NOT NULL,
  `edition` int(4) NOT NULL,
  `category` int(3) NOT NULL,
  `frequency` int(2) NOT NULL,
  `issnisbn` int(15) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `publisherplace` varchar(50) NOT NULL,
  `publisheryear` int(4) NOT NULL,
  `stock` int(3) NOT NULL,
  `digital` int(6) NOT NULL,
  `keterangan` text NOT NULL,
  `tags` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_elib_books`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_category`
--

CREATE TABLE IF NOT EXISTS `tb_elib_category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(20) NOT NULL,
  PRIMARY KEY (`idcategory`),
  UNIQUE KEY `categoryname` (`categoryname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_elib_category`
--

INSERT INTO `tb_elib_category` (`idcategory`, `categoryname`) VALUES
(1, 'kategori 1'),
(2, 'kategori 2'),
(3, 'kategori 3'),
(4, 'kategori 4');
