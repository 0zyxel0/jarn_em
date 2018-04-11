-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 07:11 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jarn_em`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `areaid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentareaid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double(8,2) DEFAULT NULL,
  `acquiredDate` date DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`areaid`, `parentareaid`, `name`, `address`, `city`, `country`, `size`, `acquiredDate`, `status`, `contact_person`, `updatedby`, `createdby`, `created_at`, `updated_at`) VALUES
('3e582137-b6c6-3124-8085-908bb3dc2ddf', NULL, 'Maragusan', 'Maragusan', 'Davao', 'Philippines', 15.10, '2018-03-16', NULL, NULL, '1', '1', '2018-03-06 07:29:28', '2018-03-06 07:29:28'),
('41bee7dd-a3b8-3555-9fbf-b26768c630b2', NULL, 'Compostela', 'Compostela', 'Compostela', 'Philippines', 2.40, '2018-03-27', NULL, NULL, '1', '1', '2018-03-06 07:29:42', '2018-03-06 07:29:42'),
('4b490ddd-2230-3b42-a284-c9a2f85721b5', NULL, 'Extension 1', 'Maragusan', 'Maragusan', 'Philippines', 12.00, '2018-03-24', NULL, NULL, '1', '1', '2018-03-06 07:29:53', '2018-03-06 07:29:53'),
('5043c674-0ebc-312e-9dd5-36439d78f3dc', NULL, 'Expansion 123', 'Expansion 123', 'Expansion 123', 'Expansion 123', 1.20, '2018-03-16', NULL, NULL, '1', '1', '2018-04-09 01:36:01', '2018-04-09 01:36:01'),
('8a5fd97e-2d92-39e5-84e3-338181033ace', '3e582137-b6c6-3124-8085-908bb3dc2ddf', 'Carina 14', 'Carina 14', 'Carina 14', 'Carina 14', 3.20, '2018-04-18', NULL, NULL, '1', '1', '2018-04-09 02:56:49', '2018-04-09 02:56:49'),
('fd425edc-7554-39f1-a02f-2967db38f6af', NULL, 'New Area', 'Panabo', 'Panabo', 'Philippines', 4.20, '2018-03-16', NULL, NULL, '1', '1', '2018-04-09 01:17:21', '2018-04-09 01:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deduction_types`
--

CREATE TABLE `deduction_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `partyid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `givenname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactnumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilstatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `isActive` int(11) NOT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`partyid`, `givenname`, `familyname`, `middlename`, `birthday`, `age`, `gender`, `religion`, `address`, `contactnumber`, `email`, `civilstatus`, `comments`, `status`, `startdate`, `enddate`, `isActive`, `updatedby`, `created_at`, `updated_at`) VALUES
('459f489c-5b10-3c17-8ede-c232b33c7db8', 'Johnny', 'Morgan', 'Cooper', '1988-12-28', 29, 'Male', NULL, 'Laurel Point, West Virginia(WV), 26505', '304-808-2972', 'francisco1981@gmail.com', 'Single', NULL, 'Full-Time', '2018-03-13', NULL, 1, '1', '2018-03-20 10:54:25', '2018-03-20 10:54:25'),
('9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'Kimberly', 'Eversole', 'Sarah', '1963-01-18', 55, 'Female', NULL, 'Vidalia, Georgia(GA), 30474', '912-244-7227', 'triston.bergstr@hotmail.com', 'Single', NULL, 'Contractual', '2018-03-22', NULL, 1, '1', '2018-03-19 08:48:34', '2018-03-19 08:48:34'),
('a6c78397-119f-34b3-bb77-098175940b48', 'James', 'Hodges', 'Roomin', '1981-07-03', 36, 'Male', NULL, 'Hanover Township, Pennsylvania(PA), 1870', '570-878-3026', 'webster1995@gmail.com', 'Single', NULL, 'Contractual', '2018-03-08', NULL, 1, '1', '2018-03-19 07:54:57', '2018-03-19 07:54:57'),
('d69620d9-3f5b-3b18-872c-701811fbba8b', 'Donald', 'Hogue', 'Romeo', '1974-01-03', 44, 'Male', NULL, 'Stanleyville, North Carolina(NC), 27045', '336-377-9392', 'lorine_kuhlm@hotmail.com', 'Single', NULL, 'Full-Time', '2018-03-13', NULL, 1, '1', '2018-03-06 07:40:13', '2018-03-06 07:40:13'),
('e53c319c-8ef3-305e-88ad-1e6c252b7f37', 'Lelia', 'Wilson', 'Dikinns', '1966-09-24', 51, 'Female', NULL, 'Davenport, Illinois(IL), 52803', '309-871-2878', 'rocky2001@yahoo.com', 'Single', NULL, 'Contractual', '2018-04-03', NULL, 1, '1', '2018-04-09 09:10:38', '2018-04-09 09:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `employee_areas`
--

CREATE TABLE `employee_areas` (
  `employeeareaid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partyid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `areaid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_areas`
--

INSERT INTO `employee_areas` (`employeeareaid`, `partyid`, `areaid`, `createdby`, `created_at`, `updated_at`) VALUES
('9b5337fd-525a-3fa2-97d9-24a21c68b8af', 'd69620d9-3f5b-3b18-872c-701811fbba8b', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '1', '2018-03-06 07:40:13', '2018-03-06 07:40:13'),
('4732afae-14c9-3541-9fe7-33bc86a3c9ce', 'fc173735-cd2e-333d-9a20-24a21a89b333', '41bee7dd-a3b8-3555-9fbf-b26768c630b2', '1', '2018-03-19 07:55:21', '2018-03-19 07:55:21'),
('9c92c86e-6b76-3c23-919c-1279bb138bc5', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '1', '2018-03-19 08:48:34', '2018-03-19 08:48:34'),
('7725161b-c672-3610-aca1-d598de067f7d', '459f489c-5b10-3c17-8ede-c232b33c7db8', '4b490ddd-2230-3b42-a284-c9a2f85721b5', '1', '2018-03-20 10:54:25', '2018-03-20 10:54:25'),
('5289dd7d-f619-3900-9307-e4a5b76babfd', 'e53c319c-8ef3-305e-88ad-1e6c252b7f37', '8a5fd97e-2d92-39e5-84e3-338181033ace', '1', '2018-04-09 09:10:38', '2018-04-09 09:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `employee_deductions`
--

CREATE TABLE `employee_deductions` (
  `id` int(10) UNSIGNED NOT NULL,
  `deduction_typeid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partyid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_government_details`
--

CREATE TABLE `employee_government_details` (
  `detailid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partyid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `government_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_government_details`
--

INSERT INTO `employee_government_details` (`detailid`, `partyid`, `name`, `government_num`, `createdby`, `created_at`, `updated_at`) VALUES
('dc7ee853-8c87-3b22-8f3d-087f4756b34e', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 'SSS', '321321654', '1', '2018-03-06 07:40:13', '2018-03-06 07:40:13'),
('fdcf77ae-d0e6-3794-9455-48c7e2becdf9', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 'PHILHEALTH', '3216549', '1', '2018-03-06 07:40:14', '2018-03-06 07:40:14'),
('dbc1c73c-fddc-3849-acfd-d5ee3da0a67e', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 'PAGIBIG', '321654984', '1', '2018-03-06 07:40:14', '2018-03-06 07:40:14'),
('f7d1fc2a-24ab-3f96-81d8-3d72fe5833c0', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 'TIN', '3216854981', '1', '2018-03-06 07:40:14', '2018-03-06 07:40:14'),
('b40fa8be-3ca8-357d-8694-e8fc59be3249', 'fc173735-cd2e-333d-9a20-24a21a89b333', 'SSS', '78274517417452', '1', '2018-03-19 07:55:22', '2018-03-19 07:55:22'),
('890d584f-2396-3ea9-9322-b4ff2daf033c', 'fc173735-cd2e-333d-9a20-24a21a89b333', 'PHILHEALTH', '752741741', '1', '2018-03-19 07:55:22', '2018-03-19 07:55:22'),
('33f22805-4b80-3ad9-85b4-6d5b0ca3e455', 'fc173735-cd2e-333d-9a20-24a21a89b333', 'PAGIBIG', '2785385274217', '1', '2018-03-19 07:55:22', '2018-03-19 07:55:22'),
('dd34b158-35cd-3658-a519-b9173c0f4aef', 'fc173735-cd2e-333d-9a20-24a21a89b333', 'TIN', '41742742', '1', '2018-03-19 07:55:22', '2018-03-19 07:55:22'),
('04c4a1cb-899d-3869-8a0f-0eb2dbec74e5', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'SSS', '427427427', '1', '2018-03-19 08:48:34', '2018-03-19 08:48:34'),
('e6cbde30-7bec-32b8-ba96-474c38aa779c', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'PHILHEALTH', '42742767867852', '1', '2018-03-19 08:48:34', '2018-03-19 08:48:34'),
('8afcb30c-76d3-36ac-bb76-c26486299219', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'PAGIBIG', '786387863877', '1', '2018-03-19 08:48:34', '2018-03-19 08:48:34'),
('7f4909aa-96be-33f2-81ef-cb17416904f0', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'TIN', '527412767867', '1', '2018-03-19 08:48:34', '2018-03-19 08:48:34'),
('e20c1168-d0a6-3dd8-b5a3-8d10d92d11f7', '459f489c-5b10-3c17-8ede-c232b33c7db8', 'SSS', '1231564987', '1', '2018-03-20 10:54:25', '2018-03-20 10:54:25'),
('164e3881-34ca-3cc1-a812-cd8be89433b2', '459f489c-5b10-3c17-8ede-c232b33c7db8', 'PHILHEALTH', '1231654687', '1', '2018-03-20 10:54:25', '2018-03-20 10:54:25'),
('0230c89f-5d4a-3477-86eb-e17b833d0669', '459f489c-5b10-3c17-8ede-c232b33c7db8', 'PAGIBIG', '621651684', '1', '2018-03-20 10:54:25', '2018-03-20 10:54:25'),
('3eedb12c-214a-3c4c-bbcf-89a58dbd8356', '459f489c-5b10-3c17-8ede-c232b33c7db8', 'TIN', '321351687', '1', '2018-03-20 10:54:25', '2018-03-20 10:54:25'),
('d62084c9-1612-3d13-9c08-a6bb243c369c', 'e53c319c-8ef3-305e-88ad-1e6c252b7f37', 'SSS', '1324123412341234', '1', '2018-04-09 09:10:38', '2018-04-09 09:10:38'),
('1faf10e7-5c38-3a24-be5e-f75bebdb0f4e', 'e53c319c-8ef3-305e-88ad-1e6c252b7f37', 'PHILHEALTH', '1234123412341234', '1', '2018-04-09 09:10:38', '2018-04-09 09:10:38'),
('084041d5-0c47-3c1c-afcd-a347c1276f36', 'e53c319c-8ef3-305e-88ad-1e6c252b7f37', 'PAGIBIG', '3456356745674', '1', '2018-04-09 09:10:38', '2018-04-09 09:10:38'),
('b422745b-d521-3f9b-b0b7-278ad0e12e1e', 'e53c319c-8ef3-305e-88ad-1e6c252b7f37', 'TIN', '123413613476', '1', '2018-04-09 09:10:38', '2018-04-09 09:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `employee_images`
--

CREATE TABLE `employee_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `imageid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageurl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `partyid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedBy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_images`
--

INSERT INTO `employee_images` (`id`, `imageid`, `imageurl`, `partyid`, `updatedBy`, `created_at`, `updated_at`) VALUES
(1, '739df7b4-de82-31cc-bc24-c66b4f3bff53', 'public/photo_library/739df7b4-de82-31cc-bc24-c66b4f3bff53.jpeg', 'e53c319c-8ef3-305e-88ad-1e6c252b7f37', 'Admin', '2018-04-09 09:11:29', '2018-04-09 09:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salaries`
--

CREATE TABLE `employee_salaries` (
  `salaryid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_rate` double(8,2) NOT NULL,
  `partyid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salaries`
--

INSERT INTO `employee_salaries` (`salaryid`, `daily_rate`, `partyid`, `updatedby`, `created_at`, `updated_at`) VALUES
('1cf7ceaf-902b-3891-bd83-bce9291f14ec', 220.00, 'd69620d9-3f5b-3b18-872c-701811fbba8b', '1', '2018-03-06 07:40:13', '2018-03-06 07:40:13'),
('ba7f922c-24c1-3c6e-8890-3a00e4696353', 220.00, 'fc173735-cd2e-333d-9a20-24a21a89b333', '1', '2018-03-19 07:55:21', '2018-03-19 07:55:21'),
('e0ba326b-c8d1-38d5-9439-4188328668fa', 210.00, '9fae38b1-d7e8-383c-a69f-59cf636bd34b', '1', '2018-03-19 08:48:34', '2018-03-19 08:48:34'),
('3e888200-1c32-368b-835f-b79f185f0a72', 120.00, '459f489c-5b10-3c17-8ede-c232b33c7db8', '1', '2018-03-20 10:54:25', '2018-03-20 10:54:25'),
('7b25f428-859e-3913-9f29-e8bd6b44fce1', 74.50, 'e53c319c-8ef3-305e-88ad-1e6c252b7f37', '1', '2018-04-09 09:10:38', '2018-04-09 09:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `employee_teams`
--

CREATE TABLE `employee_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `teamid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userpartyid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `areaid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_teams`
--

INSERT INTO `employee_teams` (`id`, `teamid`, `name`, `userpartyid`, `areaid`, `isAdmin`, `updatedby`, `created_at`, `updated_at`) VALUES
(1, 'f2a2b7c2-7e8f-323f-9227-bb52683f9a17', 'Team 1', NULL, '3e582137-b6c6-3124-8085-908bb3dc2ddf', 1, '1', '2018-03-06 07:30:02', '2018-03-06 07:30:02'),
(2, '707652eb-7acd-3da7-8933-5f0c6d944c36', 'Team 2', NULL, '41bee7dd-a3b8-3555-9fbf-b26768c630b2', 1, '1', '2018-03-06 07:30:08', '2018-03-06 07:30:08'),
(3, '1cdedfc7-0a29-33e9-8034-65c4631c2d73', 'Team 3', NULL, '4b490ddd-2230-3b42-a284-c9a2f85721b5', 1, '1', '2018-03-06 07:30:15', '2018-03-06 07:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `employee_team_assignments`
--

CREATE TABLE `employee_team_assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `partyid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teamid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_team_assignments`
--

INSERT INTO `employee_team_assignments` (`id`, `partyid`, `teamid`, `updatedby`, `created_at`, `updated_at`) VALUES
(1, 'd69620d9-3f5b-3b18-872c-701811fbba8b', 'f2a2b7c2-7e8f-323f-9227-bb52683f9a17', '1', '2018-03-06 07:40:13', '2018-03-06 07:40:13'),
(2, 'fc173735-cd2e-333d-9a20-24a21a89b333', '707652eb-7acd-3da7-8933-5f0c6d944c36', '1', '2018-03-19 07:55:21', '2018-03-19 07:55:21'),
(3, '9fae38b1-d7e8-383c-a69f-59cf636bd34b', '1cdedfc7-0a29-33e9-8034-65c4631c2d73', '1', '2018-03-19 08:48:34', '2018-03-19 08:48:34'),
(4, '459f489c-5b10-3c17-8ede-c232b33c7db8', '707652eb-7acd-3da7-8933-5f0c6d944c36', '1', '2018-03-20 10:54:25', '2018-03-20 10:54:25'),
(5, 'e53c319c-8ef3-305e-88ad-1e6c252b7f37', '1cdedfc7-0a29-33e9-8034-65c4631c2d73', '1', '2018-04-09 09:10:38', '2018-04-09 09:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_01_01_000000_create_pages_table', 1),
(6, '2016_01_01_000000_create_posts_table', 1),
(7, '2016_02_15_204651_create_categories_table', 1),
(8, '2016_05_19_173453_create_menu_table', 1),
(9, '2016_10_21_190000_create_roles_table', 1),
(10, '2016_10_21_190000_create_settings_table', 1),
(11, '2016_11_30_135954_create_permission_table', 1),
(12, '2016_11_30_141208_create_permission_role_table', 1),
(13, '2016_12_26_201236_data_types__add__server_side', 1),
(14, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(15, '2017_01_14_005015_create_translations_table', 1),
(16, '2017_01_15_000000_add_permission_group_id_to_permissions_table', 1),
(17, '2017_01_15_000000_create_permission_groups_table', 1),
(18, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(19, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(20, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(21, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(22, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(23, '2017_08_05_000000_add_group_to_settings_table', 1),
(24, '2018_01_14_094904_create_employees_table', 1),
(25, '2018_01_14_095438_create_payrolls_table', 1),
(26, '2018_01_14_130937_create_employee_teams_table', 1),
(27, '2018_01_22_154750_create_areas_table', 1),
(28, '2018_01_30_152816_create_employee_images_table', 1),
(29, '2018_01_30_162731_create_employee_salaries_table', 1),
(30, '2018_02_02_151915_create_employee_team_assignments_table', 1),
(31, '2018_02_09_164208_create_projects_table', 1),
(32, '2018_02_17_161457_create_deduction_types_table', 1),
(33, '2018_02_17_161647_create_employee_deductions_table', 1),
(34, '2018_02_17_173851_create_schedules_table', 1),
(35, '2018_02_17_175723_create_employee_government_details_table', 1),
(36, '2018_02_20_035235_create_schedule_attendances_table', 1),
(37, '2018_02_21_154519_create_employee_areas_table', 1),
(38, '2018_02_26_154712_create_schedule_attendance_statuses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `payrollid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentdate` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `projectid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(8,2) NOT NULL,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectid`, `project_name`, `project_code`, `rate`, `updatedby`, `created_at`, `updated_at`) VALUES
(1, '466ace49-e1c4-361c-91b2-e03ea2a80f07', 'Canal Cleaning', 'CNL_CLEAN', 1.50, '1', '2018-03-06 07:30:35', '2018-03-06 07:30:35'),
(2, 'b8299df6-2b6f-384b-8055-bbbeb1239994', 'Chem Spray', 'CHEMSP', 2.00, '1', '2018-03-06 07:30:55', '2018-03-06 07:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `scheduleid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_number` int(11) NOT NULL,
  `week_number` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`scheduleid`, `year_number`, `week_number`, `startdate`, `enddate`, `createdby`, `isActive`, `created_at`, `updated_at`) VALUES
('2694c946-b262-3a56-8b71-9c5f529f778f', 2018, 1, '2018-01-01', '2018-01-06', '1', 0, '2018-03-06 07:40:37', '2018-03-06 07:40:37'),
('8349f67b-e6bf-3a10-99cf-8e53b5c7f999', 2018, 2, '2018-01-07', '2018-01-13', '1', 0, '2018-03-06 07:46:00', '2018-03-06 07:46:00'),
('803f5360-57f4-36a5-a125-742836093efc', 2018, 3, '2018-01-14', '2018-01-20', '1', 0, '2018-03-07 08:21:55', '2018-03-07 08:21:55'),
('318d24fb-cd4a-3fd4-a46e-b74447279e23', 2018, 4, '2018-01-21', '2018-01-27', '1', 0, '2018-03-20 07:30:37', '2018-03-20 07:30:37'),
('cac1c3eb-7e2d-3e47-bf2b-201b73f13f18', 2018, 5, '2018-01-28', '2018-02-03', '1', 0, '2018-04-09 01:31:12', '2018-04-09 01:31:12'),
('c7401bdd-048d-3677-b473-c3e8f6e74ebd', 2018, 6, '2018-02-04', '2018-02-10', '1', 0, '2018-04-09 01:35:39', '2018-04-09 01:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_attendances`
--

CREATE TABLE `schedule_attendances` (
  `scheduleattendanceid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduleid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partyid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isPresent` tinyint(1) NOT NULL,
  `presenttype` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timein` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timeout` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `areaid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projectid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_attendances`
--

INSERT INTO `schedule_attendances` (`scheduleattendanceid`, `scheduleid`, `partyid`, `isPresent`, `presenttype`, `timein`, `timeout`, `startdate`, `enddate`, `areaid`, `projectid`, `createdby`, `created_at`, `updated_at`) VALUES
('04fb7193-792d-38d0-b0cc-bc21834b6ceb', '2694c946-b262-3a56-8b71-9c5f529f778f', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 1, NULL, NULL, NULL, '2018-01-01', '2018-01-01', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('0cf4547b-e0ce-38d7-b1b3-4e6491632b74', '318d24fb-cd4a-3fd4-a46e-b74447279e23', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 1, NULL, NULL, NULL, '2018-01-24', '2018-01-24', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('0e195b07-1b82-3d92-902c-5f19c9a8ceee', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-10', '2018-01-10', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('0e9798d4-f012-3070-a5da-a02af0795c25', '2694c946-b262-3a56-8b71-9c5f529f778f', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-02', '2018-01-02', '3e582137-b6c6-3124-8085-908bb3dc2ddf', 'b8299df6-2b6f-384b-8055-bbbeb1239994', '1', NULL, NULL),
('1bd9375a-4185-3e46-8387-a0cfadb8715c', '803f5360-57f4-36a5-a125-742836093efc', 'a6c78397-119f-34b3-bb77-098175940b48', 1, NULL, NULL, NULL, '2018-02-12', '2018-02-12', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('379f39d4-aee6-36d8-a628-d66d3b93d1a3', '803f5360-57f4-36a5-a125-742836093efc', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-18', '2018-01-18', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('3ec08417-a5fb-363e-8366-7c230926dd1a', '803f5360-57f4-36a5-a125-742836093efc', 'a6c78397-119f-34b3-bb77-098175940b48', 1, NULL, NULL, NULL, '2018-02-14', '2018-02-14', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('409e2129-9321-3753-8a2f-1e24b741fcaa', '803f5360-57f4-36a5-a125-742836093efc', 'a6c78397-119f-34b3-bb77-098175940b48', 1, NULL, NULL, NULL, '2018-02-16', '2018-02-16', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('47b1f2e7-ca17-3bdc-91e7-e063eb0e46a7', '803f5360-57f4-36a5-a125-742836093efc', 'a6c78397-119f-34b3-bb77-098175940b48', 1, NULL, NULL, NULL, '2018-02-15', '2018-02-15', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('481740db-d1db-362c-8038-5760008a1f39', '2694c946-b262-3a56-8b71-9c5f529f778f', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 0, NULL, NULL, NULL, '2018-01-02', '2018-01-02', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('4b2b19e6-57b0-300a-ab3b-06b6ada8c219', '318d24fb-cd4a-3fd4-a46e-b74447279e23', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 0, NULL, NULL, NULL, '2018-01-23', '2018-01-23', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('59974995-9173-3e19-87d2-95f4943fc1ee', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-12', '2018-01-12', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('5d867d68-533b-34da-85ee-b6a5b6c8b6d5', '2694c946-b262-3a56-8b71-9c5f529f778f', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, 'Whole Day', NULL, NULL, '2018-01-05', '2018-01-05', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('72b0b0e7-05f5-34a2-bbf4-0dfaad9e68e4', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-13', '2018-01-13', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('7650a0f7-4abf-3ab3-8adb-4a691b5024b9', '318d24fb-cd4a-3fd4-a46e-b74447279e23', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-25', '2018-01-25', '3e582137-b6c6-3124-8085-908bb3dc2ddf', 'b8299df6-2b6f-384b-8055-bbbeb1239994', '1', NULL, NULL),
('789c3f21-dd5a-3990-b42b-e052527f6f3a', '2694c946-b262-3a56-8b71-9c5f529f778f', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 0, NULL, NULL, NULL, '2018-01-04', '2018-01-04', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('81da16ec-3f36-3d2a-ba51-393f4f1db8dd', '2694c946-b262-3a56-8b71-9c5f529f778f', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-03', '2018-01-03', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('8d2820b3-cf73-3b5c-b7a0-b607e5587f5d', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-25', '2018-01-25', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('90111b6f-a5a4-397c-a0b9-7cb975ffe25b', '318d24fb-cd4a-3fd4-a46e-b74447279e23', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-27', '2018-01-27', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('943888e3-7995-388c-b5d6-39bade28cf65', '803f5360-57f4-36a5-a125-742836093efc', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-14', '2018-01-14', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('95948fe7-67d4-3cfe-901c-31d608e82d56', '803f5360-57f4-36a5-a125-742836093efc', 'a6c78397-119f-34b3-bb77-098175940b48', 1, NULL, NULL, NULL, '2018-02-14', '2018-02-14', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('98b405e7-90f5-3e05-92f3-7345acd5f4ca', '2694c946-b262-3a56-8b71-9c5f529f778f', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 1, NULL, NULL, NULL, '2018-01-06', '2018-01-06', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('9a2bc9c3-8c42-3199-84d5-4a2fc443c05e', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-11', '2018-01-11', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('a55406e5-1fc5-3b95-883d-8bfd7cba2ba7', '318d24fb-cd4a-3fd4-a46e-b74447279e23', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 0, NULL, NULL, NULL, '2018-01-23', '2018-01-23', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('aea9f7de-99d4-32c3-97d0-9db804e8f0b8', '803f5360-57f4-36a5-a125-742836093efc', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-16', '2018-01-16', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('b1576054-fa0a-3123-b060-ca7f92a97ec0', '803f5360-57f4-36a5-a125-742836093efc', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 0, NULL, NULL, NULL, '2018-01-17', '2018-01-17', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('b36818fa-6aa2-35c8-b04a-d797005c0143', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 1, NULL, NULL, NULL, '2018-01-07', '2018-01-07', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('bae805c7-4280-3c72-b424-aa16b7fbd0d1', '318d24fb-cd4a-3fd4-a46e-b74447279e23', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 0, NULL, NULL, NULL, '2018-01-26', '2018-01-26', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('bedb08a2-159b-35b5-bfe0-637e5f2152c3', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 1, NULL, NULL, NULL, '2018-01-08', '2018-01-08', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('cb1bc438-063a-3150-9661-78950f528950', '803f5360-57f4-36a5-a125-742836093efc', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-19', '2018-01-19', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('d28d5a78-2a35-37ab-a38e-03ec6791a903', '2694c946-b262-3a56-8b71-9c5f529f778f', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 1, NULL, NULL, NULL, '2018-01-03', '2018-01-03', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('d50bea2a-ba70-3c74-a91a-1991d209dc9d', '318d24fb-cd4a-3fd4-a46e-b74447279e23', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-24', '2018-01-24', '3e582137-b6c6-3124-8085-908bb3dc2ddf', 'b8299df6-2b6f-384b-8055-bbbeb1239994', '1', NULL, NULL),
('dccc7837-207c-364b-b30c-3d413a485f51', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-03-24', '2018-03-24', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('dd200d2f-5e98-3501-9d04-9d315095b8c9', '2694c946-b262-3a56-8b71-9c5f529f778f', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 1, NULL, NULL, NULL, '2018-01-04', '2018-01-04', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('e422c336-f261-3c8a-9efb-d5bd41ee324d', '2694c946-b262-3a56-8b71-9c5f529f778f', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 0, NULL, NULL, NULL, '2018-01-05', '2018-01-05', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('ea35302c-c22a-39c7-b77e-6d8bcbd7d9d2', '2694c946-b262-3a56-8b71-9c5f529f778f', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-01', '2018-01-01', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('ed039a2e-76e7-396d-bd54-7882b41d8065', '318d24fb-cd4a-3fd4-a46e-b74447279e23', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 0, NULL, NULL, NULL, '2018-01-22', '2018-01-22', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('efc97bc1-b33b-3122-9167-145c8a2ae50b', '803f5360-57f4-36a5-a125-742836093efc', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 1, NULL, NULL, NULL, '2018-01-15', '2018-01-15', '3e582137-b6c6-3124-8085-908bb3dc2ddf', '466ace49-e1c4-361c-91b2-e03ea2a80f07', '1', NULL, NULL),
('f36d6256-053b-3694-8d9d-b736df4546e8', '318d24fb-cd4a-3fd4-a46e-b74447279e23', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 1, NULL, NULL, NULL, '2018-01-22', '2018-01-22', '3e582137-b6c6-3124-8085-908bb3dc2ddf', 'b8299df6-2b6f-384b-8055-bbbeb1239994', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_attendance_statuses`
--

CREATE TABLE `schedule_attendance_statuses` (
  `attendance_statusid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scheduleid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partyid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci,
  `updatedby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule_attendance_statuses`
--

INSERT INTO `schedule_attendance_statuses` (`attendance_statusid`, `scheduleid`, `partyid`, `status`, `comments`, `updatedby`, `created_at`, `updated_at`) VALUES
('14f13e8a-041c-36ec-9095-edcbbf93ab22', '2694c946-b262-3a56-8b71-9c5f529f778f', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 'Submitted', NULL, '1', '2018-03-07 08:23:23', '2018-03-07 08:23:23'),
('1868a89a-e7ce-3f2f-bcd1-2533b6ecedc6', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'Submitted', NULL, '1', '2018-03-19 09:54:07', '2018-03-19 09:54:07'),
('2bc32437-0966-3112-a07b-bcb33aee1832', '803f5360-57f4-36a5-a125-742836093efc', 'a6c78397-119f-34b3-bb77-098175940b48', 'Submitted', NULL, '1', '2018-03-19 07:57:50', '2018-03-19 07:57:50'),
('41d3b9bd-7ec7-3cc8-8c7f-a0ad3399a3c9', '2694c946-b262-3a56-8b71-9c5f529f778f', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'Submitted', NULL, '1', '2018-03-20 08:28:06', '2018-03-20 08:28:06'),
('596ff9bc-3c89-3de8-a7d1-3234f6610974', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'Submitted', NULL, '1', '2018-03-19 08:53:41', '2018-03-19 08:53:41'),
('9ff85398-ed40-3517-b1fa-197790d3d39b', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'Submitted', NULL, '1', '2018-04-07 06:40:59', '2018-04-07 06:40:59'),
('ab3931b5-fde1-3f32-8726-c76917de579e', '318d24fb-cd4a-3fd4-a46e-b74447279e23', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'Submitted', NULL, '1', '2018-03-21 07:35:33', '2018-03-21 07:35:33'),
('b2d20ee4-4197-307d-8e67-d4f0a5b8d68e', '8349f67b-e6bf-3a10-99cf-8e53b5c7f999', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 'Submitted', NULL, '1', '2018-03-07 08:24:09', '2018-03-07 08:24:09'),
('b36cba74-c00e-3959-bf53-5b15066679e4', '2694c946-b262-3a56-8b71-9c5f529f778f', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'Submitted', NULL, '1', '2018-04-07 06:46:35', '2018-04-07 06:46:35'),
('cc62acd4-c057-345c-a785-e600ca1ba077', '2694c946-b262-3a56-8b71-9c5f529f778f', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'Submitted', NULL, '1', '2018-03-20 08:29:48', '2018-03-20 08:29:48'),
('d667139a-cc1b-3ea8-af69-db5fb047ecf0', '2694c946-b262-3a56-8b71-9c5f529f778f', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'Submitted', NULL, '1', '2018-03-20 08:28:38', '2018-03-20 08:28:38'),
('dbc5391b-e453-38c6-b235-49ec77f3447a', '318d24fb-cd4a-3fd4-a46e-b74447279e23', 'd69620d9-3f5b-3b18-872c-701811fbba8b', 'Submitted', NULL, '1', '2018-03-24 04:45:05', '2018-03-24 04:45:05'),
('f759eff0-6659-3930-848c-d99443078409', '803f5360-57f4-36a5-a125-742836093efc', '9fae38b1-d7e8-383c-a69f-59cf636bd34b', 'Submitted', NULL, '1', '2018-03-19 08:49:38', '2018-03-19 08:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin@admin.com', 'users/default.png', '$2y$10$5yQNRfMaRnSaPVDh/wF2iexPWrnZcO4FLkise7/TH4vtFD1WsFe4i', NULL, '2018-03-06 07:29:03', '2018-03-06 07:29:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD UNIQUE KEY `areas_areaid_unique` (`areaid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `deduction_types`
--
ALTER TABLE `deduction_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD UNIQUE KEY `employees_partyid_unique` (`partyid`);

--
-- Indexes for table `employee_deductions`
--
ALTER TABLE `employee_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_images`
--
ALTER TABLE `employee_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_images_imageid_unique` (`imageid`);

--
-- Indexes for table `employee_teams`
--
ALTER TABLE `employee_teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_teams_teamid_unique` (`teamid`);

--
-- Indexes for table `employee_team_assignments`
--
ALTER TABLE `employee_team_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD UNIQUE KEY `payrolls_payrollid_unique` (`payrollid`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_groups_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `schedule_attendances`
--
ALTER TABLE `schedule_attendances`
  ADD UNIQUE KEY `schedule_attendances_scheduleattendanceid_unique` (`scheduleattendanceid`);

--
-- Indexes for table `schedule_attendance_statuses`
--
ALTER TABLE `schedule_attendance_statuses`
  ADD PRIMARY KEY (`attendance_statusid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_types`
--
ALTER TABLE `deduction_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_deductions`
--
ALTER TABLE `employee_deductions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_images`
--
ALTER TABLE `employee_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_teams`
--
ALTER TABLE `employee_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_team_assignments`
--
ALTER TABLE `employee_team_assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
