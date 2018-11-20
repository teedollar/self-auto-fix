-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 08:19 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auto_mechanic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Adegbembo Feyifunmi Odunayo', 'feyi@gmail.com', 'feyifunmi');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `id` int(255) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `cat_id`, `name`) VALUES
(1, 2, 'Corola'),
(2, 1, 'Hummer'),
(3, 2, 'Selina');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Jeep'),
(2, 'Toyota'),
(3, 'Ford'),
(4, 'Honda'),
(5, 'Kia'),
(6, 'Nissan'),
(7, 'Audi'),
(8, 'Hyundai'),
(9, 'Volkswagen'),
(10, 'Peugeot'),
(11, 'Volvo'),
(12, 'Mazda'),
(13, 'Mercedes'),
(14, 'Ferrari');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(255) NOT NULL,
  `thread_id` int(255) NOT NULL,
  `comment` text NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `timess` varchar(50) NOT NULL,
  `like` int(255) NOT NULL,
  `extra` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `thread_id`, `comment`, `posted_by`, `dates`, `timess`, `like`, `extra`) VALUES
(1, 1, ' \r\n										ok sir	', 'teedollzee', 'Mon, 04 Dec, 2017', '10:38 am', 0, 0),
(2, 1, ' \r\n											fine', 'toyes', 'Mon, 04 Dec, 2017', '10:39 am', 0, 0),
(3, 1, ' \r\n											yeap', 'kaffy', 'Mon, 04 Dec, 2017', '10:43 am', 0, 0),
(4, 1, ' \r\n								ok			', 'kaffy', 'Mon, 04 Dec, 2017', '11:23 am', 0, 0),
(5, 1, ' \r\n											hi everyone\r\nits been long we all commented on this thread', 'toyes', 'Mon, 04 Dec, 2017', '10:47 pm', 0, 0),
(6, 1, ' \r\n						ok right					', 'toyosi', 'Wed, 06 Dec, 2017', '05:02 pm', 0, 0),
(7, 2, 'ok bro,\r\nwe''re good		', 'toyosi', 'Wed, 06 Dec, 2017', '05:08 pm', 0, 0),
(8, 1, ' \r\n									lol		', 'toyes', 'Wed, 06 Dec, 2017', '09:25 pm', 0, 0),
(9, 3, ' \r\n											hvhvhjv vhvhj jvhjvhjv bjv hjvhjv', 'teedollzee', 'Fri, 08 Dec, 2017', '12:46 am', 0, 0),
(10, 4, ' \r\n											hmnhjfhjfhj mnvgvj vgv', 'teedollzee', 'Fri, 08 Dec, 2017', '10:54 am', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `sender_read` int(11) NOT NULL,
  `receiver_read` int(11) NOT NULL,
  `use1` int(11) NOT NULL,
  `use2` int(11) NOT NULL,
  `use3` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `sender`, `receiver`, `sender_read`, `receiver_read`, `use1`, `use2`, `use3`) VALUES
