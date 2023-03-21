-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 11:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(4, 'Yody', 'logo-yody.jpg', '2023-02-21 06:32:17', '2023-02-21 06:32:17'),
(5, 'Hnoss', 'hnoss.jpg', '2023-02-21 06:32:51', '2023-02-21 06:32:51'),
(6, 'Candles', 'logo-candles.jpg', '2023-02-21 06:33:12', '2023-02-21 06:33:12'),
(7, 'Coolmade', 'logo-coolmade.jpg', '2023-02-21 06:33:34', '2023-02-21 06:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Áo', 1, NULL, NULL),
(2, 'Quần', 1, NULL, '2023-02-22 19:20:10'),
(3, 'Mũ', 1, NULL, '2023-02-22 19:20:15');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_02_033525_create_categories_table', 1),
(6, '2022_07_02_033724_create_brands_table', 1),
(7, '2022_07_02_033815_create_products_table', 1),
(8, '2022_07_02_033850_create_product_details_table', 1),
(9, '2022_07_10_160145_create_orders_table', 1),
(10, '2022_07_21_160115_create_order_details_table', 1),
(11, '2023_02_27_162755_add_google_id_to_users_table', 2),
(12, '2023_02_27_163953_add_google_id_to_users_table', 2),
(13, '2023_02_27_164436_add_google_id_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `total_money` double UNSIGNED NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total_money`, `phone`, `address`, `note`, `name`, `email`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 747342, 358140899, 'Hà Nội', 'Giao nhanh nhé', 'Manh Tien', 'bka1.nmtien@gmail.com', '2023-02-23 01:00:22', '2023-03-12 00:41:10'),
(4, 2, 0, 4446888, 358140899, 'Hải Phòng', 'Ok', 'Manh Tien', 'bka1.nmtien@gmail.com', '2023-02-23 01:06:35', '2023-02-23 01:06:35'),
(5, 3, 0, 424222, 358140893, 'Hà Nội', 'hihi', 'Tiến Nguyễn Mạnh', 'nguyenmanhtien14081998@gmail.com', '2023-02-28 00:22:12', '2023-02-28 00:22:12'),
(6, 3, 0, 135000, 358140888, 'Hà Nội', 'Thanks shop', 'Tiến Nguyễn Mạnh', 'nguyenmanhtien14081998@gmail.com', '2023-03-05 20:37:44', '2023-03-05 20:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `price` double NOT NULL,
  `total_price` double UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `quantity`, `size`, `price`, `total_price`, `created_at`, `updated_at`) VALUES
(4, 7, 3, 3, 'M', 135000, 405000, '2023-02-23 01:00:22', '2023-02-23 01:00:22'),
(6, 4, 4, 5, 'M', 200000, 1000000, '2023-02-23 01:06:35', '2023-02-23 01:06:35'),
(7, 3, 4, 7, 'L', 250000, 1750000, '2023-02-23 01:06:35', '2023-02-23 01:06:35'),
(8, 6, 4, 4, 'L', 424222, 1696888, '2023-02-23 01:06:35', '2023-02-23 01:06:35'),
(9, 6, 5, 1, 'L', 424222, 424222, '2023-02-28 00:22:12', '2023-02-28 00:22:12'),
(10, 7, 6, 1, 'M', 135000, 135000, '2023-03-05 20:37:44', '2023-03-05 20:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `sale_price` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `name`, `price`, `sale_price`, `quantity`, `image`, `status`, `description`, `created_at`, `updated_at`) VALUES
(3, 4, 1, 'Áo polo nam pique mắt chim', 399000, 250000, 342, 'Ao-Polo-Nam Pique-Mat-Chim.jpg', 1, '<p style=\"box-sizing: border-box; margin: 0px; padding-left: 25px; position: relative; font-family: SVN-Gilroy; font-size: 14px;\">Chất liệu: Pique mắt chim</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-left: 25px; position: relative; font-family: SVN-Gilroy; font-size: 14px;\">C&ocirc;ng nghệ nhuộm Solid Dyed tạo n&ecirc;n hiệu ứng bắt mắt</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-left: 25px; position: relative; font-family: SVN-Gilroy; font-size: 14px;\">Chất liệu vải độc đ&aacute;o với hiệu ứng mắt chim độc đ&aacute;o, mới lạ v&agrave; trẻ trung</p>', '2023-02-21 06:37:07', '2023-02-21 06:37:07'),
(4, 4, 1, 'Áo polo nam coolmax', 295000, 200000, 234, 'Ao-polo-nam-cool-max.jpg', 1, '<p style=\"box-sizing: border-box; margin: 0px; padding-left: 25px; position: relative; font-family: SVN-Gilroy; font-size: 14px;\">Chất liệu: vải coolmax với cấu tr&uacute;c sợi đặc biệt</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-left: 25px; position: relative; font-family: SVN-Gilroy; font-size: 14px;\">Sợi vải bao gồm nhiều r&atilde;nh dẹt gi&uacute;p tho&aacute;ng kh&iacute;, tho&aacute;t ẩm cực tốt</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; padding-left: 25px; position: relative; font-family: SVN-Gilroy; font-size: 14px;\">&Aacute;o polo nam Coolmax&nbsp;mang lại cảm gi&aacute;c m&aacute;t mẻ, dễ chịu cho người mặc ngay cả khi vận động mạnh</p>', '2023-02-21 06:38:52', '2023-02-21 06:38:52'),
(5, 7, 1, 'Ao polo nam pique cotton', 489000, 342342, 9, 'Ao-polo-nam-pique-cotton.jpg', 1, '<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space: pre-wrap;\">Chất liệu: 97% Cotton USA + 3% Spandex</p>\r\n<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space: pre-wrap;\">+ Với chất liệu Cotton USA chất lượng cao, mang lại sự mềm mại v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt</p>\r\n<p class=\"irIKAp\" style=\"margin: 0px; color: rgba(0, 0, 0, 0.8); font-family: \'Helvetica Neue\', Helvetica, Arial, 文泉驛正黑, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'儷黑 Pro\', \'LiHei Pro\', \'Heiti TC\', 微軟正黑體, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space: pre-wrap;\">+ Co gi&atilde;n 4 chiều mang lại sự thoải m&aacute;i khi mặcBo cổ dệt bằng sợi Cotton, viền phối Polyester để đảm bảo độ đ&agrave;n hồi, chống bai v&agrave; giữ m&agrave;u qua c&aacute;c lần giặt</p>', '2023-02-21 06:58:12', '2023-02-21 06:58:12'),
(6, 4, 1, 'Đầm suông rút nhún 2 tầng', 535333, 424222, 3432, 'Dam-suong-rut-nhun-2-tang.jpg', 1, '<p style=\"box-sizing: border-box; font-family: Montserrat; margin: 0px 0px 5px; padding: 0px; line-height: 14px; font-size: 12px; color: #323030;\">- Giặt tay bằng nước lạnh</p>\r\n<p style=\"box-sizing: border-box; font-family: Montserrat; margin: 0px 0px 5px; padding: 0px; line-height: 14px; font-size: 12px; color: #323030;\">- Kh&ocirc;ng ng&acirc;m, kh&ocirc;ng tẩy</p>\r\n<p style=\"box-sizing: border-box; font-family: Montserrat; margin: 0px 0px 5px; padding: 0px; line-height: 14px; font-size: 12px; color: #323030;\">- Giặt ri&ecirc;ng c&aacute;c sản phẩm kh&aacute;c m&agrave;u</p>', '2023-02-21 07:00:25', '2023-02-21 07:00:25'),
(7, 5, 3, 'Mũ backet thêu', 145000, 135000, 11, 'Mu-Backet-theu.jpg', 1, NULL, '2023-02-22 19:17:14', '2023-02-22 19:17:14'),
(8, 7, 1, 'Áo sơ mi Nano', 489000, 450000, 43, 'Ao-so-mi-Nano-Regular.jpg', 1, '<p><span id=\"docs-internal-guid-5f849b7e-7fff-3e20-eb86-1d3e5dacb2b3\" style=\"box-sizing: border-box; font-family: Pangea, sans-serif; color: #231f20; font-size: 16px; letter-spacing: 0.42px;\">&Aacute;o sơ mi nano được l&agrave;m từ chất liệu vải nano chất lượng cao, mang tới cho đấng m&agrave;y r&acirc;u những d&ograve;ng sản phẩm kh&aacute; thoải m&aacute;i, chỉnh chu trong từng trang phục v&agrave; đặc biệt l&agrave; khiến bộ trang phục trở n&ecirc;n lịch sự hơn trong mọi ho&agrave;n cảnh.&nbsp;</span></p>', '2023-02-22 19:19:28', '2023-02-22 19:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 3, 'Ao-polo-pique-01.jpg', '2023-02-21 06:37:07', '2023-02-21 06:37:07'),
(2, 3, 'Ao-polo-pique-02.jpg', '2023-02-21 06:37:07', '2023-02-21 06:37:07'),
(3, 4, 'Ao-polo-nam-cool-max-01.jpg', '2023-02-21 06:38:52', '2023-02-21 06:38:52'),
(4, 4, 'Ao-polo-nam-cool-max-02.jpg', '2023-02-21 06:38:52', '2023-02-21 06:38:52'),
(5, 4, 'Ao-polo-nam-cool-max-03.jpg', '2023-02-21 06:38:52', '2023-02-21 06:38:52'),
(6, 5, 'Ao-polo-nam-pique-cotton-01.jpg', '2023-02-21 06:58:12', '2023-02-21 06:58:12'),
(7, 5, 'Ao-polo-nam-pique-cotton-02.jpg', '2023-02-21 06:58:12', '2023-02-21 06:58:12'),
(8, 5, 'Ao-polo-nam-pique-cotton-03.jpg', '2023-02-21 06:58:12', '2023-02-21 06:58:12'),
(10, 6, 'Dam-suong-rut-nhun-2-tang-01.jpg', '2023-02-21 07:00:25', '2023-02-21 07:00:25'),
(11, 6, 'Dam-suong-rut-nhun-2-tang-02.jpg', '2023-02-21 07:00:25', '2023-02-21 07:00:25'),
(12, 7, 'Mu-Backet-theu-01.jpg', '2023-02-22 19:17:14', '2023-02-22 19:17:14'),
(13, 7, 'Mu-Backet-theu-02.jpg', '2023-02-22 19:17:14', '2023-02-22 19:17:14'),
(14, 8, 'Ao-so-mi-Nano-Regular-01.jpg', '2023-02-22 19:19:28', '2023-02-22 19:19:28'),
(15, 8, 'Ao-so-mi-Nano-Regular-02.jpg', '2023-02-22 19:19:28', '2023-02-22 19:19:28'),
(16, 8, 'Ao-so-mi-Nano-Regular-03.jpg', '2023-02-22 19:19:28', '2023-02-22 19:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT 0,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `address`, `level`, `avatar`, `created_at`, `updated_at`, `google_id`) VALUES
(2, 'Manh Tien', 'bka1.nmtien@gmail.com', NULL, '$2y$10$4TFArxeFj1S.511/XY6qtugAP/DvhcTXkJKDdtbgL6Men5y544flG', NULL, '0358140899', NULL, 1, NULL, '2023-02-20 08:39:29', '2023-02-20 08:41:29', NULL),
(3, 'Tiến Nguyễn Mạnh', 'nguyenmanhtien14081998@gmail.com', NULL, NULL, NULL, NULL, NULL, 0, 'https://lh3.googleusercontent.com/a/AGNmyxZUYaxc-Dj6fB3Hu8aDAtgq_O2LcEtMOCfvEA7N=s96-c', '2023-02-28 00:21:04', '2023-02-28 00:21:04', '103440418159790004756'),
(4, 'Mạnh Tiến Nguyễn', 'bka.nmtien@gmail.com', NULL, NULL, NULL, NULL, NULL, 0, 'https://lh3.googleusercontent.com/a/AGNmyxYYpzqQDWlBMq-jaomb3I-V31gqBU_MDKbYf2t2=s96-c', '2023-02-28 02:34:35', '2023-02-28 02:34:35', '110414335190864041644'),
(5, 'BKAP PHP2210', 'php2210lm@gmail.com', NULL, NULL, NULL, NULL, NULL, 0, 'https://lh3.googleusercontent.com/a/AGNmyxbsAV_UCtO0xmif8ELcWgnVoRyvrRwaJrKBCl67=s96-c', '2023-03-16 02:15:20', '2023-03-16 02:15:20', '117317483347284315509');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
