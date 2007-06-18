<?php
// File : argentinian_spanish/localized.chat.php - plus version (27.05.2007 - rev.19)
// Original translation in Spanish (for the Argentinian dialect usage) by Jorge Colaccini <jrc@informas.com>
// Updates, corrections and additions for the Plus version by Matias Olivera <matiolivera@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";
require("localized.chatjs.php");

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Los mensajes se borrar&aacute;n despu&eacute;s de");
define("L_WEL_2", "y los usuarios inactivos despu&eacute;s de");

define("L_CUR_1", "Hay");
define("L_CUR_1a", "actualmente");
define("L_CUR_1b", "actualmente");
define("L_CUR_2", "en el chat");
define("L_CUR_3", "Usuarios en los salones de chat");
define("L_CUR_4", "usuarios en salones privados");
define("L_CUR_5", "Usuarios sin participar<br />(solo mirando la p&aacute;gina):");

define("L_SET_1", "Por favor defin&iacute; ...");
define("L_SET_2", "tu nombre de usuario");
define("L_SET_3", "el n&uacute;mero de mensajes a mostrar");
define("L_SET_4", "el tiempo entre cada actualizaci&oacute;n");
define("L_SET_5", "Seleccion&aacute; un sal&oacute;n de chat ...");
define("L_SET_6", "Salones p&uacute;blicos por defecto");
define("L_SET_7", "Hac&eacute; tu elecci&oacute;n ...");
define("L_SET_8", "Salones p&uacute;blicos creados por usuarios");
define("L_SET_9", "Crear tu propio sal&oacute;n");
define("L_SET_10", "p&uacute;blico");
define("L_SET_11", "privado");
define("L_SET_12", "sal&oacute;n");
define("L_SET_13", "Luego simplemente empieza el...");
define("L_SET_14", "chat");
define("L_SET_15", "Sal&oacute;n privado por defecto");
define("L_SET_16", "Salones privados creados por usuarios");
define("L_SET_17", "Elige tu imagen");
define("L_SET_18", "Dejar se&ntilde;alada esta p&aacute;gina: presion&aacute; \"CTRL +D\".");

define("L_SRC", "est&aacute;n habilitados");

define("L_SECS", "segundos");
define("L_MIN", "minuto");
define("L_MINS", "minutos");
define("L_HOUR", "hora");
define("L_HOURS", "horas");

// registration stuff:
define("L_REG_1", "tu contrase&ntilde;a");
define("L_REG_2", "Administraci&oacute;n de cuenta");
define("L_REG_3", "Registrate");
define("L_REG_4", "Edit&aacute; tus datos");
define("L_REG_5", "Date de baja");
define("L_REG_6", "Registraci&oacute;n de usuario");
define("L_REG_7", "s&oacute;lo si ya est&aacute;s registrado/a");
define("L_REG_8", "tu e-mail");
define("L_REG_9", "Has sido registrado/a satisfactoriamente.");
define("L_REG_10", "Atr&aacute;s");
define("L_REG_11", "Editando");
define("L_REG_12", "Modificando informaci&oacute;n de usuarios");
define("L_REG_13", "Borrando usuario");
define("L_REG_14", "Identificaci&oacute;n");
define("L_REG_15", "Acceder");
define("L_REG_16", "Cambiar");
define("L_REG_17", "Tus datos han sido ingresados satisfactoriamente.");
define("L_REG_18", "Has ha sido echado/a fuera del sal&oacute;n por el moderador.");
define("L_REG_18a", "Has ha sido echado/a fuera del sal&oacute;n por el moderador.<br />Motivos: %s");
define("L_REG_19", "Realmente quiere ser eliminado/a?");
define("L_REG_20", "Si");
define("L_REG_21", "Has sido removido/a satisfactoriamente.");
define("L_REG_22", "No");
define("L_REG_25", "Cerrar");
define("L_REG_30", "Nombre");
define("L_REG_31", "Apellido");
define("L_REG_32", "WEB");
define("L_REG_33", "mostrar p&uacute;blicamente tu e-mail");
define("L_REG_34", "Editando datos del usuario");
define("L_REG_35", "Administraci&oacute;n");
define("L_REG_36", "idiomas posibles");
define("L_REG_37", "Los campos con un <span class=\"error\">*</span> necesariamente deben ser completados.");
define("L_REG_39", "El sal&oacute;n en el que te encontrabas ha sido removido por el administrador.");
define("L_REG_45", "Sexo");
define("L_REG_46", "Masculino");
define("L_REG_47", "Femenino");
define("L_REG_48", "Sin especificar");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Tus datos para ingresar al chat");
define("L_EMAIL_VAL_2", "Bienvenido(a) a nuestro servidor de chat.");
define("L_EMAIL_VAL_Err", "Error interno, contactarse con el administrador a: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Tu contrase&ntilde;a ha sido enviada a la direcci&oacute;n de<br />e-mail.");

