<?php
// File : dutch/localized.chat.php - plus version (20.09.2006 - rev.13)
// Translation by Hans Paijmans <paai@kub.nl>, Kasper Souren <guaka@industree.org>
// and Sander Corbesir <rock@jascrc.com>
// Updates, corrections and additions for the Plus version by DJE.Amesz & Romanesko Genieusdanny@gmail.com
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra meta-tag for charset
$Charset = "iso-8859-1";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Berichten worden gewist na");
define("L_WEL_2", "en namen na");

define("L_CUR_1", "Er");
define("L_CUR_1a", "zijn momenteel");
define("L_CUR_1b", "is nu");
define("L_CUR_2", "in de chat.");
define("L_CUR_3", "op dit ogenblik in de chatroom");
define("L_CUR_4", "in de prive kamers");
define("L_CUR_5", "gebruikers die momenteel spieken<br>(spieken op de chatpagina):");

define("L_SET_1", "geef");
define("L_SET_2", "uw naam");
define("L_SET_3", "aantal zichtbare berichten");
define("L_SET_4", "tijd tussen twee updates");
define("L_SET_5", "kies een chat ruimte");
define("L_SET_6", "standaard gebruikers ruimtes");
define("L_SET_7", "kies...");
define("L_SET_8", "openbare ruimte door gebruikers aangemaakt");
define("L_SET_9", "maak uw eigen");
define("L_SET_10", "publiek");
define("L_SET_11", "prive");
define("L_SET_12", "ruimte");
define("L_SET_13", "En dan maar");
define("L_SET_14", "chatten");
define("L_SET_15", "standaard prive ruimtes");
define("L_SET_16", "prive ruimtes gemaakt door gebruikers ");
define("L_SET_17", "kies uw avatar");
define("L_SET_18", "markeer deze page: druk \"CTRL +D\".");

define("L_SRC", "vrijelijk verkrijgbaar op");

define("L_SECS", "seconden");
define("L_MIN", "minuut");
define("L_MINS", "minuten");
define("L_HOUR", "uur");
define("L_HOURS", "uren");

// registration stuff:
define("L_REG_1", "je wachtwoord");
define("L_REG_1r", "(alleen als je geregistreerd bent)");
define("L_REG_2", "Geregistreerde gebruikers");
define("L_REG_3", "Registreer");
define("L_REG_4", "Pas gebruikersprofiel aan");
define("L_REG_5", "Wis gebruiker");
define("L_REG_6", "Gebruikers registratie");
define("L_REG_8", "je e-mail adres");
define("L_REG_9", "Je bent geregistreerd.");
define("L_REG_10", "Terug");
define("L_REG_11", "Edit");
define("L_REG_12", "Verander gebruikersinformatie");
define("L_REG_13", "Gebruiker wissen");
define("L_REG_14", "Inloggen");
define("L_REG_15", "Inloggen");
define("L_REG_16", "Veranderen");
define("L_REG_17", "Je informatie is gewijzigd.");
define("L_REG_18", "U bent verwijderd door een moderator uit deze ruimte.");
define("L_REG_18a", "U bent verwijderd uit deze ruimte door a moderator.<br>De reden hiervoor is: %s");
define("L_REG_19", "Wil je echt verwijderd worden?");
define("L_REG_20", "Ja");
define("L_REG_21", "Je bent verwijderd.");
define("L_REG_22", "Nee");
define("L_REG_25", "Sluiten");
define("L_REG_30", "voornaam");
define("L_REG_31", "achternaam");
define("L_REG_32", "WEB");
define("L_REG_33", "laat e-mail zien met /whois commando");
define("L_REG_34", "Gebruikersprofiel wijzigen");
define("L_REG_35", "Administratie");
define("L_REG_36", "lokatie/land");
define("L_REG_37", "velden met: <span class=\"error\">*</span> moeten worden ingevuld.");
define("L_REG_39", "De kamer waar je in ben geweest is verwijderd door administratie.");
define("L_REG_45", "geslacht");
define("L_REG_46", "man");
define("L_REG_47", "Vrouw");
define("L_REG_48", "niet aangegeven");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "uw instellingen");
define("L_EMAIL_VAL_2", "Welkom op deze chatserver.");
define("L_EMAIL_VAL_Err", "Interne fout, neem contact op met een admin: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Uw wachtwoord is verstuurd naar uw e-mail address.<br>U kunt uw wachtwoord wijzigen op de inlogpagina, bij pas uw profiel aan.");

