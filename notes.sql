-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 18, 2020 at 11:34 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `list`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `text`) VALUES
(30, 'Breakfast'),
(34, 'Exercise'),
(31, 'Coding');
