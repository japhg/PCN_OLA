-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 10:08 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr1`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_tbl`
--

CREATE TABLE `applicant_tbl` (
  `id` varchar(6) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `states` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `date_applied` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant_tbl`
--

INSERT INTO `applicant_tbl` (`id`, `email_address`, `password`, `firstname`, `middlename`, `lastname`, `gender`, `age`, `mobile_number`, `birthday`, `birthplace`, `street`, `barangay`, `city`, `states`, `zip`, `date_applied`) VALUES
('A00001', 'jpgomera19@gmail.com', '$2y$10$QM0t8jrAvapxA/SnR5ClX.CsaqJ.EufkaWFvVQYC2/sn/GIzGXFue', 'James Philip', 'Amante', 'Gomera', 'Male', 21, '09101465183', '2001-06-19', 'Novaliches, Quezon City', '#27 Lumayno Apartment, Bansalangin St.', 'Barangay Payatas', 'Quezon City', 'Metropolitan Manila, Philippines', '1119', '2022-12-30 06:32:12'),
('A00002', 'test@gmail.com', '$2y$10$KYAQDI2/1UsFEORyuMCz7Orvu7HK8GbJD/6Hckg2hP8UTMrJwp6Xy', 'test', 'test', 'test', 'Male', 21, '09101465183', '2000-10-01', 'test', 'teste', 'test', 'test', 'test', '12345', '2022-12-30 06:32:12'),
('A00003', 'test@dsadas', '$2y$10$QGjeQRrDLNjysUwOT0HjM.ncC7s/AP59Ap9Ipyeb4JrHlcNfQXyua', 'asdasdasd', 'asdad', 'asdasd', 'Male', 23, '12312312312', '0023-12-31', '1231231', '23123123', '123123', '12312', '3123123', '123123', '2022-12-30 06:32:12'),
('A00004', 'test@yahoo.com', '$2y$10$tZnhvyQptjdFuNein5Dx1uRcbCdJmPzFtXqxouYLG3NUnX4wZsk8e', 'asdasd', 'asdasd', 'adadas', 'Male', 123, '123123123', '0123-12-31', '123123', '1231231', '3123122', '3123', '12312312', '312312312', '2022-12-30 10:35:32'),
('A00005', 'reyangelotalap@gmail.com', '$2y$10$eNOYu0EsOdvly3lDf7DwreKGDeoCyMYSEgxV1.ANw6/UmfNCwQlBy', 'Rey Angelo', 'Null', 'Talap', 'Male', 22, '09123456789', '2001-04-24', 'Caloocan', 'asdasd', 'Barangay Payatas B', 'Quezon City', 'Metropolitan Manila, Philippines', '1119', '2023-01-05 11:31:47'),
('A00006', 'jphigomera19@gmail.com', '$2y$10$nniEyISoKeUuOlk/glajKuq1xLkAreY.l1ERwmNweHqeWBBZbQF1a', 'James Philip', 'Amante', 'Gomera', 'Male', 21, '09101465183', '2001-06-19', 'Novaliches, Quezon City', '#27 Lumayno Apartment, Bansalangin St.', 'Barangay Payatas', 'Quezon City', 'Metropolitan Manila, Philippines', '1119', '2023-01-06 15:42:21'),
('A00007', 'reyangelotalap23@gmail.com', '$2y$10$2vXMSVStWNtb4I8Cw2m3f.H7IIbT1RnmEpGRN5ZV5ssbAMJ9QlzGm', 'Rey Angelo', 'Null', 'Talap', 'Male', 21, '09123456789', '2001-04-28', 'Maligaya, Caloocan', 'asdasdasd', 'asdasd', 'asdasd', 'asdasd', '123245', '2023-01-06 16:06:39'),
('A00008', 'applicant@gmail.com', '$2y$10$d4PTUbG.Kdki/AZVrlSKFOK2cboS55Sv4yUbmTgaWzbM6rkr9usTi', 'Applicant', 'Applicant', 'Applicant', 'Male', 21, '09123456789', '2002-06-19', 'Novaliches', 'MEma', 'Emasdm', 'ijdasoijaiosd', 'jioisjdiaosjd1', '1554', '2023-01-17 13:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email_address`, `code`, `expire`) VALUES
(0, 'jpgomera19@gmail.com', '52099', 1673017395),
(0, 'jphigomera19@gmail.com', '23707', 1673017987),
(0, 'jphigomera19@gmail.com', '36396', 1673019544),
(0, 'jphigomera19@gmail.com', '64057', 1673019952),
(0, 'jphigomera19@gmail.com', '93841', 1673020171),
(0, 'jphigomera19@gmail.com', '33684', 1673020394),
(0, 'jphigomera19@gmail.com', '80791', 1673020555),
(0, 'jphigomera19@gmail.com', '35385', 1673020838),
(0, 'reyangelotalap23@gmail.com', '31112', 1673021395),
(0, 'jpgomera19@gmail.com', '64091', 1673067162),
(0, 'jpgomera19@gmail.com', '28633', 1673067245),
(0, 'jpgomera19@gmail.com', '90886', 1673067877),
(0, 'jpgomera19@gmail.com', '28080', 1673067935),
(0, 'jphigomera19@gmail.com', '91622', 1673068467),
(0, 'jphigomera19@gmail.com', '23318', 1673107828);