// admin stuff
define("L_ADM_1", "%s is geen moderator in deze ruimte.");
define("L_ADM_2", "je bent niet meer geregistreerd.");

//error messages
define("L_ERR_USR_1", "Naam is al in gebruik. Kies een andere.");
define("L_ERR_USR_2", "Een naam is verplicht.");
define("L_ERR_USR_3", "Deze gebruikersnaam is al geregistreerd. Geef het wachtwoord of kies een andere gebruikersnaam.");
define("L_ERR_USR_4", "Je heb foutieve wachtwoord ingevoerd.");
define("L_ERR_USR_5", "Je ben jouw gebruikersnaam vergeten.");
define("L_ERR_USR_6", "Je ben jouw wachtwoord vergeten.");
define("L_ERR_USR_7", "Je ben jouw email vergeten.");
define("L_ERR_USR_8", "Je moet correcte emailadres invoeren.");
define("L_ERR_USR_9", "Deze gebruikersnaam wordt al gebruikt.");
define("L_ERR_USR_10", "Verkeerde wachtwoord of gebruikersnaam.");
define("L_ERR_USR_11", "Je moet administrator zijn.");
define("L_ERR_USR_12", "Je ben zelf administrator, dus je kan niet zichzelf verwijderen.");
define("L_ERR_USR_13", "Om je eigen kamer te maken, moet je geregisteerd zijn.");
define("L_ERR_USR_14", "Je moet geregisteerd zijn voordat je kan chatten.");
define("L_ERR_USR_15", "Je moet jouw naam voluit typen.");
define("L_ERR_USR_16", "Alleen de volgende extra karakters zijn toegestaan:\\n".$REG_CHARS_ALLOWED."\\nSpaties, komma's of backslashes (\\) zijn niet toegestaan.\\nCheck the sintax.");
define("L_ERR_USR_16a", "Alleen de volgende extra karakters zijn toegestaan:<br />".$REG_CHARS_ALLOWED."<br>Spaties, komma's of backslashes (\\) zijn niet toegestaan. Check the sintax.");
define("L_ERR_USR_17", "Deze kamer is niet beschikbaar en je ben niet bevoegd om nieuwe kamer te maken.");
define("L_ERR_USR_18", "verbannen woord gevonden in je gebruikersnaam.");
define("L_ERR_USR_19", "je kunt niet in meer dan 1 ruimte tegelijk zijn.");
define("L_ERR_USR_20", "je bent verbannen.");
define("L_ERR_USR_20a", "je bent verbannen van deze ruimte en of chatbox .<br>De reden hiervoor is: %s");
define("L_ERR_USR_21", "Omdat je niet actief bent geweest de afgelopen ".C_USR_DEL." minuten,<br>ben je uit de kamer verwijderd.");
define("L_ERR_USR_22", "deze commando is niet beschikbaar in \\nde browser die u gebruikt (IE engine).");
define("L_ERR_USR_23", "Om in een prive ruimte te komen moet je je registreren.");
define("L_ERR_USR_24", "om een eigen ruimte te maken moet je jezelf registreren.");
define("L_ERR_USR_25", "Alleen een administrator of moderator kan de kleuren gebruiken ".$COLORNAME." !<br>gebruik geen ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br>deze zijn gereserveerd voor power users!");
define("L_ERR_USR_26", "Alleen een administrator of moderator kan de kleuren gebruiken ".$COLORNAME." !<br>gebruik geen! ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br>deze zijn gereserveerd voor power users!");
define("L_ERR_USR_27", "Je kunt niet prive tegen jezelf praten.\\ndoe dat in stilte...\\n kies een andere gebruikersnaam.");
define("L_ERR_ROM_1", "Kamernaam kan niet met komma en backslash (\\).");
define("L_ERR_ROM_2", "Verbannen woord gevonden in de naam van de ruimte die je wil maken.");
define("L_ERR_ROM_3", "Deze ruimte is al in gebruik als openbare ruimte.");
define("L_ERR_ROM_4", "Onbruikbare naam.");

