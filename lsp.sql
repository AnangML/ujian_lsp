-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2026 at 11:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `perusahaan_cust` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `perusahaan_cust`, `alamat`) VALUES
(1, 'anang', 'bakerie', 'jaksel\r\n'),
(2, 'customer 2', 'perusahaan 2', 'jalan kp 2'),
(3, 'customer 3', 'perusahaan 3', 'jalan kampung 3'),
(4, 'customer 4', 'perusahaan 4', 'jalan kampung 4\r\n'),
(5, 'customer 5', 'perusahaan 5', 'jalan kampung 5');

-- --------------------------------------------------------

--
-- Table structure for table `detail_faktur`
--

CREATE TABLE `detail_faktur` (
  `id_produk` int NOT NULL,
  `no_faktur` int NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_faktur`
--

INSERT INTO `detail_faktur` (`id_produk`, `no_faktur`, `qty`, `price`) VALUES
(1, 1, 10, 1000),
(2, 1, 5, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `no_faktur` int NOT NULL,
  `tgl_faktur` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `metode_bayar` varchar(255) NOT NULL,
  `ppn` int NOT NULL,
  `dp` int NOT NULL,
  `grand_total` int NOT NULL,
  `user` varchar(255) NOT NULL,
  `id_customer` int NOT NULL,
  `id_perusahaan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`no_faktur`, `tgl_faktur`, `due_date`, `metode_bayar`, `ppn`, `dp`, `grand_total`, `user`, `id_customer`, `id_perusahaan`) VALUES
(1, '2026-06-25', '2026-06-30', 'Cash', 11, 100000, 110000, 'admin', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat`, `no_telp`, `tax`) VALUES
(1, 'sumber jamu', 'jaksel', '08747473', '5');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `stock` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `price`, `jenis`, `stock`) VALUES
(1, 'bodrek flu', 1000, 'obat flu', 100),
(2, 'panadol merah', 2000, 'panadol', 1000),
(4, 'tolak linu', 4000, 'jamu', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_faktur`
--
ALTER TABLE `detail_faktur`
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_faktur`
--
ALTER TABLE `detail_faktur`
  ADD CONSTRAINT `detail_faktur_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_faktur_ibfk_2` FOREIGN KEY (`no_faktur`) REFERENCES `faktur` (`no_faktur`);

--
-- Constraints for table `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `faktur_ibfk_2` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
