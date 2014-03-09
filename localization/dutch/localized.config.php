<?php
// File : dutch/localized.config.php - plus version (18.10.2013 - rev.1)
// First version is based on the work of Marco Gelli Marchese <mvmcgm@gmail.com> for the Brasilian version
// Original Dutch file by Bert Moorlag <berbia@hotmail.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

$Charset = "utf-8";

//Configuration Global used variables
define("A_CONFSAVE", "Aanpassingen opslaan");
define("A_CONFOPTIONAL", "Optioneel");
define("A_CONFREQUIRED", "Verplicht");
define("A_CONFNOTSEND", "Niet verzenden");
define("A_CONFSEND", "Verzenden");
define("A_CONFUNRESTRICT", "Onbeperkt");
define("A_CONFRESTRICT", "Beperkt");
define("A_CONFHIDE", "Verbergen");
define("A_CONFSHOW", "Tonen");
define("A_CONFHINT", "Tip: %s");
define("A_CONFIMPORTANT", "Belangrijk: %s");
define("A_CONFNOTE", "Noteer: %s");
define("A_CONFHERE", "hier");
define("A_CONFWIDTH", "Breedte");
define("A_CONFHEIGHT", "Hoogte");
define("A_CONFPX", "px."); #pixels
define("A_CONFBOT", "Bot");
define("A_CONFRDQ", "Willekeurig citaat");

//Navigation Menu
define("A_CONF_0", "Algemene instellingen");
define("A_CONF_1", "Chat Server Data");
define("A_CONF_2", "Talen");
define("A_CONF_3", "Informatie over site-eigenaar");
define("A_CONF_4", "Gebruikers Registratie");
define("A_CONF_5", "Extra mogelijkheden");
define("A_CONF_6", "Tijdaanduiding");
define("A_CONF_7", "Chat Openingstijden");

define("A_CONF_26", "Afdeling");
define("A_CONF_8", "Login Instellingen");
define("A_CONF_9", "Kamers & Opmaak");
define("A_CONF_10", "Kleurinstellingen");
define("A_CONF_11", "Geluidinstelling");
define("A_CONF_12", "Roddel");
define("A_CONF_13", "Beheer Uploads");

define("A_CONF_14", "Eigenschap & Mods");
define("A_CONF_15", "Prive berichten");
define("A_CONF_16", "Bot instellingen");
define("A_CONF_17", "Commando’s");
define("A_CONF_18", "Multimedia");
define("A_CONF_19", "Snelle Menus");
define("A_CONF_20", "Avatars & Gravatars");
define("A_CONF_21", "Logboek Instellingen");
define("A_CONF_22", "Instellingen voor gluren");
define("A_CONF_23", "Willekeurige Citaat");
define("A_CONF_24", "Zichtbaarheid");
define("A_CONF_25", "Verjaardag Instellingen");

define("A_CONF_27", "Help & Ondersteuning");
define("A_CONF_28", "Downloadpagina");
define("A_CONF_29", "Spiegelpagina");
define("A_CONF_30", "Projectpagina");
define("A_CONF_31", "Project SVN pagina");
define("A_CONF_32", "Pagina Steun Groep");
define("A_CONF_33", "Lees %s Uitgave notitie’s"); //%s = version
define("A_CONF_35", "%s Download"); //%s = version
define("A_CONF_36", "FAQ Online");
define("A_CONF_37", "Test server");
define("A_CONF_38", "Toevoegen van terugkoppeling");
define("A_CONF_39", "Wilt u doneren?");
define("A_CONF_40", "Uitgegeven op:\\n%s"); //%s = date
define("A_CONF_41", "Plus ontwikkelaar: %s"); //%s = developer name
define("A_CONF_42", "Veel dank aan de medewerkers voor het vele werk van\\nde phpHeaven Team\\nen de phpMyChat groepen op\\nYahoo! en Sourceforge.\\n\\nBedankt voor het gebruik van ons werk");
define("A_CONF_43", "Wat is dit?");
define("A_CONF_44", "Over Plus");

define("A_CONF_46", "Home");
define("A_CONF_46a", "Scroll home");
define("A_CONF_47", "Opslaan");
define("A_CONF_47a", "Ga naar opslaan");

//Content - Errors Success
define("A_CONF_ERR_1", "Configuratie instellingen succelvol aangepast!");
define("A_CONF_ERR_2", "Vergeet niet de naam aan te passen van %s directorie naar %s<br />(en zet de rechten op <b>777</b>)"); // %s = folder names (old|new)
define("A_CONF_ERR_3", "Download de %s update van %s."); //%s = version | here (url)
define("A_CONF_ERR_4", "Download de %s update"); //%s = version
define("A_CONF_ERR_5", "De instellingen zijn het laatst opgeslagen op %s door %s!");  //%s = date | admin username
define("A_CONF_ERR_6", "Je moet een naam opgeven voor jou %s!"); //%s = Bot/Quote word
define("A_CONF_ERR_7", "Alleen deze karakters zijn toegestaan:");
define("A_CONF_ERR_8", "Spaties, kommas of backslashes (\\) zijn niet toegestaan.<br />Controleer de spelling van de %s naam %s!"); //%s = Bot/Quote word | (Bot/Quote names)
define("A_CONF_ERR_9", "Een verbannen woord is gevonden in de %s naam %s!"); //%s = Bot/Quote word | (Bot/Quote names)
define("A_CONF_ERR_10", "De naam van jou %s %s is reeds geregistreerd.<br />Kies een andere naam!"); //%s = Bot/Quote word | (Bot/Quote names)
define("A_CONF_ERR_11", "Wanneer je deze instelling wijzigt terwijl er gebruikers zijn ingelogd, moet iedereen de pagina herladen (F5) of uitloggen en opnieuw aanmelden. Er kan automatisch een bericht worden verzonden naar alle kamers, mits deze functie is ingeschakeld.");

//Content - Title
define("A_CONFTITLE_0", "Configuratie Pagina");
define("A_CONFTITLE_1", "Configuratie Optie’s");
define("A_CONFTITLE_2", "Huidige instellingen");

//Content - Chat Server Data
define("A_CONFCONTENT_1", "Schakel automatisch zoeken naar updates aan.");
define("A_CONFCONTENT_2", "Het script kan automatisch controleren voor nieuwe uitgave’s op: ciprianmp.com/latest/ or svn.sourceforge.net!");
define("A_CONFCONTENT_3", "Statistieken in chat inschakelen.");
define("A_CONFCONTENT_4", "Wanneer je server beperkt is met bandbreedte kun je deze functie beter uitschakelen!");
define("A_CONFCONTENT_5", "Verwijderen van oude berichten na:");
define("A_CONFCONTENT_7", "Herstel de tijd voor inaktieve gebruikers in de kamers.");
define("A_CONFCONTENT_8", "Deze mogelijkheid spoort de gebruiker aan aktief deel te nemen. Admins, mods en gebruikers die afwezig zijn zullen niet worden herstart.");
define("A_CONFCONTENT_10", "Verwijder account van niet aktieve gebruikers na: (0 is nooit).");
define("A_CONFCONTENT_11", "Set the mode your chat server runs.");
define("A_CONFCONTENT_11a", "Deze plugin instelling is niet in gebruik. Uitleg op deze te activeren als een phpnuke/phpbb plugin zal nog komen."); 
define("A_CONFCONTENT_11b", "Pad naar de lokale Nuke/phpBB map:");

