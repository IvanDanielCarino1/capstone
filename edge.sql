-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 05:59 AM
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
  `recomended` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_english`
--

INSERT INTO `academic_english` (`id`, `fullname`, `lrn`, `grade`, `section`, `date`, `classification`, `quarter`, `status`, `gname`, `number`, `notes`, `intervention`, `topic`, `advice`, `school`, `year`, `recomended`) VALUES
(1, 'Valentina Reyes', '71625208025', 'kinder', 'rizal', '2024-06-14', 'Academic - Literacy in English', '1', 'Unresolved', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'Bacayao Sur Elementary School', '2024', 'asda');

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
  `recomended` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_filipino`
--

INSERT INTO `academic_filipino` (`id`, `lrn`, `fullname`, `grade`, `section`, `date`, `quarter`, `classification`, `status`, `gname`, `number`, `notes`, `intervention`, `topic`, `advice`, `school`, `year`, `recomended`) VALUES
(1, '71625208025', 'Valentina Reyes', 'kinder', 'rizal', '2024-06-14', '1', 'Academic - Literacy in Filipino', 'Resolved', 'ds', 'asd', '', '', '', '', 'Bacayao Sur Elementary School', '2024', '');

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
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Ivan Daniel James Carino ', '12', '$2y$10$O8ktjubeR5eBCDYq.F449.tmiwVngaAJyb8Jd3.G9yarf5st6lWgC', 'ivandanielcarino@yahoo.com', 'kinder', 'Rizal', 'Bacayao Sur Elementary School', '2024-05-15', 0, 'yes', 'activate', '2024');

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
  `recomended` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `behavioral`
--

INSERT INTO `behavioral` (`id`, `lrn`, `fullname`, `grade`, `section`, `date`, `quarter`, `classification`, `status`, `gname`, `number`, `notes`, `intervention`, `topic`, `advice`, `school`, `year`, `recomended`) VALUES
(2, '71625208025', 'Valentina Reyes', 'kinder', 'rizal', '2024-06-14', '1', 'Behavioral', 'Unresolved', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'Bacayao Sur Elementary School', '2024', 'asd');

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
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grade_kinder_section_ngi`
--

CREATE TABLE `grade_kinder_section_ngi` (
  `id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_kinder_section_ngi`
--

INSERT INTO `grade_kinder_section_ngi` (`id`, `lrn`, `fullname`, `gender`, `section`, `grade`, `school`, `year`) VALUES
(1, '716', 'Valentina Reyes', 'Female', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(2, '334', 'Alejandro Santos', 'Male', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(3, '422', 'Elena Fernandez', 'Female', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(4, '729', 'Rafael Gonzales', 'Male', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(5, '4149', 'Clara Rivera', 'Female', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(6, '754', 'Mateo Hernandez', 'Male', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(7, '5152', 'Sophia Rodriguez', 'Female', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(8, '33319', 'Carlos Reyes', 'Male', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(9, '35', 'Isabella Torres', 'Female', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(10, '1078', 'Miguel Castro', 'Male', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(11, '183992', 'Diego Lopez', 'Male', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(12, '1177', 'Andrea Delgado', 'Female', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(13, '32456284', 'Camille Martinez', 'Female', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(14, '60043', 'Gabriel Fernandez', 'Male', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(15, '6813609', 'Sofia Ramirez', 'Female', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(16, '963701', 'Ricardo Garcia', 'Male', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(17, '450717017', 'Liza Reyes', 'Female', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(18, '771314988', 'Jose Cruz', 'Male', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(19, '96225', 'Juan dela Cruz', 'Male', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(20, '1128275', 'Maria Santos', 'Female', 'ngi', 'kinder', 'Bacayao Sur Elementary School', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `grade_kinder_section_rizal`
--

CREATE TABLE `grade_kinder_section_rizal` (
  `id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_kinder_section_rizal`
--

INSERT INTO `grade_kinder_section_rizal` (`id`, `lrn`, `fullname`, `gender`, `section`, `grade`, `school`, `year`) VALUES
(1, '71625208025', 'Valentina Reyes', 'Female', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(2, '37591932905', 'Alejandro Santos', 'Male', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(3, '42279725355', 'Elena Fernandez', 'Female', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(4, '7296589590', 'Rafael Gonzales', 'Male', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(5, '41491531510', 'Clara Rivera', 'Female', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(6, '75457821495', 'Mateo Hernandez', 'Male', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(7, '51527603847', 'Sophia Rodriguez', 'Female', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(8, '33319078537', 'Carlos Reyes', 'Male', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(9, '35395914791', 'Isabella Torres', 'Female', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(10, '10780836962', 'Miguel Castro', 'Male', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(11, '18399259265', 'Diego Lopez', 'Male', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(12, '11777415099', 'Andrea Delgado', 'Female', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(13, '32456284551', 'Camille Martinez', 'Female', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(14, '60043085782', 'Gabriel Fernandez', 'Male', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(15, '68136099299', 'Sofia Ramirez', 'Female', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(16, '96370146455', 'Ricardo Garcia', 'Male', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(17, '45071701709', 'Liza Reyes', 'Female', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(18, '77131498883', 'Jose Cruz', 'Male', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(19, '96225704125', 'Juan dela Cruz', 'Male', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024'),
(20, '11282752844', 'Maria Santos', 'Female', 'rizal', 'kinder', 'Bacayao Sur Elementary School', '2024');

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
(1, 'Sophia Elizabeth Walker ', '121222', 'edge.developers1234@gmail.com', '$2y$10$Pvl0.aTLd5uIv1JMfGbg9.GxooDWf.xfpa5wxdTnIxl.Ysb695FDG', 'Bacayao Sur Elementary School', '2024-06-18', NULL, 'yes', 'activate', '2024');

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
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '2024', '2025'),
(3, '2025', '2026');

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
-- Indexes for table `grade_kinder_section_ngi`
--
ALTER TABLE `grade_kinder_section_ngi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_kinder_section_rizal`
--
ALTER TABLE `grade_kinder_section_rizal`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adviser`
--
ALTER TABLE `adviser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `behavioral`
--
ALTER TABLE `behavioral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counselor`
--
ALTER TABLE `counselor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `executive_committee`
--
ALTER TABLE `executive_committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_kinder_section_ngi`
--
ALTER TABLE `grade_kinder_section_ngi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `grade_kinder_section_rizal`
--
ALTER TABLE `grade_kinder_section_rizal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_admin`
--
ALTER TABLE `school_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
