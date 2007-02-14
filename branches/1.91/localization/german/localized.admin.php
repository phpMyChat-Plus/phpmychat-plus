<?php
// File : german/localized.admin.php - plus version (17.09.2006 - rev.6)
// Original translation by Robert Schaller <robert@schaller.com> & Wolfgang Schneider <schneider@bibelcenter.de>
//    & Martin Sander <Martin.Sander@touch-screen.de> & Bernard Piller <bernard@bmpsystems.com>
//    & Reinhard Hofmann <e9625556@student.tuwien.ac.at> & Christian Hacker <c.hacker@dreamer-chat.de>
// Updates, corrections and additions for the Plus version by Alexander Eisele <xaex@mail.ru>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "iso-8859-1";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administration f&uuml;r %s");
define("A_MENU_1", "Registrierte Benutzer");
define("A_MENU_2", "Verbannte Benutzer");
define("A_MENU_3", "R&auml;ume leeren");
define("A_MENU_4", "E-Mails senden");
define("A_MENU_5", "Konfiguration");
define("A_MENU_6", "Chat-Extras");
define("A_MENU_7", "Suche");
define("A_MENU_8", "Verbindungen");
define("A_MENU_9", "Logarchiv");

// Frame for registered users
define("A_SHEET1_1", "Liste registrierter Benutzer und deren Rechte");
define("A_SHEET1_2", "Benutzername");
define("A_SHEET1_3", "Rechte");
define("A_SHEET1_4", "Moderierte R&auml;ume");
define("A_SHEET1_5", "Moderierte R&auml;ume werden durch Komma (,) ohne Leerzeichen getrennt.");
define("A_SHEET1_6", "Markierte entfernen");
define("A_SHEET1_7", "&Auml;ndern");
define("A_SHEET1_8", "Es existiert kein registrierter Benutzer au&szlig;er Ihnen.");
define("A_SHEET1_9", "Markierte Profile verbannen");
define("A_SHEET1_10", "Jetzt m&uuml;ssen Sie Ihre Auswahl auf der Seite verbannte Benutzer verfeinern.");
define("A_SHEET1_11", "Zuletzt verbunden");
define("A_SHEET1_12", "Verbannungsgrund (optional)");
define("A_USER", "Benutzer");
define("A_MODER", "Moderator");
define("A_PAGE_CNT", "Seite %s von %s");

// Frame for banished users
define("A_SHEET2_1", "Liste Verbannter Benutzer und der jeweiligen R&auml;ume");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Betroffener Raum");
define("A_SHEET2_4", "Bis");
define("A_SHEET2_5", "ohne Ende");
define("A_SHEET2_6", "R&auml;ume werden durch Kommata (,) ohne Abstand getrennt, wenn es weniger als 4 sind, ansonsten verbannt das '<B>&nbsp;*&nbsp;</B>' Zeichen<BR>aus allen R&auml;umen.");
define("A_SHEET2_7", "Verbannung f&uuml;r gew&auml;hlte(n) Benutzer aufheben");
define("A_SHEET2_8", "Es existieren keine verbannten Benutzer.");
define("A_SHEET2_9", "Grund (optional)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Liste der bestehenden R&auml;ume.");
define("A_SHEET3_2", "Das L&ouml;schen eines \"nicht-Default\" Raumes entfernt auch alle Moderator<BR>Status dieses Raums.");
define("A_SHEET3_3", "Gew&auml;hlte R&auml;ume l&ouml;schen");
define("A_SHEET3_4", "Es existiert kein Raum zum L&ouml;schen.");

// Frame for sending mails
define("A_SHEET4_0", "Sie haben die erforderlichen Variablen in 'chat/admin/mail4admin.php'<BR>noch nicht angepasst.");
define("A_SHEET4_1", "E-Mails versenden");
define("A_SHEET4_2", "Empf&auml;nger:");
define("A_SHEET4_3", "Alle ausw&auml;hlen");
define("A_SHEET4_4", "Betreff:");
define("A_SHEET4_5", "Nachricht:");
define("A_SHEET4_6", "Rundsendung starten");
define("A_SHEET4_7", "Alle E-Mails wurden gesendet.");
define("A_SHEET4_8", "Interner Fehler w&auml;hrend des Sendevorganges.");
define("A_SHEET4_9", "Adresse, Betreff oder Nachricht fehlt!");

define("A_SHEET5_0", "- Ihre installierte phpMyChat-Plus Version ist %s -\\n Es wurde eine neue/ver&auml;nderte Version ver&ouml;ffentlicht (%s)!");
define("A_SHEET5_1", "- Ihre installierte phpMyChat-Plus Version ist %s -<br>Es wurde eine neue/ver&auml;nderte Version ver&ouml;ffentlicht (%s)!<br /> Wenn Sie die Webseite besuchen wollen um Updates herunterzuladen <br>oder &uuml;ber Neuigkeiten nachzulesen, bitte folgenden Link benutzen. :");
?>