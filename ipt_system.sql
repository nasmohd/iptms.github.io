-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 04:12 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(11) DEFAULT NULL,
  `password` varchar(11) DEFAULT NULL,
  `updationDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_info`
--

CREATE TABLE `comment_info` (
  `comment_id` int(11) NOT NULL,
  `information` text DEFAULT NULL,
  `maintenance` int(11) DEFAULT NULL,
  `networking` int(11) DEFAULT NULL,
  `programming` int(11) DEFAULT NULL,
  `IPTplace_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_info`
--

INSERT INTO `comment_info` (`comment_id`, `information`, `maintenance`, `networking`, `programming`, `IPTplace_id`) VALUES
(1, 'A very good training program', 7, 5, 3, 1),
(2, 'Good p', 5, 9, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `industrial_supervisor_info`
--

CREATE TABLE `industrial_supervisor_info` (
  `industrial_sup_ID` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industrial_supervisor_info`
--

INSERT INTO `industrial_supervisor_info` (`industrial_sup_ID`, `firstName`, `lastName`, `username`, `companyName`, `password`, `profile_picture`) VALUES
(1, 'Albert', 'Einstein', 'albinstein879', 'Massive Dynamic Co. Ltd', '1234', 'avatar5.user=fs2.png'),
(2, 'Mary', 'Shelley', 'mshell', 'Frankenstein Tech Ltd', 'ms', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `institute_supervisor_info`
--

CREATE TABLE `institute_supervisor_info` (
  `institute_sup_ID` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute_supervisor_info`
--

INSERT INTO `institute_supervisor_info` (`institute_sup_ID`, `firstName`, `lastName`, `username`, `password`, `profile_picture`) VALUES
(1, 'Wilmur', 'Royce', 'wr64', '1234', 'avatar04.user=is1.png');

-- --------------------------------------------------------

--
-- Table structure for table `ipt_place_info`
--

CREATE TABLE `ipt_place_info` (
  `IPTplace_id` int(11) NOT NULL,
  `IPTplace_name` varchar(255) DEFAULT NULL,
  `IPT_supervisor_names` varchar(255) DEFAULT NULL,
  `ipt_location` varchar(255) DEFAULT NULL,
  `region` varchar(255) NOT NULL,
  `students_requested` int(11) DEFAULT NULL,
  `students_accepted` int(11) NOT NULL,
  `placements_remaining` int(11) DEFAULT NULL,
  `reviews` int(11) DEFAULT NULL,
  `maintenance` int(11) NOT NULL,
  `networking` int(11) NOT NULL,
  `programming` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipt_place_info`
--

INSERT INTO `ipt_place_info` (`IPTplace_id`, `IPTplace_name`, `IPT_supervisor_names`, `ipt_location`, `region`, `students_requested`, `students_accepted`, `placements_remaining`, `reviews`, `maintenance`, `networking`, `programming`) VALUES
(1, 'TTCL', 'George Onesmo', 'Posta', 'Dar es Salaam', 10, 0, 9, 10, 3, 4, 5),
(2, 'Vodacom', 'Rick Sanchez', 'Mlimani city', 'Dar es Salaam', 6, 0, 3, 9, 3, 7, 5),
(5, 'area24', 'Mr. Mtaalam', 'Temeke', 'Dar es Salaam', 6, 0, 3, 10, 6, 4, 3),
(6, 'area24', 'Mr. Mtaalam', 'Temeke', 'Dar es Salaam', 6, 0, 3, 10, 3, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `logbook_entries`
--

CREATE TABLE `logbook_entries` (
  `entryNumber` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `weekNumber` int(11) DEFAULT NULL,
  `weekStart` varchar(11) DEFAULT NULL,
  `weekEnds` varchar(11) DEFAULT NULL,
  `monEntry` varchar(500) DEFAULT NULL,
  `tueEntry` varchar(500) DEFAULT NULL,
  `wedEntry` varchar(500) DEFAULT NULL,
  `thurEntry` varchar(500) DEFAULT NULL,
  `friEntry` varchar(500) DEFAULT NULL,
  `satEntry` varchar(500) DEFAULT NULL,
  `monhr` varchar(255) NOT NULL,
  `tuehr` varchar(255) NOT NULL,
  `wedhr` varchar(255) NOT NULL,
  `thurhr` varchar(255) NOT NULL,
  `frihr` varchar(255) NOT NULL,
  `sathr` varchar(255) NOT NULL,
  `week_Entry` text DEFAULT NULL,
  `week_picture` varchar(255) DEFAULT NULL,
  `indSup_comments` varchar(500) DEFAULT NULL,
  `indSup_verifystatus` int(11) DEFAULT NULL,
  `instSup_verifystatus` int(11) DEFAULT NULL,
  `year_of_study` int(11) DEFAULT NULL,
  `entry_status` int(11) DEFAULT NULL,
  `last_submission` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logbook_entries`
--

INSERT INTO `logbook_entries` (`entryNumber`, `userID`, `weekNumber`, `weekStart`, `weekEnds`, `monEntry`, `tueEntry`, `wedEntry`, `thurEntry`, `friEntry`, `satEntry`, `monhr`, `tuehr`, `wedhr`, `thurhr`, `frihr`, `sathr`, `week_Entry`, `week_picture`, `indSup_comments`, `indSup_verifystatus`, `instSup_verifystatus`, `year_of_study`, `entry_status`, `last_submission`) VALUES
(2, 1, 1, '2020-06-15', '2020-06-19', 'Orientation Day', 'Office familiarization', 'HTML & CSS', 'JavaScript', 'Networking & Router configuration', '-', '8 hours', '8 hours', '8 hours', '8 hours', '8 hours', '9 hours', 'A very educative week! I learnt a lot in my field of study', 'IMG-20191031-WA0004.user=s1,w1.jpg', 'Very well documented tasks, keep it up', 0, 0, 2, 1, '2020/08/25'),
(4, 2, 1, '2020-06-15', '2020-06-19', 'Maintenance', 'Database', 'Coding', 'Hardware Installation', 'Networking', '', '', '', '', '', '', '', '', 'wsus.user=s2,w1.png', '', 0, 0, 1, 1, '2020/07/12'),
(18, 2, 2, '2020-06-08', '2020-06-12', 'Maintenance', 'Router configuration', 'Printer repair and downloading proper HP printer drivers', 'Creation of a mesh topology', '', '-', '', '', '', '', '', '', '', 'IMG-20191031-WA0003.user=s2,w2.jpg', '', 0, 0, NULL, 1, '2020/07/12'),
(19, 1, 2, '2020-06-22', '2020-06-26', 'maintenance', 'networking', 'Hardware Installation', 'Old hardware maintenance', 'Printer troubleshooting', 'none', '', '', '', '', '', '', 'A very informative week in the field', 'study2.user=s1,w2.jpg', 'Seen! Keep up the good work', 0, 0, NULL, 1, '2020/08/25'),
(20, 1, 3, '2020-06-22', '2020-06-26', 'Maintenance', 'Networking', 'Hardware installation', 'Networking', 'Coding in C++', 'none', '', '', '', '', '', '', 'Very productive!', 'b471e3cf440c2f772569912e32aa372b.user=s1,w3.jpg', '', 0, 0, NULL, 1, '2020/08/25'),
(21, 1, 4, '2020-06-29', '2020-07-03', 'Networking', 'Maintenance', 'Coding in C#', 'Hardware installation', 'Database setup', 'none', '', '', '', '', '', '', 'A very educative week', 'study.user=s1,w4.jpg', 'Good Progress made.. Increase your efforts', 0, 0, NULL, 1, '2020/08/25'),
(22, 1, 5, '', '2020-07-10', 'Maintenance', 'Networking', 'Router setup', 'LAN configuration', 'Database setting up privileges', '', '', '', '', '', '', '', 'Learnt a lot about networking in this particular week', 'bright.user=s1,w5.jpg', '', 0, 0, NULL, 1, '2020/08/25'),
(23, 1, 6, '2020-07-20', '2020-07-24', '', 'Office software installation and activation', 'Windows 10 installation on new laptops', 'Activation of Windows 10 on 20 office laptops', 'Network configuration', '', '', '', '', '', '', '', 'Very productive and highly enjoyable', 'books5.user=s1,w6.jpg', 'Please be more specific in your reports and make the images clearer for viewing', 0, 0, NULL, 1, '2020/08/25'),
(24, 1, 7, '2020-07-06', '2020-07-10', 'Maintenance', 'Networking', 'C++ programming', 'HTML web development', 'Site hosting on server', '', '', '', '', '', '', '', 'We learnt a lot from the supervisor in charge', 'books2.user=s1,w7.jpg', 'Very good', 0, 0, NULL, 1, '2020/08/25'),
(26, 2, 3, '2020-07-13', '2020-07-17', 'Maintenance on Office laptop malfunctioning', 'Installation of Service Pack 1 on floor 1 desktop for programming uses', 'Router packet configuration', 'Ethernet cable termination (about 10 cables needed)', 'Windows 10 activation using KMSpico', 'none', '', '', '', '', '', '', 'Learnt a lot regarding OS', 'IMG-20191031-WA0001.user=s2,w3.jpg', '', 0, 1, 0, 1, '2020/07/12'),
(27, 2, 4, '2020-07-27', '2020-08-01', 'Networking', 'Programming in Java', 'Ethernet cable termination using RJ-45', 'Troubleshooting an HP printer', 'Maintenance on an old HP desktop computer', 'none', '', '', '', '', '', '', 'Learn a lot from the supervisor in charge', '20190930_132949.user=s2,w4.jpg', '', 0, 1, 0, 1, '2020/07/12');

-- --------------------------------------------------------

--
-- Table structure for table `notification_info`
--

CREATE TABLE `notification_info` (
  `notification_id` int(11) NOT NULL,
  `notification` text DEFAULT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `industrial_supervisor_ID` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `logbook_weekNumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_info`
--

INSERT INTO `notification_info` (`notification_id`, `notification`, `StudentID`, `industrial_supervisor_ID`, `status`, `logbook_weekNumber`) VALUES
(1, 'Nassor Mohamed Has requested you verify week 4 in logbook', 1, 1, 0, 4),
(2, 'Nassor Mohamed Has requested you verify week 6 in logbook', 1, 1, 0, 6),
(4, 'Nassor Mohamed Has requested you verify week 7 in logbook', 1, 1, 0, 7),
(9, 'Nassor Mohamed Has requested you verify week 3 in logbook', 1, 1, 0, 3),
(12, 'Nassor Mohamed Has requested you verify week 9 in logbook', 1, 1, 0, 9),
(14, 'Nassor Mohamed Has requested you verify week 10 in logbook', 1, 1, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `StudentID` int(11) NOT NULL,
  `FirstName` varchar(11) DEFAULT NULL,
  `LastName` varchar(11) DEFAULT NULL,
  `RegistrationNumber` varchar(15) DEFAULT NULL,
  `course` varchar(11) DEFAULT NULL,
  `EmailAddress` varchar(255) DEFAULT NULL,
  `PhoneNumber` int(255) DEFAULT NULL,
  `StudentPassword` varchar(255) DEFAULT NULL,
  `ProfilePicture` varchar(255) DEFAULT NULL,
  `ipt_weeks` int(11) DEFAULT NULL,
  `year_of_study` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`StudentID`, `FirstName`, `LastName`, `RegistrationNumber`, `course`, `EmailAddress`, `PhoneNumber`, `StudentPassword`, `ProfilePicture`, `ipt_weeks`, `year_of_study`) VALUES
(1, 'Nassor', 'Mohamed', '170210225935', 'od17-coe', 'nasmohd40@gmail.com', 627979633, 'cl', 'get_photo.user=s1.jpg', 10, 1),
(2, 'Rick', '& Morty', '170210225936', 'od17-coe', 'ricknmorty@gmail.com', 627738199, 'rm', 'EYT9mzxWsAAuFn7.user=s2.jpeg', 10, 1),
(3, 'Annalise', 'Keating', '170210225937', '', '', 0, 'ak', NULL, 10, 0),
(4, 'John', 'Constantine', '170210225938', '', '', 0, 'jc', NULL, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_location_info`
--

CREATE TABLE `student_location_info` (
  `location_id` int(11) NOT NULL,
  `starting_date` varchar(255) DEFAULT NULL,
  `ending_date` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `CompanyAddress` varchar(255) DEFAULT NULL,
  `indSup_name` varchar(255) DEFAULT NULL,
  `indSup_phoneNumber` varchar(255) DEFAULT NULL,
  `LocationDescription` text DEFAULT NULL,
  `locationCoord` varchar(255) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL,
  `test_location` varchar(255) DEFAULT NULL,
  `institute_supervision_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_location_info`
--

INSERT INTO `student_location_info` (`location_id`, `starting_date`, `ending_date`, `CompanyName`, `CompanyAddress`, `indSup_name`, `indSup_phoneNumber`, `LocationDescription`, `locationCoord`, `studentID`, `test_location`, `institute_supervision_status`) VALUES
(11, '2020-07-06', '2020-08-07', 'DIT', 'DIT', 'Mark', '0627192819', 'Near CBE', '-6.79936, 39.23968', 2, '-6.815137, 39.279541', 0),
(12, '2020-07-06', '2020-08-01', 'TTCL', 'Samora Avenue, Posta, Dar es Salaam', 'Peter Watkins', '0627192819', 'TTCL HQ, EXTELCOM', '-6.818096, 39.287580', 3, '-6.818096, 39.287580', 0),
(14, '', '', '', '', '', '', '', '-6.8149926, 39.2796056', 1, '-6.8149926, 39.2796056', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supervision_info`
--

CREATE TABLE `supervision_info` (
  `id` int(11) NOT NULL,
  `institute_supervisor_ID` int(11) DEFAULT NULL,
  `industrial_supervisor_ID` int(11) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL,
  `institute_supervision_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervision_info`
--

INSERT INTO `supervision_info` (`id`, `institute_supervisor_ID`, `industrial_supervisor_ID`, `studentID`, `institute_supervision_status`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 1, 2, 0),
(3, 1, 1, 3, 0),
(4, 1, 2, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task_info`
--

CREATE TABLE `task_info` (
  `task_id` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `industrial_supervisor_ID` int(11) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `tasks` text DEFAULT NULL,
  `task_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_info`
--

INSERT INTO `task_info` (`task_id`, `StudentID`, `industrial_supervisor_ID`, `week`, `deadline`, `tasks`, `task_status`) VALUES
(9, 2, 1, '2020-07-20', '2020-07-22', 'Troubleshoot the router on floor 6', 0),
(15, 2, 1, '2020-07-27', '2020-07-31', 'Logbook for this week to be fully filled ready for assessment', 0),
(17, 2, 1, '2020-08-03', '2020-08-07', 'Talk to the client on new features to add to the website', 0),
(19, 1, 1, '2020-08-24', '2020-08-27', 'Go to Kariakoo for the workstation', 0),
(21, 1, 1, '2020-08-24', '2020-08-27', 'Repair the router at floor 7 of the office\r\n', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_info`
--
ALTER TABLE `comment_info`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `industrial_supervisor_info`
--
ALTER TABLE `industrial_supervisor_info`
  ADD PRIMARY KEY (`industrial_sup_ID`);

--
-- Indexes for table `institute_supervisor_info`
--
ALTER TABLE `institute_supervisor_info`
  ADD PRIMARY KEY (`institute_sup_ID`);

--
-- Indexes for table `ipt_place_info`
--
ALTER TABLE `ipt_place_info`
  ADD PRIMARY KEY (`IPTplace_id`);

--
-- Indexes for table `logbook_entries`
--
ALTER TABLE `logbook_entries`
  ADD PRIMARY KEY (`entryNumber`);

--
-- Indexes for table `notification_info`
--
ALTER TABLE `notification_info`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `student_location_info`
--
ALTER TABLE `student_location_info`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `supervision_info`
--
ALTER TABLE `supervision_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_info`
--
ALTER TABLE `task_info`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_info`
--
ALTER TABLE `comment_info`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `industrial_supervisor_info`
--
ALTER TABLE `industrial_supervisor_info`
  MODIFY `industrial_sup_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `institute_supervisor_info`
--
ALTER TABLE `institute_supervisor_info`
  MODIFY `institute_sup_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ipt_place_info`
--
ALTER TABLE `ipt_place_info`
  MODIFY `IPTplace_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logbook_entries`
--
ALTER TABLE `logbook_entries`
  MODIFY `entryNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `notification_info`
--
ALTER TABLE `notification_info`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_location_info`
--
ALTER TABLE `student_location_info`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supervision_info`
--
ALTER TABLE `supervision_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_info`
--
ALTER TABLE `task_info`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
