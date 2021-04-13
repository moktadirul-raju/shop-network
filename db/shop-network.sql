-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2021 at 05:09 PM
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
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `safety_tips` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `description`, `content`, `safety_tips`, `email`, `phone`, `website_link`, `facebook_link`, `youtube_link`, `google_plus_link`, `instagram_link`, `pinterest_link`, `twitter_link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Oobuk', '<p>Oobuk is a go-to marketplace app by Salteck LLC to sell your stuff and find the best offers on secondhand finds like used cars, secondhand electronics, and used video games! It is also the place for sellers to declutter your home, and make money selling used items that no longer serve you!</p>', 'Meet the seller in person and transfer cash only if you have secured the item. As a seller, ensure that you have secured your payment and safely exchanged your item.', 'Meet the seller in person and transfer cash only if you have secured the item. As a seller, ensure that you have secured your payment and safely exchanged your item.\r\n\r\nDo not transfer money in advance!', 'oobuk.info@gmail.com', '+12139096073', 'http://www.oobuk.com', 'https://www.facebook.com/Oobuk', 'https://www.youtube.com/channel/UCNnwPR9KCyzNTb_TbXi9bRA', 'https://www.google.com/', 'https://www.instagram.com/', 'https://pinterest.com/', 'https://twitter.com/', 'images/user/1618132754dff914e087a832ca535c5264cd883c34.jpg', NULL, '2021-04-11 03:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `mobile`, `image`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', 'b1_only_words_72_media_huge_thumbnail.jpg', 'images/user/161812186286b72a0b8fa545c4c1ecc2bf78d4960c.jpg', '$2y$10$w3mZ/2XzmFdDzZDeJlDfAuNwckAz9AneMeL7YinO9hqTTivWMvtee', NULL, '2021-04-11 00:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Great offer', '1618121207big-sale-special-offer-banner-template_7547-308.jpg', 0, '2021-04-11 00:06:47', '2021-04-11 00:06:47'),
(2, 'Great offer g', '1618121216cyber-monday-sale-special-offer-wide-banner-vector.jpg', 0, '2021-04-11 00:06:56', '2021-04-11 00:06:56'),
(3, 'Great offer g h', '1618121228maxresdefault.jpg', 0, '2021-04-11 00:07:08', '2021-04-11 00:07:08');

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
(1, 'Electronics', '2021-04-09 12:33:39', '2021-04-09 12:33:39'),
(2, 'Clothing', '2021-04-09 12:33:48', '2021-04-09 12:33:48'),
(3, 'Grocery', '2021-04-09 12:33:58', '2021-04-09 12:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Rangpur', '2021-04-11 12:42:39', '2021-04-11 12:43:28'),
(3, 2, 'Rajshahi', '2021-04-11 12:43:43', '2021-04-11 12:43:43'),
(4, 2, 'Dhaka', '2021-04-11 12:43:48', '2021-04-11 12:43:48'),
(5, 3, 'Siliguri', '2021-04-11 12:44:26', '2021-04-11 12:44:26'),
(6, 3, 'Jolpaiguri', '2021-04-11 12:44:35', '2021-04-11 12:44:35');

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
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `created_at`, `updated_at`) VALUES
(2, 'Bangladesh', '2021-04-11 12:35:47', '2021-04-11 12:35:47'),
(3, 'India', '2021-04-11 12:44:10', '2021-04-11 12:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency`, `created_at`, `updated_at`) VALUES
(1, 'BDT', NULL, NULL);

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
(1, 'Buy one get one', '2021-04-09 12:34:34', '2021-04-11 03:19:42'),
(2, 'Gift in limited product', '2021-04-09 12:34:52', '2021-04-09 12:34:52');

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
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fridays`
--

CREATE TABLE `fridays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Friday',
  `opening_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fridays`
--

