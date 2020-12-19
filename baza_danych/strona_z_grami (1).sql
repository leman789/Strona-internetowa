-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Gru 2020, 19:09
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id_użytkownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_logowania`
--

CREATE TABLE `dane_logowania` (
  `id_użytkownika` int(11) NOT NULL,
  `Login` text COLLATE utf8_polish_ci NOT NULL,
  `Hasło` text COLLATE utf8_polish_ci NOT NULL,
  `E-mail` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dane_logowania`
--

INSERT INTO `dane_logowania` (`id_użytkownika`, `Login`, `Hasło`, `E-mail`) VALUES
(1, 'ShaoChuj', 'asd123', 'kaminskidawid111@gmail.com'),
(2, 'Kutołajson', 'asd123', 'miko@wp.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gry`
--

CREATE TABLE `gry` (
  `id` int(11) NOT NULL,
  `Nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `Opis` text COLLATE utf8_polish_ci NOT NULL,
  `Cena` float NOT NULL,
  `Id_twórcy` int(11) NOT NULL,
  `Data_wydania` date NOT NULL,
  `Wymagania` text COLLATE utf8_polish_ci NOT NULL,
  `obrazek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `twórcy`
--

CREATE TABLE `twórcy` (
  `id` int(11) NOT NULL,
  `Imię` text COLLATE utf8_polish_ci DEFAULT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci DEFAULT NULL,
  `Producent` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `użytkownicy`
--

CREATE TABLE `użytkownicy` (
  `id` int(11) NOT NULL,
  `Imię` text COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `Wiek` int(11) NOT NULL,
  `Stan_konta` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `użytkownicy`
--

INSERT INTO `użytkownicy` (`id`, `Imię`, `Nazwisko`, `Wiek`, `Stan_konta`) VALUES
(1, 'Dawid', 'Kamiński', 17, 0),
(2, 'Mikołaj', 'Nolewajka', 17, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `biblioteka_gier`
--
ALTER TABLE `biblioteka_gier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1` (`id_gry`),
  ADD KEY `FK2` (`id_użytkownika`);

--
-- Indeksy dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  ADD KEY `FK` (`id_użytkownika`);

--
-- Indeksy dla tabeli `gry`
--
ALTER TABLE `gry`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `twórcy`
--
ALTER TABLE `twórcy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `użytkownicy`
--
ALTER TABLE `użytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `biblioteka_gier`
--
ALTER TABLE `biblioteka_gier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `gry`
--
ALTER TABLE `gry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `twórcy`
--
ALTER TABLE `twórcy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `użytkownicy`
--
ALTER TABLE `użytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `biblioteka_gier`
--
ALTER TABLE `biblioteka_gier`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`id_gry`) REFERENCES `gry` (`id`),
  ADD CONSTRAINT `FK2` FOREIGN KEY (`id_użytkownika`) REFERENCES `użytkownicy` (`id`);

--
-- Ograniczenia dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  ADD CONSTRAINT `FK` FOREIGN KEY (`id_użytkownika`) REFERENCES `użytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
