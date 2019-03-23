-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2019 at 09:07 AM
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
  `tgl_submit_absen` int(11) NOT NULL
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
  `status_aktivitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aktivitas_mingguan`
--

INSERT INTO `aktivitas_mingguan` (`id_mingguan`, `id_jadwal`, `tgl_kelas`, `materi_mingguan`, `deskripsi_materi`, `status_aktivitas`) VALUES
(3, 637, '2019-03-20', 'asek', '-', 0),
(4, 587, '2019-03-20', 'Matematika Dasar', '-', 0),
(5, 587, '2019-03-20', 'Perkenalan Logaritma', '-', 0),
(6, 541, '2019-03-20', 'awefawef', '-', 0),
(9, 634, '2019-03-20', 'Pengenalan manfaat matematika dasar dalam kehidupan sehari-hari', '-', 0),
(10, 541, '2019-03-21', 'Bryan Liming', 'mantap', 0);

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

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id_mingguan`, `status_dokumen`, `tgl_submit_dokumen`, `file_assignment`, `jenis`, `judul_dokumen`, `id_user_upload`) VALUES
(1, 6, 1, '2019-03-20', 'User_Requirement1.pptx', 'MATERI', 'woi', 36),
(2, 6, 0, '2019-03-20', 'Gantt_Chart_Final.pdf', 'MATERI', 'tes', 36),
(3, 6, 1, '2019-03-21', 'Functional_Document_Final.docx', 'MATERI', 'yo', 36);

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
(1, 34, 0, '2019-03-16', 9),
(8, 36, 0, '2019-03-16', 1),
(9, 37, 0, '2019-03-16', 2),
(10, 38, 0, '2019-03-16', 11),
(11, 39, 0, '2019-03-16', 6),
(12, 40, 0, '2019-03-16', 8),
(13, 41, 0, '2019-03-16', 11);

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
(1, 1, 1, 0, '2019-03-16'),
(2, 1, 8, 0, '2019-03-16'),
(3, 1, 9, 0, '2019-03-16'),
(4, 1, 10, 0, '2019-03-16'),
(5, 1, 11, 0, '2019-03-16'),
(6, 1, 12, 0, '2019-03-16'),
(7, 1, 13, 0, '2019-03-16');

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

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_gurutahunan`, `id_kelas`, `hari`, `jam_pelajaran`, `status_jadwal`, `tgl_submit_jadwal`) VALUES
(541, 2, 13, 'SENIN', 1, 0, '2019-03-19'),
(542, 0, 13, 'SENIN', 2, 0, '2019-03-19'),
(543, 0, 13, 'SENIN', 3, 0, '2019-03-19'),
(544, 0, 13, 'SENIN', 4, 0, '2019-03-19'),
(545, 0, 13, 'SENIN', 5, 0, '2019-03-19'),
(546, 0, 13, 'SENIN', 6, 0, '2019-03-19'),
(547, 0, 13, 'SENIN', 7, 0, '2019-03-19'),
(548, 0, 13, 'SENIN', 8, 0, '2019-03-19'),
(549, 0, 13, 'SENIN', 9, 0, '2019-03-19'),
(550, 0, 13, 'SELASA', 1, 0, '2019-03-19'),
(551, 2, 13, 'SELASA', 2, 0, '2019-03-19'),
(552, 0, 13, 'SELASA', 3, 0, '2019-03-19'),
(553, 0, 13, 'SELASA', 4, 0, '2019-03-19'),
(554, 0, 13, 'SELASA', 5, 0, '2019-03-19'),
(555, 0, 13, 'SELASA', 6, 0, '2019-03-19'),
(556, 0, 13, 'SELASA', 7, 0, '2019-03-19'),
(557, 0, 13, 'SELASA', 8, 0, '2019-03-19'),
(558, 0, 13, 'SELASA', 9, 0, '2019-03-19'),
(559, 0, 13, 'RABU', 1, 0, '2019-03-19'),
(560, 0, 13, 'RABU', 2, 0, '2019-03-19'),
(561, 0, 13, 'RABU', 3, 0, '2019-03-19'),
(562, 0, 13, 'RABU', 4, 0, '2019-03-19'),
(563, 0, 13, 'RABU', 5, 0, '2019-03-19'),
(564, 0, 13, 'RABU', 6, 0, '2019-03-19'),
(565, 0, 13, 'RABU', 7, 0, '2019-03-19'),
(566, 0, 13, 'RABU', 8, 0, '2019-03-19'),
(567, 0, 13, 'RABU', 9, 0, '2019-03-19'),
(568, 0, 13, 'KAMIS', 1, 0, '2019-03-19'),
(569, 0, 13, 'KAMIS', 2, 0, '2019-03-19'),
(570, 0, 13, 'KAMIS', 3, 0, '2019-03-19'),
(571, 2, 13, 'KAMIS', 4, 0, '2019-03-19'),
(572, 0, 13, 'KAMIS', 5, 0, '2019-03-19'),
(573, 0, 13, 'KAMIS', 6, 0, '2019-03-19'),
(574, 0, 13, 'KAMIS', 7, 0, '2019-03-19'),
(575, 0, 13, 'KAMIS', 8, 0, '2019-03-19'),
(576, 0, 13, 'KAMIS', 9, 0, '2019-03-19'),
(577, 0, 13, 'JUMAT', 1, 0, '2019-03-19'),
(578, 0, 13, 'JUMAT', 2, 0, '2019-03-19'),
(579, 0, 13, 'JUMAT', 3, 0, '2019-03-19'),
(580, 0, 13, 'JUMAT', 4, 0, '2019-03-19'),
(581, 2, 13, 'JUMAT', 5, 0, '2019-03-19'),
(582, 0, 13, 'JUMAT', 6, 0, '2019-03-19'),
(583, 0, 13, 'JUMAT', 7, 0, '2019-03-19'),
(584, 0, 13, 'JUMAT', 8, 0, '2019-03-19'),
(585, 0, 13, 'JUMAT', 9, 0, '2019-03-19'),
(586, 0, 14, 'SENIN', 1, 0, '2019-03-19'),
(587, 2, 14, 'SENIN', 2, 0, '2019-03-19'),
(588, 0, 14, 'SENIN', 3, 0, '2019-03-19'),
(589, 0, 14, 'SENIN', 4, 0, '2019-03-19'),
(590, 0, 14, 'SENIN', 5, 0, '2019-03-19'),
(591, 0, 14, 'SENIN', 6, 0, '2019-03-19'),
(592, 0, 14, 'SENIN', 7, 0, '2019-03-19'),
(593, 0, 14, 'SENIN', 8, 0, '2019-03-19'),
(594, 0, 14, 'SENIN', 9, 0, '2019-03-19'),
(595, 0, 14, 'SELASA', 1, 0, '2019-03-19'),
(596, 0, 14, 'SELASA', 2, 0, '2019-03-19'),
(597, 2, 14, 'SELASA', 3, 0, '2019-03-19'),
(598, 0, 14, 'SELASA', 4, 0, '2019-03-19'),
(599, 0, 14, 'SELASA', 5, 0, '2019-03-19'),
(600, 0, 14, 'SELASA', 6, 0, '2019-03-19'),
(601, 0, 14, 'SELASA', 7, 0, '2019-03-19'),
(602, 0, 14, 'SELASA', 8, 0, '2019-03-19'),
(603, 0, 14, 'SELASA', 9, 0, '2019-03-19'),
(604, 0, 14, 'RABU', 1, 0, '2019-03-19'),
(605, 0, 14, 'RABU', 2, 0, '2019-03-19'),
(606, 0, 14, 'RABU', 3, 0, '2019-03-19'),
(607, 2, 14, 'RABU', 4, 0, '2019-03-19'),
(608, 0, 14, 'RABU', 5, 0, '2019-03-19'),
(609, 0, 14, 'RABU', 6, 0, '2019-03-19'),
(610, 0, 14, 'RABU', 7, 0, '2019-03-19'),
(611, 0, 14, 'RABU', 8, 0, '2019-03-19'),
(612, 0, 14, 'RABU', 9, 0, '2019-03-19'),
(613, 0, 14, 'KAMIS', 1, 0, '2019-03-19'),
(614, 0, 14, 'KAMIS', 2, 0, '2019-03-19'),
(615, 0, 14, 'KAMIS', 3, 0, '2019-03-19'),
(616, 0, 14, 'KAMIS', 4, 0, '2019-03-19'),
(617, 2, 14, 'KAMIS', 5, 0, '2019-03-19'),
(618, 0, 14, 'KAMIS', 6, 0, '2019-03-19'),
(619, 0, 14, 'KAMIS', 7, 0, '2019-03-19'),
(620, 0, 14, 'KAMIS', 8, 0, '2019-03-19'),
(621, 0, 14, 'KAMIS', 9, 0, '2019-03-19'),
(622, 0, 14, 'JUMAT', 1, 0, '2019-03-19'),
(623, 0, 14, 'JUMAT', 2, 0, '2019-03-19'),
(624, 0, 14, 'JUMAT', 3, 0, '2019-03-19'),
(625, 0, 14, 'JUMAT', 4, 0, '2019-03-19'),
(626, 0, 14, 'JUMAT', 5, 0, '2019-03-19'),
(627, 2, 14, 'JUMAT', 6, 0, '2019-03-19'),
(628, 0, 14, 'JUMAT', 7, 0, '2019-03-19'),
(629, 0, 14, 'JUMAT', 8, 0, '2019-03-19'),
(630, 0, 14, 'JUMAT', 9, 0, '2019-03-19'),
(631, 1, 15, 'SENIN', 1, 0, '2019-03-19'),
(632, 1, 15, 'SENIN', 2, 0, '2019-03-19'),
(633, 1, 15, 'SENIN', 3, 0, '2019-03-19'),
(634, 2, 15, 'SENIN', 4, 0, '2019-03-19'),
(635, 2, 15, 'SENIN', 5, 0, '2019-03-19'),
(636, 2, 15, 'SENIN', 6, 0, '2019-03-19'),
(637, 3, 15, 'SENIN', 7, 0, '2019-03-19'),
(638, 3, 15, 'SENIN', 8, 0, '2019-03-19'),
(639, 3, 15, 'SENIN', 9, 0, '2019-03-19'),
(640, 7, 15, 'SELASA', 1, 0, '2019-03-19'),
(641, 7, 15, 'SELASA', 2, 0, '2019-03-19'),
(642, 7, 15, 'SELASA', 3, 0, '2019-03-19'),
(643, 4, 15, 'SELASA', 4, 0, '2019-03-19'),
(644, 4, 15, 'SELASA', 5, 0, '2019-03-19'),
(645, 4, 15, 'SELASA', 6, 0, '2019-03-19'),
(646, 3, 15, 'SELASA', 7, 0, '2019-03-19'),
(647, 3, 15, 'SELASA', 8, 0, '2019-03-19'),
(648, 3, 15, 'SELASA', 9, 0, '2019-03-19'),
(649, 2, 15, 'RABU', 1, 0, '2019-03-19'),
(650, 2, 15, 'RABU', 2, 0, '2019-03-19'),
(651, 1, 15, 'RABU', 3, 0, '2019-03-19'),
(652, 1, 15, 'RABU', 4, 0, '2019-03-19'),
(653, 1, 15, 'RABU', 5, 0, '2019-03-19'),
(654, 2, 15, 'RABU', 6, 0, '2019-03-19'),
(655, 7, 15, 'RABU', 7, 0, '2019-03-19'),
(656, 7, 15, 'RABU', 8, 0, '2019-03-19'),
(657, 7, 15, 'RABU', 9, 0, '2019-03-19'),
(658, 4, 15, 'KAMIS', 1, 0, '2019-03-19'),
(659, 4, 15, 'KAMIS', 2, 0, '2019-03-19'),
(660, 4, 15, 'KAMIS', 3, 0, '2019-03-19'),
(661, 3, 15, 'KAMIS', 4, 0, '2019-03-19'),
(662, 3, 15, 'KAMIS', 5, 0, '2019-03-19'),
(663, 3, 15, 'KAMIS', 6, 0, '2019-03-19'),
(664, 2, 15, 'KAMIS', 7, 0, '2019-03-19'),
(665, 2, 15, 'KAMIS', 8, 0, '2019-03-19'),
(666, 2, 15, 'KAMIS', 9, 0, '2019-03-19'),
(667, 7, 15, 'JUMAT', 1, 0, '2019-03-19'),
(668, 7, 15, 'JUMAT', 2, 0, '2019-03-19'),
(669, 7, 15, 'JUMAT', 3, 0, '2019-03-19'),
(670, 3, 15, 'JUMAT', 4, 0, '2019-03-19'),
(671, 3, 15, 'JUMAT', 5, 0, '2019-03-19'),
(672, 3, 15, 'JUMAT', 6, 0, '2019-03-19'),
(673, 1, 15, 'JUMAT', 7, 0, '2019-03-19'),
(674, 1, 15, 'JUMAT', 8, 0, '2019-03-19'),
(675, 1, 15, 'JUMAT', 9, 0, '2019-03-19'),
(676, 0, 16, 'SENIN', 1, 0, '2019-03-19'),
(677, 0, 16, 'SENIN', 2, 0, '2019-03-19'),
(678, 0, 16, 'SENIN', 3, 0, '2019-03-19'),
(679, 0, 16, 'SENIN', 4, 0, '2019-03-19'),
(680, 0, 16, 'SENIN', 5, 0, '2019-03-19'),
(681, 0, 16, 'SENIN', 6, 0, '2019-03-19'),
(682, 0, 16, 'SENIN', 7, 0, '2019-03-19'),
(683, 0, 16, 'SENIN', 8, 0, '2019-03-19'),
(684, 0, 16, 'SENIN', 9, 0, '2019-03-19'),
(685, 0, 16, 'SELASA', 1, 0, '2019-03-19'),
(686, 0, 16, 'SELASA', 2, 0, '2019-03-19'),
(687, 0, 16, 'SELASA', 3, 0, '2019-03-19'),
(688, 0, 16, 'SELASA', 4, 0, '2019-03-19'),
(689, 0, 16, 'SELASA', 5, 0, '2019-03-19'),
(690, 0, 16, 'SELASA', 6, 0, '2019-03-19'),
(691, 0, 16, 'SELASA', 7, 0, '2019-03-19'),
(692, 0, 16, 'SELASA', 8, 0, '2019-03-19'),
(693, 0, 16, 'SELASA', 9, 0, '2019-03-19'),
(694, 0, 16, 'RABU', 1, 0, '2019-03-19'),
(695, 0, 16, 'RABU', 2, 0, '2019-03-19'),
(696, 0, 16, 'RABU', 3, 0, '2019-03-19'),
(697, 0, 16, 'RABU', 4, 0, '2019-03-19'),
(698, 0, 16, 'RABU', 5, 0, '2019-03-19'),
(699, 0, 16, 'RABU', 6, 0, '2019-03-19'),
(700, 0, 16, 'RABU', 7, 0, '2019-03-19'),
(701, 0, 16, 'RABU', 8, 0, '2019-03-19'),
(702, 0, 16, 'RABU', 9, 0, '2019-03-19'),
(703, 0, 16, 'KAMIS', 1, 0, '2019-03-19'),
(704, 0, 16, 'KAMIS', 2, 0, '2019-03-19'),
(705, 0, 16, 'KAMIS', 3, 0, '2019-03-19'),
(706, 0, 16, 'KAMIS', 4, 0, '2019-03-19'),
(707, 0, 16, 'KAMIS', 5, 0, '2019-03-19'),
(708, 0, 16, 'KAMIS', 6, 0, '2019-03-19'),
(709, 0, 16, 'KAMIS', 7, 0, '2019-03-19'),
(710, 0, 16, 'KAMIS', 8, 0, '2019-03-19'),
(711, 0, 16, 'KAMIS', 9, 0, '2019-03-19'),
(712, 0, 16, 'JUMAT', 1, 0, '2019-03-19'),
(713, 0, 16, 'JUMAT', 2, 0, '2019-03-19'),
(714, 0, 16, 'JUMAT', 3, 0, '2019-03-19'),
(715, 0, 16, 'JUMAT', 4, 0, '2019-03-19'),
(716, 0, 16, 'JUMAT', 5, 0, '2019-03-19'),
(717, 0, 16, 'JUMAT', 6, 0, '2019-03-19'),
(718, 0, 16, 'JUMAT', 7, 0, '2019-03-19'),
(719, 0, 16, 'JUMAT', 8, 0, '2019-03-19'),
(720, 0, 16, 'JUMAT', 9, 0, '2019-03-19');

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
  `id_gurutahunan` varchar(250) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `status_kelas` tinyint(1) NOT NULL,
  `tgl_submit_kelas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jurusan`, `urutan`, `id_gurutahunan`, `id_tahun_ajaran`, `status_kelas`, `tgl_submit_kelas`) VALUES