// admin stuff
define("L_ADM_1", "%s no es un moderador para este sal&oacute;n.");
define("L_ADM_2", "Ya no eres un usuario registrado.");

// error messages
define("L_ERR_USR_1", "Este nombre de usuario ya est&aacute; siendo utilizado. Eleg&iacute; otro, por favor.");
define("L_ERR_USR_2", "Debes elegir un nombre de usuario.");
define("L_ERR_USR_3", "Este nombre de usuario est&aacute; registrado. Escrib&iacute; su contrase&ntilde;a o eleg&iacute; otro nombre de usuario.");
define("L_ERR_USR_4", "Has ingresado incorrectamente tu contrase&ntilde;a.");
define("L_ERR_USR_5", "Debes ingresar tu nombre de usuario.");
define("L_ERR_USR_6", "Debes ingresar tu contrase&ntilde;a.");
define("L_ERR_USR_7", "Debes ingresar tu e-mail.");
define("L_ERR_USR_8", "Debes ingresar una direcci&oacute;n de e-mail v&aacute;lida.");
define("L_ERR_USR_9", "Este nombre de usuario est&aacute; en uso.");
define("L_ERR_USR_10", "Nombre de usuario o contrase&ntilde;a incorrectos.");
define("L_ERR_USR_12", "Eres el administrador, por lo tanto no puedes ser removido.");
define("L_ERR_USR_14", "Debes estar registrado como usuario antes de chatear.");
define("L_ERR_USR_15", "Debes ingresar tu nombre completo.");
define("L_ERR_USR_16a", "Solo pod&eacute;s utilizar estos caracteres especiales:<br />".$REG_CHARS_ALLOWED."<br />Espacio, coma o gui&oacute;n bajo (\\) no son permitidos. Revis&aacute; tu sintaxis.");
define("L_ERR_USR_18", "Tu nombre de usuario est&aacute; bloqueado.");
define("L_ERR_USR_20", "Has sido bloqueado desde este sal&oacute;n o desde el chat.");
define("L_ERR_USR_20a", "Fuiste bloqueado de este sal&oacute;n o del chat.<br />Motivos: %s");
define("L_ERR_USR_21", "Has estado inactivo por los &uacute;ltimos ".C_USR_DEL." minutos,<br />por eso fuiste removido de este sal&oacute;n.");
define("L_ERR_USR_23", "Para unirte a un sal&oacute;n privado debes registrarte primero.");
define("L_ERR_USR_24", "Para crear tu propio sal&oacute;n privado debes estar registrado.");
define("L_ERR_USR_25", "Solo el administrador puede usar el color ".$COLORNAME." !<br />No intentes usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />Est&aacute;n reservados para usuarios con privilegios!");
define("L_ERR_USR_26", "Solo los administradores y moderadores pueden usar el color ".$COLORNAME." !<br />No intentes usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />Est&aacute;n reservados para usuarios con privilegios!");

