<?php
// File : danish/localized.admin.php - plus version (13.06.2011 - rev.15)
// Original translation by Kenneth Kristiansen <kk@linuxfreak.adsl.dk>
// Updates, corrections and additions for the Plus version by Bente Feldballe
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administration for %s");
define("A_MENU_1", "Registrerede brugere");
define("A_MENU_11", "Registreret bruger");
define("A_MENU_2", "Forvis brugere");
define("A_MENU_21", "Forvist bruger");
define("A_MENU_3", "Ryd chatrum");
define("A_MENU_4", "Send mails");
define("A_MENU_5", "Konfiguration");
define("A_MENU_6", "Chat extras");
define("A_MENU_7", "Søg");
define("A_MENU_8", "Oversigt");
define("A_MENU_9", "Log arkiv");
define("A_MENU_1a", "Profiler");
define("A_MENU_2a", "Statistik");
define("A_MOD_DEV", "Mod under udarbejdelse");
define("A_LOGOUT", "Log ud");

// Frame for registered users
define("A_SHEET1_1", "Liste over registrerede brugere og deres rettigheder");
define("A_SHEET1_2", "Brugernavn");
define("A_SHEET1_3", "Rettigheder");
define("A_SHEET1_4", "Modererede rum");
define("A_SHEET1_5", "Modererede rum er kommaseparerede (,) uden mellemrum.");
define("A_SHEET1_6", "Slet markerede profiler");
define("A_SHEET1_7", "Udfør ændring");
define("A_SHEET1_8", "Der er ingen registrerede brugere ud over dig selv.");
define("A_SHEET1_9", "Forvis markerede profiler");
define("A_SHEET1_10", "Du skal nu gå til fanen ’".A_MENU_2."’ hvor du kan finpudse dine valg.");
define("A_SHEET1_11", "Sidst tilsluttet");
define("A_SHEET1_12", "Forvisningsgrund (valgfri)");
define("A_SHEET1_13", "Rum med adgangstilladelse");
define("A_SHEET1_14", "Adgang tilladt for alle");
define("A_SHEET1_15", "Adgang forbudt for alle");
define("A_SHEET1_16", "Adgangsinddragelser for rummet skal også aktiveres på fanen ’".A_MENU_5."’.");
define("A_USER", "Bruger");
define("A_MODER", "Moderator");
define("A_TOPMOD", "Top Moderator");
define("A_ADMIN", "Administrator");
define("A_PAGE_CNT", "Side %s af %s");

// Frame for banished users
define("A_SHEET2_1", "Liste over forviste brugere og berørte chatrum");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Berørte chatrum");
define("A_SHEET2_4", "Indtil");
define("A_SHEET2_5", "for altid");
define("A_SHEET2_6", "Rummene er kommaseparerede uden mellemrum (,) hvis der er færre end 4, ellers markerer tegnet ’<B>*</B>’ udelukkelse fra alle rum.");
define("A_SHEET2_7", "Ophæv forvisning for markerede bruger(e)");
define("A_SHEET2_8", "Der er ingen forviste brugere.");
define("A_SHEET2_9", "Begrundelse (valgfri)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Liste over eksisterende chatrum");
define("A_SHEET3_2", "Rydning af et \"non-default\" chatrum vil også slette status for alle moderatorer<br />for dette rum.");
define("A_SHEET3_3", "Ryd markerede chatrum");
define("A_SHEET3_4", "Der er ingen chatrum at rydde.");
define("A_SHEET3_5", "Du har ikke valgt. Vælg venligst mindst et rum fra listen herunder");

// Frame for sending mails
define("A_SHEET4_0", "Du har ikke sendt admin e-mailen i Konfigurationstabellen.");
define("A_SHEET4_1", "Send e-mails");
define("A_SHEET4_2", "Til:");
define("A_SHEET4_3", "Vælg alle");
define("A_SHEET4_4", "Emne:");
define("A_SHEET4_5", "Meddelelse:");
define("A_SHEET4_6", "Send nu!");
define("A_SHEET4_7", "Alle e-mails er sendt.");
define("A_SHEET4_8", "Intern fejl under afsendelse af e-mails.");
define("A_SHEET4_9", "Modtager(e), emne eller besked mangler!");
define("A_SHEET4_10", "Tilføj e-mail-adresser adskilt af (,) og uden mellemrum");
define("A_SHEET4_11", "Underskrift");
define("A_SHEET4_12", "Fravælg alle");
define("A_SHEET4_13", "Sæt alle modtagere i <b>’Bcc’</b>");

