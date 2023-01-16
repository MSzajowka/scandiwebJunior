-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 16 Sty 2023, 07:37
-- Wersja serwera: 10.4.26-MariaDB-cll-lve
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `rambla_scandiweb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`id`, `sku`, `name`, `price`, `type`) VALUES
(430, 'FNTR-TBL-003-c', 'Oak Table Big', 2300, 'Furniture'),
(431, 'FNTR-TBL-004-d', 'Oak Table small', 1800, 'Furniture'),
(432, 'DVD-RMBO-001-fb', 'Rambo: First Blood', 20, 'DVD'),
(433, 'DVD-PRD-120-84', 'Predator (1984)', 18, 'DVD'),
(434, 'BK-CRSD-200', 'Crusaders (Henryk Sienkiewicz)', 10, 'Book'),
(435, 'BK-RWLNG-009', 'Harry Potter I', 20, 'Book'),
(436, 'BK-ERTH-009', 'Our Earth', 12.9, 'Book'),
(437, 'FRNT-CHR-11r', 'Chair (red)', 100.8, 'Furniture'),
(438, 'FRNT-CHR-11b', 'Char (blue)', 101.8, 'Furniture'),
(439, 'FRNT-CHR-11g', 'Chair (green)', 112.75, 'Furniture'),
(440, 'DVD-TNN-Caprio', 'Titanic 3', 7, 'DVD'),
(441, 'DVD-TNN-Caprio-02', 'Titanic 4', 6, 'DVD'),
(442, 'FTN-12-09', 'Door', 1015, 'Furniture'),
(443, 'DVD-TNN-Caprio-12', 'Titanic 12', 2.5, 'DVD'),
(446, 'BK-FB-Fcb-01', 'Face', 1001, 'Book');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_property`
--

CREATE TABLE `product_property` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `product_property`
--

INSERT INTO `product_property` (`id`, `product_id`, `property_id`, `value`) VALUES
(497, 430, 3, 100),
(498, 430, 4, 60),
(499, 430, 5, 230),
(500, 431, 3, 90),
(501, 431, 4, 60),
(502, 431, 5, 120),
(503, 432, 2, 750),
(504, 433, 2, 650),
(505, 434, 1, 1),
(506, 435, 1, 0.5),
(507, 436, 1, 0.2),
(508, 437, 3, 45),
(509, 437, 4, 90),
(510, 437, 5, 55),
(511, 438, 3, 45),
(512, 438, 4, 90),
(513, 438, 5, 55),
(514, 439, 3, 45),
(515, 439, 4, 90),
(516, 439, 5, 55),
(517, 440, 2, 4096),
(518, 441, 2, 5120.5),
(519, 442, 3, 90),
(520, 442, 4, 210),
(521, 442, 5, 10),
(522, 443, 2, 8192),
(527, 446, 1, 1.1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `property` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `label` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `property`
--

INSERT INTO `property` (`id`, `type`, `property`, `description`, `label`) VALUES
(1, 'Book', 'weight', 'Please provide the weight of book in kg.', 'Weight (kg)'),
(2, 'DVD', 'size', 'Please provide size of DVD in MB.', 'Size (MB)'),
(3, 'Furniture', 'width', 'Please provide dimentions in WxHxL format.', 'Width (cm)'),
(4, 'Furniture', 'height', 'Please provide dimentions in WxHxL format.', 'Height (cm)'),
(5, 'Furniture', 'length', 'Please provide dimentions in WxHxL format.', 'Length (cm)');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `product_property`
--
ALTER TABLE `product_property`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=447;

--
-- AUTO_INCREMENT dla tabeli `product_property`
--
ALTER TABLE `product_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=528;

--
-- AUTO_INCREMENT dla tabeli `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
