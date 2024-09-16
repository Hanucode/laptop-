-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 07:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php.project`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(12) NOT NULL,
  `user_type` varchar(12) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(5, 'A', 'h@gamil.com', '1', 'user'),
(11, 'admin', 'admin@gamil.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mobile.no` varchar(12) NOT NULL,
  `issued-date` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `loction` varchar(100) NOT NULL,
  `emplye-id` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `asset_id` varchar(30) NOT NULL,
  `departement` varchar(90) NOT NULL,
  `divies` varchar(80) NOT NULL,
  `brand` varchar(80) NOT NULL,
  `processor` varchar(80) NOT NULL,
  `pod` date NOT NULL,
  `ram` varchar(80) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile.no`, `issued-date`, `gender`, `loction`, `emplye-id`, `status`, `asset_id`, `departement`, `divies`, `brand`, `processor`, `pod`, `ram`, `price`) VALUES
(3, 'abc', 'abc@gamil.com', '7018584903', '2024-08-28', 'male', 'J&k', '3243', 'Married', '23434', '2433', 'Computer', 'hp', 'i3', '2024-07-29', '3', 'r'),
(5, 'Hanu', 'Hanu@gamil.com', '7018584903', '2024-08-30', 'male', 'Chandighar', '32223', 'Married', '234234', '32423', 'Computer', '342234', '234234', '0023-04-23', '23423', '2342'),
(6, 'Admin', 'admin@gamil.com', '8894073220', '2024-08-07', 'male', 'Chandighar', '234234', 'Married', '423', '432423', 'Computer', '4324', '324324', '0234-04-23', '4234', '234'),
(7, 'ewr', 'rahul@gamil.com', '8894073220', '0234-04-23', 'male', 'Hoshiarpur', '23423', 'Divorced', '234', '423', 'Mobile', '324234', '23432432', '3432-02-04', '423', '423');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
