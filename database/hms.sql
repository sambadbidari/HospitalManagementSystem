-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2018 at 03:12 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evis_hmss`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

CREATE TABLE `accesses` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `access_id` int(1) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesses`
--

INSERT INTO `accesses` (`id`, `email`, `password`, `access_id`, `type`, `description`) VALUES
(5, 'admin@mail.com', 'admin', 1, 'admin', NULL),
(6, 'doctor@mail.com', 'doctor', 2, 'doctor', NULL),
(7, 'nurse@mail.com', 'nurse', 3, 'nurse', NULL),
(8, 'pharmacist@mail.com', 'pharmacist', 4, 'pharmacist', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(20) NOT NULL,
  `ward_id` int(20) NOT NULL,
  `bed_id` int(20) NOT NULL,
  `patient_name` varchar(20) NOT NULL,
  `patient_address` varchar(20) NOT NULL,
  `patient_phone` varchar(20) NOT NULL,
  `patient_nid` int(20) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `access_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_status` tinyint(1) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_status`, `type`) VALUES
(1, 'Admin', 'admin@mail.com', 'admin', 1, 1),
(7, 'Neha Shrestha', 'neha@mail.com', 'neha', 1, 4),
(8, 'Dr. Amit Amatya', 'amit@mail.com', 'amit', 1, 2),
(9, 'Akshyata Baskota', 'akshyata@mail.com', 'akshyata', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bed`
--

CREATE TABLE `tbl_bed` (
  `bed_id` int(2) NOT NULL,
  `bed_name` varchar(10) NOT NULL,
  `bed_fee` float NOT NULL DEFAULT '0',
  `bed_total_sit` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bed`
--

INSERT INTO `tbl_bed` (`bed_id`, `bed_name`, `bed_fee`, `bed_total_sit`) VALUES
(5, 'ICU', 5000, 10),
(6, 'General', 2500, 30),
(7, 'Children', 1500, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(2) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`) VALUES
(1, 'Ophthalmology'),
(2, ' Surgery'),
(3, 'Orthopaediatrics'),
(4, 'Anaesthesia'),
(5, 'Cardiovascular'),
(6, 'Neurology');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `doctor_id` int(6) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `department_id` int(2) NOT NULL,
  `doctor_address` text NOT NULL,
  `doctor_phone` varchar(11) NOT NULL,
  `doctor_email` varchar(50) NOT NULL,
  `doctor_visiting_hour` varchar(50) NOT NULL,
  `doctor_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `doctor_name`, `department_id`, `doctor_address`, `doctor_phone`, `doctor_email`, `doctor_visiting_hour`, `doctor_status`) VALUES
(3, 'Dr. Amit Amatya', 2, 'Kathmandu, Nepal', '9843650811', 'amit@mail.com', '9 AM - 5 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `store` int(11) NOT NULL DEFAULT '0',
  `sold` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id`, `name`, `store`, `sold`, `price`) VALUES
(5, 'Asprin 150 mg Tab', 1880, 20, 30),
(6, 'Acetaminophen 325mg+ Tramadol Hydrochloride 37.5 mg Tab', 5400, 0, 80),
(7, 'Aceclofenac 100 mg Tab', 1700, 0, 65),
(8, 'Chlorzoxazone 500mg+ Diclofenac 50mg + Paracetamol 325mg Tab', 4470, 30, 125);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine_history`
--

CREATE TABLE `tbl_medicine_history` (
  `history_id` int(11) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `medicines` varchar(255) NOT NULL,
  `total_cost` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medicine_history`
--

