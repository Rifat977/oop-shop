-- phpMyAdmin SQL Dump
-- version 4.1.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2020 at 11:16 PM
-- Server version: 5.1.67-andiunpam
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cmnt`
--

CREATE TABLE IF NOT EXISTS `cmnt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `proId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `cmnt`
--

INSERT INTO `cmnt` (`id`, `name`, `comment`, `proId`) VALUES
(19, 'Rifat Hasan', 'Nice', 25),
(18, 'Rifat Hasan', 'Nice', 25),
(17, 'Rifat Hasan', 'Wow', 19),
(16, 'Rifat Hasan', 'This product is awesome,,,', 19);

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE IF NOT EXISTS `db_user` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Rifat Hasan', 'rifathasan', 'admin@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Different'),
(3, 'Samsung'),
(4, 'Canon'),
(2, 'Acer'),
(6, 'Huwei'),
(7, 'Redmi'),
(8, 'Vivo'),
(9, 'Nikon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cartId` int(11) NOT NULL AUTO_INCREMENT,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(77, 'fveb40rn98u5ltigpgn9m164q0', 15, 'Laptop', 55.56, 1, 'upload/4c1b7d7fe3.jpeg'),
(80, '1a9np3v0ioma7l0iv41oumcci5', 17, 'Iphone X', 45.56, 1, 'upload/4a5693fac2.jpeg'),
(21, '3760h4osoh8uqel660bltfri42', 15, 'Laptop', 55.56, 5, 'upload/cd70a2fa34.jpg'),
(75, '9juaias5pb2lpj85ljbp5s95d7', 17, 'Iphone X', 45.56, 1, 'upload/4a5693fac2.jpeg'),
(19, 'evlsk1m9hobb6i1ia5fbbms790', 15, 'Laptop', 55.56, 1, 'upload/cd70a2fa34.jpg'),
(17, '5olgu6ihqldfmraeh3m1sprsd0', 15, 'Laptop', 55.56, 1, 'upload/cd70a2fa34.jpg'),
(18, '6tmogsad069dh9gp8ggh5alpf2', 17, 'Iphone', 45.56, 1, 'upload/3df0e647c2.jpg'),
(83, '4cabmu7k0bkr3fsadlaqp1sff1', 18, 'J7 Prime Cover', 150, 1, 'upload/28e1d817db.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catId` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Mobile'),
(2, 'Earphone'),
(5, 'Camera'),
(7, 'Laptop'),
(8, 'Cover');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `rand` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`, `rand`) VALUES
(1, 'Rifat Hasan', 'Dhaka, Bangladesh, Dhanmondi', 'Dhaka', 'Bangladesh', '1207', '01860225940', 'itscrifat5147@gmail.com', 'abcd1234', ''),
(2, 'Rifat Hasan', 'Dhaka, Bangladesh, Dhanmondi', 'Dhaka', 'Bangladesh', '1205', '01860225940', 'rifatbhai97@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', ''),
(3, 'Rifat Hasan', 'Dhaka, Bangladesh, Dhamrai', 'Dhaka', 'Bangladesh', '1207', '01736506590', 'mdrefat622@gmail.com', 'e80b5017098950fc58aad83c8c14978e', '2df2dc3034ec111f4d41b2841f4ea9b2'),
(4, 'Rifat Hasan', 'Dhaka, Bangladesh, Dhamrai', 'Dhaka', 'Bangladesh', '1207', '01736506590', 'Abm@gmail.com', 'e19d5cd5af0378da05f63f891c7467af', ''),
(5, 'Rifat Hasan', 'Dhaka, Bangladesh, Dhamrai', 'Dhaka', 'Bangladesh', '', '01736506590', 'Abcd@gmail.com', 'e19d5cd5af0378da05f63f891c7467af', ''),
(6, 'Rifat Hasan', 'Dhaka, Bangladesh, Dhamrai', 'Dhaka', 'Bangladesh', '1207', '01736506590', 'mdrefat6223@gmail.com', 'e19d5cd5af0378da05f63f891c7467af', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float NOT NULL,
  `delPrice` float NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `delPrice`, `image`, `type`) VALUES
(24, 'MI mobile Cover', 8, 7, 'aptop', 150, 0, 'upload/2a26b5eb71.jpeg', 1),
(19, 'D1 Earphone', 2, 1, '1 Earphone', 200, 0, 'upload/20d0b70056.jpeg', 0),
(23, 'Acer Laptop', 7, 2, 'aptop', 50000, 0, 'upload/ab3f694c08.jpeg', 1),
(22, 'Earphone', 2, 7, ' earphone', 250, 0, 'upload/0b3b230026.jpeg', 1),
(25, 'Canon 5D', 5, 4, 'aptop', 200000, 0, 'upload/be1708de5a.jpeg', 0),
(26, 'MI mobile Cover', 8, 7, 'aptop', 150, 0, 'upload/f4f27446ce.jpeg', 0),
(27, 'Redmi Phone', 1, 7, 'aptop', 90000, 0, 'upload/c381d578bb.jpeg', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
