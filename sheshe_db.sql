-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2021 at 08:59 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sheshe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants_details`
--

CREATE TABLE `applicants_details` (
  `applicant_id` int(100) NOT NULL,
  `applicant_full_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `nida_id` int(20) NOT NULL,
  `applicant_address` varchar(255) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `phone_no` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants_details`
--

INSERT INTO `applicants_details` (`applicant_id`, `applicant_full_name`, `gender`, `date_of_birth`, `nida_id`, `applicant_address`, `marital_status`, `occupation`, `phone_no`) VALUES
(1, 'Henry Kihanga', 'Male', '1987-11-12', 1234567890, '123 Mwenge, Kinondoni,Dar es salaam', 'Single', 'Farmer', 123456789),
(2, 'Hussein Minihaji Sheshe', 'Male', '1987-12-23', 1234567890, '123 Mwenge', 'Single', 'It Consultant', 123456789),
(3, 'Hussein Sheshe', 'Female', '2021-06-12', 1234567890, 'Mwanza', 'Married', 'It Consultant', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(4) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(12) NOT NULL,
  `typ` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `full_name`, `email`, `username`, `pwd`, `typ`) VALUES
(1, 'kihanga', 'kihanga@gmail.com', 'kihanga', 'kihanga', 'user'),
(2, 'Hussein Minihaji Sheshe', 'hosanitha@gmail.com', 'iamsheshe', 'iamsheshe', 'user'),
(3, 'admin', 'admin@gmail.com', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Ewi`
--

CREATE TABLE `Ewi` (
  `id` int(4) NOT NULL,
  `applicant_id` int(4) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `amount_per_installment` int(20) NOT NULL,
  `installment_week` text NOT NULL,
  `date_to_return` text DEFAULT NULL,
  `payment_issued_at` int(11) DEFAULT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ewi`
--

INSERT INTO `Ewi` (`id`, `applicant_id`, `loan_id`, `amount_per_installment`, `installment_week`, `date_to_return`, `payment_issued_at`, `payment_status`) VALUES
(1, 1, 1, 27500, 'Week 1', NULL, NULL, 0),
(2, 1, 1, 27500, 'Week 2', NULL, NULL, 0),
(3, 1, 1, 27500, 'Week 3', NULL, NULL, 0),
(4, 1, 1, 27500, 'Week 4', NULL, NULL, 0),
(5, 1, 1, 27500, 'Week 5', NULL, NULL, 0),
(6, 1, 1, 27500, 'Week 6', NULL, NULL, 0),
(7, 1, 1, 27500, 'Week 7', NULL, NULL, 0),
(8, 1, 1, 27500, 'Week 8', NULL, NULL, 0),
(9, 1, 1, 27500, 'Week 9', NULL, NULL, 0),
(10, 1, 1, 27500, 'Week 10', NULL, NULL, 0),
(11, 1, 1, 27500, 'Week 11', NULL, NULL, 0),
(12, 1, 1, 27500, 'Week 12', NULL, NULL, 0),
(13, 1, 1, 27500, 'Week 13', NULL, NULL, 0),
(14, 1, 1, 27500, 'Week 14', NULL, NULL, 0),
(15, 1, 1, 27500, 'Week 15', NULL, NULL, 0),
(16, 1, 1, 27500, 'Week 16', NULL, NULL, 0),
(17, 1, 1, 27500, 'Week 17', NULL, NULL, 0),
(18, 1, 1, 27500, 'Week 18', NULL, NULL, 0),
(19, 1, 1, 27500, 'Week 19', NULL, NULL, 0),
(20, 1, 1, 27500, 'Week 20', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `guarantor_details`
--

CREATE TABLE `guarantor_details` (
  `guarantor_id` int(4) NOT NULL,
  `app_id` int(4) NOT NULL,
  `guarantor_full_name` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `guarantor_address` varchar(100) NOT NULL,
  `relashionship` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guarantor_details`
--

INSERT INTO `guarantor_details` (`guarantor_id`, `app_id`, `guarantor_full_name`, `gender`, `occupation`, `phone_no`, `guarantor_address`, `relashionship`) VALUES
(1, 1, 'William Kiluma', 'Male', 'Developer', '2134567', '125 Uhuru St, Kinondoni,Dar es salaam', 'Friend'),
(2, 2, 'Maduhu Antony', 'Male', 'Muhuni', '2134567', '125 Uhuru St, Kinondoni,Dar es salaam', 'Brother'),
(3, 2, 'Minihaji Sheshe', 'Female', 'Portfolio Manager', '2134567', '125 Uhuru St, Kinondoni,Dar es salaam', 'Father');

-- --------------------------------------------------------

--
-- Table structure for table `loan_details`
--

CREATE TABLE `loan_details` (
  `Id` int(4) NOT NULL,
  `app_id` int(4) NOT NULL,
  `guarantor_id` int(4) NOT NULL,
  `loan_amount` int(20) NOT NULL,
  `loan_tenure` int(10) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `loan_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_details`
--

INSERT INTO `loan_details` (`Id`, `app_id`, `guarantor_id`, `loan_amount`, `loan_tenure`, `issue_date`, `loan_status`) VALUES
(1, 1, 1, 500000, 20, '2021-07-02', 1),
(2, 2, 2, 500000, 25, '2021-06-25', 1),
(3, 2, 3, 340000, 20, '2021-06-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `receive_payments`
--

CREATE TABLE `receive_payments` (
  `Receipt_no` int(30) NOT NULL,
  `C_Id` int(4) NOT NULL,
  `No_of_payments` int(10) NOT NULL,
  `Receipt_date` varchar(20) NOT NULL,
  `Amount_paid` int(20) NOT NULL,
  `Remaining_a` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants_details`
--
ALTER TABLE `applicants_details`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Ewi`
--
ALTER TABLE `Ewi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `C_Id` (`applicant_id`);

--
-- Indexes for table `guarantor_details`
--
ALTER TABLE `guarantor_details`
  ADD PRIMARY KEY (`guarantor_id`),
  ADD KEY `App_Id` (`app_id`);

--
-- Indexes for table `loan_details`
--
ALTER TABLE `loan_details`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `App_Id` (`app_id`),
  ADD KEY `guarantor_id` (`guarantor_id`);

--
-- Indexes for table `receive_payments`
--
ALTER TABLE `receive_payments`
  ADD KEY `C_Id` (`C_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants_details`
--
ALTER TABLE `applicants_details`
  MODIFY `applicant_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Ewi`
--
ALTER TABLE `Ewi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `guarantor_details`
--
ALTER TABLE `guarantor_details`
  MODIFY `guarantor_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loan_details`
--
ALTER TABLE `loan_details`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
