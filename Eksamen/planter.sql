-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Vært: localhost:3306
-- Genereringstid: 18. 06 2023 kl. 22:13:07
-- Serverversion: 10.5.19-MariaDB-cll-lve
-- PHP-version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halu_plantbase`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `planter`
--

CREATE TABLE `planter` (
  `PID` int(11) NOT NULL,
  `PName` varchar(100) NOT NULL,
  `PSort` varchar(256) DEFAULT NULL,
  `PBotName` varchar(200) NOT NULL,
  `PImg` varchar(256) DEFAULT NULL,
  `PType` varchar(200) NOT NULL,
  `PHeight` int(11) DEFAULT NULL,
  `PSowDist` int(11) DEFAULT NULL,
  `PRowDist` int(11) DEFAULT NULL,
  `PSowDepth` int(11) DEFAULT NULL,
  `PSqftNo` int(11) DEFAULT NULL,
  `PLight` varchar(200) DEFAULT NULL,
  `PSowIn` varchar(200) DEFAULT NULL,
  `PSowOut` varchar(200) DEFAULT NULL,
  `PHarvest` varchar(200) DEFAULT NULL,
  `PDesc` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Data dump for tabellen `planter`
--

INSERT INTO `planter` (`PID`, `PName`, `PSort`, `PBotName`, `PImg`, `PType`, `PHeight`, `PSowDist`, `PRowDist`, `PSowDepth`, `PSqftNo`, `PLight`, `PSowIn`, `PSowOut`, `PHarvest`, `PDesc`) VALUES
(1, 'Radise', 'French Breakfast 3', 'Raphanus Sativus', 'Radise.jpg', 'Etårig grøntsag', 10, 5, 20, 1, 16, 'Fuld skygge', NULL, 'Marts April Maj Juni Juli August September', 'April Maj Juni Juli August September Oktober', '‘French Breakfast’ er måske den hurtigst voksende radise. Du kan nemlig nyde nyhøstede radiser inden for få uger fra såning. French Breakfast har en skarlagenrød farve med en helt hvid spids. Den er lang og slank, dejligt sprød og har en mild og krydret smag.\r\n\r\nDet britiske haveselskab, Royal Horticultural Society, har givet French Breakfast en udmærkelse for den lækre tekstur og de gode groegenskaber. Der går lige omkring fire uger fra såning til høst.\r\n\r\nFrench Breakfast optager ganske lidt plads, er egnet til dyrkning i krukker, potter og kasser og samtidig en god afgrøde at prøve, hvis du er ny inden for hjemmedyrkning og gerne vil se hurtige resultater.\r\n\r\nSÅVEJLEDNING \r\nDu kan som regel så radiser allerede fra marts måned og helt frem til september. Så med 1-2 ugers mellemrum, så du har radiser hele sæsonen.\r\n\r\nSå tyndt, så udtynding ikke er nødvendig.\r\n\r\nRadiser kræver ikke særlig meget næring, men må til gengæld ikke mangle vand. Vand lidt og ofte, så de radiserne ikke bliver træede og stærke.\r\n\r\nSpis radiserne, når de er nyhøstede, så får du mest smag ud af dem.'),
(2, 'Cornichon', 'de Paris', 'Cucumis Sativus L.', 'Cornichon.jpg', 'Etårig grøntsag', 150, 15, 70, 1, 1, 'Delvis sol', 'Februar Marts', 'Maj Juni', 'August September', '\'Cornichon de Paris\' er en populær, fransk arvesort, der længe er blevet solgt på markederne i Paris og kan dateres tilbage til 1800-tallet. Planten producerer små, sprøde cornichon-agurker, der er velegnet til syltning. Det er en perfekt sylteagurk.\r\n\r\nMeget produktiv og sætter agurker i massevis. Høst dem, når de er cirka 2,5 lange, og brug dem gerne til syltning.\r\n\r\nCornichon de Paris kan både dyrkes i drivhus og på friland. Dyrker du på friland, så vælg gerne en lun placering uden for meget vind.\r\n\r\nSætter både han- og hunblomster. Det kan du læse mere om herunder.\r\n\r\nOM HAN- OG HUNBLOMSTER\r\nAgurk er særlig plante i den forstand, at en agurkeplanter enten sætter han- og hunblomster eller udelukkende hunblomster. For nogle er det vigtigt at kende forskellen, for andre ikke.\r\n\r\nDen store forskel består i, at så snart der er hanblomster involveret, bestøver de hunblomsterne, så agurkerne udvikler kerner. Ønsker man ikke kerner i sine agurker, har man derfor to muligheder:\r\n\r\nMan kan nippe hanblomsterne af agurkeplanterne, hvilket er ret nemt\r\nMan kan vælge sorter, der kun sætter hunblomster\r\nMan kan kende forskel på han- og hunblomster ved, at hunblomsten sidder på en lille agurk. Det gør hanblomster ikke. Se billeder af hanblomster og hunblomster.\r\n\r\nHar man ikke noget imod kerner i agurkerne, behøver man ikke at foretage sig noget - hverken at nippe eller skele til sorter. Og det skal da også siges, at kernerne ikke er særligt udviklede, hvis man høster agurken på et tidligt stadie.'),
(3, 'Chili', 'Jalapeño', 'Capsicum annuum', 'Jalapeno.jpg', 'Etårig grøntsag', 80, 40, 50, 1, 1, 'Fuld sol', 'Januar Februar Marts', 'Maj Juni Juli', 'August September Oktober', 'Jalapeño er en mild chili og en af de mest anvendelige i køkkenet. De kan bruges friske, syltede, tørrede og alt derimellem.\r\n\r\nDe er perfekte til at gøre maden lidt stærk uden risiko for brandfare, så alle kan være med ved bordet.\r\n\r\nRøgede Jalapeño er også kendt som Chipotle, og er fantastiske til at give en ret dybde og varme på en helt speciel måde. Rygning er også den traditionelle måde at konservere Jalapeño chilier på.\r\n\r\nDe umodne grønne frugter smager skønt af grøn peber, og er meget milde. Lader man frugterne modne, skifter de farve til en flot blodrød, og ender med en styrke på ca. 2,500-8,000 SHU.\r\n\r\nJalapeño betyder fra Jalapa, som er det sted i Mexico hvor peberen først blev dyrket for tusinder af år siden. De har længe været en central del af madkulturen i Syd- og Mellemamerika.'),
(4, 'Ært', 'Alderman', 'Pisum Sativum', 'PeaAlderman.jpg', 'Etårig grøntsag', 180, 30, 50, 3, 1, 'Delvis skygge Delvis sol', 'Februar Marts', 'April Maj', 'Juni Juli August September Oktober', 'Herlig, god marvært der giver 7-10 ærter pr. bælg. En høj sort som kræver støtte, evt. med net og tentorpæle. Giver stort udbytte på et lille areal i en lang periode. Velegnet til frysning. Noget sødere i smagen end normal marvært, men kan ikke sås lige så tidligt om foråret. Trives i porøs jord, men er ganske nøjsom. Vandes ved tørke. Dyrk ærter forskellige steder i køkkenhaven hvert år, de gøder jorden.\r\n\r\nFrilandssåning:  Når jorden er mindst 10°C varm, ellers rådner frøene. Vand sårillen før såning. Hold såningen fugtig, til frøene er spiret.'),
(5, 'Bønne', 'Blue Lake', 'Phaseolus vulgaris', 'BeanBlueLake.jpg', 'Etårig grøntsag', 180, 30, 50, 3, 1, 'Delvis sol Fuld sol', 'Marts April', 'Maj Juni', 'Juli August September Oktober', 'En fin sort af stangbønne. Giver stort udbytte på lille dyrkningsareal. Høst ofte - bælgen skal være udvokset, men slank. Bælgene spises kogte. Kan med fordel fryses, let blancherede. Trives bedst i en veldrænet, muldrig og fugtbevarende jord et læfyldt sted. Vandes rigeligt. Planten kræver støtte.\r\n\r\nFrilandssåning:  Så ikke før  jordtemperaturen er +12 °C. Skyl frøene omhyggeligt før såning. Vand i sårenden. Hold derefter fugtig. Dæk gerne med fiberdug.'),
(6, 'Hvidløg', 'Primor', 'Allium sativum', 'Hvidloeg.jpg', 'Etårig grøntsag', 50, 30, 40, 5, 4, 'Delvis skygge Delvis sol Fuld sol', NULL, 'Januar September Oktober November December', 'Juni Juli August', 'Primor er et overvintrende hvidløg af ‘hardneck’ varianten med lilla skind.\r\nDen modner tidligt og kan ofte høstes allerede fra slutningen af juni måned - afhængigt af hvornår feddene er sat i efteråret.\r\nPrimor er kendt for sin fremragende smag. Den er en hårdfør sort, der kan passe til mere vanskelige vækstbetingelser.\r\nPlantetid: september til januar – udenfor og i tunnel/drivhus.\r\nKræver kolde forhold for at udvikle sig.\r\nDet højeste udbytte kommer fra hvidløg sat i efteråret.\r\nNår de første seks blade er blevet gule, høstes og tørres de i solen eller i et luftigt skur.\r\nHøstes fra juni – august'),
(7, 'Æbletræ', 'Rød Aroma', 'Malus dom.', 'Aebletrae.jpg', 'Frugt', 700, 300, 300, 70, 1, 'Delvis skygge Delvis sol Fuld sol', NULL, 'September Oktober', 'September', 'Rød Aroma er et sundt og hårdført træ der kræver bestøvning fra bl.a Topaz. Det trives i sol-halvskygge i en alm. havejord, hvor det i september vil give røde æbler med en sød og let-syrlig smag der kan lagres køligt og mørkt helt frem til jul.\r\nTraditionelle frugttræer kræver alle en form for bestøvning, samt er de rige på velsmagende frugter.\r\nSorten har en rund til kegleformet vækst som er let at forme. De traditionelle frugttræer kan blive op til 6 til 7 m høje.\r\nPlacering og jordbund\r\nSorten vil helst stå i fuld sol til halvskygge, og foretrækker en god, næringsrig jord. Sorten kan desuden stå i delvist sandet jord, hvis jordforbedring iblandes.\r\n\r\nVanding og gødning\r\nTraditionelle frugttræer er vandkrævende, både før og efter rodfæste.\r\nSom ungt, nyplantet træ, anbefaler vi at gøde to gange årligt: én gang før blomstring og én gang efter høst. Du kan med fordel anvende universalgødning.\r\n\r\nEtablerede traditionelle frugttræer kræver ingen gødning, med undtagelse hvis jorden er meget sandet og derved næringsløs.'),
(8, 'Asparges', 'Gijnlim', 'Asparagus officinalis', 'Asparges.jpg', 'Flerårig grøntsag', 100, 30, 40, 10, 1, 'Delvis skygge Delvis sol Fuld sol', 'Januar Februar Marts', 'April Maj Juni', 'April Maj Juni', 'Asparges\r\nEn flerårig grøntsagsplante som giver lækre asparges. Planten er en af de tidligste grøntsager, som man kan høste, da den allerede i april får nye skud - det er dem man skal høste og nyde.\r\n\r\nJordbund og placering\r\nFor at dine grøntsager og andre planter skal have det bedst muligt, skal de plantes et sted i haven i en jord, der hverken er for lerholdig eller sandet. En lerholdig jord kan iblandes grus og sand, imens en mere sandet jord kan iblandes kompost.\r\n\r\nFor at dine grøntsager og drivhusplanter skal smage af mest muligt, skal de stå lyst, helst i direkte sol. Placér dem et lyst sted, og du vil opleve større og mere smagfulde grøntsager. Vil du have drivhusplanter, er det vigtigt at opretholde en god ventilation i drivhuset, så du undgår skadedyr.\r\n\r\nVanding\r\nDrivhusplanter og grøntsagsplanter er alle tørstige planter og vil gerne have vand jævnligt. Især i sommersæsonen eller hvis de står i et varmt drivhus.\r\n\r\nGødning\r\nHvis du gøder dine drivhusplanter og grøntsagsplanter, giver de bedre smag og større udbytte. Du kan gøde dem med flydende gødning, drivhusgødning eller gødning skræddersyet netop din plante.\r\nDu kan med fordel også anvende jordforbedring som både minimerer ukrudt og fremmer væksten.\r\n\r\nFør og efter udplantning\r\nDu kan placere dine grøntsagsplanter i både bede og krukker. De første dage efter udplantningen skal du sørge for at give planterne rigeligt med vand. Vander du rigeligt og regelmæssigt gennem vækstsæsonen, får du det bedste og mest velsmagende udbytte.\r\n\r\nUdplanter du i et bed eller drivhus, skal du grave et stort hul, løsn jorden i bunden og placere planten i en passende højde i hullet. Vand dernæst rigeligt før du fylder jord ovenpå, så vandet kan komme direkte ned til rødderne.\r\n\r\nVælger du at plante i en krukke, anbefaler vi at anvende en krukke med dræn i bunden, så overskydende vand kan rende fra. Husk at vande rigeligt i tiden efter udplantning - vand hellere i store mængder ugentligt, fremfor sjatvandinger hver dag.'),
(9, 'Basilikum', 'Sød storbladet', 'Basilicum Ocimum', 'BasilikumOcimumBasilicum.jpg', 'Etårig krydderurt', 40, 50, 60, 1, 1, 'Delvis sol Fuld sol', 'Marts April', 'Maj Juni', 'Maj Juni Juli August September Oktober', 'Basilikum\r\nAlmindeligt anvendt krydderurt som især er kendt fra det italienske køkken. Urten er karakteriseret ved sin gennemtrængende, skønne duft.\r\nSmager skønt i klassiske italienske retter såsom tomatsalat, bolognese, på pizza og i en frisk pesto.\r\n\r\nKrydderurter placering\r\nKrydderurter kan placeres indenfor og udenfor på et lyst og solrigt sted.\r\n\r\nJordbund og placering\r\nHvis du vil plante krydderurter i havekrukker, anbefaler vi, at de plantes i krydderurtejord, som giver urterne den næring som de har behov for. Har du en pose muldjord derhjemme, kan den anvendes hvis kompost iblandes.\r\n\r\nFor at dine krydderurter skal smage af mest muligt, skal de stå lyst - helst i direkte sol. Placér dem et lyst sted, og du vil opleve mere smagfulde urter.\r\n\r\nVanding\r\nKrydderurter er tørstige planter og vil gerne have vand jævnligt, især i sommersæsonen eller hvis de står i et varmt drivhus. De foretrækker dog en mere tør jord, hvorfor du skal være opmærksom på at de ikke står i en konstant fugtig jord.\r\n\r\nGødning\r\nHvis du gøder dine krydderurter, giver de bedre smag og større udbytte. Du kan gøde dem med flydende gødning, drivhusgødning eller krydderurtegødning. Du kan med fordel også anvende jordforbedring som både minimerer ukrudt og fremmer væksten.'),
(10, 'Hindbær', 'Autumn Bliss', 'Rubus idaeus', 'Hindbaer.jpg', 'Bær', 100, 100, 100, 30, 1, 'Fuld sol', NULL, 'Marts April Maj Juni Juli August September Oktober November', 'September Oktober', 'Hindbær\r\nHindbærbusken Rubus ideaeus er en halvbusk som får mange smagfulde, søde og røde- til rosa bær, som er rige på antioxidanter, vitamin C og E. Bærrene kender vi som hindbær og kan spises rå, bruges som pynt på desserter, til bagværk og til madlavning, samt syltning.\r\n\r\nHindbærbusken tilhører rosenfamilien og er en flerårig plante der sætter bær på 2. års skud.\r\n\r\nHjemmedyrkede planter giver smagfulde oplevelser\r\nHjemmedyrkede frugter og bær smager bare langt bedre end købte, samtidigt med, at de pynter og gør haven nyttig. Frugterne kan bruges i saft, marmelade, desserter og til meget andet. Udover at være sjovt og lærerigt at følge med i planternes udvikling fra nyplantet til at have frugter, så er det især givende at dyrke egne frugter, da du ved præcist hvad det er, du spiser.\r\n\r\nPlacering og jordbund\r\nEn hindbærbusk trives bedst i fuld sol. Den vokser udad med løbere, som typisk vil fremstå som ukrudt.\r\n\r\nHindbær trives i en jord der ikke er for sur. Almindeligt havejord er at foretrække, samt må jorden ikke være for våd.\r\n\r\nVanding og gødning\r\nVandingsbehovet er størst i perioden fra blomstring til høst. Når busken er etableret i jorden, bør du kun vande efter behov. Skal busken stå i en krukke, skal den vandes oftere end hvis den stod på friland.\r\n\r\nDu kan med fordel gøde hindbærbusken til foråret, når nye skud udvikles. Anvend gerne en kompostblanding eller NPK-gødning.'),
(11, 'Oregano', 'Almindelig Oregano', 'Oreganum vulgare', 'Oregano.jpg', 'Flerårig krydderurt', 50, 50, 50, 1, 1, 'Fuld sol', 'Marts April', 'Maj Juni Juli', 'April Maj Juni Juli August September Oktober', 'Oregano\r\nKrydderurten som er kendt fra det italienske køkken. Oregano er en flerårig krydderurt som er nem at dyrke, og er utrolig hårdfør.\r\n\r\nKrydderurter placering\r\nKrydderurter kan placeres indenfor og udenfor på et lyst og solrigt sted.\r\n\r\nJordbund og placering\r\nHvis du vil plante krydderurter i havekrukker, anbefaler vi, at de plantes i krydderurtejord, som giver urterne den næring som de har behov for. Har du en pose muldjord derhjemme, kan den anvendes hvis kompost iblandes.\r\n\r\nFor at dine krydderurter skal smage af mest muligt, skal de stå lyst - helst i direkte sol. Placér dem et lyst sted, og du vil opleve mere smagfulde urter.\r\n\r\nVanding\r\nDrivhusplanter og grøntsagsplanter er alle tørstige planter og vil gerne have vand jævnligt. Især i sommersæsonen eller hvis de står i et varmt drivhus.\r\n\r\nGødning\r\nHvis du gøder dine krydderurter, giver de bedre smag og større udbytte. Du kan gøde dem med flydende gødning, drivhusgødning eller krydderurtegødning. Du kan med fordel også anvende jordforbedring som både minimerer ukrudt og fremmer væksten.'),
(12, 'Timian', 'Faustini', 'Tymus vulgare', 'Timian.jpg', 'Flerårig krydderurt', 30, 40, 50, 1, 1, 'Fuld sol', 'April Maj', 'Juni Juli', 'Marts April Maj Juni Juli August September Oktober November', 'Timian\r\nEn stedsegrøn krydderurt der er kendt for sin aromatiske og krydrede smag. Timian anvendes til madretter, men tiltrækker også bier til haven. Krydderurten kan dyrkes i en lys vindueskarm, drivhuset, havekrukke og i køkkenhaven.\r\n\r\nKrydderurter placering\r\nKrydderurter kan placeres indenfor og udenfor på et lyst og solrigt sted.\r\n\r\nJordbund og placering\r\nHvis du vil plante krydderurter i havekrukker, anbefaler vi, at de plantes i krydderurtejord, som giver urterne den næring som de har behov for. Har du en pose muldjord derhjemme, kan den anvendes hvis kompost iblandes.\r\n\r\nFor at dine krydderurter skal smage af mest muligt, skal de stå lyst - helst i direkte sol. Placér dem et lyst sted, og du vil opleve mere smagfulde urter.\r\n\r\nVanding\r\nDrivhusplanter og grøntsagsplanter er alle tørstige planter og vil gerne have vand jævnligt. Især i sommersæsonen eller hvis de står i et varmt drivhus.\r\n\r\nGødning\r\nHvis du gøder dine krydderurter, giver de bedre smag og større udbytte. Du kan gøde dem med flydende gødning, drivhusgødning eller krydderurtegødning. Du kan med fordel også anvende jordforbedring som både minimerer ukrudt og fremmer væksten.'),
(13, 'Vinterporre', 'Blaugrüner Vinter', 'Allium porrum', 'Vinterporre.jpg', 'Etårig grøntsag', 50, 10, 40, 3, 9, 'Delvis skygge Delvis sol Fuld sol', 'April Maj Juni', 'Juli August September', 'Januar Februar September Oktober November December', 'Porre\r\nPorre er en grøntsag du kan have glæde af hele efteråret og vinteren, også selvom det bliver frostvejr. Porren er en af de mest almindelige afgrøder i de danske køkkenhaver og trives godt i det danske vejr.\r\n\r\nFrøsåning\r\nAlle vores plantefrø kommer med udførlige udplantningsvejledninger, som hjælper dig til at få succes med planteprojektet.\r\n\r\nPlantes frøene om sommeren, anvend gerne en let, almindelig havejord. Plantes frøene i det tidlige forår, kan du overveje forspiring.\r\n\r\nForspiring\r\nØnsker du at give frøene de bedste forudsætninger for at komme godt fra start, så kan du overveje forspiring. Ved at forspire, gør du et stykke forarbejde indendørs, imens det stadig er for koldt til at plante direkte ud i haven.\r\n\r\nI det tidlige forår kan du påbegynde forspiringen og se dine frø vokse. Når det bliver varmere udenfor, kan du udplante frøene, som nu er blevet planter.\r\n\r\nDu kan forspire plantefrø i såbakker, urtepotter eller andet, i en vindueskarm indenfor, ude i en udestue eller i et drivhus.\r\n\r\nTil forspiring er det vigtigt at anvende en jordtype som er mere sandet og mindre gødet end almindelig plantejord. Det giver frøene en mildere start.');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `planter`
--
ALTER TABLE `planter`
  ADD PRIMARY KEY (`PID`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `planter`
--
ALTER TABLE `planter`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;