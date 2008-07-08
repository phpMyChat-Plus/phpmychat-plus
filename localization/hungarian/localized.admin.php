<?php
// File : hungarian/localized.admin.php - plus version (07.07.2008 - rev.13)
// Original file by Jácint Zsuzsanna <pycco8@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Adminisztráció a %s-hoz");
define("A_MENU_1", "Regisztrált felhasználók");
define("A_MENU_11", "Regisztrált felhasználó");
define("A_MENU_2", "Tiltott felhasználók");
define("A_MENU_21", "Tiltott felhasználó");
define("A_MENU_3", "Szobák törlése");
define("A_MENU_4", "Levélküldés");
define("A_MENU_5", "Beállítások");
define("A_MENU_6", "Chat extrák");
define("A_MENU_7", "Keresés");
define("A_MENU_8", "Kapcsolódások");
define("A_MENU_9", "Log archívum");
define("A_LOGOUT", "Kilépés");

// Frame for registered users
define("A_SHEET1_1", "A regisztrált felhasználók és jogosultságaik listája");
define("A_SHEET1_2", "Felhasználói név");
define("A_SHEET1_3", "Jogosultságok");
define("A_SHEET1_4", "Moderált szobák");
define("A_SHEET1_5", "A moderált szobák vesszővel legyenek elválasztva egymástól (,) szóközök nélkül!");
define("A_SHEET1_6", "A kijelölt felhasználók törlése");
define("A_SHEET1_7", "Módosítás");
define("A_SHEET1_8", "Nincs regisztrált felhasználó, kivéve téged.");
define("A_SHEET1_9", "Az kijelölt felhasználók tiltása");
define("A_SHEET1_10", "Most menj ’".A_MENU_2."’ lapjára, hogy finomítsd a beállításaidat.");
define("A_SHEET1_11", "Utolsó bejelentkezés");
define("A_SHEET1_12", "A tiltás oka (tetszőleges)");
define("A_USER", "Felhasználó");
define("A_MODER", "Moderátor");
define("A_TOPMOD", "Top Moderátor");
define("A_ADMIN", "Adminisztrátor");
define("A_PAGE_CNT", "%s / %s oldal");

// Frame for banished users
define("A_SHEET2_1", "A tiltott felhasználók és az érintett szobák listája");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Az érintett szobák");
define("A_SHEET2_4", "Meddig");
define("A_SHEET2_5", "mindig");
define("A_SHEET2_6", "A szobák vesszővel legyenek elválasztva egymástól (,) ha kevesebb mint 4 van,<br />egyéb esetben írj egy ’<B>*</B>’ -ot, hogy az összes szobából kitiltsd.");
define("A_SHEET2_7", "A tiltás feloldása a kijelölt felhasználó(k)nak");
define("A_SHEET2_8", "Nincsenek tiltott felhasználók.");
define("A_SHEET2_9", "Indok (tetszőleges)");

// Frame for cleaning rooms
define("A_SHEET3_1", "A létező szobák listája");
define("A_SHEET3_2", "Egy \"nem-alapértelmezett\" szoba üzeneteinek törlése<br />a moderátori státuszokat is törölni fogja az adott szobában.");
define("A_SHEET3_3", "A kijelölt szobá(k) üzeneteinek törlése");
define("A_SHEET3_4", "Nincs törölni való szoba.");

// Frame for sending mails
define("A_SHEET4_0", "Nem adtad meg az admin email címét a ’".A_MENU_5."’ lapján.");
define("A_SHEET4_1", "E-mail küldése");
define("A_SHEET4_2", "Címzett(ek):");
define("A_SHEET4_3", "Mindet kiválasztja");
define("A_SHEET4_4", "Tárgy:");
define("A_SHEET4_5", "Üzenet:");
define("A_SHEET4_6", "Küldés most!");
define("A_SHEET4_7", "Minden e-mail elküldve.");
define("A_SHEET4_8", "Belső hiba az email-ek küldése közben.");
define("A_SHEET4_9", "A cím(ek), a tárgy vagy az üzenet hiányzik!");
define("A_SHEET4_10", "A listán nem található e-mail címek hozzáadása:<br />vesszőkkel elválasztva, szóközök nélkül (,)");
define("A_SHEET4_11", "Aláírás");
define("A_SHEET4_12", "Az összes kiválasztás visszavonása");

