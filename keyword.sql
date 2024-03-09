-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 08:12 AM
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
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `english` text COLLATE utf8mb4_unicode_ci,
  `pashto` text COLLATE utf8mb4_unicode_ci,
  `dari` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`id`, `key_name`, `english`, `pashto`, `dari`, `created_at`, `updated_at`) VALUES
('', 'dashboard', 'Dashboard', 'ډاشبورډ', 'داشبورد', NULL, NULL),
('0104fddd-0915-45a1-a5d6-2a68c8567cb8', 'assign-permission', 'Assing permission', NULL, NULL, '2022-08-13 14:39:08', '2022-08-13 14:39:08'),
('01f8e35b-a59b-4d80-be6a-ee1fa436bea8', 'guard', 'Guard', NULL, NULL, '2022-08-13 14:41:05', '2022-08-13 14:41:05'),
('02dbd756-8ebe-425a-baf1-a72053bd53cf', 'date', 'Date', NULL, NULL, '2022-08-21 05:25:11', '2022-08-21 05:25:11'),
('037c1a80-ccf4-424a-81cf-9e8bf205ceed', 'backup-name', 'Backup Name', NULL, NULL, '2022-08-12 03:14:01', '2022-08-12 03:14:01'),
('04e57f25-e8e5-4e4c-acda-f1a676148e30', 'name', 'Name', NULL, NULL, '2022-08-13 09:28:38', '2022-08-13 09:28:38'),
('056ccef6-c9c5-4969-8383-aaac37dfca1f', 'address', 'Address', NULL, NULL, '2022-08-20 11:20:43', '2022-08-20 11:20:43'),
('05fbd2e8-d764-4cc0-b5c0-30f12147a5f8', 'added-by', 'Added By', NULL, NULL, '2022-08-21 05:25:27', '2022-08-21 05:25:54'),
('064d7dbb-389a-442a-ac2b-532c32a83625', 'labels', 'Labels', NULL, NULL, '2022-08-11 12:50:24', '2022-08-11 12:50:24'),
('0717b46e-dbcb-4ab1-abcd-665de13c246f', 'confirm-password', 'Confirm Password', NULL, NULL, '2022-08-13 12:18:44', '2022-08-13 12:18:44'),
('08e984e6-2e70-4bef-b9f9-614673180c10', 'cancel', 'Cancel', NULL, NULL, '2022-08-13 12:48:04', '2022-08-13 12:48:04'),
('11f98206-5abe-435f-8fb9-e074f80930c5', 'enter-all-required-information', 'Enter all required information', NULL, NULL, '2022-08-13 12:20:11', '2022-08-13 12:20:11'),
('18a9a9b7-f8e0-4fd7-963b-01076e50e0ed', 'logo', 'Logo', NULL, NULL, '2022-08-20 15:04:35', '2022-08-20 15:04:35'),
('1b5a5338-9f7f-401b-9ade-e7c7541c9c2b', 'here-you-can-edit-user-information-by-clicking-edit-button', 'Here you can edit user information by clicking edit button', NULL, NULL, '2022-08-14 07:37:23', '2022-08-14 07:37:23'),
('230e89c1-3046-460f-a42b-82d6683ca417', 'instagram', 'Instagram', NULL, NULL, '2022-08-20 10:45:30', '2022-08-20 10:45:30'),
('25fcd007-4ce7-4400-85af-6219fe37b3e1', 'user-profile', 'User Profile', NULL, NULL, '2022-08-14 07:36:07', '2022-08-14 07:36:07'),
('271284d4-91e7-4488-ac7e-eeda47e3f9b1', 'image', 'Image', NULL, NULL, '2022-08-21 05:24:32', '2022-08-21 05:24:32'),
('2961c351-a588-4d72-88a5-72df74dc75d9', 'add-new', 'Add New', NULL, NULL, '2022-08-11 12:52:13', '2022-08-11 12:52:13'),
('2a13635f-7707-42a4-8b78-b864bec62392', 'add-new-role', 'Add New Role', NULL, NULL, '2022-08-14 07:23:13', '2022-08-18 04:35:19'),
('2a1ed5ea-c7bf-4f79-8c4d-21a72194647b', 'here-you-can-create-edit-or-delete-permission', 'Here you can create, edit, or delete permission', NULL, NULL, '2022-08-18 02:33:05', '2022-08-18 02:33:05'),
('2b66f21c-7dde-4876-b9dd-4dedd0f4122c', 'all-messages', 'All Messages', NULL, NULL, '2022-08-11 21:57:00', '2022-08-11 21:57:00'),
('2cc83c7f-0bdc-47fd-81e8-910a5ed77e11', 'role-name', 'Role Name', NULL, NULL, '2022-08-13 15:26:09', '2022-08-13 15:26:09'),
('31ee1e1f-3e33-478a-85ac-5042c04cfe16', 'enter-twitter-url', 'Enter your Twitter account URL', NULL, NULL, '2022-08-20 10:47:33', '2022-08-20 10:47:33'),
('3321fb6a-b9ba-48a8-bee8-58eba6915e55', 'enter-linkedin-url', 'Enter your LinkedIn account URL', NULL, NULL, '2022-08-20 10:53:05', '2022-08-20 10:53:05'),
('38256246-b669-412f-835c-303df6240a41', 'user-management', 'User Management', NULL, NULL, '2022-08-13 14:13:32', '2022-08-13 14:13:32'),
('3c30816c-0ccb-47a1-b491-d5e82e59b3a0', 'here-you-can-add-edit-or-delete-message', 'Here you can add, edit or delete message', NULL, NULL, '2022-08-11 21:54:50', '2022-08-11 21:54:50'),
('3c70e0cc-d578-44d5-804b-c565644b8a73', 'edit-label', 'Edit label', NULL, NULL, '2022-08-11 21:35:15', '2022-08-11 21:35:15'),
('3e062d3a-6586-40cc-b145-87c3335cdf55', 'banners', 'Banners', NULL, NULL, '2022-08-20 07:30:49', '2022-08-20 07:30:49'),
('3e8e0856-82b4-443c-9929-58e1c4715276', 'system-setting', 'System Setting', NULL, NULL, '2022-08-20 09:30:24', '2022-08-20 09:30:24'),
('412302fe-178c-4d03-a6b0-1a5c1a6b5b32', 'role', 'Role', NULL, NULL, '2022-08-13 09:30:23', '2022-08-13 09:30:23'),
('444ffc5d-c3c0-4d8e-bed0-be79fee07d4d', 'required', 'Required', NULL, NULL, '2022-08-20 09:29:38', '2022-08-20 09:29:38'),
('45e43668-3ce3-4f3c-a226-d94f1f16a237', 'title', 'Title', NULL, NULL, '2022-08-21 05:24:45', '2022-08-21 05:24:45'),
('461de67a-6332-48e7-9fc4-d038d21a03d6', 'create-new', 'Create new', NULL, NULL, '2022-08-12 01:19:14', '2022-08-12 01:19:14'),
('4b4adc51-d057-4088-856a-7d3d8b391df9', 'all-roles', 'All roles', NULL, NULL, '2022-08-13 14:34:09', '2022-08-13 14:34:09'),
('4e78a075-febc-4ede-bdee-82dea485b36e', 'yes-delete-it', 'Yes, Delete it', NULL, NULL, '2022-08-11 22:02:15', '2022-08-11 22:05:09'),
('50ef822e-de56-4b26-b74b-5c52fa2a38b3', 'action', 'Action', NULL, NULL, '2022-08-11 14:07:16', '2022-08-11 14:07:16'),
('51625e87-0649-4e21-b56c-261870e4038b', 'profile', 'Profile', NULL, NULL, '2022-08-14 07:36:46', '2022-08-14 07:36:46'),
('519b13af-5557-4fea-a10b-59af93c91a6e', 'all-backups', 'All Backups', NULL, NULL, '2022-08-12 01:28:25', '2022-08-12 01:28:25'),
('53f7eca0-6219-44cf-9550-780bf550607c', 'twitter', 'Twitter', NULL, NULL, '2022-08-20 10:45:14', '2022-08-20 10:45:14'),
('566a81b7-5e32-41ad-a40a-aeed92399908', 'edit-banner', 'Edit Banner', NULL, NULL, '2022-08-21 06:53:25', '2022-08-21 06:53:25'),
('59d4be80-ce91-43b4-84ab-b852af21a65b', 'old-password', 'Old Passwrod', NULL, NULL, '2022-08-14 07:42:17', '2022-08-14 07:42:17'),
('5bf494ae-d422-4061-91c9-77ca52c2544a', 'all-labels', 'All Labels', NULL, NULL, '2022-08-11 12:50:46', '2022-08-11 12:50:46'),
('5bf701cc-997b-4d15-b15e-606b1188d06c', 'select-role', 'Select Role', NULL, NULL, '2022-08-13 12:19:11', '2022-08-13 12:19:11'),
('5daeab9a-6af3-403f-96c8-dc5e1affda95', 'whatsapp', 'WhatsApp', NULL, NULL, '2022-08-20 10:01:55', '2022-08-20 10:01:55'),
('65850e57-15ef-4144-bcd7-8ecc28f3d059', 'here-you-can-create-download-or-delete-backup', 'Here you can create, download or delete backup', NULL, NULL, '2022-08-12 01:30:51', '2022-08-12 01:30:51'),
('67b5e920-62d7-4783-ad02-94c67c2382eb', 'general-setting', 'General Setting', NULL, NULL, '2022-08-20 07:29:32', '2022-08-20 07:29:32'),
('6af6bb87-e6ee-4521-bbc4-e551fcc435e6', 'confirm-new-password', 'Confirm New Password', NULL, NULL, '2022-08-14 07:42:57', '2022-08-14 07:42:57'),
('6d3d820f-a3fe-402c-b220-3e808fee2eb1', 'role-details', 'Role Details', NULL, NULL, '2022-08-13 15:22:21', '2022-08-13 15:22:21'),
('6e0cc979-7ae8-4567-90e6-27244c1e35d0', 'google-map', 'Google Map', NULL, NULL, '2022-08-20 10:54:32', '2022-08-20 10:54:32'),
('6f6753bc-125f-417e-8954-c3f187f057ca', 'here-you-can-add-update-delete-bnners', 'Here you can add, update and delete banners', NULL, NULL, '2022-08-21 05:00:27', '2022-08-21 05:00:27'),
('738ab312-f12f-416d-b3c3-08e325d0110c', 'all-users', 'All Users', NULL, NULL, '2022-08-13 09:32:13', '2022-08-13 09:32:13'),
('7b080977-efd9-47b6-aac3-76e5ea3ea2ee', 'enter-youtube-channel-url', 'Enter your YouTube channel URL', NULL, NULL, '2022-08-20 10:54:11', '2022-08-20 10:54:11'),
('8014294b-01c6-43dd-8bf1-2dbfe2a179c6', 'enter-instagram-url', 'Enter your Instagram account URL', NULL, NULL, '2022-08-20 10:49:09', '2022-08-20 10:49:09'),
('80e0b7d5-878b-4ba8-935e-a9eeba698f57', 'lock-screen', 'Lock Screen', NULL, NULL, '2022-08-14 01:10:22', '2022-08-14 01:10:22'),
('82264163-5791-4a11-a3c8-193f58ce9801', 'add-new-banner', 'Add New Banner', NULL, NULL, '2022-08-21 05:41:43', '2022-08-21 05:41:43'),
('8238c417-c9ad-4a9c-9f16-9c118df18cd1', 'backup', 'Backup', 'بک اپ', NULL, '2022-08-11 14:14:25', '2022-08-11 15:01:23'),
('83c6bd16-d64f-4311-a7b5-8b30a62bbae5', 'here-you-can-create-edit-or-delete-role', 'Here you can create, edit or delete role', NULL, NULL, '2022-08-13 14:34:50', '2022-08-13 14:34:50'),
('870a4670-c90b-4ed8-a982-7a0b435146cb', 'messages', 'Messages', NULL, NULL, '2022-08-11 14:14:08', '2022-08-11 14:14:08'),
('8ea2954b-07d2-4a8e-8b99-ab6ddd944551', 'edit-message', 'Edit message', NULL, NULL, '2022-08-11 22:21:33', '2022-08-11 22:21:33'),
('90f0d9cd-5ca5-4372-a29d-d750afc36a6b', 'email', 'Email', NULL, NULL, '2022-08-13 09:28:54', '2022-08-13 09:28:54'),
('92e213cb-583d-420d-9bb1-0c4244b43b8e', 'key-message', 'Key Message', NULL, NULL, '2022-08-11 21:54:00', '2022-08-11 21:54:00'),
('934252a1-9e4b-461e-8914-405fe51f4ed5', 'username', 'Username', NULL, NULL, '2022-08-13 09:29:20', '2022-08-13 09:29:20'),
('93ca21cd-e595-4e5c-8dcb-02ee40bd3503', 'enter-facebook-url', 'Enter your Facebook account URL', NULL, NULL, '2022-08-20 10:46:49', '2022-08-20 10:48:02'),
('9682373b-9291-4c3c-b4fc-7c6ab398b328', 'email-password', 'Email password', NULL, NULL, '2022-08-20 09:44:07', '2022-08-20 09:44:07'),
('99832039-bf39-442a-ac4b-90235e0e5320', 'edit-role', 'Edit Role', NULL, NULL, '2022-08-14 07:17:16', '2022-08-14 07:17:16'),
('9b797d90-f24e-4bf6-b87f-f9028418b290', 'size', 'Size', NULL, NULL, '2022-08-12 03:14:14', '2022-08-12 03:14:14'),
('9d497b9e-0ae0-4d29-a2e0-c914ac314783', 'enter-website-name', 'Enter website name', NULL, NULL, '2022-08-20 09:42:55', '2022-08-20 09:42:55'),
('9ec8e96b-4cc1-48dd-b3b5-30a0b1ae5e19', 'add-new-permissions', 'Add New Permission', NULL, NULL, '2022-08-18 02:39:25', '2022-08-18 02:42:48'),
('a05d825a-0915-4f50-b5a2-9f9048d2c80b', 'add-new-message', 'Add new message', NULL, NULL, '2022-08-11 21:55:52', '2022-08-11 21:55:52'),
('a202637f-255e-4169-8bff-e703858d5456', 'enter-valid-email', 'Enter valid email', NULL, NULL, '2022-08-20 09:43:33', '2022-08-20 09:43:33'),
('a42a1109-a6df-40e2-ba8a-9c1d6b2529d6', 'go-back', 'Go Back', NULL, NULL, '2022-08-11 12:52:26', '2022-08-11 12:52:26'),
('a5ef37c5-d94c-4a1d-8938-a62b486065d3', 'no-cancel', 'No, Cancel', NULL, NULL, '2022-08-11 22:03:04', '2022-08-11 22:04:54'),
('a8150772-659d-442e-90bb-a75e7de9d977', 'save', 'Save', NULL, NULL, '2022-08-11 14:06:50', '2022-08-11 14:06:50'),
('a8d3fec2-dc93-4721-8f96-37e6569e53cb', 'phone', 'Phone', NULL, NULL, '2022-08-20 10:02:22', '2022-08-20 10:02:22'),
('abee4056-6cd6-4cbc-8ba3-c5ac82b8f32e', 'close', 'Close', NULL, NULL, '2022-08-11 12:54:22', '2022-08-11 12:54:22'),
('aceed48d-9091-4472-9762-3120b0c310e3', 'enter-email-password', 'Enter email password', NULL, NULL, '2022-08-20 09:44:25', '2022-08-20 09:44:25'),
('b156cc2b-03bb-4c5a-b2c5-34cf7f4e5a1e', 'roles', 'Roles', NULL, NULL, '2022-08-13 14:21:13', '2022-08-13 14:21:13'),
('b1c504dc-7631-4551-a0a3-d089a045f3d2', 'enter-banner-title', 'Enter Banner Title', NULL, NULL, '2022-08-21 05:50:30', '2022-08-21 05:50:30'),
('b230dac9-0e28-4aa1-80e3-7a9af2f15e90', 'enter-banner-subtitle', 'Enter banner subtitle', NULL, NULL, '2022-08-21 05:51:02', '2022-08-21 05:52:24'),
('b276d714-34a2-4c81-8f86-77f510e568b6', 'date', 'Date', NULL, NULL, '2022-08-12 03:14:23', '2022-08-12 03:14:23'),
('b891b1cd-1882-4e04-92e4-4ca791a93469', 'edit-profile', 'Edit Profile', NULL, NULL, '2022-08-14 07:47:05', '2022-08-14 07:47:05'),
('bd1fd1e6-5f13-4dca-9d96-81e6c41b014e', 'all-permissions', 'All Permissions', NULL, NULL, '2022-08-18 02:32:26', '2022-08-18 02:32:26'),
('be66fdba-15e8-4237-902d-c94ba88ea9e2', 'key-name', 'Key Name', NULL, NULL, '2022-08-11 12:49:27', '2022-08-11 12:49:27'),
('c1b801c7-f83b-4fed-b807-b204789b9966', 'details', 'Details', NULL, NULL, '2022-08-13 15:22:31', '2022-08-13 15:22:31'),
('c684b7ac-b7fd-4c8e-b597-e519d1c42bb2', 'localization', 'Localization', NULL, NULL, '2022-08-11 12:50:08', '2022-08-11 12:50:08'),
('c79a2827-15ad-4104-a5c9-008d59945ad4', 'here-you-can-create-edit-or-delete-user', 'Here You can create, edit or delete user', NULL, NULL, '2022-08-13 09:33:15', '2022-08-13 09:33:49'),
('cabe8e98-86b1-47c8-b0e8-ef603c1973a4', 'new-password', 'New Password', NULL, NULL, '2022-08-14 07:42:31', '2022-08-14 07:42:31'),
('cbea1b87-9b25-4b52-9d3f-fd0b54b9ea4f', 'here-you-can-add-edit-or-delete-label', 'Here you can add, edit or delete a label', 'دلته تاسی کولي شئ چی نوی ریکارد  اظافه، تغیر او یا هم له منځه یوسئ', NULL, '2022-08-11 12:51:34', '2022-08-11 15:02:08'),
('ce397c3b-8bce-4fdb-947f-961e1ad72502', 'facebook', 'Facebook', NULL, NULL, '2022-08-20 10:45:00', '2022-08-20 10:45:00'),
('d031c141-2fa1-4926-b8b9-c3e5fbc519f4', 'create', 'create', NULL, NULL, '2022-08-13 11:54:37', '2022-08-13 11:54:37'),
('d206b950-354d-432c-8eba-9c73e44ffeb4', 'enter-whatsapp-number', 'Enter WhatsApp number', NULL, NULL, '2022-08-20 10:03:22', '2022-08-20 10:03:22'),
('d29a29fd-8b67-49a3-8b8c-524eeaba675e', 'configuration', 'Configuration', NULL, NULL, '2022-08-11 21:32:48', '2022-08-11 21:32:48'),
('d41d2f27-17fa-43d9-8760-865e359c733b', 'here-you-can-see-role-name-and-permisons', 'Here you can see role name and its permissions', NULL, NULL, '2022-08-13 15:28:07', '2022-08-13 15:28:07'),
('d70549dd-e164-410b-8f54-d34f45ab1a5f', 'subtitle', 'Subtitle', NULL, NULL, '2022-08-21 05:25:03', '2022-08-21 05:25:03'),
('d7d202b5-c194-4ca6-b36a-e4056f76e86e', 'users', 'Users', NULL, NULL, '2022-08-13 09:31:15', '2022-08-13 09:31:15'),
('d7fb37f4-6779-4dfc-a4bd-97335d27de50', 'permissions', 'Permissions', NULL, NULL, '2022-08-18 02:32:11', '2022-08-18 02:32:11'),
('d8bb77db-8eed-4103-b25a-9cc46ca9fbc2', 'enter-details', 'Enter banner details', NULL, NULL, '2022-08-21 05:53:09', '2022-08-21 05:53:09'),
('de0427ba-3685-4a74-b450-18afea794f5a', 'all-banners', 'All Banners', NULL, NULL, '2022-08-21 04:59:44', '2022-08-21 04:59:44'),
('deab6908-c1b7-4466-9b25-7a6e247a0da7', 'profile', 'Profile', NULL, NULL, '2022-08-14 01:09:42', '2022-08-14 01:09:42'),
('e3c237d7-e72d-4ceb-a1d2-06c1ac5f838c', 'add-new-label', 'Add new label', NULL, NULL, '2022-08-11 12:53:00', '2022-08-11 21:36:24'),
('e615a579-4a3a-4d95-8dad-90c2b2878fc2', 'enter-telegram-number', 'Enter telegram number', NULL, NULL, '2022-08-20 10:43:13', '2022-08-20 10:43:13'),
('e62d31ad-42ca-4e14-9d7a-99f4f4582f6f', 'edit-permission', 'Edit Permission', NULL, NULL, '2022-08-18 02:42:37', '2022-08-18 02:42:37'),
('e6ce51e7-57ba-48f8-a73d-306161998cce', 'save-changes', 'Save Changes', NULL, NULL, '2022-08-11 21:34:45', '2022-08-11 21:34:45'),
('ec68de08-7ab5-43a3-b0a3-7f40005b2d6b', 'telegram', 'Telegram', NULL, NULL, '2022-08-20 10:42:45', '2022-08-20 10:42:45'),
('ee1ad90c-393b-4568-a21c-5a945297c75c', 'setting', 'Setting', NULL, NULL, '2022-08-20 07:20:45', '2022-08-20 07:20:45'),
('efd66ed7-dc95-4e4b-9c34-2980d358e4ae', 'youtube', 'Youtube', NULL, NULL, '2022-08-20 10:53:21', '2022-08-20 10:53:21'),
('f0f9db1b-6a6a-43e9-bf17-5e4f87aa76e7', 'enter-google-map-location', 'Enter your location using Google Map', NULL, NULL, '2022-08-20 10:55:17', '2022-08-20 10:55:17'),
('f2a52184-da3c-4b40-a26c-d3bd94fe5ed9', 'enter-phone-number', 'Enter phone number', NULL, NULL, '2022-08-20 10:02:37', '2022-08-20 10:02:37'),
('f408def3-62e0-4714-bcab-6e86624ba13a', 'add-new-user', 'Add  new user', NULL, NULL, '2022-08-13 12:19:37', '2022-08-13 12:19:37'),
('f869b5f5-2e25-4d84-bf6b-d40d09f1192c', 'manage', 'Manage', NULL, NULL, '2022-08-12 01:19:27', '2022-08-12 01:19:27'),
('f86ca858-9277-4716-9cfd-ea0e48424dc8', 'here-you-can-update-system-setting', 'Here you can update system settings by clicking edit button', NULL, NULL, '2022-08-20 09:28:57', '2022-08-20 13:48:26'),
('fd422d1d-bd8a-4dcd-9116-4677efd1d2bc', 'select-banner', 'Select Banner image', NULL, NULL, '2022-08-21 05:50:09', '2022-08-21 05:50:09'),
('fe5113e5-1613-4c7e-b7f6-5d08ed46d2af', 'password', 'Password', NULL, NULL, '2022-08-13 12:18:24', '2022-08-13 12:18:24'),
('fed213d0-de03-4044-9ce1-dcaf163982d1', 'linkedin', 'LinkedIn', NULL, NULL, '2022-08-20 10:52:14', '2022-08-20 10:52:14'),
('ff114dc9-b434-4acc-a87f-d4ec14a20baf', 'enter-address', 'Enter you address', NULL, NULL, '2022-08-20 11:21:13', '2022-08-20 11:21:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
