-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2020 at 11:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `demo` text NOT NULL,
  `file_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` char(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `product_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 12, 18750, '1', '2020-04-27 07:20:41', '2020-04-27 02:50:41'),
(7, 1, 14, 47500, '1', '2020-04-27 08:16:23', '2020-04-27 03:46:23'),
(8, 1, 15, 36000, '1', '2020-04-27 08:33:37', '2020-04-27 04:03:37'),
(10, 1, 13, 27000, '1', '2020-04-27 21:00:26', '2020-04-27 16:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `chid` int(11) NOT NULL DEFAULT 0,
  `fa_name` varchar(100) NOT NULL,
  `en_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `chid`, `fa_name`, `en_name`, `created_at`, `updated_at`, `image`) VALUES
(12, 0, 'هوش مصنوعی', 'Artificial Intelligence', '2020-04-26 17:14:51', '2020-04-26 17:14:51', 'uploads/1587937491-artificialintelligence.jpeg'),
(13, 0, 'برنامه‌نویسی وب', 'Web Programming', '2020-04-26 17:17:07', '2020-04-26 17:17:07', 'uploads/1587937627-webprogramming.jpeg'),
(14, 12, 'داده‌کاوی', 'Data Mining', '2020-04-26 17:20:46', '2020-04-26 17:20:46', 'uploads/1587937846-datamining.jpeg'),
(15, 12, 'پردازش تصویر', 'Image Processing', '2020-04-26 17:23:26', '2020-04-26 17:23:26', 'uploads/1587938006-imageprocessing.jpeg'),
(16, 12, 'پردازش زبان طبیعی', 'Natural Language Processing', '2020-04-26 17:24:47', '2020-04-26 17:24:47', 'uploads/1587938087-nlp.jpeg'),
(17, 13, 'فرانت‌اند', 'Frontend', '2020-04-26 17:26:17', '2020-04-26 17:26:17', 'uploads/1587938177-frontend.png'),
(18, 13, 'بک‌اند', 'Backend', '2020-04-26 17:27:01', '2020-04-26 17:27:01', 'uploads/1587938221-backend.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `commentable_id`, `commentable_type`, `user_id`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(12, 7, 'App\\Product', 4, '1', 'بسیارعالی', '2020-04-20 05:30:07', '2020-04-20 05:30:07'),
(13, 6, 'App\\Product', 1, '1', 'خیلی خوب بود', '2020-04-22 02:48:02', '2020-04-22 02:48:02'),
(14, 2, 'App\\Post', 1, '1', 'oerrtu045yt', '2020-04-26 12:51:16', '2020-04-26 12:51:16'),
(15, 15, 'App\\Product', 1, '1', 'خیلی خوب توضیح داده شده', '2020-04-27 04:37:37', '2020-04-27 06:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asiye', 'asiye@gmail.com', 'پشتیبانی', 'پشتیبانیپشتیبانیپشتیبانیپشتیبانیپشتیبانیپشتیبانی', 1, '2020-04-20 06:35:39', '2020-04-27 11:44:10'),
(2, 'بتول', 'saeidi.batul@yahoo.com', 'کامنت', 'سایتتون خیلی خوبه. ممنون از همه چی', 0, '2020-04-26 12:19:34', '2020-04-26 12:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `factors`
--

CREATE TABLE `factors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `status` char(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factors`
--

INSERT INTO `factors` (`id`, `user_id`, `sum`, `status`, `created_at`, `updated_at`) VALUES
(24, 1, 21750, '1', '2020-04-22 19:38:03', '2020-04-22 15:08:03'),
(25, 1, 21750, '1', '2020-04-22 19:38:32', '2020-04-22 15:08:31'),
(26, 1, 21750, '1', '2020-04-22 19:41:00', '2020-04-22 15:11:00'),
(27, 1, 21750, '1', '2020-04-22 19:41:38', '2020-04-22 15:11:38'),
(28, 1, 21750, '1', '2020-04-22 19:42:22', '2020-04-22 15:12:22'),
(29, 1, 21750, '1', '2020-04-22 19:42:45', '2020-04-22 15:12:45'),
(30, 1, 21750, '1', '2020-04-22 19:43:55', '2020-04-22 15:13:55'),
(31, 1, 21750, '1', '2020-04-22 19:44:06', '2020-04-22 15:14:06'),
(32, 1, 18750, '1', '2020-04-27 07:20:41', '2020-04-27 02:50:41'),
(33, 1, 47500, '1', '2020-04-27 08:16:23', '2020-04-27 03:46:23'),
(34, 1, 36000, '1', '2020-04-27 08:33:37', '2020-04-27 04:03:37'),
(35, 1, 27000, '1', '2020-04-27 21:00:27', '2020-04-27 16:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `factor_product`
--

CREATE TABLE `factor_product` (
  `factor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factor_product`
--

INSERT INTO `factor_product` (`factor_id`, `product_id`) VALUES
(32, 12),
(33, 14),
(34, 15),
(35, 13);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 1, 17, '2020-04-27 16:10:11', '2020-04-27 16:10:11'),
(4, 1, 14, '2020-04-27 16:28:21', '2020-04-27 16:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `fa_name` varchar(100) NOT NULL,
  `en_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `fa_name`, `en_name`, `created_at`, `updated_at`) VALUES
(1, 'زن', 'female', '2020-03-25 20:15:24', NULL),
(2, 'مرد', 'male', '2020-03-25 20:15:24', NULL);

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
(4, '2020_04_14_183557_create_ratings_table', 2),
(5, '2020_04_14_183957_create_ratings_table', 3),
(6, '2020_04_14_195429_create_comments_table', 4),
(7, '2020_04_15_153623_create_ratings_table', 5),
(8, '2020_04_20_093759_create_ratings_table', 6),
(9, '2020_04_20_104206_create_contacts_table', 7),
(10, '2020_04_20_114253_create_tags_table', 8),
(11, '2020_04_20_114822_create_taggables_table', 9);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `factor_id` int(11) NOT NULL,
  `trackingcode` int(11) NOT NULL,
  `status` char(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `fa_name` varchar(100) NOT NULL,
  `en_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `fa_name`, `en_name`, `created_at`, `updated_at`) VALUES
(1, 'لیست محصولات', 'product_list', '2020-03-25 07:37:21', '2020-03-25 07:37:21'),
(2, 'افزودن محصول', 'product_create', '2020-04-26 21:28:58', '2020-04-26 16:58:58'),
(3, 'ویرایش محصول', 'product_edit', '2020-04-26 16:55:22', '2020-04-26 16:55:22'),
(4, 'حذف محصول', 'product_delete', '2020-04-26 16:55:48', '2020-04-26 16:55:48'),
(5, 'لیست کاربران', 'user_list', '2020-04-26 16:56:30', '2020-04-26 16:56:30'),
(6, 'ویرایش کاربر', 'user_edit', '2020-04-26 16:57:22', '2020-04-26 16:57:22'),
(7, 'حذف کاربر', 'user_delete', '2020-04-26 16:57:49', '2020-04-26 16:57:49'),
(8, 'لیست پست‌ها', 'post_list', '2020-04-26 16:58:20', '2020-04-26 16:58:20'),
(9, 'افزودن پست', 'post_create', '2020-04-26 16:59:27', '2020-04-26 16:59:27'),
(10, 'ویرایش پست', 'post_edit', '2020-04-26 17:00:03', '2020-04-26 17:00:03'),
(11, 'حذف پست', 'post_delete', '2020-04-26 17:00:28', '2020-04-26 17:00:28'),
(12, 'لیست نظرات', 'comment_list', '2020-04-26 17:01:40', '2020-04-26 17:01:40'),
(13, 'حذف نظرات', 'comment_delete', '2020-04-26 17:02:41', '2020-04-26 17:02:41'),
(14, 'تایید نظرات', 'comment_confirm', '2020-04-26 17:03:04', '2020-04-26 17:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(2, 4),
(14, 4),
(13, 4),
(12, 4),
(11, 4),
(10, 4),
(9, 4),
(8, 4),
(7, 4),
(6, 4),
(5, 4),
(4, 4),
(3, 4),
(1, 4),
(11, 3),
(10, 3),
(9, 3),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photoable_id` int(11) NOT NULL,
  `photoable_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, ' چگونه یک سایت تازه تاسیس را تبدیل به یک برند تجاری کنیم؟', 'یکی از دغدغه های مهم افرادی که بازاریابی آنلاین را آغاز کرده اند و می خواهند کسب و کار اینترنتی خودشان را داشته باشند ، مقوله ی برند سازی و بازاریابی است. در واقع می توان چنین گفت که وقتی شما یک کسب و کار آنلاین و بازاریابی اینترنتی را آغاز می کنید ، نیاز به آن دارید که دیده شوید و این دیده شدن برای شما مهم تر از هر چیزی است.\r\n\r\nاما برای دیده شدن و رسیدن به نقطه ای که از کسب و کار اینترنتی تان سود کسب کنید ، نیاز به آن دارد که به یک مقوله ی اساسی و حیاتی در بازار یابی آنلاین و کسب و کار اینترنتی توجه داشته باشید و از آن بعنوان یک ابزار پیش نیاز برای رشد استفاده کنید. این مقوله ی اساسی و حیاتی ، برند سازی است.\r\n\r\nبرند سازی به جرئت پلکان صعود یک کسب و کار اینترنتی و بازار یابی آنلاین در رسیدن به سود و فروش بالا است. اما خیلی مسئله ی مهمی است که شما بدانید دقیقا چطور برند سازی کنید و یا اینکه چگونه سایت تازه تاسیس خودتان را به تبدیل به یکی از قطب های بازار در اینترنت کنید.\r\n\r\nپاسخ های بسیاری برای این سوال وجود دارد که هر کدام از جنبه های مختلف به این قضیه نگاه کرده اند. اما نیازی به نگرانی نیست. ما در این مقاله جامع ترین شیوه ی برند سازی و بازاریابی فراگیر برای سایت های تازه تاسیس و در یک نگاه کلی تمامی سایت های کسب و کار اینترنتی را به شما آموزش خواهیم دید.\r\n\r\nما در این مقاله سعی می کنیم از جامع ترین شیوه های برندسازی و بازاریابی اینترنتی برای رشد کسب و کارتان استفاده کنیم ، تا که بتوانید به راحتی هر چه تمام تر و در مدت زمانی کوتاه خودتان را به نقطه ی فروش برسانید و تبدیل به یک برند تجاری آنلاین شوید.\r\n\r\nبازاریابی فراگیر چیست؟\r\nخیلی از آن هایی که تازه یک سایت کسب و کار اینترنتی را تاسیس می کند ، با این تفکر روبرو هستند که : ” من که هیچ بازدید کننده ای ندارم ، من که هیچ تبلیغی هم نکرده ام ، من حتی کسب و کارم یک فالور در شبکه های مجازی هم ندارد.\r\n\r\nپس من چگونه خودم را به یک سود عالی برسانم و محصولاتم را بفروشم؟ ”  .\r\n\r\nپاسخ ما به این تفکر ، ذکر این نکته است که شما باید با استفاده از بازاریابی فراگیر این کار را به ثمر برسانید و تنها شیوه ای که شما می توانید از نقطه ی صفر کسب و کار اینترنتی به قله ی سود دهی برسید ، این است که از بازاریابی فراگیر استفاده کنید.\r\n\r\nحال سوال اساسی اینجاست که ” بازاریابی فراگیر چیست؟ “.\r\n\r\nراستش را بخواهید تا به امروز برای بازاریابی فراگیر تعاریف زیادی ارائه شده است وهیچ تعریف جامعی نیز وجود ندارد که همه ی متخصصین این حوزه بر روی آن توافق کرده باشند ،\r\n\r\nاما می توان به زبان ساده جنین گفت که :  بازاریابی فراگیر ، به شیوه ای از بازاریابی گفته می شود که شما در طی آن با طراحی یک پروسه ی بازاریابی کاری می کنید که دیگران محصولات شما را برای شما به اشتراک بگذارند. “.\r\n\r\nدر واقع اگر مروری به شیوه های بازاریابی داشته باشید ، می بینید که بازاریابی در ابتدا به شیوه ی سنتی بوده است. یعنی آنکه شما باید هزینه ای پرداخت می کردید و بر اساس یک پیام جمعی ، محصولات خودتان را تبلیغ می کردید و برای آن بازاریابی می کردید. یکی از نمونه های رایج در حوزه ی بازاریابی سنتی ، استفاده از تبلیغات تلویزیونی بوده است.\r\n\r\nاما امروزه با گسترش شیوه های بازاریابی خصوصا در حوزه ی کسب و کارهای اینترنتی ما دیگر نیاز به آن نداریم که هزینه ای کنیم و یا اینکه یک پیام ثابت را از طریق تلویزیون و یا یکی از مدیوم های تبلیغاتی ، بازاریابی کنیم بلکه امروز شیوه ای داریم به نام بازاریابی فراگیر که شما باید در طی آن ، محصولات خودتان را روی زبان ها بیندازید و این زبان ها باشند که برای شما تبلیغ کنند.\r\n\r\nشاید این قضیه در تئوری و در بیان کمی ساده باشد ، اما به عمل که می رسیم ، می بینیم که بسیاری از محصولات ، هیچ جایی برای تبلیغات فراگیر و بازاریابی فراگیر ندارند و آنجاست که یک مقدار کار ما بنطر سخت می آید.\r\n\r\nاما ما می خواهیم به شما بگوییم که این کار هیچ سختی ندارد ، بلکه شما باید تنها یک رویه ی درست برای آن اتخاذ کنید و ببینید که چطور می توان از بازاریابی فراگیر بهترین نتیجه را گرفت.\r\n\r\nبرای این کار شما نیاز دارید که یک محتوای فراگیر تولید کنید. ممکن است برایتان سوال پیش بیاید که آخر چطور می شود این کار را کرد؟ نگران نباشید ، در ادامه ما این مطلب را بصورت جامع برایتان شرح و توضیح میدهیم.راهکارهایی که ما می خواهیم به شما آموزش دهیم در قالب یک تکنیک طراز اول است که در ادامه با آن آشنا خواهید شد.', 'images/weblog-img/7.jpg', '2020-03-31 19:30:00', NULL),
(2, 4, 'تکنیک طلایی آسمان خراش', 'یکی از راه های برند سازی در اینترنت تولید محتوا است. اما طبیعی است که هر محتوایی نمی تواند برای ما بازار یابی کند و ما باید همیشه محتواهای جذاب و درجه یکی داشته باشیم. اما داشتن محتوای درجه یک و جذاب ، آیا به تعدد پست هایی که در سایت خودمان میگذاریم مربوط است ؟\r\n\r\nاز نگاه تکنیک آسمان خراش ، هیچ نیازی به این نیست که ما محتواهای خودمان را هر روز با سیلی جدید از مفاهیم روبرو کنیم. بلکه فقط گاهی نیاز است به جای پرداختن به چند مقاله ، روی یک مقاله کار کنیم و آن را بالا ببریم. اگر دقت کرده باشید ، اسم آسمان خراش نیز برای همین روی این تکنیک گذاشته شده است.\r\n\r\nاگر ما بخواهیم مدام محتوا تولید کنیم و محتواهای خودمان را مورد بررسی کیفی قرار ندهیم ، درست مثل این می ماند که هزار خانه ی یک طبقه ای ساخته ایم ، در حالی که ما با ساخت تنها ۶۰ تا ۷۰ واحد روی هم ، می توانیم یک آسمان خراش داشته باشیم و صد البته از هر کجای شهر هم که به این آسمان خراش نگاه شود ، این آسمان خراش پیداست.\r\n\r\nدر واقع تکنیک می خواهد این نکته را به ما بگوید که برای رسیدن به یک رتبه خوب و دیده شدن در همه جای اینترنت نیاز است که شما بر روی یک محتوا ،تا می توانید وقت بگذارید و تمام شکاف های آن را بگیرید تا که یک نتیجه ی خوب حاصل کنید.', 'images/weblog-img/4.jpg', '2020-04-01 19:30:00', NULL),
(3, 1, 'لاراول', '<p>&nbsp;</p>\r\n\r\n<p><strong>زبان برنامه نویسی&nbsp;<span dir=\"LTR\">PHP</span></strong>&nbsp;یکی از برترین و محبوب&zwnj;ترین زبان&zwnj;های <a href=\"https://7learn.com/tutorials/programming\">برنامه نویسی</a> در حوزه <strong>طراحی وب</strong> است. این زبان برنامه نویسی فریم ورک&zwnj;های بسیار زیادی دارد که لاراول یکی از آن&zwnj;ها است. عاملی که <strong>فریم ورک لاراول</strong> را از سایر فریم ورک&zwnj;های زبان PHP متمایز می&zwnj;سازد، محبوبیت زیادی است که در مدت زمان کوتاهی به دست آورده است.&nbsp;در حال حاضر اکثر شرکت&zwnj;های ایرانی و حتی خارجی برای استخدام نیروی برنامه نویس به دنبال کسانی هستند که با این فریم ورک کار کرده اند. پس اگر می&zwnj;خواهید بدانید علت محبوبیت و موفقیت <a href=\"https://7learn.com/programming/what-is-laravel\"><strong>فریم ورک لاراول چیست</strong></a>&nbsp;و چرا باید آن را انتخاب کنید، در ادامه این مقاله&nbsp;همراه ما باشید تا اطلاعات جامعی درباره این فریم ورک در اختیار شما قرار دهیم.</p>', 'posts/1588010154-laravel.jpg', '2020-04-27 13:25:54', '2020-04-27 13:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `producers`
--

CREATE TABLE `producers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producers`
--

INSERT INTO `producers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'مکتب شریف', '2020-04-26 17:37:25', '2020-04-26 17:37:25'),
(7, 'علم و صنعت', '2020-04-26 17:37:34', '2020-04-26 17:37:34'),
(8, 'امیرکبیر', '2020-04-26 17:37:42', '2020-04-26 17:37:42'),
(9, 'جادی', '2020-04-26 17:37:50', '2020-04-26 17:37:50'),
(10, 'حسین رحمانی', '2020-04-26 17:38:18', '2020-04-26 17:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  `special` char(1) DEFAULT '0',
  `sales_number` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) DEFAULT 0,
  `image` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `body` text DEFAULT NULL,
  `download_number` int(11) DEFAULT 0,
  `click_number` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `producer_id`, `category_id`, `type_id`, `price`, `status`, `special`, `sales_number`, `discount`, `image`, `file`, `body`, `download_number`, `click_number`, `created_at`, `updated_at`) VALUES
(12, 'آموزش داده‌کاوی از صفر تا صد', 10, 14, 1, 25000, '1', '0', 15, 25, 'images/1587939101-datamining1.jpeg', 'files/1587939101-datamining1.pdf', 'در این مطلب به مباحث داده‌کاوی از صفر تا صد پرداخته می‌شود. با افزایش تکنولوژی بشر شاهد رشد انفجاری داده شده‌است و نیاز به ابزارهایی دارد که به او در کشف روابط بین داده‌ها کمک کند', 12, 0, '2020-04-27 10:21:09', '2020-04-27 03:54:00'),
(13, 'اموزش داده‌کاوی مقدماتی تا پیشرفته', 10, 14, 1, 30000, '1', '0', 21, 10, 'images/1587974982-datamining2.jpeg', 'files/1587974982-datamining2.pdf', '<p>آنچه باید برای شروع داده&zwnj;کاوی بدانید در این کتاب به صورت جامع&nbsp; کامل آمده&zwnj;است و کدهای مفیدی نیز در ان توضیح داده شده&zwnj;است.</p>', 6, 0, '2020-04-27 21:00:31', '2020-04-27 16:30:31'),
(14, 'پردازش تصویر با متلب', 6, 15, 1, 50000, '1', '0', 10, 5, 'images/1587975324-imageprocessing1.jpeg', 'files/1587975324-imageprocessing1.rar', '<p>در این محصول آموزش پردازش تصویر با استفاده از برنامه نویسی در متلب به طور کامل آموزش داده شده است</p>', 1, 0, '2020-04-27 10:19:51', '2020-04-27 03:46:27'),
(15, 'پردازش زبان طبیعی چیست؟', 7, 16, 1, 40000, '1', '0', 4, 10, 'images/1587978277-nlp1.jpg', 'files/1587975814-nlp1.rar', '<p>برای یادگیری پردازش زبان طبیعی لازم است که ابتدا با مقدمات آن آشنا شویم. در این آموزش مقدماتی را که لازم است تا بتوانید پردازش زبان طبیعی را شروع کنید به طور مفید و مختصر آمده است</p>', 1, 0, '2020-04-27 10:19:55', '2020-04-27 04:34:37'),
(16, 'کتاب آموزش لاراول', 6, 18, 1, 34000, '1', '0', 0, 10, 'images/1588019111-laravel1.jpg', 'files/1588019111-laravel1.pdf', '<p>قطعا محبوب ترين فريمورک زبان <a href=\"https://php.net\" target=\"_blank\"><strong>PHP</strong> </a>در ايران و جهان هست که بر پایه معماری MVC ایجاد شده و به صورت خيره کننده اي از رقباي قديمي خودش&nbsp; مثل&nbsp;&nbsp;CodeIgniter ,&nbsp;CakePHP ,&nbsp;Zend و &hellip; جلو زد و روز به روز هم محبوب تر ميشه . شما اگر <strong>لاراول</strong> بلد باشيد به راحتي ميتونيد هر وب سايت بزرگي مثل ديجي کالا يا ديوار يا زرین پال یا &hellip; رو با استفاده از زبان قدرتمند PHP بنويسيد و اونها رو هر روز گسترش بديد .</p>', 0, 0, '2020-04-27 15:55:11', '2020-04-27 15:55:11'),
(17, 'فریمورک js', 7, 17, 1, 33000, '1', '0', 0, 15, 'images/1588019363-js.jpg', 'files/1588019363-js.pdf', '<p>همانطور که می&zwnj;دانید در دنیای برنامه نویسی همانند دنیای واقعی، با زبان&zwnj;های بسیاری روبرو هستیم که هر کدام مزایا و معایب خاص خود را دارند. در این مقاله سعی داریم یکی از محبوب&zwnj;ترین زبان&zwnj;های این حوزه را به شما معرفی کنیم. اگر مایل هستید با <strong>آموزش جاوا اسکریپت</strong> وارد دنیای برنامه نویسی شوید، اما اطلاعات چندانی در مورد آن ندارید در ادامه این مقاله با ما همراه باشید.</p>', 0, 0, '2020-04-27 15:59:23', '2020-04-27 15:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `created_at`, `updated_at`, `rating`, `rateable_type`, `rateable_id`, `user_id`) VALUES
(1, '2020-04-20 05:29:03', '2020-04-20 05:29:03', 3, 'App\\Product', 7, 4),
(2, '2020-04-20 05:29:47', '2020-04-20 05:29:47', 3, 'App\\Product', 7, 4),
(3, '2020-04-22 02:28:04', '2020-04-22 02:28:04', 5, 'App\\Product', 7, 1),
(4, '2020-04-22 02:37:20', '2020-04-22 02:37:20', 3, 'App\\Product', 7, 1),
(5, '2020-04-22 02:48:50', '2020-04-22 02:48:50', 4, 'App\\Product', 6, 1),
(6, '2020-04-26 12:51:16', '2020-04-26 12:51:16', 5, 'App\\Post', 2, 1),
(7, '2020-04-26 13:37:16', '2020-04-26 13:37:16', 2, 'App\\Post', 2, 1),
(8, '2020-04-26 13:45:36', '2020-04-26 13:45:36', 1, 'App\\Post', 2, 1),
(9, '2020-04-26 13:45:46', '2020-04-26 13:45:46', 5, 'App\\Post', 2, 1),
(10, '2020-04-26 13:45:53', '2020-04-26 13:45:53', 5, 'App\\Post', 2, 1),
(11, '2020-04-26 13:46:01', '2020-04-26 13:46:01', 5, 'App\\Post', 2, 1),
(12, '2020-04-26 13:46:08', '2020-04-26 13:46:08', 5, 'App\\Post', 2, 1),
(13, '2020-04-26 13:46:18', '2020-04-26 13:46:18', 5, 'App\\Post', 2, 1),
(14, '2020-04-27 04:04:09', '2020-04-27 04:04:09', 3, 'App\\Product', 15, 1),
(15, '2020-04-27 04:37:38', '2020-04-27 04:37:38', 3, 'App\\Product', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `fa_name` varchar(100) DEFAULT NULL,
  `en_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `fa_name`, `en_name`, `created_at`, `updated_at`) VALUES
(1, 'کاربر', 'User', '2020-03-25 11:14:16', '2020-03-25 06:44:16'),
(2, 'ادمین', 'Admin', '2020-03-25 06:42:40', '2020-03-25 06:42:40'),
(3, 'نویسنده', 'author', '2020-04-26 16:52:48', '2020-04-26 16:52:48'),
(4, 'مدیر ارشد', 'super admin', '2020-04-26 16:53:09', '2020-04-26 16:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(1, 6),
(1, 7),
(1, 4),
(2, 7),
(4, 1),
(2, 6),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sliderparents`
--

CREATE TABLE `sliderparents` (
  `id` int(11) NOT NULL,
  `fa_name` varchar(100) DEFAULT NULL,
  `en_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliderparents`
--

INSERT INTO `sliderparents` (`id`, `fa_name`, `en_name`, `created_at`, `updated_at`) VALUES
(1, 'اسلایدر فرانت', 'front slider', '2020-04-01 18:44:48', '2020-04-01 14:14:48'),
(2, 'اسلایدر بنر', 'banner slider', '2020-04-01 14:17:24', '2020-04-01 14:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `sliderparent_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `url`, `sliderparent_id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(4, '#', 1, 'slider 1', 'uploads/1587533856-1587109642-onlineshopping.jpg', '2020-04-22 01:07:36', '2020-04-22 01:07:36'),
(5, '#', 1, 'slider 2', 'uploads/1587535097-video-game-controls-frame-neon-style-brick-wall_24908-58914.jpg', '2020-04-22 01:28:17', '2020-04-22 01:28:17'),
(6, '#', 1, 'slider 3', 'uploads/1587535140-adults-learning-taking-online-courses_23-2148515789.jpg', '2020-04-22 01:29:00', '2020-04-22 01:29:00'),
(7, '#', 1, 'slider 4', 'uploads/1587535202-colorful-background-videogame-flat-design_23-2147567954.jpg', '2020-04-22 01:30:02', '2020-04-22 01:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `user_id`, `subject`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'خرید شماره ۲', 'دانلود به درستی انجام نمیگیرد', 1, '2020-04-27 16:38:16', '2020-04-27 12:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `taggable_id` int(11) NOT NULL,
  `taggable_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggables`
--

INSERT INTO `taggables` (`id`, `tag_id`, `taggable_id`, `taggable_type`, `created_at`, `updated_at`) VALUES
(5, 2, 13, 'App\\Product', NULL, NULL),
(6, 4, 13, 'App\\Product', NULL, NULL),
(7, 5, 13, 'App\\Product', NULL, NULL),
(8, 2, 14, 'App\\Product', NULL, NULL),
(12, 2, 15, 'App\\Product', NULL, NULL),
(13, 4, 15, 'App\\Product', NULL, NULL),
(14, 3, 16, 'App\\Product', NULL, NULL),
(15, 3, 17, 'App\\Product', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'هوش مصنوعی', '2020-04-20 07:46:53', '2020-04-27 03:04:35'),
(3, 'برنامه‌نویسی وب', '2020-04-20 07:47:04', '2020-04-27 03:04:50'),
(4, 'داده‌کاوی', NULL, '2020-04-27 03:05:03'),
(5, 'آموزشی', NULL, '2020-04-27 03:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'pdf', '2020-04-04 10:56:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `lastlogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `gender_id`, `lastlogin`) VALUES
(1, 'بتول', 'batool@yahoo.com', 'profile/1587931023-batool.jpg', NULL, '$2y$10$Z.PKmpOcVmssYOnUd872NuABiFX.LC.8wXKdCr0sNN4oi2BDx73DG', 'FJcNiuEbH1fAUQBVtUWuygeS8BRLFKPeaZJWLEB61Ba9ZIcs6OYArENmkups', '2020-03-25 06:13:12', '2020-04-26 15:27:03', 1, NULL),
(4, 'asiye', 'asiye@gmail.com', 'pic', NULL, '$2y$10$O/u6saoPtCCQvdZk3ELJouaClzjfqHsqc43nWgY5K9fwr5sYjXq.6', NULL, '2020-04-05 02:28:49', '2020-04-05 02:28:49', NULL, NULL),
(6, 'mahdis', 'mahdis@yahoo.com', 'pic', NULL, '$2y$10$jtPPtsT/vMkWNerMdtM7uu9BUHL5lCsRlLiZqgjhIAUIbR668SDpW', NULL, '2020-03-25 07:05:36', '2020-03-25 07:05:36', NULL, NULL),
(7, 'نفیسه سعیدی', 'nafis@yahoo.com', 'pic', NULL, '$2y$10$1mwMMOkN7MLmQ3iJGpVaEeAktrsA5Jc5PXCFbzq/rD6RWwVv5EGQG', NULL, '2020-04-04 16:13:37', '2020-04-04 16:13:37', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles_users_0` (`user_id`),
  ADD KEY `fk_articles_files` (`file_id`);

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_basket_products` (`product_id`),
  ADD KEY `fk_baskets_users_0` (`user_id`);

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factors`
--
ALTER TABLE `factors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_factors_users_0` (`user_id`);

--
-- Indexes for table `factor_product`
--
ALTER TABLE `factor_product`
  ADD KEY `fk_factor_product_factors` (`factor_id`),
  ADD KEY `fk_factor_product_products` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_favorites_products` (`product_id`),
  ADD KEY `Fk_favorites_users` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_factors` (`factor_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `fk_permission_role_roles` (`role_id`),
  ADD KEY `fk_permission_role_permissions` (`permission_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_posts_users` (`user_id`);

--
-- Indexes for table `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories` (`category_id`),
  ADD KEY `fk_products_producers` (`producer_id`),
  ADD KEY `fk_products_types` (`type_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `fk_role_user_roles` (`role_id`),
  ADD KEY `fk_role_user_users` (`user_id`);

--
-- Indexes for table `sliderparents`
--
ALTER TABLE `sliderparents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sliders_slider_parents` (`sliderparent_id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_supports_users` (`user_id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_genders` (`gender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `factors`
--
ALTER TABLE `factors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliderparents`
--
ALTER TABLE `sliderparents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_files` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_articles_users_0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `fk_basket_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_baskets_users_0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factors`
--
ALTER TABLE `factors`
  ADD CONSTRAINT `fk_factors_users_0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factor_product`
--
ALTER TABLE `factor_product`
  ADD CONSTRAINT `fk_factor_product_factors` FOREIGN KEY (`factor_id`) REFERENCES `factors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factor_product_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `Fk_favorites_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_favorites_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_factors` FOREIGN KEY (`factor_id`) REFERENCES `factors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `fk_permission_role_permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_permission_role_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `Fk_posts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_products_producers` FOREIGN KEY (`producer_id`) REFERENCES `producers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_products_types` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `fk_role_user_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role_user_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `fk_sliders_slider_parents` FOREIGN KEY (`sliderparent_id`) REFERENCES `sliderparents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supports`
--
ALTER TABLE `supports`
  ADD CONSTRAINT `Fk_supports_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_genders` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