INSERT INTO `fridays` (`id`, `shop_id`, `day`, `opening_status`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(1, 9, 'Friday', 'open', NULL, NULL, '2021-04-13 11:02:55', '2021-04-13 11:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `header_images`
--

CREATE TABLE `header_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_images`
--

INSERT INTO `header_images` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'images/banner/161814386486b72a0b8fa545c4c1ecc2bf78d4960c.jpg', '2021-04-11 06:24:24', '2021-04-11 06:24:24'),
(3, 'images/banner/1618143882dff914e087a832ca535c5264cd883c34.jpg', '2021-04-11 06:24:42', '2021-04-11 06:24:42'),
(4, 'images/banner/16181438922a622634cb8c7b4bb8ef90957d1499f3.jpg', '2021-04-11 06:24:53', '2021-04-11 06:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `in_app_purchases`
--

CREATE TABLE `in_app_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `in_app_purchases`
--

INSERT INTO `in_app_purchases` (`id`, `product_id`, `day`, `description`, `type`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'promo_7_dayf', '7f', 'promo_7_dayf', 'Ios', '1', '2021-04-11 10:56:32', '2021-04-11 11:12:55'),
(2, 'promo_7_day', '7', 'Description', 'Android', '1', '2021-04-11 10:56:52', '2021-04-11 11:11:36');

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
(5, '2021_04_05_162317_create_shops_table', 1),
(6, '2021_04_05_162355_create_wishlists_table', 1),
(7, '2021_04_05_162415_create_comments_table', 1),
(8, '2021_04_05_162444_create_reviews_table', 1),
(9, '2021_04_05_163007_create_notifications_table', 1),
(10, '2021_04_05_163135_create_facilities_table', 1),
(11, '2021_04_05_163218_create_categories_table', 1),
(12, '2021_04_06_065621_create_shop_images_table', 1),
(13, '2021_04_06_065702_create_shop_facilities_table', 1),
(14, '2021_04_08_052324_create_banners_table', 1),
(15, '2021_04_08_125532_create_follows_table', 1),
(16, '2021_04_09_141014_create_paypal_infos_table', 1),
(17, '2021_04_11_062213_create_popular_locations_table', 2),
(18, '2021_04_11_075415_create_abouts_table', 3),
(19, '2021_04_11_080103_create_policies_table', 4),
(20, '2021_04_11_115451_create_header_images_table', 5),
(21, '2021_04_11_154155_create_in_app_purchases_table', 6),
(22, '2021_04_11_181226_create_countries_table', 7),
(23, '2021_04_11_181239_create_cities_table', 7),
(24, '2021_04_11_184500_create_currencies_table', 8),
(39, '2021_04_12_074522_create_saturdays_table', 9),
(40, '2021_04_12_074543_create_sundays_table', 9),
(41, '2021_04_12_074623_create_mondays_table', 9),
(42, '2021_04_12_074644_create_tuesdays_table', 9),
(43, '2021_04_12_074718_create_wednesdays_table', 9),
(44, '2021_04_12_074745_create_thursdays_table', 9),
(45, '2021_04_12_074757_create_fridays_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `mondays`
--

CREATE TABLE `mondays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Monday',
  `opening_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mondays`
--

INSERT INTO `mondays` (`id`, `shop_id`, `day`, `opening_status`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(1, 9, 'Monday', 'open', NULL, NULL, '2021-04-13 11:02:55', '2021-04-13 11:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `paypal_infos`
--

CREATE TABLE `paypal_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `environment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paypal_enabled` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_infos`
--

INSERT INTO `paypal_infos` (`id`, `environment`, `public_key`, `merchant_id`, `private_key`, `paypal_enabled`, `created_at`, `updated_at`) VALUES
(1, 'sandbox', '256y6grqr936tpjf', 'h6ggypvjgt4tzz2k', '0d6aadf4b586a84844ceadc834dc851f', 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `content`, `url`, `created_at`, `updated_at`) VALUES
(1, '<h1><em><strong>Privacy Policy LAST UPDATED: 2020-09-23</strong></em></h1>\r\n\r\n<p>Oobuk by Salteck LLc and its subsidiaries (hereinafter, &ldquo;oobuk,&rdquo; &ldquo;us,&rdquo; or &ldquo;we&rdquo;) respects your privacy and is committed to helping you understand what data we collect, why we collect it, and what we do with it. Please, take time to read the Privacy Policy carefully. By providing personal information to us, you agree to this Privacy Policy. 1. Services covered by this Policy: We currently operate the Oobuk mobile application (the &ldquo;App&rdquo;), as well as the website www.oobuk.com (the &ldquo;Website&rdquo; and, together with the App, the &ldquo;Services&rdquo;). This Privacy Policy covers your use of the Services. 2. What personal information we collect from you: 2.1. We and our service providers may collect personal information from you through the Services in the ways discussed in this Policy. This information may include your name, email address, mailing address, birthday, gender and photos. We may also receive your personal information from other sources, such as public databases, joint marketing partners, social media platforms (including from people with whom you are friends or otherwise connected) and from other third parties. You can use our App and visit our Website without providing personal information. However, we may need to collect personal information in order to provide certain Services. If you refuse to provide your personal information when required, we may not be able to provide certain Services (such as marking your account as &ldquo;verified&rdquo;). You also may be able to purchase certain features, from Oobuk, in connection with the Services. If you do so, we may use the personal information we collect to provide services to you in connection with any such purchase. If you submit any personal information relating to other people to us or to our service providers in connection with the Services, you represent that you have the authority to do so and to permit us to use the information in accordance with this Privacy Policy. 2.2. We may collect the physical location of your device in order to record and publish information on your position and to show you products offered by users close to you. Oobuk may collect this information by, for example, using satellite, cell phone tower or WiFi signals. You may allow or deny such collection and publication of your device&rsquo;s location, but it may affect your use of the Services (for example, by not allowing us to post your product for sale in a determined geographic location). 2.3 We may also use any ad you post on Oobuk, including the uploaded photo or image of the product as well as other data (including user name and location) associated with the ad, for our own advertising purposes, including social media, Facebook ads, newsletters and ads for any media. 2.4. We may disclose the personal information we collect from you to our affiliates for the purposes described in this Privacy Policy; to our service providers who provide services such as website hosting, data analysis, payment processing, order fulfillment, information technology and related infrastructure provision, customer service, email delivery, auditing and other services; and to a third party in the event of any reorganization, merger, sale, joint venture, assignment, transfer or other disposition of all or any portion of our business, assets or stock. 2.5 We may use or disclose the personal information we collect from you as we believe necessary or appropriate, including, but not limited to, using and disclosing personal information for the following purposes: to protect people or property, to protect our services, rights or property, to comply with legal requirements, to respond to legal process or law enforcement requests and to comply with requests from other public and government authorities. 2.6 We may aggregate personal information, which when aggregated does not personally identify you or any other user of the Services. For example, we may aggregate personal information to calculate the percentage of our users who have a particular zip code. 3. Memberships and Registration: 3.1. To use certain Services you will need to register, either by providing us your e-mail address or your social media account. We may also collect information including phone number, birthday, and gender as well as information about your preferences (such as your preferred method of communication). In case you choose to register using a social media account, you authorize us to access and use certain information depending on the privacy settings that you have selected in the social network. Examples of personal information that we compile and use include your basic account information (e.g. name, email address, gender, birthday, current city, profile picture, user ID, list of friends, etc.) and any other additional information or activities that you permit the third party social network to share. 3.2. We may require you to provide us information such as a profile picture, name and surname, user name and email address for purposes of making available that information on the App and on the Website. You may visit some areas of the Services as a guest, but you may not be able to access all the content and features of those areas without registering. 4. Public information: 4.1. Please note that any information you post on the Services will become public and may be available to other users and the general public. We urge you to be very careful when deciding what information to disclose through the Services. 4.2. Please note that your user name and your profile picture will be made available to the public when you participate in some Services, such as publishing products, so you should exercise discretion when using the Services. Personal information posted by you or disclosed by you to other users may be collected by other users of such Services and may result in unsolicited messages. We are not responsible for protecting such information that you may disclose to third parties through our Services (e.g. sending your telephone number to another user through the Services). 5. Email Newsletters and Push Notifications: Where permitted by applicable law, we may contact you and/or send to you commercial communications via electronic communications, such as email, to inform about our products, services, offers, or any commercial content related to the company. If you do not want to receive marketing emails from us, you can always opt-out by following the unsubscribe instructions provided in such emails. Please note that even if you opt-out from receiving commercial communications, you may still receive administrative communications from Oobuk, such as transaction confirmations, notifications about your account activities (e.g. account confirmations, password changes, etc.), and any other important announcements. We may also send you push notifications if you have opted-in to receive them. You can disable push notifications in your mobile device&rsquo;s settings. 6. What non-personal information we collect from you: 6.1. In many cases, we will automatically collect certain non-personal information about your use of the Services. We collect this information to ensure that the Services function properly. We might collect, among other things, information about your browser or device, app usage data, information through cookies, pixel tags and other technologies, and aggregated information. This information may include: App usage data, such as the date and time the App on your device accesses our servers and what information and files have been downloaded to the App based on your device number. We may also, on some versions of the App, collect information about other applications that you may have on your device (but not about the contents of those applications). We may also collect information collected automatically through your browser or device, or through the App when you download and use it. We may collect Media Access Control (MAC) address, computer type (Windows or Macintosh), screen resolution, device manufacturer and model, language, Internet browser type and version and the name and version of the Services (such as the App) you are using. the operating system you are using, the domain name of your Internet service provider and your &ldquo;click path&rdquo; through the Sites or the App; IP address, which we may use for purposes such as calculating usage levels, diagnosing server problems and administering the Services. We may also derive your approximate location from your IP address; 6.2. To do this, Oobuk may use cookies and other technology, as described in the following section. 6.3. We may also collect non-personal information when you voluntarily provide it, such as your preferred method of communication. 6.4 We may aggregate personal information, which when aggregated does not personally identify you or any other user of the Services. For example, we may aggregate personal information to calculate the percentage of our users who have a particular zip code. We may use and disclose aggregated personal information for any purpose, except where we are required to do otherwise under applicable law. 6.5. We may use and disclose non-personal information for any purpose, except where we are required to do otherwise under applicable law. In some instances, we may combine this information with personal information. For example, if you have created an account with our Services, your account information may be linked to the items you purchased (i.e., purchase order history). If we do, we will treat the combined information as personal information as long as it is combined. 7. Information on cookies and related technology: 7.1. Oobuk Services may contain &ldquo;cookies.&rdquo; We may use cookies to manage our users&rsquo; sessions and to store preferences, tracking information, and language selection. Cookies may be used whether you register with us or not. &ldquo;Cookies&rdquo; are small text files transferred by a web server to your hard drive and thereafter stored on your computer. The types of information a cookie collects include the date and time you visited, your browsing history and your preferences. We may use the information collected through cookies to promote, highlight, or otherwise feature certain items in connection with your use of the Services. We may use the responses to these promoted or featured items, or your search queries and results, to customize the Services to you. Typically, you can configure your browser to not accept cookies. You may also wish to refer to www.allaboutcookies.org/manage-cookies/. However, declining the use of cookies may limit your access to certain features of the Website. For example, you may have difficulty logging in or using certain interactive features of the Website, such as the Oobuk Forum or Comments feature. 7.2. Analytics We use Google Analytics, which uses cookies and similar technologies to collect and analyze information about use of the Services and report on activities and trends. This service may also collect information regarding the use of other websites, apps and online resources. You can learn about Google&rsquo;s practices by going to https://www.google.com/policies/privacy/partners/, and opt out of them by downloading the Google Analytics opt-out browser add-on, available at https://tools.google.com/dlpage/gaoptout. 8. How you may access, delete or change the information you have provided to us: 8.1. You can exercise your rights to access, rectify, erase and object the processing of your personal information at any time by sending a written request to Oobuk&rsquo;s mailing address, 4445 Corporation Ln Virginia Beach, VA, or to the following e-mail address: privacy@oobuk.com. 8.2. In order to properly attend your request, please make clear what personal information you are writing about. For your protection, we may only respond to requests for the personal information associated with the email address you use to send us your request, and we may need to verify your identity before implementing your request. We will try to comply with your request as soon as we can, but we may need to retain certain information for our recordkeeping purposes and there may also be residual information that will remain within our databases and other records, which will not be removed. 9. Our commitment to secure the personal information we have collected: We seek to use reasonable organizational, technical and administrative measures to protect personal information within our organization. No website or Internet transmission is, however, completely secure. Consequently, Oobuk cannot guarantee that unauthorized access, hacking, data loss, or other breaches will never occur. Your use of the App and Services is at your own risk. Oobuk urges you to take steps to keep your personal information safe by memorizing your password or keeping it in a safe place. If you have reason to believe that your interaction with us is no longer secure (for example, if you feel that the security of your account has been compromised), please immediately notify us in accordance with the &ldquo;Contacting Us&rdquo; section below. 10. Third parties: This Privacy Policy does not address, and Oobuk is not responsible for, the privacy, information or other practices of any third parties, including any third party operating any site or service to which the Services link. We also may use a third-party payment service to process payments made through the Services. If you wish to make a payment through the Services, your personal information may be collected by such third party and not by us, and will be subject to the third party&rsquo;s privacy policy, rather than this Privacy Policy. We have no control over, and are not responsible for, this third party&rsquo;s collection, use and disclosure of your Personal Information. 11. Retention period: We will retain your Personal Information for the period necessary to fulfill the purposes outlined in this Privacy Policy unless a longer retention period is required or permitted by law. 12. Use of Oobuk by minors: The Services are not directed to individuals under the age of thirteen (13), and we request that they not provide personal information through the Services. 13. Transfer of your personal information: We and our affiliates and service providers may transfer, store and/or process your personal information outside of your country of residence. These countries may have data protection rules that are different from those of your country. For example, Oobuk has an office in USA, and our employees in Spain may review and analyze your personal information in connection with the Services. By accepting this Privacy Policy, you agree to such transferring, storing and/or processing of personal information. 14. Notice of changes to the Policy: Oobuk reserves the right to modify this Policy at any time by notifying registered users via e-mail or the App of the existence of a new Policy and/or posting the new Policy on the Services. All changes to the Policy will be effective when posted, and your continued use of any Oobuk Services after the posting will constitute your acceptance of, and agreement to be bound by, those changes. 15. Contacting Us: If you have any questions or comments regarding this Policy, please contact us by email at privacy@Oobuk.com or by mail at 4445 Corporation Ln Virginia Beach, VA. Please do not send sensitive information to us by email, since email communications are not always secure.</p>', 'http://www.oobuk.com/admin/index.php/privacy_policy', NULL, '2021-04-11 02:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `popular_locations`
--

CREATE TABLE `popular_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popular_locations`
--

INSERT INTO `popular_locations` (`id`, `location_name`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Dhaka', '161813279386b72a0b8fa545c4c1ecc2bf78d4960c.jpg', '2021-04-11 03:19:53', '2021-04-11 03:19:53');

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
-- Table structure for table `saturdays`
--

CREATE TABLE `saturdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Saturday',
  `opening_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saturdays`
--

INSERT INTO `saturdays` (`id`, `shop_id`, `day`, `opening_status`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(1, 9, 'Saturday', 'open', NULL, NULL, '2021-04-13 11:02:55', '2021-04-13 11:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `established_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` text COLLATE utf8mb4_unicode_ci,
  `additional_address` text COLLATE utf8mb4_unicode_ci,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_id` int(191) DEFAULT NULL,
  `min_price` double(8,2) DEFAULT NULL,
  `max_price` double(8,2) DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_qrcode_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_qrcode_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_status` int(11) NOT NULL DEFAULT '0',
  `view_count` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `added_by`, `user_id`, `category_id`, `title`, `established_date`, `country_id`, `city`, `street_address`, `additional_address`, `zip_code`, `phone`, `fax`, `email`, `website`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `youtube_link`, `description`, `currency_id`, `min_price`, `max_price`, `discount`, `discount_qrcode_link`, `discount_qrcode_image`, `lat`, `lan`, `approve_status`, `view_count`, `created_at`, `updated_at`) VALUES
(6, NULL, 5, '2', 'Jara fashion', '12-02-18', '3', 'Rangpur', 'jahazcompany mor', 'jahazcompany mor', '5400', '123456987', '32644', 'fashion@shop.com', 'www.fashon.com', 'www.fashon.com', 'www.fashon.com', 'www.fashon.com', 'www.fashon.com', 'youtube.com', 'www.fashon.com', 1, 350.00, 3000.00, '10%', 'http://koiva.mkraju.com/5/10%', 'images/qrcode/01889967515.jpg', '26544', '5454', 0, '0', '2021-04-10 23:59:22', '2021-04-10 23:59:22'),
(7, 'admin', 9, '3', 'Day Wise Check', '16/04/2021', '2', 'Rangpur', 'Rangpur', 'rangpur', '5452', '01889967519', '65695959', '01889967519@mail.com', '01889967519.com', 'facebook.com', 'twittr.com', 'instagram.com', 'linkedin.com', 'youtube.com', '01889967519', 1, 600.00, 6000.00, '15%', 'http://koiva.mkraju.com/9/15%', 'images/qrcode/b1_only_words_72_media_huge_thumbnail.jpg.jpg', NULL, NULL, 0, '0', '2021-04-12 02:51:07', '2021-04-12 02:51:07'),
(8, 'admin', 8, '2', 'check day', '16/03/2021', '2', 'Rangpur', 'Rangpur', 'rangpur', '5452', '01889967518', '65695959', '01889967518@mail.com', '01889967518.com', 'facebook.com', 'twittr.com', 'instagram.com', 'linkedin.com', 'youtube.com', '01889967518', 1, 600.00, 5885.00, '15%', 'http://koiva.mkraju.com/8/15%', 'images/qrcode/b1_only_words_72_media_huge_thumbnail.jpg.jpg', '465464', '6546546', 0, '0', '2021-04-12 03:04:58', '2021-04-12 03:04:58'),
(9, 'admin', 7, '1', 'check day 2', '09/03/2021', '3', 'Jolpaiguri', 'dhaka', 'dhaka', '5895', '01889967517', '01889967517', '01889967517@mail.com', '01889967517.com', 'facebook.com', 'twittr.com', 'instagram.com', 'linkedin.com', 'youtube.com', '0188996751701889967517', 1, 1000.00, 10000.00, '20%', 'http://koiva.mkraju.com/7/20%', 'images/qrcode/b1_only_words_72_media_huge_thumbnail.jpg.jpg', '465464', '6546546', 0, '0', '2021-04-12 03:11:38', '2021-04-13 11:03:54'),
(10, 'admin', 6, '1', 'check day 3', '07/03/2021', '2', 'Rangpur', 'Rangpur', 'rangpur', '5452', '01889967516', '01889967516', '01889967516@mail.com', '01889967516.com', 'facebook.com', 'twittr.com', 'instagram.com', 'linkedin.com', 'youtube.com', '018899675160188996751601889967516', 1, 520.00, 5698.00, '25%', 'http://koiva.mkraju.com/6/25%', 'images/qrcode/b1_only_words_72_media_huge_thumbnail.jpg.jpg', '465464', '6546546', 0, '0', '2021-04-12 03:25:25', '2021-04-12 03:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `shop_facilities`
--

CREATE TABLE `shop_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `facility_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_facilities`
--

INSERT INTO `shop_facilities` (`id`, `shop_id`, `facility_id`, `created_at`, `updated_at`) VALUES
(3, 2, '1', '2021-04-10 22:44:55', '2021-04-10 22:44:55'),
(4, 1, '5', '2021-04-10 23:58:28', '2021-04-10 23:58:28'),
(5, 2, '5', '2021-04-10 23:58:28', '2021-04-10 23:58:28'),
(6, 1, '6', '2021-04-10 23:59:22', '2021-04-10 23:59:22'),
(7, 2, '6', '2021-04-10 23:59:22', '2021-04-10 23:59:22'),
(8, 1, '7', '2021-04-12 02:51:07', '2021-04-12 02:51:07'),
(9, 2, '7', '2021-04-12 02:51:07', '2021-04-12 02:51:07'),
(10, 1, '8', '2021-04-12 03:04:58', '2021-04-12 03:04:58'),
(11, 2, '8', '2021-04-12 03:04:58', '2021-04-12 03:04:58'),
(12, 1, '9', '2021-04-12 03:11:38', '2021-04-12 03:11:38'),
(13, 2, '9', '2021-04-12 03:11:38', '2021-04-12 03:11:38'),
(14, 1, '10', '2021-04-12 03:25:25', '2021-04-12 03:25:25'),
(15, 2, '10', '2021-04-12 03:25:25', '2021-04-12 03:25:25');

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

--
-- Dumping data for table `shop_images`
--

INSERT INTO `shop_images` (`id`, `shop_id`, `image`, `created_at`, `updated_at`) VALUES
(14, 6, 'images/shop/1618120762pexels-photo-264636.jpeg', '2021-04-10 23:59:22', '2021-04-10 23:59:22'),
(15, 6, 'images/shop/1618120762shopping-cart-supermarket-empty-shelves-40320116.jpg', '2021-04-10 23:59:22', '2021-04-10 23:59:22'),
(16, 7, 'images/shop/1618217467gettyimages-1141999659-612x612.jpg', '2021-04-12 02:51:07', '2021-04-12 02:51:07'),
(17, 7, 'images/shop/1618217467pexels-photo-264636.jpeg', '2021-04-12 02:51:07', '2021-04-12 02:51:07'),
(18, 7, 'images/shop/1618217467photo-1534723452862-4c874018d66d.jpg', '2021-04-12 02:51:08', '2021-04-12 02:51:08'),
(19, 8, 'images/shop/1618218298photo-1534723452862-4c874018d66d.jpg', '2021-04-12 03:04:58', '2021-04-12 03:04:58'),
(20, 8, 'images/shop/1618218298photo-1540340061722-9293d5163008.jpg', '2021-04-12 03:04:58', '2021-04-12 03:04:58'),
(21, 8, 'images/shop/1618218298shopping-cart-supermarket-empty-shelves-40320116.jpg', '2021-04-12 03:04:58', '2021-04-12 03:04:58'),
(22, 9, 'images/shop/1618218699pexels-photo-264636.jpeg', '2021-04-12 03:11:39', '2021-04-12 03:11:39'),
(23, 9, 'images/shop/1618218699photo-1534723452862-4c874018d66d.jpg', '2021-04-12 03:11:39', '2021-04-12 03:11:39'),
(24, 9, 'images/shop/1618218699photo-1540340061722-9293d5163008.jpg', '2021-04-12 03:11:39', '2021-04-12 03:11:39'),
(25, 9, 'images/shop/1618218699shopping-cart-supermarket-empty-shelves-40320116.jpg', '2021-04-12 03:11:39', '2021-04-12 03:11:39'),
(26, 10, 'images/shop/1618219525gettyimages-1141999659-612x612.jpg', '2021-04-12 03:25:26', '2021-04-12 03:25:26'),
(27, 10, 'images/shop/1618219526pexels-photo-264636.jpeg', '2021-04-12 03:25:26', '2021-04-12 03:25:26'),
(28, 10, 'images/shop/1618219526photo-1534723452862-4c874018d66d.jpg', '2021-04-12 03:25:26', '2021-04-12 03:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `sundays`
--

CREATE TABLE `sundays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sunday',
  `opening_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sundays`
--

INSERT INTO `sundays` (`id`, `shop_id`, `day`, `opening_status`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(1, 9, 'Sunday', 'open', NULL, NULL, '2021-04-13 11:02:55', '2021-04-13 11:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `thursdays`
--

CREATE TABLE `thursdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Thursday',
  `opening_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thursdays`
--

INSERT INTO `thursdays` (`id`, `shop_id`, `day`, `opening_status`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(1, 9, 'Thursday', 'open', NULL, NULL, '2021-04-13 11:02:55', '2021-04-13 11:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `tuesdays`
--

CREATE TABLE `tuesdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tuesday',
  `opening_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tuesdays`
--

INSERT INTO `tuesdays` (`id`, `shop_id`, `day`, `opening_status`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(1, 9, 'Tuesday', 'open', NULL, NULL, '2021-04-13 11:02:55', '2021-04-13 11:02:55');

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
  `online_status` int(11) NOT NULL DEFAULT '0',
  `followers` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `email`, `mobile`, `image`, `email_verified_at`, `password`, `token`, `online_status`, `followers`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Check', NULL, NULL, '01889967514', NULL, NULL, '$2y$10$yWDJQqUmx8Gihkq.MmD04.TyTn9H8AgPoJ7351GERN7COvadEUfv6', NULL, 1, 0, NULL, '2021-04-10 23:55:54', '2021-04-10 23:56:31'),
(5, 'Check', 'Raju', 'raju@mail.com', '01889967515', 'images/user/1618136786photo-1534723452862-4c874018d66d.jpg', NULL, '$2y$10$uC4F15PjecqzTqf6nLSaJe74ubX3UKjdVJaLR51F58s9yInszUFIW', NULL, 1, 0, NULL, '2021-04-10 23:56:01', '2021-04-11 04:26:27'),
(6, 'Check', NULL, NULL, '01889967516', NULL, NULL, '$2y$10$axWQmgH/SJbHj61i9lo7Eut2k.81UZVTWBUvE6X8wswkAtQE2Bmze', NULL, 0, 0, NULL, '2021-04-10 23:56:06', '2021-04-10 23:56:06'),
(7, 'Check', NULL, NULL, '01889967517', NULL, NULL, '$2y$10$RE4vWptEmwqNnLbWSYG7N.OOt/rTjEdy66LHu0OTstcHXE8gjEaee', NULL, 0, 0, NULL, '2021-04-10 23:56:10', '2021-04-10 23:56:10'),
(8, 'Check', NULL, NULL, '01889967518', NULL, NULL, '$2y$10$IybD4LeyVzpNCUXK8y3g5.RWRDDg9ywogbYg6HbIkLw96lt0QW5R2', NULL, 0, 0, NULL, '2021-04-10 23:56:15', '2021-04-10 23:56:15'),
(9, 'Check', NULL, NULL, '01889967519', NULL, NULL, '$2y$10$lFA6zffZQRfpnxQgc9d3POt.MK92f56VGuWeV0JLl4qEzDIxh3wVm', NULL, 0, 0, NULL, '2021-04-10 23:56:19', '2021-04-10 23:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `wednesdays`
--

CREATE TABLE `wednesdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Wednesday',
  `opening_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `opening_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wednesdays`
--

INSERT INTO `wednesdays` (`id`, `shop_id`, `day`, `opening_status`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(1, 9, 'Wednesday', 'open', NULL, NULL, '2021-04-13 11:02:55', '2021-04-13 11:02:55');

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
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
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
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fridays`
--
ALTER TABLE `fridays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_images`
--
ALTER TABLE `header_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_app_purchases`
--
ALTER TABLE `in_app_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mondays`
--
ALTER TABLE `mondays`
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
-- Indexes for table `paypal_infos`
--
ALTER TABLE `paypal_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_locations`
--
ALTER TABLE `popular_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saturdays`
--
ALTER TABLE `saturdays`
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
-- Indexes for table `sundays`
--
ALTER TABLE `sundays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thursdays`
--
ALTER TABLE `thursdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuesdays`
--
ALTER TABLE `tuesdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wednesdays`
--
ALTER TABLE `wednesdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fridays`
--
ALTER TABLE `fridays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_images`
--
ALTER TABLE `header_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `in_app_purchases`
--
ALTER TABLE `in_app_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `mondays`
--
ALTER TABLE `mondays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_infos`
--
ALTER TABLE `paypal_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `popular_locations`
--
ALTER TABLE `popular_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saturdays`
--
ALTER TABLE `saturdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shop_facilities`
--
ALTER TABLE `shop_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shop_images`
--
ALTER TABLE `shop_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sundays`
--
ALTER TABLE `sundays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thursdays`
--
ALTER TABLE `thursdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tuesdays`
--
ALTER TABLE `tuesdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wednesdays`
--
ALTER TABLE `wednesdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
