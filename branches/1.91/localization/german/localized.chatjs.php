<?php
// File : german/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original translation by Robert Schaller <robert@schaller.com> & Wolfgang Schneider <schneider@bibelcenter.de>
//    & Martin Sander <Martin.Sander@touch-screen.de> & Bernard Piller <bernard@bmpsystems.com>
//    & Reinhard Hofmann <e9625556@student.tuwien.ac.at> & Christian Hacker <c.hacker@dreamer-chat.de>
// Updates, corrections and additions for the Plus version by Alexander Eisele <xaex@xeax.de>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

// error messages:
define("L_ERR_USR_11", "Daf�r m�ssen Sie Administrator sein.");
define("L_ERR_USR_13", "Du mu�t registriert sein, um eigene R�ume anlegen zu k�nnen.");
define("L_ERR_USR_16", "Nur folgende Zeichen sind erlaubt:\\n".$REG_CHARS_ALLOWED."\\nLeerzeichen, Kommata oder Backslashes (\\) sind nicht erlaubt.\\n�berpr�fen Sie die Syntax.");
define("L_ERR_USR_17", "Dieser Raum existiert nicht und Du darfst keinen anlegen.");
define("L_ERR_USR_19", "Du kannst nicht in mehreren R�umen zugleich sein.");
define("L_ERR_USR_22", "Dieser Befehl existiert nicht f�r \\nden Browser den Sie nutzen (IE engine).");
define("L_ERR_USR_27", "Sie k�nnen sich nicht selber anschreiben.\\nW�hlen Sie einen anderen Usernamen.");
define("L_ERR_ROM_1", "Der Name des Raums darf keine Kommata und Backslashes (\\) enthalten.");
define("L_ERR_ROM_2", "Der Name des Raumes den Du anlegen willst enth�lt ein verbotenes Wort.");
define("L_ERR_ROM_3", "Dieser Raum existiert schon als �ffentlicher Raum.");
define("L_ERR_ROM_4", "Ung�ltiger Raumname.");

// input frame
define("L_BAD_CMD", "Dies ist kein g�ltiger Befehl!");
define("L_ADMIN", "%s ist bereits Administrator!");
define("L_IS_MODERATOR", "%s ist bereits Moderator!");
define("L_NO_MODERATOR", "Nur der Moderator dieses Raums darf diesen Befehl verwenden.");
define("L_NONEXIST_USER", "%s ist nicht in diesem Raum");
define("L_NONREG_USER", "%s ist nicht angemeldet.");
define("L_NONREG_USER_IP", "Seine IP ist: %s.");
define("L_NO_KICKED", "%s ist Moderator oder Administrator und kann nicht gekickt werden.");
define("L_NO_BANISHED", "%s ist Moderator oder Administrator und kann nicht verbannt werden.");
define("L_SVR_TIME", "Server Zeit: ");
define("L_NO_SAVE", "Keine Nachricht zum Speichern!");
define("L_NO_ADMIN", "Nur der Administrator kann diesen Befehl verwenden.");
define("L_NO_REG_USER", "Sie m�ssen registriert sein um diesen Befehl nutzen zu k�nnen.");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s ist kein Moderator.");
define("L_ERR_IS_ADMIN", "%s ist ein Administrator!\\nSie k�nnen seine Berechtigungen nicht �ndern.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "Bot l�uft nicht in diesen Raum!");
define("BOT_START_ERROR", "Bot l�uft bereits in diesen Raum!");
define("BOT_DISABLED_ERROR", "Bot wurde im Adminbereich deaktiviert!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Sie m�ssen ausw�hlen wieviele W�rfel geworfen werden sollen\\n(W�hlen Sie eine Nummer zwischen 1 und ".MAX_ROLLS.").\\nDann nur /dice eintippen um ".MAX_ROLLS." W�rfel rollen zu lassen.");
define("DICE2_WRONG", "Der zweite Wert muss zwischen 1 und ".MAX_ROLLS."sein.\\nLeer lassen f�r alle ".MAX_ROLLS." W�rfel\\n(z.B. /".MAX_DICES."d oder /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Der erste Wert muss zwischen 1 und ".MAX_DICES."sein.\\n(z.B. /".MAX_DICES."d oder /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Der zweite Wert muss zwischen 1 und ".MAX_ROLLS."sein.\\nLeer lassen f�r alle ".MAX_ROLLS." W�rfel\\n(z.B. /d50 oder /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s ist in diesem Augenblick nicht online .");
define("L_PRIV_NOT_ONLINE", "%s ist momentan nicht online,\\nwird aber Ihre Nachricht nach dem Login erhalten.");
define("L_PRIV_NOT_INROOM", "%s ist nicht in diesem Raum.\\nWenn Sie eine PN hinterlassen wollen,\\nnutzen Sie den Befehl: /wisp %s Nachricht.");
define("L_PRIV_AWAY", "%s ist als abwesend markiert,\\nwird aber Ihre Nachricht erhalten\\nwenn Er/Sie wieder da ist.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Nur Administrator kann die ".COLOR_CA." Farbe nutzen!\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CM."!\\n\\nBitte eine andere Farbe w�hlen.");
define("COL_ERROR_BOX_USRA", "Nur Administrator kann die ".COLOR_CA." Farbe nutzen!\\n\\nVersuchen Sie nicht ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nehmen\\n\\nSie wurden reserviert f�r Poweruser!\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CD."!\\n\\nBitte eine andere Farbe w�hlen.");
define("COL_ERROR_BOX_USRM", "Sie m�ssen Moderator sein um ".COLOR_CM." Farbe nutzen zu k�nnen!\\n\\nVersuchen Sie nicht ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nehmen\\n\\nSie wurden reserviert f�r Poweruser\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CD."!\\n\\nBitte eine andere Farbe w�hlen.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Fl�stern (private Nachrichten)\\nwurden deaktiviert.");

//Size command error by Ciprian
define("L_ERR_SIZE", "Die Schriftgr��e kann nur\\nnull sein (f�r Reset) oder zwischen 7 und 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Mo"); //Montag
define("L_TUE", "Di"); //Dienstag
define("L_WED", "Mi"); //Mittwoch
define("L_THU", "Do"); //Donnerstag
define("L_FRI", "Fr"); //Freitag
define("L_SAT", "Sa"); //Samstag
define("L_SUN", "So"); //Sonntag
?>