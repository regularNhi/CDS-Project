-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 03, 2024 lúc 02:33 PM
-- Phiên bản máy phục vụ: 8.2.0
-- Phiên bản PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `petdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'Chờ xác nhận',
  `date` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `service_id`, `user_id`, `name`, `email`, `phone`, `status`, `date`, `time`, `created_at`, `updated_at`) VALUES
(4, 5, 1, 'Thục Thanh', 'user1@gmail.com', '32324534', 'Đã hoàn thành', '2024-09-27', '12:05', '2024-09-23 22:08:22', '2024-09-23 23:32:17'),
(5, 7, 1, 'Thục Thanh', 'user1@gmail.com', '33333333333', 'Đã xác nhận lịch hẹn', '2024-09-26', '11:10', '2024-09-23 22:48:44', '2024-09-23 23:05:22'),
(13, 11, 5, 'Nguyệt Nhi', 'nhinguyet467@gmail.com', '555555555555', 'Đã hủy đặt hẹn', '2024-09-30', '10:30', '2024-09-28 01:37:17', '2024-09-28 01:39:15'),
(14, 13, 11, 'hihi', 'user9@gmail.com', '222222222', 'Đã hoàn thành', '2024-09-29', '15:00', '2024-09-28 08:25:50', '2024-09-28 08:30:25'),
(15, 6, 19, 'Nguyễn Ngọc Nguyệt Nhi', '030237210134@st.buh.edu.vn', '555555555555', 'Đã hoàn thành', '2024-10-06', '11:00', '2024-10-03 02:28:50', '2024-10-03 07:19:27'),
(16, 7, 27, 'NgNhi', 'tukietnhi68@gmail.com', '030237210134', 'Chờ xác nhận', '2024-10-06', '10:45', '2024-10-03 06:37:54', '2024-10-03 06:37:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_user_id_fk` (`user_id`),
  KEY `cart_product_id_fk` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phonenumber`, `address`, `product_title`, `quantity`, `price`, `image`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(19, 'user3', 'user3@gmail.com', '23243534', 'Hà Nội', 'Royal Canin -Thức ăn khô dành riêng cho mèo con.', '1', '125000', '1726571843.jpg', 8, 7, '2024-09-17 05:10:44', '2024-09-17 05:10:44'),
(20, 'user4', 'user4@gmail.com', NULL, 'Hà Nội', 'Royal Canin - tốt cho tiêu hoá, dành cho chó size vừa', '1', '132000', '1726572236.jpg', 11, 8, '2024-09-17 05:12:32', '2024-09-17 05:12:32'),
(43, 'user3', 'user3@gmail.com', '23243534', 'Hà Nội', 'Snack mềm Trixie cho chó', '1', '71200', '1726403520.jpg', 6, 7, '2024-09-19 00:40:10', '2024-09-19 00:40:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(20, 'Đồ dùng cho chó', '2024-09-15 03:26:49', '2024-09-15 03:26:49'),
(18, 'Thức ăn cho chó', '2024-09-15 03:26:36', '2024-09-15 03:26:36'),
(19, 'Phụ kiện cho chó', '2024-09-15 03:26:43', '2024-09-15 03:26:43'),
(17, 'Đồ dùng cho mèo', '2024-09-15 03:26:26', '2024-09-15 03:26:26'),
(16, 'Phụ kiện cho mèo', '2024-09-15 03:26:17', '2024-09-15 03:26:17'),
(15, 'Thức ăn cho mèo', '2024-09-15 03:25:44', '2024-09-15 03:25:44'),
(21, 'Thức ăn cho thỏ', '2024-09-15 03:26:58', '2024-09-15 03:26:58'),
(22, 'Đồ dùng cho thỏ', '2024-09-15 03:27:25', '2024-09-15 03:27:25'),
(23, 'Dịch vụ khách sạn dành cho chó', '2024-09-17 07:25:18', '2024-09-17 07:25:18'),
(24, 'Dịch vụ khách sạn dành cho mèo', '2024-09-17 07:25:30', '2024-09-17 07:25:30'),
(25, 'Dịch vụ Spa trọn gói', '2024-09-19 07:41:24', '2024-09-19 07:41:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ch_favorites`
--