-- --------------------------------------------------------

--
-- Table structure for table `email_tbl`
--

CREATE TABLE `email_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(400) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `member_since` datetime NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_tbl`
--

INSERT INTO `email_tbl` (`id`, `username`, `email`, `password`, `ip`, `member_since`, `city`, `country`) VALUES
(1, 'jpgomera19', 'jpgomera19@gmail.com', 'anggwapoko123456', 'null', '0000-00-00 00:00:00', 'null', 'null'),
(2, 'jphigomera', 'jphigomera19@gmail.com', 'test12345', 'asdasd', '0000-00-00 00:00:00', 'asdas', 'sdaasd'),
(3, 'eyygelo', 'reyangelotalap23@gmail.com', 'test123', 'asdad', '2022-12-09 00:00:00', 'asd', 'asd'),
(4, 'Japz', 'johnandreipernito11@gmail.com', 'test123', 'sadsd', '2022-12-09 13:51:35', 'asdadas', 'sadasdas'),
(5, 'regine', 'reginegalanaga97@gmail.com\r\n', 'test123', 'asdasd', '2022-12-09 14:10:22', 'asdasd', 'asdas'),
(6, 'Jhona', 'lazarojhonavel@gmail.com', 'test123', 'asdasd', '2022-12-09 14:14:58', 'asdasd', 'asdasd'),
(7, 'werwer', 'jphigomera19@yahoo.com', 'test123', '3123123', '2022-12-09 20:43:01', '123123123', '213123');

-- --------------------------------------------------------

--
-- Table structure for table `employer_tbl`
--

