-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2020 at 08:24 PM
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
-- Database: `portal_pam`
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
  `date_created` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
<<<<<<< HEAD
(10, 'Maura Qoonitah', 'mauraqoonitah@gmail.com', 'default.png', '$2y$10$/fqxGRracSrNlajO0GIqZuGRESp8OiFA6QymqT4j4v1L8gmsZAl7G', 1, 1, '0000-00-00'),
(11, 'Adini Gufroni', 'adinigufroni06@gmail.com', 'default.png', '$2y$10$t5opZK1nOY6qJCMY5VldHeEJLopotFNjGXn.tHZJ.V30LPZKr2yNK', 1, 1, '0000-00-00'),
(14, 'Vivi Rofiah', 'vivi@gmail.com', 'default.png', '$2y$10$ufWas4UIfEIFP50hXSctH.HJR3TtzXdC7Xsi7jQtnNx5SUKkca8lW', 1, 1, '0000-00-00'),
(15, 'Divina Fatriandira', 'dfatriandira@gmail.com', 'default.png', '$2y$10$6aC1S9puG1UwzoKQu1TWR.9hywCLvZgrPehCbHr3/uOqGXb.wkFQK', 2, 1, '0000-00-00'),
(21, 'Nia Normaliana', 'nianormaliana@gmail.com', 'default.png', '$2y$10$cMNc4U5iJqvVXpEuCb9E1ufYMyj0oqGreSEOp//TxlCtxGrxweY9q', 1, 0, '0000-00-00'),
(22, 'Amanda Azalia', 'adinigseni06@gmail.com', 'default.png', '$2y$10$M.C3TVvtgD79CgmG26FZ.OuwziXhCZcA0fqqr9mTqHINj.t9714Ei', 2, 0, '0000-00-00');
=======
(1, 'Maura Qoonitah', 'mauraqoonitah@gmail.com', 'default.png', '$2y$10$rCW0oMoxZfGOmQDa1H9QoO9Jdxy5cdNrRtLmf8ETaq1BQhFwFhGFK', 1, 1, '0000-00-00'),
(3, 'mora', 'moraqipi@gmail.com', 'default.png', '$2y$10$3Jf0iEVPYVozElKCeGgR9eX8cjwJDXRrIMs7YK35AWBEp7r4AN/gy', 2, 0, '0000-00-00'),
(4, 'Fachry Muhammad', 'fachry.muhammad13@gmail.com', 'default.png', '$2y$10$mBNYE.GXAD.88WVcuC.5med8VNTS9UBzW8agKx6KQK5OHDhkuhTfK', 1, 1, '0000-00-00'),
(45, 'Adini Gufroni', 'adinigufroni06@gmail.com', 'default.png', '$2y$10$t/I0/dPjMYYSx75gbf5zYu/oV9tyeJEMSZmzzvYJ6Knzdg7o5KcpS', 2, 1, '0000-00-00');
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417

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
(1, 'Bitcoin speculators hit all-time lows as Grayscale says BTC like 2016', 'test.jpg', '01/09/2020', '<h3> this is h1 </h3> The Department of Commerce said it would bar people in the US from downloading the messaging and video-sharing apps through any app store on any platform.\r\nThe Trump administration says the companies threaten national security and could pass user data to China.\r\nBut China and both companies deny this.\r\nWeChat will effectively shut down in the US on Sunday, but people will still be able to use TikTok until 12 November, when it could also be fully banned.\r\nIs the US about to split the internet?\r\nWhat TikTokers make of Trump\'s ban threat\r\nTikTok said it was \"disappointed\" in the order and disagreed with the commerce department, saying it had already committed to \"unprecedented levels of additional transparency\" in light of the Trump administration\'s concerns.\r\n\"We will continue to challenge the unjust executive order, which was enacted without due process and threatens to deprive the American people and small businesses across the US of a significant platform for both a voice and livelihoods.\"\r\nTencent - the owner of WeChat - said the announced restrictions were \"unfortunate\", but said they would continue talks with the US government \"to achieve a long-term solution\".\r\nThe ban order from the Department of Commerce follows President Trump\'s executive orders signed in August. It gave US businesses 45 days to stop working with either Chinese company.\r\nIf a planned partnership between US tech firm Oracle and TikTok owner ByteDance is ', 'Ilham Arrosyid'),
(2, 'Blockchain for Decision Makers: A systematic guide to using blockchain for improving your business-P', 'test.jpg', '02/09/2020', 'Twitter has automatically activated extra account protection for politicians and key figures in the forthcoming US election.\r\nA select group of election-related accounts will have to make immediate changes to improve their security.\r\nTwitter was the victim of one of the most significant hacks of a social network in history, in June.\r\nIt said it had learned \"from the experience of past security incidents\" and was focused on election security.\r\nTwitter said that in the coming weeks, it would be adding \"proactive internal security safeguards\" for a much wider range of high-profile election-related accounts.\r\nThey include:\r\nThe Executive Branch (including the president and vice-president)\r\nCongress (The House of Representatives and the Senate)\r\nUS governors and secretaries of state\r\nPresidential campaigns, political parties and candidates\r\nSignificant news outlets and political journalists\r\nStarting this week, those accounts will start receiving in-app notifications of immediate changes on the user\'s side.\r\nUnder the new rules, they will need to use a strong password - those that do not meet Twitter\'s standards will be required to change it the next time they log in.\r\nAll the accounts have had password reset protection enabled by default - a safety measure that requires the account holder to confirm the email address and password on file if they want to reset their password.\r\nAnd they will also be encouraged - but not required - to enable two-factor authentication.\r\nHack history\r\nThe June hack saw some of the world\'s most notable celebrities - such as Bill Gates, Joe Biden and Kanye West - have their accounts seized by the attacker to tweet an apparently simple Bitcoin scam.\r\nBut one of Twitter\'s most-followed accounts - US President Donald Trump - was unaffected. It later emerged that this was because the president\'s account had extra security protections in place internally.', 'Maura Qoonitah'),
(3, 'Crypto Stimulus: How Ethereum Based Uniswap Gave All Its Users Nearly $1,200', 'test.jpg', '03/09/2020', 'German police have launched a homicide investigation after a woman died during a cyber-attack on a hospital.\r\nHackers disabled computer systems at Düsseldorf University Hospital and the patient died while doctors attempted to transfer her to another hospital.\r\nCologne prosecutors officially launched a negligent homicide case this morning saying hackers could be blamed.\r\nOne expert said, if confirmed, it would be the first known case of a life being lost as a result of a hack.\r\nThe ransomware attack hit the hospital on the night of 9 September, scrambling data and making computer systems inoperable.\r\nSuch attacks are one of the most serious threats in cyber-security with dozens of high profile attacks so far this year. The attackers can demand large payments in cryptocurrency Bitcoin in exchange for a software key that unlocks IT systems.\r\nThe female patient, from Düsseldorf, was due to have scheduled life-saving treatment and was transferred to another hospital in Wuppertal which is roughly 19 miles (30km) away.German police have launched a homicide investigation after a woman died during a cyber-attack on a hospital.\r\nHackers disabled computer systems at Düsseldorf University Hospital and the patient died while doctors attempted to transfer her to another hospital.\r\nCologne prosecutors officially launched a negligent homicide case this morning saying hackers could be blamed.\r\nOne expert said, if confirmed, it would be the first known case of a life being lost as a result of a hack.\r\nThe ransomware attack hit the hospital on the night of 9 September, scrambling data and making computer systems inoperable.\r\nSuch attacks are one of the most serious threats in cyber-security with dozens of high profile attacks so far this year. The attackers can demand large payments in cryptocurrency Bitcoin in exchange for a software key that unlocks IT systems.\r\nThe female patient, from Düsseldorf, was due to have scheduled life-saving treatment and was transferred to another hospital in Wuppertal which is roughly 19 miles (30km) away.German police have launched a homicide investigation after a woman died during a cyber-attack on a hospital.\r\nHackers disabled computer systems at Düsseldorf University Hospital and the patient died while doctors attempted to transfer her to another hospital.\r\nCologne prosecutors officially launched a negligent homicide case this morning saying hackers could be blamed.\r\nOne expert said, if confirmed, it would be the first known case of a life being lost as a result of a hack.\r\nThe ransomware attack hit the hospital on the night of 9 September, scrambling data and making computer systems inoperable.\r\nSuch attacks are one of the most serious threats in cyber-security with dozens of high profile attacks so far this year. The attackers can demand large payments in cryptocurrency Bitcoin in exchange for a software key that unlocks IT systems.\r\nThe female patient, from Düsseldorf, was due to have scheduled life-saving treatment and was transferred to another hospital in Wuppertal which is roughly 19 miles (30km) away.', 'Fachry Muhammad'),
(4, 'Crypto Stimulus: How Ethereum Based Uniswap Gave All Its Users Nearly $1,200', 'test.jpg', '04/09/2020', 'Some local reports suggest the hackers did not intend to attack the hospital and in fact were trying to target a different university. Once the hackers had realised their mistake it is reported they gave the hospital the decryption key without demanding payment before disappearing.\r\nDetectives have brought in cyber-security experts to ascertain whether there is a link between the hack and the patient\'s death, with the hospital also likely to be investigated.\r\nGermany\'s national cyber-security authority says it is on site at the hospital helping the hospital\'s IT staff rebuild systems.\r\nIts president Arne Schönbohm said hackers took advantage of a well-known vulnerability in a piece of VPN (virtual private network) software developed by Citrix, and warned other organisations to protect themselves from the flaw.\r\n\"We warned of the vulnerability as early as January and pointed out the consequences of its exploitation. Attackers gain access to the internal networks and systems and can still paralyse them months later.\r\n\"I can only stress that such warnings should not be ignored or postponed, but need appropriate measures immediately. The incident shows once again how seriously this risk must be taken.\"\r\nUK universities lose data to ransomware attack\r\nRansomware attack takes US maritime base offline\r\nFormer chief executive of the UK\'s National Cyber Security Centre Ciaran Martin said: \"If confirmed, this tragedy would be the first known case of a death directly linked to a cyber-attack. It is not surprising that the cause of this is a ransomware attack by criminals rather than an attack by a nation state or terrorists.\r\n\"Although the purpose of ransomware is to make money, it stops systems working. So if you attack a hospital, then things like this are likely to happen. There were a few near misses across Europe earlier in the year and this looks, sadly, like the worst might have come to pass.\"\r\nLast month, technology giant Garmin is understood to have paid hackers a multi-million pound sum after its IT and production systems were taken offline in a ransomware attack.\r\nLaw enforcement agencies encourage victims not to pay ransoms arguing it fuels organised cyber-crime operations.', 'Ilham'),
(5, 'Free 400 UNI tokens for Crypto Traders $1000 value', 'test.jpg', '05/09/2020', 'Sony has matched the price of the forthcoming flagship PlayStation 5 to that of Microsoft\'s Xbox Series X.\r\nLast time round, the PS4 significantly undercut the Xbox One at launch.\r\nSony also confirmed the PS5\'s \"digital edition\" - which does not have a disc drive - would cost about 40% more than the low-end Xbox Series S.\r\nBoth PS5 consoles are set to be released on 19 November in the UK, and 12 November in the US, Japan and Australia.\r\nThat puts them slightly later than Microsoft\'s 10 November launch date.', 'Maura'),
(6, 'BiggerPockets Podcast 400: “This Advice Changed My Life” with Brandon and David', 'test.jpg', '06/09/2020', 'Some industry-watchers believe Microsoft\'s combination of a £250 price for the XBox Series S and the value offered by the Xbox Game Pass subscription service could give the US firm an advantage.\r\nMicrosoft offers members its first-party blockbuster games at launch in its games library, unlike Sony\'s existing PlayStation Now services, which is limited to older major releases.\r\nSony\'s decision to price some of its first PS5 releases at £70 - including the \"ultimate edition\" of a new Spider-Man game, and Demon\'s Souls - represents a rise, and will also have to be taken into consideration.\r\nIt showed off a new subscription service called the PlayStation Plus Collection for the PS5.Some industry-watchers believe Microsoft\'s combination of a £250 price for the XBox Series S and the value offered by the Xbox Game Pass subscription service could give the US firm an advantage.\r\nMicrosoft offers members its first-party blockbuster games at launch in its games library, unlike Sony\'s existing PlayStation Now services, which is limited to older major releases.\r\nSony\'s decision to price some of its first PS5 releases at £70 - including the \"ultimate edition\" of a new Spider-Man game, and Demon\'s Souls - represents a rise, and will also have to be taken into consideration.\r\nIt showed off a new subscription service called the PlayStation Plus Collection for the PS5.', 'Fachry'),
(7, '3 Biggest Takeaways for Bitcoin From Powell’s Press Conference', 'test.jpg', '07/09/2020', 'Tech firms have been urged to stop advertising to under-18s in an open letter signed by MPs, academics and children\'s-rights advocates.\r\nBehavioural advertising not only undermines privacy but puts \"susceptible\" youngsters under unfair marketing pressure, the letter says.\r\nIt is addressed to Google, Amazon, Apple, Facebook and Microsoft.\r\nIn a separate move Google-owned YouTube is accused of unlawfully mining data from five million under-13s in the UK.\r\nEuropean data protection laws forbid the mining of data of young children.\r\n\"The fact that ad-tech companies hold 72 million data points on a child by the time they turn 13 shows the extent of disregard for these laws, and the extraordinary surveillance to which children are subjected,\" the letter reads.\r\n\"There is no justification for targeting teenagers with personalised ads any more than there is for targeting 12-year-olds.\r\n\"You, the most powerful companies on the internet, have a responsibility to protect your users.\"\r\nYouTube legal fight\r\nAmong the 23 signatories are MP Caroline Lucas and clinical psychologist Dr Elly Hanson. Friends of the Earth is also named on the letter.\r\nIt was co-ordinated by Global Action Plan, which argues that online advertising accelerates consumerism, and adds unnecessary pressure to the planet.\r\nAll the firms involved have been asked to comment but none has yet responded.\r\nSeparately, privacy advocate Duncan McCann is suing Google on behalf of five million British children, claiming it broke privacy laws by tracking children online, in breach of both UK and European data-protection laws.\r\nThe case, lodged with the UK High Court in July, will be strongly contested by YouTube which will argue its platform is not for children aged under 13.\r\nMr McCann, who has three children under that age, believes damages of between £100 and £500 could be payable to children who are found to have had their data breached.\r\nMore on this story', 'Ilham'),
(8, 'Crypto Stimulus: How Ethereum Based Uniswap Gave All Its Users Nearly $1,200', 'test.jpg', '08/09/2020', 'How e-commerce is exploding in South Africa\r\n\r\nHow e-commerce is exploding in South Africa\r\nClose\r\nE-commerce has been one sector that has boomed in South Africa during the pandemic.\r\n\r\nStartup Bottles launched South Africa\'s first ever on-demand alcohol delivery app service in 2016.\r\n\r\nDuring the coronavirus lockdown the app firm expanded its services to provide groceries instead, and it saw triple the demand and its user base doubled.\r\n\r\n\"Most definitely, I think coronavirus has, in just the space of a few weeks, accelerated the entire ecommerce industry in South Africa by 4-5 years at least,\" Bottles\' co-founder and chief executive Vincent Viviers told the BBC.', 'Maura'),
(18, 'judul nih', '', '17 October 2020', 'konten', 'Maura Qoonitah'),
<<<<<<< HEAD
(19, 'sgs', '', '17 October 2020', 'fdbfrhsrhshsrhsh', 'Maura Qoonitah');
=======
(19, 'sgs', '', '17 October 2020', 'fdbfrhsrhshsrhsh', 'Maura Qoonitah'),
(20, 'judul nih bbbreritatatat', '', '30 October 2020', 'sfvsrgvrsegbregsgdgsgrdffcd', 'Fachry Muhammad');
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
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
(14, 'SIL', 'sil-icon2.png', 'home/aksesSIL', '                                                                                                                                                                                                                                                SIL Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!                                                                                                                                                                                                                                                '),
(15, 'Kimonev', 'kimonev-icon.png', 'https://kimonev.pamjaya.co.id/', 'kimonev Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(16, 'MAYA', 'maya-icon.png', 'http://203.161.27.194:3821/sim_aset/', 'maya Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(17, 'MONICA', 'monica-icon.png', 'https://monica.pamjaya.co.id/', 'monica Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
<<<<<<< HEAD
(51, 'femi ', 'cropped-logo-femi-300x288.png', 'https://www.instagram.com/', 'ini adalah aplikasi baru yaitu ini adalah aplikasi baru yaitu ini adalah aplikasi baru yaitu ini adalah aplikasi baru yaitu '),
(76, 'femi ', 'logo4.png', 'https://www.instagram.com/', 'Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk '),
=======
(51, 'femi festifal mipa', 'item_default.png', 'https://www.instagram.com/', '                                        ini adalah aplikasi baru yaitu ini adalah aplikasi baru yaitu ini adalah aplikasi baru yaitu ini adalah aplikasi baru yaitu                                         '),
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417
(77, 'pelangi matematika', 'item_default.png', 'https://www.instagram.com/', 'Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk Aplikasi untuk PelangiAplikasi untuk Aplikasi untuk Aplikasi ');

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
(1, 1, 1),
(2, 1, 2),
<<<<<<< HEAD
(3, 2, 2);
=======
(3, 2, 2),
(22, 2, 3),
(23, 1, 3),
(24, 1, 4),
(25, 2, 4);
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417

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
(1, 'Administrator'),
<<<<<<< HEAD
(2, 'User'),
(3, 'Menu');
=======
(2, 'Berita'),
(3, 'Aplikasi'),
(4, 'User');
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417

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
(2, 'Member');

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
(1, 1, 'Manage Akun', 'admin/Admin_manage_account', 'nav-icon fas fa-user-plus', 1),
<<<<<<< HEAD
(2, 2, 'My Profile', 'admin/Admin_profile_account', 'nav-icon fas fa-user', 1);
=======
(2, 2, 'Tambah Berita', 'admin/Admin_tambah_berita', 'nav-icon fas fa-newspaper\r\n', 1),
(3, 2, 'List Berita', 'admin/Admin_list_berita', 'far fa-dot-circle nav-icon', 1),
(18, 3, 'Tambah Aplikasi', 'admin/Admin_tambah_aplikasi', 'nav-icon fas fa-code', 1),
(19, 3, 'List Aplikasi', 'admin/Admin_list_aplikasi', 'far fa-dot-circle nav-icon', 1),
(20, 4, 'Dashboard', 'admin/Admin_home', 'nav-icon fas fa-laptop-house', 1);
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
>>>>>>> df13c92ee7a96c0e67a80065e5477068462f0417
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
