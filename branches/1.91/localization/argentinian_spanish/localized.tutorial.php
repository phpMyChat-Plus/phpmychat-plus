<?php
// File : argentinian_spanish/localized.tutorial.php - plus version (02.05.2007 - rev.4)
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
<TITLE>Tutorial en Espa&ntilde;ol para <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Tutorial en Espa&ntilde;ol para <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</B></FONT></TD>
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
	<A HREF="#create_room" CLASS="topLink">Crear un sal&oacute;n de chat</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Entendiendo los estados de conexi&oacute;n</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Enviando un mensaje</A><br />
<A HREF="#users_list" CLASS="topLink">Entendiendo el listado de usuarios</A><br />
<A HREF="#exit" CLASS="topLink">Dejando el sal&oacute;n de chat</A><br />
<A HREF="#users_popup" CLASS="topLink">Saber qui&eacute;n est&aacute; chateando sin estar registrado</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Configurando la vista del chat</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Utilidades y comandos:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">Comando de ayuda</A><br />
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
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Emoticones gr&aacute;ficos</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#text" CLASS="topLink">Formateo de texto</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Invitar a un usuario a unirse a tu alcual sal&oacute;n de chat</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">Cambiando de un sal&oacute;n de chat a otro</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Mensajes privados</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS="topLink">Acciones</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Ignorando a otros usuarios</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">Obteniendo informaci&oacute;n p&uacute;blica de otro usuario</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#save" CLASS="topLink">Salvar mensajes</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Comandos especiales para moderadores y/o administradores:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Env&iacute;a un anuncio</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#kick" CLASS="topLink">Sacando a un usuario</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#banish" CLASS="topLink">Bloqueando a un usuario</A><br />
	<?php
};
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#promote" CLASS="topLink">Promover/degradar a un usuario a/de moderador:</A><br />
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
	Puedes elegir un idioma de entre los cuales <?php echo(APP_NAME); ?> ha sido traducido seleccionando la bandera al inicio de la p&aacute;gina.
	En el ejemplo que sigue, un usuario selecciona el idioma franc&eacute;s:
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
Luego seleccion&aacute; a qu&eacute; sal&oacute;n quer&eacute;s entrar y presion&aacute; el bot&oacute;n '<?php echo(L_SET_14); ?>'.<br />
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
	Sino pod&eacute;s <A HREF="#register">registrarte</A> primero o simplemente entrar a un sal&oacute;n pero tu nick no se te reservar&aacute;
	(Otro usuario puede usar tu mismo nick una vez que te desloguees).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Para registrarte:</B></A></FONT>
<P>
Si a&uacute;n no te registrarte<?php if (!C_REQUIRE_REGISTER) echo(" y te gustar&iacute;a hacerlo"); ?>, por favor seleccion&aacute; la opci&oacute;n de registro.
Aparecer&aacute; una peque&ntilde;a ventana popup.
<P>
<UL>
 <li>Primero, cre&aacute; un nombre de usuario<?php if (!C_EMAIL_PASWD) echo(" y una contrase&ntilde;a"); ?> para vos, completando los camos correspondientes. El nombre de usuario que elijas, ser&aacute;, autom&aacute;ticamente, mostrado en el sal&oacute;n de chat. No puede contener espacios, comas o barras (\). <?php if (C_NO_SWEAR) echo(" No puede contener \"malas palabras\"."); ?></li>
 <li>Segundo, ingres&aacute; tu nombre, apellido, y tu direcci&oacute;n de email. Para ser registrado como usuario en el chat, toda esta informaci&oacute;n debe ser provista. La informaci&oacute;n sobre tu sexo es opcional.</li>
 <li>Si ten&eacute;s una p&aacute;gina Web, pod&eacute;s ingresar su URL en la casilla correspondiente.</li>
 <li>El campo del idioma puede ayudar a otros usuarios en futuras discuciones. Ellos podr&aacute;n saber los idiomas que conoc&eacute;s.</li>
 <li>Finalmente, si te interesa que tu direcci&oacute;n de email pueda ser vista por otros usuarios, marc&aacute; la casilla &quot;mostrar e-mail en informaci&oacute;n p&uacute;blica&quot;. Si no dese&aacute;s que tu direcci&oacute;n de e-mail sea vista, dej&aacute; la casilla sin marcar.</li>
 <li>Luego presion&aacute; el bot&oacute;n de Registro y tu cuenta ser&aacute; creada. Si dese&aacute;s detener en alg&uacute;n momento la registraci&oacute;n, presion&aacute; el bot&oacute;n Cerrar.</li>
