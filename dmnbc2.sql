-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 02:42 PM
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
-- Table structure for table `data_hasil_klasifikasi`
--

CREATE TABLE `data_hasil_klasifikasi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL DEFAULT 0,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `jawaban_a` int(11) DEFAULT NULL,
  `jawaban_b` int(11) DEFAULT NULL,
  `jawaban_c` int(11) DEFAULT NULL,
  `jawaban_d` int(11) DEFAULT NULL,
  `kelas_hasil` varchar(100) DEFAULT NULL,
  `nilai_sanguin` double DEFAULT NULL,
  `nilai_koleris` double DEFAULT NULL,
  `nilai_melankolis` double DEFAULT NULL,
  `nilai_plegmatis` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_hasil_klasifikasi`
--

INSERT INTO `data_hasil_klasifikasi` (`id`, `id_siswa`, `jenis_kelamin`, `usia`, `jurusan`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `kelas_hasil`, `nilai_sanguin`, `nilai_koleris`, `nilai_melankolis`, `nilai_plegmatis`) VALUES
(43, 43, 'L', 14, 'IPA', 1, 38, 1, 0, 'Plegmatis', 0.000000000032996341880214, 0.000000000035415660178425, 4.2837390526914e-20, 0.0000000021335117821296),
(44, 44, 'L', 15, 'IPS', 6, 27, 3, 4, '', 0.0000000000063192175332368, 0, 0, 0.00000000000034016169236155),
(52, 57, 'L', 25, 'IPA', 13, 12, 8, 3, 'Plegmatis', 0, 1.1313238475993e-96, 2.0736543133472e-122, 1.0660602721014e-75),
(56, 48, 'L', 14, 'IPA', 7, 17, 15, 1, 'Melankolis', 0.00000054082773021372, 0.000002254355622273, 0.0000040893007336205, 0.0000014751763778004),
(57, 59, 'L', 14, 'IPA', 11, 11, 9, 9, 'Koleris', 0.0000099444542556235, 0.000011866268785822, 0.00000006849293716911, 0.0000082008141805436);

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

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nama_siswa` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `jurusan` varchar(200) DEFAULT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nama_siswa`, `jenis_kelamin`, `usia`, `jurusan`, `id_user`) VALUES
(51, 'TESTESTES', 'P', 13, 'IPA', 73),
(52, 'tes', 'P', 53, 'IPS', 74),
(53, 'tes12134', 'P', 14, 'IPS', 75),
(54, 'wqe', 'L', 13, 'IPS', 76),
(55, 'testing', 'P', 4, 'IPA', 77),
(56, 'febri', 'L', 24, 'IPS', 78),
(57, 'saya', 'L', 25, 'IPA', 79),
(58, 'a', 'P', 1, 'IPS', 80),
(59, 'febri', 'L', 14, 'IPA', 81);

-- --------------------------------------------------------

--
-- Table structure for table `data_soal`
--

