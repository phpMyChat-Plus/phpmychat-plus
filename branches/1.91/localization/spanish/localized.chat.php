<?php
// File : spanish/localized.chat.php - plus version (14.04.2007 - rev.17)
// Original translation by Josep Rom�n <josep.roman@zuerich-see.ch> and && Le�n Del R�o <leon@webmaster.com.mx>
// Updates, corrections and additions for the Plus version by Roxana Casta�eda <roxminu@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for Charset
$Charset = "iso-8859-1";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Los mensajes son borrados despu�s de");
define("L_WEL_2", "y los usuarios inactivos despu�s de");

define("L_CUR_1", "Hay");
define("L_CUR_1a", "actualmente en el chat");
define("L_CUR_1b", "est� actualmente");
define("L_CUR_2", "en el chat");
define("L_CUR_3", "Usuarios en las salas de chat");
define("L_CUR_4", "usuarios en salas privadas");
define("L_CUR_5", "Usuarios acechando en este momento<br>(vigilando esta p�gina):");

define("L_SET_1", "Por favor escriba ...");
define("L_SET_2", "su nombre de usuario");
define("L_SET_3", "la cantidad de mensajes que se mostrar�n");
define("L_SET_4", "el tiempo l�mite entre cada actualizaci�n");
define("L_SET_5", "Seleccione una sala de chat ...");
define("L_SET_6", "salas p�blicas por defecto");
define("L_SET_7", "Haga su elecci�n ...");
define("L_SET_8", "salas p�blicas creadas por usuarios");
define("L_SET_9", "cree su propia sala");
define("L_SET_10", "p�blica");
define("L_SET_11", "privada");
define("L_SET_12", "sala");
define("L_SET_13", "Luego, s�lo");
define("L_SET_14", "chatee");
define("L_SET_15", "salas privadas por defecto");
define("L_SET_16", "salas privadas creadas por usuarios");
define("L_SET_17", "elija su avatar");
define("L_SET_18", "Agregar a sus Favoritos: presione \"CTRL +D\".");

define("L_SRC", "se puede conseguir y usar gratis");

define("L_SECS", "segundos");
define("L_MIN", "minuto");
define("L_MINS", "minutos");
define("L_HOUR", "hora");
define("L_HOURS", "horas");

// registration stuff:
define("L_REG_1", "su contrase�a");
define("L_REG_2", "Administraci�n de su cuenta");
define("L_REG_3", "Reg�strese");
define("L_REG_4", "Modifique su perfil");
define("L_REG_5", "Eliminar el usuario");
define("L_REG_6", "Registrar usuario");
define("L_REG_7", "s�lo si est� registrado");
define("L_REG_8", "su correo electr�nico");
define("L_REG_9", "Se ha registrado.");
define("L_REG_10", "Atr�s");
define("L_REG_11", "Modificando");
define("L_REG_12", "Modificando la informaci�n del usuario");
define("L_REG_13", "Eliminando al usuario");
define("L_REG_14", "Ingresar");
define("L_REG_15", "Ingresar");
define("L_REG_16", "Cambiar");
define("L_REG_17", "Su perfil fue actualizado exitosamente.");
define("L_REG_18", "Usted ha sido expulsado de esta sala por el moderador de la sala.");
define("L_REG_18a", "Usted ha sido expulsado de esta sala por un moderador de la sala.<br>Raz�n: %s");
define("L_REG_19", "�Est� seguro que desea eliminarse?");
define("L_REG_20", "Si");
define("L_REG_21", "Ha sido eliminado exitosamente.");
define("L_REG_22", "No");
define("L_REG_25", "Cerrar");
define("L_REG_30", "nombre");
define("L_REG_31", "apellido");
define("L_REG_32", "WEB");
define("L_REG_33", "mostrar su email en la informaci�n p�blica");
define("L_REG_34", "Modificando el perfil del usuario");
define("L_REG_35", "Administraci�n");
define("L_REG_36", "ubicaci�n/pa�s");
define("L_REG_37", "Los campos con <span class=\"error\">*</span> son obligatorios.");
define("L_REG_39", "La sala en la que estaba ha sido eliminada por el administrador.");
define("L_REG_45", "g�nero");
define("L_REG_46", "masculino");
define("L_REG_47", "femenino");
define("L_REG_48", "sin especificar");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Sus datos para ingresar al chat");
define("L_EMAIL_VAL_2", "Bienvenido a nuestro servidor de chat.");
define("L_EMAIL_VAL_Err", "Error interno, por favor contacte al administrador: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Su contrase�a ha sido enviada a su direcci�n de correo electr�nico.<br>Puede cambiar su contrase�a en la p�gina de ingreso en modificar su perfil.");

