<?php
// File : italian/localized.chat.php - plus version (27.05.2007 - rev.19)
// Original translation by Andrea D'Alessandro <andrea@abol.it> & Massimo Fubini <massimo@tomato.it>
//	& Giuliano Yurij Beccaria <yurij@e-pages.it> & Marco Borrini <borrini@tradimento.it>
// & Bartolotta Gioachino <developers@rockitalia.com> & Silvia M. Carrassi <silvia@ladysilvia.net>
// Updates, corrections and additions for the Plus version by Mike Mikius <mikiusss@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for Charset
$Charset = "utf-8";
require("localized.chatjs.php");

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Guida");

define("L_WEL_1", "I messaggi verranno cancellati dopo");
define("L_WEL_2", "e gli utenti inattivi dopo");

define("L_CUR_1", "Nella chat");
define("L_CUR_1a", "ora ci sono");
define("L_CUR_1b", "ora c&#39;e");
define("L_CUR_2", "online");
define("L_CUR_3", "Utenti attualmente nelle chat pubbliche");
define("L_CUR_4", "Utenti nelle aree private");
define("L_CUR_5", "Utenti attualmente che visionano <br />(monitorando questa pagina):");

define("L_SET_1", "Inserisci ...");
define("L_SET_2", "Nome utente");
define("L_SET_3", "Numero massimo di messaggi da visualizzare");
define("L_SET_4", "Tempo di aggiornamento");
define("L_SET_5", "Seleziona una stanza...");
define("L_SET_6", "Aree di default");
define("L_SET_7", "Fai la tua scelta...");
define("L_SET_8", "Stanze pubbliche create dagli utenti");
define("L_SET_9", "Crea la tua");
define("L_SET_10", "pubblica");
define("L_SET_11", "privata");
define("L_SET_12", "stanza");
define("L_SET_13", "Allora entra qui");
define("L_SET_14", "chat");
define("L_SET_15", "Stanze private di default");
define("L_SET_16", "Stanze private create dagi utenti");
define("L_SET_17", "Scegli il tuo avatar");
define("L_SET_18", "Segnala questa pagina: digita \"CTRL +D\".");

define("L_SRC", "&egrave; disponibile gratuitamente");

define("L_SECS", "secondi");
define("L_MIN", "minuto");
define("L_MINS", "minuti");
define("L_HOUR", "ora");
define("L_HOURS", "ore");

