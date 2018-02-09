-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2017 at 12:22 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ejpc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('143cdeedb8d1dac9cfe3a580637453879d8e677d', '::1', 1507976121, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373937353832313b),
('0dba552ec86b92388af9e832115cd8ab5b7bb608', '::1', 1507976361, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373937363134363b757365726e616d657c733a343a22617a697a223b7573657269647c733a313a2232223b756e69747c4e3b6e616d617c733a31373a2235202d204d20417a697a204d75736c696d223b6c6f67696e73746174657c693a313b6c6576656c7c733a313a2232223b74696d657c733a31393a22323031372d31302d31342031343a35373a3135223b),
('5c002eeafcf764cc1afd8fbd2a99ac2faf32acee', '::1', 1507976524, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373937363531393b757365726e616d657c733a343a22617a697a223b7573657269647c733a313a2232223b756e69747c4e3b6e616d617c733a31373a2235202d204d20417a697a204d75736c696d223b6c6f67696e73746174657c693a313b6c6576656c7c733a313a2232223b74696d657c733a31393a22323031372d31302d31342031343a35373a3135223b);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`, `keterangan`, `created_date`, `updated_date`) VALUES
(2, 'SA', '-', '0000-00-00', '0000-00-00'),
(3, 'Foreman', '-', '0000-00-00', '0000-00-00'),
(4, 'Leader', '-', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id_orders` int(15) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `jam_awal` varchar(10) NOT NULL,
  `jam_akhir` varchar(10) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `type_kendaraan` varchar(100) DEFAULT NULL,
  `no_polisi` varchar(15) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `stnk` varchar(25) DEFAULT NULL,
  `barang_berharga` varchar(100) DEFAULT NULL,
  `keterangan_bb` text,
  `carwash` varchar(6) DEFAULT NULL,
  `id_pegawai` varchar(15) DEFAULT NULL,
  `status` int(4) DEFAULT NULL,
  `keterangan_status` varchar(100) DEFAULT NULL,
  `job_on_hold` varchar(100) DEFAULT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL,
  `nama_teknisi` text NOT NULL,
  `nama_foreman` text NOT NULL,
  `id_teknisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_jabatan`, `nama_pegawai`, `keterangan`, `created_date`, `updated_date`) VALUES
