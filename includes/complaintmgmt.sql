-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2019 at 11:34 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaintmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`username`, `password`) VALUES
('admin', 'roottoor');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `RegNo` varchar(10) DEFAULT NULL,
  `ComplaintNo` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(200) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ComplaintNo`),
  KEY `RegNo` (`RegNo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`RegNo`, `ComplaintNo`, `Description`, `Date`, `Type`, `Location`, `Status`) VALUES
('20164126', 10, 'asrg', '2019-04-01', 'washroom', 'awe', 'completed'),
('20164126', 11, 'adsfaer', '2019-04-01', 'washroom', 'wesd', 'assigned'),
('20164126', 12, 'asrg', '2019-04-01', 'washroom', 'asgr', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `RegNo` varchar(10) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  KEY `RegNo` (`RegNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`RegNo`, `Password`) VALUES
('20168072', '$2y$10$zpiDaG9hFcpotkJ8dl2ujO/d8cg4BEEKDJjeloQUc/A7MkyMIAPBa'),
('20164126', '3e73c65c40cb4103401cc9cb35d4e27f65658734'),
('123', 'b3054ff0797ff0b2bbce03ec897fe63e0b6490e0');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `ComplaintNo` int(11) NOT NULL,
  `Issue` varchar(30) NOT NULL,
  PRIMARY KEY (`ComplaintNo`,`Issue`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `RegNo` varchar(10) NOT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Occupation` varchar(30) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`RegNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`RegNo`, `FirstName`, `LastName`, `Email`, `Occupation`, `Address`) VALUES
('123', 're', 're', 're', 'prof', 'sk'),
('20164126', 'Shryesh', 'Khandelwal', 'vrocks98@gmail.com', 'student', 'malviya'),
('20168072', 'Suyog', 'Shrestha', 'suyogshrestha007@gmail.com', 'student', 'malviya');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
CREATE TABLE IF NOT EXISTS `worker` (
  `WorkerID` varchar(10) NOT NULL,
  `WorkerName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`WorkerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`WorkerID`, `WorkerName`) VALUES
('a123', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `workerassigned`
--

DROP TABLE IF EXISTS `workerassigned`;
CREATE TABLE IF NOT EXISTS `workerassigned` (
  `ComplaintNo` int(11) DEFAULT NULL,
  `WorkerID` varchar(10) DEFAULT NULL,
  KEY `ComplaintNo` (`ComplaintNo`),
  KEY `WorkerID` (`WorkerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workerassigned`
--

INSERT INTO `workerassigned` (`ComplaintNo`, `WorkerID`) VALUES
(5, 'a123'),
(6, 'a123'),
(8, 'a123'),
(10, 'a123'),
(10, 'a123'),
(11, 'a123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `Complaint_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `user` (`RegNo`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `user` (`RegNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
