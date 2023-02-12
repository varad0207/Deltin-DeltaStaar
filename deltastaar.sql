-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 12, 2023 at 02:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
  `acc_code` varchar(10) NOT NULL,
  `acc_name` varchar(20) NOT NULL,
  `bldg_status` varchar(20) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `gender` enum('Male','Female','Unisex') NOT NULL,
  `tot_capacity` int(11) NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `occupied_rooms` int(11) DEFAULT NULL,
  `available_rooms` int(11) DEFAULT NULL,
  `warden_emp_code` varchar(10) DEFAULT NULL,
  `owner` varchar(20) NOT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`acc_id`, `acc_code`, `acc_name`, `bldg_status`, `location`, `gender`, `tot_capacity`, `no_of_rooms`, `occupied_rooms`, `available_rooms`, `warden_emp_code`, `owner`, `remark`) VALUES
(4, 'Acc1', 'Madhuban', 'Active', 1, 'Male', 113, 123, NULL, NULL, 'ABCD1234', 'Admin', 'done'),
(5, 'Acc2', 'Taj', 'Active', 2, 'Unisex', 4, 51, NULL, NULL, 'ABCD1234', 'ABG', 'NONE!'),
(6, 'AC_123', 'Perl Taj', 'Active', 2, 'Unisex', 500, 100, 0, 100, 'E2014059', 'DELTIN', NULL),
(7, 'AC_124', 'Blue Azul', 'Active', 1, 'Unisex', 500, 100, 0, 100, 'E2014051', 'DELTIN', NULL),
(8, 'AC_125', 'Black Perl Stay', 'Active', 1, 'Male', 500, 100, 0, 100, 'E2014011', 'DELTIN', NULL),
(9, 'AC_126', 'Diamond Villa', 'Active', 1, 'Male', 400, 100, 0, 100, 'E2014019', 'Rented', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `acc_locations`
--

CREATE TABLE `acc_locations` (
  `loc_id` int(11) NOT NULL,
  `location` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_locations`
--

INSERT INTO `acc_locations` (`loc_id`, `location`) VALUES
(1, 'Panaji'),
(2, 'Porvorim');

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `login_id` int(11) NOT NULL,
  `table_affected` varchar(255) NOT NULL,
  `changes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `raise_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` int(11) NOT NULL,
  `description` text NOT NULL,
  `tech_pending_timestamp` timestamp NULL DEFAULT NULL,
  `tech_closure_timestamp` timestamp NULL DEFAULT NULL,
  `sec_closure_timestamp` timestamp NULL DEFAULT NULL,
  `warden_closure_timestamp` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `emp_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `raise_timestamp`, `type`, `description`, `tech_pending_timestamp`, `tech_closure_timestamp`, `sec_closure_timestamp`, `warden_closure_timestamp`, `remarks`, `emp_code`) VALUES
(1, '2023-01-04 18:19:39', 1, 'light off', '2023-02-07 09:21:55', '2023-02-07 09:21:55', '2023-01-04 18:19:39', '2023-01-04 18:19:39', NULL, 'ABCD1234'),
(2, '2023-01-05 19:24:10', 2, 'sink overflow', '2023-02-07 20:32:43', '2023-02-12 09:32:09', NULL, NULL, NULL, 'ABCD1234');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `primary_contact` varchar(13) NOT NULL,
  `secondary_contact` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `emp_id`, `primary_contact`, `secondary_contact`) VALUES
(1, 2, '9527014907', '9423060461');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(10) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `mname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `designation` int(11) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `blood_group` varchar(4) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `aadhaar_number` int(11) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_code`, `fname`, `mname`, `lname`, `designation`, `dob`, `contact`, `address`, `state`, `country`, `pincode`, `email`, `department`, `blood_group`, `joining_date`, `aadhaar_number`, `salary`, `room_id`, `role`) VALUES
(2, 'ABCD1234', 'Chinmay', 'Umesh', 'Joshi', 3, '2002-07-05', '9527014907', 'Flat RT6, Fonseca Arcade co-op housing society,Ponda ', 'Goa', 'India', 403401, 'chinmayujoshi@gmail.com', 1, 'B+', '2022-07-15', 1234567890, 610000, 4, 1),
(3, 'ABCD1235', 'XYZ', 'U', 'PQR', 2, '2002-07-05', '+919527014907', 'Goa', 'Goa', 'India', 403401, 'chinmay@gmail.com', 3, 'B+', '2002-07-05', 1234567, 50000, 3, 8),
(12, 'E2014044', 'Rutvik', 'Prashant', 'Vaze', 8, '2002-01-24', '9834223476', 'Farmagudi by-pass,Dhavali Ponda Goa', 'Goa', 'India', 403401, '2014044@dbcegoa.ac.in', 2, 'A+ve', '2023-02-01', 213123411, 15000, NULL, NULL),
(13, 'E2014059', 'Vadiraj', 'Gururaj', 'Inamdar', 8, '2002-04-23', '9234223476', 'Dhavali Ponda Goa', 'Goa', 'India', 403401, '2014059@dbcegoa.ac.in', 2, 'A+ve', '2023-02-01', 213423411, 25000, NULL, NULL),
(14, 'E2014051', 'Shubham', 'K', 'Tendulkar', 8, '2002-01-29', '8844223476', ' Ponda Goa', 'Goa', 'India', 403401, '2014051@dbcegoa.ac.in', 2, 'A+ve', '2023-02-01', 613123411, 15000, NULL, NULL),
(15, 'E2014011', 'Gauravi', 'G', 'Kamat', 8, '2002-01-24', '8876451234', 'Margao Goa', 'Goa', 'India', 403401, '2014011@dbcegoa.ac.in', 2, 'A+ve', '2022-12-02', 1234567891, 15000, NULL, NULL),
(17, 'E2014019', 'Sarthak', 'Sanjay', 'Dhavalikar', 8, '2002-01-14', '8576451234', 'Ponda Goa', 'Goa', 'India', 403401, 'sarthak@dbcegoa.ac.in', 2, 'A+ve', '2022-12-02', 1236567891, 15000, NULL, NULL),
(18, 'E2214011', 'Pratham', 'Deepak', 'Dhavalikar', 8, '2002-01-23', '8476451234', 'Ponda Goa', 'Goa', 'India', 403401, 'Pratham@dbcegoa.ac.in', 2, 'A+ve', '2022-12-02', 1236967891, 15000, NULL, NULL),
(19, 'E1214011', 'Yatin', 'Deepak', 'Desai', 8, '2002-06-23', '9676451234', 'Ponda Goa', 'Goa', 'India', 403401, 'Yatin@dbcegoa.ac.in', 2, 'A+ve', '2022-12-02', 1236967991, 15000, NULL, NULL),
(20, 'E2104051', 'Shrinivas', 'G', 'Inamdar', 8, '2002-06-23', '9676361234', 'Ponda Goa', 'Goa', 'India', 403401, 'Shrinivas@dbcegoa.ac.in', 2, 'A+ve', '2022-12-02', 1286967991, 15000, NULL, NULL),
(21, 'E2104031', 'Shravani', 'S', 'Gaonkar', 2, '2002-06-23', '9676364334', 'Margao Goa', 'Goa', 'India', 403401, 'Shravani@dbcegoa.ac.in', 2, 'A+ve', '2022-12-02', 1886967991, 15000, NULL, NULL),
(22, 'E2104231', 'Navin', 'S', 'Morajkar', 3, '2002-06-23', '9676394634', 'Margao Goa', 'Goa', 'India', 403401, 'Navin_morj@dbcegoa.ac.in', 3, 'A+ve', '2022-12-02', 1886967591, 15000, NULL, NULL),
(23, 'E2158231', 'Pooja', 'Nagraj', 'Kamat', 7, '2002-06-23', '9666394634', 'Ponda Goa', 'Goa', 'India', 403401, 'Navin_morj@dbcegoa.ac.in', 6, 'A+ve', '2022-12-02', 1882967591, 15000, NULL, NULL),
(24, 'E3158231', 'Katrina', 'M', 'Kaif', 7, '1993-06-23', '9626394634', 'Mumbai Maharashtra', 'Maharash', 'India', 403401, 'Kat_kaif@gmail.com', 6, 'A+ve', '2022-12-02', 1234967591, 15000, NULL, NULL),
(26, 'E2758231', 'Karan', 'H', 'Johar', 4, '1993-06-23', '9226394634', 'Mumbai Maharashtra', 'Maharash', 'India', 403401, 'Karan@gmail.com', 3, 'A+ve', '2022-12-02', 1234567591, 15000, NULL, NULL),
(27, 'E2758221', 'Vickey', 'H', 'Kaushal', 4, '1993-06-23', '6226394634', 'Mumbai Maharashtra', 'Maharash', 'India', 403401, 'Vickey@gmail.com', 3, 'A+ve', '2022-12-02', 1234567561, 15000, NULL, NULL),
(29, 'E2758222', 'Askhay', 'H', 'Kumar', 4, '1993-06-23', '5226394634', 'Mumbai Maharashtra', 'Maharash', 'India', 403401, 'AK@gmail.com', 3, 'A+ve', '2022-12-02', 1324567561, 15000, NULL, NULL),
(30, 'E2758282', 'Amitabh', 'Harivansh', 'Bacchhan', 3, '1993-06-23', '5226394634', 'Mumbai Maharashtra', 'Maharash', 'India', 403401, 'AK@gmail.com', 6, 'A+ve', '2022-12-02', 1324546561, 15000, NULL, NULL),
(31, 'E2758285', 'Shah', 'Rukh', 'Khan', 2, '1993-06-23', '5266664634', 'Mumbai Maharashtra', 'Maharash', 'India', 403401, 'srk@gmail.com', 6, 'A+ve', '2022-12-02', 1325546561, 15000, NULL, NULL),
(32, 'E2658285', 'Kabir', 'Rajdeep', 'Singh', 5, '1993-06-23', '5266664634', 'Mumbai Maharashtra', 'Maharash', 'India', 403401, 'ks@gmail.com', 4, 'A+ve', '2022-12-02', 1876543261, 15000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_dept`
--

CREATE TABLE `employee_dept` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_dept`
--

INSERT INTO `employee_dept` (`dept_id`, `dept_name`) VALUES
(1, 'IT'),
(2, 'COMP'),
(3, 'HR'),
(4, 'Food & Beverage'),
(5, 'Human Resources'),
(6, 'Marketing'),
(7, 'Finance '),
(8, 'House keeping');

-- --------------------------------------------------------

--
-- Table structure for table `employee_designation`
--

CREATE TABLE `employee_designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_designation`
--

INSERT INTO `employee_designation` (`id`, `designation`) VALUES
(1, 'Manager'),
(2, 'Team Lead'),
(3, 'Admin'),
(4, 'Super-admin'),
(5, 'Junior-Engineer'),
(6, 'Senior-tester'),
(7, 'Junior-tester'),
(8, 'Intern'),
(9, 'Security'),
(10, 'Dealer'),
(11, 'Floor staff'),
(12, 'Shift manager');

-- --------------------------------------------------------

--
-- Table structure for table `employee_outing`
--

CREATE TABLE `employee_outing` (
  `emp_id` int(11) NOT NULL,
  `approval` enum('Yes','No') DEFAULT NULL,
  `outing_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `raise_timestamp` date NOT NULL,
  `description` text DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `warden_emp_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `complaint_id`, `technician_id`, `raise_timestamp`, `description`, `completion_date`, `remarks`, `warden_emp_code`) VALUES
(15, 1, 1, '2023-01-05', 'zcas', '2023-01-08', 'asda', 'ABCD1234'),
(16, 2, 1, '2023-02-07', 'check', '2023-02-13', 'Do it asap!', 'ABCD1234');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`emp_id`, `pass`) VALUES
(2, '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `emp_id` int(11) DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`emp_id`, `login_time`, `logout_time`, `id`) VALUES
(NULL, '2023-02-10 17:52:46', '2023-02-10 17:52:46', 1),
(2, '2023-02-10 17:53:29', '2023-02-10 17:53:29', 2),
(2, '2023-02-10 17:53:45', '2023-02-10 17:54:04', 3),
(2, '2023-02-10 18:04:16', '2023-02-10 18:04:16', 4),
(2, '2023-02-12 06:03:39', '2023-02-12 06:03:39', 5),
(2, '2023-02-12 06:41:29', '2023-02-12 06:41:29', 6),
(2, '2023-02-12 12:12:36', '2023-02-12 12:12:36', 7);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rights`
--

INSERT INTO `rights` (`id`, `accomodation`, `complaints`, `employee_details`, `employee_outing`, `roles`, `rooms`, `tankers`, `jobs`, `vaccination`, `vaccination_category`, `visitor_log`) VALUES
(1, '7', '7', '7', '7', '7', '7', '7', '7', '7', '7', '7'),
(7, '0', '1', '0', '1', '0', '1', '1', '1', '1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `rights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `rights`) VALUES
(1, 'Super Admin', 1),
(8, 'Test', 7);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `acc_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `current_room_occupancy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`acc_id`, `id`, `room_no`, `room_capacity`, `status`, `current_room_occupancy`) VALUES
(4, 3, '2', 4, 'Available', 4),
(4, 4, '3', 4, 'Available', 1),
(5, 5, '4', 4, 'Available', 2);

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
  `quality_check` enum('Yes','No') NOT NULL,
  `qty` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`id`, `emp_id`, `role`) VALUES
(1, 3, 'Electrician');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `vaccination_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date_of_administration` date DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `date_of_next_dose` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccination_category`
--

CREATE TABLE `vaccination_category` (
  `category_name` varchar(20) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccination_category`
--

INSERT INTO `vaccination_category` (`category_name`, `category_id`) VALUES
('First Dose', 1),
('Second dose', 2),
('Third dose', 3);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_log`
--

CREATE TABLE `visitor_log` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `security_emp_id` int(11) NOT NULL,
  `visitor_name` varchar(20) DEFAULT NULL,
  `vehicle_no` varchar(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `check_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check_out` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purpose` varchar(100) NOT NULL,
  `phone_no` varchar(11) NOT NULL
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
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `emp_code` (`emp_code`);

--
-- Indexes for table `complaint_type`
--
ALTER TABLE `complaint_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`);

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
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_ibfk_1` (`complaint_id`),
  ADD KEY `jobs_ibfk_2` (`technician_id`),
  ADD KEY `jobs_ibfk_3` (`warden_emp_code`);

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
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `acc_locations`
--
ALTER TABLE `acc_locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complaint_type`
--
ALTER TABLE `complaint_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employee_dept`
--
ALTER TABLE `employee_dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_designation`
--
ALTER TABLE `employee_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tankers`
--
ALTER TABLE `tankers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanker_vendors`
--
ALTER TABLE `tanker_vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `vaccination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vaccination_category`
--
ALTER TABLE `vaccination_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitor_log`
--
ALTER TABLE `visitor_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD CONSTRAINT `accomodation_ibfk_1` FOREIGN KEY (`warden_emp_code`) REFERENCES `employee` (`emp_code`),
  ADD CONSTRAINT `fk_acc_loc` FOREIGN KEY (`location`) REFERENCES `acc_locations` (`loc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`type`) REFERENCES `complaint_type` (`id`),
  ADD CONSTRAINT `complaints_ibfk_3` FOREIGN KEY (`emp_code`) REFERENCES `employee` (`emp_code`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_ibfk_4` FOREIGN KEY (`emp_code`) REFERENCES `employee` (`emp_code`) ON DELETE SET NULL;

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
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `fk_emp_dept` FOREIGN KEY (`department`) REFERENCES `employee_dept` (`dept_id`);

--
-- Constraints for table `employee_outing`
--
ALTER TABLE `employee_outing`
  ADD CONSTRAINT `employee_outing_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`complaint_id`) REFERENCES `complaints` (`id`),
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`technician_id`) REFERENCES `technician` (`id`),
  ADD CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`warden_emp_code`) REFERENCES `employee` (`emp_code`);

--
-- Constraints for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD CONSTRAINT `login_credentials_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE SET NULL;

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
-- Constraints for table `technician`
--
ALTER TABLE `technician`
  ADD CONSTRAINT `technician_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
