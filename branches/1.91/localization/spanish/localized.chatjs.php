<?php
// File : spanish/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original translation by Josep Román <josep.roman@zuerich-see.ch> and León Del Río <leon@webmaster.com.mx>
// Updates, corrections and additions for the Plus version by Roxana Castañeda <roxminu@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

// error messages
define("L_ERR_USR_11", "Usted debe ser el administrador.");
define("L_ERR_USR_13", "Para crear su propia sala debe estar registrado.");
define("L_ERR_USR_16", "Sólo se permiten los siguientes caracteres adicionales:\\n".$REG_CHARS_ALLOWED."\\nEspacios, comas o barras invertidas (\\) no están permitidos.\\nRevise la sintaxis.");
define("L_ERR_USR_17", "Esta sala no existe, y usted no está autorizado para crear una nueva.");
define("L_ERR_USR_19", "No puede estar en más de una sala al mismo tiempo.");
define("L_ERR_USR_22", "Este comando no está disponible para\\nel navegador que usted usa (IE engine).");
define("L_ERR_USR_27", "No puede hablar en privado con usted.\\nPor favor conserve eso en su mente...\\nAhora escoja otra nombre de usuario.");
define("L_ERR_ROM_1", "Los nombres de las salas no pueden contener comas o barras invertidas (\\).");
define("L_ERR_ROM_2", "Se ha encontrado una palabra no permitida en el nombre de la sala que desea crear.");
define("L_ERR_ROM_3", "Esta sala ya existe como pública.");
define("L_ERR_ROM_4", "Nombre de sala inválido.");

// input frame
define("L_BAD_CMD", "Este no es un comando válido!");
define("L_ADMIN", "%s ya es el administrador!");
define("L_IS_MODERATOR", "%s ya es el moderador!");
define("L_NO_MODERATOR", "Sólo el moderador puede usar este comando.");
define("L_NOEXIST_USER", "%s no está en esta sala.");
define("L_NONREG_USER", "%s no está registrado.");
define("L_NONREG_USER_IP", "Su IP es: %s.");
define("L_NO_KICKED", "%s es el moderador o el administrador y no puede bloqueado.");
define("L_NO_BANISHED", "%s es el moderador o el administrador y no puede desterrado.");
define("L_SVR_TIME", "Hora del servidor: ");
define("L_NO_SAVE", "No hay mensaje que guardar!");
define("L_NO_ADMIN", "Sólo el administrador puede usar este comando.");
define("L_NO_REG_USER", "Debe estar registrado en este chat para poder usar este comando.");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s no es un moderador.");
define("L_ERR_IS_ADMIN", "%s es el administrador!\\nUsted no puede cambiar sus permisos.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "Bot no está funcionando en esta sala!");
define("BOT_START_ERROR", "Bot está actualmente funcionando en esta sala!");
define("BOT_DISABLED_ERROR", "Bot ha sido desactivado por el Panel de Administración!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Tiene que seleccionar cuantos dados desea arrojar\\n(Escoja un número entre 1 y ".MAX_ROLLS.").\\nSólo escriba /dados tirar todos los ".MAX_ROLLS." dados.");
define("DICE2_WRONG", "El segundo valor debe ser entre 1 y ".MAX_ROLLS.".\\nDejar en blanco para usar todos los ".MAX_ROLLS." dados\\n(ej. /".MAX_DICES."d o /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "El primer valor debe ser entre 1 y ".MAX_DICES.".\\n(ej. /".MAX_DICES."d o /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "El segundo valor debe ser entre 1 y ".MAX_ROLLS.".\\nDejar en blanco para usar todos los".MAX_ROLLS." dados\\n(ej. /d50 o /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s no está conectado en este momento.");
define("L_PRIV_NOT_ONLINE", "%s no esta conectado en este momento,\\npero de todas maneras recibirá su mensaje cuando se conecte.");
define("L_PRIV_NOT_INROOM", "%s no está en esta sala.\\nSi aún desea mandarle un mp mensaje privado a este usuario,\\nuse el comando: /wisp %s mensaje.");
define("L_PRIV_AWAY", "%s aparece como lejos,\\npero igual recibirá su mensaje\\ncuando regrese.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Sólo el administrador puede usar el color ".COLOR_CA."!\\n\\nEl color de su texto vuelve a ".COLOR_CM."!\\n\\nPor favor escoja cualquier otro color.");
define("COL_ERROR_BOX_USRA", "Sólo el administrador puede usar el color ".COLOR_CA."!\\n\\nNo trate de usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nEstos son colores reservados para los usuarios de control!\\n\\nEl color de su texto vuelve a ".COLOR_CD."!\\n\\nPor favor escoja cualquier otro color.");
define("COL_ERROR_BOX_USRM", "Usted tiene que ser un moderador para usar el color ".COLOR_CM." !\\n\\nNo intente usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nEstos son colores reservados para los usuarios de control!\\n\\nEl color de su texto vuelve a ".COLOR_CD."!\\n\\nPor favor escoja cualquier otro color.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Los Susurros (mensajes privados)\\nha sido desactivado en este chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "El valor tamaño de la fuente puede ser sólo \\nnulo (para resetear) o entre 7 y 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Lu"); //Lunes
define("L_TUE", "Ma"); //Martes
define("L_WED", "Mi"); //Miércoles
define("L_THU", "Ju"); //Jueves
define("L_FRI", "Vi"); //Viernes
define("L_SAT", "Sá"); //Sábado
define("L_SUN", "Do"); //Domingo
?>