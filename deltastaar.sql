-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2023 at 12:43 PM
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
  `bldg_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` int(11) DEFAULT NULL,
  `gender` enum('Male','Female','Unisex') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tot_capacity` int(11) DEFAULT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `occupied_rooms` int(11) DEFAULT NULL,
  `available_rooms` int(11) DEFAULT NULL,
  `warden_emp_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`acc_id`, `acc_code`, `acc_name`, `bldg_status`, `location`, `gender`, `tot_capacity`, `no_of_rooms`, `occupied_rooms`, `available_rooms`, `warden_emp_code`, `owner`, `remark`) VALUES
(1, 'ACC01', 'Madhuban', 'Active', 1, 'Unisex', 16, 50, 15, 35, 'EMP02', 'Deltastaar', 'Accommodation for all staff\r\n'),
(2, 'ACC02', 'Kings', 'Active', 2, 'Male', 9, 30, 22, 8, 'EMP02', 'Deltastaar', 'Accommodation for male staff'),
(3, 'ACC03', 'Queens', 'Active', 4, 'Female', 9, 20, 15, 5, 'EMP02', 'Deltastaar', 'Accommodation for female staff'),
(4, 'ACC04', 'Rosa Maria', 'Active', 2, 'Male', 10, 35, 6, 29, 'EMP02', 'Deltastaar', 'Accommodation for male staff');

-- --------------------------------------------------------

--
-- Table structure for table `acc_locations`
--

