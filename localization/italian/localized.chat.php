<?php
// File : italian/localized.chat.php - plus version (20.10.2007 - rev.29)
// Original translation by Andrea D’Alessandro <andrea@abol.it> & Massimo Fubini <massimo@tomato.it>
// & Giuliano Yurij Beccaria <yurij@e-pages.it> & Marco Borrini <borrini@tradimento.it>
// & Bartolotta Gioachino <developers@rockitalia.com> & Silvia M. Carrassi <silvia@ladysilvia.net>
// Updates, corrections and additions for the Plus version by Mike Mikius <mikiusss@yahoo.com> and Luciano Cataldo <lucianocataldo@gmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Guida");

define("L_WEL_1", "I messaggi verranno cancellati dopo %s %s");
define("L_WEL_2", "e gli utenti inattivi dopo %s %s");

define("L_CUR_1", "Nella chat");
define("L_CUR_1a", "ora ci sono");
define("L_CUR_1b", "ora c’e");
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
define("L_SET_18", "Aggiungi ai Preferiti: premi \"CTRL +D\".");

define("L_SRC", "è disponibile gratuitamente");

define("L_SECS", "secondi");
define("L_MIN", "minuto");
define("L_MINS", "minuti");
define("L_HOUR", "ora");
define("L_HOURS", "ore");

