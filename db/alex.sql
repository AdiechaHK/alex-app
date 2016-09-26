-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2016 at 12:13 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alex`
--

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE IF NOT EXISTS `langs` (
`id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value_l1` varchar(255) NOT NULL,
  `value_l2` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`id`, `key`, `value_l1`, `value_l2`) VALUES
(1, 'abc', 'Abca', 'kdjf'),
(16, 'Its maaaaaaa langsss', 'Adcassdcds', 'Adchgscshckl'),
(17, 'home', 'F-Home', 'N-home'),
(18, 'about_us', 'French about us', 'Netherland about us'),
(19, 'about_title_footer', 'Sur', 'Handle om'),
(20, 'subscription_title', 'Subsribe here', 'Join our mailing list'),
(21, 'subscription_desc', 'Subscribe to get our weekly newsletter delivered directly to your inbox', 'Subscribe to get our weekly newsletter delivered directly to your inbox'),
(22, 'contact_us', 'Contact Us', 'Contact Us'),
(23, 'privacy_policy', 'Privacy Policy', 'Privacy Policy'),
(24, 'terms_conditions', 'Terams & Conditions', 'Terms & Conditions');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`id` int(11) NOT NULL,
  `type` enum('PAGE','LINK','PARENT') NOT NULL DEFAULT 'PAGE',
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `index` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `type`, `title`, `link`, `page`, `parent`, `index`) VALUES
(4, 'PAGE', 'home', '', 7, 0, 2),
(5, 'PAGE', 'about_us', '', 6, 0, 1),
(6, 'PARENT', 'Products', '', 0, 0, 3),
(7, 'PAGE', 'Contact Us', '', 9, 0, 4),
(8, 'LINK', 'Catelog', '#/page/catelog', 0, 6, 4),
(9, 'PARENT', 'Electronics', NULL, NULL, 6, 2),
(10, 'PARENT', 'Mobile', NULL, NULL, 9, 1),
(11, 'PARENT', 'Desktop', NULL, NULL, 9, 2),
(12, 'PARENT', 'Cloths', NULL, NULL, 6, 3),
(13, 'PAGE', 'Jquery', '', 8, 6, 1),
(15, 'PAGE', 'New menu', '', 8, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content_l1` text,
  `content_l2` text
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content_l1`, `content_l2`) VALUES
(6, 'About Us', '<h3>ABOUT US</h3>\r\n\r\n<p><em>Namaste!</em></p>\r\n\r\n<p><em>At CodeGeeks India, we are team of designers and programmers who want to simplify your life using software and web technology by developing amazing products for you. &nbsp;Our inspiration is simple &ndash; life, it means it can be anything around us and inside. We hope it will be fun journey, sit back and enjoy.</em></p>\r\n', '<h3>ABOUT US</h3>\r\n\r\n<p><em>Namaste!</em></p>\r\n\r\n<p><em>At CodeGeeks India, we are team of designers and programmers who want to simplify your life using software and web technology by developing amazing products for you. &nbsp;Our inspiration is simple &ndash; life, it means it can be anything around us and inside. We hope it will be fun journey, sit back and enjoy.</em></p>\r\n'),
(7, 'Home', '<h3>What We Do</h3>\r\n\r\n<p>Numerical visualisation of what we&#39;ve done</p>\r\n\r\n<p>At CodeGeeks, we mainly focus on designing on our software and web products. Simultaneously, we also serve clients who want turn their ideas into reality. We do have excellent talent that can benefit the society.</p>\r\n', '<h3>What We Do</h3>\r\n\r\n<p>Numerical visualisation of what we&#39;ve done</p>\r\n\r\n<p>At CodeGeeks, we mainly focus on designing on our software and web products. Simultaneously, we also serve clients who want turn their ideas into reality. We do have excellent talent that can benefit the society.</p>\r\n'),
(8, 'Jquery Code', '<h1>Writing Code for jQuery Foundation Projects</h1>\r\n\r\n<hr />\r\n<p>Like many Open Source projects, the majority of jQuery contributors are volunteers; their ability to contribute ebbs and flows with the demands of their professional and personal lives. As a result, jQuery projects are always looking for talented people who are motivated to contribute.</p>\r\n\r\n<p>New contributors sometimes make the mistake of starting with a pull request with code that implements some feature they want to be included. In most cases there is a process for features that starts with discussion and design before coding, so the chances are slim that an out-of-the-blue contribution will be accepted. That can leave the contributor feeling that their effort isn&#39;t appreciated. We don&#39;t want to leave that impression!</p>\r\n', '<h1>Writing Code for jQuery Foundation Projects</h1>\r\n\r\n<hr />\r\n<p>Like many Open Source projects, the majority of jQuery contributors are volunteers; their ability to contribute ebbs and flows with the demands of their professional and personal lives. As a result, jQuery projects are always looking for talented people who are motivated to contribute.</p>\r\n\r\n<p>New contributors sometimes make the mistake of starting with a pull request with code that implements some feature they want to be included. In most cases there is a process for features that starts with discussion and design before coding, so the chances are slim that an out-of-the-blue contribution will be accepted. That can leave the contributor feeling that their effort isn&#39;t appreciated. We don&#39;t want to leave that impression!</p>\r\n'),
(9, 'Contact Us', '<p><a href="https://goo.gl/maps/cChXjAQ1D8B2" target="_blank">Map</a></p>\r\n\r\n<p>306, Radhe Shyam -1, Near Om Nagar BRTS Stop<br />\r\n150 Feet Ring Road,<br />\r\nRajkot - 360004</p>\r\n', '<p><a href="https://goo.gl/maps/cChXjAQ1D8B2" target="_blank">Map</a></p>\r\n\r\n<p>306, Radhe Shyam -1, Near Om Nagar BRTS Stop<br />\r\n150 Feet Ring Road,<br />\r\nRajkot - 360004</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`id`), ADD KEY `parent` (`parent`), ADD KEY `index` (`index`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
