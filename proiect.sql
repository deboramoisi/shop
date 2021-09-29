-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: dec. 08, 2020 la 05:33 PM
-- Versiune server: 5.7.31
-- Versiune PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `proiect`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `quantity`) VALUES
(3, 1, 4, 94),
(4, 1, 10, 1),
(5, 3, 1, 1),
(16, 1, 1, 1),
(43, 9, 1, 1),
(49, 6, 12, 3),
(62, 6, 6, 2),
(64, 6, 11, 1),
(75, 7, 14, 1),
(76, 7, 13, 1),
(83, 10, 14, 1),
(110, 2, 13, 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `orders_history`
--

DROP TABLE IF EXISTS `orders_history`;
CREATE TABLE IF NOT EXISTS `orders_history` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_nr` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipping_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `total` double(6,2) NOT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_id` (`order_id`),
  UNIQUE KEY `order_nr_unique` (`order_nr`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `orders_history`
--

INSERT INTO `orders_history` (`order_id`, `user_id`, `order_nr`, `order_date`, `shipping_date`, `total`) VALUES
(1, 10, 94, '2020-12-07 14:23:54', '2020-12-07 14:23:54', 84.00),
(7, 10, 510, '2020-12-07 14:33:12', '2020-12-07 14:33:12', 500.00),
(9, 10, 103, '2020-12-07 14:34:20', '2020-12-07 14:34:20', 93.00),
(10, 10, 51, '2020-12-07 14:38:54', '2020-12-07 14:38:54', 40.90),
(12, 10, 89, '2020-12-07 14:40:29', '2020-12-07 14:40:29', 78.90),
(13, 2, 144, '2020-12-07 14:57:31', '2020-12-07 14:57:31', 142.00),
(14, 2, 274, '2020-12-07 16:27:01', '2020-12-07 16:27:01', 272.00),
(15, 2, 95, '2020-12-07 18:21:33', '2020-12-07 18:21:33', 93.00),
(17, 2, 502, '2020-12-08 09:05:29', '2020-12-08 09:05:29', 500.00),
(18, 2, 152, '2020-12-08 09:13:55', '2020-12-08 09:13:55', 150.00);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(6,2) NOT NULL,
  `order_nr` int(11) NOT NULL,
  `discount` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(70) NOT NULL,
  `quantity` int(11) NOT NULL,
  `gramaj` int(11) DEFAULT NULL,
  `description` varchar(2000) NOT NULL,
  `prop_car` varchar(3000) DEFAULT NULL,
  `image` text NOT NULL,
  `price` double(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `quantity`, `gramaj`, `description`, `prop_car`, `image`, `price`) VALUES
(1, 'Miere de salcam 1kg', 'Produse_apicole', 100, 1000, '<p>Mierea de salcÃ¢m este o miere care, dupÄƒ cum se poate ghici, derivÄƒ din planta de salcÃ¢m, o plantÄƒ medicinalÄƒ aparÈ›inÃ¢nd familiei Fabaceae. Este o miere aÈ™a-numitÄƒ â€œmonoflorÄƒâ€, considerÃ¢nd cÄƒ stupii de albine sunt plasaÈ›i Ã®ntr-o zonÄƒ bogatÄƒ Ã®n aceste plante, astfel Ã®ncÃ¢t albinele se hrÄƒnesc Ã®n principal cu florile ei, colectÃ¢nd nectarul preÈ›ios. </p><p>\r\nCa aspect, mierea de salcÃ¢m are o culoare foarte clarÄƒ È™i o consistenÈ›Äƒ destul de lichidÄƒ, fÄƒrÄƒ cristale. Mirosul ei este dulce È™i floral. Gustul sÄƒu este dulce È™i delicat. CristalizeazÄƒ Ã®ncet, 1-2 ani de la extracÅ£ie. Capacitatea sa de a rÄƒmÃ¢ne Ã®ntr-o stare lichidÄƒ pentru o perioadÄƒ lungÄƒ de timp, alÄƒturi de culoarea ei foarte clarÄƒ, Ã®i oferÄƒ un aspect comercial deosebit ÅŸi duce la o dorinÅ£Äƒ irezistibilÄƒ de a vÄƒ scufunda degetele chiar Ã®n borcÄƒnelul cu miere de salcÃ¢m.</p>', '<p>ÃŽn plus faÈ›Äƒ de utilizarea ca Ã®ndulcitor Ã®n loc de zahÄƒr, produsele din miere de salcÃ¢m au È™i alte utilizÄƒri datoritÄƒ proprietÄƒÈ›ilor lor benefice. ÃŽn primul rÃ¢nd, este un produs natural energizant, furnizÃ¢nd sistemului nervos o zi plinÄƒ de energie. Mierea de salcÃ¢m este caracterizatÄƒ de un conÈ›inut ridicat de proteine, sÄƒruri minerale, vitamine È™i aminoacizi. AceastÄƒ combinaÈ›ie naturalÄƒ face ca acest sortiment de miere sÄƒ fie un tonic excelent. Mierea de salcÃ¢m, Ã®n plus, este un remediu care poate fi de asemenea utilizat de cÄƒtre diabetici, deoarece conÈ›inutul de zahÄƒr derivÄƒ Ã®n cea mai mare parte din fructozÄƒ, care nu are nevoie de insulinÄƒ pentru a fi metabolizatÄƒ. </p><p>\r\nAre o acÈ›iune de detoxifiere care ajutÄƒ la menÈ›inerea sÄƒnÄƒtÄƒÈ›ii ficatului. Se pare cÄƒ mierea de salcÃ¢m are de asemenea o acÈ›iune laxativÄƒ utilÄƒ pentru cei care suferÄƒ de constipaÈ›ie. RegleazÄƒ funcÈ›iile digestive È™i ajutÄƒ la combaterea stomacului enervat. Utilizarea sa majorÄƒ, totuÈ™i, rÄƒmÃ¢ne cea Ã®mpotriva durerii Ã®n gÃ¢t, a tusei, a faringitei È™i a altor inflamaÈ›ii similare care afecteazÄƒ cavitatea bucalÄƒ.</p>', 'honey1.jpg', 40.00),
(2, 'Miere de rapita 1kg', 'Produse_apicole', 100, 1000, '<p>Aceasta este o miere monoflorÄƒ, adicÄƒ este produsÄƒ Ã®n cea mai mare parte din nectar È™i, uneori, din polenul de flori de rapiÈ›Äƒ. Mierea de rapiÅ£Äƒ este colectatÄƒ Ã®n luna mai ÅŸi este una dintre primele recolte de miere ale anului. Acest tip de miere are cÃ¢teva caracteristici unice, cum ar fi un timp de cristalizare rapid È™i un gust delicios, fiind preferatÄƒ de mulÈ›i iubitori de miere, deoarece nu este foarte dulce.</p>', '<p>Mierea de rapiÈ›Äƒ are proprietÄƒÈ›i de vindecare, fiind recomandatÄƒ pentru tratarea problemelor de sÄƒnÄƒtate a rinichilor precum ÅŸi a bolilor legate de ochi. Uleiul de plante de rapiÅ£Äƒ conÅ£ine Q3, un element extrem de important pentru dezvoltarea osoasÄƒ. Din acest motiv, mierea de rapiÈ›Äƒ este utilizatÄƒ pentru a trata osteoporoza. De asemenea, ajutÄƒ la regenerarea È™i menÈ›inerea elasticitÄƒÈ›ii pereÈ›ilor vasculari. Consumul de miere din rapiÈ›Äƒ protejeazÄƒ ficatul, splina È™i pancreasul de diverse boli. Este recomandat persoanelor care suferÄƒ de arsuri la stomac datoritÄƒ aciditÄƒÈ›ii foarte scÄƒzute.</p><p>\r\nAbundenÈ›a vitaminei E Ã®n acest produs natural este de o importanÈ›Äƒ primordialÄƒ atunci cÃ¢nd vine vorba de Ã®ncetinirea Ã®mbÄƒtrÃ¢nirii pielii, care va arÄƒta vitalÄƒ È™i sÄƒnÄƒtoasÄƒ ca urmare a consumului de miere de rapiÈ›Äƒ.</p>', 'rapita_ursulet.jpeg', 30.00),
(3, 'Miere de tei 1kg', 'Produse_apicole', 50, 1000, '<p>Iunie este luna centralÄƒ a Ã®nfloririi unei alte surse nectarifere importante pentru albine, care produc o miere apreciatÄƒ atÃ¢t pentru gustul sÄƒu, cÃ¢t È™i pentru diferitele sale proprietÄƒÈ›i benefice: mierea de tei.</p><p>\r\nPlanta rÄƒspÃ¢nditÄƒ Ã®n Ã®ntreaga EuropÄƒ, arborele de tei este folosit pe scarÄƒ largÄƒ Ã®n fitoterapie pentru proprietÄƒÈ›ile sale calmante È™i pentru decongestionarea cÄƒilor respiratorii.</p><p>\r\nAre o culoare galben deschis care se Ã®ntunecÄƒ cu timpul. Ca toate tipurile de miere, ea Ã®n mod natural tinde spre cristalizare, deÈ™i pentru mierea de tei este o operaÈ›ie care are loc destul de Ã®ncet. OdatÄƒ cristalizatÄƒ, mierea de tei devine alb-fildeÈ™. La gust are o aromÄƒ proaspÄƒtÄƒ, dulce, aromatÄƒ, care aminteÈ™te de plantele de munte È™i mentÄƒ, pÄƒstrÃ¢nd o anumitÄƒ intensitate È™i persistenÈ›Äƒ.</p>', 'Mierea de tei este beneficÄƒ pentru organism, cu o gamÄƒ largÄƒ de aplicaÅ£ii. Este utilizatÄƒ Ã®n principal ca diaforetic Ã®n tratarea rÄƒceliilor È™i a febrei. Calitatea antibacterianÄƒ a mierii de tei o face idealÄƒ pentru controlul inflamaÈ›iei organelor respiratorii. Este de asemenea folositÄƒ ca un agent fortificant È™i susÈ›ine inima. Se aplicÄƒ extern pentru a ajuta la vindecarea rÄƒnilor pe piele, eczeme È™i arsuri. Zaharurile naturale din miere au efect prebiotic, alimentÃ¢nd bacteriile bune din sistemul digestiv. Mierea de tei este un tonic natural, creÈ™te nivelul de energie È™i Ã®mbunÄƒtÄƒÈ›eÅŸte sistemul imunitar. ConsistenÈ›a vÃ¢scoasÄƒ a mierii Ã®i permite sÄƒ se lipeascÄƒ de cÄƒptuÈ™eala gÃ¢tului, iar aceastÄƒ capacitate, Ã®mpreunÄƒ cu proprietÄƒÈ›ile sale antibacteriene, face ca mierea de tei sÄƒ fie un remediu excelent pentru dureri Ã®n gÃ¢t È™i tuse.', 'tei.png', 31.00),
(4, 'Miere de zmeura 420g', 'Produse_apicole', 40, 420, '<strong>Miere de zmeurÄƒ</strong> â€“ este o miere bio parfumatÄƒ, cu aromÄƒ de zmeurÄƒ, obÈ›inutÄƒ de cÄƒtre apicultori prin plasarea stupilor de albine lÃ¢ngÄƒ culturile intense de zmeurÄƒ, Ã®n lunile iunie-iulie, perioada de florenscenÈ›Äƒ a zmeurei.<p>\r\n<strong>Mierea de zmeurÄƒ</strong> o miere Ã®n care uneori pot fi gÄƒsite particule de polen, rezultÃ¢nd astfel o miere cu aromÄƒ mai puternicÄƒ.</p>', '', 'zmeura.png', 23.00),
(5, 'Combinezon apicol', 'Echipamente', 15, 0, '<p>Combinezon apicol din bumbac cu masca detasabila. Sistemul de prindere al mastii este prin doua fermuare, iar masca se poate detasa complet pentru spalarea combinezonului in masina de spalat.</p><p>Are fermuar vertical folosit la imbracarea combinezonului, maneci si picioare prevazute cu elastic pentru a impiedica intrarea albinelor, buzunare la pantalon si piept.</p><p>Un model de combinezon practic si usor de utilizat.</p>', '', 'combinezon.jpg', 150.00),
(6, 'Crema antiaging ten sensibil', 'Cosmetice', 30, 50, 'Crema este ideala pentru tenurile sensibile, reactive si intolerante, deoarece calmeaza, ofera o senzatie de prospetime si confort, reduce sau previne aparitia rosetei. Are efect antiinflamator, antiiritant, reparator, hidratant, antioxidant si antiaging. Protejeaza pielea sensibila de efectele nocive ale poluarii, care au efect iritant si previne procesele de imbatranire cauzate de stresul oxidativ.', '', 'crema_aa_sensibil_50ml.jpg', 51.00),
(7, 'Laptisor de matca 10g', 'Produse_apicole', 44, 10, '<p><strong>Laptisorul de matca</strong> este unul dintre cele mai valoroase produse apicole deoarece contine substanta activa Acid 10-HDA- prezenta exclusiv in laptisorul de matca pur, care ofera efecte antibacteriene, antifungice si antivirale, contribuind astfel la buna functionare a sistemului imunitar.</p><p>Este singura sursa naturala de Acetilcolina, care faciliteaza transmiterea influxului nervos intre neuroni.</p><p>Contine polifenoli care au efect antioxidant si contribuie la eliminarea radicalilor liberi.</p><p>Este sursa de vitamine din complexul B, indispensabile pentru buna functionare a organismului (B1, B2, B3, B6), in special vitamina B5 (acidul pantotenic), supranumita â€œvitamina antistresâ€.</p><p>Contine toata gama de aminoacizi esentiali (in special prolina si lizina) pe care organismul nu ii poate sintetiza, desi sunt necesari intr-o alimentatie zilnica echilibrata.</p><p>Se recomanda consumul primavara si toamna in cure de 6-8 saptamani, insa se poate utiliza fara restrictii pe tot timpul anului.</p>', '<strong>Beneficiile produsului: </strong>\r\n<p><strong>UZ INTERN:</strong></p><ul>\r\n<li>Vitalizant, imunomodulator, contribuie la buna functionare a sistemului imunitar;</li>\r\n<li>Are efect antioxidant si intarzie procesele de imbatranire;</li>\r\n<li>Tonic in perioadele de oboseala fizica si psihica, tulburari de memorie;</li>\r\n<li>Tulburari de menstruatie sau menopauza;</li>\r\n<li>Ajuta la protejarea ficatului;</li>\r\n<li>Mentine valorile normale ale tensiunii arteriale si colesterolului din sange;</li>\r\n<li>Remineralizant pentru unghii si par.</li></ul>\r\n<p><strong>UZ EXTERN:</strong></p><ul>\r\n<li>Este folosit in prepararea cremelor si mastilor de fata.</li>\r\n<li>Stimuleaza producerea colagenului natural;</li>\r\n<li>Regenereaza tesutul epitelial;</li>\r\n<li>Incetineste procesul de imbatranire;</li>\r\n<li>Diminueaza ridurile existente si previne aparitia altora noi;</li>\r\n<li>Mentine elasticitatea si fermitatea tenului;</li>\r\n<li>Hidrateaza tenul;</li>\r\n<li>Diminueaza acneea.</li></ul>', 'laptisor_10g.jpg', 10.00),
(8, 'Laptisor de matca 100g', 'Produse_apicole', 20, 100, '<p><strong>Laptisorul de matca</strong> este unul dintre cele mai valoroase produse apicole deoarece contine substanta activa Acid 10-HDA- prezenta exclusiv in laptisorul de matca pur, care ofera efecte antibacteriene, antifungice si antivirale, contribuind astfel la buna functionare a sistemului imunitar.</p><p>Este singura sursa naturala de Acetilcolina, care faciliteaza transmiterea influxului nervos intre neuroni.</p><p>Contine polifenoli care au efect antioxidant si contribuie la eliminarea radicalilor liberi.</p><p>Este sursa de vitamine din complexul B, indispensabile pentru buna functionare a organismului (B1, B2, B3, B6), in special vitamina B5 (acidul pantotenic), supranumita â€œvitamina antistresâ€.</p><p>Contine toata gama de aminoacizi esentiali (in special prolina si lizina) pe care organismul nu ii poate sintetiza, desi sunt necesari intr-o alimentatie zilnica echilibrata.</p><p>Se recomanda consumul primavara si toamna in cure de 6-8 saptamani, insa se poate utiliza fara restrictii pe tot timpul anului.</p>', '<strong>Beneficiile produsului: </strong>\r\n<p><strong>UZ INTERN:</strong></p><ul>\r\n<li>Vitalizant, imunomodulator, contribuie la buna functionare a sistemului imunitar;</li>\r\n<li>Are efect antioxidant si intarzie procesele de imbatranire;</li>\r\n<li>Tonic in perioadele de oboseala fizica si psihica, tulburari de memorie;</li>\r\n<li>Tulburari de menstruatie sau menopauza;</li>\r\n<li>Ajuta la protejarea ficatului;</li>\r\n<li>Mentine valorile normale ale tensiunii arteriale si colesterolului din sange;</li>\r\n<li>Remineralizant pentru unghii si par.</li></ul>\r\n<p><strong>UZ EXTERN:</strong></p><ul>\r\n<li>Este folosit in prepararea cremelor si mastilor de fata.</li>\r\n<li>Stimuleaza producerea colagenului natural;</li>\r\n<li>Regenereaza tesutul epitelial;</li>\r\n<li>Incetineste procesul de imbatranire;</li>\r\n<li>Diminueaza ridurile existente si previne aparitia altora noi;</li>\r\n<li>Mentine elasticitatea si fermitatea tenului;</li>\r\n<li>Hidrateaza tenul;</li>\r\n<li>Diminueaza acneea.</li></ul>', 'laptisor_100g.jpg', 113.00),
(9, 'Pastura 500g', 'Produse_apicole', 10, 150, 'Pastura este polenul crud fermentat in stup, timp de 3 luni, in conditii naturale. Un produs cu insusiri valoroase date de continutul mare in zaharuri simple, enzime si aminoacizi, precum si a aciditatii sporite, ce o face usor accesibila. Fata de polen, valoarea nutritive si antibiotica a pasturii este de 4 ori mai mare.', '<p><strong>Beneficiile produsului:</strong></p><ul>\r\n<li>Este un tonic general cu actiune mai puternica decat a polenului;</li>\r\n<li>Datorita metabolizarii mai rapide si mai complete, amelioreaza starile de slabiciune cauzate de oboseala si stres;</li>\r\n<li>Ajuta la intarirea sistemului imunitar;</li></ul>', 'pastura_500g.jpg', 150.00),
(10, 'Polen uscat 200g', 'Produse_apicole', 200, 33, 'Polenul uscat este considerat un super-aliment datorita continutului ridicat de enzime, antioxidanti, vitamine si minerale, care sunt foarte hranitoare si ajuta organismul sa lupte impotriva afectiunilor.  ', '<p><strong>Beneficiile produsului:</strong> </p><ul><li>Vitaminizant si mineralizant;</li><li>Combate oboseala, ajutand la cresterea nivelului de energie;</li><li>Regleaza tranzitul intestinal, datorita continutului bogat in fibre</li></ul>', 'polen_200g.jpg', 16.00),
(11, 'Polen crud paducel 250g', 'Produse_apicole', 13, 250, '<strong>Polenul crud de Paducel</strong> este un protector al inimii si al circulatiei sangvine. Polenul crud de albine este un aliment VIU si este considerat un panaceu pe care natura il pune la dispozitia noastra, datorita continutului de vitamine (A, beta-carotenoide, E, grupul vitaminelor B), minerale, aminoacizi, bioflavonoide precum si probiotice, lactofermenti si bifidobacterii. ', '<p><strong>Beneficiile produsului: </strong></p><ul><li>Efect antioxidant, contribuind la regenerarea celulelor impotriva stresului oxidativ;</li><li>Sustine sistemul imunitar in perioadele de suprasolicitare psihica si fizica;</li><li>Protejeaza sistemul cardiovascular si mentine valorile normale ale tensiunii arteriale;</li><li>Ajuta la functionarea normala a sistemului nervos.</li></ul>', 'polen_crud_paducel_250g.jpg', 23.00),
(12, 'Ser intensiv antiacnee 30 ml', 'Cosmetice', 30, 30, '<p>Serul este un produs concentrat, bogat in ingrediente active naturale cu efect intensiv antiacnee.</p>\r\n<p>Serul Apiterra contine un complex de 5 active eficiente in combaterea acneei, care actioneaza in sinergie: reduc productia de sebum si inflamatiile, previn inrosirea pielii, calmeaza tenul iritat si regenereaza celulele epiteliale. Propolisul este cel mai eficient antibiotic natural datorita proprietatilor sale antibacteriene. Extractul de propolis este obtinut printr-o metoda inovativa brevetata. Studiile clinice arata ca reduce leziunile acneice si productia de sebum. Extractul de salcie are un continut ridicat de salicilati naturali care amelioreaza inflamatiile si roseata, au efect antimicrobian si stimuleaza regenerarea celulara. Argintul colloidal este un ingredient natural cu efect rapid, care distruge membrana celulara a fungilor si bacteriilor. Mierea de manuka este recunoscuta pentru proprietatile sale antiinflamatoare si calmante.</p>\r\n<p>Extractul de castravete improspateaza pielea,are efect astringent, revitalizant si antiaging.</p><p>Acidul hialuronic pur cu greutate moleculara mica retine apa in straturile profunde ale pielii, asigurand hidratarea in profunzime a epidermei, reducerea vizibila a liniilor fine si recastigarea elasticitatea pielii</p><p>Coenzima Q10 si laptisorul de matca BIO au capacitatea de a diminua efectele radicalilor liberi asupra celulelor si stimuleaza productia compusilor esentiali ai pielii, prevenind astfel imbatranirea si aparitia ridurilor.</p>', '', 'ser_acnee.jpg', 61.00),
(13, 'Scrub de fata 75ml', 'Cosmetice', 31, 75, 'Scrubul de fata exfoliaza bland, indepartand impuritatile, excesul de sebum si celulele moarte. Stimuleaza regenerarea celulara, incetinand procesele de imbatranire ale pielii, lasa pielea fina, catifelata si radianta.', '', 'scrub.jpg', 31.00),
(14, 'Matca imperecheata natural', 'Matci', 10, 0, '<ul><li>Clipate (taierea aripilor pana la indicele cubital) - la cerere in schimbul sumei de 5 lei pe bucata.</li>\r\n<li>marcate 2021, 2022, 2023, 2019, 2020</li>\r\n<li>obtinute prin transvazare</li>\r\n<li>ne preocupa in principal cresterea trantorilor de care depinde calitatea matcilor.</li>', '', 'matca.jpeg', 86.00),
(15, 'Familie de albine', 'Familii', 10, 0, 'Stupii sunt dotati cu : fund(soclu) antivaroua cu plasa din aluminiu, subar din tabla zincata, corp cu suport din aluminiu pentru rame, cat cu 10 rame din plastic crescute si suport pentru rame din aluminiu, podisor, hranitor, gratie hanneman si capac invelit cu tabla zincata. Stupii sunt vopsiti si au o vechime de 3 ani.', '', 'stup_deschis.jpeg', 500.00);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `last_name`, `first_name`, `email`, `password`, `address`, `phone`) VALUES
(9, 'bogdangroza', 'Groza', 'Bogdan Ioan', 'bgroza@gmail.com', '99121def2edd2237a3c94cdca950286e', 'str. Iancu de Hunedoara, 23B, Salonta, Bihor, 415500', ''),
(10, 'admin', 'Bogdan-Ioan', 'Groza', 'apigroza@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'str. Mihai Eminescu, nr 10, Cluj-Napoca', NULL),
(2, 'deboramoisi', 'Moisi', 'Olivia-Debora', 'debora@yahoo.com', 'bee46a668f72877607c984a798a2f6a2', 'str. Grigore Alexandrescu nr. 13, Salonta, Bihor', '0722130816'),
(6, 'vanesamoisi', 'Vanesa', 'Moisi', 'vanesa@yahoo.ro', 'c48dc05559c203ffc8c21c78942c90b6', NULL, NULL),
(7, 'anafoltut', 'Foltut', 'Ana', 'ana@gmail.com', 'f6f0c2631aaafe87455062431d1b3b31', NULL, NULL),
(8, 'iulianagroza', 'Groza', 'Iuliana', 'iulianag@yahoo.ro', '2f73cc6f061f3912af38e4dfb470c207', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
