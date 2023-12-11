-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 03:52 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(11) UNSIGNED NOT NULL,
  `id_prospect` varchar(255) NOT NULL,
  `type_activity` varchar(60) NOT NULL,
  `created_message` datetime DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `status_activity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admitted`
--

CREATE TABLE `admitted` (
  `id_admitted` int(11) UNSIGNED NOT NULL,
  `id_prospect` varchar(255) NOT NULL,
  `id_applicant` int(11) UNSIGNED NOT NULL,
  `hasil_ujian` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admitted`
--

INSERT INTO `admitted` (`id_admitted`, `id_prospect`, `id_applicant`, `hasil_ujian`) VALUES
(6, '911cdbc6-b128-30af-bea8-223eb9f7b866', 27, 'Lulus'),
(7, 'bd1ccbf8-108a-3774-be7b-81903bc93f0f', 28, 'Lulus'),
(8, 'a56f0bdf-e794-3ba5-9777-dd3df3fa94f9', 29, 'Lulus'),
(9, 'a687ecd9-f0b5-3049-b3b4-88a56fa56c87', 30, 'Lulus'),
(10, '5aed7e0e-7f1a-3161-917a-95f9f1bb1938', 31, 'Lulus'),
(11, '936a9313-ac8b-39bd-9e38-f8ceaada227c', 32, 'Lulus'),
(12, '87349cb1-d1a5-3443-b992-a0e284ac06d7', 33, 'Lulus'),
(13, '1d069906-14ef-3c0b-8a2e-f28bda66c14e', 34, 'Lulus'),
(14, 'e0fd7dd0-4624-36ec-8df4-1713c13fa88c', 35, 'Lulus'),
(15, '13168331-07f9-3070-8f66-6c6fe6c6ea0b', 36, 'Lulus'),
(16, '2494ef7f-3d5b-3c43-86f6-5e4cac692ab0', 37, 'Lulus'),
(17, '75f2f699-06fe-3304-8649-26dd965d07d4', 38, 'Lulus'),
(18, '22f6a4ef-7ce8-3c48-9aff-9b33340af481', 39, 'Lulus'),
(19, '06b9d1bd-a18d-3250-9f2e-8f30bd879b1a', 40, 'Lulus'),
(20, '9c63d6a4-5a38-3d5f-b6d5-5cfdc7e14deb', 41, 'Lulus'),
(21, '727406dd-3c81-33ff-8519-6ddcae96891d', 42, 'Lulus'),
(22, '25fa1d0c-219f-3c4c-96da-4452c15af167', 43, 'Lulus'),
(23, '92e52c7a-c0e1-345d-ba8e-1ad5973de272', 44, 'Lulus'),
(24, 'f8f4f021-fa4f-321a-ab6c-c503665cabbf', 45, 'Lulus'),
(25, '3d475564-c4e1-3115-8e52-88a4584010ee', 46, 'Lulus'),
(26, '773ecc20-5c7f-309a-aa0c-db0f2c45a2a7', 47, 'Lulus'),
(27, '7ee2f6f5-9b0f-388a-b090-431262468213', 48, 'Lulus'),
(28, 'a253116b-8c48-344e-b33a-4fb9927b2474', 49, 'Lulus'),
(29, 'bde2dabc-0c01-3561-81ac-796b5a80dfee', 50, 'Lulus'),
(30, '2e9e648e-8cd1-3766-9e36-86076987ebc7', 51, 'Lulus'),
(31, 'b3659bcf-cbcb-3d20-a51f-fe15cb669825', 52, 'Lulus'),
(32, 'e6b3fa31-2295-352e-b1be-4eefec2cf8e4', 53, 'Lulus'),
(33, '29562b95-4f1b-39e5-ba66-18674707bfe0', 54, 'Lulus'),
(34, 'c940ee33-d6ba-33a6-9c09-4c6631587d3d', 55, 'Lulus'),
(35, 'ec169c1f-fb4c-3502-ad66-21240f2665f0', 56, 'Lulus'),
(36, 'fd4865b5-bee7-3d53-9599-8b2344acb323', 57, 'Lulus'),
(37, 'ba2b313b-6129-3d6a-b25c-3bdbae545600', 58, 'Lulus'),
(38, '6d44c200-8466-32c7-a0a7-aa8475886faa', 59, 'Lulus'),
(39, '40d91a25-b4f4-3eb1-a25b-d991704245c5', 60, 'Lulus'),
(40, '0f8dcd1b-30e4-3a0a-bbdd-be8b311004f0', 61, 'Lulus'),
(41, '3d13f8af-c705-3816-a7bf-a3e70cb46717', 62, 'Lulus'),
(42, '4933e338-78c9-3bc0-a0b4-61d81fe5172a', 63, 'Lulus'),
(43, '02d335ec-3b6a-332a-8bd8-9de8cda70394', 64, 'Lulus'),
(44, '59b47cf7-7cfd-35bb-95a1-4a65552250bb', 65, 'Lulus'),
(45, 'd11f8f7b-093a-3861-870c-1b154a6f495d', 66, 'Lulus'),
(46, 'a017aee1-4cb8-3600-973c-d45354d603a0', 67, 'Lulus'),
(47, 'cc82a44f-3ca0-3f8e-9cef-7d80a143c67d', 68, 'Lulus'),
(48, '37db5316-b328-3123-808b-4dfbe2ba3711', 69, 'Lulus'),
(49, '60e6ac15-e6a1-3ae2-9b73-6ef320f02aac', 70, 'Lulus'),
(50, '7f4fa082-e260-3e1c-959b-7535fcf36b6e', 71, 'Lulus'),
(51, 'ccb75c91-6909-386c-a3cf-6a43026d0c9e', 72, 'Lulus'),
(52, 'fc2cc8f3-625d-3c6c-ac25-408d530bfac5', 73, 'Lulus'),
(53, '8543c5c1-d063-31a0-88bc-28d2d456d8b7', 74, 'Lulus'),
(54, '6cf96e48-305c-3d03-89f5-9c17b8018101', 75, 'Lulus'),
(55, '1c71ae3d-8bb5-33ad-9cf6-fb24f90840d7', 76, 'Lulus'),
(56, '1af2475f-0dd5-316a-962b-21ed65880560', 77, 'Lulus'),
(57, 'fbb6549c-78f0-3b89-a765-afacfa95157f', 78, 'Lulus'),
(58, 'b6f34983-7f7d-3f28-a040-d642df755b3e', 79, 'Lulus'),
(59, 'b62965cc-65ac-3a14-a5a4-9dd2ba84a203', 80, 'Lulus'),
(60, '0a9a3c96-6836-335c-bf76-c8d4d5900eb7', 81, 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id_applicant` int(11) UNSIGNED NOT NULL,
  `id_prospect` varchar(255) NOT NULL,
  `no_formulir` varchar(255) DEFAULT NULL,
  `tanggal_ujian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id_applicant`, `id_prospect`, `no_formulir`, `tanggal_ujian`) VALUES
