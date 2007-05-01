<?php
// File : italian/localized.admin.php - plus version (17.09.2006 - rev.6)
// Original translation by Andrea D'Alessandro <andrea@abol.it> & Massimo Fubini <massimo@tomato.it>
//	& Giuliano Yurij Beccaria <yurij@e-pages.it> & Marco Borrini <borrini@tradimento.it>
//      & Bartolotta Gioachino <developers@rockitalia.com> & Silvia M. Carrassi <silvia@ladysilvia.net>
// Updates, corrections and additions for the Plus version by Mike Mikius <mikiusss@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "iso-8859-1";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administration per %s");
define("A_MENU_1", "Utenti registrati");
define("A_MENU_2", "Utenti espulsi");
define("A_MENU_3", "Pulisci stanze");
define("A_MENU_4", "Invia e-mails");
define("A_MENU_5", "Configurazione");
define("A_MENU_6", "Extra chat");
define("A_MENU_7", "Cerca");
define("A_MENU_8", "Connessioni");
define("A_MENU_9", "Archivio registro");

// Frame for registered users
define("A_SHEET1_1", "Lista degli utenti registrti e dei loro permessi");
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
define("A_SHEET1_12", "Motivo Espulsione (opzionabile)");
define("A_USER", "Utente");
define("A_MODER", "Moderatore");
define("A_PAGE_CNT", "Pagina %s di %s");

// Frame for banished users
define("A_SHEET2_1", "Lista degli utenti banditi e stanze interessate");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Stanze interessate");
define("A_SHEET2_4", "Fino a");
define("A_SHEET2_5", "Senza fine");
define("A_SHEET2_6", "Stanze sono separate da una virgola senza spazi  (,) se sono meno di 4, diversamente l`asterisco '<B>&nbsp;*&nbsp;</B>' espelle da tutte le stanze.");
define("A_SHEET2_7", "Rimuovi l`espulsione per gli utenti selezionati");
define("A_SHEET2_8", "Non ci sono utenti banditi.");
define("A_SHEET2_9", "Motivo (opzionabile)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Elenco delle stanze esistenti");
define("A_SHEET3_2", "Svuotare una stanza  \"non-default\" rimuoverà anche tutti i moderatori<BR>della chat stessa.");
define("A_SHEET3_3", "Svuota le stanze selezionate");
define("A_SHEET3_4", "Non ci sono stanze da svuotare.");

// Frame for sending mails
define("A_SHEET4_0", "Non hai settato le variabili richieste<br>nello script 'chat/admin/mail4admin.php'.");
define("A_SHEET4_1", "Invia e-mails:");
define("A_SHEET4_2", "A:");
define("A_SHEET4_3", "Seleziona tutto");
define("A_SHEET4_4", "Oggetto:");
define("A_SHEET4_5", "Messaggio:");
define("A_SHEET4_6", "Avvia invio");
define("A_SHEET4_7", "Tutte le e-mails sono state inviate.");
define("A_SHEET4_8", "Errore interno durante l`invio delle mails.");
define("A_SHEET4_9", "Indirizzo/i, oggetto o messaggio mancante!");

// Frame for configuration
define("A_SHEET5_0", "- La versione installata della tua phpMyChat-Plus è %s -\\nC`è una nuova versione realizzata (%s)!");
define("A_SHEET5_1", "- La versione installata della tua phpMyChat-Plus è %s -<br>C`è una nuova versione realizzata (%s)!<br>Se desideri visitare il sito e scaricare l`aggiornamento<br>o leggere cosa c`è di nuovo, usa il link qui sotto:");
?>