(13, 10, 'IPA', 1, '1', 1, 0, '2019-03-19'),
(14, 10, 'IPA', 2, '9', 1, 0, '2019-03-19'),
(15, 10, 'IPS', 1, '12', 1, 0, '2019-03-19'),
(16, 11, 'IPS', 1, '9', 1, 0, '2019-03-19');

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

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kelas_siswa`, `id_siswa_angkatan`, `id_kelas`, `status_kelas_siswa`, `tgl_submit_kelas_siswa`) VALUES
(4, 1, 9, 0, '2019-03-19'),
(5, 3, 15, 0, '2019-03-19'),
(6, 2, 13, 0, '2019-03-19');

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
(1, 'Matematika', 'UMUM', 0, '2019-03-16'),
(2, 'Bahasa Indonesia', 'UMUM', 0, '2019-03-16'),
(3, 'Bahasa Inggris', 'UMUM', 0, '2019-03-16'),
(4, 'Pendidikan Jasmani', 'UMUM', 0, '2019-03-16'),
(5, 'Fisika', 'IPA', 0, '2019-03-16'),
(6, 'Matematika Peminatan', 'IPA', 0, '2019-03-16'),
(7, 'Biologi', 'IPA', 0, '2019-03-16'),
(8, 'Kimia', 'IPA', 0, '2019-03-16'),
(9, 'Geografi', 'IPS', 0, '2019-03-16'),
(10, 'Sejarah Peminatan', 'IPS', 0, '2019-03-16'),
(11, 'Ekonomi', 'IPS', 0, '2019-03-16'),
(12, 'Akuntansi', 'IPS', 0, '2019-03-16'),
(13, 'Sosiologi', 'IPS', 0, '2019-03-16'),
(14, 'Pendidikan Agama', 'UMUM', 0, '2019-03-16');

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
(1, 1, 5, 0, '2019-03-16'),
(6, 2, 4, 0, '2019-03-16'),
(7, 2, 1, 0, '2019-03-16'),
(8, 2, 5, 0, '2019-03-16'),
(10, 3, 2, 0, '2019-03-16'),
(11, 3, 3, 0, '2019-03-16'),
(12, 3, 4, 0, '2019-03-16'),
(13, 4, 5, 0, '2019-03-16'),
(14, 5, 2, 0, '2019-03-16'),
(15, 5, 3, 0, '2019-03-16'),
(16, 5, 4, 0, '2019-03-16'),
(17, 6, 2, 0, '2019-03-16'),
(18, 6, 3, 0, '2019-03-16'),
(19, 6, 4, 0, '2019-03-16'),
(20, 7, 5, 0, '2019-03-16'),
(21, 1, 8, 0, '2019-03-16'),
(22, 1, 10, 0, '2019-03-16'),
(23, 2, 6, 0, '2019-03-16'),
(24, 2, 7, 0, '2019-03-16'),
(25, 2, 8, 0, '2019-03-16'),
(26, 2, 9, 0, '2019-03-16'),
(27, 2, 10, 0, '2019-03-16'),
(28, 3, 8, 0, '2019-03-16'),
(29, 3, 10, 0, '2019-03-16'),
(30, 3, 12, 0, '2019-03-16'),
(31, 4, 12, 0, '2019-03-16'),
(32, 4, 10, 0, '2019-03-16'),
(33, 5, 9, 0, '2019-03-16'),
(34, 5, 7, 0, '2019-03-16'),
(35, 5, 6, 0, '2019-03-16'),
(36, 5, 11, 0, '2019-03-16'),
(37, 6, 7, 0, '2019-03-16'),
(38, 6, 9, 0, '2019-03-16'),
(39, 6, 11, 0, '2019-03-16'),
(40, 7, 10, 0, '2019-03-16'),
(41, 7, 8, 0, '2019-03-16'),
(42, 7, 12, 0, '2019-03-16'),
(43, 2, 13, 0, '2019-03-19'),
(44, 2, 14, 0, '2019-03-19'),
(45, 1, 15, 0, '2019-03-19'),
(46, 1, 16, 0, '2019-03-19'),
(47, 7, 15, 0, '2019-03-19'),
(48, 7, 16, 0, '2019-03-19'),
(49, 3, 13, 0, '2019-03-19'),
(50, 3, 14, 0, '2019-03-19'),
(51, 3, 15, 0, '2019-03-19'),
(52, 3, 16, 0, '2019-03-19'),
(53, 4, 15, 0, '2019-03-19'),
(54, 4, 16, 0, '2019-03-19'),
(55, 2, 15, 0, '2019-03-19');

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

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `id_mingguan`, `status_quiz`, `tgl_submit_quiz`) VALUES
(1, 6, 0, '2019-03-21'),
(3, 4, 0, '2019-03-21');

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
(2, 43, 'IPA', 0, 0, '2019-03-18'),
(3, 44, 'IPA', 0, 0, '2019-03-19'),
(4, 45, 'IPS', 0, 0, '2019-03-19'),
(5, 46, 'IPA', 0, 0, '2019-03-21');

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

--
-- Dumping data for table `siswa_angkatan`
--

INSERT INTO `siswa_angkatan` (`id_siswa_angkatan`, `id_tahun_ajaran`, `id_siswa`, `kelas`, `status_siswa_angkatan`, `tgl_submit_siswa_angkatan`) VALUES
(1, 1, 2, 11, 0, '2019-03-18'),
(2, 1, 3, 10, 0, '2019-03-18'),
(3, 1, 4, 10, 0, '2019-03-19'),
(4, 1, 5, 10, 0, '2019-03-21');

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

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `pertanyaan`, `opsi1`, `opsi2`, `opsi3`, `opsi4`, `jawaban`, `id_quiz`, `status_soal`, `tgl_submit_soal`) VALUES
(63, 'a', 'a', 'a', 'a', 'a', '1', '1', 0, '2019-03-21'),
(64, 'a', 'a', 'a', 'a', 'a', '1', '1', 0, '2019-03-21'),
(65, 'a', 'a', 'a', 'a', 'a', '1', '1', 0, '2019-03-21'),
(66, 'a', 'a', 'a', 'a', 'a', '1', '1', 0, '2019-03-21'),
(67, 'b', 'b', 'b', 'b', 'b', '1', '1', 0, '2019-03-21'),
(68, 'b', 'b', 'b', 'b', 'b', '1', '1', 0, '2019-03-21'),
(69, 'b', 'b', 'b', 'b', 'b', '1', '1', 0, '2019-03-21'),
(70, 'b', 'b', 'b', 'b', 'b', '1', '1', 0, '2019-03-21'),
(71, 'b', 'b', 'b', 'b', 'b', '1', '1', 0, '2019-03-21'),
(72, 'c', 'c', 'c', 'c', 'c', '1', '1', 0, '2019-03-21'),
(73, 'c', 'c', 'c', 'c', 'c', '1', '1', 0, '2019-03-21'),
(74, 'c', 'c', 'c', 'c', 'c', '1', '1', 0, '2019-03-21'),
(75, 'c', 'c', 'c', 'c', 'c', '2', '1', 0, '2019-03-21'),
(76, 'c', 'c', 'c', 'c', 'c', '2', '1', 0, '2019-03-21'),
(77, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1', '3', 0, '2019-03-21'),
(78, 'asdf', 'asdf', 'asf', 'asf', 'fsa', '1', '3', 0, '2019-03-21'),
(79, 'dsa', 'dsa', 'dsads', 'dsads', 'ads', '1', '3', 0, '2019-03-21'),
(80, 'sda', 'dsa', 'dsa', 'dsa', 'dsa', '1', '3', 0, '2019-03-21'),
(81, 'ad', 'sadas', 'dsa', 'dsa', 'dsa', '1', '3', 0, '2019-03-21');

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
(1, 2018, 2019, '0', '2019-03-16');

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
(5, 'joshua', 'natan', '2019-03-12', '089616961915', 'joshuanatan.jn4@gmail.com', 'abc', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-12', 0, 0, 5),
(34, 'Joshua', 'Luih', '1998-06-06', '082154435489', 'luih123.joshua@gmail.com', 'Avalon Residence', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(36, 'Joshua Natan', 'Wijaya', '1998-03-13', '089616961915', 'joshuanatan.jn@gmail.com', 'Kembang Molek IX / 5', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(37, 'Bryan ', 'Liming', '1111-11-11', '12345', 'bryanliming@gmail.com', 'asdf', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(38, 'Eugenius Rudolf', 'Pranoto', '1998-11-15', '1234', 'eugenepranoto@gmail.com', 'Ures', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(39, 'Wivina', 'Daicy', '1999-10-23', '082153967707', 'wivina.daicy@gmail.com', 'Kos dekat sini', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(40, 'Jovan', 'Hidayat', '1998-05-01', '1234', 'jovanhidayat@gmail.com', 'citra', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(41, 'Debora', 'Margareta', '1998-12-03', '1234', 'debmargareta@gmail.com', 'aefa', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(42, 'DavinE', 'Nathan', '1999-06-24', '082153441171', 'a@smfnskegmail.com', 'ae;wjfklajwelkfj', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-19', 4, 0, 1),
(43, 'Davin', 'Nathan', '1999-06-24', '324', 'afewofjaojefoiajweojo@gmail.com', 'aejowfjaowjef', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-18', 4, 0, 1),
(44, 'awefkljAWELFK', 'awlekfjlkefj', '1111-11-11', '234234', 'alkewfj@gmail.com', 'akejfoajefk', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-19', 4, 0, 1),
(45, 'adff', 'aewfaef', '1111-11-11', '32049834', 'jorjoeijfoajwepf@gmail.com', 'aejfoajweofja', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-19', 4, 0, 1),
(46, 'k', 'k', '1111-11-11', '324', 'afkjk@gmail.com', 'awekojfokaj', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-21', 4, 0, 1);

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `aktivitas_mingguan`
--
ALTER TABLE `aktivitas_mingguan`
  MODIFY `id_mingguan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guru_tahunan`
--
ALTER TABLE `guru_tahunan`
  MODIFY `id_gurutahunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=721;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa_angkatan`
--
ALTER TABLE `siswa_angkatan`
  MODIFY `id_siswa_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
