-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 12:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nests_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `school_code` varchar(20) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `caste` varchar(30) DEFAULT NULL,
  `pg_degree` varchar(50) DEFAULT NULL,
  `pg_university` varchar(100) DEFAULT NULL,
  `pg_total` int(11) DEFAULT NULL,
  `pg_secured` int(11) DEFAULT NULL,
  `pg_percentage` float DEFAULT NULL,
  `ug_degree` varchar(50) DEFAULT NULL,
  `ug_university` varchar(100) DEFAULT NULL,
  `ug_total` int(11) DEFAULT NULL,
  `ug_secured` int(11) DEFAULT NULL,
  `ug_percentage` float DEFAULT NULL,
  `bed` tinyint(4) DEFAULT NULL,
  `bed_university` varchar(100) DEFAULT NULL,
  `bed_total` int(11) DEFAULT NULL,
  `bed_secured` int(11) DEFAULT NULL,
  `bed_percentage` float DEFAULT NULL,
  `med` tinyint(4) DEFAULT NULL,
  `med_university` varchar(100) DEFAULT NULL,
  `med_total` int(11) DEFAULT NULL,
  `med_secured` int(11) DEFAULT NULL,
  `med_percentage` float DEFAULT NULL,
  `ctet_qualified` varchar(5) DEFAULT NULL,
  `ctet_ht` varchar(20) DEFAULT NULL,
  `ctet_session` varchar(30) DEFAULT NULL,
  `tet_qualified` varchar(5) DEFAULT NULL,
  `tet_ht` varchar(20) DEFAULT NULL,
  `tet_session` varchar(30) DEFAULT NULL,
  `tet_marks` varchar(10) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `post_hold` varchar(50) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `dot` date DEFAULT NULL,
  `still_working` varchar(5) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hno` varchar(20) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `village` varchar(50) DEFAULT NULL,
  `mandal` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `school_code` varchar(20) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `institution_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_code`, `mobile_number`, `institution_name`) VALUES
(1, '2132', '9493011065', 'TGTWURJC(B), Singareni'),
(2, '2113', '8074555329', 'TGTWURJC(B), KSD Site'),
(3, '2112', '9885871670', 'TGTWURJC(B), Dammapeta'),
(4, '2111', '9849178974', 'TGTWRJC-COE(G), Bhadrachalam'),
(5, '2109', '9490957285', 'TGTWRJC(G),\nAnkampalem'),
(6, '2114', '9490957282', 'TGTWRJC(G), Sudimalla'),
(7, '2110', '6302299811', 'TGTWURJC(B), Gundala'),
(8, '2115', '9490957284', 'TGTWRJC(B),\nKrishnasagar'),
(9, '3122', '9866930270', 'TGTWRDC(W), Khammam'),
(10, '3120', '8790586772', 'TGTWRDC(W), Dammapeta'),
(11, '3119', '7901097698', 'TGTWRDC(M), Manuguru'),
(12, '3118', '9848965711', 'TGTWRDC (G), Kothagudem'),
(13, '2138', '8447080760', 'TG EMRS(CO-Edn), Tekulapalally'),
(14, '2139', '7895253577', 'TG EMRS, Charla '),
(15, '2142', '9948933010', 'TG EMRS(CO-Edn), Singareni '),
(16, '2136', '8777795179', 'TG EMRS(CO-Edn), Palvoncha'),
(17, '2141', '8307834629', 'TG EMRS(CO-Edn), Mulakalapalli '),
(18, '2137', '8896574291', 'TG EMRS(CO-Edn), Gundala'),
(19, '2135', '9614390733', 'TG EMRS(CO-Edn), Gandugulapally'),
(20, '2140', '9411083600', 'TG EMRS(CO-Edn), Dummugudem '),
(21, '2116', '9133894048', 'School of Excellance(B), Khammam'),
(22, '2126', '9701495907', 'Mini Gurukulam(G), Pinapaka'),
(23, '2130', '8333925402', 'TGTWURJC(B), Tirumalayapalem'),
(24, '2134', '9959125277', 'TGTWURJC(G), Kothagudem'),
(25, '2131', '8333925404', 'TGTWURJC(G), Manuguru'),
(26, '2133', '8333925406', 'TGTWURJC(G), Wyra'),
(27, '2129', '8333925407', 'TGTWURJC(G),\nAnnapureddypally'),
(28, '4017', '9949723291', 'RC,KMM'),
(29, '4019', '99497232911', 'RC,KMMM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_code` (`school_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
