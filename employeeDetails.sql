-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2020 at 10:54 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeeDetails`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(11) NOT NULL,
  `employeeId` varchar(20) NOT NULL,
  `employeeName` varchar(100) NOT NULL,
  `employeeContact` varchar(15) NOT NULL,
  `employeeEmail` varchar(100) NOT NULL,
  `employeeDepartment` varchar(100) NOT NULL,
  `employeeDesignation` varchar(100) NOT NULL,
  `employeeAddress` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `createdOn` datetime NOT NULL,
  `updatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `employeeId`, `employeeName`, `employeeContact`, `employeeEmail`, `employeeDepartment`, `employeeDesignation`, `employeeAddress`, `gender`, `createdOn`, `updatedOn`) VALUES
(1, '101', 'Swapnil Gawande', '1234567890', 'sample1@gmail.com', 'Software', 'PHP Developer', 'Keshavnager Mundava, Pune', 'Male', '2019-06-28 00:00:00', '2020-01-08 15:23:52'),
(3, '102', 'Niraj Kumar', '9874563210', 'niraj@gmail.com', 'Software', 'Android Developer', 'Wakad, Pune', 'Female', '2019-06-28 00:00:00', '2020-01-08 15:23:58'),
(15, '105', 'Aditya Tijare', '9856985698', 'tijare@gmail.com', 'Software', 'iOS Developer', 'sadashiv peth', 'Male', '2019-07-01 04:32:53', '2020-01-08 15:23:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employeeId` (`employeeId`),
  ADD UNIQUE KEY `employeeContact` (`employeeContact`),
  ADD UNIQUE KEY `employeeEmail` (`employeeEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
