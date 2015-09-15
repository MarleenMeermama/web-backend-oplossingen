-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 sep 2015 om 14:02
-- Serverversie: 5.6.25
-- PHP-versie: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_labo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('todo','done') NOT NULL DEFAULT 'todo',
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `todos`
--

INSERT INTO `todos` (`id`, `description`, `status`, `user_id`) VALUES
(1, 'wandelen', 'todo', 1),
(2, 'testen eerste fase', 'todo', 2),
(3, 'testen tweede fase', 'done', 2),
(4, 'testen', 'todo', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `salt` varchar(250) COLLATE utf8_bin NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `salt`, `user_type`, `date`) VALUES
(1, 'a@test.be', '64997f5ab36388e06e5c7cf8c14978d5888f87d83740e9a3ef78fc356d3ddb2fd019085c8bf5f345c37c67a4e8fcc44c68f4022c23418642593fb1508740044f', '84448573155f6a7d621d371.97375979', 1, '0000-00-00 00:00:00'),
(2, 'b@test.be', '518be1cb6ccf5840ac70355675b09cc695f89674d447232cf2e045a57bee06f94c48a6f97cb375a5bc91807324314b007bb263f160ae3fcdfa3695a968fbc075', '29449567855f6a9949cba89.60072073', 1, '0000-00-00 00:00:00'),
(3, 'c@test.be', '16191191a1a4dfa78401e9a9c081ebc15d45ba000641d545c5430432604479e20204ca57b02f7ff4190dc3e4020639d9314a43a4d0cb5edd3169e22ec2ea8868', '73518175155f6acea05eec6.36601806', 1, '0000-00-00 00:00:00'),
(4, 'd@test.be', 'cae74fa7b29e380c40eae33ac83246c1e702f2b50db0b1d82626442232fe1c1ce39a00bcb2daf5fed1f26a0bbbbb8608b2d5fb80765bbbc69fed10dd484e4e6c', '186356850755f6b4b4630033.61139587', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users1`
--

CREATE TABLE IF NOT EXISTS `users1` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Gegevens worden geëxporteerd voor tabel `users1`
--

INSERT INTO `users1` (`id`, `email`, `password`) VALUES
(1, 'test@test.be', 'ff5fc63ed509c23e6f823a090a3647fd23d4005f5717ec338a0cb91fb7243f5393c5798cdf251b90a92979aa1f98bb20ecfab864b708b831cfa9f24e41e93af8'),
(2, 'marleen@test.be', '123456'),
(3, 'marleen@test.be', '123456'),
(4, 'marleen@test.be', '123456'),
(5, 'marleen@test.be', '123456'),
(6, 'marleen@test.be', '123456'),
(7, 'marleen@test.be', '123456');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
