<?php
// File : spanish/localized.tutorial.php - plus version (17.09.2006 - rev.3)
// Original translation by Josep Román <josep.roman@zuerich-see.ch> && León Del Río <leon@webmaster.com.mx>
// Updates, corrections and additions for the Plus version by Roxana Castañeda <roxminu@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// Get the names and values for vars sent by the script that called this one
if (isset($HTTP_GET_VARS))
{
	while(list($nombre,$value) = each($HTTP_GET_VARS))
	{
		$$nombre = $value;
	};
};

// Color Input Box mod by Ciprian - you MUST delete this line if you uninstall this mod
require("./config/config.lib.php");
require("./lib/index.lib.php");
if (isset($HTTP_COOKIE_VARS["CookieStatus"])) $CookieStatus = $HTTP_COOKIE_VARS["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Tutorial en Español para <?php echo(APP_NAME." - ".APP_VERSION); ?></TITLE>
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
<!-- Remove this § in translation files -->
<?php
if(isset($NoTranslation)) echo($NoTranslation."\n");
?>
<!-- End of the § to be removed in translation files -->

<P><A NAME="top"></P>
<TABLE BORDER="5" CELLPADDING="5">
<TR>
	<TD><FONT SIZE="+2">Contenido del Tutorial</FONT></TD>
</TR>
</TABLE><br />

<P CLASS="redText">
Alerta: Los que usan Netscape deben definir su idioma como por defecto en el c&oacute;digo o sino cada caracter en los mensajes ser&aacute; reemplazado por un '?'.<br />
Esto puede hacerse de la siguiente manera: Ver/JuegodeCaracteres/su idioma Auto-Detectar, luego Ver/JuegodeCaracteres/PorDefecto.
</P>

<?php
if (C_MULTI_LANG == "1")
{
	?>
	<A HREF="#language" CLASS="topLink">Escoger un idioma</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Entrar al Chat</A><br />
<A HREF="#register" CLASS="topLink">Registrarse</A><br />
<A HREF="#modProfile" CLASS="topLink">Modificar<?php if (C_SHOW_DEL_PROF == "1") echo("/deleting"); ?> su perfil</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Crear una sala</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Lo que indica el s&iacute;mbolo del estado de la conexion</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Enviar un Mensaje</A><br />
<A HREF="#users_list" CLASS="topLink">Comprendiendo la lista de usuarios</A><br />
<A HREF="#exit" CLASS="topLink">Salir de la sala de chat</A><br />
<A HREF="#users_popup" CLASS="topLink">Saber quien est&aacute; chateando sin tener que entrar primero</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Personalizar la Apariencia del Chat</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Caracter&iacute;sticas y Comandos:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">El Comando de Ayuda (Help) </A><br />
<?php
if (C_USE_SMILIES == "1")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Caritas gr&aacute;ficas o smilies</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#text" CLASS="topLink">Dar formato al Texto</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Invitar a un usuario a un&iacute;rsele en su sala de chat</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">Cambiando de una sala de chat a otra</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Mensajes Privados</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS="topLink">Acciones</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Ignorar a otro Usuario</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">Conseguir Informaci&oacute;n P&uacute;blica sobre otro Usuario</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#save" CLASS="topLink">Guardar mensajes</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Comandos especiales para los moderadores y/o el administrador:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Enviar un anuncio</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#kick" CLASS="topLink">Expulsar a un usuario</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#banish" CLASS="topLink">Desterrar a un usuario</A><br />
	<?php
};
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#promote" CLASS="topLink">Promover/Degradar a un usuario para/de moderador:</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG == "1")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Escoger un idioma:</B></A></FONT>
	<P>
	Puede escoger un idioma entre aquellos <?php echo(APP_NAME); ?> que han sido traducidos haciendo clic en una de las banderas que aparecen en la p&aacute;gina de inicio. En el ejemplo que sigue, un usuario escoge el idioma Franc&eacute;s:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Flags for language selection">
	<br /><P ALIGN="right"><A HREF="#top">Subir</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Entrar:</B></A></FONT>
<P>
Si ya est&aacute; registrado, simplemente ingrese escribiendo su nombre de usuario y su contrase&ntilde;a. Luego seleccione en que sala de chat desea entrar y presione el bot&oacute;n de Chat.<br />
<?php
if (C_REQUIRE_REGISTER == "1")
{
	?>
<P>
	De lo contrario, tiene que <A HREF="#register">registrarse</A> primero.
	<?php
}
else
{
	?>
<P>
	Tambi&eacute;n puede <A HREF="#register">registrarse</A> primero o simplemente entrar a una sala room, pero su alias no ser&aacute; separado s&oacute;lo para usted (y otro usuario podr&iacute;a usar el mismo alias una vez que usted salga del chat).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Subir</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Para Registrarse:</B></A></FONT>
<P>
Si todav&iacute;a no se ha registrado<?php if (C_REQUIRE_REGISTER == "0") echo("and would like to"); ?>, por favor escoja la opci&oacute;n de registrarse. Una peque&ntilde;a ventana emergente (pop-up) aparecer&aacute;.
<P>
<UL>
	<LI>Primero debe crear un nombre de usuario
	  <?php if (!C_EMAIL_PASWD) echo(" and a password"); ?> para usted, escribiendo en la casilla correspondiente. El nombre de usuario que escriba ser&aacute; el que se muestre autom&aacute;ticamente la sala de chat. No puede contener espacios en blanco, comas (,) o barras invertidas (\).
<?php if (C_NO_SWEAR == "1") echo(" It can not contain \"swear words\"."); ?>
	<LI>Segundo, por favor escriba su nombre, apellido y su direcci&oacute;n de correo electr&oacute;nico (email). Para poder registrarse debe llenar todos esos campos. La informaci&oacute;n sobre su g&eacute;nero es opcional.
	<LI>Si tiene una web, puede escribir la direcci&oacute;n en la casilla.
	<LI>El campo del idioma puede ayudar a otros usuarios durante conversaciones futuras. As&iacute; sabr&aacute;n que idioma(s) habla usted.
	<LI>Finalmente, si desea permitir que todos puedan ver su direcci&oacute;n de correo electr&oacute;nico (email), por favor seleccione la casilla al lado de donde dice "mostrar email en informaci&oacute;n p&uacute;blica". Si no desea que los dem&aacute;s usuarios vean su direcci&oacute;n de correo electr&oacute;nico (email), entonces deje la casilla vac&iacute;a.
	<LI>Luego, presione el bot&oacute;n de Registrarse y su cuenta ser&aacute; creada. Si desea detenerse en cualquier momento sin registrarse, s&oacute;lo presione el bot&oacute;n Cerrar.
</UL>
<P>
<A NAME="modProfile"></A>Por supuesto, los usuarios registrados pueden modificar<?php if (C_SHOW_DEL_PROF == "1") echo("/delete"); ?>
 su perfil
haciendo clic donde corresponde <?php echo((C_SHOW_DEL_PROF == "0" ? "link" : "links")); ?>.<br />
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Crear una sala:</B></A></FONT>
	<P>
	Los usuarios registrados pueden crear salas. Los &uacute;nicos que pueden ingresar a las salas privadas son los usuarios que saben el nombre de la sala. El nombre de sala privada nunca se mostrar&aacute;, excepto para aquellos usuarios que se encuentran en ella.<br />
<P>
	El nombre de una sala no puede contener una coma (,) o barra invertida (\).<?php if (C_NO_SWEAR == "1") echo(" It can no more contains \"swear words\"."); ?>
	<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>El s&iacute;mbolo del Estado de la Conexi&oacute;n:</B></A></FONT>
	<P>
	Un signo representando el estado de su conexi&oacute;n se muestra en la esquina superior derecha de la pantalla. El signo puede tener tres formas :
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="No connection"> cuando no se necesita conexi&oacute;n;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connecting"> cuando la conexi&oacute;n est&aacute; en progreso;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connection failed"> cuando la conexi&oacute;n ha fallado.
	</UL>
	<P>
	En el tercer caso, si hace clic en el &quot;bot&oacute;n" rojo empezar&aacute; un nuevo intento para conectarse.
	<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Enviar mensajes:</B></A></FONT>
<P>
Para enviar un mensaje en la sala de chat, escriba su texto en la casilla de escritura o casilla de texto que aparece en la esquina inferior izquierda y luego presione la tecla Intro para enviarlo. Los mensajes de todos los usuarios se desplazan en la ventana del chat.<br />
<?php if (C_NO_SWEAR == "1") echo("Note that \"swear words\" are skipped from mensajes."); ?>
<P>
Si desea puede cambiar el color del texto de sus mensajes escogiendo un color nuevo de la lista de selecci&oacute;n que se encuentra al lado derecho de la ventana del chat.
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Comprendiendo la lista de usuarios (no para la ventana emergente popup de usuarios):</B></A></FONT>
<P>
<OL>
	Se han definido dos reglas b&aacute;sicas para la lista de usuarios:<br />
	<LI>un icono peque&ntilde;o que muestra el g&eacute;nero del usuario aparece antes del alias de un usuario registrado (si hace clic en &eacute;l se abrir&aacute; una ventana emergente <A HREF="#whois">quien es</A> que muestra quien es este usuario), mientras que los usuarios sin registrar s&oacute;lo tienen espacios en blanco antes de su alias;<br />
	<LI>el alias del administrador o el del moderador aparece en it&aacute;licas.
</OL>
<P><I>Por ejemplo</I>, la vista que se muestra debajo le permite saber que:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicol&aacute;s es el administrador o uno de los moderadores de la sala phpMyChat;<br />
		  <br />
		<LI>extranjero (alguien cuyo sexo se desconoce), Jezek2 y Caridad son usuarios registrados sin &quot;poderes&quot; adicionales en la sala de phpMyChat;<br />
		  <br />
		<LI>lolo es simplemente un usuario sin registrar.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Salir de la sala de chat:</B></A></FONT>
<P>
Para salir del chat, simpemente haga clic una vez en "Salir". Alternativamente, tambi&eacute;n puede escribir uno de los siguientes comandos en la casilla de escritura:<br />
/exit<br />
/bye<br />
/quit Este comando puede ser completado con un mensaje para ser enviado antes de salir de la sala de chat.
<I>Por ejemplo :</I> /quit &iexcl;Nos vemos pronto!
<P>
el mensaje &quot;&iexcl;Nos vemos pronto!&quot; aparecer&aacute; en la ventana del chat y luego usted saldr&aacute; de la sala.

<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Saber quien est&aacute; chateando sin tener que entrar al chat:</B></A></FONT>
<P>
Puede hacer clic en el v&iacute;nculo que muestra el n&uacute;mero de usuarios conectados en la p&aacute;gina de inicio, o, si est&aacute; chateando, haga clic en la imagen <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Users popup"> en la esquina superior derecha de su pantalla para abrir otra ventana que le mostrar&aacute; la lista de usuarios conectados, y la sala en la que se encuentran, casi en tiempo real.<br />
El t&iacute;tulo de esta ventana contiene los nombres de usuarios, si hay menos de tres, o sino la cantidad de usuarios y las salas abiertas.
<P>
Si hace clic en el <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Beeps"> icono en la parte superior de esta ventana emergente podr&aacute; activar o desactivar el sonido bip que se escucha cuando un usuario ingresa al chat.
<br /><P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Personalizar la Apariencia del Chat:</B></A></FONT>
<P>
Hay muchas maneras para personalizar la apariencia del Chat. Para cambiar sus preferencias, simplemente escriba el comando apropiado en su casilla de escritura y presione la tecla Intro (Enter/Return) de su teclado.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>El <B>comando Clear </B> le permite limpiar la ventana principal del chat y mostrar s&oacute;lo los 5 &uacute;ltimos mensajes.<br />
		  Escriba "/clear" sin las comillas.
		  <P>
		<?php
	}
	else
	{
		?>
		<LI>El<B> comando Order </B>le permite cambiar el orden en que aparecen los mensajes de arriba para abajo o viceversa .<br />
		 Escriba "/order" sin las comillas.
		  <P>
		<?php
	};
	?>
  <LI>El <B>comando Notify </B> le permite escoger entre ver (on) o no ver (off) los anuncios que se&ntilde;alan el ingreso o salida de otros usuarios a la sala de chat. Por defecto esta opci&oacute;n es <?php echo(C_NOTIFY ? "on" : "off"); ?> y los anuncios <?php echo(C_NOTIFY ? "will" : "won't"); ?> se ven.<br />
    Escriba "/notify" sin las comillas.
	<P>
  <LI>El <B>comando Timestamp </B> le permite cambiar entre encender o apagar la opci&oacute;n de ver la hora en que el mensaje fue escrito delante de cada mensaje y la hora del servidor en la barra de estado. Por defecto esta opci&oacute;n es <?php echo(C_SHOW_TIMESTAMP ? "on" : "off"); ?>.<br />
    Escriba "/timestamp" sin comillas.
	<P>
  <LI>El <B>comando Refresh </B> le permite ajustar el intervalo en que se refrescan o actualizan los mensajes en su pantalla. El intervalo por defecto es actualmente <?php echo(C_MSG_REFRESH); ?> segundos. Para cambiar el intervalo escriba "/refresh n" sin comillas donde n es el tiempo en segundos para el nuevo intervalo.
	<P>
	<I>Por ejemplo:</I> /refresh 5
	<P>
	cambiar&aacute; el intervalo a cada 5 segundos. *Cuidado, si escribe un n&uacute;mero menor a 3 para n, el intervalo cambiar&aacute; a no actualizar en absoluto (lo cual es &uacute;til si desea leer un mont&oacute;n de mensajes antiguos sin que lo molesten )!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
  <LI>El <B>comando Show </B> le permite ajustar la cantidad de mensajes que se ven en su pantalla. Para cambiar la cantidad por defecto, escriba "/show n" sin comillas donde n es la cantidad de mensajes.
		<P>
		<I>Por ejemplo:</I> /show 50
		<P>
  mostrar&aacute; 50 mensajes nuevos en su pantalla. Si todos los mensajes no se pueden mostrar por falta de espacio en el marco de mensajes, una barra de desplazamiento aparecer&aacute; al costado derecho del marco de mensajes.
  </UL>
		<?php
	}
	else
	{
		?>
		<LI>Los <B>comandos Show y Last </B> le permiten limpiar su pantalla y muestran los &uacute;ltimos <I>n</I> mensajes que recibi&oacute; . Escriba "/show n" o "/last n" sin comillas donde n es la cantidad de mensajes que se mostrar&aacute;n.
		  <P>
		<I>Por ejemplo:</I> /show 50 o /last 50
		<P>
		limpiar&aacute;n el marco de mensajes y mostrar&aacute;n s&oacute;lo los &uacute;ltimos 50 mensajes en su pantalla. Si no se pueden mostrar todos los mensajes por falta de espacio, aparecer&aacute; una barra de desplazamiento en el borde izquierdo del marco de mensajes.
		  </UL>
		<?php
	};
	?>
	<br />
		<P ALIGN="right"><A HREF="#top">Subir</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Caracter&iacute;sticas y Comandos</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Comando Help (Ayuda):</B></A></FONT>