CREATE TABLE `data_soal` (
  `id` int(11) NOT NULL,
  `pilihan_a` text DEFAULT NULL,
  `pilihan_b` text DEFAULT NULL,
  `pilihan_c` text DEFAULT NULL,
  `pilihan_d` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_soal`
--

INSERT INTO `data_soal` (`id`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`) VALUES
(1, 'Penuh kehidupan, sering menggunakan isyarat tangan, lengan, dan wajah secara hidup.(Animated)', 'Orang yang mau melakukan sesuatu hal yang baru dan berani bertekad untuk me-nguasainya.(Adventurous)', 'Suka menyelidiki bagian - bagian yang logis. (Analitical)', 'Mudah menyesuaikan diri dan senang dalam setiap situasi. (Adaptable)'),
(2, 'Penuh kesenangan dan selera humor yang baik. (Playful)', 'Meyakinkan se-seorang dengan logika dan fakta, bukan dengan pesona / kekuasaan. (Persuasive)', 'Melakukan sesuatu sampai selesai sebelum memulai yang lain. (Persistent)', 'Tampak tidak ter-ganggu dan tenang serta menghindari setiap bentuk ke-kacauan. (Peaceful)'),
(3, 'Orang yang memandang bersama orang lain sebagai kesempatan untuk bersikap manis dan menghibur, bukannya sebagai tantangan / kesempatan bisnis. (Sociable)', 'Orang yang yakin dengan caranya sendiri. (Strong-Willed)', 'Bersedia mengorban-kan dirinya untuk memenuhi kebutuhan orang lain.', 'Dengan mudah menerima pandang-an / keinginan orang lain tanpa perlu banyak meng-ungkapkan pendapat sendiri. (Submissive)'),
(4, 'Bisa merebut hati orang lain melalui pesona kepribadian. (Convicing)', 'Mengubah setiap situasi, kejadian atau permainan sebagai sebuah kontes dan selalu bermain untuk menang. (Competitive)', 'Menghargai keperluan dan perasaan orang lain. (Considerate)', 'Mempunyai perasaan emosional tapi jarang memperlihatkannya. (Controlled)'),
(5, 'Memperbaharui dan membantu membuat orang lain merasa senang. (Refreshing)', 'Bisa bertindak cepat dan efektif dalam semua situasi. (Resourceful)', 'Memperlakukan orang lain dengan segan sebagai penghormatan dan penghargaan. (Respectfull)', 'Menahan diri dalam menunjukkan emosi atau antusiasme. (Reserved)'),
(6, 'Penuh gairah dalam kehidupan. (Spirited)', 'Orang mandiri yang bisa sepenuhnya mengandal-kan kemampuan dan sumber dayanya sendiri. (Self-Reliant)', 'Secara intensif memperhatikan orang lain maupun hal apapun yang terjadi di sekitar. (Sensitive)', 'Orang yang mudah menerima keadaan atau situasi apa saja. (Satisfied)'),
(7, 'Dapat mendorong atau memaksa orang lain mengikuti dan bergabung melalui pesona kepribadian-nya. (Promoter)', 'Mengetahui segalanya akan beres bila kita yang memimpin. (Positive)', 'Memilih mempersiap-kan aturan yang terinci sebelumnya dalam menyelesaikan suatu proyek dan lebih menyukai keterlibatan dalam tahap-tahap perencanaan dan produk jadi, bukan dalam melaksanakan tugas. (Planner)', 'Tidak terpengaruh oleh penundaan. Tetap tenang dan toleran. (Patient)'),
(8, 'Memilih agar semua kehidupan adalah kegiatan yang impulsif, tidak dipikirkan terlebih dahulu dan tidak terhambat oleh rencana.(Spontaneous)', 'Yakin, tidak ragu-ragu. (Sure)', 'Membuat dan meng-hayati hidup menurut rencana sehari-hari. Tidak menyukai bila rencananya terganggu.(Scheduled)', 'Pendiam, tidak mudah terseret dalam per-cakapan. (Shy)'),
(9, 'Orang yang riang dan dapat meyakinkan diri sendiri & orang lain bahwa semuanya akan beres. (Optimistic)', 'Bicara terang-terangan dan terkadang tidak menahan diri. (Outspoken)', 'Orang yang mengatur segala-galanya secara sistematis dan metodis. (Orderly)', 'menerima apa saja, cepat melakukan sesuatu bahkan dengan cara orang lain. (Obliging)'),
(10, 'Punya rasa humor yang cemerlang dan bisa membuat cerita apa saja menjadi peristiwa yang menyenangkan. (Funny)', 'Pribadi yang mendominasi dan mampu menyebabkan orang lain ragu - ragu untuk melawannya. (Forceful)', 'Secara konsisten dapat diandalkan, teguh, setia, dan mengabdi, bahkan terkadang tanpa alasan. (Faithful)', 'Orang yang menang-gapi. Bukan orang yang punya inisiatif untuk memulai per-cakapan. (Friendly)'),
(11, 'Orang yang me-nyenangkan sebagai teman. (Delightful)', 'Bersedia mengambil resiko tanpa kenal takut. (Daring)', 'Melakukan segala sesuatu secara ber-urutan dengan ingatan yang jernih akan segala hal yang terjadi. (Detailed)', 'Berurusan dengan orang lain secara penuh siasat, perasa, dan sabar. (Diplomatic)'),
(12, 'Secara konsisten memiliki semangat yang tinggi dan suka membagkan ke-bahagiaan kepada orang lain. (Cheerful)', 'Percaya diri dan yakin akan kemampuan dan kesuksesannya sendiri. (Confifent)', 'Orang yang perhatiannya melibat-kan sesuatu yang berhubungan dengan intelektual dan artistik. (Cultured)', 'Tetap memiliki ke-seimbangan secara emosional, me-nanggapi sebagaimana yang diharapkan orang lain. (Consisten)'),
(13, 'Mendorong orang lain untuk bekerja dan ter-libat serta membuat seluruhnya menyenangkan. (Inspiring)', 'Memenuhi diri sendiri, mandiri, penuh percaya diri dan nampak tidak begitu memerlukan bantuan. (Independent)', 'Memvisualisasikan hal-hal dalam bentuk yang sempurna dan perlu memenuhi standar itu sendiri. (Idealistic)', 'Tidak pernah me-ngatakan atau me-nyebabkan apapun yang tidak me-nyenangkan atau menimbulkan rasa keberatan. (Inoffensive)'),
(14, 'Terang-terangan me-nyatakan emosi terutama rasa sayang dan tidak ragu menyentuh ketika berbicara dengan orang lain. (Demonstrative)', 'Orang yang mempunyai kemampuan membuat penilaian yang cepat dan tuntas. (Decisive)', 'Intensif dan introspektif tanpa rasa senang pada percakapan dan pengajaran yang pulasan. (Deep)', 'Memperlihatkan ke-pandaian bicara yang mengigit\'. Biasanya kalimat satu baris yang sifatnya sarkastik. (Dryhumor)'),
(15, 'Menyukai pesta dan tidak bisa menunggu untuk bertemu setiap orang dalam ruangan, tidak pernah meng-anggap orang lain asing. (Mixes-easily)', 'Terdorong oleh keperluan untuk produktif, pemimpin yang dituruti orang lain. (Mover)', 'Punya apresiasi mendalam untuk musik, punya komitmen kepada musik sebagai bentuk seni, bukan hanya kesenangan pertunjukan. (Musical)', 'Secara konsisten mencari peranan merukunkan pertikaian supaya bisa meng-hindari konflik. (Mediator)'),
(16, 'Terus-menerus ber-bicara, biasanya men-ceritakan kisah lucu yang dapat menghibur setiap orang di sekitar-nya, merasa perlu mengisi kesunyian agar orang lain merasa senang. (Talker)', 'Memegang teguh dengan keras kepala dan tidak mau melepaskan hingga tujuan tercapai. (Tenacious)', 'Orang yang tanggap dan mengingat setiap kesempatan istimewa, cepat memberi isyarat yang baik. (Thoightful)', 'Mudah menerima pemikiran dan cara orang lain tanpa perlu tidak menyetujuinya. (Tolerant)'),
(17, 'Penuh kehidupan, kuat, dan penuh semangat. (Lively)', 'Pemberi pengarahan karena pembawaan yang terdorong untuk memimpin dan sering merasa sulit mem-percayai bahwa orang lain bisa melakukan pekerjaan dengan sama baiknya. (Leader)', 'Setia pada seseorang, gagasan, dan pekerja-an, terkadang dapat melampaui alasan. (Loyal)', 'Selalu bersedia men-dengarkan apa yang orang lain katakan. (Listener)'),
(18, 'Tak ternilai harganya, dicintai, pusat perhatian. (Cute)', 'Memegang ke-pemimpinan dan meng-harapkan orang lain mengikuti. (Chief)', 'Mengatur kehidupan, tugas, dan pemecahan masalah dengan membuat daftar. (Chartmaker)', 'Mudah puas dengan apa yang dimiliki, jarang iri hati. (Contented)'),
(19, 'Orang yang suka menghidupkan pesta sebagai diinginkan orang sebagai tamu pesta. (Populer)', 'Harus terus-menerus bekerja atau mencapai sesuatu, sering merasa sulit ber-istirahat. (Productive)', 'Menempatkan standar tinggi pada dirinya maupun orang lain. Menginginkan segala-galanya pada urutan semestinya.(Perfectionist)', 'Mudah bergaul, bersifat terbuka, mudah diajak bicara. (Pleasant)'),
(20, 'Kepribadian yang hidup, berlebihan, penuh tenaga. (Bouncy)', 'Tidak kenal takut, berani, terus terang, tidak takut akan resiko. (Bold)', 'Secara konsisten ingin membawa diri di dalam batas-batas apa yang dirasakan semestinya. (Behafed)', 'Kepribadian yang stabil dan berada di tengah-tengah. (Balanced)'),
(21, 'Memperlihatkan sedikit emosi / mimik. (Blank)', 'Menghindari perhatian akibat rasa malu. (Bashful)', 'Suka pamer, mem-perlihatkan apa yang gemerlap dan kuat, terlalu bersuara. (Brassy)', 'Suka memerintah, mendominasi, kadang-kadang mengesalkan antar hubungan orang dewasa. (Bossy)'),
(22, 'Kurang teraturan-nya mempengaruhi hampir semua bidang ke-hidupannya. (Undisipline)', 'Merasa sulit mengenali masalah dan perasaan orang lain. (Unsympathetic)', 'Sulit memaafkan dan melupakan sakit hati yang pernah dilakukan, biasa mendendam. (Unforgiving)', 'Cenderung tidak ber-gairah, sering merasa bahwa bagaimana-pun sesuatu tidak akan berhasil. (Unenthusiastic)'),
(23, 'Suka menceritakan kembali suatu kisah tanpa menyadari bahwa cerita tersebut pernah diceritakan sebelumnya, selalu perlu sesuatu untuk dikatakan. (Repetitious)', 'Berjuang, melawan untuk menerima cara lain yang tidak sesuai dengan cara yang diinginkan. (Resistant)', 'Sering memendam rasa tidak senang akibat merasa tersinggung oleh sesuatu. (Resenful)', 'Tidak bersedia ikut terlibat terutama bila rumit. (Reticent)'),
(24, 'Punya ingatan kurang kuat, biasa-nya berkaitan dengan kurang disiplin dan tidak mau repot-repot mencatat hal-hal yang tidak menyenangkan. (Forgetful)', 'Langsung, blak-blakan, tidak sungkan mengatakan apa yang dipikirkan. (Farank)', 'Bersikeras tentang persoalan sepele, minta perhatian besar pada persoalan yang tidak penting. (Fussy)', 'Sering merasa sangat khawatir, sedih, dan gelisah. (Fearful)'),
(25, 'Lebih banyak bicara daripada mendengar-kan, bila sudah bicara sulit berhenti. (Interrupts)', 'Sulit bertahan untuk menghadapi kekesal-an. (Impatient)', 'Kurang percaya diri. (Insecure)', 'Sulit dalam membuat keputusan. (Indesecive)'),
(26, 'Bisa bergairah sesaat dan sedih pada saat berikutnya. Bersedia membantu kemudian menghilang. Berjanji akan datang tapi kemudian lupa untuk muncul. (Unpredictable)', 'Merasa sulit mem-perlihatkan kasih sayang dengan terbuka. (Unaffectionate)', 'Tuntutannya akan kesempurnaan terlalu tinggi dan dapat membuat orang lain menjauhinya. (Unpopular)', 'Tidak tertarik pada perkumpulan atau kelompok. (Uninfolved)'),
(27, 'Tidak punya cara yang konsisten untuk melakukan banyak hal. (Haphazard)', 'Bersikeras memaksa-kan caranya sendiri. (Headstrong)', 'Standar yang ditetapkan begitu tinggi sehingga orang lain sulit memuaskannya. (Hard to Please)', 'Lambat dalam bergerak dan sulit untuk ikut terlibat. (Hesitant)'),
(28, 'Memperbolehkan orang lain, termasuk anak-anak untuk melakukan apa saja sesukanya untuk menghindari diri kita tidak disukai. (Permissive)', 'Punya harga diri tinggi dan menganggap diri selalu benar dan yang terbaik dalam pekerja-an. (Proud)', 'Dalam mengharapkan yang terbaik, biasanya melihat sisi buruk sesuatu terlebih dahulu. (Pessimistic)', 'Memiliki kepribadian yang biasa saja dan tidak suka mem-perlihatkan banyak emosi. (Plain)'),
(29, 'Memiliki perangai seperti anak-anak yang mengutarakan diri dengan ngambek dan berbuat ber-lebihan tetapi kemudian melupakan-nya seketika. (Angered-Easily)', 'Mudah merasa ter-asing dari orang lain dikarenakan rasa tidak aman atau takut jangan-jangan orang lain tidak merasa senang bersamanya. (Alienated)', 'Mengobarkan per-debatan karena biasanya selalu benar dan terkadang tidak peduli bagaimana situasi saat itu. (Argumentative)', 'Bukan orang yang suka menetapkan tujuan dan tidak berharap menjadi orang yang seperti itu. (Aimless)'),
(30, 'Memiliki perspektif yang sederhana dan kekanak-kanakan, kurang pengertian terhadap tingkat kehidupan yang lebih mendalam. (Naive)', 'Penuh keyakinan, semangat, dan keberanian (sering dalam pengertian negatif). (Nervy)', 'Sikapnya jarang positif dan sering hanya melihat sisi buruk dari setiap situasi. (Negative-Atitude)', 'Mudah bergaul, tidak peduli, dan masa bodoh. (Nonchalat)'),
(31, 'Merasa senang mendapat pengharga-an dari orang lain. Sebagai penghibur menyukai tepuk tangan, tawa, dan penerimaan penonton. (Wants-Credit)', 'Menetapkan tujuan secara agresif serta harus terus produktif, merasa bersalah bila beristirahat, bukan ter-dorong oleh keinginan untuk sempurna melainkan imbalan. (Workaholic)', 'Suka menarik diri dan memerlukan banyak waktu untuk sendirian atau mengasingkan diri. (Withdrawn)', 'Secara konsisten merasa terganggu atau resah. (Worrier)'),
(32, 'Suka berbicara dan sulit mendengarkan. (Talkative)', 'Kadang-kadang me-nyatakan diri dengan cara yang agak menyinggung perasaan dan kurang per-timbangan. (Tactless)', 'Terlalu introspektif dan mudah tersinggung kalau disalahpahami. (Too Sensitive)', 'Lebih suka mundur dari situasi sulit. (Timid)'),
(33, 'Kurang memiliki ke-mampuan dalam membuat kehidupan menjadi teratur. (Disorganized)', 'Dengan paksa mengambil kontrol atas situasi atau orang lain, biasanya dengan mengatakan apa yang harus dilakukan. (Domineering)', 'Hampir sepanjang waktu merasa tertekan. (Depressed)', 'Mempunyai ciri khas selalu tidak tetap dan kurang keyakinan bahwa suatu hal akan berhasil. (Doubtful)'),
(34, 'Tidak menentu, serba berlawanan dengan tindakan dan emosi yang tidak berdasar-kan logika. (Inconsistant)', 'Tampaknya tidak bisa menerima sikap, pandangan, dan cara orang lain. (Intolerant)', 'Pemikiran dan perhatian ditujukan ke dalam, hidup di dalam diri sendiri. (Introvert)', 'Merasa bahwa ke-banyakan hal tidak penting dalam suatu cara atau cara yang lain. (Indifferent)'),
(35, 'Hidup dalam keadaan tidak teratur, tidak dapat menemukan banyak benda. (Messy)', 'Mempengaruhi dengan cerdik dan penuh tipu untuk kepentingan sendiri; dengan suatu cara dapat memaksakan kehendak. (Manipulative)', 'Bicara pelan kalau didesak, tidak mau repot-repot bicara dengan jelas. (Mumbles)', 'Tidak punya emosi yang tinggi, tetapi biasanya semangatnya merosot sekali, apalagi bila merasa tidak dihargai. (Moody)'),
(36, 'Perlu menjadi pusat perhatian, ingin dilihat. (Show Off)', 'Bertekad memaksakan kehendaknya, tidak mudah dibujuk, keras kepala. (Stubborn)', 'Tidak mudah percaya, mempertanyakan motif di balik suatu perkataan. (Skeptical)', 'Tidak sering bertindak atau berpikir cepat, sangat mengganggu. (Slow)'),
(37, 'Tawa dan suaranya dapat didengar di atas suara lainnya di di dalam ruangan. (Loud)', 'Tidak ragu-ragu mengatakan benar dan dapat memegang kendali. (Lord Over)', 'Memerlukan banyak waktu pribadi dan cenderung meng-hindari orang lain. (Loner)', 'Menilai pekerjaan dan kegiatan dengan ukuran berapa banyak tenaga yang dibutuhkan. (Lazy)'),
(38, 'Tidak punya kekuatan untuk berkonsentrasi atau menaruh per-hatian pada sesuatu. (Scatterbrained)', 'Punya kemarahan yang menuntut berdasarkan ketidak-sabaran. Kemarahan yang dinyatakan saat orang lain tak bergerak cukup cepat atau tidak menyelesaikan apa yang diperintahkan. (Short-Tempered)', 'Cenderung mencurigai atau tidak mempercayai gagasan orang lain. (Suspicious)', 'Lambat untuk me-mulai, perlu dorongan yang kuat untuk termotivasi. (Sluggish)'),
(39, 'Menyukai kegiatan baru terus-menerus karena tidak merasa senang melakukan hal yang sama sepanjang waktu. (Restless)', 'Bisa bertindak tergesa-gesa tanpa memikirkan dengan tuntas terlebih dahulu, biasanya karena ketidaksabaran. (Rash)', 'Secara sadar maupun tidak mendendam, menghukum orang yang melanggar, diam-diam menahan persahabatan /kasih sayang. (Revengeful)', 'Tidak bersedia untuk ikut terlibat dalam suatu hal. (Reluctant)'),
(40, 'Rentang perhatian kekanak-kanakan dan pendek, butuh banyak perubahan dan variasi supaya tak merasa bosan. (Changeable)', 'Cerdik, orang yang selalu bisa menemu-kan cara untuk mencapai tujuan yang diinginkan. (Crafty)', 'Selalu mengevaluasi dan membuat penilaian, sering memikirkan dan menyatakan reaksi negatif. (Critical)', 'Sering mengendur kan pendiriannya, bahkan ketika merasa benar untuk menghindari terjadinya konflik. (Comrimissing)');

