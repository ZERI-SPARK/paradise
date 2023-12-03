-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 08:22 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paradise`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `profile_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fname`, `lname`, `profile_img`) VALUES
(1, 'admin', '$2y$10$xJSMVeCv42lRTN8aaBkSOu0kbjGoEEg3jQ1b8daTT/ZpcovlmyxDu', 'Admin', '1', 'default.png'),
(2, 'gaurav812', '$2b$10$ZNGYS9dwWAKnmYiXMNUw.uGLwvhsvhNk9dus6cly.kBOleHmZtiIW', 'Gauravpreet', 'Singh', 'gaurav.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `order_address` varchar(500) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `cc_details` varchar(255) NOT NULL,
  `food_orders` varchar(500) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `ordered_at` timestamp NULL DEFAULT current_timestamp(),
  `order_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_email`, `order_email`, `fname`, `lname`, `phone`, `order_address`, `payment_mode`, `cc_details`, `food_orders`, `paid_amount`, `ordered_at`, `order_status`) VALUES
(543382595, 'suryansh@gmail.com', 'joannthomas@getnada.com', 'Suryansh', 'Singh', '02095104482', '{\"addr1\":\"1288\",\"addr2\":\"Dennison Street\",\"city\":\"Stockton\",\"pincode\":\"95204\"}', 'cod', '\"\"', '{\"3\":{\"qnty\":1},\"4\":{\"qnty\":1}}', 386, '2021-07-12 14:32:02', 'On the Way'),
(1195279714, 'qwerty@qwerty.com', 'qwerty@qwerty.com', 'Qwerty', 'Qwerty', '732698372', '{\"addr1\":\"1288\",\"addr2\":\"Dennison Street\",\"city\":\"Stockton\",\"pincode\":\"95204\"}', 'cod', '\"\"', '{\"1\":{\"qnty\":1}}', 218, '2021-07-12 13:41:16', 'Delivered'),
(1313794215, 'qwerty@qwerty.com', 'qwerty@qwerty.com', 'Qwerty', 'Qwerty', '732698372', '{\"addr1\":\"1288\",\"addr2\":\"Dennison Street\",\"city\":\"Stockton\",\"pincode\":\"95204\"}', 'cod', '\"\"', '{\"1\":{\"qnty\":1},\"2\":{\"qnty\":1},\"3\":{\"qnty\":1},\"4\":{\"qnty\":1}}', 672, '2021-07-12 11:22:00', 'Delivered'),
(1349311383, 'qwerty@qwerty.com', 'qwerty@qwerty.com', 'Qwerty', 'Qwerty', '732698372', '{\"addr1\":\"1288\",\"addr2\":\"Dennison Street\",\"city\":\"Stockton\",\"pincode\":\"95204\"}', 'cod', '\"\"', '{\"1\":{\"qnty\":1},\"2\":{\"qnty\":12},\"3\":{\"qnty\":4}}', 2990, '2021-07-14 06:59:50', 'On the Way'),
(1995456156, 'qwerty@qwerty.com', 'qwerty@qwerty.com', 'Qwerty', 'Qwerty', '732698372', '{\"addr1\":\"1288\",\"addr2\":\"Dennison Street\",\"city\":\"Stockton\",\"pincode\":\"95204\"}', 'cod', '\"\"', '{\"2\":{\"qnty\":2},\"8\":{\"qnty\":1},\"7\":{\"qnty\":1},\"6\":{\"qnty\":1},\"5\":{\"qnty\":1},\"9\":{\"qnty\":1},\"10\":{\"qnty\":1}}', 1803, '2021-07-12 13:38:11', 'On the Way'),
(2146193853, 'qwerty@qwerty.com', 'qwerty@qwerty.com', 'Qwerty', 'Qwerty', '732698372', '{\"addr1\":\"1288\",\"addr2\":\"Dennison Street\",\"city\":\"Stockton\",\"pincode\":\"95204\"}', 'cod', '\"\"', '{\"6\":{\"qnty\":1},\"7\":{\"qnty\":1},\"8\":{\"qnty\":1},\"10\":{\"qnty\":1},\"9\":{\"qnty\":1}}', 1299, '2021-07-13 14:22:39', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`id`, `product_name`, `product_price`, `product_image`, `cat_id`) VALUES
(1, 'Chana Kulcha', 150, '1.png', 1),
(2, 'Uelai Roast', 150, '2.png', 1),
(3, 'Dal Makhani', 180, '3.jpg', 1),
(4, 'Lentil Soup', 120, '4.jpg', 1),
(5, 'Chicken Fried Rice', 150, '5.jpg', 1),
(6, 'Veg Fried Rice', 120, '6.jpg', 1),
(7, 'Lemon Chicken', 250, '7.jpg', 1),
(8, 'Chettinad Fish Fry', 250, '8.jpg', 1),
(9, 'Dum Panner', 280, '9.jpg', 1),
(10, 'Makhmali Kofte', 260, '10.jpg', 1),
(11, 'Lemon Chicken', 250, '7.jpg', 2),
(12, 'Chettinad Fish Fry', 250, '8.jpg', 2),
(13, 'Dum Panner', 280, '9.jpg', 2),
(14, 'Makhmali Kofte', 260, '10.jpg', 2),
(15, 'Mutton Do Pyaaza', 250, '11.jpg', 2),
(16, 'Butter Chicken', 280, '10.jpg', 2),
(17, 'Mutton Do Pyaaza', 250, '11.jpg', 2),
(18, 'Butter Chicken', 280, '10.jpg', 2),
(19, 'Samosa ', 50, '13.jpg', 3),
(20, 'Pizza', 180, '14.jpg', 3),
(21, 'Burger', 150, '15.jpg', 3),
(22, 'Gulab Jamun', 80, '16.jpg', 3),
(23, 'Pancakes', 150, '17.jpg', 3),
(24, 'Pakora', 50, '18.jpg', 3),
(25, 'Watermelon & Fruit', 150, '19.jpg', 4),
(26, 'Butter milk', 100, '20.jpg', 4),
(27, 'Thandai Phirni', 90, '21.jpg', 4),
(28, 'Hot Chocolate', 110, '22.jpg', 4),
(29, 'Irish Coffe', 130, '23.jpg', 4),
(30, 'Strawberry Limeade', 160, '24.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `query_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`query_id`, `full_name`, `email`, `message`, `timestamp`) VALUES
(1, 'Qwerty Qwerty', 'qwerty@qwerty.com', 'gwfdysagdk ksxgcakjghcasj jsagcjasbj jasgcl', '2021-07-11 16:31:04'),
(2, 'hjdfhk', 'dasf@shddj.jjshduo', 'dmbjdzn', '2021-07-12 14:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone_number` varchar(20) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `profile_img` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `password`, `created_at`, `phone_number`, `address1`, `address2`, `city`, `pincode`, `profile_img`) VALUES
(1, 'Qwerty', 'Qwerty', 'qwerty@qwerty.com', '$2y$10$FoevmG9ed1PxPPf86ureYesFF7GE6PrmX23BARG7v6WPNwsEdNR1m', '2021-07-08 07:48:18', '732698372', '1288', 'Dennison Street', 'Stockton', '95204', 'Qwerty_1626079481_tt_avatar_small.jpg'),
(2, 'Qwerty', '1234', 'qwerty@gmail.com', '$2y$10$x7zoLHdmSQVRK9gzdfteueh3KjUqQtwpqXz0xODO1qiqoA7RCr72W', '2021-07-08 08:23:41', '', '', '', '', '', 'default.png'),
(5, 'abc', 'def', 'abc@gmail.com', '$2y$10$EqSJOtqh8bmdITng8gbRiueYnk5tE0ILf0hH3laUPePmgyR9ICB1a', '2021-07-08 17:42:36', '', '', '', '', '', 'default.png'),
(6, 'Suryansh', 'Singh', 'suryansh@gmail.com', '$2y$10$GJYU9B9YMqplfVpeePHgLOwNUbBE8WA63TjZtztFmRWUOl4IOVRI2', '2021-07-12 14:25:39', '', '', '', '', '', 'Suryansh_1626100048_tt_avatar_small.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2146193854;

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
