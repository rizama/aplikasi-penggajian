-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2016 at 04:58 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbpenggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `aktif`) VALUES
(7, 'IT Developer Programmer', 'Y'),
(6, 'HRD', 'Y'),
(5, 'Accounting', 'Y'),
(4, 'Keuangan', 'Y'),
(2, 'Manager', 'Y'),
(3, 'Sekretaris', 'Y'),
(1, 'Direktur', 'Y'),
(8, 'IT Support', 'Y'),
(9, 'Cutting', 'Y'),
(10, 'Produksi', 'Y'),
(11, 'Perbantuan', 'Y'),
(12, 'Gudang', 'Y'),
(14, 'Finishing', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jabatan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `id_jabatan`, `nama`, `alamat`, `no_telp`, `jk`, `tempat_lahir`, `tgl_lahir`, `email`, `pendidikan`) VALUES
(8, 9, 'Ahmad Munajat', 'Jl. Suryakencana No. 101', '085659120912', 'L', 'Sukabumi', '1984-09-10', 'ahmad.munajat@yahoo.com', 'D3'),
(7, 5, 'Siti Nurani', 'Jl. Pajagalan No. 11', '0812090922', 'P', 'SUkabumi', '1991-11-05', 'siti.nurani@gmail.com', 'D3'),
(5, 3, 'Wulandari', 'Jl. Ahmad Yani No. 11', '0811209091212', 'P', 'Sukabumi', '1991-09-01', 'wulandari@yahoo.com', 'S1'),
(6, 6, 'Fitri Anggraeni', 'Jl. Pangleseran RT/RW 12/01 Kp. Citarum', '087709128800', 'P', 'Sukabumi', '1992-09-10', 'sry.fitriani@gmail.com', 'S2'),
(1, 1, 'Yenda Purbadian', 'Jl. Cikini Stones Complex No. 101', '085659543844', 'L', 'Ciamis', '2015-08-23', 'virus.piss@ymail.com', 'S3'),
(2, 2, 'Iman', 'Jl. Pajagalan', '081209091212', 'L', 'Sukanumi', '2015-08-26', 'iman@yahoo.com', 'S1'),
(3, 9, 'Syarif Hidayatullah', 'Jl. Cikini No. 12', '081209091212', 'L', 'Sukabumi', '1990-09-01', 'syarif.hidayatullah@gmail.com', 'SMA/SMK'),
(4, 8, 'M. Idris Firdaus', 'Jl. Mawar Selatan No. 201', '087812097766', 'L', 'Bandung', '1980-02-01', 'idris.firdaus@gmail.com', 'S1'),
(9, 4, 'Saepul Anwar', 'Jl. Pojok No. 10', '081209128989', 'L', 'Sukabumi', '1990-09-10', 'saep.an.war@yahoo.com', 'D3'),
(12, 8, 'M. Saepul Alam', 'Jl. Ciaul No. 101 Kp. Cikereteg RT/RW 12/03 Desa Cikereteg Kota Sukabumi', '081209221209', 'L', 'Sukabumi', '1976-01-21', 'saepul_alam@yahoo.com', 'S1'),
(13, 4, 'Fitriyani', 'Jl. Mawar No. 2 ', '087792778912', 'P', 'Sukabumi', '1989-02-14', 'fitriyani@yahoo.com', 'S1'),
(14, 5, 'Sry Fitryani', 'Jl. Bhayangkara Timur No. 101', '087812096667', 'P', 'Sukabumi', '1988-10-01', 'sry.fitryani@yahoo.com', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `uri` varchar(200) DEFAULT NULL,
  `id_menu_induk` int(11) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `uri`, `id_menu_induk`, `urutan`, `aktif`) VALUES
