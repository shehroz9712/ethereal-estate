-- ====================================================================
-- Ethereal Estate Database Schema & Seed Data Dump
-- Generated for MySQL / MariaDB (phpMyAdmin compatible)
-- Database: `ethereal_estate`
-- ====================================================================

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `ethereal_estate` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ethereal_estate`;

-- --------------------------------------------------------
-- Table structure for table `migrations`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_06_000001_create_categories_table', 1),
(5, '2026_09_06_000002_create_locations_table', 1),
(6, '2026_09_06_000003_create_properties_table', 1),
(7, '2026_09_06_000004_create_property_images_table', 1),
(8, '2026_09_06_000005_create_floor_plans_table', 1),
(9, '2026_09_06_000006_create_articles_table', 1),
(10, '2026_09_06_000007_create_inquiries_table', 1),
(11, '2026_09_06_000008_create_newsletter_subscribers_table', 1),
(12, '2026_09_06_000009_create_saved_properties_table', 1);

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `avatar`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nakul Sood', 'admin@etherealestates.ca', '2026-09-06 12:00:00', '$2y$12$2tJd.Sq2jiNDM2kTrY1HQe4ViJaHH9mOnf9QQA9KdYClvt6NK04AG', 'admin', '+1 (437) 376-7611', NULL, 'active', NULL, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(2, 'Alexander Wright', 'user@etherealestates.ca', '2026-09-06 12:00:00', '$2y$12$2tJd.Sq2jiNDM2kTrY1HQe4ViJaHH9mOnf9QQA9KdYClvt6NK04AG', 'user', '+1 (416) 555-0192', NULL, 'active', NULL, '2026-09-06 12:00:00', '2026-09-06 12:00:00');

-- --------------------------------------------------------
-- Table structure for table `password_reset_tokens`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `sessions`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `cache`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `cache_locks`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `jobs`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `job_batches`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `failed_jobs`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `categories`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pre-Construction', 'pre-construction', 'Exclusive pre-construction master-planned communities across Ontario.', '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(2, 'Single Detached Homes', 'single-detached', 'Expansive luxury single family estate residences.', '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(3, 'Townhomes', 'townhomes', 'Modern multi-level townhomes with rooftop terraces.', '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(4, 'Bungalows', 'bungalows', 'Contemporary single-level living crafted with premium finishes.', '2026-09-06 12:00:00', '2026-09-06 12:00:00');

-- --------------------------------------------------------
-- Table structure for table `locations`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ON',
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locations_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `locations` (`id`, `city`, `slug`, `province`, `region`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Bowmanville', 'bowmanville', 'ON', 'Durham Region', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(2, 'Oshawa', 'oshawa', 'ON', 'Durham Region', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(3, 'Whitby', 'whitby', 'ON', 'Durham Region', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(4, 'Ajax', 'ajax', 'ON', 'Durham Region', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(5, 'Mississauga', 'mississauga', 'ON', 'Peel Region', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(6, 'Aurora', 'aurora', 'ON', 'York Region', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(7, 'King City', 'king-city', 'ON', 'York Region', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00');

-- --------------------------------------------------------
-- Table structure for table `properties`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bowmanville',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `price_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'selling_fast',
  `property_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Single Detached',
  `bedrooms` smallint(5) UNSIGNED NOT NULL DEFAULT 4,
  `bathrooms` decimal(3,1) NOT NULL DEFAULT 4.0,
  `garage` smallint(5) UNSIGNED NOT NULL DEFAULT 2,
  `sqft` int(10) UNSIGNED NOT NULL DEFAULT 2000,
  `balcony` smallint(5) UNSIGNED NOT NULL DEFAULT 1,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_line` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specifications` json DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `developer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_home_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_centre_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completion_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_preconstruction` tinyint(1) NOT NULL DEFAULT 1,
  `is_mls` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `properties_slug_unique` (`slug`),
  KEY `properties_category_id_foreign` (`category_id`),
  KEY `properties_location_id_foreign` (`location_id`),
  KEY `properties_city_is_preconstruction_is_featured_index` (`city`,`is_preconstruction`,`is_featured`),
  CONSTRAINT `properties_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `properties_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `properties` (`id`, `title`, `slug`, `category_id`, `location_id`, `city`, `address`, `price`, `price_label`, `status`, `property_type`, `bedrooms`, `bathrooms`, `garage`, `sqft`, `balcony`, `short_description`, `full_description`, `feature_line`, `specifications`, `latitude`, `longitude`, `developer`, `model_home_address`, `sales_centre_phone`, `completion_year`, `is_featured`, `is_preconstruction`, `is_mls`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Orchard South', 'orchard-south', 1, 1, 'Bowmanville', 'Middle Road & Concession Road 3', 999900.00, 'Starting from $999,900*', 'selling_fast', 'Single Detached', 4, 6.0, 1, 1400, 8, 'Bungalows and Single Detached Homes with 2 & 3-Car Garages', 'Following the incredible success of Orchard West, Orchard East, and Eden Towns — each successfully sold out — Ethereal Estates proudly presents Orchard South. A signature collection of bungalows and expansive single-detached family homes nestled in the heart of Durham Region.

Experience the tranquility of Bowmanville\'s natural surroundings with direct access to parks, golf courses, and conservation reserves. Just minutes from Historic Downtown Bowmanville, you\'ll enjoy top-rated schools, charming restaurants, and convenient boutique shopping. With the Highway 407 extension and rapid transit connections, traveling to the Greater Toronto Area has never been more seamless.', 'Detached home with a double garage.', NULL, 43.9043000, -78.6873000, 'Treasure Hill Homes', '132 Ronald Hooper Ave, Bowmanville, L1C 3K2', '+1 (437) 376-7611', '2026', 1, 1, 0, 1, 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(2, 'Chateau 9', 'chateau-9', 1, 1, 'Bowmanville', 'North Scugog Court & Regional 57', 1150000.00, 'Starting from $1,150,000*', 'selling_fast', 'Single Detached', 4, 6.0, 1, 1400, 8, 'Bungalows and Single Detached Homes with 2 & 3-Car Garages', 'Chateau 9 represents French country elegance reimagined for contemporary Canadian family life. Featuring soaring 10-foot main floor ceilings, expansive floor-to-ceiling windows, and private lot configurations backing onto protected ravine spaces.', 'Corner lot with a walkout basement.', NULL, 43.9120000, -78.6720000, 'Ethereal Signature Developments', '88 Chateau Court, Bowmanville, ON', '+1 (437) 376-7611', '2026', 1, 1, 0, 1, 2, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(3, 'Ellia at Unity', 'ellia-at-unity', 4, 1, 'Bowmanville', 'Unity Trail & Liberty Street North', 899900.00, 'Starting from $899,900*', 'upcoming', 'Bungalow', 4, 6.0, 1, 1400, 8, 'Bungalows and Single Detached Homes with 2 & 3-Car Garages', 'A boutique enclave designed specifically for discerning buyers seeking single-level comfort without compromising on architectural grandeur or luxury specifications.', 'South-facing terrace with unobstructed views.', NULL, 43.8980000, -78.6600000, 'Treasure Hill Homes', 'Unity Presentation Gallery, Bowmanville', '+1 (437) 376-7611', '2027', 0, 1, 0, 1, 3, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(4, 'Mirra Townhomes', 'mirra-townhomes', 3, 2, 'Oshawa', 'Taunton Road East & Harmony Road', 749900.00, 'Starting from $749,900*', 'selling_fast', 'Townhome', 4, 6.0, 1, 1400, 8, 'Modern townhomes with expansive rooftop terraces and designer kitchens', 'Mirra introduces progressive townhome architecture to North Oshawa. Every residence features open-concept living, dual underground parking spaces, and private sky terraces engineered for year-round entertaining.', 'Modern townhomes with expansive rooftop terraces.', NULL, 43.8971000, -78.8658000, 'Ethereal Urban Living', '210 Mirra Way, Oshawa, ON', '+1 (437) 376-7611', '2026', 1, 1, 0, 1, 4, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(5, 'Highland Reserve', 'highland-reserve', 2, 3, 'Whitby', 'Country Lane & Taunton Road West', 1450000.00, 'Starting from $1,450,000*', 'for_sale', 'Single Detached', 5, 5.0, 3, 3600, 5, 'Scenic hillside community with sweeping Lake Ontario views', 'Highland Reserve sits atop Whitby\'s scenic ridgeline. Offering 50-foot and 60-foot estate lots surrounded by mature hardwood forests and connected to over 15 kilometers of private community trails.', 'Private backyard backing onto green space.', NULL, 43.8975000, -78.9417000, 'Ethereal Estates & Partners', '45 Highland Ridge, Whitby, ON', '+1 (437) 376-7611', '2026', 1, 1, 0, 1, 5, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(6, 'Orchard West', 'orchard-west', 2, 4, 'Ajax', 'Rossland Road West & Westney Road', 1050000.00, 'Starting from $1,050,000*', 'sold_out', 'Single Detached', 4, 6.0, 1, 1400, 8, 'Master-planned neighborhood with parks, top schools and modern family recreation', 'The premier community that established our benchmark for excellence in West Durham. Fully sold out with all phases delivered ahead of schedule.', 'Master-planned neighborhood with top schools and parks.', NULL, 43.8510000, -79.0300000, 'Treasure Hill', 'Ajax Community Sales Center', '+1 (437) 376-7611', '2025', 1, 1, 0, 1, 6, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(7, 'Bayview Trail', 'bayview-trail', 2, 6, 'Aurora', 'Bayview Avenue & Vandorf Sideroad', 1650000.00, 'Starting from $1,650,000*', 'for_sale', 'Single Detached', 4, 5.0, 2, 3200, 2, '36\', 40\' & 60\' Luxury Detached homes in prestigious Aurora', 'An extraordinary collection of grand detached homes nestled alongside protected conservation lands in Aurora.', '36\', 40\' & 60\' Luxury Detached in Prime Aurora.', NULL, 44.0065000, -79.4504000, 'Treasure Hill Homes', 'Aurora Presentation Centre', '+1 (437) 376-7611', '2026', 0, 1, 0, 1, 7, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(8, 'Eversley Estates', 'eversley-estates', 2, 7, 'King City', 'Dufferin Street & 15th Sideroad', 2800000.00, 'Starting from $2,800,000*', 'for_sale', 'Single Detached', 5, 6.0, 3, 5500, 3, '42\' & 62\' Grand Estate Homes in rural King City grandeur', 'Ultra-luxury custom-inspired estate residences situated on acre-caliber lots in Ontario\'s equestrian heartland.', '42\' & 62\' Estate Homes in Prestigious King City.', NULL, 43.9213000, -79.5292000, 'Treasure Hill Homes', 'King City Estate Gallery', '+1 (437) 376-7611', '2027', 0, 1, 0, 1, 8, '2026-09-06 12:00:00', '2026-09-06 12:00:00');

-- --------------------------------------------------------
-- Table structure for table `property_images`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `property_images`;
CREATE TABLE `property_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `property_images_property_id_foreign` (`property_id`),
  CONSTRAINT `property_images_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `property_images` (`id`, `property_id`, `image_url`, `caption`, `is_primary`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/images/prop-orchard-south.jpg', 'Orchard South - View 1', 1, 0, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(2, 1, 'assets/images/prop-chateau9.jpg', 'Orchard South - View 2', 0, 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(3, 1, 'assets/images/prop-mirra.jpg', 'Orchard South - View 3', 0, 2, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(4, 1, 'assets/images/about-interior.jpg', 'Orchard South - View 4', 0, 3, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(5, 2, 'assets/images/prop-chateau9.jpg', 'Chateau 9 - View 1', 1, 0, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(6, 2, 'assets/images/prop-mirra.jpg', 'Chateau 9 - View 2', 0, 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(7, 2, 'assets/images/prop-orchard-south.jpg', 'Chateau 9 - View 3', 0, 2, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(8, 3, 'assets/images/prop-mirra.jpg', 'Ellia at Unity - View 1', 1, 0, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(9, 3, 'assets/images/prop-orchard-south.jpg', 'Ellia at Unity - View 2', 0, 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(10, 3, 'assets/images/prop-chateau9.jpg', 'Ellia at Unity - View 3', 0, 2, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(11, 4, 'assets/images/prop-mirra.jpg', 'Mirra Townhomes - View 1', 1, 0, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(12, 4, 'assets/images/prop-orchard-south.jpg', 'Mirra Townhomes - View 2', 0, 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(13, 4, 'assets/images/prop-chateau9.jpg', 'Mirra Townhomes - View 3', 0, 2, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(14, 5, 'assets/images/prop-chateau9.jpg', 'Highland Reserve - View 1', 1, 0, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(15, 5, 'assets/images/prop-mirra.jpg', 'Highland Reserve - View 2', 0, 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(16, 5, 'assets/images/prop-orchard-south.jpg', 'Highland Reserve - View 3', 0, 2, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(17, 6, 'assets/images/prop-orchard-south.jpg', 'Orchard West - View 1', 1, 0, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(18, 6, 'assets/images/prop-chateau9.jpg', 'Orchard West - View 2', 0, 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(19, 6, 'assets/images/prop-mirra.jpg', 'Orchard West - View 3', 0, 2, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(20, 7, 'assets/images/prop-chateau9.jpg', 'Bayview Trail - View 1', 1, 0, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(21, 7, 'assets/images/prop-orchard-south.jpg', 'Bayview Trail - View 2', 0, 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(22, 8, 'assets/images/prop-orchard-south.jpg', 'Eversley Estates - View 1', 1, 0, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(23, 8, 'assets/images/prop-mirra.jpg', 'Eversley Estates - View 2', 0, 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00');

-- --------------------------------------------------------
-- Table structure for table `floor_plans`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `floor_plans`;
CREATE TABLE `floor_plans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `lot_collection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '33\' Collection',
  `elevation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'A / B',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beds` smallint(5) UNSIGNED NOT NULL DEFAULT 4,
  `baths` decimal(3,1) NOT NULL DEFAULT 3.5,
  `sqft` int(10) UNSIGNED NOT NULL DEFAULT 2240,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `floor_plans_property_id_foreign` (`property_id`),
  CONSTRAINT `floor_plans_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `floor_plans` (`id`, `property_id`, `lot_collection`, `elevation`, `name`, `beds`, `baths`, `sqft`, `description`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, '33\' Collection', 'A / B', 'The Willow', 4, 3.5, 2240, 'Single detached residence with expansive open-concept great room and premium finishes throughout.', NULL, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(2, 1, '38\' Collection', 'A / B / C', 'The Highfield', 5, 4.5, 2960, 'Spacious family floor plan featuring gourmet chef kitchen, walk-in pantry, and private primary retreat.', NULL, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(3, 1, '45\' Collection', 'A / B', 'The Estate', 5, 5.0, 3600, 'Grand luxury layout with 10-foot ceilings, three-car garage, and spa-inspired ensuite with heated floors.', NULL, '2026-09-06 12:00:00', '2026-09-06 12:00:00');

-- --------------------------------------------------------
-- Table structure for table `articles`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Market Insights',
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ethereal Advisory Team',
  `published_at` date DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `excerpt`, `content`, `image_url`, `author_name`, `published_at`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'Discover Ethereal Estates\'s New Release at Palmetto', 'discover-new-release-at-palmetto', 'Community Launch', 'North Oshawa is fast becoming a destination for those seeking master-planned communities, top-ranked schools, and direct transit access.', 'North Oshawa is fast becoming a destination for those seeking modern luxury connected to nature. Palmetto represents our newest release, where expansive detached homes meet thoughtfully landscaped parks and rapid 407 connectivity.

From artisan bakeries in the historic core to weekend recreation along the valley trails, Palmetto offers families an exceptional balance of calm and convenience.', 'assets/images/news-art-1.jpg', 'Ethereal Advisory Team', '2026-04-13', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(2, 'Ready. Set. Rebate! How to Maximize HST Savings on New Builds', 'ready-set-rebate-hst-savings', 'Financial Strategy', 'Understanding your rebate eligibility can make a meaningful difference in your home-buying journey. Calculate your savings before you buy.', 'When purchasing pre-construction in Ontario, knowing the federal and provincial GST/HST new housing rebates can yield substantial savings.

Our advisory team breaks down qualification criteria, rental rebate options for investors, and how to structure purchase contracts to ensure maximum capital efficiency.', 'assets/images/news-art-2.jpg', 'Ethereal Advisory Team', '2026-04-13', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(3, 'Your Georgina Weekend Guide: 8 Things to Do Along Lake Simcoe', 'georgina-weekend-guide', 'Lifestyle & Travel', 'Escape the city and discover pristine beaches, lakeside dining, and boutique farmers markets just an hour north of Toronto.', 'Georgina offers a rare blend of tranquil lakeside living and convenient accessibility. We\'ve curated the ultimate weekend guide for exploring Lake Simcoe\'s shoreline.', 'assets/images/newsletter-cabin.jpg', 'Ethereal Advisory Team', '2026-04-13', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(4, 'Ontario Pre-Construction Market Update: Q2 2026 Forecast', 'ontario-pre-construction-market-update-2026', 'Market Insights', 'Interest rate stabilization and population growth across the Greater Golden Horseshoe continue to drive demand for pre-construction freehold homes.', 'With immigration targets remaining strong and infrastructure investments expanding transit into Durham and York regions, pre-construction investments continue to show robust fundamentals.', 'assets/images/news-hero.jpg', 'Ethereal Advisory Team', '2026-04-13', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(5, '5 Reasons to Invest in Bowmanville Real Estate in 2026', '5-reasons-to-invest-in-bowmanville', 'Investment Advisory', 'With the GO Train extension, Highway 407 access, and exceptional value per square foot, Bowmanville is emerging as Durham Region’s premier growth corridor.', 'Bowmanville offers investors and families alike a compelling opportunity. Unmatched value per square foot, proximity to Lake Ontario, and major civic investments make this market one to watch closely.', 'assets/images/prop-orchard-south.jpg', 'Ethereal Advisory Team', '2026-04-13', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00');

-- --------------------------------------------------------
-- Table structure for table `inquiries`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'contact',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_data` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inquiries_user_id_foreign` (`user_id`),
  KEY `inquiries_property_id_foreign` (`property_id`),
  KEY `inquiries_type_status_index` (`type`,`status`),
  CONSTRAINT `inquiries_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE SET NULL,
  CONSTRAINT `inquiries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `inquiries` (`id`, `user_id`, `property_id`, `type`, `first_name`, `last_name`, `email`, `phone`, `postal_code`, `message`, `extra_data`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'vip_registration', 'Alexander', 'Wright', 'user@etherealestates.ca', '+1 (416) 555-0192', NULL, 'Interested in 38-foot collection lot availability and VIP price list.', NULL, 'new', '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(2, NULL, NULL, 'contact', 'Claire', 'Montgomery', 'claire.m@example.com', '+1 (905) 441-2099', 'L1C 3K2', 'Looking to book a private tour of the model home at Orchard South this Saturday afternoon.', NULL, 'contacted', '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(3, NULL, NULL, 'join_realtor', 'Marcus', 'Chen', 'mchen.realty@example.com', '+1 (647) 902-3341', NULL, 'Realtor with 6 years experience in Durham Region pre-construction seeking to join the Ethereal advisory group.', '{"current_brokerage": "Century 21 Heritage", "license_number": "RECO-4921048", "years_experience": "6 years"}', 'new', '2026-09-06 12:00:00', '2026-09-06 12:00:00');

-- --------------------------------------------------------
-- Table structure for table `newsletter_subscribers`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `newsletter_subscribers`;
CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletter_subscribers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `newsletter_subscribers` (`id`, `first_name`, `last_name`, `email`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Ethereal', 'Estates', 'office@etherealestates.ca', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00'),
(2, 'Ontario', 'Investor', 'investor.club@example.com', 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00');

-- --------------------------------------------------------
-- Table structure for table `saved_properties`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `saved_properties`;
CREATE TABLE `saved_properties` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `saved_properties_user_id_property_id_unique` (`user_id`,`property_id`),
  KEY `saved_properties_property_id_foreign` (`property_id`),
  CONSTRAINT `saved_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  CONSTRAINT `saved_properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `saved_properties` (`id`, `user_id`, `property_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2026-09-06 12:00:00', '2026-09-06 12:00:00');

COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;