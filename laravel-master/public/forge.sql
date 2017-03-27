-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-03-26 16:05:04
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forge`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE `admins` (
  `adminid` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`adminid`, `name`, `account_number`, `email`, `password`, `remember_token`, `create_time`, `update_time`) VALUES
(1, '超级管理员', 'admin', '', '$2y$10$C3JYSQt9G7i0PX/dNZCDuuFOtKxCict7GhCfdIxFAkLYz7zkkld.m', 'D7HcDchR3eeNr6Nu4owonib9K6ilAYteNJUu4bFvgLiVLlISR2a1mY0EwIbM', 1490492486, 1490492486);

-- --------------------------------------------------------

--
-- 表的结构 `admins_`
--

CREATE TABLE `admins_` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台管理员表' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `short_description` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL,
  `visibility` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_keywords` varchar(100) NOT NULL,
  `meta_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类目录表';

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `level`, `title`, `sub_title`, `short_description`, `description`, `image`, `visibility`, `status`, `created_at`, `updated_at`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 0, '测试', '测试测试', '分类简介', '分类描述', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(2, 0, '测试', '测试测试', '分类简介', '分类描述', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(3, 0, '测试', '测试测试', '分类简介', '分类描述', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(4, 0, '测试', '测试测试', '分类简介', '分类描述', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(5, 0, '测试', '测试测试', '分类简介', '分类描述', '', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', ''),
(6, 0, '测试2', '测试测试22222', '分类简介22', '分类描述222', '', 1, 1, '2017-03-26 08:08:43', '2017-03-26 08:08:43', '', '', ''),
(7, 0, '测试2', '测试测试22222', '分类简介', '分类描述', '', 1, 1, '2017-03-26 08:09:21', '2017-03-26 08:09:21', '', '', ''),
(8, 0, '测试33333333', '测试测试3333333333333', '分类简介33333333', '分类描述333333333333333333', '', 1, 1, '2017-03-26 08:09:37', '2017-03-26 08:09:37', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `category_product`
--

CREATE TABLE `category_product` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类目录产品表';

--
-- 转存表中的数据 `category_product`
--

INSERT INTO `category_product` (`category_id`, `product_id`) VALUES
(0, 50),
(0, 51),
(0, 52),
(0, 53),
(0, 54),
(0, 55),
(0, 56),
(0, 57),
(0, 58),
(0, 72),
(0, 73);

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_25_050114_create_admins_table', 2);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `length` int(11) NOT NULL DEFAULT '0',
  `depth` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品表';

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `status`, `sku`, `title`, `sub_title`, `qty`, `cost`, `price`, `length`, `depth`, `height`, `weight`, `short_description`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:10:05', '2017-03-26 10:10:05'),
(3, 1, '1058d7941792884', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述1111111', '2017-03-26 10:12:56', '2017-03-26 10:12:56'),
(5, 1, '1058d794e33dbac', '测试1', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述1111111', '2017-03-26 10:16:09', '2017-03-26 10:16:09'),
(6, 1, '1058d794ee1a7b1', '测试1', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述1111111', '2017-03-26 10:16:43', '2017-03-26 10:16:43'),
(10, 1, '1058d795630fa9b', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:18:17', '2017-03-26 10:18:17'),
(11, 1, '1058d79591ead2d', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:39:41', '2017-03-26 10:39:41'),
(12, 1, '1058d79acd46e8a', '测试2', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:41:27', '2017-03-26 10:41:27'),
(15, 1, '1058d79acd46e8a.358d', '测试2', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:43:54', '2017-03-26 10:43:54'),
(18, 1, '1058d79b9d9c567.358d', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:44:55', '2017-03-26 10:44:55'),
(20, 1, '1058d79bca34f4d.358d', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:46:05', '2017-03-26 10:46:05'),
(22, 1, '1058d79c05ad6a8.358d', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:46:38', '2017-03-26 10:46:38'),
(23, 1, '1058d79cd3641dd.358d', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:50:07', '2017-03-26 10:50:07'),
(25, 1, '1058d79d6d9fe33.358d', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:52:37', '2017-03-26 10:52:37'),
(26, 1, '1058d79db1ecc4f.358d', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:53:44', '2017-03-26 10:53:44'),
(28, 1, '1058d79db1ecc4f.1', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:55:20', '2017-03-26 10:55:20'),
(29, 1, '1058d79db1ecc4f.599a', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:56:01', '2017-03-26 10:56:01'),
(30, 1, '1058d79e447e05d.d545', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:56:10', '2017-03-26 10:56:10'),
(31, 1, '1058d79e447e05d.ecf3', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:56:10', '2017-03-26 10:56:10'),
(32, 1, '1058d79e447e05d.e933', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:57:01', '2017-03-26 10:57:01'),
(33, 1, '1058d79e7f53a19.f35c', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:57:09', '2017-03-26 10:57:09'),
(34, 1, '1058d79e7f53a19.08fc', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:57:09', '2017-03-26 10:57:09'),
(35, 1, '1058d79e7f53a19.5fcb', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:57:45', '2017-03-26 10:57:45'),
(36, 1, '1058d79e7f53a19.3280', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:57:52', '2017-03-26 10:57:52'),
(37, 1, '1058d79e7f53a19.a84b', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:57:54', '2017-03-26 10:57:54'),
(38, 1, 'fcb7c56.c5b55', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:59:17', '2017-03-26 10:59:17'),
(39, 1, 'fcb7c56.cd565', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:59:17', '2017-03-26 10:59:17'),
(40, 1, 'fcb7c56.8416b', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:59:39', '2017-03-26 10:59:39'),
(41, 1, 'fcb7c56.483e2', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 10:59:46', '2017-03-26 10:59:46'),
(42, 1, 'fcb7c56.83e12', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:00:02', '2017-03-26 11:00:02'),
(43, 1, 'fcb7c56.2d058', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:00:24', '2017-03-26 11:00:24'),
(44, 1, 'fcb7c56.4e54c', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:00:28', '2017-03-26 11:00:28'),
(45, 1, 'fcb7c56.cfac4', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:01:40', '2017-03-26 11:01:40'),
(46, 1, 'fcb7c56.129a0', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:02:56', '2017-03-26 11:02:56'),
(47, 1, 'fcb7c56.c1567', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:03:03', '2017-03-26 11:03:03'),
(48, 1, 'fcb7c56.7eb88', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:03:36', '2017-03-26 11:03:36'),
(49, 1, 'fcb7c56.c7155', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:03:49', '2017-03-26 11:03:49'),
(50, 1, 'fcb7c56.1f79f', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:03:59', '2017-03-26 11:03:59'),
(51, 1, 'fcb7c56.c916a', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:04:42', '2017-03-26 11:04:42'),
(52, 1, 'fcb7c56.ad544', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:05:40', '2017-03-26 11:05:40'),
(53, 1, 'fcb7c56.83293', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:06:11', '2017-03-26 11:06:11'),
(54, 1, 'fcb7c56.7980a', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:06:34', '2017-03-26 11:06:34'),
(55, 1, 'fcb7c56.a8b42', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:07:30', '2017-03-26 11:07:30'),
(56, 1, 'fcb7c56.fe19c', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:08:28', '2017-03-26 11:08:28'),
(57, 1, 'fcb7c56.bb625', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:10:29', '2017-03-26 11:10:29'),
(58, 1, 'fcb7c56.280a4', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:11:00', '2017-03-26 11:11:00'),
(59, 1, '898e625.7fa06', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:44:22', '2017-03-26 11:44:22'),
(60, 1, '898e625.75741', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:45:37', '2017-03-26 11:45:37'),
(61, 1, '898e625.86e1a', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:46:18', '2017-03-26 11:46:18'),
(62, 1, '898e625.dcb76', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:47:02', '2017-03-26 11:47:02'),
(63, 1, '898e625.796cd', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:47:25', '2017-03-26 11:47:25'),
(64, 1, '898e625.2efc1', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:48:01', '2017-03-26 11:48:01'),
(65, 1, '898e625.8bee5', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:51:01', '2017-03-26 11:51:01'),
(66, 1, '898e625.c2222', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:52:50', '2017-03-26 11:52:50'),
(67, 1, '898e625.5898a', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:53:30', '2017-03-26 11:53:30'),
(68, 1, '898e625.572cf', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:53:51', '2017-03-26 11:53:51'),
(69, 1, '898e625.43e62', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:54:42', '2017-03-26 11:54:42'),
(70, 1, '898e625.66a53', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:55:15', '2017-03-26 11:55:15'),
(71, 1, '898e625.14c10', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:59:28', '2017-03-26 11:59:28'),
(72, 1, '898e625.516eb', '测试', '测试测试', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 11:59:39', '2017-03-26 11:59:39'),
(73, 1, '061e5a1.73cb0', '我编辑过这条记录了', '测试测试3333333333333', 10000, '0.00', '1.03', 1, 1, 1, 1, '分类简介', '分类描述', '2017-03-26 14:03:44', '2017-03-26 14:03:44');

-- --------------------------------------------------------

--
-- 表的结构 `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `source_image` varchar(100) NOT NULL,
  `base_image` varchar(100) NOT NULL,
  `small_image` varchar(100) NOT NULL,
  `thumbnail_image` varchar(100) NOT NULL,
  `is_default` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品图片表';

