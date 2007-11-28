<?php
// File : romanian/localized.chat.php - plus version (20.10.2007 - rev.29)
// Original translation started by Radu Swider <swidera@satline.ro>, first updated by Ciprian Popovici-Oana <floppy@kermit.cs.pub.ro>
// Corrected, finalized, diacritics addition and updated to Plus version by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Mesajele se şterg după %s %s");
define("L_WEL_2", "iar utilizatorii inactivi după %s %s");

define("L_CUR_1", "Acum");
define("L_CUR_1a", "sunt");
define("L_CUR_1b", "este");
define("L_CUR_2", "pe chat");
define("L_CUR_3", "Utilizatori aflaţi în camere de chat");
define("L_CUR_4", "utilizatori în camere private");
define("L_CUR_5", "Utilizatori care monitorizează<br />această pagină (spectatori):");

define("L_SET_1", "Introdu-ţi datele...");
define("L_SET_2", "Porecla");
define("L_SET_3", "numărul de mesaje de afişat");
define("L_SET_4", "timpul de actualizare");
define("L_SET_5", "Selectează o cameră de chat...");
define("L_SET_6", "Camere disponibile");
define("L_SET_7", "Alegeţi ...");
define("L_SET_8", "Camere publice create de utilizatori");
define("L_SET_9", "Creează-ţi camera ta");
define("L_SET_10", "publică");
define("L_SET_11", "privată");
define("L_SET_12", "");
define("L_SET_13", "Apoi intră pe");
define("L_SET_14", "chat");
define("L_SET_15", "Camere private disponibile");
define("L_SET_16", "Camere private create de utilizatori");
define("L_SET_17", "Alege-ţi un avatar");
define("L_SET_18", "Adaugă în Favorite: apasă \"CTRL +D\".");

define("L_SRC", "este disponibil gratuit de la");

define("L_SECS", "secunde");
define("L_MIN", "minut");
define("L_MINS", "minute");
define("L_HOUR", "oră");
define("L_HOURS", "ore");

// registration stuff:
define("L_REG_1", "Parola");
define("L_REG_2", "Configurare date cont / Administrare setări");
define("L_REG_3", "Înregistrare");
define("L_REG_4", "Editare profil");
define("L_REG_5", "Ştergere utilizator");
define("L_REG_6", "Înregistrare utilizator");
define("L_REG_7", "numai dacă eşti deja înregistrat");
define("L_REG_8", "Email-ul tău");
define("L_REG_9", "Ai fost înregistrat cu succes.");
define("L_REG_10", "Înapoi");
define("L_REG_11", "Modificare");
define("L_REG_12", "Modifică datele despre utilizator");
define("L_REG_13", "Şterge utilizator");
define("L_REG_14", "Login");
define("L_REG_15", "Intră");
define("L_REG_16", "Schimbă");
define("L_REG_17", "Datele tale au fost modificate cu succes.");
define("L_REG_18", "Ai fost dat afară din cameră de către un moderator al acestui chat.");
define("L_REG_18a", "Ai fost dat afară din cameră de către un moderator al acestui chat.<br />Motivul: %s");
define("L_REG_19", "Chiar vrei să fii şters?");
define("L_REG_20", "Da");
define("L_REG_21", "Ai fost şters cu succes.");
define("L_REG_22", "Nu");
define("L_REG_25", "Închide");
define("L_REG_30", "Prenumele");
define("L_REG_31", "Numele");
define("L_REG_32", "WEB");
define("L_REG_33", "Arată e-mailul la comanda /whois");
define("L_REG_34", "Editare profil");
define("L_REG_35", "Administrare");
define("L_REG_36", "Localitatea, ţara");
define("L_REG_37", "Câmpurile care conţin <span class=\"error\">*</span> <b>trebuiesc</b> completate.");
define("L_REG_39", "Camera în care te aflai a fost curăţată de administrator.");
define("L_REG_45", "Sex");
define("L_REG_46", "Masculin");
define("L_REG_47", "Feminin");
define("L_REG_48", "Nespecificat");
define("L_REG_49", "Înregistrare obligatorie!");
define("L_REG_50", "Înregistrare suspendată!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Datele tale pentru a te loga la chat");
define("L_EMAIL_VAL_2", "Bun venit pe serverul nostru de chat!");
define("L_EMAIL_VAL_Err", "Eroare internă, te rugăm să contactezi administratorul: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Parola a fost trimisă la adresa de e-mail aleasă de tine.");

// admin stuff
define("L_ADM_1", "%s nu mai este moderator al acestei camere.");
define("L_ADM_2", "Nu mai eşti înregistrat.");

