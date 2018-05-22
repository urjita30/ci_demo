-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 02:50 PM
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
  `gender` tinyint(4) NOT NULL COMMENT '0 = Male , 1 = Female  ',
  `role` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = Not delete , 1 = Deleted',
  PRIMARY KEY (`id`),
  KEY `role` (`role`),
  KEY `role_2` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `gender`, `role`, `created_date`, `modified_date`, `is_delete`) VALUES
(1, 'Urjita Dalal', 'urjita', 'a6b8aebcb6dab8795ad517ee9cec555f', 'ud@narola.email', 1, 1, '2018-05-09 17:27:47', '0000-00-00 00:00:00', 0),
(2, 'Dhvani Barot', 'dhvani', '7113a50eb9cc32d8ca79a71e154a87d4', 'dhb@narola.email', 1, 1, '2018-05-09 17:34:33', '0000-00-00 00:00:00', 0),
(6, 'Parth Viramgama', 'parth', '8c46c4c15a6da1e7781d9bda7fc4bdba', 'pav@narola.email', 0, 1, '2018-05-09 17:51:32', '0000-00-00 00:00:00', 0);

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
