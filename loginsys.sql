-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 02:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `createstore`
--

CREATE TABLE `createstore` (
  `sname` varchar(128) DEFAULT NULL,
  `susersname` varchar(128) DEFAULT NULL,
  `susersemail` varchar(128) DEFAULT NULL,
  `saddress` varchar(128) DEFAULT NULL,
  `sintro` varchar(128) DEFAULT NULL,
  `suserspwd` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `img_name` varchar(128) DEFAULT NULL,
  `usersid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`img_name`, `usersid`) VALUES
('63fa0ee337fd23.08007735.jpg', 1),
('6404b8b4c9ff23.86727286.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `outgoing_msg_id` int(11) NOT NULL,
  `msg` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1, 2, 'hi'),
(2, 2, 1, 'how r u'),
(3, 1, 2, 'hi'),
(4, 2, 1, 'hi'),
(5, 2, 1, 'hi\\\\'),
(6, 2, 1, 'oye'),
(7, 1, 2, 'hi'),
(8, 1, 2, 'fack u'),
(9, 2, 1, 'uhhh'),
(10, 2, 1, 'finally'),
(11, 3, 1, 'hi'),
(12, 2, 1, 'hello'),
(13, 2, 1, 'hi'),
(14, 2, 1, 'ayo'),
(15, 3, 1, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `users_id` int(11) NOT NULL,
  `profiles_name` varchar(128) DEFAULT NULL,
  `profiles_about` varchar(128) DEFAULT NULL,
  `profiles_introtitle` varchar(128) DEFAULT NULL,
  `profiles_introtext` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`users_id`, `profiles_name`, `profiles_about`, `profiles_introtitle`, `profiles_introtext`) VALUES
(1, 'Ahmad', 'i am ahmad', 'i am a student', 'wda0 ');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdreset_selector` varchar(128) DEFAULT NULL,
  `pwdreset_expires` int(11) NOT NULL,
  `pwdreset_token` varchar(128) NOT NULL,
  `pwdreset_email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pwdresetstore`
--

CREATE TABLE `pwdresetstore` (
  `pwdresetselectors` varchar(128) DEFAULT NULL,
  `pwdresetexpiress` int(11) NOT NULL,
  `pwdresettokens` varchar(128) DEFAULT NULL,
  `pwdreset_emails` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) DEFAULT NULL,
  `usersEmail` varchar(128) DEFAULT NULL,
  `usersUid` varchar(128) DEFAULT NULL,
  `usersPwd` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `fname`, `lname`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(1, 'Ahmad', 'Mujtaba', 'ahmadmujtabap70@gmail.com', 'Ahmadmujtaba', '$2y$10$Sm8v/qIBnfaxAoMeSqxsk.jduqm3f4U4pZVke4EuMSY73VF8fXVvW'),
(2, 'Jellio', 'Papa', 'ahmadmujtabap72@gmail.com', 'Unknown', '$2y$10$Ae8ve38Afll4fVtfN8199ewY8PRfTKfyEIGUjvBmKH2im.g0plxGu'),
(3, 'ahdaw', 'awdaw', 'ahmadsaeedp52@gmail.com', 'wadawdaw', '$2y$10$QFC68AP5kLrAP7vn6p11h.HJED5X7XlyIjZZkwDjN.wbQGvZ4nmx.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
