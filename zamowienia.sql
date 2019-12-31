-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Gru 2019, 14:23
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
(1, 'Jan Kowalski', 'tak', 'Jan', 'Kowalski', 'ul. Długa 23/5', '34-100 Wadowice', '026 283 291', 'jan.kowalski@poczta.pl'),
(2, 'Anna Nowak', 'nie', 'Anna', 'Nowak', 'Zembrzyce 176', '34-210 Zembrzyce', '372 127 198', 'anna-nowak@gmail.com'),
(3, 'Grzegorz Marciniak', 'nie', 'Grzegorz', 'Marciniak', 'ul. Na Stawach 11/8', '34-200 Sucha Beskidzka', '125 376 122', 'grzechu_marciniak@wp.pl');

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
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
