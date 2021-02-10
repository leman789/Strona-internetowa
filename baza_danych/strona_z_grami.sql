-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Lut 2021, 09:23
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
(135, 1, 1),
(136, 4, 1),
(137, 2, 1),
(138, 3, 1),
(149, 5, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_logowania`
--

CREATE TABLE `dane_logowania` (
  `id_uzytkownika` int(11) NOT NULL,
  `Login` text COLLATE utf8_polish_ci NOT NULL,
  `Haslo` text COLLATE utf8_polish_ci NOT NULL,
  `E-mail` text COLLATE utf8_polish_ci NOT NULL,
  `uprawnienia` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dane_logowania`
--

INSERT INTO `dane_logowania` (`id_uzytkownika`, `Login`, `Haslo`, `E-mail`, `uprawnienia`) VALUES
(0, 'admin', 'admin', 'admin@123', 0),
(1, 'dreczek', 'mleczko123', 'emial@email', 2),
(92, 'leman', 'qasw', 'gornik987789@wp.pl', 0),
(98, 'login1', 'login123', 'email@emial', 1),
(100, 'sprawdz123', 'sprawdz123', 'sprawdz@gmail.com', 0),
(103, 'zobacz1', 'kkk', 'kl@kkk', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunki`
--

CREATE TABLE `gatunki` (
  `id_gry` int(11) NOT NULL,
  `fps` int(11) NOT NULL,
  `mmo` int(11) NOT NULL,
  `rpg` int(11) NOT NULL,
  `moba` int(11) NOT NULL,
  `inne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gatunki`
--

INSERT INTO `gatunki` (`id_gry`, `fps`, `mmo`, `rpg`, `moba`, `inne`) VALUES
(1, 0, 0, 1, 0, 0),
(2, 0, 1, 0, 0, 0),
(3, 0, 0, 1, 0, 0),
(4, 0, 0, 1, 0, 0),
(5, 1, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 1),
(7, 0, 0, 0, 0, 1),
(8, 0, 0, 0, 0, 1),
(9, 0, 0, 1, 0, 0),
(10, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunki_multi_single`
--

CREATE TABLE `gatunki_multi_single` (
  `id_gry` int(11) NOT NULL,
  `multip` int(11) NOT NULL,
  `singlep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gatunki_multi_single`
--

INSERT INTO `gatunki_multi_single` (`id_gry`, `multip`, `singlep`) VALUES
(1, 0, 1),
(2, 0, 1),
(3, 0, 1),
(4, 0, 1),
(5, 0, 1),
(6, 0, 1),
(7, 0, 1),
(8, 1, 0),
(9, 0, 1),
(10, 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gry`
--

CREATE TABLE `gry` (
  `id` int(11) NOT NULL,
  `Nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `Opis` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `Cena` float NOT NULL,
  `id_tworcy` int(11) NOT NULL,
  `Data_wydania` date NOT NULL,
  `Obrazek` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `Alt_obrazka` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `id_specyfikacja` int(11) DEFAULT NULL,
  `id_dodajacego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gry`
--

INSERT INTO `gry` (`id`, `Nazwa`, `Opis`, `Cena`, `id_tworcy`, `Data_wydania`, `Obrazek`, `Alt_obrazka`, `id_specyfikacja`, `id_dodajacego`) VALUES
(1, 'Assassin’s Creed Valhalla', 'To nowa gra RPG z otwartym światem od studia Ubisoft Montréal będąca kolejną odsłoną kultowej serii Assassin\'s Creed. Tym razem Twórcy przenoszą nas do średniowiecznej Anglii, która zmaga się z najazdami zaciekłych Wikingów. Jesteś jednym lub jedną z nich - nazywasz się Eivor i szukasz chwały na obcej ziemi. Walcz, eksploruj i rozwijaj swoją osadę, a także atakuj wrogie przyczółki. Klimat surowych Wysp Brytyjskich oraz mroźnej Norwegii zapiera dech w piersiach i gwarantuje niezapomniane emocje.', 249.9, 1, '2020-11-10', 'thumb-355053.jpg', 'Assassin’s Creed Val', 1, 1),
(2, 'Dota 3', 'Darmowa gra sieciowa od legendarnego studia Valve. Należy do gatunku MOBA i stanowi świetne wyzwanie dla Graczy szukających intensywnej rywalizacji. Na polu bitwy ścierają się dwie grupy składające się z pięciu Graczy każda. Zadaniem drużyny jest zdobycie twierdzy wroga, po drodze walcząc ze Stworami oraz Bohaterami, czyli wrogimi graczami. Rozwijaj swoją Postać, by nie zostać w tyle i przeć do przodu, ku zwycięstwu. Gra korzysta z silnika Source 2 i gromadzi wokół siebie wielką społeczność.', 55, 2, '2003-07-09', 'bdc9b2fa94c8d799d55b942363357e40.jpg', 'Dota 2', 2, 1),
(3, 'Final Fantasy VII', 'Dzieło studia Square Co. przeznaczone na konsolę PlayStation oraz PC. Jest jedną z najlepszych gier z gatunku jRPG, o czym świadczy imponujący remake, który trafił na konsole PS4 i PS5. To kolejny element wielkiej fabuły serii Final Fantasy. Gra przedstawia historię drużyny bohatera znanego jako Cloud Strife. Dzierży on sławny wielki miecz, Buster Sword, którym rozprawia się z różnorakimi przeciwnikami. Pozycja obowiązkowa dla fanów dalekowschodnich dzieł elektronicznej rozrywki.', 43.99, 3, '1997-01-31', '5910e62cae653a60ee410a95.jpg', 'Final Fantasy VII', 3, 1),
(4, 'Cyberpunk 2077', 'Wyczekiwana gra polskiego studia CD Projekt Red. To fabularne RPG z elementami akcji osadzone w niesamowitym Night City. Jesteś V, najemnikiem, który podejmie się nawet najtrudniejszej roboty. Możesz dostosować swój wygląd, płeć, wyposażenie, ale też przeszłość i ukształtować przyszłość - V oraz całego Night City. Fabuła może potoczyć się bardzo różnie, w zależności od Twoich wyborów. Ulubieniec Fanów, Keanu Reeves, będzie Ci towarzyszyć podczas przemierzania Miasta Snów. Wstawaj, Samuraju...', 199, 4, '2020-12-10', 'co1rft.jpg', 'Cyberpunk 2077', 4, 1),
(5, 'Doom Eternal', 'To najnowsze dzieło studia id Software, którego sztandarowa seria, DOOM, jest z nami już prawie trzy dekady, a mimo to wciąż zaskakuje świeżością i zapewnia niezwykłe doznania. Wbrew pozorom to nie bezmyślna krwawa jadka. To piekielnie krwawa jadka wymagająca ruszenia głową i pewnych umiejętności. Podczas rozgrywki adrenalina nie odpuszcza nawet na chwilę, a intensywna akcja wciska w fotel. Bezbłędna muzyka Micka Gordona buduje obłędny klimat i zagrzewa do walki. Jesteś jedynym czego się boją...', 249.99, 5, '2020-03-20', 'doometernal_2876653b.png', 'Doom Eternal', 5, 1),
(6, 'Dark Souls III', 'Fabularna gra akcji wyprodukowana przez From Software. To już trzecia część słynnej i niezwykle wymagającej serii Dark Souls. Poprzeczka jest zawieszona wysoko, to prawdziwy sprawdzian nie tylko umiejętności, ale też cierpliwości Gracza. Pokonuj potężnych Bossów i rośnij w siłę zdobywając ich nadzwyczajny oręż. Oczyszczaj lochy z plugastw i szukaj drogocennych artefaktów. Uważaj też na duchy innych Graczy! Mogą Cię wspomóc lub poważnie przeszkodzić.', 199.99, 6, '2016-03-24', 'DSIII_2D_PS4_PEGI_1434385550.jpg', 'Dark Souls III', 6, 1),
(7, 'Ori and the Blind Forest', 'To niezwykła i przepiękna gra platformowa od studia Moon Studios. Jest to gra wyjątkowa, wyróżniająca się stylem graficznym, łapiącą za serce muzyką i wymagającą rozgrywką. Te trzy cechy są tu połączone w niezwykłą całość, która gwarantuje niezapomniane przeżycia z grą i spore wyzwanie nawet na najniższym poziomie trudności. Zróżnicowanie świata gry pozwala nam zwiedzić ponad 10 zróżnicowanych lokacji, wszystko połączone wzruszającą fabułą. Ori, pokaż na co się stać!', 71.99, 7, '2015-03-11', 'ori-and-the-blind-forest.jpg', 'Ori and the Blind Fo', 7, 1),
(8, 'Minecraft', 'Gra-legenda, mieszkaniec komputera każdego Gracza, sandbox totalny: Minecraft to dzieło Markusa Perssona i jego studia Mojang. To połączenie gry o dowolnym kształtowaniu świata (sandbox) i gry o eksploracji, walce i zdobywaniu materiałów oraz sprzętu (RPG). Główne założenia są już w tytule: mine - kop, craft - twórz! To gra, której licznik godzin jest zbędny - każdy ma na koncie grube setki, jak nie tysiące godzin świetnej zabawy, również ze znajomymi! Ogrom możliwości stoi przed Wami otworem!', 100, 8, '2011-10-07', 'original.jpg', 'Minecraft', 8, 1),
(9, 'Wiedźmin 3: Dziki Gon', 'Jedna z najlepszych gier w historii, genialna fabuła, świetne mechaniki RPG oraz wyborni bohaterowie i świat. Polskie studio CD Projekt Red przedstawia ostatnią część trylogii o Wiedźminie Geralcie, zabójcy potworów, który dzięki Przeznaczeniu przeżywa niezwykłe przygody i spotyka nietuzinkowe postacie. Podczas rozgrywki poznacie historię, którą sami ukształtujecie swoimi decyzjami! Spory bestiariusz pozwoli Wam poznać ciemną stronę tego świata, wraz najgorszymi bestiami, które są wokół nas...', 99.99, 9, '2015-05-18', 'wiedzmin.jpg', 'Wiedźmin 3: Dziki Go', 9, 1),
(10, 'The Legend of Zelda: Breath of the Wild', 'To kolejna odsłona jednej z najstarszych serii gier wideo. Mimo tylu odsłon, firma Nintendo wciąż utrzymuje poziom, którym kolejny raz się popisała w nowej grze wydanej na ich konsole Switch oraz Wii U. Wielki świat czeka na poznanie, a główny bohater, Link, ma do dyspozycji nowe możliwości - wspinaczkę i szybowanie na paralotnii, które bez wątpienia pomagają w eksploracji. Nie brakuje też walki, zdobywania wyposażenia oraz linii fabularnej. Piękna gra na wiele godzin, niezmiennie od Nintendo!', 249, 10, '2017-03-03', 'Zelda-Switch-768x1247.jpg', 'The Legend of Zelda:', 10, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto_bankowe`
--

CREATE TABLE `konto_bankowe` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `nr_karty` bigint(11) DEFAULT NULL,
  `miesiac` text DEFAULT NULL,
  `rok` int(11) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lista_banow`
--

CREATE TABLE `lista_banow` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `opis_bana` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `lista_banow`
--

INSERT INTO `lista_banow` (`id`, `id_uzytkownika`, `login`, `imie`, `nazwisko`, `opis_bana`) VALUES
(1, 95, 'awdwd', 'adwa', 'awd', 'dawdaw'),
(2, 115, 'lk9', 'klkkl', 'kkklkkk', 'dwada'),
(7, 113, 'lossskksks', '888', '88', 'dwadawd'),
(8, 113, 'lossskksks', '888', '88', 'dwadawd'),
(9, 94, '', '', '', ''),
(10, 94, '', '', '', ''),
(11, 112, 'login111', 'Marek', 'Kokx', 'qweasdzxc'),
(12, 112, 'login111', 'Marek', 'Kokx', 'qweasdzxc'),
(13, 0, 'admin', 'Admin', 'Admin', ''),
(14, 111, 'i', 'i', 'd', 'dwadawd'),
(15, 110, 'loginnnnnnn', 'dflksjflskfjlkj', 'kkkkk', 'awdwadwad'),
(16, 110, 'loginnnnnnn', 'dflksjflskfjlkj', 'kkkkk', 'awdwadwad'),
(17, 110, 'loginnnnnnn', 'dflksjflskfjlkj', 'kkkkk', 'awdwadwad'),
(18, 0, 'admin', 'Admin', 'Admin', ''),
(19, 0, 'admin', 'Admin', 'Admin', ''),
(20, 109, 'login123123', 'lolsslssl', 'kkk', 'azcaw'),
(21, 109, 'login123123', 'lolsslssl', 'kkk', 'azcaw'),
(22, 109, 'login123123', 'lolsslssl', 'kkk', 'azcaw'),
(23, 109, 'login123123', 'lolsslssl', 'kkk', 'azcaw'),
(24, 106, '99999', 'klj', 'k', 'dwadw'),
(25, 108, 'login12345', 'kkk', 'kk', 'adwawd');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lista_banow_gier`
--

CREATE TABLE `lista_banow_gier` (
  `id` int(11) NOT NULL,
  `id_gry` int(11) NOT NULL,
  `Nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `Opis` text COLLATE utf8_polish_ci NOT NULL,
  `Cena` float NOT NULL,
  `Tworcy` text COLLATE utf8_polish_ci NOT NULL,
  `Wydawca` text COLLATE utf8_polish_ci NOT NULL,
  `Data_wydania` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `lista_banow_gier`
--

INSERT INTO `lista_banow_gier` (`id`, `id_gry`, `Nazwa`, `Opis`, `Cena`, `Tworcy`, `Wydawca`, `Data_wydania`) VALUES
(1, 0, 'a', 'a', 12, 's', 'd', '2021-01-12'),
(2, 72, 'awdawd', 'fsgfdhdh', 123, 'dsad', 'dwdad', '2021-01-08');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `paypal`
--

CREATE TABLE `paypal` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `login_paypal` text DEFAULT NULL,
  `haslo_paypal` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `play`
--

CREATE TABLE `play` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `nr_telefonu` int(11) DEFAULT NULL,
  `kod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `specyfikacja`
--

CREATE TABLE `specyfikacja` (
  `id` int(11) NOT NULL,
  `id_gry` int(11) NOT NULL,
  `system_o` text COLLATE utf8_polish_ci NOT NULL,
  `procesor` text COLLATE utf8_polish_ci NOT NULL,
  `ram` int(11) NOT NULL,
  `miejsce_dysku` int(11) NOT NULL,
  `directx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `specyfikacja`
--

INSERT INTO `specyfikacja` (`id`, `id_gry`, `system_o`, `procesor`, `ram`, `miejsce_dysku`, `directx`) VALUES
(1, 1, 'Windows 10 (tylko wersje 64-bitowe)', 'Intel i5-4460 @ 3,2 Ghz lub AMD Ryzen3 1200 @ 3,1 Ghz ', 8, 50, 12),
(2, 2, 'Windows 10/5 (tylko wersje 64-bitowe)', 'Intel i5-4460 @ 3,33 Ghz lub AMD Ryzen3 1200 @ 3,1 Ghz ', 5, 54, 166),
(3, 3, 'Windows 10 (tylko wersje 64-bitowe)', 'Intel i5-4460 @ 3,2 Ghz lub AMD Ryzen3 1200 @ 3,1 Ghz ', 8, 50, 12),
(4, 4, 'Windows 10 (tylko wersje 64-bitowe)', 'Intel i5-4460 @ 3,2 Ghz lub AMD Ryzen3 1200 @ 3,1 Ghz ', 8, 50, 12),
(5, 5, 'Windows 10 (tylko wersje 64-bitowe)', 'Intel i5-4460 @ 3,2 Ghz lub AMD Ryzen3 1200 @ 3,1 Ghz ', 8, 50, 12),
(6, 6, 'Windows 10 (tylko wersje 64-bitowe)', 'Intel i5-4460 @ 3,2 Ghz lub AMD Ryzen3 1200 @ 3,1 Ghz ', 8, 50, 12),
(7, 7, 'Windows 10 (tylko wersje 64-bitowe)', 'Intel i5-4460 @ 3,2 Ghz lub AMD Ryzen3 1200 @ 3,1 Ghz ', 8, 50, 12),
(8, 8, 'Windows 10 (tylko wersje 64-bitowe)', 'Intel i5-4460 @ 3,2 Ghz lub AMD Ryzen3 1200 @ 3,1 Ghz ', 8, 50, 12),
(9, 9, 'Windows 10 (tylko wersje 64-bitowe)', 'Intel i5-4460 @ 3,2 Ghz lub AMD Ryzen3 1200 @ 3,1 Ghz ', 8, 50, 12),
(10, 10, 'Windows 10 (tylko wersje 64-bitowe)', 'Intel i5-4460 @ 3,2 Ghz lub AMD Ryzen3 1200 @ 3,1 Ghz ', 8, 50, 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `top_5`
--

CREATE TABLE `top_5` (
  `id` int(11) NOT NULL,
  `id_gry` int(11) NOT NULL,
  `obraz` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `top_5`
--

INSERT INTO `top_5` (`id`, `id_gry`, `obraz`) VALUES
(1, 5, '1.jpg'),
(2, 7, '2.jpg'),
(3, 10, '3.jpg'),
(4, 4, '4.jpg'),
(5, 6, '5.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tranzakcje`
--

CREATE TABLE `tranzakcje` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `kwota` int(11) NOT NULL,
  `metoda` int(11) NOT NULL DEFAULT 0,
  `czas` text NOT NULL,
  `nazwa_gry` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `tranzakcje`
--

INSERT INTO `tranzakcje` (`id`, `id_uzytkownika`, `kwota`, `metoda`, `czas`, `nazwa_gry`) VALUES
(39, 93, 200, 1, '2021-01-07', '0'),
(40, 93, 20, 2, '2021-01-07', '0'),
(41, 93, 88, 3, '2021-01-07', '0'),
(42, 95, 100, 2, '2021-01-13', '0'),
(45, 95, 30, 0, '2021-01-13', 'strzelaninka'),
(46, 95, 30, 0, '2021-01-13', 'malpie raczki'),
(47, 95, 30, 0, '2021-01-13', 'grzmoty'),
(48, 95, 30, 0, '2021-01-13', 'Mukulele'),
(49, 95, 2147483647, 2, '2021-01-13', '0'),
(50, 95, 999999, 0, '2021-01-13', 'aaaaauto'),
(51, 95, 1223, 0, '2021-01-15', 'strzelaninka'),
(52, 95, 1223, 0, '2021-01-19', 'malpie raczki'),
(53, 112, 1000, 1, '2021-01-21', '0'),
(54, 112, 30, 0, '2021-01-21', 'Mukulele'),
(55, 95, 1223, 0, '2021-01-23', 'grzmoty'),
(56, 95, 20, 2, '2021-01-23', '0'),
(57, 95, 179, 0, '2021-01-24', 'Assassin’s Creed Valhalla'),
(58, 95, 185, 0, '2021-01-25', 'Cyberpunk 2077'),
(59, 95, 0, 0, '2021-01-25', 'Dota 2'),
(60, 95, 62, 0, '2021-01-25', 'Final Fantasy VII'),
(61, 93, 62, 0, '2021-01-25', 'Final Fantasy VII'),
(62, 93, 0, 0, '2021-01-25', 'Dota 2'),
(63, 93, 179, 0, '2021-01-25', 'Assassin’s Creed Valhalla'),
(64, 93, 109, 0, '2021-01-25', 'Minecraft'),
(65, 93, 185, 0, '2021-01-25', 'Cyberpunk 2077'),
(66, 93, 379, 0, '2021-01-25', 'Doom Eternal'),
(67, 93, 60, 0, '2021-01-25', 'Dark Souls III'),
(68, 93, 31, 0, '2021-01-25', 'Ori and the Blind Forest'),
(69, 93, 50, 0, '2021-01-25', 'Wied?min 3: Dziki Gon'),
(70, 93, 249, 0, '2021-01-25', 'The Legend of Zelda'),
(71, 95, 379, 0, '2021-01-27', 'Doom Eternal'),
(72, 131, 12312, 1, '2021-01-28', '0'),
(73, 131, 123, 3, '2021-01-28', '0'),
(74, 131, 123, 2, '2021-01-28', '0'),
(75, 131, 123, 2, '2021-01-28', '0'),
(76, 1, 2147483647, 1, '2021-02-04', '0');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tworcy`
--

CREATE TABLE `tworcy` (
  `id` int(11) NOT NULL,
  `Tworca` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `Wydawca` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tworcy`
--

INSERT INTO `tworcy` (`id`, `Tworca`, `Wydawca`) VALUES
(1, 'Ubisoft Montréal', 'Ubisoft'),
(2, 'Walve Corporation', 'Valve Corporation'),
(3, 'Square', 'Eidos Interactive'),
(4, 'CD Projekt Red', 'CD Projekt Red'),
(5, 'id Software', 'Bethesda Softworks'),
(6, 'From Software ', 'Bandai Namco Games'),
(7, 'Moon Studios', 'Microsoft Studios'),
(8, 'Mojang Studios', 'Mojang Studios'),
(9, 'CD Projekt Red', 'CD Projekt Red'),
(10, 'Nintendo', 'Nintendo');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `Imie` text COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `Wiek` int(11) NOT NULL,
  `Stan_konta` float NOT NULL,
  `Avatar` text COLLATE utf8_polish_ci NOT NULL DEFAULT '1.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `Imie`, `Nazwisko`, `Wiek`, `Stan_konta`, `Avatar`) VALUES
(0, 'Admin', 'Admin', 12, 1212, '1.jpg'),
(1, 'dawid', 'reczek', 22, 2000000000000, 'p.jfif'),
(92, 'qqqqqqqqqqqqqq', 'wwwwwwwwwww', 6565, 0, '1.jpg'),
(98, 'dawid_rrr', 'reczek', 10, 0, '1.jpg'),
(100, 'sprawdz', 'sprawdz', 9, 0, '1.jpg'),
(103, 'dksk', 'klk', 9, 0, '1.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `biblioteka_gier`
--
ALTER TABLE `biblioteka_gier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bibliotekauzytkownik_fk` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  ADD PRIMARY KEY (`id_uzytkownika`),
  ADD KEY `daneuzytkownik_fk` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `gatunki`
--
ALTER TABLE `gatunki`
  ADD PRIMARY KEY (`id_gry`),
  ADD KEY `id_gry` (`id_gry`);

--
-- Indeksy dla tabeli `gatunki_multi_single`
--
ALTER TABLE `gatunki_multi_single`
  ADD PRIMARY KEY (`id_gry`),
  ADD KEY `id_gry` (`id_gry`);

--
-- Indeksy dla tabeli `gry`
--
ALTER TABLE `gry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grauzytkownik_fk` (`id_dodajacego`),
  ADD KEY `tworcagry_fk` (`id_tworcy`);

--
-- Indeksy dla tabeli `konto_bankowe`
--
ALTER TABLE `konto_bankowe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `lista_banow`
--
ALTER TABLE `lista_banow`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `lista_banow_gier`
--
ALTER TABLE `lista_banow_gier`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `play`
--
ALTER TABLE `play`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `specyfikacja`
--
ALTER TABLE `specyfikacja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk` (`id_gry`);

--
-- Indeksy dla tabeli `top_5`
--
ALTER TABLE `top_5`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tranzakcje`
--
ALTER TABLE `tranzakcje`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT dla tabeli `gry`
--
ALTER TABLE `gry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT dla tabeli `konto_bankowe`
--
ALTER TABLE `konto_bankowe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `lista_banow`
--
ALTER TABLE `lista_banow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `lista_banow_gier`
--
ALTER TABLE `lista_banow_gier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `paypal`
--
ALTER TABLE `paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `play`
--
ALTER TABLE `play`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `specyfikacja`
--
ALTER TABLE `specyfikacja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT dla tabeli `top_5`
--
ALTER TABLE `top_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `tranzakcje`
--
ALTER TABLE `tranzakcje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `biblioteka_gier`
--
ALTER TABLE `biblioteka_gier`
  ADD CONSTRAINT `bibliotekauzytkownik_fk` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `dane_logowania`
--
ALTER TABLE `dane_logowania`
  ADD CONSTRAINT `daneuzytkownik_fk` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `gatunki`
--
ALTER TABLE `gatunki`
  ADD CONSTRAINT `gatunki_ibfk_1` FOREIGN KEY (`id_gry`) REFERENCES `gry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `gatunki_multi_single`
--
ALTER TABLE `gatunki_multi_single`
  ADD CONSTRAINT `gatunki_multi_single_ibfk_1` FOREIGN KEY (`id_gry`) REFERENCES `gry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `gry`
--
ALTER TABLE `gry`
  ADD CONSTRAINT `grauzytkownik_fk` FOREIGN KEY (`id_dodajacego`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `konto_bankowe`
--
ALTER TABLE `konto_bankowe`
  ADD CONSTRAINT `konto_bankowe_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `paypal`
--
ALTER TABLE `paypal`
  ADD CONSTRAINT `paypal_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `play`
--
ALTER TABLE `play`
  ADD CONSTRAINT `play_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `specyfikacja`
--
ALTER TABLE `specyfikacja`
  ADD CONSTRAINT `Fk` FOREIGN KEY (`id_gry`) REFERENCES `gry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `tworcy`
--
ALTER TABLE `tworcy`
  ADD CONSTRAINT `tworcagry_fk` FOREIGN KEY (`id`) REFERENCES `gry` (`id_tworcy`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
