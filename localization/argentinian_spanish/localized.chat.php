<?php
// File : argentinian_spanish/localized.chat.php - plus version (20.03.2010 - rev.44)
// Original translation in Spanish (for the Argentinian dialect usage) by Jorge Colaccini <jrc@informas.com>
// Updates, corrections and additions for the Plus version by Matias Olivera <matiolivera@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Los mensajes se borrarán después de %s %s");
define("L_WEL_2", "y los usuarios inactivos después de %s %s");

define("L_CUR_1", "Hay");
define("L_CUR_1a", "actualmente");
define("L_CUR_1b", "actualmente");
define("L_CUR_2", "en el chat");
define("L_CUR_3", "Usuarios en los salones de chat");
define("L_CUR_4", "usuarios en salones privados");
define("L_CUR_5", "Usuarios sin participar<br />(solo mirando la página):");

define("L_SET_1", "Por favor definí ...");
define("L_SET_2", "Nombre de usuario");
define("L_SET_3", "el número de mensajes a mostrar");
define("L_SET_4", "el tiempo entre cada actualización");
define("L_SET_5", "Seleccioná un salón de chat ...");
define("L_SET_6", "Salones públicos por defecto");
define("L_SET_7", "Hacé tu elección ...");
define("L_SET_8", "Salones públicos creados por usuarios");
define("L_SET_9", "Crear tu propio salón");
define("L_SET_10", "público");
define("L_SET_11", "privado");
define("L_SET_12", "salón");
define("L_SET_13", "Luego simplemente empieza el...");
define("L_SET_14", "chat");
define("L_SET_15", "Salón privado por defecto");
define("L_SET_16", "Salones privados creados por usuarios");
define("L_SET_17", "Elige tu imagen");
define("L_SET_18", "Dejar señalada esta página: presioná \"Ctrl+D\".");
define("L_SET_19", "Recordarme");

define("L_SRC", "están habilitados");

define("L_SEC", "segundo");
define("L_SECS", "segundos");
define("L_MIN", "minuto");
define("L_MINS", "minutos");
define("L_HOUR", "hora");
define("L_HOURS", "horas");
define("L_DAY", "día");
define("L_DAYS", "días");

// registration stuff:
define("L_REG_1", "Contraseña");
define("L_REG_2", "Administración de cuenta");
define("L_REG_3", "Registrate");
define("L_REG_4", "Editá tus datos");
define("L_REG_5", "Date de baja");
define("L_REG_6", "Registración de usuario");
define("L_REG_7", "sólo si ya estás registrado/a");
define("L_REG_8", "E-mail");
define("L_REG_9", "Has sido registrado/a satisfactoriamente.");
define("L_REG_10", "Atrás");
define("L_REG_11", "Editando");
define("L_REG_12", "Modificando información de usuarios");
define("L_REG_13", "Borrando usuario");
define("L_REG_14", "Identificación");
define("L_REG_15", "Acceder");
define("L_REG_16", "Cambiar");
define("L_REG_17", "Tus datos han sido ingresados satisfactoriamente.");
define("L_REG_18", "Has ha sido echado/a fuera del salón por el moderador.");
define("L_REG_18a", "Has ha sido echado/a fuera del salón por el moderador.<br />Motivos: %s");
define("L_REG_19", "Realmente quiere ser eliminado/a?");
define("L_REG_20", "Si");
define("L_REG_21", "Has sido removido/a satisfactoriamente.");
define("L_REG_22", "No");
define("L_REG_25", "Cerrar");
define("L_REG_30", "Nombre");
define("L_REG_31", "Apellido");
define("L_REG_32", "WEB");
define("L_REG_33", "mostrar públicamente tu e-mail");
define("L_REG_34", "Editando datos del usuario");
define("L_REG_35", "Administración");
define("L_REG_36", "Ubicación/País");
define("L_REG_37", "Los campos con un <span class=\"error\">*</span> necesariamente deben ser completados.");
define("L_REG_39", "El salón en el que te encontrabas ha sido removido por el administrador.");
define("L_REG_43", "Confidencial");
define("L_REG_44", "Pareja");
define("L_REG_45", "Sexo");
define("L_REG_46", "Masculino");
define("L_REG_47", "Femenino");
define("L_REG_48", "Sin especificar");
define("L_REG_49", "Registración requerida!");
define("L_REG_50", "Registración suspendida!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Tus datos para ingresar al chat");
define("L_EMAIL_VAL_2", "Bienvenido a nuestro servidor de chat.");
define("L_EMAIL_VAL_Err", "Error interno, contactarse con el administrador a: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Tu contraseña ha sido enviada a la dirección de e-mail.<br />Puedes cambiar tu contraseña de logueo editando tu perfil.");
define("L_EMAIL_VAL_PENDING_Done", "La formación de tu registro fue enviada a revisión.");
define("L_EMAIL_VAL_PENDING_Done1", "Te enviaremos el contraseña una vez que el administrador haya aprobado tu cuenta.");
define("L_EMAIL_VAL_3", "Tu registro está pendiente por %s");
define("L_EMAIL_VAL_31", "Felicitaciones! Tu registro fue revisado y aprobado!");
define("L_EMAIL_VAL_32", "Esta es tu infromación de registro para %s en %s:"); //chat name at chaturl
define("L_EMAIL_VAL_4", "Acabas de registrar esta cuenta para %s en %s:"); //chat name at chaturl
define("L_EMAIL_VAL_41", "Acabas de cambiar información importante de la cuenta para %s en %s (cuenta modificada: %s)."); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "Your - %s - account details for %s"); //username - chatname
define("L_EMAIL_VAL_51", "Your - %s - account updated details for %s"); //username - chatname
define("L_EMAIL_VAL_6", "Registrado en %s");
define("L_EMAIL_VAL_61", "Acualizado el  %s");
define("L_EMAIL_VAL_7", "Abajo está tu %s información actualizada de la cuenta:"); //username
define("L_EMAIL_VAL_8", "Guarda este mail para futures referencias.\nPor favor hazlo con cuidado y no compartas esta información.\nGracias! Que lo disfrutes!");
define("L_EMAIL_VAL_81", "Puedes cambiar tu contraseña de logueo editando tu perfil.");

// admin stuff
define("L_ADM_1", "%s no es un moderador para este salón.");
define("L_ADM_2", "Ya no eres un usuario registrado.");

