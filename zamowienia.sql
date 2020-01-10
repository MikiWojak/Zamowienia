-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Sty 2020, 17:50
-- Wersja serwera: 10.4.10-MariaDB
-- Wersja PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zamowienia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `nazwa_klienta` text COLLATE utf8_polish_ci NOT NULL,
  `czy_partner` text COLLATE utf8_polish_ci NOT NULL,
  `imie_klienta` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko_klienta` text COLLATE utf8_polish_ci NOT NULL,
  `adres_klienta` text COLLATE utf8_polish_ci NOT NULL,
  `poczta_klienta` text COLLATE utf8_polish_ci NOT NULL,
  `tel_klienta` text COLLATE utf8_polish_ci NOT NULL,
  `email_klienta` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `nazwa_klienta`, `czy_partner`, `imie_klienta`, `nazwisko_klienta`, `adres_klienta`, `poczta_klienta`, `tel_klienta`, `email_klienta`) VALUES
(1, 'Jan Kowalski', 'tak', 'Jan', 'Kowalski', 'ul. Długa 23/5', '34-100 Wadowice', '026283291', 'jan.kowalski@poczta.pl'),
(2, 'Anna Nowak', 'nie', 'Anna', 'Nowak', 'Zembrzyce 176', '34-210 Zembrzyce', '372127198', 'anna-nowak@gmail.com'),
(3, 'Grzegorz Marciniak', 'nie', 'Grzegorz', 'Marciniak', 'ul. Na Stawach 11/8', '34-200 Sucha Beskidzka', '125376122', 'grzechu_marciniak@wp.pl'),
(4, 'Halina Franczewska', 'nie', 'Halina', 'Franczewska', 'ul. Mickiewicza 87', '18-300 Gdańsk', '128322123', 'halina_f@post.pl'),
(6, 'Krzysztof Zaręba', 'nie', 'Krzysztof', 'Zaręba', 'Zawoja 246', '34-250 Zawoja', '345231987', 'krzych@gmail.com'),
(7, 'Michał Porzecki', 'nie', 'Michał', 'Porzecki', 'ul. Na Stawach 13/6', '34-200 Sucha Beskidzka', '054208083', 'porzecki@post.pl'),
(8, 'Natalia Marciniak', 'nie', 'Natalia', 'Marciniak', 'ul. Nad Stawami 72', '34-200 Sucha Beskidzka', '046272127', 'nat-marciniak@gmail.com'),
(9, 'Tadeusz Adamski', 'nie', 'Tadeusz', 'Adamski', 'Grzechynia 278', '34-220 Maków Podhalański', '954263192', 'tadek-adamski@onet.pl'),
(10, 'Edward Nowak', 'nie', 'Edward', 'Nowak', 'ul. 3 Maja 11/5', '34-220 Maków Podhalański', '843232120', 'edek.nowak@gmail.com'),
(11, 'Magdalena Rzecka', 'nie', 'Magdalena', 'Rzecka', 'ul. Boczna 9/3', '34-200 Sucha Beskidzka', '344293121', 'magda-rzecka@wp.pl'),
(12, 'Martyna Wójcik', 'nie', 'Martyna', 'Wójcik', 'Zawoja 97', '34-250 Zawoja', '937128199', 'marti.wojcik@wp.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
