-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2011 at 02:58 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ugs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_khs`
--

CREATE TABLE IF NOT EXISTS `tb_khs` (
  `id_khs` int(11) NOT NULL auto_increment,
  `id_mahasiswa` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `nilai_huruf` varchar(3) NOT NULL,
  `nilai_angka` int(10) NOT NULL,
  `id_semester` int(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY  (`id_khs`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_khs`
--

INSERT INTO `tb_khs` (`id_khs`, `id_mahasiswa`, `id_matkul`, `nilai_huruf`, `nilai_angka`, `id_semester`, `tahun`) VALUES
(1, 6, 1, 'B', 3, 1, 2008),
(2, 6, 10, 'A', 4, 2, 2008),
(3, 6, 3, 'A', 4, 3, 2009),
(4, 6, 5, 'B', 3, 4, 2009);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuliah`
--

CREATE TABLE IF NOT EXISTS `tb_kuliah` (
  `id_kuliah` int(11) NOT NULL auto_increment,
  `id_mahasiswa` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `nilai_huruf` varchar(5) NOT NULL,
  `nilai_angka` int(11) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY  (`id_kuliah`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_kuliah`
--

INSERT INTO `tb_kuliah` (`id_kuliah`, `id_mahasiswa`, `id_matkul`, `nilai_huruf`, `nilai_angka`, `kelas`, `status`) VALUES
(1, 6, 1, 'B', 3, '3', 1),
(2, 6, 2, 'A', 4, '4', 0),
(3, 6, 3, 'A', 4, '2', 1),
(4, 6, 5, 'B', 3, '1', 1),
(5, 6, 10, 'A', 4, '5', 1),
(6, 16, 1, '', 0, '4', 0),
(7, 16, 2, '', 0, '3', 0),
(8, 16, 3, '', 0, '5', 0),
(9, 16, 5, '', 0, '3', 0),
(10, 16, 10, '', 0, '5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `password` varchar(50) default NULL,
  `no_mahasiswa` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `status` varchar(7) NOT NULL default 'user',
  PRIMARY KEY  (`id_mahasiswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `username`, `password`, `no_mahasiswa`, `nama_mahasiswa`, `tgl_lahir`, `alamat`, `gambar`, `status`) VALUES
(1, 'gendut', '89ccfac87d8d06db06bf3211cb2d69ed', '1353', 'Supri Yanto', '2011-05-11', 'jogja', 'gendut.jpg', 'admin'),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1353', 'supriyanto', '2011-05-21', 'Jogja', 'gendut.jpg', 'user'),
(16, 'suryo', 'e10adc3949ba59abbe56e057f20f883e', '2314', 'suryono', '1989-11-12', 'panggang', '', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE IF NOT EXISTS `tb_matkul` (
  `id_matkul` int(11) NOT NULL auto_increment,
  `kode_matkul` varchar(5) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `id_semester` int(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  PRIMARY KEY  (`id_matkul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `id_semester`, `tahun`) VALUES
(1, '3', 'ppkn', 1, 2008),
(2, '1', 'Olah Raga', 2, 2009),
(3, '2', 'Biologi', 3, 2009),
(5, '4', 'geografi', 4, 2009),
(10, '6', 'aku', 2, 2008),
(12, '12', 'bahasa jawa', 1, 2008);

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE IF NOT EXISTS `tb_semester` (
  `id_semester` int(2) NOT NULL auto_increment,
  `nama_semester` varchar(15) NOT NULL,
  PRIMARY KEY  (`id_semester`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `nama_semester`) VALUES
(1, 'Semester I'),
(2, 'Semester II'),
(3, 'Semester III'),
(4, 'Semester IV'),
(5, 'Semester V'),
(6, 'Semester VI'),
(7, 'Semester VII'),
(8, 'Semester VIII'),
(9, 'Semester IX'),
(10, 'Semester X');
