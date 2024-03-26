-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 02:20 AM
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
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `career_id` int(11) NOT NULL,
  `career_title` varchar(255) DEFAULT NULL,
  `career_description` text DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`career_id`, `career_title`, `career_description`, `salary`, `type`, `experience`, `location`, `description`) VALUES
(4, 'Delivery Driver', 'We are selling Real Christmas Tree and delivering 3 locations. Candidates must have valid driver license with a clean driving record. You will be provided with a delivery Truck to transport Christmas tree between the 3 locations. Be able to pick up supplies from Wholesale club, Walmart and Costco. Be able to help with prep work and covering front of house breaks when not delivering. Occasionally do the morning delivery of christmas trees which may be occur a couple times a week. Be able to lift 50lb. General start time is Mon to Fri from around 6:00am to 5:00pm , but with potential of starting earlier. Start time will vary with the day of the week but it is typically 6am-7am. Schedule may change in the future. ', '$19–$20 an hour - Full-time', 'Shift and schedule, Weekends as needed', 'Delivery driving: 1 year (required)', 'Claresholm, AB', 'We are selling Real Christmas Tree and delivering 3 locations. Candidates must have valid driver license with a clean driving record. You will be provided with a delivery Truck to transport Christmas tree between the 3 locations. Be able to pick up suppli'),
(5, 'Model', 'HEllo', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(12, 13, 1, 1),
(19, 19, 3, 2),
(20, 19, 2, 1),
(21, 20, 1, 1),
(24, 12, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Christmas Tree', 'Xmas trees'),
(2, 'Christmas Tree Stand', 'Xmas Tree stand'),
(5, 'Decoration', '');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `driver_id`, `status`, `delivery_date`) VALUES
(15, 9, 0, '2024-03-15'),
(16, 11, 0, '2024-03-23'),
(19, 11, 0, '2024-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_phone` varchar(15) DEFAULT NULL,
  `driver_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `driver_phone`, `driver_photo`) VALUES
(9, 'Oleksandr Shakhov', '825 252 23 23', 'female3.jpg'),
(11, 'Mary Rose ', '825 252 23 23', 'female3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_name`, `quantity`, `supplier_id`, `price`, `size`, `type`) VALUES
(1, 'Tree 555', 555, 2, 555.00, '555', '555'),
(2, 'Tree 2', 50, 2, 104.99, 'Large', 'Green'),
(3, 'Tree 3', 75, 3, 115.49, 'Small', 'Green'),
(4, 'Tree # 3333', 99, 2, 333.00, '333', '123'),
(5, 'Tree # 33', 99, 1, 333.00, '333', '123');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(1, 'Location A'),
(2, 'Location B'),
(3, 'Location C'),
(4, 'Location D'),
(5, 'Location W'),
(6, 'Location QQ'),
(7, 'Lethbridge'),
(8, 'manila'),
(9, 'manila');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(30, 1, 'Christmas Tree 1', '<p>Green</p>\r\n', 'christmas-tree-1', 99.99, 'christmas-tree-1.jpg', '2024-03-22', 13),
(31, 1, 'Christmas Tree 2', '<p>White</p>\r\n', 'christmas-tree-2', 120, 'christmas-tree-2.jpg', '2024-03-22', 4),
(32, 2, 'Stand', '<p>Christmas Tree Stand</p>\r\n', 'stand', 20, 'stand.jpg', '2024-03-22', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(9, 9, 'PAY-1RT494832H294925RLLZ7TZA', '2024-03-15'),
(10, 9, 'PAY-21700797GV667562HLLZ7ZVY', '2024-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `supplier_photo` varchar(255) DEFAULT NULL,
  `supplier_location` varchar(255) DEFAULT NULL,
  `supplier_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_photo`, `supplier_location`, `supplier_phone`) VALUES
(1, 'Oleksandr Shakhov', 'female3.jpg', 'Vancouver', '123-456-7890'),
(2, 'Mary Rose', 'female3.jpg', 'Kelowna', '987-654-3210'),
(3, 'Bennedict Mbopia', 'female3.jpg', 'Victoria', '555-123-4567');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `town_id` bigint(20) UNSIGNED NOT NULL,
  `town_name` varchar(100) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`town_id`, `town_name`, `zone_id`) VALUES
(1, 'Lethbridge', 1),
(2, 'Coaldale', 1),
(3, 'Picture Butte', 1),
(4, 'Coalhurst', 1),
(5, 'Taber', 1),
(6, 'Fort Macleod', 2),
(7, 'Pincher Creek', 2),
(8, 'Lundbreck', 2),
(9, 'Claresholm', 3),
(10, 'Nanton', 3),
(11, 'Monarch', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `town_id` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`, `phone`, `delivery_date`, `town_id`, `city`) VALUES
(1, 'admin@admin.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'Brady', 'Schnell', '', '', 'ceo.jpg', 1, '', '', '2024-03-01', NULL, NULL, NULL, NULL),
(12, 'mary@gmail.com', '$2y$10$sku9xlKjFxtpY/dgPQv.oOXXnStoMIETbmbMlV4FSfybcKMTFzLO.', 0, 'Mary Rose ', 'Bacongga', '515 6 Ave S', '825-589-23-25', 'female3.jpg', 1, '', '', '2024-03-12', NULL, NULL, NULL, NULL),
(16, 'bendas0515@gmail.com', '$2y$10$c7wIOdOQoz2bPvKJ2MtVS.Ah8S19DkgdnCtWw6jt.fiwie/S5259G', 0, 'Sergii', 'Bendas', 'Kosmonavtov street.d.26 kv.65', '855 858 58 58', 'job bank.png', 1, '', '', '2024-03-12', NULL, NULL, NULL, NULL),
(18, 'annyta111333@gmail.com', '$2y$10$4DmiCLlLRcteb9OEoX2B3.JBKqCeYbWO1B2NnSqSJG07dYl2Eqgjy', 0, 'Anna', 'Zarubina', '', '', '', 0, '', '', '2024-03-13', NULL, NULL, NULL, NULL),
(20, 'shakhov42@gmail.com', '$2y$10$A9Ce5iYZWGnZT0AVMfOZa.drvFgaZMPhdcNRrPp1e/43MOvpYOslO', 0, 'Alex', 'Shakhov', '', '', '', 0, '', '', '2024-03-21', NULL, NULL, NULL, NULL),
(21, 'maryr@gmail.com', '$2y$10$wMBTMTPydPdThav97ED7ReSgZaDU/fQgbN/I4gRpxRwUWqWJ4103e', 0, 'mary', 'rose b', '', '', '', 0, '', '', '2024-03-22', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`career_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `fk_delivery_driver` (`driver_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`town_id`),
  ADD KEY `idx_town_id` (`town_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `career_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `town_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_delivery_driver` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE SET NULL;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
