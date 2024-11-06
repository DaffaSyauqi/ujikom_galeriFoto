-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2024 at 08:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_galeri`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `deskripsi`, `tanggal_dibuat`, `id_user`) VALUES
(7, 'Anime', 'Foto Anime', '2024-10-23', 3),
(9, 'Absurd', 'Gatau', '2024-10-23', 3),
(11, 'Pemandangan', 'Gambar pemandangan', '2024-10-24', 5),
(13, 'Teknologi', 'gambar hal teknologi', '2024-10-24', 7),
(14, 'Otomotif', 'gambar hal otomotif', '2024-10-24', 7),
(15, 'Bola', 'hal hal tentang bola', '2024-10-27', 8),
(27, 'Akatsuki', 'Organisasi akatsuki', '2024-11-06', 10);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `deskripsi_foto` text NOT NULL,
  `tanggal_unggah` date NOT NULL,
  `lokasi_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_album` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `judul_foto`, `deskripsi_foto`, `tanggal_unggah`, `lokasi_file`, `id_album`, `id_user`) VALUES
(5, 'Jujutsu kaisen', 'Gojo vs Sukuna', '2024-10-24', '264866047-Jujutsu Kaisen.png', 7, 3),
(16, 'Acheron', 'Astaga ngerinya', '2024-10-27', '1658323588-download_waifu2x_photo_noise3_scale.png', 7, 3),
(17, 'Chainsaw Man', 'Gatau siapa', '2024-10-24', '110847101-download5.jpg', 7, 3),
(18, 'Friend', 'manipulator', '2024-10-24', '1739062554-download.jpg', 7, 3),
(19, 'Persona', 'keren banget', '2024-10-27', '1303365348-Minato and Messiah.jpg', 7, 3),
(20, 'iphone', 'text iphone', '2024-10-24', '1073382038-iphone.jpg', 9, 3),
(21, 'laptop', 'text laptop', '2024-10-24', '593734370-laptop.jpg', 9, 3),
(22, 'tablet', 'text tablet', '2024-10-24', '878925969-tablet.jpg', 9, 3),
(25, 'Laut', 'gambar laut', '2024-10-24', '1184063287-Download premium image of Seascape outdoors scenery horizon about anime background, sea wallpaper, iphone wallpaper anime, wallpaper anime, and animated nature backgrounds 14740308.jpg', 11, 5),
(26, 'Jalanan', 'gambar jalanan', '2024-10-24', '2083614747-download (1).jpg', 11, 5),
(27, 'Sawah', 'gambar sawah', '2024-10-24', '1813310077-pemandangan indah.jpg', 11, 5),
(28, 'Gambar indah', 'pegunungan', '2024-10-24', '798056970-Hari yang cerah.jpg', 11, 5),
(29, 'Gambar gunung', 'gunung', '2024-10-24', '1989434832-Pin by Zarnosh Khan on Asad in 2022 _ Pemandangan, Fotografi alam, Fotografi.jpg', 11, 5),
(30, 'gambar laptop', 'modern laptop', '2024-10-24', '1552578079-download (2).jpg', 13, 7),
(31, 'Ai', 'gambar ai', '2024-10-24', '341911571-A List of Artificial Intelligence (AI) Tools for Personal use - 2024.jpg', 13, 7),
(32, 'Mobil', 'mobil kartun', '2024-10-24', '40965327-download (3).jpg', 14, 7),
(33, 'motor gp', 'gambar gp', '2024-10-24', '1512664277-Fabio Quartararo _ Motos de rua, Imagens de moto, Motos.jpg', 14, 7),
(34, 'tech', 'teknologi', '2024-10-24', '472558312-2 5d技術技術感樓梯, 大數據, 定位, 互聯網插畫素材，桌布背景免費下載 - 免版稅.jpg', 13, 7),
(35, 'motor', 'gambar motor', '2024-10-24', '736180345-motorcyle 🏍️🛵💨💨.jpg', 14, 7),
(36, 'Dybala', 'gaya keren', '2024-10-24', '1369427184-Paulo Dybala Wallpaper _ Pemain sepak bola, Bola sepak, Sepak bola.jpg', 15, 8),
(37, 'beligoal', 'selebrasi ', '2024-10-24', '1596391382-download (4).jpg', 15, 8),
(38, 'bola sepak', 'merek nike', '2024-10-24', '1958490885-download (5).jpg', 15, 8),
(39, 'neymar', 'terlupakan well', '2024-10-24', '286541756-Football wallpaper.jpg', 15, 8),
(40, 'Legend Bola', 'para legenda', '2024-10-24', '2001961261-Pemain legend sepak bola.jpg', 15, 8),
(45, 'Itachi', 'Uchiha', '2024-11-06', '1948125832-Itachi Uchiha.jpg', 27, 10),
(46, 'Konan', 'cantik bgt coy', '2024-11-06', '1385256242-05158507-04ca-4005-aae1-35a7d2d63de6.jpg', 27, 10),
(47, 'Nagato', 'Aduhai ngerinya', '2024-11-06', '1798952111-e4924103-473c-45c1-a41d-8522241f0c49.jpg', 27, 10),
(48, 'Kisame', '7 ninja pedang', '2024-11-06', '1279084205-4a535819-7f5e-46c0-8d6b-23735b238044.jpg', 27, 10),
(49, 'Zetzu', 'anomali hitam legam', '2024-11-06', '1227754770-1c230f82-b6cc-40b1-bc9d-e1a4d9c386ec.jpg', 27, 10),
(50, 'Sasori', 'badass', '2024-11-06', '220350744-Sasori.jpg', 27, 10),
(51, 'Deidara', 'Seni adalah ledakan', '2024-11-06', '1444614717-Deidara.jpg', 27, 10),
(52, 'Pain', 'leader', '2024-11-06', '343892187-Pain __ Naruto.jpg', 27, 10),
(53, 'Kakuzu', 'dou maut', '2024-11-06', '1405133061-Kakuzu and Hidan  🖤.jpg', 27, 10),
(54, 'Akatsuki', 'All member', '2024-11-06', '29010559-e598f74d-2cf1-44c2-951e-68a2c63e4e70.jpg', 27, 10),
(55, 'Hidan', 'Dewa kematian', '2024-11-06', '763995472-Hidan.jpg', 27, 10);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `id_komentar` int NOT NULL,
  `id_foto` int NOT NULL,
  `id_user` int NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar_foto`
