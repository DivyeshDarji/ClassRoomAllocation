-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 07:47 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `floor` int(5) NOT NULL,
  `classroom_number` varchar(10) NOT NULL,
  `room_type` varchar(40) NOT NULL,
  `system` varchar(40) NOT NULL,
  `capacity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`floor`, `classroom_number`, `room_type`, `system`, `capacity`) VALUES
(1, 'CR13', 'Classroom', 'Smart Board', 50),
(1, 'CR14', 'Classroom', 'White Board', 50),
(2, 'CR24', 'Classroom', 'Smart Board', 50),
(3, 'CR33', 'Classroom', 'Smart Board', 30),
(3, 'CR35', 'Classroom', 'White Board', 40),
(4, 'CR42', 'Classroom', 'White Board', 65),
(5, 'CR54', 'Classroom', 'Smart Board', 60),
(5, 'LAB5A', 'Lab', 'White Board', 30),
(1, 'LAB5B', 'Lab', 'Smart Board', 20);

-- --------------------------------------------------------

--
-- Table structure for table `classroomallocation`
--

CREATE TABLE `classroomallocation` (
  `allc_id` int(10) NOT NULL,
  `allc_day` varchar(20) NOT NULL,
  `allc_start_time` int(10) NOT NULL,
  `allc_end_time` int(10) NOT NULL,
  `allc_course_id` int(10) NOT NULL,
  `allc_subject_id` int(10) NOT NULL,
  `allc_faculty_id` int(10) NOT NULL,
  `allc_cc_id` int(10) NOT NULL,
  `allc_classroom_number` varchar(10) NOT NULL,
  `allc_createDate` datetime NOT NULL,
  `allc_validTillDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroomallocation`
--

INSERT INTO `classroomallocation` (`allc_id`, `allc_day`, `allc_start_time`, `allc_end_time`, `allc_course_id`, `allc_subject_id`, `allc_faculty_id`, `allc_cc_id`, `allc_classroom_number`, `allc_createDate`, `allc_validTillDate`) VALUES
(563, 'Monday', 2, 3, 6, 406, 305, 131, 'CR33', '2018-10-29 01:24:25', '2018-10-30 01:24:25'),
(564, 'Monday', 2, 3, 6, 401, 301, 131, 'CR35', '2018-10-29 01:24:55', '2018-10-30 01:24:55'),
(604, 'Monday', 2, 3, 6, 402, 302, 131, 'LAB5B', '2018-10-29 01:42:52', '2018-10-30 01:42:52'),
(614, 'Monday', 2, 3, 6, 401, 301, 131, 'CR24', '2018-10-29 01:51:43', '2018-10-30 01:51:43'),
(615, 'Wednesday', 2, 3, 6, 402, 302, 131, 'CR54', '2018-10-29 01:52:16', '2018-10-30 01:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `course_name` varchar(25) NOT NULL,
  `course_sem` varchar(10) NOT NULL,
  `course_division` varchar(20) NOT NULL,
  `course_cr_name` varchar(30) NOT NULL,
  `course_cr_contactnum` bigint(11) NOT NULL,
  `course_cr_email` varchar(55) NOT NULL,
  `course_sr_name` varchar(30) NOT NULL,
  `course_sr_contactnum` bigint(11) NOT NULL,
  `course_sr_email` varchar(55) NOT NULL,
  `course_cc_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_sem`, `course_division`, `course_cr_name`, `course_cr_contactnum`, `course_cr_email`, `course_sr_name`, `course_sr_contactnum`, `course_sr_email`, `course_cc_id`) VALUES
(6, 'MCA', 'III', 'A', 'Divyesh Darji', 8169318180, 'darji.divyesh@yahoo.com', 'Prathamesh Mule', 9166584722, 'prathamesh.mule@gmail.com', 131),
(8, 'MCA', 'I', 'A', 'Dhanusha Agarwal', 1234567885, 'dhanusha.agarwal@gmail.com', 'Divya Bhatnagar', 9856471234, 'divya.bhatnagar@gmail.com', 131),
(13, 'MCA', 'V', 'A', 'Tejas Mayor', 78451236985, 'tejas.mayor@gmail.com', 'Shreya Sharma', 9856741235, 'shreya.sharma@gmail.com', 135),
(14, 'MBA', 'I', 'A', 'Darji', 8564231542, 'darji_darji@gmail.com', 'divya', 9568231423, 'norighttodivya@gmail.com', 143);

-- --------------------------------------------------------

--
-- Table structure for table `course_coordinator`
--

CREATE TABLE `course_coordinator` (
  `cc_id` int(10) NOT NULL,
  `cc_name` varchar(35) NOT NULL,
  `cc_contactnum` bigint(11) NOT NULL,
  `cc_email` varchar(55) NOT NULL,
  `cc_password` varchar(16) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_coordinator`
