-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 05:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gwsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `position` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `sur_name`, `email`, `password`, `phone`, `address`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Gar', 'Gyi', 'gargyi@gmail.com', 'gargyi123', '097897666', 'main street', 'Manager', '2023-08-18 04:15:02', '2023-08-18 04:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE `attractions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `location` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`id`, `name`, `description`, `location`, `image`) VALUES
(1, 'Shwe Dagon Pagoda', 'There are shwe da gon pagoda.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.566314910775!2d96.14697547475272!3d16.798238819510775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb5e363aab97%3A0x55f0542aad97d8c7!2z4YCb4YC94YC-4YCx4YCQ4YCt4YCC4YCv4YC24YCF4YCx4YCQ4YCu4YCQ4YCx4YCs4YC6LCDhgJvhgJThgLrhgIDhgK_hgJThgLo!5e0!3m2!1smy!2smm!4v1692630221581!5m2!1smy!2smm\" width=\"300\" height=\"200\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '64e37de6b8e84.jpg'),
(2, 'MaHar Myat Mu Ni', 'This is MaHar Myat Mu Ni', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3700.549951435605!2d96.07592257487335!3d21.95184645543619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb6d4f5ff5e9d5%3A0x9352ca8131e3edf2!2z4YCZ4YCf4YCs4YCZ4YCv4YCU4YCt4YCb4YCv4YCV4YC64YCb4YC-4YCE4YC64YCQ4YCx4YCs4YC64YCZ4YC84YCQ4YC64YCA4YC84YCu4YC4!5e0!3m2!1smy!2smm!4v1692630693029!5m2!1smy!2smm\" width=\"300\" height=\"200\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '64df1f26b46b2.jpg'),
(3, 'Yangon Water Boom', 'This is Yangon Water Boom', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3820.067070115224!2d96.1977028747522!3d16.773338420204936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ed00c9e28a09%3A0x5aa9871d473f1bb8!2sYangon%20Water%20Boom!5e0!3m2!1smy!2smm!4v1692630819705!5m2!1smy!2smm\" width=\"300\" height=\"200\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '64df1ffde1252.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_type` varchar(100) NOT NULL,
  `booking_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campsites`
--

CREATE TABLE `campsites` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `campsites`
--

INSERT INTO `campsites` (`id`, `name`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Yangon Campsite', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488797.9785910376!2d95.8519060836728!3d16.839536841517816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2z4YCb4YCU4YC64YCA4YCv4YCU4YC6!5e0!3m2!1smy!2smm!4v1692607750595!5m2!1smy!2smm\" width=\"300\" height=\"200\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2023-08-17 16:15:49', '2023-08-21 15:26:38'),
(2, 'Mandalay Campsite', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118427.04902531789!2d95.99342209257541!3d21.94049860069746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb6d23f0d27411%3A0x24146be01e4e5646!2z4YCZ4YCU4YC54YCQ4YCc4YCx4YC4!5e0!3m2!1smy!2smm!4v1692608218998!5m2!1smy!2smm\" width=\"300\" height=\"200\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2023-08-18 13:54:11', '2023-08-21 15:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `sur_name`, `email`, `password`, `phone`, `address`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 'dd', 'dd', 'wailwinaung228@gmail.com', 'ddddd', '09 796 718690', 'ddddd', 0, '2023-08-15 14:43:53', '2023-08-15 14:43:53'),
(2, 'Wai ', 'Gyi', 'wla@gmail.com', 'wla123', '0933333', '23 street', 0, '2023-08-15 15:54:01', '2023-08-15 15:54:01'),
(3, 'Ko', 'Kyaw', 'kokyaw@gmail.com', 'kokyaw123', '0933333', 'ddd', 0, '2023-08-17 15:09:01', '2023-08-17 15:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `description`, `image`) VALUES
(1, 'Wifi Free', 'Wifi is 100% free.', '64e3750f3287c.png'),
(2, 'Free Lunch', 'This is lunch feature', '64ddd86713add.jpg'),
(3, 'Car Parking', 'Free Car Pariing', '64df1d4fee66b.png');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `pitch_type_id` int(11) NOT NULL,
  `campsite_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `pitch_type_id`, `campsite_id`, `name`, `description`, `price`, `image`, `location`, `status`, `updated_at`, `created_at`) VALUES
(2, 1, 1, 'River View Tent', 'Only 4 people accepted', 20000, '64e2e56b08e6a.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d198067.53662786845!2d96.02775176160931!3d16.99135865392792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2z4YCb4YCU4YC64YCA4YCv4YCU4YC6!5e0!3m2!1smy!2smm!4v1692438484618!5m2!1smy!2smm\"  loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2023-08-21 10:47:47', '2023-08-18 15:22:42'),
(3, 3, 2, 'Bite Pu Tent', 'Take your adventure with nature ', 15000, '64e2d348d18e9.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d48018.10528919934!2d96.10646459089804!3d21.966604813262222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1smy!2smm!4v1692433398220!5m2!1smy!2smm\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, '2023-08-21 09:33:25', '2023-08-19 09:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `package_attraction`
--

CREATE TABLE `package_attraction` (
  `package_id` int(11) NOT NULL,
  `attraction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `package_attraction`
--

INSERT INTO `package_attraction` (`package_id`, `attraction_id`) VALUES
(3, 2),
(2, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `package_feature`
--

CREATE TABLE `package_feature` (
  `package_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `package_feature`
--

INSERT INTO `package_feature` (`package_id`, `feature_id`) VALUES
(3, 1),
(3, 2),
(3, 3),
(2, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pitch_types`
--

CREATE TABLE `pitch_types` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pitch_types`
--

INSERT INTO `pitch_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tent Pitch', '2023-08-15 17:54:44', '2023-08-15 17:54:44'),
(2, 'Touring Caravan Pitch', '2023-08-15 17:54:44', '2023-08-15 17:54:44'),
(3, 'Motorhome Pitch', '2023-08-15 17:55:16', '2023-08-15 17:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `message` varchar(256) NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `campsites`
--
ALTER TABLE `campsites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pitch_type_id` (`pitch_type_id`),
  ADD KEY `campsite_id` (`campsite_id`);

--
-- Indexes for table `package_attraction`
--
ALTER TABLE `package_attraction`
  ADD KEY `package_id` (`package_id`),
  ADD KEY `attraction_id` (`attraction_id`);

--
-- Indexes for table `package_feature`
--
ALTER TABLE `package_feature`
  ADD KEY `package_id` (`package_id`),
  ADD KEY `feature_id` (`feature_id`);

--
-- Indexes for table `pitch_types`
--
ALTER TABLE `pitch_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `package_id` (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attractions`
--
ALTER TABLE `attractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campsites`
--
ALTER TABLE `campsites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pitch_types`
--
ALTER TABLE `pitch_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`pitch_type_id`) REFERENCES `pitch_types` (`id`),
  ADD CONSTRAINT `packages_ibfk_2` FOREIGN KEY (`campsite_id`) REFERENCES `campsites` (`id`);

--
-- Constraints for table `package_attraction`
--
ALTER TABLE `package_attraction`
  ADD CONSTRAINT `package_attraction_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `package_attraction_ibfk_2` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`);

--
-- Constraints for table `package_feature`
--
ALTER TABLE `package_feature`
  ADD CONSTRAINT `package_feature_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `package_feature_ibfk_2` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
