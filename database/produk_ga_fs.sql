-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2019 at 04:45 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `produk_ga_fs`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `kategori_barang` varchar(50) NOT NULL,
  `tingkat_kebutuhan` int(11) NOT NULL,
  `jumlah_dalam_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `kategori_barang`, `tingkat_kebutuhan`, `jumlah_dalam_kategori`) VALUES
(1, 'Drum', 'Mechanical', 4, 2),
(2, 'Vessel D-205 & D-305', 'Mechanical', 4, 2),
(3, 'Heat Exchanger', 'Mechanical', 4, 2),
(4, 'Over Head Crane', 'Mechanical', 4, 2),
(5, 'Generator Fuel Oil Tank (T-501)', 'Mechanical', 4, 2),
(6, 'Fuel Oil Pump', 'Mechanical', 4, 2),
(7, 'Service Water tank (T-502)', 'Mechanical', 4, 2),
(8, 'Marine Loading Arm', 'Mechanical', 4, 2),
(9, 'Fire Pump', 'Mechanical', 4, 2),
(10, 'Jockey Pump', 'Mechanical', 4, 2),
(11, 'Propane/Butane Line Mixer, Cap 214,500 kg/hr', 'Mechanical', 4, 2),
(12, 'Pipe ERW', 'Piping', 4, 2),
(13, 'Pipe Seamless', 'Piping', 4, 2),
(14, 'Pipe GRE', 'Piping', 4, 2),
(15, 'Fitting & Flanges GRE', 'Piping', 4, 2),
(16, 'Fitting & Flanges', 'Piping', 4, 2),
(17, 'Manual Valves', 'Piping', 4, 2),
(18, 'Specialities Y-Strainer', 'Piping', 4, 2),
(19, 'Bolts & Nut', 'Piping', 4, 2),
(20, 'Gasket', 'Piping', 4, 2),
(21, 'Insulation', 'Piping', 4, 2),
(22, 'Flexible Rubber Hose', 'Piping', 4, 2),
(23, 'DCS & EDS System (incl TAS)', 'Instrument', 3, 2),
(24, 'F&G Detector and ESD Push Button', 'Instrument', 3, 2),
(25, 'Deluge Valve', 'Instrument', 3, 2),
(26, 'Instrument Cable and FO', 'Instrument', 3, 2),
(27, 'Telephone and CCTV System', 'Instrument', 3, 2),
(28, 'Automatic Tank Gauge System', 'Instrument', 3, 2),
(29, 'SDV', 'Instrument', 3, 2),
(30, 'MOV ', 'Instrument', 3, 2),
(31, 'Control Valve (On/Off, Level, Flow)', 'Instrument', 3, 2),
(32, 'Pressure Safety Valve', 'Instrument', 3, 2),
(33, 'Pressure & Differential Transmitter (Flow Meter)', 'Instrument', 3, 2),
(34, 'Pressure & Differential Pressure Gauge', 'Instrument', 3, 2),
(35, 'Temperature Transmitter', 'Instrument', 3, 2),
(36, 'Temperature Gauge & Element', 'Instrument', 3, 2),
(37, 'Level Gauge', 'Instrument', 3, 2),
(38, 'Level Transmitter', 'Instrument', 3, 2),
(39, 'Metering System', 'Instrument', 3, 2),
(40, 'Orifice Plate', 'Instrument', 3, 2),
(41, 'Restriction Orifice', 'Instrument', 3, 2),
(42, 'Hand Valve ', 'Instrument', 3, 2),
(43, 'Electrical Cable', 'Electrical', 2, 2),
(44, 'Electrical Earthing Cable (neutral ground resistor)\r\n', 'Electrical', 2, 2),
(45, 'MV Switchgear 20 Kv', 'Electrical', 2, 2),
(46, 'MV Switchgear 3,3 Kv', 'Electrical', 2, 2),
(47, 'LV Switchgear/MCC', 'Electrical', 2, 2),
(48, 'Power Transformer 3,3/0,4kV,2000 KVA', 'Electrical', 2, 2),
(49, 'Power Transformer 20/3,3kV,4000 KVA', 'Electrical', 2, 2),
(50, '20KVA DC UPS', 'Electrical', 2, 2),
(51, 'Capacitor Bank', 'Electrical', 2, 2),
(52, 'Power Distribution Board', 'Electrical', 2, 2),
(53, '220V AC UPS', 'Electrical', 2, 2),
(54, 'Electrical Cable Trays & Ladder', 'Electrical', 2, 2),
(55, 'Lighting Fixtures Hazardous', 'Electrical', 2, 2),
(56, 'Lighting Fixtures Non Hazardous', 'Electrical', 2, 2),
(57, ' Distribution Panel Non Hazardous', 'Electrical', 2, 2),
(58, 'Distribution Panel Hazardous', 'Electrical', 2, 2),
(59, 'Electrical Bulk Matrial (Junction Box, Cable Gland etc)\r\n', 'Electrical', 2, 2),
(60, 'Non Segregated Busduct', 'Electrical', 2, 2),
(61, 'FM 200 System', 'Safety', 1, 1),
(62, 'Fire Hydrant C/W Monitor', 'Safety', 1, 1),
(63, 'Heavy Duty Hoses', 'Safety', 1, 1),
(64, 'Adjustable Water Nozzle', 'Safety', 1, 1),
(65, 'Portable Fire Extinguisher', 'Safety', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bulan_tahun`
--

