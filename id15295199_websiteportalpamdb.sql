-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2021 at 03:21 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15295199_websiteportalpamdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Irwan Wibawa', 'irwan@pamjaya.co.id', 'default.png', '$2y$10$cFrUZrBcI9.MgDORstX8peMaLRaC.34YVYw.1/jsqiSW.C8PiElEe', 1, 1, '1 September 2020'),
(75, 'Enar Legowo', 'enar@pamjaya.co.id', 'default.png', '$2y$10$t1BNtOrjsKL5wEt4JDfpYOwlqTLO2kngLYTO1j3d9rbfTU3A9LkeG', 1, 1, '5 November 2020'),
(76, 'Ditha Pratama', 'mdithapratama@pamjaya.co.id', 'default.png', '$2y$10$kt01DJAouqy5dDiPO0jpe.1g4Jl3sHiqWkxppRol.hl.p3Smpr5je', 1, 1, '5 November 2020'),
(77, 'Maura Qoonitah', 'mauraqoonitah@gmail.com', 'default.png', '$2y$10$dADBzK7f0jWtOh9KI45DvuNlodpSefqCuyDrZyu31iqSEKPSFjsY.', 1, 1, '22 December 2020'),
(78, 'Ilham Arrosyid', 'ilhamarrosyid@gmail.com', 'default.png', '$2y$10$pH4foIJBcJk76kef1ofQl.wajHgV6Mjp3/lhdt/zX.kql2C6kAX6G', 2, 1, '23 December 2020'),
(79, 'Fachry Muhammad', 'fachry.muhammad13@gmail.com', 'default.png', '$2y$10$Ex1K1lp4YJI.QFUwj4nX.O54lelsJ4LksNMeu4QWFEq8DbEE1IvHG', 3, 1, '23 December 2020'),
(80, 'Admin Berita', 'guest@gmail.com', 'default.png', '$2y$10$WQNmfIdr.OJF2G4Y/tzmOeSFD7EPm0H7TZFAwVVtH.e71P0CxzHr.', 3, 1, '23 December 2020'),
(81, 'Maura Qoonitah2', 'mauraqoonitah2@gmail.com', 'default.png', '$2y$10$OgtGTKWpn5JEovBGrRriSeKvlY9lDfip/AphzKizaGzCTMYyYEnUy', 2, 1, '10 January 2021');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `publishedAt` varchar(100) NOT NULL,
  `konten` longtext NOT NULL,
  `creator` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `gambar`, `publishedAt`, `konten`, `creator`) VALUES
