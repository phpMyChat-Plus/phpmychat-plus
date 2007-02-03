<?php
// File : romanian.chat.php - plus version
// Translation started by Radu Swider <swidera@satline.ro>, first updated by Ciprian Popovici-Oana <floppy@kermit.cs.pub.ro>
// Corrected, finalized and updated to Plus version by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "iso-8859-2";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Mesajele se sterg dupa");
define("L_WEL_2", "ore, iar userii inactivi dupa");
define("L_WEL_3", "minut/minute.");

define("L_CUR_1", "Acum");
define("L_CUR_1a", "sunt");
define("L_CUR_1b", "este");
define("L_CUR_2", "pe chat");
define("L_CUR_3", "Utilizatori aflati in camere chat");
define("L_CUR_4", "utilizatori in camere private");
define("L_CUR_5", "Utilizatori care monitorizeaza<br>aceasta pagina (spectatori):");

define("L_SET_1", "Introdu-ti datele...");
define("L_SET_2", "Porecla");
define("L_SET_3", "numarul de mesaje de afisat");
define("L_SET_4", "timpul de actualizare");
define("L_SET_5", "Selecteaza o camera de chat...");
define("L_SET_6", "Camere disponibile");
define("L_SET_7", "Alegeti ...");
define("L_SET_8", "Camere publice create de utilizatori");
define("L_SET_9", "Creeaza a ta");
define("L_SET_10", "publica");
define("L_SET_11", "privata");
define("L_SET_12", "camera");
define("L_SET_13", "Apoi intra pe");
define("L_SET_14", "Chat");
define("L_SET_15", "Camere private disponibile");
define("L_SET_16", "Camere private create de utilizatori");
define("L_SET_17", "Alege-ti un avatar");
define("L_SET_18", "Adauga in Favorite: apasa \"CTRL +D\".");

define("L_SRC", "este disponibil gratuit de la");

define("L_SECS", "secunde");
define("L_MIN", "minut");
define("L_MINS", "minute");

// registration stuff:
define("L_REG_1", "Parola");
define("L_REG_1r", "(numai daca esti deja inregistrat)");
define("L_REG_2", "Configurare date cont / Administrare setari");
define("L_REG_3", "Inregistrare");
define("L_REG_4", "Editare profil");
define("L_REG_5", "Stergere utilizator");
define("L_REG_6", "Inregistrare utilizator");
define("L_REG_7", "Parola");
define("L_REG_8", "Email-ul tau");
define("L_REG_9", "Ai fost inregistrat cu succes.");
define("L_REG_10", "Inapoi");
define("L_REG_11", "Modificare");
define("L_REG_12", "Modifica datele despre utilizator");
define("L_REG_13", "Sterge utilizator");
define("L_REG_14", "Login");
define("L_REG_15", "Intra");
define("L_REG_16", "Schimba");
define("L_REG_17", "Datele tale au fost modificate cu succes.");
define("L_REG_18", "Ai fost dat afara din camera de catre moderator.");
define("L_REG_19", "Chiar vrei sa fii sters?");
define("L_REG_20", "Da");
define("L_REG_21", "Ai fost sters cu succes.");
define("L_REG_22", "Nu");
define("L_REG_25", "Inchide");
define("L_REG_30", "Prenumele");
define("L_REG_31", "Numele");
define("L_REG_32", "WEB");
define("L_REG_33", "Arata e-mailul la comanda /whois");
define("L_REG_34", "Editare profil");
define("L_REG_35", "Administrare");
define("L_REG_36", "Localitatea, Tara");
define("L_REG_37", "Campurile care contin <span class=\"error\">*</span> trebuiesc completate.");
define("L_REG_39", "Camera in care te aflai a fost curatata de administrator.");
define("L_REG_45", "Sex");
define("L_REG_46", "Masculin");
define("L_REG_47", "Feminin");
define("L_REG_48", "Nespecificat");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Acestea sunt datele tale pentru a te loga la chat");
define("L_EMAIL_VAL_2", "Bun venit pe serverul nostru de chat!");
define("L_EMAIL_VAL_Err", "Eroare interna, te rog sa contactezi administratorul: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Parola a fost trimisa la adresa de e-mail aleasa de tine.");

// admin stuff
define("L_ADM_1", "%s nu mai este moderator al acestei camere.");
define("L_ADM_2", "Nu mai esti inregistrat.");