// users frame or popup
define("L_EXIT", "Salir");
define("L_DETACH", "Desplegar");
define("L_EXPCOL_ALL", "Desplegar/Replegar todas");
define("L_CONN_STATE", "Conexi&oacute;n establecida");
define("L_CHAT", "Chat");
define("L_USER", "usuario");
define("L_USERS", "usuarios");
define("L_LURKER", "mirones");
define("L_LURKERS", "mirones");
define("L_NO_USER", "No hay usuarios");
define("L_ROOM", "sal&oacute;n");
define("L_ROOMS", "salones");
define("L_EXPCOL", "Desplegar/Replegar este sal&oacute;n");
define("L_BEEP", "Beep/no beep cuando el usuario ingresa");
define("L_PROFILE", "mostrar perfil de usuario (datos)");
define("L_NO_PROFILE", "No hay perfil de usuario (datos)");

// input frame
define("L_HLP", "Ayuda");
define("L_MODERATOR", "%s es ahora un moderador de este sal&oacute;n.");
define("L_KICKED", "El usuario %s ha sido expulsado satisfactoriamente.");
define("L_KICKED_REASON", "%s ha sido desonectado exitosamente. (Motivos: %s)");
define("L_BANISHED", "El usuario %s ha sido bloqueado exitosamente.");
define("L_BANISHED_REASON", "%s ha sido bloqueado exitosamente. (Motivos: %s)");
define("L_ANNOUNCE", "ANUNCIO");
define("L_INVITE", "%s solicitud para que ingrese al usuario a <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> sal&oacute;n.");
define("L_INVITE_REG", " Debes estar registrado para ingresar en este sal&oacute;n.");
define("L_INVITE_DONE", "Su invitaci&oacute;n ha sido enviada a %s.");
define("L_OK", "Enviar");
define("L_BUZZ", "Galer&iacute;a de zumbidos");

