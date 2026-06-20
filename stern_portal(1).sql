-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2026 at 10:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stern_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Matej', 'Žnidarić', 'pupat', '$2y$10$BK.6zOaUl/UOWRlkF8x7feTRCnPVm/3Z/X1F4YrULEwGn0AjoyIXW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` datetime NOT NULL DEFAULT current_timestamp(),
  `naslov` varchar(255) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `kategorija` varchar(50) NOT NULL,
  `arhiva` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '2026-06-20 22:07:43', 'Margrethe Vestager lässt die Liberalen hoffen – und Trump zittern', 'Danska povjerenica Margrethe Vestager ponovno se nasla u središtu europske politike nakon niza izjava koje su otvorile pitanja o buducnosti liberalnih opcija u Europskoj uniji i njihovom odnosu prema globalnim populistickim trendovima.', 'Margrethe Vestager posljednjih je godina izgradila prepoznatljiv politicki profil kao jedna od najvidljivijih europskih liberalnih politicarki. Njezini nastupi i odluke redovito izazivaju pozornost, ne samo unutar institucija Europske unije nego i izvan Europe, osobito u Sjedinjenim Americkim Drzavama.\r\n\r\nNakon novih javnih istupa u kojima je naglasila potrebu za jacom i samostalnijom europskom politikom, brojni analiticari poceli su je promatrati kao simbol otpora populistickim i autoritarnijim modelima upravljanja. Upravo zato njezino ime sve cesce dolazi u fokus kada se govori o buducnosti liberalnog centra u Europi.\r\n\r\nPodrska koju dobiva od dijela proeuropski orijentirane javnosti temelji se na dojmu da predstavlja kombinaciju politicke cvrstine, institucionalnog iskustva i komunikacijske jasnoce. U vremenu kada se europska politika sve cesce lomi izmedu jacanja nacionalnih interesa i potrebe za zajednickim odgovorima, takav profil mnogi biraci smatraju privlacnim.\r\n\r\nIstodobno, kriticari upozoravaju da se simbolicka snaga pojedinacnih imena ne smije zamijeniti stvarnim utjecajem na raspolozenje biraca. Ipak, ostaje cinjenica da Vestager za mnoge predstavlja ideju Europe koja zeli djelovati odlucno, tehnoloski samostalno i politicki neovisno.', 'assets/img/uploads/margrethe.jpg', 'politika', 0),
(2, '2026-06-20 22:07:43', 'Einwanderung: Trump will mehr total brillante Leute und weniger Familienmitglieder', 'Rasprava o useljavanju ponovno je postala jedna od najosjetljivijih politickih tema nakon izjava da bi prednost pri dolasku trebali imati visokoobrazovani i gospodarski pozeljni pojedinci, a ne clanovi obitelji vec prisutnih useljenika.\r\n', 'itanje useljavanja vec desetljecima predstavlja jedno od kljucnih politickih, gospodarskih i sigurnosnih pitanja u zapadnim demokracijama. Svaka promjena retorike ili prijedlog reforme vrlo brzo izazivaju snazne reakcije javnosti, osobito kada se u raspravu uvede kriterij pozeljnosti pojedinih skupina useljenika.\r\n\r\nIdeja da drzava treba davati prednost obrazovanima, visokokvalificiranima i gospodarski konkurentnima nije nova. Zagovornici takvog modela tvrde da useljavanje treba uskladiti s potrebama trzista rada, tehnoloskog razvoja i dugorocne konkurentnosti nacionalnog gospodarstva. Prema toj logici, prednost bi imali kandidati koji odmah mogu doprinijeti gospodarstvu i javnim financijama.\r\n\r\nS druge strane, protivnici takvog pristupa upozoravaju da se time zanemaruje ljudska dimenzija migracija. Obiteljsko povezivanje dugo se smatralo jednim od temeljnih nacela migracijske politike u mnogim drzavama, upravo zato sto doprinosi stabilnosti, integraciji i drustvenoj koheziji.\r\n\r\nRasprava se zato ne vodi samo o administrativnim pravilima, nego i o tome kakvo drustvo neka drzava zeli biti. Treba li prednost imati ekonomska korisnost ili pravo ljudi da zive zajedno sa svojim obiteljima? Upravo na tom pitanju i dalje se lome najdublje podjele unutar suvremenih migracijskih politika.', 'assets/img/uploads/trump.jpg', 'politika', 0),
(3, '2026-06-20 22:07:43', 'Entscheidung über E-Roller - darum gehts im Bundesrat', 'Elektricni romobili vec neko vrijeme izazivaju podijeljena misljenja, a nova rasprava o pravilima njihova koristenja otvorila je pitanja sigurnosti, odgovornosti u prometu i prilagodbe gradova novim oblicima mobilnosti.\r\n', 'Elektricni romobili u kratkom su roku postali simbol urbanog prijevoza nove generacije. Jedni ih vide kao prakticno i ekoloski prihvatljivo rjesenje za kratke gradske relacije, dok ih drugi smatraju izvorom dodatnog nereda i sigurnosnih rizika na javnim povrsinama.\r\n\r\nRazlog zbog kojeg se o njima sve cesce raspravlja na politickoj razini lezi u cinjenici da njihovo siroko koristenje nije bilo praceno jednako brzim prilagodbama zakona i prometne infrastrukture. Pitanja poput maksimalne brzine, obvezne opreme, kretanja nogostupom ili biciklistickom stazom te odgovornosti u slucaju nesrece i dalje izazivaju prijepore.\r\n\r\nZagovornici sire uporabe romobila isticu da gradovima trebaju fleksibilni i lagani oblici prijevoza koji mogu smanjiti prometne guzve i ovisnost o automobilima. Posebno u vecim urbanim sredinama, romobili se predstavljaju kao dio sirih politika odrzive mobilnosti.\r\n\r\nMedutim, kriticari upozoravaju da se bez jasnih pravila i nadzora povecava broj opasnih situacija, posebno za pjesake, starije osobe i djecu. Rasprava o romobilima zato nije samo tehnicko prometno pitanje, nego i pitanje odnosa grada prema javnom prostoru, sigurnosti i kvaliteti svakodnevnog zivota.', 'assets/img/uploads/e-roller.jpg', 'politika', 0),
(4, '2026-06-20 22:07:43', 'Abnehmen durch Sport und richtige Ernährung - Antworten auf häufige Fragen', 'Strucnjaci vec dugo naglasavaju da odrzivo mrsavljenje ne ovisi o kratkotrajnim dijetama, nego o dugorocnoj promjeni zivotnih navika, pravilnoj prehrani i redovitoj tjelesnoj aktivnosti.\r\n', 'Mnogi ljudi potragu za boljom tjelesnom formom i zdravijim zivotom zapocinju naglo, kroz stroge dijete i intenzivne planove vjezbanja. Iako takvi pristupi ponekad kratkorocno daju vidljive rezultate, dugorocno se najcesce pokazuju tesko odrzivima.\r\n\r\nOsnovno pravilo zdravog mrsavljenja nije odricanje od svega, nego stvaranje ravnoteze izmedu unosa energije, kvalitete hrane i kretanja. Upravo zato nutricionisti i lijecnici sve cesce govore o promjeni navika, a ne o privremenim rjesenjima. Cilj nije samo izgubiti kilograme, nego razviti obrazac ponasanja koji se moze zadrzati mjesecima i godinama.\r\n\r\nRedovita tjelesna aktivnost pritom ne mora znaciti iscrpljujuce treninge. Za mnoge ljude vec i brzo hodanje, voznja bicikla, lagano trcanje ili vjezbe kod kuce mogu biti dovoljan pocetak. Najvaznije je da se aktivnost uklopi u svakodnevni raspored i postane redovit dio zivota.\r\n\r\nJednako je vazna i prehrana. Uravnotezen jelovnik, dovoljno vode, kontroliran unos industrijski preradene hrane i veci udio svjezih namirnica cesto daju bolje rezultate od popularnih restriktivnih dijeta. Dugorocno, zdravlje se ne gradi ekstremima, nego dosljednoscu.', 'assets/img/uploads/abnehmen.jpg', 'zdravlje', 0),
(5, '2026-06-20 22:07:43', 'Menschen in einer Parallelwelt, die nur einen Steinwurf entfernt liegt', 'Izložba \"No Borders – Grenzgang\" prikazuje život ljudi koji žive uz granice država te svakodnevne izazove s kojima se susreću. Fotografije i osobne priče otkrivaju kako granice utječu na identitet, slobodu kretanja i međuljudske odnose.\r\n', 'Nova izložba pod nazivom \"No Borders – Grenzgang\" privukla je velik broj posjetitelja zainteresiranih za teme migracija, identiteta i života uz državne granice. Autori kroz fotografije i dokumentarne zapise prikazuju svakodnevicu ljudi koji žive svega nekoliko kilometara jedni od drugih, ali ih administrativne i političke prepreke često razdvajaju.\r\n\r\nPosebna pažnja posvećena je osobnim pričama stanovnika pograničnih područja koji se svakodnevno susreću s različitim zakonima, kulturama i običajima. Mnogi od njih rade u jednoj državi, a žive u drugoj, što dodatno oblikuje njihov način života.\r\n\r\nOrganizatori ističu kako je cilj izložbe potaknuti raspravu o važnosti međusobnog razumijevanja i suradnje među ljudima bez obzira na nacionalne granice. Posjetitelji imaju priliku upoznati iskustva pojedinaca čije životne priče često ostaju nevidljive široj javnosti.\r\n\r\nIzložba ostaje otvorena do kraja mjeseca, a očekuje se dolazak brojnih škola, studenata i drugih zainteresiranih posjetitelja.\r\n', 'assets/img/uploads/menschen.jpg', 'zdravlje', 0),
(6, '2026-06-20 22:07:43', 'Mein Foto auf stern.de', 'Stern pokreće novu akciju u kojoj čitatelji mogu poslati svoje fotografije prirode, putovanja i svakodnevnog života. Najbolji radovi bit će objavljeni na portalu i društvenim mrežama.\r\n', 'Portal Stern pozvao je svoje čitatelje da sudjeluju u novoj fotografskoj akciji pod nazivom \"Mein Foto auf stern.de\". Cilj projekta je prikazati svijet iz perspektive običnih ljudi te pružiti priliku amaterskim fotografima da predstave svoj rad široj publici.\r\n\r\nSudionici mogu slati fotografije krajolika, gradova, životinja, kulturnih događanja ili zanimljivih trenutaka iz svakodnevnog života. Stručni žiri svakog će tjedna odabrati nekoliko najboljih fotografija koje će biti objavljene na službenim stranicama portala.\r\n\r\nOrganizatori ističu kako kvaliteta profesionalne opreme nije presudna te da se najveća vrijednost nalazi u kreativnosti i originalnosti autora. Fotografije mogu biti snimljene mobilnim telefonom ili profesionalnim fotoaparatom.\r\n\r\nNajuspješniji autori osvojit će simbolične nagrade, a njihove fotografije bit će predstavljene u posebnoj online galeriji dostupnoj svim posjetiteljima portala. Tako Stern želi dodatno uključiti svoju zajednicu i promovirati kreativno izražavanje kroz fotografiju.', 'assets/img/uploads/foto.jpg', 'zdravlje', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
