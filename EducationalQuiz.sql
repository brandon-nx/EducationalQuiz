-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 04:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinekuiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(4) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `password_guru` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `password_guru`) VALUES
('G001', 'Pn Hu Sing Min', 'HSM123'),
('G002', 'Mr Ali Muhammad', 'Ali123');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(4) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
('K001', '5A'),
('K002', '5B'),
('K003', '5C');

-- --------------------------------------------------------

--
-- Table structure for table `kuiz`
--

CREATE TABLE `kuiz` (
  `id_kuiz` varchar(4) NOT NULL,
  `nama_kuiz` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuiz`
--

INSERT INTO `kuiz` (`id_kuiz`, `nama_kuiz`) VALUES
('Q001', 'Quiz Chemistry F5 C1 - Redox Reaction (1.1)'),
('Q002', 'Quiz Chemistry F5 C1 - Redox Reaction (1.2)'),
('Q003', 'Quiz Chemistry F5 C1 - Redox Reaction (1.3)');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id_murid` varchar(4) NOT NULL,
  `nama_murid` varchar(50) NOT NULL,
  `id_kelas` varchar(4) NOT NULL,
  `password_murid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id_murid`, `nama_murid`, `id_kelas`, `password_murid`) VALUES
('M001', 'Adam Thian', 'K001', 'Adam123'),
('M002', 'Heng Ho Hong', 'K002', 'Heng123'),
('M003', 'Esther Chai', 'K003', 'Esther123'),
('M004', 'Brandon Ting', 'K002', 'Bran123'),
('M034', 'Chai Feng Feng', 'K001', 'Chai123\r\n'),
('M035', 'Law Eng Yeo', 'K002', 'Law123\r\n'),
('M036', 'Jeremy Ting', 'K003', 'Jeremy123');

-- --------------------------------------------------------

--
-- Table structure for table `pelaksanaan_kuiz`
--

CREATE TABLE `pelaksanaan_kuiz` (
  `id_murid` varchar(4) NOT NULL,
  `id_soalan` varchar(4) NOT NULL,
  `tarikh_jawab` varchar(10) NOT NULL,
  `pilih` varchar(50) NOT NULL,
  `markah_perolehi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelaksanaan_kuiz`
--

INSERT INTO `pelaksanaan_kuiz` (`id_murid`, `id_soalan`, `tarikh_jawab`, `pilih`, `markah_perolehi`) VALUES
('M001', 'S101', '21/10/2021', 'C', 50),
('M001', 'S102', '21/10/2021', 'B', 50),
('M002', 'S101', '21/10/2021', 'B', 0),
('M002', 'S102', '21/10/2021', 'B', 0),
('M002', 'S201', '21/10/2021', 'TRUE', 100),
('M002', 'S202', '21/10/2021', 'oxidation', 100),
('M002', 'S301', '21/10/2021', 'FALSE', 100),
('M003', 'S101', '21/10/2021', 'C', 100),
('M003', 'S102', '21/10/2021', 'C', 100),
('M003', 'S201', '21/10/2021', 'FALSE', 0),
('M003', 'S202', '21/10/2021', 'reduction', 0),
('M003', 'S301', '21/10/2021', 'TRUE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `soalan`
--

CREATE TABLE `soalan` (
  `id_soalan` varchar(4) NOT NULL,
  `nama_soalan` varchar(1000) NOT NULL,
  `pilihan_A` varchar(1000) NOT NULL,
  `pilihan_B` varchar(1000) NOT NULL,
  `pilihan_C` varchar(1000) NOT NULL,
  `pilihan_D` varchar(1000) NOT NULL,
  `jawapan` varchar(50) NOT NULL,
  `markah` int(2) NOT NULL,
  `id_guru` varchar(4) NOT NULL,
  `id_kuiz` varchar(4) NOT NULL,
  `jenis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soalan`
--

INSERT INTO `soalan` (`id_soalan`, `nama_soalan`, `pilihan_A`, `pilihan_B`, `pilihan_C`, `pilihan_D`, `jawapan`, `markah`, `id_guru`, `id_kuiz`, `jenis`) VALUES
('Q003', 'odkoekd', 'deed', 'ded', 'ded', 'edde', 'A', 1, 'G001', 'Q001', 1),
('S101', 'What is oxidation number of Cr in Cr2O72-?', '-2', '+2', '+6', '+12', 'C', 1, 'G001', 'Q001', 1),
('S102', 'What is an electrolytic cell?', 'a cell that converts chemical energy into electrical energy', 'a cell that converts electrical energy into electrical energy', 'a cell that converts electrical energy into chemical energy', 'A cell that converts kinetic energy into potential energy.', 'C', 1, 'G001', 'Q001', 1),
('S103', 'Which metals can displace zinc from zinc nitrate solution?', 'Magnesium', 'Silver', 'Copper', 'Iron', 'A', 1, 'G001', 'Q001', 1),
('S201', 'Cl2 + 2e- --> 2Cl - is an example of reduction reaction', '', '', '', '', 'TRUE', 1, 'G001', 'Q002', 2),
('S202', '\"The equation below shows the reaction between sodium and water to form sodium hydroxide and hydrogen.  2Na + 2H2O →2NaOH +H2  In this reaction, Na undergoes _______________\"', '', '', '', '', 'oxidation', 1, 'G002', 'Q002', 3),
('S301', 'Potassium iodide solution is an oxidising agent?', '', '', '', '', 'FALSE', 1, 'G002', 'Q003', 2),
('S302', 'Which of the following cannot occur during oxidation?', 'gain of oxygen', 'loss of hydrogen', 'donation of electron', 'decrease in oxidation number', 'D', 1, 'G001', 'Q003', 1),
('S303', 'In the reaction Zn + H2O --> ZnO2 + H2 which element is oxidised?', 'Zinc', 'Hydrogen', 'Oxygen', 'None', 'A', 1, 'G001', 'Q003', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kuiz`
--
ALTER TABLE `kuiz`
  ADD PRIMARY KEY (`id_kuiz`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id_murid`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `pelaksanaan_kuiz`
--
ALTER TABLE `pelaksanaan_kuiz`
  ADD PRIMARY KEY (`id_murid`,`id_soalan`),
  ADD KEY `pelaksanaankuiz_soalan` (`id_soalan`);

--
-- Indexes for table `soalan`
--
ALTER TABLE `soalan`
  ADD PRIMARY KEY (`id_soalan`),
  ADD KEY `id_guru` (`id_guru`,`id_kuiz`),
  ADD KEY `soalan_kuiz` (`id_kuiz`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelaksanaan_kuiz`
--
ALTER TABLE `pelaksanaan_kuiz`
  ADD CONSTRAINT `pelaksanaankuiz_murid` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id_murid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelaksanaankuiz_soalan` FOREIGN KEY (`id_soalan`) REFERENCES `soalan` (`id_soalan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soalan`
--
ALTER TABLE `soalan`
  ADD CONSTRAINT `soalan_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `soalan_kuiz` FOREIGN KEY (`id_kuiz`) REFERENCES `kuiz` (`id_kuiz`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