//Content - Languages
define("A_CONFCONTENT_12", "Standaard taal voor chatkamers.");
define("A_CONFCONTENT_12a", "Taal vlag selector");
define("A_CONFCONTENT_13", "Engels formaat (voor vlaggen, datum en tijdformaat).");
define("A_CONFCONTENT_13a", "Engels lokale formaten");
define("A_CONFCONTENT_14", "Sta toe dat gebruikers zelf een beschikbare taal kiezen.");
define("A_CONFCONTENT_14_1", "Alleen standaard");
define("A_CONFCONTENT_14_2", "Alle beschikbare");
define("A_CONFCONTENT_15", "Type voor vlaggen.");
define("A_CONFCONTENT_15a", "Formaat voor vlaggen");
define("A_CONFCONTENT_15b", "2D (std)");
define("A_CONFCONTENT_15c", "3D (nw)");

//Content - Owner data
define("A_CONFCONTENT_16", "Vul naam in als hoofd van een e-mail (admin, chatnaam of echte naam).");
define("A_CONFCONTENT_17", "Vul admin mailadres in wat vezonden wordt als hoofd van email.");
define("A_CONFCONTENT_18", "wordt ook gebruikt voor notificatie’s over registratie van nieuwe gebruikers.");
define("A_CONFCONTENT_19", "Vul hier je chat URL in om meegezonden te worden in email.");
define("A_CONFCONTENT_20", "Vul hier je groet in, als einde van de mail.");
define("A_CONFCONTENT_21", "Dit kan alleen worden gebruikt door admins in \"".A_MENU_4."\" formulier.");
define("A_CONFCONTENT_22", "Vul hier een naam in, zoals je site bekend moet zijn op het web.");
define("A_CONFCONTENT_23", "Pad naar de LOGO afbeelding.");
define("A_CONFCONTENT_23_1", "Verberg Logo");
define("A_CONFCONTENT_23_2", "Toon Logo");
define("A_CONFCONTENT_24", "Logo afbeelding om te tonen (je mag ook een direct pad invullen - v.b. http://pad_naar_de_afbeelding.jpg of ./../pad_naar_de_afbeelding.jpg");
define("A_CONFCONTENT_25", "(pad naar de afbeelding.jpg is geschikt voor de volgende formaten - .jpg, .gif, .bmp, .png)");
define("A_CONFCONTENT_26", "URL die geopend wordt door de LOGO (opent een nieuw venster).");
define("A_CONFCONTENT_27", "Tekst om te tonen, wanneer je met de muis over de LOGO gaat(de ALT/TITEL mogelijkheid).");

//Content - Registration
define("A_CONFCONTENT_28", "Toestaan voor registratie van je chatkamer.");
define("A_CONFCONTENT_29", "Schakel deze functie alleen uit, wanneer je handmatig de gebruikers wilt registreren, of lees de <a href=#reg_hint class=\"ChatLink\">Tip</a> hieronder om dit automatisch te doen, maar dan wachtend op goedkeuring.");
define("A_CONFCONTENT_30", "Registratie verplicht voor deelname aan chat.");
define("A_CONFCONTENT_31", "Voor en achternaam invullen op registratie en profielformulier.");
define("A_CONFCONTENT_32", "Automatisch wachtwoord genereren (en email versturen naar nieuwe gebruiker)).");
define("A_CONFCONTENT_33", "Lengte van de wachtwoord (om te genereren en versturen via mail).");
define("A_CONFCONTENT_34", "Verstuur account gegevens naar nieuwe gebruiker.");
define("A_CONFCONTENT_35", "Verstuur account gegevens naar admin over nieuwe gebruiker.");
define("A_CONFCONTENT_37", "Voor de beste instellingen om te controleren wie zich heeft geregistreerd en deelneemt aan de chat:");
define("A_CONFCONTENT_38", "Registratie toestaan om te chatten:");
define("A_CONFCONTENT_39", "Registratie verplicht voor deelname chat: wanneer %s is ingevuld, kunnen alleen geregistreede gebruikers deelnemen aan de chat"); // %s = Required
define("A_CONFCONTENT_41", "Genereer en wachtwoord naar nieuwe gebruiker:");
define("A_CONFCONTENT_42", "Verstuur account gegevens naar nieuwe gebruiker:");
define("A_CONFCONTENT_43", "Verstuur account gegevens naar admin over nieuwe gebruiker:");
define("A_CONFCONTENT_44", "Wanneer iemand  zijn gegevens invult, wordt er een willekeurig wachtwoord aangemaakt, maar de gebruiker ontvangt geen email met daarin een wachtwoord vermeld, kan hij/zij NIET inloggen; hij krijgt dan alleen een memo dat hij /zij zich heeft geregistreerd.");
define("A_CONFCONTENT_45", "Op dat moment ontvangt de admin <u>2 emails</u>:");
define("A_CONFCONTENT_46", "1<sup>ste</sup> - is een copie van de registratie gegevens voor de admin administratie (voor het geval de gebruiker zijn/haar gegevens is kwijt geraakt. Deze mail is altijd in het Engels;");
define("A_CONFCONTENT_47", "2<sup>de</sup> - is een mail waarin de gegenereerde wachtwoord en andere data instaat van de nieuwe gebruiker (deze mail is reeds klaar om te worden verzonden naar de gebruiker, mits zijn account wordt goed gekeurd). Deze mail is geschreven in de taal, die de gebruiker heeft gekozen tijdens registratie of in zijn profiel staat vermeld..");
define("A_CONFCONTENT_48", "De admin controleerd wie de persoon is en welke gegevens hij/zij heeft ingevuld. Mocht de admin dit goedkeuren, hoeft de admin alleen de tweede mail te versturen naar de gebruiker (deze mail is al opgesteld voor goedkeuring). Een nadere mogelijkheid is via %s een mail te versturen met de login gegevens naar de nieuwe gebruikers. Optioneel is, dat de admin probeert in te loggen met de gebruikersnaam en wachtoord in de \"".L_REG_4."\" en dit op deze maniet aan te passen / veranderen."); //%s = tab name
define("A_CONFCONTENT_50", "Vergeet niet om je juiste adres %s hier in te vullen, om te zorgen dat alles werkt. Houd er ook rekening dat deze instellingen uw chatserver in een niet-openbare zal veranderen (beperkende, particuliere). Mocht u niet  of niet snel reageren op de nieuwe account goed te keuren, zal de verwaarloosde gebruiker waarschijnlijk niet terug komen."); //%s = here (url)

