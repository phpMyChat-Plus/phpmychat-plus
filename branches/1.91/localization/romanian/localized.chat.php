<?php
// File : romanian/localized.chat.php - plus version (25.03.2007 - rev.16)
// Original translation started by Radu Swider <swidera@satline.ro>, first updated by Ciprian Popovici-Oana <floppy@kermit.cs.pub.ro>
// Corrected, finalized, diacritics addition and updated to Plus version by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "iso-8859-2";

// medium font size în pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Mesajele se ºterg dupã");
define("L_WEL_2", "iar utilizatorii inactivi dupã");

define("L_CUR_1", "Acum");
define("L_CUR_1a", "sunt");
define("L_CUR_1b", "este");
define("L_CUR_2", "pe chat");
define("L_CUR_3", "Utilizatori aflaþi în camere de chat");
define("L_CUR_4", "utilizatori în camere private");
define("L_CUR_5", "Utilizatori care monitorizeazã<br>aceastã paginã (spectatori):");

define("L_SET_1", "Introdu-þi datele...");
define("L_SET_2", "Porecla");
define("L_SET_3", "numãrul de mesaje de afiºat");
define("L_SET_4", "timpul de actualizare");
define("L_SET_5", "Selecteazã o camerã de chat...");
define("L_SET_6", "Camere disponibile");
define("L_SET_7", "Alegeþi ...");
define("L_SET_8", "Camere publice create de utilizatori");
define("L_SET_9", "Creeazã-þi camera ta");
define("L_SET_10", "publicã");
define("L_SET_11", "privatã");
define("L_SET_12", "");
define("L_SET_13", "Apoi intrã pe");
define("L_SET_14", "Chat");
define("L_SET_15", "Camere private disponibile");
define("L_SET_16", "Camere private create de utilizatori");
define("L_SET_17", "Alege-þi un avatar");
define("L_SET_18", "Adaugã în Favorite: apasã \"CTRL +D\".");

define("L_SRC", "este disponibil gratuit de la");

define("L_SECS", "secunde");
define("L_MIN", "minut");
define("L_MINS", "minute");
define("L_HOUR", "orã");
define("L_HOURS", "ore");

// registration stuff:
define("L_REG_1", "Parola");
define("L_REG_2", "Configurare date cont / Administrare setãri");
define("L_REG_3", "Înregistrare");
define("L_REG_4", "Editare profil");
define("L_REG_5", "ªtergere utilizator");
define("L_REG_6", "Înregistrare utilizator");
define("L_REG_7", "numai dacã eºti deja înregistrat");
define("L_REG_8", "Email-ul tãu");
define("L_REG_9", "Ai fost înregistrat cu succes.");
define("L_REG_10", "Înapoi");
define("L_REG_11", "Modificare");
define("L_REG_12", "Modificã datele despre utilizator");
define("L_REG_13", "ªterge utilizator");
define("L_REG_14", "Login");
define("L_REG_15", "Intrã");
define("L_REG_16", "Schimbã");
define("L_REG_17", "Datele tale au fost modificate cu succes.");
define("L_REG_18", "Ai fost dat afarã din camerã de cãtre un moderator al acestui chat.");
define("L_REG_18a", "Ai fost dat afarã din camerã de cãtre un moderator al acestui chat.<br>Motivul: %s");
define("L_REG_19", "Chiar vrei sã fii ºters?");
define("L_REG_20", "Da");
define("L_REG_21", "Ai fost ºters cu succes.");
define("L_REG_22", "Nu");
define("L_REG_25", "Închide");
define("L_REG_30", "Prenumele");
define("L_REG_31", "Numele");
define("L_REG_32", "WEB");
define("L_REG_33", "Aratã e-mailul la comanda /whois");
define("L_REG_34", "Editare profil");
define("L_REG_35", "Administrare");
define("L_REG_36", "Localitatea, þara");
define("L_REG_37", "Câmpurile care conþin <span class=\"error\">*</span> <b>trebuiesc</b> completate.");
define("L_REG_39", "Camera în care te aflai a fost curãþatã de administrator.");
define("L_REG_45", "Sex");
define("L_REG_46", "Masculin");
define("L_REG_47", "Feminin");
define("L_REG_48", "Nespecificat");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Acestea sunt datele tale pentru a te loga la chat");
define("L_EMAIL_VAL_2", "Bun venit pe serverul nostru de chat!");
define("L_EMAIL_VAL_Err", "Eroare internã, te rugãm sã contactezi administratorul: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Parola a fost trimisã la adresa de e-mail aleasã de tine.");

