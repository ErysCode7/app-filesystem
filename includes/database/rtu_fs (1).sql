-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 27, 2023 at 11:45 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtu_fs`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `username`, `password`) VALUES
(1, 'Erys', 'admin', '$2y$12$yjn.g4FtUoXrOqqNMka/Mu/4tq7Brp7Q.aAILGCrjpw.iHKas/uC.'),
(4, 'asd', 'sample', '$2y$10$6muFOVGR8Bt.831oyutrYeoXJ6gH11xKzc4uU71rvgPGnEoTx3PHq'),
(5, 'aldrin', 'aldrin', '$2y$10$/PLBI21jW86CQWppdgP65uVIhmZASSj8DeG41tc6lL3Fouay5Mmd2');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `troup_id` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `description` varchar(80) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  `schedule` date DEFAULT NULL,
  `banner_img` varchar(255) DEFAULT NULL,
  `troupe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `troup_id`, `event`, `event_title`, `description`, `time`, `schedule`, `banner_img`, `troupe`) VALUES
(10, 1, 'Taguig City', 'Ttile', 'My heart which is the way of typing speed of the cause My heart which is', '5:30 AM', '2022-10-06', NULL, 'Dulaang Rizalia'),
(15, 4, 'Taguig City', 'bro', 'asdasd', '14:22', '0000-00-00', NULL, 'Himig Rizalia');

-- --------------------------------------------------------

--
-- Table structure for table `events_image`
--

CREATE TABLE `events_image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_directory` varchar(255) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members_image`
--

CREATE TABLE `members_image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_directory` varchar(255) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members_permanent_records`
--

CREATE TABLE `members_permanent_records` (
  `id` int(11) NOT NULL,
  `troup_id` int(11) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `troupe` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `curriculum_year` int(255) DEFAULT NULL,
  `birthday` date NOT NULL,
  `date_of_membership` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `active_status` varchar(255) NOT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `fathers_occupation` varchar(255) DEFAULT NULL,
  `fathers_phone_number` varchar(255) DEFAULT NULL,
  `mothers_name` varchar(255) DEFAULT NULL,
  `mothers_occupation` varchar(255) DEFAULT NULL,
  `mothers_phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members_permanent_records`
--

INSERT INTO `members_permanent_records` (`id`, `troup_id`, `student_number`, `first_name`, `last_name`, `troupe`, `contact_number`, `course`, `curriculum_year`, `birthday`, `date_of_membership`, `address`, `active_status`, `fathers_name`, `fathers_occupation`, `fathers_phone_number`, `mothers_name`, `mothers_occupation`, `mothers_phone_number`) VALUES
(1, 1, '2018-205404', 'Aeriel', 'Cruz', 'Dulaang Rizal', '09323715302', 'BS-INFORMATION-TECHNOLOGY', 2018, '1999-11-19', '', '177 I. Lopez Street Baranggay Poblacion Mandaluyong City', 'active', 'Ariel Cruz', 'Security Guard', '09485176599', 'Jocelyn Cruz', 'Housewife', '09475176599'),
(2, 5, 'asd', 'asd', 'asdasdasd', 'Kultura Rizalia', '', '', 0, '0000-00-00', '', '', 'active', '', '', '', '', '', ''),
(2033, 1, '23', 'asd', '', 'Dulaang Rizalia', '', '', NULL, '0000-00-00', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(2034, 2, 'asd', 'asd', 'asdasdasd', 'Sining Biswal', '', '', 0, '0000-00-00', '', '', 'quit', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `troupes`
--

CREATE TABLE `troupes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `troupes`
--

INSERT INTO `troupes` (`id`, `name`) VALUES
(1, 'Dulaang Rizalia'),
(2, 'Sining Biswal'),
(3, 'Tunog Rizalia Rondalla'),
(4, 'Himig Rizalia'),
(5, 'Kultura Rizalia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `troup_id` (`troup_id`);

--
-- Indexes for table `events_image`
--
ALTER TABLE `events_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_image`
--
ALTER TABLE `members_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_permanent_records`
--
ALTER TABLE `members_permanent_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `troup_id` (`troup_id`);

--
-- Indexes for table `troupes`
--
ALTER TABLE `troupes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `events_image`
--
ALTER TABLE `events_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members_image`
--
ALTER TABLE `members_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `members_permanent_records`
--
ALTER TABLE `members_permanent_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2035;

--
-- AUTO_INCREMENT for table `troupes`
--
ALTER TABLE `troupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`troup_id`) REFERENCES `troupes` (`id`);

--
-- Constraints for table `members_permanent_records`
--
ALTER TABLE `members_permanent_records`
  ADD CONSTRAINT `troup_id` FOREIGN KEY (`troup_id`) REFERENCES `troupes` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