//Content - Functionality
define("A_CONFCONTENT_53", "Schakel verbanfunctie in en bepaal aantal dagen.");
define("A_CONFCONTENT_54", "0 = uitgeschakeld, ieder ander getal = dag(en) om te verbannen");
define("A_CONFCONTENT_55", "Type verbanning.");
define("A_CONFCONTENT_56", "verbannen door IP en gebruikersnaam tegelijk of alleen door IP blokkade.");
define("A_CONFCONTENT_57", "- Eerste optie zal alleen de gebruikersnaam van de IP verbannen, voor als er meerdere gebruikers op hetzelfde IP zitten (v.b. ouders of broers en zussen die een computer moeten delen);");
define("A_CONFCONTENT_58", "- De tweede optie zal niemand toelaten van de IP die verbannen is(veel effeciënter).");
define("A_CONFCONTENT_59", "Door IP en gebruikersnaam");
define("A_CONFCONTENT_60", "Alleen IP");
define("A_CONFCONTENT_61", "Gebruik smilies in berichten.");
define("A_CONFCONTENT_62", "Geen smilies");
define("A_CONFCONTENT_63", "Toon smilies");
define("A_CONFCONTENT_64", "Houd HTML tags in berichten.");
define("A_CONFCONTENT_65", "<b>simpel</b>: Houd vet, cursief en onderstreept; <b>Geen</b>: Houd niets");
define("A_CONFCONTENT_66", "Simpel");
define("A_CONFCONTENT_67", "Geen");
define("A_CONFCONTENT_68", "Toon afgedankte HTML tags.");
define("A_CONFCONTENT_69", "Verwijder afgedankte tags");
define("A_CONFCONTENT_70", "Toon afgedankte tags");
define("A_CONFCONTENT_71", "Inschakelen bescherming links die geplaatst zijn door te openen in een popup venster.");
define("A_CONFCONTENT_72", "Wanneer ingeschakeld, zal een nieuw venster openen met een lijst van alle links die geplaatst zijn in het bericht van de gebruiker. Deze optie bied meer veiligheid voor de chatkamers.");
define("A_CONFCONTENT_73", "Opent link rechtstreeks vanuit chat");
define("A_CONFCONTENT_74", "Opent links eerst in een popup venster");
define("A_CONFCONTENT_75", "Standaard berichten volgorde.");
define("A_CONFCONTENT_76", "(alleen voor \"non-H\" browsers - anders dan IE of Firefox)");
define("A_CONFCONTENT_77", "De gebruikers kunnen gebruik maken van het \"/order\" commando om de volgorde te veranderen.");
define("A_CONFCONTENT_78", "Laatste boven");
define("A_CONFCONTENT_79", "Laatste onder");
define("A_CONFCONTENT_80", "Standaard aantal berichten bij binnenkomst.");
define("A_CONFCONTENT_81", "zet deze nooit op <b>\"0\"</b>; Minimum aantal is <b>\"1\"</b> maar schakel dan tenminste 1 van de <b>2 onderstaande instellingen</b> uit.<br />Wanneer je beide instellingen toch wilt behouden, moet de instelling minimaal <b>\"2\"</b>zijn.");
define("A_CONFCONTENT_82", "gebruikers kunnen ook middels /show \"n\" of /last \"n\" commando een ander aantral bekijken.");
define("A_CONFCONTENT_83", "Toon informatie voor iedere gebruiker bij binnenkomst/verlaten van chatkamer.");
define("A_CONFCONTENT_84", "Geen informatie");
define("A_CONFCONTENT_85", "Informatie kamer");
define("A_CONFCONTENT_86", "Toon een welkomstbericht wanneer gebruikers de chat binnen komen.");
define("A_CONFCONTENT_87", "Geen welkomst bericht");
define("A_CONFCONTENT_88", "Toon welkomstbericht");
define("A_CONFCONTENT_89", "Aantal smilies op een rij in help.");
define("A_CONFCONTENT_90", "Aantal smilies op een rij in smilie_popup.");
define("A_CONFCONTENT_91", "Toon de the Chat Etiquette boven bij de Help popup (Chat regels).");
define("A_CONFCONTENT_92", "Verberg Etiquette");
define("A_CONFCONTENT_93", "Toon Etiquette");
define("A_CONFCONTENT_94", "Uitgang link type");
define("A_CONFCONTENT_96", "Uitgang link");
define("A_CONFCONTENT_97", "Deur openen");
define("A_CONFCONTENT_95", "\"".A_CONFCONTENT_96."\" staat voor de originele Uitgang link, \"".A_CONFCONTENT_97."\" staat voor de afbeelding van een deur.");
define("A_CONFCONTENT_98", "Bepaal de karakters die toegestaan zijn voor gebruikers voor registratie/login.");
define("A_CONFCONTENT_99", "Dit zijn de standaard karakters: %s getestvoor login, die geen invloed hebben op de layout/functionaliteit van de chat."); //%s = list of allowed characters
define("A_CONFCONTENT_101", "Sta deze karakters niet toe, deze zijn wel van invloed op de layout/funcionaliteit na het inloggen: uitroepteken, slash, backslash, komma, spatie, enkele en dubbele aanhalingstekens ensquare (box) brackets (<b>! / \ , ' \" [ ]</b>).");
define("A_CONFCONTENT_102", "Hoewel deze karkaters niet alles kunnen afbreken, schijnt dat de / en ; niet kunnen worden uitgesloten voor het gebruik van gebruikersnamen. $ teken is getest maar kan beter worden vermeden, omdat dit doorgaans wordt gebruikt als parameters voor php bestanden.");

//Content - Timings
define("A_CONFCONTENT_103", "Tijdzone en Wereldtijd in Statusbalk.");
define("A_CONFCONTENT_104", "- het verschil tussen de tijd van de server en de tijd elders in de wereld voor de Chat(integer)");
define("A_CONFCONTENT_105", "Voorbeeld: Mijn server staat in USA - CST (-6) maar de chat is voor de Roemeense bevolking in Boekarest - EET (+2), Ik wil de Roemeense gebruikers de juiste tijd laten zien in de chat. Voor dit voorbeeld moet ik dus invullen 8. Negatieve waardes kunnen ook worden ingevoerd.");
define("A_CONFCONTENT_106", "Bewerk \"lib/worldtime.lib.php\" om je eigen stad of steden in te voeren - alleen voor wereldtijdinstelling!");
define("A_CONFCONTENT_107", "Alleen servertijd(standaard)");
define("A_CONFCONTENT_108", "Wereldtijd alleen in Chat(nieuw)");
define("A_CONFCONTENT_109", "Wereldtijd in Index & Chat");
define("A_CONFCONTENT_110", "Toon tijd voor het bericht.");
define("A_CONFCONTENT_111", "(toon ook de Servertijd in de Statusbalk)");
define("A_CONFCONTENT_112", "Geen tijd in chat");
define("A_CONFCONTENT_113", "Toon tijd in chat");
define("A_CONFCONTENT_114", "Standaard timeout tussen iedere update.");
define("A_CONFCONTENT_116", "Terugkoppeling van bezoekerstelling.");
define("A_CONFCONTENT_117", "Deze geeft aan hoevaak een gebruiker terug komt in de chat, dit wordt ook getoont op zijn/haar profiel - whois popup.");
define("A_CONFCONTENT_118", "Geen teller op Profiel");
define("A_CONFCONTENT_119", "Tel iedere login");
define("A_CONFCONTENT_120", "Eén telling per Uur");
define("A_CONFCONTENT_121", "Eén telling per Dag");
define("A_CONFCONTENT_122", "Eén telling per Week");

//Content Chat Schedule
define("A_CONFCONTENT_123", "Tabel voor het openstellen van de chat en de chatkamers.");
define("A_CONFCONTENT_124", "Dit is nog in ontwikkeling. De tabelvelden zijn opzettelijk uitgeschakeld.");
define("A_CONFCONTENT_125", "Dagelijks:");
define("A_CONFCONTENT_126", "Zondag:");
define("A_CONFCONTENT_127", "Maandag:");
define("A_CONFCONTENT_128", "Dinsdag");
define("A_CONFCONTENT_129", "Woensdag:");
define("A_CONFCONTENT_130", "Donderdag:");
define("A_CONFCONTENT_131", "Vrijdag:");
define("A_CONFCONTENT_132", "Zaterdag:");
define("A_CONFCONTENT_132a", "Schema");