-- --------------------------------------------------------

--
-- Table structure for table `data_uji`
--

CREATE TABLE `data_uji` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `jawaban_a` int(11) DEFAULT NULL,
  `jawaban_b` int(11) DEFAULT NULL,
  `jawaban_c` int(11) DEFAULT NULL,
  `jawaban_d` int(11) DEFAULT NULL,
  `kelas_asli` varchar(100) DEFAULT NULL,
  `kelas_hasil` varchar(100) DEFAULT NULL,
  `nilai_sanguin` double DEFAULT NULL,
  `nilai_koleris` double DEFAULT NULL,
  `nilai_melankolis` double DEFAULT NULL,
  `nilai_plegmatis` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_uji`
--

INSERT INTO `data_uji` (`id`, `nama`, `jenis_kelamin`, `usia`, `jurusan`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `kelas_asli`, `kelas_hasil`, `nilai_sanguin`, `nilai_koleris`, `nilai_melankolis`, `nilai_plegmatis`) VALUES
(1, 'Ulin Nuha', 'L', 13, 'IPS', 12, 13, 11, 4, 'Sanguin', 'Sanguin', 0.0000094265469235812, 0.000004616633905375, 0.00000066656744245542, 0.0000027139049624764),
(2, 'Nizam azka', 'L', 15, 'IPA', 17, 7, 11, 5, 'Plegmatis', 'Plegmatis', 0.0000000036713040672525, 0.00000014639757282232, 0.0000000049240074606449, 0.00000026361059739963),
(3, 'Allya Puspalina', 'P', 14, 'IPA', 10, 14, 11, 5, 'Koleris', 'Koleris', 0.0000042771632669667, 0.0000063109737486845, 0.0000019847544588453, 0.0000050443177290693),
(4, 'Trisya Dwie', 'P', 14, 'IPS', 10, 11, 11, 8, 'Plegmatis', 'Plegmatis', 0.0000075808840254581, 0.0000040807894495523, 0.0000015123643458693, 0.000010095117120544),
(5, 'Archelik efendi saputra', 'L', 12, 'IPS', 15, 9, 11, 5, 'Plegmatis', 'Plegmatis', 0.000000011150525924654, 0.000000056370701111848, 0.000000010143632040462, 0.00000009340816265059),
(6, 'Wildan abdul', 'L', 13, 'IPA', 9, 12, 11, 8, 'Sanguin', 'Sanguin', 0.0000086628928745255, 0.0000069028905091941, 0.0000014933022429292, 0.0000043374228179972),
(7, 'Fandi', 'L', 14, 'IPS', 10, 8, 6, 16, 'Plegmatis', 'Plegmatis', 0.0000059750733808713, 0.0000030486583874983, 0.000000000052982841945599, 0.00001374146727954),
(8, 'Firmansyah', 'L', 13, 'IPA', 10, 12, 12, 6, 'Sanguin', 'Sanguin', 0.0000075771436055899, 0.0000054369725595072, 0.000003525621261236, 0.0000033378059691307),
(9, 'Mutiara Nafiah Dias Putri', 'P', 14, 'IPA', 12, 14, 5, 9, 'Sanguin', 'Sanguin', 0.0000058127840504146, 0.0000058119876901886, 0.000000000010120269828251, 0.0000054483538234503),
(10, 'Rini Astria', 'P', 15, 'IPS', 7, 9, 14, 10, 'Plegmatis', 'Plegmatis', 0.0000000013016197834459, 0.000000077223208171548, 0.00000013680076959475, 0.0000012458491829031),
(11, 'Arif', 'L', 15, 'IPS', 9, 13, 14, 4, 'Sanguin', 'Plegmatis', 0.0000000012589577178335, 0.00000022043487656624, 0.000000057445426819205, 0.00000056704464019751),
(12, 'Nadia Maharani', 'P', 13, 'IPS', 8, 7, 18, 7, 'Melankolis', 'Plegmatis', 0.0000010709804248266, 0.000000074732944730638, 0.0000019659998282723, 0.0000028426796137884),
(13, 'Caskia Putri', 'P', 14, 'IPA', 5, 11, 20, 4, 'Plegmatis', 'Plegmatis', 0.000000117531351771, 0.000000072758465540162, 0.00000010390564440429, 0.0000014576709629843),
(14, 'Edi pranowo', 'L', 13, 'IPA', 15, 10, 8, 7, 'Sanguin', 'Sanguin', 0.000016309325187849, 0.000004962510847391, 0.0000000073345479987198, 0.0000023365991458368),
(15, 'Siti Nurazizah', 'P', 13, 'IPS', 14, 7, 10, 9, 'Sanguin', 'Sanguin', 0.000015390344002614, 0.0000010709426027493, 0.00000035948156203166, 0.0000046281006826037),
(16, 'Fitya maharani', 'P', 15, 'IPS', 5, 14, 11, 10, 'Plegmatis', 'Plegmatis', 0.0000000012396509024234, 0.00000026154754620547, 0.000000015591822219594, 0.00000097272574289113),
(17, 'Bagas', 'L', 13, 'IPS', 11, 10, 14, 5, 'Sanguin', 'Sanguin', 0.0000064039237346826, 0.0000016510058462214, 0.0000053729765585018, 0.0000032448190167695),
(18, 'Fikri maulana', 'L', 13, 'IPA', 10, 8, 16, 6, 'Melankolis', 'Melankolis', 0.000002931795675372, 0.00000067571092054134, 0.0000069598989783002, 0.0000026378798645841),
(19, 'Alfani Audita Moviana', 'P', 15, 'IPS', 9, 16, 12, 3, 'Plegmatis', 'Plegmatis', 0.0000000010212974870932, 0.00000020583190872612, 0.000000037027514711575, 0.00000047118243433864),
(20, 'Ilham syaputra', 'L', 14, 'IPA', 9, 10, 4, 17, 'Plegmatis', 'Plegmatis', 0.0000028479329523499, 0.0000036753858611176, 0.00000000000021135738640147, 0.0000092973649259657),
(21, 'Alia Fira', 'P', 15, 'IPA', 12, 10, 11, 7, 'Plegmatis', 'Plegmatis', 0.0000000032785933123614, 0.00000027008366154201, 0.000000028156018405267, 0.00000083309718329385),
(22, 'Ahmad ardi', 'L', 14, 'IPS', 19, 7, 8, 6, 'Plegmatis', 'Sanguin', 0.000011967433475209, 0.0000016953556007425, 0.0000000011759744617187, 0.0000016353017186977),
(23, 'balqis Shafira', 'P', 13, 'IPA', 6, 8, 19, 7, 'Plegmatis', 'Plegmatis', 0.00000042740687617274, 0.000000063080780690443, 0.00000079787805538969, 0.000001733466310188),
(24, 'Triara Mutia', 'P', 13, 'IPA', 9, 12, 13, 6, 'Melankolis', 'Melankolis', 0.0000047379761001741, 0.0000023312880992043, 0.000013504136409993, 0.0000034253367797894),
(25, 'Besya anisa', 'P', 14, 'IPA', 16, 12, 7, 5, 'Sanguin', 'Sanguin', 0.0000078831863012874, 0.0000045558001335196, 0.00000000094356622901719, 0.0000024828055562183),
(26, 'Farid wahyudi', 'L', 13, 'IPA', 13, 13, 7, 7, 'Sanguin', 'Sanguin', 0.000012539212422414, 0.0000078354998564013, 0.0000000011126283615202, 0.0000026923111327083),
(27, 'Anissa Fitriyah', 'P', 15, 'IPS', 12, 12, 10, 6, 'Plegmatis', 'Plegmatis', 0.0000000036771537866099, 0.00000029430049114637, 0.0000000048154616003291, 0.0000008512791097946),
(28, 'Nida Amelia', 'P', 14, 'IPS', 8, 9, 13, 10, 'Plegmatis', 'Plegmatis', 0.0000044669608542169, 0.0000017847356477084, 0.0000075224891295912, 0.000011548333764691),
(29, 'Dandi ivanka', 'L', 15, 'IPS', 7, 11, 13, 9, 'Plegmatis', 'Plegmatis', 0.00000000186479439567, 0.00000027258619397033, 0.000000048993105404658, 0.0000011021446186838),
(30, 'Sahrin Meizia', 'P', 15, 'IPA', 15, 6, 12, 7, 'Plegmatis', 'Plegmatis', 0.0000000029880045697774, 0.000000067109618343167, 0.000000043718219104708, 0.00000052783967567266);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_kuisioner`
--

