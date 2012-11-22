-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 22. Nopember 2012 jam 03:11
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
-- Struktur dari tabel `tb_about`
--

CREATE TABLE IF NOT EXISTS `tb_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tb_about`
--

INSERT INTO `tb_about` (`id`, `judul`, `isi`, `waktu`, `tanggal`) VALUES
(1, 'Sekilas Tentang Pusbang', '<p>Pembangunan Pusat Pengembangan SDM Aparatur Perhubungan Kementerian Perhubungan diresmikan oleh Menteri Perhubungan Bapak Agum Gumelar , M.Sc pada tanggal 21 Januari 2004. Pada tahun 2005, dibentuklah unit kerja baru yang diberi nama Pusat Pendidikan dan Pelatihan Aparatur Perhubungan Berdasarkan Keputusan Menteri Perhubungan No. KM 62 Tahun 2005tentang Oganisasi dan Tata Kerja Departemen Perhubungan, Pusdiklat Aparatur Perhubungan merupakan salah satu unit kerja di bawah Badan Pendidikan dan Pelatihan Perhubungan yang mempunyai tugas menyelenggarakan pendidikan dan pelatihan bagi aparatur perhubungan.</p>\r\n<p>Sesuai dengan Keputusan Menteri Perhubungan Nomor KM 60 Tahun 2010 tanggal 5 Nopember 2010 tentang Organisasi dan Tata Kerja Kementerian Perhubungan Pusdiklat Aparatur Perhubungan mengalami perubahan nomenklatur menjadi Pusat Pengembangan Sumber Daya Manusia Aparatur Perhubungan .</p>\r\n<p>Pusat Pengembangan Sumber Daya Manusia Aparatur Perhubungan (Pusbang SDM Aparatur Perhubungan) dipimpin oleh seorang Kepala ( eselon II.A ) yang membawahi tiga Kepala Bidang dan satu Kepala Bagian ( eselon III.A ) dan enam Kepala Sub. Bidang dan dua Kepala Sub. Bagian ( eselon IV.A )</p>\r\n<p>Pusbang SDM Aparatur Perhubungan berlokasi di Jl. Raya Parung Bogor KM 26,4 Bogor (16310) ProvinsiJawa Barat dan menempati area dengan luas sebesar &plusmn;10,2 Ha.</p>', '08:02:54', '2012-11-22'),
(2, 'Visi dan Misi', '<ul><strong>Visi</strong><br><br>\r\n<p>Terwujudnya Institusi Pusat Pengembangan Sumber Daya Manusia Aparatur Perhubungan yang Unggul dan Akuntabel dalam rangka menghasilkan Sumber Daya Manusia Aparatur Perhubungan yang kompeten dan beretika.</p></ul>\r\n    <hr />\r\n\r\n<ul><strong>Misi</strong><br>\r\n<br>\r\n<li>Meningkatkan kualitas Sumber Daya Manusia dan Sarana dan Prasarana Pusat Pengembangan Sumber Daya Manusia Aparatur  Perhubungan.</li><br>\r\n<li>Memberikan pelayanan prima kepada peserta pendidikan dan pelatihan.\r\n</li><br>\r\n<li>Menyelenggarakan dan mengembangkan pendidikan dan pelatihan yang proporsional dan profesional.\r\n</li> <br>\r\n<li>Menyelenggarakan pengkajian pengembangan Sumber Daya Manusia Aparatur Perhubungan.\r\n</li><br>\r\n<li>Meningkatkan kerjasama pengembangan Sumber Daya Manusia Aparatur Perhubungan.\r\n</li><br>\r\n\r\n</ul>', '08:04:24', '2012-11-22'),
(3, 'Kontak', '<table>\r\n    <tr>\r\n	<td><img src="assets/img/contact.png" /></td>\r\n	<td>\r\n	    <h3>PUSAT PENGEMBANGAN SDM APARATUR PERHUBUNGAN</h3>\r\n	    <p>\r\n		JALAN RAYA PARUNG KM.26 BOGOR <br />\r\n		TELP. (0251) 7540092 FAX (0251) 7540191 <br />\r\n		SMS CENTER : 085312376937\r\n	    </p>\r\n	</td>\r\n    </tr>\r\n    <tr>\r\n	<td colspan="2">\r\n	    <i class="icon-envelope"></i> : ppsdm.aparatur@bpsdm.dephub.go.id <br />\r\n	    <i class="icon-home"></i> : http://pap.diklat.dephub.go.id\r\n	</td>\r\n    </tr>\r\n</table>', '08:04:24', '2012-11-22'),
(4, 'Struktur Organisasi', '<img src="assets/img/struktur.png" />', '08:04:55', '2012-11-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
