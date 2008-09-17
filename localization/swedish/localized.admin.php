<?php
// File : swedish/localized.admin.php - plus version (26.08.2008 - rev.14)
// Original file by Martin Edelius <martin.edelius@spirex.se>
// Updates, corrections and additions for the Plus version by Heikki <heikki@yttervik.be> & Fimpen Högström <fimpen@relative-work.se>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administration för %s");
define("A_MENU_1", "Registrerad användare");
define("A_MENU_11", "Registrerad användare");
define("A_MENU_2", "Förvisade användare");
define("A_MENU_21", "Förvisade användare");
define("A_MENU_3", "Töm rum");
define("A_MENU_4", "Sänd epost");
define("A_MENU_5", "Inställningar");
define("A_MENU_6", "Chatt Extras");
define("A_MENU_7", "Sök");
define("A_MENU_8", "Anslutningar");
define("A_MENU_9", "Log Arkiv");
define("A_LOGOUT", "Logga ut");

// Frame for registered users
define("A_SHEET1_1", "Lista över registred användare och deras rättighet");
define("A_SHEET1_2", "Användarnamn");
define("A_SHEET1_3", "Rättigheter");
define("A_SHEET1_4", "Modererade kanaler");
define("A_SHEET1_5", "Modererade kanaler är separerade med komma (,) utan mellanslag.");
define("A_SHEET1_6", "Radera markerade användarprofiler");
define("A_SHEET1_7", "Ändra");
define("A_SHEET1_8", "Här finns inga andra registred användare förutom du själv.");
define("A_SHEET1_9", "Stäng av markerade användare");
define("A_SHEET1_10", "Och nu måste du byta till ’".A_MENU_2."’ för att finjustera dina val.");
define("A_SHEET1_11", "Senaste anslutningstillfälle");
define("A_SHEET1_12", "Förvisnings orsak (valfri)");
define("A_SHEET1_13", "Tillåtna rum");
define("A_SHEET1_14", "Alla rum tillåtna");
define("A_SHEET1_15", "Alla rum");
define("A_SHEET1_16", "Följande rums inskränkningar skall aktiveras i ’".A_MENU_5."’ formuläret.");
define("A_USER", "Användare");
define("A_MODER", "Moderator");
define("A_TOPMOD", "ChefsModerator");
define("A_ADMIN", "Administratör");
define("A_PAGE_CNT", "Sidan %s av %s");

// Frame for banished users
define("A_SHEET2_1", "Lista över förvisade användare och berörda rum");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Berörda rum");
define("A_SHEET2_4", "Fram till");
define("A_SHEET2_5", "utan slut");
define("A_SHEET2_6", "Rum är separerad med kommatecken utan mellanslag (,) om dem är mindre än 4,<br />i annat fall gör ’<B>*</B>’ sign banish från alla rum.");
define("A_SHEET2_7", "Ta bort förvisning för markerade användare");
define("A_SHEET2_8", "Här finns inga förvisade användare.");
define("A_SHEET2_9", "Orsak (valfri)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Lista över existerande rum");
define("A_SHEET3_2", "Rensa \"Icke-Standard\" rummet blir borttagen av all moderator<br />status för detta rum.");
define("A_SHEET3_3", "Rensa markerad rum");
define("A_SHEET3_4", "Det finns inga rum för Rensning.");
define("A_SHEET3_5", "Du har inte gjort något urval. Välj minst en plats i listan nedan.");

// Frame for sending mails
define("A_SHEET4_0", "Du har inte ställt in admin epost i inställningarna.");
define("A_SHEET4_1", "Skicka e-post");
define("A_SHEET4_2", "Till:");
define("A_SHEET4_3", "Markera alla");
define("A_SHEET4_4", "Ämne:");
define("A_SHEET4_5", "Meddelande:");
define("A_SHEET4_6", "Skicka");
define("A_SHEET4_7", "All e-post blev skickat.");
define("A_SHEET4_8", "Fel uppstod med sänding av e-post.");
define("A_SHEET4_9", "Adress(er), ämne eller meddelande saknas!");
define("A_SHEET4_10", "Lägg till extra mailadresser, separerade av kommatecken utan mallanslag (,)");
define("A_SHEET4_11", "Signatur");
define("A_SHEET4_12", "Bocka av alla");

// Frame for configuration
define("A_SHEET5_0", "Din nuvarnade installations version är %s");
define("A_SHEET5_1", "Det finns ny version released (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Chat Extras borttaget");
define("A_REFRESH_MSG", "Förnya Meddelande");
define("A_MSG_DEL", "Ta bort"); // short for Delete
define("A_POST_TIME", "Postat vid");
define("A_FROM_TO", "Från › Till");
define("A_FROM", "Från");
define("A_CHTEX_ROOM", "Rum");
define("A_CHTEX_MSG", "Meddelande");

