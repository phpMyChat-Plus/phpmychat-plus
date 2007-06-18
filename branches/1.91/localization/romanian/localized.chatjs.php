<?php
// File : romanian/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original translation started by Radu Swider <swidera@satline.ro>, first updated by Ciprian Popovici-Oana <floppy@kermit.cs.pub.ro>
// Corrected, finalized, diacritics addition and updated to Plus version by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

//error messages
define("L_ERR_USR_11", "Trebuie s� fii administrator.");
define("L_ERR_USR_13", "Pentru a crea o camer� trebuie s� fii �nregistrat.");
define("L_ERR_USR_16", "Numai aceste extra-caractere sunt permise:\\n".$REG_CHARS_ALLOWED."\\nSpa�ii, virgule sau backslash-uri (\\) nu sunt permise.\\nVerific� sintaxa!");
define("L_ERR_USR_17", "Camera aleas� nu exist� sau nu ai dreptul s� o creezi.");
define("L_ERR_USR_19", "Nu po�i fi �n mai multe camere simultan.");
define("L_ERR_USR_22", "Aceast� comand� nu func�ioneaz�\\n�n browser-ul t�u (pe nucleu de IE).");
define("L_ERR_USR_27", "Nu-�i po�i vorbi �ie �nsu�i �n �oapt�.\\nF� asta �n minte...\\nAlege un alt destinatar.");
define("L_ERR_ROM_1", "Numele camerei nu poate con�ine virgule sau backslash (\\).");
define("L_ERR_ROM_2", "Numele camerei pe care ai vrut s-o creezi con�ine un cuv�nt interzis. Reformuleaz�.");
define("L_ERR_ROM_3", "Exista deja o camer� public� cu acest nume.");
define("L_ERR_ROM_4", "Numele camerei este invalid.");

// input frame
define("L_BAD_CMD", "Comand� invalid�!");
define("L_ADMIN", "%s este deja administrator!");
define("L_IS_MODERATOR", "%s este deja moderator!");
define("L_NO_MODERATOR", "Numai un moderator poate folosi aceast� comand�.");
define("L_NONEXIST_USER", "%s nu este �n camera curent�.");
define("L_NONREG_USER", "%s nu este �nregistrat.");
define("L_NONREG_USER_IP", "IP-ul s�u este: %s.");
define("L_NO_KICKED", "%s este moderator sau administrator �i nu poate fi dat afar�.");
define("L_NO_BANISHED", "%s este moderator sau administrator �i nu poate fi blocat.");
define("L_SVR_TIME", "Timpul pe server: ");
define("L_NO_SAVE", "Nimic de salvat!");
define("L_NO_ADMIN", "Numai un administrator poate folosi aceast� comand�.");
define("L_NO_REG_USER", "Trebuie s� fii �nregistrat pentru a folosi aceast� comand�.");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s nu mai este moderator �n nici una dintre camerele acestui chat.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "RoBo�elul nu este pornit �n aceast� camer�!");
define("BOT_START_ERROR", "RoBo�elul este deja pornit �n aceast� camer�!");
define("BOT_DISABLED_ERROR", "RoBo�elul a fost dezactivat �n Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Trebuie s� alegi un num�r de zaruri cuprins �ntre 1 �i ".MAX_ROLLS.".\\nComanda /dice va arunca cu toate ".MAX_ROLLS." zarurile.");
define("DICE2_WRONG", "A doua valoare trebuie s� fie cuprins� �ntre 1 �i ".MAX_ROLLS.".\\nNu o specifica pentru a arunca cu toate ".MAX_ROLLS." zarurile\\n(ex. /".MAX_DICES."d sau /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Prima valoare trebuie s� fie cuprins� �ntre 1 �i ".MAX_DICES.".\\n(ex. /".MAX_DICES."d sau /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "A doua valoare trebuie s� fie cuprins� �ntre 1 �i ".MAX_ROLLS.".\\nNu o specifica pentru a arunca cu toate ".MAX_ROLLS." zarurile\\n(ex. /d50 or /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s nu este online acum.");
define("L_PRIV_NOT_ONLINE", "%s nu este online acum,\\ndar va primi mesajul t�u la primul login.");
define("L_PRIV_NOT_INROOM", "%s nu este �n aceast� camer�.\\nDac� vrei totu�i s� �l contactezi,\\nfolose�te comanda: /wisp %s mesaj.");
define("L_PRIV_AWAY", "%s nu este la calculator,\\ndar va primi mesajul t�u la �ntoarcere.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Numai administratorul poate folosi culoarea ".COLOR_CA."!\\n\\nCuloarea a fost resetat� la ".COLOR_CM."!\\n\\nAlege orice alt� culoare!");
define("COL_ERROR_BOX_USRA", "Numai administratorul poate folosi culoarea ".COLOR_CA."!\\n\\nNu �ncerca s� folose�ti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1."\\nAcestea sunt rezervate altor useri!\\n\\nCuloarea a fost resetat� la ".COLOR_CD."!\\n\\nAlege orice alt� culoare!");
define("COL_ERROR_BOX_USRM", "Trebuie s� fii moderator pentru a folosi culoarea ".COLOR_CM."!\\n\\nNu �ncerca s� folose�ti ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." sau ".COLOR_CM1."\\nAcestea sunt rezervate altor useri!\\n\\nCuloarea a fost resetat� la ".COLOR_CD."!\\n\\nAlege orice alt� culoare!");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Mesageria privat� este\\ndezactivat� �n acest chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "Dimensiunea fontului poate fi doar\\nnul� (pentru resetare) sau cuprins� �ntre 7 �i 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Lu"); //Luni
define("L_TUE", "Ma"); //Mar�i
define("L_WED", "Mi"); //Miercuri
define("L_THU", "Jo"); //Joi
define("L_FRI", "Vi"); //Vineri
define("L_SAT", "S�"); //S�mb�t�
define("L_SUN", "Du"); //Duminic�
?>