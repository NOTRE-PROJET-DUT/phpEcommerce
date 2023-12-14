-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 06:39 PM
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `secret_code` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `password`, `description`, `first_name`, `last_name`, `image_url`, `address`, `city`, `state`, `postal_code`, `country`, `phone_number`, `secret_code`, `created_at`) VALUES
(1, 'admin1', 'admin1@example.com', 'admin_password', 'System Administrator', 'John', 'Doe', 'https://example.com/admin_image.jpg', '123 Admin St', 'AdminCity', 'AdminState', '12345', 'AdminCountry', '+1234567890', 'admin_secret_code', '2023-12-12 12:46:36'),
(2, 'nabil', 'nabil@gmail.com', '$2y$10$z18QYLOYdGbNCfGYL5LGcuBhs5ombLVcGMPkt.nLX2FkPW12u7upq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12-12-1212', '2023-12-13 19:06:11'),
(10, 'test', 'nabilboussalham96@gmail.com', '$2y$10$W/EdoCufZrBw8Lq6IJV/iuDfzVPskH02e26zQeH1Y2vArbBqQRzSm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', '2023-12-14 11:53:58'),
(11, 'test1', 'test1@gmail.com', '$2y$10$79rF/ZvzCm071yEGNixwseaBxwdYuFN2/9eVqGlcVLDoNwyNG8nP6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', '2023-12-14 12:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_type` varchar(20) NOT NULL CHECK (`coupon_type` in ('Percentage','Fixed')),
  `discount_value` decimal(10,2) NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_code`, `coupon_type`, `discount_value`, `expiration_date`, `created_at`) VALUES
(1, 'SAVE20', 'Percentage', 0.00, '2023-01-01', '2023-12-12 12:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `total_amount`) VALUES
(1, 1, '2023-12-12 12:46:36', 599.99),
(2, 2, '2023-12-13 19:15:48', 0.00),
(3, 2, '2023-12-13 22:18:03', 1099.99);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` varchar(12) NOT NULL CHECK (`status` in ('Canceled','pending','shipped','delivered','finished')),
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `status`, `quantity`, `price`) VALUES
(1, 1, 1, 'pending', 1, 599.99),
(2, 3, 1, 'pending', 1, 99.99),
(3, 3, 4, 'pending', 1, 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `category` varchar(12) NOT NULL CHECK (`category` in ('Electronics','Clothing','Books','Home and Garden','Toys and Games')),
  `admin_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `image_url`, `price`, `stock_quantity`, `category`, `admin_id`, `coupon_id`, `created_at`) VALUES
(1, 'samsung Galaxy s23', 'samsung Galaxy s23 \r\n', 'http://localhost:8005/e6.webp', 99.99, 50, 'Electronics', 1, 1, '2023-12-12 12:46:36'),
(2, 'iphone 15', 'iphone 15 ', 'http://localhost:8005/e1.webp', 1199.99, 50, 'Electronics', 1, 1, '2023-12-12 12:47:35'),
(3, 'redmi', 'redmi ', 'http://localhost:8005/e5.webp', 100.00, 500, 'Electronics', 1, 1, '2023-12-13 19:15:17'),
(4, 'hp', 'pc i8 10000hp', 'http://localhost:8005/e2.jpg', 1000.00, 502, 'Electronics', 1, 1, '2023-12-13 19:18:33'),
(5, 'hp laptop', 'hp i5 6600u', 'http://localhost:8005/e3.jpg', 2000.00, 502, 'Electronics', 1, 1, '2023-12-13 19:20:43'),
(6, 'Air Pods', 'Air Pods', 'http://localhost:8005/e7.jpg', 100.00, 500, 'Electronics', 1, 1, '2023-12-13 19:21:30'),
(7, 'AirPods Max', 'AirPods Max', 'http://localhost:8005/e8.png', 345.00, 500, 'Electronics', 1, 1, '2023-12-13 19:24:16'),
(8, 'Clavier', 'Clavier', 'http://localhost:8005/e4.jpg', 45.00, 567, 'Electronics', 1, 1, '2023-12-13 19:25:35'),
(9, 'RICH DAD POOR DAD', 'RICH DAD POOR DAD', 'http://localhost:8005/b1.jpeg', 56.00, 500, 'Books', 1, 1, '2023-12-13 19:26:29'),
(10, 'Sahih al-Bukhari', 'Sahih al-Bukhari', 'http://localhost:8005/b2.png', 56.00, 502, 'Books', 1, 1, '2023-12-13 19:28:05'),
(11, 'sira nabawiya', 'sira nabawiya', 'http://localhost:8005/b3.jpg', 56.00, 567, 'Books', 1, 1, '2023-12-13 19:30:08'),
(12, 'DICTIONNAIRE FR -AR', 'DICTIONNAIRE FRANCAIS -ARABE', 'http://localhost:8005/b4.png', 56.00, 567, 'Books', 1, 1, '2023-12-13 19:32:31'),
(13, 'INFORMATIQUE ', 'INFORMATIQUE INITIATION A L\'ALGORITHMIQUE EN SCILAB ET PYTHON', 'http://localhost:8005/b5.jpg', 56.00, 500, 'Books', 1, 1, '2023-12-13 19:34:36'),
(14, 'THE C PROGRAMMING LANGUAGE', 'THE C PROGRAMMING LANGUAGE', 'http://localhost:8005/b6.png', 67.00, 502, 'Books', 1, 1, '2023-12-13 19:35:45'),
(15, 'GET JAVA', 'THE JAVA PROGRAMMING LANGUAGE', 'http://localhost:8005/b7.webp', 56.00, 500, 'Books', 1, 1, '2023-12-13 19:37:32'),
(16, 'THE C++ PROGRAMMING LANGUAGE', 'THE C++ PROGRAMMING LANGUAGE', 'http://localhost:8005/b8.jpg', 56.00, 502, 'Books', 1, 1, '2023-12-13 19:38:00'),
(17, 'T-shirt', 'T-shirt', 'http://localhost:8005/c5.jpg', 6.00, 500, 'Clothing', 1, 1, '2023-12-13 19:44:33'),
(18, 'moroccan jlaba', 'moroccan jlaba', 'http://localhost:8005/c8.jpg', 9.00, 502, 'Clothing', 1, 1, '2023-12-13 19:47:18'),
(19, 'jacket, hat and boots', 'jacket, hat and boots', 'http://localhost:8005/c7.jpg', 23.00, 567, 'Clothing', 1, 1, '2023-12-13 19:50:17'),
(20, 'boots', 'new boots', 'http://localhost:8005/c2.jpg', 4.00, 502, 'Clothing', 1, 1, '2023-12-13 19:50:55'),
(21, 'jumper, boots and bag', 'jumper, boots and bag', '../../../storage/c6.jpg', 5.00, 567, 'Clothing', 1, 1, '2023-12-13 19:53:21'),
(22, 'New T-shirt', 'T-shirt', '../../../storage/c3.jpg', 56.00, 500, 'Clothing', 1, 1, '2023-12-13 19:55:47'),
(23, 'jumper, boots and bag', 'jumper, boots and bag', 'http://localhost:8005/c6.jpg', 87.00, 500, 'Clothing', 1, 1, '2023-12-13 22:04:45'),
(24, 'T-shirt', 'new T-shirt', 'http://localhost:8005/c3.jpg', 5.00, 500, 'Clothing', 1, 1, '2023-12-13 22:05:27'),
(25, 'game', 'game ', 'http://localhost:8005/g1.jpg', 4.00, 502, 'Electronics', 1, 1, '2023-12-13 22:06:34'),
(26, 'T-shirt', 'T-shirt', 'http://localhost:8005/25.jpg', 6.00, 78, 'Clothing', 10, 1, '2023-12-14 11:58:03'),
(27, 'new games', 'new games', 'http://localhost:8005/g2.jpg', 3.00, 567, 'Electronics', 10, 1, '2023-12-14 12:05:14'),
(28, 'game1 ', 'new game1', 'http://localhost:8005/g7.jpg', 1.00, 567, 'Electronics', 10, 1, '2023-12-14 13:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `secret_code` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `address`, `city`, `state`, `postal_code`, `country`, `phone_number`, `secret_code`, `created_at`) VALUES
(1, 'user1@example.com', 'user_password', 'Jane', 'Doe', '456 User St', 'UserCity', 'UserState', '54321', 'UserCountry', '+9876543210', 'user_secret_code', '2023-12-12 12:46:36'),
(2, 'nabil@gmail.com', '$2y$10$C43THGhu.VzNR52/6.F77u8tlYxvAugR1eFlexooMp2MCn78nulLC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12-12-1212', '2023-12-13 19:04:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `coupon_id` (`coupon_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`coupon_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
