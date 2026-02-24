-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2026 at 09:31 PM
-- Server version: 8.0.42-0ubuntu0.20.04.1
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelance_masala-house`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `profile`, `contact`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@email.com', 'admin@email.com', '$2y$10$CBGBF05AKG7bVUJY1H83Yu1FOFgXtTV7ma07u6MCvQ.ABwEmkM.wG', NULL, '9876543210', NULL, '1', NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertises`
--

CREATE TABLE `advertises` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'popup',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `order` int UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint NOT NULL DEFAULT '0',
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `title`, `image`, `description`, `link`, `order`, `status`, `metadata`, `created_at`, `updated_at`) VALUES
(1, 'Taste of Indian Authentic Spices in California', 'MASALA HOUSE', 'banner-image-1.jpg', NULL, NULL, 1, 1, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(2, 'Taste of Indian Authentic Spices in California', 'MASALA HOUSE', 'banner-image-2.png', NULL, NULL, 2, 1, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` tinyint NOT NULL DEFAULT '0',
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `description`, `metadata`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'Category One', 'category-one', NULL, NULL, NULL, NULL, '2026-01-21 15:45:33', '2026-01-21 15:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `metadata` json DEFAULT NULL,
  `seen` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `images` json DEFAULT NULL,
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `album_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_messages`
--

CREATE TABLE `member_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'team',
  `order` int NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_messages`
--

INSERT INTO `member_messages` (`id`, `name`, `slug`, `designation`, `image`, `message`, `type`, `order`, `status`, `metadata`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'Chef Raj Sharma', NULL, 'Founder and Head Chef', 'chef-arjun-patel.png', '<p>Chef Raj Sharma, a Delhi-born culinary expert, is the founder and head chef of Masala House in Concord, California. Inspired by the traditional recipes of his grandmother, he developed a passion for authentic Indian cooking rooted in the use of freshly ground spices and time-honored techniques. Since opening Masala House in 2015, Chef Sharma has remained dedicated to delivering the true essence of Indian cuisine, blending vibrant flavors with carefully sourced ingredients. His philosophy centers on authenticity, quality, and hospitality—ensuring that every guest experiences not just a meal, but the warmth and richness of India’s food culture.</p>', 'team', 0, '1', NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(2, 'Priya Sharma', NULL, 'Restaurant Manager', 'priya-sharma.png', '<p>Priya ensures that every guest has an exceptional dining experience from the moment they walk through our doors.</p>', 'team', 0, '1', NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(3, 'Chef Arjun Patel', NULL, 'Tandoor Specialist', 'chef-raj-sharma.png', '<p>Arjun is a master of the tandoor, creating perfectly cooked naan, kebabs, and other tandoori specialties.</p>', 'team', 0, '1', NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `old_price` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'veg',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `seo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2022_11_09_152633_create_admins_table', 1),
(6, '2024_04_06_064811_create_setting_table', 1),
(7, '2024_04_07_100542_create_pages_table', 1),
(8, '2024_04_07_102723_create_banners_table', 1),
(9, '2024_04_07_102724_create_categories_table', 1),
(10, '2024_04_07_103443_create_blogs_table', 1),
(11, '2024_04_07_103447_create_events_table', 1),
(12, '2024_04_07_160647_create_brands_table', 1),
(13, '2024_04_11_141911_create_albums_table', 1),
(14, '2024_04_11_154902_create_galleries_table', 1),
(15, '2024_04_21_141039_create_member_messages_table', 1),
(16, '2024_04_22_144257_create_testimonials_table', 1),
(17, '2024_06_27_165304_create_advertises_table', 1),
(18, '2024_08_19_060310_create_faqs_table', 1),
(19, '2024_09_08_035003_create_contacts_table', 1),
(20, '2025_06_29_133614_create_menus_table', 1),
(21, '2025_09_10_203425_create_services_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_one_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `images` json DEFAULT NULL,
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_id`, `name`, `title`, `slug`, `image_one`, `image_one_alt`, `image_two`, `image_two_alt`, `excerpt`, `description`, `template`, `order`, `status`, `images`, `metadata`, `seo`, `created_at`, `updated_at`) VALUES
(1, NULL, 'About', 'About', 'about', 'about-us.png', NULL, NULL, NULL, '', '<p>Masala House was founded in 2015 by Chef Raj Sharma with a simple mission: to bring the authentic flavors of India to Concord, California. Born and raised in Delhi, Chef Raj learned the art of Indian cooking from his grandmother, who taught him the importance of freshly ground spices and traditional cooking techniques.</p>\n                        <p>After moving to the United States and working in several renowned restaurants, Chef Raj decided to open Masala House to share his culinary heritage with the community. What started as a small family-run restaurant has now grown into a beloved dining destination known for its authentic flavors and warm hospitality.</p>\n                        <p>At Masala House, we believe that food is more than just sustenance—it\'s a way to connect with culture, create memories, and bring people together. Every dish we serve is prepared with love, using time-honored recipes and the finest ingredients.</p>', 'about', 1, 1, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(2, NULL, 'Welcome To Masalahouse', 'Delicious Food, Friendly Staff, Cozy Atmosphere & Positive Emotions!', 'welcome-to-masala', 'welcome-1.png', NULL, 'welcome-2.png', NULL, NULL, NULL, 'common-page', 2, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(3, NULL, 'Our Story', 'Our Story', 'our-story', 'welcome-1.png', NULL, NULL, NULL, NULL, '<p>Masala House was founded in 2015 by Chef Raj Sharma with a simple mission: to bring the authentic flavors of India to Concord, California. Born and raised in Delhi, Chef Raj\n                        learned the art of Indian cooking from his grandmother, who taught him the importance of freshly ground spices and traditional cooking techniques.\n                        After moving to the United States and working in several renowned restaurants, Chef Raj decided to open Masala House to share his culinary heritage with the community. What started\n                        as a small family-run restaurant has now grown into a beloved dining destination known for its authentic flavors and warm hospitality.\n                        At Masala House, we believe that food is more than just sustenance—it\'s a way to connect with culture, create memories, and bring people together. Every dish we serve is prepared with love, using time-honored recipes and the finest ingredients.</p>', 'common-page', 3, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(4, NULL, 'Dining Experiences', 'Dining Experiences', 'dining-experiences', 'dining-experience.png', NULL, NULL, NULL, NULL, '<p>Step into the world of Hyderabadi cuisine, where every dish carries the\n                            legacy of centuries-old royal kitchens. Famous for its aromatic Biryani, slow-cooked over fragrant basmati rice with tender meats or vegetables,\n                            Hyderabad’s culinary tradition also boasts a variety of kebabs, haleem, and rich Mughlai curries. The use of exotic spices, saffron, and dried fruits\n                            creates layers of flavor that are both bold and delicate, offering a dining experience fit for royalty.</p>\n                        <p>Beyond Biryani, Hyderabadi cuisine is a celebration of culinary artistry and heritage, with recipes passed down through generations. Each dish is\n                            prepared with meticulous care, whether it’s a simple lentil curry or a lavish feast, promising a memorable taste of India’s historic Deccan region.\n                            The cuisine invites you to savor not just food but the rich culture and tradition behind every bite.</p>', 'common-page', 4, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(5, NULL, 'Menu', 'Menu', 'menu', NULL, NULL, NULL, NULL, NULL, NULL, 'menu', 5, 1, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(6, NULL, 'Catering', 'Catering', 'catering', NULL, NULL, NULL, NULL, NULL, NULL, 'catering', 6, 1, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(7, NULL, 'Gallery', 'Gallery', 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'galleries', 7, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(8, NULL, 'Blogs', 'Latest News & Insights', 'blogs', NULL, NULL, NULL, NULL, NULL, NULL, 'blogs', 8, 1, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(9, NULL, 'Our Services', 'Why Choose Our Concord Catering Services', 'services', NULL, NULL, NULL, NULL, 'Experience the best of Indian and Nepali catering with Masala House in Concord, CA', NULL, 'services', 9, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(10, NULL, 'Contact', 'Contact', 'contact', NULL, NULL, NULL, NULL, NULL, NULL, 'contact', 10, 1, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(11, NULL, 'FAQs', 'FAQs', 'faqs', NULL, NULL, NULL, NULL, NULL, NULL, 'faqs', 11, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(12, NULL, 'Testimonials', 'What Our Guests Say', 'testimonials', NULL, NULL, NULL, NULL, '<p>Don\'t just take our word for it - hear what our valued customers have to say about their dining experiences</p>', NULL, 'common-page', 12, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(13, NULL, 'Our Team', 'Meet Our Team', 'our-team', NULL, NULL, NULL, NULL, 'The passionate individuals behind Masala House\'s culinary excellence', NULL, 'common-page', 13, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(14, NULL, 'Our Mission & Vision', 'Our Mission & Vision', 'our-mission-vision', NULL, NULL, NULL, NULL, NULL, NULL, 'common-page', 14, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(15, NULL, 'Our Mission', 'Our Mission', 'our-mission', NULL, NULL, NULL, NULL, NULL, NULL, 'common-page', 15, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(16, NULL, 'Our Vision', 'Our Vision', 'our-vision', NULL, NULL, NULL, NULL, NULL, NULL, 'common-page', 16, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(17, NULL, 'Terms & Conditions', 'Terms And Conditions', 'terms-conditions', NULL, NULL, NULL, NULL, NULL, NULL, 'common-page', 17, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(18, NULL, 'Privacy Policy', 'Privacy Policy', 'privacy-policy', NULL, NULL, NULL, NULL, NULL, NULL, 'common-page', 18, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(19, NULL, 'Wonderful Dining Experience & Indian Food', 'Wonderful Dining Experience & Indian Food', 'wonderful-dining', 'wonderful-dining.png', NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore magna minim veniam nostrud exercitation consectetur adipiscing elit do eiusmod tempor incididunt ut labore.</p>', NULL, 'common-page', 19, 0, NULL, NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `image`, `excerpt`, `description`, `metadata`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'Authentic Cuisine', 'authentic-cuisine', 'authentic-cuisine.svg', 'Authentic Indian & Nepali Cuisine prepared by experienced chefs from our Concord kitchen', 'Authentic Indian & Nepali Cuisine prepared by experienced chefs from our Concord kitchen', NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(2, 'Quality Ingredients', 'quality-ingredients', 'quality-ingredients.svg', 'Freshly Made, High-Quality Ingredients for the best flavors in Contra Costa County', 'Freshly Made, High-Quality Ingredients for the best flavors in Contra Costa County', NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(3, 'Flexible Options', 'flexible-options', 'flexible-options.svg', 'Flexible Menu Options to suit your event needs in Concord and surrounding areas', 'Flexible Menu Options to suit your event needs in Concord and surrounding areas', NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(4, 'Professional Service', 'professional-service', 'professional-service.svg', 'Full-Service Staff for a Hassle-Free Experience at your East Bay location', 'Full-Service Staff for a Hassle-Free Experience at your East Bay location', NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(5, 'Customizable Packages', 'customizable-packages', 'customizable-packages.svg', 'Customizable Packages to Fit Your Event Size & Budget in Concord', 'Customizable Packages to Fit Your Event Size & Budget in Concord', NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23'),
(6, 'Timely Delivery', 'timely-delivery', 'timely-delivery.svg', 'Punctual delivery and setup throughout Contra Costa County for your peace of mind', 'Punctual delivery and setup throughout Contra Costa County for your peace of mind', NULL, NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `white_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci,
  `metadata` json DEFAULT NULL,
  `social` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `white_logo`, `color_logo`, `email`, `address`, `contact`, `phone`, `footer_text`, `metadata`, `social`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'Masala House', 'white-logo.png', 'color-logo.png', 'masalahouseconcord@gmail.com', '2118 Willow Pass Rd. Ste. 400, Concord, CA 94520', '(925) 490-3344', '(925) 490-3344', 'Authentic Indian Cuisine & Street Foods serving the Concord community and Contra Costa County with passion and flavor.', '{\"google_map_iframe\": \"<iframe src=\\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3145.0282342649807!2d-122.03360680000002!3d37.976470400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808567ea99134c93%3A0x6b28e690072aa4a1!2sMasala%20House!5e0!3m2!1sen!2snp!4v1756371479215!5m2!1sen!2snp\\\" width=\\\"600\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"></iframe>\", \"google_map_address\": \"https://maps.app.goo.gl/knDYzasukNwPCNgQA\"}', '{\"twitter\": \"https://twitter.com/\", \"youtube\": \"https://linkedin.com/\", \"facebook\": \"https://www.facebook.com/masalahouseconcord\", \"instagram\": \"https://www.instagram.com/masalahouseconcord/\"}', NULL, '2025-11-17 10:18:23', '2025-11-17 10:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `member_message_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`);

--
-- Indexes for table `advertises`
--
ALTER TABLE `advertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_album_id_foreign` (`album_id`);

--
-- Indexes for table `member_messages`
--
ALTER TABLE `member_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_category_id_foreign` (`category_id`);

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
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_page_id_foreign` (`page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_member_message_id_foreign` (`member_message_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertises`
--
ALTER TABLE `advertises`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_messages`
--
ALTER TABLE `member_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_member_message_id_foreign` FOREIGN KEY (`member_message_id`) REFERENCES `member_messages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
