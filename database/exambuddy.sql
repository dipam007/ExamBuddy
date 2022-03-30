-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 07:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exambuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(100) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `e_id`) VALUES
(1, 'Data Structure', 1),
(2, 'Algorithms', 1),
(3, 'DBMS', 1),
(4, 'Operating Systems', 1),
(5, 'TOC', 1),
(6, 'Compiler Design', 1),
(7, 'Maths', 1),
(8, 'Physics', 2),
(9, 'Chemistry', 2),
(10, 'Maths', 2);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`e_id`, `e_name`) VALUES
(1, 'GATE'),
(2, 'JEE');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `size`, `downloads`) VALUES
(16, 'AI.pdf', 3651913, 0),
(17, 'AML.pdf', 3397819, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `qid` int(100) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correctOption` varchar(255) NOT NULL,
  `questionTag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`qid`, `question`, `option1`, `option2`, `option3`, `option4`, `correctOption`, `questionTag`) VALUES
(1, 'which IP is Correct?', '127.0.0.1', '345.3.4.5', '1.2.3', '23.256.56.3', 'option1', 'CN'),
(2, 'thsi is dbms', '2', '3', '4', '2', 'option2', 'DBMS'),
(3, 'what is CN?', 'TCP', 'IP', 'ARP', 'DHCP', 'option3', 'CN');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(255) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_mob` int(10) NOT NULL,
  `t_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_name`, `t_email`, `t_mob`, `t_pass`) VALUES
(8, 'Dipam Patel', 'dipam@gmail.com', 2147483647, '81dc9bdb52d04dc20036dbd8313ed055'),
(20, 'het', 'het@gmail.com', 2147483647, '81dc9bdb52d04dc20036dbd8313ed055'),
(23, 'anand', 'ad@gmail.com', 2147483647, '81dc9bdb52d04dc20036dbd8313ed055'),
(43, 'nij', 'nij@gmail.com', 2147483647, '81dc9bdb52d04dc20036dbd8313ed055'),
(44, 'Vadukul', 'vadu@gmail.com', 2147483647, '94e62763ca2c358fbe1de47b4a3c6962');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`) VALUES
(16, 'Dipam', 'dipampatel001@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `link`, `c_id`) VALUES
(0, 'demo', 'LbfMRnOhJGs', 1),
(9, 'Introduction to Data Structure', '1Kic3maW7rc', 1),
(10, 'Algorithm & Analysis of Algorithm', '1Kic3maW7rc', 1),
(11, 'Array Introduction', '1Kic3maW7rc', 1),
(12, 'Minimum and Maximum of Array ', '1Kic3maW7rc', 1),
(13, 'Insertion and Deletion in Array ', '1Kic3maW7rc', 1),
(14, 'Searching in Array', '1Kic3maW7rc', 1),
(19, 'Linked List: Traversing and Insertion', '1Kic3maW7rc', 1),
(40, 'Compiler Design intro', 'p1omkBPAcOg', 6),
(41, 'Knapsack Algo', 'oTTzNMHM05I', 2),
(42, '0/1 knapsack', '/PfkBS9qIMRE', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `qid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
