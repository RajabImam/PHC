-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2017 at 05:59 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phc`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `cardno` varchar(32) NOT NULL,
  `dateofappointment` date NOT NULL,
  `regdate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `cardno`, `dateofappointment`, `regdate`) VALUES
(2, 'PHC003', '2017-10-25', '2017-10-21 13:50:07'),
(5, 'PHC004', '2017-10-28', '2017-10-22 16:18:02'),
(8, 'PHC003', '2017-10-21', '2017-10-22 17:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `gender` varchar(32) NOT NULL,
  `age` varchar(32) NOT NULL,
  `bloodgroup` varchar(32) NOT NULL,
  `status` text NOT NULL,
  `cardno` varchar(32) NOT NULL,
  `nextofkin` varchar(255) NOT NULL,
  `nextofkincontact` varchar(32) NOT NULL,
  `image` text NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `surname`, `lastname`, `address`, `phone`, `gender`, `age`, `bloodgroup`, `status`, `cardno`, `nextofkin`, `nextofkincontact`, `image`, `regdate`) VALUES
(2, 'Jiya', 'Grace', 'Doko Niger State', '07060679578', 'female', '29', 'B+', 'sick am only trying to see the update will work well.', 'PHC001', 'Daniel kolo', '08076543212', 'sdn-png.png', '2017-10-22'),
(3, 'Mohammed', 'Fatima', 'Kaduna', '08034563214', 'female', '25', 'O', 'Fiver', 'PHC002', 'Awwal Mohammed', '08076543245', 'computer.jpg', '2017-10-14'),
(4, 'Usman', 'Aisha', 'Minna', '070324126', 'female', '26', 'B+', 'Cold and Headche', 'PHC003', 'Usman Sarki', '08138908765', 'cs.jpg', '2017-10-14'),
(5, 'Odeh', 'Ann', 'Garki Area 1', '08034217865', 'female', '34', 'O', 'Headache', 'PHC004', 'Odeh Sam', '07065786543', 'niqab.jpg', '2017-10-16'),
(6, 'Tanko', 'Maryam', 'Kebbi', '07056873421', 'female', '20', 'B+', 'Fever', 'PHC005', 'Musa Tanko', '08023453212', 'robotics_sm.jpg', '2017-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `cardno` varchar(32) NOT NULL,
  `diagnosis` text NOT NULL,
  `method` varchar(255) NOT NULL,
  `instructions` text NOT NULL,
  `docname` varchar(255) NOT NULL,
  `dateofprescription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `cardno`, `diagnosis`, `method`, `instructions`, `docname`, `dateofprescription`) VALUES
(2, 'PHC003', 'Family planning', 'Condom', 'check out and be careful ', 'Dr. Aku Ukwunu', '2017-10-21'),
(3, 'PHC004', 'Testing things', 'Microgyron Combined', 'Oooops, only medical practitioners can use the key words  ', 'Dr. Nura Lawal', '2017-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$itsdifficulttoguess210	',
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `surname`, `lastname`, `email`, `image`, `role`, `randSalt`, `regdate`) VALUES
(1, 'Rajab2010', '$1$Ba/.0R..$/QQQnzdQeuNosDzbjw2kK/', 'Imam', 'Rajab', 'rajabimam@yahoo.com', 'dr zakir.jpg', 'admin', '$2y$10$itsdifficulttoguess210	', '2017-07-25'),
(2, 'Abbass', '$2y$10$itsdifficulttoguess21u6EATMuZeU.A5DfSG7s03OMyW3zgXoVq', 'Shiro', 'Abbass', 'abaz4cool@gmail.com', 'boyata.jpg', 'receptionist', '$2y$10$itsdifficulttoguess210	', '2017-07-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cardno` (`cardno`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cardno` (`cardno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
