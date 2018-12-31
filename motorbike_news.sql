-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 31, 2018 lúc 01:24 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `motorbike_news`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `activity`
--

CREATE TABLE `activity` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `activity`
--

INSERT INTO `activity` (`id`, `name`, `created_at`, `updated_at`) VALUES
('1', 'Create', '2018-12-27 12:40:35', '0000-00-00 00:00:00'),
('2', 'Update', '2018-12-27 12:40:35', '0000-00-00 00:00:00'),
('3', 'Read', '2018-12-27 12:40:35', '0000-00-00 00:00:00'),
('4', 'Delete', '2018-12-27 12:40:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `activity_entity`
--

CREATE TABLE `activity_entity` (
  `id_activity` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_entity` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `activity_entity`
--

INSERT INTO `activity_entity` (`id_activity`, `id_entity`, `created_at`, `updated_at`) VALUES
('1', '1', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('1', '2', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('1', '3', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('1', '4', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('1', '5', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('1', '6', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('2', '1', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('2', '2', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('2', '3', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('2', '4', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('2', '5', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('2', '6', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('3', '1', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('3', '2', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('3', '3', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('3', '4', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('3', '5', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('3', '6', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('4', '1', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('4', '2', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('4', '3', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('4', '4', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('4', '5', '2018-12-27 13:45:07', '0000-00-00 00:00:00'),
('4', '6', '2018-12-27 13:45:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_motorbike` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_motorbike`, `content`, `created_at`, `updated_at`) VALUES
('1', '1', '1', 'Best cmnr', '2018-12-27 13:24:31', '0000-00-00 00:00:00'),
('2', '2', '2', 'Hơi best', '2018-12-27 13:24:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `entity`
--

CREATE TABLE `entity` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `entity`
--

INSERT INTO `entity` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
('1', 'User', 'user', '2018-12-28 07:07:41', '0000-00-00 00:00:00'),
('2', 'Comment', 'comment', '2018-12-28 07:07:49', '0000-00-00 00:00:00'),
('3', 'Manufacturer', 'manufacturer', '2018-12-28 07:08:00', '0000-00-00 00:00:00'),
('4', 'Motorbike', 'motorbike', '2018-12-28 07:08:12', '0000-00-00 00:00:00'),
('5', 'Role', 'role', '2018-12-28 07:08:22', '0000-00-00 00:00:00'),
('6', 'Slide', 'slide', '2018-12-28 07:08:28', '0000-00-00 00:00:00'),
('7', 'Motorbike Type', 'motorbike_type', '2018-12-28 07:08:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `created_at`, `updated_at`) VALUES
('1', 'Yamaha', '2018-12-27 12:33:03', '0000-00-00 00:00:00'),
('2', 'Honda', '2018-12-27 12:33:03', '0000-00-00 00:00:00'),
('3', 'Kawasaki', '2018-12-27 12:36:51', '0000-00-00 00:00:00'),
('4', 'Suzuki', '2018-12-27 12:36:51', '0000-00-00 00:00:00'),
('5', 'KTM', '2018-12-27 12:36:51', '0000-00-00 00:00:00'),
('6', 'Ducati', '2018-12-27 12:36:51', '0000-00-00 00:00:00'),
('7', 'BWM', '2018-12-27 12:36:51', '0000-00-00 00:00:00'),
('8', 'Aprilia', '2018-12-27 12:36:51', '0000-00-00 00:00:00'),
('9', 'MV Agusta', '2018-12-27 12:36:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `motorbike`
--

CREATE TABLE `motorbike` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` decimal(10,0) NOT NULL,
  `id_motorbike_type` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_manufacturer` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unsigned_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `motorbike`
--

INSERT INTO `motorbike` (`id`, `name`, `capacity`, `id_motorbike_type`, `id_manufacturer`, `description`, `thumbnail`, `unsigned_title`, `updated_at`, `created_at`) VALUES
('1', 'YZF-R1', '998', '1', '1', 'Best Bike of Yamaha', 'no-image.jpg', 'yzf-r1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('2', 'YZF-R6', '600', '1', '1', 'Ngựa hoang', 'no-image.jpg', 'yzf-r6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('53XDA', 'dasdasd', '1123', '1', '7', '<p>asdasd</p>', 'qdak90zVbn48391427_2209125322637214_7608134329746587648_n.jpg', 'dasdasd', '2018-12-30 20:40:42', '2018-12-30 20:40:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `motorbike_type`
--

CREATE TABLE `motorbike_type` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `motorbike_type`
--

INSERT INTO `motorbike_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
('1', 'Sport Bike', '2018-12-27 12:30:07', '0000-00-00 00:00:00'),
('2', 'Naked Bike', '2018-12-27 12:30:07', '0000-00-00 00:00:00'),
('3', 'Sport Touring', '2018-12-27 12:31:23', '0000-00-00 00:00:00'),
('4', 'Adventure', '2018-12-27 12:31:23', '0000-00-00 00:00:00'),
('5', 'Off Road', '2018-12-27 12:32:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
('1', 'SysAdmin', '2018-12-27 12:38:54', '0000-00-00 00:00:00'),
('2', 'Colaborator', '2018-12-27 12:38:54', '0000-00-00 00:00:00'),
('3', 'Admin', '2018-12-27 12:38:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_activity`
--

CREATE TABLE `role_activity` (
  `id_role` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_activity` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_activity_entity` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_activity`
--

INSERT INTO `role_activity` (`id_role`, `id_activity`, `id_activity_entity`, `created_at`, `updated_at`) VALUES
('1', '1', '', '2018-12-27 13:09:46', '0000-00-00 00:00:00'),
('1', '2', '', '2018-12-27 13:09:46', '0000-00-00 00:00:00'),
('1', '3', '', '2018-12-27 13:09:46', '0000-00-00 00:00:00'),
('1', '4', '', '2018-12-27 13:09:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name`, `path`, `link`, `created_at`, `updated_at`) VALUES
('1', 'No slide 1', 'related_post_no_available_image.png', 'google.com', '2018-12-27 13:26:18', '0000-00-00 00:00:00'),
('2', 'No slide 2', 'related_post_no_available_image.png', 'google.com', '2018-12-27 13:26:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dob` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `id_role`, `name`, `email`, `password`, `dob`, `created_at`, `updated_at`) VALUES
('1', '1', 'sysadmin', 'sysadmin@gmail.com', '123', '2018-07-10 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('2', '2', 'collaborator', 'collaborator@gmail.com', '123', '2018-07-17 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `activity_entity`
--
ALTER TABLE `activity_entity`
  ADD PRIMARY KEY (`id_activity`,`id_entity`),
  ADD KEY `fk_activity_entity__entity` (`id_entity`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment__user` (`id_user`),
  ADD KEY `fk_comment__motorbike` (`id_motorbike`);

--
-- Chỉ mục cho bảng `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `motorbike`
--
ALTER TABLE `motorbike`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_motorbike__manufacturer` (`id_manufacturer`),
  ADD KEY `fk_motorbike__motorbike_type` (`id_motorbike_type`);

--
-- Chỉ mục cho bảng `motorbike_type`
--
ALTER TABLE `motorbike_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_activity`
--
ALTER TABLE `role_activity`
  ADD PRIMARY KEY (`id_role`,`id_activity`),
  ADD KEY `fk_role_activity__activity` (`id_activity`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user__role` (`id_role`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `activity_entity`
--
ALTER TABLE `activity_entity`
  ADD CONSTRAINT `fk_activity_entity__activity` FOREIGN KEY (`id_activity`) REFERENCES `activity` (`id`),
  ADD CONSTRAINT `fk_activity_entity__entity` FOREIGN KEY (`id_entity`) REFERENCES `entity` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment__motorbike` FOREIGN KEY (`id_motorbike`) REFERENCES `motorbike` (`id`),
  ADD CONSTRAINT `fk_comment__user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `motorbike`
--
ALTER TABLE `motorbike`
  ADD CONSTRAINT `fk_motorbike__manufacturer` FOREIGN KEY (`id_manufacturer`) REFERENCES `manufacturer` (`id`),
  ADD CONSTRAINT `fk_motorbike__motorbike_type` FOREIGN KEY (`id_motorbike_type`) REFERENCES `motorbike_type` (`id`);

--
-- Các ràng buộc cho bảng `role_activity`
--
ALTER TABLE `role_activity`
  ADD CONSTRAINT `fk_role_activity__activity` FOREIGN KEY (`id_activity`) REFERENCES `activity` (`id`),
  ADD CONSTRAINT `fk_role_activity__role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user__role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
