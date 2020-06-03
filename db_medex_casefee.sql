-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 12:34 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_medex_casefee`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_casefee`
--

CREATE TABLE `table_casefee` (
  `case_id` varchar(32) NOT NULL,
  `remarks` varchar(32) DEFAULT NULL,
  `payment_by` varchar(64) DEFAULT NULL,
  `date_receive` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_casefee`
--

INSERT INTO `table_casefee` (`case_id`, `remarks`, `payment_by`, `date_receive`) VALUES
('AAIID-1911-1039', 'CF202300', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1092', 'CF202135', 'shearly reviana', '2020-04-26'),
('AAIID-1912-1150', 'CF202140', 'shearly reviana', '2020-04-26'),
('AAIID-1912-1161', 'CF202142', 'shearly reviana', '2020-04-26'),
('AAIID-1912-1187', 'CF202160', 'shearly reviana', '2020-04-30'),
('AAIID-1912-1193', 'CF202302', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1195', 'CF202148', 'shearly reviana', '2020-04-26'),
('AAIID-1912-1204', 'CF202149', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1217', 'CF202304', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1232', 'CF202306', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1234', 'CF202294', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1249', 'CF202307', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1257', 'CF202308', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1264', 'CF202310', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1274', 'CF202313', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1289', 'CF202317', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1332', 'CF202321', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1356', 'CF202296', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1363', 'CF202323', 'shearly reviana', '2020-04-22'),
('AAIID-1912-1385', 'CF202327', 'shearly reviana', '2020-04-22'),
('AAIID-2001-0009', 'CF202330', 'shearly reviana', '2020-04-22'),
('AAIID-2001-0019', 'CF202332', 'shearly reviana', '2020-04-22'),
('AAIID-2001-0022', 'CF202368', 'shearly reviana', '2020-04-30'),
('AAIID-2001-0097', 'CF202335', 'shearly reviana', '2020-04-22'),
('AAIID-2001-0229', 'CF202353', 'shearly reviana', '2020-04-15'),
('AAIID-2001-0321', 'CF202286', 'shearly reviana', '2020-04-29'),
('AAIID-2001-0326', 'CF203073', 'shearly reviana', '2020-04-24'),
('AAIID-2002-0341', 'CF202349', 'shearly reviana', '2020-04-22'),
('AAIID-2002-0352', 'AF202062', 'shearly reviana', '2020-04-24'),
('AAIID-2002-0397', 'CF202397', 'shearly reviana', '2020-04-22'),
('AAIID-2002-0427', 'AF202063', 'shearly reviana', '2020-04-24'),
('AAIID-2002-0428', 'CF203029', 'shearly reviana', '2020-04-24'),
('AAIID-2002-0513', 'CF203089', 'shearly reviana', '2020-04-08'),
('AAIID-2002-0517', 'CF203023', 'shearly reviana', '2020-04-20'),
('AAIID-2002-0520', 'AF203005', 'shearly reviana', '2020-04-17'),
('AAIID-2002-0523', 'AF203011', 'shearly reviana', '2020-04-17'),
('AAIID-2002-0532', 'CF203042', 'shearly reviana', '2020-04-24'),
('AAIID-2002-0542', 'CF203074', 'shearly reviana', '2020-04-24'),
('AAIID-2002-0548', 'CF203070', 'shearly reviana', '2020-04-22'),
('AAIID-2002-0578', 'CF203055', 'shearly reviana', '2020-04-30'),
('AAIID-2002-0592', 'AF204003', 'shearly reviana', '2020-04-30'),
('AAIID-2003-0597', 'CF203085', 'shearly reviana', '2020-04-17'),
('AAIID-2003-0598', 'CF203103', 'shearly reviana', '2020-04-24'),
('AAIID-2003-0603', 'AF203012', 'shearly reviana', '2020-04-17'),
('AAIID-2003-0617', 'CF203039', 'shearly reviana', '2020-04-30'),
('AAIID-2003-0661', 'CF203066', 'shearly reviana', '2020-04-24'),
('AAIID-2003-0682', 'CF204014', 'shearly reviana', '2020-04-24'),
('AAIID-2003-0689', 'AF204004', 'shearly reviana', '2020-04-30'),
('AAIID-2003-0725', 'CF204009', 'shearly reviana', '2020-04-27'),
('AAIID-2003-0751', 'AF204006', 'shearly reviana', '2020-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `table_medex`
--

CREATE TABLE `table_medex` (
  `id_ref` int(11) NOT NULL,
  `quotation_number` varchar(64) DEFAULT NULL,
  `remarks` varchar(32) DEFAULT NULL,
  `payment_by` varchar(64) DEFAULT NULL,
  `date_receive` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_medex`
--

INSERT INTO `table_medex` (`id_ref`, `quotation_number`, `remarks`, `payment_by`, `date_receive`) VALUES
(2, 'Q-AAIID-1911-0412', 'JK203029', 'shearly reviana', '2020-04-30'),
(3, 'Q-AAIID-1911-0552', 'AG912019', 'shearly reviana', '2020-04-27'),
(4, 'Q-AAIID-1912-0974', 'JK203049', 'shearly reviana', '2020-04-29'),
(5, 'Q-AAIID-1912-0196', 'JK204063', 'shearly reviana', '2020-04-30'),
(6, 'Q-AAIID-2002-0094', 'JK203007', 'shearly reviana', '2020-04-30'),
(7, 'Q-AAIID-2001-0102', 'JK204069', 'shearly reviana', '2020-04-30'),
(8, 'Q-AAIID-2001-0447', 'JK203062', 'shearly reviana', '2020-04-30'),
(9, 'Q-AAIID-2001-0223', 'JK203081', 'shearly reviana', '2020-04-30'),
(10, 'Q-AAIID-2003-0988', 'JK204092', 'shearly reviana', '2020-04-30'),
(11, 'Q-AAIID-2003-0091', 'JK204092', 'shearly reviana', '2020-04-30'),
(12, 'Q-AAIID-2001-0644', 'JK202046', 'shearly reviana', '2020-04-29'),
(13, 'Q-AAIID-2002-0776', 'JK204075', 'shearly reviana', '2020-04-30'),
(14, 'Q-AAIID-2002-0747', 'JK203126', 'shearly reviana', '2020-04-30'),
(15, 'Q-AAIID-2002-0962', 'JK203126', 'shearly reviana', '2020-04-30'),
(16, 'Q-AAIID-2002-0910', 'JK203013', 'shearly reviana', '2020-04-29'),
(17, 'Q-AAIID-2002-0061', 'JK203129', 'shearly reviana', '2020-04-30'),
(18, 'Q-AAIID-2002-0072', 'AG203004', 'shearly reviana', '2020-04-24'),
(19, 'Q-AAIID-2002-0389', 'JK204043', 'shearly reviana', '2020-04-30'),
(20, 'Q-AAIID-2002-0538', 'JK204002', 'shearly reviana', '2020-04-29'),
(21, 'Q-AAIID-2003-0691', 'JK204003', 'shearly reviana', '2020-04-30'),
(22, 'Q-AAIID-2003-0854', 'JK204003', 'shearly reviana', '2020-04-30'),
(23, 'Q-AAIID-2003-0054', 'JK204087', 'shearly reviana', '2020-04-29'),
(24, 'Q-AAIID-2003-0055', 'JK204087', 'shearly reviana', '2020-04-29'),
(25, 'Q-AAIID-2003-0622', 'JK204004', 'shearly reviana', '2020-04-29'),
(26, 'Q-AAIID-2003-0964', 'AG203048', 'shearly reviana', '2020-04-30'),
(27, 'Q-AAIID-2003-0025', 'JK204080', 'shearly reviana', '2020-04-30'),
(28, 'Q-AAIID-2004-0243', 'JK204089', 'shearly reviana', '2020-04-30'),
(29, 'Q-AAIID-2004-0324', 'JK204096', 'shearly reviana', '2020-04-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_casefee`
--
ALTER TABLE `table_casefee`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `table_medex`
--
ALTER TABLE `table_medex`
  ADD PRIMARY KEY (`id_ref`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_medex`
--
ALTER TABLE `table_medex`
  MODIFY `id_ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
