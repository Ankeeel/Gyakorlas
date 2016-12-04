-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2016. Dec 04. 12:01
-- Kiszolgáló verziója: 10.1.16-MariaDB
-- PHP verzió: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `ricsi_db`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `gender`
--

CREATE TABLE `gender` (
  `genderId` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `gender`
--

INSERT INTO `gender` (`genderId`, `name`) VALUES
(1, 'ferfi'),
(2, 'no'),
(3, 'transznemu');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `looking`
--

CREATE TABLE `looking` (
  `lookingId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `oGender` text COLLATE utf8_hungarian_ci NOT NULL,
  `tol` int(11) NOT NULL,
  `ig` int(11) NOT NULL,
  `oCity` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `oEColor` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `oHColor` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `oLooklike` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `online` int(11) NOT NULL,
  `oSmoking` varchar(25) COLLATE utf8_hungarian_ci NOT NULL,
  `oHChild` varchar(25) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `persetting`
--

CREATE TABLE `persetting` (
  `settingId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `city` text COLLATE utf8_hungarian_ci NOT NULL,
  `job` text COLLATE utf8_hungarian_ci NOT NULL,
  `school` text COLLATE utf8_hungarian_ci NOT NULL,
  `gender` text COLLATE utf8_hungarian_ci NOT NULL,
  `bday` date NOT NULL,
  `height` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `eColor` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `hColor` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `smoking` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `looklike` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `hChild` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ratings`
--

CREATE TABLE `ratings` (
  `ratingId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `rating_value` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `pass` varchar(25) COLLATE utf8_hungarian_ci NOT NULL,
  `regDate` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`genderId`);

--
-- A tábla indexei `looking`
--
ALTER TABLE `looking`
  ADD PRIMARY KEY (`lookingId`);

--
-- A tábla indexei `persetting`
--
ALTER TABLE `persetting`
  ADD PRIMARY KEY (`settingId`);

--
-- A tábla indexei `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratingId`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `gender`
--
ALTER TABLE `gender`
  MODIFY `genderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT a táblához `looking`
--
ALTER TABLE `looking`
  MODIFY `lookingId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `persetting`
--
ALTER TABLE `persetting`
  MODIFY `settingId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
