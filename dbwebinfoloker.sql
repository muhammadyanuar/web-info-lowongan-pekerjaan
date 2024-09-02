-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 10:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS dbwebinfoloker;
CREATE DATABASE IF NOT EXISTS dbwebinfoloker;
USE dbwebinfoloker;

CREATE TABLE `akun_pencari_kerja` (
  `id` INT(11) NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `tanggal_lahir` DATE DEFAULT NULL,
  `gender` ENUM('Pria','Wanita') DEFAULT NULL,
  `foto_profil` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `akun_pencari_kerja` (`id`, `nama`, `tanggal_lahir`, `gender`, `foto_profil`, `email`, `password`) VALUES
(1, 'Joni', '2000-01-01', 'Pria', 'profile_664e3a58ec83e3.59570051.png', 'joni@gmail.com', '$2y$10$06TSdaKM3A/AePD7uaWI.eZEeyov8MKXcfMKIV6UwLT8zOdD3iLzG'),
(2, 'Kalfin', '1999-01-01', 'Pria', 'profile_665367775c6176.26486513.png', 'kalfin@gmail.com', '$2y$10$KECLVJOLZJqOWOgNQnvEP.Bl3l1xVgpBYdw2jcvSPUy7uJ2AjEadK');

CREATE TABLE `akun_perusahaan` (
  `id` INT(11) NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `foto_profil` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `akun_perusahaan` (`id`, `nama`, `foto_profil`, `email`, `password`) VALUES
(1, 'PT JAYA MAYA', 'profile_66536f334d18c8.00176713.png', 'jayamaya@gmail.com', '$2y$10$ClOmg8QzgDQWJZPEHHea8O0EhngJ5Nt4.9xOAfHitn0rYHHTL3.0y'),
(2, 'PT SUKSES ABADI', 'profile_664e52621953b9.57012813.png', 'suksesabadi@gmail.com', '$2y$10$lVnQN6LHd0myZIBXmpwZPO8UiYHnDGMLKak6SpF17E.t6GRnEMvau');

CREATE TABLE `history` (
  `id` INT(11) NOT NULL,
  `waktu_melamar` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `id_pencari_kerja` INT(11) DEFAULT NULL,
  `id_perusahaan` INT(11) NOT NULL,
  `id_loker` INT(11) DEFAULT NULL,
  `file_cv` VARCHAR(255) DEFAULT NULL,
  `file_scan_ktp` VARCHAR(255) DEFAULT NULL,
  `file_ijazah` VARCHAR(255) DEFAULT NULL,
  `file_pass_foto` VARCHAR(255) DEFAULT NULL,
  `file_sertifikat` VARCHAR(255) DEFAULT NULL,
  `file_portfolio` VARCHAR(255) DEFAULT NULL,
  `alasan` VARCHAR(255) DEFAULT NULL,
  `status` ENUM('diterima','ditolak','pending') DEFAULT 'pending'
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `history` (`id`, `waktu_melamar`, `id_pencari_kerja`, `id_perusahaan`, `id_loker`, `file_cv`, `file_scan_ktp`, `file_ijazah`, `file_pass_foto`, `file_sertifikat`, `file_portfolio`, `alasan`, `status`) VALUES
(3, '2024-05-23 18:09:04', 1, 1, 1, 'uploads/apply/cv/file_664f864075ca05.83378638.pdf', 'uploads/apply/scan_ktp/file_664f864075e690.98386565.pdf', 'uploads/apply/ijazah/file_664f8640760477.03108759.pdf', 'uploads/apply/pass_foto/file_664f8640761844.76514880.jpg', NULL, NULL, 'Karena saya suka', 'diterima'),
(6, '2024-05-23 23:28:10', 2, 1, 2, 'uploads/apply/cv/file_664fd10acde214.75888146.pdf', 'uploads/apply/scan_ktp/file_664fd10acdfb49.64722493.pdf', 'uploads/apply/ijazah/file_664fd10ace0772.65178682.pdf', 'uploads/apply/pass_foto/file_664fd10ace1366.28969177.jpg', 'uploads/apply/sertifikat/file_664fd10ace1fc1.44491625.pdf', 'uploads/apply/portfolio/file_664fd10ace2a10.04399567.pdf', 'kayaknya saya bisa', 'diterima');

CREATE TABLE `loker` (
  `id` INT(11) NOT NULL,
  `id_perusahaan` INT(11) NOT NULL,
  `profesi` VARCHAR(100) DEFAULT NULL,
  `posisi` VARCHAR(100) DEFAULT NULL,
  `gaji` DECIMAL(10,2) DEFAULT NULL,
  `syaratpendidikan` VARCHAR(100) DEFAULT NULL,
  `lokasi` VARCHAR(100) DEFAULT NULL,
  `usiamin` INT(11) DEFAULT NULL,
  `usiamax` INT(11) DEFAULT NULL,
  `prioritasgender` VARCHAR(10) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `loker` (`id`, `id_perusahaan`, `profesi`, `posisi`, `gaji`, `syaratpendidikan`, `lokasi`, `usiamin`, `usiamax`, `prioritasgender`) VALUES
(1, 1, 'Web Developer', 'Frontend', 8000000.00, 'S1 Informatika', 'Surabya', 22, 35, 'Tidak Ada'),
(2, 1, 'Web Developer', 'Backend', 10000000.00, 'S1 Informatika', 'Surabya', 22, 35, 'Tidak Ada'),
(3, 1, 'Web Developer', 'Fullstack', 12000000.00, 'S1 Informatika', 'Surabya', 22, 35, 'Tidak Ada'),
(4, 2, 'Pekerja Kantoran', 'Akuntansi', 10000000.00, 'S1 Akutansi', 'Surabya', 25, 40, 'Tidak Ada'),
(5, 2, 'Pekerja Kantoran', 'Asisten CEO', 15000000.00, 'S1 Ekonomi Bisnis', 'Surabya', 22, 30, 'Tidak Ada'),
(6, 2, 'Manger', 'Manager Gudang', 15000000.00, 'S1 Managemen', 'Surabya', 24, 28, 'Tidak Ada'),
(7, 1, 'Desktop App Developer', 'Security', 30000000.00, 'S1 Informatika', 'Surabya', 25, 35, 'Tidak Ada');

CREATE TABLE `tips_mencari_pekerjaan` (
  `id` INT(11) NOT NULL,
  `tips` TEXT DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tips_mencari_pekerjaan` (`id`, `tips`) VALUES
(1, 'Jadilah proaktif dalam mencari pekerjaan.'),
(2, 'Perbarui dan perbaiki CV dan surat lamaran Anda secara teratur.'),
(3, 'Jangan ragu untuk memanfaatkan jaringan Anda.'),
(4, 'Ikuti pelatihan dan kursus untuk meningkatkan keterampilan Anda.'),
(5, 'Gunakan platform pencarian pekerjaan online secara teratur.'),
(6, 'Riset perusahaan yang Anda minati sebelum mengajukan lamaran.'),
(7, 'Siapkan diri Anda dengan baik untuk wawancara.'),
(8, 'Bangun kehadiran online yang profesional.'),
(9, 'Perhatikan detail dalam setiap tahap proses seleksi.'),
(10, 'Jangan malu untuk mengikuti magang atau pekerjaan kontrak.'),
(11, 'Gunakan media sosial untuk memperluas jaringan Anda.'),
(12, 'Menghadiri acara karir dan pameran pekerjaan.'),
(13, 'Kembangkan keterampilan interpersonal Anda.'),
(14, 'Jadilah fleksibel dengan jenis pekerjaan yang Anda cari.'),
(15, 'Perluas pengetahuan Anda tentang industri tertentu.'),
(16, 'Bergabunglah dengan kelompok atau komunitas profesional.'),
(17, 'Buatlah profil LinkedIn yang menarik dan lengkap.'),
(18, 'Praktikkan wawancara kerja dengan teman atau keluarga.'),
(19, 'Jadilah proaktif dalam mencari peluang kerja tersembunyi.'),
(20, 'Ikuti blog atau situs web yang berfokus pada karir.'),
(21, 'Gunakan kata kunci yang relevan dalam pencarian pekerjaan online.'),
(22, 'Jangan lewatkan kesempatan untuk berpartisipasi dalam proyek.'),
(23, 'Perhatikan etika dan profesionalisme dalam setiap interaksi.'),
(24, 'Manfaatkan program referral dari perusahaan.'),
(25, 'Kembangkan keterampilan presentasi Anda.'),
(26, 'Jadilah ahli dalam mengerjakan tes psikometrik.'),
(27, 'Bangun hubungan yang kuat dengan rekruter.'),
(28, 'Perhatikan lingkungan dan budaya perusahaan.'),
(29, 'Gunakan bahasa tubuh yang positif selama wawancara.'),
(30, 'Jadilah terbuka terhadap umpan balik dan saran.'),
(31, 'Perhatikan keseimbangan antara kehidupan kerja dan pribadi.'),
(32, 'Manfaatkan platform freelance untuk mendapatkan pengalaman.'),
(33, 'Buatlah portofolio online yang menarik.'),
(34, 'Perhatikan gaya berpakaian yang sesuai dengan industri.'),
(35, 'Pahami tren dan perkembangan dalam industri Anda.'),
(36, 'Jangan ragu untuk menghubungi perusahaan langsung.'),
(37, 'Pelajari pertanyaan umum dalam wawancara dan siapkan jawaban.'),
(38, 'Gunakan kesempatan magang sebagai pintu masuk ke pekerjaan.'),
(39, 'Kembangkan keterampilan komunikasi Anda.'),
(40, 'Perhatikan keselarasan antara nilai perusahaan dan nilai pribadi Anda.'),
(41, 'Perhatikan cara Anda mengelola waktu.'),
(42, 'Jadilah terbuka terhadap pekerjaan sementara atau kontrak.'),
(43, 'Ikuti kursus online untuk meningkatkan keterampilan Anda.'),
(44, 'Kembangkan jaringan Anda di berbagai platform.'),
(45, 'Jadilah aktif di komunitas terkait industri Anda.'),
(46, 'Manfaatkan kesempatan untuk menghadiri seminar atau lokakarya.'),
(47, 'Jangan lupakan pentingnya kegiatan relawan dalam CV Anda.'),
(48, 'Manfaatkan kesempatan untuk mengembangkan keahlian baru.'),
(49, 'Jadilah kreatif dalam mencari peluang pekerjaan.'),
(50, 'Manfaatkan kesempatan untuk belajar dari pengalaman orang lain.'),
(51, 'Jadilah terbuka terhadap pekerjaan jarak jauh atau remote.'),
(52, 'Perhatikan keseimbangan antara kemampuan dan minat Anda.'),
(53, 'Perbarui profil LinkedIn Anda secara teratur dengan prestasi terbaru.'),
(54, 'Jadilah fasih dalam bahasa Inggris atau bahasa yang relevan dalam industri Anda.'),
(55, 'Perhatikan etika dalam berkomunikasi melalui email atau telepon.'),
(56, 'Bersikaplah optimis dan percaya diri dalam mencari pekerjaan.'),
(57, 'Manfaatkan teknologi untuk memperluas jangkauan pencarian pekerjaan Anda.'),
(58, 'Jangan ragu untuk meminta rekomendasi dari mantan atasan atau rekan kerja.'),
(59, 'Jaga kesehatan fisik dan mental Anda selama proses mencari pekerjaan.'),
(60, 'Bangun hubungan yang positif dengan perusahaan tempat Anda melamar.'),
(61, 'Perhatikan keahlian dan kualifikasi yang diminta dalam iklan lowongan.'),
(62, 'Kembangkan kemampuan untuk menulis laporan atau proposal.'),
(63, 'Perhatikan budaya kerja yang ada di perusahaan yang Anda minati.'),
(64, 'Jadilah terbuka terhadap peluang pekerjaan di luar kota atau negara.'),
(65, 'Bersiaplah untuk menjelaskan gap dalam riwayat pekerjaan Anda secara jelas.'),
(66, 'Perbarui profil profesional Anda di situs web dan platform lainnya.'),
(67, 'Manfaatkan mentor atau coach untuk memberikan arahan dalam karir Anda.'),
(68, 'Jadilah adaptif terhadap perubahan dalam industri atau pasar kerja.'),
(69, 'Perhatikan detail ketika menyiapkan dokumen lamaran dan CV Anda.'),
(70, 'Manfaatkan waktu luang untuk meningkatkan keterampilan Anda.'),
(71, 'Pahami kebutuhan dan harapan Anda dalam pekerjaan yang Anda cari.'),
(72, 'Bersiaplah untuk menjawab pertanyaan tentang kelemahan Anda.'),
(73, 'Jangan lewatkan kesempatan untuk mendapatkan sertifikasi tambahan.'),
(74, 'Jadilah aktif dalam forum atau grup diskusi online terkait karir.'),
(75, 'Manfaatkan waktu untuk merefleksikan pencapaian dan tujuan karir Anda.'),
(76, 'Jalin hubungan dengan alumni perguruan tinggi atau universitas Anda.'),
(77, 'Bersiaplah untuk menjelaskan alasan Anda meninggalkan pekerjaan sebelumnya.'),
(78, 'Perhatikan perkembangan teknologi yang relevan dengan industri Anda.'),
(79, 'Bangun koneksi dengan perusahaan yang mungkin tidak sedang merekrut.'),
(80, 'Jadilah terbuka terhadap kesempatan pekerjaan yang tidak biasa.'),
(81, 'Perhatikan bahasa tubuh Anda saat berkomunikasi secara langsung.'),
(82, 'Manfaatkan kesempatan untuk menjadi relawan dalam acara industri.'),
(83, 'Perhatikan cara Anda merespons pertanyaan tentang gaji dan tunjangan.'),
(84, 'Buatlah rencana karir jangka pendek dan jangka panjang.'),
(85, 'Manfaatkan kesempatan untuk berbicara langsung dengan rekruter.'),
(86, 'Jadilah terbuka terhadap umpan balik dan kritik untuk memperbaiki diri.'),
(87, 'Perhatikan tren pasar kerja dalam industri yang Anda minati.'),
(88, 'Bangun keahlian dalam menggunakan perangkat lunak atau aplikasi yang relevan.'),
(89, 'Jadilah terorganisir dalam mengelola aplikasi dan jadwal wawancara Anda.'),
(90, 'Manfaatkan kesempatan untuk menghadiri workshop atau seminar karir.'),
(91, 'Jangan ragu untuk mencari bantuan dari profesional karir atau konsultan.'),
(92, 'Perhatikan keselarasan antara nilai perusahaan dan visi Anda.'),
(93, 'Jadilah terbuka terhadap kesempatan untuk bekerja secara kontrak.'),
(94, 'Manfaatkan kesempatan untuk menjadi mentor bagi sesama pencari kerja.'),
(95, 'Perhatikan tren kompensasi dan paket tunjangan di industri Anda.'),
(96, 'Bersiaplah untuk menjelaskan bagaimana Anda mengatasi tantangan dalam pekerjaan.'),
(97, 'Manfaatkan kesempatan untuk mengikuti webinar atau konferensi online.'),
(98, 'Jadilah terbuka terhadap peluang karir di luar bidang utama Anda.'),
(99, 'Manfaatkan kesempatan untuk belajar dari pengalaman orang lain.'),
(100, 'Jadilah terbuka terhadap pekerjaan jarak jauh atau remote.'),
(101, 'Perhatikan keseimbangan antara kemampuan dan minat Anda.'),
(102, 'Perbarui profil LinkedIn Anda secara teratur dengan prestasi terbaru.'),
(103, 'Jadilah fasih dalam bahasa Inggris atau bahasa yang relevan dalam industri Anda.'),
(104, 'Perhatikan etika dalam berkomunikasi melalui email atau telepon.'),
(105, 'Bersikaplah optimis dan percaya diri dalam mencari pekerjaan.'),
(106, 'Manfaatkan teknologi untuk memperluas jangkauan pencarian pekerjaan Anda.'),
(107, 'Jangan ragu untuk meminta rekomendasi dari mantan atasan atau rekan kerja.'),
(108, 'Jaga kesehatan fisik dan mental Anda selama proses mencari pekerjaan.'),
(109, 'Bangun hubungan yang positif dengan perusahaan tempat Anda melamar.'),
(110, 'Perhatikan keahlian dan kualifikasi yang diminta dalam iklan lowongan.'),
(111, 'Kembangkan kemampuan untuk menulis laporan atau proposal.'),
(112, 'Perhatikan budaya kerja yang ada di perusahaan yang Anda minati.'),
(113, 'Jadilah terbuka terhadap peluang pekerjaan di luar kota atau negara.'),
(114, 'Bersiaplah untuk menjelaskan gap dalam riwayat pekerjaan Anda secara jelas.'),
(115, 'Perbarui profil profesional Anda di situs web dan platform lainnya.'),
(116, 'Manfaatkan mentor atau coach untuk memberikan arahan dalam karir Anda.'),
(117, 'Jadilah adaptif terhadap perubahan dalam industri atau pasar kerja.'),
(118, 'Perhatikan detail ketika menyiapkan dokumen lamaran dan CV Anda.'),
(119, 'Manfaatkan waktu luang untuk meningkatkan keterampilan Anda.'),
(120, 'Pahami kebutuhan dan harapan Anda dalam pekerjaan yang Anda cari.'),
(121, 'Bersiaplah untuk menjawab pertanyaan tentang kelemahan Anda.'),
(122, 'Jangan lewatkan kesempatan untuk mendapatkan sertifikasi tambahan.'),
(123, 'Jadilah aktif dalam forum atau grup diskusi online terkait karir.'),
(124, 'Manfaatkan waktu untuk merefleksikan pencapaian dan tujuan karir Anda.'),
(125, 'Jalin hubungan dengan alumni perguruan tinggi atau universitas Anda.'),
(126, 'Bersiaplah untuk menjelaskan alasan Anda meninggalkan pekerjaan sebelumnya.'),
(127, 'Perhatikan perkembangan teknologi yang relevan dengan industri Anda.'),
(128, 'Bangun koneksi dengan perusahaan yang mungkin tidak sedang merekrut.'),
(129, 'Jadilah terbuka terhadap kesempatan pekerjaan yang tidak biasa.'),
(130, 'Perhatikan bahasa tubuh Anda saat berkomunikasi secara langsung.'),
(131, 'Manfaatkan kesempatan untuk menjadi relawan dalam acara industri.'),
(132, 'Perhatikan cara Anda merespons pertanyaan tentang gaji dan tunjangan.'),
(133, 'Buatlah rencana karir jangka pendek dan jangka panjang.'),
(134, 'Manfaatkan kesempatan untuk berbicara langsung dengan rekruter.'),
(135, 'Jadilah terbuka terhadap umpan balik dan kritik untuk memperbaiki diri.'),
(136, 'Perhatikan tren pasar kerja dalam industri yang Anda minati.'),
(137, 'Bangun keahlian dalam menggunakan perangkat lunak atau aplikasi yang relevan.'),
(138, 'Jadilah terorganisir dalam mengelola aplikasi dan jadwal wawancara Anda.'),
(139, 'Manfaatkan kesempatan untuk menghadiri workshop atau seminar karir.'),
(140, 'Jangan ragu untuk mencari bantuan dari profesional karir atau konsultan.'),
(141, 'Perhatikan keselarasan antara nilai perusahaan dan visi Anda.'),
(142, 'Jadilah terbuka terhadap kesempatan untuk bekerja secara kontrak.'),
(143, 'Manfaatkan kesempatan untuk menjadi mentor bagi sesama pencari kerja.'),
(144, 'Perhatikan tren kompensasi dan paket tunjangan di industri Anda.'),
(145, 'Bersiaplah untuk menjelaskan bagaimana Anda mengatasi tantangan dalam pekerjaan.'),
(146, 'Manfaatkan kesempatan untuk mengikuti webinar atau konferensi online.'),
(147, 'Jadilah terbuka terhadap peluang karir di luar bidang utama Anda.');

ALTER TABLE `akun_pencari_kerja`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `akun_perusahaan`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_history_pencari_kerja` (`id_pencari_kerja`),
  ADD KEY `fk_history_perusahaan` (`id_perusahaan`),
  ADD KEY `fk_history_loker` (`id_loker`);

ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loker_perusahaan` (`id_perusahaan`);

ALTER TABLE `akun_pencari_kerja`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `akun_perusahaan`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `history`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `loker`
  MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_loker` FOREIGN KEY (`id_loker`) REFERENCES `loker` (`id`),
  ADD CONSTRAINT `fk_history_pencari_kerja` FOREIGN KEY (`id_pencari_kerja`) REFERENCES `akun_pencari_kerja` (`id`),
  ADD CONSTRAINT `fk_history_perusahaan` FOREIGN KEY (`id_perusahaan`) REFERENCES `akun_perusahaan` (`id`);

ALTER TABLE `loker`
  ADD CONSTRAINT `fk_loker_perusahaan` FOREIGN KEY (`id_perusahaan`) REFERENCES `akun_perusahaan` (`id`);
COMMIT;

CREATE TABLE `akun_admin` (
  `id` INT(11) NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `foto_profil` VARCHAR(255) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `akun_admin` (`id`, `nama`, `email`, `password`, `foto_profil`) VALUES
(5, 'admin', 'admin@gmail.com', '$2y$10$oe4qRtrBj//rEXGyYiZuQOnE6d77ENz6d8G4rptBNwWxX/zB0IWK.', 'profile_6656d6c84673f5.98625958.png');