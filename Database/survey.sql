-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 03:40 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(10) NOT NULL,
  `course` varchar(100) NOT NULL,
  `nvq_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course`, `nvq_id`) VALUES
('K72C001', ' Information and Communication Technology', 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` varchar(10) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`) VALUES
('ICT', 'Department of  Information and Communication Technology');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` varchar(10) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `module` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `course_id`, `module`) VALUES
('K72C001M01', 'K72C001', 'Database Systems 1'),
('K72C001M02', 'K72C001', 'Database Systems 2'),
('K72C001M03', 'K72C001', 'Graphic Design');

-- --------------------------------------------------------

--
-- Table structure for table `nvq`
--

CREATE TABLE `nvq` (
  `nvq_id` tinyint(1) NOT NULL,
  `nvq` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nvq`
--

INSERT INTO `nvq` (`nvq_id`, `nvq`) VALUES
(4, 'NVQ Level 4'),
(5, 'NVQ Level 5');

-- --------------------------------------------------------

--
-- Table structure for table `surveyrecords`
--

CREATE TABLE `surveyrecords` (
  `token` varchar(32) NOT NULL,
  `id` int(20) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `module_id` varchar(10) NOT NULL,
  `department_id` varchar(10) NOT NULL,
  `term_id` int(10) NOT NULL,
  `trainer_id` smallint(6) NOT NULL,
  `catA1` tinyint(1) NOT NULL,
  `catA2` tinyint(1) NOT NULL,
  `catA3` tinyint(1) NOT NULL,
  `catA4` tinyint(1) NOT NULL,
  `catA5` tinyint(1) NOT NULL,
  `catA6` tinyint(1) NOT NULL,
  `catA7` tinyint(1) NOT NULL,
  `catA8` tinyint(1) NOT NULL,
  `catA9` tinyint(1) NOT NULL,
  `catB1` tinyint(1) NOT NULL,
  `catB2` tinyint(1) NOT NULL,
  `catB3` tinyint(1) NOT NULL,
  `catB4` tinyint(1) NOT NULL,
  `catB5` tinyint(1) NOT NULL,
  `catB6` tinyint(1) NOT NULL,
  `catB7` tinyint(1) NOT NULL,
  `catB8` tinyint(1) NOT NULL,
  `catB9` tinyint(1) NOT NULL,
  `catC1` text NOT NULL,
  `catC2` text NOT NULL,
  `catC3` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveyrecords`
--

INSERT INTO `surveyrecords` (`token`, `id`, `course_id`, `module_id`, `department_id`, `term_id`, `trainer_id`, `catA1`, `catA2`, `catA3`, `catA4`, `catA5`, `catA6`, `catA7`, `catA8`, `catA9`, `catB1`, `catB2`, `catB3`, `catB4`, `catB5`, `catB6`, `catB7`, `catB8`, `catB9`, `catC1`, `catC2`, `catC3`, `date_created`) VALUES
('3e11731575516566d4662ff631d12153', 14, 'K72C001', 'K72C001M03', 'ICT', 1, 3681, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '', '', '2018-03-04 15:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `surveytoken`
--

CREATE TABLE `surveytoken` (
  `id` int(20) NOT NULL,
  `token` varchar(32) NOT NULL,
  `is_valid` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_valid` timestamp NOT NULL,
  `trainer_id` smallint(6) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `module_id` varchar(10) NOT NULL,
  `department_id` varchar(10) NOT NULL,
  `term_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveytoken`
--

INSERT INTO `surveytoken` (`id`, `token`, `is_valid`, `date_created`, `date_valid`, `trainer_id`, `course_id`, `module_id`, `department_id`, `term_id`) VALUES
(3, '3e11731575516566d4662ff631d12153', 1, '2018-03-04 15:10:15', '2018-03-31 15:10:15', 3681, 'K72C001', 'K72C001M03', 'ICT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(10) NOT NULL,
  `term` varchar(100) NOT NULL,
  `academic _year` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `term`, `academic _year`) VALUES
(1, 'Semester I', '2016/2017'),
(2, 'Semester II', '2016/2017');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainer_id` smallint(6) NOT NULL,
  `trainer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainer_id`, `trainer`) VALUES
(3681, 'Y. Achchuthan'),
(3682, 'S. Nishanthan'),
(3683, 'G. Viyakanth');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `nvq_id` (`nvq_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `nvq`
--
ALTER TABLE `nvq`
  ADD PRIMARY KEY (`nvq_id`);

--
-- Indexes for table `surveyrecords`
--
ALTER TABLE `surveyrecords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `trainer_id` (`trainer_id`),
  ADD KEY `token` (`token`);

--
-- Indexes for table `surveytoken`
--
ALTER TABLE `surveytoken`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `module_id` (`module_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `trainer_id` (`trainer_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nvq`
--
ALTER TABLE `nvq`
  MODIFY `nvq_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `surveyrecords`
--
ALTER TABLE `surveyrecords`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `surveytoken`
--
ALTER TABLE `surveytoken`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainer_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3684;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`nvq_id`) REFERENCES `nvq` (`nvq_id`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `surveyrecords`
--
ALTER TABLE `surveyrecords`
  ADD CONSTRAINT `surveyrecords_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `surveyrecords_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`),
  ADD CONSTRAINT `surveyrecords_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `surveyrecords_ibfk_5` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`trainer_id`),
  ADD CONSTRAINT `surveyrecords_ibfk_6` FOREIGN KEY (`token`) REFERENCES `surveytoken` (`token`),
  ADD CONSTRAINT `surveyrecords_ibfk_7` FOREIGN KEY (`term_id`) REFERENCES `term` (`term_id`);

--
-- Constraints for table `surveytoken`
--
ALTER TABLE `surveytoken`
  ADD CONSTRAINT `surveytoken_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `surveytoken_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `surveytoken_ibfk_3` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`),
  ADD CONSTRAINT `surveytoken_ibfk_5` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`trainer_id`),
  ADD CONSTRAINT `surveytoken_ibfk_6` FOREIGN KEY (`term_id`) REFERENCES `term` (`term_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
