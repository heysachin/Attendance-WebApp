-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2018 at 12:19 PM
-- Server version: 5.5.58-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mess`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('manager', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`item_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_name`, `price`) VALUES
('CHICKEN MANJOORI', 45),
('MALABAR CHICKEN', 45),
('GARLIC CHICKEN', 45),
('PEPPER CHICKEN', 45),
('SOS CHICKEN', 45),
('BUTTER CHICKEN', 45),
('GINGER CHICKEN', 45),
('BEEF FRY', 45),
('CHICKEN MASALA', 45),
('EGG MASALA', 15),
('MASAL ROAST', 20),
('GHEE ROAST', 15),
('EGG BAJI', 8),
('BAJI', 6),
('SUKHIYAN', 7),
('NOODLES', 10),
('ELA ADA', 7),
('ULLI VADA', 6),
('UZHUNNU VADA', 6),
('BOILED EGG', 6),
('VADA', 6),
('PAZHAM PORI', 7),
('BULLS EYE', 6),
('OMLET', 7),
('CHICKEN SINGLE PEACE', 50),
('CHICKEN QUARTER', 75),
('BIRIYANI', 90),
('MALABAR BIRIYANI', 90),
('FRIED RICE', 90),
('GHEE RICE', 80),
('MEALS', 35),
('BREAK FAST', 25),
('EVENING TEA', 15),
('SUPPER', 35),
('CHERU PAZHAM', 2),
('BANANA', 8),
('PACHA PAZHAM', 3),
('FISH FRY', 25),
('FISH PICKLES', 30),
('HORLICKS', 15),
('BOURNVITTA', 15),
('MILK', 10),
('CHILLI GOPI', 20),
('GOPI MANJOORI', 20),
('SOYA BEAN', 20),
('BREAD JAM', 6),
('BUTTER ', 10),
('BUTTER BREAD', 7),
('JAM', 7),
('GUEST CHARGE PER DAY', 75),
('FEAST', 90),
('AVIL', 6),
('BREAD ROAST', 6),
('BONDA', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sconsumption`
--

CREATE TABLE IF NOT EXISTS `sconsumption` (
  `rollno` int(11) NOT NULL,
  `date` varchar(20) DEFAULT NULL,
  `tprice` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `itemname` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sconsumption`
--

INSERT INTO `sconsumption` (`rollno`, `date`, `tprice`, `name`, `itemname`) VALUES
(5034, '18-01-2018', 225, 'SACHIN DEV S', 'BEEF FRY'),
(4972, '18-01-2018', 225, 'SURIN SURESH', 'BEEF FRY'),
(5133, '18-01-2018', 225, 'VYSAL M M', 'BEEF FRY'),
(4981, '17-01-2018', 42, 'MIDHUN S', 'AVIL'),
(5450, '17-01-2018', 42, 'SHIHABUDHEEN K', 'AVIL'),
(4863, '01-02-2018', 45, 'HISHAM V S', 'CHICKEN MASALA'),
(5462, '01-02-2018', 45, 'RAHUL RAVINDRAN', 'CHICKEN MASALA'),
(5039, '01-02-2018', 45, 'ROBIN BAINY', 'CHICKEN MASALA'),
(4808, '01-02-2018', 45, 'PRAJEESH C', 'CHICKEN MASALA'),
(5228, '01-02-2018', 45, 'SRAVAN SUDHAKARAN', 'CHICKEN MASALA'),
(5164, '01-02-2018', 45, 'SREEHARI S', 'CHICKEN MASALA'),
(4991, '01-02-2018', 45, 'PAUL P JOBY', 'CHICKEN MASALA');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `room` int(7) DEFAULT NULL,
  `rollno` varchar(6) NOT NULL DEFAULT '',
  `name` varchar(23) DEFAULT NULL,
  `password` varchar(50) NOT NULL DEFAULT 'qwerty',
  PRIMARY KEY (`rollno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`room`, `rollno`, `name`, `password`) VALUES