--
-- 转存表中的数据 `product_image`
--

INSERT INTO `product_image` (`id`, `sku`, `source_image`, `base_image`, `small_image`, `thumbnail_image`, `is_default`, `sort`) VALUES
(1, 'fcb7c56.280a4', '', '', '', '', 0, 0),
(2, '898e625.516eb', '/media/product/58d7ad2c0b170.jpg', '/media/product/58d7ad2c0b170.jpg', '/media/product/58d7ad2c0b170.jpg', '/media/product/58d7ad2c0b170.jpg', 0, 0),
(3, '061e5a1.73cb0', '/media/product/58d7b810d7129.jpg', '/media/product/58d7b810d7129.jpg', '/media/product/58d7b810d7129.jpg', '/media/product/58d7b810d7129.jpg', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'corewill', '414243927@qq.com', '$2y$10$JhiUuttZtiM5Cm3k0LCTq.40vm4OO1pNvSQXoZlVry6LN5p7FynhS', 'Ne5P4f15neNAKYXUAvwlNHI5JIwp6pBWIdvvaIvCy3f7s6Nenanhtzyzgnx2', '2017-03-24 20:56:48', '2017-03-25 21:57:54');

-- --------------------------------------------------------

--
-- 表的结构 `users_`
--

CREATE TABLE `users_` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表' ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `users_`
--

INSERT INTO `users_` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(0, 'corewill', '414243927@qq.com', '$2y$10$obFBWTqXgX8WaeKsw7lPYO8flIIxZhvNT1AvMkP39nE', 1, '2017-03-18 07:42:33', '2017-03-18 07:42:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminid`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admins_`
--
ALTER TABLE `admins_`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_`
--
ALTER TABLE `users_`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `adminid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `admins_`
--
ALTER TABLE `admins_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- 使用表AUTO_INCREMENT `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
