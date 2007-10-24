<?php
// File : spanish/localized.admin.php - plus version (11.06.2007 - rev.9)
// Original translation by Josep Román <josep.roman@zuerich-see.ch>
// Updates, corrections and additions for the Plus version by Roxana Castañeda <roxminu@yahoo.com> & Shelly Noyes <shelly.noyes@gmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administración para %s");
define("A_MENU_1", "Usuarios registrados");
define("A_MENU_2", "Usuarios bloqueados");
define("A_MENU_3", "Limpiar salas");
define("A_MENU_4", "Enviar correos");
define("A_MENU_5", "Configuración");
define("A_MENU_6", "Extras del Chat");
define("A_MENU_7", "Buscar");
define("A_MENU_8", "Conexiones");
define("A_MENU_9", "Archivo histórico");
define("A_LOGOUT", "Salir");

// Frame for registered users
define("A_SHEET1_1", "Lista de usuarios registrados y sus permisos");
define("A_SHEET1_2", "Nombre de usuario");
define("A_SHEET1_3", "Permisos");
define("A_SHEET1_4", "Salas administradas");
define("A_SHEET1_5", "Las Salas administradas están separadas por coma (,) sin espacios.");
define("A_SHEET1_6", "Eliminar perfiles revisados");
define("A_SHEET1_7", "Modificar");
define("A_SHEET1_8", "No hay usuarios registrados, excepto usted.");
define("A_SHEET1_9", "Desterrar perfiles revisados");
define("A_SHEET1_10", "Ahora debe ir a su hoja de usuarios bloqueados para redefinir sus preferencias.");
define("A_SHEET1_11", "Ultima conexión");
define("A_SHEET1_12", "Razón del destierro (opcional)");
define("A_USER", "Usuario");
define("A_MODER", "Moderador");
define("A_TOPMOD", "Moderador Superior");
define("A_ADMIN", "Administrador");
define("A_PAGE_CNT", "Página %s de %s");

// Frame for banished users
define("A_SHEET2_1", "Lista de usuarios desterrados y sus salas preocupadas");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Salas preocupadas");
define("A_SHEET2_4", "Hasta");
define("A_SHEET2_5", "sin fin");
define("A_SHEET2_6", "Las Salas administradas están separadas por coma (,) sin espacios si hay menos de 4, en caso contrario el ’<B>*</B>’ signo bloqueado de todas las salas.");
define("A_SHEET2_7", "Remover el bloqueo para todos los usuarios seleccionados");
define("A_SHEET2_8", "No hay usuarios bloqueados.");
define("A_SHEET2_9", "Razón (opcional)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Lista de salas existentes");
define("A_SHEET3_2", "Al limpiar una \"non-default\" sala también eliminarán al moderador<br /> de esta sala.");
define("A_SHEET3_3", "Limpiar salas seleccionadas");
define("A_SHEET3_4", "No hay salas para limpiar.");

// Frame for sending mails
define("A_SHEET4_0", "Falta ingresar el correo electrónico de admin en la lengueta de Configuración.");
define("A_SHEET4_1", "Enviar correos");
define("A_SHEET4_2", "Para:");
define("A_SHEET4_3", "Seleccionar todos");
define("A_SHEET4_4", "Asunto:");
define("A_SHEET4_5", "Mensaje:");
define("A_SHEET4_6", "¡Enviar!");
define("A_SHEET4_7", "Todos los correos han sido enviados.");
define("A_SHEET4_8", "Ocurrió un error interno mientras se enviaban los correos.");
define("A_SHEET4_9", "¡Faltan la dirección o direcciones, el asunto o el mensaje!");
define("A_SHEET4_10", "Ańadir correos electrónicos extras,<br />separados por comas sin espacios (,)");
define("A_SHEET4_11", "Firma");
define("A_SHEET4_12", "Deseleccionar todos");

