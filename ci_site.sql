-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 10:45 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `role` int(11) NOT NULL,
  `avatar` text,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = Not delete , 1 = Deleted',
  PRIMARY KEY (`id`),
  KEY `role` (`role`),
  KEY `role_2` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `gender`, `role`, `avatar`, `created_date`, `modified_date`, `is_delete`) VALUES
(1, 'Urjita Dalal', 'urjita', '5f2648dd64a2759283f0d28827862545', 'ud1@narola.email', 'male', 1, NULL, '2018-05-22 23:05:50', '2018-06-26 10:42:49', 0),
(2, 'Mansi Dalal', 'mansi', '7965de3d1be75597d4d682b5df389fdb', 'mansi@gmail.com', 'female', 2, NULL, '2018-06-21 16:36:44', NULL, 0),
(3, 'Parth Viramgama', 'pav123', '9e44dd255affd9f55af235b917be9477', 'pav@narola.email', 'female', 2, NULL, '2018-06-21 16:44:29', NULL, 0),
(7, 'Dhvani Barot', 'dhb123', '05770a789f1add07bd1cba888918293a', 'dhb@narola.email', 'female', 2, NULL, '2018-06-22 09:32:53', NULL, 0),
(22, 'Urjita Dalal', 'ud1234', 'fe3d57814fd9f2917d2c1694b9beeb2e', 'ud@narola.email', 'female', 2, NULL, '2018-06-22 10:37:44', NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
