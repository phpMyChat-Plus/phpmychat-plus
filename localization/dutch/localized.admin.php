<?php
// File : dutch/localized.admin.php - plus version (25.09.2007 - rev.10)
// Original translation by Corbesir <rock@jascrc.com>
// Updates, corrections and additions for the Plus version by DJE Amesz & Romanesko  Genieusdanny@gmail.com and Bert Moorlag <berbia@hotmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administratie voor %s");
define("A_MENU_1", "Geregistreerde gebruikers");
define("A_MENU_2", "Verbannen gebruikers ");
define("A_MENU_3", "Leeg ruimtes");
define("A_MENU_4", "Verstuur E-mails");
define("A_MENU_5", "Configuratie");
define("A_MENU_6", "Chat extraás");
define("A_MENU_7", "Zoek");
define("A_MENU_8", "Verbindingen");
define("A_MENU_9", "Log archief");
define("A_LOGOUT", "Uitloggen");

// Frame for registered users
define("A_SHEET1_1", "lijst van geregistreerde gebruikers en hun rechten");
define("A_SHEET1_2", "Gebruikersnaam");
define("A_SHEET1_3", "Rechten");
define("A_SHEET1_4", "Gemodereerde ruimtes");
define("A_SHEET1_5", "Gemodereerde ruimtes worden geschijden door kommaás (,) zonder spaties.");
define("A_SHEET1_6", "Verwijder aangevinkte namen");
define("A_SHEET1_7", "Veranderen");
define("A_SHEET1_8", "Er zijn geen geregistreerde gebruikers behalve jezelf.");
define("A_SHEET1_9", "Verban gevinkte namen");
define("A_SHEET1_10", "Ga nu naar de verbannen gebruikers tab om je keuzes te bekijken.");
define("A_SHEET1_11", "Laatst online");
define("A_SHEET1_12", "Reden van de verbaning (optioneel)");
define("A_USER", "Gebruikers");
define("A_MODER", "Moderator");
define("A_TOPMOD", "Top Moderator");
define("A_ADMIN", "Administrator");
define("A_PAGE_CNT", "Pagina %s van %s");

// Frame for banished users
define("A_SHEET2_1", "Lijst van verbannen gebruikers en betrokken ruimtes");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Betrokken ruimtes");
define("A_SHEET2_4", "Tot");
define("A_SHEET2_5", "eindeloos");
define("A_SHEET2_6", "Ruimtes zijn gescheiden door kommaás (,) als het minder zijn dan 4, anders het ’<B>*</B>’ teken voor verbanning van alle ruimtes.");
define("A_SHEET2_7", "Verwijder de ban voor gevinkte namen");
define("A_SHEET2_8", "Er zijn geen verbannen gebruikers.");
define("A_SHEET2_9", "Reden (optioneel)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Lijst met alle beschikbare kamers");
define("A_SHEET3_2", "Maak een \"niet standaard\" kamer leeg zal ook de moderator verwijderen.");
define("A_SHEET3_3", "Maak geselecteerde ruimtes schoon");
define("A_SHEET3_4", "Er zijn geen ruimtes om te legen.");

// Frame for sending mails
define("A_SHEET4_0", "Je hebt nog niet de admin email ingevuld in de Configuratie.");
define("A_SHEET4_1", "Verstuur e-mails");
define("A_SHEET4_2", "Aan:");
define("A_SHEET4_3", "Alles selecteren");
define("A_SHEET4_4", "Onderwerp:");
define("A_SHEET4_5", "Boodschap:");
define("A_SHEET4_6", "Verzenden!");
define("A_SHEET4_7", "Alle e-mails zijn verstuurd.");
define("A_SHEET4_8", "Fout tijdens versturen van email.");
define("A_SHEET4_9", "Adressen,onderwerp of boodschap mist!");
define("A_SHEET4_10", "Voeg extra email toe,<br />gescheiden door een komma zonder spatie (,)");
define("A_SHEET4_11", "Handtekening");
define("A_SHEET4_12", "Deselecteer Alles");

