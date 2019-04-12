-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 12, 2019 at 06:20 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `superadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(250) NOT NULL,
  `alamat_sekolah` varchar(250) NOT NULL,
  `email_sekolah` varchar(50) NOT NULL,
  `logo_sekolah` varchar(250) NOT NULL,
  `status_sekolah` tinyint(1) NOT NULL,
  `tgl_submit_sekolah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `email_sekolah`, `logo_sekolah`, `status_sekolah`, `tgl_submit_sekolah`) VALUES
(1, 'Sekolah Dian Harapan', 'Sentul', 'bryanlimcho@gmail.com', 'sekolah_dian_harapan1.png', 0, '2019-04-12'),
(2, 'Sekolah Pelita Harapan', 'Karawaci', 'bryanliming@icloud.com', 'default.png', 0, '2019-04-12'),
(3, 'Santa Laurensia', 'Alam Sutera', '', 'default.png', 0, '2019-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_sekolah` varchar(250) NOT NULL,
  `id_tahun_ajaran` varchar(250) NOT NULL,
  `jumlah_tagihan` int(50) NOT NULL,
  `status_tagihan` tinyint(1) NOT NULL,
  `tgl_submit_tagihan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_sekolah`, `id_tahun_ajaran`, `jumlah_tagihan`, `status_tagihan`, `tgl_submit_tagihan`) VALUES
(1, '1', '1', 50000, 0, '2019-03-20'),
(2, '2', '1', 50000000, 0, '2019-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahun_ajaran` int(10) NOT NULL,
  `tahun_awal` year(4) NOT NULL,
  `tahun_akhir` year(4) NOT NULL,
  `status_tahunajaran` tinyint(1) NOT NULL,
  `tgl_submit_tahunajaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `tahun_awal`, `tahun_akhir`, `status_tahunajaran`, `tgl_submit_tahunajaran`) VALUES
(0, 2018, 2019, 0, '2019-03-20'),
(1, 2019, 2020, 0, '2019-03-20'),
(2, 2020, 2021, 0, '2019-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_submit` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `tanggal_lahir`, `nomor_telepon`, `email`, `alamat`, `password`, `tgl_submit`, `status`, `role`) VALUES
(1, 'Bryan', 'Liming', '1996-02-20', '081321289312', 'bryanliming@gmail.com', 'Serpong', '3dbe00a167653a1aaee01d93e77e730e', '2019-03-20', 0, '0'),
(2, 'Joshua', 'Natan', '1995-03-04', '0813921381232', 'joshuanatan@gmail.com', 'Meruya', '3dbe00a167653a1aaee01d93e77e730e', '2019-03-20', 0, '1'),
(3, 'Joshua', 'Luih', '1996-05-05', '081239238217', 'luih123.joshua@gmail.com', 'Lombok', '3dbe00a167653a1aaee01d93e77e730e', '2019-04-12', 0, '1'),
(4, 'Jovan', 'Hidayat', '1996-03-04', '08123912839', 'jovan@gmail.com', 'Citra', '810247419084c82d03809fc886fedaad', '2019-03-20', 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

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
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
