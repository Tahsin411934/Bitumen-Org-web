-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 10:40 AM
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
-- Database: `rahman_corporation`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` bigint(20) UNSIGNED NOT NULL,
  `customername` varchar(255) NOT NULL,
  `customerType` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city_district` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactperson` varchar(100) DEFAULT NULL,
  `contactperson_mobile` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `customername`, `customerType`, `address`, `city_district`, `phone`, `email`, `contactperson`, `contactperson_mobile`, `created_at`, `updated_at`) VALUES
(1001, 'Hiram Nicholson', 'Incididunt non modi', 'Fugiat nulla eu hic', '99', '+1 (499) 625-7886', 'xumigot@mailinator.com', 'Sunt ullam libero te', 'Rerum ipsam est temp', '2024-11-25 02:59:27', '2024-12-01 02:45:20'),
(1002, 'Leilani Battle', NULL, 'Optio assumenda pla', 'ddf', NULL, NULL, 'Minim consequuntur s', 'Atque sed voluptatem', '2024-12-01 02:44:32', '2024-12-01 02:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `challanno` bigint(20) UNSIGNED NOT NULL,
  `gross_weight` float DEFAULT NULL,
  `empty_weight` float DEFAULT NULL,
  `net_weight` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `itemcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`challanno`, `gross_weight`, `empty_weight`, `net_weight`, `created_at`, `updated_at`, `itemcode`) VALUES
(1239, 14, 3.45, 10.54, '2024-12-01 02:27:17', '2024-12-01 02:27:17', '100'),
(1240, 14, 3.45, 10.54, '2024-12-01 02:28:46', '2024-12-01 02:28:46', '100'),
(1241, 13.999, 3.454, 10.544, '2024-12-01 02:35:13', '2024-12-01 02:35:13', '100'),
(1242, 13.999, 3.4545, 10.5445, '2024-12-01 02:38:54', '2024-12-01 02:38:54', '100'),
(1243, 13.99, 3.45, 10.54, '2024-12-01 02:39:07', '2024-12-01 02:39:07', '100'),
(1244, 13.999, 3.45, 10.549, '2024-12-01 02:39:18', '2024-12-01 02:39:18', '100'),
(1245, 32.87, 8.87, 24, '2024-12-01 03:02:46', '2024-12-01 03:02:46', '100'),
(1246, 32.87, 8.877, 23.993, '2024-12-01 03:04:27', '2024-12-01 03:04:27', '100'),
(1247, 32.87, 8.877, 23.993, '2024-12-01 03:06:22', '2024-12-01 03:06:22', '100'),
(1248, 33, 3, 30, '2024-12-01 03:07:22', '2024-12-01 03:07:22', '100');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_master`
--

CREATE TABLE `delivery_master` (
  `challanno` bigint(20) UNSIGNED NOT NULL,
  `datetime` datetime NOT NULL,
  `orderno` varchar(255) DEFAULT NULL,
  `ship_to` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `truck_no` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stock_source` varchar(255) DEFAULT NULL,
  `Lock_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_master`
--

