-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2020 at 09:58 AM
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
(1, 11, '2020-07-10', '20:15:57', '0', '0', '1120200710201557.png', '1'),
(2, 12, '2020-07-10', '20:39:48', '0', '0', '1220200710203948.png', '1'),
(3, 10, '2020-07-10', '20:40:07', '0', '0', '1020200710204007.png', '1'),
(4, 9, '2020-07-10', '20:43:43', '0', '0', '920200710204343.png', '1'),
(5, 14, '2020-07-10', '20:55:32', '0', '0', '1420200710205532.png', '1'),
(6, 15, '2020-07-11', '20:53:32', '1', '1', '1520200711205332.png', '1'),
(7, 16, '2020-07-13', '14:51:58', '1', '1', '1620200713145158.png', '1'),
(8, 17, '2020-07-14', '09:31:50', '1', '0', '1720200714093150.png', '1'),
(9, 34, '2020-07-14', '13:26:29', '1', '1', '3420200714132629.png', '1'),
(10, 36, '2020-07-14', '13:29:51', '1', '1', '3620200714132951.png', '1'),
(11, 19, '2020-07-14', '13:29:54', '1', '1', '1920200714132954.png', '1'),
(12, 25, '2020-07-14', '13:31:08', '0', '1', '2520200714133108.png', '1'),
(13, 25, '2020-07-14', '13:31:16', '1', '1', '2520200714133116.png', '1'),
(14, 27, '2020-07-14', '13:32:40', '1', '1', '2720200714133240.png', '1'),
(15, 26, '2020-07-14', '13:33:33', '1', '1', '2620200714133333.png', '1'),
(16, 38, '2020-07-14', '13:34:07', '1', '1', '3820200714133407.png', '1'),
(17, 29, '2020-07-14', '13:36:54', '1', '0', '2920200714133654.png', '1'),
(18, 37, '2020-07-14', '13:47:25', '1', '1', '3720200714134725.png', '1'),
(19, 28, '2020-07-14', '13:58:47', '1', '1', '2820200714135847.png', '1'),
(20, 48, '2020-07-18', '23:22:10', '1', '0', '4820200718232210.png', '1'),
(21, 16, '2020-07-20', '14:20:43', '1', '1', '1620200720142043.png', '1');

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
(1, 1, 'Putu Wida Gunawan', '0801118101', '44cc5684ebf2d27ebb67b0dbd7fc8d58', '085104805558', 'Jl. P. Ayu No. 4 Desa Dauh Puri Kauh-Denpasar Barat-80113', 'S.Si.,M.Cs', '1'),
(2, 1, 'Gerson Feoh', '0828038501', 'e10adc3949ba59abbe56e057f20f883e', '081805543347', 'Jln. Taman Sekar VI C No. 10 Padang Sambian-Deanpasar Barat-80117', 'S.Kom.,M.T', '1');

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
(1, '17121101003', 1, '0'),
(2, '17121101017', 1, '0'),
(3, '17121101002', 1, '0'),
(4, '17121101010', 1, '0'),
(5, '17121101013', 1, '0'),
(6, '17121101008', 1, '0'),
(7, '17121101004', 1, '0'),
(8, '17121101008', 2, '0'),
(9, '17121101003', 2, '0'),
(10, '17121101017', 2, '0'),
(11, '17121101002', 2, '0'),
(12, '17121101004', 2, '0'),
(13, '17121101010', 2, '0'),
(14, '17121101013', 2, '0'),
(15, '16121101001', 3, '1'),
(16, '18121101016', 4, '1'),
(17, '16121101001', 5, '1'),
(18, '19121101024', 5, '1'),
(19, '19121101018', 5, '1'),
(20, '19121101026', 5, '1'),
(21, '19121101015', 5, '1'),
(22, '19121101034', 5, '1'),
(23, '19121101013', 5, '1'),
(24, '19121101011', 5, '1'),
(25, '19121101017', 5, '1'),
(26, '19121101008', 5, '1'),
(27, '19121101031', 5, '1'),
(28, '19121101003', 5, '1'),
(29, '19121101005', 5, '1'),
(30, '19121101014', 5, '1'),
(31, '19121101025', 5, '1'),
(32, '19121101020', 5, '1'),
(33, '19121101001', 5, '1'),
(34, '19121101010', 5, '1'),
(35, '19121101032', 5, '1'),
(36, '19121101019', 5, '1'),
(37, '19121101035', 5, '1'),
(38, '19121101009', 5, '1'),
(39, '19121101022', 5, '1'),
(40, '19121101006', 5, '1'),
(41, '19121101004', 5, '1'),
(42, '19121101007', 5, '1'),
(43, '19121101030', 5, '1'),
(44, '19121101002', 5, '1'),
(45, '19121101028', 5, '1'),
(46, '19121101012', 5, '1'),
(47, '19121101016', 5, '1'),
(48, '16121101001', 7, '1');

