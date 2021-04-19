-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Oca 2021, 23:02:45
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `web`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hareketler`
--

CREATE TABLE `hareketler` (
  `id` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urun` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `tutar` int(11) NOT NULL,
  `magaza` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `tur` text COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hareketler`
--

INSERT INTO `hareketler` (`id`, `tarih`, `urun`, `tutar`, `magaza`, `tur`) VALUES
(1, '2021-01-30 23:24:36', 'Market', 120, 'Migros', ''),
(2, '2021-01-30 23:26:22', 'Akaryakıt', 200, 'Petrol Ofisi', ''),
(3, '2021-01-31 00:15:42', 'Market', 20, 'A101', 'Kart'),
(4, '2021-01-31 00:18:11', 'Saglik', 200, 'Ezcane', 'Nakit');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `web`
--

CREATE TABLE `web` (
  `id` int(11) NOT NULL,
  `tutar` int(11) NOT NULL,
  `islem` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `tur` text COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `web`
--

INSERT INTO `web` (`id`, `tutar`, `islem`, `tur`) VALUES
(3, 50, 'TL', 'Kart'),
(4, 120, 'TL', 'Nakit'),
(5, 50, 'EUR', 'Nakit'),
(6, 2040, 'TL', 'Kart'),
(7, 10, 'EUR', 'Kart'),
(8, 10, 'TL', 'Nakit'),
(9, 10, 'TL', 'Kart'),
(10, -30, 'TL', 'Nakit'),
(11, 30, 'TL', 'Kart'),
(12, -20, 'TL', 'Kart'),
(13, -200, 'TL', 'Nakit'),
(14, -600, 'TL', 'Kart'),
(15, 600, 'TL', 'Nakit'),
(16, 12, 'TL', 'Nakit'),
(17, 10, 'EUR', 'Nakit');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `hareketler`
--
ALTER TABLE `hareketler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `hareketler`
--
ALTER TABLE `hareketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `web`
--
ALTER TABLE `web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
