-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3325
-- Generation Time: Jun 26, 2023 at 11:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_b`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `username`, `First_Name`, `Last_Name`, `Email`, `Password`) VALUES
(1, 'TezeraworkDagim', 'Birhanu', 'Worku', 'TezeraworkDagim@gmail.com', 'TezeraworkDagim7*'),
(2, 'popo', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$NS1qL/GoR5iFwCPzi37uQe/'),
(3, 'yut', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$1Lto5YG6OJmjw5bXTg97tOj'),
(4, 'Police', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$8uYrALjYjWu977ac2mwkvuG'),
(5, 's', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$lzoo9CnyWe2/KJs/fCtFdut'),
(6, 'p', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$rgCraPaLWM02P9wLvohdvux'),
(7, 's', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$JuG30wkbdlKtCVE.A3kn4O6'),
(8, 'sss', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$n3vFgfHvgyBfGy9TG/NTEeS'),
(9, '78', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$GQwf4Sn9u91IXlHPDKaRMuY'),
(10, 'Police', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$XXAEONSb8Vjyp18j6iElzOz'),
(11, 'po', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$IeprA8Gmv/HpW1nW1McZz.L'),
(12, 'popo', 'fsda', 'fdsa', 'dagitezerawork@gmail.com', '$2y$10$UlWSt4h18JWtJU5T3toIv.u');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(30) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `cat_name`, `created_at`, `updated_at`, `price`) VALUES
(1, 'Single- family', '2023-04-18 09:46:23', '2023-04-18 09:46:23', 300000),
(3, 'Apartement', '2023-04-18 09:47:20', '2023-04-18 09:47:20', 900000),
(15, 'Condominium', '2023-04-18 12:03:12', '2023-04-18 12:03:12', 1500000),
(21, 'American', '2023-05-03 12:04:05', '2023-05-03 12:04:05', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `ID` int(10) NOT NULL,
  `city_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`ID`, `city_name`) VALUES
(1, 'Addis Ababa'),
(2, 'Dire Dawa'),
(3, 'Bahir Dar'),
(4, 'Gondar'),
(5, 'Hawassa'),
(6, 'Mekelle'),
(7, 'Jig Jiga'),
(8, 'Jima'),
(9, 'Adama'),
(10, 'Dessie'),
(11, 'Arba Minch');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` mediumtext NOT NULL,
  `read_status` int(5) NOT NULL DEFAULT 0,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `First_Name`, `email`, `message`, `read_status`, `creation_time`, `update_time`) VALUES
(1, 'Birhanu', 'birhanuworku2011@gmail.com', 'Hellow, how are you doing?\r\nHellow, how are you doing?\r\nHellow, how are you doing?\r\nHellow, how are you doing?\r\nHellow, how are you doing?\r\nHellow, how are you doing?\r\nWe r doing welll.\r\n', 1, '2023-04-10 22:56:11', '2023-04-10 22:56:11'),
(4, 'Birhanu', 'birhanuworku2011@gmail.com', 'THere  is no message, endiet nachihy GMMDs sira endiet new. ayizuachihu bertu', 1, '2023-05-22 16:35:30', '2023-05-22 16:35:30'),
(5, 'Birhanu', 'birhanuworku2011@gmail.com', 'THis a test for htmlSpecialChars and all other&#039; Sanitizing methods///,,,,[[[]{}]$#@#$%^ REmember the logic &quot;If it works, Don&#039;t Touch it&quot;', 1, '2023-05-23 17:27:05', '2023-05-23 17:27:05'),
(6, 'Abebe', 'yekuaraanbessa1811@gmail.com', 'No messege', 0, '2023-05-23 22:47:14', '2023-05-23 22:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `ID` varchar(15) NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Last_name` varchar(15) NOT NULL,
  `Job` varchar(50) NOT NULL,
  `Picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`ID`, `First_Name`, `Last_name`, `Job`, `Picture`) VALUES
('ETS.', 'Bisrat', 'Kebere', 'Product Manager', 'images/unnamed.jpg'),
('ETS..', 'Biruk', 'Mesfin', 'System Designer', 'images/unnamed.jpg'),
('ETS...', 'Ararsa', 'Derese', 'Front End Developer', 'images/unnamed.jpg'),
('ETS.../', 'Biyaol', 'Mesay', 'Graphics Designer', 'images/unnamed.jpg'),
('ETS.../13', 'Dagim', 'Tezera', 'Pentester', 'images/unnamed.jpg'),
('ETS0279/13', 'Birhanu', 'Worku', 'Back-end Developer', 'images/unnamed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Quantity` int(25) NOT NULL,
  `Price` int(25) NOT NULL,
  `rental_price` float NOT NULL,
  `Picture` varchar(300) NOT NULL,
  `Description` mediumtext NOT NULL,
  `long_description` text NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Creation_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`ID`, `Name`, `Category`, `Quantity`, `Price`, `rental_price`, `Picture`, `Description`, `long_description`, `Category_ID`, `Creation_time`, `update_time`) VALUES