//error messages
define("L_ERR_USR_1", "Acest nume este folosit deja. Alege-ţi altul.");
define("L_ERR_USR_2", "Trebuie să-ţi alegi un nume.");
define("L_ERR_USR_3", "Acest nume este deja înregistrat.<br />Introdu parola sau alege o altă poreclă.");
define("L_ERR_USR_4", "Ai scris o parolă incorectă.");
define("L_ERR_USR_5", "Trebuie să scrii numele.");
define("L_ERR_USR_6", "Trebuie să scrii parola.");
define("L_ERR_USR_7", "Trebuie să scrii adresa ta de e-mail.");
define("L_ERR_USR_8", "Trebuie să scrii o adresa de e-mail corectă.");
define("L_ERR_USR_9", "Acest nume este deja folosit.");
define("L_ERR_USR_10", "Nume sau parolă incorecte.");
define("L_ERR_USR_11", "Trebuie să fii administrator.");
define("L_ERR_USR_12", "Eşti administrator, nu poţi fi şters.");
define("L_ERR_USR_13", "Pentru a crea o cameră trebuie să fii înregistrat.");
define("L_ERR_USR_14", "Trebuie să fii înregistrat înainte de a intra pe chat.");
define("L_ERR_USR_15", "Trebuie să scrii numele complet.");
define("L_ERR_USR_16", "Numai aceste extra-caractere sunt permise:\\n".$REG_CHARS_ALLOWED."\\nSpaţii, virgule sau backslash-uri (\\) nu sunt permise.\\nVerifică sintaxa!");
define("L_ERR_USR_16a", "Numai aceste extra-caractere sunt permise:<br />".$REG_CHARS_ALLOWED."<br />Spaţii, virgule sau backslash-uri (\\) nu sunt permise. Verifică sintaxa!");
define("L_ERR_USR_17", "Camera aleasă nu există sau nu ai dreptul să o creezi.");
define("L_ERR_USR_18", "Cuvânt interzis folosit în cadrul poreclei.");
define("L_ERR_USR_19", "Nu poţi fi în mai multe camere simultan.");
define("L_ERR_USR_20", "Ai fost blocat din această cameră sau de pe chat.");
define("L_ERR_USR_20a", "Ai fost blocat din această cameră sau de pe chat.<br />Motivul: %s");
define("L_ERR_USR_21", "Nu ai fost activ în ultimele ".C_USR_DEL." minute,<br />de aceea ai fost eliminat din cameră.");
define("L_ERR_USR_22", "Această comandă nu funcţionează\\nîn browser-ul tău (pe nucleu de IE).");
define("L_ERR_USR_23", "Trebuie să fii înregistrat înainte de a intra în camere private.");
define("L_ERR_USR_24", "Trebuie să fii înregistrat înainte de a crea camere proprii.");
define("L_ERR_USR_25", "Numai administratorul poate folosi culoarea ".$COLORNAME."!<br />Nu încerca să foloseşti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1.".<br />Acestea sunt rezervate utilizatorilor speciali!");
define("L_ERR_USR_26", "Numai administratorii sau moderatorii pot folosi culoarea ".$COLORNAME."!<br />Nu încerca să foloseşti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />Acestea sunt rezervate utilizatorilor speciali!");
define("L_ERR_USR_27", "Nu-ţi poţi vorbi ţie însuţi în şoaptă.\\nFă asta în minte...\\nAlege un alt destinatar.");
define("L_ERR_ROM_1", "Numele camerei nu poate conţine virgule sau backslash (\\).");
define("L_ERR_ROM_2", "Numele camerei pe care ai vrut s-o creezi conţine un cuvânt interzis. Reformulează.");
define("L_ERR_ROM_3", "Exista deja o cameră publică cu acest nume.");
define("L_ERR_ROM_4", "Numele camerei este invalid.");

// users frame or popup
define("L_EXIT", "Ieşire");
define("L_DETACH", "Detaşează lista de utilizatori");
define("L_EXPCOL_ALL", "Extinde/Comprimă tot");
define("L_CONN_STATE", "Refă starea conexiunii");
define("L_CHAT", "Chat");
define("L_USER", "utilizator");
define("L_USERS", "utilizatori");
define("L_LURKER", "spectator");
define("L_LURKERS", "spectatori");
define("L_NO_USER", "Nici un utilizator");
define("L_ROOM", "cameră");
define("L_ROOMS", "camere");
define("L_EXPCOL", "Extinde/Comprimă camera");
define("L_BEEP", "Cu/fără sunet la intrarea utilizatorilor în cameră");
define("L_PROFILE", "Arată profilul");
define("L_NO_PROFILE", "Fără profil");

// input frame
define("L_HLP", "Ajutor");
define("L_MODERATOR", "%s a fost promovat moderator al acestei camere.");
define("L_KICKED", "%s a fost dat afară!");
define("L_KICKED_REASON", "%s a fost dat afară! (Motivul: %s)");
define("L_BANISHED", "%s a fost blocat cu succes.");
define("L_BANISHED_REASON", "%s a fost blocat cu succes. (Motivul: %s)");
define("L_ANNOUNCE", "ANUNŢ");
define("L_INVITE", "%s te invită să intri cu el/ea în camera <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a>.");
define("L_INVITE_REG", "Trebuie să fii înregistrat pentru a intra în această cameră.");
define("L_INVITE_DONE", "Invitaţia a fost trimisă lui %s.");
define("L_OK", "Trimite");
define("L_BUZZ", "Galerie Buzz-uri");
define("L_BAD_CMD", "Comandă invalidă!");
define("L_ADMIN", "%s este deja administrator!");
define("L_IS_MODERATOR", "%s este deja moderator!");
define("L_NO_MODERATOR", "Numai un moderator poate folosi această comandă.");
define("L_NONEXIST_USER", "%s nu este în camera curentă.");
define("L_NONREG_USER", "%s nu este înregistrat.");
define("L_NONREG_USER_IP", "IP-ul său este: %s.");
define("L_NO_KICKED", "%s este moderator sau administrator şi nu poate fi dat afară.");
define("L_NO_BANISHED", "%s este moderator sau administrator şi nu poate fi blocat.");
define("L_SVR_TIME", "Timpul pe server: ");
define("L_NO_SAVE", "Nimic de salvat!");
define("L_NO_ADMIN", "Numai un administrator poate folosi această comandă.");
define("L_NO_REG_USER", "Trebuie să fii înregistrat pentru a folosi această comandă.");

// help popup
define("L_HELP_TIT_1", "Emoţii");
define("L_HELP_TIT_2", "Formatarea textului pentru mesaje");
define("L_HELP_FMT_1", "Textul poate fi îngroşat (bold), înclinat (italic) sau subliniat (underline), prin simpla sa încadrare între cuvintele cheie &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; sau &lt;U&gt; &lt;/U&gt;<br />Exemplu, &lt;B&gt;acest text&lt;/B&gt; va produce <B>acest text</B>.");
define("L_HELP_FMT_2", "Pentru a crea un hyperlink (pentru e-mail sau pagina www) în mesajul tău, tastează pur şi simplu adresa corespunzătoare. Hyperlink-ul va fi creat automat.");
define("L_HELP_TIT_3", "Comenzi");
define("L_HELP_NOTE", "Toate comenzile se vor folosi obligatoriu în limba engleză!");
define("L_HELP_USR", "utilizator");
define("L_HELP_MSG", "mesaj");
define("L_HELP_MSGS", "mesaje");
define("L_HELP_ROOM", "cameră");
define("L_HELP_BUZZ", "~numesunet");
define("L_HELP_REASON", "motivul");
define("L_HELP_CMD_0", "{} obligatoriu, [] opţional.");
define("L_HELP_CMD_1a", "Stabileşte câte mesaje să fie arătate (minim 5).");
define("L_HELP_CMD_1b", "Reîncarcă fereastra cu mesaje şi afişează ultimele n mesaje (implicit sunt minim 5).");
define("L_HELP_CMD_2a", "Modifică timpul de reactualizare (refresh) a mesajelor (in secunde).<br />Dacă n nu este specificat sau este mai mic decât 3, comanda va seta între reactualizare la 10 secunde sau deloc.");
define("L_HELP_CMD_2b", "Modifică timpul de reactualizare (refresh) a mesajelor şi listei de utilizatori (in secunde).<br />Dacă n nu este specificat sau este mai mic decât 3, comanda va seta între reactualizare la 10 secunde sau deloc.");
define("L_HELP_CMD_3", "Schimbă ordinea mesajelor (nu în toate browser-ele).");
define("L_HELP_CMD_4", "Intră în altă camera; dacă această cameră nu exista şi ai dreptul (din setări) o poţi crea.<br />Utilizare: n este 0 pentru camere private şi 1 pentru camere publice. Dacă n nu este specificat, valoarea sa implicită este 1.");
define("L_HELP_CMD_5", "Părăseşte chat-ul după ce ai scris un mesaj opţional.");
define("L_HELP_CMD_6", "Ignoră mesaje de la utilizatorul a cărui poreclă este specificată.<br />Fără nici o opţiune, va apărea o fereastră care va afişa toţi utilizatorii ignoraţi de tine.");
define("L_HELP_CMD_7", "Recheamă textul introdus anterior (comandă sau mesaj).");
define("L_HELP_CMD_8", "Arată/Ascunde timpul din faţa mesajelor.");
define("L_HELP_CMD_9", "Expulzează utilizatori din chat. Această comandă poate fi dată numai de un moderator al camerei sau de un administrator.<br />Opţional, [".L_HELP_REASON."] va arăta şi motivul eliminării (orice frază).");
define("L_HELP_CMD_10", "Trimite un mesaj privat către utilizatorul specificat (alţi utilizatori nu vor vedea mesajul).");
define("L_HELP_CMD_11", "Arată informaţii despre utilizatorul specificat.");
define("L_HELP_CMD_12", "Afişează o fereastră pentru editarea profilului utilizatorului.");
define("L_HELP_CMD_13", "Te anunţă dacă un utilizator a intrat/ieşit în/din cameră.");
define("L_HELP_CMD_14", "Permite administratorului sau moderatorului camerei curente să promoveze ca moderator pentru aceeaşi cameră un alt utilizator înregistrat.");
define("L_HELP_CMD_15", "Curaţă ecranul de mesaje şi le arată doar pe ultimele 5.");
define("L_HELP_CMD_16", "Salvează ultimele n mesaje (mai puţin anunţurile) într-un fişier HTML. Dacă n nu este specificat, vor fi salvate toate mesajele existente.");
define("L_HELP_CMD_17", "Permite administratorului să trimită un anunţ tuturor utilizatorilor, indiferent de camera în care se află.");
define("L_HELP_CMD_18", "Invită un utilizator din altă camera să intre în camera ta.");
define("L_HELP_CMD_19", "Permite moderatorului(ilor) unei camere sau administratorului să \"blocheze\" un utilizator, pe o durată stabilită de admin prin setările serverului.<br />Administratorul poate bloca un utilizator aflat în oricare dintre camere şi poate folosi setarea * pentru a bloca \"definitiv\" utilizatorul respectiv pe acest server de chat.<br />Opţional, [".L_HELP_REASON."] va arăta şi motivul blocării (orice frază)");
define("L_HELP_CMD_20", "Descrie cu ce te ocupi, ca un anunţ în cameră (ex. Porecla MEA mănâncă şi urmăreşte ştirile ProTV).");
define("L_HELP_CMD_21", "Anunţă camera şi utilizatorii care vor să îţi trimită mesaje<br />că nu mai eşti lângă calculator. Ca să te întorci la chat, începe doar să scrii. Opţional, poţi lăsa şi un mesaj cu motivul plecării de la calculator");
define("L_HELP_CMD_22", "Trimite un semnal sonor tip Buzz pentru captarea atenţiei celorlalţi. Nu abuza de această comandă!<br />- Folosire:<br />- anterior: \"/buzz\" or \"/buzz mesaj de arătat\" - aceasta trimite sunetul implicit definit în Panoul Admin;<br />- extindere: \"/buzz ~numesunet\" sau \"/buzz ~numesunet mesaj de arătat\" - aceasta trimite sunetul fişierului numesunet.wav aflat în directorul plus/sounds; semnul \"~\" trebuie folosit înaintea celui de-al doilea cuvânt, care reprezintă numele fişierului sunetului, fără extensia .wav (numai extensiile .wav sunt permise).<br />Implicit, această comandă poate fi folosită numai de moderatori/administratori.");
define("L_HELP_CMD_23", "Trimite un mesaj privat tip \"whisper\" (şoaptă). Mesajul va ajunge la destinatar, în orice cameră s-ar afla acesta. În cazul în care utilizatorul căutat nu este on-line, vei fi înştiinţat.");
define("L_HELP_CMD_24", "Comanda schimbă topicul (tema de discuţii) camerei în care este folosită. Încercaţi să nu suprascrieţi temele altor utilizatori şi să folosiţi teme care merită afişate.<br />Folosind comanda \"/topic top reset\" tema curentă afişată va fi ştearsă şi resetată la tema implicită a camerei.<br />În mod implicit, această comandă poate fi folosită doar de moderatori.<br />Atenţie: tema de discuţii trebuie să conţină cel puţin 2 cuvinte.<br />Opţional, \"/topic * {}\" face aceleaşi lucruri dar pentru toate camerele simultan (temă globală şi resetare temă globală).");
define("L_HELP_CMD_25", "Un joc cu zaruri pentru plictiseală sau trageri la sorţi.<br />Utilizare: /dice sau /dice [n]; n este opţional şi reprezintă numărul de zaruri din mană. Poate avea orice valoare între 1 şi numărul maxim de zaruri setat (6). Comanda fără n va arunca numărul maxim de zaruri (6).");
define("L_HELP_CMD_26", "Versiunea mai dezvoltată a comenzii /dice.<br />Utilizare: /[n1]d[n2] sau /[n1]d;<br />n1 poate avea orice valoare <b>între 1 şi 9</b> (reprezintă numărul de aruncări);<br />n2 este o valoare între 1 şi numărul maxim de zaruri setat (6) (reprezintă numărul de zaruri aruncate). Comanda fără n2 va arunca la fiecare mână cu numărul maxim de zaruri (6).");
define("L_HELP_CMD_27", "Evidenţiază mesajele trimise de un anumit utilizator, pentru a-l distinge mai uşor în cadrul conversaţiilor.<br />Utilizare: /high {utilizator} sau apasă pe pătrăţelul alb/galben cu litera H din dreapta numelui, în lista de camere/utilizatori.");
define("L_HELP_CMD_28", "Permite postarea <b>unei imagini</b> în loc de mesaj.<br />Utilizare: Introduceţi link-ul complet! (ex. <b>/img http://ciprianmp.com/images/CIPRIAN.jpg</b>). Extensii recunoscute şi acceptate: .jpg .bmp .gif. Atenţie la literele mari şi mici - contează.");
define("L_HELP_CMD_29", "Cea de a doua comandă permite administratorului sau moderatorului(ilor) din camera curentă să destituie un alt moderator din cameră la statusul normal de utilizator înregistrat.<br />Opţiunea * va destitui respectivul utilizator din toate camerele.");
define("L_HELP_CMD_30", "Cea de a doua comandă face acelaşi lucru ca şi /me, numai că va arata şi genul corespunzător<br />Exemplu * Mr Ciprian urmăreşte ştirile ProTV sau Mrs Dana este super fericită.");
define("L_HELP_CMD_31", "Schimbă ordinea sortării utilizatorilor în liste: după momentul logării sau alfabetic.");
define("L_HELP_CMD_32", "Aceasta este a treia versiune de joc de zaruri (roleplaying).<br />Utilizare: /d{n1}[tn2] sau /d{n1};<br />n1 poate avea orice valoare <b>între 1 şi 100</b> (reprezintă numărul de puncte ale fiecărui zar).<br />n2 poate avea orice valoare <b>între 1 şi %s</b> (reprezintă numărul de zaruri aruncate).");
define("L_HELP_CMD_33", "Schimbă dimensiunea textului mesajelor pe chat (valori permise pentru n: <b>între 7 şi 15</b>); comanda /size resetează dimensiunea fontului la valoarea implicită (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Eticheta Chat-ului");
define("L_HELP_ETIQ_2", "Site-ul nostru doreşte să păstreze o ambianţă plăcută şi prietenoasă, aşa că vă rugăm să aderaţi la următoarele reguli. Pentru nerespectarea acestor reguli, unul dintre moderatori ar putea să vă elimine din chat.<br /><br />Mulţumim,");
define("L_HELP_ETIQ_3", "Regulile Etichetei acestui Chat");
define("L_HELP_ETIQ_4", "Nu faceţi \"spam\" pe chat postând non-sensuri sau litere alandala.</li>
<li>Nu folosiţi caractere aLtErnAnte.</li>
<li>Folosiţi MAJUSCULELE la minimum, întrucât se consideră că ţipaţi.</li>
<li>Ţineţi cont că utilizatorii noştri pot fi de oriunde în lume, şi, mai mult ca sigur, veţi întâlni persoane cu concepţii/credinţe/idei diferite. Vă rugăm să fiţi politicos şi respectuos cu aceste persoane.</li>
<li>Nu adresaţi insulte altor utilizatori. De fapt, este interzis să folosiţi injurii şi insulte.</li>
<li>Nu vă adresaţi celorlalţi utilizatori pe numele lor reale, chiar dacă îi cunoaşteţi personal. Mulţi utilizatori nu apreciază folosirea identităţii reale pe chat-uri. Folosiţi în schimb poreclele acestora (nicknames).");

// messages frame
define("L_NO_MSG", "Nu este nici un mesaj ...");
define("L_TODAY_DWN", "De aici încep mesajele trimise astăzi");
define("L_TODAY_UP", "De aici încep mesajele trimise ieri");

// message colors
$TextColors = array("Negru" => "#000000",
										"Roşu" => "#FF0000",
										"Verde" => "#009900",
										"Albastru" => "#0000FF",
										"Mov" => "#9900FF",
										"Roşu închis" => "#990000",
										"Verde închis" => "#006600",
										"Albastru închis" => "#000099",
										"Maro" => "#996633",
										"Albastru deschis" => "#006699",
										"Portocaliu" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Utilizatori Ignoraţi");
define("L_IGNOR_NON", "Nici un utilizator ignorat");

// whois popup
define("L_WHOIS_ADMIN", "Administrator");
define("L_WHOIS_TOPMOD", "Top Moderator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_USER", "Utilizator");
define("L_WHOIS_GUEST", "Vizitator");
define("L_WHOIS_REG", "Înregistrat");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s a intrat în cameră" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s a intrat în cameră");
define("L_ENTER_ROM_NOSOUND", "%s a intrat în cameră");
define("L_EXIT_ROM", "%s a ieşit din cameră");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s a fost eliminat automat din cameră pentru inactivitate");
define("L_CLOSED_ROM", "%s şi-a închis browser-ul");

// Text for /away command notification string:
define("L_AWAY", "%s nu mai e lângă calculator...");
define("L_BACK", "%s s-a întors!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Meniu Rapid *****");	//&nbsp; înseamnă un spaţiu. numărul acestora ajuta la centrarea titlului listei de comenzi în căsuţă.

// Topic Banner mod
define("L_TOPIC", "a setat TOPIC-ul:");
define("L_TOPIC_RESET", "a resetat TOPIC-ul");
define("L_HELP_TOP", "minim 2 cuvinte ca TOPIC (temă de discuţii)");

// Img cmd mod
define("L_PIC", "Imagine trimisă de");
define("L_PIC_RESIZED", "Redimensionată la");
define("L_HELP_IMG", "calea/link-ul către imaginea de postat");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s nu este moderator!");
define("L_IS_NO_MOD_ALL", "%s nu mai este moderator în nici una dintre camerele acestui chat.");
define("L_ERR_IS_ADMIN", "%s este administrator!\\nNu ai dreptul sa-i modifici permisiunile.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra Comenzi instalate:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra Opţiuni instalate:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">RoBoţelul nostru este: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "Limbi folosite");
define("L_PRO_2", "Link Favorit 1");
define("L_PRO_3", "Link Favorit 2");
define("L_PRO_4", "Descriere");
define("L_PRO_5", "URL-ul pozei");
define("L_PRO_6", "Culoare nume/text");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "Adresa invalidă sau host-ul nu este online.");
define("L_TITLE_AV", "Avatarul ales: ");
define("L_CHG_AV", "Apasă \"".L_REG_16."\" în formularul Profil<br />pentru a-ţi salva Avatarul.");
define("L_SEL_NEW_AV", "Selectează un nou Avatar");
define("L_EX_AV", "(exemplu: http://mysite/images/mypic.gif):");
define("L_URL_AV", "Adresa: ");
define("L_EXPL_AV", "(Introdu adresa şi apasă Enter pentru a vedea poza)");
define("L_CANCEL", "Renunţă");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "Sfat: Bot-ul este activ public în această camera. Pentru a-i vorbi, scrie <b>hello ".C_BOT_NAME."</b>. Pentru a-l opri, scrie <b>bye ".C_BOT_NAME."</b>. (privat: /to <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "Sfat: Bot-ul este activ public în camera %s. Poţi discuta numai privat cu el apăsând pe numele său <b>".C_BOT_NAME."</b>. (comanda: /wisp <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "Sfat: Bot-ul nu este activ public. Poţi discuta numai privat cu el apăsând pe numele său. (comenzile: /to <b>".C_BOT_NAME."</b> Mesaj sau /wisp <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "RoBoţelul nu este pornit în această cameră!");
define("BOT_START_ERROR", "RoBoţelul este deja pornit în această cameră!");
define("BOT_DISABLED_ERROR", "RoBoţelul a fost dezactivat în Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "a aruncat zarurile şi a obţinut:");
define("DICE_WRONG", "Trebuie să alegi un număr de zaruri cuprins între 1 şi ".MAX_ROLLS.".\\nComanda /dice va arunca cu toate ".MAX_ROLLS." zarurile.");
define("DICE2_WRONG", "A doua valoare trebuie să fie cuprinsă între 1 şi ".MAX_ROLLS.".\\nNu o specifica pentru a arunca cu toate ".MAX_ROLLS." zarurile\\n(ex. /".MAX_DICES."d sau /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Prima valoare trebuie să fie cuprinsă între 1 şi ".MAX_DICES.".\\n(ex. /".MAX_DICES."d sau /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "A doua valoare trebuie să fie cuprinsă între 1 şi ".MAX_ROLLS.".\\nNu o specifica pentru a arunca cu toate ".MAX_ROLLS." zarurile\\n(ex. /d50 or /d100t".MAX_ROLLS.").");

// Log mod by Ciprian
define("L_ARCHIVE", "Deschide Arhiva");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Foloseşte popup-uri la mesaje private");
define("L_PRIV_POST_MSG", "Trimite un mesaj privat!");
define("L_PRIV_MSG", "Nou mesaj privat primit!");
define("L_PRIV_MSGS", "mesaje private noi primite!");
define("L_PRIV_MSGSa", "Acestea sunt primele 10 mesaje!<br />Apasă link-ul de jos pentru a vedea restul.");
define("L_PRIV_MSG1", "De la:");
define("L_PRIV_MSG2", "Camera:");
define("L_PRIV_MSG3", "Pentru:");
define("L_PRIV_MSG4", "Mesaj:");
define("L_PRIV_MSG5", "Trimis:");
define("L_PRIV_REPLY", "Răspunde");
define("L_PRIV_READ", "Apasă butonul Close pentru a marca mesajele ca citite!");
define("L_PRIV_POPUP", "Poţi dezactiva/reactiva aceste popup-uri<br />editându-ţi");
define("L_PRIV_POPUP1", "Profilul</a> (numai dacă eşti înregistrat)");
define("L_NOT_ONLINE", "%s nu este online acum.");
define("L_PRIV_NOT_ONLINE", "%s nu este online acum,\\ndar va primi mesajul tău la primul login.");
define("L_PRIV_NOT_INROOM", "%s nu este în această cameră.\\nDacă vrei totuşi să îl contactezi,\\nfoloseşte comanda: /wisp %s mesaj.");
define("L_PRIV_AWAY", "%s nu este la calculator,\\ndar va primi mesajul tău la întoarcere.");
define("PM_DISABLED_ERROR", "Mesageria privată este\\ndezactivată în acest chat.");
define("L_NEXT_PAGE", "Pagina următoare");
define("L_NEXT_READ", "Mai sunt de citit %s"); // message / 10 messages
define("L_ROOM_ALL", "Toate camerele");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Activat" : "Dezactivat"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Activat" : "Dezactivat"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Setările curente ale serverului</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Culori implicite</u>: Administrator = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderatori = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Ceilalţi utilizatori = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Culoarea implicită</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Spectrul de Culori");
define("L_COL_HELP_SUB1", "Folosire:");
define("L_COL_HELP_P1", "Poţi să-ţi defineşti culoarea ta favorită editându-ţi profilul (aceeaşi cu culoarea numelui). Vei putea totuşi să foloseşti şi celelalte culori. Pentru a reveni la culoarea favorită după ce ai folosit una oarecare din listă, va trebui să selectezi măcar o dată culoarea implicită (Null) - este prima din lista de culori.");
define("L_COL_HELP_SUB2", "Sfaturi:");
define("L_COL_HELP_P2", "<u>Spectrul de Culori</u><br />În funcţie de capabilităţile browser-ului şi sistemului de operare folosit, este posibil ca anumite culori să nu fie afişate corect (ex. pe calculatoarele foarte vechi). Numai 16 nume de culori sunt recunoscute de browserele mai vechi, care nu suporta decât standardul W3C HTML 4.0. Aceste culori de bază (numite şi web-safe) sunt:");
define("L_COL_HELP_P2a", "Dacă un utilizator se plânge că nu poate vedea corect culoarea pe care ai selectat-o, înseamnă că probabil foloseşte un browser foarte vechi, care nu recunoaşte numele culorii tale.");
define("L_COL_HELP_SUB3", "Culori implicite în acest chat:");
define("L_COL_HELP_P3", "<u>Culori în funcţie de permisiunile utilizatorului</u>:<br />1. Administratorul poate folosi tot spectrul de culori.<br />Culoarea administratorului este <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderatorii pot folosi orice culoare, în afară de <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> şi <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />Culoarea moderatorilor este <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Toţi ceilalţi utilizatori vor putea folosi orice altă culoare, în afară de <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> şi <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Culoarea implicită este <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Informaţii tehnice</u>: Aceste culori au fost definite de către administrator în admin panel.<br />Dacă ceva nu e în regulă sau nu vă plac culorile implicite, <b>administratorul</b> este primul pe care ar trebui să-l contactaţi şi nu pe ceilalţi utilizatori de pe chat. :-)");
define("L_COL_HELP_USER_STATUS", "Statutul tău");
define("L_COL_TUT", "Folosirea culorilor în textul mesajelor");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Numai administratorul poate folosi culoarea ".COLOR_CA."!\\n\\nCuloarea a fost resetată la ".COLOR_CM."!\\n\\nAlege orice altă culoare!");
define("COL_ERROR_BOX_USRA", "Numai administratorul poate folosi culoarea ".COLOR_CA."!\\n\\nNu încerca să foloseşti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1."\\nAcestea sunt rezervate altor useri!\\n\\nCuloarea a fost resetată la ".COLOR_CD."!\\n\\nAlege orice altă culoare!");
define("COL_ERROR_BOX_USRM", "Trebuie să fii moderator pentru a folosi culoarea ".COLOR_CM."!\\n\\nNu încerca să foloseşti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1."\\nAcestea sunt rezervate altor useri!\\n\\nCuloarea a fost resetată la ".COLOR_CD."!\\n\\nAlege orice altă culoare!");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Bun venit pe chat-ul nostru! Vă rugăm să nu folosiţi expresii nepoliticoase, <I>pentru o ambianţă cât mai plăcută</I>." . L_ENTER_SND);
else define("WELCOME_MSG", "Bun venit pe chat-ul nostru! Vă rugăm să nu folosiţi expresii nepoliticoase, <I>pentru o ambianţă cât mai plăcută</I>.");
define("WELCOME_MSG_NOSOUND", "Bun venit pe chat-ul nostru! Vă rugăm să nu folosiţi expresii nepoliticoase, <I>pentru o ambianţă cât mai plăcută</I>.");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Setările serverului de chat tocmai au fost modificate. Pentru o bună funcţionare, trebuie să reîncărcaţi chat-ul (apăsaţi tasta F5 sau Ieşire şi reintraţi pe chat).");

//Size command error by Ciprian
define("L_ERR_SIZE", "Dimensiunea fontului poate fi doar\\nnulă (pentru resetare) sau cuprinsă între 7 şi 15");

// Week days for Status Worldtime and Open Schedule by Ciprian
define("L_MON", "Luni");
define("L_TUE", "Marţi");
define("L_WED", "Miercuri");
define("L_THU", "Joi");
define("L_FRI", "Vineri");
define("L_SAT", "Sâmbătă");
define("L_SUN", "Duminică");

// Password reset form by Ciprian
define("L_PASS_0", "Formular pentru resetarea parolei");
define("L_PASS_1", "Întrebarea secretă");
define("L_PASS_2", "Care a fost prima ta maşină?"); // Don't change this question! Just translate it!
define("L_PASS_3", "Cum se numea primul tău animal?"); // Don't change this question! Just translate it!
define("L_PASS_4", "Care este băutura ta preferată?"); // Don't change this question! Just translate it!
define("L_PASS_5", "Care este data ta de naştere?"); // Don't change this question! Just translate it!
define("L_PASS_6", "Răspunsul corect");
define("L_PASS_7", "Resetează parola");
define("L_PASS_8", "Parola a fost resetată cu succes.");
define("L_PASS_9", "Noua ta parolă pentru a intra pe chat.");
define("L_PASS_11", "Bine ai revenit pe serverul nostru de chat");
define("L_PASS_12", "Alegeţi întrebarea ...");
define("L_ERR_PASS_1", "Poreclă greşită. Alege-o pe-a ta!");
define("L_ERR_PASS_2", "Adresă de email greşită. Încearcă din nou!");
define("L_ERR_PASS_3", "Întrebare secretă greşită.<br />Răspunde la întrebarea de mai jos!");
define("L_ERR_PASS_4", "Răspuns secret greşit. Încearcă din nou!");
define("L_ERR_PASS_5", "Nu ţi-ai setat datele secrete!");
define("L_ERR_PASS_6", "Nu ţi-ai setat datele secrete încă!<br />Nu poţi folosi acest formular. Contactează administratorul!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s a devenit administrator al acestui chat.");
define("L_ADM_4", "%s nu mai este administrator al acestui chat.");

// Open Schedule by Ciprian
define("L_DAILY", "Zilnic");
define("L_OPEN", "Deschis");
define("L_CLOSED", "Închis");
define("L_OPEN_PUB", "DESCHIS PUBLICULUI");
define("L_CLOSED_PUB", "ÎNCHIS PUBLICULUI");

// Links popup page by Alex
define("L_LINKS_1", "Link-uri postate");
define("L_LINKS_2", "Aici puteţi accesa link-urile postate pe chat");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Apasă aici %s %s");
define("L_CLICK", "Apasă aici %s");
define("L_LINKS_3", "pentru a deschide link-ul");
define("L_LINKS_4", "pentru a deschide site-ul autorului");
define("L_LINKS_5", "pentru a trimite acest zâmbet");
define("L_LINKS_6", "pentru a contacta");
define("L_LINKS_7", "pentru a vizita Pagina phpMyChat");
define("L_LINKS_8", "pentru a te înscrie în Grupul phpMyChat");
define("L_LINKS_9", "pentru a trimite părerea ta");
define("L_LINKS_10", "pentru a descărca phpMyChat Plus");
define("L_LINKS_11", "pentru a vedea cine e acum pe chat");
define("L_LINKS_12", "pentru a deschide pagina de Chat");
define("L_LINKS_13", "pentru a trimite acest buzz"); // can also be translated as "to play this sound"
define("L_LINKS_14", "pentru a folosi această comandă");
define("L_LINKS_15", "pentru a deschide");
define("L_LINKS_16", "Galerie Zâmbete");
define("L_SWITCH", "Schimbă în");
define("L_SELECTED", "selectată");
define("L_EMAIL_1", "pentru a trimite email");
define("L_FULLSIZE_PIC", "pentru a deschide poza în mărime originală");
define("L_AUTHOR", "autorul");
define("L_DEVELOPER", "dezvoltatorul acestui chat");
define("L_OWNER", "proprietarul acestui chat");
define("L_TRANSLATOR", "translatorul");

// Banner topics - the topics are not multi-language!
define("L_BANNER_WELCOME", "Bun venit în camera %s!");
define("L_BANNER_TOPIC", "Subiect:");

// Counter on login
define("L_VISITOR_REPORT", "... vizitatori de la %s");

// Status bar messages
define("L_JOIN_ROOM", "Intră în cameră");
define("L_USE_NAME", "Foloseşte acest nume");
define("L_USE_NAME1", "Adresează-te acestui utilizator");
define("L_WHSP", "Şoaptă");
define("L_SEND_WHSP", "Şopteşte");
define("L_SEND_PM_1", "Trimite mesaj privat");
define("L_SEND_PM_2", "Trimite un mesaj privat");

//Lurking frame popup
define("L_LURKING_2", "Pagina de monitorizare");
define("L_LURKING_3", "monitorizează");
define("L_LURKING_4", "intrat la");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Extra Opţiuni");
define("L_SOUNDFIX_IE_1", "Sound fix pentru IE");
define("L_SOUNDFIX_IE_2", "Descarcă un sound fix pentru IE");
define("L_LURKING_1", "Deschide pagina de monitorizare");

// Months for Open Schedule by Ciprian
define("L_JAN", "Ianuarie");
define("L_FEB", "Februarie");
define("L_MAR", "Martie");
define("L_APR", "Aprilie");
define("L_MAY", "Mai");
define("L_JUN", "Iunie");
define("L_JUL", "Iulie");
define("L_AUG", "August");
define("L_SEP", "Septembrie");
define("L_OCT", "Octombrie");
define("L_NOV", "Noiembrie");
define("L_DEC", "Decembrie");

// Localized date format - read the parameters here: http://www.php.net/manual/en/function.strftime.php
setlocale(LC_TIME, "ro_RO.UTF-8", "ro_RO.UTF-8@euro", "Romanian.UTF-8", "rou_rou.UTF-8", "rou.UTF-8");
define("L_SHORT_DATE", "%d.%m.%Y"); //
define("L_LONG_DATE", "%A, %d %B %Y"); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%d.%m.%Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%A, %d %B %Y %H:%M:%S"); //Change this to your local desired format (keep the short form)

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".$CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","utilizatori sunt ".LOGIN_LINK." pe chat</A></td></tr>");
define("USERS_LOGIN","1 utilizator este ".LOGIN_LINK." pe chat</A></td></tr>");
define("NO_USER","Nimeni nu este ".LOGIN_LINK." pe chat</A></td></tr>");

// Language names
define("L_LANG_AR", "Spaniolă Argentiniană");
define("L_LANG_NL", "Olandeză");
define("L_LANG_EN", "Engleză");
define("L_LANG_ENUK", "Engleză Britanică");
define("L_LANG_ENUS", "Engleză Americană");
define("L_LANG_FR", "Franceză");
define("L_LANG_DE", "Germană");
define("L_LANG_IT", "Italiană");
define("L_LANG_RO", "Română");
define("L_LANG_ES", "Spaniolă");
define("L_LANG_SV", "Suedeză");
define("L_LANG_TR", "Turcă");
define("L_LANG_VI", "Vietnameză");
?>