<P>
Mientras est&eacute; dentro de una sala de chat puede llamar a la ventana emergente (popup) de Ayuda d&aacute;ndole clic en la <IMG SRC="images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="Help"> imagen que se encuentra justo antes de la casilla de escritura. Tambi&eacute;n puede escribir los <B>comandos "/help" o "/?"</B> en la casilla de escritura.
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<P>
<hr />

<?php
if (C_USE_SMILIES == "1")
{
	include("./lib/smilies.lib.php");
	$Nb = count($SmiliesTbl);
	$ResultTbl = Array();
	DisplaySmilies($ResultTbl,$SmiliesTbl,$Nb,"tutorial");
	unset($SmiliesTbl);
	?>
	<FONT SIZE="+1"><A NAME="smilies"><B>Caritas o Smilies:</B></A></FONT>
	<P>Puede incluir caritas o smilies dentro de sus mensajes. Vea debajo el c&oacute;digo que debe escribir en el mensaje para obtener cada una de las siguientes caritas (smilies).
	<P>
	<I>Por ejemplo</I>, ecribir el texto "Hola Jorge :)" sin las comillas mostrar&aacute; el siguiente mensaje Hola Jorge <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> en la ventana principal.
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
	<br /><P ALIGN="right"><A HREF="#top">Subir</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Dar formato al Texto:</B></A></FONT>
	<P>
	Se le puede dar formato al texto para que est&eacute; en negrita, it&aacute;lica o subrayado encasillando las secciones correspondientes de su texto con las etiquetas HTML: &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; o &LT;U&GT; &LT;/U&GT respectivamente.
	<P>
	<I>Por ejemplo</I>, &LT;B&GT;este texto&LT;/B&GT; producir&aacute; <B>este text</B>o.
	<P>
	Para crear un hiperv&iacute;nculo para una direcci&oacute;n de correo electr&oacute;nico (email) o para una direcci&oacute;n de internet (URL), escriba la direcci&oacute;n (sin ninguna etiqueta HTML). El hiperv&iacute;nculo se crear&aacute; autom&aacute;ticamente.
	<br />
	<P ALIGN="right"><A HREF="#top">Subir</A></P>
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
<b><?php echo(L_COL_HELP_SUB3); ?></b><br /><?php echo(L_COLOR_HEAD_SETTINGS); ?><br /><?php if (COLOR_FILTERS == 1) echo(L_COLOR_HEAD_SETTINGSa."<br />"); ?><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("Administrador"); elseif ($CookieStatus == "m") echo("Moderador"); elseif ($CookieStatus == "u") echo("Invitado (Normal)"); else echo("Registrado (Normal)");?></b><br /><?php if (COLOR_FILTERS == 1) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Subir</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Invitar a alguien a unirse a la sala de chat en la que usted se encuentra:</B></A></FONT>
<P>
Puede usar el <b>comando</b> <B>invitar </B> para invitar a un usuario para que se le una en la sala en la que usted est&aacute; chateando.
<P>
<I>Por ejemplo:</I> /invite Jorge
<P>
enviar&aacute; un mensaje privado a Jorge sugiri&eacute;ndole que se una a usted en su sala de chat. Este mensaje contiene el nombre de la sala deseada y ese nombre aparecer&aacute; como un v&iacute;nculo.
<P>
Tambi&eacute;n puede poner m&aacute;s de un nombre de usuario en el comando invitar (ej. "/invite Jorge,Elena,Pedro"). Los nombres deben separarse con una coma (,) sin dejar espacios.
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Cambiar de sala:</B></A></FONT>
<P>
La lista que se encuentra en la parte derecha de su pantalla le muestra todas las salas de chat y los usuarios conectados en ellas en ese momento. Para dejar la sala en la que est&aacute; y moverse a otra sala, simplemente haga clic una vez en el nombre de la sala a la que desea entrar. Las salas vac&iacute;as no aparecen en esta lista. Puede moverse a una sala vac&iacute;a escribiendo el <B>comando "/join #nombredelasala"</B> sin comillas.
<P>
<I>Por ejemplo:</I> /join #SalaRoja
<P>
lo mover&aacute; a la SalaRoja.
<?php
if (C_VERSION == "2")
{
	echo(C_REQUIRE_REGISTER == "0" ? "<P>If you're a registered usuario, you" : "<br /><P>You");
	?>
	 tambi&eacute;n puede crear una sala nueva usando el mismo comando. S&oacute;lo tiene que especificar el tipo de sala: 0 es para privada, 1 para p&uacute;blica (valor por defecto).
	<P>
	<I>Por ejemplo:</I> /join 0 #MiSala
	<P>
	crear&aacute; una nueva sala privada (siempre y cuando una sala p&uacute;blica no haya sido creada anteriormente con ese mismo nombre) llamada MiSala y lo mover&aacute; dentro de ella.
	<P>
	Los nombres de las Salas no pueden contener coma (,) o barra invertida (\).<?php if (C_NO_SWEAR == "1") echo(" It can no more contains \"swear words\"."); ?>
	<?php
}
?>
<br />
	<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Modificar su propio perfil dentro del chat:</B></FONT>
<P>
El <B>comando Profile </B> abre una ventana emergente (pop-up) en la cual usted puede modificar la informaci&oacute;n de su perfil, exceptuando su alias y contrase&ntilde;a (tiene que usar el v&iacute;nculo en la p&aacute;gina de inicio para cambiar estos &uacute;ltimos).<br />
Escriba /profile
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Volviendo a ver el &uacute;ltimo mensaje o comando que ha enviado:</B></FONT>
<P>El <B>! comando</B> llama al &uacute;ltimo mensaje o comando que usted envi&oacute;.<br />
Escriba /!
<br /><P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Responder a un usuario espec&iacute;fico:</B></FONT>
<P>
Si hace clic una vez en el nombre de otro usuario que aparezca en la lista (en la parte derecha de la pantalla) har&aacute; que el "nombredeusuario>" aparezca en su casilla de escritura. Esta caracter&iacute;stica le permite enviar un mensaje privado con gran facilidad a otro usuario, quiz&aacute; en respuesta a algo que &eacute;l o ella han escrito previamente.
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Mensajes Privados:</B></A></FONT>
<P>
Para enviar un mensaje privado a otro usuario que se encuentra en la misma sala de chat, escriba el <B>comando "/msg nombredeusuario mensajetexto" o "/to nombredeusuario mensajetexto"</B> sin comillas.
<P>
<I>Por ejemplo, donde Jorge es el nombre del usuario:</I> /msg Jorge Hola, &iquest;c&oacute;mo est&aacute;s?
<P>
El mensaje ser&aacute; visto por Jorge y usted, pero ning&uacute;n otro usuario lo podr&aacute; ver.
<P>
Tenga presente que hacer clic en el alias del que env&iacute;a un mensaje, en la ventana principal, autom&aacute;ticamente agrega este comando a la casilla de escritura de los mensajes.
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Acciones:</B></A></FONT>
<P>
Para describir lo que est&aacute; haciendo puede usar el <B>comando "/me acci&oacute;n"</B> sin comillas.
<P>
<I>Por ejemplo:</I> Si Jorge env&iacute;a un mensaje "/me est&aacute; fumando un cigarrillo" el mensaje mostrar&aacute; en la ventana "<B>* Jorge</B> est&aacute; fumando un cigarrillo".
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorar a otros usuarios:</B></A></FONT>
<P>
Para ignorar todos los mensajes de otro usuario, escriba el <B>comando "/ignore nombredeusuario"</B> sin comillas.
<P>
<I>Por ejemplo:</I> /ignore Jorge
<P>
Desde ese momento en adelante, no se mostrar&aacute; ning&uacute;n mensaje proveniente de Jorge en su pantalla.
<P>
Para ver una lista de los usuarios cuyos mensajes son ignorados, s&oacute;lo escriba el <B>comando "/ignore"</B> sin comillas.
<P>
Para volver a mostrar los mensajes de un usuario ignorado, escriba el <B>comando "/ignore - nombredeusuario"</B> sin comillas donde "-" es un gui&oacute;n.
<P>
<P>
<I>Por ejemplo:</I> /ignore - Jorge
<P>
De ahora en adelante todos los mensajes de Jorge, durante la sesi&oacute;n de chat actual, se mostrar&aacute;n en su pantalla, incluyendo los mensajes anteriores al momento en que escribi&oacute; este comando.
Si no especifica un nombre de usuario despu&eacute;s del gui&oacute;n, toda su &quot;lista ignorar&quot; se limpiar&aacute;.
<P>
Tenga presente que puede poner m&aacute;s de un nombre de usuario en el comando ignorar (ej "/ignore Jorge,Elena,Pedro" o "/ignore - Jorge,Pedro"). Debe separar los nombres con una coma (,) sin dejar espacios.
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Obtener Informaci&oacute;n de los Usuarios:</B></A></FONT>
<P>
Para ver la informaci&oacute;n p&uacute;blica de un usuario, escriba el <B>comando "/whois nombredeusuario"</B> sin comillas.
<P>
<I>Por Ejemplo:</I> /whois Jorge
<P>
donde 'Jorge' es el nombre del usuario. Este comando abrir&aacute; una ventana emergente (pop-up) que mostrar&aacute; la informaci&oacute;n p&uacute;blica disponible de ese usuario. Use su propio nombre para revisar como se muestra la informaci&oacute;n de su perfil a otros usuarios usando el mismo comando.
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Guardar mensajes:</B></A></FONT>
	<P>
	Para exportar mensajes (sin incluir anuncios) a un archivo local HTML, escriba el <B>comando "/save n"</B> sin comillas.
	<P>
	<I>Por Ejemplo:</I> /save 5
	<P>
	donde '5' es el n&uacute;mero de mensajes que quiere guardar. Si no especifica n, entonces todos los mensajes disponibles en la sala actual ser&aacute;n guardados.
	<br />
	<P ALIGN="right"><A HREF="#top">Subir</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Comandos s&oacute;lo para el administrador y/o los moderadores</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Enviar un anuncio:</B></A></FONT>
<P>
El administrador puede enviar un anuncio a todas las salas del chat y todos los usuarios logueados usando el <B> comando announce</B>.
<P>
<I>Por ejemplo: /announce El chat no funcionar&aacute; esta noche a las 8pm por labores de mantenimiento.</I>
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
Hay otro anuncio de utilidad como el comando para representaciones chats; el administrador o los moderadores en una sala pueden tambi&eacute;n enviar anuncios a todos los usuarios que se encuentran en la sala actual usando el <B> comando room </B>.
<P>
<I>Por ejemplo: /room La reuni&oacute;n empieza a las 3 pm.</I> o <I>/room * La reuni&oacute;n empieza a las 3 pm en la sala Italiana.</I>
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Expulsar a un usuario:</B></A></FONT>
<P>
Los moderadores pueden expulsar a un usuario y el administrador puede expulsar a un usuario o a un moderador con el <B>comando kick</B>. Excepto por el administrador, el usuario que ser&aacute; expulsado debe estar en la sala actual.
<P>
<I>Por ejemplo</I>, si Jorge es el nombre del usuario que ser&aacute; expulsado: <I>/kick Jorge</I> o <I>/kick Jorge raz&oacute;n de la expulsi&oacute;n.</I> La "raz&oacute;n de la expulsi&oacute;n" puede ser cualquier texto ej. "por hacer spam!"
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Desterrar a un usuario:</B></A></FONT>
	<P>
	Los moderadores pueden desterrar a un usuario y el administrador puede desterrar a un usuario o a un moderador con el <B>comando ban</B>.<br />
	El administrador puede desterrar a un usuario de otra sala diferente a aquella en la cual est&aacute; chateando. El tambi&eacute;n puede desterrar a un usuario para siempre y de todo el chat completamente con '<B>&nbsp;*&nbsp;</B>'. La preferencia debe ser insertada antes del alias del usuario que ser&aacute; desterrado.
	<P>
	<I>Por ejemplo</I>, si Jorge es el nombre del usuario que ser&aacute; desterrado: <I>/ban Jorge</I> o <I>/ban * Jorge</I>
	<br />
	<P ALIGN="right"><A HREF="#top">Subir</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Promover/Degradar a un usuario a/de moderador:</B></A></FONT>
<P>
Los moderadores y el administrador pueden promover a otro usuario para que sea un moderador usando el <B>comando promote</B>.
<P>
<I>Por ejemplo</I>, si Jorge es el nombre del usuario que se desea promover: <I>/promote Jorge</I>
<P>
S&oacute;lo el administrador puede hacer lo contrario (degradar a un moderador y convertirlo en un usuario simple) usando el <B>comando demote</B>.
<P>
<I>Por ejemplo</I>, si Jorge es el nombre del moderador que ser&aacute; degradado: <I>/demote Jorge</I> o <I>/demote * Jorge</I> (lo degradar&aacute; de la sala actual o de todas las salas).
<br />
<P ALIGN="right"><A HREF="#top">Subir</A></P>
<P>
</BODY>
</HTML>
<?php
?>