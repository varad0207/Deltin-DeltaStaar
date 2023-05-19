-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 12:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
  `tot_capacity` int(11) DEFAULT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `occupied_rooms` int(11) DEFAULT NULL,
  `available_rooms` int(11) DEFAULT NULL,
  `warden_emp_code` varchar(10) DEFAULT NULL,
  `owner` varchar(30) NOT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`acc_id`, `acc_code`, `acc_name`, `bldg_status`, `location`, `gender`, `tot_capacity`, `no_of_rooms`, `occupied_rooms`, `available_rooms`, `warden_emp_code`, `owner`, `remark`) VALUES
(1, 'ACM01', 'KINGS', 'Active', 1, 'Male', 9, 3, NULL, NULL, 'EMP005', 'SELF', ''),
(2, 'ACC090', 'Madhuban', 'Active', 2, 'Unisex', 10, 20, NULL, NULL, 'EMP61', 'Deltin', 'Accommodation for all staff');

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
(1, 'MIRAMAR'),
(2, 'TALEIGAO'),
(3, 'PORVORIM'),
(4, 'CAMPAL');

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
-- Table structure for table `change_tracking_accomodation`
--

CREATE TABLE `change_tracking_accomodation` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `acc_id` int(11) NOT NULL,
  `acc_code` varchar(10) NOT NULL,
  `acc_name` varchar(20) NOT NULL,
  `bldg_status` varchar(20) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `gender` enum('Male','Female','Unisex') NOT NULL,
  `tot_capacity` int(11) DEFAULT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `occupied_rooms` int(11) DEFAULT NULL,
  `available_rooms` int(11) DEFAULT NULL,
  `warden_emp_code` varchar(10) DEFAULT NULL,
  `owner` varchar(20) NOT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_accomodation`
--

INSERT INTO `change_tracking_accomodation` (`id`, `user`, `timestamp`, `type`, `acc_id`, `acc_code`, `acc_name`, `bldg_status`, `location`, `gender`, `tot_capacity`, `no_of_rooms`, `occupied_rooms`, `available_rooms`, `warden_emp_code`, `owner`, `remark`) VALUES
(1, 'VADIRAJ INAMDAR', '2023-05-19 07:31:17', 'Insert', 1, 'ACM01', 'KINGS', 'Active', 1, 'Male', NULL, 100, NULL, NULL, 'EMP005', 'SELF', 'N.A'),
(2, 'VADIRAJ INAMDAR', '2023-05-19 07:34:12', 'Update', 1, 'ACM01', 'KINGS', 'Active', 1, 'Male', NULL, 100, NULL, NULL, 'EMP005', 'SELF', 'N.A'),
(3, 'VADIRAJ INAMDAR', '2023-05-19 08:39:02', 'Insert', 2, 'ACC090', 'Madhuban', 'Active', 2, 'Unisex', NULL, 20, NULL, NULL, 'EMP61', 'Deltin', 'Accommodation for all staff');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `change_tracking_acc_locations`
--

INSERT INTO `change_tracking_acc_locations` (`id`, `user`, `type`, `timestamp`, `loc_id`, `location`) VALUES
(1, 'VADIRAJ INAMDAR', 'Insert', '2023-05-19 06:54:45', 1, 'MIRAMAR'),
(2, 'VADIRAJ INAMDAR', 'Insert', '2023-05-19 06:54:55', 2, 'TALEIGAO'),
(3, 'VADIRAJ INAMDAR', 'Insert', '2023-05-19 06:55:02', 3, 'PORVORIM'),
(4, 'VADIRAJ INAMDAR', 'Insert', '2023-05-19 06:55:25', 4, 'CAMPAL');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_complaints`
--

CREATE TABLE `change_tracking_complaints` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `complaint_id` int(11) NOT NULL,
  `raise_timestamp` timestamp NULL DEFAULT NULL,
  `complaint_type` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tech_pending_timestamp` varchar(255) DEFAULT NULL,
  `tech_closure_timestamp` varchar(255) DEFAULT NULL,
  `sec_closure_timestamp` varchar(255) DEFAULT NULL,
  `warden_closure_timestamp` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `emp_code` varchar(10) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `acc_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `change_tracking_complaint_type`
