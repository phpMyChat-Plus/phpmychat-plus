<?php
// File : swedish/localized.chat.php - plus version (09.07.2007 - rev.22)
// Original file by Martin Edelius <martin.edelius@spirex.se>
// Updates, corrections and additions for the Plus version by Heikki <heikki@yttervik.be>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Användar Guide");

define("L_WEL_1", "Meddelanden raderas efter");
define("L_WEL_2", "och användarnamn fri görs efter");

define("L_CUR_1", "Här är");
define("L_CUR_1a", "för närvarande");
define("L_CUR_1b", "för närvarande");
define("L_CUR_2", "i chatten");
define("L_CUR_3", "Användare för närvarande i rum");
define("L_CUR_4", "användare i privata rums");
define("L_CUR_5", "Användare aktivt lurpassar<br />(har denna sidan öppet):");

define("L_SET_1", "Vänligen välj ...");
define("L_SET_2", "ditt användarnamn");
define("L_SET_3", "antal meddelanden att visa");
define("L_SET_4", "tiden mellan uppdateringarna");
define("L_SET_5", "Välj ett rum ...");
define("L_SET_6", "standard rums");
define("L_SET_7", "Gör ditt val ...");
define("L_SET_8", "publika rums skapade av användare");
define("L_SET_9", "skapa din egen");
define("L_SET_10", "publika");
define("L_SET_11", "privata");
define("L_SET_12", "rum");
define("L_SET_13", "Sedan, till ");
define("L_SET_14", "chatt");
define("L_SET_15", "tillgängliga rum");
define("L_SET_16", "användarens Privata rum");
define("L_SET_17", "välj din Alias bild");
define("L_SET_18", "Gör denna sida till ditt favorit: tryck \"CTRL +D\".");

define("L_SRC", "kan hämtas gratis från");

define("L_SECS", "sekunder");
define("L_MIN", "minut");
define("L_MINS", "minuter");
define("L_HOUR", "timme");
define("L_HOURS", "timmar");

// registration stuff:
define("L_REG_1", "ditt lösenord");
define("L_REG_2", "Registrerade användare");
define("L_REG_3", "Registrera");
define("L_REG_4", "Editera användarprofil");
define("L_REG_5", "Radera användare");
define("L_REG_6", "Användarregistrering");
define("L_REG_7", "endast om du är registrerad");
define("L_REG_8", "din e-mail");
define("L_REG_9", "Dina uppgifter sparades korrekt.");
define("L_REG_10", "Tillbaka");
define("L_REG_11", "Redigera");
define("L_REG_12", "Uppdaterar användarinformation");
define("L_REG_13", "Raderar användare");
define("L_REG_14", "Loggin");
define("L_REG_15", "Logga in");
define("L_REG_16", "Ändra");
define("L_REG_17", "Din information uppdaterades korrekt.");
define("L_REG_18", "Du blev utslängd ur rummet av moderatorn.");
define("L_REG_18a", "Du blev utslängd ur rummet av moderatorn.<br />Orsak: %s");
define("L_REG_19", "Vill du verkligen bli borttagen?");
define("L_REG_20", "Ja");
define("L_REG_21", "Du blev borttagen korrekt.");
define("L_REG_22", "Nej");
define("L_REG_25", "Stäng");
define("L_REG_30", "förnamn");
define("L_REG_31", "efternamn");
define("L_REG_32", "WEB");
define("L_REG_33", "visa e-mail vid /whois kommando");
define("L_REG_34", "Redigera användarprofil");
define("L_REG_35", "Administration");
define("L_REG_36", "Län/Region/Land");
define("L_REG_37", "Fält med ett <span class=\"error\">*</span> måste vara i fyllda.");
define("L_REG_39", "Rummet du var inloggad på har tagits bort av administratören.");
define("L_REG_45", "kön");
define("L_REG_46", "man");
define("L_REG_47", "kvinna");
define("L_REG_48", "ej specificerad");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Dina inställningar till chatten");
define("L_EMAIL_VAL_2", "Välkommen till Chatten.");
define("L_EMAIL_VAL_Err", "Server fel, kontakta Chatadmin: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Ditt lösenord har skickat till din e-post adress.<br />Du kan ändra ditt lösenord vid inloggnings sida under redigera din profil.");