--

INSERT INTO `komentar_foto` (`id_komentar`, `id_foto`, `id_user`, `isi_komentar`, `tanggal_komentar`) VALUES
(1, 5, 3, 'mantap', '2024-10-24'),
(8, 5, 5, 'sukuna win', '2024-10-24'),
(11, 5, 7, 'ga bro gojo win', '2024-10-24'),
(13, 16, 10, 'op parah', '2024-10-27'),
(22, 20, 20, 'Android > Iphone', '2024-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `like_foto`
--

CREATE TABLE `like_foto` (
  `id_like` int NOT NULL,
  `id_foto` int NOT NULL,
  `id_user` int NOT NULL,
  `tanggal_like` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `like_foto`
--

INSERT INTO `like_foto` (`id_like`, `id_foto`, `id_user`, `tanggal_like`) VALUES
(21, 5, 5, '2024-10-23'),
(525, 5, 7, '2024-10-24'),
(527, 16, 10, '2024-10-27'),
(532, 20, 20, '2024-10-31'),
(533, 37, 3, '2024-11-03'),
(543, 5, 20, '2024-11-05'),
(545, 46, 10, '2024-11-06'),
(548, 5, 3, '2024-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `role`) VALUES
(3, 'Daffa', '202cb962ac59075b964b07152d234b70', 'daffa@gmail.com', 'DaffaSyauki', 'Bandung', 'user'),
(5, 'akun1', '05c0598f35c35762cd7f3801e2388b37', 'akun1@gmail.com', 'akun1', 'Bandung', 'user'),
(7, 'akun2', '9ce0ca3d09106a37842cfcbfbdf2f60d', 'akun2@gmail.com', 'akun2', 'Bandung', 'user'),
(8, 'akun3', '5f5c57d23f6275a6f15337395a4633e4', 'akun3@gmail.com', 'akun3', 'Bandung', 'user'),
(10, 'akun4', 'c0f57032667f77210b1c83bc2ba93d12', 'akun4@gmail.com', 'akun4', 'Bandung', 'user'),
(20, 'Admin', '202cb962ac59075b964b07152d234b70', 'admin@gmail.com', 'Adminnnn', 'Bandung', 'admin'),
(21, 'akun5', '7de9b0ecd9b44a71304dd665ea05f0eb', 'akun5@gmail.com', 'akun5', 'Bandung', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `album_ibfk_1` (`id_user`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `foto_ibfk_1` (`id_album`),
  ADD KEY `foto_ibfk_2` (`id_user`);

--
-- Indexes for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `komentar_foto_ibfk_1` (`id_foto`),
  ADD KEY `komentar_foto_ibfk_2` (`id_user`);

--
-- Indexes for table `like_foto`
--
ALTER TABLE `like_foto`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `like_foto_ibfk_1` (`id_foto`),
  ADD KEY `like_foto_ibfk_2` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `id_komentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `like_foto`
--
ALTER TABLE `like_foto`
  MODIFY `id_like` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD CONSTRAINT `komentar_foto_ibfk_1` FOREIGN KEY (`id_foto`) REFERENCES `foto` (`id_foto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_foto_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_foto`
--
ALTER TABLE `like_foto`
  ADD CONSTRAINT `like_foto_ibfk_1` FOREIGN KEY (`id_foto`) REFERENCES `foto` (`id_foto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_foto_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