</UL>
<P>
<A NAME="modProfile"></A>Por supuesto, los usuarios registrados podr&aacute;n modificar
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
	<FONT SIZE="+1"><A NAME="create_room"><B>Crear un sal&oacute;n:</B></A></FONT>
	<P>
	Los usuarios registrados pueden crear salones. Los salones Privados pueden ser
accedidos solamente por usuarios que conocen su nombre y nunca se muestran
excepto para usuarios que est&aacute;n registrados para el mismo.
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
	<FONT SIZE="+1"><A NAME="connection_state"><B>Comprendiendo el estado de conexi&oacute;n:</B></A></FONT>
	<P>
	Un s&iacute;mbolo, arriba y a la derecha de la pantalla, te muestra el estado de tu
conexi&oacute;n. Puede tomar 3 formas:
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="No connection"> cuando
     la conexi&oacute;n no es requerida;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connecting"> cuando
     la conexi&oacute;n est&aacute; en progreso;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connection failed"> cuando hay una falla en la conexi&oacute;n.
	</UL>
	<P>
	En el tercer caso, haciendo click en el bot&oacute;n rojo podr&aacute;s establecer una
nueva conexi&oacute;n.
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
Para incluir un mensaje en el sal&oacute;n de chat, escrib&iacute; adentro de la barra de
abajo a la izquierda y presion&aacute; Enter/Return para enviarlo. Los mensajes de todos los usuarios pasan por la pantalla.<br />
<?php if (C_NO_SWEAR) echo("Notar&aacute;s que las \"malas palabras\" son salteadas en los mensajes."); ?>
<P>
Pod&eacute;s cambiar el color de texto de tus mensajes por otro color de la
lista que se encuentra en la caja de la derecha.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Verificando la lista
de usuarios (no para usuarios de ventana activa):</B></A></FONT>
<P>
<OL>
	Dos reglas b&aacute;sicas han sido
definidas para la lista de usuarios:<br />
	<LI>Un peque&ntilde;o icono (que indica tambi&eacute;n su sexo) es mostrado antes del nick de un usuario registrado.
     Haciendo click sobre &eacute;l, se abrir&aacute; <a href="#whois">la ventana de b&uacute;squeda</a>
     para este usuario, mientras que para usuarios no registrados no se presenta
     ning&uacute;n signo o &iacute;cono asociado a su <i>nick</i> (alias);<br /></li>
	<LI>El nick del administrador o
     del moderador aparece con caracteres it&aacute;licos.</li>
</OL>
<P><I>Por ejemplo</I>, en la figura de abajo pod&eacute;s observar:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas es el administrador o uno de los moderadores del sal&oacute;n phpMyChat;<br /><br />
		<LI>alien (cuyo sexo no se ha especificado), Jezek2 y Caridad son usuarios registrados sin "atributos" especiales para el sal&oacute;n phpMyChat;<br /><br />
		<LI>lolo es un simple usuario no registrado.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Dejando un sal&oacute;n de chat:</B></A></FONT>
<P>
Para salir del chat, simplemente hac&eacute; click sobre &quot;Salir&quot;.
Alternativamente, tambi&eacute;n pod&eacute;s ingresar uno de los siguientes comandos
en la barra de escritura:<br />
/exit<br />
/bye<br />
/quit<br />
Estos comandos pueden ser complementados por mensajes antes de dejar el
sal&oacute;n de chat. <i>Por ejemplo:</i> /quit Hasta pronto! </p>

Se enviar&aacute; el mensaje &quot;Nos vemos!&quot; en la pantalla general y
entonces saldr&aacute;s del chat.

