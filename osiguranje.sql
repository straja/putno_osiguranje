-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2020 at 05:02 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osiguranje`
--
CREATE DATABASE IF NOT EXISTS `osiguranje` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `osiguranje`;

-- --------------------------------------------------------

--
-- Table structure for table `grupno`
--

DROP TABLE IF EXISTS `grupno`;
CREATE TABLE IF NOT EXISTS `grupno` (
  `osiguranje_id` int(11) NOT NULL,
  `punoime` varchar(255) COLLATE utf8_bin NOT NULL,
  `pasos` int(11) NOT NULL,
  KEY `osiguranje_id` (`osiguranje_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `grupno`
--

INSERT INTO `grupno` (`osiguranje_id`, `punoime`, `pasos`) VALUES
(2, 'Aadsf ASdf', 234),
(3, 'Aadsfadsf', 1231313),
(3, 'Adsfadsf Asdfasdf', 12312312);

-- --------------------------------------------------------

--
-- Table structure for table `osiguranja`
--

DROP TABLE IF EXISTS `osiguranja`;
CREATE TABLE IF NOT EXISTS `osiguranja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `punoime` varchar(255) COLLATE utf8_bin NOT NULL,
  `drodj` date NOT NULL,
  `pasos` int(11) NOT NULL,
  `telefon` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `od` date NOT NULL,
  `do` date NOT NULL,
  `individualno` tinyint(1) NOT NULL DEFAULT 1,
  `kreirana` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `osiguranja`
--

INSERT INTO `osiguranja` (`id`, `punoime`, `drodj`, `pasos`, `telefon`, `email`, `od`, `do`, `individualno`, `kreirana`) VALUES
(1, 'Ime i Prezime', '2001-06-14', 123123123, 123123, 'asdfas@asdf.asdf', '2020-07-10', '2020-07-10', 1, '2020-07-14 02:56:06'),
(2, 'Ime Ali', '2020-07-09', 123123123, 12312312, 'asdf@asdf.asdf', '2020-07-14', '2020-07-17', 0, '2020-07-14 02:57:14'),
(3, 'Ime ASDFASDF', '1987-07-23', 123123123, 123123, 'asdf@asdf2.asdf', '2020-07-14', '2020-07-17', 0, '2020-07-14 02:58:24'),
(4, 'Ime Aasdfadsf', '1986-07-12', 123123123, 1231, 'asdf@as.asdf', '2020-07-06', '2020-07-17', 1, '2020-07-14 02:58:48');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grupno`
--
ALTER TABLE `grupno`
  ADD CONSTRAINT `grupno_ibfk_1` FOREIGN KEY (`osiguranje_id`) REFERENCES `osiguranja` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
