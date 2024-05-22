-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 22, 2024 at 12:16 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techworld`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` double NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `subcategory`) VALUES
(1, 'ASUS ROG Zephyrus G14', 16999, 1, 2),
(2, 'ASUS GeForce RTX 4090 ROG Strix Gaming White', 9899, 5, 1),
(3, 'Gigabyte GeForce RTX 4060 Eagle', 1469, 5, 1),
(4, 'AMD Radeon RX 6950 XT ', 2699, 5, 2),
(5, 'Intel Core i7-13700K', 1799, 3, 1),
(6, 'AMD Ryzen 5 5600', 599, 3, 2),
(7, 'ASUS Vivobook 15 ', 2549, 1, 3),
(8, 'Lenovo Yoga 7-14', 4499, 1, 1),
(9, 'Apple iPhone 15 128GB', 3799, 10, 1),
(10, 'Samsung Galaxy A15 4/128', 599, 10, 2),
(11, 'MSI MAG Z790 TOMAHAWK WIFI', 1089, 4, 1),
(12, 'ASUS ROG Swift OLED PG27AQDM', 4449, 6, 2),
(13, 'LG 27GN800P-B', 889, 6, 2),
(14, 'ASUS ROG Strix SCAR 18 ', 23299, 1, 2),
(15, 'HP Envy 13 x360 ', 5149, 1, 3),
(16, 'ASUS TUF Gaming A15 ', 4299, 1, 2),
(17, 'Gigabyte AORUS 7 9KF ', 5148, 1, 2),
(18, 'Lenovo ThinkPad E16 ', 4099, 1, 1),
(19, 'Apple MacBook Pro M3', 10499, 1, 1),
(20, 'ASUS ExpertBook B1502CBA ', 1799, 1, 1),
(21, 'Lenovo Legion T5-26', 5699, 2, 1),
(22, 'ASUS ExpertCenter D700MD', 2299, 2, 2),
(23, 'HP Elite 600 G9 Mini', 2949, 2, 2),
(24, 'Dell Alienware Aurora R16', 21399, 2, 1),
(25, 'AMD Ryzen 7 7800X3D', 1539, 3, 2),
(26, 'AMD Ryzen 9 5950X', 1399, 3, 2),
(27, 'Intel Core i5-12400F', 579, 3, 1),
(28, 'Intel Core i9-14900K', 2679, 3, 1),
(29, 'MSI MEG Z790 GODLIKE', 6569, 4, 1),
(30, 'ASUS PRIME H610M-K DDR4', 329, 4, 1),
(31, 'MSI B650 GAMING PLUS WIFI', 809, 4, 2),
(32, 'ASUS ROG CROSSHAIR X670E HERO', 3649, 4, 2),
(33, 'Gigabyte B550 AORUS ELITE V2', 569, 4, 3),
(34, 'Gigabyte B550M DS3H', 389, 4, 3),
(35, 'Gigabyte B760 GAMING X DDR4', 599, 4, 1),
(36, 'Zotac GeForce RTX 3060 Twin Edge', 1299, 5, 1),
(37, 'ASUS Radeon RX 6400 Phoenix', 699, 5, 2),
(38, 'Sapphire Radeon RX 7900 XTX NITRO+ GAMING OC', 5399, 5, 2),
(39, 'Sapphire Radeon RX 7800 XT PURE', 2599, 5, 2),
(40, 'Gigabyte GeForce RTX 4070 Ti SUPER WINDFORCE', 3999, 5, 1),
(41, 'Zotac GeForce RTX 4080 SUPER AMP', 5399, 5, 1),
(42, 'ASUS ROG Swift Pro PG248QP', 4399, 6, 3),
(43, 'LG 27MR400-B', 499, 6, 2),
(44, 'Samsung Odyssey G5 S32CG552EUX', 1199, 6, 1),
(45, 'iiyama G-Master GB3467WQSU-B5 Red Eagle', 1779, 6, 1),
(46, 'Samsung Odyssey G4 LS25BG400EUXEN 240Hz', 949, 6, 3),
(47, 'iiyama G-Master G2470HSU Red Eagle', 649, 6, 3),
(48, 'Gigabyte M28U HDR KVM HDMI 2.1', 2199, 6, 2),
(49, 'Corsair XENEON FLEX 45WQHD240', 7299, 6, 1),
(50, 'ASUS ZenScreen MB17AHG przenośny', 1549, 6, 4),
(51, 'ASUS ROG Strix XG259QNS', 2199, 6, 3),
(52, 'iiyama G-Master GB2590HSU-B5 Gold Phoenix', 1219, 6, 3),
(53, 'iiyama G-Master G2445HSU-B1 Black Hawk', 489, 6, 3),
(54, 'Razer Ornata V3 X', 117, 7, 2),
(55, 'SteelSeries Apex 3 TKL', 238, 7, 2),
(56, 'KRUX Atax PRO RGB Pudding', 199, 7, 1),
(57, 'KRUX ATAX 65% Pro RGB Wireless', 299, 7, 1),
(58, 'ENDORFY Thock 75% Wireless Black', 349, 7, 1),
(59, 'Keychron V1 D1', 599, 7, 1),
(60, 'Genesis Thor 404 TKL', 299, 7, 1),
(61, 'Dream Machines DreamKey', 269, 7, 1),
(62, 'Cooler Master MM730 RGB', 139, 8, 1),
(63, 'Genesis Zircon 500 Wireless', 129, 8, 1),
(64, 'Razer Basilisk X Hyperspeed', 249, 8, 1),
(65, 'SteelSeries Prime', 259, 8, 1),
(66, 'Logitech G502 X PLUS', 559, 8, 1),
(67, 'HyperX Pulsefire Haste 2 Wireless', 379, 8, 1),
(68, 'Razer DeathAdder V3 Pro White', 519, 8, 1),
(69, 'Creative ZEN Hybrid Czarny', 259, 9, 2),
(70, 'JBL Tune 770NC Czarne', 319, 9, 2),
(71, 'ENDORFY Viro Infra', 169, 9, 1),
(72, 'Genesis Toron 531 czarne', 199, 9, 1),
(73, 'Logitech G733 Lightspeed czarne', 549, 9, 1),
(74, 'Razer Kraken V3 Pro', 849, 9, 1),
(75, 'Xiaomi Redmi Note 13 6/128GB', 777, 10, 3),
(76, 'Xiaomi 14 Ultra 16/512GB', 6799, 10, 3),
(77, 'Samsung Galaxy M34 5G 6/128GB', 999, 10, 2),
(78, 'Samsung Galaxy S23 8/128GB', 3599, 10, 2),
(79, 'Samsung Galaxy S24 Ultra 12GB/256GB', 5799, 10, 2),
(80, 'Samsung Galaxy Z Flip5 5G 8/512GB', 4699, 10, 2),
(81, 'Apple iPhone 13 Mini 128GB', 2999, 10, 1),
(82, 'Apple iPhone SE 3gen 128GB', 2499, 10, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `pass` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `admin`) VALUES
(1, 'admin@gmail.com', '$2y$12$gYH0ZElK.UOl1Ckdmx7lWuDYMyukC2pGwZ9fwCy4ozqnqXI2LtCNK', 1),
(2, 'michal@gmail.com', '$2y$12$hznjk641O1tQH4IM8f2UI.MbZ7ucNH2uVhM8YGd8wnvm8O0h484.2', 0),
(3, 'adam@onet.pl', '$2y$12$p.5DCuEXWrMV0SMmZn1AfuG6TilZhRAD1pMi8bL2YcngUjL97Fb.6', 0),
(4, 'adam@gmail.com', '$2y$12$5WYyk/chfUXfNIdEK0PPiev0eMeoiuHYJBT8SkuZ492S4qbQeQrhe', 0),
(5, 'tomasz@gmail.com', '$2y$12$9hDk7AXe8jSsdy75iSN8w.u36OrkJFc07DKxV2UEhHzOIxS/Z6gyy', 0),
(8, 'michalmichal@gmail.com', '$2y$12$2hQW6zKwqs.oz03mEN42vO8x33pRiC9B6f74ZFVJIabohNjVh6Ezy', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
