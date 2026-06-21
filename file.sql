CREATE DATABASE IF NOT EXISTS stern_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci;
USE stern_portal;

DROP TABLE IF EXISTS korisnik;
DROP TABLE IF EXISTS vijesti;

CREATE TABLE vijesti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    datum DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    naslov VARCHAR(255) NOT NULL,
    sazetak TEXT NOT NULL,
    tekst TEXT NOT NULL,
    slika VARCHAR(255) NOT NULL,
    kategorija VARCHAR(50) NOT NULL,
    arhiva TINYINT(1) NOT NULL DEFAULT 0
);

CREATE TABLE korisnik (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(50) NOT NULL,
    prezime VARCHAR(50) NOT NULL,
    korisnicko_ime VARCHAR(50) NOT NULL UNIQUE,
    lozinka VARCHAR(255) NOT NULL,
    razina TINYINT(1) NOT NULL DEFAULT 0
);

INSERT INTO vijesti (naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES
(
    'Margrethe Vestager lässt die Liberalen hoffen – und Trump zittern',
    'Danska povjerenica Margrethe Vestager ponovno se nasla u središtu europske politike nakon niza izjava koje su otvorile pitanja o buducnosti liberalnih opcija u Europskoj uniji i njihovom odnosu prema globalnim populistickim trendovima.',
    'Margrethe Vestager posljednjih je godina izgradila prepoznatljiv politicki profil kao jedna od najvidljivijih europskih liberalnih politicarki. Njezini nastupi i odluke redovito izazivaju pozornost, ne samo unutar institucija Europske unije nego i izvan Europe, osobito u Sjedinjenim Americkim Drzavama.

Nakon novih javnih istupa u kojima je naglasila potrebu za jacom i samostalnijom europskom politikom, brojni analiticari poceli su je promatrati kao simbol otpora populistickim i autoritarnijim modelima upravljanja. Upravo zato njezino ime sve cesce dolazi u fokus kada se govori o buducnosti liberalnog centra u Europi.

Podrska koju dobiva od dijela proeuropski orijentirane javnosti temelji se na dojmu da predstavlja kombinaciju politicke cvrstine, institucionalnog iskustva i komunikacijske jasnoce. U vremenu kada se europska politika sve cesce lomi izmedu jacanja nacionalnih interesa i potrebe za zajednickim odgovorima, takav profil mnogi biraci smatraju privlacnim.

Istodobno, kriticari upozoravaju da se simbolicka snaga pojedinacnih imena ne smije zamijeniti stvarnim utjecajem na raspolozenje biraca. Ipak, ostaje cinjenica da Vestager za mnoge predstavlja ideju Europe koja zeli djelovati odlucno, tehnoloski samostalno i politicki neovisno.',
    'assets/img/uploads/vestager.jpg',
    'politika',
    0
),
(
    'Einwanderung: Trump will mehr total brillante Leute und weniger Familienmitglieder',
    'Rasprava o useljavanju ponovno je postala jedna od najosjetljivijih politickih tema nakon izjava da bi prednost pri dolasku trebali imati visokoobrazovani i gospodarski pozeljni pojedinci, a ne clanovi obitelji vec prisutnih useljenika.',
    'Pitanje useljavanja vec desetljecima predstavlja jedno od kljucnih politickih, gospodarskih i sigurnosnih pitanja u zapadnim demokracijama. Svaka promjena retorike ili prijedlog reforme vrlo brzo izazivaju snazne reakcije javnosti, osobito kada se u raspravu uvede kriterij pozeljnosti pojedinih skupina useljenika.

Ideja da drzava treba davati prednost obrazovanima, visokokvalificiranima i gospodarski konkurentnima nije nova. Zagovornici takvog modela tvrde da useljavanje treba uskladiti s potrebama trzista rada, tehnoloskog razvoja i dugorocne konkurentnosti nacionalnog gospodarstva. Prema toj logici, prednost bi imali kandidati koji odmah mogu doprinijeti gospodarstvu i javnim financijama.

S druge strane, protivnici takvog pristupa upozoravaju da se time zanemaruje ljudska dimenzija migracija. Obiteljsko povezivanje dugo se smatralo jednim od temeljnih nacela migracijske politike u mnogim drzavama, upravo zato sto doprinosi stabilnosti, integraciji i drustvenoj koheziji.

Rasprava se zato ne vodi samo o administrativnim pravilima, nego i o tome kakvo drustvo neka drzava zeli biti. Treba li prednost imati ekonomska korisnost ili pravo ljudi da zive zajedno sa svojim obiteljima? Upravo na tom pitanju i dalje se lome najdublje podjele unutar suvremenih migracijskih politika.',
    'assets/img/uploads/trump.jpg',
    'politika',
    0
),
(
    'Entscheidung über E-Roller - darum gehts im Bundesrat',
    'Elektricni romobili vec neko vrijeme izazivaju podijeljena misljenja, a nova rasprava o pravilima njihova koristenja otvorila je pitanja sigurnosti, odgovornosti u prometu i prilagodbe gradova novim oblicima mobilnosti.',
    'Elektricni romobili u kratkom su roku postali simbol urbanog prijevoza nove generacije. Jedni ih vide kao prakticno i ekoloski prihvatljivo rjesenje za kratke gradske relacije, dok ih drugi smatraju izvorom dodatnog nereda i sigurnosnih rizika na javnim povrsinama.

Razlog zbog kojeg se o njima sve cesce raspravlja na politickoj razini lezi u cinjenici da njihovo siroko koristenje nije bilo praceno jednako brzim prilagodbama zakona i prometne infrastrukture. Pitanja poput maksimalne brzine, obvezne opreme, kretanja nogostupom ili biciklistickom stazom te odgovornosti u slucaju nesrece i dalje izazivaju prijepore.

Zagovornici sire uporabe romobila isticu da gradovima trebaju fleksibilni i lagani oblici prijevoza koji mogu smanjiti prometne guzve i ovisnost o automobilima. Posebno u vecim urbanim sredinama, romobili se predstavljaju kao dio sirih politika odrzive mobilnosti.

Medutim, kriticari upozoravaju da se bez jasnih pravila i nadzora povecava broj opasnih situacija, posebno za pjesake, starije osobe i djecu. Rasprava o romobilima zato nije samo tehnicko prometno pitanje, nego i pitanje odnosa grada prema javnom prostoru, sigurnosti i kvaliteti svakodnevnog zivota.',
    'assets/img/uploads/eroller.jpg',
    'politika',
    0
),
(
    'Abnehmen durch Sport und richtige Ernährung - Antworten auf häufige Fragen',
    'Strucnjaci vec dugo naglasavaju da odrzivo mrsavljenje ne ovisi o kratkotrajnim dijetama, nego o dugorocnoj promjeni zivotnih navika, pravilnoj prehrani i redovitoj tjelesnoj aktivnosti.',
    'Mnogi ljudi potragu za boljom tjelesnom formom i zdravijim zivotom zapocinju naglo, kroz stroge dijete i intenzivne planove vjezbanja. Iako takvi pristupi ponekad kratkorocno daju vidljive rezultate, dugorocno se najcesce pokazuju tesko odrzivima.

Osnovno pravilo zdravog mrsavljenja nije odricanje od svega, nego stvaranje ravnoteze izmedu unosa energije, kvalitete hrane i kretanja. Upravo zato nutricionisti i lijecnici sve cesce govore o promjeni navika, a ne o privremenim rjesenjima. Cilj nije samo izgubiti kilograme, nego razviti obrazac ponasanja koji se moze zadrzati mjesecima i godinama.

Redovita tjelesna aktivnost pritom ne mora znaciti iscrpljujuce treninge. Za mnoge ljude vec i brzo hodanje, voznja bicikla, lagano trcanje ili vjezbe kod kuce mogu biti dovoljan pocetak. Najvaznije je da se aktivnost uklopi u svakodnevni raspored i postane redovit dio zivota.

Jednako je vazna i prehrana. Uravnotezen jelovnik, dovoljno vode, kontroliran unos industrijski preradene hrane i veci udio svjezih namirnica cesto daju bolje rezultate od popularnih restriktivnih dijeta. Dugorocno, zdravlje se ne gradi ekstremima, nego dosljednoscu.',
    'assets/img/uploads/prehrana.jpg',
    'zdravlje',
    0
),
(
    'Menschen in einer Parallelwelt, die nur einen Steinwurf entfernt liegt',
    'Iako geografski zive vrlo blizu, ljudi iz razlicitih drustvenih i ekonomskih okolnosti cesto svakodnevicu dozivljavaju potpuno drugacije, sto se posebno odrazava na zdravlje, sigurnost i kvalitetu zivota.',
    'Ponekad je dovoljno prijeci samo jednu ulicu, jedan kvart ili jednu administrativnu granicu da bi se uslo u potpuno drukciji svijet. Razlike u prihodima, pristupu zdravstvenoj skrbi, kvaliteti stanovanja i obrazovnim mogucnostima oblikuju svakodnevni zivot ljudi puno vise nego sto se na prvi pogled vidi.

U takvim okolnostima zdravlje vise nije samo individualna odgovornost ili rezultat osobnog izbora. Ono postaje posljedica sireg drustvenog okvira. Ljudi koji imaju sigurnije zaposlenje, stabilniji prihod i kvalitetnije uvjete zivota cesce imaju i bolje preduvjete za zdravije navike, redovite preglede i manju razinu stresa.

S druge strane, oni koji zive u nesigurnijim uvjetima nerijetko su izlozeniji psihickom opterecenju, losijoj prehrani, slabijem pristupu zdravstvenim uslugama i vecem riziku od socijalne iskljucenosti. Takve razlike ponekad ostaju nevidljive upravo zato sto postoje vrlo blizu nas, ali izvan nase svakodnevne percepcije.

Prica o paralelnim svjetovima koji se gotovo dodiruju podsjetnik je da pitanje zdravlja nikada nije samo medicinsko pitanje. Ono je istodobno i pitanje drustvene pravde, dostupnosti prilika i uvjeta u kojima ljudi svakodnevno zive.',
    'assets/img/uploads/parallelwelt.jpg',
    'zdravlje',
    0
),
(
    'Mein Foto auf stern.de',
    'Fotografija prirode i svakodnevice sve cesce postaje vise od estetskog prizora - ona moze potaknuti raspravu o odmoru, mentalnom zdravlju, sporijem ritmu zivota i potrebi za bijegom od svakodnevnog stresa.',
    'U vremenu stalne povezanosti, brzih informacija i neprestanog digitalnog podrazaja, slike prirode cesto djeluju kao kratki predah. Jedna fotografija mora, krajolika ili mirnog trenutka moze izazvati puno snazniju emocionalnu reakciju nego citav niz svakodnevnih vijesti koje prolazimo bez zadrzavanja.

Upravo zato vizualni sadrzaj danas igra vaznu ulogu i u temama koje se ticu zdravlja. Mentalno zdravlje, potreba za odmorom, znacaj boravka na otvorenom i utjecaj prirode na smanjenje stresa sve su cesce teme javnih rasprava. Fotografije takvih prizora ne sluze samo kao ukras, nego i kao podsjetnik na ono sto ljudima cesto nedostaje u svakodnevici.

Mnogi strucnjaci isticu da i kratkotrajno odvajanje od ubrzanog ritma, boravak u prirodi ili svjesno usporavanje mogu imati pozitivan ucinak na raspolozenje i opce psihofizicko stanje. Naravno, sama fotografija nije rjesenje, ali moze biti poticaj da se takve potrebe prepoznaju i ozbiljnije shvate.

Zato ovakvi sadrzaji, iako naizgled jednostavni, imaju svoje mjesto i u rubrici zdravlja. Oni povezuju vizualni dozivljaj s temama koje su sve vaznije za kvalitetu zivota suvremenog covjeka.',
    'assets/img/uploads/galeb.jpg',
    'zdravlje',
    0
);