--

INSERT INTO `change_tracking_complaint_type` (`id`, `user`, `timestamp`, `type`, `type_id`, `complaint_type`, `type_description`) VALUES
(1, 'VADIRAJ INAMDAR', '2023-05-19 08:22:37', 'Insert', 1, 'Electrical issues', 'Any sort of electrical issues'),
(2, 'VADIRAJ INAMDAR', '2023-05-19 08:22:58', 'Insert', 2, 'PLumbing issues', 'Any sort of plumbing issues');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_employee`
--

CREATE TABLE `change_tracking_employee` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
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
  `room_id` tinytext DEFAULT NULL,
  `role` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_employee`
--

INSERT INTO `change_tracking_employee` (`id`, `user`, `timestamp`, `type`, `emp_id`, `emp_code`, `fname`, `mname`, `lname`, `designation`, `dob`, `contact`, `address`, `state`, `country`, `pincode`, `email`, `department`, `blood_group`, `joining_date`, `aadhaar_number`, `salary`, `room_id`, `role`) VALUES
(1, 'VADIRAJ INAMDAR', '2023-05-19 07:02:20', 'Insert', 2, 'EMP001', 'IVAN', 'ALEX', 'AZIM', 3, '2002-03-14', '9822603275', 'BLUE LAGOON, MARGAO GOA', 'GOA', 'INDIA', 403401, 'ixivan@gmail.com', 3, 'A+', '2023-05-13', 2147483647, 15000, '', NULL),
(2, 'VADIRAJ INAMDAR', '2023-05-19 07:02:49', 'Insert', 4, 'EMP002', 'IVAN', 'ALEX', 'AZIM', 3, '2002-03-14', '9822603275', 'BLUE LAGOON, MARGAO GOA', 'GOA', 'INDIA', 403401, 'ixivan@gmail.com', 3, 'A+', '2023-05-13', 2147483647, 15000, '', NULL),
(3, 'VADIRAJ INAMDAR', '2023-05-19 07:03:01', 'Delete', 2, 'EMP001', 'IVAN', 'ALEX', 'AZIM', 3, '2002-03-14', '9822603275', 'BLUE LAGOON, MARGAO GOA', 'GOA', 'INDIA', 403401, 'ixivan@gmail.com', 3, 'A+', '0000-00-00', 2147483647, 15000, '', ''),
(4, 'VADIRAJ INAMDAR', '2023-05-19 07:05:56', 'Insert', 5, 'EMP003', 'SHUBHAM', 'RAM', 'TENDULKAR', 2, '2002-07-13', '7845985612', 'SANGUEM, GOA', 'GOA', 'INDIA', 403401, 'shubham@gmail.com', 4, 'B-', '2023-05-17', 2147483647, 5600, '', NULL),
(5, 'VADIRAJ INAMDAR', '2023-05-19 07:08:18', 'Insert', 6, 'EMP004', 'VARAD', 'VIJAY', 'KELKAR', 5, '1999-02-17', '5698784512', 'MARGAO GOA', 'GOA', 'INDIA', 576985, 'varad@gmail.com', 5, 'AB+', '2023-05-27', 2147483647, 25001, '', NULL),
(6, 'VADIRAJ INAMDAR', '2023-05-19 07:16:38', 'Update', 5, 'EMP003', 'SHUBHAM', 'RAM', 'TENDULKAR', 2, '2002-07-13', '7845985612', 'SANGUEM, GOA', 'GOA', 'INDIA', 403401, 'shubham@gmail.com', 4, 'B-', '2023-05-17', 2147483647, 5600, 'nullif(,)', ''),
(7, 'VADIRAJ INAMDAR', '2023-05-19 07:19:12', 'Update', 6, 'EMP004', 'VARAD', 'VIJAY', 'KELKAR', 5, '1999-02-17', '5698784512', 'MARGAO GOA', 'GOA', 'INDIA', 576985, 'varad@gmail.com', 5, 'AB+', '2023-05-27', 2147483647, 25001, 'nullif(,)', ''),
(8, 'VADIRAJ INAMDAR', '2023-05-19 07:27:31', 'Insert', 7, 'EMP005', 'SHREYA', 'RAM', 'JOSHI', 10, '2006-03-15', '6541789236', 'PONDA GOA ', 'GOA', 'INDIA', 508235, 'shreya@gmail.com', 9, 'B+', '2023-05-18', 2147483647, 55000, '', NULL),
(9, 'VADIRAJ INAMDAR', '2023-05-19 08:37:48', 'Insert', 8, 'EMP61', 'Charlie', 'H', 'Harper', 10, '2000-02-18', '1234567890', 'Malibu', 'California', 'USA', 0, 'charlie@harper.in', 7, 'O+', '1970-01-01', 0, 0, '', NULL),
(10, 'VADIRAJ INAMDAR', '2023-05-19 08:40:24', 'Update', 1, 'EMP01', 'VADIRAJ', 'GURURAJ', 'INAMDAR', 1, '2002-04-23', '7083491368', 'Dhavali, Ponda Goa 403401', 'Goa', 'India', 403401, 'vadirajinamdar6@gmail.com', 1, '', '2023-05-01', 2147483647, 30000, 'nullif(4,)', '1'),
(11, 'VADIRAJ INAMDAR', '2023-05-19 08:41:32', 'Update', 5, 'EMP003', 'SHUBHAM', 'RAM', 'TENDULKAR', 7, '2002-07-13', '7845985612', 'SANGUEM, GOA', 'GOA', 'INDIA', 403401, 'shubham@gmail.com', 7, 'B-', '2023-05-17', 2147483647, 5600, 'nullif(4,)', '2'),
(12, 'VADIRAJ INAMDAR', '2023-05-19 08:42:32', 'Update', 5, 'EMP003', 'SHUBHAM', 'RAM', 'TENDULKAR', 7, '2002-07-13', '7845985612', 'SANGUEM, GOA', 'GOA', 'INDIA', 403401, 'shubham@gmail.com', 7, 'B-', '2023-05-17', 2147483647, 5600, 'nullif(2,)', '2');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `change_tracking_employee_dept`
--