// Frame for configuration
define("A_SHEET5_0", "Uw geinstaleerde phpMyChat-Plus versie is %s");
define("A_SHEET5_1", "Er is een nieuwe versie te krijgen (%s)!");
//Chat Extras
define("A_EXTR_DSBL", "Chat Extras staat uit") ;
define("A_REFRESH_MSG", "Ververs Berichten") ;
define("A_MSG_DEL", "Verwijder") ;
define("A_POST_TIME", "Gepost op") ;
define("A_FROM_TO", "Van  Naar") ;
define("A_FROM", "Van") ;
define("A_CHTEX_ROOM", "Kamer") ;
define("A_CHTEX_MSG", "Bericht") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Logs van IP Connections naar %s"); // phpMyChat (app name)
define("A_CHAT_LOGS_2", "Chat Archief staat uit");
define("A_CHAT_LOGS_3", "Open Chat IP logs pagina");
define("A_CHAT_LOGS_4", "Verwijder Chat IP logs");
define("A_CHAT_LOGS_5", "Dit zal de IP logs file verwijderen!\\n");
define("A_CHAT_LOGS_6", "Volledige Chat Logs Archief");
define("A_CHAT_LOGS_7", "Laat gebruikers zien’ chat archief sectie");
define("A_CHAT_LOGS_8", "Dit zal alle files en mappen verwijderen\\ndie in de %s map staan!\\n"); // year
define("A_CHAT_LOGS_9", "Verwijder alle %s logs"); // year
define("A_CHAT_LOGS_10", "Verwijder Jaar");
define("A_CHAT_LOGS_11", "Dit zal alle files verwijderen\\ndie staan in de %s map!\\n"); // month/year
define("A_CHAT_LOGS_12", "(alleen de algemenen)");
define("A_CHAT_LOGS_13", "Verwijder Maand");
define("A_CHAT_LOGS_14", "Dit zal alle %s file verwijderen!\\n"); // day
define("A_CHAT_LOGS_15", "Verwijder deze log");
define("A_CHAT_LOGS_16", "Lees %s log"); // day month year
define("A_CHAT_LOGS_17", "Gebruikers’ Chat Logs Archief");
define("A_CHAT_LOGS_18", "(alleen de algemene)");
define("A_CHAT_LOGS_19", "\\nHet is onomkeerbaar...\\nWeet je het zeker?");
define("A_CHAT_LOGS_20", "Laat de volledige chat archief sectie zien");
define("A_CHAT_LOGS_21", "Naar boven");
define("A_CHAT_LOGS_22", "Gearchiveerde Log File");
define("A_CHAT_LOGS_23", "Gemaakt op %s");

//Admin Search Page
define("A_SEARCH_1", "Chatroom Zoek Pagina");
define("A_SEARCH_2", "Alle categoriën");
define("A_SEARCH_3", "Namen");
define("A_SEARCH_4", "IP Adressen");
define("A_SEARCH_5", "Permissie´s");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Geslacht");
define("A_SEARCH_8", "Omschrijving");
define("A_SEARCH_9", "Links");
define("A_SEARCH_10", "Zoeken");
define("A_SEARCH_11", "Voor Permissie Category, zijn de optie´s  <b>ad</b>, <b>mod</b> or <b>u</b>.");
define("A_SEARCH_12", "Voor het Geslacht Category, zijn de optie´s <b>0</b> voor Niet Invullen, <b>1</b> voor Man, of <b>2</b> voor Vrouw.");
define("A_SEARCH_13", "Gebruikersnaam");
define("A_SEARCH_14", "Voornaam");
define("A_SEARCH_15", "Achternaam");
define("A_SEARCH_16", "Land");
define("A_SEARCH_18", "Permissie");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Geslacht");
define("A_SEARCH_21", "Zoek Term");
define("A_SEARCH_22", "Zoeken op");
define("A_SEARCH_23", "Vul een andere zoekterm in en probeer opnieuw!");

// Connected users Page
define("A_LURKING_1", "Ingelogde gebruikers en gluurders") ;
define("A_LURKING_2", "Gluren uitgezet.") ;
?>