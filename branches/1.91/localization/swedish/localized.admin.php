<?php
// File : swedish/localized.admin.php - plus version (11.06.2007 - rev.9)
// Original file by Martin Edelius <martin.edelius@spirex.se>
// Updates, corrections and additions for the Plus version by Heikki <heikki@yttervik.be>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administration för %s");
define("A_MENU_1", "Registrerad användare");
define("A_MENU_2", "Förvisade användare");
define("A_MENU_3", "Töm rums");
define("A_MENU_4", "Sänd epost");
define("A_MENU_5", "Inställningar");
define("A_MENU_6", "Chatt Extras");
define("A_MENU_7", "Sök");
define("A_MENU_8", "Anslutningar");
define("A_MENU_9", "Log Arkiv");

// Frame for registered users
define("A_SHEET1_1", "Lista över registred användare och deras Rättighet");
define("A_SHEET1_2", "Användarnamn");
define("A_SHEET1_3", "Rättigheter");
define("A_SHEET1_4", "Modererade kanaler");
define("A_SHEET1_5", "Modererade kanaler är separerade med komma (,) utan mellanslag.");
define("A_SHEET1_6", "Ta bort markerade");
define("A_SHEET1_7", "Ändra");
define("A_SHEET1_8", "Här finns inga andra registred användare förutom du själv.");
define("A_SHEET1_9", "Ta bort markerade profiler");
define("A_SHEET1_10", "Nu har du flyttat de förvisade användare, sheet till förfina ditt val.");
define("A_SHEET1_11", "Senaste connection");
define("A_SHEET1_12", "Förvisnings orsak (valfri)");
define("A_USER", "Användare");
define("A_MODER", "Ordningsman");
define("A_ADMIN", "Administratör");
define("A_PAGE_CNT", "Sidan %s av %s");

// Frame for banished users
define("A_SHEET2_1", "Lista över förvisade användare och Rum med bekymmer");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Rum med bekymmer");
define("A_SHEET2_4", "Fram till");
define("A_SHEET2_5", "nej slut");
define("A_SHEET2_6", "Rum är separerad med komma tecken med mellanslag (,) om dem är mindre än 4, annat fall gör ’<B>*</B>’ sign<br />banish frĺn alla rums.");
define("A_SHEET2_7", "Ta bort förvisning för markerade användare(s)");
define("A_SHEET2_8", "Här finns inga förvisade användare.");
define("A_SHEET2_9", "Orsak (valfri)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Lista över existerande kanaler");
define("A_SHEET3_2", "Rensa \"nej-Standard\" rummet blir borttagen av all ordningsman<br />status för denna rum.");
define("A_SHEET3_3", "Rensa markerad rums");
define("A_SHEET3_4", "Här finns ej rum för Rensning.");

// Frame for sending mails
define("A_SHEET4_0", "Du har inte ställt in admin epost i inställningarna.");
define("A_SHEET4_1", "Skicka e-post");
define("A_SHEET4_2", "Till:");
define("A_SHEET4_3", "Markera alla");
define("A_SHEET4_4", "Ämne:");
define("A_SHEET4_5", "Meddelande:");
define("A_SHEET4_6", "Skicka");
define("A_SHEET4_7", "All e-post blev Skickade.");
define("A_SHEET4_8", "Fel uppstĺg med sänding av e-post.");
define("A_SHEET4_9", "Address(s), ämne eller meddelande saknas!");

// Frame for configuration
define("A_SHEET5_0", "Ditt phpMyChat-Plus installations version är %s");
define("A_SHEET5_1", "Det finns ny version released (%s)!");
?>