// error messages
define("L_ERR_USR_1", "Este nombre de usuario ya está siendo utilizado. Elegí otro, por favor.");
define("L_ERR_USR_2", "Debes elegir un nombre de usuario.");
define("L_ERR_USR_3", "Este nombre de usuario está registrado.<br />Escribí su contraseña o elegí otro nombre de usuario.");
define("L_ERR_USR_4", "Has ingresado incorrectamente tu contraseña.");
define("L_ERR_USR_5", "Debes ingresar tu nombre de usuario.");
define("L_ERR_USR_6", "Debes ingresar tu contraseña.");
define("L_ERR_USR_7", "Debes ingresar tu e-mail.");
define("L_ERR_USR_8", "Debes ingresar una dirección de e-mail válida.");
define("L_ERR_USR_9", "Este nombre de usuario está en uso.");
define("L_ERR_USR_10", "Nombre de usuario o contraseña incorrectos.");
define("L_ERR_USR_11", "Debes ser administrador.");
define("L_ERR_USR_12", "Eres el administrador, por lo tanto no puedes ser removido.");
define("L_ERR_USR_13", "Para crear tu propio salón, debes estar registrado como usuario.");
define("L_ERR_USR_14", "Debes estar registrado como usuario antes de chatear.");
define("L_ERR_USR_15", "Debes ingresar tu nombre completo.");
define("L_ERR_USR_16", "El nombre de usuario no puede contener espacios, comas o barras (\\).");
define("L_ERR_USR_16a", "Solo podés utilizar estos caracteres especiales:<br />".$REG_CHARS_ALLOWED."<br />Espacio, coma o guión bajo (\\) no son permitidos. Revisá tu sintaxis.");
define("L_ERR_USR_17", "Este salón no existe, y no estás habilitado para crear uno.");
define("L_ERR_USR_18", "Tu nombre de usuario está bloqueado.");
define("L_ERR_USR_19", "No puedes estar en más de un salón al mismo tiempo.");
define("L_ERR_USR_20", "Has sido bloqueado desde este salón o desde el chat.");
define("L_ERR_USR_20a", "Fuiste bloqueado de este salón o del chat.<br />Motivos: %s");
define("L_ERR_USR_21", "Has estado inactivo por los últimos ".C_USR_DEL." minutos,<br />por eso fuiste removido de este salón.");
define("L_ERR_USR_22", "Este comando no está disponible para\\nel navegador que estas usando (motor de IE).");
define("L_ERR_USR_23", "Para unirte a un salón privado debes registrarte primero.");
define("L_ERR_USR_24", "Para crear tu propio salón privado debes estar registrado.");
define("L_ERR_USR_25", "Solo el administrador puede usar el color ".$COLORNAME." !<br />No intentes usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />Están reservados para usuarios con privilegios!");
define("L_ERR_USR_26", "Solo los administradores y moderadores pueden usar el color ".$COLORNAME." !<br />No intentes usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />Están reservados para usuarios con privilegios!");
define("L_ERR_USR_27", "No podés hablar en privado con vos mismo.\\nNo escuches voces en tu cabeza...\\nEscogé a un usuario diferente.");
define("L_ERR_USR_28", "Tu acceso a %s ha sido restringido!<br />Por favor elige un salón diferente."); // room name
define("L_ERR_ROM_1", "Los nombres de los salones no pueden contener comas o barras (\\).");
define("L_ERR_ROM_2", "Hay palabras no válidas en el nombre del salón que quieres crear.");
define("L_ERR_ROM_3", "Este salón ya existe como público.");
define("L_ERR_ROM_4", "Nombre de salón inválido.");

// users frame or popup
define("L_EXIT", "Salir");
define("L_DETACH", "Desplegar");
define("L_EXPCOL_ALL", "Desplegar/Replegar todas");
define("L_CONN_STATE", "Conexión establecida");
define("L_CHAT", "Chat");
define("L_USER", "usuario");
define("L_USERS", "usuarios");
define("L_LURKER", "mirones");
define("L_LURKERS", "mirones");
define("L_NO_USER", "No hay usuarios");
define("L_ROOM", "salón");
define("L_ROOMS", "salones");
define("L_EXPCOL", "Desplegar/Replegar este salón");
define("L_BEEP", "Beep/no beep cuando el usuario ingresa");
define("L_PROFILE", "Mostrar perfil de usuario (datos)");
define("L_NO_PROFILE", "No hay perfil de usuario (datos)");

// input frame
define("L_HLP", "Ayuda");
define("L_MODERATOR", "%s es ahora un moderador de este salón.");
define("L_KICKED", "%s ha sido removido exitosamente.");
define("L_KICKED_REASON", "%s ha sido removido exitosamente. (Motivo: %s)");
define("L_KICKED_ALL", "Todos los usuarios han sido removidos exitosamente.");
define("L_KICKED_ALL_REASON", "Todos los usuarios han sido removidos exitosamente. (Motivo: %s)");
define("L_BANISHED", "%s ha sido bloqueado exitosamente.");
define("L_BANISHED_REASON", "%s ha sido bloqueado exitosamente. (Motivos: %s)");
define("L_ANNOUNCE", "ANUNCIO");
define("L_INVITE", "%s solicitud para que ingrese al usuario a <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> salón.");
define("L_INVITE_REG", "Debes estar registrado para ingresar en este salón.");
define("L_INVITE_DONE", "Su invitación ha sido enviada a %s.");
define("L_OK", "Enviar");
define("L_BUZZ", "Galería de zumbidos");
define("L_BAD_CMD", "Este no es un comando válido!");
define("L_ADMIN", "%s ya es el administrador!");
define("L_IS_MODERATOR", "%s ya es el moderador!");
define("L_NO_MODERATOR", "Solo un moderador de este salón puede utilizar este comando.");
define("L_NONEXIST_USER", "%s no está en este salón.");
define("L_NONREG_USER", "%s no está registrado.");
define("L_NONREG_USER_IP", "Su dirección de IP es: %s.");
define("L_NO_KICKED", "%s es un moderador o el administrador y no puede ser expulsado.");
define("L_NO_BANISHED", "%s es un moderador o el administrador y no puede ser bloqueado.");
define("L_SVR_TIME", "Hora del servidor: ");
define("L_NO_SAVE", "No hay mensajes para guardar!");
define("L_NO_ADMIN", "Solamente el administrador puede utilizar este comando.");
define("L_NO_REG_USER", "Debes estar registrado en el chat para usar este comando.");

