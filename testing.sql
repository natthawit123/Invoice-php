-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 05:23 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `add1`
--

CREATE TABLE `add1` (
  `id` int(11) NOT NULL,
  `projact_invoice` varchar(200) NOT NULL,
  `item_invoice` varchar(200) NOT NULL,
  `desciption_invoice` varchar(200) NOT NULL,
  `quantity_invoice` varchar(200) NOT NULL,
  `price_invoice` varchar(200) NOT NULL,
  `amount_invoice` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add1`
--

INSERT INTO `add1` (`id`, `projact_invoice`, `item_invoice`, `desciption_invoice`, `quantity_invoice`, `price_invoice`, `amount_invoice`) VALUES
(28, 'ไก่ล้านตัว', '1', 'กดหกผด', '2000', '1', '2000'),
(29, 'ไก่ล้านตัว', '2', 'sdsadaa', '1111', '1', '111'),
(30, 'ไก่ล้านตัว', '3', 'dfsdfds', '1111', '2000', '1212'),
(31, 'ไก่ล้านตัว2', '1', 'กดหกผด', '2000', '2000', '1'),
(32, 'ไก่ล้านตัว2', '2', 'ffdfdfddf', '2000', '2000', '1212'),
(33, 'ไก่ล้านตัว2', '3', 'sdsadaa', '2000', '2000', '111');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `projact_invoice` varchar(255) NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `date_invoice` date NOT NULL,
  `namecus_invoice` varchar(255) NOT NULL,
  `address_invoice` text NOT NULL,
  `idtax_invoice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `projact_invoice`, `no_invoice`, `date_invoice`, `namecus_invoice`, `address_invoice`, `idtax_invoice`) VALUES
(15, 'ไก่ล้านตัว', '01', '2021-01-23', 'ศรัญญา เผ่าภูรี', '141', '984665165464'),
(16, 'ไก่ล้านตัว2', '02', '2021-01-27', 'ศรัญญา เผ่าภูรี', '141', '651132116541');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_total`
--

CREATE TABLE `invoice_total` (
  `id` int(11) NOT NULL,
  `projact_invoice` varchar(255) NOT NULL,
  `total_invoice` int(11) NOT NULL,
  `vat_invoice` int(11) NOT NULL,
  `net_invoice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add1`
--
ALTER TABLE `add1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_total`
--
ALTER TABLE `invoice_total`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add1`
--
ALTER TABLE `add1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invoice_total`
--
ALTER TABLE `invoice_total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
