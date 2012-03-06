<?php
// File : swedish/localized.chat.php - plus version (20.03.2010 - rev.44)
// Original file by Martin Edelius <martin.edelius@spirex.se>
// Updates, corrections and additions for the Plus version by Heikki <heikki@yttervik.be> & Fimpen Högström <fimpen@relative-work.se>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Användar Guide");

define("L_WEL_1", "Meddelanden raderas efter %s %s");
define("L_WEL_2", "och användarnamn frigörs efter %s %s");

define("L_CUR_1", "Här är");
define("L_CUR_1a", "för närvarande");
define("L_CUR_1b", "för närvarande");
define("L_CUR_2", "i chatten");
define("L_CUR_3", "Användare för närvarande i rum");
define("L_CUR_4", "användare i privata rum");
define("L_CUR_5", "Användare aktivt lurpassar<br />(har denna sidan öppet):");

define("L_SET_1", "Vänligen välj ...");
define("L_SET_2", "Användarnamn");
define("L_SET_3", "antal meddelanden att visa");
define("L_SET_4", "tiden mellan uppdateringarna");
define("L_SET_5", "Välj ett rum ...");
define("L_SET_6", "Standard rum");
define("L_SET_7", "Gör ditt val ...");
define("L_SET_8", "Publika rum skapade av användare");
define("L_SET_9", "Skapa ditt egna");
define("L_SET_10", "publika");
define("L_SET_11", "privata");
define("L_SET_12", "rum");
define("L_SET_13", "Sedan, till");
define("L_SET_14", "chatt");
define("L_SET_15", "Tillgängliga rum");
define("L_SET_16", "Användarens Privata rum");
define("L_SET_17", "Välj din Alias bild");
define("L_SET_18", "Gör denna sida till ditt favorit: tryck \"Ctrl+D\".");
define("L_SET_19", "Kom ihåg mig");

define("L_SRC", "kan hämtas gratis från");

define("L_SEC", "sekund");
define("L_SECS", "sekunder");
define("L_MIN", "minut");
define("L_MINS", "minuter");
define("L_HOUR", "timme");
define("L_HOURS", "timmar");

// registration stuff:
define("L_REG_1", "Lösenord");
define("L_REG_2", "Registrerade användare");
define("L_REG_3", "Registrera");
define("L_REG_4", "Editera användarprofil");
define("L_REG_5", "Radera användare");
define("L_REG_6", "Användarregistrering");
define("L_REG_7", "endast om du är registrerad");
define("L_REG_8", "E-mail");
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
define("L_REG_30", "Förnamn");
define("L_REG_31", "Efternamn");
define("L_REG_32", "WEB");
define("L_REG_33", "visa e-mail vid /whois kommando");
define("L_REG_34", "Redigera användarprofil");
define("L_REG_35", "Administration");
define("L_REG_36", "Län/Region/Land");
define("L_REG_37", "Fält med ett <span class=\"error\">*</span> måste vara i fyllda.");
define("L_REG_39", "Rummet du var inloggad på har tagits bort av administratören.");
define("L_REG_43", "Hemligt");
define("L_REG_44", "Par");
define("L_REG_45", "Kön");
define("L_REG_46", "Man");
define("L_REG_47", "Kvinna");
define("L_REG_48", "Ej specificerad");
define("L_REG_49", "Registrering nödvändig!");
define("L_REG_50", "Registeringen upphört!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Dina inställningar till chatten");
define("L_EMAIL_VAL_2", "Välkommen till Chatten.");
define("L_EMAIL_VAL_Err", "Server fel, kontakta Chatadmin: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Ditt lösenord har skickat till din e-post adress.<br />Du kan ändra ditt lösenord vid inloggnings sida under \"".L_REG_4."\".");
define("L_EMAIL_VAL_PENDING_Done", "Dina registrerade data är inlagda för kontroll.");
define("L_EMAIL_VAL_PENDING_Done1", "Du kommer få ditt lösenord efter att ditt konto blivit godkänt av Administratören.");
define("L_EMAIL_VAL_3", "Ditt konto ligger för godkänande %s");
define("L_EMAIL_VAL_31", "Grattis, Din registrering har blivit mottagen och godkänt!");
define("L_EMAIL_VAL_32", "Detta är dina uppgifter för %s på %s:"); //chat name at chaturl
define("L_EMAIL_VAL_4", "Du har just registrerat följade namn %s hos %s:"); //chat name at chaturl
define("L_EMAIL_VAL_41", "Du har just ändrat på viktig information för %s på %s (Påverkat konto: %s)."); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "Dina - %s – kontouppgifter för %s"); //username - chatname
define("L_EMAIL_VAL_51", "Dina - %s - kontouppgifter för %s"); //username - chatname
define("L_EMAIL_VAL_6", "Registrerad hos %s");
define("L_EMAIL_VAL_61", "Uppdaterat på %s");
define("L_EMAIL_VAL_7", "Nedan är dina uppdaterade kontouppgifter för %s:"); //username
define("L_EMAIL_VAL_8", "Spara detta mailet för framtida behov.\nViktigt är också att du ser till att de inte kommer på villovägar/eller att du delar ut dem.\nTack, för att du anslutit dig, lycka till!");
define("L_EMAIL_VAL_81", "Du kan ändra ditt lösenord vid inloggnings sida under \"".L_REG_4."\".");

