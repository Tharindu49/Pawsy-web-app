-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 06:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Rabbit'),
(4, 'Fish'),
(5, 'Birds');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `description`, `quantity`, `price`, `category`, `created_at`) VALUES
(9, 'Bulldog', 'Well Behaved Dog', 3, 100000.00, 'Dog', '2024-08-26 17:10:38'),
(10, 'Beagle', 'Small to medium-sized dogs known for their keen sense of smell and friendly nature. Beagles are energetic and great with families and children.', 5, 50000.00, 'Dog', '2024-08-26 17:12:34'),
(11, 'Shih Tzu', 'Small toy dogs with a long, flowing coat and a friendly personality. They are affectionate and good for apartment living.', 1, 20000.00, 'Dog', '2024-08-26 17:13:26'),
(12, 'Persian', 'Known for their long, luxurious fur and flat faces. Persians are calm, affectionate, and enjoy a quiet environment. They require regular grooming.', 1, 5000.00, 'Cat', '2024-08-26 17:14:15'),
(13, 'British Shorthair', 'Stocky, round-faced cats with a dense, plush coat. They are calm, easygoing, and make excellent companions for families and individuals alike.\r\n', 6, 30000.00, 'Cat', '2024-08-26 17:14:51'),
(14, 'Budgerigar', 'Small, colorful parrots known for their playful and social nature. Budgies are easy to care for and can mimic human speech and sounds.', 4, 20000.00, 'Birds', '2024-08-26 17:16:01'),
(15, 'Cockatiel', 'Medium-sized parrots with a distinctive crest on their head. They are affectionate, enjoy interaction, and can learn to mimic sounds and speech.', 8, 8000.00, 'Birds', '2024-08-26 17:16:47'),
(16, 'Canary', 'Small, songbirds known for their bright colors and melodious singing. Canaries are low-maintenance and prefer to live in pairs or small groups.', 2, 9000.00, 'Birds', '2024-08-26 17:17:23'),
(17, 'Goldfish', 'Classic freshwater fish with a variety of colors and fin shapes. Goldfish are relatively easy to care for but require a well-filtered tank due to their waste production.', 70, 800.00, 'Fish', '2024-08-26 17:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `email`, `phone_number`, `created_at`) VALUES
(6, 'admin', '$2y$10$nm1t9mM.XqGFKlgxVBBjHOp2pp8Pi90tUHQTg6e8uy.9i8axGVSH6', 'admin@gmail.com', '1234567890', '2024-08-26 04:18:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
