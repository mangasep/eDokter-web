-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 27, 2018 at 12:49 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edokterx_db_edokter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `NAMA_ADMIN` varchar(40) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `USERNAME` varchar(40) DEFAULT NULL,
  `PASSWORD` varchar(40) DEFAULT NULL,
  `NO_TELPN` varchar(12) DEFAULT NULL,
  `ALAMAT` varchar(40) DEFAULT NULL,
  `AGAMA` varchar(20) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(40) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `STATUS` int(5) DEFAULT NULL,
  `JOB_DESC` varchar(20) DEFAULT NULL,
  `pic` varchar(255) NOT NULL DEFAULT '/img/staff.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_periksa`
--

CREATE TABLE `daftar_periksa` (
  `ID_DAFTAR` int(11) NOT NULL,
  `ID_PASIEN` int(11) DEFAULT NULL,
  `ID_DOKTER` int(11) DEFAULT NULL,
  `TANGGAL_PERIKAS` date DEFAULT NULL,
  `KELUHAN` text,
  `STATUS` tinyint(5) DEFAULT '0',
  `WAKTU_DAFTAR` time DEFAULT NULL,
  `ID_URUT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_periksa`
--

INSERT INTO `daftar_periksa` (`ID_DAFTAR`, `ID_PASIEN`, `ID_DOKTER`, `TANGGAL_PERIKAS`, `KELUHAN`, `STATUS`, `WAKTU_DAFTAR`, `ID_URUT`) VALUES
(19, 1, 13, '2018-01-09', 'Sakit gigi', 100, '03:09:15', 1),
(22, 5, 2, '2018-01-10', 'migrain', 0, '03:53:20', 2),
(23, 8, 14, '2018-01-10', 'pigang linu', 0, '03:54:00', 3),
(24, 7, 15, '2018-01-11', 'pusing kepala', 0, '03:54:35', 4),
(27, 5, 2, '2018-01-09', 'Mata Sebelah kanan bengkak b', 100, '09:50:00', 9),
(28, 7, 2, '2018-01-09', 'Mata agak buram tiap bangun tidur', 10, '10:21:00', 11),
(30, 4, 2, '2018-01-09', 'Mata berkunang kunang', 10, '13:45:00', 25),
(31, 9, 2, '2018-01-09', 'Mata memerah', 0, '11:10:00', 14),
(32, 8, 1, '2018-01-09', 'Mata berkunang saat melihat layar hp', 0, '14:52:00', 29),
(33, 20, 13, '2018-01-09', 'Kulit bercak bercak seperti cacar. dan gatal', 0, '02:55:00', 1),
(34, 12, 1, '2018-01-09', 'Sakit Perut', 10, '09:43:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `ID_DOKTER` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT '1',
  `NAMA_DOKTER` varchar(40) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `USERNAME` varchar(40) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `NO_TELPN` varchar(12) DEFAULT NULL,
  `ALAMAT` varchar(40) DEFAULT NULL,
  `AGAMA` varchar(20) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(40) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `NO_PRAKTEK` varchar(20) DEFAULT NULL,
  `SPESIALIS` varchar(30) DEFAULT NULL,
  `STATUS` int(5) DEFAULT '0',
  `STATUS_AKUN` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`ID_DOKTER`, `ID_USER`, `NAMA_DOKTER`, `EMAIL`, `USERNAME`, `PASSWORD`, `NO_TELPN`, `ALAMAT`, `AGAMA`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `NO_PRAKTEK`, `SPESIALIS`, `STATUS`, `STATUS_AKUN`) VALUES
(1, 1, 'Syahrul Julian', 'Koncopait@gmail.com', 'syahrul ', '123', '08122971126', 'Gulunan, Brujul, Jaten, Karanganyar', 'Islam', 'Karanganyar', '1980-01-09', '12480124', 'Mata', 0, 0),
(2, 1, 'Syahrul Munir', 'munir@gmail.com', 'muneron', '123', '08122971126', 'Gulunanl Brujul, Jaten, Karanganyar', 'Islam', 'Karanganyar', '1997-07-16', '12124224', 'Mata', 0, 10),
(12, 1, 'Raka Maulana', 'raka@gmail.com', 'raka', '123456', '09817481', '', 'islam', 'karanganyar', '1986-12-09', '16164816481', 'Anak', 0, 10),
(13, 1, 'Anggit Pangestu', 'anggit@gmail.com', 'anggit', '123456', '087299225', '', 'islam', 'jumapolo', '1992-01-09', '987138682', 'kulit & kelamin', 0, 10),
(14, 1, 'Yunus Renaldi', 'yunus@gmail.com', 'yunus', '123456', '09825982', '', 'islam', '', '1990-05-10', '827382', 'saraf', 0, 10),
(15, 1, 'Atsalis Dila', 'atsalis@gmail.com', 'atsalis', '123456', '0874827472', '', 'islam', 'pati', '1980-02-20', '27874862', 'paru-paru', 0, 10),
(21, 1, 'Alfin Eurekansina', 'alfin@gmail.com', 'alfin', '123456', '', '', '', '', '2018-01-09', '8263', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `ID_JADWAL` int(11) NOT NULL,
  `WAKTU_MULAI` time DEFAULT NULL,
  `WAKTU_SELESAI` time DEFAULT NULL,
  `ID_DOKTER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`ID_JADWAL`, `WAKTU_MULAI`, `WAKTU_SELESAI`, `ID_DOKTER`) VALUES
(1, '01:00:00', '11:30:00', 1),
(2, '01:00:00', '12:00:00', 2),
(3, '07:30:00', '03:30:00', 12),
(4, '07:30:00', '01:30:00', 13),
(5, '11:30:00', '03:30:00', 14),
(6, '08:45:00', '11:45:00', 15);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1511447175),
('m130524_201442_init', 1511447178);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `ID_OBAT` int(11) NOT NULL,
  `NAMA_OBAT` varchar(40) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `PRODUKSI` varchar(50) NOT NULL,
  `JUMLAH_STOK` int(10) NOT NULL,
  `TANGGAL_MASUK` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`ID_OBAT`, `NAMA_OBAT`, `HARGA`, `PRODUKSI`, `JUMLAH_STOK`, `TANGGAL_MASUK`) VALUES
(3, 'Paramex', 3000, 'PT KONIMEX', 30, '2018-02-09'),
(4, 'Ultraflu', 2500, 'PT HENSON FARMA', 30, '2018-02-09'),
(5, 'Bodrex Flu dan Batuk', 3000, 'PT Bode', 30, '2018-02-09'),
(6, 'Paracetamol', 4500, 'PT Kimia Farma', 30, '2018-02-09'),
(7, 'Tolak Angin', 3000, 'PT Sido Muncul', 50, '2018-03-10'),
(8, 'Panadol', 2500, 'PT Konimex', 40, '2018-02-10'),
(9, 'Stimuno', 4000, 'PT Biofarma', 30, '2018-02-10'),
(10, 'Bodrex Migrain', 4000, 'PT Dobe', 30, '2018-02-10'),
(11, 'Enstrostop', 5000, 'PT Konimex', 40, '2018-02-10'),
(12, 'Betadine', 5000, 'PT Konimex', 20, '2018-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `ID_PASIEN` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `NAMA_PASIEN` varchar(40) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `USERNAME` varchar(40) DEFAULT NULL,
  `PASSWORD` varchar(40) DEFAULT NULL,
  `NO_TELPN` varchar(12) DEFAULT NULL,
  `ALAMAT` varchar(40) DEFAULT NULL,
  `AGAMA` varchar(20) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(40) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `BERAT_BADAN` int(11) DEFAULT NULL,
  `TINGGI_BADAN` int(11) DEFAULT NULL,
  `GOL_DARAH` varchar(2) DEFAULT NULL,
  `STATUS` int(5) DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`ID_PASIEN`, `ID_USER`, `NAMA_PASIEN`, `EMAIL`, `USERNAME`, `PASSWORD`, `NO_TELPN`, `ALAMAT`, `AGAMA`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `BERAT_BADAN`, `TINGGI_BADAN`, `GOL_DARAH`, `STATUS`) VALUES
(1, 1, 'Wisnu Maulana', 'koncopait1@gmail.com', 'wisnu', 'maulana', '087835121007', 'sroyo, jaten, karanganyar', 'Islam', 'karanganyar', '2018-01-10', 75, 170, 'O', 1),
(4, 1, 'Ahmad Aziz Munaji', 'ahmadaziz@yahoo.com', 'ahmadaziz', '123456', '081325083454', 'Pattimura, Sidorejo, Salatiga', '', '', '1995-07-11', 0, 0, '', 1),
(5, 1, 'Raka Yulian', 'rakayulian@gmail.com', 'rakayuli', 'rakaganteng', '08985768156', 'Kadipiro RT01/24, Banjar Sari, Surakarta', '', '', '1997-07-12', 0, 0, '', 1),
(6, 1, 'Muhammad Rizky Yunus', 'yunus@gmail.com', 'yunus_', '123456', '081226656789', 'Karangmojo RT03/03, Tasikmadu, Karangany', '', '', '1997-08-17', 0, 0, '', 1),
(7, 1, 'Sukma Yulia', 'sukmayulia@gmail.com', 'sukmay', 'sebelasmaret', '08122971126', 'Bogor RT 07/04, Tawangsari, Klaten', '', '', '1997-12-25', 0, 0, '', 1),
(8, 1, 'Tutot Budi Luckyto', 'tutotbudi@gmail.com', 'luckyace', 'tutotbudi', '081345234154', '', 'Kristen', 'Karanganyar', '1997-02-11', 85, 180, 'O', 1),
(9, 1, 'Wulan Triyanti', 'wulantriyanti@gmail.com', 'wulan', 'triyanti', '081543678987', '', 'Islam', 'Surakarta', '1997-10-08', 65, 178, 'B', 1),
(10, 1, 'Yoko Setiyo', 'yokotiyo@gmail.com', 'yoko', 'setiyo', '087654321567', '', 'Islam', 'Sukoharjo', '1997-07-17', 60, 180, 'A', 1),
(11, 1, 'Niko Prabowo', 'nprabowo@gmail.con', '', '', '081543678987', 'Sukoharjo', 'Kristen', 'Sukoharjo', '1996-07-25', 85, 188, 'AB', 10),
(12, 1, 'Endra Dwi Susilo', 'endradwi@gmail.com', '', '', '081345234159', 'Sukoharjo', 'Islam', 'Sukoharjo', '1997-06-17', 70, 187, 'O', 10),
(13, 1, 'Muhammad Hafish', 'hafishtin@gmail.com', '', '', '081543678984', 'Sukoharjo', 'Islam', 'Sukoharjo', '1996-06-18', 70, 189, 'A', 10),
(14, 1, 'Berliana Lutfiananda', 'fia.lutfia@gmail.com', 'berliana_', 'manproindah', '081345234154', '', 'Islam', 'Sukoharjo', '1997-10-25', 65, 178, 'B', 1),
(15, 1, 'Aisyah NH', 'aisyah@gmail.com', '', '', '081325083454', 'Klaten', 'Islam', 'Sukoharjo', '1998-03-15', 60, 180, 'O', 10),
(16, 1, 'Fendi Fajar Utomo', 'fendi_fajar@gmail.com', '', '', '081543678989', 'Klaten', 'Islam', 'Klaten', '1999-07-28', 50, 170, 'B', 10),
(17, 1, 'Bangkit Putera', 'b_putera@yahoo.com', '', '', '087654321576', 'Pati', 'Islam', 'Pati', '1995-06-27', 67, 180, 'B', 10),
(18, 1, 'Muhammad Faisal Qomar', 'muhfaisal@gmail.com', '', '', '081345234165', 'Surakarta', 'Islam', 'Surakarta', '1997-11-13', 78, 178, 'B', 10),
(19, 1, 'Rien Putra', '', '', '', '081345234167', 'Wonogiri', 'Islam', 'Wonogiri', '2010-06-22', 40, 155, 'B', 10),
(20, 1, 'Zulfikar Ahmad F', '', 'zulgendut', 'makanenak', '081345234176', '', 'Islam', 'Wonogiri', '2009-06-30', 40, 148, 'O', 1),
(21, 1, 'Yanuar Arif R', 'yanuarif@gmail.com', 'yanuar_', 'tomel123', '087654321566', '', 'Islam', 'Surakarta', '2001-08-01', 45, 155, 'B', 1),
(22, 1, 'Tukiman', '', '', '', '087654678987', 'Jakarta', 'Islam', 'Jogja', '1991-06-25', 70, 189, 'A', 10),
(23, 1, 'Anas Huda', 'anas@gmail.com', '', '', '087654321567', 'Surakarta', 'Islam', 'Surakarta', '1989-11-23', 80, 180, 'O', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` int(11) NOT NULL,
  `BIAYA_PERIKSA` varchar(20) DEFAULT NULL,
  `TOTAL` varchar(20) DEFAULT NULL,
  `ID_RESEP` int(11) DEFAULT NULL,
  `ID_PERIKSA` int(11) NOT NULL,
  `BAYAR` varchar(20) NOT NULL,
  `KEMBALI` varchar(20) NOT NULL,
  `STATUS` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`ID_PEMBAYARAN`, `BIAYA_PERIKSA`, `TOTAL`, `ID_RESEP`, `ID_PERIKSA`, `BAYAR`, `KEMBALI`, `STATUS`) VALUES
(1, '40000', '15000', 0, 10, '55000', '60000', 10);

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `ID_PERIKSA` int(11) NOT NULL,
  `DIAGNOSA` text,
  `CATATAN` text,
  `ID_DOKTER` int(11) DEFAULT NULL,
  `ID_PASIEN` int(11) DEFAULT NULL,
  `ID_DAFTAR` int(11) NOT NULL,
  `STATUS` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`ID_PERIKSA`, `DIAGNOSA`, `CATATAN`, `ID_DOKTER`, `ID_PASIEN`, `ID_DAFTAR`, `STATUS`) VALUES
