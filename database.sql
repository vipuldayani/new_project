-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 01:58 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE IF NOT EXISTS `tbl_aboutus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_title` varchar(255) NOT NULL DEFAULT '',
  `sub_title` varchar(1000) NOT NULL DEFAULT '',
  `main_title2` varchar(255) NOT NULL DEFAULT '',
  `sub_title1` varchar(500) NOT NULL DEFAULT '',
  `sub_title2` varchar(500) NOT NULL DEFAULT '',
  `sub_title3` varchar(255) NOT NULL DEFAULT '',
  `text1` varchar(1000) DEFAULT '',
  `text2` varchar(1000) NOT NULL DEFAULT '',
  `text3` varchar(1000) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `switch` varchar(255) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_aboutus`
--

INSERT INTO `tbl_aboutus` (`id`, `main_title`, `sub_title`, `main_title2`, `sub_title1`, `sub_title2`, `sub_title3`, `text1`, `text2`, `text3`, `image`, `switch`, `created_date`) VALUES
(1, 'abouts', 'This sentence summarizes the main idea of the paragraph. It may also lead the reader to the topic of the next paragraph.', 'our consulting', 'Business Management', 'Product Statitics', 'Online work', 'Sentence summarizes the main idea of the paragraph. It may also lead the reader to the topic of the next paragraph produt skill.', 'Sentence summarizes the main idea of the paragraph. It may also lead the reader to the topic of the next paragraph produt skill.', 'Sentence summarizes the main idea of the paragraph. It may also lead the reader to the topic of the next paragraph produt skill.', 'about.jpg', 'on', '2018-10-01 01:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `message` varchar(2500) NOT NULL DEFAULT '',
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `subject`, `message`, `created_date`) VALUES
(8, 'vipul', 'bladephp@gmail.com', 'mathe', 'sms', '2018-10-02 01:14:56'),
(9, 'vipul dayan', 'vipuldayani55@gmail.com', 'bhojacvav', 'mather', '2018-10-02 01:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE IF NOT EXISTS `tbl_footer` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `about` varchar(200) NOT NULL,
  `latest` varchar(255) NOT NULL,
  `designed` varchar(200) NOT NULL,
  `about_title` varchar(255) NOT NULL DEFAULT '',
  `latest_title` varchar(255) NOT NULL DEFAULT '',
  `instagram_title` varchar(255) NOT NULL DEFAULT '',
  `switch` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `about`, `latest`, `designed`, `about_title`, `latest_title`, `instagram_title`, `switch`) VALUES
(1, 'A paragraph is a series of sentences that are organized and coherent A paragraph is a series of sentences that are organized and coherent\r\n\r\nA paragraph is a series of sentences that are organized and', '    That is longer than a few sentences\r\n    That is longer than a few sentences\r\n    That is longer than a few sentences\r\n    That is longer than a few sentences\r\n', 'Â© Bladephp Theme. All rights reserved Designed by Bladephp', 'about us', 'latest news', 'Instagram', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer_image`
--

CREATE TABLE IF NOT EXISTS `tbl_footer_image` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_footer_image`
--

INSERT INTO `tbl_footer_image` (`id`, `image`) VALUES
(7, 'ps.jpg'),
(8, 'pa.jpg'),
(9, 'pf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `active` varchar(255) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `email`, `password`, `active`, `created_date`) VALUES
(1, 'admin@bladephp.co', '123456', '0', '1899-11-30 06:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE IF NOT EXISTS `tbl_logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`id`, `image`) VALUES
(1, 'favicon.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_portfolio`
--

CREATE TABLE IF NOT EXISTS `tbl_portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_portfolio`
--

INSERT INTO `tbl_portfolio` (`id`, `name`, `image`) VALUES
(5, 'Taylor Ava', 'pa.jpg'),
(6, 'Taylor Ava', 'pd.jpg'),
(7, 'Taylor Ava', 'ps.jpg'),
(8, 'Taylor Ava', 'pf.jpg'),
(9, 'Taylor Ava', 'pg.jpg'),
(10, 'Taylor Ava', 'ph.jpg'),
(11, 'Taylor Ava', 'pj.jpg'),
(12, 'Taylor Ava', 'pk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE IF NOT EXISTS `tbl_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_title` varchar(255) NOT NULL DEFAULT '',
  `sub_service` varchar(500) NOT NULL DEFAULT '',
  `icon1` varchar(255) NOT NULL DEFAULT '',
  `icon2` varchar(255) NOT NULL DEFAULT '',
  `icon3` varchar(255) NOT NULL DEFAULT '',
  `main_title1` varchar(255) DEFAULT '',
  `main_title2` varchar(255) NOT NULL DEFAULT '',
  `main_title3` varchar(255) NOT NULL DEFAULT '',
  `text1` varchar(1000) NOT NULL DEFAULT '',
  `text2` varchar(1000) NOT NULL DEFAULT '',
  `text3` varchar(1000) NOT NULL DEFAULT '',
  `switch` varchar(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `service_title`, `sub_service`, `icon1`, `icon2`, `icon3`, `main_title1`, `main_title2`, `main_title3`, `text1`, `text2`, `text3`, `switch`) VALUES
(1, 'service', 'You can write a descriptive paragraph describing your best friend, including what she likes and dislikes', 'fa fa-cogs', 'fa fa-bar-chart', 'fa fa-camera', 'Business Finance', 'Business Management', 'Business Management', 'The an important metric on the financial statements as it is subtracted from a companys revenues to get its gross profit the gross profit is a profitability ...', 'The an important metric on the financial statements as it is subtracted from a companys revenues to get its gross profit the gross profit is a profitability ...', 'The an important metric on the financial statements as it is subtracted from a companys revenues to get its gross profit the gross profit is a profitability ...', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shareicon`
--

CREATE TABLE IF NOT EXISTS `tbl_shareicon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `target` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_shareicon`
--

INSERT INTO `tbl_shareicon` (`id`, `icon`, `link`, `target`) VALUES
(10, 'fa fa-instagram', 'https://www.instagram.com ', 'on'),
(11, 'fa fa-send-o', 'https://www.send.com ', 'on'),
(12, 'fa fa-whatsapp', ' https://www.whatsapp.com ', 'on'),
(13, 'fa fa-google-plus-square', 'https://www.googleplus.com ', 'on'),
(14, 'fa fa-pinterest', 'https://www.pinterest.com ', 'on'),
(15, 'fa fa-twitter', 'https://www.twitter.com ', 'on'),
(16, 'fa fa-facebook-f', 'https://www.facebook.com ', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL DEFAULT '',
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `image`, `created_date`) VALUES
(2, 'sidea.jpg', '2018-10-01 01:43:00'),
(3, 'sideb.jpg', '2018-10-01 01:43:08'),
(4, 'sidec.jpg', '2018-10-01 01:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_title`
--

CREATE TABLE IF NOT EXISTS `tbl_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_main_title` varchar(255) NOT NULL DEFAULT '',
  `title_sub_title` varchar(255) NOT NULL DEFAULT '',
  `title_text1` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_title`
--

INSERT INTO `tbl_title` (`id`, `title_main_title`, `title_sub_title`, `title_text1`) VALUES
(1, 'MyBiz Bootstrap Theme', 'Keywords', 'Description');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
