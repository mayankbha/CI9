-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2013 at 04:29 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `wsdev_meow`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `activation_key` varchar(255) NOT NULL,
  `last_activity_date` datetime NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `type` char(1) NOT NULL,
  `ban` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `facebook_id` int(99) NOT NULL,
  `twitter_id` int(99) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `first_name`, `last_name`, `email`, `password`, `created`, `isactive`, `activation_key`, `last_activity_date`, `company_name`, `phone`, `type`, `ban`, `address`, `city`, `state`, `zip`, `facebook_id`, `twitter_id`) VALUES
(12, 'larri', 'Moss', 'garytest19@yopmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', '2012-10-02 09:45:31', 1, '', '0000-00-00 00:00:00', '0', '0', '', 0, '', '', '', '82001', 0, 0),
(21, 'sfvfsvs', 'vsfbsrbsf', 'begb@sfbger.ca', 'cc03e747a6afbbcbf8be7668acfebee5', '2012-10-04 15:41:56', 1, '', '0000-00-00 00:00:00', '', '', '', 0, '', '', '', '12345', 0, 0);