// registration stuff:
define("L_REG_1", "La tua password");
define("L_REG_2", "Gestione account");
define("L_REG_3", "Registra");
define("L_REG_4", "Imposta il tuo profilo");
define("L_REG_5", "Cancella utente");
define("L_REG_6", "Registrazione utente");
define("L_REG_7", "solo se sei registrato");
define("L_REG_8", "la tua e-mail");
define("L_REG_9", "Ti sei registrato.");
define("L_REG_10", "Indietro");
define("L_REG_11", "Impostazioni");
define("L_REG_12", "Variazione informazioni utente");
define("L_REG_13", "Cancellazione utente");
define("L_REG_14", "Login");
define("L_REG_15", "Log In");
define("L_REG_16", "Cambia");
define("L_REG_17", "Il tuo profilo &egrave; stato &egrave; stato cambiato.");
define("L_REG_18", "Sei stato allontanato dalla chat dal moderator della stanza.");
define("L_REG_18a", "Sei stato allontanato dalla chat dal moderator della stanza.<br />Motivo: %s");
define("L_REG_19", "Vuoi realmente essere rimosso?");
define("L_REG_20", "Si");
define("L_REG_21", "Sei stato rimosso.");
define("L_REG_22", "No");
define("L_REG_25", "Chiudi");
define("L_REG_30", "Nome");
define("L_REG_31", "Cognome");
define("L_REG_32", "WEB");
define("L_REG_33", "Mostra l&#39; e-mail nel profilo");
define("L_REG_34", "Impostazione profilo utente");
define("L_REG_35", "Amministrazione");
define("L_REG_36", "Luogo/paese");
define("L_REG_37", "I campi con un <span class=\"error\">*</span> sono obbligatori.");
define("L_REG_39", "La stanza in cui eri &egrave; stata rimossa dall&#39;Amministratore.");
define("L_REG_45", "sesso");
define("L_REG_46", "uomo");
define("L_REG_47", "donna");
define("L_REG_48", "non specificato");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Le tue impostazioni per entrare nella chat");
define("L_EMAIL_VAL_2", "Benvenuto nella nostra chat server.");
define("L_EMAIL_VAL_Err", "Errore interno, per favore contattate l&#39;amministratore: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "La vostra password &egrave; stata inviata al vostro indirizzo email.<br />Puoi cambiare la tua password nella pagina Login impostando il tuo profilo.");

// admin stuff
define("L_ADM_1", "%s non &egrave; pi&ugrave; il moderatore di questa chat.");
define("L_ADM_2", "Non sei pi&ugrave; un utente registrato.");

// error messages
define("L_ERR_USR_1", "Questo nick &egrave; gia in uso. Seleziona un nuovo nick.");
define("L_ERR_USR_2", "Devi scegliere un nome utente.");
define("L_ERR_USR_3", "Questo username e&#39; registrato. Usane un&#39;altro.");
define("L_ERR_USR_4", "Hai scritto una password sbagliata.");
define("L_ERR_USR_5", "Devi avere uno username.");
define("L_ERR_USR_6", "Devi scrivere una password.");
define("L_ERR_USR_7", "Devi scrivere il tuo e-mail.");
define("L_ERR_USR_8", "Devi scrivere un valido indirizzo e-mail.");
define("L_ERR_USR_9", "Questo username e&#39; gia&#39; utilizzato.");
define("L_ERR_USR_10", "Username o password sbagliata.");
define("L_ERR_USR_12", "Sei un Amministratore, quindi non puoi essere rimosso.");
define("L_ERR_USR_14", "Per chattare devi essere registrato.");
define("L_ERR_USR_15", "Devi scrivere il tuo nome.");
define("L_ERR_USR_16a", "Solo questi caratteri speciali sono ammessi:<br />".$REG_CHARS_ALLOWED."<br />spazi, virgole o slashes (\\) non sono ammessi.\\nSeleziona la sintassi.");
define("L_ERR_USR_18", "Nel tuo nome utente &egrave; stata trovata una parola censurabile.");
define("L_ERR_USR_20", "Sei stato espulso da questa stanza o dalla chat.");
define("L_ERR_USR_20a", "Sei stato espulso da questa stanza o dalla chat.<br />Motivo: %s");
define("L_ERR_USR_21", "Non sei attivo per gli ultimi ".C_USR_DEL." minuti,<br />quindi sei stato portato fuori dalla chat.");
define("L_ERR_USR_23", "Per entrare in una stanza privata devi essere registrato.");
define("L_ERR_USR_24", "Per creare la tua stanza privata devi essere registrato.");
define("L_ERR_USR_25", "Solo l&#39;amministratore pu&ograve; usare ".$COLORNAME." come colore!<br />Non provare ad usarlo".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".<br />Questi sono riservati ai poteri degli utenti!");
define("L_ERR_USR_26", "Solo l&#39;amministratore pu&ograve; usare ".$COLORNAME." come colore!<br />Non provare ad usarlo ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".<br />Questi sono riservati ai poteri degli utenti!");

// users frame or popup
define("L_EXIT", "Esci Chat");
define("L_DETACH", "Trasforma in finestra");
define("L_EXPCOL_ALL", "Espandi/Chiudi tutto");
define("L_CONN_STATE", "Connection state");
define("L_CHAT", "Chat");
define("L_USER", "utente");
define("L_USERS", "utenti");
define("L_LURKER", "lurker");
define("L_LURKERS", "lurkers");
define("L_NO_USER", "Senza utenti");
define("L_ROOM", "stanza");
define("L_ROOMS", "stanze");
define("L_EXPCOL", "Espandi/Chiudi tutto");
define("L_BEEP", "Beep/no beep all&#39;ingresso dell utente");
define("L_PROFILE", "Mostra il Profilo utente");
define("L_NO_PROFILE", "Senza profilo");

// input frame
define("L_HLP", "Aiuto");
define("L_MODERATOR", "%s &egrave; ora moderatore di questa chat.");
define("L_KICKED", " %s &egrave; stato allontanato con successo.");
define("L_KICKED_REASON", "%s &egrave; stato allontanato con successo. (Motivo: %s)");
define("L_BANISHED", "%s &egrave; stato espulso con successo.");
define("L_BANISHED_REASON", "%s &egrave; stato espulso con successo. (Motivo: %s)");
define("L_ANNOUNCE", "ANNUNCIO");
define("L_INVITE", "%s ti invita ad unirti a lei/lui nella chat <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> stanza.");
define("L_INVITE_REG", " Devi essere registrato per accedere in questa stanza.");
define("L_INVITE_DONE", "Il tuo invito &egrave; stato inviato a %s.");
define("L_OK", "Invia");
define("L_BUZZ", "Galleria Buzz");

// help popup
define("L_HELP_TIT_1", "Faccine");
define("L_HELP_TIT_2", "Formattazione dei testi per i messaggi");
define("L_HELP_FMT_1", "Puoi usare elementi di decorazione del testo come <B>grassetto</B>, <I>italic</I> o <U>sottolineato</U> racchiudendo la parte di testo interessata con &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; or &lt;U&gt; &lt;/U&gt; tags.<br />Per esempio, &lt;B&gt;questo testo&lt;/B&gt; produrr&agrave <B>questo testo</B>.");
define("L_HELP_FMT_2", "Per creare un hyperlink(per e-mail o URL) nel tuo messaggio, digita semplicemente il testo senza alcun tag. L&#39;hyperlink sar&agrave; creato automaticamente.");
define("L_HELP_TIT_3", "Comandi");
define("L_HELP_NOTE", "Tutti i comandi devono essere usati in inglese!");
define("L_HELP_USR", "utente");
define("L_HELP_MSG", "messaggio");
define("L_HELP_ROOM", "stanza");
define("L_HELP_BUZZ", "~nomesuono");
define("L_HELP_REASON", "il motivo");
define("L_HELP_CMD_0", "{} &egrave; un comando obbligatorio, [] &egrave; opzionale.");
define("L_HELP_CMD_1a", "Imposta il numero di messaggi da visualizzare, minimo 5.");
define("L_HELP_CMD_1b", "Ricarica il frame dei messaggi e mostra gli ultimi, il minimo sono 5.");
define("L_HELP_CMD_2a", "Modifica il tempo di aggiornamento dell&#39;elenco messaggi (in secondi).<br />Se n non viene specificato o &egrave; minore di 3, selezionare tra nessun aggiornamento e 10s di aggiornamento.");
define("L_HELP_CMD_2b", "Modifica il tempo di aggiornamento degli elenchi di utenti e messaggi (in secondi).<br />Se n non viene specificato o &egrave; minore di 3, selezionare tra nessun aggiornamento e 10s di aggiornamento.");
define("L_HELP_CMD_3", "Inverte l&#39;ordine dei messaggi(non in tutti i browsers).");
define("L_HELP_CMD_4", "Entra in un&#39;altra area, creandola se non esiste e se ti &egrave; consentito.<br />n &egrave; 0 se &egrave; privata e 1 se &egrave; pubblica, il valore di default &egrave; 1 se non specificato.");
define("L_HELP_CMD_5", "Abbandona la chat dopo aver scritto il messaggio opzionale.");
define("L_HELP_CMD_6", "Ignora i messaggi di un utente se viene specificato il suo nick.<br />Per ripristinare la normale visualizzazione dei messaggi &egrave; sufficiente inserire un \"-\" e il nick, quando invece viene inserito solo il \"-\" viene ripristinata la visualizzazione di tutti gli utenti.<br />Senza alcuna opzione, questo comando mostra i nick attualmente ignorati.");
define("L_HELP_CMD_7", "Richiama l&#39;ultima linea inserita (comando o messaggio).");
define("L_HELP_CMD_8", "Mostra/Nasconde l&#39;orario prima dei messaggi.");
define("L_HELP_CMD_9", "Allontana un utente dalla chat. Questo comando pu&ograve; essere usato solo dal moderatore<br />facoltativo, [".L_HELP_REASON."] visualizza il motivo dell&#39;espulsione (qualsiasi testo desiderato).");
define("L_HELP_CMD_10", "Invia un messaggio ad un utente specifico (gli altri utenti non lo vedranno).");
define("L_HELP_CMD_11", "Mostra le informazioni su un utente specifico.");
define("L_HELP_CMD_12", "Finestra Popup per modificare il profilo utente.");
define("L_HELP_CMD_13", "Attiva le informazioni sull&#39;ingresso o uscita dalla chat corrente.");
define("L_HELP_CMD_14", "Abilita l&#39;amministratore o il moderatore della chat a creare nuovi moderatori tra gli utenti registrati.");
define("L_HELP_CMD_15", "Cancella il frame dei messaggi e mostra gli ultimi 5.");
define("L_HELP_CMD_16", "Salva gli ultimi n messaggi (notifiche escluse) in un file HTML. Se n non &egrave; specificato, verranno inseriti tutti i messaggi.");
define("L_HELP_CMD_17", "Abilita l&#39;amministratore a mandare messaggi agli utenti in tutte le chat.");
define("L_HELP_CMD_18", "Invita un utente di un&#39;altra chat a partecipare alla tua.");
define("L_HELP_CMD_19", "Consente al moderatore di un area o all&#39;amministratore di \"bandire\" o \"bannare\" un utente dall&#39;area per un periodo definito dall&#39;amministratore.<br />Si potr&agrave; bannare un utente che st&agrave; chattando in un altra area (diversa da quella in cui ci si trova) usando l&#39;asterisco &#39;<B>&nbsp;*&nbsp;</B>&#39; per bannarlo \"per sempre\" da tutta la chat.");
define("L_HELP_CMD_20", "Descrive cosa stai facendo senza riferirsi a te stesso.");
define("L_HELP_CMD_21", "Annuncia alla stanza e agli utenti che provano a mandarti messaggi <br /> che sei lontano dal computer. Se vuoi tornare a chattare, inizia a digitare.");
define("L_HELP_CMD_22", "Invia Buzz e facoltivamente visualizza un messaggio nella stanza attuale.<br />- Uso:<br />- vecchio uso: \"/buzz\" o \"/buzz messaggio da visualizzaren\" - riprodurr&agrave; il suono del Buzz definiti nel pannello di amministrazione;<br />- uso esteso: \"/buzz ~nomesuono\" o \"/buzz ~nomesuono messaggio da visualizzaren\" - questo riprodurr&agrave; il nomesuono.wav file dalla cartella plus/sounds ; si prega di notare il segno \"~\" da usare all&#39;inizio della seconda parola, che &egrave; il nomee del file sonoro, senza l&#39;estensione .wav (solo .wav estensioni sono ammessi).<br />Da default, questo &egrave; un comando per moderator/admin .");
define("L_HELP_CMD_23", "Invia un <i>whisper</i> (messaggio privato). Il messaggio arriver&agrave; a destinazione, in qualsiasi stanza dove si trova l&#39;utente. Se l&#39;utente non online o ha impostato away, sarai notificato di questo.");
define("L_HELP_CMD_24", "Uso: l&#39;argomento deve contenere almeno 2 parole.<br />Questo comando cambia l&#39;argomento della stanza attuale. Prova a non sovrascrivvere gli argomenti degli altri utenti. Usa argomenti importanti.<br />Da default, questp &egrave; un comando per moderator/admin .<br />Usando il comando \"/topic top reset\" l&#39;argomento attuale sar&agrave; cancellato e reimpostato al bvalore di default della stanza.<br />Opzionale, \"/topic * {}\" da esattamente la stessa cosa per tutte le stanze (argomento globale e reimposta tutti gli argomenti).");
define("L_HELP_CMD_25", "Un gioco di dadi per casuale/azzardo numeri.<br />Uso: /dice o /dice [n];<br />pu&ograve; prendere qualsiasi valore <b>tra 1 e %s</b> (rappresenta il numero dei giri dei dadi). Se non &egrave; stato immesso nessun numero, il valore massimo di default dei giri sar&agrave; usato.");
define("L_HELP_CMD_26", "Questo &egrave; una versione pi&ugrave; complessa del comando /dice.<br />Uso: /{n1}d[n2] o /{n1}d;<br />n1 pu&ograve; prendere qualsiasi valore <b>tra 1 e %s</b> (rappresenta il numero dei lanci dei dadi).<br />n2 pu&ograve; prendere qualsiasi valore <b>tra 1 e %s</b> (rappresenta il numero dei giri dei dadi per lancio).");
define("L_HELP_CMD_27", "Evidenza i messaggi di un utente specifico per una semplice lettura attraverso la conversazione.<br />Uso: /high {user} o premi il piccolo <img src=./images/highlightOff.gif> quadrato alla destra dell&#39;utente (nella stanza/lista utenti)");
define("L_HELP_CMD_28", "Permette di caricare <i>una singola immagine</i> come messaggio.<br />Uso: L&#39;immagine deve essere in internet con libero accesso da tutti. Non usare pagine che utilizzano login.<br />Il link completo dell&#39;immagine deve essere scritto! E.g.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Estensioni permesse: .jpg .bmp .gif .png. Il link &egrave; un caso sensibile!<br />CINSIGLIO: digita /img dopo uno spazio e incolla l&#39;URL nel box; per prendere l&#39;URL dell&#39;immagine da una pagina internet, quando premi il tasto destro del mouse sull&#39;immagine, vai nelle propriet&agrave;, dopo evidenzi l&#39;indirizzo comleto/URL (spesso necessita scorrerlo in un p&ograve; in gi&ugrave;) e copia/incolla dopo /img<br />Non usare immagini dal tuo pc: dar&agrave; solo una pausa alla finestra della chat!!!");
define("L_HELP_CMD_29", "Il secondo comando permetter&agrave; all&#39;amministratore o moderatore della stanza corrente di degradare un&#39;altro utente registrato precedentemente promosso moderatore per la stessa room.<br />l&#39;opzione * option degreder&agrave; l&#39;utente da tutte le stanze.");
define("L_HELP_CMD_30", "Il secondo comando da la stessa cosa come /me ma mostrer&agrave; i tuo rispettivo genere<br />E.g. * il Signor Ciprian sta guardando la TV o la Signora Dana &egrave; felice.");
define("L_HELP_CMD_31", "Cambia l&#39;ordine degli utenti ordinati nelle liste: per ora di entrata o alfabetico.");
define("L_HELP_CMD_32", "Questa &egrave; una terza versione dei giri dei dadi (roleplaying).<br />Uso: /d{n1}[tn2] o /d{n1};<br />n1 pu&ograve; prendere qualsiasi valore<b>tra 1 &egrave; 100</b> (rappresenta il numero dei giri per dado).<br />n2 pu&ograve; prendere qualsiasi valore <b>tra 1 &egrave; %s</b> (rappresenta il numero di giri dei dadi per lancio).");
define("L_HELP_CMD_33", "Cambia la misura dei caratteri dei messaggi nella chat ad un utente sceltoChange the font size of the messages in chat to user choice (valori ammessi n: <b>tra 7 e 15</b>); il comando /size reimposta il valore di default della grandezza dei caratteri.");
define("L_HELP_ETIQ_1", "Etichetta della Chat");
define("L_HELP_ETIQ_2", "Il nostro sito piacerebbe tenere la sua comunit&agrave; amichevole e simpatica, quindi la preghiamo di aderire le seguenti direttive. Se manchi l&#39;osservazione di queste regole, un moderatore della nostra chat potrebbe espellerti dalla chat.<br /><br />Grazie!");
define("L_HELP_ETIQ_3", "Direttive della nostra chat");
define("L_HELP_ETIQ_4", "No &quot;spam&quot; nella chat digitando senza senso o lettere a caso.</li>
<li>Non usare caratteri AltErNati.</li>
<li>Tieni al minimo l&#39;uso del MAIUSCOLO, &egrave; considerato un giallo.</li>
<li>Tine nella mente che gli utenti della nostra chat sono di tutto il mondo, e, la maggior parte, incontrrearnno gente di diversa fede. Per piacere sii gentile e rispettoso per questa gente.</li>
<li>Nom essere maleducato verso gli altri membri. In effetti, prova a stare completamente alla larga dalle profane e/o parolacce.</li>
<li>Non chiamare i membri con il loro nome reale che potrebbe non essere apprezzato. Usa il loro nickname.");

// messages frame
define("L_NO_MSG", "Nessun messaggio ...");
define("L_TODAY_DWN", "I messaggi che hai mandato oggi iniziano sotto");
define("L_TODAY_UP", "I messaggi che hai mandato ieri iniziano sotto");

// message colors
$TextColors = array(	"Nero" => "#000000",
				"Rosso" => "#FF0000",
				"Verde" => "#009900",
				"Blu" => "#0000FF",
				"Porpora" => "#9900FF",
				"Rosso scuro" => "#990000",
				"Verde scuro" => "#006600",
				"Blu scuro" => "#000099",
				"Marrone" => "#996633",
				"Blu acqua" => "#006699",
				"Arancione" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Ignorato");
define("L_IGNOR_NON", "Nessun utente ignorato");

// whois popup
define("L_WHOIS_ADMIN", "Amministratore");
define("L_WHOIS_MODER", "Moderatore");
define("L_WHOIS_USER", "Utente");
define("L_WHOIS_GUEST", "Ospite");
define("L_WHOIS_REG", "Registrato");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s entra in questa stanza" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s esce questa stanza");
define("L_ENTER_ROM_NOSOUND", "%s esce da questa stanza");
define("L_EXIT_ROM", "%s esce da questa stanza");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s &egrave; stato automaticamente buttato fuori dalla stanza per inattivit&agrave;");
define("L_CLOSED_ROM", "%s ha chiuso il browser");

// Text for /away command notification string:
define("L_AWAY", "%s &egrave; in away");
define("L_BACK", "%s &egrave; tornato!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Menu Veloce *****");	//&nbsp; means one blank space. this will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", "ha impostato l&#39;argomento in:");
define("L_TOPIC_RESET", "ha resettato l&#39;argomento");
define("L_HELP_TOP", "almeno 2 parole nell&#39;argomento");

// Img cmd mod
define("L_PIC", "Immagine inserita da");
define("L_PIC_RESIZED", "Ridimensionata a");
define("L_HELP_IMG", "percorso completo dell&#39;immagine inserita");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s non &egrave; moderatore per qualsiasi stanza della chat.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Comandi extra disponibili:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Servizi extra disponibili:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Il nostro bot disponibile &egrave;: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "linguaggio parlato");
define("L_PRO_2", "link favorito 1");
define("L_PRO_3", "link favorito 2");
define("L_PRO_4", "descrizione");
define("L_PRO_5", "immagine URL");
define("L_PRO_6", "colore del tuo testo/nome");

// Avatar mod
define("L_ERR_AV", " URL non valido o non esistente.");
define("L_TITLE_AV", "Il tuo avatar attuale: ");
define("L_CHG_AV", "Clicca &#39;Cambia&#39; nel profilo<br />per selezionare il tuo Avatar.");
define("L_SEL_NEW_AV", "Seleziona un avatar nuovo");
define("L_EX_AV", "(esempio: http://mysite/images/mypic.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Inserisci URL, dopo premi ENTER per vederlo)");
define("L_CANCEL", "Cancella");
define("L_CLICK", "Clicca qui");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Il nostro bot &egrave; pubblicamente attivo per questa stanza. Inizia a parlare al bot, scrivi <b>hello ".C_BOT_NAME.'</b>. Per finire la conversazione, scrivi: <b>bye '.C_BOT_NAME.'</b>. (privato: /a <b>'.C_BOT_NAME.'</b> Messaggio)'); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Il nostro bot &egrave; pubblicamente attivo %s stanze. Puoi solo parlare in privato cliccando sul suo nome e bisbigliando. (comando: /wisp <b>".C_BOT_NAME."</b> Messaggio)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Il nostro bot &egrave; pubblicamente attivo. Puoi solo parlare in privato cliccando sul suo nome. (comando: /a <b>".C_BOT_NAME."</b> Messaggio o /wisp <b>".C_BOT_NAME."</b> Messaggio)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "gira il dado, i risultati sono:");

// Log mod by Ciprian
define("L_ARCHIVE", "Apri Archivio");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "apri popups per messaggio privato");
define("L_PRIV_POST_MSG", "Invia un messaggio privato!");
define("L_PRIV_MSG", "Ricevuto un nuovo messaggio privato!");
define("L_PRIV_MSGS", "ricevuto nuovo messaggio privato!");
define("L_PRIV_MSGSa", "Qui ci sono i primi 10 messaggi!<br />Usa il link sotto per vedere gli altri.");
define("L_PRIV_MSG1", "Da:");
define("L_PRIV_MSG2", "Stanza:");
define("L_PRIV_MSG3", "A:");
define("L_PRIV_MSG4", "Messaggio:");
define("L_PRIV_MSG5", "Caricato:");
define("L_PRIV_REPLY", "Rispondi");
define("L_PRIV_READ", "Premi il pulsante Chiudi per segnare tutti come letti!");
define("L_PRIV_POPUP", "Puoi disabilitare /riabilitare sempre questo servizio popup <br />variando il tuo <a href=\"#\" onClick=\"window.parent.runCmd('profile',''); return false;\" onMouseOver=\"window.status='Change your settings.'; return true\">Profilo</a> (solo utenti registrati)");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Abilitato" : "Non abilitato"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Abilitato" : "Non abilitato"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Impostazioni correnti su questo server</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Colori di default</u>: Amministratore = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderatori = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Altri utenti = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Colori di default</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Colore raccoglitore");
define("L_COL_HELP_SUB1", "Uso:");
define("L_COL_HELP_P1", "Puoi selezionare il tuo colore modificando il tuo profilo (lo stesso colore come il tuo username). Sarai ancora abilitato ad usare qualsiasi altro colore.Per reimpostare il tuo colore di default da uno usato casualmente, devi scegliere uno dei colori di default (Null) - &egrave; il primo nella lista dis elezione.");
define("L_COL_HELP_SUB2", "Consigli:");
define("L_COL_HELP_P2", "<u>Gamma colori</u><br />Dipendenti dalla capacit&agrave; tuo browser/S.O., &egrave; possibile che alcuni colori non sono resi. Solo 16 nomi di colori sono supportati dagli standard W3C HTML 4.0:");
define("L_COL_HELP_P2a", "Se un utente richiede lui non vede il tuo colore selezionato, significa che probabilmente sta usando un vecchio browser.");
define("L_COL_HELP_SUB3", "Impostazione definite per questa chat:");
define("L_COL_HELP_P3", "<u>Livelli per l&#39;uso di colori</u>:<br />1. Amministratore pu&ograve; usare qualsiasi colore.<br />Il colore di default per amministratore &egrave; <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderatori possono usare qualsiasi colore ma <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> e <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />Il colore di default dei moderatori &egrave; <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Gli altri utenti possono usare qualsiasi colore ma <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> e <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Il colore di default &egrave; <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Materiale tecnico</u>: Questi colori sono definiti dall&#39;amministratore nel pannello di controllo.<br />Se qualcosa va storto o se c&#39;&egrave; qualcosa che non ti piace per i colori di default, devi contattare prima l&#39;<b>amministratore</b>, non gli altri utenti nlla tua stanza. :-)");
define("L_COL_HELP_USER_STATUS", "Il tuo stato");
define("L_COL_TUT", "Uso testo colorato nella chat");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","gli utenti che stanno ".LOGIN_LINK."chattando</A> sono in questo momento.</td></tr>");
define("USERS_LOGIN","L&#39;utente sta ".LOGIN_LINK."chattando</A> in questo momento.</td></tr>");
define("NO_USER","Nessuno sta ".LOGIN_LINK."chattando</A> in questo momento.</td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Benvenuto nella nostra chat. Si prega di seguire la netiquette mentre si chatta: <I>Cerca di essere piacevole e cortese</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Benvenuto nella nostra chat. Si prega di seguire la netiquette mentre si chatta: <I>Cerca di essere piacevole e cortese</I>.");
define("WELCOME_MSG_NOSOUND", "Benvenuto nella nostra chat. Si prega di seguire la netiquette mentre si chatta: <I>Cerca di essere piacevole e cortese</I>.");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Le impostazioni per questo server sono state modificateThe settings of this server have just been changed. Per evitare malfunzionamenti, si prega di ricaricare il tuo browser (premi F5 o esci e rientra in chat).");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Opzioni Extra");
?>