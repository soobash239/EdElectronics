-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 10:51 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
`id` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `fullname`, `username`, `email`, `password`, `type`) VALUES
(2, 'admin', 'admin123', 'admin@gmail.com', '$2y$10$K6FGyocG29bVxlpF3A5u2.Xm1bNgDxg6.vvnGZmnmdg.5n2hDugqu', 'admin'),
(6, 'admin11', 'admin11', 'admin1@gmail.com', 'addmin', 'admin'),
(9, 'admin', 'admin', 'admin1@gmail.com', '$2y$10$jaOLGPzsSdGripzCHXR7wuszUdzlMge1i/ozgEFf7xL./iIl2ztpC', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
`id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `name`) VALUES
(5, 'COMPUTER'),
(14, 'PHONES'),
(16, 'TABLETS'),
(18, 'TV'),
(20, 'CAMERA'),
(21, 'HEADSET');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE IF NOT EXISTS `tb_product` (
`p_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`p_id`, `cat_id`, `name`, `price`, `description`, `image`) VALUES
(13, 14, 'Xia', 55, 'Xiaa', '20181018173037_13719.jpg'),
(14, 5, 'iphone', 1000, 'Apple product', '1.jpg'),
(15, 14, 'iphone 6s', 1000, 'apple iphone 6s ', '2.jpg'),
(20, 18, 'Samsung OLED', 500, 'Samsung TV', '1.tv.jpg'),
(21, 18, 'LG ', 5000, 'LG TV Lifes Good', '2.tv.jpg'),
(22, 16, 'Ipad', 1000, 'Ipad is the product of apple', '1.t.jpg'),
(23, 16, 'apple ipod', 150, 'ipod apple', '2.t.jpg'),
(25, 5, 'Samsung', 10000, 'It is the best', '1com.jpg'),
(26, 18, 'Kenstar', 5000, 'It is the TV that i have in my home', '2t.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_review`
--

CREATE TABLE IF NOT EXISTS `tb_review` (
`r_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_review`
--

INSERT INTO `tb_review` (`r_id`, `u_id`, `p_id`, `review`) VALUES
(7, 315, 14, 'nicw'),
(9, 315, 20, 'best tv brand in the world'),
(10, 315, 20, 'such a good display'),
(11, 315, 15, 'best phone'),
(12, 315, 13, 'oh nice phone'),
(13, 315, 22, 'best tablets ipad');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
`id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB AUTO_INCREMENT=343 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `fullname`, `username`, `email`, `password`, `type`) VALUES
(315, 'SooBash', 'soobash', 'soobash123@gmail.com', 'soobash11', 'user'),
(339, 'saurav', 'saurav', 'saurav@gmail.com', '$2y$10$Q457cCj8urUT/1awWoutvO1ZW0lz/Cdnn.xchQc.0zjMtE7L6wpGa', 'user'),
(341, 'sagar', 'sagar', 'sagar@gmail.com', '$2y$10$rLNI92Mg.UEbQ33T.e3hCe5fRo9xGzNMFzxI1s0CZ/Y9OZMWVQQA6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
 ADD PRIMARY KEY (`p_id`), ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tb_review`
--
ALTER TABLE `tb_review`
 ADD PRIMARY KEY (`r_id`), ADD KEY `u_id` (`u_id`), ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_review`
--
ALTER TABLE `tb_review`
MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=343;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
ADD CONSTRAINT `tb_product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tb_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_review`
--
ALTER TABLE `tb_review`
ADD CONSTRAINT `tb_review_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_review_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `tb_product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