// help popup
define("L_HELP_TIT_1", "Caritas");
define("L_HELP_TIT_2", "Formato de texto para mensajes");
define("L_HELP_FMT_1", "Puedes poner negritas, it&aacute;licas o texto subrayado en mensajes utilizando &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; o &lt;U&gt; &lt;/U&gt; tags.<br />Por ejemplo, &lt;B&gt;este texto&lt;/B&gt; producir&aacute; <B>este texto</B>.");
define("L_HELP_FMT_2", "Para crear un hiperv&iacute;nculo (para e-mail o URL) en tu mensaje, simplemente escribe la correspondiente direcci&oacute;n sin <i>tag</i>. El hiperv&iacute;nculo ser&aacute; creado autom&aacute;ticamente.");
define("L_HELP_TIT_3", "Comandos");
define("L_HELP_NOTE", "Todos los comandos deben ser usados en Ingl&eacute;s");
define("L_HELP_USR", "usuario");
define("L_HELP_MSG", "mensaje");
define("L_HELP_ROOM", "sal&oacute;n");
define("L_HELP_BUZZ", "~nombredelsonido");
define("L_HELP_REASON", "motivo");
define("L_HELP_CMD_0", "{} representa un dato requerido, [] uno opcional.");
define("L_HELP_CMD_1a", "Establece el n&uacute;mero de mensajes a mostrar. M&iacute;nimo y por defecto, son 5.");
define("L_HELP_CMD_1b", "Recarga y muestra los n &uacute;ltimos mensajes. M&iacute;nimo y por defecto, son 5.");
define("L_HELP_CMD_2a", "Modifica el Tiempo de actualizaci&oacute;n de la lista de mensajes (en segundos).<br />Si n no est&aacute; especificado o es menor que 3, cambia entre <b>no actualizar</b> y <b>actualizar cada 10 seg.</b>.");
define("L_HELP_CMD_2b", "Modifica el Tiempo de actualizaci&oacute;n de la lista de mensajes y lista de usuarios (en segundos).<br />Si n no est&aacute; especificado o es menor que 3, cambia entre <b>no actualizar</b> y <b>actualizar cada 10 seg.</b>.");
define("L_HELP_CMD_3", "Inversi&oacute;n del orden de mensajes.");
define("L_HELP_CMD_4", "Ingresar en otro sal&oacute;n, creando uno si no existe, siempre que est&eacute;s habilitado/a para hacerlo.<br /><b>n</b> igual a <b>0</b> para privado, <b>1</b> para p&uacute;blico. Si no se especifica asume <b>1</b>.");
define("L_HELP_CMD_5", "Abandonar el chat despu&eacute;s de mostrar un mensaje opcional.");
define("L_HELP_CMD_6", "Evita mostrar mensajes de un usuario, si se especifica su <i></b>nick</B></I>.<br />Quita <b>ignorar</b> a un usuario cuando se especifica el <i><b>nick</b></I> precedido por un <b>-</b> (gui&oacute;n), y para todos los usuarios cuando se especifica <b>-</b> (gui&oacute;n) pero no se indica ning&uacute;n <i>nick</I>.<br />Si no se especifica ni <b>-</b> (gui&oacute;n) ni <i>nicks</I>, este comando abre una ventana que muestra todos los <i>nicks</I> ignorados.");
define("L_HELP_CMD_7", "Vuelve a mostrar texto previamente ingresado (comando o mensaje).");
define("L_HELP_CMD_8", "Muestra/Oculta la hora, antes de los mensajes.");
define("L_HELP_CMD_9", "Expulsa a un usuario fuera del sal&oacute;n. Este comando solo puede ser utilizado por el moderador.");
define("L_HELP_CMD_10", "Enviar un mensaje privado a un usuario espec&iacute;fico (otros usuarios no pueden verlo).");
define("L_HELP_CMD_11", "Muestra informaci&oacute;n acerca de un usuario espec&iacute;fico.");
define("L_HELP_CMD_12", "Abre la ventana para editar los perfiles (datos) de los usuarios");
define("L_HELP_CMD_13", "Notificaci&oacute;n de entrada o salida de usuarios en o del sal&oacute;n actual.");
define("L_HELP_CMD_14", "Permite al administrador o moderador(es) del sal&oacute;n actual promover a otro usuario registrado a moderador del mismo sal&oacute;n.");
define("L_HELP_CMD_15", "Limpia de mensajes la ventana y muestra solamente los &uacute;ltimos 5.");
define("L_HELP_CMD_16", "Guarda los &uacute;ltimos n mensajes en un archivo HTML (las notificaciones son exclu&iacute;das). Si n no est&aacute; especificado, todos los mensajes de la cuenta ser&aacute;n guardados.");
define("L_HELP_CMD_17", "Permite al administrador enviar un anuncio a todos los usuarios en todos los salones.");
define("L_HELP_CMD_18", "Invita a un usuario que est&aacute; chateando a tu sal&oacute;n.");
define("L_HELP_CMD_19", "Permite al(los) moderador(es) de un sal&oacute;n o al administrador a \"<b>bloquear</b>\" un usuario de un sal&oacute;n por un tiempo determinado por el administrador.<br />Este &uacute;ltimo puede banear a un usuario de otro sal&oacute;n adonde &eacute;l no est&aacute; y utilizar &#39;<B>&nbsp;*&nbsp;</B>&#39; seteo para ban \"para siempre\" y el usuario es eliminado de todo el chat.");
define("L_HELP_CMD_20", "Describe que est&aacute;s haciendo, sin refererirte a ti mismo.");
define("L_HELP_CMD_21", "Avisa a los miembros del sal&oacute;n que intentan enviarte mensajes<br /> que en este momento no te encontr&aacute;s en tu computadora. Si quer&eacute;s volver a chatear, simplemente empez&aacute; a escribir.");
define("L_HELP_CMD_22", "Env&iacute;a un sonido buzz y opcionalmente muestra un mensaje en el sal&oacute;n actual.<br />- Uso:<br />- viejo uso: \"/buzz\" o \"/buzz mensaje a ser mostrado\" - esto reproduce el sonido buzz por defecto definido en el panel de administraci&oacute;n;<br />- uso extendido: \"/buzz ~nombredelsonido\" or \"/buzz ~nombredelsonido mensaje a mostrarse\" - esto reproduce el archivo nombredelsonido.wav del directorio plus/sounds; tom&aacute; en cuenta el signo \"~\" para ser usado al inicio de la segunda palabra, que es el nombre del archivo de sonido, sin la extensi&oacute;n .wav (solo se permiten extensiones .wav).<br />Por defecto, este es un comando para administradores o moderadores.");
define("L_HELP_CMD_23", "Env&iacute;a un <i>susurro</i> (mensaje privado). El mensaje llegar&aacute; a destino no importa en qu&eacute; sal&oacute;n este el usuario. Si el usuario no est&aacute; conectado o est&aacute; en estado ausente, recibir&aacute;s un aviso notific&aacute;ndote.");
define("L_HELP_CMD_24", "Uso: La tem&aacute;tica del sal&oacute;n debe contener al menos dos palabras.<br />Este comando cambia la tem&aacute;tica del sal&oacute;n actual. Intent&aacute; no repetir las tem&aacute;ticas de otros usuarios. Utiliz&aacute; tem&aacute;ticas importantes.<br />Por defecto, este es un comando de moderador/administrador.<br />Usando el comando \"/topic top reset\" se borrar&aacute; la tem&aacute;tica actual y se resetear&aacute; a la tem&aacute;tica por defecto que tenga el sal&oacute;n.<br />Opcional, \"/topic * {}\" Hace exactamente lo mismo pero en todos los salones (tem&aacute;tica general y reseteo de tem&aacute;tica general).");
define("L_HELP_CMD_25", "Un juego de dados con n&uacute;meros aleatorios.<br />Uso: /dice or /dice [n];<br />n puede tomar cualquier valor <b>entre 1 y %s</b> (representa a la cantidad de dados a usarse).Si no se ingresa un n&uacute;mero, se utilizar&aacute; el m&aacute;ximo por defecto.");
define("L_HELP_CMD_26", "Esta es una versi&oacute;n m&aacute;s compleja del comando /dice.<br />Uso: /{n1}d[n2] or /{n1}d;<br />n1 puede tomar cualquier valor <b>entre 1 y %s</b> (representa el n&uacute;mero de tiradas).<br />n2 Puede tomar cualquier valor <b>entre 1 y %s</b> (representa el n&uacute;mero de dados a usarse por tirada).");
define("L_HELP_CMD_27", "Resalta los mensajes de un usuario en espec&iacute;fico para poder leerlo facilmente entre la conversaci&oacute;n.<br />Uso: /high {usuario} o presion&aacute; el cuadrado peque&ntilde;o <img src=./images/highlightOff.gif> a la derecha del nombre del usuario (en la lista de salones/usuarios)");
define("L_HELP_CMD_28", "Permite el posteo de <i>una sola imagen</i> como mensaje.<br />Uso: La imagen debe estar en internet y ser accesible por todos. No uses p&aacute;ginas donde necesit&aacute;s loguearte.<br />Debes ingresar todo el link de la imagen! Ej.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Extensiones aceptadas: .jpg .bmp .gif .png. Respet&aacute; las may&uacute;sculas y min&uacute;sculas!<br />Recomendaci&oacute;n: escrib&iacute; /img luego dej&aacute; un espacio y  peg&aacute; la URL; para conseguir la URL de una imagen de una p&aacute;gina, hac&eacute; click derecho sobre la imagen, and&aacute; a propiedades, seleccion&aacute; toda la direcci&oacute;n/URL (cuidado! aveces la direcci&oacute;n/URL ocupa m&aacute;s de un rengl&oacute;n) copiala y despu&eacute;s pegala despu&eacute;s de /img<br /> No uses im&aacute;genes de tu PC: cortar&aacute; la conexi&oacute;n de tu ventana de chat!!!");
define("L_HELP_CMD_29", "El segundo comando permitir&aacute; al administrador o moderador(es) del sal&oacute;n actual quitar el privilegio de moderador a un usuario registrado al que se le hab&iacute;a dado previamente para el mismo sal&oacute;n.<br />La opci&oacute;n * le quitar&aacute; los privilegios de moderador al usuario en todos los salones.");
define("L_HELP_CMD_30", "El segundo comando hace lo mismo que /me pero mostrar&aacute; tu g&eacute;nero.<br />Ej. * El se&ntilde;or Alejandro est&aacute; mirando TV o La se&ntilde;ora Dana est&aacute; fel&iacute;z.");
define("L_HELP_CMD_31", "Cambia el orden de los usuarios en las listas: por orden de entrada o alfab&eacute;ticamente.");
define("L_HELP_CMD_32", "Esta es una tercera versi&oacute;n del juego de dados.<br />Uso: /d{n1}[tn2] or /d{n1};<br />n1 puede tomar cualquier valor <b>entre 1 and 100</b> (representa el n&uacute;mero de giros por dado).<br />n2 puede tomar cualquier valor <b>entre 1 y %s</b> (representa el n&uacute;mero de dados por tirada).");
define("L_HELP_CMD_33", "Cambia el tama&ntilde;o de fuente de los mensajes en el chat de acuerdo a la selecci&oacute;n del usuario (valores permitidos para n: <b>entre 7 y 15</b>); el comando /size resetea el tama&ntilde;o de fuente al valor por defecto (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Lineamientos del Chat");
define("L_HELP_ETIQ_2", "Quisieramos mantener a esta comunidad amigable y divertida, por eso te pedimos por favor que cumplas las siguientes reglas. En caso contrario uno de nuestros moderadores podr&iacute;a deshabilitarte del chat.<br /><br />Gracias,");
define("L_HELP_ETIQ_3", "Lineamientos de nuestro Chat");
define("L_HELP_ETIQ_4", "No hagas &quot;spam&quot; en el chat escribiendo frases o letras sin sentido.</li>
<li>No alternes May&uacute;sCuLAs y MIn&uacute;ScUlas en las palabras.</li>
<li>Usa lo menos posible palabras todas en may&uacute;sculas.</li>
<li>Recuerda que los usuarios de nuestro chat son de todo el mundo, y, seguramente, encontrar&aacute;s gente con otras creencias. Por favor se amable y correcto con ellos.</li>
<li>No insultes a otros usuarios. De hecho, trata de evitar el uso de palabras o frases insultantes.</li>
<li>No llames a los otros usuarios por sus verdaderos nombres. Puede no agradarles. Usa sus nicknames.");

// messages frame
define("L_NO_MSG", "En este momento no hay mensajes ...");
define("L_TODAY_DWN", "Los mensajes que han sido enviados hoy, est&aacute;n al final");
define("L_TODAY_UP", "Los mensajes que han sido enviados hoy, est&aacute;n al principio");

// message colors
$TextColors = array(	"Negro" => "#000000",
				"Rojo" => "#FF0000",
				"Verde" => "#009900",
				"Azul" => "#0000FF",
				"Morado" => "#9900FF",
				"Oscuro rojo" => "#990000",
				"Oscuro verde" => "#006600",
				"Oscuro azul" => "#000099",
				"Marr&oacute;n" => "#996633",
				"Azul agua" => "#006699",
				"Naranja" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Ignorado");
define("L_IGNOR_NON", "No hay usuarios ignorados");

// whois popup
define("L_WHOIS_ADMIN", "Administrador");
define("L_WHOIS_MODER", "Moderador");
define("L_WHOIS_USER", "Usuario");
define("L_WHOIS_GUEST", "Invitado");
define("L_WHOIS_REG", "Registrado");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s ingres&oacute; a este sal&oacute;n" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s ingres&oacute; a este sal&oacute;n");
define("L_ENTER_ROM_NOSOUND", "%s ingres&oacute; a este sal&oacute;n");
define("L_EXIT_ROM", "%s sali&oacute; de este sal&oacute;n");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s ha sido autom&aacute;ticamente expulsado de este sal&oacute;n por inactividad");
define("L_CLOSED_ROM", "%s ha cerrado su explorador");

// Text for /away command notification string:
define("L_AWAY", "%s tiene estado ausente");
define("L_BACK", "%s regres&oacute;!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Men&uacute; r&aacute;pido *****");	//&nbsp; means one blank space. this will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", "ha cambiado la TEMATICA a:");
define("L_TOPIC_RESET", "ha reseteado la TEMATICA");
define("L_HELP_TOP", "la TEMATICA debe contener al menos dos palabras");

// Img cmd mod
define("L_PIC", "Imagen posteada por");
define("L_PIC_RESIZED", "Redimensionar a");
define("L_HELP_IMG", "direcci&oacute;n URL completa de la imagen a ser posteada");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s ya no es moderador de ningun sal&oacute;n.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Comandos Extra Disponibles:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Utilidades/Modos Extra disponibles:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Nuestro robot disponible es: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "Idiomas hablados");
define("L_PRO_2", "Link favorito 1");
define("L_PRO_3", "Link favorito 2");
define("L_PRO_4", "Descripci&oacute;n");
define("L_PRO_5", "Imagen URL");
define("L_PRO_6", "Tu color de nombre/texto");

