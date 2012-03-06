<?php
// File : danish/localized.chat.php - plus version (20.03.2010 - rev.44)
// Original translation by Jonas Koch Bentzen <post@jonaskochbentzen.dk> & Kenneth Kristiansen <kk@linuxfreak.adsl.dk>
// Updates, corrections and additions for the Plus version by Bente Feldballe
// Do not use ' but use  ’  instead (utf-8 edit bug)

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Beskederne slettes efter %s %s");	// X hours/hour
define("L_WEL_2", "og inaktive brugere efter %s %s");	// Y minutes/minute

define("L_CUR_1", "Der");
define("L_CUR_1a", "er i øjeblikket");
define("L_CUR_1b", "er i øjeblikket");
define("L_CUR_2", "i chatten");
define("L_CUR_3", "Antal brugere på chatten i øjeblikket");
define("L_CUR_4", "brugere i private rum");
define("L_CUR_5", "Lurepassere<br />(overvåger denne side):");	// means break (next row)

define("L_SET_1", "Indtast venligst ...");
define("L_SET_2", "Brugernavn");
define("L_SET_3", "antal meddelelser, der skal vises");
define("L_SET_4", "timeout mellem opdateringerne");
define("L_SET_5", "Vælg chatrum ...");
define("L_SET_6", "Standard offentlige chatrum");
define("L_SET_7", "Vælg ...");
define("L_SET_8", "Offentlige rum oprettet af brugere");
define("L_SET_9", "Opret dit eget");
define("L_SET_10", "offentlige");
define("L_SET_11", "private");
define("L_SET_12", "rum");
define("L_SET_13", "Og så er det bare om at");
define("L_SET_14", "chatte");
define("L_SET_15", "Standard private chatrum");
define("L_SET_16", "Private rum oprettet af brugere");
define("L_SET_17", "Vælg dit avatar");
define("L_SET_18", "Føj denne side til dine favoritter: tryk på \"Ctrl+D\".");
define("L_SET_19", "Husk mig");

define("L_SRC", "fås gratis på");

define("L_SEC", "sekund");
define("L_SECS", "sekunder");
define("L_MIN", "minut");
define("L_MINS", "minutter");
define("L_HOUR", "time");
define("L_HOURS", "timer");

// registration stuff:
define("L_REG_1", "Password");
define("L_REG_2", "Vedligeholdelse af konto");
define("L_REG_3", "Registrér");
define("L_REG_4", "Redigér din profil");
define("L_REG_5", "Slet bruger");
define("L_REG_6", "Brugerregistrering");
define("L_REG_7", "kun hvis du er registreret");
define("L_REG_8", "Din e-mail");
define("L_REG_9", "Du er nu registreret.");
define("L_REG_10", "Tilbage");
define("L_REG_11", "Redigerer");
define("L_REG_12", "Retter brugerinformation");
define("L_REG_13", "Sletter bruger");
define("L_REG_14", "Login");
define("L_REG_15", "Log In");
define("L_REG_16", "Skift");
define("L_REG_17", "Din profil er blevet opdateret.");
define("L_REG_18", "Du er blevet sparket ud af chatten af en moderator.");
define("L_REG_18a", "Du er blevet sparket ud af chatten af en moderator.<br />Begrundelse: %s");	// %s angiv grunden til udelukkelsen (f.eks. “for spamming”)
define("L_REG_19", "Ønsker du at blive slettet?");
define("L_REG_20", "Ja");
define("L_REG_21", "Du er nu blevet slettet.");
define("L_REG_22", "Nej");
define("L_REG_25", "Luk");
define("L_REG_30", "Fornavn");
define("L_REG_31", "Efternavn");
define("L_REG_32", "WEB");
define("L_REG_33", "Vis e-mail ide offentlige oplysninger");
define("L_REG_34", "Redigerer brugerprofil");
define("L_REG_35", "Administration");
define("L_REG_36", "Sted/Land");
define("L_REG_37", "Felter markeret med en <span class=\"error\">*</span> skal udfyldes.");
define("L_REG_39", "Det chatrum, du var i, er blevet lukket af administrator.");
define("L_REG_43", "Fortroligt");
define("L_REG_44", "Par");
define("L_REG_45", "Køn");
define("L_REG_46", "Mand");
define("L_REG_47", "Kvinde");
define("L_REG_48", "Uspecificeret");
define("L_REG_49", "Brugerregistrering kræves!");
define("L_REG_50", "Brugerregistrering ophævet!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Dine indstillinger til brug i chatten");
define("L_EMAIL_VAL_2", "Velkommen til vor chatserver.");
define("L_EMAIL_VAL_Err", "Intern fejl, kontakt venligst administrator: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Dit password er blevet sendt til din e-mail-adresse.<br />Du kan ændre dit password på login-siden under \"".L_REG_4."\.");
define("L_EMAIL_VAL_PENDING_Done", "Dine registreringsdata er indsendt til vurdering.");
define("L_EMAIL_VAL_PENDING_Done1", "Du modtager dit password, når kontoen er blevet godkendt af Administrator.");
define("L_EMAIL_VAL_3", "Din registrering afventer %s");
define("L_EMAIL_VAL_31", "Tillykke! Dine registreringsdata er blevet vurderet og godkendt!");
define("L_EMAIL_VAL_32", "Dette er dine registreringsdata for %s på %s:");
define("L_EMAIL_VAL_4", "Du har netop registreret denne konto hos %s på %s:");
define("L_EMAIL_VAL_41", "Du har foretaget væsentlige ændringer i dine konto-oplysninger hos %s på %s (den berørte konto: %s).");
define("L_EMAIL_VAL_5", "Dine - %s - oplysninger for brugerkonto %s");
define("L_EMAIL_VAL_51", "Dine opdaterede - %s - oplysninger for brugerkonto %s");
define("L_EMAIL_VAL_6", "Registreret den %s");
define("L_EMAIL_VAL_61", "Opdateret den %s");
define("L_EMAIL_VAL_7", "Herunder finder du dine %s opdaterede oplysninger for brugerkonto:");
define("L_EMAIL_VAL_8", "Gem denne e-mail, såfremt du får brug for den senere.\nGem dine oplysninger på et sikkert sted og lad ikke andre få adgang til dem.\nTak for din tilmelding! God fornøjelse!");
define("L_EMAIL_VAL_81", "Du kan ændre dit password på login-siden under \"".L_REG_4."\.");

// admin stuff
define("L_ADM_1", "%s er ikke længere moderator for dette rum.");	// brugernavn/kælenavn
define("L_ADM_2", "Du er ikke længere registreret som bruger.");

