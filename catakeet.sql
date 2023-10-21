-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 03:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catakeet`
--

-- --------------------------------------------------------

--
-- Table structure for table `cycles`
--

CREATE TABLE `cycles` (
  `cycle_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `ph_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cycles`
--

INSERT INTO `cycles` (`cycle_id`, `created_at`, `ph_id`) VALUES
(18, '2022-12-01', 1),
(19, '2022-12-01', 3),
(20, '2022-12-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cycle_days`
--

CREATE TABLE `cycle_days` (
  `cycle_day` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `cycle_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cycle_days`
--

INSERT INTO `cycle_days` (`cycle_day`, `day_id`, `cycle_id`, `created_at`) VALUES
(83, 1, 18, '2022-12-01'),
(84, 1, 19, '2022-12-01'),
(85, 2, 19, '2022-12-01'),
(86, 2, 18, '2022-12-01'),
(87, 3, 18, '2022-12-01'),
(88, 1, 20, '2022-12-01'),
(89, 4, 18, '2022-12-01'),
(90, 2, 20, '2022-12-01'),
(91, 5, 18, '2022-12-01'),
(92, 6, 18, '2022-12-19'),
(93, 7, 18, '2022-12-20'),
(94, 8, 18, '2023-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `cycle_species`
--

CREATE TABLE `cycle_species` (
  `cycle_id` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `species_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`day_id`, `day_name`) VALUES
(1, 'first'),
(2, 'second'),
(3, 'Third'),
(4, 'Fourth'),
(5, 'Fifth'),
(6, 'Sixth'),
(7, 'Seventh'),
(8, 'Eighth'),
(9, 'Ninth'),
(10, 'Tenth'),
(11, 'Eleventh'),
(12, 'Twelfth'),
(13, 'Thirteenth'),
(14, 'Fourteenth'),
(15, 'Fifteenth'),
(16, 'Sixteenth'),
(17, 'Seventeenth'),
(18, 'Eighteenth'),
(19, 'Nineteenth'),
(20, 'Twentieth'),
(21, ' Twenty-First'),
(22, ' Twenty-second'),
(23, 'Twenty-Third'),
(24, 'Twenty-Fourth'),
(25, 'Twenty-Fifth'),
(26, 'Twenty-Sixth'),
(27, 'Twenty-Seventh'),
(28, 'Twenty-Eighth'),
(29, ' Twenty-Ninth'),
(30, 'Thirtieth'),
(31, 'Thirty-First'),
(32, 'Thirty-Second'),
(33, 'Thirty-Third'),
(34, 'Thirty-Fourth'),
(35, 'Thirty-Fifth'),
(36, 'Thirty-Sixth'),
(37, 'Thirty-Seventh'),
(38, 'Thirty-Eighth'),
(39, 'Thirty-Ninth'),
(40, 'Fortieth'),
(41, ' Forty-First'),
(42, 'Forty-Second'),
(43, 'Forty-Third'),
(44, 'Forty-Fourth'),
(45, 'Forty-Fifth');

-- --------------------------------------------------------

--
-- Table structure for table `day_deaths`
--

CREATE TABLE `day_deaths` (
  `cycle_day` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `mortality_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `day_vacciens`
--

CREATE TABLE `day_vacciens` (
  `cycle_day` int(11) NOT NULL,
  `vaccine_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day_vacciens`
--

INSERT INTO `day_vacciens` (`cycle_day`, `vaccine_id`) VALUES
(92, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nutrients`
--

CREATE TABLE `nutrients` (
  `nutrient_id` int(11) NOT NULL,
  `nutrient_name` varchar(255) NOT NULL,
  `nutrient_cat_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nutrients`
--

INSERT INTO `nutrients` (`nutrient_id`, `nutrient_name`, `nutrient_cat_id`, `unit_id`, `user_id`) VALUES
(1, 'pellets', 2, 4, 4),
(2, 'crumbles', 2, 4, 4),
(3, 'mash', 2, 4, 4),
(4, 'water', 1, 1, 4),
(5, 'test1', 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `nutrient_categories`
--

CREATE TABLE `nutrient_categories` (
  `nutrient_cat_id` int(11) NOT NULL,
  `nutrient_cat_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nutrient_categories`
--

INSERT INTO `nutrient_categories` (`nutrient_cat_id`, `nutrient_cat_name`, `user_id`) VALUES
(1, 'water', 4),
(2, 'Chicken feed', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nutrient_consumed`
--

CREATE TABLE `nutrient_consumed` (
  `cycle_day` int(11) NOT NULL,
  `nutrient_id` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nutrient_consumed`
--

INSERT INTO `nutrient_consumed` (`cycle_day`, `nutrient_id`, `amount`) VALUES
(92, 3, 47),
(94, 4, 123);

-- --------------------------------------------------------

--
-- Table structure for table `poultries_species`
--

CREATE TABLE `poultries_species` (
  `species_id` int(11) NOT NULL,
  `species_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poultries_species`
--

INSERT INTO `poultries_species` (`species_id`, `species_name`, `user_id`) VALUES
(1, 'catkot', 4),
(2, 'chiken', 4);

-- --------------------------------------------------------

--
-- Table structure for table `poultry_houses`
--

CREATE TABLE `poultry_houses` (
  `ph_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poultry_houses`
--

INSERT INTO `poultry_houses` (`ph_id`, `user_id`) VALUES
(1, 4),
(2, 6),
(3, 9),
(6, 12),
(12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_name`, `user_id`) VALUES
(1, 'mliter', 5),
(4, 'kilogram', 5),
(5, 'liter', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `is_admin`) VALUES
(4, 'nujoron', '123456', 0),
(5, 'mohamed', '4444', 0),
(6, 'eieshami', '0000', 0),
(9, 'bla', '5555', 0),
(10, 'admin', 'admin', 1),
(12, 'foow', '2222', 0),
(13, 'njnj', '45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(50) NOT NULL,
  `vaccine_dose` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccine_id`, `vaccine_name`, `vaccine_dose`, `user_id`) VALUES
(1, 'amoxicilline', '40 mg', 4),
(2, 'opc', '5g', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`cycle_id`),
  ADD KEY `ph_id` (`ph_id`);

--
-- Indexes for table `cycle_days`
--
ALTER TABLE `cycle_days`
  ADD PRIMARY KEY (`cycle_day`),
  ADD KEY `cycle_id` (`cycle_id`),
  ADD KEY `day_id` (`day_id`);

--
-- Indexes for table `cycle_species`
--
ALTER TABLE `cycle_species`
  ADD PRIMARY KEY (`cycle_id`,`species_id`),
  ADD KEY `species_id` (`species_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `day_deaths`
--
ALTER TABLE `day_deaths`
  ADD PRIMARY KEY (`cycle_day`,`species_id`),
  ADD KEY `species_id` (`species_id`);

--
-- Indexes for table `day_vacciens`
--
ALTER TABLE `day_vacciens`
  ADD PRIMARY KEY (`cycle_day`,`vaccine_id`),
  ADD KEY `vaccine_id` (`vaccine_id`);

--
-- Indexes for table `nutrients`
--
ALTER TABLE `nutrients`
  ADD PRIMARY KEY (`nutrient_id`),
  ADD KEY `nutrient_cat_id` (`nutrient_cat_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nutrient_categories`
--
ALTER TABLE `nutrient_categories`
  ADD PRIMARY KEY (`nutrient_cat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nutrient_consumed`
--
ALTER TABLE `nutrient_consumed`
  ADD PRIMARY KEY (`cycle_day`,`nutrient_id`),
  ADD KEY `nutrient_id` (`nutrient_id`);

--
-- Indexes for table `poultries_species`
--
ALTER TABLE `poultries_species`
  ADD PRIMARY KEY (`species_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `poultry_houses`
--
ALTER TABLE `poultry_houses`
  ADD PRIMARY KEY (`ph_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `unit_name` (`unit_name`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`vaccine_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cycles`
--
ALTER TABLE `cycles`
  MODIFY `cycle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cycle_days`
--
ALTER TABLE `cycle_days`
  MODIFY `cycle_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `nutrients`
--
ALTER TABLE `nutrients`
  MODIFY `nutrient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nutrient_categories`
--
ALTER TABLE `nutrient_categories`
  MODIFY `nutrient_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poultries_species`
--
ALTER TABLE `poultries_species`
  MODIFY `species_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cycles`
--
ALTER TABLE `cycles`
  ADD CONSTRAINT `cycles_ibfk_1` FOREIGN KEY (`ph_id`) REFERENCES `poultry_houses` (`ph_id`);

--
-- Constraints for table `cycle_days`
--
ALTER TABLE `cycle_days`
  ADD CONSTRAINT `cycle_days_ibfk_1` FOREIGN KEY (`cycle_id`) REFERENCES `cycles` (`cycle_id`),
  ADD CONSTRAINT `cycle_days_ibfk_2` FOREIGN KEY (`day_id`) REFERENCES `days` (`day_id`);

--
-- Constraints for table `cycle_species`
--
ALTER TABLE `cycle_species`
  ADD CONSTRAINT `cycle_species_ibfk_1` FOREIGN KEY (`cycle_id`) REFERENCES `cycles` (`cycle_id`),
  ADD CONSTRAINT `cycle_species_ibfk_2` FOREIGN KEY (`species_id`) REFERENCES `poultries_species` (`species_id`);

--
-- Constraints for table `day_deaths`
--
ALTER TABLE `day_deaths`
  ADD CONSTRAINT `day_deaths_ibfk_2` FOREIGN KEY (`species_id`) REFERENCES `poultries_species` (`species_id`),
  ADD CONSTRAINT `day_deaths_ibfk_3` FOREIGN KEY (`cycle_day`) REFERENCES `cycle_days` (`cycle_day`);

--
-- Constraints for table `day_vacciens`
--
ALTER TABLE `day_vacciens`
  ADD CONSTRAINT `day_vacciens_ibfk_1` FOREIGN KEY (`vaccine_id`) REFERENCES `vaccines` (`vaccine_id`),
  ADD CONSTRAINT `day_vacciens_ibfk_2` FOREIGN KEY (`cycle_day`) REFERENCES `cycle_days` (`cycle_day`);

--
-- Constraints for table `nutrients`
--
ALTER TABLE `nutrients`
  ADD CONSTRAINT `nutrients_ibfk_1` FOREIGN KEY (`nutrient_cat_id`) REFERENCES `nutrient_categories` (`nutrient_cat_id`),
  ADD CONSTRAINT `nutrients_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`),
  ADD CONSTRAINT `nutrients_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `nutrient_categories`
--
ALTER TABLE `nutrient_categories`
  ADD CONSTRAINT `nutrient_categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `nutrient_consumed`
--
ALTER TABLE `nutrient_consumed`
  ADD CONSTRAINT `nutrient_consumed_ibfk_1` FOREIGN KEY (`cycle_day`) REFERENCES `cycle_days` (`cycle_day`),
  ADD CONSTRAINT `nutrient_consumed_ibfk_2` FOREIGN KEY (`nutrient_id`) REFERENCES `nutrients` (`nutrient_id`);

--
-- Constraints for table `poultries_species`
--
ALTER TABLE `poultries_species`
  ADD CONSTRAINT `poultries_species_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `poultry_houses`
--
ALTER TABLE `poultry_houses`
  ADD CONSTRAINT `poultry_houses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD CONSTRAINT `vaccines_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