// Avatar mod
define("L_ERR_AV", "URL inv&aacute;lida o host inexistente.");
define("L_TITLE_AV", "Tu imagen actual: ");
define("L_CHG_AV", "Seleccion&aacute; &#39;Change&#39; en el formulario del Perfil <br />para guardar tu Imagen.");
define("L_SEL_NEW_AV", "Selecciona una nueva Imagen");
define("L_EX_AV", "(Ejemplo: http://mysite/images/mypic.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Escribe la URL, luego presiona ENTER para verla)");
define("L_CANCEL", "Cancelar");
define("L_CLICK", "Haz click aqu&iacute;");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Nuestro robot esta p&uacute;blicamente activo aqu&iacute;. Para hablarle escribe <b>hello ".C_BOT_NAME.'</b>. Para finalizar la conversaci&oacute;n, escribe: <b>bye '.C_BOT_NAME.'</b>. (private: /to <b>'.C_BOT_NAME.'</b> Message)'); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Nuestro robot est&aacute; p&uacute;blicamente activo en el sal&oacute;n %s. Solo pod&eacute;s hablarle en privado seleccionando su nombre y \"susurrandole\". (command: /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Nuestro robot no est&aacute; p&uacute;blicamente activo. Solo puedes hablarle en privado seleccionando su nombre. (comandos: /to <b>".C_BOT_NAME."</b> Mensaje o /wisp <b>".C_BOT_NAME."</b> Mensaje)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "tirando los dados, los resultados son:");