--

INSERT INTO `course_coordinator` (`cc_id`, `cc_name`, `cc_contactnum`, `cc_email`, `cc_password`, `type`) VALUES
(131, 'Sharavari Naik', 9865327402, 'sharvarinaik@gmail.com', 'sharvarinaik', 'Course Co-ordinator'),
(133, 'Pratik Thacker', 9586412374, 'pratik.thacker@gmail.com', 'pratikthacker', 'Course Co-ordinator'),
(134, 'Priyanka Choudhari', 9870797062, 'priyankachoudhari96@gmail.com', 'priyankac', 'Admin'),
(136, 'Divyesh Darji', 816931062, 'darji@gmail.com', 'darji@123', 'Admin'),
(135, 'Deepa Krishnan', 9586423174, 'deepa.krishnan@gmail.com', 'deepak', 'Course Co-ordinator'),
(143, 'Shweta Sarkar', 7845123690, 'shweta.nmims@gmail.com', 'shweta.nmims', 'Course Co-ordinator'),
(144, 'Bal Thackeray', 7666000786, 'bal@thackeray.org', 'bal.thackeray', 'Course Co-ordinator');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(10) NOT NULL,
  `faculty_name` varchar(40) NOT NULL,
  `faculty_contactnum` bigint(10) NOT NULL,
  `faculty_email` varchar(55) NOT NULL,
  `faculty_course_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_contactnum`, `faculty_email`, `faculty_course_id`) VALUES
(301, 'Payal Mishra', 9568231472, 'payal.mishra@gmail.com', 6),
(302, 'Rajeev Gupta', 92358415678, 'rajeev.gupta@gmail.com', 6),
(304, 'Abhishek Vichare', 9856724123, 'abhishek.vichare@gmail.com', 6),
(305, 'Vijayetha Thoday', 8564123785, 'vijayetha.thoday@gmail.com', 6),
(306, 'Mahesh Mali', 9562147832, 'mahesh.mali@gmail.com', 6),
(307, 'Leena Thakkar', 7562148963, 'leena.thakkar@gmail.com', 6),
(308, 'Binny Khanna', 8541236547, 'binny.khanna@gmail.com', 6);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lec_id` int(10) NOT NULL,
  `lec_day` varchar(20) NOT NULL,
  `lec_start_time` int(10) NOT NULL,
  `lec_end_time` int(10) NOT NULL,
  `lec_course_id` int(10) NOT NULL,
  `lec_subject_id` int(10) DEFAULT NULL,
  `lec_classroom_number` varchar(10) NOT NULL,
  `lec_faculty_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lec_id`, `lec_day`, `lec_start_time`, `lec_end_time`, `lec_course_id`, `lec_subject_id`, `lec_classroom_number`, `lec_faculty_id`) VALUES
(166, 'Monday', 8, 9, 6, 401, 'CR13', 301),
(167, 'Tuesday', 8, 9, 6, 402, 'CR13', 302),
(168, 'Wednesday', 8, 9, 6, 402, 'CR35', 302),
(169, 'Thursday', 8, 9, 6, 406, 'CR24', 305);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(10) NOT NULL,
  `subject_name` varchar(40) NOT NULL,
  `s_course_id` int(10) NOT NULL,
  `s_faculty_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `s_course_id`, `s_faculty_id`) VALUES