(5, 2, 'M Aziz Muslim', '-', '0000-00-00', '0000-00-00'),
(6, 2, 'Cahyana', '-', '0000-00-00', '0000-00-00'),
(7, 2, 'M. Fajri Al Ansari', '-', '0000-00-00', '0000-00-00'),
(8, 2, 'Eki M', '-', '0000-00-00', '0000-00-00'),
(9, 2, 'Asep Amar', '-', '0000-00-00', '0000-00-00'),
(10, 2, 'Dadi Gunadi', '', '0000-00-00', '0000-00-00'),
(11, 2, 'Heru Prasetyo', '-', '0000-00-00', '0000-00-00'),
(12, 3, 'Soni', '-', '0000-00-00', '0000-00-00'),
(13, 3, 'Cahyo', '', '0000-00-00', '0000-00-00'),
(14, 3, 'Adjat', '', '0000-00-00', '0000-00-00'),
(15, 3, 'Najib', '', '0000-00-00', '0000-00-00'),
(16, 3, 'Alam', '-', '0000-00-00', '0000-00-00'),
(17, 3, 'Eko A.W', '', '0000-00-00', '0000-00-00'),
(18, 3, 'Firman', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teknisi`
--

CREATE TABLE `tbl_teknisi` (
  `id_teknisi` int(11) NOT NULL,
  `id_foreman` varchar(11) NOT NULL,
  `nama_foreman` varchar(255) NOT NULL,
  `nama_teknisi` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teknisi`
--

INSERT INTO `tbl_teknisi` (`id_teknisi`, `id_foreman`, `nama_foreman`, `nama_teknisi`, `keterangan`, `status`) VALUES
(1, '9', 'Soni', 'Yogi', 'teknisi', 1),
(2, '9', 'Soni', 'Heri', 'teknisi', 0),
(3, '9', 'Soni', 'Candra', 'teknisi', 0),
(4, '10', 'Cahyo', 'Ardita', 'teknisi', 0),
(5, '10', 'Cahyo', 'Rossi', 'teknisi', 0),
(6, '10', 'Cahyo', 'Iva', 'teknisi', 0),
(7, '11', 'Adjat', 'Miftachurahman', 'teknisi', 0),
(8, '11', 'Adjat', 'Turisno', 'teknisi', 0),
(9, '11', 'Adjat', 'Yana', 'teknisi', 0),
(10, '12', 'Najib', 'David', 'teknisi', 0),
(11, '12', 'Najib', 'Engkos', 'teknisi', 0),
(12, '12', 'Najib', 'Arifin', 'teknisi', 0),
(13, '13', 'Alam', 'Deni', 'teknisi', 0),
(14, '13', 'Alam', 'MD Soekarna', 'teknisi', 0),
(15, '13', 'Alam', 'Slamet', 'teknisi', 0),
(16, '14', 'Eko A.W', 'Dodi', 'teknisi', 0),
(17, '14', 'Eko A.W', 'Aris', 'teknisi', 0),
(18, '14', 'Eko A.W', 'Deni', 'teknisi', 0),
(19, '15', 'Firman', 'Singgih', 'teknisi', 0),
(20, '15', 'Firman', 'Cepi', 'teknisi', 0),
(21, '15', 'Firman', 'Ade Muklis', 'teknisi', 0),
(22, '15', 'Firman', 'Dimas Z', 'teknisi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL,
  `kat_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `icon`, `link`, `kat_menu`) VALUES
(1, 'Data Master', 'fa fa-cubes', '#', 0),
(2, 'Master Pegawai', 'fa fa-cube', 'pegawai', 1),
(5, 'Master Jabatan', 'fa fa-cube', 'jabatan', 1),
(7, 'Antrian', 'fa fa-list', 'antrian', 0),
(8, 'List Workorder', 'fa fa-list', 'workorder', 0),
(9, 'Input Workorder', 'fa fa-cart-plus', 'workorder/add', 0),
(10, 'Monitoring', 'fa fa-laptop', 'monitoring', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_user`
--

CREATE TABLE `tb_menu_user` (
  `id_menu_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu_user`
--

INSERT INTO `tb_menu_user` (`id_menu_user`, `id_menu`, `id_user`) VALUES
(5, 1, 15),
(6, 7, 15),
(7, 9, 15),
(8, 8, 16),
(9, 1, 17),
(10, 7, 17),
(11, 8, 17),
(12, 9, 17),
(13, 10, 17),
(14, 1, 2),
(15, 7, 2),
(16, 9, 2),
(17, 10, 2),
(18, 1, 3),
(19, 7, 3),
(20, 9, 3),
(21, 10, 3),
(22, 1, 4),
(23, 7, 4),
(24, 9, 4),
(25, 10, 4),
(26, 1, 5),
(27, 7, 5),
(28, 9, 5),
(29, 10, 5),
(30, 1, 6),
(31, 7, 6),
(32, 9, 6),
(33, 10, 6),
(34, 1, 7),
(35, 7, 7),
(36, 9, 7),
(37, 10, 7),
(38, 1, 8),
(39, 7, 8),
(40, 9, 8),
(41, 10, 8),
(42, 8, 9),
(43, 8, 10),
(44, 8, 11),
(45, 8, 12),
(46, 8, 13),
(47, 8, 14),
(48, 8, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` datetime NOT NULL,
  `isEdit` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id_user`, `nama`, `jabatan`, `username`, `password`, `level`, `keterangan`, `created_time`, `updated_time`, `isEdit`) VALUES
(1, 'admin', '-', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '2015-06-29 02:16:00', '2016-12-29 22:59:59', 0),
(3, '6 - Cahyana', '', 'cahyana', 'dd05208bb50af0afc1b732c45cde1b50', 2, '', '2017-10-14 14:57:38', '2017-10-14 14:57:38', 0),
(4, '7 - M. Fajri Al Ansari', '', 'fajri', '437eb04136c59d226f14527f52726341', 2, '', '2017-10-14 14:58:11', '2017-10-14 14:58:11', 0),
(5, '8 - Eki M', '', 'eki', 'daed6ec547a88a5780ace966202b206e', 2, '', '2017-10-14 14:58:30', '2017-10-14 14:58:30', 0),
(2, '5 - M Aziz Muslim', '', 'aziz', 'b85dc795ba17cb243ab156f8c52124e1', 2, '', '2017-10-14 14:57:15', '2017-10-14 14:57:15', 0),
(6, '9 - Asep Amar', '', 'asep', 'dc855efb0dc7476760afaa1b281665f1', 2, '', '2017-10-14 14:58:48', '2017-10-14 14:58:48', 0),
(7, '10 - Dadi Gunadi', '', 'dadi', '11cce4cbc871796013fa495b82ff98a6', 2, '', '2017-10-14 14:59:20', '2017-10-14 14:59:20', 0),
(8, '11 - Heru Prasetyo', '', 'heru', 'a648ab9a3e32c5f3f6e9ddbd41c0530f', 2, '', '2017-10-14 14:59:39', '2017-10-14 14:59:39', 0),
(9, '12 - Soni', '', 'soni', '3331e8d1992e9dceb8f3ce8c69d8c2fb', 2, '', '2017-10-14 14:59:58', '2017-10-14 14:59:58', 0),
(10, '13 - Cahyo', '', 'cahyo', '772c2161cb7137df9da9d3ad4d57b16f', 2, '', '2017-10-14 15:00:23', '2017-10-14 15:00:23', 0),
(11, '14 - Adjat', '', 'adjat', 'c3c66585cffab843abac54c495f4456e', 2, '', '2017-10-14 15:00:38', '2017-10-14 15:00:38', 0),
(12, '15 - Najib', '', 'najib', '8ee9be8b53a898ba32da4529cfff8258', 2, '', '2017-10-14 15:00:53', '2017-10-14 15:00:53', 0),
(13, '16 - Alam', '', 'alam', '133f19cfffb569f6447ebf073084a417', 2, '', '2017-10-14 15:01:07', '2017-10-14 15:01:07', 0),
(14, '17 - Eko A.W', '', 'eko', 'e5ea9b6d71086dfef3a15f726abcc5bf', 2, '', '2017-10-14 15:01:31', '2017-10-14 15:01:31', 0),
(15, '18 - Firman', '', 'firman', '74bfebec67d1a87b161e5cbcf6f72a4a', 2, '', '2017-10-14 15:01:45', '2017-10-14 15:01:45', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_teknisi`
--
ALTER TABLE `tbl_teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_menu_user`
--
ALTER TABLE `tb_menu_user`
  ADD PRIMARY KEY (`id_menu_user`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id_orders` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_teknisi`
--
ALTER TABLE `tbl_teknisi`
  MODIFY `id_teknisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_menu_user`
--
ALTER TABLE `tb_menu_user`
  MODIFY `id_menu_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
