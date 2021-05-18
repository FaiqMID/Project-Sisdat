-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 12:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_rapat` char(5) NOT NULL,
  `id_pengguna` char(5) NOT NULL,
  `start` timestamp NOT NULL DEFAULT current_timestamp(),
  `stop` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_rapat`, `id_pengguna`, `start`, `stop`) VALUES
('R0001', '4', '2021-05-18 09:50:02', '2021-05-18 09:50:26'),
('R0002', '4', '2021-05-18 09:14:35', '2021-05-18 09:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `rapat`
--

CREATE TABLE `rapat` (
  `id_rapat` char(5) NOT NULL,
  `id_tempat` char(5) NOT NULL,
  `nama_rapat` varchar(30) NOT NULL,
  `wkt_mulai` datetime NOT NULL,
  `wkt_selesai` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rapat`
--

INSERT INTO `rapat` (`id_rapat`, `id_tempat`, `nama_rapat`, `wkt_mulai`, `wkt_selesai`, `status`) VALUES
('', 'T0002', 'Rapat4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
('R0001', 'T0001', 'Rapat1', '2021-05-18 16:47:00', '2021-05-18 17:48:00', 2),
('R0002', 'T0001', 'Rapat 2', '2021-05-18 18:00:00', '2021-05-18 20:01:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` varchar(5) NOT NULL,
  `nama_tempat` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `alamat`) VALUES
('T0001', 'Tempat1', 'abxcvbnmmnbvcxcvbnm'),
('T0002', 'Tempat2', 'adklnfewads');

-- --------------------------------------------------------

--
-- Table structure for table `tgroups`
--

CREATE TABLE `tgroups` (
  `GROUPID` int(11) NOT NULL,
  `GROUPS` varchar(50) COLLATE utf32_bin NOT NULL,
  `DESCRIPTION` text COLLATE utf32_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `tgroups`
--

INSERT INTO `tgroups` (`GROUPID`, `GROUPS`, `DESCRIPTION`) VALUES
(1, 'Administrator', 'Administrator'),
(2, 'Operator', 'Operator'),
(3, 'Operator Rapat', 'Operator Rapat'),
(4, 'User', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tmembermenu`
--

CREATE TABLE `tmembermenu` (
  `ROOTMENUID` bigint(20) NOT NULL,
  `MEMBERID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `tmembermenu`
--

INSERT INTO `tmembermenu` (`ROOTMENUID`, `MEMBERID`) VALUES
(2, 7),
(2, 8),
(4, 5),
(4, 6),
(9, 10),
(9, 11),
(9, 12),
(9, 13),
(9, 14),
(9, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tmenugroup`
--

CREATE TABLE `tmenugroup` (
  `GROUPID` int(11) NOT NULL,
  `MENUID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `tmenugroup`
--

INSERT INTO `tmenugroup` (`GROUPID`, `MENUID`) VALUES
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 6),
(2, 7),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(4, 14),
(4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tmenus`
--

CREATE TABLE `tmenus` (
  `MENUID` bigint(20) NOT NULL,
  `MENUSCODE` varchar(10) COLLATE utf32_bin NOT NULL,
  `MENUS` varchar(50) COLLATE utf32_bin NOT NULL,
  `DESCRIPTION` text COLLATE utf32_bin DEFAULT NULL,
  `TYPEID` int(11) NOT NULL,
  `LEVELID` int(11) NOT NULL,
  `ORDERBY` int(11) NOT NULL DEFAULT 1,
  `icon` varchar(20) COLLATE utf32_bin NOT NULL DEFAULT 'fa-tachometer-alt',
  `STATUSID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `tmenus`
--

INSERT INTO `tmenus` (`MENUID`, `MENUSCODE`, `MENUS`, `DESCRIPTION`, `TYPEID`, `LEVELID`, `ORDERBY`, `icon`, `STATUSID`) VALUES
(1, 'SYS', 'System Menu', 'System Menu', 1, 1, 1, 'fa-tachometer-alt', 1),
(2, 'ADM', 'Administration Menu', 'Menu Administrasi', 1, 1, 1, 'fa-address-card', 1),
(3, 'APM', 'Kelola Master Data', 'Kelola Master Data', 1, 1, 1, 'fa-address-card', 1),
(4, 'DAS', 'DashBoard', 'Dashboard', 1, 1, 1, 'fa-tachometer-alt', 1),
(5, 'DAS0001', 'Dashboard Admin', 'Dashboard Admin', 2, 2, 1, 'fa-circle', 1),
(6, 'DAS0002', 'Dashboard Operator', 'Dashboard Operator', 2, 2, 1, 'fa-circle', 1),
(7, 'ADM0001', 'Kelola User', 'Kelola User', 2, 2, 1, 'fa-circle', 1),
(8, 'ADM0002', 'Kelola Menu', 'Kelola Menu', 2, 2, 1, 'fa-circle', 1),
(9, 'ADR', 'Kendali Rapat', 'Menu Pengendali Rapat', 1, 1, 1, 'fa-address-card', 1),
(10, 'ADR0001', 'Kelola Jadwal', 'Kelola Jadwal', 2, 2, 1, 'fa-circle', 1),
(11, 'ADR0002', 'Kendali Rapat', 'Kendali Rapat', 2, 2, 1, 'fa-circle', 1),
(12, 'ADR0003', 'Daftar Rapat', 'Daftar Rapat', 2, 2, 1, 'fa-circle', 1),
(13, 'ADR0004', 'Histori Rapat', 'History Rapat', 2, 2, 1, 'fa-circle', 1),
(14, 'ADR0005', 'Presensi Rapat', 'Kelola Presensi rapat', 2, 2, 1, 'fa-circle', 1),
(15, 'ADR0006', 'Agenda Rapat', 'Agenda Rapat', 2, 2, 1, 'fa-circle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ttypes`
--

CREATE TABLE `ttypes` (
  `TYPEID` int(11) NOT NULL,
  `TYPES` varchar(50) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `ttypes`
--

INSERT INTO `ttypes` (`TYPEID`, `TYPES`) VALUES
(1, 'Root Menu'),
(2, 'Sub Menu');

-- --------------------------------------------------------

--
-- Table structure for table `tusers`
--

CREATE TABLE `tusers` (
  `USERID` bigint(20) NOT NULL,
  `GROUPID` int(11) DEFAULT NULL,
  `USERNAME` varchar(32) COLLATE utf32_bin NOT NULL,
  `USERPASS` varchar(32) COLLATE utf32_bin NOT NULL,
  `FIRSTNAME` varchar(50) COLLATE utf32_bin NOT NULL,
  `LASTNAME` varchar(50) COLLATE utf32_bin NOT NULL,
  `STATUSID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `tusers`
--

INSERT INTO `tusers` (`USERID`, `GROUPID`, `USERNAME`, `USERPASS`, `FIRSTNAME`, `LASTNAME`, `STATUSID`) VALUES
(2, 2, 'operator', 'ba6d3d316d16234b3b0814079c7fb3dd', 'operator', 'operator', 1),
(3, 3, 'operatorr', '42020de5f6ca30b6044a52d8aee2b99f', 'Operator', 'Rapat', 1),
(4, 4, 'user', 'c37c6474f327735b620b4d4a3f684560', 'user', 'rapat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `undangan`
--

CREATE TABLE `undangan` (
  `id_rapat` char(5) NOT NULL,
  `id_pengguna` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `undangan`
--

INSERT INTO `undangan` (`id_rapat`, `id_pengguna`) VALUES
('R0001', '4'),
('R0002', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_rapat`,`id_pengguna`);

--
-- Indexes for table `rapat`
--
ALTER TABLE `rapat`
  ADD PRIMARY KEY (`id_rapat`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `tgroups`
--
ALTER TABLE `tgroups`
  ADD PRIMARY KEY (`GROUPID`);

--
-- Indexes for table `tmembermenu`
--
ALTER TABLE `tmembermenu`
  ADD PRIMARY KEY (`ROOTMENUID`,`MEMBERID`),
  ADD KEY `FK_MEMBER_FK` (`MEMBERID`);

--
-- Indexes for table `tmenugroup`
--
ALTER TABLE `tmenugroup`
  ADD PRIMARY KEY (`GROUPID`,`MENUID`),
  ADD KEY `FK_MENUGROUP` (`MENUID`);

--
-- Indexes for table `tmenus`
--
ALTER TABLE `tmenus`
  ADD PRIMARY KEY (`MENUID`);

--
-- Indexes for table `ttypes`
--
ALTER TABLE `ttypes`
  ADD PRIMARY KEY (`TYPEID`);

--
-- Indexes for table `tusers`
--
ALTER TABLE `tusers`
  ADD PRIMARY KEY (`USERID`);

--
-- Indexes for table `undangan`
--
ALTER TABLE `undangan`
  ADD PRIMARY KEY (`id_rapat`,`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tgroups`
--
ALTER TABLE `tgroups`
  MODIFY `GROUPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tmenus`
--
ALTER TABLE `tmenus`
  MODIFY `MENUID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ttypes`
--
ALTER TABLE `ttypes`
  MODIFY `TYPEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tusers`
--
ALTER TABLE `tusers`
  MODIFY `USERID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tmembermenu`
--
ALTER TABLE `tmembermenu`
  ADD CONSTRAINT `FK_MEMBER_FK` FOREIGN KEY (`MEMBERID`) REFERENCES `tmenus` (`MENUID`),
  ADD CONSTRAINT `FK_ROOT_FK` FOREIGN KEY (`ROOTMENUID`) REFERENCES `tmenus` (`MENUID`);

--
-- Constraints for table `tmenugroup`
--
ALTER TABLE `tmenugroup`
  ADD CONSTRAINT `FK_GROUPMENU` FOREIGN KEY (`GROUPID`) REFERENCES `tgroups` (`GROUPID`),
  ADD CONSTRAINT `FK_MENUGROUP` FOREIGN KEY (`MENUID`) REFERENCES `tmenus` (`MENUID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
