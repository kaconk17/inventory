-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 18, 2019 at 04:00 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `TB_BARANG`
--

CREATE TABLE `TB_BARANG` (
  `ID_BARANG` int(20) NOT NULL,
  `KODE_BARANG` varchar(6) NOT NULL,
  `NAMA_BARANG` varchar(50) NOT NULL,
  `SATUAN` varchar(10) NOT NULL,
  `HARGA_BARANG` decimal(18,3) NOT NULL,
  `CURRENCY` varchar(4) NOT NULL,
  `ID_VENDOR` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TB_BARANG`
--

INSERT INTO `TB_BARANG` (`ID_BARANG`, `KODE_BARANG`, `NAMA_BARANG`, `SATUAN`, `HARGA_BARANG`, `CURRENCY`, `ID_VENDOR`) VALUES
(1, 'A0001', 'Sirup ABC 1000ml', 'Pcs', '25000.000', 'IDR', 1),
(3, 'I0001', 'Indomie Goreng', 'Box', '50000.000', 'IDR', 4);

-- --------------------------------------------------------

--
-- Table structure for table `TB_ORDER`
--

CREATE TABLE `TB_ORDER` (
  `ID_ORDER` int(20) NOT NULL,
  `ID_PERMINTAAN` int(20) NOT NULL,
  `HARGA_TOTAL` decimal(8,2) NOT NULL,
  `APPROVAL` varchar(10) NOT NULL,
  `STATUS_ORDER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TB_PERMINTAAN`
--

CREATE TABLE `TB_PERMINTAAN` (
  `ID_PERMINTAAN` int(20) NOT NULL,
  `TANGGAL_PERMINTAAN` date NOT NULL,
  `ID_BARANG` int(20) NOT NULL,
  `QTY_BARANG` decimal(10,0) NOT NULL,
  `TANGGAL_KIRIM` date NOT NULL,
  `STATUS_PERMINTAAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TB_PERMINTAAN`
--

INSERT INTO `TB_PERMINTAAN` (`ID_PERMINTAAN`, `TANGGAL_PERMINTAAN`, `ID_BARANG`, `QTY_BARANG`, `TANGGAL_KIRIM`, `STATUS_PERMINTAAN`) VALUES
(1, '2019-05-18', 3, '5', '2019-05-27', ''),
(3, '2019-05-18', 1, '10', '2019-05-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `TB_USER`
--

CREATE TABLE `TB_USER` (
  `ID_USER` int(8) NOT NULL,
  `NAMA_USER` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `LEVEL_USER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TB_USER`
--

INSERT INTO `TB_USER` (`ID_USER`, `NAMA_USER`, `PASSWORD`, `LEVEL_USER`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(2, 'wh', 'd764022e72480fa96081956c8a34fafd708e8fcd', 'warehouse'),
(3, 'pc', '793d6d7c60bd6329d6f91fdb8c1b53aab99bf3da', 'purchasing'),
(6, 'mg', '191be3715bae070c2198402843567588417de697', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `TB_VENDOR`
--

CREATE TABLE `TB_VENDOR` (
  `ID_VENDOR` int(10) NOT NULL,
  `NAMA_VENDOR` varchar(50) NOT NULL,
  `ALAMAT_VENDOR` varchar(100) NOT NULL,
  `TELP_VENDOR` varchar(20) NOT NULL,
  `EMAIL_VENDOR` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TB_VENDOR`
--

INSERT INTO `TB_VENDOR` (`ID_VENDOR`, `NAMA_VENDOR`, `ALAMAT_VENDOR`, `TELP_VENDOR`, `EMAIL_VENDOR`) VALUES
(1, 'CV. ABCD', 'Bangil', '03439958968', 'abc@abc.com'),
(2, 'CV. Maju jaya', 'surabaya', '0314455688', 'maju@gmail.com'),
(4, 'PT. Indofood', 'Beiji', '03430086958', 'sales@indofood.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TB_BARANG`
--
ALTER TABLE `TB_BARANG`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `ID_VENDOR` (`ID_VENDOR`);

--
-- Indexes for table `TB_ORDER`
--
ALTER TABLE `TB_ORDER`
  ADD PRIMARY KEY (`ID_ORDER`),
  ADD KEY `ID_PERMINTAAN` (`ID_PERMINTAAN`);

--
-- Indexes for table `TB_PERMINTAAN`
--
ALTER TABLE `TB_PERMINTAAN`
  ADD PRIMARY KEY (`ID_PERMINTAAN`),
  ADD KEY `ID_BARANG` (`ID_BARANG`);

--
-- Indexes for table `TB_USER`
--
ALTER TABLE `TB_USER`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `TB_VENDOR`
--
ALTER TABLE `TB_VENDOR`
  ADD PRIMARY KEY (`ID_VENDOR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TB_BARANG`
--
ALTER TABLE `TB_BARANG`
  MODIFY `ID_BARANG` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `TB_ORDER`
--
ALTER TABLE `TB_ORDER`
  MODIFY `ID_ORDER` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TB_PERMINTAAN`
--
ALTER TABLE `TB_PERMINTAAN`
  MODIFY `ID_PERMINTAAN` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `TB_USER`
--
ALTER TABLE `TB_USER`
  MODIFY `ID_USER` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `TB_VENDOR`
--
ALTER TABLE `TB_VENDOR`
  MODIFY `ID_VENDOR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `TB_BARANG`
--
ALTER TABLE `TB_BARANG`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`ID_VENDOR`) REFERENCES `TB_VENDOR` (`ID_VENDOR`) ON UPDATE NO ACTION;

--
-- Constraints for table `TB_ORDER`
--
ALTER TABLE `TB_ORDER`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`ID_PERMINTAAN`) REFERENCES `TB_PERMINTAAN` (`ID_PERMINTAAN`) ON UPDATE NO ACTION;

--
-- Constraints for table `TB_PERMINTAAN`
--
ALTER TABLE `TB_PERMINTAAN`
  ADD CONSTRAINT `tb_permintaan_ibfk_1` FOREIGN KEY (`ID_BARANG`) REFERENCES `TB_BARANG` (`ID_BARANG`) ON UPDATE NO ACTION;
