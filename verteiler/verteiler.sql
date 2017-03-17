-- phpMyAdmin SQL Dump
-- version 4.1.14.3
-- http://www.phpmyadmin.net
--
-- Host: usersql.zedat.fu-berlin.de
-- Generation Time: Sep 14, 2014 at 12:47 PM
-- Server version: 5.1.73-1-log
-- PHP Version: 5.3.3-7+squeeze21zedat0userpage1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `komaromy-db3`
--

-- --------------------------------------------------------

--
-- Table structure for table `verteiler`
--

CREATE TABLE IF NOT EXISTS `verteiler` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `Vorname` varchar(30) NOT NULL,
  `Nachname` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Zeitstempel` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `verteiler`
--

INSERT INTO `verteiler` (`id`, `Vorname`, `Nachname`, `Email`, `Zeitstempel`) VALUES
(1, 'Andras', 'Komaromy', 'andras.komaromy@fu-berlin.de', '2014-09-10 18:56:57'),
(2, 'Bandi', 'Koma', 'komaromy.andras.pal@gmail.com', '2014-09-11 20:31:10'),
(7, 'Marcos', 'da Silva', 'marcos.adsilva@gmail.com', '2014-09-12 17:17:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
