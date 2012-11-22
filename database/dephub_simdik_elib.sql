-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2012 at 01:41 PM
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
DROP TABLE IF EXISTS `tb_elib_author`, `tb_elib_bibliography`, `tb_elib_books`, `tb_elib_category`, `tb_elib_filetype`, `tb_elib_loan`, `tb_elib_post`, `tb_elib_queue`, `tb_elib_userrole`;

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
  `location` text NOT NULL,
  `digital` int(6) NOT NULL,
  `keterangan` text NOT NULL,
  `tags` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_elib_books`
--

INSERT INTO `tb_elib_books` (`id`, `title`, `idauthor`, `edition`, `idcategory`, `frequency`, `issnisbn`, `publisher`, `publisherplace`, `publisheryear`, `stock`, `location`, `digital`, `keterangan`, `tags`) VALUES
(1, 'coupling', 3, 1, 4, 0, 2147483647, 'Galamedia', 'Jakarta', 1995, 3, '', 40, 'Buku ini ada digitalnya', 'fisika'),
(2, 'Buku dummy majalah', 1, 1, 3, 1, 1241241245, 'Galamedia', 'Jakarta', 1993, 3, '', 0, 'keterangan 1 ada ', ''),
(3, 'buku 3', 1, 1, 1, 2, 3232, 'Gramedia', 'Bandung', 0, 2, '', 0, 'qwe', ' wqe'),
(4, 'buku 4', 1, 1, 1, 2, 3232, 'Gramedia', 'Bandung', 0, 2, '', 0, 'qwe', ' wqe'),
(5, 'buku 5', 1, 1, 1, 2, 3232, 'Gramedia', 'Bandung', 0, 2, '', 0, 'qwe', ' wqe'),
(6, 'Berita dan Tinjauan Ekonomi Amerika', 6, 1, 1, 1, 3123, 'Galaumedia', 'Jakarta', 0, 2, '', 0, 'Keterangan', 'keyword '),
(7, 'Berita dan Tinjauan Ekonomi Amerika', 6, 1, 1, 1, 3123, 'Galaumedia', 'Jakarta', 0, 2, '', 0, 'Keterangan', 'keyword ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_category`
--

CREATE TABLE IF NOT EXISTS `tb_elib_category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(20) NOT NULL,
  PRIMARY KEY (`idcategory`),
  UNIQUE KEY `categoryname` (`categoryname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_elib_category`
--

INSERT INTO `tb_elib_category` (`idcategory`, `categoryname`) VALUES
(1, 'kategori 1 Jembatan'),
(3, 'kategori 3'),
(4, 'kategori 4'),
(5, 'kategori 5'),
(6, 'kategori 6'),
(7, 'kategori 7'),
(9, 'kategori 8 Jalan Tol'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `tb_elib_loan`
--

INSERT INTO `tb_elib_loan` (`id`, `idpegawai`, `booksid`, `amount`, `loandate`, `duedate`, `returndate`, `idqueue`) VALUES
(1, 5, 2, 1, '2012-11-08', '0000-00-00', '2012-11-13', 0),
(3, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(4, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(5, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(6, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-13', 0),
(7, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(8, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(9, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(10, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(11, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(12, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(13, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(14, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(15, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(16, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(17, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(18, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(19, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(20, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(21, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(22, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(23, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(24, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(25, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(26, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(27, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(28, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(29, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(30, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(31, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(32, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(33, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(34, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(35, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(36, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(37, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(38, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(39, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(40, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(41, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(42, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(43, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(44, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(45, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(46, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(47, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(48, 6, 2, 1, '2012-11-07', '2012-11-14', '2012-11-15', 0),
(49, 1, 1, 1, '2012-11-09', '2012-11-10', '2012-11-15', 0),
(50, 1, 1, 1, '2012-11-09', '2012-11-10', '0000-00-00', 0),
(51, 1, 3, 1, '0000-00-00', '0000-00-00', '2012-11-17', 0),
(52, 1, 2, 1, '2012-11-08', '2012-11-12', '2012-11-17', 1),
(53, 1, 5, 2, '2012-11-15', '2012-11-23', '2012-11-15', 0),
(54, 1, 3, 1, '2012-11-17', '2012-11-24', '2012-11-17', 0),
(55, 4, 3, 1, '2012-11-17', '2012-11-24', '2012-11-17', 7),
(56, 1, 3, 1, '2012-11-17', '2012-11-24', '2012-11-17', 0),
(57, 1, 3, 1, '2012-11-17', '2012-11-24', '2012-11-17', 0),
(58, 1, 3, 1, '2012-11-17', '2012-11-24', '2012-11-17', 0),
(59, 1, 3, 1, '2012-11-17', '2012-11-24', '2012-11-17', 0),
(60, 1, 3, 1, '2012-11-17', '2012-11-24', '2012-11-17', 0),
(61, 1, 3, 1, '2012-11-17', '2012-11-24', '2012-11-17', 0),
(62, 1, 2, 1, '2012-11-17', '2012-11-24', '0000-00-00', 0),
(63, 1, 3, 1, '2012-11-17', '2012-11-24', '0000-00-00', 0),
(64, 1, 3, 1, '2012-11-20', '2012-11-27', '0000-00-00', 0),
(65, 1, 4, 2, '2012-11-22', '2012-11-29', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_elib_post`
--