// Frame for configuration
define("A_SHEET5_0", "A te telepített verziód: %s");
define("A_SHEET5_1", "Új verzió elérhető (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "A chat extrák ki vannak kapcsolva.") ;
define("A_REFRESH_MSG", "Üzenetek frissítése") ;
define("A_MSG_DEL", "Törlés") ;
define("A_POST_TIME", "Küldés időpontja") ;
define("A_FROM_TO", "Kitől › Kinek") ;
define("A_FROM", "Kitől") ;
define("A_CHTEX_ROOM", "Szoba") ;
define("A_CHTEX_MSG", "Üzenet") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Az IP bejelentkezések archívuma a(z) %s-hoz");
define("A_CHAT_LOGS_2", "A Chat archívum ki van kapcsolva");
define("A_CHAT_LOGS_3", "A Chat IP log archívumának megnyitása");
define("A_CHAT_LOGS_4", "A Chat IP log-ok visszaállítása");
define("A_CHAT_LOGS_5", "Ez archiválja és visszaállítja az IP log fájlokat!\\n");
define("A_CHAT_LOGS_6", "Teljes Chat Log Archívum");
define("A_CHAT_LOGS_7", "A publikus chat archívum mutatása");
define("A_CHAT_LOGS_8", "Ez kitörli az összes %s nevű\\nmappában tárolt fájlt és mappát!\\n"); // year
define("A_CHAT_LOGS_9", "Az egész %s-as/es chat log archívum törlése"); // year
define("A_CHAT_LOGS_91", "Az egész %s chat log archívum törlése"); // year
define("A_CHAT_LOGS_10", "Az egész év törlése");
define("A_CHAT_LOGS_11", "Ez kitörli az összes %s\\nnevű mappában tárolt fájlt!\\n"); // month/year
define("A_CHAT_LOGS_12", "(csak a publikusak)");
define("A_CHAT_LOGS_13", "Az egész hónap törlése");
define("A_CHAT_LOGS_14", "Ez törölni fogja a(z) %s fáljt!\\n"); // day.php file
define("A_CHAT_LOGS_15", "Ennek az archívumnak a törlése");
define("A_CHAT_LOGS_16", "A %s log olvasása"); // day month year
define("A_CHAT_LOGS_17", "Publikus Chat Logs Archívum");
define("A_CHAT_LOGS_18", "(csak a publikus)");
define("A_CHAT_LOGS_19", "\\nEz nem visszavonható...\\nBiztos vagy benne, hogy ezt akarod?");
define("A_CHAT_LOGS_20", "A teljes chat archívum mutatása ");
define("A_CHAT_LOGS_21", "Vissza az oldal tetejére");
define("A_CHAT_LOGS_22", "Archivált Log Fájl");
define("A_CHAT_LOGS_23", "Létrehozás dátuma: %s"); // Generated on "date"
define("A_CHAT_LOGS_24", "Tömörítsd az összes %s log-ot egy zip archívumba"); // date
define("A_CHAT_LOGS_25", "Ez létrehoz egy tömörített mappát az összes\\nlog-gal a %s mappában tárolva.\\n"); // month/year
define("A_CHAT_LOGS_26", "\\nBiztos vagy benne, hogy ezt akarod?");
define("A_CHAT_LOGS_27", "Zip (tömörített mappa) archívum");
define("A_CHAT_LOGS_28", "%s letöltése");
define("A_CHAT_LOGS_29", "Zip (tömörített mappa) törlése");
define("A_CHAT_LOGS_30", "IP archívumok");
define("A_CHAT_LOGS_31", "Teljes méret %s %s");
define("A_CHAT_LOGS_32", "Fájl");
define("A_CHAT_LOGS_33", "Mappa");
define("A_CHAT_LOGS_34", "%s sikeresen törölve: %s");
define("A_CHAT_LOGS_35", "%s sikeresen létrehozva: %s");
define("A_CHAT_LOGS_36", "%s nem létezik: %s");
define("A_CHAT_LOGS_37", "%s nem lehet törölni: %s");
define("A_CHAT_LOGS_38", "%s nem lehet létrehozni: %s");
define("A_CHAT_LOGS_39", "%s írásvédett: %s");
define("A_CHAT_LOGS_40", "Hiba lépett fel a fájl mentése közben: %s"); // filename

//Admin Search Page
define("A_SEARCH_1", "Keresés a chat szobákban");
define("A_SEARCH_2", "Összes kategória");
define("A_SEARCH_3", "Nevek");
define("A_SEARCH_4", "IP címek");
define("A_SEARCH_5", "Jogosultságok");
define("A_SEARCH_6", "E-mail címek");
define("A_SEARCH_7", "Nemek");
define("A_SEARCH_8", "Leírás");
define("A_SEARCH_9", "Linkek");
define("A_SEARCH_10", "Keresés");
define("A_SEARCH_11", "Választási lehetőségek a Jogosultságok kategórához: <b>ad</b>, <b>mod</b> és <b>u</b>.");
define("A_SEARCH_12", "Választási lehetőségek a Nemek kategóriához: <b>0</b> a nincs megadva-hoz, <b>1</b> a Férfihez, <b>2</b> a Nőhöz és <b>3</b> a Pár.");
define("A_SEARCH_13", "Felhasználói név");
define("A_SEARCH_14", "Vezetéknév");
define("A_SEARCH_15", "Keresztnév");
define("A_SEARCH_16", "Ország");
define("A_SEARCH_18", "Jogosultság");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Nem");
define("A_SEARCH_21", "Keresett kifejezés");
define("A_SEARCH_22", "Keresés helye");
define("A_SEARCH_23", "Kérlek, adj meg egy kifejezést és próbáld újra!");
define("A_SEARCH_24", "Nincs adat, ami egyezik a megadott kritériumokkal. Kérlek, finomítsd a keresést.");
define("A_SEARCH_25", "Moderálni ezt a felhasználót");

// Connected users Page
define("A_LURKING_1", "Bejelentkezett felhasználók és a Leskelődők") ;
define("A_LURKING_2", "Leskelődés kikapcsolva.") ;
?>