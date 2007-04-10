<?php
// File : argentinian_spanish/localized.tutorial.php - plus version (17.09.2006 - rev.3)
// Original translation in Spanish (for the Argentinian dialect usage) by Jorge Colaccini <jrc@informas.com>
// Updates, corrections and additions for the Plus version by Matias Olivera <matiolivera@yahoo.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// Get the names and values for vars sent by the script that called this one
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
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
<TITLE>Tutorial en Espa�ol para <?php echo(APP_NAME." - ".APP_VERSION); ?></TITLE>
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
<!-- Remove this � in translation files -->
<?php
if(isset($NoTranslation)) echo($NoTranslation."\n");
?>
<!-- End of the � to be removed in translation files -->

<P><A NAME="top"></P>
<TABLE BORDER="5" CELLPADDING="5">
<TR>
	<TD><FONT SIZE="+2">Contenidos de este tutorial</FONT></TD>
</TR>
</TABLE><br />

<P CLASS="redText">
<b>Atenci�n</b>: Los usuarios de Netscape, deben definir sus idiomas por omisi�n o cada caracter en los mensajes ser� reemplazado por '?'.<BR>
Esto puede realizarse de la siguiente manera: View/CharacterSet/your language
Auto-Detect, luego View/CharacterSet/SetDefault.
</P>

