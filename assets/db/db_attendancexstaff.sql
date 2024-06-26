-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 07:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_attendancexstaff`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `bill_id` int(100) NOT NULL,
  `sss` varchar(100) DEFAULT NULL,
  `pagibig` varchar(100) DEFAULT NULL,
  `phil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_id`, `sss`, `pagibig`, `phil`) VALUES
(1, NULL, NULL, NULL),
(7, '365', '2464', '82634'),
(8, 'ads23', 'dsa23', 'gf34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_account`
--

CREATE TABLE `tbl_employee_account` (
  `account_id` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `login_role` int(100) NOT NULL,
  `employee_info_id` int(100) NOT NULL,
  `job_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee_account`
--

INSERT INTO `tbl_employee_account` (`account_id`, `username`, `password`, `login_role`, `employee_info_id`, `job_id`) VALUES
(1, 'admin@gmail.com', 'admin', 1, 1, 1),
(7, 'clarq@gmail.com', 'clarq', 1, 7, 7),
(8, 'juliana@gmail.com', 'juliana', 2, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_info`
--

CREATE TABLE `tbl_employee_info` (
  `employee_info_id` int(100) NOT NULL,
  `spouse_id` int(100) NOT NULL,
  `bill_id` int(100) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `age` int(100) DEFAULT NULL,
  `marital_status` varchar(100) DEFAULT NULL,
  `id_profile` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_num` bigint(20) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `elem` varchar(100) DEFAULT NULL,
  `jhs` varchar(100) DEFAULT NULL,
  `shs` varchar(100) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee_info`
--

INSERT INTO `tbl_employee_info` (`employee_info_id`, `spouse_id`, `bill_id`, `firstname`, `middlename`, `lastname`, `birthdate`, `gender`, `age`, `marital_status`, `id_profile`, `email`, `phone_num`, `province`, `zip`, `elem`, `jhs`, `shs`, `college`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, 7, 'clarq anderson', 'pangan', 'arias', '2003-08-08', 'male', 20, 'in_a_relationship', NULL, 'clarq@gmail.com', 9123456789, 'Pampanga', '01243', 'mandasig', 'hcc', 'hcc', 'hcc'),
(8, 8, 8, 'juliana', 'paguinto', 'arla', '2003-04-24', 'female', 20, 'single', NULL, 'juliana@gmail.com', 38090918309, 'Pampanga', '89423', 'sad', 'ssdg', 'ewf', 'awdww');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employement`
--

CREATE TABLE `tbl_employement` (
  `job_id` int(100) NOT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `employement_num` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `employee_status` varchar(100) DEFAULT NULL,
  `job_value` int(100) DEFAULT NULL,
  `dep_value` int(100) DEFAULT NULL,
  `stat_value` int(100) DEFAULT NULL,
  `salary` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employement`
--

INSERT INTO `tbl_employement` (`job_id`, `job_title`, `employement_num`, `department`, `hire_date`, `employee_status`, `job_value`, `dep_value`, `stat_value`, `salary`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Chief Executive', '243369', 'Quality department', '2024-04-19', 'Full-Time Employees', 0, 0, 0, 30000),
(8, 'Chief Operating Officer', '2313', 'Production', '2024-04-19', 'Full-Time Employees', NULL, NULL, NULL, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spouse`
--

CREATE TABLE `tbl_spouse` (
  `spouse_id` int(100) NOT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  `number` bigint(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `brgy` varchar(100) DEFAULT NULL,
  `municipality` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_spouse`
--

INSERT INTO `tbl_spouse` (`spouse_id`, `spouse_name`, `relationship`, `number`, `email`, `brgy`, `municipality`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'sun and moon', 'master', 9123456788, 'sunandmoon@gmail.com', 'galaxy', 'milky way'),
(8, 'dsd', 'dsasda', 23142421235, 'juliana@gmail.com', 'fddffd', 'daadas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee_account`
--
ALTER TABLE `tbl_employee_account`
  ADD PRIMARY KEY (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee_account`
--
ALTER TABLE `tbl_employee_account`
  MODIFY `account_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