// admin stuff
define("L_ADM_1", "%s är inte längre moderator för detta rum.");
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
define("L_ERR_USR_9", "Det användarnamnet är upptaget.");
define("L_ERR_USR_10", "Felaktigt användarnamn eller lösenord.");
define("L_ERR_USR_11", "Du måste vara administratör.");
define("L_ERR_USR_12", "Du är administratör så du kan ej tas bort.");
define("L_ERR_USR_13", "Du måste registrera dig för att få skapa egna rum.");
define("L_ERR_USR_14", "Du måste registrera dig för att få chatta.");
define("L_ERR_USR_15", "Du måste skriva hela ditt namn.");
define("L_ERR_USR_16", "Endast dessa extra-tecknet tillåtna:\\n".$REG_CHARS_ALLOWED."\\nMellanslag, komma eller snedstrek (\\) är inte tillåtna.\\nKolla.");
define("L_ERR_USR_16a", "Endast dessa extra-tecknet tillåtna:<br />".$REG_CHARS_ALLOWED."<br />Mellanslag, komma eller snedstrek (\\) är inte tillåtna. Kolla.");
define("L_ERR_USR_17", "Dett här rummet finns inte och du är inte behörig att skapa ett nytt.");
define("L_ERR_USR_18", "Bannlyst ord hittades i ditt användar namn.");
define("L_ERR_USR_19", "Bara ett rum i taget!");
define("L_ERR_USR_20", "Du har blivit bortkopplad från detta rum eller från chatten.");
define("L_ERR_USR_20a", "Du har blivit bortkopplad från detta rum eller från chatten.<br />Orsak: %s");
define("L_ERR_USR_21", "Du har inte varit aktiv de senaste ".C_USR_DEL." minuter,<br />därför är du utloggat från rummet.");
define("L_ERR_USR_22", "Kommandot är inte användbart för\\nmed webläsaren du använder (IE motor).");
define("L_ERR_USR_23", "För att kunna delta i privata rum måste du vara registrerad.");
define("L_ERR_USR_24", "För att skapa ditt egna privata rum, du måste vara registrerad.");
define("L_ERR_USR_25", "Endast administratör kan använda ".$COLORNAME." färg!<br />Försök inte använda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." eller ".COLOR_CM1.".<br />Dessa är reserverade för konstruktörer!");
define("L_ERR_USR_26", "Endast administratörer och moderator kan använda ".$COLORNAME." färg!<br />Försök inte använda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." eller ".COLOR_CM1.".<br />Dessa är reserverade för konstruktörer!");
define("L_ERR_USR_27", "Du kan inte chatta privat med dig själv.\\nVar God och...\\nVälj ett annat användarnamn.");
define("L_ERR_USR_28", "Din behörighet till %s har blivit inskränkt!<br />Vänligen välj ett annat rum.");
define("L_ERR_ROM_1", "Rummets namn får inte innehålla komma eller backslash (\\).");
define("L_ERR_ROM_2", "Bannlysta ord hittades i rumsnamnet du vill skapa.");
define("L_ERR_ROM_3", "Det finns redan ett publikt rum med det här namnet.");
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
define("L_ROOMS", "rum");
define("L_EXPCOL", "Expandera/Fäll ihop rummet");
define("L_BEEP", "Ljud/inget ljud när användare kommer");
define("L_PROFILE", "Visa profil");
define("L_NO_PROFILE", "Ingen profil");

// input frame
define("L_HLP", "Hjälp");
define("L_MODERATOR", "%s är nu moderator för det här rummet.");
define("L_KICKED", "%s blev utslängd ok.");
define("L_KICKED_REASON", "%s har framgångsrikt blivit utslängd. (Orsak: %s)");
define("L_KICKED_ALL", "Alla användare har lyckosamt blivit utslängda.");
define("L_KICKED_ALL_REASON", "Alla användare har lyckosamt blivit utslängda. (Orsak: %s)");
define("L_BANISHED", "%s har blivit bannlyst.");
define("L_BANISHED_REASON", "%s har framgångsrikt blivit bannlyst. (Orsak: %s)");
define("L_ANNOUNCE", "VIKTIGT MEDDELANDE!!");
define("L_INVITE", "%s bjud in hon/han att delta, in till <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> rum.");
define("L_INVITE_REG", "Du har fått en inbjudan att delta i detta rum.");
define("L_INVITE_DONE", "Din inbjudan sändes till %s.");
define("L_OK", "Sänd");
define("L_BUZZ", "Ljudeffekter");
define("L_BAD_CMD", "Inte ett giltigt kommando!");
define("L_ADMIN", "%s är redan administratör!");
define("L_IS_MODERATOR", "%s är redan moderator!");
define("L_NO_MODERATOR", "Endast moderator för det här rummet får använda detta kommandot.");
define("L_NONEXIST_USER", "%s finns inte i den här rummet.");
define("L_NONREG_USER", "%s är inte registrerad.");
define("L_NONREG_USER_IP", "Hans IP är: %s.");
define("L_NO_KICKED", "%s är moderator eller admin och kan inte bli utslängd.");
define("L_NO_BANISHED", "%s är moderator eller administratör och kan inte bannlysas.");
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
define("L_HELP_NOTE", "Alla kommandon måste vara på Engelska!");
define("L_HELP_MSG", "meddelande");
define("L_HELP_MSGS", "meddelanden");
define("L_HELP_ROOM", "rum");
define("L_HELP_BUZZ", "~signalnamn");
define("L_HELP_BUZZ1", "Ljudeffekt…"); //alert, sound alert, ring, whirr
define("L_HELP_REASON", "orsak");
define("L_HELP_MR", "Herr %s");
define("L_HELP_MS", "Fröken %s");
define("L_HELP_CMD_0", "{} innebär ett obligatoriskt alternativ, [] ett valfritt.");
define("L_HELP_CMD_1a", "Sätta antal meddelanden att visa, minimum och Standard är 5.");
define("L_HELP_CMD_1b", "Återladda textfönstret och visa n senaste meddelanden, minimal och standard är 5.");
define("L_HELP_CMD_2a", "Modifiera meddelanden och användare justera uppdateringsfördröjningen (i sekunder).<br />Om n inte är specificerad eller mindre än 3 så växlar kommandot mellan 10 sekunder och ingen uppdatering.");
define("L_HELP_CMD_2b", "Modifiera meddelanden och användare justera uppdaterings fördröjning (i sekunder).<br />Om n är inte specifierat eller mindre än 3, växlar mellan ingen uppdatering och 10s uppdatering.");
define("L_HELP_CMD_3", "Byt ordningsföljd på meddelanden.");
define("L_HELP_CMD_4", "Anslut till ett rum, skapa det den om den inte finns (förutsatt att du får skapa rum).<br />Sätt n till 0 för ett privat rum och 1 för ett publikt, startvärde är 1.");
define("L_HELP_CMD_5", "Lämna chatten efter att du lämnar ett frivillig meddelande.");
define("L_HELP_CMD_6", "Ignorera meddelanden från den användare du anger.<br />Sluta ignorera specifik användare när du anger både - och användarnamn eller sluta ignorera alla användare när enbart - anges.<br />Utan alternativ så poppar ett fönster upp med en lista över alla ignorerade användare.");
define("L_HELP_CMD_7", "Upprepa föregående text (kommando eller meddelande).");
define("L_HELP_CMD_8", "Visa/Dölj tid före meddelanden.");
define("L_HELP_CMD_9", "Slänger ut användare från ett rum. Kan endast användas av moderator.<br />Valfri, [".L_HELP_REASON."] visar orsak av kicking (några önskar en förklaringt).<br />Om * används så kommer kommandot att kicka ut alla användare utan Admin och Moderatorstatus (endast gäster och registrerade användare alltså). Detta är användbart om servern har kopplingssvårigheter till databasen och alla användare behöver logga in igen. I det andra fallet så är [".L_HELP_REASON."] att rekomendera så användarna förstår varför de blivit utslängda.");
define("L_HELP_CMD_10", "Skicka ett privat meddelande till specificerad användare (ingen annan ser det).");
define("L_HELP_CMD_11", "Visa information om specificerad användare.");
define("L_HELP_CMD_12", "Poppar upp ett fönster för redigering av dina användaruppgifter.");
define("L_HELP_CMD_13", "Växlar notifiering när användare loggar på och lämnar rummet.");
define("L_HELP_CMD_14", "Gör det möjligt för administratören eller det aktuella rummets moderator att befordra en annan användare till moderator för det aktuella rummet.");
define("L_HELP_CMD_15", "Rensa textfönstret och visa bara föregående 5 meddelanden.");
define("L_HELP_CMD_16", "Spara föregående n meddelanden (enstaka meddelande borttagen) till en HTML fil. If n is not specified, alla tillgängliga meddelanden kommer att tas intill beräkning.");
define("L_HELP_CMD_17", "Tillåta administratör att skicka ett announcement till alla användare oavsett vilket rum de chatter i.");
define("L_HELP_CMD_18", "Föreslå för en användare från ett annat rum, att komma till rummet du är i.");
define("L_HELP_CMD_19", "Tillåta moderator av rummet eller administratör att \"banish\" användare från rum för en tid definierade av administratör.<br />Senare kan förvisade användare chatta i ett annat rum än han är inne och använder. * inställningar för bannlysning \"forever\" en användare stängs av från chatten helt och hållet.");
define("L_HELP_CMD_20", "Beskriva vad du gör och referera till dig själv. Exp. Om du sitter och tittar på TV: det kommer då stå \"Herr Högström tittar på TV\".");
define("L_HELP_CMD_21", "Meddela rum och användare som provar skicka meddelanden till dig <br />att du är borta från datorn. Om du vill komma tillbaka till chat, bara börja skriva.");
define("L_HELP_CMD_22", "Sänder en ljudeffekt och valfritt visar ett meddelande i nuvarande rum.<br />- Användande:<br />- tidigare användningssätt: \"/buzz\" eller \"/buzz följt av det meddelande du vill skriva ut tillsammans med ljudeffekten \" - spelar standard ljud för ljudeffekt definierade i Administrations panel;<br />- utökad användande: \"/buzz ~signalnamn\" eller \"/buzz ~signalnamn följt av det meddelande du vill skriva ut tillsammans med ljudeffekten \" - spelar signalnamn.wav fil från plus/sounds mappen; vänligen notera tecknet \"~\" att användas i början av ljudeffektsnamnet, vilken är namn av ljud fil, utan att behöva ha tillägget .wav (bara .wav filer tillåtna).<br />I grund installation, är detta ett moderator/administratörs kommando.");
define("L_HELP_CMD_23", "Skicka <i>viskning</i> (privat meddelande). meddelandet kommer att nå använaren, oavsätt i vilken rum denne befinner sig i. Om användaren inte är on-line eller just har loggat ut, kommer du att bli underrättad om det. Vidare kommer meddelande att visas för använaren när denne loggar in nästa gång. Så kallat offlinemeddelande.");
define("L_HELP_CMD_24", "Detta kommando ändrar toptext av nuvarande rum. Prova inte att åsidosätta andra användarens toptext. Använda viktig toptext.<br />Som standard, detta är ett moderator/administration kommando.<br />Användande \"/topic reset\" kommandot raderar nuvarande toptext och återställter till standard text för rummet.<br />Valfri, \"/topic * {}\" och \"/topic * reset\" gör exakt detsamma men, i alla rum (globala toptext återställes).");
define("L_HELP_CMD_25", "ETT spel av tärningar för slumpvis tal.<br />Användande: /dice eller /dice [n];<br />n kan ta alla värde <b>mellan 1 och %s</b> (det representerar antalet rullande tärningar). Om inget nummer angetts, kommer maximalt antal rullningar att användas.");
define("L_HELP_CMD_26", "Detta är ett mer komplexa version av /dice kommando.<br />Användande: /{n1}d[n2] eller /{n1}d;<br />n1 kan ta alla värden <b>mellan 1 och %s</b> (det representerar antalet kast).<br />n2 kan ta alla värde <b>mellan 1 och %s</b> (det representerar antalet rullande tärningar per kast).");
define("L_HELP_CMD_27", "Markera bakgrunden på meddelanden av en specifik användare för att lättare kunna följa och läsa dennes konversation.<br />Användande: /high {användare} eller tryck på det lilla <img src=./images/highlightOff.gif> till höger om användarnamnet (i rum/användar listan)");
define("L_HELP_CMD_28", "Det tillåter avsändare att skicka en <i>en enkel bild</i> som meddelande.<br />Användande: bilder kommer att vara på internet och fritt åtkomlig för alla. Använd inte sidor där inloggning behövs .<br />Full länk för bild måste vara skrivet! Expl. <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Tillåtet tillägg: .jpg .bmp .gif .png. länk är känslig för STORA/små bokstäver!<br />TIPS: skriv /img mellanslag och infoga URL in i fältet; att få URL’n av en bild från en websidan, när du högerklickat på bilden, gå till egenskaper, markera sedan hela adressen/URL’n (ibland måste man bläddra ner en bit) och kopiera/infoga efter /img<br />Använd inte bilder från din pc: den kommer att göra avbrott på chat fönster för dig!!!");
define("L_HELP_CMD_29", "Andra kommando kommer att tillåta administratör eller moderator av nuvarande rum att sänka ner annan registrerat användare tidigare upphöjd till moderator för samma rum.<br />* valet kommer att sänka ner användarens status från alla rum.");
define("L_HELP_CMD_30", "Andra kommando gör detsamma som /me men den kommer att visa din/er respektives kön/genus<br />Expl. * ".sprintf(L_HELP_MR, "Högström")." tittar på TV eller * ".sprintf(L_HELP_MS, "Maja")." Missil är glad.");
define("L_HELP_CMD_31", "Ändra hur användare är sorterad i listan: sorteringsordning, tid eller alfabetiskt.");
define("L_HELP_CMD_32", "Detta är en tredje (roleplaying) version av tärningsspelet.<br />Användande: /d{n1}[tn2] or /d{n1};<br />n1 kan ta alla värde <b>mellan 1 och 100</b> (det representerar antalet rullning per tärning).<br />n2 kan ta alla värden <b>mellan 1 och %s</b> (det representerar antalet rullande tärningar per kast).");
define("L_HELP_CMD_33", "Ändra teckensnitts storlek på meddelanden i chatten till användare, val (tillåtna värden för n: <b>mellan 7 och 15</b>); /size kommando återställer teckensnitt storlek till standar värde (<b>".$FontSize."</b>).");
define("L_HELP_CMD_34", "Detta kommando låter användaren specificera textens orientering (ltr,vth = vänster till höger; rtl,htv = höger till vänster).");
define("L_HELP_CMD_35", "Detta låter dig länka till <i>en video</i> eller <i>en ljudfil</i> för uppspelande i en flashspelare i taget.<br />Tillvägagångssätt: Klistra bara in URLsökvägen för vad du vill infoga!<br />T ex <b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />Du behöver Shockwave Flash Player installerad på din dator. Länken är skiftlägeskänsligt!<br />TIPS: skriv /video följt av ett mellanslag klistra därefter in URLsökvägen i rutan.");
define("L_HELP_CMD_35a", "Det andra kommandot fungerar bara med youtube.com som källa.<br />T ex <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b>");
define("L_HELP_CMD_36", "Det låter dig infoga <i>en youtubevideo</i> för uppspelande i en flashspelare i taget.<br />Tillvägagångssätt: Klistra bara in URLsökvägen för vad du vill infoga.<br />T ex <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />Du behöver Shockwave Flash Player installerad på din dator. Länken är  skiftlägeskänsligt!<br />TIPS: skriv /tube följt av ett mellanslag klistra därefter in URLsökvägen i rutan.");
define("L_HELP_CMD_VAR", "Synonymer (varianter): %s"); // a list of English and/or translated alternatives for each command, provided in help.
define("L_HELP_ETIQ_1", "Chat Netikett");
define("L_HELP_ETIQ_2", "För att vår plats skall kunna behålla dess ställning/gemenskap för oss alla vänligt och kul, Så vänligen stå fast vid till följande riktlinjer. Om du avviker från dessa regler, kan någon av våra chatts moderator (kan och får) sparka ut dig från chatten.<br /><br />Tack,");
define("L_HELP_ETIQ_3", "Vår Chatts Netikett, Riktlinjer");
define("L_HELP_ETIQ_4", "<li>Skicka inte \"spam\" chat skriven av dumheter eller slumpvis bokstäver.</li>
<li>Använd inte aLtErnAtiNg tecken.</li>
<li>Behåll inte CAPS Lock, använd småbokstäver, Dom stora anses som vrålande.</li>
<li>Behåll i tanken att era chatt användare är från hela världen, och de flesta troligen, du/ni kommer att möta folk av annorlunda/olika religon. Var vänlig och artig mot dessa människor.</li>
<li>Gör inte direkt påhopp mot de andra medlemmarna. Bemöt inte otrevligheter med egna otrevligheter. Föregå hellre med gott exempel och undvik att fortsätta diskutionen. Rapportera det istället ditt Admin. Försök att hålla ett vårdat språk utan allt för grova svordommar.</li>
<li>Kalla inte andra medlemmar med deras riktiga namn, inte uppskattat. Använda deras nicknamns istället.</li>");

// messages frame
define("L_NO_MSG", "Det finns för närvarande inga meddelanden ...");
define("L_TODAY_DWN", "Meddelanden som har sänt idag start här nedan");
define("L_TODAY_UP", "Meddelanden som har sänt idag start här ovan");

// message colors
$TextColors = array("Svart" => "#000000",
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
define("L_WHOIS_OWNER", "Ägare");
define("L_WHOIS_TOPMOD", "ChefsModerator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_MODERS", "Moderator");
define("L_WHOIS_OTHERS", "Andra användare");
define("L_WHOIS_USER", "Användare");
define("L_WHOIS_GUEST", "Gäst");
define("L_WHOIS_REG", "Registerad");
define("L_WHOIS_BOT", "Bot");

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s kom till rummet.");
define("L_EXIT_ROM", "%s lämnar rummet.");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s har automatiskt blivit utslängd från detta rum för overksamhet.");
define("L_CLOSED_ROM", "%s har stängd webläsaren.");

// Text for /away command notification string:
define("L_AWAY", "%s är bort markerad...");
define("L_BACK", "%s är tillbaka!");

// Quick Menu mod
define("L_QUICK", "Snabb Meny");

// Topic Banner mod
define("L_TOPIC", "har sats som ÄMNE till:");
define("L_TOPIC_RESET", "har återställt ÄMNE");
define("L_HELP_TOP", "åtminstone två ord som ämne (topic)");
define("L_BANNER_WELCOME", "Välkommen till %s!"); // room name
define("L_BANNER_TOPIC", "Ämne:");
define("L_DEFAULT_TOPIC_1", "Detta är ämnet för detta rum. Ändra localization/_owner/owner.php för att ändra det!");

// Img cmd mod
define("L_PIC", "Bild insänd av");
define("L_PIC_RESIZED", "Ändrad till");
define("L_HELP_IMG", "full/hel sökväg att sända bild till");
define("L_NO_IMAGE", "Detta är inte en giltig URL (internetadress) för en public.\\nFörsök igen!");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s är inte längre orningsman för någon rum i detta chatt.");
define("L_IS_NO_MODERATOR", "%s är inte moderator.");
define("L_ERR_IS_ADMIN", "%s är administratör!\\nDu kan inte ändra hans behörighets nivå.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "Extra Kommando tillgänglig:");
define("INFO_MODS", "Extra Finesser/Mods tillgänglig:");
define("INFO_BOT", "Vår tillgängliga bot är:");

//profile mod
define("L_PRO_1", "Talar språk");
define("L_PRO_1a", "Språk");
define("L_PRO_2", "Favorit länk 1");
define("L_PRO_3", "Favorit länk 2");
define("L_PRO_4", "Beskrivning");
define("L_PRO_5", "Bild URL");
define("L_PRO_6", "Namns/Texts färger");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "Fel URL eller icke-existerande server.");
define("L_TITLE_AV", "Din nuvarande avatar: ");
define("L_CHG_AV", "Klicka \"".L_REG_16."\" i Profil formulär<br />för att spara din Avatar bild.");
define("L_SEL_NEW_AV", "Välj en ny Avatar bild");
define("L_EX_AV", "exempel");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Enter URL, then hit ENTER för att se)");
define("L_CANCEL", "Avbryt");
define("L_AVA_REG", "Du måste vara registrerad\\nför att ändra din användarbild");
define("L_SEL_NEW_AV_CONFIRM", "Detta formulär är inte sparat.\\nOm du går till avatars (personlig bild)\\nså kommer du förlora alla\\nförändringar du gjort hittills!\\n\\nÄr du säker på att du vill de?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Vår bot är publikt aktivt i detta rum. Att starta samtal till bot, skriv <b>hello ".C_BOT_NAME."</b>. Att avsluta konversation, skriv: <b>bye ".C_BOT_NAME."</b>. (privat: /to <b>".C_BOT_NAME."</b> Meddelande)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Vår bot är publikt aktivt i %s room. Du kan bara samtala privat genom klickande på det namn och viska. (kommando: /wisp <b>".C_BOT_NAME."</b> Meddelande)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Vår bot är inte öppet publicerandeaktivt. Du kan bara samtala privat genom klickande på det namn. (kommandon: /to <b>".C_BOT_NAME."</b> Meddelanden eller /wisp <b>".C_BOT_NAME."</b> Meddelanden)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot är inte igång i detta rum!");
define("BOT_START_ERROR", "Bot är redan igång i detta rum!");
define("BOT_DISABLED_ERROR", "Bot har blivit avstängd från Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "rullar tärning, resultaten är:");
define("DICE_WRONG", "Du har valt, hur många tärningar du vill rulla\\n(Välj ett nummer mellan 1 och ".MAX_ROLLS.").\\nBara skriv /dice för att rulla alla ".MAX_ROLLS." tärningar.");
define("DICE2_WRONG", "Andra värdet måste vara mellan 1 and ".MAX_ROLLS.".\\nLämna tomt för att använda alla ".MAX_ROLLS." tärningar\\n(Expl. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Första värdet måste vara mellan 1 and ".MAX_DICES.".\\n(Expl. /".MAX_DICES."d eller /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Andra värdet måste vara mellan 1 and ".MAX_ROLLS.".\\nLämna tomt för att använda alla ".MAX_ROLLS." tärningar\\n(Expl. /d50 eller /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "öppna popups på privat meddelanden");
define("L_REG_POPUP_NOTE", "Din popup blokerare borde vara avstängd!");
define("L_PRIV_POST_MSG", "Skicka privat meddelanden!");
define("L_PRIV_MSG", "Nytt privat meddelande mottogs!");
define("L_PRIV_MSGS", "%s nytt privat meddelande mottogs!");
define("L_PRIV_MSGSa", "Här är de första 10 meddelandena!<br />Använda botten länk för att se resten.");
define("L_PRIV_MSG1", "Från:");
define("L_PRIV_MSG2", "Rum:");
define("L_PRIV_MSG3", "Till:");
define("L_PRIV_MSG4", "Meddelande:");
define("L_PRIV_MSG5", "Avsänd:");
define("L_PRIV_REPLY", "Svara");
define("L_PRIV_READ", "Tryck ’".L_REG_25."’ knappen för att markera all post som läst!");
define("L_PRIV_POPUP", "Du kan stänga av/på när som helst för att möjliggöra denna popup finess by redigera din");
define("L_PRIV_POPUP1", "Profil</a> (bara registrerade användare)");
define("L_NOT_ONLINE", "%s är inte online just nu.");
define("L_PRIV_NOT_ONLINE", "%s är inte online just nu,\\nmen kommer fortfarande att få\\nditt meddelande efter inloggning.");
define("L_PRIV_NOT_INROOM", "%s är inte i detta rum.\\nOm du fortfarande vill ha pm från denna användare,\\nanvänd kommando: /wisp %s meddelande.");
define("L_PRIV_AWAY", "%s är markerat away,\\nmen kommer fortfarande att få ditt meddelande\\nnär denne kommer tillbaka.");
define("PM_DISABLED_ERROR", "Whispering (privat meddelandet)\\när avstängd i denna chatt.");
define("L_NEXT_PAGE", "Gå till nästa sida");
define("L_NEXT_READ", "Läst nästa %s"); // message / 10 messages
define("L_ROOM_ALL", "Alla rum");
define("L_PRIV_NO_MSGS", "Inga private meddelande");
define("L_PRIV_READ_MSG", "1 privat meddelande mottaget"); //singular
define("L_PRIV_READ_MSGS", "%s privata meddelanden mottagna"); //plural
define("L_PRIV_MSGS_NEW", "Ny");
define("L_PRIV_MSGS_READ", "Läs");
define("L_PRIV_MSG6", "Status:");
define("L_PRIV_RELOAD", "Uppdatera sidan");
define("L_PRIV_MARK_ALL", "Markera alla som Lästa.");
define("L_PRIV_MARK_SEL", "Markera valda meddelande som Lästa.");
define("L_PRIV_REMOVE", "Ta bort markerade PM´s"); // or selected
define("L_PRIV_PM", "(privat)");
define("L_PRIV_WISP", "(viska)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "Aktiv");
define("L_DISABLED", "Inaktiv");
define("L_COLOR_HEAD_SETTINGS", "Nuvarande Inställningar på denna server:");
define("L_COLOR_HEAD_SETTINGSa", "Start färger:");
define("L_COLOR_HEAD_SETTINGSb", "Start färg:");
define("L_COL_HELP_TITLE", "Färg kartan Picker");
define("L_COL_HELP_SUB1", "Användande:");
define("L_COL_HELP_P1", "Du kan välja din/er egen start färg vid redigering av din profil (det är samma färg som ditt användarnamns färg). Du skall fortfarande kunna använda några andra färger. Att ändra tillbaka till din/er standar färg, från ett slumpvis använd färg, måste du välja standar färg (Null) - den är det första i dropmeny.");
define("L_COL_HELP_SUB2", "Tips:");
define("L_COL_HELP_P2", "<u>Färg område</u><br />Beroende på din webläsarens/OS:s möjligheter, det är möjligt att några av färgerna inte kommer att kunna skapas. Bara 16 färg namn stöds av W3C HTML 4.0 standaren:");
define("L_COL_HELP_P2a", "Om användaren inte kan se färgen du valde, då använder han en gammal version av webläsare.");
define("L_COL_HELP_SUB3", "Inställningar definierade på denna chatt:");
define("L_COL_HELP_P3", "<u>Kraft nivåer av färg användande</u>:<br />1. Administratör kan använda alla färger.<br />Start färg för administratör är <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderator kan använda vilka som helst men <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> och <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />Start färg för moderator är <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Andra användare kan använda några färger men <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> och <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Start färg är <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Tekniskt material</u>: Dessa färger har blivit definierade av administratör i administrations panel.<br />Om vad som helst går fel eller om det är någonting du inte tycker om med start färgerna, du borde kontakta <b>administratör</b> först, inte andra användare i ditt rum. :-)");
define("L_COL_HELP_USER_STATUS", "Din status");
define("L_COL_TUT", "Använda text färg koder");
define("L_NULL", "Tomt");
define("L_NULL_F", ""); // feminine word, if it's the case
define("L_ROOM_COLOR", "rum’s färg");
define("L_PRO_COLOR", "användarfärg");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Bara administratör kan använda ".COLOR_CA." färg!\\n\\nDin/er text färg återställs till ".COLOR_CM."!\\n\\nVänligen välj annan färg.");
define("COL_ERROR_BOX_USRA", "Bara administratör kan använda ".COLOR_CA." färg!\\n\\nProva inte att använda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nDessa är reserverade till kraft användare!\\n\\nDin text färg återställs till ".COLOR_CD."!\\n\\nVänligen välj annan färg.");
define("COL_ERROR_BOX_USRM", "Du måste bli moderator att kunna använda ".COLOR_CM." färg!\\n\\nProva inte att använda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nDessa är reserverade till kraft användare!\\n\\nDin text färg återställs till ".COLOR_CD."!\\n\\nVänligen välj annan färg.");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "Välkommen till vår chat. Vänligen använd vårdat spårk (netikett) medan du chattar: <I>pröva vara angenäm och artig</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Server Inställningar har blivit ändrade. För att undvika felfunktioner, vänligen återladda din webläsare (tryck F5 tangent eller Gå ur och logga in till chatten igen).");

//Size command error by Ciprian
define("L_ERR_SIZE", "Teckensnitt storlek värde kan bara vara\\nnull (för återställa) eller mellan 7 och 15");

// Password reset form by Ciprian
define("L_PASS_0", "Lösenordet som nollställer");
define("L_PASS_1", "Hemlighet ifrågasätter");
define("L_PASS_2", "Vilken var din första bil?"); // Don't change this question! Just translate it!
define("L_PASS_3", "Vilket var ditt första smeknamn?"); // Don't change this question! Just translate it!
define("L_PASS_4", "Vad är din favorit-drink?"); // Don't change this question! Just translate it!
define("L_PASS_5", "Vilken är ditt födelsedatum?"); // Don't change this question! Just translate it!
define("L_PASS_6", "Hemliga svaret");
define("L_PASS_7", "Glömt Lösenordet");
define("L_PASS_8", "Ditt lösenord har framgångsrikt blivit nollställt.");
define("L_PASS_9", "Ditt nya lösenord som skriver in chatten");
define("L_PASS_10", "Skriv ditt nya lösenord %s<br />för att komma in i chatten");
define("L_PASS_11", "Välkomnande tillbaks sidan till vår chatten server!");
define("L_PASS_12", "Välj din hemliga fråga ...");
define("L_ERR_PASS_1", "Fel användarname. Välj din.");
define("L_ERR_PASS_2", "Fel e-post. Försök igen!");
define("L_ERR_PASS_3", "Fel hemlig fråga.<br />Till det svar som du hänvisat till!");
define("L_ERR_PASS_4", "Fel hemligt svar. Försök igen!");
define("L_ERR_PASS_5", "Du har inte uppsättningen, dina privata/hemliga data.");
define("L_ERR_PASS_6", "Du har inte uppsättningen, dina privata/hemliga data.<br />Du kan inte använda detta sätt att återställa ditt lösenord. Kontakta administratör!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s har blivit en administratör av denna chatten.");
define("L_ADM_4", "%s är ej längre en administratör av denna chatten.");

// Links popup page by Alex
define("L_LINKS_1", "Skickade länkar");
define("L_LINKS_2", "Här kommer du åt skickade länkar");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Klick %s %s");
define("L_CLICK", "Klick %s");
define("L_LINKS_3", "för att öppna länk");
define("L_LINKS_4", "gå till ägarens sida");
define("L_LINKS_5", "för att infoga denna smiley");
define("L_LINKS_6", "för kontakt");
define("L_LINKS_7", "besök phpMyChat Hemsida");
define("L_LINKS_8", "bli medlem phpMyChat Group");
define("L_LINKS_9", "för att sända din feedback");
define("L_LINKS_10", "för att ladda ner phpMyChat Plus");
define("L_LINKS_11", "för att se vilka som chattar");
define("L_LINKS_12", "för att öppna denna chattens loginfönster");
define("L_LINKS_13", "för att sända denna buzz");
define("L_LINKS_14", "för att använda detta kommando");
define("L_LINKS_15", "för att öppna");
define("L_LINKS_16", "Smilie Galleri");
define("L_LINKS_17", "för att sortera stigande");
define("L_LINKS_18", "för att sortera fallande");
define("L_LINKS_19", "för att ställa in/ändra din Gravatar");
define("L_LINKS_20", "Utsända Ekvationerna"); //Click here to open Posted Equations
define("L_SWITCH", "Ändra språk %s");
define("L_SELECTED", "valt");
define("L_SELECTED_F", ""); // feminine word, if it's the case
define("L_NOT_SELECTED", "inget valt");
define("L_NOT_SELECTED_F", ""); // feminine word, if it's the case
define("L_EMAIL_1", "skicka email");
define("L_FULLSIZE_PIC", "för att öppna bild I fullstorlek");
define("L_PRIVACY", "för att öppna Policy om Personuppgifter"); //Click here to…
define("L_AUTHOR", "till utvecklaren");
define("L_DEVELOPER", "utvecklaren av denna chatten");
define("L_OWNER", "ägaren till denna chat");
define("L_TRANSLATOR", "översättare");

// Counter on login
define("L_VISITOR_REPORT", "... besökare sen %s"); // install date

// Status bar messages
define("L_JOIN_ROOM", "Anslut till detta rum");
define("L_USE_NAME", "Använd detta användarnamn");
define("L_USE_NAME1", "Adress till detta användarnamn");
define("L_WHSP", "Whisper");
define("L_SEND_WHSP", "Skicka en Viskning");
define("L_SEND_PM_1", "Skicka ett PM");
define("L_SEND_PM_2", "Skicka ett privat meddelande");
define("L_HIGHLIGHT", "Markera/Avmarkera");
define("L_HIGHLIGHT_SB", "Markera/Avmarkera denna användarens meddelande");

//Lurking frame popup
define("L_LURKING_2", "Lurking sidan");
define("L_LURKING_3", "är lurkande");
define("L_LURKING_4", "inloggad");
define("L_LURKING_5", "Okänd");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Extra Tillbehör");
define("L_ARCHIVE", "Öppna Arkiv");
define("L_SOUNDFIX_IE_1", "Ljudfix för IE");
define("L_SOUNDFIX_IE_2", "Ladda ner en Ljudfix för IE");
define("L_LURKING_1", "Öppna lurking sidan");
define("L_REG_BRB", "Strax tillbaks (går endast att använda för registrerade användare)");
define("L_DEL_BYE", "Vänta inte på mig");
define("L_EXTRA_PRIV1", "Läs PM´s");
define("L_EXTRA_PRIV2", "Nya PM´s");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "januari");
define("L_FEB", "februari");
define("L_MAR", "mars");
define("L_APR", "april");
define("L_MAY", "maj");
define("L_JUN", "juni");
define("L_JUL", "juli");
define("L_AUG", "augusti");
define("L_SEP", "september");
define("L_OCT", "oktober");
define("L_NOV", "november");
define("L_DEC", "december");
// Months Short Names
define("L_S_JAN", "jan");
define("L_S_FEB", "feb");
define("L_S_MAR", "mar");
define("L_S_APR", "apr");
define("L_S_MAY", "maj");
define("L_S_JUN", "jun");
define("L_S_JUL", "jul");
define("L_S_AUG", "aug");
define("L_S_SEP", "sep");
define("L_S_OCT", "okt");
define("L_S_NOV", "nov");
define("L_S_DEC", "dec");
// Week days Long Names
define("L_MON", "måndag");
define("L_TUE", "tisdag");
define("L_WED", "onsdag");
define("L_THU", "torsdag");
define("L_FRI", "fredag");
define("L_SAT", "lördag");
define("L_SUN", "söndag");
// Week days Short Names
define("L_S_MON", "må");
define("L_S_TUE", "ti");
define("L_S_WED", "on");
define("L_S_THU", "to");
define("L_S_FRI", "fr");
define("L_S_SAT", "lö");
define("L_S_SUN", "sö");

// Localized date format - read the parameters here: http://www.php.net/manual/en/function.strftime.php
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "sve.UTF-8", "swedish.UTF-8", "swedish");
} else {
setlocale(LC_ALL, "sv_SE.UTF-8", "sv_SE.UTF-8@euro", "swedish.UTF-8", "sve.UTF-8", "sv.UTF-8", "sve_sve.UTF-8");
}
define("L_LANG", "sv_SE");
define("ISO_DEFAULT", "iso-8859-1");
define("WIN_DEFAULT", "windows-1252");
define("L_SHORT_DATE", "%Y-%m-%d"); //Change this to your local desired date only format (keep the short form)
define("L_LONG_DATE", "%A, %d %B %Y"); //Change this to your local desired date only format (keep the long form)
define("L_SHORT_DATETIME", "%Y-%m-%d %H:%M:%S"); //Change this to your local desired date&time format (keep the short form)
define("L_LONG_DATETIME", "%A, %d %B %Y %H:%M:%S"); //Change this to your local desired date&time format (keep the long form)
define("L_CAL_FORMAT", "%d %B %Y"); // Calendar format

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","användare är ".LOGIN_LINK."chatting</A> just nu.");
define("USERS_LOGIN","1 användare är ".LOGIN_LINK."chatting</A> just nu.");
define("NO_USER","Ingen är ".LOGIN_LINK."chatting</A> just nu.");
define("L_PRIV_REPLY_LOGIN", "Logga in i chatten om du vill ".LOGIN_LINK."svara på meddelande</A> se/läsa något av de Nya meddelande ovan");

// Language names
define("L_LANG_AR", "argentinska spanska");
define("L_LANG_BG", "bulgarien - kyrilliska");
define("L_LANG_BR", "brasilianska portugisiska");
define("L_LANG_CZ", "tjecken");
define("L_LANG_DA", "danska");
define("L_LANG_DE", "tyska");
define("L_LANG_EN", "engelska"); // for admin panel only
define("L_LANG_ENUK", "engelska UK"); // for UK formats and flags
define("L_LANG_ENUS", "amrikanska US"); // for US formats and flags
define("L_LANG_ES", "spanska");
define("L_LANG_FA", "persiska");
define("L_LANG_FR", "franska");
define("L_LANG_GR", "grekiska");
define("L_LANG_HE", "hebreiska");
define("L_LANG_HI", "hindi");
define("L_LANG_HU", "ungerska");
define("L_LANG_ID", "indonesiska");
define("L_LANG_IT", "italienska");
define("L_LANG_JA", "japanska");
define("L_LANG_KA", "georgiska");
define("L_LANG_NE", "nepalesiska");
define("L_LANG_NL", "holländska");
define("L_LANG_RO", "rumänska");
define("L_LANG_SK", "slovakien");
define("L_LANG_SRC", "serbiska - kyrilliska");
define("L_LANG_SRL", "serbiska - latin");
define("L_LANG_SV", "svenska");
define("L_LANG_TR", "turkiska");
define("L_LANG_UR", "urdu");
define("L_LANG_VI", "vietnamesiska");

// Skins preview page
define("L_SKINS_TITLE", "Förhandsgranska färgkombinationer");
define("L_SKINS_TITLE1", "Förhandsgrandska färgpalett % till %"); // Skins 1 to 4 preview
define("L_SKINS_AV", "Tillgängliga färgpaletter");
define("L_SKINS_NONAV", "Det finns ingen färgpalett definierad i \"skins\" mappen");
define("L_SKINS_COPY", "&copy; %s Temat gjort av %s"); //© 2008 Skin by AuthorName

// Swap image titles by Ciprian
define("L_GEN_ICON", "Könsikon");

// Ghost mode by Ciprian
define("L_GHOST", "Spöke");
define("L_SUPER_GHOST", "Super Spöke");
define("L_NO_GHOST", "Synlig");

// Sorting options by Ciprian
define("L_ASC", "Stigande");
define("L_DESC", "Fallande");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "Totalt antal besök"); // number of logins (returning visits) to chat

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "använd Gravatar"); // do not translate the word “Gravatar”!

