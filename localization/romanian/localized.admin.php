<?php
// File : romanian/localized.admin.php - plus version (07.07.2008 - rev.13)
// Original translation started by Radu Swider <swidera@satline.ro>, first updated by Ciprian Popovici-Oana <floppy@kermit.cs.pub.ro>
// Corrected, finalized and updated to Plus version by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administrare pentru %s");
define("A_MENU_1", "Utilizatori înregistraţi");
define("A_MENU_11", "Utilizator înregistrat");
define("A_MENU_2", "Utilizatori blocaţi");
define("A_MENU_21", "Utilizator blocat");
define("A_MENU_3", "Curăţare camere");
define("A_MENU_4", "Trimite emailuri");
define("A_MENU_5", "Configurare");
define("A_MENU_6", "Extras Chat");
define("A_MENU_7", "Căutare");
define("A_MENU_8", "Conectări");
define("A_MENU_9", "Arhivă");
define("A_LOGOUT", "Deconectare");

// Frame for registered users
define("A_SHEET1_1", "Lista utilizatorilor înregistraţi şi permisiunile acestora");
define("A_SHEET1_2", "Numele");
define("A_SHEET1_3", "Permisiuni");
define("A_SHEET1_4", "Camere moderate");
define("A_SHEET1_5", "Camerele moderate sunt separate de virgulă (,) fără spaţii.");
define("A_SHEET1_6", "Şterge utilizatorii selectaţi");
define("A_SHEET1_7", "Schimbă");
define("A_SHEET1_8", "Nu există utilizatori înregistraţi, cu excepţia ta.");
define("A_SHEET1_9", "Blochează utilizatorii selectaţi");
define("A_SHEET1_10", "Va trebui să intri în secţiunea ’".A_MENU_2."’ pentru ajustări.");
define("A_SHEET1_11", "Ultima conectare");
define("A_SHEET1_12", "Motivul blocării (opţional)");
define("A_USER", "Utilizator");
define("A_MODER", "Moderator");
define("A_TOPMOD", "Top Moderator");
define("A_ADMIN", "Administrator");
define("A_PAGE_CNT", "Pagina %s din %s");

// Frame for banished users
define("A_SHEET2_1", "Lista utilizatorilor blocaţi şi camerele în care au fost blocaţi");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Camere blocate");
define("A_SHEET2_4", "Până la");
define("A_SHEET2_5", "Definitiv");
define("A_SHEET2_6", "Camerele sunt separate prin virgulă fără spaţii (,) dacă sunt mai puţine de 4, altfel, semnul ’<B>*</B>’ va bloca accesul în toate camerele.");
define("A_SHEET2_7", "Deblochează utilizatorii selectaţi");
define("A_SHEET2_8", "Nu există utilizatori blocaţi.");
define("A_SHEET2_9", "Motivul (opţional)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Lista camerelor care ar trebui curăţate");
define("A_SHEET3_2", "Curăţarea unei camere \"non-default\" va elimina şi statutul de moderatori pentru camera respectivă.");
define("A_SHEET3_3", "Curăţă camerele selectate");
define("A_SHEET3_4", "Nu sunt camere de curăţat.");

// Frame for sending mails
define("A_SHEET4_0", "Nu ai setat corect adresa de email a administratorului in tab-ul ’".A_MENU_5."’.");
define("A_SHEET4_1", "Trimite emailuri");
define("A_SHEET4_2", "Către:");
define("A_SHEET4_3", "Selectează tot");
define("A_SHEET4_4", "Subiect:");
define("A_SHEET4_5", "Mesaj:");
define("A_SHEET4_6", "Trimite!");
define("A_SHEET4_7", "Toate email-urile au fost trimise.");
define("A_SHEET4_8", "Eroare internă întâmpinată la trimitere.");
define("A_SHEET4_9", "Destinaţia, subiectul sau mesajul nu au fost completate!");
define("A_SHEET4_10", "Adaugă email-uri, separate prin virgulă (,) fără spaţii");
define("A_SHEET4_11", "Semnătură");
define("A_SHEET4_12", "Deselectează tot");

