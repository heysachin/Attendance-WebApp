-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 21, 2018 at 11:58 PM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `SIndex` int(11) NOT NULL,
  `Tid` varchar(50) NOT NULL,
  `SubId` varchar(50) NOT NULL,
  `StudId` varchar(50) NOT NULL,
  `Total` int(11) NOT NULL,
  `Missed` int(11) NOT NULL,
  `Date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`SIndex`, `Tid`, `SubId`, `StudId`, `Total`, `Missed`, `Date`) VALUES
(0, 'CSE003', 'CS302', 'NSS15CS001', 3, 1, '04-04-2018'),
(0, 'CSE003', 'CS302', 'NSS15CS002', 3, 3, '04-04-2018'),
(0, 'CSE003', 'CS302', 'NSS15CS003', 3, 2, '04-04-2018'),
(0, 'CSE003', 'CS302', 'NSS15CS004', 3, 0, '04-04-2018'),
(0, 'CSE003', 'CS302', 'NSS15CS050', 3, 0, '04-04-2018');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DId` int(11) NOT NULL,
  `DName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DId`, `DName`) VALUES
(1, 'Computer Science & Engineering'),
(2, 'Civil Engineering'),
(3, 'Electronics & Communications'),
(4, 'Electrical & Electronics'),
(5, 'Instrumentation & Communication'),
(6, 'Mechanical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `internals`
--

CREATE TABLE `internals` (
  `SubID` varchar(50) NOT NULL,
  `Tid` varchar(50) NOT NULL,
  `StudID` varchar(50) NOT NULL,
  `First` int(11) NOT NULL DEFAULT '0',
  `Second` int(11) NOT NULL DEFAULT '0',
  `Third` int(11) NOT NULL DEFAULT '0',
  `Retest` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `internals`
--

INSERT INTO `internals` (`SubID`, `Tid`, `StudID`, `First`, `Second`, `Third`, `Retest`) VALUES
('CS302', 'CSE003', 'NSS15CS001', 19, 20, 1, 0),
('CS302', 'CSE003', 'NSS15CS002', 99, 0, 2, 0),
('CS302', 'CSE003', 'NSS15CS003', 99, 0, 3, 20),
('CS302', 'CSE003', 'NSS15CS004', 0, 20, 4, 0),
('CS302', 'CSE003', 'NSS15CS050', 0, 99, 5, 40),
('CS368', 'CSE003', 'NSS15CS050', 0, 0, 90, 90);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `StudId` varchar(50) NOT NULL,
  `Sem` int(11) NOT NULL,
  `Dept` int(11) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Fname`, `Lname`, `StudId`, `Sem`, `Dept`, `Address`, `Email`, `Phone`, `Password`) VALUES
('', '', '', 1, 1, '', '', '', ''),
('11', '11', '11', 1, 1, '11', '11', '11', '11'),
('12', '12', '12', 1, 2, '12', '12', '12', '12'),
('13', '13', '13', 1, 3, '13', '13', '13', '13'),
('14', '14', '14', 1, 4, '14', '14', '14', '14'),
('15', '15', '15', 1, 5, '15', '15', '15', '15'),
('16', '16', '16', 1, 6, '16', '16', '16', '16'),
('21', '21', '21', 2, 1, '21', '21', '21', '21'),
('22', '22', '22', 2, 2, '22', '22', '22', '22'),
('23', '23', '23', 2, 3, '23', '23', '23', '23'),
('24', '24', '24', 2, 4, '24', '24', '24', '24'),
('25', '25', '25', 2, 5, '25', '25', '25', '25'),
('26', '26', '26', 2, 6, '26', '26', '26', '26'),
('31', '31', '31', 3, 1, '31', '31', '31', '31'),
('32', '32', '32', 3, 2, '32', '32', '32', '32'),
('33', '33', '33', 3, 3, '33', '33', '33', '33'),
('34', '34', '34', 3, 4, '34', '34', '34', '34'),
('35', '35', '35', 3, 5, '35', '35', '35', '35'),
('36', '36', '36', 3, 6, '36', '36', '36', '36'),
('41', '41', '41', 4, 1, '41', '41', '41', '41'),
('42', '42', '42', 4, 2, '42', '42', '42', '42'),
('43', '43', '43', 4, 3, '43', '43', '43', '43'),
('44', '44', '44', 4, 4, '44', '44', '44', '44'),
('45', '45', '45', 4, 5, '45', '45', '45', '45'),
('46', '46', '46', 4, 6, '46', '46', '46', '46'),
('51', '51', '51', 5, 1, '51', '51', '51', '51'),
('52', '52', '52', 5, 2, '52', '52', '52', '52'),
('53', '53', '53', 5, 3, '53', '53', '53', '53'),
('54', '54', '54', 5, 4, '54', '54', '54', '54'),
('55', '55', '55', 5, 5, '55', '55', '55', '55'),
('56', '56', '56', 5, 6, '56', '56', '56', '56'),
('61', '61', '61', 6, 1, '61', '61', '61', '61'),
('62', '62', '62', 6, 2, '62', '62', '62', '62'),
('63', '63', '63', 6, 3, '63', '63', '63', '63'),
('64', '64', '64', 6, 4, '64', '64', '64', '64'),
('65', '65', '65', 6, 5, '65', '65', '65', '65'),
('66', '66', '66', 6, 6, '66', '66', '66', '66'),
('71', '71', '71', 7, 1, '71', '71', '71', '71'),
('72', '72', '72', 7, 2, '72', '72', '72', '72'),
('73', '73', '73', 7, 3, '73', '73', '73', '73'),
('74', '74', '74', 7, 4, '74', '74', '74', '74'),
('75', '75', '75', 7, 5, '75', '75', '75', '75'),
('76', '76', '76', 7, 6, '76', '76', '76', '76'),
('81', '81', '81', 8, 1, '81', '81', '81', '81'),
('82', '82', '82', 8, 2, '82', '82', '82', '82'),
('83', '83', '83', 8, 3, '83', '83', '83', '83'),
('84', '84', '84', 8, 4, '84', '84', '84', '84'),
('85', '85', '85', 8, 5, '85', '85', '85', '85'),
('86', '86', '86', 8, 6, '86', '86', '86', '86'),
('31', 'asddas', 'askdjas', 3, 1, 'a', 'a', '9', 'd'),
('Sachin', 'Dev', 'nss1422', 4, 1, 'Nirmalyam, Pulivila, Vellar, Kovalam P.O.', 'hellosachindev@gmail.com', '08089144967', 'qwerty'),
('Ajanyan', 'P Pradeep', 'NSS15CS001', 6, 1, NULL, NULL, NULL, 'qwerty'),
('Ajesh', 'Krishnan', 'NSS15CS002', 6, 1, NULL, NULL, NULL, 'qwerty'),
('Akash', 'Nath', 'NSS15CS003', 6, 1, NULL, NULL, NULL, 'qwerty'),
('Akhil', 'E Suresh', 'NSS15CS004', 6, 1, NULL, NULL, NULL, 'qwerty'),
('Sachin', 'Dev', 'NSS15CS050', 6, 1, 'MH1, NSSCE, Palakkad', 'sachindev@yahoo.com', '8089144967', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SIndex` int(11) NOT NULL,
  `Sid` varchar(50) NOT NULL,
  `Sname` varchar(100) NOT NULL,
  `Credits` int(11) DEFAULT NULL,
  `Tid` varchar(50) NOT NULL,
  `Sem` int(11) NOT NULL,
  `Dept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SIndex`, `Sid`, `Sname`, `Credits`, `Tid`, `Sem`, `Dept`) VALUES
(1, 'CS302', 'Design and Analysis of Algorithms', 6, 'CSE003', 6, 1),
(2, 'CS368', 'Web Technologies', 6, 'CSE004', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Tid` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Dept` int(11) NOT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Tid`, `Fname`, `Lname`, `Email`, `Dept`, `Position`, `Password`) VALUES
('CSE001', 'Dr. Viji', 'Rajendran V', 'vijirajv@gmail.com', 1, 'Head of Department', 'qwerty'),
('CSE002', 'S', 'Sindhu', 'sindhu.nss@gmaill.com', 1, 'Associate Professor', 'qwerty'),
('CSE003', 'Sruthy', 'Manmadhan', 'sruthym.88@gmail.com', 1, 'Assistant Professor', 'qwerty'),
('CSE004', 'Balagopal', 'N', 'balagopaln89@gmail.com', 1, 'Assistant Professor', 'qwerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`SIndex`,`StudId`,`Date`),
  ADD UNIQUE KEY `Tid_2` (`Tid`,`SubId`,`StudId`,`Date`) USING BTREE,
  ADD KEY `SubId` (`SubId`),
  ADD KEY `StudId` (`StudId`),
  ADD KEY `Tid` (`Tid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DId`),
  ADD KEY `DId` (`DId`);

--
-- Indexes for table `internals`
--
ALTER TABLE `internals`
  ADD PRIMARY KEY (`SubID`,`Tid`,`StudID`),
  ADD KEY `StudID` (`StudID`),
  ADD KEY `Tid` (`Tid`),
  ADD KEY `SubID` (`SubID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `Rno` (`StudId`),
  ADD KEY `StudId` (`StudId`),
  ADD KEY `Dept` (`Dept`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SIndex`),
  ADD UNIQUE KEY `Sid_2` (`Sid`,`Tid`,`Dept`) USING BTREE,
  ADD KEY `Tid` (`Tid`),
  ADD KEY `Dept` (`Dept`),
  ADD KEY `Sid` (`Sid`) USING BTREE;

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD UNIQUE KEY `Tid` (`Tid`),
  ADD KEY `Dept` (`Dept`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SIndex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`Tid`) REFERENCES `teacher` (`Tid`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`SubId`) REFERENCES `subjects` (`Sid`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`StudId`) REFERENCES `student` (`StudId`);

--
-- Constraints for table `internals`
--
ALTER TABLE `internals`
  ADD CONSTRAINT `internals_ibfk_1` FOREIGN KEY (`SubID`) REFERENCES `subjects` (`Sid`),
  ADD CONSTRAINT `internals_ibfk_2` FOREIGN KEY (`StudID`) REFERENCES `student` (`StudId`),
  ADD CONSTRAINT `internals_ibfk_3` FOREIGN KEY (`Tid`) REFERENCES `subjects` (`Tid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Dept`) REFERENCES `department` (`DId`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`Tid`) REFERENCES `teacher` (`Tid`),
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`Dept`) REFERENCES `department` (`DId`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`Dept`) REFERENCES `department` (`DId`);