// users frame or popup
define("L_EXIT", "Verlaat de chat");
define("L_DETACH", "Maak de gebruikerslijst los");
define("L_EXPCOL_ALL", "Alles uit-/inklappen");
define("L_CONN_STATE", "Ververs de verbindingsstatus");
define("L_CHAT", "Chat");
define("L_USER", "gebruiker");
define("L_USERS", "gebruikers");
define("L_LURKER", "spieker");
define("L_LURKERS", "spiekers");
define("L_NO_USER", "Geen gebruiker");
define("L_ROOM", "ruimte");
define("L_ROOMS", "ruimtes");
define("L_EXPCOL", "ruimte in-/uit laten klappen");
define("L_BEEP", "geluid/geen geluid als gebruiker binnenkomt");
define("L_PROFILE", "laat profiel zien");
define("L_NO_PROFILE", "geen profiel");

// input frame
define("L_HLP", "Help");
define("L_BAD_CMD", "Onjuiste opdracht!");
define("L_ADMIN", "%s is al administrateur !");
define("L_IS_MODERATOR", "%s is al supervisor !");
define("L_NO_MODERATOR", "Alleen supervisor van deze kamer kan die gebruiken.");
define("L_MODERATOR", "%s is nu supervisor van deze kamer.");
define("L_NONEXIST_USER", "%s is niet in aanwezige kamer.");
define("L_NONREG_USER", "%s is niet geregisteerd.");
define("L_NONREG_USER_IP", "zijn of haar IP is: %s.");
define("L_NO_KICKED", "%s is supervisor of administrateur en kan niet weggestemd.");
define("L_KICKED", "%s is met succes weggestemd.");
define("L_KICKED_REASON", "%s is succesvol verwijderd. (Reden: %s)");
define("L_NO_REG_USER", "Om dit commando te gebruiken moet je je registreren.");
define("L_NO_BANISHED", "%s is moderator of administrator en kan niet verbannen worden.");
define("L_BANISHED", "%s is succesvol verbannen.");
define("L_BANISHED_REASON", "%s is succesvol verbannen. (Reden: %s)");
define("L_SVR_TIME", "Server tijd: ");
define("L_NO_SAVE", "geen boodschappen om te bewaren!");
define("L_NO_ADMIN", "Alleen een administrator kan dit commando gebruiken.");
define("L_ANNOUNCE", "MEDEDELING!!");
define("L_INVITE", "%s vraag hem of haar je te vergezellen in <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> ruimte.");
define("L_INVITE_REG", " je moet je registreren om deze ruimte in te kunnen.");
define("L_INVITE_DONE", "uw uitnodiging is verzonden aan %s.");
define("L_OK", "verstuur");

