-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 12:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 1, 'L', 15, 'IPS', 5, 16, 11, 8, 'Koleris', 0.000000024963117963092, 0.001938411237094, 0.0000098277325228176, 0.000000011191472403955),
(2, 2, 'L', 14, 'IPS', 13, 5, 9, 13, 'Plegmatis', 0.000010308760137311, 0.0000016423451856772, 0.00000003174376601882, 0.000010840414090197),
(3, 3, 'L', 24, 'IPA', 14, 10, 13, 3, 'Plegmatis', 2.5992087290489e-185, 1.0279178043673e-81, 4.9002053226894e-104, 1.8866271690136e-67);

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
(2, 'Siswa 1', 'L', 14, 'IPS', 25),
(3, 'Siswa 2', 'L', 24, 'IPA', 26);

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
(1, 'Asher Fawwazadzka', 'L', 13, 'IPS', 19, 4, 5, 12, 'Sanguin', 'Sanguin', 0.000010701146159617, 0.00000026758348425186, 0.00000000000080674934391967, 0.000001180640442296),
(2, 'Wafda Mukrom Q.F', 'L', 13, 'IPS', 15, 9, 9, 7, 'Sanguin', 'Sanguin', 0.00001922526950683, 0.0000030447468959592, 0.000000030442461689662, 0.0000029722434549832),
(3, 'Zulham \'Ali Fikri', 'L', 14, 'IPS', 5, 6, 12, 17, 'Plegmatis', 'Plegmatis', 0.0000018078627063871, 0.0000010026343231877, 0.0000011146706912035, 0.000011806874441438),
(4, 'Qosholis S Al-Usama', 'L', 15, 'IPS', 13, 8, 9, 10, 'Sanguin', 'Plegmatis', 0.0000000059697944445991, 0.00000028178226389613, 0.00000000049481912575744, 0.0000011547350390264),
(5, 'Muhammad Shodiq', 'L', 15, 'IPS', 20, 9, 5, 6, 'Sanguin', 'Plegmatis', 0.0000000039260453927411, 0.00000010210678849032, 0.0000000000000065021989507543, 0.00000011614801997308),
(6, 'Hilmy Aziz M', 'L', 14, 'IPS', 10, 12, 13, 5, 'Melankolis', 'Plegmatis', 0.0000049965339604482, 0.0000048038256222689, 0.0000032054463364851, 0.0000059424260481768),
(7, 'Rafif', 'L', 14, 'IPS', 13, 7, 12, 8, 'Sanguin', 'Sanguin', 0.000009839093175151, 0.000002362137214443, 0.0000014817693882436, 0.0000076172756770441),
(8, 'Muhammad F Attaqi', 'L', 14, 'IPS', 8, 11, 17, 4, 'Melankolis', 'Plegmatis', 0.0000010886858862107, 0.00000076342628156366, 0.0000017169779149124, 0.000003576099632765),
(9, 'M. Najib Erdyansya', 'L', 13, 'IPS', 10, 13, 6, 11, 'Koleris', 'Sanguin', 0.0000110166724922, 0.0000057183587909083, 0.000000000078635948862849, 0.0000054756649907732),
(10, 'Moh. Inas Ramadhan', 'L', 13, 'IPS', 16, 12, 7, 5, 'Sanguin', 'Sanguin', 0.00001475830207774, 0.0000038675826655193, 0.00000000037603795041573, 0.0000016174242933853),
(11, 'Akmal Thoriq M', 'L', 15, 'IPS', 9, 14, 10, 7, 'Koleris', 'Plegmatis', 0.0000000029075570574043, 0.0000006461580067705, 0.0000000027823635368116, 0.00000091017847357515),
(12, 'Abdullah Yusuf F R', 'L', 13, 'IPS', 8, 6, 11, 15, 'Plegmatis', 'Plegmatis', 0.0000063665568021979, 0.0000011077515186443, 0.00000080659901416742, 0.0000086237869605727),
(13, 'Akhdan Muhammad F', 'L', 13, 'IPS', 12, 11, 9, 8, 'Sanguin', 'Sanguin', 0.000016826184352682, 0.0000053944647693002, 0.000000049307393252034, 0.0000048046383677592),
(14, 'Faris Saifullah', 'L', 14, 'IPS', 15, 8, 10, 7, 'Sanguin', 'Sanguin', 0.000013331986212613, 0.0000035882373872891, 0.00000011538582877693, 0.0000052692870183736),
(15, 'M Riza A.K', 'L', 13, 'IPS', 16, 6, 7, 11, 'Sanguin', 'Sanguin', 0.000017751761654675, 0.0000011659537102158, 0.00000000042027583363337, 0.0000031295992862631),
(16, 'M. Lazuardy F', 'L', 13, 'IPS', 12, 8, 10, 10, 'Sanguin', 'Sanguin', 0.000016721863759335, 0.0000028103295884321, 0.00000024075670811959, 0.000006095475600223),
(17, 'M Zidan Al Baihaqi', 'L', 14, 'IPS', 9, 4, 5, 22, 'Plegmatis', 'Plegmatis', 0.00000099643967273908, 0.00000030643511256929, 0.0000000000015834918521758, 0.000010744102189919),
(18, 'Abdul Allam', 'L', 15, 'IPS', 10, 3, 12, 15, 'Plegmatis', 'Plegmatis', 0.0000000017061157124309, 0.000000029630137688131, 0.000000020659987246614, 0.0000015801412282497),
(19, 'Sauqi Hilmi M', 'L', 14, 'IPS', 11, 2, 6, 21, 'Plegmatis', 'Plegmatis', 0.0000014417626850227, 0.00000018036884633562, 0.000000000025538385030545, 0.000010217347578558),
(20, 'Ahzami Asy-Syhadi', 'L', 13, 'IPS', 9, 9, 10, 12, 'Plegmatis', 'Sanguin', 0.000011665926819663, 0.0000034781382233706, 0.00000027597219790707, 0.0000079573197137586),
(21, 'Nashrul Fatih Y', 'L', 13, 'IPS', 13, 6, 9, 12, 'Sanguin', 'Sanguin', 0.000016079035936523, 0.0000015267350015262, 0.000000042104375737686, 0.0000060607775827654),
(22, 'Qomaruddin Zaki', 'L', 14, 'IPS', 8, 12, 10, 10, 'Koleris', 'Plegmatis', 0.0000073892910176391, 0.0000091415828891287, 0.00000021744930692386, 0.000010903575480947),
(23, 'Ichsanul A Sholeh', 'L', 13, 'IPS', 15, 2, 8, 15, 'Sanguin', 'Sanguin', 0.0000087279387073154, 0.00000022276275390334, 0.0000000034810261839773, 0.0000040438647403664),
(24, 'Syahaq', 'L', 13, 'IPS', 10, 9, 9, 12, 'Plegmatis', 'Sanguin', 0.000013839217666891, 0.0000037455227488892, 0.000000056741190448707, 0.000007784079501811),
(25, 'Betelgeuse W F K', 'L', 14, 'IPS', 12, 14, 9, 5, 'Koleris', 'Koleris', 0.0000082571511814857, 0.0000099499440098579, 0.000000032876367394627, 0.0000050942889146396),
(26, 'Dian Izza Nadiya', 'P', 15, 'IPS', 10, 8, 15, 7, 'Melankolis', 'Plegmatis', 0.000000001376649162715, 0.000000044359599388955, 0.00000013763405054075, 0.00000091309310046461),
(27, 'Ivana Thynaba Nareza', 'P', 14, 'IPS', 5, 4, 11, 20, 'Plegmatis', 'Plegmatis', 0.00000081346004684282, 0.00000022217788577443, 0.00000060747470235832, 0.000011840188490244),
(28, 'Cia', 'P', 14, 'IPS', 24, 10, 2, 4, 'Sanguin', 'Sanguin', 0.0000021176781382055, 0.00000016679337861674, 4.8375915466094e-18, 0.00000010007515234883),
(29, 'Rahmadita Nurdian K', 'P', 14, 'IPS', 16, 11, 6, 7, 'Sanguin', 'Sanguin', 0.000010462364246729, 0.0000029218346923298, 0.000000000054862270805174, 0.0000037152598573891),
(30, 'Shofiyyah R Aisy', 'P', 13, 'IPS', 5, 2, 17, 16, 'Melankolis', 'Plegmatis', 0.00000039713747652255, 0.000000011986378009964, 0.0000027319984846862, 0.0000037060890169404),
(31, 'Sabrina Salsa Oktavia', 'P', 14, 'IPS', 14, 11, 6, 9, 'Sanguin', 'Sanguin', 0.000010742936217738, 0.0000036208318426739, 0.000000000086395211449888, 0.0000066041040869237),
(32, 'Anis', 'P', 14, 'IPS', 8, 2, 8, 22, 'Plegmatis', 'Plegmatis', 0.00000073994945853091, 0.000000098658478981368, 0.0000000050903386645332, 0.00001229903070825),
(33, 'Khansa F Nirwasita', 'P', 13, 'IPS', 21, 8, 5, 6, 'Sanguin', 'Sanguin', 0.0000095766520743525, 0.00000037684063501195, 0.00000000000078730242551546, 0.00000040571847286743),
(34, 'Aisyah Regina P', 'P', 15, 'IPS', 8, 10, 9, 13, 'Plegmatis', 'Plegmatis', 0.0000000026790192321816, 0.00000022987680556144, 0.0000000012206797168078, 0.000001824092532116),
(35, 'Syafina M Firdaus', 'P', 13, 'IPS', 12, 11, 10, 7, 'Sanguin', 'Sanguin', 0.000012996434405408, 0.0000027445491453343, 0.00000045853809016373, 0.0000046617865429917),
(36, 'M Yasmin', 'P', 13, 'IPS', 6, 15, 8, 11, 'Koleris', 'Plegmatis', 0.0000048226271763258, 0.0000034870914560337, 0.000000013931387994037, 0.0000049682711181424),
(37, 'Umu Latifatul Jannah', 'P', 13, 'IPS', 14, 5, 6, 15, 'Plegmatis', 'Sanguin', 0.0000090055084413954, 0.00000039681557135583, 0.000000000088146798418452, 0.0000053489922454446),
(38, 'Amara Rida Z', 'P', 15, 'IPS', 7, 8, 12, 13, 'Plegmatis', 'Plegmatis', 0.00000000170709539156, 0.00000009751729856699, 0.000000049554265490755, 0.0000017144764083253),
(39, 'Shofiatur Rahmah', 'P', 15, 'IPS', 5, 20, 10, 5, 'Koleris', 'Plegmatis', 0.00000000041269018620529, 0.00000016247371216766, 0.0000000028320282989158, 0.00000031000789961485),
(40, 'Urfi Zukhrufa', 'P', 13, 'IPS', 12, 1, 12, 15, 'Plegmatis', 'Plegmatis', 0.0000040947963803677, 0.000000062266617179965, 0.0000029311562200404, 0.0000060660715095084),
(41, 'Namira Aaiilah S', 'P', 13, 'IPS', 8, 4, 15, 13, 'Melankolis', 'Melankolis', 0.0000024146502776334, 0.0000001099294608651, 0.000011219896523368, 0.0000061927199693777),
(42, 'Putri Annisa Aura D', 'P', 14, 'IPS', 9, 4, 9, 18, 'Plegmatis', 'Plegmatis', 0.0000027978273934129, 0.00000043655795044919, 0.000000058614365590384, 0.000015889867263149),
(43, 'Aisyah Lailai Habibah Firdausi', 'P', 14, 'IPS', 17, 4, 7, 12, 'Sanguin', 'Sanguin', 0.0000089317089941497, 0.00000042768140219924, 0.00000000047913920729941, 0.0000045635519818367),
(44, 'Deffanie Aulia R', 'P', 15, 'IPS', 10, 10, 14, 6, 'Melankolis', 'Plegmatis', 0.0000000017088676291004, 0.000000095694792521569, 0.00000013178467649301, 0.00000087349683910551),
(45, 'Khanita Najla Nazhifa', 'P', 13, 'IPS', 9, 11, 7, 13, 'Plegmatis', 'Sanguin', 0.0000090935434325223, 0.000002669191697758, 0.0000000019181158974755, 0.000007830443661771),
(46, 'Rosy Fatati qonita', 'P', 15, 'IPS', 9, 4, 10, 17, 'Plegmatis', 'Plegmatis', 0.0000000013680725706612, 0.000000028307037849105, 0.0000000042386145581905, 0.0000019498914509905),
(47, 'Bilqis Belvana Enesia', 'P', 15, 'IPS', 7, 11, 10, 12, 'Plegmatis', 'Plegmatis', 0.0000000022657085551236, 0.00000025267528478688, 0.0000000056713083642388, 0.0000016106965081856),
(48, 'Rr. Mahira Muntaz', 'P', 13, 'IPS', 14, 6, 11, 9, 'Sanguin', 'Sanguin', 0.000013238394217906, 0.00000069275084226634, 0.0000012335771486559, 0.000004493616080156),
(49, 'Nabila Salsabila', 'P', 13, 'IPS', 7, 6, 15, 12, 'Melankolis', 'Melankolis', 0.0000026206810498357, 0.0000002278227974291, 0.000011690050527197, 0.0000059959487471548),
(50, 'Syahidatul Izzah A', 'P', 13, 'IPS', 17, 11, 6, 6, 'Sanguin', 'Sanguin', 0.000013140707809995, 0.0000015737704004295, 0.000000000051139251587375, 0.0000014971643204914),
(51, 'M. Syarifuddin N. R', 'L', 13, 'IPA', 9, 9, 10, 12, 'Plegmatis', 'Sanguin', 0.0000099160377967138, 0.0000046375176311608, 0.0000004336705967111, 0.0000065530868230953),
(52, 'S. Agung Setiawan', 'L', 13, 'IPA', 8, 6, 11, 15, 'Plegmatis', 'Plegmatis', 0.0000054115732818682, 0.0000014770020248591, 0.0000012675127365488, 0.0000071019422028246),
(53, 'Bagas Septian P', 'L', 13, 'IPA', 10, 10, 14, 6, 'Melankolis', 'Melankolis', 0.0000053782451953589, 0.000002335574252971, 0.0000093499253533509, 0.000003163759600941),
(54, 'M. Ramadhan', 'L', 13, 'IPA', 12, 4, 13, 11, 'Melankolis', 'Sanguin', 0.0000070149149613996, 0.00000056450340703594, 0.0000057757084065946, 0.0000044630529213754),
(55, 'Dwi Agus Wijayanto', 'L', 13, 'IPA', 9, 5, 10, 16, 'Plegmatis', 'Plegmatis', 0.0000055452500985613, 0.0000011189867247027, 0.00000033569662514411, 0.0000072690656493646),
(56, 'Septian Priana A', 'L', 13, 'IPA', 10, 13, 5, 12, 'Koleris', 'Sanguin', 0.0000078549969079303, 0.0000061630175086845, 0.0000000000073269345656271, 0.0000043917031626822),
(57, 'M. Rifan N', 'L', 14, 'IPA', 9, 5, 6, 20, 'Plegmatis', 'Plegmatis', 0.0000017813641558105, 0.00000098958611171923, 0.000000000054984128029254, 0.000010766637270098),
(58, 'Akbar Bagus P', 'L', 13, 'IPA', 10, 15, 6, 9, 'Koleris', 'Koleris', 0.0000078399206452247, 0.0000082773399840746, 0.00000000011626852447467, 0.0000033469261849348),
(59, 'Miftachul Arista M.', 'L', 13, 'IPA', 10, 10, 13, 7, 'Melankolis', 'Sanguin', 0.0000072583207687907, 0.000003308087631319, 0.0000070474257833891, 0.0000038092687249457),
(60, 'Miracle Nathanael P', 'L', 14, 'IPA', 7, 6, 8, 19, 'Plegmatis', 'Plegmatis', 0.0000020303415157207, 0.0000017873285942217, 0.0000000063673079712762, 0.000011856039317228),
(61, 'Andika Aji P', 'L', 13, 'IPA', 10, 11, 9, 10, 'Koleris', 'Sanguin', 0.000012147240158074, 0.0000074995905943736, 0.00000009075191974621, 0.0000053368868961749),
(62, 'M Naufal Adib H', 'L', 13, 'IPA', 6, 11, 14, 9, 'Melankolis', 'Melankolis', 0.0000033216354096674, 0.0000025395607194443, 0.0000088084805094849, 0.0000036472617102114),
(63, 'Kevin Alifiano Bassam', 'L', 13, 'IPA', 13, 9, 8, 10, 'Sanguin', 'Sanguin', 0.000016270560232353, 0.0000048473124679381, 0.000000010840296453163, 0.0000043093782286914),
(64, 'M Ilham Nur Rahmi', 'L', 13, 'IPA', 15, 5, 9, 11, 'Sanguin', 'Sanguin', 0.000014326196294541, 0.0000012842510997423, 0.00000004655042679304, 0.0000033209007565478),
(65, 'Ach.Fahrudin N', 'L', 13, 'IPA', 15, 9, 10, 6, 'Sanguin', 'Sanguin', 0.000014519383768124, 0.0000036677865724067, 0.00000021990731676113, 0.0000022042125064163),
(66, 'Nifa Lazwardy S', 'L', 13, 'IPA', 15, 12, 5, 8, 'Sanguin', 'Sanguin', 0.00001223127516281, 0.0000047041371624511, 0.0000000000041268335720755, 0.0000019609497075154),
(67, 'Rido Dimas Permadi', 'L', 14, 'IPA', 12, 14, 10, 4, 'Koleris', 'Koleris', 0.000005961840143632, 0.000011665716861637, 0.00000023211730028862, 0.0000037025990129865),
(68, 'M. Daffa Amrullah', 'L', 14, 'IPA', 5, 14, 10, 11, 'Koleris', 'Koleris', 0.0000031050176868134, 0.000011320118126968, 0.00000025040348281673, 0.000006701060936196),
(69, 'Moch.Rico Zaenoni', 'L', 14, 'IPA', 15, 12, 6, 7, 'Sanguin', 'Sanguin', 0.0000098530641844799, 0.0000087666043854514, 0.000000000053082826344182, 0.0000033796242915177),
(70, 'Amsal A Setyono', 'L', 14, 'IPA', 14, 5, 8, 13, 'Sanguin', 'Sanguin', 0.0000092396884957148, 0.0000020614571994602, 0.0000000065576620235769, 0.0000075304015476322),
(71, 'Khoirul Anam', 'L', 15, 'IPA', 6, 12, 6, 16, 'Plegmatis', 'Plegmatis', 0.0000000011287520250874, 0.0000004444876194891, 0.00000000000099418743578609, 0.0000010940305079481),
(72, 'Muhammad Adam F', 'L', 13, 'IPA', 14, 8, 8, 10, 'Sanguin', 'Sanguin', 0.000016840013972478, 0.0000035968114053481, 0.0000000092302961923655, 0.0000037631051588072),
(73, 'Yudistira Dimas S', 'L', 13, 'IPA', 10, 10, 8, 12, 'Plegmatis', 'Sanguin', 0.000011740189191863, 0.0000061046773034501, 0.000000013670740201403, 0.0000061193754113792),
(74, 'Muhammad S', 'L', 14, 'IPA', 12, 9, 5, 14, 'Plegmatis', 'Plegmatis', 0.0000069629905354987, 0.0000048361619892887, 0.0000000000049573986935138, 0.0000086070675799767),
(75, 'M. Abdullah Ilham A', 'L', 14, 'IPA', 13, 6, 9, 12, 'Sanguin', 'Sanguin', 0.000010104305651951, 0.0000032371380848463, 0.000000052824810628834, 0.0000087220459400131),
(76, 'Yati Nur Azizah', 'P', 13, 'IPA', 13, 7, 8, 12, 'Sanguin', 'Sanguin', 0.000012333453032526, 0.0000015455045991666, 0.000000020716594296557, 0.00000526597709975),
(77, 'Berlian Sabilillah R', 'P', 13, 'IPA', 14, 7, 10, 9, 'Sanguin', 'Sanguin', 0.000013081792402222, 0.0000014279234703324, 0.00000056489959747832, 0.0000038113770327324),
(78, 'Safira Putri Frandika', 'P', 14, 'IPA', 11, 14, 7, 8, 'Koleris', 'Koleris', 0.0000064876835307553, 0.0000079995555246438, 0.0000000021810793456245, 0.0000062851784338037),
(79, 'Fasta Itfina', 'P', 14, 'IPA', 12, 7, 13, 8, 'Melankolis', 'Melankolis', 0.0000055213689303842, 0.0000014262568252212, 0.0000098808174052392, 0.0000070858986957546),
(80, 'Putri Sofiyana N', 'P', 14, 'IPA', 5, 12, 15, 8, 'Melankolis', 'Melankolis', 0.0000012148952674246, 0.0000015946434190018, 0.000012248036045677, 0.0000048311220342306),
(81, 'Arni Nur Unaifah', 'P', 13, 'IPA', 14, 18, 5, 3, 'Koleris', 'Sanguin', 0.0000031214727881118, 0.0000021180208995299, 0.0000000000061464702725578, 0.00000081671405526577),
(82, 'Kharisma Yogi C', 'P', 13, 'IPA', 7, 15, 10, 8, 'Koleris', 'Koleris', 0.0000046134874774428, 0.0000046852068984975, 0.00000073255344660517, 0.0000035942446007353),
(83, 'Nandy Lava B. Utomo', 'P', 13, 'IPA', 12, 2, 16, 10, 'Melankolis', 'Melankolis', 0.0000020578864339179, 0.000000043289905458386, 0.00001098525005948, 0.0000029776788901332),
(84, 'Emilia Nur Rohmah', 'P', 13, 'IPA', 10, 4, 14, 12, 'Melankolis', 'Melankolis', 0.0000037524838029647, 0.00000023086664612234, 0.000017949899444533, 0.000005332990436177),
(85, 'Racgmalia Nur Fitri', 'P', 14, 'IPA', 9, 6, 7, 18, 'Plegmatis', 'Plegmatis', 0.0000027248499989553, 0.0000011426572094844, 0.0000000016895744242604, 0.000012999450141702),
(86, 'Zillanatus V Aaliyah', 'P', 13, 'IPA', 4, 11, 11, 14, 'Plegmatis', 'Plegmatis', 0.0000026405419729695, 0.0000021300142374711, 0.0000018372719525324, 0.0000048012749989867),
(87, 'Rahma Nilam Cahya', 'P', 13, 'IPA', 8, 9, 14, 9, 'Melankolis', 'Melankolis', 0.0000040709564380977, 0.0000011003062498208, 0.00002032928545092, 0.0000046587387583346),
(88, 'Denok Handayani', 'P', 13, 'IPA', 6, 8, 16, 10, 'Melankolis', 'Melankolis', 0.0000015827355439976, 0.00000034630055885526, 0.000013269600449253, 0.0000036305815849455),
(89, 'Tiara Fauzul Islam', 'P', 13, 'IPA', 7, 12, 13, 8, 'Melankolis', 'Melankolis', 0.0000039495388275908, 0.000002300596166571, 0.000013490110257076, 0.0000039700454921427),
(90, 'Cici Farida A. P', 'P', 13, 'IPA', 4, 4, 17, 15, 'Plegmatis', 'Melankolis', 0.00000040309961924274, 0.000000037897419931632, 0.0000042964581442183, 0.000002901210090422),
(91, 'Adhelia Putri P', 'P', 13, 'IPA', 12, 5, 6, 17, 'Plegmatis', 'Plegmatis', 0.0000051023217420514, 0.00000049086666412094, 0.00000000015845721124358, 0.00000586465850933),
(92, 'Arinta Agustine', 'P', 14, 'IPA', 13, 11, 10, 6, 'Sanguin', 'Sanguin', 0.0000081533180161418, 0.0000053608447278539, 0.00000049079266166245, 0.0000053690675771348),
(93, 'Ameliatur Zahro', 'P', 14, 'IPA', 18, 9, 6, 7, 'Sanguin', 'Sanguin', 0.0000089276712958198, 0.0000021111611417511, 0.000000000050255455029723, 0.0000019324782421692),
(94, 'Elsandra Nur Maidah', 'P', 14, 'IPA', 17, 4, 11, 8, 'Sanguin', 'Sanguin', 0.0000070971922372141, 0.00000051951581969087, 0.00000073453892630893, 0.0000029629741042824),
(95, 'Citra Indiana Putri', 'P', 13, 'IPA', 9, 9, 8, 14, 'Plegmatis', 'Sanguin', 0.0000076175197501753, 0.0000024886111086363, 0.000000025926987962086, 0.0000074107788853101),
(96, 'Ayu Febri Wulandari', 'P', 13, 'IPA', 6, 5, 8, 21, 'Plegmatis', 'Plegmatis', 0.0000011345546722548, 0.00000030932750777016, 0.000000011312790124614, 0.0000061833945217143),
(97, 'Fischa Aditiyah W', 'P', 14, 'IPA', 13, 10, 7, 10, 'Sanguin', 'Sanguin', 0.0000097517040036254, 0.0000049218062239387, 0.0000000019451999923578, 0.0000075143763029895),
(98, 'Isma Marista Riyanti', 'P', 13, 'IPA', 13, 12, 8, 7, 'Sanguin', 'Sanguin', 0.00001188775506131, 0.0000042343416874946, 0.000000020219510360936, 0.0000031808071449625),
(99, 'Khodijah Febriyanti', 'P', 13, 'IPA', 12, 8, 11, 9, 'Sanguin', 'Sanguin', 0.000010973741975666, 0.0000018416468142738, 0.000002638461330818, 0.0000048701500023606),
(100, 'Citra Tsabitan A', 'P', 13, 'IPA', 18, 9, 8, 5, 'Sanguin', 'Sanguin', 0.000011695719411092, 0.000001455062282338, 0.0000000062164021206903, 0.00000098224716409943),
(101, 'Siswa 2', 'L', 24, 'IPA', 14, 10, 13, 3, 'Plegmatis', 'Plegmatis', 2.5992087290489e-185, 1.0279178043673e-81, 4.9002053226894e-104, 1.8866271690136e-67);

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
(1, 2, 1, 1, 'B'),
(2, 2, 1, 2, 'C'),
(3, 2, 1, 3, 'C'),
(4, 2, 1, 4, 'C'),
(5, 2, 1, 5, 'C'),
(6, 2, 1, 6, 'C'),
(7, 2, 1, 7, 'B'),
(8, 2, 1, 8, 'B'),
(9, 2, 1, 9, 'B'),
(10, 2, 1, 10, 'B'),
(11, 2, 1, 11, 'B'),
(12, 2, 1, 12, 'C'),
(13, 2, 1, 13, 'A'),
(14, 2, 1, 14, 'A'),
(15, 2, 1, 15, 'A'),
(16, 2, 1, 16, 'D'),
(17, 2, 1, 17, 'D'),
(18, 2, 1, 18, 'D'),
(19, 2, 1, 19, 'A'),
(20, 2, 1, 20, 'B'),
(21, 2, 1, 21, 'A'),
(22, 2, 1, 22, 'C'),
(23, 2, 1, 23, 'C'),
(24, 2, 1, 24, 'C'),
(25, 2, 1, 25, 'D'),
(26, 2, 1, 26, 'C'),
(27, 2, 1, 27, 'C'),
(28, 2, 1, 28, 'B'),
(29, 2, 1, 29, 'B'),
(30, 2, 1, 30, 'D'),
(31, 2, 1, 31, 'B'),
(32, 2, 1, 32, 'B'),
(33, 2, 1, 33, 'B'),
(34, 2, 1, 34, 'B'),
(35, 2, 1, 35, 'D'),
(36, 2, 1, 36, 'B'),
(37, 2, 1, 37, 'D'),
(38, 2, 1, 38, 'B'),
(39, 2, 1, 39, 'B'),
(40, 2, 1, 40, 'D'),
(41, 25, 2, 1, 'B'),
(42, 25, 2, 2, 'C'),
(43, 25, 2, 3, 'C'),
(44, 25, 2, 4, 'C'),
(45, 25, 2, 5, 'D'),
(46, 25, 2, 6, 'D'),
(47, 25, 2, 7, 'A'),
(48, 25, 2, 8, 'A'),
(49, 25, 2, 9, 'A'),
(50, 25, 2, 10, 'A'),
(51, 25, 2, 11, 'D'),
(52, 25, 2, 12, 'A'),
(53, 25, 2, 13, 'B'),
(54, 25, 2, 14, 'D'),
(55, 25, 2, 15, 'D'),
(56, 25, 2, 16, 'A'),
(57, 25, 2, 17, 'A'),
(58, 25, 2, 18, 'C'),
(59, 25, 2, 19, 'D'),
(60, 25, 2, 20, 'D'),
(61, 25, 2, 21, 'C'),
(62, 25, 2, 22, 'C'),
(63, 25, 2, 23, 'C'),
(64, 25, 2, 24, 'A'),
(65, 25, 2, 25, 'D'),
(66, 25, 2, 26, 'A'),
(67, 25, 2, 27, 'D'),
(68, 25, 2, 28, 'D'),
(69, 25, 2, 29, 'D'),
(70, 25, 2, 30, 'B'),
(71, 25, 2, 31, 'B'),
(72, 25, 2, 32, 'B'),
(73, 25, 2, 33, 'D'),
(74, 25, 2, 34, 'C'),
(75, 25, 2, 35, 'A'),
(76, 25, 2, 36, 'C'),
(77, 25, 2, 37, 'D'),
(78, 25, 2, 38, 'A'),
(79, 25, 2, 39, 'A'),
(80, 25, 2, 40, 'A'),
(81, 26, 3, 1, 'B'),
(82, 26, 3, 2, 'C'),
(83, 26, 3, 3, 'C'),
(84, 26, 3, 4, 'C'),
(85, 26, 3, 5, 'C'),
(86, 26, 3, 6, 'C'),
(87, 26, 3, 7, 'C'),
(88, 26, 3, 8, 'A'),
(89, 26, 3, 9, 'B'),
(90, 26, 3, 10, 'C'),
(91, 26, 3, 11, 'A'),
(92, 26, 3, 12, 'B'),
(93, 26, 3, 13, 'D'),
(94, 26, 3, 14, 'C'),
(95, 26, 3, 15, 'C'),
(96, 26, 3, 16, 'B'),
(97, 26, 3, 17, 'B'),
(98, 26, 3, 18, 'B'),
(99, 26, 3, 19, 'A'),
(100, 26, 3, 20, 'C'),
(101, 26, 3, 21, 'A'),
(102, 26, 3, 22, 'C'),
(103, 26, 3, 23, 'C'),
(104, 26, 3, 24, 'D'),
(105, 26, 3, 25, 'B'),
(106, 26, 3, 26, 'B'),
(107, 26, 3, 27, 'C'),
(108, 26, 3, 28, 'A'),
(109, 26, 3, 29, 'A'),
(110, 26, 3, 30, 'A'),
(111, 26, 3, 31, 'A'),
(112, 26, 3, 32, 'B'),
(113, 26, 3, 33, 'D'),
(114, 26, 3, 34, 'A'),
(115, 26, 3, 35, 'A'),
(116, 26, 3, 36, 'A'),
(117, 26, 3, 37, 'A'),
(118, 26, 3, 38, 'A'),
(119, 26, 3, 39, 'A'),
(120, 26, 3, 40, 'B');

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
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(25, 'Siswa 1', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2'),
(26, 'Siswa 2', 'siswa2', '331633a246a4e1ceefc9539a71fcd124', '2');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_latih`
--
ALTER TABLE `data_latih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_soal`
--
ALTER TABLE `data_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `data_uji`
--
ALTER TABLE `data_uji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `jawaban_kuisioner`
--
ALTER TABLE `jawaban_kuisioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
