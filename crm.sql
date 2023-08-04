-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 04:55 PM
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
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

CREATE TABLE `customer_registration` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state_province` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `deposit` decimal(10,2) NOT NULL,
  `approval_status` int(11) NOT NULL,
  `account_number` varchar(10) DEFAULT NULL,
  `account_officer_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `country`, `state_province`, `number`, `date_of_birth`, `gender`, `deposit`, `approval_status`, `account_number`, `account_officer_name`) VALUES
(3, 'Olanipekun', 'Oluwafikayo', '+2348148413566', 'fikayopeter@gmail.com', 'Nigeria', 'Lagos', '123456789', '2015-06-23', 'male', '100000.00', 1, '1802347981', ''),
(4, 'Olanipekun', 'peter', '+2348148413566', 'fikayopeter@gmail.com', 'Nigeria', 'Lagos', '1234567890', '2022-04-07', 'male', '100000.00', 1, '7102382440', ''),
(5, 'Olanipekun', 'Oluwafikayo', '+2348148413566', 'fikayopeter@gmail.com', 'Nigeria', 'Lagos', '1234567890', '2022-04-07', 'male', '100000.00', 1, '6247724381', ''),
(6, 'beacon', 'dev', '08148413566', 'beacon.dev23@gmail.com', 'Niger', 'Lagos', '12345678', '2023-08-11', 'male', '100000.00', 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `category`, `image_path`, `comments`, `created_at`) VALUES
(1, 'wertyuio', 'asdfghjk', 'uploads/070fd456a2886b4bb6ad2ea183b7bf15.jpg', 'sxdfgvhujkl;.', '2023-08-03 03:47:56'),
(2, 'fghjkl;', 'fghjkl', 'uploads/25ce9d7ca0ae4ece9897a13294beb427.jpg', 'dfdgchjkl;', '2023-08-03 03:51:35'),
(3, 'qwertyui', 'dfgbhnjmk,', 'uploads/cfdd43b0cedd3591fd8f497decd16ed3.jpg', 'asrtrfyujiokolp', '2023-08-03 04:20:30'),
(4, 'wertyui', 'sfdgghjnjm', 'uploads/a4848addf39d61a059ee0e36aaca2819.png', 'adsfghjkl;', '2023-08-04 14:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` enum('Account Officer','Account Manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `account_type`) VALUES
(1, 'Olanipekun Oluwafikayo', 'fikayopeter@gmail.com', '$2y$10$KV0UfAGQE0ZN4HuhWLfZmOnsreZ/hr77JtDQLaPEQjerfVGoETSG6', 'Account Officer'),
(2, 'Olanipekun Oluwafikayo', 'fikayope@gmail.com', '$2y$10$QC4ERy8sj/MWvRrgfUqxeueaw.u2VS.uV8/gaW4GTR9qmWD.hO1HW', 'Account Officer'),
(3, 'Olanipekun Oluwafikayo', 'fikayo@gmail.com', '$2y$10$SBiPoco5HvCJGyIRnDmsuuuvpof0JpEW86BCO3EbV5WPbLTP9WvMy', 'Account Manager'),
(4, 'Olanipekun Oluwafikayo', 'fikay@gmail.com', '$2y$10$I7RFFEaiNeuPoSDqkIzsd.Pzg9SRDOWoz1M8trQulMiAAjoBiZWaG', 'Account Officer'),
(5, 'Olanipekun Oluwafikayo', 'fikayoe@gmail.com', '$2y$10$OcztH5vAAiSR5eK1KNy1O.q.QygSPheK//N6VvtClY3gbCrj2yHcW', 'Account Officer'),
(6, 'Olanipekun Oluwafikayo', 'fik@gmail.com', '$2y$10$CPS5Bg2.ms8vzTrWc5ibouH7GCpIyt0QHQeMva7xQKfDBJKGPWy4K', 'Account Officer'),
(7, 'Olanipekun Oluwafikayo', 'fi@gmail.com', '$2y$10$S/u7xRSsKX7jOmD7JNAF4e0tKUC4BeJTgXuxoYZ0uPoqiZvURZ5pm', 'Account Manager'),
(8, 'fik', 'fikaopr@gmail.com', '$2y$10$AemttoB/MaqZNj1DdH5PhOrj0l/1DJ50fnbqsrkSq2VMtyHo4ZlIu', 'Account Officer'),
(9, 'fik', 'fikaor@gmail.com', '$2y$10$jQlpVMff8SQwgblYXRuaPesPo0vPI86yF4mQ1Yzjtq0uNUi7FhqPu', 'Account Manager'),
(10, 'admin', 'fikr@gmail.com', '$2y$10$SBiPoco5HvCJGyIRnDmsuuuvpof0JpEW86BCO3EbV5WPbLTP9WvMy', 'Account Officer'),
(11, 'Olanipekun Oluwafikayo', 'fikayopeter@gmail.com', '$2y$10$x3te2o.VRVqhV6Z.klmSvOLRAYPk9ZQYslqXPkT9T8TQtldS.R7Am', 'Account Officer'),
(12, 'Oyinsanmi ', 'oyinsanmipeter@gmail.com', '$2y$10$e4AAQZbSEBtXDtZ9YWpAJe1OMEuCVWt1Evo0/ziMTKc0hqc0ny8Ye', 'Account Manager'),
(13, 'olanre', 'fikayopeter@gmail.com', '$2y$10$uFWYU31hJMMQDPQlIzXkDeS/OiySNq8mlzLKuccgE1lTnZCjpAGhS', 'Account Officer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
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
-- AUTO_INCREMENT for table `customer_registration`
--
ALTER TABLE `customer_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