(1, ' \r\n		hi teedollzee\r\n						', 'toyes', 'teedollzee', 1, 1, 0, 0, 0),
(2, ' its toyes\r\n								', 'toyes', 'teedollzee', 1, 1, 0, 0, 0),
(3, ' \r\n				it''s toyosi o				', 'toyosi', 'teedollzee', 1, 1, 0, 0, 0),
(4, ' weldone sir\r\n								', 'toyosi', 'teedollzee', 1, 1, 0, 0, 0),
(5, ' \r\n					it.s kaffy			', 'kaffy', 'teedollzee', 1, 1, 0, 0, 0),
(6, ' \r\n								how you dey', 'kaffy', 'teedollzee', 1, 1, 0, 0, 0),
(7, ' \r\n								hope all is well', 'kaffy', 'teedollzee', 1, 1, 0, 0, 0),
(8, ' thanks toyes\r\n								', 'teedollzee', 'toyes', 1, 0, 0, 0, 0),
(9, ' \r\n								i''m good', 'teedollzee', 'toyes', 1, 0, 0, 0, 0),
(10, ' \r\n								thanks', 'teedollzee', 'toyosi', 1, 1, 0, 0, 0),
(11, ' \r\n								hfhfhfhgbnhgfh bhf', 'teedollzee', 'toyosi', 1, 1, 0, 0, 0),
(12, ' \r\n								one', 'teedollzee', 'toyes', 1, 0, 0, 0, 0),
(13, ' \r\n								two', 'teedollzee', 'toyes', 1, 0, 0, 0, 0),
(14, ' \r\n						ok 1		', 'toyosi', 'toyes', 1, 1, 0, 0, 0),
(15, ' \r\n								ok 2', 'toyosi', 'toyes', 1, 1, 0, 0, 0),
(16, ' \r\n								ok 3', 'toyosi', 'toyes', 1, 1, 0, 0, 0),
(17, ' \r\n								yes 1', 'kaffy', 'toyes', 1, 1, 0, 0, 0),
(18, ' \r\n								yes 2', 'kaffy', 'toyes', 1, 1, 0, 0, 0),
(19, ' \r\n								yes 3', 'kaffy', 'toyes', 1, 1, 0, 0, 0),
(20, ' \r\n								yes 4', 'kaffy', 'toyes', 1, 1, 0, 0, 0),
(21, ' \r\n								', 'kaffy', 'toyes', 1, 1, 0, 0, 0),
(22, ' fine 1\r\n								', 'kaffy', 'toyes', 1, 0, 0, 0, 0),
(23, ' fine 2\r\n								', 'kaffy', 'toyes', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `dates` varchar(55) NOT NULL,
  `timess` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `topic`, `cat_id`, `body`, `created_by`, `dates`, `timess`) VALUES
(1, '  How far everyone. Hope you''re all good', 5, '  \r\n							Yes, we are good\r\nThanks', 'teedollzee', 'Mon, 04 Dec, 2017', '10:17 am'),
(2, 'How''s everyone doing on this platform', 3, 'How''s everyone doing on this platform\r\n\r\nHow''s everyone doing on this platform  \r\n							', 'toyosi', 'Wed, 06 Dec, 2017', '05:07 pm'),
(3, 'This is the second one joor', 3, '  iiihihihihihihih hihihih iihihihih  ihihi ugugu ddsfusfhuhf sdsfhufh sisfhfh ihih\r\n							', 'teedollzee', 'Fri, 08 Dec, 2017', '12:45 am'),
(4, 'ghfjhfjvnh ghjgjhg jgjgj jgjhg', 12, 'kjgjgjhg hjfjhfhjf hfghfhgf hfhfhjfhj hfghfh  \r\n							', 'teedollzee', 'Fri, 08 Dec, 2017', '10:54 am');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `about_you` text,
  `picture` blob,
  `use1` int(11) DEFAULT NULL,
  `use2` int(11) DEFAULT NULL,
  `use3` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `c_password`, `gender`, `about_you`, `picture`, `use1`, `use2`, `use3`) VALUES
(1, 'Olagunju', 'Adetayo', 'teedollzee', 'ake@gmail.com', 'adetayo', 'adetayo', 'Male', '  \r\n							it''s in me', 0x706963747572652f6d616c65757365722e706e67, NULL, NULL, NULL),
(2, 'Omodara', 'Toyeebat', 'toyes', 'toyes@gmail.com', 'toyibat', 'toyibat', 'Female', '  This feels good\r\n							', 0x706963747572652f6d616c65757365722e706e67, NULL, NULL, NULL),
(3, 'Omobola', 'Kafayat', 'kaffy', 'kaffy@gmail.com', 'kafayat', 'kafayat', 'Female', '  \r\n							ok now', 0x706963747572652f66656d616c65757365722e706e67, NULL, NULL, NULL),
(4, 'Ademola', 'Toyosi', 'toyosi', 'toyosi@gmail.com', 'toyosi', 'toyosi', 'Female', '  She dey alright\r\n							', 0x706963747572652f66656d616c65757365722e706e67, NULL, NULL, NULL),
(5, 'Adetayo', 'sahees', 'ade', 'ade@gmail.com', 'adetayo', 'adetayo', 'Male', '  \r\n							i''m cool', 0x706963747572652f6d616c65757365722e706e67, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
