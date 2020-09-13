-- MySQL dump 10.13  Distrib 5.6.45, for Linux (x86_64)
--
-- Host: localhost    Database: portal_pam
-- ------------------------------------------------------
-- Server version	5.6.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `images` varchar(200) DEFAULT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_alias` varchar(255) NOT NULL DEFAULT '',
  `intro_text` mediumtext,
  `full_text` mediumtext,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT '0',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(50) NOT NULL DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `featured` tinyint(3) unsigned DEFAULT '0' COMMENT 'Set if article is featured.',
  `published` tinyint(1) DEFAULT '1' COMMENT 'Set if article is featured.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_alias` (`title_alias`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (5,'jasarenovasibogor.jpg\r\n','Tentang Kami','tentang-kami','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n',0,0,'2018-08-27 20:23:44','1','2018-08-30 18:24:07','1',5,0,1,1);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `title_alias` varchar(255) DEFAULT '',
  `id_kategori` int(11) DEFAULT NULL,
  `intro_text` mediumtext,
  `full_text` mediumtext,
  `tags` varchar(100) DEFAULT NULL,
  `img_ilustrasi` text,
  `ket_ilustrasi` text,
  `state` tinyint(3) DEFAULT '0',
  `catid` int(10) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT '0',
  `modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(50) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `hits` int(10) unsigned DEFAULT '0',
  `featured` tinyint(3) unsigned DEFAULT '1' COMMENT 'Set if article is featured.',
  `published` tinyint(1) DEFAULT '1' COMMENT 'Set if article is featured.',
  PRIMARY KEY (`id`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (24,'Asia-Pacific Nursing and Medicare Summit','asia-pacific-nursing-and-medicare-summit',2,'<p><a href=\"https://nursing.conferenceseries.com/asia-pacific/organizing-committee.php\">Nursing Innovations in Leading and Advancing Global Health</a></p>\r\n\r\n<div class=\"col-md-2\">\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:12px\">Konferensi keperawatan menawarkan peluang untuk menghadiri presentasi yang disampaikan oleh Eminent Experts dari seluruh dunia. Kami menyambut semua peneliti / praktisi untuk bergabung dengan kami di Osaka, Jepang.</span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:12px\">Bagi yang berminat mengikuti event Pacific Nursing and Medicare Summit di Osaka, Japan dapat langsung mengakses link web yang ada di bawah ini :</span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:12px\"><a href=\"https://nursing.conferenceseries.com/asia-pacific/organizing-committee.php\" style=\"color:blue; text-decoration:underline\" target=\"_blank\">https://nursing.conferenceseries.com/asia-pacific/organizing-committee.php</a></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"primary-links\">&nbsp;</div>\r\n\r\n<div class=\"clearfix conf-info-main\">\r\n<div class=\"col-md-2\">&nbsp;</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\">&nbsp;</p>\r\n',NULL,NULL,'nursing-asiapacific-2018-27570.gif\r\n',NULL,0,0,'2018-05-18 07:11:52','1','2018-05-19 04:35:04','1',24,0,0,1),(28,'International Conference on Nursing and Healthcare','international-conference-on-nursing-and-healthcare',2,'<p><a href=\"https://bioleagues.com/conference/nursing-healthcare/organizing-committee/\">Exploring Strategies for Improved Nursing Care</a></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">Konferensi Internasional ke-2 tentang Perawat dan Perawatan Kesehatan berbicara tentang profesi paling serba guna didunia. Keperawatan adalah salah satu profesi Nobel yang dihormati dan dihargai di seluruh dunia. Meskipun itu adalah profesi yang serba guna, dapat digambarkan sebagai profesi dalam sektor perawatan kesehatan yang berfokus pada perawatan individu, keluarga, dan masyarakat sehingga mereka dapat mencapai, mempertahankan , atau memulihkan kesehatan dan kualitas hidup yang optimal.</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-size:12.0pt\">Bagi yang berminat mengikuti event Organizing Committee Members di Bali, dapat langsung mengakses link web yang ada di bawah ini :</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in; text-align:justify\">https://bioleagues.com/conference/nursing-healthcare/organizing-committee/</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,NULL,'Nursing Science 2K18.jpg\r\n',NULL,0,0,'2018-05-19 04:21:50','1','2018-05-30 01:49:08','1',28,0,0,1);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galeri` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ordering` int(9) DEFAULT '0',
  `published` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (11,'0000-00-00 00:00:00','exam','DSC_1232.JPG\r\n',NULL,NULL,NULL,1),(12,'0000-00-00 00:00:00','coba','AlfrescoLogo.jpg\r\n',NULL,NULL,NULL,1),(13,'0000-00-00 00:00:00','contoh lagi','coba.jpg\r\n',NULL,NULL,NULL,1),(14,'0000-00-00 00:00:00','merinding','Screenshot_1.png\r\n',NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hak_akses`
--

DROP TABLE IF EXISTS `hak_akses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) DEFAULT NULL,
  `allow_deny` enum('ALLOW','DENY') DEFAULT NULL COMMENT 'combobox=''ALLOW''=>''ALLOW'',''DENY''=>''DENY''',
  `id_role` int(11) DEFAULT NULL COMMENT 'combobox=nama_role',
  `id_user` int(11) DEFAULT NULL COMMENT 'combobox=username',
  `action` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_m_hak_akses_s_role` (`id_role`),
  KEY `FK_m_hak_akses_m_user` (`id_user`),
  CONSTRAINT `hak_akses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `hak_akses_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hak_akses`
--

LOCK TABLES `hak_akses` WRITE;
/*!40000 ALTER TABLE `hak_akses` DISABLE KEYS */;
INSERT INTO `hak_akses` VALUES (3,'konfigurasi','DENY',2,NULL,'*'),(4,'user','DENY',2,NULL,'*'),(5,'menu','DENY',2,NULL,'*');
/*!40000 ALTER TABLE `hak_akses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jasa_banner`
--

DROP TABLE IF EXISTS `jasa_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jasa_banner` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text,
  `title2` text,
  `description` text,
  `description2` text,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT '0',
  `published` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jasa_banner`
--

LOCK TABLES `jasa_banner` WRITE;
/*!40000 ALTER TABLE `jasa_banner` DISABLE KEYS */;
INSERT INTO `jasa_banner` VALUES (11,'Bangun Rumah ',NULL,'Bangun rumah',NULL,'bangunrumah.jpg\r\n',NULL,NULL,1),(12,'Renovasi Rumah',NULL,'Renovasi Rumah',NULL,'renovasi.jpg\r\n',NULL,NULL,1),(13,'Perbaikan Rumah',NULL,'Perbaikan Rumah',NULL,'perbaikanrumah.jpg\r\n',NULL,NULL,1);
/*!40000 ALTER TABLE `jasa_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tgl` datetime NOT NULL,
  `oleh` varchar(50) NOT NULL,
  `halaman` varchar(50) NOT NULL,
  `aktivitas` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `content_id` int(10) DEFAULT NULL,
  `link` varchar(1024) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `level` int(10) unsigned NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `lft` int(10) unsigned NOT NULL,
  `rgt` int(10) unsigned NOT NULL,
  `root` int(10) unsigned NOT NULL,
  `ordering` int(10) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`),
  KEY `menutype` (`menutype`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `ordering` (`ordering`),
  KEY `published` (`published`)
) ENGINE=InnoDB AUTO_INCREMENT=504 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'','Root','Root',0,'',NULL,0,0,'3',4,1237,0,1,0),(45,'adminmenu','Atur User','atur-user',NULL,'index.php?go=user','',215,2,'1',366,367,0,45,0),(47,'adminmenu','Konten','menu-konten',NULL,'#','',1,1,'3',385,586,0,47,1),(49,'adminmenu','Atur Konten','atur-konten',NULL,'index.php?go=content','',47,2,'3',390,391,0,49,0),(50,'adminmenu','Atur Berita','atur-berita',NULL,'index.php?go=news',NULL,47,2,'3',392,393,0,50,1),(53,'adminmenu','Logout','logout',NULL,'index.php?go=user&do=logout','',1,1,'3',589,590,0,99,1),(54,'adminiconmenu','Kategori Produk','kategori-produk',NULL,'index.php?go=kategori_produk','Actions-view-list-tree-icon.png',1,1,'3',589,592,0,54,0),(66,'adminmenu','Vertical Main Menu','vertical-main-menu',NULL,'index.php?go=menu&tipe=verticalmainmenu',NULL,46,3,'3',355,356,0,66,0),(67,'verticalmainmenu','Filling Cabinet','filling-cabinet',NULL,'#',NULL,1,1,'3',621,642,0,67,1),(68,'verticalmainmenu','Mobile File','mobile-file',29,'mobile-file',NULL,67,2,'3',638,639,0,68,1),(69,'verticalmainmenu','Rotary','rotary',30,'rotary',NULL,67,2,'3',640,641,0,69,1),(76,'adminmenu','Atur Template','atur-template',NULL,'index.php?go=template',NULL,215,2,'1',364,365,0,76,0),(81,'adminmenu','Module Generator','module-generator',NULL,'index.php?go=generator',NULL,43,2,'3',372,373,0,81,0),(88,'adminmenu','Atur Product','atur-product',NULL,'index.php?go=product',NULL,47,2,'3',538,539,0,88,0),(90,'adminmenu','Atur Posisi Sidebar','atur-posisi-sidebar',NULL,'index.php?go=posisi',NULL,47,2,'3',542,543,0,46,0),(91,'adminmenu','Atur Sidebar','atur-sidebar',NULL,'index.php?go=sidebar','',47,2,'3',544,545,0,91,0),(92,'mainmenu','Home','home',NULL,'index.php',NULL,1,1,'3',679,680,0,92,1),(95,'adminmenu','Atur Kategori Produk','atur-kategori_produk',NULL,'index.php?go=kategori_produk',NULL,47,2,'3',548,549,0,0,0),(96,'adminmenu','Atur Daftar Pesanan','atur-pesanan',NULL,'index.php?go=pesanan',NULL,47,2,'3',550,551,0,0,0),(97,'adminiconmenu','Daftar Pesanan','daftar-pesanan',NULL,'index.php?go=pesanan',NULL,1,1,'3',699,700,0,97,0),(98,'adminmenu','Atur Status Pesanan','atur-status_pesanan',NULL,'index.php?go=status_pesanan',NULL,47,2,'3',552,553,0,0,0),(101,'adminmenu','Atur Chat Messenger','atur-chat-messenger',NULL,'index.php?go=messenger',NULL,47,2,'3',562,563,0,101,0),(103,'adminmenu','Atur Testimoni','atur-testimoni',NULL,'index.php?go=testimoni',NULL,47,2,'3',566,567,0,103,0),(105,'verticalmainmenu','Management Arsip','management-arsip',25,'management-arsip',NULL,65,2,'3',610,611,0,105,1),(106,'verticalmainmenu','Notaris','notaris',26,'notaris',NULL,65,2,'3',612,613,0,106,1),(107,'verticalmainmenu','Koreksi Ujian','koreksi-ujian',27,'koreksi-ujian',NULL,65,2,'3',614,617,0,107,1),(108,'verticalmainmenu','Security & Monitoring System','security-&-monitoring-system',NULL,'#',NULL,1,1,'3',705,716,0,108,1),(109,'verticalmainmenu','RFID Tag & Label','rfid-tag-&-label',33,'rfid-tag-&-label',NULL,108,2,'3',706,707,0,109,1),(110,'verticalmainmenu','RFID Writer & Reader','rfid-writer-&-reader',34,'rfid-writer-&-reader',NULL,108,2,'3',708,709,0,110,1),(111,'verticalmainmenu','RFID Handheld','rfid-handheld',35,'rfid-handheld',NULL,108,2,'3',710,711,0,111,1),(112,'verticalmainmenu','RFID Gate','rfid-gate',36,'rfid-gate',NULL,108,2,'3',712,713,0,112,1),(113,'verticalmainmenu','CCTV','cctv',37,'cctv',NULL,108,2,'3',714,715,0,113,1),(115,'verticalmainmenu','Rekam Medik','rekam-medik',28,'rekam-medik',NULL,65,2,'3',618,619,0,115,1),(116,'verticalmainmenu','Cetak Kertas LJK','cetak-kertas-ljk',31,'cetak-kertas-ljk',NULL,70,2,'3',678,679,0,116,1),(117,'verticalmainmenu','Koreksi Ujian LJK','koreksi-ujian-ljk',32,'koreksi-ujian-ljk',NULL,70,2,'3',680,681,0,117,1),(118,'adminmenu','Scanner Vertical Menu','scanner-vertical-menu',NULL,'index.php?go=menu&tipe=scannermainmenu',NULL,46,3,'3',357,368,0,118,0),(119,'scannermainmenu','Canon','canon',NULL,'product/canon/index.html',NULL,1,1,'3',719,726,0,119,1),(120,'scannermainmenu','A4/F4','canon-a4/f4',NULL,'product/canon/a4/index.html',NULL,119,2,'3',720,721,0,120,1),(121,'scannermainmenu','A3','canon-a3',NULL,'product/canon/a3/index.html',NULL,119,2,'3',722,723,0,121,1),(122,'scannermainmenu','A0','canon-a0',NULL,'product/canon/a0/index.html',NULL,119,2,'3',724,725,0,122,1),(123,'scannermainmenu','Panasonic','panasonic',NULL,'product/panasonic/index.html',NULL,1,1,'3',727,742,0,123,1),(129,'scannermainmenu','A4/F4','panasonic-a4',NULL,'product/panasonic/a4/index.html',NULL,123,2,'3',736,737,0,129,1),(130,'scannermainmenu','A3','panasonic-a3',NULL,'product/panasonic/a3/index.html',NULL,123,2,'3',738,739,0,130,1),(131,'scannermainmenu','A0','panasonic-a0',NULL,'product/panasonic/a0/index.html',NULL,123,2,'3',740,741,0,131,1),(132,'scannermainmenu','Kodak','kodak',NULL,'product/kodak/index.html',NULL,1,1,'3',745,754,0,132,1),(133,'scannermainmenu','A4/F4','kodak-a4',NULL,'product/kodak/a4/index.html',NULL,132,2,'3',746,747,0,133,1),(135,'scannermainmenu','A3','kodak-a3',NULL,'product/kodak/a3/index.html',NULL,132,2,'3',750,751,0,135,1),(136,'scannermainmenu','A0','kodak-a0',NULL,'product/kodak/a0/index.html',NULL,132,2,'3',752,753,0,136,1),(137,'scannermainmenu','Fujitsu','fujitsu',NULL,'product/fujitsu/index.html',NULL,1,1,'3',759,766,0,137,1),(138,'scannermainmenu','Avision','avision',NULL,'product/avision/index.html',NULL,1,1,'3',767,774,0,138,1),(139,'scannermainmenu','FujiXerox','fujixerox',NULL,'product/fujixerox/index.html',NULL,1,1,'3',755,758,0,139,1),(140,'scannermainmenu','HP','hp',NULL,'product/hp/index.html',NULL,1,1,'3',775,782,0,140,1),(141,'scannermainmenu','Plustek','plustek',NULL,'product/plustek/index.html',NULL,1,1,'3',783,790,0,141,1),(142,'scannermainmenu','A4/F4','fujitsu-a4/f4',NULL,'product/fujitsu/a4/index.html',NULL,137,2,'3',760,761,0,142,1),(143,'scannermainmenu','A3','fujitsu-a3',NULL,'product/fujitsu/a3/index.html',NULL,137,2,'3',762,763,0,143,1),(144,'scannermainmenu','A4/F4','avision-a4',NULL,'product/avision/a4/index.html',NULL,138,2,'3',768,769,0,144,1),(145,'scannermainmenu','A0','fujitsu-a0',NULL,'product/fujitsu/a0/index.html',NULL,137,2,'3',764,765,0,145,1),(146,'scannermainmenu','A3','avision-a3',NULL,'product/avision/a3/index.html',NULL,138,2,'3',770,771,0,146,1),(147,'scannermainmenu','A0','avision-a0',NULL,'product/avision/a0/index.html',NULL,138,2,'3',772,773,0,147,1),(148,'scannermainmenu','A4/F4','hp-a4/f4',NULL,'product/hp/a4/index.html',NULL,140,2,'3',776,777,0,148,1),(149,'scannermainmenu','A3','hp-a3',NULL,'product/hp/a3/index.html',NULL,140,2,'3',778,779,0,149,1),(150,'scannermainmenu','A0','hp-a0',NULL,'product/hp/a0/index.html',NULL,140,2,'3',780,781,0,150,1),(151,'scannermainmenu','A4/F4','plustek-a4',NULL,'product/plustek/a4/index.html',NULL,141,2,'3',784,785,0,151,1),(152,'scannermainmenu','A3','plustek-a3',NULL,'product/plustek/a3/index.html',NULL,141,2,'3',786,787,0,152,1),(153,'scannermainmenu','A0','plustek-a0',NULL,'product/plustek/a0/index.html',NULL,141,2,'3',788,789,0,153,1),(154,'scannermainmenu','A3','fujixerox-a3',NULL,'product/fujixerox/a3/index.html',NULL,139,2,'3',756,757,0,154,1),(169,'adminmenu','Atur konfigurasi website','atur-konfigurasi-website',NULL,'index.php?go=konfigurasi',NULL,215,2,'1',358,359,0,169,1),(170,'adminiconmenu','Atur konten web','atur-konten-web',NULL,'index.php?go=content','webpage.png',1,1,'3',811,812,0,170,0),(173,'adminiconmenu','Atur Image Slider','atur-image-slider',NULL,'index.php?go=slider','Apps-preferences-desktop-wallpaper-icon.png',1,1,'3',817,818,0,173,0),(175,'adminmenu','Atur youtube video','atur-youtube-video',NULL,'index.php?go=video',NULL,47,2,'3',570,571,0,175,0),(176,'adminiconmenu','Atur Berita (news)','atur-berita-(news)',NULL,'index.php?go=news','news-icon.png',1,1,'3',821,822,0,176,0),(192,'mainmenu','Renovasi Rumah','renovasi-rumah',NULL,'#',NULL,1,1,'3',837,876,0,192,1),(197,'adminmenu','atur Portal','atur-portal',NULL,'index.php?go=galeri',NULL,47,2,'3',572,573,0,197,1),(200,'adminmenu','Atur Event','atur-event',NULL,'index.php?go=event',NULL,47,2,'3',574,575,0,200,0),(215,'adminmenu','Sistem','sistem',NULL,'#',NULL,1,1,'3',333,368,0,43,0),(221,'adminmenu','Home','admin-home',NULL,NULL,NULL,1,1,'3',329,330,0,42,1),(222,'adminmenu','Atur Menu','atur-menu',NULL,'index.php?go=menu&tipe=adminmenu',NULL,215,2,'1',360,361,0,222,0),(223,'adminmenu','Atur Role','atur-role',NULL,'index.php?go=role',NULL,215,2,'1',362,363,0,223,0),(257,'mainmenu','Bangun Rumah','bangun-rumah',NULL,'jasa-bangun-rumah',NULL,1,1,'3',1001,1018,0,257,0),(405,'mainmenu','Galeri','galeri',NULL,'modul/gallery',NULL,1,1,'3',1139,1164,0,405,1),(426,'mainmenu','Berita','berita',NULL,'modul/news-all',NULL,1,1,'3',1171,1206,0,426,1),(498,'mainmenu','Tentang Kami','tentang-kami',NULL,'tentang-kami',NULL,1,1,NULL,1231,1232,0,498,1),(499,'mainmenu','Kontak','kontak',NULL,'modul/contact',NULL,1,1,NULL,1233,1234,0,499,1),(500,'mainmenu','biaya rumah','biaya-rumah',NULL,NULL,NULL,192,2,NULL,870,871,0,500,1),(503,'mainmenu','Rumah Tingkat','rumah-tingkat',NULL,NULL,NULL,192,2,'3',874,875,0,503,1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_role`
--

DROP TABLE IF EXISTS `menu_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(50) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_role`
--

LOCK TABLES `menu_role` WRITE;
/*!40000 ALTER TABLE `menu_role` DISABLE KEYS */;
INSERT INTO `menu_role` VALUES (1,'administrator',1,1),(2,'manager',2,1),(3,'Tampil semua',3,1);
/*!40000 ALTER TABLE `menu_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_tipe`
--

DROP TABLE IF EXISTS `menu_tipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(100) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_tipe`
--

LOCK TABLES `menu_tipe` WRITE;
/*!40000 ALTER TABLE `menu_tipe` DISABLE KEYS */;
INSERT INTO `menu_tipe` VALUES (1,'adminmenu','Admin Menu'),(2,'adminiconmenu','Admin Icon Menu'),(3,'mainmenu','Main Menu (Front)'),(4,'verticalmainmenu','Vertical Main Menu (Front)');
/*!40000 ALTER TABLE `menu_tipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger`
--

DROP TABLE IF EXISTS `messenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ymuser` char(50) NOT NULL,
  `nmuser` char(50) NOT NULL DEFAULT '<nama>',
  `ordering` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger`
--

LOCK TABLES `messenger` WRITE;
/*!40000 ALTER TABLE `messenger` DISABLE KEYS */;
INSERT INTO `messenger` VALUES (6,'smscaesar','Caesar',6,'2013-07-11 16:22:07',1),(7,'marketing_scanner1','Fera',7,'2014-01-09 15:34:09',0),(8,'gdscanner','Fera',7,'2014-05-12 16:08:36',1);
/*!40000 ALTER TABLE `messenger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `title_alias` varchar(255) DEFAULT '',
  `id_kategori` int(11) DEFAULT NULL,
  `intro_text` mediumtext,
  `full_text` mediumtext,
  `tags` varchar(100) DEFAULT NULL,
  `img_ilustrasi` text,
  `ket_ilustrasi` text,
  `state` tinyint(3) DEFAULT '0',
  `catid` int(10) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT '0',
  `modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(50) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `hits` int(10) unsigned DEFAULT '0',
  `featured` tinyint(3) unsigned DEFAULT '1' COMMENT 'Set if article is featured.',
  `published` tinyint(1) DEFAULT '1' COMMENT 'Set if article is featured.',
  PRIMARY KEY (`id`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_featured_catid` (`featured`,`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (28,'berkas pam','berkas-pam',2,'<p>Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan</p>\r\n','<p>Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak</p>\r\n',NULL,'DSC_1229.JPG\r\n',NULL,0,0,'2019-06-20 03:11:28','1','2019-09-24 06:40:25','1',28,0,1,0),(29,'Terbaru','terbaru',2,'<p>Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan</p>\r\n','<p>Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatka</p>\r\n',NULL,'pamjaya-logo.png\r\n',NULL,0,0,'2019-06-20 03:14:35','1','2019-09-24 11:40:15','1',29,0,1,1),(33,'ini berita','ini-berita',3,'<p>Lorem ipsum is a placeholder text commonly used to demonstrate the visual</p>\r\n','<p>Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document without relying on meaningful content. Replacing the actual content with placeholder text allows designers to design the form of the content before the content itself has been produced</p>\r\n',NULL,'rumah (3).jpg',NULL,0,0,'2019-06-21 08:39:08','1','2019-09-24 10:52:10','1',33,0,1,1),(34,'Portal Pamjaya','portal-pamjaya',2,'<p>Selamat datang di Portal Pamjaya ..</p>\r\n','<p>Portal Pamjaya merupakan antar muka untuk aplikasi yang dipergunakan, sarana untuk menganti email dan memberikan pengumuman kepada pengguna aplikasi Pamjaya</p>\r\n',NULL,NULL,NULL,0,0,'2019-09-24 06:44:04','1','2019-09-24 10:50:01','1',34,0,0,1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_category`
--

DROP TABLE IF EXISTS `news_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_category` varchar(255) DEFAULT NULL,
  `nama_category_alias` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `level` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rgt` int(10) unsigned DEFAULT NULL,
  `root` int(10) unsigned DEFAULT '0',
  `ordering` int(10) unsigned DEFAULT NULL,
  `published` tinyint(1) unsigned DEFAULT '1',
  `source` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_category_alias` (`nama_category_alias`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`),
  KEY `ordering` (`ordering`),
  KEY `published` (`published`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_category`
--

LOCK TABLES `news_category` WRITE;
/*!40000 ALTER TABLE `news_category` DISABLE KEYS */;
INSERT INTO `news_category` VALUES (1,'Root','root',NULL,0,0,1,70,1,1,1,NULL),(2,'popular','popular',NULL,1,1,2,3,0,2,1,'Brilio.net'),(3,'news','news',NULL,1,1,4,5,0,3,1,'Brilio.net');
/*!40000 ALTER TABLE `news_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_hits`
--

DROP TABLE IF EXISTS `news_hits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_hits` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(50) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=997 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_hits`
--

LOCK TABLES `news_hits` WRITE;
/*!40000 ALTER TABLE `news_hits` DISABLE KEYS */;
INSERT INTO `news_hits` VALUES (1,3,'192.168.1.101','2014-09-01 17:12:13'),(2,3,'192.168.1.101','2014-09-01 17:30:48'),(3,2,'192.168.1.101','2014-09-01 17:32:03'),(4,3,'192.168.1.101','2014-09-01 17:42:55'),(5,3,'120.168.1.91','2014-09-30 17:57:12'),(6,3,'173.252.74.114','2014-09-30 17:57:22'),(7,4,'localhost','2014-11-15 14:58:53'),(8,4,'localhost','2014-11-15 15:44:40'),(9,4,'localhost','2014-11-15 15:51:03'),(10,4,'localhost','2014-11-15 15:52:45'),(11,4,'localhost','2014-11-15 15:54:18'),(12,4,'localhost','2014-11-15 15:54:27'),(13,4,'localhost','2014-11-15 15:54:50'),(14,4,'localhost','2014-11-15 15:55:07'),(15,4,'localhost','2014-11-15 15:55:24'),(16,4,'localhost','2014-11-17 10:08:52'),(17,4,'192.168.1.10','2014-11-17 10:29:57'),(18,4,'192.168.1.10','2014-11-17 10:30:22'),(19,4,'36.78.18.104','2014-11-19 16:07:40'),(20,4,'173.252.112.119','2014-11-19 16:07:43'),(21,4,'202.137.11.83','2014-11-20 08:47:05'),(22,4,'173.252.110.118','2014-11-20 08:47:53'),(23,4,'114.124.31.43','2014-11-21 09:34:02'),(24,4,'39.250.29.29','2014-11-21 19:33:25'),(25,4,'157.55.39.194','2014-11-27 17:26:06'),(26,4,'157.55.39.250','2014-12-01 22:42:38'),(27,4,'39.253.99.178','2014-12-02 13:28:00'),(28,4,'173.252.112.112','2014-12-02 13:28:06'),(29,4,'39.253.99.178','2014-12-02 13:53:14'),(30,4,'39.253.99.178','2014-12-02 13:53:40'),(31,4,'36.78.18.104','2014-12-03 09:46:12'),(32,4,'157.55.252.30','2014-12-03 09:46:37'),(33,4,'36.78.18.104','2014-12-03 09:47:51'),(34,4,'36.78.18.104','2014-12-03 09:50:23'),(35,4,'36.78.18.104','2014-12-03 09:51:14'),(36,4,'36.78.18.104','2014-12-03 09:56:42'),(37,4,'36.78.18.104','2014-12-03 10:55:37'),(38,4,'36.78.18.104','2014-12-03 11:37:31'),(39,4,'36.78.18.104','2014-12-03 11:38:47'),(40,4,'36.78.18.104','2014-12-03 11:39:16'),(41,4,'36.78.18.104','2014-12-03 11:39:59'),(42,4,'36.78.18.104','2014-12-03 11:40:00'),(43,4,'localhost','2014-12-03 11:41:57'),(44,4,'localhost','2014-12-03 11:42:43'),(45,4,'localhost','2014-12-03 11:52:18'),(46,4,'localhost','2014-12-03 11:52:51'),(47,4,'localhost','2014-12-03 11:59:00'),(48,4,'36.78.18.104','2014-12-03 12:00:31'),(49,4,'36.78.18.104','2014-12-03 12:54:27'),(50,4,'114.124.0.167','2014-12-04 21:08:48'),(51,4,'114.124.0.167','2014-12-04 21:11:05'),(52,4,'120.164.43.247','2014-12-05 15:42:30'),(53,4,'157.55.39.210','2014-12-05 17:11:30'),(54,4,'180.245.85.61','2014-12-05 18:07:34'),(55,4,'180.245.85.61','2014-12-05 18:08:40'),(56,4,'180.214.232.28','2014-12-06 21:20:20'),(57,4,'36.78.18.104','2014-12-08 09:50:02'),(58,4,'157.55.39.129','2014-12-10 05:16:06'),(59,4,'36.78.18.104','2014-12-15 14:40:24'),(60,4,'173.252.112.114','2014-12-15 14:40:33'),(61,4,'66.249.69.145','2014-12-16 05:25:12'),(62,4,'114.121.129.103','2014-12-18 11:48:28'),(63,6,'66.249.69.129','2014-12-25 10:15:40'),(64,4,'38.99.82.191','2014-12-25 18:16:59'),(65,4,'66.249.69.113','2014-12-26 09:22:31'),(66,4,'188.165.15.224','2014-12-27 06:03:39'),(67,6,'188.165.15.233','2014-12-27 23:55:14'),(68,4,'66.249.69.113','2014-12-28 00:16:13'),(69,4,'173.252.74.112','2014-12-28 00:23:04'),(70,4,'66.249.69.113','2014-12-29 05:03:11'),(71,4,'66.249.69.129','2015-01-03 10:45:28'),(72,6,'36.70.178.66','2015-01-03 22:15:46'),(73,6,'173.252.88.183','2015-01-03 22:15:49'),(74,4,'36.70.178.66','2015-01-03 23:05:15'),(75,4,'36.70.178.66','2015-01-03 23:29:55'),(76,4,'223.255.230.56','2015-01-06 10:36:44'),(77,4,'180.244.184.62','2015-01-07 21:13:10'),(78,4,'50.31.96.7','2015-01-10 11:56:24'),(79,4,'50.31.96.7','2015-01-10 11:56:24'),(80,6,'50.31.96.7','2015-01-10 11:57:01'),(81,6,'50.31.96.7','2015-01-10 11:57:03'),(82,6,'180.245.82.213','2015-01-10 13:48:03'),(83,4,'188.165.15.121','2015-01-11 19:25:50'),(84,6,'114.124.5.129','2015-01-13 21:01:33'),(85,4,'114.4.21.145','2015-01-14 12:38:05'),(86,4,'114.4.21.145','2015-01-14 12:40:32'),(87,4,'202.73.224.142','2015-01-14 14:01:39'),(88,6,'114.79.1.146','2015-01-14 22:21:48'),(89,4,'114.79.1.146','2015-01-14 22:23:51'),(90,4,'66.249.69.113','2015-01-15 01:12:33'),(91,6,'66.249.69.145','2015-01-17 20:56:15'),(92,4,'180.76.6.54','2015-01-19 07:42:36'),(93,6,'203.160.56.76','2015-01-19 10:23:38'),(94,6,'31.13.102.123','2015-01-19 10:23:42'),(95,6,'203.160.56.76','2015-01-19 10:23:42'),(96,4,'203.160.56.76','2015-01-19 10:23:43'),(97,4,'31.13.102.120','2015-01-19 10:23:49'),(98,6,'223.255.230.236','2015-01-23 20:11:47'),(99,6,'188.165.15.202','2015-01-27 06:43:54'),(100,4,'82.80.249.169','2015-01-27 11:59:47'),(101,6,'82.80.249.169','2015-01-27 12:00:23'),(102,4,'223.255.230.53','2015-01-28 11:50:43'),(103,4,'66.220.152.119','2015-01-28 11:50:55'),(104,4,'180.251.193.81','2015-01-28 17:01:03'),(105,4,'66.249.65.138','2015-01-29 19:10:58'),(106,4,'66.249.65.142','2015-01-30 02:55:15'),(107,6,'180.76.6.146','2015-01-30 12:21:26'),(108,6,'36.71.206.151','2015-01-31 18:02:22'),(109,6,'66.220.156.117','2015-01-31 18:02:28'),(110,4,'114.79.12.162','2015-02-01 19:17:43'),(111,4,'114.79.12.162','2015-02-01 19:17:43'),(112,6,'66.249.79.153','2015-02-02 19:17:53'),(113,6,'66.249.79.2','2015-02-03 17:11:26'),(114,4,'157.55.39.183','2015-02-04 15:48:02'),(115,4,'157.55.39.183','2015-02-06 14:17:29'),(116,6,'157.55.39.184','2015-02-06 23:47:47'),(117,4,'180.244.140.40','2015-02-07 17:11:15'),(118,4,'66.220.158.112','2015-02-07 17:12:05'),(119,6,'114.79.2.13','2015-02-08 17:32:28'),(120,4,'188.165.15.203','2015-02-08 20:51:08'),(121,4,'180.76.5.94','2015-02-12 08:03:58'),(122,6,'157.55.39.183','2015-02-13 14:40:16'),(123,7,'localhost','2015-03-02 17:21:21'),(124,7,'localhost','2015-03-02 17:22:55'),(125,7,'localhost','2015-03-02 17:23:57'),(126,7,'localhost','2015-03-02 17:48:41'),(127,7,'localhost','2015-03-03 13:01:23'),(128,7,'localhost','2015-03-03 14:14:06'),(129,7,'localhost','2015-03-03 15:05:15'),(130,7,'localhost','2015-03-03 15:13:12'),(131,8,'localhost','2015-03-03 16:18:35'),(132,8,'localhost','2015-03-03 16:19:41'),(133,8,'localhost','2015-03-03 16:20:44'),(134,8,'localhost','2015-03-03 16:21:04'),(135,8,'localhost','2015-03-03 16:21:36'),(136,8,'localhost','2015-03-03 16:22:21'),(137,8,'localhost','2015-03-03 16:22:48'),(138,8,'localhost','2015-03-03 16:24:51'),(139,8,'localhost','2015-03-03 16:24:55'),(140,8,'localhost','2015-03-03 16:30:54'),(141,8,'localhost','2015-03-03 16:31:38'),(142,9,'localhost','2015-03-05 17:41:59'),(143,8,'localhost','2015-03-05 17:42:11'),(144,9,'localhost','2015-04-21 19:17:45'),(145,9,'localhost','2015-04-22 10:22:50'),(146,9,'localhost','2015-04-22 10:25:11'),(147,9,'180.243.15.201','2015-04-22 13:40:26'),(148,8,'114.124.39.20','2015-05-08 07:17:31'),(149,8,'173.252.112.116','2015-05-08 07:17:38'),(150,8,'68.180.228.238','2015-05-08 12:00:59'),(151,9,'68.180.228.238','2015-05-08 12:01:59'),(152,9,'199.21.99.216','2015-05-09 02:02:28'),(153,8,'100.43.81.149','2015-05-09 04:13:02'),(154,8,'148.251.124.173','2015-05-10 06:10:19'),(155,9,'148.251.124.173','2015-05-10 06:10:23'),(156,8,'148.251.183.105','2015-05-10 17:06:38'),(157,9,'148.251.183.105','2015-05-10 17:06:57'),(158,9,'66.249.79.130','2015-05-12 06:54:00'),(159,9,'66.220.146.26','2015-05-12 06:54:13'),(160,8,'180.76.6.63','2015-05-13 04:22:43'),(161,9,'66.249.79.143','2015-05-13 04:49:55'),(162,8,'66.249.79.130','2015-05-13 08:32:46'),(163,8,'114.121.155.177','2015-05-13 08:49:25'),(164,9,'39.252.205.254','2015-05-14 07:13:20'),(165,8,'66.249.79.130','2015-05-14 07:23:41'),(166,9,'180.76.5.76','2015-05-14 08:27:05'),(167,9,'72.233.72.155','2015-05-15 11:57:12'),(168,8,'72.233.72.155','2015-05-15 11:57:13'),(169,9,'116.24.17.159','2015-05-16 02:38:18'),(170,8,'116.24.17.159','2015-05-16 02:38:18'),(171,8,'62.212.73.211','2015-05-16 16:53:36'),(172,9,'62.212.73.211','2015-05-16 16:53:38'),(173,10,'180.243.8.241','2015-05-20 10:46:00'),(174,10,'173.252.112.117','2015-05-20 10:46:07'),(175,10,'180.243.8.241','2015-05-20 12:34:31'),(176,10,'66.220.146.21','2015-05-20 12:34:37'),(177,10,'89.45.206.88','2015-05-20 14:43:32'),(178,9,'89.45.206.88','2015-05-20 14:43:34'),(179,8,'89.45.206.88','2015-05-20 14:43:35'),(180,10,'180.243.8.241','2015-05-20 17:12:23'),(181,10,'173.252.112.112','2015-05-20 17:12:25'),(182,10,'180.243.8.241','2015-05-20 17:13:17'),(183,10,'100.43.81.149','2015-05-21 05:09:13'),(184,8,'100.43.81.149','2015-05-21 05:09:18'),(185,9,'100.43.91.24','2015-05-21 05:47:26'),(186,10,'180.243.2.127','2015-05-21 08:48:33'),(187,8,'157.55.39.79','2015-05-22 03:42:29'),(188,9,'157.55.39.1','2015-05-22 03:42:40'),(189,10,'100.43.81.149','2015-05-22 07:41:37'),(190,10,'100.43.91.24','2015-05-22 07:54:45'),(191,10,'136.243.5.219','2015-05-22 12:34:51'),(192,10,'136.243.5.219','2015-05-22 12:35:25'),(193,8,'136.243.5.219','2015-05-22 12:35:29'),(194,9,'136.243.5.219','2015-05-22 12:35:38'),(195,8,'66.249.79.156','2015-05-22 16:09:29'),(196,8,'68.180.228.238','2015-05-22 20:46:26'),(197,8,'180.214.232.12','2015-05-22 23:56:30'),(198,8,'173.252.100.115','2015-05-22 23:56:38'),(199,8,'114.79.47.9','2015-05-23 15:26:11'),(200,8,'114.79.47.9','2015-05-23 15:28:18'),(201,8,'66.249.90.53','2015-05-23 15:28:23'),(202,9,'68.180.228.238','2015-05-24 08:27:43'),(203,10,'unknown','2015-05-25 09:27:15'),(204,8,'unknown','2015-05-25 09:27:23'),(205,9,'unknown','2015-05-25 09:27:27'),(206,10,'180.76.15.154','2015-05-25 13:47:41'),(207,10,'66.249.65.100','2015-05-25 22:42:39'),(208,10,'68.180.228.238','2015-05-26 03:43:12'),(209,10,'180.76.15.137','2015-05-26 07:55:47'),(210,10,'66.249.65.103','2015-05-29 15:50:28'),(211,8,'37.187.142.28','2015-05-29 17:40:30'),(212,9,'37.187.142.28','2015-05-29 17:40:36'),(213,10,'180.76.15.154','2015-05-29 20:28:24'),(214,8,'220.181.108.118','2015-05-30 00:50:43'),(215,10,'123.125.71.107','2015-05-30 00:52:57'),(216,9,'220.181.108.179','2015-05-30 00:55:10'),(217,10,'123.125.71.42','2015-05-30 00:57:24'),(218,10,'68.180.228.172','2015-05-30 08:08:25'),(219,9,'68.180.228.172','2015-05-30 08:08:34'),(220,8,'68.180.228.172','2015-05-30 08:12:38'),(221,10,'128.187.97.21','2015-05-30 08:13:19'),(222,9,'128.187.97.21','2015-05-30 08:13:19'),(223,8,'128.187.97.21','2015-05-30 08:13:19'),(224,9,'100.43.85.29','2015-05-30 16:50:57'),(225,8,'100.43.81.149','2015-05-30 19:34:39'),(226,10,'180.76.15.14','2015-05-30 20:14:20'),(227,10,'151.80.31.152','2015-05-31 23:11:37'),(228,8,'151.80.31.152','2015-06-01 03:25:31'),(229,9,'66.249.73.210','2015-06-01 15:46:51'),(230,8,'66.249.73.218','2015-06-01 15:46:53'),(231,10,'66.249.73.218','2015-06-01 15:46:53'),(232,9,'173.252.74.119','2015-06-01 15:47:12'),(233,8,'173.252.74.112','2015-06-01 15:47:12'),(234,10,'173.252.74.117','2015-06-01 15:47:17'),(235,10,'148.251.236.167','2015-06-01 23:56:00'),(236,9,'148.251.236.167','2015-06-01 23:56:03'),(237,8,'148.251.236.167','2015-06-01 23:56:04'),(238,10,'5.9.98.130','2015-06-02 00:14:51'),(239,9,'5.9.98.130','2015-06-02 00:14:54'),(240,8,'5.9.98.130','2015-06-02 00:14:57'),(241,9,'66.249.73.218','2015-06-02 06:08:41'),(242,10,'66.249.73.210','2015-06-02 07:10:17'),(243,8,'123.125.71.51','2015-06-02 08:36:19'),(244,8,'66.249.73.202','2015-06-02 09:04:25'),(245,8,'114.125.175.192','2015-06-02 17:44:24'),(246,10,'151.80.31.152','2015-06-03 12:05:05'),(247,8,'151.80.31.152','2015-06-03 14:13:04'),(248,10,'81.144.138.34','2015-06-04 08:17:41'),(249,9,'81.144.138.34','2015-06-04 08:18:00'),(250,8,'81.144.138.34','2015-06-04 08:18:08'),(251,10,'123.125.71.106','2015-06-05 04:25:17'),(252,10,'151.80.31.154','2015-06-05 06:10:38'),(253,10,'202.125.94.18','2015-06-05 10:32:26'),(254,9,'180.76.15.10','2015-06-06 05:55:31'),(255,8,'180.76.15.28','2015-06-06 21:31:11'),(256,8,'151.80.31.150','2015-06-06 22:17:07'),(257,8,'151.80.31.150','2015-06-06 23:48:39'),(258,10,'151.80.31.150','2015-06-07 00:17:20'),(259,10,'157.55.39.8','2015-06-07 03:03:02'),(260,9,'66.249.65.17','2015-06-07 06:02:06'),(261,9,'173.252.74.119','2015-06-07 06:02:32'),(262,9,'180.76.15.140','2015-06-07 18:03:56'),(263,8,'157.55.39.125','2015-06-08 17:16:46'),(264,10,'157.55.39.125','2015-06-08 17:16:46'),(265,9,'207.46.13.94','2015-06-08 17:17:09'),(266,10,'123.125.71.49','2015-06-11 02:35:02'),(267,10,'100.43.91.24','2015-06-11 21:11:33'),(268,10,'157.55.39.141','2015-06-12 01:19:06'),(269,9,'100.43.81.149','2015-06-12 02:41:15'),(270,8,'100.43.91.24','2015-06-12 04:16:28'),(271,10,'81.19.188.229','2015-06-12 16:21:31'),(272,9,'81.19.188.229','2015-06-12 16:21:32'),(273,8,'81.19.188.229','2015-06-12 16:21:32'),(274,10,'100.43.81.149','2015-06-12 20:35:07'),(275,8,'100.43.81.149','2015-06-13 03:29:07'),(276,10,'100.43.81.149','2015-06-13 06:20:18'),(277,10,'157.55.39.4','2015-06-13 10:13:54'),(278,9,'157.55.39.4','2015-06-13 10:13:54'),(279,8,'157.55.39.107','2015-06-13 10:13:58'),(280,9,'207.46.13.29','2015-06-13 16:31:43'),(281,8,'157.55.39.4','2015-06-13 16:31:47'),(282,10,'157.55.39.4','2015-06-13 16:37:13'),(283,9,'157.55.39.42','2015-06-13 21:55:46'),(284,10,'157.55.39.32','2015-06-14 01:44:08'),(285,8,'157.55.39.32','2015-06-14 02:08:35'),(286,8,'157.55.39.4','2015-06-14 04:17:06'),(287,8,'68.180.228.238','2015-06-15 07:33:11'),(288,8,'207.46.13.29','2015-06-15 08:48:44'),(289,9,'157.55.39.42','2015-06-15 08:48:54'),(290,10,'157.55.39.98','2015-06-15 08:48:59'),(291,9,'68.180.228.238','2015-06-15 18:14:27'),(292,8,'68.180.228.238','2015-06-15 21:07:08'),(293,9,'68.180.228.238','2015-06-16 02:32:08'),(294,8,'66.249.79.60','2015-06-16 18:13:01'),(295,8,'68.180.228.238','2015-06-16 21:34:20'),(296,9,'68.180.228.238','2015-06-17 02:23:21'),(297,8,'68.180.228.238','2015-06-19 02:10:23'),(298,9,'68.180.228.238','2015-06-19 09:06:42'),(299,9,'66.249.79.156','2015-06-20 00:28:42'),(300,9,'68.180.228.238','2015-06-20 13:03:14'),(301,10,'207.46.13.30','2015-06-21 01:26:53'),(302,8,'207.46.13.30','2015-06-21 01:26:53'),(303,10,'157.55.39.255','2015-06-21 01:27:05'),(304,8,'68.180.228.238','2015-06-21 02:51:37'),(305,9,'68.180.228.238','2015-06-21 13:00:18'),(306,8,'68.180.228.238','2015-06-22 06:16:32'),(307,9,'68.180.228.238','2015-06-22 10:32:12'),(308,10,'unknown','2015-06-22 12:18:31'),(309,8,'unknown','2015-06-22 12:18:40'),(310,9,'unknown','2015-06-22 12:18:43'),(311,9,'68.180.228.238','2015-06-22 13:36:09'),(312,9,'173.252.74.113','2015-06-22 15:49:41'),(313,8,'68.180.228.238','2015-06-23 14:28:11'),(314,9,'68.180.228.238','2015-06-23 15:21:04'),(315,10,'91.121.135.13','2015-06-24 11:58:38'),(316,11,'91.121.135.13','2015-06-24 11:58:44'),(317,9,'91.121.135.13','2015-06-24 11:59:11'),(318,8,'68.180.228.238','2015-06-25 02:16:20'),(319,11,'198.245.62.10','2015-06-25 06:51:03'),(320,11,'198.245.62.10','2015-06-25 06:51:14'),(321,11,'220.181.108.120','2015-06-25 07:41:12'),(322,10,'220.181.108.162','2015-06-25 10:01:59'),(323,11,'195.154.163.175','2015-06-25 16:53:21'),(324,11,'195.154.163.175','2015-06-25 16:53:36'),(325,9,'207.46.13.20','2015-06-27 09:33:54'),(326,10,'207.46.13.65','2015-06-27 09:35:25'),(327,10,'207.46.13.65','2015-06-27 09:35:52'),(328,8,'207.46.13.65','2015-06-27 09:35:52'),(329,11,'66.249.69.99','2015-06-27 17:02:25'),(330,11,'173.252.88.88','2015-06-28 01:01:40'),(331,11,'180.76.15.144','2015-06-28 03:51:01'),(332,10,'136.243.5.87','2015-06-28 14:50:51'),(333,11,'136.243.5.87','2015-06-28 14:50:54'),(334,11,'74.111.12.201','2015-06-28 20:18:00'),(335,10,'136.243.5.87','2015-06-29 06:43:14'),(336,11,'136.243.5.87','2015-06-29 06:43:16'),(337,10,'198.245.62.10','2015-06-29 20:15:29'),(338,11,'104.193.9.137','2015-06-30 02:43:19'),(339,11,'104.193.9.137','2015-06-30 02:43:23'),(340,11,'42.156.136.110','2015-06-30 17:38:00'),(341,10,'104.255.67.238','2015-07-01 18:44:04'),(342,11,'172.98.193.114','2015-07-02 05:38:12'),(343,10,'42.156.138.110','2015-07-02 21:16:55'),(344,11,'104.255.64.50','2015-07-03 03:27:10'),(345,10,'104.255.64.50','2015-07-03 03:28:56'),(346,11,'104.255.64.50','2015-07-03 03:28:58'),(347,9,'104.255.64.50','2015-07-03 03:29:00'),(348,10,'123.125.71.28','2015-07-03 05:06:24'),(349,8,'207.46.13.65','2015-07-03 07:39:18'),(350,10,'207.46.13.27','2015-07-03 14:33:33'),(351,9,'157.55.39.38','2015-07-03 18:44:27'),(352,11,'46.165.197.141','2015-07-04 23:10:05'),(353,10,'46.165.197.141','2015-07-04 23:10:10'),(354,11,'46.165.197.141','2015-07-04 23:10:12'),(355,9,'46.165.197.141','2015-07-04 23:10:15'),(356,9,'157.55.39.142','2015-07-05 12:05:53'),(357,8,'157.55.39.142','2015-07-05 12:05:53'),(358,11,'123.125.71.15','2015-07-05 13:26:06'),(359,11,'180.76.15.163','2015-07-06 02:51:54'),(360,11,'198.27.64.33','2015-07-06 22:12:45'),(361,10,'198.27.64.33','2015-07-06 22:12:52'),(362,11,'198.27.64.33','2015-07-06 22:12:55'),(363,9,'198.27.64.33','2015-07-06 22:12:58'),(364,8,'157.55.39.212','2015-07-07 16:11:29'),(365,10,'157.55.39.212','2015-07-07 16:11:29'),(366,9,'157.55.39.141','2015-07-07 16:11:33'),(367,9,'125.160.199.22','2015-07-07 22:44:55'),(368,9,'173.252.88.184','2015-07-07 22:45:33'),(369,8,'180.76.15.158','2015-07-08 01:08:21'),(370,8,'207.46.13.35','2015-07-08 02:29:00'),(371,10,'207.46.13.35','2015-07-08 02:29:00'),(372,9,'157.55.39.211','2015-07-08 02:29:06'),(373,11,'198.100.144.83','2015-07-09 01:41:27'),(374,10,'198.100.144.83','2015-07-09 01:42:11'),(375,11,'198.100.144.83','2015-07-09 01:42:20'),(376,9,'198.100.144.83','2015-07-09 01:42:45'),(377,11,'125.160.226.42','2015-07-09 08:35:55'),(378,11,'173.252.112.113','2015-07-09 08:36:01'),(379,8,'180.76.15.161','2015-07-09 21:05:57'),(380,9,'192.99.150.97','2015-07-10 09:59:49'),(381,11,'192.99.150.97','2015-07-10 09:59:51'),(382,11,'207.46.13.56','2015-07-10 22:52:22'),(383,11,'157.55.39.172','2015-07-11 04:42:43'),(384,11,'94.23.46.192','2015-07-11 06:04:01'),(385,10,'94.23.46.192','2015-07-11 06:04:07'),(386,11,'94.23.46.192','2015-07-11 06:04:09'),(387,9,'94.23.46.192','2015-07-11 06:04:12'),(388,9,'180.76.15.157','2015-07-12 02:54:31'),(389,11,'180.76.15.153','2015-07-12 05:53:42'),(390,9,'42.120.160.110','2015-07-12 17:39:13'),(391,9,'123.125.71.54','2015-07-13 02:44:42'),(392,11,'66.249.79.60','2015-07-13 09:00:20'),(393,11,'188.230.73.254','2015-07-13 11:25:22'),(394,10,'188.230.73.254','2015-07-13 11:25:33'),(395,11,'188.230.73.254','2015-07-13 11:25:36'),(396,9,'188.230.73.254','2015-07-13 11:25:40'),(397,10,'188.165.15.223','2015-07-13 14:46:33'),(398,9,'180.76.15.142','2015-07-13 17:56:28'),(399,8,'66.249.79.130','2015-07-14 09:32:10'),(400,8,'66.220.156.116','2015-07-14 14:43:41'),(401,11,'188.165.15.223','2015-07-14 22:19:30'),(402,11,'62.210.90.118','2015-07-15 14:52:30'),(403,10,'62.210.90.118','2015-07-15 14:52:36'),(404,11,'62.210.90.118','2015-07-15 14:52:38'),(405,9,'62.210.90.118','2015-07-15 14:52:40'),(406,11,'207.46.13.5','2015-07-16 11:04:20'),(407,10,'157.55.39.45','2015-07-16 11:04:55'),(408,9,'188.165.15.223','2015-07-16 17:51:15'),(409,9,'38.111.147.83','2015-07-19 07:40:11'),(410,8,'38.111.147.83','2015-07-19 07:46:21'),(411,10,'38.111.147.83','2015-07-19 07:52:11'),(412,9,'202.62.16.232','2015-07-20 09:56:23'),(413,9,'66.220.146.27','2015-07-20 09:56:30'),(414,11,'180.76.15.142','2015-07-20 10:45:58'),(415,11,'151.80.31.153','2015-07-20 11:22:37'),(416,8,'207.46.13.53','2015-07-20 22:47:50'),(417,9,'157.55.39.4','2015-07-21 04:45:24'),(418,10,'157.55.39.109','2015-07-21 06:16:01'),(419,10,'188.165.15.192','2015-07-21 08:37:38'),(420,11,'68.180.229.92','2015-07-21 09:37:00'),(421,11,'188.165.15.192','2015-07-21 10:00:53'),(422,10,'68.180.229.92','2015-07-21 21:48:04'),(423,8,'68.180.229.92','2015-07-21 21:49:13'),(424,10,'66.249.65.140','2015-07-22 08:30:02'),(425,10,'66.220.156.112','2015-07-22 08:30:14'),(426,10,'178.255.215.87','2015-07-23 09:35:43'),(427,10,'178.255.215.87','2015-07-23 11:32:18'),(428,9,'178.255.215.87','2015-07-23 11:32:21'),(429,11,'178.255.215.87','2015-07-23 22:17:06'),(430,9,'66.249.73.160','2015-07-25 19:59:36'),(431,8,'68.180.229.98','2015-07-25 20:58:48'),(432,11,'180.76.15.155','2015-07-26 07:08:02'),(433,9,'66.249.65.133','2015-07-27 17:40:45'),(434,9,'66.220.156.119','2015-07-27 17:40:57'),(435,9,'66.249.73.168','2015-07-28 03:14:36'),(436,9,'188.165.15.61','2015-07-28 10:42:21'),(437,10,'unknown','2015-07-28 23:13:55'),(438,11,'unknown','2015-07-28 23:14:05'),(439,9,'unknown','2015-07-28 23:14:09'),(440,10,'68.180.229.98','2015-07-29 08:10:38'),(441,9,'68.180.229.98','2015-07-29 08:10:42'),(442,9,'66.220.156.116','2015-07-29 09:12:27'),(443,10,'188.165.15.237','2015-08-01 22:07:48'),(444,10,'144.76.7.107','2015-08-03 05:40:04'),(445,10,'144.76.7.107','2015-08-03 05:40:15'),(446,11,'144.76.7.107','2015-08-03 05:40:18'),(447,9,'144.76.7.107','2015-08-03 05:40:20'),(448,10,'46.4.89.35','2015-08-03 06:42:04'),(449,11,'46.4.89.35','2015-08-03 06:42:06'),(450,9,'46.4.89.35','2015-08-03 06:42:11'),(451,11,'180.76.15.148','2015-08-03 20:10:39'),(452,11,'81.144.138.34','2015-08-04 11:47:28'),(453,10,'81.144.138.34','2015-08-04 11:47:36'),(454,9,'81.144.138.34','2015-08-04 11:47:45'),(455,11,'188.165.15.237','2015-08-04 13:01:23'),(456,8,'74.111.12.201','2015-08-04 20:04:42'),(457,8,'66.249.73.168','2015-08-05 02:01:54'),(458,8,'66.220.158.117','2015-08-05 02:24:40'),(459,9,'188.165.15.237','2015-08-05 03:08:11'),(460,9,'5.9.87.98','2015-08-05 07:08:52'),(461,8,'157.55.39.37','2015-08-06 21:17:14'),(462,9,'157.55.39.77','2015-08-07 11:27:46'),(463,10,'157.55.39.77','2015-08-07 13:31:58'),(464,10,'188.165.15.240','2015-08-08 11:51:05'),(465,9,'38.111.147.83','2015-08-09 11:35:12'),(466,9,'38.111.147.83','2015-08-09 11:41:39'),(467,11,'38.111.147.83','2015-08-09 11:41:39'),(468,10,'38.111.147.83','2015-08-09 11:48:14'),(469,11,'38.111.147.83','2015-08-09 11:48:14'),(470,10,'38.111.147.83','2015-08-09 11:54:51'),(471,10,'199.21.99.213','2015-08-09 20:05:57'),(472,11,'199.21.99.213','2015-08-09 20:06:20'),(473,9,'199.21.99.204','2015-08-09 20:07:35'),(474,9,'167.114.172.223','2015-08-10 07:57:08'),(475,11,'167.114.172.223','2015-08-10 07:57:10'),(476,10,'199.21.99.196','2015-08-10 13:40:33'),(477,11,'188.165.15.240','2015-08-10 14:33:39'),(478,9,'188.165.15.240','2015-08-10 21:24:32'),(479,10,'136.243.5.215','2015-08-11 06:07:20'),(480,11,'136.243.5.215','2015-08-11 06:07:23'),(481,9,'136.243.5.215','2015-08-11 06:07:26'),(482,8,'151.80.41.169','2015-08-11 13:41:07'),(483,11,'180.76.15.161','2015-08-11 14:50:21'),(484,8,'199.21.99.204','2015-08-11 17:02:29'),(485,9,'199.21.99.196','2015-08-12 00:16:03'),(486,9,'180.76.15.147','2015-08-12 08:22:52'),(487,8,'100.43.81.156','2015-08-12 09:30:19'),(488,11,'199.21.99.213','2015-08-12 09:30:27'),(489,10,'94.22.46.23','2015-08-12 23:41:06'),(490,11,'94.22.46.23','2015-08-12 23:41:08'),(491,9,'94.22.46.23','2015-08-12 23:41:10'),(492,11,'66.249.65.140','2015-08-13 03:42:41'),(493,11,'66.220.146.21','2015-08-13 03:45:52'),(494,8,'66.249.79.86','2015-08-13 15:04:54'),(495,8,'62.210.250.215','2015-08-14 08:04:02'),(496,10,'216.107.155.114','2015-08-14 18:09:59'),(497,10,'216.107.155.114','2015-08-14 18:10:06'),(498,11,'216.107.155.114','2015-08-14 18:10:08'),(499,9,'216.107.155.114','2015-08-14 18:10:10'),(500,10,'199.58.86.211','2015-08-14 18:35:15'),(501,8,'66.220.146.21','2015-08-14 22:39:34'),(502,11,'68.180.228.219','2015-08-15 00:40:21'),(503,10,'36.73.118.178','2015-08-15 12:34:13'),(504,8,'199.58.86.209','2015-08-16 12:23:49'),(505,10,'5.9.85.4','2015-08-17 01:52:34'),(506,11,'5.9.85.4','2015-08-17 01:52:36'),(507,9,'5.9.85.4','2015-08-17 01:52:37'),(508,10,'151.80.44.115','2015-08-17 06:28:25'),(509,11,'151.80.44.115','2015-08-17 06:28:28'),(510,9,'151.80.44.115','2015-08-17 06:28:29'),(511,10,'178.255.215.87','2015-08-18 14:58:02'),(512,8,'108.59.8.70','2015-08-18 20:53:57'),(513,11,'114.125.189.237','2015-08-19 09:23:56'),(514,9,'220.181.108.91','2015-08-19 22:23:11'),(515,10,'220.181.108.122','2015-08-20 08:31:20'),(516,11,'68.180.229.98','2015-08-20 10:05:41'),(517,9,'68.180.228.219','2015-08-21 09:54:56'),(518,8,'91.194.84.106','2015-08-21 10:34:19'),(519,10,'123.125.71.110','2015-08-21 12:46:18'),(520,11,'180.76.15.5','2015-08-21 13:20:51'),(521,10,'66.249.65.140','2015-08-21 15:05:14'),(522,10,'180.76.15.159','2015-08-22 00:06:34'),(523,9,'180.76.15.138','2015-08-22 00:21:34'),(524,9,'202.67.41.51','2015-08-22 13:07:41'),(525,9,'69.171.230.111','2015-08-22 13:07:52'),(526,8,'144.76.8.132','2015-08-22 20:14:21'),(527,10,'66.249.73.210','2015-08-22 23:32:25'),(528,10,'180.76.15.9','2015-08-23 00:11:53'),(529,9,'178.255.215.87','2015-08-23 02:44:05'),(530,11,'151.80.31.130','2015-08-23 17:01:47'),(531,10,'180.76.15.159','2015-08-23 18:47:42'),(532,10,'123.125.71.55','2015-08-23 22:32:19'),(533,10,'66.249.73.218','2015-08-24 04:06:20'),(534,9,'157.55.39.83','2015-08-24 10:37:10'),(535,9,'207.46.13.66','2015-08-24 11:01:33'),(536,11,'220.181.108.162','2015-08-24 12:01:42'),(537,10,'157.55.39.223','2015-08-24 12:40:12'),(538,11,'178.255.215.87','2015-08-24 14:45:57'),(539,10,'151.80.31.130','2015-08-24 15:15:20'),(540,10,'180.76.15.28','2015-08-24 15:46:16'),(541,9,'157.55.39.82','2015-08-25 00:42:24'),(542,10,'66.249.73.202','2015-08-25 06:50:37'),(543,10,'83.71.247.36','2015-08-25 19:02:27'),(544,10,'95.45.254.121','2015-08-25 19:02:53'),(545,11,'83.71.247.36','2015-08-25 19:02:55'),(546,10,'95.45.254.122','2015-08-25 20:12:35'),(547,11,'95.45.254.122','2015-08-25 20:12:59'),(548,10,'unknown','2015-08-26 01:18:12'),(549,11,'unknown','2015-08-26 01:18:23'),(550,9,'unknown','2015-08-26 01:18:27'),(551,10,'66.249.73.202','2015-08-26 20:42:42'),(552,8,'100.43.81.140','2015-08-28 01:30:11'),(553,11,'180.76.15.26','2015-08-28 23:15:16'),(554,9,'66.249.65.140','2015-08-29 14:08:38'),(555,9,'151.80.31.140','2015-08-29 20:02:49'),(556,9,'180.76.15.16','2015-08-30 15:15:58'),(557,10,'81.144.138.34','2015-09-01 08:08:53'),(558,11,'81.144.138.34','2015-09-01 08:09:14'),(559,9,'81.144.138.34','2015-09-01 08:09:25'),(560,10,'199.21.99.204','2015-09-02 18:24:15'),(561,11,'110.138.121.10','2015-09-03 16:20:18'),(562,11,'173.252.74.102','2015-09-03 16:20:22'),(563,11,'110.138.121.10','2015-09-03 16:35:08'),(564,10,'110.138.121.10','2015-09-03 16:35:40'),(565,10,'66.220.146.26','2015-09-03 16:35:46'),(566,11,'180.243.24.19','2015-09-03 16:39:56'),(567,11,'180.243.24.19','2015-09-03 16:49:27'),(568,11,'180.243.24.19','2015-09-03 17:01:20'),(569,11,'125.160.236.177','2015-09-04 10:11:35'),(570,11,'157.55.252.30','2015-09-04 10:31:11'),(571,10,'36.70.34.249','2015-09-05 12:35:46'),(572,11,'157.55.39.111','2015-09-05 20:37:57'),(573,10,'52.18.177.177','2015-09-06 06:36:57'),(574,9,'52.18.177.177','2015-09-06 06:37:05'),(575,11,'52.18.177.177','2015-09-06 06:38:49'),(576,11,'68.180.229.98','2015-09-06 21:41:40'),(577,9,'180.76.15.147','2015-09-07 08:11:04'),(578,8,'157.55.39.253','2015-09-10 09:11:03'),(579,11,'180.76.15.146','2015-09-10 12:25:05'),(580,9,'167.114.172.225','2015-09-10 18:30:29'),(581,11,'167.114.172.225','2015-09-10 18:30:31'),(582,10,'188.165.15.117','2015-09-11 00:06:34'),(583,10,'157.55.39.140','2015-09-11 03:31:24'),(584,9,'207.46.13.178','2015-09-12 01:39:06'),(585,9,'180.76.15.146','2015-09-12 22:01:21'),(586,10,'148.251.236.167','2015-09-13 06:14:14'),(587,11,'148.251.236.167','2015-09-13 06:14:18'),(588,9,'148.251.236.167','2015-09-13 06:14:20'),(589,8,'148.251.236.167','2015-09-13 06:14:24'),(590,10,'100.43.81.156','2015-09-14 03:40:02'),(591,11,'188.165.15.240','2015-09-14 09:04:40'),(592,11,'199.21.99.204','2015-09-14 12:56:11'),(593,9,'100.43.81.140','2015-09-14 13:22:03'),(594,8,'100.43.81.140','2015-09-15 03:11:37'),(595,11,'199.21.99.204','2015-09-15 16:20:26'),(596,9,'114.79.13.91','2015-09-16 05:00:40'),(597,9,'69.171.230.96','2015-09-16 05:00:58'),(598,11,'180.76.15.140','2015-09-16 08:02:59'),(599,9,'114.4.77.127','2015-09-16 12:30:27'),(600,9,'66.249.65.133','2015-09-17 02:28:33'),(601,11,'100.43.81.156','2015-09-17 05:07:02'),(602,9,'139.192.249.90','2015-09-17 11:44:33'),(603,11,'157.55.39.27','2015-09-17 12:05:01'),(604,8,'114.120.239.108','2015-09-17 20:43:38'),(605,8,'66.220.146.29','2015-09-17 20:43:42'),(606,12,'36.70.36.161','2015-09-18 14:49:43'),(607,12,'173.252.73.121','2015-09-18 14:49:46'),(608,12,'36.70.36.161','2015-09-18 15:00:50'),(609,13,'36.70.36.161','2015-09-18 15:49:04'),(610,13,'173.252.73.119','2015-09-18 15:49:09'),(611,11,'100.43.81.156','2015-09-18 17:49:44'),(612,12,'220.181.108.109','2015-09-19 09:04:28'),(613,10,'180.76.15.161','2015-09-21 02:23:14'),(614,10,'68.180.228.219','2015-09-21 04:55:58'),(615,8,'208.115.113.83','2015-09-21 05:03:56'),(616,11,'118.98.221.8','2015-09-21 08:42:30'),(617,11,'173.252.112.97','2015-09-21 08:42:33'),(618,10,'118.98.221.8','2015-09-21 09:09:12'),(619,10,'173.252.112.99','2015-09-21 09:09:15'),(620,10,'5.9.89.170','2015-09-21 16:30:05'),(621,11,'5.9.89.170','2015-09-21 16:30:06'),(622,12,'5.9.89.170','2015-09-21 16:30:08'),(623,10,'62.210.250.215','2015-09-21 18:19:07'),(624,11,'62.210.250.215','2015-09-21 18:19:09'),(625,12,'62.210.250.215','2015-09-21 18:19:11'),(626,9,'180.76.15.8','2015-09-21 18:47:07'),(627,12,'66.249.73.176','2015-09-21 19:29:58'),(628,12,'5.9.85.4','2015-09-21 20:46:33'),(629,12,'100.43.81.140','2015-09-22 02:24:19'),(630,12,'100.43.81.140','2015-09-22 08:09:32'),(631,11,'180.76.15.143','2015-09-22 11:13:53'),(632,12,'66.249.73.168','2015-09-22 19:37:17'),(633,8,'144.76.8.132','2015-09-22 23:25:36'),(634,10,'unknown','2015-09-23 02:43:57'),(635,11,'unknown','2015-09-23 02:44:07'),(636,12,'unknown','2015-09-23 02:44:11'),(637,12,'114.125.51.71','2015-09-23 04:15:19'),(638,11,'66.249.65.133','2015-09-24 16:06:17'),(639,11,'173.252.90.80','2015-09-24 17:37:46'),(640,12,'180.76.15.153','2015-09-25 02:50:17'),(641,8,'92.221.148.40','2015-09-25 08:33:02'),(642,8,'92.221.148.40','2015-09-25 08:34:35'),(643,10,'66.249.65.140','2015-09-25 10:25:22'),(644,8,'68.180.229.98','2015-09-26 03:41:09'),(645,8,'176.9.10.227','2015-09-27 06:56:06'),(646,10,'68.180.229.98','2015-09-27 08:18:16'),(647,8,'207.46.13.95','2015-09-27 15:26:31'),(648,12,'151.80.31.130','2015-09-28 01:23:12'),(649,12,'91.121.112.142','2015-09-28 03:00:26'),(650,10,'46.4.89.35','2015-09-28 04:10:41'),(651,11,'46.4.89.35','2015-09-28 04:10:45'),(652,12,'46.4.89.35','2015-09-28 04:10:50'),(653,10,'46.4.89.35','2015-09-28 04:11:15'),(654,11,'46.4.89.35','2015-09-28 04:11:21'),(655,12,'46.4.89.35','2015-09-28 04:11:28'),(656,10,'207.46.13.95','2015-09-28 10:55:16'),(657,8,'151.80.31.130','2015-09-28 15:08:28'),(658,12,'220.181.108.185','2015-09-28 19:30:34'),(659,9,'66.249.65.140','2015-09-28 22:12:50'),(660,9,'173.252.90.85','2015-09-29 00:20:40'),(661,9,'157.55.39.62','2015-09-29 04:03:34'),(662,9,'151.80.31.130','2015-09-29 09:54:08'),(663,10,'180.76.15.13','2015-09-29 17:37:18'),(664,11,'180.76.15.160','2015-09-30 09:34:43'),(665,12,'180.76.15.152','2015-09-30 22:47:10'),(666,10,'123.125.71.20','2015-09-30 23:19:22'),(667,11,'151.80.31.130','2015-10-01 16:30:08'),(668,10,'136.243.36.87','2015-10-01 22:14:05'),(669,10,'136.243.36.87','2015-10-01 22:14:10'),(670,11,'136.243.36.87','2015-10-01 22:14:15'),(671,9,'136.243.36.87','2015-10-01 22:14:20'),(672,10,'151.80.31.130','2015-10-02 01:02:24'),(673,10,'208.115.111.66','2015-10-02 07:39:53'),(674,10,'77.248.252.113','2015-10-03 00:12:30'),(675,11,'77.248.252.113','2015-10-03 00:12:31'),(676,12,'77.248.252.113','2015-10-03 00:12:35'),(677,12,'62.210.90.118','2015-10-03 17:28:19'),(678,12,'61.94.209.222','2015-10-05 10:38:38'),(679,12,'66.220.158.107','2015-10-05 10:38:57'),(680,12,'118.97.25.185','2015-10-05 15:12:46'),(681,8,'66.249.65.133','2015-10-05 23:12:16'),(682,8,'173.252.90.82','2015-10-06 04:18:55'),(683,11,'114.121.162.212','2015-10-06 08:11:05'),(684,11,'66.220.158.98','2015-10-06 08:11:10'),(685,11,'180.76.15.135','2015-10-06 15:16:20'),(686,10,'123.125.71.53','2015-10-07 02:19:44'),(687,12,'180.76.15.29','2015-10-07 05:14:09'),(688,9,'151.80.31.137','2015-10-07 07:50:13'),(689,10,'62.210.78.209','2015-10-07 12:54:45'),(690,11,'62.210.78.209','2015-10-07 12:54:47'),(691,12,'62.210.78.209','2015-10-07 12:54:48'),(692,10,'62.210.78.209','2015-10-07 12:59:16'),(693,11,'62.210.78.209','2015-10-07 12:59:17'),(694,12,'62.210.78.209','2015-10-07 12:59:19'),(695,10,'180.76.15.158','2015-10-07 13:31:20'),(696,9,'46.252.131.34','2015-10-07 20:27:39'),(697,11,'157.55.39.175','2015-10-08 01:09:48'),(698,12,'151.80.31.137','2015-10-08 10:29:34'),(699,8,'151.80.31.137','2015-10-09 04:36:06'),(700,12,'86.175.210.44','2015-10-10 12:46:49'),(701,11,'142.4.218.236','2015-10-11 08:30:26'),(702,8,'208.115.113.83','2015-10-11 10:35:44'),(703,9,'85.25.185.157','2015-10-11 21:34:01'),(704,10,'85.25.185.157','2015-10-11 21:35:04'),(705,11,'85.25.185.157','2015-10-11 21:35:06'),(706,12,'85.25.185.157','2015-10-11 21:35:07'),(707,8,'66.249.73.176','2015-10-12 11:17:58'),(708,12,'66.249.65.147','2015-10-12 21:11:59'),(709,12,'173.252.90.80','2015-10-12 21:14:29'),(710,12,'66.249.65.133','2015-10-13 10:51:47'),(711,10,'180.76.15.26','2015-10-13 15:29:04'),(712,11,'64.79.85.205','2015-10-13 15:39:29'),(713,10,'64.79.85.205','2015-10-13 15:39:29'),(714,12,'64.79.85.205','2015-10-13 15:40:11'),(715,9,'64.79.85.205','2015-10-13 15:40:52'),(716,8,'64.79.85.205','2015-10-13 15:40:52'),(717,12,'180.76.15.151','2015-10-13 15:44:04'),(718,12,'66.249.79.180','2015-10-13 18:41:35'),(719,9,'199.58.86.211','2015-10-14 06:10:50'),(720,10,'199.58.86.211','2015-10-14 06:11:39'),(721,11,'199.58.86.211','2015-10-14 06:11:41'),(722,12,'199.58.86.211','2015-10-14 06:11:42'),(723,8,'66.220.158.115','2015-10-14 07:00:29'),(724,11,'180.76.15.137','2015-10-14 14:16:22'),(725,12,'114.125.8.0','2015-10-14 23:08:49'),(726,12,'173.252.90.98','2015-10-14 23:08:53'),(727,10,'188.165.15.209','2015-10-15 06:13:10'),(728,11,'188.165.15.209','2015-10-15 10:17:21'),(729,8,'207.46.13.0','2015-10-15 15:08:36'),(730,10,'207.46.13.28','2015-10-16 03:50:44'),(731,11,'91.194.84.106','2015-10-16 11:30:36'),(732,12,'91.194.84.106','2015-10-16 11:30:42'),(733,8,'66.249.73.210','2015-10-16 15:31:49'),(734,9,'178.255.215.87','2015-10-17 02:37:47'),(735,10,'202.67.44.29','2015-10-17 15:34:51'),(736,12,'188.165.15.209','2015-10-17 18:36:08'),(737,11,'62.210.148.233','2015-10-18 00:14:37'),(738,12,'62.210.148.233','2015-10-18 00:14:39'),(739,11,'220.181.108.91','2015-10-18 09:37:26'),(740,10,'148.251.236.167','2015-10-18 22:23:48'),(741,12,'148.251.236.167','2015-10-18 22:23:53'),(742,11,'148.251.236.167','2015-10-18 22:23:54'),(743,9,'148.251.236.167','2015-10-18 22:23:58'),(744,8,'148.251.236.167','2015-10-18 22:24:00'),(745,10,'180.76.15.9','2015-10-19 03:03:07'),(746,10,'139.0.117.41','2015-10-19 16:19:07'),(747,10,'173.252.90.97','2015-10-19 16:19:31'),(748,12,'180.76.15.144','2015-10-19 16:41:09'),(749,9,'185.8.236.222','2015-10-20 03:48:47'),(750,10,'185.8.236.222','2015-10-20 03:52:09'),(751,10,'100.43.81.156','2015-10-20 08:28:39'),(752,9,'100.43.85.1','2015-10-20 08:39:08'),(753,11,'180.76.15.11','2015-10-20 10:19:41'),(754,10,'100.43.81.156','2015-10-21 02:11:12'),(755,8,'100.43.81.156','2015-10-21 02:21:56'),(756,9,'66.249.73.218','2015-10-21 04:31:40'),(757,9,'173.252.90.117','2015-10-21 04:31:50'),(758,10,'unknown','2015-10-21 06:59:04'),(759,11,'unknown','2015-10-21 06:59:13'),(760,12,'unknown','2015-10-21 06:59:18'),(761,10,'120.164.44.0','2015-10-21 11:24:18'),(762,12,'103.47.133.122','2015-10-21 11:42:43'),(763,8,'100.43.85.20','2015-10-21 21:56:02'),(764,10,'62.210.152.89','2015-10-22 02:02:25'),(765,8,'140.0.51.139','2015-10-22 09:20:37'),(766,8,'69.171.230.96','2015-10-22 09:20:39'),(767,11,'66.249.73.218','2015-10-22 15:28:34'),(768,10,'123.125.71.89','2015-10-22 16:43:11'),(769,12,'120.176.245.40','2015-10-23 11:08:32'),(770,12,'173.252.88.186','2015-10-23 11:08:39'),(771,11,'207.46.13.1','2015-10-24 01:16:19'),(772,10,'192.99.1.101','2015-10-24 02:46:32'),(773,12,'66.249.73.160','2015-10-24 10:47:38'),(774,11,'100.43.81.129','2015-10-24 11:33:04'),(775,11,'100.43.81.140','2015-10-24 11:33:06'),(776,12,'141.8.143.157','2015-10-24 13:30:02'),(777,10,'141.8.143.161','2015-10-24 13:46:51'),(778,10,'180.76.15.12','2015-10-25 14:13:46'),(779,11,'66.249.73.202','2015-10-25 19:39:01'),(780,11,'123.125.71.40','2015-10-25 22:24:37'),(781,12,'124.195.119.20','2015-10-25 22:47:54'),(782,11,'180.76.15.156','2015-10-26 00:18:39'),(783,10,'114.125.8.255','2015-10-26 00:54:35'),(784,10,'173.252.112.116','2015-10-26 00:54:41'),(785,10,'142.4.214.124','2015-10-26 02:39:26'),(786,11,'142.4.214.124','2015-10-26 02:39:35'),(787,12,'142.4.214.124','2015-10-26 02:39:56'),(788,10,'114.125.8.255','2015-10-26 07:28:10'),(789,12,'68.180.229.98','2015-10-26 14:07:52'),(790,9,'68.180.228.219','2015-10-26 14:13:37'),(791,11,'38.111.147.83','2015-10-26 16:03:38'),(792,10,'93.63.88.184','2015-10-26 16:41:03'),(793,12,'93.63.88.184','2015-10-26 16:41:07'),(794,12,'66.249.73.176','2015-10-26 20:34:30'),(795,12,'66.220.158.108','2015-10-26 20:58:21'),(796,10,'38.111.147.83','2015-10-27 12:14:04'),(797,8,'38.111.147.83','2015-10-27 14:25:03'),(798,9,'38.111.147.83','2015-10-27 16:29:21'),(799,12,'180.76.15.155','2015-10-27 18:08:25'),(800,10,'68.180.229.98','2015-10-27 21:55:40'),(801,8,'68.180.228.219','2015-10-28 17:39:37'),(802,10,'89.163.148.58','2015-10-28 19:31:17'),(803,12,'89.163.148.58','2015-10-28 19:31:18'),(804,12,'66.249.74.60','2015-10-29 18:34:04'),(805,9,'100.43.81.154','2015-10-29 22:20:12'),(806,12,'100.43.81.156','2015-10-30 01:54:21'),(807,11,'100.43.81.129','2015-10-30 09:07:12'),(808,12,'111.223.255.21','2015-10-30 10:49:39'),(809,12,'111.223.255.21','2015-10-30 10:56:56'),(810,12,'111.223.255.21','2015-10-30 11:03:55'),(811,12,'111.223.255.21','2015-10-30 11:04:03'),(812,12,'111.223.255.21','2015-10-30 11:08:59'),(813,12,'69.171.230.117','2015-10-30 11:09:22'),(814,11,'157.55.39.255','2015-10-30 11:19:58'),(815,12,'188.165.15.227','2015-10-30 11:32:35'),(816,12,'54.209.60.63','2015-10-30 18:06:16'),(817,10,'36.250.177.42','2015-10-30 20:49:20'),(818,10,'36.250.177.42','2015-10-30 20:49:21'),(819,10,'180.76.15.161','2015-10-31 05:28:48'),(820,12,'66.249.73.202','2015-10-31 11:57:45'),(821,9,'62.210.148.233','2015-10-31 14:52:49'),(822,11,'62.210.148.233','2015-10-31 14:53:53'),(823,11,'180.76.15.138','2015-11-01 04:59:33'),(824,8,'10.100.232.77','2015-11-01 07:29:46'),(825,8,'173.252.90.105','2015-11-01 07:30:49'),(826,8,'10.100.232.77','2015-11-01 07:42:56'),(827,8,'10.100.232.77','2015-11-01 08:07:38'),(828,8,'10.100.232.77','2015-11-01 09:59:11'),(829,10,'24.220.5.234','2015-11-01 11:59:41'),(830,12,'24.220.5.234','2015-11-01 11:59:43'),(831,11,'173.252.73.102','2015-11-01 19:40:15'),(832,10,'5.9.140.208','2015-11-02 11:06:35'),(833,12,'5.9.140.208','2015-11-02 11:06:37'),(834,12,'103.47.133.97','2015-11-02 13:26:57'),(835,11,'68.180.229.98','2015-11-03 06:48:58'),(836,10,'66.249.73.210','2015-11-03 18:20:09'),(837,10,'173.252.90.246','2015-11-03 18:22:14'),(838,12,'139.193.158.27','2015-11-03 19:39:51'),(839,12,'180.76.15.27','2015-11-03 23:55:15'),(840,9,'157.55.39.126','2015-11-04 04:01:42'),(841,12,'120.169.254.250','2015-11-04 06:54:42'),(842,12,'103.47.133.76','2015-11-04 08:46:44'),(843,12,'66.220.158.101','2015-11-04 08:46:50'),(844,12,'110.139.207.96','2015-11-04 12:09:49'),(845,10,'108.59.8.80','2015-11-04 15:59:33'),(846,12,'108.59.8.80','2015-11-04 15:59:35'),(847,8,'77.248.252.113','2015-11-05 02:20:53'),(848,11,'188.165.15.231','2015-11-05 12:54:53'),(849,9,'192.99.1.101','2015-11-06 10:09:07'),(850,11,'157.55.39.166','2015-11-06 10:30:45'),(851,9,'69.30.250.178','2015-11-06 16:25:48'),(852,10,'180.76.15.27','2015-11-06 16:59:35'),(853,9,'91.121.169.194','2015-11-06 21:09:49'),(854,11,'180.76.15.134','2015-11-07 09:18:55'),(855,9,'46.252.131.34','2015-11-07 13:15:53'),(856,9,'5.9.89.170','2015-11-08 18:23:07'),(857,11,'207.46.13.22','2015-11-08 21:56:38'),(858,10,'178.255.215.87','2015-11-09 05:45:29'),(859,10,'157.55.39.126','2015-11-09 18:24:44'),(860,11,'142.4.218.236','2015-11-10 08:37:33'),(861,8,'94.23.19.178','2015-11-10 15:53:19'),(862,9,'144.76.29.66','2015-11-10 19:17:22'),(863,11,'119.82.252.40','2015-11-11 05:06:03'),(864,11,'173.252.90.109','2015-11-11 05:06:07'),(865,12,'114.124.37.6','2015-11-12 09:12:33'),(866,12,'173.252.90.118','2015-11-12 09:12:44'),(867,12,'114.4.21.214','2015-11-12 09:14:09'),(868,12,'114.124.1.103','2015-11-12 09:14:13'),(869,12,'114.121.130.134','2015-11-12 09:35:35'),(870,12,'10.9.71.2','2015-11-12 10:00:29'),(871,10,'180.76.15.26','2015-11-12 12:56:29'),(872,11,'207.46.13.10','2015-11-13 00:43:42'),(873,12,'36.78.16.244','2015-11-13 10:33:06'),(874,9,'103.47.133.92','2015-11-17 14:32:25'),(875,9,'173.252.120.106','2015-11-17 14:32:28'),(876,9,'103.47.133.92','2015-11-17 14:33:09'),(877,9,'103.47.133.92','2015-11-17 14:33:14'),(878,11,'103.47.133.92','2015-11-17 14:57:15'),(879,11,'173.252.120.100','2015-11-17 14:57:18'),(880,8,'180.245.55.113','2015-11-17 15:12:36'),(881,8,'66.220.158.117','2015-11-17 15:12:40'),(882,8,'180.245.55.113','2015-11-17 15:12:50'),(883,8,'localhost','2015-11-17 15:22:13'),(884,10,'localhost','2015-11-17 15:22:27'),(885,11,'localhost','2015-11-17 15:22:39'),(886,11,'localhost','2015-11-17 15:22:59'),(887,12,'103.47.133.92','2015-11-17 15:45:17'),(888,12,'173.252.120.105','2015-11-17 15:45:20'),(889,11,'103.47.133.92','2015-11-17 15:45:30'),(890,11,'36.71.88.148','2015-11-18 13:48:20'),(891,11,'36.71.88.148','2015-11-18 13:48:20'),(892,11,'36.71.88.148','2015-11-18 13:48:37'),(893,11,'101.255.76.90','2015-11-20 11:39:17'),(894,12,'101.255.76.90','2015-11-20 11:41:49'),(895,11,'103.47.133.108','2015-12-08 16:15:38'),(896,11,'173.252.120.96','2015-12-08 16:15:41'),(897,12,'103.47.133.108','2015-12-08 18:12:41'),(898,12,'173.252.120.100','2015-12-08 18:12:44'),(899,8,'66.249.65.37','2015-12-10 09:42:31'),(900,10,'66.249.65.37','2015-12-10 09:42:38'),(901,11,'66.249.65.37','2015-12-10 09:42:42'),(902,12,'66.249.65.37','2015-12-10 09:42:47'),(903,10,'69.171.230.101','2015-12-10 09:42:55'),(904,8,'173.252.90.231','2015-12-10 09:43:00'),(905,8,'66.249.65.37','2015-12-11 01:22:51'),(906,11,'66.249.79.33','2015-12-12 23:33:33'),(907,12,'66.249.79.34','2015-12-13 00:17:20'),(908,10,'103.47.133.100','2016-01-08 12:24:35'),(909,10,'173.252.120.120','2016-01-08 12:24:39'),(910,10,'103.47.133.79','2016-01-11 08:12:11'),(911,12,'103.47.133.79','2016-01-11 15:05:16'),(912,12,'173.252.90.116','2016-01-11 15:05:20'),(913,11,'103.47.133.79','2016-01-11 15:05:38'),(914,11,'173.252.90.118','2016-01-11 15:05:42'),(915,12,'103.47.133.79','2016-01-11 15:06:37'),(916,10,'66.249.79.33','2016-01-13 15:05:47'),(917,12,'103.47.133.83','2016-03-14 18:07:11'),(918,12,'173.252.120.99','2016-03-14 18:07:14'),(919,12,'103.47.133.83','2016-03-14 18:08:56'),(920,12,'173.252.120.100','2016-03-14 18:09:01'),(921,10,'103.47.133.83','2016-03-15 07:21:20'),(922,10,'103.47.133.83','2016-03-15 07:21:24'),(923,10,'173.252.120.118','2016-03-15 07:21:26'),(924,12,'103.47.133.83','2016-03-15 07:39:15'),(925,10,'103.47.133.83','2016-03-15 10:34:30'),(926,12,'103.47.133.83','2016-03-15 10:35:14'),(927,10,'103.47.133.83','2016-03-15 10:35:19'),(928,12,'103.47.133.83','2016-03-15 10:35:52'),(929,11,'103.47.133.83','2016-03-15 10:35:58'),(930,10,'103.47.133.83','2016-03-15 10:36:02'),(931,11,'103.47.133.83','2016-03-15 10:36:39'),(932,11,'103.47.133.83','2016-03-15 10:39:36'),(933,8,'103.47.133.83','2016-03-15 10:44:40'),(934,10,'103.47.133.83','2016-03-15 10:54:22'),(935,10,'103.47.133.83','2016-03-15 12:56:02'),(936,10,'103.47.133.83','2016-03-15 12:56:52'),(937,10,'173.252.122.120','2016-03-15 12:58:35'),(938,8,'103.47.133.83','2016-03-15 13:17:10'),(939,8,'103.47.133.83','2016-03-15 13:17:22'),(940,12,'103.47.133.83','2016-03-15 13:18:56'),(941,12,'103.47.133.83','2016-03-15 13:19:06'),(942,10,'103.47.133.83','2016-03-15 13:19:19'),(943,10,'103.47.133.83','2016-03-15 13:19:31'),(944,10,'103.47.133.83','2016-03-15 13:57:23'),(945,8,'103.47.133.83','2016-03-15 13:57:55'),(946,8,'103.47.133.83','2016-03-15 14:21:16'),(947,8,'103.47.133.83','2016-03-15 14:22:45'),(948,11,'103.47.133.83','2016-03-15 14:25:01'),(949,11,'103.47.133.83','2016-03-15 14:27:58'),(950,11,'103.47.133.83','2016-03-15 14:29:04'),(951,12,'103.47.133.83','2016-03-15 14:29:11'),(952,12,'103.47.133.83','2016-03-15 14:29:28'),(953,12,'103.47.133.83','2016-03-15 14:29:30'),(954,11,'103.47.133.83','2016-03-15 14:29:36'),(955,12,'180.243.3.146','2016-03-15 22:02:24'),(956,12,'180.243.3.146','2016-03-15 22:02:33'),(957,11,'103.47.133.120','2016-03-16 16:20:48'),(958,11,'103.47.133.120','2016-03-16 16:21:07'),(959,11,'103.47.133.120','2016-03-16 16:21:34'),(960,11,'103.47.133.120','2016-03-16 16:25:45'),(961,10,'103.47.133.120','2016-03-16 18:00:52'),(962,12,'103.47.133.120','2016-03-17 06:58:42'),(963,12,'103.47.133.120','2016-03-17 06:58:55'),(964,10,'114.124.28.141','2016-03-19 08:26:34'),(965,10,'114.124.28.141','2016-03-19 08:27:29'),(966,10,'114.124.28.141','2016-03-19 08:54:03'),(967,10,'114.124.28.141','2016-03-19 08:54:03'),(968,10,'36.70.45.177','2016-03-19 09:19:41'),(969,10,'36.70.45.177','2016-03-19 09:19:41'),(970,10,'103.47.133.120','2016-03-21 14:31:45'),(971,11,'103.47.133.120','2016-03-21 16:13:18'),(972,11,'103.47.133.120','2016-03-21 16:13:22'),(973,11,'103.47.133.120','2016-03-21 16:13:52'),(974,11,'103.47.133.120','2016-03-21 16:13:56'),(975,11,'103.47.133.120','2016-03-21 16:13:59'),(976,11,'103.47.133.120','2016-03-21 16:14:08'),(977,11,'103.47.133.120','2016-03-21 16:14:17'),(978,11,'103.47.133.120','2016-03-21 16:14:24'),(979,11,'103.47.133.120','2016-03-21 16:14:29'),(980,12,'103.47.133.120','2016-03-21 16:22:55'),(981,12,'103.47.133.120','2016-03-21 16:22:59'),(982,12,'103.47.133.120','2016-03-29 10:46:51'),(983,5,'66.96.230.127','2017-03-13 11:10:36'),(984,5,'66.96.230.127','2017-03-13 11:24:28'),(985,5,'66.96.230.127','2017-03-13 11:24:30'),(986,5,'66.96.230.127','2017-03-13 11:35:18'),(987,5,'66.96.230.127','2017-03-13 12:06:22'),(988,5,'66.96.230.127','2017-03-13 12:06:29'),(989,5,'66.96.230.127','2017-03-13 12:06:31'),(990,5,'66.96.230.127','2017-03-13 13:24:02'),(991,5,'66.96.230.127','2017-03-13 13:25:44'),(992,5,'66.96.230.127','2017-03-13 13:25:45'),(993,5,'66.96.230.127','2017-03-13 13:27:45'),(994,5,'66.96.230.127','2017-03-13 13:30:15'),(995,5,'66.96.230.127','2017-03-13 13:30:23'),(996,5,'66.96.230.127','2017-03-13 13:35:18');
/*!40000 ALTER TABLE `news_hits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_tag`
--

DROP TABLE IF EXISTS `news_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_news_id_tag` (`id_news`,`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=705 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_tag`
--

LOCK TABLES `news_tag` WRITE;
/*!40000 ALTER TABLE `news_tag` DISABLE KEYS */;
INSERT INTO `news_tag` VALUES (127,2,7),(126,2,8),(124,2,9),(125,2,10),(689,3,1),(688,3,11),(687,3,12),(690,3,13),(59,4,1),(58,4,14),(60,4,15),(57,4,16),(691,5,78),(692,5,79),(682,6,17),(681,6,20),(703,7,22),(702,7,26),(704,7,83),(701,7,85),(531,8,82),(532,8,86),(256,9,27),(257,9,28),(255,9,29),(258,9,30),(259,11,31),(260,11,32),(261,11,33),(272,14,31),(274,14,32),(271,14,33),(273,14,35),(276,15,31),(278,15,32),(275,15,33),(277,15,35),(279,16,36),(384,23,8),(383,23,36),(382,23,52),(377,24,33),(378,24,53),(305,25,54),(306,25,55),(307,25,56),(519,30,74),(520,30,75),(521,30,76);
/*!40000 ALTER TABLE `news_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portal`
--

DROP TABLE IF EXISTS `portal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ordering` int(9) DEFAULT '0',
  `published` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portal`
--

LOCK TABLES `portal` WRITE;
/*!40000 ALTER TABLE `portal` DISABLE KEYS */;
INSERT INTO `portal` VALUES (14,'0000-00-00 00:00:00','Alfresco','alfrescologo.png\r\n','https://docs.pamjaya.co.id',NULL,3,1),(16,'0000-00-00 00:00:00','Website','pamjaya-logo.png\r\n','http://www.pamjaya.co.id/',NULL,1,1),(20,'2019-06-21 02:21:56','Email','Zimbra_Identity_Color_HighRes.png-440px.png\r\n','https://mail.pamjaya.co.id',NULL,2,1),(21,'2019-07-26 08:01:54','E-Procurement','e-procurement.png\r\n','https://e-proc.pamjaya.co.id/',NULL,4,1),(22,'2019-07-26 08:23:13','SIL','laboratory-clipart-chemistry-beaker-665283-6262203.png\r\n','http://portal.pamjaya.co.id/akses-sil.php',NULL,5,1),(23,'2019-08-18 22:58:00','HRIS','HRIS-2.png\r\n','https://sf.dataon.com/sf6/index.cfm',NULL,7,1),(24,'2019-08-18 23:00:47','Change Password','Padlock.png\r\n','http://portal.pamjaya.co.id/ganti-pass.php',NULL,12,1),(25,'2019-08-19 07:05:10','TNDE','tnde.png\r\n','http://tnde.pamjaya.co.id',NULL,6,1),(26,'2020-04-06 15:40:37','KIMONEV','images-dashboard.jpg','https://kimonev.pamjaya.co.id',NULL,8,1),(27,'2020-05-22 11:57:30','MONICA','275-2752932_we-work-with-wordings-you-approve-and-are-that-are-we-work.png','https://monica.pamjaya.co.id',NULL,9,1),(28,'2020-08-03 16:32:55','MAYA','asset-1750687-1488734.png','http://203.161.27.194:3821/sim_aset/',NULL,10,1),(29,'2020-08-25 16:35:56','PPID','ppid-icon.png','http://ppid.pamjaya.co.id',NULL,11,1);
/*!40000 ALTER TABLE `portal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posisi`
--

DROP TABLE IF EXISTS `posisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posisi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `posisi` varchar(50) NOT NULL,
  `ordering` int(10) DEFAULT '0',
  `published` int(10) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posisi`
--

LOCK TABLES `posisi` WRITE;
/*!40000 ALTER TABLE `posisi` DISABLE KEYS */;
INSERT INTO `posisi` VALUES (1,'kiri',1,1),(2,'kanana',2,1),(3,'kirix',3,1),(8,'footer_bawah',8,1),(7,'judul_why_elite',7,1),(6,'why_elite_fast',6,1),(5,'why_elite_secure',5,1),(4,'why_elite_efficient',4,1),(9,'welcome_elite',9,1),(10,'contact_us',10,1);
/*!40000 ALTER TABLE `posisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(3) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `option_a` varchar(200) NOT NULL,
  `option_b` varchar(200) NOT NULL,
  `option_c` varchar(200) NOT NULL,
  `option_d` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'Apa hasil yang benar dari kode berikut ini?','https://res.cloudinary.com/db9zavtws/image/upload/v1486219056/1_rgnadm.png','4','3','5','\"0\"','4'),(2,2,'Apa output kode berikut ini?','https://res.cloudinary.com/db9zavtws/image/upload/v1486219057/2_f3d4tz.png','1,2,3,4,5,6,7,8,9','1,2,3,4,5,6,78,9,10','2,3,4,5,8,9','1,1,1,1,1,1,1,1,1,1','1,1,1,1,1,1,1,1,1,1'),(3,3,'Mana output yang benar?','https://res.cloudinary.com/db9zavtws/image/upload/v1486221114/3_ginlhe.png','\'a\' found','\'a\' not found','','','\'a\' not found'),(4,4,'Apa hasil yang benar dari kode berikut ini?','https://res.cloudinary.com/db9zavtws/image/upload/v1486222467/4_n5ai4k.png','PHP 5.3','5.3PHP 3','PHP','PH','5.3PHP 3'),(5,5,'Mana output yang benar?','https://res.cloudinary.com/db9zavtws/image/upload/v1486219057/5_ngpkk0.png','Undefined variable','6','2','10','Undefined variable'),(6,6,'Apa hasil yang benar dari kode berikut ini?','https://res.cloudinary.com/db9zavtws/image/upload/v1486219057/6_ltdqow.png','2','4','3','Error','2'),(7,7,'Mana output yang benar?','https://res.cloudinary.com/db9zavtws/image/upload/v1486219057/7_z6elyq.png','5 with warning','3','Error','10','5 with warning'),(8,8,'Ouput apa yang keluar dari kode berikut ini?','https://res.cloudinary.com/db9zavtws/image/upload/v1486219057/8_t9qjop.png','5','output kosong','8','20','output kosong'),(9,9,'Mana output yang benar?','https://res.cloudinary.com/db9zavtws/image/upload/v1486219057/9_sqoycr.png','226','246','123','Undefined variable','Undefined variable'),(10,10,'Apa hasil yang benar dari kode berikut ini?','https://res.cloudinary.com/db9zavtws/image/upload/v1486219056/10_zrcuiy.png','2','1','3','Error','2');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sidebar`
--

DROP TABLE IF EXISTS `sidebar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sidebar` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `widget` varchar(100) DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `desain_sesuai_template` tinyint(4) DEFAULT '1',
  `published` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sidebar`
--

LOCK TABLES `sidebar` WRITE;
/*!40000 ALTER TABLE `sidebar` DISABLE KEYS */;
INSERT INTO `sidebar` VALUES (5,'Kategori','product','kirix',NULL,1,0,9);
/*!40000 ALTER TABLE `sidebar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sidebar_home`
--

DROP TABLE IF EXISTS `sidebar_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sidebar_home` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `widget` varchar(100) DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `desain_sesuai_template` tinyint(4) NOT NULL DEFAULT '1',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sidebar_home`
--

LOCK TABLES `sidebar_home` WRITE;
/*!40000 ALTER TABLE `sidebar_home` DISABLE KEYS */;
INSERT INTO `sidebar_home` VALUES (13,'slider',NULL,'slider','<img src=\"http://localhost/master/images/upload/day_140808/201408081554144988.jpg\" alt=\"\" width=\"980px\" />',1,1,13),(14,'link',NULL,'link','<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">  <tbody><tr>    <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">      <tbody><tr>        <td width=\"32%\" rowspan=\"2\" align=\"center\"><img src=\"<?php echo $config[\'baseurl\'];?>themes/smk/images/upload/day_140808/201408081610189866.jpg\" width=\"84\" height=\"61\" alt=\"\" /></td>        <td width=\"68%\" align=\"center\"><span style=\"color:#FFCC00;\"><strong>DATA MURID</strong></span></td>      </tr>      <tr>        <td valign=\"top\">Data lengkap murid SMKN 1 Cibinong</td>      </tr>    </tbody></table></td>    <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">      <tbody><tr>        <td width=\"32%\" rowspan=\"2\" align=\"center\"><img src=\"<?php echo $config[\'baseurl\'];?>themes/smk/images/upload/day_140808/201408081610189866.jpg\" width=\"84\" height=\"61\" alt=\"\" /></td>        <td width=\"68%\" align=\"center\"><span style=\"color:#FFCC00;\"><strong>MODUL</strong></span></td>      </tr>      <tr>        <td valign=\"top\">Modul pembelajaran untuk semua jurusan</td>      </tr>    </tbody></table></td>    <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">      <tbody><tr>        <td width=\"32%\" rowspan=\"2\" align=\"center\"><img src=\"<?php echo $config[\'baseurl\'];?>themes/smk/images/upload/day_140808/201408081610189866.jpg\" width=\"84\" height=\"61\" alt=\"\" /></td>        <td width=\"68%\" align=\"center\"><span style=\"color:#FFCC00;\"><strong>JURUSAN</strong></span></td>      </tr>      <tr>        <td valign=\"top\">Profile semua jurusan SMKN 1 Cibinong</td>      </tr>    </tbody></table></td>    <td><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">      <tbody><tr>        <td width=\"32%\" rowspan=\"2\" align=\"center\"><img src=\"<?php echo $config[\'baseurl\'];?>themes/smk/images/upload/day_140808/201408081610189866.jpg\" width=\"84\" height=\"61\" alt=\"\" /></td>        <td width=\"68%\" align=\"center\"><span style=\"color:#FFCC00;\"><strong>VISI MISI</strong></span></td>      </tr>      <tr>        <td valign=\"top\">Visi misi SMKN 1 Cibinong</td>      </tr>    </tbody></table></td>  </tr></tbody></table>',1,1,14),(15,'bawah',NULL,'bawah','<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">  <tbody><tr>    <td width=\"23%\" align=\"center\" valign=\"top\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">      <tbody><tr>        <td align=\"center\"><span style=\"color:#FFCC00;\"><strong>Berita Sebelumnya</strong></span></td>      </tr>      <tr>        <td><span style=\"color:#FFCC00;\">01/01</span></td>      </tr>      <tr>        <td>Penerimaan murid baru mulai tanggal 17 Agustus 2014</td>      </tr>      <tr>        <td><span style=\"color:#FFCC00;\">02/02</span></td>      </tr>      <tr>        <td>SMKN 1 Cibinong menambah satu jurusan lagi yaitu Elektro</td>      </tr>      <tr>        <td><span style=\"color:#FFCC00;\">03/03</span></td>      </tr>      <tr>        <td>Tes masuk SMKN1 Cibinong adalah tes psikotes dan tes fisik</td>      </tr>    </tbody></table></td>    <td width=\"25%\" align=\"center\" valign=\"top\" bgcolor=\"#FFFFFF\"><img src=\"http://localhost/master/images/upload/day_140808/201408081637114844.jpg\" width=\"257\" height=\"192\" alt=\"\" /></td>  <td width=\"35%\" valign=\"top\" bgcolor=\"#FFFFFF\"><h1><span style=\"color: rgb(77, 1, 0);\">SMKN 1 CIBINONG menguasai provinsi jawa barat</span></h1>                 <p><span style=\"color:#000000;\">SMKN 1 Cibinong sekali lagi membuat nama kabupaten bogor harum, dikejuaraan tingkat Provinsi SMKN Kamvax(sebutan lainnya) ini berhasil menyabet 4 piala yang di perlombakan ....</span></p>             <p><a href=\"#\" class=\"art-button\">Read more...</a></p></td>    <td width=\"17%\" valign=\"top\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">      <tbody><tr>        <td colspan=\"2\" align=\"center\"><span style=\"color:#FFCC00;\"><strong>Connections</strong></span></td>        </tr>      <tr>        <td width=\"36%\" align=\"center\"><img src=\"http://localhost/master/images/upload/day_140808/201408081637177363.png\" width=\"32\" height=\"32\" alt=\"\" /></td>        <td width=\"64%\"><a href=\"#\">Facebook</a></td>      </tr>      <tr>        <td align=\"center\"><img src=\"http://localhost/master/images/upload/day_140808/201408081637238211.png\" width=\"32\" height=\"32\" alt=\"\" /></td>        <td><a href=\"#\">Rss Feed</a></td>      </tr>      <tr>        <td align=\"center\"><img src=\"http://localhost/master/images/upload/day_140808/201408081637282353.png\" width=\"32\" height=\"32\" alt=\"\" /></td>        <td><a href=\"#\">Twitter</a></td>      </tr>      <tr>        <td align=\"center\"><img src=\"http://localhost/master/images/upload/day_140808/201408081637386023.png\" width=\"32\" height=\"32\" alt=\"\" /></td>        <td><a href=\"#\">Picasa</a></td>      </tr>      <tr>        <td align=\"center\"><img src=\"http://localhost/master/images/upload/day_140808/201408081637447943.png\" width=\"32\" height=\"32\" alt=\"\" /></td>        <td><a href=\"#\">Technorati</a></td>      </tr>    </tbody></table></td>  </tr></tbody></table>',1,1,15),(16,'slider2',NULL,'slider2','<img src=\"http://localhost/master/images/upload/day_140812/201408121655004053.jpg\" alt=\"\" />',1,1,16),(17,'link2',NULL,'link2','<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td bgcolor=\"#445170\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr>        <td width=\"32%\" rowspan=\"3\" align=\"center\"><img src=\"http://localhost/master/images/upload/day_140812/201408121732244863.png\" width=\"84\" height=\"61\" alt=\"\" /></td>        <td width=\"68%\" align=\"center\"><span style=\"color:#FFCC00;\"><strong><span style=\"border-collapse: separate; font-family: \'Times New Roman\'; border-spacing: 0px;font-size:16px;\"><span style=\"border-collapse: collapse; color: rgb(255, 255, 255); font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;\"></span></span></strong></span><h4 style=\"margin: 15px 0px 0px; padding: 0px; font-size: 18px; font-family: \'Trebuchet MS\', Arial, Helvetica, sans-serif; font-weight: normal; text-transform: uppercase;\"><span style=\"border-collapse: separate; font-family: \'Times New Roman\'; border-spacing: 0px;font-size:16px;\"><span style=\"border-collapse: collapse; color: rgb(255, 255, 255); font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;\"></span></span></h4><h4 style=\"margin: 15px 0px 0px; padding: 0px; font-size: 18px; font-family: \'Trebuchet MS\', Arial, Helvetica, sans-serif; font-weight: normal; text-transform: uppercase;\">DATA MURID</h4></td>      </tr>      <tr>        <td valign=\"top\"><span style=\"border-collapse: separate; font-family: \'Times New Roman\'; border-spacing: 0px;font-size:16px;\"><span style=\"border-collapse: collapse; color: rgb(255, 255, 255); font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;\">Data murid - murid SMKN 1 CIbinong</span></span></td>      </tr>                                                <tr>        <td><p style=\"text-align: left;\"><a href=\"#\" class=\"art-button\">More</a></p></td>      </tr></tbody></table></td>    <td bgcolor=\"#7B9308\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">      <tbody><tr>        <td width=\"32%\" rowspan=\"3\" align=\"center\"><img src=\"http://localhost/master/images/upload/day_140812/201408121732355452.png\" width=\"84\" height=\"61\" alt=\"\" /></td>        <td width=\"68%\" align=\"center\"><span style=\"color:#ffcc00;\"><strong><span style=\"border-collapse: separate; font-family: \'Times New Roman\'; border-spacing: 0px;font-size:16px;\"><span style=\"border-collapse: collapse; color: rgb(255, 255, 255); font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;\"></span></span></strong></span><h4 style=\"margin: 15px 0px 0px; padding: 0px; font-size: 18px; font-family: \'Trebuchet MS\', Arial, Helvetica, sans-serif; font-weight: normal; text-transform: uppercase;\">JURUSAN</h4></td>      </tr>      <tr>        <td valign=\"top\"><span style=\"border-collapse: separate; font-family: \'Times New Roman\'; border-spacing: 0px;font-size:16px;\"><span style=\"border-collapse: collapse; color: rgb(255, 255, 255); font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;\">Jurusan yang ada di SMKN 1 Cibinong</span></span></td>      </tr>                                                <tr>        <td><p style=\"text-align: left;\"><a href=\"#\" class=\"art-button\">More</a></p></td>      </tr></tbody></table>                         </td>    <td bgcolor=\"#FF8B24\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">      <tbody><tr>        <td width=\"32%\" rowspan=\"3\" align=\"center\"><img src=\"http://localhost/master/images/upload/day_140812/201408121732423325.png\" width=\"84\" height=\"61\" alt=\"\" /></td>        <td width=\"68%\" align=\"center\"><span style=\"color:#FFCC00;\"><strong><span style=\"border-collapse: separate; font-family: \'Times New Roman\'; border-spacing: 0px;font-size:16px;\"><span style=\"border-collapse: collapse; color: rgb(255, 255, 255); font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;\"></span></span></strong></span><h4 style=\"margin: 15px 0px 0px; padding: 0px; font-size: 18px; font-family: \'Trebuchet MS\', Arial, Helvetica, sans-serif; font-weight: normal; text-transform: uppercase;\">GRAFIK</h4></td>      </tr>      <tr>        <td valign=\"top\"><span style=\"border-collapse: separate; font-family: \'Times New Roman\'; border-spacing: 0px;font-size:16px;\"><span style=\"border-collapse: collapse; color: rgb(255, 255, 255); font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;\">Grafik di SMKN 1 Cibinong</span></span></td>      </tr>                                                <tr>        <td><p style=\"text-align: left;\"><a href=\"#\" class=\"art-button\">More</a></p></td>      </tr></tbody></table></td>    <td bgcolor=\"#E2B226\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">      <tbody><tr>        <td width=\"32%\" rowspan=\"3\" align=\"center\"><img src=\"http://localhost/master/images/upload/day_140812/201408121732478530.png\" width=\"84\" height=\"61\" alt=\"\" /></td>        <td width=\"68%\" align=\"center\"><span style=\"color:#ffcc00;\"><strong><span style=\"border-collapse: separate; font-family: \'Times New Roman\'; border-spacing: 0px;font-size:16px;\"><span style=\"border-collapse: collapse; color: rgb(255, 255, 255); font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;\"></span></span></strong></span><h4 style=\"margin: 15px 0px 0px; padding: 0px; font-size: 18px; font-family: \'Trebuchet MS\', Arial, Helvetica, sans-serif; font-weight: normal; text-transform: uppercase;\">MODUL</h4></td>      </tr>      <tr>        <td valign=\"top\"><span style=\"border-collapse: separate; font-family: \'Times New Roman\'; border-spacing: 0px;font-size:16px;\"><span style=\"border-collapse: collapse; color: rgb(255, 255, 255); font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 18px;\">Modul pembelajaran untuk semua jurusan</span></span></td>      </tr>                                                <tr>        <td><p style=\"text-align: left;\"><a href=\"#\" class=\"art-button\">More</a></p></td>      </tr></tbody></table></td>  </tr></tbody></table>',1,1,17),(18,'bawah2',NULL,'bawah2','<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">  <tbody><tr>    <td width=\"443\" align=\"left\" bgcolor=\"#0D0B28\"><span style=\"font-size:24px;color:#FFFFFF;\">BERITA TERKINI</span></td>    <td width=\"4\" rowspan=\"3\" align=\"left\">&nbsp;</td>    <td width=\"243\" align=\"left\" bgcolor=\"#0D0B28\"><span style=\"font-size:24px;color:#FFFFFF;\">BERITA SEBELUMNYA</span></td>    <td width=\"2\" rowspan=\"3\" align=\"left\">&nbsp;</td>    <td width=\"405\" align=\"left\" bgcolor=\"#0D0B28\"><span style=\"font-size:24px;color:#FFFFFF;\">TENTANG KAMI</span></td>  </tr>  <tr>    <td align=\"center\" bgcolor=\"#0D0B28\"><img src=\"http://localhost/master/images/upload/day_140813/201408131325315758.jpg\" width=\"300\" height=\"106\" alt=\"\" /></td>    <td rowspan=\"2\" valign=\"top\" bgcolor=\"#0D0B28\"><table width=\"300\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">      <tbody><tr>        <td width=\"8%\"><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td width=\"92%\"><a href=\"#\">SMKN 1 Cibinong Terfavorite</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"#\">SMKN 1 Cibinong kembali juara</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"#\">Penerimaan Murid Baru</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"#\">SMKN 1 Cibinong berstandar SBI</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"index.php?go=news&amp;id=2\">Pendaftaran Siswa Baru</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"#\">kdfghskdfjgsdfgdfg</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"#\">dfgsdfgsjhgfsjty</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"#\">dfhdfhdfhsdfh</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"#\">dfhdfhdfgjhfgjsfgh</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"#\">dfhdfhdfhsfghsdfghsgf</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"#\">dfhdfhsdfhsfgdhsfghsdfgh</a></td>        </tr>      <tr>        <td><img src=\"http://localhost/master/images/upload/day_140813/201408131325455306.png\" width=\"16\" height=\"16\" alt=\"\" /></td>        <td><a href=\"#\">dfhdfhdgfhsgfdsdfghsfghsdfh</a></td>        </tr>    </tbody></table></td>    <td align=\"center\" bgcolor=\"#0D0B28\"><img src=\"http://localhost/master/images/upload/day_140813/201408131325385968.jpg\" width=\"300\" height=\"106\" alt=\"\" /></td>  </tr>  <tr>    <td valign=\"top\" bgcolor=\"#0D0B28\"><span style=\"color:#FFFFFF;\">Pelepasan dan Perpisahan<br /><br />      2013-07-15 12:36:57<br />      Acara Jalan-Jalan dan Perpisahan Murid TK B dilaksanakan padat tanggal 23 Juni 2014 di Kolam Renang ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦Ãƒâ€šÃ‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€šÃ‚Â¦ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œTirta GuptiÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦Ãƒâ€šÃ‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â dan ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦Ãƒâ€šÃ‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€šÃ‚Â¦ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œRumpin Cakra CendikiaÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦Ãƒâ€šÃ‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â‚¬Å¡Ã‚Â¬Ãƒâ€¦Ã‚Â¡ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡ÃƒÆ’Ã¢â‚¬Å¡Ãƒâ€šÃ‚Â&nbsp; Cilodong-Depok. Dalam acara tersebut berlangsung pula Acara Pembacaan Pidato dari salah satu Murid TK B.</span><br /><a href=\"index.php?go=news&amp;id=1\" class=\"art-button\">More</a></td>    <td valign=\"top\" bgcolor=\"#0D0B28\"><span style=\"color:#FFFFFF;\">Bl;asbkjabkjbkadskbasb jsbakjsbjkabs jsndajnsdajnsda jsnbakjsasjdasnk jnsdjanskjdnads ajsnbjdkanbksjdbaks dajbdaks dajkdbajks dakjsbdkjanda,m dajsnbdjksbdamfbalkjbaljsfa jbsdkljabsdkajbskla fjablakkjbaajaklfanihnakn nknsknsds d sd skhihefneifns jknbakfnfkafkan</span><br />    <a href=\"#\" class=\"art-button\">More</a></td>  </tr></tbody></table>',1,1,18);
/*!40000 ALTER TABLE `sidebar_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sidebar_param`
--

DROP TABLE IF EXISTS `sidebar_param`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sidebar_param` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_sidebar` int(11) NOT NULL,
  `nama_param` varchar(50) NOT NULL,
  `value_param` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sidebar_param`
--

LOCK TABLES `sidebar_param` WRITE;
/*!40000 ALTER TABLE `sidebar_param` DISABLE KEYS */;
/*!40000 ALTER TABLE `sidebar_param` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text,
  `title2` varchar(50) DEFAULT NULL,
  `description` text,
  `description2` text,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT '0',
  `published` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` VALUES (1,'Jasa Renovasi Proyek di Bogor Hiltop Sentul City',NULL,'<p>Jasa Renovasi Proyek di Bogor Hiltop Sentul City</p>\r\n',NULL,'IMG_20180627_120718.jpg',NULL,1,1),(2,'Jasa Pelaksana Proyek di Bogor Nirwana Residence',NULL,'<p>Jasa Pelaksana Proyek di Bogor Nirwana Residence</p>',NULL,'thumbnail_17662.jpg\r\n',NULL,2,1),(3,'5 Hal Yang Perlu Diperhitungkan Sebelum Renovasi Rumah',NULL,'<p>5 Hal Yang Perlu Diperhitungkan Sebelum Renovasi Rumah</p>\r\n',NULL,'FB_IMG_1523012518986.jpg',NULL,3,1);
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama_tag` (`nama_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (69,'air minum'),(9,'android'),(57,'argumen'),(58,'bahasa'),(85,'bike'),(23,'bogor'),(84,'community'),(63,'cover'),(59,'debat'),(72,'demam'),(19,'destinasi'),(68,'discount'),(64,'diskon'),(60,'diskusi'),(2,'edukasi'),(4,'ekonomi'),(81,'event'),(82,'event organizer'),(67,'free'),(74,'games'),(66,'gratis'),(29,'hantu'),(52,'hobi'),(5,'hukum'),(10,'iphone'),(18,'jalan-jalan'),(25,'jawa barat'),(26,'keluarga'),(16,'kesehatan'),(86,'keuntungan'),(33,'kocak'),(31,'komik'),(35,'komik lucu'),(32,'komik strip'),(12,'komunitas'),(71,'konstipasi'),(77,'konvoi'),(73,'kulit kering'),(27,'kuntilanak'),(62,'lagu'),(20,'liburan'),(61,'lucu'),(78,'merah putih'),(14,'olahraga'),(80,'peluang bisnin'),(28,'penampakan'),(22,'piknik'),(65,'pilkada'),(36,'ping pong'),(75,'pokemon'),(76,'pokemon go'),(6,'politik'),(24,'puncak'),(70,'pusing'),(79,'RI'),(83,'safety'),(54,'sekolah'),(3,'selebrity'),(21,'semarang'),(11,'sepeda motor'),(55,'sma'),(56,'smk'),(53,'social experiment'),(30,'supranatural'),(1,'tips'),(13,'touring'),(8,'trik'),(7,'whatsapp'),(17,'wisata'),(15,'workout');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_template` varchar(100) NOT NULL,
  `default_template` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
INSERT INTO `template` VALUES (3,'elite',0),(4,'mandor',0),(5,'pam',1);
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimoni`
--

DROP TABLE IF EXISTS `testimoni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimoni` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `testimoni` varchar(150) NOT NULL,
  `created` datetime NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Set if article is featured.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimoni`
--

LOCK TABLES `testimoni` WRITE;
/*!40000 ALTER TABLE `testimoni` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimoni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `salt` varchar(30) NOT NULL,
  `role` int(11) NOT NULL COMMENT 'combobox=nama_role',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`),
  KEY `FK_users_user_role` (`role`),
  CONSTRAINT `FK_users_user_role` FOREIGN KEY (`role`) REFERENCES `user_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'administrator','4bed2ae90bd31aabee8c7ee32de30009','58cf36e730c082.77692253',1,1,1),(24,'manager','4546234bbe9cf984465d4a837e6ab70a','5a37983bda3f53.69903077',2,24,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `alamat_pengiriman` text,
  `email_kontak` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` VALUES (11,'administrator','administrator',NULL,NULL,NULL,NULL),(17,'manager','mana ger',NULL,'manager@manager.com','manager','9898');
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(50) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'administrator',1,1),(2,'manager',2,2);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `youtube` varchar(150) NOT NULL,
  `created` datetime NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Set if article is featured.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (3,'video1','ISqa86xznrM','0000-00-00 00:00:00',0,1);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitor_statistik`
--

DROP TABLE IF EXISTS `visitor_statistik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitor_statistik` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `section` varchar(100) DEFAULT '0',
  `ip` varchar(50) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitor_statistik`
--

LOCK TABLES `visitor_statistik` WRITE;
/*!40000 ALTER TABLE `visitor_statistik` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitor_statistik` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-01 10:01:23
