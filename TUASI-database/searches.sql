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

-- Dumping structure for table tuasidb2021.searches
CREATE TABLE IF NOT EXISTS `searches` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table tuasidb2021.searches: 0 rows
/*!40000 ALTER TABLE `searches` DISABLE KEYS */;
INSERT INTO `searches` (`url`, `title`, `firstuser`, `firstip`, `description`, `picurl`, `timeurl`, `rateup`, `ratedown`, `incount`) VALUES
	('https://moz.com/top500', NULL, 'staff', NULL, NULL, NULL, '2021-04-16 23:41:46', 0, 0, 1);
/*!40000 ALTER TABLE `searches` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
