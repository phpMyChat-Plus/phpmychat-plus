<?php
// File : italian/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original translation by Andrea D'Alessandro <andrea@abol.it> & Massimo Fubini <massimo@tomato.it>
//	& Giuliano Yurij Beccaria <yurij@e-pages.it> & Marco Borrini <borrini@tradimento.it>
// & Bartolotta Gioachino <developers@rockitalia.com> & Silvia M. Carrassi <silvia@ladysilvia.net>
// Updates, corrections and additions for the Plus version by Mike Mikius <mikiusss@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

// error messages
define("L_ERR_USR_11", "Devi essere un Amministratore.");
define("L_ERR_USR_13", "Per creare una tua chat devi essere registrato.");
define("L_ERR_USR_16", "Solo questi caratteri speciali sono ammessi:\\n".$REG_CHARS_ALLOWED."\\nSpazi, virgole o slashes (\\) non sono ammessi.\\nSeleziona la sintassi.");
define("L_ERR_USR_17", "Questa chat non esiste, tu non sei abilitato a crearne una nuova.");
define("L_ERR_USR_19", "Non puoi essere in più di una chat contemporaneamente.");
define("L_ERR_USR_22", "Questo comando non eseguibile per\\nil browser che usi (IE engine).");
define("L_ERR_USR_27", "Non puoi parlare in privato con te stesso.\\nFallo con la mente per piacere...\\nOra scegli un username differente.");
define("L_ERR_ROM_1", "Il nome delle chat non può contenere virgole o backslash (\\).");
define("L_ERR_ROM_2", "Nel nome di chat è stata trovata una parola censurabile.");
define("L_ERR_ROM_3", "Già esiste una stanza pubblica con questo nome.");
define("L_ERR_ROM_4", "Nome stanza non valido.");

// input frame
define("L_BAD_CMD", "Questo non è un comando valido!");
define("L_ADMIN", "%s è già amministratore!");
define("L_IS_MODERATOR", "%s è già moderatore!");
define("L_NO_MODERATOR", "Solo il moderatore può usare questo comando.");
define("L_NONEXIST_USER", "%s non è in questa chat.");
define("L_NONREG_USER", "%s non è registrato.");
define("L_NONREG_USER_IP", "Il suo IP è: %s.");
define("L_NO_KICKED", " %s è moderatore o amministratore e non può essere allontanato dalla chat.");
define("L_NO_BANISHED", "%s è un moderatore o amministratore e non può essere espulso.");
define("L_SVR_TIME", "Orario server: ");
define("L_NO_SAVE", "Nesun messaggio da salvare!");
define("L_NO_ADMIN", "Solo gli amministratori possono usare questo comando.");
define("L_NO_REG_USER", "Devi essere registrato in questa chat per usare questo comando.");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s non è un moderatore.");
define("L_ERR_IS_ADMIN", "%s è l'amministratore!\\nNon puoi cambiare i suoi permessi.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "Il Bot non è attivo in questa stanza!");
define("BOT_START_ERROR", "Il Bot è già attivo in questa stanza!");
define("BOT_DISABLED_ERROR", "Il Bot è stato disabilitato dal pannello di amministrazione!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Devi selezionare quanti dadi vuoi girare\\n(Scegli un numero tra 1 e ".MAX_ROLLS.").\\nScrivi solo /dice per girare ".MAX_ROLLS." dadi.");
define("DICE2_WRONG", "Il secondo valore deve essere tra 1 e ".MAX_ROLLS.".\\nLascialo vuoto per usare tutti ".MAX_ROLLS." dadi\\n(e.g. /".MAX_DICES."d o /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Il primo valore deve essere tra 1 e".MAX_DICES.".\\n(e.g. /".MAX_DICES."d o /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Il secondo valore deve essere tra 1 e".MAX_ROLLS.".\\nLascialo vuoto per usare tutti ".MAX_ROLLS." dadi\\n(e.g. /d50 o /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s non è online in questo momento.");
define("L_PRIV_NOT_ONLINE", "%s non è online in questo momento,\\nma ricevere il tuo messaggio dopo il login.");
define("L_PRIV_NOT_INROOM", "%s non è in questa stanza.\\nSe vuoi inviare un rpivato a questo utente,\\nusa il comando: /wisp %s messaggio.");
define("L_PRIV_AWAY", "%s ha lo stato di away,\\nma riceverà il tuo messaggio\\nquando tornerà.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Solo l'amministratore può usare il colore ".COLOR_CA."!\\n\\nReimposta il tuo colore ".COLOR_CM."!\\n\\nSi prega di scegliere un altro colore.");
define("COL_ERROR_BOX_USRA", "Solo l'amministratore può usare il colore ".COLOR_CA."!\\n\\nNon provare ad usare ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nSono riservati per utenti power!\\n\\nReimposta il tuo colore ".COLOR_CD."!\\n\\nSi prega di scegliere un altro colore.");
define("COL_ERROR_BOX_USRM", "Devi essere moderatore per usare ".COLOR_CM." color!\\n\\nNon provare ad usare ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nSono riservati per utenti power!\\n\\nReimposta il tuo colore ".COLOR_CD."!\\n\\nSi prega di scegliere un altro colore.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Bisbigliare (messaggio privato)\\nsono disabilitati per questa chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "La dimensione del carattere può essere solo\\nnull (per reimpostare) o tra 7 e 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Lu");	//Lunedi
define("L_TUE", "Ma");	//Martedi
define("L_WED", "Me");	//Mercoledi
define("L_THU", "Gi");		//Giovedi
define("L_FRI", "Ve");		//Venerdi
define("L_SAT", "Sa");	//Sabato
define("L_SUN", "Do");	//Domenica
?>