-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 04:43 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(2, 'Shirt'),
(4, 'Shoe'),
(7, 'music box'),
(8, 'keyring'),
(9, 'Pant'),
(10, 'Sunglass');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `cashier_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `time_order` varchar(50) NOT NULL,
  `total` float NOT NULL,
  `paid` float NOT NULL,
  `due` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `cashier_name`, `order_date`, `time_order`, `total`, `paid`, `due`) VALUES
(38, 'rafee', '2019-11-05', '13:13', 380000, 500000, -120000),
(41, 'rafee', '2019-11-26', '11:12', 320000, 330000, -10000),
(44, 'rafee', '2019-11-26', '12:07', 285000, 300000, -15000),
(46, 'aji', '2019-11-27', '18:42', 412000, 415000, -3000),
(107, 'omi', '2020-09-25', '', 600, 500, 100),
(108, 'omi', '2020-09-25', '', 600, 500, 100),
(109, 'omi', '2020-09-25', '', 600, 600, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id` int(11) NOT NULL,
  `pId` int(11) NOT NULL,
  `pCode` char(6) NOT NULL,
  `pName` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_detail`
--

INSERT INTO `invoice_detail` (`id`, `pId`, `pCode`, `pName`, `qty`, `price`, `total`, `order_date`) VALUES
(47, 2, 'TT0001', 'Shirt', 1, 22000, 22000, '2019-10-25'),
(48, 12, 'TT0040', 'Pant', 1, 95000, 95000, '2019-10-25'),
(49, 14, 'RR0022', 'Shoe', 2, 35000, 70000, '2019-10-26'),
(54, 0, '15', 'balbal', 1, 15, 15, '2020-09-24'),
(55, 0, 'm1', 'bella chao', 5, 600, 3000, '2020-09-24'),
(56, 0, 'm1', 'bella chao', 5, 600, 3000, '2020-09-24'),
(57, 0, 'm1', 'bella chao', 5, 600, 3000, '2020-09-24'),
(58, 0, 'm1', 'bella chao', 5, 600, 3000, '2020-09-24'),
(59, 0, 'm1', 'bella chao', 3, 500, 1500, '2020-09-24'),
(60, 0, 'm1', 'bella chao', 3, 500, 1500, '2020-09-24'),
(61, 0, 'm1', 'bella chao', 1, 12, 12, '2020-09-24'),
(62, 0, 'm1', 'bella chao', 3, 500, 1500, '2020-09-24'),
(63, 0, 'm1', 'bella chao', 2, 12, 24, '2020-09-24'),
(64, 0, 'm1', 'bella chao', 3, 123, 1222, '2020-09-24'),
(65, 0, 'm1', 'bella chao', 3, 600, 1234, '2020-09-25'),
(66, 0, 'm1', 'bella chao', 5, 1212, 121212, '2020-09-25'),
(67, 0, 'm', 'bella chao', 5, 1111, 111, '2020-09-25'),
(68, 0, 'm', 'bella chao', 3, 121212, 121212, '2020-09-25'),
(69, 0, 'm', 'bella chao', 6, 121212, 121212, '2020-09-25'),
(70, 0, 'm', 'bella chao', 4, 1212, 1212, '2020-09-25'),
(71, 0, '2', 'harry potter', 0, 1111, 1111, '2020-09-25'),
(72, 0, 'm2', 'bella chao', 3, 1212, 1212, '2020-09-25'),
(74, 0, 'm2', 'bella chao', 5, 1212, 1212, '2020-09-25'),
(75, 0, 'm2', 'hahahaadasdasdads', 5, 1212, 1212, '2020-09-25'),
(76, 0, 'm2', 'bella chao', 3, 123, 12, '2020-09-25'),
(77, 0, 'm2', 'hahaha', 3, 122, 12, '2020-09-25'),
(78, 0, 'm1', 'bella chao', 2, 1212, 1212, '2020-09-25'),
(79, 0, 'm3', 'hahahaadasdasdads', 2, 222, 222, '2020-09-25'),
(88, 0, 'm1', 'bella chao', 2, 0, 22, '2020-09-25'),
(89, 0, 'm1', '', 2, 0, 0, '2020-09-25'),
(105, 0, '', 'asdasd', 0, 0, 0, '2020-09-25'),
(106, 0, '', '', 0, 0, 0, '2020-09-25'),
(107, 0, '', '', 0, 0, 0, '2020-09-25'),
(108, 0, '', '', 0, 0, 0, '2020-09-25'),
(109, 0, '', 'sfsdfsdf', 0, 0, 0, '2020-09-25'),
(110, 0, 'm2', 'harry', 1, 600, 600, '2020-09-25'),
(111, 0, 'm2', 'harry', 1, 600, 600, '2020-09-25'),
(112, 0, 'm2', 'harry', 1, 600, 600, '2020-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pId` int(11) NOT NULL,
  `pCode` varchar(100) NOT NULL,
  `pName` varchar(100) NOT NULL,
  `pCategory` varchar(100) NOT NULL,
  `purchasePrice` float(10,0) NOT NULL,
  `sellPrice` float(10,0) NOT NULL,
  `pStock` int(100) NOT NULL,
  `minStock` int(100) NOT NULL,
  `pUnit` varchar(100) NOT NULL,
  `pDescription` varchar(200) NOT NULL,
  `pImg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pId`, `pCode`, `pName`, `pCategory`, `purchasePrice`, `sellPrice`, `pStock`, `minStock`, `pUnit`, `pDescription`, `pImg`) VALUES
(1, 'm1', 'bella chao', 'music box', 300, 600, 100, 5, '', 'wooden music box', '5f6cfea84c1c1.jpg'),
(2, 'm2', 'harry potter', 'music box', 300, 600, 94, 5, '', 'wooden music box', '5f6cfed58554f.jpg'),
(3, 'm3', 'HBD', 'music box', 400, 600, 10, 5, '', 'Music Box', ''),
(4, 'k2', 'keyring2', 'keyring', 180, 200, 20, 5, '', 'kering metal', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `role`) VALUES
(4, 'rafee', 'nahidraffi', '123', 'admin'),
(7, 'omi', 'mannada', '121212', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
