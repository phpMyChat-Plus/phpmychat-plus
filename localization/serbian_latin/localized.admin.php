<?php
// File : serbian_latin/localized.admin.php - plus version (20.05.2008 - rev.12)
// Original translation by Vedran Vučić <vedran.vucic@gnulinuxcentar.org>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administracija za %s");
define("A_MENU_1", "Registrovani korisnici");
define("A_MENU_11", "Registrovan korisnik");
define("A_MENU_2", "Zabranjeni korisnici");
define("A_MENU_21", "Zabranjena korisnik");
define("A_MENU_3", "Očisti sobe");
define("A_MENU_4", "Pošalji mailove");
define("A_MENU_5", "Konfiguracija");
define("A_MENU_6", "Čet dodaci");
define("A_MENU_7", "Pretraga");
define("A_MENU_8", "Konekcije");
define("A_MENU_9", "Log arhive");
define("A_LOGOUT", "Odjava");

// Frame for registered users
define("A_SHEET1_1", "Lista registrovanih korisnika i njihove dozvole");
define("A_SHEET1_2", "Korisničko ime");
define("A_SHEET1_3", "Dozvole");
define("A_SHEET1_4", "Moderisane sobe");
define("A_SHEET1_5", "Moderisane sobe su odvojene zapetom (,) bez razmaka.");
define("A_SHEET1_6", "Ukloni označene profile");
define("A_SHEET1_7", "Promene");
define("A_SHEET1_8", "Nema registrovanih korisnika osim vas.");
define("A_SHEET1_9", "Zabrani označene profile");
define("A_SHEET1_10", "Sada treba da pređete na ’".A_MENU_2."’ tabelu da označite vaš izbor.");
define("A_SHEET1_11", "Poslednji konektovani");
define("A_SHEET1_12", "Razlog zabrane (opciono)");
define("A_USER", "Korisnik");
define("A_MODER", "Moderator");
define("A_TOPMOD", "Najviši moderator");
define("A_ADMIN", "Administrator");
define("A_PAGE_CNT", "Strana %s od %s");

// Frame for banished users
define("A_SHEET2_1", "Lista zabranjenih korisnika i razmatranih soba");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Sobe");
define("A_SHEET2_4", "Do");
define("A_SHEET2_5", "nema kraja");
define("A_SHEET2_6", "Sobe su odvojene zapetama bez razmaka (,) ako ih ima manje od 4, onda ’<B>*</B>’ zabrani u svim sobama.");
define("A_SHEET2_7", "Ukloni zabranu sa označenih korisnika");
define("A_SHEET2_8", "Nema zabranjenih korisnika.");
define("A_SHEET2_9", "Razlog (opciono)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Lista postojećih soba");
define("A_SHEET3_2", "Brisanjem \"nepretpostavljene\" sobe ćete da očistite sve moderatoske<br />statuse za ovu sobu.");
define("A_SHEET3_3", "Briši odabrane sobe");
define("A_SHEET3_4", "Nema soba za brisanje.");

// Frame for sending mails
define("A_SHEET4_0", "Niste upisali administratorski email u ’".A_MENU_5."’ tabu.");
define("A_SHEET4_1", "Pošalji e-mailove");
define("A_SHEET4_2", "Za:");
define("A_SHEET4_3", "Odaberi sve");
define("A_SHEET4_4", "Tema:");
define("A_SHEET4_5", "Poruka:");
define("A_SHEET4_6", "Pošalji sada!");
define("A_SHEET4_7", "Sve e-mail poruke su poslate.");
define("A_SHEET4_8", "Interna greška za vreme slanja poruka.");
define("A_SHEET4_9", "Primalac(i), tema ili poruka nedostaje!");
define("A_SHEET4_10", "Dodaj emailove, odvojene zapetama bez razmaka (,)");
define("A_SHEET4_11", "Potpis");
define("A_SHEET4_12", "Deselektuj sve");

