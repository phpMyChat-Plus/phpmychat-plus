<?php
// File : german/localized.admin.php - plus version (11.06.2007 - rev.9)
// Original translation by Robert Schaller <robert@schaller.com> & Wolfgang Schneider <schneider@bibelcenter.de>
//    & Martin Sander <Martin.Sander@touch-screen.de> & Bernard Piller <bernard@bmpsystems.com>
//    & Reinhard Hofmann <e9625556@student.tuwien.ac.at> & Christian Hacker <c.hacker@dreamer-chat.de>
// Updates, corrections and additions for the Plus version by Alexander Eisele <xaex@xeax.de>  && Thomas Pschernig <tpsde1970@aol.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administration für %s");
define("A_MENU_1", "Registrierte Benutzer");
define("A_MENU_2", "Verbannte Benutzer");
define("A_MENU_3", "Räume leeren");
define("A_MENU_4", "E-Mails senden");
define("A_MENU_5", "Konfiguration");
define("A_MENU_6", "Chat-Extras");
define("A_MENU_7", "Suche");
define("A_MENU_8", "Verbindungen");
define("A_MENU_9", "Logarchiv");
define("A_LOGOUT", "LogOff"); // de pus sus in primul frame

// Frame for registered users
define("A_SHEET1_1", "Liste registrierter Benutzer und deren Rechte");
define("A_SHEET1_2", "Benutzername");
define("A_SHEET1_3", "Rechte");
define("A_SHEET1_4", "Moderierte Räume");
define("A_SHEET1_5", "Moderierte Räume werden durch Komma (,) ohne Leerzeichen getrennt.");
define("A_SHEET1_6", "Markierte entfernen");
define("A_SHEET1_7", "Ändern");
define("A_SHEET1_8", "Es existiert kein registrierter Benutzer außer Ihnen.");
define("A_SHEET1_9", "Markierte Profile verbannen");
define("A_SHEET1_10", "Jetzt müssen Sie Ihre Auswahl auf der Seite verbannte Benutzer verfeinern.");
define("A_SHEET1_11", "Zuletzt verbunden");
define("A_SHEET1_12", "Verbannungsgrund (optional)");
define("A_USER", "Benutzer");
define("A_MODER", "Moderator");
define("A_TOPMOD", "Top Moderator");
define("A_ADMIN", "Administrator");
define("A_PAGE_CNT", "Seite %s von %s");

// Frame for banished users
define("A_SHEET2_1", "Liste Verbannter Benutzer und der jeweiligen Räume");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Betroffener Raum");
define("A_SHEET2_4", "Bis");
define("A_SHEET2_5", "ohne Ende");
define("A_SHEET2_6", "Räume werden durch Kommata (,) ohne Abstand getrennt, wenn es weniger als 4 sind, ansonsten verbannt das ’<B>*</B>’ Zeichen<br />aus allen Räumen.");
define("A_SHEET2_7", "Verbannung für gewählte(n) Benutzer aufheben");
define("A_SHEET2_8", "Es existieren keine verbannten Benutzer.");
define("A_SHEET2_9", "Grund (optional)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Liste der bestehenden Räume.");
define("A_SHEET3_2", "Das L&ouml;schen eines \"nicht-Default\" Raumes entfernt auch alle Moderator<br />Status dieses Raums.");
define("A_SHEET3_3", "Gewählte Räume l&ouml;schen");
define("A_SHEET3_4", "Es existiert kein Raum zum L&ouml;schen.");

// Frame for sending mails
define("A_SHEET4_0", "Sie haben die erforderlichen Variablen in 'chat/admin/mail4admin.php'<br />noch nicht angepasst.");
define("A_SHEET4_1", "E-Mails versenden");
define("A_SHEET4_2", "Empfänger:");
define("A_SHEET4_3", "Alle auswählen");
define("A_SHEET4_4", "Betreff:");
define("A_SHEET4_5", "Nachricht:");
define("A_SHEET4_6", "Jetzt senden!");
define("A_SHEET4_7", "Alle E-Mails wurden gesendet.");
define("A_SHEET4_8", "Interner Fehler während des Sendevorganges.");
define("A_SHEET4_9", "Adresse, Betreff oder Nachricht fehlt!");
define("A_SHEET4_10", "Fügen Sie weitere eMail-Adressen an,<br />getrennt mit Komma ohne Leerzeichen (,)");
define("A_SHEET4_11", "Signatur");
define("A_SHEET4_12", "Markierung aufheben");