CREATE TABLE IF NOT EXISTS `tb_elib_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `posterid` int(11) NOT NULL,
  `modifierid` int(2) NOT NULL,
  `creationdate` date NOT NULL,
  `modifieddate` date NOT NULL,
  `status` int(2) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_elib_post`
--

INSERT INTO `tb_elib_post` (`id`, `title`, `posterid`, `modifierid`, `creationdate`, `modifieddate`, `status`, `content`) VALUES
(8, 'Informasi', 4, 4, '2012-11-22', '2012-11-22', 1, '<p>Perpustakaan adalah tempat untuk mencari ilmu.</p>'),
(9, 'Perpustakaan', 4, 4, '2012-11-22', '2012-11-22', 2, '<p>Dalam arti tradisional,&nbsp;<strong>perpustakaan</strong>&nbsp;adalah sebuah koleksi&nbsp;<a title="Buku" href="http://id.wikipedia.org/wiki/Buku">buku</a>&nbsp;dan majalah. Walaupun dapat diartikan sebagai koleksi pribadi perseorangan, namun perpustakaan lebih umum dikenal sebagai sebuah koleksi besar yang dibiayai dan dioperasikan oleh sebuah kota atau institusi, dan dimanfaatkan oleh masyarakat yang rata-rata tidak mampu membeli sekian banyak buku atas biaya sendiri.</p>\r\n<p>Tetapi, dengan koleksi dan penemuan media baru selain buku untuk menyimpan informasi, banyak perpustakaan kini juga merupakan tempat penimpanan dan/atau akses ke&nbsp;<a class="new" title="Map (halaman belum tersedia)" href="http://id.wikipedia.org/w/index.php?title=Map&action=edit&redlink=1">map</a>,&nbsp;<a class="new" title="Cetak (seni) (halaman belum tersedia)" href="http://id.wikipedia.org/w/index.php?title=Cetak_(seni)&action=edit&redlink=1">cetak</a>&nbsp;atau&nbsp;<a class="new" title="Hasil seni (halaman belum tersedia)" href="http://id.wikipedia.org/w/index.php?title=Hasil_seni&action=edit&redlink=1">hasil seni</a>&nbsp;lainnya,&nbsp;<a title="Mikrofilm" href="http://id.wikipedia.org/wiki/Mikrofilm">mikrofilm</a>,&nbsp;<a class="mw-redirect" title="Mikrofiche" href="http://id.wikipedia.org/wiki/Mikrofiche">mikrofiche</a>,&nbsp;<a class="new" title="Tape audio (halaman belum tersedia)" href="http://id.wikipedia.org/w/index.php?title=Tape_audio&action=edit&redlink=1">tape audio</a>,&nbsp;<a title="CD" href="http://id.wikipedia.org/wiki/CD">CD</a>,&nbsp;<a class="new" title="Rekaman vinyl (halaman belum tersedia)" href="http://id.wikipedia.org/w/index.php?title=Rekaman_vinyl&action=edit&redlink=1">LP</a>,&nbsp;<a class="new" title="Tape video (halaman belum tersedia)" href="http://id.wikipedia.org/w/index.php?title=Tape_video&action=edit&redlink=1">tape video</a>&nbsp;dan<a title="DVD" href="http://id.wikipedia.org/wiki/DVD">DVD</a>, dan menyediakan fasilitas umum untuk mengakses gudang data&nbsp;<a title="CD-ROM" href="http://id.wikipedia.org/wiki/CD-ROM">CD-ROM</a>&nbsp;dan&nbsp;<a title="Internet" href="http://id.wikipedia.org/wiki/Internet">internet</a>.</p>');

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
  `availabledate` date NOT NULL DEFAULT '0000-00-00',
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_elib_queue`
--

INSERT INTO `tb_elib_queue` (`id`, `amount`, `idpegawai`, `booksid`, `queuedate`, `availabledate`, `status`) VALUES
(1, 1, 3, 2, '2012-11-08', '0000-00-00', 3),
(2, 2, 0, 3, '2012-11-14', '0000-00-00', 3),
(3, 1, 4, 3, '2012-11-14', '0000-00-00', 3),
(4, 1, 4, 3, '2012-11-14', '0000-00-00', 3),
(5, 1, 0, 3, '2012-11-14', '0000-00-00', 3),
(6, 1, 1, 2, '2012-11-15', '0000-00-00', 3),
(7, 1, 4, 3, '2012-11-17', '2012-11-17', 3),
(8, 1, 4, 3, '2012-11-17', '2012-11-17', 3),
(9, 1, 4, 4, '2012-11-22', '0000-00-00', 0),
(10, 1, 4, 4, '2012-11-22', '0000-00-00', 0);

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
(3, 2),
(4, 1),
(6, 1);
