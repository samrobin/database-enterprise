-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2016 at 08:55 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `id_bar` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_bra` int(11) NOT NULL,
  `kode_bar` varchar(10) NOT NULL,
  `nama_bar` varchar(20) NOT NULL,
  `hargabeli_bar` int(30) NOT NULL,
  `hargajual_bar` int(30) NOT NULL,
  `stok_bar` int(10) NOT NULL,
  `foto_bar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `master_barang`:
--   `id_bra`
--       `master_brand` -> `id_bra`
--   `id_cat`
--       `master_category` -> `id_cat`
--   `id_toko`
--       `master_toko` -> `id_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_brand`
--

CREATE TABLE `master_brand` (
  `id_bra` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_bra` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `master_brand`:
--   `id_toko`
--       `master_toko` -> `id_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_category`
--

CREATE TABLE `master_category` (
  `id_cat` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_cat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `master_category`:
--   `id_toko`
--       `master_toko` -> `id_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_customer`
--

CREATE TABLE `master_customer` (
  `id_cust` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_cust` varchar(30) NOT NULL,
  `alamat_cust` varchar(50) NOT NULL,
  `jk_cust` varchar(10) NOT NULL,
  `telp_cust` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `master_customer`:
--   `id_toko`
--       `master_toko` -> `id_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `id_sup` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_sup` varchar(30) NOT NULL,
  `alamat_sup` varchar(50) NOT NULL,
  `jk_sup` varchar(10) NOT NULL,
  `telp_sup` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `master_supplier`:
--   `id_toko`
--       `master_toko` -> `id_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_toko`
--

CREATE TABLE `master_toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(20) NOT NULL,
  `kategori_toko` varchar(20) NOT NULL,
  `alamat_toko` varchar(50) NOT NULL,
  `telp_toko` int(15) NOT NULL,
  `email_toko` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `master_toko`:
--

--
-- Dumping data for table `master_toko`
--

INSERT INTO `master_toko` (`id_toko`, `nama_toko`, `kategori_toko`, `alamat_toko`, `telp_toko`, `email_toko`) VALUES
(4, 'Toko Robin', 'gadget', 'Lontar V', 0, '098698492'),
(5, 'susu', 'fashion', 'Bekasi', 0, '0829328323'),
(6, 'asdsa', 'gadget', 'asdas', 0, 'asdasd'),
(7, 'sdadas', 'fashion', 'asdas', 0, 'asdas'),
(8, 'asdas', 'gadget', 'asdsa', 0, 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `jk_user` varchar(10) NOT NULL,
  `alamat_user` varchar(50) NOT NULL,
  `telp_user` int(15) NOT NULL,
  `jabatan_user` varchar(20) NOT NULL,
  `foto_user` text NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `master_user`:
--

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id_user`, `nama_user`, `jk_user`, `alamat_user`, `telp_user`, `jabatan_user`, `foto_user`, `password`, `email`) VALUES
(1, 'sa', 'laki', 'lontar V no. 15', 836354235, 'Mahasiswa', '', '1234', 'acong@yahoo.com'),
(20, 'robin', '', '', 0, '', '', 'robin', 'robin@yahoo.com'),
(21, 'richie', '', '', 0, '', '', '0000', 'ocol@ocol.com'),
(22, 'asdasd', '', '', 0, '', '', 'asdsad', 'asdas@df'),
(23, 'addasd', '', '', 0, '', '', 'asdasda', 'asdasd@dsa'),
(24, 'asdsad', '', '', 0, '', '', 'asdsa', 'asdas@asd');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id_beli` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_sup` int(11) NOT NULL,
  `id_bar` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `jumlah_bar` int(10) NOT NULL,
  `grandtotal_beli` int(30) NOT NULL,
  `totalharga_beli` int(30) NOT NULL,
  `subtotal_beli` int(30) NOT NULL,
  `keterangan_beli` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `transaksi_pembelian`:
--   `id_bar`
--       `master_barang` -> `id_bar`
--   `id_sup`
--       `master_supplier` -> `id_sup`
--   `id_toko`
--       `master_toko` -> `id_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_jual` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_bar` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `tgl_jual` int(11) NOT NULL,
  `jumlah_bar` int(10) NOT NULL,
  `grandtotal_jual` int(30) NOT NULL,
  `totalharga_jual` int(30) NOT NULL,
  `subtotal_jual` int(30) NOT NULL,
  `keterangan_jual` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `transaksi_penjualan`:
--   `id_bar`
--       `master_barang` -> `id_bar`
--   `id_cust`
--       `master_customer` -> `id_cust`
--   `id_toko`
--       `master_toko` -> `id_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_toko`
--

CREATE TABLE `user_toko` (
  `id_tx` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `user_toko`:
--   `id_toko`
--       `master_toko` -> `id_toko`
--   `id_user`
--       `master_user` -> `id_user`
--

--
-- Dumping data for table `user_toko`
--

INSERT INTO `user_toko` (`id_tx`, `id_toko`, `id_user`) VALUES
(1, 4, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`id_bar`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `master_brand`
--
ALTER TABLE `master_brand`
  ADD PRIMARY KEY (`id_bra`);

--
-- Indexes for table `master_category`
--
ALTER TABLE `master_category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `master_customer`
--
ALTER TABLE `master_customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`id_sup`);

--
-- Indexes for table `master_toko`
--
ALTER TABLE `master_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `user_toko`
--
ALTER TABLE `user_toko`
  ADD PRIMARY KEY (`id_tx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `id_bar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_brand`
--
ALTER TABLE `master_brand`
  MODIFY `id_bra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_category`
--
ALTER TABLE `master_category`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_customer`
--
ALTER TABLE `master_customer`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_supplier`
--
ALTER TABLE `master_supplier`
  MODIFY `id_sup` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_toko`
--
ALTER TABLE `master_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_toko`
--
ALTER TABLE `user_toko`
  MODIFY `id_tx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