// Frame for configuration
define("A_SHEET5_0", "La versión instalada de phpMyChat-Plus es %s");
define("A_SHEET5_1", "¡Hay una nueva versión (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Extras de Chat inutilizados");
define("A_REFRESH_MSG", "Refrescar Mensajes");
define("A_MSG_DEL", "Borrar");
define("A_POST_TIME", "Expuesto en");
define("A_FROM_TO", "De  A");
define("A_FROM", "De") ;
define("A_CHTEX_ROOM", "Salón");
define("A_CHTEX_MSG", "Mensaje");

//Save chat logs
define("A_CHAT_LOGS_1", "Registros de conecciones de IP para %s");
define("A_CHAT_LOGS_2", "Archivo de Chat inutilizado");
define("A_CHAT_LOGS_3", "Abrir la pagina de los registros de chat IP");
define("A_CHAT_LOGS_4", "Borrar los registros de Chat IP");
define("A_CHAT_LOGS_5", "¡Borrará el archivo de IP!\\n");
define("A_CHAT_LOGS_6", "Archivo lleno de los registros de chat");
define("A_CHAT_LOGS_7", "Mostrar la seccion del archivo de usuarios de chat");
define("A_CHAT_LOGS_8", "¡Borrará todos los archivos y carpetas\\nguardados en la carpeta de %s!\\n");
define("A_CHAT_LOGS_9", "Borrar todos los %s registros");
define("A_CHAT_LOGS_10", "Borrar el ańo");
define("A_CHAT_LOGS_11", "¡Borrará todos los archivos\\nguardados en la carpeta de %s!\\n");
define("A_CHAT_LOGS_12", "(solamente los que son públicos)");
define("A_CHAT_LOGS_13", "Borrar la mes");
define("A_CHAT_LOGS_14", "¡Borrará el archivo %s!\\n");
define("A_CHAT_LOGS_15", "Borrará este registro");
define("A_CHAT_LOGS_16", "Leer %s registro");
define("A_CHAT_LOGS_17", "Públicos Chat Registros Archivo");
define("A_CHAT_LOGS_18", "(solamente los que son públicos)");
define("A_CHAT_LOGS_19", "\\nNo es reversible...\\n¿Esta seguro?");
define("A_CHAT_LOGS_20", "Revele la sección completa de la archivo de chat.");
define("A_CHAT_LOGS_21", "Vaya arriba");
define("A_CHAT_LOGS_22", "Archivo ahorrado del registro");
define("A_CHAT_LOGS_23", "Creado %s");

//Admin Search Page
define("A_SEARCH_1", "Pagina de Busca del Salón de Chat");
define("A_SEARCH_2", "Todas Categorías");
define("A_SEARCH_3", "Nombres");
define("A_SEARCH_4", "Dirección de IP");
define("A_SEARCH_5", "Permisiones");
define("A_SEARCH_6", "Correo Electrónico");
define("A_SEARCH_7", "Género");
define("A_SEARCH_8", "Descripción");
define("A_SEARCH_9", "Enlaces");
define("A_SEARCH_10", "Buscar");
define("A_SEARCH_11", "Para la categoría de permisiones, las opciones son <b>ad</b>, <b>mod</b> or <b>u</b>.");
define("A_SEARCH_12", "Para la categoría de género las opciones son <b>0</b> para no especificado, <b>1</b> para hombre o <b>2</b> para mujer.");
define("A_SEARCH_13", "Nombre de usuario");
define("A_SEARCH_14", "Primer Nombre");
define("A_SEARCH_15", "Apellido");
define("A_SEARCH_16", "País");
define("A_SEARCH_18", "Permisión");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Género");
define("A_SEARCH_21", "Término de busca");
define("A_SEARCH_22", "Buscar");
define("A_SEARCH_23", "¡Por favor provea un término de busca e inténtelo otra vez!");

// Connected users Page
define("A_LURKING_1", "Usuarios conectados y observando");
define("A_LURKING_2", "Observar inutilizado.");
?>