// Log mod by Ciprian
define("L_ARCHIVE", "Abrir Archivo");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "abrir popups en mensaje privado");
define("L_PRIV_POST_MSG", "Env&iacute;a un mensaje privado!");
define("L_PRIV_MSG", "Nuevo mensaje privado recibido!");
define("L_PRIV_MSGS", "nuevo mensaje privado recibido!");
define("L_PRIV_MSGSa", "Aqu&iacute; est&aacute;n los 10 primeros mensajes!<br />Us&aacute; el link inferior para ver el resto.");
define("L_PRIV_MSG1", "De:");
define("L_PRIV_MSG2", "Sal&oacute;n:");
define("L_PRIV_MSG3", "A:");
define("L_PRIV_MSG4", "Mensaje:");
define("L_PRIV_MSG5", "Posteado:");
define("L_PRIV_REPLY", "Contestar");
define("L_PRIV_READ", "Presion&aacute; el bot&oacute;n Cerrar para marcar todos los mensajes como le&iacute;dos!");
define("L_PRIV_POPUP", "Pod&eacute;s deshabilitar/re-habilitar esta utilidad de popup cuando quieras<br />editando tu <a href=\"#\" onClick=\"window.parent.runCmd('profile',''); return false;\" onMouseOver=\"window.status='Change your settings.'; return true\">Perfil</a> (Solo usuarios registrados)");