INSERT INTO `change_tracking_employee_dept` (`id`, `user`, `timestamp`, `type`, `dept_id`, `dept_name`) VALUES
(1, 'VADIRAJ INAMDAR', '2023-05-19 06:50:26', 'Insert', 2, 'Gaming - (DR)'),
(2, 'VADIRAJ INAMDAR', '2023-05-19 06:50:50', 'Insert', 3, 'CASINO GAMINIG'),
(3, 'VADIRAJ INAMDAR', '2023-05-19 06:51:08', 'Insert', 4, 'F&B SERVICE'),
(4, 'VADIRAJ INAMDAR', '2023-05-19 06:51:22', 'Insert', 5, 'FRONT SERVICE'),
(5, 'VADIRAJ INAMDAR', '2023-05-19 06:51:42', 'Insert', 6, 'VIP SERVICES'),
(6, 'VADIRAJ INAMDAR', '2023-05-19 07:10:03', 'Insert', 7, 'SECURITY'),
(7, 'VADIRAJ INAMDAR', '2023-05-19 07:10:19', 'Insert', 8, 'TECHNICIAN'),
(8, 'VADIRAJ INAMDAR', '2023-05-19 07:11:08', 'Insert', 9, 'MANAGEMENT');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `change_tracking_employee_designation`
--