(10, 'Iritasi Mata', 'Tidak ada alergi obat', 2, 5, 27, 10);

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `ID_RESEP` int(11) NOT NULL,
  `TOTAL_HARGA` varchar(20) DEFAULT NULL,
  `ID_OBAT` int(11) DEFAULT NULL,
  `ID_PERIKSA` int(11) DEFAULT NULL,
  `DOSIS` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID_STAFF` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `NAMA_STAFF` varchar(40) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `USERNAME` varchar(40) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `NO_TELPN` varchar(12) DEFAULT NULL,
  `ALAMAT` varchar(40) DEFAULT NULL,
  `AGAMA` varchar(20) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(40) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `JOB_DESC` varchar(20) NOT NULL,
  `STATUS` int(5) DEFAULT '10',
  `pic` varchar(255) NOT NULL DEFAULT '/img/staff.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`ID_STAFF`, `user_id`, `NAMA_STAFF`, `EMAIL`, `USERNAME`, `PASSWORD`, `NO_TELPN`, `ALAMAT`, `AGAMA`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `JOB_DESC`, `STATUS`, `pic`, `created_at`, `updated_at`) VALUES
(33, 2, 'Asep Nugraha', 'asepnugraha@gmail.com', NULL, NULL, '087835121007', 'Sroyo, Jaten, Karanganyar', 'Islam', 'Karanganyar', '2018-01-10', 'Admin Klinik', 10, '/img/staff.jpg', '2018-01-11 01:31:13', '2018-01-11 01:33:59'),
(35, 4, 'Bambang Susatyo', 'bambang@gmail.com', NULL, NULL, '08587917376', 'Banjarsari, Surakarta', 'Islam', 'Karanganyar', '2018-01-10', 'Direktur Klinik', 10, '/img/staff.jpg', '2018-01-11 01:32:16', '2018-01-11 01:36:02'),
(36, 5, 'Shidiq Arief S', 'Shidiq@gmail.com', NULL, NULL, '0872482442', 'Cawas, Klaten', 'Islam', 'Klaten', '2018-01-10', 'Staff Poli Klinik', 10, '/img/staff.jpg', '2018-01-11 01:34:40', '2018-01-11 01:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id_pasien` varchar(10) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id_pasien`, `token`) VALUES
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('7', 'null'),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('10', 'eXe9Yasj2HI:APA91bH1-8g9Zn9MovoPY57iLYVsNeRZfZXmrp9svl0jqLo8W0KlJHH8gtT08eFZEqWwRAt9RBAI1t1Fwask11cr2kNvFuNUeWn7zs0xT5SBD0cZQimuLbJ6O-n9bhmfaXBII0J3Yhzu'),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('', ''),
('5', 'null'),
('8', 'eXe9Yasj2HI:APA91bH1-8g9Zn9MovoPY57iLYVsNeRZfZXmrp9svl0jqLo8W0KlJHH8gtT08eFZEqWwRAt9RBAI1t1Fwask11cr2kNvFuNUeWn7zs0xT5SBD0cZQimuLbJ6O-n9bhmfaXBII0J3Yhzu'),
('', ''),
('', '');

-- --------------------------------------------------------

--
-- Table structure for table `urut_periksa`
--

CREATE TABLE `urut_periksa` (
  `ID_URUT` int(11) NOT NULL,
  `NO_URUT` int(11) DEFAULT NULL,
  `WAKTU_PERIKSA` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urut_periksa`
