-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 07:17 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edukorepetycje`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `buildings`
--

CREATE TABLE `buildings` (
  `build_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `street` varchar(400) NOT NULL,
  `city` varchar(150) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`build_id`, `name`, `street`, `city`, `school_id`) VALUES
(1, 'A', 'Józefa Szanajcy 5', 'Warszawa', 1),
(2, 'b', 'Józefa Szanajcy 17', 'Warszawa', 1),
(3, NULL, 'Myśliborska 18', 'Warszawa', 2),
(4, 'aaa', 'aaa', 'aaa', 8),
(5, 'bbb', 'bbb', 'bbb', 8),
(6, 'huja', 'aasd', 'aaaaaaa', 5),
(7, 'b', 'bvbbb', 'bbbbbbb', 5),
(8, 'hujc', 'cvcccc', 'ccccccccccccccccc', 5),
(9, 'a', 'a', 'a', 6),
(10, 'b', 'b', 'b', 6),
(11, 'c', 'c', 'c', 6),
(12, 'd', 'd', 'd', 6),
(13, '', '', '', 6),
(14, '', '', '', 6),
(15, 'a', 'a', 'a', 7),
(16, 'b', 'b', 'b', 7),
(17, 'c', 'c', 'c', 7),
(18, 'd', 'd', 'd', 7),
(19, '', '', '', 7),
(20, '', '', '', 7),
(21, 'g', 'g', 'g', 7),
(22, '', '', '', 7),
(23, '', '', '', 7),
(24, '', '', '', 7),
(25, '', '', '', 7),
(26, '', '', '', 7),
(27, '', '', '', 7),
(28, '', '', '', 7),
(29, '', '', '', 7),
(30, '', '', '', 7),
(31, '', '', '', 7),
(32, '', '', '', 7),
(33, '', '', '', 7),
(34, '', '', '', 7),
(35, '', '', '', 7),
(36, '', '', '', 7),
(37, '', '', '', 7),
(38, 'd', 'd', 'd', 5),
(39, 'ccc', 'ccc', 'ccc', 8),
(40, 'd', 'd', 'd', 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(1, 'red'),
(2, 'green'),
(3, 'blue'),
(4, 'gray'),
(5, 'yellow'),
(6, 'black');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(15, 'Jak się zarejestrować?', '<p>Szybko.</p><p>Pozdrawiam,</p><p>Administrator</p>'),
(16, 'Czy moja szkoła jest w programie EduKorepetycje?', '<p>Nie wiem, ale tu masz listę szkół które są:</p><p> - Zespół Szkół nr 14 w Warszawie</p>'),
(17, 'Czy jest to darmowe?', '<p>Dla ucznia i nauczyciela jest darmowe, jednak szkoła aby przystąpić do programu musi zapłacić.</p>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `informations`
--

CREATE TABLE `informations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `name`, `value`) VALUES
(1, 'main_name', 'E-SPORT\'owa ZS14 - wydarzenia - turnieje - konkursy'),
(2, 'description', 'Strona ta jest efektem starań grupy z klasy 5pi w roczniku 2023/2024.\r\nStworzona od uczniów dla uczniów.\r\nPozdrawiam'),
(3, 'meta_description', 'Wszystkie wydarzenia, turnieje i konkursy w jednym miejscu dla naszych uczniów Zespołu Szkół nr. 14 w Warszawie!'),
(4, 'logo', 'main_logo.png'),
(5, 'discord', 'https://discord.gg/Q855DA5fDP'),
(6, 'twitch', 'https://www.twitch.tv/eslcs'),
(7, 'instagram', 'https://www.instagram.com/zs14spotted/'),
(8, 'strona_szkoly', 'https://www.zs14.pl/'),
(9, 'adres_email', 'zgloszenia.eventy@chmura.zs14.edu.pl'),
(10, 'adm_name', 'Gustawo NI'),
(11, 'version', '0.2'),
(12, 'favicon', 'favicon.png'),
(13, 'Regulamin', '<p><strong class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">Wstęp</strong></p><p><br></p><p>1.1. Niniejszy regulamin określa zasady i warunki uczestnictwa w Szkolnym Turnieju w CS:GO (dalej: Turniej).</p><p><br></p><p>1.2. Turniej ma na celu promowanie zdrowej rywalizacji, integracji uczniów, rozwijanie umiejętności związanych z grą Counter-Strike: Global Offensive (CS:GO) oraz propagowanie idei e-sportu.</p><p><br></p><p>1.3. Organizatorem Turnieju jest w imieniu Zespołu Szkół nr 14 Warszawie:</p><p>Jerzy Sołowianiuk – opiekun</p><p>Gustaw Sołdecki 4pi</p><p>Kacper Korus 4pi</p><p>Marcin Wąsik 4pi</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Uczestnictwo</span></p><p>2.1. Uczestnikami Turnieju mogą być uczniowie Szkoły, którzy zgłosili swoje uczestnictwo zgodnie z regulaminem.</p><p><br></p><p>2.2. Każdy uczestnik Turnieju zobowiązany jest do zapoznania się z regulaminem oraz przestrzegania jego postanowień.</p><p><br></p><p>2.3. Uczestnictwo w Turnieju jest dobrowolne i bezpłatne.</p><p><br></p><p>2.4. Uczestnik Turnieju, podczas zgłaszania swojego udziału, musi wyrazić zgodę na przetwarzanie swoich danych osobowych przez Organizatora w celach związanych z organizacją i przeprowadzeniem Turnieju.</p><p><br></p><p>2.5. W przypadku uczestników niepełnoletnich, zgoda na przetwarzanie danych osobowych musi być wyrażona przez rodzica lub opiekuna prawnego uczestnika. W zgłoszeniu należy załączyć odpowiednie oświadczenie od rodzica lub opiekuna prawnego od każdego uczestnika. Przykładowe oświadczenie jest na końcu tego dokumentu.</p><p><br></p><p>2.6 Uczestnictwo w Turnieju wymaga posiadania konta Steam z licencją gry Counter-Strike: Globalna Ofensywa, konta Discord.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Zgłoszenia</span></p><p>3.1. Zgłoszenia uczestnictwa przyjmowane są przez Organizatora w ustalonym terminie.</p><p><br></p><p>3.2. Zgłoszenie powinno zawierać dane 5 zawodników + 1 zastępstwo w razie nieobecności. Kolejno: imię, nazwisko, klasę ucznia, nazwę drużyny, nazwę użytkownika Steam oraz nazwę użytkownika Discord (używając formatu Nazwa#1234) do kontaktu.</p><p><br></p><p>3.3. Drużyny muszą składać się z 5 zawodników oraz jednego w zastępstwo (5+1).</p><p><br></p><p>3.4. Każdy uczestnik może należeć tylko do jednej drużyny.</p><p><br></p><p>3.5 Osoba wpisana w zgłoszeniu jako pierwsza jest traktowana przez organizatora jako kapitan drużyny</p><p><br></p><p>3.6 Organizator umożliwia wysłanie zgłoszenia poprzez gmail’a na adres:</p><p>wasikm@chmura.zs14.edu.pl</p><p><br></p><p>3.7 Poprawne zgłoszenie powinno zostać wysłane z domeny szkolnej (chmura.zs14.edu.pl)</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Format Turnieju</span></p><p>4.1. Turniej rozgrywany jest w formacie drabinki rozgrywkowej, z rundą przegranych, jeśli liczba drużyn uczestniczących przekroczy 8.</p><p><br></p><p>4.2. Mecze rozgrywane są w systemie Best of 1 (BO1), a finał w systemie Best of 3 (BO3).</p><p><br></p><p>4.3. Mapy wybierane są zgodnie z aktualną pulą map dostępną w oficjalnych rozgrywkach CS:GO.</p><p><br></p><p>4.4. Organizator może dostosować format Turnieju w zależności od liczby zgłoszonych drużyn.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Zasady rozgrywek</span></p><p>5.1. Wszystkie mecze muszą być rozgrywane zgodnie z zasadami fair play oraz niniejszym regulaminem.</p><p><br></p><p>5.2. Drużyny muszą zgłosić się na serwer 15 minut przed rozpoczęciem meczu.</p><p><br></p><p>5.3. Każdy mecz rozpoczyna się rundą nożową, która decyduje o wyborze strony startowej (CT lub T).</p><p><br></p><p>5.4. W przypadku braku jednoznaczności, Organizator podejmuje decyzję o kontynuacji meczu.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Postępowanie w przypadku nieprzestrzegania regulaminu</span></p><p>6.1. Organizator zastrzega sobie prawo do ukarania uczestników za nieprzestrzeganie niniejszego regulaminu, włącznie z dyskwalifikacją drużyny lub zawodnika.</p><p><br></p><p>6.2. W przypadku wykrycia oszustw, takich jak używanie cheatów, programów wspomagających lub innych nieuczciwych działań, uczestnik zostanie natychmiast zdyskwalifikowany, a jego drużyna może zostać ukarana.</p><p><br></p><p>6.3. Uczestnicy są zobowiązani do zachowania szacunku wobec innych uczestników, Organizatora i sędziów. Obraźliwe, wulgarne lub dyskryminujące zachowanie może prowadzić do ukarania, włącznie z dyskwalifikacją.</p><p><br></p><p>6.4. W przypadku zaistnienia sporów lub sytuacji nieuregulowanych przez niniejszy regulamin, ostateczną decyzję podejmuje Organizator.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Nagrody</span></p><p>7.1. Organizator przewiduje nagrody dla drużyn, które zajmą miejsca na podium (I, II i III).</p><p><br></p><p>7.2. Rodzaj i wartość nagród zostaną przedstawione przez Organizatora przed rozpoczęciem Turnieju.</p><p><br></p><p>7.3. Nagrody są nieprzekazywalne i nie można ich zamienić na ekwiwalent pieniężny.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Postanowienia końcowe</span></p><p>8.1. Udział w Turnieju oznacza akceptację niniejszego regulaminu przez uczestnika oraz zastosowanie się do obowiązków wynikających z załącznika z obowiązkami (3. Obowiązki) oraz zapoznanie się ze strukturą organizacji w załączniku (2. Organizacja).</p><p><br></p><p>8.2. Organizator zastrzega sobie prawo do wprowadzenia zmian w regulaminie, o ile nie wpłynie to na prawa uczestników nabytych przed wprowadzeniem zmian.</p><p><br></p><p>8.3. Organizator zastrzega sobie prawo do odwołania Turnieju z ważnych przyczyn, o czym uczestnicy zostaną poinformowani.</p><p><br></p><p>8.4. W sprawach nieuregulowanych niniejszym regulaminem, obowiązują przepisy prawa polskiego.</p><p><br></p><p>8.5. Wszelkie pytania, wątpliwości oraz uwagi dotyczące Turnieju należy kierować do Organizatora.</p><p><br></p><p><strong class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">Organizacja</strong></p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Termin</span></p><p>1.1 Planowany start pierwszych rozgrywek jest na początek czerwca 2023.</p><p><br></p><p>1.2 Przewidywany czas trwania całego turnieju to 2 tygodnie, podczas których zostanie wyłoniona zwycięska drużyna.</p><p><br></p><p>1.3 Przez dwa tygodnie rozgrywki odbywane będą od poniedziałku do piątku w godzinach lekcyjnych.</p><p><br></p><p>1.4 Ostateczny termin przyjmowania zgłoszeń uczestników ustanowiony jest na 21 maja 2023 23:59.</p><p><br></p><p>1.5 Uczestnicy zostaną najpóźniej poinformowani 5 dni roboczych przed rozgrywkami o dokładnej godzinie i dniu odbycia rozgrywek ich drużyny.</p><p><br></p><p>1.6 Uczestnik powinien się stawić w wyznaczonej sali 15 minut przed ustaloną godziną.</p><p><br></p><p>1.7 Czas przewidziany na jedno spotkanie wynosi dwie godziny lekcyjne.</p><p><br></p><p>1.8 Ustalona godzina uwzględnia przygotowanie – skonfigurowanie stanowiska przez uczestników oraz sprawdzenia poprawności działania sprzętu.</p><p><br></p><p>1.9 Uwzględniona zostaje również rozgrzewka przeprowadzana we własnym zakresie przez drużyny w miejscach rozgrywania turnieju.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Miejsce</span></p><p>2.1 Turniej rozgrywany będzie w budynku szkolnym przy ulicy Józefa Szanajcy 5.</p><p><br></p><p>2.2 Stanowiska komputerowe przygotowane do rozgrywek będą w salach 34 oraz 35.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Sprzęt komputerowy</span></p><p>3.1 W każdej z wyznaczonych sal zostanie przygotowane przez organizatora 6 stanowisk komputerowych umożliwiających uczestnictwo w turnieju.</p><p><br></p><p>3.2 Każde stanowisko zostanie wyposażone w: jednostkę centralną, monitor, klawiaturę, mysz oraz potrzebne oprogramowanie: klient Steam, gra Counter-Strike:Globalna Ofensywa oraz klient Discord.</p><p><br></p><p>3.3 Sprzęt audio nie zostanie dostarczony przez organizatora i uczestnik powinien mieć własny sprzęt taki jak słuchawki i mikrofon.</p><p>3.4 Sprzęt peryferyjny przewidziany przez organizatora może zostać zastąpiony przez uczestnika jego własnymi urządzeniami wejścia/wyjścia.</p><p><br></p><p>3.5 Sprzęt własny uczestnika nie może zawierać wbudowanego oprogramowania ułatwiającego rozgrywkę lub powodującego niepoprawne działanie infrastruktury turnieju.</p><p><br></p><p>3.6 Organizator zobowiązany jest do zapewnienia komputera z oprogramowaniem serwerowym na którym zostanie ustanowiony serwer gry Counter-Strike:Globalna Ofensywa.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Inne</span></p><p>4.1 Organizator przewiduje transmisje rozgrywek turniejowych na platformie twitch.tv</p><p><br></p><p><strong class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">Obowiązki</strong></p><p><br></p><p><span class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">Uczestnik</span></p><p><span style=\"color: rgb(255, 255, 255);\">Zgłoszenie uczestnictwa</span></p><p>1.1. Uczestnik jest zobowiązany do zgłoszenia swojego uczestnictwa w Turnieju zgodnie z wytycznymi Organizatora.</p><p>1.2. Uczestnik powinien podać prawdziwe i aktualne dane podczas zgłoszenia, w tym imię, nazwisko, klasę, nazwę drużyny, nazwę użytkownika Steam oraz adres e-mail do kontaktu.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Przestrzeganie regulaminu Turnieju</span></p><p>2.1. Uczestnik zobowiązany jest do zapoznania się z regulaminem Turnieju oraz przestrzegania jego postanowień.</p><p>2.2. Uczestnik ma obowiązek stosować się do decyzji Organizatora oraz sędziów Turnieju.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Fair play i szacunek</span></p><p>3.1. Uczestnik zobowiązany jest do przestrzegania zasad fair play oraz szanowania rywali, kolegów z drużyny, Organizatora i sędziów.</p><p>3.2. Uczestnik nie może stosować żadnych oszustw, cheatów, programów wspomagających ani innych nieuczciwych działań mogących wpłynąć na wynik rozgrywek.</p><p>3.3. Uczestnik musi unikać obraźliwego, wulgarnego lub dyskryminującego języka oraz zachowań wobec innych uczestników.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Punktualność</span></p><p>4.1. Uczestnik ma obowiązek stawienia się na serwerze gry w wyznaczonym czasie, zgodnie z harmonogramem Turnieju.</p><p>4.2. Uczestnik powinien być przygotowany na ewentualne opóźnienia i mieć cierpliwość podczas oczekiwania na rozpoczęcie meczu.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Współpraca z drużyną</span></p><p>5.1. Uczestnik ma obowiązek utrzymania dobrych relacji z kolegami z drużyny oraz współpracować z nimi w trakcie Turnieju.</p><p>5.2. Uczestnik zobowiązany jest do komunikacji z drużyną podczas rozgrywek, stosując się do ustalonych taktyk oraz przekazując informacje o sytuacji na mapie.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Zgłaszanie problemów i nieprawidłowości</span></p><p>6.1. W przypadku napotkania problemów technicznych, nieprawidłowości w trakcie Turnieju lub podejrzenia nieuczciwych działań ze strony innych uczestników, uczestnik ma obowiązek zgłosić te sytuacje Organizatorowi lub sędziom.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Promowanie wartości e-sportowych</span></p><p>7.1. Uczestnik Turnieju powinien dążyć do promowania wartości e-sportowych, takich jak zdrowa rywalizacja, duch sportowy, wzajemny szacunek, a także umiejętność radzenia sobie z porażką i sukcesem.</p><p><br></p><p>7.2. Uczestnik ma obowiązek reprezentować swoją klasę i szkołę w sposób godny i pozytywny, przyczyniając się do integracji uczniów oraz budowania atmosfery wzajemnego zrozumienia i wsparcia.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Przestrzeganie zasad gry CS:GO</span></p><p>8.1. Uczestnik zobowiązany jest do przestrzegania zasad oraz regulacji gry Counter-Strike: Global Offensive, takich jak zakaz używania programów wspomagających grę (cheatów), utrzymania dobrego stanu technicznego swojego komputera oraz posiadania legalnej kopii gry.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Ochrona danych osobowych</span></p><p>9.1. Uczestnik ma obowiązek chronić swoje dane osobowe, w szczególności nie udostępniać swojego hasła do konta Steam innym uczestnikom Turnieju czy osobom trzecim.</p><p><br></p><p>9.2. Uczestnik zobowiązany jest do przestrzegania przepisów dotyczących ochrony danych osobowych, nie tylko własnych, ale także innych uczestników Turnieju.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Własny sprzęt peryferyjny i słuchawki z mikrofonem</span></p><p>11.1. Uczestnik ma prawo przynieść własny sprzęt peryferyjny, taki jak klawiatura, myszka czy podkładka, pod warunkiem, że nie daje on nieuczciwej przewagi w rozgrywce oraz jest zgodny z wymogami technicznymi Organizatora.</p><p><br></p><p>11.2. Każdy uczestnik jest zobowiązany do przyniesienia własnych słuchawek z mikrofonem, które będą wykorzystywane w trakcie Turnieju. Organizator nie zapewnia słuchawek ani mikrofonów dla uczestników.</p><p><br></p><p>11.3. Uczestnik odpowiada za stan techniczny oraz zgodność swojego sprzętu peryferyjnego i słuchawek z mikrofonem z wymogami Turnieju. W przypadku awarii sprzętu uczestnika, Organizator nie ponosi odpowiedzialności za opóźnienia lub problemy w rozgrywce wynikające z tego powodu.</p><p><br></p><p>11.4. Przed rozpoczęciem Turnieju uczestnicy mają obowiązek zgłosić Organizatorowi, że przynieśli własny sprzęt peryferyjny i/lub słuchawki z mikrofonem. Organizator może sprawdzić sprzęt pod kątem zgodności z regulaminem oraz wymogami technicznymi Turnieju.</p><p><br></p><p>11.6 Uczestnik zobowiązany jest do zapewnienia, że jego sprzęt peryferyjny nie zawiera żadnego złośliwego oprogramowania, które mogłoby wpłynąć na przebieg Turnieju, bezpieczeństwo innych uczestników, czy komputery używane podczas rozgrywek.</p><p><br></p><p>11.5 Uczestnik nie może podłączać żadnych urządzeń peryferyjnych oraz nośników danych bez zgody organizatora.</p><p><br></p><p>11.6 W przypadku stwierdzenia próby wprowadzenia złośliwego oprogramowania poprzez sprzęt peryferyjny lub innego nieautoryzowanego działania, uczestnik może zostać zdyskwalifikowany, a jego drużyna może ponieść konsekwencje zgodnie z regulaminem Turnieju oraz zostanie zobowiązany do pokrycia kosztów przywrócenia urządzeń do stanu należytego.</p><p><br></p><p><span class=\"ql-size-large\" style=\"color: rgb(255, 255, 255);\">Organizator</span></p><p><span style=\"color: rgb(255, 255, 255);\">Komunikacja i informowanie uczestników</span></p><p>1.1. Organizator jest odpowiedzialny za przekazywanie informacji dotyczących Turnieju uczestnikom, w tym szczegółów dotyczących zgłoszeń, harmonogramu, regulaminu, nagród i wszelkich zmian.</p><p><br></p><p>1.2. Organizator powinien zapewnić jasne i zrozumiałe wytyczne, aby uczestnicy mogli łatwo zrozumieć zasady Turnieju oraz swoje obowiązki.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Współpraca ze szkołą</span></p><p>2.1. Organizator zobowiązany jest do współpracy ze szkołą, uzyskania wymaganych zgód i upoważnień oraz do przestrzegania zasad i procedur szkolnych w trakcie organizacji i przeprowadzania Turnieju.</p><p><br></p><p>2.2. Organizator powinien poinformować szkołę o wszelkich niezbędnych udogodnieniach, takich jak dostęp do pomieszczeń, sprzętu czy dostępu do sieci.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Przygotowanie serwera i stanowisk</span></p><p>3.1. Organizator jest odpowiedzialny za przygotowanie serwera gry, który będzie spełniał wymagania techniczne Turnieju, zapewniając uczciwe warunki rozgrywki dla wszystkich uczestników.</p><p><br></p><p>3.2. Organizator powinien zapewnić odpowiednie stanowiska dla uczestników, w tym komputery, monitory, krzesła oraz inne niezbędne elementy.</p><p><br></p><p>3.3. Organizator ma obowiązek sprawdzić stan techniczny sprzętu przed Turniejem, aby zapewnić jego prawidłowe działanie oraz uniknąć opóźnień i problemów podczas rozgrywek.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Zapewnienie bezpieczeństwa uczestników i ochrony danych osobowych</span></p><p>4.1. Organizator jest odpowiedzialny za zapewnienie bezpiecznych warunków dla uczestników Turnieju, zarówno podczas gry, jak i w trakcie przerw czy pozostałych czynności związanych z Turniejem.</p><p><br></p><p>4.2. Organizator ma obowiązek przestrzegania przepisów dotyczących ochrony danych osobowych uczestników, w tym nieudostępniania danych osobowych osobom trzecim bez wyraźnej zgody uczestnika.</p><p><br></p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Sędziowanie i rozstrzyganie sporów</span></p><p>5.1. Organizator powinien zapewnić sędziów (Orgzanizator), którzy będą nadzorować przebieg Turnieju oraz egzekwować przestrzeganie zasad i regulaminu.</p><p><br></p><p>5.2. Organizator ma obowiązek rzetelnie rozstrzygać spory i problemy, które mogą pojawić się podczas Turnieju, dążąc do uczciwego i sprawiedliwego rozwiązania.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Wręczenie nagród</span></p><p>6.1. Organizator jest odpowiedzialny za przekazanie informacji o nagrodach uczestnikom Turnieju oraz za ich wręczenie zwycięzcom zgodnie z regulaminem i warunkami określonymi przed rozpoczęciem Turnieju.</p><p><br></p><p>6.2. Organizator powinien zapewnić transparentność w przyznawaniu nagród oraz uzasadnić ewentualne decyzje w przypadku kontrowersji dotyczących wyników Turnieju.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Wsparcie techniczne</span></p><p>7.1. Organizator jest odpowiedzialny za zapewnienie wsparcia technicznego uczestnikom w trakcie Turnieju, w tym rozwiązywanie problemów związanych ze sprzętem, serwerem gry czy łącznością.</p><p><br></p><p>7.2. Organizator powinien szybko reagować na zgłoszenia uczestników dotyczące problemów technicznych i dążyć do ich jak najszybszego rozwiązania, minimalizując wpływ na przebieg Turnieju.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Promowanie wartości e-sportowych i dbanie o atmosferę</span></p><p>8.1. Organizator zobowiązany jest do promowania wartości e-sportowych, takich jak fair play, duch sportowy, wzajemny szacunek i integracja uczniów, zarówno w trakcie przygotowań do Turnieju, jak i podczas jego trwania.</p><p><br></p><p>8.2. Organizator ma obowiązek dbać o pozytywną atmosferę Turnieju, zarówno między uczestnikami, jak i w relacji uczestników z Organizatorem oraz sędziami.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">Sprawozdanie z Turnieju</span></p><p>9.1. Po zakończeniu Turnieju, Organizator ma obowiązek sporządzenia sprawozdania, w którym podsumuje przebieg Turnieju, wyniki, nagrody oraz ewentualne problemy czy uwagi. Sprawozdanie powinno zostać przekazane zarówno uczestnikom, jak i szkole.</p><p><br></p><p>Wypełniając swoje obowiązki jako Organizator Turnieju Międzyklasowego w CS:GO, organizator przyczynia się do uczciwej i pozytywnej atmosfery rozgrywek, promuje wartości e-sportowe oraz integruje uczniów szkoły.</p><p><br></p>'),
(14, 'Polityka prywatności', '<p><span style=\"color: rgb(255, 255, 255);\">1. Wprowadzenie</span></p><p><br></p><p><span style=\"color: var(--text);\">Dziękujemy za odwiedzenie naszej strony. Niniejsza polityka prywatności ma na celu wyjaśnienie, jak gromadzimy, używamy, udostępniamy i chronimy Państwa dane osobowe podczas korzystania z naszej strony.</span></p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">2. Rodzaje gromadzonych danych</span></p><p><br></p><p>2.1. Dane osobowe:</p><p>Gromadzimy dane osobowe, takie jak imię, nazwisko, adres e-mail, które są niezbędne do efektywnej organizacji i komunikacji dotyczącej naszych eventów.</p><p><br></p><p>2.2. Dane zbierane automatycznie:</p><p>Podczas korzystania z naszej strony internetowej możemy automatycznie zbierać informacje, takie jak adres IP, przeglądarka internetowa, urządzenie, czas spędzony na stronie itp. Te dane pomagają nam zrozumieć, jak użytkownicy korzystają z naszej strony i jak ją ulepszyć.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">3. Cel gromadzenia danych</span></p><p><br></p><p>Gromadzimy dane w celu:</p><p><br></p><p>3.1. Organizacji eventów: Aby umożliwić skuteczną rejestrację uczestników, zarządzanie wydarzeniami i świadczenie usług związanych z eventami.</p><p><br></p><p>3.2. Komunikacji: Aby dostarczać informacje o nadchodzących eventach, zmianach w programie, itp.</p><p><br></p><p>3.3. Statystyk i analiz: Aby analizować ruch na stronie, poprawić doświadczenie użytkownika i dostosować nasze usługi do potrzeb użytkowników.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">4. Udostępnianie danych</span></p><p><br></p><p>Nie udostępniamy Państwa danych osobowych osobom trzecim bez Państwa zgody, chyba że jest to wymagane przez prawo.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">5. Bezpieczeństwo danych</span></p><p><br></p><p>Stosujemy odpowiednie środki techniczne i organizacyjne, aby chronić Państwa dane przed nieautoryzowanym dostępem, utratą, zniszczeniem lub modyfikacją.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">6. Prawa użytkowników</span></p><p><br></p><p>Użytkownicy mają prawo do dostępu, poprawiania swoich danych.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">7. Cookies i technologie śledzenia</span></p><p><br></p><p>Nasza strona może korzystać z plików cookies i innych technologii śledzenia.</p><p><br></p><p><span style=\"color: rgb(255, 255, 255);\">8. Zmiany w polityce prywatności</span></p><p><br></p><p>Zastrzegamy sobie prawo do wprowadzenia zmian w niniejszej polityce prywatności. Wszelkie zmiany będą publikowane na naszej stronie.</p><p><br></p><p><u>Korzystając z naszej strony, zgadzają się Państwo z postanowieniami tej polityki prywatności.</u> Jeśli mają Państwo pytania lub wątpliwości, prosimy o kontakt drogą mailową.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;</p>'),
(15, 'Cookie alert', '<p>Ta strona internetowa wykorzystuje pliki cookie w celu zapewnienia jak najlepszej jakości usług oraz optymalizacji działania witryny.</p><p><br></p><p>Pliki cookie są małymi plikami tekstowymi przechowywanymi na urządzeniu użytkownika i wykorzystywane do zbierania informacji o aktywności na stronie.</p><p><br></p><p>Cele używania plików cookie obejmują:</p><ul><li><strong style=\"color: var(--tw-prose-bold);\">Funkcjonalność</strong>: Zapewnienie poprawnego działania strony internetowej.</li><li><strong style=\"color: var(--tw-prose-bold);\">Anonimowa analiza ruchu</strong>: Umożliwienie nam lepszego zrozumienia sposobu, w jaki użytkownicy korzystają z naszej witryny.</li><li><strong style=\"color: var(--tw-prose-bold);\">Reklamy</strong>: Dostosowanie treści i reklam do indywidualnych preferencji.</li></ul><p><br></p><p>Wyrażając zgodę na korzystanie z plików cookie, zgadzasz się na ich przechowywanie na Twoim urządzeniu. Jednocześnie zaznaczamy, że masz możliwość zmiany ustawień dotyczących plików cookie w ustawieniach przeglądarki internetowej.</p><p><br></p><p>Jednakże, wyłączenie niektórych rodzajów plików cookie może wpłynąć na funkcjonalność i wygodę korzystania z naszej witryny.</p><p><br></p><p>Prosimy o zapoznanie się z naszą <a href=\"polityka_prywatnosci.php\" target=\"_blank\" style=\"color: var(--text);\">Polityką Prywatności</a>, gdzie znajdziesz szczegółowe informacje na temat plików cookie oraz sposobu, w jaki są one wykorzystywane.</p><p><br></p><p>Klikając przycisk \"Akceptuję\", wyrażasz zgodę na używanie plików cookie zgodnie z naszymi zasadami.</p><p><br></p><p>Dziękujemy za korzystanie z naszej strony.</p><p>Zespół ZS14 Events</p>'),
(16, 'zapisy_title', 'Zgłoszenie na *nazwa turnieju* - *nazwa drużyny*'),
(17, 'zapisy_odbiorca', 'kowalskij@chmura.zs14.edu.pl'),
(18, 'zapisy_nadawca', 'zgłoszenia.zs14@gmail.com'),
(19, 'zapisy_tresc', '<p>Zgłaszam moją drużynę *nazwa drużny* na turniej *nazwa turnieju* jako jej lider.</p><p><br></p><p>Zawodnik 1 - lider (ja):</p><p><br></p><p>- Imię i nazwisko: Jan Kowalski</p><p>- Klasa: 5pi</p><p>- Email szkolny: kowalskij@chmura.zs14.edu.pl</p><p>- Nazwa użytkownika discord: kowalskij#1234</p><p>- Nazwa na steamie: kowalskij (https://steamcommunity.com/id/kowalskij)</p><p>- Peryferia: klawa, myszka, słuchawki z mikrofonem - potrzebne oprogramowanie to \"G HUB\" od logitech</p><p><br></p><p>Ja Jan Kowalski wyrażam zgodę na wykorzystanie mojego wizerunku oraz danych osobowych w celach związanych z turniejem.</p><p><br></p><p>Zawodnik 2:</p><p><br></p><p>- Imię i nazwisko: Paweł Pikasso</p><p>- Klasa: 5pi</p><p>- Email szkolny: pikassop@chmura.zs14.edu.pl</p><p>- Nazwa użytkownika discord: pikasso#1234</p><p>- Nazwa na steamie: pikasso (https://steamcommunity.com/id/pikasso)</p><p>- Peryferia: słuchawki z mikrofonem</p><p><br></p><p>Zgoda jest dołączona do emaila jako pdf o nazwie: zgoda - paweł pikasso.</p><p><br></p><p>(...)</p><p><br></p><p>Rezerwowy:</p><p><br></p><p>- Imię i nazwisko: Grzegorz Brzęczyszczykiewicz</p><p>- Klasa: 5pi</p><p>- Email szkolny: brzeczyszczykiewiczg@chmura.zs14.edu.pl</p><p>- Nazwa użytkownika discord: brzeczyszczykiewiczg#1234</p><p>- Nazwa na steamie: brzeczyszczykiewiczg (https://steamcommunity.com/id/brzeczyszczykiewiczg)</p><p>- Peryferia: klawa, myszka, słuchawki - icue corsair, steelseries engine</p><p><br></p><p>Zgoda zostanie doniesiona w formie papierowej.</p>'),
(20, 'sponsors_title', 'Wspierają nas najlepsi'),
(21, 'sponsors_description', 'Dzięki wsparciu naszych sponsorów możemy organizować wydarzenia, turnieje i konkursy, które inspirują i angażują uczniów.essa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invitations`
--

CREATE TABLE `invitations` (
  `invite_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `uses` int(11) NOT NULL,
  `max_uses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`invite_id`, `code`, `school_id`, `role_id`, `uses`, `max_uses`) VALUES
(7, 'test', 8, 2, 0, 2),
(8, 'test_uczen', 1, 4, 4, 10),
(13, 'test_nauczyciel', 1, 3, 0, 5),
(14, 'test_adm', 1, 2, 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `korepetycje`
--

CREATE TABLE `korepetycje` (
  `korepetycje_id` int(11) NOT NULL,
  `przedmiot_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `max_users` int(11) NOT NULL,
  `godzina` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `status_id` int(11) NOT NULL,
  `destiny` varchar(50) DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korepetycje`
--

INSERT INTO `korepetycje` (`korepetycje_id`, `przedmiot_id`, `creator_id`, `max_users`, `godzina`, `data`, `status_id`, `destiny`, `room_id`, `school_id`) VALUES
(9, 16, 36, 3, 'od 14:00 do 15:00', '2023-12-19', 1, '10, 8, 1', 2, 1),
(11, 10, 36, 10, 'od 15:10 do 16:05', '2023-12-26', 1, 'wszyscy', 3, 1),
(12, 10, 36, 10, 'od 15:10 do 16:05', '2024-01-02', 1, 'wszyscy', 3, 1),
(13, 10, 36, 10, 'od 15:10 do 16:05', '2024-01-09', 1, 'wszyscy', 3, 1),
(14, 8, 36, 5, 'od 08:00 do 09:00', '2023-12-18', 1, '1', 17, 1),
(17, 2, 40, 10, 'od 13:50 do 14:30', '2023-12-14', 1, 'wszyscy', 10, 1),
(19, 2, 40, 15, 'od 15:10 do 16:00', '2023-12-20', 1, '2, 1', 10, 1),
(20, 2, 40, 15, 'od 15:10 do 16:00', '2023-12-27', 3, '2, 1', 10, 1),
(21, 11, 40, 10, 'od 12:10 do 13:10', '2023-12-16', 1, '6, 13', 10, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `korepetycje_status`
--

CREATE TABLE `korepetycje_status` (
  `status_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korepetycje_status`
--

INSERT INTO `korepetycje_status` (`status_id`, `name`) VALUES
(1, 'otwarte'),
(2, 'zamknięte'),
(3, 'odwołane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `when` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `object_id` int(11) NOT NULL,
  `object_type` text NOT NULL,
  `before` text DEFAULT NULL,
  `after` text NOT NULL,
  `type` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES
(3, 1, '2023-06-19 06:47:24', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, 2023-06-16 12:10:41, 1', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, current_timestamp(), 3', 1, 'Edytowano użytkownika'),
(4, 1, '2023-06-19 06:47:55', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 4, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, , 1', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, , 1', 1, 'Edycja produktu'),
(5, 1, '2023-06-19 06:48:21', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 5, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, , 1', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 1', 1, 'Edycja produktu'),
(6, 1, '2023-06-19 06:48:57', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 3, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 4', 1, 'Edycja produktu'),
(7, 1, '2023-06-19 06:49:11', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 5, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 1', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 3', 1, 'Edycja produktu'),
(8, 1, '2023-06-19 06:49:27', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 3', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 1', 1, 'Edycja produktu'),
(9, 1, '2023-06-19 06:49:36', 3, 'products', 'Etui przezroczyste iPhone 11 slim, PN-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 1', 'Etui przezroczyste iPhone 11 slim, PN-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 1, 'Edycja produktu'),
(10, 1, '2023-06-19 07:14:42', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 4', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 4', 1, 'Edycja produktu'),
(11, 1, '2023-06-19 07:14:54', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 4', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 1, 'Edycja produktu'),
(12, 1, '2023-06-19 07:16:07', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, 2023-06-19 08:47:24, 3', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(13, 1, '2023-06-19 07:16:25', 4, 'users', 'NULL', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6, asd, asd, 688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6, asd, 1, current_timestamp(), current_timestamp(), 1', 2, 'Dodano użytkownika'),
(14, 1, '2023-06-19 07:17:58', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-06-19 09:16:25, 1', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 3', 1, 'Edytowano użytkownika'),
(15, 1, '2023-06-19 09:40:09', 1, 'settings', '1, admin, Full privilages for all', '1, admin, Full privilages for all', 1, 'Zmodfikowano rolę użytkownika'),
(16, 1, '2023-06-19 09:41:30', 1, 'user_roles', '1, admin, Full privilages for all', '1, admin, Full privilages for all', 1, 'Zmodfikowano rolę użytkownika'),
(17, 1, '2023-06-19 09:47:00', 1, 'user_roles', '1, admin, Full privilages for all', '1, admin, Full privilages for alla', 1, 'Zmodfikowano rolę użytkownika'),
(18, 1, '2023-06-19 09:47:05', 1, 'user_roles', '1, admin, Full privilages for alla', '1, admin, Full privilages for all', 1, 'Zmodfikowano rolę użytkownika'),
(19, 1, '2023-06-19 16:26:21', 2, 'user_roles', '2, magazynier, Only for update products, orders', '2, magazynier, Only for update products, orders2', 1, 'Zmodfikowano rolę użytkownika'),
(20, 1, '2023-06-19 16:27:05', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 10, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 1, 'Edycja produktu'),
(21, 1, '2023-06-19 16:27:52', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 12, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 1, 'Edycja produktu'),
(22, 1, '2023-06-19 16:30:09', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 13, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 1, 'Edycja produktu'),
(23, 1, '2023-06-19 16:33:21', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 14, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 1, 'Edycja produktu'),
(24, 1, '2023-06-19 16:34:10', 6, 'products', 'NULL', 'esa, PN-1006, 12, 68.00, 1, pn-1006.png, esa, 3, esa, 1', 2, 'Dodano produkt'),
(25, 1, '2023-06-19 16:36:14', 2, 'user_roles', '2, magazynier, Only for update products, orders2', '2, magazynier, Only for update products, orders', 1, 'Zmodfikowano rolę użytkownika'),
(26, 1, '2023-06-19 16:41:08', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, , 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 1, 'Edycja produktu'),
(27, 1, '2023-06-19 16:42:50', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, 2023-06-19 09:16:07, 1', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, current_timestamp(), 4', 1, 'Edytowano użytkownika'),
(28, 1, '2023-06-19 16:44:06', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, 2023-06-19 18:42:50, 4', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(29, 1, '2023-06-19 16:44:13', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 1, 2023-06-15 20:56:58, 2023-06-19 18:44:06, 1', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(30, 1, '2023-06-19 16:45:19', 2, 'user_roles', '2, magazynier, Only for update products, orders', '2, magazynier2, Only for update products, orders', 1, 'Zmodfikowano rolę użytkownika'),
(31, 1, '2023-06-19 16:46:20', 2, 'user_roles', '2, magazynier2, Only for update products, orders', '2, magazynier, Only for update products, orders', 1, 'Zmodfikowano rolę użytkownika'),
(32, 1, '2023-06-20 07:05:30', 3, 'user_roles', ', , ', '3, wyłączone, ', 1, 'Zmodfikowano rolę użytkownika'),
(33, 1, '2023-06-20 07:10:06', 2, 'user_status', '2, nieaktywne', '2, ', 1, 'Zmodfikowano status użytkownika'),
(34, 1, '2023-06-20 07:10:49', 2, 'user_status', '2, nieaktywne2', '2, nieaktywne', 1, 'Zmodfikowano status użytkownika'),
(35, 1, '2023-06-20 07:39:52', 3, 'user_status', '3, wyłączone, 2', '3, wyłączone, 1', 1, 'Zmodfikowano status użytkownika'),
(36, 1, '2023-06-20 07:40:40', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, 2023-06-19 18:44:13, 1', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, current_timestamp(), 3', 1, 'Edytowano użytkownika'),
(37, 1, '2023-06-20 07:47:03', 3, 'user_status', '3, wyłączone, 1', '3, wyłączone, 2', 1, 'Zmodfikowano status użytkownika'),
(38, 1, '2023-06-20 07:49:17', 3, 'user_status', '3, wyłączone, 2', '3, wyłączone, 1', 1, 'Zmodfikowano status użytkownika'),
(39, 3, '2023-06-20 07:52:09', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, 2023-06-20 09:40:40, 3', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, current_timestamp(), 4', 1, 'Edytowano użytkownika'),
(40, 1, '2023-06-20 07:53:17', 3, 'user_status', '3, wyłączone, 1', '3, wyłączone, 2', 1, 'Zmodfikowano status użytkownika'),
(41, 1, '2023-06-20 07:53:34', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, 2023-06-20 09:52:09, 4', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, current_timestamp(), 1', 1, 'Edytowano użytkownika'),
(42, 1, '2023-06-20 08:10:17', 0, 'user_status', ', , ', ', Kakor, 1', 2, 'Dodano status użytkownika'),
(43, 1, '2023-06-20 08:11:39', 6, 'user_status', 'NULL', ', Kakor moment, 2', 2, 'Dodano status użytkownika'),
(44, 1, '2023-06-20 08:12:28', 7, 'user_status', 'NULL', '7, Kakor2, 1', 2, 'Dodano status użytkownika'),
(45, 1, '2023-06-20 08:19:28', 6, 'user_status', '6, Kakor moment, 2', '6, Kakor moment, 1', 1, 'Zmodfikowano status użytkownika'),
(46, 1, '2023-06-20 08:19:34', 6, 'user_status', '6, Kakor moment, 1', '6, Kakor moment, 2', 1, 'Zmodfikowano status użytkownika'),
(47, 1, '2023-06-20 08:34:27', 7, 'user_status', '7, Kakor2, 1', '', 3, 'Usunięto status użytkownika'),
(48, 1, '2023-06-20 08:40:40', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-06-19 09:17:58, 3', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 6', 1, 'Edytowano użytkownika'),
(49, 1, '2023-06-20 08:41:11', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-06-20 10:40:40, 6', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 2', 1, 'Edytowano użytkownika'),
(50, 1, '2023-06-20 08:41:36', 6, 'user_status', '6, Kakor moment, 2', '', 3, 'Usunięto status użytkownika'),
(51, 2, '2023-06-20 11:50:39', 7, 'products', 'NULL', 'xdd, PN-1007, 31, 67, 1, pn-1007, asd, 1, asd, 1', 2, 'Dodano produkt'),
(52, 2, '2023-06-20 11:55:37', 7, 'products', 'xdd, PN-1007, 31.00, 67.00, 1, pn-1007, asd, 1, asd, 1', 'xdd, PN-1007, 31.00, 67.00, 1, pn-1007, asd, 1, asd, 1', 1, 'Edycja produktu'),
(53, 2, '2023-06-20 11:55:55', 8, 'products', 'NULL', 'das, PN-1008, 56, 88, 1, pn-1008, hhjhj, 1, hvgbh, 1', 2, 'Dodano produkt'),
(54, 2, '2023-06-20 11:56:55', 9, 'products', 'NULL', 'bjksadjn, PN-1009, 77, 77, 1, pn-1009jpg, bhbh, 1, hgvjbh, 1', 2, 'Dodano produkt'),
(55, 2, '2023-06-20 11:57:33', 10, 'products', 'NULL', 'fasdfs, PN-1010, 66, 66, 1, pn-1010.jpg, bhjbhjbjh, 1, hjbhjb, 1', 2, 'Dodano produkt'),
(56, 2, '2023-06-20 11:57:56', 11, 'products', 'NULL', 'jhsdfb, PN-1011, 66, 8, 1, pn-1011.png, hbjhbhbj, 1, ughbjhbj, 1', 2, 'Dodano produkt'),
(57, 2, '2023-06-20 11:59:47', 12, 'products', 'NULL', 'jksa, PN-1012, 89, 99, 1, pn-1012.png, bhbh, 1, hb, 1', 2, 'Dodano produkt'),
(58, 2, '2023-06-20 12:02:49', 13, 'products', 'NULL', 'adsfasd, PN-1013, 567, 879, 1, Uzupełniany automatycznie.png, fsdaf, 1, dasd, 1', 2, 'Dodano produkt'),
(59, 2, '2023-06-20 12:04:06', 14, 'products', 'NULL', 'ghvjbk, PN-1014, 68, 89, 1, PN-1014.png, jbjbk, 1, jbh, 1', 2, 'Dodano produkt'),
(60, 2, '2023-06-20 12:08:32', 15, 'products', 'NULL', 'has, pn-1015, 67, 889, 1, pn-1015.png, bhbh, 1, bbh, 1', 2, 'Dodano produkt'),
(61, 2, '2023-06-20 12:09:32', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(62, 2, '2023-06-20 12:09:44', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(63, 2, '2023-06-20 12:15:21', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(64, 2, '2023-06-20 12:16:06', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(65, 2, '2023-06-20 12:20:38', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(66, 2, '2023-06-20 12:20:46', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(67, 2, '2023-06-20 12:22:26', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(68, 2, '2023-06-20 12:22:45', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(69, 2, '2023-06-20 12:23:08', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(70, 2, '2023-06-20 12:23:36', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(71, 2, '2023-06-20 12:23:40', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(72, 2, '2023-06-20 12:24:01', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(73, 2, '2023-06-20 12:24:57', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(74, 2, '2023-06-20 12:25:49', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(75, 2, '2023-06-20 12:26:12', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 1, 'Edycja produktu'),
(76, 2, '2023-06-20 12:26:58', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(77, 2, '2023-06-20 12:27:43', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(78, 2, '2023-06-20 12:29:12', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(79, 2, '2023-06-20 12:29:14', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(80, 2, '2023-06-20 12:30:42', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(81, 2, '2023-06-20 12:30:52', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(82, 2, '2023-06-20 12:31:56', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(83, 2, '2023-06-20 12:32:33', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(84, 2, '2023-06-20 12:34:06', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(85, 2, '2023-06-20 12:34:16', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(86, 2, '2023-06-20 12:34:36', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(87, 2, '2023-06-20 12:35:34', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(88, 2, '2023-06-20 12:36:49', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(89, 2, '2023-06-20 12:37:06', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(90, 2, '2023-06-20 12:37:36', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(91, 2, '2023-06-20 12:37:52', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(92, 2, '2023-06-20 12:38:17', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(93, 2, '2023-06-20 12:38:53', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(94, 2, '2023-06-20 12:40:12', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(95, 2, '2023-06-20 12:40:49', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(96, 2, '2023-06-20 12:41:54', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(97, 2, '2023-06-20 12:42:33', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(98, 2, '2023-06-20 12:43:56', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(99, 2, '2023-06-20 12:44:18', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(100, 2, '2023-06-20 12:45:27', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(101, 2, '2023-06-20 12:45:42', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(102, 2, '2023-06-20 12:47:00', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(103, 2, '2023-06-20 12:47:56', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(104, 2, '2023-06-20 12:48:20', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(105, 2, '2023-06-20 12:48:35', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(106, 2, '2023-06-20 12:48:54', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, pn-1012.png, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(107, 2, '2023-06-20 12:49:17', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, $pn-1012..jpg, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, $pn-1012..jpg, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(108, 2, '2023-06-20 12:49:45', 11, 'products', 'jhsdfb, PN-1011, 66.00, 8.00, 1, pn-1011.png, hbjhbhbj, 1, ughbjhbj, 1', 'jhsdfb, PN-1011, 66.00, 8.00, 1, pn-1011.png, hbjhbhbj, 1, ughbjhbj, 1', 1, 'Edycja produktu'),
(109, 2, '2023-06-20 12:50:35', 11, 'products', 'jhsdfb, PN-1011, 66.00, 8.00, 1, pn-1011..jpg, hbjhbhbj, 1, ughbjhbj, 1', 'jhsdfb, PN-1011, 66.00, 8.00, 1, pn-1011..jpg, hbjhbhbj, 1, ughbjhbj, 1', 1, 'Edycja produktu'),
(110, 2, '2023-06-20 12:50:45', 10, 'products', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.jpg, bhjbhjbjh, 1, hjbhjb, 1', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.jpg, bhjbhjbjh, 1, hjbhjb, 1', 1, 'Edycja produktu'),
(111, 2, '2023-06-20 12:51:07', 10, 'products', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.jpg, bhjbhjbjh, 1, hjbhjb, 1', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.jpg, bhjbhjbjh, 1, hjbhjb, 1', 1, 'Edycja produktu'),
(112, 2, '2023-06-20 12:51:32', 10, 'products', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.png, bhjbhjbjh, 1, hjbhjb, 1', 'fasdfs, PN-1010, 66.00, 66.00, 1, pn-1010.png, bhjbhjbjh, 1, hjbhjb, 1', 1, 'Edycja produktu'),
(113, 2, '2023-06-20 12:52:45', 15, 'products', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 1', 'has, pn-1015, 67.00, 889.00, 1, pn-1015.png, bhbh, 1, bbh, 4', 1, 'Edycja produktu'),
(114, 2, '2023-06-20 12:53:19', 16, 'products', 'NULL', 'jkbsdfbj, pn-1016, 87, 898, 1, pn-1016.jpg, kjjkn, 1, jkjbkjk, 1', 2, 'Dodano produkt'),
(115, 2, '2023-06-20 12:53:53', 16, 'products', 'jkbsdfbj, pn-1016, 87.00, 898.00, 1, pn-1016.jpg, kjjkn, 1, jkjbkjk, 1', 'jkbsdfbj, pn-1016, 87.00, 898.00, 1, pn-1016.jpg, kjjkn, 1, jkjbkjk, 1', 1, 'Edycja produktu'),
(116, 2, '2023-06-20 13:12:59', 20, 'products', 'NULL', 'fast, pn-1020, 99, 99, 1, pn-1020., kbjbj, 1, kbjjk, 1', 2, 'Dodano produkt'),
(117, 2, '2023-06-20 13:14:09', 21, 'products', 'NULL', 'ads, pn-1021, 88, 88, 1, pn-1021., bhp, 1, bjh, 1', 2, 'Dodano produkt'),
(118, 2, '2023-06-20 13:15:15', 21, 'products', 'ads, pn-1021, 88.00, 88.00, 1, , bhp, 1, bjh, 1', 'ads, pn-1021, 88.00, 88.00, 1, , bhp, 1, bjh, 1', 1, 'Edycja produktu'),
(119, 2, '2023-06-20 13:16:44', 21, 'products', 'ads, pn-1021, 88.00, 88.00, 1, .jpg, bhp, 1, bjh, 1', 'ads, pn-1021, 88.00, 88.00, 1, .jpg, bhp, 1, bjh, 1', 1, 'Edycja produktu'),
(120, 2, '2023-06-20 13:16:57', 22, 'products', 'NULL', 'sfd, pn-1022, 77, 77, 1, pn-1022., jbh, 1, bhj, 1', 2, 'Dodano produkt'),
(121, 2, '2023-06-20 13:17:03', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, , jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, , jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(122, 2, '2023-06-20 13:17:25', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(123, 2, '2023-06-20 13:17:31', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(124, 2, '2023-06-20 13:17:38', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(125, 2, '2023-06-20 13:17:49', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, .jpg, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, .jpg, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(126, 2, '2023-06-20 13:18:16', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, .jpg, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, .jpg, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(127, 2, '2023-06-20 13:18:50', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, ., jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(128, 2, '2023-06-20 13:19:29', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, .png, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, .png, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(129, 2, '2023-06-20 13:19:48', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.jpg, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.jpg, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(130, 2, '2023-06-20 13:20:01', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.png, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.png, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(131, 2, '2023-06-20 13:21:20', 23, 'products', 'NULL', 'dsfas, pn-1023, 99, 789, 1, pn-1023., bhjbhj, 1, bjbh, 1', 2, 'Dodano produkt'),
(132, 2, '2023-06-20 13:25:43', 23, 'products', 'dsfas, pn-1023, 99.00, 789.00, 1, , bhjbhj, 1, bjbh, 1', 'dsfas, pn-1023, 99.00, 789.00, 1, , bhjbhj, 1, bjbh, 1', 1, 'Edycja produktu'),
(133, 2, '2023-06-20 13:27:18', 23, 'products', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 1, 'Edycja produktu'),
(134, 2, '2023-06-20 13:27:25', 23, 'products', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 1, 'Edycja produktu'),
(135, 2, '2023-06-20 13:27:29', 23, 'products', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023.jpg, bhjbhj, 1, bjbh, 1', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023.jpg, bhjbhj, 1, bjbh, 1', 1, 'Edycja produktu'),
(136, 2, '2023-06-20 13:27:38', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.sql, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.sql, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(137, 2, '2023-06-20 13:39:45', 24, 'products', 'NULL', 'dsfasgdfsgsdfh, pn-1024, 66, 66, 1, pn-1024., bbbhj, 1, hjbh, 1', 2, 'Dodano produkt'),
(138, 2, '2023-06-20 13:39:56', 24, 'products', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, , bbbhj, 1, hjbh, 1', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, , bbbhj, 1, hjbh, 1', 1, 'Edycja produktu'),
(139, 2, '2023-06-20 13:43:30', 24, 'products', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 1, 'Edycja produktu'),
(140, 2, '2023-06-20 13:44:29', 24, 'products', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 1, 'Edycja produktu'),
(141, 2, '2023-06-20 13:53:22', 25, 'products', 'NULL', 'hgj, pn-1025, 788, 9999, 1, pn-1025., hjbhj, 1, bhbhj, 1', 2, 'Dodano produkt'),
(142, 2, '2023-06-20 13:53:28', 25, 'products', 'hgj, pn-1025, 788.00, 9999.00, 1, , hjbhj, 1, bhbhj, 1', 'hgj, pn-1025, 788.00, 9999.00, 1, , hjbhj, 1, bhbhj, 1', 1, 'Edycja produktu'),
(143, 2, '2023-06-20 13:55:40', 26, 'products', 'NULL', 'ghvjb, pn-1026, 65789, 56789, 1, pn-1026., hbjbhj, 1, jbhbhj, 1', 2, 'Dodano produkt'),
(144, 2, '2023-06-20 13:59:15', 26, 'products', 'ghvjb, pn-1026, 65789.00, 56789.00, 1, , hbjbhj, 1, jbhbhj, 1', 'ghvjb, pn-1026, 65789.00, 56789.00, 1, , hbjbhj, 1, jbhbhj, 1', 1, 'Edycja produktu'),
(145, 2, '2023-06-20 14:00:14', 27, 'products', 'NULL', 'fadsfsdfadsgfdsgsd, pn-1027, 56565, 76556, 1, pn-1027., bjhbj, 1, bjhhbj, 1', 2, 'Dodano produkt'),
(146, 2, '2023-06-20 14:00:20', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(147, 2, '2023-06-20 14:00:25', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(148, 2, '2023-06-20 14:02:12', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(149, 2, '2023-06-20 14:04:04', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(150, 2, '2023-06-20 14:04:26', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, , bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(151, 2, '2023-06-20 14:05:34', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.jpg, bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.jpg, bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(152, 2, '2023-06-20 14:05:44', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.jpg, bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.jpg, bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(153, 2, '2023-06-20 14:05:56', 27, 'products', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.png, bjhbj, 1, bjhhbj, 1', 'fadsfsdfadsgfdsgsd, pn-1027, 56565.00, 76556.00, 1, pn-1027.png, bjhbj, 1, bjhhbj, 1', 1, 'Edycja produktu'),
(154, 2, '2023-06-20 14:12:17', 28, 'products', 'NULL', 'fdsgafsdasg, pn-1028, 789, 6789, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 2, 'Dodano produkt'),
(155, 2, '2023-06-20 14:12:23', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(156, 2, '2023-06-20 14:14:00', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(157, 2, '2023-06-20 14:14:04', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(158, 2, '2023-06-20 14:14:12', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(159, 2, '2023-06-20 14:14:18', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(160, 2, '2023-06-20 14:15:16', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(161, 2, '2023-06-20 14:15:23', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, , jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(162, 2, '2023-06-20 14:15:27', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(163, 2, '2023-06-20 14:15:47', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.png, jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(164, 2, '2023-06-20 14:15:59', 28, 'products', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.jpg, jbhhjb, 1, bhjbh, 1', 'fdsgafsdasg, pn-1028, 789.00, 6789.00, 1, pn-1028.jpg, jbhhjb, 1, bhjbh, 1', 1, 'Edycja produktu'),
(165, 2, '2023-06-20 14:16:34', 29, 'products', 'NULL', 'asdfsadf, pn-1029, 6789, 999, 1, pn-1029.jpg, bhjbh, 1, bjbhj, 1', 2, 'Dodano produkt'),
(166, 2, '2023-06-20 14:50:52', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , PN-1002, 24.59, 79.99, 15, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 1, 'Edycja produktu'),
(167, 2, '2023-06-20 14:50:59', 1, 'products', 'Etui różowe na iPhone 14 Plus, PN-1001, 17.97, 34.99, 8, pn-1001.png, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 'Etui różowe na iPhone 14 Plus, PN-1001, 17.97, 34.99, 8, pn-1001.png, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 1, 'Edycja produktu'),
(168, 2, '2023-06-20 14:51:04', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, pn-1004.png, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, pn-1004.png, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(169, 2, '2023-06-20 14:51:09', 6, 'products', 'esa, PN-1006, 12.00, 68.00, 1, pn-1006.png, esa, 3, esa, 1', 'esa, PN-1006, 12.00, 68.00, 1, pn-1006.png, esa, 3, esa, 1', 1, 'Edycja produktu'),
(170, 2, '2023-06-20 14:51:13', 7, 'products', 'xdd, PN-1007, 31.00, 67.00, 1, pn-1007, asd, 1, asd, 1', 'xdd, PN-1007, 31.00, 67.00, 1, pn-1007, asd, 1, asd, 1', 1, 'Edycja produktu'),
(171, 2, '2023-06-20 14:51:17', 8, 'products', 'das, PN-1008, 56.00, 88.00, 1, pn-1008, hhjhj, 1, hvgbh, 1', 'das, PN-1008, 56.00, 88.00, 1, pn-1008, hhjhj, 1, hvgbh, 1', 1, 'Edycja produktu'),
(172, 2, '2023-06-20 14:51:22', 9, 'products', 'bjksadjn, PN-1009, 77.00, 77.00, 1, pn-1009jpg, bhbh, 1, hgvjbh, 1', 'bjksadjn, PN-1009, 77.00, 77.00, 1, pn-1009jpg, bhbh, 1, hgvjbh, 1', 1, 'Edycja produktu'),
(173, 2, '2023-06-20 14:51:31', 12, 'products', 'jksa, PN-1012, 89.00, 99.00, 1, $pn-1012...jpg, bhbh, 1, hb, 1', 'jksa, PN-1012, 89.00, 99.00, 1, $pn-1012...jpg, bhbh, 1, hb, 1', 1, 'Edycja produktu'),
(174, 2, '2023-06-20 14:51:37', 13, 'products', 'adsfasd, PN-1013, 567.00, 879.00, 1, Uzupełniany automatycznie.png, fsdaf, 1, dasd, 1', 'adsfasd, PN-1013, 567.00, 879.00, 1, Uzupełniany automatycznie.png, fsdaf, 1, dasd, 1', 1, 'Edycja produktu'),
(175, 2, '2023-06-20 14:51:43', 17, 'products', 'fsdf, pn-1017, 78.00, 78.00, 1, pn-1017., jbbj, 1, bjbj, 1', 'fsdf, pn-1017, 78.00, 78.00, 1, pn-1017., jbbj, 1, bjbj, 1', 1, 'Edycja produktu'),
(176, 2, '2023-06-20 14:51:48', 18, 'products', 'fads, pn-1018, 99.00, 99.00, 1, pn-1018., bhhb, 1, bhb, 1', 'fads, pn-1018, 99.00, 99.00, 1, pn-1018., bhhb, 1, bhb, 1', 1, 'Edycja produktu'),
(177, 2, '2023-06-20 14:51:54', 19, 'products', 'deaf, pn-1019, 99.00, 78.00, 1, pn-1019., bjhb, 1, bjhbh, 1', 'deaf, pn-1019, 99.00, 78.00, 1, pn-1019., bjhb, 1, bjhbh, 1', 1, 'Edycja produktu'),
(178, 2, '2023-06-20 14:52:02', 13, 'products', 'adsfasd, PN-1013, 567.00, 879.00, 1, PN-1013.jpg, fsdaf, 1, dasd, 1', 'adsfasd, PN-1013, 567.00, 879.00, 1, PN-1013.jpg, fsdaf, 1, dasd, 1', 1, 'Edycja produktu'),
(179, 2, '2023-06-20 14:52:13', 20, 'products', 'fast, pn-1020, 99.00, 99.00, 1, NULL, kbjbj, 1, kbjjk, 1', 'fast, pn-1020, 99.00, 99.00, 1, NULL, kbjbj, 1, kbjjk, 1', 1, 'Edycja produktu'),
(180, 2, '2023-06-20 14:52:22', 21, 'products', 'ads, pn-1021, 88.00, 88.00, 1, .jpg, bhp, 1, bjh, 1', 'ads, pn-1021, 88.00, 88.00, 1, .jpg, bhp, 1, bjh, 1', 1, 'Edycja produktu'),
(181, 2, '2023-06-20 14:52:31', 22, 'products', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.sql, jbh, 1, bhj, 1', 'sfd, pn-1022, 77.00, 77.00, 1, pn-1022.sql, jbh, 1, bhj, 1', 1, 'Edycja produktu'),
(182, 2, '2023-06-20 14:52:38', 23, 'products', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 'dsfas, pn-1023, 99.00, 789.00, 1, pn-1023., bhjbhj, 1, bjbh, 1', 1, 'Edycja produktu'),
(183, 2, '2023-06-20 14:52:45', 24, 'products', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 'dsfasgdfsgsdfh, pn-1024, 66.00, 66.00, 1, pn-1024., bbbhj, 1, hjbh, 1', 1, 'Edycja produktu'),
(184, 2, '2023-06-20 14:52:52', 25, 'products', 'hgj, pn-1025, 788.00, 9999.00, 1, pn-1025., hjbhj, 1, bhbhj, 1', 'hgj, pn-1025, 788.00, 9999.00, 1, pn-1025., hjbhj, 1, bhbhj, 1', 1, 'Edycja produktu'),
(185, 2, '2023-06-20 14:52:59', 26, 'products', 'ghvjb, pn-1026, 65789.00, 56789.00, 1, pn-1026., hbjbhj, 1, jbhbhj, 1', 'ghvjb, pn-1026, 65789.00, 56789.00, 1, pn-1026., hbjbhj, 1, jbhbhj, 1', 1, 'Edycja produktu'),
(186, 2, '2023-06-20 14:53:05', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, pn-1005.png, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(187, 2, '2023-06-20 14:54:03', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, PN-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, PN-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(188, 2, '2023-06-20 14:54:07', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, PN-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, PN-1004, 29.76, 57.99, 3, PN-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(189, 2, '2023-06-20 14:54:12', 6, 'products', 'esa, PN-1006, 12.00, 68.00, 1, PN-1006.jpg, esa, 3, esa, 1', 'esa, PN-1006, 12.00, 68.00, 1, PN-1006.jpg, esa, 3, esa, 1', 1, 'Edycja produktu'),
(190, 2, '2023-06-20 14:54:17', 9, 'products', 'bjksadjn, PN-1009, 77.00, 77.00, 1, PN-1009.jpg, bhbh, 1, hgvjbh, 1', 'bjksadjn, PN-1009, 77.00, 77.00, 1, PN-1009.jpg, bhbh, 1, hgvjbh, 1', 1, 'Edycja produktu'),
(191, 2, '2023-06-20 14:54:22', 13, 'products', 'adsfasd, PN-1013, 567.00, 879.00, 1, PN-1013.jpg, fsdaf, 1, dasd, 1', 'adsfasd, PN-1013, 567.00, 879.00, 1, PN-1013.jpg, fsdaf, 1, dasd, 1', 1, 'Edycja produktu'),
(192, 2, '2023-06-20 14:54:30', 5, 'products', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, PN-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, PN-1005, 13.87, 23.99, 0, PN-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(193, 2, '2023-06-20 14:57:34', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 15, pn-1002.jpg, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 1, 'Edycja produktu'),
(194, 2, '2023-06-20 14:57:42', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 8, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 1, 'Edycja produktu'),
(195, 2, '2023-06-20 14:57:48', 4, 'products', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 'Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, pn-1004, 29.76, 57.99, 3, pn-1004.jpg, https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, 2, Pełen zestaw, wraz ze specjalnymi prowadnicami, 1', 1, 'Edycja produktu'),
(196, 2, '2023-06-20 14:57:54', 5, 'products', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 'Etui przezroczyste iPhone 11, pn-1005, 13.87, 23.99, 0, pn-1005.jpg, https://www.aliexpress.us/item/3256804512972566.html, 1, , 2', 1, 'Edycja produktu'),
(197, 2, '2023-06-20 14:58:10', 3, 'products', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 'Etui przezroczyste iPhone 11 slim, pn-1003, 8.87, 23.99, 0, pn-1003.png, https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, 1, chińczyk XD, 2', 1, 'Edycja produktu'),
(198, 2, '2023-06-27 14:12:17', 30, 'products', 'NULL', 'test, pn-1006, 55, 55, 1, pn-1006., ali, 1, xd, 1', 2, 'Dodano produkt'),
(199, 2, '2023-06-27 14:25:36', 31, 'products', 'NULL', 'tescik, pn-1007, 67, 77, 1, pn-1007.jpg, test, 1, test, 3', 2, 'Dodano produkt'),
(200, 2, '2023-06-27 14:28:30', 32, 'products', 'NULL', 'op, pn-1008, 66, 77, 0, pn-1008.jpg, op, 1, op, 3', 2, 'Dodano produkt'),
(201, 2, '2023-06-27 14:28:52', 33, 'products', 'NULL', 'pl, pn-1009, 99, 90, 0, pn-1009., pl, 1, pl, 3', 2, 'Dodano produkt'),
(202, 2, '2023-06-27 14:31:09', 34, 'products', 'NULL', 'ty, pn-1010, 88, 88, 1, pn-1010.jpg, ty, 1, ty, 1', 2, 'Dodano produkt'),
(203, 2, '2023-06-27 14:51:23', 35, 'products', 'NULL', 'rf, pn-1011, 55, 55, 0, pn-1011.jpg, rf, 1, rf, 3', 2, 'Dodano produkt'),
(204, 2, '2023-06-28 16:36:55', 36, 'products', 'NULL', 'td, pn-1012, 77, 77, 0, pn-1012., 6, 1, 5, 3', 2, 'Dodano produkt'),
(205, 2, '2023-06-28 16:38:55', 37, 'products', 'NULL', 'oil, pn-1013, 99, 99, 0, pn-1013., 99, 1, 99, 3', 2, 'Dodano produkt'),
(206, 2, '2023-06-28 16:52:06', 38, 'products', 'NULL', 'ftgyhb, pn-1014, 99, 99, 0, pn-1014., 99, 1, 99, 3', 2, 'Dodano produkt'),
(207, 2, '2023-06-28 16:56:42', 39, 'products', 'NULL', 'fcghvbjug, pn-1015, 77, 77, 0, pn-1015., ty, 1, ty, 3', 2, 'Dodano produkt');
INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES
(208, 2, '2023-07-01 12:10:13', 1, 'products', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 0, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 1', 'Etui różowe na iPhone 14 Plus, pn-1001, 17.97, 34.99, 0, pn-1001.jpg, https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, 5, , 2', 1, 'Edycja produktu'),
(209, 2, '2023-07-01 12:10:19', 2, 'products', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 1', 'Radiator M.2 SSD 5V 3PIN ARGB , pn-1002, 24.59, 79.99, 0, pn-1002.png, https://www.aliexpress.us/item/3256805358414225.html?gatewayAdapt=pol2usa4itemAdapt, 1, joł, 2', 1, 'Edycja produktu'),
(210, 2, '2023-07-01 16:34:00', 40, 'products', 'NULL', 'Nazwa: Dobry, <br>SKU:pn-1016, <br>Cena zakupu: 14.00, <br>Cena: 19.50, <br>Ilość: 1, pn-1016., <br>Źródło: fghj, <br>ID kategorii: 1, <br>Opis: fghj, <br>ID statusu: 1', 2, 'Dodano produkt'),
(211, 2, '2023-07-01 16:34:13', 40, 'products', 'Nazwa: Dobry, <br>SKU: pn-1016, <br>Cena zakupu: 14.00, <br>Cena: 19.50, <br>Ilość: 1, <br>, <br>źródło: fghj, <br>olx: ghkj, <br>allegro: gjhk, <br>ID kategorii: 1, <br>Opis: fghj, <br>ID statusu: 1', 'Name: Dobry, <br>SKU: pn-1016, <br>Cena zakupu: 14.00, <br>Cena: 19.50, <br>Ilość: 1, <br>, <br>źródło: fghj, <br>olx: ghkj, <br>allegro: gjhk, <br>ID kategorii: 1, <br>Opis: fghj, <br>ID statusu: 1', 1, 'Edycja produktu'),
(212, 1, '2023-07-01 16:45:30', 3, 'products', 'Nazwa: Etui przezroczyste iPhone 11 slim, <br>SKU: pn-1003, <br>Cena zakupu: 8.87, <br>Cena: 23.99, <br>Ilość: 10, <br>pn-1003.png, <br>źródło: https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, <br>olx: , <br>allegro: , <br>ID kategorii: 1, <br>Opis: chińczyk XD, <br>ID statusu: 1', 'Name: Etui przezroczyste iPhone 11 slim, <br>SKU: pn-1003, <br>Cena zakupu: 8.87, <br>Cena: 23.99, <br>Ilość: 10, <br>pn-1003.png, <br>źródło: https://www.aliexpress.us/item/3256804512972566.html?spm=a2g0o.productlist.main.1.f21c48e2H5GBoa&algo_pvid=dc321fb3-1b72-41b0-9e72-f5614afa69ed&algo_exp_id=dc321fb3-1b72-41b0-9e72-f5614afa69ed-0&pdp_npi=3%40dis%21USD%212.95%210.99%21%21%21%21%21%402100b77316869381932143454d0753%2112000030144805473%21sea%21US%210&curPageLogUid=N6eGAkz1d6IK, <br>olx: , <br>allegro: , <br>ID kategorii: 1, <br>Opis: chińczyk XD, <br>ID statusu: 1', 1, 'Edycja produktu'),
(213, 1, '2023-07-03 08:47:47', 4, 'products', 'Nazwa: Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, <br>SKU: pn-1004, <br>Cena zakupu: 29.76, <br>Cena: 57.99, <br>Ilość: 3, <br>pn-1004.jpg, <br>źródło: https://www.aliexpress.us/item/3256805424784115.html?spm=a2g0o.productlist.main.49.2142M0uaM0uatc&algo_pvid=dcc47a42-ae1e-491d-9704-da64ac621b1a&aem_p4p_detail=202306161110219138718064091540004380597&algo_exp_id=dcc47a42-ae1e-491d-9704-da64ac621b1a-24&pdp_npi=3%40dis%21USD%216.22%214.04%21%21%21%21%21%402145265416869390219124827d0768%2112000033748110723%21sea%21US%210&curPageLogUid=8DsF5WaQ0luM&search_p4p_id=202306161110219138718064091540004380597_5, <br>olx: , <br>allegro: , <br>ID kategorii: 2, <br>Opis: Pełen zestaw, wraz ze specjalnymi prowadnicami, <br>ID statusu: 1', 'Name: Szkło hartowane 9H do iPhone 12 z czarnymi ramkami, <br>SKU: pn-1004, <br>Cena zakupu: 29.76, <br>Cena: 57.99, <br>Ilość: 3, <br>pn-1004.jpg, <br>źródło: https://www.aliexpress.us/item/3256805424784115.html, <br>olx: , <br>allegro: , <br>ID kategorii: 2, <br>Opis: Pełen zestaw, wraz ze specjalnymi prowadnicami, <br>ID statusu: 1', 1, 'Edycja produktu'),
(214, 1, '2023-07-03 08:52:24', 41, 'products', 'NULL', 'Nazwa: asd, <br>SKU:pn-1017, <br>Cena zakupu: asd, <br>Cena: asd, <br>Ilość: 0, pn-1017., <br>Źródło: asd, <br>ID kategorii: 1, <br>Opis: asd, <br>ID statusu: 3', 2, 'Dodano produkt'),
(215, 1, '2023-07-17 12:23:34', 1, 'products', 'Nazwa: Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 9, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, <br>olx: , <br>allegro: , <br>ID kategorii: 5, <br>Opis: , <br>ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 10, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, <br>olx: , <br>allegro: , <br>ID kategorii: 5, <br>Opis: , <br>ID statusu: 1', 1, 'Edycja produktu'),
(216, 1, '2023-07-17 12:24:11', 1, 'products', 'Nazwa: Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 10, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html?spm=a2g0o.productlist.main.3.4d1871af8i5yM0&algo_pvid=33181c55-2eff-4769-8db5-fc9cdd78ae61&algo_exp_id=33181c55-2eff-4769-8db5-fc9cdd78ae61-1&pdp_npi=3%40dis%21USD%214.71%213.53%21%21%21%21%21%402100bfe316869095759754328d0745%2112000033940295690%21sea%21US%210&curPageLogUid=uKU182GuWzxr, <br>olx: , <br>allegro: , <br>ID kategorii: 5, <br>Opis: , <br>ID statusu: 1', 'Name: Etui różowe na iPhone 14 Plus, <br>SKU: pn-1001, <br>Cena zakupu: 17.97, <br>Cena: 34.99, <br>Ilość: 10, <br>pn-1001.jpg, <br>źródło: https://www.aliexpress.us/item/3256805477811430.html, <br>olx: , <br>allegro: , <br>ID kategorii: 5, <br>Opis: , <br>ID statusu: 1', 1, 'Edycja produktu'),
(217, 1, '2023-07-30 08:13:18', 1, 'links', 'id: <br>nazwa: <br>opis: <br>icon_id: <br>link: ', 'id: 1<br>nazwa: <br>opis: <br>icon_id: <br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 2, 'Edytowano link'),
(218, 1, '2023-07-30 08:15:02', 1, 'links', 'id: 1<br>nazwa: <br>opis: <br>icon_id: 0<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: <br>opis: <br>icon_id: <br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 2, 'Edytowano link'),
(219, 1, '2023-07-30 08:15:24', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 2, 'Edytowano link'),
(220, 1, '2023-07-30 08:16:08', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(221, 1, '2023-07-30 08:17:37', 2, 'links', 'id: 2<br>nazwa: Dżapkowy<br>opis: Kto gdzie i kiedy<br>icon_id: 1<br>link: https://1drv.ms/x/s!AhFUBjjhPZ8_gohiiEiLCz3Hcm7wnA?e=bDpGLG', 'id: 2<br>nazwa: Dżapkowy<br>opis: Kto gdzie i kiedy i czemu<br>icon_id: 1<br>link: https://1drv.ms/x/s!AhFUBjjhPZ8_gohiiEiLCz3Hcm7wnA?e=bDpGLG', 1, 'Edytowano link'),
(222, 1, '2023-07-30 08:20:04', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(223, 1, '2023-07-30 08:20:41', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(224, 1, '2023-07-30 08:25:01', 4, 'user_status', '4, zbanowane, 2', '4, zbanowane, 1', 1, 'Zmodfikowano status użytkownika'),
(225, 1, '2023-07-30 08:25:17', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-06-20 10:41:11, 2', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 3', 1, 'Edytowano użytkownika'),
(226, 1, '2023-07-30 08:26:16', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-07-30 10:25:17, 3', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 2', 1, 'Edytowano użytkownika'),
(227, 1, '2023-07-30 08:27:53', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-07-30 10:26:16, 2', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 3', 1, 'Edytowano użytkownika'),
(228, 1, '2023-07-30 08:40:16', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(229, 1, '2023-07-30 08:48:45', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 1<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(230, 1, '2023-07-30 08:48:56', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 1<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(231, 1, '2023-07-30 08:49:02', 2, 'links', 'id: 2<br>nazwa: Dżapkowy<br>opis: Kto gdzie i kiedy i czemu<br>icon_id: 1<br>link: https://1drv.ms/x/s!AhFUBjjhPZ8_gohiiEiLCz3Hcm7wnA?e=bDpGLG', 'id: 2<br>nazwa: Dżapkowy<br>opis: Kto gdzie i kiedy i czemu<br>icon_id: 2<br>link: https://1drv.ms/x/s!AhFUBjjhPZ8_gohiiEiLCz3Hcm7wnA?e=bDpGLG', 1, 'Edytowano link'),
(232, 1, '2023-07-30 08:49:12', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 3<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 1<br>link: ', 1, 'Edytowano link'),
(233, 1, '2023-07-30 08:49:24', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 3<br>link: ', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 1<br>link: ', 1, 'Edytowano link'),
(234, 1, '2023-07-30 09:46:01', 6, 'links', 'NULL', 'id: 6<br>nazwa: Ważne!!!!!!!!!<br>opis: Tak jak w tytule<br>icon_id: 3<br>link: https://ui.gugisek.pl/', 2, 'Dodano link'),
(235, 1, '2023-07-30 09:47:18', 7, 'links', 'NULL', 'id: 7<br>nazwa: que<br>opis: que<br>icon_id: 2<br>link: ', 2, 'Dodano link'),
(236, 1, '2023-07-30 09:47:49', 8, 'links', 'NULL', 'id: 8<br>nazwa: que<br>opis: que<br>icon_id: 2<br>link: ', 2, 'Dodano link'),
(237, 1, '2023-07-30 09:47:57', 9, 'links', 'NULL', 'id: 9<br>nazwa: que<br>opis: que<br>icon_id: 2<br>link: ', 2, 'Dodano link'),
(238, 1, '2023-07-30 09:53:01', 10, 'links', 'NULL', 'id: 10<br>nazwa: es<br>opis: como<br>icon_id: 1<br>link: es', 2, 'Dodano link'),
(239, 1, '2023-07-30 09:55:46', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 1<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(240, 1, '2023-07-30 09:55:56', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 1<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(241, 1, '2023-07-31 12:26:55', 10, 'links', 'id: 10<br>nazwa: es<br>opis: como<br>icon_id: 1<br>link: es', 'NULL', 3, 'Usunięto link'),
(242, 1, '2023-07-31 12:44:12', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 1<br>link: ', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 3<br>link: ', 1, 'Edytowano link'),
(243, 1, '2023-07-31 12:45:21', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 3<br>link: ', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 3<br>link: https://youtube.com/', 1, 'Edytowano link'),
(244, 1, '2023-07-31 12:47:22', 11, 'links', 'NULL', 'id: 11<br>nazwa: Hej<br>opis: No hej<br>icon_id: 1<br>link: ', 2, 'Dodano link'),
(245, 1, '2023-07-31 12:57:41', 11, 'links', 'id: 11<br>nazwa: Hej<br>opis: No hej<br>icon_id: 1<br>link: ', 'NULL', 3, 'Usunięto link'),
(246, 1, '2023-07-31 13:22:51', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 4<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(247, 1, '2023-07-31 13:25:22', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 4<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 5<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(248, 1, '2023-07-31 13:34:08', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 3<br>link: https://youtube.com/', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(249, 1, '2023-07-31 13:37:44', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 5<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 7<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(250, 1, '2023-07-31 13:39:52', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 1<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 8<br>link: ', 1, 'Edytowano link'),
(251, 1, '2023-07-31 13:43:37', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 8<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 9<br>link: ', 1, 'Edytowano link'),
(252, 1, '2023-07-31 13:43:46', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 9<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 10<br>link: ', 1, 'Edytowano link'),
(253, 1, '2023-07-31 13:43:56', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 10<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 12<br>link: ', 1, 'Edytowano link'),
(254, 1, '2023-07-31 13:44:04', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 12<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 11<br>link: ', 1, 'Edytowano link'),
(255, 1, '2023-07-31 13:45:46', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 11<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 13<br>link: ', 1, 'Edytowano link'),
(256, 1, '2023-07-31 13:58:57', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 13<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 14<br>link: ', 1, 'Edytowano link'),
(257, 1, '2023-07-31 13:59:05', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 14<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 15<br>link: ', 1, 'Edytowano link'),
(258, 1, '2023-07-31 14:01:51', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 15<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 12<br>link: ', 1, 'Edytowano link'),
(259, 1, '2023-07-31 14:04:14', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 12<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 16<br>link: ', 1, 'Edytowano link'),
(260, 1, '2023-07-31 14:04:20', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 16<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 18<br>link: ', 1, 'Edytowano link'),
(261, 1, '2023-07-31 14:04:26', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 18<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 17<br>link: ', 1, 'Edytowano link'),
(262, 1, '2023-07-31 14:21:40', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 17<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 1, 'Edytowano link'),
(263, 1, '2023-07-31 14:28:39', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> Chciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> \r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 1, 'Edytowano link'),
(264, 1, '2023-07-31 14:32:51', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam <br/> \r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 1, 'Edytowano link'),
(265, 1, '2023-07-31 14:34:23', 12, 'links', 'NULL', 'id: 12<br>nazwa: Dodawanie produktu<br>opis: Dodaj produkt:\r\n- kliknij +\r\n- wpisz nazwę\r\n- wpisz opis\r\n- resztę sobie uzupełnij też\r\n\r\nFajny poradnik to jest,\r\nPozdrawiam<br>icon_id: 8<br>link: ', 2, 'Dodano link'),
(266, 1, '2023-07-31 14:36:03', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 19<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 15<br>link: ', 1, 'Edytowano link'),
(267, 1, '2023-07-31 14:37:19', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 15<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 20<br>link: ', 1, 'Edytowano link');
INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES
(268, 1, '2023-07-31 14:38:38', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx. <br/>\r\nWypełnianie arkusza rób po kolei: </br>\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. <br/>\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: <br/>\r\n”Lampka LED aRGB na USB”<br/>\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)<br/>\r\noraz krótka nazwa producenta i modelu jeśli występuje np:<br/>\r\n”ALLOYSEED”<br/>\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\n\r\nWypełnianie arkusza rób po kolei: \r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. \r\n\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: \r\n\r\n”Lampka LED aRGB na USB”\r\n\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\n\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(269, 1, '2023-07-31 14:40:52', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\n\r\nWypełnianie arkusza rób po kolei: \r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress. \r\n\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np: \r\n\r\n”Lampka LED aRGB na USB”\r\n\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\n\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.<br/>\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.<br/>\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!<br/>\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed)<br/> \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.<br/>\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.<br/>\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.<br/>\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.<br/>\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.<br/>\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n<br/><br/>\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.<br/>\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(270, 1, '2023-07-31 14:41:48', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(271, 1, '2023-07-31 14:42:33', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(272, 1, '2023-07-31 14:43:46', 5, 'links', 'id: 5<br>nazwa: Również bardzo ważna informacja odnośnie dodawania produktu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Dodawanie nowego produktu do arkusza<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 1, 'Edytowano link'),
(273, 1, '2023-07-31 14:44:22', 5, 'links', 'id: 5<br>nazwa: Dodawanie nowego produktu do arkusza<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 6<br>link: https://youtube.com/', 'id: 5<br>nazwa: Nowy produkt w arkuszu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 8<br>link: https://youtube.com/', 1, 'Edytowano link'),
(274, 1, '2023-07-31 14:44:51', 5, 'links', 'id: 5<br>nazwa: Nowy produkt w arkuszu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 8<br>link: https://youtube.com/', 'id: 5<br>nazwa: Nowy produkt w arkuszu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 8<br>link: https://onedrive.live.com/view.aspx?resid=3F9F3DE138065411%2127714', 1, 'Edytowano link'),
(275, 1, '2023-07-31 14:46:05', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 20<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 10<br>link: ', 1, 'Edytowano link'),
(276, 1, '2023-07-31 14:49:40', 5, 'links', 'id: 5<br>nazwa: Nowy produkt w arkuszu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 8<br>link: https://onedrive.live.com/view.aspx?resid=3F9F3DE138065411%2127714', 'id: 5<br>nazwa: Nowy produkt w arkuszu<br>opis: Koszty oraz cenę produktu wpisz w arkusz o nazwie RGBPC – produkty.xlsx.\r\nWypełnianie arkusza rób po kolei:\r\n\r\nNazwę wpisz która będzie widniała na stronie sklepu, nie bierz jej z aliexpress.\r\nZasadą w dawaniu nazw jest, aby wpierw było krótkie stwierdzenie jaki to produkt np:\r\n”Lampka LED aRGB na USB”\r\n (Jeśli występuje dużo podobnych produktów można dodać np. (…)na USB - C 5V lub (…) na USB muzyczna)\r\noraz krótka nazwa producenta i modelu jeśli występuje np:\r\n”ALLOYSEED”\r\n\r\nJeśli występuje w dwóch kolorach to nie dodawaj nazwy koloru w nazwę produktu, jeśli jest jeden dominujący kolor i brak wariantów to dodaj na końcu nazwy kolor.\r\nFinalna wersja nazwy produktu: Lampka LED aRGB na USB muzyczna ALLOYSEED.\r\n\r\nJeśli koszty zakupu wersji kolorystycznych różnią się znacznie to trzeba ująć je w oddzielnych pozycjach!\r\n\r\nSKU zasada jest, by ogólny człon nazwy (np. Lampka LED) napisać skrótem: La(mpka)L(ed) \r\nJeżeli występuje dużo produktów na których typ zaczyna się tą samą literą trzeba użyć drugiej małej litery! Np. Lampka Led (LaL) oraz Listwa Led (LiL)\r\noraz dodać rzecz wyróżniającą np. typ podświetlenia (RGB), nazwę wtyku (3PIN), długość (5m), typ diod (5050) itp.,\r\nna koniec dodać nazwę producenta lub modelu według producenta.\r\n\r\nJeżeli będzie za długie to skrócić nazwę producenta oraz aby ułatwić odczytanie nazwę producenta pisać małymi literami.\r\n\r\nFinalna wersja ogólnego SKU (nie dla wariantów!): LaLaRGBas.\r\n\r\nIlość minimum uzupełnij ilością produktu która się będzie minimalnie opłacała dodać na stronę, przeważnie dla wersji 2 kolorowych jest to np: 2 dla jednego koloru oraz 2 dla drugiego czyli wpiszę 4.\r\n\r\nIlość zamówiona jest to całkowita ilość produktu zamówiona pod nazwą wpisaną wcześniej.\r\n\r\nCena oryginalna obejmuje całkowite koszty poniesione na sztukę łącznie z kosztami dostaw podzielonymi na każdą sztukę.\r\n\r\n\r\nCena RGBpc.pl jest to cena końcowa dla klienta brutto uwzględniająca VAT, CIT, PIT oraz cenę produktu na allegro oraz innych sklepach komputerowych. Jeżeli to typowy chiński importowany produkt to sugeruj się ceną na allegro i daj ją widocznie (nie oznacza dużo) poniżej najniższej dostępnej ceny z wysyłką z Polski.\r\n\r\nMinimalna marża do 100 zł - 20%, powyżej 100 zł  - 10%, nie musisz sztywno trzymać się tych limitów.\r\n<br>icon_id: 22<br>link: https://onedrive.live.com/view.aspx?resid=3F9F3DE138065411%2127714', 1, 'Edytowano link'),
(277, 1, '2023-07-31 14:50:18', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 10<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 20<br>link: ', 1, 'Edytowano link'),
(278, 1, '2023-07-31 14:50:24', 3, 'links', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 20<br>link: ', 'id: 3<br>nazwa: Bardzo ważna informacja dla pracowników wszystkich<br>opis: Witam\r\nChciałbym poinformować o tym, że wypij wode po frytkach na parze, a wtedy prawda się okaże.<br>icon_id: 6<br>link: ', 1, 'Edytowano link'),
(279, 1, '2023-07-31 14:50:36', 12, 'links', 'id: 12<br>nazwa: Dodawanie produktu<br>opis: Dodaj produkt:\r\n- kliknij +\r\n- wpisz nazwę\r\n- wpisz opis\r\n- resztę sobie uzupełnij też\r\n\r\nFajny poradnik to jest,\r\nPozdrawiam<br>icon_id: 8<br>link: ', 'id: 12<br>nazwa: Dodawanie produktu<br>opis: Dodaj produkt:\r\n- kliknij +\r\n- wpisz nazwę\r\n- wpisz opis\r\n- resztę sobie uzupełnij też\r\n\r\nFajny poradnik to jest,\r\nPozdrawiam<br>icon_id: 21<br>link: ', 1, 'Edytowano link'),
(280, 1, '2023-07-31 14:50:59', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 7<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(281, 1, '2023-08-04 17:11:52', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 18<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(282, 1, '2023-08-04 17:12:15', 1, 'links', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 18<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 'id: 1<br>nazwa: Kalkulacja zarobków<br>opis: Tutaj jest arkusz w którym są szacunkowe przychody z rzeczy które możemy zamówić.<br>icon_id: 2<br>link: https://onedrive.live.com/edit.aspx?cid=3f9f3de138065411&page=view&resid=3F9F3DE138065411!27714&parId=3F9F3DE138065411!22396&app=Excel', 1, 'Edytowano link'),
(283, 1, '2023-08-04 17:12:29', 13, 'links', 'NULL', 'id: 13<br>nazwa: essa<br>opis: essa<br>icon_id: 7<br>link: ', 2, 'Dodano link'),
(284, 1, '2023-08-04 17:12:46', 13, 'links', 'id: 13<br>nazwa: essa<br>opis: essa<br>icon_id: 7<br>link: ', 'NULL', 3, 'Usunięto link'),
(285, 1, '2023-09-05 07:18:29', 14, 'links', 'NULL', 'id: 14<br>nazwa: esa<br>opis: es<br>icon_id: 5<br>link: ', 2, 'Dodano link'),
(286, 1, '2023-09-05 07:18:39', 14, 'links', 'id: 14<br>nazwa: esa<br>opis: es<br>icon_id: 5<br>link: ', 'NULL', 3, 'Usunięto link'),
(287, 1, '2023-10-01 10:33:38', 4, 'users', 'asd, asd, asd, 1, 2023-06-19 09:16:25, 2023-07-30 10:27:53, 3', 'asd, asd, asd, 1, 2023-06-19 09:16:25, current_timestamp(), 2', 1, 'Edytowano użytkownika'),
(288, 1, '2023-10-01 10:33:54', 3, 'users', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, 2023-06-20 09:53:34, 1', 'Kacper, Korus, 123kakor56@gmail.com, 2, 2023-06-15 20:56:58, current_timestamp(), 4', 1, 'Edytowano użytkownika'),
(289, 1, '2023-10-01 11:46:45', 1, 'user_roles', '1, admin, Full privilages for all', '1, 👑admin, Full privilages for all', 1, 'Zmodfikowano rolę użytkownika'),
(290, 1, '2023-10-01 11:47:11', 1, 'user_roles', '1, 👑admin, Full privilages for all', '1, admin👑, Full privilages for all', 1, 'Zmodfikowano rolę użytkownika'),
(291, 1, '2023-10-01 11:47:25', 2, 'user_roles', '2, magazynier, Only for update products, orders', '2, magazynier📦, Only for update products, orders', 1, 'Zmodfikowano rolę użytkownika'),
(292, 1, '2023-10-10 06:42:51', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Id roli: 1<br>, Data utworzenia: 2023-06-15 20:55:07<br>, Data modyfikacji: 2023-10-10 08:42:50<br>, Id status: 1', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: <br> Email: <br> Opis: XD<br> Adres: Płochociń 16<br> Id roli: <br>, Data utworzenia: <br>, Data modyfikacji: current_timestamp(), Id status: ', 1, 'Edytowano użytkownika'),
(293, 1, '2023-10-10 06:44:45', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxdxdxd<br> Adres: Płochociń 16<br> Id roli: 1<br>, Data utworzenia: 2023-06-15 20:55:07<br>, Data modyfikacji: 2023-10-10 08:44:45<br>, Id status: 1', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: <br> Email: <br> Opis: XDxdxdxd<br> Adres: Płochociń 16<br> Id roli: <br> Data utworzenia: <br> Data modyfikacji: current_timestamp() Id status: ', 1, 'Edytowano użytkownika'),
(294, 1, '2023-10-10 07:27:01', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxdxdxd<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 08:44:45', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxdxdxd<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano użytkownika'),
(295, 1, '2023-10-10 07:27:37', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 09:27:37', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano użytkownika'),
(296, 1, '2023-10-10 07:30:09', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 09:27:37', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxsxwsx<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano użytkownika'),
(297, 1, '2023-10-10 07:31:31', 3, 'users', 'Imię: Kacper<br> Drugie imię: <br> Nazwisko: Korus<br> Email: 123kakor56@gmail.com<br> Opis: <br> Adres: <br> Data modyfikacji: 2023-10-01 13:32:10', 'Imię: Kacper<br> Drugie imię: <br> Nazwisko: Korus<br> Email: 123kakor56@gmail.com<br> Opis: <br> Adres: Pod mostem XD<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(298, 1, '2023-10-10 08:06:17', 1, 'users', 'Rola: 1<br> Dział: 1<br> Stanowisko: 2<br> Data modyfikacji: ', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(299, 1, '2023-10-10 08:07:54', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 10:06:17', 'Rola: 1<br> Dział: 1<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(300, 1, '2023-10-10 08:53:41', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxsxwsx<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 10:07:54', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxsx<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(301, 1, '2023-10-10 09:06:06', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxsx<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 10:53:41', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxs<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika');
INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES
(302, 1, '2023-10-10 09:14:06', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsxs<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 11:06:04', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsx<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(303, 1, '2023-10-10 09:35:22', 1, 'users', 'Rola: 1<br> Dział: 1<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 11:14:06', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(304, 1, '2023-10-10 09:39:48', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 11:35:22', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(305, 1, '2023-10-10 09:40:47', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsx<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-10 11:39:48', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDxsx<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(306, 1, '2023-10-10 09:41:41', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: 2023-10-10 11:39:48', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(307, 1, '2023-10-10 09:49:46', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 11:41:41', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(308, 1, '2023-10-10 10:02:54', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: 2023-10-10 11:49:46', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(309, 1, '2023-10-10 10:09:40', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 12:02:53', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(310, 1, '2023-10-10 10:10:42', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: 2023-10-10 12:09:40', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(311, 1, '2023-10-10 10:12:54', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 12:10:42', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(312, 1, '2023-10-10 10:13:43', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: 2023-10-10 12:12:54', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(313, 1, '2023-10-10 10:15:09', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-10 12:13:43', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(314, 1, '2023-10-10 10:16:03', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: 2023-10-10 12:15:09', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(315, 1, '2023-10-14 14:00:23', 1, 'users', 'Status: 1', 'Status: 2', 1, 'Edytowano status użytkownika'),
(316, 1, '2023-10-14 14:03:01', 1, 'users', 'Status: 2', 'Status: 1', 1, 'Edytowano status użytkownika'),
(317, 1, '2023-10-14 14:04:47', 1, 'users', 'Rola: 1<br> Dział: 2<br> Stanowisko: 2<br> Data modyfikacji: 2023-10-14 16:03:01', 'Rola: 1<br> Dział: 2<br> Stanowisko: 1<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano role użytkownika'),
(318, 1, '2023-10-14 14:05:47', 4, 'users', 'Imię: asd<br> Drugie imię: <br> Nazwisko: asd<br> Email: asd<br> Opis: <br> Adres: <br> Data modyfikacji: 2023-10-01 13:28:04', 'Imię: asd<br> Drugie imię: <br> Nazwisko: asd<br> Email: asd<br> Opis: <br> Adres: <br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(319, 1, '2023-10-14 14:05:59', 1, 'users', 'Status: 1', 'Status: 1', 1, 'Edytowano status użytkownika'),
(320, 1, '2023-10-14 14:16:24', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDadasdasdsdfsdf<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-14 16:14:13', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDadasdasdsdfsdfasdfgngbdsfghf<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(321, 1, '2023-10-14 14:16:31', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDadasdasdsdfsdfasdfgngbdsfghf<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-14 16:16:24', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(322, 1, '2023-10-14 14:17:13', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-14 16:16:31', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDzxfdghj<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(323, 1, '2023-10-14 14:27:59', 1, 'users', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XDzxfdghj<br> Adres: Płochociń 16<br> Data modyfikacji: 2023-10-14 16:17:13', 'Imię: Gustaw<br> Drugie imię: Jerzy<br> Nazwisko: Sołdecki<br> Email: gugisek@gmail.com<br> Opis: XD<br> Adres: Płochociń 16<br> Data modyfikacji: current_timestamp()', 1, 'Edytowano dane personalne użytkownika'),
(324, 1, '2023-10-14 14:29:05', 4, 'users', 'Login: 688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'Login: 489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 1, 'Edytowano login użytkownika'),
(325, 1, '2023-10-14 14:29:38', 4, 'users', 'Login: 489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'Login: 688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 1, 'Edytowano login użytkownika'),
(326, 1, '2023-10-14 14:32:49', 4, 'users', 'Login: 688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'Login: 657f18518eaa2f41307895e18c3ba0d12d97b8a23c6de3966f52c6ba39a07ee4', 1, 'Edytowano login użytkownika'),
(327, 1, '2023-10-14 14:36:12', 4, 'users', 'Status: 2', 'Status: 1', 1, 'Edytowano status użytkownika'),
(328, 1, '2023-10-14 14:39:53', 4, 'users', 'Status: 1', 'Status: 2', 1, 'Edytowano status użytkownika'),
(329, 1, '2023-10-14 14:39:53', 4, 'users', 'Login: 657f18518eaa2f41307895e18c3ba0d12d97b8a23c6de3966f52c6ba39a07ee4', 'Login: b14369d34fcb01880a94f04118c20e872b89a73961815d9dfa8b3c851d0d5bac', 1, 'Edytowano login użytkownika'),
(330, 1, '2023-10-14 14:44:55', 4, 'users', 'Status: 2', 'Status: 1', 1, 'Edytowano status użytkownika'),
(331, 1, '2023-10-14 14:52:11', 4, 'users', 'Status: 1', 'Status: 2', 1, 'Edytowano status użytkownika'),
(332, 1, '2023-10-14 14:52:44', 4, 'users', 'Status: 2', 'Status: 3', 1, 'Edytowano status użytkownika'),
(333, 1, '2023-10-14 14:53:32', 4, 'users', 'Login: b14369d34fcb01880a94f04118c20e872b89a73961815d9dfa8b3c851d0d5bac', 'Login: 688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 1, 'Edytowano login użytkownika'),
(334, 1, '2023-10-14 14:54:04', 4, 'users', 'Status: 3', 'Status: 2', 1, 'Edytowano status użytkownika'),
(335, 1, '2023-10-14 14:54:20', 4, 'users', 'Status: 2', 'Status: 3', 1, 'Edytowano status użytkownika'),
(336, 1, '2023-10-14 14:55:01', 4, 'users', 'Hasło: 688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'Hasło: 657f18518eaa2f41307895e18c3ba0d12d97b8a23c6de3966f52c6ba39a07ee4', 1, 'Edytowano hasło użytkownika'),
(337, 1, '2023-10-14 14:58:19', 4, 'users', 'Hasło: 657f18518eaa2f41307895e18c3ba0d12d97b8a23c6de3966f52c6ba39a07ee4', 'Hasło: b14369d34fcb01880a94f04118c20e872b89a73961815d9dfa8b3c851d0d5bac', 1, 'Edytowano hasło użytkownika'),
(338, 1, '2023-10-14 15:01:25', 4, 'users', 'Login: 688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'Login: 489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 1, 'Edytowano login użytkownika'),
(339, 1, '2023-10-14 15:01:41', 4, 'users', 'Login: 489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3942ccb9555cf35', 'Login: 688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 1, 'Edytowano login użytkownika'),
(340, 1, '2023-10-14 15:01:41', 4, 'users', 'Hasło: b14369d34fcb01880a94f04118c20e872b89a73961815d9dfa8b3c851d0d5bac', 'Hasło: 688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 1, 'Edytowano hasło użytkownika'),
(341, 1, '2023-10-14 15:01:41', 4, 'users', 'Status: 3', 'Status: 1', 1, 'Edytowano status użytkownika'),
(342, 3, '2023-10-15 10:33:37', 0, 'users', 'Status: ', 'Status: 3', 1, 'Edytowano status użytkownika'),
(343, 3, '2023-10-15 10:33:56', 0, 'users', 'Hasło: ', 'Hasło: 657f18518eaa2f41307895e18c3ba0d12d97b8a23c6de3966f52c6ba39a07ee4', 1, 'Edytowano hasło użytkownika'),
(344, 3, '2023-10-15 10:33:56', 0, 'users', 'Status: ', 'Status: 1', 1, 'Edytowano status użytkownika'),
(345, 1, '2023-10-15 13:28:46', 3, 'users', '', 'Zdjęcie profilowe: 3-pp.png', 1, 'Zmieniono zdjęcie profilowe użytkownika'),
(346, 1, '2023-10-15 13:30:28', 3, 'users', ' ', 'Zdjęcie profilowe: 3-pp.jpg', 1, 'Zmieniono zdjęcie profilowe użytkownika'),
(347, 1, '2023-10-15 13:30:29', 3, 'users', ' ', 'Zdjęcie tła: 3-bp.gif', 1, 'Zmieniono zdjęcie tła użytkownika'),
(348, 1, '2023-10-15 14:14:49', 3, 'users', ' ', 'Zdjęcie profilowe: 3-pp.gif', 1, 'Zmieniono zdjęcie profilowe użytkownika'),
(349, 1, '2023-10-15 14:15:36', 3, 'users', ' ', 'Zdjęcie tła: 3-bp.gif', 1, 'Zmieniono zdjęcie tła użytkownika'),
(350, 1, '2023-10-16 08:40:29', 3, 'users', ' ', 'Zdjęcie tła: 3-bp.png', 1, 'Zmieniono zdjęcie tła użytkownika'),
(351, 1, '2023-10-16 17:45:54', 4, 'users', ' ', 'Zdjęcie tła: 4-bp.gif', 1, 'Zmieniono zdjęcie tła użytkownika'),
(352, 1, '2023-12-08 19:01:42', 6, 'schools', '', 'Nazwa: cvb<br/>Adres: cvb<br/>Miasto: cvb', 2, 'Dodano szkołę'),
(353, 1, '2023-12-08 19:15:10', 2, 'schools', 'Nazwa: asd<br/>Adres: asd<br/>Miasto: asd', 'Nazwa: asdsadfsa<br/>Adres: asd<br/>Miasto: asd', 1, 'Edytowano szkołę'),
(354, 1, '2023-12-08 19:15:14', 2, 'schools', 'Nazwa: asdsadfsa<br/>Adres: asd<br/>Miasto: asd', 'Nazwa: asdsadfsa<br/>Adres: asd<br/>Miasto: asd', 1, 'Edytowano szkołę'),
(355, 1, '2023-12-08 19:15:17', 2, 'schools', 'Nazwa: asdsadfsa<br/>Adres: asd<br/>Miasto: asd', 'Nazwa: asdsadfsa<br/>Adres: asd<br/>Miasto: asd', 1, 'Edytowano szkołę'),
(356, 1, '2023-12-08 19:15:20', 2, 'schools', 'Nazwa: asdsadfsa<br/>Adres: asd<br/>Miasto: asd', 'Nazwa: asdsadfsa<br/>Adres: asd<br/>Miasto: asd', 1, 'Edytowano szkołę'),
(357, 1, '2023-12-08 19:19:56', 2, 'schools', 'Nazwa: asdsadfsa<br/>Adres: asd<br/>Miasto: asd', 'Nazwa: Szkoła Podstawowa nr118 w warszawie<br/>Adres: asd<br/>Miasto: asd', 1, 'Edytowano szkołę'),
(358, 1, '2023-12-08 19:20:14', 2, 'schools', 'Nazwa: Szkoła Podstawowa nr118 w warszawie<br/>Adres: asd<br/>Miasto: asd', 'Nazwa: Szkoła Podstawowa nr 118 w warszawie<br/>Adres: myśliborska 18<br/>Miasto: warszawa', 1, 'Edytowano szkołę'),
(359, 1, '2023-12-08 20:24:11', 7, 'schools', '', 'Nazwa: asd<br/>Adres: asd<br/>Miasto: asd', 2, 'Dodano szkołę'),
(360, 1, '2023-12-08 20:27:04', 8, 'schools', '', 'Nazwa: fghj<br/>Adres: oij<br/>Miasto: okj', 2, 'Dodano szkołę'),
(361, 1, '2023-12-09 11:29:03', 3, 'schools', 'Nazwa: <br/>Adres: <br/>Miasto: ', '', 3, 'Usunięto szkołę'),
(362, 1, '2023-12-09 11:29:19', 3, 'schools', 'Nazwa: <br/>Adres: <br/>Miasto: ', '', 3, 'Usunięto szkołę'),
(363, 1, '2023-12-09 11:29:57', 3, 'schools', 'Nazwa: <br/>Adres: <br/>Miasto: ', '', 3, 'Usunięto szkołę'),
(364, 1, '2023-12-09 11:30:31', 3, 'schools', 'Nazwa: <br/>Adres: <br/>Miasto: ', '', 3, 'Usunięto szkołę'),
(365, 1, '2023-12-09 11:31:13', 4, 'schools', 'Nazwa: asdd<br/>Adres: asdd<br/>Miasto: asdd', '', 3, 'Usunięto szkołę'),
(366, 1, '2023-12-09 12:01:46', 5, 'schools', 'Nazwa: zxc<br/>Adres: zxc<br/>Miasto: zx', '', 3, 'Usunięto szkołę'),
(367, 1, '2023-12-09 12:01:50', 6, 'schools', 'Nazwa: cvb<br/>Adres: cvb<br/>Miasto: cvb', '', 3, 'Usunięto szkołę'),
(368, 1, '2023-12-09 12:01:54', 7, 'schools', 'Nazwa: asd<br/>Adres: asd<br/>Miasto: asd', '', 3, 'Usunięto szkołę'),
(369, 1, '2023-12-09 12:04:14', 8, 'schools', 'Nazwa: fghj<br/>Adres: oij<br/>Miasto: okj', 'Nazwa: fghj<br/>Adres: oijhuj<br/>Miasto: okj', 1, 'Edytowano szkołę'),
(370, 1, '2023-12-09 12:04:55', 8, 'schools', 'Nazwa: fghj<br/>Adres: oijhuj<br/>Miasto: okj', 'Nazwa: test<br/>Adres: oijhuj<br/>Miasto: okj', 1, 'Edytowano szkołę'),
(371, 1, '2023-12-09 13:41:53', 4, 'users', 'Imię: asd; Nazwisko: asd; Drugie imię: ; Mail: asd; Rola: 1; Status: 1; Opis: ; Szkoła: 2;', 'Imię: asd; Nazwisko: asd; Drugie imię: asd; Mail: asd; Rola: 1; Status: 1; Opis: ; Szkoła: 2;', 1, 'Edytowano użytkownika'),
(372, 1, '2023-12-09 13:42:35', 4, 'users', 'Imię: asd; Nazwisko: asd; Drugie imię: asd; Mail: asd; Rola: 1; Status: 1; Opis: ; Szkoła: 2;', 'Imię: asd; Nazwisko: asd; Drugie imię: asd; Mail: asd; Rola: 1; Status: 2; Opis: ; Szkoła: 2;', 1, 'Edytowano użytkownika'),
(373, 1, '2023-12-09 13:57:03', 4, 'users', 'Imię: asd; Nazwisko: asd; Drugie imię: asd; Mail: asd; Rola: 1; Status: 2; Opis: ; Szkoła: 2;', 'Imię: asd; Nazwisko: asd; Drugie imię: asd; Mail: asd; Rola: 1; Status: 2; Opis: ; Szkoła: 8;', 1, 'Edytowano użytkownika'),
(374, 1, '2023-12-09 13:57:27', 3, 'users', 'Imię: Kacper; Nazwisko: Korus; Drugie imię: ; Mail: 123kakor56@gmail.com; Rola: 2; Status: 4; Opis: ; Szkoła: 1;', 'Imię: Kacper; Nazwisko: Korus; Drugie imię: ; Mail: 123kakor56@gmail.com; Rola: 2; Status: 1; Opis: ; Szkoła: 1;', 1, 'Edytowano użytkownika'),
(375, 1, '2023-12-09 14:03:26', 4, 'users', 'Imię: asd; Nazwisko: asd; Drugie imię: asd; Mail: asd; Rola: 1; Status: 2; Opis: ; Szkoła: 8;', 'Imię: asd; Nazwisko: asd; Drugie imię: asd; Mail: asd; Rola: 1; Status: 1; Opis: ; Szkoła: 8;', 1, 'Edytowano użytkownika'),
(376, 1, '2023-12-09 14:03:59', 4, 'users', 'Imię: asd; Nazwisko: asd; Drugie imię: asd; Mail: asd; Rola: 1; Status: 1; Opis: ; Szkoła: 8;', 'Imię: asd; Nazwisko: asd; Drugie imię: asd; Mail: asd; Rola: 4; Status: 1; Opis: ; Szkoła: 8;', 1, 'Edytowano użytkownika'),
(377, 1, '2023-12-09 14:46:17', 5, 'users', '', 'Imię: Test; Nazwisko: test; Drugie imię: test; Mail: gugangster; Rola: 3; Status: 1; Opis: essa; Szkoła: 8;', 2, 'Dodano użytkownika'),
(378, 1, '2023-12-09 19:17:10', 12, 'users', '', 'Imię: xcv; Nazwisko: xc; Drugie imię: zxc; Mail: xcv; Rola: 1; Status: 2; Opis: xcv; Szkoła: 2;', 2, 'Dodano użytkownika'),
(379, 1, '2023-12-09 19:24:34', 14, 'users', '', 'Imię: huj; Nazwisko: huj; Drugie imię: huj; Mail: emai; Rola: 3; Status: 2; Opis: ; Szkoła: 8;', 2, 'Dodano użytkownika'),
(380, 1, '2023-12-09 19:25:05', 15, 'users', '', 'Imię: azxc; Nazwisko: zxc; Drugie imię: axzc; Mail: zxc; Rola: 2; Status: 2; Opis: ; Szkoła: 8;', 2, 'Dodano użytkownika'),
(381, 1, '2023-12-09 19:29:19', 5, 'users', 'Imię: Test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: gugangster<br/> Rola: 3; Status: 1<br/> Opis: essa<br/> Szkoła: 8', 'Imię: Test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: gugangster<br/> Rola: 3<br/> Status: 3<br/> Opis: essa<br/> Szkoła: 8;', 1, 'Edytowano użytkownika'),
(382, 1, '2023-12-09 19:30:21', 14, 'users', 'Imię: huj<br/> Nazwisko: huj<br/> Drugie imię: huj<br/> Mail: emai<br/> Rola: 3<br/> Status: 2<br/> Opis: <br/> Szkoła: 8', 'Imię: huj<br/> Nazwisko: huj<br/> Drugie imię: huj<br/> Mail: emai<br/> Rola: 3<br/> Status: 1<br/> Opis: <br/> Szkoła: 8;', 1, 'Edytowano użytkownika'),
(383, 1, '2023-12-09 19:46:06', 14, 'users', 'Imię: huj<br/> Nazwisko: huj<br/> Drugie imię: huj<br/> Mail: emai<br/> Rola: 3<br/> Status: 1<br/> Opis: <br/> Szkoła: 8', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(384, 1, '2023-12-09 20:16:08', 15, 'users', '', 'Login: 051db593c9445eedf8b840256e335cfaad494b2c0d9ee0b0ec58255120925049<br/> Hasło: ', 2, 'Zmieniono dane logowania'),
(385, 1, '2023-12-09 20:16:49', 15, 'users', '', 'Login: 051db593c9445eedf8b840256e335cfaad494b2c0d9ee0b0ec58255120925049<br/> Hasło: 1c75903328ae069246cad10879676634b1ce0b053dd0749fe3e3187c4c59d6f4', 1, 'Zmieniono dane logowania'),
(386, 1, '2023-12-09 20:18:00', 15, 'users', 'Imię: azxc<br/> Nazwisko: zxc<br/> Drugie imię: axzc<br/> Mail: zxc<br/> Rola: 2<br/> Status: 2<br/> Opis: <br/> Szkoła: 8', 'Imię: azxc<br/> Nazwisko: zxc<br/> Drugie imię: axzc<br/> Mail: zxc<br/> Rola: 2<br/> Status: 4<br/> Opis: <br/> Szkoła: 8;', 1, 'Edytowano użytkownika'),
(387, 1, '2023-12-09 20:26:33', 16, 'users', '', 'Imię: test <br/>Nazwisko: test <br/>Drugie imię: test <br/>Mail: test@test.pl <br/>Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 8;', 2, 'Dodano użytkownika'),
(388, 1, '2023-12-09 21:39:53', 17, 'users', 'Imię: <br/> Nazwisko: <br/> Drugie imię: <br/> Mail: <br/> Rola: 0<br/> Status: 1<br/> Opis: <br/> Szkoła: 4', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(389, 1, '2023-12-09 21:39:58', 18, 'users', 'Imię: <br/> Nazwisko: <br/> Drugie imię: <br/> Mail: <br/> Rola: 0<br/> Status: 2<br/> Opis: <br/> Szkoła: 4', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(390, 1, '2023-12-09 21:40:01', 19, 'users', 'Imię: <br/> Nazwisko: <br/> Drugie imię: <br/> Mail: <br/> Rola: 0<br/> Status: 2<br/> Opis: <br/> Szkoła: 3', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(391, 1, '2023-12-09 21:40:05', 20, 'users', 'Imię: Nie zweryfikowano<br/> Nazwisko: <br/> Drugie imię: <br/> Mail: pl@pl.pl<br/> Rola: 0<br/> Status: 2<br/> Opis: <br/> Szkoła: 4', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(392, 1, '2023-12-09 21:40:09', 21, 'users', 'Imię: Nie zweryfikowano<br/> Nazwisko: <br/> Drugie imię: <br/> Mail: cv@cv.pl<br/> Rola: 0<br/> Status: 2<br/> Opis: <br/> Szkoła: 3', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(393, 1, '2023-12-10 10:56:53', 2, 'invites', 'Kod: 420<br/>Rola: <br/>Szkoła: <br/>Użycia: 0', '', 3, 'Usunięto zaproszenie'),
(394, 1, '2023-12-10 10:57:10', 2, 'invites', 'Kod: <br/>Rola: <br/>Szkoła: <br/>Użycia: ', '', 3, 'Usunięto zaproszenie'),
(395, 1, '2023-12-10 10:57:52', 3, 'invites', 'Kod: 420<br/>Rola: 3<br/>Szkoła: 1<br/>Użycia: 0', '', 3, 'Usunięto zaproszenie'),
(396, 5, '2023-12-10 10:59:56', 23, 'users', '', 'Login: 027932ade49dbb6f1b758f69fd4944ce5d0357b76da003a766dedfa24b43daca<br/>Hasło: 3485639faf1591f3c16f295198e9389db5b33c949587ec48663597d4e00299d5<br/>Mail: pl@pl.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 4', 1, 'Dodano użytkownika'),
(397, 1, '2023-12-10 11:03:04', 23, 'users', 'Imię: Nie zweryfikowano<br/> Nazwisko: <br/> Drugie imię: <br/> Mail: pl@pl.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(398, 20, '2023-12-10 11:03:21', 24, 'users', '', 'Login: 027932ade49dbb6f1b758f69fd4944ce5d0357b76da003a766dedfa24b43daca<br/>Hasło: 3485639faf1591f3c16f295198e9389db5b33c949587ec48663597d4e00299d5<br/>Mail: pl@pl.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 4', 2, 'Dodano użytkownika'),
(399, 1, '2023-12-10 11:08:38', 25, 'users', '', 'Imię: test <br/>Nazwisko: test <br/>Drugie imię: test <br/>Mail: test@test.pl <br/>Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8;', 2, 'Dodano użytkownika'),
(400, 1, '2023-12-10 11:09:09', 8, 'schools', 'Nazwa: test<br/>Adres: oijhuj<br/>Miasto: okj', 'Nazwa: testTest<br/>Adres: oijhuj<br/>Miasto: okj', 1, 'Edytowano szkołę'),
(401, 1, '2023-12-10 11:12:49', 26, 'users', '', 'Imię: test <br/>Nazwisko: test <br/>Drugie imię: test <br/>Mail: test@test.pl <br/>Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8;', 2, 'Dodano użytkownika'),
(402, 1, '2023-12-10 11:12:55', 27, 'users', '', 'Imię: test <br/>Nazwisko: test <br/>Drugie imię: test <br/>Mail: test@test.pl <br/>Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8;', 2, 'Dodano użytkownika'),
(403, 1, '2023-12-10 11:13:34', 28, 'users', '', 'Imię: test <br/>Nazwisko: test <br/>Drugie imię: test <br/>Mail: test@test.pl <br/>Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8;', 2, 'Dodano użytkownika'),
(404, 1, '2023-12-10 11:15:12', 29, 'users', '', 'Imię: test <br/>Nazwisko: test <br/>Drugie imię: test <br/>Mail: test@test.pl <br/>Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8;', 2, 'Dodano użytkownika'),
(405, 1, '2023-12-10 11:16:15', 30, 'users', '', 'Imię: test <br/>Nazwisko: test <br/>Drugie imię: test <br/>Mail: test@test.pl <br/>Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8;', 2, 'Dodano użytkownika'),
(406, 1, '2023-12-10 11:16:48', 31, 'users', '', 'Imię: test <br/>Nazwisko: test <br/>Drugie imię: test <br/>Mail: test@test.pl <br/>Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8;', 2, 'Dodano użytkownika'),
(407, 1, '2023-12-10 11:19:06', 31, 'users', 'Imię: test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: test@test.pl<br/> Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8', 'Imię: test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: test@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 8;', 1, 'Edytowano użytkownika'),
(408, 1, '2023-12-10 11:19:19', 31, 'users', 'Imię: test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: test@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 8', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(409, 1, '2023-12-10 11:19:23', 30, 'users', 'Imię: test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: test@test.pl<br/> Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(410, 1, '2023-12-10 11:19:27', 29, 'users', 'Imię: test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: test@test.pl<br/> Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(411, 1, '2023-12-10 11:19:31', 28, 'users', 'Imię: test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: test@test.pl<br/> Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(412, 1, '2023-12-10 11:19:36', 27, 'users', 'Imię: test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: test@test.pl<br/> Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(413, 1, '2023-12-10 11:19:40', 26, 'users', 'Imię: test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: test@test.pl<br/> Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(414, 1, '2023-12-10 11:19:44', 25, 'users', 'Imię: test<br/> Nazwisko: test<br/> Drugie imię: test<br/> Mail: test@test.pl<br/> Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 8', 'Imię: deleted_user<br/> Nazwisko: deleted_user<br/> Drugie imię: deleted_user<br/> Mail: deleted_user<br/> Rola: 1<br/> Status: 1<br/> Opis: deleted_user<br/> Szkoła: 1<br/>', 3, 'Usunięto użytkownika'),
(415, 32, '2023-12-10 11:20:16', 32, 'users', '', 'Login: 6c161763c152322bb36ef27222d82f1803576564447ecc34211eaf1aab595ffc<br/>Hasło: 037aeaeaf4bbf26ddabe7256a8294dc52da48d575a1247b5c2598c47de7aebab<br/>Mail: op@op.op<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 4', 2, 'Dodano użytkownika'),
(416, 1, '2023-12-10 12:40:45', 0, 'invites', '', 'Kod: M4JQC2WC<br/>Rola: 2<br/>Szkoła: 1<br/>Użycia: 0/2', 1, 'Dodano zaproszenie'),
(417, 1, '2023-12-10 12:40:58', 4, 'invites', 'Kod: M4JQC2WC<br/>Rola: 2<br/>Szkoła: 1<br/>Użycia: 0', '', 3, 'Usunięto zaproszenie'),
(418, 1, '2023-12-10 12:41:32', 5, 'invites', '', 'Kod: 41MFQQ1V<br/>Rola: 4<br/>Szkoła: 1<br/>Użycia: 0/6', 2, 'Dodano zaproszenie'),
(419, 1, '2023-12-10 13:18:18', 6, 'invites', '', 'Kod: 8PS653GQ<br/>Rola: 3<br/>Szkoła: 1<br/>Użycia: 0/10', 2, 'Dodano zaproszenie'),
(420, 1, '2023-12-10 13:19:40', 7, 'invites', '', 'Kod: test<br/>Rola: 2<br/>Szkoła: 8<br/>Użycia: 0/2', 2, 'Dodano zaproszenie'),
(421, 22, '2023-12-10 13:48:31', 0, 'invitations', '2137<br/>vUżycia: 0', '2137<br/> Użycia: 1', 1, 'Wykorzystano kod zaproszenia'),
(422, 22, '2023-12-10 13:48:31', 22, 'users', '', 'Imię: imie<br/>Nazwisko: nazwisko<br/>Klasa: 1<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(423, 33, '2023-12-10 13:50:55', 33, 'users', '', 'Login: 40a1ebea054659feea6b98389a88919d8ac100e504e7f895aa814d5aa50daf62<br/>Hasło: 3485639faf1591f3c16f295198e9389db5b33c949587ec48663597d4e00299d5<br/>Mail: testuwa@pl.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 4', 2, 'Dodano użytkownika'),
(424, 33, '2023-12-10 13:51:51', 0, 'invitations', '2137<br/>vUżycia: 1', '2137<br/> Użycia: 2', 1, 'Wykorzystano kod zaproszenia'),
(425, 33, '2023-12-10 13:51:51', 33, 'users', '', 'Imię: testuwa<br/>Nazwisko: Nazwisko test<br/>Klasa: 1<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(426, 33, '2023-12-10 13:57:34', 0, 'invitations', '2137<br/>vUżycia: 2', '2137<br/> Użycia: 3', 1, 'Wykorzystano kod zaproszenia'),
(427, 33, '2023-12-10 13:57:34', 33, 'users', '', 'Imię: testuwa<br/>Nazwisko: Nazwisko test<br/>Klasa: 1<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(428, 34, '2023-12-10 14:00:35', 34, 'users', '', 'Login: 7dbe550c13ca20effc0beec23feef2a2c621f28d0ae023f45b3da9225d2dc198<br/>Hasło: 03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4<br/>Mail: uczen@test.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 4', 2, 'Dodano użytkownika'),
(429, 1, '2023-12-10 14:03:39', 8, 'invites', '', 'Kod: test_uczen<br/>Rola: 4<br/>Szkoła: 1<br/>Użycia: 0/10', 2, 'Dodano zaproszenie'),
(430, 34, '2023-12-10 14:04:45', 0, 'invitations', 'test_uczen<br/>vUżycia: 0', 'test_uczen<br/> Użycia: 1', 1, 'Wykorzystano kod zaproszenia'),
(431, 34, '2023-12-10 14:04:45', 34, 'users', '', 'Imię: przykładowy<br/>Nazwisko: uczen<br/>Klasa: 1<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(432, 1, '2023-12-10 16:38:01', 14, 'faq', 'Pytanie: ,<br/> Odpowiedź: ', ' ', 3, 'Usunięto pytanie'),
(433, 1, '2023-12-10 16:39:48', 15, 'faq', ' ', 'Pytanie: Jak się zarejestrować?,<br/> Odpowiedź: <p>Szybko.</p><p>Pozdrawiam,</p><p>Administrator</p>', 2, 'Dodano pytanie'),
(434, 1, '2023-12-10 16:40:04', 1, 'faq', 'Pytanie: ,<br/> Odpowiedź: ', ' ', 3, 'Usunięto pytanie'),
(435, 1, '2023-12-10 16:40:07', 2, 'faq', 'Pytanie: ,<br/> Odpowiedź: ', ' ', 3, 'Usunięto pytanie'),
(436, 1, '2023-12-10 16:40:09', 3, 'faq', 'Pytanie: ,<br/> Odpowiedź: ', ' ', 3, 'Usunięto pytanie'),
(437, 1, '2023-12-10 16:40:13', 4, 'faq', 'Pytanie: ,<br/> Odpowiedź: ', ' ', 3, 'Usunięto pytanie'),
(438, 1, '2023-12-10 16:40:16', 5, 'faq', 'Pytanie: ,<br/> Odpowiedź: ', ' ', 3, 'Usunięto pytanie'),
(439, 1, '2023-12-10 16:41:37', 16, 'faq', ' ', 'Pytanie: Czy moja szkoła jest w programie EduKorepetycje?,<br/> Odpowiedź: <p>Nie wiem, ale tu masz listę szkół które są:</p><p> - Zespół Szkół nr 14 w Warszawie</p>', 2, 'Dodano pytanie'),
(440, 1, '2023-12-10 16:43:10', 17, 'faq', ' ', 'Pytanie: Czy jest to darmowe?,<br/> Odpowiedź: <p>Dla ucznia i nauczyciela jest darmowe, jednak szkoła aby przystąpić do programu musi zapłacić.</p>', 2, 'Dodano pytanie'),
(441, 35, '2023-12-10 16:49:01', 35, 'users', '', 'Login: dc1451859c16cf5d6d08ffc16f20d6ddbd5765adea5e1852d14a573e740efc82<br/>Hasło: 03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4<br/>Mail: as@test.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 2', 2, 'Dodano użytkownika'),
(442, 1, '2023-12-10 16:51:50', 9, 'invites', '', 'Kod: adm<br/>Rola: 2<br/>Szkoła: 1<br/>Użycia: 0/2', 2, 'Dodano zaproszenie'),
(443, 35, '2023-12-10 16:57:55', 9, 'invitations', 'adm<br/>Użycia: 0', 'adm<br/> Użycia: 1', 1, 'Wykorzystano kod zaproszenia'),
(444, 35, '2023-12-10 16:57:55', 35, 'users', '', 'Imię: Administrator<br/>Nazwisko: szkoły<br/>Klasa: 0<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(445, 1, '2023-12-10 17:04:05', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1;', 1, 'Edytowano użytkownika'),
(446, 1, '2023-12-10 17:16:45', 4, 'users', 'Imię: asd<br/> Nazwisko: asd<br/> Drugie imię: asd<br/> Mail: asd<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 8<br/> Klasa: ;', 'Imię: asd<br/> Nazwisko: asd<br/> Drugie imię: asd<br/> Mail: asd@asd.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 0<br/> Klasa: ;', 1, 'Edytowano użytkownika'),
(447, 1, '2023-12-10 17:18:26', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 0<br/> Klasa: ;', 1, 'Edytowano użytkownika'),
(448, 1, '2023-12-10 17:19:14', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 0<br/> Klasa: 0;', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 0<br/> Klasa: ;', 1, 'Edytowano użytkownika'),
(449, 1, '2023-12-10 17:20:07', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 0<br/> Klasa: 0;', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 0<br/> Klasa: ;', 1, 'Edytowano użytkownika'),
(450, 1, '2023-12-10 17:20:55', 4, 'users', 'Imię: asd<br/> Nazwisko: asd<br/> Drugie imię: asd<br/> Mail: asd@asd.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 0;', 'Imię: asd<br/> Nazwisko: asd<br/> Drugie imię: asd<br/> Mail: asd@asd.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika'),
(451, 1, '2023-12-10 17:21:06', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 0;', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika'),
(452, 35, '2023-12-10 17:37:29', 4, 'users', 'Imię: asd<br/> Nazwisko: asd<br/> Drugie imię: asd<br/> Mail: asd@asd.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: asd<br/> Nazwisko: asd<br/> Drugie imię: asd<br/> Mail: asd@asd.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 2<br/> Klasa: 0;', 1, 'Edytowano użytkownika'),
(453, 35, '2023-12-10 17:41:03', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: przykładowyHuj<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika'),
(454, 35, '2023-12-10 17:41:14', 34, 'users', 'Imię: przykładowyHuj<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: przykładowyHuj<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 0;', 1, 'Edytowano użytkownika'),
(455, 35, '2023-12-10 17:41:32', 34, 'users', 'Imię: przykładowyHuj<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 0;', 'Imię: przykładowyHuj<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika'),
(456, 35, '2023-12-10 17:49:00', 34, 'users', 'Imię: przykładowyHuj<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 2<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 0;', 1, 'Edytowano użytkownika'),
(457, 35, '2023-12-10 17:50:08', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 0;', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika'),
(458, 35, '2023-12-10 18:01:42', 36, 'users', '', 'Imię: Adamium <br/>Nazwisko: Beczkum <br/>Drugie imię:  <br/>Mail: adam@test.pl <br/>Rola: 3<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 0;', 2, 'Dodano użytkownika'),
(459, 35, '2023-12-10 18:38:40', 1, 'invites', 'Kod: 2137<br/>Rola: 4<br/>Szkoła: 1<br/>Użycia: 3', '', 3, 'Usunięto zaproszenie'),
(460, 35, '2023-12-10 18:44:33', 10, 'invites', '', 'Kod: QASSD14J<br/>Rola: 4<br/>Szkoła: 1<br/>Użycia: 0/2', 2, 'Dodano zaproszenie'),
(461, 35, '2023-12-10 18:45:17', 11, 'invites', '', 'Kod: zs14_bajo_jajo<br/>Rola: 4<br/>Szkoła: 1<br/>Użycia: 0/100', 2, 'Dodano zaproszenie'),
(462, 35, '2023-12-10 19:16:23', 3, 'classes', '', 'Nazwa: 3a<br/>Profil: technik programista<br/>Rocznik: 2023/2024<br/>Szkoła: 1', 2, 'Dodano klasę'),
(463, 35, '2023-12-10 19:22:24', 4, 'classes', '', 'Nazwa: 5pi<br/>Profil: technik informatyk<br/>Rocznik: 2023/2024<br/>Szkoła: <br />\r\n<b>Warning</b>:  Undefined variable $school_id in <b>C:xampphtdocscompetition_apointments_zs14componentspaneladm_edit_class_popup.php</b> on line <b>39</b><br />\r\n', 2, 'Dodano klasę'),
(464, 35, '2023-12-10 19:28:24', 3, 'classes', 'Nazwa: 3a<br/>Profil: technik programista<br/>Rocznik: 2023/2024', 'Nazwa: 3aAAAA<br/>Profil: technik programista<br/>Rocznik: 2023/2024', 1, 'Edytowano klasę'),
(465, 35, '2023-12-10 19:29:09', 3, 'classes', 'Nazwa: 3aAAAA<br/>Profil: technik programista<br/>Rocznik: 2023/2024', 'Nazwa: pedały<br/>Profil: technik programista<br/>Rocznik: 2023/2024', 1, 'Edytowano klasę'),
(466, 35, '2023-12-10 19:29:16', 3, 'classes', 'Nazwa: pedały<br/>Profil: technik programista<br/>Rocznik: 2023/2024', 'Nazwa: 3a<br/>Profil: technik programista<br/>Rocznik: 2023/2024', 1, 'Edytowano klasę'),
(467, 35, '2023-12-10 19:31:43', 5, 'classes', '', 'Nazwa: test<br/>Profil: technik testowy<br/>Rocznik: 2045/2046<br/>Szkoła: 1', 2, 'Dodano klasę'),
(468, 35, '2023-12-10 19:31:52', 5, 'classes', 'Nazwa: test<br/>Profil: technik testowy<br/>Rocznik: 2045/2046', 'Nazwa: testTEST<br/>Profil: technik testowy<br/>Rocznik: 2045/2046', 1, 'Edytowano klasę'),
(469, 35, '2023-12-10 19:32:15', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 5;', 1, 'Edytowano użytkownika'),
(470, 35, '2023-12-10 19:34:22', 5, 'classes', 'Nazwa: testTEST<br/>Profil: technik testowy<br/>Rocznik: 2045/2046<br/>Szkoła: 1', '', 3, 'Usunięto klasę'),
(471, 35, '2023-12-10 19:34:45', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 5;', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika'),
(472, 37, '2023-12-11 08:49:23', 37, 'users', '', 'Login: bd86308dea63f28de4b87b17e8008ca00dac84cfeb5275f4fe8231c47f963271<br/>Hasło: 03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4<br/>Mail: xfd@xd.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 2', 2, 'Dodano użytkownika'),
(473, 37, '2023-12-11 08:50:49', 9, 'invitations', 'adm<br/>Użycia: 1', 'adm<br/> Użycia: 2', 1, 'Wykorzystano kod zaproszenia'),
(474, 37, '2023-12-11 08:50:49', 37, 'users', '', 'Imię: XD<br/>Nazwisko: XD<br/>Klasa: 1<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(475, 37, '2023-12-11 09:02:39', 3, 'przedmioty', 'Przedmiot: matematyka - rozszerzona<br/>Szkoła: 1', '', 3, 'Usunięto przedmioty'),
(476, 37, '2023-12-11 09:11:28', 4, 'przedmioty', '', 'Przedmiot: polski<br/>Szkoła: <br />\r\n<b>Warning</b>:  Undefined variable $school_id in <b>C:xampphtdocscompetition_apointments_zs14componentspanelprzedmiotyadd_popup.php</b> on line <b>28</b><br />\r\n', 2, 'Dodano przedmiot'),
(477, 37, '2023-12-11 09:13:23', 5, 'przedmioty', '', 'Przedmiot: polski<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(478, 37, '2023-12-11 09:13:59', 6, 'przedmioty', '', 'Przedmiot: matematyka - rozszerzona<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(479, 38, '2023-12-11 09:33:10', 38, 'users', '', 'Login: 027932ade49dbb6f1b758f69fd4944ce5d0357b76da003a766dedfa24b43daca<br/>Hasło: 3485639faf1591f3c16f295198e9389db5b33c949587ec48663597d4e00299d5<br/>Mail: pl@pl.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 4', 2, 'Dodano użytkownika'),
(480, 38, '2023-12-11 09:33:34', 8, 'invitations', 'test_uczen<br/>Użycia: 1', 'test_uczen<br/> Użycia: 2', 1, 'Wykorzystano kod zaproszenia'),
(481, 38, '2023-12-11 09:33:34', 38, 'users', '', 'Imię: pl<br/>Nazwisko: pl<br/>Klasa: 1<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(482, 35, '2023-12-11 09:37:14', 7, 'przedmioty', '', 'Przedmiot: kjnkj<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(483, 35, '2023-12-11 09:37:19', 7, 'przedmioty', 'Przedmiot: kjnkj<br/>Szkoła: 1', '', 3, 'Usunięto przedmiot'),
(484, 39, '2023-12-11 09:39:03', 39, 'users', '', 'Login: 513732f03c3984a0a5f6e5ed59f7cfea75953370b111b7bd1a986c0403f02634<br/>Hasło: 03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4<br/>Mail: nm@nm.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 2', 2, 'Dodano użytkownika'),
(485, 1, '2023-12-11 09:39:37', 12, 'invites', '', 'Kod: huj<br/>Rola: 2<br/>Szkoła: 1<br/>Użycia: 0/10', 2, 'Dodano zaproszenie'),
(486, 39, '2023-12-11 09:39:56', 12, 'invitations', 'huj<br/>Użycia: 0', 'huj<br/> Użycia: 1', 1, 'Wykorzystano kod zaproszenia'),
(487, 39, '2023-12-11 09:39:56', 39, 'users', '', 'Imię: huj<br/>Nazwisko: huj<br/>Klasa: 1<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(488, 39, '2023-12-11 10:13:33', 3, 'sale', '', 'Sala: 14<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(489, 39, '2023-12-11 10:14:04', 4, 'sale', '', 'Sala: gimnastyczna<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(490, 39, '2023-12-11 10:20:53', 4, 'sale', 'Sala: gimnastyczna<br/>Budynek: 1<br/>Szkoła: 1', '', 3, 'Usunięto sale'),
(491, 36, '2023-12-11 22:35:14', 36, 'users', 'Imię: Adamium<br/> Nazwisko: Beczkum<br/> Drugie imię: <br/> Mail: adam@test.pl<br/> Opis: ', 'Imię: Adamium<br/> Nazwisko: Beczkum<br/> Drugie imię: <br/> Mail: adam@test.pl<br/> Opis: fajny opis', 1, 'Edytowano profil'),
(492, 35, '2023-12-11 22:39:21', 8, 'przedmioty', '', 'Przedmiot: WF<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(493, 35, '2023-12-11 22:40:10', 9, 'przedmioty', '', 'Przedmiot: Bazy danych<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(494, 35, '2023-12-11 22:40:29', 10, 'przedmioty', '', 'Przedmiot: Tworzenie stron i aplikacji internetowych<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(495, 35, '2023-12-11 22:40:46', 11, 'przedmioty', '', 'Przedmiot: Witryny i aplikacje internetowe	<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(496, 35, '2023-12-12 16:13:47', 40, 'users', '', 'Imię: Jarosław <br/>Nazwisko: garbowski <br/>Drugie imię:  <br/>Mail: jaro@gmail.com <br/>Rola: 3<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 0;', 2, 'Dodano użytkownika'),
(497, 35, '2023-12-12 16:19:11', 12, 'invites', 'Kod: huj<br/>Rola: 2<br/>Szkoła: 1<br/>Użycia: 1', '', 3, 'Usunięto zaproszenie'),
(498, 35, '2023-12-12 16:19:14', 11, 'invites', 'Kod: zs14_bajo_jajo<br/>Rola: 4<br/>Szkoła: 1<br/>Użycia: 0', '', 3, 'Usunięto zaproszenie'),
(499, 35, '2023-12-12 16:19:16', 10, 'invites', 'Kod: QASSD14J<br/>Rola: 4<br/>Szkoła: 1<br/>Użycia: 0', '', 3, 'Usunięto zaproszenie'),
(500, 35, '2023-12-12 16:19:20', 9, 'invites', 'Kod: adm<br/>Rola: 2<br/>Szkoła: 1<br/>Użycia: 2', '', 3, 'Usunięto zaproszenie'),
(501, 35, '2023-12-12 16:19:29', 5, 'invites', 'Kod: 41MFQQ1V<br/>Rola: 4<br/>Szkoła: 1<br/>Użycia: 0', '', 3, 'Usunięto zaproszenie'),
(502, 35, '2023-12-12 16:19:39', 6, 'invites', 'Kod: 8PS653GQ<br/>Rola: 3<br/>Szkoła: 1<br/>Użycia: 0', '', 3, 'Usunięto zaproszenie'),
(503, 35, '2023-12-12 16:19:52', 13, 'invites', '', 'Kod: test_nauczyciel<br/>Rola: 3<br/>Szkoła: 1<br/>Użycia: 0/5', 2, 'Dodano zaproszenie'),
(504, 35, '2023-12-12 16:20:07', 14, 'invites', '', 'Kod: test_adm<br/>Rola: 2<br/>Szkoła: 1<br/>Użycia: 0/2', 2, 'Dodano zaproszenie'),
(505, 35, '2023-12-12 16:20:37', 5, 'sale', '', 'Sala: 2<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(506, 35, '2023-12-12 16:20:44', 6, 'sale', '', 'Sala: 3<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(507, 35, '2023-12-12 16:20:51', 7, 'sale', '', 'Sala: 4<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(508, 35, '2023-12-12 16:20:58', 8, 'sale', '', 'Sala: 5<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(509, 35, '2023-12-12 16:21:28', 9, 'sale', '', 'Sala: 6<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(510, 35, '2023-12-12 16:21:37', 10, 'sale', '', 'Sala: 34<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(511, 35, '2023-12-12 16:21:44', 11, 'sale', '', 'Sala: 35<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(512, 35, '2023-12-12 16:22:32', 12, 'sale', '', 'Sala: 19<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(513, 35, '2023-12-12 16:22:54', 13, 'sale', '', 'Sala: 36<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(514, 35, '2023-12-12 16:23:01', 14, 'sale', '', 'Sala: 21<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(515, 35, '2023-12-12 16:23:09', 15, 'sale', '', 'Sala: 22<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(516, 35, '2023-12-12 16:23:40', 16, 'sale', '', 'Sala: 34g<br/>Budynek: 2<br/>Szkoła: 1', 2, 'Dodano sale'),
(517, 35, '2023-12-12 16:25:32', 12, 'przedmioty', '', 'Przedmiot: język angielski<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(518, 35, '2023-12-12 16:25:38', 5, 'przedmioty', 'Przedmiot: polski<br/>Szkoła: 1', '', 3, 'Usunięto przedmiot'),
(519, 35, '2023-12-12 16:25:46', 13, 'przedmioty', '', 'Przedmiot: język polski<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(520, 35, '2023-12-12 16:26:04', 14, 'przedmioty', '', 'Przedmiot: język angielski zawodowy<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(521, 35, '2023-12-12 16:26:18', 15, 'przedmioty', '', 'Przedmiot: język niemiecki<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(522, 35, '2023-12-12 16:26:33', 16, 'przedmioty', '', 'Przedmiot: systemy baz danych<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(523, 35, '2023-12-12 16:26:58', 17, 'przedmioty', '', 'Przedmiot: Witryny i aplikacje internetowe<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(524, 35, '2023-12-12 16:27:04', 17, 'przedmioty', 'Przedmiot: Witryny i aplikacje internetowe<br/>Szkoła: 1', '', 3, 'Usunięto przedmiot'),
(525, 35, '2023-12-12 16:27:19', 18, 'przedmioty', '', 'Przedmiot: Wychowanie fizyczne<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(526, 35, '2023-12-12 16:27:32', 17, 'sale', '', 'Sala: sg1<br/>Budynek: 1<br/>Szkoła: 1', 2, 'Dodano sale'),
(527, 35, '2023-12-12 16:28:36', 6, 'classes', '', 'Nazwa: 1a<br/>Profil: technik programista<br/>Rocznik: 2023/2024<br/>Szkoła: 1', 2, 'Dodano klasę'),
(528, 35, '2023-12-12 16:29:48', 7, 'classes', '', 'Nazwa: 4k<br/>Profil: technik informatyk<br/>Rocznik: 2023/2024<br/>Szkoła: 1', 2, 'Dodano klasę'),
(529, 35, '2023-12-12 16:30:17', 8, 'classes', '', 'Nazwa: 4i<br/>Profil: technik informatyk<br/>Rocznik: 2023/2024<br/>Szkoła: 1', 2, 'Dodano klasę'),
(530, 35, '2023-12-12 16:30:39', 9, 'classes', '', 'Nazwa: 3k<br/>Profil: technik informatyk<br/>Rocznik: 2023/2024<br/>Szkoła: 1', 2, 'Dodano klasę'),
(531, 35, '2023-12-12 16:31:01', 10, 'classes', '', 'Nazwa: 3i<br/>Profil: technik informatyk<br/>Rocznik: 2023/2024<br/>Szkoła: 1', 2, 'Dodano klasę'),
(532, 35, '2023-12-12 16:31:53', 11, 'classes', '', 'Nazwa: 2i<br/>Profil: technik informatyk<br/>Rocznik: 2023/2024<br/>Szkoła: 1', 2, 'Dodano klasę'),
(533, 35, '2023-12-12 16:32:31', 12, 'classes', '', 'Nazwa: 2a<br/>Profil: technik programista<br/>Rocznik: 2023/2024<br/>Szkoła: 1', 2, 'Dodano klasę'),
(534, 35, '2023-12-12 16:32:52', 13, 'classes', '', 'Nazwa: 1i<br/>Profil: technik informatyk<br/>Rocznik: 2023/2024<br/>Szkoła: 1', 2, 'Dodano klasę'),
(535, 41, '2023-12-13 18:52:11', 41, 'users', '', 'Login: e02e4bd085e2e3f6719d38cd2ad799b8dddb03e62e027446b4f51eb38c6c82b2<br/>Hasło: 03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4<br/>Mail: adm2@test.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 2', 2, 'Dodano użytkownika'),
(536, 41, '2023-12-13 18:54:10', 14, 'invitations', 'test_adm<br/>Użycia: 0', 'test_adm<br/> Użycia: 1', 1, 'Wykorzystano kod zaproszenia'),
(537, 41, '2023-12-13 18:54:10', 41, 'users', '', 'Imię: Administrator<br/>Nazwisko: Szkoły<br/>Klasa: 0<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(538, 41, '2023-12-13 18:56:58', 15, 'invites', '', 'Kod: ZC5DVZC1<br/>Rola: 2<br/>Szkoła: 1<br/>Użycia: 0/10', 2, 'Dodano zaproszenie'),
(539, 41, '2023-12-13 18:57:09', 15, 'invites', 'Kod: ZC5DVZC1<br/>Rola: 2<br/>Szkoła: 1<br/>Użycia: 0', '', 3, 'Usunięto zaproszenie'),
(540, 36, '2023-12-15 09:39:44', 4, 'korepetycje', '', 'Przedmiot: 10, Creator: 36, Max users: 3, Godzina: od 15:10 do 16:00, Data: 2023-12-21, Status: 1, Destiny: all, Room: , School: 1', 2, 'Dodano korepetycje'),
(541, 36, '2023-12-15 09:39:44', 5, 'korepetycje', '', 'Przedmiot: 10, Creator: 36, Max users: 3, Godzina: od 15:10 do 16:00, Data: 2023-12-21, Status: 1, Destiny: all, Room: , School: 1', 2, 'Dodano korepetycje'),
(542, 36, '2023-12-15 09:58:23', 6, 'korepetycje', '', 'Przedmiot: 8, Creator: 36, Max users: 10, Godzina: od 08:00 do 09:30, Data: 2023-12-18, Status: 1, Destiny: 2, 1, Room: , School: 1', 2, 'Dodano korepetycje'),
(543, 36, '2023-12-15 09:58:23', 7, 'korepetycje', '', 'Przedmiot: 8, Creator: 36, Max users: 10, Godzina: od 08:00 do 09:30, Data: 2023-12-25, Status: 1, Destiny: 2, 1, Room: , School: 1', 2, 'Dodano korepetycje'),
(544, 36, '2023-12-15 09:58:23', 8, 'korepetycje', '', 'Przedmiot: 8, Creator: 36, Max users: 10, Godzina: od 08:00 do 09:30, Data: 2024-01-01, Status: 1, Destiny: 2, 1, Room: , School: 1', 2, 'Dodano korepetycje'),
(545, 36, '2023-12-15 10:03:37', 9, 'korepetycje', '', 'Przedmiot: 16, Creator: 36, Max users: 30, Godzina: od 14:00 do 15:00, Data: 2023-12-19, Status: 1, Destiny: 10, 8, 1, Room: 2, School: 1', 2, 'Dodano korepetycje'),
(546, 1, '2023-12-16 12:50:02', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: uczen<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: przykładowy<br/> Nazwisko: Piekarski<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika');
INSERT INTO `logs` (`id`, `user_id`, `when`, `object_id`, `object_type`, `before`, `after`, `type`, `description`) VALUES
(547, 1, '2023-12-16 12:50:20', 34, 'users', 'Imię: przykładowy<br/> Nazwisko: Piekarski<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: Maciej<br/> Nazwisko: Piekarski<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika'),
(548, 1, '2023-12-16 13:12:40', 38, 'users', 'Imię: pl<br/> Nazwisko: pl<br/> Drugie imię: <br/> Mail: pl@pl.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: Szymon<br/> Nazwisko: Karpiński<br/> Drugie imię: <br/> Mail: pl@pl.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika'),
(549, 36, '2023-12-16 13:46:31', 9, 'korepetycje', '', 'Status: 3<br/>, User: 38, Korepetycje: 9', 1, 'Wyrzucono ucznia z korepetycji'),
(550, 36, '2023-12-16 13:52:20', 9, 'korepetycje', '', 'Status: 3<br/>, User: 38, Korepetycje: 9', 1, 'Wyrzucono ucznia z korepetycji'),
(551, 36, '2023-12-16 14:03:30', 9, 'korepetycje', '', 'Status: 1<br/>, User: 38, Korepetycje: 9', 1, 'Przywrócono ucznia na korepetycje'),
(552, 36, '2023-12-16 14:03:38', 9, 'korepetycje', '', 'Status: 3<br/>, User: 38, Korepetycje: 9', 1, 'Wyrzucono ucznia z korepetycji'),
(553, 36, '2023-12-16 14:10:16', 10, 'korepetycje', '', 'Przedmiot: 10, Creator: 36, Max users: 10, Godzina: od 15:10 do 16:05, Data: 2023-12-19, Status: 1, Destiny: wszyscy, Room: 3, School: 1', 2, 'Dodano korepetycje'),
(554, 36, '2023-12-16 14:10:16', 11, 'korepetycje', '', 'Przedmiot: 10, Creator: 36, Max users: 10, Godzina: od 15:10 do 16:05, Data: 2023-12-26, Status: 1, Destiny: wszyscy, Room: 3, School: 1', 2, 'Dodano korepetycje'),
(555, 36, '2023-12-16 14:10:16', 12, 'korepetycje', '', 'Przedmiot: 10, Creator: 36, Max users: 10, Godzina: od 15:10 do 16:05, Data: 2024-01-02, Status: 1, Destiny: wszyscy, Room: 3, School: 1', 2, 'Dodano korepetycje'),
(556, 36, '2023-12-16 14:10:16', 13, 'korepetycje', '', 'Przedmiot: 10, Creator: 36, Max users: 10, Godzina: od 15:10 do 16:05, Data: 2024-01-09, Status: 1, Destiny: wszyscy, Room: 3, School: 1', 2, 'Dodano korepetycje'),
(557, 36, '2023-12-16 16:23:33', 9, 'korepetycje', '', 'Status: 1<br/>, User: 38, Korepetycje: 9', 1, 'Przywrócono ucznia na korepetycje'),
(558, 36, '2023-12-16 16:23:39', 9, 'korepetycje', '', 'Status: 3<br/>, User: 38, Korepetycje: 9', 1, 'Wyrzucono ucznia z korepetycji'),
(559, 36, '2023-12-16 16:29:43', 9, 'korepetycje', '', 'Status: 3<br/> User: 34 <br/> Korepetycje: 9', 1, 'Wyrzucono ucznia z korepetycji'),
(560, 36, '2023-12-16 16:40:14', 0, 'korepetycje', 'Przedmiot: 10 <br/> Creator: 36 <br/> Max users: 10 <br/> Godzina: od 15:10 do 16:05 <br/> Data: 2023-12-19 <br/> Status: 1 <br/> Destiny: wszyscy <br/> Room: 3 <br/> School: 1', '', 3, 'Usunięto korepetycje'),
(561, 36, '2023-12-16 16:41:11', 9, 'korepetycje', '', 'Status: 1<br/> User: 34 <br/> Korepetycje: 9', 1, 'Przywrócono ucznia na korepetycje'),
(562, 36, '2023-12-16 16:41:18', 9, 'korepetycje', '', 'Status: 3', 2, 'Odwołano korepetycje'),
(563, 36, '2023-12-16 16:56:10', 9, 'korepetycje', '', 'Status: 3', 2, 'Przywrócono korepetycje'),
(564, 36, '2023-12-16 16:56:17', 9, 'korepetycje', '', 'Status: 3', 2, 'Odwołano korepetycje'),
(565, 36, '2023-12-16 17:05:30', 9, 'korepetycje', '', 'Status: 3', 1, 'Przywrócono korepetycje'),
(566, 36, '2023-12-16 17:09:56', 9, 'korepetycje', 'Przedmiot: 16 <br/> Creator: 36 <br/> Max users: 30 <br/> Godzina: od 14:00 do 15:00 <br/> Data: 2023-12-19 <br/> Status: 1 <br/> Destiny: 10, 8, 1 <br/> Room: 2 <br/> School: 1', 'Przedmiot: 16 <br/> Creator:  <br/> Max users: 3 <br/> Godzina: od 14:00 do 15:00 <br/> Data: 2023-12-19 <br/> Status: 1 <br/> Destiny: 10, 8, 1 <br/> Room: 2 <br/> School: ', 1, 'Edytowano korepetycje'),
(567, 36, '2023-12-16 17:14:15', 14, 'korepetycje', '', 'Przedmiot: 8 <br/> Creator: 36 <br/> Max users: 5 <br/> Godzina: od 08:00 do 09:00 <br/> Data: 2023-12-18 <br/> Status: 1 <br/> Destiny: 1 <br/> Room: 17 <br/> School: 1', 2, 'Dodano korepetycje'),
(568, 35, '2023-12-16 17:16:48', 19, 'przedmioty', '', 'Przedmiot: fizyka<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(569, 35, '2023-12-16 17:16:55', 20, 'przedmioty', '', 'Przedmiot: chemia<br/>Szkoła: 1', 2, 'Dodano przedmiot'),
(570, 40, '2023-12-16 17:21:49', 15, 'korepetycje', '', 'Przedmiot: 9 <br/> Creator: 40 <br/> Max users: 20 <br/> Godzina: od 15:30 do 16:20 <br/> Data: 2023-12-20 <br/> Status: 1 <br/> Destiny: wszyscy <br/> Room: 10 <br/> School: 1', 2, 'Dodano korepetycje'),
(571, 40, '2023-12-16 17:21:49', 16, 'korepetycje', '', 'Przedmiot: 9 <br/> Creator: 40 <br/> Max users: 20 <br/> Godzina: od 15:30 do 16:20 <br/> Data: 2023-12-27 <br/> Status: 1 <br/> Destiny: wszyscy <br/> Room: 10 <br/> School: 1', 2, 'Dodano korepetycje'),
(572, 40, '2023-12-16 17:22:18', 16, 'korepetycje', 'Przedmiot: 9 <br/> Creator: 40 <br/> Max users: 20 <br/> Godzina: od 15:30 do 16:20 <br/> Data: 2023-12-27 <br/> Status: 1 <br/> Destiny: wszyscy <br/> Room: 10 <br/> School: 1', 'Przedmiot: 9 <br/> Creator:  <br/> Max users: 20 <br/> Godzina: od 15:30 do 16:20 <br/> Data: 2023-12-27 <br/> Status: 1 <br/> Destiny: wszyscy <br/> Room: 11 <br/> School: ', 1, 'Edytowano korepetycje'),
(573, 40, '2023-12-16 17:26:43', 17, 'korepetycje', '', 'Przedmiot: 2 <br/> Creator: 40 <br/> Max users: 10 <br/> Godzina: od 13:50 do 14:30 <br/> Data: 2023-12-14 <br/> Status: 1 <br/> Destiny: wszyscy <br/> Room: 10 <br/> School: 1', 2, 'Dodano korepetycje'),
(574, 40, '2023-12-16 17:26:43', 18, 'korepetycje', '', 'Przedmiot: 2 <br/> Creator: 40 <br/> Max users: 10 <br/> Godzina: od 13:50 do 14:30 <br/> Data: 2023-12-21 <br/> Status: 1 <br/> Destiny: wszyscy <br/> Room: 10 <br/> School: 1', 2, 'Dodano korepetycje'),
(575, 40, '2023-12-16 17:48:00', 40, 'users', 'Imię: Jarosław<br/> Nazwisko: garbowski<br/> Drugie imię: <br/> Mail: jaro@gmail.com<br/> Opis: ', 'Imię: Jarosław<br/> Nazwisko: garbowski<br/> Drugie imię: jaro<br/> Mail: jaro@gmail.com<br/> Opis: ', 1, 'Edytowano profil'),
(576, 40, '2023-12-16 18:10:11', 15, 'korepetycje', 'Przedmiot: 9 <br/> Creator: 40 <br/> Max users: 20 <br/> Godzina: od 15:30 do 16:20 <br/> Data: 2023-12-20 <br/> Status: 1 <br/> Destiny: wszyscy <br/> Room: 10 <br/> School: 1', '', 3, 'Usunięto korepetycje'),
(577, 40, '2023-12-16 18:10:16', 18, 'korepetycje', 'Przedmiot: 2 <br/> Creator: 40 <br/> Max users: 10 <br/> Godzina: od 13:50 do 14:30 <br/> Data: 2023-12-21 <br/> Status: 1 <br/> Destiny: wszyscy <br/> Room: 10 <br/> School: 1', '', 3, 'Usunięto korepetycje'),
(578, 40, '2023-12-16 18:10:21', 16, 'korepetycje', 'Przedmiot: 9 <br/> Creator: 40 <br/> Max users: 20 <br/> Godzina: od 15:30 do 16:20 <br/> Data: 2023-12-27 <br/> Status: 1 <br/> Destiny: wszyscy <br/> Room: 11 <br/> School: 1', '', 3, 'Usunięto korepetycje'),
(579, 35, '2023-12-16 19:07:17', 34, 'users', 'Imię: Maciej<br/> Nazwisko: Piekarski<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: Maciej<br/> Nazwisko: Piekarski<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika'),
(580, 35, '2023-12-16 19:07:56', 34, 'users', 'Imię: Maciej<br/> Nazwisko: Piekarski<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 4<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 'Imię: Maciej<br/> Nazwisko: Piekarski<br/> Drugie imię: <br/> Mail: uczen@test.pl<br/> Rola: 4<br/> Status: 1<br/> Opis: <br/> Szkoła: 1<br/> Klasa: 1;', 1, 'Edytowano użytkownika'),
(581, 42, '2023-12-16 19:08:16', 42, 'users', '', 'Login: 78dc7a7ff5869b24a10d695e4c9b8d3125640734dd2bbd321428fd02686cce34<br/>Hasło: 03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4<br/>Mail: jakub@test.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 4', 2, 'Dodano użytkownika'),
(582, 42, '2023-12-16 19:08:42', 8, 'invitations', 'test_uczen<br/>Użycia: 2', 'test_uczen<br/> Użycia: 3', 1, 'Wykorzystano kod zaproszenia'),
(583, 42, '2023-12-16 19:08:42', 42, 'users', '', 'Imię: Jakub<br/>Nazwisko: Strzelczak<br/>Klasa: 1<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(584, 43, '2023-12-16 19:09:51', 43, 'users', '', 'Login: 78dc7a7ff5869b24a10d695e4c9b8d3125640734dd2bbd321428fd02686cce34<br/>Hasło: 03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4<br/>Mail: jakub@test.pl<br/>Imię: Nie zweryfikowano<br/>Status: 2<br/>Szkoła: 1<br/>Rola: 4', 2, 'Dodano użytkownika'),
(585, 43, '2023-12-16 19:14:44', 8, 'invitations', 'test_uczen<br/>Użycia: 3', 'test_uczen<br/> Użycia: 4', 1, 'Wykorzystano kod zaproszenia'),
(586, 43, '2023-12-16 19:14:44', 43, 'users', '', 'Imię: Jakub<br/>Nazwisko: Strzelczak<br/>Klasa: 1<br/>Status: 1', 1, 'Dodano dodatkowe dane użytkownika'),
(587, 40, '2023-12-16 19:19:38', 19, 'korepetycje', '', 'Przedmiot: 2 <br/> Creator: 40 <br/> Max users: 15 <br/> Godzina: od 15:10 do 16:00 <br/> Data: 2023-12-20 <br/> Status: 1 <br/> Destiny: 2, 1 <br/> Room: 10 <br/> School: 1', 2, 'Dodano korepetycje'),
(588, 40, '2023-12-16 19:19:38', 20, 'korepetycje', '', 'Przedmiot: 2 <br/> Creator: 40 <br/> Max users: 15 <br/> Godzina: od 15:10 do 16:00 <br/> Data: 2023-12-27 <br/> Status: 1 <br/> Destiny: 2, 1 <br/> Room: 10 <br/> School: 1', 2, 'Dodano korepetycje'),
(589, 40, '2023-12-17 15:10:37', 21, 'korepetycje', '', 'Przedmiot: 11 <br/> Creator: 40 <br/> Max users: 10 <br/> Godzina: od 12:10 do 13:10 <br/> Data: 2023-12-18 <br/> Status: 1 <br/> Destiny: 6, 13 <br/> Room: 10 <br/> School: 1', 2, 'Dodano korepetycje'),
(590, 43, '2023-12-17 15:28:07', 7, 'zapisy', '', 'Korepetycja: 9 <br/> User: 43 <br/> Status: 1 <br/> Powod: przygotowanie do egzaminu', 1, 'Zapisano na korepetycje'),
(591, 43, '2023-12-17 15:33:37', 8, 'zapisy', '', 'Korepetycja: 19 <br/> User: 43 <br/> Status: 1 <br/> Powod: maturka', 1, 'Zapisano na korepetycje'),
(592, 40, '2023-12-17 15:36:32', 19, 'korepetycje', '', 'Status: 3<br/> User: 43 <br/> Korepetycje: 19', 1, 'Wyrzucono ucznia z korepetycji'),
(593, 43, '2023-12-17 16:02:28', 9, 'zapisy', '', 'Korepetycja: 21 <br/> User: 43 <br/> Status: 1 <br/> Powod: essa😎', 1, 'Zapisano na korepetycje'),
(594, 43, '2023-12-17 16:05:02', 10, 'zapisy', '', 'Korepetycja: 20 <br/> User: 43 <br/> Status: 1 <br/> Powod: meturka v2', 1, 'Zapisano na korepetycje'),
(595, 43, '2023-12-17 17:11:06', 21, 'zapisy', '', 'Korepetycja: 21 <br/> User: 43 <br/> Status: 2 <br/> Powod: Wypisano', 2, 'Wypisano z korepetycji'),
(596, 40, '2023-12-17 17:11:59', 20, 'korepetycje', '', 'Status: 3', 1, 'Odwołano korepetycje'),
(597, 43, '2023-12-17 17:24:18', 21, 'zapisy', '', 'Korepetycja: 21 <br/> User: 43 <br/> Status: 1 <br/> Powod: Wpisano', 1, 'Wpisano na korepetycje'),
(598, 43, '2023-12-17 17:25:59', 21, 'zapisy', '', 'Korepetycja: 21 <br/> User: 43 <br/> Status: 2 <br/> Powod: Wypisano', 2, 'Wypisano z korepetycji'),
(599, 43, '2023-12-17 17:26:04', 21, 'zapisy', '', 'Korepetycja: 21 <br/> User: 43 <br/> Status: 1 <br/> Powod: Wpisano', 1, 'Wpisano na korepetycje'),
(600, 40, '2023-12-17 17:29:31', 21, 'korepetycje', 'Przedmiot: 11 <br/> Creator: 40 <br/> Max users: 10 <br/> Godzina: od 12:10 do 13:10 <br/> Data: 2023-12-18 <br/> Status: 1 <br/> Destiny: 6, 13 <br/> Room: 10 <br/> School: 1', 'Przedmiot: 11 <br/> Creator:  <br/> Max users: 10 <br/> Godzina: od 12:10 do 13:10 <br/> Data: 2023-12-16 <br/> Status: 1 <br/> Destiny: 6, 13 <br/> Room: 10 <br/> School: ', 1, 'Edytowano korepetycje');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `log_types`
--

CREATE TABLE `log_types` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_types`
--

INSERT INTO `log_types` (`id`, `type`) VALUES
(1, 'modify'),
(2, 'create'),
(3, 'delete');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `przedmiot_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `przedmioty`
--

INSERT INTO `przedmioty` (`przedmiot_id`, `name`, `school_id`) VALUES
(1, 'matematyka', 1),
(2, 'informatyka', 1),
(4, 'polski', 0),
(6, 'matematyka - rozszerzona', 1),
(8, 'WF', 1),
(9, 'Bazy danych', 1),
(10, 'Tworzenie stron i aplikacji internetowych', 1),
(11, 'Witryny i aplikacje internetowe	', 1),
(12, 'język angielski', 1),
(13, 'język polski', 1),
(14, 'język angielski zawodowy', 1),
(15, 'język niemiecki', 1),
(16, 'systemy baz danych', 1),
(18, 'Wychowanie fizyczne', 1),
(19, 'fizyka', 1),
(20, 'chemia', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `build_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `name`, `school_id`, `build_id`) VALUES
(1, '12', 1, 1),
(2, '13', 1, 1),
(3, '14', 1, 1),
(5, '2', 1, 1),
(6, '3', 1, 1),
(7, '4', 1, 1),
(8, '5', 1, 1),
(9, '6', 1, 1),
(10, '34', 1, 1),
(11, '35', 1, 1),
(12, '19', 1, 1),
(13, '36', 1, 1),
(14, '21', 1, 1),
(15, '22', 1, 1),
(16, '34g', 1, 2),
(17, 'sg1', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `schools`
--

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `addres` varchar(400) NOT NULL,
  `city` varchar(200) NOT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `name`, `addres`, `city`, `logo`) VALUES
(1, 'Zespół Szkół nr 14 w Warszawie', 'Józefa Szanajcy 5', 'Warszawa', 'team_1profile.png'),
(2, 'Szkoła Podstawowa nr 118 w warszawie', 'myśliborska 18', 'warszawa', NULL),
(8, 'testTest', 'oijhuj', 'okj', 'team_8profile.gif');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `selected_przedmioty`
--

CREATE TABLE `selected_przedmioty` (
  `wybranie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `przedmiot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selected_przedmioty`
--

INSERT INTO `selected_przedmioty` (`wybranie_id`, `user_id`, `przedmiot_id`) VALUES
(37, 36, 9),
(38, 36, 2),
(39, 36, 14),
(40, 36, 16),
(41, 36, 10),
(42, 36, 8),
(43, 36, 11),
(44, 40, 9),
(45, 40, 2),
(46, 40, 16),
(47, 40, 10),
(48, 40, 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status_privileges`
--

CREATE TABLE `status_privileges` (
  `id` int(11) NOT NULL,
  `login` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_privileges`
--

INSERT INTO `status_privileges` (`id`, `login`, `description`) VALUES
(1, 1, 'Can log in'),
(2, 0, 'Can\'t log in');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `sec_name` text DEFAULT NULL,
  `sur_name` text NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `mail` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `profile_picture` varchar(50) DEFAULT NULL,
  `background_picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `sec_name`, `sur_name`, `pswd`, `mail`, `role_id`, `create_date`, `update_date`, `status_id`, `description`, `school_id`, `class_id`, `profile_picture`, `background_picture`) VALUES
(1, '0311f3c812ef6ce06fcea99380974f382743656c9421f9e57113ae22b1181dae', 'Gustaw', 'Jerzy', 'Sołdecki', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'gugisek@gmail.com', 1, '2023-06-15 20:55:07', '2023-12-09 13:56:04', 1, 'XD', 1, NULL, 'user_1profile.jpg', NULL),
(2, '03f03be21462b76ccb5fb7e5319ef1e6f44ac328cf1750b581fcb7710aec3d8a', 'Jakub', NULL, 'Strzelczak', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'kubastrzelczak@gmail.com', 1, '2023-06-15 20:56:36', '2023-10-01 11:27:10', 1, NULL, 2, NULL, NULL, NULL),
(3, 'c77f0e9e17b362249ecf5924db1d033a8e3eeb215c667dd91851d6d5a2cd26ad', 'Kacper', '', 'Korus', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '123kakor56@gmail.com', 2, '2023-06-15 20:56:58', '2023-12-09 13:57:27', 1, '', 1, NULL, 'user_3profile.gif', '3-bp.png'),
(4, '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'asd', 'asd', 'asd', '688787d8ff144c502c7f5cffaafe2cc588d86079f9de88304c26b0cb99ce91c6', 'asd@asd.pl', 4, '2023-06-19 09:16:25', '2023-12-10 17:37:29', 1, '', 2, 0, 'team_4profile.jpg', 'user_4bg.jpg'),
(34, '7dbe550c13ca20effc0beec23feef2a2c621f28d0ae023f45b3da9225d2dc198', 'Maciej', '', 'Piekarski', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'uczen@test.pl', 4, '2023-12-10 15:00:35', '2023-12-16 19:07:56', 1, '', 1, 1, 'user_34profile.jpg', 'user_34bg.jpg'),
(35, 'dc1451859c16cf5d6d08ffc16f20d6ddbd5765adea5e1852d14a573e740efc82', 'Administrator', NULL, 'szkoły', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'as@test.pl', 2, '2023-12-10 17:49:01', '2023-12-12 16:11:03', 1, NULL, 1, 0, 'user_35profile.png', NULL),
(36, 'dd05a105bd3898a6ad13409d6f864dea63ee1267b939d43b5078a60f8e9004f2', 'Adamium', '', 'Beczkum', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'adam@test.pl', 3, '2023-12-10 19:01:42', '2023-12-12 16:08:49', 1, 'fajny opis', 1, 0, 'user_36profile.jpg', 'user_36bg.jpg'),
(37, 'bd86308dea63f28de4b87b17e8008ca00dac84cfeb5275f4fe8231c47f963271', 'XD', NULL, 'XD', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'xfd@xd.pl', 2, '2023-12-11 09:49:23', '2023-12-11 08:50:49', 1, NULL, 1, 1, NULL, NULL),
(38, '027932ade49dbb6f1b758f69fd4944ce5d0357b76da003a766dedfa24b43daca', 'Szymon', '', 'Karpiński', '3485639faf1591f3c16f295198e9389db5b33c949587ec48663597d4e00299d5', 'pl@pl.pl', 4, '2023-12-11 10:33:10', '2023-12-16 13:12:40', 1, '', 1, 1, NULL, NULL),
(39, '513732f03c3984a0a5f6e5ed59f7cfea75953370b111b7bd1a986c0403f02634', 'huj', NULL, 'huj', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'nm@nm.pl', 2, '2023-12-11 10:39:03', '2023-12-11 09:39:56', 1, NULL, 1, 1, NULL, NULL),
(40, '158f1bb8d1427ba8164273eac0d39a774ca7556a68d8bfaf6e3721ffac6a8ecb', 'Jarosław', 'jaro', 'garbowski', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'jaro@gmail.com', 3, '2023-12-12 17:13:47', '2023-12-16 17:48:00', 1, '', 1, 0, 'user_40profile.jpg', 'user_40bg.jpg'),
(41, 'e02e4bd085e2e3f6719d38cd2ad799b8dddb03e62e027446b4f51eb38c6c82b2', 'Administrator', NULL, 'Szkoły', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'adm2@test.pl', 2, '2023-12-13 19:52:11', '2023-12-13 18:58:24', 1, NULL, 1, 0, NULL, 'user_41bg.gif'),
(43, '78dc7a7ff5869b24a10d695e4c9b8d3125640734dd2bbd321428fd02686cce34', 'Jakub', NULL, 'Strzelczak', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'jakub@test.pl', 4, '2023-12-16 20:09:51', '2023-12-16 19:14:44', 1, NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_class`
--

CREATE TABLE `user_class` (
  `class_id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `profile` varchar(150) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `rocznik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_class`
--

INSERT INTO `user_class` (`class_id`, `name`, `profile`, `school_id`, `rocznik`) VALUES
(1, '5pi', 'technik informatyk', 1, '2023/2024'),
(2, '5pd', 'technik geodeta', 1, '2023/2024'),
(3, '3a', 'technik programista', 1, '2023/2024'),
(4, '5pi', 'technik informatyk', 0, '2023/2024'),
(6, '1a', 'technik programista', 1, '2023/2024'),
(7, '4k', 'technik informatyk', 1, '2023/2024'),
(8, '4i', 'technik informatyk', 1, '2023/2024'),
(9, '3k', 'technik informatyk', 1, '2023/2024'),
(10, '3i', 'technik informatyk', 1, '2023/2024'),
(11, '2i', 'technik informatyk', 1, '2023/2024'),
(12, '2a', 'technik programista', 1, '2023/2024'),
(13, '1i', 'technik informatyk', 1, '2023/2024');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL,
  `description` text DEFAULT NULL,
  `dashboard` int(11) NOT NULL,
  `products` int(11) NOT NULL,
  `orders` int(11) NOT NULL,
  `outcome` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `accountancy` int(11) NOT NULL,
  `users` int(11) NOT NULL,
  `logs` int(11) NOT NULL,
  `settings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `description`, `dashboard`, `products`, `orders`, `outcome`, `income`, `accountancy`, `users`, `logs`, `settings`) VALUES
(1, 'administrator', 'Full privilages for all', 4, 4, 4, 4, 4, 4, 4, 4, 4),
(2, 'administrator szkoły', 'Zarządza nauczycielami i uczniami w danej szkole', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 'nauczyciel', 'Może tworzyć korepetycje', 4, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'uczeń', 'Może dołączać na korepetycje', 4, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_role_privileges`
--

CREATE TABLE `user_role_privileges` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role_privileges`
--

INSERT INTO `user_role_privileges` (`id`, `name`, `description`) VALUES
(1, 'read', 'only read'),
(2, 'edit', 'read and edit'),
(3, 'add', 'read, edit, add'),
(4, 'full', 'read, write, add, delete'),
(5, 'none', 'not allowed');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL,
  `privileges` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`, `privileges`, `color_id`) VALUES
(1, 'aktywne', 1, 2),
(2, 'nieaktywne', 1, 4),
(3, 'wyłączone', 2, 5),
(4, 'zbanowane', 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zapisy_korepetycje`
--

CREATE TABLE `zapisy_korepetycje` (
  `zapis_id` int(11) NOT NULL,
  `korepetycja_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `kiedy` datetime NOT NULL,
  `powod` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zapisy_korepetycje`
--

INSERT INTO `zapisy_korepetycje` (`zapis_id`, `korepetycja_id`, `users_id`, `status_id`, `kiedy`, `powod`) VALUES
(5, 9, 34, 1, '2023-12-16 13:46:18', 'poprawa sprawdzianu'),
(6, 9, 38, 3, '2023-12-16 14:11:20', 'poprawa kartkówki'),
(7, 9, 43, 1, '2023-12-17 16:28:07', 'przygotowanie do egzaminu'),
(8, 19, 43, 3, '2023-12-17 16:33:37', 'maturka'),
(9, 21, 43, 1, '2023-12-17 17:02:28', 'essa😎'),
(10, 20, 43, 1, '2023-12-17 17:05:02', 'meturka v2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zapisy_status`
--

CREATE TABLE `zapisy_status` (
  `status_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zapisy_status`
--

INSERT INTO `zapisy_status` (`status_id`, `name`) VALUES
(1, 'zapisany'),
(2, 'odwołany'),
(3, 'wyrzucony');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`build_id`);

--
-- Indeksy dla tabeli `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`invite_id`);

--
-- Indeksy dla tabeli `korepetycje`
--
ALTER TABLE `korepetycje`
  ADD PRIMARY KEY (`korepetycje_id`);

--
-- Indeksy dla tabeli `korepetycje_status`
--
ALTER TABLE `korepetycje_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeksy dla tabeli `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_fk0` (`user_id`),
  ADD KEY `logs_fk1` (`type`);

--
-- Indeksy dla tabeli `log_types`
--
ALTER TABLE `log_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`przedmiot_id`);

--
-- Indeksy dla tabeli `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indeksy dla tabeli `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indeksy dla tabeli `selected_przedmioty`
--
ALTER TABLE `selected_przedmioty`
  ADD PRIMARY KEY (`wybranie_id`);

--
-- Indeksy dla tabeli `status_privileges`
--
ALTER TABLE `status_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_fk0` (`role_id`),
  ADD KEY `users_fk1` (`status_id`),
  ADD KEY `login_2` (`login`);

--
-- Indeksy dla tabeli `user_class`
--
ALTER TABLE `user_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indeksy dla tabeli `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`) USING HASH;

--
-- Indeksy dla tabeli `user_role_privileges`
--
ALTER TABLE `user_role_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zapisy_korepetycje`
--
ALTER TABLE `zapisy_korepetycje`
  ADD PRIMARY KEY (`zapis_id`);

--
-- Indeksy dla tabeli `zapisy_status`
--
ALTER TABLE `zapisy_status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `build_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `invite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `korepetycje`
--
ALTER TABLE `korepetycje`
  MODIFY `korepetycje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `korepetycje_status`
--
ALTER TABLE `korepetycje_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT for table `log_types`
--
ALTER TABLE `log_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `przedmiot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `selected_przedmioty`
--
ALTER TABLE `selected_przedmioty`
  MODIFY `wybranie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `status_privileges`
--
ALTER TABLE `status_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_class`
--
ALTER TABLE `user_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role_privileges`
--
ALTER TABLE `user_role_privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `zapisy_korepetycje`
--
ALTER TABLE `zapisy_korepetycje`
  MODIFY `zapis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zapisy_status`
--
ALTER TABLE `zapisy_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