CREATE TABLE `jawaban_kuisioner` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `id_siswa` int(11) NOT NULL DEFAULT 0,
  `id_soal` int(11) NOT NULL DEFAULT 0,
  `jawaban` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_kuisioner`
--

INSERT INTO `jawaban_kuisioner` (`id`, `id_user`, `id_siswa`, `id_soal`, `jawaban`) VALUES
(2053, 79, 57, 5, 'A'),
(2054, 79, 57, 6, 'A'),
(2055, 79, 57, 7, 'A'),
(2056, 79, 57, 8, 'A'),
(2057, 79, 57, 9, 'A'),
(2058, 79, 57, 10, 'B'),
(2059, 79, 57, 11, 'A'),
(2060, 79, 57, 12, 'A'),
(2061, 79, 57, 13, 'A'),
(2062, 79, 57, 14, 'A'),
(2063, 79, 57, 15, 'B'),
(2064, 79, 57, 16, 'D'),
(2065, 79, 57, 17, 'B'),
(2066, 79, 57, 18, 'A'),
(2067, 79, 57, 19, 'B'),
(2068, 79, 57, 20, 'B'),
(2069, 79, 57, 21, 'A'),
(2070, 79, 57, 22, 'B'),
(2071, 79, 57, 23, 'C'),
(2072, 79, 57, 24, 'A'),
(2073, 79, 57, 25, 'D'),
(2074, 79, 57, 26, 'C'),
(2075, 79, 57, 27, 'B'),
(2076, 79, 57, 28, 'B'),
(2077, 79, 57, 29, 'C'),
(2078, 79, 57, 30, 'C'),
(2079, 79, 57, 31, 'C'),
(2080, 79, 57, 32, 'B'),
(2081, 79, 57, 33, 'C'),
(2082, 79, 57, 34, 'C'),
(2083, 79, 57, 35, 'D'),
(2084, 79, 57, 36, 'B'),
(2085, 79, 57, 37, 'A'),
(2086, 79, 57, 38, 'C'),
(2087, 79, 57, 39, 'B'),
(2088, 79, 57, 40, 'B'),
(2245, 81, 59, 1, 'B'),
(2246, 81, 59, 2, 'A'),
(2247, 81, 59, 3, 'A'),
(2248, 81, 59, 4, 'B'),
(2249, 81, 59, 5, 'A'),
(2250, 81, 59, 6, 'C'),
(2251, 81, 59, 7, 'B'),
(2252, 81, 59, 8, 'C'),
(2253, 81, 59, 9, 'B'),
(2254, 81, 59, 10, 'D'),
(2255, 81, 59, 11, 'A'),
(2256, 81, 59, 12, 'B'),
(2257, 81, 59, 13, 'C'),
(2258, 81, 59, 14, 'B'),
(2259, 81, 59, 15, 'C'),
(2260, 81, 59, 16, 'B'),
(2261, 81, 59, 17, 'D'),
(2262, 81, 59, 18, 'D'),
(2263, 81, 59, 19, 'A'),
(2264, 81, 59, 20, 'A'),
(2265, 81, 59, 21, 'D'),
(2266, 81, 59, 22, 'C'),
(2267, 81, 59, 23, 'B'),
(2268, 81, 59, 24, 'D'),
(2269, 81, 59, 25, 'D'),
(2270, 81, 59, 26, 'B'),
(2271, 81, 59, 27, 'A'),
(2272, 81, 59, 28, 'D'),
(2273, 81, 59, 29, 'B'),
(2274, 81, 59, 30, 'A'),
(2275, 81, 59, 31, 'A'),
(2276, 81, 59, 32, 'C'),
(2277, 81, 59, 33, 'A'),
(2278, 81, 59, 34, 'D'),
(2279, 81, 59, 35, 'B'),
(2280, 81, 59, 36, 'A'),
(2281, 81, 59, 37, 'C'),
(2282, 81, 59, 38, 'D'),
(2283, 81, 59, 39, 'C'),
(2284, 81, 59, 40, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `level` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(81, 'febri', 'febri', '4689c75fd0935ff5818d62fd2083ed98', '2'),
(80, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', '2'),
(78, 'febri', 'febri', '4689c75fd0935ff5818d62fd2083ed98', '2'),
(77, 'testing', 'uehcnj', '26a9bb74839307f7f516249ed4c715e2', '2'),
(76, 'wqe', 'sqsqe', '4da3b5dcf454825c3a2b59e4fc7744b0', '2'),
(75, 'tes12134', 'tes13y86', 'ae709c79aeeaaa9e7fc6af7f76ef0c13', '2'),
(74, 'tes', '8y89h', '7e7757192c733ae0a6341bd860af2474', '2'),
(73, 'TESTESTES', 'TES1737', '45bd01e784038870d346cbf736673818', '2'),
(79, 'saya', 'i', '865c0c0b4ab0e063e5caa3387c1a8741', '2'),
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_hasil_klasifikasi`
--
ALTER TABLE `data_hasil_klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_latih`
--
ALTER TABLE `data_latih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_soal`
--
ALTER TABLE `data_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_uji`
--
ALTER TABLE `data_uji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_kuisioner`
--
ALTER TABLE `jawaban_kuisioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_hasil_klasifikasi`
--
ALTER TABLE `data_hasil_klasifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `data_latih`
--
ALTER TABLE `data_latih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `data_soal`
--
ALTER TABLE `data_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `data_uji`
--
ALTER TABLE `data_uji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jawaban_kuisioner`
--
ALTER TABLE `jawaban_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2285;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