// Frame for configuration
define("A_SHEET5_0", "Din version er %s");
define("A_SHEET5_1", "Der findes en nyere version (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Chat Extras deaktiveret") ;
define("A_REFRESH_MSG", "Opdatér Meddelelser") ;
define("A_MSG_DEL", "Slet") ;
define("A_POST_TIME", "Postet den") ;
define("A_FROM_TO", "Fra › Til") ;
define("A_FROM", "Fra") ;
define("A_CHTEX_ROOM", "Rum") ;
define("A_CHTEX_MSG", "Meddelelse") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Logs over IP Forbindelser til %s");
define("A_CHAT_LOGS_2", "Chat Arkiv er deaktiveret");
define("A_CHAT_LOGS_3", "Åben siden Chat IP logs");
define("A_CHAT_LOGS_4", "Nulstil Chattens IP log-fil");
define("A_CHAT_LOGS_5", "Denne handling vil arkivere og nulstille Chattens IP log-fil!\\n");
define("A_CHAT_LOGS_6", "Komplet Chat Log Arkiv");
define("A_CHAT_LOGS_7", "Vis det offentlige chat arkiv");
define("A_CHAT_LOGS_8", "Denne handling sletter alle filer og mapper\\ngemt i mappen %s !\\n"); // year
define("A_CHAT_LOGS_9", "Slet alle %s logs"); // year
define("A_CHAT_LOGS_10", "Slet år");
define("A_CHAT_LOGS_11", "Denne handling sletter alle filer\\ngemt i mappen %s !\\n"); // month/year
define("A_CHAT_LOGS_12", "(kun offentlige)");
define("A_CHAT_LOGS_13", "Slet måned");
define("A_CHAT_LOGS_14", "Denne handling sletter filen %s !\\n"); // day.php file
define("A_CHAT_LOGS_15", "Slet denne log");
define("A_CHAT_LOGS_16", "Læs %s log"); // day month year
define("A_CHAT_LOGS_17", "Offentligt Chat Log Arkiv");
define("A_CHAT_LOGS_18", "(kun offentlige)");
define("A_CHAT_LOGS_19", "\\nDenne handling kan ikke fortrydes...\\nEr du sikker?");
define("A_CHAT_LOGS_20", "Vis det komplette chat arkiv");
define("A_CHAT_LOGS_21", "Gå til toppen");
define("A_CHAT_LOGS_22", "Arkiveret Logfil");
define("A_CHAT_LOGS_23", "Oprettet den %s"); // Generated on "date"
define("A_CHAT_LOGS_24", "Komprimér alle %s logfiler til et zip-arkiv"); // date
define("A_CHAT_LOGS_25", "Der dannes en zip-fil med alle logfiler\\ngemt i %s mappen!\\n"); // month/year
define("A_CHAT_LOGS_26", "\\nEr du sikker?");
define("A_CHAT_LOGS_27", "Zip-arkiver");
define("A_CHAT_LOGS_28", "Download %s");
define("A_CHAT_LOGS_29", "Slet denne zip-fil");
define("A_CHAT_LOGS_30", "IP-arkiver");
define("A_CHAT_LOGS_31", "Samlet volumen %s %s");
define("A_CHAT_LOGS_32", "Fil");
define("A_CHAT_LOGS_33", "Mappe");
define("A_CHAT_LOGS_34", "%s slettet: %s");
define("A_CHAT_LOGS_35", "%s oprettet: %s");
define("A_CHAT_LOGS_36", "%s eksisterer ikke: %s");
define("A_CHAT_LOGS_37", "%s kunne ikke slettes: %s");
define("A_CHAT_LOGS_38", "%s kunne ikke oprettes: %s");
define("A_CHAT_LOGS_39", "%s skrivebeskyttet: %s");
define("A_CHAT_LOGS_40", "Fejl under lagring af fil: %s"); // filename

//Admin Search Page
define("A_SEARCH_1", "Chatrum Søgeside");
define("A_SEARCH_2", "Alle kategorier");
define("A_SEARCH_3", "Navne");
define("A_SEARCH_4", "IP Adresser");
define("A_SEARCH_5", "Tilladelser");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Køn");
define("A_SEARCH_8", "Beskrivelse");
define("A_SEARCH_9", "Links");
define("A_SEARCH_10", "Søg");
define("A_SEARCH_11", "For Kategorier af Tilladelser er mulighederne <b>ad</b>, <b>mod</b> eller <b>u</b>.");
define("A_SEARCH_12", "For Kategorier af Køn er mulighederne: <b>0</b> for Uspecificeret, <b>1</b> for Mand, <b>2</b> for Kvinde eller <b>3</b> for Par.");
define("A_SEARCH_13", "Brugernavn");
define("A_SEARCH_14", "Fornavn");
define("A_SEARCH_15", "Efternavn");
define("A_SEARCH_16", "Land");
define("A_SEARCH_18", "Tilladelse");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Køn");
define("A_SEARCH_21", "Søgeord");
define("A_SEARCH_22", "Søg på");
define("A_SEARCH_23", "Indtast et Søgeord og Prøv Igen");
define("A_SEARCH_24", "Ingen data matcher dine søgekriterier. Søg venligst igen.");
define("A_SEARCH_25", "Moderér denne bruger");

// Connected users Page
define("A_LURKING_1", "Tilsluttede brugere og lurepassere");
define("A_LURKING_2", "Lurepasning deaktiveret.");

// Statistics Page
define("A_STATS_1", "Chat statistik-oversigt");
define("A_STATS_2", "Dataindsamling started den %s"); //date
define("A_STATS_3", "Generel statistik (Altid)");
define("A_STATS_4", "Detaljeret statistik (Sidste % dages aktivitet)"); //number of days
define("A_STATS_5", "Statistik deaktiveret");
define("A_STATS_6", "Top %s"); //Top 10 or Top 5
?>