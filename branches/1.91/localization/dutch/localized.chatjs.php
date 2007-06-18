<?php
// File : dutch/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original translation by Hans Paijmans <paai@kub.nl>, Kasper Souren <guaka@industree.org> and Sander Corbesir <rock@jascrc.com>
// Updates, corrections and additions for the Plus version by DJE.Amesz & Romanesko <Genieusdanny@gmail.com> and Bert Moorlag <berbia@hotmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

//error messages
define("L_ERR_USR_11", "Je moet administrator zijn.");
define("L_ERR_USR_13", "Om je eigen kamer te maken, moet je geregistreerd zijn.");
define("L_ERR_USR_16", "Alleen de volgende extra karakters zijn toegestaan:\\n".$REG_CHARS_ALLOWED."\\nSpaties, komma's of backslashes (\\) zijn niet toegestaan.\\nCheck the sintax.");
define("L_ERR_USR_17", "Deze kamer is niet beschikbaar en je bent niet bevoegd om een nieuwe kamer te maken.");
define("L_ERR_USR_19", "Je kunt niet in meer dan 1 ruimte tegelijk zijn.");
define("L_ERR_USR_22", "Dit commando is niet beschikbaar in\\nde browser die u gebruikt (IE engine).");
define("L_ERR_USR_27", "Je kunt niet privé tegen jezelf praten.\\nDoe dat in stilte...\\nKies een andere gebruikersnaam.");
define("L_ERR_ROM_1", "Kamernaam kan niet met komma en backslash (\\).");
define("L_ERR_ROM_2", "Verboden woord gevonden in de naam van de ruimte die je wil maken.");
define("L_ERR_ROM_3", "Deze ruimte is al in gebruik als openbare ruimte.");
define("L_ERR_ROM_4", "Onbruikbare naam.");

// input frame
define("L_BAD_CMD", "Onjuiste opdracht!");
define("L_ADMIN", "%s is al administrator !");
define("L_IS_MODERATOR", "%s is al moderator !");
define("L_NO_MODERATOR", "Alleen moderator van deze kamer kan die gebruiken.");
define("L_NONEXIST_USER", "%s is niet in de kamer aanwezig.");
define("L_NONREG_USER", "%s is niet geregisteerd.");
define("L_NONREG_USER_IP", "Zijn of haar IP is: %s.");
define("L_NO_KICKED", "%s is moderator of administrator en kan niet worden weggestemd.");
define("L_NO_BANISHED", "%s is moderator of administrator en kan niet verbannen worden.");
define("L_SVR_TIME", "Server tijd: ");
define("L_NO_SAVE", "Geen boodschappen om te bewaren!");
define("L_NO_ADMIN", "Alleen een administrator kan dit commando gebruiken.");
define("L_NO_REG_USER", "Om dit commando te gebruiken moet je je registreren.");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s is geen moderator.");
define("L_ERR_IS_ADMIN", "%s is de administrator!\\nje kunt zijn rechten niet wijzigen.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "Bot niet aanwezig in deze ruimte!");
define("BOT_START_ERROR", "Bot aanwezig in deze ruimte!");
define("BOT_DISABLED_ERROR", "Bot is uitgeschakeld!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Geef aan hoeveel dobbelstenen\\n(kies a nummer tussen 1 en ".MAX_ROLLS.").\\n type /dice aantal dobbelstenen ".MAX_ROLLS." dices.");
define("DICE2_WRONG", "De tweede waarde moet tussen 1 en ".MAX_ROLLS.".\\nleeg om ze allemaal te gebruiken ".MAX_ROLLS." dices\\n(e.g. /".MAX_DICES."d of /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "De eerste waarde moet tussen 1 en ".MAX_DICES.".\\n(e.g. /".MAX_DICES."d of /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "De tweede waarde moet tussen 1 en ".MAX_ROLLS.".\\nleeg om ze allemaal te gebruiken ".MAX_ROLLS." dices\\n(e.g. /d50 of /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s is niet online.");
define("L_PRIV_NOT_ONLINE", "%s is niet online,\\nMaar zal uw boodschap ontvangen wanneer deze weer inlogt.");
define("L_PRIV_NOT_INROOM", "%s is niet in deze ruimte.\\nals je deze gebruiker toch een boodschap wil sturen,\\ngebruik het commando: /wisp %s boodschap.");
define("L_PRIV_AWAY", "%s is afwezig,\\nmaar zal wel je boodschap ontvangen\\nals deze terug komt.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Alleen een admin kan gebruik maken van: ".COLOR_CA." color!\\n\\nUw tekst kleur reset naar ".COLOR_CM."!\\n\\nKies een andere kleur.");
define("COL_ERROR_BOX_USRA", "Alleen een admin kan gebruik maken van: ".COLOR_CA." color!\\n\\nGebruik geen ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nDze zijn gereserveerd voor admin en mods!\\n\\nUw tekst kleur reset naar ".COLOR_CD."!\\n\\nKies een andere kleur.");
define("COL_ERROR_BOX_USRM", "Je moet een moderator zijn om gebruik te maken van ".COLOR_CM." color!\\n\\nGebruik geen ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nDze zijn gereserveerd voor admin en mods!\\n\\nUw tekst kleur reset naar ".COLOR_CD."!\\n\\nKies een andere kleur.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Fluisteren (Privé berichten)\\nis uitgeschakeld in deze chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "De grote van de letters kunnen alleen\\nnul (zijn voor een reset) of tussen 7 en 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Ma"); //Maandag
define("L_TUE", "Di"); //Dinsdag
define("L_WED", "Wo"); //Woensdag
define("L_THU", "Do"); //Donderdag
define("L_FRI", "Vr"); //Vrijdag
define("L_SAT", "Za"); //Zaterdag
define("L_SUN", "Zo"); //Zondag
?>