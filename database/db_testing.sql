-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2016 at 09:51 
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_jabatan`
--

CREATE TABLE IF NOT EXISTS `t_jabatan` (
`f_jabatan_id` int(11) NOT NULL,
  `f_jabatan_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `t_jabatan`
--

INSERT INTO `t_jabatan` (`f_jabatan_id`, `f_jabatan_nama`) VALUES
(1, 'Analis'),
(2, 'Direktur'),
(3, 'Manajer'),
(4, 'Operator'),
(5, 'Programmer'),
(6, 'Supervisor'),
(7, 'Teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE IF NOT EXISTS `t_pegawai` (
`f_pegawai_id` int(11) NOT NULL,
  `f_pegawai_kode` varchar(10) NOT NULL,
  `f_pegawai_nama` varchar(50) NOT NULL,
  `f_pegawai_alamat` varchar(100) NOT NULL,
  `f_pegawai_gaji` double NOT NULL,
  `f_pegawai_jk` varchar(30) NOT NULL,
  `f_pegawai_status` varchar(30) NOT NULL,
  `f_jabatan_id` int(40) NOT NULL,
  `f_pegawai_photo` varchar(50) NOT NULL,
  `f_pegawai_date_join` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`f_pegawai_id`, `f_pegawai_kode`, `f_pegawai_nama`, `f_pegawai_alamat`, `f_pegawai_gaji`, `f_pegawai_jk`, `f_pegawai_status`, `f_jabatan_id`, `f_pegawai_photo`, `f_pegawai_date_join`) VALUES
(1, 'PEG0001', 'Andrew Hutauruk', 'Barelang City', 4500000, 'Laki-Laki', 'Menikah', 5, 'PEG0001.jpg', 1410662452),
(2, 'PEG0002', 'Susan Martadinata', 'Nagoya', 2750000, 'Perempuan', 'Lajang', 6, 'PEG0002.jpg', 1410662717),
(3, 'PEG0003', 'Shirley Cauadah', 'Batam Center', 2895000, 'Perempuan', 'Lajang', 6, 'PEG0003.jpg', 1410662779),
(4, 'PEG0004', 'Junita Permata Sari', 'Batu Aji', 2650000, 'Perempuan', 'Lajang', 1, 'PEG0004.jpg', 1410662834),
(5, 'PEG0005', 'Juan Carlos Diognito', 'Batam Center', 4000000, 'Laki-Laki', 'Menikah', 3, 'PEG0005.jpg', 1410663771),
(6, 'PEG0006', 'Seroz Verlonovina', 'Bengkong', 4500000, 'Laki-Laki', 'Menikah', 2, 'PEG0006.jpg', 1410663815),
(7, 'PEG0007', 'Fadli Zion', 'Piayu', 1500000, 'Laki-Laki', 'Menikah', 4, 'PEG0007.jpg', 1410663889),
(8, 'PEG0008', 'Poltak Raja Minyak', 'Batu Aji', 2570000, 'Laki-Laki', 'Menikah', 7, 'PEG0008.jpg', 1410663953),
(9, 'PEG0009', 'Hero Wajik', 'Tanjung Uncang', 2450000, 'Laki-Laki', 'Lajang', 4, 'PEG0009.jpg', 1410664002),
(10, 'PEG0010', 'Frabiwa Harianto', 'Tanjung Uncang', 1545000, 'Laki-Laki', 'Lajang', 4, 'PEG0010.jpg', 1410664095);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
 ADD PRIMARY KEY (`f_jabatan_id`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
 ADD PRIMARY KEY (`f_pegawai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
MODIFY `f_jabatan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
MODIFY `f_pegawai_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