// Color Input Box mod by Ciprian
define("L_COLOR", "Color:");
define("L_COLOR_HEAD", "Selector de color");
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Activo" : "Inactivo"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Activo" : "Inactivo"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Configuraci&oacute;n actual de este servidor</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Colores por defecto</u>: Administrador = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderadores = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Otros usuarios = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Color por defecto</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Selector de color");
define("L_COL_HELP_SUB1", "Uso:");
define("L_COL_HELP_P1", "Pod&eacute;s seleccionar tu propio color por defecto editando tu perfil (el mismo color que tu color de usuario). Igualmente podr&aacute;s usar cualquier otro color. Para regresar a tu color por defecto, deb&eacute;s seleccionar una vez el color por defecto (Null) - Es el primero de la lista.");
define("L_COL_HELP_SUB2", "Sugerencias:");
define("L_COL_HELP_P2", "<u>Rango de color</u><br />Dependiendo de tu explorador/SO, es posible que algunos de los colores no est&eacute;n funcionales. Solo 16 nombres de colores son soportados por W3C HTML 4.0 standard:");
define("L_COL_HELP_P2a", "Si alguno de los usuarios avisa que no puede ver tu color, significa que est&eacute; probablemente usando un explorador viejo.");
define("L_COL_HELP_SUB3", "Configuraci&oacute;n definida en este chat:");
define("L_COL_HELP_P3", "<u>Niveles de privilegios para el uso de colores</u>:<br />1. El Administrador puede usar cualquier color.<br />El color por defecto para el Administrador es: <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Los Moderadores pueden usar cualquier color excepto <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> y <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />El color por defecto para moderadores es <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Los dem&aacute;s usuarios pueden usar cualquier color excepto <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> y <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "El color por defecto es <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Detalles T&eacute;cnicos</u>: Esos colores han sido definidos por el Administrador en el Pandel de Administraci&oacute;n.<br />Si hay algo que no te guste de los colores por defecto, Puedes contactar al <b>Administrador</b> primero, no a los dem&aacute;s usuarios en el sal&oacute;n. :-)");
define("L_COL_HELP_USER_STATUS", "Tu estado");
define("L_COL_TUT", "Usando texto con color en el chat");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","usuarios est&aacute;n ".LOGIN_LINK."chateando</A> en este momento.</td></tr>");
define("USERS_LOGIN","1 usuario est&aacute; ".LOGIN_LINK."chateando</A> en este momento.</td></tr>");
define("NO_USER","Nadie est&aacute; ".LOGIN_LINK."cahteando</A> en este momento.</td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Bienvenido a nuestro chat!. Por favor mientras chatees segu&iacute; las reglas de la red: <I>ser amable y correcto</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Bienvenido a nuestro chat!. Por favor mientras chatees segu&iacute; las reglas de la red: <I>ser amable y correcto</I>.");
define("WELCOME_MSG_NOSOUND", "Bienvenido a nuestro chat!. Por favor mientras chatees segu&iacute; las reglas de la red: <I>ser amable y correcto</I>.");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "La configuraci&oacute;n de este servidor ha sido modificada. Para prevenir mal funcionamientos, Por favor refresc&aacute; tu explorador (presion&aacute; F5 o sal&iacute; y volv&eacute; a entrar al chat).");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Otras Opciones");
?>