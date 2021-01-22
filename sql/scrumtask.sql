-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 22 Oca 2021, 18:07:29
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `scrumtask`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `task_tarih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_ad` varchar(50) NOT NULL,
  `task_teknikuzman` varchar(50) NOT NULL,
  `task_tahminisure` varchar(50) NOT NULL,
  `task_bitistarihi` varchar(25) DEFAULT NULL,
  `task_type` varchar(50) NOT NULL,
  `task_aciklama` text NOT NULL,
  `task_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `tasks`
--

INSERT INTO `tasks` (`task_id`, `kullanici_id`, `task_tarih`, `task_ad`, `task_teknikuzman`, `task_tahminisure`, `task_bitistarihi`, `task_type`, `task_aciklama`, `task_notes`) VALUES
(1, 1, '2021-01-22 16:36:24', 'Scrum Task', 'Yiğit Lüleci', '3 iş günü', '2021-01-22 18:43:26', '2', 'Web tabanlı scrum task uygulaması yapılacak', '1.Front-End html-css-bs4 kullanılacak.\r\n2.Back-End php ile yazılacak.\r\n3.MySQL kullanılacak.'),
(2, 1, '2021-01-22 17:43:44', 'İleri Web Programlama', 'Yiğit Lüleci', '2 iş günü', NULL, '1', 'Patİzmir web sitesi tasarlanıcak.', 'Back-End Php ile yazılacak'),
(3, 2, '2021-01-22 21:03:32', 'Deneme Proje', 'Deneme Hesap', '4 iş günü', '2021-01-22 21:04:04', '2', 'Deneme projesi yapılacak', 'Deneme için bir proje\r\nNot ekleme denemesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_ad` varchar(50) NOT NULL COMMENT 'Ad Soyad',
  `kullanici_mail` varchar(250) NOT NULL COMMENT 'e-mail',
  `kullanici_pass` varchar(50) NOT NULL COMMENT 'Şifre',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Oluşturulma Tarihi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`kullanici_id`, `kullanici_ad`, `kullanici_mail`, `kullanici_pass`, `created_at`) VALUES
(1, 'Yigit Lüleci', 'yigit.luleciz@hotmail.com', '12345678910a', '2021-01-22 01:29:24'),
(2, 'Deneme Hesap', 'deneme@deneme.com', '12345678910a', '2021-01-22 21:02:52');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