INSERT INTO `tbl_medicine_history` (`history_id`, `patient_id`, `medicines`, `total_cost`, `date`) VALUES
(4, 1, '\"Ecap\", \"Toska\"', 15, '2016-12-17 12:33:14'),
(6, 2, '\"Allertrol\"', 77, '2016-12-17 12:33:14'),
(7, 1, '\"Ecap\", \"Allertrol\"', 25, '2016-12-17 14:37:34'),
(8, 5, '\"Allertrol\", \"Ecap\"', 12, '2016-12-20 19:42:54'),
(9, 6, '\"Asprin 150 mg Tab\"', 600, '2018-07-08 19:41:10'),
(10, 6, '', 0, '2018-07-09 07:09:16'),
(11, 7, '', 0, '2018-07-09 07:38:32'),
(12, 7, '\"Chlorzoxazone 500mg+ Diclofenac 50mg + Paracetamol 325mg Tab\"', 3750, '2018-07-09 07:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(6) NOT NULL,
  `ward_id` int(2) NOT NULL,
  `bed_id` int(2) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_address` text NOT NULL,
  `patient_phone` varchar(20) NOT NULL,
  `patient_nid` varchar(50) NOT NULL,
  `admission_date` date NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `ward_id`, `bed_id`, `doc_id`, `patient_name`, `patient_address`, `patient_phone`, `patient_nid`, `admission_date`, `release_date`) VALUES
(6, 5, 6, 3, 'Sandesh Sharma', 'Hetauda, Nepal', '9861258961', '123', '2018-07-02', '2018-07-09'),
(7, 9, 5, 3, 'Bibhushan Baral', 'Lalitpur, Nepal', '9876543210', '124', '2018-07-03', '2018-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_test`
--

CREATE TABLE `tbl_patient_test` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacist`
--

CREATE TABLE `tbl_pharmacist` (
  `pharmacist_id` int(11) NOT NULL,
  `pharmacist_name` varchar(50) NOT NULL,
  `pharmacist_address` varchar(50) NOT NULL,
  `pharmacist_phone` varchar(50) NOT NULL,
  `pharmacist_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pharmacist`
--

INSERT INTO `tbl_pharmacist` (`pharmacist_id`, `pharmacist_name`, `pharmacist_address`, `pharmacist_phone`, `pharmacist_email`) VALUES
(3, 'Akshyata Baskota', 'Kathmandu, Nepal', '9841052368', 'akshyata@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription`
--

CREATE TABLE `tbl_prescription` (
  `prescription_id` int(10) NOT NULL,
  `doctor_id` int(6) NOT NULL,
  `patient_id` int(6) NOT NULL,
  `prescription` text NOT NULL,
  `prescription_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prescription`
--

INSERT INTO `tbl_prescription` (`prescription_id`, `doctor_id`, `patient_id`, `prescription`, `prescription_time`) VALUES
(2, 1, 2, 'hello world', '2016-12-20 02:56:13'),
(3, 3, 6, 'Aspirin for 10days', '2018-07-08 19:38:46'),
(4, 3, 7, 'Take Paracetamol for 15 days', '2018-07-09 07:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `report_id` int(10) NOT NULL,
  `test_id` int(2) NOT NULL,
  `patient_id` int(6) NOT NULL,
  `report_description` text NOT NULL,
  `report_result` text NOT NULL,
  `report_published_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`report_id`, `test_id`, `patient_id`, `report_description`, `report_result`, `report_published_date`) VALUES
(7, 5, 6, 'Low Sodium', 'Negative', '2018-07-05'),
(8, 8, 7, 'Lack of hormone', 'Negative', '2018-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `test_id` int(2) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`test_id`, `test_name`, `cost`) VALUES
(5, 'Urine Test', 1500),
(6, 'Blood Test', 700),
(7, 'Sugar Test', 1100),
(8, 'Thyroid Test', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ward`
--

CREATE TABLE `tbl_ward` (
  `ward_id` int(2) NOT NULL,
  `ward_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ward`
--

INSERT INTO `tbl_ward` (`ward_id`, `ward_name`) VALUES
(5, 'Dental'),
(6, 'Ortho'),
(7, 'Emergency'),
(8, 'Gynae'),
(9, 'ICU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_bed`
--
ALTER TABLE `tbl_bed`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_medicine_history`
--
ALTER TABLE `tbl_medicine_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_patient_test`
--
ALTER TABLE `tbl_patient_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pharmacist`
--
ALTER TABLE `tbl_pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `tbl_ward`
--
ALTER TABLE `tbl_ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_bed`
--
ALTER TABLE `tbl_bed`
  MODIFY `bed_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctor_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_medicine_history`
--
ALTER TABLE `tbl_medicine_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_patient_test`
--
ALTER TABLE `tbl_patient_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pharmacist`
--
ALTER TABLE `tbl_pharmacist`
  MODIFY `pharmacist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  MODIFY `prescription_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `test_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_ward`
--
ALTER TABLE `tbl_ward`
  MODIFY `ward_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