CREATE TABLE `bulan_tahun` (
  `kode_bulan_tahun` int(11) NOT NULL,
  `nama_bulan_tahun` varchar(50) NOT NULL,
  `kapasitas_bulan_tahun` int(11) NOT NULL,
  `kategori_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan_tahun`
--

INSERT INTO `bulan_tahun` (`kode_bulan_tahun`, `nama_bulan_tahun`, `kapasitas_bulan_tahun`, `kategori_barang`) VALUES
(4, 'November 2017', 4, 'Mechanical'),
(5, 'February 2018', 2, 'Mechanical'),
(6, 'December 2017', 2, 'Mechanical'),
(7, 'April 2018', 3, 'Mechanical'),
(8, 'March 2018', 5, 'Safety'),
(9, 'October 2017', 5, 'Piping'),
(10, 'February 2018', 3, 'Piping'),
(11, 'November 2017', 2, 'Piping'),
(12, 'March 2018', 1, 'Piping'),
(13, 'May 2018', 7, 'Instrument'),
(14, 'February 2018', 4, 'Instrument'),
(15, 'December 2017', 1, 'Instrument'),
(16, 'June 2018', 3, 'Instrument'),
(17, 'July 2018', 2, 'Instrument'),
(18, 'August 2018', 1, 'Instrument'),
(19, 'April 2018', 1, 'Instrument'),
(20, 'September 2018', 1, 'Instrument'),
(21, 'December 2017', 2, 'Electrical'),
(22, 'April 2018', 4, 'Electrical'),
(23, 'May 2018', 3, 'Electrical'),
(24, 'March 2018', 3, 'Electrical'),
(25, 'February 2018', 6, 'Electrical');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `kode_hari` int(11) NOT NULL,
  `nama_hari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`kode_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode` int(11) NOT NULL,
  `kode_pengampu` int(11) NOT NULL,
  `kode_jam` int(11) NOT NULL,
  `kode_hari` int(11) NOT NULL,
  `kode_bulan_tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode`, `kode_pengampu`, `kode_jam`, `kode_hari`, `kode_bulan_tahun`) VALUES
(1, 18, 3, 6, 5),
(2, 19, 5, 7, 4),
(3, 21, 2, 1, 4),
(4, 22, 8, 2, 4),
(5, 24, 8, 1, 6),
(6, 28, 5, 7, 7),
(7, 29, 1, 7, 10),
(8, 30, 3, 1, 8),
(9, 31, 1, 4, 12),
(10, 32, 5, 4, 9),
(11, 33, 6, 4, 10),
(12, 36, 5, 7, 8),
(13, 37, 1, 4, 11),
(14, 43, 9, 1, 16),
(15, 60, 6, 2, 24),
(16, 61, 3, 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `kode_jam` int(11) NOT NULL,
  `range_jam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`kode_jam`, `range_jam`) VALUES
(1, '08.00-08.50'),
(2, '08.50-09.30'),
(3, '09.40-10.30'),
(4, '10.30-11.20'),
(5, '11.20-12.10'),
(6, '12.10-13.00'),
(7, '13.00-13.50'),
(8, '13.50-14.40'),
(9, '14.40-15.30'),
(10, '15.30-16.20'),
(11, '16.20-17.10');

-- --------------------------------------------------------

--
-- Table structure for table `pengampu`
--

