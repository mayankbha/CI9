-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2013 at 06:42 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `wsdev_meow`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `reset_request` int(2) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `active`, `reset_request`, `reset_token`) VALUES
(10, 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, 0, ''),
(44, 'Hyperpma', 'admin', 'admin@hyperpma.com', '21232f297a57a5a743894a0e4a801fc3', 1, 0, ''),
(49, 'Julie', 'Roche', 'julroche@yahoo.com', '6b4b45b6afed4675da9e0b5778503fb3', 1, 0, ''),
(52, 'JaneDoe', 'Reed', 'apple1@apple.net', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 0, '');
