-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql200.infinityfree.com
-- Generation Time: Jun 04, 2026 at 09:20 PM
-- Server version: 11.4.12-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40703293_aetherionmessages`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`) VALUES
(10, 'Tolong dong BPH nya serius dalam bertugas . \r\nSoalnya aku sering melihat BPH kumpul , tapi gak tau apa yang dibahas dan emang gak kelihatan dampak dari kumpul tersebut .\r\n\r\nAku juga mau mengkritik Moreano yang menurutku pribadi sebenarnya kurang cocok menjadi ketua angkatan . Melihat sikapnya aku merasa emang kurang cocok .\r\n\r\nTerus aku juga mau mengkritik Philips . Ketika ada sebuah acara atau kegiatan dan Moreano lagi gak ada di situ , dia gak mau berperan sebagai wakil ketua angkatan . Jadi sering kali malah orang lain yang menjadi pemimpin. Contohnya seperti ibadah padang kemarin yang seharusnya Philips yang meneriakkan Aetherion ketika hendak membuat video kemarin , namun nyatanya justru Christofel yang meneriakkannya . Padahal harusnya Philips yang lebih berhak ( maaf jika aku berpikiran gini).\r\n\r\nKemudian aku juga mau mengkritik Paulus . Karena belum lama ini , BPH melakukan rapat dan mendapatkan izin HP ( walau aku gak tau untuk apa). Namun aku dengar sendiri dari salah satu BPH , Paulus gak terlalu peduli dengan rapatnya dan justru hanya peduli dengan izin HP nya .\r\n\r\nJadi tolonng kepada semua BPH agar dapat bekerja sama dan mementingkan angkatan daripada diri-sendiri . Karena jika BPH aja gak BECUS , maka siapa yang menuntun kami ????\r\n\r\nSekian dari saya , maaf jika kata-katanya terdengar kasar .\r\nMakacihhh', '2025-12-17 19:06:57'),
(11, 'Semoga di kedepannya, angkatan 13 SUD dapat lebih solid dan memghargai satu sama lain. Dan juga, semoga angkatan 13 dapat memberikan prestasi-prestasi yang membanggakan SMA Unggul Del.', '2025-12-17 19:09:07'),
(12, 'buatkan dulu evaluasi/diskusi/forum angkatan internal kalau wajib ada pendamping sama bu dewi aja', '2025-12-17 19:17:14'),
(13, 'love you aetherion', '2025-12-17 19:31:29'),
(14, 'Aetherion hebat', '2025-12-18 17:33:31'),
(15, 'Moga akt 13 makin solid dan jadi contoh yang baik buat semua orang', '2025-12-18 17:58:55'),
(16, 'semangat bebeb bebeb q', '2025-12-18 20:22:24'),
(17, 'semangat bebeb bebeb q', '2025-12-18 20:22:41'),
(18, 'Izin teman-teman, jika kita lihat lagi sudah banyak teman-teman kita yang keluar, baik itu karena poin ataupun karena sakit. Saya ingin lebih fokus kepada teman-teman yang keluar karena poin. Menurut saya, alangkah baiknya bila kita, terutama BPH kami juga turut ambil peran dalam hal ini, mengingat juga bahwa sudah banyak teman-teman kita yang menerima sp 3, jadi saran saya, bisakah dibuat program pendekatan ataupun semacamnya yang dapat dilakukan untuk mencegah adanya pelanggaran besar lagi? Terutama bagi teman-teman yang sudah memiliki poin yang banyak, menurut saya perlu dilakukan komunikasi pribadi karena terkadang yang terpenting yakni adanya teman yang selalu mendukung, jadi setidaknya kita sudah ikut berpartisipasi secara aktif dalam memberikan saran kepada orang tersebut. Terima kasih.', '2025-12-19 09:54:51'),
(20, 'hi', '2026-01-09 10:31:00'),
(21, 'haiii, bagi drive prabu angkatan kita', '2026-01-22 07:37:52'),
(22, 'hai', '2026-03-11 07:37:55'),
(23, 'Saya harap ketika evaluasi angkatan bukan hanya anggota yg di evaluasi tapi juga BPH nya terimakasih', '2026-03-11 08:39:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
