-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 08:13 AM
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
-- Database: `configured_dashboard_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `english` text COLLATE utf8mb4_unicode_ci,
  `pashto` text COLLATE utf8mb4_unicode_ci,
  `dari` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `key_name`, `english`, `pashto`, `dari`, `created_at`, `updated_at`) VALUES
('02c2016b-79b5-4131-b26a-9dd14311bfed', 'password', 'The provided password is incorrect.', NULL, NULL, '2022-08-18 03:12:33', '2022-08-18 03:12:33'),
('239d4969-70b2-485b-95bc-b1a736868fd4', 'are-you-sure', 'Are you sure?', NULL, NULL, '2022-08-11 21:57:35', '2022-08-11 21:57:35'),
('44e733fb-1873-44bc-ab7c-a8e4c2c131c9', 'deleted', 'Your record deleted successfully!', NULL, NULL, '2022-08-11 22:28:06', '2022-08-11 22:28:06'),
('4dd0a5db-a0d7-412b-ae64-2c6c44a93db4', 'you-will-not-be-able-to-revert-this-record', 'You will not be able to revert this record', NULL, NULL, '2022-08-11 21:59:50', '2022-08-12 01:17:02'),
('6428f490-104e-4e05-aa56-b7127b38f821', 'failed', 'Your operation failed, Please try again!', NULL, NULL, '2022-08-11 22:28:48', '2022-08-11 22:28:48'),
('6b2cd28f-eba1-4af2-957a-0f89da3d9cd7', 'success', 'Your Record was successfully added!', NULL, NULL, '2022-08-11 22:33:32', '2022-08-11 22:33:32'),
('7f26b79e-73a2-4d2c-a2d9-f72cf00beb50', 'login-failed', 'These credentials do not match our records.', NULL, NULL, '2022-08-18 03:12:04', '2022-08-18 03:12:04'),
('a640c037-ed2f-44c2-bd67-b89ca6c8c949', 'key-message-is-required', 'The key message is required', NULL, NULL, '2022-08-11 22:18:12', '2022-08-11 22:18:12'),
('adb5357a-672d-4317-84cf-3ff08f09e72b', 'english-message-is-required', 'The English message is required', NULL, NULL, '2022-08-11 22:19:57', '2022-08-11 22:25:38'),
('d0a9e2ce-f518-44be-9f39-bc3c23259b7d', 'updated', 'Your record updated successfully!', NULL, NULL, '2022-08-11 22:27:04', '2022-08-11 22:27:17'),
('d3688dd4-3743-4c4a-809e-16d0b67542f7', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', NULL, NULL, '2022-08-18 03:12:56', '2022-08-18 03:12:56'),
('ed237f69-1f79-471a-b1e0-a64ca53680fa', 'your-profile-successfully-updated', 'Your profile successfully updated', NULL, NULL, '2022-08-14 15:55:51', '2022-08-14 15:55:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
