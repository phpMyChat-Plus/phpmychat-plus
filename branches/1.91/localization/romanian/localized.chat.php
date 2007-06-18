<?php
// File : romanian/localized.chat.php - plus version (27.05.2007 - rev.19)
// Original translation started by Radu Swider <swidera@satline.ro>, first updated by Ciprian Popovici-Oana <floppy@kermit.cs.pub.ro>
// Corrected, finalized, diacritics addition and updated to Plus version by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";
require("localized.chatjs.php");

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Mesajele se &#351;terg dup&#259");
define("L_WEL_2", "iar utilizatorii inactivi dup&#259");

define("L_CUR_1", "Acum");
define("L_CUR_1a", "sunt");
define("L_CUR_1b", "este");
define("L_CUR_2", "pe chat");
define("L_CUR_3", "Utilizatori afla&#355;i &icirc;n camere de chat");
define("L_CUR_4", "utilizatori &icirc;n camere private");
define("L_CUR_5", "Utilizatori care monitorizeaz&#259<br />aceast&#259 pagin&#259 (spectatori):");

define("L_SET_1", "Introdu-&#355;i datele...");
define("L_SET_2", "Porecla");
define("L_SET_3", "num&#259rul de mesaje de afi&#351;at");
define("L_SET_4", "timpul de actualizare");
define("L_SET_5", "Selecteaz&#259 o camer&#259 de chat...");
define("L_SET_6", "Camere disponibile");
define("L_SET_7", "Alege&#355;i ...");
define("L_SET_8", "Camere publice create de utilizatori");
define("L_SET_9", "Creeaz&#259-&#355;i camera ta");
define("L_SET_10", "public&#259");
define("L_SET_11", "privat&#259");
define("L_SET_12", "");
define("L_SET_13", "Apoi intr&#259 pe");
define("L_SET_14", "chat");
define("L_SET_15", "Camere private disponibile");
define("L_SET_16", "Camere private create de utilizatori");
define("L_SET_17", "Alege-&#355;i un avatar");
define("L_SET_18", "Adaug&#259 &icirc;n Favorite: apas&#259 \"CTRL +D\".");

define("L_SRC", "este disponibil gratuit de la");

define("L_SECS", "secunde");
define("L_MIN", "minut");
define("L_MINS", "minute");
define("L_HOUR", "or&#259");
define("L_HOURS", "ore");

// registration stuff:
define("L_REG_1", "Parola");
define("L_REG_2", "Configurare date cont / Administrare set&#259ri");
define("L_REG_3", "&Icirc;nregistrare");
define("L_REG_4", "Editare profil");
define("L_REG_5", "&#350;tergere utilizator");
define("L_REG_6", "&Icirc;nregistrare utilizator");
define("L_REG_7", "numai dac&#259 e&#351;ti deja &icirc;nregistrat");
define("L_REG_8", "Email-ul t&#259u");
define("L_REG_9", "Ai fost &icirc;nregistrat cu succes.");
define("L_REG_10", "&Icirc;napoi");
define("L_REG_11", "Modificare");
define("L_REG_12", "Modific&#259 datele despre utilizator");
define("L_REG_13", "&#350;terge utilizator");
define("L_REG_14", "Login");
define("L_REG_15", "Intr&#259");
define("L_REG_16", "Schimb&#259");
define("L_REG_17", "Datele tale au fost modificate cu succes.");
define("L_REG_18", "Ai fost dat afar&#259 din camer&#259 de c&#259tre un moderator al acestui chat.");
define("L_REG_18a", "Ai fost dat afar&#259 din camer&#259 de c&#259tre un moderator al acestui chat.<br />Motivul: %s");
define("L_REG_19", "Chiar vrei s&#259 fii &#351;ters?");
define("L_REG_20", "Da");
define("L_REG_21", "Ai fost &#351;ters cu succes.");
define("L_REG_22", "Nu");
define("L_REG_25", "&Icirc;nchide");
define("L_REG_30", "Prenumele");
define("L_REG_31", "Numele");
define("L_REG_32", "WEB");
define("L_REG_33", "Arat&#259 e-mailul la comanda /whois");
define("L_REG_34", "Editare profil");
define("L_REG_35", "Administrare");
define("L_REG_36", "Localitatea, &#355;ara");
define("L_REG_37", "C&acirc;mpurile care con&#355;in <span class=\"error\">*</span> <b>trebuiesc</b> completate.");
define("L_REG_39", "Camera &icirc;n care te aflai a fost cur&#259&#355;at&#259 de administrator.");
define("L_REG_45", "Sex");
define("L_REG_46", "Masculin");
define("L_REG_47", "Feminin");
define("L_REG_48", "Nespecificat");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Acestea sunt datele tale pentru a te loga la chat");
define("L_EMAIL_VAL_2", "Bun venit pe serverul nostru de chat!");
define("L_EMAIL_VAL_Err", "Eroare intern&#259, te rug&#259m s&#259 contactezi administratorul: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Parola a fost trimis&#259 la adresa de e-mail aleas&#259 de tine.");

