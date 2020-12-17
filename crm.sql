-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2020 at 05:07 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  PRIMARY KEY (`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `name`, `phone`, `service`, `problem`) VALUES
(1, 'noor heeh', '0597635460', 'test', 'test'),
(1, 'noor', '0597635461', 'asdsa', 'sdasd'),
(1, 'sada', '0597635462', 'dsadad', 'asdas'),
(1, 'nico', '0597635465', 'stest', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `backgroundColor` varchar(255) NOT NULL,
  `borderColor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `user_id`, `title`, `start`, `end`, `backgroundColor`, `borderColor`) VALUES
(58, 1, 'Go home', 'Tue Dec 08 2020 00:00:00 GMT+0200 (Eastern European Standard Time)', 'Wed Dec 09 2020 00:00:00 GMT+0200 (Eastern European Standard Time)', 'rgb(255, 193, 7)', 'rgb(255, 193, 7)'),
(59, 1, 'Go home', 'Tue Dec 08 2020 02:00:00 GMT+0200 (Eastern European Standard Time)', 'Fri Dec 11 2020 02:00:00 GMT+0200 (Eastern European Standard Time)', 'rgb(255, 193, 7)', 'rgb(255, 193, 7)'),
(60, 1, 'Work on UI design', 'Tue Dec 15 2020 00:00:00 GMT+0200 (Eastern European Standard Time)', 'Wed Dec 16 2020 00:00:00 GMT+0200 (Eastern European Standard Time)', 'rgb(0, 123, 255)', 'rgb(0, 123, 255)'),
(61, 1, 'Lunch', 'Mon Dec 14 2020 09:00:00 GMT+0200 (Eastern European Standard Time)', 'Tue Dec 15 2020 09:00:00 GMT+0200 (Eastern European Standard Time)', 'rgb(40, 167, 69)', 'rgb(40, 167, 69)');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`) VALUES
(1, 'noor heeh', '$2y$10$UcsjVobqX2WBagyH8XPp1.68n31dl4pepQvtygnp3.ueYTqmIY0TG', 'noorxb64@gmail.com'),
(2, 'nicola', '$2y$10$RQG85nKaOeUYh8IKEKGy1uV3VuZGQpkSMduC1NPo8WjlMmKTfB4ia', 'noorxb31@gmail.com'),
(3, 'dsa', '$2y$10$egxWbDnnINW1S5bHA8NZCeBr6h6pExPE3FpB4oNN8620zrnVHhvB.', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
