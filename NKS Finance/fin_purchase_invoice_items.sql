-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 08:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nks`
--

-- --------------------------------------------------------

--
-- Table structure for table `fin_purchase_invoice_items`
--

CREATE TABLE `fin_purchase_invoice_items` (
  `id_pk` int(11) NOT NULL,
  `fpi_id_fk` int(11) NOT NULL,
  `grn_id_fk` int(11) NOT NULL,
  `grn_item_id_fk` int(11) NOT NULL,
  `item_id_fk` int(11) NOT NULL,
  `item_type` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `sqfit` float NOT NULL,
  `rate` float NOT NULL,
  `amount` float NOT NULL,
  `process_amt` float NOT NULL,
  `bill_disc` float NOT NULL,
  `bill_amt` float NOT NULL,
  `tax` float NOT NULL,
  `tax_amt` float NOT NULL,
  `net_amt` float NOT NULL,
  `trans/oct` float NOT NULL,
  `italian_sqfit` float NOT NULL,
  `italian_slides` varchar(200) NOT NULL,
  `gst_per` float NOT NULL,
  `cgst` float NOT NULL,
  `sgst` float NOT NULL,
  `igst` float NOT NULL,
  `cess_per` float NOT NULL,
  `cess_amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fin_purchase_invoice_items`
--

INSERT INTO `fin_purchase_invoice_items` (`id_pk`, `fpi_id_fk`, `grn_id_fk`, `grn_item_id_fk`, `item_id_fk`, `item_type`, `size`, `qty`, `sqfit`, `rate`, `amount`, `process_amt`, `bill_disc`, `bill_amt`, `tax`, `tax_amt`, `net_amt`, `trans/oct`, `italian_sqfit`, `italian_slides`, `gst_per`, `cgst`, `sgst`, `igst`, `cess_per`, `cess_amt`) VALUES
(1, 1, 1, 1, 5, 'ATTAR', '100 ml', 4, 0, 12, 48, 0, 0, 0, 0, 0, 48, 0, 0, '', 18, 8.64, 8.64, 17.28, 0, 0),
(2, 1, 2, 2, 5, 'ATTAR', '100 ml', 6, 0, 15, 90, 0, 0, 0, 0, 0, 90, 0, 0, '', 18, 16.2, 16.2, 32.4, 0, 0),
(3, 2, 1, 1, 5, 'ATTAR', '100 ml', 4, 0, 12, 48, 2, 2.08, 1, 0, 0, 47, 0, 0, '', 18, 8.46, 8.46, 16.92, 0, 0),
(4, 2, 2, 2, 5, 'ATTAR', '100 ml', 6, 0, 15, 90, 2, 2.22, 2, 0, 0, 88, 0, 0, '', 18, 15.84, 15.84, 31.68, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fin_purchase_invoice_items`
--
ALTER TABLE `fin_purchase_invoice_items`
  ADD PRIMARY KEY (`id_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fin_purchase_invoice_items`
--
ALTER TABLE `fin_purchase_invoice_items`
  MODIFY `id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