// help popup
define("L_HELP_TIT_1", "lachen");
define("L_HELP_TIT_2", "Text codes voor de berichten");
define("L_HELP_FMT_1", "Je kan bold, italic en onderline tekst gebruiken in bericht in de HTML codes zoals &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; of &lt;U&gt; &lt;/U&gt; tags.<BR>Ter voorbeeld, &lt;B&gt;deze tekst&lt;/B&gt; wordt <B>deze tekst</B>.");
define("L_HELP_FMT_2", "Om link te maken (voor e-mail of URL) in jouw bericht, kun je gemakkelijk jou adres zonder alle tags in te voeren. De URL zal dan automatisch aangemaakt.");
define("L_HELP_TIT_3", "Commando's");
define("L_HELP_USR", "gebruiker");
define("L_HELP_MSG", "bericht");
define("L_HELP_ROOM", "ruimte");
define("L_HELP_BUZZ", "~geluidsnaam");
define("L_HELP_REASON", "de reden");
define("L_HELP_CMD_0", "{} is voor een verplichte instelling, [] voor een optionele.");
define("L_HELP_CMD_1a", "zet aantal boodschappen dat gezien worden bij binnenkomst, minimum en standaars is 5.");
define("L_HELP_CMD_1b", "herlaad het boodschappen scherm met aantal boodschappen dat gezien worden, minimum en standaars is 5..");
define("L_HELP_CMD_2a", "Tussenpoze voor het bijwerken van de lijst (in seconden).<BR>Als n niet opgegeven of als kleiner dan 3, verspringt het tussen geen bijwerken en bijwerken om de tien seconden.");
define("L_HELP_CMD_2b", "Tussenpoze voor het bijwerken van de lijst (in seconden).<BR>Als n niet opgegeven of als kleiner dan 3, verspringt het tussen geen bijwerken en bijwerken om de tien seconden.");
define("L_HELP_CMD_3", "Inverts boodschap volgorde (niet in alle browsers).");
define("L_HELP_CMD_4", "Ga naar een andere ruimte en maak hem indien nodig automatisch aan (als je dat mag tenminste).<BR>n is 0 voor een prive ruimte en 1 voor een openbare, default is 1 (openbaar).");
define("L_HELP_CMD_5", "Vertaat het chatten, eventueel met achterlaten van bericht.");
define("L_HELP_CMD_6", "Vermijd het tonen van de boodschappen van een gebruiker als de nickname is aangegeven.<BR>Zet het ignoreren uit voor een gebruiker als nick en - beiden zijn aangegeven, voor alle gebruikers als - is aangegeven maar de nick niet.<BR>Als geen optie is gegeven laat dit commando een venster zien met alle ge�gnoreerde nicks.");
define("L_HELP_CMD_7", "Haal de vorige regel terug (commando of boodschap).");
define("L_HELP_CMD_8", "Timestamp voor de boodschap weglaten of laten zien.");
define("L_HELP_CMD_9", "Schop een gebruiker van de chatbox. Deze commando kan alleen gebruikt worden door de operator of moderator.<br>Met de optie , [".L_HELP_REASON."] een rede op te geven van de verwijdering (reden).");
define("L_HELP_CMD_10", "Stuur een prive bericht naar de gespecificeerde gebruiker (andere gebruikers krijgen het niet te zien).");
define("L_HELP_CMD_11", "Laat de informatie zien van gekozen gebruiker.");
define("L_HELP_CMD_12", "Popup window om gebruikersprofiel aan te passen.");
define("L_HELP_CMD_13", "Schakel tussen ander gebruikers, uitloggen van de bestaande kamer.");
define("L_HELP_CMD_14", "Alleen administrateur en supervisor van de huidige kamer kan promoten naar ander kamer te gaan.");
define("L_HELP_CMD_15", "verwijder alle boodschappen en laat alleen de laatste 5 zien.");
define("L_HELP_CMD_16", "bewaar de laatste n Boodschappen (mededelingen niet meegeteld) in een HTML file. als n niet is ingesteld, zullen alle boodschappen worden bewaard.");
define("L_HELP_CMD_17", "hiermee kan de admin een boodschap sturen aan alle gebruikers in een ruimte.");
define("L_HELP_CMD_18", "stel voor aan een andere gebruiker in een andere ruimte om bij jou te komen.");
define("L_HELP_CMD_19", "staat een administrator of moderator om  te \"verbannen\" van een gebruiker dor een door de administrator ingestelde tijd..<BR>om een gebruiker van de chat te bannen en niet alleen van een ruimte gebruik dan het '*' teken.<br>Met de optie , [".L_HELP_REASON."] een rede op te geven van de verbannen (reden).");
define("L_HELP_CMD_20", "Vertel wat je doet zonder jezelf prijs te geven.");
define("L_HELP_CMD_21", "Dit laat iedereen zien in de ruimte en iedereen die jou een bericht stuurt<br> Dat je afwezig bent van je pc, als je weer terug komt kun je gewoon beginnen met typen.");
define("L_HELP_CMD_22", "Stuurt een buzzer aan de ruimte met eventueel een boodschap<br>- gebruik:<br />- oude boodschap: \"/buzz\" of \"/buzz en dan boodschap\" - dit speelt de vooraf ingestelde tune dat is ingesteld in het Admin paneel;<br />- extern gebruik: \"/buzz ~geluidsnaam\" of \"/buzz ~geluidsnaam en de boodschap\" - deze speelt dan de geluidsnaam.wav vanaf de plus/sounds folder; denk eraan dat het teken \"~\" vooraan het geluidsfragment moet staan. ");
define("L_HELP_CMD_23", "Stuur een <i>fluister</i> (prive boodschap). de boodschap zal altijd aankomen ook als de geadreserde niet aanwezig is, of in een andere ruimte.");
define("L_HELP_CMD_24", "Gebruik: De uitdrukking voor het onderwerp voor de ruimtes moeten minimaal 2 woorden bevatten.<br>dit commando veranderd het onderwerp van de huidige ruimte. Probeer niet om onderwerpen van andere gebruikers te onderdruken. Gebruik belangrijke onderwerpen.<br>Standaard, dit is een moderator/admin commando.<br>gebruik \"/topic top reset\" dit commado zal het huidige onderwerp wissen en terug zetten naar het standaard onderwerp.<br>Optioneel, \"/topic * {onderwerp}\" doet precies hetzelfde alleen nu in alle ruimtes (gemeenschappelijk onderwerp en gemeenschappelijk onderwerp reset).");
define("L_HELP_CMD_25", "Een spel met dobbelstenen.<br>Gebruik: /dice of /dice [n];<br>n kan elke waarde zijn <b>tussen 1 en %s</b> (deze waarde bepaald het aantal dobbelstenen). Als er geen waarde word gekozen zal het standaard aantal worden gebruik.");
define("L_HELP_CMD_26", "dit is een meer ingewikkelde versie van het commando /dice (dobbelstenen).<br>gebruik: /{n1}d[n2] of /{n1}d;<br>n1 Kan elke waarde zijn <b>tussen 1 en %s</b> (deze waarde is het aantal wordpen ).<br>n2 kan elke waarde zijn <b>tussen 1 en %s</b> (it represents the number of rolling dices per throw).");
define("L_HELP_CMD_27", "deze functie laat alle boodschappen van een gebruikers oplichten.<br>gebruik: /high {gebruiker} of druk op <img src=./images/highlightOff.gif> vierkantje rechts van de gebruikersnaam(in the ruimtes/gebruikerslijst)");
define("L_HELP_CMD_28", "Hiermee kunt u <i>een enkele foto</i> als plaatje.<br>gebruik: Het plaatje moet op een openbare ruimte staan op internet, anders zal het niet werken<br>Voledige link is benodigd! V.B.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br>toegestane extensies: .jpg .bmp .gif .png. de link is hoofdletter gevoelig!<br>HINTS: typ /img dan een spatie en plak dan de url ; om een goede url te krijgen van een plaatje:, rechtsklikken op het plaatje dat je wil , dan selecteer het hele adres (dus vanaf HTTP://) en kopy de tekst en plak deze in de regel bij je chat.");
define("L_HELP_CMD_29", "het tweede commando laat toe dat de administrator of moderator(s) van de huidige ruimte om moderators te degraderen naar gewone gebruikers.<br>de * optie doet dit in alle ruimtes.");
define("L_HELP_CMD_30", "het tweede commando doet hetzelfde als het /me commando maar zal nu ook je geslacht laten weten: B.V.<br /> * Mr Ciprian is tv aan het kijken of Mrs Dana is blij.");
define("L_HELP_CMD_31", "Verander de volgorde van de gebruikers in een ruimte: op binnenkomst of naam.");
define("L_HELP_CMD_32", "dit is en derder versie van de dobbelstenen.<br>Gebruik: /d{n1}[tn2] of /d{n1};<br>n1 kan elke waarde zijn <b>tussen 1 en 100</b> (het geeft aan hoeveel buerten per dobbelsteen).<br>n2 kan elke waarde zijn <b>tussen 1 en %s</b> (dit geeft aan het antal dobbelstenen).");
define("L_HELP_CMD_33", "veranderd de grote van de letters door de gebruikers gekozen grote (toegestane waardes n: <b>tussen 7 en 15</b>); het /size commando resets alles weer na de standard waardes.");
define("L_HELP_ETIQ_1", "Chat regels");
define("L_HELP_ETIQ_2", "we willen deze site leuk en netjes houden, dus gaarne de volgende regels volgen. als je je niet aan de regels kunt houden loop je kans door een moderator of administrator eruit gegooid te worden of zlefst geband.<br /><br>Dank u wel,");
define("L_HELP_ETIQ_3", "Onze chat regels");
define("L_HELP_ETIQ_4", "Ga niet &quot;spammen&quot; door bevoorbeeld doorgaans onzin te typen.;</li><li>Gebruik geen rare teksten zoals HaLlO AllEmAl;</li><li>Let erop dat je caps uitstaan (hoofdletters) dit word gezien als schreeuwen;</li><li>Houdt er rekening mee dat er mensen van over de hele wereld hier kunnen chatten, hou er dus rekening mee dat er verschillende geloven kunnen zijn, respecteer oo deze mensen;</li><li>DISCRIMINATIE WORD NIET GETOLEREERD!!;</li><li>spreek gebruikers aan met hun gebruikersnaam en niet (indien men elkaar kent) met de echte namen, men kan dit vervelend vinden!!");

