-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2011 at 05:00 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db`
--
CREATE DATABASE `db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sport` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `coords` point NOT NULL,
  `datetime` datetime NOT NULL,
  `gender` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `sport`, `name`, `address`, `coords`, `datetime`, `gender`, `level`) VALUES
(52, 'Soccer', 'Poop', 'Pasadena, CA 91107, USA', '\0\0\0\0\0\0\0Xôﬂ•A@√ ˙ˇÑ]¿', '2010-11-10 12:30:00', 'Coed', 'All'),
(53, 'Soccer', 'Poop', 'Pasadena, CA 91107, USA', '\0\0\0\0\0\0\0Xôﬂ•A@√ ˙ˇÑ]¿', '2010-11-10 12:30:00', 'Coed', 'All'),
(54, 'Soccer', 'Poop', 'Altadena, CA, USA', '\0\0\0\0\0\0\0€…¸HA@îƒHeà]¿', '2010-11-29 06:30:00', 'Coed', 'All'),
(55, 'Soccer', 'Poop', 'Monrovia, CA, USA', '\0\0\0\0\0\0\0…*wA@O“WÎÄ]¿', '2010-11-30 06:30:00', 'Coed', 'All'),
(56, 'Football', 'Testing If this still works', 'BevMo, 885 S Arroyo Pkwy, Pasadena, CA 91105, USA', '\0\0\0\0\0\0\0ìÂ$îæA@Õ‰õmnâ]¿', '2011-01-13 12:30:00', 'Coed', 'All'),
(57, 'Football', 'Yup it does Awesome', 'Gas Station pasadena', '\0\0\0\0\0\0\0ìÂ$îæA@Õ‰õmnâ]¿', '2011-01-13 12:30:00', 'Coed', 'All'),
(58, 'Football', 'Yup it does Awesome 2', 'Pasadena, CA, USA', '\0\0\0\0\0\0\0€+òùÍA@˜êΩ?â]¿', '2011-01-31 12:30:00', 'Coed', 'All');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_address`, `user_name`, `password`) VALUES
(1, 'Eric', 'Kesh', 'devect@gmail.com', 'Kesh', '123456');

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `searchEvents`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `searchEvents`(
IN lat FLOAT,
IN lng FLOAT,
IN miles INT
)
BEGIN
SET @center = GeomFromText(concat('POINT(',lat,' ',lng,')')); 
SET @radius = miles; 
SET @bbox = CONCAT('POLYGON((', 
X(@center) - @radius, ' ', Y(@center) - @radius, ',', 
X(@center) + @radius, ' ', Y(@center) - @radius, ',', 
X(@center) + @radius, ' ', Y(@center) + @radius, ',', 
X(@center) - @radius, ' ', Y(@center) + @radius, ',', 
X(@center) - @radius, ' ', Y(@center) - @radius, '))' 
); 


SELECT id, name, address, gender, level, AsText(coords), SQRT(POW( ABS( X(coords) - X(@center)), 2) + POW( ABS(Y(coords) - Y(@center)), 2 )) AS distance 
FROM events
WHERE Intersects( coords, GeomFromText(@bbox) ) 
AND SQRT(POW( ABS( X(coords) - X(@center)), 2) + POW( ABS(Y(coords) - Y(@center)), 2 )) < @radius 
ORDER BY distance ASC;

END$$

DELIMITER ;