(55, 'Apartment', 'American', 1200, 7232, 55, 'uploads/product_images/ap.jpeg', 'Jemo\r\npayruff st.', 'Jemo\r\npayruff st.', 21, '2023-06-02 10:14:55', '2023-06-02 10:14:55'),
(56, 'Single Floor', 'Condominium', 400, 40, 55, 'uploads/product_images/pa.jpg', 'Arada\r\nkaylong st.', 'Arada\r\nkaylong st.', 21, '2023-06-02 10:14:55', '2023-06-02 10:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Phone_Number` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NumOfItems` int(11) NOT NULL,
  `totalFee` int(20) NOT NULL,
  `Payment_method` varchar(30) NOT NULL,
  `note` varchar(300) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` int(11) NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL DEFAULT '\'Pending\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `First_Name`, `Last_Name`, `city`, `address`, `Phone_Number`, `Email`, `NumOfItems`, `totalFee`, `Payment_method`, `note`, `orderDate`, `update_time`, `status`) VALUES
(24, 'Abebe', 'Kebede', 'Dire', 'Addis Ababa, Kilinto ....', '090909', 'yeyuyiyayieyyo@gmail.com', 4, 51700, 'Bank Transfer', 'NO note', '2023-05-04 19:00:43', 2147483647, 'Pending'),
(27, 'Abebe', 'Kebede', 'Bahir', 'Abay Mado ያለው በሬ ሲና ገብሬ', '456', 'yeyuyiyayieyyo@gmail.com', 4, 71700, 'Cash On Delivery', 'አብችድ', '2023-05-04 19:09:05', 2147483647, 'Pending'),
(65, 'Abebe', 'Kebede', 'Mekelle', 'asdfgsfsdafasf', '243242', 'yeyuyiyayieyyo@gmail.com', 3, 26980, 'Cash On Delivery', '', '2023-05-05 08:38:02', 2147483647, 'Pending'),
(66, 'Abebe', 'Kebede', 'Mekelle', 'asdfgsfsdafasf', '243242', 'yeyuyiyayieyyo@gmail.com', 3, 26980, 'Cash On Delivery', '', '2023-05-05 08:38:32', 2147483647, 'completed'),
(69, 'Abebe', 'Kebede', 'Mekelle', 'sdaffafsdafsf', '214242', 'yeyuyiyayieyyo@gmail.com', 1, 7000, 'Cash On Delivery', '', '2023-05-05 11:45:56', 2147483647, 'completed'),
(70, 'Abebewert', 'Kebede', 'Dessie', '13234556ytrewds', '234567', 'yeyuyiyayieyyo@gmail.com', 2, 18500, 'Bank Transfer', '', '2023-05-05 11:46:49', 2147483647, 'completed'),
(71, 'Ethiopa', 'Kebede', 'Hawassa', 'sdafsafsafsfsafsf', '46465', 'yeyuyiyayieyyo@gmail.com', 3, 49640, 'TeleBirr', '', '2023-05-05 14:52:03', 2147483647, 'completed'),
(72, 'Ethiopa', 'Kebede', 'Hawassa', 'sdafsafsafsfsafsf', '46465', 'yeyuyiyayieyyo@gmail.com', 3, 49640, 'TeleBirr', '', '2023-05-05 14:54:35', 2147483647, 'Pending'),
(73, 'Abebe', 'Kebede', 'Dire', '1000, sjshfa , sdfjkahl', '54654321', 'yeyuyiyayieyyo@gmail.com', 4, 85650, 'Cash On Delivery', '', '2023-05-06 08:23:52', 2147483647, 'completed'),
(74, 'Birhanu', 'Worku', 'Bahir', 'Addis Ababa, Tulu Dimtu', '0905971074', 'birhanuworku2011@gmail.com', 4, 46450, 'Cash On Delivery', '', '2023-05-06 08:25:18', 2147483647, 'Pending'),
(75, 'Birhanu', 'Worku', 'Bahir', 'Addis Ababa, Tulu Dimtu', '0905971074', 'birhanuworku2011@gmail.com', 3, 31650, 'TeleBirr', '', '2023-05-06 08:49:19', 2147483647, 'completed'),
(76, 'Birhanu', 'Worku', '', 'Addis Ababa, Tulu Dimtu', '0905971074', 'birhanuworku2011@gmail.com', 3, 28800, 'Cash On Delivery', '', '2023-05-06 08:50:31', 2147483647, 'Pending'),
(77, 'Birhanu', 'Worku', 'Hawassa', 'Addis Ababa, Tulu Dimtu', '0905971074', 'birhanuworku2011@gmail.com', 3, 37700, 'Cash On Delivery', '', '2023-05-06 08:53:55', 2147483647, 'Pending'),
(78, 'Abebachin', 'Kebede', 'Addis', 'safsdf, sdfs,af sdf', '923045798', 'yekuaraanbessa1811@gmail.com', 2, 22650, 'Cash On Delivery', '', '2023-05-22 11:07:33', 2147483647, 'Pending'),
(79, 'Birhanu', 'Tilahun', 'Addis', 'Ethiopia', '0905971074', 'birhanuworku2011@gmail.com', 3, 32320, 'Cash On Delivery', '', '2023-05-22 11:10:08', 2147483647, 'Pending'),
(80, 'Abebachin', 'Tilahun', 'Addis', 'Ethiopia, Addis', '099432492', 'birhanuworku2011@gmail.com', 2, 26980, 'Cash On Delivery', '', '2023-05-22 11:24:47', 2147483647, 'Pending'),
(81, 'Abebachin', 'Kebede', 'Addis', 'Addis', '0905971074', 'yekuaraanbessa1811@gmail.com', 1, 21970, 'Cash On Delivery', 'ewqrewrqw', '2023-05-22 13:20:06', 2147483647, 'Pending'),
(82, 'Birhanu', 'Tilahun', 'Addis', 'Ethiopia', '0905971074', 'birhanuworku2011@gmail.com', 1, 11000, 'Cash On Delivery', '', '2023-05-22 13:22:41', 2147483647, 'Pending'),
(83, 'Abebachin', 'Kebede', 'Addis', 'Addis, dshajkf ,fs', '0905971074', 'yekuaraanbessa1811@gmail.com', 1, 11000, 'Bank Transfer', '', '2023-05-22 13:27:25', 2147483647, 'Pending'),
(84, 'Birhanu', 'Worku', 'Mekelle', 'Addis Ababa, Tulu Dimtu', '0905971074', 'birhanuworku2011@gmail.com', 3, 26320, 'Cash On Delivery', 'Nothing', '2023-05-23 18:52:02', 2147483647, 'Pending'),
(85, 'Birhanu', 'Worku', 'Jima', 'Addis Ababa, Tulu Dimtu', '0905971074', 'birhanuworku2011@gmail.com', 3, 30650, 'Bank Transfer', '', '2023-05-23 18:57:26', 2147483647, 'Pending'),
(86, 'Birhanu', 'Tilahun', 'Gondar', 'Ethiopia', '0905971074', 'birhanuworku2011@gmail.com', 1, 19600, 'Cash On Delivery', 'Ethiopianfdsf', '2023-06-02 11:17:37', 2147483647, '\'Pending\''),
(87, 'Birhanu', 'Tilahun', 'Gondar', 'Ethiopia', '0905971074', 'birhanuworku2011@gmail.com', 1, 19600, 'Cash On Delivery', 'Ethiopianfdsf', '2023-06-02 11:26:54', 2147483647, '\'Pending\''),
(88, 'Abebe', 'Kebede', 'Jima', 'Addis', '0905971074', 'yekuaraanbessa1811@gmail.com', 1, 24250, 'Cash On Delivery', '', '2023-06-02 11:27:47', 2147483647, '\'Pending\''),
(89, 'Abebe', 'Kebede', 'Arba', 'Addis', '0905971074', 'yekuaraanbessa1811@gmail.com', 1, 33550, 'Cash On Delivery', '', '2023-06-02 11:32:56', 2147483647, '\'Pending\''),
(90, 'Abebe', 'Kebede', '', 'Addis', '0905971074', 'yekuaraanbessa1811@gmail.com', 1, 10300, 'Cash On Delivery', '', '2023-06-02 11:34:17', 2147483647, '\'Pending\''),
(91, '', '', '', '', '', '', 1, 10300, 'Cash On Delivery', '', '2023-06-05 15:05:53', 2147483647, '\'Pending\''),
(92, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 10300, 'Cash On Delivery', '', '2023-06-05 15:14:38', 2147483647, '\'Pending\''),
(93, 'Dagim Tezerawork', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 10300, 'TeleBirr', '', '2023-06-05 15:16:04', 2147483647, '\'Pending\''),
(94, 'Dagim Tezeraworl', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 1800, 'Cash On Delivery', '', '2023-06-05 15:17:53', 2147483647, '\'Pending\''),
(95, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 2200, 'Cash On Delivery', '', '2023-06-05 15:19:37', 2147483647, '\'Pending\''),
(96, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 1800, 'Cash On Delivery', '', '2023-06-06 10:54:22', 2147483647, '\'Pending\''),
(97, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 1800, 'Cash On Delivery', '', '2023-06-06 11:39:26', 2147483647, '\'Pending\''),
(98, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 1800, 'Cash On Delivery', '', '2023-06-06 11:58:22', 2147483647, '\'Pending\''),
(99, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 1800, 'Cash On Delivery', '', '2023-06-07 10:41:37', 2147483647, '\'Pending\''),
(100, 'Dagim Tezerawor', 'Gafat', '', '', '', 'tezeraworkdagi@gmail.com', 1, 1800, 'Chapa', '', '2023-06-07 10:44:02', 2147483647, '\'Pending\''),
(101, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 10300, 'Chapa', '', '2023-06-23 19:41:23', 2147483647, '\'Pending\''),
(102, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 10300, 'Chapa', '', '2023-06-23 19:43:07', 2147483647, '\'Pending\''),
(103, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 10300, 'Chapa', '', '2023-06-23 19:51:37', 2147483647, '\'Pending\''),
(104, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 14950, 'Chapa', '', '2023-06-23 19:54:55', 2147483647, '\'Pending\''),
(105, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 1800, 'Chapa', '', '2023-06-26 19:07:08', 2147483647, '\'Pending\''),
(106, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 1800, 'Chapa', 'sda', '2023-06-26 19:46:15', 2147483647, '\'Pending\''),
(107, 'Tezerawork', 'Gafat', '', '', '', 'tezeraworkdagi@gmail.com', 1, 10300, 'Chapa', 'asdasd', '2023-06-26 19:48:37', 2147483647, '\'Pending\''),
(108, 'Tezerawork', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 10300, 'Chapa', 'asdasd', '2023-06-26 19:48:57', 2147483647, '\'Pending\''),
(109, 'Tezerawork', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 10300, 'Chapa', 'asdasd', '2023-06-26 19:51:37', 2147483647, '\'Pending\''),
(110, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 2, 11100, 'Chapa', 'jiojoi', '2023-06-26 19:52:31', 2147483647, '\'Pending\''),
(111, 'Dagim Tezerawor', 'Gafat', '', '', '', 'tezeraworkdagi@gmail.com', 1, 10300, 'Chapa', 'yuiuh', '2023-06-26 19:53:24', 2147483647, '\'Pending\''),
(112, 'Dagim Tezerawor', 'Gafat', '', '', '', 'dagitezerawork@gmail.com', 1, 1800, 'Chapa', '', '2023-06-26 19:58:16', 2147483647, '\'Pending\'');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderID` int(100) NOT NULL,
  `Customer` varchar(30) NOT NULL,
  `products` varchar(200) NOT NULL,
  `Quantities` text NOT NULL,
  `subTotals` text NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderID`, `Customer`, `products`, `Quantities`, `subTotals`, `creation_time`, `update_time`) VALUES
(55, 'Abebeer Kebede', 'Ater,ጤፍ,Shimbra', '60,100,90', '13980,10000,18000', '2023-05-04 20:03:53', '2023-05-04 20:03:53'),
(57, 'Abebewert Kebede', 'Ater,ጤፍ,Shimbra', '80,130,130', '18640,13000,26000', '2023-05-04 20:08:53', '2023-05-04 20:08:53'),
(66, '', 'Ater,ጤፍ,Shimbra', '60,40,40', '13980,4000,8000', '2023-05-05 08:38:32', '2023-05-05 08:38:32'),
(68, 'ChalaChelele Kebede', 'Shimbra,ጤፍ,Ater,CORN', '20,20,20,20', ',,,', '2023-05-05 08:46:02', '2023-05-05 08:46:02'),
(69, 'Abebe Kebede', 'ጤፍ', '60', '6000', '2023-05-05 11:45:56', '2023-05-05 11:45:56'),
(70, 'Abebewert Kebede', 'ጤፍ,CORN', '60,50', '6000,11500', '2023-05-05 11:46:49', '2023-05-05 11:46:49'),
(71, 'Ethiopa Kebede', 'Ater,ጤፍ,CORN', '80,70,100', '18640,7000,23000', '2023-05-05 14:52:03', '2023-05-05 14:52:03'),
(72, 'Ethiopa Kebede', 'Ater,ጤፍ,CORN', '80,70,100', '18640,7000,23000', '2023-05-05 14:54:35', '2023-05-05 14:54:35'),
(73, 'Abebe Kebede', 'Ater,ጤፍ,Shimbra,CORN', '50,100,200,100', '11650,10000,40000,23000', '2023-05-06 08:23:52', '2023-05-06 08:23:52'),
(74, 'Birhanu Worku', 'Ater,ጤፍ,Shimbra,CORN', '50,60,70,60', '11650,6000,14000,13800', '2023-05-06 08:25:18', '2023-05-06 08:25:18'),
(75, 'Birhanu Worku', 'Ater,ጤፍ,Shimbra', '50,70,60', '11650,7000,12000', '2023-05-06 08:49:20', '2023-05-06 08:49:20'),
(76, 'Birhanu Worku', 'ጤፍ,Shimbra,CORN', '40,50,60', '4000,10000,13800', '2023-05-06 08:50:31', '2023-05-06 08:50:31'),
(77, 'Birhanu Worku', 'CORN,Shimbra,ጤፍ', '90,60,40', '20700,12000,4000', '2023-05-06 08:53:55', '2023-05-06 08:53:55'),
(78, 'Abebachin Kebede', 'Ater,Shimbra', '50,50', '11650,10000', '2023-05-22 11:07:33', '2023-05-22 11:07:33'),
(79, 'Birhanu Tilahun', 'Ater,ጤፍ,Shimbra', '40,60,50', '9320,12000,10000', '2023-05-22 11:10:08', '2023-05-22 11:10:08'),
(80, 'Abebachin Tilahun', 'Ater,ጤፍ', '60,60', '13980,12000', '2023-05-22 11:24:48', '2023-05-22 11:24:48'),
(81, 'Abebachin Kebede', 'Ater', '90', '20970', '2023-05-22 13:20:06', '2023-05-22 13:20:06'),
(82, 'Birhanu Tilahun', 'Shimbra', '50', '10000', '2023-05-22 13:22:41', '2023-05-22 13:22:41'),
(83, 'Abebachin Kebede', 'Shimbra', '50', '10000', '2023-05-22 13:27:25', '2023-05-22 13:27:25'),
(84, 'Birhanu Worku', 'Ater,ጤፍ,Shimbra', '40,40,40', '9320,8000,8000', '2023-05-23 18:52:02', '2023-05-23 18:52:02'),
(85, 'Birhanu Worku', 'ጤፍ,Shimbra,Ater', '50,40,50', '10000,8000,11650', '2023-05-23 18:57:26', '2023-05-23 18:57:26'),
(86, 'Birhanu Tilahun', 'CORN', '40', '18600', '2023-06-02 11:17:37', '2023-06-02 11:17:37'),
(88, 'Abebe Kebede', 'CORN', '50', '23250', '2023-06-02 11:27:47', '2023-06-02 11:27:47'),
(89, 'Abebe Kebede', 'CORN', '70', '32550', '2023-06-02 11:32:56', '2023-06-02 11:32:56'),
(90, 'Abebe Kebede', 'CORN', '20', '9300', '2023-06-02 11:34:18', '2023-06-02 11:34:18'),
(91, ' ', 'Apartment', '20', '9300', '2023-06-05 15:05:53', '2023-06-05 15:05:53'),
(94, 'Dagim Tezeraworl Gafat', 'Single Floor', '20', '800', '2023-06-05 15:17:53', '2023-06-05 15:17:53'),
(95, 'Dagim Tezerawor Gafat', 'Single Floor', '30', '1200', '2023-06-05 15:19:37', '2023-06-05 15:19:37'),
(96, 'Dagim Tezerawor Gafat', 'Single Floor', '20', '800', '2023-06-06 10:54:22', '2023-06-06 10:54:22'),
(97, 'Dagim Tezerawor Gafat', 'Single Floor', '20', '0', '2023-06-06 11:39:26', '2023-06-06 11:39:26'),
(98, 'Dagim Tezerawor Gafat', 'Single Floor', '20', '800', '2023-06-06 11:58:22', '2023-06-06 11:58:22'),
(99, 'Dagim Tezerawor Gafat', 'Single Floor', '20', '800', '2023-06-07 10:41:37', '2023-06-07 10:41:37'),
(100, 'Dagim Tezerawor Gafat', 'Single Floor', '20', '800', '2023-06-07 10:44:02', '2023-06-07 10:44:02'),
(101, 'Dagim Tezerawor Gafat', 'Apartment', '20', '9300', '2023-06-23 19:41:23', '2023-06-23 19:41:23'),
(103, 'Dagim Tezerawor Gafat', 'Apartment', '20', '9300', '2023-06-23 19:51:37', '2023-06-23 19:51:37'),
(104, 'Dagim Tezerawor Gafat', 'Apartment', '30', '13950', '2023-06-23 19:54:55', '2023-06-23 19:54:55'),
(105, 'Dagim Tezerawor Gafat', 'Single Floor', '20', '800', '2023-06-26 19:07:08', '2023-06-26 19:07:08'),
(106, 'Dagim Tezerawor Gafat', 'Single Floor', '20', '800', '2023-06-26 19:46:15', '2023-06-26 19:46:15'),
(107, 'Tezerawork Gafat', 'Apartment', '20', '9300', '2023-06-26 19:48:37', '2023-06-26 19:48:37'),
(110, 'Dagim Tezerawor Gafat', 'Apartment,Single Floor', '20,20', '9300,800', '2023-06-26 19:52:31', '2023-06-26 19:52:31'),
(111, 'Dagim Tezerawor Gafat', 'Apartment', '20', '9300', '2023-06-26 19:53:24', '2023-06-26 19:53:24'),
(112, 'Dagim Tezerawor Gafat', 'Single Floor', '20', '800', '2023-06-26 19:58:16', '2023-06-26 19:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `ID` int(10) NOT NULL,
  `First_Name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`ID`, `First_Name`, `email`, `body`, `creation_time`) VALUES