(3, 'Crypto Stimulus: How Ethereum Based Uniswap Gave All Its Users Nearly $1,200', 'nikita-kachanovsky-OVbeSXRk_9E-unsplash_(1).jpg', '3 September 2020', '                                        German police have launched a homicide investigation after a woman died during a cyber-attack on a hospital.\r\nHackers disabled computer systems at Düsseldorf University Hospital and the patient died while doctors attempted to transfer her to another hospital.\r\nCologne prosecutors officially launched a negligent homicide case this morning saying hackers could be blamed.\r\nOne expert said, if confirmed, it would be the first known case of a life being lost as a result of a hack.\r\nThe ransomware attack hit the hospital on the night of 9 September, scrambling data and making computer systems inoperable.\r\nSuch attacks are one of the most serious threats in cyber-security with dozens of high profile attacks so far this year. The attackers can demand large payments in cryptocurrency Bitcoin in exchange for a software key that unlocks IT systems.\r\nThe female patient, from Düsseldorf, was due to have scheduled life-saving treatment and was transferred to another hospital in Wuppertal which is roughly 19 miles (30km) away.German police have launched a homicide investigation after a woman died during a cyber-attack on a hospital.\r\nHackers disabled computer systems at Düsseldorf University Hospital and the patient died while doctors attempted to transfer her to another hospital.\r\nCologne prosecutors officially launched a negligent homicide case this morning saying hackers could be blamed.\r\nOne expert said, if confirmed, it would be the first known case of a life being lost as a result of a hack.\r\nThe ransomware attack hit the hospital on the night of 9 September, scrambling data and making computer systems inoperable.\r\nSuch attacks are one of the most serious threats in cyber-security with dozens of high profile attacks so far this year. The attackers can demand large payments in cryptocurrency Bitcoin in exchange for a software key that unlocks IT systems.\r\nThe female patient, from Düsseldorf, was due to have scheduled life-saving treatment and was transferred to another hospital in Wuppertal which is roughly 19 miles (30km) away.German police have launched a homicide investigation after a woman died during a cyber-attack on a hospital.\r\nHackers disabled computer systems at Düsseldorf University Hospital and the patient died while doctors attempted to transfer her to another hospital.\r\nCologne prosecutors officially launched a negligent homicide case this morning saying hackers could be blamed.\r\nOne expert said, if confirmed, it would be the first known case of a life being lost as a result of a hack.\r\nThe ransomware attack hit the hospital on the night of 9 September, scrambling data and making computer systems inoperable.\r\nSuch attacks are one of the most serious threats in cyber-security with dozens of high profile attacks so far this year. The attackers can demand large payments in cryptocurrency Bitcoin in exchange for a software key that unlocks IT systems.\r\nThe female patient, from Düsseldorf, was due to have scheduled life-saving treatment and was transferred to another hospital in Wuppertal which is roughly 19 miles (30km) away.                                        ', 'Fachry Muhammad'),
(5, 'Free 400 UNI tokens for Crypto Traders $1000 value.', 'berita-img.png', '5 September 2020', 'Sony has matched the price of the forthcoming flagship PlayStation 5 to that of Microsoft\'s Xbox Series X. Last time round, the PS4 significantly undercut the Xbox One at launch. Sony also confirmed the PS5\'s \"digital edition\" - which does not have a disc drive - would cost about 40% more than the low-end Xbox Series S. Both PS5 consoles are set to be released on 19 November in the UK, and 12 November in the US, Japan and Australia. That puts them slightly later than Microsoft\'s 10 November launch date.                                                                                                                                                                ', 'Maura'),
(6, 'BiggerPockets Podcast 400: “This Advice Changed My Life” withBiggerPockets Podcast 400: “This Advice', 'berita-img.png', '6 September 2020', 'Some industry-watchers believe Microsoft\'s combination of a £250 price for the XBox Series S and the value offered by the Xbox Game Pass subscription service could give the US firm an advantage.\r\nMicrosoft offers members its first-party blockbuster games at launch in its games library, unlike Sony\'s existing PlayStation Now services, which is limited to older major releases.\r\nSony\'s decision to price some of its first PS5 releases at £70 - including the \"ultimate edition\" of a new Spider-Man game, and Demon\'s Souls - represents a rise, and will also have to be taken into consideration.\r\nIt showed off a new subscription service called the PlayStation Plus Collection for the PS5.Some industry-watchers believe Microsoft\'s combination of a £250 price for the XBox Series S and the value offered by the Xbox Game Pass subscription service could give the US firm an advantage.\r\nMicrosoft offers members its first-party blockbuster games at launch in its games library, unlike Sony\'s existing PlayStation Now services, which is limited to older major releases.\r\nSony\'s decision to price some of its first PS5 releases at £70 - including the \"ultimate edition\" of a new Spider-Man game, and Demon\'s Souls - represents a rise, and will also have to be taken into consideration.\r\nIt showed off a new subscription service called the PlayStation Plus Collection for the PS5.', 'Fachry'),
(7, '3 Biggest Takeaways for Bitcoin From Powell’s Press Conference.', 'age_2018-12-26_at_2_13_46_pm.jpg', '8 September 2020', 'Tech firms have been urged to stop advertising to under-18s in an open letter signed by MPs, academics and children\'s-rights advocates.\r\nBehavioural advertising not only undermines privacy but puts \"susceptible\" youngsters under unfair marketing pressure, the letter says.\r\nIt is addressed to Google, Amazon, Apple, Facebook and Microsoft. In a separate move Google-owned YouTube is accused of unlawfully mining data from five million under-13s in the UK. European data protection laws forbid the mining of data of young children.\r\n\"The fact that ad-tech companies hold 72 million data points on a child by the time they turn 13 shows the extent of disregard for these laws, and the extraordinary surveillance to which children are subjected,\" the letter reads.s\r\n\"There is no justification for targeting teenagers with personalised ads any more than there is for targeting 12-year-olds.\r\n\"You, the most powerful companies on the internet, have a responsibility to protect your users.\"\r\nYouTube legal fight\r\nAmong the 23 signatories are MP Caroline Lucas and clinical psychologist Dr Elly Hanson. Friends of the Earth is also named on the letter.\r\nIt was co-ordinated by Global Action Plan, which argues that online advertising accelerates consumerism, and adds unnecessary pressure to the planet.\r\nAll the firms involved have been asked to comment but none has yet responded.\r\nSeparately, privacy advocate Duncan McCann is suing Google on behalf of five million British children, claiming it broke privacy laws by tracking children online, in breach of both UK and European data-protection laws.\r\nThe case, lodged with the UK High Court in July, will be strongly contested by YouTube which will argue its platform is not for children aged under 13.\r\nMr McCann, who has three children under that age, believes damages of between £100 and £500 could be payable to children who are found to have had their data breached.\r\nMore on this story                                        ', 'Ilham'),
(8, 'Ethereum Based Uniswap Gave All Its Users', '20200430193210fd4dcca102d30acaf2c266cbe9ba9624.jpeg', '2 Oktober 2020', '                                                                                                                        How e-commerce is exploding in South Africa Close E-commerce has been one sector that has boomed in South Africa during the pandemic.  Startup Bottles launched South Africa\'s first ever on-demand alcohol delivery app service in 2016.  During the coronavirus lockdown the app firm expanded its services to provide groceries instead, and it saw triple the demand and its user base doubled.  \"Most definitely, I think coronavirus has, in just the space of a few weeks, accelerated the entire ecommerce industry in South Africa by 4-5 years at least,\" Bottles\' co-founder and chief executive Vincent Viviers told the BBC.                                                                                                                                                                 ', 'Maura'),
(31, 'SELENGGARAKAN PROGRAM DONOR DARAH, PAM JAYA BANTU PMI ATASI KEKURANGAN KANTUNG DARAH', 'image1.jpg', '02 November 2020', 'Peringati HUT ke-98, PAM JAYA bekerja sama dengan Palang Merah Indonesia (PMI)  menyelenggarakan kegiatan donor darah di Kantor Pusat PAM JAYA, Senin, 1 Desember 2020.\r\n\r\nTercatat, sebanyak 51 peserta mendaftar dan dari jumlah itu, sebanyak 47 peserta berhasil mendonorkan darahnya.\r\n\r\nDirektur Utama PAM JAYA, Priyatno Bambang Hernowo, dalam sambutannya menekankan tentang pentingnya kontribusi setiap orang dalam membantu PMI melaksanakan tugas mulianya.\r\n\r\nPerwakilan PMI pun mengucapkan rasa terima kasih atas partisipasi PAM JAYA. Apalagi, lanjutnya, selama masa pandemik Covid-19 ini, jumlah kantung darah yang diterima PMI menurun drastis.\r\n\r\nDonor darah ini merupakan bagian dari rangkaian kegiatan untuk menyambut HUT PAM JAYA ke-98 yang bertema “Berbagi, Sehat, dan Bahagia” yang jatuh pada 23 Desember mendatang.', 'Maura Qoonitah');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `nama`, `icon`, `link`, `deskripsi`) VALUES
(5, 'Alfresco', 'alfresco-icon.png', 'https://docs.pamjaya.co.id/', 'Aplikasi Enterprise Content Management system &#40;CMS&#41; untuk pengelolaan content yang menerapkan peran paperless office dan mempermudah kolaborasi project dengan tim untuk saling mengakses dokumen. '),
(7, 'TNDE', 'tnde-icon.png', 'http://tnde.pamjaya.co.id/', 'TNDE Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ducimus quaerat nostrum dignissimos, natus, nihil sit esse, ut atque laudantium dolores modi non soluta aut amet facilis quis doloremque perferendis placeat culpa iste at! Doloremque consectetur placeat adipisci, error sapiente atque. Voluptates incidunt ullam minus, consequuntur tempore accusantium saepe quaerat.'),
(9, 'e-mail', 'zimbra-icon.png', 'https://mail.pamjaya.co.id/', 'Zimbra adalah software open source untuk e-mail server khusus di lingkungan PAM JAYA'),
(11, 'HRIS', 'hris-icon.png', 'https://sf.dataon.com/sf6/index.cfm', 'HRIS Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(12, 'PPID', 'ppid-icon.png', 'http://ppid.pamjaya.co.id/', 'PPID Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(13, 'e-procurement', 'e-procurement-icon.png', 'https://e-proc.pamjaya.co.id/', 'e-procurement Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(14, 'SIL', 'sil-icon.png', 'home/aksesSIL', '                                                                                                                                                                                                                                                SIL Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!                                                                                                                                                                                                                                                '),
(15, 'Kimonev', 'kimonev-icon.png', 'https://kimonev.pamjaya.co.id/', 'kimonev Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(16, 'MAYA', 'maya-icon.png', 'http://203.161.27.194:3821/sim_aset/', 'maya Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(17, 'MONICA', 'monica-icon.png', 'https://monica.pamjaya.co.id/', 'monica Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(77, 'App Default Image', 'item_default.png', 'https://www.instagram.com/', '                                        Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk PelangiAplikasi untuk Aplikasi untuk Aplikasi                                                                                                                         '),
(84, 'App Default Image', 'item_default.png', 'https://www.instagram.com/', '                                        Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk PelangiAplikasi untuk Aplikasi untuk Aplikasi                                                                                                                         '),
(85, 'App Default Image', 'item_default.png', 'https://www.instagram.com/', '                                        Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk PelangiAplikasi untuk Aplikasi untuk Aplikasi                                                                                                                         ');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(32, 1, 1),
(33, 1, 2),
(34, 1, 3),
(35, 1, 4),
(36, 2, 2),
(37, 2, 3),
(38, 2, 4),
(39, 3, 2),
(40, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Super Admin'),
(2, 'Berita'),
(3, 'Aplikasi'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'AdmBerita');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Manage Akun', 'Admin/Admin_manage_account', 'nav-icon fas fa-user-plus', 1),
(2, 2, 'Tambah Berita', 'Admin/Admin_tambah_berita', 'nav-icon fas fa-newspaper\r\n', 1),
(3, 2, 'List Berita', 'Admin/Admin_list_berita', 'far fa-dot-circle nav-icon', 1),
(18, 3, 'Tambah Aplikasi', 'Admin/Admin_tambah_aplikasi', 'nav-icon fas fa-code', 1),
(19, 3, 'List Aplikasi', 'Admin/Admin_list_aplikasi', 'far fa-dot-circle nav-icon', 1),
(20, 4, 'Dashboard', 'Admin/Admin_home', 'nav-icon fas fa-laptop-house', 1),
(21, 4, 'Change Password', 'Admin/Admin_home/changepassword', 'nav-icon fas fa-key', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitorcount`
--

CREATE TABLE `visitorcount` (
  `id` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `hits` int(15) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitorcount`
--

INSERT INTO `visitorcount` (`id`, `ip`, `date`, `hits`, `time`) VALUES
(13, '110.138.148.193', '2020-12-22', 2, '2020-12-23 04:31:11'),
(14, '110.138.148.193', '2020-12-23', 2, '2020-12-23 10:52:14'),
(15, '140.213.9.161', '2020-12-23', 1, '2020-12-23 11:21:29'),
(16, '203.161.27.194', '2020-12-23', 1, '2020-12-23 11:53:20'),
(17, '125.160.224.28', '2020-12-23', 5, '2020-12-23 20:15:24'),
(18, '139.162.221.245', '2020-12-23', 2, '2020-12-23 20:15:39'),
(19, '176.58.123.114', '2020-12-23', 6, '2020-12-23 20:15:40'),
(20, '88.80.191.29', '2020-12-23', 5, '2020-12-23 20:21:04'),
(21, '125.160.224.28', '2020-12-25', 2, '2020-12-25 09:38:41'),
(22, '110.138.148.193', '2020-12-27', 5, '2020-12-27 16:30:53'),
(23, '110.138.148.236', '2020-12-28', 3, '2020-12-29 00:32:09'),
(24, '180.252.124.165', '2020-12-29', 5, '2020-12-30 04:03:26'),
(25, '110.138.149.107', '2021-01-08', 4, '2021-01-09 02:18:45'),
(26, '110.138.149.107', '2021-01-09', 4, '2021-01-10 00:00:31'),
(27, '180.252.115.152', '2021-01-14', 1, '2021-01-14 14:32:48'),
(28, '180.252.121.192', '2021-01-25', 2, '2021-01-26 06:42:58'),
(29, '180.252.113.182', '2021-01-27', 4, '2021-01-28 00:29:17'),
(30, '140.213.35.35', '2021-01-28', 2, '2021-01-28 09:20:57'),
(31, '140.213.2.1', '2021-01-28', 1, '2021-01-28 09:38:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitorcount`
--
ALTER TABLE `visitorcount`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `visitorcount`
--
ALTER TABLE `visitorcount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
