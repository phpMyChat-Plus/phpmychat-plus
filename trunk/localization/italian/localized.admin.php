<?php
// File : italian/localized.admin.php - plus version (25.09.2007 - rev.10)
// Original translation by Andrea D’Alessandro <andrea@abol.it> & Massimo Fubini <massimo@tomato.it>
//	& Giuliano Yurij Beccaria <yurij@e-pages.it> & Marco Borrini <borrini@tradimento.it>
// & Bartolotta Gioachino <developers@rockitalia.com> & Silvia M. Carrassi <silvia@ladysilvia.net>
// Updates, corrections and additions for the Plus version by Mike Mikius <mikiusss@yahoo.com> & Luciano Cataldo <lucianocataldo@gmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Amministrazione per %s");
define("A_MENU_1", "Utenti registrati");
define("A_MENU_2", "Utenti espulsi");
define("A_MENU_3", "Pulisci stanze");
define("A_MENU_4", "Invia e-mails");
define("A_MENU_5", "Configurazione");
define("A_MENU_6", "Extra chat");
define("A_MENU_7", "Cerca");
define("A_MENU_8", "Connessioni");
define("A_MENU_9", "Archivio registro");
define("A_LOGOUT", "Sconnetti"); 

// Frame for registered users
define("A_SHEET1_1", "Lista degli utenti registrati e dei loro permessi");
define("A_SHEET1_2", "Nome utente");
define("A_SHEET1_3", "Permessi");
define("A_SHEET1_4", "Chat moderate");
define("A_SHEET1_5", "Le chat moderate sono reparate da una virgola (,) senza spazi.");
define("A_SHEET1_6", "Rimuovi i profili contrassegnati");
define("A_SHEET1_7", "Cambia");
define("A_SHEET1_8", "Non ci sono utenti registrati eccetto te stesso.");
define("A_SHEET1_9", "Espelli profili selezionati");
define("A_SHEET1_10", "Adesso devi andare sullo schedario degli utenti banditi per raffinare le tue scelte.");
define("A_SHEET1_11", "Ultima connessione");
define("A_SHEET1_12", "Motivo Espulsione (opzionale)");
define("A_USER", "Utente");
define("A_MODER", "Moderatore");
define("A_TOPMOD", "Top Moderatore");
define("A_ADMIN", "Amministratore");
define("A_PAGE_CNT", "Pagina %s di %s");

// Frame for banished users
define("A_SHEET2_1", "Lista degli utenti banditi e stanze interessate");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Stanze interessate");
define("A_SHEET2_4", "Fino a");
define("A_SHEET2_5", "senza fine");
define("A_SHEET2_6", "Stanze sono separate da una virgola senza spazi (,) se sono meno di 4, diversamente l’asterisco ’<B>*</B>’ espelle da tutte le stanze.");
define("A_SHEET2_7", "Rimuovi l’espulsione per gli utenti selezionati");
define("A_SHEET2_8", "Non ci sono utenti banditi.");
define("A_SHEET2_9", "Motivo (opzionabile)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Elenco delle stanze esistenti");
define("A_SHEET3_2", "Svuotare una stanza \"non-default\" rimuovera anche tutti i moderatori<br />della chat stessa.");
define("A_SHEET3_3", "Svuota le stanze selezionate");
define("A_SHEET3_4", "Non ci sono stanze da svuotare.");

// Frame for sending mails
define("A_SHEET4_0", "Non hai impostato l’indirizzo email dell’amministratore nella tabella di configurazione.");
define("A_SHEET4_1", "Invia e-mail:");
define("A_SHEET4_2", "A:");
define("A_SHEET4_3", "Seleziona tutto");
define("A_SHEET4_4", "Oggetto:");
define("A_SHEET4_5", "Messaggio:");
define("A_SHEET4_6", "Invia!");
define("A_SHEET4_7", "Tutte le e-mails sono state inviate.");
define("A_SHEET4_8", "Errore interno durante l’invio delle mails.");
define("A_SHEET4_9", "Indirizzo/i, oggetto o messaggio mancante!");
define("A_SHEET4_10", "Aggiungi e-mail, separali con la virgola (,) senza spazio");
define("A_SHEET4_11", "Firma");
define("A_SHEET4_12", "Deseleziona tutto");