// message frame
define("L_NO_MSG", "Geen bericht");
define("L_TODAY_DWN", "de boodschappen van vandaag beginnen onder de lijn");
define("L_TODAY_UP", "De boodschapen die gisteren verstuurd zijn starten boven de lijn.");

// message colors
$TextColors = array(	"Zwart" => "#000000",
				"Rood" => "#FF0000",
				"Groen" => "#009900",
				"Blauw" => "#0000FF",
				"Paars" => "#990099",
				"Donker rood" => "#990000",
				"Donker groen" => "#006600",
				"Donker blauw" => "#000099",
				"Maroen" => "#996633",
				"Zee blauw" => "#006699",
				"Oranje" => "#F5671B");

// ignored popup
define("L_IGNOR_TIT", "Niet uitgevoerd");
define("L_IGNOR_NON", "Geen ge�gnoreerde gebruiker");

// whois popup
define("L_WHOIS_ADMIN", "Administrator");
define("L_WHOIS_MODER", "Supervisor");
define("L_WHOIS_USER", "Gebruikers");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s komt binnen in deze ruimte" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s komt binnen in deze ruimte");
define("L_ENTER_ROM_NOSOUND", "%s komt binnen in deze ruimte");
define("L_EXIT_ROM", "%s is uitlogd");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s is van de ruimte verwijderd wegens het niet actief deelnemen in de chat");
define("L_CLOSED_ROM", "%s Heeft het chatvenster gesloten");

