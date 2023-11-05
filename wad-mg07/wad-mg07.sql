-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 06:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wad-mg07`
--

-- --------------------------------------------------------

--
-- Table structure for table `toko_ede_jaya`
--

CREATE TABLE `toko_ede_jaya` (
  `kode_barang` varchar(32) NOT NULL,
  `nama_barang` varchar(32) NOT NULL,
  `harga_barang` int(12) NOT NULL,
  `stok_barang` int(12) NOT NULL,
  `gambar_barang` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko_ede_jaya`
--

INSERT INTO `toko_ede_jaya` (`kode_barang`, `nama_barang`, `harga_barang`, `stok_barang`, `gambar_barang`) VALUES
('DRINK001', 'Es Milo', 9000, 150, 'img/es-milo.png'),
('DRINK002', 'Coca Cola / Pepsi', 7000, 230, 'img/soda.jpg'),
('FOOD001', 'Burger', 15000, 99, 'img/burger-jpg.jpg'),
('FOOD002', 'Chicken Wings', 12000, 120, 'img/chicken-wings.jpg'),
('FOOD003', 'French Fries', 9000, 50, 'img/french-fries.jpg'),
('FOOD004', 'Chocolate Ice Cream', 12000, 45, 'img/ice-cream.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `toko_ede_jaya`
--
ALTER TABLE `toko_ede_jaya`
  ADD PRIMARY KEY (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