INSERT INTO `change_tracking_employee_designation` (`id`, `user`, `timestamp`, `type`, `desig_id`, `designation`) VALUES
(1, 'VADIRAJ INAMDAR', '2023-05-19 06:52:32', 'Insert', 2, 'TRAINEE DEALER'),
(2, 'VADIRAJ INAMDAR', '2023-05-19 06:52:50', 'Insert', 3, 'TRAINEE'),
(3, 'VADIRAJ INAMDAR', '2023-05-19 06:52:58', 'Insert', 4, 'DEALER'),
(4, 'VADIRAJ INAMDAR', '2023-05-19 06:53:12', 'Insert', 5, 'SENIOR DEALER'),
(5, 'VADIRAJ INAMDAR', '2023-05-19 06:53:31', 'Insert', 6, 'VIP ASSOCIATE'),
(6, 'VADIRAJ INAMDAR', '2023-05-19 07:14:14', 'Insert', 7, 'SECURITY'),
(7, 'VADIRAJ INAMDAR', '2023-05-19 07:14:46', 'Insert', 8, 'TECHNICIAN'),
(8, 'VADIRAJ INAMDAR', '2023-05-19 07:17:53', 'Insert', 9, 'PLUMBER'),
(9, 'VADIRAJ INAMDAR', '2023-05-19 07:23:00', 'Insert', 10, 'WARDEN');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_employee_outing`
--

CREATE TABLE `change_tracking_employee_outing` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `emp_code` varchar(10) DEFAULT NULL,
  `approval` varchar(4) DEFAULT NULL,
  `outing_date` date NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `category` varchar(225) NOT NULL,
  `outing_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_jobs`
--

CREATE TABLE `change_tracking_jobs` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `jobs_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `raise_timestamp` date NOT NULL,
  `description` text DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `warden_emp_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_jobs`
--

INSERT INTO `change_tracking_jobs` (`id`, `user`, `timestamp`, `type`, `jobs_id`, `complaint_id`, `technician_id`, `raise_timestamp`, `description`, `completion_date`, `remarks`, `warden_emp_code`) VALUES
(1, 'SHREYA JOSHI', '2023-05-19 08:28:18', 'Insert', 1, 1, 1, '2023-05-19', 'electric work', '2023-05-30', 'done', 'EMP005');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_rooms`
--

CREATE TABLE `change_tracking_rooms` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `acc_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `current_room_occupancy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_rooms`
--

INSERT INTO `change_tracking_rooms` (`id`, `user`, `timestamp`, `type`, `acc_id`, `room_id`, `room_no`, `room_capacity`, `status`, `current_room_occupancy`) VALUES
(1, 'VADIRAJ INAMDAR', '2023-05-19 07:34:46', 'Insert', 0, 0, '101', 3, NULL, NULL),
(2, 'VADIRAJ INAMDAR', '2023-05-19 07:34:55', 'Insert', 0, 0, '102', 3, NULL, NULL),
(3, 'VADIRAJ INAMDAR', '2023-05-19 07:35:17', 'Insert', 0, 0, '103', 3, NULL, NULL),
(4, 'VADIRAJ INAMDAR', '2023-05-19 08:39:54', 'Insert', 0, 0, '120', 5, NULL, NULL),
(5, 'VADIRAJ INAMDAR', '2023-05-19 08:40:05', 'Insert', 0, 0, '122', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_tankers`
--

CREATE TABLE `change_tracking_tankers` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `tanker_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `security_emp_id` int(11) NOT NULL,
  `quality_check` enum('Yes','No') NOT NULL,
  `qty` int(11) NOT NULL,
  `bill_no` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `tanker_timestamp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `change_tracking_tankers`
--

INSERT INTO `change_tracking_tankers` (`id`, `user`, `timestamp`, `type`, `tanker_id`, `acc_id`, `security_emp_id`, `quality_check`, `qty`, `bill_no`, `amount`, `vendor_id`, `tanker_timestamp`) VALUES
(1, 'SHUBHAM TENDULKAR', '2023-05-19 08:44:12', 'Insert', 1, 2, 5, 'Yes', 4000, 'AB-1234', 10000, 2, '2023-05-19 10:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_vaccination`
--

CREATE TABLE `change_tracking_vaccination` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `vaccination_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(10) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `date_of_administration` date DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `date_of_next_dose` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `change_tracking_visitor_log`
--

CREATE TABLE `change_tracking_visitor_log` (
  `id` int(11) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` enum('Delete','Update','Insert') DEFAULT NULL,
  `log_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `security_emp_id` int(11) NOT NULL,
  `acc_code` varchar(10) NOT NULL,
  `visitor_name` varchar(20) DEFAULT NULL,
  `vehicle_no` varchar(11) DEFAULT NULL,
  `visit_type` varchar(20) DEFAULT NULL,
  `check_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check_out` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `purpose` varchar(100) NOT NULL,
  `phone_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `raise_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `tech_pending_timestamp` timestamp NULL DEFAULT NULL,
  `tech_closure_timestamp` timestamp NULL DEFAULT NULL,
  `sec_closure_timestamp` timestamp NULL DEFAULT NULL,
  `warden_closure_timestamp` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `emp_code` varchar(10) DEFAULT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `acc_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `raise_timestamp`, `type`, `description`, `tech_pending_timestamp`, `tech_closure_timestamp`, `sec_closure_timestamp`, `warden_closure_timestamp`, `remarks`, `emp_code`, `acc_id`, `acc_code`) VALUES
