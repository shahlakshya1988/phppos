-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 24, 2019 at 02:42 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_db`
--
CREATE DATABASE IF NOT EXISTS `pos_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pos_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catid` int(255) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catid`, `category`) VALUES
(2, 'Mobile'),
(3, 'Computer'),
(4, 'Tablet'),
(5, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

DROP TABLE IF EXISTS `tbl_invoice`;
CREATE TABLE IF NOT EXISTS `tbl_invoice` (
  `invoice_id` int(255) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `orderdate` varchar(255) NOT NULL,
  `orderdate_timestamp` varchar(255) NOT NULL,
  `subtotal` double NOT NULL,
  `tax` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_details`
--

DROP TABLE IF EXISTS `tbl_invoice_details`;
CREATE TABLE IF NOT EXISTS `tbl_invoice_details` (
  `invoice_details_id` int(255) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(255) NOT NULL,
  `productid` int(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `orderdate` varchar(255) NOT NULL,
  `orderdate_timestamp` int(255) NOT NULL,
  PRIMARY KEY (`invoice_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productid` int(255) NOT NULL AUTO_INCREMENT,
  `productname` varchar(255) NOT NULL,
  `productcategory` varchar(255) NOT NULL,
  `purchaseprice` float NOT NULL,
  `sellprice` float NOT NULL,
  `stock` int(255) NOT NULL,
  `description` text NOT NULL,
  `productimage` varchar(255) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productid`, `productname`, `productcategory`, `purchaseprice`, `sellprice`, `stock`, `description`, `productimage`) VALUES
(5, 'Dell Studio 1535', '5', 50000, 60000, 5, 'Laptop with durable keyboard', '5d348184cda7f9.23368946.jpg'),
(6, 'Iphone 5', '2', 25000, 30000, 10, 'This is iphone by company apple', '5d3481b0d51827.90402619.jpg'),
(7, 'Ipad', '4', 60000, 70000, 20, 'Tablet By Apple', '5d3481d6d89638.59282845.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userid` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `useremail`, `password`, `role`) VALUES
(1, 'lakshya', 'lakshya@example.com', '123', 'Admin'),
(2, 'james', 'james@example.com', '123', 'User');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
