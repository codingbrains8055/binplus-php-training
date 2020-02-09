-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2019 at 02:10 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'm admin hu', 'admin@admin.com', 'admin', 'pass', '2019-10-16 20:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int(6) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(100) NOT NULL,
  `added_on` datetime(6) NOT NULL,
  `updated_on` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `added_on`, `updated_on`) VALUES
(7, 'aniket singh', '2019-10-19 19:55:06.000000', '2019-10-22 03:05:11.000000'),
(10, 'vishal singh', '2019-10-20 08:35:56.000000', '2019-10-20 03:05:56.425505'),
(11, 'HC verma', '2019-10-20 08:36:02.000000', '2019-10-20 03:06:02.127531'),
(14, 'stefen hawkins', '2019-10-23 16:41:59.000000', '2019-10-23 11:18:23.000000'),
(16, 'albert einstine', '2019-10-23 16:47:25.000000', '2019-10-23 11:17:25.229482'),
(17, 'Yashwant Kanetkar', '2019-11-03 17:51:16.000000', '2019-11-03 12:30:52.000000');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `ISBN` int(6) NOT NULL,
  `bookName` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `price` float DEFAULT '0',
  `author` varchar(100) NOT NULL,
  `book_added_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `book_updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status` enum('issued','available','requested') NOT NULL DEFAULT 'available',
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `bookName`, `category`, `price`, `author`, `book_added_at`, `book_updated_at`, `status`) VALUES
(1234, ' Engineering Mathemtics ', 'engineering ', 300, 'stefen hawkins', '2019-10-23 11:08:58.000000', '2019-11-03 12:34:38.000000', 'available'),
(3456, 'Mechanics', 'engineering', 500, 'HC verma', '2019-10-23 11:28:51.000000', '2019-10-23 11:28:51.336127', 'issued'),
(6789, '  Let Us C  ', 'engineering  ', 400, 'Yashwant Kanetkar', '2019-11-03 12:20:44.000000', '2019-11-03 12:32:38.000000', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

DROP TABLE IF EXISTS `book_request`;
CREATE TABLE IF NOT EXISTS `book_request` (
  `request_id` int(6) NOT NULL AUTO_INCREMENT,
  `student_id` int(6) NOT NULL,
  `ISBN` int(6) NOT NULL,
  `request_made_on` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `request_processed_on` datetime DEFAULT NULL,
  `status` enum('pending','processed') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_request`
--

INSERT INTO `book_request` (`request_id`, `student_id`, `ISBN`, `request_made_on`, `request_processed_on`, `status`) VALUES
(1, 2, 3456, '2019-11-03 11:43:36.123581', NULL, 'processed'),
(2, 2, 1234, '2019-11-03 11:43:41.007113', NULL, 'processed'),
(3, 1, 3456, '2019-11-03 12:16:59.108781', NULL, 'processed'),
(4, 1, 1234, '2019-11-03 12:17:06.597714', '2019-11-03 17:49:26', 'processed');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(6) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `added_at` timestamp(6) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `added_at`, `updated_at`, `status`) VALUES
(1, 'engineering', '0000-00-00 00:00:00.000000', '2019-10-21 03:08:11.805928', 'active'),
(2, 'science', '0000-00-00 00:00:00.000000', '2019-10-21 03:08:11.805928', 'active'),
(3, 'medical', '0000-00-00 00:00:00.000000', '2019-10-21 03:08:11.805928', 'active'),
(7, 'this cat', '2019-10-21 18:09:27.000000', '2019-10-23 11:19:31.000000', 'active'),
(6, 'new cat', '2019-10-21 03:24:48.000000', '2019-10-21 18:55:50.000000', 'active'),
(9, 'literature', '2019-10-23 11:19:20.000000', '2019-10-23 11:19:20.619440', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

DROP TABLE IF EXISTS `issued_books`;
CREATE TABLE IF NOT EXISTS `issued_books` (
  `iss_book_id` int(6) NOT NULL AUTO_INCREMENT,
  `student_id` int(6) NOT NULL,
  `ISBN` int(6) NOT NULL,
  `status` enum('issued','returned') NOT NULL DEFAULT 'issued',
  `issued_on` timestamp(6) NOT NULL,
  `return_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `fine` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iss_book_id`),
  KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`iss_book_id`, `student_id`, `ISBN`, `status`, `issued_on`, `return_date`, `fine`) VALUES
(1, 1, 1234, 'returned', '2019-10-23 11:09:16.000000', '2019-11-22 18:30:00.000000', 0),
(2, 2, 1234, 'returned', '2019-10-23 11:10:14.000000', '2019-11-22 18:30:00.000000', 0),
(3, 1, 1234, 'returned', '2019-10-23 11:25:28.000000', '2019-11-22 18:30:00.000000', 0),
(4, 2, 3456, 'returned', '2019-10-23 11:29:04.000000', '2019-11-22 18:30:00.000000', 0),
(5, 2, 3456, 'returned', '2019-11-03 12:06:19.000000', '2019-12-02 18:30:00.000000', 0),
(6, 2, 3456, 'returned', '2019-11-03 12:14:01.000000', '2019-12-02 18:30:00.000000', 0),
(7, 2, 3456, 'returned', '2019-11-03 12:14:52.000000', '2019-12-02 18:30:00.000000', 0),
(8, 2, 1234, 'returned', '2019-11-03 12:14:56.000000', '2019-12-02 18:30:00.000000', 0),
(9, 1, 3456, 'issued', '2019-11-03 12:17:40.000000', '2019-12-02 18:30:00.000000', 0),
(10, 1, 1234, 'returned', '2019-11-03 12:19:26.000000', '2019-12-02 18:30:00.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(6) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobileno` bigint(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` enum('active','pending','blocked') NOT NULL DEFAULT 'pending',
  `added_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `fullname`, `email`, `mobileno`, `password`, `status`, `added_at`, `updated_at`) VALUES
(1, 'Aniket Singh', 'aniketsingh12899@gmail.com', 8127824276, '1234', 'active', '2019-10-15 18:20:18.000000', '2019-10-23 12:01:26'),
(2, 'Aniket Singh', 'aniketsingh1289@gmail.com', 8127824276, '12345', 'active', '2019-10-16 08:59:00.000000', '2019-11-03 11:40:20'),
(3, 'Aniket singh', 'aniketsingh199@gmail.com', 8127824276, '1234', 'active', '2019-10-16 09:43:27.000000', '2019-10-22 03:08:28'),
(4, 'Aniket singh', 'aniketsingh128@gmail.com', 8127824276, '1234', 'active', '2019-10-16 09:47:12.000000', '2019-10-22 03:08:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