// admin stuff
define("L_ADM_1", "%s ya no es el moderador de esta sala.");
define("L_ADM_2", "Usted no contin�a siendo un usuario registrado.");

// error messages
define("L_ERR_USR_1", "Este nombre de usuario ya est� siendo usado. Por favor escoja otro nombre.");
define("L_ERR_USR_2", "Debe elegir un nombre de usuario.");
define("L_ERR_USR_3", "Este usuario ya existe.<br>Por favor ingrese su contrase�a o elija otro nombre de usuario.");
define("L_ERR_USR_4", "La contrase�a que ingres� est� errada.");
define("L_ERR_USR_5", "Debe ingresar su nombre de usuario.");
define("L_ERR_USR_6", "Debe ingresar su contrase�a.");
define("L_ERR_USR_7", "Debe ingresar su correo electr�nico.");
define("L_ERR_USR_8", "Debe ingresar una direcci�n de correo electr�nico v�lida.");
define("L_ERR_USR_9", "Este nombre de usuario ya est� siendo utilizado.");
define("L_ERR_USR_10", "Usuario o contrase�a equivocados.");
define("L_ERR_USR_11", "Usted debe ser el administrador.");
define("L_ERR_USR_12", "Usted es el administrador, as� que no puede eliminarse.");
define("L_ERR_USR_13", "Para crear su propia sala debe estar registrado.");
define("L_ERR_USR_14", "Debe estar registrado para poder chatear.");
define("L_ERR_USR_15", "Debe ingresar su nombre completo.");
define("L_ERR_USR_16", "S�lo se permiten los siguientes caracteres adicionales:\\n".$REG_CHARS_ALLOWED."\\nEspacios, comas o barras invertidas (\\) no est�n permitidos.\\nRevise la sintaxis.");
define("L_ERR_USR_16a", "S�lo se permiten los siguientes caracteres adicionales:<br />".$REG_CHARS_ALLOWED."<br>Espacios, comas o barras invertidas (\\) no est�n permitidos. Revise la sintaxis.");
define("L_ERR_USR_17", "Esta sala no existe, y usted no est� autorizado para crear una nueva.");
define("L_ERR_USR_18", "Se ha encontrado una palabra no permitida en su nombre de usuario.");
define("L_ERR_USR_19", "No puede estar en m�s de una sala al mismo tiempo.");
define("L_ERR_USR_20", "Usted ha sido expulsado de esta sala o del chat.");
define("L_ERR_USR_20a", "Usted ha sido expulsado de esta sala o del chat.<br>Raz�n: %s");
define("L_ERR_USR_21", "Usted NO ha estado activo por los �ltimos ".C_USR_DEL." minutos,<br>por lo tanto su sesi�n ha expirado.");
define("L_ERR_USR_22", "Este comando no est� disponible para\\nel navegador que usted usa (IE engine).");
define("L_ERR_USR_23", "Para unirse a una sala privada debe registrarse.");
define("L_ERR_USR_24", "Para crear su propia sala privada debe registrarse.");
define("L_ERR_USR_25", "S�lo el administrador puede usar el color ".$COLORNAME."!<br>No trate de usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".<br>Estos est�n reservados para los usuarios de control!");
define("L_ERR_USR_26", "S�lo los administradores y moderadores pueden usar este color ".$COLORNAME."!<br>No intente usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".<br>Estos est�n reservados para los usuarios de control!");
define("L_ERR_USR_27", "No puede hablar en privado con usted.\\nPor favor conserve eso en su mente...\\nAhora escoja otra nombre de usuario.");
define("L_ERR_ROM_1", "Los nombres de las salas no pueden contener comas o barras invertidas (\\).");
define("L_ERR_ROM_2", "Se ha encontrado una palabra no permitida en el nombre de la sala que desea crear.");
define("L_ERR_ROM_3", "Esta sala ya existe como p�blica.");
define("L_ERR_ROM_4", "Nombre de sala inv�lido.");

// users frame or popup
define("L_EXIT", "Salir del Chat");
define("L_DETACH", "Separe la lista de usuarios");
define("L_EXPCOL_ALL", "Expandir/Colapsar TODO");
define("L_CONN_STATE", "Refrescar la Conexi�n");
define("L_CHAT", "Chat");
define("L_USER", "usuario");
define("L_USERS", "usuarios");
define("L_LURKER", "acechador");
define("L_LURKERS", "acechadores");
define("L_NO_USER", "No es usuario");
define("L_ROOM", "sala");
define("L_ROOM", "salas");
define("L_EXPCOL", "Expandir/Colapsar sala");
define("L_BEEP", "Bip/sin bip cuando entra un usuario");
define("L_PROFILE", "Mostrar perfil");
define("L_NO_PROFILE", "Sin perfil");

// input frame
define("L_HLP", "Ayuda");
define("L_BAD_CMD", "Este no es un comando v�lido!");
define("L_ADMIN", "%s ya es el administrador!");
define("L_IS_MODERATOR", "%s ya es el moderador!");
define("L_NO_MODERATOR", "S�lo el moderador puede usar este comando.");
define("L_MODERATOR", "%s es ahora el moderador de esta sala.");
define("L_NOEXIST_USER", "%s no est� en esta sala.");
define("L_NONREG_USER", "%s no est� registrado.");
define("L_NONREG_USER_IP", "Su IP es: %s.");
define("L_NO_KICKED", "%s es el moderador o el administrador y no puede bloqueado.");
define("L_KICKED", "%s ha sido expulsado exitosamente.");
define("L_KICKED_REASON", "%s ha sido expulsado exitosamente. (Raz�n: %s)");
define("L_NO_BANISHED", "%s es el moderador o el administrador y no puede desterrado.");
define("L_BANISHED", "%s ha sido desterrado exitosamente.");
define("L_BANISHED_REASON", "%s ha sido desterrado exitosamente. (Raz�n: %s)");
define("L_SVR_TIME", "Hora del servidor: ");
define("L_NO_SAVE", "No hay mensaje que guardar!");
define("L_NO_ADMIN", "S�lo el administrador puede usar este comando.");
define("L_NO_REG_USER", "Debe estar registrado en este chat para poder usar este comando.");
define("L_ANNOUNCE", "ANUNCIO");
define("L_INVITE", "%s lo invita para que se le una en <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> sala.");
define("L_INVITE_REG", " Tiene que estar registrado para entrar a esta sala.");
define("L_INVITE_DONE", "Su invitaci�n ha sido enviada a %s.");
define("L_OK", "Enviar");
define("L_BUZZ", "Galer�a de Alarmas");

// help popup
define("L_HELP_TIT_1", "Caritas Smilies");
define("L_HELP_TIT_2", "Dar formato al texto de sus mensajes");
define("L_HELP_FMT_1", "Puede usar texto en negritas, it�licas o subrayado en los mensajes encasillando las secciones de su texto que correspondan en &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; or &lt;U&gt; &lt;/U&gt; tags.<br>Por ejemplo, &lt;B&gt;este texto&lt;/B&gt; producir� <B>este texto</B>.");
define("L_HELP_FMT_2", "Para crear un hiperv�nculo (para e-mail o URL) en su mensaje, s�lo mecanograf�e la direcci�n sin usar ningana etiqueta. El hiperv�nculo se crear� autom�ticamente.");
define("L_HELP_TIT_3", "Comandos");
define("L_HELP_NOTE", "Todos los comandos deben usarse en Ingl�s!");
define("L_HELP_USR", "usuario");
define("L_HELP_MSG", "mensaje");
define("L_HELP_ROOM", "sala");
define("L_HELP_BUZZ", "~nombre del sonido");
define("L_HELP_REASON", "la raz�n");
define("L_HELP_CMD_0", "{} representa una caracter�stica necesaria, [] una opcional.");
define("L_HELP_CMD_1a", "Seleccione la cantidad de mensajes que se mostrar�n. La cantidad m�nima y la establecida por defecto es 5.");
define("L_HELP_CMD_1b", "Refresque el marco con los mensajes y muestre los m�s recientes, la cantidad m�nima y la establecida por defecto es 5.");
define("L_HELP_CMD_2a", "Modifique (en segundos).<br>Si n no est� especificado o es menor a 3, var�a entre sin refrescar y refrescar cada 10s.");
define("L_HELP_CMD_2b", "Modifique el tiempo de demora en refrescar/actualizar las listas de mensajes y usuarios (en segundos).<br>Si n no est� especificado o menor a 3, var�a entre sin refrescar y refrescar cada 10s.");
define("L_HELP_CMD_3", "Invierte el orden de los mensajes (no funciona en todos los navegadores).");
define("L_HELP_CMD_4", "Unase a otra sala, cre�ndola si no existe y si est� autorizado.<br>n equivale a 0 para privada y 1 para p�blica, si no lo especifica, el valor por defecto es 1.");
define("L_HELP_CMD_5", "Deje el chat despu�s de mostrar un mensaje opcional.");
define("L_HELP_CMD_6", "No muestra los mensajes de un usuario si su alias ha sido seleccionado.<br>Seleccione apagado off para ignorar a un usuario cuando el alias y - han sido especificados, para todos los usuarios cuando - es pero no el alias.<br>Si no selecciona ninguna opci�n, este comando abre una ventana emergente que muestra todos los alias ignorados o sin mostrar.");
define("L_HELP_CMD_7", "Llame nuevamente al texto escrito recientemente (comando o mensaje).");
define("L_HELP_CMD_8", "Mostrar/Esconder la hora antes de los mensajes.");
define("L_HELP_CMD_9", "Expulse o destierre a un usuario del chat. Este comando s�lo puede ser usado por el moderador de esa sala o el administrador.<br>Opcionalmente, [".L_HELP_REASON."] muestra la raz�n para la expulsi�n (cualquier texto deseado).");
define("L_HELP_CMD_10", "Enviar un mensaje privado al usuario seleccionado (los dem�s usuarios no lo ver�n).");
define("L_HELP_CMD_11", "Muestra la informaci�n sobre el usuario seleccionado.");
define("L_HELP_CMD_12", "Ventana emergente para modificar el perfil del usuario.");
define("L_HELP_CMD_13", "Cambia las notificaciones o anuncios para el ingreso/salida del usuario a la sala actual.");
define("L_HELP_CMD_14", "Permite que el administrador o el moderador(es) de sala actual promueva a otro usuario registrado como moderador de la misma sala.");
define("L_HELP_CMD_15", "Limpia el marco de los mensajes y deja s�lamente los �ltimos 5 mensajes.");
define("L_HELP_CMD_16", "Guardar los �ltimos n mensajes (no incluye las notificaciones) como un archivo HTML. Si n no ha sido especificado, todos los mensajes disponibles ser�n incluidos.");
define("L_HELP_CMD_17", "Permite que el administrador env�e un anuncio a todos los usuarios en todas las salas chat.");
define("L_HELP_CMD_18", "Invitar a un usuario que est� chateando en otra sala a unirse a la sala en la que usted se encuentra.");
define("L_HELP_CMD_19", "Permite que el moderador(es) de una sala o el administrador puedan \"banish\" a un usuario de una sala por un tiempo definido por el administrador.<br>El administrador puede expulsar o desterrar a un usuario que est� chateando en una sala diferente a aquella en la cual �l est� actualmente y usar la opci�n '<B>&nbsp;*&nbsp;</B>' para expulsar o desterrar para \"forever\"a un usuario de todo el chat en general.<br>Opcionalmente, [".L_HELP_REASON."] muestra la raz�n para la expulsi�n o destierro (cualquier texto deseado).");
define("L_HELP_CMD_20", "Describe lo que usted est� haciendo sin referirse a usted");
define("L_HELP_CMD_21", "Anuncia la sala y los usuarios que intenta comunicarse<br> que usted se encuentra lejos de su computadora. Si desea regresar al chat, s�lo empiece a escribir.");
define("L_HELP_CMD_22", "Envia un sonido buzz y opcionalmente muestra un mensaje en la sala actual.<br />- Uso:<br />- uso previo:  \"/buzz\" o \"/buzz mensaje que debe mostrarse\" - esto toca el sonido por defecto para buzz definido en el panel de Administracion;<br />- uso avanzado: \"/buzz ~nombredelsonido\" o \"/buzz ~nombredelsonido mensaje para mostrar\" - esto toca el archivo nombredelsonido.wav de la carpeta  plus/sounds folder; por favor note el signo \"~\" que debe ser usado al principio de la segunda palabra, la cual es el nombre del archivo de sonido, sin la extensi�n .wav (s�lo las extensiones .wav est�n permitidas).<br>Por defecto este es un comando del moderador/administrador.");
define("L_HELP_CMD_23", "Enviar un<i>whisper</i> (mensaje privado). Este mensaje llegar� al destinatario, sin importar en que sala est� en ese momento. Si el usuario no est� en l�nea on-line o se encuentra lejos de su computadora, usted ser� notificado.");
define("L_HELP_CMD_24", "Uso: el tema debe contener por lo menos 2 palabras.<br>Este comando cambia el tema de la sala actual. Trate de no borrar los temas de otros usuarios. Use temas importantes.<br>Por defecto, este es un comando del moderador/administrador.<br>Usando el comando \"/topic top reset\" el tema actual ser� borrado y se volver� al tema por defecto de la sala.<br>Opcional, \"/topic * {}\" hace ex�ctamente lo mismo pero en todas las salas (tema global y resetear tema global).");
define("L_HELP_CMD_25", "Un juego de dados para n�meros al azar/peligrosos.<br>Uso: /dice o /dice [n];<br>n pueden usar cualquier valor <b>entre 1 y %s</b> (representa el n�mero de dados arrojados). Si no se indica ning�n n�mero, por defecto se usar� el m�ximo arrojado.");
define("L_HELP_CMD_26", "Esta es una versi�n m�s compleja del comando /dados.<br>Uso: /{n1}d[n2] o /{n1}d;<br>n1 puede ser cualquier valor <b>entre 1 y %s</b> (representa el n�mero de dados arrojados).<br>n2 puede ser cualquier valor <b>entre 1 y %s</b> (representa el n�mero de dados arrojados por cada tirada).");
define("L_HELP_CMD_27", "Destaca los mensajes de un usuario espec�fico para una lectura m�s f�cil a trav�s de las conversaciones.<br>Uso: /high {usuario} o presionar el peque�o <img src=./images/highlightOff.gif> cuadrado a la derecha del nombre del usuario (en la lista de salas/usuarios)");
define("L_HELP_CMD_28", "Permite poner <i>una sola imagen</i> como mensaje.<br>Uso: La imagen tiene que estar en la internet y su acceso tiene que ser libre para todos. No use p�ginas que requieran loguearse.<br>Se debe escribir el v�nculo completo de la imagen! Ej.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br>Extensiones permitidas: .jpg .bmp .gif .png. El v�nculo es sensible. Escriba las may�sculas y min�sculas que correspondan!<br>SUGERENCIAS: escriba /img luego un espacio y pegue el URL en la casilla; para conseguir el URL de una imagen en una p�gina web, dele clic derecho en la imagen, vaya a propiedades, luego seleccione la direcci�n completa/URL (a veces necesita desplazarse hacia abajo) y copie/pegue despu�s de /img<br>No use im�genes de su computadora/pc: causar� problemas en la ventana del chat!!!");
define("L_HELP_CMD_29", "El segundo comando permitir� al administrador o moderador(es) de la sala actual degradar a un usuario registrado previamente promovido a moderador para esa misma sala.<br>La opci�n * degradar� al usuario en todas las salas.");
define("L_HELP_CMD_30", "El segundo comando hace lo mismo que /me pero mostrar� su g�nero<br>Ej. * Sr Ciprian est� viendo la TV o * Sra Dana est� feliz.");
define("L_HELP_CMD_31", "Cambia el orden en que los usuarios se muestran en las listas: por hora de ingreso o alfab�ticamente.");
define("L_HELP_CMD_32", "Este tercero (representaci�n/roleplaying) versi�n de tirar los dados.<br>Uso: /d{n1}[tn2] o /d{n1};<br>n1 puede tomar cualquier valor <b>entre 1 y 100</b> (representa el n�mero de tiradas por dado).<br>n2 puede tomar cualquier valor <b>entre 1 y %s</b> (representa el n�mero de dados por tirada).");
define("L_HELP_CMD_33", "Cambia el tama�o de la fuente de los mensajes en el chat por el que elija el usuario (valores permitidos para n: <b>entre 7 y 15</b>); el comando /size vuelve el tama�o de la fuente al valor por defecto (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Etiqueta del Chat");
define("L_HELP_ETIQ_2", "Nuestro sitio desea mantener su comunidad amigable y divertida, as� que por favor siga las siguientes pol�ticas. Si no sigue estas reglas, uno de los moderadores del chat probablemente lo expulse/destierre del chat.<br /><br>Gracias,");
define("L_HELP_ETIQ_3", "Pol�ticas de Etiqueta de nuestro Chat");
define("L_HELP_ETIQ_4", "No haga &quot;spam&quot; en el chat escribiendo sonseras o letras al azar.</li><li>No use may�sculas y min�sculas sin prop�sito, por ejemplo pRopoSiTo</li><li>Mantenga el uso de MAYUSCULAS al m�nimo, pues su uso se considera como gritar</li><li>Tenga presente que los usuarios del chat son de diferentes lugares del mundo, as� que seguramente encontrar� personas con diferentes creencias. Por favor sea amable y educado con estas personas.</li><li>No insulte ni diga groser�as a otros miembros del chat. Es m�s, trate de no usar malas palabras, groser�as e insultos en absoluto.</li><li>No se dirija a otros miembros del chat por sus verdaderos nombres porque puede que no les agrade. Es mejor que use sus alias.");

// messages frame
define("L_NO_MSG", "No hay mensajes ...");
define("L_TODAY_DWN", "Los mensajes que se enviaron hoy empiezan debajo");
define("L_TODAY_UP", "Los mensajes que fueron enviados ayer empiezan debajo");

// message colors
$TextColors = array(	"Negro" => "#000000",
				"Rojo" => "#FF0000",
				"Verde" => "#009900",
				"Azul" => "#0000FF",
				"Morado" => "#9900FF",
				"Rojo oscuro" => "#990000",
				"Verde oscuro" => "#006600",
				"Azul oscuro" => "#000099",
				"Marr�n" => "#996633",
				"Celeste" => "#006699",
				"Naranja" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Ignorado");
define("L_IGNOR_NON", "Usuario sin ignorar");

// whois popup
define("L_WHOIS_ADMIN", "Administrador");
define("L_WHOIS_MODER", "Moderador");
define("L_WHOIS_USER", "Usuario");
define("L_WHOIS_GUEST", "Invitado");
define("L_WHOIS_REG", "Registrado");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s entra en esta sala" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s entra en esta sala");
define("L_ENTER_ROM_NOSOUND", "%s entra en esta sala");
define("L_EXIT_ROM", "%s sale de esta sala");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s ha sido desconectado autom�ticamente de esta sala debido a inactividad");
define("L_CLOSED_ROM", "%s ha cerrado su navegador");

// Text for /away command notification string:
define("L_AWAY", "%s est� lejos");
define("L_BACK", "%s ha regresado!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Menu R�pido *****");	//&nbsp; means one blank space. this will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", "ha puesto el TEMA a:");
define("L_TOPIC_RESET", "ha reseteado el TEMA");
define("L_HELP_TOP", "por lo menos dos palabras como tema");

// Img cmd mod
define("L_PIC", "Imagen colocada por");
define("L_PIC_RESIZED", "Escalar a");
define("L_HELP_IMG", "direcci�n completa de la imagen que se mostrar�");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s no es un moderador.");
define("L_IS_NO_MOD_ALL", "%s ya no es un moderador en ninguna sala de este chat.");
define("L_ERR_IS_ADMIN", "%s es el administrador!\\nUsted no puede cambiar sus permisos.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Comandos adicionales disponibles:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Caracter�sticas Adicionales/Mods disponibles:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Nuestro bot disponible es: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "idiomas que habla");
define("L_PRO_2", "v�nculo favorito 1");
define("L_PRO_3", "v�nculo favorito 2");
define("L_PRO_4", "descripci�n");
define("L_PRO_5", "URL de la imagen o foto");
define("L_PRO_6", "su nombre/color del texto");

// Avatar mod
define("L_ERR_AV", "URL inv�lido o servidor inexistente.");
define("L_TITLE_AV", "Su avatar actual: ");
define("L_CHG_AV", "Clic 'Cambiar' en el formulario del Perfil <br>para guardar su Avatar.");
define("L_SEL_NEW_AV", "Seleccione un Avatar nuevo");
define("L_EX_AV", "(ejemplo: http://misitio/imagenes/mifoto.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Escribir el URL, y luego presionar INTRO para ver)");
define("L_CANCEL", "Cancelar");
define("L_CLICK", "Clic aqu�");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "CONSEJOS: Nuestro bot estamos aqu�. Para hablar escriba <b>hello ".C_BOT_NAME.'</b>. Para despedirse, escriba: <b>bye '.C_BOT_NAME.'</b>. (private: /to <b>'.C_BOT_NAME.'</b> Mensaje)'); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "CONSEJOS: Nuestro bot stamos en la sala %s. Puede hablar en privado haciendo clic en el nombre y susurrando. (command: /wisp <b>".C_BOT_NAME."</b> Mensaje)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "CONSEJOS: Nuestro bot no est� p�blicamente activo. S�lo puede hablar en privado haciendo clic en el nombre. (commands: /to <b>".C_BOT_NAME."</b> Message or /wisp <b>".C_BOT_NAME."</b> Mensaje)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot no est� funcionando en esta sala!");
define("BOT_START_ERROR", "Bot est� actualmente funcionando en esta sala!");
define("BOT_DISABLED_ERROR", "Bot ha sido desactivado por el Panel de Administraci�n!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "tirar los dados, los resultados son:");
define("DICE_WRONG", "Tiene que seleccionar cuantos dados desea arrojar\\n(Escoja un n�mero entre 1 y ".MAX_ROLLS.').\\nS�lo escriba /dados tirar todos los '.MAX_ROLLS.' dados.');
define("DICE2_WRONG", "El segundo valor debe ser entre 1 y ".MAX_ROLLS.'.\\nDejar en blanco para usar todos los '.MAX_ROLLS.' dados\\n(ej. /'.MAX_DICES.'d o /'.MAX_DICES.'d'.MAX_ROLLS.').');
define("DICE2_WRONG1", "El primer valor debe ser entre 1 y ".MAX_DICES.'.\\n(ej. /'.MAX_DICES.'d o /'.MAX_DICES.'d'.MAX_ROLLS.').');
define("DICE3_WRONG", "El segundo valor debe ser entre 1 y ".MAX_ROLLS.'.\\nDejar en blanco para usar todos los'.MAX_ROLLS.' dados\\n(ej. /d50 o /d100t'.MAX_ROLLS.').');

// Log mod by Ciprian
define("L_ARCHIVE", "Abrir Archivo");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "abrir ventanas emergente para mensajes privados");
define("L_PRIV_POST_MSG", "Env�e un mensaje privado!");
define("L_PRIV_MSG", "Nuevo mensaje privado recibido!!");
define("L_PRIV_MSGS", "Nuevo mensaje privado recibido!");
define("L_PRIV_MSGSa", "Aqu� est�n los primeros 10 mensajes!<br>Use el v�nculo que se encuentra al final para ver los dem�s.");
define("L_PRIV_MSG1", "De:");
define("L_PRIV_MSG2", "Sala:");
define("L_PRIV_MSG3", "Para:");
define("L_PRIV_MSG4", "Mensaje:");
define("L_PRIV_MSG5", "Posted&nbsp;:");
define("L_PRIV_REPLY", "Responder");
define("L_PRIV_READ", "Presione el bot�n de Cerrar para marcar todos los mensajes como leidos!");
define("L_PRIV_POPUP", "Usted puede desactivar/activar esta funci�n en cualquier momento<br>editando su perfil (s�lo usuarios registrados)");
define("L_NOT_ONLINE", "%s no est� conectado en este momento.");
define("L_PRIV_NOT_ONLINE", "%s no esta conectado en este momento,\\npero de todas maneras recibir� su mensaje cuando se conecte.");
define("L_PRIV_NOT_INROOM", "%s no est� en esta sala.\\nSi a�n desea mandarle un mp mensaje privado a este usuario,\\nuse el comando: /wisp %s mensaje.");
define("L_PRIV_AWAY", "%s aparece como lejos,\\npero igual recibir� su mensaje\\ncuando regrese.");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Activado" : "Desactivado"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Activado" : "Desactivado"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Preferencias actuales en este servidor</u>:<br>a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br>b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Colores por defecto</u>: Administrador = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderadores = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Otros usuarios = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Color por defecto</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Selector de Color");
define("L_COL_HELP_SUB1", "Uso:");
define("L_COL_HELP_P1", "Usted puede seleccionar su color editando su perfil (el mismo color que el de su nombre de usuario). A�n as� podr� usar cualquier otro color. Para cambiar nuevamente al color por defecto despu�s de usar un color diferente cualquiera, tiene que escoger una vez el color por defecto (Nulo) - es el primero de la lista de selecci�n.");
define("L_COL_HELP_SUB2", "Sugerencias:");
define("L_COL_HELP_P2", "<u>Rango de Color</u><br>Dependiendo de la capacidad de su navegador/Sistema Operativo, es posible que algunos colores no se muestren. S�lo 16 nombres de colores son permitidos por el est�ndar W3C HTML 4.0 standard:");
define("L_COL_HELP_P2a", "Si un usuario se queja porque no puede ver todos los colores seleccionados quiere decir que probablemente est� usando una versi�n antigua de su navegador.");
define("L_COL_HELP_SUB3", "Controles definidos en este chat:");
define("L_COL_HELP_P3", "<u>Uso del color en los niveles de control</u>:<br>1. El administrador puede usar cualquier color.<br>El color por defecto para el administrador es <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br>2. Los moderadors pueden usar cualquier color excepto <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> y <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br>El color por defecto para los moderadores es <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br>3. Los dem�s usuarios pueden usar cualquier color excepto <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> y <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "El color por defecto es <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Asuntos t�cnicos</u>: Estos colores han sido definidos por el administrador en el panel de administraci�n.<br>Si tiene alg�n problema o no le gustan los colores por defecto, por favor contacte al <b>administrador</b> primero, en vez de los otros usuarios en su sala. :-)");
define("L_COL_HELP_USER_STATUS", "Su estado");
define("L_COL_TUT", "Usando texto de colores en el chat");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "S�lo el administrador puede usar el color ".COLOR_CA."!\\n\\nEl color de su texto vuelve a ".COLOR_CM."!\\n\\nPor favor escoja cualquier otro color.");
define("COL_ERROR_BOX_USRA", "S�lo el administrador puede usar el color ".COLOR_CA."!\\n\\nNo trate de usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nEstos son colores reservados para los usuarios de control!\\n\\nEl color de su texto vuelve a ".COLOR_CD."!\\n\\nPor favor escoja cualquier otro color.");
define("COL_ERROR_BOX_USRM", "Usted tiene que ser un moderador para usar el color ".COLOR_CM." !\\n\\nNo intente usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nEstos son colores reservados para los usuarios de control!\\n\\nEl color de su texto vuelve a ".COLOR_CD."!\\n\\nPor favor escoja cualquier otro color.");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","usuarios est�n ".LOGIN_LINK."chateando</A> en este momento.</td></tr>");
define("USERS_LOGIN","1 usuario est� ".LOGIN_LINK."chateando</A> en este momento.</td></tr>");
define("NO_USER","Nadie est� ".LOGIN_LINK."chateando</A> en este momento.</td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Bienvenido a nuestro chat. Por favor siga las reglas de la etiqueta mientras chatea: <I>trate de ser amable y educado</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Bienvenido a nuestro chat. Por favor siga las reglas de la etiqueta mientras chatea: <I>trate de ser amable y educado</I>.");
define("WELCOME_MSG_NOSOUND", "Bienvenido a nuestro chat. Por favor siga las reglas de la etiqueta mientras chatea: <I>trate de ser amable y educado</I>.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Los Susurros (mensajes privados)\\nha sido desactivado en este chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "El valor tama�o de la fuente puede ser s�lo \\nnulo (para resetear) o entre 7 y 15");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Las preferencias acaban de ser cambiadas. Para evitar problemas de funcionamiento, por favor actualice/refresque la p�gina (presione la tecla F5 o Salga y vuelva a entrar al chat).");

// Week days for status worldtime by Ciprian
define("L_MON", "Lu"); //Lunes
define("L_TUE", "Ma"); //Martes
define("L_WED", "Mi"); //Mi�rcoles
define("L_THU", "Ju"); //Jueves
define("L_FRI", "Vi"); //Viernes
define("L_SAT", "Sa"); //S�bado
define("L_SUN", "Do"); //Domingo

// Extra options by Ciprian
define("L_EXTRA_OPT", "Otras Opciones");
?>