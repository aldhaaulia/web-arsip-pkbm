-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2022 at 03:50 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axo_skripsi_arsip_pkbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_akun`
--

CREATE TABLE `tm_akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text,
  `is_active` enum('0','1') DEFAULT '1',
  `user_dir` text,
  `tgl_create` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_akun`
--

INSERT INTO `tm_akun` (`id_akun`, `nama`, `role`, `email`, `password`, `is_active`, `user_dir`, `tgl_create`, `tgl_update`) VALUES
(1, 'Salza', 1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'dir_78852fa8789de7e', NULL, NULL),
(3, 'Mochammad Faisal', 2, 'kepsek@kepsek.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'dir_326e77575ec3573', '2022-06-07 09:28:23', NULL),
(4, 'Mochammad Faisal', 3, 'operator@operator.com', '21232f297a57a5a743894a0e4a801fc3', '1', 'dir_319e77575ec3573', '2022-06-10 08:55:26', '2022-06-10 08:56:03'),
(5, 'Mochammad Faisal', 3, 'siswa2@mts.com', '21232f297a57a5a743894a0e4a801fc3', '1', NULL, '2022-06-14 04:19:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_jenis_surat`
--

CREATE TABLE `tm_jenis_surat` (
  `id_jenis_surat` int(11) NOT NULL,
  `nama_jenis` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `create_by` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_jenis_surat`
--

INSERT INTO `tm_jenis_surat` (`id_jenis_surat`, `nama_jenis`, `keterangan`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 'Regular', 'Biasa', NULL, '2022-06-27 16:05:36', NULL, NULL),
(2, 'Spam', NULL, NULL, '2022-06-27 16:05:36', NULL, NULL),
(3, 'Urgent', 'Darurat', NULL, '2022-06-27 16:05:36', NULL, NULL),
(4, 'Confidential', 'Rahasia', NULL, '2022-06-27 16:05:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_menu`
--

CREATE TABLE `tm_menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `slider` enum('0','1') DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `sort_no` int(11) DEFAULT NULL,
  `keterangan` text,
  `is_active` enum('0','1') DEFAULT '1' COMMENT '0=tidak aktif, 1=aktif',
  `date_create` datetime DEFAULT NULL,
  `user_create` int(11) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `user_update` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tm_menu`
--

INSERT INTO `tm_menu` (`id`, `parent_id`, `name`, `icon`, `slider`, `url`, `sort_no`, `keterangan`, `is_active`, `date_create`, `user_create`, `date_update`, `user_update`) VALUES
(1, 0, 'Dashboard', 'fas fa-th', '0', 'backend/home', 0, 'Dashboard', '1', NULL, NULL, '2022-07-22 08:20:55', NULL),
(2, 0, 'Dokumen', 'fas fa-file-alt', '1', NULL, 1, 'Dokumen Surat', '1', NULL, NULL, '2022-07-22 08:20:55', 1),
(3, 1, 'Import Data', 'empty', '0', 'tpl_file', 1, NULL, '0', NULL, NULL, '2022-06-23 15:08:20', NULL),
(4, 2, 'Surat Masuk', 'fas fa-inbox', '0', 'backend/dokumen/masuk', 0, 'Surat Masuk', '1', NULL, NULL, '2022-07-22 08:20:55', NULL),
(5, 2, 'Surat Keluar', 'fas fa-sign-out-alt', '0', 'backend/dokumen/keluar', 1, 'Surat Keluar', '1', NULL, NULL, '2022-07-22 08:20:55', NULL),
(6, 0, 'User Management', 'fas fa-user-cog', '1', NULL, 4, 'User Management', '0', NULL, NULL, '2022-07-18 05:00:59', NULL),
(7, 6, 'Privilage User', 'fas fa-user-friends', '0', 'user/privilage', 0, 'Privilage User', '0', NULL, NULL, '2022-07-18 05:00:59', NULL),
(8, 0, 'User Management', 'fas fa-user-friends', '0', 'backend/user/datauser', 4, 'User Management', '1', NULL, NULL, '2022-07-22 08:20:55', NULL),
(9, 0, 'Dokumen Penting', 'fas fa-exclamation-triangle', '0', 'backend/dokumen/penting', 3, 'Dokumen Penting', '1', '2022-06-27 06:28:23', NULL, '2022-07-22 08:20:55', NULL),
(10, 0, 'Master Data', 'fas fa-wrench', '1', '', 5, 'Master Data', '0', '2022-06-27 06:33:18', NULL, '2022-07-22 08:20:55', NULL),
(11, 10, 'Menu', 'fas fa-list', '0', 'backend/master/menu', 0, 'Menu', '0', '2022-06-27 06:33:31', NULL, '2022-07-22 08:20:55', NULL),
(12, 0, 'Disposisi Surat', 'fas fa-clipboard-check', '0', 'backend/disposisi', 2, 'Disposisi oleh kepsek', '1', '2022-06-29 06:33:54', NULL, '2022-07-22 08:20:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_profile`
--

CREATE TABLE `tm_profile` (
  `id_profile` int(11) NOT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `nama_profile` varchar(50) DEFAULT NULL,
  `nik_profile` bigint(20) DEFAULT NULL,
  `alamat` text,
  `email_profile` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl_create` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_profile`
--

INSERT INTO `tm_profile` (`id_profile`, `id_akun`, `nama_profile`, `nik_profile`, `alamat`, `email_profile`, `no_telp`, `tempat_lahir`, `tgl_lahir`, `tgl_create`, `tgl_update`) VALUES
(1, 1, 'Salza', 0, 'Jl. Industri Raya No. 9-11, Wisma Griya Kemayoran, Unit R-89', 'admin@admin.com', '087776088441', 'Jakarta', '1999-07-09', NULL, NULL),
(2, 3, 'Mochammad Faisal', 123123, 'asdasd', 'faisal@salz.com', '12312313', '123', '2022-06-09', '2022-06-07 09:28:23', NULL),
(3, 4, 'Mochammad Faisal', NULL, NULL, 'siswa1@mts.com', NULL, NULL, NULL, '2022-06-10 08:55:26', NULL),
(4, 5, 'Mochammad Faisal', NULL, NULL, 'siswa2@mts.com', NULL, NULL, NULL, '2022-06-14 04:19:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tm_role`
--

CREATE TABLE `tm_role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `list_menu` text,
  `tgl_create` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_role`
--

INSERT INTO `tm_role` (`id_role`, `nama`, `list_menu`, `tgl_create`, `tgl_update`) VALUES
(1, 'Admin', '1,2,3,4,5,6,7,8,9,10,11,12', NULL, NULL),
(2, 'Kepala Sekolah', '1,9,12', NULL, NULL),
(3, 'Operator', '1,2,4,5,9', NULL, NULL),
(4, 'Guru', NULL, '2022-06-30 04:53:15', '2022-06-30 04:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `tm_settings`
--

CREATE TABLE `tm_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` text,
  `desc` text,
  `tgl_create` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_settings`
--

INSERT INTO `tm_settings` (`id`, `name`, `value`, `desc`, `tgl_create`, `tgl_update`) VALUES
(1, 'about_school_title', 'Selamat Datang di PPDB MTS Al-Qur\'aniyah Ulujami', NULL, NULL, '2022-06-09 08:43:26'),
(2, 'about_school_desc', 'Madrasah Tsanawiyah Al Quraniyah Ulujami memiliki staf pengajar guru yang kompeten pada bidang pelajarannya sehingga berkualitas dan menjadi salah satu yang terbaik di Kota Jakarta Selatan.\r\n<br>\r\nMerupakan sekolah yang melayani pengajaran jenjang pendidikan Sekolah Menengah Pertama (SMP) di Kota Jakarta Selatan. Adapun pelajaran yang diberikan meliputi semua mata pelajaran wajib sesuai kurikulum nasional dengan tambahan nilai-nilai agama Islam.', NULL, NULL, '2022-06-09 08:43:26'),
(3, 'contact_address', 'Jl. Duri Kencana Timur, Duri Kepa, Kec. Kebon Jeruk Kota Jakarta Barat 11510', NULL, NULL, '2022-06-09 08:51:59'),
(4, 'contact_phone', '0898-9972-566', NULL, NULL, '2022-06-09 08:51:59'),
(5, 'contact_email', 'pkbmtigapuluh@yahoo.com', NULL, NULL, '2022-06-09 08:51:59'),
(6, 'app_name', 'Dokumen Management Sistem', NULL, NULL, '2022-06-20 04:51:42'),
(7, 'school_desc', 'Program Sekolah Paket adalah program pembelajaran sekolah Non Formal untuk semua kalangan Umur, Program yang di sediakan pula meliputi Paket A (setara SD), Paket B (setara SMP), Paket C (setara SMA). PKBMN Negeri 30 Pada bulan Januari 2017 sudah di tetapkan Oleh BAP sebagai PKBM ter AKREDITASI. Untuk Paket A di tentukan layak Ujian Nasional sesuai dengan Umur  minimal 12 Tahun, untuk umur 12 Tahun ke bawah masih harus mengikuti pembelajaran sesuai Kelas nya.', NULL, NULL, '2022-06-20 04:51:42'),
(8, 'berkas_status_review', 'Berkas sedang di verifikasi', NULL, NULL, '2022-06-14 04:45:59'),
(9, 'berkas_status_approved', 'Berkas sudah di verifikasi', NULL, NULL, '2022-06-14 04:45:59'),
(10, 'app_logo', 'logo.png', NULL, NULL, '2022-06-09 09:12:19'),
(11, 'about_school_image', 'guru.jpg', NULL, NULL, '2022-06-09 08:35:43'),
(12, 'berkas_status_rejected', 'Berkas tidak lolos diseleksi', NULL, NULL, '2022-06-14 04:45:59'),
(13, 'berkas_file_register', 'FORMULIR.pdf', NULL, NULL, '2022-06-14 04:45:59'),
(14, 'is_register_login_open', 'false', 'disable regiser & login button & link(except login)\r\nset true untuk buka pendaftaran\r\nset false untuk tutup pendaftaran', NULL, '2022-06-20 04:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `tm_slider`
--

CREATE TABLE `tm_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `image` text,
  `is_active` enum('0','1') DEFAULT '1',
  `tgl_create` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_slider`
--

INSERT INTO `tm_slider` (`id`, `title`, `subtitle`, `desc`, `image`, `is_active`, `tgl_create`, `tgl_update`) VALUES
(1, 'Pendaftaran Online', 'Madrasah Tsanawiyah Al-Qur\'aniyah Ulujami', 'Merupakan sekolah yang melayani pengajaran jenjang pendidikan Sekolah Menengah Pertama (SMP) di Kota Jakarta Selatan. Adapun pelajaran yang diberikan meliputi semua mata pelajaran wajib sesuai kurikulum nasional dengan tambahan nilai-nilai agama Islam.', 'siswa-1.jpg', '1', '2022-06-08 12:43:14', '2022-06-08 08:05:48'),
(2, 'Pendaftaran Online', 'Madrasah Tsanawiyah Al-Qur\'aniyah Ulujami', 'Madrasah Tsanawiyah Al Quraniyah Ulujami memiliki staf pengajar guru yang kompeten pada bidang pelajarannya sehingga berkualitas dan menjadi salah satu yang terbaik di Kota Jakarta Selatan.', 'siswa-2.jpg', '1', NULL, '2022-06-09 05:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `tr_surat`
--

CREATE TABLE `tr_surat` (
  `id_surat` int(11) NOT NULL,
  `id_jenis_surat` int(11) DEFAULT NULL COMMENT 'reff table tm_jenis_surat',
  `no_surat` varchar(255) DEFAULT NULL,
  `asal_surat` varchar(500) DEFAULT 'PKBM Negeri 30',
  `tipe_surat` int(11) DEFAULT NULL COMMENT '1=surat masuk, 2=surat keluar',
  `perihal` varchar(255) DEFAULT NULL,
  `kepada` varchar(255) DEFAULT NULL,
  `disposisi` text,
  `file_berkas` text,
  `lampiran` varchar(225) DEFAULT NULL,
  `file_lampiran` text,
  `label` int(11) NOT NULL DEFAULT '0' COMMENT '0 = false, 1 = Surat Biasa, 2 = Surat Penting',
  `create_by` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0' COMMENT '0=false, 1=true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_surat`
--

INSERT INTO `tr_surat` (`id_surat`, `id_jenis_surat`, `no_surat`, `asal_surat`, `tipe_surat`, `perihal`, `kepada`, `disposisi`, `file_berkas`, `lampiran`, `file_lampiran`, `label`, `create_by`, `create_date`, `update_by`, `update_date`, `is_delete`) VALUES
(1, 2, '001', 'axometrix', 1, 'Undangan Kegiatan', 'Kepala Bidang Kesiswaan', 'bla lba', 'berkas_1657606854.1555.png', 'Design 3d', 'lampiran_1657606854.2045.jpg', 1, 1, '2022-07-08 13:20:54', 1, '2022-07-22 17:34:47', 0),
(2, 3, '002', 'SMA N 80', 1, 'Kegiatan Pesantren Kilat', 'Kepala Sekolah', 'Segera infokan ke bagian terkait. surat penting', 'berkas_1657100259.6847.pdf', 'Undangan', 'lampiran_1657607431.2378.jpg', 2, 1, '2022-07-10 13:30:31', 1, '2022-07-18 12:21:48', 0),
(3, 4, '1001', 'PKBM Negeri 30', 2, 'Surat Peringatan', 'SMA Pembangunan', 'Belum ada', 'berkas_1657607550.8215.jpg', 'Barang Bukti', 'lampiran_1657607550.8483.jpg', 1, 1, '2022-07-11 13:32:30', NULL, NULL, 1),
(4, 1, '1002', 'PKBM Negeri 30', 2, 'Kegiatan Sekolah', 'Kepegawaian', 'Beri arahan ke bidang kepegawaian untuk rekrut honorer', 'berkas_1657100259.6847.pdf', 'Tidak Ada Lampiran', NULL, 2, 1, '2022-07-12 13:33:24', 1, '2022-07-18 12:21:59', 0),
(5, 4, 'Test-0001-30-06-2022', 'Axometrix', 1, 'Testing Surat 5', 'Bagian Keuangan', 'Surat COnfidential', NULL, 'Tidak Ada Lampiran', NULL, 2, 4, '2022-07-22 14:57:15', 1, '2022-07-22 15:04:54', 0),
(6, 3, 'In-0001-08-07-2022', 'SMA N 80', 1, 'Undangan edit', 'Kesiswaan', 'Belum ada', NULL, 'Tidak Ada Lampiran', NULL, 0, 1, '2022-07-22 17:35:38', 1, '2022-07-22 17:56:35', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_akun`
--
ALTER TABLE `tm_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tm_jenis_surat`
--
ALTER TABLE `tm_jenis_surat`
  ADD PRIMARY KEY (`id_jenis_surat`);

--
-- Indexes for table `tm_menu`
--
ALTER TABLE `tm_menu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id` (`id`,`parent_id`);

--
-- Indexes for table `tm_profile`
--
ALTER TABLE `tm_profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD UNIQUE KEY `nik_profile` (`nik_profile`),
  ADD UNIQUE KEY `email_profle` (`email_profile`);

--
-- Indexes for table `tm_role`
--
ALTER TABLE `tm_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tm_settings`
--
ALTER TABLE `tm_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tm_slider`
--
ALTER TABLE `tm_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_surat`
--
ALTER TABLE `tr_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_akun`
--
ALTER TABLE `tm_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_jenis_surat`
--
ALTER TABLE `tm_jenis_surat`
  MODIFY `id_jenis_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_menu`
--
ALTER TABLE `tm_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tm_profile`
--
ALTER TABLE `tm_profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_role`
--
ALTER TABLE `tm_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_settings`
--
ALTER TABLE `tm_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tm_slider`
--
ALTER TABLE `tm_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tr_surat`
--
ALTER TABLE `tr_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