INSERT INTO `delivery_master` (`challanno`, `datetime`, `orderno`, `ship_to`, `address`, `truck_no`, `driver`, `license`, `created_at`, `updated_at`, `stock_source`, `Lock_number`) VALUES
(1239, '1993-04-23 00:00:00', NULL, NULL, 'Duis architecto iure', 'Ratione enim dolores', 'Sit explicabo Nihi', 'Sed dolor exercitati', '2024-12-01 02:27:17', '2024-12-01 02:27:17', '1', '942'),
(1240, '1993-04-23 00:00:00', NULL, NULL, 'Duis architecto iure', 'Ratione enim dolores', 'Sit explicabo Nihi', 'Sed dolor exercitati', '2024-12-01 02:28:46', '2024-12-01 02:28:46', '1', '942'),
(1241, '1993-04-23 00:00:00', NULL, NULL, 'Duis architecto iure', 'Ratione enim dolores', 'Sit explicabo Nihi', 'Sed dolor exercitati', '2024-12-01 02:35:13', '2024-12-01 02:35:13', '1', '942'),
(1242, '1993-04-23 00:00:00', NULL, NULL, 'Duis architecto iure', 'Ratione enim dolores', 'Sit explicabo Nihi', 'Sed dolor exercitati', '2024-12-01 02:38:54', '2024-12-01 02:38:54', '1', '942'),
(1243, '1993-04-23 00:00:00', NULL, NULL, 'Duis architecto iure', 'Ratione enim dolores', 'Sit explicabo Nihi', 'Sed dolor exercitati', '2024-12-01 02:39:06', '2024-12-01 02:39:06', '1', '942'),
(1244, '1993-04-23 00:00:00', NULL, NULL, 'Duis architecto iure', 'Ratione enim dolores', 'Sit explicabo Nihi', 'Sed dolor exercitati', '2024-12-01 02:39:18', '2024-12-01 02:39:18', '1', '942'),
(1245, '2024-12-01 00:00:00', '50', NULL, 'Minim esse recusanda', '3', 'John Doe', 'L1234567', '2024-12-01 03:02:46', '2024-12-01 03:02:46', '1', NULL),
(1246, '2024-12-01 00:00:00', '50', NULL, 'Minim esse recusanda', '3', 'John Doe', 'L1234567', '2024-12-01 03:04:27', '2024-12-01 03:04:27', '1', NULL),
(1247, '2024-12-01 00:00:00', '50', NULL, 'Minim esse recusanda', '3', 'John Doe', 'L1234567', '2024-12-01 03:06:22', '2024-12-01 03:06:22', '1', NULL),
(1248, '2024-12-01 00:00:00', '51', NULL, 'Minim esse recusanda', '1', 'John Doe', 'L1234567', '2024-12-01 03:07:22', '2024-12-01 03:07:22', '1', '120, 260');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `license_no` varchar(255) NOT NULL,
  `nid_no` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `truck_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `name`, `license_no`, `nid_no`, `contact_no`, `truck_id`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'L1234567', 'NID12345', '9876543210', 1, NULL, NULL),
(2, 'Jane Smith', 'L2345678', 'NID23456', '9876543211', 2, NULL, NULL),
(3, 'Michael Brown', 'L3456789', 'NID34567', '9876543212', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_no` bigint(20) UNSIGNED NOT NULL,
  `itemcode` varchar(255) NOT NULL,
  `do_invoice_no` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `uom` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `location` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sold_quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `purchase_no`, `itemcode`, `do_invoice_no`, `quantity`, `uom`, `price`, `location`, `status`, `created_at`, `updated_at`, `sold_quantity`) VALUES