//Content Login Layout
define("A_CONFCONTENT_133", "Achtergrond beeldvullen voor de login pagina.");
define("A_CONFCONTENT_134", "Achtergrond leeg");
define("A_CONFCONTENT_135", "Achtergrond beeldvullend");
define("A_CONFCONTENT_136", "Toon een afbeelding als achtergrond op iedere pagina.");
define("A_CONFCONTENT_137", "om de kamerachtergrond van een afbeelding te voorzien, moet je de betreffende style bewerken en invoegen in de BBODY.frame end.frame. Bekijk dan eerst \"<b>achtergrond-afbeelding: url(\"pad_naar_de_afbeelding\");</b>\" (directe pad is toegestaan) - v.b. http://pad_naar_de_afbeelding.jpg of ./../pad_naar_de_afbeelding.jpg - voorbeeld in style12.css.php. Optioneel, BODY.mainframe kan gebruikt worden om een afbeelding bij de berichten te tonen(maar deze moet dan worden verkleind om de tekst bij het bericht zichtbaar te maken).");
define("A_CONFCONTENT_138", "(pad_naar_de_afbeelding.jpg kan iedere afbeelding zijn van internet - .jpg, .gif, .bmp, .png)");
define("A_CONFCONTENT_139", "Geen achtergrondafbeelding");
define("A_CONFCONTENT_140", "Toon op Login pagina");
define("A_CONFCONTENT_141", "Pad afbeelding:");
define("A_CONFCONTENT_142", "Toon verwijderlink bij Index.");
define("A_CONFCONTENT_143", "(toestaan om gebruikers hun eigen profiel te verwijderen)");
define("A_CONFCONTENT_144", "Verberg verwijder link");
define("A_CONFCONTENT_145", "Toon verwijder link");
define("A_CONFCONTENT_146", "Toon Administratie link op index.");
define("A_CONFCONTENT_147", "(een link om de administratiepaneel te openen)");
define("A_CONFCONTENT_148", "Verberg Admin link");
define("A_CONFCONTENT_149", "Toon Admin link");
define("A_CONFCONTENT_150", "Toon de handleiding link op index page.");
define("A_CONFCONTENT_151", "Verberg handleiding");
define("A_CONFCONTENT_152", "Toon handleiding");
define("A_CONFCONTENT_153", "Schakel Info in op index pagina.");
define("A_CONFCONTENT_154", "(omvat informatie omtrent enkele chat rubrieken)");
define("A_CONFCONTENT_155", "Verberg Info");
define("A_CONFCONTENT_156", "Toon Info");
define("A_CONFCONTENT_157", "Toon extra commando’s beschikbaar.");
define("A_CONFCONTENT_158", "Verberg extra commando’s");
define("A_CONFCONTENT_159", "Toon extra commando’s");
define("A_CONFCONTENT_160", "Opsomming van commando’s.");
define("A_CONFCONTENT_161", "Altijd beginnen met de break en gebruik het daarna na iedere lijn, wanneer deze te lang wordt.");
define("A_CONFCONTENT_162", "Toon andere beschikbare rubrieken.");
define("A_CONFCONTENT_163", "Verberg extra rubrieken");
define("A_CONFCONTENT_164", "Toon extra rubrieken");
define("A_CONFCONTENT_165", "Opsomming van extra rubrieken.");
define("A_CONFCONTENT_167", "Toon de naam van jou bot (indien beschikbaar).");
define("A_CONFCONTENT_168", "Verberg naam van bot");
define("A_CONFCONTENT_169", "Toon naam van bot");
define("A_CONFCONTENT_170", "Toon teller (bezoekers) op index pagina.");
define("A_CONFCONTENT_171", "Teller uitschakelen");
define("A_CONFCONTENT_172", "Toon teller");
define("A_CONFCONTENT_173", "Toon informatie over de eigenaar van de chat op de indexpagina(onder de copyright link).");
define("A_CONFCONTENT_174", "Het is dezelfde naam/tekst die je hebt ingevuld bij de registratiesectie");
define("A_CONFCONTENT_175", "Naam admin");
define("A_CONFCONTENT_176", "Verberg eigenaar");
define("A_CONFCONTENT_177", "Toon eigenaar");
define("A_CONFCONTENT_178", "Bewerk de data van de installatie van jou chat.");

//Content Rooms & Skins
define("A_CONFCONTENT_179", "Inschakelen basisontwerp chatkamers.");
define("A_CONFCONTENT_181", "Indien uitgeschakeld, zal ontwerp1 de standaard ontwerp worden in de eerste chatkamer (zoals in de eerste Publieke kamer hierboven). Wanneer dit is ingeschakeld, kan bij iedere kamer een ander ontwerp worden ingesteld.");
define("A_CONFCONTENT_182", "Alleen standaard ontwerp");
define("A_CONFCONTENT_183", "Ontwerp inschakelen");
define("A_CONFCONTENT_184", "Alle ontwerpen bekijken");
define("A_CONFCONTENT_185", "Soort kamers beschikbaar voor gebruikers.");
define("A_CONFCONTENT_186", "alleen de eerste kamer met standaard instelling;");
define("A_CONFCONTENT_187", "alle standaard kamers, maar niet met zelf te maken kamer;");
define("A_CONFCONTENT_188", "alle kamers incl. zelf te maken kamers.");
define("A_CONFCONTENT_189", "Alleen de eerste kamer");
define("A_CONFCONTENT_190", "Alle standaard kamers");
define("A_CONFCONTENT_191", "Zelf te maken kamers");
define("A_CONFCONTENT_192", "Naam van eerste publieke kamer<br>Deze is <u>standaard</u> wanneer hierboven de 0 is geselecteerd of wanneer er niets is geselecteerd op de inlogpagina.");
define("A_CONFCONTENT_193", "ook kan deze worden uitgeschakeld , maar de eerste kamer dient altijd toegankelijk te zijn met alle mogelijkheden. (Dit is dan ook de standaard kamer, voor degene die niets hebben gekozen op de inlogpagina.)");
define("A_CONFCONTENT_194", "(voor alle publieke kamers) Wanneer deze is beperkt, ook al is de kamer publiekelijk, alle admins, topmoderators en gebruikers in \"".A_MENU_1."\" formuliersheet kunnen deze kamer binnen komen. Ook de gluurpagina en de publieke archieven zal niet worden voorgelegd aan beperkte kamers.");
define("A_CONFCONTENT_195", "Naam tweede publieke kamer.");
define("A_CONFCONTENT_196", "Naam derde publieke kamer.");
define("A_CONFCONTENT_197", "Naam vierde publieke kamer.");
define("A_CONFCONTENT_198", "Naam vijfde publieke kamer.");
define("A_CONFCONTENT_199", "Naam eerste privé kamer.");
define("A_CONFCONTENT_200", "Deze wordt getoond op de loginpagina, alleen voor admins.");
define("A_CONFCONTENT_201", "Naam tweede privé kamer(standaard als er niets is geselecteerd).");
define("A_CONFCONTENT_203", "Naam derde privé kamer.");
define("A_CONFCONTENT_204", "Deze wordt getoond op de loginpagina voor alle topgebruikers (past bij \"alleen kaderleden\" kamers).");
define("A_CONFCONTENT_205", "Naam vierde privé kamer.");
define("A_CONFCONTENT_206", "Deze wordt getoond op de inlogpagina voor alle gebruikers (past bij \"ondersteuning\" kamers).");
define("A_CONFCONTENT_207", "Toon standaard privé kamer op indexpagina.");
define("A_CONFCONTENT_208", "Niet alle privé kamers wordt gezien als kamers voor alle gebruikers (zie volgende 2 instellingen).");
define("A_CONFCONTENT_209", "Deze optie toont alleen de <b>admins</b> de standaard privé kamers, maar is <u><b>nodig</b></u> om de volgde 2 instelling werkend te krijgen.");
define("A_CONFCONTENT_210", "Toon standaard privé kamers op indexpagina voor MODERATORS.");
define("A_CONFCONTENT_211", "Moderators zien alleen de kamers 8 en 9 (Kader en Ondersteuning).");
define("A_CONFCONTENT_212", "Instelling nr.1 is noodzakelijk!");
define("A_CONFCONTENT_213", "Toon standaard privé kamers op indexpagina voor de overige GEBRUIKERS.");
define("A_CONFCONTENT_214", "Gebruikers zonder extra bevoegdheden (ook gasten) zien alleen kamer 9 (Ondersteuning.");

