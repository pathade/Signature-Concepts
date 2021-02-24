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
-- Table structure for table `fin_purchase_invoice`
--

CREATE TABLE `fin_purchase_invoice` (
  `id_pk` int(11) NOT NULL,
  `fin_pi_no` int(11) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `pi_date` date NOT NULL,
  `fin_yr` varchar(100) NOT NULL,
  `supplier_id_fk` int(11) NOT NULL,
  `grn_no_fk` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_no` int(11) NOT NULL,
  `authorized_by` varchar(200) NOT NULL,
  `remark` text NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_sqfit` float NOT NULL,
  `total_amt` float NOT NULL,
  `proc_amt` float NOT NULL,
  `disc_per` float NOT NULL,
  `disc_rs` float NOT NULL,
  `trans_amt` float NOT NULL,
  `unload` float NOT NULL,
  `octroi` float NOT NULL,
  `gross_amt` float NOT NULL,
  `excise_per` float NOT NULL,
  `excise_amt` float NOT NULL,
  `exedu_per` float NOT NULL,
  `exedu_amt` float NOT NULL,
  `exhedu_per` float NOT NULL,
  `exhedu_amt` float NOT NULL,
  `tax_applicable` varchar(11) NOT NULL,
  `tax_per` float NOT NULL,
  `tax_amt` float NOT NULL,
  `freight` float NOT NULL,
  `insurance_per` float NOT NULL,
  `insurance_amt` float NOT NULL,
  `others` float NOT NULL,
  `net_amt` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fin_purchase_invoice`
--

INSERT INTO `fin_purchase_invoice` (`id_pk`, `fin_pi_no`, `branch`, `pi_date`, `fin_yr`, `supplier_id_fk`, `grn_no_fk`, `bill_date`, `bill_no`, `authorized_by`, `remark`, `total_qty`, `total_sqfit`, `total_amt`, `proc_amt`, `disc_per`, `disc_rs`, `trans_amt`, `unload`, `octroi`, `gross_amt`, `excise_per`, `excise_amt`, `exedu_per`, `exedu_amt`, `exhedu_per`, `exhedu_amt`, `tax_applicable`, `tax_per`, `tax_amt`, `freight`, `insurance_per`, `insurance_amt`, `others`, `net_amt`, `status`) VALUES
(1, 1, 'Signature Concepts LLP', '2021-01-09', '2020-2021', 1, 0, '2021-01-09', 0, 'abcd', 'remark', 10, 0, 138, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'yes', 18, 24.84, 0, 0, 0, 0, 0, 0),
(2, 2, 'Signature Concepts LLP', '2021-01-09', '2020-2021', 1, 0, '2021-01-09', 0, 'abcd1', 'remark 2', 10, 0, 135, 4, 4.3, 3, 1, 1, 1, 138, 0, 1, 0, 1, 0, 1, 'yes', 18, 24.84, 1, 0, 1, 10, 181.84, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fin_purchase_invoice`
--
ALTER TABLE `fin_purchase_invoice`
  ADD PRIMARY KEY (`id_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fin_purchase_invoice`
--
ALTER TABLE `fin_purchase_invoice`
  MODIFY `id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
