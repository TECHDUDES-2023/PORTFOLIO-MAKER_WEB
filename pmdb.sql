-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 04:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `firstname`, `lastname`, `email`, `password`, `code`, `status`) VALUES
(2, 'Admin', 'Maker', 'arangorin.paul.bscs2020@gmail.com', '$2y$10$Tb0GNel0/sdr8He4nqmnC.dH1LWq7U3VHAJnLok4V6XpjEcWzGrCO', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `folder` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `data_one` text NOT NULL,
  `data_two` text NOT NULL,
  `data_three` text NOT NULL,
  `data_four` text NOT NULL,
  `data_five` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `folder`, `image`, `data_one`, `data_two`, `data_three`, `data_four`, `data_five`) VALUES
(107, 66, 'Stimulus', '4456', 'stimulus.png', 'Paul`s Portfolio', 'Hello, I am Paul Arangorin', 'I am currently a Student at University of Caloocan City and I am the Software Engineer of Portfolio Maker', '', ''),
(108, 66, 'Noah', '3546', 'noah.png', 'Hi I`m Paul Arangorin', 'I`m the Software Engineer of Portfolio Maker', 'A little bit about Paul', 'Wala ok lang naman', 'Paul Adrien S. Arangorin'),
(109, 42, 'Noah', '3578', 'noah.png', 'Bscs Paul acc', 'multiple account testing', 'Testing testing', 'akjsdjkasdjkhsadjkasjdkasd TESTING', 'STJKSHDFJKASDJKASKOLEDJASDASDA');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` text NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `plan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `firstname`, `lastname`, `email`, `password`, `profile_image`, `code`, `status`, `plan`) VALUES
(21, 'Mary', 'Rose', 'marotpaqt@gmail.com', '$2y$10$u6vdMJ1Yx84L7WvpE1dygOvhYqKPJWF5fTit1PaoVMWyyH3jAc7Nq', '', 0, 'verified', ''),
(22, 'Joemen', 'Barrios', 'joemen.barrios@g', '$2y$10$gELYKU5SMzvZpGRe61LWp.cTdO2hammp20fZQcBCMWprH0LTSPDkW', '', 952462, 'notverified', ''),
(23, 'Joemen', 'Barrios', 'joemen.barrios@gmail.com', '$2y$10$AgZ34OWku2zhok//PaMaeOziYdX.cBHr/7sE58A3Z5KlV341AhSCq', '', 0, 'verified', ''),
(42, 'Paul', 'Arangorin', 'arangorin.paul.bscs2020@gmail.com', '$2y$10$BD9NEfNC52axzG3UYiDOLufxcFffktrd7/gIeDTYeQ/YcKkhGQb8C', 'https://lh3.googleusercontent.com/a/AGNmyxbvkuMZ2PUrJXxfloOeLmfQCIHskrAdhe5Xelge=s96-c', 0, 'verified', 'premium'),
(65, 'michael', 'pajerga', 'pajergam@gmail.com', '$2y$10$6p.MaIEquInr7YMigaR4huyCkriKwaR3xmbKvGOv/EvE9kEJZs8H.', '', 640058, 'notverified', ''),
(66, 'Paul', 'Arangorin', 'paularangorin2015@gmail.com', '$2y$10$Bb8Ka.NBVRGgUrTC7qZX4OKuOyMA6zbd8YMbf23J37zSi1f9H3InO', 'https://lh3.googleusercontent.com/a/AGNmyxa-4dd8J6UWEnKaLviKvAICuzLtvOyjmA9Fiiblyg=s96-c', 0, 'verified', 'free'),
(70, 'Portfolio', 'Maker', 'portfolio.maker.web@gmail.com', '$2y$10$0hTNILmD7NCtCglxqUaxAub8pxoyVhWuZ8qdIXHGgx9sIJDzbOqMC', '', 0, 'verified', 'free');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