//Content Colors
define("A_CONFCONTENT_216", "Inschakelen kleur van naam op gebruikerslijst en/of berichten.");
define("A_CONFCONTENT_217", "Users can post texts using the color palette.");
define("A_CONFCONTENT_217a", "If disabled, only the default color (as defined for the current skin) will be used for all posts in chatroom.");
define("A_CONFCONTENT_219", "Italic gebruikersnaam in gebruikerslijst.");
define("A_CONFCONTENT_218", "Wanneer deze is ingeschakeld, kunnen gebruikers hun eigen kleur bepalen voor hun eigen gebruikersnaam in alleen de gebruikerslijst.<br />Wanneer deze is uitgeschakeld zal wel de <a class=\"admin\">rood</a> en de moderators in <a class=\"mod\">blauw</a> te zien zijn (dit zijn de standaard kleuren skins/styleN.css.php), alleen wanneer \"".A_CONFCONTENT_219."\" hieronder is ingeschakeld.");
define("A_CONFCONTENT_220", "Deze optie stelt je in staat om NIET te laten zien wie de admin of moderator is in de chatkamer (dit doet geen afbreuk aan de rechten van de admin of moderator). Het laat alleen geen onderscheidt zien tussen alle gebruikers.");
define("A_CONFCONTENT_221", "Deze kleuren kun je ook aanpassen anders dan de admins in <a class=\"admin\">rood</a> en moderators in <a class=\"mod\">blauw</a> (Hun standaard kleuren kan je aanpassen in skins/styleN.css.php) of, als Kleur Namen zijn ingeschakeld hierbovenare enabled above, %s and %s (hun standaard kleuren kan je hieronder aanpassen)."); //%s = red | blue
define("A_CONFCONTENT_224", "Toon geen italics/kleuren");
define("A_CONFCONTENT_225", "Toon italics/kleuren");
define("A_CONFCONTENT_226", "Instellen Italic voor gebruikers om in berichten te gebruiken:");
define("A_CONFCONTENT_227", "Deze optie stelt je in staat om kracht bij te zetten in tekst bij een bericht(vet, cursief, onderstreept of een combinatie van deze).");
define("A_CONFCONTENT_228", "Dit werkt alleen wanneer de instelling hierboven staat op \"".A_CONFCONTENT_225."\". Alleen B, I en/of U zijn toegestaan. Ieder andere letter zal niet worden opgeslagen. De waardes mooeten worden gescheiden door een komma(bij meer dan 1).");
define("A_CONFCONTENT_229", "Voorbeeld: b,i,u (of b,i of b of u,b)");
define("A_CONFCONTENT_230", "Kleurenfilters in berichten.");
define("A_CONFCONTENT_231", "Wanneer ingeschakeld kunnen alle gebruikers keizen uit een kleur, behalve de zogenaamde krachtkleuren die hieronder al zijn ingesteld.");
define("A_CONFCONTENT_232", "Stel de kaderkleuren in voor de admins(de eerste is de standaardkleur).");
define("A_CONFCONTENT_233", "Deze kleuren zullen zowel bij berichten als de naam in de kaderkleur weergeven, mits deze hierboven is ingeschakeld.");
define("A_CONFCONTENT_234", "Stel de kaderkleuren in voor de moderators (de eerste is de standaardkleur).");
define("A_CONFCONTENT_236", "Admins kunnen deze kleuren ook gebruiken, maar niet de overige gebruikers.");
define("A_CONFCONTENT_237", "Toestaan dat gebruikers ook kleuren kunnen gebruikenb.");
define("A_CONFCONTENT_238", "Wanneer deze is uitgeschakeld, kunnen niet geregistreerde gebruikers alleen gebruik maken van de standaard kleur voor desbetreffende kamer en berichten. Hopelijk zal hun dit aanmoedigen om zich te laten registreren.");
define("A_CONFCONTENT_239", "Kleuren niet toestaan voor gasten");
define("A_CONFCONTENT_240", "Toestaan kleurgebruik voor gasten");

//Content Sound Settings
define("A_CONFCONTENT_241", "Geluid afspelen bij binnekomst.");
define("A_CONFCONTENT_242", "Breng de kamer op de hoogte");
define("A_CONFCONTENT_243", "Verwelkom alleen de gebruiker");
define("A_CONFCONTENT_244", "Inlichten & Verwelkomen (1&2)");
define("A_CONFCONTENT_245", "Pad naar het af te spelen geluid bij binnenkost (alleen .wav bestanden).");
define("A_CONFCONTENT_246", "Voorbeeld: sounds/beep.wav (je kan op afstand gebruikte URLs gebruiken)");
define("A_CONFCONTENT_247", "Bij binnenkomst:");
define("A_CONFCONTENT_248", "Bij welkom:");
define("A_CONFCONTENT_249", "Speel een buzz geluid af op /buzz commando.");
define("A_CONFCONTENT_250", "(of toon alleen een [Buzz] bericht, zonder geluid)");
define("A_CONFCONTENT_251", "Geen buzz geluiden");
define("A_CONFCONTENT_252", "Speel een buzz geluid");
define("A_CONFCONTENT_253", "Pad naar een buzz geluid om af te spelen (alleen .wav bestanden).");
define("A_CONFCONTENT_254", "Voorbeeld: sounds/beep.wav (je kan op afstand gebruikte URLs gebruiken");

//Content Profanity
define("A_CONFCONTENT_255", "Schakel roddelfilter in.");
define("A_CONFCONTENT_256", "(aanpassingen van vloek of scheldwoorden die onderstaande karakters bevatten)");
define("A_CONFCONTENT_257", "Vloeken toestaan");
define("A_CONFCONTENT_258", "Vloeken niet toestaan");
define("A_CONFCONTENT_259", "Expressie om de vloekwoorden aan te passen.");
define("A_CONFCONTENT_260", "Naam van kamer waar vloeken is toegestaan(vermijd het filter).");
define("A_CONFCONTENT_261", "Je moet de juiste naam van de kamer invullen. Klik <a href=#roomnames class=\"ChatLink\">".A_CONFHERE."</a> om de namen van de kamers te controleren.");