(1, 1, '101', 'Ipsum ab deserunt et', 70, 'Galen', 956.00, 'In House Storage', 'Approved', '2024-11-25 22:49:13', '2024-11-26 07:27:02', 5),
(3, 2, '100', 'Quos quia ut vitae i', 53700, 'Litre', 179.00, 'Supplier Storage', 'pending', '2024-11-26 01:13:58', '2024-11-28 00:38:14', 4189),
(4, 3, '100', 'Id voluptas ipsam qu', 5957, 'Litre', 514.00, 'Supplier Storage', 'pending', '2024-11-26 06:22:15', '2024-11-26 06:22:15', 0),
(5, 4, '101', 'Ipsam quaerat veniam', 24500, 'Galen', 860.00, 'In House Storage', 'pending', '2024-11-26 10:53:29', '2024-11-26 10:56:57', 890),
(6, 5, '101', 'Dolor quis unde quia', 708, 'Galen', 166.00, 'In House Storage', 'pending', '2024-12-01 02:49:59', '2024-12-01 02:49:59', 0),
(7, 6, '101', 'Modi itaque et sint', 396, 'Galen', 135.00, 'Supplier Storage', 'pending', '2024-12-01 02:50:23', '2024-12-01 02:50:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_ledger`
--

CREATE TABLE `inventory_ledger` (
  `trxid` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `itemcode` varchar(255) NOT NULL,
  `DO_no` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `uom` varchar(255) NOT NULL,
  `challan_no` varchar(255) DEFAULT NULL,
  `order_no` varchar(255) DEFAULT NULL,
  `status` enum('verified','unverified') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplied_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_ledger`
--

INSERT INTO `inventory_ledger` (`trxid`, `date`, `itemcode`, `DO_no`, `quantity`, `uom`, `challan_no`, `order_no`, `status`, `created_at`, `updated_at`, `customer_id`, `supplied_id`) VALUES
(61, '1990-10-16', '101', 'Ipsum ab deserunt et', 13, 'Galen', '1146', '43', 'unverified', '2024-11-27 01:42:48', '2024-11-27 02:46:59', 1001, 2),
(62, '2015-01-20', '100', 'Quos quia ut vitae i', 883, 'Litre', '1147', '45', 'verified', '2024-11-27 02:49:04', '2024-11-27 03:01:33', 1001, 2),
(63, '2024-11-28', '100', 'Quos quia ut vitae i', 25, 'Litre', '1148', '46', 'verified', '2024-11-28 00:22:32', '2024-11-28 00:38:14', NULL, NULL),
(64, '2011-03-31', '100', 'Quos quia ut vitae i', 661, 'Litre', '1149', '', 'unverified', '2024-11-28 00:23:12', '2024-11-28 00:23:12', 1001, 1),
(65, '2024-11-28', '101', 'Ipsam quaerat veniam', 99, 'Galen', '1150', '47', 'unverified', '2024-11-28 00:26:47', '2024-11-28 00:26:47', NULL, NULL),
(66, '1992-01-19', '100', 'Quos quia ut vitae i', 118, 'Litre', '1151', '48', 'unverified', '2024-11-28 00:36:32', '2024-11-28 00:37:14', 1001, 2),
(67, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1152', '', 'unverified', '2024-11-28 00:43:33', '2024-11-28 00:43:33', 1001, 1),
(68, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1153', '', 'unverified', '2024-11-28 00:43:47', '2024-11-28 00:43:47', 1001, 1),
(69, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1154', '', 'unverified', '2024-11-28 00:45:35', '2024-11-28 00:45:35', 1001, 1),
(70, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1155', '', 'unverified', '2024-11-28 00:46:23', '2024-11-28 00:46:23', 1001, 1),
(71, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1156', '', 'unverified', '2024-11-28 00:46:45', '2024-11-28 00:46:45', 1001, 1),
(72, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1157', '', 'unverified', '2024-11-28 00:47:13', '2024-11-28 00:47:13', 1001, 1),
(73, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1158', '', 'unverified', '2024-11-28 00:47:41', '2024-11-28 00:47:41', 1001, 1),
(74, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1159', '', 'unverified', '2024-11-28 00:48:30', '2024-11-28 00:48:30', 1001, 1),
(75, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1160', '', 'unverified', '2024-11-28 00:49:10', '2024-11-28 00:49:10', 1001, 1),
(76, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1161', '', 'unverified', '2024-11-28 00:51:01', '2024-11-28 00:51:01', 1001, 1),
(77, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1162', '', 'unverified', '2024-11-28 00:51:27', '2024-11-28 00:51:27', 1001, 1),
(78, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1163', '', 'unverified', '2024-11-28 00:51:47', '2024-11-28 00:51:47', 1001, 1),
(79, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1164', '', 'unverified', '2024-11-28 00:52:17', '2024-11-28 00:52:17', 1001, 1),
(80, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1165', '', 'unverified', '2024-11-28 00:52:43', '2024-11-28 00:52:43', 1001, 1),
(81, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1166', '', 'unverified', '2024-11-28 00:53:25', '2024-11-28 00:53:25', 1001, 1),
(82, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1167', '', 'unverified', '2024-11-28 00:54:44', '2024-11-28 00:54:44', 1001, 1),
(83, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1168', '', 'unverified', '2024-11-28 00:55:48', '2024-11-28 00:55:48', 1001, 1),
(84, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1169', '', 'unverified', '2024-11-28 00:57:11', '2024-11-28 00:57:11', 1001, 1),
(85, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1170', '', 'unverified', '2024-11-28 00:58:04', '2024-11-28 00:58:04', 1001, 1),
(86, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1171', '', 'unverified', '2024-11-28 00:58:42', '2024-11-28 00:58:42', 1001, 1),
(87, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1172', '', 'unverified', '2024-11-28 00:59:03', '2024-11-28 00:59:03', 1001, 1),
(88, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1173', '', 'unverified', '2024-11-28 01:02:31', '2024-11-28 01:02:31', 1001, 1),
(89, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1174', '', 'unverified', '2024-11-28 01:02:41', '2024-11-28 01:02:41', 1001, 1),
(90, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1175', '', 'unverified', '2024-11-28 01:02:54', '2024-11-28 01:02:54', 1001, 1),
(91, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1176', '', 'unverified', '2024-11-28 01:03:21', '2024-11-28 01:03:21', 1001, 1),
(92, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1177', '', 'unverified', '2024-11-28 01:03:40', '2024-11-28 01:03:40', 1001, 1),
(93, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1178', '', 'unverified', '2024-11-28 01:04:03', '2024-11-28 01:04:03', 1001, 1),
(94, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1179', '', 'unverified', '2024-11-28 01:04:43', '2024-11-28 01:04:43', 1001, 1),
(95, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1180', '', 'unverified', '2024-11-28 01:06:39', '2024-11-28 01:06:39', 1001, 1),
(96, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1181', '', 'unverified', '2024-11-28 01:09:14', '2024-11-28 01:09:14', 1001, 1),
(97, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1182', '', 'unverified', '2024-11-28 01:11:51', '2024-11-28 01:11:51', 1001, 1),
(98, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1183', '', 'unverified', '2024-11-28 01:14:14', '2024-11-28 01:14:14', 1001, 1),
(99, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1184', '', 'unverified', '2024-11-28 01:14:42', '2024-11-28 01:14:42', 1001, 1),
(100, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1185', '', 'unverified', '2024-11-28 01:15:16', '2024-11-28 01:15:16', 1001, 1),
(101, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1186', '', 'unverified', '2024-11-28 01:15:49', '2024-11-28 01:15:49', 1001, 1),
(102, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1187', '', 'unverified', '2024-11-28 01:16:17', '2024-11-28 01:16:17', 1001, 1),
(103, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1188', '', 'unverified', '2024-11-28 01:17:08', '2024-11-28 01:17:08', 1001, 1),
(104, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1189', '', 'unverified', '2024-11-28 01:18:59', '2024-11-28 01:18:59', 1001, 1),
(105, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1190', '', 'unverified', '2024-11-28 01:19:39', '2024-11-28 01:19:39', 1001, 1),
(106, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1191', '', 'unverified', '2024-11-28 01:20:17', '2024-11-28 01:20:17', 1001, 1),
(107, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1192', '', 'unverified', '2024-11-28 01:24:26', '2024-11-28 01:24:26', 1001, 1),
(108, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1193', '', 'unverified', '2024-11-28 01:26:19', '2024-11-28 01:26:19', 1001, 1),
(109, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1194', '', 'unverified', '2024-11-28 01:28:03', '2024-11-28 01:28:03', 1001, 1),
(110, '1999-02-16', '100', 'Quos quia ut vitae i', 475, 'Litre', '1195', '', 'unverified', '2024-11-28 01:29:21', '2024-11-28 01:29:21', 1001, 1),
(111, '2017-10-19', '101', 'Ipsam quaerat veniam', 149, 'Galen', '1196', '', 'unverified', '2024-11-28 01:33:04', '2024-11-28 01:33:04', 1001, 1),
(112, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1197', '', 'unverified', '2024-12-01 01:15:14', '2024-12-01 01:15:14', 1001, 1),
(113, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1198', '', 'unverified', '2024-12-01 01:15:41', '2024-12-01 01:15:41', 1001, 1),
(114, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1199', '', 'unverified', '2024-12-01 01:19:26', '2024-12-01 01:19:26', 1001, 1),
(115, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1200', '', 'unverified', '2024-12-01 01:21:03', '2024-12-01 01:21:03', 1001, 1),
(116, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1201', '', 'unverified', '2024-12-01 01:21:55', '2024-12-01 01:21:55', 1001, 1),
(117, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1202', '', 'unverified', '2024-12-01 01:22:54', '2024-12-01 01:22:54', 1001, 1),
(118, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1203', '', 'unverified', '2024-12-01 01:24:18', '2024-12-01 01:24:18', 1001, 1),
(119, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1204', '', 'unverified', '2024-12-01 01:24:43', '2024-12-01 01:24:43', 1001, 1),
(120, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1205', '', 'unverified', '2024-12-01 01:26:08', '2024-12-01 01:26:08', 1001, 1),
(121, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1206', '', 'unverified', '2024-12-01 01:26:40', '2024-12-01 01:26:40', 1001, 1),
(122, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1207', '', 'unverified', '2024-12-01 01:27:02', '2024-12-01 01:27:02', 1001, 1),
(123, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1208', '', 'unverified', '2024-12-01 01:29:36', '2024-12-01 01:29:36', 1001, 1),
(124, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1209', '', 'unverified', '2024-12-01 01:30:51', '2024-12-01 01:30:51', 1001, 1),
(125, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1210', '', 'unverified', '2024-12-01 01:31:32', '2024-12-01 01:31:32', 1001, 1),
(126, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1211', '', 'unverified', '2024-12-01 01:32:12', '2024-12-01 01:32:12', 1001, 1),
(127, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1212', '', 'unverified', '2024-12-01 01:33:14', '2024-12-01 01:33:14', 1001, 1),
(128, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1213', '', 'unverified', '2024-12-01 01:34:22', '2024-12-01 01:34:22', 1001, 1),
(129, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1214', '', 'unverified', '2024-12-01 01:35:22', '2024-12-01 01:35:22', 1001, 1),
(130, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1215', '', 'unverified', '2024-12-01 01:36:34', '2024-12-01 01:36:34', 1001, 1),
(131, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1216', '', 'unverified', '2024-12-01 01:38:06', '2024-12-01 01:38:06', 1001, 1),
(132, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1217', '', 'unverified', '2024-12-01 01:39:13', '2024-12-01 01:39:13', 1001, 1),
(133, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1218', '', 'unverified', '2024-12-01 01:39:39', '2024-12-01 01:39:39', 1001, 1),
(134, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1219', '', 'unverified', '2024-12-01 01:40:08', '2024-12-01 01:40:08', 1001, 1),
(135, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1220', '', 'unverified', '2024-12-01 01:41:05', '2024-12-01 01:41:05', 1001, 1),
(136, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1221', '', 'unverified', '2024-12-01 01:41:30', '2024-12-01 01:41:30', 1001, 1),
(137, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1222', '', 'unverified', '2024-12-01 01:44:39', '2024-12-01 01:44:39', 1001, 1),
(138, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1223', '', 'unverified', '2024-12-01 01:46:31', '2024-12-01 01:46:31', 1001, 1),
(139, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1224', '', 'unverified', '2024-12-01 01:46:54', '2024-12-01 01:46:54', 1001, 1),
(140, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1225', '', 'unverified', '2024-12-01 01:47:45', '2024-12-01 01:47:45', 1001, 1),
(141, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1226', '', 'unverified', '2024-12-01 01:49:09', '2024-12-01 01:49:09', 1001, 1),
(142, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1227', '', 'unverified', '2024-12-01 01:49:39', '2024-12-01 01:49:39', 1001, 1),
(143, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1228', '', 'unverified', '2024-12-01 01:50:33', '2024-12-01 01:50:33', 1001, 1),
(144, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1229', '', 'unverified', '2024-12-01 01:50:45', '2024-12-01 01:50:45', 1001, 1),
(145, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1230', '', 'unverified', '2024-12-01 01:51:42', '2024-12-01 01:51:42', 1001, 1),
(146, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1231', '', 'unverified', '2024-12-01 01:53:37', '2024-12-01 01:53:37', 1001, 1),
(147, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1232', '', 'unverified', '2024-12-01 01:54:50', '2024-12-01 01:54:50', 1001, 1),
(148, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1233', '', 'unverified', '2024-12-01 01:56:23', '2024-12-01 01:56:23', 1001, 1),
(149, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1234', '', 'unverified', '2024-12-01 01:56:40', '2024-12-01 01:56:40', 1001, 1),
(150, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1235', '', 'unverified', '2024-12-01 01:56:59', '2024-12-01 01:56:59', 1001, 1),
(151, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1236', '', 'unverified', '2024-12-01 02:06:17', '2024-12-01 02:06:17', 1001, 1),
(152, '2017-03-28', '100', 'Quos quia ut vitae i', 188, 'Litre', '1237', '', 'unverified', '2024-12-01 02:07:25', '2024-12-01 02:07:25', 1001, 1),
(153, '1986-12-27', '101', 'Ipsam quaerat veniam', 232, 'Galen', '1238', '', 'unverified', '2024-12-01 02:13:27', '2024-12-01 02:13:27', 1001, 2),
(154, '1993-04-23', '100', 'Quos quia ut vitae i', 477, 'Litre', '1239', '', 'unverified', '2024-12-01 02:27:17', '2024-12-01 02:27:17', 1001, 1),
(155, '1993-04-23', '100', 'Quos quia ut vitae i', 477, 'Litre', '1240', '', 'unverified', '2024-12-01 02:28:46', '2024-12-01 02:28:46', 1001, 1),
(156, '1993-04-23', '100', 'Quos quia ut vitae i', 477, 'Litre', '1241', '', 'unverified', '2024-12-01 02:35:13', '2024-12-01 02:35:13', 1001, 1),
(157, '1993-04-23', '100', 'Quos quia ut vitae i', 477, 'Litre', '1242', '', 'unverified', '2024-12-01 02:38:54', '2024-12-01 02:38:54', 1001, 1),
(158, '1993-04-23', '100', 'Quos quia ut vitae i', 477, 'Litre', '1243', '', 'unverified', '2024-12-01 02:39:07', '2024-12-01 02:39:07', 1001, 1),
(159, '1993-04-23', '100', 'Quos quia ut vitae i', 477, 'Litre', '1244', '', 'unverified', '2024-12-01 02:39:18', '2024-12-01 02:39:18', 1001, 1),
(160, '2024-12-01', '100', 'Quos quia ut vitae i', 267, 'Litre', '1245', '50', 'unverified', '2024-12-01 03:02:46', '2024-12-01 03:02:46', NULL, NULL),
(161, '2024-12-01', '100', 'Quos quia ut vitae i', 267, 'Litre', '1246', '50', 'unverified', '2024-12-01 03:04:27', '2024-12-01 03:04:27', NULL, NULL),
(162, '2024-12-01', '100', 'Quos quia ut vitae i', 267, 'Litre', '1247', '50', 'unverified', '2024-12-01 03:06:22', '2024-12-01 03:06:22', NULL, NULL),
(163, '2024-12-01', '100', 'Quos quia ut vitae i', 267, 'Litre', '1248', '51', 'unverified', '2024-12-01 03:07:22', '2024-12-01 03:07:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_06_171754_create_products_table', 1),
(6, '2024_11_07_055142_create_suppliers_table', 1),
(7, '2024_11_08_154611_create_customers_table', 1),
(8, '2024_11_09_063002_create_purchase_master_table', 1),
(9, '2024_11_09_063048_create_purchase_detail_table', 1),
(10, '2024_11_09_164820_create_inventory_table', 1),
(11, '2024_11_10_072001_create_orders_table', 1),
(12, '2024_11_10_072022_create_order_details_table', 1),
(13, '2024_11_11_071309_create_trucks_table', 1),
(14, '2024_11_11_071321_create_drivers_table', 1),
(15, '2024_11_11_083834_create_delivery_master_table', 1),
(16, '2024_11_11_152115_rename_client_name_to_ship_to_in_delivery_master', 1),
(17, '2024_11_12_065503_create_slipscale_table', 1),
(18, '2024_11_12_105547_add_sold_and_remaining_quantity_to_inventory_table', 1),
(19, '2024_11_12_190823_create_delivery_details_table', 1),
(20, '2024_11_26_054326_add_stock_source_to_delivery_master', 2),
(21, '2024_11_26_063825_rename_purchase_no_to_itemcode_in_delivery_details_table', 3),
(22, '2024_11_26_070159_create_inventory_ledger_table', 4),
(23, '2024_11_26_151816_add_customer_id_to_inventory_ledger_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` bigint(20) UNSIGNED NOT NULL,
  `orderdate` date NOT NULL,
  `customerid` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `deliverylocation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `remark` text DEFAULT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `orderdate`, `customerid`, `reference`, `deliverylocation`, `address`, `remark`, `contact_person`, `contact_phone`, `created_at`, `updated_at`) VALUES
(42, '2024-11-27', 1001, NULL, 'Proident alias rem', 'Dolor sint ea quia', NULL, 'Qui earum necessitat', '+1 (591) 655-3907', '2024-11-27 02:46:50', '2024-11-27 02:46:50'),
(43, '2024-11-27', 1001, NULL, 'Perspiciatis volupt', 'Minim laboris velit', NULL, 'Molestias natus cons', '+1 (272) 356-3284', '2024-11-27 02:46:59', '2024-11-27 02:46:59'),
(44, '2024-11-27', 1001, NULL, 'Corporis qui rerum i', 'Enim nulla fuga Eos', NULL, 'Eius fugiat eveniet', '+1 (597) 793-3251', '2024-11-27 02:57:21', '2024-11-27 02:57:21'),
(45, '2024-11-27', 1001, NULL, 'gsffsdg', 'sgfdsgsdg', NULL, 'tgfsdg', '55', '2024-11-27 02:58:17', '2024-11-27 02:58:17'),
(46, '2024-11-28', 1001, NULL, 'Corrupti facilis qu', 'Laboriosam expedita', NULL, 'Facilis minima dolor', '+1 (132) 164-7596', '2024-11-28 00:22:26', '2024-11-28 00:22:26'),
(47, '2024-11-28', 1001, NULL, 'Temporibus mollit od', 'Est est nemo sit iru', NULL, 'Accusantium libero s', '+1 (251) 258-2787', '2024-11-28 00:26:36', '2024-11-28 00:26:36'),
(48, '2024-11-28', 1001, NULL, 'Ut repellendus Prae', 'Architecto voluptatu', NULL, 'Eos ut doloribus od', '+1 (236) 171-3819', '2024-11-28 00:37:14', '2024-11-28 00:37:14'),
(49, '2024-12-01', 1002, NULL, 'Minim esse recusanda', 'Earum eiusmod enim r', NULL, 'Repudiandae minus vo', '+1 (885) 626-5393', '2024-12-01 02:57:12', '2024-12-01 02:57:12'),
(50, '2024-12-01', 1002, NULL, 'Minim esse recusanda', 'Earum eiusmod enim r', NULL, 'Repudiandae minus vo', '+1 (885) 626-5393', '2024-12-01 02:59:53', '2024-12-01 02:59:53'),
(51, '2024-12-01', 1002, NULL, 'Minim esse recusanda', 'Earum eiusmod enim r', NULL, 'Repudiandae minus vo', '+1 (885) 626-5393', '2024-12-01 03:07:00', '2024-12-01 03:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_no` bigint(20) UNSIGNED NOT NULL,
  `itemcode` varchar(255) NOT NULL,
  `quantity` float DEFAULT NULL,
  `uom` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_no`, `itemcode`, `quantity`, `uom`, `price`, `created_at`, `updated_at`) VALUES
(50, '100', 266.6, 'Litre', 512.00, '2024-12-01 02:59:53', '2024-12-01 02:59:53'),
(51, '100', 266.6, 'Litre', 512.00, '2024-12-01 03:07:00', '2024-12-01 03:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `itemcode` int(10) UNSIGNED NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `uom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`itemcode`, `itemname`, `uom`, `created_at`, `updated_at`) VALUES
(100, 'Bitumen 60/70', 'Litre', '2024-11-25 02:58:18', '2024-11-25 02:58:18'),
(101, 'Bitumen 60/80', 'Galen', '2024-11-25 02:58:45', '2024-11-25 02:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `purchase_no` bigint(20) UNSIGNED NOT NULL,
  `itemcode` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `uom` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `storage_location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`purchase_no`, `itemcode`, `quantity`, `uom`, `price`, `storage_location`, `created_at`, `updated_at`) VALUES
(1, '100', 300000000, 'Litre', 703.00, 'In House Storage', '2024-11-25 22:49:13', '2024-11-25 22:49:13'),
(1, '101', 73000000, 'Galen', 956.00, 'In House Storage', '2024-11-25 22:49:13', '2024-11-25 22:49:13'),
(2, '100', 53700, 'Litre', 179.00, 'Supplier Storage', '2024-11-26 01:13:58', '2024-11-26 01:13:58'),
(3, '100', 5957, 'Litre', 514.00, 'Supplier Storage', '2024-11-26 06:22:15', '2024-11-26 06:22:15'),
(4, '101', 24500, 'Galen', 860.00, 'In House Storage', '2024-11-26 10:53:29', '2024-11-26 10:53:29'),
(5, '101', 708, 'Galen', 166.00, 'In House Storage', '2024-12-01 02:49:59', '2024-12-01 02:49:59'),
(6, '101', 396, 'Galen', 135.00, 'Supplier Storage', '2024-12-01 02:50:23', '2024-12-01 02:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `purchase_no` bigint(20) UNSIGNED NOT NULL,
  `purchase_date` date NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `DO_InvoiceNo` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`purchase_no`, `purchase_date`, `supplier_id`, `DO_InvoiceNo`, `remarks`, `created_at`, `updated_at`) VALUES
(1, '2004-09-21', 1, 'Ipsum ab deserunt et', 'Quia deleniti ut ill', '2024-11-25 22:49:13', '2024-11-25 22:49:13'),
(2, '1987-05-31', 1, 'Quos quia ut vitae i', 'Amet qui ea dolorem', '2024-11-26 01:13:58', '2024-11-26 01:13:58'),
(3, '1972-09-11', 1, 'Id voluptas ipsam qu', 'Eum est quo facilis', '2024-11-26 06:22:15', '2024-11-26 06:22:15'),
(4, '1973-02-21', 1, 'Ipsam quaerat veniam', 'Perferendis esse si', '2024-11-26 10:53:29', '2024-11-26 10:53:29'),
(5, '1980-01-15', 2, 'Dolor quis unde quia', NULL, '2024-12-01 02:49:59', '2024-12-01 02:49:59'),
(6, '1970-09-21', 2, 'Modi itaque et sint', NULL, '2024-12-01 02:50:22', '2024-12-01 02:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `slipscale`
--

CREATE TABLE `slipscale` (
  `slipno` bigint(20) UNSIGNED NOT NULL,
  `orderno` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `ticketno` varchar(255) NOT NULL,
  `first_weight_date` timestamp NULL DEFAULT NULL,
  `first_weight_time` time DEFAULT NULL,
  `first_weight_ref` varchar(255) DEFAULT NULL,
  `second_weight_date` timestamp NULL DEFAULT NULL,
  `second_weight_time` time DEFAULT NULL,
  `second_weight_ref` varchar(255) DEFAULT NULL,
  `duration_on_site` decimal(8,2) DEFAULT NULL,
  `operator` varchar(255) NOT NULL,
  `vehicle_regi` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplied_id` bigint(20) UNSIGNED NOT NULL,
  `suppliername` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplied_id`, `suppliername`, `address`, `city`, `contact_person`, `mobile`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Rinah Burnett', 'Sed eos do incididu', 'Nisi aliqua Cupidit', 'Amet cupiditate rem', '50', 'xarerexoq@mailinator.com', '2024-11-25 02:59:01', '2024-11-25 02:59:01'),
(2, 'Maya Phillips', 'Maxime non ipsa nos', 'Sunt occaecat facil', 'Qui aut suscipit con', '62', 'calyb@mailinator.com', '2024-11-25 02:59:08', '2024-11-25 02:59:08'),
(3, 'Hanae Hoover', 'uyu', 'Rem laboriosam inve', NULL, '21', NULL, '2024-12-01 03:38:31', '2024-12-01 03:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `truck_id` bigint(20) UNSIGNED NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `capacity` decimal(10,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `chassis_no` varchar(255) NOT NULL,
  `tier_count` int(11) NOT NULL,
  `tier_size` varchar(255) NOT NULL,
  `mileage` decimal(8,2) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`truck_id`, `reg_no`, `capacity`, `type`, `brand`, `year`, `chassis_no`, `tier_count`, `tier_size`, `mileage`, `fuel_type`, `created_at`, `updated_at`) VALUES
(1, 'ABC123', 10.50, 'Flatbed', 'Volvo', '2015', 'CHASSIS001', 6, '265/75R16', 120000.00, 'Diesel', NULL, NULL),
(2, 'DEF456', 15.00, 'Refrigerated', 'Mercedes', '2018', 'CHASSIS002', 8, '275/70R16', 80000.00, 'Diesel', NULL, NULL),
(3, 'GHI789', 12.00, 'Flatbed', 'Scania', '2020', 'CHASSIS003', 6, '285/75R16', 40000.00, 'Diesel', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joy Peterson', 'hukusywut@mailinator.com', 'Joy Peterson', NULL, '$2y$12$mZZM9mg3.yhAnpWsjUKuze2EStsZWOK.pZbWLCX7r/BoKgaEQYrtO', 'In1arP2xtCKGWBDXG7L8RhsVqP2DHNKa0m64qMDThyu39Bc6B4PPAOhyANVd', '2024-11-25 02:57:41', '2024-11-25 02:57:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD KEY `delivery_details_challanno_foreign` (`challanno`);

--
-- Indexes for table `delivery_master`
--
ALTER TABLE `delivery_master`
  ADD PRIMARY KEY (`challanno`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`),
  ADD KEY `drivers_truck_id_foreign` (`truck_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventory_purchase_no_itemcode_unique` (`purchase_no`,`itemcode`);

--
-- Indexes for table `inventory_ledger`
--
ALTER TABLE `inventory_ledger`
  ADD PRIMARY KEY (`trxid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_details_order_no_foreign` (`order_no`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`itemcode`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`purchase_no`,`itemcode`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`purchase_no`),
  ADD KEY `purchase_master_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `slipscale`
--
ALTER TABLE `slipscale`
  ADD PRIMARY KEY (`slipno`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplied_id`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`truck_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `delivery_master`
--
ALTER TABLE `delivery_master`
  MODIFY `challanno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1249;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory_ledger`
--
ALTER TABLE `inventory_ledger`
  MODIFY `trxid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `itemcode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `purchase_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slipscale`
--
ALTER TABLE `slipscale`
  MODIFY `slipno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplied_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `truck_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD CONSTRAINT `delivery_details_challanno_foreign` FOREIGN KEY (`challanno`) REFERENCES `delivery_master` (`challanno`) ON DELETE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_truck_id_foreign` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`truck_id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_purchase_no_foreign` FOREIGN KEY (`purchase_no`) REFERENCES `purchase_master` (`purchase_no`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_no_foreign` FOREIGN KEY (`order_no`) REFERENCES `orders` (`order_no`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD CONSTRAINT `purchase_detail_purchase_no_foreign` FOREIGN KEY (`purchase_no`) REFERENCES `purchase_master` (`purchase_no`);

--
-- Constraints for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD CONSTRAINT `purchase_master_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplied_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
