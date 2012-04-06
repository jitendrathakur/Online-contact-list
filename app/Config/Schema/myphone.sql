-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2012 at 06:22 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-1ubuntu9.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `acos`
--


-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 4),
(2, NULL, 'Group', 2, NULL, 5, 6),
(3, NULL, 'Group', 3, NULL, 7, 24),
(4, 1, 'User', 1, NULL, 2, 3),
(5, NULL, 'User', 2, NULL, 25, 26),
(6, 3, 'User', 3, NULL, 8, 9),
(7, 3, 'User', 4, NULL, 10, 11),
(8, 3, 'User', 5, NULL, 12, 13),
(9, 3, 'User', 6, NULL, 14, 15),
(10, 3, 'User', 7, NULL, 16, 17),
(11, 3, 'User', 8, NULL, 18, 19),
(12, 3, 'User', 9, NULL, 20, 21),
(13, 3, 'User', 10, NULL, 22, 23);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `aros_acos`
--


-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL,
  `number` bigint(15) DEFAULT NULL,
  `alternate_number` bigint(15) DEFAULT NULL,
  `suffix` varchar(50) DEFAULT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `post_file` text,
  `fname` varchar(50) DEFAULT NULL,
  `fsize` varchar(50) DEFAULT NULL,
  `ftype` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `name`, `relation`, `number`, `alternate_number`, `suffix`, `filename`, `post_file`, `fname`, `fsize`, `ftype`, `created`, `modified`) VALUES
(1, 1, 'john ibrahim', 'family', 1234567896, 789456, NULL, '', NULL, NULL, NULL, NULL, '2012-02-14 12:21:39', '2012-02-21 13:35:09'),
(80, NULL, 'jitz', 'rock', 9713485910, 2147483647, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-06 17:19:22', '2012-03-06 17:19:22'),
(58, NULL, 'tttt', 'ttttt', 12345, 87456932, NULL, NULL, NULL, NULL, NULL, NULL, '2012-02-21 18:22:56', '2012-02-21 18:32:42'),
(37, NULL, '5454', '54', 454, 554, NULL, NULL, NULL, NULL, NULL, NULL, '2012-02-21 13:39:53', '2012-02-21 16:44:35'),
(35, NULL, '4545', '45', 4545, 4545, NULL, NULL, NULL, NULL, NULL, NULL, '2012-02-21 13:38:39', '2012-02-21 15:33:02'),
(81, NULL, 'jttjtj', 'jtjtj', 9713485910, 8793196350, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-06 17:20:14', '2012-03-06 17:20:14'),
(82, NULL, 'c.l.', 'father', 9329414377, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-06 17:22:17', '2012-03-06 17:22:17'),
(83, NULL, 'sunayna jain', 'life parter', 9713826532, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-07 10:31:16', '2012-03-07 10:31:16'),
(84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-07 16:07:18', '2012-03-07 16:07:18'),
(85, 1, 'jitendra thakur', 'my self', 9713485910, 8793196350, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-07 16:44:52', '2012-03-07 16:45:56'),
(86, 1, 'c.l.', 'father', 9329414377, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-07 16:45:43', '2012-03-07 16:45:43'),
(88, 1, 'sunayna', 'gf', 9713826532, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2012-03-07 17:23:18', '2012-03-07 17:23:18');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admin', '2012-03-06 18:00:12', '2012-03-06 18:00:12'),
(2, 'Member', '2012-03-06 18:00:33', '2012-03-06 18:00:33'),
(3, 'User', '2012-03-06 18:00:43', '2012-03-06 18:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE IF NOT EXISTS `homes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `user_id`, `created`, `modified`) VALUES
(1, 1, '2012-02-14 12:30:03', '2012-02-14 12:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`) VALUES
(1, 'The title', 'This is the post body.', '2012-02-14 11:42:09', NULL),
(2, 'A title once again', 'And the post body follows.', '2012-02-14 11:42:09', NULL),
(3, 'Title strikes back', 'This is really exciting! Not.', '2012-02-14 11:42:09', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`) VALUES
(1, 'jitendra', '2532ba9cebad8fee5bc039bf9c3b829e0989203d', 1, '2012-03-06 18:01:15', '2012-03-06 18:01:15'),
(4, 'hghgfhg', '59d83cb077b7a3768c11cc9a7ad3cd72b652c9bf', 3, '2012-03-07 15:44:27', '2012-03-07 15:44:27'),
(3, 'thakur', 'e9cb59d752c6545da53dcaff4d3be34a70ff68cb', 3, '2012-03-07 15:39:52', '2012-03-07 15:39:52'),
(5, 'nisha', '2532ba9cebad8fee5bc039bf9c3b829e0989203d', 3, '2012-03-07 15:58:41', '2012-03-07 15:58:41'),
(10, 'test', '2532ba9cebad8fee5bc039bf9c3b829e0989203d', 3, '2012-03-07 17:51:45', '2012-03-07 17:51:45'),
(9, 'irshad', '2532ba9cebad8fee5bc039bf9c3b829e0989203d', 3, '2012-03-07 17:24:54', '2012-03-07 17:24:54'),
(8, 'sunayna', '2532ba9cebad8fee5bc039bf9c3b829e0989203d', 3, '2012-03-07 16:33:05', '2012-03-07 16:33:05');