(401, 'OOSE', 6, 301),
(402, 'AJ', 6, 302),
(403, 'Computer Networks', 8, 301),
(406, 'WP', 6, 305),
(407, 'PA', 6, 306),
(408, 'IEM', 6, 307),
(409, 'MC', 6, 308),
(410, 'ADBMS', 6, 304);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(1001, 'admin@gmail.com', 'admin'),
(1002, 'darji@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`classroom_number`);

--
-- Indexes for table `classroomallocation`
--
ALTER TABLE `classroomallocation`
  ADD PRIMARY KEY (`allc_id`),
  ADD KEY `allc_course_id` (`allc_course_id`),
  ADD KEY `allc_cc_id` (`allc_cc_id`),
  ADD KEY `allc_classroom_number` (`allc_classroom_number`),
  ADD KEY `allc_subejct_id` (`allc_subject_id`),
  ADD KEY `allc_faculty_id` (`allc_faculty_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_cr_email` (`course_cr_email`),
  ADD UNIQUE KEY `course_cr_contactnum` (`course_cr_contactnum`),
  ADD UNIQUE KEY `course_sr_contactnum` (`course_sr_contactnum`),
  ADD UNIQUE KEY `course_sr_email` (`course_sr_email`),
  ADD KEY `cc_name` (`course_cc_id`),
  ADD KEY `course_cc_id` (`course_cc_id`);

--
-- Indexes for table `course_coordinator`
--
ALTER TABLE `course_coordinator`
  ADD PRIMARY KEY (`cc_id`),
  ADD UNIQUE KEY `cc_email` (`cc_email`),
  ADD UNIQUE KEY `cc_contactnum` (`cc_contactnum`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `Unique` (`faculty_email`),
  ADD UNIQUE KEY `faculty_contactnum` (`faculty_contactnum`),
  ADD KEY `faculty_course_id` (`faculty_course_id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lec_id`),
  ADD KEY `course_id` (`lec_course_id`),
  ADD KEY `lec_subject_id` (`lec_subject_id`),
  ADD KEY `lec_classroom_number` (`lec_classroom_number`),
  ADD KEY `lec_faculty_id` (`lec_faculty_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `s_faculty_id` (`s_faculty_id`),
  ADD KEY `s_course_id` (`s_course_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroomallocation`
--
ALTER TABLE `classroomallocation`
  MODIFY `allc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=622;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `course_coordinator`
--
ALTER TABLE `course_coordinator`
  MODIFY `cc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;
--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `lec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `classroomallocation`
--
ALTER TABLE `classroomallocation`
  ADD CONSTRAINT `allc_classroom_number` FOREIGN KEY (`allc_classroom_number`) REFERENCES `classroom` (`classroom_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allc_faculty_id` FOREIGN KEY (`allc_faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allc_subject_id` FOREIGN KEY (`allc_subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classroomallocation_ibfk_1` FOREIGN KEY (`allc_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classroomallocation_ibfk_4` FOREIGN KEY (`allc_cc_id`) REFERENCES `course_coordinator` (`cc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_cc` FOREIGN KEY (`course_cc_id`) REFERENCES `course_coordinator` (`cc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_course_id` FOREIGN KEY (`faculty_course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`lec_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lec_classroom_number` FOREIGN KEY (`lec_classroom_number`) REFERENCES `classroom` (`classroom_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lecture_ibfk_1` FOREIGN KEY (`lec_subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lecture_ibfk_2` FOREIGN KEY (`lec_faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`s_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`s_faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