// Uploader mod by Ciprian - 11.08.2008
define("L_UPLOAD", "Ladda upp %s"); // Upload Image, Upload Sound or Upload File
define("L_UPLOAD_IMG", "Bildfil"); // used to upload Avatars and /img command
define("L_UPLOAD_SND", "Ljudfil"); // used to upload Buzz sounds
define("L_UPLOAD_FLS", "Filer"); // used to upload multiple files at once
define("L_UPLOAD_SUCCESS", "%s lyckosamt uppladdat som %s."); // original filename, destination filename
define("L_FILES_TITLE", "Uppladningshanterande");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "Inskränkt");
define("L_RESTRICTED_ROM", "%s har lyckosamt blivit inskränkt från detta rum.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "Logga in med ett OpenID");
define("L_OPID_REG", "Importera din OpenID profil");

// Support buttons
define("L_SUPP_WARN", "Du har valt att bidra till den fria utvecklingen av\\n".APP_NAME." genom att donera till utvecklaren.\\nTack för ditt bidrag!\\n\\nNotera att mottagaren inte är ägaren av denna chatten.\\nVänligen skriv in det belopp du vill donera på nästa sida.\\n\\nFortsätt?");
define("L_SUPP_ALT", "Använd PayPal för att bidra till ".APP_NAME." - det är Snabbt, Gratis och Säkert!");

// Video & Audio & Youtube cmds (Embevi & YouTube player class) – same approach as in // Img cmd mod section!
define("L_AUDIO", "Ljudfil infogad av");
define("L_VIDEO", "Videofilm infogad av");
define("L_HELP_VIDEO", "fullständig sökväg till videofil eller ljudfil som du vill infoga");
define("L_NO_VIDEO", "URLsökvägen kan inte inbäddas.\\nDetta är inte korrekt URLsökväg till en allmänt erkänd publik film eller ljudfil.\\nFörsök igen!");
define("L_ORIG_VIDEO", "för att öppna orginalplatsen där filmen ligger");

// Birthday mod - by Ciprian
define("L_PRO_7", "Födelsedatum");
define("L_PRO_8", "låt andra se min födelsedag");
define("L_PRO_9", "visa ålder på min publika information");
define("L_PRO_10", "Ålder");
define("L_PRO_11", "%1\$d år, %2\$d månad/månader och %3\$d dag/dagar"); //you can also change the order here, but 1 stands for years, 2 for months and 3 for days
define("L_DOB_TIT_1", "Födelsedagslista");
$L_DOB_SUBJ = "Grattis på födelsedagen %s!";

// MathJax (MathML/TeX) formulas rendering in chat - by Ciprian
define("L_EQUATION", "Ekvation");
define("L_MATH", "%s infogad av %s"); //e.g. "Equation posted by username" (defined above); the word "Equation" will render as a url to show popup with the posted formulas
?>