CREATE TABLE `acc_locations` (
  `loc_id` int(11) NOT NULL,
  `location` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_locations`
--

INSERT INTO `acc_locations` (`loc_id`, `location`) VALUES
(1, 'Taleigao'),
(2, 'Panaji'),
(3, 'Porvorim'),
(4, 'Mapusa');

--
-- Triggers `acc_locations`
--
DELIMITER $$
CREATE TRIGGER `update_bldg_status` BEFORE DELETE ON `acc_locations` FOR EACH ROW BEGIN
      UPDATE accomodation 
      SET accomodation.bldg_status = "Closed" 
      WHERE location = old.loc_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `active_sessions`
--

CREATE TABLE `active_sessions` (
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_accomodation`
--

CREATE TABLE `change_tracking_accomodation` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_id` int(11) NOT NULL,
  `acc_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bldg_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` int(11) DEFAULT NULL,
  `gender` enum('Male','Female','Unisex') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tot_capacity` int(11) DEFAULT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `occupied_rooms` int(11) DEFAULT NULL,
  `available_rooms` int(11) DEFAULT NULL,
  `warden_emp_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_accomodation`
--

INSERT INTO `change_tracking_accomodation` (`id`, `user`, `timestamp`, `type`, `acc_id`, `acc_code`, `acc_name`, `bldg_status`, `location`, `gender`, `tot_capacity`, `no_of_rooms`, `occupied_rooms`, `available_rooms`, `warden_emp_code`, `owner`, `remark`) VALUES
(1, 'Varad Kelkar', '2023-07-22 10:18:17', 'Insert', 1, 'ACC01', 'Madhuban', 'Active', 1, 'Male', NULL, 50, NULL, NULL, 'EMP02', 'Deltastaar', 'Accommodation for all staff'),
(2, 'Varad Kelkar', '2023-07-22 10:18:55', 'Insert', 2, 'ACC02', 'Kings', 'Active', 2, 'Male', NULL, 30, NULL, NULL, 'EMP02', 'Deltastaar', 'Accommodation for male staff'),
(3, 'Varad Kelkar', '2023-07-22 10:19:29', 'Insert', 3, 'ACC03', 'Queens', 'Active', 4, 'Female', NULL, 20, NULL, NULL, 'EMP02', 'Deltastaar', 'Accommodation for female staff'),
(4, 'Varad Kelkar', '2023-07-22 10:19:46', 'Update', 1, 'ACC01', 'Madhuban', 'Active', 1, 'Male', NULL, 50, NULL, NULL, 'EMP02', 'Deltastaar', 'Accommodation for all staff'),
(5, 'Varad Kelkar', '2023-07-22 10:20:01', 'Update', 1, 'ACC01', 'Madhuban', 'Active', 1, 'Unisex', NULL, 50, NULL, NULL, 'EMP02', 'Deltastaar', ''),
(6, 'Varad Kelkar', '2023-07-22 10:20:52', 'Insert', 4, 'ACC04', 'Rosa Maria', 'Active', 2, 'Male', NULL, 35, NULL, NULL, 'EMP02', 'Deltastaar', 'Accommodation for male staff');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_acc_locations`
--

CREATE TABLE `change_tracking_acc_locations` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `loc_id` int(11) NOT NULL,
  `location` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `change_tracking_acc_locations`
--

INSERT INTO `change_tracking_acc_locations` (`id`, `user`, `type`, `timestamp`, `loc_id`, `location`) VALUES
(1, 'Varad Kelkar', 'Insert', '2023-07-22 10:14:31', 1, 'Taleigao'),
(2, 'Varad Kelkar', 'Insert', '2023-07-22 10:14:35', 2, 'Panaji'),
(3, 'Varad Kelkar', 'Insert', '2023-07-22 10:14:38', 3, 'Porvorim'),
(4, 'Varad Kelkar', 'Insert', '2023-07-22 10:14:42', 4, 'Mapusa');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_complaints`
--

CREATE TABLE `change_tracking_complaints` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complaint_id` int(11) NOT NULL,
  `raise_timestamp` timestamp NULL DEFAULT NULL,
  `complaint_type` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tech_pending_timestamp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tech_closure_timestamp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sec_closure_timestamp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warden_closure_timestamp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `acc_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_complaints`
--

INSERT INTO `change_tracking_complaints` (`id`, `user`, `timestamp`, `type`, `complaint_id`, `raise_timestamp`, `complaint_type`, `description`, `tech_pending_timestamp`, `tech_closure_timestamp`, `sec_closure_timestamp`, `warden_closure_timestamp`, `remarks`, `emp_code`, `acc_id`, `acc_code`) VALUES
(1, 'Varad Kelkar', '2023-07-22 10:40:34', 'Insert', 1, NULL, 1, 'Fan broken', NULL, NULL, NULL, NULL, NULL, 'EMP01', NULL, 'ACC01'),
(2, 'Varad Kelkar', '2023-07-22 10:40:51', 'Insert', 2, NULL, 1, 'AC not working', NULL, NULL, NULL, NULL, NULL, 'EMP01', NULL, 'ACC01'),
(3, 'Varad Kelkar', '2023-07-22 10:41:09', 'Insert', 3, NULL, 1, 'Fan broken', NULL, NULL, NULL, NULL, NULL, 'EMP01', NULL, 'ACC02'),
(4, 'Varad Kelkar', '2023-07-22 10:41:23', 'Insert', 4, NULL, 2, 'Pipe leaking', NULL, NULL, NULL, NULL, NULL, 'EMP01', NULL, 'ACC02'),
(5, 'Varad Kelkar', '2023-07-22 10:41:38', 'Insert', 5, NULL, 2, 'Pipe leaking', NULL, NULL, NULL, NULL, NULL, 'EMP01', NULL, 'ACC04');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_complaint_type`
--

CREATE TABLE `change_tracking_complaint_type` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `complaint_type` varchar(20) DEFAULT NULL,
  `type_description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `change_tracking_complaint_type`
--

INSERT INTO `change_tracking_complaint_type` (`id`, `user`, `timestamp`, `type`, `type_id`, `complaint_type`, `type_description`) VALUES
(1, 'Varad Kelkar', '2023-07-22 10:40:09', 'Insert', 1, 'Electrical', ''),
(2, 'Varad Kelkar', '2023-07-22 10:40:21', 'Insert', 2, 'Plumbing', '');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_employee`
--

CREATE TABLE `change_tracking_employee` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` int(11) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `blood_group` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `aadhaar_number` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `room_id` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_employee`
--

INSERT INTO `change_tracking_employee` (`id`, `user`, `timestamp`, `type`, `emp_id`, `emp_code`, `fname`, `mname`, `lname`, `designation`, `dob`, `contact`, `address`, `state`, `country`, `pincode`, `email`, `department`, `blood_group`, `joining_date`, `aadhaar_number`, `salary`, `room_id`, `role`) VALUES
(1, 'Varad Kelkar', '2023-07-22 10:17:39', 'Insert', 4, 'EMP02', 'Charlie', 'J', 'Harper', 2, '1998-02-02', '1234567890', 'Malibu', 'California', 'USA', 0, 'charlie@harper.in', 2, '', '1970-01-01', '', 0, '', NULL),
(2, 'Varad Kelkar', '2023-07-22 10:33:19', 'Insert', 5, 'EMP03', 'Ted', 'B', 'Mosby', 3, '2004-11-30', '1234567890', 'Manhattan', 'NYC', 'USA', 0, 'mosby@ted.in', 2, '', '1970-01-01', '', 0, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_employee_dept`
--

CREATE TABLE `change_tracking_employee_dept` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `change_tracking_employee_dept`
--

INSERT INTO `change_tracking_employee_dept` (`id`, `user`, `timestamp`, `type`, `dept_id`, `dept_name`) VALUES
(1, 'Varad Kelkar', '2023-07-22 10:12:46', 'Insert', 1, 'HR'),
(2, 'Varad Kelkar', '2023-07-22 10:12:51', 'Insert', 2, 'Operations'),
(3, 'Varad Kelkar', '2023-07-22 10:13:03', 'Insert', 3, 'Technical');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_employee_designation`
--

CREATE TABLE `change_tracking_employee_designation` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `desig_id` int(11) NOT NULL,
  `designation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_employee_outing`
--

CREATE TABLE `change_tracking_employee_outing` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outing_date` date NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `category` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outing_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_jobs`
--

CREATE TABLE `change_tracking_jobs` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jobs_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `raise_timestamp` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warden_emp_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_jobs`
--

INSERT INTO `change_tracking_jobs` (`id`, `user`, `timestamp`, `type`, `jobs_id`, `complaint_id`, `technician_id`, `raise_timestamp`, `description`, `completion_date`, `remarks`, `warden_emp_code`) VALUES
(1, 'Varad Kelkar', '2023-07-22 10:42:37', 'Insert', 1, 1, 1, '2023-07-22', 'Fan broken', '2023-07-27', '', 'EMP01'),
(2, 'Varad Kelkar', '2023-07-22 10:43:02', 'Insert', 2, 5, 2, '2023-07-22', 'Pipe leaking', '2023-08-02', '', 'EMP01');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_living_history`
--

CREATE TABLE `change_tracking_living_history` (
  `emp_code` varchar(10) NOT NULL,
  `history` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`history`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_rooms`
--

CREATE TABLE `change_tracking_rooms` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_room_occupancy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_rooms`
--

INSERT INTO `change_tracking_rooms` (`id`, `user`, `timestamp`, `type`, `acc_id`, `room_id`, `room_no`, `room_capacity`, `status`, `current_room_occupancy`) VALUES
(1, 'Varad Kelkar', '2023-07-22 10:21:11', 'Insert', 1, 1, '102', 4, NULL, NULL),
(2, 'Varad Kelkar', '2023-07-22 10:21:24', 'Insert', 1, 2, '104', 4, NULL, NULL),
(3, 'Varad Kelkar', '2023-07-22 10:21:33', 'Insert', 1, 3, '106', 4, NULL, NULL),
(4, 'Varad Kelkar', '2023-07-22 10:21:41', 'Insert', 1, 4, '108', 4, NULL, NULL),
(5, 'Varad Kelkar', '2023-07-22 10:21:55', 'Insert', 2, 5, '202', 3, NULL, NULL),
(6, 'Varad Kelkar', '2023-07-22 10:22:05', 'Insert', 2, 6, '204', 3, NULL, NULL),
(7, 'Varad Kelkar', '2023-07-22 10:22:14', 'Insert', 2, 7, '206', 3, NULL, NULL),
(8, 'Varad Kelkar', '2023-07-22 10:22:23', 'Insert', 4, 8, '1102', 5, NULL, NULL),
(9, 'Varad Kelkar', '2023-07-22 10:22:32', 'Insert', 4, 9, '1104', 5, NULL, NULL),
(10, 'Varad Kelkar', '2023-07-22 10:22:41', 'Insert', 3, 10, '302', 3, NULL, NULL),
(11, 'Varad Kelkar', '2023-07-22 10:22:50', 'Insert', 3, 11, '304', 3, NULL, NULL),
(12, 'Varad Kelkar', '2023-07-22 10:22:59', 'Insert', 3, 12, '306', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_tankers`
--

CREATE TABLE `change_tracking_tankers` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanker_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `security_emp_id` int(11) NOT NULL,
  `quality_check` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `bill_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `tanker_timestamp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_tankers`
--

INSERT INTO `change_tracking_tankers` (`id`, `user`, `timestamp`, `type`, `tanker_id`, `acc_id`, `security_emp_id`, `quality_check`, `qty`, `bill_no`, `amount`, `vendor_id`, `tanker_timestamp`) VALUES
(1, 'Varad Kelkar', '2023-07-22 10:36:46', 'Insert', 1, 1, 5, 'Yes', 2500, 'AB-1234', 15000, 1, '2023-07-22 16:06:46'),
(2, 'Varad Kelkar', '2023-07-22 10:37:23', 'Insert', 2, 2, 5, 'Yes', 5000, 'AB-0912', 25000, 2, '2023-07-22 16:07:23'),
(3, 'Varad Kelkar', '2023-07-22 10:38:16', 'Insert', 3, 1, 5, 'Yes', 7000, 'AB-1235', 15000, 3, '2023-07-22 16:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_vaccination`
--

CREATE TABLE `change_tracking_vaccination` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccination_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `date_of_administration` date DEFAULT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_next_dose` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_visitor_log`
--

CREATE TABLE `change_tracking_visitor_log` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `security_emp_id` int(11) NOT NULL,
  `acc_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_no` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visit_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check_out` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purpose` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `raise_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tech_pending_timestamp` timestamp NULL DEFAULT NULL,
  `tech_closure_timestamp` timestamp NULL DEFAULT NULL,
  `sec_closure_timestamp` timestamp NULL DEFAULT NULL,
  `warden_closure_timestamp` timestamp NULL DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `acc_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `raise_timestamp`, `type`, `description`, `tech_pending_timestamp`, `tech_closure_timestamp`, `sec_closure_timestamp`, `warden_closure_timestamp`, `remarks`, `emp_code`, `acc_id`, `acc_code`) VALUES
(1, '2023-07-22 10:40:34', 1, 'Fan broken', NULL, '2023-07-22 10:42:39', '2023-07-22 10:42:41', NULL, NULL, 'EMP01', 1, 'ACC01'),
(2, '2023-07-22 10:40:51', 1, 'AC not working', NULL, NULL, NULL, NULL, NULL, 'EMP01', 1, 'ACC01'),
(3, '2023-07-22 10:41:09', 1, 'Fan broken', NULL, NULL, NULL, NULL, NULL, 'EMP01', 2, 'ACC02'),
(4, '2023-07-22 10:41:23', 2, 'Pipe leaking', NULL, NULL, NULL, NULL, NULL, 'EMP01', 2, 'ACC02'),
(5, '2023-07-22 10:41:38', 2, 'Pipe leaking', NULL, '2023-07-22 10:43:04', '2023-07-22 10:43:06', NULL, NULL, 'EMP01', 4, 'ACC04');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `type_id` int(11) NOT NULL,
  `complaint_type` varchar(20) DEFAULT NULL,
  `type_description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`type_id`, `complaint_type`, `type_description`) VALUES
(1, 'Electrical', ''),
(2, 'Plumbing', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` int(11) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `blood_group` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `aadhaar_number` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_code`, `fname`, `mname`, `lname`, `designation`, `dob`, `contact`, `address`, `state`, `country`, `pincode`, `email`, `department`, `blood_group`, `joining_date`, `aadhaar_number`, `salary`, `room_id`, `role`) VALUES
(1, 'EMP01', 'Varad', 'M', 'Kelkar', 1, '2002-07-02', '8806607659', 'Fatorda', 'Goa', 'India', 403602, NULL, 3, NULL, NULL, NULL, NULL, NULL, 1),
(4, 'EMP02', 'Charlie', 'J', 'Harper', 2, '1998-02-02', '1234567890', 'Malibu', 'California', 'USA', 0, 'charlie@harper.in', 2, '', '1970-01-01', '', 0, NULL, NULL),
(5, 'EMP03', 'Ted', 'B', 'Mosby', 3, '2004-11-30', '1234567890', 'Manhattan', 'NYC', 'USA', 0, 'mosby@ted.in', 2, '', '1970-01-01', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_dept`
--

CREATE TABLE `employee_dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_dept`
--

INSERT INTO `employee_dept` (`dept_id`, `dept_name`) VALUES
(1, 'HR'),
(2, 'Operations'),
(3, 'Technical');

-- --------------------------------------------------------

--
-- Table structure for table `employee_designation`
--

CREATE TABLE `employee_designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_designation`
--

INSERT INTO `employee_designation` (`id`, `designation`) VALUES
(1, 'Super-Admin'),
(2, 'Warden'),
(3, 'Security');

-- --------------------------------------------------------

--
-- Table structure for table `employee_outing`
--

CREATE TABLE `employee_outing` (
  `emp_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approval` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outing_date` date NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `category` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `technician_id` int(11) DEFAULT NULL,
  `raise_timestamp` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tentative_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warden_emp_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `complaint_id`, `technician_id`, `raise_timestamp`, `description`, `tentative_date`, `completion_date`, `remarks`, `warden_emp_code`) VALUES
(1, 1, 1, '2023-07-22', 'Fan broken', '2023-07-29', '2023-07-27', '', 'EMP01'),
(2, 5, 2, '2023-07-22', 'Pipe leaking', '2023-08-01', '2023-08-02', '', 'EMP01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `last_dose`
-- (See below for the actual view)
--
CREATE TABLE `last_dose` (
`vaccination_id` int(11)
,`emp_id` int(11)
,`category_id` int(11)
,`date_of_administration` date
,`location` varchar(50)
,`date_of_next_dose` date
);

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `emp_id` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL DEFAULT '5f4dcc3b5aa765d61d8327deb882cf99'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`emp_id`, `pass`) VALUES
(1, '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `emp_id` int(11) DEFAULT NULL,
  `user` text DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`emp_id`, `user`, `login_time`, `logout_time`, `id`) VALUES
(1, 'Varad Kelkar', '2023-07-22 10:11:39', '2023-07-22 10:39:14', 1),
(1, 'Varad Kelkar', '2023-07-22 10:39:47', '2023-07-22 10:39:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `outing_type`
--

CREATE TABLE `outing_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE `rights` (
  `id` int(11) NOT NULL,
  `accomodation` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0',
  `complaints` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0',
  `employee_details` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0',
  `employee_outing` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0',
  `roles` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0',
  `rooms` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0',
  `tankers` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0',
  `jobs` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0',
  `vaccination` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0',
  `vaccination_category` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0',
  `visitor_log` enum('0','1','2','3','5','6','4','7') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`id`, `accomodation`, `complaints`, `employee_details`, `employee_outing`, `roles`, `rooms`, `tankers`, `jobs`, `vaccination`, `vaccination_category`, `visitor_log`) VALUES
(1, '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7'),
(2, '1', '1', '1', '7', '0', '1', '7', '3', '1', '0', '6'),
(3, '7', '1', '1', '1', '0', '7', '1', '3', '1', '0', '1');

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
(1, 'Super Admin', 1),
(2, 'Security', 2),
(3, 'Warden', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `acc_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `room_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_room_occupancy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`acc_id`, `id`, `room_no`, `room_capacity`, `status`, `current_room_occupancy`) VALUES
(1, 1, '102', 4, NULL, 4),
(1, 2, '104', 4, NULL, 4),
(1, 3, '106', 4, NULL, 2),
(1, 4, '108', 4, NULL, 4),
(2, 5, '202', 3, NULL, 1),
(2, 6, '204', 3, NULL, NULL),
(2, 7, '206', 3, NULL, 3),
(4, 8, '1102', 5, NULL, 5),
(4, 9, '1104', 5, NULL, 2),
(3, 10, '302', 3, NULL, 3),
(3, 11, '304', 3, NULL, 3),
(3, 12, '306', 3, NULL, 3);

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
(5, 1),
(5, 2),
(5, 3),
(5, 4);

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
  `bill_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tankers`
--

INSERT INTO `tankers` (`id`, `acc_id`, `security_emp_id`, `quality_check`, `qty`, `bill_no`, `amount`, `vendor_id`, `timestamp`) VALUES
(1, 1, 5, 'Yes', 2500, 'AB-1234', 15000, 1, '2023-07-22 10:36:46'),
(2, 2, 5, 'Yes', 5000, 'AB-0912', 25000, 2, '2023-01-22 10:37:23'),
(3, 1, 5, 'Yes', 7000, 'AB-1235', 15000, 3, '2023-05-22 10:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `tanker_vendors`
--

CREATE TABLE `tanker_vendors` (
  `id` int(11) NOT NULL,
  `vname` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `number` varchar(13) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `time_stamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanker_vendors`
--

INSERT INTO `tanker_vendors` (`id`, `vname`, `company_name`, `number`, `address`, `price`, `time_stamp`) VALUES
(1, 'Vendor1', 'Company1', '1234567890', 'Ponda', 15000, '2023-07-22 10:31:22'),
(2, 'Vendor2', 'Company2', '1234567890', 'Marmogoa', 25000, '2023-07-22 10:31:43'),
(3, 'Vendor3', 'Company3', '1234567890', 'Sanguem', 20000, '2023-07-22 10:32:09');

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
(1, 4, 'Plumber'),
(2, 4, 'Electrician');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `vaccination_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `date_of_administration` date DEFAULT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `acc_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_no` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_in` timestamp NULL DEFAULT current_timestamp(),
  `check_out` timestamp NULL DEFAULT NULL,
  `purpose` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `last_dose`
--
DROP TABLE IF EXISTS `last_dose`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `last_dose`  AS   (select `v1`.`vaccination_id` AS `vaccination_id`,`v1`.`emp_id` AS `emp_id`,`v1`.`category_id` AS `category_id`,`v1`.`date_of_administration` AS `date_of_administration`,`v1`.`location` AS `location`,`v1`.`date_of_next_dose` AS `date_of_next_dose` from (`vaccination` `v1` left join `vaccination` `v2` on(`v1`.`emp_id` = `v2`.`emp_id` and `v1`.`date_of_administration` < `v2`.`date_of_administration`)) where `v2`.`emp_id` is null)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `acc_code` (`acc_code`),
  ADD KEY `accomodation_ibfk_1` (`warden_emp_code`),
  ADD KEY `fk_acc_loc` (`location`);

--
-- Indexes for table `acc_locations`
--
ALTER TABLE `acc_locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `active_sessions`
--
ALTER TABLE `active_sessions`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `change_tracking_accomodation`
--
ALTER TABLE `change_tracking_accomodation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`user`);

--
-- Indexes for table `change_tracking_acc_locations`
--
ALTER TABLE `change_tracking_acc_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`user`);

--
-- Indexes for table `change_tracking_complaints`
--
ALTER TABLE `change_tracking_complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`user`);

--
-- Indexes for table `change_tracking_complaint_type`
--
ALTER TABLE `change_tracking_complaint_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`user`);

--
-- Indexes for table `change_tracking_employee`
--
ALTER TABLE `change_tracking_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_tracking_employee_dept`
--
ALTER TABLE `change_tracking_employee_dept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_tracking_employee_designation`
--
ALTER TABLE `change_tracking_employee_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_tracking_employee_outing`
--
ALTER TABLE `change_tracking_employee_outing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_tracking_jobs`
--
ALTER TABLE `change_tracking_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_tracking_living_history`
--
ALTER TABLE `change_tracking_living_history`
  ADD PRIMARY KEY (`emp_code`);

--
-- Indexes for table `change_tracking_rooms`
--
ALTER TABLE `change_tracking_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_tracking_tankers`
--
ALTER TABLE `change_tracking_tankers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_tracking_vaccination`
--
ALTER TABLE `change_tracking_vaccination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_tracking_visitor_log`
--
ALTER TABLE `change_tracking_visitor_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `emp_code` (`emp_code`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `complaint_type`
--
ALTER TABLE `complaint_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_code` (`emp_code`),
  ADD KEY `role` (`role`),
  ADD KEY `designation` (`designation`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `fk_emp_dept` (`department`);

--
-- Indexes for table `employee_dept`
--
ALTER TABLE `employee_dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee_designation`
--
ALTER TABLE `employee_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_outing`
--
ALTER TABLE `employee_outing`
  ADD KEY `emp_id` (`emp_code`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_ibfk_1` (`complaint_id`),
  ADD KEY `technician_id` (`technician_id`),
  ADD KEY `warden_emp_code` (`warden_emp_code`);

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
-- Indexes for table `outing_type`
--
ALTER TABLE `outing_type`
  ADD PRIMARY KEY (`type_id`);

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
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `emp_id` (`emp_id`);

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
  ADD KEY `security_emp_id` (`security_emp_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `acc_locations`
--
ALTER TABLE `acc_locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `change_tracking_accomodation`
--
ALTER TABLE `change_tracking_accomodation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `change_tracking_acc_locations`
--
ALTER TABLE `change_tracking_acc_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `change_tracking_complaints`
--
ALTER TABLE `change_tracking_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `change_tracking_complaint_type`
--
ALTER TABLE `change_tracking_complaint_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `change_tracking_employee`
--
ALTER TABLE `change_tracking_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `change_tracking_employee_dept`
--
ALTER TABLE `change_tracking_employee_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `change_tracking_employee_designation`
--
ALTER TABLE `change_tracking_employee_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `change_tracking_employee_outing`
--
ALTER TABLE `change_tracking_employee_outing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `change_tracking_jobs`
--
ALTER TABLE `change_tracking_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `change_tracking_rooms`
--
ALTER TABLE `change_tracking_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `change_tracking_tankers`
--
ALTER TABLE `change_tracking_tankers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `change_tracking_vaccination`
--
ALTER TABLE `change_tracking_vaccination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `change_tracking_visitor_log`
--
ALTER TABLE `change_tracking_visitor_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaint_type`
--
ALTER TABLE `complaint_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_dept`
--
ALTER TABLE `employee_dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_designation`
--
ALTER TABLE `employee_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `outing_type`
--
ALTER TABLE `outing_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tankers`
--
ALTER TABLE `tankers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tanker_vendors`
--
ALTER TABLE `tanker_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`designation`) REFERENCES `employee_designation` (`id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`role`) REFERENCES `roles` (`role_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_emp_dept` FOREIGN KEY (`department`) REFERENCES `employee_dept` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
