-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2013 at 10:45 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `samaras`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('16a023891c4f6e5e5bc211195dbfa0ed', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.114 Safari/537.36', 1383648334, 'a:2:{s:9:"user_data";s:0:"";s:11:"captchaWord";N;}'),
('3c42471408a3d8754a2d4f35a7b4104f', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:25.0) Gecko/20100101 Firefox/25.0', 1383653435, 'a:3:{s:9:"user_data";s:0:"";s:11:"captchaWord";N;s:9:"logged_in";a:8:{s:2:"id";s:1:"1";s:10:"id_encrypt";s:59:"$2a$10$5643cf30414c9dacd254bubjThpyGc40EOE3gtbELRdfMRO7kWJm";s:5:"email";s:23:"ramasamy.srce@gmail.com";s:9:"firstname";s:8:"Ramasamy";s:8:"lastname";s:4:"Kasi";s:4:"role";s:5:"admin";s:5:"limit";s:2:"20";s:4:"flag";s:1:"0";}}'),
('8637ab78b3aa6244c83124fe045caa6c', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:25.0) Gecko/20100101 Firefox/25.0', 1383658204, 'a:3:{s:9:"user_data";s:0:"";s:11:"captchaWord";N;s:9:"logged_in";a:8:{s:2:"id";s:1:"1";s:10:"id_encrypt";s:59:"$2a$10$5643cf30414c9dacd254bubjThpyGc40EOE3gtbELRdfMRO7kWJm";s:5:"email";s:23:"ramasamy.srce@gmail.com";s:9:"firstname";s:8:"Ramasamy";s:8:"lastname";s:4:"Kasi";s:4:"role";s:5:"admin";s:5:"limit";s:2:"20";s:4:"flag";s:1:"0";}}'),
('a762bf0336c884a662b610c47d9a17e8', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:25.0) Gecko/20100101 Firefox/25.0', 1383716351, ''),
('b4dcebe231d8e94fad001f54c47a68a7', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.114 Safari/537.36', 1383654631, 'a:2:{s:9:"user_data";s:0:"";s:11:"captchaWord";N;}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL DEFAULT '0',
  `forget` varchar(100) NOT NULL,
  `id_encrypt` varchar(100) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`),
  UNIQUE KEY `id_encrypt` (`id_encrypt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `active`, `forget`, `id_encrypt`, `created_on`) VALUES
(1, '$2a$10$fedbcac9c38ed7948ac3cuHOMCTDI5ZhNQ.fak8HxaQtOy882tq6S', 'ramasamy.srce@gmail.com', '1', '', '$2a$10$5643cf30414c9dacd254bubjThpyGc40EOE3gtbELRdfMRO7kWJm', '2013-09-18 09:57:18'),
(2, '$2a$10$b182c0dc7cf2834609834e0F8.Ud7PRgoVdTknEI.DH77B.yeIXDy', 'vaishnavi@gmail.com', '1', '', '$2a$10$bcada79cf2f98ee76dc22uSQzwrGaIKmMby5a1Drzfzw79q0Qqe', '2013-09-18 09:59:03'),
(3, '$2a$10$bf80c4b8976d850e70c12ujKgJT47PclUkELSiJCf3qrU91VunvoO', 'asghsadgh@sdgsdgh.com', '1', '', '$2a$10$fa5b15c1a8ca71a81ee3auKvpGqHGEkPVEqtZHHj3FNotNJrI6G', '2013-09-18 10:55:21'),
(4, '$2a$10$6299a699f67538fc62192u0KT23u645msjzTxqR9bR0zzobL5mZl2', 'asdgasgdhg@dlgdglk.com', '1', '', '$2a$10$adc66bd2ad3ec69be60e0OzGQhacShRctbYwC8ew.GpB9Y9ilqAG', '2013-09-18 11:03:08'),
(5, '$2a$10$05ccbe94aa7ae71b888fbeODoWVT69AoYXwn50EekXyvayW.BAjCm', 'lkdsjfgs@ksdghsd.com', '1', '', '$2a$10$c88df94eea416ceb73fe1uuDHWBefQonuEpJ.IJVZFZxwvfHTxO', '2013-09-18 11:04:21'),
(6, '$2a$10$5a681d3c82ae0c6b3adf4eYcUiIXWFfFi/rlNYMzqp/1EMwoxunzy', 'lkdsfsfjfgs@ksdghsd.com', '1', '', '$2a$10$a1754ff2d1fae57e3365cOp8sJWBTwOHdsFKWFQp5KwSmsMV4p4qW', '2013-09-18 11:09:29'),
(7, '$2a$10$352fcae1ee76a2a8dacb7Oyl4QKwZebKLxAeBO8vlS/mQHTV4MV6y', 'asgsadfh@sdgsgsdg.com', '1', '', '$2a$10$29e18249ec40145482108O3X7E9ykoST5pG9WLIfwcoBXvJt5L1e', '2013-09-18 11:14:18'),
(15, '$2a$10$84084e864568e44e07189ukT0nxvZKNZZU3aZKdr7XDpJ.Ye/.gNq', 'ramasamy@digitalchakra.in', '1', '', '$2a$10$fe7289453219a655e9461unuGM9OuWDk51RUa1x1xyoDrcsCxV3UW', '2013-09-27 06:30:58'),
(9, '$2a$10$3c2819eaee667ef4897b3uLNrc5Yb0NhYZSyWktZptRbOpVYtWI/W', 'prabakaran.krishnasamy@digitalchakra.in', '1', '', '$2a$10$d5bad448a8d95b97ee0d5OW9n8K4Em9ymnXgc.e0vs.tStda26f6', '2013-09-19 06:31:44'),
(14, '$2a$10$6cb8b72927079c9d39ffbuxRJsCAsoA2xwejz9o1zQNju0e1I664q', 'iniyan.social@gmail.com', '1', '', '$2a$10$a5ceba441b9f27178a1acevYuUD9z5e2PzxqrxtsaSYTXW.5hwly', '2013-09-19 07:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `role` enum('user','member','admin') NOT NULL,
  `dob` varchar(14) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `secondary_email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `skype` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `married` enum('0','1','NULL') DEFAULT NULL,
  `photo` varchar(250) NOT NULL,
  `experience` varchar(4) NOT NULL DEFAULT '0.0',
  `contactTitle` varchar(20) NOT NULL DEFAULT 'How to reach me',
  `Template` varchar(4) NOT NULL,
  `limit` int(11) NOT NULL DEFAULT '1',
  `flag` enum('0','1') NOT NULL,
  `online` enum('0','1') DEFAULT NULL,
  `update_date` datetime NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `first_name`, `last_name`, `role`, `dob`, `designation`, `secondary_email`, `mobile`, `skype`, `address`, `married`, `photo`, `experience`, `contactTitle`, `Template`, `limit`, `flag`, `online`, `update_date`, `create_date`) VALUES
(1, 1, 'Ramasamy', 'Kasi', 'admin', '', '', 'ramasamy.srce@gmail.com', '9999999999', '', '', NULL, '0', '0.0', 'How to reach me', 'T1', 20, '0', NULL, '0000-00-00 00:00:00', '2013-09-18 09:57:18'),
(2, 2, 'Vaishnavi', 'Vaisu', 'user', '', '', 'vaishnavi@gmail.com', '8015905040', '', '', NULL, '0', '0.0', 'How to reach me', 'T1', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-18 09:59:03'),
(3, 3, 'sdfgsdgf', 'asdgsadg', 'user', '', '', 'asghsadgh@sdgsdgh.com', '6699885533', '', '', NULL, '0', '0.0', 'How to reach me', 'T1', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-18 10:55:21'),
(4, 4, 'dagsadg', 'sdahgsadh', 'user', '', '', 'asdgasgdhg@dlgdglk.com', '6699885566', '', '', NULL, '0', '0.0', 'How to reach me', 'T1', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-18 11:03:08'),
(5, 5, 'dsrwdr', 'erywery', 'user', '', '', 'lkdsjfgs@ksdghsd.com', '5533224477', '', '', NULL, '0', '0.0', 'How to reach me', 'T1', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-18 11:04:21'),
(6, 6, 'dsrwdr', 'erywery', 'user', '', '', 'lkdsjfgs@ksdghsd.com', '5533224477', '', '', NULL, '0', '0.0', 'How to reach me', 'T1', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-18 11:09:29'),
(7, 7, 'zsdfasdg', 'asdgasd', 'user', '', '', 'asgsadfh@sdgsgsdg.com', '9988775566', '', '', NULL, '0', '0.0', 'How to reach me', 'T2', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-18 11:14:18'),
(8, 8, 'Ravi', 'Murugan', 'member', '', '', 'ramasamy@digitalchakra.in', '', '', '', NULL, '', '0.0', 'How to reach me', '', 1, '1', NULL, '0000-00-00 00:00:00', '2013-09-19 06:23:42'),
(9, 9, 'prabakaran', 'krishnasamy', 'user', '', 'UI Designer', 'prabakaran.krishnasamy@digitalchakra.in', '9944432999', 'praba03', '10,Metha nagar, chennai', '1', '0', '5.7', 'How to reach me', 'T7', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-19 06:31:44'),
(10, 10, 'Ravi', 'Murugan', 'member', '', '', 'ramasamy@digitalchakra.in', '', '', '', NULL, '', '0.0', 'How to reach me', '', 1, '1', NULL, '0000-00-00 00:00:00', '2013-09-19 06:46:38'),
(11, 11, 'Ravi', 'Murugan', 'user', '', '', 'ramasamy@digitalchakra.in', '', '', '', NULL, '', '0.0', 'How to reach me', '', 1, '1', NULL, '0000-00-00 00:00:00', '2013-09-19 06:51:34'),
(12, 12, 'Ravi', 'Murugan', 'member', '', '', 'ramasamy@digitalchakra.in', '9585657530', '', '', NULL, '', '0.0', 'How to reach me', '', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-19 06:51:51'),
(13, 13, 'Ravi', 'Murugan', 'member', '', '', 'ramasamy@digitalchakra.in', '998855776655', '', '', NULL, '', '0.0', 'How to reach me', '', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-19 07:15:20'),
(14, 14, 'Ramasamy', 'Kasi', 'user', 'Jun-9-1989', '', 'iniyan.social@gmail.com', '9988665577', '', '', NULL, '0', '0.0', 'How to reach me', 'T1', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-19 07:27:58'),
(15, 15, 'Ramasamy', 'Kasi', 'user', '', '', 'ramasamy@digitalchakra.in', '6699885522', '', '', NULL, '0', '3.3', 'How to reach me', 'T1', 1, '0', NULL, '0000-00-00 00:00:00', '2013-09-27 06:30:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