//error messages
define("L_ERR_USR_1", "Acest nume este folosit deja. Alege-ti altul.");
define("L_ERR_USR_2", "Trebuie sa-ti alegi un nume.");
define("L_ERR_USR_3", "Acest nume este inregistrat.<br>Introdu parola sau alege o alta porecla.");
define("L_ERR_USR_4", "Ai scris o parola incorecta.");
define("L_ERR_USR_5", "Trebuie sa scrii numele.");
define("L_ERR_USR_6", "Trebuie sa scrii parola.");
define("L_ERR_USR_7", "Trebuie sa scrii adresa ta de e-mail.");
define("L_ERR_USR_8", "Trebuie sa scrii o adresa de e-mail corecta.");
define("L_ERR_USR_9", "Acest nume este deja folosit.");
define("L_ERR_USR_10", "Nume sau parola incorecta.");
define("L_ERR_USR_11", "Trebuie sa fii administrator.");
define("L_ERR_USR_12", "Esti administrator, nu poti fi sters.");
define("L_ERR_USR_13", "Pentru a crea o camera trebuie sa fii inregistrat.");
define("L_ERR_USR_14", "Trebuie sa fii inregistrat inainte de a intra pe chat.");
define("L_ERR_USR_15", "Trebuie sa scrii numele complet.");
define("L_ERR_USR_16", "Numai aceste extra-caractere sunt permise:\\n".$REG_CHARS_ALLOWED."\\nSpatii, virgule sau backslash-uri (\\) nu sunt permise.\\nVerifica sintaxa!");
define("L_ERR_USR_16a", "Numai aceste extra-caractere sunt permise:<br>".$REG_CHARS_ALLOWED."<br>Spatii, virgule sau backslash-uri (\\) nu sunt permise. Verifica sintaxa!");
define("L_ERR_USR_17", "Camera aleasa nu exista sau sau nu ai dreptul sa o creezi.");
define("L_ERR_USR_18", "Cuvant interzis folosit in cadrul poreclei.");
define("L_ERR_USR_19", "Nu poti fi in mai multe camere simultan.");
define("L_ERR_USR_20", "Ai fost blocat din aceasta camera sau de pe chat.");
define("L_ERR_USR_21", "NU ai fost activ in ultimele ".C_USR_DEL." minute,<br>de aceea ai fost eliminat din camera.");
define("L_ERR_USR_22", "Aceasta comanda nu functioneaza\\nin browserul tau (pe nucleu de IE).");
define("L_ERR_USR_23", "Trebuie sa fii inregistrat inainte de a intra in camere private.");
define("L_ERR_USR_24", "Trebuie sa fii inregistrat inainte de a crea camere proprii.");
define("L_ERR_USR_25", "Numai administratorul poate folosi culoarea ".$COLORNAME."!<br>Nu incerca sa folosesti ".COLOR_CA.", ".COLOR_CAS.", ".COLOR_CM." sau ".COLOR_CMS." (sau codurile lor HEX).<br>Acestea sunt rezervate utilizatorilor speciali!");
define("L_ERR_USR_26", "Numai administratorii sau moderatorii pot folosi culoarea ".$COLORNAME."!<br>Nu incerca sa folosesti ".COLOR_CA.", ".COLOR_CAS.", ".COLOR_CM." or ".COLOR_CMS." (sau codurile lor HEX).<br>Acestea sunt rezervate utilizatorilor speciali!");
define("L_ERR_USR_27", "Nu-ti poti vorbi tie insuti in soapta.\\nFa asta in minte...\\nAlege un alt utilizator.");
define("L_ERR_ROM_1", "Numele camerei nu poate contine virgula sau backslash (\\).");
define("L_ERR_ROM_2", "Numele camerei pe care ai vrut s-o creezi contine un cuvant interzis. Reformuleaza.");
define("L_ERR_ROM_3", "Exista deja o camera publica cu acest nume.");
define("L_ERR_ROM_4", "Numele camerei este invalid.");

// users frame or popup
define("L_EXIT", "Iesire");
define("L_DETACH", "Detasare lista utilizatori");
define("L_EXPCOL_ALL", "Extinde/Comprima Tot");
define("L_CONN_STATE", "Refa starea conexiunii");
define("L_CHAT", "Chat");
define("L_USER", "utilizator");
define("L_USERS", "utilizatori");
define("L_LURKER", "spectator");
define("L_LURKERS", "spectatori");
define("L_NO_USER", "Nici un utlizator");
define("L_ROOM", "camera");
define("L_ROOMS", "camere");
define("L_EXPCOL", "Extinde/Comprima camera");
define("L_BEEP", "Cu/fara sunet la intrarea utilizatorilor in camera");
define("L_PROFILE", "Arata profilul");
define("L_NO_PROFILE", "Fara profil");

