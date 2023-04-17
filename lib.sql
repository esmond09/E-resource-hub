-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 11:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `b_id` varchar(255) NOT NULL,
  `booksname` varchar(50) NOT NULL,
  `authorname` varchar(50) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`b_id`, `booksname`, `authorname`, `programme`, `file_name`, `path`) VALUES
('b001', 'PHP', 'kris', 'it', 'b001.pdf', 'ebooks/b001.pdf'),
('b002', 'php tutorial', 'harry', 'it', 'b002.pdf', 'ebooks/b002.pdf'),
('b010', 'japanese language', 'hatano', 'lg', 'b010.pdf', 'ebooks/b010.pdf'),
('b007', 'introduction of accounting', 'jerry', 'ib', 'b007.pdf', 'ebooks/b007.pdf'),
('b005', 'intro for finance', 'annie', 'ib', 'b005.pdf', 'ebooks/b005.pdf'),
('b006', 'COMMUNICATION THEORIES', 'peter', 'mc', 'b006.pdf', 'ebooks/b006.pdf'),
('b008', 'THEORIES OF MASS EVOLUTION', 'RUSSELL', 'mc', 'b008.pdf', 'ebooks/b008.pdf'),
('b009', 'Tourism Industry ', 'Christina', 'th', 'b009.pdf', 'ebooks/b009.pdf'),
('b011', 'MANA GEMENT IN THE HOSPITALITY INDUSTRY', 'Tom', 'th', 'b011.pdf', 'ebooks/b011.pdf'),
('b012', 'MANDARIN CHINESE', 'Benny', 'lg', 'b012.pdf', 'ebooks/b012.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `student_book`
--

CREATE TABLE `student_book` (
  `emailid` varchar(200) NOT NULL,
  `book_id` varchar(100) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `recive_date_1` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_book`
--

INSERT INTO `student_book` (`emailid`, `book_id`, `book_name`, `recive_date_1`) VALUES
('salha@gmail.com', 'b001', 'PHP', '02-11-2020'),
('agnes@gmail.com', 'b002', 'php tutorial', '06-12-2020'),
('ali@gmail.com', 'b001', 'PHP', '08-12-2020');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `id` int(10) NOT NULL,
  `sid` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'student',
  `gender` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `year` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `sid`, `type`, `gender`, `name`, `programme`, `year`, `emailid`, `password`) VALUES
(1, '001', 'admin', 'm', 'admin', 'lib admin', 'blank', 'admin', 'admin123'),
(2, '002', 'admin', 'm', 'christopher', 'lib admin', 'blank', 'chris', 'admin111'),
(11, '1890dit', 'student', 'f', 'agnes ang', 'it', '2nd_year', 'agnes@gmail.com', '12345'),
(12, '1235dit', 'student', 'f', 'salha', 'it', '2nd_year', 'salha@gmail.com', '123'),
(13, '1898dib', 'student', 'm', 'leo', 'ib', '3rd_year', 'leo@gmail.com', '122'),
(14, '1900dit', 'student', 'm', 'ali', 'mc', '1st_year', 'ali@gmail.com', '1900ali'),
(3, '003', 'admin', 'm', 'john', 'lib admin', '', 'john', 'admin001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `b_id` (`b_id`);

--
-- Indexes for table `student_book`
--
ALTER TABLE `student_book`
  ADD PRIMARY KEY (`emailid`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
