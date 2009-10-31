<?php
// File : hungarian/localized.chat.php - plus version (14.02.2009 - rev.42)
// Original file by Jácint Zsuzsanna <pycco8@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' but use  ’  instead (utf-8 edit bug)

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Útmutató");

define("L_WEL_1", "Az üzenetek megtartási ideje %s %s");	// X hours/hour
define("L_WEL_2", "az inaktív felhasználók %s %s után törlődnek a szobákból");	// Y minutes/minute

define("L_CUR_1", "Jelenleg");
define("L_CUR_1a", "");
define("L_CUR_1b", "");
define("L_CUR_2", "van bejelentkezve");
define("L_CUR_3", "Felhasználó van a szobákban");
define("L_CUR_4", "Felhasználó a privát szobákban");
define("L_CUR_5", "Jelenlegi leskelődő felhasználó(k)<br />(figyeli(k) ezt az oldalt):");	// means break (next row)

define("L_SET_1", "Bejelentkezés");
define("L_SET_2", "Felhasználói név");
define("L_SET_3", "megjelenítendő üzenetek száma");
define("L_SET_4", "frissítési időkorlát");
define("L_SET_5", "Szoba kiválasztása");
define("L_SET_6", "Alapértelmezett publikus szobák");
define("L_SET_7", "Válassz nemet...");
define("L_SET_8", "Felhasználók által létrehozott publikus szobák");
define("L_SET_9", "Hozd létre a saját");
define("L_SET_10", "publikus");
define("L_SET_11", "privát");
define("L_SET_12", "szobádat");
define("L_SET_13", "");
define("L_SET_14", "Belépés");
define("L_SET_15", "Alapértelmezett privát szobák");
define("L_SET_16", "Felhasználók által létrehozott privát szobák");
define("L_SET_17", "Válaszd ki az avatar-odat");
define("L_SET_18", "Tedd a Kedvencek közé: \"Ctrl+D\".");

define("L_SRC", "szabadon letölthető a következő helyről");

define("L_SECS", "másodperc");
define("L_MIN", "perc");
define("L_MINS", "perc");
define("L_HOUR", "óra");
define("L_HOURS", "óra");

// registration stuff:
define("L_REG_1", "Jelszó");
define("L_REG_2", "Profilkezelő");
define("L_REG_3", "Regisztráció");
define("L_REG_4", "Profil szerkesztése");
define("L_REG_5", "Felhasználó törlése");
define("L_REG_6", "Felhasználó regisztrálása");
define("L_REG_7", "csak ha már regisztráltad magad");
define("L_REG_8", "E-mail cím");
define("L_REG_9", "Sikeresen regisztráltál.");
define("L_REG_10", "Vissza");
define("L_REG_11", "Szerkesztés");
define("L_REG_12", "Felhasználói információk módosítása");
define("L_REG_13", "Felhasználó törlése");
define("L_REG_14", "Bejelentkezés");
define("L_REG_15", "Belépés");
define("L_REG_16", "Módosítás");
define("L_REG_17", "Az információkat sikeresen frissítetted.");
define("L_REG_18", "Bocsi, a moderátor kidobott a szobából.");
define("L_REG_18a", "Bocsi, a moderátor kidobott a szobából.<br />Indok: %s");	// %s is the actual reason (e.g. “for spamming”)
define("L_REG_19", "Biztos, hogy törölni akarod magad?");
define("L_REG_20", "Igen");
define("L_REG_21", "Sikeresen törölted magad a regisztrált felhasználók közül.");
define("L_REG_22", "Nem");
define("L_REG_25", "Bezárás");
define("L_REG_30", "Vezetéknév");
define("L_REG_31", "Keresztnév");
define("L_REG_32", "Weboldal");
define("L_REG_33", "e-mail megjelenítése a publikus információkban");
define("L_REG_34", "Felhasználói profil szerkesztése");
define("L_REG_35", "Adminisztráció");
define("L_REG_36", "Hely/Ország");
define("L_REG_37", "A <span class=\"error\">*</span>-gal jelölt mezők kitöltése kötelező.");
define("L_REG_39", "Az adminisztrátor kitörölte a szobát, amelyben voltál.");
define("L_REG_43", "Titkos");
define("L_REG_44", "Pár");
define("L_REG_45", "Nem");
define("L_REG_46", "Férfi");
define("L_REG_47", "Nő");
define("L_REG_48", "Nincs megadva");
define("L_REG_49", "Regisztráció szükséges!");
define("L_REG_50", "A regisztráció felfüggesztve!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "A belépéshez szükséges beállítások");
define("L_EMAIL_VAL_2", "Üdvözöl a chat szerver!");
define("L_EMAIL_VAL_Err", "Belső hiba! Lépj kapcsolatba az adminisztrátorral: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "A jelszavadat elküldtük az e-mail címedre.<br />A jelszavadat megváltoztathatod a belépési oldalon, a \"".L_REG_4."\" menüpontban.");
define("L_EMAIL_VAL_PENDING_Done", "A regisztrált adatod bírálatra vár.");
define("L_EMAIL_VAL_PENDING_Done1", "Megkapod a jelszót, amint az adminisztrátor elfogadja a regisztrációdat.");
define("L_EMAIL_VAL_3", "A regisztrációd fűggőben van %s");
define("L_EMAIL_VAL_31", "Gratulálunk! A regisztrációdat visszaigazolták és érvényesítették.");
define("L_EMAIL_VAL_32", "Regisztráltál a %s chat-en, a %s: címen"); //chat name at chaturl
define("L_EMAIL_VAL_4", "Regisztáltál a következőn: %s az alábbi címen: %s:"); //chat name at chaturl
define("L_EMAIL_VAL_41", "Megváltoztattál egy fontos adatot az alábbi felhasználói fiókban: %s ezen a címen: %s (felhasználói fiók tulajdonosa: %s)."); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "A - %s - felhasználói fiók adatai, a következőhöz: %s"); //username - chatname
define("L_EMAIL_VAL_51", "A - %s - felhasználói fiók frissített adatai, a következőhöz: %s"); //username - chatname
define("L_EMAIL_VAL_6", "Regisztrálva: %s");
define("L_EMAIL_VAL_61", "Frissítve: %s");
define("L_EMAIL_VAL_7", "Alább láthatod a %s felhasználói fiókod frissített adatait:"); //username
define("L_EMAIL_VAL_8", "Mentsd el ezt az e-mail-t, hogy a jövőben hivatkozni tudj rá!\nTartsd biztonságos helyen, és senkivel ne oszd meg az információkat!\nKöszönjük, hogy csatlakoztál! Jó szórakozást!");
define("L_EMAIL_VAL_81", "A jelszavadat megváltoztathatod a belépési oldalon, a \"".L_REG_4."\" menüpontban.");