//Content Private messaging
define("A_CONFCONTENT_263", "Schakel fluisteren in (privé berichten).");
define("A_CONFCONTENT_264", "wanneer deze is uitgeschakeld, kan alleen de publieksberichten in de chat worden geplaatst.");
define("A_CONFCONTENT_265", "Schakel popup fluisteren in(privé berichten).");
define("A_CONFCONTENT_266", "wanneer deze is ingeschakeld kunnen gasten geen PMs ontvangen - zij moeten zich eerst registreren.");
define("A_CONFCONTENT_267", "Dit kan per geregistreerde gebruiken in hun profiel worden ingesteld.");
define("A_CONFCONTENT_269", "Off-line PMs zal altijd in een popup verschijnen (anders zouden ontvangers niet op de hoogte worden gesteldvan nieuwe PMs).");
define("A_CONFCONTENT_270", "Toestaan dat gebruikers hun eigen(ontvangen) PMs verwijderd van database.");
define("A_CONFCONTENT_271", "wanneer is ingeschakeld, kunnen gebruikers in staat zijn om de te wissen berichten te selecteren en verwijderen die zij hebben ontvangen.");
define("A_CONFCONTENT_272", "Niet toestaan PM verwijderen");
define("A_CONFCONTENT_273", "Toestaan PM verwijderen");
define("A_CONFCONTENT_274", "Opschoontijd voor ongelezen off-line privéberichten.");
define("A_CONFCONTENT_275", "Wanneer de ontvanger niet binnen deze tijd inlogt, worden de oude berichten automatisch verwijderd van database(deze komen ook niet terug in het logboek, dit betekent dat deze verloren gaan).");

//Content Bots settings
define("A_CONFCONTENT_276", "Inschakelen van BOT in chat.");
define("A_CONFCONTENT_277", "Voor je een aanpassing doet van onderstaande instellingen, de BOT eerst uitzetten in de chat (je kan niet niet achteraf doen, want de BOT heeft dezelfde rechten als een admin).");
define("A_CONFCONTENT_278", "Inschakelen van openbare conversatie van BOT in chat.");
define("A_CONFCONTENT_279", "wanneer deze is uitgeschakeld, zal de BOT alleen praten en luisteren in privékamers van de chat.");
define("A_CONFCONTENT_280", "Alleen privé Bot");
define("A_CONFCONTENT_281", "Alleen openbare Bot");
define("A_CONFCONTENT_282", "Vul de gewenste naam in van de BOT.");
define("A_CONFCONTENT_283", "Verander de naam, wanneer je zeker bent dat de BOT is geactiveerd. Je kan dit doen door de BOT op een vraag te laten antwoorden in een privékamer: %s !"); //%s = page name (url)
define("A_CONFCONTENT_284", "Je BOT is succelvol geactiveerd! Lees de \"%s\".");
define("A_CONFCONTENT_285", "BOT status & onderhoud.");
define("A_CONFCONTENT_286", "Wanneer de BOT niet (goed)reageerd (lege berichten) en/of de Bot ID <> 1, moet je deze misschien opnieuw laden. De actie zal de BOT tabellen in de databases legen en de gehele script opnieuw starten.");
define("A_CONFCONTENT_287", "Jou BOT is niet geladen in de DB.");
define("A_CONFCONTENT_288", "Klik <a href=\"./bot/botloader.php\" target=\"_blank\">".A_CONFHERE."</a> om nu te laden!");
define("A_CONFCONTENT_289", "BOT ID:");
define("A_CONFCONTENT_291", "Klik <a href=\"./bot/botloader.php\" target=\"_blank\" class=\"error\">".A_CONFHERE."</a> om BOT te herladen!");
define("A_CONFCONTENT_292", "Kies hier een kleur voor de BOT berichten.");
define("A_CONFCONTENT_293", "Kies hier een avatar voor de BOT.");
define("A_CONFCONTENT_294", "deze wordt alleen getoond als de avatar is ingeschakeld");
define("A_CONFCONTENT_294a", "BOT Avatar");
define("A_CONFCONTENT_295", "Vul een bericht in die de BOT toont bij start van chat.");
define("A_CONFCONTENT_296", "Vermijd speciala karakters, deze kunnen de instellingen beinvloeden.");
define("A_CONFCONTENT_297", "Vul een bericht in van de BOT bij verlaten van de chat.");

//Content Commands
define("A_CONFCONTENT_299", "Max aantal berichten die een gebruiker mag versturen met de /bewaar commodo.");
define("A_CONFCONTENT_300", "Waarde: 0 = uitgeschakeld, ieder andere waarde is het aantal berichten, * = geen limiet");
define("A_CONFCONTENT_301", "Inschakelen van verschillende thema’s voor iedere kamer (/thema of /thema * commando’s).");
define("A_CONFCONTENT_302", "(of alleen een standaard thema)");
define("A_CONFCONTENT_303", "standaard thema’s kunnen worden aangepast in de \"%s\" / voor ieder gewenste taal, of, om een thema te plaatsen voor de hele wereld(welke de localized thema overheerst), toe te voegen bij \"%s\").");
define("A_CONFCONTENT_304", "Wereld thema");
define("A_CONFCONTENT_305", "Meerdere thema’s");
define("A_CONFCONTENT_306", "Vul hier een uiting voor de /kamer commando.");
define("A_CONFCONTENT_307", "Voorbeeld: <font color=red>Attentie kamer:</font> or <font color=red>Verteller zegt:</font> of <font color=red>Lees dit:</font> of <font color=red>Auteur zegt:</font>");
define("A_CONFCONTENT_308", "Toestaan van /degradatie commando toe te passen.");
define("A_CONFCONTENT_309", "wanneer voor de 2de optie wordt gekozen, kunnen moderators ook andere moderators degraderen - <font color=red>kies zorgvuldig!</font>");
define("A_CONFCONTENT_310", "Alleen admins");
define("A_CONFCONTENT_311", "Moderators & admins");
define("A_CONFCONTENT_312", "Vul in de aantal worpen.");
define("A_CONFCONTENT_313", "Gebruik een getal lager dan  99.");
define("A_CONFCONTENT_314", "Alleen nodig voor versie Dice v.2. Onthoud dat des te hoger het getal kan leiden tot vertraging in het versturen van berichten (geldt zeker voor niet-IE browsers).");
define("A_CONFCONTENT_315", "Vul in het aantal dobbelstenen per worp( geld alleen voor versie Dice v.2)");
define("A_CONFCONTENT_316", "Standaard ordenen in gebruikerslijst (/sorteer commando).");
define("A_CONFCONTENT_317", "gebruikers kunnen ook gebruik maken van de /sorteer commando om hun eigen volgorde te rangschikken.");
define("A_CONFCONTENT_318", "Tijd of binnenkomst");
define("A_CONFCONTENT_319", "Alfabetisch");
define("A_CONFCONTENT_320", "Instellen van de maximum grootte voor afbeeldingen die getoont kunnen worden door de /img commando.");
define("A_CONFCONTENT_321", "Inschakelen van /wiskunde commando.");
define("A_CONFCONTENT_322", "Deze optie stelt je in staat om wiskundige formules toe te passen door gebruik van LaTeX formaat verstrekt door MathJax.");
define("A_CONFCONTENT_323", "Hier een <a href=\"http://www.mathjax.org/demos/tex-samples/\" target=\"_blank\">voorbeeld</a> van de officiële  mathjax.org site. Je hoeft alleen maar een formule in te typen en daarna copie & plakken van de bron van gewenste formule.");
define("A_CONFCONTENT_324", "Je kunt dit ook configureren door het de juiste pad in te stellen. Standaard bron is (src): <font color=\"blue\"><i>http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML</i></font>");
define("A_CONFCONTENT_325", "Bron Plugin Configuratie:");