// input frame
define("L_HLP", "Ajutor");
define("L_BAD_CMD", "Comanda invalida!");
define("L_ADMIN", "Utilizatorul %s este deja administrator!");
define("L_IS_MODERATOR", "Utilizatorul %s este deja moderator!");
define("L_NO_MODERATOR", "Aceasta comanda o poate folosi numai un moderator al acestei camere.");
define("L_MODERATOR", "%s a fost promovat moderator al acestei camere.");
define("L_NONEXIST_USER", "Utilizatorul %s nu este in camera curenta.");
define("L_NONREG_USER", "Utilizatorul %s nu este inregistrat.");
define("L_NONREG_USER_IP", "IP-ul sau este: %s.");
define("L_NO_KICKED", "Utilizatorul %s este moderator sau administrator si nu poate fi dat afara.");
define("L_KICKED", "Utilizatorul %s a fost dat afara!");
define("L_NO_BANISHED", "Utilizatorul %s este moderator sau administrator si nu poate fi blocat.");
define("L_BANISHED", "Utilizatorul %s a fost blocat cu succes.");
define("L_SVR_TIME", "Timpul curent pe server: ");
define("L_NO_SAVE", "Nimic de salvat!");
define("L_NO_ADMIN", "Numai administratorul poate folosi aceasta comanda.");
define("L_NO_REG_USER", "Trebuie sa fii inregistrat pentru a folosi aceasta comanda.");
define("L_ANNOUNCE", "ANUNT");
define("L_INVITE", "Utilizatorul %s te invita sa intri cu el/ea in camera <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a>.");
define("L_INVITE_REG", " Trebuie sa fii inregistrat pentru a intra in aceasta camera.");
define("L_INVITE_DONE", "Invitatia a fost trimisa lui %s.");
define("L_OK", "Trimite");