// Text for /away command notification string:
define("L_AWAY", "%s is niet aan de toetsen");
define("L_BACK", "%s is terug!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Snel Menu *****");	//&nbsp; means one blank space. deze will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", "heeft het onderwerp gezet op:");
define("L_TOPIC_RESET", "heeft het onderwerp gereset");
define("L_HELP_TOP", "minimaal 2 oorden als onderwerp aub");

// Img cmd mod
define("L_PIC", "plaatje geplaatst dor");
define("L_PIC_RESIZED", "grote aangepast aan");
define("L_HELP_IMG", "voledige url adres van de foto/plaatje");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s is geen moderator.");
define("L_IS_NO_MOD_ALL", "%s is geen moderator meer voor de ruimtes van deze chatbox.");
define("L_ERR_IS_ADMIN", "%s is de administrator!\\nje kunt zijn rechten niet wijzigen.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra commando's beschikbaar:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra onderdelen beschikbaar:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">onze beschikbare bot is: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "je moedertaal");
define("L_PRO_2", "favoriete link 1");
define("L_PRO_3", "favoriete link 2");
define("L_PRO_4", "omschrijving");
define("L_PRO_5", "foto of plaatje URL");
define("L_PRO_6", "uw naam/text kleuren");

// Avatar mod
define("L_ERR_AV", "fout adres.");
define("L_TITLE_AV", "uw huidige avatar: ");
define("L_CHG_AV", "klik 'verander' het profiel<br>om uw Avatar op te slaan.");
define("L_SEL_NEW_AV", "Selecteer een nieuwe Avatar");
define("L_EX_AV", "(voorbeeld: http://mysite/images/mypic.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Enter URL, daarne ENTER om te kijken)");
define("L_CANCEL", "afwijzen");
define("L_CLICK", "klik hier");

// PluceBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Onze bot is actief in de ruimtes, om te praten, type <b>hello ".C_BOT_NAME.'</b>. om te stoppen, type: <b>bye '.C_BOT_NAME.'</b>. (private: /to <b>'.C_BOT_NAME.'</b> Message)'); //make sure uw translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Onze bot is actief in de ruimtes %s. u kunt prive met de bot chatten. (commando: /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure uw translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Onze bot is niet publiek aanwezig. alleen prive gesprekken mogelijk. (commands: /to <b>".C_BOT_NAME."</b> Message or /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure uw translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot niet aanwezig in deze ruimte!");
define("BOT_START_ERROR", "Bot aanwezig in deze ruimte!");
define("BOT_DISABLED_ERROR", "Bot is uitgeschakeld!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "heeft de dobbelstenen gegooid:");
define("DICE_WRONG", "geef aan hoeveel dobbelstenen\\n(kies a nummer tussen 1 en ".MAX_ROLLS.').\\n type /dice aantal dobbelstenen '.MAX_ROLLS.' dices.');
define("DICE2_WRONG", "de tweede waarde moet tussen 1 en ".MAX_ROLLS.'.\\nleeg om ze allemaal te gebruiken '.MAX_ROLLS.' dices\\n(e.g. /'.MAX_DICES.'d of /'.MAX_DICES.'d'.MAX_ROLLS.').');
define("DICE2_WRONG1", "de eerste waarde moet tussen 1 en ".MAX_DICES.'.\\n(e.g. /'.MAX_DICES.'d of /'.MAX_DICES.'d'.MAX_ROLLS.').');
define("DICE3_WRONG", "de tweede waarde moet tussen 1 en ".MAX_ROLLS.'.\\nleeg om ze allemaal te gebruiken '.MAX_ROLLS.' dices\\n(e.g. /d50 of /d100t'.MAX_ROLLS.').');

// Log mod by Ciprian
define("L_ARCHIVE", "Open archieven");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "popups voor prive boodschappen");
define("L_PRIV_POST_MSG", "stuur een prive boodschap!");
define("L_PRIV_MSG", "nieuwe priveboodschap ontvangen!");
define("L_PRIV_MSGS", "nieuwe priveboodschap ontvangen!");
define("L_PRIV_MSGSa", "Hier zijn de eerste 10 boodschappen!<br>gebruik de link onderaan om de rest te zien.");
define("L_PRIV_MSG1", "Van:");
define("L_PRIV_MSG2", "ruimte:");
define("L_PRIV_MSG3", "Aan:");
define("L_PRIV_MSG4", "Boodschap:");
define("L_PRIV_MSG5", "geplaatst&nbsp;:");
define("L_PRIV_REPLY", "Beantwoord");
define("L_PRIV_READ", "klik op de close link om alles als gelezen te markeren!");
define("L_PRIV_POPUP", "je kunt deze popup fucntie altijd aan of uit zetten<br>door uw profiel te raadplegen (alleen geregistreerde gebruikers)");
define("L_NOT_ONLINE", "%s is niet online.");
define("L_PRIV_NOT_ONLINE", "%s is niet online,\\nMaar zal uw boodschap ontvangen wanneer deze weer inlogt.");
define("L_PRIV_NOT_INROOM", "%s is niet in deze ruimte.\\nals je deze gebruiker toch een boodschap wil sturen,\\ngebruik het commando: /wisp %s boodschap.");
define("L_PRIV_AWAY", "%s is afwezig,\\nmaar zal wel je boodschap ontvangen\\nals deze terug komt.");