(1, 'Data Master', '#', 0, 1, 'Y'),
(2, 'Transaksi', '#', 0, 2, 'Y'),
(3, 'Laporan', '#', 0, 3, 'Y'),
(4, 'Back Office', '#', 0, 4, 'Y'),
(5, 'Perkiraan', '/master_data/perkiraan', 1, 5, 'Y'),
(6, 'Jabatan', '/master_data/jabatan', 1, 6, 'Y'),
(7, 'Karyawan', '/master_data/karyawan', 1, 7, 'Y'),
(8, 'Penggajian', '/transaksi/penggajian', 2, 8, 'Y'),
(9, 'Rekap Gaji Karyawan', '/laporan/rekap_gaji_karyawan', 3, 9, 'Y'),
(10, 'Rincian Gaji Karyawan', '/laporan/rincian_gaji_karyawan', 3, 10, 'Y'),
(11, 'Manajemen Menu', '/back_office/manajemen_menu', 4, 11, 'Y'),
(12, 'Pengguna Grup', '/back_office/pengguna_grup', 4, 12, 'Y'),
(13, 'Pengguna', '/back_office/pengguna', 4, 13, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `menu_akses`
--

CREATE TABLE IF NOT EXISTS `menu_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_pengguna_grup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `menu_akses`
--

INSERT INTO `menu_akses` (`id`, `id_menu`, `id_pengguna_grup`) VALUES
(65, 1, 1),
(66, 5, 1),
(67, 6, 1),
(68, 7, 1),
(69, 2, 1),
(70, 8, 1),
(71, 3, 1),
(72, 9, 1),
(73, 10, 1),
(74, 4, 1),
(75, 11, 1),
(76, 12, 1),
(77, 13, 1),
(96, 1, 10),
(97, 5, 10),
(98, 6, 10),
(99, 7, 10),
(100, 10, 10),
(101, 4, 10),
(102, 11, 10),
(103, 12, 10),
(104, 13, 10),
(105, 1, 11),
(106, 5, 11),
(107, 6, 11),
(108, 7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna_grup` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `id_pengguna_grup`, `username`, `password`, `nama`, `foto`, `blokir`) VALUES
(1, 1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Yenda Purbadian', 'yenda_purbadian.jpg', 'N'),
(3, 10, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'administrator.jpg', 'N'),
(6, 11, 'marketing', '5be9a68073f66a56554e25614e9f1c9a', 'Iman Nasution', '621435_516269068386099_1999885273_o.jpg', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_grup`
--

CREATE TABLE IF NOT EXISTS `pengguna_grup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pengguna_grup`
--

INSERT INTO `pengguna_grup` (`id`, `nama`) VALUES
(11, 'Marketing'),
(10, 'admin'),
(1, 'Superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `perkiraan`
--

CREATE TABLE IF NOT EXISTS `perkiraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `perkiraan`
--

INSERT INTO `perkiraan` (`id`, `kode`, `nama`, `aktif`, `status`) VALUES
(1, '001', 'Gaji Pokok', 'Y', '1'),
(2, '002', 'Lembur', 'Y', '1'),
(3, '003', 'Uang Makan', 'Y', '1'),
(4, '004', 'Uang Transport', 'Y', '1'),
(5, '005', 'Tunjangan Keluarga', 'Y', '1'),
(6, '006', 'Tunjangan Kesehatan', 'Y', '1'),
(7, '007', 'THR', 'Y', '1'),
(8, '008', 'Bonus', 'Y', '1'),
(9, '101', 'Pajak', 'Y', '0'),
(10, '102', 'Koperasi', 'Y', '0'),
(11, '103', 'Utang Pinjam', 'Y', '0'),
(14, '104', 'Asuransi Jiwa', 'Y', '0'),
(15, '105', 'Jamsostek', 'Y', '0');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `kode_pos` varchar(25) DEFAULT NULL,
  `no_telp` varchar(25) DEFAULT NULL,
  `fax` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `alamat`, `kode_pos`, `no_telp`, `fax`, `email`) VALUES
(1, 'PT. Purbadian Software Solution', 'Jl. Cikini Stones Complex No. 10 Matraman Jakarta Timur', '212109', '(021)21210909', '091209021', 'purbadian.mail@purbadian.com');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_transaksi_gaji`
--

CREATE TABLE IF NOT EXISTS `rincian_transaksi_gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi_gaji` int(11) NOT NULL,
  `id_perkiraan` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `rincian_transaksi_gaji`
--

INSERT INTO `rincian_transaksi_gaji` (`id`, `id_transaksi_gaji`, `id_perkiraan`, `jumlah`) VALUES
(137, 1602290006, 14, 100000),
(136, 1602290006, 9, 200000),
(135, 1602290006, 4, 400000),
(134, 1602290006, 3, 300000),
(133, 1602290006, 1, 3000000),
(132, 1602150005, 15, 150000),
(131, 1602150005, 9, 350000),
(130, 1602150005, 6, 350000),
(129, 1602150005, 4, 100000),
(128, 1602150005, 3, 100000),
(127, 1602150005, 2, 200000),
(126, 1602150005, 1, 2000000),
(125, 1601250004, 11, 300000),
(124, 1601250004, 10, 150000),
(123, 1601250004, 9, 350000),
(122, 1601250004, 8, 375000),
(121, 1601250004, 7, 2000000),
(120, 1601250004, 6, 100000),
(119, 1601250004, 5, 175000),
(118, 1601250004, 4, 150000),
(117, 1601250004, 3, 300000),
(116, 1601250004, 2, 200000),
(115, 1601250004, 1, 2000000),
(114, 1601120003, 15, 250000),
(113, 1601120003, 14, 250000),
(112, 1601120003, 9, 750000),
(111, 1601120003, 6, 1000000),
(110, 1601120003, 5, 1000000),
(109, 1601120003, 4, 1000000),
(108, 1601120003, 3, 500000),
(107, 1601120003, 1, 5000000),
(106, 1601120002, 15, 200000),
(105, 1601120002, 14, 200000),
(104, 1601120002, 9, 500000),
(103, 1601120002, 6, 500000),
(102, 1601120002, 5, 500000),
(101, 1601120002, 4, 350000),
(100, 1601120002, 3, 350000),
(99, 1601120002, 1, 4000000),
(98, 1512180001, 15, 150000),
(97, 1512180001, 14, 200000),
(96, 1512180001, 10, 125000),
(95, 1512180001, 9, 350000),
(94, 1512180001, 6, 350000),
(93, 1512180001, 5, 500000),
(92, 1512180001, 4, 2000000),
(91, 1512180001, 3, 125000),
(90, 1512180001, 2, 2000000),
(89, 1512180001, 1, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_gaji`
--

CREATE TABLE IF NOT EXISTS `transaksi_gaji` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `pendapatan` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `gaji_bersih` int(11) NOT NULL,
  `waktu_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_pengguna_input` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_gaji`
--

INSERT INTO `transaksi_gaji` (`id`, `id_karyawan`, `tgl_gaji`, `pendapatan`, `potongan`, `gaji_bersih`, `waktu_input`, `id_pengguna_input`) VALUES
(1602290006, 13, '2016-02-29', 3700000, 300000, 3400000, '2016-02-29 06:26:32', 1),
(1602150005, 8, '2016-02-15', 2750000, 500000, 2250000, '2016-02-15 18:10:00', 1),
(1601250004, 4, '2016-01-25', 5300000, 800000, 4500000, '2016-01-25 20:02:04', 1),
(1601120003, 2, '2016-01-12', 8500000, 1250000, 7250000, '2016-01-12 17:07:26', 3),
(1601120002, 9, '2016-01-12', 5700000, 900000, 4800000, '2016-01-12 17:06:10', 3),
(1512180001, 1, '2015-12-18', 9975000, 825000, 9150000, '2015-12-18 16:43:38', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