// Frame for configuration
define("A_SHEET5_0", "Aveţi instalată versiunea %s");
define("A_SHEET5_1", "A fost lansată deja o nouă versiune (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Extras-ul Chat a fost dezactivat") ;
define("A_REFRESH_MSG", "Reîncarcă Mesajele") ;
define("A_MSG_DEL", "Şterge") ;
define("A_POST_TIME", "Postat la") ;
define("A_FROM_TO", "De la › La") ;
define("A_FROM", "De la") ;
define("A_CHTEX_ROOM", "Camera") ;
define("A_CHTEX_MSG", "Mesajul") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Istoricul IP-urilor Connectate la %s");
define("A_CHAT_LOGS_2", "Arhivarea mesajelor a fost dezactivată");
define("A_CHAT_LOGS_3", "Deschide pagina cu istoricul IP-urilor");
define("A_CHAT_LOGS_4", "Resetează istoricul IP-urilor");
define("A_CHAT_LOGS_5", "Aceasta va salva şi reseta fişierul cu istoricul IP-urilor!\\n");
define("A_CHAT_LOGS_6", "- Arhiva completă a mesajelor");
define("A_CHAT_LOGS_7", "Arată numai arhiva publică");
define("A_CHAT_LOGS_8", "Aceasta va şterge toate istoricele\\nsalvate în anul %s!\\n");
define("A_CHAT_LOGS_9", "Şterge tot istoricul din %s");
define("A_CHAT_LOGS_10", "Şterge tot anul");
define("A_CHAT_LOGS_11", "Aceasta va şterge toate istoricele\\nsalvate în luna %s!\\n");
define("A_CHAT_LOGS_12", "(numai cele publice)");
define("A_CHAT_LOGS_13", "Şterge toată luna");
define("A_CHAT_LOGS_14", "Aceasta va şterge fişierul %s!\\n");
define("A_CHAT_LOGS_15", "Şterge acest istoric");
define("A_CHAT_LOGS_16", "Citeşte istoricul din %s");
define("A_CHAT_LOGS_17", "Arhiva mesajelor publice");
define("A_CHAT_LOGS_18", "(numai cel public)");
define("A_CHAT_LOGS_19", "\\nAcţiunea este ireversibilă...\\nEşti sigur?");
define("A_CHAT_LOGS_20", "Arată arhiva completă");
define("A_CHAT_LOGS_21", "Mergi sus");
define("A_CHAT_LOGS_22", "Fişier Istoric Arhivat");
define("A_CHAT_LOGS_23", "Generat în data de %s");
define("A_CHAT_LOGS_24", "Arhivează toate istoricele %s într-un fişier zip");
define("A_CHAT_LOGS_25", "Aceasta va crea un fişier zip conţinând\\ntoate istoricele salvate în directorul %s!\\n");
define("A_CHAT_LOGS_26", "\\nEşti sigur?");
define("A_CHAT_LOGS_27", "Fişiere Zip Salvate");
define("A_CHAT_LOGS_28", "Descarcă %s");
define("A_CHAT_LOGS_29", "Şterge acest fişier zip");
define("A_CHAT_LOGS_30", "Fişiere IP Salvate");
define("A_CHAT_LOGS_31", "Mărime totală %s %s");

//Admin Search Page
define("A_SEARCH_1", "Pagina de căutare");
define("A_SEARCH_2", "Toate categoriile");
define("A_SEARCH_3", "Nume");
define("A_SEARCH_4", "Adrese IP");
define("A_SEARCH_5", "Permisiuni");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Sex");
define("A_SEARCH_8", "Descriere");
define("A_SEARCH_9", "Link-uri");
define("A_SEARCH_10", "Căutare");
define("A_SEARCH_11", "Pentru Categoria Permisiuni, opţiunile sunt <b>ad</b>, <b>mod</b> sau <b>u</b>.");
define("A_SEARCH_12", "Pentru Categoria Sex, opţiunile sunt: <b>0</b> pentru Nespecificat, <b>1</b> pentru Masculin, <b>2</b> pentru Feminin sau <b>3</b> pentru Pereche/Cuplu.");
define("A_SEARCH_13", "Poreclă");
define("A_SEARCH_14", "Prenume");
define("A_SEARCH_15", "Nume de familie");
define("A_SEARCH_16", "Ţara");
define("A_SEARCH_18", "Permisiuni");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Sex");
define("A_SEARCH_21", "Termen căutare");
define("A_SEARCH_22", "Căutare după");
define("A_SEARCH_23", "Introduceţi un termen de căutare şi încercaţi din nou");
define("A_SEARCH_24", "Nu au fost găsite informaţii conform criteriilor de căutare. Redefiniţi criteriile de căutare.");
define("A_SEARCH_25", "Moderează acest utilizator");
define("A_SEARCH_24", "Căutarea nu a returnat nici un rezultat. Redefiniţi criteriile de căutare.");
define("A_SEARCH_25", "Moderează acest utilizator");

// Connected users Page
define("A_LURKING_1", "Utilizatori conectaţi şi monitorizare") ;
define("A_LURKING_2", "Monitorizare dezactivată.") ;
?>