//Content Multimedia
define("A_CONFCONTENT_326", "Inschakelen om videos toe te staan(v.b. YouTube) door gebruik te maken van de /video commando.");
define("A_CONFCONTENT_327", "wanneer uitgeschakeld, kan alleen via een link in het bericht worden geplaatst; wanneer ingeschakeld kan de berichtgever een video plaatsen die je in het bericht kan bekijken; instelling voor admins betkent dat alleen de admin en topmoderators een video kunnen plaatsen in een bericht, overige gebruikers kunnen dan alleen een link plaatsen.");
define("A_CONFCONTENT_328", "Alleen van admins");
define("A_CONFCONTENT_329", "Instelling voor breedte en hoogte van de videospeler.");
define("A_CONFCONTENT_330", "Inschakelen van mediaspeler toevoegen in chat.");
define("A_CONFCONTENT_331", "Kies de juiste formaat zodat de frame de juiste afmeting krijgt (geluid < video).");
define("A_CONFCONTENT_333", "wanneer ingeschakeld moet een geldig streaming URL ingevuld worden in het volgende veld. Je kan kiezen tussen of een geluid/video bron of een radio streaming server.");
define("A_CONFCONTENT_334", "Geluid/Radio");
define("A_CONFCONTENT_335", "Video/TV");
define("A_CONFCONTENT_336", "Het pad naar de streaming URL.");
define("A_CONFCONTENT_336a", "Voorbeeld voor NASA TV live station:<br />http://playlist.yahoo.com/makeplaylist.dll?id=1369080&segment=149773");

//Content Quick Menu
define("A_CONFCONTENT_337", "Bepaal de Snel menu voor admins.");
define("A_CONFCONTENT_338", "Bepaal de Snel menu voor moderators.");
define("A_CONFCONTENT_339", "Bepaal de Snel menu voor gebruikers.");
define("A_CONFCONTENT_340a", "Plaats deze karakter: <b>|</b> altijd op het eind van iedere regel behalve de laatste.");
define("A_CONFCONTENT_340", "Deze box legen om (admin) Snel menu uit te schakelen.");
define("A_CONFCONTENT_341", "Deze box legen om (moderators) Snel menu uit te schakelen.");
define("A_CONFCONTENT_342", "Deze box legen om (gebruikers) Snel menu uit te schakelen.");

//Content Avatars & Gravatars
define("A_CONFCONTENT_343", "Inschakelen AVATAR.");
define("A_CONFCONTENT_345", "Geen avatars");
define("A_CONFCONTENT_346", "Gebruik avatars");
define("A_CONFCONTENT_347", "Toon aanpassen avatar (Profiel) knop in tabel.");
define("A_CONFCONTENT_348", "Pad naar jou avatar map.");
define("A_CONFCONTENT_349", "Geef op het aantal avatars om te tonen vanuit je map.");
define("A_CONFCONTENT_350", "Alleen de eerste %s avatars zullen worden getoond aan de gebruikers."); //%s = number of avatars
define("A_CONFCONTENT_351", "Avatar knop");
define("A_CONFCONTENT_351a", "Geslacht");
define("A_CONFCONTENT_352", "Gebruikers standaard avatar");
define("A_CONFCONTENT_353", "Geef de waardes voor de breedte en hoogfte van avatars om te tonen.");
define("A_CONFCONTENT_354", "Normaal gesproken, voor een leuk beeld, is voor de breedte en hoogte de afmetingen hetzelfde.");
define("A_CONFCONTENT_355", "Gebruikers toestaan om een avatar te uploaden.");
define("A_CONFCONTENT_356", "zorg ervoor dat de mappen\"images/avatars\" en \"images/avatars/uploaded\" bestaan en dat ze de juiste rechten hebben (CHMOD 0777)!");
define("A_CONFCONTENT_357", "Uploads NIET toestaan");
define("A_CONFCONTENT_358", "Uplaods toestaan");
define("A_CONFCONTENT_359", "Toon geslachtafbeelding naast avatar.");
define("A_CONFCONTENT_360", "Verberg geslachtsafbeelding");
define("A_CONFCONTENT_361", "Toon geslachtsafbeelding");
define("A_CONFCONTENT_362", "Inschakelen van gebruik Gravatars.");
define("A_CONFCONTENT_363", "<a href=#avatars>Avatar</a> moet ook worden ingeschakeld (hier boven)!");
define("A_CONFCONTENT_364", "Wanneer ingeschakeld, hebben alle gasten een standaard gravatar en avatar.");
define("A_CONFCONTENT_365", "Laar gebruikers beslissen");
define("A_CONFCONTENT_366", "Alleen gravatars");
define("A_CONFCONTENT_367", "Definitie:");
define("A_CONFCONTENT_368", "Een gravatar, of <b>G</b>lobally <b>R</b>ecognized <b>A</b>vatar, is simpelweg een avatar die je volgt van weblog naar weblog en naast jou naam verschijnt bij jou berichten op gravatart ingeschakelde websites. Avatars helpt identificatie bij je berichten op web forums, dus waarom ook niet op weblogs.<br />Inschrijven voor een gravatar.com account is GRATIS, en alleen een emailadres is verplicht. Ben je eenmaal ingeschreven kan je je eigen avatar uploaden en kort nadat je gestart ben met een weblog zie je de gravatar op de ingeschakelde weblogsites (inclusief deze chat)!");
define("A_CONFCONTENT_369", "(lees meer over Gravatars op <a href=\"http://www.gravatar.com\" target=\"_blank\">http://www.gravatar.com</a> site.)");
define("A_CONFCONTENT_370", "Instelling gravatars cache.");
define("A_CONFCONTENT_371", "Server Informatie:");
define("A_CONFCONTENT_371a", "wanneeer cache is ingeschakeld, zorg ervoor dat de \"cache\" map bestaat in de chat root en de juiste rechten heeft (CHMOD 0777)!");
define("A_CONFCONTENT_371b", "Cache wordt niet ondersteund op deze server!");
define("A_CONFCONTENT_371c", "kan geen verbinding krijgen metgravatar.com!");
define("A_CONFCONTENT_372", "Hosting Server IP:");
define("A_CONFCONTENT_373", "PHP Server versie:");
define("A_CONFCONTENT_374", "toestaan_url_fopen:"); #don't translate!
define("A_CONFCONTENT_375", "toestaan_url_include:"); #don't translate!
define("A_CONFCONTENT_376", "file_get_contents:"); #don't translate!
define("A_CONFCONTENT_377", "MySQL Server versie:");
define("A_CONFCONTENT_378", "Cache uitgeschakeld");
define("A_CONFCONTENT_379", "Cache ingeschakeld");
define("A_CONFCONTENT_380", "Cache leeftijd:");
define("A_CONFCONTENT_381", "Toegestane classificatie voor Gravatars.");
define("A_CONFCONTENT_382", "Kies één van boven");
define("A_CONFCONTENT_383", "G geclassificeerde gravatar is geschikt voor weergave op alle websites met elk type publiek <font color=blue>(aanbevolen & standaard)</font>.");
define("A_CONFCONTENT_385", "PG geclassificeerde gravatars kunnen onbeleefde gebaren, provocerend geklede personen, scheldwoorden, of milde geweld bevatten.");
define("A_CONFCONTENT_386", "R geclassificeerde gravatars kunnen harde godslastering, intens geweld, naaktheid, of hard drugs bevatten.");
define("A_CONFCONTENT_387", "X geclassificeerde gravatars kunnenhardcore seksuele beelden of uiterst verontrustende geweld bevatten.");
define("A_CONFCONTENT_388", "Dynamisch standaard gravatars.");
define("A_CONFCONTENT_388a", "Dynamisch gravatar");
define("A_CONFCONTENT_389", "Hints: Dit zal willekeurig een dynamische afbeelding terug sturen voor elke gebruiker die niet over een gravatar.com account beschikt voor hun e-mail (chat gasten of gebruikers zonder een geregistreerd accountgravatar.com).");
define("A_CONFCONTENT_390", "Dit kan voorkomen worden door in <a href=\"#force\">".A_CONFCONTENT_366."</a> dit hierboven in te schakelen!");
define("A_CONFCONTENT_391", "Toon gebruikers standaard");
define("A_CONFCONTENT_392", "Forceer willekeurig");