(77, '4759', 'PRANAV.S', 'qwerty'),
(56, '4760', 'VIVEK KRISHNAN', 'qwerty'),
(55, '4763', 'ANANTHAKRISHNAN U', 'qwerty'),
(88, '4767', 'VINEETH V MENON', 'qwerty'),
(78, '4777', 'IJAS MUHAMMED.VV', 'qwerty'),
(76, '4785', 'SARATH.P.V', 'qwerty'),
(79, '4790', 'NANDU S', 'qwerty'),
(72, '4791', 'RAHUL RAJ', 'qwerty'),
(82, '4792', 'THEJUS K', 'qwerty'),
(85, '4793', 'BHARAT M NAMBIAR', 'qwerty'),
(10, '4794', 'KRISHNADAS M', 'qwerty'),
(83, '4796', 'ARUN STEEPHAN', 'qwerty'),
(87, '4797', 'NAVEEN VARGHESE', 'qwerty'),
(86, '4800', 'JISHNU M', 'qwerty'),
(89, '4803', 'ALI NAFIH P', 'qwerty'),
(64, '4806', 'SARATHLAL M', 'qwerty'),
(74, '4807', 'JOYAL P JOY', 'qwerty'),
(73, '4808', 'PRAJEESH C', 'qwerty'),
(57, '4822', 'AMAL BIJU', 'qwerty'),
(13, '4824', 'JITHIN C MATHEW', 'qwerty'),
(84, '4826', 'ROHAN V', 'qwerty'),
(9, '4828', 'KRISHNAPRASAD C N', 'qwerty'),
(58, '4830', 'ASWIN P', 'qwerty'),
(65, '4846', 'JITHIN KRISHNAN T P', 'qwerty'),
(80, '4861', 'FEBIN RAJU', 'qwerty'),
(52, '4863', 'HISHAM V S', 'qwerty'),
(81, '4874', 'ANAND R N', 'qwerty'),
(59, '4890', 'SANJAY K', 'qwerty'),
(75, '4894', 'RAHUL R', 'qwerty'),
(14, '4900', 'MOHAMMED RIYAS KHAN S M', 'qwerty'),
(62, '4902', 'RUPESH  P R', 'qwerty'),
(8, '4947', 'BIJU NARAYANAN VM', 'qwerty'),
(53, '4948', 'ARUN.K.S', 'qwerty'),
(44, '4972', 'SURIN SURESH', 'qwerty'),
(60, '4974', 'SHUBHAM SHAH', 'qwerty'),
(1, '4981', 'MIDHUN S', 'qwerty'),
(18, '4985', 'NAVANEETH G', 'qwerty'),
(93, '4986', 'AKSHAY R', 'qwerty'),
(46, '4989', 'AJAY SURESH', 'qwerty'),
(100, '4991', 'PAUL P JOBY', 'qwerty'),
(18, '4992', 'AKSHAY E K', 'qwerty'),
(38, '4993', 'VISHNU V', 'qwerty'),
(48, '4997', 'ARUN CHANDRAN J', 'qwerty'),
(98, '4998', 'DIVIN KRISHNAN', 'qwerty'),
(92, '5000', 'DHEERAJ KUMAR K', 'qwerty'),
(16, '5001', 'NEJU V J', 'qwerty'),
(46, '5004', 'RAKESH K', 'qwerty'),
(46, '5009', 'AJAY PRASAD', 'qwerty'),
(92, '5010', 'ABDUL SUKOOR P', 'qwerty'),
(19, '5011', 'HARIKRISHNAN P A', 'qwerty'),
(27, '5012', 'MANU PRAHLADAN', 'qwerty'),
(46, '5013', 'ABHAIJITH K S', 'qwerty'),
(17, '5021', 'VIJAYAKRISHNAN K', 'qwerty'),
(70, '5024', 'SUDHIN RAJ V', 'qwerty'),
(48, '5032', 'ABDUL AMEEN K', 'qwerty'),
(34, '5033', 'SARATH O B', 'qwerty'),
(44, '5034', 'SACHIN DEV S', 'qwerty'),
(70, '5039', 'ROBIN BAINY', 'qwerty'),
(1, '5041', 'ROHIT HARIDASAN NAIR', 'qwerty'),
(98, '5043', 'VISHNU VIJAY', 'qwerty'),
(91, '5044', 'JACKSON JULIAN', 'qwerty'),
(47, '5049', 'SUBIN RAJ', 'qwerty'),
(91, '5051', 'SOORAJ K C', 'qwerty'),
(68, '5054', 'SHARUN N D', 'qwerty'),
(41, '5055', 'DEVADARSAN P', 'qwerty'),
(22, '5056', 'SARATH KUMAR C', 'qwerty'),
(96, '5057', 'ALBIN MATHEW', 'qwerty'),
(16, '5060', 'ANJUB P', 'qwerty'),
(95, '5062', 'MUHAMMED HASEEB E', 'qwerty'),
(91, '5063', 'SUNIL JOSHUA', 'qwerty'),
(47, '5066', 'MOHAMMED ANAS K', 'qwerty'),
(93, '5070', 'ANANTHAKRISHNAN U', 'qwerty'),
(34, '5071', 'ABY P A', 'qwerty'),
(49, '5075', 'SYAMKRISHNA VARMA S', 'qwerty'),
(17, '5081', 'VYSHNAV K', 'qwerty'),
(49, '5084', 'SOURAV P S', 'qwerty'),
(91, '5087', 'ANURAJ A V', 'qwerty'),
(47, '5091', 'ABHIJITH S DAS', 'qwerty'),
(33, '5092', 'SOORAJ A', 'qwerty'),
(99, '5093', 'RAHUL M NAIR', 'qwerty'),
(99, '5096', 'ASWIN H', 'qwerty'),
(96, '5102', 'VISHNU MUKUNDAN', 'qwerty'),
(93, '5103', 'RAHUL H', 'qwerty'),
(47, '5105', 'AKSHAY K', 'qwerty'),
(98, '5106', 'ASWIN PRADEP G P', 'qwerty'),
(92, '5107', 'JASILUDHEEN K T', 'qwerty'),
(45, '5111', 'VINEESH V', 'qwerty'),
(96, '5112', 'NIDHIN S', 'qwerty'),
(70, '5113', 'NEERAJ SUNIL', 'qwerty'),
(49, '5116', 'SURAJ VARIER', 'qwerty'),
(18, '5117', 'SHABEEB ASLAM P K', 'qwerty'),
(97, '5119', 'RAHUL T P', 'qwerty'),
(18, '5125', 'NAVANEETH S', 'qwerty'),
(93, '5129', 'ALVIN SEBASTIAN', 'qwerty'),
(44, '5133', 'VYSAL M M', 'qwerty'),
(22, '5138', 'AKHIL SHA BEJOY', 'qwerty'),
(41, '5144', 'ARJUN P', 'qwerty'),
(68, '5145', 'AKSHAY V S', 'qwerty'),
(45, '5149', 'VIPIN M P', 'qwerty'),
(45, '5152', 'AJESH KRISHNAN K M', 'qwerty'),
(97, '5158', 'SOORAJ K ', 'qwerty'),
(68, '5159', 'VIGNESH H', 'qwerty'),
(99, '5164', 'SREEHARI S', 'qwerty'),
(16, '5165', 'ASWIN R C', 'qwerty'),
(95, '5169', 'ETHISHAM', 'qwerty'),
(100, '5172', 'GOKUL B S', 'qwerty'),
(19, '5174', 'ASHIN FAROOK', 'qwerty'),
(100, '5179', 'ANANTHAKRISHNAN G', 'qwerty'),
(33, '5180', 'AKHIL T N', 'qwerty'),
(42, '5181', 'HARSHIT MISHRA', 'qwerty'),
(42, '5183', 'SUBHAM PANDEY', 'qwerty'),
(42, '5184', 'RISHABH RAGAV', 'qwerty'),
(19, '5192', 'ADITYA VIKRAMAN', 'qwerty'),
(61, '5218', 'VISHNU P', 'qwerty'),
(67, '5226', 'SREEHARI S', 'qwerty'),
(95, '5227', 'MUHAMMED SHIBILY M', 'qwerty'),
(97, '5228', 'SRAVAN SUDHAKARAN', 'qwerty'),
(41, '5229', 'DIVIN RAJ M B', 'qwerty'),
(51, '5230', 'KANNAN K S', 'qwerty'),
(45, '5232', 'SABIN N', 'qwerty'),
(71, '5235', 'BINESH E B', 'qwerty'),
(90, '5236', 'VISHNU P S', 'qwerty'),
(12, '5241', 'MIDHEESH P', 'qwerty'),
(63, '5342', 'NITHIN RAVI', 'qwerty'),
(26, '5435', 'ABHILASH A', 'qwerty'),
(25, '5436', 'AJIN GHOSH V C', 'qwerty'),
(5, '5440', 'ARJUN K BOSE', 'qwerty'),
(23, '5444', 'ATHUL VASNIK RAHMAN', 'qwerty'),
(30, '5447', 'FASIL N K', 'qwerty'),
(21, '5448', 'DHEERAJ K M', 'qwerty'),
(31, '5449', 'HANU CHANDRAN', 'qwerty'),
(2, '5450', 'SHIHABUDHEEN K', 'qwerty'),
(35, '5452', 'JIS PAUL', 'qwerty'),
(16, '5456', 'SACHIN C', 'qwerty'),
(6, '5458', 'SHAHID K K', 'qwerty'),
(54, '5462', 'RAHUL RAVINDRAN', 'qwerty'),
(67, '5464', 'MOHANAKRISHNAN K', 'qwerty'),
(67, '5465', 'SARATH M V', 'qwerty'),
(17, '5466', 'RENJITH K P', 'qwerty'),
(90, '5467', 'SEBIN P S', 'qwerty'),
(90, '5468', 'MOHAMMED SAHEEL K', 'qwerty'),
(98, '5469', 'AKSHAY KUMAR P', 'qwerty'),
(27, '5481', 'HARI SREEKUMAR', 'qwerty'),
(51, '5567', 'JOTHISH', 'qwerty'),
(11, '5674', 'ANAND K NAIR', 'qwerty'),
(37, '5675', 'JOSEPH K SEBASTIAN', 'qwerty'),
(3, '5677', 'SAJEESH C', 'qwerty'),
(7, '5692', 'CINTO GEORGE V', 'qwerty'),
(36, '5693', 'SAFARULLA K', 'qwerty'),
(20, '5707', 'JISHNU J', 'qwerty'),
(49, '5719', 'SREENATH V K', 'qwerty'),
(90, '5720', 'AKHIL E SURESH', 'qwerty');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