//Save chat logs
define("A_CHAT_LOGS_1", "Loggning av IP Connections till %s"); // phpMyChat (app name)
define("A_CHAT_LOGS_2", "Chat Logg har blivit borttaget");
define("A_CHAT_LOGS_3", "Öppna Chat IP logg sidan");
define("A_CHAT_LOGS_4", "Nollställ Chat IP loggen");
define("A_CHAT_LOGS_5", "Detta kommer arkivera och nollställa IP loggfilen!\\n");
define("A_CHAT_LOGS_6", "Fullständigt Chat Logg");
define("A_CHAT_LOGS_7", "Visa den öppna delen av användarnas loggarkiv");
define("A_CHAT_LOGS_8", "Detta kommer att radera alla filer och\\nmappar sparade i %s mappen!\\n"); // year
define("A_CHAT_LOGS_9", "Radera alla %s loggar"); // year
define("A_CHAT_LOGS_10", "Radera år");
define("A_CHAT_LOGS_11", "Detta kommer att radera alla filer\\nsparade i %s mappen!\\n"); // month/year
define("A_CHAT_LOGS_12", "(bara den publika delen)");
define("A_CHAT_LOGS_13", "Radera månad");
define("A_CHAT_LOGS_14", "Detta kommer att radera %s fil!\\n"); // day
define("A_CHAT_LOGS_15", "Radera denna logg");
define("A_CHAT_LOGS_16", "Läs %s logg"); // day month year
define("A_CHAT_LOGS_17", "Publik Chat Logg Arkiv");
define("A_CHAT_LOGS_18", "(bara den publika delen)");
define("A_CHAT_LOGS_19", "\\nDetta är oåterkalleligt...\\nÄr du säker?");
define("A_CHAT_LOGS_20", "Visa hela loggarkivet");
define("A_CHAT_LOGS_21", "Gå till toppen");
define("A_CHAT_LOGS_22", "Arkiverad Logg Fil");
define("A_CHAT_LOGS_23", "Genererad på %s");
define("A_CHAT_LOGS_24", "Komprimera alla %s loggar till en zipfil"); // date
define("A_CHAT_LOGS_25", "Detta kommer skapa en zipfil av alla logger\\nsom sparas %s i mapp!\\n"); // month/year
define("A_CHAT_LOGS_26", "\\nÄr du säker?");
define("A_CHAT_LOGS_27", "Zip arkiv");
define("A_CHAT_LOGS_28", "Ladda hem %s");
define("A_CHAT_LOGS_29", "Radera denna zipfil");
define("A_CHAT_LOGS_30", "IP arkiv");
define("A_CHAT_LOGS_31", "Total storlek %s %s");
define("A_CHAT_LOGS_32", "Fil");
define("A_CHAT_LOGS_33", "Mapp");
define("A_CHAT_LOGS_34", "%s lyckosamt raderat: %s");
define("A_CHAT_LOGS_35", "%s lyckosamt skapat: %s");
define("A_CHAT_LOGS_36", "%s existerar inte: %s");
define("A_CHAT_LOGS_37", "%s kan inte bli raderad: %s");
define("A_CHAT_LOGS_38", "%s kan inte skapas: %s");
define("A_CHAT_LOGS_39", "%s skrivskyddad: %s");
define("A_CHAT_LOGS_40", "Fel uppstod vid sparande av filen: %s"); // filename

//Admin Search Page
define("A_SEARCH_1", "Chatrums söksida");
define("A_SEARCH_2", "Alla kategorier");
define("A_SEARCH_3", "Namn");
define("A_SEARCH_4", "IP Adress");
define("A_SEARCH_5", "Permissions");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Kön");
define("A_SEARCH_8", "Beskrivning");
define("A_SEARCH_9", "Länkar");
define("A_SEARCH_10", "Sök");
define("A_SEARCH_11", "För Permissions kategori, välj mellan <b>ad</b>, <b>mod</b> eller <b>u</b>.");
define("A_SEARCH_12", "För Köns kategori, välj mellan <b>0</b> för Ospecificerad, <b>1</b> för Kille, <b>2</b> för Tjej eller <b>3</b> för Par.");
define("A_SEARCH_13", "Användarnamn");
define("A_SEARCH_14", "Förnamn");
define("A_SEARCH_15", "Efternamn");
define("A_SEARCH_16", "Land");
define("A_SEARCH_18", "Rättigheter");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Kön");
define("A_SEARCH_21", "Sök ord");
define("A_SEARCH_22", "Sök i");
define("A_SEARCH_23", "Vänligen skriv ett sökord och försök igen!");
define("A_SEARCH_24", "Din sökning gav ingen träff. Vänligen ändra dina sökkriterier.");
define("A_SEARCH_25", "Ändra denna användaren");

// Connected users Page
define("A_LURKING_1", "Inloggade användare och Lurkare");
define("A_LURKING_2", "Lurkning satt ur funktion.");
?>