-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 02:31 PM
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
(5, 'Alfresco', 'alfresco-icon.png', 'https://docs.pamjaya.co.id/', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ducimus quaerat nostrum dignissimos, natus, nihil sit esse, ut atque laudantium dolores modi non soluta aut amet facilis quis doloremque perferendis placeat culpa iste at! Doloremque consectetur placeat adipisci, error sapiente atque. Voluptates incidunt ullam minus, consequuntur tempore accusantium saepe quaerat.'),
(7, 'TNDE', 'tnde-icon.png', 'https://mail.pamjaya.co.id/', 'TNDE Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto ducimus quaerat nostrum dignissimos, natus, nihil sit esse, ut atque laudantium dolores modi non soluta aut amet facilis quis doloremque perferendis placeat culpa iste at! Doloremque consectetur placeat adipisci, error sapiente atque. Voluptates incidunt ullam minus, consequuntur tempore accusantium saepe quaerat.'),
(9, 'e-mail', 'zimbra-icon.png', 'https://mail.pamjaya.co.id/', 'zimbra Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(11, 'HRIS', 'hris-icon.png', 'https://sf.dataon.com/sf6/index.cfm', 'HRIS Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(12, 'PPID', 'ppid-icon.png', 'http://ppid.pamjaya.co.id/', 'PPID Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(13, 'e-procurement', 'e-procurement-icon.png', 'https://e-proc.pamjaya.co.id/', 'e-procurement Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(14, 'SIL', 'sil-icon.png', 'http://portal.pamjaya.co.id/akses-sil.php', 'SIL Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(15, 'Kimonev', 'kimonev-icon.png', 'https://kimonev.pamjaya.co.id/', 'kimonev Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(16, 'MAYA', 'maya-icon.png', 'http://203.161.27.194:3821/sim_aset/', 'maya Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!'),
(17, 'MONICA', 'monica-icon.png', 'https://monica.pamjaya.co.id/', 'monica Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, minima adipisci odio, est optio ipsum iure officia amet hic eaque laborum unde, nulla magni explicabo. Nam obcaecati deleniti sit molestiae voluptate vero aliquid optio, eos quia possimus, impedit, voluptatem dicta totam itaque earum facere dolorum id eveniet perferendis voluptatibus veritatis!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