//Content Logging Mod
define("A_CONFCONTENT_393", "Inschalen van chat logboek.");
define("A_CONFCONTENT_394", "dit zal html bestanden aanmaken van opgeschoonde of verwijderde gesprekken. De volledige versie kan via de admin menu toegang worden verkregen, de verkorte versie (alleen de publieke berichten) via de \"".L_EXTRA_OPT."\" menu in de chatkamers.");
define("A_CONFCONTENT_395", "Bepaal de naam voor jou admin (volledig)logboek map.");
define("A_CONFCONTENT_396", "Hernoem de originele \"logsadmin\" map tot een moeilijk te raden naam voor jou volledig logboek map.");
define("A_CONFCONTENT_397", "Dit si een ander dan de publieke/gebruikers toegankelijke logboek (genaamd \"logs\"), waarin geen privé/vertrouwelijke informatie omvat van jou gesprekken/akties (PM’s, gesprekken in een privé kamer).");
define("A_CONFCONTENT_398", "Toon logboeken aan niet-admin gebruikers in chat.");
define("A_CONFCONTENT_399", "Alleen wanneer chat logboek is ingeschakeld.");

//Content Lurking Mod
define("A_CONFCONTENT_400", "Inschakelen gluren in chat.");
define("A_CONFCONTENT_401", "hiermee kunnen niet ingelogde mensen glurennaar de gesprekken van anderen in de chat.");
define("A_CONFCONTENT_402", "Toon gluurpagina voor niet-admin gebruikers in chat en loginpagina.");
define("A_CONFCONTENT_403", "Alleen wanneer gluren is ingeschakeld .");
define("A_CONFCONTENT_404", "Inschakelen van \"".A_MENU_6."\" in admin paneel.");

//Content Random Quote
define("A_CONFCONTENT_405", "Inschakelen van Willekeurig citaat.");
define("A_CONFCONTENT_406", "om deze aan te passen, moet je eerst de citaat aanzetten!");
define("A_CONFCONTENT_407", "Naam citaat.");
define("A_CONFCONTENT_408", "Kleur van de citaat.");
define("A_CONFCONTENT_409", "Avatar van citaat.");
define("A_CONFCONTENT_410", "Bestand van citaat.");
define("A_CONFCONTENT_411", "Citaat’s berichtenfrequentie.");
define("A_CONFCONTENT_412", "Je kan je eigen bestanden maken, door gebruik te maken van het web. Deze bestanden moeten worden opgeslagen in de  \"%s\" directorie."); //%s = folder name
define("A_CONFCONTENT_413", "Achtergrondkleur van citaat.");

//Content Ghost Control
define("A_CONFCONTENT_414", "Overzicht van zichtbaarheid in de chatkamers.");
define("A_CONFCONTENT_415", "wanneer je deze functie inschakeld, zullen de gebruikers niet zichtbaar zijn en ook voor alle publieke pagina, tellers, behalve hun eigen berichten en commando’s (berichten venster)!");
define("A_CONFCONTENT_416", "Je kan wel de connectie’s en activiteiten in beeld krijgen via de \"".A_MENU_8."\" tab. Onthoud dat degene die neit zichtbaar zijn wel gewoon aktief kunnen zijn in de chat(dus een bericht kunnen plaatsen of een privé bericht versturen en alle commando’s kunnen gebruiken, die bij hun rechten horen.).");
define("A_CONFCONTENT_417", "Toon online administrators");
define("A_CONFCONTENT_418", "Verberg online admins (spook)");
define("A_CONFCONTENT_419", "Toon online moderators");
define("A_CONFCONTENT_420", "Verberg online moderator (spook)");
define("A_CONFCONTENT_421", "Speciale Spoken (gebruikers):");
define("A_CONFCONTENT_422", "Toevoegen gebruikersnaam gescheiden door een komma, zonder spatie(,)!");
define("A_CONFCONTENT_423", "Deze gebruikers kunnen niet door anderen worden gezien in de chat(alleen in de \"".A_MENU_8."\" tab) en, wanneer ze ook admin zijn ook alle activiteiten in de chatkamers kunnen volgen(inclusief privé berichten!). We raden aan deze alleen te gebruiken voor <font color=red>ouderlijk toezicht</font> doeleinden!");
define("A_CONFCONTENT_421a", "Punished Ghosts (Phantoms):");
define("A_CONFCONTENT_423a", "Deze gebruikers worden niet gezien door anderen in de chat (alleen in de \"".A_MENU_8."\" tab) en kunnen ook geen berichten plaatsen of evenementen verzenden in de chatkamers. We raden deze instelling aan voormmend activate these powers <font color=red>bgebruikers die verbannen zijn</font> maar naar is mislukt in de functie verbannen.!");

//Content Birthday Mod
define("A_CONFCONTENT_424", "Geboortedatum verplicht voor registratie en profiel.");
define("A_CONFCONTENT_425", "Verstuur automatisch een groetenbericht via mail bij een verjaardag van een gebruiker.");
define("A_CONFCONTENT_426", "Wanneer ingeschakeld, zal het script alleen werken wanneer de chatpagina geladen wordt in de mail interval(standaard = 7 dagen). Na deze interval zal dit onderwerp vervallen voor de mail!");
define("A_CONFCONTENT_427", "Instellen van tijd na middernacht, om de mail te versturen.");
define("A_CONFCONTENT_428", "Positieve en negatieve waardes zijn toegestaan (0 = middernacht).");
define("A_CONFCONTENT_429", "Houd er rekening mee dat de tijd van de server wordt aangehouden en niet de gebruikers zijn/haar lokale tijd, daarom is het wel mogelijk dat de mail wordt verzonden  met een (+ -) afwijking van tijdzone.");
define("A_CONFCONTENT_430", "Hoeveel dagen voor verzenden van de groeten.");
define("A_CONFCONTENT_431", "wanneer er niemand in de chat aanwezig is of de chat niet wordt bezocht binnen de interval, de Groeten zal dan niet meer worden verzonden, daar dit geen effect meer heeft voor een jarige, wanneer een bericht heel laat aankomt (bijvoorbeeld een maand).");
define("A_CONFCONTENT_432", "Instellen van de tekstbestand die verstuurt moet worden.");
?>