// error messages
define("L_ERR_USR_1", "Dette brugernavn er allerede optaget. Vælg venligst et andet.");
define("L_ERR_USR_2", "Du skal vælge et brugernavn.");
define("L_ERR_USR_3", "Dette brugernavn er allerede registreret.<br />Indtast venligst dit password eller vælg et andet brugernavn.");
define("L_ERR_USR_4", "Du har angivet et forkert password.");
define("L_ERR_USR_5", "Du skal indtaste dit brugernavn.");
define("L_ERR_USR_6", "Du skal indtaste dit password.");
define("L_ERR_USR_7", "Du skal indtaste din e-mail.");
define("L_ERR_USR_8", "Du skal indtaste en gyldig e-mail-adresse.");
define("L_ERR_USR_9", "Dette brugernavn er allerede i brug.");
define("L_ERR_USR_10", "Forkert brugernavn eller password.");
define("L_ERR_USR_11", "Du skal være administrator.");
define("L_ERR_USR_12", "Du er administrator, så du kan ikke fjernes.");
define("L_ERR_USR_13", "Hvis du vil oprette dit eget chatrum, skal du være registreret.");
define("L_ERR_USR_14", "Du skal være registreret, før du kan deltage i chatten.");
define("L_ERR_USR_15", "Du skal indtaste dit fulde navn.");
define("L_ERR_USR_16", "Kun følgende ekstrategn er tilladt:\\n".$REG_CHARS_ALLOWED."\\nMellemrum, komma eller backslash (\\) ikke tilladt.\\nTjek syntaksen.");
define("L_ERR_USR_16a", "Kun følgende ekstrategn er tilladt:<br />".$REG_CHARS_ALLOWED."<br />Mellemrum, komma eller backslash (\\)ikke tilladt. Tjek syntaksen.");
define("L_ERR_USR_17", "Det valgte chatrum eksisterer ikke, og du har ikke bemyndigelse til at oprette det.");
define("L_ERR_USR_18", "Du anvender et forbudt ord i dit brugernavn.");
define("L_ERR_USR_19", "Du kan ikke være i mere end et chatrum ad gangen.");
define("L_ERR_USR_20", "Du er blevet forvist fra dette chatrum eller fra chatten.");
define("L_ERR_USR_20a", "Du er blevet bortvist fra dette chatrum eller denne chat.<br />Begrundelse: %s");
define("L_ERR_USR_21", "Du har IKKE været aktiv de seneste ".C_USR_DEL." minutter,<br />og er derfor blevet sparket ud af chatten.");
define("L_ERR_USR_22", "Denne kommando understøttes ikke af \\nden browser, du anvender (IE engine).");
define("L_ERR_USR_23", "Hvis du vil deltage i et privat chatrum, skal du være registreret.");
define("L_ERR_USR_24", "Hvis du vil oprette et privat chatrum, skal du være registreret.");
define("L_ERR_USR_25", "Kun administrator kan anvende ".$COLORNAME." farve!<br />Undlad at anvende ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />Disse er reserveret powerbrugere!");
define("L_ERR_USR_26", "Kun administrator og moderator kan anvende ".$COLORNAME." farve!<br /> Undlad at anvende ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br /> Disse er reserveret powerbrugere!");
define("L_ERR_USR_27", "Du kan ikke sende en privat meddelelse til dig selv.\\nDet kan du gøre i dit eget hoved...\\nVælg et andet brugernavn.");
define("L_ERR_USR_28", "Din adgang til %s er blevet inddraget!<br />Vælg venligst et andet rum."); // room name
define("L_ERR_ROM_1", "Rummets navn kan ikke indeholde komma eller backslash (\\).");
define("L_ERR_ROM_2", "Forbudt ord fundet i navnet på det chatrum, du vil oprette.");
define("L_ERR_ROM_3", "Dette chatrum eksisterer allerede som offentligt chatrum.");
define("L_ERR_ROM_4", "Ugyldigt navn på chatrum.");

// users frame or popup
define("L_EXIT", "Afslut Chat");
define("L_DETACH", "Frigør Brugerliste");
define("L_EXPCOL_ALL", "Udvid/Sammentræk Alle");
define("L_CONN_STATE", "Opdatér Tilslutningstilstand");
define("L_CHAT", "Chat");
define("L_USER", "bruger");
define("L_USERS", "brugere");
define("L_LURKER", "lurepasser");
define("L_LURKERS", "lurepassere");
define("L_NO_USER", "Ingen brugere");
define("L_ROOM", "rum");
define("L_ROOMS", "rum");
define("L_EXPCOL", "Udvid/Sammentræk rum");
define("L_BEEP", "Beep/ingen beep ved brugers ankomst");
define("L_PROFILE", "Vis profil");
define("L_NO_PROFILE", "Ingen profil");

// input frame
define("L_HLP", "Hjælp");
define("L_MODERATOR", "%s er nu moderator i dette chatrum."); 	// brugernavn/kælenavn
define("L_KICKED", "%s er nu blevet sparket ud."); 	// brugernavn/kælenavn
define("L_KICKED_REASON", "%s er nu blevet sparket ud. (Begrundelse: %s)"); 	// brugernavn/kælenavn samt begrundelse
define("L_KICKED_ALL", "Alle brugere er nu sparket ud.");
define("L_KICKED_ALL_REASON", "Alle brugere er nu sparket ud. (Begrundelse: %s)");
define("L_BANISHED", "%s er nu blevet forvist."); 	// brugernavn/kælenavn
define("L_BANISHED_REASON", "%s er nu blevet forvist. (Begrundelse: %s)"); 	// brugernavn/kælenavn samt begrundelse
define("L_ANNOUNCE", "ANNOUNCE");
define("L_INVITE", "%s beder om, at du slutter dig til hende/ham i <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> rum."); 	// brugernavn/kælenavn samt navn på chatrum og invitationslink
define("L_INVITE_REG", "Du er blevet registreret som havende adgang til dette chatrum.");
define("L_INVITE_DONE", "Din invitation er blevet sendt til %s."); 	// brugernavn/kælenavn
define("L_OK", "Send");
define("L_BUZZ", "Lydgalleri");
define("L_BAD_CMD", "Dette er ikke en gyldig kommando!");
define("L_ADMIN", "%s er allerede administrator!"); 	// brugernavn/kælenavn
define("L_IS_MODERATOR", "%s er allerede moderator!"); 	// brugernavn/kælenavn
define("L_NO_MODERATOR", "Kun moderator for dette chatrum kan anvende denne kommando.");
define("L_NONEXIST_USER", "%s er ikke i dette chatrum."); 	// brugernavn/kælenavn
define("L_NONREG_USER", "%s er ikke registreret."); 	// brugernavn/kælenavn
define("L_NONREG_USER_IP", "Hans IP er: %s."); 	// IP adresse
define("L_NO_KICKED", "%s er moderator eller administrator og kan ikke sparkes ud."); 	// brugernavn/kælenavn
define("L_NO_BANISHED", "%s er moderator eller administrator og kan ikke forvises."); 	// brugernavn/kælenavn
define("L_SVR_TIME", "Server tid: ");
define("L_NO_SAVE", "Ingen meddelelser at gemme!");
define("L_NO_ADMIN", "Kun administrator kan anvende denne kommando.");
define("L_NO_REG_USER", "Du skal være registreret som bruger for at kunne anvende denne kommando.");

