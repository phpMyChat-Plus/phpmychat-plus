<?php
// File : spanish/localized.admin.php - plus version (11.06.2007 - rev.9)
// Original translation by Josep Román <josep.roman@zuerich-see.ch>
// Updates, corrections and additions for the Plus version by Roxana Castañeda <roxminu@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "iso-8859-1";

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
define("A_ADMIN", "Administrador");
define("A_PAGE_CNT", "Página %s de %s");

// Frame for banished users
define("A_SHEET2_1", "Lista de usuarios desterrados y sus salas preocupadas");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Salas preocupadas");
define("A_SHEET2_4", "Hasta");
define("A_SHEET2_5", "sin fin");
define("A_SHEET2_6", "Las Salas administradas están separadas por coma (,) sin espacios si hay menos de 4, en caso contrario el '<B>&nbsp;*&nbsp;</B>' signo bloqueado de todas las salas.");
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
define("A_SHEET4_6", "Empezar a enviar");
define("A_SHEET4_7", "Todos los correos han sido enviados.");
define("A_SHEET4_8", "Ocurrió un error interno mientras se enviaban los correos.");
define("A_SHEET4_9", "Faltan la dirección o direcciones, el asunto o el mensaje!");

// Frame for configuration
define("A_SHEET5_0", "La versión instalada de phpMyChat-Plus es %s");
define("A_SHEET5_1", "Hay una nueva versión (%s)!:");
?>