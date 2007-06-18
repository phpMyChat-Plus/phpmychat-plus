<?php
// File : swedish/localized.admin.php - plus version (11.06.2007 - rev.9)
// Original file by Martin Edelius <martin.edelius@spirex.se>
// Updates, corrections and additions for the Plus version by Heikki <heikki@yttervik.be>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "iso-8859-1";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administration f�r %s");
define("A_MENU_1", "Registrerad anv�ndare");
define("A_MENU_2", "F�rvisade anv�ndare");
define("A_MENU_3", "T�m rums");
define("A_MENU_4", "S�nd epost");
define("A_MENU_5", "Inst�llningar");
define("A_MENU_6", "Chatt Extras");
define("A_MENU_7", "S�k");
define("A_MENU_8", "Anslutningar");
define("A_MENU_9", "Log Arkiv");

// Frame for registered users
define("A_SHEET1_1", "Lista �ver registred anv�ndare och deras R�ttighet");
define("A_SHEET1_2", "Anv�ndarnamn");
define("A_SHEET1_3", "R�ttigheter");
define("A_SHEET1_4", "Modererade kanaler");
define("A_SHEET1_5", "Modererade kanaler �r separerade med komma (,) utan mellanslag.");
define("A_SHEET1_6", "Ta bort markerade");
define("A_SHEET1_7", "�ndra");
define("A_SHEET1_8", "H�r finns inga andra registred anv�ndare f�rutom du sj�lv.");
define("A_SHEET1_9", "Ta bort markerade profiler");
define("A_SHEET1_10", "Nu har du flyttat de f�rvisade anv�ndare, sheet till f�rfina ditt val.");
define("A_SHEET1_11", "Senaste connection");
define("A_SHEET1_12", "F�rvisnings orsak (valfri)");
define("A_USER", "Anv�ndare");
define("A_MODER", "Ordningsman");
define("A_ADMIN", "Administrat�r");
define("A_PAGE_CNT", "Sidan %s av %s");

// Frame for banished users
define("A_SHEET2_1", "Lista �ver f�rvisade anv�ndare och Rum med bekymmer");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Rum med bekymmer");
define("A_SHEET2_4", "Fram till");
define("A_SHEET2_5", "nej slut");
define("A_SHEET2_6", "Rum �r separerad med komma tecken med mellanslag (,) om dem �r mindre �n 4, annat fall g�r '<B>&nbsp;*&nbsp;</B>' sign<br />banish fr�n alla rums.");
define("A_SHEET2_7", "Ta bort f�rvisning f�r markerade anv�ndare(s)");
define("A_SHEET2_8", "H�r finns inga f�rvisade anv�ndare.");
define("A_SHEET2_9", "Orsak (valfri)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Lista �ver existerande kanaler");
define("A_SHEET3_2", "Rensa \"nej-Standard\" rummet blir borttagen av all ordningsman<br />status f�r denna rum.");
define("A_SHEET3_3", "Rensa markerad rums");
define("A_SHEET3_4", "H�r finns ej rum f�r Rensning.");

// Frame for sending mails
define("A_SHEET4_0", "Du har inte st�llt in admin epost i inst�llningarna.");
define("A_SHEET4_1", "Skicka e-post");
define("A_SHEET4_2", "Till:");
define("A_SHEET4_3", "Markera alla");
define("A_SHEET4_4", "�mne:");
define("A_SHEET4_5", "Meddelande:");
define("A_SHEET4_6", "Skicka");
define("A_SHEET4_7", "All e-post blev Skickade.");
define("A_SHEET4_8", "Fel uppst�g med s�nding av e-post.");
define("A_SHEET4_9", "Address(s), �mne eller meddelande saknas!");

// Frame for configuration
define("A_SHEET5_0", "Ditt phpMyChat-Plus installations version �r %s");
define("A_SHEET5_1", "Det finns ny version released (%s)!");
?>