// Frame for configuration
define("A_SHEET5_0", "Vaš instalirana verzija je %s");
define("A_SHEET5_1", "Izašla je nova verzija (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Čet dodaci onemogućeni") ;
define("A_REFRESH_MSG", "Ponovo učitaj poruke") ;
define("A_MSG_DEL", "Izbriši") ;
define("A_POST_TIME", "Poslato na") ;
define("A_FROM_TO", "Od › Za") ;
define("A_FROM", "Od") ;
define("A_CHTEX_ROOM", "Soba") ;
define("A_CHTEX_MSG", "Poruka") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Logovi IP konekcija do %s");
define("A_CHAT_LOGS_2", "Čet Arhiva je onemogućena");
define("A_CHAT_LOGS_3", "Otvori Čet IP logovi stranu");
define("A_CHAT_LOGS_4", "Izbriši IP logove");
define("A_CHAT_LOGS_5", "Ovo će da izbriše IP log datoteku!\\n");
define("A_CHAT_LOGS_6", "Puna Čet Log Arhiva");
define("A_CHAT_LOGS_7", "Pokažisekciju javne čet arhive");
define("A_CHAT_LOGS_8", "Ovo će izbrisati sve datoteke i fascikle\\nsmeštene u %s fascikli!\\n"); // year
define("A_CHAT_LOGS_9", "Izbriši sve %s logove"); // year
define("A_CHAT_LOGS_10", "Izbriši godinu");
define("A_CHAT_LOGS_11", "Ovo će izbrisati sve datoteke\\nsmeštene u %s fascikli!\\n"); // month/year
define("A_CHAT_LOGS_12", "(samo za javne)");
define("A_CHAT_LOGS_13", "Izbriši mesec");
define("A_CHAT_LOGS_14", "Ovo će izbrisati %s datoteku!\\n"); // day.php file
define("A_CHAT_LOGS_15", "Izbrišite ovaj log");
define("A_CHAT_LOGS_16", "Čitaj %s log"); // day month year
define("A_CHAT_LOGS_17", "Arhiva Javnih Čet Logova");
define("A_CHAT_LOGS_18", "(samo javni)");
define("A_CHAT_LOGS_19", "\\nOvo se nemože opozvati...\\nDa li ste sigurni?");
define("A_CHAT_LOGS_20", "Pokaži sekciju punih čet arhiva");
define("A_CHAT_LOGS_21", "Idite na vrh");
define("A_CHAT_LOGS_22", "Arhivirana log datoteka");
define("A_CHAT_LOGS_23", "Generisano %s"); // Generated on "date"
define("A_CHAT_LOGS_24", "Komprimuj %s logove u zip arhivu"); // date
define("A_CHAT_LOGS_25", "Sada će se kreirati zip sa svim logovima\\nsačuvanim u %s fascikli!\\n"); // month/year
define("A_CHAT_LOGS_26", "\\nDa li ste sigurni?");
define("A_CHAT_LOGS_27", "Zip arhive");
define("A_CHAT_LOGS_28", "Prevuci %s");
define("A_CHAT_LOGS_29", "Izbriši ovaj zip");

//Admin Search Page
define("A_SEARCH_1", "Strana za pretragu čet soba");
define("A_SEARCH_2", "Sve kategorije");
define("A_SEARCH_3", "Imena");
define("A_SEARCH_4", "IP Adresa");
define("A_SEARCH_5", "Dozvole");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Rod");
define("A_SEARCH_8", "Opis");
define("A_SEARCH_9", "Veze");
define("A_SEARCH_10", "Pretraga");
define("A_SEARCH_11", "Za kategoriju dozvola, opcije su <b>ad</b>, <b>mod</b> ili <b>u</b>.");
define("A_SEARCH_12", "Za kategoriju roda opcije su: <b>0</b> za Neodređen, <b>1</b> za Muški, <b>2</b> za Ženski ili <b>3</b> za Par.");
define("A_SEARCH_13", "Korisničko ime");
define("A_SEARCH_14", "Ime");
define("A_SEARCH_15", "Prezime");
define("A_SEARCH_16", "Država");
define("A_SEARCH_18", "Dozvola");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Rod");
define("A_SEARCH_21", "Traži reč");
define("A_SEARCH_22", "Traži sa");
define("A_SEARCH_23", "Upišite reč koju tražite i pokušajte ponovo");
define("A_SEARCH_24", "Nema podataka koji se podudaraju sa vašim krietrijima. Molimo vas da precizirate pretragu.");
define("A_SEARCH_25", "Moderirajte ovog korisnika");

// Connected users Page
define("A_LURKING_1", "Konektovani korisnici i Posmatrači") ;
define("A_LURKING_2", "Posmatranje je onemogućeno.") ;
?>