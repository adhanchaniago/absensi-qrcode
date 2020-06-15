-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 15, 2020 at 02:50 PM
-- Server version: 10.4.12-MariaDB-log
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensiqr`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tgl_absensi` date NOT NULL,
  `jam_absensi` time NOT NULL,
  `validasi` enum('0','1') NOT NULL,
  `val_materi` enum('0','1') NOT NULL,
  `qrcode` varchar(100) NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_kelas`, `tgl_absensi`, `jam_absensi`, `validasi`, `val_materi`, `qrcode`, `visible`) VALUES
(1, 3, '2020-06-15', '09:51:40', '1', '0', '320200615095140.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `gelar` varchar(10) NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `no_telp`, `alamat`, `gelar`, `visible`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '081123456789', '-', 'SKOM', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_dosen` char(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `gelar` varchar(10) NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_admin`, `nama_dosen`, `username`, `password`, `no_telp`, `alamat`, `gelar`, `visible`) VALUES
(1, 1, 'Gerson Feoh', 'gerson', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Sekar-01111', 'SKOM', '1'),
(2, 1, 'Putu Wida Gunawan', 'wida', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi 13-Sekar-01111', 'SKOM', '1'),
(3, 1, 'I Made Agung Raharja', 'agung', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi 56-Kuta-80361', 'S.KOM', '1'),
(4, 1, 'I Waya Supriana', 'supriana', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi 76-Kuta-80361', 'S.KOM', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mhs`
--

CREATE TABLE `kelas_mhs` (
  `id_kelas_mhs` int(11) NOT NULL,
  `nim_mahasiswa` varchar(30) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_mhs`
--

INSERT INTO `kelas_mhs` (`id_kelas_mhs`, `nim_mahasiswa`, `id_mengajar`, `visible`) VALUES
(1, '15114101008', 1, '1'),
(2, '15114101006', 1, '1'),
(3, '15114101010', 1, '1'),
(4, '15114101013', 1, '1'),
(5, '15114101014', 2, '1'),
(6, '15114101016', 2, '1'),
(7, '15114101001', 2, '1'),
(8, '15114101004', 2, '1'),
(9, '15114101012', 3, '1'),
(10, '15114101003', 3, '1'),
(11, '15114101005', 3, '1'),
(12, '15114101007', 3, '1'),
(13, '15114101015', 4, '1'),
(14, '15114101009', 4, '1'),
(15, '15114101011', 4, '1'),
(16, '15114101002', 4, '1'),
(17, '15114101005', 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim_mahasiswa` varchar(30) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_mahasiswa` char(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim_mahasiswa`, `id_admin`, `nama_mahasiswa`, `username`, `password`, `no_telp`, `alamat`, `visible`) VALUES
('15114101001', 1, 'Ni Kadek Idah Septiani', 'indah', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Jalan Tunjung-Kuta-80362', '1'),
('15114101002', 1, 'Yudana Wiranta', 'yuda', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Kediri-Kuta-80362', '1'),
('15114101003', 1, 'Ni Luh Putu Sri Rijasa', 'sri', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101004', 1, 'Ni Ketut Sari Astuti', 'sari', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101005', 1, 'Ni Luh Suwantari', 'suwan', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101006', 1, 'I Gede Arsa Sedana Kurniarta', 'arsa', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101007', 1, 'Ni Nyoman Mudasih', 'mudasih', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101008', 1, 'I Dewa Gede Satryawan', 'dewa', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101009', 1, 'Ni Putu Indrayanthi', 'indrayanthi', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101010', 1, 'I Gede Narsa Wijaya', 'narsa', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101011', 1, 'Ni Wayan Swati Indah Sari', 'swati', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101012', 1, 'Ni Komang Sumiati', 'sumiati', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101013', 1, 'I Wayan Artika', 'artika', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101014', 1, 'Made Emy Udayani', 'emy', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101015', 1, 'Ni Putu Ayu Lia Ningsih', 'lia', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1'),
('15114101016', 1, 'Maria Fransisca Helena Ria Raja', 'fransisca', 'e10adc3949ba59abbe56e057f20f883e', '0821123456789', 'Sekar Wanggi-Kuta-80361', '1');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_matakuliah` varchar(30) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_matakuliah` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matakuliah`, `id_admin`, `nama_matakuliah`, `sks`, `visible`) VALUES
('TI201991001', 1, 'Statistika', 3, '1'),
('TI201991002', 1, 'Algoritma Pemrograman', 4, '1'),
('TI201991003', 1, 'Pemrograman Web Dasar', 4, '1'),
('TI201991004', 1, 'Pemrograman Mobile', 4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `tgl_materi` date NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `des_materi` text NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_mengajar`, `tgl_materi`, `judul_materi`, `des_materi`, `visible`) VALUES
(1, 1, '2020-06-15', 'Penegenal Pascal', 'Cara Instalasi\r\nmembuat aplikasi pascal pertama', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE `mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `kode_matakuliah` varchar(30) NOT NULL,
  `jadwal` varchar(50) NOT NULL,
  `buka_kelas` enum('0','1') NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`id_mengajar`, `id_dosen`, `kode_matakuliah`, `jadwal`, `buka_kelas`, `visible`) VALUES
(1, 1, 'TI201991002', 'Senin-09:00', '0', '1'),
(2, 3, 'TI201991001', 'Selasa-13:00', '0', '1'),
(3, 4, 'TI201991003', 'Rabu-11:30', '0', '1'),
(4, 2, 'TI201991004', 'Kamis-14:00', '0', '1'),
(5, 3, 'TI201991003', 'Minggu-14:00', '0', '1'),
(6, 1, 'TI201991003', 'Minggu-12:00', '0', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  ADD PRIMARY KEY (`id_kelas_mhs`),
  ADD KEY `nim_mahasiwa` (`nim_mahasiswa`),
  ADD KEY `id_mengajar` (`id_mengajar`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim_mahasiswa`) USING BTREE,
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_matakuliah`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `kode_matakuliah` (`kode_matakuliah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  MODIFY `id_kelas_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `fk_idkelas_absensi` FOREIGN KEY (`id_kelas`) REFERENCES `kelas_mhs` (`id_kelas_mhs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_id_admin_dsn` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  ADD CONSTRAINT `fk_idajar_kelas` FOREIGN KEY (`id_mengajar`) REFERENCES `mengajar` (`id_mengajar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nim_kelas` FOREIGN KEY (`nim_mahasiswa`) REFERENCES `mahasiswa` (`nim_mahasiswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_id_admin_mhs` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `fk_id_admin_matkul` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `fk_id_dosen_ajar` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matakuliah_ajar` FOREIGN KEY (`kode_matakuliah`) REFERENCES `matakuliah` (`kode_matakuliah`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