CREATE TABLE `employer_tbl` (
  `id` int(11) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `e_profile` varchar(500) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer_tbl`
--

INSERT INTO `employer_tbl` (`id`, `email_address`, `password`, `firstname`, `middlename`, `lastname`, `contact_number`, `companyName`, `street`, `barangay`, `city`, `state`, `description`, `verify_token`, `verify_status`, `e_profile`, `date_joined`) VALUES
(4, 'jpgomera19@gmail.com', '$2y$10$4d9Wxh.T.oSoqb2Kxr9qau9dv9jWKjJ2W3t/MCIpFyTVZE2mNfMRC', 'James Philip', 'Amante', 'Gomera', '09101465183', 'Jollibee Foods Corporation', 'Regalado Ave.', 'Barangay Fairview', 'Quezon City', 'Metropolitan Manila, Philippines', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lore', '', 0, '316247921_1246204679289795_4169196112671408592_n.jpg', '2023-01-13 17:02:27'),
(5, 'reyangelotalap23@gmail.com', '$2y$10$S/Ta6w6fAnCYXUgAunG2E.qZjN1h1QP7uWcofO5Sf.9KZ/mejeJku', 'Rey Angelo', 'Angelo', 'Talap', '09123456789', 'Blue Oak Ridge Academy Inc.', 'Saksakan St. Swerte Makailag Extension', 'Barangay Tugatog', 'Marawi City', 'Mindanao', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem', '', 0, '325253103_1352021252265961_9000589685823354610_n.jpg', '2023-01-13 20:55:34'),
(9, 'jonhandreipernito@gmail.com', '$2y$10$AIgIkRZev4A080xZPlxwBOmz5Kfn7JX1GD0g1vfOXGLf495BQiovG', 'John Andrei', 'Alcantara', 'Pernito', '09123456798', 'McDonalds Food Inc.', 'Tumbong St.', 'Barangay Bagumbong', 'Valenzuela City', 'Metropolitan Manila, Philippines', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem', '', 0, '307993418_1170898090448688_2160080115147782767_n.jpg', '2023-01-15 16:16:59'),
(10, 'employer@gmail.com', '$2y$10$TqqXV1kiezYYWW6tHhK6ae/.MBxEHzumVtkrKg4IQDY.z2ML/7ZMu', 'Levi', 'Amante', 'Gomera', '09123456789', 'Cat Food Inc', '#27 Lumayno Apartment, Bansalangin St.', 'Barangay Payatas', 'Quezon City', 'Metropolitan Manila, Philippines', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem', '', 0, 'defaultProfile.png', '2023-01-15 16:19:17'),
(15, 'jphigomera19@gmail.com', '$2y$10$pjx2SHnIHj0mVbIBE8cVJ.UAzYNUdjGiw52SMNLu4hZkUKicFoKLW', 'James Philip', 'Amante', 'Gomera', '09101465183', 'Philip Company', '#27 Lumayno Apartment, Bansalangin St.', 'Barangay Payatas', 'Quezon City', 'Metropolitan Manila, Philippines', 'Lorem$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();$errors = array();', 'e96ffa8218737f01ba53ac8522bfb8f1', 1, 'defaultProfile.png', '2023-01-23 07:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `job_tbl`
--

CREATE TABLE `job_tbl` (
  `job_id` int(11) UNSIGNED NOT NULL,
  `empr_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `years` varchar(255) NOT NULL,
  `skills` varchar(1000) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `benefits` varchar(1500) NOT NULL,
  `jobDescription` varchar(3000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_tbl`
--

INSERT INTO `job_tbl` (`job_id`, `empr_id`, `title`, `type`, `years`, `skills`, `salary`, `benefits`, `jobDescription`, `image`, `status`, `date_posted`) VALUES
(2, 5, 'Computer Technician', 'FULL TIME', 'At least 3 Years of Experience', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lor', '50k per Month', 'Lorem Lorem Lorem Lorem Lorem', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem ', 'ee4dce1061f3f616224767ad58cb2fc751b8d2dc.jpg', 'ACTIVE', '2023-01-13 20:56:54'),
(3, 5, 'Financial Administrator', 'FULL TIME', '6 Years and Above', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lor', '75k Per Month', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lor', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem ', '325422884_859661158480846_9124831100508296648_n.png', 'ACTIVE', '2023-01-13 21:00:58'),
(7, 4, 'CASHIER', 'PART TIME', '1 year and above', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lor', '475 per day', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem ', 'asdawdsadw.png', 'ACTIVE', '2023-01-16 12:14:08'),
(8, 4, 'MANAGER', 'FULL TIME', '3 years and above', 'LoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLorem', '510 per day', 'LoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLorem', 'LoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLorem', 'asdawdsadw.png', 'ACTIVE', '2023-01-16 12:15:57'),
(9, 4, 'SINGER', 'CONTRACT', 'As long as you know how to sing', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lor', '50k', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lor', 'Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem ', 'flowers_background_flat_violet_design_6833123.jpg', 'ACTIVE', '2023-01-21 04:07:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_tbl`
--
ALTER TABLE `applicant_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_tbl`
--
ALTER TABLE `email_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_tbl`
--
ALTER TABLE `employer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_tbl`
--
ALTER TABLE `job_tbl`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `empr_id` (`empr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_tbl`
--
ALTER TABLE `email_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employer_tbl`
--
ALTER TABLE `employer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `job_tbl`
--
ALTER TABLE `job_tbl`
  MODIFY `job_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_tbl`
--
ALTER TABLE `job_tbl`
  ADD CONSTRAINT `job_tbl_ibfk_1` FOREIGN KEY (`empr_id`) REFERENCES `employer_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
