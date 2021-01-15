-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2021 at 06:09 PM
-- Server version: 10.5.4-MariaDB-log
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` int(11) NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `malls`
--

CREATE TABLE `malls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mall_products`
--

CREATE TABLE `mall_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_20_124227_create_permission_tables', 1),
(5, '2020_12_20_131631_create_cities_table', 1),
(6, '2020_12_20_131639_create_colors_table', 1),
(7, '2020_12_20_131646_create_countries_table', 1),
(8, '2020_12_20_131654_create_departments_table', 1),
(9, '2020_12_20_131703_create_malls_table', 1),
(10, '2020_12_20_131721_create_settings_table', 1),
(11, '2020_12_20_131729_create_shippings_table', 1),
(12, '2020_12_20_131737_create_states_table', 1),
(13, '2020_12_20_131745_create_trade_marks_table', 1),
(14, '2020_12_20_132429_create_contacts_table', 1),
(15, '2020_12_21_084548_create_manufacturers_table', 1),
(16, '2020_12_27_110542_create_brands_table', 1),
(17, '2020_12_27_110559_create_categories_table', 1),
(18, '2020_12_27_110640_create_sliders_table', 1),
(19, '2020_12_27_110653_create_sub_categories_table', 1),
(20, '2020_12_27_110721_create_orders_table', 1),
(21, '2021_01_11_181758_create_files_table', 1),
(22, '2021_01_11_191936_create_sizes_table', 1),
(23, '2021_01_11_191956_create_weights_table', 1),
(24, '2021_01_11_192019_create_related_proudcts_table', 1),
(25, '2021_01_11_192032_create_products_table', 1),
(26, '2021_01_11_192039_create_other_data_table', 1),
(27, '2021_01_11_192047_create_mall_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_data`
--

CREATE TABLE `other_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create_trade_marks', 'web', '2021-01-15 18:08:52', '2021-01-15 18:08:52'),
(2, 'read_trade_marks', 'web', '2021-01-15 18:08:52', '2021-01-15 18:08:52'),
(3, 'update_trade_marks', 'web', '2021-01-15 18:08:52', '2021-01-15 18:08:52'),
(4, 'delete_trade_marks', 'web', '2021-01-15 18:08:52', '2021-01-15 18:08:52'),
(5, 'create_departments', 'web', '2021-01-15 18:08:52', '2021-01-15 18:08:52'),
(6, 'read_departments', 'web', '2021-01-15 18:08:52', '2021-01-15 18:08:52'),
(7, 'update_departments', 'web', '2021-01-15 18:08:52', '2021-01-15 18:08:52'),
(8, 'delete_departments', 'web', '2021-01-15 18:08:52', '2021-01-15 18:08:52'),
(9, 'create_categories', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(10, 'read_categories', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(11, 'update_categories', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(12, 'delete_categories', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(13, 'create_sub_categories', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(14, 'read_sub_categories', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(15, 'update_sub_categories', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(16, 'delete_sub_categories', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(17, 'create_products', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(18, 'read_products', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(19, 'update_products', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(20, 'delete_products', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(21, 'create_manufacturers', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(22, 'read_manufacturers', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(23, 'update_manufacturers', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(24, 'delete_manufacturers', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(25, 'create_shippings', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(26, 'read_shippings', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(27, 'update_shippings', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(28, 'delete_shippings', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(29, 'create_orders', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(30, 'read_orders', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(31, 'update_orders', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(32, 'delete_orders', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(33, 'create_malls', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(34, 'read_malls', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(35, 'update_malls', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(36, 'delete_malls', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(37, 'create_sliders', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(38, 'read_sliders', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(39, 'update_sliders', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(40, 'delete_sliders', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(41, 'create_brands', 'web', '2021-01-15 18:08:53', '2021-01-15 18:08:53'),
(42, 'read_brands', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(43, 'update_brands', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(44, 'delete_brands', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(45, 'create_notifications', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(46, 'read_notifications', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(47, 'update_notifications', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(48, 'delete_notifications', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(49, 'create_contacts', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(50, 'read_contacts', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(51, 'update_contacts', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(52, 'delete_contacts', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(53, 'create_countries', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(54, 'read_countries', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(55, 'update_countries', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(56, 'delete_countries', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(57, 'create_cities', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(58, 'read_cities', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(59, 'update_cities', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(60, 'delete_cities', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(61, 'create_states', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(62, 'read_states', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(63, 'update_states', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(64, 'delete_states', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(65, 'create_colors', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(66, 'read_colors', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(67, 'update_colors', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(68, 'delete_colors', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(69, 'create_weights', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(70, 'read_weights', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(71, 'update_weights', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(72, 'delete_weights', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(73, 'create_sizes', 'web', '2021-01-15 18:08:54', '2021-01-15 18:08:54'),
(74, 'read_sizes', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(75, 'update_sizes', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(76, 'delete_sizes', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(77, 'create_users', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(78, 'read_users', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(79, 'update_users', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(80, 'delete_users', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(81, 'create_roles', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(82, 'read_roles', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(83, 'update_roles', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(84, 'delete_roles', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(85, 'create_settings', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(86, 'read_settings', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(87, 'update_settings', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55'),
(88, 'delete_settings', 'web', '2021-01-15 18:08:55', '2021-01-15 18:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `related_proudcts`
--

CREATE TABLE `related_proudcts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2021-01-15 18:08:52', '2021-01-15 18:08:52'),
(2, 'admin', 'web', '2021-01-15 18:08:57', '2021-01-15 18:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
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
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(78, 2),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(82, 2),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trade_marks`
--

CREATE TABLE `trade_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `enabled` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `image`, `enabled`, `email_verified_at`, `password`, `remember_token`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'super', 'admin', 'super_admin', 'super@admin.com', 'default.png', 1, NULL, '$2y$10$xIgcsRs7p/k12RzBH9.D2e45xAngktlxPIR9C3JYjX6MBb/rxr7Cm', NULL, '2021-01-15 18:08:58', NULL, '2021-01-14 22:00:00', '2021-01-14 22:00:00', NULL),
(2, 'Mustafa', 'Al-Swaisi', 'mostfaswaisi93', 'mostfaswaisi93@gmail.com', 'default.png', 1, NULL, '$2y$10$KNBqAly1TiRX9BTTBPxr1OuABAlitmuDAG8cj2z64RQa/yquIZOFq', NULL, '2021-01-15 18:08:58', NULL, '2021-01-14 22:00:00', '2021-01-14 22:00:00', NULL),
(3, 'Kelsie', 'Rogahn', 'krystina07', 'robel.peggie@example.com', 'default.png', 1, '2021-01-15 18:09:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'g2vDBTcujY', '2021-01-15 18:09:06', NULL, '2021-01-15 18:09:06', '2021-01-15 18:09:06', NULL),
(4, 'Lizzie', 'Yost', 'wiza.samanta', 'hauck.devyn@example.net', 'default.png', 1, '2021-01-15 18:09:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4I86F2JtwL', '2021-01-15 18:09:06', NULL, '2021-01-15 18:09:06', '2021-01-15 18:09:06', NULL),
(5, 'Ignacio', 'Hand', 'bechtelar.deion', 'legros.ubaldo@example.org', 'default.png', 1, '2021-01-15 18:09:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QGxqO8RbXX', '2021-01-15 18:09:06', NULL, '2021-01-15 18:09:06', '2021-01-15 18:09:06', NULL),
(6, 'Norene', 'Mante', 'lehner.brannon', 'estoltenberg@example.net', 'default.png', 1, '2021-01-15 18:09:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VDpmZ5BZYc', '2021-01-15 18:09:06', NULL, '2021-01-15 18:09:06', '2021-01-15 18:09:06', NULL),
(7, 'Mikayla', 'Stamm', 'isobel.schroeder', 'leannon.fernando@example.net', 'default.png', 1, '2021-01-15 18:09:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'a5ADcPEcdp', '2021-01-15 18:09:06', NULL, '2021-01-15 18:09:06', '2021-01-15 18:09:06', NULL),
(8, 'Sharon', 'Wilderman', 'lelia77', 'schinner.blanca@example.net', 'default.png', 1, '2021-01-15 18:09:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XgXzg5knFM', '2021-01-15 18:09:06', NULL, '2021-01-15 18:09:06', '2021-01-15 18:09:06', NULL),
(9, 'Charlotte', 'Kuhic', 'towne.antonette', 'legros.paolo@example.org', 'default.png', 1, '2021-01-15 18:09:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yBO7F7L1S1', '2021-01-15 18:09:06', NULL, '2021-01-15 18:09:06', '2021-01-15 18:09:06', NULL),
(10, 'Megane', 'Schmidt', 'ssmitham', 'lysanne.ledner@example.net', 'default.png', 1, '2021-01-15 18:09:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UVBeVfgy7c', '2021-01-15 18:09:06', NULL, '2021-01-15 18:09:06', '2021-01-15 18:09:06', NULL),
(11, 'Madyson', 'Grady', 'reichert.jaylon', 'durgan.narciso@example.net', 'default.png', 1, '2021-01-15 18:09:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FdmdDDLExr', '2021-01-15 18:09:06', NULL, '2021-01-15 18:09:06', '2021-01-15 18:09:06', NULL),
(12, 'Cara', 'Kertzmann', 'leone.bartoletti', 'kaitlin.kessler@example.org', 'default.png', 1, '2021-01-15 18:09:06', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Yeu872pKzv', '2021-01-15 18:09:06', NULL, '2021-01-15 18:09:06', '2021-01-15 18:09:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `name`, `enabled`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0627\\u0633\\u0645 \\u0641\\u064a \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"en\":\"Naam in English\"}', 1, '2021-01-15 18:09:33', '2021-01-15 18:09:33', NULL),
(2, '{\"ar\":\"\\u0627\\u0644\\u0627\\u0633\\u0645 \\u0641\\u064a \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"en\":\"Naam in English\"}', 1, '2021-01-15 18:09:35', '2021-01-15 18:09:35', NULL),
(3, '{\"ar\":\"\\u0627\\u0644\\u0627\\u0633\\u0645 \\u0641\\u064a \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"en\":\"Naam in English\"}', 1, '2021-01-15 18:09:35', '2021-01-15 18:09:35', NULL),
(4, '{\"ar\":\"\\u0627\\u0644\\u0627\\u0633\\u0645 \\u0641\\u064a \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\",\"en\":\"Naam in English\"}', 1, '2021-01-15 18:09:36', '2021-01-15 18:09:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `malls`
--
ALTER TABLE `malls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_products`
--
ALTER TABLE `mall_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_data`
--
ALTER TABLE `other_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_proudcts`
--
ALTER TABLE `related_proudcts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_marks`
--
ALTER TABLE `trade_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `malls`
--
ALTER TABLE `malls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mall_products`
--
ALTER TABLE `mall_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_data`
--
ALTER TABLE `other_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `related_proudcts`
--
ALTER TABLE `related_proudcts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trade_marks`
--
ALTER TABLE `trade_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
