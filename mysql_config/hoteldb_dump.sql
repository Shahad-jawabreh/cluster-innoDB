SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Drop the old database just in case
DROP DATABASE IF EXISTS MyHotelApp;

-- Database: `MyHotelApp`
CREATE DATABASE IF NOT EXISTS `MyHotelApp`;
USE `MyHotelApp`;

-- --------------------------------------------------------

--
-- Table structure for table `users` (Essential Table)
--
CREATE TABLE `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Table structure for table `hotels` (Essential Table)
--
CREATE TABLE `hotels` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `location` VARCHAR(255) NOT NULL,
  `rating` TINYINT UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data
--
INSERT INTO `users` (`name`, `email`) VALUES
('Admin User', 'admin@example.com'),
('Test Client', 'client@example.com');

INSERT INTO `hotels` (`name`, `location`, `rating`) VALUES
('Yildiz Hotel', 'Nablus', 5),
('Royal Court Hotel', 'Ramallah', 5);

COMMIT;