// help popup
define("L_HELP_TIT_1", "Emotii");
define("L_HELP_TIT_2", "Formatarea textului pentru mesaje");
define("L_HELP_FMT_1", "Textul poate fi ingrosat (bold), inclinat (italic) sau subliniat (underline) prin simpla sa incadrare intre cuvintele cheie &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; sau &lt;U&gt; &lt;/U&gt;<br>Exemplu, &lt;B&gt;acest text&lt;/B&gt; va produce <B>acest text</B>.");
define("L_HELP_FMT_2", "Pentru a crea un hyperlink (pentru e-mail sau pagina www) in mesajul tau, tasteaza pur-si-simplu adresa corespunzatoare. Hyperlink-ul va fi creat automat.");
define("L_HELP_TIT_3", "Comenzi");
define("L_HELP_USR", "utilizator");
define("L_HELP_MSG", "mesaj");
define("L_HELP_ROOM", "camera");
define("L_HELP_BUZZ", "~numesunet");
define("L_HELP_CMD_0", "{} obligatoriu, [] optional.");
define("L_HELP_CMD_1a", "Stabileste cate mesaje sa fie aratate, 5 cel putin.");
define("L_HELP_CMD_1b", "Reincarca fereastra cu mesaje si afiseaza ultimele n mesaje, default sunt minim 5.");
define("L_HELP_CMD_2a", "Modifica timpul de reactualizare (refresh) a mesajelor (in secunde).<br>Daca n nu este specificat sau este mai mic decat 3, comanda va seta intre reactualizare la 10 secunde sau deloc.");
define("L_HELP_CMD_2b", "Modifica timpul de reactualizare (refresh) a mesajelor si listei de utilizatori (in secunde).<br>Daca n nu este specificat sau este mai mic decat 3, comanda va seta intre reactualizare la 10 secunde sau deloc.");
define("L_HELP_CMD_3", "Schimba ordinea mesajelor (nu in toate browserele).");
define("L_HELP_CMD_4", "Intra in alta camera; daca aceasta camera nu exista si ai dreptul (din setari) o poti crea.<br>Utilizare: n este 0 pentru camere private si 1 pentru camere publice. Daca n nu este specificat, valoarea sa implicita este 1.");
define("L_HELP_CMD_5", "Paraseste chat-ul dupa ce ai scris un mesaj optional.");
define("L_HELP_CMD_6", "Ignora mesaje de la utilizatorul a carui porecla este specificata.<br>Fara nici o optiune va aparea o ferestra care va afisa toti utilizatori ignorati.");
define("L_HELP_CMD_7", "Recheama textul introdus anterior (comanda sau mesaj).");
define("L_HELP_CMD_8", "Arata/Ascunde timpul din fata mesajelor.");
define("L_HELP_CMD_9", "Expulzeaza utilizatori din chat. Aceasta comanda poate fi data numai de moderator.");
define("L_HELP_CMD_10", "Trimite un mesaj privat catre utilizatorul specificat (alti utilizatori nu vor vedea mesajul).");
define("L_HELP_CMD_11", "Arata informatii despre utilizatorul specificat.");
define("L_HELP_CMD_12", "Afiseaza o fereastra pentru editarea profilului utilizatorului.");
define("L_HELP_CMD_13", "Te anunta daca un utilizator a intrat/iesit in camera.");
define("L_HELP_CMD_14", "Permite administratorului sau moderatorului(ilor) camerei curente sa avanseze ca moderator pentru aceeasi camera un utilizator inregistrat.");
define("L_HELP_CMD_15", "Curata ecranul de mesaje si le arata doar pe ultimele 5.");
define("L_HELP_CMD_16", "Salveaza ultimele n mesaje (mai putin anunturile) intr-un fisier HTML. Daca n nu este specificat, vor fi salvate toate mesajele existente.");
define("L_HELP_CMD_17", "Permite administratorului sa trimita un anunt tuturor utilizatorilor, indiferent de camera in care se afla.");
define("L_HELP_CMD_18", "Invita un utilizator din alta camera sa intre in camera ta.");
define("L_HELP_CMD_19", "Permite moderatorului(ilor) unei camere sau administratorului sa \"blocheze\" un utilizator, pe o durata stabilita de admin prin setarile serverului.<br>Administratorul poate bloca un utilizator aflat in oricare dintre camere si poate folosi setarea'<B>&nbsp;*&nbsp;</B>' pentru a bloca \"definitiv\" utilizatorul respectiv pe acest server de chat.");
define("L_HELP_CMD_20", "Descrie cu ce te ocupi, ca un anunt in camera (ex. Porecla MEA mananca si urmareste stirile ProTV).");
define("L_HELP_CMD_21", "Anunta camera si utilizatorii care vor sa iti trimita mesaje<br>ca nu mai esti langa calculator. Ca sa te intorci la chat, incepe doar sa scrii. Optional, poti lasa si un mesaj cu motivul plecarii de la calculator");
define("L_HELP_CMD_22", "Trimite un semnal sonor tip Buzz pentru captarea atentiei celorlalti. Nu abuza de aceasta comanda!<br>- Folosire:<br>- anterior: \"/buzz\" or \"/buzz mesaj de aratat\" - aceasta trimite sunetul implicit definit in Panoul Admin;<br>- extindere: \"/buzz ~numesunet\" sau \"/buzz ~numesunet mesaj de aratat\" - aceasta trimite sunetul fisierului numesunet.wav aflat in directorul plus/sounds; semnul \"~\" trebuie folosit inaintea celui de-al doilea cuvant, care reprezinta numele fisierului sunetului, fara extensia .wav (numai extensiile .wav sunt permise).<br>Implicit, aceasta comanda poae fi folosita numai de moderatori/administratori.");
define("L_HELP_CMD_23", "Trimite un mesaj privat tip \"wisper\". Mesajul va ajunge la destinatar, in orice camera s-ar afla acesta. In cazul in care utilizatorul cautat nu este on-line, vei fi instiintat.");
define("L_HELP_CMD_24", "Comanda schimba topicul (tema de discutii) camerei in care este folosita. Incercati sa nu suprascrieti temele altor utilizatori si sa folositi teme care merita afisate. Abuzul va duce la limitarea folosirii acestei comenzi numai de catre moderatori.<br>In mod implicit, aceasta comanda poate fi folosita doar de moderatori.<br>Atentie: expresia {tema de discutii} trebuie sa contina cel putin 2 cuvinte.");
define("L_HELP_CMD_25", "Un joc cu zaruri pentru plictiseala sau trageri la sorti.<br>Utilizare: /dice sau /dice [n]; n este optional si reprezinta numarul de zaruri in mana. Poate avea orice valoare intre 1 si numarul maxim de zaruri setat (6). Comanda fara n va arunca numarul maxim de zaruri (6).");
define("L_HELP_CMD_26", "Versiunea mai dezvoltata a comenzii /dice.<br>Utilizare: /[n1]d[n2] sau /[n1]d;<br>n1 poate avea orice valoare <b>intre 1 si 9</b> (reprezinta numarul de aruncari);<br>n2 este o valoare intre 1 si numarul maxim de zaruri setat (6) (reprezinta numarul de zaruri aruncate). Comanda fara n2 va arunca la fiecare mana cu numarul maxim de zaruri (6).");
define("L_HELP_CMD_27", "Evidentiaza mesajele trimise de un anumit utilizator, pentru a-l distinge mai usor in cadrul conversatiilor.<br>Utilizare: /high {utilizator} sau apasa pe patratelul alb/galben cu litera H din dreapta numelui, in lista de camere/utilizatori.");
define("L_HELP_CMD_28", "Permite postarea <b>unei imagini</b> in loc de mesaj.<br>Utilizare: Introduceti linkul complet! (ex. <b>/img http://ciprianmp.com/images/CIPRIAN.jpg</b>). Extensii recunoscute si acceptate: .jpg .bmp .gif. Atentie la literele mari si mici - conteaza.");
define("L_HELP_CMD_29", "Cea de a doua comanda permite administratorului sau moderatorului(ilor) din camera curenta de a destitui un alt moderator din camera la statusul normal de utilizator inregistrat.<br>Optiunea * va destitui respectivul utilizator din toate camerele.");
define("L_HELP_CMD_30", "Cea de a doua comanda face acelasi lucru ca si /me, numai ca va arata si genul corespunzator<br>Examplu * Mr Ciprian urmareste stirile ProTV sau Mrs Dana este super fericita.");
define("L_HELP_CMD_31", "Schimba ordinea sortarii utilizatorilor in liste: dupa momentul logarii sau alfabetic.");
define("L_HELP_CMD_32", "Aceasta este a treia versiune de joc de zaruri (roleplaying).<br>Utilizare: /d{n1}[tn2] sau /d{n1};<br>n1 poate avea orice valoare <b>intre 1 si 100</b> (reprezinta numarul de puncte ale fiecarui zar).<br>n2 poate avea orice valoare <b>intre 1 si %s</b> (reprezinta numarul de zaruri aruncate).");
define("L_HELP_CMD_33", "Schimba dimensiunea textului mesajelor pe chat (valori permise pentru n: <b>intre 7 si 15</b>); comanda /size reseteaza dimensiunea fontului la valoarea implicita.");
define("L_HELP_ETIQ_1", "Eticheta Chat-ului");
define("L_HELP_ETIQ_2", "Site-ul nostru doreste sa pastreze o ambianta placuta si prietenoasa, asa ca va rugam sa aderati la urmatoarele reguli. Pentru nerespectarea acestor reguli, unul dintre moderatori ar putea sa va elimine din chat.<br><br>Multumim,");
define("L_HELP_ETIQ_3", "Regulile Etichetei acestui Chat");
define("L_HELP_ETIQ_4", "Nu faceti &quot;spam&quot; pe chat postand non-sensuri sau litere alandala;</li><li>Nu folositi caractere aLtErnAnte;</li><li>Folositi MAJUSCULELE la minimum, intrucat se considera ca tipati;</li><li>Tineti cont ca utilizatorii nostri pot fi de oriunde in lume, si, mai mult ca sigur, vei intalni persoane cu conceptii/credinte/idei diferite. Va rugam sa fiti politicos si respectuos cu aceste persoane;</li><li>Nu adresati insulte altor utilizatori. De fapt, evitati sa folositi injurii si insulte;</li><li>Nu va adresati celorlalti utilizatori pe numele lor reale, chiar daca ii cunoasteti personal. Multi utilizatori nu apreciaza folosirea identitatii reale pe chat-uri. Folositi in schimb poreclele acestora.");