// registration stuff:
define("L_REG_1", "La tua password");
define("L_REG_2", "Gestione account");
define("L_REG_3", "Registrati");
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
define("L_REG_17", "Il tuo profilo è stato cambiato.");
define("L_REG_18", "Sei stato allontanato dalla chat dal moderatore della stanza.");
define("L_REG_18a", "Sei stato allontanato dalla chat dal moderatore della stanza.<br />Motivo: %s");
define("L_REG_19", "Vuoi realmente essere rimosso?");
define("L_REG_20", "Si");
define("L_REG_21", "Sei stato rimosso.");
define("L_REG_22", "No");
define("L_REG_25", "Chiudi");
define("L_REG_30", "Nome");
define("L_REG_31", "Cognome");
define("L_REG_32", "WEB");
define("L_REG_33", "Mostra l’ e-mail nel profilo");
define("L_REG_34", "Impostazione profilo utente");
define("L_REG_35", "Amministrazione");
define("L_REG_36", "Luogo/paese");
define("L_REG_37", "I campi con un <span class=\"error\">*</span> sono obbligatori.");
define("L_REG_39", "La stanza in cui eri è stata rimossa dall’Amministratore.");
define("L_REG_45", "sesso");
define("L_REG_46", "uomo");
define("L_REG_47", "donna");
define("L_REG_48", "non specificato");
define("L_REG_49", "Registratione richiesta!");
define("L_REG_50", "Registratione sospesa!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Le tue impostazioni per entrare nella chat");
define("L_EMAIL_VAL_2", "Benvenuto nella nostra chat.");
define("L_EMAIL_VAL_Err", "Errore interno, per favore contattate l’amministratore: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "La vostra password è stata inviata al vostro indirizzo email.<br />Puoi cambiare la tua password nella pagina Login impostando il tuo profilo.");

// admin stuff
define("L_ADM_1", "%s non è più il moderatore di questa chat.");
define("L_ADM_2", "Non sei più un utente registrato.");

// error messages
define("L_ERR_USR_1", "Questo nick è gia in uso. Seleziona un nuovo nick.");
define("L_ERR_USR_2", "Devi scegliere un nome utente.");
define("L_ERR_USR_3", "Questo username e’ registrato. Usane un’altro.");
define("L_ERR_USR_4", "Hai scritto una password sbagliata.");
define("L_ERR_USR_5", "Devi avere uno username.");
define("L_ERR_USR_6", "Devi scrivere una password.");
define("L_ERR_USR_7", "Devi scrivere il tuo e-mail.");
define("L_ERR_USR_8", "Devi scrivere un valido indirizzo e-mail.");
define("L_ERR_USR_9", "Questo username e’ gia’ utilizzato.");
define("L_ERR_USR_10", "Username o password sbagliata.");
define("L_ERR_USR_11", "Devi essere un Amministratore.");
define("L_ERR_USR_12", "Sei un Amministratore, quindi non puoi essere rimosso.");
define("L_ERR_USR_13", "Per creare una tua chat devi essere registrato.");
define("L_ERR_USR_14", "Per chattare devi essere registrato.");
define("L_ERR_USR_15", "Devi scrivere il tuo nome.");
define("L_ERR_USR_16", "Solo questi caratteri speciali sono ammessi:\\n".$REG_CHARS_ALLOWED."\\nSpazi, virgole o slashes (\\) non sono ammessi.\\nSeleziona la sintassi.");
define("L_ERR_USR_16a", "Solo questi caratteri speciali sono ammessi:<br />".$REG_CHARS_ALLOWED."<br />spazi, virgole o slashes (\\) non sono ammessi.\\nSeleziona la sintassi.");
define("L_ERR_USR_17", "Questa chat non esiste, tu non sei abilitato a crearne una nuova.");
define("L_ERR_USR_18", "Nel tuo nome utente è stata trovata una parola censurabile.");
define("L_ERR_USR_19", "Non puoi essere in più di una chat contemporaneamente.");
define("L_ERR_USR_20", "Sei stato espulso da questa stanza o dalla chat.");
define("L_ERR_USR_20a", "Sei stato espulso da questa stanza o dalla chat.<br />Motivo: %s");
define("L_ERR_USR_21", "Non sei attivo per gli ultimi ".C_USR_DEL." minuti,<br />quindi sei stato portato fuori dalla chat.");
define("L_ERR_USR_22", "Questo comando non eseguibile per\\nil browser che usi (IE engine).");
define("L_ERR_USR_23", "Per entrare in una stanza privata devi essere registrato.");
define("L_ERR_USR_24", "Per creare la tua stanza privata devi essere registrato.");
define("L_ERR_USR_25", "Solo l’amministratore può usare ".$COLORNAME." come colore!<br />Non provare ad usarlo".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".<br />Questi sono riservati ai poteri degli utenti!");
define("L_ERR_USR_26", "Solo l’amministratore può usare ".$COLORNAME." come colore!<br />Non provare ad usarlo ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".<br />Questi sono riservati ai poteri degli utenti!");
define("L_ERR_USR_27", "Non puoi parlare in privato con te stesso.\\nFallo con la mente per piacere...\\nOra scegli un username differente.");
define("L_ERR_ROM_1", "Il nome delle chat non può contenere virgole o backslash (\\).");
define("L_ERR_ROM_2", "Nel nome di chat è stata trovata una parola censurabile.");
define("L_ERR_ROM_3", "Già esiste una stanza pubblica con questo nome.");
define("L_ERR_ROM_4", "Nome stanza non valido.");

// users frame or popup
define("L_EXIT", "Esci");
define("L_DETACH", "Trasforma in finestra");
define("L_EXPCOL_ALL", "Espandi/Chiudi tutto");
define("L_CONN_STATE", "Stato connessione");
define("L_CHAT", "Chat");
define("L_USER", "utente");
define("L_USERS", "utenti");
define("L_LURKER", "lurker");
define("L_LURKERS", "lurkers");
define("L_NO_USER", "Senza utenti");
define("L_ROOM", "stanza");
define("L_ROOMS", "stanze");
define("L_EXPCOL", "Espandi/Chiudi tutto");
define("L_BEEP", "Beep/no beep all’ingresso dell utente");
define("L_PROFILE", "Mostra il Profilo utente");
define("L_NO_PROFILE", "Senza profilo");

// input frame
define("L_HLP", "Aiuto");
define("L_MODERATOR", "%s è ora moderatore di questa chat.");
define("L_KICKED", "%s è stato allontanato con successo.");
define("L_KICKED_REASON", "%s è stato allontanato con successo. (Motivo: %s)");
define("L_BANISHED", "%s è stato espulso con successo.");
define("L_BANISHED_REASON", "%s è stato espulso con successo. (Motivo: %s)");
define("L_ANNOUNCE", "ANNUNCIO");
define("L_INVITE", "%s ti invita ad unirti a lei/lui nella chat <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> stanza.");
define("L_INVITE_REG", "Devi essere registrato per accedere in questa stanza.");
define("L_INVITE_DONE", "Il tuo invito è stato inviato a %s.");
define("L_OK", "Invia");
define("L_BUZZ", "Galleria Buzz");
define("L_BAD_CMD", "Questo non è un comando valido!");
define("L_ADMIN", "%s è già amministratore!");
define("L_IS_MODERATOR", "%s è già moderatore!");
define("L_NO_MODERATOR", "Solo il moderatore può usare questo comando.");
define("L_NONEXIST_USER", "%s non è in questa chat.");
define("L_NONREG_USER", "%s non è registrato.");
define("L_NONREG_USER_IP", "Il suo IP è: %s.");
define("L_NO_KICKED", "%s è moderatore o amministratore e non può essere allontanato dalla chat.");
define("L_NO_BANISHED", "%s è un moderatore o amministratore e non può essere espulso.");
define("L_SVR_TIME", "Orario server: ");
define("L_NO_SAVE", "Nesun messaggio da salvare!");
define("L_NO_ADMIN", "Solo gli amministratori possono usare questo comando.");
define("L_NO_REG_USER", "Devi essere registrato in questa chat per usare questo comando.");

// help popup
define("L_HELP_TIT_1", "Faccine");
define("L_HELP_TIT_2", "Formattazione dei testi per i messaggi");
define("L_HELP_FMT_1", "Puoi usare elementi di decorazione del testo come <B>grassetto</B>, <I>italic</I> o <U>sottolineato</U> racchiudendo la parte di testo interessata con &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; or &lt;U&gt; &lt;/U&gt; tags.<br />Per esempio, &lt;B&gt;questo testo&lt;/B&gt; produrrà <B>questo testo</B>.");
define("L_HELP_FMT_2", "Per creare un hyperlink(per e-mail o URL) nel tuo messaggio, digita semplicemente il testo senza alcun tag. L’hyperlink sarà creato automaticamente.");
define("L_HELP_TIT_3", "Comandi");
define("L_HELP_NOTE", "Tutti i comandi devono essere usati in inglese!");
define("L_HELP_USR", "utente");
define("L_HELP_MSG", "messaggio");
define("L_HELP_MSGS", "messaggi");
define("L_HELP_ROOM", "stanza");
define("L_HELP_BUZZ", "~nomesuono");
define("L_HELP_REASON", "il motivo");
define("L_HELP_CMD_0", "{} è un comando obbligatorio, [] è opzionale.");
define("L_HELP_CMD_1a", "Imposta il numero di messaggi da visualizzare, minimo 5.");
define("L_HELP_CMD_1b", "Ricarica il frame dei messaggi e mostra gli ultimi, il minimo sono 5.");
define("L_HELP_CMD_2a", "Modifica il tempo di aggiornamento dell’elenco messaggi (in secondi).<br />Se n non viene specificato o è minore di 3, selezionare tra nessun aggiornamento e 10s di aggiornamento.");
define("L_HELP_CMD_2b", "Modifica il tempo di aggiornamento degli elenchi di utenti e messaggi (in secondi).<br />Se n non viene specificato o è minore di 3, selezionare tra nessun aggiornamento e 10s di aggiornamento.");
define("L_HELP_CMD_3", "Inverte l’ordine dei messaggi(non in tutti i browsers).");
define("L_HELP_CMD_4", "Entra in un’altra area, creandola se non esiste e se ti è consentito.<br />n è 0 se è privata e 1 se è pubblica, il valore di default è 1 se non specificato.");
define("L_HELP_CMD_5", "Abbandona la chat dopo aver scritto il messaggio opzionale.");
define("L_HELP_CMD_6", "Ignora i messaggi di un utente se viene specificato il suo nick.<br />Per ripristinare la normale visualizzazione dei messaggi è sufficiente inserire un \"-\" e il nick, quando invece viene inserito solo il \"-\" viene ripristinata la visualizzazione di tutti gli utenti.<br />Senza alcuna opzione, questo comando mostra i nick attualmente ignorati.");
define("L_HELP_CMD_7", "Richiama l’ultima linea inserita (comando o messaggio).");
define("L_HELP_CMD_8", "Mostra/Nasconde l’orario prima dei messaggi.");
define("L_HELP_CMD_9", "Allontana un utente dalla chat. Questo comando può essere usato solo dal moderatore<br />facoltativo, [".L_HELP_REASON."] visualizza il motivo dell’espulsione (qualsiasi testo desiderato).");
define("L_HELP_CMD_10", "Invia un messaggio ad un utente specifico (gli altri utenti non lo vedranno).");
define("L_HELP_CMD_11", "Mostra le informazioni su un utente specifico.");
define("L_HELP_CMD_12", "Finestra Popup per modificare il profilo utente.");
define("L_HELP_CMD_13", "Attiva le informazioni sull’ingresso o uscita dalla chat corrente.");
define("L_HELP_CMD_14", "Abilita l’amministratore o il moderatore della chat a creare nuovi moderatori tra gli utenti registrati.");
define("L_HELP_CMD_15", "Cancella il frame dei messaggi e mostra gli ultimi 5.");
define("L_HELP_CMD_16", "Salva gli ultimi n messaggi (notifiche escluse) in un file HTML. Se n non è specificato, verranno inseriti tutti i messaggi.");
define("L_HELP_CMD_17", "Abilita l’amministratore a mandare messaggi agli utenti in tutte le chat.");
define("L_HELP_CMD_18", "Invita un utente di un’altra chat a partecipare alla tua.");
define("L_HELP_CMD_19", "Consente al moderatore di un area o all’amministratore di \"bandire\" o \"bannare\" un utente dall’area per un periodo definito dall’amministratore.<br />Si potrà bannare un utente che stà chattando in un altra area (diversa da quella in cui ci si trova) usando l’asterisco * per bannarlo \"per sempre\" da tutta la chat.");
define("L_HELP_CMD_20", "Descrive cosa stai facendo senza riferirsi a te stesso.");
define("L_HELP_CMD_21", "Annuncia alla stanza e agli utenti che provano a mandarti messaggi <br /> che sei lontano dal computer. Se vuoi tornare a chattare, inizia a digitare.");
define("L_HELP_CMD_22", "Invia Buzz e facoltivamente visualizza un messaggio nella stanza attuale.<br />- Uso:<br />- vecchio uso: \"/buzz\" o \"/buzz messaggio da visualizzaren\" - riprodurrà il suono del Buzz definiti nel pannello di amministrazione;<br />- uso esteso: \"/buzz ~nomesuono\" o \"/buzz ~nomesuono messaggio da visualizzaren\" - questo riprodurrà il nomesuono.wav file dalla cartella plus/sounds ; si prega di notare il segno \"~\" da usare all’inizio della seconda parola, che è il nomee del file sonoro, senza l’estensione .wav (solo .wav estensioni sono ammessi).<br />Da default, questo è un comando per moderator/admin .");
define("L_HELP_CMD_23", "Invia un <i>whisper</i> (messaggio privato). Il messaggio arriverà a destinazione, in qualsiasi stanza dove si trova l’utente. Se l’utente non online o ha impostato away, sarai notificato di questo.");
define("L_HELP_CMD_24", "Uso: l’argomento deve contenere almeno 2 parole.<br />Questo comando cambia l’argomento della stanza attuale. Prova a non sovrascrivvere gli argomenti degli altri utenti. Usa argomenti importanti.<br />Da default, questp è un comando per moderator/admin .<br />Usando il comando \"/topic top reset\" l’argomento attuale sarà cancellato e reimpostato al bvalore di default della stanza.<br />Opzionale, \"/topic * {}\" da esattamente la stessa cosa per tutte le stanze (argomento globale e reimposta tutti gli argomenti).");
define("L_HELP_CMD_25", "Un gioco di dadi per casuale/azzardo numeri.<br />Uso: /dice o /dice [n];<br />può prendere qualsiasi valore <b>tra 1 e %s</b> (rappresenta il numero dei giri dei dadi). Se non è stato immesso nessun numero, il valore massimo di default dei giri sarà usato.");
define("L_HELP_CMD_26", "Questo è una versione più complessa del comando /dice.<br />Uso: /{n1}d[n2] o /{n1}d;<br />n1 può prendere qualsiasi valore <b>tra 1 e %s</b> (rappresenta il numero dei lanci dei dadi).<br />n2 può prendere qualsiasi valore <b>tra 1 e %s</b> (rappresenta il numero dei giri dei dadi per lancio).");
define("L_HELP_CMD_27", "Evidenza i messaggi di un utente specifico per una semplice lettura attraverso la conversazione.<br />Uso: /high {user} o premi il piccolo <img src=./images/highlightOff.gif> quadrato alla destra dell’utente (nella stanza/lista utenti)");
define("L_HELP_CMD_28", "Permette di caricare <i>una singola immagine</i> come messaggio.<br />Uso: L’immagine deve essere in internet con libero accesso da tutti. Non usare pagine che utilizzano login.<br />Il link completo dell’immagine deve essere scritto! E.g.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Estensioni permesse: .jpg .bmp .gif .png. Il link è un caso sensibile!<br />CINSIGLIO: digita /img dopo uno spazio e incolla l’URL nel box; per prendere l’URL dell’immagine da una pagina internet, quando premi il tasto destro del mouse sull’immagine, vai nelle proprietà, dopo evidenzi l’indirizzo comleto/URL (spesso necessita scorrerlo in un pò in giù) e copia/incolla dopo /img<br />Non usare immagini dal tuo pc: darà solo una pausa alla finestra della chat!!!");
define("L_HELP_CMD_29", "Il secondo comando permetterà all’amministratore o moderatore della stanza corrente di degradare un’altro utente registrato precedentemente promosso moderatore per la stessa room.<br />l’opzione * option degrederà l’utente da tutte le stanze.");
define("L_HELP_CMD_30", "Il secondo comando da la stessa cosa come /me ma mostrerà i tuo rispettivo genere<br />E.g. * il Signor Ciprian sta guardando la TV o la Signora Dana è felice.");
define("L_HELP_CMD_31", "Cambia l’ordine degli utenti ordinati nelle liste: per ora di entrata o alfabetico.");
define("L_HELP_CMD_32", "Questa è una terza versione dei giri dei dadi (roleplaying).<br />Uso: /d{n1}[tn2] o /d{n1};<br />n1 può prendere qualsiasi valore<b>tra 1 è 100</b> (rappresenta il numero dei giri per dado).<br />n2 può prendere qualsiasi valore <b>tra 1 è %s</b> (rappresenta il numero di giri dei dadi per lancio).");
define("L_HELP_CMD_33", "Cambia la misura dei caratteri dei messaggi nella chat ad un utente scelto (valori ammessi n: <b>tra 7 e 15</b>); il comando /size reimposta il valore di default della grandezza dei caratteri.");
define("L_HELP_ETIQ_1", "Netiquette della Chat");
define("L_HELP_ETIQ_2", "Nella nostra chat si auspica un incontro amichevole e simpatico, quindi ti preghiamo di aderire alle seguenti direttive. Se verrai meno all’osservanza di queste regole, i moderatori potrebbero espellerti dalla chat.<br /><br />Grazie!");
define("L_HELP_ETIQ_3", "Direttive della nostra chat");
define("L_HELP_ETIQ_4", "No \"spam\" nella chat digitando senza senso o lettere a caso.</li>
<li>Non usare caratteri AltErNati.</li>
<li>Tieni al minimo l’uso del MAIUSCOLO, è considerato urlare.</li>
<li>Considera che gli utenti della nostra chat potrebbero essere di tutto il mondo, e quindi di diversa fede. Per piacere sii gentile e rispettoso.</li>
<li>Non essere maleducato verso gli altri membri, i moderatori e gli amministatori.</li>
<li>Non chiamare i membri con il loro nome reale, potrebbe non essere apprezzato. Usa il loro nickname.");

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
define("L_WHOIS_TOPMOD", "Top Moderatore");
define("L_WHOIS_MODER", "Moderatore");
define("L_WHOIS_USER", "Utente");
define("L_WHOIS_GUEST", "Ospite");
define("L_WHOIS_REG", "Registrato");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s entra in questa stanza" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s entra in questa stanza");
define("L_ENTER_ROM_NOSOUND", "%s entra in questa stanza");
define("L_EXIT_ROM", "%s esce da questa stanza");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s è stato automaticamente buttato fuori dalla stanza per inattività");
define("L_CLOSED_ROM", "%s ha chiuso il browser");

// Text for /away command notification string:
define("L_AWAY", "Lo stato personale di %s è: Non al computer.");
define("L_BACK", "Lo stato personale di %s è: Al computer.");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Menu Veloce *****");	//&nbsp; means one blank space. this will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", "ha impostato l’argomento in:");
define("L_TOPIC_RESET", "ha resettato l’argomento");
define("L_HELP_TOP", "almeno 2 parole nell’argomento");

// Img cmd mod
define("L_PIC", "Immagine inserita da");
define("L_PIC_RESIZED", "Ridimensionata a");
define("L_HELP_IMG", "percorso completo dell’immagine inserita");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s non è moderatore per qualsiasi stanza della chat.");
define("L_IS_NO_MODERATOR", "%s non è un moderatore.");
define("L_ERR_IS_ADMIN", "%s è l’amministratore!\\nNon puoi cambiare i suoi permessi.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Comandi extra disponibili:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Servizi extra disponibili:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Il nostro bot disponibile è: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "linguaggio parlato");
define("L_PRO_2", "link favorito 1");
define("L_PRO_3", "link favorito 2");
define("L_PRO_4", "descrizione");
define("L_PRO_5", "immagine URL");
define("L_PRO_6", "colore del tuo testo/nome");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "URL non valido o non esistente.");
define("L_TITLE_AV", "Il tuo avatar attuale: ");
define("L_CHG_AV", "Clicca \"".L_REG_16."\" nel profilo<br />per selezionare il tuo Avatar.");
define("L_SEL_NEW_AV", "Seleziona un avatar nuovo");
define("L_EX_AV", "(esempio: http://www.sitoweb/img/immagine.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Inserisci URL, dopo premi ENTER per vederlo)");
define("L_CANCEL", "Cancella");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Il nostro bot è pubblicamente attivo per questa stanza. Inizia a parlare al bot, scrivi <b>hello ".C_BOT_NAME."</b>. Per finire la conversazione, scrivi: <b>bye ".C_BOT_NAME."</b>. (privato: /a <b>".C_BOT_NAME."</b> Messaggio)"); //make sure your translation don’t go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Il nostro bot è pubblicamente attivo %s stanze. Puoi solo parlare in privato cliccando sul suo nome e bisbigliando. (comando: /wisp <b>".C_BOT_NAME."</b> Messaggio)"); //make sure your translation don’t go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Il nostro bot è pubblicamente attivo. Puoi solo parlare in privato cliccando sul suo nome. (comando: /to <b>".C_BOT_NAME."</b> Messaggio o /wisp <b>".C_BOT_NAME."</b> Messaggio)"); //make sure your translation don’t go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Il Bot non è attivo in questa stanza!");
define("BOT_START_ERROR", "Il Bot è già attivo in questa stanza!");
define("BOT_DISABLED_ERROR", "Il Bot è stato disabilitato dal pannello di amministrazione!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "gira il dado, i risultati sono:");
define("DICE_WRONG", "Devi selezionare quanti dadi vuoi girare\\n(Scegli un numero tra 1 e ".MAX_ROLLS.").\\nScrivi solo /dice per girare ".MAX_ROLLS." dadi.");
define("DICE2_WRONG", "Il secondo valore deve essere tra 1 e ".MAX_ROLLS.".\\nLascialo vuoto per usare tutti ".MAX_ROLLS." dadi\\n(e.g. /".MAX_DICES."d o /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Il primo valore deve essere tra 1 e".MAX_DICES.".\\n(e.g. /".MAX_DICES."d o /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Il secondo valore deve essere tra 1 e".MAX_ROLLS.".\\nLascialo vuoto per usare tutti ".MAX_ROLLS." dadi\\n(e.g. /d50 o /d100t".MAX_ROLLS.").");

// Log mod by Ciprian
define("L_ARCHIVE", "Apri Archivio");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Apri popups per messaggio privato<br /><blink><b>(Attenzione! Disabilitare il blocco pop up)</b></blink>");
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
define("L_PRIV_POPUP", "Puoi disabilitare/abilitare sempre questo servizio popup <br />variando il tuo");
define("L_PRIV_POPUP1", "Profilo</a> (solo utenti registrati)");
define("L_NOT_ONLINE", "%s non è online in questo momento.");
define("L_PRIV_NOT_ONLINE", "%s non è online in questo momento,\\nma riceverà il tuo messaggio dopo il login.");
define("L_PRIV_NOT_INROOM", "%s non è in questa stanza.\\nSe vuoi inviare un messaggio privato a questo utente,\\nusa il comando: /wisp %s messaggio.");
define("L_PRIV_AWAY", "%s ha lo stato di away,\\nma riceverà il tuo messaggio\\nquando tornerà.");
define("PM_DISABLED_ERROR", "Bisbigliare (messaggio privato)\\nsono disabilitati per questa chat.");
define("L_NEXT_PAGE", "Vai alla pagina successiva");
define("L_NEXT_READ", "Leggi il successivo %s"); // message / 10 messages
define("L_ROOM_ALL", "Tutte le stanze");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Abilitato" : "Non abilitato"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Abilitato" : "Non abilitato"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Impostazioni correnti su questo server</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Colori di default</u>: Amministratore = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderatori = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Altri utenti = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Colori di default</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Colore raccoglitore");
define("L_COL_HELP_SUB1", "Uso:");
define("L_COL_HELP_P1", "Puoi selezionare il tuo colore modificando il tuo profilo (lo stesso colore come il tuo username). Sarai ancora abilitato ad usare qualsiasi altro colore. Per reimpostare il tuo colore di default da uno usato casualmente, devi scegliere uno dei colori di default (Null) - è il primo nella lista di selezione.");
define("L_COL_HELP_SUB2", "Consigli:");
define("L_COL_HELP_P2", "<u>Gamma colori</u><br />Dipendenti dalla capacità tuo browser/S.O., è possibile che alcuni colori non sono resi. Solo 16 nomi di colori sono supportati dagli standard W3C HTML 4.0:");
define("L_COL_HELP_P2a", "Se un utente non vede il colore da te scelto, significa che probabilmente sta usando un vecchio browser.");
define("L_COL_HELP_SUB3", "Impostazioni definite per questa chat:");
define("L_COL_HELP_P3", "<u>Livelli per l’uso di colori</u>:<br />1. Amministratore può usare qualsiasi colore.<br />Il colore di default per amministratore è <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderatori possono usare qualsiasi colore ma <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> e <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />Il colore di default dei moderatori è <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Gli altri utenti possono usare qualsiasi colore ma <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> e <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Il colore di default è <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Materiale tecnico</u>: Questi colori sono definiti dall’amministratore nel pannello di controllo.<br />Se qualcosa non va bene o se c’è qualcosa che non ti piace per i colori di default, devi contattare prima l’<b>amministratore</b>, non gli utenti della chat. :-)");
define("L_COL_HELP_USER_STATUS", "Il tuo stato");
define("L_COL_TUT", "Uso testo colorato nella chat");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Solo l’amministratore può usare il colore ".COLOR_CA."!\\n\\nReimposta il tuo colore ".COLOR_CM."!\\n\\nSi prega di scegliere un altro colore.");
define("COL_ERROR_BOX_USRA", "Solo l’amministratore può usare il colore ".COLOR_CA."!\\n\\nNon provare ad usare ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nSono riservati per utenti power!\\n\\nReimposta il tuo colore ".COLOR_CD."!\\n\\nSi prega di scegliere un altro colore.");
define("COL_ERROR_BOX_USRM", "Devi essere moderatore per usare ".COLOR_CM." color!\\n\\nNon provare ad usare ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nSono riservati per utenti power!\\n\\nReimposta il tuo colore ".COLOR_CD."!\\n\\nSi prega di scegliere un altro colore.");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Benvenuto nella nostra chat. Vi preghiamo di rispettare la netiquette: <I>Siate rispettosi e civili</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Benvenuto nella nostra chat. Vi preghiamo di rispettare la netiquette: <I>Siate rispettosi e civili</I>.");
define("WELCOME_MSG_NOSOUND", "Benvenuto nella nostra chat. Vi preghiamo di rispettare la netiquette: <I>Siate rispettosi e civili</I>.");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Le impostazioni per questo server sono state modificate. Per evitare malfunzionamenti, si prega di ricaricare il tuo browser (esci e rientra in chat).");

//Size command error by Ciprian
define("L_ERR_SIZE", "La dimensione del carattere può essere solo\\nnull (per reimpostare) o tra 7 e 15");

// Week days for Status Worldtime and Open Schedule by Ciprian
define("L_MON", "Lunedi");
define("L_TUE", "Martedi");
define("L_WED", "Mercoledi");
define("L_THU", "Giovedi");
define("L_FRI", "Venerdi");
define("L_SAT", "Sabato");
define("L_SUN", "Domenica");

// Password reset form by Ciprian
define("L_PASS_0", "Procedura per il ripristino della password");
define("L_PASS_1", "La tua domanda segreta");
define("L_PASS_2", "Qual’è stata la tua prima auto?"); // Non cambiare questa domanda! solo tradurre!
define("L_PASS_3", "Qual’è stato il nome del tuo primo animale?"); // Don’t change this question! Just translate it!
define("L_PASS_4", "Qual’è la tua bevanda preferita?"); // Don’t change this question! Just translate it!
define("L_PASS_5", "Qual’è la data del tuo compleanno?"); // Don’t change this question! Just translate it!
define("L_PASS_6", "La tua risposta segreta");
define("L_PASS_7", "Ripristina password");
define("L_PASS_8", "La tua password è stata ripristinata con successo.");
define("L_PASS_9", "La tua nuova password per entrare in chat.");
define("L_PASS_11", "Bentornato nella nostra chat!");
define("L_PASS_12", "Scegli la tua domanda...");
define("L_ERR_PASS_1", "Nome utente errato. Scegli il tuo.");
define("L_ERR_PASS_2", "email errata. Prova di nuovo!");
define("L_ERR_PASS_3", "La tua domanda segreta è sbagliata.<br />Answer to one shown bellow!");
define("L_ERR_PASS_4", "Risposta segreta errata. Prova di nuovo!");
define("L_ERR_PASS_5", "Non hai impostato nessuno dato privato/segreto.");
define("L_ERR_PASS_6", "Non hai impostato ancora nessuno dato privato/segreto.<br />Non puoi usare questa procedura. Contatta l’amministratore!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s è diventato amministratore di questa chat.");
define("L_ADM_4", "%s non è più amministratore di questa chat.");

// Links popup page by Alex
define("L_LINKS_1", "Links segnalati");
define("L_LINKS_2", "Qui puoi accedere ai links segnalati");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Clicca qui %s %s");
define("L_CLICK", "Clicca qui %s");
define("L_LINKS_3", "per aprire il link");
define("L_LINKS_4", "per aprire il sito dell’autore");
define("L_LINKS_5", "per inserire questo smiley");
define("L_LINKS_6", "per contatto");
define("L_LINKS_7", "per visitare l’Homepage di phpMyChat ");
define("L_LINKS_8", "per entrare nel gruppo di phpMyChat");
define("L_LINKS_9", "per inviare il tuo feedback");
define("L_LINKS_10", "per il download phpMyChat Plus");
define("L_LINKS_11", "controllochi sta chattando");
define("L_LINKS_12", "per aprire la pagina di Login");
define("L_LINKS_13", "invia questo buzz"); // Click to blablabla : it can also be translated as "to play this sound", if buzz has no translation.
define("L_LINKS_14", "per usare questo comando");
define("L_LINKS_15", "per aprire"); // to open/see Posted Links window
define("L_LINKS_16", "Galleria Smilie"); // to open/see Posted Links window
define("L_SWITCH", "Cambia in"); // Switch to Language
define("L_SELECTED", "selezionato"); // E.g. "French - selected" (Country Flags mouseover / Language switching) 
define("L_EMAIL_1", "per inviare e-mail");
define("L_FULLSIZE_PIC", "per dimensioni reali dell’immagine");
define("L_AUTHOR", "l’autore");
define("L_DEVELOPER", "lo sviluppatore di questa chat");
define("L_OWNER", "il proprietario di questa chat");
define("L_TRANSLATOR", "la traduzione");

// Banner topics - the topics are not multi-language!
define("L_BANNER_WELCOME", "Benvenuti in %s!");
define("L_BANNER_TOPIC", "Argomento:");

// Counter on login
define("L_VISITOR_REPORT", "... visitatori da %s");

// Status bar messages
define("L_JOIN_ROOM", "Entra in questa stanza");
define("L_USE_NAME", "Usa questo nome utente");
define("L_USE_NAME1", "Riferisci a questo utente");
define("L_WHSP", "Bisbiglio");
define("L_SEND_WHSP", "Invia un Bisbiglio");
define("L_SEND_PM_1", "Invia PM");
define("L_SEND_PM_2", "Invia un messaggio privato");

//Lurking frame popup
define("L_LURKING_2", "Pagina osservatori");
define("L_LURKING_3", "sta osservando");
define("L_LURKING_4", "è entrato");
define("L_LURKING_5", "Sconosciuto");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Opzioni Extra");
define("L_LURKING_1", "Apri pagina osservatori");
define("L_SOUNDFIX_IE_1", "Fix suono per IE");
define("L_SOUNDFIX_IE_2", "Download fix suono per IE");

// Months for Open Schedule by Ciprian
define("L_JAN", "gennaio");
define("L_FEB", "febbraio");
define("L_MAR", "marzo");
define("L_APR", "aprile");
define("L_MAY", "maggio");
define("L_JUN", "giugno");
define("L_JUL", "luglio");
define("L_AUG", "agosto");
define("L_SEP", "settembre");
define("L_OCT", "ottobre");
define("L_NOV", "novembre");
define("L_DEC", "dicembre");

// Localized date format - read the parameters here: http://www.php.net/manual/en/function.strftime.php
setlocale(LC_TIME, "it_IT.UTF-8", "Italian.UTF-8");
define("L_SHORT_DATE", "%d/%m/%Y"); //Change this to your local desired date only format (keep the short form)
define("L_LONG_DATE", "%A, %d %B %Y"); //Change this to your local desired date only format (keep the long form)
define("L_SHORT_DATETIME", "%d/%m/%Y %H:%M:%S"); //Change this to your local desired date&time format (keep the short form)
define("L_LONG_DATETIME", "%A, %d %B %Y %H:%M:%S"); //Change this to your local desired date&time format (keep the long form)

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".$CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","gli utenti che stanno ".LOGIN_LINK." chattando</A> sono in questo momento.</td></tr>");
define("USERS_LOGIN","L’utente sta ".LOGIN_LINK." chattando</A> in questo momento.</td></tr>");
define("NO_USER","Nessuno sta ".LOGIN_LINK." chattando</A> in questo momento.</td></tr>");

// Language names
define("L_LANG_AR", "Spagnolo Argentino");
define("L_LANG_NL", "Olandese");
define("L_LANG_EN", "Inglese"); // for admin panel only
define("L_LANG_ENUK", "Inglese UK"); // for UK formats and flags
define("L_LANG_ENUS", "Inglese US"); // for US formats and flags
define("L_LANG_FR", "Frencese");
define("L_LANG_DE", "Tedesco");
define("L_LANG_IT", "Italiano");
define("L_LANG_RO", "Rumeno");
define("L_LANG_ES", "Spagnolo");
define("L_LANG_SV", "Svedese");
define("L_LANG_TR", "Turco");
define("L_LANG_VI", "Vietnamita");
?>