(7, '2beb5677-bf51-3f10-849e-e690f80c6aca', '1896', '2023-08-04'),
(8, '1858950f-ed42-3f57-ade5-a0b9f79f00fa', '2120', '2023-08-04'),
(9, 'b26c904c-8c26-317a-99bd-b0daa63975e5', '2292', '2023-08-04'),
(10, '211bdea4-0a02-3b1d-bc58-262e718973aa', '2152', '2023-08-04'),
(11, '51b63c9c-7e00-3796-ae0d-49d6c87c8861', '2157', '2023-08-04'),
(12, 'fcb23a8d-6a0f-38db-8cae-24a71f38211f', '2291', '2023-08-04'),
(13, 'f14e9adc-11a1-3339-af96-c24a81df6272', '2315', '2023-08-04'),
(14, '21586867-75e3-393b-858b-9db7fdba8b56', '1498', '2023-07-07'),
(15, '50e7e01a-c66d-3350-bb25-ceb98ac92e0e', '1168', '2023-07-07'),
(16, '2e3ce5fc-aed4-3feb-8a26-906d7fd7399f', '1232', '2023-07-07'),
(17, '5a687fc3-6bba-309f-8c88-e9c852196215', '1267', '2023-07-07'),
(18, '420a90ba-d8b3-3893-b97f-02ae7a41b0ad', '559', '2023-06-16'),
(19, '730ce8e6-207c-3d21-9ba9-7ec687198cc3', '763', '2023-06-16'),
(20, 'b2a3b1c6-38e7-3d34-89d4-54558427b658', '416', '2023-06-16'),
(21, '5c95069a-f457-3c5a-8e16-084445020311', '458', '2023-06-16'),
(22, 'c7e1ba54-d188-399f-8f03-1eefa6a7b559', '479', '2023-06-16'),
(23, 'e9e5b3c9-4fbd-38b1-a6ea-fb434a61090c', '576', '2023-06-16'),
(24, 'd5642b9d-3280-376c-ad31-d2c561deac76', '580', '2023-06-16'),
(25, 'f9d94b48-68d6-3bef-8dbb-fd5cfc868192', '704', '2023-06-16'),
(26, '96b81a29-1b44-3796-b0c1-fd8ff69e936a', '710', '2023-06-16'),
(27, '911cdbc6-b128-30af-bea8-223eb9f7b866', '1898', '2023-08-04'),
(28, 'bd1ccbf8-108a-3774-be7b-81903bc93f0f', '1911', '2023-08-04'),
(29, 'a56f0bdf-e794-3ba5-9777-dd3df3fa94f9', '1929', '2023-08-04'),
(30, 'a687ecd9-f0b5-3049-b3b4-88a56fa56c87', '1987', '2023-08-04'),
(31, '5aed7e0e-7f1a-3161-917a-95f9f1bb1938', '2036', '2023-08-04'),
(32, '936a9313-ac8b-39bd-9e38-f8ceaada227c', '2133', '2023-08-04'),
(33, '87349cb1-d1a5-3443-b992-a0e284ac06d7', '2139', '2023-08-04'),
(34, '1d069906-14ef-3c0b-8a2e-f28bda66c14e', '2159', '2023-08-04'),
(35, 'e0fd7dd0-4624-36ec-8df4-1713c13fa88c', '2227', '2023-08-04'),
(36, '13168331-07f9-3070-8f66-6c6fe6c6ea0b', '2261', '2023-08-04'),
(37, '2494ef7f-3d5b-3c43-86f6-5e4cac692ab0', '833', '2023-07-07'),
(38, '75f2f699-06fe-3304-8649-26dd965d07d4', '903', '2023-07-07'),
(39, '22f6a4ef-7ce8-3c48-9aff-9b33340af481', '924', '2023-07-07'),
(40, '06b9d1bd-a18d-3250-9f2e-8f30bd879b1a', '1089', '2023-07-07'),
(41, '9c63d6a4-5a38-3d5f-b6d5-5cfdc7e14deb', '1091', '2023-07-07'),
(42, '727406dd-3c81-33ff-8519-6ddcae96891d', '1152', '2023-07-07'),
(43, '25fa1d0c-219f-3c4c-96da-4452c15af167', '1403', '2023-07-07'),
(44, '92e52c7a-c0e1-345d-ba8e-1ad5973de272', '1404', '2023-07-07'),
(45, 'f8f4f021-fa4f-321a-ab6c-c503665cabbf', '1417', '2023-07-07'),
(46, '3d475564-c4e1-3115-8e52-88a4584010ee', '1456', '2023-07-07'),
(47, '773ecc20-5c7f-309a-aa0c-db0f2c45a2a7', '1536', '2023-07-07'),
(48, '7ee2f6f5-9b0f-388a-b090-431262468213', '234', '2023-06-16'),
(49, 'a253116b-8c48-344e-b33a-4fb9927b2474', '491', '2023-06-16'),
(50, 'bde2dabc-0c01-3561-81ac-796b5a80dfee', '525', '2023-06-16'),
(51, '2e9e648e-8cd1-3766-9e36-86076987ebc7', '539', '2023-06-16'),
(52, 'b3659bcf-cbcb-3d20-a51f-fe15cb669825', '545', '2023-06-16'),
(53, 'e6b3fa31-2295-352e-b1be-4eefec2cf8e4', '584', '2023-06-16'),
(54, '29562b95-4f1b-39e5-ba66-18674707bfe0', '2352', '2023-08-18'),
(55, 'c940ee33-d6ba-33a6-9c09-4c6631587d3d', '2367', '2023-08-18'),
(56, 'ec169c1f-fb4c-3502-ad66-21240f2665f0', '2372', '2023-08-18'),
(57, 'fd4865b5-bee7-3d53-9599-8b2344acb323', '2377', '2023-08-18'),
(58, 'ba2b313b-6129-3d6a-b25c-3bdbae545600', '2413', '2023-08-18'),
(59, '6d44c200-8466-32c7-a0a7-aa8475886faa', '2428', '2023-08-18'),
(60, '40d91a25-b4f4-3eb1-a25b-d991704245c5', '2470', '2023-08-18'),
(61, '0f8dcd1b-30e4-3a0a-bbdd-be8b311004f0', '2508', '2023-08-18'),
(62, '3d13f8af-c705-3816-a7bf-a3e70cb46717', '2528', '2023-08-18'),
(63, '4933e338-78c9-3bc0-a0b4-61d81fe5172a', '2549', '2023-08-18'),
(64, '02d335ec-3b6a-332a-8bd8-9de8cda70394', '2578', '2023-05-20'),
(65, '59b47cf7-7cfd-35bb-95a1-4a65552250bb', '27', '2023-05-20'),
(66, 'd11f8f7b-093a-3861-870c-1b154a6f495d', '48', '2023-05-20'),
(67, 'a017aee1-4cb8-3600-973c-d45354d603a0', '75', '2023-05-20'),
(68, 'cc82a44f-3ca0-3f8e-9cef-7d80a143c67d', '84', '2023-05-20'),
(69, '37db5316-b328-3123-808b-4dfbe2ba3711', '99', '2023-05-20'),
(70, '60e6ac15-e6a1-3ae2-9b73-6ef320f02aac', '129', '2023-05-20'),
(71, '7f4fa082-e260-3e1c-959b-7535fcf36b6e', '143', '2023-05-20'),
(72, 'ccb75c91-6909-386c-a3cf-6a43026d0c9e', '152', '2023-05-20'),
(73, 'fc2cc8f3-625d-3c6c-ac25-408d530bfac5', '178', '2023-05-20'),
(74, '8543c5c1-d063-31a0-88bc-28d2d456d8b7', '317', '2023-07-21'),
(75, '6cf96e48-305c-3d03-89f5-9c17b8018101', '1598', '2023-07-21'),
(76, '1c71ae3d-8bb5-33ad-9cf6-fb24f90840d7', '1612', '2023-07-21'),
(77, '1af2475f-0dd5-316a-962b-21ed65880560', '1625', '2023-07-21'),
(78, 'fbb6549c-78f0-3b89-a765-afacfa95157f', '1631', '2023-07-21'),
(79, 'b6f34983-7f7d-3f28-a040-d642df755b3e', '1719', '2023-07-21'),
(80, 'b62965cc-65ac-3a14-a5a4-9dd2ba84a203', '1775', '2023-07-21'),
(81, '0a9a3c96-6836-335c-bf76-c8d4d5900eb7', '1791', '2023-07-21');

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin@gmail.com', 1, '2023-10-16 20:41:06', 1),
(2, '::1', 'admin@gmail.com', 1, '2023-10-17 01:39:34', 1),
(3, '::1', 'admin@gmail.com', 1, '2023-10-18 18:48:27', 1),
(4, '::1', 'admin01@gmail.com', 2, '2023-10-18 20:38:58', 1),
(5, '::1', 'admin02@gmail.com', 3, '2023-10-18 20:39:51', 1),
(6, '::1', 'admin@gmail.com', 1, '2023-10-18 20:44:34', 1),
(7, '::1', 'admin01@gmail.com', 2, '2023-10-18 20:44:58', 1),
(8, '::1', 'admin02@gmail.com', 3, '2023-10-18 20:45:13', 1),
(9, '::1', 'admin03@gmail.com', NULL, '2023-10-18 20:45:28', 0),
(10, '::1', 'admin03@gmail.com', NULL, '2023-10-18 20:45:44', 0),
(11, '::1', 'admin03 ', NULL, '2023-10-18 20:46:19', 0),
(12, '::1', 'admin03@gmail.com', NULL, '2023-10-18 20:46:31', 0),
(13, '::1', 'admin03@gmail.com', 5, '2023-10-18 20:47:18', 1),
(14, '::1', 'admin04@gmail.com', 6, '2023-10-18 20:51:05', 1),
(15, '::1', 'admin05@gmail.com', NULL, '2023-10-18 20:51:18', 0),
(16, '::1', 'admin05@gmail.com', 7, '2023-10-18 20:51:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `enrollee`
--

CREATE TABLE `enrollee` (
  `id_enrollee` int(11) UNSIGNED NOT NULL,
  `id_prospect` varchar(255) NOT NULL,
  `id_applicant` int(11) UNSIGNED NOT NULL,
  `id_admitted` int(11) UNSIGNED NOT NULL,
  `npm` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enrollee`
--

INSERT INTO `enrollee` (`id_enrollee`, `id_prospect`, `id_applicant`, `id_admitted`, `npm`) VALUES
(6, '29562b95-4f1b-39e5-ba66-18674707bfe0', 54, 33, '100121'),
(7, 'c940ee33-d6ba-33a6-9c09-4c6631587d3d', 55, 34, '100122'),
(8, 'ec169c1f-fb4c-3502-ad66-21240f2665f0', 56, 35, '100123'),
(9, 'fd4865b5-bee7-3d53-9599-8b2344acb323', 57, 36, '100124'),
(10, 'ba2b313b-6129-3d6a-b25c-3bdbae545600', 58, 37, '100125'),
(11, '6d44c200-8466-32c7-a0a7-aa8475886faa', 59, 38, '100126'),
(12, '40d91a25-b4f4-3eb1-a25b-d991704245c5', 60, 39, '100127'),
(13, '0f8dcd1b-30e4-3a0a-bbdd-be8b311004f0', 61, 40, '100128'),
(14, '3d13f8af-c705-3816-a7bf-a3e70cb46717', 62, 41, '100129'),
(15, '4933e338-78c9-3bc0-a0b4-61d81fe5172a', 63, 42, '100130'),
(16, '02d335ec-3b6a-332a-8bd8-9de8cda70394', 64, 43, '100131'),
(17, '59b47cf7-7cfd-35bb-95a1-4a65552250bb', 65, 44, '100132'),
(18, 'd11f8f7b-093a-3861-870c-1b154a6f495d', 66, 45, '100133'),
(19, 'a017aee1-4cb8-3600-973c-d45354d603a0', 67, 46, '100134'),
(20, 'cc82a44f-3ca0-3f8e-9cef-7d80a143c67d', 68, 47, '100135'),
(21, '37db5316-b328-3123-808b-4dfbe2ba3711', 69, 48, '100136'),
(22, '60e6ac15-e6a1-3ae2-9b73-6ef320f02aac', 70, 49, '100137'),
(23, '7f4fa082-e260-3e1c-959b-7535fcf36b6e', 71, 50, '100138'),
(24, 'ccb75c91-6909-386c-a3cf-6a43026d0c9e', 72, 51, '100139'),
(25, 'fc2cc8f3-625d-3c6c-ac25-408d530bfac5', 73, 52, '100140'),
(26, '8543c5c1-d063-31a0-88bc-28d2d456d8b7', 74, 53, '100141'),
(27, '6cf96e48-305c-3d03-89f5-9c17b8018101', 75, 54, '100142'),
(28, '1c71ae3d-8bb5-33ad-9cf6-fb24f90840d7', 76, 55, '100143'),
(29, '1af2475f-0dd5-316a-962b-21ed65880560', 77, 56, '100144'),
(30, 'fbb6549c-78f0-3b89-a765-afacfa95157f', 78, 57, '100145'),
(31, 'b6f34983-7f7d-3f28-a040-d642df755b3e', 79, 58, '100146'),
(32, 'b62965cc-65ac-3a14-a5a4-9dd2ba84a203', 80, 59, '100147'),
(33, '0a9a3c96-6836-335c-bf76-c8d4d5900eb7', 81, 60, '100148');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(122, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1697353694, 1),
(123, '2023-09-06-061232', 'App\\Database\\Migrations\\Mahasiswa', 'default', 'App', 1697353694, 1),
(124, '2023-09-06-072259', 'App\\Database\\Migrations\\Applicant', 'default', 'App', 1697353694, 1),
(125, '2023-09-06-072306', 'App\\Database\\Migrations\\Admitted', 'default', 'App', 1697353694, 1),
(126, '2023-09-06-072313', 'App\\Database\\Migrations\\Enrollee', 'default', 'App', 1697353694, 1),
(127, '2023-10-07-045624', 'App\\Database\\Migrations\\Activity', 'default', 'App', 1697353694, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prospect`
--

CREATE TABLE `prospect` (
  `id` varchar(255) NOT NULL,
  `nama` text NOT NULL,
  `asal_sekolah` tinytext NOT NULL,
  `no_telp` varchar(24) NOT NULL,
  `status_pembayaran` tinytext NOT NULL,
  `program` tinytext NOT NULL,
  `program_studi` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prospect`
--

INSERT INTO `prospect` (`id`, `nama`, `asal_sekolah`, `no_telp`, `status_pembayaran`, `program`, `program_studi`, `email`, `created_at`, `updated_at`, `slug`, `status`) VALUES
('02d335ec-3b6a-332a-8bd8-9de8cda70394', 'MUHAMMAD FAZAL RIZKY', 'SMA MUHAMMADIYAH 2', '82294835881', 'Lunas', 'Reguler', 'Pariwisata', 'fazalrzky@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'muhammad-fazal-rizky', 3),
('06b9d1bd-a18d-3250-9f2e-8f30bd879b1a', 'BELLA AMANDHA SUHERTIN', 'SMAN 109 JAKARTA', '85893659726', 'Lunas', 'Reguler', 'Manajemen', 'bellamandhaa@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'bella-amandha-suhertin', 2),
('0a9a3c96-6836-335c-bf76-c8d4d5900eb7', 'BOBY HOSEA MANALU', 'SMK TUNAS PEMBANGUNAN', '8558106573', 'Lunas', 'Reguler', 'Bisnis Digital', 'Bobyhosea55@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'boby-hosea-manalu', 3),
('0f8dcd1b-30e4-3a0a-bbdd-be8b311004f0', 'PUTRA ALDIANSYAH', 'SMA MUHAMMADIYAH 2', '89695234900', 'Lunas', 'Reguler', 'Manajemen', 'putraaldiansyah2005@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'putra-aldiansyah', 3),
('13168331-07f9-3070-8f66-6c6fe6c6ea0b', 'ATHASYA SYAHLA GENUITA', 'SMA NEGERI 42 JAKARTA', '81774850188', 'Lunas', 'Reguler', 'Manajemen', 'athasyahla07@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'athasya-syahla-genuita', 2),
('1858950f-ed42-3f57-ade5-a0b9f79f00fa', 'MUHAMMAD CLAUDYO', 'SMK YASEMI KARANGRAYUNG', '81350142466', 'Lunas', 'Reguler', 'Pariwisata', 'cloudyomuhammad@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'muhammad-claudyo', 1),
('1ab59539-76bf-3484-a184-3a362c3df878', 'AJI FADIL HIDAYATULLAH', 'SMA NEGERI 43 JAKARTA', '8122594604', 'Pending', 'Reguler', 'Akuntansi', 'ajifh22@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'aji-fadil-hidayatullah', 0),
('1af2475f-0dd5-316a-962b-21ed65880560', 'NABILA FAUZIA', 'SMA NEGERI 1 CILEUNGSI', '85889002018', 'Lunas', 'Reguler', 'Akuntansi', 'syab73948@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'nabila-fauzia', 3),
('1c71ae3d-8bb5-33ad-9cf6-fb24f90840d7', 'MUHAMMAD RENO ARIFIN', 'MARIA MEDIATRIX', '85781526680', 'Lunas', 'Reguler', 'Akuntansi', 'mhmmdrenoarfn@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'muhammad-reno-arifin', 3),
('1d069906-14ef-3c0b-8a2e-f28bda66c14e', 'AMMAR BAYTIN NURZAMAN', 'SMAN 1 CIBINONG', '89668146879', 'Lunas', 'Reguler', 'Manajemen', 'ammarbaytin7@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'ammar-baytin-nurzaman', 2),
('211bdea4-0a02-3b1d-bc58-262e718973aa', 'MUHAMMAD DAFFA ABRAR', 'SMKS EKONOMIKA DEPOK', '89508668509', 'Lunas', 'Reguler', 'Akuntansi', 'dhavislamipasha@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'muhammad-daffa-abrar', 1),
('21586867-75e3-393b-858b-9db7fdba8b56', 'NUAV ACHMAD HANAFI', 'SMAS AL HASRA', '82122287882', 'Lunas', 'Reguler', 'Pariwisata', 'nuahanafi28@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'nuav-achmad-hanafi', 1),
('22f6a4ef-7ce8-3c48-9aff-9b33340af481', 'MUH FATHUL KHAIR M', 'SMA NEGERI 42 JAKARTA', '85311090895', 'Lunas', 'Reguler', 'Manajemen', 'muhfathulrahir@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'muh-fathul-khair-m', 2),
('2494ef7f-3d5b-3c43-86f6-5e4cac692ab0', 'SUSAN HERLINA', 'SMAN 109 JAKARTA', '82339510025', 'Lunas', 'Reguler', 'Manajemen', 'lubukrumbai69@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'susan-herlina', 2),
('25fa1d0c-219f-3c4c-96da-4452c15af167', 'RELINA ANDESWARI', 'SMKS EKONOMIKA DEPOK', '895617518549', 'Lunas', 'Karyawan', 'Pariwisata', 'relinandeswari@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'relina-andeswari', 2),
('29562b95-4f1b-39e5-ba66-18674707bfe0', 'ADITYA REZKY PRADANA KUSWARA', 'SMA MUHAMMADIYAH 2', '85814549511', 'Lunas', 'Reguler', 'Bisnis Digital', 'adityrezky2005@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'aditya-rezky-pradana-kuswara', 3),
('2beb5677-bf51-3f10-849e-e690f80c6aca', 'NOVIATY INAYATHA KHOLIDAH', 'SMAS KHARISMAWITA', '85894695528', 'Lunas', 'Reguler', 'Pariwisata', 'inayathanoviaty@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'noviaty-inayatha-kholidah', 1),
('2e3ce5fc-aed4-3feb-8a26-906d7fd7399f', 'DHINDA SUBAKTI', 'SMKS EKONOMIKA DEPOK', '85692156279', 'Lunas', 'Reguler', 'Manajemen', 'dhindasubakti01@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'dhinda-subakti', 1),
('2e9e648e-8cd1-3766-9e36-86076987ebc7', 'DHEA ANGRAINI', 'SMAN 109 JAKARTA', '89697686202', 'Lunas', 'Reguler', 'Akuntansi', 'dheaangraini04@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'dhea-angraini', 2),
('37db5316-b328-3123-808b-4dfbe2ba3711', 'SRI RAHAYU AMANDA', 'SMAN 92 JAKARTA', '81388410284', 'Lunas', 'Reguler', 'Akuntansi', 'rahayuamanda438@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'sri-rahayu-amanda', 3),
('39b231fb-1fdb-3969-8b09-bfcaffe490c8', 'MOHAMMAD ANDI ISMANTO', 'SMA NEGERI 43 JAKARTA', '81384029575', 'Pending', 'Reguler', 'Akuntansi', 'andidhafa14@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'mohammad-andi-ismanto', 0),
('3d13f8af-c705-3816-a7bf-a3e70cb46717', 'RIPKI RAMDANI', 'SMA MUHAMMADIYAH 2', '81389774150', 'Lunas', 'Reguler', 'Manajemen', 'ripkiirmdn@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'ripki-ramdani', 3),
('3d475564-c4e1-3115-8e52-88a4584010ee', 'NOR MALITA RAMADINA', 'SMA NEGERI 42 JAKARTA', '85714790699', 'Lunas', 'Reguler', 'Bisnis Digital', 'ramadinanormalita@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'nor-malita-ramadina', 2),
('3e41686f-c3d9-3356-ae67-fd9b8d2c470c', 'JOKO SUHARIYANTO', 'SMA NEGERI 2 WONOGIRI', '81287983810', 'Pending', 'Reguler', 'Bisnis Digital', 'jokosuhariyanto85@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'joko-suhariyanto', 0),
('40d91a25-b4f4-3eb1-a25b-d991704245c5', 'VANIA ZAHIRAH', 'SMA YMIK 2 TEBET JAKARTA', '81294220613', 'Lunas', 'Reguler', 'Manajemen', 'vaniazahirah29@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'vania-zahirah', 3),
('420a90ba-d8b3-3893-b97f-02ae7a41b0ad', 'NAILAH PRASASTI KIRANA', 'SMA MUHAMMADIYAH 2', '81291610916', 'Lunas', 'Reguler', 'Pariwisata', 'napraskina@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'nailah-prasasti-kirana', 1),
('4933e338-78c9-3bc0-a0b4-61d81fe5172a', 'ANANDA ARDELIA MALFA', 'SMA MUHAMMADIYAH 2', '85810191928', 'Lunas', 'Reguler', 'Manajemen', 'anandamalfa3@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'ananda-ardelia-malfa', 3),
('4ce38dcf-af39-3321-b91a-da315d897ede', 'MUHAMAD GHIFARI NANDA PRATAMA WIMARDIAN', 'SMA NEGERI 43 JAKARTA', '83876784077', 'Pending', 'Reguler', 'Pariwisata', 'dedenpande135@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'muhamad-ghifari-nanda-pratama-wimardian', 0),
('50e7e01a-c66d-3350-bb25-ceb98ac92e0e', 'AGAM PANUTUR', 'SMAN 1 GUNUNGSINDUR', '89638726166', 'Lunas', 'Karyawan', 'Manajemen', 'agampanutur@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'agam-panutur', 1),
('51b63c9c-7e00-3796-ae0d-49d6c87c8861', 'ALIYYAH RAMADANI', 'SMA NEGERI 2 WONOGIRI', '85156021740', 'Lunas', 'Reguler', 'Akuntansi', 'aliyyah811@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'aliyyah-ramadani', 1),
('5341bb3c-111d-321b-a9c6-1a47aa778dd8', 'SANTI RETNO SARI', 'MAN 2 KOTA BEKASI', '8999331535', 'Pending', 'Reguler', 'Akuntansi', 'santiretnosari@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'santi-retno-sari', 0),
('59b47cf7-7cfd-35bb-95a1-4a65552250bb', 'LIRA ULI MARPAUNG', 'SMAN 92 JAKARTA', '81219751187', 'Lunas', 'Karyawan', 'Akuntansi', 'lira.1911ffg@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'lira-uli-marpaung', 3),
('5a687fc3-6bba-309f-8c88-e9c852196215', 'THORIQ ABDULLAH', 'SMA NEGERI 2 WONOGIRI', '82117161502', 'Lunas', 'Reguler', 'Manajemen', 'thq.abd03@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'thoriq-abdullah', 1),
('5acad687-85a8-39aa-a566-cb3d57a008c5', 'MARISON SITORUS', 'SMA NEGERI 2 WONOGIRI', '81280314007', 'Pending', 'Reguler', 'Bisnis Digital', 'marison.sitorus20@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'marison-sitorus', 0),
('5aed7e0e-7f1a-3161-917a-95f9f1bb1938', 'NENENG ROSSA WULANDA', 'SMA MUHAMMADIYAH 2', '81258662135', 'Lunas', 'Reguler', 'Manajemen', 'nenengrossawulanda@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'neneng-rossa-wulanda', 2),
('5c95069a-f457-3c5a-8e16-084445020311', 'TONNY RISWANDI', 'SMAN 1 CIBINONG', '89518443426', 'Lunas', 'Karyawan', 'Manajemen', 'tonny.riswandi82@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'tonny-riswandi', 1),
('60e6ac15-e6a1-3ae2-9b73-6ef320f02aac', 'ACHMAD RIVALDI', 'SMA MUHAMMADIYAH 8 CIPUTAT', '895336792358', 'Lunas', 'Reguler', 'Akuntansi', 'achmadrivaldi2005@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'achmad-rivaldi', 3),
('6cf96e48-305c-3d03-89f5-9c17b8018101', 'YESILIA PAULA ESTER BRSIBURIAN', 'SMA MUHAMMADIYAH 8 CIPUTAT', '81779997832', 'Lunas', 'Reguler', 'Akuntansi', 'yesilia.p.e.lhks@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'yesilia-paula-ester-brsiburian', 3),
('6d44c200-8466-32c7-a0a7-aa8475886faa', 'ZAHRA QURRATUAIN', 'SMAN 109 JAKARTA', '81317406866', 'Lunas', 'Reguler', 'Manajemen', 'zhqrratuain1621@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'zahra-qurratuain', 3),
('6e65915d-f5ce-332a-850d-312c915b459a', 'MOH. NUR FADHIL', 'SMA NEGERI 43 JAKARTA', '81288448290', 'Pending', 'Reguler', 'Pariwisata', 'nurfadhil844@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'moh-nur-fadhil', 0),
('727406dd-3c81-33ff-8519-6ddcae96891d', 'ADELIA PUTRI MAHENDRA', 'SMAN 1 GUNUNGSINDUR', '85882311223', 'Lunas', 'Reguler', 'Bisnis Digital', 'adeliamahendra04@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'adelia-putri-mahendra', 2),
('730ce8e6-207c-3d21-9ba9-7ec687198cc3', 'SARAH AMELIA', 'SMA NEGERI 42 JAKARTA', '87877329578', 'Lunas', 'Reguler', 'Pariwisata', 'srhamelia28@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'sarah-amelia', 1),
('75f2f699-06fe-3304-8649-26dd965d07d4', 'MUHAMMAD SYAUQI DZIKRA QODIR JAILANI', 'SMK YASEMI KARANGRAYUNG', '85810113157', 'Lunas', 'Reguler', 'Manajemen', 'mhmdsyauqi07@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'muhammad-syauqi-dzikra-qodir-jailani', 2),
('773ecc20-5c7f-309a-aa0c-db0f2c45a2a7', 'SARWIN', 'SMA NEGERI 43 JAKARTA', '81258437724', 'Lunas', 'Karyawan', 'Bisnis Digital', 'whin71251@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'sarwin', 2),
('7d8d265b-8bad-38cd-bd24-c786baf421dd', 'AUGUSTINE NUR AUZI', 'SMA NEGERI 43 JAKARTA', '81290888649', 'Pending', 'Reguler', 'Bisnis Digital', 'augustinenurauzi1@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'augustine-nur-auzi', 0),
('7d9b6ce5-2d61-389a-8a7e-14b188388de7', 'REZA MULIA PERDANA', 'SMA NEGERI 2 WONOGIRI', '81281385544', 'Pending', 'Reguler', 'Manajemen', 'rezamuliaperdana@yahoo.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'reza-mulia-perdana', 0),
('7e49ee94-dd6c-368e-900a-af50c486b628', 'ADITYA SANTOSO', 'SMA NEGERI 43 JAKARTA', '81905009101', 'Pending', 'Reguler', 'Bisnis Digital', 'adityasantoso109@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'aditya-santoso', 0),
('7ee2f6f5-9b0f-388a-b090-431262468213', 'RENATA AQILAH NABILA', 'SMAN 1 CIBINONG', '87887231678', 'Lunas', 'Reguler', 'Bisnis Digital', 'renataaqila848@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'renata-aqilah-nabila', 2),
('7f4fa082-e260-3e1c-959b-7535fcf36b6e', 'ROSARIO MARBUN', 'SMA MUHAMMADIYAH 8 CIPUTAT', '895326648945', 'Lunas', 'Reguler', 'Akuntansi', 'akmalzudi545@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'rosario-marbun', 3),
('81810820-4368-3443-9771-ff8b3f6d25ca', 'MIA HANDINI', 'SMA NEGERI 2 WONOGIRI', '81513187843', 'Pending', 'Reguler', 'Manajemen', 'mia.dkhfinance@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'mia-handini', 0),
('83afec30-5262-3c37-9583-0d91d6621fcc', 'LALANG SAKSONO', 'MAN 2 KOTA BEKASI', '8122594604', 'Pending', 'Reguler', 'Bisnis Digital', 'lalangsaksono@yahoo.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'lalang-saksono', 0),
('840b93d7-3c32-3698-82da-0066b17126d0', 'RATIH ANGGORO WILIS', 'SMA NEGERI 2 WONOGIRI', '81398341429', 'Pending', 'Reguler', 'Bisnis Digital', 'ratih.awilis@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'ratih-anggoro-wilis', 0),
('8543c5c1-d063-31a0-88bc-28d2d456d8b7', 'MUHAMMAD FAHREL MANFALUTHI', 'SMA MUHAMMADIYAH 8 CIPUTAT', '81212125802', 'Lunas', 'Reguler', 'Akuntansi', 'fahrelaja1225@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'muhammad-fahrel-manfaluthi', 3),
('87349cb1-d1a5-3443-b992-a0e284ac06d7', 'FARHAN AZHARY', 'SMA NEGERI 43 JAKARTA', '82211552772', 'Lunas', 'Reguler', 'Manajemen', 'farhanazhary23@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'farhan-azhary', 2),
('911cdbc6-b128-30af-bea8-223eb9f7b866', 'VERONIKA NIA', 'SMAS AL HASRA', '85956574920', 'Lunas', 'Karyawan', 'Manajemen', 'nveronika173@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'veronika-nia', 2),
('92e52c7a-c0e1-345d-ba8e-1ad5973de272', 'BIMA NUH SUGIHARTO', 'SMA NEGERI 2 WONOGIRI', '85772806513', 'Lunas', 'Reguler', 'Akuntansi', 'bimanuhsugiharto@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'bima-nuh-sugiharto', 2),
('936a9313-ac8b-39bd-9e38-f8ceaada227c', 'AHMAD MUFLIH', 'SMA NEGERI 42 JAKARTA', '81283252764', 'Lunas', 'Reguler', 'Manajemen', 'ahmadmuflih2806@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'ahmad-muflih', 2),
('96b81a29-1b44-3796-b0c1-fd8ff69e936a', 'SHEVI NAZUA RUSTAMI', 'SMA NEGERI 42 JAKARTA', '88213087608', 'Lunas', 'Reguler', 'Bisnis Digital', 'shevinazua2017@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'shevi-nazua-rustami', 1),
('9c63d6a4-5a38-3d5f-b6d5-5cfdc7e14deb', 'SYAFFARAH HAIFA AZIZA', 'SMAS AL HASRA', '81211678173', 'Lunas', 'Reguler', 'Manajemen', 'syafarah2305@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'syaffarah-haifa-aziza', 2),
('a017aee1-4cb8-3600-973c-d45354d603a0', 'TIRSYA AMELIA PRASTIKA', 'SMAN 92 JAKARTA', '82124926568', 'Lunas', 'Reguler', 'Bisnis Digital', 'ameliatirsya@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'tirsya-amelia-prastika', 3),
('a0dc2cc6-cdc9-348a-ba21-997566b9d8a8', 'OKTAFIAN CAHYA DWI HARDIN', 'SMA NEGERI 2 WONOGIRI', '81286468066', 'Pending', 'Reguler', 'Pariwisata', 'oktafiancahyadwi@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'oktafian-cahya-dwi-hardin', 0),
('a253116b-8c48-344e-b33a-4fb9927b2474', 'ACHMAD RENDY GYMNASTIAR', 'SMAN 1 GUNUNGSINDUR', '83874041281', 'Lunas', 'Reguler', 'Bisnis Digital', 'rendyasia5@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'achmad-rendy-gymnastiar', 2),
('a56f0bdf-e794-3ba5-9777-dd3df3fa94f9', 'ANASTASIA ARNIATI JENAUL', 'SMKS EKONOMIKA DEPOK', '82136016811', 'Lunas', 'Reguler', 'Manajemen', 'tesajenaul@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'anastasia-arniati-jenaul', 2),
('a687ecd9-f0b5-3049-b3b4-88a56fa56c87', 'MICHAEL DAVIN NUGROHO', 'SMA NEGERI 2 WONOGIRI', '82122206401', 'Lunas', 'Reguler', 'Manajemen', '2michaeldavin6@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'michael-davin-nugroho', 2),
('b26c904c-8c26-317a-99bd-b0daa63975e5', 'THALITA NUR AZIZAH', 'SMA BUDHI WARMAN 1', '89672618768', 'Lunas', 'Reguler', 'Pariwisata', 'thalita.vina99@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'thalita-nur-azizah', 1),
('b2a3b1c6-38e7-3d34-89d4-54558427b658', 'NOVITA JULIYANTI', 'SMA NEGERI 43 JAKARTA', '85640892627', 'Lunas', 'Karyawan', 'Manajemen', 'novitajlyn@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'novita-juliyanti', 1),
('b3659bcf-cbcb-3d20-a51f-fe15cb669825', 'ALFAREZA KEMAL PASHA', 'SMK YASEMI KARANGRAYUNG', '85759048114', 'Lunas', 'Reguler', 'Akuntansi', 'alfarezakemalpasha@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'alfareza-kemal-pasha', 2),
('b62965cc-65ac-3a14-a5a4-9dd2ba84a203', 'ALIF FIRDAUS', 'SMAN 7 DEPOK', '8979869946', 'Lunas', 'Karyawan', 'Bisnis Digital', 'mute.kece@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'alif-firdaus', 3),
('b6f34983-7f7d-3f28-a040-d642df755b3e', 'ADINDA MARIAM RAMADHANI DIANSYAH', 'SMA MUHAMMADIYAH 8 CIPUTAT', '85693035766', 'Lunas', 'Reguler', 'Pariwisata', 'adindamariam19@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'adinda-mariam-ramadhani-diansyah', 3),
('ba2b313b-6129-3d6a-b25c-3bdbae545600', 'IMAM SAPUTRA', 'SMAN 109 JAKARTA', '85892144053', 'Lunas', 'Reguler', 'Manajemen', 'iputra2004@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'imam-saputra', 3),
('bd1ccbf8-108a-3774-be7b-81903bc93f0f', 'GUSTI DESWITRI WARAPSARI', 'SMAN 1 GUNUNGSINDUR', '8988601244', 'Lunas', 'Reguler', 'Manajemen', 'gustideswitri23@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'gusti-deswitri-warapsari', 2),
('bde2dabc-0c01-3561-81ac-796b5a80dfee', 'SELVI PERMATA SARI', 'SMA NEGERI 42 JAKARTA', '881025372474', 'Lunas', 'Reguler', 'Bisnis Digital', 'selvipermatasari71@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'selvi-permata-sari', 2),
('c7e1ba54-d188-399f-8f03-1eefa6a7b559', 'DINA RAHMA YULIA', 'SMAN 1 GUNUNGSINDUR', '85832131484', 'Lunas', 'Karyawan', 'Manajemen', 'dinarahmay83@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'dina-rahma-yulia', 1),
('c940ee33-d6ba-33a6-9c09-4c6631587d3d', 'REZA PRAMUDYA', 'SMA NEGERI 42 JAKARTA', '85892558973', 'Lunas', 'Reguler', 'Bisnis Digital', 'rezapramudiya99@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'reza-pramudya', 3),
('cc82a44f-3ca0-3f8e-9cef-7d80a143c67d', 'SHAKILLA FADILA HIYA', 'SMAN 92 JAKARTA', '82261641362', 'Lunas', 'Reguler', 'Akuntansi', 'shakillafadilah@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'shakilla-fadila-hiya', 3),
('ccb75c91-6909-386c-a3cf-6a43026d0c9e', 'SALMA SARIFATUN NAZMI', 'SMA MUHAMMADIYAH 8 CIPUTAT', '87743067120', 'Lunas', 'Reguler', 'Akuntansi', 'nazmisalma9@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'salma-sarifatun-nazmi', 3),
('d11f8f7b-093a-3861-870c-1b154a6f495d', 'HASNA NAZIFA ARLINA', 'SMAN 92 JAKARTA', '895394756064', 'Lunas', 'Reguler', 'Bisnis Digital', 'hasna123arlina@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'hasna-nazifa-arlina', 3),
('d5642b9d-3280-376c-ad31-d2c561deac76', 'AMALLIYAH YATHONIAH', 'SMAN 109 JAKARTA', '81584772847', 'Lunas', 'Reguler', 'Manajemen', 'amalliyahamel8@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'amalliyah-yathoniah', 1),
('e0fd7dd0-4624-36ec-8df4-1713c13fa88c', 'INDAH KHAIRUNNISA', 'SMAN 1 GUNUNGSINDUR', '89636507165', 'Lunas', 'Reguler', 'Manajemen', 'indahnisa1906@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'indah-khairunnisa', 2),
('e5161cec-8e8d-3941-adfa-610a1c6d54bd', 'TURAH SLAMET', 'MAN 2 KOTA BEKASI', '81287983810', 'Pending', 'Reguler', 'Manajemen', 'turahslamet1770@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'turah-slamet', 0),
('e6b3fa31-2295-352e-b1be-4eefec2cf8e4', 'VIKY ARYO DWI PANGGAH', 'SMA NEGERI 42 JAKARTA', '81219431360', 'Lunas', 'Reguler', 'Akuntansi', 'vikyaryo317@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'viky-aryo-dwi-panggah', 2),
('e9e5b3c9-4fbd-38b1-a6ea-fb434a61090c', 'BEMBI SEPTIANI', 'SMA NEGERI 42 JAKARTA', '85767092116', 'Lunas', 'Reguler', 'Manajemen', 'bembiseptian54@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'bembi-septiani', 1),
('ec01638a-e47e-3d92-ba08-5fe7a9e5d3fb', 'LINDA MAULIDIA', 'MAN 2 KOTA BEKASI', '87856486453', 'Pending', 'Reguler', 'Akuntansi', 'maulidia.linda9@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'linda-maulidia', 0),
('ec169c1f-fb4c-3502-ad66-21240f2665f0', 'MUHAMMAD ILHAM DARMAWAN MULIA', 'SMAN 109 JAKARTA', '89517119878', 'Lunas', 'Reguler', 'Bisnis Digital', 'ilhamjuni996@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'muhammad-ilham-darmawan-mulia', 3),
('f14e9adc-11a1-3339-af96-c24a81df6272', 'AMELIA GUSTINA', 'SMAN 1 CIBINONG', '85366548734', 'Lunas', 'Reguler', 'Akuntansi', 'ameliagustina68@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'amelia-gustina', 1),
('f3f9f5bf-3984-35ad-80b5-36264d900765', 'HETI HENDRAYATI', 'MAN 2 KOTA BEKASI', '8111117759', 'Pending', 'Reguler', 'Pariwisata', 'hetimuharam@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'heti-hendrayati', 0),
('f6608d6c-1cf0-316a-badf-6e209151a25f', 'ABU HISYAM ALMAUDUDI', 'SMA NEGERI 43 JAKARTA', '8999331553', 'Pending', 'Reguler', 'Manajemen', 'Abuhisyam748@gmail.com', '2023-10-19 08:51:46', '2023-10-19 08:51:46', 'abu-hisyam-almaududi', 0),
('f8f4f021-fa4f-321a-ab6c-c503665cabbf', 'MUAJI R ADAM', 'SMA MUHAMMADIYAH 2', '81380392558', 'Lunas', 'Karyawan', 'Bisnis Digital', 'muazjyadam@gmail.com', '2023-10-19 08:52:17', '2023-10-19 08:52:17', 'muaji-r-adam', 2),
('f9d94b48-68d6-3bef-8dbb-fd5cfc868192', 'NAYLA HENDRIA', 'SMK YASEMI KARANGRAYUNG', '85707628128', 'Lunas', 'Karyawan', 'Bisnis Digital', 'hendrianayla@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'nayla-hendria', 1),
('fbb6549c-78f0-3b89-a765-afacfa95157f', 'KHAIRUNNISA', 'SMK YAPIMDA', '85719633705', 'Lunas', 'Reguler', 'Pariwisata', 'khrnnsakz@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'khairunnisa', 3),
('fc2cc8f3-625d-3c6c-ac25-408d530bfac5', 'TIFANNY WIDDY HAVRILIANTY', 'MARIA MEDIATRIX', '89522667669', 'Lunas', 'Reguler', 'Akuntansi', 'tifannyhavrilianty@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'tifanny-widdy-havrilianty', 3),
('fcb23a8d-6a0f-38db-8cae-24a71f38211f', 'SEPHIA BALQIS YUDIKA UTAMI', 'SMA NEGERI 43 JAKARTA', '85236153158', 'Lunas', 'Reguler', 'Akuntansi', 'sephiabalqisyudikautami@gmail.com', '2023-10-19 08:52:01', '2023-10-19 08:52:01', 'sephia-balqis-yudika-utami', 1),
('fd4865b5-bee7-3d53-9599-8b2344acb323', 'RIZKY SADDAM', 'SMAN 109 JAKARTA', '81223530494', 'Lunas', 'Reguler', 'Manajemen', 'rizkysaddam16@gmail.com', '2023-10-19 08:52:25', '2023-10-19 08:52:25', 'rizky-saddam', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$MnaXquMLyWmwebMBwDa1TeZkEv7TrXKtjclS11wUduTrJaoEwFFbu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-10-15 02:13:07', '2023-10-15 02:13:07', NULL),
(2, 'admin01@gmail.com', 'admin01', '$2y$10$HCBTPvpz36Se2aSss7WB3uSkiNt1v4PrdffOWG1dUJYmrXy8S/UVe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-10-18 20:38:51', '2023-10-18 20:38:51', NULL),
(3, 'admin02@gmail.com', 'admin02', '$2y$10$g0FR.Mu0BFeYGl44pg4..OzTjaxuahS6JRBvcHLv.auJXQQYAn0j2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-10-18 20:39:40', '2023-10-18 20:39:40', NULL),
(5, 'admin03@gmail.com', 'admin03', '$2y$10$GsfKvHo6gM.MAb5xhqLNdOBlzP.cBiSGtE5GopB81Szjm5Ru/WgnW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-10-18 20:47:09', '2023-10-18 20:47:09', NULL),
(6, 'admin04@gmail.com', 'admin04', '$2y$10$JniRZYN99nEwI61ipfzBSeDBezOM7lqmliQHlQfXYYNW/ZInuMJge', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-10-18 20:49:52', '2023-10-18 20:49:52', NULL),
(7, 'admin05@gmail.com', 'admin05', '$2y$10$zWXiM688CkzIOv2D54dPGuTTyzGpJWOouEe21H5YOZrhAwd.SEoSa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-10-18 20:50:45', '2023-10-18 20:50:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`),
  ADD KEY `activity_id_prospect_foreign` (`id_prospect`);

--
-- Indexes for table `admitted`
--
ALTER TABLE `admitted`
  ADD PRIMARY KEY (`id_admitted`),
  ADD KEY `admitted_id_prospect_foreign` (`id_prospect`),
  ADD KEY `admitted_id_applicant_foreign` (`id_applicant`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id_applicant`),
  ADD KEY `applicant_id_prospect_foreign` (`id_prospect`);

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `enrollee`
--
ALTER TABLE `enrollee`
  ADD PRIMARY KEY (`id_enrollee`),
  ADD KEY `enrollee_id_prospect_foreign` (`id_prospect`),
  ADD KEY `enrollee_id_applicant_foreign` (`id_applicant`),
  ADD KEY `enrollee_id_admitted_foreign` (`id_admitted`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospect`
--
ALTER TABLE `prospect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admitted`
--
ALTER TABLE `admitted`
  MODIFY `id_admitted` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id_applicant` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollee`
--
ALTER TABLE `enrollee`
  MODIFY `id_enrollee` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_id_prospect_foreign` FOREIGN KEY (`id_prospect`) REFERENCES `prospect` (`id`);

--
-- Constraints for table `admitted`
--
ALTER TABLE `admitted`
  ADD CONSTRAINT `admitted_id_applicant_foreign` FOREIGN KEY (`id_applicant`) REFERENCES `applicant` (`id_applicant`),
  ADD CONSTRAINT `admitted_id_prospect_foreign` FOREIGN KEY (`id_prospect`) REFERENCES `prospect` (`id`);

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_id_prospect_foreign` FOREIGN KEY (`id_prospect`) REFERENCES `prospect` (`id`);

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enrollee`
--
ALTER TABLE `enrollee`
  ADD CONSTRAINT `enrollee_id_admitted_foreign` FOREIGN KEY (`id_admitted`) REFERENCES `admitted` (`id_admitted`),
  ADD CONSTRAINT `enrollee_id_applicant_foreign` FOREIGN KEY (`id_applicant`) REFERENCES `applicant` (`id_applicant`),
  ADD CONSTRAINT `enrollee_id_prospect_foreign` FOREIGN KEY (`id_prospect`) REFERENCES `prospect` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