// messages frame
define("L_NO_MSG", "Nu este nici un mesaj ...");
define("L_TODAY_DWN", "De aici incep mesajele trimise astazi");
define("L_TODAY_UP", "De aici incep mesajele trimise ieri");

// ignored popup
define("L_IGNOR_TIT", "Utilizatori Ignorati");
define("L_IGNOR_NON", "Nici un utilizator ignorat");

// whois popup
define("L_WHOIS_ADMIN", "Administrator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_USER", "Utilizator");

// Notification messages of user entrance/exit
define("L_ENTER_ROM", "%s a intrat in camera" . L_ENTER_SND);
define("L_ENTER_ROM_NOSOUND", "%s a intrat in camera");
define("L_EXIT_ROM", "%s a iesit din camera");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s a fost eliminat din camera automat pentru inactivitate");
define("L_CLOSED_ROM", "%s si-a inchis browser-ul");

// Text for /away command notification string:
define("L_AWAY", "%s nu e langa calculator (away)");
define("L_BACK", "%s s-a intors!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Meniu Rapid *****");	//&nbsp; inseamna un spatiu. numarul aceastora ajuta la centrarea titlului listei de comenzi in casuta.

// Topic Banner mod
define("L_TOPIC", " a setat TOPIC-ul: - ");
define("L_TOPIC_RESET", " a resetat TOPIC-ul.");
define("L_HELP_TOP", "minim 2 cuvinte ca TOPIC (tema de discutii)");

