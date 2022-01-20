-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Sty 2022, 10:52
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `flixgo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administratorzy`
--

CREATE TABLE `administratorzy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8mb4_polish_ci NOT NULL,
  `pass` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `administratorzy`
--

INSERT INTO `administratorzy` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE `filmy` (
  `id` int(11) NOT NULL,
  `tytul` text COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` text COLLATE utf8mb4_polish_ci NOT NULL,
  `gatunek` text COLLATE utf8mb4_polish_ci NOT NULL,
  `cena` float NOT NULL,
  `ocena` float NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`id`, `tytul`, `opis`, `gatunek`, `cena`, `ocena`, `img`) VALUES
(15, 'Joker', 'Historia jednego z cieszących się najgorszą sławą superprzestępców uniwersum DC — Jokera. Przedstawiony przez Phillipsa obraz śledzi losy kultowego czarnego charakteru, człowieka zepchniętego na margines. To nie tylko kontrowersyjne studium postaci, ale także opowieść ku przestrodze w szerszym kontekście.', 'Dramat', 34.99, 7.1, 'joker.jpg'),
(17, 'Blade Runner 2049', 'Minęło 30 lat od wydarzeń przedstawionych w filmie \"Łowca androidów\" Ridleya Scotta. Wtedy w 2019 roku agent Rick Deckard (Harrison Ford) ścigał w Los Angeles zbuntowane androidy z serii Nexus 6. Teraz w 2049 roku do akcji wkracza nowy Blade Runner, czyli łowca - oficer K (Ryan Gosling). Niespodziewanie funkcjonariusz odkrywa spisek, który może zniszczyć pozostałości dawnego porządku i społeczeństwa. Żeby uratować i tak już zrujnowany świat, K musi poprosić o pomoc Deckarda. Problem w tym, że Rick ukrywa się od czasu, gdy w 2019 roku uciekł z Los Angeles...', 'Film Sci-Fi', 39.99, 8.88, 'br2049.jpg'),
(19, 'Blade Runner', 'Film \"Łowca androidów\" opowiada historię Ricka Deckarda - jednego z Łowców Androidów. Replikanci, bo tak nazwano tych androidów, byli używani do niebezpiecznych badań i kolonizacji innych planet. Po krwawym buncie zespołu androidów na pozaziemskiej kolonii, Replikanci nie mogli przebywać legalnie na Ziemi. Byli oni owładnięci panicznym strachem przed nieuchronną śmiercią i za wszelką cenę starają się dotrzeć do ich konstruktorów - jedynych ludzi mogących przedłużyć ich życie. Replikanci zostali bowiem zabezpieczeni przed długotrwałym życiem ze względu na rozwijające się w nich uczucia. Specjalny oddział policji - tytułowi \"Łowcy Androidów\" - są detektywami, którzy mają za zadanie odnaleźć i wyeliminować zbiegłych androidów. Akcja rozgrywa się w Los Angeles w 2019 roku, gdy jeden z najlepszych Łowców zostaje ranny podczas wykonywania testu Voigta-Kampffa na jednym z androidów i właśnie Deckard przejmuje jego zadanie - wyeliminowanie zbiegłych androidów typu Nexus-6.', 'Film Sci-Fi', 28.99, 8.98, 'BR1.jpg'),
(20, 'Boże Ciało', 'Inspirowana prawdziwymi wydarzeniami historia 20-letniego Daniela, który w trakcie pobytu w poprawczaku przechodzi duchową przemianę i skrycie marzy, żeby zostać księdzem. Po kilku latach odsiadki chłopak zostaje warunkowo zwolniony, a następnie skierowany do pracy w zakładzie stolarskim. Zamiast tego jednak, popychany niemożliwym do spełnienia marzeniem, Daniel kieruje się do miejscowego kościoła, gdzie zaprzyjaźnia się z proboszczem. Kiedy, pod nieobecność duchownego, niespodziewanie nadarza się okazja, chłopak wykorzystuje ją i w przebraniu księdza zaczyna pełnić posługę kapłańską w miasteczku. Od początku jego metody ewangelizacji budzą kontrowersje wśród mieszkańców, szczególnie w oczach surowej kościelnej Lidii. Z czasem jednak nauki i charyzma fałszywego księdza zaczynają poruszać ludzi pogrążonych w tragedii, która wstrząsnęła lokalną społecznością kilka miesięcy wcześniej. Tymczasem w miasteczku pojawia się dawny kolega Daniela z poprawczaka, a córka kościelnej, Marta, coraz mocniej zaczyna kwestionować duchowość młodego księdza. Wszystko to sprawia, że chłopakowi grunt zaczyna palić się pod nogami. Rozdarty pomiędzy sacrum i profanum bohater znajduje jednak w swoim życiu nowy, ważny cel. Postanawia go zrealizować, nawet jeśli jego tajemnica miałaby wyjść na jaw...', 'Dramat', 19.99, 7.56, 'BC.jpg'),
(21, 'Gran Torino', 'Kiedy umiera żona Walta Kowalskiego, nikt już nie może wmówić mu, że świat jest dobry. To była ostatnia osoba, która miała na niego pozytywny wpływ. Według Walta, wszystko co młode, nie-amerykańskie i mało trzymające się jakiegokolwiek kodeksu, jest złe i nie powinno się tego tolerować. Więc kiedy do sąsiedniego domu wprowadzają się \"żółtki\", czyli emigranci z południowo-wschodniej Azji, Walt zaczyna się niecierpliwić, ba, wręcz okazuje nienawiść swoim nowym sąsiadom. A do tego jeden z nich, młody chłopak, pod naciskiem miejscowego gangu, próbuje ukraść jego cenny wóz, tytułowego Forda Gran Torino. Jednak pewnego dnia Walt obroni rodzinę sąsiadów przed owym gangiem i postanowi nauczyć młodego Azjatę, jak ktoś taki jak on może przeżyć w USA...', 'Dramat', 24.99, 8.44, 'grantorino.jpg'),
(28, 'Taksówkarz', 'Akcja filmu rozgrywa się w Nowym Jorku, rodzinnym mieście reżysera. Bohaterem jest Travis Bickle (Robert De Niro), który po powrocie z Wietnamu zatrudnia się jako nocny taksówkarz, obsługując trudne trasy w dzielnicach pełnych podłych lokali rozrywkowych, rojących się od prostytutek, alfonsów i różnych podejrzanych typów. Travis czuje się samotny, upodlony i pełen sprzeczności. Ten świat pełen nieprawości jednocześnie go pociąga i odpycha, fascynuje i napawa obrzydzeniem. Próbuje przełamać swą alienację i powrócić do normalnego społeczeństwa, ale w rezultacie utwierdza się w przekonaniu o powszechności zła. Powoli narasta w nim pełen gorączki gniew i przekonanie o misji rozprawienia się ze społeczną degrengoladą...', 'Dramat', 23.99, 7.9, 'taksowkarz.jpg'),
(29, 'Dobry Zły i Brzydki', 'Akcja filmu toczy się w Stanach Zjednoczonych podczas wojny secesyjnej i jest oparta na losach trzech rewolwerowców. Tuco Ramirez („Brzydki”) jest niebezpiecznym przestępcą poszukiwanym listem gończym, który w początkowej sekwencji ucieka trzem łowcom nagród. Sadystyczny, płatny zabójca o pseudonimie Anielskie Oczka[a] („Zły”) dowiaduje się od swoich informatorów o żołnierzu ukrywającym się pod pseudonimem Bill Carson, który zdezerterował wraz z licznymi kosztownościami. Anielskie Oczka jest bezwzględny i nie waha się przed zabiciem swych informatorów. Bezimienny rewolwerowiec o pseudonimie Blondas[a] („Dobry”) zajmuje się chwytaniem pospolitych przestępców dla zysku.', 'Western', 9.99, 6.89, 'dzib.jpg'),
(30, 'The Lighthouse', 'Stara latarnia morska położona gdzieś na krańcu końca rozpoznawalnego świata, a w środku kamień, pustka i duchy przeszłości, które widziały i słyszały już wszystko co ludzkie. Dwóch mężczyzn, którzy mają spędzić w tym miejscu kolejne cztery żmudne tygodnie, doglądając własnej poczytalności i światła wskazującego drogę tym, którzy poszukują go na wzburzonych wodach. Pierwszy z nich ma na imię Tom i jest mężczyzną hardym i nieustępliwym, byłym człowiekiem morza, który dorobił się bolesnej kontuzji nogi. Drugi, Ephraim, jest znacznie młodszy i - przynajmniej z początku - bardziej otwarty, jednak dręczy go jakaś tajemnica, która sprawiła, że wybrał odosobnienie w latarni morskiej zamiast pracy przy wycince drzew. Gdy izolacja od świata zewnętrznego daje o sobie znać, obaj mężczyźni, każdy z nich skrzywiony przez życie na dziesiątki różnych sposobów, zostają zmuszeni, by stawić czoła swym demonom, podczas gdy otaczający ich świat rzeczywisty zaczyna tonąć w morzu surrealistycznej frustracji. Tylko pomocnego światła nigdzie nie widać.', 'Horror', 34.99, 7.55, 'lighthouse.jpg'),
(31, 'John Wick', 'Żona byłego płatnego zabójcy Johna Wicka (Keanu Reeves) umiera na nieuleczalną chorobę. W dniu pogrzebu John dostaje przesyłkę zawierającą ostatni prezent od ukochanej - szczeniaka o imieniu Daisy. Kiedy następnego dnia zatrzymuje się na stacji benzynowej, zostaje zaczepiony przez kilku mężczyzn. Jeden z nich chce odkupić należącego do Johna zabytkowego Mustanga, ten jednak odmawia. Wieczorem ci sami ludzie włamują się do jego domu, pozbawiają go przytomności, kradną samochód i zabijają Daisy. Po przebudzeniu John ustala, że sprawcą jego nieszczęścia jest Iosef (Alfie Allen), syn Viggo Tarasova (Michael Nyqvist), szefa działającej w Nowym Jorku rosyjskiej mafii. Wick postanawia wrócić do branży i dokonać zemsty. Viggo, który korzystał w przeszłości z usług Johna, wyznacza nagrodę za jego głowę.', 'Film akcji', 17.99, 6.7, 'johnwick.jpg'),
(32, 'Shrek', 'Animacja komputerowa zrealizowana na podstawie powieści dla dzieci autorstwa Wiliama Steiga. Tytułowy Shrek jest brzydkim, zielonym ogrem, mieszkającym samotnie gdzieś na baśniowym bagnie. Pewnego dnia na jego terytorium przybywają postacie z rozmaitych bajek i zakłócają jego spokój. Aby uwolnić się od nieproszonych gości Shrek wyrusza na spotkanie ze sprawcą całego zamieszania - złym lordem Farquaadem. Okazuje się, że czeka tam na niego trudne zadanie. Aby odzyskać ziemię musi ocalić z łap smoka uroczą księżniczkę i całą i zdrową sprowadzić do królestwa Farquaadema, aby ten mógł ją poślubić.', 'Film animowany', 21.37, 10, 'shrek.jpg'),
(33, 'Drive', 'Nieznany z imienia młody kierowca (Ryan Gosling) jest kaskaderem filmowym. W nocy natomiast pomaga przestępcom uciekać z miejsc zbrodni, wykorzystując swoje ponadprzeciętne zdolności prowadzenia samochodu. Jego życie musi przez cały czas toczyć się na najwyższych obrotach. Mimo bezustannej jazdy na krawędzi wydaje się on całkowicie niewzruszony. Milczący, wiecznie spokojny i opanowany nie okazuje żadnych emocji, które jednak skumulowane w żywiącym się adrenaliną głównym bohaterze muszą kiedyś znaleźć ujście. Wtedy pojawia się Irene (Carey Mulligan), która odmieni jego życie na zawsze...', 'Film akcji', 24.99, 9.78, 'drive.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinie`
--

CREATE TABLE `opinie` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8mb4_polish_ci NOT NULL,
  `text` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pomoc`
--

CREATE TABLE `pomoc` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `tresc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `awatar` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `awatar`) VALUES
(17, 'admin', '$2y$10$vqTJqbIkOfOOww5tacxX1ei1D3msL0BpLSvXpknImd2WfJbmjuOxK', 'admin@admin.pl', 'chomik.jpg'),
(25, 'User', '$2y$10$SEt85U2vAGCbEqomlSW0B.D3a2V.5zDxWbe5mrm.ENwpYK0HwhEyS', 'user@test.pl', 'lis.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `id_filmu` int(11) NOT NULL,
  `test` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `opinie`
--
ALTER TABLE `opinie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pomoc`
--
ALTER TABLE `pomoc`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `filmy`
--
ALTER TABLE `filmy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `opinie`
--
ALTER TABLE `opinie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `pomoc`
--
ALTER TABLE `pomoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