// help popup
define("L_HELP_TIT_1", "Smilies");
define("L_HELP_TIT_2", "Tekstformattering af meddelelser");
define("L_HELP_FMT_1", "Du kan indsætte fed, kursiv eller understreget tekst i meddelelser ved at omslutte den ønskede del af teksten med enten &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; eller &lt;U&gt; &lt;/U&gt; .<br />For eksempel vil  &lt;B&gt;denne tekst&lt;/B&gt; give <B>denne tekst</B>.");
define("L_HELP_FMT_2", "Hvis du vil oprette et hyperlink (til e-mail eller URL) i din meddelelse, skal du blot indtaste adressen uden at tilføje kode. Linket oprettes automatisk.");
define("L_HELP_TIT_3", "Kommandoer");
define("L_HELP_NOTE", "Alle kommandoer skal være på engelsk!");
define("L_HELP_MSG", "meddelelse");
define("L_HELP_MSGS", "meddelelser");
define("L_HELP_ROOM", "rum");
define("L_HELP_BUZZ", "~lydnavn");
define("L_HELP_BUZZ1", "Buzz..."); //alert, sound alert, ring, whirr
define("L_HELP_REASON", "grunden");
define("L_HELP_MR", "Hr. %s");
define("L_HELP_MS", "Fr. %s");
define("L_HELP_CMD_0", "{} angiver en påkrævet indstilling, [] som er valgfri.");
define("L_HELP_CMD_1a", "Indsæt antal poster, der skal vises. Minimum og standardindstilling er 5.");
define("L_HELP_CMD_1b", "Opdatér chatvinduet og vis de seneste n poster. Minimum og standardindstilling er 5.");
define("L_HELP_CMD_2a", "Redigér opdateringshastighed (i sekunder) for listen over meddelelser.<br />Hvis n ikke er angivet, eller hvis værdien er sat til under 3, skiftes mellem ingen opdatering og 10-sekunders opdatering.");
define("L_HELP_CMD_2b", "Redigér opdateringshastighed (i sekunder) for listen over meddelelser og brugere.<br />Hvis n ikke er angivet, eller hvis værdien er sat til under 3, skiftes mellem ingen opdatering og 10-sekunders opdatering.");
define("L_HELP_CMD_3", "Sortér poster i omvendt rækkefølge (understøttes ikke af alle browsere).");
define("L_HELP_CMD_4", "Gå til et andet chatrum, opret det, hvis det ikke allered eksisterer, og hvis du har tilladelse til at oprette rum.<br />n svarer til 0 for private og 1 for offentlige, standard er 1, såfremt intet andet angives.");
define("L_HELP_CMD_5", "Forlad chatten efter, at du har vist en valgfri meddelelse.");
define("L_HELP_CMD_6", "Undlad at vise poster fra en bruger, hvis brugernavn er angivet.<br />Fjern ignorering af bruger, hvis brugernavn og - begge er angivet, for alle brugere hvis - er, men ikke brugernavn.<br />Hvis intet er angivet, åbner denne kommando et pop-up vindue, der viser alle brugernavne indstillet til at ignoreres.");
define("L_HELP_CMD_7", "Genkald den foregående indtastede tekst (kommando eller meddelelse).");
define("L_HELP_CMD_8", "Vis/Skjul tid før meddelelser.");
define("L_HELP_CMD_9", "Spark brugeren ud af chatten. Denne kommando kan kun anvendes af en moderator for det pågældende chatrum eller af admin.<br />Valgfrit [".L_HELP_REASON."] kan vises begrundelsen for, at brugeren sparkes ud (tekst efter eget valg).<br />Hvis du vælger mulighed *, vil kommandoen sparke alle brugere uden bemyndigelse ud af chatten (gælder kun gæster og registrerede brugere). Denne funktion er nyttig, hvis der er problemer med serverforbindelsen, og alle tilstedeværende skal genindlæse chatten. I dette andet tilfælde anbefales det at give en [".L_HELP_REASON."], således at brugerne ved, hvorfor de sparkes ud.");
define("L_HELP_CMD_10", "Send en privat meddelelse til en bestemt bruger (andre brugere vil ikke kunne se denne meddelelse).");
define("L_HELP_CMD_11", "Vis oplysninger om en bestemt bruger.");
define("L_HELP_CMD_12", "Pop-up vindue til redigering af brugerprofil.");
define("L_HELP_CMD_13", "Skifter meddelelse ved brugers ankomst/afgang fra det aktuelle chatrum.");
define("L_HELP_CMD_14", "Tillader administrator eller moderator(er) i det aktuelle chatrum at udnævne en anden registreret bruger til moderator for samme rum.");
define("L_HELP_CMD_15", "Rydder chat-vinduet og viser kun de seneste 5 poster.");
define("L_HELP_CMD_16", "Gemmer de seneste n poster (officielle meddelelser undtaget) til en HTML fil. Hvis n ikke er angivet, vil alle tilgængelige poster blive medtaget i filen.");
define("L_HELP_CMD_17", "Tillader administrator at sende en meddelelse til alle brugere i alle chatrum.");
define("L_HELP_CMD_18", "Inviterer en bruger, der chatter i et andet rum, til at slutte sig til dig i det chatrum, du befinder dig i.");
define("L_HELP_CMD_19", "Gør det muligt for et rums moderator(er) eller administrator at \"forvise\" en bruger fra chatrummet for en periode, der er fastsat af administrator.<br />Sidstnævnte kan forvise en bruger, der chatter i et andet rum end det, han eller hun befinder sig i og kan anvende markeringen * til at forvise en bruger  \"for altid\" fra chatten som sådan.<br />Valgfrit [".L_HELP_REASON."] kan vises begrundelsen for, at brugeren forvises (tekst efter eget valg).");
define("L_HELP_CMD_20", "Beskriv hvad du laver uden at indlede sætningen med \"jeg\".");
define("L_HELP_CMD_21", "Lader andre brugere i chatten, der prøver at sende dig meddelelser, vide <br />at du er væk fra computeren. Når du kommer tilbage, skal du blot begynde at chatte igen.");
define("L_HELP_CMD_22", "Sender et buzzersignal og viser en valgfri meddelelse i det aktuelle chatrum.<br />- Brug:<br />- gl. brug: \"/buzz\" eller \"/buzz meddelelse, der skal vises\" - dette afspiller standard buzzersignalet, som er defineret i Admin panelet;<br />- udvidet brug: \"/buzz ~lydnavn\" or \"/buzz ~lydnavn meddelelse, der skal vises\" - dette afspiller lydfilen med det valgte lydnavn i formatet.wav fra mappen plus/sounds; vær opmærksom på, at tegnet \"~\" skal indsættes i begyndelsen af det andet ord, der er navnet på lydfilen, men uden anvendelse af filendelsen .wav (kun filer med filendelsen .wav er tilladt).<br />Som standard er dette en kommando reserveret for moderator/admin.");
define("L_HELP_CMD_23", "Sender en <i>hvisken</i> (privat meddelelse). Meddelelsen når modtageren, uanset hvilket rum, brugeren befinder sig i. Hvis modtageren ikke er online, eller hvis modtageren holder pause, får du besked om det.");
define("L_HELP_CMD_24", "This kommando ændrer emnet for det aktuelle chatrum. Undgå så vidt muligt at ignorere andre brugeres emner. Anvend vigtige emner.<br /> Som standard er dette en kommando reserveret for moderator/admin.<br />Hvis du anvender kommandoen \"/topic reset\" vil det aktuelle emne blive slettet og erstattet af det emne, der er indsat som standard for det pågældende chatrum.<br />Valgfrit \"/topic * {}\" og \"/topic * reset\" udfør samme handling, men i alle chatrum (globalt emne og nulstilling af globalt emne).");
define("L_HELP_CMD_25", "Et spil terning med tilfældige tai.<br />Sådan spiller du: /dice eller /dice [n];<br />n kan have en hvilken som helst værdi <b>mellem 1 og %s</b> (tallene svarer til antallet af øjne på den kastede terning). Hvis der ikke indtastes noget tal, anvendes den højeste standardværdi for antal kast.");
define("L_HELP_CMD_26", "Dette er en udvidet version af kommandoen /dice.<br /> Sådan spiller du: /{n1}d[n2] eller /{n1}d;<br />n1 kan have en hvilken som helst værdi <b> mellem 1 og %s</b> (tallet angiver antallet af kast).<br />n2 kan have en hvilken som helst værdi <b> mellem 1 og %s</b> (tallet angiver antallet af øjne pr. terningekast).");
define("L_HELP_CMD_27", "Denne funktion markerer posterne fra den valgte bruger, således at det er nemmere at følge med i, hvad brugeren siger, hvis der er flere andre der chatter samtidig.<br />Sådan gør du: /high {user} eller tryk på den lille knap <img src=./images/highlightOff.gif> til højre for brugernavnet (i listen over brugere i chatten)");
define("L_HELP_CMD_28", "Gør det muligt at poste <i>en enkelt fotofil</i> som en chatpost.<br />Sådan gør du: Billedfilen skal være på internettet og frit tilgængelig for alle. Link ikke til sider, der kræver log-in.<br />Den fulde sti til billedfilen skal indtastes! F.eks.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Tilladte filendelser: .jpg .bmp .gif .png. Linket er case sensitive!<br />TIPS: tast /img og dernæst et mellemrum og klip-og-kopier URL'en ind i boksen; hvis du vil kopiere URL'en for en billedfil fra en hjemmeside, kan du højreklikke på billedet, vælge Egenskaber og dernæst markere hele adressen/URL'en (af og til er det nødvendigt at scrolle et stykke ned). Herefter kopierer du det, der står efter /img og sætter det ind<br />Forsøg ikke at linke til billedfiler, der ligger på din egen PC: Hvis du gør det, vil chatvinduet lukke ned!!!");
define("L_HELP_CMD_29", "Den anden kommando sætter administrator eller moderator(er) for det aktuelle rum i stand til at degradere en anden registreret bruger, der tidligere var blevet forfremmet til moderator for det samme chatrum.<br />Markeringen * vil degradere brugeren fra alle chatrum.");
define("L_HELP_CMD_30", "Den anden kommando gør det samme som kommandoen /me, men viser om du er mand eller kvinde ved at tilføje kønsdeterminator i overensstemmelse med de angivelser, du har foretaget i din profil <br />F.eks. * ".sprintf(L_HELP_MR, "Ciprian")." ser TV eller * ".sprintf(L_HELP_MS, "Dana")." er glad.");
define("L_HELP_CMD_31", "Ændrer den rækkefølge, som brugerne vises på listen: efter ankomsttid eller alfabetisk.");
define("L_HELP_CMD_32", "Dette er den tredie (rollespils) version af terningespillet.<br />Sådan gør du: /d{n1}[tn2] eller /d{n1};<br />n1 kan have en hvilken som helst værdi <b>mellem 1 og 100</b> (tallet svarer til antallet af kast pr. terning).<br />n2 kan have en hvilken som helst værdi <b>mellem 1 og %s</b> (tallet svarer til antallet af terninger pr. kast).");
define("L_HELP_CMD_33", "Du kan ændre fontstørrelsen på dine poster i chatten efter behag (tilladte værdier for n: <b>mellem 7 og 15</b>); kommandoen /size ændrer fontstørrelsen tilbage til standardværdien (<b>".$FontSize."</b>).");
define("L_HELP_CMD_34", "Her kan en bruger angive tekstens justering (ltr = venstre-mod-højre, rtl = højre-mod-venstre).");
define("L_HELP_CMD_35", "Du kan poste <i>én video</i> eller <i>én audiofil</i> ad gangen i en lille Flash-afspiller.<br />Fremgangsmåde: indsæt adressen på den kilde, du vil poste! F.eks. <b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />Du skal have Shockwave Flash Player installeret på din maskine. Linket er versalfølsomt!<br />TIP: tast /video fulgt af mellemrum og indsæt linket i boksen.");
define("L_HELP_CMD_35a", "Den anden kommando fungerer kun med youtube.com som videokilde.<br />F.eks. <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b>");
define("L_HELP_CMD_36", "Du kan poste <i>én youtube video</i> ad gangen i en lille Flash-afspiller.<br />Fremgangsmåde: indsæt adressen på den kilde, du vil poste! F.eks. <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />Du skal have Shockwave Flash Player installeret på din maskine. Linket er versalfølsomt!<br />TIP: tast /tube fulgt af mellemrum og indsæt linket i boksen.");
define("L_HELP_CMD_VAR", "Synonymer (varianter): %s"); // a list of English and/or translated alternatives for each command, provided in help.
define("L_HELP_ETIQ_1", "Chat Etikette");
define("L_HELP_ETIQ_2", "Vi ønsker at denne chat skal være venlig og sjov, og derfor bedes du følge nedenstående retningslinjer. Hvis du ikke overholder retningslinjerne, risikerer du, at en af chattens moderatorer sparker dig ud fra chatten.<br /><br />Tak,");
define("L_HELP_ETIQ_3", "Retningslinjer for denne chat");
define("L_HELP_ETIQ_4", "<li>Undlad at \"spamme\" chatten ved at taste volapyk eller tilfældige bogstaver.</li>
<li>Undlad at anvende STorE oG SmÅ bogSTaVer i flæng.</li>
<li>Hold anvendelse af STORE BOGSTAVER på et minimum, da store bogstaver anses for at være råben.</li>
<li>Vær opmærksom på, at brugerne i denne chat kan være fra alle egne på jorden, og at du derfor kan komme ud for at møde mennesker med en anden tro end dig selv. Vær venlig og høflig mod sådanne folk.</li>
<li>Undlad at anvende bandeord overfor andre brugere af chatten. Allerbedst er det, hvis du helt afholder dig fra at anvende bandeord.</li>
<li>Undlad at kalde andre brugere ved deres rigtige navne, da nogle brugere ikke bryder sig om det. Anvend i stedet de respektive brugeres brugernavne.</li>");

// messages frame
define("L_NO_MSG", "Der er i øjeblikket ingen meddelelser ...");
define("L_TODAY_DWN", "Meddelelser fra i dag starter forneden");
define("L_TODAY_UP", "Meddelelser fra i går starter forneden");

// message colors
$TextColors = array("Black" => "#000000",
				"Rød" => "#FF0000",
				"Grøn" => "#009900",
				"Blå" => "#0000FF",
				"Lilla" => "#9900FF",
				"Mørkerød" => "#990000",
				"Mørkegrøn" => "#006600",
				"Mørkeblå" => "#000099",
				"Brun" => "#996633",
				"Havblå" => "#006699",
				"Orange" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Ignoreret");
define("L_IGNOR_NON", "Ingen ignorerede brugere");

// whois popup
define("L_WHOIS_ADMIN", "Administrator");
define("L_WHOIS_OWNER", "Ejeren");
define("L_WHOIS_TOPMOD", "Top Moderator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_MODERS", "Moderatorer");
define("L_WHOIS_OTHERS", "Andre brugere");
define("L_WHOIS_USER", "Bruger");
define("L_WHOIS_GUEST", "Gæst");
define("L_WHOIS_REG", "Registreret");
define("L_WHOIS_BOT", "Bot");

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s er tiltrådt chatten.");
define("L_EXIT_ROM", "%s har afsluttet chatten.");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s er automatisk sparket ud for inaktivitet.");
define("L_CLOSED_ROM", "%s har lukket browseren.");

// Text for /away command notification string:
define("L_AWAY", "%s er fraværende...");
define("L_BACK", "%s er tilbage!");

// Quick Menu mod
define("L_QUICK", "Lynmenu");

// Topic Banner mod
define("L_TOPIC", "har valgt EMNET:");
define("L_TOPIC_RESET", "har valgt et nyt EMNE");
define("L_HELP_TOP", "mindst to ord som emne");
define("L_BANNER_WELCOME", "Velkommen til %s!");
define("L_BANNER_TOPIC", "Emne:");
define("L_DEFAULT_TOPIC_1", "Dette er et standardemne. Redigér filen localization/_owner/owner.php , hvis du vil ændre emnet!");

// Img cmd mod
define("L_PIC", "Billede postet af");
define("L_PIC_RESIZED", "Resized til");
define("L_HELP_IMG", "den fulde sti til det billede, du vil poste");
define("L_NO_IMAGE", "Dette er ikke en gyldig URL for et offentligt remote image.\\nPrøv igen!");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s er ikke længere moderator for noget chatrum i denne chat.");
define("L_IS_NO_MODERATOR", "%s er ikke moderator.");
define("L_ERR_IS_ADMIN", "%s er administrator!\\nDu kan ikke ændre administrators tilladelser.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "Yderligere Kommandoer:");
define("INFO_MODS", "Yderligere Features/Mods:");
define("INFO_BOT", "Denne chats bot hedder:");

// Profile mod
define("L_PRO_1", "Talte sprog");
define("L_PRO_1a", "Sprog");
define("L_PRO_2", "Favorit link 1");
define("L_PRO_3", "Favorit link 2");
define("L_PRO_4", "Beskrivelse");
define("L_PRO_5", "Billed URL");
define("L_PRO_6", "Navn/Tekstfarve");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "Ugyldig URL eller ikke-eksisterende host.");
define("L_TITLE_AV", "Dit nuværende avatar: ");
define("L_CHG_AV", "Klik \"".L_REG_16."\" i profilformularen<br />for at gemme dit Avatar.");
define("L_SEL_NEW_AV", "Vælg et nyt Avatar");
define("L_EX_AV", "eksempel");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Indtast URL og tryk dernæst på ENTER for at tjekke)");
define("L_CANCEL", "Afbryd");
define("L_AVA_REG", "Du skal være registreret som bruger for at kunne ændre det viste avatar");
define("L_SEL_NEW_AV_CONFIRM", "Din formular er ikke sendt.\\nHvis du skifter til avatars nu, mister du\\nalle ændringer foretaget indtil nu!\\n\\nEr du sikker?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Vores bot er altid hjemme. Tast <b>hello ".C_BOT_NAME."</b> og få en sludder. Tast: <b>bye ".C_BOT_NAME."</b> for at afbryde. (privat: /to <b>".C_BOT_NAME."</b> Meddelelse)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Vores bot er aktiv i %s chatrum. Tal privat ved at klikke på navnet og sende en privat meddelelse. (kommando: /wisp <b>".C_BOT_NAME."</b> Meddelelse)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Vores bot er ikke offentligt aktiv. Tal privat ved at klikke på navnet. (kommando: /to <b>".C_BOT_NAME."</b> Meddelelse eller /wisp <b>".C_BOT_NAME."</b> Meddelelse)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Botten er ikke aktiv i dette chatrum!");
define("BOT_START_ERROR", "Botten er allerede aktiv i dette chatrum!");
define("BOT_DISABLED_ERROR", "Botten er deaktiveret i Admin Panelet!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "kaster terningen og resultatet er:");
define("DICE_WRONG", "Du skal vælge, hvor mange terninger, du vil kaste \\n(Vælg et tal mellem 1 og ".MAX_ROLLS.").\\nTast /dice hvis du vil kaste alle".MAX_ROLLS." terninger.");
define("DICE2_WRONG", "Den anden værdi er sat til mellem 1 og ".MAX_ROLLS.".\\nLad feltet stå tomt, hvis du vil kaste alle ".MAX_ROLLS." terninger\\n(f.eks. /".MAX_DICES."d eller /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Den første værdi skal være mellem 1 og ".MAX_DICES.".\\n(f.eks. /".MAX_DICES."d eller /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Den anden værdi skal være mellem 1 og ".MAX_ROLLS.".\\nLad feltet stå tomt, hvis du vil kaste alle ".MAX_ROLLS." terninger\\n(f.eks. /d50 eller /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "åben pop-up ved privat meddelelse");
define("L_REG_POPUP_NOTE", "Din pop-up blocker skal være slået fra!");
define("L_PRIV_POST_MSG", "Send en privat meddelelse!");
define("L_PRIV_MSG", "Ny privat meddelelse modtaget!");
define("L_PRIV_MSGS", "%s ny privat meddelelse modtaget!");
define("L_PRIV_MSGSa", "Her er de første 10 meddelelser!<br />Brug linket i bunden, hvis du vil se resten.");
define("L_PRIV_MSG1", "Fra:");
define("L_PRIV_MSG2", "Rum:");
define("L_PRIV_MSG3", "Til:");
define("L_PRIV_MSG4", "Meddelelse:");
define("L_PRIV_MSG5", "Postet:");
define("L_PRIV_REPLY", "Svar");
define("L_PRIV_READ", "Tryk på knappen ’".L_REG_25."’, hvis du vil markere alle poster som læst!");
define("L_PRIV_POPUP", "Du kan deaktivere/aktivere pop-up funktionen når som helst <br />ved at redigere din");
define("L_PRIV_POPUP1", "profil</a> (kun registrerede brugere)");
define("L_NOT_ONLINE", "%s er ikke online lige nu.");
define("L_PRIV_NOT_ONLINE", "%s er ikke online lige nu,\\nmen vil modtage din besked, når han/hun logger ind næste gang.");
define("L_PRIV_NOT_INROOM", "%s er ikke i dette chatrum.\\nHvis du alligevel vil sende en privat meddelelse til denne bruger,\\nskal du bruge kommandoen: /wisp %s meddelelse.");
define("L_PRIV_AWAY", "%s er fraværende,\\nmen vil modtage din besked, \\nnår han/hun vender tilbage.");
define("PM_DISABLED_ERROR", "Hvisken (private meddelelser)\\ner deaktiveret i denne chat.");
define("L_NEXT_PAGE", "Gå til næste side");
define("L_NEXT_READ", "Læs de næste %s"); // poster / 10 poster
define("L_ROOM_ALL", "Alle chatrum");
define("L_PRIV_NO_MSGS", "Ingen private meddelelser modtaget");
define("L_PRIV_READ_MSG", "1 privat meddelelse modtaget"); //singular
define("L_PRIV_READ_MSGS", "%s private meddelelser modtaget"); //plural
define("L_PRIV_MSGS_NEW", "Ny");
define("L_PRIV_MSGS_READ", "Læs");
define("L_PRIV_MSG6", "Status:");
define("L_PRIV_RELOAD", "Opdatér side");
define("L_PRIV_MARK_ALL", "Markér alle som Læst");
define("L_PRIV_MARK_SEL", "Markér udvalgte som Læst");
define("L_PRIV_REMOVE", "Slet markerede meddelelser"); // or selected
define("L_PRIV_PM", "(privat)");
define("L_PRIV_WISP", "(hvisk)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "Til");
define("L_DISABLED", "Fra");
define("L_COLOR_HEAD_SETTINGS", "Aktuelle indstillinger på denne server:");
define("L_COLOR_HEAD_SETTINGSa", "Standardfarver:");
define("L_COLOR_HEAD_SETTINGSb", "Standardfarver:");
define("L_COL_HELP_TITLE", "Farvevælger");
define("L_COL_HELP_SUB1", "Sådan gør du:");
define("L_COL_HELP_P1", "Du kan vælge din egen standardfarve ved at redigere din profil (samme farve som  anvendes til dit brugernavn). Du vil stadig kunne vælge at anvende en anden farve. Hvis du vil skifte tilbage til din standardfarve fra en tilfældigt valgt anden farve, skal du vælge standardfarve (Null) - det er den første farve i farvelisten.");
define("L_COL_HELP_SUB2", "Tips:");
define("L_COL_HELP_P2", "<u>Farveområder</u><br />Afhængigt af din browser/dit operativsystem kan det forekomme, at nogle farver ikke kan vises korrekt. WC3 HTML 4.0 standarden understøtter kun 16 farver:");
define("L_COL_HELP_P2a", "Hvis en bruger hævder, at han ikke kan se din valgte farve, betyder det sandsynligvis, at vedkommende anvender en ældre browser.");
define("L_COL_HELP_SUB3", "Farveindstillinger gældende for denne chat:");
define("L_COL_HELP_P3", "<u>Powerfarver anvendes som følger</u>:<br />1. Administrator kan anvende alle farver.<br />Standardfarven for administrator er <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderatorer kan anvende alle farver undtagen <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> og <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br /> Standardfarven for moderatorer er <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Andre brugere kan anvende alle farver undtagen <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> og <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Standardfarven er <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Tekniske oplysninger</u>: Disse farver er fastsat af administrator i admin panelet.<br />Hvis noget går galt, eller hvis der er noget ved standardfarverne, som du ikke synes om, bør du kontakte <b>administrator</b> først, ikke de andre brugere i chatten. :-)");
define("L_COL_HELP_USER_STATUS", "Din status");
define("L_COL_TUT", "Anvendelse af farvet tekst i chatten");
define("L_NULL", "Nul");
define("L_NULL_F", ""); // feminine word, if it's the case
define("L_ROOM_COLOR", "rummets farve");
define("L_PRO_COLOR", "profilens farve");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Kun administrator kan anvende ".COLOR_CA." farve!\\n\\nDin tekstfarve indstilles til ".COLOR_CM."!\\n\\nVælg venligst en anden farve.");
define("COL_ERROR_BOX_USRA", "Kun administrator kan anvende ".COLOR_CA." farve!\\n\\nForsøg ikke at anvende ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." eller ".COLOR_CM1.".\\n\\nDisse farver er reserveret powerbrugere!\\n\\nDin tekstfarve indstilles til ".COLOR_CD."!\\n\\nVælg venligst en anden farve.");
define("COL_ERROR_BOX_USRM", "Du skal være moderator for at kunne anvende ".COLOR_CM." farve!\\n\\nForsøg ikke at anvende ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." eller ".COLOR_CM1.".\\n\\nDisse farver er reserveret powerbrugere!\\n\\nDin tekstfarve indstilles til ".COLOR_CD."!\\n\\nVælg venligst en anden farve.");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "Velkommen til chatten. Følg venligst netiketten, mens du chatter: <I>forsøg at være venlig og imødekommende</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Indstillingerne for denne server er blevet ændret. Undgå fejl eller nedbrud ved at opdatere browservinduet (Tryk på F5 eller vælg Afslut og åben chatten igen).");

//Size command error by Ciprian
define("L_ERR_SIZE", "Du kan kun vælge fontstørrelsen\\nnull (ved nulstilling) eller mellem 7 og 15");

// Password reset form by Ciprian
define("L_PASS_0", "Formular til ændring af password");
define("L_PASS_1", "Hemmelige spørgsmål");
define("L_PASS_2", "Hvilket mærke var din første bil?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "Hvad hed dit første kæledyr?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "Hvad er din yndlingsdrink?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "Hvad er din fødselsdato?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "Hemmelige svar");
define("L_PASS_7", "Skift password");
define("L_PASS_8", "Dit password er blevet ændret.");
define("L_PASS_9", "Dit nye password til chatten");
define("L_PASS_10", "Dit nye password til chatten: %s");
define("L_PASS_11", "Velkommen tilbage til chatten!");
define("L_PASS_12", "Vælg dit spørgsmål ...");
define("L_ERR_PASS_1", "Forkert brugernavn. Vælg dit eget.");
define("L_ERR_PASS_2", "Forkert e-mail. Prøv igen!");
define("L_ERR_PASS_3", "Forkert hemmeligt spørgsmål.<br />Besvar spørgsmålet herunder!");
define("L_ERR_PASS_4", "Forkert hemmeligt svar. Prøv igen!");
define("L_ERR_PASS_5", "Du har ikke angivet dine private/hemmelige data.");
define("L_ERR_PASS_6", "Du har endnu ikke angivet dine private/hemmelige data.<br />Du kan ikke anvende denne formular. Kontakt admin!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s er blevet administrator for denne chat.");
define("L_ADM_4", "%s er ikke længere administrator for denne chat.");

// Open Schedule by Ciprian
define("L_DAILY", "Dagligt");
define("L_ALWAYS", "altid");
define("L_OPEN", "Åben");
define("L_CLOSED", "Lukket");
define("L_OPEN_PUB", "OPEN TO THE PUBLIC");
define("L_CLOSED_PUB", "CLOSED TO THE PUBLIC");

// Links popup page by Alex
define("L_LINKS_1", "Postede links");
define("L_LINKS_2", "Her kan du få adgang til de postede links");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Klik her %s %s");
define("L_CLICK", "Klik her %s");
define("L_LINKS_3", "for at åbne linket");
define("L_LINKS_4", "for at åbne forfatterens hjemmeside");
define("L_LINKS_5", "for at indsætte smiley");
define("L_LINKS_6", "for at kontakte");
define("L_LINKS_7", "for at besøge hjemmesiden phpMyChat");
define("L_LINKS_8", "for at blive medlem af phpMyChat Group");
define("L_LINKS_9", "for at sende feedback");
define("L_LINKS_10", "for at downloade phpMyChat Plus");
define("L_LINKS_11", "for at se, hvem der chatter");
define("L_LINKS_12", "for at åbne siden Chat Login");
define("L_LINKS_13", "for at afspille denne lydfil"); // can also be translated as "to play this sound"
define("L_LINKS_14", "for at anvende denne kommando");
define("L_LINKS_15", "for at åbne");
define("L_LINKS_16", "Smiley Galleriet");
define("L_LINKS_17", "for at sortere i stigende orden");
define("L_LINKS_18", "for at sortere i faldende orden");
define("L_LINKS_19", "hvis du vil oprette/ændre dit Gravatar");
define("L_LINKS_20", "Postede Ligninger");
define("L_SWITCH", "Skift til %s"); // E.g. "Skift til italiensk" (Country Flags mouseover / Language switching)
define("L_SELECTED", "er valgt"); // E.g. "Fransk - er valgt" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", ""); // feminine word, if it's the case
define("L_NOT_SELECTED", "ikke valgt");
define("L_NOT_SELECTED_F", ""); // feminine word, if it's the case
define("L_EMAIL_1", "for at sende en e-mail til");
define("L_FULLSIZE_PIC", "for at åbne billedet i fuld størrelse");
define("L_PRIVACY", "for at læse vores Politik om Privatliv"); //Click here to…
define("L_AUTHOR", "forfatteren"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "ophavsmanden til denne chat"); //same here
define("L_OWNER", "ejeren af denne chat"); //same here
define("L_TRANSLATOR", "oversætteren"); //same here

// Counter on login
define("L_VISITOR_REPORT", "... besøgende siden %s");

// Status bar messages
define("L_JOIN_ROOM", "Deltag i dette chatrum");
define("L_USE_NAME", "Anvend dette brugernavn");
define("L_USE_NAME1", "Adressér til dette brugernavn");
define("L_WHSP", "Hvisken");
define("L_SEND_WHSP", "Send en hvisken");
define("L_SEND_PM_1", "Send PM");
define("L_SEND_PM_2", "Send en privat meddelelse");
define("L_HIGHLIGHT", "Markér/Fjern markering ");
define("L_HIGHLIGHT_SB", "Markér/Fjern markering fra denne brugers poster");

//Lurking frame popup
define("L_LURKING_2", "Lurepasser-side");
define("L_LURKING_3", "lurepasse");
define("L_LURKING_4", "sluttede sig til");
define("L_LURKING_5", "Ukendt");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Ekstra funktioner");
define("L_ARCHIVE", "Åben Arkiv");
define("L_SOUNDFIX_IE_1", "Sound fix til IE");
define("L_SOUNDFIX_IE_2", "Download en sound fix til IE");
define("L_LURKING_1", "Åben lurepasser-siden");
define("L_REG_BRB", "brb (jeg skal lige ud og registrere mig)");
define("L_DEL_BYE", "vent ikke på mig");
define("L_EXTRA_PRIV1", "Læs meddelelser");
define("L_EXTRA_PRIV2", "Nye meddelelser");

// Set the first day of the week in your language
define("FIRST_DAY", "1"); // 1 for Monday, 0 for Sunday

// Months Long Names
define("L_JAN", "januar");
define("L_FEB", "februar");
define("L_MAR", "marts");
define("L_APR", "april");
define("L_MAY", "maj");
define("L_JUN", "juni");
define("L_JUL", "juli");
define("L_AUG", "august");
define("L_SEP", "september");
define("L_OCT", "oktober");
define("L_NOV", "november");
define("L_DEC", "december");
// Months Short Names
define("L_S_JAN", "jan.");
define("L_S_FEB", "feb.");
define("L_S_MAR", "mrs.");
define("L_S_APR", "apr.");
define("L_S_MAY", "maj");
define("L_S_JUN", "juni");
define("L_S_JUL", "juli");
define("L_S_AUG", "aug.");
define("L_S_SEP", "sept.");
define("L_S_OCT", "okt.");
define("L_S_NOV", "nov.");
define("L_S_DEC", "dec.");
// Week days Long Names
define("L_MON", "mandag");
define("L_TUE", "tirsdag");
define("L_WED", "onsdag");
define("L_THU", "torsdag");
define("L_FRI", "fredag");
define("L_SAT", "lørdag");
define("L_SUN", "søndag");
// Week days Short Names
define("L_S_MON", "ma");
define("L_S_TUE", "ti");
define("L_S_WED", "on");
define("L_S_THU", "to");
define("L_S_FRI", "fr");
define("L_S_SAT", "lø");
define("L_S_SUN", "sø");

// Localized date format – nothing to translate – skip this paragraph, Ciprian will adjust it for you! Actually, together 
// Set the DK specific date/time format
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "danish.UTF-8", "danish"); // For DK formats
} else {
setlocale(LC_ALL, "da_DK.UTF-8", "da_DK.UTF-8@euro", "dnk.UTF-8", "dnk.UTF-8"); // For DK formats
}
define("L_LANG", "da_DK");
define("ISO_DEFAULT", "iso-8859-1");
define("WIN_DEFAULT", "windows-1252");
define("L_SHORT_DATE", "%d-%m-%Y"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%A den %d. %B %Y"); //Change this to your local desired format (keep the long form)
define("L_SHORT_DATETIME", "%d-%m-%Y %H.%M.%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%A den %d. %B %Y %H.%M.%S"); //Change this to your local desired format (keep the short form)
define("L_CAL_FORMAT", "%d. %B %Y"); // Calendar format

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","brugere ".LOGIN_LINK."chatter</A> i øjeblikket.");
define("USERS_LOGIN","1 bruger ".LOGIN_LINK."chatter</A> i øjeblikket.");
define("NO_USER","Ingen brugere ".LOGIN_LINK."chatter</A> i øjeblikket.");
define("L_PRIV_REPLY_LOGIN", "Log ind på chatten, hvis du vil ".LOGIN_LINK."sende et svar</A> på en af de nye meddelelser på listen herover");

// Language names
define("L_LANG_AR", "argentinsk spansk");
define("L_LANG_BR", "brasiliansk portugisisk");
define("L_LANG_BG", "bulgarsk - kyrillisk");
define("L_LANG_CZ", "tjekkisk");
define("L_LANG_DA", "dansk");
define("L_LANG_DE", "tysk");
define("L_LANG_EN", "engelsk"); // gælder kun admin panelet
define("L_LANG_ENUK", "britisk engelsk"); // gælder britiske formater og flag
define("L_LANG_ENUS", "amerikansk engelsk"); // gælder amerikanske formater og flag
define("L_LANG_ES", "spansk");
define("L_LANG_FA", "persisk (farsi)");
define("L_LANG_FR", "fransk");
define("L_LANG_GR", "græsk");
define("L_LANG_HE", "hebræisk");
define("L_LANG_HI", "hindi");
define("L_LANG_HU", "ungarsk");
define("L_LANG_ID", "indonesisk");
define("L_LANG_IT", "italiensk");
define("L_LANG_JA", "japansk (kanji)");
define("L_LANG_KA", "georgisk");
define("L_LANG_NE", "nepalesisk");
define("L_LANG_NL", "hollandsk");
define("L_LANG_RO", "rumænsk");
define("L_LANG_SK", "slovakisk");
define("L_LANG_SRL", "serbisk - latinsk");
define("L_LANG_SRC", "serbisk - kyrillisk");
define("L_LANG_SV", "svensk");
define("L_LANG_TR", "tyrkisk");
define("L_LANG_UR", "urdu");
define("L_LANG_VI", "vietnamesisk");

// Skins preview page
define("L_SKINS_TITLE", "Gennemse Skins");
define("L_SKINS_TITLE1", "Skins %s til %s gennemsyn"); // Skins 1 to 4 preview
define("L_SKINS_AV", "Tilgængelige skins");
define("L_SKINS_NONAV", "Der er ingen styles defineret i mappen \"skins\"");
define("L_SKINS_COPY", "&copy; %s Skin fra %s"); //© 2008 Skin by AuthorName

// Swap image titles by Ciprian
define("L_GEN_ICON", "Ikon for køn");

// Ghost mode by Ciprian
define("L_GHOST", "Ghost");
define("L_SUPER_GHOST", "Super Ghost");
define("L_NO_GHOST", "Synlig");

// Sorting options by Ciprian
define("L_ASC", "Stigende");
define("L_DESC", "Faldende");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "Samlet antal besøg"); // number of logins (returning visits) to chat

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "Brug Gravatar");

// Uploader mod by Ciprian
define("L_UPLOAD", "Overførsel %s"); // Upload Image, Upload Sound or Upload File
define("L_UPLOAD_IMG", "Billedfil"); // used to upload Avatars and /img command
define("L_UPLOAD_SND", "Lydfil"); // used to upload Buzz sounds
define("L_UPLOAD_FLS", "Filer"); // used to upload multiple files at once
define("L_UPLOAD_SUCCESS", "%s overført som %s."); // original filename, destination filename
define("L_FILES_TITLE", "Håndtering af Overførsler");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "Adgang forbudt");
define("L_RESTRICTED_ROM", "%s har ikke længere adgang til dette rum.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "Log ind med OpenID");
define("L_OPID_REG", "Importér din OpenID profil");

// Support buttons
define("L_SUPP_WARN", "Du har valgt at bidrage til udviklingen af det gratis program\\n".APP_NAME." ved at sende et bidrag til programudvikleren.\\nTak for din støtte!\\n\\nBemærk: modtageren er ikke ejeren af denne chat.\\nIndtast beløbsstørrelse på næste side.\\n\\nFortsæt?");
define("L_SUPP_ALT", "Støt udviklingen af ".APP_NAME." med PayPal - det er Hurtigt, Gratis og Sikkert!");

// Video & Audio & Youtube cmds (Embevi & YouTube player class) – same approach as in // Img cmd mod section!
define("L_AUDIO", "Audiofil postet af");
define("L_VIDEO", "Video postet af");
define("L_HELP_VIDEO", "fuld sti til video- eller audiokilde, du vil poste");
define("L_NO_VIDEO", "URL kan ikke embeddes.\\nDette er ikke en gyldig URL for en godkendt offentlig video- eller audiokilde.\\nPrøv igen!");
define("L_ORIG_VIDEO", "for at åbne den originale kilde"); //it sounds like: Click here to open the…

// Birthday mod - by Ciprian
define("L_PRO_7", "Fødselsdato");
define("L_PRO_8", "Vis fødselsdato i offentlige oplysninger");
define("L_PRO_9", "Vis alder i offentlige oplysninger");
define("L_PRO_10", "Alder");
define("L_PRO_11", "%1\$d år, %2\$d måneder og %3\$d dage"); //you can also change the order here, but 1 stands for years, 2 for months and 3 for days
define("L_DOB_TIT_1", "Fødselsdagsliste");
$L_DOB_SUBJ = "Tillykke med Fødselsdagen %s!";

// MathJax (MathML/TeX) formulas rendering in chat - by Ciprian
define("L_EQUATION", "Ligning");
define("L_MATH", "%s postet af %s"); //e.g. "Equation posted by username" (defined above); the word "Equation" will render as a url to show popup with the posted formulas
?>