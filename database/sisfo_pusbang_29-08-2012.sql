-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 29. Agustus 2012 jam 13:34
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
-- Struktur dari tabel `tb_feedback_sarpras`
--

CREATE TABLE IF NOT EXISTS `tb_feedback_sarpras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `1a` text NOT NULL,
  `1b` text NOT NULL,
  `1c` text NOT NULL,
  `1d` text NOT NULL,
  `1e` text NOT NULL,
  `2a` text NOT NULL,
  `2b` text NOT NULL,
  `2c` text NOT NULL,
  `2d` text NOT NULL,
  `2e` text NOT NULL,
  `2f` text NOT NULL,
  `2g` text NOT NULL,
  `2h` text NOT NULL,
  `2i` text NOT NULL,
  `2j` text NOT NULL,
  `2k` text NOT NULL,
  `2l` text NOT NULL,
  `3a` text NOT NULL,
  `3b` text NOT NULL,
  `3c` text NOT NULL,
  `3d` text NOT NULL,
  `3e` text NOT NULL,
  `3f` text NOT NULL,
  `manfaat` text NOT NULL,
  `kelebihan_catering` text NOT NULL,
  `kekurangan_catering` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_feedback_sarpras`
--

INSERT INTO `tb_feedback_sarpras` (`id`, `id_program`, `1a`, `1b`, `1c`, `1d`, `1e`, `2a`, `2b`, `2c`, `2d`, `2e`, `2f`, `2g`, `2h`, `2i`, `2j`, `2k`, `2l`, `3a`, `3b`, `3c`, `3d`, `3e`, `3f`, `manfaat`, `kelebihan_catering`, `kekurangan_catering`, `keterangan`) VALUES
(1, 1, 'Ga tau###Tes aja lah###Jelek', 'Mana ada###sdvbdsvb ds###', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '', '', '', ''),
(2, 1, 'Ga tau###Tes aja lah###Jelek', 'Mana ada###fsdbdf eewfew ewfewf efew few###', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '######', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_history_pelatihan`
--

CREATE TABLE IF NOT EXISTS `tb_history_pelatihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peserta` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info`
--

CREATE TABLE IF NOT EXISTS `tb_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diklat_message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_info`
--

INSERT INTO `tb_info` (`id`, `diklat_message`) VALUES
(1, 'dasvc dsvsdv sdvcsdcfvds');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_instansi`
--

CREATE TABLE IF NOT EXISTS `tb_instansi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kantor` int(11) NOT NULL,
  `nama_singkat` varchar(255) NOT NULL,
  `nama_instansi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tb_instansi`
--

INSERT INTO `tb_instansi` (`id`, `kode_kantor`, `nama_singkat`, `nama_instansi`) VALUES
(1, 101, 'SETJEN', 'SEKRETARIAT JENDERAL'),
(2, 102, 'ITJEN', 'INSPEKTORAT JENDERAL'),
(3, 103, 'DITJEN HUBDAT', 'DIREKTORAT JENDERAL PERHUBUNGAN DARAT'),
(4, 104, 'DITJEN HUBLA', 'DIREKTORAT JENDERAL HUBUNGAN LAUT'),
(5, 105, 'DITJEN HUBUD', 'DIREKTORAT JENDERAL HUBUNGAN UDARA'),
(6, 111, 'DITJEN PERKA', 'DIREKTORAT JENDERAL PERKERETAAIPAN'),
(7, 106, 'BADAN DIKLAT', 'BADAN PENGEMBANGAN SDM PERHUBUNGAN'),
(8, 107, 'BADAN LITBANG', 'BADAN PENELITIAN DAN PENGEMBANGAN'),
(9, 109, 'BADAN SARNAS', 'BADAN SAR NASIONAL');

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
  `jumlah_peserta` int(45) DEFAULT NULL,
  `tempat` text,
  `tahun_program` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
(11, 'Perencanaan Transportasi', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(12, 'Manajemen Legal Drafting', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(13, 'ESQ', 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2012),
(14, 'Tes tes', 9, '', '', '', '', '', '2012-08-16', '2012-08-24', '', '', '', '', 0, '', 2012),
(15, 'dfsgvdf rgergr', 1, '', '', '', '', '', '2012-01-01', '2012-01-01', '0', '', '', '', 0, '', 2012);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
(1, 'Perencanaan', '21232f297a57a5a743894a0e4a801fc3', 1, 'perencanaan/dashboard'),
(2, 'Penyelenggaraan', '21232f297a57a5a743894a0e4a801fc3', 2, 'penyelenggaraan/dashboard'),
(3, 'Sarana & Prasarana', '10c4981bb793e1698a83aea43030a388', 3, 'sarpras/dashboard'),
(4, 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 4, 'administrator/dashboard');

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
  `pendidikan_dn` varchar(45) DEFAULT NULL,
  `pendidikan_ln` varchar(45) DEFAULT NULL,
  `alamat_rumah` text NOT NULL,
  `tlp_rumah` varchar(20) NOT NULL,
  `alamat_kantor` text NOT NULL,
  `tlp_kantor` varchar(20) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_widyaiswara`
--

INSERT INTO `tb_widyaiswara` (`id`, `nama`, `nip`, `tempat_lahir`, `tanggal_lahir`, `pangkat`, `golongan`, `instansi`, `jabatan`, `pendidikan_dn`, `pendidikan_ln`, `alamat_rumah`, `tlp_rumah`, `alamat_kantor`, `tlp_kantor`, `status`) VALUES
(2, 'sdvsd dfds sdfsd', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '1');

CREATE TABLE IF NOT EXISTS `tb_cv_peserta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(60) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `pangkat` varchar(45) DEFAULT NULL,
  `golongan` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `instansi` int(45) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `gelar_akademis` varchar(45) DEFAULT NULL,
  `pendidikan_terakhir` varchar(45) DEFAULT NULL,
  `unit_kerja` varchar(45) DEFAULT NULL,
  `alamat_rumah` text,
  `agama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telepon` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37215 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