DROP TABLE IF EXISTS `ch_favorites`;
CREATE TABLE IF NOT EXISTS `ch_favorites` (
  `id` char(36) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `favorite_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ch_messages`
--

DROP TABLE IF EXISTS `ch_messages`;
CREATE TABLE IF NOT EXISTS `ch_messages` (
  `id` char(36) COLLATE utf8mb3_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `to_id` bigint NOT NULL,
  `body` varchar(5000) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('062ec881-a5ed-4be2-958f-47d2c347b0a4', 19, 3, 'xin ch&agrave;o', NULL, 1, '2024-10-03 02:31:02', '2024-10-03 02:44:31'),
('14c43193-81ec-4c34-95ed-6c309423465d', 19, 3, '', '{\"new_name\":\"79747622-c003-4b2d-999e-311ccd4d2a22.jpg\",\"old_name\":\"spa5kg.jpg\"}', 1, '2024-10-03 02:31:12', '2024-10-03 02:44:31'),
('21e137a1-a59c-4467-8102-cd46dba7672c', 27, 2, '', '{\"new_name\":\"62579d98-ab0d-4d53-aafe-4de4b0b94170.png\",\"old_name\":\"dogday.png\"}', 1, '2024-10-03 06:39:42', '2024-10-03 06:52:36'),
('3dccfca3-95f9-40e6-9370-4eb830e53c99', 1, 3, 'xin ch&agrave;o!', NULL, 1, '2024-10-01 22:18:14', '2024-10-01 22:25:09'),
('3dd3bab6-a490-41ce-9633-0e1abed9465d', 5, 2, 'hi', NULL, 1, '2024-09-30 04:43:06', '2024-09-30 05:07:38'),
('848bdc3b-2fdf-4bab-b1aa-395834462fc5', 1, 3, 't&ocirc;i muốn hỏi th&ecirc;m về dịch vụ tắm c&uacute;n', '{\"new_name\":\"a9ecc594-3aa8-4176-99ef-185d4f8efe8c.jpg\",\"old_name\":\"dog5kg.jpg\"}', 1, '2024-10-01 22:20:26', '2024-10-01 22:25:09'),
('8692c22d-2060-41c7-ab7e-d2452a4c298e', 5, 2, 'hello', NULL, 1, '2024-09-30 04:49:30', '2024-09-30 05:07:38'),
('9412ebe8-366f-466a-917d-036fbb6deee3', 3, 1, 'Ch&agrave;o qu&yacute; kh&aacute;ch! Cửa h&agrave;ng Fago pet ch&uacute;ng t&ocirc;i rất h&acirc;n hạnh được phục vụ qu&yacute; kh&aacute;ch', NULL, 1, '2024-10-01 22:26:26', '2024-10-01 22:26:31'),
('d47e56af-d426-4793-880c-e1b9ba702866', 2, 27, 'xin ch&agrave;o bạn!', NULL, 0, '2024-10-03 06:53:15', '2024-10-03 06:53:15'),
('d542153c-a9ee-4ccf-9b4e-79e51d9a0e4b', 27, 2, 'xin ch&agrave;o?', NULL, 1, '2024-10-03 06:39:32', '2024-10-03 06:52:36'),
('ee02dcaa-5d99-46f7-b063-a939660fb140', 2, 5, 'xin ch&agrave;o t&ocirc;i gi&uacute;p g&igrave; được cho bạn', NULL, 0, '2024-10-03 02:39:35', '2024-10-03 02:39:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 2, 'Nguyệt Nhi', 'Ồ hóa ra là vậy !', '5', '2024-09-26 07:36:16', '2024-09-26 07:36:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'user1', 'user1@gmail.com', '123455666', 'test', '2024-09-20 05:52:15', '2024-09-20 05:52:15'),
(2, 'Nguyệt Nhi', 'nhinguyet467@gmail.com', '030237210134', 'Xin chào, tôi muốn hỏi cửa hàng có mở cửa vào ngày 2/9 không?', '2024-09-26 08:01:51', '2024-09-26 08:01:51'),
(4, 'Nhi', '030237210134@st.buh.edu.vn', '123456788', 'Xin chào?', '2024-10-03 02:24:25', '2024-10-03 02:24:25'),
(5, 'Nguyệt Nhi', 'tukietnhi68@gmail.com', '030237210134', 'xin chào? cửa hàng của bạn có mở chi nhánh mới không?', '2024-10-03 06:30:02', '2024-10-03 06:30:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_09_10_095112_create_categories_table', 2),
(6, '2024_09_12_093101_create_products_table', 3),
(7, '2024_09_15_145609_create_carts_table', 4),
(8, '2024_09_16_111517_create_orders_table', 5),
(9, '2024_09_17_125620_create_services_table', 6),
(10, '2024_09_18_150716_create_comments_table', 7),
(11, '2024_09_18_150838_create_replies_table', 7),
(12, '2024_09_19_042220_create_permission_tables', 8),
(13, '2024_09_19_062042_create_bookings_table', 9),
(14, '2024_09_19_081709_add_status_field_to_bookings', 10),
(16, '2024_09_19_120510_create_contacts_table', 11),
(17, '2024_09_19_150219_drop_discount_price_from_service_table', 12),
(18, '2024_09_21_044823_create_posts_table', 13),
(19, '2024_09_21_053806_add_image_field_to_posts', 14),
(23, '2024_09_23_080544_add_google_id_field_to_users', 15),
(24, '2024_09_23_095621_add_cat_id_to_products_table', 15),
(25, '2024_09_23_101145_add_cat_id_field_to_services', 16),
(28, '2024_09_23_155157_add_post_id_to_comments_table', 17),
(29, '2024_09_24_042328_add_user_id_field_to_bookings', 18),
(30, '2024_09_27_092029_add_order_id_field_to_orders', 19),
(31, '2024_09_27_092117_add_total_price_field_to_orders', 19),
(32, '2024_09_29_113649_create_notifications_table', 20),
(33, '2024_09_30_999999_add_active_status_to_users', 21),
(34, '2024_09_30_999999_add_avatar_to_users', 21),
(35, '2024_09_30_999999_add_dark_mode_to_users', 21),
(36, '2024_09_30_999999_add_messenger_color_to_users', 21),
(37, '2024_09_30_999999_create_chatify_favorites_table', 21),
(38, '2024_09_30_999999_create_chatify_messages_table', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `product_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_user_id_fk` (`user_id`),
  KEY `order_product_id_fk` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phonenumber`, `address`, `user_id`, `product_title`, `quantity`, `price`, `total_price`, `image`, `product_id`, `payment_status`, `delivery_status`, `order_id`, `created_at`, `updated_at`) VALUES
(70, 'NgNhi', 'tukietnhi68@gmail.com', '030237210134', 'hồ chí minh', 27, 'Cần câu mèo PAW', '2', '147200', 547200, '1726403828.jpg', 7, 'Đã thanh toán qua thẻ', 'Đã hoàn thành', '10', '2024-10-03 06:35:09', '2024-10-03 07:15:32'),
(69, 'Nguyễn Ngọc Nguyệt Nhi', '030237210134@st.buh.edu.vn', '555555555555', 'miiii', 19, 'Royal Canin - tốt cho tiêu hoá, dành cho chó size vừa', '1', '132000', 157000, '1726572236.jpg', 11, 'Thanh toán khi nhận hàng', 'Đã hoàn thành', '10', '2024-10-03 04:45:05', '2024-10-03 07:15:32'),
(68, 'Nguyễn Ngọc Nguyệt Nhi', '030237210134@st.buh.edu.vn', '555555555555', 'tp hcm', 19, 'Royal Canin -Thức ăn khô dành riêng cho mèo con.', '1', '125000', 150000, '1726571843.jpg', 8, 'Thanh toán khi nhận hàng', 'Đã hoàn thành', '10', '2024-10-03 04:42:49', '2024-10-03 07:15:32'),
(67, 'Nguyễn Ngọc Nguyệt Nhi', '030237210134@st.buh.edu.vn', '555555555555', 'hà nội', 19, 'Bộ dây dắt mèo đi dạo', '1', '63200', 88200, '1726407758.jpg', 4, 'Thanh toán khi nhận hàng', 'Đã hoàn thành', '10', '2024-10-03 04:38:21', '2024-10-03 07:15:32'),
(66, 'Nguyễn Ngọc Nguyệt Nhi', '030237210134@st.buh.edu.vn', NULL, NULL, 19, 'Royal Canin - Thức ăn cho mèo tiêu hóa búi lông', '1', '135000', 302400, '1726571961.jpg', 9, 'Đã thanh toán qua thẻ', 'Đã hủy đặt hàng', '9', '2024-10-03 02:27:46', '2024-10-03 02:28:05'),
(65, 'Nguyễn Ngọc Nguyệt Nhi', '030237210134@st.buh.edu.vn', NULL, NULL, 19, 'Snack mềm Trixie cho chó', '2', '142400', NULL, '1726403520.jpg', 6, 'Đã thanh toán qua thẻ', 'Đã hủy đặt hàng', '9', '2024-10-03 02:27:46', '2024-10-03 04:37:45'),
(64, 'Nguyễn Ngọc Nguyệt Nhi', '030237210134@st.buh.edu.vn', '12345678', 'HCM city', 19, 'Mắt kính thời trang cho mèo', '1', '89000', 469200, '1726572605.jpg', 14, 'Thanh toán khi nhận hàng', 'Đã hoàn thành', '8', '2024-09-29 06:19:53', '2024-10-03 07:18:25'),
(63, 'Nguyễn Ngọc Nguyệt Nhi', '030237210134@st.buh.edu.vn', '12345678', 'HCM city', 19, 'Bộ áo và nón bí ngô cho mèo con', '1', '79200', NULL, '1726572482.jpg', 13, 'Thanh toán khi nhận hàng', 'Đã hoàn thành', '8', '2024-09-29 06:19:53', '2024-10-03 07:18:25'),
(62, 'Nguyễn Ngọc Nguyệt Nhi', '030237210134@st.buh.edu.vn', '12345678', 'HCM city', 19, 'Cây cào móng đa năng cho thỏ', '1', '276000', NULL, '1726573947.jpg', 25, 'Thanh toán khi nhận hàng', 'Đã hoàn thành', '8', '2024-09-29 06:19:53', '2024-10-03 07:18:25'),
(61, 'hihi', 'user9@gmail.com', '030237210134', 'hcm city', 11, 'Bóng nhiều loại cho thỏ', '1', '103000', 473200, '1726573805.jpg', 24, 'Đã thanh toán qua thẻ', 'Đã giao cho vận chuyển', '7', '2024-09-28 08:14:29', '2024-10-03 02:35:36'),
(60, 'hihi', 'user9@gmail.com', '030237210134', 'hcm city', 11, 'Yếm dây dắt thỏ đi dạo', '2', '90000', NULL, '1726574028.jpg', 26, 'Đã thanh toán qua thẻ', 'Đã giao cho vận chuyển', '7', '2024-09-28 08:14:29', '2024-10-03 02:35:36'),
(59, 'hihi', 'user9@gmail.com', '030237210134', 'hcm city', 11, 'Nệm êm - Nhà cho thỏ', '1', '255200', NULL, '1726573632.jpg', 23, 'Đã thanh toán qua thẻ', 'Đã giao cho vận chuyển', '7', '2024-09-28 08:14:29', '2024-10-03 02:35:36'),
(58, 'Thục Thanh', 'user1@gmail.com', '2222222222', 'Việt Nam', 1, 'Royal Canin - tốt cho tiêu hoá, dành cho chó size vừa', '3', '396000', 529000, '1726572236.jpg', 11, 'Thanh toán khi nhận hàng', 'Đã giao cho vận chuyển', '6', '2024-09-28 06:56:35', '2024-09-28 08:17:26'),
(57, 'Thục Thanh', 'user1@gmail.com', '2222222222', 'Việt Nam', 1, 'Vòng cổ cho chó', '2', '108000', NULL, '1726573074.jpg', 18, 'Thanh toán khi nhận hàng', 'Đã giao cho vận chuyển', '6', '2024-09-28 06:56:35', '2024-09-28 08:17:26'),
(56, 'Nguyệt Nhi', 'nhinguyet467@gmail.com', '32324534', 'hanoi', 5, 'Set đi dạo (gồm dây, yếm dắt, bọc đựng chất thải)', '1', '299000', 523000, '1726572956.jpg', 17, 'Đã thanh toán qua thẻ', 'Đã hoàn thành', '5', '2024-09-27 07:44:20', '2024-09-27 08:03:20'),
(55, 'Nguyệt Nhi', 'nhinguyet467@gmail.com', '32324534', 'hanoi', 5, 'Combo bát ăn uống cho chó', '1', '199000', NULL, '1726572863.jpg', 16, 'Đã thanh toán qua thẻ', 'Đã hoàn thành', '5', '2024-09-27 07:44:20', '2024-09-27 07:44:20'),
(54, 'Nguyệt Nhi', 'nhinguyet467@gmail.com', '32324534', 'hanoi', 5, 'Royal Canin - Thức ăn cho chó con', '3', '585000', 673200, '1726572066.jpg', 10, 'Thanh toán khi nhận hàng', 'Đã hoàn thành', '4', '2024-09-27 07:37:10', '2024-09-28 02:29:27'),
(53, 'Nguyệt Nhi', 'nhinguyet467@gmail.com', '32324534', 'hanoi', 5, 'Bộ dây dắt mèo đi dạo', '1', '63200', NULL, '1726407758.jpg', 4, 'Thanh toán khi nhận hàng', 'Đã hoàn thành', '4', '2024-09-27 07:37:10', '2024-09-28 02:29:27'),
(51, 'Cẩm Tú', 'camtu@gmail.com', '111111111111', 'Việt Nam', 20, 'Lồng ngủ cho chó size vừa', '1', '172500', 737500, '1726572723.jpg', 15, 'Thanh toán khi nhận hàng', 'Đã hoàn thành', '3', '2024-09-27 02:59:04', '2024-09-28 02:30:19'),
(52, 'Cẩm Tú', 'camtu@gmail.com', '111111111111', 'Việt Nam', 20, 'Royal Canin - Thức ăn cho mèo tiêu hóa búi lông', '4', '540000', NULL, '1726571961.jpg', 9, 'Thanh toán khi nhận hàng', 'Đã hoàn thành', '3', '2024-09-27 02:59:04', '2024-09-28 02:30:19'),
(71, 'NgNhi', 'tukietnhi68@gmail.com', '030237210134', 'hồ chí minh', 27, 'Royal Canin -Thức ăn khô dành riêng cho mèo con.', '3', '375000', NULL, '1726571843.jpg', 8, 'Đã thanh toán qua thẻ', 'Đã hoàn thành', '10', '2024-10-03 06:35:09', '2024-10-03 07:15:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nhinguyet467@gmail.com', '$2y$10$df8XytGX6b61SnbfQ/nVgu/uRYZ1nh89.PN22aMRCZqBti5/4PL3K', '2024-09-26 08:22:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb3_unicode_ci,
  `image` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `post_status` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `usertype` varchar(191) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `name`, `user_id`, `post_status`, `usertype`, `created_at`, `updated_at`) VALUES
(2, 'Sự thật về quan niệm thỏ thích ăn cà rốt', 'Hình ảnh thỏ nhai cà rốt xuất hiện phổ biến trong các bộ phim hoạt hình, nhưng trên thực tế, cà rốt không phải là thức ăn lý tưởng cho thỏ. Theo How Stuff Works, chế độ ăn tốt nhất cho thỏ bao gồm cỏ khô, cỏ tươi và một lượng nhỏ rau xanh. Cà rốt, nếu được cho ăn quá nhiều, có thể gây béo phì và dẫn đến các vấn đề tiêu hóa do hàm lượng đường cao trong nó.\r\n\r\nVậy tại sao chúng ta lại nghĩ rằng thỏ thích ăn cà rốt? Điều này nhiều khả năng xuất phát từ hình tượng chú thỏ thông minh Bugs Bunny trong loạt phim hoạt hình nổi tiếng cách đây hơn 70 năm. Chú thỏ thường nhai củ cà rốt, và dần dần hình ảnh này đã in sâu vào tâm trí mọi người, khiến quan niệm thỏ ăn cà rốt trở nên phổ biến.\r\n\r\nCác nhà làm phim hoạt hình có thể đã lấy cảm hứng từ hình ảnh các ngôi sao điện ảnh ngậm điếu xì gà trong các bộ phim thập niên 1930-1940, để tạo nên biểu tượng thỏ Bugs Bunny cùng với củ cà rốt \"trứ danh\". Tuy nhiên, trong tự nhiên, thỏ không ăn cà rốt nhiều như chúng ta thường tưởng.', '1726909698.jpg', 'manager', '3', 'Đang hoạt động', 'manager', '2024-09-21 02:08:18', '2024-09-21 02:08:18'),
(3, 'Một số điều cần biết về chuột Hamster', '1. Kích thước và đặc điểm\r\nCó 24 loài chuột Hamster được phát hiện với kích thước đa dạng. Loài phổ biến nhất như Hamster Bear (Hamster Syria) dài từ 13-15 cm, trong khi Hamster Lùn (Hamster Robo) chỉ dài khoảng 5 cm. Loài lớn nhất là Hamster châu Âu, dài tới 35 cm và nặng gần 1 kg. Hamster có chân và đuôi ngắn, tai nhỏ, thân hình mập mạp, và khoang miệng rộng để tích trữ thức ăn.\r\n\r\n2. Môi trường sống\r\nHamster thích môi trường khô ráo, ấm áp và sạch sẽ. Ban đầu được phát hiện ở Syria, chúng cũng sống tại các vùng khác như Hy Lạp, Romani, Trung Quốc. Do đã thích nghi với môi trường sa mạc và thảo nguyên, Hamster rất nhạy cảm với môi trường ẩm ướt, dễ mắc bệnh nếu không sống trong điều kiện khô thoáng.\r\n\r\n3. Tập tính\r\nHamster là loài sống về đêm, hoạt động chủ yếu khi trời tối. Chúng có thể chạy hàng cây số trong tự nhiên để tìm thức ăn và trốn tránh kẻ thù. Hamster có thói quen tích trữ thức ăn trong khoang miệng và mang về tổ để dự trữ. Vì vậy, bạn nên tránh cho Hamster quá nhiều thức ăn vì thức ăn thừa có thể thối, mốc và gây bệnh.\r\n\r\n4. Thức ăn của Hamster\r\nHamster ăn chủ yếu thực vật, củ quả như cà rốt, dưa chuột, táo, chuối, rau cải và các loại hạt như ngô, hướng dương, thóc. Chúng cũng thích ăn bánh quy, nhưng nên hạn chế để tránh béo phì. Không nên cho Hamster ăn trái cây họ cam (như cam, bưởi) vì axit citric có thể gây ngộ độc. Tránh thức ăn có muối, giấm và phô mai, vì các loại này có thể gây bệnh tiêu hóa hoặc làm chúng có mùi khó chịu.\r\n\r\nBằng cách chăm sóc chuột Hamster đúng cách, bạn có thể đảm bảo chúng sống khỏe mạnh và vui vẻ.', '1726909737.jpg', 'manager', '3', 'Đang hoạt động', 'manager', '2024-09-21 02:08:57', '2024-09-21 02:08:57'),
(4, 'Người phụ nữ nuôi hơn 1.000 con mèo làm thú cưng', 'Bà Lynea Lattanzio, 67 tuổi, sống tại California, đã nhận nuôi nhiều mèo đến mức căn nhà năm phòng ngủ của bà không còn chỗ ở. Sau khi ly hôn, bà cảm thấy cô đơn và bắt đầu yêu mèo. Đến nay, bà đã chăm sóc khoảng 28.000 con mèo.\r\n\r\nVới tình yêu dành cho loài mèo, bà thành lập trung tâm bảo vệ mèo \"Vương quốc mèo trên sông Kings\", nơi bảo vệ những con mèo bị bỏ rơi, với phương châm \"không chuồng, không xích, không bắt giết\".\r\n\r\nHiện bà sống cùng khoảng 1.100 con mèo. Dù tốn nhiều thời gian, công sức và tiền bạc, bà vẫn tận tâm chăm sóc chúng. Công việc của bà đã truyền cảm hứng cho nhiều người yêu mèo, thu hút nhiều tình nguyện viên giúp đỡ tại trung tâm.', '1726930377.jpg', 'manager', '3', 'Đang hoạt động', 'manager', '2024-09-21 02:09:43', '2024-09-21 07:52:57'),
(5, '5 sự thật thú vị về sóc', 'Loài sóc là động vật nhỏ bé, dễ thương và có nhiều sự thật thú vị. Dưới đây là 5 sự thật nổi bật nhất về loài sóc:\r\n\r\nSóc có thể \"bay\": Dù không thực sự bay như chim, sóc có khả năng nhảy xa và di chuyển linh hoạt giữa các cây. Chúng có thể nhảy gấp đôi chiều dài cơ thể mình và sử dụng đuôi cùng cơ thể để giữ thăng bằng và kiểm soát khi di chuyển trong không trung.\r\n\r\nTìm lại kho báu: Sóc thường giấu thức ăn ở nhiều nơi, bao gồm trên cây và dưới đất. Điều đặc biệt là chúng có thể nhớ và tìm lại những nơi đã giấu thức ăn sau một thời gian dài, nhờ vào việc sử dụng các mốc địa lý và cảm giác không gian.\r\n\r\nKhả năng ghi nhớ mạnh mẽ: Sóc có bộ não phát triển, cho phép chúng nhớ vị trí giấu thức ăn trong suốt mùa đông. Khả năng ghi nhớ này giúp chúng tồn tại trong những thời kỳ thức ăn khan hiếm.\r\n\r\nMắt của sóc: Mắt sóc có khả năng xoay linh hoạt, cho phép chúng quan sát từ nhiều góc độ khác nhau. Điều này giúp chúng tìm kiếm thức ăn và tránh các mối đe dọa một cách hiệu quả. Mắt sóc cũng có thể nhận ánh sáng yếu, giúp chúng nhìn rõ trong điều kiện thiếu sáng. Màu mắt của sóc cũng rất đa dạng, từ đen, nâu, xanh đến đỏ.\r\n\r\nThông minh và linh hoạt: Sóc có trí não phát triển cao, giúp chúng học hỏi nhanh và giải quyết vấn đề hiệu quả. Chúng có khả năng thích ứng với môi trường, nhận biết các mô hình, và tương tác với đồng loại trong bầy đàn. Sóc cũng có thể phân biệt các đối tượng, nhận diện hình ảnh và âm thanh chính xác.', '1726930907.jpg', 'admin1', '2', 'Đang hoạt động', 'admin', '2024-09-21 08:01:47', '2024-09-21 08:01:47'),
(6, 'Cách nhận biết mèo thông minh', 'Bạn muốn mua một chú mèo để làm bạn nhưng không biết chọn mèo thông minh như thế nào? Hầu hết mèo được chăm sóc cẩn thận đều khỏe mạnh và thông minh, nhưng sẽ có những chú mèo tinh khôn hơn. Dưới đây là cách nhận biết mèo khôn:\r\n\r\n1. Đặc điểm cơ thể mèo\r\nMắt sáng: Đôi mắt sáng thường phản ánh sự thông minh của mèo.\r\nLông mượt: Bộ lông mượt là dấu hiệu của sức khỏe tốt.\r\nDáng đi nhanh nhẹn: Quan sát dáng đi của mèo; mèo thông minh thường di chuyển linh hoạt.\r\nTiếng kêu: Âm thanh trong, khỏe khoắn.\r\nKiểm tra da: Nếu khi bế mèo, hai chân sau của chúng co lại, đó là dấu hiệu tốt; nếu chân thả lỏng, không nên chọn.\r\n2. Biểu hiện của mèo mẹ\r\nNếu có cơ hội quan sát cả đàn mèo con và mèo mẹ, bạn có thể chọn mèo dựa trên sự chăm sóc của mèo mẹ. Mèo mẹ thường biết rõ những đứa con thông minh hơn. Những chú mèo con được mèo mẹ ôm ấp và chăm sóc nhiều thường sẽ nhanh nhẹn và khôn ngoan hơn. Nếu mèo mẹ thường xuyên chơi đùa hoặc liếm láp một chú mèo nào đó, đó chính là dấu hiệu của một bé mèo thông minh và ngoan ngoãn.', '1726930956.jpg', 'admin1', '2', 'Đang hoạt động', 'admin', '2024-09-21 08:02:36', '2024-09-21 08:02:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cat_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `category`, `quantity`, `price`, `discount_price`, `image`, `created_at`, `updated_at`, `cat_id`) VALUES
(4, 'Bộ dây dắt mèo đi dạo', 'Phần yếm ôm cơ thể bé mèo, vừa đảm bảo an toàn vừa thoải mái tuyệt đối. Dây dắt có thể điều chỉnh độ dài linh hoạt, phù hợp với mọi kích thước của mèo.', 'Phụ kiện cho mèo', '4', '79000', '63200', '1726407758.jpg', '2024-09-15 04:37:53', '2024-09-15 06:42:38', 16),
(2, 'Vòng cổ có chuông', 'Vòng cổ cho mèo siêu dễ thương, Thiết kế nhỏ gọn, nhiều màu sắc, chất liệu mềm mại, an toàn cho làn da của mèo.', 'Phụ kiện cho mèo', '20', '39000', '31200', 'dbf91ae3587b9f760f5a3339b92afa50_tn.jpg', NULL, '2024-09-15 04:38:57', 16),
(6, 'Snack mềm Trixie cho chó', 'Trixie Soft Snack Bonies gói 75g - Snack mềm cho chó, làm từ thịt bò và gia cầm tươi ngon, giàu protein, cung cấp năng lượng cho chó. Sản phẩm  giúp làm sạch răng miệng, giảm mảng bám và cao răng, phù hợp cho chó con từ 3 tháng tuổi trở lên.', 'Thức ăn cho chó', '18', '89000', '71200', '1726403520.jpg', '2024-09-15 05:32:00', '2024-09-15 05:32:00', 18),
(7, 'Cần câu mèo PAW', 'Đồ chơi cần câu cho mèo PAW, thiết kế hình con chuột bằng lông vũ, chất liệu vải nhung mềm mại, an toàn cho mèo. Cần câu bằng nhựa dẻo, dài 40cm, giúp bạn dễ dàng điều khiển. Sản phẩm có nhiều màu sắc tươi sáng, kích thích thị giác của mèo. Giúp mèo rèn luyện khả năng bắt mồi, giảm căng thẳng, tăng cường tình cảm giữa bạn và mèo.', 'Đồ dùng cho mèo', '15', '92000', '73600', '1726403828.jpg', '2024-09-15 05:37:08', '2024-09-15 05:37:08', 17),
(8, 'Royal Canin -Thức ăn khô dành riêng cho mèo con.', 'Thức ăn khô cao cấp dành riêng cho mèo con, giúp tăng cường hệ miễn dịch, hỗ trợ sự phát triển khỏe mạnh toàn diện. Với công thức độc đáo, sản phẩm cung cấp đầy đủ dưỡng chất cần thiết cho giai đoạn vàng của mèo con.', 'Thức ăn cho mèo', '7', '125000', NULL, '1726571843.jpg', '2024-09-17 04:17:23', '2024-09-17 04:17:23', 15),
(9, 'Royal Canin - Thức ăn cho mèo tiêu hóa búi lông', 'Sản phẩm giúp đặc trị cho mèo dễ bị tắc lông, viêm búi lông. Kiểm soát búi lông cho mèo giúp bổ sung chất xơ tự nhiên, giúp bài tiết búi lông qua đường tiêu hóa cho mèo. Trị bệnh búi lông cho mèo. Hạt mã đề hỗ trợ tiêu hóa cho mèo, phòng các bệnh về đường tiêu hóa.', 'Thức ăn cho mèo', '14', '135000', NULL, '1726571961.jpg', '2024-09-17 04:19:21', '2024-09-17 04:19:21', 15),
(10, 'Royal Canin - Thức ăn cho chó con', 'Sản phẩm được nghiên cứu để cung cấp dinh dưỡng theo nhu cầu thực tế của chó con. Duy trì sức đề kháng cho chó con: chất chống oxy hóa CELT. Hỗ trợ hệ tiêu hóa hoạt động ổn định: L.I.P, đường FOS. Cung cấp dinh dưỡng cho chó toàn diện: chế biến theo công thức cung cấp năng lượng cao', 'Thức ăn cho chó', '15', '195000', NULL, '1726572066.jpg', '2024-09-17 04:21:06', '2024-09-17 04:21:06', 18),
(11, 'Royal Canin - tốt cho tiêu hoá, dành cho chó size vừa', 'Với công thức đặc chế riêng cho nhu cầu dinh dưỡng của chó trưởng thành. Sản phẩm được nghiên cứu để cung cấp dinh dưỡng theo nhu cầu thực tế của chó trưởng thành.', 'Thức ăn cho chó', '30', '165000', '132000', '1726572236.jpg', '2024-09-17 04:23:56', '2024-09-17 04:23:56', 18),
(12, 'Nhà cây cho mèo PCT60H', 'Nhà cây cho mèo Cat Tree PCT60H là một khu vui chơi, giải trí cho mèo cưng. Nhà cây được thiết kế thành nhiều tầng khác nhau.Kích thước: 75 × 45 × 148 cm', 'Đồ dùng cho mèo', '5', '2500000', NULL, '1726572330.jpg', '2024-09-17 04:25:30', '2024-09-17 04:25:30', 17),
(13, 'Bộ áo và nón bí ngô cho mèo con', 'Bộ trang phục Halloween bằng vải nhung mềm mịn, tạo cảm giác thoải mái cho mèo con. Mũ bí ngô được thiết kế vừa vặn, không gây vướng víu, giúp bé tự tin sải bước trong đêm hội.', 'Phụ kiện cho mèo', '12', '99000', '79200', '1726572482.jpg', '2024-09-17 04:28:02', '2024-09-17 04:28:02', 16),
(14, 'Mắt kính thời trang cho mèo', 'Mắt kính có nhiều màu sắc và kiểu dáng đa dạng, giúp bạn lựa chọn được chiếc kính phù hợp với phong cách của mèo.', 'Phụ kiện cho mèo', '36', '89000', NULL, '1726572605.jpg', '2024-09-17 04:30:05', '2024-09-17 04:30:05', 16),
(15, 'Lồng ngủ cho chó size vừa', 'Lồng ngủ được trang bị đệm lót mềm mại, tạo cảm giác thoải mái cho thú cưng. Lồng có cửa lưới giúp không gian bên trong luôn thoáng mát.', 'Đồ dùng cho chó', '10', '215500', '172500', '1726572723.jpg', '2024-09-17 04:32:03', '2024-09-17 04:32:03', 20),
(16, 'Combo bát ăn uống cho chó', 'Được làm từ chất liệu sứ cao cấp, không chứa chất độc hại, an toàn cho sức khỏe của thú cưng. Bao gồm một bát đựng thức ăn khô và một bát đựng nước, thiết kế hài hòa, tạo điểm nhấn cho không gian nhà bạn.', 'Đồ dùng cho chó', '20', '250500', '199000', '1726572863.jpg', '2024-09-17 04:34:23', '2024-09-17 04:34:23', 20),
(17, 'Set đi dạo (gồm dây, yếm dắt, bọc đựng chất thải)', 'Thiết kế thời trang, chất liệu bền đẹp, đảm bảo sự thoải mái cho thú cưng. Yếm được làm từ chất liệu thoáng mát, không gây kích ứng da. Dây dắt chắc chắn, dễ điều khiển. Túi đựng phân tiện lợi, giúp bạn giữ vệ sinh môi trường.', 'Phụ kiện cho chó', '6', '299000', NULL, '1726572956.jpg', '2024-09-17 04:35:56', '2024-09-17 04:35:56', 19),
(18, 'Vòng cổ cho chó', 'Vòng cổ da cao cấp, mang đến vẻ ngoài sang trọng và đẳng cấp cho chú chó của bạn. Chất liệu da thật mềm mại, bền bỉ, được gia công tỉ mỉ, đảm bảo sự thoải mái và an toàn cho thú cưng. Khóa kim loại chắc chắn, dễ dàng điều chỉnh kích cỡ. Sản phẩm hoàn hảo cho những buổi dạo phố hoặc những sự kiện đặc biệt.', 'Phụ kiện cho chó', '16', '54000', NULL, '1726573074.jpg', '2024-09-17 04:37:54', '2024-09-17 04:37:54', 19),
(19, 'Áo chuối cho cún', 'Chiếc áo chuối bé xíu này sẽ biến chú cún yêu của bạn thành một quả chuối siêu đáng yêu. Với chất liệu mềm mại, thoáng mát, bé cún sẽ thoải mái chạy nhảy cả ngày dài', 'Phụ kiện cho chó', '19', '120000', '96000', '1726573178.jpg', '2024-09-17 04:39:38', '2024-09-17 04:39:38', 19),
(20, 'Little One - 28 loại thực phẩm khác nhau (cà rốt, viên cỏ, lúa mì, cây yucca,...)', 'Thức ăn hạt nén dinh dưỡng Little One Rabbit, dành cho thỏ con,thỏ lớn,thành phần thơm ngon,giàu vitamin,khoáng chất. Với 28 loại thực phẩm khác nhau (cà rốt, viên cỏ, lúa mì, cây yucca,...) -> Sản phẩm đến từ Hãng Little One của Đức', 'Thức ăn cho thỏ', '8', '152000', NULL, '1726573320.jpg', '2024-09-17 04:42:00', '2024-09-17 04:42:00', 21),
(21, 'Little One Green Valey - thêm nhiều nguyên liệu tốt cho thỏ như hạt hướng dương, bột táo, hạt lanh,..)', 'Được làm từ các nguyên liệu tự nhiên như cỏ, rau củ, không chứa chất bảo quản, tạo màu nhân tạo hay các chất phụ gia độc hại, đảm bảo an toàn cho sức khỏe của thỏ (thêm nhiều nguyên liệu tốt cho thỏ như hạt hướng dương, bột táo, hạt lanh,..)', 'Thức ăn cho thỏ', '9', '232000', '185600', '1726573431.jpg', '2024-09-17 04:43:51', '2024-09-17 04:43:51', 21),
(22, 'Snack cho thỏ - Little One Treat Toy', 'Với hương vị tự nhiên, thơm ngon, Little One sẽ kích thích vị giác của thỏ, giúp chúng ăn ngon miệng hơn. Tô được làm từ cỏ nơi đồng cỏ và hoa cúc được sấy khô', 'Thức ăn cho thỏ', '12', '119500', NULL, '1726573536.jpg', '2024-09-17 04:45:36', '2024-09-17 04:45:36', 21),
(23, 'Nệm êm - Nhà cho thỏ', 'một chiếc giường nhỏ xinh, được thiết kế đặc biệt để cung cấp cho những người bạn nhỏ lông xù một không gian nghỉ ngơi thoải mái và an toàn. Với chất liệu mềm mại, êm ái, giường nệm sẽ giúp thỏ cảm thấy thư giãn và dễ chịu sau một ngày vận động.', 'Đồ dùng cho thỏ', '11', '319000', '255200', '1726573632.jpg', '2024-09-17 04:47:12', '2024-09-17 04:47:12', 22),
(24, 'Bóng nhiều loại cho thỏ', 'Với nhiều hình dáng, màu sắc và chất liệu khác nhau, sẽ mang đến cho chú thỏ nhà bạn những giờ phút vui chơi thật sảng khoái.', 'Đồ dùng cho thỏ', '5', '129000', '103000', '1726573805.jpg', '2024-09-17 04:50:05', '2024-09-17 04:50:05', 22),
(25, 'Cây cào móng đa năng cho thỏ', 'Với thiết kế hình cây độc đáo, sản phẩm này không chỉ là nơi để thỏ mài móng mà còn là một khu vui chơi giải trí lý tưởng. Các sợi sisal tự nhiên giúp bảo vệ móng của thỏ và tạo cảm giác thoải mái khi cào cấu. Những chiếc \"cà rốt\" treo lơ lửng sẽ kích thích tính tò mò và khả năng vận động của thú cưng.\"', 'Đồ dùng cho thỏ', '14', '345000', '276000', '1726573947.jpg', '2024-09-17 04:52:27', '2024-09-17 04:52:27', 22),
(26, 'Yếm dây dắt thỏ đi dạo', 'Yếm dắt mềm mại, không gây kích ứng da, giúp thỏ của bạn cảm thấy thoải mái và thư giãn trong suốt chuyến đi. Thiết kế thông thoáng giúp thú cưng không bị bí bách.\"', 'Đồ dùng cho thỏ', '18', '45000', NULL, '1726574028.jpg', '2024-09-17 04:53:48', '2024-09-17 04:53:48', 22),
(28, 'Lược chải lông cho chó', 'Lược chải lông chó mèo đầu lưỡi mềm Pet Comb giúp cho thú cưng nhà bạn có bộ lông đẹp ngay tại nhà. Tay cầm vừa vặn có lớp nhựa chống trơn trượt. Bạn có thể dễ dàng sử dụng, chải từng lớp lông rối, rụng của thú cưng một cách hiệu quả.', 'Đồ dùng cho chó', '16', '85000', '75000', '1727583451.png', '2024-09-28 21:17:31', '2024-09-28 21:17:31', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `replies`
--

DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_id` bigint DEFAULT NULL,
  `reply` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rep_user_id_fk` (`user_id`),
  KEY `rep_cmt_id_fk` (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `replies`
--

INSERT INTO `replies` (`id`, `name`, `comment_id`, `reply`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Thục Thanh', 1, 'test típ', 1, '2024-09-23 08:38:53', '2024-09-23 08:38:53'),
(2, 'Thục Thanh', 2, 'chán', 1, '2024-09-23 08:49:31', '2024-09-23 08:49:31'),
(3, 'Nguyễn Ngọc Nguyệt Nhi', 4, 'đồng ý!', 19, '2024-09-23 20:48:42', '2024-09-23 20:48:42'),
(4, 'Thục Thanh', 5, 'Thông tin hữu ích bạn nhỉ?', 1, '2024-09-26 07:37:19', '2024-09-26 07:37:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cat_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `services_cat_id_foreign` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `room_title`, `category`, `price`, `description`, `image`, `created_at`, `updated_at`, `cat_id`) VALUES
(5, 'Khách sạn dành cho chó dưới 5kg', 'Dịch vụ khách sạn dành cho chó', '120000', 'Đây là \"resort 5 sao\" dành riêng cho những bé chó nhỏ! Tại đây, các bé được ở phòng riêng thoải mái, có giường êm, điều hòa mát rượi. Nhân viên sẽ chăm sóc các bé chu đáo như ở nhà!', '1726756261.png', '2024-09-19 07:31:01', '2024-09-20 23:22:33', 23),
(6, 'Khách sạn dành cho chó từ 5kg đến 10kg', 'Dịch vụ khách sạn dành cho chó', '150000', 'Khách sạn cho các \"boss bự\" có phòng siêu rộng, tha hồ lăn lộn, chạy nhảy mà không lo chật chội. Không gian thoáng mát, rộng rãi giúp các bé tận hưởng kỳ nghỉ không lo gò bó.', '1726756311.png', '2024-09-19 07:31:51', '2024-09-19 07:31:51', 23),
(7, 'Khách sạn dành cho chó gửi trong ngày', 'Dịch vụ khách sạn dành cho chó', '98000', 'Khách sạn cho chó còn nhận gửi trong ngày, là nơi lý tưởng để các boss được chăm sóc và vui chơi an toàn, giúp bạn yên tâm làm việc suốt ngày mà không lo lắng!', '1726756388.webp', '2024-09-19 07:33:08', '2024-09-19 07:33:08', 23),
(8, 'Khách sạn dành cho mèo dưới 3kg', 'Dịch vụ khách sạn dành cho mèo', '89000', 'Khách sạn cho mèo là thiên đường nghỉ dưỡng cho “boss” mèo khi “sen” vắng nhà. Với không gian sạch sẽ, thoáng mát và yên tĩnh, các bé mèo sẽ luôn cảm thấy thư giãn như ở nhà.', '1726756468.png', '2024-09-19 07:34:28', '2024-09-19 07:34:28', 24),
(9, 'Khách sạn dành cho mèo trên 3kg', 'Dịch vụ khách sạn dành cho mèo', '109000', 'Fago Pet cũng chào mừng các bé mèo lớn đến với khách sạn thú cưng của Fago, mang đến không gian rộng rãi và thoải mái, phù hợp cho những \"boss\" lớn.', '1726756619.jpg', '2024-09-19 07:36:59', '2024-09-19 07:36:59', 24),
(10, 'Khách sạn dành cho mèo gửi trong ngày', 'Dịch vụ khách sạn dành cho mèo', '60000', 'Bạn bận công việc đột xuất và cần một nơi chăm sóc các bé mèo trong ngày? Hãy đến với dịch vụ gửi trong ngày của Fago Pet. Với đồ ăn ngon và khu vui chơi xịn xò!!', '1726756774.jpg', '2024-09-19 07:39:34', '2024-09-19 07:39:34', 24),
(11, 'Spa trọn gói cho bé dưới 5kg', 'Dịch vụ Spa trọn gói', '180000', 'Gói spa dành cho thú cưng nhỏ bao gồm tắm gội với sản phẩm dịu nhẹ, cắt tỉa lông theo yêu cầu, vệ sinh tai, cắt móng và xịt dưỡng lông. Dịch vụ này đặc biệt chú trọng đến sự an toàn và thoải mái cho các bé thú cưng nhỏ nhắn, giúp chúng trở nên gọn gàng và dễ thương hơn.', '1726758264.jpg', '2024-09-19 08:04:24', '2024-09-19 08:04:24', 25),
(12, 'Spa trọn gói cho bé từ 5kg đến 10kg', 'Dịch vụ Spa trọn gói', '250000', 'Gói spa cho thú cưng trung bình bao gồm tắm gội với sản phẩm đặc biệt giúp chăm sóc lông và da, cắt tỉa lông phù hợp với giống và kiểu dáng, vệ sinh tai và móng kỹ lưỡng. Đối với nhóm cân nặng này, quy trình chăm sóc được thực hiện kỹ càng hơn để đảm bảo sức khỏe và vẻ đẹp tối ưu cho pet của bạn.', '1726758470.jpg', '2024-09-19 08:07:50', '2024-09-28 21:37:11', 25),
(13, 'Spa trọn gói dành cho bé trên 10kg', 'Dịch vụ Spa trọn gói', '300000', 'Gói spa cho thú cưng lớn hơn bao gồm tắm gội với sản phẩm dưỡng ẩm sâu, chăm sóc lông chuyên biệt, cắt tỉa lông theo yêu cầu, vệ sinh tai, cắt móng và kiểm tra da để phát hiện các vấn đề tiềm ẩn. Đặc biệt, dịch vụ này chú trọng đến việc thư giãn và giảm căng thẳng cho thú cưng có kích thước lớn, giúp chúng cảm thấy thoải mái và dễ chịu suốt quá trình spa.', '1726758649.jpg', '2024-09-19 08:10:49', '2024-09-19 08:10:49', 25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `email`, `google_id`, `email_verified_at`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'Thục Thanh', '2222222222', 'Việt Nam', 'user1@gmail.com', NULL, '2024-09-21 15:48:16', '$2y$10$A9TfgudWAyGiEIJkGi2JEu5uRkOy/OSGmaCtiVBoJkR.28s4lsEKe', 'user', NULL, '2024-09-09 04:44:05', '2024-10-01 22:25:07', 1, 'avatar.png', 0, NULL),
(2, 'admin1', '030237210134', NULL, 'admin1@gmail.com', NULL, '2024-09-21 15:48:33', '$2y$10$JKNht3.xoCRudYpD90s5kuBF59M1lmbg61oWZmKHVGRhYPUVu4/3a', 'admin', NULL, '2024-09-09 04:44:28', '2024-09-29 02:31:56', 0, 'avatar.png', 0, NULL),
(3, 'manager', '030237210134', 'hcm city', 'manager@gmail.com', NULL, '2024-09-21 15:49:10', '$2y$10$hO9P1puDyDhP/FV.fGSTv.nsFOCjQLG/msmCu440oXCnvwCi8MaG2', 'manager', NULL, '2024-09-09 04:44:44', '2024-09-21 06:47:34', 0, 'avatar.png', 0, NULL),
(4, 'admin2', '12345678', NULL, 'admin2@gmail.com', NULL, '2024-09-21 15:49:41', '$2y$10$5hIn9avYPFVOV0xj7wAx/uFTC40K0WCNNIpsggwv226P8.qasZKha', 'admin', NULL, '2024-09-10 07:33:58', '2024-09-29 02:34:11', 0, 'avatar.png', 0, NULL),
(5, 'Nguyệt Nhi', '32324534', 'hanoi', 'nhinguyet467@gmail.com', NULL, '2024-09-21 15:49:51', '$2y$10$t.BqPODV2ZliY5cU033qr.9ISdaKxt66JWDtDgqyA/qY3NQ/sm8zC', 'user', NULL, '2024-09-16 05:30:56', '2024-09-30 04:48:59', 0, 'avatar.png', 0, '#2180f3'),
(7, 'user3', '23243534', 'Hà Nội', 'user3@gmail.com', NULL, NULL, '$2y$10$koS262GxR5eX1q.LAJs1lu4.c4RcQdX6gjK.B4HSjhblZAI349roO', 'user', NULL, '2024-09-17 05:10:36', '2024-09-17 05:10:36', 0, 'avatar.png', 0, NULL),
(22, 'NNHI', '666666666', NULL, 'admin3@gmail.com', NULL, NULL, '$2y$10$DkLmH4EuQkuN3svr2eDwPOeJZ1IzPQwdbJKLwdyARHb5t0e/Szoce', 'admin', NULL, '2024-09-27 06:58:22', '2024-09-27 06:58:22', 0, 'avatar.png', 0, NULL),
(12, 'user2', '1324325', 'tp.hcm', 'user2@gmail.com', NULL, NULL, '$2y$10$d3XzEOeX2nJGvos6mH1tAeG0ktvBZzRRd0OOB46al9ZsCHBpbrCdO', 'user', NULL, '2024-09-18 04:28:07', '2024-09-18 04:28:07', 0, 'avatar.png', 0, NULL),
(27, 'NgNhi', '030237210134', 'hồ chí minh', 'tukietnhi68@gmail.com', NULL, '2024-10-03 06:19:54', '$2y$10$fIT0oO6EAt0JE3eBY68b0.nhZpecal00PpDTyylEris6kT.BY859.', 'user', NULL, '2024-10-03 06:19:25', '2024-10-03 06:31:58', 0, 'avatar.png', 0, NULL),
(19, 'Nguyễn Ngọc Nguyệt Nhi', NULL, NULL, '030237210134@st.buh.edu.vn', '117363971218143088801', NULL, '$2y$10$VuvuEygIdrR3Yos0mbFtju9gJ6BZwP7EP4/sNqYw8v5WnmgKhgz9u', 'user', NULL, '2024-09-23 20:48:09', '2024-09-23 20:48:09', 0, 'avatar.png', 0, NULL),
(20, 'Cẩm Tú', '111111111111', 'Việt Nam', 'camtu@gmail.com', NULL, NULL, '$2y$10$5zUIX08Vtb3o3o6FuOfTzebeg22e1mJwPyJtJmf/nnpnYn60gWN32', 'user', NULL, '2024-09-25 08:38:30', '2024-09-25 08:38:30', 0, 'avatar.png', 0, NULL),
(26, 'nhinhi', '555555555555', NULL, 'admin5@gmail.com', NULL, NULL, '$2y$10$7vE5xi3Crvd.9Dd1XEEiUej4L1fVcloVA/aP8bh1op5wjrfz8w8GS', 'admin', NULL, '2024-10-03 02:44:10', '2024-10-03 02:44:10', 0, 'avatar.png', 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
