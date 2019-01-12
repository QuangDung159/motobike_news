-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 12, 2019 lúc 06:48 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 5.6.38

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
('1', 'Add', '2019-01-11 13:31:18', '0000-00-00 00:00:00'),
('2', 'Update', '2018-12-27 12:40:35', '0000-00-00 00:00:00'),
('3', 'List', '2019-01-11 13:31:12', '0000-00-00 00:00:00'),
('4', 'Delete', '2018-12-27 12:40:35', '0000-00-00 00:00:00');

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
-- Cấu trúc bảng cho bảng `policy`
--

CREATE TABLE `policy` (
  `id_role` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_activity` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id_entity` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `policy`
--

INSERT INTO `policy` (`id_role`, `id_activity`, `id_entity`, `id`, `created_at`, `updated_at`) VALUES
('1', '1', '1', '1', '2019-01-01 06:35:29', '0000-00-00 00:00:00'),
('1', '1', '2', '2', '2019-01-01 06:35:29', '0000-00-00 00:00:00'),
('1', '1', '3', '3', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '1', '4', '4', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '1', '5', '5', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '1', '6', '6', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '2', '1', '8', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '2', '2', '9', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '2', '3', '0', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '2', '4', '11', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '2', '5', '12', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '2', '6', '13', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '2', '7', '14', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '3', '1', '15', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '3', '2', '16', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '3', '3', '17', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '3', '4', '18', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '3', '5', '19', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '3', '6', '20', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '3', '7', '21', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '4', '1', '22', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '4', '2', '23', '2019-01-01 06:35:30', '0000-00-00 00:00:00'),
('1', '4', '3', '24', '2019-01-01 06:35:31', '0000-00-00 00:00:00'),
('1', '4', '4', '25', '2019-01-01 06:35:31', '0000-00-00 00:00:00'),
('1', '4', '5', '26', '2019-01-01 06:35:31', '0000-00-00 00:00:00'),
('2', '1', '1', 'nlVgK', '2019-01-09 06:36:44', '2019-01-09 06:36:44'),
('2', '1', '2', 'U2lZI', '2019-01-09 06:36:51', '2019-01-09 06:36:51'),
('3', '1', '1', 'OZr7x', '2019-01-09 06:36:59', '2019-01-09 06:36:59');

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
('3', 'Admin', '2018-12-27 12:38:54', '0000-00-00 00:00:00'),
('4', 'User', '2019-01-09 13:34:30', '0000-00-00 00:00:00');

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
('1', 'r1 1', 'WeVfCWvY81img.jpg', 'google.com', '2019-01-06 07:34:37', '2019-01-06 00:34:37'),
('2', 'r1 2', 'yD0q83jmbaimg (1).jpg', 'google.com', '2019-01-06 07:40:43', '2019-01-06 00:40:43'),
('gxeHD', 'Ducati 1', '9DSz01CyqdPanigale-959Corse-MY18-Red-40-Slider-Gallery-906x510.jpg', 'https://www.ducati.com/us/en/bikes/panigale/959-panigale', '2019-01-05 23:59:23', '2019-01-05 23:59:23'),
('hDQal', 'gsx r1000 1', 'Qb7BvaFHA5gimg17.jpg', 'https://www.ducati.com/us/en/bikes/panigale/959-panigale', '2019-01-05 23:59:07', '2019-01-05 23:59:07'),
('RHLpF', 'Ducati 2', 'W1Aw5X2aUA123123.jpg', 'https://www.ducati.com/us/en/bikes/panigale/959-panigale', '2019-01-06 00:00:46', '2019-01-06 00:00:46');

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
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `id_role`, `name`, `email`, `password`, `dob`, `remember_token`, `created_at`, `updated_at`) VALUES
('1', '1', 'sysadmin', 'sysadmin@gmail.com', '123', '2018-07-10 00:00:00', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('2', '2', 'collaborator', 'collaborator@gmail.com', '123', '2018-07-17 00:00:00', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3', '1', 'dulu', 'dulu@etcc.com', '123', '2019-01-01 00:00:00', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('Jll6c', '2', 'collaborator1', 'colla1@gmail.com', '$2y$10$R2tVX1sglej9tWhqeIj7Terf6WMVz564xuxCxVcgP/TB1/nhJFptm', '2019-01-01 00:00:00', 'hheaNCo8Hd3BoczppIdytFqtStT6PH66D3AtjTfrGawQFWp7ilojfPSiQlWl', '2019-01-09 06:38:55', '2019-01-09 06:38:55'),
('nhiKa', '1', 'dulu1', 'dulu1', '$2y$10$JqhDeVy5fVdTkjzuJ1d9WOrchBX6ZfsNoudHIPZHWOVrAS3OHzN2K', '2019-01-01 00:00:00', '0', '2019-01-08 06:17:00', '2019-01-08 06:17:00'),
('NKkXF', '4', 'user1', 'user1@gmail.com', '$2y$10$6iqLo.qeBdEsaksQn9dVHOcWd.G8Kk8FhhOqogShJJXixWd71POa2', '2019-01-01 00:00:00', NULL, '2019-01-09 06:39:17', '2019-01-09 06:39:17'),
('UKBRN', '3', 'admin1', 'admin1@gmail.com', '$2y$10$FF0XmTFUQJD1YstdppT26.7ruMXsbB.0eJ8upEJK65PFVZNpytyEq', '2019-01-01 00:00:00', 'onsHTxovJ8WrtJO5vDEIqKUQFQDhdiEx3gmJvPoGZe4a361HRYX4UC0l0lUC', '2019-01-09 06:37:28', '2019-01-09 06:37:28'),
('Z0o75', '1', 'dulu2', 'dulu2@etcc.com', '$2y$10$ZlERaTFSgoDuHr5U9uD..eAVDCgVcpu3WeRauiSWX9dzi34MAi73e', '2019-01-01 00:00:00', '8mr5ay2Np9Zhpvd2AmQlE5mFZseOY5hfEZzEi7RnKzrZp5iaNbRJhrk4Iz5e', '2019-01-08 06:17:34', '2019-01-08 06:17:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id_role`,`id_activity`,`id_entity`),
  ADD KEY `fk_policy__activity` (`id_activity`),
  ADD KEY `fk_policy__entity` (`id_entity`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

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
-- Các ràng buộc cho bảng `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `fk_policy__activity` FOREIGN KEY (`id_activity`) REFERENCES `activity` (`id`),
  ADD CONSTRAINT `fk_policy__entity` FOREIGN KEY (`id_entity`) REFERENCES `entity` (`id`),
  ADD CONSTRAINT `fk_policy__role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user__role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
