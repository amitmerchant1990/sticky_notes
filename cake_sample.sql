-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2013 at 03:05 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stickynotes`
--

CREATE TABLE IF NOT EXISTS `stickynotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `stickynotes`
--

INSERT INTO `stickynotes` (`id`, `note`, `created`) VALUES
(1, 'This is a sticky note you can type and edit.', '2013-04-01 09:33:54'),
(2, 'Lets see if it will work with my iPhone', '2013-03-31 18:30:00'),
(24, 'hello world', '2013-03-31 18:30:00'),
(39, 'hello', '2013-04-02 04:34:16'),
(23, 'Good test', '2013-04-02 05:49:12'),
(69, 'tomorrow is my birthday.. :)', '2013-04-02 06:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`) VALUES
(26, 'root_testing', 'testing', 0, '2013-03-30 10:35:22', '2013-03-30 10:35:22'),
(27, 'root_test', 'testing', 0, '2013-03-30 10:35:58', '2013-03-30 10:35:58'),
(28, 'root_testing123', '66ae9552cc67da7afdb30503e0bc057acdc0acf5', 0, '2013-03-30 10:42:13', '2013-03-30 10:42:13'),
(29, 'root_123456', 'test', 0, '2013-03-30 11:02:17', '2013-03-30 11:02:17'),
(30, 'root_manish', '63d59a08ac755ec8c9a6c84904e4060bceb45121', 0, '2013-03-30 12:06:34', '2013-03-30 12:06:34'),
(31, 'root_amit', '63d59a08ac755ec8c9a6c84904e4060bceb45121', 0, '2013-03-30 12:24:20', '2013-03-30 12:24:20'),
(32, 'root_amit_m', '63d59a08ac755ec8c9a6c84904e4060bceb45121', 0, '2013-03-30 12:26:02', '2013-03-30 12:26:02'),
(33, 'root_mamit', '63d59a08ac755ec8c9a6c84904e4060bceb45121', 0, '2013-04-01 13:57:48', '2013-04-01 13:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `part_no` varchar(12) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
