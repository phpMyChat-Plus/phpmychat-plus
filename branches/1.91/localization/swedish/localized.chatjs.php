<?php
// File : swedish/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original file by Martin Edelius <martin.edelius@spirex.se>
// Updates, corrections and additions for the Plus version by Heikki <heikki@yttervik.be>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

// error messages
define("L_ERR_USR_11", "Du måste vara administratör.");
define("L_ERR_USR_13", "Du måste registrera dig för att få skapa egna rums.");
define("L_ERR_USR_16", "Endast dessa extra-tecknet tillåtna:\\n".$REG_CHARS_ALLOWED."\\nMellanslag, komma eller snedstrek (\\) är inte tillåtna.\\nKolla.");
define("L_ERR_USR_17", "Dett här rummet finns inte och du är inte tillåten att skapa en ny.");
define("L_ERR_USR_19", "Bara ett rum i taget!");
define("L_ERR_USR_22", "Kommandot inte användbar för\\nmed webläsaren du använder (IE motor).");
define("L_ERR_USR_27", "Du kan inte chatta privat med dig själv.\\nVar God och...\\nVälj en annan användarnamn.");
define("L_ERR_ROM_1", "Rummets namn får inte innehålla komma eller backslash (\\).");
define("L_ERR_ROM_2", "Bannlysta ord hittades i rummet namn du vill skriva.");
define("L_ERR_ROM_3", "Det finns redan en publik rum med det här namnet.");
define("L_ERR_ROM_4", "Ogiltigt rums namn.");

// input frame
define("L_BAD_CMD", "Inte ett giltigt kommando!");
define("L_ADMIN", "%s är redan administratör!");
define("L_IS_MODERATOR", "%s är redan ordningsman!");
define("L_NO_MODERATOR", "Endast ordningsman för det här rummet får använda detta kommandot.");
define("L_NONEXIST_USER", "%s finns inte i den här rummet.");
define("L_NONREG_USER", "%s är inte registrerad.");
define("L_NONREG_USER_IP", "Hans IP är: %s.");
define("L_NO_KICKED", "%s är ordningsman eller admin och kan inte bli utslängd.");
define("L_NO_BANISHED", "%s är ordningsman eller administratör och kan inte bannlysas.");
define("L_SVR_TIME", "Servertid: ");
define("L_NO_SAVE", "Inget att spara!");
define("L_NO_ADMIN", "Endast administratör kan Använda kommandot.");
define("L_NO_REG_USER", "Du måste vara registred i chatten att kunna använda detta kommandot.");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s är inte ordningsman.");
define("L_ERR_IS_ADMIN", "%s är administratör!\\nDu kan inte ändra hans behörighets nivå.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "Bot är inte igång i detta rum!");
define("BOT_START_ERROR", "Bot är redan igång i detta rum!");
define("BOT_DISABLED_ERROR", "Bot har blivit avstängd från Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Du har valt, hur många tärningar du vill rulla\\n(Välj ett nummer mellan 1 och ".MAX_ROLLS.").\\nBara skriv /dice att rulla alla ".MAX_ROLLS." tärningar.");
define("DICE2_WRONG", "Andra värde måste vara mellan 1 and ".MAX_ROLLS.".\\nLämna tom att använda alla ".MAX_ROLLS." tärningar\\n(Expl. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Första värde måste vara mellan 1 and ".MAX_DICES.".\\n(Expl. /".MAX_DICES."d eller /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Andra värde måste vara mellan 1 and ".MAX_ROLLS.".\\nLämna tom att använda alla ".MAX_ROLLS." tärningar\\n(Expl. /d50 eller /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s är inte online just nu.");
define("L_PRIV_NOT_ONLINE", "%s är inte online just nu,\\nmen du kommer fortfarande att få dina meddelande efter inloggning.");
define("L_PRIV_NOT_INROOM", "%s är inte i detta rum.\\nOm du fortfarande vill ha pm från denna användare,\\nanvänd kommando: /wisp %s meddelande.");
define("L_PRIV_AWAY", "%s är markerat away,\\nmen du kommer fortfarande att få dina meddelande \\nnär du kommer tillbaka.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Bara administratör kan använda ".COLOR_CA." färg!\\n\\nDin/er text färg återställs till ".COLOR_CM."!\\n\\nVänligen välj annan färg.");
define("COL_ERROR_BOX_USRA", "Bara administratör kan använda ".COLOR_CA." färg!\\n\\nProva inte att använda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nDessa är reserverade till kraft användare!\\n\\nDin text färg återställs till ".COLOR_CD."!\\n\\nVänligen välj annan färg.");
define("COL_ERROR_BOX_USRM", "Du måste bli ordningsman att kunna använda ".COLOR_CM." färg!\\n\\nProva inte att använda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nDessa är reserverade till kraft användare!\\n\\nDin text färg återställs till ".COLOR_CD."!\\n\\nVänligen välj annan färg.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Whispering (privat meddelandet)\\när avstängd i denna chatt.");

//Size command error by Ciprian
define("L_ERR_SIZE", "Teckensnitt storlek värde kan bara vara\\nnull (för återställa) eller mellan 7 och 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Må"); //Måndag
define("L_TUE", "Ti"); //Tisdag
define("L_WED", "On"); //Onsdag
define("L_THU", "To"); //Torsdag
define("L_FRI", "Fr"); //Fredag
define("L_SAT", "Lö"); //Lördag
define("L_SUN", "Sö"); //Söndag
?>