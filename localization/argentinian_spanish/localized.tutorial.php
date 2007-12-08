<?php
// File : argentinian_spanish/localized.tutorial.php - plus version (09.09.2007 - rev.7)
// Original translation in Spanish (for the Argentinian dialect usage) by Jorge Colaccini <jrc@informas.com>
// Updates, corrections and additions for the Plus version by Matias Olivera <matiolivera@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Color Input Box mod by Ciprian - you MUST delete this line if you uninstall this mod
require("./config/config.lib.php");
require("./lib/index.lib.php");
if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Tutorial en Español para <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=${Charset}">
<STYLE>
A.topLink
{
	text-decoration: underline;
	color: #0000C0;
}

A.topLink:hover, A.topLink:active
{
	color: #FF9900;
	text-decoration: none;
	font-weight: 800;
}

.redText
{
	font-weight: 800;
	color: #FF0000;
}
</STYLE>
</HEAD>

<BODY BGCOLOR="#CCCCFF">
<P></P>
<TABLE BORDER="5" CELLPADDING="5" ALIGN="center">
<TR>
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Tutorial en Español para <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</FONT><br /><I>&copy; 2007<?php echo((date(Y)>"2007") ? "-".date(Y) : ""); ?> - Traducido por Matias Olivera - Buenos Aires, Argentina.</I></B></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Contenidos de este tutorial</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Cambiar de idioma</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Loguearse para el Chat</A><br />
<A HREF="#register" CLASS="topLink">Registrarse</A><br />
<A HREF="#modProfile" CLASS="topLink">Modificar<?php if (C_SHOW_DEL_PROF) echo("/borrar "); ?> su perfil (datos)</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Crear un salón de chat</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Entendiendo los estados de conexión</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Enviando un mensaje</A><br />
<A HREF="#users_list" CLASS="topLink">Entendiendo el listado de usuarios</A><br />
<A HREF="#exit" CLASS="topLink">Dejando el salón de chat</A><br />
<A HREF="#users_popup" CLASS="topLink">Saber quién está chateando sin estar registrado</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Configurando la vista del chat</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Utilidades y comandos:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">Comando de ayuda</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">Avatars</A><br />
<?php
}
?>
<!-- Avatar System End.  -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">Emoticones gráficos</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">Formateo de texto</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">Invitar a un usuario a unirse a tu alcual salón de chat</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">Cambiando de un salón de chat a otro</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">Modificando tu perfil en el chat</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">Reutilizando el último mensaje o comando escrito</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">Respondiendo a un usuario específico</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">Mensajes privados</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">Acciones</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">Ignorando a otros usuarios</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">Obteniendo información pública de otro usuario</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">Salvar mensajes</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Comandos especiales para moderadores y/o administradores:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">Envía un anuncio</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">Sacando a un usuario</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">Bloqueando a un usuario</A><br />
	<?php
};
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">Promover/degradar a un usuario a/de moderador:</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Eligiendo idioma:</B></A></FONT>
	<P>
	Puedes elegir un idioma de entre los cuales <?php echo(APP_NAME); ?> ha sido traducido seleccionando la bandera al inicio de la página.
	En el ejemplo que sigue, un usuario selecciona el idioma francés:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Flags for language selection">
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Logueo:</B></A></FONT>
<P>
Si ya te registraste, simplemente logueate ingresando tu usuario y tu clave.
Luego seleccioná a qué salón querés entrar y presioná el botón ’<?php echo(L_SET_14); ?>’.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Sino tienes que <A HREF="#register">registrarte</A> primero.
	<?php
}
else
{
	?>
<P>
	Sino podés <A HREF="#register">registrarte</A> primero o simplemente entrar a un salón pero tu nick no se te reservará
	(Otro usuario puede usar tu mismo nick una vez que te desloguees).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Para registrarte:</B></A></FONT>
<P>
Si aún no te registrarte<?php if (!C_REQUIRE_REGISTER) echo(" y te gustaría hacerlo"); ?>, por favor seleccioná la opción de registro.
Aparecerá una pequeña ventana popup.
<P>
<UL>
 <li>Primero, creá un nombre de usuario<?php if (!C_EMAIL_PASWD) echo(" y una contraseña"); ?> para vos, completando los camos correspondientes. El nombre de usuario que elijas, será, automáticamente, mostrado en el salón de chat. No puede contener espacios, comas o barras (\). <?php if (C_NO_SWEAR) echo(" No puede contener \"malas palabras\"."); ?></li>
 <li>Segundo, ingresá tu nombre, apellido, y tu dirección de email. Para ser registrado como usuario en el chat, toda esta información debe ser provista. La información sobre tu sexo es opcional.</li>
 <li>Si tenés una página Web, podés ingresar su URL en la casilla correspondiente.</li>
 <li>El campo del idioma puede ayudar a otros usuarios en futuras discuciones. Ellos podrán saber los idiomas que conocés.</li>
 <li>Finalmente, si te interesa que tu dirección de email pueda ser vista por otros usuarios, marcá la casilla ’mostrar e-mail en información pública’. Si no deseás que tu dirección de e-mail sea vista, dejá la casilla sin marcar.</li>
 <li>Luego presioná el botón de Registro y tu cuenta será creada. Si deseás detener en algún momento la registración, presioná el botón Cerrar.</li>
</UL>
<P>
<A NAME="modProfile"></A>Por supuesto, los usuarios registrados podrán modificar
<?php if (C_SHOW_DEL_PROF) echo("/borrar"); ?> sus propios datos haciendo click en el apropiado
<?php echo((!C_SHOW_DEL_PROF ? "link" : "links")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Crear un salón:</B></A></FONT>
	<P>
	Los usuarios registrados pueden crear salones. Los salones Privados pueden ser
accedidos solamente por usuarios que conocen su nombre y nunca se muestran
excepto para usuarios que están registrados para el mismo.
<br />
	<P>
	Los nombres de salones no pueden contener comas o barras (\).<?php if (C_NO_SWEAR) echo(" No pueden contener \"malas palabras\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Comprendiendo el estado de conexión:</B></A></FONT>
	<P>
	Un símbolo, arriba y a la derecha de la pantalla, te muestra el estado de tu
conexión. Puede tomar 3 formas:
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="No connection"> cuando
     la conexión no es requerida;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connecting"> cuando
     la conexión está en progreso;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connection failed"> cuando hay una falla en la conexión.
	</UL>
	<P>
	En el tercer caso, haciendo click en el botón rojo podrás establecer una
nueva conexión.
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Enviando
mensajes:</B></A></FONT>
<P>
Para incluir un mensaje en el salón de chat, escribí adentro de la barra de
abajo a la izquierda y presioná Enter/Return para enviarlo. Los mensajes de todos los usuarios pasan por la pantalla.<br />
<?php if (C_NO_SWEAR) echo("Notarás que las \"malas palabras\" son salteadas en los mensajes."); ?>
<P>
Podés cambiar el color de texto de tus mensajes por otro color de la
lista que se encuentra en la caja de la derecha.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Verificando la lista
de usuarios (no para usuarios de ventana activa):</B></A></FONT>
<P>
<OL>
	Dos reglas básicas han sido
definidas para la lista de usuarios:<br />
	<LI>Un pequeño icono (que indica también su sexo) es mostrado antes del nick de un usuario registrado.
     Haciendo click sobre él, se abrirá <a href="#whois">la ventana de búsqueda</a>
     para este usuario, mientras que para usuarios no registrados no se presenta
     ningún signo o ícono asociado a su <i>nick</i> (alias);<br /></li>
	<LI>El nick del administrador o
     del moderador aparece con caracteres itálicos.</li>
</OL>
<P><I>Por ejemplo</I>, en la figura de abajo podés observar:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas es el administrador o uno de los moderadores del salón phpMyChat;<br /><br />
		<LI>alien (cuyo sexo no se ha especificado), Jezek2 y Caridad son usuarios registrados sin "atributos" especiales para el salón phpMyChat;<br /><br />
		<LI>lolo es un simple usuario no registrado.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Dejando un salón de chat:</B></A></FONT>
<P>
Para salir del chat, simplemente hacé click sobre ’Salir’.
Alternativamente, también podés ingresar uno de los siguientes comandos
en la barra de escritura:<br />
/exit<br />
/bye<br />
/quit<br />
Estos comandos pueden ser complementados por mensajes antes de dejar el
salón de chat. <i>Por ejemplo:</i> /quit Hasta pronto! </p>

Se enviará el mensaje ’Nos vemos!’ en la pantalla general y
entonces saldrás del chat.

<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Conociendo quién
está chateando sin estar logueado:</B></A></FONT>
<P>
Podés hacer click en el vínculo que muestra el número de usuarios
conectados en el comienzo de la página, o, si estás chateando, hacé click
en la imagen <img border=0 width=13 height=13
src="images\popup.gif" alt="<?php echo L_DETACH ?>"> hacia arriba y a la derecha de la
pantalla, para abrir una ventana independiente que mostrará la lista de usuarios
conectados y los salones en que ellos están, casi en tiempo real.<br />
El título de esta ventana contiene el nombre de los usuarios, si son
menos que tres, el número de usuarios y salones abiertos.
<P>
Haciendo click en el icono <img border=0 width=13 height=13
src="images\sound.gif" alt="<?php echo L_BEEP ?>"> arriba de esta imagen serán
activados/desactivados los sonidos de los usuarios entrantes.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr /><hr />

<P>
<FONT SIZE="+1"><A NAME="customize"><B>Diagramando la vista del Chat:</B></A></FONT>
<P>
Hay varias formas de diagramar cómo se verán las ventanas del chat. Para
cambiar las configuraciones, simplemente escribí el comando apropiado dentro del cuadro de mensaje
y presioná Intro/Enter/Return.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>El <b>comando Clear</b>
     te permite limpiar la pantalla general y mostrar los últimos 5
     mensajes enviados a tu pantalla.<br />
     Escribí ’/clear’ sin comillas.
		<o:p></o:p></li>
		<?php
	}
	else
	{
		?>
		<LI>El <B>comando Order</B> te permite intecambiar la ubicación de los nuevos mensajes de la parte superior a la inferior de la pantalla.<br />Escribí "/order" sin las comillas.
		<P>
		<?php
	};
	?>
	<LI>El <B>comando Notify</B> <br /> te permite intercambiar de activa a inactiva la opción de ver cuando los otros usuarios entran
	o salen del salón. Por defecto esta opción es <B><?php echo(C_NOTIFY ? "on" : "off"); ?></B> y las noticias <?php echo(C_NOTIFY ? "serán" : "no serán"); ?> vistas.<br />Escribí "/notify" sin comillas.
	<P>
	<LI>El <B>comando Timestamp</B> te permite intercambiar de activa a inactiva la opción de ver el tiempo en el que fue posteado, antes de cada mensaje y la hora del servidor en la barra de estado. Por defecto esta opción es <B><?php echo(C_SHOW_TIMESTAMP ? "on" : "off"); ?></B>.<br />Escribí "/timestamp" sin las comillas.
	<P>
	<LI>El <B>comando Refresh</B> te permite ajustar el tiempo de refresco de los mensajes posteados. El tiempo de refresco por defecto es <?php echo(C_MSG_REFRESH); ?> segundos. Para cambiarlo escribí "/refresh n" sin las comillas, donde n es el nuevo tiempo en segundos de refresco.
	<P>
	<I>Por ejemplo:</I> /refresh 5
	<P>
	cambiará el tiempo a 5 segundos. *Cuidado, si n se setea en menos de 3, el refresco no reseteará todos los mensajes (útil cuando querés leer muchos mensajes viejos sin ser molestado)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
  <LI>El <B>comando Show</B> te permite ajustar el número de mensajes visibles en tu pantalla. Para cambiar la cantidad por default, escribí "/show n" sin comillas, donde n es el nuevo número de mensajes visibles.
		<P>
		<I>Por ejemplo:</I> /show 50
		<P>
		hará que se vean los últimos 50 mensajes en tu pantalla. Si no se pueden visualizar todos los mensajes dentro del cuadro de mensajes, aparecerá una barra de scroll en el margen derecho.</UL>
		<?php
	}
	else
	{
		?>
		<LI>Los <B>comandos Show y Last</B> te permiten limpiar la pantalla y mostrar los últimos <I>n</I> mensajes en tu pantalla. Escribí
		"/show n" o "/last n" sin las comillas. Donde n es el número de mensajes a ser visualizados.
		<P>
		<I>Por ejemplo:</I> /show 50 o /last 50
		<P>
		limpiará la pantalla y dejará visibles los últimos 50 mensajes. Si no se pueden visualizar todos los mensajes dentro del cuadro de
		mensajes, aparecerá una barra de scroll en el margen derecho.</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<P>
</UL>
<hr /><hr />

<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Opciones y comandos</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Comando Help (ayuda):</B></A></FONT>
<P>
Una vez dentro de un salón de chat, podés abrir una nueva ventana con ayuda haciendo click en la <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> imágen que se encuentra debajo del cuadro de mensaje. También podés escribir el comando <B>"/help" o "/?" </B> en el cuadro de mensaje.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatars:</B></A></FONT>
<P>Los avatars son iconos con imágenes que representan a los participantes del chat. Solo los usuarios registrados pueden cambiar su avatar. Para hacerlo, pueden abrir su Profile y hacer click sobre el avatar, seleccionandolo de un menú de imágenes, o colocar una URL a una imágen gráfica disponible en cualquier lugar de internet (solo imágenes de acceso público, no de sitios restringidos con clave). Las imágenes deben ser visibles desde un navegador (.gif, .jpg, etc. ) y de 32 x 32 pixeles para una mejor visualización.
<P>Haciendo click sobre el avatar de algun participante del chat, mostrará su perfil en una ventana popup (ver <A HREF="#whois">comando /whois </A>).
Clickeando sobre tu propio avatar en la lista de usuarios, invocará al comando /profile (perfil) en caso de que estés registrado.
Si no estás registrado, al hacer click sobre tu avatar (que será el avatar que por defecto te da el sistema) se mostrará un alerta invitándote a que te registres.
  <P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<?php
}
?>
<!-- Avatar System End. -->
<hr />

<?php
if (C_USE_SMILIES)
{
	include("./lib/smilies.lib.php");
	$Nb = count($SmiliesTbl);
	$ResultTbl = Array();
	DisplaySmilies($ResultTbl,$SmiliesTbl,$Nb,"tutorial");
	unset($SmiliesTbl);
	?>
	<FONT SIZE="+1"><A NAME="smilies"><B>Emoticones (Smilies):</B></A></FONT>
	<P>Podés usar emoticones junto con tus mensajes. Fijate el código que tenés que escribir en el mensaje para obtener cada uno de los
	emoticones.
	<P>
	<I>Por ejemplo</I>, enviando el texto "Hola Matias :)" sin las comillas, el mensaje que se mostrará será Hola Matias <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> en el cuadro de mensajes.
	<P ALIGN="center">
	<TABLE BORDER=0 CELLPADDING=3 CELLSPACING=5>
	<?php
	$i = "0";
	$Nb = count($ResultTbl);
	while($i < $Nb)
	{
		if ($i > 0) echo("\t");
		echo("<TR VALIGN=\"BOTTOM\">\n");
		echo("$ResultTbl[$i]");
		echo("\t</TR>\n\t<TR>\n");
		$i++;
		echo("$ResultTbl[$i]");
		echo("\t</TR>\n");
		$i++;
	};
	unset($ResultTbl);
	?>
	</TABLE>
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Formateo de texto:</B></A></FONT>
	<P>
	Podés usar negrita, itálica u subrayado en caso de que lo necesites con los tags HTML
	&LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; o &LT;U&GT; &LT;/U&GT.
	<P>
	<I>Por ejemplo</I>, &LT;B&GT;un texto&LT;/B&GT; mostrará <B>un texto</B>.
	<P>
	Para crear un hipervínculo a un e-mail o URL, escribí la dirección (sin tags HTML). El hipervínculo se creará automáticamente.
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<P>
	<P>
	<hr />
	<?php
};
?>

<!-- Color Input Box mod by Ciprian start -->
<P>
<FONT SIZE="+1"><A NAME="colors"><B><U><?php echo(L_COL_TUT); ?></U></B></A></FONT>
<P>
<b><?php echo(L_COL_HELP_SUB1); ?></b><br /><?php echo(L_COL_HELP_P1); ?><br /><br />
</P>
<P>
<b><?php echo(L_COL_HELP_SUB2); ?></b><br /><?php echo(L_COL_HELP_P2); ?><br /><br /><center><?php echo(COLOR_LIST); ?></center><br /><?php echo(L_COL_HELP_P2a); ?><br /><br />
</P>
<P>
<b><?php echo(L_COL_HELP_SUB3); ?></b><br /><?php echo(L_COLOR_HEAD_SETTINGS); ?><br /><?php if (COLOR_FILTERS) echo(L_COLOR_HEAD_SETTINGSa."<br />"); ?><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo(L_WHOIS_ADMIN); elseif ($CookieStatus == "t") echo(L_WHOIS_TOPMOD); elseif ($CookieStatus == "m") echo(L_WHOIS_MODER); elseif ($CookieStatus == "u") echo(L_WHOIS_GUEST); else echo(L_WHOIS_REG);?></b><br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Invitá a alguien a unirse a tu actual salón de chat:</B></A></FONT>
<P>
Podés usar el comando <B>invite</B> para invitar a un usuario a unirse al salón en donde estás chateando.
<P>
<I>Por ejemplo:</I> /invite Matias
<P>
enviará un mensaje privado a Matias invitándolo a unirse a tu salón actual de chat. El mensaje contendrá el nombre del salón actual de
chat que aparecerá como un link.
<P>
Tené en cuenta que podés invitar a más de una persona a la vez (ej "/invite Matias,Martin,Lucia"). Tienen que estar separados por comas (,) sin comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Cambiando salones:</B></A></FONT>
<P>
La lista de la derecha de la pantalla muestra un listado de los salones
y de los usuarios que están actualmente conectados en ese salón. Para dejár el salón e ir a otro de los que se listan,
simplemente hacé click en uno de los nombres de los salones de chat.
Los salones vacios no aparecen en la lista. Te podés mover a un salón vacío escribiendo el comando <B>"/join #nombresalon"</B>
sin las comillas.
<P>
<I>Por ejemplo:</I> /join #RedRoom
<P>
te moverá al salón RedRoom.
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Si sos un usuario registrado, su" : "<br /><P>Su");
	?>
	 también podés crear un nuevo salón con este mismo comando. Pero luego tenés que especificar el tipo: 0 se mantiene privado, 1 público (valor por defecto).
	<P>
	<I>Por ejemplo:</I> /join 0 #MiSalon
	<P>
	creará un nuevo salón privado (asumiendo que no se ha creado un salón con ese mismo nombre) llamado MiSalon y te llevará a él.
	<P>
	Los nombres de salones no pueden contener comas o barras invertidas (\).<?php if (C_NO_SWEAR) echo(" No puede contener \"malas palabras\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>Modificando tu perfil en el chat:</B></FONT>
<P>
El <B>comando Profile</B> crea una ventana emergente en la cual podés editar tu perfil de usuario y modificarlo excepto tu usuario y clave (para hacer esto tenés que usar el link de la página de inicio).<br />Escribí "/profile" sin las comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>Reutilizando el último mensaje o comando escrito:</B></FONT>
<P>
El <B>comando !</B> recupera el último mensaje o comando que usaste.<br />Escribí "/!" sin las comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>Respondiendo a un usuario específico:</B></FONT>
<P>
Haciendo un click sobre el nombre de otro usuario (a la derecha de la pantalla) aparecerá su "usuario>" en tu cuadro de mensaje. Esta opción te permite enviarle fácilmente un mensaje público a un usuario, quizá en respuesta de algo que este haya posteado.
<br /><P ALIGN="right"><A HREF="#top">Voler al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Mensajes privados:</B></A></FONT>
<P>
Para enviarle un mensaje privado a otro usuario del salón en el que te encontrás, escribí <B>comando "/msg usuario mensaje" o "/to usuario mensaje"</B> sin las comillas.
<P>
<I>Por ejemplo, si Matias es el usuario:</I> /msg Matias hola, como estás?
<P>
El mensaje les aparecerá a Matias y a vos, pero los demás usuarios no podrán verlo.
<P>
Ten en cuenta que haciendo click en el nick del usuario en el mensaje en la pantalla de mensajes, automáticamente usará este comando y estarás listo para chatear en privado.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Acciones:</B></A></FONT>
<P>
Para describir lo que estás haciendo <B>comando "/me accion"</B> sin comillas.
<P>
<I>Por ejemplo:</I> Si Matias envía el mensaje "/me estoy fumando un cigarrillo" el mensaje mostrará "<B>* Matias</B> estoy fumando un cigarrillo".
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorando a otros usuarios:</B></A></FONT>
<P>
Para "ignorar" los mensajes de un usuario, escribí el <B>comando "/ignore usuario"</B> sin comillas.
<P>
<I>Por ejemplo:</I> /ignore Matias
<P>
Desde ese momento, no aparecerán los mensajes de Matias en la pantalla.
<P>
Para ver la lista de los usuarios ignorados, simplemente escribí el <B>comando "/ignore"</B> sin comillas.
<P>
Para mostrar los mensajes de un usuario ignorado, escribí el <B>comando "/ignore - usuario"</B> sin las comillas, donde "-" es un guión. <P>
<P>
<I>Por ejemplo:</I> /ignore - Matias
<P>
Hará que se muestren todos los mensajes que Matias envió durante la actual sesión de chat, incluyendo aquellos mensajes
posteados por Matias aún antes de que lo "ignoraras".
Si no especificás un nombre de usuario luego del guión, se limpiará tu lista de ignorados.
<P>
Tené en cuenta que podés poner más de un usuario luego del comando (ej "/ignore Matias,Lucia,Martin" o "/ignore - Matias,Lucia"). Deben estar separados por comas (,) sin comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Obteniendo información de los usuarios:</B></A></FONT>
<P>
Para ver la información pública de un usuario, escribí el <B>comando "/whois usuario"</B> sin comillas.
<P>
<I>Por ejemplo:</I> /whois Matias
<P>
donde "Matias" es el usuario. Este comando creará una nueva ventana emergente que mostrará la información pública de ese usuario. Usá tu propio nombre para ver como es que se muestra la información.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Salvar mensajes:</B></A></FONT>
	<P>
	Para exportar mensajes (incluyendo los de aviso) a un archivo HTML local, escribí el <B>comando "/save n"</B> sin comillas.
	<P>
	<I>Por ejemplo:</I> /save 5
	<P>
	donde "5" es el número de mensajes a salvarse. Si n no se define, se grabarán todos los mensajes que hayan actualmente en el salón de chat.
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<P>
	<hr />
	<?php
};
?>



<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Comandos para el administrador/moderador únicamente</U></B></A></FONT>

<P>
<FONT SIZE="+1"><A NAME="announce"><B>Enviar un aviso:</B></A></FONT>
<P>
El administrador puede enviar un anuncio a todos los salones para ser visto por todos los usuarios, usando el <B>comando announce</B>.
<P>
<I>Por ejemplo: /announce El chat se cerrará para mantenimiento hoy a las 8pm.</I>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
Hay otro comando útil para el envío de avisos a los salónes; el administrador o moderador de un salón puede también enviar un aviso a un salón o a todos los salones con el <B>comando room</B>.
<P>
<I>Por ejemplo: /room La reunión comienza a las 3pm.</I> o <I>/room * La reunión comienza a las 3pm en el salón de Staff.</I>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Sacando a un usuario:</B></FONT>
<P>
El administrador puede echar a un usuario o a un moderador, y un moderador puede echar a un usuario usando el <B>comando kick</B>. En el caso de que el moderador quiera echar a un usuario, este se debe encontrar en su salón.
<P>
<I>Por ejemplo</I>, si Matias es el nombre del usuario a echar: <I>/kick Matias</I> o <I>/kick Matias razon para echarlo</I> La "razon para
echarlo" puede ser cualquier texto. Por ejemplo "por hacer SPAM en el chat!"
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Bloquear a un usuario:</B></A></FONT>
	<P>
	Los moderadores pueden bloquear a un usuario y el administrador puede bloquear a un usuario y o a un moderador, con el <B>comando ban</B>.<br />
	El administrador puede bloquear a un usuario de cualquier salón, mientras que un moderador solo puede bloquear a usuarios de su salón.
	También puede bloquear a un usuario para siempre de ese salón y del chat con el comando ’<B>*</B>’ que debe ser usado luego del nombre de usuario con el comando ban.
	<P>
	<I>Por ejemplo</I>, si Matias es el nombre del usuario a ser bloqueado: <I>/ban Matias</I> o <I>/ban * Matias</I>
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Promote/Demote a user to/from moderator:</B></A></FONT>
<P>
Moderadores y administradores pueden promover a un usuario al estado de moderador con el <B>comando promote</B>.
<P>
<I>Por ejemplo</I>, si Matias es el nombre del usuario a ser promovido: <I>/promote Matias</I>
<P>
Solo el administrador puede degradar a un moderador (reducir a simple usuario a un moderador) usando el <B>comando demote</B>.
<P>
<I>Por ejemplo</I>, si Matias es el nombre del moderador a ser degradado: <I>/demote Matias</I> or <I>/demote * Matias</I> (Lo que generará que sea degradado de todos los salones en los que fuera moderador).
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
</BODY>
</HTML>
<?php
?>