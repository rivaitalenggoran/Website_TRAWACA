-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 05:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trawaca_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id_aplikasi` int(255) NOT NULL,
  `nama_aplikasi` varchar(255) NOT NULL,
  `link_aplikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `id_bahasa` int(255) NOT NULL,
  `nama_bahasa` varchar(255) NOT NULL,
  `link_bahasa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beranda`
--

CREATE TABLE `beranda` (
  `tentang_trawaca` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beranda`
--

INSERT INTO `beranda` (`tentang_trawaca`) VALUES
('akuuu cintaaa trawacaa');

-- --------------------------------------------------------

--
-- Table structure for table `karya_peneliti`
--

CREATE TABLE `karya_peneliti` (
  `id_karya` int(11) NOT NULL,
  `id_peneliti` int(11) NOT NULL,
  `nama_karya` varchar(255) NOT NULL,
  `deskripsi_karya` text NOT NULL,
  `tahun_pengerjaan_karya` year(4) NOT NULL,
  `tautan_karya` varchar(255) DEFAULT NULL,
  `nama_tautan_karya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karya_peneliti`
--

INSERT INTO `karya_peneliti` (`id_karya`, `id_peneliti`, `nama_karya`, `deskripsi_karya`, `tahun_pengerjaan_karya`, `tautan_karya`, `nama_tautan_karya`) VALUES
(1, 1, 'Karya Pak Mahas', '', '0000', 'https://scholar.google.co.id/citations?user=1wp_pXsAAAAJ&hl=en', ''),
(2, 2, 'Karya Bu Lucia', '', '0000', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `gambar_kegiatan_luaran` varchar(255) NOT NULL,
  `nama_kegiatan_luaran` varchar(255) NOT NULL,
  `deskripsi_kegiatan_luaran` varchar(255) NOT NULL,
  `waktu_kegiatan_luaran` varchar(255) NOT NULL,
  `link_kegiatan_luaran` varchar(255) NOT NULL,
  `nama_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontak_trawaca`
--

CREATE TABLE `kontak_trawaca` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(255) NOT NULL,
  `link_kontak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontributor`
--

CREATE TABLE `kontributor` (
  `id_kontributor` int(11) NOT NULL,
  `nama_kontributor` varchar(255) NOT NULL,
  `semester_kontributor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `minat_peneliti`
--

CREATE TABLE `minat_peneliti` (
  `id_minat` int(11) NOT NULL,
  `id_peneliti` int(11) DEFAULT NULL,
  `nama_minat` varchar(255) NOT NULL,
  `subtopik_minat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `minat_peneliti`
--

INSERT INTO `minat_peneliti` (`id_minat`, `id_peneliti`, `nama_minat`, `subtopik_minat`) VALUES
(1, 1, 'Minat Pak Mahas', NULL),
(2, 2, 'Minat Bu Lucia', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan_peneliti`
--

CREATE TABLE `pekerjaan_peneliti` (
  `id_pekerjaan` int(11) NOT NULL,
  `id_peneliti` int(11) DEFAULT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `waktu_pekerjaan` varchar(100) NOT NULL,
  `keterangan_tambahan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan_peneliti`
--

INSERT INTO `pekerjaan_peneliti` (`id_pekerjaan`, `id_peneliti`, `nama_instansi`, `pekerjaan`, `waktu_pekerjaan`, `keterangan_tambahan`) VALUES
(1, 1, 'pekerjaan pak Mahas', '', '', NULL),
(2, 2, 'pekerjaan Bu Lucia', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_peneliti`
--

CREATE TABLE `pendidikan_peneliti` (
  `id_pendidikan` int(11) NOT NULL,
  `id_peneliti` int(11) DEFAULT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `gelar` varchar(100) NOT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `tugas_akhir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendidikan_peneliti`
--

INSERT INTO `pendidikan_peneliti` (`id_pendidikan`, `id_peneliti`, `nama_instansi`, `gelar`, `fakultas`, `tugas_akhir`) VALUES
(1, 1, 'UKDW Pak Mahas', '', NULL, ''),
(2, 2, 'UKDW BU Lucia', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `profil_peneliti`
--

CREATE TABLE `profil_peneliti` (
  `id_peneliti` int(11) NOT NULL,
  `nama_peneliti` varchar(100) NOT NULL,
  `bidang_minat` varchar(100) NOT NULL,
  `institusi_peneliti` varchar(100) NOT NULL,
  `email_peneliti` varchar(100) NOT NULL,
  `keterangan_tambahan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_peneliti`
--

INSERT INTO `profil_peneliti` (`id_peneliti`, `nama_peneliti`, `bidang_minat`, `institusi_peneliti`, `email_peneliti`, `keterangan_tambahan`) VALUES
(1, 'Aditya Wikan Mahastama, S.Kom, MCS', 'Pengolahan Citra Digital, OCR, Sistem Cerdas, Kecerdasan Buatan untuk Game', 'Universitas Kristen Duta Wacana<br>\r\nFakultas Teknologi Informasi<br>\r\nProgram Studi Informatika', ' mahas[at]staff.ukdw.ac.id', 'SINTA ID: 6018557<br>\r\nPublons/WoS ID: ABA-1824-2021'),
(2, 'Dr. phil. Lucia D. Krisnawati, S.S, M.A', 'Pemrosesan Bahasa Natural, Pembelajaran Mesin, Deep Learning', 'Universitas Kristen Duta Wacana<br>\r\nFakultas Teknologi Informasi<br>\r\nProgram Studi Informatika', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi_peneliti`
--

CREATE TABLE `publikasi_peneliti` (
  `id_publikasi` int(11) NOT NULL,
  `id_peneliti` int(11) DEFAULT NULL,
  `tahun_publikasi` year(4) NOT NULL,
  `nama_publikasi` varchar(255) NOT NULL,
  `nama_peneliti` varchar(255) NOT NULL,
  `hari_tanggal_publikasi` date NOT NULL,
  `tempat_publikasi` varchar(255) NOT NULL,
  `tautan_publikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publikasi_peneliti`
--

INSERT INTO `publikasi_peneliti` (`id_publikasi`, `id_peneliti`, `tahun_publikasi`, `nama_publikasi`, `nama_peneliti`, `hari_tanggal_publikasi`, `tempat_publikasi`, `tautan_publikasi`) VALUES
(1, 1, '2020', 'publikasi pak mahas', '', '0000-00-00', '', ''),
(2, 2, '2020', 'publikasi Bu Lucia', '', '0000-00-00', '', ''),
(3, 1, '2019', 'publikasi pak mahas 2019', '', '0000-00-00', '', ''),
(4, 1, '2019', 'publikasi pak mahas 2', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sahabat_trawaca`
--

CREATE TABLE `sahabat_trawaca` (
  `id_sahabat` int(11) NOT NULL,
  `nama_sahabat` varchar(255) NOT NULL,
  `nama_waktu_kerjasama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tautan_peneliti`
--

CREATE TABLE `tautan_peneliti` (
  `id_tautan` int(11) NOT NULL,
  `id_peneliti` int(11) DEFAULT NULL,
  `nama_tautan` varchar(255) NOT NULL,
  `link_tautan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tautan_peneliti`
--

INSERT INTO `tautan_peneliti` (`id_tautan`, `id_peneliti`, `nama_tautan`, `link_tautan`) VALUES
(1, 1, 'Google Scholar', 'https://scholar.google.co.id/citations?user=1wp_pXsAAAAJ&amp;hl=en'),
(2, 2, 'Google Scholar', 'https://scholar.google.co.id/citations?user=KJrpljUAAAAJ&hl=en');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id_aplikasi`);

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id_bahasa`);

--
-- Indexes for table `karya_peneliti`
--
ALTER TABLE `karya_peneliti`
  ADD PRIMARY KEY (`id_karya`),
  ADD KEY `id_peneliti` (`id_peneliti`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `kontak_trawaca`
--
ALTER TABLE `kontak_trawaca`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kontributor`
--
ALTER TABLE `kontributor`
  ADD PRIMARY KEY (`id_kontributor`);

--
-- Indexes for table `minat_peneliti`
--
ALTER TABLE `minat_peneliti`
  ADD PRIMARY KEY (`id_minat`),
  ADD KEY `id_peneliti` (`id_peneliti`);

--
-- Indexes for table `pekerjaan_peneliti`
--
ALTER TABLE `pekerjaan_peneliti`
  ADD PRIMARY KEY (`id_pekerjaan`),
  ADD KEY `id_peneliti` (`id_peneliti`);

--
-- Indexes for table `pendidikan_peneliti`
--
ALTER TABLE `pendidikan_peneliti`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `id_peneliti` (`id_peneliti`);

--
-- Indexes for table `profil_peneliti`
--
ALTER TABLE `profil_peneliti`
  ADD PRIMARY KEY (`id_peneliti`);

--
-- Indexes for table `publikasi_peneliti`
--
ALTER TABLE `publikasi_peneliti`
  ADD PRIMARY KEY (`id_publikasi`),
  ADD KEY `id_peneliti` (`id_peneliti`);

--
-- Indexes for table `sahabat_trawaca`
--
ALTER TABLE `sahabat_trawaca`
  ADD PRIMARY KEY (`id_sahabat`);

--
-- Indexes for table `tautan_peneliti`
--
ALTER TABLE `tautan_peneliti`
  ADD PRIMARY KEY (`id_tautan`),
  ADD KEY `id_peneliti` (`id_peneliti`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id_aplikasi` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id_bahasa` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karya_peneliti`
--
ALTER TABLE `karya_peneliti`
  MODIFY `id_karya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kontak_trawaca`
--
ALTER TABLE `kontak_trawaca`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontributor`
--
ALTER TABLE `kontributor`
  MODIFY `id_kontributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `minat_peneliti`
--
ALTER TABLE `minat_peneliti`
  MODIFY `id_minat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pekerjaan_peneliti`
--
ALTER TABLE `pekerjaan_peneliti`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendidikan_peneliti`
--
ALTER TABLE `pendidikan_peneliti`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil_peneliti`
--
ALTER TABLE `profil_peneliti`
  MODIFY `id_peneliti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `publikasi_peneliti`
--
ALTER TABLE `publikasi_peneliti`
  MODIFY `id_publikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sahabat_trawaca`
--
ALTER TABLE `sahabat_trawaca`
  MODIFY `id_sahabat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tautan_peneliti`
--
ALTER TABLE `tautan_peneliti`
  MODIFY `id_tautan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karya_peneliti`
--
ALTER TABLE `karya_peneliti`
  ADD CONSTRAINT `karya_peneliti_ibfk_1` FOREIGN KEY (`id_peneliti`) REFERENCES `profil_peneliti` (`id_peneliti`) ON DELETE CASCADE;

--
-- Constraints for table `minat_peneliti`
--
ALTER TABLE `minat_peneliti`
  ADD CONSTRAINT `minat_peneliti_ibfk_1` FOREIGN KEY (`id_peneliti`) REFERENCES `profil_peneliti` (`id_peneliti`) ON DELETE CASCADE;

--
-- Constraints for table `pekerjaan_peneliti`
--
ALTER TABLE `pekerjaan_peneliti`
  ADD CONSTRAINT `pekerjaan_peneliti_ibfk_1` FOREIGN KEY (`id_peneliti`) REFERENCES `profil_peneliti` (`id_peneliti`) ON DELETE CASCADE;

--
-- Constraints for table `pendidikan_peneliti`
--
ALTER TABLE `pendidikan_peneliti`
  ADD CONSTRAINT `pendidikan_peneliti_ibfk_1` FOREIGN KEY (`id_peneliti`) REFERENCES `profil_peneliti` (`id_peneliti`) ON DELETE CASCADE;

--
-- Constraints for table `publikasi_peneliti`
--
ALTER TABLE `publikasi_peneliti`
  ADD CONSTRAINT `publikasi_peneliti_ibfk_1` FOREIGN KEY (`id_peneliti`) REFERENCES `profil_peneliti` (`id_peneliti`) ON DELETE CASCADE;

--
-- Constraints for table `tautan_peneliti`
--
ALTER TABLE `tautan_peneliti`
  ADD CONSTRAINT `tautan_peneliti_ibfk_1` FOREIGN KEY (`id_peneliti`) REFERENCES `profil_peneliti` (`id_peneliti`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
