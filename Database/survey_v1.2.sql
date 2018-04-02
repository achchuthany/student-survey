-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 04:44 PM
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
-- Table structure for table `academicyear`
--

CREATE TABLE `academicyear` (
  `acedemic_year` varchar(9) NOT NULL,
  `date_started` date NOT NULL,
  `date_completion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicyear`
--

INSERT INTO `academicyear` (`acedemic_year`, `date_started`, `date_completion`) VALUES
('2016/2017', '2016-09-04', '2017-09-04'),
('2017/2018', '2017-09-04', '2018-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(10) NOT NULL,
  `course` varchar(100) NOT NULL,
  `department_id` varchar(10) NOT NULL,
  `nvq_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course`, `department_id`, `nvq_id`) VALUES
('D33C001', 'Mechatronics Technology', 'EET', 5),
('K72C001', ' Information and Communication Technology', 'ICT', 5);

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
('AUT', 'Automotive & Agricultural Technology'),
('COT', 'Construction Technology '),
('EET', 'Electrical & Electronic Technology '),
('FDT', 'Food Technology '),
('ICT', 'Information and Communication Technology'),
('MET', 'Mechanical Technology ');

-- --------------------------------------------------------

--
-- Table structure for table `enrollstudent`
--

CREATE TABLE `enrollstudent` (
  `course_id` varchar(10) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `enrolled_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `academic_year` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollstudent`
--

INSERT INTO `enrollstudent` (`course_id`, `student_id`, `enrolled_date`, `academic_year`) VALUES
('K72C001', '2016ICTBIT01', '2018-03-24 16:44:14', '2017/2018'),
('K72C001', '2016ICTBIT02', '2018-03-24 16:44:14', '2017/2018');

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
('D33C001M01', 'D33C001', 'Engineering Drawing I '),
('D33C001M02', 'D33C001', 'Applied Electricity'),
('D33C001M03', 'D33C001', 'Applied Electronics'),
('D33C001M04', 'D33C001', 'Safety & Workshop Environment'),
('D33C001M05', 'D33C001', 'Workshop Technology'),
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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `email`) VALUES
('2016ICTBIT01', 'John', 'Smith', 'achch1990@gmail.com'),
('2016ICTBIT02', 'Raja', 'Kayal', 'achchu1990@gmail.com');

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
('3e11731575516566d4662ff631d12153', 14, 'K72C001', 'K72C001M03', 'ICT', 1, 3681, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', '', '', '2018-03-04 15:23:28'),
('0cfada8c75b0ad1412b4a60f324c344d', 15, 'K72C001', 'K72C001M02', 'EET', 3, 3682, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'good', 'no', 'busy', '2018-03-24 15:39:25'),
('0cfada8c75b0ad1412b4a60f324c344d', 16, 'K72C001', 'K72C001M02', 'EET', 3, 3682, 1, 2, 3, 3, 2, 1, 2, 2, 2, 3, 4, 4, 2, 3, 3, 3, 2, 3, 'ghj', 'jgjhj', 'jhjghj', '2018-03-24 15:43:25');

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
(3, '3e11731575516566d4662ff631d12153', 1, '2018-03-04 15:10:15', '2019-01-01 15:10:15', 3681, 'K72C001', 'K72C001M03', 'ICT', 1),
(6, '348fb5391c9f025b91ccc01e86745ef3', 1, '2018-03-24 15:34:41', '2018-03-24 18:30:00', 3681, 'D33C001', 'D33C001M01', 'EET', 3),
(7, '0cfada8c75b0ad1412b4a60f324c344d', 1, '2018-03-24 15:35:24', '2018-04-27 18:30:00', 3682, 'K72C001', 'K72C001M02', 'EET', 3),
(8, 'b627a961f11a66c7cac56aee739202eb', 1, '2018-03-24 15:52:42', '2018-03-23 18:30:00', 3683, 'D33C001', 'D33C001M01', 'EET', 3),
(9, '1b87fd207c4fcaaa5fbe549c1a052400', 1, '2018-03-24 15:52:56', '2018-04-27 18:30:00', 3681, 'K72C001', 'K72C001M01', 'ICT', 3);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(10) NOT NULL,
  `term` varchar(100) NOT NULL,
  `academic_year` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `term`, `academic_year`) VALUES
(1, 'Semester I', '2016/2017'),
(2, 'Semester II', '2016/2017'),
(3, 'Semester I', '2017/2018');

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
-- Indexes for table `academicyear`
--
ALTER TABLE `academicyear`
  ADD PRIMARY KEY (`acedemic_year`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `nvq_id` (`nvq_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `enrollstudent`
--
ALTER TABLE `enrollstudent`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `academic_year` (`academic_year`);

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
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

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
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `academic_year` (`academic_year`);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `surveytoken`
--
ALTER TABLE `surveytoken`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`nvq_id`) REFERENCES `nvq` (`nvq_id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `enrollstudent`
--
ALTER TABLE `enrollstudent`
  ADD CONSTRAINT `enrollstudent_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `enrollstudent_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `enrollstudent_ibfk_3` FOREIGN KEY (`academic_year`) REFERENCES `academicyear` (`acedemic_year`);

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

--
-- Constraints for table `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `term_ibfk_1` FOREIGN KEY (`academic_year`) REFERENCES `academicyear` (`acedemic_year`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
