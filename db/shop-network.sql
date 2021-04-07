-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2021 at 06:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop-network`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `mobile`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', '123456789', '$2y$10$f9/bRE36MsHe9PyTfbk1IOO1kQHGVjHTjlcmGaeMqdxzm6hVsQ1QK', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(2, 'Category 2', '2021-04-05 11:18:56', '2021-04-05 11:19:08'),
(3, 'Category 1', '2021-04-05 11:20:15', '2021-04-05 11:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(2) NOT NULL,
  `division_id` int(1) NOT NULL,
  `english_name` varchar(25) NOT NULL,
  `bangla_name` varchar(25) NOT NULL,
  `created_at` timestamp(5) NULL DEFAULT NULL,
  `updated_at` timestamp(5) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `english_name`, `bangla_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', NULL, NULL),
(2, 1, 'Feni', 'ফেনী', NULL, NULL),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', NULL, NULL),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', NULL, NULL),
(5, 1, 'Noakhali', 'নোয়াখালী', NULL, NULL),
(6, 1, 'Chandpur', 'চাঁদপুর', NULL, NULL),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', NULL, NULL),
(8, 1, 'Chattogram', 'চট্টগ্রাম', NULL, NULL),
(9, 1, 'Coxsbazar', 'কক্সবাজার', NULL, NULL),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', NULL, NULL),
(11, 1, 'Bandarban', 'বান্দরবান', NULL, NULL),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', NULL, NULL),
(13, 2, 'Pabna', 'পাবনা', NULL, NULL),
(14, 2, 'Bogura', 'বগুড়া', NULL, NULL),
(15, 2, 'Rajshahi', 'রাজশাহী', NULL, NULL),
(16, 2, 'Natore', 'নাটোর', NULL, NULL),
(17, 2, 'Joypurhat', 'জয়পুরহাট', NULL, NULL),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', NULL, NULL),
(19, 2, 'Naogaon', 'নওগাঁ', NULL, NULL),
(20, 3, 'Jashore', 'যশোর', NULL, NULL),
(21, 3, 'Satkhira', 'সাতক্ষীরা', NULL, NULL),
(22, 3, 'Meherpur', 'মেহেরপুর', NULL, NULL),
(23, 3, 'Narail', 'নড়াইল', NULL, NULL),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', NULL, NULL),
(25, 3, 'Kushtia', 'কুষ্টিয়া', NULL, NULL),
(26, 3, 'Magura', 'মাগুরা', NULL, NULL),
(27, 3, 'Khulna', 'খুলনা', NULL, NULL),
(28, 3, 'Bagerhat', 'বাগেরহাট', NULL, NULL),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', NULL, NULL),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', NULL, NULL),
(31, 4, 'Patuakhali', 'পটুয়াখালী', NULL, NULL),
(32, 4, 'Pirojpur', 'পিরোজপুর', NULL, NULL),
(33, 4, 'Barisal', 'বরিশাল', NULL, NULL),
(34, 4, 'Bhola', 'ভোলা', NULL, NULL),
(35, 4, 'Barguna', 'বরগুনা', NULL, NULL),
(36, 5, 'Sylhet', 'সিলেট', NULL, NULL),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', NULL, NULL),
(38, 5, 'Habiganj', 'হবিগঞ্জ', NULL, NULL),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', NULL, NULL),
(40, 6, 'Narsingdi', 'নরসিংদী', NULL, NULL),
(41, 6, 'Gazipur', 'গাজীপুর', NULL, NULL),
(42, 6, 'Shariatpur', 'শরীয়তপুর', NULL, NULL),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', NULL, NULL),
(44, 6, 'Tangail', 'টাঙ্গাইল', NULL, NULL),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', NULL, NULL),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', NULL, NULL),
(47, 6, 'Dhaka', 'ঢাকা', NULL, NULL),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', NULL, NULL),
(49, 6, 'Rajbari', 'রাজবাড়ী', NULL, NULL),
(50, 6, 'Madaripur', 'মাদারীপুর', NULL, NULL),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', NULL, NULL),
(52, 6, 'Faridpur', 'ফরিদপুর', NULL, NULL),
(53, 7, 'Panchagarh', 'পঞ্চগড়', NULL, NULL),
(54, 7, 'Dinajpur', 'দিনাজপুর', NULL, NULL),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', NULL, NULL),
(56, 7, 'Nilphamari', 'নীলফামারী', NULL, NULL),
(57, 7, 'Gaibandha', 'গাইবান্ধা', NULL, NULL),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', NULL, NULL),
(59, 7, 'Rangpur', 'রংপুর', NULL, NULL),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', NULL, NULL),
(61, 8, 'Sherpur', 'শেরপুর', NULL, NULL),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', NULL, NULL),
(63, 8, 'Jamalpur', 'জামালপুর', NULL, NULL),
(64, 8, 'Netrokona', 'নেত্রকোণা', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(1) NOT NULL,
  `english_name` varchar(25) NOT NULL,
  `bangla_name` varchar(25) NOT NULL,
  `created_at` timestamp(5) NULL DEFAULT NULL,
  `updated_at` timestamp(5) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `english_name`, `bangla_name`, `created_at`, `updated_at`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', NULL, NULL),
(2, 'Rajshahi', 'রাজশাহী', NULL, NULL),
(3, 'Khulna', 'খুলনা', NULL, NULL),
(4, 'Barisal', 'বরিশাল', NULL, NULL),
(5, 'Sylhet', 'সিলেট', NULL, NULL),
(6, 'Dhaka', 'ঢাকা', NULL, NULL),
(7, 'Rangpur', 'রংপুর', NULL, NULL),
(8, 'Mymensingh', 'ময়মনসিংহ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `facility_name`, `created_at`, `updated_at`) VALUES
(1, 'Facility 1', '2021-04-05 11:28:07', '2021-04-06 00:47:01'),
(2, 'Facility 2', '2021-04-06 00:47:12', '2021-04-06 00:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_28_154410_create_admins_table', 1),
(6, '2021_04_05_162355_create_wishlists_table', 1),
(7, '2021_04_05_162415_create_comments_table', 1),
(8, '2021_04_05_162444_create_reviews_table', 1),
(9, '2021_04_05_163007_create_notifications_table', 1),
(10, '2021_04_05_163135_create_facilities_table', 1),
(11, '2021_04_05_163218_create_categories_table', 1),
(12, '2021_04_05_173803_create_divisions_table', 2),
(13, '2021_04_05_173818_create_districts_table', 2),
(14, '2021_04_05_173832_create_upazilas_table', 2),
(16, '2021_04_05_162317_create_shops_table', 3),
(17, '2021_04_06_065621_create_shop_images_table', 3),
(18, '2021_04_06_065702_create_shop_facilities_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `established_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_price` double(8,2) DEFAULT NULL,
  `max_price` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `discount_qrcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_facilities`
--

CREATE TABLE `shop_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `facility` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_images`
--

CREATE TABLE `shop_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` int(3) NOT NULL,
  `district_id` int(2) NOT NULL,
  `english_name` varchar(25) NOT NULL,
  `bangla_name` varchar(25) NOT NULL,
  `created_at` timestamp(5) NULL DEFAULT NULL,
  `updated_at` timestamp(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `english_name`, `bangla_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', NULL, '0000-00-00 00:00:00.00000'),
(2, 1, 'Barura', 'বরুড়া', NULL, '0000-00-00 00:00:00.00000'),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', NULL, '0000-00-00 00:00:00.00000'),
(4, 1, 'Chandina', 'চান্দিনা', NULL, '0000-00-00 00:00:00.00000'),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', NULL, '0000-00-00 00:00:00.00000'),
(6, 1, 'Daudkandi', 'দাউদকান্দি', NULL, '0000-00-00 00:00:00.00000'),
(7, 1, 'Homna', 'হোমনা', NULL, '0000-00-00 00:00:00.00000'),
(8, 1, 'Laksam', 'লাকসাম', NULL, '0000-00-00 00:00:00.00000'),
(9, 1, 'Muradnagar', 'মুরাদনগর', NULL, '0000-00-00 00:00:00.00000'),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', NULL, '0000-00-00 00:00:00.00000'),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', NULL, '0000-00-00 00:00:00.00000'),
(12, 1, 'Meghna', 'মেঘনা', NULL, '0000-00-00 00:00:00.00000'),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', NULL, '0000-00-00 00:00:00.00000'),
(15, 1, 'Titas', 'তিতাস', NULL, '0000-00-00 00:00:00.00000'),
(16, 1, 'Burichang', 'বুড়িচং', NULL, '0000-00-00 00:00:00.00000'),
(17, 1, 'Lalmai', 'লালমাই', NULL, '0000-00-00 00:00:00.00000'),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', NULL, '0000-00-00 00:00:00.00000'),
(19, 2, 'Feni Sadar', 'ফেনী সদর', NULL, '0000-00-00 00:00:00.00000'),
(20, 2, 'Sonagazi', 'সোনাগাজী', NULL, '0000-00-00 00:00:00.00000'),
(21, 2, 'Fulgazi', 'ফুলগাজী', NULL, '0000-00-00 00:00:00.00000'),
(22, 2, 'Parshuram', 'পরশুরাম', NULL, '0000-00-00 00:00:00.00000'),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', NULL, '0000-00-00 00:00:00.00000'),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', NULL, '0000-00-00 00:00:00.00000'),
(25, 3, 'Kasba', 'কসবা', NULL, '0000-00-00 00:00:00.00000'),
(26, 3, 'Nasirnagar', 'নাসিরনগর', NULL, '0000-00-00 00:00:00.00000'),
(27, 3, 'Sarail', 'সরাইল', NULL, '0000-00-00 00:00:00.00000'),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(29, 3, 'Akhaura', 'আখাউড়া', NULL, '0000-00-00 00:00:00.00000'),
(30, 3, 'Nabinagar', 'নবীনগর', NULL, '0000-00-00 00:00:00.00000'),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', NULL, '0000-00-00 00:00:00.00000'),
(32, 3, 'Bijoynagar', 'বিজয়নগর', NULL, '0000-00-00 00:00:00.00000'),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', NULL, '0000-00-00 00:00:00.00000'),
(34, 4, 'Kaptai', 'কাপ্তাই', NULL, '0000-00-00 00:00:00.00000'),
(35, 4, 'Kawkhali', 'কাউখালী', NULL, '0000-00-00 00:00:00.00000'),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(37, 4, 'Barkal', 'বরকল', NULL, '0000-00-00 00:00:00.00000'),
(38, 4, 'Langadu', 'লংগদু', NULL, '0000-00-00 00:00:00.00000'),
(39, 4, 'Rajasthali', 'রাজস্থলী', NULL, '0000-00-00 00:00:00.00000'),
(40, 4, 'Belaichari', 'বিলাইছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(41, 4, 'Juraichari', 'জুরাছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(42, 4, 'Naniarchar', 'নানিয়ারচর', NULL, '0000-00-00 00:00:00.00000'),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', NULL, '0000-00-00 00:00:00.00000'),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(46, 5, 'Hatia', 'হাতিয়া', NULL, '0000-00-00 00:00:00.00000'),
(47, 5, 'Subarnachar', 'সুবর্ণচর', NULL, '0000-00-00 00:00:00.00000'),
(48, 5, 'Kabirhat', 'কবিরহাট', NULL, '0000-00-00 00:00:00.00000'),
(49, 5, 'Senbug', 'সেনবাগ', NULL, '0000-00-00 00:00:00.00000'),
(50, 5, 'Chatkhil', 'চাটখিল', NULL, '0000-00-00 00:00:00.00000'),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', NULL, '0000-00-00 00:00:00.00000'),
(52, 6, 'Haimchar', 'হাইমচর', NULL, '0000-00-00 00:00:00.00000'),
(53, 6, 'Kachua', 'কচুয়া', NULL, '0000-00-00 00:00:00.00000'),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', NULL, '0000-00-00 00:00:00.00000'),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', NULL, '0000-00-00 00:00:00.00000'),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(58, 6, 'Matlab North', 'মতলব উত্তর', NULL, '0000-00-00 00:00:00.00000'),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(61, 7, 'Kamalnagar', 'কমলনগর', NULL, '0000-00-00 00:00:00.00000'),
(62, 7, 'Raipur', 'রায়পুর', NULL, '0000-00-00 00:00:00.00000'),
(63, 7, 'Ramgati', 'রামগতি', NULL, '0000-00-00 00:00:00.00000'),
(64, 7, 'Ramganj', 'রামগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', NULL, '0000-00-00 00:00:00.00000'),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', NULL, '0000-00-00 00:00:00.00000'),
(67, 8, 'Mirsharai', 'মীরসরাই', NULL, '0000-00-00 00:00:00.00000'),
(68, 8, 'Patiya', 'পটিয়া', NULL, '0000-00-00 00:00:00.00000'),
(69, 8, 'Sandwip', 'সন্দ্বীপ', NULL, '0000-00-00 00:00:00.00000'),
(70, 8, 'Banshkhali', 'বাঁশখালী', NULL, '0000-00-00 00:00:00.00000'),
(71, 8, 'Boalkhali', 'বোয়ালখালী', NULL, '0000-00-00 00:00:00.00000'),
(72, 8, 'Anwara', 'আনোয়ারা', NULL, '0000-00-00 00:00:00.00000'),
(73, 8, 'Chandanaish', 'চন্দনাইশ', NULL, '0000-00-00 00:00:00.00000'),
(74, 8, 'Satkania', 'সাতকানিয়া', NULL, '0000-00-00 00:00:00.00000'),
(75, 8, 'Lohagara', 'লোহাগাড়া', NULL, '0000-00-00 00:00:00.00000'),
(76, 8, 'Hathazari', 'হাটহাজারী', NULL, '0000-00-00 00:00:00.00000'),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(78, 8, 'Raozan', 'রাউজান', NULL, '0000-00-00 00:00:00.00000'),
(79, 8, 'Karnafuli', 'কর্ণফুলী', NULL, '0000-00-00 00:00:00.00000'),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', NULL, '0000-00-00 00:00:00.00000'),
(81, 9, 'Chakaria', 'চকরিয়া', NULL, '0000-00-00 00:00:00.00000'),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', NULL, '0000-00-00 00:00:00.00000'),
(83, 9, 'Ukhiya', 'উখিয়া', NULL, '0000-00-00 00:00:00.00000'),
(84, 9, 'Moheshkhali', 'মহেশখালী', NULL, '0000-00-00 00:00:00.00000'),
(85, 9, 'Pekua', 'পেকুয়া', NULL, '0000-00-00 00:00:00.00000'),
(86, 9, 'Ramu', 'রামু', NULL, '0000-00-00 00:00:00.00000'),
(87, 9, 'Teknaf', 'টেকনাফ', NULL, '0000-00-00 00:00:00.00000'),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', NULL, '0000-00-00 00:00:00.00000'),
(89, 10, 'Dighinala', 'দিঘীনালা', NULL, '0000-00-00 00:00:00.00000'),
(90, 10, 'Panchari', 'পানছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(92, 10, 'Mohalchari', 'মহালছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(93, 10, 'Manikchari', 'মানিকছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(94, 10, 'Ramgarh', 'রামগড়', NULL, '0000-00-00 00:00:00.00000'),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', NULL, '0000-00-00 00:00:00.00000'),
(96, 10, 'Guimara', 'গুইমারা', NULL, '0000-00-00 00:00:00.00000'),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', NULL, '0000-00-00 00:00:00.00000'),
(98, 11, 'Alikadam', 'আলীকদম', NULL, '0000-00-00 00:00:00.00000'),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(101, 11, 'Lama', 'লামা', NULL, '0000-00-00 00:00:00.00000'),
(102, 11, 'Ruma', 'রুমা', NULL, '0000-00-00 00:00:00.00000'),
(103, 11, 'Thanchi', 'থানচি', NULL, '0000-00-00 00:00:00.00000'),
(104, 12, 'Belkuchi', 'বেলকুচি', NULL, '0000-00-00 00:00:00.00000'),
(105, 12, 'Chauhali', 'চৌহালি', NULL, '0000-00-00 00:00:00.00000'),
(106, 12, 'Kamarkhand', 'কামারখন্দ', NULL, '0000-00-00 00:00:00.00000'),
(107, 12, 'Kazipur', 'কাজীপুর', NULL, '0000-00-00 00:00:00.00000'),
(108, 12, 'Raigonj', 'রায়গঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', NULL, '0000-00-00 00:00:00.00000'),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', NULL, '0000-00-00 00:00:00.00000'),
(111, 12, 'Tarash', 'তাড়াশ', NULL, '0000-00-00 00:00:00.00000'),
(112, 12, 'Ullapara', 'উল্লাপাড়া', NULL, '0000-00-00 00:00:00.00000'),
(113, 13, 'Sujanagar', 'সুজানগর', NULL, '0000-00-00 00:00:00.00000'),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', NULL, '0000-00-00 00:00:00.00000'),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', NULL, '0000-00-00 00:00:00.00000'),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', NULL, '0000-00-00 00:00:00.00000'),
(117, 13, 'Bera', 'বেড়া', NULL, '0000-00-00 00:00:00.00000'),
(118, 13, 'Atghoria', 'আটঘরিয়া', NULL, '0000-00-00 00:00:00.00000'),
(119, 13, 'Chatmohar', 'চাটমোহর', NULL, '0000-00-00 00:00:00.00000'),
(120, 13, 'Santhia', 'সাঁথিয়া', NULL, '0000-00-00 00:00:00.00000'),
(121, 13, 'Faridpur', 'ফরিদপুর', NULL, '0000-00-00 00:00:00.00000'),
(122, 14, 'Kahaloo', 'কাহালু', NULL, '0000-00-00 00:00:00.00000'),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', NULL, '0000-00-00 00:00:00.00000'),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', NULL, '0000-00-00 00:00:00.00000'),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', NULL, '0000-00-00 00:00:00.00000'),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', NULL, '0000-00-00 00:00:00.00000'),
(127, 14, 'Adamdighi', 'আদমদিঘি', NULL, '0000-00-00 00:00:00.00000'),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', NULL, '0000-00-00 00:00:00.00000'),
(129, 14, 'Sonatala', 'সোনাতলা', NULL, '0000-00-00 00:00:00.00000'),
(130, 14, 'Dhunot', 'ধুনট', NULL, '0000-00-00 00:00:00.00000'),
(131, 14, 'Gabtali', 'গাবতলী', NULL, '0000-00-00 00:00:00.00000'),
(132, 14, 'Sherpur', 'শেরপুর', NULL, '0000-00-00 00:00:00.00000'),
(133, 14, 'Shibganj', 'শিবগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(134, 15, 'Paba', 'পবা', NULL, '0000-00-00 00:00:00.00000'),
(135, 15, 'Durgapur', 'দুর্গাপুর', NULL, '0000-00-00 00:00:00.00000'),
(136, 15, 'Mohonpur', 'মোহনপুর', NULL, '0000-00-00 00:00:00.00000'),
(137, 15, 'Charghat', 'চারঘাট', NULL, '0000-00-00 00:00:00.00000'),
(138, 15, 'Puthia', 'পুঠিয়া', NULL, '0000-00-00 00:00:00.00000'),
(139, 15, 'Bagha', 'বাঘা', NULL, '0000-00-00 00:00:00.00000'),
(140, 15, 'Godagari', 'গোদাগাড়ী', NULL, '0000-00-00 00:00:00.00000'),
(141, 15, 'Tanore', 'তানোর', NULL, '0000-00-00 00:00:00.00000'),
(142, 15, 'Bagmara', 'বাগমারা', NULL, '0000-00-00 00:00:00.00000'),
(143, 16, 'Natore Sadar', 'নাটোর সদর', NULL, '0000-00-00 00:00:00.00000'),
(144, 16, 'Singra', 'সিংড়া', NULL, '0000-00-00 00:00:00.00000'),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', NULL, '0000-00-00 00:00:00.00000'),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', NULL, '0000-00-00 00:00:00.00000'),
(147, 16, 'Lalpur', 'লালপুর', NULL, '0000-00-00 00:00:00.00000'),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', NULL, '0000-00-00 00:00:00.00000'),
(149, 16, 'Naldanga', 'নলডাঙ্গা', NULL, '0000-00-00 00:00:00.00000'),
(150, 17, 'Akkelpur', 'আক্কেলপুর', NULL, '0000-00-00 00:00:00.00000'),
(151, 17, 'Kalai', 'কালাই', NULL, '0000-00-00 00:00:00.00000'),
(152, 17, 'Khetlal', 'ক্ষেতলাল', NULL, '0000-00-00 00:00:00.00000'),
(153, 17, 'Panchbibi', 'পাঁচবিবি', NULL, '0000-00-00 00:00:00.00000'),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', NULL, '0000-00-00 00:00:00.00000'),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', NULL, '0000-00-00 00:00:00.00000'),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', NULL, '0000-00-00 00:00:00.00000'),
(157, 18, 'Nachol', 'নাচোল', NULL, '0000-00-00 00:00:00.00000'),
(158, 18, 'Bholahat', 'ভোলাহাট', NULL, '0000-00-00 00:00:00.00000'),
(159, 18, 'Shibganj', 'শিবগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', NULL, '0000-00-00 00:00:00.00000'),
(161, 19, 'Badalgachi', 'বদলগাছী', NULL, '0000-00-00 00:00:00.00000'),
(162, 19, 'Patnitala', 'পত্নিতলা', NULL, '0000-00-00 00:00:00.00000'),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', NULL, '0000-00-00 00:00:00.00000'),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', NULL, '0000-00-00 00:00:00.00000'),
(165, 19, 'Manda', 'মান্দা', NULL, '0000-00-00 00:00:00.00000'),
(166, 19, 'Atrai', 'আত্রাই', NULL, '0000-00-00 00:00:00.00000'),
(167, 19, 'Raninagar', 'রাণীনগর', NULL, '0000-00-00 00:00:00.00000'),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', NULL, '0000-00-00 00:00:00.00000'),
(169, 19, 'Porsha', 'পোরশা', NULL, '0000-00-00 00:00:00.00000'),
(170, 19, 'Sapahar', 'সাপাহার', NULL, '0000-00-00 00:00:00.00000'),
(171, 20, 'Manirampur', 'মণিরামপুর', NULL, '0000-00-00 00:00:00.00000'),
(172, 20, 'Abhaynagar', 'অভয়নগর', NULL, '0000-00-00 00:00:00.00000'),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', NULL, '0000-00-00 00:00:00.00000'),
(174, 20, 'Chougachha', 'চৌগাছা', NULL, '0000-00-00 00:00:00.00000'),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', NULL, '0000-00-00 00:00:00.00000'),
(176, 20, 'Keshabpur', 'কেশবপুর', NULL, '0000-00-00 00:00:00.00000'),
(177, 20, 'Jessore Sadar', 'যশোর সদর', NULL, '0000-00-00 00:00:00.00000'),
(178, 20, 'Sharsha', 'শার্শা', NULL, '0000-00-00 00:00:00.00000'),
(179, 21, 'Assasuni', 'আশাশুনি', NULL, '0000-00-00 00:00:00.00000'),
(180, 21, 'Debhata', 'দেবহাটা', NULL, '0000-00-00 00:00:00.00000'),
(181, 21, 'Kalaroa', 'কলারোয়া', NULL, '0000-00-00 00:00:00.00000'),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', NULL, '0000-00-00 00:00:00.00000'),
(183, 21, 'Shyamnagar', 'শ্যামনগর', NULL, '0000-00-00 00:00:00.00000'),
(184, 21, 'Tala', 'তালা', NULL, '0000-00-00 00:00:00.00000'),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(186, 22, 'Mujibnagar', 'মুজিবনগর', NULL, '0000-00-00 00:00:00.00000'),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(188, 22, 'Gangni', 'গাংনী', NULL, '0000-00-00 00:00:00.00000'),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', NULL, '0000-00-00 00:00:00.00000'),
(190, 23, 'Lohagara', 'লোহাগড়া', NULL, '0000-00-00 00:00:00.00000'),
(191, 23, 'Kalia', 'কালিয়া', NULL, '0000-00-00 00:00:00.00000'),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', NULL, '0000-00-00 00:00:00.00000'),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', NULL, '0000-00-00 00:00:00.00000'),
(194, 24, 'Damurhuda', 'দামুড়হুদা', NULL, '0000-00-00 00:00:00.00000'),
(195, 24, 'Jibannagar', 'জীবননগর', NULL, '0000-00-00 00:00:00.00000'),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', NULL, '0000-00-00 00:00:00.00000'),
(197, 25, 'Kumarkhali', 'কুমারখালী', NULL, '0000-00-00 00:00:00.00000'),
(198, 25, 'Khoksa', 'খোকসা', NULL, '0000-00-00 00:00:00.00000'),
(199, 25, 'Mirpur', 'মিরপুর', NULL, '0000-00-00 00:00:00.00000'),
(200, 25, 'Daulatpur', 'দৌলতপুর', NULL, '0000-00-00 00:00:00.00000'),
(201, 25, 'Bheramara', 'ভেড়ামারা', NULL, '0000-00-00 00:00:00.00000'),
(202, 26, 'Shalikha', 'শালিখা', NULL, '0000-00-00 00:00:00.00000'),
(203, 26, 'Sreepur', 'শ্রীপুর', NULL, '0000-00-00 00:00:00.00000'),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', NULL, '0000-00-00 00:00:00.00000'),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', NULL, '0000-00-00 00:00:00.00000'),
(206, 27, 'Paikgasa', 'পাইকগাছা', NULL, '0000-00-00 00:00:00.00000'),
(207, 27, 'Fultola', 'ফুলতলা', NULL, '0000-00-00 00:00:00.00000'),
(208, 27, 'Digholia', 'দিঘলিয়া', NULL, '0000-00-00 00:00:00.00000'),
(209, 27, 'Rupsha', 'রূপসা', NULL, '0000-00-00 00:00:00.00000'),
(210, 27, 'Terokhada', 'তেরখাদা', NULL, '0000-00-00 00:00:00.00000'),
(211, 27, 'Dumuria', 'ডুমুরিয়া', NULL, '0000-00-00 00:00:00.00000'),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', NULL, '0000-00-00 00:00:00.00000'),
(213, 27, 'Dakop', 'দাকোপ', NULL, '0000-00-00 00:00:00.00000'),
(214, 27, 'Koyra', 'কয়রা', NULL, '0000-00-00 00:00:00.00000'),
(215, 28, 'Fakirhat', 'ফকিরহাট', NULL, '0000-00-00 00:00:00.00000'),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', NULL, '0000-00-00 00:00:00.00000'),
(217, 28, 'Mollahat', 'মোল্লাহাট', NULL, '0000-00-00 00:00:00.00000'),
(218, 28, 'Sarankhola', 'শরণখোলা', NULL, '0000-00-00 00:00:00.00000'),
(219, 28, 'Rampal', 'রামপাল', NULL, '0000-00-00 00:00:00.00000'),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(221, 28, 'Kachua', 'কচুয়া', NULL, '0000-00-00 00:00:00.00000'),
(222, 28, 'Mongla', 'মোংলা', NULL, '0000-00-00 00:00:00.00000'),
(223, 28, 'Chitalmari', 'চিতলমারী', NULL, '0000-00-00 00:00:00.00000'),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', NULL, '0000-00-00 00:00:00.00000'),
(225, 29, 'Shailkupa', 'শৈলকুপা', NULL, '0000-00-00 00:00:00.00000'),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', NULL, '0000-00-00 00:00:00.00000'),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', NULL, '0000-00-00 00:00:00.00000'),
(229, 29, 'Moheshpur', 'মহেশপুর', NULL, '0000-00-00 00:00:00.00000'),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', NULL, '0000-00-00 00:00:00.00000'),
(231, 30, 'Kathalia', 'কাঠালিয়া', NULL, '0000-00-00 00:00:00.00000'),
(232, 30, 'Nalchity', 'নলছিটি', NULL, '0000-00-00 00:00:00.00000'),
(233, 30, 'Rajapur', 'রাজাপুর', NULL, '0000-00-00 00:00:00.00000'),
(234, 31, 'Bauphal', 'বাউফল', NULL, '0000-00-00 00:00:00.00000'),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', NULL, '0000-00-00 00:00:00.00000'),
(236, 31, 'Dumki', 'দুমকি', NULL, '0000-00-00 00:00:00.00000'),
(237, 31, 'Dashmina', 'দশমিনা', NULL, '0000-00-00 00:00:00.00000'),
(238, 31, 'Kalapara', 'কলাপাড়া', NULL, '0000-00-00 00:00:00.00000'),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(240, 31, 'Galachipa', 'গলাচিপা', NULL, '0000-00-00 00:00:00.00000'),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', NULL, '0000-00-00 00:00:00.00000'),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(243, 32, 'Nazirpur', 'নাজিরপুর', NULL, '0000-00-00 00:00:00.00000'),
(244, 32, 'Kawkhali', 'কাউখালী', NULL, '0000-00-00 00:00:00.00000'),
(245, 32, 'Zianagar', 'জিয়ানগর', NULL, '0000-00-00 00:00:00.00000'),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', NULL, '0000-00-00 00:00:00.00000'),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', NULL, '0000-00-00 00:00:00.00000'),
(248, 32, 'Nesarabad', 'নেছারাবাদ', NULL, '0000-00-00 00:00:00.00000'),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', NULL, '0000-00-00 00:00:00.00000'),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(252, 33, 'Wazirpur', 'উজিরপুর', NULL, '0000-00-00 00:00:00.00000'),
(253, 33, 'Banaripara', 'বানারীপাড়া', NULL, '0000-00-00 00:00:00.00000'),
(254, 33, 'Gournadi', 'গৌরনদী', NULL, '0000-00-00 00:00:00.00000'),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', NULL, '0000-00-00 00:00:00.00000'),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(257, 33, 'Muladi', 'মুলাদী', NULL, '0000-00-00 00:00:00.00000'),
(258, 33, 'Hizla', 'হিজলা', NULL, '0000-00-00 00:00:00.00000'),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', NULL, '0000-00-00 00:00:00.00000'),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', NULL, '0000-00-00 00:00:00.00000'),
(261, 34, 'Charfesson', 'চরফ্যাশন', NULL, '0000-00-00 00:00:00.00000'),
(262, 34, 'Doulatkhan', 'দৌলতখান', NULL, '0000-00-00 00:00:00.00000'),
(263, 34, 'Monpura', 'মনপুরা', NULL, '0000-00-00 00:00:00.00000'),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', NULL, '0000-00-00 00:00:00.00000'),
(265, 34, 'Lalmohan', 'লালমোহন', NULL, '0000-00-00 00:00:00.00000'),
(266, 35, 'Amtali', 'আমতলী', NULL, '0000-00-00 00:00:00.00000'),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', NULL, '0000-00-00 00:00:00.00000'),
(268, 35, 'Betagi', 'বেতাগী', NULL, '0000-00-00 00:00:00.00000'),
(269, 35, 'Bamna', 'বামনা', NULL, '0000-00-00 00:00:00.00000'),
(270, 35, 'Pathorghata', 'পাথরঘাটা', NULL, '0000-00-00 00:00:00.00000'),
(271, 35, 'Taltali', 'তালতলি', NULL, '0000-00-00 00:00:00.00000'),
(272, 36, 'Balaganj', 'বালাগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', NULL, '0000-00-00 00:00:00.00000'),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', NULL, '0000-00-00 00:00:00.00000'),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', NULL, '0000-00-00 00:00:00.00000'),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', NULL, '0000-00-00 00:00:00.00000'),
(280, 36, 'Kanaighat', 'কানাইঘাট', NULL, '0000-00-00 00:00:00.00000'),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', NULL, '0000-00-00 00:00:00.00000'),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', NULL, '0000-00-00 00:00:00.00000'),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', NULL, '0000-00-00 00:00:00.00000'),
(285, 37, 'Barlekha', 'বড়লেখা', NULL, '0000-00-00 00:00:00.00000'),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(287, 37, 'Kulaura', 'কুলাউড়া', NULL, '0000-00-00 00:00:00.00000'),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', NULL, '0000-00-00 00:00:00.00000'),
(289, 37, 'Rajnagar', 'রাজনগর', NULL, '0000-00-00 00:00:00.00000'),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', NULL, '0000-00-00 00:00:00.00000'),
(291, 37, 'Juri', 'জুড়ী', NULL, '0000-00-00 00:00:00.00000'),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(293, 38, 'Bahubal', 'বাহুবল', NULL, '0000-00-00 00:00:00.00000'),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(295, 38, 'Baniachong', 'বানিয়াচং', NULL, '0000-00-00 00:00:00.00000'),
(296, 38, 'Lakhai', 'লাখাই', NULL, '0000-00-00 00:00:00.00000'),
(297, 38, 'Chunarughat', 'চুনারুঘাট', NULL, '0000-00-00 00:00:00.00000'),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', NULL, '0000-00-00 00:00:00.00000'),
(299, 38, 'Madhabpur', 'মাধবপুর', NULL, '0000-00-00 00:00:00.00000'),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', NULL, '0000-00-00 00:00:00.00000'),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', NULL, '0000-00-00 00:00:00.00000'),
(303, 39, 'Chhatak', 'ছাতক', NULL, '0000-00-00 00:00:00.00000'),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', NULL, '0000-00-00 00:00:00.00000'),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', NULL, '0000-00-00 00:00:00.00000'),
(306, 39, 'Tahirpur', 'তাহিরপুর', NULL, '0000-00-00 00:00:00.00000'),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', NULL, '0000-00-00 00:00:00.00000'),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(309, 39, 'Shalla', 'শাল্লা', NULL, '0000-00-00 00:00:00.00000'),
(310, 39, 'Derai', 'দিরাই', NULL, '0000-00-00 00:00:00.00000'),
(311, 40, 'Belabo', 'বেলাবো', NULL, '0000-00-00 00:00:00.00000'),
(312, 40, 'Monohardi', 'মনোহরদী', NULL, '0000-00-00 00:00:00.00000'),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', NULL, '0000-00-00 00:00:00.00000'),
(314, 40, 'Palash', 'পলাশ', NULL, '0000-00-00 00:00:00.00000'),
(315, 40, 'Raipura', 'রায়পুরা', NULL, '0000-00-00 00:00:00.00000'),
(316, 40, 'Shibpur', 'শিবপুর', NULL, '0000-00-00 00:00:00.00000'),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', NULL, '0000-00-00 00:00:00.00000'),
(319, 41, 'Kapasia', 'কাপাসিয়া', NULL, '0000-00-00 00:00:00.00000'),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(321, 41, 'Sreepur', 'শ্রীপুর', NULL, '0000-00-00 00:00:00.00000'),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(323, 42, 'Naria', 'নড়িয়া', NULL, '0000-00-00 00:00:00.00000'),
(324, 42, 'Zajira', 'জাজিরা', NULL, '0000-00-00 00:00:00.00000'),
(325, 42, 'Gosairhat', 'গোসাইরহাট', NULL, '0000-00-00 00:00:00.00000'),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(327, 42, 'Damudya', 'ডামুড্যা', NULL, '0000-00-00 00:00:00.00000'),
(328, 43, 'Araihazar', 'আড়াইহাজার', NULL, '0000-00-00 00:00:00.00000'),
(329, 43, 'Bandar', 'বন্দর', NULL, '0000-00-00 00:00:00.00000'),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', NULL, '0000-00-00 00:00:00.00000'),
(331, 43, 'Rupganj', 'রূপগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(332, 43, 'Sonargaon', 'সোনারগাঁ', NULL, '0000-00-00 00:00:00.00000'),
(333, 44, 'Basail', 'বাসাইল', NULL, '0000-00-00 00:00:00.00000'),
(334, 44, 'Bhuapur', 'ভুয়াপুর', NULL, '0000-00-00 00:00:00.00000'),
(335, 44, 'Delduar', 'দেলদুয়ার', NULL, '0000-00-00 00:00:00.00000'),
(336, 44, 'Ghatail', 'ঘাটাইল', NULL, '0000-00-00 00:00:00.00000'),
(337, 44, 'Gopalpur', 'গোপালপুর', NULL, '0000-00-00 00:00:00.00000'),
(338, 44, 'Madhupur', 'মধুপুর', NULL, '0000-00-00 00:00:00.00000'),
(339, 44, 'Mirzapur', 'মির্জাপুর', NULL, '0000-00-00 00:00:00.00000'),
(340, 44, 'Nagarpur', 'নাগরপুর', NULL, '0000-00-00 00:00:00.00000'),
(341, 44, 'Sakhipur', 'সখিপুর', NULL, '0000-00-00 00:00:00.00000'),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', NULL, '0000-00-00 00:00:00.00000'),
(343, 44, 'Kalihati', 'কালিহাতী', NULL, '0000-00-00 00:00:00.00000'),
(344, 44, 'Dhanbari', 'ধনবাড়ী', NULL, '0000-00-00 00:00:00.00000'),
(345, 45, 'Itna', 'ইটনা', NULL, '0000-00-00 00:00:00.00000'),
(346, 45, 'Katiadi', 'কটিয়াদী', NULL, '0000-00-00 00:00:00.00000'),
(347, 45, 'Bhairab', 'ভৈরব', NULL, '0000-00-00 00:00:00.00000'),
(348, 45, 'Tarail', 'তাড়াইল', NULL, '0000-00-00 00:00:00.00000'),
(349, 45, 'Hossainpur', 'হোসেনপুর', NULL, '0000-00-00 00:00:00.00000'),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', NULL, '0000-00-00 00:00:00.00000'),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', NULL, '0000-00-00 00:00:00.00000'),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', NULL, '0000-00-00 00:00:00.00000'),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(354, 45, 'Bajitpur', 'বাজিতপুর', NULL, '0000-00-00 00:00:00.00000'),
(355, 45, 'Austagram', 'অষ্টগ্রাম', NULL, '0000-00-00 00:00:00.00000'),
(356, 45, 'Mithamoin', 'মিঠামইন', NULL, '0000-00-00 00:00:00.00000'),
(357, 45, 'Nikli', 'নিকলী', NULL, '0000-00-00 00:00:00.00000'),
(358, 46, 'Harirampur', 'হরিরামপুর', NULL, '0000-00-00 00:00:00.00000'),
(359, 46, 'Saturia', 'সাটুরিয়া', NULL, '0000-00-00 00:00:00.00000'),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', NULL, '0000-00-00 00:00:00.00000'),
(361, 46, 'Gior', 'ঘিওর', NULL, '0000-00-00 00:00:00.00000'),
(362, 46, 'Shibaloy', 'শিবালয়', NULL, '0000-00-00 00:00:00.00000'),
(363, 46, 'Doulatpur', 'দৌলতপুর', NULL, '0000-00-00 00:00:00.00000'),
(364, 46, 'Singiar', 'সিংগাইর', NULL, '0000-00-00 00:00:00.00000'),
(365, 47, 'Savar', 'সাভার', NULL, '0000-00-00 00:00:00.00000'),
(366, 47, 'Dhamrai', 'ধামরাই', NULL, '0000-00-00 00:00:00.00000'),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(369, 47, 'Dohar', 'দোহার', NULL, '0000-00-00 00:00:00.00000'),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', NULL, '0000-00-00 00:00:00.00000'),
(371, 48, 'Sreenagar', 'শ্রীনগর', NULL, '0000-00-00 00:00:00.00000'),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', NULL, '0000-00-00 00:00:00.00000'),
(373, 48, 'Louhajanj', 'লৌহজং', NULL, '0000-00-00 00:00:00.00000'),
(374, 48, 'Gajaria', 'গজারিয়া', NULL, '0000-00-00 00:00:00.00000'),
(375, 48, 'Tongibari', 'টংগীবাড়ি', NULL, '0000-00-00 00:00:00.00000'),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', NULL, '0000-00-00 00:00:00.00000'),
(377, 49, 'Goalanda', 'গোয়ালন্দ', NULL, '0000-00-00 00:00:00.00000'),
(378, 49, 'Pangsa', 'পাংশা', NULL, '0000-00-00 00:00:00.00000'),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', NULL, '0000-00-00 00:00:00.00000'),
(380, 49, 'Kalukhali', 'কালুখালী', NULL, '0000-00-00 00:00:00.00000'),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(382, 50, 'Shibchar', 'শিবচর', NULL, '0000-00-00 00:00:00.00000'),
(383, 50, 'Kalkini', 'কালকিনি', NULL, '0000-00-00 00:00:00.00000'),
(384, 50, 'Rajoir', 'রাজৈর', NULL, '0000-00-00 00:00:00.00000'),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', NULL, '0000-00-00 00:00:00.00000'),
(386, 51, 'Kashiani', 'কাশিয়ানী', NULL, '0000-00-00 00:00:00.00000'),
(387, 51, 'Tungipara', 'টুংগীপাড়া', NULL, '0000-00-00 00:00:00.00000'),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', NULL, '0000-00-00 00:00:00.00000'),
(389, 51, 'Muksudpur', 'মুকসুদপুর', NULL, '0000-00-00 00:00:00.00000'),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', NULL, '0000-00-00 00:00:00.00000'),
(392, 52, 'Boalmari', 'বোয়ালমারী', NULL, '0000-00-00 00:00:00.00000'),
(393, 52, 'Sadarpur', 'সদরপুর', NULL, '0000-00-00 00:00:00.00000'),
(394, 52, 'Nagarkanda', 'নগরকান্দা', NULL, '0000-00-00 00:00:00.00000'),
(395, 52, 'Bhanga', 'ভাঙ্গা', NULL, '0000-00-00 00:00:00.00000'),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', NULL, '0000-00-00 00:00:00.00000'),
(397, 52, 'Madhukhali', 'মধুখালী', NULL, '0000-00-00 00:00:00.00000'),
(398, 52, 'Saltha', 'সালথা', NULL, '0000-00-00 00:00:00.00000'),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', NULL, '0000-00-00 00:00:00.00000'),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(401, 53, 'Boda', 'বোদা', NULL, '0000-00-00 00:00:00.00000'),
(402, 53, 'Atwari', 'আটোয়ারী', NULL, '0000-00-00 00:00:00.00000'),
(403, 53, 'Tetulia', 'তেতুলিয়া', NULL, '0000-00-00 00:00:00.00000'),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(405, 54, 'Birganj', 'বীরগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', NULL, '0000-00-00 00:00:00.00000'),
(407, 54, 'Birampur', 'বিরামপুর', NULL, '0000-00-00 00:00:00.00000'),
(408, 54, 'Parbatipur', 'পার্বতীপুর', NULL, '0000-00-00 00:00:00.00000'),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(410, 54, 'Kaharol', 'কাহারোল', NULL, '0000-00-00 00:00:00.00000'),
(411, 54, 'Fulbari', 'ফুলবাড়ী', NULL, '0000-00-00 00:00:00.00000'),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(413, 54, 'Hakimpur', 'হাকিমপুর', NULL, '0000-00-00 00:00:00.00000'),
(414, 54, 'Khansama', 'খানসামা', NULL, '0000-00-00 00:00:00.00000'),
(415, 54, 'Birol', 'বিরল', NULL, '0000-00-00 00:00:00.00000'),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', NULL, '0000-00-00 00:00:00.00000'),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', NULL, '0000-00-00 00:00:00.00000'),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', NULL, '0000-00-00 00:00:00.00000'),
(420, 55, 'Patgram', 'পাটগ্রাম', NULL, '0000-00-00 00:00:00.00000'),
(421, 55, 'Aditmari', 'আদিতমারী', NULL, '0000-00-00 00:00:00.00000'),
(422, 56, 'Syedpur', 'সৈয়দপুর', NULL, '0000-00-00 00:00:00.00000'),
(423, 56, 'Domar', 'ডোমার', NULL, '0000-00-00 00:00:00.00000'),
(424, 56, 'Dimla', 'ডিমলা', NULL, '0000-00-00 00:00:00.00000'),
(425, 56, 'Jaldhaka', 'জলঢাকা', NULL, '0000-00-00 00:00:00.00000'),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', NULL, '0000-00-00 00:00:00.00000'),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', NULL, '0000-00-00 00:00:00.00000'),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', NULL, '0000-00-00 00:00:00.00000'),
(430, 57, 'Palashbari', 'পলাশবাড়ী', NULL, '0000-00-00 00:00:00.00000'),
(431, 57, 'Saghata', 'সাঘাটা', NULL, '0000-00-00 00:00:00.00000'),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(434, 57, 'Phulchari', 'ফুলছড়ি', NULL, '0000-00-00 00:00:00.00000'),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', NULL, '0000-00-00 00:00:00.00000'),
(436, 58, 'Pirganj', 'পীরগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', NULL, '0000-00-00 00:00:00.00000'),
(438, 58, 'Haripur', 'হরিপুর', NULL, '0000-00-00 00:00:00.00000'),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', NULL, '0000-00-00 00:00:00.00000'),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(441, 59, 'Gangachara', 'গংগাচড়া', NULL, '0000-00-00 00:00:00.00000'),
(442, 59, 'Taragonj', 'তারাগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(443, 59, 'Badargonj', 'বদরগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', NULL, '0000-00-00 00:00:00.00000'),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(446, 59, 'Kaunia', 'কাউনিয়া', NULL, '0000-00-00 00:00:00.00000'),
(447, 59, 'Pirgacha', 'পীরগাছা', NULL, '0000-00-00 00:00:00.00000'),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', NULL, '0000-00-00 00:00:00.00000'),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', NULL, '0000-00-00 00:00:00.00000'),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', NULL, '0000-00-00 00:00:00.00000'),
(451, 60, 'Phulbari', 'ফুলবাড়ী', NULL, '0000-00-00 00:00:00.00000'),
(452, 60, 'Rajarhat', 'রাজারহাট', NULL, '0000-00-00 00:00:00.00000'),
(453, 60, 'Ulipur', 'উলিপুর', NULL, '0000-00-00 00:00:00.00000'),
(454, 60, 'Chilmari', 'চিলমারী', NULL, '0000-00-00 00:00:00.00000'),
(455, 60, 'Rowmari', 'রৌমারী', NULL, '0000-00-00 00:00:00.00000'),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', NULL, '0000-00-00 00:00:00.00000'),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', NULL, '0000-00-00 00:00:00.00000'),
(459, 61, 'Sreebordi', 'শ্রীবরদী', NULL, '0000-00-00 00:00:00.00000'),
(460, 61, 'Nokla', 'নকলা', NULL, '0000-00-00 00:00:00.00000'),
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', NULL, '0000-00-00 00:00:00.00000'),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', NULL, '0000-00-00 00:00:00.00000'),
(463, 62, 'Trishal', 'ত্রিশাল', NULL, '0000-00-00 00:00:00.00000'),
(464, 62, 'Bhaluka', 'ভালুকা', NULL, '0000-00-00 00:00:00.00000'),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', NULL, '0000-00-00 00:00:00.00000'),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', NULL, '0000-00-00 00:00:00.00000'),
(467, 62, 'Dhobaura', 'ধোবাউড়া', NULL, '0000-00-00 00:00:00.00000'),
(468, 62, 'Phulpur', 'ফুলপুর', NULL, '0000-00-00 00:00:00.00000'),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', NULL, '0000-00-00 00:00:00.00000'),
(470, 62, 'Gouripur', 'গৌরীপুর', NULL, '0000-00-00 00:00:00.00000'),
(471, 62, 'Gafargaon', 'গফরগাঁও', NULL, '0000-00-00 00:00:00.00000'),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(473, 62, 'Nandail', 'নান্দাইল', NULL, '0000-00-00 00:00:00.00000'),
(474, 62, 'Tarakanda', 'তারাকান্দা', NULL, '0000-00-00 00:00:00.00000'),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', NULL, '0000-00-00 00:00:00.00000'),
(476, 63, 'Melandah', 'মেলান্দহ', NULL, '0000-00-00 00:00:00.00000'),
(477, 63, 'Islampur', 'ইসলামপুর', NULL, '0000-00-00 00:00:00.00000'),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', NULL, '0000-00-00 00:00:00.00000'),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(482, 64, 'Barhatta', 'বারহাট্টা', NULL, '0000-00-00 00:00:00.00000'),
(483, 64, 'Durgapur', 'দুর্গাপুর', NULL, '0000-00-00 00:00:00.00000'),
(484, 64, 'Kendua', 'কেন্দুয়া', NULL, '0000-00-00 00:00:00.00000'),
(485, 64, 'Atpara', 'আটপাড়া', NULL, '0000-00-00 00:00:00.00000'),
(486, 64, 'Madan', 'মদন', NULL, '0000-00-00 00:00:00.00000'),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', NULL, '0000-00-00 00:00:00.00000'),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', NULL, '0000-00-00 00:00:00.00000'),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', NULL, '0000-00-00 00:00:00.00000'),
(490, 64, 'Purbadhala', 'পূর্বধলা', NULL, '0000-00-00 00:00:00.00000'),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', NULL, '0000-00-00 00:00:00.00000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_status` int(191) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `email`, `mobile`, `image`, `email_verified_at`, `password`, `token`, `online_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Demo', NULL, 'demo@gmail.com', '01889967514', NULL, NULL, '$2y$10$eJoNwTCJHBhj.6Uu0tKjCu/8GMgXJclHgIScn2AwxeDwqSWQ5pZIC', NULL, 0, NULL, NULL, NULL),
(2, 'Raju', NULL, NULL, '01889967515', NULL, NULL, '$2y$10$RS9ofgBCV/Oet7INrIgsL.KUgNQrAqdMgNUN.YGjVvoWdfk/orTBu', NULL, 0, NULL, '2021-04-05 23:41:04', '2021-04-05 23:41:04'),
(3, 'Raju', NULL, NULL, '01889967516', NULL, NULL, '$2y$10$2sYxV74ZqBn4h4hNovpwDuKeRhNXgcQncm743dtnN6FkpNzIBirgW', NULL, 0, NULL, '2021-04-05 23:41:41', '2021-04-05 23:41:41'),
(4, 'Raju', NULL, NULL, '01889967517', NULL, NULL, '$2y$10$L1prMnmhQVlRdTyQK4zmGe1FA8ygIMgJWmpapXPiA1jL5SNR.FH/.', NULL, 1, NULL, '2021-04-05 23:42:05', '2021-04-06 09:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_facilities`
--
ALTER TABLE `shop_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_images`
--
ALTER TABLE `shop_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_facilities`
--
ALTER TABLE `shop_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_images`
--
ALTER TABLE `shop_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
