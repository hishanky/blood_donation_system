-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 06:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `did` int(10) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  `bog` varchar(5) NOT NULL,
  `dod` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`did`, `mobile_no`, `quantity`, `bog`, `dod`) VALUES
(3, '9920279906', '350', 'B+', '2019-10-24'),
(4, '9920279906', '350', 'B+', '2019-12-25'),
(5, '9930644668', '350', 'A+', '2019-10-25'),
(6, '8169575782', '400', 'AB+', '2019-10-24'),
(7, '9920279906', '350', 'B+', '2020-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(10) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `ans1` varchar(255) NOT NULL,
  `ans2` varchar(255) NOT NULL,
  `ans3` varchar(255) NOT NULL,
  `ans4` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uname`, `mobile_no`, `ans1`, `ans2`, `ans3`, `ans4`) VALUES
(1, 'ankit', '9920279906', 'it was good', 'from friend', 'its awsom', 'yes ');

-- --------------------------------------------------------

--
-- Table structure for table `rblood`
--

CREATE TABLE `rblood` (
  `bloodgroup` varchar(5) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rblood`
--

INSERT INTO `rblood` (`bloodgroup`, `amount`) VALUES
('A+', 1),
('A-', 0),
('B+', 1),
('B-', 0),
('AB+', 1),
('AB-', 0),
('O+', 0),
('O-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `rid` int(11) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  `bog` varchar(5) NOT NULL,
  `dod` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`rid`, `pname`, `mobile_no`, `quantity`, `bog`, `dod`) VALUES
(3, '', '7894561230', '1', 'B+', '2019-10-25'),
(4, '', '8169575782', '1', 'B+', '2020-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `mobile_no` varchar(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `active` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`mobile_no`, `fname`, `lname`, `dob`, `address`, `active`) VALUES
('7894561230', 'rajesh', 'sharma', '1996-06-15', 'andheri', '0'),
('8169575782', 'vipul', 'naik', '1995-12-10', 'bhayander', '0'),
('9920279906', 'ankit', 'shahu', '1995-12-10', 'bhaynader', '0'),
('9930644668', 'sybil', 'fer', '2000-04-29', 'borivali', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`did`),
  ADD KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`mobile_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`mobile_no`) REFERENCES `user` (`mobile_no`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`mobile_no`) REFERENCES `user` (`mobile_no`);

--
-- Constraints for table `receiver`
--
ALTER TABLE `receiver`
  ADD CONSTRAINT `receiver_ibfk_1` FOREIGN KEY (`mobile_no`) REFERENCES `user` (`mobile_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
