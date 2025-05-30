-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 12:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmnbc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_latih`
--

CREATE TABLE `data_latih` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `jawaban_a` int(11) DEFAULT NULL,
  `jawaban_b` int(11) DEFAULT NULL,
  `jawaban_c` int(11) DEFAULT NULL,
  `jawaban_d` int(11) DEFAULT NULL,
  `kelas_asli` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_latih`
--

INSERT INTO `data_latih` (`id`, `nama`, `jenis_kelamin`, `usia`, `jurusan`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `kelas_asli`) VALUES
(1, 'Asher Fawwazadzka', 'L', 13, 'IPS', 19, 4, 5, 12, 'Sanguin'),
(2, 'Wafda Mukrom Q.F', 'L', 13, 'IPS', 15, 9, 9, 7, 'Sanguin'),
(3, 'Zulham \'Ali Fikri', 'L', 14, 'IPS', 5, 6, 12, 17, 'Plegmatis'),
(4, 'Qosholis S Al-Usama', 'L', 15, 'IPS', 13, 8, 9, 10, 'Sanguin'),
(5, 'Muhammad Shodiq', 'L', 15, 'IPS', 20, 9, 5, 6, 'Sanguin'),
(6, 'Hilmy Aziz M', 'L', 14, 'IPS', 10, 12, 13, 5, 'Melankolis'),
(7, 'Rafif', 'L', 14, 'IPS', 13, 7, 12, 8, 'Sanguin'),
(8, 'Muhammad F Attaqi', 'L', 14, 'IPS', 8, 11, 17, 4, 'Melankolis'),
(9, 'M. Najib Erdyansya', 'L', 13, 'IPS', 10, 13, 6, 11, 'Koleris'),
(10, 'Moh. Inas Ramadhan', 'L', 13, 'IPS', 16, 12, 7, 5, 'Sanguin'),
(11, 'Akmal Thoriq M', 'L', 15, 'IPS', 9, 14, 10, 7, 'Koleris'),
(12, 'Abdullah Yusuf F R', 'L', 13, 'IPS', 8, 6, 11, 15, 'Plegmatis'),
(13, 'Akhdan Muhammad F', 'L', 13, 'IPS', 12, 11, 9, 8, 'Sanguin'),
(14, 'Faris Saifullah', 'L', 14, 'IPS', 15, 8, 10, 7, 'Sanguin'),
(15, 'M Riza A.K', 'L', 13, 'IPS', 16, 6, 7, 11, 'Sanguin'),
(16, 'M. Lazuardy F', 'L', 13, 'IPS', 12, 8, 10, 10, 'Sanguin'),
(17, 'M Zidan Al Baihaqi', 'L', 14, 'IPS', 9, 4, 5, 22, 'Plegmatis'),
(18, 'Abdul Allam', 'L', 15, 'IPS', 10, 3, 12, 15, 'Plegmatis'),
(19, 'Sauqi Hilmi M', 'L', 14, 'IPS', 11, 2, 6, 21, 'Plegmatis'),
(20, 'Ahzami Asy-Syhadi', 'L', 13, 'IPS', 9, 9, 10, 12, 'Plegmatis'),
(21, 'Nashrul Fatih Y', 'L', 13, 'IPS', 13, 6, 9, 12, 'Sanguin'),
(22, 'Qomaruddin Zaki', 'L', 14, 'IPS', 8, 12, 10, 10, 'Koleris'),
(23, 'Ichsanul A Sholeh', 'L', 13, 'IPS', 15, 2, 8, 15, 'Sanguin'),
(24, 'Syahaq', 'L', 13, 'IPS', 10, 9, 9, 12, 'Plegmatis'),
(25, 'Betelgeuse W F K', 'L', 14, 'IPS', 12, 14, 9, 5, 'Koleris'),
(26, 'Dian Izza Nadiya', 'P', 15, 'IPS', 10, 8, 15, 7, 'Melankolis'),
(27, 'Ivana Thynaba Nareza', 'P', 14, 'IPS', 5, 4, 11, 20, 'Plegmatis'),
(28, 'Cia', 'P', 14, 'IPS', 24, 10, 2, 4, 'Sanguin'),
(29, 'Rahmadita Nurdian K', 'P', 14, 'IPS', 16, 11, 6, 7, 'Sanguin'),
(30, 'Shofiyyah R Aisy', 'P', 13, 'IPS', 5, 2, 17, 16, 'Melankolis'),
(31, 'Sabrina Salsa Oktavia', 'P', 14, 'IPS', 14, 11, 6, 9, 'Sanguin'),
(32, 'Anis', 'P', 14, 'IPS', 8, 2, 8, 22, 'Plegmatis'),
(33, 'Khansa F Nirwasita', 'P', 13, 'IPS', 21, 8, 5, 6, 'Sanguin'),
(34, 'Aisyah Regina P', 'P', 15, 'IPS', 8, 10, 9, 13, 'Plegmatis'),
(35, 'Syafina M Firdaus', 'P', 13, 'IPS', 12, 11, 10, 7, 'Sanguin'),
(36, 'M Yasmin', 'P', 13, 'IPS', 6, 15, 8, 11, 'Koleris'),
(37, 'Umu Latifatul Jannah', 'P', 13, 'IPS', 14, 5, 6, 15, 'Plegmatis'),
(38, 'Amara Rida Z', 'P', 15, 'IPS', 7, 8, 12, 13, 'Plegmatis'),
(39, 'Shofiatur Rahmah', 'P', 15, 'IPS', 5, 20, 10, 5, 'Koleris'),
(40, 'Urfi Zukhrufa', 'P', 13, 'IPS', 12, 1, 12, 15, 'Plegmatis'),
(41, 'Namira Aaiilah S', 'P', 13, 'IPS', 8, 4, 15, 13, 'Melankolis'),
(42, 'Putri Annisa Aura D', 'P', 14, 'IPS', 9, 4, 9, 18, 'Plegmatis'),
(43, 'Aisyah Lailai Habibah Firdausi', 'P', 14, 'IPS', 17, 4, 7, 12, 'Sanguin'),
(44, 'Deffanie Aulia R', 'P', 15, 'IPS', 10, 10, 14, 6, 'Melankolis'),
(45, 'Khanita Najla Nazhifa', 'P', 13, 'IPS', 9, 11, 7, 13, 'Plegmatis'),
(46, 'Rosy Fatati qonita', 'P', 15, 'IPS', 9, 4, 10, 17, 'Plegmatis'),
(47, 'Bilqis Belvana Enesia', 'P', 15, 'IPS', 7, 11, 10, 12, 'Plegmatis'),
(48, 'Rr. Mahira Muntaz', 'P', 13, 'IPS', 14, 6, 11, 9, 'Sanguin'),
(49, 'Nabila Salsabila', 'P', 13, 'IPS', 7, 6, 15, 12, 'Melankolis'),
(50, 'Syahidatul Izzah A', 'P', 13, 'IPS', 17, 11, 6, 6, 'Sanguin'),
(51, 'M. Syarifuddin N. R', 'L', 13, 'IPA', 9, 9, 10, 12, 'Plegmatis'),
(52, 'S. Agung Setiawan', 'L', 13, 'IPA', 8, 6, 11, 15, 'Plegmatis'),
(53, 'Bagas Septian P', 'L', 13, 'IPA', 10, 10, 14, 6, 'Melankolis'),
(54, 'M. Ramadhan', 'L', 13, 'IPA', 12, 4, 13, 11, 'Melankolis'),
(55, 'Dwi Agus Wijayanto', 'L', 13, 'IPA', 9, 5, 10, 16, 'Plegmatis'),
(56, 'Septian Priana A', 'L', 13, 'IPA', 10, 13, 5, 12, 'Koleris'),
(57, 'M. Rifan N', 'L', 14, 'IPA', 9, 5, 6, 20, 'Plegmatis'),
(58, 'Akbar Bagus P', 'L', 13, 'IPA', 10, 15, 6, 9, 'Koleris'),
(59, 'Miftachul Arista M.', 'L', 13, 'IPA', 10, 10, 13, 7, 'Melankolis'),
(60, 'Miracle Nathanael P', 'L', 14, 'IPA', 7, 6, 8, 19, 'Plegmatis'),
(61, 'Andika Aji P', 'L', 13, 'IPA', 10, 11, 9, 10, 'Koleris'),
(62, 'M Naufal Adib H', 'L', 13, 'IPA', 6, 11, 14, 9, 'Melankolis'),
(63, 'Kevin Alifiano Bassam', 'L', 13, 'IPA', 13, 9, 8, 10, 'Sanguin'),
(64, 'M Ilham Nur Rahmi', 'L', 13, 'IPA', 15, 5, 9, 11, 'Sanguin'),
(65, 'Ach.Fahrudin N', 'L', 13, 'IPA', 15, 9, 10, 6, 'Sanguin'),
(66, 'Nifa Lazwardy S', 'L', 13, 'IPA', 15, 12, 5, 8, 'Sanguin'),
(67, 'Rido Dimas Permadi', 'L', 14, 'IPA', 12, 14, 10, 4, 'Koleris'),
(68, 'M. Daffa Amrullah', 'L', 14, 'IPA', 5, 14, 10, 11, 'Koleris'),
(69, 'Moch.Rico Zaenoni', 'L', 14, 'IPA', 15, 12, 6, 7, 'Sanguin'),
(70, 'Amsal A Setyono', 'L', 14, 'IPA', 14, 5, 8, 13, 'Sanguin'),
(71, 'Khoirul Anam', 'L', 15, 'IPA', 6, 12, 6, 16, 'Plegmatis'),
(72, 'Muhammad Adam F', 'L', 13, 'IPA', 14, 8, 8, 10, 'Sanguin'),
(73, 'Yudistira Dimas S', 'L', 13, 'IPA', 10, 10, 8, 12, 'Plegmatis'),
(74, 'Muhammad S', 'L', 14, 'IPA', 12, 9, 5, 14, 'Plegmatis'),
(75, 'M. Abdullah Ilham A', 'L', 14, 'IPA', 13, 6, 9, 12, 'Sanguin'),
(76, 'Yati Nur Azizah', 'P', 13, 'IPA', 13, 7, 8, 12, 'Sanguin'),
(77, 'Berlian Sabilillah R', 'P', 13, 'IPA', 14, 7, 10, 9, 'Sanguin'),
(78, 'Safira Putri Frandika', 'P', 14, 'IPA', 11, 14, 7, 8, 'Koleris'),
(79, 'Fasta Itfina', 'P', 14, 'IPA', 12, 7, 13, 8, 'Melankolis'),
(80, 'Putri Sofiyana N', 'P', 14, 'IPA', 5, 12, 15, 8, 'Melankolis'),
(81, 'Arni Nur Unaifah', 'P', 13, 'IPA', 14, 18, 5, 3, 'Koleris'),
(82, 'Kharisma Yogi C', 'P', 13, 'IPA', 7, 15, 10, 8, 'Koleris'),
(83, 'Nandy Lava B. Utomo', 'P', 13, 'IPA', 12, 2, 16, 10, 'Melankolis'),
(84, 'Emilia Nur Rohmah', 'P', 13, 'IPA', 10, 4, 14, 12, 'Melankolis'),
(85, 'Racgmalia Nur Fitri', 'P', 14, 'IPA', 9, 6, 7, 18, 'Plegmatis'),
(86, 'Zillanatus V Aaliyah', 'P', 13, 'IPA', 4, 11, 11, 14, 'Plegmatis'),
(87, 'Rahma Nilam Cahya', 'P', 13, 'IPA', 8, 9, 14, 9, 'Melankolis'),
(88, 'Denok Handayani', 'P', 13, 'IPA', 6, 8, 16, 10, 'Melankolis'),
(89, 'Tiara Fauzul Islam', 'P', 13, 'IPA', 7, 12, 13, 8, 'Melankolis'),
(90, 'Cici Farida A. P', 'P', 13, 'IPA', 4, 4, 17, 15, 'Plegmatis'),
(91, 'Adhelia Putri P', 'P', 13, 'IPA', 12, 5, 6, 17, 'Plegmatis'),
(92, 'Arinta Agustine', 'P', 14, 'IPA', 13, 11, 10, 6, 'Sanguin'),
(93, 'Ameliatur Zahro', 'P', 14, 'IPA', 18, 9, 6, 7, 'Sanguin'),
(94, 'Elsandra Nur Maidah', 'P', 14, 'IPA', 17, 4, 11, 8, 'Sanguin'),
(95, 'Citra Indiana Putri', 'P', 13, 'IPA', 9, 9, 8, 14, 'Plegmatis'),
(96, 'Ayu Febri Wulandari', 'P', 13, 'IPA', 6, 5, 8, 21, 'Plegmatis'),
(97, 'Fischa Aditiyah W', 'P', 14, 'IPA', 13, 10, 7, 10, 'Sanguin'),
(98, 'Isma Marista Riyanti', 'P', 13, 'IPA', 13, 12, 8, 7, 'Sanguin'),
(99, 'Khodijah Febriyanti', 'P', 13, 'IPA', 12, 8, 11, 9, 'Sanguin'),
(100, 'Citra Tsabitan A', 'P', 13, 'IPA', 18, 9, 8, 5, 'Sanguin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_latih`
--
ALTER TABLE `data_latih`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_latih`
--
ALTER TABLE `data_latih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
