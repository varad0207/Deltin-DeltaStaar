-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 05:33 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deltinconnect1_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE `accomodation` (
  `acc_id` int(11) NOT NULL,
  `acc_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bldg_status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female','Unisex') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tot_capacity` int(11) NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `occupied_rooms` int(11) DEFAULT NULL,
  `available_rooms` int(11) DEFAULT NULL,
  `owner` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `raise_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tech_closure_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `sec_closure_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `warden_closure_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `raise_timestamp`, `category`, `description`, `status`, `tech_closure_timestamp`, `sec_closure_timestamp`, `warden_closure_timestamp`, `remarks`, `emp_code`) VALUES
(2, '2022-11-09 18:02:15', 'Electrical', 'bulb replacement', NULL, '2022-11-09 18:02:15', '2022-11-09 18:02:15', '2022-11-09 18:02:15', NULL, 'ABCD1234'),
(9, '2022-11-16 14:34:24', 'Plumbing', 'flush', NULL, '2022-11-16 14:34:24', '2022-11-16 14:34:24', '2022-11-16 14:34:24', NULL, 'ABCD1234'),
(10, '2022-11-17 10:07:35', 'Carpentary', 'table broken', NULL, '2022-11-17 10:07:35', '2022-11-17 10:07:35', '2022-11-17 10:07:35', NULL, 'ABCD1234'),
(12, '2022-12-07 07:21:15', 'Plumbing', 'ASQqe', NULL, '2022-12-07 07:21:15', '2022-12-07 07:21:15', '2022-12-07 07:21:15', NULL, 'ABCD1234'),
(13, '2022-12-07 07:47:42', 'Electrical', 'dzfsfas', NULL, '2022-12-07 07:47:42', '2022-12-07 07:47:42', '2022-12-07 07:47:42', NULL, 'ABCD1234'),
(14, '2022-12-07 07:48:31', 'Carpentary', 'chair broken', NULL, '2022-12-07 07:48:31', '2022-12-07 07:48:31', '2022-12-07 07:48:31', NULL, 'ABCD1234'),
(15, '2022-12-07 09:20:04', 'Others', 'dfAS', NULL, '2022-12-07 09:20:04', '2022-12-07 09:20:04', '2022-12-07 09:20:04', NULL, 'ABCD1234'),
(16, '2022-12-07 09:22:04', 'Others', 'xfgsd', NULL, '2022-12-07 09:22:04', '2022-12-07 09:22:04', '2022-12-07 09:22:04', NULL, 'ABCD1234'),
(18, '2022-12-07 13:27:31', 'other', 'sdfa', NULL, '2022-12-07 13:27:31', '2022-12-07 13:27:31', '2022-12-07 13:27:31', NULL, 'ABCD1234'),
(19, '2022-12-07 13:31:57', 'Plumbing', 'asfa', NULL, '2022-12-07 13:31:57', '2022-12-07 13:31:57', '2022-12-07 13:31:57', NULL, 'ABCD1234'),
(20, '2022-12-07 13:33:27', 'Others', 'hello world', NULL, '2022-12-07 13:33:27', '2022-12-07 13:33:27', '2022-12-07 13:33:27', NULL, 'ABCD1234'),
(21, '2022-12-07 13:38:43', 'Others', 'other', NULL, '2022-12-07 13:38:43', '2022-12-07 13:38:43', '2022-12-07 13:38:43', NULL, 'ABCD1234'),
(22, '2022-12-07 15:06:15', 'Carpentary', 'asdf', NULL, '2022-12-07 15:06:15', '2022-12-07 15:06:15', '2022-12-07 15:06:15', NULL, 'ABCD1234');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `emp_id` int(11) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `aadhaar_number` int(11) NOT NULL,
  `salary` float DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_code`, `fname`, `mname`, `lname`, `designation`, `dob`, `address`, `state`, `country`, `pincode`, `email`, `blood_group`, `department`, `joining_date`, `aadhaar_number`, `salary`, `acc_id`) VALUES
(1, 'ABCD1234', 'Chinmay', 'Umesh', '', 'Team Lead', '2002-07-05', 'Flat rt6 Fonseca Arcade tisk ponda', 'Goa', 'India', 403401, 'chinmayjoshi5702@gmail.com', NULL, 'IT', NULL, 1234567890, NULL, NULL),
(6, 'qwer1234', 'Ivan', 'William', 'Azim', 'manager', '0000-00-00', 'sanvordem', 'goa', 'india', 403706, 'iaxivanazim@gmail.com', 'B+', 'IT', '0000-00-00', 12345, 50000, NULL),
(11, 'gf2341', 'Ivan', 'William', 'Azim', 'Manager', '2019-06-05', 'sanvordem', 'Goa', 'India', 403706, 'iaxivanazim@gmail.com', 'B+', 'IT', '2022-12-01', 1234567, 500000, 0),
(12, 'grsdf23', 'Ivan', 'William', 'Azim', 'Manager', '2022-12-05', 'sanvordem', 'Goa', 'India', 403706, 'iaxivanazim@gmail.com', 'B+', 'IT', '2022-12-01', 1234567, 500000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_outing`
--

CREATE TABLE `employee_outing` (
  `emp_id` int(11) NOT NULL,
  `approval` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outing_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `category` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rights` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `acc_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `room_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_room_occupancy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `emp_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tankers`
--

CREATE TABLE `tankers` (
  `id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `security_emp_id` int(11) NOT NULL,
  `tanker_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality_check` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `vendor_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `vaccination_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_of_administration` date NOT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_next_dose` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_category`
--

CREATE TABLE `vaccination_category` (
  `category_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_log`
--

CREATE TABLE `visitor_log` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `security_emp_id` int(11) NOT NULL,
  `visitor_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_no` int(11) DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check_out` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purpose` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `acc_code` (`acc_code`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_code` (`emp_code`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`emp_id`,`contact`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_code` (`emp_code`);

--
-- Indexes for table `employee_outing`
--
ALTER TABLE `employee_outing`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `tankers`
--
ALTER TABLE `tankers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tanker_id` (`tanker_id`),
  ADD KEY `security_emp_id` (`security_emp_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`vaccination_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `vaccination_category`
--
ALTER TABLE `vaccination_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `visitor_log`
--
ALTER TABLE `visitor_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `security_emp_id` (`security_emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tankers`
--
ALTER TABLE `tankers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `vaccination_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccination_category`
--
ALTER TABLE `vaccination_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor_log`
--
ALTER TABLE `visitor_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`emp_code`) REFERENCES `employee` (`emp_code`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `employee_outing`
--
ALTER TABLE `employee_outing`
  ADD CONSTRAINT `employee_outing_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`);

--
-- Constraints for table `security`
--
ALTER TABLE `security`
  ADD CONSTRAINT `security_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `security_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`);

--
-- Constraints for table `tankers`
--
ALTER TABLE `tankers`
  ADD CONSTRAINT `tankers_ibfk_1` FOREIGN KEY (`security_emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `tankers_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`);

--
-- Constraints for table `technician`
--
ALTER TABLE `technician`
  ADD CONSTRAINT `technician_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD CONSTRAINT `vaccination_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `vaccination_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `vaccination_category` (`category_id`);

--
-- Constraints for table `visitor_log`
--
ALTER TABLE `visitor_log`
  ADD CONSTRAINT `visitor_log_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `visitor_log_ibfk_2` FOREIGN KEY (`security_emp_id`) REFERENCES `employee` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
