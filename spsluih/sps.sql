-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 19, 2019 at 02:09 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `id_siswa` int(11) NOT NULL,
  `status_absen` int(11) NOT NULL,
  `tgl_submit_absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_mingguan`, `id_siswa`, `status_absen`, `tgl_submit_absen`) VALUES
(1, 1, 1, 0, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas_mingguan`
--

CREATE TABLE `aktivitas_mingguan` (
  `id_mingguan` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submission`
--

CREATE TABLE `assignment_submission` (
  `id_assignment_submission` varchar(250) NOT NULL,
  `id_siswa` varchar(250) NOT NULL,
  `id_dokumen` varchar(250) NOT NULL,
  `file_submission` varchar(250) NOT NULL,
  `status_assignment` tinyint(1) NOT NULL,
  `tgl_submit_assignment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment_submission`
--

INSERT INTO `assignment_submission` (`id_assignment_submission`, `id_siswa`, `id_dokumen`, `file_submission`, `status_assignment`, `tgl_submit_assignment`) VALUES
('S001_D001', 'S001', 'D001', 'Screen_Shot_2019-01-14_at_20.13.20.png', 0, '2019-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` varchar(250) NOT NULL,
  `id_mingguan` varchar(250) NOT NULL,
  `status_dokumen` tinyint(1) NOT NULL,
  `tgl_submit_dokumen` date NOT NULL,
  `file_assignment` varchar(100) NOT NULL,
  `id_jenis_dokumen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id_mingguan`, `status_dokumen`, `tgl_submit_dokumen`, `file_assignment`, `id_jenis_dokumen`) VALUES
('D001', 'W1', 0, '2019-03-07', 'tes.docx', 'ASS');

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

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `id_user`, `status_guru`, `tgl_submit_guru`, `id_matpel`) VALUES
(1, 1, 0, '2019-03-09', 2),
(2, 24, 0, '2019-03-13', 0),
(9, 25, 0, '2019-03-13', 1),
(11, 26, 0, '2019-03-13', 1),
(12, 27, 0, '2019-03-13', 3);

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

--
-- Dumping data for table `guru_tahunan`
--

INSERT INTO `guru_tahunan` (`id_gurutahunan`, `id_tahun_ajaran`, `id_guru`, `status_gurutahunan`, `tgl_submit_gurutahunan`) VALUES
(1, 2, 2, 0, '2019-03-13'),
(5, 2, 12, 0, '2019-03-13'),
(6, 2, 1, 0, '2019-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `status_hak_akses` tinyint(4) NOT NULL,
  `tgl_submit_hak_akses` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(250) NOT NULL,
  `id_penugasan` varchar(250) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam_pelajaran` int(10) NOT NULL,
  `jumlah_jampel` int(10) NOT NULL,
  `status_jadwal` tinyint(1) NOT NULL,
  `tgl_submit_jadwal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_penugasan`, `hari`, `jam_pelajaran`, `jumlah_jampel`, `status_jadwal`, `tgl_submit_jadwal`) VALUES
('IPA_1_1819_HERY_1', 'IPA_1_1819_HERY', 'Senin', 1, 2, 0, '2019-03-07');

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

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis_dokumen`, `nama_jenis_dokumen`, `status_jenis_dokumen`, `tgl_submit_jenis_dokumen`, `peruntukan`) VALUES
('ASS', 'Assignment', 0, '2019-03-07', 'Nilai'),
('UTS', 'Ujian Tengah Semester', 0, '2019-03-07', 'Nilai'),
('UAS', 'Ujian Akhir Semester', 0, '2019-03-07', 'Nilai');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `urutan` tinyint(4) NOT NULL,
  `id_gurutahunan` varchar(250) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `status_kelas` tinyint(1) NOT NULL,
  `tgl_submit_kelas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jurusan`, `urutan`, `id_gurutahunan`, `id_tahun_ajaran`, `status_kelas`, `tgl_submit_kelas`) VALUES
(4, 10, 'IPA', 1, '1', 2, 0, '2019-03-13'),
(5, 10, 'IPS', 1, '1', 2, 0, '2019-03-13'),
(6, 11, 'IPA', 2, '1', 2, 0, '2019-03-13'),
(7, 11, 'IPS', 3, '1', 2, 0, '2019-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kelas_siswa` varchar(250) NOT NULL,
  `id_siswa_angkatan` varchar(250) NOT NULL,
  `id_kelas` varchar(250) NOT NULL,
  `status_kelas_siswa` tinyint(1) NOT NULL,
  `tgl_submit_kelas_siswa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas_siswa`, `id_siswa_angkatan`, `id_kelas`, `status_kelas_siswa`, `tgl_submit_kelas_siswa`) VALUES
