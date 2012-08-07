-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 07. Agustus 2012 jam 09:43
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
-- Struktur dari tabel `tb_cv_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_cv_peserta` (
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar_hadir`
--

CREATE TABLE IF NOT EXISTS `tb_daftar_hadir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_evaluasi_penyelenggaraan`
--

CREATE TABLE IF NOT EXISTS `tb_evaluasi_penyelenggaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(45) DEFAULT NULL,
  `id_program` varchar(45) DEFAULT NULL,
  `eval1` varchar(255) DEFAULT NULL,
  `eval2` varchar(255) DEFAULT NULL,
  `eval3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info`
--

CREATE TABLE IF NOT EXISTS `tb_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diklat_message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `name`, `parent`) VALUES
(1, 'DIKLAT PRAJABATAN', 0),
(2, 'DIKLAT DALAM JABATAN', 0),
(3, 'DIKLAT TEKNIS', 0),
(4, 'Diklat Kepemimpinan', 2),
(5, 'Diklat Fungsional', 2),
(6, 'Diklat Teknis Umum', 3),
(7, 'Diklat Teknis Manajemen', 3),
(8, 'Diklat Fungsional Keahlian', 5),
(9, 'Diklat Teknis Fungsional', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian_kkk`
--

CREATE TABLE IF NOT EXISTS `tb_penilaian_kkk` (
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian_kkol`
--

CREATE TABLE IF NOT EXISTS `tb_penilaian_kkol` (
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian_kkp`
--

CREATE TABLE IF NOT EXISTS `tb_penilaian_kkp` (
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian_sikap_perilaku`
--

CREATE TABLE IF NOT EXISTS `tb_penilaian_sikap_perilaku` (
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_peserta` (
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_program`
--

CREATE TABLE IF NOT EXISTS `tb_program` (
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
  `tahun_program` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `tb_program`
--

INSERT INTO `tb_program` (`id`, `name`, `parent`, `deskripsi`, `tujuan`, `indikator`, `pelaksanaan`, `lama_pendidikan`, `tanggal_mulai`, `tanggal_akhir`, `persyaratan`, `materi`, `pelaksana`, `fasilitator`, `jumlah_peserta`, `tempat`, `tahun_program`) VALUES
(1, 'DIklat Prajabatan Tkt. I', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(2, 'DIklat Prajabatan Tkt. II', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(3, 'Diklat Prajabatan Tkt. III', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(4, 'Analisis Kepegawaian', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(5, 'Arsiparis', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(6, 'Training of Trainer', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(7, 'Management of Training', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(8, 'Diklat Kepemimpinan Tkt IV', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(9, 'Diklat Kepemimpinan Tkt. III', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(10, 'Keselamatan Transportasi', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(11, 'Perencanaan Transportasi', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(12, 'Manajemen Legal Drafting', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(13, 'ESQ', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_registrasi`
--

CREATE TABLE IF NOT EXISTS `tb_registrasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) DEFAULT NULL,
  `id_peserta` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_schedule`
--

CREATE TABLE IF NOT EXISTS `tb_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) DEFAULT NULL,
  `id_widyaiswara` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `materi` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sociograph`
--

CREATE TABLE IF NOT EXISTS `tb_sociograph` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(45) DEFAULT NULL,
  `rank1` int(11) DEFAULT NULL,
  `rank2` int(11) DEFAULT NULL,
  `rank3` int(11) DEFAULT NULL,
  `rank4` int(11) DEFAULT NULL,
  `rank5` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `password`, `role`, `link`) VALUES
(1, 'Perencanaan', '21232f297a57a5a743894a0e4a801fc3', 1, 'simdik/perencanaan'),
(2, 'Penyelenggaraan', '10c4981bb793e1698a83aea43030a388', 2, 'simdik/penyelenggaraan'),
(3, 'Sarana & Prasarana', '10c4981bb793e1698a83aea43030a388', 3, 'simdik/sarpras'),
(4, 'Administrator', '10c4981bb793e1698a83aea43030a388', 4, 'simdik/administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_widyaiswara`
--

CREATE TABLE IF NOT EXISTS `tb_widyaiswara` (
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
