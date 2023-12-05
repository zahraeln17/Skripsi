-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 07:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekuesioner_ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'on-progress',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `status`, `created_at`) VALUES
(4, 17, 'finish', '2023-12-02 10:46:49'),
(5, 18, 'finish', '2023-12-02 10:59:09'),
(6, 19, 'finish', '2023-12-02 11:07:20'),
(7, 20, 'finish', '2023-12-02 11:24:07'),
(8, 21, 'finish', '2023-12-02 17:35:54'),
(9, 22, 'finish', '2023-12-02 17:41:38'),
(10, 23, 'finish', '2023-12-02 17:46:53'),
(11, 24, 'finish', '2023-12-04 08:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `answer_details`
--

CREATE TABLE `answer_details` (
  `id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `questioners_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer_details`
--

INSERT INTO `answer_details` (`id`, `answer_id`, `questioners_id`, `value`, `created_at`) VALUES
(69, 4, 1, 3, '2023-12-02 10:48:37'),
(70, 4, 2, 4, '2023-12-02 10:48:40'),
(71, 4, 3, 3, '2023-12-02 10:48:44'),
(72, 4, 4, 4, '2023-12-02 10:48:50'),
(73, 4, 5, 3, '2023-12-02 10:49:25'),
(74, 4, 6, 3, '2023-12-02 10:49:30'),
(75, 4, 7, 3, '2023-12-02 10:49:37'),
(76, 4, 8, 3, '2023-12-02 10:49:41'),
(77, 4, 9, 4, '2023-12-02 10:50:06'),
(78, 4, 10, 2, '2023-12-02 10:50:39'),
(79, 4, 11, 3, '2023-12-02 10:50:43'),
(80, 4, 12, 2, '2023-12-02 10:50:46'),
(81, 4, 13, 2, '2023-12-02 10:50:49'),
(82, 4, 14, 2, '2023-12-02 10:50:52'),
(83, 4, 15, 3, '2023-12-02 10:51:40'),
(84, 4, 16, 3, '2023-12-02 10:53:09'),
(85, 4, 17, 3, '2023-12-02 10:53:13'),
(86, 4, 18, 4, '2023-12-02 10:53:17'),
(87, 4, 19, 4, '2023-12-02 10:53:20'),
(88, 4, 20, 2, '2023-12-02 10:53:24'),
(89, 4, 21, 2, '2023-12-02 10:54:01'),
(90, 4, 22, 2, '2023-12-02 10:54:05'),
(91, 4, 23, 3, '2023-12-02 10:54:08'),
(92, 4, 24, 4, '2023-12-02 10:54:14'),
(93, 4, 25, 5, '2023-12-02 10:54:19'),
(94, 4, 26, 4, '2023-12-02 10:55:42'),
(95, 4, 27, 3, '2023-12-02 10:55:45'),
(96, 4, 28, 4, '2023-12-02 10:55:49'),
(97, 4, 29, 4, '2023-12-02 10:55:54'),
(98, 4, 30, 3, '2023-12-02 10:56:00'),
(99, 5, 1, 3, '2023-12-02 10:59:27'),
(100, 5, 2, 3, '2023-12-02 10:59:31'),
(101, 5, 3, 2, '2023-12-02 10:59:34'),
(102, 5, 4, 2, '2023-12-02 10:59:37'),
(103, 5, 5, 2, '2023-12-02 10:59:40'),
(104, 5, 6, 4, '2023-12-02 11:00:59'),
(105, 5, 7, 4, '2023-12-02 11:01:02'),
(106, 5, 8, 4, '2023-12-02 11:01:06'),
(107, 5, 9, 3, '2023-12-02 11:01:09'),
(108, 5, 10, 4, '2023-12-02 11:01:12'),
(109, 5, 11, 3, '2023-12-02 11:01:35'),
(110, 5, 12, 3, '2023-12-02 11:01:38'),
(111, 5, 13, 4, '2023-12-02 11:01:41'),
(112, 5, 14, 3, '2023-12-02 11:01:45'),
(113, 5, 15, 4, '2023-12-02 11:01:49'),
(114, 5, 16, 4, '2023-12-02 11:04:34'),
(115, 5, 17, 4, '2023-12-02 11:04:37'),
(116, 5, 18, 3, '2023-12-02 11:04:41'),
(117, 5, 19, 3, '2023-12-02 11:04:45'),
(118, 5, 20, 1, '2023-12-02 11:04:54'),
(119, 5, 21, 3, '2023-12-02 11:05:27'),
(120, 5, 22, 3, '2023-12-02 11:05:31'),
(121, 5, 23, 3, '2023-12-02 11:05:36'),
(122, 5, 24, 3, '2023-12-02 11:05:39'),
(123, 5, 25, 3, '2023-12-02 11:05:42'),
(124, 5, 26, 3, '2023-12-02 11:05:58'),
(125, 5, 27, 3, '2023-12-02 11:06:01'),
(126, 5, 28, 5, '2023-12-02 11:06:05'),
(127, 5, 29, 3, '2023-12-02 11:06:08'),
(128, 5, 30, 2, '2023-12-02 11:06:11'),
(129, 6, 1, 4, '2023-12-02 11:07:59'),
(130, 6, 2, 4, '2023-12-02 11:08:02'),
(131, 6, 3, 3, '2023-12-02 11:08:05'),
(132, 6, 4, 4, '2023-12-02 11:08:08'),
(133, 6, 5, 4, '2023-12-02 11:08:11'),
(134, 6, 6, 4, '2023-12-02 11:11:43'),
(135, 6, 7, 4, '2023-12-02 11:11:46'),
(136, 6, 8, 4, '2023-12-02 11:11:49'),
(137, 6, 9, 4, '2023-12-02 11:11:53'),
(138, 6, 10, 4, '2023-12-02 11:11:56'),
(139, 6, 11, 3, '2023-12-02 11:15:18'),
(140, 6, 12, 4, '2023-12-02 11:15:21'),
(141, 6, 13, 4, '2023-12-02 11:15:24'),
(142, 6, 14, 4, '2023-12-02 11:15:29'),
(143, 6, 15, 4, '2023-12-02 11:15:32'),
(144, 6, 16, 4, '2023-12-02 11:19:58'),
(145, 6, 17, 4, '2023-12-02 11:20:02'),
(146, 6, 18, 4, '2023-12-02 11:20:05'),
(147, 6, 19, 4, '2023-12-02 11:20:08'),
(148, 6, 20, 4, '2023-12-02 11:20:13'),
(149, 6, 21, 4, '2023-12-02 11:20:17'),
(150, 6, 22, 4, '2023-12-02 11:21:16'),
(151, 6, 23, 4, '2023-12-02 11:21:20'),
(152, 6, 24, 5, '2023-12-02 11:21:26'),
(153, 6, 25, 5, '2023-12-02 11:21:30'),
(154, 6, 26, 4, '2023-12-02 11:21:37'),
(155, 6, 27, 4, '2023-12-02 11:21:41'),
(156, 6, 28, 5, '2023-12-02 11:21:59'),
(157, 6, 29, 3, '2023-12-02 11:22:02'),
(158, 6, 30, 2, '2023-12-02 11:22:07'),
(159, 7, 1, 5, '2023-12-02 11:24:43'),
(160, 7, 2, 4, '2023-12-02 11:24:46'),
(161, 7, 3, 4, '2023-12-02 11:24:49'),
(162, 7, 4, 5, '2023-12-02 11:24:52'),
(163, 7, 5, 4, '2023-12-02 11:24:57'),
(164, 7, 6, 4, '2023-12-02 11:25:20'),
(165, 7, 7, 5, '2023-12-02 11:25:23'),
(166, 7, 8, 4, '2023-12-02 11:25:26'),
(167, 7, 9, 3, '2023-12-02 11:25:29'),
(168, 7, 10, 4, '2023-12-02 11:25:32'),
(169, 7, 11, 5, '2023-12-02 11:25:54'),
(170, 7, 12, 4, '2023-12-02 11:25:59'),
(171, 7, 13, 5, '2023-12-02 11:26:02'),
(172, 7, 14, 4, '2023-12-02 11:26:06'),
(173, 7, 15, 5, '2023-12-02 11:26:09'),
(174, 7, 16, 5, '2023-12-02 11:26:30'),
(175, 7, 17, 5, '2023-12-02 11:26:34'),
(176, 7, 18, 5, '2023-12-02 11:26:38'),
(177, 7, 19, 5, '2023-12-02 11:26:43'),
(178, 7, 20, 3, '2023-12-02 11:26:46'),
(179, 7, 21, 3, '2023-12-02 11:28:26'),
(180, 7, 22, 4, '2023-12-02 11:28:29'),
(181, 7, 23, 4, '2023-12-02 11:28:33'),
(182, 7, 24, 5, '2023-12-02 11:28:37'),
(183, 7, 25, 4, '2023-12-02 11:28:40'),
(184, 7, 26, 4, '2023-12-02 11:29:10'),
(185, 7, 27, 5, '2023-12-02 11:29:13'),
(186, 7, 28, 5, '2023-12-02 11:29:17'),
(187, 7, 29, 3, '2023-12-02 11:29:21'),
(188, 7, 30, 4, '2023-12-02 11:29:24'),
(189, 8, 1, 4, '2023-12-02 17:36:16'),
(190, 8, 2, 4, '2023-12-02 17:36:19'),
(191, 8, 3, 4, '2023-12-02 17:36:23'),
(192, 8, 4, 4, '2023-12-02 17:36:31'),
(193, 8, 5, 3, '2023-12-02 17:36:35'),
(194, 8, 6, 3, '2023-12-02 17:36:50'),
(195, 8, 7, 4, '2023-12-02 17:36:54'),
(196, 8, 8, 4, '2023-12-02 17:36:57'),
(197, 8, 9, 3, '2023-12-02 17:37:00'),
(198, 8, 10, 5, '2023-12-02 17:37:05'),
(199, 8, 11, 4, '2023-12-02 17:37:24'),
(200, 8, 12, 4, '2023-12-02 17:37:29'),
(201, 8, 13, 4, '2023-12-02 17:37:32'),
(202, 8, 14, 1, '2023-12-02 17:37:36'),
(203, 8, 15, 1, '2023-12-02 17:37:40'),
(204, 8, 16, 2, '2023-12-02 17:37:51'),
(205, 8, 17, 4, '2023-12-02 17:37:55'),
(206, 8, 18, 3, '2023-12-02 17:37:58'),
(207, 8, 19, 3, '2023-12-02 17:38:01'),
(208, 8, 20, 3, '2023-12-02 17:38:05'),
(209, 8, 21, 3, '2023-12-02 17:38:30'),
(210, 8, 22, 3, '2023-12-02 17:38:33'),
(211, 8, 23, 3, '2023-12-02 17:38:36'),
(212, 8, 24, 3, '2023-12-02 17:38:40'),
(213, 8, 25, 3, '2023-12-02 17:38:44'),
(214, 8, 26, 3, '2023-12-02 17:38:57'),
(215, 8, 27, 3, '2023-12-02 17:39:02'),
(216, 8, 28, 5, '2023-12-02 17:39:06'),
(217, 8, 29, 3, '2023-12-02 17:39:09'),
(218, 8, 30, 3, '2023-12-02 17:39:14'),
(219, 9, 1, 3, '2023-12-02 17:42:18'),
(220, 9, 2, 3, '2023-12-02 17:42:21'),
(221, 9, 3, 3, '2023-12-02 17:42:25'),
(222, 9, 4, 4, '2023-12-02 17:42:29'),
(223, 9, 5, 4, '2023-12-02 17:42:34'),
(224, 9, 6, 3, '2023-12-02 17:42:44'),
(225, 9, 7, 3, '2023-12-02 17:42:48'),
(226, 9, 8, 3, '2023-12-02 17:42:51'),
(227, 9, 9, 2, '2023-12-02 17:42:56'),
(228, 9, 10, 2, '2023-12-02 17:43:01'),
(229, 9, 11, 3, '2023-12-02 17:43:13'),
(230, 9, 12, 5, '2023-12-02 17:43:17'),
(231, 9, 13, 3, '2023-12-02 17:43:21'),
(232, 9, 14, 4, '2023-12-02 17:43:25'),
(233, 9, 15, 4, '2023-12-02 17:43:29'),
(234, 9, 16, 3, '2023-12-02 17:43:44'),
(235, 9, 17, 4, '2023-12-02 17:43:48'),
(236, 9, 18, 3, '2023-12-02 17:43:52'),
(237, 9, 19, 2, '2023-12-02 17:43:55'),
(238, 9, 20, 2, '2023-12-02 17:43:59'),
(239, 9, 21, 4, '2023-12-02 17:44:16'),
(240, 9, 22, 4, '2023-12-02 17:44:19'),
(241, 9, 23, 4, '2023-12-02 17:44:22'),
(242, 9, 24, 2, '2023-12-02 17:44:25'),
(243, 9, 25, 3, '2023-12-02 17:44:29'),
(244, 9, 26, 2, '2023-12-02 17:44:41'),
(245, 9, 27, 3, '2023-12-02 17:44:45'),
(246, 9, 28, 5, '2023-12-02 17:44:49'),
(247, 9, 29, 2, '2023-12-02 17:44:53'),
(248, 9, 30, 2, '2023-12-02 17:44:56'),
(249, 10, 1, 4, '2023-12-02 17:47:59'),
(250, 10, 2, 4, '2023-12-02 17:48:02'),
(251, 10, 3, 4, '2023-12-02 17:48:08'),
(252, 10, 4, 2, '2023-12-02 17:48:12'),
(253, 10, 5, 3, '2023-12-02 17:48:17'),
(254, 10, 6, 3, '2023-12-02 17:48:59'),
(255, 10, 7, 4, '2023-12-02 17:49:03'),
(256, 10, 8, 4, '2023-12-02 17:49:06'),
(257, 10, 9, 3, '2023-12-02 17:49:10'),
(258, 10, 10, 4, '2023-12-02 17:49:14'),
(259, 10, 11, 4, '2023-12-02 17:49:30'),
(260, 10, 12, 4, '2023-12-02 17:49:33'),
(261, 10, 13, 4, '2023-12-02 17:49:36'),
(262, 10, 14, 3, '2023-12-02 17:49:40'),
(263, 10, 15, 4, '2023-12-02 17:49:43'),
(264, 10, 16, 3, '2023-12-02 17:50:08'),
(265, 10, 17, 4, '2023-12-02 17:50:11'),
(266, 10, 18, 4, '2023-12-02 17:50:14'),
(267, 10, 19, 3, '2023-12-02 17:50:17'),
(268, 10, 20, 2, '2023-12-02 17:50:21'),
(269, 10, 21, 3, '2023-12-02 17:50:39'),
(270, 10, 22, 4, '2023-12-02 17:50:42'),
(271, 10, 23, 4, '2023-12-02 17:50:45'),
(272, 10, 24, 3, '2023-12-02 17:50:48'),
(273, 10, 25, 4, '2023-12-02 17:50:51'),
(274, 10, 26, 3, '2023-12-02 17:51:06'),
(275, 10, 27, 4, '2023-12-02 17:51:11'),
(276, 10, 28, 4, '2023-12-02 17:51:16'),
(277, 10, 29, 4, '2023-12-02 17:51:20'),
(278, 10, 30, 3, '2023-12-02 17:51:24'),
(279, 11, 1, 3, '2023-12-04 08:28:47'),
(280, 11, 2, 4, '2023-12-04 08:28:50'),
(281, 11, 3, 3, '2023-12-04 08:28:53'),
(282, 11, 4, 3, '2023-12-04 08:28:56'),
(283, 11, 5, 3, '2023-12-04 08:29:00'),
(284, 11, 6, 4, '2023-12-04 08:29:13'),
(285, 11, 7, 4, '2023-12-04 08:29:16'),
(286, 11, 8, 4, '2023-12-04 08:29:21'),
(287, 11, 9, 3, '2023-12-04 08:29:24'),
(288, 11, 10, 3, '2023-12-04 08:29:27'),
(289, 11, 11, 3, '2023-12-04 08:29:43'),
(290, 11, 12, 4, '2023-12-04 08:29:46'),
(291, 11, 13, 5, '2023-12-04 08:29:51'),
(292, 11, 14, 4, '2023-12-04 08:29:53'),
(293, 11, 15, 4, '2023-12-04 08:29:57'),
(294, 11, 16, 4, '2023-12-04 08:30:11'),
(295, 11, 17, 4, '2023-12-04 08:30:14'),
(296, 11, 18, 4, '2023-12-04 08:30:17'),
(297, 11, 19, 4, '2023-12-04 08:30:20'),
(298, 11, 20, 3, '2023-12-04 08:30:24'),
(299, 11, 21, 4, '2023-12-04 08:30:40'),
(300, 11, 22, 4, '2023-12-04 08:30:42'),
(301, 11, 23, 3, '2023-12-04 08:30:45'),
(302, 11, 24, 4, '2023-12-04 08:30:50'),
(303, 11, 25, 4, '2023-12-04 08:30:54'),
(304, 11, 26, 3, '2023-12-04 08:31:08'),
(305, 11, 27, 4, '2023-12-04 08:31:11'),
(306, 11, 28, 5, '2023-12-04 08:31:14'),
(307, 11, 29, 3, '2023-12-04 08:31:17'),
(308, 11, 30, 3, '2023-12-04 08:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`) VALUES
(1, 'laki-laki'),
(2, 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `time_teaching` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questioners`
--

CREATE TABLE `questioners` (
  `id` int(11) NOT NULL,
  `questioner_text` text DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questioners`
--

INSERT INTO `questioners` (`id`, `questioner_text`, `topic_id`, `created_at`) VALUES
(1, 'Saya Merasa SPADA-UPI Mudah Untuk Dipelajari.', 1, '2023-11-26 14:20:33'),
(2, 'Saya dapat mengoprasikan SPADA-UPI dengan mudah.', 2, '2023-11-26 14:24:22'),
(3, 'Menurut saya sistem informasi SPADA-UPI jelas dan mudah dipahami.', 3, '2023-11-26 14:24:22'),
(4, 'Saya merasa sangat mudah untuk mahir menggunakan SPADA-UPI.', 4, '2023-11-26 14:24:22'),
(5, 'Saya merasa, menggunakan LMS SPADA-UPI dapat meningkatkan performa kinerja saya. ', 5, '2023-11-26 14:24:22'),
(6, 'Saya merasa, menggunakan LMS SPADA-UPI dapat meningkatkan efektivitas pekerjaan saya sebagai mahasiswa/i.', 6, '2023-11-26 14:24:22'),
(7, 'Saya merasa, menggunakan LMS SPADA-UPI dapat memudahkan proses belajar saya sebagai mahasiswa/i. ', 7, '2023-11-26 14:24:22'),
(8, 'Secara keseluruhan, saya merasa LMS SPADA-UPI sangat bermanfaat bagi pekerjaan saya sebagai mahasiswa/i', 8, '2023-11-26 14:24:22'),
(9, 'Saya merasa nyaman menggunakan SPADA-UPI.', 9, '2023-11-27 07:10:42'),
(10, 'Saya percaya penggunaan SPADA-UPI akan semakin sering digunakan dimasa depan.', 10, '2023-11-27 07:10:42'),
(11, 'Saya senang menggunakan SPADA-UPI.', 11, '2023-11-27 07:10:42'),
(12, 'Menurut Saya, tampilan antar muka yang terdapat pada SPADA-UPI tidak membosankan untuk digunakan.', 12, '2023-11-27 07:10:42'),
(13, 'Saya merasa sistem informasi SPADA-UPI sudah menyediakan informasi sesuai kebutuhan pengguna.', 13, '2023-11-27 07:32:08'),
(14, 'Saya merasa semua informasi yang dibutuhkan tersedia di Sistem Informasi SPADA-UPI.', 14, '2023-11-27 07:32:08'),
(15, 'Saya merasa sistem informasi    SPADA-UPI memiliki Informasi dan   layanan yang mendukung dan bermanfaat.', 15, '2023-11-27 07:32:08'),
(16, 'Saya merasa sistem informasi    SPADA-UPI sudah menyediakan output yang dibutuhkan.', 16, '2023-11-27 07:32:08'),
(17, 'Saya merasa sistem informasi SPADA-UPI memberikan informasi sesuai dengan hak akses pengguna.', 17, '2023-11-27 07:38:02'),
(18, 'Saya merasa sistem informasi SPADA-UPI menyediakan informasi yang akurat tanpa ada kesalahan.', 18, '2023-11-27 07:38:02'),
(19, 'Saya merasa sistem informasi SPADA-UPI menampilkan halaman yang tepat dan benar.', 19, '2023-11-27 07:38:02'),
(20, 'Saya merasa sistem informasi    SPADA-UPI memiliki tata   letak / layout yang memudahkan pengguna.', 20, '2023-11-27 07:38:02'),
(21, 'Saya merasa desain tampilan sistem informasi SPADA-UPI berkualitas \r\ndan menarik.\r\n', 21, '2023-11-27 07:38:02'),
(22, 'Saya merasa sistem informasi SPADA-UPI memiliki variasi warna yang menarik.', 22, '2023-11-27 07:38:02'),
(23, 'Saya merasa waktu tanggap Sistem Informasi SPADA-UPI dalam memberikan informasi cepat dan sesuai.', 23, '2023-11-27 07:38:02'),
(24, 'Saya merasa sistem informasi SPADA-UPI memberikan kemudahan dalam pencarian informasi.', 24, '2023-11-27 07:38:02'),
(25, 'Saya merasa sistem informasi SPADA-UPI menampilkan informasi yang up to date.', 25, '2023-11-27 07:38:02'),
(26, 'Saya merasa sistem informasi SPADA-UPI mudah untuk digunakan dan dipelajari/user friendly.', 26, '2023-11-27 07:38:02'),
(27, 'Saya merasa sistem informasi    SPADA-UPI efesien digunakan. ', 27, '2023-11-27 07:38:02'),
(28, 'Saya merasa sistem informasi SPADA-UPI mudah di akses dari mana saja dan kapan saja.', 28, '2023-11-27 07:38:02'),
(29, 'Saya merasa sangat bergantung dengan sistem informasi SPADA-UPI dalam proses akademik secara tepat waktu.', 29, '2023-11-27 07:39:25'),
(30, 'Saya merasa sangat puas menggunakan sistem informasi SPADA-UPI.', 30, '2023-11-27 07:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `nim`, `prodi`, `class`) VALUES
(5, 17, '1908324', 'ilkom', '2019'),
(6, 18, '2008132', 'pilkom', '2020'),
(7, 19, '2006055', 'pilkom', '2020'),
(8, 20, '2000532', 'pilkom', '2020'),
(9, 21, '2002895', 'pilkom', '2020'),
(10, 22, '2005128', 'ilkom', '2020'),
(11, 23, '2009957', 'pilkom', '2020'),
(12, 24, '1908860', 'ilkom', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `sub_title`, `created_at`) VALUES
(1, 'Technology Acceptance Model (TAM)', 'Perceived Ease Of Use', '2023-11-26 14:17:34'),
(2, 'Technology Acceptance Model (TAM)', 'Perceived Ease Of Use', '2023-11-26 14:17:34'),
(3, 'Technology Acceptance Model (TAM)', 'Perceived Ease Of Use', '2023-11-26 14:19:27'),
(4, 'Technology Acceptance Model (TAM)', 'Perceived Ease Of Use', '2023-11-26 14:19:27'),
(5, 'Technology Acceptance Model (TAM)', 'Perceived Usefulness', '2023-11-26 14:19:27'),
(6, 'Technology Acceptance Model (TAM)', 'Perceived Usefulness', '2023-11-26 14:19:27'),
(7, 'Technology Acceptance Model (TAM)', 'Perceived Usefulness', '2023-11-26 14:19:27'),
(8, 'Technology Acceptance Model (TAM)', 'Perceived Usefulness', '2023-11-26 14:19:27'),
(9, 'Techonology Acceptance Model (TAM)', 'Attitude Toward Using', '2023-11-27 06:27:35'),
(10, 'Technology Acceptance Model (TAM)', 'Attitude Toward Using', '2023-11-27 06:28:53'),
(11, 'Technology Acceptance Model (TAM)', 'Attitude Toward Using', '2023-11-27 06:28:53'),
(12, 'Technology Acceptance Model (TAM)', 'Attitude Toward Using', '2023-11-27 06:30:09'),
(13, 'End-User Computing Satisfaction (EUCS)', 'Content', '2023-11-27 06:33:32'),
(14, 'End-User Computing Satisfaction (EUCS)', 'Content', '2023-11-27 06:33:32'),
(15, 'End-User Computing Satisfaction (EUCS)', 'Content', '2023-11-27 06:36:07'),
(16, 'End-User Computing Satisfaction (EUCS)', 'Content', '2023-11-27 06:36:07'),
(17, 'End-User Computing Satisfaction (EUCS)', 'Accuracy', '2023-11-27 06:39:30'),
(18, 'End-User Computing Satisfaction (EUCS)', 'Accuracy', '2023-11-27 06:39:30'),
(19, 'End-User Computing Satisfaction (EUCS)', 'Accuracy', '2023-11-27 06:40:05'),
(20, 'End-User Computing Satisfaction (EUCS)', 'Format', '2023-11-27 06:40:05'),
(21, 'End-User Computing Satisfaction (EUCS)', 'Format', '2023-11-27 06:40:43'),
(22, 'End-User Computing Satisfaction (EUCS)', 'Format', '2023-11-27 06:40:43'),
(23, 'End-User Computing Satisfaction (EUCS)', 'Timeliness', '2023-11-27 06:41:20'),
(24, 'End-User Computing Satisfaction (EUCS)', 'Timeliness', '2023-11-27 06:41:20'),
(25, 'End-User Computing Satisfaction (EUCS)', 'Timeliness', '2023-11-27 06:41:54'),
(26, 'End-User Computing Satisfaction (EUCS)', 'Ease Of Use', '2023-11-27 06:41:54'),
(27, 'End-User Computing Satisfaction (EUCS)', 'Ease Of Use', '2023-11-27 06:44:10'),
(28, 'End-User Computing Satisfaction (EUCS)', 'Ease Of Use', '2023-11-27 06:44:10'),
(29, 'User Satisfaction', NULL, '2023-11-27 06:44:10'),
(30, 'User Satisfaction', NULL, '2023-11-27 06:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `gender_id`, `password`) VALUES
(16, 'admin', 'admin@gmail.com', 1, NULL, '$2y$10$POzTKv9x7tRqC4igZ0ZPgO1HBhcKrsWoMq0LvXvAY0hyQllhcI3bi'),
(17, 'Alya', NULL, 0, 2, NULL),
(18, 'Anthonio Akbar ', NULL, 0, 1, NULL),
(19, 'Karina Aulia', NULL, 0, 2, NULL),
(20, 'Muzakki Abdillah', NULL, 0, 1, NULL),
(21, 'Johannes Alexander Putra', NULL, 0, 1, NULL),
(22, 'Satria Ramadhani', NULL, 0, 1, NULL),
(23, 'Fadhil Azzam Ismail ', NULL, 0, 1, NULL),
(24, 'abighail', NULL, 0, 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `answer_details`
--
ALTER TABLE `answer_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_id` (`answer_id`),
  ADD KEY `questioners_id` (`questioners_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questioners`
--
ALTER TABLE `questioners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `gender_id` (`gender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `answer_details`
--
ALTER TABLE `answer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questioners`
--
ALTER TABLE `questioners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `answer_details`
--
ALTER TABLE `answer_details`
  ADD CONSTRAINT `answer_details_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`),
  ADD CONSTRAINT `answer_details_ibfk_2` FOREIGN KEY (`questioners_id`) REFERENCES `questioners` (`id`);

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questioners`
--
ALTER TABLE `questioners`
  ADD CONSTRAINT `questioners_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