// Frame for  configuration
define("A_SHEET5_0", "Ihre installierte phpMyChat-Plus Version ist %s");
define("A_SHEET5_1", "Es wurde eine neue/veränderte Version ver&ouml;ffentlicht (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Chat Extras abgeschaltet") ;
define("A_REFRESH_MSG", "Nachrichten erneuern") ;
define("A_MSG_DEL", "Löschen") ;
define("A_POST_TIME", "Geschrieben am") ;
define("A_FROM_TO", "Von  An") ;
define("A_FROM", "Von") ;
define("A_CHTEX_ROOM", "Raum") ;
define("A_CHTEX_MSG", "Nachricht") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Logs der IP Verbindungen zu %s"); // phpMyChat (app name)
define("A_CHAT_LOGS_2", "Chat Wrchiv ist ausgeschaltet");
define("A_CHAT_LOGS_3", "Chat IP Log - Seite öffnen");
define("A_CHAT_LOGS_4", "Chat IP Logs löschen");
define("A_CHAT_LOGS_5", "Die IP Log - Datei wird hierdurch gelöscht!\\n");
define("A_CHAT_LOGS_6", "Gesamtes Chat Log - Archiv");
define("A_CHAT_LOGS_7", "Die Chat - Archive der Mitglieder anzeigen");
define("A_CHAT_LOGS_8", "Es werden nun alle Dateien und Unterverzeichnisse\\ndes Verzeichnisses vom Jahr %s gelöscht!\\n"); // year
define("A_CHAT_LOGS_9", "Alle Logs aus dem Jahr %s löschen"); // year
define("A_CHAT_LOGS_10", "Jahr löschen");
define("A_CHAT_LOGS_11", "Es werden alle Dateien gelöscht,\\ndie sich in dem Verzeichnis des Monats %s befinden!\\n"); // month/year
define("A_CHAT_LOGS_12", "(nur die öffentlichen)");
define("A_CHAT_LOGS_13", "Monat löschen");
define("A_CHAT_LOGS_14", "Es wird die Log-Datei des Tages %s gelöscht!\\n"); // day
define("A_CHAT_LOGS_15", "Dieses Log löschen");
define("A_CHAT_LOGS_16", "Log des Datums %s lesen"); // day month year
define("A_CHAT_LOGS_17", "Chat-Logs der öffentlichen Räume");
define("A_CHAT_LOGS_18", "(nur die öffentlichen)");
define("A_CHAT_LOGS_19", "\\nDies kann nicht wiederhergestellt werden...\\nSind Sie sicher?");
define("A_CHAT_LOGS_20", "Zeige den kompletten Chat-Archiv-Bereich");
define("A_CHAT_LOGS_21", "Nach oben gehen");
define("A_CHAT_LOGS_22", "Archivierte Log-Datei");
define("A_CHAT_LOGS_23", "Erstellt am %s");
//Admin Search Page
define("A_SEARCH_1", "Suchseite der Chaträume");
define("A_SEARCH_2", "Alle Kategorien");
define("A_SEARCH_3", "Namen");
define("A_SEARCH_4", "IP Addressen");
define("A_SEARCH_5", "Rechte");
define("A_SEARCH_6", "e-Mail");
define("A_SEARCH_7", "Geschlecht");
define("A_SEARCH_8", "Beschreibung");
define("A_SEARCH_9", "Links");
define("A_SEARCH_10", "Suche");
define("A_SEARCH_11", "Für die Rechte-Kategorie sind die Optionen <b>ad</b>, <b>mod</b> oder <b>u</b>.");
define("A_SEARCH_12", "Für die Geschlechts-Kategorie sind die Optionen <b>0</b> für nicht bekannt, <b>1</b> für Männlich oder <b>2</b> für Weiblich.");
define("A_SEARCH_13", "Mitgliedsname");
define("A_SEARCH_14", "Vorname");
define("A_SEARCH_15", "Nachname");
define("A_SEARCH_16", "Land");
define("A_SEARCH_18", "Rechte");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Geschlecht");
define("A_SEARCH_21", "Suchstring");
define("A_SEARCH_22", "Suche nach");
define("A_SEARCH_23", "Bitte geben Sie einen Suchstring ein und versuchen Sie es erneut!");

// Connected users Page
define("A_LURKING_1", "Verbundene Mitglieder und Beobachter") ;
define("A_LURKING_2", "Beobachtung abgeschaltet.") ;
?>