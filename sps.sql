-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 05:04 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sps`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_mingguan` int(11) NOT NULL,
  `id_siswaangkatan` int(11) NOT NULL,
  `status_absen` int(11) NOT NULL,
  `tgl_submit_absen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas_mingguan`
--

CREATE TABLE `aktivitas_mingguan` (
  `id_mingguan` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tgl_kelas` date NOT NULL,
  `materi_mingguan` varchar(200) NOT NULL,
  `deskripsi_materi` text NOT NULL,
  `status_aktivitas` int(11) NOT NULL,
  `status_ujian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_mingguan` int(11) NOT NULL,
  `status_dokumen` tinyint(1) NOT NULL,
  `tgl_submit_dokumen` date NOT NULL,
  `file_assignment` varchar(100) NOT NULL,
  `jenis` varchar(250) NOT NULL,
  `judul_dokumen` varchar(250) NOT NULL,
  `id_user_upload` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_guru` int(11) NOT NULL,
  `tgl_submit_guru` date NOT NULL,
  `id_matpel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guru_tahunan`
--

CREATE TABLE `guru_tahunan` (
  `id_gurutahunan` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `status_gurutahunan` int(11) NOT NULL,
  `tgl_submit_gurutahunan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_gurutahunan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam_pelajaran` int(10) NOT NULL,
  `status_jadwal` tinyint(1) NOT NULL,
  `tgl_submit_jadwal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_quiz`
--

CREATE TABLE `jawaban_quiz` (
  `id_jawaban` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jawaban_quiz` varchar(1) NOT NULL,
  `status_jawaban` tinyint(4) NOT NULL,
  `tgl_submit_jawaban` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis_dokumen` varchar(250) NOT NULL,
  `nama_jenis_dokumen` varchar(250) NOT NULL,
  `status_jenis_dokumen` tinyint(1) NOT NULL,
  `tgl_submit_jenis_dokumen` date NOT NULL,
  `peruntukan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `urutan` tinyint(4) NOT NULL,
  `id_gurutahunan` varchar(250) NOT NULL COMMENT 'sebenenrya ini id_guru',
  `id_tahun_ajaran` int(11) NOT NULL,
  `status_kelas` tinyint(1) NOT NULL,
  `tgl_submit_kelas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` int(11) NOT NULL,
  `id_siswa_angkatan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status_kelas_siswa` tinyint(1) NOT NULL,
  `tgl_submit_kelas_siswa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id_matpel` int(11) NOT NULL,
  `nama_matpel` varchar(300) NOT NULL,
  `jenis_matpel` varchar(10) NOT NULL,
  `kkm` int(11) NOT NULL,
  `tugas` int(11) NOT NULL,
  `lab` int(11) NOT NULL,
  `quiz` int(11) NOT NULL,
  `uh` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL,
  `status_matpel` tinyint(4) NOT NULL,
  `tgl_submit_matpel` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_quiz`
--

CREATE TABLE `nilai_quiz` (
  `id_nilai_quiz` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `nilai_quiz` text NOT NULL,
  `status_nilai` tinyint(4) NOT NULL,
  `tgl_submit_nilai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `id_orangtua` int(11) NOT NULL,
  `nama_orangtua` varchar(200) NOT NULL,
  `nomor_telpon_ortu` varchar(15) NOT NULL,
  `email_orangtua` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_orangtua` tinyint(4) NOT NULL,
  `tgl_submit_orangtua` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `topik` text NOT NULL,
  `konten` text NOT NULL,
  `dateline` date NOT NULL,
  `status_pengumuman` tinyint(4) NOT NULL,
  `tgl_submit_pengumuman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_siswa_angkatan` int(11) NOT NULL,
  `id_penugasan` int(11) NOT NULL,
  `nilai_tugas` float NOT NULL,
  `nilai_lab` float NOT NULL,
  `nilai_uh` float NOT NULL,
  `nilai_uts` float NOT NULL,
  `nilai_uas` float NOT NULL,
  `tgl_submit_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penugasan_guru`
--

CREATE TABLE `penugasan_guru` (
  `id_penugasan` int(11) NOT NULL,
  `id_gurutahunan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status_penugasan` int(11) NOT NULL,
  `tgl_submit_penugasan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL,
  `id_mingguan` int(11) NOT NULL,
  `status_quiz` tinyint(1) NOT NULL,
  `tgl_submit_quiz` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `id_next_tahun_ajaran` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sistemprofile`
--

CREATE TABLE `sistemprofile` (
  `id_profile` int(11) NOT NULL,
  `nama_sekolah` varchar(400) NOT NULL DEFAULT 'Nama Sekolah',
  `logo_sekolah` varchar(400) NOT NULL DEFAULT 'logo.png',
  `nama_sistem_sekolah` varchar(400) NOT NULL DEFAULT 'E Education',
  `status_profile` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sistemprofile`
--

INSERT INTO `sistemprofile` (`id_profile`, `nama_sekolah`, `logo_sekolah`, `nama_sistem_sekolah`, `status_profile`) VALUES
(1, 'smak 1', 'logo-ex-7.png', 'e education', 0),
(2, 'smak 1', 'logo-ex-71.png', 'e education', 1),
(3, 'yo test', 'beats.png', 'hehe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `id_orangtua` int(11) NOT NULL,
  `status_siswa` int(11) NOT NULL,
  `tgl_submit_siswa` date NOT NULL,
  `monitor_ortu` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa_angkatan`
--

CREATE TABLE `siswa_angkatan` (
  `id_siswa_angkatan` int(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `status_siswa_angkatan` tinyint(4) NOT NULL,
  `tgl_submit_siswa_angkatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `pertanyaan` varchar(250) NOT NULL,
  `opsi1` varchar(250) NOT NULL,
  `opsi2` varchar(250) NOT NULL,
  `opsi3` varchar(250) NOT NULL,
  `opsi4` varchar(250) NOT NULL,
  `jawaban` varchar(250) NOT NULL,
  `id_quiz` varchar(250) NOT NULL,
  `status_soal` tinyint(1) NOT NULL,
  `tgl_submit_soal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun_awal` int(11) NOT NULL,
  `tahun_akhir` int(11) NOT NULL,
  `status_tahun_ajaran` varchar(250) NOT NULL,
  `tgl_submit_tahunajaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ulangan_harian`
--

CREATE TABLE `ulangan_harian` (
  `id_aktivitas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL COMMENT 'ini id siswa angkatan',
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_telpon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_submit` date NOT NULL,
  `id_admin` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `tanggal_lahir`, `nomor_telpon`, `email`, `alamat`, `password`, `tgl_submit`, `id_admin`, `status`, `id_role`) VALUES
(4, 'joshua', 'natan', '2019-03-12', '089616961915', 'joshuanatan.jn3@gmail.com', 'abc', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-12', 0, 0, 4),
(5, 'joshua', 'natan', '2019-03-12', '089616961915', 'joshuanatan.jn4@gmail.com', 'abc', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-12', 0, 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `aktivitas_mingguan`
--
ALTER TABLE `aktivitas_mingguan`
  ADD PRIMARY KEY (`id_mingguan`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `guru_tahunan`
--
ALTER TABLE `guru_tahunan`
  ADD PRIMARY KEY (`id_gurutahunan`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jawaban_quiz`
--
ALTER TABLE `jawaban_quiz`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kelas_siswa`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id_matpel`);

--
-- Indexes for table `nilai_quiz`
--
ALTER TABLE `nilai_quiz`
  ADD PRIMARY KEY (`id_nilai_quiz`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id_orangtua`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_siswa_angkatan`);

--
-- Indexes for table `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  ADD PRIMARY KEY (`id_penugasan`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `sistemprofile`
--
ALTER TABLE `sistemprofile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `siswa_angkatan`
--
ALTER TABLE `siswa_angkatan`
  ADD PRIMARY KEY (`id_siswa_angkatan`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `ulangan_harian`
--
ALTER TABLE `ulangan_harian`
  ADD PRIMARY KEY (`id_aktivitas`,`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aktivitas_mingguan`
--
ALTER TABLE `aktivitas_mingguan`
  MODIFY `id_mingguan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru_tahunan`
--
ALTER TABLE `guru_tahunan`
  MODIFY `id_gurutahunan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawaban_quiz`
--
ALTER TABLE `jawaban_quiz`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_quiz`
--
ALTER TABLE `nilai_quiz`
  MODIFY `id_nilai_quiz` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_siswa_angkatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sistemprofile`
--
ALTER TABLE `sistemprofile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa_angkatan`
--
ALTER TABLE `siswa_angkatan`
  MODIFY `id_siswa_angkatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
