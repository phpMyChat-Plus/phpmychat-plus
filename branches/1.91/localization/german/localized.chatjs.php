<?php
// File : german/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original translation by Robert Schaller <robert@schaller.com> & Wolfgang Schneider <schneider@bibelcenter.de>
//    & Martin Sander <Martin.Sander@touch-screen.de> & Bernard Piller <bernard@bmpsystems.com>
//    & Reinhard Hofmann <e9625556@student.tuwien.ac.at> & Christian Hacker <c.hacker@dreamer-chat.de>
// Updates, corrections and additions for the Plus version by Alexander Eisele <xaex@xeax.de>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

// error messages:
define("L_ERR_USR_11", "Dafür müssen Sie Administrator sein.");
define("L_ERR_USR_13", "Du mußt registriert sein, um eigene Räume anlegen zu können.");
define("L_ERR_USR_16", "Nur folgende Zeichen sind erlaubt:\\n".$REG_CHARS_ALLOWED."\\nLeerzeichen, Kommata oder Backslashes (\\) sind nicht erlaubt.\\nüberprüfen Sie die Syntax.");
define("L_ERR_USR_17", "Dieser Raum existiert nicht und Du darfst keinen anlegen.");
define("L_ERR_USR_19", "Du kannst nicht in mehreren Räumen zugleich sein.");
define("L_ERR_USR_22", "Dieser Befehl existiert nicht für \\nden Browser den Sie nutzen (IE engine).");
define("L_ERR_USR_27", "Sie können sich nicht selber anschreiben.\\nWählen Sie einen anderen Usernamen.");
define("L_ERR_ROM_1", "Der Name des Raums darf keine Kommata und Backslashes (\\) enthalten.");
define("L_ERR_ROM_2", "Der Name des Raumes den Du anlegen willst enthält ein verbotenes Wort.");
define("L_ERR_ROM_3", "Dieser Raum existiert schon als öffentlicher Raum.");
define("L_ERR_ROM_4", "Ungültiger Raumname.");

// input frame
define("L_BAD_CMD", "Dies ist kein gültiger Befehl!");
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
define("L_NO_REG_USER", "Sie müssen registriert sein um diesen Befehl nutzen zu können.");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s ist kein Moderator.");
define("L_ERR_IS_ADMIN", "%s ist ein Administrator!\\nSie können seine Berechtigungen nicht ändern.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "Bot läuft nicht in diesen Raum!");
define("BOT_START_ERROR", "Bot läuft bereits in diesen Raum!");
define("BOT_DISABLED_ERROR", "Bot wurde im Adminbereich deaktiviert!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Sie müssen auswählen wieviele Würfel geworfen werden sollen\\n(Wählen Sie eine Nummer zwischen 1 und ".MAX_ROLLS.").\\nDann nur /dice eintippen um ".MAX_ROLLS." Würfel rollen zu lassen.");
define("DICE2_WRONG", "Der zweite Wert muss zwischen 1 und ".MAX_ROLLS."sein.\\nLeer lassen für alle ".MAX_ROLLS." Würfel\\n(z.B. /".MAX_DICES."d oder /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Der erste Wert muss zwischen 1 und ".MAX_DICES."sein.\\n(z.B. /".MAX_DICES."d oder /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Der zweite Wert muss zwischen 1 und ".MAX_ROLLS."sein.\\nLeer lassen für alle ".MAX_ROLLS." Würfel\\n(z.B. /d50 oder /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s ist in diesem Augenblick nicht online .");
define("L_PRIV_NOT_ONLINE", "%s ist momentan nicht online,\\nwird aber Ihre Nachricht nach dem Login erhalten.");
define("L_PRIV_NOT_INROOM", "%s ist nicht in diesem Raum.\\nWenn Sie eine PN hinterlassen wollen,\\nnutzen Sie den Befehl: /wisp %s Nachricht.");
define("L_PRIV_AWAY", "%s ist als abwesend markiert,\\nwird aber Ihre Nachricht erhalten\\nwenn Er/Sie wieder da ist.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Nur Administrator kann die ".COLOR_CA." Farbe nutzen!\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CM."!\\n\\nBitte eine andere Farbe wählen.");
define("COL_ERROR_BOX_USRA", "Nur Administrator kann die ".COLOR_CA." Farbe nutzen!\\n\\nVersuchen Sie nicht ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nehmen\\n\\nSie wurden reserviert für Poweruser!\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CD."!\\n\\nBitte eine andere Farbe wählen.");
define("COL_ERROR_BOX_USRM", "Sie müssen Moderator sein um ".COLOR_CM." Farbe nutzen zu können!\\n\\nVersuchen Sie nicht ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nehmen\\n\\nSie wurden reserviert für Poweruser\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CD."!\\n\\nBitte eine andere Farbe wählen.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Flüstern (private Nachrichten)\\nwurden deaktiviert.");

//Size command error by Ciprian
define("L_ERR_SIZE", "Die Schriftgröße kann nur\\nnull sein (für Reset) oder zwischen 7 und 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Mo"); //Montag
define("L_TUE", "Di"); //Dienstag
define("L_WED", "Mi"); //Mittwoch
define("L_THU", "Do"); //Donnerstag
define("L_FRI", "Fr"); //Freitag
define("L_SAT", "Sa"); //Samstag
define("L_SUN", "So"); //Sonntag
?>