// Color Input Box mod by Ciprian
define("L_COLOR", "kleur:");
define("L_COLOR_HEAD", "kleuren raster");
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Aan " : "Uit"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Aan " : "Uit"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Huidige Instellingen</u>:<br>a) Kleur Filters = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br>b) kleuren voor gasten = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Standard Kleuren</u>: Administrator = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderators = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Other users = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Standard Kleur</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Kleuren raster");
define("L_COL_HELP_SUB1", "gebruik:");
define("L_COL_HELP_P1", "You can select your own default color by editing your profile. You'll still be able to use any other color. To change back to your default color from a random used one, you have to chose once the default color (Null) - it is the first one in the select list.");
define("L_COL_HELP_SUB2", "Hints:");
define("L_COL_HELP_P2", "<u>KleurRange</u><br>afhankelijk van uw browser, het kan zijn dat sommige kleuren niet zichtbaar zijn. standaard zijn er 16 kleuren ondersteund.:");
define("L_COL_HELP_P2a", "als een gebruiker klaagt dat deze uw teksten niet kan zien, gebruikt deze waarschijnlijk een oudere browser.");
define("L_COL_HELP_SUB3", "instellingen van deze chatbox:");
define("L_COL_HELP_P3", "<u>Power levels of Kleurgebruik</u>:<br>1. Administrator kan elke kleur gebruiken.<br>de standaard kleur voor de administrator is <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br>2. Moderators kunnen elke kleur gebruiken behalve: <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> en <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br>de standaard kleur voor moderators is <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br>3. Andere gebruikers kunnen alle kleuren kiezen behalve <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> en <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "The Standard Kleuris <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Technical stuff</u>: deze kleuren zijn door de administrator gereserveerd in admin panel.<br>als er iets fout gaat of je vind de kleur niets, neem dan contact op met de <b>administrator</b>en niet met andere gebruikers, omdat deze toch niets kunnen doen. :-)");
define("L_COL_HELP_USER_STATUS", "uw status");
define("L_COL_TUT", "gebruikend van de kleuren tekst raster");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "alleen een admin kan gebruik maken van: ".COLOR_CA." color!\\n\\nuw text Kleurresets to ".COLOR_CM."!\\n\\n kies een andere kleur.");
define("COL_ERROR_BOX_USRA", "alleen een admin kan gebruik maken van: ".COLOR_CA." color!\\n\\ngebruik geen ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\ndeze zijn gereserveerd voor powerusers!\\n\\nuw text Kleurresets to ".COLOR_CD."!\\n\\nkies een andere kleur.");
define("COL_ERROR_BOX_USRM", "je moet een moderator zijn om gebruik te maken van ".COLOR_CM." color!\\n\\ngebruik geen ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\ndeze zijn gereserveerd voor powerusers!\\n\\nuw text Kleurresets to ".COLOR_CD."!\\n\\nKies een andere kleur.");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","gebruikers zijn ".LOGIN_LINK."aan het chatten</A> op dit moment.</td></tr>");
define("USERS_LOGIN","1 gebruiker is ".LOGIN_LINK."aan het chatten</A> op dit moment.</td></tr>");
define("NO_USER","niemand ".LOGIN_LINK."aanwezig</A> op dit moment.</td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Welkom op deze chatbox, wees netjes en aardig voor iedereen, volg de regels van de chatbox: <I>blijf netjes en aardig</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Welkom op deze chatbox, wees netjes en aardig voor iedereen, volg de regels van de chatbox: <I>blijf netjes en aardig</I>.");
define("WELCOME_MSG_NOSOUND", "Welkom op deze chatbox, wees netjes en aardig voor iedereen, volg de regels van de chatbox: <I>blijf netjes en aardig</I>.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "fluisteren (Prive boodschappen)\\nis uitgeschakeld in deze chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "de grote van de font kan alleen\\nnul (zijn voor een reset) of tussen 7 en 15");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "De instellingen van deze chatserver zijn zojuist veranderd. Om fouten te voorkomen graag op F5 drukken of uitloggen en weer opnieuw inloggen.");

// Week days for status worldtime by Ciprian
define("L_MON", "Ma"); //Maandag
define("L_TUE", "Di"); //Dinsdag
define("L_WED", "Wo"); //Woensdag
define("L_THU", "Do"); //Donderdag
define("L_FRI", "Vr"); //Vrijdag
define("L_SAT", "Za"); //Zaterdag
define("L_SUN", "Zo"); //Zondag
?>