// Img cmd mod
define("L_PIC", "Imagine trimisa de");
define("L_PIC_RESIZED", "Redimensionata la");
define("L_HELP_IMG", "calea/link-ul catre imaginea de postat");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s nu este moderator!");
define("L_IS_NO_MOD_ALL", "%s nu mai este moderator in nici una din camerele acestui chat.");
define("L_ERR_IS_ADMIN", "%s este administrator!\\nNu ai dreptul sa-i modifici permisiunile.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra Comenzi instalate:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra Optiuni instalate:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Robotelul nostru este: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "Limbi folosite");
define("L_PRO_2", "Link Favorit 1");
define("L_PRO_3", "Link Favorit 2");
define("L_PRO_4", "Descriere");
define("L_PRO_5", "URL-ul pozei");
define("L_PRO_6", "<a href=".$ChatPath."colorchart.htm onMouseOver=\"window.status='Deschide tabloul HTML de Culori.'; return true\" target=_blank class=ChatLink>Culoarea</a> numelui");

// Avatar mod
define("L_ERR_AV", "Adresa invalida sau host-ul nu este online.");
define("L_TITLE_AV", "Avatarul ales: ");
define("L_CHG_AV", "Apasa 'Schimba' in formularul Profil<br>pentru a-ti salva Avatarul.");
define("L_SEL_NEW_AV", "Selecteaza un nou Avatar");
define("L_EX_AV", "(exemplu: http://mysite/images/mypic.gif):");
define("L_URL_AV", "Adresa: ");
define("L_EXPL_AV", "(Introdu adresa si apasa Enter pentru a vedea poza)");
define("L_CANCEL", "Renunta");
define("L_CLICK", "Schimba:");

// PluceBot bot mod (based on Alice bot)
define("BOT_TIPS", "Sfat: Bot-ul este public activ in aceasta camera. Pentru a-l activa, scrie <b>hello ".C_BOT_NAME.'</b>. Pentru dezactivare, scrie <b>bye '.C_BOT_NAME.'</b>. (privat: /to <b>'.C_BOT_NAME.'</b> Mesaj)');
define("BOT_PRIV_TIPS", "Sfat: Bot-ul este public activ in camera ".$R.". Poti discuta numai privat cu el apasand pe numele sau <b>".C_BOT_NAME."</b>. (comanda: /wisp <b>".C_BOT_NAME."</b> Mesaj)");
define("BOT_PRIVONLY_TIPS", "Sfat: Bot-ul nu este activ public.  Poti discuta numai privat cu el apasand pe numele sau. (comenzile: /to <b>".C_BOT_NAME."</b> Mesaj sau /wisp <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "RoBotelul nu este pornit in aceasta camera!");
define("BOT_START_ERROR", "RoBotelul este deja pornit in aceasta camera!");
define("BOT_DISABLED_ERROR", "RoBotelul a fost dezactivat in Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", " a aruncat zarurile si a obtinut:");
define("DICE_WRONG", "Trebuie sa alegi un numar de zaruri cuprins intre 1 si ".MAX_ROLLS.'.\\nComanda /dice va arunca cu toate '.MAX_ROLLS.' zarurile.');
define("DICE2_WRONG", "A doua valoare trebuie sa fie cuprinsa intre 1 si ".MAX_ROLLS.'.\\nNu o specifica pentru a arunca cu toate '.MAX_ROLLS.' zarurile\\n(ex. /'.MAX_DICES.'d sau /'.MAX_DICES.'d'.MAX_ROLLS.').');
define("DICE2_WRONG1", "Prima valoare trebuie sa fie cuprinsa intre 1 si ".MAX_DICES.'.\\n(ex. /'.MAX_DICES.'d sau /'.MAX_DICES.'d'.MAX_ROLLS.').');
define("DICE3_WRONG", "A doua valoare trebuie sa fie cuprinsa intre 1 si ".MAX_ROLLS.'.\\nNu o specifica pentru a arunca cu toate '.MAX_ROLLS.' zarurile\\n(ex. /d50 or /d100t'.MAX_ROLLS.').');

// Log mod by Ciprian
define("L_ARCHIVE", "Deschide Arhiva");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Foloseste popupuri la mesaje private");
define("L_PRIV_POST_MSG", "Trimite un mesaj privat!");
define("L_PRIV_MSG", "Nou mesaj privat primit!");
define("L_PRIV_MSGS", "mesaje private noi primite!");
define("L_PRIV_MSGSa", "Acestea sunt primele 10 mesaje!<br>Apasa link-ul de jos pentru a vedea restul.");
define("L_PRIV_MSG1", "De la:");
define("L_PRIV_MSG2", "Camera:");
define("L_PRIV_MSG3", "Pentru:");
define("L_PRIV_MSG4", "Mesaj:");
define("L_PRIV_MSG5", "Trimis&nbsp;:");
define("L_PRIV_REPLY", "Raspunde");
define("L_PRIV_READ", "Apasa butonul Close pentru a marca mesajele ca citite!");
define("L_PRIV_POPUP", "Poti dezactiva/reactiva aceste popupuri<br>editandu-ti profilul (numai daca esti inregistrat)");
define("L_NOT_ONLINE", "Utilizatorul %s nu este online acum.");
define("L_PRIV_NOT_ONLINE", "Utilizatorul %s nu este online acum,\\ndar va primi mesajul tau la primul login.");
define("L_PRIV_NOT_INROOM", "Utilizatorul %s nu este in aceasta camera.\\nDaca vrei totusi sa il contactezi,\\nfoloseste comanda: /wisp %s mesaj.");
define("L_PRIV_AWAY", "Utilizatorul %s nu este la calculator,\\ndar va primi mesajul tau la intoarcere.");

// Color Input Box mod by Ciprian
define("L_COLOR", "Culoare:");
define("L_COLOR_HEAD", "Spectrul de Culori");
define("L_COLOR_HELP_LINK", "Citeste Mini-Help - Spectrul de Culori pentru detalii!");
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Activat" : "Dezactivat"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Activat" : "Dezactivat"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Setarile curente ale serverului</u>:<br>a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br>b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Culori implicite</u>: Administrator = <b><SPAN style=\"color:".COLOR_CAFH."\">".COLOR_CA."</SPAN></b>, Moderatori = <b><SPAN style=\"color:".COLOR_CMFH."\">".COLOR_CM."</SPAN></b>, Ceilalti utilizatori = <b><SPAN style=\"color:".COLOR_CDH."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Culoarea implicita</u>: <b><SPAN style=\"color:".COLOR_CDH."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_INFOALL", "<u>Observatie</u>: Datorita <b>setarilor acestui server</b> toti utilizatorii pot folosi orice culoare doresc.");
define("L_COLOR_HEAD_INFOA", "<u>Observatie</u>: Intrucat esti <b>Administrator</b> al acestui server, poti folosi orice culoare doresti.");
define("L_COLOR_HEAD_INFOM", "<u>Observatie</u>: Datorita <b>setarilor acestui server</b> si a statutului de <b>Moderator</b> pe care il detii,<br>culoarea <SPAN style=\"color:".COLOR_CAFH."\"><u>".COLOR_CA."</u></SPAN> nu-ti va fi accesibila in acest tabel si nici pe chat.");
define("L_COLOR_HEAD_INFOU", "<u>Observatie</u>: Datorita <b>setarilor acestui server</b> si a statutului de <b>Utilizator normal</b> pe care il detii,<br>culorile <SPAN style=\"color:".COLOR_CAFH."\"><u>".COLOR_CA."</u></SPAN>, <SPAN style=\"color:".COLOR_CMFH."\"><u>".COLOR_CM."</u></SPAN> si <SPAN style=\"color:".COLOR_CMSH."\"><u>".COLOR_CMS."</u></SPAN> nu-ti vor fi accesibile in acest tabel si nici pe chat.");
define("L_COLOR_HEAD_INFONG", "<u>Observatie</u>: Datorita <b>setarilor acestui server</b> si a statutului de <b>Vizitator</b> (utilizator neinregistrat) pe care il detii, nu-ti va fi accesibila nici o culoare in acest tabel si nici pe chat. Singura culoare este cea implicita: <u>".COLOR_CD."</u>. Pentru a putea folosi tot spectrul, iti sugeram sa te Inregistrezi!");
define("L_COL_HELP_TITLE", "Mini-Help - Spectrul de Culori");
define("L_COL_HELP_SUBTITLE", "- Pagina se va inchide automat dupa 1 minut -");
define("L_COL_HELP_SUB1", "Folosire:");
define("L_COL_HELP_P1", "<SPAN style=\"color:#FF0000\"><b><u>Important</u>:</b></SPAN> toate numele culorilor folosite vor fi scrise in <b\">limba engleza</b>.<br>Introdu numele culorii (ex. <SPAN style=\"color:#C0C0C0\">silver</SPAN>) sau codul hexazecimal corespunzator al culorii (ex. <SPAN style=\"color:#C0C0C0\">#C0C0C0</SPAN> sau <SPAN style=\"color:#C0C0C0\">C0C0C0</SPAN>) si trimite mesajul; aceste valori le puteti gasi si alege mai usor apasand <a onClick=\"window.opener.focus();\"><b>".L_COLOR."</b></a>; aceasta va deschide <a onClick=\"window.opener.focus();\">Minipagina cu Spectrul de Culori</a> (apasand pe link-urile albe, veti putea identifica aceasta pagina).<br>Pentru a deselecta o culoare si a reveni la culoarea implicita, nu trebuie decat sa stergi continutul campului \"<b>".L_COLOR."</b>\".");
define("L_COL_HELP_SUB2", "Sfaturi:");
define("L_COL_HELP_P2", "<u>Spectrul de Culori</u><br>Orice cod Hexazecimal (HEX code) cuprins in gama #000000 (<SPAN style=\"color:#000000\">black</SPAN>) pana la  #FFFFFF (<SPAN style=\"color:#FFFFFF\">white</SPAN>) pot fi folosite. In functie de capabilitatile browserului si sistemului de operare folosit, este posibil ca anumite culori sa nu fie afisate corect (ex. pe calculatoarele foarte vechi).<br>Numai 16 nume de culori sunt recunoscute de browserele mai vechi, care nu suporta decat standardul W3C HTML 4.0. Aceste culori de baza (numite si web-safe) sunt:");
define("L_COL_HELP_P2a", "Daca un utilizator se plange ca nu poate vedea corect culoarea pe care ai selectat-o, inseamna ca probabil foloseste un browser foarte vechi, care nu recunoaste numele culorii tale; daca doresti totusi ca el sa poata vedea culoarea ta favorita, va trebui sa folosesti codul HEX al culorii respective in campul \"<b>".L_COLOR."</b>\".");
define("L_COL_HELP_SUB3", "Culori implicite in acest chat:");
define("L_COL_HELP_P3", "<u>Culori in functie de permisiunile utilizatorului</u>:<br>1. Administratorul poate folosi tot spectrul de culori.<br>Culoarea administratorului este <SPAN style=\"color:".COLOR_CAFH."\">".COLOR_CA."</SPAN>.<br>2. Moderatorii pot folosi orice culoare, mai putin culoarea <SPAN style=\"color:".COLOR_CAFH."\">".COLOR_CA."</SPAN> (inclusiv cuvantul <SPAN style=\"color:".COLOR_CAS."\">\"".COLOR_CAS."\"</SPAN>, care se pare ca returneaza aceeasi culoare <SPAN style=\"color:".COLOR_CAFH."\">".COLOR_CA."</SPAN>).<br>Culoarea moderatorilor este <SPAN style=\"color:".COLOR_CMFH."\">".COLOR_CM."</SPAN>.<br>3. Toti ceilalti utilizatori vor putea folosi orice alta culoare, in afara de <SPAN style=\"color:".COLOR_CAFH."\">".COLOR_CA."</SPAN> si <SPAN style=\"color:".COLOR_CMFH."\">".COLOR_CM."</SPAN>, acestea fiind rezervate la pct. 1 si 2 (inclusiv doua nuante foarte apropiate de <SPAN style=\"color:".COLOR_CAFH."\">".COLOR_CA."</SPAN> si <SPAN style=\"color:".COLOR_CMFH."\">".COLOR_CM."</SPAN> - <SPAN style=\"color:".COLOR_CAS."\">\"".COLOR_CAS."\"</SPAN> si <SPAN style=\"color:".COLOR_CMSH."\">\"".COLOR_CMS."\"</SPAN> - aceasta va ajuta la eliminarea confuziei pe chat).");
define("L_COL_HELP_P3a", "Culoarea implicita este <u><SPAN style=\"color:".COLOR_CDH."\">".COLOR_CD."</SPAN></u>.<br><br><u>Informatii tehnice</u>: Aceste culori au fost definite the administrator in admin panel.<br>Daca ceva nu e in regula sau nu va plac culorile implicite, <b>administratorul</b> este primul pe care ar trebui sa-l contactezi si nu pe ceilalti utilizatori de pe chat. :-)");
define("L_COL_HELP_USER_STATUS", "Statutul tau");
define("L_COL_HELP_SUPP1", "Descarca \"Color Input Box Mod\" complet de la");
define("L_COL_HELP_SUPP2", "Va rugam sa va inregistrati pentru suport ulterior!");
define("L_COL_HELP_CREDITS1", "Multumiri pentru:");
define("L_COL_HELP_CREDITS2", "javascript si integrarea in modul \"Color Input Box\" (de acelasi autor) &");
define("L_COL_HELP_CREDITS3", "versiunea originala HTML</A> a Spectrului de Culori.");
define("L_COL_HELP_THKS", "Multumiri speciale lui Ealdwulf (WizardTales.net) pentru ideea, testele si feedback-ul<br>pe care le-a asigurat pe parcursul dezvoltarii acestui mod!");
define("L_COL_HTML", "Pentru versiunea HTML a acestui Spectru de Culori");
define("L_COL_CLICK", "apasa aici!");
define("L_COL_TUT", "Folosirea culorilor in textul messagelor");
define("L_COL_GO", "Acum poti impresiona pe ceilalti cu noul \"Color Mod\"!");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Numai administratorul poate folosi culoarea ".$C."!\\n(sau codul HEX al acesteia)\\n\\nCuloarea a fost resetata la ".COLOR_CM."!\\n\\nAlege orice alta culoare!");
define("COL_ERROR_BOX_USRA", "Numai administratorul poate folosi culoarea ".$C."!\\n\\nNu incerca sa folosesti ".COLOR_CA.", ".COLOR_CM." sau ".COLOR_CMS."\\n(sau codurile HEX ale acestora)\\nAcestea sunt rezervate altor useri!\\n\\nCuloarea a fost resetata la ".COLOR_CD."!\\n\\nAlege orice alta culoare!");
define("COL_ERROR_BOX_USRM", "Trebuie sa fii moderator pentru a folosi culoarea ".$C."!\\n\\nNu incerca sa folosesti ".COLOR_CA.", ".COLOR_CM." sau ".COLOR_CMS."\\n(sau codurile HEX ale acestora)\\nAcestea sunt rezervate altor useri!\\n\\nCuloarea a fost resetata la ".COLOR_CD."!\\n\\nAlege orice alta culoare!");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","utilizatori sunt ".LOGIN_LINK."pe chat</A></td></tr>");
define("USERS_LOGIN","1 utilizator este ".LOGIN_LINK."pe chat</A></td></tr>");
define("NO_USER","Nimeni nu este ".LOGIN_LINK." pe chat</A></td></tr>");

//Welcome message to be displayed on login
define('WELCOME_MSG', "Bun venit pe chat-ul nostru! Va rugam sa nu folositi expresii nepoliticoase, <I>pentru o ambianta cat mai placuta</I>.");

//PM control by Ciprian
define('PM_DISABLED_ERROR', "Mesageria privata este\\ndezactivata in acest chat.");

//Size command error by Ciprian
define('L_ERR_SIZE', "Dimensiunea fontului poate fi doar\\nnula (pentru resetare) sau cuprinsa intre 7 si 15");
?>