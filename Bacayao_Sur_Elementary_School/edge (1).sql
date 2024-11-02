-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 03:18 PM
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
-- Database: `edge`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_english`
--

CREATE TABLE `academic_english` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `classification` varchar(255) NOT NULL,
  `quarter` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `intervention` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `advice` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `recomended` varchar(255) NOT NULL,
  `intervened` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_english`
--

INSERT INTO `academic_english` (`id`, `fullname`, `lrn`, `grade`, `section`, `date`, `classification`, `quarter`, `status`, `gname`, `number`, `notes`, `intervention`, `topic`, `advice`, `school`, `year`, `recomended`, `intervened`) VALUES
(1, 'Ivan Daniel Carino', '567895', 'kinder', 'magaling', '2024-11-02', 'Academic - Literacy in English', '1', '', 'Virginia Bencito', 'dsd', 'asd', 'asd', 'asd', 'asd', 'Bacayao Sur Elementary School', '2024', 'aasd', '2024-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `academic_filipino`
--

CREATE TABLE `academic_filipino` (
  `id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `quarter` varchar(255) NOT NULL,
  `classification` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `intervention` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `advice` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `recomended` varchar(255) NOT NULL,
  `intervened` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_filipino`
--

INSERT INTO `academic_filipino` (`id`, `lrn`, `fullname`, `grade`, `section`, `date`, `quarter`, `classification`, `status`, `gname`, `number`, `notes`, `intervention`, `topic`, `advice`, `school`, `year`, `recomended`, `intervened`) VALUES
(1, '567895', 'Ivan Daniel Carino', 'kinder', 'magaling', '2024-11-02', '1', 'Academic - Literacy in Filipino', 'Resolved', 'Virginia Bencito', '09267312535', 'asd', 'asd', 'asd', 'asd', 'Bacayao Sur Elementary School', '2024', 'asd', '2024-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `academic_numeracy`
--

CREATE TABLE `academic_numeracy` (
  `id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `quarter` varchar(255) NOT NULL,
  `classification` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `intervention` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `advice` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `intervened` varchar(255) NOT NULL,
  `recomended` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_numeracy`
--

INSERT INTO `academic_numeracy` (`id`, `lrn`, `fullname`, `grade`, `section`, `date`, `quarter`, `classification`, `status`, `gname`, `number`, `notes`, `intervention`, `topic`, `advice`, `school`, `year`, `intervened`, `recomended`) VALUES
(1, '567895', 'Ivan Daniel Carino', 'kinder', 'magaling', '2024-11-02', '1', 'Academic - Literacy in Numeracy', 'On-Going', 'Virginia Bencito', '09267312535', 'asd', 'asd', 'asd', 'asd', 'Bacayao Sur Elementary School', '2024', '2024-11-02', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `adviser`
--

CREATE TABLE `adviser` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `employment_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `verified` varchar(255) NOT NULL,
  `activation` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adviser`
--

INSERT INTO `adviser` (`id`, `fullname`, `employment_number`, `password`, `email`, `grade`, `section`, `school`, `date`, `otp`, `verified`, `activation`, `year`) VALUES
(1, 'Karla Bano Cavs ', '676767', '$2y$10$h3/PB2TDLeLiclUKSNTXD.8AL16.R7PvB8HB0EevxUfinCf68twMW', 'zivza.carino.up@phinmaed.com', 'kinder', 'Magaling', 'Bacayao Sur Elementary School', '2024-11-02', 0, 'yes', 'activate', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` int(11) NOT NULL,
  `employment_number` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `activation` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `behavioral`
--

CREATE TABLE `behavioral` (
  `id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `quarter` varchar(255) NOT NULL,
  `classification` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `intervention` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `advice` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `recomended` varchar(255) NOT NULL,
  `intervened` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `behavioral`
--

INSERT INTO `behavioral` (`id`, `lrn`, `fullname`, `grade`, `section`, `date`, `quarter`, `classification`, `status`, `gname`, `number`, `notes`, `intervention`, `topic`, `advice`, `school`, `year`, `recomended`, `intervened`) VALUES
(1, '567895', 'Ivan Daniel Carino', 'kinder', 'magaling', '2024-11-02', '1', 'Behavioral', 'On-Going', 'Virginia Bencito', 'asd', 'asd', 'asd', 'asd', 'asd', 'Bacayao Sur Elementary School', '2024', 'asd', '2024-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `counselor`
--

CREATE TABLE `counselor` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `employment_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `verified` varchar(255) NOT NULL,
  `activation` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counselor`
--

INSERT INTO `counselor` (`id`, `fullname`, `employment_number`, `email`, `password`, `school`, `date`, `otp`, `verified`, `activation`, `year`) VALUES
(1, 'Sophia Michael  Mangubat ', '789056', 'ivza.carino.up@phinmaed.com', '$2y$10$Kyh/hFBufEN/uRLTUfw34u/C4xZoyH121Y7xlTlLUnh3MrZ.p96zK', 'Bacayao Sur Elementary School', '2024-11-02', NULL, 'yes', 'activate', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `executive_committee`
--

CREATE TABLE `executive_committee` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `employment_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `verified` varchar(255) NOT NULL,
  `activation` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `executive_committee`
--

INSERT INTO `executive_committee` (`id`, `fullname`, `employment_number`, `email`, `password`, `school`, `date`, `otp`, `verified`, `activation`, `year`, `position`) VALUES
(1, 'Ivan Daniel Zapata Carino ', '121212', 'ivandandsielcarino442@gmail.com', '$2y$10$rXTjtyWS.k0U48oVNonFVOr.qlSiGwf1yQAG2FD/LzMOC6kp.d6ny', '', '2024-11-02', '', 'yes', 'activate', '2024', 'Executive Committee');

-- --------------------------------------------------------

--
-- Table structure for table `grade_kinder_section_magaling`
--

CREATE TABLE `grade_kinder_section_magaling` (
  `id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_kinder_section_magaling`
--

INSERT INTO `grade_kinder_section_magaling` (`id`, `lrn`, `fullname`, `grade`, `section`, `gender`, `school`, `year`) VALUES
(1, '567895', 'Ivan Daniel Carino', 'kinder', 'magaling', 'male', 'Bacayao Sur Elementary School', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `employment_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `verified` varchar(255) NOT NULL DEFAULT '0',
  `activation` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`id`, `fullname`, `employment_number`, `email`, `password`, `school`, `date`, `otp`, `verified`, `activation`, `year`) VALUES
(1, 'Jomar Grace  Mendez ', '789045', 'nagatajuri@yahoo.com.ph', '$2y$10$0jMeT//T8m.Xp/knEiom9eQRZumgR6PdwugjA/tlqLs87upp8wcCi', 'Bacayao Sur Elementary School', '2024-11-02', NULL, 'yes', 'activate', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `school_admin`
--

CREATE TABLE `school_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `employment_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `verified` varchar(255) NOT NULL,
  `activation` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_admin`
--

INSERT INTO `school_admin` (`id`, `fullname`, `employment_number`, `email`, `password`, `school`, `date`, `otp`, `verified`, `activation`, `year`, `position`) VALUES
(1, 'Vangie Bencito Bencito ', '122334', 'ivandandsielcarino442@gmail.com', '$2y$10$DAgtkJSdYERabDz0fLs79eHy5.ZPAZ6FYZpy6xYnFVJWRV14k/Hr.', 'Bacayao Sur Elementary School', '2024-11-02', NULL, 'yes', 'activate', '2024', 'School Admin');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(11) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `start`, `end`) VALUES
(1, '2024', '2025');

-- --------------------------------------------------------

--
-- Table structure for table `sdo_admin`
--

CREATE TABLE `sdo_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `employment_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `verified` varchar(255) NOT NULL,
  `activation` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sdo_admin`
--

INSERT INTO `sdo_admin` (`id`, `fullname`, `employment_number`, `email`, `password`, `date`, `otp`, `verified`, `activation`, `year`, `position`) VALUES
(2, 'Vivien  Grace Mendez ', '1234567', 'viviennemendez@gmail.com', '$2y$10$glfN1zzinp3pe3SZL3QTZuZrniG/R4hFBnNbbU3pc84dLfHK9mU.u', '2024-05-15', NULL, 'yes', 'activate', '2024', 'SDO Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_english`
--
ALTER TABLE `academic_english`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_filipino`
--
ALTER TABLE `academic_filipino`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `academic_numeracy`
--
ALTER TABLE `academic_numeracy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adviser`
--
ALTER TABLE `adviser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `behavioral`
--
ALTER TABLE `behavioral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counselor`
--
ALTER TABLE `counselor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employment_number` (`employment_number`);

--
-- Indexes for table `executive_committee`
--
ALTER TABLE `executive_committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_kinder_section_magaling`
--
ALTER TABLE `grade_kinder_section_magaling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employment_number` (`employment_number`);

--
-- Indexes for table `school_admin`
--
ALTER TABLE `school_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employment_number` (`employment_number`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdo_admin`
--
ALTER TABLE `sdo_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employment_number` (`employment_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_english`
--
ALTER TABLE `academic_english`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academic_filipino`
--
ALTER TABLE `academic_filipino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academic_numeracy`
--
ALTER TABLE `academic_numeracy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adviser`
--
ALTER TABLE `adviser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `behavioral`
--
ALTER TABLE `behavioral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counselor`
--
ALTER TABLE `counselor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `executive_committee`
--
ALTER TABLE `executive_committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grade_kinder_section_magaling`
--
ALTER TABLE `grade_kinder_section_magaling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_admin`
--
ALTER TABLE `school_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sdo_admin`
--
ALTER TABLE `sdo_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