(1, 'Birhanu', 'birhanuworku2011@gmail.com', 'Helllow how are you', '2023-05-22 17:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `ID` int(15) NOT NULL,
  `Creation_Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(15) NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `Profile_picture` varchar(100) NOT NULL,
  `Age` int(3) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `phone_Number` varchar(15) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Verification_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='All the informations of registered users will be here.';

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`ID`, `Creation_Time`, `update_time`, `username`, `First_Name`, `Last_Name`, `Profile_picture`, `Age`, `Email`, `Password`, `phone_Number`, `city`, `address`, `Verification_code`) VALUES
(34, '2023-04-28 18:04:43', '2023-04-28 18:04:43', 'theLight', 'Thelight', 'Thegold', 'img/userProfile/F150.jpg', 21, 'thelightthegold@gmail.com', '$2y$10$kCJ9o8ouSBr2uqYxzCrOLOAHgXolTvCRUxxD/cjU/4QRQYvLLBby2', '+25190597107', '', 'Addis Ababa, Kilinto ማረሚያ ቤት', 0),
(35, '2023-04-28 19:25:45', '2023-04-28 19:25:45', 'birhanu', 'Birhanu', 'Worku', 'img/userProfile/F150.jpg', 21, 'birhanuworku2011@gmail.com', '$2y$10$/eT8gzrTYQv4TILSbk2i1.iJBwEwLWO4X9oRshgo2HxdkwyDDXF2W', '0905971074', '', 'Addis Ababa, Tulu Dimtu', 686786),
(36, '2023-05-02 14:46:56', '2023-05-02 14:46:56', 'Abebe', 'Abebe', 'Kebede', 'img/userProfile/F150.jpg', 21, 'yeyuyiyayieyyo@gmail.com', '$2y$10$a.IFdTwgpyh/j/TNPVoK7.pGzJvn1LulKc7oP9fhIdqdw0sQIoBsC', '', 'Addis', '', 0),
(39, '2023-05-22 06:25:06', '2023-05-22 06:25:06', 'Abebere', 'Abebachin', 'Kebede', 'img/userProfile/photo_2023-04-18_13-00-11.jpg', 43, 'yekuaraanbessa1811@gmail.com', '$2y$10$C1TY.bSAp0lMT.esscDBNODVZBl5YcFYJkBBmaePkStZYxS0V.yO.', '', 'Addis', '', 0),
(40, '2023-05-22 07:23:10', '2023-05-22 07:23:10', 'asdffsad', 'sdfashfgsr', 'rwerqwrfsd', '', 234, 'yekuaraanbessa1811@gmail.com', '$2y$10$FbY/zvz/Gczt6lQBLBfRgu1oOCSnIZPZV83gbNxx.Zi2d1/q1JOfy', '', '', '', 0),
(41, '2023-06-05 09:38:06', '2023-06-05 09:38:06', 'Dagimtezerawork', 'Dagim Tezerawor', 'Gafat', 'img/userProfile/cropped-IMG_20220725_210805.jpg', 22, 'dagitezerawork@gmail.com', '$2y$10$80ZA0WGvcP8oWIC3UOiAv.C1a/qhRa9d77i0R11C44PONdViuUnyO', '', 'Addis', '', 705490),
(42, '2023-06-05 14:11:14', '2023-06-05 14:11:14', 'sssuuussss', 'Tsehaye', 'Sebhatu', '', 33, 'tsehayesebhatu11@gmail.com', '$2y$10$iLijrR5wce.eu34fToiBpe7L.jan2me0G4SX5tJgm3Yg1cItJgoJ6', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
