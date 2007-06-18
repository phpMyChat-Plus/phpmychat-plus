<?php
// File : romanian/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original translation started by Radu Swider <swidera@satline.ro>, first updated by Ciprian Popovici-Oana <floppy@kermit.cs.pub.ro>
// Corrected, finalized, diacritics addition and updated to Plus version by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

//error messages
define("L_ERR_USR_11", "Trebuie sã fii administrator.");
define("L_ERR_USR_13", "Pentru a crea o camerã trebuie sã fii înregistrat.");
define("L_ERR_USR_16", "Numai aceste extra-caractere sunt permise:\\n".$REG_CHARS_ALLOWED."\\nSpaþii, virgule sau backslash-uri (\\) nu sunt permise.\\nVerificã sintaxa!");
define("L_ERR_USR_17", "Camera aleasã nu existã sau nu ai dreptul sã o creezi.");
define("L_ERR_USR_19", "Nu poþi fi în mai multe camere simultan.");
define("L_ERR_USR_22", "Aceastã comandã nu funcþioneazã\\nîn browser-ul tãu (pe nucleu de IE).");
define("L_ERR_USR_27", "Nu-þi poþi vorbi þie însuþi în ºoaptã.\\nFã asta în minte...\\nAlege un alt destinatar.");
define("L_ERR_ROM_1", "Numele camerei nu poate conþine virgule sau backslash (\\).");
define("L_ERR_ROM_2", "Numele camerei pe care ai vrut s-o creezi conþine un cuvânt interzis. Reformuleazã.");
define("L_ERR_ROM_3", "Exista deja o camerã publicã cu acest nume.");
define("L_ERR_ROM_4", "Numele camerei este invalid.");

// input frame
define("L_BAD_CMD", "Comandã invalidã!");
define("L_ADMIN", "%s este deja administrator!");
define("L_IS_MODERATOR", "%s este deja moderator!");
define("L_NO_MODERATOR", "Numai un moderator poate folosi aceastã comandã.");
define("L_NONEXIST_USER", "%s nu este în camera curentã.");
define("L_NONREG_USER", "%s nu este înregistrat.");
define("L_NONREG_USER_IP", "IP-ul sãu este: %s.");
define("L_NO_KICKED", "%s este moderator sau administrator ºi nu poate fi dat afarã.");
define("L_NO_BANISHED", "%s este moderator sau administrator ºi nu poate fi blocat.");
define("L_SVR_TIME", "Timpul pe server: ");
define("L_NO_SAVE", "Nimic de salvat!");
define("L_NO_ADMIN", "Numai un administrator poate folosi aceastã comandã.");
define("L_NO_REG_USER", "Trebuie sã fii înregistrat pentru a folosi aceastã comandã.");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s nu mai este moderator în nici una dintre camerele acestui chat.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "RoBoþelul nu este pornit în aceastã camerã!");
define("BOT_START_ERROR", "RoBoþelul este deja pornit în aceastã camerã!");
define("BOT_DISABLED_ERROR", "RoBoþelul a fost dezactivat în Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Trebuie sã alegi un numãr de zaruri cuprins între 1 ºi ".MAX_ROLLS.".\\nComanda /dice va arunca cu toate ".MAX_ROLLS." zarurile.");
define("DICE2_WRONG", "A doua valoare trebuie sã fie cuprinsã între 1 ºi ".MAX_ROLLS.".\\nNu o specifica pentru a arunca cu toate ".MAX_ROLLS." zarurile\\n(ex. /".MAX_DICES."d sau /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Prima valoare trebuie sã fie cuprinsã între 1 ºi ".MAX_DICES.".\\n(ex. /".MAX_DICES."d sau /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "A doua valoare trebuie sã fie cuprinsã între 1 ºi ".MAX_ROLLS.".\\nNu o specifica pentru a arunca cu toate ".MAX_ROLLS." zarurile\\n(ex. /d50 or /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s nu este online acum.");
define("L_PRIV_NOT_ONLINE", "%s nu este online acum,\\ndar va primi mesajul tãu la primul login.");
define("L_PRIV_NOT_INROOM", "%s nu este în aceastã camerã.\\nDacã vrei totuºi sã îl contactezi,\\nfoloseºte comanda: /wisp %s mesaj.");
define("L_PRIV_AWAY", "%s nu este la calculator,\\ndar va primi mesajul tãu la întoarcere.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Numai administratorul poate folosi culoarea ".COLOR_CA."!\\n\\nCuloarea a fost resetatã la ".COLOR_CM."!\\n\\nAlege orice altã culoare!");
define("COL_ERROR_BOX_USRA", "Numai administratorul poate folosi culoarea ".COLOR_CA."!\\n\\nNu încerca sã foloseºti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1."\\nAcestea sunt rezervate altor useri!\\n\\nCuloarea a fost resetatã la ".COLOR_CD."!\\n\\nAlege orice altã culoare!");
define("COL_ERROR_BOX_USRM", "Trebuie sã fii moderator pentru a folosi culoarea ".COLOR_CM."!\\n\\nNu încerca sã foloseºti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1."\\nAcestea sunt rezervate altor useri!\\n\\nCuloarea a fost resetatã la ".COLOR_CD."!\\n\\nAlege orice altã culoare!");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Mesageria privatã este\\ndezactivatã în acest chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "Dimensiunea fontului poate fi doar\\nnulã (pentru resetare) sau cuprinsã între 7 ºi 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Lu"); //Luni
define("L_TUE", "Ma"); //Marþi
define("L_WED", "Mi"); //Miercuri
define("L_THU", "Jo"); //Joi
define("L_FRI", "Vi"); //Vineri
define("L_SAT", "Sâ"); //Sâmbãtã
define("L_SUN", "Du"); //Duminicã
?>