-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2020 at 04:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmusik`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_gr` int(11) NOT NULL,
  `name_gr` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_gr`, `name_gr`) VALUES
(1, 'Jazz'),
(2, 'Pop'),
(3, 'Rock'),
(4, 'TrapMusik'),
(5, 'EDM'),
(6, 'Rap'),
(7, 'Dangdut');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id_ms` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `durasi` varchar(30) NOT NULL,
  `id_genre` int(10) NOT NULL,
  `id_singers` int(10) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id_ms`, `title`, `durasi`, `id_genre`, `id_singers`, `photo`, `deskripsi`) VALUES
(3, 'Its My Life', '4:26 Menit', 3, 1, 'bon_jovi.jpg', 'https://www.youtube.com/watch?v=vx2u5uUu3DE'),
(4, 'Numb', '3:06 Menit', 3, 2, 'numb.jpg', 'https://www.youtube.com/watch?v=kXYiU_JCYtU'),
(5, 'In The End', '3:38 Menit', 3, 2, 'in the end.jpg', 'https://www.youtube.com/watch?v=eVTXPUF4Oz4'),
(6, 'Lemon (Cover by Kobasolo)', '4:31 Menit', 2, 3, 'kobasolo_lemon.jpg', 'https://www.youtube.com/watch?v=clU8c2fpk2s'),
(7, 'Happiness / back number (Covered by Kobasolo & Chiai Fujikawa)', '6:53 Menit', 2, 3, 'shiawase.jpg', 'https://www.youtube.com/watch?v=ruxJacIFKL4'),
(8, 'Falling', '2:39 Menit', 2, 5, 'falling.jpg', 'https://www.youtube.com/watch?v=L7mfjvdnPno'),
(9, 'Past Live', '3:04 Menit', 2, 5, 'pastlive.jpg', 'https://www.youtube.com/watch?v=ZHOFjmQnTG0'),
(10, 'Kataomoi', '3:42 Menit', 2, 4, 'kataomoi.jpg', 'https://www.youtube.com/watch?v=zSOJk7ggJts'),
(11, 'Kokoronashi', '5:13', 2, 6, 'kokoronashi.jpg', 'https://www.youtube.com/watch?v=QJie7dTvbjQ'),
(12, 'Bass Trap Music 2020 🔈 Bass Boosted Trap & Future Bass Music 🔈 Best EDM #2', '1:04:19 Jam', 4, 7, 'trapmusik.jpg', 'https://www.youtube.com/watch?v=q7hX1dDd1w8'),
(13, 'Rap God', '6:10 Menit', 6, 8, 'rapgod.jpg', 'https://www.youtube.com/watch?v=XbGs_qK2PQA'),
(14, 'Pretender / Official Hige-dandism (Covered by KOBASOLO & Harutya)', '5:22 Menit', 2, 3, 'pretender.webp', 'https://www.youtube.com/results?search_query=kobasolo+pretender'),
(15, 'Robbe x New Beat Order x Britt Lari - Kings & Queens (Magic Cover Release)', '2:35 Menit', 4, 7, 'trapmusik2.webp', 'https://www.youtube.com/watch?v=OATCR1qOlTQ'),
(16, 'Tabba x Dj Goja - Secrets (Magic Free Release)', '3:33 Menit', 4, 7, 'trapmusik3.webp', 'https://www.youtube.com/watch?v=QmE2NQ3x2CA');

-- --------------------------------------------------------

--
-- Table structure for table `singers`
--

CREATE TABLE `singers` (
  `id_sr` int(11) NOT NULL,
  `name_sr` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `singers`
--

INSERT INTO `singers` (`id_sr`, `name_sr`) VALUES
(1, 'Bon Jovi'),
(2, 'Linkin Park'),
(3, 'Kobasolo'),
(4, 'Aimer'),
(5, 'Trevol Daniel'),
(6, 'Majiko'),
(7, 'Magic Music'),
(8, 'Eminem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_gr`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id_ms`);

--
-- Indexes for table `singers`
--
ALTER TABLE `singers`
  ADD PRIMARY KEY (`id_sr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_gr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id_ms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `singers`
--
ALTER TABLE `singers`
  MODIFY `id_sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
