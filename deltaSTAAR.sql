-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 12:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deltastaar`
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

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`acc_id`, `acc_code`, `acc_name`, `bldg_status`, `location`, `gender`, `tot_capacity`, `no_of_rooms`, `occupied_rooms`, `available_rooms`, `owner`, `remark`) VALUES
(1, 'acc123', 'abcd', 'Active', 'Panaji', 'Unisex', 400, 15, 8, 7, 'chinmay', 'none'),
(2, 'A123', 'Madhuban', 'Active', 'Panaji', 'Male', 200, 20, 2, 18, 'Varad', 'None'),
(3, 'AB1122', 'Taleigao', 'Permanentl', 'Panaji', 'Unisex', 400, 30, 1, 29, 'Deltin', 'none'),
(4, 'XYZ23', 'Mandovi', 'Permanentl', 'Panaji', 'Female', 500, 32, 12, 20, 'Deltastaar', 'Accommodation only for female staff'),
(5, 'xyz112', 'Porvorim', 'Active', 'Porvorim', 'Unisex', 1000, 50, 17, 33, 'Deltastaar', 'Accommodation for both male and female staff');

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `login_id` int(11) NOT NULL,
  `table_affected` varchar(255) NOT NULL,
  `changes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `raise_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` int(11) NOT NULL,
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

INSERT INTO `complaints` (`id`, `raise_timestamp`, `type`, `description`, `status`, `tech_closure_timestamp`, `sec_closure_timestamp`, `warden_closure_timestamp`, `remarks`, `emp_code`) VALUES
(1, '2022-12-19 11:30:03', 1, 'bulb not working', NULL, '2022-12-19 11:30:03', '2022-12-19 11:30:03', '2022-12-19 11:30:03', NULL, 'ABCD1234'),
(2, '2022-12-20 05:01:37', 2, 'plumbing', NULL, '2022-12-20 05:01:37', '2022-12-20 05:01:37', '2022-12-20 05:01:37', NULL, 'AB224'),
(3, '2022-12-20 05:39:02', 3, 'Broken table', NULL, '2022-12-20 05:39:02', '2022-12-20 05:39:02', '2022-12-20 05:39:02', NULL, 'ABCD1234');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`id`, `type`, `description`) VALUES
(1, 'Electrical', 'Anything related to electrical work and appliances'),
(2, 'Plumbing', 'Anything related to water supply and plumbing'),
(3, 'Carpentry', 'Anything related to furniture and woodwork'),
(4, 'Other', 'Any other complain ');

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
  `designation` int(11) NOT NULL,
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
  `acc_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `contact` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_code`, `fname`, `mname`, `lname`, `designation`, `dob`, `address`, `state`, `country`, `pincode`, `email`, `blood_group`, `department`, `joining_date`, `aadhaar_number`, `salary`, `acc_id`, `role`, `contact`) VALUES
