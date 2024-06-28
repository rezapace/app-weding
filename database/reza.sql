-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2023 pada 07.23
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reza`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_heading` varchar(255) NOT NULL,
  `about_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `about_heading`, `about_text`) VALUES
(1, 'About Us', 'We are a startup that stands to help couples who are ready to carry out their sacred promise to live together and build a family and have been at our best to make a deep impression. To welcome your happy day with your loved ones in starting a new.\r\n\r\nWe are a startup that stands to help couples who are ready to carry out their sacred promise to live together and build a family and have been at our best to make a deep impression. To welcome your happy day with your loved ones in starting a new.\r\n\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blog_date` datetime DEFAULT NULL,
  `blog_heading` varchar(255) NOT NULL,
  `blog_text` text NOT NULL,
  `blog_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `blog_date`, `blog_heading`, `blog_text`, `blog_image`) VALUES
(1, '2023-03-14 10:43:41', 'Jangan Ragu untuk Menikah, Ini Janji dan Jaminan Rezeki dari Allah SWT', 'Pernikahan dapat dimaknai sebagai ikatan lahir dan batin yang dilaksanakan menurut syariat Islam antara seorang laki-laki dan seorang perempuan, untuk hidup bersama dalam satu rumah tangga guna mendapatkan keturunan.', '202eba4f142351b909ae3f2d96bb1cf4-blog1.jpg'),
(2, '2023-03-14 10:44:16', 'Sudah Pernah Menikah tapi Belum Pernah Digauli, Bagaimana Statusnya dalam Islam?', 'Nah, dalam beberapa kasus, ada wanita yang sudah menikah, kemudian cerai namun belum digauli. Atau bisa juga, sudah menikah belum pernah digauli, namun suaminya meninggal', '6c0949d4341e44f9e1dab0447f560424-blog2.jpg'),
(3, '2023-03-14 10:45:03', 'Mengapa Banyak Pria yang Sudah Menikah Menganggap Istri Orang Lain Lebih Menarik?', 'Semua pria cenderung mengagumi dan melihat ke arah istri pria lain tetapi hanya beberapa yang maju dan bertindak atas ketertarikan mereka yang kemudian mengarah pada perselingkuhan dalam pernikahan.', 'a24cdf55e7d7145a08c67d865f010887-blog3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_date` datetime DEFAULT NULL,
  `contact_name` varchar(225) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `contact_date`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`) VALUES
(5, '2023-03-14 12:11:19', 'Iqbal ', 'iqbalprasetya665@gmail.com', 'Menawarkan Kerjasama', 'Halo saya ingin menawarkan Kerjasama'),
(6, '2023-03-14 01:13:51', 'farel', 'test@gmail.com', 'testtt', 'haloo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `features_icon` varchar(255) NOT NULL,
  `features_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `features`
--

INSERT INTO `features` (`id`, `features_icon`, `features_name`) VALUES
(1, 'fa-solid fa-address-book', 'Accommodate Invited Guests'),
(2, 'fa-solid fa-circle-check', 'Verified Wedding Organizer'),
(4, 'fa-solid fa-clock', 'Always On Time Every Time'),
(5, 'fa-solid fa-house', 'Comfortable and Safe Indoor Place'),
(6, 'fa-solid fa-camera', 'Broadcast On Multiple Platforms'),
(7, 'fa-solid fa-shirt', 'Great Souvenirs and Gifts');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gallery_heading` varchar(255) NOT NULL,
  `gallery_desc` text NOT NULL,
  `gallery_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_heading`, `gallery_desc`, `gallery_image`) VALUES
(1, 'Pernikahan Jhon &  Emma', 'Mar 14 2023', '95b66256391cf16df1f716067ed5c885-gallery1.jpg'),
(2, 'Pernikahan Candler & Mia', 'Bangku & Meja Tamu Undangan', '90b0c15d7053da82f8bf2addb32dbdf8-gallery2.jpg'),
(4, 'Pernihakan Chris & Rin', 'Tempat Mengucapkan Janji Suci', '42a6599845ab472c68303cb34f6e15d0-gallery3.jpg'),
(5, 'Pernikahan Finn & Alexa', 'Bangku Para Tamu', '03e65ed528a1063814a1e4453b3238c9-gallery4.jpg'),
(6, 'Pernikahan Andi & Sinta', 'Jamuan Tamu', 'd162b6c93c42dddb860da77f62aaa33c-gallery5.jpg'),
(7, 'Pernikahan Bagus & Sriayuningsih', 'Tradisi Pernikahan', '7f49ff22466565c4831d329febcc1736-gallery6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `packages_heading` varchar(255) NOT NULL,
  `packages_price` varchar(255) NOT NULL,
  `packages_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`id`, `packages_heading`, `packages_price`, `packages_list`) VALUES
(1, 'BRONZE PACKAGE', '$750', '<ul>\r\n<li>Delicious Main Buffet 300 Servings</li>\r\n<li>Beautiful Makeup, Luxurious Wedding Clothing</li>\r\n<li>Magnificent Aisle Beautiful Decoration</li>\r\n<li>Photo and Video Shooting &amp; Exclusive Collage Album</li>\r\n<li>Master Of Ceremony (MC) With A Sweet Voice</li>\r\n</ul>'),
(2, 'SILVER PACKAGE', '$1000', '<ul>\r\n<li>Delicious Main Buffet 300 Servings</li>\r\n<li>Beautiful Makeup, Luxurious Wedding Clothing</li>\r\n<li>Magnificent Aisle Beautiful Decoration</li>\r\n<li>Photo and Video Shooting &amp; Exclusive Collage Album</li>\r\n<li>Master Of Ceremony (MC) With A Sweet Voice</li>\r\n</ul>'),
(3, 'GOLD PACKAGE', '$1200', '<ul>\r\n<li>Delicious Main Buffet 300 Servings</li>\r\n<li>Beautiful Makeup, Luxurious Wedding Clothing</li>\r\n<li>Magnificent Aisle Beautiful Decoration</li>\r\n<li>Photo and Video Shooting &amp; Exclusive Collage Album</li>\r\n<li>Master Of Ceremony (MC) With A Sweet Voice</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `testi_text` text NOT NULL,
  `testi_client` varchar(255) NOT NULL,
  `testi_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimonial`
--

INSERT INTO `testimonial` (`id`, `testi_text`, `testi_client`, `testi_image`) VALUES
(1, 'Saya sangat merekomendasikan wedding organizer ini', 'Chris & Mia', 'efb57760ce625d44d4e9690d4c4650c4-client1.jpg'),
(2, 'Saya dan istri saya sangat puas dengan pelayanan nya', 'Cendler & Mia', '32d4dd8e1a66af69773985c4bb64005a-client2.jpg'),
(3, 'Membantu sekali untuk pernikahan saya', 'Jhon & Emma', '46f7d8f3c33641346da6a4a4e113d90e-client3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `user_username`, `user_password`) VALUES
(1, 'reza', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
