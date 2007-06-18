<?php
// File : argentinian_spanish/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original translation in Spanish (for the Argentinian dialect usage) by Jorge Colaccini <jrc@informas.com>
// Updates, corrections and additions for the Plus version by Matias Olivera <matiolivera@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

// error messages
define("L_ERR_USR_11", "Debes ser administrador.");
define("L_ERR_USR_13", "Para crear tu propio salón, debes estar registrado como usuario.");
define("L_ERR_USR_16", "El nombre de usuario no puede contener espacios, comas o barras (\\).");
define("L_ERR_USR_17", "Este salón no existe, y no estás habilitado para crear uno.");
define("L_ERR_USR_19", "No puedes estar en más de un salón al mismo tiempo.");
define("L_ERR_USR_22", "Este comando no está disponible para\\nel navegador que estas usando (motor de IE).");
define("L_ERR_USR_27", "No podés hablar en privado con vos mismo.\\nNo escuches voces en tu cabeza...\\nEscogé a un usuario diferente.");
define("L_ERR_ROM_1", "Los nombres de los salones no pueden contener comas o barras (\\).");
define("L_ERR_ROM_2", "Hay palabras no válidas en el nombre del salón que quieres crear.");
define("L_ERR_ROM_3", "Este salón ya existe como público.");
define("L_ERR_ROM_4", "Nombre de salón inválido.");

// input frame
define("L_BAD_CMD", "Este no es un comando válido!");
define("L_ADMIN", "%s ya es el administrador!");
define("L_IS_MODERATOR", "%s ya es el moderador!");
define("L_NO_MODERATOR", "Solo un moderador de este salón puede utilizar este comando.");
define("L_NONEXIST_USER", "El usuario %s no está en este salón.");
define("L_NONREG_USER", "El usuario %s no está registrado.");
define("L_NONREG_USER_IP", "Su dirección de IP es: %s.");
define("L_NO_KICKED", "El usuario %s es un moderador o el administrador y no puede ser expulsado.");
define("L_NO_BANISHED", "El usuario %s es un moderador o el administrador y no puede ser bloqueado.");
define("L_SVR_TIME", "Hora del servidor: ");
define("L_NO_SAVE", "No hay mensajes para guardar!");
define("L_NO_ADMIN", "Solamente el administrador puede utilizar este comando.");
define("L_NO_REG_USER", "Debes estar registrado en el chat para usar este comando.");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s no es moderador.");
define("L_ERR_IS_ADMIN", "%s es el administrador!\\nNo podés cambiar sus permisos.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "El robot no está activo en este salón!");
define("BOT_START_ERROR", "El robot ya está activo en este salón!");
define("BOT_DISABLED_ERROR", "El robot ha sido desactivado desde el panel de administración!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Debes seleccionar cuántos dados quieres tirar\\n(Elige un número entre 1 y ".MAX_ROLLS.").\\nSimplemente escribe /dice para tirar todos los ".MAX_ROLLS." dados.");
define("DICE2_WRONG", "El secundo valor no está entre 1 y ".MAX_ROLLS.".\\nDejalo vacío para usar todos los ".MAX_ROLLS." dados\\n(Ej. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "El primer valor no está entre 1 y ".MAX_DICES.".\\n(Ej. /".MAX_DICES."d o /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "El segundo valor no está entre 1 y ".MAX_ROLLS.".\\nDejalo vacío para usar todos los ".MAX_ROLLS." dados\\n(Ej. /d50 or /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s no se encuentra conectado en este momento.");
define("L_PRIV_NOT_ONLINE", "%s no se encuentra conectado en este momento,\\npero igualmente recibirá tu mensaje al conectase.");
define("L_PRIV_NOT_INROOM", "%s no se encuentra en este salón.\\nSi aún querés enviarle un mensaje privado,\\nusá el comando: /wisp %s mensaje.");
define("L_PRIV_AWAY", "%s está con estado ausente,\\npero aún así recibirá tu mensaje\\ncuando regrese.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Solo el Administrador puede usar el color ".COLOR_CA."!\\n\\nTu color de texto será ".COLOR_CM."!\\n\\nPodés seleccionar cualquier otro color.");
define("COL_ERROR_BOX_USRA", "Solo el Administrador puede usar el color ".COLOR_CA."!\\n\\nNo intentes usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nEstán reservados para usuarios con privilegios!\\n\\nTu color de texto será ".COLOR_CD."!\\n\\nPodés elegir cualquier otro color.");
define("COL_ERROR_BOX_USRM", "Debes ser Moderador para usar el color ".COLOR_CM."!\\n\\nNo intentes usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nEstán reservados para usuarios con privilegios!\\n\\nTu color de texto será ".COLOR_CD."!\\n\\nPodés elegir cualquier otro color.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Susurrando (mensaje privado)\\nse ha deshabilitado en este chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "El tamaño de fuente solo puede ser \\nnull (para resetearlo) o estar entre 7 y 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Lu"); //Lunes
define("L_TUE", "Ma"); //Martes
define("L_WED", "Mi"); //Miércoles
define("L_THU", "Ju"); //Jueves
define("L_FRI", "Vi"); //Viernes
define("L_SAT", "Sá"); //Sábado
define("L_SUN", "Do"); //Domingo
?>