CREATE TABLE `pengampu` (
  `kode_pengampu` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `kode_vendor` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `tahun_proyek` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengampu`
--

INSERT INTO `pengampu` (`kode_pengampu`, `kode_barang`, `kode_vendor`, `tanggal`, `tahun_proyek`) VALUES
(18, 1, 2, 21, 2017),
(19, 2, 2, 21, 2017),
(20, 3, 2, 1, 2018),
(21, 4, 4, 7, 2017),
(22, 5, 2, 7, 2017),
(23, 6, 7, 19, 2018),
(24, 7, 2, 1, 2017),
(25, 8, 7, 1, 2018),
(26, 9, 10, 1, 2018),
(27, 10, 10, 1, 2018),
(28, 11, 6, 15, 2017),
(29, 12, 2, 15, 2017),
(30, 13, 3, 15, 2017),
(31, 14, 2, 15, 2017),
(32, 15, 2, 15, 2017),
(33, 16, 3, 15, 2017),
(34, 17, 1, 21, 2018),
(35, 18, 1, 21, 2018),
(36, 19, 1, 1, 2017),
(37, 20, 1, 1, 2017),
(38, 21, 1, 16, 2018),
(39, 22, 1, 21, 2018),
(40, 23, 2, 15, 2018),
(41, 24, 4, 1, 2018),
(42, 25, 5, 1, 2018),
(43, 26, 5, 1, 2017),
(44, 27, 7, 7, 2018),
(45, 28, 8, 15, 2018),
(46, 29, 5, 1, 2018),
(47, 30, 12, 15, 2018),
(48, 31, 11, 30, 2018),
(49, 32, 7, 1, 2018),
(50, 33, 9, 21, 2018),
(51, 34, 9, 17, 2018),
(52, 35, 9, 21, 2018),
(53, 36, 9, 15, 2018),
(54, 37, 6, 30, 2018),
(55, 38, 11, 5, 2018),
(56, 39, 12, 1, 2018),
(57, 40, 9, 21, 2018),
(58, 41, 9, 21, 2018),
(59, 42, 5, 14, 2018),
(60, 43, 2, 1, 2017),
(61, 44, 2, 1, 2017),
(62, 45, 2, 30, 2018),
(63, 46, 2, 30, 2018),
(64, 47, 2, 15, 2018),
(65, 48, 2, 1, 2018),
(66, 49, 2, 1, 2018),
(67, 50, 5, 1, 2018),
(68, 51, 5, 21, 2018),
(69, 52, 5, 1, 2018),
(70, 53, 5, 1, 2018),
(71, 54, 2, 1, 2018),
(72, 55, 2, 1, 2018),
(73, 56, 2, 1, 2018),
(74, 57, 2, 1, 2018),
(75, 58, 2, 1, 2018),
(76, 59, 2, 1, 2018),
(77, 60, 2, 30, 2018),
(78, 61, 2, 15, 2018),
(79, 62, 2, 15, 2018),
(80, 63, 2, 15, 2018),
(81, 64, 2, 15, 2018),
(82, 65, 2, 15, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `kode_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `alamat_vendor` text NOT NULL,
  `telepon_vendor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`kode_vendor`, `nama_vendor`, `alamat_vendor`, `telepon_vendor`) VALUES
(1, 'China', 'China', '085123456789'),
(2, 'Indonesia', 'Indonesia', '085123456790'),
(3, 'International', 'International', '085123456791'),
(4, 'USA', 'USA', '085123456792'),
(5, 'Italy', 'Italy', '085123456793'),
(6, 'Korea', 'Korea', '085123456794'),
(7, 'Germany', 'Germany', '085123456795'),
(8, 'Japan', 'Japan', '085123456796'),
(9, 'Singapore', 'Singapore', '085123456797'),
(10, 'Netherland', 'Netherland', '085123456798'),
(11, 'Malaysia', 'Malaysia', '085123456799'),
(12, 'UK', 'UK', '085123456800');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_tidak_bersedia`
--

CREATE TABLE `waktu_tidak_bersedia` (
  `kode` int(11) NOT NULL,
  `kode_vendor` int(11) NOT NULL,
  `kode_hari` int(11) NOT NULL,
  `kode_jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_tidak_bersedia`
--

INSERT INTO `waktu_tidak_bersedia` (`kode`, `kode_vendor`, `kode_hari`, `kode_jam`) VALUES
(1, 1, 5, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `bulan_tahun`
--
ALTER TABLE `bulan_tahun`
  ADD PRIMARY KEY (`kode_bulan_tahun`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`kode_hari`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`kode_jam`);

--
-- Indexes for table `pengampu`
--
ALTER TABLE `pengampu`
  ADD PRIMARY KEY (`kode_pengampu`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`kode_vendor`);

--
-- Indexes for table `waktu_tidak_bersedia`
--
ALTER TABLE `waktu_tidak_bersedia`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `bulan_tahun`
--
ALTER TABLE `bulan_tahun`
  MODIFY `kode_bulan_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `kode_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `kode_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengampu`
--
ALTER TABLE `pengampu`
  MODIFY `kode_pengampu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `kode_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `waktu_tidak_bersedia`
--
ALTER TABLE `waktu_tidak_bersedia`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