(1, 'ABCD1234', 'Chinmay', 'Umesh', 'Joshi', 2, '2002-07-05', 'ponda goa', 'Goa', 'India', 403401, 'chinmayjoshi5702@gmail.com', 'A+', 'IT', '2022-05-19', 1234567890, 12000, 3, 1, 1234567890),
(2, 'AB224', 'Varad', 'M', 'Kelkar', 1, '2002-07-02', 'Fatorda', 'Goa', 'India', 403602, 'varad@kelkar', 'A-', 'COMP', '2022-12-02', 44002231, 10000, 1, 1, 2147483647),
(3, 'A123', 'Ivan', 'iax', 'Azim', 3, '2022-12-02', 'Sanguem', 'Goa', 'India', 403601, 'ivan@azim', 'O+', 'COMP', '2022-12-01', 222330, 12000, 2, 1, 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `employee_designation`
--

CREATE TABLE `employee_designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_designation`
--

INSERT INTO `employee_designation` (`id`, `designation`) VALUES
(1, 'Manager'),
(2, 'Team Lead'),
(3, 'Admin'),
(4, 'Front Desk Manager'),
(5, 'HR');

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

--
-- Dumping data for table `employee_outing`
--

INSERT INTO `employee_outing` (`emp_id`, `approval`, `outing_date`, `arrival_date`, `category`) VALUES
(2, NULL, '2022-12-20', '2022-12-30', 'home'),
(1, NULL, '2022-12-01', '2022-12-29', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `emp_id` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`emp_id`, `pass`) VALUES
(1, '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, '0444c32ebf0b36d55d38afd22ad00ecd');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `emp_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logout_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`emp_id`, `login_time`, `logout_time`, `id`) VALUES
(1, '2022-12-19 08:38:57', '2022-12-19 08:38:57', 1),
(1, '2022-12-19 08:40:49', '2022-12-19 08:40:49', 2),
(1, '2022-12-19 08:58:15', '2022-12-19 08:58:15', 3),
(1, '2022-12-19 09:01:02', '2022-12-19 09:01:02', 4),
(1, '2022-12-19 09:05:52', '2022-12-19 09:05:52', 5),
(1, '2022-12-19 09:28:37', '2022-12-19 09:28:37', 6),
(1, '2022-12-20 11:37:36', '2022-12-20 11:37:36', 9),
(1, '2022-12-21 03:01:02', '2022-12-21 03:01:02', 10),
(1, '2022-12-21 03:21:21', '2022-12-21 03:21:21', 11),
(2, '2022-12-21 03:35:28', '2022-12-21 03:35:28', 12),
(2, '2022-12-21 03:35:37', '2022-12-21 03:35:37', 13),
(2, '2022-12-21 11:39:08', '2022-12-21 11:39:08', 14),
(1, '2022-12-21 11:39:26', '2022-12-21 11:39:26', 15),
(2, '2022-12-21 11:40:44', '2022-12-21 11:40:44', 16),
(1, '2022-12-21 11:41:43', '2022-12-21 11:41:43', 17),
(1, '2022-12-21 12:02:07', '2022-12-21 12:02:07', 18),
(1, '2022-12-21 12:02:52', '2022-12-21 12:02:52', 19),
(1, '2022-12-21 12:04:01', '2022-12-21 12:04:01', 20),
(2, '2022-12-21 12:06:11', '2022-12-21 12:06:11', 21),
(2, '2022-12-22 04:24:09', '2022-12-22 04:24:09', 22),
(2, '2022-12-22 04:28:01', '2022-12-22 04:28:01', 23),
(2, '2022-12-22 10:30:12', '2022-12-22 10:30:12', 24),
(2, '2022-12-22 10:35:54', '2022-12-22 10:35:54', 25),
(2, '2022-12-23 07:47:26', '2022-12-23 07:47:26', 26),
(1, '2022-12-23 10:00:13', '2022-12-23 10:00:13', 27),
(1, '2022-12-23 10:08:36', '2022-12-23 10:08:36', 28),
(2, '2022-12-23 10:09:20', '2022-12-23 10:09:20', 29),
(2, '2022-12-23 11:36:06', '2022-12-23 11:36:06', 30),
(1, '2022-12-23 11:39:37', '2022-12-23 11:39:37', 31),
(2, '2022-12-24 10:21:25', '2022-12-24 10:21:25', 32),
(2, '2022-12-24 10:24:38', '2022-12-24 10:24:38', 33),
(2, '2022-12-29 09:36:42', '2022-12-29 09:36:42', 34),
(2, '2022-12-30 07:03:27', '2022-12-30 07:03:27', 35),
(2, '2022-12-30 09:53:35', '2022-12-30 09:53:35', 36),
(1, '2022-12-30 09:53:59', '2022-12-30 09:53:59', 37),
(1, '2022-12-30 09:54:44', '2022-12-30 09:54:44', 38),
(1, '2022-12-30 09:55:27', '2022-12-30 09:55:27', 39),
(2, '2022-12-30 10:31:38', '2022-12-30 10:31:38', 40),
(2, '2022-12-30 16:44:33', '2022-12-30 16:44:33', 41),
(2, '2022-12-31 04:42:10', '2022-12-31 04:42:10', 42),
(1, '2022-12-31 09:34:18', '2022-12-31 09:34:18', 43);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `id` int(11) NOT NULL,
  `accomodation` enum('0','1','2','4','7') NOT NULL,
  `complaints` enum('0','1','2','4','7') NOT NULL,
  `employee_details` enum('0','1','2','4','7') NOT NULL,
  `employee_outing` enum('0','1','2','4','7') NOT NULL,
  `roles` enum('0','1','2','4','7') NOT NULL,
  `rooms` enum('0','1','2','4','7') NOT NULL,
  `tankers` enum('0','1','2','4','7') NOT NULL,
  `jobs` enum('0','1','2','4','7') NOT NULL,
  `vaccination` enum('0','1','2','4','7') NOT NULL,
  `vaccination_category` enum('0','1','2','4','7') NOT NULL,
  `visitor_log` enum('0','1','2','4','7') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`id`, `accomodation`, `complaints`, `employee_details`, `employee_outing`, `roles`, `rooms`, `tankers`, `jobs`, `vaccination`, `vaccination_category`, `visitor_log`) VALUES
(1, '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `rights`) VALUES
(1, 'Super Admin', 1);

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

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`acc_id`, `id`, `room_no`, `room_capacity`, `status`, `current_room_occupancy`) VALUES
(1, 1, '102', 4, 'Occupied', 3),
(4, 3, '1123', 4, 'Occupied', 4);

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `emp_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`emp_id`, `acc_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tankers`
--

CREATE TABLE `tankers` (
  `id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `security_emp_id` int(11) NOT NULL,
  `quality_check` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tankers`
--

INSERT INTO `tankers` (`id`, `acc_id`, `security_emp_id`, `quality_check`, `qty`, `bill_no`, `vendor_id`, `timestamp`) VALUES
(4, 2, 2, 'Yes', 7000, 1244, 1, '2022-12-23 07:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `tanker_vendors`
--

CREATE TABLE `tanker_vendors` (
  `id` int(11) NOT NULL,
  `vname` varchar(20) DEFAULT NULL,
  `company_name` varchar(20) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanker_vendors`
--

INSERT INTO `tanker_vendors` (`id`, `vname`, `company_name`, `number`, `address`) VALUES
(1, 'Varad', 'Kelkar\'s', 221, 'Margao');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`id`, `emp_id`, `role`) VALUES
(1, 1, 'Electrician');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `vaccination_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_of_administration` date DEFAULT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_next_dose` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccination`
--

