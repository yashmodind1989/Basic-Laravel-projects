-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 11:53 AM
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
-- Database: `dbcourier`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cust_id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `status` enum('pending','dispatched','delivered') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `cust_id`, `order_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'deliveryAgent1', '2', 'order_3037120720', 'pending', '2024-11-08 05:35:09', NULL),
(2, 'deliveryAgent2', '2', 'order_1194894779', 'pending', '2024-11-08 05:36:06', NULL),
(3, 'deliveryAgent', '2', 'order_3533382933', 'dispatched', '2024-11-08 05:36:25', '2024-11-12 02:02:16'),
(4, 'deliveryAgent1', '3', 'order_3685349091', 'pending', '2024-11-11 01:50:21', NULL),
(5, 'deliveryAgent2', '2', 'order_4007737406', 'pending', '2024-11-11 01:50:55', NULL),
(6, 'deliveryAgent', '4', 'order_4139686751', 'pending', '2024-11-11 01:51:30', NULL),
(7, 'deliveryAgent', '2', 'order_4185401751', 'pending', '2024-11-11 01:51:41', NULL),
(8, 'deliveryAgent2', '3', 'order_4237887368', 'pending', '2024-11-11 01:51:52', NULL),
(9, 'deliveryAgent2', '2', 'order_4251305225', 'pending', '2024-11-11 01:52:00', NULL),
(10, 'deliveryAgent1', '2', 'order_5393350105', 'pending', '2024-11-11 01:52:12', NULL),
(11, 'deliveryAgent1', '2', 'order_5393350105', 'pending', '2024-11-11 01:52:23', NULL),
(12, 'deliveryAgent2', '3', 'order_6034883729', 'pending', '2024-11-11 01:52:33', NULL),
(13, 'deliveryAgent2', '2', 'order_6172476466', 'pending', '2024-11-11 01:52:42', NULL),
(14, 'deliveryAgent2', '2', 'order_7842089214', 'pending', '2024-11-11 01:53:05', NULL),
(15, 'deliveryAgent', '4', 'order_7902740488', 'pending', '2024-11-11 01:53:15', '2024-11-11 02:58:00'),
(16, 'deliveryAgent', '2', 'order_8779288672', 'pending', '2024-11-11 01:53:25', NULL),
(17, 'deliveryAgent', '2', 'order_9368744765', 'pending', '2024-11-11 01:53:35', NULL);

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2024_11_07_080424_add_deleted_at_to_parcels_table', 2),
(15, '2024_11_08_103353_create_agents_table', 3),
(16, '2024_11_12_075023_add_profile_pic_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` varchar(200) NOT NULL,
  `product` varchar(255) NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `weight` varchar(255) NOT NULL,
  `source_address` varchar(255) NOT NULL,
  `destination_address` varchar(255) NOT NULL,
  `status` enum('pending','dispatched','delivered') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `product`, `userId`, `weight`, `source_address`, `destination_address`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('order_1194894779', 'book', 2, '190 g', '45/46 RG Baruah Road, Zoo Rd, Tiniali, Guwahati, Assam 781024, India', 'Assam Trunk Rd, Guwahati, Assam 781001, India', 'pending', '2024-11-07 04:49:39', '2024-11-07 04:50:47', NULL),