-- --------------------------------------------------------

--
-- Table structure for table `lap_absensi`
--

CREATE TABLE `lap_absensi` (
  `id_l_a` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lap_absensi`
--

INSERT INTO `lap_absensi` (`id_l_a`, `id_admin`, `tgl`, `ket`, `visible`) VALUES
(1, 1, '2020-08-26', '4040', '1'),
(2, 1, '2020-08-26', '4040', '1'),
(3, 1, '2020-08-26', '2020 matakuliah: TIK1403 dosen: ', '1'),
(4, 1, '2020-08-26', 'Periode: 2020-06-01 - 2020-08-26 matakuliah:  dosen: ', '1'),
(5, 1, '2020-08-26', 'Periode: 2020-06-01 - 2020-08-26 matakuliah: TIK1446 dosen: ', '1'),
(6, 1, '2020-08-26', 'Periode: 2020-06-01 - 2020-08-26 matakuliah: TIK1446 dosen: 2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lap_kehadiran`
--

CREATE TABLE `lap_kehadiran` (
  `id_l_k` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lap_kehadiran`
--

INSERT INTO `lap_kehadiran` (`id_l_k`, `id_admin`, `tgl`, `ket`, `visible`) VALUES
(1, 1, '2020-08-26', 'Periode: 2020-06-01 - 2020-08-26 matakuliah: TIK1403', '1');

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
  `angkatan` int(11) NOT NULL,
  `visible` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim_mahasiswa`, `id_admin`, `nama_mahasiswa`, `username`, `password`, `no_telp`, `alamat`, `angkatan`, `visible`) VALUES
('16121101001', 1, 'I Made Sumandra', '16121101001', 'dbe50cdde95ba8de5e444384a5c4e6c2', '085856265496', 'Jl. Raya Kerobokan GG. Kawi No. 3 LINK Tegeh 445-Kuta Utara-80363', 2016, '1'),
('16121101004', 1, 'I Wayan Agus Suandika', '16121101004', '8a2a490650a8382fb9fd4f33e40e4456', '08983176241', 'Jl. Gunung Tangkuban Perahu No.118 Padang Sambian Kelod-Denpasar Barat-80117', 2016, '1'),
('16121101005', 1, 'I Made Anthony Chrismounth', '16121101005', 'e3e761eea7567542f1a86d211c21b1e5', '085290720951', 'Jln. Pancoran Sari Br. Batu Mekaam, Ubung Kaja-Denpasar Utara-80111', 2016, '1'),
('17121101002', 1, 'Kelvin Malelak', '17121101002', '568a6af845209cd29ebd3f99bbc6b3d7', '085856265496', 'Jl. Kubu Gunung II-Kuta Utara-08363', 2017, '1'),
('17121101003', 1, 'Anna Nenak', '17121101003', 'dfaeff002dc4f38e219eddd07454f56d', '085856265496', 'Jl. Kubu Gunung II-Kuta Utara-80363', 2017, '1'),
('17121101004', 1, 'Krensiana Tuwa', '17121101004', '3b58bf794cff783e36cddd110197acbd', '085856265496', 'Jl. Raya Kedampang , Kerobokan-Kuta Utara-08363', 2017, '1'),
('17121101008', 1, 'Agnesn Lende', '17121101008', '62284ff30011136ee4c7119d630a1bc7', '082247715445', 'Jl. Perumahan Dalung Permai Blok 03 No.30-Kuta Utara-80363', 2017, '1'),
('17121101010', 1, 'Lidvina Ngijung', '17121101010', '03095463f73bf779ed114b4102203a0a', '085856265496', 'Jl. Kubu Gunung-Kuta Utara-80363', 2017, '1'),
('17121101013', 1, 'Maria Theresia Aurelia Dhone', '17121101013', '48a24213f5d87c4860adac37f79fe38b', '085856265496', 'Jl. Kubu Gunung II-Kuta Utara-80363', 2017, '1'),
('17121101017', 1, 'Gilbert Wirano', '17121101017', '2faa92377bbcd28cdf5d4a724c9e99d0', '081273873243', 'JL. Kubu Gunung II-Kuta Utara-80363', 2017, '1'),
('18121101016', 1, 'Robertus Aman', '18121101016', '07e98725b4e4f55813d364c585de54ac', '081338042850', 'Jln. Kubu Gunung II, Tegal Jaya Desa Padang Luwih-Kuta Utara-80363', 2018, '1'),
('19121101001', 1, 'Mikrajab Ronald Intje Makkah', '19121101001', '2de65a2b2624f95c49cbf60c35b49a8d', '081286540051', 'Br. Semer Tegal Cupek-Kuta Utara-80363', 2019, '1'),
('19121101002', 1, 'Richardus Dola', '19121101002', '58c51730dc42090bd5999dda656f2272', '082124975242', 'Jl. Gatsu Subroto Tengah, Gatsu. VI No. 48 B-Denpasar Utara-80111', 2019, '1'),
('19121101003', 1, 'I Putu David Martinus Paroszynski', '19121101003', '16d73f7e32eedfb7f4b4b2a387b37d6a', '082147453872', 'Jalan Raya Sading gg Avertha Pura No 1-Mengwi-80351', 2019, '1'),
('19121101004', 1, 'Putu Adi Saputra', '19121101004', '80c662679928fc8039f19fdd85793fce', '085779219656', 'Br.Ulun Uma Wedan, Desa Gulingan-Mengwi-80351', 2019, '1'),
('19121101005', 1, 'I Putu Okky Widiana Putra', '19121101005', 'b975e4e790070ba19363658c10dacf32', '087885383896', 'Banjar Kebon, Kelurahan B.B. Agung -Negare-82212', 2019, '1'),
('19121101006', 1, 'Pande Gede Adi Mahardika', '19121101006', '89030194a5717a023857980979561b91', '085739917917', 'Perumahan Dalung Permai Blok AA. 46 A-Kuta Utara-80363', 2019, '1'),
('19121101007', 1, 'Putu Wisnu Kurniawan', '19121101007', '01aeacdbbb92dafee52c35c77e6c57c3', '085737079183', 'Jl. Sri Amerta Gg. III/3, Singaraja-Buleleng-81119', 2019, '1'),
('19121101008', 1, 'I Kadek Angga Suryawan', '19121101008', 'd3ce7768a2b41958f8270d969f04d52e', '087850500492', 'Br/Dsn. Kaleran, Desa Manduang-Kelungkung-80716', 2019, '1'),
('19121101009', 1, 'Ni Putu Ria Anggreni', '19121101009', 'e10adc3949ba59abbe56e057f20f883e', '081353218198', 'Br. Tegaljaya, Jln. Ketut Ball, No. 9, Dalung-Kuta Utara-80363', 2019, '1'),
('19121101010', 1, 'Ni Kadek Bernica Dwi Cahyani', '19121101010', '492ffc8ef8a16f27f71a52a7a6dc3485', '081294439883', 'Br Pengilian, Dalung-Kuta Utara-80363', 2019, '1'),
('19121101011', 1, 'Gusti Made Ngurah Eko Wira Pratama', '19121101011', '557f467d9787d409c0af4c2b37553456', '081939190752', 'Bongan lebah-Tabanan-82111', 2019, '1'),
('19121101012', 1, 'Wayan Rudianto', '19121101012', '3eff646f545b3a73ed9549f26798d299', '082290425886', 'Jln. Gunung Catur Perumaham Mekar Sari II-Denpasar Barat-80112', 2019, '1'),
('19121101013', 1, 'Gerardus Ole Awa', '19121101013', 'fc823252d12c286b91708020368dcf83', '081239656042', 'Gatot Subroto VI-Denpasar Timur-80232', 2019, '1'),
('19121101014', 1, 'Kadek Chrisappolosta Brainy', '19121101014', '8b37ea39c413f569c72fc40ec6145c58', '081238418629', 'Br/Dsn. Karang Sari, Desa Banyupoh-Grogak-81155', 2019, '1'),
('19121101015', 1, 'Febianus I Made Jeven', '19121101015', 'bc639ea10e36335a95395628e601254e', '082254004687', 'Jl. Kubu Gn. II No.10, Villa Dan Kos Sharon-Kuta Utara-80363', 2019, '1'),
('19121101016', 1, 'Yulianus Bulu', '19121101016', '03785ff30fe193db0e282ba22cdba73a', '081243485978', 'Jl. LC Penamparan Indah III A-Deanpasar Barat-80112', 2019, '1'),
('19121101017', 1, 'I Gede Rico Roynaldo De Leu', '19121101017', 'f65419e745d389ed7d9affec7a80a881', '082145488640', 'Blimbingsari-Melaye -82252', 2019, '1'),
('19121101018', 1, 'Chrisley Heltroyce', '19121101018', 'b85ed4703b7a57497573d50717c81bba', '08114910115', 'Jln. Kubu Gunung Tegal jaya-Kuta Utara-80363', 2019, '1'),
('19121101019', 1, 'Ni Made Devi Ariningsih', '19121101019', '3c6757932231858b4323b52d76c08619', '081338760574', 'Banjar Baturiti Kaja-Baturiti-82191', 2019, '1'),
('19121101020', 1, 'Maxima Winfrida Wona', '19121101020', '96aeb480346b02bfe1369d5631bda67c', '081239840058', 'Perumahan Tegal Jaya Blok 4-5 No. A4-Kuta Utara-80363', 2019, '1'),
('19121101022', 1, 'Odi Efata', '19121101022', 'b490ce0b01775dc418859b5c334f34d0', '087761654403', 'Juwuklegi, Batunya-Baturiti-82191', 2019, '1'),
('19121101024', 1, 'Alfin Ranjawali', '19121101024', 'fc77fa7aa5169ccce5d8a5934957a7d2', '082247162642', 'Jl. Pantai Berawa, Br. Pelambingan No.43-Kuta Utara-80363', 2019, '1'),
('19121101025', 1, 'Maria Claudia Floranca Ijo', '19121101025', '8d16029fda622e938ecaabe9a99f2bf0', '081246609334', 'Jl. Kubugunung II,  Gg Swastiastu no. 7 -Kuta Utara-80363', 2019, '1'),
('19121101026', 1, 'Eston Umbu Siwa Wunu', '19121101026', 'bc2a05fd01c1c60a2addaa428c6487d3', '081239269213', 'Muding Sari Gg. B1-Kuta Utara-80363', 2019, '1'),
('19121101028', 1, 'Tanggu Todu', '19121101028', '0b2658cfa537f8d27c8cc65946b71ce7', '081293964727', 'Jln. Panji No. 11b Graha Permai Indah-Kuta Utara-80363', 2019, '1'),
('19121101030', 1, 'Redempto De Aprilio Geraklino Cantana', '19121101030', '4440e711943ba6910b7e24a51b0661f5', '0895376226611', 'Jln. Kubu Gunung 2 Tegal jaya-Kuta Utara -80363', 2019, '1'),
('19121101031', 1, 'I Kadek Wisnu Jaya Saputra', '19121101031', '1ad98451204f3d51c1138af45e5bebf8', '089509779525', 'Jl. Raya Canggu ,Lingkungan Br.Anyar Kaja-Kuta Utara-80363', 2019, '1'),
('19121101032', 1, 'Ni Kadek Putri Sari', '19121101032', '351d4eb051452987ab6404c6d3991052', '081554552472', 'Lingkungan Bumi Kerta, Perumahan Graha Mandiri Permai No.E5, Dalung-Kuta Utara-80363', 2019, '1'),
('19121101034', 1, 'G. Stanley Sugiartama Putra', '19121101034', 'e6945132aee58c3de7d986aa104efd7d', '081363338372', 'Jl. Raya Padang Luwih-Kuta Utara-80363', 2019, '1'),
('19121101035', 1, 'Ni Putu Meliyoni Anggara', '19121101035', '951c5a4e97f2bad78a6f3f704f8fef18', '082235200639', 'Perumahan Griya Multi Jadi-Kediri-82121', 2019, '1');

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
('TIK1355', 1, 'Metodologi Penelitian', 2, '1'),
('TIK1403', 1, 'Etika Profesi', 2, '1'),
('TIK1411', 1, 'Pengantar Organisasi Komputer', 3, '1'),
('TIK1429', 1, 'Aplikasi Mobile', 3, '1'),
('TIK1446', 1, 'Manajeman Proyek TI', 3, '1'),
('TIK1503', 1, 'Seminar', 4, '1'),
('TIK1505', 1, 'Komputer Dan Masyarakat', 2, '1'),
('TIK1506', 1, 'Kerja Praktek', 2, '1'),
('TIK403', 1, 'Etika Profesi', 2, '0');

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
(1, 3, '2020-07-11', 'proposal', 'bab 1', '1'),
(2, 4, '2020-07-13', 'proyek', 'proyek', '1'),
(3, 5, '2020-07-14', 'Test', '', '1'),
(4, 5, '2020-07-14', 'test', 'profesi', '1'),
(5, 4, '2020-07-20', 'Tea', 'Tes', '1');

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
(1, 2, 'TIK1429', 'Senin-16.30-19.00', '0', '0'),
(2, 2, 'TIK1429', 'Jumat-20.05-22.00', '0', '0'),
(3, 2, 'TIK1503', 'Sabtu-20.00-22.00', '0', '1'),
(4, 2, 'TIK1446', 'Senin-14.00-16.00', '0', '1'),
(5, 1, 'TIK1403', 'Selasa-09.00-11.00', '0', '1'),
(6, 1, 'TIK1411', 'Selasa-13.00-16.00', '0', '1'),
(7, 2, 'TIK1506', 'Sabtu-23.00-01.00', '1', '1');

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
-- Indexes for table `lap_absensi`
--
ALTER TABLE `lap_absensi`
  ADD PRIMARY KEY (`id_l_a`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `lap_kehadiran`
--
ALTER TABLE `lap_kehadiran`
  ADD PRIMARY KEY (`id_l_k`),
  ADD KEY `id_admin` (`id_admin`) USING BTREE;

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
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_mengajar` (`id_mengajar`);

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
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  MODIFY `id_kelas_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `lap_absensi`
--
ALTER TABLE `lap_absensi`
  MODIFY `id_l_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lap_kehadiran`
--
ALTER TABLE `lap_kehadiran`
  MODIFY `id_l_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `fk_idkelas_absensi` FOREIGN KEY (`id_kelas`) REFERENCES `kelas_mhs` (`id_kelas_mhs`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_id_admin_dsn` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  ADD CONSTRAINT `fk_idajar_kelas` FOREIGN KEY (`id_mengajar`) REFERENCES `mengajar` (`id_mengajar`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nim_kelas` FOREIGN KEY (`nim_mahasiswa`) REFERENCES `mahasiswa` (`nim_mahasiswa`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lap_absensi`
--
ALTER TABLE `lap_absensi`
  ADD CONSTRAINT `id_admin_lap_a` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lap_kehadiran`
--
ALTER TABLE `lap_kehadiran`
  ADD CONSTRAINT `id_admin_lap_k` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_mengajar_materi` FOREIGN KEY (`id_mengajar`) REFERENCES `mengajar` (`id_mengajar`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `fk_id_dosen_ajar` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_matakuliah_ajar` FOREIGN KEY (`kode_matakuliah`) REFERENCES `matakuliah` (`kode_matakuliah`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