<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Conociendo qui&eacute;n
est&aacute; chateando sin estar logueado:</B></A></FONT>
<P>
Pod&eacute;s hacer click en el v&iacute;nculo que muestra el n&uacute;mero de usuarios
conectados en el comienzo de la p&aacute;gina, o, si est&aacute;s chateando, hac&eacute; click
en la imagen <img border=0 width=13 height=13 id="_x0000_i1041"
src="images\popup.gif" alt="Ventana de usuarios"> hacia arriba y a la derecha de la
pantalla, para abrir una ventana independiente que mostrar&aacute; la lista de usuarios
conectados y los salones en que ellos est&aacute;n, casi en tiempo real.<br />
El t&iacute;tulo de esta ventana contiene el nombre de los usuarios, si son
menos que tres, el n&uacute;mero de usuarios y salones abiertos.
<P>
Haciendo click en el icono <img border=0 width=13 height=13 id="_x0000_i1042"
src="images\sound.gif" alt=Beeps> arriba de esta imagen ser&aacute;n
activados/desactivados los sonidos de los usuarios entrantes.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr /><hr />

<P>
<FONT SIZE="+1"><A NAME="customize"><B>Diagramando la vista del Chat:</B></A></FONT>
<P>
Hay varias formas de diagramar c&oacute;mo se ver&aacute;n las ventanas del chat. Para
cambiar las configuraciones, simplemente escrib&iacute; el comando apropiado dentro del cuadro de mensaje
y presion&aacute; Intro/Enter/Return.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>El <b>comando Clear</b>
     te permite limpiar la pantalla general y mostrar los &uacute;ltimos 5
     mensajes enviados a tu pantalla.<br />
     Escrib&iacute; &quot;/clear&quot; sin comillas.
		<o:p></o:p></li>
		<?php
	}
	else
	{
		?>
		<LI>El <B>comando Order</B> te permite intecambiar la ubicaci&oacute;n de los nuevos mensajes de la parte superior a la inferior de la pantalla.<br />Escrib&iacute; "/order" sin las comillas.
		<P>
		<?php
	};
	?>
	<LI>El <B>comando Notify</B> <br /> te permite intercambiar de activa a inactiva la opci&oacute;n de ver cuando los otros usuarios entran
	o salen del sal&oacute;n. Por defecto esta opci&oacute;n es <B><?php echo(C_NOTIFY ? "on" : "off"); ?></B> y las noticias <?php echo(C_NOTIFY ? "ser&aacute;n" : "no ser&aacute;n"); ?> vistas.<br />Escrib&iacute; "/notify" sin comillas.
	<P>
	<LI>El <B>comando Timestamp</B> te permite intercambiar de activa a inactiva la opci&oacute;n de ver el tiempo en el que fue posteado, antes de cada mensaje y la hora del servidor en la barra de estado. Por defecto esta opci&oacute;n es <B><?php echo(C_SHOW_TIMESTAMP ? "on" : "off"); ?></B>.<br />Escrib&iacute; "/timestamp" sin las comillas.
	<P>
	<LI>El <B>comando Refresh</B> te permite ajustar el tiempo de refresco de los mensajes posteados. El tiempo de refresco por defecto es <?php echo(C_MSG_REFRESH); ?> segundos. Para cambiarlo escrib&iacute; "/refresh n" sin las comillas, donde n es el nuevo tiempo en segundos de refresco.
	<P>
	<I>Por ejemplo:</I> /refresh 5
	<P>
	cambiar&aacute; el tiempo a 5 segundos. *Cuidado, si n se setea en menos de 3, el refresco no resetear&aacute; todos los mensajes (&uacute;til cuando quer&eacute;s leer muchos mensajes viejos sin ser molestado)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
  <LI>El <B>comando Show</B> te permite ajustar el n&uacute;mero de mensajes visibles en tu pantalla. Para cambiar la cantidad por default, escrib&iacute; "/show n" sin comillas, donde n es el nuevo n&uacute;mero de mensajes visibles.
		<P>
		<I>Por ejemplo:</I> /show 50
		<P>
		har&aacute; que se vean los &uacute;ltimos 50 mensajes en tu pantalla. Si no se pueden visualizar todos los mensajes dentro del cuadro de mensajes, aparecer&aacute; una barra de scroll en el margen derecho.</UL>
		<?php
	}
	else
	{
		?>
		<LI>Los <B>comandos Show y Last</B> te permiten limpiar la pantalla y mostrar los &uacute;ltimos <I>n</I> mensajes en tu pantalla. Escrib&iacute;
		"/show n" o "/last n" sin las comillas. Donde n es el n&uacute;mero de mensajes a ser visualizados.
		<P>
		<I>Por ejemplo:</I> /show 50 o /last 50
		<P>
		limpiar&aacute; la pantalla y dejar&aacute; visibles los &uacute;ltimos 50 mensajes. Si no se pueden visualizar todos los mensajes dentro del cuadro de
		mensajes, aparecer&aacute; una barra de scroll en el margen derecho.</UL>
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
Una vez dentro de un sal&oacute;n de chat, pod&eacute;s abrir una nueva ventana con ayuda haciendo click en la <IMG SRC="images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="Ayuda"> im&aacute;gen que se encuentra debajo del cuadro de mensaje. Tambi&eacute;n pod&eacute;s escribir el comando <B>"/help" o "/?" </B> en el cuadro de mensaje.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatars:</B></A></FONT>
<P>Avatars are graphic image icons that represent chatters. Only registered users may change their avatar. Registered users may open their Profile (see /profile command) and click on the avatar image to select it from a menu of images, or to input a URL to a graphic image available anywhere on the internet (only images publicly accessible, not password protected sites). Images should be browser-viewable (.gif, .jpg, etc. ) 32 x 32 pixel graphic files for best display.
<P>Clicking on a person's avatar in the message frame will popup up that person's profile (see <A HREF="#whois">/whois command</A>).
Clicking on your own avatar on the user's list  will invoke the /profile command, if you are registered.
If you are not registered, clicking on your own (system's default) avatar will bring up an alert to encourage you to register.
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
	<P>Pod&eacute;s usar emoticones junto con tus mensajes. Fijate el c&oacute;digo que ten&eacute;s que escribir en el mensaje para obtener cada uno de los
	emoticones.
	<P>
	<I>Por ejemplo</I>, enviando el texto "Hola Matias :)" sin las comillas, el mensaje que se mostrar&aacute; ser&aacute; Hola Matias <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> en el cuadro de mensajes.
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
	Pod&eacute;s usar negrita, it&aacute;lica u subrayado en caso de que lo necesites con los tags HTML
	&LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; o &LT;U&GT; &LT;/U&GT.
	<P>
	<I>Por ejemplo</I>, &LT;B&GT;un texto&LT;/B&GT; mostrar&aacute; <B>un texto</B>.
	<P>
	Para crear un hiperv&iacute;nculo a un e-mail o URL, escrib&iacute; la direcci&oacute;n (sin tags HTML). El hiperv&iacute;nculo se crear&aacute; autom&aacute;ticamente.
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
<b><?php echo(L_COL_HELP_SUB3); ?></b><br /><?php echo(L_COLOR_HEAD_SETTINGS); ?><br /><?php if (COLOR_FILTERS) echo(L_COLOR_HEAD_SETTINGSa."<br />"); ?><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("Administrador"); elseif ($CookieStatus == "m") echo("Moderador"); elseif ($CookieStatus == "u") echo("Invitado (Normal)"); else echo("Registrado (Normal)");?></b><br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Invit&aacute; a alguien a unirse a tu actual sal&oacute;n de chat:</B></A></FONT>
<P>
Pod&eacute;s usar el comando <B>invite</B> para invitar a un usuario a unirse al sal&oacute;n en donde est&aacute;s chateando.
<P>
<I>Por ejemplo:</I> /invite Matias
<P>
enviar&aacute; un mensaje privado a Matias invit&aacute;ndolo a unirse a tu sal&oacute;n actual de chat. El mensaje contendr&aacute; el nombre del sal&oacute;n actual de
chat que aparecer&aacute; como un link.
<P>
Ten&eacute; en cuenta que pod&eacute;s invitar a m&aacute;s de una persona a la vez (ej "/invite Matias,Martin,Lucia"). Tienen que estar separados por comas (,) sin comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Cambiando salones:</B></A></FONT>
<P>
La lista de la derecha de la pantalla muestra un listado de los salones
y de los usuarios que est&aacute;n actualmente conectados en ese sal&oacute;n. Para dej&aacute;r el sal&oacute;n e ir a otro de los que se listan,
simplemente hac&eacute; click en uno de los nombres de los salones de chat.
Los salones vacios no aparecen en la lista. Te pod&eacute;s mover a un sal&oacute;n vac&iacute;o escribiendo el comando <B>"/join #nombresalon"</B>
sin las comillas.
<P>
<I>Por ejemplo:</I> /join #RedRoom
<P>
te mover&aacute; al sal&oacute;n RedRoom.
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Si sos un usuario registrado, su" : "<br /><P>Su");
	?>
	 tambi&eacute;n pod&eacute;s crear un nuevo sal&oacute;n con este mismo comando. Pero luego ten&eacute;s que especificar el tipo: 0 se mantiene privado, 1 p&uacute;blico (valor por defecto).
	<P>
	<I>Por ejemplo:</I> /join 0 #MiSalon
	<P>
	crear&aacute; un nuevo sal&oacute;n privado (asumiendo que no se ha creado un sal&oacute;n con ese mismo nombre) llamado MiSalon y te llevar&aacute; a &eacute;l.
	<P>
	Los nombres de salones no pueden contener comas o barras invertidas (\).<?php if (C_NO_SWEAR) echo(" No puede contener \"malas palabras\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Modificando tu perfil en el chat:</B></FONT>
<P>
El <B>comando Profile</B> crea una ventana emergente en la cual pod&eacute;s editar tu perfil de usuario y modificarlo excepto tu usuario y clave (para hacer esto ten&eacute;s que usar el link de la p&aacute;gina de inicio).<br />Escrib&iacute; "/profile" sin las comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Reutilizando el &uacute;ltimo mensaje o comando escrito:</B></FONT>
<P>
El <B>comando !</B> recupera el &uacute;ltimo mensaje o comando que usaste.<br />Escrib&iacute; "/!" sin las comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Respondiendo a un usuario espec&iacute;fico:</B></FONT>
<P>
Haciendo un click sobre el nombre de otro usuario (a la derecha de la pantalla) aparecer&aacute; su "usuario>" en tu cuadro de mensaje. Esta opci&oacute;n te permite enviarle f&aacute;cilmente un mensaje p&uacute;blico a un usuario, quiz&aacute; en respuesta de algo que este haya posteado.
<br /><P ALIGN="right"><A HREF="#top">Voler al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Mensajes privados:</B></A></FONT>
<P>
Para enviarle un mensaje privado a otro usuario del sal&oacute;n en el que te encontr&aacute;s, escrib&iacute; <B>comando "/msg usuario mensaje" o "/to usuario mensaje"</B> sin las comillas.
<P>
<I>Por ejemplo, si Matias es el usuario:</I> /msg Matias hola, como est&aacute;s?
<P>
El mensaje les aparecer&aacute; a Matias y a vos, pero los dem&aacute;s usuarios no podr&aacute;n verlo.
<P>
Ten en cuenta que haciendo click en el nick del usuario en el mensaje en la pantalla de mensajes, autom&aacute;ticamente usar&aacute; este comando y estar&aacute;s listo para chatear en privado.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Acciones:</B></A></FONT>
<P>
Para describir lo que est&aacute;s haciendo <B>comando "/me accion"</B> sin comillas.
<P>
<I>Por ejemplo:</I> Si Matias env&iacute;a el mensaje "/me estoy fumando un cigarrillo" el mensaje mostrar&aacute; "<B>* Matias</B> estoy fumando un cigarrillo".
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorando a otros usuarios:</B></A></FONT>
<P>
Para "ignorar" los mensajes de un usuario, escrib&iacute; el <B>comando "/ignore usuario"</B> sin comillas.
<P>
<I>Por ejemplo:</I> /ignore Matias
<P>
Desde ese momento, no aparecer&aacute;n los mensajes de Matias en la pantalla.
<P>
Para ver la lista de los usuarios ignorados, simplemente escrib&iacute; el <B>comando "/ignore"</B> sin comillas.
<P>
Para mostrar los mensajes de un usuario ignorado, escrib&iacute; el <B>comando "/ignore - usuario"</B> sin las comillas, donde "-" es un gui&oacute;n. <P>
<P>
<I>Por ejemplo:</I> /ignore - Matias
<P>
Har&aacute; que se muestren todos los mensajes que Matias envi&oacute; durante la actual sesi&oacute;n de chat, incluyendo aquellos mensajes
posteados por Matias a&uacute;n antes de que lo "ignoraras".
Si no especific&aacute;s un nombre de usuario luego del gui&oacute;n, se limpiar&aacute; tu lista de ignorados.
<P>
Ten&eacute; en cuenta que pod&eacute;s poner m&aacute;s de un usuario luego del comando (ej "/ignore Matias,Lucia,Martin" o "/ignore - Matias,Lucia"). Deben estar separados por comas (,) sin comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Obteniendo informaci&oacute;n de los usuarios:</B></A></FONT>
<P>
Para ver la informaci&oacute;n p&uacute;blica de un usuario, escrib&iacute; el <B>comando "/whois usuario"</B> sin comillas.
<P>
<I>Por ejemplo:</I> /whois Matias
<P>
donde &#39;Matias&#39; es el usuario. Este comando crear&aacute; una nueva ventana emergente que mostrar&aacute; la informaci&oacute;n p&uacute;blica de ese usuario. Us&aacute; tu propio nombre para ver como es que se muestra la informaci&oacute;n.
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
	Para exportar mensajes (incluyendo los de aviso) a un archivo HTML local, escrib&iacute; el <B>comando "/save n"</B> sin comillas.
	<P>
	<I>Por ejemplo:</I> /save 5
	<P>
	donde &#39;5&#39; es el n&uacute;mero de mensajes a salvarse. Si n no se define, se grabar&aacute;n todos los mensajes que hayan actualmente en el sal&oacute;n de chat.
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<P>
	<hr />
	<?php
};
?>



<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Comandos para el administrador/moderador &uacute;nicamente</U></B></A></FONT>

<P>
<FONT SIZE="+1"><A NAME="announce"><B>Enviar un aviso:</B></A></FONT>
<P>
El administrador puede enviar un anuncio a todos los salones para ser visto por todos los usuarios, usando el <B>comando announce</B>.
<P>
<I>Por ejemplo: /announce El chat se cerrar&aacute; para mantenimiento hoy a las 8pm.</I>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
Hay otro comando &uacute;til para el env&iacute;o de avisos a los sal&oacute;nes; el administrador o moderador de un sal&oacute;n puede tambi&eacute;n enviar un aviso a un sal&oacute;n o a todos los salones con el <B>comando room</B>.
<P>
<I>Por ejemplo: /room La reuni&oacute;n comienza a las 3pm.</I> o <I>/room * La reuni&oacute;n comienza a las 3pm en el sal&oacute;n de Staff.</I>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Sacando a un usuario:</B></FONT>
<P>
El administrador puede echar a un usuario o a un moderador, y un moderador puede echar a un usuario usando el <B>comando kick</B>. En el caso de que el moderador quiera echar a un usuario, este se debe encontrar en su sal&oacute;n.
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
	El administrador puede bloquear a un usuario de cualquier sal&oacute;n, mientras que un moderador solo puede bloquear a usuarios de su sal&oacute;n.
	Tambi&eacute;n puede bloquear a un usuario para siempre de ese sal&oacute;n y del chat con el comando&#39;<B>&nbsp;*&nbsp;</B>&#39; que debe ser usado luego del nombre de usuario con el comando ban.
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
<I>Por ejemplo</I>, si Matias es el nombre del moderador a ser degradado: <I>/demote Matias</I> or <I>/demote * Matias</I> (Lo que generar&aacute; que sea degradado de todos los salones en los que fuera moderador).
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
</BODY>
</HTML>
<?php
?>