('IPA_1_1819_BRYANLIMING', 'S001_1819', 'IPA_1_1819', 0, '2019-03-07'),
('IPS_1_1819_JOVANHIDAYAT', 'S002_1819', 'IPS_1_1819', 0, '2019-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id_matpel` int(11) NOT NULL,
  `nama_matpel` varchar(300) NOT NULL,
  `jenis_matpel` varchar(10) NOT NULL,
  `status_matpel` tinyint(4) NOT NULL,
  `tgl_submit_matpel` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id_matpel`, `nama_matpel`, `jenis_matpel`, `status_matpel`, `tgl_submit_matpel`) VALUES
(1, 'Bahasa Indonesia', 'UMUM', 0, '2019-03-12'),
(2, 'Biologi', 'IPA', 0, '2019-03-12'),
(3, 'Sejarah', 'IPS', 0, '2019-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `id_admin` varchar(250) NOT NULL,
  `tgl_submit` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_parent` tinyint(4) NOT NULL
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
  `nomor_telpon` varchar(15) NOT NULL,
  `pekerjaan` varchar(250) NOT NULL,
  `status_orangtua` tinyint(4) NOT NULL,
  `tgl_submit_orangtua` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_jenis_dokumen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `konten` text NOT NULL,
  `status_pengumuman` tinyint(4) NOT NULL,
  `tgl_submit_pengumuman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` varchar(250) NOT NULL,
  `id_kelas_siswa` varchar(250) NOT NULL,
  `id_jadwal` varchar(250) NOT NULL,
  `id_jenis_dokumen` varchar(250) NOT NULL,
  `nilai` int(10) NOT NULL,
  `status_penilaian` tinyint(1) NOT NULL,
  `tgl_submit_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_kelas_siswa`, `id_jadwal`, `id_jenis_dokumen`, `nilai`, `status_penilaian`, `tgl_submit_penilaian`) VALUES
('UTS_IPA_1_1819_HERY_1_BRYANLIMING', 'IPA_1_1819_BRYANLIMING', 'IPA_1_1819_HERY_1', 'UTS', 90, 0, '2019-03-07');

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

--
-- Dumping data for table `penugasan_guru`
--

INSERT INTO `penugasan_guru` (`id_penugasan`, `id_gurutahunan`, `id_kelas`, `status_penugasan`, `tgl_submit_penugasan`) VALUES
(2, 1, 4, 0, '2019-03-14'),
(4, 6, 6, 0, '2019-03-14'),
(6, 1, 4, 0, '2019-03-14'),
(9, 1, 7, 0, '2019-03-14'),
(11, 12, 5, 0, '2019-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` varchar(250) NOT NULL,
  `id_mingguan` varchar(250) NOT NULL,
  `status_quiz` tinyint(1) NOT NULL,
  `tgl_submit_quiz` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `id_mingguan`, `status_quiz`, `tgl_submit_quiz`) VALUES
('Q1_W1_IPA_1_1819_HERY_1', 'W1_IPA_1_1819_HERY_1', 0, '2019-03-07');

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
  `tgl_submit_siswa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user`, `jurusan`, `id_orangtua`, `status_siswa`, `tgl_submit_siswa`) VALUES
(1, 20, 'IPA', 0, 0, '2019-03-13'),
(2, 28, 'IPA', 0, 0, '2019-03-14');

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
  `id_soal` varchar(250) NOT NULL,
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

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_awal`, `tahun_akhir`, `status_tahun_ajaran`, `tgl_submit_tahunajaran`) VALUES
(1, 2016, 2017, '0', '2019-03-12'),
(2, 2018, 2019, '0', '2019-03-12');

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
(1, 'joshua', 'natan', '1998-03-13', '089616961915', 'joshuanatan.jn@gmail.com', 'kembang molek ix', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-09', 1, 0, 1),
(2, 'joshua', 'natan', '2019-03-12', '089616961915', 'joshuanatan.jn@gmail.com', 'abc', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-12', 0, 0, 2),
(3, 'joshua', 'natan', '2019-03-12', '089616961915', 'joshuanatan.jn@gmail.com', 'abc', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-12', 0, 0, 3),
(4, 'joshua', 'natan', '2019-03-12', '089616961915', 'joshuanatan.jn@gmail.com', 'abc', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-12', 0, 0, 4),
(5, 'joshua', 'natan', '2019-03-12', '089616961915', 'joshuanatan.jn@gmail.com', 'abc', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-12', 0, 0, 5),
(24, 'joshua', 'luih', '1998-06-06', '029382919380', 'joeafjio@gmail.com', 'aewjfoajefo', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-13', 5, 0, 1),
(25, 'bryan', 'liming', '1111-11-11', '1', '1@gmail.com', 'aefaewf', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-13', 5, 0, 1),
(27, 'joshua', 'luih', '1998-03-31', '20948032948', 'ajeofjafo@gmail.com', 'jaewoifjaoiwejfoij', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-13', 5, 0, 1),
(28, 'abc', 'def', '1111-11-11', '1', '1@gmail.com', 'a', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-14', 4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wakasek`
--

CREATE TABLE `wakasek` (
  `id_wakasek` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jenis_wakasek` varchar(250) NOT NULL,
  `status_wakasek` tinyint(4) NOT NULL,
  `tgl_submit_wakasek` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

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
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id_matpel`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  ADD PRIMARY KEY (`id_penugasan`);

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
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wakasek`
--
ALTER TABLE `wakasek`
  ADD PRIMARY KEY (`id_wakasek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `guru_tahunan`
--
ALTER TABLE `guru_tahunan`
  MODIFY `id_gurutahunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
