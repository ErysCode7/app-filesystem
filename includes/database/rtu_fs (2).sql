-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 07, 2023 at 01:52 PM
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
(8, 'Erys', 'username', '$2y$10$.ZaVNLOz9IGCZL3rgvF.Jujxvi7J5eFjN.5x7YiUb8jFJiLByPJEq'),
(9, 'Erys', 'admin_one', '$2y$10$Fvu7ELxCSdvOFjSEIMCrHu6SZwPGJhzhLKuNfVzJEctMF6VAb3RTK');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `troup_id` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `event_title` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  `schedule` date DEFAULT NULL,
  `banner_img` varchar(255) DEFAULT NULL,
  `troupe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `troup_id`, `event`, `event_title`, `description`, `time`, `schedule`, `banner_img`, `troupe`) VALUES
(18, 1, 'Pasig City', 'Sustainability Summit', 'The Sustainability Summit is a conference aimed at promoting sustainability practices and policies in various industries. The summit will bring together experts, thought leaders, and innovators to share their insights and experiences on sustainability topics such as climate change, renewable energy, waste management, and conservation. The event will feature keynote speeches, panel discussions, and networking opportunities for attendees to connect and collaborate on sustainability initiatives.', '15:00', '2023-03-11', NULL, 'Dulaang Rizalia'),
(19, 2, 'Taguig City', 'Women in Leadership Conference', 'The Women in Leadership Conference is a gathering of accomplished female leaders and aspiring professionals from diverse industries. The conference aims to inspire, empower, and equip women with the skills and knowledge they need to advance their careers and become effective leaders. The event will feature keynote speakers, interactive workshops, and networking sessions that will provide attendees with practical tools, insights, and strategies for success.', '15:00', '2023-02-07', NULL, 'Sining Biswal'),
(20, 2, 'Pasig City', 'Health Fair', 'The Health and Wellness Fair is an event aimed at promoting healthy lifestyles and wellness practices. The fair will feature exhibitors from various industries, including healthcare, fitness, nutrition, and mental health. Attendees will have the opportunity to attend workshops and presentations on topics such as stress management, healthy eating, exercise, and meditation. ', '10:00', '2023-08-07', NULL, 'Sining Biswal'),
(21, 2, 'Mandaluyong City', 'Health Awareness Program', 'Health Awareness Program is to help young individuals manage their help overall the people.', '14:00', '2023-06-07', NULL, 'Sining Biswal');

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
(2035, 5, '2019-201175', 'Rejilyn', 'Bohol', 'Kultura Rizalia', '09198332197', '', 0, '1999-06-23', '2019', '22 Paranaque City', 'active', '', '', '', '', '', ''),
(2036, 2, '2018-206313', 'Marco', 'Cruz', 'Sining Biswal', '09112432797', '', 0, '1999-03-11', '', '22 Pasig City', 'active', '', '', '', '', '', ''),
(2037, 3, '2018-226809', 'Aeriel', 'Cruz', 'Tunog Rizalia Rondalla', '', 'BSIT', 0, '2000-02-03', '', '', 'alumni', '', '', '', '', '', ''),
(2038, 2038, '2018-207539', 'Zedrick', 'Laranan', 'Dulaang Rizalia', '09187322197', '', 0, '1999-02-12', '', '', 'alumni', '', '', '', '', '', ''),
(2040, 0, '2018-201163', 'Jay', 'Ramos', 'Dulaang Rizalia', '09672133797', 'BSIT', 2018, '1999-12-24', '2019', '177 I. Lopez Street Baranggay Poblacion Taguig City', 'alumni', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `troupes`
--

CREATE TABLE `troupes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `troupes`
--

INSERT INTO `troupes` (`id`, `name`, `title`, `description`, `adviser`) VALUES
(1, 'Dulaang Rizalia', '', '', ''),
(2, 'Sining Biswal', '', '', ''),
(3, 'Tunog Rizalia Rondalla', '', '', ''),
(4, 'Himig Rizalia', '', '', ''),
(5, 'Kultura Rizalia', '', '', '');

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
  ADD KEY `events_ibfk_1` (`troup_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2048;

--
-- AUTO_INCREMENT for table `troupes`
--
ALTER TABLE `troupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`troup_id`) REFERENCES `troupes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
