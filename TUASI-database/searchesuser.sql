-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table tuasidb2021.searchesuser
CREATE TABLE IF NOT EXISTS `searchesuser` (
  `url` varchar(500) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `firstuser` varchar(100) NOT NULL DEFAULT 'staff',
  `firstip` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `picurl` varchar(500) DEFAULT NULL,
  `timeurl` datetime DEFAULT current_timestamp(),
  `rateup` int(50) NOT NULL DEFAULT 0,
  `ratedown` int(50) NOT NULL DEFAULT 0,
  `incount` int(11) NOT NULL DEFAULT 1,
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table tuasidb2021.searchesuser: 23 rows
/*!40000 ALTER TABLE `searchesuser` DISABLE KEYS */;
INSERT INTO `searchesuser` (`url`, `title`, `firstuser`, `firstip`, `description`, `picurl`, `timeurl`, `rateup`, `ratedown`, `incount`) VALUES
	('https://www.tuasi.com', 'TUASI Search Engine - TUASI.com', 'staff', '81.154.234.126', 'A tool to search the Internet, without compromise of security, privacy, data or principles. No tracking, no cookies, no targeting, no ads code, no user accounts, unbiased and transparent algorithms, and people can vote URLs up or down in search results.', NULL, '2021-04-16 23:42:04', 1, 0, 1);
/*!40000 ALTER TABLE `searchesuser` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