(1, '2023-05-19 08:24:20', 1, 'Light not working ', '2023-05-19 08:29:10', '2023-05-19 08:29:12', NULL, '2023-05-19 08:30:13', NULL, 'EMP01', 1, 'ACM01');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `type_id` int(11) NOT NULL,
  `complaint_type` varchar(20) DEFAULT NULL,
  `type_description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`type_id`, `complaint_type`, `type_description`) VALUES
(1, 'Electrical issues', 'Any sort of electrical issues'),
(2, 'PLumbing issues', 'Any sort of plumbing issues');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `designation` int(11) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `blood_group` varchar(4) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `aadhaar_number` varchar(16) DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_code`, `fname`, `mname`, `lname`, `designation`, `dob`, `contact`, `address`, `state`, `country`, `pincode`, `email`, `department`, `blood_group`, `joining_date`, `aadhaar_number`, `salary`, `room_id`, `role`) VALUES
(1, 'EMP01', 'VADIRAJ', 'GURURAJ', 'INAMDAR', 1, '2002-04-23', '7083491368', 'Dhavali, Ponda Goa 403401', 'Goa', 'India', 403401, 'vadirajinamdar6@gmail.com', 1, '', '2023-05-01', '455868758849', 30000, 4, 1),
(4, 'EMP002', 'IVAN', 'ALEX', 'AZIM', 3, '2002-03-14', '9822603275', 'BLUE LAGOON, MARGAO GOA', 'GOA', 'INDIA', 403401, 'ixivan@gmail.com', 3, 'A+', '2023-05-13', '785645219963', 15000, NULL, NULL),
(5, 'EMP003', 'SHUBHAM', 'RAM', 'TENDULKAR', 7, '2002-07-13', '7845985612', 'SANGUEM, GOA', 'GOA', 'INDIA', 403401, 'shubham@gmail.com', 7, 'B-', '2023-05-17', '8745965256', 5600, 2, 2),
(6, 'EMP004', 'VARAD', 'VIJAY', 'KELKAR', 9, '1999-02-17', '5698784512', 'MARGAO GOA', 'GOA', 'INDIA', 576985, 'varad@gmail.com', 8, 'AB+', '2023-05-27', '123456784569', 25001, NULL, 3),
(7, 'EMP005', 'SHREYA', 'RAM', 'JOSHI', 10, '2006-03-15', '6541789236', 'PONDA GOA ', 'GOA', 'INDIA', 508235, 'shreya@gmail.com', 9, 'B+', '2023-05-18', '658912347854', 55000, NULL, 4),
(8, 'EMP61', 'Charlie', 'H', 'Harper', 10, '2000-02-18', '1234567890', 'Malibu', 'California', 'USA', 0, 'charlie@harper.in', 7, 'O+', '1970-01-01', '', 0, NULL, NULL);

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
(1, 'ADMIN'),
(2, 'Gaming - (DR)'),
(3, 'CASINO GAMINIG'),
(4, 'F&B SERVICE'),
(5, 'FRONT SERVICE'),
(6, 'VIP SERVICES'),
(7, 'SECURITY'),
(8, 'TECHNICIAN'),
(9, 'MANAGEMENT');

-- --------------------------------------------------------

--
-- Table structure for table `employee_designation`
--

