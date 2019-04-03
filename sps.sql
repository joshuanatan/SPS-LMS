-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 08:30 AM
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

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_mingguan`, `id_siswaangkatan`, `status_absen`, `tgl_submit_absen`) VALUES
(9, 6, 5, 0, 2019),
(10, 6, 8, 0, 2019),
(11, 6, 11, 0, 2019),
(12, 6, 12, 0, 2019),
(13, 6, 13, 0, 2019),
(14, 6, 9, 0, 2019),
(15, 6, 20, 0, 2019),
(16, 10, 5, 0, 2019),
(17, 10, 8, 0, 2019),
(18, 10, 11, 0, 2019),
(19, 10, 12, 0, 2019),
(20, 10, 13, 0, 2019),
(21, 10, 7, 0, 2019),
(22, 10, 9, 0, 2019),
(23, 10, 20, 0, 2019),
(24, 11, 8, 0, 2019),
(25, 11, 11, 0, 2019),
(26, 11, 13, 0, 2019),
(27, 11, 7, 0, 2019),
(28, 11, 20, 0, 2019);

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

--
-- Dumping data for table `aktivitas_mingguan`
--

INSERT INTO `aktivitas_mingguan` (`id_mingguan`, `id_jadwal`, `tgl_kelas`, `materi_mingguan`, `deskripsi_materi`, `status_aktivitas`, `status_ujian`) VALUES
(3, 637, '2019-03-20', 'asek', '-', 0, 0),
(4, 587, '2019-03-20', 'Matematika Dasar', '-', 0, 1),
(5, 587, '2019-03-20', 'Perkenalan Logaritma', '-', 0, 1),
(6, 541, '2019-03-20', 'awefawef', 'Pengelana abc', 0, 1),
(9, 634, '2019-03-20', 'Pengenalan manfaat matematika dasar dalam kehidupan sehari-hari', 'asdf', 0, 0),
(10, 541, '2019-03-21', 'Bryan Liming', 'mantap', 0, 1),
(11, 541, '2019-03-30', ' Distribusi Normal', '-', 0, 1);

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
(3, 6, 1, '2019-03-21', 'Functional_Document_Final.docx', 'MATERI', 'yo', 36),
(4, 6, 0, '2019-03-25', 'PBIK-Tionghoa.jpg', 'MATERI', 'test', 36);

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
(1, 34, 0, '2019-03-16', 13),
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
(541, 2, 13, 'SENIN', 1, 0, '2019-03-28'),
(542, 3, 13, 'SENIN', 2, 0, '2019-03-28'),
(543, 0, 13, 'SENIN', 3, 0, '2019-03-28'),
(544, 0, 13, 'SENIN', 4, 0, '2019-03-28'),
(545, 0, 13, 'SENIN', 5, 0, '2019-03-28'),
(546, 0, 13, 'SENIN', 6, 0, '2019-03-28'),
(547, 0, 13, 'SENIN', 7, 0, '2019-03-28'),
(548, 0, 13, 'SENIN', 8, 0, '2019-03-28'),
(549, 0, 13, 'SENIN', 9, 0, '2019-03-28'),
(550, 0, 13, 'SELASA', 1, 0, '2019-03-28'),
(551, 2, 13, 'SELASA', 2, 0, '2019-03-28'),
(552, 3, 13, 'SELASA', 3, 0, '2019-03-28'),
(553, 0, 13, 'SELASA', 4, 0, '2019-03-28'),
(554, 0, 13, 'SELASA', 5, 0, '2019-03-28'),
(555, 0, 13, 'SELASA', 6, 0, '2019-03-28'),
(556, 0, 13, 'SELASA', 7, 0, '2019-03-28'),
(557, 0, 13, 'SELASA', 8, 0, '2019-03-28'),
(558, 0, 13, 'SELASA', 9, 0, '2019-03-28'),
(559, 0, 13, 'RABU', 1, 0, '2019-03-28'),
(560, 0, 13, 'RABU', 2, 0, '2019-03-28'),
(561, 3, 13, 'RABU', 3, 0, '2019-03-28'),
(562, 3, 13, 'RABU', 4, 0, '2019-03-28'),
(563, 0, 13, 'RABU', 5, 0, '2019-03-28'),
(564, 0, 13, 'RABU', 6, 0, '2019-03-28'),
(565, 0, 13, 'RABU', 7, 0, '2019-03-28'),
(566, 0, 13, 'RABU', 8, 0, '2019-03-28'),
(567, 0, 13, 'RABU', 9, 0, '2019-03-28'),
(568, 0, 13, 'KAMIS', 1, 0, '2019-03-28'),
(569, 0, 13, 'KAMIS', 2, 0, '2019-03-28'),
(570, 0, 13, 'KAMIS', 3, 0, '2019-03-28'),
(571, 2, 13, 'KAMIS', 4, 0, '2019-03-28'),
(572, 0, 13, 'KAMIS', 5, 0, '2019-03-28'),
(573, 0, 13, 'KAMIS', 6, 0, '2019-03-28'),
(574, 0, 13, 'KAMIS', 7, 0, '2019-03-28'),
(575, 0, 13, 'KAMIS', 8, 0, '2019-03-28'),
(576, 0, 13, 'KAMIS', 9, 0, '2019-03-28'),
(577, 0, 13, 'JUMAT', 1, 0, '2019-03-28'),
(578, 0, 13, 'JUMAT', 2, 0, '2019-03-28'),
(579, 0, 13, 'JUMAT', 3, 0, '2019-03-28'),
(580, 0, 13, 'JUMAT', 4, 0, '2019-03-28'),
(581, 2, 13, 'JUMAT', 5, 0, '2019-03-28'),
(582, 0, 13, 'JUMAT', 6, 0, '2019-03-28'),
(583, 0, 13, 'JUMAT', 7, 0, '2019-03-28'),
(584, 0, 13, 'JUMAT', 8, 0, '2019-03-28'),
(585, 0, 13, 'JUMAT', 9, 0, '2019-03-28'),
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
(720, 0, 16, 'JUMAT', 9, 0, '2019-03-19'),
(721, 0, 17, 'SENIN', 1, 0, '2019-03-24'),
(722, 0, 17, 'SENIN', 2, 0, '2019-03-24'),
(723, 0, 17, 'SENIN', 3, 0, '2019-03-24'),
(724, 0, 17, 'SENIN', 4, 0, '2019-03-24'),
(725, 0, 17, 'SENIN', 5, 0, '2019-03-24'),
(726, 0, 17, 'SENIN', 6, 0, '2019-03-24'),
(727, 0, 17, 'SENIN', 7, 0, '2019-03-24'),
(728, 0, 17, 'SENIN', 8, 0, '2019-03-24'),
(729, 0, 17, 'SENIN', 9, 0, '2019-03-24'),
(730, 0, 17, 'SELASA', 1, 0, '2019-03-24'),
(731, 0, 17, 'SELASA', 2, 0, '2019-03-24'),
(732, 0, 17, 'SELASA', 3, 0, '2019-03-24'),
(733, 0, 17, 'SELASA', 4, 0, '2019-03-24'),
(734, 0, 17, 'SELASA', 5, 0, '2019-03-24'),
(735, 0, 17, 'SELASA', 6, 0, '2019-03-24'),
(736, 0, 17, 'SELASA', 7, 0, '2019-03-24'),
(737, 0, 17, 'SELASA', 8, 0, '2019-03-24'),
(738, 0, 17, 'SELASA', 9, 0, '2019-03-24'),
(739, 0, 17, 'RABU', 1, 0, '2019-03-24'),
(740, 0, 17, 'RABU', 2, 0, '2019-03-24'),
(741, 0, 17, 'RABU', 3, 0, '2019-03-24'),
(742, 0, 17, 'RABU', 4, 0, '2019-03-24'),
(743, 0, 17, 'RABU', 5, 0, '2019-03-24'),
(744, 0, 17, 'RABU', 6, 0, '2019-03-24'),
(745, 0, 17, 'RABU', 7, 0, '2019-03-24'),
(746, 0, 17, 'RABU', 8, 0, '2019-03-24'),
(747, 0, 17, 'RABU', 9, 0, '2019-03-24'),
(748, 0, 17, 'KAMIS', 1, 0, '2019-03-24'),
(749, 0, 17, 'KAMIS', 2, 0, '2019-03-24'),
(750, 0, 17, 'KAMIS', 3, 0, '2019-03-24'),
(751, 0, 17, 'KAMIS', 4, 0, '2019-03-24'),
(752, 0, 17, 'KAMIS', 5, 0, '2019-03-24'),
(753, 0, 17, 'KAMIS', 6, 0, '2019-03-24'),
(754, 0, 17, 'KAMIS', 7, 0, '2019-03-24'),
(755, 0, 17, 'KAMIS', 8, 0, '2019-03-24'),
(756, 0, 17, 'KAMIS', 9, 0, '2019-03-24'),
(757, 0, 17, 'JUMAT', 1, 0, '2019-03-24'),
(758, 0, 17, 'JUMAT', 2, 0, '2019-03-24'),
(759, 0, 17, 'JUMAT', 3, 0, '2019-03-24'),
(760, 0, 17, 'JUMAT', 4, 0, '2019-03-24'),
(761, 0, 17, 'JUMAT', 5, 0, '2019-03-24'),
(762, 0, 17, 'JUMAT', 6, 0, '2019-03-24'),
(763, 0, 17, 'JUMAT', 7, 0, '2019-03-24'),
(764, 0, 17, 'JUMAT', 8, 0, '2019-03-24'),
(765, 0, 17, 'JUMAT', 9, 0, '2019-03-24'),
(766, 3, 18, 'SENIN', 1, 0, '2019-03-25'),
(767, 7, 18, 'SENIN', 2, 0, '2019-03-25'),
(768, 3, 18, 'SENIN', 3, 0, '2019-03-25'),
(769, 7, 18, 'SENIN', 4, 0, '2019-03-25'),
(770, 3, 18, 'SENIN', 5, 0, '2019-03-25'),
(771, 1, 18, 'SENIN', 6, 0, '2019-03-25'),
(772, 7, 18, 'SENIN', 7, 0, '2019-03-25'),
(773, 0, 18, 'SENIN', 8, 0, '2019-03-25'),
(774, 0, 18, 'SENIN', 9, 0, '2019-03-25'),
(775, 0, 18, 'SELASA', 1, 0, '2019-03-25'),
(776, 0, 18, 'SELASA', 2, 0, '2019-03-25'),
(777, 0, 18, 'SELASA', 3, 0, '2019-03-25'),
(778, 0, 18, 'SELASA', 4, 0, '2019-03-25'),
(779, 0, 18, 'SELASA', 5, 0, '2019-03-25'),
(780, 0, 18, 'SELASA', 6, 0, '2019-03-25'),
(781, 0, 18, 'SELASA', 7, 0, '2019-03-25'),
(782, 2, 18, 'SELASA', 8, 0, '2019-03-25'),
(783, 0, 18, 'SELASA', 9, 0, '2019-03-25'),
(784, 0, 18, 'RABU', 1, 0, '2019-03-25'),
(785, 7, 18, 'RABU', 2, 0, '2019-03-25'),
(786, 0, 18, 'RABU', 3, 0, '2019-03-25'),
(787, 0, 18, 'RABU', 4, 0, '2019-03-25'),
(788, 0, 18, 'RABU', 5, 0, '2019-03-25'),
(789, 1, 18, 'RABU', 6, 0, '2019-03-25'),
(790, 3, 18, 'RABU', 7, 0, '2019-03-25'),
(791, 0, 18, 'RABU', 8, 0, '2019-03-25'),
(792, 0, 18, 'RABU', 9, 0, '2019-03-25'),
(793, 0, 18, 'KAMIS', 1, 0, '2019-03-25'),
(794, 0, 18, 'KAMIS', 2, 0, '2019-03-25'),
(795, 0, 18, 'KAMIS', 3, 0, '2019-03-25'),
(796, 0, 18, 'KAMIS', 4, 0, '2019-03-25'),
(797, 1, 18, 'KAMIS', 5, 0, '2019-03-25'),
(798, 0, 18, 'KAMIS', 6, 0, '2019-03-25'),
(799, 0, 18, 'KAMIS', 7, 0, '2019-03-25'),
(800, 0, 18, 'KAMIS', 8, 0, '2019-03-25'),
(801, 0, 18, 'KAMIS', 9, 0, '2019-03-25'),
(802, 0, 18, 'JUMAT', 1, 0, '2019-03-25'),
(803, 0, 18, 'JUMAT', 2, 0, '2019-03-25'),
(804, 2, 18, 'JUMAT', 3, 0, '2019-03-25'),
(805, 0, 18, 'JUMAT', 4, 0, '2019-03-25'),
(806, 0, 18, 'JUMAT', 5, 0, '2019-03-25'),
(807, 0, 18, 'JUMAT', 6, 0, '2019-03-25'),
(808, 0, 18, 'JUMAT', 7, 0, '2019-03-25'),
(809, 0, 18, 'JUMAT', 8, 0, '2019-03-25'),
(810, 0, 18, 'JUMAT', 9, 0, '2019-03-25');

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

--
-- Dumping data for table `jawaban_quiz`
--

INSERT INTO `jawaban_quiz` (`id_jawaban`, `id_soal`, `id_user`, `jawaban_quiz`, `status_jawaban`, `tgl_submit_jawaban`) VALUES
(65, 87, 47, '1', 0, '2019-03-25'),
(66, 88, 47, '2', 0, '2019-03-25'),
(67, 89, 47, '3', 0, '2019-03-25'),
(68, 90, 47, '3', 0, '2019-03-25'),
(69, 91, 47, '3', 0, '2019-03-25'),
(70, 92, 47, '4', 0, '2019-03-25'),
(71, 93, 47, '2', 0, '2019-03-25'),
(72, 94, 47, '2', 0, '2019-03-25'),
(73, 95, 47, '3', 0, '2019-03-25'),
(74, 96, 47, '3', 0, '2019-03-25'),
(75, 97, 47, '2', 0, '2019-03-25'),
(76, 98, 47, '2', 0, '2019-03-25'),
(77, 99, 47, '4', 0, '2019-03-25'),
(78, 100, 47, '2', 0, '2019-03-25'),
(79, 82, 47, '1', 0, '2019-03-26'),
(80, 83, 47, '2', 0, '2019-03-26'),
(81, 84, 47, '3', 0, '2019-03-26'),
(82, 85, 47, '2', 0, '2019-03-26'),
(83, 86, 47, '2', 0, '2019-03-26');

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
(16, 11, 'IPS', 1, '9', 1, 0, '2019-03-19'),
(17, 10, 'IPA', 3, '13', 1, 0, '2019-03-24'),
(18, 10, 'IPS', 2, '10', 1, 0, '2019-03-25');

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
(6, 2, 13, 0, '2019-03-19'),
(7, 4, 13, 0, '2019-03-23'),
(8, 5, 13, 0, '2019-03-24'),
(9, 8, 13, 0, '2019-03-24'),
(10, 11, 13, 0, '2019-03-24'),
(11, 12, 13, 0, '2019-03-24'),
(12, 13, 13, 0, '2019-03-24'),
(13, 10, 14, 0, '2019-03-24'),
(14, 15, 14, 0, '2019-03-24'),
(15, 16, 14, 0, '2019-03-24'),
(16, 18, 14, 0, '2019-03-24'),
(17, 19, 14, 0, '2019-03-24'),
(19, 27, 15, 0, '2019-03-24'),
(20, 28, 15, 0, '2019-03-24'),
(21, 29, 15, 0, '2019-03-24'),
(22, 30, 15, 0, '2019-03-24'),
(23, 31, 15, 0, '2019-03-24'),
(24, 32, 15, 0, '2019-03-24'),
(25, 33, 15, 0, '2019-03-24'),
(26, 34, 15, 0, '2019-03-24'),
(27, 35, 15, 0, '2019-03-24'),
(28, 46, 15, 0, '2019-03-24'),
(29, 47, 15, 0, '2019-03-24'),
(30, 48, 15, 0, '2019-03-24'),
(31, 49, 15, 0, '2019-03-24'),
(32, 50, 15, 0, '2019-03-24'),
(33, 51, 15, 0, '2019-03-24'),
(34, 52, 15, 0, '2019-03-24'),
(35, 53, 15, 0, '2019-03-24'),
(36, 54, 15, 0, '2019-03-24'),
(37, 55, 15, 0, '2019-03-24'),
(38, 6, 14, 0, '2019-03-24'),
(39, 14, 14, 0, '2019-03-24'),
(40, 17, 14, 0, '2019-03-24'),
(41, 7, 13, 0, '2019-03-24'),
(42, 9, 13, 0, '2019-03-24'),
(43, 20, 13, 0, '2019-03-24'),
(44, 21, 17, 0, '2019-03-24'),
(45, 22, 17, 0, '2019-03-24'),
(46, 23, 17, 0, '2019-03-24'),
(47, 24, 17, 0, '2019-03-24'),
(48, 25, 17, 0, '2019-03-24'),
(49, 56, 18, 0, '2019-03-25'),
(50, 57, 18, 0, '2019-03-25'),
(51, 58, 18, 0, '2019-03-25'),
(52, 59, 18, 0, '2019-03-25'),
(53, 60, 18, 0, '2019-03-25'),
(54, 61, 18, 0, '2019-03-25'),
(55, 62, 18, 0, '2019-03-25'),
(56, 63, 18, 0, '2019-03-25'),
(57, 64, 18, 0, '2019-03-25');

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

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id_matpel`, `nama_matpel`, `jenis_matpel`, `kkm`, `tugas`, `lab`, `quiz`, `uh`, `uts`, `uas`, `status_matpel`, `tgl_submit_matpel`) VALUES
(1, 'Matematika', 'UMUM', 100, 10, 10, 5, 20, 20, 35, 0, '2019-03-25'),
(2, 'Bahasa Indonesia', 'UMUM', 90, 111, 11, 111, 111, 111, 111, 0, '2019-03-25'),
(3, 'Bahasa Inggris', 'UMUM', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(4, 'Pendidikan Jasmani', 'UMUM', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(5, 'Fisika', 'IPA', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(6, 'Matematika Peminatan', 'IPA', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(7, 'Biologi', 'IPA', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(8, 'Kimia', 'IPA', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(9, 'Geografi', 'IPS', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(10, 'Sejarah Peminatan', 'IPS', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(11, 'Ekonomi', 'IPS', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(12, 'Akuntansi', 'IPS', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(13, 'Sosiologi', 'IPS', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(14, 'Pendidikan Agama', 'UMUM', 0, 0, 0, 0, 0, 0, 0, 0, '2019-03-16'),
(15, 'Fisika', 'UMUM', 75, 10, 0, 20, 20, 40, 10, 0, '2019-03-25');

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

--
-- Dumping data for table `nilai_quiz`
--

INSERT INTO `nilai_quiz` (`id_nilai_quiz`, `id_siswa`, `id_quiz`, `nilai_quiz`, `status_nilai`, `tgl_submit_nilai`) VALUES
(1, 5, 1, '2', 0, '2019-03-25'),
(2, 5, 4, '1', 0, '2019-03-26');

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
  `id_user` int(11) NOT NULL,
  `topik` text NOT NULL,
  `konten` text NOT NULL,
  `dateline` date NOT NULL,
  `status_pengumuman` tinyint(4) NOT NULL,
  `tgl_submit_pengumuman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_user`, `topik`, `konten`, `dateline`, `status_pengumuman`, `tgl_submit_pengumuman`) VALUES
(1, 36, 'adsljkafd', 'alwekfjawelkf\r\n', '1998-03-13', 0, '2019-03-27'),
(2, 36, 'ldsklajsdfadsf', 'lklkjfalsdkasdf', '2019-04-06', 1, '2019-03-27'),
(3, 37, 'ujian temen', 'akan menguji teman sendiri', '2019-03-31', 0, '2019-03-28'),
(4, 36, 'ujian dosen', 'menguji dosen', '2019-04-01', 0, '2019-03-28');

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

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_siswa_angkatan`, `id_penugasan`, `nilai_tugas`, `nilai_lab`, `nilai_uh`, `nilai_uts`, `nilai_uas`, `tgl_submit_penilaian`) VALUES
(5, 43, 90, 80, 90, 100, 90, '2019-03-24'),
(6, 44, 20, 10, 75, 30, 40, '2019-03-24'),
(7, 43, 90, 90, 95, 95, 90, '2019-03-24'),
(8, 43, 80, 70, 85, 0, 0, '2019-03-24'),
(9, 43, 0, 0, 90, 0, 0, '2019-03-24'),
(10, 44, 0, 0, 75, 0, 0, '2019-03-24'),
(11, 43, 0, 0, 90, 0, 0, '2019-03-24'),
(12, 43, 0, 0, 95, 0, 0, '2019-03-24'),
(13, 43, 0, 0, 100, 0, 0, '2019-03-24'),
(14, 44, 0, 0, 75, 0, 0, '2019-03-24'),
(15, 44, 0, 0, 75, 0, 0, '2019-03-24'),
(16, 44, 0, 0, 80, 0, 0, '2019-03-24'),
(17, 44, 0, 0, 75, 0, 0, '2019-03-24'),
(18, 44, 0, 0, 75, 0, 0, '2019-03-24'),
(19, 44, 0, 0, 75, 0, 0, '2019-03-24'),
(20, 43, 0, 0, 90, 0, 0, '2019-03-24');

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
(55, 2, 15, 0, '2019-03-19'),
(56, 1, 18, 0, '2019-03-25'),
(57, 2, 18, 0, '2019-03-25'),
(58, 7, 18, 0, '2019-03-25'),
(59, 3, 18, 0, '2019-03-25');

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
(3, 4, 0, '2019-03-21'),
(4, 11, 0, '2019-03-25');

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
(5, 46, 'IPA', 0, 0, '2019-03-21'),
(6, 47, 'IPA', 0, 0, '2019-03-24'),
(7, 48, 'IPA', 0, 0, '2019-03-24'),
(8, 49, 'IPA', 0, 0, '2019-03-24'),
(9, 50, 'IPA', 0, 0, '2019-03-24'),
(10, 51, 'IPA', 0, 0, '2019-03-24'),
(11, 52, 'IPA', 0, 0, '2019-03-24'),
(12, 53, 'IPA', 0, 0, '2019-03-24'),
(13, 54, 'IPA', 0, 0, '2019-03-24'),
(14, 55, 'IPA', 0, 0, '2019-03-24'),
(15, 56, 'IPA', 0, 0, '2019-03-24'),
(16, 57, 'IPA', 0, 0, '2019-03-24'),
(17, 58, 'IPA', 0, 0, '2019-03-24'),
(18, 59, 'IPA', 0, 0, '2019-03-24'),
(19, 60, 'IPA', 0, 0, '2019-03-24'),
(20, 61, 'IPA', 0, 0, '2019-03-24'),
(21, 62, 'IPA', 0, 0, '2019-03-24'),
(22, 63, 'IPA', 0, 0, '2019-03-24'),
(23, 64, 'IPA', 0, 0, '2019-03-24'),
(24, 65, 'IPA', 0, 0, '2019-03-24'),
(25, 66, 'IPA', 0, 0, '2019-03-24'),
(26, 67, 'IPA', 0, 0, '2019-03-24'),
(67, 88, 'IPS', 0, 0, '2019-03-24'),
(68, 89, 'IPS', 0, 0, '2019-03-24'),
(69, 90, 'IPS', 0, 0, '2019-03-24'),
(70, 91, 'IPS', 0, 0, '2019-03-24'),
(71, 92, 'IPS', 0, 0, '2019-03-24'),
(72, 93, 'IPS', 0, 0, '2019-03-24'),
(73, 94, 'IPS', 0, 0, '2019-03-24'),
(74, 95, 'IPS', 0, 0, '2019-03-24'),
(75, 96, 'IPS', 0, 0, '2019-03-24'),
(76, 97, 'IPS', 0, 0, '2019-03-24'),
(77, 98, 'IPS', 0, 0, '2019-03-24'),
(78, 99, 'IPS', 0, 0, '2019-03-24'),
(79, 100, 'IPS', 0, 0, '2019-03-24'),
(80, 101, 'IPS', 0, 0, '2019-03-24'),
(81, 102, 'IPS', 0, 0, '2019-03-24'),
(82, 103, 'IPS', 0, 0, '2019-03-24'),
(83, 104, 'IPS', 0, 0, '2019-03-24'),
(84, 105, 'IPS', 0, 0, '2019-03-24'),
(85, 106, 'IPS', 0, 0, '2019-03-24');

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
(5, 1, 6, 10, 0, '2019-03-24'),
(6, 1, 7, 10, 0, '2019-03-24'),
(7, 1, 8, 10, 0, '2019-03-24'),
(8, 1, 9, 10, 0, '2019-03-24'),
(9, 1, 10, 10, 0, '2019-03-24'),
(10, 1, 11, 10, 0, '2019-03-24'),
(11, 1, 12, 10, 0, '2019-03-24'),
(12, 1, 13, 10, 0, '2019-03-24'),
(13, 1, 14, 10, 0, '2019-03-24'),
(14, 1, 15, 10, 0, '2019-03-24'),
(15, 1, 16, 10, 0, '2019-03-24'),
(16, 1, 17, 10, 0, '2019-03-24'),
(17, 1, 18, 10, 0, '2019-03-24'),
(18, 1, 19, 10, 0, '2019-03-24'),
(19, 1, 20, 10, 0, '2019-03-24'),
(20, 1, 21, 10, 0, '2019-03-24'),
(21, 1, 22, 10, 0, '2019-03-24'),
(22, 1, 23, 10, 0, '2019-03-24'),
(23, 1, 24, 10, 0, '2019-03-24'),
(24, 1, 25, 10, 0, '2019-03-24'),
(25, 1, 26, 10, 0, '2019-03-24'),
(26, 1, 28, 10, 0, '2019-03-24'),
(27, 1, 30, 10, 0, '2019-03-24'),
(28, 1, 32, 10, 0, '2019-03-24'),
(29, 1, 34, 10, 0, '2019-03-24'),
(30, 1, 36, 10, 0, '2019-03-24'),
(31, 1, 38, 10, 0, '2019-03-24'),
(32, 1, 40, 10, 0, '2019-03-24'),
(33, 1, 42, 10, 0, '2019-03-24'),
(34, 1, 44, 10, 0, '2019-03-24'),
(35, 1, 46, 10, 0, '2019-03-24'),
(36, 1, 48, 10, 0, '2019-03-24'),
(37, 1, 50, 10, 0, '2019-03-24'),
(38, 1, 52, 10, 0, '2019-03-24'),
(39, 1, 54, 10, 0, '2019-03-24'),
(40, 1, 56, 10, 0, '2019-03-24'),
(41, 1, 58, 10, 0, '2019-03-24'),
(42, 1, 60, 10, 0, '2019-03-24'),
(43, 1, 62, 10, 0, '2019-03-24'),
(44, 1, 64, 10, 0, '2019-03-24'),
(45, 1, 66, 10, 0, '2019-03-24'),
(46, 1, 67, 10, 0, '2019-03-24'),
(47, 1, 68, 10, 0, '2019-03-24'),
(48, 1, 69, 10, 0, '2019-03-24'),
(49, 1, 70, 10, 0, '2019-03-24'),
(50, 1, 71, 10, 0, '2019-03-24'),
(51, 1, 72, 10, 0, '2019-03-24'),
(52, 1, 73, 10, 0, '2019-03-24'),
(53, 1, 74, 10, 0, '2019-03-24'),
(54, 1, 75, 10, 0, '2019-03-24'),
(55, 1, 76, 10, 0, '2019-03-24'),
(56, 1, 77, 10, 0, '2019-03-24'),
(57, 1, 78, 10, 0, '2019-03-24'),
(58, 1, 79, 10, 0, '2019-03-24'),
(59, 1, 80, 10, 0, '2019-03-24'),
(60, 1, 81, 10, 0, '2019-03-24'),
(61, 1, 82, 10, 0, '2019-03-24'),
(62, 1, 83, 10, 0, '2019-03-24'),
(63, 1, 84, 10, 0, '2019-03-24'),
(64, 1, 85, 10, 0, '2019-03-24');

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
(77, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '1', '3', 0, '2019-03-21'),
(78, 'asdf', 'asdf', 'asf', 'asf', 'fsa', '1', '3', 0, '2019-03-21'),
(79, 'dsa', 'dsa', 'dsads', 'dsads', 'ads', '1', '3', 0, '2019-03-21'),
(80, 'sda', 'dsa', 'dsa', 'dsa', 'dsa', '1', '3', 0, '2019-03-21'),
(81, 'ad', 'sadas', 'dsa', 'dsa', 'dsa', '1', '3', 0, '2019-03-21'),
(82, 'a', 'a', 'c', 'c', 'd', '1', '4', 0, '2019-03-25'),
(83, 'b', 'o', 'k', 'k', 'l', '1', '4', 0, '2019-03-25'),
(84, 'fd', 'lk', 'lkj', 'lkj', 'lkj', '1', '4', 0, '2019-03-25'),
(85, 'lejf', 'lkj', 'lkj', 'lkj', 'lkj', '1', '4', 0, '2019-03-25'),
(86, 'lkj', 'lkj', 'lkj', 'lkj', 'lkj', '1', '4', 0, '2019-03-25'),
(87, 'a', 'a', 'c', 'c', 'd', '1', '1', 0, '2019-03-25'),
(88, 'a', 'b', 'd', 'd', 'a', '1', '1', 0, '2019-03-25'),
(89, 'a', 'a', 'b', 'b', 'e', '1', '1', 0, '2019-03-25'),
(90, 'a', '', 'g', 'g', 'h', '1', '1', 0, '2019-03-25'),
(91, 'b', 'd', 'k', 'k', 'j', '1', '1', 0, '2019-03-25'),
(92, 'b', 'l', 'o', 'o', 'p', '1', '1', 0, '2019-03-25'),
(93, 'b', 'k', 'j', 'j', 'j', '1', '1', 0, '2019-03-25'),
(94, 'b', 'h', 'i', 'i', 'k', '1', '1', 0, '2019-03-25'),
(95, 'b', 'n', 'm', 'm', 'h', '1', '1', 0, '2019-03-25'),
(96, 'c', 'k', 'n', 'n', 'h', '1', '1', 0, '2019-03-25'),
(97, 'c', 'h', 'j', 'j', 'k', '1', '1', 0, '2019-03-25'),
(98, 'c', 'l', 'j', 'j', 'h', '1', '1', 0, '2019-03-25'),
(99, 'c', 'm', 'b', 'b', 'v', '2', '1', 0, '2019-03-25'),
(100, 'c', 'i', 'p', 'p', 'u', '2', '1', 0, '2019-03-25');

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
-- Table structure for table `ulangan_harian`
--

CREATE TABLE `ulangan_harian` (
  `id_aktivitas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulangan_harian`
--

INSERT INTO `ulangan_harian` (`id_aktivitas`, `id_siswa`, `nilai`) VALUES
(0, 0, 80),
(4, 6, 70),
(4, 10, 70),
(4, 14, 70),
(4, 15, 70),
(4, 16, 79),
(4, 17, 70),
(4, 18, 70),
(4, 19, 70),
(5, 6, 80),
(5, 10, 80),
(5, 14, 80),
(5, 15, 80),
(5, 16, 80),
(5, 17, 80),
(5, 18, 80),
(5, 19, 80),
(6, 5, 100),
(6, 7, 100),
(6, 8, 100),
(6, 9, 100),
(6, 11, 100),
(6, 12, 100),
(6, 13, 100),
(6, 20, 80),
(10, 5, 80),
(10, 7, 90),
(10, 8, 70),
(10, 9, 80),
(10, 11, 80),
(10, 12, 90),
(10, 13, 100),
(10, 20, 100),
(11, 5, 100),
(11, 7, 100),
(11, 8, 100),
(11, 9, 100),
(11, 11, 100),
(11, 12, 100),
(11, 13, 100),
(11, 20, 100);

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
(34, 'Joshua', 'Luih', '1998-06-06', '09832938293', 'luih123.joshua@gmail.com', 'avalon', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-27', 5, 0, 2),
(36, 'Joshua Natan', 'Wijaya', '1998-03-13', '089616961915', 'joshuanatan.jn@gmail.com', 'Kembang Molek IX / 5', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(37, 'Bryan ', 'Liming', '1111-11-11', '12345', 'bryanliming@gmail.com', 'asdf', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(38, 'Eugenius Rudolf', 'Pranoto', '1998-11-15', '1234', 'eugenepranoto@gmail.com', 'Ures', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(39, 'Wivina', 'Daicy', '1999-10-23', '082153967707', 'wivina.daicy@gmail.com', 'Kos dekat sini', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(40, 'Jovan', 'Hidayat', '1998-05-01', '1234', 'jovanhidayat@gmail.com', 'citra', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(41, 'Debora', 'Margareta', '1998-12-03', '1234', 'debmargareta@gmail.com', 'aefa', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-16', 5, 0, 2),
(47, 'a', 'a', '1111-11-11', '1', 'aewf@a.com', 'aewf', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(48, 'namadepan0', 'namabelakang0', '2019-03-24', '098989898989', 'email0@gmail.com', 'alamat0', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(49, 'namadepan1', 'namabelakang1', '2019-03-24', '098989898989', 'email1@gmail.com', 'alamat1', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(50, 'namadepan2', 'namabelakang2', '2019-03-24', '098989898989', 'email2@gmail.com', 'alamat2', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(51, 'namadepan3', 'namabelakang3', '2019-03-24', '098989898989', 'email3@gmail.com', 'alamat3', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(52, 'namadepan4', 'namabelakang4', '2019-03-24', '098989898989', 'email4@gmail.com', 'alamat4', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(53, 'namadepan5', 'namabelakang5', '2019-03-24', '098989898989', 'email5@gmail.com', 'alamat5', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(54, 'namadepan6', 'namabelakang6', '2019-03-24', '098989898989', 'email6@gmail.com', 'alamat6', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(55, 'namadepan7', 'namabelakang7', '2019-03-24', '098989898989', 'email7@gmail.com', 'alamat7', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(56, 'namadepan8', 'namabelakang8', '2019-03-24', '098989898989', 'email8@gmail.com', 'alamat8', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(57, 'namadepan9', 'namabelakang9', '2019-03-24', '098989898989', 'email9@gmail.com', 'alamat9', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(58, 'namadepan10', 'namabelakang10', '2019-03-24', '098989898989', 'email10@gmail.com', 'alamat10', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(59, 'namadepan11', 'namabelakang11', '2019-03-24', '098989898989', 'email11@gmail.com', 'alamat11', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(60, 'namadepan12', 'namabelakang12', '2019-03-24', '098989898989', 'email12@gmail.com', 'alamat12', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(61, 'namadepan13', 'namabelakang13', '2019-03-24', '098989898989', 'email13@gmail.com', 'alamat13', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(62, 'namadepan14', 'namabelakang14', '2019-03-24', '098989898989', 'email14@gmail.com', 'alamat14', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(63, 'namadepan15', 'namabelakang15', '2019-03-24', '098989898989', 'email15@gmail.com', 'alamat15', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(64, 'namadepan16', 'namabelakang16', '2019-03-24', '098989898989', 'email16@gmail.com', 'alamat16', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(65, 'namadepan17', 'namabelakang17', '2019-03-24', '098989898989', 'email17@gmail.com', 'alamat17', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(66, 'namadepan18', 'namabelakang18', '2019-03-24', '098989898989', 'email18@gmail.com', 'alamat18', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(67, 'namadepan19', 'namabelakang19', '2019-03-24', '098989898989', 'email19@gmail.com', 'alamat19', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(68, 'namadepan0', 'namabelakang0', '2019-03-24', '098989898989', 'email0@gmail.com', 'alamat0', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(69, 'namadepan1', 'namabelakang1', '2019-03-24', '098989898989', 'email1@gmail.com', 'alamat1', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(70, 'namadepan2', 'namabelakang2', '2019-03-24', '098989898989', 'email2@gmail.com', 'alamat2', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(71, 'namadepan3', 'namabelakang3', '2019-03-24', '098989898989', 'email3@gmail.com', 'alamat3', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(72, 'namadepan4', 'namabelakang4', '2019-03-24', '098989898989', 'email4@gmail.com', 'alamat4', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(73, 'namadepan5', 'namabelakang5', '2019-03-24', '098989898989', 'email5@gmail.com', 'alamat5', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(74, 'namadepan6', 'namabelakang6', '2019-03-24', '098989898989', 'email6@gmail.com', 'alamat6', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(75, 'namadepan7', 'namabelakang7', '2019-03-24', '098989898989', 'email7@gmail.com', 'alamat7', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(76, 'namadepan8', 'namabelakang8', '2019-03-24', '098989898989', 'email8@gmail.com', 'alamat8', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(77, 'namadepan9', 'namabelakang9', '2019-03-24', '098989898989', 'email9@gmail.com', 'alamat9', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(78, 'namadepan10', 'namabelakang10', '2019-03-24', '098989898989', 'email10@gmail.com', 'alamat10', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(79, 'namadepan11', 'namabelakang11', '2019-03-24', '098989898989', 'email11@gmail.com', 'alamat11', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(80, 'namadepan12', 'namabelakang12', '2019-03-24', '098989898989', 'email12@gmail.com', 'alamat12', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(81, 'namadepan13', 'namabelakang13', '2019-03-24', '098989898989', 'email13@gmail.com', 'alamat13', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(82, 'namadepan14', 'namabelakang14', '2019-03-24', '098989898989', 'email14@gmail.com', 'alamat14', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(83, 'namadepan15', 'namabelakang15', '2019-03-24', '098989898989', 'email15@gmail.com', 'alamat15', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(84, 'namadepan16', 'namabelakang16', '2019-03-24', '098989898989', 'email16@gmail.com', 'alamat16', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(85, 'namadepan17', 'namabelakang17', '2019-03-24', '098989898989', 'email17@gmail.com', 'alamat17', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(86, 'namadepan18', 'namabelakang18', '2019-03-24', '098989898989', 'email18@gmail.com', 'alamat18', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(87, 'namadepan19', 'namabelakang19', '2019-03-24', '098989898989', 'email19@gmail.com', 'alamat19', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(88, 'namadepan21', 'namabelakang21', '2019-03-24', '098989898989', 'email21@gmail.com', 'alamat21', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(89, 'namadepan22', 'namabelakang22', '2019-03-24', '098989898989', 'email22@gmail.com', 'alamat22', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(90, 'namadepan23', 'namabelakang23', '2019-03-24', '098989898989', 'email23@gmail.com', 'alamat23', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(91, 'namadepan24', 'namabelakang24', '2019-03-24', '098989898989', 'email24@gmail.com', 'alamat24', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(92, 'namadepan25', 'namabelakang25', '2019-03-24', '098989898989', 'email25@gmail.com', 'alamat25', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(93, 'namadepan26', 'namabelakang26', '2019-03-24', '098989898989', 'email26@gmail.com', 'alamat26', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(94, 'namadepan27', 'namabelakang27', '2019-03-24', '098989898989', 'email27@gmail.com', 'alamat27', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(95, 'namadepan28', 'namabelakang28', '2019-03-24', '098989898989', 'email28@gmail.com', 'alamat28', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(96, 'namadepan29', 'namabelakang29', '2019-03-24', '098989898989', 'email29@gmail.com', 'alamat29', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(97, 'namadepan30', 'namabelakang30', '2019-03-24', '098989898989', 'email30@gmail.com', 'alamat30', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(98, 'namadepan31', 'namabelakang31', '2019-03-24', '098989898989', 'email31@gmail.com', 'alamat31', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(99, 'namadepan32', 'namabelakang32', '2019-03-24', '098989898989', 'email32@gmail.com', 'alamat32', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(100, 'namadepan33', 'namabelakang33', '2019-03-24', '098989898989', 'email33@gmail.com', 'alamat33', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(101, 'namadepan34', 'namabelakang34', '2019-03-24', '098989898989', 'email34@gmail.com', 'alamat34', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(102, 'namadepan35', 'namabelakang35', '2019-03-24', '098989898989', 'email35@gmail.com', 'alamat35', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(103, 'namadepan36', 'namabelakang36', '2019-03-24', '098989898989', 'email36@gmail.com', 'alamat36', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(104, 'namadepan37', 'namabelakang37', '2019-03-24', '098989898989', 'email37@gmail.com', 'alamat37', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(105, 'namadepan38', 'namabelakang38', '2019-03-24', '098989898989', 'email38@gmail.com', 'alamat38', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1),
(106, 'namadepan39', 'namabelakang39', '2019-03-24', '098989898989', 'email39@gmail.com', 'alamat39', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-24', 4, 0, 1);

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `aktivitas_mingguan`
--
ALTER TABLE `aktivitas_mingguan`
  MODIFY `id_mingguan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=811;

--
-- AUTO_INCREMENT for table `jawaban_quiz`
--
ALTER TABLE `jawaban_quiz`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kelas_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nilai_quiz`
--
ALTER TABLE `nilai_quiz`
  MODIFY `id_nilai_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_siswa_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penugasan_guru`
--
ALTER TABLE `penugasan_guru`
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `siswa_angkatan`
--
ALTER TABLE `siswa_angkatan`
  MODIFY `id_siswa_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