// admin stuff
define("L_ADM_1", "%s nu mai este moderator al acestei camere.");
define("L_ADM_2", "Nu mai eºti înregistrat.");

//error messages
define("L_ERR_USR_1", "Acest nume este folosit deja. Alege-þi altul.");
define("L_ERR_USR_2", "Trebuie sã-þi alegi un nume.");
define("L_ERR_USR_3", "Acest nume este deja înregistrat.<br>Introdu parola sau alege o altã poreclã.");
define("L_ERR_USR_4", "Ai scris o parolã incorectã.");
define("L_ERR_USR_5", "Trebuie sã scrii numele.");
define("L_ERR_USR_6", "Trebuie sã scrii parola.");
define("L_ERR_USR_7", "Trebuie sã scrii adresa ta de e-mail.");
define("L_ERR_USR_8", "Trebuie sã scrii o adresa de e-mail corectã.");
define("L_ERR_USR_9", "Acest nume este deja folosit.");
define("L_ERR_USR_10", "Nume sau parolã incorecte.");
define("L_ERR_USR_11", "Trebuie sã fii administrator.");
define("L_ERR_USR_12", "Eºti administrator, nu poþi fi ºters.");
define("L_ERR_USR_13", "Pentru a crea o camerã trebuie sã fii înregistrat.");
define("L_ERR_USR_14", "Trebuie sã fii înregistrat înainte de a intra pe chat.");
define("L_ERR_USR_15", "Trebuie sã scrii numele complet.");
define("L_ERR_USR_16", "Numai aceste extra-caractere sunt permise:\\n".$REG_CHARS_ALLOWED."\\nSpaþii, virgule sau backslash-uri (\\) nu sunt permise.\\nVerificã sintaxa!");
define("L_ERR_USR_16a", "Numai aceste extra-caractere sunt permise:<br />".$REG_CHARS_ALLOWED."<br>Spaþii, virgule sau backslash-uri (\\) nu sunt permise. Verificã sintaxa!");
define("L_ERR_USR_17", "Camera aleasã nu existã sau nu ai dreptul sã o creezi.");
define("L_ERR_USR_18", "Cuvânt interzis folosit în cadrul poreclei.");
define("L_ERR_USR_19", "Nu poþi fi în mai multe camere simultan.");
define("L_ERR_USR_20", "Ai fost blocat din aceastã camerã sau de pe chat.");
define("L_ERR_USR_20a", "Ai fost blocat din aceastã camerã sau de pe chat.<br>Motivul: %s");
define("L_ERR_USR_21", "Nu ai fost activ în ultimele ".C_USR_DEL." minute,<br>de aceea ai fost eliminat din camerã.");
define("L_ERR_USR_22", "aceastã comandã nu funcþioneazã\\nin browser-ul tãu (pe nucleu de IE).");
define("L_ERR_USR_23", "Trebuie sã fii înregistrat înainte de a intra în camere private.");
define("L_ERR_USR_24", "Trebuie sã fii înregistrat înainte de a crea camere proprii.");
define("L_ERR_USR_25", "Numai administratorul poate folosi culoarea ".$COLORNAME."!<br>Nu încerca sã foloseºti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1.".<br>Acestea sunt rezervate utilizatorilor speciali!");
define("L_ERR_USR_26", "Numai administratorii sau moderatorii pot folosi culoarea ".$COLORNAME."!<br>Nu încerca sã foloseºti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br>Acestea sunt rezervate utilizatorilor speciali!");
define("L_ERR_USR_27", "Nu-þi poþi vorbi þie însuþi în ºoaptã.\\nFã asta în minte...\\nAlege un alt destinatar.");
define("L_ERR_ROM_1", "Numele camerei nu poate conþine virgule sau backslash (\\).");
define("L_ERR_ROM_2", "Numele camerei pe care ai vrut s-o creezi conþine un cuvânt interzis. Reformuleazã.");
define("L_ERR_ROM_3", "Exista deja o camerã publicã cu acest nume.");
define("L_ERR_ROM_4", "Numele camerei este invalid.");

// users frame or popup
define("L_EXIT", "Ieºire");
define("L_DETACH", "Detaºeazã lista de utilizatori");
define("L_EXPCOL_ALL", "Extinde/Comprimã tot");
define("L_CONN_STATE", "Refã starea conexiunii");
define("L_CHAT", "Chat");
define("L_USER", "utilizator");
define("L_USERS", "utilizatori");
define("L_LURKER", "spectator");
define("L_LURKERS", "spectatori");
define("L_NO_USER", "Nici un utilizator");
define("L_ROOM", "camerã");
define("L_ROOMS", "camere");
define("L_EXPCOL", "Extinde/Comprimã camera");
define("L_BEEP", "Cu/fãrã sunet la intrarea utilizatorilor în camerã");
define("L_PROFILE", "Aratã profilul");
define("L_NO_PROFILE", "Fãrã profil");

// input frame
define("L_HLP", "Ajutor");
define("L_BAD_CMD", "Comandã invalidã!");
define("L_ADMIN", "%s este deja administrator!");
define("L_IS_MODERATOR", "%s este deja moderator!");
define("L_NO_MODERATOR", "Numai un moderator poate folosi aceastã comandã.");
define("L_MODERATOR", "%s a fost promovat moderator al acestei camere.");
define("L_NONEXIST_USER", "%s nu este în camera curentã.");
define("L_NONREG_USER", "%s nu este înregistrat.");
define("L_NONREG_USER_IP", "IP-ul sãu este: %s.");
define("L_NO_KICKED", "%s este moderator sau administrator ºi nu poate fi dat afarã.");
define("L_KICKED", "%s a fost dat afarã!");
define("L_KICKED_REASON", "%s a fost dat afarã! (Motivul: %s)");
define("L_NO_BANISHED", "%s este moderator sau administrator ºi nu poate fi blocat.");
define("L_BANISHED", "%s a fost blocat cu succes.");
define("L_BANISHED_REASON", "%s a fost blocat cu succes. (Motivul: %s)");
define("L_SVR_TIME", "Timpul pe server: ");
define("L_NO_SAVE", "Nimic de salvat!");
define("L_NO_ADMIN", "Numai un administrator poate folosi aceastã comandã.");
define("L_NO_REG_USER", "Trebuie sã fii înregistrat pentru a folosi aceastã comandã.");
define("L_ANNOUNCE", "ANUNÞ");
define("L_INVITE", "%s te invitã sã intri cu el/ea în camera <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a>.");
define("L_INVITE_REG", " Trebuie sã fii înregistrat pentru a intra în aceastã camerã.");
define("L_INVITE_DONE", "Invitaþia a fost trimisã lui %s.");
define("L_OK", "Trimite");

// help popup
define("L_HELP_TIT_1", "Emoþii");
define("L_HELP_TIT_2", "Formatarea textului pentru mesaje");
define("L_HELP_FMT_1", "Textul poate fi îngroºat (bold), înclinat (italic) sau subliniat (underline), prin simpla sa încadrare între cuvintele cheie &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; sau &lt;U&gt; &lt;/U&gt;<br>Exemplu, &lt;B&gt;acest text&lt;/B&gt; va produce <B>acest text</B>.");
define("L_HELP_FMT_2", "Pentru a crea un hyperlink (pentru e-mail sau pagina www) în mesajul tãu, tasteazã pur ºi simplu adresa corespunzãtoare. Hyperlink-ul va fi creat automat.");
define("L_HELP_TIT_3", "Comenzi");
define("L_HELP_NOTE", "Toate comenzile se vor folosi obligatoriu în limba englezã!");
define("L_HELP_USR", "utilizator");
define("L_HELP_MSG", "mesaj");
define("L_HELP_ROOM", "camerã");
define("L_HELP_BUZZ", "~numesunet");
define("L_HELP_REASON", "motivul");
define("L_HELP_CMD_0", "{} obligatoriu, [] opþional.");
define("L_HELP_CMD_1a", "Stabileºte câte mesaje sã fie arãtate (minim 5).");
define("L_HELP_CMD_1b", "Reîncarcã fereastra cu mesaje ºi afiºeazã ultimele n mesaje (implicit sunt minim 5).");
define("L_HELP_CMD_2a", "Modificã timpul de reactualizare (refresh) a mesajelor (in secunde).<br>Dacã n nu este specificat sau este mai mic decât 3, comanda va seta între reactualizare la 10 secunde sau deloc.");
define("L_HELP_CMD_2b", "Modificã timpul de reactualizare (refresh) a mesajelor ºi listei de utilizatori (in secunde).<br>Dacã n nu este specificat sau este mai mic decât 3, comanda va seta între reactualizare la 10 secunde sau deloc.");
define("L_HELP_CMD_3", "Schimbã ordinea mesajelor (nu în toate browser-ele).");
define("L_HELP_CMD_4", "Intrã în altã camera; dacã aceastã camerã nu exista ºi ai dreptul (din setãri) o poþi crea.<br>Utilizare: n este 0 pentru camere private ºi 1 pentru camere publice. Dacã n nu este specificat, valoarea sa implicitã este 1.");
define("L_HELP_CMD_5", "Pãrãseºte chat-ul dupã ce ai scris un mesaj opþional.");
define("L_HELP_CMD_6", "Ignorã mesaje de la utilizatorul a cãrui poreclã este specificatã.<br>Fãrã nici o opþiune, va apãrea o fereastrã care va afiºa toþi utilizatorii ignoraþi de tine.");
define("L_HELP_CMD_7", "Recheamã textul introdus anterior (comandã sau mesaj).");
define("L_HELP_CMD_8", "Aratã/Ascunde timpul din faþa mesajelor.");
define("L_HELP_CMD_9", "Expulzeazã utilizatori din chat. Aceastã comandã poate fi datã numai de un moderator al camerei sau de un administrator.<br>Opþional, [".L_HELP_REASON."] va arãta ºi motivul eliminãrii (orice frazã).");
define("L_HELP_CMD_10", "Trimite un mesaj privat cãtre utilizatorul specificat (alþi utilizatori nu vor vedea mesajul).");
define("L_HELP_CMD_11", "Aratã informaþii despre utilizatorul specificat.");
define("L_HELP_CMD_12", "Afiºeazã o fereastrã pentru editarea profilului utilizatorului.");
define("L_HELP_CMD_13", "Te anunþã dacã un utilizator a intrat/ieºit în/din camerã.");
define("L_HELP_CMD_14", "Permite administratorului sau moderatorului camerei curente sã promoveze ca moderator pentru aceeaºi camerã un alt utilizator înregistrat.");
define("L_HELP_CMD_15", "Curaþã ecranul de mesaje ºi le aratã doar pe ultimele 5.");
define("L_HELP_CMD_16", "Salveazã ultimele n mesaje (mai puþin anunþurile) într-un fiºier HTML. Dacã n nu este specificat, vor fi salvate toate mesajele existente.");
define("L_HELP_CMD_17", "Permite administratorului sã trimitã un anunþ tuturor utilizatorilor, indiferent de camera în care se aflã.");
define("L_HELP_CMD_18", "Invitã un utilizator din altã camera sã intre în camera ta.");
define("L_HELP_CMD_19", "Permite moderatorului(ilor) unei camere sau administratorului sã \"blocheze\" un utilizator, pe o duratã stabilitã de admin prin setãrile serverului.<br>Administratorul poate bloca un utilizator aflat în oricare dintre camere ºi poate folosi setarea'<B>&nbsp;*&nbsp;</B>' pentru a bloca \"definitiv\" utilizatorul respectiv pe acest server de chat.<br>Opþional, [".L_HELP_REASON."] va arãta ºi motivul blocãrii (orice frazã)");
define("L_HELP_CMD_20", "Descrie cu ce te ocupi, ca un anunþ în camerã (ex. Porecla MEA mãnâncã ºi urmãreºte ºtirile ProTV).");
define("L_HELP_CMD_21", "Anunþã camera ºi utilizatorii care vor sã îþi trimitã mesaje<br>cã nu mai eºti lângã calculator. Ca sã te întorci la chat, începe doar sã scrii. Opþional, poþi lãsa ºi un mesaj cu motivul plecãrii de la calculator");
define("L_HELP_CMD_22", "Trimite un semnal sonor tip Buzz pentru captarea atenþiei celorlalþi. Nu abuza de aceastã comandã!<br />- Folosire:<br />- anterior: \"/buzz\" or \"/buzz mesaj de arãtat\" - aceasta trimite sunetul implicit definit în Panoul Admin;<br />- extindere: \"/buzz ~numesunet\" sau \"/buzz ~numesunet mesaj de arãtat\" - aceasta trimite sunetul fiºierului numesunet.wav aflat în directorul plus/sounds; semnul \"~\" trebuie folosit înaintea celui de-al doilea cuvânt, care reprezintã numele fiºierului sunetului, fãrã extensia .wav (numai extensiile .wav sunt permise).<br>Implicit, aceastã comandã poate fi folositã numai de moderatori/administratori.");
define("L_HELP_CMD_23", "Trimite un mesaj privat tip \"whisper\" (ºoaptã). Mesajul va ajunge la destinatar, în orice camerã s-ar afla acesta. În cazul în care utilizatorul cãutat nu este on-line, vei fi înºtiinþat.");
define("L_HELP_CMD_24", "Comanda schimbã topicul (tema de discuþii) camerei în care este folositã. Încercaþi sã nu suprascrieþi temele altor utilizatori ºi sã folosiþi teme care meritã afiºate.<br>Folosind comanda \"/topic top reset\" tema curentã afiºatã va fi ºtearsã ºi resetatã la tema implicitã a camerei.<br>În mod implicit, aceastã comandã poate fi folositã doar de moderatori.<br>Atenþie: tema de discuþii trebuie sã conþinã cel puþin 2 cuvinte.<br>Opþional, \"/topic * {}\" face aceleaºi lucruri dar pentru toate camerele simultan (temã globalã ºi resetare temã globalã).");
define("L_HELP_CMD_25", "Un joc cu zaruri pentru plictisealã sau trageri la sorþi.<br>Utilizare: /dice sau /dice [n]; n este opþional ºi reprezintã numãrul de zaruri din manã. Poate avea orice valoare între 1 ºi numãrul maxim de zaruri setat (6). Comanda fãrã n va arunca numãrul maxim de zaruri (6).");
define("L_HELP_CMD_26", "Versiunea mai dezvoltatã a comenzii /dice.<br>Utilizare: /[n1]d[n2] sau /[n1]d;<br>n1 poate avea orice valoare <b>între 1 ºi 9</b> (reprezintã numãrul de aruncãri);<br>n2 este o valoare între 1 ºi numãrul maxim de zaruri setat (6) (reprezintã numãrul de zaruri aruncate). Comanda fãrã n2 va arunca la fiecare mânã cu numãrul maxim de zaruri (6).");
define("L_HELP_CMD_27", "Evidenþiazã mesajele trimise de un anumit utilizator, pentru a-l distinge mai uºor în cadrul conversaþiilor.<br>Utilizare: /high {utilizator} sau apasã pe pãtrãþelul alb/galben cu litera H din dreapta numelui, în lista de camere/utilizatori.");
define("L_HELP_CMD_28", "Permite postarea <b>unei imagini</b> în loc de mesaj.<br>Utilizare: Introduceþi link-ul complet! (ex. <b>/img http://ciprianmp.com/images/CIPRIAN.jpg</b>). Extensii recunoscute ºi acceptate: .jpg .bmp .gif. Atenþie la literele mari ºi mici - conteazã.");
define("L_HELP_CMD_29", "Cea de a doua comandã permite administratorului sau moderatorului(ilor) din camera curentã sã destituie un alt moderator din camerã la statusul normal de utilizator înregistrat.<br>Opþiunea * va destitui respectivul utilizator din toate camerele.");
define("L_HELP_CMD_30", "Cea de a doua comandã face acelaºi lucru ca ºi /me, numai cã va arata ºi genul corespunzãtor<br>Exemplu * Mr Ciprian urmãreºte ºtirile ProTV sau Mrs Dana este super fericitã.");
define("L_HELP_CMD_31", "Schimbã ordinea sortãrii utilizatorilor în liste: dupã momentul logãrii sau alfabetic.");
define("L_HELP_CMD_32", "Aceasta este a treia versiune de joc de zaruri (roleplaying).<br>Utilizare: /d{n1}[tn2] sau /d{n1};<br>n1 poate avea orice valoare <b>între 1 ºi 100</b> (reprezintã numãrul de puncte ale fiecãrui zar).<br>n2 poate avea orice valoare <b>între 1 ºi %s</b> (reprezintã numãrul de zaruri aruncate).");
define("L_HELP_CMD_33", "Schimbã dimensiunea textului mesajelor pe chat (valori permise pentru n: <b>între 7 ºi 15</b>); comanda /size reseteazã dimensiunea fontului la valoarea implicitã (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Eticheta Chat-ului");
define("L_HELP_ETIQ_2", "Site-ul nostru doreºte sã pãstreze o ambianþã plãcutã ºi prietenoasã, aºa cã vã rugãm sã aderaþi la urmãtoarele reguli. Pentru nerespectarea acestor reguli, unul dintre moderatori ar putea sã vã elimine din chat.<br /><br />Mulþumim,");
define("L_HELP_ETIQ_3", "Regulile Etichetei acestui Chat");
define("L_HELP_ETIQ_4", "Nu faceþi &quot;spam&quot; pe chat postând non-sensuri sau litere alandala;</li><li>Nu folosiþi caractere aLtErnAnte;</li><li>Folosiþi MAJUSCULELE la minimum, întrucât se considerã cã þipaþi;</li><li>Þineþi cont cã utilizatorii noºtri pot fi de oriunde în lume, ºi, mai mult ca sigur, veþi întâlni persoane cu concepþii/credinþe/idei diferite. Vã rugãm sã fiþi politicos ºi respectuos cu aceste persoane;</li><li>Nu adresaþi insulte altor utilizatori. De fapt, este interzis sã folosiþi injurii ºi insulte;</li><li>Nu vã adresaþi celorlalþi utilizatori pe numele lor reale, chiar dacã îi cunoaºteþi personal. Mulþi utilizatori nu apreciazã folosirea identitãþii reale pe chat-uri. Folosiþi în schimb poreclele acestora (nicknames).");

// messages frame
define("L_NO_MSG", "Nu este nici un mesaj ...");
define("L_TODAY_DWN", "De aici încep mesajele trimise astãzi");
define("L_TODAY_UP", "De aici încep mesajele trimise ieri");

// message colors
$TextColors = array("Negru" => "#000000",
										"Roºu" => "#FF0000",
										"Verde" => "#009900",
										"Albastru" => "#0000FF",
										"Mov" => "#9900FF",
										"Roºu închis" => "#990000",
										"Verde închis" => "#006600",
										"Albastru închis" => "#000099",
										"Maro" => "#996633",
										"Albastru deschis" => "#006699",
										"Portocaliu" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Utilizatori Ignoraþi");
define("L_IGNOR_NON", "Nici un utilizator ignorat");

// whois popup
define("L_WHOIS_ADMIN", "Administrator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_USER", "Utilizator");
define("L_WHOIS_GUEST", "Vizitator");
define("L_WHOIS_REG", "Înregistrat");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s a intrat în camerã" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s a intrat în camerã");
define("L_ENTER_ROM_NOSOUND", "%s a intrat în camerã");
define("L_EXIT_ROM", "%s a ieºit din camerã");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s a fost eliminat automat din camerã pentru inactivitate");
define("L_CLOSED_ROM", "%s ºi-a închis browser-ul");

// Text for /away command notification string:
define("L_AWAY", "%s nu e lângã calculator (away)");
define("L_BACK", "%s s-a întors!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Meniu Rapid *****");	//&nbsp; înseamnã un spaþiu. numãrul acestora ajuta la centrarea titlului listei de comenzi în cãsuþã.

// Topic Banner mod
define("L_TOPIC", "a setat TOPIC-ul:");
define("L_TOPIC_RESET", "a resetat TOPIC-ul");
define("L_HELP_TOP", "minim 2 cuvinte ca TOPIC (temã de discuþii)");

// Img cmd mod
define("L_PIC", "Imagine trimisã de");
define("L_PIC_RESIZED", "Redimensionatã la");
define("L_HELP_IMG", "calea/link-ul cãtre imaginea de postat");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s nu este moderator!");
define("L_IS_NO_MOD_ALL", "%s nu mai este moderator în nici una dintre camerele acestui chat.");
define("L_ERR_IS_ADMIN", "%s este administrator!\\nNu ai dreptul sa-i modifici permisiunile.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra Comenzi instalate:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra Opþiuni instalate:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">RoBoþelul nostru este: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "Limbi folosite");
define("L_PRO_2", "Link Favorit 1");
define("L_PRO_3", "Link Favorit 2");
define("L_PRO_4", "Descriere");
define("L_PRO_5", "URL-ul pozei");
define("L_PRO_6", "Culoare nume/text");

// Avatar mod
define("L_ERR_AV", "Adresa invalidã sau host-ul nu este online.");
define("L_TITLE_AV", "Avatarul ales: ");
define("L_CHG_AV", "Apasã 'Schimbã' în formularul Profil<br>pentru a-þi salva Avatarul.");
define("L_SEL_NEW_AV", "Selecteazã un nou Avatar");
define("L_EX_AV", "(exemplu: http://mysite/images/mypic.gif):");
define("L_URL_AV", "Adresa: ");
define("L_EXPL_AV", "(Introdu adresa ºi apasã Enter pentru a vedea poza)");
define("L_CANCEL", "Renunþã");
define("L_CLICK", "Apasã aici");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "Sfat: Bot-ul este activ public în aceastã camera. Pentru a-i vorbi, scrie <b>hello ".C_BOT_NAME.'</b>. Pentru a-l opri, scrie <b>bye '.C_BOT_NAME.'</b>. (privat: /to <b>'.C_BOT_NAME.'</b> Mesaj)'); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "Sfat: Bot-ul este activ public în camera %s. Poþi discuta numai privat cu el apãsând pe numele sãu <b>".C_BOT_NAME."</b>. (comanda: /wisp <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "Sfat: Bot-ul nu este activ public.  Poþi discuta numai privat cu el apãsând pe numele sãu. (comenzile: /to <b>".C_BOT_NAME."</b> Mesaj sau /wisp <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "RoBoþelul nu este pornit în aceastã camerã!");
define("BOT_START_ERROR", "RoBoþelul este deja pornit în aceastã camerã!");
define("BOT_DISABLED_ERROR", "RoBoþelul a fost dezactivat în Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "a aruncat zarurile ºi a obþinut:");
define("DICE_WRONG", "Trebuie sã alegi un numãr de zaruri cuprins între 1 ºi ".MAX_ROLLS.'.\\nComanda /dice va arunca cu toate '.MAX_ROLLS.' zarurile.');
define("DICE2_WRONG", "A doua valoare trebuie sã fie cuprinsã între 1 ºi ".MAX_ROLLS.'.\\nNu o specifica pentru a arunca cu toate '.MAX_ROLLS.' zarurile\\n(ex. /'.MAX_DICES.'d sau /'.MAX_DICES.'d'.MAX_ROLLS.').');
define("DICE2_WRONG1", "Prima valoare trebuie sã fie cuprinsã între 1 ºi ".MAX_DICES.'.\\n(ex. /'.MAX_DICES.'d sau /'.MAX_DICES.'d'.MAX_ROLLS.').');
define("DICE3_WRONG", "A doua valoare trebuie sã fie cuprinsã între 1 ºi ".MAX_ROLLS.'.\\nNu o specifica pentru a arunca cu toate '.MAX_ROLLS.' zarurile\\n(ex. /d50 or /d100t'.MAX_ROLLS.').');

// Log mod by Ciprian
define("L_ARCHIVE", "Deschide Arhiva");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Foloseºte popup-uri la mesaje private");
define("L_PRIV_POST_MSG", "Trimite un mesaj privat!");
define("L_PRIV_MSG", "Nou mesaj privat primit!");
define("L_PRIV_MSGS", "mesaje private noi primite!");
define("L_PRIV_MSGSa", "Acestea sunt primele 10 mesaje!<br>Apasã link-ul de jos pentru a vedea restul.");
define("L_PRIV_MSG1", "De la:");
define("L_PRIV_MSG2", "Camera:");
define("L_PRIV_MSG3", "Pentru:");
define("L_PRIV_MSG4", "Mesaj:");
define("L_PRIV_MSG5", "Trimis:");
define("L_PRIV_REPLY", "Rãspunde");
define("L_PRIV_READ", "Apasã butonul Close pentru a marca mesajele ca citite!");
define("L_PRIV_POPUP", "Poþi dezactiva/reactiva aceste popup-uri<br>editându-þi profilul (numai dacã eºti înregistrat)");
define("L_NOT_ONLINE", "%s nu este online acum.");
define("L_PRIV_NOT_ONLINE", "%s nu este online acum,\\ndar va primi mesajul tãu la primul login.");
define("L_PRIV_NOT_INROOM", "%s nu este în aceastã camerã.\\nDacã vrei totuºi sã îl contactezi,\\nfoloseºte comanda: /wisp %s mesaj.");
define("L_PRIV_AWAY", "%s nu este la calculator,\\ndar va primi mesajul tãu la întoarcere.");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Activat" : "Dezactivat"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Activat" : "Dezactivat"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Setãrile curente ale serverului</u>:<br>a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br>b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Culori implicite</u>: Administrator = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderatori = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Ceilalþi utilizatori = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Culoarea implicitã</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Spectrul de Culori");
define("L_COL_HELP_SUB1", "Folosire:");
define("L_COL_HELP_P1", "Poþi sã-þi defineºti culoarea ta favoritã editându-þi profilul (aceeaºi cu culoarea numelui). Vei putea totuºi sã foloseºti ºi celelalte culori. Pentru a reveni la culoarea favoritã dupã ce ai folosit una oarecare din listã, va trebui sã selectezi mãcar o datã culoarea implicitã (Null) - este prima din lista de culori.");
define("L_COL_HELP_SUB2", "Sfaturi:");
define("L_COL_HELP_P2", "<u>Spectrul de Culori</u><br>în funcþie de capabilitãþile browser-ului ºi sistemului de operare folosit, este posibil ca anumite culori din cele 140 disponibile sã nu fie afiºate corect (ex. pe calculatoarele foarte vechi). Numai 16 nume de culori sunt recunoscute de browserele mai vechi, care nu suporta decât standardul W3C HTML 4.0. Aceste culori de bazã (numite ºi web-safe) sunt:");
define("L_COL_HELP_P2a", "Dacã un utilizator se plânge cã nu poate vedea corect culoarea pe care ai selectat-o, înseamnã cã probabil foloseºte un browser foarte vechi, care nu recunoaºte numele culorii tale.");
define("L_COL_HELP_SUB3", "Culori implicite în acest chat:");
define("L_COL_HELP_P3", "<u>Culori în funcþie de permisiunile utilizatorului</u>:<br>1. Administratorul poate folosi tot spectrul de culori.<br>Culoarea administratorului este <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br>2. Moderatorii pot folosi orice culoare, în afarã de <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> ºi <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br>Culoarea moderatorilor este <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br>3. Toþi ceilalþi utilizatori vor putea folosi orice altã culoare, în afarã de <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> ºi <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Culoarea implicitã este <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Informaþii tehnice</u>: Aceste culori au fost definite de cãtre administrator în admin panel.<br>Dacã ceva nu e în regulã sau nu vã plac culorile implicite, <b>administratorul</b> este primul pe care ar trebui sã-l contactaþi ºi nu pe ceilalþi utilizatori de pe chat. :-)");
define("L_COL_HELP_USER_STATUS", "Statutul tãu");
define("L_COL_TUT", "Folosirea culorilor în textul mesajelor");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Numai administratorul poate folosi culoarea ".COLOR_CA."!\\n\\nCuloarea a fost resetatã la ".COLOR_CM."!\\n\\nAlege orice altã culoare!");
define("COL_ERROR_BOX_USRA", "Numai administratorul poate folosi culoarea ".COLOR_CA."!\\n\\nNu încerca sã foloseºti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1."\\nAcestea sunt rezervate altor useri!\\n\\nCuloarea a fost resetatã la ".COLOR_CD."!\\n\\nAlege orice altã culoare!");
define("COL_ERROR_BOX_USRM", "Trebuie sã fii moderator pentru a folosi culoarea ".COLOR_CM."!\\n\\nNu încerca sã foloseºti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1."\\nAcestea sunt rezervate altor useri!\\n\\nCuloarea a fost resetatã la ".COLOR_CD."!\\n\\nAlege orice altã culoare!");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","utilizatori sunt ".LOGIN_LINK."pe chat</A></td></tr>");
define("USERS_LOGIN","1 utilizator este ".LOGIN_LINK."pe chat</A></td></tr>");
define("NO_USER","Nimeni nu este ".LOGIN_LINK." pe chat</A></td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Bun venit pe chat-ul nostru! Vã rugãm sã nu folosiþi expresii nepoliticoase, <I>pentru o ambianþã cât mai plãcutã</I>." . L_ENTER_SND);
else define("WELCOME_MSG", "Bun venit pe chat-ul nostru! Vã rugãm sã nu folosiþi expresii nepoliticoase, <I>pentru o ambianþã cât mai plãcutã</I>.");
define("WELCOME_MSG_NOSOUND", "Bun venit pe chat-ul nostru! Vã rugãm sã nu folosiþi expresii nepoliticoase, <I>pentru o ambianþã cât mai plãcutã</I>.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Mesageria privatã este\\ndezactivatã în acest chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "Dimensiunea fontului poate fi doar\\nnulã (pentru resetare) sau cuprinsã între 7 ºi 15");

// Send alert to users în chat when important settings are changed în admin panel
define("L_RELOAD_CHAT", "Setãrile serverului de chat tocmai au fost modificate. Pentru o bunã funcþionare, trebuie sã reîncãrcaþi chat-ul (apãsaþi tasta F5 sau Ieºire ºi reintraþi pe chat).");

// Week days for status worldtime by Ciprian
define("L_MON", "Lu"); //Luni
define("L_TUE", "Ma"); //Marþi
define("L_WED", "Mi"); //Miercuri
define("L_THU", "Jo"); //Joi
define("L_FRI", "Vi"); //Vineri
define("L_SAT", "Sa"); //Sâmbãtã
define("L_SUN", "Du"); //Duminicã

// Extra options by Ciprian
define("L_EXTRA_OPT", "Alte Opþiuni");
?>