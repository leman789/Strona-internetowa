-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Gru 2020, 17:02
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `strona_z_grami`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `biblioteka_gier`
--

CREATE TABLE `biblioteka_gier` (
  `id` int(11) NOT NULL,
  `id_gry` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `biblioteka_gier`
--

INSERT INTO `biblioteka_gier` (`id`, `id_gry`, `id_uzytkownika`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_logowania`
--

CREATE TABLE `dane_logowania` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `Login` text COLLATE utf8_polish_ci NOT NULL,
  `Haslo` text COLLATE utf8_polish_ci NOT NULL,
  `E-mail` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dane_logowania`
--

INSERT INTO `dane_logowania` (`id`, `id_uzytkownika`, `Login`, `Haslo`, `E-mail`) VALUES
(1, 1, 'R3czus', 'Mleko', 'Mleczko@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gry`
--

CREATE TABLE `gry` (
  `id` int(11) NOT NULL,
  `Nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `Opis` varchar(250) COLLATE utf8_polish_ci NOT NULL,
  `Cena` float NOT NULL,
  `id_tworcy` int(11) NOT NULL,
  `Data_wydania` date NOT NULL,
  `wymagania` text COLLATE utf8_polish_ci NOT NULL,
  `Obrazek` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Alt_obrazka` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gry`
--

INSERT INTO `gry` (`id`, `Nazwa`, `Opis`, `Cena`, `id_tworcy`, `Data_wydania`, `wymagania`, `Obrazek`, `Alt_obrazka`) VALUES
(2, 'Mukulele', 'jest to gra strategiczna o tematyce surwiwalowej, zobacz czy dasz rade :) ', 30, 1, '2020-12-22', 'System operacyjny: Windows 7 (64-bit), Windows 8.1 (64-bit).\r\nProcesor: Intel Core i5 2500K 3,3 GHz lub AMD Phenom II X4 940.\r\nKarta graficzna: NVIDIA GeForce GTX 660 lub AMD Radeon HD 7870.\r\nPamięć: 6 GB RAM.\r\nDysk twardy: 40 GB.\r\nDirectX 11.', 'Mukulele.jpg', 'Mukulele');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tworcy`
--

CREATE TABLE `tworcy` (
  `id` int(11) NOT NULL,
  `Imie` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Producent` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tworcy`
--

INSERT INTO `tworcy` (`id`, `Imie`, `Nazwisko`, `Producent`) VALUES
(1, '', '', 'Klekel Gry');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `Imie` text COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `Nick` text COLLATE utf8_polish_ci NOT NULL,
  `Wiek` int(11) NOT NULL,
  `Stan_konta` float NOT NULL,
  `Avatar` text COLLATE utf8_polish_ci NOT NULL DEFAULT '1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `Imie`, `Nazwisko`, `Nick`, `Wiek`, `Stan_konta`, `Avatar`) VALUES
(1, 'Dawid', 'Reczek', 'R3czus', 17, 0, '1.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `biblioteka_gier`
--
ALTER TABLE `biblioteka_gier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gry` (`id_gry`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `gry`
--
ALTER TABLE `gry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tworcy` (`id_tworcy`);

--
-- Indeksy dla tabeli `tworcy`
--
ALTER TABLE `tworcy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `biblioteka_gier`
--
ALTER TABLE `biblioteka_gier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `gry`
--
ALTER TABLE `gry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `tworcy`
--
ALTER TABLE `tworcy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `biblioteka_gier`
--
ALTER TABLE `biblioteka_gier`
  ADD CONSTRAINT `biblioteka_gier_ibfk_1` FOREIGN KEY (`id_gry`) REFERENCES `gry` (`id`),
  ADD CONSTRAINT `biblioteka_gier_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`);

--
-- Ograniczenia dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  ADD CONSTRAINT `dane_logowania_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`);

--
-- Ograniczenia dla tabeli `gry`
--
ALTER TABLE `gry`
  ADD CONSTRAINT `gry_ibfk_1` FOREIGN KEY (`id_tworcy`) REFERENCES `tworcy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