// Frame for configuration
define("A_SHEET5_0", "La versione installata della tua phpMyChat-Plus e %s");
define("A_SHEET5_1", "C’e una nuova versione realizzata (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Extra chat disabilitati") ;
define("A_REFRESH_MSG", "Aggiorna messaggi") ;
define("A_MSG_DEL", "Elimina") ;
define("A_POST_TIME", "Inviato da") ;
define("A_FROM_TO", "Da  a") ;
define("A_FROM", "Da") ;
define("A_CHTEX_ROOM", "Stanza") ;
define("A_CHTEX_MSG", "Messaggio") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Registro IP connessi a %s"); // phpMyChat (app name)
define("A_CHAT_LOGS_2", "Archivio chat è stato disabilitato");
define("A_CHAT_LOGS_3", "Apri pagina del registro connessioni della stanza");
define("A_CHAT_LOGS_4", "Cancella registro connessioni della stanza");
define("A_CHAT_LOGS_5", "Questo cancellerà il file registro IP!\\n");
define("A_CHAT_LOGS_6", "registro connessioni della stanza pieno");
define("A_CHAT_LOGS_7", "Visualizza l’archivio della sesione chat degli utenti");
define("A_CHAT_LOGS_8", "Ciò cancellerà tutte i files e cartelle\\ncaricati nella cartella %s!\\n");
define("A_CHAT_LOGS_9", "Cancella tutti %s registri");
define("A_CHAT_LOGS_10", "Cancella anno");
define("A_CHAT_LOGS_11", "Ciò cancellerà tutte i files e cartelle\\ncaricati nella cartella %s!\\n");
define("A_CHAT_LOGS_12", "(soltanto quelli pubblici)");
define("A_CHAT_LOGS_13", "Cancella mese");
define("A_CHAT_LOGS_14", "Ciò cancellerà il file %s!\\n");
define("A_CHAT_LOGS_15", "Cancella questo registro");
define("A_CHAT_LOGS_16", "Leggi registro %s");
define("A_CHAT_LOGS_17", "Archivio registri chat utenti");
define("A_CHAT_LOGS_18", "(soltanto quello pubblico)");
define("A_CHAT_LOGS_19", "\\nCiò non è ripristinabile...\\nSei sicuro?");
define("A_CHAT_LOGS_20", "Visualizza l’archivio completo della sessione della chat");
define("A_CHAT_LOGS_21", "Torna all’inizio");
define("A_CHAT_LOGS_22", "Archivio Log");
define("A_CHAT_LOGS_23", "Generato il %s");

//Admin Search Page
define("A_SEARCH_1", "Pagine di ricerca stanze");
define("A_SEARCH_2", "Tutte le categorie");
define("A_SEARCH_3", "Nomi");
define("A_SEARCH_4", "Indirizzi IP");
define("A_SEARCH_5", "Permessi");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Genere");
define("A_SEARCH_8", "Descrizione");
define("A_SEARCH_9", "Links");
define("A_SEARCH_10", "Cerca");
define("A_SEARCH_11", "Per categoria permesssi, le opzioni sono <b>ad</b>, <b>mod</b> o <b>u</b>.");
define("A_SEARCH_12", "Per categoria genere, le opzioni sono <b>0</b> se non specificati, <b>1</b> per maschi, o <b>2</b> per femmine.");
define("A_SEARCH_13", "Utente");
define("A_SEARCH_14", "Nmae");
define("A_SEARCH_15", "Cognome");
define("A_SEARCH_16", "Stato");
define("A_SEARCH_18", "Permesso");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Genere");
define("A_SEARCH_21", "Termini di ricerca");
define("A_SEARCH_22", "Cerca per");
define("A_SEARCH_23", "Prego provvedi alla ricerca per termini e riprova di nuovo!");

// Connected users Page
define("A_LURKING_1", "Utenti e Osservatori connessi") ;
define("A_LURKING_2", "Osservatori disabilitati.") ;
?>