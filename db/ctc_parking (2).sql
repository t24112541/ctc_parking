-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2018 at 07:00 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctc_parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `pk_admin`
--

CREATE TABLE IF NOT EXISTS `pk_admin` (
`ad_id` int(5) NOT NULL,
  `ad_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ad_lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ad_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ad_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ad_status` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pk_admin`
--

INSERT INTO `pk_admin` (`ad_id`, `ad_name`, `ad_lname`, `ad_username`, `ad_password`, `ad_status`) VALUES
(16, '02', '02', '02', 'f13bdadb0bbe29966e9e4c4e01677bc0', 'mx'),
(22, 'first', 'admin', '01', 'e5d1fb33b17dd6825f1ee24dbe0d85db', 'mx'),
(19, '0909', '09', '09', 'b860bea99e34934ec52c616ca5d4ae92', 'mn');

-- --------------------------------------------------------

--
-- Table structure for table `pk_class`
--

CREATE TABLE IF NOT EXISTS `pk_class` (
`c_id` int(5) NOT NULL,
  `c_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `d_id` int(5) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pk_class`
--

INSERT INTO `pk_class` (`c_id`, `c_code`, `c_name`, `d_id`) VALUES
(14, '401', 'D1', 1),
(18, '701', '601', 8),
(2, '02', 'class02', 2),
(12, '301', 'B1', 1),
(4, '04', 'E5', 4),
(10, '201', 'A1', 1),
(13, '101', 'C1', 1),
(8, '08', 'B1', 4),
(17, '501', '501', 8),
(21, '111', 'A1', 3),
(20, '901', 'E1', 9),
(22, '112', 'B3', 3),
(23, '902', 'E5', 9),
(24, '601', 'A1', 15),
(25, '113', 'B1', 9),
(26, '222', 'A1', 15);

-- --------------------------------------------------------

--
-- Table structure for table `pk_day`
--

CREATE TABLE IF NOT EXISTS `pk_day` (
`pd_id` int(5) NOT NULL,
  `pd_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pd_note` text COLLATE utf8_unicode_ci,
  `z_id` int(5) NOT NULL,
  `mc_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pk_day_img`
--

CREATE TABLE IF NOT EXISTS `pk_day_img` (
`di_id` int(5) NOT NULL,
  `di_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `di_note` text COLLATE utf8_unicode_ci,
  `pd_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pk_dep`
--

CREATE TABLE IF NOT EXISTS `pk_dep` (
`d_id` int(5) NOT NULL,
  `d_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `d_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pk_dep`
--

INSERT INTO `pk_dep` (`d_id`, `d_code`, `d_name`) VALUES
(1, '201', 'แผนกอิเล็กทรอนิกส์'),
(8, '101', 'ทดสอบแผนก'),
(3, '301', 'บัญชี'),
(4, '401', 'การตลาด'),
(9, '901', 'IT'),
(10, '111', '111'),
(11, '222', '222'),
(12, '333', '333'),
(13, '444', '444'),
(14, '555', '555'),
(15, '666', 'ช่างกล');

-- --------------------------------------------------------

--
-- Table structure for table `pk_machine`
--

CREATE TABLE IF NOT EXISTS `pk_machine` (
`mc_id` int(5) NOT NULL,
  `mc_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mc_brand` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mc_series` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mc_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mc_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_id` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pk_machine`
--

INSERT INTO `pk_machine` (`mc_id`, `mc_code`, `mc_brand`, `mc_series`, `mc_img`, `mc_date`, `us_id`) VALUES
(6, 'กพค 928 ชัยภูมิ', 'suzuki', 'wave 110', NULL, NULL, 15),
(4, 'กพค 926 ชัยภูมิ', 'yamaha', 'jupiter 110', NULL, NULL, 16);

-- --------------------------------------------------------

--
-- Table structure for table `pk_users_std`
--

CREATE TABLE IF NOT EXISTS `pk_users_std` (
`us_id` int(5) NOT NULL,
  `us_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `us_lname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `us_std_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `us_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `us_password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_id` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pk_users_std`
--

INSERT INTO `pk_users_std` (`us_id`, `us_name`, `us_lname`, `us_std_id`, `us_img`, `us_date`, `us_username`, `us_password`, `c_id`) VALUES
(6, '05', '05', '05', NULL, '05', '05', '05', 8),
(17, 'สมหญิง', 'ทิพสัส', '9898989898', NULL, NULL, '9898', '9898', 21),
(15, 'ชาญ', 'วิทย์', '6039010002', NULL, '', '01', '01', 20),
(7, '06', '06', '06', '06', '06', '60', '606', 2),
(16, 'นาตาชา', 'โรมานอฟ', '603801', NULL, '', 'natacha', 'roma', 21),
(10, '06', '06', '06', '06', '06', '60', '606', 2),
(11, '06', '06', '06', '06', '06', '60', '606', 2),
(13, 'ใคร', 'ว่ะ', '08', '08', '08', '08', '08', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pk_zone`
--

CREATE TABLE IF NOT EXISTS `pk_zone` (
`z_id` int(5) NOT NULL,
  `z_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `z_note` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pk_admin`
--
ALTER TABLE `pk_admin`
 ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `pk_class`
--
ALTER TABLE `pk_class`
 ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `pk_day`
--
ALTER TABLE `pk_day`
 ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `pk_day_img`
--
ALTER TABLE `pk_day_img`
 ADD PRIMARY KEY (`di_id`);

--
-- Indexes for table `pk_dep`
--
ALTER TABLE `pk_dep`
 ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `pk_machine`
--
ALTER TABLE `pk_machine`
 ADD PRIMARY KEY (`mc_id`);

--
-- Indexes for table `pk_users_std`
--
ALTER TABLE `pk_users_std`
 ADD PRIMARY KEY (`us_id`);

--
-- Indexes for table `pk_zone`
--
ALTER TABLE `pk_zone`
 ADD PRIMARY KEY (`z_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pk_admin`
--
ALTER TABLE `pk_admin`
MODIFY `ad_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pk_class`
--
ALTER TABLE `pk_class`
MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `pk_day`
--
ALTER TABLE `pk_day`
MODIFY `pd_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pk_day_img`
--
ALTER TABLE `pk_day_img`
MODIFY `di_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pk_dep`
--
ALTER TABLE `pk_dep`
MODIFY `d_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pk_machine`
--
ALTER TABLE `pk_machine`
MODIFY `mc_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pk_users_std`
--
ALTER TABLE `pk_users_std`
MODIFY `us_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `pk_zone`
--
ALTER TABLE `pk_zone`
MODIFY `z_id` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