// admin stuff
define("L_ADM_1", "%s már nem moderátor ebben a szobában.");	// username/nickname
define("L_ADM_2", "Már nem vagy regisztrált felhasználó.");

// error messages
define("L_ERR_USR_1", "Ez a felhasználói név már foglalt. Válassz egy másikat.");
define("L_ERR_USR_2", "Adj meg egy felhasználói nevet!");
define("L_ERR_USR_3", "Ez a felhasználói név már regisztrálva van.<br />Írd be a jelszót, vagy válassz egy másik felhasználói nevet!");
define("L_ERR_USR_4", "Rossz jelszót adtál meg.");
define("L_ERR_USR_5", "Írd be a felhasználói neved!");
define("L_ERR_USR_6", "Írd be a jelszavad!");
define("L_ERR_USR_7", "Írd be az e-mail címedet!");
define("L_ERR_USR_8", "Ne kamuzz, a rendes címedet add meg!");
define("L_ERR_USR_9", "Ez a felhasználói név már foglalt.");
define("L_ERR_USR_10", "Rossz felhasználói név vagy jelszó.");
define("L_ERR_USR_11", "Csak adminisztrátoroknak.");
define("L_ERR_USR_12", "Te vagy az adminisztrátor, ezért nem tudod eltávolítani magad.");
define("L_ERR_USR_13", "Saját szoba létrehozásához regisztrálnod kell magad.");
define("L_ERR_USR_14", "A beszélgetés előtt regisztrálnod kell magad.");
define("L_ERR_USR_15", "Írd be a teljes neved!");
define("L_ERR_USR_16", "Csak ezek az extra-karakterek használhatóak:\\n".$REG_CHARS_ALLOWED."\\nSzóközöket, vesszőket és fordított perjeleket (\\) nem használhatsz.\\nÜgyelj a nyelvhelyességre!");
define("L_ERR_USR_16a", "Csak ezek az extra-karakterek használhatóak:<br />".$REG_CHARS_ALLOWED."<br />Szóközöket, vesszőket és fordított perjeleket (\\) nem használhatsz. Ügyelj a nyelvhelyességre!");
define("L_ERR_USR_17", "Ez a szoba nem létezik, és a szobát sajnos nem is hozhatod létre.");
define("L_ERR_USR_18", "Tiltott szó a felhasználói névben.");
define("L_ERR_USR_19", "Nem lehetsz egyszerre több szobában!");
define("L_ERR_USR_20", "Ki vagy tiltva ebből a szobából vagy a teljes chat-ből.");
define("L_ERR_USR_20a", "Ki vagy tiltva ebből a szobából vagy a teljes chat-ből.<br />Indok: %s");
define("L_ERR_USR_21", "Nem voltál aktív az utóbbi ".C_USR_DEL." percben,<br />ezért a program kidobott a szobából.");
define("L_ERR_USR_22", "Ez a parancs nem használható\\naz általad használt böngészőben (IE motor).");
define("L_ERR_USR_23", "Privát szobába való belépéshez regisztrálnod kell.");
define("L_ERR_USR_24", "Saját szoba létrehozásához regisztrálnod kell.");
define("L_ERR_USR_25", "Csak a adminisztrátorok használhatják ".$COLORNAME." ezt a színt!<br />Ne próbáld használni ezeket a színeket sem: ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." és ".COLOR_CM2.".<br />Ezek a jogosultságokkal rendelkező felhasználók számára vannak fenntartva.");
define("L_ERR_USR_26", "Csak a adminisztrátorok és a moderátorok használhatják ".$COLORNAME." ezt a színt!<br />Ne próbáld használni ezeket a színeket sem: ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." és ".COLOR_CM2.".<br />Ezek a jogosultságokkal rendelkező felhasználók számára vannak fenntartva.");
define("L_ERR_USR_27", "Nem beszélgethetsz magaddal magán üzenetben.\\Ezt tedd meg fejben, kérlek...\\nÉs most válassz szépen egy másik felhasználói nevet.");
define("L_ERR_USR_28", "A belépésed a(z) %s szobába megtagadva.<br />Kérlek, válassz egy másik szobát!"); // room name
define("L_ERR_ROM_1", "A szoba nevében nem lehet vessző vagy vissza per-jel (\\).");
define("L_ERR_ROM_2", "Tiltott szó a létrehozni kívánt szoba nevében.");
define("L_ERR_ROM_3", "Ez a szoba már létezik, és publikus.");
define("L_ERR_ROM_4", "Érvénytelen szobanév.");

// users frame or popup
define("L_EXIT", "Kilépés");
define("L_DETACH", "Felhasználók listájának leválasztása");
define("L_EXPCOL_ALL", "Mindet mutatja/bezárja");
define("L_CONN_STATE", "Kapcsolat állapotának frissítése");
define("L_CHAT", "Chat");
define("L_USER", "felhasználó");
define("L_USERS", "felhasználó");
define("L_LURKER", "leskelődő");
define("L_LURKERS", "leskelődő");
define("L_NO_USER", "Nincs itt senki");
define("L_ROOM", "szoba");
define("L_ROOMS", "szoba");
define("L_EXPCOL", "Szoba mutatása/bezárása");
define("L_BEEP", "Van/nincs hangjelzés felhasználó belépésekor");
define("L_PROFILE", "Profil megjelenítése");
define("L_NO_PROFILE", "Nincs profil");

// input frame
define("L_HLP", "Súgó");
define("L_MODERATOR", "%s most már moderator ebben a szobában."); 	// username/nickname
define("L_KICKED", "%s sikeresen kidobva."); 	// username/nickname
define("L_KICKED_REASON", "%s sikeresen kidobva. (Indok: %s)"); 	// username/nickname and reason
define("L_KICKED_ALL", "Minden felhasználó sikeresen kiléptetve.");
define("L_KICKED_ALL_REASON", "Minden felhasználó sikeresen kiléptetve. (Indok: %s)");
define("L_BANISHED", "%s sikeresen letiltva."); 	// username/nickname
define("L_BANISHED_REASON", "%s sikeresen letiltva. (Indok: %s)"); 	// username/nickname and reason
define("L_ANNOUNCE", "FELHÍVÁS");
define("L_INVITE", "%s megkér, hogy csatlakozz hozzá a <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> szobában."); 	// username/nickname and room name as invitation link
define("L_INVITE_REG", "Regisztrálnod kell magad, hogy beléphess ebbe a szobába.");
define("L_INVITE_DONE", "Meghívásod elküldve a következő felhasználónak: %s."); 	// username/nickname
define("L_OK", "Küldés");
define("L_BUZZ", "Buzz Galéria");
define("L_BAD_CMD", "Érvénytelen parancs!");
define("L_ADMIN", "%s most már adminisztrátor."); 	// username/nickname
define("L_IS_MODERATOR", "%s most már moderator."); 	// username/nickname
define("L_NO_MODERATOR", "Csak ennek a szobának a moderátora használhatja ezt a parancsot.");
define("L_NONEXIST_USER", "%s nem tartózkodik a szobában."); 	// username/nickname
define("L_NONREG_USER", "%s nem regisztrált."); 	// username/nickname
define("L_NONREG_USER_IP", "Az IP címe: %s."); 	// IP address
define("L_NO_KICKED", "%s a moderátor vagy az adminisztrátor, így nem lehet kidobni."); 	// username/nickname
define("L_NO_BANISHED", "%s a moderátor vagy az adminisztrátor, így nem lehet letiltani."); 	// username/nickname
define("L_SVR_TIME", "Szerver idő: ");
define("L_NO_SAVE", "Nincs elmentendő üzenet.");
define("L_NO_ADMIN", "Csak az adminisztrátor használhatja ezt a parancsot.");
define("L_NO_REG_USER", "Regisztrálnod kell magad, hogy használhasd ezt a parancsot.");

// help popup
define("L_HELP_TIT_1", "Smilie-k");
define("L_HELP_TIT_2", "Szövegformázó üzenetek");
define("L_HELP_FMT_1", "Az üzenetekben használhatsz félkövér, dőlt és aláhúzott szövegeket a megfelelő szövegrész kijelölésével. Használd a &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; és &lt;U&gt; &lt;/U&gt; tagokat.<br />Például: &lt;B&gt;ez a szöveg&lt;/B&gt; <B>így jelenik meg</B>.");
define("L_HELP_FMT_2", "Hyperlink létrehozásához (egy e-mail-hez vagy URL-hez) az üzenetedben, csak gépeld be a megfelelő címet mindenféle egyéb kód nélkül. A hyperlink automatikusan létrejön.");
define("L_HELP_TIT_3", "Parancsok");
define("L_HELP_NOTE", "Minden parancsot angolul kell használni!");
define("L_HELP_MSG", "üzenet");
define("L_HELP_MSGS", "üzenet");
define("L_HELP_ROOM", "szoba");
define("L_HELP_BUZZ", "~hangnév");
define("L_HELP_REASON", "oka");
define("L_HELP_MR", "Mr.");
define("L_HELP_MS", "Ms.");
define("L_HELP_CMD_0", "A {} kötelező beállítást, a [] pedig nem kötelező beállítást jelöl.");
define("L_HELP_CMD_1a", "A megjelenítendő üzenetek száma. A minimális - és egyben alapértelmezett - érték az 5.");
define("L_HELP_CMD_1b", "Üzenetek újratöltése, és a legutolsó n darab üzenet megjelenítése. A minimális - és egyben alapértelmezett - érték az 5.");
define("L_HELP_CMD_2a", "Üzenetlista frissítési késleltetésének módosítása (másodpercekben).<br />Ha az n érték nincs megadva, vagy kisebb mint 3, akkor a nincs frissítés és a 10 másodperc között lehet váltogatni.");
define("L_HELP_CMD_2b", "Üzenetlista frissítési késleltetésének módosítása (másodpercekben).<br />Ha az n érték nincs megadva, vagy kisebb mint 3, akkor a nincs frissítés és a 10 másodperc között lehet váltogatni.");
define("L_HELP_CMD_3", "Üzenetek sorrendjének megfordítása (nem minden böngészőben).");
define("L_HELP_CMD_4", "Belépés egy másik szobába, vagy létrehozása, ha még nem létezik, és a felhasználónak van jogosultsága szobák létrehozására.<br />Az n értéke a saját szobáknál 0, a nyilvános szobáknál pedig 1. Az alapértelmezett érték az 1.");
define("L_HELP_CMD_5", "Kilépés a chatből egy választható üzenet megjelenítése után.");
define("L_HELP_CMD_6", "Adott felhasználó üzeneteinek mellőzése, ha a felhasználói név meg van adva.<br />Adott felhasználó üzenetinek mellőzése, ha a felhasználó neve és a - együtt van megadva, illetve minden felhasználó üzenetinek mellőzése, ha a - van megadva felhasználói név nélkül.<br />Ha nincs megadva kapcsoló, akkor ez a parancs egy ablakban megjeleníti az összes mellőzött felhasználót.");
define("L_HELP_CMD_7", "Az előzőleg beírt szöveg ismételt megjelenítése (parancs vagy üzenet).");
define("L_HELP_CMD_8", "Az idő megjelenítése/elrejtése az üzenetek előtt.");
define("L_HELP_CMD_9", "Felhasználó kidobása a szobából. Ezt a parancsot csak az adott szoba moderátora vagy egy admin használhatja.<br />Kérésre a [".L_HELP_REASON."] megmutatja a kidobás okát (bármilyen szöveg).<br />Ha a *-os opció van kiválasztva, a parancs kidob a szobából minden vendéget és regisztrált felhasználót (moderátorokat és adminisztrátorokat nem). Ez hasznos, amikor a szerver kapcsolatnak problémái vannak, és minden embernek frissítenie kéne a chat oldalt. Más esetben egy [".L_HELP_REASON."] ajánlott, hogy a felhasználók tudják, miért lettek kidobva.");
define("L_HELP_CMD_10", "Privát üzenet küldése a megadott felhasználónak (a többi felhasználónak nem jelenik meg).");
define("L_HELP_CMD_11", "Információk megjelenítése egy adott felhasználóról.");
define("L_HELP_CMD_12", "Felhasználói profil-szerkesztő felugró ablak.");
define("L_HELP_CMD_13", "Felhasználói belépés/kilépés megjelenítése/elrejtése az adott szobában.");
define("L_HELP_CMD_14", "Adminisztrátorok és moderátorok felhatalmazása arra, hogy egy regisztrált felhasználót az adott szoba moderátorává tegyenek.");
define("L_HELP_CMD_15", "Üzenetek törlése és csak az utolsó 5 üzenet megjelenítése.");
define("L_HELP_CMD_16", "Az utolsó n üzenet HTML fájlba mentése (az értesítések kivételével). Ha az n nincs megadva, akkor az összes lehetséges üzenetet menti.");
define("L_HELP_CMD_17", "Az adminisztrátor ezzel a paranccsal üzenetet küldhet az összes szoba összes felhasználójának.");
define("L_HELP_CMD_18", "Másik szobában beszélgető felhasználó meghívása abba a szobába, amelyben vagy.");
define("L_HELP_CMD_19", "A szoba moderátora vagy az adminisztrátor ezzel a paranccsal kitilthat egy felhasználót a szobából az adminisztrátor által megadott időre.<br />Más szobában beszélgető felhasználót is kitilthat a * beállítással \"örökre\" a teljes chat-ről.<br />Kérésre [".L_HELP_REASON."] megmutatja a kitiltás okát (bármilyen szöveg).");
define("L_HELP_CMD_20", "Leírja, hogy éppen mit csinálsz.");
define("L_HELP_CMD_21", "Bejelenti szobának, és azoknak a felhasználóknak, akik üzenetet próbálnak küldeni neked,<br />hogy nem vagy a számítógépnél. Ha meg akarod mutatni, hogy visszajöttél, csak gépelj be valamit.");
define("L_HELP_CMD_22", "Figyelmeztető hang küldése és egy üzenet megmutatása az adott szobában.<br />- Használat:<br />- régi használat: \"/buzz\" vagy \"/buzz megjelenítendő üzenet\" – ez lejátsza az alapértelmezett hangot amit az Admin panelben megadtak;<br />- kibővített használat: \"/buzz ~hangnév\" or \"/buzz ~hangnév megjelenítendő üzenet\" – ez lejátsza a hangnév.wav fájlt a plus/sounds mappából; figyelj oda, hogy a \"~\" jelet a második szó elején használd, ami a hang fájl neve kiterjesztés nélkül .wav (csak .wav kiterjesztés megengedett).<br />Alapbeállítás esetén, ez moderátori/admin parancs.");
define("L_HELP_CMD_23", "<i>Whisper</i> (privát üzenet) küldése. Az üzenet eléri a címzettet, nem számít, hogy a felhasználó melyik szobában van. Ha a fehasználó nem elérhető vagy nincs gépnél, értesítést kapsz róla.");
define("L_HELP_CMD_24", "Használat: a témának legalább 2 szóból kell állnia.<br />Ez a parancs megváltoztatja a jelenlegi szoba témáját. Próbáld meg figyelembe venni a többi felhasználó témáját is. Jelölj meg fontos témákat!<br />Alapbeállítás esetén, ez moderátori/admin parancs.<br />Ha a \"/topic top reset\" parancsot használod, az éppen használt téma törlődik, és visszaáll a szoba alapértelmezett témájára.<br />Bizonyos esetekben a \"/topic * {}\" és \"/topic * top reset\" pontosan ugyanazt csinálják, de az összes szobában (global topic és global topic reset).");
define("L_HELP_CMD_25", "Egy kockajáték véletlenszerű számokkal.<br />Használat: /dice vagy /dice [n];<br />n bármilyen érték lehet <b>1 és %s között</b> (megmutatja a kockák számát). Ha nincs megadva szám, akkor az alapértelmezett-maximum kockák száma fog szerepelni.");
define("L_HELP_CMD_26", "Ez egy összetettebb változata a /dice parancsnak.<br />Használat: /{n1}d[n2] or /{n1}d;<br />n1 bármilyen érték lehet <b>1 és %s között</b> (megmutatja kockák számát dobásonként).<br />n2 bármilyen érték lehet <b>1 és %s között</b> (megmutatja a kockánkénti oldalak számát).");
define("L_HELP_CMD_27", "Kijelöli bizonyos felhasználók üzeneteit, hogy könnyebb legyen követni a beszélgetést.<br />Használat: /high {user} vagy klikkelj a kis <img src=./images/highlightOff.gif> képre a felhasználói név job oldalán (a szoba/felhasználó listán)");
define("L_HELP_CMD_28", "Lehetővé teszi <i>egy kép</i> üzenetként való elküldését.<br />Használat: A képnek az interneten kell lennie, és fontos, hogy bárki számára elérhető legyen. Ne használj olyan oldalakat, amihez be kell jelentkezni.<br />A kép teljes linkjét be kell másolni! Például:<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Engedélyezett kiterjesztések: .jpg .bmp .gif .png. Nem mindegy, hogy milyen esetben használod a linket!<br />TIPP: gépeld: /img aztán egy szóközt és másold az URL-t a szövegdobozba; hogy megkapd egy weboldalon lévő kép URL-jét, jobb-kattintás a képre, menj a tulajdonságokba, aztán jelöld ki a teljes címet/URL-t (néha lejjebb kell görgetni egy kicsit) aztán másol/beilleszt a kód után: /img<br />Ne használd a számítógépeden lévő képeket: ez csak tönkreteszi a csetablakot!!!");
define("L_HELP_CMD_29", "A második parancs engedélyezi az adminisztrátornak vagy egy adott szoba moderátor(ai)ának, hogy egy másik, korábban, ugyanabban a szobában moderátorrá előléptetett regisztrált felhasználót lefokozzon.<br />A * opció lefokozza a felhasználót az összes szobában.");
define("L_HELP_CMD_30", "A második parancs ugyanazt csinálja, mint a /me de mutatni fogja a te saját nemedet<br />Például * ".L_HELP_MR." Carlos TV-t néz vagy ".L_HELP_MS." Dolly boldog.");
define("L_HELP_CMD_31", "Megválaszthatod a felhasználók sorrendjét a listákon: belépési idő vagy ábécé sorrend.");
define("L_HELP_CMD_32", "Ez a harmadik (szerepjáték) változata a kockázásnak.<br />Használat: /d{n1}[tn2] vagy /d{n1};<br />n1 bármilyen érték lehet <b>1 és 100 között</b> (megmutatja a kockánkénti oldalak számát).<br />n2 bármilyen érték lehet <b>1 és %s között</b> (megmutatja a kockák számát dobásonként).");
define("L_HELP_CMD_33", "Megváltoztathatod a betűméretet a felhasználók kívánsága szerint (a megengedett értékek n-re: <b>7 és 15 között</b>); a /size parancs visszaállítja a betűméretet az alapértelmezett értékre (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Chat Etikett");
define("L_HELP_ETIQ_2", "A honlapunk szeretné megőrizni a barátságos és vidám közösségét, így kérlek tartsd be az útmutatóban közölt szabályainkat. Ha nem tartod be a szabályokat, a moderátorok közül valaki kidobhat a chat-ből.<br /><br />Köszönjük,");
define("L_HELP_ETIQ_3", "Chat Etikett Útmutatók");
define("L_HELP_ETIQ_4", "<li>Ne legyen \"spam\" a chat-en: ne gépelj be értelmetlen vagy véletlenszerű betűket!</li>
<li>Ne használj váLtAkOzó karaktereket!</li>
<li>Használj minél kevesebb CAPS-LOCK-ot, hiszen ez kiabálásnak számít a chat-en.</li>
<li>Tartsd észben, hogy a chat használói a világ minden tájáról érkeznek, és sokszor kell számolnod eltérő vallású emberekkel. Kérlek, légy kedves és udvarias velük!</li>
<li>Ne legyél durva a többi felhasználóval szemben! Vagyis, ne használj trágár kifejezéseket és/vagy káromkodásokat!</li>
<li>Ne szólítsd a többi felhasználót az igazi nevén, mert nem biztos, hogy jó szemmel nézik. Inkább használd a felhasználói nevüket.</li>");

// messages frame
define("L_NO_MSG", "Jelenleg nincs üzenet...");
define("L_TODAY_DWN", "A ma küldött üzenetek alul kezdődnek");
define("L_TODAY_UP", "A ma küldött üzenetek felül kezdődnek");

// message colors
$TextColors = array("fekete" => "#000000",
				"piros" => "#FF0000",
				"zöld" => "#009900",
				"kék" => "#0000FF",
				"lila" => "#9900FF",
				"bordó" => "#990000",
				"sötétzöld" => "#006600",
				"sötétkék" => "#000099",
				"gesztenyebarna" => "#996633",
				"vízkék" => "#006699",
				"répasárga" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Mellőzőtt");
define("L_IGNOR_NON", "Nincs mellőzött felhasználó");

// whois popup
define("L_WHOIS_ADMIN", "Adminisztrátor");
define("L_WHOIS_OWNER", "Tulajdonos");
define("L_WHOIS_TOPMOD", "Top Moderátor");
define("L_WHOIS_MODER", "Moderátor");
define("L_WHOIS_MODERS", "Moderátorok");
define("L_WHOIS_OTHERS", "Egyéb felhasználók");
define("L_WHOIS_USER", "Felhasználó");
define("L_WHOIS_GUEST", "Vendég");
define("L_WHOIS_REG", "Regisztrált");
define("L_WHOIS_BOT", "Bot"); // Robot

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s belépett a szobába.");
define("L_EXIT_ROM", "%s kilépett a szobából.");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM . L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s-t automatikusan kidobta a rendszer inaktivitás miatt.");
define("L_CLOSED_ROM", "%s bezárta a böngészőjét.");

// Text for /away command notification string:
define("L_AWAY", "%s nincs a gépnél...");
define("L_BACK", "%s visszajött!");

// Quick Menu mod
define("L_QUICK", "Gyors Menü");

// Topic Banner mod
define("L_TOPIC", "módósította a TÉMÁT erre:");
define("L_TOPIC_RESET", "visszaállította a TÉMÁT");
define("L_HELP_TOP", "témának legalább két szót");
define("L_BANNER_WELCOME", "Üdvözlünk itt: %s!");
define("L_BANNER_TOPIC", "Téma:");
define("L_DEFAULT_TOPIC_1", "Ez egy alapértelmezett téma. Szerkeszd ezt a fájt: localization/_owner/owner.php hogy megváltoztasd!");

// Img cmd mod
define("L_PIC", "A kép küldője:");
define("L_PIC_RESIZED", "Méret módosítása erre:");
define("L_HELP_IMG", "az elküldött kép teljes elérési útja");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s már egyik szobában sem moderátor.");
define("L_IS_NO_MODERATOR", "%s nem moderátor.");
define("L_ERR_IS_ADMIN", "%s az adminisztrátor!\\nNem tudod módosítani a jogosultságait.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "Extra parancsok:");
define("INFO_MODS", "Extra tulajdonságok/mod-ok:");
define("INFO_BOT", "Az elérhető bot:");

// Profile mod
define("L_PRO_1", "Beszélt nyelvek");
define("L_PRO_2", "Kedvenc link 1");
define("L_PRO_3", "Kedvenc link 2");
define("L_PRO_4", "Bemutatkozás");
define("L_PRO_5", "Kép URL");
define("L_PRO_6", "Név/Szöveg színe");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "Érvénytelen URL vagy nem-létező szerver.");
define("L_TITLE_AV", "A jelenlegi avatar: ");
define("L_CHG_AV", "Kattints erre: \"".L_REG_16."\" a Profilodban<br />hogy tárold az avatarod.");
define("L_SEL_NEW_AV", "Válassz új avatart");
define("L_EX_AV", "példa");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Másold be az URL-t, aztán üss egy ENTER-t, hogy láthasd!)");
define("L_CANCEL", "Mégse");
define("L_AVA_REG", "Regisztrálnod kell\\nhogy megváltoztasd az avatar-od");
define("L_SEL_NEW_AV_CONFIRM", "Ez az űrlap nem lett jóvágyhagyva.\\nHa most az avatar-okhoz mész, elveszíted\\naz összes változtatást, amit eddig csináltál.\\n\\nBiztos vagy benne?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPP: A bot-unk nyilvánosan is aktív. Hogy a bot-tal beszélhess, gépeld be ezt: <b>hello ".C_BOT_NAME."</b>. A beszélgetés befejezéséhez gépeld be ezt: <b>bye ".C_BOT_NAME."</b>. (privát: /to <b>".C_BOT_NAME."</b> üzenet)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPP: A bot-unk nyilvánosan is aktív a következő szobában: %s. Csak PM-ben, (privát üzenetben) beszélhetsz vele, a nevére kattintva, valamint “suttogva”. (parancs: /wisp <b>".C_BOT_NAME."</b> üzenet)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPP: A bot-unk nem aktív nyílvánosan. Csak PM-ben, (privát üzenetben) beszélhetsz vele, a nevére kattintva. (parancsok: /to <b>".C_BOT_NAME."</b> üzenet vagy /wisp <b>".C_BOT_NAME."</b> üzenet)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "A bot nem működik ebben a szobában.");
define("BOT_START_ERROR", "A bot már működik ebben a szobában.");
define("BOT_DISABLED_ERROR", "A bot-ot nem engedélyezik az admin panel-en.");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "eldobta a kockákat, az eredmény:");
define("DICE_WRONG", "Ki kell választanod, hogy hány kockával szeretnél dobni\\n(Válassz egy számot 1 és ".MAX_ROLLS." között).\\nCsak gépeld be ezt: /dice hogy mindegyikkel dobj ".MAX_ROLLS." kocka.");
define("DICE2_WRONG", "A második értéknek 1 és ".MAX_ROLLS." között kell lennie.\\nHagyd üresen, ha mindegyiket használni akarod ".MAX_ROLLS." kocka\\n(pl. /".MAX_DICES."d vagy /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Az első értéknek 1 és ".MAX_DICES." között kell lennie.\\n(pl. /".MAX_DICES."d vagy /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Az első (d) értéknek 1 és 100 között kell lennie.\\nA második (t) értéknek 1 és ".MAX_ROLLS." között kell lennie.\\nHagyd üresen, ha mindet használni akarod ".MAX_ROLLS." kocka\\n(pl. /d50 vagy /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "felugró ablakok megnyitása a privát üzeneteknél");
define("L_REG_POPUP_NOTE", "A felugró ablakokat engedélyezned kell!");
define("L_PRIV_POST_MSG", "Privát üzenet küldése!");
define("L_PRIV_MSG", "Új privát üzenet érkezett!");
define("L_PRIV_MSGS", "%s új privát üzenet érkezett!");
define("L_PRIV_MSGSa", "Itt láthatod az első 10 üzenetet.<br />Használd az alsó linket hogy megnézhesd a többit is.");
define("L_PRIV_MSG1", "Kitől:");
define("L_PRIV_MSG2", "Szoba:");
define("L_PRIV_MSG3", "Kinek:");
define("L_PRIV_MSG4", "Üzenet:");
define("L_PRIV_MSG5", "Elküldve:");
define("L_PRIV_REPLY", "Válasz");
define("L_PRIV_READ", "Nyomd meg a ’".L_REG_25."’ gombot,<br />hogy az összes üzenetet olvasottnak jelöld!");
define("L_PRIV_POPUP", "Bármikor letilthatod vagy újra engedélyezheted ezt a felugró<br />ablak lehetőséget a");
define("L_PRIV_POPUP1", "Profilodban</a> (csak regisztrált felhasználóknak)");
define("L_NOT_ONLINE", "%s most nem elérhető.");
define("L_PRIV_NOT_ONLINE", "%s most nem elérhető,\\nde megkapja az üzeneted bejelentkezés után.");
define("L_PRIV_NOT_INROOM", "%s nincs az adott szobában.\\nHa ennek ellenére pm-et (privát üzenetet) akarsz küldeni neki,\\nhasználd ezt a parancsot: /wisp %s üzenet.");
define("L_PRIV_AWAY", "%s nincs a gépnél,\\nde megkapja az üzeneted\\namikor visszajön.");
define("PM_DISABLED_ERROR", "A suttogás (privát üzenet küldése)\\nnem engedélyezett a chat-en.");
define("L_NEXT_PAGE", "Tovább a következő oldalra");
define("L_NEXT_READ", "A következő %s elolvasása"); // message / 10 messages
define("L_ROOM_ALL", "Az összes szoba");
define("L_PRIV_NO_MSGS", "Nincs új privát üzenet ");
define("L_PRIV_READ_MSG", "1 új privát üzenet érkezett"); //singular
define("L_PRIV_READ_MSGS", "%s új privát üzenet érkezett"); //plural
define("L_PRIV_MSGS_NEW", "Új"); //singular form
define("L_PRIV_MSGS_READ", "Olvasott"); //singular form
define("L_PRIV_MSG6", "Státusz:");
define("L_PRIV_RELOAD", "Oldal újratöltése");
define("L_PRIV_MARK_ALL", "Az összes olvasottként jelölése");
define("L_PRIV_MARK_SEL", "A kiválasztottak olvasottként jelölése");
define("L_PRIV_REMOVE", "A kiválasztott PM-ek törlése"); // or selected

// Color Input Box mod by Ciprian
define("L_ENABLED", "Engedélyezett");
define("L_DISABLED", "Letiltott");
define("L_COLOR_HEAD_SETTINGS", "A szerver jelenlegi beállításai:");
define("L_COLOR_HEAD_SETTINGSa", "Alapértelmezett színek:");
define("L_COLOR_HEAD_SETTINGSb", "Alapértelmezett szín:");
define("L_COL_HELP_TITLE", "Színválasztó");
define("L_COL_HELP_SUB1", "Használat:");
define("L_COL_HELP_P1", "Beállíthatod a saját alapszínedet, ha módosítod a profilodban (ugyanaz, mint a felhasználói név színe). Ezután is használhatsz bármilyen színt. Ha vissza akarsz váltani az alapszínedre egy véletlenszerűről, ki kell választanod az alapértelmezett színed (Null) – ez az első a listán.");
define("L_COL_HELP_SUB2", "Tippek:");
define("L_COL_HELP_P2", "<u>Színválaszték</u><br />A böngésződtől és operációs rendszered verziójától függően, lehetséges, hogy néhány szín nem fog látszani. Csak 16 szín neve támogatott a W3C HTML 4.0 standard által:");
define("L_COL_HELP_P2a", "Ha egy felhasználó azt mondja, nem látja a kiválasztott színedet, akkor valószínűleg egy régebbi böngészőt használ.");
define("L_COL_HELP_SUB3", "Ezen a chat-en meghatározottak a beállítások:");
define("L_COL_HELP_P3", "<u>A különböző státuszok színhasználata</u>:<br />1. Az adminisztrátor bármilyen színt használhat.<br />Az adminisztrátor beállított színe: <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. A moderátorok bármelyik színt választhatják, kivéve <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> és <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />A moderátorok alapértelmezett színe <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. A többi felhasználó bármelyik színt használhatja, kivéve: <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> and <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Az alapértelmezett szín <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Technikai dolgok</u>: Ezeket a színeket az adminisztrátor határozta meg az admin panel-en.<br />Ha valami nem sikerül vagy ha van valami, ami nem tetszik a beállított színekkel kapcsolatban, akkor érdemes először az <b>adminisztrátorral</b> kapcsolatba lépned, nem pedig a szoba többi felhasználójával. :-)");
define("L_COL_HELP_USER_STATUS", "Státuszod");
define("L_COL_TUT", "Színes szöveg használata a chat-en");
define("L_NULL", "Érvénytelen");
define("L_NULL_F", "");
define("L_ROOM_COLOR", "szoba színe");
define("L_PRO_COLOR", "profil színe");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Csak az adminisztrátor használhatja ezt a színt: ".COLOR_CA." !\\n\\nA szöveged színe visszaállítva erre: ".COLOR_CM."!\\n\\nKérlek, válassz másik színt.");
define("COL_ERROR_BOX_USRA", " Csak az adminisztrátor használhatja ezt a színt: ".COLOR_CA." !\\n\\nNe próbáld használni ezeket a színeket: ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." vagy ".COLOR_CM2.".\\n\\nKülönböző jogokkal rendelkező felhasználók részére vannak fenntartva!\\n\\ A szöveged színe visszaállítva erre: ".COLOR_CD."!\\n\\n Kérlek, válassz másik színt.");
define("COL_ERROR_BOX_USRM", "Moderátornak kell lenned, hogy használhasd ezt a színt: ".COLOR_CM." !\\n\\nNe próbáld használni ezeket a színeket: ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." vagy ".COLOR_CM2.".\\n\\Különböző jogokkal rendelkező felhasználók részére vannak fenntartva!\\n\\n A szöveged színe visszaállítva erre: ".COLOR_CD."!\\n\\nKérlek, válassz egy másik színt!");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "Üdvözlünk a chat-en. Kérünk, tartsd be a net-etikett szabályait beszélgetés közben: <I>légy kedves és udvarias</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG . L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "A chat szerver beállításait megváltoztatták. A hibák elkerüléséhez, kérünk nyisd meg újra a böngésződ (nyomd le az F5 billentyűt vagy lépj ki a szobából, majd vissza)!");

//Size command error by Ciprian
define("L_ERR_SIZE", "A betűméret csak\\nnull lehet (visszaállításhoz) vagy pedig 7 és 15 között");

// Week days for Status Worldtime and Open Schedule by Ciprian
define("L_MON", "hétfő");
define("L_TUE", "kedd");
define("L_WED", "szerda");
define("L_THU", "csütörtök");
define("L_FRI", "péntek");
define("L_SAT", "szombat");
define("L_SUN", "vasárnap");

// Password reset form by Ciprian
define("L_PASS_0", "Jelszó módosító űrlap");
define("L_PASS_1", "Titkos kérdés");
define("L_PASS_2", "Milyen típusú volt az első autód?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "Mi volt az első háziállatod neve?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "Mi a kedvenc italod?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "Mikor van a születésnapod?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "Titkos válasz");
define("L_PASS_7", "Jelszó módosítása");
define("L_PASS_8", "A jelszavad sikeresen módosítva lett.");
define("L_PASS_9", "Az új jelszavad a chat-be való belépéshez");
define("L_PASS_11", "Üdvözlünk újra a chat szerveren!");
define("L_PASS_12", "Válaszd ki a titkos kérdésed...");
define("L_ERR_PASS_1", "Hibás felhasználói név. Válaszd ki a sajátodat!");
define("L_ERR_PASS_2", "Hibás e-mail cím. Próbáld újra!");
define("L_ERR_PASS_3", "Hibás titkos kérdés.<br />Válaszolj az alábbi feltett kérdésre!");
define("L_ERR_PASS_4", "Hibás titkos válasz. Próbáld újra!");
define("L_ERR_PASS_5", "Nem állítottad be a privát/titkos adataidat.");
define("L_ERR_PASS_6", "Még nem állítottad be a privát/titkos adataidat.<br />Nem használhatod ezt a  formát. Lépj kapcsolatba az adminisztrátorral!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s adminisztrátorrá vált.");
define("L_ADM_4", "%s már nem adminisztrátor többé.");

// Open Schedule by Ciprian
define("L_DAILY", "Napi");
define("L_ALWAYS", "mindig");
define("L_OPEN", "Megnyitás");
define("L_CLOSED", "Bezárás");
define("L_OPEN_PUB", "NYITVA");
define("L_CLOSED_PUB", "ZÁRVA");

// Links popup page by Alex
define("L_LINKS_1", "Elküldött linkek");
define("L_LINKS_2", "Itt meg tudod nyitni az elküldött linkeket.");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Kattints ide%s %s");
define("L_CLICK", "Kattints ide%s");
define("L_LINKS_3", " a link megnyitásához");
define("L_LINKS_4", " a szerző oldalának megnyitásához");
define("L_LINKS_5", " smiley beillesztéséhez");
define("L_LINKS_6", ", hogy felvedd vele a kapcsolatot");
define("L_LINKS_7", " a phpMyChat Homepage megnyitásához");
define("L_LINKS_8", ", hogy csatlakozz a phpMyChat Group-hoz");
define("L_LINKS_9", " a visszajelzésed elküldéséhez");
define("L_LINKS_10", " a phpMyChat-Plus letöltéséhez");
define("L_LINKS_11", ", hogy megnézd ki beszélget");
define("L_LINKS_12", " a chat bejelentkezési oldalának megnyitásához");
define("L_LINKS_13", " a figyelmeztető hang lejátszásához"); // can also be translated as "to play this sound"
define("L_LINKS_14", " a parancs használatához");
define("L_LINKS_15", ", hogy megnyisd");
define("L_LINKS_16", "Smiley Galéria");
define("L_LINKS_17", " a növekvő sorrendhez");
define("L_LINKS_18", " a csökkenő sorrendhez");
define("L_LINKS_19", " a beállítani/módosítani a Gravatar-od");
define("L_SWITCH", "Váltás erre"); // E.g. "Váltás olaszra" (Country Flags mouseover / Language switching)
define("L_SELECTED", "kiválasztva"); // E.g. "francia - kiválasztva" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", ""); // feminine form
define("L_NOT_SELECTED", "nincs kiválasztva");
define("L_NOT_SELECTED_F", "");
define("L_EMAIL_1", " e-mail küldéséhez");
define("L_FULLSIZE_PIC", " a teljes méretű kép megnyitásához");
define("L_AUTHOR", "a szerzővel"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "a chat fejlesztőjével"); //same here
define("L_OWNER", "a chat tulajdonosával"); //same here
define("L_TRANSLATOR", "a fordítóval"); //same here

// Counter on login
define("L_VISITOR_REPORT", "... látogató %s óta");

// Status bar messages
define("L_JOIN_ROOM", "Csatlakozás ehhez a szobához");
define("L_USE_NAME", "Ennek a felhasználói névnek a használata");
define("L_USE_NAME1", "Ehhez a felhasználói névhez tartozó cím");
define("L_WHSP", "Suttogás");
define("L_SEND_WHSP", "Suttogás küldése");
define("L_SEND_PM_1", "PM küldése");
define("L_SEND_PM_2", "Privát üzenet küldése");
define("L_HIGHLIGHT", "Kihúzás/Kihúzás eltűntetése");
define("L_HIGHLIGHT_SB", "Legyenek kihúzva/Ne legyenek kihúzva ennek a felhasználónak az üzenetei");

//Lurking frame popup
define("L_LURKING_2", "Leskelődők oldala");
define("L_LURKING_3", "leskelődik");
define("L_LURKING_4", "csatlakozott");
define("L_LURKING_5", "Ismeretlen");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Extra Beállítások");
define("L_ARCHIVE", "Archívum megnyitása");
define("L_SOUNDFIX_IE_1", "Hang-javítás az IE-hez");
define("L_SOUNDFIX_IE_2", "Töltsd le a hang-javítást az IE-hez");
define("L_LURKING_1", "A leskelődők lapjának megnyitása");
define("L_REG_BRB", "brb (először regisztrálnod kell)");
define("L_DEL_BYE", "ne várj rám");
define("L_EXTRA_PRIV1", "Olvasott PM");
define("L_EXTRA_PRIV2", "Új PM");

// Months for Open Schedule by Ciprian
define("L_JAN", "január");
define("L_FEB", "február");
define("L_MAR", "március");
define("L_APR", "április");
define("L_MAY", "május");
define("L_JUN", "június");
define("L_JUL", "július");
define("L_AUG", "augusztus");
define("L_SEP", "szeptember");
define("L_OCT", "október");
define("L_NOV", "november");
define("L_DEC", "december");

// Localized date format
// Set the HU specific date/time format
if (eregi("win", PHP_OS)) {
setlocale(LC_ALL, "hun_hun.UTF-8", "hungarian.UTF-8", "hungarian");
} else {
setlocale(LC_ALL, "hu_HU.UTF-8", "hu_HU.UTF-8@euro", "hun_hun.UTF-8", "hungarian.UTF-8", "hun.UTF-8", "hu.UTF-8"); // For HU formats
}
define("L_LANG", "hu_HU");
define("ISO_DEFAULT", "iso-8859-2");
define("WIN_DEFAULT", "windows-1250");
define("L_SHORT_DATE", "%Y. %m. %d."); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%Y. %B %d. (%A)"); //Change this to your local desired format (keep the long form)
define("L_SHORT_DATETIME", "%Y. %m. %d. %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%Y. %B %d. (%A) %H:%M:%S"); //Change this to your local desired format (keep the long form)

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","felhasználó ".LOGIN_LINK."beszélget</A> ebben a pillanatban.");
define("USERS_LOGIN","1 felhasználó ".LOGIN_LINK."beszélget</A> ebben a pillanatban.");
define("NO_USER","Senki sem ".LOGIN_LINK."beszélget</A> ebben a pillanatban.");
define("L_PRIV_REPLY_LOGIN", "Jelentkezz be a chat-re, ".LOGIN_LINK."ha válaszolni akarsz</A> bármelyik Új PM-re.");

// Language names
define("L_LANG_AR", "argentín spanyol");
define("L_LANG_BG", "bolgár - ciril");
define("L_LANG_BR", "brazil portugál");
define("L_LANG_CZ", "cseh");
define("L_LANG_DA", "dán");
define("L_LANG_DE", "német");
define("L_LANG_EN", "angol"); // for admin panel only
define("L_LANG_ENUK", "brit angol"); // for UK formats and flags
define("L_LANG_ENUS", "amerikai angol"); // for US formats and flags
define("L_LANG_ES", "spanyol");
define("L_LANG_FR", "francia");
define("L_LANG_GR", "görög");
define("L_LANG_HI", "hindi");
define("L_LANG_HU", "magyar");
define("L_LANG_ID", "indonéziai");
define("L_LANG_IT", "olasz");
define("L_LANG_KA", "grúz");
define("L_LANG_NL", "holland");
define("L_LANG_RO", "román");
define("L_LANG_SK", "szlovák");
define("L_LANG_SRL", "szerb - latin");
define("L_LANG_SRC", "szerb - ciril");
define("L_LANG_SV", "svéd");
define("L_LANG_TR", "török");
define("L_LANG_UR", "urdu");
define("L_LANG_VI", "vietnámi");

// Skins preview page
define("L_SKINS_TITLE", "Stílus előnézet");
define("L_SKINS_TITLE1", "%s-%s stílus előnézet"); // Skins 1 to 4 preview
define("L_SKINS_AV", "Elérhető stílus");
define("L_SKINS_NONAV", "Nincs stílus meghatározva a \"skins\" tárban");
define("L_SKINS_COPY", "&copy; %s Stílus: %s"); //© 2008 Skin by AuthorName

// Swap image titles by Ciprian
define("L_GEN_ICON", "Nem ikon");

// Ghost mode by Ciprian
define("L_GHOST", "Rejtett");
define("L_SUPER_GHOST", "Super Rejtett");
define("L_NO_GHOST", "Látható");

// Sorting options by Ciprian
define("L_ASC", "Növekvő");
define("L_DESC", "Csökkenő");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "Összes látogatás"); // number of logins (returning visits) to chat

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "Gravatar használata");

// Uploader mod by Ciprian - 11.08.2008
define("L_UPLOAD", "%s feltöltése"); // Upload Image, Upload Sound or Upload File
define("L_UPLOAD_IMG", "Kép fájl"); // used to upload Avatars and /img command
define("L_UPLOAD_SND", "Hang fájl"); // used to upload Buzz sounds
define("L_UPLOAD_FLS", "Fájlok"); // used to upload multiple files at once
define("L_UPLOAD_SUCCESS", "%s sikeresen feltöltve, mint %s."); // original filename, destination filename
define("L_FILES_TITLE", "Feltöltés Vezérlő");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "Megtagadva");
define("L_RESTRICTED_ROM", "%s sikeresen kitiltva a szobából.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "Bejelentkezés OpenID-vel");
define("L_OPID_REG", "OpenID profilban szereplő adatok használata");
?>