('order_3037120720', 'book', 2, '150 g', 'Chirag Nagar, Ghatkopar (west),Mumbai', ' B/h Rajmahal Hotel, Patel Shopping Centre, Chandavarkar Rd, Borivli(w),Mumbai', 'pending', '2024-11-05 05:52:06', '2024-11-05 05:52:06', NULL),
('order_3533382933', 'cloth', 2, '5100 g', 'Dr B Borooah Rd, Nr. Nehru Stadium, Gandhi Basti, Ulubari, Guwahati, Assam 781007, India', 'G.S. Road Opp Indian Oil Petrol Pump, Rukmini Gaon, Guwahati, Assam 781022, India', 'dispatched', '2024-11-07 05:01:42', '2024-11-12 02:02:16', NULL),
('order_3685349091', 'watch', 3, '150 g', ' 175, Amizara Chs, Jawahar Ngr, Rd No 11, Goregaon (west),Mumbai,Maharashtra', 'B-8, Part - 1 Extn, Dabri More, Sita Puri,Delhi', 'pending', '2024-11-05 06:04:31', '2024-11-05 06:04:31', NULL),
('order_4007737406', 'watch', 2, '256 g', 'Near New Cambdrige, Naupada, Pumanand Bldg, Gokhale Rd, Near New Cambdrige, Naupada, Thane(w),Mumbai', '77, Gali Khazanchi, Chandni Chowk,Delhi', 'pending', '2024-11-08 03:52:19', '2024-11-08 03:53:19', NULL),
('order_4139686751', 'watch', 4, '55 g', '1/107/108, Ganda Nala Bazar, S Malhotra Marg, Kashmere Gate,Delhi', '33, Ismail Bldg, Pathak Wadi, Lohar Chawl,Mumbai', 'pending', '2024-11-05 06:06:27', '2024-11-05 06:06:27', NULL),
('order_4185401751', 'watch', 2, '50 g', 'Shop No-2, Samadhan Sadan, Hanuman Road, Vile Parle (east),Mumbai', ' Lane 69, 5393, Regahar Pura, Karol Bagh,Delhi', 'pending', '2024-11-05 05:55:17', '2024-11-05 05:55:17', NULL),
('order_4237887368', 'cloth', 3, '150 g', '30, Honnaganappa Complex, Magadi Road Jaimuni Circle, A D Halli,Banglore', '7 A, Vardhman Indl Estate, 10 Fitwell Hse Compound, Lbs Marg, Vikhroli(w),Mumbai', 'pending', '2024-11-05 06:04:47', '2024-11-05 06:04:47', NULL),
('order_4251305225', 'book', 2, '50 g', '275, Kalbadevi Road, Opp Adarsh & Aryaniwas Hotel, Kalbadevi,Mumbai', '15-8-554, Feelkhana,Hyderabad', 'pending', '2024-11-05 05:56:01', '2024-11-07 03:47:27', NULL),
('order_5393350105', 'book', 2, '250 g', 'Ratnakar Complex,Paldi,Ahmedabad', 'Samudra Complex,Vejalpur,Ahmedabad', 'pending', '2024-11-06 01:03:51', '2024-11-06 01:03:51', NULL),
('order_6034883729', 'watch', 3, '50 g', 'A 235, Dda Flat,Delhi', '28, 8th Cross, Shaktiganapeti Nagar, Basveshwar Nagar,Bangalore', 'pending', '2024-11-05 06:05:16', '2024-11-05 06:05:16', NULL),
('order_6172476466', 'cloth', 2, '250 g', '3, 7, Rama Niwas, Hanuman Road, Vile Parle (east),Mumbai', 'Opp. Plot No. 58 Phase 1,Delhi', 'pending', '2024-11-05 05:58:45', '2024-11-05 05:58:45', NULL),
('order_7842089214', 'watch', 2, '50 g', '62 Hari Market, 3rd Road, Khar,Mumbai', '701, A, Shiv Kutir, Vashi,Mumbai', 'pending', '2024-11-05 05:54:17', '2024-11-05 05:54:17', NULL),
('order_7902740488', 'watch', 4, '150 g', '121, The Estate, Ground Floor, Dickenson Road,Bangalore', '243, Linghi Chetty St, Parrys,Chennai', 'pending', '2024-11-05 06:06:11', '2024-11-05 06:06:11', NULL),
('order_8779288672', 'watch', 2, '150 g', '19/21, Shakti Nagar,Delhi', '15/15, N C C Gate No 6, Malwani Colony, Malad (west),Mumbai', 'pending', '2024-11-05 05:56:49', '2024-11-11 03:04:47', NULL),
('order_9368744765', 'watch', 2, '170 g', 'C 234, Site 1, B S Road Indl Area,Delhi', 'Rzf 1/202, Gali No 2, Nr Chandrika Bankt Hall, Mahavir Enclave,Delhi', 'pending', '2024-11-05 06:00:22', '2024-11-07 03:44:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','admin','deliveryAgent') NOT NULL DEFAULT 'customer',
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `is_active`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `profile_pic`) VALUES
(1, 'admin', 'admin@yopmail.com', NULL, '$2y$10$Hvxe8j8cWV9MoR.PnT8m6uyhQtLXaMV21K0JBX68jb8Wr7irsZJLm', 'admin', '1', NULL, NULL, '1987-05-04 06:55:24', '1997-06-04 19:55:45', 'https://images.freeimages.com/fic/images/icons/2526/bloggers/256/admin.png'),
(2, 'customer', 'customer@yopmail.com', NULL, '$2y$10$Qw7uNSrWog2Q.KbVkZe18OcdvV8qlHAkj0f6rmF9tGBk4xVbwirvu', 'customer', '0', 'XDhRfpdqj7sDojtHhxbPTJyHokS8DevY68IZXhSTezFCQgRotWJktJtpjpE0', NULL, '1989-05-04 06:55:24', '2024-11-08 03:07:54', 'https://cdn.imgbin.com/10/7/2/imgbin-computer-icons-user-avatar-avatar-zUpYev6jMMp8aaBWUm8w1cuYM.jpg'),
(3, 'customer1', 'customer1@yopmail.com', NULL, '$2y$10$LPaAyvSk7JqkID.5EEMyXOp/0qA9CyoKXMYBxnwWwoEn51kuFiIB.', 'customer', '1', NULL, NULL, '1989-05-04 06:55:24', '2024-11-08 02:25:51', 'https://cdn.imgbin.com/10/7/2/imgbin-computer-icons-user-avatar-avatar-zUpYev6jMMp8aaBWUm8w1cuYM.jpg'),
(4, 'customer2', 'customer2@yopmail.com', NULL, '$2y$10$RKothqsN/.pj2FjQ6x/ynekHqiJb86cbGS9SWw1mga2Ui6NLEKAmO', 'customer', '1', NULL, NULL, '1989-05-04 06:55:24', '2024-11-08 02:11:45', 'https://cdn.imgbin.com/10/7/2/imgbin-computer-icons-user-avatar-avatar-zUpYev6jMMp8aaBWUm8w1cuYM.jpg'),
(5, 'deliveryAgent1', 'deliveryAgent1@yopmail.com', NULL, '$2y$10$1Ckpm5aqE1HFMHkJLmThsu063nITmrx4Z0CsFt00qFLUXUSuNW0se', 'deliveryAgent', '1', NULL, NULL, '1984-05-04 06:55:24', '2024-11-08 02:56:29', 'https://thumbs.dreamstime.com/b/user-icon-male-avatar-business-suit-vector-iconic-symbol-white-background-design-98278151.jpg'),
(6, 'deliveryAgent2', 'deliveryAgent2@yopmail.com', NULL, '$2y$10$JSGXXYzYfgjwcYTRpn60.uJIJci5EbvHVbtWYYuhjKmv6RmBCOEYe', 'deliveryAgent', '1', NULL, NULL, '1984-05-04 06:55:24', '2024-11-08 02:26:14', 'https://thumbs.dreamstime.com/b/user-icon-male-avatar-business-suit-vector-iconic-symbol-white-background-design-98278151.jpg'),
(7, 'deliveryAgent', 'deliveryAgent@yopmail.com', NULL, '$2y$10$PC8gOBg/lhywrKKgWEOYlussy8grwlDwwW5OhAKh6hr8E/Scq34BS', 'deliveryAgent', '1', NULL, NULL, '1984-05-04 06:55:24', '2024-11-08 02:19:16', 'https://thumbs.dreamstime.com/b/user-icon-male-avatar-business-suit-vector-iconic-symbol-white-background-design-98278151.jpg'),
(15, 'Customer New', 'customernew@yopmail.com', NULL, '$2y$10$93efEp8LTpZTk6WTaXJcxudBfeNryzVlA0hEe77M4XOLDlPrGwDLS', 'customer', '0', 'rN2TWjGDHppWmcCDjh65LSpM9GOqrqH94GaQ5ozL6ZC5UNRnPfnU1ZBaldFZ', NULL, '2024-11-12 04:06:45', '2024-11-12 04:06:45', 'http://127.0.0.1:8000/uploads/1731404205_img_2.jpg'),
(16, 'Agent New', 'agentnew@yopmail.com', NULL, '$2y$10$9ECC7eoO3D0MJLGvQeD89.d89OxmD/Za9g2YJWbHdEFEXrscKC.Gm', 'deliveryAgent', '0', NULL, NULL, '2024-11-12 04:08:29', '2024-11-12 04:08:29', 'http://127.0.0.1:8000/uploads/1731404309_img_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
