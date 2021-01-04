-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 08:34 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `industrialvisit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `industry_id` int(11) NOT NULL,
  `industry_name` text NOT NULL,
  `industry_email` varchar(50) NOT NULL,
  `industry_website` text NOT NULL,
  `industry_password` varchar(50) NOT NULL,
  `industry_address` text NOT NULL,
  `industry_city` text NOT NULL,
  `industry_state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`industry_id`, `industry_name`, `industry_email`, `industry_website`, `industry_password`, `industry_address`, `industry_city`, `industry_state`) VALUES
(1, 'Defence Research and Development Organisation', 'contact@drdo.gov.in', 'drdo.gov.in', '6f06705e352d59cc639296843e8a5f30', 'DRDO HQ, DRDO Bhawan Rajaji Marg, New Delhi- 110 011', 'New Delhi', 'Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `institute_id` int(11) NOT NULL,
  `institute_name` text NOT NULL,
  `institute_email` varchar(50) NOT NULL,
  `institute_website` text NOT NULL,
  `institute_password` varchar(50) NOT NULL,
  `institute_address` text NOT NULL,
  `institute_city` text NOT NULL,
  `institute_state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`institute_id`, `institute_name`, `institute_email`, `institute_website`, `institute_password`, `institute_address`, `institute_city`, `institute_state`) VALUES
(1, 'Vidyalankar School of Information Technology ', 'contact@vsit.edu.in', 'vsit.edu.in', 'ab30d26d0cf4da3f7b8349a8fa285840', 'Vidyalankar Educational Campus, Vidyalankar College Rd, Wadala East, Deen Bandhu Nagar, Antop Hill, Mumbai, Maharashtra 400037', 'Mumbai', 'Maharashtra '),
(2, 'Vidyalankar Polytechnic', 'contact@vpt.edu.in', 'vpt.edu.in', '825ac5d621ef983e9b0ba4f69a19fb95', 'Vidyalankar Campus, Vidyalankar College Rd, Wadala East, Sangam Nagar, Mumbai, Maharashtra 400037', 'Mumbai', 'Maharashtra ');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_for_request_id` int(11) NOT NULL,
  `package_for_institute_id` int(11) NOT NULL,
  `package_name` text NOT NULL,
  `package_description` text NOT NULL,
  `address` text NOT NULL,
  `food_option` int(11) NOT NULL,
  `instructions` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package_for_request_id`, `package_for_institute_id`, `package_name`, `package_description`, `address`, `food_option`, `instructions`, `price`) VALUES
(2, 18, 2, 'DRDO Insutrial Visit', '2 Day industrial Visit to DRDO', 'Delhi', 1, '8 to 10 Instructions', 2200);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `request_from_institute_id` int(11) DEFAULT NULL,
  `request_from_institute_name` text NOT NULL,
  `request_to_industry_id` int(11) NOT NULL,
  `request_to_industry_name` text NOT NULL,
  `institute_phone_number` text NOT NULL,
  `number_of_students` int(11) NOT NULL,
  `number_of_faculties` int(11) NOT NULL,
  `number_of_days` int(11) NOT NULL,
  `date_of_visit` date NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date_of_request` date NOT NULL,
  `request_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_from_institute_id`, `request_from_institute_name`, `request_to_industry_id`, `request_to_industry_name`, `institute_phone_number`, `number_of_students`, `number_of_faculties`, `number_of_days`, `date_of_visit`, `subject`, `message`, `date_of_request`, `request_status`) VALUES
(18, 2, 'Vidyalankar Polytechnic', 1, 'Defence Research and Development Organisation', '7418529630', 40, 6, 2, '2021-04-21', 'Industrial Visit to DRDO', 'We at Vidyalankar Polytehnic are interested for a Industrial Visit at DRDO for our students', '2020-12-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` text NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_password` varchar(50) NOT NULL,
  `institute_id` int(11) NOT NULL,
  `phone_number` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_email`, `student_password`, `institute_id`, `phone_number`) VALUES
(3, 'Shreyas Kothakonda', 'shreyask@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 2, 7418529630),
(5, 'Prince Karania', 'prince@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1, 8541236985),
(6, 'Uday Jadhav', 'uday@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 2, 0),
(7, 'Devang Shirodkar', 'devang@gmail.com', '6560655a35c7a405888bc11cb09e771e', 1, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`industry_id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`institute_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `industry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `institute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