<?php
if (C_MULTI_LANG == "1")
{
	?>
	<A HREF="#language" CLASS="topLink">Cambiar de idioma</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Loguearse para el Chat</A><BR>
<A HREF="#register" CLASS="topLink">Registrarse</A><BR>
<A HREF="#modProfile" CLASS="topLink">Modificar<?php if (C_SHOW_DEL_PROF == "1") echo("/borrar "); ?> su perfil (datos)</A><BR>
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Crear un sal�n de chat</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Entendiendo los estados de conexi�n</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Enviando un mensaje</A><br />
<A HREF="#users_list" CLASS="topLink">Entendiendo el listado de usuarios</A><br />
<A HREF="#exit" CLASS="topLink">Dejando el sal�n de chat</A><br />
<A HREF="#users_popup" CLASS="topLink">Saber qui�n est� chateando sin estar registrado</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Configurando la vista del chat</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Utilidades y comandos:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">Comando de ayuda</A><br />
<?php
if (C_USE_SMILIES == "1")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Emoticones gr�ficos</A><br />
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
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Invitar a un usuario a unirse a tu alcual sal�n de chat</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">Cambiando de un sal�n de chat a otro</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Mensajes privados</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS="topLink">Acciones</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Ignorando a otros usuarios</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">Obteniendo informaci�n p�blica de otro usuario</A><br />
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
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Env�a un anuncio</A><br />
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
if (C_MULTI_LANG == "1")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Eligiendo idioma:</B></A></FONT>
	<P>
	Puedes elegir un idioma de entre los cuales <?php echo(APP_NAME); ?> ha sido traducido seleccionando la bandera al inicio de la p�gina.
	En el ejemplo que sigue, un usuario selecciona el idioma franc�s:
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
Luego seleccion� a qu� sal�n quer�s entrar y presion� el bot�n Chat.<br />
<?php
if (C_REQUIRE_REGISTER == "1")
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
	Sino pod�s <A HREF="#register">registrarte</A> primero o simplemente entrar a un sal�n pero tu nick no se te reservar�
	(Otro usuario puede usar tu mismo nick una vez que te desloguees).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Para registrarte:</B></A></FONT>
<P>
Si a�n no te registraste <?php if (C_REQUIRE_REGISTER == "0") echo("y te gustar�a hacerlo"); ?>, Por favor seleccion� la opci�n de registro.
Aparecer� una peque�a ventana popup.
<P>
<UL>
 <li class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
     mso-list:l3 level1 lfo1;tab-stops:list 36.0pt'>Primero, cre� un nombre de
     usuario<?php if (!C_EMAIL_PASWD) echo(" y una contrase�a"); ?> para vos,
     completando los camos correspondientes. El nombre de usuario que elijas,
     ser�, autom�ticamente, mostrado en el sal�n de chat. No puede contener
     espacios, comas o barras (\). <?php if (C_NO_SWEAR == "1") echo(" No puede contener \"malas palabras\"."); ?></li>
 <li class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
     mso-list:l3 level1 lfo1;tab-stops:list 36.0pt'>Segundo, ingres� tu nombre,
     apellido, y tu direcci�n de email. Para ser registrado como usuario
     en el chat, toda esta informaci�n debe ser provista. La
     informaci�n sobre tu sexo es opcional. </li>
 <li class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
     mso-list:l3 level1 lfo1;tab-stops:list 36.0pt'>Si ten�s una p�gina
     Web, pod�s ingresar su URL en la casilla correspondiente. </li>
 <li class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
     mso-list:l3 level1 lfo1;tab-stops:list 36.0pt'>El campo del idioma puede
     ayudar a otros usuarios en futuras discuciones. Ellos podr�n saber los idiomas
     que conoc�s. </li>
 <li class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
     mso-list:l3 level1 lfo1;tab-stops:list 36.0pt'>Finalmente, si te interesa que
     que tu direcci�n de email pueda ser vista por otros usuarios, marc� la
     casilla &quot;mostrar e-mail en informaci�n p�blica&quot;. Si no
     dese�s que tu direcci�n de e-mail sea vista, dej� la casilla sin marcar. </li>
 <li class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto;
     mso-list:l3 level1 lfo1;tab-stops:list 36.0pt'>Luego presion� el bot�n
     de Registro y tu cuenta ser� creada. Si dese�s detener en alg�n
     momento la registraci�n, presion� el bot�n Cerrar. </li>
</UL>
<P>
<A NAME="modProfile"></A>Por supuesto, los usuarios registrados podr�n modificar
<?php if (C_SHOW_DEL_PROF == "1") echo("/borrar"); ?> sus propios datos haciendo click en el apropiado
<?php echo((C_SHOW_DEL_PROF == "0" ? "link" : "links")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Crear un sal�n:</B></A></FONT>
	<P>
	Los usuarios registrados pueden crear salones. Los salones Privados pueden ser
accedidos solamente por usuarios que conocen su nombre y nunca se muestran
excepto para usuarios que est�n registrados para el mismo.
<br />
	<P>
	Los nombres de salones no pueden contener comas o barras (\).<?php if (C_NO_SWEAR == "1") echo(" No pueden contener \"malas palabras\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Comprendiendo el estado de conexi�n:</B></A></FONT>
	<P>
	Un s�mbolo, arriba y a la derecha de la pantalla, te muestra el estado de tu
conexi�n. Puede tomar 3 formas:
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="No connection"> cuando
     la conexi�n no es requerida;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connecting"> cuando
     la conexi�n est� en progreso;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connection failed"> cuando hay una falla en la conexi�n.
	</UL>
	<P>
	En el tercer caso, haciendo click en el bot�n rojo podr�s establecer una
nueva conexi�n.
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
Para incluir un mensaje en el sal�n de chat, escrib� adentro de la barra de
abajo a la izquierda y presion� Enter/Return para enviarlo. Los mensajes de todos los usuarios pasan por la pantalla.<br />
<?php if (C_NO_SWEAR == "1") echo("Notar�s que las \"malas palabras\" son salteadas en los mensajes."); ?>
<P>
Pod�s cambiar el color de texto de tus mensajes por otro color de la
lista que se encuentra en la caja de la derecha.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Verificando la lista
de usuarios (no para usuarios de ventana activa):</B></A></FONT>
<P>
<OL>
	Dos reglas b�sicas han sido
definidas para la lista de usuarios:<br />
	<LI>Un peque�o icono (que
     indica tambi�n su sexo) es mostrado antes del nick de un usuario registrado.
     Haciendo click sobre �l, se abrir� <a href="#whois">la ventana de b�squeda</a>
     para este usuario, mientras que para usuarios no registrados no se presenta
     ning�n signo o �cono asociado a su <i>nick</i> (alias);<br /></li>
	<LI>El nick del administrador o
     del moderador aparece con caracteres it�licos.</li>
</OL>
<P><I>Por ejemplo</I>, en la figura de abajo pod�s observar:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas es el administrador
       o uno de los moderadores del sal�n phpMyChat;<br /><br />
		<LI>alien (cuyo sexo
       no se ha especificado), Jezek2 y Caridad son usuarios registrados sin
       "atributos" especiales para el sal�n phpMyChat;<br /><br />
		<LI>lolo es un simple
       usuario no registrado.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Dejando un sal�n de chat:</B></A></FONT>
<P>
Para salir del chat, simplemente hac� click sobre &quot;Salir&quot;.
Alternativamente, tambi�n pod�s ingresar uno de los siguientes comandos
en la barra de escritura:<br>
/exit<br>
/bye<br>
/quit Estos comandos pueden ser complementados por mensajes antes de dejar el
sal�n de chat. <i>Por ejemplo:</i> /quit Hasta pronto! </p>

Se enviar� el mensaje &quot;Nos vemos!&quot; en la pantalla general y
entonces saldr�s del chat.

<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Conociendo qui�n
est� chateando sin estar logueado:</B></A></FONT>
<P>
Pod�s hacer click en el v�nculo que muestra el n�mero de usuarios
conectados en el comienzo de la p�gina, o, si est�s chateando, hac� click
en la imagen <img border=0 width=13 height=13 id="_x0000_i1041"
src="images\popup.gif" alt="Ventana de usuarios"> hacia arriba y a la derecha de la
pantalla, para abrir una ventana independiente que mostrar� la lista de usuarios
conectados y los salones en que ellos est�n, casi en tiempo real.<br>
El t�tulo de esta ventana contiene el nombre de los usuarios, si son
menos que tres, el n�mero de usuarios y salones abiertos.
<P>
Haciendo click en el icono <img border=0 width=13 height=13 id="_x0000_i1042"
src="images\sound.gif" alt=Beeps> arriba de esta imagen ser�n
activados/desactivados los sonidos de los usuarios entrantes.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr /><hr />

<P>
<FONT SIZE="+1"><A NAME="customize"><B>Diagramando la vista del Chat:</B></A></FONT>
<P>
Hay varias formas de diagramar c�mo se ver�n las ventanas del chat. Para
cambiar las configuraciones, simplemente escrib� el comando apropiado dentro del cuadro de mensaje
y presion� Intro/Enter/Return.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>El <b>comando Clear</b>
     te permite limpiar la pantalla general y mostrar los �ltimos 5
     mensajes enviados a tu pantalla.<br>
     Escrib� &quot;/clear&quot; sin comillas.
		<o:p></o:p></li>
		<?php
	}
	else
	{
		?>
		<LI>El <B>comando Order</B> te permite intecambiar la ubicaci�n de los nuevos mensajes de la parte superior a la inferior de la pantalla.<br>Escrib� "/order" sin las comillas.
		<P>
		<?php
	};
	?>
	<LI>El <B>comando Notify</B> <br> te permite intercambiar de activa a inactiva la opci�n de ver cuando los otros usuarios entran
	o salen del sal�n. Por defecto esta opci�n es <B><?php echo(C_NOTIFY ? "on" : "off"); ?></B> y las noticias <?php echo(C_NOTIFY ? "ser�n" : "no ser�n"); ?> vistas.<br>Escrib� "/notify" sin comillas.
	<P>
	<LI>El <B>comando Timestamp</B> te permite intercambiar de activa a inactiva la opci�n de ver el tiempo en el que fue posteado, antes de cada mensaje y la hora del servidor en la barra de estado. Por defecto esta opci�n es <B><?php echo(C_SHOW_TIMESTAMP ? "on" : "off"); ?></B>.<br>Escrib� "/timestamp" sin las comillas.
	<P>
	<LI>El <B>comando Refresh</B> te permite ajustar el tiempo de refresco de los mensajes posteados. El tiempo de refresco por defecto es <?php echo(C_MSG_REFRESH); ?> segundos. Para cambiarlo escrib� "/refresh n" sin las comillas, donde n es el nuevo tiempo en segundos de refresco.
	<P>
	<I>Por ejemplo:</I> /refresh 5
	<P>
	cambiar� el tiempo a 5 segundos. *Cuidado, si n se setea en menos de 3, el refresco no resetear� todos los mensajes (�til cuando quer�s leer muchos mensajes viejos sin ser molestado)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
  <LI>El <B>comando Show</B> te permite ajustar el n�mero de mensajes visibles en tu pantalla. Para cambiar la cantidad por default, escrib� "/show n" sin comillas, donde n es el nuevo n�mero de mensajes visibles.
		<P>
		<I>Por ejemplo:</I> /show 50
		<P>
		har� que se vean los �ltimos 50 mensajes en tu pantalla. Si no se pueden visualizar todos los mensajes dentro del cuadro de mensajes, aparecer� una barra de scroll en el margen derecho.</UL>
		<?php
	}
	else
	{
		?>
		<LI>Los <B>comandos Show y Last</B> te permiten limpiar la pantalla y mostrar los �ltimos <I>n</I> mensajes en tu pantalla. Escrib�
		"/show n" o "/last n" sin las comillas. Donde n es el n�mero de mensajes a ser visualizados.
		<P>
		<I>Por ejemplo:</I> /show 50 o /last 50
		<P>
		limpiar� la pantalla y dejar� visibles los �ltimos 50 mensajes.Si no se pueden visualizar todos los mensajes dentro del cuadro de
		mensajes, aparecer� una barra de scroll en el margen derecho.</UL>
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
Una vez dentro de un sal�n de chat, pod�s abrir una nueva ventana con ayuda haciendo click en la <IMG SRC="images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="Help"> im�gen que se encuentra debajo del cuadro de mensaje. Tambi�n pod�s escribir el comando <B>"/help" o "/?" </B> en el cuadro de mensaje.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><B>Emoticones (Smilies):</B></A></FONT>
	<P>Pod�s usar emoticones junto con tus mensajes. Fijate el c�digo que ten�s que escribir en el mensaje para obtener cada uno de los
	emoticones.
	<P>
	<I>Por ejemplo</I>, enviando el texto "Hola Matias :)" sin las comillas, el mensaje que se mostrar� ser� Hola Matias <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> en el cuadro de mensajes.
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
	Pod�s usar negrita, it�lica u subrayado en caso de que lo necesites con los tags HTML
	&LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; o &LT;U&GT; &LT;/U&GT.
	<P>
	<I>Por ejemplo</I>, &LT;B&GT;un texto&LT;/B&GT; mostrar� <B>un texto</B>.
	<P>
	Para crear un hiperv�nculo a un e-mail o URL, escrib� la direcci�n (sin tags HTML). El hiperv�nculo se crear� autom�ticamente.
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
<b><?php echo(L_COL_HELP_SUB3); ?></b><br /><?php echo(L_COLOR_HEAD_SETTINGS); ?><br /><?php if (COLOR_FILTERS == 1) echo(L_COLOR_HEAD_SETTINGSa."<br />"); ?><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("Administrador"); elseif ($CookieStatus == "m") echo("Moderador"); elseif ($CookieStatus == "u") echo("Invitado (Normal)"); else echo("Registrado (Normal)");?></b><br /><?php if (COLOR_FILTERS == 1) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Invit� a alguien a unirse a tu actual sal�n de chat:</B></A></FONT>
<P>
Pod�s usar el comando <B>invite</B> para invitar a un usuario a unirse al sal�n en donde est�s chateando.
<P>
<I>Por ejemplo:</I> /invite Matias
<P>
enviar� un mensaje privado a Matias invit�ndolo a unirse a tu sal�n actual de chat. El mensaje contendr� el nombre del sal�n actual de
chat que aparecer� como un link.
<P>
Ten� en cuenta que pod�s invitar a m�s de una persona a la vez (ej "/invite Matias,Martin,Lucia"). Tienen que estar separados por comas (,) sin comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Cambiando salones:</B></A></FONT>
<P>
La lista de la derecha de la pantalla muestra un listado de los salones
y de los usuarios que est�n actualmente conectados en ese sal�n. Para dej�r el sal�n e ir a otro de los que se listan,
simplemente hac� click en uno de los nombres de los salones de chat.
Los salones vacios no aparecen en la lista. Te pod�s mover a un sal�n vac�o escribiendo el comando <B>"/join #nombresalon"</B>
sin las comillas.
<P>
<I>Por ejemplo:</I> /join #RedRoom
<P>
te mover� al sal�n RedRoom.
<?php
if (C_VERSION == "2")
{
	echo(C_REQUIRE_REGISTER == "0" ? "<P>Si sos un usuario registrado, " : "<br /><P>");
	?>
	 tambi�n pod�s crear un nuevo sal�n con este mismo comando. Pero luego ten�s que especificar el tipo: 0 se mantiene privado, 1 p�blico (valor por defecto).
	<P>
	<I>Por ejemplo:</I> /join 0 #MiSalon
	<P>
	crear� un nuevo sal�n privado (asumiendo que no se ha creado un sal�n con ese mismo nombre) llamado MiSalon y te llevar� a �l.
	<P>
	Los nombres de salones no pueden contener comas o barras invertidas (\).<?php if (C_NO_SWEAR == "1") echo(" No puede contener \"malas palabras\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Modificando tu perfil en el chat:</B></FONT>
<P>
El <B>comando Profile</B> crea una ventana emergente en la cual pod�s editar tu perfil de usuario y modificarlo excepto tu usuario y clave (para hacer esto ten�s que usar el link de la p�gina de inicio).<br>Escrib� "/profile" sin las comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Reutilizando el �ltimo mensaje o comando escrito:</B></FONT>
<P>
El <B>comando !</B> recupera el �ltimo mensaje o comando que usaste.<br>Escrib� "/!" sin las comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Respondiendo a un usuario espec�fico:</B></FONT>
<P>
Haciendo un click sobre el nombre de otro usuario (a la derecha de la pantalla) aparecer� su "usuario>" en tu cuadro de mensaje. Esta opci�n te permite enviarle f�cilmente un mensaje p�blico a un usuario, quiz� en respuesta de algo que este haya posteado.
<br /><P ALIGN="right"><A HREF="#top">Voler al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Mensajes privados:</B></A></FONT>
<P>
Para enviarle un mensaje privado a otro usuario del sal�n en el que te encontr�s, escrib� <B>comando "/msg usuario mensaje" o "/to usuario mensaje"</B> sin las comillas.
<P>
<I>Por ejemplo, si Matias es el usuario:</I> /msg Matias hola, como est�s?
<P>
El mensaje les aparecer� a Matias y a vos, pero los dem�s usuarios no podr�n verlo.
<P>
Ten en cuenta que haciendo click en el nick del usuario en el mensaje en la pantalla de mensajes, autom�ticamente usar� este comando y estar�s listo para chatear en privado.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Acciones:</B></A></FONT>
<P>
Para describir lo que est�s haciendo <B>comando "/me accion"</B> sin comillas.
<P>
<I>Por ejemplo:</I> Si Matias env�a el mensaje "/me estoy fumando un cigarrillo" el mensaje mostrar� "<B>* Matias</B> estoy fumando un cigarrillo".
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorando a otros usuarios:</B></A></FONT>
<P>
Para "ignorar" los mensajes de un usuario, escrib� el <B>comando "/ignore usuario"</B> sin comillas.
<P>
<I>Por ejemplo:</I> /ignore Matias
<P>
Desde ese momento, no aparecer�n los mensajes de Matias en la pantalla.
<P>
Para ver la lista de los usuarios ignorados, simplemente escrib� el <B>comando "/ignore"</B> sin comillas.
<P>
Para mostrar los mensajes de un usuario ignorado, escrib� el <B>comando "/ignore - usuario"</B> sin las comillas, donde "-" es un gui�n. <P>
<P>
<I>Por ejemplo:</I> /ignore - Matias
<P>
Har� que se muestren todos los mensajes que Matias envi� durante la actual sesi�n de chat, incluyendo aquellos mensajes
posteados por Matias a�n antes de que lo "ignoraras".
Si no especific�s un nombre de usuario luego del gui�n, se limpiar� tu lista de ignorados.
<P>
Ten� en cuenta que pod�s poner m�s de un usuario luego del comando (ej "/ignore Matias,Lucia,Martin" o "/ignore - Matias,Lucia"). Deben estar separados por comas (,) sin comillas.
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Obteniendo informaci�n de los usuarios:</B></A></FONT>
<P>
Para ver la informaci�n p�blica de un usuario, escrib� el <B>comando "/whois usuario"</B> sin comillas.
<P>
<I>Por ejemplo:</I> /whois Matias
<P>
donde 'Matias' es el usuario. Este comando crear� una nueva ventana emergente que mostrar� la informaci�n p�blica de ese usuario. Us� tu propio nombre para ver como es que se muestra la informaci�n.
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
	Para exportar mensajes (incluyendo los de aviso) a un archivo HTML local, escrib� el <B>comando "/save n"</B> sin comillas.
	<P>
	<I>Por ejemplo:</I> /save 5
	<P>
	donde '5' es el n�mero de mensajes a salvarse. Si n no se define, se grabar�n todos los mensajes que hayan actualmente en el sal�n de chat.
	<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
	<P>
	<hr />
	<?php
};
?>



<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Comandos para el administrador/moderador �nicamente</U></B></A></FONT>

<P>
<FONT SIZE="+1"><A NAME="announce"><B>Enviar un aviso:</B></A></FONT>
<P>
El administrador puede enviar un anuncio a todos los salones para ser visto por todos los usuarios, usando el <B>comando announce</B>.
<P>
<I>Por ejemplo: /announce El chat se cerrar� para mantenimiento hoy a las 8pm.</I>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
Hay otro comando �til para el env�o de avisos a los sal�nes; el administrador o moderador de un sal�n puede tambi�n enviar un aviso a un sal�n o a todos los salones con el <B>comando room</B>.
<P>
<I>Por ejemplo: /room La reuni�n comienza a las 3pm.</I> o <I>/room * La reuni�n comienza a las 3pm en el sal�n de Staff.</I>
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Sacando a un usuario:</B></FONT>
<P>
El administrador puede echar a un usuario o a un moderador, y un moderador puede echar a un usuario usando el <B>comando kick</B>. En el caso de que el moderador quiera echar a un usuario, este se debe encontrar en su sal�n.
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
	El administrador puede bloquear a un usuario de cualquier sal�n, mientras que un moderador solo puede bloquear a usuarios de su sal�n.
	Tambi�n puede bloquear a un usuario para siempre de ese sal�n y del chat con el comando'<B>&nbsp;*&nbsp;</B>' que debe ser usado luego del nombre de usuario con el comando ban.
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
<I>Por ejemplo</I>, si Matias es el nombre del moderador a ser degradado: <I>/demote Matias</I> or <I>/demote * Matias</I> (Lo que generar� que sea degradado de todos los salones en los que fuera moderador).
<br /><P ALIGN="right"><A HREF="#top">Volver al comienzo</A></P>
<P>
</BODY>
</HTML>
<?php
?>