INSERT INTO `vaccination` (`vaccination_id`, `emp_id`, `category_id`, `date_of_administration`, `location`, `date_of_next_dose`) VALUES
(1, 2, 1, '2022-06-22', 'Panaji', '2022-10-20'),
(4, 3, 1, '2022-06-09', 'Margao', '2022-12-02'),
(5, 2, 1, '2022-02-10', 'Margao', '2022-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_category`
--

CREATE TABLE `vaccination_category` (
  `category_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccination_category`
--

INSERT INTO `vaccination_category` (`category_name`, `category_id`) VALUES
('Fully', 1),
('Nodose', 2),
('sec dose', 3),
('First dose', 4),
('test2', 7);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_log`
--

CREATE TABLE `visitor_log` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `security_emp_id` int(11) NOT NULL,
  `visitor_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check_out` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purpose` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_log`
--

INSERT INTO `visitor_log` (`id`, `emp_id`, `security_emp_id`, `visitor_name`, `vehicle_no`, `type`, `check_in`, `check_out`, `purpose`, `phone_no`) VALUES
(7, NULL, 2, 'Gaurav', 'GA08Q9964', 'Non-Employee', '2022-12-31 05:47:57', '0000-00-00 00:00:00', 'Meetup', 11223344);

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
  ADD KEY `emp_code` (`emp_code`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `complaint_type`
--
ALTER TABLE `complaint_type`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `emp_code` (`emp_code`),
  ADD KEY `role` (`role`),
  ADD KEY `designation` (`designation`),
  ADD KEY `fk_emp_acc_id` (`acc_id`);

--
-- Indexes for table `employee_designation`
--
ALTER TABLE `employee_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_outing`
--
ALTER TABLE `employee_outing`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `rights` (`rights`);

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
  ADD KEY `security_emp_id` (`security_emp_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `tanker_vendors`
--
ALTER TABLE `tanker_vendors`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complaint_type`
--
ALTER TABLE `complaint_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_designation`
--
ALTER TABLE `employee_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tankers`
--
ALTER TABLE `tankers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tanker_vendors`
--
ALTER TABLE `tanker_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `vaccination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vaccination_category`
--
ALTER TABLE `vaccination_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visitor_log`
--
ALTER TABLE `visitor_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`emp_code`) REFERENCES `employee` (`emp_code`),
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`type`) REFERENCES `complaint_type` (`id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`designation`) REFERENCES `employee_designation` (`id`),
  ADD CONSTRAINT `fk_emp_acc_id` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_outing`
--
ALTER TABLE `employee_outing`
  ADD CONSTRAINT `employee_outing_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD CONSTRAINT `login_credentials_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`rights`) REFERENCES `rights` (`id`);

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
  ADD CONSTRAINT `tankers_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`),
  ADD CONSTRAINT `tankers_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `tanker_vendors` (`id`);

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
