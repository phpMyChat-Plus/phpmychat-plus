<?php
// File : swedish/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original file by Martin Edelius <martin.edelius@spirex.se>
// Updates, corrections and additions for the Plus version by Heikki <heikki@yttervik.be>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

// error messages
define("L_ERR_USR_11", "Du m�ste vara administrat�r.");
define("L_ERR_USR_13", "Du m�ste registrera dig f�r att f� skapa egna rums.");
define("L_ERR_USR_16", "Endast dessa extra-tecknet till�tna:\\n".$REG_CHARS_ALLOWED."\\nMellanslag, komma eller snedstrek (\\) �r inte till�tna.\\nKolla.");
define("L_ERR_USR_17", "Dett h�r rummet finns inte och du �r inte till�ten att skapa en ny.");
define("L_ERR_USR_19", "Bara ett rum i taget!");
define("L_ERR_USR_22", "Kommandot inte anv�ndbar f�r\\nmed webl�saren du anv�nder (IE motor).");
define("L_ERR_USR_27", "Du kan inte chatta privat med dig sj�lv.\\nVar God och...\\nV�lj en annan anv�ndarnamn.");
define("L_ERR_ROM_1", "Rummets namn f�r inte inneh�lla komma eller backslash (\\).");
define("L_ERR_ROM_2", "Bannlysta ord hittades i rummet namn du vill skriva.");
define("L_ERR_ROM_3", "Det finns redan en publik rum med det h�r namnet.");
define("L_ERR_ROM_4", "Ogiltigt rums namn.");

// input frame
define("L_BAD_CMD", "Inte ett giltigt kommando!");
define("L_ADMIN", "%s �r redan administrat�r!");
define("L_IS_MODERATOR", "%s �r redan ordningsman!");
define("L_NO_MODERATOR", "Endast ordningsman f�r det h�r rummet f�r anv�nda detta kommandot.");
define("L_NONEXIST_USER", "%s finns inte i den h�r rummet.");
define("L_NONREG_USER", "%s �r inte registrerad.");
define("L_NONREG_USER_IP", "Hans IP �r: %s.");
define("L_NO_KICKED", "%s �r ordningsman eller admin och kan inte bli utsl�ngd.");
define("L_NO_BANISHED", "%s �r ordningsman eller administrat�r och kan inte bannlysas.");
define("L_SVR_TIME", "Servertid: ");
define("L_NO_SAVE", "Inget att spara!");
define("L_NO_ADMIN", "Endast administrat�r kan Anv�nda kommandot.");
define("L_NO_REG_USER", "Du m�ste vara registred i chatten att kunna anv�nda detta kommandot.");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s �r inte ordningsman.");
define("L_ERR_IS_ADMIN", "%s �r administrat�r!\\nDu kan inte �ndra hans beh�righets niv�.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "Bot �r inte ig�ng i detta rum!");
define("BOT_START_ERROR", "Bot �r redan ig�ng i detta rum!");
define("BOT_DISABLED_ERROR", "Bot har blivit avst�ngd fr�n Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Du har valt, hur m�nga t�rningar du vill rulla\\n(V�lj ett nummer mellan 1 och ".MAX_ROLLS.").\\nBara skriv /dice att rulla alla ".MAX_ROLLS." t�rningar.");
define("DICE2_WRONG", "Andra v�rde m�ste vara mellan 1 and ".MAX_ROLLS.".\\nL�mna tom att anv�nda alla ".MAX_ROLLS." t�rningar\\n(Expl. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "F�rsta v�rde m�ste vara mellan 1 and ".MAX_DICES.".\\n(Expl. /".MAX_DICES."d eller /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Andra v�rde m�ste vara mellan 1 and ".MAX_ROLLS.".\\nL�mna tom att anv�nda alla ".MAX_ROLLS." t�rningar\\n(Expl. /d50 eller /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s �r inte online just nu.");
define("L_PRIV_NOT_ONLINE", "%s �r inte online just nu,\\nmen du kommer fortfarande att f� dina meddelande efter inloggning.");
define("L_PRIV_NOT_INROOM", "%s �r inte i detta rum.\\nOm du fortfarande vill ha pm fr�n denna anv�ndare,\\nanv�nd kommando: /wisp %s meddelande.");
define("L_PRIV_AWAY", "%s �r markerat away,\\nmen du kommer fortfarande att f� dina meddelande \\nn�r du kommer tillbaka.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Bara administrat�r kan anv�nda ".COLOR_CA." f�rg!\\n\\nDin/er text f�rg �terst�lls till ".COLOR_CM."!\\n\\nV�nligen v�lj annan f�rg.");
define("COL_ERROR_BOX_USRA", "Bara administrat�r kan anv�nda ".COLOR_CA." f�rg!\\n\\nProva inte att anv�nda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nDessa �r reserverade till kraft anv�ndare!\\n\\nDin text f�rg �terst�lls till ".COLOR_CD."!\\n\\nV�nligen v�lj annan f�rg.");
define("COL_ERROR_BOX_USRM", "Du m�ste bli ordningsman att kunna anv�nda ".COLOR_CM." f�rg!\\n\\nProva inte att anv�nda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nDessa �r reserverade till kraft anv�ndare!\\n\\nDin text f�rg �terst�lls till ".COLOR_CD."!\\n\\nV�nligen v�lj annan f�rg.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Whispering (privat meddelandet)\\n�r avst�ngd i denna chatt.");

//Size command error by Ciprian
define("L_ERR_SIZE", "Teckensnitt storlek v�rde kan bara vara\\nnull (f�r �terst�lla) eller mellan 7 och 15");

// Week days for status worldtime by Ciprian
define("L_MON", "M�"); //M�ndag
define("L_TUE", "Ti"); //Tisdag
define("L_WED", "On"); //Onsdag
define("L_THU", "To"); //Torsdag
define("L_FRI", "Fr"); //Fredag
define("L_SAT", "L�"); //L�rdag
define("L_SUN", "S�"); //S�ndag
?>