-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 06:47 AM
-- Server version: 8.0.29
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moe_r_results_mis_db`
--
create database moe_r_results_mis_db;
use moe_r_results_mis_db;
-- --------------------------------------------------------

--
-- Table structure for table `collages`
--

CREATE TABLE `collages` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collages`
--

INSERT INTO `collages` (`id`, `name_en`, `name_pa`, `name_dr`, `province_id`, `added_by`, `edited_by`, `deleted_by`, `remark`, `created_at`, `updated_at`) VALUES
('2794328b-ac81-462c-8784-ee6876d435e4', 'Rodato Supportive Teacher Training Callage', 'روداتو حمایوی دارالمعلمین', 'دارالمعلمن حمایوی ردودات', 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', 1, NULL, NULL, NULL, '2023-02-28 01:39:53', '2023-02-28 01:39:53'),
('47f2524e-13d3-4633-9e46-41dbffde922f', 'Kunar Callage', 'کنړ دارالمعلمین', 'دارالمعلمین کنر', '265231c7-87ff-47d5-a275-e9c96377b173', 1, 1, NULL, NULL, '2023-02-11 01:42:07', '2023-02-13 05:52:29'),
('a57994f2-adc6-4db3-92ce-a7ade485d033', 'Noor Gal', 'نورګل', 'نورګل', '265231c7-87ff-47d5-a275-e9c96377b173', 1, NULL, NULL, NULL, '2023-03-22 02:06:19', '2023-03-22 02:06:19'),
('dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'Ghaz-e-abad supportive collage', 'غازی اباد حمایو دارالمعلمین', 'دارالمعلمین حمایو غازی ابد', '265231c7-87ff-47d5-a275-e9c96377b173', 1, 8, NULL, NULL, '2023-02-16 01:36:18', '2023-02-28 02:16:04'),
('e0a4b380-6ba7-478e-a26a-91fbed707f66', 'Ghazni Collage', 'غزنی دارالمعلمین', 'دارالمعلمین غزنی', '015c9a28-f584-45dd-b4c5-98bb544ba545', 1, 1, NULL, 'More info about this', '2023-02-11 01:55:48', '2023-02-11 01:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `collage_departments`
--

CREATE TABLE `collage_departments` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collage_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collage_departments`
--

INSERT INTO `collage_departments` (`id`, `dep_id`, `collage_id`, `created_at`, `updated_at`) VALUES
('042b20ce-8f66-46b9-817a-524cd76eb210', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '2794328b-ac81-462c-8784-ee6876d435e4', '2023-02-28 01:39:53', '2023-02-28 01:39:53'),
('2596ace4-883f-47a8-8feb-8260bf22894e', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '2023-03-22 02:06:19', '2023-03-22 02:06:19'),
('6f69db97-2498-405e-a241-af46a73c24d9', '72731b1e-3fbd-402d-ab01-8a281a957fe6', '47f2524e-13d3-4633-9e46-41dbffde922f', '2023-02-13 05:52:29', '2023-02-13 05:52:29'),
('b3ad59b0-dd67-49d1-9e33-f8e059b14841', 'c1686000-3383-4989-a296-2b56e0aeb916', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', '2023-02-28 02:16:04', '2023-02-28 02:16:04'),
('beb0bd1e-bea8-4314-b5ca-f7a3ba360739', '1a591db2-7ea4-4df9-a809-f8242a71f16b', '47f2524e-13d3-4633-9e46-41dbffde922f', '2023-02-13 05:52:29', '2023-02-13 05:52:29'),
('f898c823-4ff3-4f4f-914d-7a2aa58708e0', '1a591db2-7ea4-4df9-a809-f8242a71f16b', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', '2023-02-28 02:16:04', '2023-02-28 02:16:04'),
('f9b3c03e-b4b6-4bf5-86aa-9fb47a00a810', '1a591db2-7ea4-4df9-a809-f8242a71f16b', 'e0a4b380-6ba7-478e-a26a-91fbed707f66', '2023-02-13 05:52:16', '2023-02-13 05:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name_en`, `name_pa`, `name_dr`, `added_by`, `edited_by`, `deleted_by`, `remark`, `created_at`, `updated_at`) VALUES
('1a591db2-7ea4-4df9-a809-f8242a71f16b', 'Language &Literature', 'ژبي او ادبیات', 'ادبیات و زبان', 1, NULL, NULL, 'د ژبو او ادبیاتو په څانګه کی د افغانستان رسمی او غیری رسمی او انګلسی شامیل دی', '2023-02-13 02:38:55', '2023-02-13 02:38:55'),
('603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'Math & physics', 'ریاضی او فزیک', 'ریاضی و فزیک', 1, NULL, NULL, NULL, '2023-02-28 01:37:37', '2023-02-28 01:37:37'),
('72731b1e-3fbd-402d-ab01-8a281a957fe6', 'Science General', 'عمومی ساینس', 'ساینس عمومی', 1, NULL, NULL, 'په عمومی ساینس کی رایاضی، کیمیا، فزیک، بیالوژی شامیل دی', '2023-02-13 02:35:18', '2023-02-13 02:35:18'),
('963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'Islamic Study', 'دینی علوم', 'علومی دینی', 1, NULL, NULL, NULL, '2023-03-22 02:05:36', '2023-03-22 02:05:36'),
('c1686000-3383-4989-a296-2b56e0aeb916', 'Science', 'ساینس', 'ساینس', 8, NULL, NULL, NULL, '2023-02-28 02:15:45', '2023-02-28 02:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_pa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_dr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name_en`, `name_pa`, `name_dr`, `province_id`, `added_by`, `edited_by`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1f0040bd-c859-4ac1-a6d4-813dfcf3be5c', 'Narang', 'نرنګ', 'نرنګ', '265231c7-87ff-47d5-a275-e9c96377b173', 1, 1, 'Dolorem unde dolore', '2023-01-10 05:50:22', '2023-01-10 06:01:40', NULL),
('2142c0d5-0bb5-41ec-877a-eb10fcfd7064', 'Ghaz-e abad', 'غازی اباد', 'غازی اباد', '265231c7-87ff-47d5-a275-e9c96377b173', 1, NULL, NULL, '2023-01-10 05:25:42', '2023-01-10 05:25:42', NULL),
('410bba1c-1c8b-4419-94a6-a2f2e591c957', 'Bagram', 'باګرام', 'باګرام', '6ccfc091-d365-4120-ac94-299c1c9f7d15', 1, NULL, NULL, '2023-01-10 13:25:03', '2023-01-10 13:25:03', NULL),
('59c97396-23ba-4cbe-8c5c-66092f231fef', 'Khas Kunar', 'خاص کنړ', 'کنړ خاص', '265231c7-87ff-47d5-a275-e9c96377b173', 1, 1, NULL, '2023-01-10 05:50:41', '2023-01-10 06:00:56', NULL),
('776845b3-4997-4ea0-a71b-910b1b47e767', 'Nari', 'ناړۍ', 'ناری', '265231c7-87ff-47d5-a275-e9c96377b173', 1, NULL, NULL, '2023-01-10 05:30:39', '2023-01-10 05:30:39', NULL),
('a176e1f0-affc-4be4-9163-cae0bb9251ba', 'Asmar', 'اسمار', 'اسمار', '265231c7-87ff-47d5-a275-e9c96377b173', 1, NULL, NULL, '2023-01-10 05:30:17', '2023-01-10 05:30:17', NULL),
('a96d2fa0-3344-43bc-a33e-908f9a678e48', 'Noor Gal', 'نورګل', 'نورګل', '265231c7-87ff-47d5-a275-e9c96377b173', 1, NULL, NULL, '2023-01-25 02:19:41', '2023-01-25 02:19:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'General System',
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lang` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `name`, `logo`, `email`, `email_password`, `phone`, `whatsapp`, `telegram`, `instagram`, `linkedin`, `twitter`, `youtube`, `address`, `google_map`, `lang`, `user_id`, `created_at`, `updated_at`) VALUES
('0b2e0a71-ab34-4de0-b9cc-01135e2cf888', 'زده کړیالانو د معلوماتو او نتایجو سیستم', 'uploads/logos/2023-02-22-09-02-35__logo12.png', 'admin@gmail.com', NULL, '۰۷۰۰۰۰۰۰۰۰', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pa', 1, '2022-08-21 03:30:39', '2023-03-25 00:57:17'),
('1', 'MoE-TC-MIS', 'uploads/logos/2023-02-22-09-02-35__logo12.png', 'info@gmail.com', NULL, '+93700000000', NULL, NULL, NULL, NULL, NULL, NULL, 'Qala-e-Fathullah, Kabul, Afghanistan', NULL, 'en', 1, '2022-08-20 18:13:31', '2023-02-22 05:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `identity_scans`
--

CREATE TABLE `identity_scans` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collage_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `type` tinyint DEFAULT NULL,
  `service` tinyint DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `identity_scans`
--

INSERT INTO `identity_scans` (`id`, `province_id`, `collage_id`, `department_id`, `scan_path`, `year`, `status`, `type`, `service`, `added_by`, `edited_by`, `deleted_by`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
('21cb579e-ff39-4e26-94d3-f9647c111f6b', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/idintity-scans/2023-04-12-08-04-07__IMG20230322104302.jpg', '1400', 2, 1, 1, 1, NULL, NULL, NULL, '2023-04-12 03:37:42', '2023-04-12 03:37:42', NULL),
('2bff79e1-1234-49bf-b40d-5fd856798652', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/idintity-scans/2023-03-22-06-03-48__IMG20230322104302.jpg', '1400', 1, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:18:22', '2023-03-22 02:18:22', NULL),
('602ffdd9-0a59-4303-abed-d894ea9a73e0', '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', 'uploads/idintity-scans/2023-02-28-06-02-52__New Doc 22_8.jpg', '1398', 1, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:22:31', '2023-02-28 02:22:31', NULL),
('61741c77-d4d8-4395-bc7a-4fa1791c799c', 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'uploads/idintity-scans/2023-02-28-06-02-23__New Doc 22_1.jpg', '1391', 1, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 01:53:14', '2023-02-28 01:53:14', NULL),
('635589b4-a136-43a3-a87f-0e0abd6d530c', '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', 'uploads/idintity-scans/2023-02-28-06-02-50__New Doc 22_7.jpg', '1398', 1, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:20:06', '2023-02-28 02:20:06', NULL),
('6aaaa6d4-68a5-4924-81ae-3456aaeb69c0', 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'uploads/idintity-scans/2023-03-01-07-03-32__New Doc 22_5.jpg', '1391', 1, 1, 1, 1, 1, NULL, NULL, '2023-02-28 02:06:00', '2023-03-01 03:02:14', NULL),
('7987a128-bb02-47ae-91e1-656b6063b1a2', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/idintity-scans/2023-03-22-06-03-40__IMG20230322104223.jpg', '1400', 1, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:10:11', '2023-03-22 02:10:11', NULL),
('a967b0dd-7da7-4569-b1dc-da12a8f01a7b', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/idintity-scans/2023-03-22-06-03-45__IMG20230322104254.jpg', '1400', 1, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:15:44', '2023-03-22 02:15:44', NULL),
('c6f04fd8-b69a-42c6-b2b7-ad44a1ae9748', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/idintity-scans/2023-03-22-06-03-44__IMG20230322104243.jpg', '1400', 1, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:14:06', '2023-03-22 02:14:06', NULL),
('dfd77f9e-dbe0-4637-b75e-373fb49b3e19', '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', 'uploads/idintity-scans/2023-02-28-06-02-54__New Doc 22_9.jpg', '1398', 1, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:24:37', '2023-02-28 02:24:37', NULL),
('e1c1a6ec-28e9-4b61-92f9-effdba936437', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/idintity-scans/2023-03-22-06-03-42__IMG20230322104234.jpg', '1400', 1, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:12:01', '2023-03-22 02:12:01', NULL),
('fbfbdebc-ba1a-41e5-b4f5-ce976126abde', 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'uploads/idintity-scans/2023-02-28-06-02-31__New Doc 22_3.jpg', '1391', 1, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `identity_scan_appendexes`
--

CREATE TABLE `identity_scan_appendexes` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_scan_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `identity_scan_appendexes`
--

INSERT INTO `identity_scan_appendexes` (`id`, `identity_scan_id`, `scan_path`, `added_by`, `edited_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
('2a76f184-890b-4aeb-a1ea-24960a618bdd', '635589b4-a136-43a3-a87f-0e0abd6d530c', 'uploads/idintity-appendixes/2023-02-28-06-02-50__New Doc 22_11.jpg', 8, NULL, NULL, NULL, '2023-02-28 02:20:07', '2023-02-28 02:20:07'),
('40aa5adc-128c-40aa-9319-159d31c47692', 'dfd77f9e-dbe0-4637-b75e-373fb49b3e19', 'uploads/idintity-appendixes/2023-02-28-06-02-54__New Doc 22_11.jpg', 8, NULL, NULL, NULL, '2023-02-28 02:24:37', '2023-02-28 02:24:37'),
('536ef4b1-6324-4d18-8b35-77376c23e0c6', 'dfd77f9e-dbe0-4637-b75e-373fb49b3e19', 'uploads/idintity-appendixes/2023-02-28-06-02-54__New Doc 22_10.jpg', 8, NULL, NULL, NULL, '2023-02-28 02:24:37', '2023-02-28 02:24:37'),
('6b335885-35d0-4aa8-9035-d98234ba7e93', '602ffdd9-0a59-4303-abed-d894ea9a73e0', 'uploads/idintity-appendixes/2023-02-28-06-02-52__New Doc 22_11.jpg', 8, NULL, NULL, NULL, '2023-02-28 02:22:31', '2023-02-28 02:22:31'),
('6cdccc81-8e74-4913-a1b1-ff3ce86da200', '635589b4-a136-43a3-a87f-0e0abd6d530c', 'uploads/idintity-appendixes/2023-02-28-06-02-50__New Doc 22_10.jpg', 8, NULL, NULL, NULL, '2023-02-28 02:20:07', '2023-02-28 02:20:07'),
('90149583-9b3f-47b7-ab39-744c652030c7', '602ffdd9-0a59-4303-abed-d894ea9a73e0', 'uploads/idintity-appendixes/2023-02-28-06-02-52__New Doc 22_10.jpg', 8, NULL, NULL, NULL, '2023-02-28 02:22:31', '2023-02-28 02:22:31'),
('bcf1e22b-b62c-4e70-91c7-e13f588e504f', 'fbfbdebc-ba1a-41e5-b4f5-ce976126abde', 'uploads/idintity-appendixes/2023-02-28-06-02-31__New Doc 22_4.jpg', 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40'),
('dafcd045-e8bd-4190-9120-6dd3a3b9f6a9', '61741c77-d4d8-4395-bc7a-4fa1791c799c', 'uploads/idintity-appendixes/2023-02-28-06-02-23__New Doc 22_2.jpg', 1, NULL, NULL, NULL, '2023-02-28 01:53:14', '2023-02-28 01:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `english` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pashto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dari` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `key_name`, `english`, `pashto`, `dari`, `created_at`, `updated_at`) VALUES
('02c2016b-79b5-4131-b26a-9dd14311bfed', 'password', 'The provided password is incorrect.', NULL, NULL, '2022-08-18 03:12:33', '2022-08-18 03:12:33'),
('106efe8b-b661-43a1-aba6-05a41a76ce0c', 'std-identity-form-must-be-image', 'Students identity form must be an image', 'د زده کړیالانو شهرت باید انځوریز سکن وی', NULL, '2023-03-01 00:38:51', '2023-03-01 00:38:51'),
('1469ee07-a5d1-4623-bca2-f91ea09d0dfc', 'please-enter-graduation-year', 'Please enter student graduation year', 'مهربانی وکړئ د زده کړیالانو د فراغت کال ولیکئ', NULL, '2023-03-01 00:47:04', '2023-03-01 00:48:18'),
('239d4969-70b2-485b-95bc-b1a736868fd4', 'are-you-sure', 'Are you sure?', 'آیا تاسی یقینی یاست؟', NULL, '2022-08-11 21:57:35', '2023-02-11 01:40:10'),
('2462aa35-448d-4354-9bed-d7f9e7c949cd', 'your-recard-added-to-archive', 'Your record was added to the archive successfully', NULL, NULL, '2023-01-05 02:16:01', '2023-01-05 02:16:01'),
('26321a78-4cec-42ac-891d-60e39543525d', 'please-select-related-province', 'Please select province', 'مهربانی وکړئ ولایت انتخاب کړئ', NULL, '2023-03-01 00:45:01', '2023-03-01 00:50:10'),
('2c45953c-657a-40c8-a3da-d9a2ea4b5a6a', 'please-enter-student-entry-year', 'Please enter student Entry year', 'مهرباني وکړئ د زده کړیال د شمولیت نیټه ولیکئ', NULL, '2023-03-01 01:32:06', '2023-03-01 01:32:06'),
('3c8de57f-831c-4601-8171-df88c969e3f9', 'your-password-successfully-updated', 'Your Password successfully updated', NULL, NULL, '2023-01-03 05:53:04', '2023-01-03 05:53:04'),
('3ce83701-a4cb-4ae4-82bb-bd92b24eb7d4', 'std-identity-form-format-must-be-png-jpg-jpeg-svg', 'Student identity form format must be png, jpg, jpeg, or svg', 'د زده کړیالانو د شهرت جدول باید په png, jpg, jpeg, او یا هم په svg  فارمت کي وی', NULL, '2023-03-01 00:44:25', '2023-03-01 00:44:25'),
('44e733fb-1873-44bc-ab7c-a8e4c2c131c9', 'deleted', 'Your record deleted successfully!', NULL, NULL, '2022-08-11 22:28:06', '2022-08-11 22:28:06'),
('458dc553-48a8-4f54-b6e3-bd11298c5034', 'please-select-std-result-sheet', 'Please Select Student Result sheet', 'مهربانی وکړئ د زده کړیالانو د نتایجو جدول انتخاب کړئ', NULL, '2023-03-21 06:34:38', '2023-03-21 06:34:38'),
('4b472faa-643f-44f0-87e3-cc6d1635953f', 'please select province', 'Please Select Province', 'مهربانی وکړئ ولایت  انتخاب کړئ', NULL, '2023-02-22 01:32:59', '2023-02-22 01:32:59'),
('4dd0a5db-a0d7-412b-ae64-2c6c44a93db4', 'you-will-not-be-able-to-revert-this-record', 'You will not be able to revert this record', 'تاسي به په دی ونه توانیږئ چی نوموړي معلومات بیرته په لاس راوړئ', NULL, '2022-08-11 21:59:50', '2023-02-11 01:41:11'),
('5e67d653-103a-47ac-bd47-fa1b4aa0b1d5', 'you-can-restore-from-archive', 'Your data will be in archive, you can restore it', NULL, NULL, '2023-01-05 02:13:34', '2023-01-05 02:13:34'),
('625fa0b3-4b45-4ad1-9519-558b44405222', 'please-enter-student-name', 'Please enter student name', 'مهرباني وکړئ د زده کړیال نوم ولیکئ', NULL, '2023-03-01 00:50:50', '2023-03-01 00:54:28'),
('63098b8f-adb8-4eeb-8f5a-ae54b71b6d86', 'please-enter-result-sheet-year', 'Please enter student result sheet year', 'د زده کړیالانو د نتایجو د جدول نیټه ولیکئ', NULL, '2023-03-21 06:35:49', '2023-03-21 06:35:49'),
('6428f490-104e-4e05-aa56-b7127b38f821', 'failed', 'Your operation failed, Please try again!', NULL, NULL, '2022-08-11 22:28:48', '2022-08-11 22:28:48'),
('6b2cd28f-eba1-4af2-957a-0f89da3d9cd7', 'success', 'Your Record was successfully added!', 'ستاسي معلوما په بریا سره سیسټم کې داخیل شول', NULL, '2022-08-11 22:33:32', '2023-02-27 03:10:26'),
('7f26b79e-73a2-4d2c-a2d9-f72cf00beb50', 'login-failed', 'These credentials do not match our records.', NULL, NULL, '2022-08-18 03:12:04', '2022-08-18 03:12:04'),
('8051ee82-e32c-4d96-a04e-e7ac9290663f', 'std-identity-form-appendix-must-be-image', 'Students identity form appendix must be an image', 'د زده کړیالانو شهرت ضمیمه  باید انځوریز سکن وی', NULL, '2023-03-01 01:33:56', '2023-03-01 01:33:56'),
('8558ef64-2676-4ce9-8943-3d1279880e9c', 'please select department', 'Please Select Department', 'مهربانی وکړئ مربطه څانګه انتخاب کړئ', NULL, '2023-02-22 01:34:42', '2023-02-22 01:36:37'),
('88f9b74d-db75-49f4-bc08-7dda4b397e12', 'please-select-student-from-list', 'Please select students from list', 'مهربانی وکړئ د نتایج له مخی زده کړیالان انتخاب کړئ', NULL, '2023-03-21 06:38:20', '2023-03-21 06:38:20'),
('897d4180-be77-4886-a031-2965c9c5196f', 'please select collage', 'Please Select Collage', 'مهربانی وکړئ تربیه معلم انتخاب کړئ', NULL, '2023-02-22 01:33:54', '2023-02-22 01:33:54'),
('8ea3e218-a802-49db-b901-ad02f8477876', 'please-select-std-identity-form', 'Please browse students identity form', 'مهرباني وکړئ، د زده کړیالانو د شهرت جدول انتخاب کړئ', NULL, '2023-03-01 00:37:38', '2023-03-01 00:37:38'),
('92d3ca3e-47e7-4e61-95bb-d2870f2149e3', 'suspended', 'Suspended', 'معطل شوو', NULL, '2023-01-08 03:06:04', '2023-02-27 03:11:35'),
('95668a05-091d-422f-8d4a-c509de94be25', 'please-select-identity-form-status', 'Please select identity form status', 'مهرباني وکړئ د زده کړیالانو د شهرت جدول حالت انتخاب کړئ', NULL, '2023-03-01 01:40:30', '2023-03-01 01:40:30'),
('9a17f5e4-a6c4-4cc2-88ce-eb25c55a2fd1', 'old-password-is-incorect', 'Your old password is incorrect, Please Try Again!', NULL, NULL, '2023-01-03 05:56:39', '2023-01-03 05:56:39'),
('a286aee2-bb64-4e86-b7e0-491f39d345fc', 'please-enter-valid-student-name', 'Please enter  valid student name', 'مهربانی وکړئ او د زده کړیال نوم سم ولیکئ', NULL, '2023-03-01 00:55:43', '2023-03-01 00:55:43'),
('a42ec721-1dc8-4814-a875-568b15d1d6ed', 'please-select-related-collage', 'Please select related collage', 'مهربانی وکړئ تربیه معلم انتخاب کړئ', NULL, '2023-03-01 00:45:39', '2023-03-01 00:49:36'),
('a640c037-ed2f-44c2-bd67-b89ca6c8c949', 'key-message-is-required', 'The key message is required', NULL, NULL, '2022-08-11 22:18:12', '2022-08-11 22:18:12'),
('adb5357a-672d-4317-84cf-3ff08f09e72b', 'english-message-is-required', 'The English message is required', NULL, NULL, '2022-08-11 22:19:57', '2022-08-11 22:25:38'),
('ae2c431c-6253-4152-b07b-5a4aacfcd93a', 'please-select-semester', 'Please select student result sheet semester', 'مهربانی وکړئ د زده کړیالانو د نتایج سمستر انتخاب کړئ', NULL, '2023-03-21 06:36:57', '2023-03-22 01:06:48'),
('aea0c042-ea3f-41c4-8430-832053ae138f', 'please-enter-valid-student-father-name', 'Please enter student father valid name', 'مهربانی وکړئ د زده کړیال د پلار نوم په سمه توګه ولیکئ', NULL, '2023-03-01 01:30:34', '2023-03-01 01:30:34'),
('d0a9e2ce-f518-44be-9f39-bc3c23259b7d', 'updated', 'Your record updated successfully!', 'ستاسی معلومات په بریا سره تغیر شول', NULL, '2022-08-11 22:27:04', '2023-02-27 03:09:36'),
('d3688dd4-3743-4c4a-809e-16d0b67542f7', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', NULL, NULL, '2022-08-18 03:12:56', '2022-08-18 03:12:56'),
('d56fe050-c231-491c-b99b-229bdcd2b248', 'std-identity-form-appendix-format-must-be-png-jpg-jpeg-svg', 'Student identity form appendix format must be png, jpg, jpeg, or svg', 'د زده کړیالانو د شهرت جدول ضمیمه باید په png, jpg, jpeg, او یا هم په svg فارمت کي وی', NULL, '2023-03-01 01:35:31', '2023-03-01 01:35:31'),
('db2451c3-65b1-4f95-9150-35d8a6eb102e', 'please-enter-student-father-name', 'Please enter student father name', 'مهربانی وکړئ د زده کړیال د پلار نوم ولیکئ', NULL, '2023-03-01 01:26:49', '2023-03-01 01:37:37'),
('de1f20e4-871b-437d-8df1-ab57c63694c9', 'restored', 'Your Record successfully Restored', NULL, NULL, '2023-01-05 01:55:46', '2023-01-05 01:55:46'),
('ed237f69-1f79-471a-b1e0-a64ca53680fa', 'your-profile-successfully-updated', 'Your profile successfully updated', NULL, NULL, '2022-08-14 15:55:51', '2022-08-14 15:55:51'),
('f53607b6-e403-4a8a-9f9e-c29ada76c151', 'Your Account is suspended, please contact the administrator', 'Your Account is suspended, please contact the administrator.', 'ستاسی کارن معطل شوی! مهربانی وکړئ د آډمین سره په اړریکه کی شئ', NULL, '2023-01-08 02:47:28', '2023-02-27 03:12:32'),
('f88a7a6f-6ed5-46d5-b260-b31a2872a78e', 'please-select-related-department', 'Please select related department', 'مهرباني وکړئ مربطه څانګه انتخاب کړئ', NULL, '2023-03-01 00:46:19', '2023-03-01 00:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_11_064713_create_variables_table', 1),
(6, '2022_08_11_071305_create_messages_table', 1),
(7, '2022_08_13_073843_create_permission_tables', 1),
(8, '2022_08_13_073953_create_posts_table', 1),
(9, '2022_08_20_123214_create_banner_images_table', 2),
(10, '2022_08_20_123237_create_general_settings_table', 2),
(12, '2022_10_18_145006_create_project_locations_table', 4),
(13, '2022_10_18_145641_create_employees_table', 5),
(14, '2022_10_18_151140_create_issue_items_table', 6),
(15, '2022_10_18_160451_create_item_conditions_table', 7),
(16, '2022_10_18_141636_create_items_table', 8),
(17, '2022_11_02_175443_create_departments_table', 9),
(18, '2023_01_02_095728_create_add_field_to_user_table', 10),
(19, '2023_01_02_125255_create_add_type_to_user_table', 11),
(20, '2023_01_05_052840_create_add_soft_delete_to_user_table', 12),
(21, '2023_01_09_055958_create_provinces_table', 13),
(22, '2023_01_09_060038_create_districts_table', 13),
(24, '2023_01_23_101130_create_schools_table', 14),
(25, '2023_02_11_050650_create_collages_table', 15),
(26, '2023_02_13_063209_create_departments_table', 16),
(27, '2023_02_13_070940_create_collage_departments_table', 17),
(28, '2023_02_14_094952_add_service_to_user_table', 18),
(31, '2023_02_14_104858_create_identity_scan_appendexes_table', 21),
(32, '2023_02_14_101504_create_identity_scans_table', 22),
(33, '2023_02_14_102721_create_students_table', 23),
(34, '2023_03_07_052122_create_result_sheet_scan_semester1s_table', 24),
(35, '2023_03_07_052133_create_result_sheet_scan_semester2s_table', 24),
(36, '2023_03_07_052147_create_result_sheet_scan_semester3s_table', 24),
(37, '2023_03_07_052156_create_result_sheet_scan_semester4s_table', 24),
(38, '2023_03_07_052252_create_result_sheet_appendix_scan_semester1s_table', 24),
(39, '2023_03_07_052257_create_result_sheet_appendix_scan_semester2s_table', 24),
(40, '2023_03_07_052304_create_result_sheet_appendix_scan_semester3s_table', 24),
(41, '2023_03_07_052311_create_result_sheet_appendix_scan_semester4s_table', 24),
(42, '2023_03_07_052456_create_student_result_semester1s_table', 24),
(43, '2023_03_07_052509_create_student_result_semester2s_table', 24),
(44, '2023_03_07_052516_create_student_result_semester3s_table', 24),
(45, '2023_03_07_052521_create_student_result_semester4s_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'register.show', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(2, 'register.perform', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(3, 'login.show', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(4, 'login.perform', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(5, 'dashboard', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(6, 'labels', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(7, 'add-label', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(8, 'delete-label', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(9, 'edit-label', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(10, 'update-label', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(11, 'messages', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(12, 'add-message', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(13, 'delete-message', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(14, 'edit-message', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(15, 'update-message', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(16, 'all-backups', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(17, 'create-backup', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(18, 'download-backup', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(19, 'delete-backup', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(20, 'users.index', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(21, 'users.create', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(22, 'users.store', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(23, 'users.show', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(24, 'users.edit', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(25, 'users.update', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(26, 'users.destroy', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(27, 'posts.index', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(28, 'posts.create', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(29, 'posts.store', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(30, 'posts.show', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(31, 'posts.edit', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(32, 'posts.update', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(33, 'posts.destroy', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(34, 'roles.index', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(35, 'roles.create', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(36, 'roles.store', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(37, 'roles.show', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(38, 'roles.edit', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(39, 'roles.update', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(40, 'roles.destroy', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(41, 'permissions.index', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(42, 'permissions.create', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(43, 'permissions.store', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(44, 'permissions.show', 'web', '2022-08-13 07:56:09', '2022-08-13 07:56:09'),
(45, 'permissions.edit', 'web', '2022-08-13 07:56:10', '2022-08-13 07:56:10'),
(46, 'permissions.update', 'web', '2022-08-13 07:56:10', '2022-08-13 07:56:10'),
(47, 'permissions.destroy', 'web', '2022-08-13 07:56:10', '2022-08-13 07:56:10'),
(48, 'logout.perform', 'web', '2022-08-13 07:56:10', '2022-08-13 07:56:10'),
(49, 'home.index', 'web', '2022-08-13 07:56:10', '2022-08-13 07:56:10'),
(50, 'users.profile', 'web', '2022-08-14 16:15:22', '2022-08-14 16:15:22'),
(51, 'users.update-user-profile', 'web', '2022-08-14 16:15:22', '2022-08-14 16:15:22'),
(53, 'logout', 'web', '2022-08-20 09:20:55', '2022-08-20 09:20:55'),
(54, 'register', 'web', '2022-08-20 09:20:55', '2022-08-20 09:20:55'),
(55, 'password.request', 'web', '2022-08-20 09:20:55', '2022-08-20 09:20:55'),
(56, 'password.email', 'web', '2022-08-20 09:20:55', '2022-08-20 09:20:55'),
(57, 'password.reset', 'web', '2022-08-20 09:20:55', '2022-08-20 09:20:55'),
(58, 'password.update', 'web', '2022-08-20 09:20:55', '2022-08-20 09:20:55'),
(59, 'setting.show', 'web', '2022-08-20 09:20:55', '2022-08-20 09:20:55'),
(60, 'setting.update', 'web', '2022-08-21 01:08:08', '2022-08-21 01:08:08'),
(82, 'users.change-status', 'web', '2023-01-02 11:40:47', '2023-01-02 11:40:47'),
(83, 'logout.lock-screen', 'web', '2023-01-04 05:10:56', '2023-01-04 05:10:56'),
(84, 'users.archive', 'web', '2023-01-05 01:21:58', '2023-01-05 01:21:58'),
(85, 'users.restore', 'web', '2023-01-05 01:43:53', '2023-01-05 01:43:53'),
(86, 'users.add-to-archive', 'web', '2023-01-05 02:12:12', '2023-01-05 02:12:12'),
(87, 'users.restore-all', 'web', '2023-01-05 02:19:16', '2023-01-05 02:19:16'),
(88, 'provinces.index', 'web', '2023-01-09 02:42:59', '2023-01-09 02:42:59'),
(89, 'provinces.create', 'web', '2023-01-09 02:42:59', '2023-01-09 02:42:59'),
(90, 'provinces.store', 'web', '2023-01-09 02:42:59', '2023-01-09 02:42:59'),
(91, 'provinces.show', 'web', '2023-01-09 02:42:59', '2023-01-09 02:42:59'),
(92, 'provinces.edit', 'web', '2023-01-09 02:42:59', '2023-01-09 02:42:59'),
(93, 'provinces.update', 'web', '2023-01-09 02:42:59', '2023-01-09 02:42:59'),
(94, 'provinces.destroy', 'web', '2023-01-09 02:42:59', '2023-01-09 02:42:59'),
(95, 'provinces.add-to-archive', 'web', '2023-01-09 04:55:26', '2023-01-09 04:55:26'),
(96, 'provinces.restore-all', 'web', '2023-01-09 04:55:26', '2023-01-09 04:55:26'),
(97, 'provinces.restore', 'web', '2023-01-09 04:55:26', '2023-01-09 04:55:26'),
(98, 'provinces.archive', 'web', '2023-01-09 05:11:30', '2023-01-09 05:11:30'),
(99, 'districts.archive', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(100, 'districts.add-to-archive', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(101, 'districts.restore-all', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(102, 'districts.restore', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(103, 'districts.index', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(104, 'districts.create', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(105, 'districts.store', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(106, 'districts.show', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(107, 'districts.edit', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(108, 'districts.update', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(109, 'districts.destroy', 'web', '2023-01-09 05:40:53', '2023-01-09 05:40:53'),
(117, 'schools.index', 'web', '2023-01-24 02:20:34', '2023-01-24 02:20:34'),
(118, 'schools.create', 'web', '2023-01-24 02:20:34', '2023-01-24 02:20:34'),
(119, 'schools.store', 'web', '2023-01-24 02:20:34', '2023-01-24 02:20:34'),
(120, 'schools.show', 'web', '2023-01-24 02:20:34', '2023-01-24 02:20:34'),
(121, 'schools.edit', 'web', '2023-01-24 02:20:34', '2023-01-24 02:20:34'),
(122, 'schools.update', 'web', '2023-01-24 02:20:34', '2023-01-24 02:20:34'),
(123, 'schools.destroy', 'web', '2023-01-24 02:20:34', '2023-01-24 02:20:34'),
(124, 'schools.archive', 'web', '2023-01-25 05:36:00', '2023-01-25 05:36:00'),
(125, 'schools.add-to-archive', 'web', '2023-01-25 05:36:00', '2023-01-25 05:36:00'),
(126, 'schools.restore-all', 'web', '2023-01-25 05:36:00', '2023-01-25 05:36:00'),
(127, 'schools.restore', 'web', '2023-01-25 05:36:00', '2023-01-25 05:36:00'),
(129, 'collages.index', 'web', '2023-02-11 00:47:40', '2023-02-11 00:47:40'),
(130, 'collages.create', 'web', '2023-02-11 00:47:40', '2023-02-11 00:47:40'),
(131, 'collages.store', 'web', '2023-02-11 00:47:40', '2023-02-11 00:47:40'),
(132, 'collages.show', 'web', '2023-02-11 00:47:40', '2023-02-11 00:47:40'),
(133, 'collages.edit', 'web', '2023-02-11 00:47:40', '2023-02-11 00:47:40'),
(134, 'collages.update', 'web', '2023-02-11 00:47:40', '2023-02-11 00:47:40'),
(135, 'collages.destroy', 'web', '2023-02-11 00:47:40', '2023-02-11 00:47:40'),
(136, 'students.index', 'web', '2023-02-11 05:29:50', '2023-02-11 05:29:50'),
(137, 'students.create', 'web', '2023-02-11 05:29:51', '2023-02-11 05:29:51'),
(138, 'students.store', 'web', '2023-02-11 05:29:51', '2023-02-11 05:29:51'),
(139, 'students.show', 'web', '2023-02-11 05:29:51', '2023-02-11 05:29:51'),
(140, 'students.edit', 'web', '2023-02-11 05:29:51', '2023-02-11 05:29:51'),
(141, 'students.update', 'web', '2023-02-11 05:29:51', '2023-02-11 05:29:51'),
(142, 'students.destroy', 'web', '2023-02-11 05:29:51', '2023-02-11 05:29:51'),
(143, 'departments.index', 'web', '2023-02-13 01:11:02', '2023-02-13 01:11:02'),
(144, 'departments.create', 'web', '2023-02-13 01:11:02', '2023-02-13 01:11:02'),
(145, 'departments.store', 'web', '2023-02-13 01:11:02', '2023-02-13 01:11:02'),
(146, 'departments.show', 'web', '2023-02-13 01:11:02', '2023-02-13 01:11:02'),
(147, 'departments.edit', 'web', '2023-02-13 01:11:02', '2023-02-13 01:11:02'),
(148, 'departments.update', 'web', '2023-02-13 01:11:02', '2023-02-13 01:11:02'),
(149, 'departments.destroy', 'web', '2023-02-13 01:11:02', '2023-02-13 01:11:02'),
(150, 'students.search', 'web', '2023-02-22 01:22:28', '2023-02-22 01:22:28'),
(151, 'students.create-student-result-sheet', 'web', '2023-03-05 00:23:37', '2023-03-05 00:23:37'),
(152, 'students.store-student-result-sheet', 'web', '2023-03-05 00:23:37', '2023-03-05 00:23:37'),
(153, 'students.edit-student-result-sheet', 'web', '2023-03-26 00:32:38', '2023-03-26 00:32:38'),
(154, 'students.update-student-result-sheet', 'web', '2023-03-26 00:38:03', '2023-03-26 00:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_pa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_dr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name_en`, `name_pa`, `name_dr`, `added_by`, `edited_by`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
('015c9a28-f584-45dd-b4c5-98bb544ba545', 'Ghazni', 'غزنی', 'غزنی', 1, NULL, NULL, '2023-02-11 01:53:38', '2023-02-11 01:53:38', NULL),
('02179265-fce9-4dce-a6e0-e17b40ee2103', 'Herat', 'هرات', 'هرات', 8, NULL, NULL, '2023-02-28 03:22:48', '2023-02-28 03:22:48', NULL),
('027ac314-538e-48d1-92b9-454715e7868b', 'Pakhtya', 'پکتیا', 'پکتیا', 8, NULL, NULL, '2023-02-28 03:11:37', '2023-02-28 03:11:37', NULL),
('02f7dd81-6c89-4878-a6b7-787835617435', 'Wardag', 'وردگ', 'وردگ', 8, NULL, NULL, '2023-02-28 03:22:25', '2023-02-28 03:22:25', NULL),
('0559daaf-62ba-4d3c-a5e2-cc87bccbd90b', 'Helman', 'هلمند', 'هلمند', 8, NULL, NULL, '2023-02-28 03:23:06', '2023-02-28 03:23:06', NULL),
('0c8d4c6d-56aa-4543-a14c-cb3d3a89490b', 'Rozgan', 'روزګان', 'روزګان', 8, NULL, NULL, '2023-02-28 03:06:26', '2023-02-28 03:06:26', NULL),
('14428b45-ebf7-453c-9eca-8753967b0e84', 'Kandahar', 'کندهار', 'کندهار', 8, NULL, NULL, '2023-02-28 03:19:44', '2023-02-28 03:19:44', NULL),
('176113d7-a781-4384-ad62-ffa50d22c179', 'Badakhshan', 'بدخشان', 'بدخشان', 8, NULL, NULL, '2023-02-28 03:08:20', '2023-02-28 03:08:20', NULL),
('265231c7-87ff-47d5-a275-e9c96377b173', 'Kunar', 'کنړ', 'کنر', 1, NULL, NULL, '2023-01-10 05:24:22', '2023-01-10 12:48:54', NULL),
('289b5731-2d17-4e06-8e6f-e7b67f2c9479', 'Paryab', 'پاریاب', 'پاریاب', 8, NULL, NULL, '2023-02-28 03:17:35', '2023-02-28 03:17:35', NULL),
('34dfc10c-5030-49f7-a2c0-78c622afaccf', 'Bamyan', 'بامیان', 'بامیان', 8, NULL, NULL, '2023-02-28 03:07:47', '2023-02-28 03:07:47', NULL),
('384afa30-ed14-4910-83e2-b469d13e04bb', 'Laghman', 'لغمان', 'لغمان', 8, NULL, NULL, '2023-02-28 03:20:02', '2023-02-28 03:20:02', NULL),
('3d7f4a2a-60d1-4e0e-8700-9c63cd5b4894', 'Balkh', 'بلخ', 'بلخ', 8, NULL, NULL, '2023-02-28 03:09:04', '2023-02-28 03:09:04', NULL),
('4092adca-30a4-4c1c-8271-cd59929d1c6c', 'Ghoor', 'غور', 'غور', 8, NULL, NULL, '2023-02-28 03:17:13', '2023-02-28 03:17:13', NULL),
('556c45bb-9181-49fa-8f47-c14b37670bec', 'Khost', 'خوست', 'خوست', 8, NULL, NULL, '2023-02-28 03:13:58', '2023-02-28 03:13:58', NULL),
('61e76702-6161-45d3-a940-9f7bbd21ca96', 'Jozjan', 'جوزجان', 'جوزجان', 8, NULL, NULL, '2023-02-28 03:13:30', '2023-02-28 03:13:30', NULL),
('677e5a5b-5291-4ab8-8b26-c0e94125ef26', 'Panjsher', 'پنجشیر', 'پنجشیر', 8, NULL, NULL, '2023-02-28 03:12:28', '2023-02-28 03:12:28', NULL),
('8541ea71-482b-46f2-84da-1fa1d1eaee0b', 'Samangan', 'سمنګان', 'سمنګان', 8, NULL, NULL, '2023-02-28 03:16:30', '2023-02-28 03:16:30', NULL),
('996b3525-c40c-48dd-bb7a-2f7b97ce26e5', 'Zabal', 'زابل', 'زابل', 8, NULL, NULL, '2023-02-28 03:14:48', '2023-02-28 03:14:48', NULL),
('a3590b97-3d53-42b7-9f54-31fa0bf93fc8', 'Nangarhar', 'ننګرهار', 'ننگرهار', 1, 1, NULL, '2023-01-10 00:50:37', '2023-01-10 01:12:54', NULL),
('a64fcfad-aecf-43cf-ac34-88af2302d18a', 'Paktika', 'پکتیکا', 'پکتیکا', 8, NULL, NULL, '2023-02-28 03:12:03', '2023-02-28 03:12:03', NULL),
('a69fff24-37ce-454e-98c7-a382c1d99b30', 'Parwan', 'پروان', 'پروان', 8, NULL, NULL, '2023-02-28 03:09:25', '2023-02-28 03:09:25', NULL),
('ac5a9edb-a476-4c3f-9051-fc574be0b1ce', 'Nooristan', 'نورستان', 'نورستان', 8, NULL, NULL, '2023-02-28 03:21:34', '2023-02-28 03:21:34', NULL),
('b012098b-caa2-42b3-b9b0-4e940b444097', 'Saripul', 'سرپل', 'سرپل', 8, NULL, NULL, '2023-02-28 03:15:14', '2023-02-28 03:15:14', NULL),
('b304bdc9-0486-469f-9be0-8c9608716e01', 'Nemrooz', 'نیمروز', 'نیمروز', 8, NULL, NULL, '2023-02-28 03:22:03', '2023-02-28 03:22:03', NULL),
('bdda4b55-4ba2-498f-abcb-2e51ee5b243a', 'Kabul', 'کابل', 'کابل', 1, NULL, NULL, '2023-02-11 01:53:16', '2023-02-11 01:53:16', NULL),
('bec80776-9c13-46b5-a08c-f9ec33ce484c', 'Daykondi', 'دایکندی', 'دایکندی', 8, NULL, NULL, '2023-02-28 03:14:27', '2023-02-28 03:14:27', NULL),
('c67f92b3-b433-479b-908b-1130e6244ea7', 'Baghlan', 'بغلان', 'بغلان', 8, NULL, NULL, '2023-02-28 03:08:41', '2023-02-28 03:08:41', NULL),
('d9221b12-7018-42ba-aabc-97a7427d5acd', 'ningarhar', 'ننګرهار', 'ننګرهار', 1, NULL, 'ینبتنیبتیب', '2023-02-22 03:02:39', '2023-02-28 01:38:26', '2023-02-28 01:38:26'),
('dc1c9006-e0b3-405e-84c1-92c6cd290d07', 'Logar', 'لوګر', 'لوگر', 8, NULL, NULL, '2023-02-28 03:20:36', '2023-02-28 03:20:36', NULL),
('dc5d5daa-d7ce-4301-9bbd-93733ebb5bbf', 'Takhar', 'تخار', 'تخار', 8, NULL, NULL, '2023-02-28 03:13:03', '2023-02-28 03:13:03', NULL),
('e65f66bb-8b15-4039-987d-7fc8104e65fb', 'Farah', 'فراه', 'فراه', 8, NULL, NULL, '2023-02-28 03:18:00', '2023-02-28 03:18:00', NULL),
('e9bf814f-2255-4840-87c1-f21f68e5cb2b', 'Kapisa', 'کاپیسا', 'کاپیسا', 8, NULL, NULL, '2023-02-28 03:18:36', '2023-02-28 03:18:36', NULL),
('ed0dd61b-94f4-45e5-8781-5cb67f228fa4', 'Badghis', 'بادغیس', 'بادغیس', 8, NULL, NULL, '2023-02-28 03:07:04', '2023-02-28 03:07:04', NULL),
('f0c9f1cd-d074-48de-a4fc-01c777173dd7', 'Kundoz', 'کندوز', 'کندوز', 8, NULL, NULL, '2023-02-28 03:19:05', '2023-02-28 03:19:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result_sheet_appendix_scan_semester1s`
--

CREATE TABLE `result_sheet_appendix_scan_semester1s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_sheet_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_sheet_appendix_scan_semester1s`
--

INSERT INTO `result_sheet_appendix_scan_semester1s` (`id`, `result_sheet_id`, `scan_path`, `added_by`, `edited_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
('e8aef8f0-2e1e-4b08-b95c-5b3d6cd8f2ba', '447a852a-bfa4-4b7a-9dc5-28100addbbf6', 'uploads/result-sheet-appendix/2023-03-23-06-03-14__New Doc 21_2.jpg', 1, NULL, NULL, NULL, '2023-03-23 01:44:09', '2023-03-23 01:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `result_sheet_appendix_scan_semester2s`
--

CREATE TABLE `result_sheet_appendix_scan_semester2s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_sheet_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result_sheet_appendix_scan_semester3s`
--

CREATE TABLE `result_sheet_appendix_scan_semester3s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_sheet_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_sheet_appendix_scan_semester3s`
--

INSERT INTO `result_sheet_appendix_scan_semester3s` (`id`, `result_sheet_id`, `scan_path`, `added_by`, `edited_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
('af3e359f-9824-4deb-a403-085d243b8170', '9d7be47c-dd6f-4841-9e02-18b8be5b9650', 'uploads/result-sheet-appendix/2023-03-23-05-03-05__New Doc 21_2.jpg', 1, NULL, NULL, NULL, '2023-03-23 00:35:05', '2023-03-23 00:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `result_sheet_appendix_scan_semester4s`
--

CREATE TABLE `result_sheet_appendix_scan_semester4s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_sheet_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_sheet_appendix_scan_semester4s`
--

INSERT INTO `result_sheet_appendix_scan_semester4s` (`id`, `result_sheet_id`, `scan_path`, `added_by`, `edited_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
('c4c6134b-f81b-46d2-8983-b266c99df734', 'ec26532b-3651-4729-8c7b-0ba0dff771b2', 'uploads/result-sheet-appendix/2023-04-08-04-04-36__New Doc 21_2.jpg', 1, NULL, NULL, NULL, '2023-04-08 00:06:31', '2023-04-08 00:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `result_sheet_scan_semester1s`
--

CREATE TABLE `result_sheet_scan_semester1s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collage_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `type` tinyint DEFAULT NULL,
  `service` tinyint DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_sheet_scan_semester1s`
--

INSERT INTO `result_sheet_scan_semester1s` (`id`, `province_id`, `collage_id`, `department_id`, `scan_path`, `year`, `status`, `type`, `service`, `added_by`, `edited_by`, `deleted_by`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
('447a852a-bfa4-4b7a-9dc5-28100addbbf6', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/result-sheet-scans/2023-03-23-06-03-14__IMG20230322104642.jpg', '1398', NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-23 01:44:09', '2023-03-23 01:44:09', NULL),
('6ddf7c03-44d1-4d7b-915b-414f20cca241', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/result-sheet-scans/2023-03-22-07-03-59__IMG20230322104626.jpg', '1398', NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 03:29:22', '2023-03-22 03:29:22', NULL),
('97a9695b-18b0-40fa-8f2f-db2410084cf5', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/result-sheet-scans/2023-04-12-08-04-10__IMG20230322104654.jpg', '1398', NULL, 1, 1, 1, NULL, NULL, NULL, '2023-04-12 03:40:46', '2023-04-12 03:40:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result_sheet_scan_semester2s`
--

CREATE TABLE `result_sheet_scan_semester2s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collage_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `type` tinyint DEFAULT NULL,
  `service` tinyint DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result_sheet_scan_semester3s`
--

CREATE TABLE `result_sheet_scan_semester3s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collage_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `type` tinyint DEFAULT NULL,
  `service` tinyint DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_sheet_scan_semester3s`
--

INSERT INTO `result_sheet_scan_semester3s` (`id`, `province_id`, `collage_id`, `department_id`, `scan_path`, `year`, `status`, `type`, `service`, `added_by`, `edited_by`, `deleted_by`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
('9d7be47c-dd6f-4841-9e02-18b8be5b9650', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/result-sheet-scans/2023-03-23-05-03-05__IMG20230322104919.jpg', '1399', NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-23 00:35:05', '2023-03-23 00:35:05', NULL),
('eb73bf32-9981-48ed-a52e-369a8f0f7886', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/result-sheet-scans/2023-03-23-04-03-46__IMG20230322104913.jpg', '1399', NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-23 00:16:21', '2023-03-23 00:16:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result_sheet_scan_semester4s`
--

CREATE TABLE `result_sheet_scan_semester4s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collage_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scan_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `type` tinyint DEFAULT NULL,
  `service` tinyint DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_sheet_scan_semester4s`
--

INSERT INTO `result_sheet_scan_semester4s` (`id`, `province_id`, `collage_id`, `department_id`, `scan_path`, `year`, `status`, `type`, `service`, `added_by`, `edited_by`, `deleted_by`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
('ec26532b-3651-4729-8c7b-0ba0dff771b2', '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'uploads/result-sheet-scans/2023-04-08-04-04-36__IMG20230322104758.jpg', '1400', NULL, 1, 1, 1, NULL, NULL, NULL, '2023-04-08 00:06:31', '2023-04-08 00:06:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-08-13 07:56:14', '2022-08-13 07:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_pa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_dr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name_en`, `name_pa`, `name_dr`, `province_id`, `district_id`, `added_by`, `edited_by`, `deleted_by`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1ade74c0-796c-45a6-8370-14bccc15ba7b', 'Bargham', 'بارګام', 'بارګام', '265231c7-87ff-47d5-a275-e9c96377b173', '2142c0d5-0bb5-41ec-877a-eb10fcfd7064', 1, 1, 1, 'more About this school', '2023-01-25 03:39:53', '2023-01-26 02:33:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nic_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collage_province_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collage_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_scan_id` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entery_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduation_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_province_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_district_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `real_province_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `real_district_id` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `real_village` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `high_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `high_school_graduation_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint DEFAULT NULL,
  `service` tinyint DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `edited_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_by` bigint UNSIGNED DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `father_name`, `serial_no`, `nic_no`, `collage_province_id`, `collage_id`, `department_id`, `identity_scan_id`, `entery_year`, `graduation_year`, `current_province_id`, `current_district_id`, `current_village`, `real_province_id`, `real_district_id`, `real_village`, `high_school`, `high_school_graduation_year`, `type`, `service`, `added_by`, `edited_by`, `deleted_by`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
('05cafa7b-1ad4-44a3-86a4-89d4a43ba741', 'نازمینه', 'محمد اصف', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', '7987a128-bb02-47ae-91e1-656b6063b1a2', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:10:11', '2023-03-22 02:10:11', NULL),
('10d59745-346d-4e10-b8e6-cc8d0c1f6675', 'فایقه', 'حبیب الله', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', '635589b4-a136-43a3-a87f-0e0abd6d530c', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:20:07', '2023-02-28 02:20:07', NULL),
('1190b684-2a3b-47c6-9382-12adc9f97f89', 'حمید الله', 'احمد الله', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'fbfbdebc-ba1a-41e5-b4f5-ce976126abde', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40', NULL),
('1203ef97-f934-4e7f-9650-1c644dd6f8ae', 'نیاز پروره', 'صاحب الرحمن', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', '2bff79e1-1234-49bf-b40d-5fd856798652', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:18:22', '2023-03-22 02:18:22', NULL),
('14628f60-861a-4311-8b03-fcffccda9f08', 'شبانه', 'عصمت الله', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'c6f04fd8-b69a-42c6-b2b7-ad44a1ae9748', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:14:06', '2023-03-22 02:14:06', NULL),
('197f1328-5296-43a3-8fdd-7c8b6e0e9ea0', 'عابد الله', 'الله داد', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '6aaaa6d4-68a5-4924-81ae-3456aaeb69c0', '1391', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, NULL, NULL, '2023-02-28 02:06:00', '2023-03-01 01:44:30', NULL),
('1bab14e1-191a-4fc0-b2c0-282189abecb9', 'لعل مینه', 'ګل زاده', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'a967b0dd-7da7-4569-b1dc-da12a8f01a7b', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:15:44', '2023-03-22 02:15:44', NULL),
('1c93f5b8-9365-4c4d-b2ce-be7539b02b51', 'ماریه', 'توریالی', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'c6f04fd8-b69a-42c6-b2b7-ad44a1ae9748', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:14:06', '2023-03-22 02:14:06', NULL),
('1d371e4e-5572-4c3f-b2db-9e5b6e53ce9c', 'عبدالمحمد', 'مدیر', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '61741c77-d4d8-4395-bc7a-4fa1791c799c', '1391', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 01:53:14', '2023-02-28 01:53:14', NULL),
('1dd86d94-9f34-4b9a-9b0d-932eb071a793', 'اسیا', 'خادم الله', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', '21cb579e-ff39-4e26-94d3-f9647c111f6b', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-04-12 03:37:42', '2023-04-12 03:37:42', NULL),
('229347dd-b9f0-4656-be52-9d169bd8e88e', 'لعل محمد', 'سلطان محمد', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '61741c77-d4d8-4395-bc7a-4fa1791c799c', '1391', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 01:53:14', '2023-02-28 01:53:14', NULL),
('23005152-c094-4218-a698-e278cdb2c8f6', 'همالیه', 'علی احمد', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', '635589b4-a136-43a3-a87f-0e0abd6d530c', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:20:07', '2023-02-28 02:20:07', NULL),
('2550503b-4493-4852-a7fe-98a8fd55d49f', 'عارف الله', 'جاندار', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '6aaaa6d4-68a5-4924-81ae-3456aaeb69c0', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:06:00', '2023-02-28 02:06:00', NULL),
('28f09282-4d8c-4ff3-8cd7-22cd1d3bbe82', 'تواب الله', 'حشمت الله', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'fbfbdebc-ba1a-41e5-b4f5-ce976126abde', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40', NULL),
('3068a55a-ec8e-4bf5-9422-4a6b5b0d0032', 'محمود خان', 'میر داد خان', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'fbfbdebc-ba1a-41e5-b4f5-ce976126abde', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40', NULL),
('33622b7f-c5d8-45ba-bed2-40d957c0163c', 'حمیرا', 'داود شاه', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'a967b0dd-7da7-4569-b1dc-da12a8f01a7b', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:15:44', '2023-03-22 02:15:44', NULL),
('35d89263-c581-40bd-9d3a-da803e3f8c8e', 'شبانه', 'محمد اصف', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'a967b0dd-7da7-4569-b1dc-da12a8f01a7b', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:15:44', '2023-03-22 02:15:44', NULL),
('3c839139-57c5-4992-ba1e-71d03c9c148b', 'شاه بی بی', 'محمد اکرم', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', '2bff79e1-1234-49bf-b40d-5fd856798652', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:18:22', '2023-03-22 02:18:22', NULL),
('41c1b9f4-9508-49f2-a467-88b310700e58', 'محمد طاهر', 'عسکر خان', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '6aaaa6d4-68a5-4924-81ae-3456aaeb69c0', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:06:00', '2023-02-28 02:06:00', NULL),
('4906cc42-f787-4ae4-9f00-6da752849a34', 'عبدالجلیل', 'روستم خان', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '61741c77-d4d8-4395-bc7a-4fa1791c799c', '1391', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 01:53:14', '2023-02-28 01:53:14', NULL),
('4b6fab73-8c4c-427e-a780-f24ea88de8e8', 'سید غني', 'سید غریب', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '6aaaa6d4-68a5-4924-81ae-3456aaeb69c0', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:06:00', '2023-02-28 02:06:00', NULL),
('551bd2ed-134d-4f21-95a1-7a5457ebe2fd', 'ملکه', 'ایوب خان', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'c6f04fd8-b69a-42c6-b2b7-ad44a1ae9748', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:14:06', '2023-03-22 02:14:06', NULL),
('55571c06-022d-4798-981f-8fed3c951741', 'قانته', 'نیاز محمد', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', 'dfd77f9e-dbe0-4637-b75e-373fb49b3e19', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:24:37', '2023-02-28 02:24:37', NULL),
('59096831-7142-4c68-883f-8be2de40b3d6', 'باز محمد', 'ظریف خان', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '61741c77-d4d8-4395-bc7a-4fa1791c799c', '1391', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 01:53:14', '2023-02-28 01:53:14', NULL),
('5f816171-f50b-4772-a1fb-dc1f0c0e451e', 'راعینا', 'محمد ایوب', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', '7987a128-bb02-47ae-91e1-656b6063b1a2', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:10:11', '2023-03-22 02:10:11', NULL),
('614445e1-0b36-435b-b17d-ef20e98eb7ce', 'رونا', 'نادر شاه', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', '7987a128-bb02-47ae-91e1-656b6063b1a2', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:10:11', '2023-03-22 02:10:11', NULL),
('684908ba-a7ce-4f06-8329-379e5aa86fe0', 'نور الله', 'لعل پاچا', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'fbfbdebc-ba1a-41e5-b4f5-ce976126abde', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40', NULL),
('6b911132-587b-4052-9ba0-6653cedcf2d8', 'سیداګل', 'حسن ګل', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'fbfbdebc-ba1a-41e5-b4f5-ce976126abde', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40', NULL),
('72fe7371-1d72-4cbe-82b1-94b86ddd6109', 'شهناز', 'وزیز ګل', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '6aaaa6d4-68a5-4924-81ae-3456aaeb69c0', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:06:00', '2023-02-28 02:06:00', NULL),
('78e7fc1e-ede4-489e-b738-410a3b213e74', 'خالد', 'لعل باز', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '6aaaa6d4-68a5-4924-81ae-3456aaeb69c0', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:06:00', '2023-02-28 02:06:00', NULL),
('78f00a8a-64e3-473d-b4a2-92ba3d708e35', 'نسیمه', 'عبدالرسول', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', '2bff79e1-1234-49bf-b40d-5fd856798652', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:18:22', '2023-03-22 02:18:22', NULL),
('7fe66951-c9e4-4dd2-b6d8-a7509d7130fa', 'فهیم الله', 'رحمت الله', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '61741c77-d4d8-4395-bc7a-4fa1791c799c', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 01:53:14', '2023-02-28 01:53:14', NULL),
('8955281a-db68-417b-b5b1-af831f5dcfb5', 'عبید الله', 'حسین خان', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '6aaaa6d4-68a5-4924-81ae-3456aaeb69c0', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:06:00', '2023-02-28 02:06:00', NULL),
('8e787993-b0b3-41d5-88e3-5f32ded37fc0', 'عابده', 'شیر محمد', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', 'dfd77f9e-dbe0-4637-b75e-373fb49b3e19', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:24:37', '2023-02-28 02:24:37', NULL),
('90e0ed13-c8c6-4536-b79c-3bd2dfdd0cc3', 'سوحیله', 'نیاز محمد', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', '602ffdd9-0a59-4303-abed-d894ea9a73e0', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:22:31', '2023-02-28 02:22:31', NULL),
('94b52ad8-0bc5-4161-8f05-2faa4f9fd8f1', 'مریم', 'یار محمد', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', '602ffdd9-0a59-4303-abed-d894ea9a73e0', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:22:31', '2023-02-28 02:22:31', NULL),
('9d9705d2-01c1-4d32-bc58-3c6106f48ce3', 'ملیکه', 'سعیدالله', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', '602ffdd9-0a59-4303-abed-d894ea9a73e0', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:22:31', '2023-02-28 02:22:31', NULL),
('9df8edfd-1c8a-408f-b2ea-56e8736304bf', 'عاصم الله', 'پتنګ', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '61741c77-d4d8-4395-bc7a-4fa1791c799c', '1391', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 01:53:14', '2023-02-28 01:53:14', NULL),
('a3b1d525-ad2e-41d5-8a25-d6917f3afd0e', 'روقیه', 'محمد انور', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'e1c1a6ec-28e9-4b61-92f9-effdba936437', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:12:01', '2023-03-22 02:12:01', NULL),
('a4efe16c-67b0-4c71-9fa3-f4792631daba', 'شازیه', 'ګل نبی', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', 'dfd77f9e-dbe0-4637-b75e-373fb49b3e19', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:24:37', '2023-02-28 02:24:37', NULL),
('a7277b38-6584-4c9e-a25d-482edca2b80f', 'عبدالرحمیم', 'محمد ګلاب', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '6aaaa6d4-68a5-4924-81ae-3456aaeb69c0', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:06:00', '2023-02-28 02:06:00', NULL),
('ad031bd6-5d52-48ab-b959-927f6d1f2d7c', 'سیما ګل', 'سید عثمان', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', '635589b4-a136-43a3-a87f-0e0abd6d530c', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:20:07', '2023-02-28 02:20:07', NULL),
('b28d278f-7a7b-47d5-9c01-00c4304f344e', 'خاکسارالدین', 'نجم الدین', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '61741c77-d4d8-4395-bc7a-4fa1791c799c', '1391', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 01:53:14', '2023-02-28 01:53:14', NULL),
('b77f327e-8ff0-46e5-a82a-36430b92a0d6', 'صدام حسین', 'شریف الله', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'fbfbdebc-ba1a-41e5-b4f5-ce976126abde', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40', NULL),
('bfe1773b-22cf-466c-931e-b9f903c1d656', 'نور اعظم', 'محمد عالم خان', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'fbfbdebc-ba1a-41e5-b4f5-ce976126abde', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40', NULL),
('cde167c7-faad-4e8d-ad23-4882811f1532', 'فریبا', 'ننګیالی', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'e1c1a6ec-28e9-4b61-92f9-effdba936437', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:12:01', '2023-03-22 02:12:01', NULL),
('cfc85a70-ea47-4362-a9fc-ae9e53dd61d9', 'سمیع الله', 'احمدالله', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'fbfbdebc-ba1a-41e5-b4f5-ce976126abde', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40', NULL),
('d616953d-a9de-447f-8a27-4efd74b29572', 'ساجیده', 'اقبال شاه', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'e1c1a6ec-28e9-4b61-92f9-effdba936437', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:12:01', '2023-03-22 02:12:01', NULL),
('d6e86364-672c-4fe6-b33d-3b568f98c323', 'امان خان', 'زلمی', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', 'fbfbdebc-ba1a-41e5-b4f5-ce976126abde', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:01:40', '2023-02-28 02:01:40', NULL),
('dadaa335-dd5d-43c6-8071-8b9a73f0a998', 'اسیا', 'خادم الله', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', '2bff79e1-1234-49bf-b40d-5fd856798652', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:18:22', '2023-03-22 02:18:22', NULL),
('dda12856-47f7-44cf-8d4f-b2ccd5ec64a6', 'عایشه', 'نعمت غنی', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', 'dfd77f9e-dbe0-4637-b75e-373fb49b3e19', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:24:37', '2023-02-28 02:24:37', NULL),
('e2c95df1-841a-471d-aec5-97e5f495e4cb', 'جانان نبی', 'افریدی', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '61741c77-d4d8-4395-bc7a-4fa1791c799c', '1391', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 01:53:14', '2023-02-28 01:53:14', NULL),
('e7d7ceb2-cc69-4569-92ff-d732ba1c0709', 'سونیا', 'خوشحال', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'e1c1a6ec-28e9-4b61-92f9-effdba936437', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:12:01', '2023-03-22 02:12:01', NULL),
('e95ab5a1-4b20-47f0-871a-e71de297a212', 'شګفته (سعادات)', 'سید محمود', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', '635589b4-a136-43a3-a87f-0e0abd6d530c', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:20:07', '2023-02-28 02:20:07', NULL),
('ebb5eef8-b9e2-470d-be81-bfa376b82fff', 'نصرته', 'ګل زاده', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'a967b0dd-7da7-4569-b1dc-da12a8f01a7b', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:15:44', '2023-03-22 02:15:44', NULL),
('eda11753-12c9-4702-9399-8aebf597f18b', 'رحیمه', 'ګل پاچا', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', '7987a128-bb02-47ae-91e1-656b6063b1a2', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:10:11', '2023-03-22 02:10:11', NULL),
('f00591d7-6394-4abd-82ab-413e0472590e', 'سامیه', 'رحیم الله', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'dcd1e0c6-bf30-4638-89cb-631c75e76f5f', 'c1686000-3383-4989-a296-2b56e0aeb916', '602ffdd9-0a59-4303-abed-d894ea9a73e0', '1396', '1398', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 8, NULL, NULL, NULL, '2023-02-28 02:22:31', '2023-02-28 02:22:31', NULL),
('f676f953-57f3-4192-b560-c4f43c3f145a', 'فاطمه', 'محمد نظر', NULL, NULL, '265231c7-87ff-47d5-a275-e9c96377b173', 'a57994f2-adc6-4db3-92ce-a7ade485d033', '963b0cb3-eb22-42bf-acf2-34fb3f3d3812', 'c6f04fd8-b69a-42c6-b2b7-ad44a1ae9748', '1398', '1400', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-03-22 02:14:06', '2023-03-22 02:14:06', NULL),
('f6b8a3a1-65bc-4331-b77c-18b554e6f913', 'نختر ګل', 'اختر ګل', NULL, NULL, 'a3590b97-3d53-42b7-9f54-31fa0bf93fc8', '2794328b-ac81-462c-8784-ee6876d435e4', '603a8ddc-f28a-4480-a86b-13dcffd3bcef', '6aaaa6d4-68a5-4924-81ae-3456aaeb69c0', '1389', '1391', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL, NULL, '2023-02-28 02:06:00', '2023-02-28 02:06:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_result_semester1s`
--

CREATE TABLE `student_result_semester1s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_sheet_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_result_semester1s`
--

INSERT INTO `student_result_semester1s` (`id`, `result_sheet_id`, `student_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
('12fc0ed2-0a6e-4e52-97f2-ea78d19df7a5', '6ddf7c03-44d1-4d7b-915b-414f20cca241', '05cafa7b-1ad4-44a3-86a4-89d4a43ba741', NULL, '2023-03-22 03:29:22', '2023-03-22 03:29:22'),
('3c0c2fc9-8e7d-4395-9263-a353ed7d1e48', '447a852a-bfa4-4b7a-9dc5-28100addbbf6', 'e7d7ceb2-cc69-4569-92ff-d732ba1c0709', NULL, '2023-03-23 01:44:09', '2023-03-23 01:44:09'),
('6906ab56-5e9f-464f-8ce4-e45e2655a27c', '97a9695b-18b0-40fa-8f2f-db2410084cf5', '1c93f5b8-9365-4c4d-b2ce-be7539b02b51', NULL, '2023-04-12 03:40:46', '2023-04-12 03:40:46'),
('79b95dbd-488a-4530-b8b7-69904dded827', '447a852a-bfa4-4b7a-9dc5-28100addbbf6', 'a3b1d525-ad2e-41d5-8a25-d6917f3afd0e', NULL, '2023-03-23 01:44:09', '2023-03-23 01:44:09'),
('e03b916e-d687-4f33-8de9-543e633ee1cf', '6ddf7c03-44d1-4d7b-915b-414f20cca241', 'eda11753-12c9-4702-9399-8aebf597f18b', NULL, '2023-03-22 03:29:22', '2023-03-22 03:29:22'),
('f30fef9b-132f-4486-9c96-9497fa5aa156', '97a9695b-18b0-40fa-8f2f-db2410084cf5', '14628f60-861a-4311-8b03-fcffccda9f08', NULL, '2023-04-12 03:40:46', '2023-04-12 03:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `student_result_semester2s`
--

CREATE TABLE `student_result_semester2s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_sheet_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_result_semester3s`
--

CREATE TABLE `student_result_semester3s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_sheet_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_result_semester3s`
--

INSERT INTO `student_result_semester3s` (`id`, `result_sheet_id`, `student_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
('125f9b17-60de-404a-b4dc-f844ac7cc969', '9d7be47c-dd6f-4841-9e02-18b8be5b9650', '5f816171-f50b-4772-a1fb-dc1f0c0e451e', NULL, '2023-03-23 00:35:05', '2023-03-23 00:35:05'),
('7b701f41-bb20-44a4-a312-d7e41c702336', 'eb73bf32-9981-48ed-a52e-369a8f0f7886', 'eda11753-12c9-4702-9399-8aebf597f18b', NULL, '2023-03-23 00:16:21', '2023-03-23 00:16:21'),
('e864b8c2-da42-4516-a50f-ed221d1ea8fb', '9d7be47c-dd6f-4841-9e02-18b8be5b9650', '614445e1-0b36-435b-b17d-ef20e98eb7ce', NULL, '2023-03-23 00:35:05', '2023-03-23 00:35:05'),
('f573c8bf-0ec9-4dcb-b5e8-559cdce79bfc', 'eb73bf32-9981-48ed-a52e-369a8f0f7886', '05cafa7b-1ad4-44a3-86a4-89d4a43ba741', NULL, '2023-03-23 00:16:21', '2023-03-23 00:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `student_result_semester4s`
--

CREATE TABLE `student_result_semester4s` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_sheet_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_result_semester4s`
--

INSERT INTO `student_result_semester4s` (`id`, `result_sheet_id`, `student_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
('0db4ac08-968f-475f-9abd-c656b0dc2f6c', 'ec26532b-3651-4729-8c7b-0ba0dff771b2', 'e7d7ceb2-cc69-4569-92ff-d732ba1c0709', NULL, '2023-04-08 00:06:31', '2023-04-08 00:06:31'),
('59841e38-05a9-4438-a30b-f85c81124fd3', 'ec26532b-3651-4729-8c7b-0ba0dff771b2', 'a3b1d525-ad2e-41d5-8a25-d6917f3afd0e', NULL, '2023-04-08 00:06:31', '2023-04-08 00:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '0',
  `type` tinyint DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `service` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `position`, `address`, `cover_image`, `profile_image`, `phone`, `status`, `type`, `deleted_at`, `service`) VALUES
(1, 'Ahmad', 'admin@gmail.com', 'admin', NULL, '$2y$10$8V6DFT0/xPeQ2Lga7iOrk.H3MT05t9PSbsMd3x976yWuwTpzCJ7Eu', NULL, '2022-08-13 07:56:14', '2023-02-22 05:06:32', 'MIS Officer', 'Kabul, Afghanistan', 'uploads/covers/2023-01-08-15-01-51__bg-banner.jpeg', 'uploads/avatars/2023-02-22-09-02-36__avatar-5.jpg', '0700000000', 1, 1, NULL, 1),
(8, 'Walid Khan', 'walid@gmail.com', 'walidkhan', NULL, '$2y$10$YlAwjW.S9x1jdMJF4CrX6O5xhE.g0I81khKDiL6T2m0RhJZVfvFWy', NULL, '2023-01-08 01:10:01', '2023-02-28 02:13:58', 'Project Manager', 'N/A', 'uploads/covers/2023-01-08-15-01-53__vcwUvzFtPwV5pnfJGCCfpP-1200-80.jpg', 'uploads/avatars/2023-01-08-15-01-51__avatar-2.jpg', '+937000000', 1, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `english` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pashto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dari` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`id`, `key_name`, `english`, `pashto`, `dari`, `created_at`, `updated_at`) VALUES
('', 'dashboard', 'Dashboard', 'ډاشبورډ', 'داشبورد', NULL, NULL),
('00c6d5e4-9703-41b7-991a-a1c687bf80f7', 'created-date', 'Created Date', 'د ثبت نیټه', NULL, '2023-01-02 10:26:08', '2023-01-26 03:09:22'),
('0104fddd-0915-45a1-a5d6-2a68c8567cb8', 'assign-permission', 'Assing permission', NULL, NULL, '2022-08-13 14:39:08', '2022-08-13 14:39:08'),
('011429b2-6121-4ce4-a6a4-c283395fe2e9', 'enter-donor-name', 'Enter donor name', NULL, NULL, '2022-10-18 13:09:35', '2022-10-18 13:09:35'),
('01aa3a5f-02db-4339-9f67-54f407ecaf61', 'received-date', 'Date Acquired', NULL, NULL, '2022-10-18 13:13:15', '2022-10-18 13:13:15'),
('01f8e35b-a59b-4d80-be6a-ee1fa436bea8', 'guard', 'Guard', NULL, NULL, '2022-08-13 14:41:05', '2022-08-13 14:41:05'),
('0270a12d-98ff-4557-8280-7a3f9cf19f38', 'graduated-students-statistics', 'Graduated Students Statistics Per Year', 'د فارغ شوي زده کړیالانو کلنۍ احصایه', NULL, '2023-02-28 12:24:32', '2023-02-28 12:25:59'),
('02dbd756-8ebe-425a-baf1-a72053bd53cf', 'date', 'Date', NULL, NULL, '2022-08-21 05:25:11', '2022-08-21 05:25:11'),
('030c3dfa-9837-4c08-bbdb-134ec8ae9f44', 'select-province', 'Select Province', 'ولایت انتخاب کړئ', NULL, '2023-01-10 02:07:26', '2023-01-10 03:28:07'),
('037c1a80-ccf4-424a-81cf-9e8bf205ceed', 'backup-name', 'Backup Name', NULL, NULL, '2022-08-12 03:14:01', '2022-08-12 03:14:01'),
('044c214b-9ad4-4a5b-b794-c22ede96f4b4', 'graduation-date', 'Graduation Year', 'د فراغت کال', NULL, '2023-02-19 04:40:32', '2023-02-19 04:40:32'),
('04e57f25-e8e5-4e4c-acda-f1a676148e30', 'name', 'Name', 'نوم', NULL, '2022-08-13 09:28:38', '2023-01-30 02:13:02'),
('056ccef6-c9c5-4969-8383-aaac37dfca1f', 'address', 'Address', 'ادرس', NULL, '2022-08-20 11:20:43', '2023-02-10 12:11:16'),
('0592f234-c743-4a3b-b0e0-f9f72f640426', 'here-you-can-create-edit-or-delete-asset', 'Here you can add, edit or delete asset', NULL, NULL, '2022-10-18 14:08:30', '2022-10-18 14:08:30'),
('05fbd2e8-d764-4cc0-b5c0-30f12147a5f8', 'added-by', 'Added By', 'ثبتوونکی', NULL, '2022-08-21 05:25:27', '2023-01-26 03:09:48'),
('064d7dbb-389a-442a-ac2b-532c32a83625', 'labels', 'Labels', 'کلیدي نومونه', NULL, '2022-08-11 12:50:24', '2023-01-30 05:27:58'),
('06b5ecfb-ec72-4f16-bd44-df03151d47b0', 'second semester result sheet', 'Second semester result sheet', 'دوهم سمستر د نتایجو جدول', NULL, '2023-03-23 00:18:31', '2023-03-23 00:18:31'),
('0717b46e-dbcb-4ab1-abcd-665de13c246f', 'confirm-password', 'Confirm Password', 'موافق پټ نوم', NULL, '2022-08-13 12:18:44', '2023-02-10 12:16:35'),
('07cd6d9f-70d2-484d-a646-bcc19ee6c72c', 'edit-user', 'Edit User', NULL, NULL, '2023-01-08 10:44:49', '2023-01-08 10:44:49'),
('08e984e6-2e70-4bef-b9f9-614673180c10', 'cancel', 'Cancel', 'لغوه کول', NULL, '2022-08-13 12:48:04', '2023-01-30 00:53:38'),
('094b9c27-6aae-440a-9d64-6e123515241f', 'student-name', 'Student Name', 'زده کړیال نوم', NULL, '2023-03-01 01:50:30', '2023-03-01 01:50:30'),
('0bdcaa82-ffc7-4735-b3e2-f522e98c6d77', 'enter-asset-name', 'Enter asset name', NULL, NULL, '2022-10-18 13:00:22', '2022-10-18 13:00:22'),
('0d0ae8a6-7f5e-4557-84e9-f4b1405a5e04', 'search-for-students', 'Search for Students', 'زده کړیالان انتخاب کړئ', NULL, '2023-03-20 04:12:19', '2023-03-20 04:12:19'),
('0df7fc3d-f355-491e-b531-29c726f37301', 'here-you-can-add-edit-or-delete-provinces', 'Here you can add, edit, or ,delete provinces', 'دلته تاسي کولی شئ چی د ولاتونه اظافه، تغیر او یا هم له منځه یوسئ', NULL, '2023-01-09 02:56:41', '2023-03-01 03:14:52'),
('0e1a4c08-1f96-4fbc-a619-5091ce35a6c9', 'department', 'Department', 'څانګه', NULL, '2023-02-21 03:54:53', '2023-02-21 03:54:53'),
('1015413d-b8c2-4fb9-befc-fa63058d2ece', 'please-select-collage', 'Please Select Collage', 'مهربانی وکړئ دارالمعلمین انتخاب کړئ', NULL, '2023-03-20 05:47:01', '2023-03-20 05:47:01'),
('1035d989-f5a5-4db8-9409-d3f862317c0b', 'enter-asset-model', 'Enter asset model', NULL, NULL, '2022-10-18 13:02:24', '2022-10-18 13:02:24'),
('10c0daae-13fe-4f5e-8d41-d0cc539ed544', 'collage-details', 'Collage Details', 'دارالمعلمین معلومات', NULL, '2023-02-11 01:45:17', '2023-02-11 01:45:17'),
('114dfa6f-30f9-41a4-8535-f4bd24654625', 'all-asset', 'All Assets', NULL, NULL, '2022-10-18 14:14:54', '2022-10-18 14:14:54'),
('119b60c5-6597-440d-8a0d-97cf812ab34b', 'select-user-type', 'Select User type', 'کارن نوعه انتخاب کړئ', NULL, '2023-01-02 08:39:50', '2023-02-10 12:14:37'),
('11f98206-5abe-435f-8fb9-e074f80930c5', 'enter-all-required-information', 'Enter all required information', 'ټول ضروری معلومات ولیکئ', NULL, '2022-08-13 12:20:11', '2023-02-10 12:09:01'),
('12fa95df-0fb8-44e2-8a78-1e5cb526a0a5', 'user-type', 'User Type', 'کارن نوعه', NULL, '2023-01-02 08:39:31', '2023-02-10 12:11:50'),
('138c0a41-15ae-428b-96cb-d28bc970e8ac', 'add-new-department', 'Add new department', 'نوی څانګه اظافه کړئ', NULL, '2023-02-13 01:42:03', '2023-02-13 01:42:36'),
('13ce0264-014d-45f2-b2cb-972bff1b8ce0', 't1-code-no', 'T 1', NULL, NULL, '2022-10-18 13:10:15', '2022-10-18 13:10:15'),
('1436c8cf-d2cb-4f9d-97ea-c37873cae728', 'unassigned', 'Unassigned', NULL, NULL, '2022-10-18 15:57:11', '2022-10-18 15:57:11'),
('16d998a5-aff4-47cf-8903-f2936578d4ad', 'donor-name', 'Donor Name', NULL, NULL, '2022-10-18 13:09:18', '2022-10-18 13:09:18'),
('170addfa-f18b-4f08-b78c-02ea00f49168', 'delete-student-info', 'Delete Information', 'معلومات له منځه وړل', NULL, '2023-03-25 02:06:35', '2023-03-25 02:07:55'),
('17b64b85-467c-40a6-865b-5ae28025ff61', 'deleted-by', 'Deleted By', 'لمنځه وړونکی', NULL, '2023-01-26 01:36:57', '2023-01-26 02:56:12'),
('18a9a9b7-f8e0-4fd7-963b-01076e50e0ed', 'logo', 'Logo', NULL, NULL, '2022-08-20 15:04:35', '2022-08-20 15:04:35'),
('18b22f99-21d7-427a-950f-314da74372ee', 'school-details', 'School details', 'ښوونځی تفصل', NULL, '2023-01-26 02:30:35', '2023-01-26 02:56:39'),
('18d2fedf-ed14-4dbb-a7e2-690576417858', 'enter-asset-serial-no', 'Enter asset Serial No', NULL, NULL, '2022-10-18 13:04:31', '2022-10-18 13:04:31'),
('19607e57-7cf1-4a8c-9e3a-1303010f32cd', 'enter-description', 'Enter Description', NULL, NULL, '2022-10-18 13:15:44', '2022-10-18 13:15:44'),
('1b5a5338-9f7f-401b-9ade-e7c7541c9c2b', 'here-you-can-edit-user-information-by-clicking-edit-button', 'Here you can edit user information by clicking edit button', NULL, NULL, '2022-08-14 07:37:23', '2022-08-14 07:37:23'),
('1d08c2ab-0982-41d2-9ec0-5cefe9c2da5a', 'enter-entry-date', 'Enter entry year', 'د شمولیت نیته ولیکئ', NULL, '2023-02-19 04:19:25', '2023-02-19 04:20:13'),
('1d532fdf-9ad1-45ad-9e24-3cf2d2b93b7e', 'enter-student-graduation-year-to-load-students-and-then-select-result-sheet-related-students', 'Enter student graduation date to load students and then select result sheet related students', 'د زده کړیالانو دفراغت کال ولیکئ تر څو د همدغه کال مربطه زده کړیالان په لیست کې راشی بیا له لیست څخه د نتایج مربط زده کړیالان انتخاب کړئ', NULL, '2023-03-20 05:36:16', '2023-03-20 05:36:16'),
('1dbe2193-a7ea-4dc4-b8c4-780c3b1b2cfd', 'add-school', 'Add School', 'ښونځی اظافه کړئ', NULL, '2023-01-24 02:50:33', '2023-01-26 03:02:20'),
('1e009792-a24b-439e-adfd-11a84871b4f2', 'asset', 'Asset', 'اجناس', NULL, '2022-10-18 12:04:27', '2022-10-18 12:04:57'),
('1ebd3698-2018-402b-8528-af6fe650ad34', 'collages', 'Collages', 'دارالمعلمین', NULL, '2023-02-11 00:55:18', '2023-02-11 00:55:18'),
('1f5df608-568b-45c6-bde3-179336711739', 'add-new-students', 'Add new Students', 'نوي زده کړیالان اظافه کړئ', NULL, '2023-02-21 06:12:37', '2023-02-21 06:12:37'),
('1fc19f9d-1efe-43d5-ba27-849f3f360bd1', 'about-identity', 'About Identity File', 'د شهرت د جدول عمومی معلومات', NULL, '2023-02-16 02:41:21', '2023-02-16 02:41:21'),
('2117da96-92de-44f2-a013-306b1d63959f', 'edit-student-result-sheet-info', 'Edit Result Sheet Info', 'نتایجو د جدول معلومات تغیرول', NULL, '2023-03-25 02:05:13', '2023-03-25 02:08:21'),
('230e89c1-3046-460f-a42b-82d6683ca417', 'instagram', 'Instagram', NULL, NULL, '2022-08-20 10:45:30', '2022-08-20 10:45:30'),
('23a3b338-f892-4ef7-b2a0-ed586351f3ac', 'student-info', 'Student Information', 'د زده کړیال معلومات', NULL, '2023-02-22 04:55:06', '2023-02-22 04:55:06'),
('244c6eba-0de1-428e-8149-b864daf774a8', 'edit-province', 'Edit Province', NULL, NULL, '2023-01-09 04:37:39', '2023-01-09 04:37:39'),
('25bc0248-ca4c-4bae-9ca9-091b960a69f9', 'department', 'Departments (T3)', NULL, NULL, '2022-11-02 12:41:55', '2022-11-02 12:41:55'),
('25fcd007-4ce7-4400-85af-6219fe37b3e1', 'user-profile', 'User Profile', NULL, NULL, '2022-08-14 07:36:07', '2022-08-14 07:36:07'),
('260c45e9-45e3-487c-ab21-f3eaaaf49dcc', 'search-for-province', 'Search for province', 'ولایت وپلټئ', NULL, '2023-01-25 02:09:41', '2023-01-26 03:01:41'),
('271284d4-91e7-4488-ac7e-eeda47e3f9b1', 'image', 'Image', NULL, NULL, '2022-08-21 05:24:32', '2022-08-21 05:24:32'),
('2961c351-a588-4d72-88a5-72df74dc75d9', 'add-new', 'Add New', 'نوی اظافه کړئ', NULL, '2022-08-11 12:52:13', '2023-01-30 00:52:38'),
('29a5ac1c-0f25-4907-8b26-d9b596127c6d', 'archive', 'Archive', 'ارشیف کول', NULL, '2023-01-02 11:08:29', '2023-01-30 03:38:59'),
('2a13635f-7707-42a4-8b78-b864bec62392', 'add-new-role', 'Add New Role', 'نوی نقش اظافه کړئ', NULL, '2022-08-14 07:23:13', '2023-02-06 00:11:36'),
('2a1ed5ea-c7bf-4f79-8c4d-21a72194647b', 'here-you-can-create-edit-or-delete-permission', 'Here you can create, edit, or delete permission', NULL, NULL, '2022-08-18 02:33:05', '2022-08-18 02:33:05'),
('2aa9079c-43c8-4e0e-b0bb-d8b9ff974760', 'districts-list', 'Districts List', 'د ولسوالیو لیست', NULL, '2023-01-10 01:48:25', '2023-01-10 03:30:29'),
('2b66f21c-7dde-4876-b9dd-4dedd0f4122c', 'all-messages', 'All Messages', NULL, NULL, '2022-08-11 21:57:00', '2022-08-11 21:57:00'),
('2cc83c7f-0bdc-47fd-81e8-910a5ed77e11', 'role-name', 'Role Name', NULL, NULL, '2022-08-13 15:26:09', '2022-08-13 15:26:09'),
('2cf0b1d1-c883-4f24-baf5-cfab6be4868a', 'restore', 'Restore', NULL, NULL, '2023-01-05 01:35:07', '2023-01-05 01:35:07'),
('2d9d4e70-c9d9-4f36-aca9-933aadd5ada4', 'select-department', 'Select Department', 'څانګه انتخاب کړئ', NULL, '2023-02-16 01:59:13', '2023-02-16 01:59:13'),
('2ddeb3e0-902a-43f9-a927-03980a416ea4', 'identity-appendices', 'Student identity form appendices', 'شهرت د جدول ضمایم', NULL, '2023-02-16 02:46:25', '2023-02-16 02:46:25'),
('2e39f5c0-6215-4a20-a37b-f964dc41e344', 'in-service', 'In Servcie', 'داخل خدمت', NULL, '2023-02-14 05:15:50', '2023-02-14 05:15:50'),
('30647805-59db-4f5a-95d2-7d9133f942c1', 'unapproved', 'Unapproved', 'ناتـــــــــائید', NULL, '2023-02-21 00:33:36', '2023-02-21 00:33:36'),
('31ee1e1f-3e33-478a-85ac-5042c04cfe16', 'enter-twitter-url', 'Enter your Twitter account URL', NULL, NULL, '2022-08-20 10:47:33', '2022-08-20 10:47:33'),
('3321fb6a-b9ba-48a8-bee8-58eba6915e55', 'enter-linkedin-url', 'Enter your LinkedIn account URL', NULL, NULL, '2022-08-20 10:53:05', '2022-08-20 10:53:05'),
('33a23f45-5d41-4e95-9d35-4753529f05ba', 't2-desciption', 'T2', NULL, NULL, '2022-10-18 13:11:10', '2022-10-18 13:11:10'),
('35b92a77-5259-4f42-8602-2ea61c521890', 'here-you-can-delete-or-restore-provinces', 'Here you can delete or restore porvinces', NULL, NULL, '2023-01-09 05:19:29', '2023-01-09 05:19:29'),
('36dd0aa2-eb22-4883-b6aa-14a68eb0c4ec', 'free-service', 'Free Service', 'خارج خدمت', NULL, '2023-02-14 05:16:11', '2023-02-14 05:16:11'),
('37409af6-6a67-4cb2-8ee2-a91490fa2e97', 'search-for-department', 'Search for department', 'څانګه وپلټئ', NULL, '2023-02-16 02:00:16', '2023-02-16 02:00:58'),
('37d7c1c3-cf48-45a9-9274-ef38d621237d', 'add-student-result-sheet', 'Add Student Result Sheet', 'زده کړیالانو د نتجایجو جدول اظافه کړئ', NULL, '2023-03-05 00:42:03', '2023-03-05 00:42:03'),
('38256246-b669-412f-835c-303df6240a41', 'user-management', 'User Management', 'د کارن مدیریت', NULL, '2022-08-13 14:13:32', '2023-01-30 01:05:17'),
('39a2fa95-58cf-4cf5-9aca-59efc50ada53', 'archived-date', 'Archived Date', NULL, NULL, '2023-01-09 05:34:57', '2023-01-09 05:34:57'),
('3aace57e-dce3-49c3-8226-ea1fa00a44ff', 'no-department-to-choose-from', 'No Departments to choose from', NULL, NULL, '2023-02-13 04:48:50', '2023-02-13 04:48:50'),
('3c30816c-0ccb-47a1-b491-d5e82e59b3a0', 'here-you-can-add-edit-or-delete-message', 'Here you can add, edit or delete message', NULL, NULL, '2022-08-11 21:54:50', '2022-08-11 21:54:50'),
('3c70e0cc-d578-44d5-804b-c565644b8a73', 'edit-label', 'Edit label', NULL, NULL, '2022-08-11 21:35:15', '2022-08-11 21:35:15'),
('3c7240b3-e620-421c-a139-83e57f1c311c', 'change-password', 'Change Password', 'پټ نوم تغیرول', NULL, '2023-01-03 05:30:42', '2023-01-30 02:59:45'),
('3de87ab4-cf48-4925-9872-5af25d0c28ae', 'student-forth-semester-result-sheet-not added', 'Student forth semester result sheet not added', 'د زده کړیال د څلورم سمستر د نتایجو جدول په سیستم کې نه دی اظافه شوی', NULL, '2023-03-23 00:21:10', '2023-03-23 00:21:51'),
('3df58966-e38f-45f7-8b07-85d0840bc456', 'Page not found!', 'Page not found!', 'ستاسی لپاره پاڼه پیدا نه شوه!', NULL, '2023-01-12 02:27:14', '2023-01-26 03:05:15'),
('3e062d3a-6586-40cc-b145-87c3335cdf55', 'banners', 'Banners', NULL, NULL, '2022-08-20 07:30:49', '2022-08-20 07:30:49'),
('3e806767-dc30-4b43-8b78-7f2edc6102c0', 'permissions-list', 'Permissions LIst', NULL, NULL, '2023-01-08 10:08:18', '2023-01-08 10:08:18'),
('3e8e0856-82b4-443c-9929-58e1c4715276', 'system-setting', 'System Setting', 'سیسټم ترتیبات', NULL, '2022-08-20 09:30:24', '2023-02-06 00:16:27'),
('3f5dfca4-de19-4618-97aa-3396c46a629e', 'student-second-semester-result-sheet-not added', 'Student second semester result sheet not added', 'د زده کړیال د دوهم سمیستر د نتایجو جدول په سیستم کې نه دی اظافه شوی', NULL, '2023-03-23 00:19:23', '2023-03-23 00:19:23'),
('403bba28-8233-4678-a0ce-64be6bb52910', 'asset-id', 'Asset ID', NULL, NULL, '2022-10-18 12:59:07', '2022-10-18 12:59:07'),
('412302fe-178c-4d03-a6b0-1a5c1a6b5b32', 'role', 'Role', 'نقش', NULL, '2022-08-13 09:30:23', '2023-02-14 01:30:58'),
('42001cf2-8b19-417f-b925-0f62c9c15298', 'add-students-result-sheet', 'Add Students Result Sheet', 'د زده کړیالانو د نتایجو جدول اظافه کړئ', NULL, '2023-03-05 00:26:51', '2023-03-05 00:26:51'),
('4246af6b-2587-47d3-b6d6-9aa840551c56', 'screen-locked', 'Screen Locked', NULL, NULL, '2023-01-03 06:29:06', '2023-01-03 06:29:06'),
('438badcf-381a-4488-b6d0-3cc7ac4aa3ce', 'select-collage', 'Select Collage', 'دارالمعلمین', NULL, '2023-02-16 01:02:43', '2023-02-16 01:02:43'),
('444ffc5d-c3c0-4d8e-bed0-be79fee07d4d', 'required', 'is required', 'ضروری دی', NULL, '2022-08-20 09:29:38', '2023-02-06 00:18:55'),
('455b5afd-2c23-4978-a12e-503ab959911b', 'edited-by', 'Edited By', 'تغیروونکی', NULL, '2023-01-26 02:48:38', '2023-03-01 02:09:14'),
('45c34de4-1f54-4138-8cc7-314049287975', 'show', 'Show', 'ښودل', NULL, '2022-10-18 14:25:04', '2023-02-11 01:22:52'),
('45e43668-3ce3-4f3c-a226-d94f1f16a237', 'title', 'Title', NULL, NULL, '2022-08-21 05:24:45', '2022-08-21 05:24:45'),
('461de67a-6332-48e7-9fc4-d038d21a03d6', 'create-new', 'Create new', NULL, NULL, '2022-08-12 01:19:14', '2022-08-12 01:19:14'),
('4b441a8c-7162-4768-b678-df90fc2f5c19', 'enter-t3', 'Enter T3', NULL, NULL, '2022-10-18 13:12:32', '2022-10-18 13:12:32'),
('4b4adc51-d057-4088-856a-7d3d8b391df9', 'all-roles', 'All roles', NULL, NULL, '2022-08-13 14:34:09', '2022-08-13 14:34:09'),
('4b6e3004-f0e0-4b3a-81fc-49d9e445f45a', 't3-department', 'T3', NULL, NULL, '2022-10-18 13:12:03', '2022-10-18 13:12:03'),
('4b72cd0e-f93a-489a-8fc4-47e5be8703aa', 'students-identity', 'Students Identity Form', 'محصلانو د شهرت جدول', NULL, '2023-02-19 03:56:19', '2023-02-19 03:56:19'),
('4ba7cf39-b67d-489c-a670-5d9dbeef82c6', 'add-new-collage', 'Add new callage', 'نوی دار المعلمین ظافه کړئ', NULL, '2023-02-11 00:58:44', '2023-02-11 00:59:52'),
('4d380c32-c138-4517-b0c8-76d89931bf08', 'add-collage', 'Add Collage', 'دارالمعلمین اضافه کول', NULL, '2023-02-11 01:12:32', '2023-02-11 01:12:32'),
('4e78a075-febc-4ede-bdee-82dea485b36e', 'yes-delete-it', 'Yes, Delete it', 'هو، لمنځه یې یوسئ', NULL, '2022-08-11 22:02:15', '2023-02-11 01:38:32'),
('4f351ccb-2eb8-4060-aac9-ff4f94c266b7', 'identity-and-result-sheet-forms-info', 'student identity and result-sheet-forms-information', 'د زده کړیالانو د شهرت او نتایجو د جدولونو معلومات', NULL, '2023-03-22 03:52:09', '2023-03-25 00:21:38'),
('4f3ada16-d2c6-4a26-9e14-eb57cac5169e', 'collage', 'Collage', 'دارالمعلمین', NULL, '2023-02-16 01:01:45', '2023-02-16 01:01:45'),
('4f96d59c-d75e-4e1e-bad2-3e275a2e66e5', 'error', 'Error', 'ناسمه کړنه', NULL, '2023-01-04 03:30:25', '2023-02-27 03:31:16'),
('4faa55ce-8663-4eae-966e-b29b2ce84ffb', 'here-you-can-see-school-details', 'Here you can see school details', 'تاسې کولی شئ چې د ښونځی په اړه معلومات دلته وګورئ', NULL, '2023-01-26 02:31:04', '2023-01-26 02:54:19'),
('50ef822e-de56-4b26-b74b-5c52fa2a38b3', 'action', 'Actions', 'کړني', NULL, '2022-08-11 14:07:16', '2023-01-26 03:10:08'),
('51625e87-0649-4e21-b56c-261870e4038b', 'profile', 'Profile', 'پروفایل', NULL, '2022-08-14 07:36:46', '2023-01-30 02:57:56'),
('519b13af-5557-4fea-a10b-59af93c91a6e', 'all-backups', 'All Backups', NULL, NULL, '2022-08-12 01:28:25', '2022-08-12 01:28:25'),
('523ca16e-7856-4a8b-81ed-72d3c1ea8f9e', 'third semester', 'Third Semester', 'دریم سمستر', NULL, '2023-03-20 01:17:18', '2023-03-20 01:17:18'),
('52631a54-6cdc-4ee6-b346-b99143c7c20c', 'pd-no', 'PD NO', NULL, NULL, '2022-10-18 13:14:05', '2022-10-18 13:14:05'),
('529fe528-adfc-4b54-890e-26f9ce876302', 'edit-district', 'Edit District', NULL, NULL, '2023-01-10 05:53:29', '2023-01-10 05:53:29'),
('53be0d57-a8a5-4f2e-9763-06762d2b6114', 'restore-all-provinces', 'Restore All Provinces', NULL, NULL, '2023-01-09 05:26:41', '2023-01-09 05:26:41'),
('53ee8b8d-b6d6-43f3-8315-a4e0ed4c1434', 'related-departments', 'Related Departments', 'مربطه څانګي', NULL, '2023-02-13 03:02:16', '2023-02-13 03:02:16'),
('53f7eca0-6219-44cf-9550-780bf550607c', 'twitter', 'Twitter', NULL, NULL, '2022-08-20 10:45:14', '2022-08-20 10:45:14'),
('559fb697-336e-48e6-9fd3-e79bd098d5e3', 'here-you-can-add-edit-or-delete-students', 'Here you can add update, or archive student', 'دلته تاسی کولی شئ چی زده کړیالان اظافه، تغیر تلاش، او یا هم له منځه یوسئ', NULL, '2023-02-21 06:10:59', '2023-02-22 04:57:16'),
('566a81b7-5e32-41ad-a40a-aeed92399908', 'edit-banner', 'Edit Banner', NULL, NULL, '2022-08-21 06:53:25', '2022-08-21 06:53:25'),
('569b4bcb-b3ae-439b-b419-8909776b2546', 'add-new-province', 'Add new Province', 'نوی ولایت اظافه کړئ', NULL, '2023-01-09 02:57:05', '2023-01-30 02:47:43'),
('57a2b73d-c15b-44cd-9fb5-3b19269fcf7c', 'login', 'Login', 'داخلیدل', NULL, '2023-01-04 05:20:54', '2023-01-29 05:32:58'),
('57f547a5-5da9-4f96-8243-cace786a7bb6', 'returned', 'Returned', NULL, NULL, '2022-10-18 15:58:05', '2022-10-18 15:58:35'),
('58dcd248-53db-4a96-a558-0e7b3f590784', 'archived-users', 'Archived users', NULL, NULL, '2023-01-09 05:31:17', '2023-01-09 05:31:17'),
('59d4be80-ce91-43b4-84ab-b852af21a65b', 'old-password', 'Old Passwrod', NULL, NULL, '2022-08-14 07:42:17', '2022-08-14 07:42:17'),
('59da3094-7e77-4190-8a95-517ead328184', 'select-semester', 'Select Semester', 'سمستر انتخاب کړئ', NULL, '2023-03-20 01:15:30', '2023-03-20 01:15:30'),
('5a1d96ca-06b6-4ea0-9e84-f376a16aadd0', 'here-you-can-add-edit-or-delete-collages', 'Here you can add,  edit or delete Collages', 'دلته تاسی کولی شئ چی دارالمعلمین اظافه، تغیر او یا هم لمنځه یوسئ', NULL, '2023-02-11 00:56:53', '2023-02-11 00:57:47'),
('5bf494ae-d422-4061-91c9-77ca52c2544a', 'all-labels', 'All Labels', 'ټول کلیدي نومونه', NULL, '2022-08-11 12:50:46', '2023-02-06 00:18:06'),
('5bf701cc-997b-4d15-b15e-606b1188d06c', 'select-role', 'Select Role', NULL, NULL, '2022-08-13 12:19:11', '2022-08-13 12:19:11'),
('5c250767-6c27-4d23-93ba-5083ddf96d74', 'cover-image', 'Cover Image', 'کوور انځور', NULL, '2023-01-02 05:53:44', '2023-02-10 12:12:20'),
('5daeab9a-6af3-403f-96c8-dc5e1affda95', 'whatsapp', 'WhatsApp', NULL, NULL, '2022-08-20 10:01:55', '2022-08-20 10:01:55'),
('5ded5571-cb94-4ec2-8211-ff51b869c189', 'edit-department', 'Edit Department', 'د څانګی معلومات تغیر کړئ', NULL, '2023-02-13 02:26:46', '2023-02-13 02:26:46'),
('610b542a-82f1-4ccd-b361-ee2a95567c95', 'first semester', 'First Semester', 'اول سمستر', NULL, '2023-03-20 01:16:04', '2023-03-20 01:16:04'),
('6507e034-ff32-484a-ab0b-0044e7fa1684', 'provinces', 'Provinces', 'ولایتونه', NULL, '2023-01-09 02:50:32', '2023-01-10 03:30:58'),
('65850e57-15ef-4144-bcd7-8ecc28f3d059', 'here-you-can-create-download-or-delete-backup', 'Here you can create, download or delete backup', NULL, NULL, '2022-08-12 01:30:51', '2022-08-12 01:30:51'),
('65a1dd84-de54-410b-9e16-556f1ded781b', 'provinces-list', 'Provinces List', 'د ولایتونو لیست', NULL, '2023-01-09 02:50:55', '2023-01-10 03:30:04'),
('67b5e920-62d7-4783-ad02-94c67c2382eb', 'general-setting', 'System Setting', 'سیستم ترتیبات', NULL, '2022-08-20 07:29:32', '2023-01-30 01:12:17'),
('6af6bb87-e6ee-4521-bbc4-e551fcc435e6', 'confirm-new-password', 'Confirm New Password', NULL, NULL, '2022-08-14 07:42:57', '2022-08-14 07:42:57'),
('6d3d820f-a3fe-402c-b220-3e808fee2eb1', 'role-details', 'Role Details', NULL, NULL, '2022-08-13 15:22:21', '2022-08-13 15:22:21'),
('6e0cc979-7ae8-4567-90e6-27244c1e35d0', 'google-map', 'Google Map', NULL, NULL, '2022-08-20 10:54:32', '2022-08-20 10:54:32'),
('6e5d3f49-4560-46bb-8f0a-b2d5ed23ae24', 'delete', 'Delete', 'لمنځه وړل', NULL, '2023-02-10 11:58:45', '2023-02-10 11:59:03'),
('6f6753bc-125f-417e-8954-c3f187f057ca', 'here-you-can-add-update-delete-bnners', 'Here you can add, update and delete banners', NULL, NULL, '2022-08-21 05:00:27', '2022-08-21 05:00:27'),
('7035e6e0-f1c3-4d44-abc5-1a3aadb6a250', 'asset-details', 'Asset Details', NULL, NULL, '2022-10-18 15:23:08', '2022-10-18 15:23:08'),
('7039b079-ef3d-4913-9d76-dc252f79b4e3', 'asset-name', 'Asset Name', NULL, NULL, '2022-10-18 12:59:56', '2022-10-18 12:59:56'),
('7072eb9d-1a16-47b0-adf1-a572d50ca31a', 'enter-password-to-login', 'Enter Password to login', NULL, NULL, '2023-01-04 05:24:34', '2023-01-04 05:24:34'),
('72b2bab4-ea17-42f3-8f95-7fb7a4194cb7', 'edit-school', 'Edit School', 'ښوونځی معلومات تغیرول', NULL, '2023-01-25 05:59:52', '2023-01-26 02:58:59'),
('738ab312-f12f-416d-b3c3-08e325d0110c', 'all-users', 'All Users', NULL, NULL, '2022-08-13 09:32:13', '2022-08-13 09:32:13'),
('738c9b06-a3f3-4adc-8778-b618aa22f0fb', 'remarks', 'Remarks', 'کتني', NULL, '2023-01-25 02:46:02', '2023-01-26 02:59:29'),
('74f9b2d0-3a05-4260-b2dd-ab858eb0ff7a', 'description', 'Description', NULL, NULL, '2022-10-18 13:15:11', '2022-10-18 13:15:11'),
('7542e63b-d0ae-4a94-b52c-475b028f9b56', 'here-you-can-see-asset-details', 'Here you can see asset details', NULL, NULL, '2022-10-18 15:25:44', '2022-10-18 15:25:44'),
('75977ba4-610f-4ad5-9860-354bace2ed5e', 'all-collages', 'All Collages', 'ټول دارلمعلمینونه', NULL, '2023-02-11 00:55:57', '2023-02-11 00:58:12'),
('75a5a6f3-fce9-4b38-a368-52b14a4f53ec', 'select-user-service', 'Select  user Service', 'د کارن خیدمات انتخاب کړئ', NULL, '2023-02-14 05:17:05', '2023-02-14 05:17:05'),
('75afd007-ce70-4ab9-8fef-809209e34a4c', 'show-student-info', 'Show Information', 'معلوماتو په تفصل سره ښودل', NULL, '2023-03-25 02:01:40', '2023-03-25 02:09:39'),
('75cce18b-f103-4e97-b5d5-37162b9758e6', 'all-schools', 'All Schools', 'ټول ښوونځی', NULL, '2023-01-24 02:35:24', '2023-01-26 03:03:55'),
('766ab62a-a47a-4ad7-a175-04cfd3c47b40', 'schools', 'Schools', 'ښوونځي', NULL, '2023-01-24 02:34:25', '2023-01-26 03:04:14'),
('77618d38-226f-4382-ab59-bfa0b8d47038', 'student-third-semester-result-sheet-not added', 'Student third semester result sheet not added', 'د زده کړیال د دریم سمستر د نتایجو جدول په سیستم کې نه دی اظافه شوی', NULL, '2023-03-23 00:20:27', '2023-03-23 00:20:27'),
('785549f2-fd7c-478f-8083-507185208008', 'here-you-can-delete-or-restore-schools', 'Here you can delete or restore schools', NULL, NULL, '2023-01-26 01:31:01', '2023-01-26 01:31:01'),
('78577ebd-81ac-4d9c-bd58-596e29193bd5', 'restore-all-districts', 'Restore all districts', NULL, NULL, '2023-01-10 13:01:44', '2023-01-10 13:01:44'),
('79114910-f49f-458c-bb3a-8dcb50baf692', 'here-you-can-see-student-info', 'Here you can see student information', 'دلته تاسې کولی شئ چی د زده کړیال معلومات په تفصل سره وګورئ', NULL, '2023-02-22 04:56:12', '2023-02-22 04:56:12'),
('7b080977-efd9-47b6-aac3-76e5ea3ea2ee', 'enter-youtube-channel-url', 'Enter your YouTube channel URL', NULL, NULL, '2022-08-20 10:54:11', '2022-08-20 10:54:11'),
('7bd09ada-c1fa-441a-8ae5-261b611bfc94', 'enter-asset-manufacturer-name', 'Enter asset manufacturer name', NULL, NULL, '2022-10-18 13:01:42', '2022-10-18 13:01:42'),
('7cadf68e-358e-4cc2-9bd4-80d04d468aa5', 'identity-form', 'Identity Form', 'شهرت جدول', NULL, '2023-02-22 05:20:07', '2023-02-22 05:20:07'),
('7cc514a9-73bf-426d-ad0e-0ea8d61c969a', 'users-list', 'Users List', 'کارونکو لیست', NULL, '2023-01-02 12:04:21', '2023-02-06 00:10:36'),
('7d798de2-1772-475f-bfcb-521e119d60cf', 'select-district', 'Select District', 'ولسوالئ انتخاب کړئ', NULL, '2023-01-24 05:12:53', '2023-01-24 11:43:24'),
('7e672230-96ed-446a-a436-d17512b5d3ef', 'archived-schools', 'Archived Schools', 'ارشیف شوی ښوونځی', NULL, '2023-01-26 01:29:25', '2023-01-26 02:58:32'),
('8014294b-01c6-43dd-8bf1-2dbfe2a179c6', 'enter-instagram-url', 'Enter your Instagram account URL', NULL, NULL, '2022-08-20 10:49:09', '2022-08-20 10:49:09'),
('8024f777-beee-4d28-ae53-b58aee7878fb', 'forth semester result sheet', 'Forth semester result sheet', 'څلورم سمستر د نتایجو جدول', NULL, '2023-03-23 00:24:41', '2023-03-23 00:24:41'),
('808c65a0-4858-4e24-ab7f-485eac3aecd1', 'add-new-school', 'Add new School', 'نوی ښوونځی اظافه کړئ', NULL, '2023-01-24 02:37:04', '2023-01-26 03:02:45'),
('80e0b7d5-878b-4ba8-935e-a9eeba698f57', 'lock-screen', 'Lock Screen', 'سکرین قلف کول', NULL, '2022-08-14 01:10:22', '2023-01-30 03:00:13'),
('81405467-eef4-4636-bc6d-b62ab93dc05d', 'please-select-province', 'Please Select Province', 'مهربانی وکړئ ولایت انتخاب کړئ', NULL, '2023-03-20 05:44:30', '2023-03-20 05:44:30'),
('818c13cb-6110-4739-8032-9f625c353573', 'please-select-department', 'Please Select Department', 'مهرانی وکړئ مربطه څانګه انتخاب کړئ', NULL, '2023-03-20 05:47:43', '2023-03-20 05:47:43'),
('82264163-5791-4a11-a3c8-193f58ce9801', 'add-new-banner', 'Add New Banner', NULL, NULL, '2022-08-21 05:41:43', '2022-08-21 05:41:43'),
('822a5cdd-e145-48cd-b841-415c45c765bb', 'district', 'District', 'ولسوالی', NULL, '2023-01-24 05:12:35', '2023-01-26 03:02:00'),
('8238c417-c9ad-4a9c-9f16-9c118df18cd1', 'backup', 'Backup', 'بک اپ', NULL, '2022-08-11 14:14:25', '2022-08-11 15:01:23'),
('836f65c3-ca11-4a6e-980c-8fd8a3db4efe', 'enter-year', 'Enter year', 'کـــــال ولیکئ', NULL, '2023-02-16 02:34:50', '2023-02-16 02:34:50'),
('83c6bd16-d64f-4311-a7b5-8b30a62bbae5', 'here-you-can-create-edit-or-delete-role', 'Here you can create, edit or delete role', NULL, NULL, '2022-08-13 14:34:50', '2022-08-13 14:34:50'),
('840d0e97-8593-45fc-ac5b-934368aa5358', 'year', 'Year', 'کـــــــــــــــــال', 'ســـــــــــــــــــــــال', '2023-02-16 02:33:17', '2023-02-16 02:33:17'),
('84a209f2-e4d3-4dcf-93e7-34c4d239b8b1', 'add-role', 'Add Role', NULL, NULL, '2023-01-08 13:31:28', '2023-01-08 13:31:28'),
('85fb6577-bc1a-4bc1-9b05-6bd9c5b7fa58', 'manufacturer', 'Asset Manufacturer', NULL, NULL, '2022-10-18 13:00:58', '2022-10-18 13:00:58'),
('86368943-4d9c-4624-b899-a06dafb1b446', 'students', 'Students', 'زدکړیالان', NULL, '2023-02-20 04:58:41', '2023-02-20 04:58:41'),
('870a4670-c90b-4ed8-a982-7a0b435146cb', 'messages', 'Messages', 'کلیدي پیغامونه', NULL, '2022-08-11 14:14:08', '2023-01-30 05:28:23'),
('874f6102-9ec9-478a-a1a4-88f24cafcdb8', 'select-departments', 'Select Departments', 'څانګي انتخاب کړئ', NULL, '2023-02-13 04:45:57', '2023-02-13 04:45:57'),
('879fa5f2-4bdb-465d-92e1-1ad404b86085', 'yes-archive-it', 'Yes Archive It', NULL, NULL, '2023-01-05 02:14:14', '2023-01-05 02:14:14'),
('87fdb83a-d433-4cd6-98db-169850a3c90e', 'enter-t1', 'Enter T 1', NULL, NULL, '2022-10-18 13:10:45', '2022-10-18 13:10:45'),
('88d8d2a2-f48c-4f42-bb03-3da3371c4ba1', 'model', 'Asset Model', NULL, NULL, '2022-10-18 13:02:05', '2022-10-18 13:02:05'),
('89f6c14f-5114-480b-a91c-be2566b84fd9', 'school-name', 'School\'s Name', 'ښوونځی نوم', NULL, '2023-01-26 02:36:00', '2023-01-26 02:53:02'),
('8b7f6463-b106-467f-900e-0cab0f1c4f34', 'governmental', 'Governmental', 'دولتي', NULL, '2023-01-02 10:39:23', '2023-02-14 05:08:29'),
('8b8c957c-fcf8-4546-b709-fb7f3e69b962', 'edit-collage', 'Edit Collage', 'دارالمعلمین معلومات تغیرول', NULL, '2023-02-11 01:30:05', '2023-02-11 01:30:05'),
('8c534414-04fb-4ec4-8f4c-aeaf86944c5d', 'no-collages-to-choose-from', 'No collages to choose from', 'هیڅ دارالمعلمین شتون نه لری', NULL, '2023-02-16 01:05:21', '2023-02-16 01:05:21'),
('8d59a580-9489-49ca-8e6d-84ea64512609', 'here-you-can-see-collage-details', 'Here you can see collage details', 'دالته تاسي د دارلمعلمینن معلومات کتلی شئ', NULL, '2023-02-11 01:47:02', '2023-02-11 01:47:02'),
('8d884f25-585f-48e1-80e1-559e40bfeee0', 'search-for-collage', 'Search for collage', 'دارالمعلمین وپلټئ', NULL, '2023-02-16 01:03:39', '2023-02-16 01:03:39'),
('8ea2954b-07d2-4a8e-8b99-ab6ddd944551', 'edit-message', 'Edit message', NULL, NULL, '2022-08-11 22:21:33', '2022-08-11 22:21:33'),
('8f2fa3dc-110c-4da7-b430-5f69e96925e1', 'student-first-semester-result-sheet-not added', 'Student first semester result sheet not added', 'د زده کړیال د لمړي سمیستر د نتایجو جدول په سیستم کې نه دی اظافه شوی', NULL, '2023-03-22 23:45:39', '2023-03-22 23:45:39'),
('8f5ff269-117a-4d23-a301-751567c2a1dd', 'edit-asset', 'Edit Asset', NULL, NULL, '2022-10-18 14:32:11', '2022-10-18 14:32:11'),
('8fa26cb1-3919-4f1b-8370-75386330a981', 'suspended', 'Suspended', 'ځنډیدلی', NULL, '2023-01-02 10:57:09', '2023-02-14 01:33:50'),
('9065c8f2-17cd-4a01-bd54-317db69085b9', 'here-you-can-add-edit-or-delete-schools', 'Here you can add, edit or delete schools', 'دلته تاسی کوی شی چی ښوونځی اظافه، تغیرو او یا هم لمنځه یوسئ', NULL, '2023-01-24 02:36:09', '2023-01-26 03:03:37'),
('90f0d9cd-5ca5-4372-a29d-d750afc36a6b', 'email', 'Email', 'بریښنالیک', NULL, '2022-08-13 09:28:54', '2023-02-10 12:13:51'),
('925ca724-653f-41a0-92f8-413cd497fc25', 'enter-t2', 'Enter T2', NULL, NULL, '2022-10-18 13:11:47', '2022-10-18 13:11:47'),
('92799cb8-fff1-43ca-8683-6015a4dedc25', 'deleted-date', 'Deleted Date', 'د لمنځه وړلو نیټه', NULL, '2023-01-26 02:32:25', '2023-01-26 02:53:37'),
('92e213cb-583d-420d-9bb1-0c4244b43b8e', 'key-message', 'Key Message', NULL, NULL, '2022-08-11 21:54:00', '2022-08-11 21:54:00'),
('934252a1-9e4b-461e-8914-405fe51f4ed5', 'username', 'Username', 'کارن نوم', NULL, '2022-08-13 09:29:20', '2023-01-29 05:33:54'),
('93ca21cd-e595-4e5c-8dcb-02ee40bd3503', 'enter-facebook-url', 'Enter your Facebook account URL', NULL, NULL, '2022-08-20 10:46:49', '2022-08-20 10:48:02'),
('945117f1-7bd0-4438-b3ac-6456f6e5471c', 'show-password', 'Show Password', 'پټ نوم خودل', NULL, '2023-01-09 01:20:14', '2023-01-29 05:35:18'),
('95a744ef-3620-4cae-8f52-20441d851414', 'print', 'Print', 'پرنټ کول', NULL, '2023-02-27 05:09:52', '2023-02-27 05:10:08'),
('9682373b-9291-4c3c-b4fc-7c6ab398b328', 'email-password', 'Email password', NULL, NULL, '2022-08-20 09:44:07', '2022-08-20 09:44:07'),
('9922e327-59c5-4bd0-b157-3c11cd1ef3be', 'if-this-file-has-appendices-please-select-them', 'If this file has appendices, Please Select them type Clicking Choose button', 'که چیرته نوموړی د شهرت فایل ضمایم  ولری، نو مهربانی وکړئ د انتخاب (Choose) توکمی په وهلو سره یی انتخاب کړئ', NULL, '2023-02-11 06:26:10', '2023-02-11 06:26:52'),
('99832039-bf39-442a-ac4b-90235e0e5320', 'edit-role', 'Edit Role', NULL, NULL, '2022-08-14 07:17:16', '2022-08-14 07:17:16'),
('99a174c4-ce45-41c9-bd3c-76e0da360651', 'province', 'Province', 'ولایت', NULL, '2023-01-10 05:29:36', '2023-01-26 03:08:08'),
('9a0afad9-c231-431f-9af0-c43e645da452', 'entry-date', 'Entry Year', 'د شمولیت نیټه', NULL, '2023-02-19 04:18:20', '2023-02-19 04:18:20'),
('9a3a7b81-e434-4ad8-854d-320ada217c9c', 'refresh', 'Refresh', 'معلومات تازه کړئ', NULL, '2023-03-01 02:01:49', '2023-03-01 02:01:49'),
('9b23f5cb-acdc-40bc-b29d-81a305c6dee9', 'enter-father-name', 'Ener father name', 'پلار نوم ولیکئ', NULL, '2023-02-19 04:07:19', '2023-02-19 04:07:19'),
('9b797d90-f24e-4bf6-b87f-f9028418b290', 'size', 'Size', NULL, NULL, '2022-08-12 03:14:14', '2022-08-12 03:14:14'),
('9c1243d6-d10e-4c92-8ca4-1ebf6f067f47', 'logout', 'Logout', 'سیسټم څخه وتل', NULL, '2023-01-02 13:30:39', '2023-01-30 03:00:54'),
('9c6fba10-e90d-4807-ae3c-576bdcbbc94a', 'enter-asset-id', 'Enter asset id', NULL, NULL, '2022-10-18 12:59:32', '2022-10-18 12:59:32'),
('9d497b9e-0ae0-4d29-a2e0-c914ac314783', 'enter-website-name', 'Enter website name', NULL, NULL, '2022-08-20 09:42:55', '2022-08-20 09:42:55'),
('9d61dcfa-95e3-4e08-88ce-a41b519e3da0', 'schools-list', 'Schools List', 'د ښوونځیو لیست', NULL, '2023-01-24 02:28:03', '2023-01-26 03:04:35'),
('9ddbef63-a483-4e74-aef1-76324550bda2', 'exchange-rate', 'Exchange Rate', NULL, NULL, '2022-10-18 13:07:34', '2022-10-18 13:07:34'),
('9e093e70-d1db-4849-91da-fbd8de77c941', 'form', 'Form', 'جـــدول', NULL, '2023-02-21 04:48:04', '2023-02-21 04:48:04'),
('9e583515-113c-4d4c-a078-1450b9a7a6bd', 'show-archive', 'Show Archive', 'ارشیف', NULL, '2023-01-02 11:55:49', '2023-01-30 02:48:32'),
('9e8bf53f-96da-4be5-a395-c7a2711dd98d', 'second semester', 'Second Semester', 'دویم سمستر', NULL, '2023-03-20 01:16:49', '2023-03-20 01:16:49'),
('9ec8e96b-4cc1-48dd-b3b5-30a0b1ae5e19', 'add-new-permissions', 'Add New Permission', NULL, NULL, '2022-08-18 02:39:25', '2022-08-18 02:42:48'),
('a05d825a-0915-4f50-b5a2-9f9048d2c80b', 'add-new-message', 'Add new message', NULL, NULL, '2022-08-11 21:55:52', '2022-08-11 21:55:52'),
('a202637f-255e-4169-8bff-e703858d5456', 'enter-valid-email', 'Enter valid email', 'بریښنالیک', NULL, '2022-08-20 09:43:33', '2023-02-10 12:10:21'),
('a23517ca-d7e3-43fd-aa35-a9c3ca23a6b0', 'no-students-to-choose-from', 'No students to search for', 'هیڅ زده کړیال موجود نه دی', NULL, '2023-03-20 04:05:01', '2023-03-20 04:05:01'),
('a275f96c-364d-4cc3-93e0-1f9060e7933e', 'upload-file', 'Upload File', 'ضمیمه انتخاب کړئ', NULL, '2023-02-19 03:50:46', '2023-02-19 03:50:46'),
('a2785dc7-407f-4416-9916-6613325f0185', 'archived-districts', 'Archived Destricts', NULL, NULL, '2023-01-10 13:00:30', '2023-01-10 13:00:30'),
('a2e3bf4c-3b01-425d-85c9-2147a54554b1', 'appendices', 'Appendices', 'ضمایم', NULL, '2023-02-11 06:27:59', '2023-02-11 06:27:59'),
('a33961a2-f479-4152-b691-81e3ff48f3f5', 'here-you-can-restore-or-delete-user', 'Here you can restore or delete users', NULL, NULL, '2023-01-09 05:31:45', '2023-01-09 05:31:45'),
('a42a1109-a6df-40e2-ba8a-9c1d6b2529d6', 'go-back', 'Go Back', 'شا تګ', NULL, '2022-08-11 12:52:26', '2023-02-06 00:19:29'),
('a504ea0a-56c9-404c-8940-13748d35d487', 'add-student-identity', 'Add Student Identity Form', 'محصلانو د شهرت جدول اظافه کړئ', NULL, '2023-02-19 03:57:28', '2023-02-19 03:57:28'),
('a5abe0f7-9f10-43f1-ae56-50970d241cf9', 'search-for-district', 'Search for district', 'ولسوالی وپلټئ', NULL, '2023-01-25 02:10:53', '2023-01-26 03:00:40'),
('a5ef37c5-d94c-4a1d-8938-a62b486065d3', 'no-cancel', 'No, Cancel', 'نه، لغوه یی کړئ', NULL, '2022-08-11 22:03:04', '2023-02-11 01:38:55'),
('a8150772-659d-442e-90bb-a75e7de9d977', 'save', 'Save', 'ثبت کړئ', NULL, '2022-08-11 14:06:50', '2023-01-30 00:55:10'),
('a8d3fec2-dc93-4721-8f96-37e6569e53cb', 'phone', 'Phone', 'اړیکو شمیره', NULL, '2022-08-20 10:02:22', '2023-02-10 12:09:49'),
('a957a4ec-0d59-47e0-a239-263ded2bd584', 'add-students', 'Add Students', 'زدکړیالان اظافه کړئ', NULL, '2023-02-20 04:59:40', '2023-02-20 04:59:40'),
('abee4056-6cd6-4cbc-8ba3-c5ac82b8f32e', 'close', 'Close', 'بند کړئ', NULL, '2022-08-11 12:54:22', '2023-01-30 00:54:43'),
('abef7a5f-8a73-4f9a-a983-065fc0280d92', 'approved', 'Approved', 'تـــــــــائید', NULL, '2023-02-21 00:32:50', '2023-02-21 00:32:50'),
('acad28f0-4875-4973-8dd0-11e04c0a8b36', 'cost-af', 'Invoice Cost AFN', NULL, NULL, '2022-10-18 13:05:23', '2022-10-18 13:05:23'),
('aceed48d-9091-4472-9762-3120b0c310e3', 'enter-email-password', 'Enter email password', NULL, NULL, '2022-08-20 09:44:25', '2022-08-20 09:44:25'),
('ad66021e-9972-4ea3-b521-20b719163f26', 'welcome-back', 'Welcome Back', 'ښه راغلاست', NULL, '2023-01-09 01:18:32', '2023-01-29 05:31:47'),
('b0d52e1a-2759-4c83-8575-3bb42b8a92ca', 'active', 'Active', 'فـــــــــــــــــعال', NULL, '2023-01-02 10:56:49', '2023-02-14 05:32:44'),
('b0e8a0a3-d270-42a0-8ae5-cb07bb608995', 'delete', 'Delete', NULL, NULL, '2022-10-18 14:25:24', '2022-10-18 14:25:24'),
('b156cc2b-03bb-4c5a-b2c5-34cf7f4e5a1e', 'roles', 'Roles', 'نقشونه', NULL, '2022-08-13 14:21:13', '2023-01-30 00:57:50'),
('b18f748a-faa9-4aa0-9dd3-f2440a739e31', 'collages-list', 'Collages List', 'دارالمعلمینونو لیست', NULL, '2023-02-11 01:13:56', '2023-02-11 01:13:56'),
('b1c504dc-7631-4551-a0a3-d089a045f3d2', 'enter-banner-title', 'Enter Banner Title', NULL, NULL, '2022-08-21 05:50:30', '2022-08-21 05:50:30'),
('b230dac9-0e28-4aa1-80e3-7a9af2f15e90', 'enter-banner-subtitle', 'Enter banner subtitle', NULL, NULL, '2022-08-21 05:51:02', '2022-08-21 05:52:24'),
('b276d714-34a2-4c81-8f86-77f510e568b6', 'date', 'Date', NULL, NULL, '2022-08-12 03:14:23', '2022-08-12 03:14:23'),
('b2d12bd3-74fe-4478-a18a-b371ebe58ce1', 'enter-graduation-date', 'Enter graduation year', 'د فراغت کال ولیکئ', NULL, '2023-02-19 04:41:26', '2023-02-19 04:41:26'),
('b329efb3-31d2-4869-9430-d73037998d57', 'restore-all-users', 'Restore All Users', NULL, NULL, '2023-01-05 02:20:05', '2023-01-05 02:20:05'),
('b4e10921-163e-464e-bb8d-b49ce552b692', 'no-districts-to-choose-from', 'No Districts to choose from', NULL, NULL, '2023-01-25 01:51:14', '2023-01-25 01:51:14'),
('b5cf8bf2-e413-4b5c-9131-725d7e7178e8', 'add-t3', 'Add T3', NULL, NULL, '2022-11-02 13:16:52', '2022-11-02 13:16:52'),
('b655789d-aacd-42f8-8c47-752b1a9ca570', 'cost-usd', 'Cost in USD', NULL, NULL, '2022-10-18 13:06:36', '2022-10-18 13:06:36'),
('b6e05ef4-7a94-40e9-afe5-4b24e21d6b06', 'student-identity-form-appendixes', 'Student Identity Form Appendixes', 'زده کړیالانو د شهرت جدول ضمایم', NULL, '2023-02-22 05:52:03', '2023-02-22 05:52:03'),
('b78a6ed9-b881-47b0-9e9b-ddab2f3c1073', 'serial-no', 'Asset Serial No', NULL, NULL, '2022-10-18 13:04:04', '2022-10-18 13:04:04'),
('b891b1cd-1882-4e04-92e4-4ca791a93469', 'edit-profile', 'Edit Profile', NULL, NULL, '2022-08-14 07:47:05', '2022-08-14 07:47:05'),
('bcf081c7-5a44-4e81-a2f0-70ae8d8ce06b', 'districts', 'Districts', 'ولسوالۍ', NULL, '2023-01-10 01:58:28', '2023-01-10 03:33:02'),
('bd1fd1e6-5f13-4dca-9d96-81e6c41b014e', 'all-permissions', 'All Permissions', NULL, NULL, '2022-08-18 02:32:26', '2022-08-18 02:32:26'),
('bdfb8765-7a14-41f6-adc2-07609deffbf1', 'add-new-district', 'Add new District', 'نوی ولسوالی اظافه کړئ', NULL, '2023-01-10 01:58:04', '2023-01-30 05:11:07'),
('be66fdba-15e8-4237-902d-c94ba88ea9e2', 'key-name', 'Key Name', 'اساسی نوم', NULL, '2022-08-11 12:49:27', '2023-01-30 02:13:32'),
('c021e0da-2b42-43e7-ab2d-8d03fc922968', 'private', 'Private', 'خصوصی', NULL, '2023-01-02 10:41:55', '2023-02-14 05:08:54'),
('c07a54dd-7cf5-4166-a217-373ec06f1484', 'service', 'Service', 'ځیدمات', 'خیدمات', '2023-02-14 05:15:18', '2023-02-14 05:15:18'),
('c0e38e24-f2f9-4651-823b-9194d1f90084', 'profile-image', 'Profile Image', 'فروفایل انځور', NULL, '2023-01-02 05:53:32', '2023-02-10 12:12:43'),
('c1b801c7-f83b-4fed-b807-b204789b9966', 'details', 'Details', 'تفصیلات', NULL, '2022-08-13 15:22:31', '2023-02-11 01:50:29'),
('c388b2f4-5fcd-4c1f-b68b-71d856553e3b', 'here-you-can-see-student-result-sheet-info', 'Here you can see students identity  and  result sheet forms information', 'دلته تاسی کولی شئ چې د زده کړیالانو د  شهرت او  نتایجو دجدول معلومات وګورئ', NULL, '2023-03-22 04:25:10', '2023-03-25 00:25:17'),
('c4a7e394-23a7-4ac1-acfa-431f1aa34811', 'all-provinces', 'All Provinces', 'ټول ولایتونه', NULL, '2023-01-09 02:56:00', '2023-01-30 02:45:35'),
('c53e09c0-f4b7-49b9-9065-0cff87afc7cb', 'enter-name', 'Enter name', 'نوم ولیکئ', NULL, '2023-02-19 04:02:54', '2023-02-19 04:06:18'),
('c684b7ac-b7fd-4c8e-b597-e519d1c42bb2', 'localization', 'Localization', 'محلی کول', NULL, '2022-08-11 12:50:08', '2023-01-26 03:07:27'),
('c733fe27-6d89-4b74-93a8-9c09c647981f', 'select-students-result-sheet', 'Select Students Result Sheet', 'زده کړیالانو د نتایجو جدول انتخاب کړئ', NULL, '2023-03-05 00:56:47', '2023-03-05 00:57:24'),
('c79a2827-15ad-4104-a5c9-008d59945ad4', 'here-you-can-create-edit-or-delete-user', 'Here You can create, edit or delete user', NULL, NULL, '2022-08-13 09:33:15', '2022-08-13 09:33:49'),
('cabe8e98-86b1-47c8-b0e8-ef603c1973a4', 'new-password', 'New Password', NULL, NULL, '2022-08-14 07:42:31', '2022-08-14 07:42:31'),
('cad3d338-2a18-4cd4-ad62-87324d85b75a', 'remark', 'Remarks', 'کتنی', NULL, '2023-01-09 03:06:07', '2023-01-10 03:31:33'),
('cb15c4d0-ddbe-4a06-8902-fee1e60b8ebd', 'enter-asset-cost-af', 'Enter Invoice cost AFN', NULL, NULL, '2022-10-18 13:06:09', '2022-10-18 13:06:09'),
('cbea1b87-9b25-4b52-9d3f-fd0b54b9ea4f', 'here-you-can-add-edit-or-delete-label', 'Here you can add, edit or delete a label', 'دلته تاسی کولي شئ چی نوی ریکارد  اظافه، تغیر او یا هم له منځه یوسئ', NULL, '2022-08-11 12:51:34', '2022-08-11 15:02:08'),
('cc21d048-dbff-4741-a311-108193db0102', 'all-students', 'All Students', 'ټول زده کړیالان', NULL, '2023-02-21 06:09:28', '2023-02-21 06:09:28'),
('ce397c3b-8bce-4fdb-947f-961e1ad72502', 'facebook', 'Facebook', NULL, NULL, '2022-08-20 10:45:00', '2022-08-20 10:45:00'),
('cf330823-3c65-482a-9e91-c5b184a78250', 'third semester result sheet', 'Third semester result sheet', 'دریم سمستر د نتایجو جدول', NULL, '2023-03-23 00:22:58', '2023-03-23 01:17:59'),
('d031c141-2fa1-4926-b8b9-c3e5fbc519f4', 'create', 'create', NULL, NULL, '2022-08-13 11:54:37', '2022-08-13 11:54:37'),
('d06d3b0f-dd90-4b80-bc64-eb60ec8e17fb', 'roles-list', 'Roles List', 'د نقشونو لیست', NULL, '2023-01-08 10:07:33', '2023-02-06 00:15:31'),
('d206b950-354d-432c-8eba-9c73e44ffeb4', 'enter-whatsapp-number', 'Enter WhatsApp number', NULL, NULL, '2022-08-20 10:03:22', '2022-08-20 10:03:22'),
('d29a29fd-8b67-49a3-8b8c-524eeaba675e', 'configuration', 'Configuration', 'ترتیبات', NULL, '2022-08-11 21:32:48', '2023-01-30 01:05:45'),
('d3300142-8e85-4356-bf10-75343c1cd56a', 'add-new-appendix', 'Add New Appendix', 'نوي ضمیمه اظافه کړئ', NULL, '2023-02-27 02:58:55', '2023-02-27 02:58:55'),
('d3579d95-d02b-48b5-b945-6aaa533b9643', 'edit', 'Edit', 'تغیرول', NULL, '2022-10-18 14:25:15', '2023-01-30 03:38:27'),
('d41d2f27-17fa-43d9-8760-865e359c733b', 'here-you-can-see-role-name-and-permisons', 'Here you can see role name and its permissions', NULL, NULL, '2022-08-13 15:28:07', '2022-08-13 15:28:07'),
('d53a0fed-d955-401b-9634-f8cdc4fdc8f3', 'first semester result sheet', 'First semester result sheet', 'لمړي سمستر د نتایجو جدول', NULL, '2023-03-23 00:01:00', '2023-03-25 00:25:45'),
('d68bb0bb-0a78-4c77-8036-bd98e4618999', 'student-identity-status', 'Status', 'حـــــــــــــــــالت', NULL, '2023-02-21 00:31:22', '2023-02-21 00:31:22'),
('d70549dd-e164-410b-8f54-d34f45ab1a5f', 'subtitle', 'Subtitle', NULL, NULL, '2022-08-21 05:25:03', '2022-08-21 05:25:03'),
('d7d202b5-c194-4ca6-b36a-e4056f76e86e', 'users', 'Users', 'کاروونکي', NULL, '2022-08-13 09:31:15', '2023-01-30 00:57:24'),
('d7fb37f4-6779-4dfc-a4bd-97335d27de50', 'permissions', 'Permissions', 'اجازې', NULL, '2022-08-18 02:32:11', '2023-01-30 01:01:02'),
('d843966e-146a-46de-800e-baab37871331', 'enter-pd-no', 'Enter PD NO', NULL, NULL, '2022-10-18 13:14:23', '2022-10-18 13:14:23'),
('d8bb77db-8eed-4103-b25a-9cc46ca9fbc2', 'enter-details', 'Enter banner details', NULL, NULL, '2022-08-21 05:53:09', '2022-08-21 05:53:09'),
('da69a26f-5e0d-4e03-ae59-711d46161c7b', 'archived-provinces', 'Archived Provinces', NULL, NULL, '2023-01-09 05:18:49', '2023-01-09 05:18:49'),
('db460b08-b07c-4b60-80b3-83e49ba412ab', 'enter-asset-cost-usd', 'Enter cost USD', NULL, NULL, '2022-10-18 13:07:06', '2022-10-18 13:07:06'),
('db59f53b-5fd6-47bf-97f2-f89b860755bc', 'semester', 'Semester', 'سمستر', 'سمستر', '2023-03-20 01:14:48', '2023-03-20 01:14:48'),
('de0427ba-3685-4a74-b450-18afea794f5a', 'all-banners', 'All Banners', NULL, NULL, '2022-08-21 04:59:44', '2022-08-21 04:59:44'),
('de896032-2962-418a-afe1-bda2b9b29d4b', 'enter-exchange-rate', 'Enter Exchange Rae', NULL, NULL, '2022-10-18 13:08:49', '2022-10-18 13:08:49'),
('deab6908-c1b7-4466-9b25-7a6e247a0da7', 'profile', 'Profile', NULL, NULL, '2022-08-14 01:09:42', '2022-08-14 01:09:42'),
('deee414c-6ea7-429d-a824-8ffc944fe0b6', 'all-districts', 'All Districts', 'ټولي ولسوالۍ', NULL, '2023-03-01 03:21:36', '2023-03-01 03:21:36'),
('e1a9cc10-6862-4f53-a4fb-078ca6ed220a', 'enter-remark', 'Enter Remarks', 'کتني ولیکئ', NULL, '2023-01-09 03:06:21', '2023-02-13 04:59:56'),
('e1b23829-3b25-401d-9067-c2bdd8896d3f', 'all-districts', 'All Districts', NULL, NULL, '2023-01-10 01:58:47', '2023-01-10 01:58:47'),
('e3825423-cc38-4c3e-b300-f1a1cf302b93', 'assigned', 'Assigned', NULL, NULL, '2022-10-18 15:57:54', '2022-10-18 15:57:54'),
('e3c237d7-e72d-4ceb-a1d2-06c1ac5f838c', 'add-new-label', 'Add new label', NULL, NULL, '2022-08-11 12:53:00', '2022-08-11 21:36:24'),
('e5d99e28-1d4f-4dc0-9446-9eafbfb1b81a', 'add-new-asset', 'Add New Asset', NULL, NULL, '2022-10-18 12:26:53', '2022-10-18 12:26:53'),
('e615a579-4a3a-4d95-8dad-90c2b2878fc2', 'enter-telegram-number', 'Enter telegram number', NULL, NULL, '2022-08-20 10:43:13', '2022-08-20 10:43:13'),
('e62d31ad-42ca-4e14-9d7a-99f4f4582f6f', 'edit-permission', 'Edit Permission', NULL, NULL, '2022-08-18 02:42:37', '2022-08-18 02:42:37'),
('e6b54156-eece-4ff0-8f0d-0a4e2f72fd61', 'students-list', 'Students List', 'زده کړیالانو لیسټ', NULL, '2023-02-20 05:00:15', '2023-02-20 05:00:15'),
('e6ce51e7-57ba-48f8-a73d-306161998cce', 'save-changes', 'Save Changes', 'تغیرات ثب کړئ', NULL, '2022-08-11 21:34:45', '2023-01-30 00:53:08'),
('e96fd926-e88d-4c42-8835-e8bfa32e9755', 'success', 'Success', 'بریالۍ کړنه', NULL, '2023-01-04 02:30:08', '2023-02-27 03:30:27'),
('eb18c5a7-6b2c-4d06-b137-41f4ce89b4c3', 'here-you-can-delete-or-restore-districts', 'Here you can delete or restore districts', NULL, NULL, '2023-01-10 13:01:06', '2023-01-10 13:01:06'),
('eb80cd1d-8fd2-4b6f-a319-fd6d6aa687b8', 'download', 'Download', 'ډاونلوډ', NULL, '2023-01-11 00:47:26', '2023-01-26 03:05:52'),
('ec68de08-7ab5-43a3-b0a3-7f40005b2d6b', 'telegram', 'Telegram', NULL, NULL, '2022-08-20 10:42:45', '2022-08-20 10:42:45'),
('ecc02b64-1878-4579-b5ef-cf8b663fcf86', 'departments', 'Departments', 'څانګي', NULL, '2023-02-13 01:13:25', '2023-02-13 01:13:25'),
('ed1e0100-88e7-4a24-a7af-031d8b6f5fcd', 'edit-student-identity-info', 'Edit Identity Information', 'شهرت د جدول معلومات تغیرول', NULL, '2023-03-25 02:02:30', '2023-03-25 02:09:01'),
('eda6bcc7-34aa-4d7a-8d5d-bd236a1a7afa', 'all-departments', 'All Departments', 'ټولي څانګې', NULL, '2023-02-13 01:41:18', '2023-02-13 01:41:18'),
('ee1ad90c-393b-4568-a21c-5a945297c75c', 'setting', 'Setting', 'تریبات', 'تنظیمات', '2022-08-20 07:20:45', '2023-01-01 01:11:37'),
('efd66ed7-dc95-4e4b-9c34-2980d358e4ae', 'youtube', 'Youtube', NULL, NULL, '2022-08-20 10:53:21', '2022-08-20 10:53:21'),
('f0a49270-0069-4d2c-8a50-2842619a4b61', 'select-students-identity-file', 'Select students identity file', 'د محصلانو د شهرت جدول انتخاب کړئ', NULL, '2023-02-11 06:05:29', '2023-02-11 06:05:29'),
('f0f9db1b-6a6a-43e9-bf17-5e4f87aa76e7', 'enter-google-map-location', 'Enter your location using Google Map', NULL, NULL, '2022-08-20 10:55:17', '2022-08-20 10:55:17'),
('f1e42441-340f-4af7-a12f-863c1d8e2bee', 'student-information', 'Student Information', 'د محصلانو معلومات د شهرت له مخی ولیکئ', NULL, '2023-02-19 03:54:31', '2023-02-19 03:58:57'),
('f2a52184-da3c-4b40-a26c-d3bd94fe5ed9', 'enter-phone-number', 'Enter phone number', NULL, NULL, '2022-08-20 10:02:37', '2022-08-20 10:02:37'),
('f3be8994-df6e-422c-b6c2-ab0bc8b397fc', 'suspend', 'Suspend', 'ځنډول', NULL, '2023-01-02 11:21:24', '2023-02-14 01:34:22'),
('f3e204e0-1687-4077-b6e1-7a9c32e56b6e', 'collage-name', 'Collage Name', 'دارالمعلمین نوم', NULL, '2023-02-11 01:45:44', '2023-02-11 01:45:44'),
('f3e811a9-bb1b-4972-a59d-5bfd80c2061a', 'father-name', 'Father Name', 'پلار نوم ولیکئ', NULL, '2023-02-19 04:05:56', '2023-02-19 04:05:56'),
('f408def3-62e0-4714-bcab-6e86624ba13a', 'add-new-user', 'Add  new user', 'نوی کارن اظافه کړئ', NULL, '2022-08-13 12:19:37', '2023-02-06 00:12:05'),
('f491ad89-208a-44ae-b4f0-037e0e2b811d', 'here-you-can-add-edit-or-delete-districts', 'Here you can add, edit, or archive Districts', 'لته تاسی کولی شئ چی د ولسوالۍ اضافه، تغیر او یا هم لمنځه یوسئ', NULL, '2023-01-10 01:59:18', '2023-03-01 03:22:29'),
('f5775b86-efd4-470e-b6e4-5cac200ac848', 'all-districts', 'All Districts', 'ټولي ولسوالۍ', NULL, '2023-02-10 12:04:19', '2023-02-10 12:04:19'),
('f7d2787f-6c2f-49cf-9811-5c96f5108bd4', 'position', 'Position', 'دنده', NULL, '2023-01-02 05:53:01', '2023-02-10 12:13:10'),
('f869b5f5-2e25-4d84-bf6b-d40d09f1192c', 'manage', 'Manage', NULL, NULL, '2022-08-12 01:19:27', '2022-08-12 01:19:27'),
('f86ca858-9277-4716-9cfd-ea0e48424dc8', 'here-you-can-update-system-setting', 'Here you can update system settings by clicking edit button', 'دلته تاسی کولی شئ چی تغیر توکمی په کیکاږلو سره سیستم معلومات تغیر کړئ', NULL, '2022-08-20 09:28:57', '2023-02-06 00:17:32'),
('f8e2b9dd-9c88-4117-a051-f48c6c8d8e42', 'date-of-graduation', 'Date of Graduation', 'فراغت کال', NULL, '2023-02-21 04:46:33', '2023-02-21 04:46:33'),
('f8e3e7cc-2b88-4532-abf9-ac6bea9fa482', 'forth semester', 'Forth Semester', 'څلورم سمستر', NULL, '2023-03-20 01:17:45', '2023-03-20 01:17:54'),
('f95b11de-55d5-46c9-b1ef-c378af1d1272', 'no-province-to-choose-from', 'No Province to choose from', 'د انتخاب لپاره ولایت موجود نه دی', NULL, '2023-01-25 02:10:21', '2023-01-26 03:01:22'),
('fbd38429-7a50-4eef-a908-7ebed81e2781', 'create-new-backup', 'Create New Backup', 'نوی بیک اپات واخلئ', NULL, '2023-01-11 00:37:06', '2023-01-26 03:06:52'),
('fc6684af-e02a-4b60-a446-b6d94ac9cd0c', 'status', 'Status', 'حالت', NULL, '2022-10-18 15:59:40', '2023-02-14 01:31:50'),
('fc9c65ee-99b1-4d4d-89ee-bc6e99dcbf34', 'backups-list', 'Backups List', 'بیک اپونو لیسټ', NULL, '2023-01-11 00:37:44', '2023-01-26 03:06:17'),
('fd3d701b-fb02-4cac-923c-78630c1975ac', 'restore-all-schools', 'Restore all chools', 'بیا تر لاسه کول', NULL, '2023-01-26 01:29:58', '2023-01-26 02:57:43');
INSERT INTO `variables` (`id`, `key_name`, `english`, `pashto`, `dari`, `created_at`, `updated_at`) VALUES
('fd422d1d-bd8a-4dcd-9116-4677efd1d2bc', 'select-banner', 'Select Banner image', NULL, NULL, '2022-08-21 05:50:09', '2022-08-21 05:50:09'),
('fda333dc-f3d1-4f64-865d-ca34c6982bf8', 'select-status', 'Select Status', 'د جدول حالت انتخاب کړئ', NULL, '2023-02-21 00:34:14', '2023-02-21 00:34:14'),
('fe5113e5-1613-4c7e-b7f6-5d08ed46d2af', 'password', 'Password', 'پټ نوم', NULL, '2022-08-13 12:18:24', '2023-01-29 05:34:34'),
('fe94d113-ebdf-4789-b79c-c4ea658f96b2', 'Province', 'Province', 'ولایت', 'ولایت', '2023-01-10 02:07:07', '2023-01-10 03:28:27'),
('fed213d0-de03-4044-9ce1-dcaf163982d1', 'linkedin', 'LinkedIn', NULL, NULL, '2022-08-20 10:52:14', '2022-08-20 10:52:14'),
('ff114dc9-b434-4acc-a87f-d4ec14a20baf', 'enter-address', 'Enter you address', NULL, NULL, '2022-08-20 11:21:13', '2022-08-20 11:21:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collages`
--
ALTER TABLE `collages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collage_departments`
--
ALTER TABLE `collage_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity_scans`
--
ALTER TABLE `identity_scans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identity_scan_appendexes`
--
ALTER TABLE `identity_scan_appendexes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_sheet_appendix_scan_semester1s`
--
ALTER TABLE `result_sheet_appendix_scan_semester1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_sheet_appendix_scan_semester2s`
--
ALTER TABLE `result_sheet_appendix_scan_semester2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_sheet_appendix_scan_semester3s`
--
ALTER TABLE `result_sheet_appendix_scan_semester3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_sheet_appendix_scan_semester4s`
--
ALTER TABLE `result_sheet_appendix_scan_semester4s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_sheet_scan_semester1s`
--
ALTER TABLE `result_sheet_scan_semester1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_sheet_scan_semester2s`
--
ALTER TABLE `result_sheet_scan_semester2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_sheet_scan_semester3s`
--
ALTER TABLE `result_sheet_scan_semester3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_sheet_scan_semester4s`
--
ALTER TABLE `result_sheet_scan_semester4s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_result_semester1s`
--
ALTER TABLE `student_result_semester1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_result_semester2s`
--
ALTER TABLE `student_result_semester2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_result_semester3s`
--
ALTER TABLE `student_result_semester3s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_result_semester4s`
--
ALTER TABLE `student_result_semester4s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
