-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2019 at 12:12 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `peminjamanruang`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
`id_berita` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul_acara` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `tanggal`, `judul_acara`, `foto`) VALUES
(6, '2019-06-19', 'Halal Bihalal Poliwangi', 'halbil.jpg'),
(7, '2019-06-21', 'asasa', 'sketsa1.png');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
`id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
(1, 'LCD Proyektor'),
(2, 'Proyektor Remote'),
(3, 'Remote AC'),
(4, 'AC'),
(5, 'Spidol Papan Tulis 2');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitasruang`
--

CREATE TABLE IF NOT EXISTS `fasilitasruang` (
`id_fasilitasruang` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitasruang`
--

INSERT INTO `fasilitasruang` (`id_fasilitasruang`, `id_fasilitas`, `jml`, `foto`, `id_ruang`) VALUES
(1, 1, 1, '', 3),
(2, 3, 1, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE IF NOT EXISTS `gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`) VALUES
(1, '454'),
(2, 'Perpustakaan');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
`id_jadwal` int(11) NOT NULL,
  `id_waktu` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_waktu`, `id_kelas`, `id_ruang`, `id_status`, `id_matakuliah`) VALUES
(4, 11, 1, 5, 2, 1),
(5, 11, 3, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
`id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknologi Informasi'),
(4, 'Teknik Mesin Otomotif'),
(5, 'Teknik Sipil dan Bangunan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_prodi`) VALUES
(1, 'MI - 3A', 1),
(3, 'MI - 3E', 1),
(4, 'TM - 3A', 3),
(5, 'TM - 3B', 3),
(6, 'TM - 3C', 3),
(7, 'TS - 4A', 5),
(8, 'TS - 4B', 5),
(10, 'MI - 3B', 1),
(11, 'MI - 3C', 1),
(12, 'MI - 3D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE IF NOT EXISTS `lantai` (
  `id_lantai` int(11) NOT NULL,
  `nama_lantai` varchar(255) NOT NULL,
  `id_gedung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`id_lantai`, `nama_lantai`, `id_gedung`) VALUES
(1, 'Lantai 1', 1),
(2, 'Lantai 2', 1),
(3, 'Lantai 3', 1),
(4, 'Lantai 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lapor`
--

CREATE TABLE IF NOT EXISTS `lapor` (
`id_lapor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_fasilitasruang` int(11) NOT NULL,
  `laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('rusak','ditangani') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapor`
--

INSERT INTO `lapor` (`id_lapor`, `id_user`, `id_fasilitasruang`, `laporan`, `foto`, `status`, `timestamp`) VALUES
(49, 21, 2, 'new', 'upload/fotolaporan/216370.png', 'rusak', '2019-07-19 09:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
`id_matakuliah` int(11) NOT NULL,
  `nama_matkul` varchar(150) NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL,
  `semester` varchar(150) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_waktu` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `nama_matkul`, `tahun_ajaran`, `semester`, `id_kelas`, `id_ruang`, `id_waktu`) VALUES
(1, 'pemrograman android', '2017/2018', 'ganjil', 1, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
`id_peminjaman` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status` enum('booking','dipinjam','dikembalikan','kosong') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qr_code` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_peminjaman`, `tgl_pinjam`, `id_ruang`, `id_user`, `jam_mulai`, `jam_selesai`, `status`, `timestamp`, `qr_code`) VALUES
(1, '2019-07-18', 3, 21, '10:17:00', '23:17:00', 'dikembalikan', '2019-07-17 22:14:09', ''),
(2, '2019-07-18', 3, 21, '00:30:00', '06:59:00', 'booking', '2019-07-17 23:07:27', ''),
(3, '2019-07-18', 5, 21, '00:30:00', '06:59:00', 'dikembalikan', '2019-07-19 03:10:49', ''),
(4, '2019-07-18', 2, 21, '05:47:00', '22:47:00', 'dikembalikan', '2019-07-19 03:08:43', ''),
(7, '2019-07-19', 2, 21, '10:43:00', '23:43:00', 'dikembalikan', '2019-07-19 09:32:56', ''),
(8, '2019-07-19', 5, 21, '00:30:00', '15:59:00', 'booking', '2019-07-19 08:07:01', ''),
(9, '2019-07-19', 6, 21, '15:45:00', '17:45:00', 'booking', '2019-07-19 08:45:21', ''),
(10, '0000-00-00', 1, 25, '00:00:00', '00:00:00', 'kosong', '2019-07-19 09:34:17', '10.png');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_tmp`
--

CREATE TABLE IF NOT EXISTS `pinjam_tmp` (
`id_peminjaman` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('kosong','dipinjam','booking','dikembalikan') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qr_code` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_tmp`
--

INSERT INTO `pinjam_tmp` (`id_peminjaman`, `tgl_pinjam`, `id_ruang`, `id_user`, `status`, `jam_mulai`, `jam_selesai`, `timestamp`, `qr_code`) VALUES
(2, '2019-07-18', 3, 21, 'dipinjam', '00:30:00', '06:59:00', '2019-07-19 03:00:45', ''),
(6, '2019-07-19', 2, 21, 'dipinjam', '10:43:00', '23:43:00', '2019-07-19 09:28:53', ''),
(8, '2019-07-19', 6, 21, 'dipinjam', '15:45:00', '17:45:00', '2019-07-19 09:28:53', '');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
`id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `id_jurusan`) VALUES
(1, 'D-III Manajemen Informatika', 1),
(3, 'D-IV Teknik Mesin Otomotif', 4),
(5, 'D-IV Teknik Sipil', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
`id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(45) NOT NULL,
  `id_lantai` int(11) NOT NULL,
  `status_ruang` enum('baik','rusak') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `id_lantai`, `status_ruang`) VALUES
(1, 'Pembelajaran', 1, 'rusak'),
(2, 'Ruang Laboratorium', 1, 'baik'),
(3, 'Ruang Multimedia', 1, 'baik'),
(5, 'Ruang Computer Vision', 1, 'baik'),
(6, 'Ruang Media Interaktif', 1, 'baik'),
(8, 'Ruang Kuliah Bersama', 4, 'baik'),
(9, 'Ruang Pembelajaran Citra', 4, 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id_status` int(11) NOT NULL,
  `status` enum('terpakai','kosong','terjadwal','tidaklayak') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'terpakai'),
(2, 'kosong'),
(3, 'terjadwal'),
(4, 'tidaklayak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(45) NOT NULL,
  `foto` char(125) NOT NULL,
  `level` enum('0','1','2') NOT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `foto`, `level`, `id_kelas`) VALUES
(19, 'I Wayan Suardinata', '123', '123', 'pak_wayan.jpg', '1', NULL),
(21, 'Khusnul Khotimah Wahyu', 'put', 'put', 'khusnul2.png', '2', 1),
(22, 'Rifky Prayanta', '111', '111', 'admin12.jpg', '0', NULL),
(25, 'Aneira Putri', '040210', '0402010', '11.jpg', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE IF NOT EXISTS `waktu` (
`id_waktu` int(11) NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') NOT NULL,
  `jamke` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`id_waktu`, `hari`, `jamke`, `jam_mulai`, `jam_selesai`) VALUES
(8, 'jumat', 1, '07:00:00', '07:50:00'),
(9, 'jumat', 2, '07:50:00', '08:40:00'),
(10, 'jumat', 3, '08:40:00', '09:30:00'),
(11, 'jumat', 4, '00:30:00', '15:59:00'),
(12, 'jumat', 1, '07:00:00', '09:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
 ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
 ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `fasilitasruang`
--
ALTER TABLE `fasilitasruang`
 ADD PRIMARY KEY (`id_fasilitasruang`), ADD KEY `id_fasilitas` (`id_fasilitas`), ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
 ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
 ADD PRIMARY KEY (`id_jadwal`), ADD KEY `id_waktu` (`id_waktu`), ADD KEY `id_kelas` (`id_kelas`), ADD KEY `id_ruang` (`id_ruang`), ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
 ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`), ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `lantai`
--
ALTER TABLE `lantai`
 ADD PRIMARY KEY (`id_lantai`), ADD KEY `id_gedung` (`id_gedung`);

--
-- Indexes for table `lapor`
--
ALTER TABLE `lapor`
 ADD PRIMARY KEY (`id_lapor`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
 ADD PRIMARY KEY (`id_matakuliah`), ADD KEY `id_kelas` (`id_kelas`), ADD KEY `id_ruangan` (`id_ruang`), ADD KEY `id_waktu` (`id_waktu`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
 ADD PRIMARY KEY (`id_peminjaman`), ADD KEY `id_user` (`id_user`), ADD KEY `id_ruangan` (`id_ruang`);

--
-- Indexes for table `pinjam_tmp`
--
ALTER TABLE `pinjam_tmp`
 ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
 ADD PRIMARY KEY (`id_prodi`), ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
 ADD PRIMARY KEY (`id_ruang`), ADD KEY `id_lantai` (`id_lantai`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
 ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fasilitasruang`
--
ALTER TABLE `fasilitasruang`
MODIFY `id_fasilitasruang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lapor`
--
ALTER TABLE `lapor`
MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pinjam_tmp`
--
ALTER TABLE `pinjam_tmp`
MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitasruang`
--
ALTER TABLE `fasilitasruang`
ADD CONSTRAINT `fasilitasruang_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`),
ADD CONSTRAINT `fasilitasruang_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_waktu`) REFERENCES `waktu` (`id_waktu`),
ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `lantai`
--
ALTER TABLE `lantai`
ADD CONSTRAINT `lantai_ibfk_1` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`);

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
ADD CONSTRAINT `matakuliah_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
ADD CONSTRAINT `pinjam_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `ruang`
--
ALTER TABLE `ruang`
ADD CONSTRAINT `ruang_ibfk_1` FOREIGN KEY (`id_lantai`) REFERENCES `lantai` (`id_lantai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
