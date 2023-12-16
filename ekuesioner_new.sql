-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2023 pada 10.10
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

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
-- Struktur dari tabel `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'on-progress',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `status`, `created_at`) VALUES
(1, 10, 'finish', '2023-11-26 14:56:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `answer_details`
--

CREATE TABLE `answer_details` (
  `id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `questioners_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `answer_details`
--

INSERT INTO `answer_details` (`id`, `answer_id`, `questioners_id`, `value`, `created_at`) VALUES
(1, 1, 1, 3, '2023-11-26 15:45:55'),
(2, 1, 2, 4, '2023-11-26 16:14:09'),
(3, 1, 3, 5, '2023-11-26 16:14:12'),
(4, 1, 4, 4, '2023-11-26 16:14:15'),
(5, 1, 5, 4, '2023-11-26 16:14:19'),
(6, 1, 6, 5, '2023-11-26 16:14:21'),
(7, 1, 7, 3, '2023-11-26 16:14:24'),
(8, 1, 8, 5, '2023-11-26 16:18:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `genders`
--

INSERT INTO `genders` (`id`, `name`) VALUES
(1, 'laki-laki'),
(2, 'perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lectures`
--

CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `time_teaching` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lectures`
--

INSERT INTO `lectures` (`id`, `user_id`, `prodi`, `time_teaching`) VALUES
(1, 8, 'ilkom', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `questioners`
--

CREATE TABLE `questioners` (
  `id` int(11) NOT NULL,
  `questioner_text` text DEFAULT NULL,
  `indicator` varchar(100) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `questioners`
--

INSERT INTO `questioners` (`id`, `questioner_text`, `indicator`, `topic_id`, `created_at`, `deleted_at`) VALUES
(1, 'Saya Merasa SPADA-UPI Mudah Untuk Dipelajari.', NULL, 1, '2023-11-26 14:20:33', NULL),
(2, 'Saya Merasa Menggunakan LMS SPADA-UPI dapat meningkatkan performa kinerja saya.', NULL, 2, '2023-11-26 14:24:22', NULL),
(3, 'Saya Percaya Penggunaan SPADA-UPI akan sering digunakan dimasa depan.', NULL, 3, '2023-11-26 14:24:22', NULL),
(4, 'Saya Merasa Sistem Informasi SPADA-UPI sudah menyediakan informasi sesuai kebutuhan pengguna.', NULL, 4, '2023-11-26 14:24:22', NULL),
(5, 'Saya Merasa Sistem Informasi SPADA-UPI sudah menyediakan informasi sesuai kebutuhan pengguna.', NULL, 5, '2023-11-26 14:24:22', NULL),
(6, 'Saya Merasa Sistem Informasi SPADA-UPI sudah menyediakan informasi sesuai kebutuhan pengguna.', 'Menyediakan informasi sesuai kebutuhan', 6, '2023-11-26 14:24:22', NULL),
(7, 'Saya Merasa Sistem Informasi SPADA-UPI sudah menyediakan informasi sesuai kebutuhan pengguna.', NULL, 7, '2023-11-26 14:24:22', NULL),
(8, 'Saya Merasa Sistem Informasi SPADA-UPI sudah menyediakan informasi sesuai kebutuhan pengguna.', NULL, 8, '2023-11-26 14:24:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `user_id`, `nim`, `prodi`, `class`) VALUES
(1, 9, '', 'ilkom', NULL),
(2, 10, '10929920', 'ilkom', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `topics`
--

INSERT INTO `topics` (`id`, `title`, `sub_title`, `created_at`) VALUES
(1, 'Technology Acceptance Model (TAM)', 'Perceived Ease Of Use', '2023-11-26 14:17:34'),
(2, 'Technology Acceptance Model (TAM)', 'Perceived Usefulness', '2023-11-26 14:17:34'),
(3, 'Technology Acceptance Model (TAM)', 'Attitude Toward Using', '2023-11-26 14:19:27'),
(4, 'End-User Computing Satisfaction', 'Content', '2023-11-26 14:19:27'),
(5, 'End-User Computing Satisfaction', 'Accuracy', '2023-11-26 14:19:27'),
(6, 'End-User Computing Satisfaction', 'Format', '2023-11-26 14:19:27'),
(7, 'End-User Computing Satisfaction', 'Timeliness', '2023-11-26 14:19:27'),
(8, 'End-User Computing Satisfaction', 'Easy Of Use', '2023-11-26 14:19:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `gender_id`, `password`) VALUES
(1, 'Aldi', NULL, 0, 1, NULL),
(2, 'Aldi', NULL, 0, 1, NULL),
(3, 'Test', 'test@gmail.com', 1, NULL, '$2y$10$WuNXXkG2xM7j6Sqz26xe8.Kpf3YdgR672CAlgg7/l2wFu2nyGv3Xi'),
(4, 'test', NULL, 0, 2, NULL),
(5, 'Muhammad Aldi Surya Putra', NULL, 0, 1, NULL),
(6, 'asdasdasdasdad', NULL, 0, 1, NULL),
(7, 'asdasdasdasdad', NULL, 0, 1, NULL),
(8, 'asdasdas', NULL, 0, 1, NULL),
(9, '', NULL, 0, 1, NULL),
(10, 'milan', NULL, 0, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `answer_details`
--
ALTER TABLE `answer_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_id` (`answer_id`),
  ADD KEY `questioners_id` (`questioners_id`);

--
-- Indeks untuk tabel `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `questioners`
--
ALTER TABLE `questioners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `gender_id` (`gender_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `answer_details`
--
ALTER TABLE `answer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `questioners`
--
ALTER TABLE `questioners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `answer_details`
--
ALTER TABLE `answer_details`
  ADD CONSTRAINT `answer_details_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`),
  ADD CONSTRAINT `answer_details_ibfk_2` FOREIGN KEY (`questioners_id`) REFERENCES `questioners` (`id`);

--
-- Ketidakleluasaan untuk tabel `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `questioners`
--
ALTER TABLE `questioners`
  ADD CONSTRAINT `questioners_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Ketidakleluasaan untuk tabel `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
