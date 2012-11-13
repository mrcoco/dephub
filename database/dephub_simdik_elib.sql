-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2012 at 09:16 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5
DROP TABLE IF EXISTS `tb_elib_author`, `tb_elib_bibliography`, `tb_elib_books`, `tb_elib_category`, `tb_elib_filetype`, `tb_elib_loan`, `tb_elib_queue`, `tb_elib_userrole`;
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
  `idauthor` int(10) NOT NULL AUTO_INCREMENT,
  `authorname` varchar(50) NOT NULL,
  PRIMARY KEY (`idauthor`),
  UNIQUE KEY `authorname` (`authorname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_elib_author`
--

INSERT INTO `tb_elib_author` (`idauthor`, `authorname`) VALUES
(7, 'AULO'),
(5, 'Pengarang'),
(1, 'Pengarang 1'),
(2, 'Pengarang 2'),
(3, 'Pengarang 3'),
(6, 'pengarang 5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_bibliography`
--

CREATE TABLE IF NOT EXISTS `tb_elib_bibliography` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `idauthor` int(5) NOT NULL,
  `idcategory` int(2) NOT NULL,
  `iduploader` int(5) NOT NULL DEFAULT '1',
  `uploaddate` date NOT NULL DEFAULT '0000-00-00',
  `type` int(2) NOT NULL,
  `location` text NOT NULL,
  `keterangan` text NOT NULL,
  `tags` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `tb_elib_bibliography`
--

INSERT INTO `tb_elib_bibliography` (`id`, `title`, `idauthor`, `idcategory`, `iduploader`, `uploaddate`, `type`, `location`, `keterangan`, `tags`) VALUES
(57, '13-polarization', 2, 1, 1, '2012-11-13', 13, './assets/elibrary/uploads/13-polarization.ppt', 'keterangan untuk presentasi ini ', ' presentasi, '),
(58, 'Demystifying_Google_Hacks', 3, 1, 1, '2012-11-13', 15, './assets/elibrary/uploads/Demystifying_Google_Hacks.doc', 'Keterangan untuk dokumen ini', ' Dokumen'),
(59, 'Sylabus_Access', 6, 3, 1, '2012-11-13', 1, './assets/elibrary/uploads/Sylabus_Access.docx', 'Keterangan siabus', 'syllabus '),
(60, 'AULO', 7, 5, 1, '2012-11-13', 9, './assets/elibrary/uploads/AULO.mp3', 'Keterangan Music', 'keyword music '),
(61, 'SFI_-3', 6, 5, 1, '2012-11-13', 17, './assets/elibrary/uploads/SFI_-3.png', 'File gambar', 'Gambar ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_books`
--

CREATE TABLE IF NOT EXISTS `tb_elib_books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `idauthor` int(5) NOT NULL,
  `edition` int(4) NOT NULL,
  `idcategory` int(3) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_elib_books`
--

INSERT INTO `tb_elib_books` (`id`, `title`, `idauthor`, `edition`, `idcategory`, `frequency`, `issnisbn`, `publisher`, `publisherplace`, `publisheryear`, `stock`, `digital`, `keterangan`, `tags`) VALUES
(1, 'coupling', 3, 1, 4, 0, 2147483647, 'Galamedia', 'Jakarta', 1995, 3, 40, 'Buku ini ada digitalnya', 'fisika'),
(2, 'Buku dummy majalah', 1, 1, 39, 1, 1241241245, 'Galamedia', 'Jakarta', 1993, 3, 0, 'keterangan 1 ada ', ''),
(3, 'buku 3', 1, 1, 1, 2, 3232, 'Gramedia', 'Bandung', 0, 2, 0, 'qwe', ' wqe'),
(4, 'buku 4', 1, 1, 1, 2, 3232, 'Gramedia', 'Bandung', 0, 2, 0, 'qwe', ' wqe'),
(5, 'buku 5', 1, 1, 1, 2, 3232, 'Gramedia', 'Bandung', 0, 2, 0, 'qwe', ' wqe');

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_category`
--

CREATE TABLE IF NOT EXISTS `tb_elib_category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(20) NOT NULL,
  PRIMARY KEY (`idcategory`),
  UNIQUE KEY `categoryname` (`categoryname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_elib_category`
--

INSERT INTO `tb_elib_category` (`idcategory`, `categoryname`) VALUES
(1, 'kategori 1'),
(3, 'kategori 3'),
(4, 'kategori 4'),
(5, 'kategori 5'),
(6, 'kategori 6'),
(7, 'kategori 7'),
(8, 'Tentang Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_filetype`
--

CREATE TABLE IF NOT EXISTS `tb_elib_filetype` (
  `id` int(4) NOT NULL,
  `filetypename` varchar(5) NOT NULL,
  `jenis` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_elib_filetype`
--

INSERT INTO `tb_elib_filetype` (`id`, `filetypename`, `jenis`) VALUES
(0, 'lain', 0),
(1, '.docx', 1),
(2, '.txt', 1),
(3, '.pdf', 1),
(4, '.xls', 1),
(5, '.xlsx', 1),
(6, '.mp4', 2),
(7, '.avi', 2),
(8, '.wmv', 2),
(9, '.mp3', 2),
(10, '.flv', 2),
(11, '.3gp', 0),
(12, '.mkv', 2),
(13, '.ppt', 3),
(14, '.pptx', 3),
(15, '.doc', 1),
(16, '.jpg', 0),
(17, '.png', 0),
(18, '.gif', 0),
(19, '.tiff', 0),
(20, '.bmp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_loan`
--

CREATE TABLE IF NOT EXISTS `tb_elib_loan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpegawai` int(11) NOT NULL,
  `booksid` int(6) NOT NULL,
  `amount` int(10) NOT NULL DEFAULT '1',
  `loandate` date NOT NULL,
  `duedate` date NOT NULL,
  `returndate` date NOT NULL DEFAULT '0000-00-00',
  `idqueue` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `tb_elib_loan`
--

INSERT INTO `tb_elib_loan` (`id`, `idpegawai`, `booksid`, `amount`, `loandate`, `duedate`, `returndate`, `idqueue`) VALUES
(1, 5, 2, 1, '2012-11-08', '2012-11-15', '0000-00-00', 0),
(3, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(4, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(5, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(6, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(7, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(8, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(9, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(10, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(11, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(12, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(13, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(14, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(15, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(16, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(17, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(18, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(19, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(20, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(21, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(22, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(23, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(24, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(25, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(26, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(27, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(28, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(29, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(30, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(31, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(32, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(33, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(34, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(35, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(36, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(37, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(38, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(39, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(40, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(41, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(42, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(43, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(44, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(45, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(46, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(47, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(48, 6, 2, 1, '2012-11-07', '2012-11-14', '0000-00-00', 0),
(49, 1, 1, 1, '2012-11-09', '2012-11-10', '0000-00-00', 0),
(50, 1, 1, 1, '2012-11-09', '2012-11-10', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_queue`
--

CREATE TABLE IF NOT EXISTS `tb_elib_queue` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `amount` int(10) NOT NULL DEFAULT '1',
  `idpegawai` int(10) NOT NULL,
  `booksid` int(10) NOT NULL,
  `queuedate` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_elib_queue`
--

INSERT INTO `tb_elib_queue` (`id`, `amount`, `idpegawai`, `booksid`, `queuedate`, `status`) VALUES
(1, 1, 3, 2, '2012-11-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_userrole`
--

CREATE TABLE IF NOT EXISTS `tb_elib_userrole` (
  `id` int(11) NOT NULL,
  `userrole` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_elib_userrole`
--

INSERT INTO `tb_elib_userrole` (`id`, `userrole`) VALUES
(2, 1),
(3, 2);
