-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2026 at 11:09 AM
-- Server version: 8.4.6-6
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbokazdk00dczh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `profile`, `contact`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@email.com', 'admin@email.com', '$2y$10$m/h3EYDxlsvgJ8Z2d1GqEe1JX3p2Y8ly.eZvggE6yzflB9maZvOmW', NULL, '9876543210', NULL, '1', NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertises`
--

CREATE TABLE `advertises` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'popup',
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order` int UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint NOT NULL DEFAULT '0',
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `slug`, `image`, `description`, `order`, `status`, `metadata`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'Gallery', 'gallery', 'masala-house-files-zd4mj1fbsxs.png', NULL, 1, 0, NULL, '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-03-09 20:34:18', '2026-03-09 21:58:30'),
(2, 'Gallery 2', 'gallery-2', 'masala-house-files-tr9hisygyps.png', NULL, 1, 0, NULL, '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-03-09 20:41:00', '2026-03-09 20:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'Taste of Indian Authentic Spices in Pittsburg', 'MASALA HOUSE PITTSBURG', 'banner-image-1.jpg', '<p><span style=\"font-family: Arial;\">﻿</span><br></p>', NULL, 1, 1, NULL, '2026-01-22 19:47:54', '2026-03-18 21:39:17'),
(2, 'Taste of Indian Authentic Spices in Pittsburg', 'MASALA HOUSE PITTSBURG', 'banner-image-2.png', NULL, NULL, 2, 1, NULL, '2026-01-22 19:47:54', '2026-03-18 21:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `tag`, `name`, `slug`, `image`, `image_alt`, `excerpt`, `description`, `author`, `status`, `metadata`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'Indian Street', 'The Origins of Indian Street Food: A Culinary Journey', 'the-origins-of-indian-street-food-a-culinary-journey', 'masala-house-files-whfyxyzzfrc.png', NULL, '<p><span style=\"color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\">Indian street food represents one of the most vibrant and diverse culinary traditions in the world. From the bustling streets of Mumbai to the narrow lanes of Old Delhi, street vendors have been serving up quick, flavorful, and affordable meals for centuries.</span></p>', '<p style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\">Indian street food represents one of the most vibrant and diverse culinary traditions in the world. From the bustling streets of Mumbai to the narrow lanes of Old Delhi, street vendors have been serving up quick, flavorful, and affordable meals for centuries.</p><h2 style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); font-size: inherit; color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c;\"><b><u>The Historical Roots</u></b></h2><p style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\">The tradition of street food in India dates back to ancient times when travelers and merchants needed quick, portable meals. The Mughal influence brought kebabs and biryanis to the streets, while regional specialties developed based on local ingredients and preferences.</p><h2 style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); font-size: inherit; color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c;\"><b>Popular Street Food Categories :</b></h2><p style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\"><b><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\">Chaat:</span>&nbsp;</b>Perhaps the most famous category of Indian street food, chaat includes dishes like bhel puri, pani puri, and aloo tikki. These tangy, spicy snacks combine various textures and flavors in perfect harmony.</p><p style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\"><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\"><b>Kebabs and Grilled Items:</b></span>&nbsp;From seekh kebabs to tandoori chicken, grilled street foods offer protein-rich options with bold flavors from marinades and spices.</p><p style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\"><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\"><b>Regional Specialties</b></span><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); font-weight: bolder;\">:</span>&nbsp;Each region of India has its own street food specialties - from Mumbai\'s vada pav to Kolkata\'s kathi rolls, these dishes reflect local tastes and ingredients.</p><h2 style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); font-size: inherit; font-weight: inherit; color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c;\">The Cultural Significance</h2><p style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\">Street food in India is more than just sustenance; it\'s a social experience that brings people from all walks of life together. The street food vendor, or \"wallah,\" is an integral part of the community, often serving the same families for generations.</p><p style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\">At Masala House Concord, we honor this tradition by bringing authentic street food flavors to our menu, prepared with the same care and attention to spices and techniques that have been passed down through generations.</p>', 'By Chef Raj Sharma', 1, NULL, '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-03-09 22:12:19', '2026-03-09 22:21:47'),
(2, 'indian cuisine', 'The Essential Spices in Indian Cuisine', 'the-essential-spices-in-indian-cuisine', 'masala-house-files-zojo8sqsxyg.png', NULL, '<p style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\">The heart of Indian cuisine lies in its masterful use of spices. Understanding these essential ingredients is key to creating authentic Indian flavors in your own kitchen.</p><h2 style=\"border: 0px solid oklch(0.922 0 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); font-size: inherit; color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c;\"><br></h2>', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\">The heart of Indian cuisine lies in its masterful use of spices. Understanding these essential ingredients is key to creating authentic Indian flavors in your own kitchen.</p><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; color: oklch(0.145 0 0); font-size: inherit; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\"><span style=\"font-weight: 700;\">The Foundation Spices</span></h2><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\"><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\"><span style=\"font-weight: 700;\">Turmeric (Haldi):</span></span>&nbsp;Known for its golden color and earthy flavor, turmeric is used in almost every Indian dish. Beyond flavor, it offers numerous health benefits including anti-inflammatory properties.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\"><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\"><span style=\"font-weight: 700;\">Cumin (Jeera):</span></span>&nbsp;Available as seeds or ground powder, cumin provides a warm, nutty flavor that\'s essential in many spice blends and tempering techniques.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\"><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\"><span style=\"font-weight: 700;\">Coriander (Dhania)</span></span><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); font-weight: bolder;\">:</span>&nbsp;Both the seeds and fresh leaves (cilantro) are used extensively. The seeds have a citrusy, slightly sweet flavor when ground.</p><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-weight: inherit; color: oklch(0.145 0 0); font-size: inherit; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\">Heat and Flavor Builders</h2><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\"><span style=\"font-weight: 700;\"><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\">Red Chili Powder:</span>&nbsp;</span>Provides heat and vibrant color. Different varieties offer varying levels of spiciness and flavor profiles.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\"><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\"><span style=\"font-weight: 700;\">Garam Masala:</span></span>&nbsp;This warming spice blend typically includes cinnamon, cardamom, cloves, and black pepper. Each family often has their own secret recipe.</p><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-weight: inherit; color: oklch(0.145 0 0); font-size: inherit; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\">Aromatic Enhancers</h2><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\"><span style=\"font-weight: 700;\"><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\">Cardamom:</span>&nbsp;</span>Known as the \"queen of spices,\" cardamom adds a sweet, floral note to both savory and sweet dishes.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\"><span style=\"border: 0px solid oklch(0.922 0 0); margin: 0px; padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); font-weight: bolder;\">Cinnamon and Cloves:</span>&nbsp;These warming spices are essential in biryanis, curries, and spice blends.</p><h2 style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-weight: inherit; color: oklch(0.145 0 0); font-size: inherit; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5);\">Tips for Using Spices</h2><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; border: 0px solid oklch(0.922 0 0); padding: 0px; outline-color: oklab(0.708 0 0 / 0.5); color: oklch(0.145 0 0); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: medium;\">Always toast whole spices before grinding for maximum flavor. Store spices in airtight containers away from light and heat. At Masala House, we grind our spices fresh daily to ensure the most vibrant flavors in every dish.</p>', 'By Priya Sharma', 1, NULL, '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-03-09 22:16:03', '2026-03-09 22:21:35'),
(3, 'tandoor', 'Cooking Techniques', 'cooking-techniques', 'masala-house-files-iyqxizm6syq.png', NULL, '<p><span style=\"color: rgb(31, 31, 31); font-family: monospace; font-size: 12px; white-space-collapse: preserve;\">The tandoor oven is central to many Indian dishes. Learn about this ancient cooking method and its significance...</span></p>', '<p style=\"margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; color: rgb(37, 37, 37); font-family: kepler-std, serif; font-size: 21px;\">Tandoori cooking can be traced back more than 5,000 years to the banks of the Indus River, where the first tandoor ovens were crafted from clay. Initially utilized by the people of the Harappan civilization, tandoors cooked marinated meats, naan, and vegetables at scorching temperatures.</p><p style=\"margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; color: rgb(37, 37, 37); font-family: kepler-std, serif; font-size: 21px;\">The tandoor oven boasts a unique design, characterized by a wide cylindrical body and a tapering neck. Its construction is simple yet effective, with a thick clay wall that ensures heat retention.</p><p style=\"margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; color: rgb(37, 37, 37); font-family: kepler-std, serif; font-size: 21px;\">The lower section, often situated underground or within a well-insulated structure, houses the source of heat – typically a bed of charcoal or wood. As the fire burns, the tandoor oven’s thick walls absorb and store this heat. This design allows for the inside temperature to reach well above 700°F (370°C), making it perfect for the quick cooking of tandoori dishes.</p>', 'By Chef Arjun Patel', 1, NULL, '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-03-09 22:20:51', '2026-03-19 16:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `description`, `metadata`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'Street Foods', 'street-foods', 'masala-house-files-ue14ri6g7mu.jpg', NULL, NULL, NULL, '2026-02-18 00:12:52', '2026-03-05 03:59:19'),
(4, 'Appetizers and Tondoor', 'appetizers-and-tondoor', 'masala-house-files-orv8kzn7hcw.jpg', NULL, NULL, NULL, '2026-02-24 22:42:56', '2026-03-05 04:01:59'),
(5, 'Entrees', 'entrees', 'masala-house-files-5q7zirwr6g7.jpg', NULL, NULL, NULL, '2026-02-24 23:18:12', '2026-03-05 03:58:36'),
(6, 'Biryani, Thali and Indo-Chinese', 'biryanithali-and-indo-chinese', 'masala-house-files-qjciubmle3m.jpg', NULL, NULL, NULL, '2026-02-24 23:31:06', '2026-03-05 04:05:12'),
(7, 'Sides,Breads and Desserts', 'sidesbreads-and-desserts', 'masala-house-files-i6xwrdvh69d.jpg', NULL, NULL, NULL, '2026-02-24 23:42:14', '2026-03-05 03:58:21'),
(8, 'Drinks', 'drinks', 'masala-house-files-i4sofgqfyto.jpg', NULL, NULL, NULL, '2026-02-24 23:48:17', '2026-03-05 04:07:38'),
(10, 'Lunch Combo', 'lunch-combo', 'masala-house-files-5ab3k0qrahf.jpg', NULL, NULL, NULL, '2026-03-17 17:09:42', '2026-03-18 19:59:10');

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

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `metadata`, `seen`, `created_at`, `updated_at`) VALUES
(1, '{\"name\": \"bibas\", \"time\": \"13:04\", \"email\": \"bibasthap@gmail.com\", \"message\": \"adfsdgfh\"}', 0, '2026-03-04 18:05:01', '2026-03-04 18:05:01'),
(2, '{\"date\": \"2026-03-03\", \"name\": \"Bibas Thapa\", \"time\": \"19:58\", \"email\": \"bibasthapa@gmail.com\", \"phone\": \"986138824\", \"persons\": \"78\"}', 0, '2026-03-05 00:58:18', '2026-03-05 00:58:18'),
(3, '{\"date\": \"2026-03-24\", \"name\": \"Bibas Thapa\", \"time\": \"20:13\", \"email\": \"bibasthapa@gmail.com\", \"phone\": \"9861\", \"persons\": \"78\"}', 0, '2026-03-05 01:14:16', '2026-03-05 01:14:16'),
(4, '{\"date\": \"2026-03-05\", \"name\": \"Bibas Thapa\", \"time\": \"22:52\", \"email\": \"bibasthapa@gmail.com\", \"phone\": \"98613882\", \"persons\": \"33\"}', 0, '2026-03-05 02:52:52', '2026-03-05 02:52:52'),
(5, '{\"date\": \"2026-03-09\", \"name\": \"Biplov Budathoki Chhetri\", \"time\": \"01:35\", \"email\": \"kusal2014utd@gmail.com\", \"phone\": \"1000000000\", \"persons\": \"51\"}', 0, '2026-03-08 05:33:43', '2026-03-08 05:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `venue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `images` json DEFAULT NULL,
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
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
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `album_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 1, 'masala-house-files-bmuxmsyyyc3.jpg', '2026-03-09 20:34:54', '2026-03-09 20:34:54'),
(4, 1, 'masala-house-files-kvizzzjoms4.jpg', '2026-03-09 20:35:42', '2026-03-09 20:35:42'),
(5, 1, 'masala-house-files-ysoolcn9p3w.jpg', '2026-03-09 20:35:42', '2026-03-09 20:35:42'),
(6, 1, 'masala-house-files-hoce287vriz.jpg', '2026-03-09 20:37:23', '2026-03-09 20:37:23'),
(7, 2, 'masala-house-files-e4pvrqkvm87.jpg', '2026-03-09 20:41:00', '2026-03-09 20:41:00'),
(8, 2, 'masala-house-files-3mgtnedqy60.jpg', '2026-03-09 20:41:00', '2026-03-09 20:41:00'),
(9, 2, 'masala-house-files-vccp2cxijpq.jpg', '2026-03-09 20:41:33', '2026-03-09 20:41:33'),
(10, 2, 'masala-house-files-z2g69okhevb.jpg', '2026-03-09 20:41:33', '2026-03-09 20:41:33'),
(11, 2, 'masala-house-files-4ukivbfpwji.jpg', '2026-03-09 20:41:51', '2026-03-09 20:41:51'),
(12, 1, 'masala-house-files-tvrduju4xdz.jpg', '2026-03-09 21:58:30', '2026-03-09 21:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `member_messages`
--

CREATE TABLE `member_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'team',
  `order` int NOT NULL DEFAULT '0',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_messages`
--

INSERT INTO `member_messages` (`id`, `name`, `slug`, `designation`, `image`, `message`, `type`, `order`, `status`, `metadata`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'Chef Raj Sharma', NULL, 'Founder and Head Chef', 'chef-arjun-patel.png', '<p>Chef Raj Sharma, a Delhi-born culinary expert, is the founder and head chef of Masala House in Concord, California. Inspired by the traditional recipes of his grandmother, he developed a passion for authentic Indian cooking rooted in the use of freshly ground spices and time-honored techniques. Since opening Masala House in 2015, Chef Sharma has remained dedicated to delivering the true essence of Indian cuisine, blending vibrant flavors with carefully sourced ingredients. His philosophy centers on authenticity, quality, and hospitality—ensuring that every guest experiences not just a meal, but the warmth and richness of India’s food culture.</p>', 'team', 0, '1', NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(2, 'Priya Sharma', NULL, 'Restaurant Manager', 'priya-sharma.png', '<p>Priya ensures that every guest has an exceptional dining experience from the moment they walk through our doors.</p>', 'team', 0, '1', NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(3, 'Chef Arjun Patel', NULL, 'Tandoor Specialist', 'chef-raj-sharma.png', '<p>Arjun is a master of the tandoor, creating perfectly cooked naan, kebabs, and other tandoori specialties.</p>', 'team', 0, '1', NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `old_price` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'veg',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `seo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category_id`, `name`, `slug`, `image`, `image_alt`, `excerpt`, `description`, `old_price`, `price`, `type`, `status`, `seo`, `created_at`, `updated_at`) VALUES
(7, 1, 'Dahi Puri', 'item-dahi-puri_c92a3073-57aa-4463-a39a-1944c4375359', 'masala-house-files-sihcawtps3e.jpg', 'dahi puri at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy puris filled with potato, creamy yogurt, sweet and tangy chutneys, and crunchy toppings. Cool, sweet, spicy – all in one.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy puris filled with potato, creamy yogurt, sweet and tangy chutneys, and crunchy toppings. Cool, sweet, spicy – all in one.</span></p>', NULL, 7.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 21:46:06', '2026-03-15 17:47:32'),
(8, 1, 'Chaat Papdi', 'item-chaat-papdi_a57c2142-8c2b-420b-abbd-85fd93a4cdbb', 'masala-house-files-lxt5fnjsssv.jpg', 'veg chaat Papdi at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy wafers layered with potatoes, chickpeas, yogurt, tamarind and mint chutneys, and sev. A delightful mix of textures and flavors.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy wafers layered with potatoes, chickpeas, yogurt, tamarind and mint chutneys, and sev. A delightful mix of textures and flavors.</span></p>', NULL, 8.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 22:09:26', '2026-03-15 17:49:31'),
(9, 1, 'Bombay Bhel', 'item-bombay-bhel_7643ccec-53c0-44c6-ab2e-49be64214310', 'masala-house-files-4chwztqlinw.jpg', 'Bombay Bhel at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Puffed rice tossed with onions, tomatoes, chutneys, and sev. Light, tangy, and crunchy – perfect for snacking!</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Puffed rice tossed with onions, tomatoes, chutneys, and sev. Light, tangy, and crunchy – perfect for snacking!</span></p>', NULL, 8.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 22:22:49', '2026-03-15 17:50:50'),
(10, 1, 'Pani Puri', 'item-pani-puri_04cd8052-c966-4cb2-9af0-f4bf6ae5ff8b', 'masala-house-files-ubrzfvwlr8y.jpg', 'Pani puri at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy puris filled with spiced potato and tangy mint water. Refreshing, crunchy, and a burst of flavor in every bite.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy puris filled with spiced potato and tangy mint water. Refreshing, crunchy, and a burst of flavor in every bite.</span></p>', NULL, 7.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 22:27:03', '2026-03-15 17:43:54'),
(12, 1, 'Samosa', 'item-samosa_99a66bc5-54c3-428b-825f-87fe1878fc4c', 'masala-house-files-8u3d0qhznsh.jpg', 'Samosa at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy golden pastries filled with spiced potatoes and peas. Served with tangy chutney. A classic Indian street snack.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy golden pastries filled with spiced potatoes and peas. Served with tangy chutney. A classic Indian street snack.</span></p>', NULL, 5.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 22:37:12', '2026-03-15 17:41:41'),
(14, 4, 'Half Tandoori Chicken', 'item-tandoori-chicken_e1fa01da-8c38-415d-b2c7-ab59bfc3e802', 'masala-house-files-vojkg9quksp.jpg', 'Tandoori Chicken  at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Bone-in chicken marinated overnight in traditional spices and slow-roasted in the tandoor for smoky depth.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Bone-in chicken marinated overnight in traditional spices and slow-roasted in the tandoor for smoky depth.</span></p>', NULL, 12.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 22:51:11', '2026-03-15 19:28:23'),
(15, 4, 'Full Tandoori Chicken', 'item-tandoori-chicken_e1fa01da-8c38-415d-b2c7-ab59bfc3e802', 'masala-house-files-vlv1sb0ua63.jpg', 'Full Tandoori Chicken at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Bone-in chicken marinated overnight in traditional spices and slow-roasted in the tandoor for smoky depth.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Bone-in chicken marinated overnight in traditional spices and slow-roasted in the tandoor for smoky depth.</span></p>', NULL, 20.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 22:54:11', '2026-03-15 19:37:04'),
(16, 4, 'Veg Pakora', 'item-veg-pakora_6077dba0-53cb-42f9-942a-2dc7e463a6ce', 'masala-house-files-mw7ahxmkfjh.jpg', 'Veg Pakora at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Mixed vegetables coated in seasoned chickpea flour batter and deep-fried till crisp.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Mixed vegetables coated in seasoned chickpea flour batter and deep-fried till crisp.</span></p>', NULL, 5.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 22:57:34', '2026-03-15 15:57:22'),
(17, 4, 'Chicken Pakora', 'item-chicken-pakora_2b045116-a402-41f9-bd7b-a570cf7709ec', 'masala-house-files-ieznt8vfkqv.jpg', 'Chicken Pakora at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Tender chicken strips marinated in spiced chickpea batter and fried until golden.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Tender chicken strips marinated in spiced chickpea batter and fried until golden.</span></p>', NULL, 11.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 23:01:25', '2026-03-15 15:41:25'),
(18, 4, 'Chicken 65', 'item-chicken-65_ebf2100a-80f8-45a2-8936-165e030cd407', 'masala-house-files-xdbl3is3hji.jpg', 'Chicken 65 at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">South Indian-style spicy chicken bites marinated, deep-fried, and sautéed with curry leaves and chilies.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">South Indian-style spicy chicken bites marinated, deep-fried, and sautéed with curry leaves and chilies.</span></p>', NULL, 11.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 23:04:40', '2026-03-15 15:41:58'),
(19, 4, 'Malai Chicken Tikka', 'item-malai-chicken-tikka_a83f5878-1b6f-4e1f-8efd-235a747b7d29', 'masala-house-files-3l30l0d77uk.jpg', 'Malai Chicken Tikka  at masala', '<p>Tender pieces marinated in yogurt and spices, grilled in a tandoor.</p>', '<p>Tender pieces marinated in yogurt and spices, grilled in a tandoor.</p>', NULL, 14.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 23:11:33', '2026-03-17 16:05:16'),
(22, 5, 'Butter Chicken', 'item-butter-chicken_58032eb4-1b23-43dc-81a5-23fc28dd7d33', 'masala-house-files-ebohnb0ej0x.jpg', 'Butter chicken  at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Tandoori chicken simmered in a creamy tomato-butter sauce. Smooth, rich, and mildly spiced.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Tandoori chicken simmered in a creamy tomato-butter sauce. Smooth, rich, and mildly spiced.</span></p>', NULL, 13.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 23:27:14', '2026-03-15 19:58:18'),
(26, 6, 'Mughlai Egg Biryani', 'item-mughlai-egg-biryani_492aefac-37bd-4ed0-95c2-db8a2be2bf4b', 'masala-house-files-p9vrmbvl1ax.jpg', 'Mughlai Egg Biryani  at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">A royal spin on comfort food. Spiced boiled eggs in rich gravy layered with basmati rice and Mughlai flavors.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">A royal spin on comfort food. Spiced boiled eggs in rich gravy layered with basmati rice and Mughlai flavors.</span></p>', NULL, 12.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 23:41:48', '2026-03-15 17:06:57'),
(27, 7, 'Plain Rice', 'item-rice_041644d6-0508-4cc8-ab6d-d2a0c5764484', 'masala-house-files-vnukddpwayd.jpg', 'Basmati rice  at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed basmati rice—fluffy, fragrant, and the perfect pairing for any curry.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed basmati rice—fluffy, fragrant, and the perfect pairing for any curry.</span></p>', NULL, 3.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 23:43:57', '2026-03-15 22:12:02'),
(28, 7, 'Raita', 'item-raita_544d0a80-3f61-468d-bda8-4bdd3cdc76f8', 'masala-house-files-wc4xlfbzenf.webp', 'Raita at masala', '<p>A cool and refreshing yogurt-based side dish mixed with fresh herbs and mild spices, perfect to balance spicy meals.</p>', '<p>A cool and refreshing yogurt-based side dish mixed with fresh herbs and mild spices, perfect to balance spicy meals</p>', NULL, 3.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 23:46:12', '2026-03-13 20:01:07'),
(29, 7, 'Jeera Rice', 'item-rice_041644d6-0508-4cc8-ab6d-d2a0c5764484', 'masala-house-files-2tukwuzwcgd.jpg', 'Jeera rice at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed basmati rice—fluffy, fragrant, and the perfect pairing for any curry.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed basmati rice—fluffy, fragrant, and the perfect pairing for any curry.</span></p>', NULL, 6.98, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 23:47:51', '2026-03-16 18:07:16'),
(30, 8, 'Hot Black Tea', 'hot-black-tea', 'masala-house-files-4kbnlglb6bd.webp', 'Hot Black Tea at masala', '<p>Rich, strong black tea served hot, perfect for those who enjoy a robust and invigorating drink.</p>', '<p>Rich, strong black tea served hot, perfect for those who enjoy a robust and invigorating drink.</p>', NULL, 1.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 23:50:26', '2026-03-13 21:59:04'),
(31, 8, 'Mango Lassi', 'item-mango-lassi_2cec0501-01a8-41cb-b0d6-d8f0c1664b7b', 'masala-house-files-u7yidh65kq4.webp', 'Mango Lassi at masala', '<p>A traditional sweet yogurt drink blended with ripe mangoes, offering a refreshing and creamy treat.</p>', '<p>A traditional sweet yogurt drink blended with ripe mangoes, offering a refreshing and creamy treat.</p>', NULL, 4.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-24 23:53:18', '2026-03-13 19:58:13'),
(38, 5, 'Chicken Tikka masala', 'item-chicken-tikka-masala_0a9d9c78-c40c-463b-8423-7747d4a21cdf', 'masala-house-files-fr0quclmmjs.jpg', 'Chicken Tikka masala', '<p>Grilled chicken chunks simmered in a spiced tomato and cream sauce, blending tangy and smoky flavors with a hint of sweetness.</p>', '<p>Grilled chicken chunks simmered in a spiced tomato and cream sauce, blending tangy and smoky flavors with a hint of sweetness.</p>', NULL, 13.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-25 20:19:44', '2026-03-13 21:00:27'),
(39, 5, 'Daal makhani', 'item-daal-makhani_e98ffa7a-bcb0-4d74-9bbd-fff1a9501437', 'masala-house-files-ijeb3gpzdve.jpg', 'Dal Makhani  at masala', '<p><br></p>', '<p><br></p>', NULL, 12.00, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-25 20:22:04', '2026-03-15 19:54:22'),
(42, 5, 'Shahi Paneer', 'item-shahi-paneer_030cc089-1f38-4de0-840f-6614e6a380ee', 'masala-house-files-hycltsl2jbl.webp', 'Shahi Paneer at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Creamy cashew and tomato curry with soft paneer cubes. Mild and royal</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Creamy cashew and tomato curry with soft paneer cubes. Mild and royal</span></p>', NULL, 12.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-25 20:30:59', '2026-03-15 19:50:52'),
(43, 5, 'Chana masala', 'item-chana-masala_e2ab4433-0a83-4c31-a68a-aa161fd17d24', 'masala-house-files-yivsbpb8cbf.jpg', 'Chana masala at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Chickpeas simmered in a tangy tomato-onion gravy with bold masala seasoning.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Chickpeas simmered in a tangy tomato-onion gravy with bold masala seasoning.</span></p>', NULL, 10.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-25 20:51:16', '2026-03-15 19:36:12'),
(47, 5, 'Kadhai Paneer', 'kadhai-paneer', 'masala-house-files-r4c6dpti1c5.jpg', 'Kadhai Paneer at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Paneer tossed with bell peppers, onions, and tomatoes in a bold kadhai masala.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Paneer tossed with bell peppers, onions, and tomatoes in a bold kadhai masala.</span></p>', NULL, 12.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-25 21:14:08', '2026-03-15 19:53:09'),
(48, 6, 'Masala House Special Lamb Biryani', 'item-masala-house-special-lamb-biryani_7f343064-9af6-47ea-92ee-a607f954a00a', 'masala-house-files-ogyi8njy4m8.jpg', 'Masala House Special Lamb Biryani', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Our signature lamb biryani—rich, bold, and extra flavorful. Made with premium spices, herbs, and our chef’s secret touch.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Our signature lamb biryani—rich, bold, and extra flavorful. Made with premium spices, herbs, and our chef’s secret touch.</span></p>', NULL, 15.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-25 21:24:24', '2026-03-15 17:18:32'),
(50, 6, 'Masala House Special Goat Biryani', 'item-masala-house-special-goat-biryani_d900c104-10c0-441f-a0e5-445d08445000', 'masala-house-files-8hk0v6faype.jpg', 'Goat Masala house special Biryanis at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Our signature goat biryani—rich, bold, and extra flavorful. Made with premium spices, herbs, and our chef’s secret touch.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Our signature goat biryani—rich, bold, and extra flavorful. Made with premium spices, herbs, and our chef’s secret touch.</span></p>', NULL, 15.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-25 21:31:58', '2026-03-15 17:19:08'),
(53, 6, 'Mughlai Paneer Biryani', 'item-mughlai-paneer-biryani_6f1a8756-0078-4f00-bf35-0b77de9dc48e', 'masala-house-files-pxng70adbmn.jpg', 'Mughlai Paneer Biryani  at masala', '<p>Rich paneer and basmati rice come together with Mughlai spices in this royal take on the beloved Biryani.</p>', '<p>Rich paneer and basmati rice come together with Mughlai spices in this royal take on the beloved Biryani.</p>', NULL, 12.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-25 22:02:37', '2026-03-15 17:17:28'),
(57, 6, 'Goat Thali', 'item-goat-thali_da2e42e2-2f8e-49c1-9fe3-424e57c2ada9', 'masala-house-files-oceig8ekqbc.jpg', 'Goat Masala house special house thalis at masala', '<p><br></p>', '<p><br></p>', NULL, 19.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-25 23:33:36', '2026-03-15 15:26:17'),
(58, 6, 'Chicken Thali', 'item-chicken-thali_ee69012e-e58d-4e58-a1cf-2457e39fdabe', 'masala-house-files-yjasvmeet8q.jpg', 'Chicken Masala house special house thalis at masala', '<p><br></p>', '<p><br></p>', NULL, 18.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-25 23:37:36', '2026-03-15 15:25:05'),
(62, 6, 'Chicken Chowmein', 'item-chicken-chowmein_15915c53-0c12-4a7c-b5d7-7ae42e7cbd9c', 'masala-house-files-fi8vqjmjn3k.jpg', 'Chicken Chowmein at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Stir-fried noodles with tender chicken and veggies in a bold Indo-Chinese sauce.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Stir-fried noodles with tender chicken and veggies in a bold Indo-Chinese sauce.</span></p>', NULL, 12.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 13:15:55', '2026-03-15 16:33:51'),
(63, 6, 'Egg Chowmein', 'item-egg-chowmein_892ee533-12cb-445d-bb96-fcfb8fbb707d', 'masala-house-files-badtfmpr9fp.jpg', 'Egg Chowmein at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Egg noodles tossed with scrambled egg, veggies, and house-made soy-chili sauce.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Egg noodles tossed with scrambled egg, veggies, and house-made soy-chili sauce.</span></p>', NULL, 11.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 13:19:56', '2026-03-15 16:34:41'),
(64, 6, 'Veg Chowmein', 'item-veg-chowmein_963b16cc-5d01-4cc5-b7f9-005a948bc78c', 'masala-house-files-rakrtdnzyjb.jpg', 'Veg Chowmein at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Stir-fried noodles with mixed vegetables, tossed in savory soy garlic sauce.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Stir-fried noodles with mixed vegetables, tossed in savory soy garlic sauce.</span></p>', NULL, 11.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 13:23:06', '2026-03-15 16:32:34'),
(65, 6, 'Chicken Fried Rice', 'item-chicken-fried-rice_9b321985-b5a3-46ac-99de-ad69223fbfde', 'masala-house-files-c0dperisvgv.jpg', 'Chicken Fried rice  at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Fragrant rice stir-fried with diced chicken, veggies, and spices. Comfort in every bite.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Fragrant rice stir-fried with diced chicken, veggies, and spices. Comfort in every bite.</span></p>', NULL, 12.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 13:26:48', '2026-03-15 16:35:54'),
(66, 6, 'Egg Fried Rice', 'item-egg-fried-rice_5228adff-e221-49df-9307-9248fa8319f9', 'masala-house-files-ffxg9kk4uhz.jpg', 'Egg Fried rice at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Basmati rice stir-fried with egg, onions, and house seasoning. A classic favorite.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Basmati rice stir-fried with egg, onions, and house seasoning. A classic favorite.</span></p>', NULL, 11.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 13:32:52', '2026-03-15 16:46:40'),
(67, 6, 'Veg Fried rice', 'item-veg-fried-rice_9f41e847-072c-4f4e-a0ff-b89011ed035a', 'masala-house-files-ak1q6p1npt4.jpg', 'Veg Fried rice  at  masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Wok-tossed rice with colorful vegetables, soy sauce, and spices. Light, flavorful, and satisfying.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Wok-tossed rice with colorful vegetables, soy sauce, and spices. Light, flavorful, and satisfying.</span></p>', NULL, 11.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 13:35:11', '2026-03-15 16:29:11'),
(69, 7, 'Papadum', 'item-papadum_17b1aa2a-7d94-4374-9667-2717d91d1efa', 'masala-house-files-pehdhomycgu.jpg', 'Papadum at masala', '<p>A thin, crispy wafer made from lentil or chickpea flour, lightly spiced and served as a crunchy side or appetizer.</p>', '<p>A thin, crispy wafer made from lentil or chickpea flour, lightly spiced and served as a crunchy side or appetizer.</p>', NULL, 3.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 16:20:08', '2026-03-13 20:00:06'),
(70, 7, 'Salad', 'salad', 'masala-house-files-gdyoocm8ojs.jpg', 'Salad  at masala', '<p>A fresh mix of crisp vegetables lightly seasoned for a refreshing and healthy side dish.</p>', '<p>A fresh mix of crisp vegetables lightly seasoned for a refreshing and healthy side dish.</p>', NULL, 6.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 16:23:02', '2026-03-15 20:32:09'),
(71, 7, 'Garlic Naan', 'item-naan_fa997eb4-8779-4962-a801-37a678dead79', 'masala-house-files-a3212yc321b.jpg', 'Garlic Naan  at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Topped with minced garlic and herbs. </span><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:</span></p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">\r\n</span>', '<p><span style=\"white-space-collapse: preserve; color: rgb(100, 100, 100); font-family: Effra;\">Topped with minced garlic and herbs. </span><span style=\"white-space-collapse: preserve; color: rgb(100, 100, 100); font-family: Effra;\">Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:</span></p>', NULL, 3.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 16:25:37', '2026-03-13 21:20:35'),
(72, 7, 'Butter Naan', 'item-naan_fa997eb4-8779-4962-a801-37a678dead79', 'masala-house-files-aw4subcimav.jpg', 'Butter Naan  at masala', '<p><span style=\"white-space-collapse: preserve; color: rgb(100, 100, 100); font-family: Effra;\">Brushed with ghee for rich flavor. </span><span style=\"white-space-collapse: preserve; color: rgb(100, 100, 100); font-family: Effra;\">Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Brushed with ghee for rich flavor. </span><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:</span></p>', NULL, 2.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 16:27:39', '2026-03-13 21:19:24'),
(73, 7, 'Cheese Naan', 'item-naan_fa997eb4-8779-4962-a801-37a678dead79', 'masala-house-files-3xalvlhu3ts.jpg', 'Cheese Naan at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Stuffed with gooey cheese, a crowd favorite! </span><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:</span></p>', '<p><span style=\"white-space-collapse: preserve; color: rgb(100, 100, 100); font-family: Effra;\">Stuffed with gooey cheese, a crowd favorite! </span><span style=\"white-space-collapse: preserve; color: rgb(100, 100, 100); font-family: Effra;\">Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:</span></p>', NULL, 4.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 16:30:10', '2026-03-13 21:21:46'),
(74, 7, 'Onion Naan', 'item-naan_fa997eb4-8779-4962-a801-37a678dead79', 'masala-house-files-vpj5gmjbkje.jpg', 'Kashmiri Naan at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Stuffed with finely chopped onions and spices. </span><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:</span></p>', '<p><span style=\"white-space-collapse: preserve; color: rgb(100, 100, 100); font-family: Effra;\">Stuffed with finely chopped onions and spices. </span><span style=\"white-space-collapse: preserve; color: rgb(100, 100, 100); font-family: Effra;\">Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:</span></p>', NULL, 3.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 16:32:53', '2026-03-13 21:25:40'),
(76, 7, 'Chilli Naan', 'item-naan_fa997eb4-8779-4962-a801-37a678dead79', 'masala-house-files-bn20p6ta4rj.jpg', 'Chilli Naan at masala', '<p><span style=\"white-space-collapse: preserve; color: rgb(100, 100, 100); font-family: Effra;\">Spicy kick with chopped green chilies. </span><span style=\"white-space-collapse: preserve; color: rgb(100, 100, 100); font-family: Effra;\">Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Spicy kick with chopped green chilies. </span><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:</span></p>', NULL, 3.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 16:38:26', '2026-03-13 21:22:59'),
(78, 7, 'Gulab Jamun', 'item-gulab-jamun_78891c8c-d6be-41dc-9377-247630ca93d4', 'masala-house-files-9wuxg4stolr.jpg', 'Gulab Jamun at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Soft milk dumplings soaked in warm rose-cardamom syrup. A sweet, classic finish to any meal.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Soft milk dumplings soaked in warm rose-cardamom syrup. A sweet, classic finish to any meal.</span></p>', NULL, 3.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 16:47:24', '2026-03-15 16:10:43'),
(80, 7, 'Kheer', 'item-kheer_8a9aef4f-d0e1-485e-ac39-a96979509122', 'masala-house-files-bdm30fbogac.jpg', 'Kheer at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Creamy Indian rice pudding slow-cooked with milk, sugar, and cardamom. Garnished with nuts.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Creamy Indian rice pudding slow-cooked with milk, sugar, and cardamom. Garnished with nuts.</span></p>', NULL, 3.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 16:53:40', '2026-03-15 16:16:09'),
(81, 7, 'Gajar Halwa', 'item-gajar-halwa_9e99abcf-0fe7-4a7f-9274-7dcb75fedaa6', 'masala-house-files-inmgwnqizfm.jpg', 'Gajar Halwa at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Carrot pudding made with grated carrots, milk, ghee, and sugar. Served warm and rich with flavor.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Carrot pudding made with grated carrots, milk, ghee, and sugar. Served warm and rich with flavor.</span></p>', NULL, 4.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 16:56:43', '2026-03-15 16:21:32'),
(84, 8, 'Masala House Special Chai', 'item-masala-house-special-chai_76957669-d19f-4266-9ca3-da9b5dc54148', 'masala-house-files-wtph8qyijv8.jpg', 'Masala House Special Chai at masala', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Authentic spiced milk tea brewed with cardamom, ginger, and secret house masala. A cozy sip of comfort.</span></p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Authentic spiced milk tea brewed with cardamom, ginger, and secret house masala. A cozy sip of comfort.</span></p>', NULL, 2.50, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:04:02', '2026-03-13 21:54:44'),
(85, 8, 'Iced Tea', 'iced-tea', 'masala-house-files-9qcoreofohv.jpg', 'Iced Tea at masala', '<p>Refreshing chilled tea served over ice, perfect for cooling down and quenching your thirst.</p>', '<p>Refreshing chilled tea served over ice, perfect for cooling down and quenching your thirst.</p>', NULL, 1.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:05:59', '2026-03-13 21:54:01'),
(86, 8, 'Soda (coke, sprite)', 'item-sodacokesprite_daf10fee-9bea-499f-8bc4-ef5c32d114e4', 'masala-house-files-doamu4wyrym.jpg', 'Soda at masala', '<p><br></p>', '<p></p><div aria-hidden=\"true\" data-edge=\"true\" class=\"pointer-events-none h-px w-px absolute bottom-0\"></div><p></p><div class=\"flex flex-col text-sm pb-25\"><article class=\"text-token-text-primary w-full focus:outline-none [--shadow-height:45px] has-data-writing-block:pointer-events-none has-data-writing-block:-mt-(--shadow-height) has-data-writing-block:pt-(--shadow-height) [&amp;:has([data-writing-block])&gt;*]:pointer-events-auto scroll-mt-[calc(var(--header-height)+min(200px,max(70px,20svh)))]\" tabindex=\"-1\" dir=\"auto\" data-turn-id=\"request-WEB:6f1a1021-d46c-455f-9ec5-fe1ebb7cb6e5-18\" data-testid=\"conversation-turn-24\" data-scroll-anchor=\"true\" data-turn=\"assistant\"><div class=\"text-base my-auto mx-auto pb-10 [--thread-content-margin:--spacing(4)] @w-sm/main:[--thread-content-margin:--spacing(6)] @w-lg/main:[--thread-content-margin:--spacing(16)] px-(--thread-content-margin)\"><div tabindex=\"-1\" class=\"[--thread-content-max-width:40rem] @w-lg/main:[--thread-content-max-width:48rem] mx-auto max-w-(--thread-content-max-width) flex-1 group/turn-messages focus-visible:outline-hidden relative flex w-full min-w-0 flex-col agent-turn\"><div class=\"flex max-w-full flex-col grow\"><div data-message-author-role=\"assistant\" data-message-id=\"31be21b9-925b-4885-a8b2-277a80cb51d7\" dir=\"auto\" data-message-model-slug=\"gpt-5-mini\" class=\"min-h-8 text-message relative flex w-full flex-col items-end gap-2 text-start break-words whitespace-normal [.text-message+&amp;]:mt-1\"><div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[1px]\"><div class=\"markdown prose dark:prose-invert w-full wrap-break-word light markdown-new-styling\"><p data-start=\"0\" data-end=\"87\" data-is-last-node=\"\" data-is-only-node=\"\"><br></p></div></div></div></div><div class=\"z-0 flex min-h-[46px] justify-start\"></div><div class=\"mt-3 w-full empty:hidden\"><div class=\"text-center\"></div></div></div></div></article></div>', NULL, 1.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:08:38', '2026-03-13 21:53:47'),
(87, 8, 'Regular Chai', 'regular-chai', 'masala-house-files-lcdi4vtf4uv.jpg', 'Regular Chai at masala', '<p>Classic Indian tea made with black tea, milk, and spices for a warming, fragrant beverage.</p>', '<p>Classic Indian tea made with black tea, milk, and spices for a warming, fragrant beverage.</p>', NULL, 1.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:10:53', '2026-03-13 21:48:29'),
(88, 8, 'Hot Green Tea', 'hot-green-tea', 'masala-house-files-nfztk4nhq4g.jpg', 'Hot Green Tea at masala', '<p>A soothing and healthy beverage made with premium green tea leaves for a light, refreshing taste.</p>', '<p>A soothing and healthy beverage made with premium green tea leaves for a light, refreshing taste.</p>', NULL, 1.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:12:46', '2026-03-13 21:48:13'),
(89, 8, 'Virgin Mojito', 'virgin-mojito', 'masala-house-files-u7lsicvk0op.jpg', 'Virgin Mojito at masala', '<p>A zesty blend of mint, lime, and soda water, offering a refreshing, non-alcoholic version of the classic mojito.</p>', '<p>A zesty blend of mint, lime, and soda water, offering a refreshing, non-alcoholic version of the classic mojito.</p>', NULL, 6.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:14:55', '2026-03-13 21:48:05'),
(90, 8, 'Cardamom Sensation', 'cardamom-sensation', 'masala-house-files-jgzh1uqqhbq.jpg', 'Cardamom Sensation at masala', '<p>A fragrant and refreshing drink infused with cardamom, providing a unique and flavorful twist.</p>', '<p>A fragrant and refreshing drink infused with cardamom, providing a unique and flavorful twist.</p>', NULL, 6.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:17:53', '2026-03-13 21:47:54'),
(91, 8, 'Guava Spark', 'guava-spark', 'masala-house-files-3xusi1agrz9.jpg', 'Guava Spark at masala', '<p>A fruity guava drink with a touch of soda for a lightly sparkling and refreshing beverage.</p>', '<p>A fruity guava drink with a touch of soda for a lightly sparkling and refreshing beverage.</p>', NULL, 6.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:20:13', '2026-03-13 21:47:45'),
(92, 8, 'Pineapple Mint Sparkle', 'pineapple-mint-sparkle', 'masala-house-files-krgpsqpklph.jpg', 'Pineapple Mint Sparkle at masala', '<p>A tropical blend of fresh pineapple and mint, topped with soda for a fizzy and refreshing delight.</p>', '<p>A tropical blend of fresh pineapple and mint, topped with soda for a fizzy and refreshing delight.</p>', NULL, 6.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:22:29', '2026-03-13 21:47:27'),
(93, 8, 'Salted Lassi', 'salted-lassi', 'masala-house-files-ey5d4vlvumw.jpg', 'Salted Lassi at masala', '<p>A savory yogurt drink with a hint of salt, providing a cool and refreshing contrast to spicy dishes.</p>', '<p>A savory yogurt drink with a hint of salt, providing a cool and refreshing contrast to spicy dishes.</p>', NULL, 3.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:24:34', '2026-03-13 21:47:09'),
(94, 8, 'Masala Chhass', 'masala-chhass', 'masala-house-files-vqvjhsnfvd5.jpg', 'Masala Chhass at masala', '<p>Indian buttermilk drink, blended with Indian spices.</p>', '<p>Indian buttermilk drink, blended with Indian spices.</p>', NULL, 4.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:26:48', '2026-03-13 21:46:58'),
(95, 8, 'Masala Soda', 'masala-soda', 'masala-house-files-t5tmvu12ywr.jpg', 'Masala Soda at masala', '<p>A tangy and spicy twist on soda with Indian spices, offering a refreshing and bold flavor.</p>', '<p>A tangy and spicy twist on soda with Indian spices, offering a refreshing and bold flavor.</p>', NULL, 5.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:28:45', '2026-03-13 21:46:47'),
(96, 8, 'Oreo Shake', 'oreo-shake', 'masala-house-files-u65akyj8bnn.jpg', 'Oreo Shake at masala', '<p>Creamy, blended drink made with fresh ingredients, offering a sweet and satisfying treat.</p>', '<p><div aria-hidden=\"true\" data-edge=\"true\" class=\"pointer-events-none h-px w-px absolute bottom-0\"></div></p><div class=\"flex flex-col text-sm pb-25\"><article class=\"text-token-text-primary w-full focus:outline-none [--shadow-height:45px] has-data-writing-block:pointer-events-none has-data-writing-block:-mt-(--shadow-height) has-data-writing-block:pt-(--shadow-height) [&amp;:has([data-writing-block])&gt;*]:pointer-events-auto scroll-mt-[calc(var(--header-height)+min(200px,max(70px,20svh)))]\" tabindex=\"-1\" dir=\"auto\" data-turn-id=\"request-WEB:6f1a1021-d46c-455f-9ec5-fe1ebb7cb6e5-19\" data-testid=\"conversation-turn-26\" data-scroll-anchor=\"true\" data-turn=\"assistant\"><div class=\"text-base my-auto mx-auto pb-10 [--thread-content-margin:--spacing(4)] @w-sm/main:[--thread-content-margin:--spacing(6)] @w-lg/main:[--thread-content-margin:--spacing(16)] px-(--thread-content-margin)\"><div tabindex=\"-1\" class=\"[--thread-content-max-width:40rem] @w-lg/main:[--thread-content-max-width:48rem] mx-auto max-w-(--thread-content-max-width) flex-1 group/turn-messages focus-visible:outline-hidden relative flex w-full min-w-0 flex-col agent-turn\"><div class=\"flex max-w-full flex-col grow\"><div data-message-author-role=\"assistant\" data-message-id=\"ba015385-2793-4f4b-a1d8-2d28f98c5c51\" dir=\"auto\" data-message-model-slug=\"gpt-5-mini\" class=\"min-h-8 text-message relative flex w-full flex-col items-end gap-2 text-start break-words whitespace-normal [.text-message+&amp;]:mt-1\"><div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[1px]\"><div class=\"markdown prose dark:prose-invert w-full wrap-break-word light markdown-new-styling\"><p data-start=\"0\" data-end=\"101\" data-is-last-node=\"\" data-is-only-node=\"\">Creamy, blended drink made with fresh ingredients, offering a sweet and satisfying treat.</p></div></div></div></div><div class=\"z-0 flex min-h-[46px] justify-start\"></div><div class=\"mt-3 w-full empty:hidden\"><div class=\"text-center\"></div></div></div></div></article></div>', NULL, 5.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:42:58', '2026-03-13 21:46:38'),
(97, 8, 'Chocolate Shake', 'chocolate-shake', 'masala-house-files-j8hlw7qcjhs.jpg', 'Chocolate Shake at masala', '<p>Creamy, blended drink made with fresh ingredients, offering a sweet and satisfying treat.</p>', '<p><div aria-hidden=\"true\" data-edge=\"true\" class=\"pointer-events-none h-px w-px absolute bottom-0\"></div></p><div class=\"flex flex-col text-sm pb-25\"><article class=\"text-token-text-primary w-full focus:outline-none [--shadow-height:45px] has-data-writing-block:pointer-events-none has-data-writing-block:-mt-(--shadow-height) has-data-writing-block:pt-(--shadow-height) [&amp;:has([data-writing-block])&gt;*]:pointer-events-auto scroll-mt-[calc(var(--header-height)+min(200px,max(70px,20svh)))]\" tabindex=\"-1\" dir=\"auto\" data-turn-id=\"request-WEB:6f1a1021-d46c-455f-9ec5-fe1ebb7cb6e5-19\" data-testid=\"conversation-turn-26\" data-scroll-anchor=\"true\" data-turn=\"assistant\"><div class=\"text-base my-auto mx-auto pb-10 [--thread-content-margin:--spacing(4)] @w-sm/main:[--thread-content-margin:--spacing(6)] @w-lg/main:[--thread-content-margin:--spacing(16)] px-(--thread-content-margin)\"><div tabindex=\"-1\" class=\"[--thread-content-max-width:40rem] @w-lg/main:[--thread-content-max-width:48rem] mx-auto max-w-(--thread-content-max-width) flex-1 group/turn-messages focus-visible:outline-hidden relative flex w-full min-w-0 flex-col agent-turn\"><div class=\"flex max-w-full flex-col grow\"><div data-message-author-role=\"assistant\" data-message-id=\"ba015385-2793-4f4b-a1d8-2d28f98c5c51\" dir=\"auto\" data-message-model-slug=\"gpt-5-mini\" class=\"min-h-8 text-message relative flex w-full flex-col items-end gap-2 text-start break-words whitespace-normal [.text-message+&amp;]:mt-1\"><div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[1px]\"><div class=\"markdown prose dark:prose-invert w-full wrap-break-word light markdown-new-styling\"><p data-start=\"0\" data-end=\"101\" data-is-last-node=\"\" data-is-only-node=\"\">Creamy, blended drink made with fresh ingredients, offering a sweet and satisfying treat.</p></div></div></div></div><div class=\"z-0 flex min-h-[46px] justify-start\"></div><div class=\"mt-3 w-full empty:hidden\"><div class=\"text-center\"></div></div></div></div></article></div>', NULL, 5.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:46:03', '2026-03-13 21:46:30'),
(98, 8, 'Mango Shake', 'mango-shake', 'masala-house-files-xkp17rbl8tg.jpg', 'Mango Shake at masala', '<p>Creamy, blended drink made with fresh ingredients, offering a sweet and satisfying treat.</p>', '<p><div aria-hidden=\"true\" data-edge=\"true\" class=\"pointer-events-none h-px w-px absolute bottom-0\"></div></p><div class=\"flex flex-col text-sm pb-25\"><article class=\"text-token-text-primary w-full focus:outline-none [--shadow-height:45px] has-data-writing-block:pointer-events-none has-data-writing-block:-mt-(--shadow-height) has-data-writing-block:pt-(--shadow-height) [&amp;:has([data-writing-block])&gt;*]:pointer-events-auto scroll-mt-[calc(var(--header-height)+min(200px,max(70px,20svh)))]\" tabindex=\"-1\" dir=\"auto\" data-turn-id=\"request-WEB:6f1a1021-d46c-455f-9ec5-fe1ebb7cb6e5-19\" data-testid=\"conversation-turn-26\" data-scroll-anchor=\"true\" data-turn=\"assistant\"><div class=\"text-base my-auto mx-auto pb-10 [--thread-content-margin:--spacing(4)] @w-sm/main:[--thread-content-margin:--spacing(6)] @w-lg/main:[--thread-content-margin:--spacing(16)] px-(--thread-content-margin)\"><div tabindex=\"-1\" class=\"[--thread-content-max-width:40rem] @w-lg/main:[--thread-content-max-width:48rem] mx-auto max-w-(--thread-content-max-width) flex-1 group/turn-messages focus-visible:outline-hidden relative flex w-full min-w-0 flex-col agent-turn\"><div class=\"flex max-w-full flex-col grow\"><div data-message-author-role=\"assistant\" data-message-id=\"ba015385-2793-4f4b-a1d8-2d28f98c5c51\" dir=\"auto\" data-message-model-slug=\"gpt-5-mini\" class=\"min-h-8 text-message relative flex w-full flex-col items-end gap-2 text-start break-words whitespace-normal [.text-message+&amp;]:mt-1\"><div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[1px]\"><div class=\"markdown prose dark:prose-invert w-full wrap-break-word light markdown-new-styling\"><p data-start=\"0\" data-end=\"101\" data-is-last-node=\"\" data-is-only-node=\"\">Creamy, blended drink made with fresh ingredients, offering a sweet and satisfying treat.</p></div></div></div></div><div class=\"z-0 flex min-h-[46px] justify-start\"></div><div class=\"mt-3 w-full empty:hidden\"><div class=\"text-center\"></div></div></div></div></article></div>', NULL, 5.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:48:39', '2026-03-13 21:44:41'),
(100, 8, 'Strawberry Lemonade', 'strawberry-lemonade', 'masala-house-files-znuvalrdh5y.jpg', 'Strawberry Lemonade at masala', '<p>Refreshing drink made with zesty lemons and a touch of sweetness, perfect for cooling off</p>', '<p>Refreshing drink made with zesty lemons and a touch of sweetness, perfect for cooling off</p>', NULL, 5.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:54:29', '2026-03-13 21:44:16'),
(101, 8, 'Raspberry Lemonade', 'raspberry-lemonade', 'masala-house-files-bp8n6rkbofi.jpg', 'Raspberry Lemonade at masala', '<p>Refreshing drink made with zesty lemons and a touch of sweetness, perfect for cooling off</p>', '<p>Refreshing drink made with zesty lemons and a touch of sweetness, perfect for cooling off</p>', NULL, 5.99, 'veg', '0', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-02-26 17:56:37', '2026-03-13 21:44:51'),
(102, 1, 'Chole Bhature', 'item-chhola-bhatura_2ebaeda3-7173-44d9-9df8-cd3c746dc483', 'masala-house-files-stjnb5i2csn.jpg', 'Chole Bhature at masala house', '<p>Fluffy fried bread served with hearty, spiced chickpeas. A North Indian comfort meal favorite.</p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Fluffy fried bread served with hearty, spiced chickpeas. A North Indian comfort meal favorite.</span></p>', NULL, 13.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-13 17:45:49', '2026-03-16 17:59:11'),
(103, 1, 'Samosa Chaat', 'item-samosa-chaat_195dbd5d-eef7-4ed5-b22e-3f9c85493e6e', 'masala-house-files-3wespvghjih.jpg', 'Samosa Chaat', '<p> Crispy samosas smashed and topped with chickpeas, yogurt, chutneys, onions, and crunchy sev. A flavorful street-style explosion.</p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy samosas smashed and topped with chickpeas, yogurt, chutneys, onions, and crunchy sev. A flavorful street-style explosion.</span></p>', NULL, 7.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-13 17:50:25', '2026-03-13 17:50:25'),
(104, 6, 'Chicken Dum Biryani', 'item-chicken-dum-biryani_3648a28b-753e-4a74-827d-cde5c896325a', 'masala-house-files-hcyugyl2p15.jpg', 'Chicken Dum Biryani', '<p>&lt;p&gt;Aromatic basmati rice layered with marinated chicken, slow-cooked with herbs and house spices. Sealed with dough and steam-cooked to perfection &lt;/p&gt;</p>', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Aromatic basmati rice layered with marinated chicken, slow-cooked with herbs and house spices. Sealed with dough and steam-cooked to perfection.</span></p>', NULL, 13.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-13 18:00:09', '2026-03-17 16:49:56'),
(105, 5, 'Tawa Lamb', 'item-tawa-lamb_04a49a5b-7122-49f0-9736-f428655e7c7c', 'masala-house-files-st8cplpk98c.jpg', 'Tawa lamb', 'Pan-roasted lamb with peppers, onions, and house spices. Served dry-style with a smoky twist.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Pan-roasted lamb with peppers, onions, and house spices. Served dry-style with a smoky twist.</span></p>', NULL, 15.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-13 20:39:48', '2026-03-13 20:39:48'),
(106, 5, 'Bhuna Ghost', 'item-bhuna-ghost_3d20aefe-6a77-40fb-a38a-91232b6504ad', 'masala-house-files-jfyshplruun.jpg', 'Bhuna Ghost', 'Lamb slow-cooked in a rich onion-tomato masala until thick, bold, and deeply flavorful.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Lamb slow-cooked in a rich onion-tomato masala until thick, bold, and deeply flavorful.</span></p>', NULL, 15.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-13 20:46:01', '2026-03-13 20:46:01'),
(107, 5, 'Lamb Vindaloo', 'item-lamb-vindaloo_0212abe2-d7b9-4fb3-8e65-7f877865b594', 'masala-house-files-ewqvavfobuf.png', 'Lamb Vindaloo', 'Char-grilled chicken cooked in a bold, spiced tomato-cream curry. A fan favorite.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Char-grilled chicken cooked in a bold, spiced tomato-cream curry. A fan favorite.</span></p>', NULL, 13.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-13 20:59:04', '2026-03-13 20:59:04'),
(108, 7, 'Plain Naan', 'item-naan_fa997eb4-8779-4962-a801-37a678dead79', 'masala-house-files-gn9uqbvvpaq.jpg', 'Plain Naan', 'Classic and fluffy. Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:&nbsp;', '<p>Classic and fluffy. Soft, oven-baked Indian flatbread made fresh in our tandoor. Customize with your favorite flavor:&nbsp;</p>', NULL, 2.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-13 21:09:12', '2026-03-13 21:16:15'),
(109, 6, 'Paneer Thali', 'item-paneer-thali_146ce955-42a7-47c8-ab8e-367d166d5ee7', 'masala-house-files-xpqswn418ck.jpg', 'Paneer Thali at masala', NULL, NULL, NULL, 17.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 15:31:23', '2026-03-15 15:31:23'),
(110, 6, 'Veg Thali', 'item-veg-thali_3c4c2ef2-9e00-4cba-a0e8-1b6895877680', 'masala-house-files-ferilmxpy4k.jpg', 'veg thali at masala', NULL, NULL, NULL, 16.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 15:34:45', '2026-03-15 15:34:45');
INSERT INTO `menus` (`id`, `category_id`, `name`, `slug`, `image`, `image_alt`, `excerpt`, `description`, `old_price`, `price`, `type`, `status`, `seo`, `created_at`, `updated_at`) VALUES
(111, 4, 'Crispy Honey Chicken', 'item-crispy-honey-chicken_97531fef-d8ba-46aa-8e42-09b05e135491', 'masala-house-files-ccoi25jtgzi.jpg', 'Crispy honey chicken at masala', 'Crispy fried chicken tossed in a sweet and spicy honey-chili glaze with bell peppers and onions.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy fried chicken tossed in a sweet and spicy honey-chili glaze with bell peppers and onions.</span></p>', NULL, 11.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 15:39:03', '2026-03-15 15:39:03'),
(112, 4, 'Chicken Momo', 'item-chicken-momo_f5829cba-b7bd-4ca9-8b6b-afc795c9a390', 'masala-house-files-wobkhfwvtsy.jpg', 'Chicken Momo at masala', 'Steamed Himalayan dumplings filled with flavorful minced chicken. Served with house momo chutney.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed Himalayan dumplings filled with flavorful minced chicken. Served with house momo chutney.</span></p>', NULL, 11.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 15:45:48', '2026-03-15 15:45:48'),
(113, 4, 'Veg Momo', 'item-veg-momo_27dd6341-627e-4dcb-b2dc-8de6eee26aaa', 'masala-house-files-dc0qjvxz7ct.jpg', 'Veg Momo at masala', 'Steamed dumplings packed with seasoned mixed vegetables. Served with traditional momo sauce.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed dumplings packed with seasoned mixed vegetables. Served with traditional momo sauce.</span></p>', NULL, 10.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 15:48:04', '2026-03-15 15:48:04'),
(114, 4, 'Paneer Pakora', 'item-paneer-pakora_e3bc3de4-f8ba-4d95-9ba5-2a941ca56449', 'masala-house-files-4h19ofb9tku.jpg', 'Paneer Pakora at masala', 'Soft paneer slices dipped in chickpea batter and deep-fried for a crispy outer layer.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Soft paneer slices dipped in chickpea batter and deep-fried for a crispy outer layer.</span></p>', NULL, 7.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 15:52:38', '2026-03-15 15:52:38'),
(115, 4, 'Chicken Chili Momo', 'item-chicken-chilli-momo_54ab4cf4-ee02-4a2e-8b11-d1427020c0f1', 'masala-house-files-wbiqmbpcsb1.jpg', 'Chicken Chili Momo', NULL, NULL, NULL, 13.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 16:07:08', '2026-03-15 16:07:08'),
(116, 7, 'Bread Halwa', 'item-bread-halwa_0eb7f65d-98a6-485d-9729-10a445d7427d', 'masala-house-files-jstnvqzjixi.jpg', 'Bread Halwa', NULL, NULL, NULL, 3.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 16:25:31', '2026-03-15 16:25:31'),
(117, 6, 'Gobi Manchurian', 'item-gobi-manchurian_391d8118-2c52-40b7-96c9-a6f65cd15db1', 'masala-house-files-rxkywyi6qqx.jpg', 'Gobi Manchurian', 'Crispy cauliflower florets tossed in a sweet, tangy, and spicy Indo-Chinese sauce.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy cauliflower florets tossed in a sweet, tangy, and spicy Indo-Chinese sauce.</span></p>', NULL, 9.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 16:31:34', '2026-03-15 16:31:34'),
(118, 6, 'Chicken Chilli Schezwan', 'item-chicken-chilli-schezwan_52fb07c7-2920-496c-be20-54fc97146861', 'masala-house-files-r1frkmqggbf.jpg', 'Chicken Chilli Schezwan', 'Crispy chicken tossed in spicy Schezwan sauce with bell peppers and onions. Fiery and flavorful.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Crispy chicken tossed in spicy Schezwan sauce with bell peppers and onions. Fiery and flavorful.</span></p>', NULL, 11.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 16:50:05', '2026-03-15 16:53:12'),
(119, 6, 'Masala House Special Chicken Biryani', 'item-masala-house-special-chicken-biryani_e234abcb-12e3-4dd7-a662-ec3756c3df40', 'masala-house-files-jsppa6spph1.jpg', 'Masala House Special Chicken Biryani', 'Our signature chicken biryani—rich, bold, and extra flavorful. Made with premium spices, herbs, and our chef’s secret touch.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Our signature chicken biryani—rich, bold, and extra flavorful. Made with premium spices, herbs, and our chef’s secret touch.</span></p>', NULL, 13.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 16:59:56', '2026-03-15 16:59:56'),
(120, 6, 'Veg Dum Biryani', 'item-veg-dum-biryani_c77b9576-f0eb-4814-a8b4-6c1d20542051', 'masala-house-files-0zrqfxownvi.jpg', 'Veg Dum Biryani at masala', 'Basmati rice and seasonal vegetables simmered with herbs, mint, and garam masala. Sealed and slow-cooked for authentic flavor.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Basmati rice and seasonal vegetables simmered with herbs, mint, and garam masala. Sealed and slow-cooked for authentic flavor.</span></p>', NULL, 11.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 17:37:31', '2026-03-15 17:37:31'),
(121, 5, 'Aloo Gobi', 'item-aloo-gobi_915f651b-320f-4b0d-aebc-4f1383204e0a', 'masala-house-files-j2bqb5l83wk.jpg', 'Aloo Gobi at masala', 'Cauliflower and potatoes stir-fried with ginger, garlic, and Indian spices.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Cauliflower and potatoes stir-fried with ginger, garlic, and Indian spices.</span></p>', NULL, 9.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 19:40:21', '2026-03-15 19:40:21'),
(122, 5, 'Mix Veggies', 'item-mix-veggies_15cd014b-a812-429f-837c-35d53071ebf6', 'masala-house-files-gviqkvgfk1s.jpg', 'mix veggies at masala', 'Seasonal vegetables cooked in a lightly spiced tomato-onion sauce', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Seasonal vegetables cooked in a lightly spiced tomato-onion sauce</span></p>', NULL, 9.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 19:42:56', '2026-03-15 19:42:56'),
(123, 5, 'Paneer Tikka Masala', 'item-paneer-tikka-masala_114c41db-2b48-46f5-a3f9-f37984618b1c', 'masala-house-files-fkuqqnqe9nk.jpg', 'Paneer Tikka Masala at masala house', 'Grilled paneer simmered in a creamy tomato-based tikka sauce.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Grilled paneer simmered in a creamy tomato-based tikka sauce.</span></p>', NULL, 12.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 19:46:36', '2026-03-15 19:46:36'),
(124, 5, 'Yellow Daal Tadka', 'item-yellow-daal-tadka_b32c1cd5-07a0-4bcc-bc77-e86971257077', 'masala-house-files-p0gwxi7pj7z.jpg', 'Yellow Daal Tadka', 'Moong and toor lentils tempered with garlic, cumin, and ghee.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Moong and toor lentils tempered with garlic, cumin, and ghee.</span></p>', NULL, 10.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 19:49:36', '2026-03-15 19:49:36'),
(125, 5, 'Kashmiri Rogan Josh', 'item-kashmiri-rogan-josh_ea9bdd49-98b1-434f-bca8-ba1c4d96ee15', 'masala-house-files-2beinlf7cvk.jpg', 'Kashmiri Rogan Josh at masala', 'Aromatic Kashmiri lamb curry slow-cooked with fennel, ginger, and warm spices', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Aromatic Kashmiri lamb curry slow-cooked with fennel, ginger, and warm spices</span></p>', NULL, 15.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 20:05:46', '2026-03-15 20:07:20'),
(126, 6, 'Lamb Thali', 'item-lamb-thali_4e1bb690-d3db-4c0c-8a00-f7bb990461f1', NULL, 'Lamb Thali', NULL, NULL, NULL, 19.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 20:23:37', '2026-03-15 20:23:37'),
(127, 6, 'Fire Chicken  Biryani', 'item-fire-chicken-biryani_fdff949f-0f26-4248-a30d-f484e22e86fb', 'masala-house-files-0i3zyc8bknu.jpg', 'Fire Chicken Biryani at masala', NULL, NULL, NULL, 14.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-15 20:27:36', '2026-03-15 20:27:36'),
(128, 5, 'Shrimp Masala House Special Curry', 'item-masala-house-special-curry_044c3a3f-f26c-42d3-a820-b6e9117284ac', 'masala-house-files-y318z3pfkzw.jpg', 'Shrimp Masala House Special Curry at masala house', 'Choose your protein—shrimp—simmered in our signature curry sauce made with aromatic spices, onions, tomatoes, and herbs. Served with rich, bold flavor in every bite.', '<p>Choose your protein—shrimp—simmered in our signature curry sauce made with aromatic spices, onions, tomatoes, and herbs. Served with rich, bold flavor in every bite.</p>', NULL, 15.98, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-16 17:16:43', '2026-03-17 16:43:04'),
(129, 5, 'Fish Masala House Special Curry', 'item-masala-house-special-curry_044c3a3f-f26c-42d3-a820-b6e9117284ac', 'masala-house-files-shmdyl3zhd1.jpg', 'Fish Masala House Special Curry at masala house', 'Choose your protein—fish—simmered in our signature curry sauce made with aromatic spices, onions, tomatoes, and herbs. Served with rich, bold flavor in every bite.', '<p>Choose your protein—fish—simmered in our signature curry sauce made with aromatic spices, onions, tomatoes, and herbs. Served with rich, bold flavor in every bite.</p>', NULL, 16.98, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-16 17:20:07', '2026-03-17 16:42:19'),
(130, 5, 'Chicken Masala House Special Curry', 'item-masala-house-special-curry_044c3a3f-f26c-42d3-a820-b6e9117284ac', 'masala-house-files-pungcjutpsj.jpg', 'Chicken Masala House Special Curry at masala house', 'Choose your protein—chicken—simmered in our signature curry sauce made with aromatic spices, onions, tomatoes, and herbs. Served with rich, bold flavor in every bite.', '<p>Choose your protein—chicken—simmered in our signature curry sauce made with aromatic spices, onions, tomatoes, and herbs. Served with rich, bold flavor in every bite.</p>', NULL, 14.98, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-16 17:24:00', '2026-03-17 16:42:02'),
(131, 5, 'Egg Masala House Special Curry', 'item-masala-house-special-curry_044c3a3f-f26c-42d3-a820-b6e9117284ac', 'masala-house-files-eg59oai3was.jpg', 'Egg Masala house special curry at masala', 'Choose your protein—egg—simmered in our signature curry sauce made with aromatic spices, onions, tomatoes, and herbs. Served with rich, bold flavor in every bite.', '<p>Choose your protein—egg—simmered in our signature curry sauce made with aromatic spices, onions, tomatoes, and herbs. Served with rich, bold flavor in every bite.</p>', NULL, 11.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-16 17:27:29', '2026-03-17 16:39:36'),
(132, 1, 'Masala House Special Chaat Platter', 'item-masala-house-special-cheat-platter_8465a812-fb23-4b72-936a-d64a9f992f08', 'masala-house-files-h31p54n40ir.jpg', 'Masala House Special Chaat Platter at masala house', NULL, NULL, NULL, 15.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-16 18:02:16', '2026-03-16 18:02:16'),
(133, 5, 'Matar Paneer', 'item-mutter-paneer_86f082d3-9b2b-4fa0-ac82-34cec18114a6', 'masala-house-files-kq9l1l5vkr5.jpg', 'Matar Paneer at masala house', 'Cottage cheese cubes and green peas in a rich, mildly spiced curry.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Cottage cheese cubes and green peas in a rich, mildly spiced curry.</span></p>', NULL, 12.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-16 21:25:21', '2026-03-16 21:25:21'),
(134, 4, 'Paneer Tikka', 'item-paneer-tikka_9148917c-6c4c-4ac3-8ad6-61c26b04868a', 'masala-house-files-5d7lm3cxien.jpg', 'Paneer Tikka at masala house', 'Chunks of paneer marinated in spiced yogurt and grilled in the tandoor with peppers and onions.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Chunks of paneer marinated in spiced yogurt and grilled in the tandoor with peppers and onions.</span></p>', NULL, 13.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-17 16:12:13', '2026-03-17 16:12:13'),
(136, 10, 'Veg Combo', 'item-veg-combo_918edb69-83bb-4e87-9536-5064f0090059', 'masala-house-files-7oez9uj7a8o.jpg', 'Veg Combo at masala', 'Steamed rice, butter naan, daal tadka, and 2 seasonal veggies.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed rice, butter naan, daal tadka, and 2 seasonal veggies.</span></p>', NULL, 10.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-18 19:16:42', '2026-03-18 19:16:42'),
(137, 10, 'Rice and Rita Combo', 'item-rice-and-raita-combo_dd61a624-e9b5-4ab2-9679-478082a29451', 'masala-house-files-lmkutdtp3vb.jpg', 'rice and rita combo at masala', 'Steamed rice, raita, daal tadka, and 2 veggie sides.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed rice, raita, daal tadka, and 2 veggie sides.</span></p>', NULL, 10.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-18 19:19:43', '2026-03-18 19:19:43'),
(138, 10, 'Aloo Kulcha Combo', 'item-aloo-kulcha-combo_8c4d24d7-14f7-4cd4-946b-bb210e2ca4b8', 'masala-house-files-hed8hthzloi.jpg', 'Aloo Kulcha at masala', 'Stuffed potato kulcha, raita, and 2 veggie dishes.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Stuffed potato kulcha, raita, and 2 veggie dishes.</span></p>', NULL, 11.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-18 19:24:29', '2026-03-18 19:24:29'),
(139, 10, 'Chicken Curry Combo', 'item-chicken-curry-combo_66fd656d-2b7c-4dac-ba50-1ce2f2fdc4bb', 'masala-house-files-uecc0xpjdz0.jpg', 'Chicken Curry Combo at masala', 'Steamed rice, butter naan, house chicken curry, and 2 veggie sides.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed rice, butter naan, house chicken curry, and 2 veggie sides.</span></p>', NULL, 12.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-18 19:35:03', '2026-03-18 19:35:03'),
(140, 10, 'Butter Chicken Combo', 'item-butter-chicken-combo_611166e8-ff1d-4e5b-995a-aba8ac9493ef', 'masala-house-files-umciijcj3en.jpg', 'Butter Chicken Combo at masala', 'Steamed rice, butter naan, creamy butter chicken, and 2 veggie sides.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed rice, butter naan, creamy butter chicken, and 2 veggie sides.</span></p>', NULL, 12.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-18 19:37:33', '2026-03-18 19:37:33'),
(141, 10, 'Goat Curry Combo', 'item-goat-curry-combo_600b97b2-c9b6-456e-84f8-337f56cb41db', 'masala-house-files-f0qarhglyij.jpg', 'Goat Curry Combo at masala', 'Steamed rice, butter naan, house goat curry, and 2 veggie dishes.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed rice, butter naan, house goat curry, and 2 veggie dishes.</span></p>', NULL, 13.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-18 19:44:21', '2026-03-18 19:44:21'),
(142, 10, 'Panner Tikka Masala Combo', 'item-tikka-masala-combo_a2f842d1-ce87-4839-9737-ff7479cb4acb', 'masala-house-files-wo2e1xlhbs2.jpg', 'Tikka Masala Combo at Masala', 'Steamed rice, butter naan, paneer tikka, and 2 veggie sides.', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed rice, butter naan, paneer tikka, and 2 veggie sides.</span></p>', NULL, 12.99, 'veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-18 19:50:38', '2026-03-18 19:53:44'),
(143, 10, 'Chicken Tikka Masala Combo', 'item-tikka-masala-combo_a2f842d1-ce87-4839-9737-ff7479cb4acb', 'masala-house-files-nodrs5kdv9m.jpg', 'Chicken Tikka Masala Combo at masala', 'Steamed rice, butter naan, chicken tikka, and 2 veggie sides', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed rice, butter naan, chicken tikka, and 2 veggie sides</span></p>', NULL, 12.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-18 19:53:23', '2026-03-18 19:53:23'),
(144, 10, 'Lamb Tikka Masala Combo', 'item-tikka-masala-combo_a2f842d1-ce87-4839-9737-ff7479cb4acb', 'masala-house-files-a5rcbcmqbnu.jpg', 'Lamb Tikka Masala Combo at masala', 'Steamed rice, butter naan, lamb tikka, and 2 veggie sides', '<p><span style=\"color: rgb(100, 100, 100); font-family: Effra; white-space-collapse: preserve;\">Steamed rice, butter naan, lamb tikka, and 2 veggie sides</span></p>', NULL, 12.99, 'non-veg', '1', '{\"title\":null,\"keywords\":null,\"description\":null}', '2026-03-18 19:56:52', '2026-03-18 19:56:52');

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
(21, '2025_09_10_203425_create_services_table', 1),
(22, '2026_02_20_125826_create_facilities_table', 2),
(23, '2026_03_03_172017_create_popup_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_one` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_one_alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two_alt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `template` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, NULL, 'About', 'About', 'about', 'about-us.png', NULL, NULL, NULL, '', '<p>Masala House was founded in 2015 by Chef Raj Sharma with a simple mission: to bring the authentic flavors of India to Concord, California. Born and raised in Delhi, Chef Raj learned the art of Indian cooking from his grandmother, who taught him the importance of freshly ground spices and traditional cooking techniques.</p>\n                        <p>After moving to the United States and working in several renowned restaurants, Chef Raj decided to open Masala House to share his culinary heritage with the community. What started as a small family-run restaurant has now grown into a beloved dining destination known for its authentic flavors and warm hospitality.</p>\n                        <p>At Masala House, we believe that food is more than just sustenance—it\'s a way to connect with culture, create memories, and bring people together. Every dish we serve is prepared with love, using time-honored recipes and the finest ingredients.</p>', 'about', 1, 1, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(2, NULL, 'Welcome To Masalahouse', 'Delicious Food, Friendly Staff, Cozy Atmosphere & Positive Emotions!', 'welcome-to-masala', 'welcome-1.png', NULL, 'welcome-2.png', NULL, NULL, NULL, 'common-page', 2, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(3, NULL, 'Our Story', 'Our Story', 'our-story', 'welcome-1.png', NULL, NULL, NULL, NULL, '<p>Masala House was founded in 2015 by Chef Raj Sharma with a simple mission: to bring the authentic flavors of India to Concord, California. Born and raised in Delhi, Chef Raj\n                        learned the art of Indian cooking from his grandmother, who taught him the importance of freshly ground spices and traditional cooking techniques.\n                        After moving to the United States and working in several renowned restaurants, Chef Raj decided to open Masala House to share his culinary heritage with the community. What started\n                        as a small family-run restaurant has now grown into a beloved dining destination known for its authentic flavors and warm hospitality.\n                        At Masala House, we believe that food is more than just sustenance—it\'s a way to connect with culture, create memories, and bring people together. Every dish we serve is prepared with love, using time-honored recipes and the finest ingredients.</p>', 'common-page', 3, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(4, NULL, 'Dining Experiences', 'Dining Experiences', 'dining-experiences', 'dining-experience.png', NULL, NULL, NULL, NULL, '<p>Step into the world of Hyderabadi cuisine, where every dish carries the\n                            legacy of centuries-old royal kitchens. Famous for its aromatic Biryani, slow-cooked over fragrant basmati rice with tender meats or vegetables,\n                            Hyderabad’s culinary tradition also boasts a variety of kebabs, haleem, and rich Mughlai curries. The use of exotic spices, saffron, and dried fruits\n                            creates layers of flavor that are both bold and delicate, offering a dining experience fit for royalty.</p>\n                        <p>Beyond Biryani, Hyderabadi cuisine is a celebration of culinary artistry and heritage, with recipes passed down through generations. Each dish is\n                            prepared with meticulous care, whether it’s a simple lentil curry or a lavish feast, promising a memorable taste of India’s historic Deccan region.\n                            The cuisine invites you to savor not just food but the rich culture and tradition behind every bite.</p>', 'common-page', 4, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(5, NULL, 'Menu', 'Menu', 'menu', NULL, NULL, NULL, NULL, NULL, NULL, 'menu', 5, 1, '[]', NULL, '{\"title\": \"Learn more about Masala House through our Menus\", \"keywords\": null, \"description\": \"Take a look at our delicious menus.\"}', '2026-01-22 19:47:54', '2026-03-19 16:56:13'),
(6, NULL, 'Catering', 'Catering', 'catering', NULL, NULL, NULL, NULL, NULL, NULL, 'catering', 6, 1, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(7, NULL, 'Gallery', 'Gallery', 'gallery', NULL, NULL, NULL, NULL, NULL, NULL, 'galleries', 7, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(8, NULL, 'Blogs', 'Latest News & Insights', 'blogs', NULL, NULL, NULL, NULL, NULL, NULL, 'blogs', 8, 1, '[]', NULL, '{\"title\": \"Learn more about Masala House through our blogs\", \"keywords\": \"Masala House\", \"description\": \"Learn more about Masala House through our blogs and get to know us and our dishes and foods.\"}', '2026-01-22 19:47:54', '2026-03-19 17:15:58'),
(9, NULL, 'Our Services', 'Why Choose Our PITTSBURGH Catering Services', 'services', NULL, NULL, NULL, NULL, 'Experience the best of Indian and Nepali catering with Masala House in PITTSBURGH, CA', NULL, 'services', 9, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(10, NULL, 'Contact', 'Contact', 'contact', NULL, NULL, NULL, NULL, NULL, NULL, 'contact', 10, 1, '[]', NULL, '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-01-22 19:47:54', '2026-03-01 23:20:45'),
(11, NULL, 'FAQs', 'FAQs', 'faqs', NULL, NULL, NULL, NULL, NULL, NULL, 'faqs', 11, 0, '[]', NULL, '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-01-22 19:47:54', '2026-03-04 17:54:46'),
(12, NULL, 'Testimonials', 'What Our Guests Say', 'testimonials', NULL, NULL, NULL, NULL, '<p>Don\'t just take our word for it - hear what our valued customers have to say about their dining experiences</p>', NULL, 'common-page', 12, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(13, NULL, 'Our Team', 'Meet Our Team', 'our-team', NULL, NULL, NULL, NULL, 'The passionate individuals behind Masala House\'s culinary excellence', NULL, 'common-page', 13, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(14, NULL, 'Our Mission & Vision', 'Our Mission & Vision', 'our-mission-vision', NULL, NULL, NULL, NULL, NULL, NULL, 'common-page', 14, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(15, NULL, 'Our Mission', 'Our Mission', 'our-mission', NULL, NULL, NULL, NULL, NULL, NULL, 'common-page', 15, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(16, NULL, 'Our Vision', 'Our Vision', 'our-vision', NULL, NULL, NULL, NULL, NULL, NULL, 'common-page', 16, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(17, NULL, 'Terms & Conditions', 'Terms And Conditions', 'terms-conditions', NULL, NULL, NULL, NULL, NULL, NULL, 'common-page', 17, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(18, NULL, 'Privacy Policy', 'Privacy Policy', 'privacy-policy', NULL, NULL, NULL, NULL, NULL, NULL, 'common-page', 18, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(19, NULL, 'Wonderful Dining Experience & Indian Food', 'Wonderful Dining Experience & Indian Food', 'wonderful-dining', 'wonderful-dining.png', NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore magna minim veniam nostrud exercitation consectetur adipiscing elit do eiusmod tempor incididunt ut labore.</p>', NULL, 'common-page', 19, 0, NULL, NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `popups`
--

CREATE TABLE `popups` (
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
-- Dumping data for table `popups`
--

INSERT INTO `popups` (`id`, `name`, `title`, `image`, `description`, `link`, `order`, `status`, `metadata`, `created_at`, `updated_at`) VALUES
(1, 'Masala House Pittsburg', 'MASALA HOUSE PITTSBURG', 'masala-house-files-koqmxkd2jzy.jpg', NULL, 'https://www.toasttab.com/local/order/masala-house-2171-loveridge-road', 0, 1, NULL, '2026-03-05 03:45:50', '2026-03-18 21:42:26'),
(2, 'Watch Us', 'Watch our cooking skills in Tiktok', NULL, NULL, NULL, 0, 0, '[\"https://www.youtube.com/shorts/Ggngkm9qgdw\", \"https://www.youtube.com/watch?v=39oNWfzk-hA&list=PLZGesJjiXqaQfCNinCWlNwWAO-zb-piMB\", \"https://youtube.com/shorts/FZw1-07KWF4?si=jETeg6mzIEfgDM-G\", \"https://youtube.com/shorts/0pK4bnThoBU?si=-ZUe6Ims6_-nfti9\"]', '2026-03-10 20:48:22', '2026-03-12 20:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metadata` json DEFAULT NULL,
  `seo` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `image`, `excerpt`, `description`, `metadata`, `seo`, `created_at`, `updated_at`) VALUES
(1, 'Authentic Cuisine', 'authentic-cuisine', 'authentic-cuisine.svg', '<p>Authentic Indian &amp; Nepali Cuisine prepared by experienced chefs from our Pittsburg kitchen.</p>', '<p>Authentic Indian &amp; Nepali Cuisine prepared by experienced chefs from our pittsburg kitchen</p>', NULL, '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-01-22 19:47:54', '2026-03-08 20:08:56'),
(2, 'Quality Ingredients', 'quality-ingredients', 'quality-ingredients.svg', 'Freshly Made, High-Quality Ingredients for the best flavors in Contra Costa County', 'Freshly Made, High-Quality Ingredients for the best flavors in Contra Costa County', NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(3, 'Flexible Options', 'flexible-options', 'flexible-options.svg', 'Flexible Menu Options to suit your event needs in Pittsburgh and surrounding areas', 'Flexible Menu Options to suit your event needs in Pittsburgh and surrounding areas', NULL, '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-01-22 19:47:54', '2026-03-08 20:12:21'),
(4, 'Professional Service', 'professional-service', 'professional-service.svg', 'Full-Service Staff for a Hassle-Free Experience at your East Bay location', 'Full-Service Staff for a Hassle-Free Experience at your East Bay location', NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54'),
(5, 'Customizable Packages', 'customizable-packages', 'customizable-packages.svg', 'Customizable Packages to Fit Your Event Size &amp; Budget in Pittsburgh', 'Customizable Packages to Fit Your Event Size &amp; Budget in Pittsburgh', NULL, '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-01-22 19:47:54', '2026-03-08 20:14:23'),
(6, 'Timely Delivery', 'timely-delivery', 'timely-delivery.svg', 'Punctual delivery and setup throughout Contra Costa County for your peace of mind', 'Punctual delivery and setup throughout Contra Costa County for your peace of mind', NULL, NULL, '2026-01-22 19:47:54', '2026-01-22 19:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `white_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
(1, 'Masala House', 'white-logo.png', 'color-logo.png', 'masalahouseconcord@gmail.com', '2171 Loveridge Road, Pittsburg, CA 94565', '9252672111', '9252672111', 'Authentic Indian Cuisine &amp; Street Foods serving the pittsburg community and Contra Costa County with passion and flavor.', '{\"unit\": null, \"count\": null, \"title\": null, \"pan_no\": null, \"opening_hours\": \"<p></p><h5>2171 Loveridge Rd, Pittsburg, CA 94565, United States</h5><h4 style=\\\"\\\"><ul style=\\\"\\\"><li style=\\\"\\\">&nbsp;<font style=\\\"background-color: rgb(255, 255, 255);\\\">Closed Day = Monday</font></li></ul></h4><table class=\\\"table table-bordered\\\" style=\\\"box-sizing: border-box; border-collapse: collapse; width: 1508px; max-width: 100%; margin-bottom: 1rem; background-color: transparent; border: 1px solid rgb(244, 245, 248); color: rgb(0, 0, 0); font-family: Poppins; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300; letter-spacing: normal; orphans: 2; text-align: left; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\\\"><tbody style=\\\"box-sizing: border-box;\\\"><tr style=\\\"box-sizing: border-box;\\\"><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>Tuesday<span style=\\\"box-sizing: border-box; white-space: pre;\\\">\\t</span></b></td><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>11 AM–9 PM</b></td></tr><tr style=\\\"box-sizing: border-box;\\\"><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>Wednesday</b></td><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>11 AM–9 PM</b></td></tr><tr style=\\\"box-sizing: border-box;\\\"><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>Thursday</b></td><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>11 AM–9 PM</b></td></tr><tr style=\\\"box-sizing: border-box;\\\"><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>Friday</b></td><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>11 AM–9 PM</b></td></tr><tr style=\\\"box-sizing: border-box;\\\"><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>Saturday</b></td><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>10 AM–9 PM</b></td></tr><tr style=\\\"box-sizing: border-box;\\\"><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>Sunday<span style=\\\"box-sizing: border-box; white-space: pre;\\\">\\t</span></b></td><td style=\\\"box-sizing: border-box; padding: 0.75rem; vertical-align: top; border: 1px solid rgb(226, 229, 236);\\\"><b>11 AM–9 PM</b></td></tr></tbody></table><h5 style=\\\"text-align: center; \\\"><span style=\\\"font-size: 14px;\\\">Authentic Indian Cuisine &amp; Street Foods serving the pittsburg community and Contra Costa County with passion and flavor.</span></h5><p></p><p><br></p>\", \"google_map_iframe\": \"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d785.8913715682321!2d-121.87242410044055!3d38.01059438993607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085597d9b4995d7%3A0x13a128c9240ca276!2sMasala%20House!5e0!3m2!1sen!2snp!4v1772528803850!5m2!1sen!2snp\", \"google_map_address\": \"https://maps.app.goo.gl/knDYzasukNwPCNgQA\"}', '{\"twitter\": \"https://twitter.com/\", \"youtube\": \"https://www.youtube.com/@MasalaHouseconcord\", \"facebook\": \"https://www.facebook.com/masalahouseconcord\", \"ordernow\": \"https://www.toasttab.com/local/order/masala-house-2171-loveridge-road\", \"instagram\": \"https://www.instagram.com/masalahouseconcord/\"}', '{\"title\": null, \"keywords\": null, \"description\": null}', '2026-01-22 19:47:54', '2026-03-18 15:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `member_message_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint NOT NULL DEFAULT '0',
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `member_message_id`, `name`, `designation`, `image`, `message`, `status`, `metadata`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Michael Chen, Pleasant Hill', NULL, NULL, '<p><span style=\"color: oklch(0.373 0.034 259.733); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: 18px; font-style: italic; background-color: oklch(0.985 0.002 247.839);\">\"Best Indian food in the East Bay! The daily buffet has so many options and everything is fresh and delicious. Great value for the price. Worth the short drive from Pleasant Hill.\"</span></p>', 1, NULL, '2026-03-09 20:45:40', '2026-03-15 17:35:43'),
(2, NULL, 'Priya Patel, Walnut Creek', NULL, NULL, '<p><span style=\"color: oklch(0.373 0.034 259.733); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: 18px; font-style: italic; background-color: oklch(0.985 0.002 247.839);\">\"As someone who grew up with Indian food, I can say this place is the real deal. The spice levels are perfect and the naan is freshly made. Whenever I\'m in Concord, I make sure to stop by.\"</span></p>', 1, NULL, '2026-03-15 17:36:03', '2026-03-15 17:36:03'),
(3, NULL, 'Sarah Johnson', NULL, NULL, '<p><span style=\"color: oklch(0.373 0.034 259.733); font-family: __GeistSans_fb8f2c, __GeistSans_Fallback_fb8f2c; font-size: 18px; font-style: italic; background-color: oklch(0.985 0.002 247.839);\">\"The food was absolutely amazing! The flavors were authentic and the service was impeccable. The butter chicken is a must-try! Best Indian restaurant in Concord!\"</span></p>', 1, NULL, '2026-03-15 17:36:36', '2026-03-15 17:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
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
-- Indexes for table `popups`
--
ALTER TABLE `popups`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member_messages`
--
ALTER TABLE `member_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `popups`
--
ALTER TABLE `popups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
