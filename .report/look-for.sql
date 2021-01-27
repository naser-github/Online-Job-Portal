-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 07:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `look-for`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_username` varchar(100) NOT NULL,
  `ad_email` varchar(100) NOT NULL,
  `ad_name` varchar(20) NOT NULL,
  `ad_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_username`, `ad_email`, `ad_name`, `ad_pass`) VALUES
('tayson', 'ab.naser01@gmail.com', 'Naser', 'tayson'),
('najmul', 'najmul@gmail.com', 'Abdul Aziz', 'najmul');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_email` varchar(100) NOT NULL,
  `emp_name` varchar(40) NOT NULL,
  `emp_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_email`, `emp_name`, `emp_pass`) VALUES
('mishkat@gmail.com', 'Mishkat', 'mishkat'),
('nafis@gmail.com', 'Nafis', 'nafis'),
('tushar@gmail.com', 'Tushar', 'tushar');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(255) NOT NULL,
  `job_title` varchar(40) NOT NULL,
  `job_description` varchar(100) NOT NULL,
  `job_requirement` varchar(100) NOT NULL,
  `job_deadline` date NOT NULL,
  `catagory` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `cmp_name` varchar(20) NOT NULL,
  `cmp_type` varchar(20) NOT NULL,
  `job_location` varchar(100) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `vacancy` varchar(20) NOT NULL,
  `employee_emp_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_title`, `job_description`, `job_requirement`, `job_deadline`, `catagory`, `state`, `cmp_name`, `cmp_type`, `job_location`, `salary`, `vacancy`, `employee_emp_email`) VALUES
(1, 'Assistant IT Officer', 'Blah Blah Blah Blah       ', ' Blah Blah Blah Blah       ', '2021-01-13', 'IT', 'Dhaka', 'blah', 'Private', 'Banasree', 'negotiable', 'not specified', 'nafis@gmail.com'),
(3, 'Need a Trainee Executive', 'Blah Blah Blah Blah  ', ' Blah Blah Blah Blah  ', '2021-01-13', 'Commercial', 'Dhaka', 'blah', 'Private', 'Banasree', 'negotiable', 'not specified', 'nafis@gmail.com'),
(10, 'IT', ' Blah Blah Blah Blah  ', ' Blah Blah Blah Blah  ', '2021-01-27', 'IT', 'Dhaka', 'blah', 'Private', 'banasree', 'negotiable', 'not specified', 'mishkat@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

CREATE TABLE `job_apply` (
  `seeker_sk_email` varchar(100) NOT NULL,
  `job_job_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_apply`
--

INSERT INTO `job_apply` (`seeker_sk_email`, `job_job_id`) VALUES
('kishor@gmail.com', 1),
('kishor@gmail.com', 3),
('muhammad@gmail.com', 1),
('muhammad@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE `seeker` (
  `sk_email` varchar(100) NOT NULL,
  `sk_name` varchar(40) NOT NULL,
  `sk_pass` varchar(20) NOT NULL,
  `sk_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seeker`
--

INSERT INTO `seeker` (`sk_email`, `sk_name`, `sk_pass`, `sk_pdf`) VALUES
('kishor@gmail.com', 'Kishor', 'kishor', 'Resume.pdf'),
('muhammad@gmail.com', 'Muhammad', 'muhammad', 'CV.pdf'),
('nazat@gmail.com', 'nazat', 'nazat', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_email`,`ad_username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_email`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `job_employee_fk` (`employee_emp_email`);

--
-- Indexes for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD PRIMARY KEY (`seeker_sk_email`,`job_job_id`),
  ADD KEY `job_apply_job_fk` (`job_job_id`);

--
-- Indexes for table `seeker`
--
ALTER TABLE `seeker`
  ADD PRIMARY KEY (`sk_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_employee_fk` FOREIGN KEY (`employee_emp_email`) REFERENCES `employee` (`emp_email`);

--
-- Constraints for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD CONSTRAINT `job_apply_job_fk` FOREIGN KEY (`job_job_id`) REFERENCES `job` (`job_id`),
  ADD CONSTRAINT `job_apply_seeker_fk` FOREIGN KEY (`seeker_sk_email`) REFERENCES `seeker` (`sk_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