// admin stuff
define("L_ADM_1", "%s är inte längre ordningsman för detta rum.");
define("L_ADM_2", "Du är inte längre registrerad användare.");

// error messages
define("L_ERR_USR_1", "Det här användarnamnet är upptaget. Vänligen välj ett annat.");
define("L_ERR_USR_2", "Du måste välja ett användarnamn.");
define("L_ERR_USR_3", "Detta användarnamn är registrerat.<br />Vänligen fyll i lösenord eller välj ett nytt.");
define("L_ERR_USR_4", "Felaktigt lösenord angivet.");
define("L_ERR_USR_5", "Du måste ange ett användarnamn.");
define("L_ERR_USR_6", "Du måste ange ett lösenord.");
define("L_ERR_USR_7", "Du måste ange din e-post.");
define("L_ERR_USR_8", "Du måste ange en korrekt e-post adress.");
define("L_ERR_USR_9", "Det är användarnamnet är upptaget.");
define("L_ERR_USR_10", "Felaktigt användarnamn eller lösenord.");
define("L_ERR_USR_11", "Du måste vara administratör.");
define("L_ERR_USR_12", "Du är administratör så du kan ej tas bort.");
define("L_ERR_USR_13", "Du måste registrera dig för att få skapa egna rums.");
define("L_ERR_USR_14", "Du måste registrera dig för att få chatta.");
define("L_ERR_USR_15", "Du måste skriva hela ditt namn.");
define("L_ERR_USR_16", "Endast dessa extra-tecknet tillåtna:\\n".$REG_CHARS_ALLOWED."\\nMellanslag, komma eller snedstrek (\\) är inte tillåtna.\\nKolla.");
define("L_ERR_USR_16a", "Endast dessa extra-tecknet tillåtna:<br />".$REG_CHARS_ALLOWED."<br />Mellanslag, komma eller snedstrek (\\) är inte tillåtna. Kolla.");
define("L_ERR_USR_17", "Dett här rummet finns inte och du är inte tillåten att skapa en ny.");
define("L_ERR_USR_18", "Bannlyst ord hittades i ditt användar namn.");
define("L_ERR_USR_19", "Bara ett rum i taget!");
define("L_ERR_USR_20", "Du har blivit bortkopplad från detta rum eller från chatten.");
define("L_ERR_USR_20a", "Du har blivit bortkopplad från detta rum eller från chatten.<br />Orsak: %s");
define("L_ERR_USR_21", "Du har inte varit aktiv de senaste ".C_USR_DEL." minuter,<br />därför är du utloggat från rummet.");
define("L_ERR_USR_22", "Kommandot inte användbar för\\nmed webläsaren du använder (IE motor).");
define("L_ERR_USR_23", "Att kunna delta i privata, rum du måst vara registrerad.");
define("L_ERR_USR_24", "Att skriv ditt eget privata rum, du måste vara registrerad.");
define("L_ERR_USR_25", "Endast administratör kan använda ".$COLORNAME." färg!<br />Försök inte använda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." eller ".COLOR_CM1.".<br />Dessa är reserverade för konstruktörer!");
define("L_ERR_USR_26", "Endast administratörer och ordningsmän kan använda ".$COLORNAME." färg!<br />Försök inte använda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." eller ".COLOR_CM1.".<br />Dessa är reserverade för konstruktörer!");
define("L_ERR_USR_27", "Du kan inte chatta privat med dig själv.\\nVar God och...\\nVälj en annan användarnamn.");
define("L_ERR_ROM_1", "Rummets namn får inte innehålla komma eller backslash (\\).");
define("L_ERR_ROM_2", "Bannlysta ord hittades i rummet namn du vill skriva.");
define("L_ERR_ROM_3", "Det finns redan en publik rum med det här namnet.");
define("L_ERR_ROM_4", "Ogiltigt rums namn.");

// users frame or popup
define("L_EXIT", "Sluta chatta");
define("L_DETACH", "Fristående användar lista");
define("L_EXPCOL_ALL", "Expandera/Fäll ihop alla");
define("L_CONN_STATE", "Anslutnings status");
define("L_CHAT", "Chatta");
define("L_USER", "användare");
define("L_USERS", "användare");
define("L_LURKER", "lurpassar");
define("L_LURKERS", "lurpassare");
define("L_NO_USER", "Inga användare");
define("L_ROOM", "rum");
define("L_ROOMS", "rums");
define("L_EXPCOL", "Expandera/Fäll ihop rummet");
define("L_BEEP", "Ljud/inget ljud när användare kommer");
define("L_PROFILE", "Visa profil");
define("L_NO_PROFILE", "Ingen profil");

// input frame
define("L_HLP", "Hjälp");
define("L_MODERATOR", "%s är nu ordningsman för det här rummet.");
define("L_KICKED", "%s blev utslängd ok.");
define("L_KICKED_REASON", "%s har framgångsrikt utslängd. (Orsak: %s)");
define("L_BANISHED", "%s har blivit bannlyst.");
define("L_BANISHED_REASON", "%s har framgångsrikt blivit bannlyst. (Orsak: %s)");
define("L_ANNOUNCE", "ANMÄL");
define("L_INVITE", "%s bjud in hon/han att delta, in till <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> rum.");
define("L_INVITE_REG", " Du har fått inbjudan att delta i detta rum.");
define("L_INVITE_DONE", "Din inbjudan sändes till %s.");
define("L_OK", "Sänd");
define("L_BUZZ", "Ring signaler");
define("L_BAD_CMD", "Inte ett giltigt kommando!");
define("L_ADMIN", "%s är redan administratör!");
define("L_IS_MODERATOR", "%s är redan ordningsman!");
define("L_NO_MODERATOR", "Endast ordningsman för det här rummet får använda detta kommandot.");
define("L_NONEXIST_USER", "%s finns inte i den här rummet.");
define("L_NONREG_USER", "%s är inte registrerad.");
define("L_NONREG_USER_IP", "Hans IP är: %s.");
define("L_NO_KICKED", "%s är ordningsman eller admin och kan inte bli utslängd.");
define("L_NO_BANISHED", "%s är ordningsman eller administratör och kan inte bannlysas.");
define("L_SVR_TIME", "Servertid: ");
define("L_NO_SAVE", "Inget att spara!");
define("L_NO_ADMIN", "Endast administratör kan Använda kommandot.");
define("L_NO_REG_USER", "Du måste vara registred i chatten att kunna använda detta kommandot.");

// help popup
define("L_HELP_TIT_1", "Smilis");
define("L_HELP_TIT_2", "Textformattering för meddelanden");
define("L_HELP_FMT_1", "Du kan göra text fet, kursiv eller understruken genom att innesluta textavsnittet med &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; or &lt;U&gt; &lt;/U&gt; taggar.<br />Till exempel, &lt;B&gt;den här texten&lt;/B&gt; genererar <B>den här texten</B>.");
define("L_HELP_FMT_2", "För att skapa en hyperlänk i dina meddelanden så skriver du bara in adressen utan några taggar. Länken skapas automatiskt.");
define("L_HELP_TIT_3", "Kommandon");
define("L_HELP_NOTE", "Alla kommandon maste vara på Engelska!");
define("L_HELP_USR", "användare");
define("L_HELP_MSG", "meddelande");
define("L_HELP_ROOM", "rum");
define("L_HELP_BUZZ", "~signalnamn");
define("L_HELP_REASON", "orsak");
define("L_HELP_CMD_0", "{} innebär ett obligatoriskt alternativ, [] ett valfritt.");
define("L_HELP_CMD_1a", "Sätta antal meddelanden att visa, minimum och Standard är 5.");
define("L_HELP_CMD_1b", "Återladda meddelande ram och visa n senaste meddelanden, minimal och standard är 5.");
define("L_HELP_CMD_2a", "Modifiera uppdateringsfrekvensen på meddelanden (i sekunder).<br />Om n inte är specificerad eller mindre än 3 så växlar kommandot mellan 10 sekunder och ingen uppdatering.");
define("L_HELP_CMD_2b", "Modifiera meddelanden och användare justera uppdaterings fördröjning (i sekunder).<br />Om n är inte specifierat eller mindre än 3, växlar mellan ingen uppdatering och 10s uppdatering.");
define("L_HELP_CMD_3", "Byt ordningsföljd på meddelanden.");
define("L_HELP_CMD_4", "Anslut till ett rum, skapandes den om den inte finns (förutsatt att du får skapa rums).<br />Sätt n till 0 för en privat rum och 1 för en publik, startvärde är 1.");
define("L_HELP_CMD_5", "Lämna chatten efter att du lämnar ett frivillig meddelande.");
define("L_HELP_CMD_6", "Ignorera meddelanden från den användare du anger.<br />Sluta ignorera specifik användare när du anger både - och användarnamn eller sluta ignorera alla användare när enbart - anges.<br />Utan alternativ så poppar ett fönster upp med en lista över alla ignorerade användare.");
define("L_HELP_CMD_7", "Upprepa föregående text (kommando eller meddelande).");
define("L_HELP_CMD_8", "Visa/Dölj tid före meddelanden.");
define("L_HELP_CMD_9", "Slänger ut användare från ett rum. Kan endast användas av ordningsman.<br />Valfri, [".L_HELP_REASON."] visar orsak av kicking (nagra önskade text).");
define("L_HELP_CMD_10", "Skicka ett privat meddelande till specificerad användare (ingen annan ser det).");
define("L_HELP_CMD_11", "Visa information om specificerad användare.");
define("L_HELP_CMD_12", "Poppar upp fönster för redigera av användarens uppgifter.");
define("L_HELP_CMD_13", "Växlar notifiering när användare loggar på och lämnar rummet.");
define("L_HELP_CMD_14", "Gör det möjligt för administratören eller den aktuella rummets ordningsman att befordra en annan användare till ordningsman för det aktuella rummet.");
define("L_HELP_CMD_15", "Rensa meddelande ram och visa bara föregående 5 meddelanden.");
define("L_HELP_CMD_16", "Spara föregående n meddelanden (enstaka meddelande borttagen) till en HTML fil. If n is not specified, alla tillgängliga meddelanden kommer att tas intill beräkning.");
define("L_HELP_CMD_17", "Tillåta administratör att skicka an announce to all users whatever the room they are chatting into.");
define("L_HELP_CMD_18", "Föreslå en användare från ett annat rum, att komma till rummet du är i.");
define("L_HELP_CMD_19", "Tillåta ordningsman av rummet eller administratör att \"banish\" användare från rum för en tid definierade av administratör.<br />Senare kan förvisa en användare chatting i ett annat rum än han är inne och använder * inställningar för bannlysning \"forever\" en användare från chatt helt och hållet.");
define("L_HELP_CMD_20", "Beskriva vad du gör utan att hänvisa dig själv.");
define("L_HELP_CMD_21", "Meddela rum och användare som provar skicka till dig meddelanden<br /> att du är borta från datorn. Om du vill komma tillbaka till chat, bara börja skriva.");
define("L_HELP_CMD_22", "Sänder ett ljud och valfritt visar ett meddelande i nuvarande rum.<br />- Användande:<br />- gammal användande: \"/buzz\" eller \"/buzz meddelande kommer att vara synligt\" - spelar standard ljud för signal definierade i Administrations panel;<br />- utökad användande: \"/buzz ~signalnamn\" eller \"/buzz ~signalnamn meddelande att vara visade\" - spelar signalnamn.wav fil från plus/sounds mapp; vänligen notera tecknet \"~\" att användas i början av andra ord, vilken är namn av ljud fil, utan tillägg .wav (bara .wav tillägg tillåten).<br />Från grund iinstallation, är detta ett ordningsman/administratörs kommando.");
define("L_HELP_CMD_23", "Skicka <i>viskning</i> (privat meddelande). meddelande kommer att nå mål, oavsätt vilken rum användaren är i. Om användaren är inte on-line eller har gått från, du kommer att vara underrättad om det.");
define("L_HELP_CMD_24", "Användande: ämne skall innehålla åtminstone 2 ord.<br />Denna kommando ändrar toptext av nuvarande rum. Prova inte att åsidosätta andra användarens toptext. Använda viktig toptext.<br />Som standard, detta är ett ordningsman/administration kommando.<br />Användande \"/topic top reset\" kommando nuvarande toptext raderas och återställts till standar text för rum.<br />Valfri, \"/topic * {}\" gör exakt detsamma men, i alla rum (globala toptext återställes).");
define("L_HELP_CMD_25", "ETT spel av tärningar för slumpvis tal.<br />Användande: /dice eller /dice [n];<br />n kan ta alla värde <b>mellan 1 och %s</b> (det representerar antalet rullande tärningar). Om inget nummero angett, standar maximal rullningar kommer att användas.");
define("L_HELP_CMD_26", "Detta är ett mer komplexa version av /dice kommando.<br />Användande: /{n1}d[n2] eller /{n1}d;<br />n1 kan ta alla värden <b>mellan 1 och %s</b> (det representerar antalet kastning).<br />n2 kan ta alla värde <b>mellan 1 och %s</b> (det representerar antalet rullande tärningar per slänga).");
define("L_HELP_CMD_27", "Markera bakgrung på meddelanden av en specifik användare för att lättare läsa över conversations.<br />Användande: /high {användare} eller tryck små <img src=./images/highlightOff.gif> ruta på höger om användarnamn (i rum/användare lista)");
define("L_HELP_CMD_28", "Den tillåter avsända <i>en enkel bild</i> som meddelande.<br />Användande: bilder kommer att vara på internet och fritt åtkomlig för alla. Använd inte sidor där inloggning behövs .<br />Full länk för bild måste vara skrivet! Expl. <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Tillåten tillägg: .jpg .bmp .gif .png. länk är känslig för STORA/små!<br />TIPS: skriv /img mellanslag och infoga URL in i fällt; att få URL av en bild från websidan, när du höger klickar på bilden, gå till egenskaper, sedan markera hela adress/URL (ibland måste bläddra ner en bit) och kopiera/infoga efter /img<br />Använd inte bilder från din pc: den kommer att göra avbrott på chat fönster!!!");
define("L_HELP_CMD_29", "Andra kommando kommer att tillåta administratör eller ordningsman av nuvarande rum att sänka ner annan registrerat användare tidigare upphöjd till ordningsman för samma rum.<br /> * valet kommer att sänka ner användarens status från alla rum.");
define("L_HELP_CMD_30", "Andra kommando gör detsamma som /me men den kommer att visa din/er respektive kön/genus<br />Expl. * Herr Ciprian tittar på TV eller Fru Heikki är glad.");
define("L_HELP_CMD_31", "Ändra hur användare är sorterad i listan: sorterings ordning tid eller alfabetiskt.");
define("L_HELP_CMD_32", "Detta är ett tredje (roleplaying) version av tärnings rullning.<br />Användande: /d{n1}[tn2] or /d{n1};<br />n1 kan ta alla värde <b>mellan 1 och 100</b> (det representerar antalet rullning per tärning).<br />n2 kan ta alla värden <b>mellan 1 och %s</b> (det representerar antalet rullande tärningar per slänga).");
define("L_HELP_CMD_33", "Ändra teckensnitt storlek av meddelanden i chat till användare val (tillåtna värden för n: <b>mellan 7 och 15</b>); /size kommando återställer teckensnitt storlek till standar värde (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Chat Netikett");
define("L_HELP_ETIQ_2", "Vår plats skall kunna behålla dess samhälle/gemenskap vänlig och kul, så vänligen stå fast vid till följande riktlinjer. Om du avviker från dessa regler, en av våra chat ordningsmän kan/får stövla ut dig från chatt.<br /><br />Tack,");
define("L_HELP_ETIQ_3", "Vår Chat Netikett Riktlinjer");
define("L_HELP_ETIQ_4", "Skicka inte \"spam\" chat skriven av dumheter eller slumpvis bokstäver.</li>
<li>Använd inte aLtErnAtiNg tecken.</li>
<li>Behåll inte CAPS Lock, använd småbokstäver, Dom stora anses som vrålande.</li>
<li>Behåll i tanken att eran chatt användare är från hela världen, och de flesta troligen, du/ni kommer att möta folk av annorlunda/olika troende. Var vänlig och artig till dessa folk.</li>
<li>Gör inte direkt hädelse mot andra medlemmarna. Faktiskt, prova att styra ungtjuren i dig, självklar att inte använda sig av hädelse och/eller svär ord.</li>
<li>Kalla inte andra medlemmar med deras riktiga namn, inte uppskattad. Använda deras nicknamns istället.");

// messages frame
define("L_NO_MSG", "Det finns för närvarande inga meddelanden ...");
define("L_TODAY_DWN", "Meddelanden som har sänt idag start här nedan");
define("L_TODAY_UP", "Meddelanden som har sänt idag start här ovan");

// message colors
$TextColors = array(	"Svart" => "#000000",
				"Röd" => "#FF0000",
				"Grön" => "#009900",
				"Blå" => "#0000FF",
				"Rosa" => "#9900FF",
				"Mörk röd" => "#990000",
				"Mörk grön" => "#006600",
				"Mörk blå" => "#000099",
				"Rödbrun" => "#996633",
				"Vatten blå" => "#006699",
				"Morot" => "#FF6600");

//ignored popup
define("L_IGNOR_TIT", "Ignorerad");
define("L_IGNOR_NON", "Inga ignorerade användare");

// whois popup
define("L_WHOIS_ADMIN", "Administratör");
define("L_WHOIS_MODER", "Ordningsman");
define("L_WHOIS_USER", "Användare");
define("L_WHOIS_GUEST", "Gäst");
define("L_WHOIS_REG", "Registerad");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s kom till rummet" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s kom till rummet");
define("L_ENTER_ROM_NOSOUND", "%s kom till rummet");
define("L_EXIT_ROM", "%s lämnar rummet");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s har automatiskt blivit booted från detta rum för overksamhet");
define("L_CLOSED_ROM", "%s har stängd webläsaren");

// Text for /away command notification string:
define("L_AWAY", "%s är bort markerad");
define("L_BACK", "%s är tillbaka!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Snabb Meny *****");	//&nbsp; means one blank space. this will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", "har sätts som TOPIC till:");
define("L_TOPIC_RESET", "har återställt TOPIC");
define("L_HELP_TOP", "åtminstone två ord som topic");

// Img cmd mod
define("L_PIC", "Bild avsänd av");
define("L_PIC_RESIZED", "Ändrad till");
define("L_HELP_IMG", "full/hel sökväg att sända bild till ");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s är inte längre orningsman för någon rum i detta chatt.");
define("L_IS_NO_MODERATOR", "%s är inte ordningsman.");
define("L_ERR_IS_ADMIN", "%s är administratör!\\nDu kan inte ändra hans behörighets nivå.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra Kommando tillgänglig:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra Finesser/Mods tillgänglig:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Vår tillgänglig bot är: </span><u>".C_BOT_NAME."</u>.");

//profile mod
define("L_PRO_1", "talar språk");
define("L_PRO_2", "Favorit länk 1");
define("L_PRO_3", "Favorit länk 2");
define("L_PRO_4", "Beskrivning");
define("L_PRO_5", "Bild URL");
define("L_PRO_6", "Ditt namns/text färger");

// Avatar mod
define("L_ERR_AV", "Fel URL eller icke-existerande server.");
define("L_TITLE_AV", "Ditt nuvarande avatar: ");
define("L_CHG_AV", "Klick ’Ändra’ i Profil formulär <br />att spara din Avatar bild.");
define("L_SEL_NEW_AV", "Välj en ny Avatar bild");
define("L_EX_AV", "(example: http://mittdomännamn/images/mypic.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Enter URL, then hit ENTER till att se)");
define("L_CANCEL", "Avbryt");
define("L_CLICK", "Klick");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Vår bot är publika aktivt i detta rum. Att starta samtal till bot, skriv <b>hello ".C_BOT_NAME."</b>. Att avsluta konversation, skriv: <b>bye ".C_BOT_NAME."</b>. (privat: /to <b>".C_BOT_NAME."</b> Meddelande)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Vår bot är publika aktivt i %s room. Du kan bara samtala privat av klickande på det namn och viska. (kommando: /wisp <b>".C_BOT_NAME."</b> Meddelande)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Vår bot är inte publicerande aktivt. Du kan bara samtala privat av klickande på det namn. (kommandon: /to <b>".C_BOT_NAME."</b> Meddelande eller /wisp <b>".C_BOT_NAME."</b> Meddelande)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot är inte igång i detta rum!");
define("BOT_START_ERROR", "Bot är redan igång i detta rum!");
define("BOT_DISABLED_ERROR", "Bot har blivit avstängd från Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "rullar tärning, resultaten är:");
define("DICE_WRONG", "Du har valt, hur många tärningar du vill rulla\\n(Välj ett nummer mellan 1 och ".MAX_ROLLS.").\\nBara skriv /dice att rulla alla ".MAX_ROLLS." tärningar.");
define("DICE2_WRONG", "Andra värde måste vara mellan 1 and ".MAX_ROLLS.".\\nLämna tom att använda alla ".MAX_ROLLS." tärningar\\n(Expl. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Första värde måste vara mellan 1 and ".MAX_DICES.".\\n(Expl. /".MAX_DICES."d eller /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Andra värde måste vara mellan 1 and ".MAX_ROLLS.".\\nLämna tom att använda alla ".MAX_ROLLS." tärningar\\n(Expl. /d50 eller /d100t".MAX_ROLLS.").");

// Log mod by Ciprian
define("L_ARCHIVE", "Öppna Arkiv");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Öppna popups på privat meddelande");
define("L_PRIV_POST_MSG", "Skicka privat meddelande!");
define("L_PRIV_MSG", "Ny privat meddelande mottogs!");
define("L_PRIV_MSGS", "ny privat meddelanden mottogs!");
define("L_PRIV_MSGSa", "Här är de första 10 meddelanden!<br />Använda botten länk att se resten.");
define("L_PRIV_MSG1", "Från:");
define("L_PRIV_MSG2", "Rum:");
define("L_PRIV_MSG3", "Till:");
define("L_PRIV_MSG4", "Meddelande:");
define("L_PRIV_MSG5", "Avsänd:");
define("L_PRIV_REPLY", "Svara");
define("L_PRIV_READ", "Tryck ’Stäng’ knappen för att markera all post som läst!");
define("L_PRIV_POPUP", "Du kan stänga av/åter möjliggöra när som helst denna popup finess <br />by redigera din <a href=\"#\" onClick=\"window.parent.runCmd('profile',''); return false;\" onMouseOver=\"window.status='Change your settings.'; return true\">Profil</a> (bara registrerade användare)");
define("L_NOT_ONLINE", "%s är inte online just nu.");
define("L_PRIV_NOT_ONLINE", "%s är inte online just nu,\\nmen du kommer fortfarande att få dina meddelande efter inloggning.");
define("L_PRIV_NOT_INROOM", "%s är inte i detta rum.\\nOm du fortfarande vill ha pm från denna användare,\\nanvänd kommando: /wisp %s meddelande.");
define("L_PRIV_AWAY", "%s är markerat away,\\nmen du kommer fortfarande att få dina meddelande \\nnär du kommer tillbaka.");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Aktiv" : "Inaktiv"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Aktiv" : "Inaktiv"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Nuvarande Inställningar på denna server</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Start färger</u>: Administratör = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Ordningsmän = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Andra användare = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Start färg</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Färg kartan Picker");
define("L_COL_HELP_SUB1", "Användande:");
define("L_COL_HELP_P1", "Du kan välja din/er egen start färg vid redigering av din profil (detsamma färg som din användarnamn färg). Du skall kunna fortfarande använda några andra färg. Att ändra tillbaka till din/er standar färg från ett slumpvis använt en, du måste valja standar färg (Null) - den är de första i dropmeny.");
define("L_COL_HELP_SUB2", "Tips:");
define("L_COL_HELP_P2", "<u>Färg område</u><br />Beroende på din webläsarens/OS:s möjligheter, det är möjligt att några av färger kommer inte att skapas. Bara 16 färg namn stöds av W3C HTML 4.0 standar:");
define("L_COL_HELP_P2a", "Om användaren inte kan se färgen du valde, då använder han ett gammal version av webläsare.");
define("L_COL_HELP_SUB3", "Inställningar definierade på denna chatt:");
define("L_COL_HELP_P3", "<u>Kraft nivåer av färg användande</u>:<br />1. Administratör kan använda alla färger.<br />Start färg för administratör är <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Ordningsmän kan använda vilka som helst men <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> och <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />Start färg för ordningsmän är <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Andra användare kan använda några färger men <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> och <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Start färg är <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Tekniskt material</u>: Dessa färger har blivit definierade av administratör i administrations panel.<br />Om vad som helst går fel eller om där är någonting du tycker inte om start färger, du borde kontakta <b>administratör</b> först, inte andra användare i ditt rum. :-)");
define("L_COL_HELP_USER_STATUS", "Din status");
define("L_COL_TUT", "Använda text färg koder");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Bara administratör kan använda ".COLOR_CA." färg!\\n\\nDin/er text färg återställs till ".COLOR_CM."!\\n\\nVänligen välj annan färg.");
define("COL_ERROR_BOX_USRA", "Bara administratör kan använda ".COLOR_CA." färg!\\n\\nProva inte att använda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nDessa är reserverade till kraft användare!\\n\\nDin text färg återställs till ".COLOR_CD."!\\n\\nVänligen välj annan färg.");
define("COL_ERROR_BOX_USRM", "Du måste bli ordningsman att kunna använda ".COLOR_CM." färg!\\n\\nProva inte att använda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nDessa är reserverade till kraft användare!\\n\\nDin text färg återställs till ".COLOR_CD."!\\n\\nVänligen välj annan färg.");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","användare är ".LOGIN_LINK."chatting</A> just nu.</td></tr>");
define("USERS_LOGIN","1 användare är ".LOGIN_LINK."chatting</A> just nu.</td></tr>");
define("NO_USER","Ingen är ".LOGIN_LINK."chatting</A> just nu.</td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Välkommen till vår chat. Vänligen använd vårdat spår (netikett) medan du chattar: <I>pröva vara angenäm och artig</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Välkommen till vår chat. Vänligen använd vårdat spår (netikett) medan du chattar: <I>pröva vara angenäm och artig</I>.");
define("WELCOME_MSG_NOSOUND", "Välkommen till vår chat. Vänligen använd vårdat spår (netikett) medan du chattar: <I>pröva vara angenäm och artig</I>.");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Server Inställningar har blivit ändrade. Att undvika malfunctions, vänligen återladda din webläsare (tryck F5 tangent eller Gå ur och återgå till chat).");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Extra Valmöjligheter");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Whispering (privat meddelandet)\\när avstängd i denna chatt.");

//Size command error by Ciprian
define("L_ERR_SIZE", "Teckensnitt storlek värde kan bara vara\\nnull (för återställa) eller mellan 7 och 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Må"); //Måndag
define("L_TUE", "Ti"); //Tisdag
define("L_WED", "On"); //Onsdag
define("L_THU", "To"); //Torsdag
define("L_FRI", "Fr"); //Fredag
define("L_SAT", "Lö"); //Lördag
define("L_SUN", "Sö"); //Söndag
?>