// admin stuff
define("L_ADM_1", "%s nu mai este moderator al acestei camere.");
define("L_ADM_2", "Nu mai e&#351;ti &icirc;nregistrat.");

//error messages
define("L_ERR_USR_1", "Acest nume este folosit deja. Alege-&#355;i altul.");
define("L_ERR_USR_2", "Trebuie s&#259-&#355;i alegi un nume.");
define("L_ERR_USR_3", "Acest nume este deja &icirc;nregistrat.<br />Introdu parola sau alege o alt&#259 porecl&#259.");
define("L_ERR_USR_4", "Ai scris o parol&#259 incorect&#259.");
define("L_ERR_USR_5", "Trebuie s&#259 scrii numele.");
define("L_ERR_USR_6", "Trebuie s&#259 scrii parola.");
define("L_ERR_USR_7", "Trebuie s&#259 scrii adresa ta de e-mail.");
define("L_ERR_USR_8", "Trebuie s&#259 scrii o adresa de e-mail corect&#259.");
define("L_ERR_USR_9", "Acest nume este deja folosit.");
define("L_ERR_USR_10", "Nume sau parol&#259 incorecte.");
define("L_ERR_USR_12", "E&#351;ti administrator, nu po&#355;i fi &#351;ters.");
define("L_ERR_USR_14", "Trebuie s&#259 fii &icirc;nregistrat &icirc;nainte de a intra pe chat.");
define("L_ERR_USR_15", "Trebuie s&#259 scrii numele complet.");
define("L_ERR_USR_16a", "Numai aceste extra-caractere sunt permise:<br />".$REG_CHARS_ALLOWED."<br />Spa&#355;ii, virgule sau backslash-uri (\\) nu sunt permise. Verific&#259 sintaxa!");
define("L_ERR_USR_18", "Cuv&acirc;nt interzis folosit &icirc;n cadrul poreclei.");
define("L_ERR_USR_20", "Ai fost blocat din aceast&#259 camer&#259 sau de pe chat.");
define("L_ERR_USR_20a", "Ai fost blocat din aceast&#259 camer&#259 sau de pe chat.<br />Motivul: %s");
define("L_ERR_USR_21", "Nu ai fost activ &icirc;n ultimele ".C_USR_DEL." minute,<br />de aceea ai fost eliminat din camer&#259.");
define("L_ERR_USR_23", "Trebuie s&#259 fii &icirc;nregistrat &icirc;nainte de a intra &icirc;n camere private.");
define("L_ERR_USR_24", "Trebuie s&#259 fii &icirc;nregistrat &icirc;nainte de a crea camere proprii.");
define("L_ERR_USR_25", "Numai administratorul poate folosi culoarea ".$COLORNAME."!<br />Nu &icirc;ncerca s&#259 folose&#351;ti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1.".<br />Acestea sunt rezervate utilizatorilor speciali!");
define("L_ERR_USR_26", "Numai administratorii sau moderatorii pot folosi culoarea ".$COLORNAME."!<br />Nu &icirc;ncerca s&#259 folose&#351;ti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />Acestea sunt rezervate utilizatorilor speciali!");

// users frame or popup
define("L_EXIT", "Ie&#351;ire");
define("L_DETACH", "Deta&#351;eaz&#259 lista de utilizatori");
define("L_EXPCOL_ALL", "Extinde/Comprim&#259 tot");
define("L_CONN_STATE", "Ref&#259 starea conexiunii");
define("L_CHAT", "Chat");
define("L_USER", "utilizator");
define("L_USERS", "utilizatori");
define("L_LURKER", "spectator");
define("L_LURKERS", "spectatori");
define("L_NO_USER", "Nici un utilizator");
define("L_ROOM", "camer&#259");
define("L_ROOMS", "camere");
define("L_EXPCOL", "Extinde/Comprim&#259 camera");
define("L_BEEP", "Cu/f&#259r&#259 sunet la intrarea utilizatorilor &icirc;n camer&#259");
define("L_PROFILE", "Arat&#259 profilul");
define("L_NO_PROFILE", "F&#259r&#259 profil");

// input frame
define("L_HLP", "Ajutor");
define("L_MODERATOR", "%s a fost promovat moderator al acestei camere.");
define("L_KICKED", "%s a fost dat afar&#259!");
define("L_KICKED_REASON", "%s a fost dat afar&#259! (Motivul: %s)");
define("L_BANISHED", "%s a fost blocat cu succes.");
define("L_BANISHED_REASON", "%s a fost blocat cu succes. (Motivul: %s)");
define("L_ANNOUNCE", "ANUN&#354;");
define("L_INVITE", "%s te invit&#259 s&#259 intri cu el/ea &icirc;n camera <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a>.");
define("L_INVITE_REG", " Trebuie s&#259 fii &icirc;nregistrat pentru a intra &icirc;n aceast&#259 camer&#259.");
define("L_INVITE_DONE", "Invita&#355;ia a fost trimis&#259 lui %s.");
define("L_OK", "Trimite");
define("L_BUZZ", "Galerie Buzz-uri");

// help popup
define("L_HELP_TIT_1", "Emo&#355;ii");
define("L_HELP_TIT_2", "Formatarea textului pentru mesaje");
define("L_HELP_FMT_1", "Textul poate fi &icirc;ngro&#351;at (bold), &icirc;nclinat (italic) sau subliniat (underline), prin simpla sa &icirc;ncadrare &icirc;ntre cuvintele cheie &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; sau &lt;U&gt; &lt;/U&gt;<br />Exemplu, &lt;B&gt;acest text&lt;/B&gt; va produce <B>acest text</B>.");
define("L_HELP_FMT_2", "Pentru a crea un hyperlink (pentru e-mail sau pagina www) &icirc;n mesajul t&#259u, tasteaz&#259 pur &#351;i simplu adresa corespunz&#259toare. Hyperlink-ul va fi creat automat.");
define("L_HELP_TIT_3", "Comenzi");
define("L_HELP_NOTE", "Toate comenzile se vor folosi obligatoriu &icirc;n limba englez&#259!");
define("L_HELP_USR", "utilizator");
define("L_HELP_MSG", "mesaj");
define("L_HELP_ROOM", "camer&#259");
define("L_HELP_BUZZ", "~numesunet");
define("L_HELP_REASON", "motivul");
define("L_HELP_CMD_0", "{} obligatoriu, [] op&#355;ional.");
define("L_HELP_CMD_1a", "Stabile&#351;te c&acirc;te mesaje s&#259 fie ar&#259tate (minim 5).");
define("L_HELP_CMD_1b", "Re&icirc;ncarc&#259 fereastra cu mesaje &#351;i afi&#351;eaz&#259 ultimele n mesaje (implicit sunt minim 5).");
define("L_HELP_CMD_2a", "Modific&#259 timpul de reactualizare (refresh) a mesajelor (in secunde).<br />Dac&#259 n nu este specificat sau este mai mic dec&acirc;t 3, comanda va seta &icirc;ntre reactualizare la 10 secunde sau deloc.");
define("L_HELP_CMD_2b", "Modific&#259 timpul de reactualizare (refresh) a mesajelor &#351;i listei de utilizatori (in secunde).<br />Dac&#259 n nu este specificat sau este mai mic dec&acirc;t 3, comanda va seta &icirc;ntre reactualizare la 10 secunde sau deloc.");
define("L_HELP_CMD_3", "Schimb&#259 ordinea mesajelor (nu &icirc;n toate browser-ele).");
define("L_HELP_CMD_4", "Intr&#259 &icirc;n alt&#259 camera; dac&#259 aceast&#259 camer&#259 nu exista &#351;i ai dreptul (din set&#259ri) o po&#355;i crea.<br />Utilizare: n este 0 pentru camere private &#351;i 1 pentru camere publice. Dac&#259 n nu este specificat, valoarea sa implicit&#259 este 1.");
define("L_HELP_CMD_5", "P&#259r&#259se&#351;te chat-ul dup&#259 ce ai scris un mesaj op&#355;ional.");
define("L_HELP_CMD_6", "Ignor&#259 mesaje de la utilizatorul a c&#259rui porecl&#259 este specificat&#259.<br />F&#259r&#259 nici o op&#355;iune, va ap&#259rea o fereastr&#259 care va afi&#351;a to&#355;i utilizatorii ignora&#355;i de tine.");
define("L_HELP_CMD_7", "Recheam&#259 textul introdus anterior (comand&#259 sau mesaj).");
define("L_HELP_CMD_8", "Arat&#259/Ascunde timpul din fa&#355;a mesajelor.");
define("L_HELP_CMD_9", "Expulzeaz&#259 utilizatori din chat. Aceast&#259 comand&#259 poate fi dat&#259 numai de un moderator al camerei sau de un administrator.<br />Op&#355;ional, [".L_HELP_REASON."] va ar&#259ta &#351;i motivul elimin&#259rii (orice fraz&#259).");
define("L_HELP_CMD_10", "Trimite un mesaj privat c&#259tre utilizatorul specificat (al&#355;i utilizatori nu vor vedea mesajul).");
define("L_HELP_CMD_11", "Arat&#259 informa&#355;ii despre utilizatorul specificat.");
define("L_HELP_CMD_12", "Afi&#351;eaz&#259 o fereastr&#259 pentru editarea profilului utilizatorului.");
define("L_HELP_CMD_13", "Te anun&#355;&#259 dac&#259 un utilizator a intrat/ie&#351;it &icirc;n/din camer&#259.");
define("L_HELP_CMD_14", "Permite administratorului sau moderatorului camerei curente s&#259 promoveze ca moderator pentru aceea&#351;i camer&#259 un alt utilizator &icirc;nregistrat.");
define("L_HELP_CMD_15", "Cura&#355;&#259 ecranul de mesaje &#351;i le arat&#259 doar pe ultimele 5.");
define("L_HELP_CMD_16", "Salveaz&#259 ultimele n mesaje (mai pu&#355;in anun&#355;urile) &icirc;ntr-un fi&#351;ier HTML. Dac&#259 n nu este specificat, vor fi salvate toate mesajele existente.");
define("L_HELP_CMD_17", "Permite administratorului s&#259 trimit&#259 un anun&#355; tuturor utilizatorilor, indiferent de camera &icirc;n care se afl&#259.");
define("L_HELP_CMD_18", "Invit&#259 un utilizator din alt&#259 camera s&#259 intre &icirc;n camera ta.");
define("L_HELP_CMD_19", "Permite moderatorului(ilor) unei camere sau administratorului s&#259 \"blocheze\" un utilizator, pe o durat&#259 stabilit&#259 de admin prin set&#259rile serverului.<br />Administratorul poate bloca un utilizator aflat &icirc;n oricare dintre camere &#351;i poate folosi setarea'<B>&nbsp;*&nbsp;</B>' pentru a bloca \"definitiv\" utilizatorul respectiv pe acest server de chat.<br />Op&#355;ional, [".L_HELP_REASON."] va ar&#259ta &#351;i motivul bloc&#259rii (orice fraz&#259)");
define("L_HELP_CMD_20", "Descrie cu ce te ocupi, ca un anun&#355; &icirc;n camer&#259 (ex. Porecla MEA m&#259n&acirc;nc&#259 &#351;i urm&#259re&#351;te &#351;tirile ProTV).");
define("L_HELP_CMD_21", "Anun&#355;&#259 camera &#351;i utilizatorii care vor s&#259 &icirc;&#355;i trimit&#259 mesaje<br />c&#259 nu mai e&#351;ti l&acirc;ng&#259 calculator. Ca s&#259 te &icirc;ntorci la chat, &icirc;ncepe doar s&#259 scrii. Op&#355;ional, po&#355;i l&#259sa &#351;i un mesaj cu motivul plec&#259rii de la calculator");
define("L_HELP_CMD_22", "Trimite un semnal sonor tip Buzz pentru captarea aten&#355;iei celorlal&#355;i. Nu abuza de aceast&#259 comand&#259!<br />- Folosire:<br />- anterior: \"/buzz\" or \"/buzz mesaj de ar&#259tat\" - aceasta trimite sunetul implicit definit &icirc;n Panoul Admin;<br />- extindere: \"/buzz ~numesunet\" sau \"/buzz ~numesunet mesaj de ar&#259tat\" - aceasta trimite sunetul fi&#351;ierului numesunet.wav aflat &icirc;n directorul plus/sounds; semnul \"~\" trebuie folosit &icirc;naintea celui de-al doilea cuv&acirc;nt, care reprezint&#259 numele fi&#351;ierului sunetului, f&#259r&#259 extensia .wav (numai extensiile .wav sunt permise).<br />Implicit, aceast&#259 comand&#259 poate fi folosit&#259 numai de moderatori/administratori.");
define("L_HELP_CMD_23", "Trimite un mesaj privat tip \"whisper\" (&#351;oapt&#259). Mesajul va ajunge la destinatar, &icirc;n orice camer&#259 s-ar afla acesta. &Icirc;n cazul &icirc;n care utilizatorul c&#259utat nu este on-line, vei fi &icirc;n&#351;tiin&#355;at.");
define("L_HELP_CMD_24", "Comanda schimb&#259 topicul (tema de discu&#355;ii) camerei &icirc;n care este folosit&#259. &Icirc;ncerca&#355;i s&#259 nu suprascrie&#355;i temele altor utilizatori &#351;i s&#259 folosi&#355;i teme care merit&#259 afi&#351;ate.<br />Folosind comanda \"/topic top reset\" tema curent&#259 afi&#351;at&#259 va fi &#351;tears&#259 &#351;i resetat&#259 la tema implicit&#259 a camerei.<br />&Icirc;n mod implicit, aceast&#259 comand&#259 poate fi folosit&#259 doar de moderatori.<br />Aten&#355;ie: tema de discu&#355;ii trebuie s&#259 con&#355;in&#259 cel pu&#355;in 2 cuvinte.<br />Op&#355;ional, \"/topic * {}\" face acelea&#351;i lucruri dar pentru toate camerele simultan (tem&#259 global&#259 &#351;i resetare tem&#259 global&#259).");
define("L_HELP_CMD_25", "Un joc cu zaruri pentru plictiseal&#259 sau trageri la sor&#355;i.<br />Utilizare: /dice sau /dice [n]; n este op&#355;ional &#351;i reprezint&#259 num&#259rul de zaruri din man&#259. Poate avea orice valoare &icirc;ntre 1 &#351;i num&#259rul maxim de zaruri setat (6). Comanda f&#259r&#259 n va arunca num&#259rul maxim de zaruri (6).");
define("L_HELP_CMD_26", "Versiunea mai dezvoltat&#259 a comenzii /dice.<br />Utilizare: /[n1]d[n2] sau /[n1]d;<br />n1 poate avea orice valoare <b>&icirc;ntre 1 &#351;i 9</b> (reprezint&#259 num&#259rul de arunc&#259ri);<br />n2 este o valoare &icirc;ntre 1 &#351;i num&#259rul maxim de zaruri setat (6) (reprezint&#259 num&#259rul de zaruri aruncate). Comanda f&#259r&#259 n2 va arunca la fiecare m&acirc;n&#259 cu num&#259rul maxim de zaruri (6).");
define("L_HELP_CMD_27", "Eviden&#355;iaz&#259 mesajele trimise de un anumit utilizator, pentru a-l distinge mai u&#351;or &icirc;n cadrul conversa&#355;iilor.<br />Utilizare: /high {utilizator} sau apas&#259 pe p&#259tr&#259&#355;elul alb/galben cu litera H din dreapta numelui, &icirc;n lista de camere/utilizatori.");
define("L_HELP_CMD_28", "Permite postarea <b>unei imagini</b> &icirc;n loc de mesaj.<br />Utilizare: Introduce&#355;i link-ul complet! (ex. <b>/img http://ciprianmp.com/images/CIPRIAN.jpg</b>). Extensii recunoscute &#351;i acceptate: .jpg .bmp .gif. Aten&#355;ie la literele mari &#351;i mici - conteaz&#259.");
define("L_HELP_CMD_29", "Cea de a doua comand&#259 permite administratorului sau moderatorului(ilor) din camera curent&#259 s&#259 destituie un alt moderator din camer&#259 la statusul normal de utilizator &icirc;nregistrat.<br />Op&#355;iunea * va destitui respectivul utilizator din toate camerele.");
define("L_HELP_CMD_30", "Cea de a doua comand&#259 face acela&#351;i lucru ca &#351;i /me, numai c&#259 va arata &#351;i genul corespunz&#259tor<br />Exemplu * Mr Ciprian urm&#259re&#351;te &#351;tirile ProTV sau Mrs Dana este super fericit&#259.");
define("L_HELP_CMD_31", "Schimb&#259 ordinea sort&#259rii utilizatorilor &icirc;n liste: dup&#259 momentul log&#259rii sau alfabetic.");
define("L_HELP_CMD_32", "Aceasta este a treia versiune de joc de zaruri (roleplaying).<br />Utilizare: /d{n1}[tn2] sau /d{n1};<br />n1 poate avea orice valoare <b>&icirc;ntre 1 &#351;i 100</b> (reprezint&#259 num&#259rul de puncte ale fiec&#259rui zar).<br />n2 poate avea orice valoare <b>&icirc;ntre 1 &#351;i %s</b> (reprezint&#259 num&#259rul de zaruri aruncate).");
define("L_HELP_CMD_33", "Schimb&#259 dimensiunea textului mesajelor pe chat (valori permise pentru n: <b>&icirc;ntre 7 &#351;i 15</b>); comanda /size reseteaz&#259 dimensiunea fontului la valoarea implicit&#259 (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Eticheta Chat-ului");
define("L_HELP_ETIQ_2", "Site-ul nostru dore&#351;te s&#259 p&#259streze o ambian&#355;&#259 pl&#259cut&#259 &#351;i prietenoas&#259, a&#351;a c&#259 v&#259 rug&#259m s&#259 adera&#355;i la urm&#259toarele reguli. Pentru nerespectarea acestor reguli, unul dintre moderatori ar putea s&#259 v&#259 elimine din chat.<br /><br />Mul&#355;umim,");
define("L_HELP_ETIQ_3", "Regulile Etichetei acestui Chat");
define("L_HELP_ETIQ_4", "Nu face&#355;i &quot;spam&quot; pe chat post&acirc;nd non-sensuri sau litere alandala.</li>
<li>Nu folosi&#355;i caractere aLtErnAnte.</li>
<li>Folosi&#355;i MAJUSCULELE la minimum, &icirc;ntruc&acirc;t se consider&#259 c&#259 &#355;ipa&#355;i.</li>
<li>&#354;ine&#355;i cont c&#259 utilizatorii no&#351;tri pot fi de oriunde &icirc;n lume, &#351;i, mai mult ca sigur, ve&#355;i &icirc;nt&acirc;lni persoane cu concep&#355;ii/credin&#355;e/idei diferite. V&#259 rug&#259m s&#259 fi&#355;i politicos &#351;i respectuos cu aceste persoane.</li>
<li>Nu adresa&#355;i insulte altor utilizatori. De fapt, este interzis s&#259 folosi&#355;i injurii &#351;i insulte.</li>
<li>Nu v&#259 adresa&#355;i celorlal&#355;i utilizatori pe numele lor reale, chiar dac&#259 &icirc;i cunoa&#351;te&#355;i personal. Mul&#355;i utilizatori nu apreciaz&#259 folosirea identit&#259&#355;ii reale pe chat-uri. Folosi&#355;i &icirc;n schimb poreclele acestora (nicknames).");

// messages frame
define("L_NO_MSG", "Nu este nici un mesaj ...");
define("L_TODAY_DWN", "De aici &icirc;ncep mesajele trimise ast&#259zi");
define("L_TODAY_UP", "De aici &icirc;ncep mesajele trimise ieri");

// message colors
$TextColors = array("Negru" => "#000000",
										"Ro&#351;u" => "#FF0000",
										"Verde" => "#009900",
										"Albastru" => "#0000FF",
										"Mov" => "#9900FF",
										"Ro&#351;u &icirc;nchis" => "#990000",
										"Verde &icirc;nchis" => "#006600",
										"Albastru &icirc;nchis" => "#000099",
										"Maro" => "#996633",
										"Albastru deschis" => "#006699",
										"Portocaliu" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Utilizatori Ignora&#355;i");
define("L_IGNOR_NON", "Nici un utilizator ignorat");

// whois popup
define("L_WHOIS_ADMIN", "Administrator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_USER", "Utilizator");
define("L_WHOIS_GUEST", "Vizitator");
define("L_WHOIS_REG", "&Icirc;nregistrat");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s a intrat &icirc;n camer&#259" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s a intrat &icirc;n camer&#259");
define("L_ENTER_ROM_NOSOUND", "%s a intrat &icirc;n camer&#259");
define("L_EXIT_ROM", "%s a ie&#351;it din camer&#259");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s a fost eliminat automat din camer&#259 pentru inactivitate");
define("L_CLOSED_ROM", "%s &#351;i-a &icirc;nchis browser-ul");

// Text for /away command notification string:
define("L_AWAY", "%s nu mai e l&acirc;ng&#259 calculator...");
define("L_BACK", "%s s-a &icirc;ntors!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Meniu Rapid *****");	//&nbsp; &icirc;nseamn&#259 un spa&#355;iu. num&#259rul acestora ajuta la centrarea titlului listei de comenzi &icirc;n c&#259su&#355;&#259.

// Topic Banner mod
define("L_TOPIC", "a setat TOPIC-ul:");
define("L_TOPIC_RESET", "a resetat TOPIC-ul");
define("L_HELP_TOP", "minim 2 cuvinte ca TOPIC (tem&#259 de discu&#355;ii)");

// Img cmd mod
define("L_PIC", "Imagine trimis&#259 de");
define("L_PIC_RESIZED", "Redimensionat&#259 la");
define("L_HELP_IMG", "calea/link-ul c&#259tre imaginea de postat");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s nu este moderator!");
define("L_ERR_IS_ADMIN", "%s este administrator!\\nNu ai dreptul sa-i modifici permisiunile.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra Comenzi instalate:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra Op&#355;iuni instalate:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">RoBo&#355;elul nostru este: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "Limbi folosite");
define("L_PRO_2", "Link Favorit 1");
define("L_PRO_3", "Link Favorit 2");
define("L_PRO_4", "Descriere");
define("L_PRO_5", "URL-ul pozei");
define("L_PRO_6", "Culoare nume/text");

// Avatar mod
define("L_ERR_AV", "Adresa invalid&#259 sau host-ul nu este online.");
define("L_TITLE_AV", "Avatarul ales: ");
define("L_CHG_AV", "Apas&#259 'Schimb&#259' &icirc;n formularul Profil<br />pentru a-&#355;i salva Avatarul.");
define("L_SEL_NEW_AV", "Selecteaz&#259 un nou Avatar");
define("L_EX_AV", "(exemplu: http://mysite/images/mypic.gif):");
define("L_URL_AV", "Adresa: ");
define("L_EXPL_AV", "(Introdu adresa &#351;i apas&#259 Enter pentru a vedea poza)");
define("L_CANCEL", "Renun&#355;&#259");
define("L_CLICK", "Apas&#259 aici");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "Sfat: Bot-ul este activ public &icirc;n aceast&#259 camera. Pentru a-i vorbi, scrie <b>hello ".C_BOT_NAME.'</b>. Pentru a-l opri, scrie <b>bye '.C_BOT_NAME.'</b>. (privat: /to <b>'.C_BOT_NAME.'</b> Mesaj)'); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "Sfat: Bot-ul este activ public &icirc;n camera %s. Po&#355;i discuta numai privat cu el ap&#259s&acirc;nd pe numele s&#259u <b>".C_BOT_NAME."</b>. (comanda: /wisp <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "Sfat: Bot-ul nu este activ public.  Po&#355;i discuta numai privat cu el ap&#259s&acirc;nd pe numele s&#259u. (comenzile: /to <b>".C_BOT_NAME."</b> Mesaj sau /wisp <b>".C_BOT_NAME."</b> Mesaj)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "a aruncat zarurile &#351;i a ob&#355;inut:");

// Log mod by Ciprian
define("L_ARCHIVE", "Deschide Arhiva");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Folose&#351;te popup-uri la mesaje private");
define("L_PRIV_POST_MSG", "Trimite un mesaj privat!");
define("L_PRIV_MSG", "Nou mesaj privat primit!");
define("L_PRIV_MSGS", "mesaje private noi primite!");
define("L_PRIV_MSGSa", "Acestea sunt primele 10 mesaje!<br />Apas&#259 link-ul de jos pentru a vedea restul.");
define("L_PRIV_MSG1", "De la:");
define("L_PRIV_MSG2", "Camera:");
define("L_PRIV_MSG3", "Pentru:");
define("L_PRIV_MSG4", "Mesaj:");
define("L_PRIV_MSG5", "Trimis:");
define("L_PRIV_REPLY", "R&#259spunde");
define("L_PRIV_READ", "Apas&#259 butonul Close pentru a marca mesajele ca citite!");
define("L_PRIV_POPUP", "Po&#355;i dezactiva/reactiva aceste popup-uri<br />edit&acirc;ndu-&#355;i <a href=\"#\" onClick=\"window.parent.runCmd('profile',''); return false;\" onMouseOver=\"window.status='Change your settings.'; return true\">Profilul</a> (numai dac&#259 e&#351;ti &icirc;nregistrat)");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Activat" : "Dezactivat"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Activat" : "Dezactivat"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Set&#259rile curente ale serverului</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Culori implicite</u>: Administrator = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderatori = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Ceilal&#355;i utilizatori = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Culoarea implicit&#259</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Spectrul de Culori");
define("L_COL_HELP_SUB1", "Folosire:");
define("L_COL_HELP_P1", "Po&#355;i s&#259-&#355;i define&#351;ti culoarea ta favorit&#259 edit&acirc;ndu-&#355;i profilul (aceea&#351;i cu culoarea numelui). Vei putea totu&#351;i s&#259 folose&#351;ti &#351;i celelalte culori. Pentru a reveni la culoarea favorit&#259 dup&#259 ce ai folosit una oarecare din list&#259, va trebui s&#259 selectezi m&#259car o dat&#259 culoarea implicit&#259 (Null) - este prima din lista de culori.");
define("L_COL_HELP_SUB2", "Sfaturi:");
define("L_COL_HELP_P2", "<u>Spectrul de Culori</u><br />&Icirc;n func&#355;ie de capabilit&#259&#355;ile browser-ului &#351;i sistemului de operare folosit, este posibil ca anumite culori s&#259 nu fie afi&#351;ate corect (ex. pe calculatoarele foarte vechi). Numai 16 nume de culori sunt recunoscute de browserele mai vechi, care nu suporta dec&acirc;t standardul W3C HTML 4.0. Aceste culori de baz&#259 (numite &#351;i web-safe) sunt:");
define("L_COL_HELP_P2a", "Dac&#259 un utilizator se pl&acirc;nge c&#259 nu poate vedea corect culoarea pe care ai selectat-o, &icirc;nseamn&#259 c&#259 probabil folose&#351;te un browser foarte vechi, care nu recunoa&#351;te numele culorii tale.");
define("L_COL_HELP_SUB3", "Culori implicite &icirc;n acest chat:");
define("L_COL_HELP_P3", "<u>Culori &icirc;n func&#355;ie de permisiunile utilizatorului</u>:<br />1. Administratorul poate folosi tot spectrul de culori.<br />Culoarea administratorului este <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderatorii pot folosi orice culoare, &icirc;n afar&#259 de <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> &#351;i <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />Culoarea moderatorilor este <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. To&#355;i ceilal&#355;i utilizatori vor putea folosi orice alt&#259 culoare, &icirc;n afar&#259 de <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> &#351;i <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Culoarea implicit&#259 este <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Informa&#355;ii tehnice</u>: Aceste culori au fost definite de c&#259tre administrator &icirc;n admin panel.<br />Dac&#259 ceva nu e &icirc;n regul&#259 sau nu v&#259 plac culorile implicite, <b>administratorul</b> este primul pe care ar trebui s&#259-l contacta&#355;i &#351;i nu pe ceilal&#355;i utilizatori de pe chat. :-)");
define("L_COL_HELP_USER_STATUS", "Statutul t&#259u");
define("L_COL_TUT", "Folosirea culorilor &icirc;n textul mesajelor");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","utilizatori sunt ".LOGIN_LINK."pe chat</A></td></tr>");
define("USERS_LOGIN","1 utilizator este ".LOGIN_LINK."pe chat</A></td></tr>");
define("NO_USER","Nimeni nu este ".LOGIN_LINK." pe chat</A></td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Bun venit pe chat-ul nostru! V&#259 rug&#259m s&#259 nu folosi&#355;i expresii nepoliticoase, <I>pentru o ambian&#355;&#259 c&acirc;t mai pl&#259cut&#259</I>." . L_ENTER_SND);
else define("WELCOME_MSG", "Bun venit pe chat-ul nostru! V&#259 rug&#259m s&#259 nu folosi&#355;i expresii nepoliticoase, <I>pentru o ambian&#355;&#259 c&acirc;t mai pl&#259cut&#259</I>.");
define("WELCOME_MSG_NOSOUND", "Bun venit pe chat-ul nostru! V&#259 rug&#259m s&#259 nu folosi&#355;i expresii nepoliticoase, <I>pentru o ambian&#355;&#259 c&acirc;t mai pl&#259cut&#259</I>.");

// Send alert to users &icirc;n chat when important settings are changed &icirc;n admin panel
define("L_RELOAD_CHAT", "Set&#259rile serverului de chat tocmai au fost modificate. Pentru o bun&#259 func&#355;ionare, trebuie s&#259 re&icirc;nc&#259rca&#355;i chat-ul (ap&#259sa&#355;i tasta F5 sau Ie&#351;ire &#351;i reintra&#355;i pe chat).");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Alte Op&#355;iuni");
?>