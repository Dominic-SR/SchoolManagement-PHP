-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 07:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `choice_id` int(11) NOT NULL,
  `choice` varchar(250) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_question`
--

CREATE TABLE `master_question` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_question`
--

INSERT INTO `master_question` (`question_type_id`, `question_type`) VALUES
(1, 'Lable'),
(2, 'Text'),
(3, 'Table'),
(4, 'Link'),
(5, 'Image'),
(6, 'Statement'),
(7, 'Single Choice'),
(8, 'Multiple Choice'),
(9, 'True or False');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `title_of_question` varchar(250) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `x_key` int(11) NOT NULL,
  `y_key` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `title_of_question`, `question_type_id`, `document_id`, `start_time`, `x_key`, `y_key`, `created_at`, `updated_at`) VALUES
(1, '', 0, 0, '0000-00-00 00:00:00', 0, 0, '2023-07-29', '2023-07-29'),
(2, 'Earth is our home !', 1, 22, '0000-00-00 00:00:00', 167, -101, '2023-07-29', '2023-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `question_document`
--

CREATE TABLE `question_document` (
  `document_id` int(11) NOT NULL,
  `document` varchar(250) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_document`
--

INSERT INTO `question_document` (`document_id`, `document`, `created_at`, `updated_at`) VALUES
(1, '000.mp4', '2023-07-29', '2023-07-29'),
(2, '000.mp4', '2023-07-29', '2023-07-29'),
(3, '000.mp4', '2023-07-29', '2023-07-29'),
(4, '000.mp4', '2023-07-29', '2023-07-29'),
(5, '000.mp4', '2023-07-29', '2023-07-29'),
(6, '000.mp4', '2023-07-29', '2023-07-29'),
(7, '000.mp4', '2023-07-29', '2023-07-29'),
(8, '000.mp4', '2023-07-29', '2023-07-29'),
(9, '000.mp4', '2023-07-29', '2023-07-29'),
(10, '000.mp4', '2023-07-29', '2023-07-29'),
(11, '000.mp4', '2023-07-29', '2023-07-29'),
(12, '000.mp4', '2023-07-29', '2023-07-29'),
(13, '000.mp4', '2023-07-29', '2023-07-29'),
(14, '000.mp4', '2023-07-29', '2023-07-29'),
(15, '000.mp4', '2023-07-29', '2023-07-29'),
(16, '000.mp4', '2023-07-29', '2023-07-29'),
(17, '000.mp4', '2023-07-29', '2023-07-29'),
(18, '000.mp4', '2023-07-29', '2023-07-29'),
(19, '000.mp4', '2023-07-29', '2023-07-29'),
(20, '000.mp4', '2023-07-29', '2023-07-29'),
(21, '000.mp4', '2023-07-29', '2023-07-29'),
(22, '000.mp4', '2023-07-29', '2023-07-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`choice_id`);

--
-- Indexes for table `master_question`
--
ALTER TABLE `master_question`
  ADD PRIMARY KEY (`question_type_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `question_document`
--
ALTER TABLE `question_document`
  ADD PRIMARY KEY (`document_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_question`
--
ALTER TABLE `master_question`
  MODIFY `question_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_document`
--
ALTER TABLE `question_document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