CREATE TABLE `employee_designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_designation`
--

INSERT INTO `employee_designation` (`id`, `designation`) VALUES
(1, 'SUPER-ADMIN'),
(2, 'TRAINEE DEALER'),
(3, 'TRAINEE'),
(4, 'DEALER'),
(5, 'SENIOR DEALER'),
(6, 'VIP ASSOCIATE'),
(7, 'SECURITY'),
(8, 'TECHNICIAN'),
(9, 'PLUMBER'),
(10, 'WARDEN');

-- --------------------------------------------------------

--
-- Table structure for table `employee_outing`
--

CREATE TABLE `employee_outing` (
  `emp_code` varchar(10) DEFAULT NULL,
  `approval` enum('Yes','No') DEFAULT NULL,
  `outing_date` date NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `category` varchar(225) NOT NULL,
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
  `description` text DEFAULT NULL,
  `tentative_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `warden_emp_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `complaint_id`, `technician_id`, `raise_timestamp`, `description`, `tentative_date`, `completion_date`, `remarks`, `warden_emp_code`) VALUES
(1, 1, 1, '2023-05-19', 'electric work', '2023-05-31', '2023-05-30', 'done', 'EMP005');

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
(1, '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, '5f4dcc3b5aa765d61d8327deb882cf99');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`emp_id`, `user`, `login_time`, `logout_time`, `id`) VALUES
(1, 'VADIRAJ INAMDAR', '2023-05-19 06:44:00', '2023-05-19 06:44:00', 1),
(6, 'VARAD KELKAR', '2023-05-19 07:48:19', '2023-05-19 07:48:19', 2),
(5, 'SHUBHAM TENDULKAR', '2023-05-19 07:48:42', '2023-05-19 07:48:42', 3),
(7, 'SHREYA JOSHI', '2023-05-19 07:49:01', '2023-05-19 07:49:01', 4),
(7, 'SHREYA JOSHI', '2023-05-19 07:57:12', '2023-05-19 08:20:51', 5),
(7, 'SHREYA JOSHI', '2023-05-19 08:04:17', '2023-05-19 08:04:44', 6),
(5, 'SHUBHAM TENDULKAR', '2023-05-19 08:05:01', '2023-05-19 08:25:39', 7),
(5, 'SHUBHAM TENDULKAR', '2023-05-19 08:11:53', '2023-05-19 08:11:53', 8),
(5, 'SHUBHAM TENDULKAR', '2023-05-19 08:13:20', '2023-05-19 08:13:20', 9),
(5, 'SHUBHAM TENDULKAR', '2023-05-19 08:13:45', '2023-05-19 08:20:01', 10),
(1, 'VADIRAJ INAMDAR', '2023-05-19 08:22:02', '2023-05-19 08:28:33', 11),
(7, 'SHREYA JOSHI', '2023-05-19 08:25:56', '2023-05-19 08:32:39', 12),
(6, 'VARAD KELKAR', '2023-05-19 08:28:42', '2023-05-19 08:29:48', 13),
(1, 'VADIRAJ INAMDAR', '2023-05-19 08:29:55', '2023-05-19 08:30:37', 14),
(1, 'VADIRAJ INAMDAR', '2023-05-19 08:32:51', '2023-05-19 08:42:58', 15),
(6, 'VARAD KELKAR', '2023-05-19 08:34:39', '2023-05-19 09:01:54', 16),
(5, 'SHUBHAM TENDULKAR', '2023-05-19 08:43:09', '2023-05-19 08:46:14', 17),
(1, 'VADIRAJ INAMDAR', '2023-05-19 08:46:22', '2023-05-19 08:46:22', 18),
(1, 'VADIRAJ INAMDAR', '2023-05-19 08:57:26', '2023-05-19 08:57:26', 19),
(1, 'VADIRAJ INAMDAR', '2023-05-19 09:02:01', '2023-05-19 09:02:01', 20),
(1, 'VADIRAJ INAMDAR', '2023-05-19 10:21:15', '2023-05-19 10:21:15', 21);

-- --------------------------------------------------------

--
-- Table structure for table `outing_type`
--

CREATE TABLE `outing_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(2, '1', '1', '1', '7', '0', '1', '7', '3', '1', '0', '7'),
(3, '1', '1', '1', '0', '0', '1', '0', '3', '0', '0', '0'),
(4, '3', '3', '1', '3', '0', '3', '1', '3', '3', '0', '1');

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
(1, 'SUPER ADMIN', 1),
(2, 'SECURITY', 2),
(3, 'TECHNICIAN', 3),
(4, 'WARDEN', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `acc_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `current_room_occupancy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`acc_id`, `id`, `room_no`, `room_capacity`, `status`, `current_room_occupancy`) VALUES
(1, 1, '101', 3, NULL, NULL),
(1, 2, '102', 3, NULL, 1),
(1, 3, '103', 3, NULL, NULL),
(2, 4, '120', 5, NULL, 1),
(2, 5, '122', 5, NULL, NULL);

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
(5, 1);

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
  `bill_no` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tankers`
--

INSERT INTO `tankers` (`id`, `acc_id`, `security_emp_id`, `quality_check`, `qty`, `bill_no`, `amount`, `vendor_id`, `timestamp`) VALUES
(1, 2, 5, 'Yes', 4000, 'AB-1234', 10000, 2, '2023-05-19 05:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `tanker_vendors`
--

CREATE TABLE `tanker_vendors` (
  `id` int(11) NOT NULL,
  `vname` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `number` varchar(13) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanker_vendors`
--

INSERT INTO `tanker_vendors` (`id`, `vname`, `company_name`, `number`, `address`) VALUES
(1, 'PRATHAM SHAH', 'MAHALAXMI SERVICES', '7894561235', 'PANAJI'),
(2, 'SK DRINKS', 'BODHAMI BEWRAGES', '4567891532', 'PORVORIM');

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
(1, 6, 'Plumber');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `vaccination_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_code` varchar(10) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `visitor_log`
--

CREATE TABLE `visitor_log` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `security_emp_id` int(11) NOT NULL,
  `acc_code` varchar(10) NOT NULL,
  `visitor_name` varchar(20) DEFAULT NULL,
  `vehicle_no` varchar(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `check_in` timestamp NULL DEFAULT current_timestamp(),
  `check_out` timestamp NULL DEFAULT NULL,
  `purpose` varchar(100) NOT NULL,
  `phone_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_log`
--

INSERT INTO `visitor_log` (`id`, `emp_id`, `security_emp_id`, `acc_code`, `visitor_name`, `vehicle_no`, `type`, `check_in`, `check_out`, `purpose`, `phone_no`) VALUES
(1, NULL, 5, '1', 'Jason', 'ga08y8144', 'non-employee', '2023-05-19 08:32:22', '2023-05-19 08:33:15', 'Sponsorship', '1234567890');

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
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `acc_locations`
--
ALTER TABLE `acc_locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `change_tracking_accomodation`
--
ALTER TABLE `change_tracking_accomodation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `change_tracking_acc_locations`
--
ALTER TABLE `change_tracking_acc_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `change_tracking_complaints`
--
ALTER TABLE `change_tracking_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `change_tracking_complaint_type`
--
ALTER TABLE `change_tracking_complaint_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `change_tracking_employee`
--
ALTER TABLE `change_tracking_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `change_tracking_employee_dept`
--
ALTER TABLE `change_tracking_employee_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `change_tracking_employee_designation`
--
ALTER TABLE `change_tracking_employee_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `change_tracking_employee_outing`
--
ALTER TABLE `change_tracking_employee_outing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `change_tracking_jobs`
--
ALTER TABLE `change_tracking_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `change_tracking_rooms`
--
ALTER TABLE `change_tracking_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `change_tracking_tankers`
--
ALTER TABLE `change_tracking_tankers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint_type`
--
ALTER TABLE `complaint_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_dept`
--
ALTER TABLE `employee_dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_designation`
--
ALTER TABLE `employee_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `outing_type`
--
ALTER TABLE `outing_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rights`
--
ALTER TABLE `rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tankers`
--
ALTER TABLE `tankers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