--

INSERT INTO `urut_periksa` (`ID_URUT`, `NO_URUT`, `WAKTU_PERIKSA`) VALUES
(1, 1, '08:00:00'),
(2, 2, '08:15:00'),
(3, 3, '08:30:00'),
(4, 4, '08:45:00'),
(5, 5, '09:00:00'),
(6, 6, '09:15:00'),
(7, 7, '09:30:00'),
(8, 8, '09:45:00'),
(9, 9, '10:00:00'),
(10, 10, '10:15:00'),
(11, 11, '10:30:00'),
(12, 12, '10:45:00'),
(13, 13, '11:00:00'),
(14, 14, '11:15:00'),
(15, 15, '11:30:00'),
(16, 16, '11:45:00'),
(17, 17, '12:00:00'),
(18, 18, '12:15:00'),
(19, 19, '12:30:00'),
(20, 20, '12:45:00'),
(21, 21, '13:00:00'),
(22, 22, '13:15:00'),
(23, 23, '13:30:00'),
(24, 24, '13:45:00'),
(25, 25, '14:00:00'),
(26, 26, '14:15:00'),
(27, 27, '14:30:00'),
(28, 28, '14:45:00'),
(29, 29, '15:00:00'),
(30, 30, '15:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'user', '42YxZEEV_rP6FFxQ9ViLScpds4H2mdnZ', '$2y$13$eqFMdo3hR434Cj1pvyJnCuQWVsSyhB4uqRc5xN6MjX4y/muE23swK', '', 'koncopait@gmail.com', 10, 20, '0000-00-00 00:00:00', '2018-01-10 02:25:48'),
(2, 'admin', 'ZsnbXWSvHdbyUC4mmQEJaEvpEL1eefpI', '$2y$13$QyMfBuAeQh5x2w4qljZyxuuMGCtZJJ1if2oOreM9GdZoEHSDUvDaq', NULL, 'admin@gmail.com', 10, 20, '2018-01-11 01:31:13', '2018-01-11 01:31:13'),
(4, 'direktur', 'YPuFH1EHP8ciXYTXNqiFTzAw4I_1ix4_', '$2y$13$HyEpq7KwrmrsunX86CsPiO56qrRlgxvObWxurGQZL/DhG.z8.Lr.S', NULL, 'direktur@gmail.com', 10, 30, '2018-01-11 01:32:16', '2018-01-11 01:32:16'),
(5, 'staff', 'q2WKUhKMAZGkWZ_YWyRVK4W3AN_t63Fq', '$2y$13$FUsvKqdAOpna/Eeazpipk.x4OsxB8/dhPGad1dXDSGoQMiFU2t86a', NULL, 'staff@gmail.com', 10, 10, '2018-01-11 01:34:40', '2018-01-11 01:34:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD KEY `ID_USER` (`user_id`);

--
-- Indexes for table `daftar_periksa`
--
ALTER TABLE `daftar_periksa`
  ADD PRIMARY KEY (`ID_DAFTAR`),
  ADD KEY `ID_PASIEN` (`ID_PASIEN`),
  ADD KEY `ID_DOKTER` (`ID_DOKTER`),
  ADD KEY `ID_URUT` (`ID_URUT`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`ID_DOKTER`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `ID_DOKTER` (`ID_DOKTER`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`ID_OBAT`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_PASIEN`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `ID_RESEP` (`ID_RESEP`),
  ADD KEY `ID_PERIKSA` (`ID_PERIKSA`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`ID_PERIKSA`),
  ADD KEY `ID_DOKTER` (`ID_DOKTER`),
  ADD KEY `ID_PASIEN` (`ID_PASIEN`),
  ADD KEY `ID_DAFTAR` (`ID_DAFTAR`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`ID_RESEP`),
  ADD KEY `ID_OBAT` (`ID_OBAT`),
  ADD KEY `ID_PERIKSA` (`ID_PERIKSA`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID_STAFF`),
  ADD KEY `ID_USER` (`user_id`);

--
-- Indexes for table `urut_periksa`
--
ALTER TABLE `urut_periksa`
  ADD PRIMARY KEY (`ID_URUT`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daftar_periksa`
--
ALTER TABLE `daftar_periksa`
  MODIFY `ID_DAFTAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `ID_DOKTER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `ID_JADWAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `ID_OBAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `ID_PASIEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `ID_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `ID_PERIKSA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `ID_RESEP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID_STAFF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `urut_periksa`
--
ALTER TABLE `urut_periksa`
  MODIFY `ID_URUT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daftar_periksa`
--
ALTER TABLE `daftar_periksa`
  ADD CONSTRAINT `daftar_periksa_ibfk_1` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`),
  ADD CONSTRAINT `daftar_periksa_ibfk_2` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`),
  ADD CONSTRAINT `daftar_periksa_ibfk_3` FOREIGN KEY (`ID_URUT`) REFERENCES `urut_periksa` (`ID_URUT`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`);

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`ID_RESEP`) REFERENCES `resep` (`ID_RESEP`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`ID_PERIKSA`) REFERENCES `periksa` (`ID_PERIKSA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`ID_DOKTER`) REFERENCES `dokter` (`ID_DOKTER`),
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`ID_PASIEN`) REFERENCES `pasien` (`ID_PASIEN`),
  ADD CONSTRAINT `periksa_ibfk_3` FOREIGN KEY (`ID_DAFTAR`) REFERENCES `daftar_periksa` (`ID_DAFTAR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`ID_OBAT`) REFERENCES `obat` (`ID_OBAT`),
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`ID_PERIKSA`) REFERENCES `periksa` (`ID_PERIKSA`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