// help popup
define("L_HELP_TIT_1", "Caritas");
define("L_HELP_TIT_2", "Formato de texto para mensajes");
define("L_HELP_FMT_1", "Puedes poner negritas, itálicas o texto subrayado en mensajes utilizando &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; o &lt;U&gt; &lt;/U&gt; tags.<br />Por ejemplo, &lt;B&gt;este texto&lt;/B&gt; producirá <B>este texto</B>.");
define("L_HELP_FMT_2", "Para crear un hipervínculo (para e-mail o URL) en tu mensaje, simplemente escribe la correspondiente dirección sin <i>tag</i>. El hipervínculo será creado automáticamente.");
define("L_HELP_TIT_3", "Comandos");
define("L_HELP_NOTE", "Todos los comandos deben ser usados en Inglés");
define("L_HELP_MSG", "mensaje");
define("L_HELP_MSGS", "mensajes");
define("L_HELP_ROOM", "salón");
define("L_HELP_BUZZ", "~nombredelsonido");
define("L_HELP_BUZZ1", "Alerta..."); //alert, sound alert, ring, whirr
define("L_HELP_REASON", "motivo");
define("L_HELP_MR", "Sr. %s"); // El señor
define("L_HELP_MS", "Sra. %s"); // La señora
define("L_HELP_CMD_0", "{} representa un dato requerido, [] uno opcional.");
define("L_HELP_CMD_1a", "Establece el número de mensajes a mostrar. Mínimo y por defecto, son 5.");
define("L_HELP_CMD_1b", "Recarga y muestra los n últimos mensajes. Mínimo y por defecto, son 5.");
define("L_HELP_CMD_2a", "Modifica el Tiempo de actualización de la lista de mensajes (en segundos).<br />Si n no está especificado o es menor que 3, cambia entre <b>no actualizar</b> y <b>actualizar cada 10 seg.</b>.");
define("L_HELP_CMD_2b", "Modifica el Tiempo de actualización de la lista de mensajes y lista de usuarios (en segundos).<br />Si n no está especificado o es menor que 3, cambia entre <b>no actualizar</b> y <b>actualizar cada 10 seg.</b>.");
define("L_HELP_CMD_3", "Inversión del orden de mensajes.");
define("L_HELP_CMD_4", "Ingresar en otro salón, creando uno si no existe, siempre que estés habilitado/a para hacerlo.<br /><b>n</b> igual a <b>0</b> para privado, <b>1</b> para público. Si no se especifica asume <b>1</b>.");
define("L_HELP_CMD_5", "Abandonar el chat después de mostrar un mensaje opcional.");
define("L_HELP_CMD_6", "Evita mostrar mensajes de un usuario, si se especifica su <i></b>nick</B></I>.<br />Quita <b>ignorar</b> a un usuario cuando se especifica el <i><b>nick</b></I> precedido por un <b>-</b> (guión), y para todos los usuarios cuando se especifica <b>-</b> (guión) pero no se indica ningún <i>nick</I>.<br />Si no se especifica ni <b>-</b> (guión) ni <i>nicks</I>, este comando abre una ventana que muestra todos los <i>nicks</I> ignorados.");
define("L_HELP_CMD_7", "Vuelve a mostrar texto previamente ingresado (comando o mensaje).");
define("L_HELP_CMD_8", "Muestra/Oculta la hora, antes de los mensajes.");
define("L_HELP_CMD_9", "Expulsa a un usuario fuera del salón. Este comando solo puede ser utilizado por el moderador.<br />Opcionalmente, [".L_HELP_REASON."] muestra la razón de la expulsión (cualquier texto deseado).<br />Si se utiliza la opción *, el comando removerá del chat a todos los usuarios sin poderes (solo visitantes y usuarios restringidos). Esto es útil cuando la conexión con el servidor tiene problemas y toda la gente debe recargarse. En el segundo caso, se recomienda un [".L_HELP_REASON."] para dejar saber a los usuarios por qué han sido expulsados.");
define("L_HELP_CMD_10", "Enviar un mensaje privado a un usuario específico (otros usuarios no pueden verlo).");
define("L_HELP_CMD_11", "Muestra información acerca de un usuario específico.");
define("L_HELP_CMD_12", "Abre la ventana para editar los perfiles (datos) de los usuarios");
define("L_HELP_CMD_13", "Notificación de entrada o salida de usuarios en o del salón actual.");
define("L_HELP_CMD_14", "Permite al administrador o moderador(es) del salón actual promover a otro usuario registrado a moderador del mismo salón.");
define("L_HELP_CMD_15", "Limpia de mensajes la ventana y muestra solamente los últimos 5.");
define("L_HELP_CMD_16", "Guarda los últimos n mensajes en un archivo HTML (las notificaciones son excluídas). Si n no está especificado, todos los mensajes de la cuenta serán guardados.");
define("L_HELP_CMD_17", "Permite al administrador enviar un anuncio a todos los usuarios en todos los salones.");
define("L_HELP_CMD_18", "Invita a un usuario que está chateando a tu salón.");
define("L_HELP_CMD_19", "Permite al(los) moderador(es) de un salón o al administrador a \"<b>bloquear</b>\" un usuario de un salón por un tiempo determinado por el administrador.<br />Este último puede banear a un usuario de otro salón adonde él no está y utilizar * seteo para ban \"para siempre\" y el usuario es eliminado de todo el chat.");
define("L_HELP_CMD_20", "Describe que estás haciendo, sin refererirte a ti mismo.");
define("L_HELP_CMD_21", "Avisa a los miembros del salón que intentan enviarte mensajes<br />que en este momento no te encontrás en tu computadora. Si querés volver a chatear, simplemente empezá a escribir.");
define("L_HELP_CMD_22", "Envía un sonido buzz y opcionalmente muestra un mensaje en el salón actual.<br />- Uso:<br />- viejo uso: \"/buzz\" o \"/buzz mensaje a ser mostrado\" - esto reproduce el sonido buzz por defecto definido en el panel de administración;<br />- uso extendido: \"/buzz ".L_HELP_BUZZ."\" o \"/buzz ".L_HELP_BUZZ." mensaje a mostrarse\" - esto reproduce el archivo nombredelsonido.wav del directorio plus/sounds; tomá en cuenta el signo \"~\" para ser usado al inicio de la segunda palabra, que es el nombre del archivo de sonido, sin la extensión .wav (solo se permiten extensiones .wav).<br />Por defecto, este es un comando para administradores o moderadores.");
define("L_HELP_CMD_23", "Envía un <i>susurro</i> (mensaje privado). El mensaje llegará a destino no importa en qué salón este el usuario. Si el usuario no está conectado o está en estado ausente, recibirás un aviso notificándote.");
define("L_HELP_CMD_24", "Este comando cambia la temática del salón actual. Intentá no repetir las temáticas de otros usuarios. Utilizá temáticas importantes.<br />Por defecto, este es un comando de moderador/administrador.<br />Usando el comando \"/topic reset\" se borrará la temática actual y se reseteará a la temática por defecto que tenga el salón.<br />Opcional, \"/topic * {}\" y \"/topic * reset\" Hace exactamente lo mismo pero en todos los salones (temática general y reseteo de temática general).");
define("L_HELP_CMD_25", "Un juego de dados con números aleatorios.<br />Uso: /dice or /dice [n];<br />n puede tomar cualquier valor <b>entre 1 y %s</b> (representa a la cantidad de dados a usarse). Si no se ingresa un número, se utilizará el máximo por defecto.");
define("L_HELP_CMD_26", "Esta es una versión más compleja del comando /dice.<br />Uso: /{n1}d[n2] or /{n1}d;<br />n1 puede tomar cualquier valor <b>entre 1 y %s</b> (representa el número de tiradas).<br />n2 Puede tomar cualquier valor <b>entre 1 y %s</b> (representa el número de dados a usarse por tirada).");
define("L_HELP_CMD_27", "Resalta los mensajes de un usuario en específico para poder leerlo facilmente entre la conversación.<br />Uso: /high {usuario} o presioná el cuadrado pequeño <img src=./images/highlightOff.gif> a la derecha del nombre del usuario (en la lista de salones/usuarios)");
define("L_HELP_CMD_28", "Permite el posteo de <i>una sola imagen</i> como mensaje.<br />Uso: La imagen debe estar en internet y ser accesible por todos. No uses páginas donde necesitás loguearte.<br />Debes ingresar todo el link de la imagen! Ej. <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Extensiones aceptadas: .jpg .bmp .gif .png. Respetá las mayúsculas y minúsculas!<br />Recomendación: escribí /img luego dejá un espacio y pegá la URL; para conseguir la URL de una imagen de una página, hacé click derecho sobre la imagen, andá a propiedades, seleccioná toda la dirección/URL (cuidado! aveces la dirección/URL ocupa más de un renglón) copiala y después pegala después de /img<br />No uses imágenes de tu PC: cortará la conexión de tu ventana de chat!!!");
define("L_HELP_CMD_29", "El segundo comando permitirá al administrador o moderador(es) del salón actual quitar el privilegio de moderador a un usuario registrado al que se le había dado previamente para el mismo salón.<br />La opción * le quitará los privilegios de moderador al usuario en todos los salones.");
define("L_HELP_CMD_30", "El segundo comando hace lo mismo que /me pero mostrará tu género.<br />Ej. * ".sprintf(L_HELP_MR, "Alejandro")." está mirando TV o * ".sprintf(L_HELP_MS, "Dana")." está felíz.");
define("L_HELP_CMD_31", "Cambia el orden de los usuarios en las listas: por orden de entrada o alfabéticamente.");
define("L_HELP_CMD_32", "Esta es una tercera versión del juego de dados.<br />Uso: /d{n1}[tn2] or /d{n1};<br />n1 puede tomar cualquier valor <b>entre 1 and 100</b> (representa el número de giros por dado).<br />n2 puede tomar cualquier valor <b>entre 1 y %s</b> (representa el número de dados por tirada).");
define("L_HELP_CMD_33", "Cambia el tamaño de fuente de los mensajes en el chat de acuerdo a la selección del usuario (valores permitidos para n: <b>entre 7 y 15</b>); el comando /size resetea el tamaño de fuente al valor por defecto (<b>".$FontSize."</b>).");
define("L_HELP_CMD_34", "Esto permitirá al usuario especificar la orientación del mensaje de texto (ltr,iad = izquierda-a-derecha; rtl,dai = derecha-a-izquierda).");
define("L_HELP_CMD_35", "Permite la publicación de <i>un video</i> o <i>un archivo de audio</i> en un pequeño reproductor Flash a la vez.<br />Como usar: Simplemente pega la URL de origen de lo que quieres publicar! Ej. <b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />Necesitarás Shockwave Flash Player Instalado en tu sistema. El enlace diferencia entre mayúsculas y minúsculas!<br />Sugerencia: escribe /video seguido por un espacio y pega la URL en el cuadro de texto.");
define("L_HELP_CMD_35a", "El segundo comando solo funciona con videos provenientes de youtube.com.<br />Ej. <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b>");
define("L_HELP_CMD_36", "Permite publicar <i>un video de youtube</i> en un pequeño reproductor Flash a la vez.<br />Como usar: Simplemente pega la URL de origen de lo que quieres publicar! Ej. <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />Necesitarás Shockwave Flash Player Instalado en tu sistema. El enlace diferencia entre mayúsculas y minúsculas!<br />Sugerencia: escribe /tube seguido por un espacio y pega la URL en el cuadro de texto.");
define("L_HELP_CMD_37", "It allows posting of <i><b>MathJax</b> equations & formulas</i> in chat.<br />Usage: Just paste the TeX or MathML (original) codes! E.g. <b>/math&nbsp;\sqrt{3x-1}+(1+x)^2</b><br />For more code samples and instructions go to: <a href=\"http://www.mathjax.org/demos/\" target=\"_blank\">http://www.mathjax.org/demos</a>. Get the code by right-clicking on the formulas.<br />HINTS: type /math followed by a space and paste the code into the box.");
define("L_HELP_CMD_VAR", "Sinónimos (variantes): %s"); // a list of English and/or translated alternatives for each command, provided in help.
define("L_HELP_ETIQ_1", "Lineamientos del Chat");
define("L_HELP_ETIQ_2", "Quisieramos mantener a esta comunidad amigable y divertida, por eso te pedimos por favor que cumplas las siguientes reglas. En caso contrario uno de nuestros moderadores podría deshabilitarte del chat.<br /><br />Gracias,");
define("L_HELP_ETIQ_3", "Lineamientos de nuestro Chat");
define("L_HELP_ETIQ_4", "<li>No hagas \"spam\" en el chat escribiendo frases o letras sin sentido.</li>
<li>No alternes MayúsCuLAs y MInúScUlas en las palabras.</li>
<li>Usá lo menos posible palabras todas en mayúsculas.</li>
<li>Recuerda que los usuarios de nuestro chat son de todo el mundo, y, seguramente, encontrarás gente con otras creencias. Por favor se amable y correcto con ellos.</li>
<li>No insultes a otros usuarios. De hecho, trata de evitar el uso de palabras o frases insultantes.</li>
<li>No llames a los otros usuarios por sus verdaderos nombres. Puede no agradarles. Usá sus nicknames.</li>");

// messages frame
define("L_NO_MSG", "En este momento no hay mensajes ...");
define("L_TODAY_DWN", "Los mensajes que han sido enviados hoy, están al final");
define("L_TODAY_UP", "Los mensajes que han sido enviados hoy, están al principio");

// message colors
$TextColors = array(	"Negro" => "#000000",
				"Rojo" => "#FF0000",
				"Verde" => "#009900",
				"Azul" => "#0000FF",
				"Morado" => "#9900FF",
				"Oscuro rojo" => "#990000",
				"Oscuro verde" => "#006600",
				"Oscuro azul" => "#000099",
				"Marrón" => "#996633",
				"Azul agua" => "#006699",
				"Naranja" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Usuarios Ignorados");
define("L_IGNOR_NON", "No hay usuarios ignorados");

// whois popup
define("L_WHOIS_ADMIN", "Administrador");
define("L_WHOIS_OWNER", "Dueño");
define("L_WHOIS_TOPMOD", "Moderador Principal");
define("L_WHOIS_MODER", "Moderador");
define("L_WHOIS_MODERS", "Moderadores");
define("L_WHOIS_OTHERS", "Otros usuarios");
define("L_WHOIS_USER", "Usuario");
define("L_WHOIS_GUEST", "Invitado");
define("L_WHOIS_REG", "Registrado");
define("L_WHOIS_BOT", "Robot");

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s ingresó a este salón.");
define("L_EXIT_ROM", "%s salió de este salón.");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND != "") define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s ha sido automáticamente expulsado de este salón por inactividad.");
define("L_CLOSED_ROM", "%s ha cerrado su explorador.");

// Text for /away command notification string:
define("L_AWAY", "%s tiene estado ausente...");
define("L_BACK", "%s regresó!");

// Quick Menu mod
define("L_QUICK", "Menú rápido");

// Topic Banner mod
define("L_TOPIC", "ha cambiado la TEMATICA a:");
define("L_TOPIC_RESET", "ha reseteado la TEMATICA");
define("L_HELP_TOP", "la TEMATICA debe contener al menos dos palabras");
define("L_BANNER_WELCOME", "Bienvenido a %s!"); // room name
define("L_BANNER_TOPIC", "Tema:");
define("L_DEFAULT_TOPIC_1", "Este es un tema genérico. Editá localization/_owner/owner.php para cambiarlo!");

// Img cmd mod
define("L_PIC", "Imagen posteada por");
define("L_PIC_RESIZED", "Redimensionar a");
define("L_HELP_IMG", "dirección URL completa de la imagen a ser posteada");
define("L_NO_IMAGE", "Esta no es una URL valida de una imagen pública remota.\\nInténtalo de nuevo!");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s ya no es moderador de ningun salón.");
define("L_IS_NO_MODERATOR", "%s no es moderador.");
define("L_ERR_IS_ADMIN", "%s es el administrador!\\nNo podés cambiar sus permisos.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "Comandos Extra Disponibles:");
define("INFO_MODS", "Utilidades/Modos Extra disponibles:");
define("INFO_BOT", "Nuestro robot disponible es:");

// Profile mod
define("L_PRO_1", "Idiomas hablados");
define("L_PRO_1a", "Idioma");
define("L_PRO_2", "Link favorito 1");
define("L_PRO_3", "Link favorito 2");
define("L_PRO_4", "Descripción");
define("L_PRO_5", "Imagen URL");
define("L_PRO_6", "Color de nombre/texto");

// Avatar mod
define("L_AVATAR", "Imagen");
define("L_ERR_AV", "URL inválida o host inexistente.");
define("L_TITLE_AV", "Tu imagen actual: ");
define("L_CHG_AV", "Seleccioná \"".L_REG_16."\" en el formulario del Perfil<br />para guardar tu Imagen.");
define("L_SEL_NEW_AV", "Selecciona una nueva Imagen");
define("L_EX_AV", "ejemplo");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Escribe la URL, luego presiona ENTER para verla)");
define("L_CANCEL", "Cancelar");
define("L_AVA_REG", "Debes estar registrado\\npara cambiar tu avatar");
define("L_SEL_NEW_AV_CONFIRM", "Aún no has enviado el formulario..\\nSi vas a avatars perderás\\ntodos los cambios hechos!\\n\\nEstás seguro?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Nuestro robot esta públicamente activo aquí. Para hablarle escribe <b>hello ".C_BOT_NAME."</b>. Para finalizar la conversación, escribe: <b>bye ".C_BOT_NAME."</b>. (private: /to <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Nuestro robot está públicamente activo en el salón %s. Solo podés hablarle en privado seleccionando su nombre y \"susurrandole\". (command: /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Nuestro robot no está públicamente activo. Solo puedes hablarle en privado seleccionando su nombre. (comandos: /to <b>".C_BOT_NAME."</b> Mensaje o /wisp <b>".C_BOT_NAME."</b> Mensaje)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "El robot no está activo en este salón!");
define("BOT_START_ERROR", "El robot ya está activo en este salón!");
define("BOT_DISABLED_ERROR", "El robot ha sido desactivado desde el panel de administración!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "tirando los dados, los resultados son:");
define("DICE_WRONG", "Debes seleccionar cuántos dados quieres tirar\\n(Elige un número entre 1 y ".MAX_ROLLS.").\\nSimplemente escribe /dice para tirar todos los ".MAX_ROLLS." dados.");
define("DICE2_WRONG", "El secundo valor no está entre 1 y ".MAX_ROLLS.".\\nDejalo vacío para usar todos los ".MAX_ROLLS." dados\\n(Ej. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "El primer valor no está entre 1 y ".MAX_DICES.".\\n(Ej. /".MAX_DICES."d o /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "El segundo valor no está entre 1 y ".MAX_ROLLS.".\\nDejalo vacío para usar todos los ".MAX_ROLLS." dados\\n(Ej. /d50 or /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "abrir popups en mensaje privado");
define("L_REG_POPUP_NOTE", "Tu bloqueador de pop-up debe estar desactivado!");
define("L_PRIV_POST_MSG", "Envía un mensaje privado!");
define("L_PRIV_MSG", "Nuevo mensaje privado recibido!");
define("L_PRIV_MSGS", "%s nuevo mensaje privado recibido!");
define("L_PRIV_MSGSa", "Aquí están los 10 primeros mensajes!<br />Usá el link inferior para ver el resto.");
define("L_PRIV_MSG1", "De:");
define("L_PRIV_MSG2", "Salón:");
define("L_PRIV_MSG3", "A:");
define("L_PRIV_MSG4", "Mensaje:");
define("L_PRIV_MSG5", "Posteado:");
define("L_PRIV_REPLY", "Contestar");
define("L_PRIV_READ", "Presioná el botón ’".L_REG_25."’ para marcar todos los mensajes como leídos!");
define("L_PRIV_POPUP", "Podés deshabilitar/re-habilitar esta utilidad de popup cuando quieras<br />editando tu");
define("L_PRIV_POPUP1", "Perfil</a> (Solo usuarios registrados)");
define("L_NOT_ONLINE", "%s no se encuentra conectado en este momento.");
define("L_PRIV_NOT_ONLINE", "%s no se encuentra conectado en este momento,\\npero igualmente recibirá tu mensaje al conectase.");
define("L_PRIV_NOT_INROOM", "%s no se encuentra en este salón.\\nSi aún querés enviarle un mensaje privado,\\nusá el comando: /wisp %s mensaje.");
define("L_PRIV_AWAY", "%s está con estado ausente,\\npero aún así recibirá tu mensaje\\ncuando regrese.");
define("PM_DISABLED_ERROR", "Susurrando (mensaje privado)\\nse ha deshabilitado en este chat.");
define("L_NEXT_PAGE", "Vé a la siguiente página");
define("L_NEXT_READ", "Leé lo siguiente"); // message / 10 messages
define("L_ROOM_ALL", "Todos los salones");
define("L_PRIV_NO_MSGS", "No se han recibido mensajes privados");
define("L_PRIV_READ_MSG", "1 mensaje privado recibido"); //singular
define("L_PRIV_READ_MSGS", "%s mensajes privados recibidos"); //plural
define("L_PRIV_MSGS_NEW", "Nuevo"); //singular form
define("L_PRIV_MSGS_READ", "Leer"); //singular form
define("L_PRIV_MSG6", "Estado:");
define("L_PRIV_RELOAD", "Recargar página");
define("L_PRIV_MARK_ALL", "Marcar todos como Leídos");
define("L_PRIV_MARK_SEL", "Marcar los seleccionados como Leídos");
define("L_PRIV_REMOVE", "Remover los PMs seleccionados"); // or selected
define("L_PRIV_PM", "(privado)");
define("L_PRIV_WISP", "(susurro)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "Activo");
define("L_DISABLED", "Inactivo");
define("L_COLOR_HEAD_SETTINGS", "Configuración actual de este servidor:");
define("L_COLOR_HEAD_SETTINGSa", "Colores por defecto:");
define("L_COLOR_HEAD_SETTINGSb", "Color por defecto:");
define("L_COL_HELP_TITLE", "Rango de color");
define("L_COL_HELP_SUB1", "Uso:");
define("L_COL_HELP_P1", "Podés seleccionar tu propio color por defecto editando tu perfil (el mismo color que tu color de usuario). Igualmente podrás usar cualquier otro color. Para regresar a tu color por defecto, debés seleccionar una vez el color por defecto (Null) - Es el primero de la lista.");
define("L_COL_HELP_SUB2", "Sugerencias:");
define("L_COL_HELP_P2", "<u>Rango de color</u><br />Dependiendo de tu explorador/SO, es posible que algunos de los colores no estén funcionales. Solo 16 nombres de colores son soportados por W3C HTML 4.0 standard:");
define("L_COL_HELP_P2a", "Si alguno de los usuarios avisa que no puede ver tu color, significa que esté probablemente usando un explorador viejo.");
define("L_COL_HELP_SUB3", "Configuración definida en este chat:");
define("L_COL_HELP_P3", "<u>Niveles de privilegios para el uso de colores</u>:<br />1. El Administrador puede usar cualquier color.<br />El color por defecto para el Administrador es: <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Los Moderadores pueden usar cualquier color excepto <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> y <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />El color por defecto para moderadores es <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Los demás usuarios pueden usar cualquier color excepto <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> y <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "El color por defecto es <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Detalles Técnicos</u>: Esos colores han sido definidos por el Administrador en el Pandel de Administración.<br />Si hay algo que no te guste de los colores por defecto, puedes contactar al <b>Administrador</b> primero, no a los demás usuarios en el salón. :-)");
define("L_COL_HELP_USER_STATUS", "Tu estado");
define("L_COL_TUT", "Usando texto con color en el chat");
define("L_NULL", "Vacío");
define("L_NULL_F", ""); // feminine word, if it's the case
define("L_ROOM_COLOR", "color del salón");
define("L_PRO_COLOR", "color del perfil");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Solo el Administrador puede usar el color ".COLOR_CA."!\\n\\nTu color de texto será ".COLOR_CM."!\\n\\nPodés seleccionar cualquier otro color.");
define("COL_ERROR_BOX_USRA", "Solo el Administrador puede usar el color ".COLOR_CA."!\\n\\nNo intentes usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nEstán reservados para usuarios con privilegios!\\n\\nTu color de texto será ".COLOR_CD."!\\n\\nPodés elegir cualquier otro color.");
define("COL_ERROR_BOX_USRM", "Debes ser Moderador para usar el color ".COLOR_CM."!\\n\\nNo intentes usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." o ".COLOR_CM1.".\\n\\nEstán reservados para usuarios con privilegios!\\n\\nTu color de texto será ".COLOR_CD."!\\n\\nPodés elegir cualquier otro color.");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "Bienvenido a nuestro chat! Por favor mientras chatees seguí las reglas de la red: <I>ser amable y correcto</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND != "") define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "La configuración de este servidor ha sido modificada. Para prevenir mal funcionamientos, Por favor refrescá tu explorador (presioná F5 o salí y volvé a entrar al chat).");

//Size command error by Ciprian
define("L_ERR_SIZE", "El tamańo de fuente solo puede ser \\nnull (para resetearlo) o estar entre 7 y 15");

// Password reset form by Ciprian
define("L_PASS_0", "Formulario de reseteo de contraseña");
define("L_PASS_1", "Pregunta secreta");
define("L_PASS_2", "Cuál fue tu primer auto?"); // Don't change this question! Just translate it!
define("L_PASS_3", "Cuál era el nombre de tu primer mascota?"); // Don't change this question! Just translate it!
define("L_PASS_4", "Cuál es tu bebida favorita?"); // Don't change this question! Just translate it!
define("L_PASS_5", "Cuál es tu fecha de nacimiento?"); // Don't change this question! Just translate it!
define("L_PASS_6", "Respuesta secreta");
define("L_PASS_7", "Resetear contraseña");
define("L_PASS_8", "Tu contraseña ha sido reseteado.");
define("L_PASS_9", "Tu nuevo contraseña para entrar al chat");
define("L_PASS_10", "Tu nueva contraseña para entrar en el chat: %s"); 
define("L_PASS_11", "Bienvenido nuevamente a nuestro chat!");
define("L_PASS_12", "Elige tu pregunta ...");
define("L_ERR_PASS_1", "Nombre de usuario incorrecto. Elige el tuyo.");
define("L_ERR_PASS_2", "Error en el email. Intenta nuevamente!");
define("L_ERR_PASS_3", "Pregunta secreta erronea.<br />Contesta la pregunta que se muestra debajo!");
define("L_ERR_PASS_4", "Respuesta secreta erronea. Intetna nuevamente!");
define("L_ERR_PASS_5", "No has seteado tus datos privados/secretos.");
define("L_ERR_PASS_6", "No has seteado tus datos privados/secretos aun.<br />No puedes utilizar este formulario. Contacta al administrador!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s se ha convertido en administrador para este chat.");
define("L_ADM_4", "%s ya no es administrador de este chat.");

// Open Schedule by Ciprian
define("L_DAILY", "Diario");
define("L_ALWAYS", "siempre");
define("L_OPEN", "Abierto");
define("L_CLOSED", "Cerrado");
define("L_OPEN_PUB", "ABIERTO AL PUBLICO");
define("L_CLOSED_PUB", "CERRADO AL PUBLICO");

// Links popup page by Alex
define("L_LINKS_1", "Enlaces posteados");
define("L_LINKS_2", "Puedes acceder desde aquí a los enlaces posteados");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Haz click aquí %s %s");
define("L_CLICK", "Haz click aquí %s");
define("L_LINKS_3", "para abrir link");
define("L_LINKS_4", "para abrir el sitio del autor");
define("L_LINKS_5", "para insertar este emoticón");
define("L_LINKS_6", "para contactar a");
define("L_LINKS_7", "para visitar %s Homepage");
define("L_LINKS_8", "para unirte a %s Group");
define("L_LINKS_9", "para enviar tus comentarios");
define("L_LINKS_10", "para descargar %s");
define("L_LINKS_11", "para ver quién esta chateando");
define("L_LINKS_12", "para abrir la página de logueo");
define("L_LINKS_13", "para enviar este zumbido"); // Click to blablabla : it can also be translated as "to play this sound", if buzz has no translation.
define("L_LINKS_14", "para usar este comando");
define("L_LINKS_15", "para abrir"); // to open/see Posted Links window
define("L_LINKS_16", "Galeria de emoticones");
define("L_LINKS_17", "para orden ascendente");
define("L_LINKS_18", "para orden descendente");
define("L_LINKS_19", "para setear/modificar tu Gravatar");
define("L_LINKS_20", "Ecuaciones posteados");
define("L_SWITCH", "Cambiar a %s"); // Switch to English (Country Flags over / Language switching)
define("L_SELECTED", "seleccionado"); // French - selected (Country Flags mouseover / Language switching)
define("L_SELECTED_F", ""); // feminine word, if it's the case
define("L_NOT_SELECTED", "no seleccionado");
define("L_NOT_SELECTED_F", ""); // feminine word, if it's the case
define("L_EMAIL_1", "para enviar un email");
define("L_FULLSIZE_PIC", "para abrir la imagen en tamaño completo");
define("L_PRIVACY", "para leer nuestra Política de Privacidad");
define("L_AUTHOR", "el autor");
define("L_DEVELOPER", "el desarrollador de este chat");
define("L_OWNER", "el dueño de este chat");
define("L_TRANSLATOR", "el traductor");

// Counter on login
define("L_VISITOR_REPORT", "... visitantes desde %s"); // install date

// Status bar messages
define("L_JOIN_ROOM", "Unirse a este salón");
define("L_USE_NAME", "Usá este nombre de usuario");
define("L_USE_NAME1", "Direcciona a este nombre de usuario");
define("L_WHSP", "Suspiro");
define("L_SEND_WHSP", "Envía un Suspiro");
define("L_SEND_PM_1", "Envía PM");
define("L_SEND_PM_2", "Envía un menaje privado");
define("L_HIGHLIGHT", "Resaltar/No-Resaltar");
define("L_HIGHLIGHT_SB", "Resaltar/No-Resaltar los mensajes de este usuario");

//Lurking frame popup
define("L_LURKING_2", "Página de mirones");
define("L_LURKING_3", "está solo mirando");
define("L_LURKING_4", "se unió en");
define("L_LURKING_5", "Desconocido");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Otras Opciones");
define("L_ARCHIVE", "Abrir Archivo");
define("L_LURKING_1", "Abrir la página de mirones");
define("L_SOUNDFIX_IE_1", "Sonido fijo para IE");
define("L_SOUNDFIX_IE_2", "Descargar un sonido fijo para IE");
define("L_REG_BRB", "brb (Registrate primero)");
define("L_DEL_BYE", "no me esperes...");
define("L_EXTRA_PRIV1", "Leer PMs");
define("L_EXTRA_PRIV2", "Nuevos PMs");

// Set the first day of the week in your language
define("FIRST_DAY", "0"); // 1 for Monday, 0 for Sunday

// Months Long Names
define("L_JAN", "enero");
define("L_FEB", "febrero");
define("L_MAR", "marzo");
define("L_APR", "abril");
define("L_MAY", "mayo");
define("L_JUN", "junio");
define("L_JUL", "julio");
define("L_AUG", "agosto");
define("L_SEP", "septiembre");
define("L_OCT", "octubre");
define("L_NOV", "noviembre");
define("L_DEC", "diciembre");
// Months Short Names
define("L_S_JAN", "ene");
define("L_S_FEB", "feb");
define("L_S_MAR", "mar");
define("L_S_APR", "abr");
define("L_S_MAY", "may");
define("L_S_JUN", "jun");
define("L_S_JUL", "jul");
define("L_S_AUG", "ago");
define("L_S_SEP", "sep");
define("L_S_OCT", "oct");
define("L_S_NOV", "nov");
define("L_S_DEC", "dic");
// Week days Long Names
define("L_MON", "lunes");
define("L_TUE", "martes");
define("L_WED", "miércoles");
define("L_THU", "jueves");
define("L_FRI", "viernes");
define("L_SAT", "sábado");
define("L_SUN", "domingo");
// Week days Short Names
define("L_S_MON", "lu");
define("L_S_TUE", "ma");
define("L_S_WED", "mi");
define("L_S_THU", "ju");
define("L_S_FRI", "vi");
define("L_S_SAT", "sá");
define("L_S_SUN", "do");

// Localized date format
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "ESP_ARG.UTF-8", "ESP_ARG");
} else {
setlocale(LC_ALL, "es_AR.UTF-8", "esp_arg.UTF-8");
}
define("L_LANG", "es_AR");
define("ISO_DEFAULT", "iso-8859-1");
define("WIN_DEFAULT", "windows-1252");
define("L_SHORT_DATE", "%d-%m-%Y"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%A %d %B %Y"); //Change this to your local desired format (keep the long form)
define("L_SHORT_DATETIME", "%d-%m-%Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%A %d %B %Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_CAL_FORMAT", "%d %B %Y"); // Calendar format

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","usuarios están ".LOGIN_LINK."chateando</A> en este momento.");
define("USERS_LOGIN","1 usuario está ".LOGIN_LINK."chateando</A> en este momento.");
define("NO_USER","Nadie está ".LOGIN_LINK."cahteando</A> en este momento.");
define("L_PRIV_REPLY_LOGIN", "Loqueate al chat si quieres ".LOGIN_LINK."contestar</A> a cualquiera de los PMs listados debajo");

// Language names
define("L_LANG_AR", "español Argentina");
define("L_LANG_BG", "bulgaro - cirílico");
define("L_LANG_BR", "brasilero portugués");
define("L_LANG_CZ", "checo");
define("L_LANG_DA", "danés");
define("L_LANG_DE", "alemán");
define("L_LANG_EN", "inglés"); // for admin panel only
define("L_LANG_ENUK", "inglés UK"); // for UK formats and flags
define("L_LANG_ENUS", "inglés USA"); // for US formats and flags
define("L_LANG_ES", "español");
define("L_LANG_FA", "persa (farsi)");
define("L_LANG_FR", "frances");
define("L_LANG_GR", "griego");
define("L_LANG_HE", "hebreo");
define("L_LANG_HI", "indú");
define("L_LANG_HU", "húngaro");
define("L_LANG_ID", "indonesio");
define("L_LANG_IT", "italiano");
define("L_LANG_JA", "japonés (Kanji)");
define("L_LANG_KA", "georgiano");
define("L_LANG_NE", "nepalés");
define("L_LANG_NL", "holandés");
define("L_LANG_RO", "rumano");
define("L_LANG_SK", "eslovaco");
define("L_LANG_SRL", "serbio - latino");
define("L_LANG_SRC", "serbio - cirílico");
define("L_LANG_SV", "sueco");
define("L_LANG_TR", "turco");
define("L_LANG_UR", "urdu");
define("L_LANG_VI", "vietnamita");

// Skins preview page
define("L_SKINS_TITLE", "Visualizar fondos");
define("L_SKINS_TITLE1", "Fondos %s para %s visualizar"); // Skins 1 to 4 preview
define("L_SKINS_AV", "Fondos disponibles");
define("L_SKINS_NONAV", "No hay estilos definidos en la carpeta \"skins\"");
define("L_SKINS_COPY", "&copy; %s Fondo por %s"); //© 2008 Skin by AuthorName

// Swap image titles by Ciprian
define("L_GEN_ICON", "Icono de género");

// Ghost mode by Ciprian
define("L_GHOST", "Fantasma");
define("L_SUPER_GHOST", "Super Fantasma");
define("L_NO_GHOST", "Visible");

// Sorting options by Ciprian
define("L_ASC", "Ascendiente");
define("L_DESC", "Descendiente");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "Total de visitas"); // number of logins (returning visits) to chat

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "usa el Gravatar");

// Uploader mod by Ciprian
define("L_UPLOAD", "Subir %s"); // Upload Image, Upload Sound or Upload File
define("L_UPLOAD_IMG", "archivo de Imagen"); // used to upload Avatars and /img command
define("L_UPLOAD_SND", "archivo de Sonido"); // used to upload Buzz sounds
define("L_UPLOAD_FLS", "Archivos"); // used to upload multiple files at once
define("L_UPLOAD_SUCCESS", "%s subido exitosamente como %s."); // original filename, destination filename
define("L_FILES_TITLE", "Administrador de Subida de archivos");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "Restringido");
define("L_RESTRICTED_ROM", "%s ha sido restringido/a exitosamente de este salón.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "Logueate con un OpenID");
define("L_OPID_REG", "Importá tu perfil de OpenID");

// Support buttons
define("L_SUPP_WARN", "Has escogido contribuir con el Desarrollo gratuito de\\n".APP_NAME." al hacer una donación al programador.\\nGracias por tu apoyo!\\n\\nNota: el beneficiario no es el dueño de este chat.\\nPor favor pon la cantidad en la siguiente página.\\n\\nContinuar?");
define("L_SUPP_ALT", "Usa PAYPAL para apoyar el desarrollo de ".APP_NAME." - es Rápido, Gratis y Seguro!");

// Video & Audio & Youtube cmds (Embevi & YouTube player class) – same approach as in // Img cmd mod section!
define("L_AUDIO", "Archivo de audio publicado por");
define("L_VIDEO", "Video publicado por");
define("L_HELP_VIDEO", "ruta completa al video o audio a ser publicado");
define("L_NO_VIDEO", "La URL no puede ser embebida.\\nNo es una URL válida a un video o audio público.\\nIntentá nuevamente!");
define("L_ORIG_VIDEO", "para abrir el sitio original"); //it sounds like: Click here to open the…

// Birthday mod - by Ciprian
define("L_PRO_7", "Fecha de nacimiento");
define("L_PRO_8", "mostrar fecha de nacimiento en tu información pública");
define("L_PRO_9", "mostrar edad en información pública");
define("L_PRO_10", "Edad");
define("L_PRO_11", "%1\$d años, %2\$d meses y %3\$d días"); //you can also change the order here, but 1 stands for years, 2 for months and 3 for days
define("L_DOB_TIT_1", "Lista de cumpleaños");
$L_DOB_SUBJ = "Feliz cumpleaños %s!";

// MathJax (MathML/TeX) formulas rendering in chat - by Ciprian
define("L_EQUATION", "Ecuación");
define("L_MATH", "%s publicado por %s"); //e.g. "Equation posted by username" (defined above); the word "Equation" will render as a url to show popup with the posted formulas
?>