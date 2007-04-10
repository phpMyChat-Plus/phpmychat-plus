<?php
// File : romanian/localized.tutorial.php - plus version (17.09.2006 - rev.3)
//Translated and updated to Plus version by Ciprian Murariu <ciprianm@yahoo.com>

// Get the names and values for vars sent by the script that called this one
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

// Color Input Box mod by Ciprian - you MUST delete this line if you uninstall this mod
require("./lib/index.lib.php");
if (isset($HTTP_COOKIE_VARS["CookieStatus"])) $CookieStatus = $HTTP_COOKIE_VARS["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Tutorial �n limba rom�n� (incomplet) pentru <?php echo(APP_NAME." - ".APP_VERSION); ?></TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-2">
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

<P><A NAME="top"></P>
<TABLE BORDER="5" CELLPADDING="5" ALIGN="center">
<TR>
	<TD ALIGN="center"><FONT SIZE="+2">- Tutorial de utilizare a <?php echo(APP_NAME." - ".APP_VERSION); ?> -</FONT><br /><I>Traducerea �i adaptarea de Ciprian Murariu (ciprianmp@yahoo.com) - Bucure�ti, &copy; 2005-<?php echo(date(Y)); ?></I></TD>
</TR>
</TABLE><br />

<P CLASS="redText">
Atentie: Utilizatorii Netscape trebuie s� �i defineasc� limba rom�n� ca mod automat de encoding, altfel fiecare caracter din mesaje va fi inlocuit cu un '?'. Aceasta se poate face astfel: View/CharacterSet/Rom�n� Auto-Detect, apoi View/CharacterSet/SetDefault.
</P>

<?php
if (C_MULTI_LANG == "1")
{
	?>
	<A HREF="#language" CLASS="topLink">Alegerea limbii</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Logarea la Chat</A><br />
<A HREF="#register" CLASS="topLink">�nregistrarea</A><br />
<A HREF="#modProfile" CLASS="topLink">Modificarea<?php if (C_SHOW_DEL_PROF == "1") echo("/�tergerea"); ?> profilului propriu</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Crearea unei camere</A><br />
	<?php
}
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Explicarea st�rii conexiunii</A><br />
	<?php
}
?>
<A HREF="#sending" CLASS="topLink">Trimiterea Mesajelor</A><br />
<A HREF="#users_list" CLASS="topLink">Explicarea Listei de Utilizatori</A><br />
<A HREF="#exit" CLASS="topLink">P�r�sirea unei Camere de chat</A><br />
<A HREF="#users_popup" CLASS="topLink">Cum afli cine e pe chat, f�r� a te loga</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Personalizarea aspectului Camerei de Chat</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Op�iuni �i Comenzi:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">Comanda Ajutor</A><br />
<!-- Avatar System Start. -->
<?php
if (C_NUM_AVATARS != 0) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">Avatar-uri</A><br />
<?php
}
?>
<!-- Avatar System End.  -->
<?php
if (C_USE_SMILIES == "1")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">Z�mbete grafice (Emoticons, Smilies)</A><br />
	<?php
}
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">Formatarea Textului</A><br />
	<?php
}
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">Invitarea unui utilizator s� intre �n camera ta de chat</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">Trecerea dintr-o camer� de chat �ntr-alta</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">Mesaje Private</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">Ac�iuni</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">Ignorarea altor Utilizatori</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">Aflarea datelor publice ale altor Utilizatori</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">Salvarea mesajelor</A><br />
	<?php
}
?>
<P>
<A HREF="#moderator" CLASS="topLink">Comenzi speciale numai pentru moderatori �i/sau administrator:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">Trimiterea unui anun�</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">Eliminarea unui Utilizator</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">Blocarea unui Utilizator</A><br />
	<?php
}
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">Promovarea/demiterea unui utilizator ca moderator</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG == "1")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Alegerea limbii:</B></A></FONT>
	<P>
	Po�i alege una dintre limbile �n care <?php echo(APP_NAME); ?> a fost tradus, ap�s�nd pe unul dintre steagurile de pe prima pagin�. �n exemplul de mai jos, un utilizator �i selecteaza limba Francez�:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Steaguri pentru selectarea limbii">
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Logarea la chat:</B></A></FONT>
<P>
Dac� te-ai �nregistrat deja, pur �i simplu introdu-�i porecla �i parola. Apoi selecteaz� �n ce camer� de chat ai vrea s� intri �i apas� butonul Chat.<br />
<?php
if (C_REQUIRE_REGISTER == "1")
{
	?>
	<P>
	Altfel, va trebui s� te <A HREF="#register">�nregistrezi</A> mai �nt�i.
	<?php
}
else
{
	?>
	<P>
	Altfel poti s� te <A HREF="#register">�nregistrezi</A> mai �nt�i sau s� intri pe Chat cu porecla aleas�, numai c� nu �i se va rezerva acea porecl� (un alt utilizator va putea folosi aceea�i porecla dupa ce vei ie�i de pe Chat).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Pentru �nregistrare:</B></A></FONT>
<P>
Dac� nu te-ai �nregistrat deja, <?php if (C_REQUIRE_REGISTER == "0") echo("�i vrei s� o faci"); ?>, alege op�iunea �nregistreaz�-te. Va ap�rea o mic� fereastr� pop-up.
<P>
<UL>
	<LI>Mai �nt�i, alege-�i o porecl�<?php if (!C_EMAIL_PASWD) echo(" �i o parol�"); ?> �n c�mpurile (c�su�ele) corespunz�toare. Porecla aleas� va fi numele cu care vei fi ar�tat �n mod automat pe chat. Nu poate con�ine spa�ii, virgule sau backslash-uri (\).
<?php if (C_NO_SWEAR == "1") echo(" Nu este permis� utilizarea \"cuvintelor obscene\"."); ?>
	<LI>Apoi, introdu-�i prenumele, numele de familie �i adresa de email. Pentru a te putea �nregistra pe chat, aceste informa�ii sunt obligatorii. Informa�ia privind sexul este op�ional� (de�i, �n func�ie de aceast� alegere, o mic� imagine te va particulariza pe chat ca b�iat sau fat�).
	<LI>Dac� ai o pagin� personal�, po�i s� introduci URL-ul pentru a fi vizitat� �i de ceilal�i utilizatori.
	<LI>C�mpul Limba poate ajuta pe ceilalti �n discu�iile viitoare cu tine. Ei vor sti �n ce limb� sa �i se adreseze.
	<LI>�n cele din urm�, dac� vrei ca ceilal�i participan�i s�-�i cunoasc� adresa de email, bifeaz� c�su�a de l�ng� expresia "Arat� e-mailul la comanda /whois". Dac� nu vrei s�-�i fie cunoscut emailul, las� c�su�a nebifat�.
	<LI>Apoi, apas� butonul �nregistreaza-te �i contul ��i va fi creat. Pentru a te opri f�r� s� te �nregistrezi, apas� �nchide.
</UL>
<P>
<A NAME="modProfile"></A>Bine�n�eles, utilizatorii care s-au �nregistrat �i vor putea modifica<?php if (C_SHOW_DEL_PROF == "1") echo("/�terge"); ?> profilul personal ap�s�nd pe <?php echo((C_SHOW_DEL_PROF == "0" ? "butonul corespunz�tor" : "butoanele corespunz�toare")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Pentru a crea o camer�:</B></A></FONT>
	<P>
	Numai utilizatorii �nregistra�i pot crea camere. Camerele private vor putea fi accesate numai de c�tre utilizatorii care cunosc numele camerei �i nu vor fi v�zu�i dec�t de c�tre participan�ii din camera respectiv�.<br />
	<P>
	Numele camerei nu poate con�ine virgule sau backslash-uri (\).<?php if (C_NO_SWEAR == "1") echo(" Nu este permis� utilizarea \"cuvintelor obscene\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<P>
	<hr />
	<?php
}
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Explicarea st�rii conexiunii:</B></A></FONT>
	<P>
	Un semn reprezent�nd starea conexiunii tale este afi�at �n col�ul din dreapta sus al ecranului. Poate ar�ta �n trei feluri:
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="F�r� conexiune"> c�nd nu e nevoie de nici o conexiune;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Conectat"> c�nd e stabilit� o conexiune;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Conectare e�uat�"> c�nd conexiunea a e�uat.
	</UL>
	<P>
	�n cel de-al treilea caz, ap�sarea "butonului" ro�u va lansa o nou� �ncercare de conectare (refresh).
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Trimiterea mesajelor:</B></A></FONT>
<P>
Pentru a afi�a un mesaj �n camera de chat, tasteaz� textul �n c�su�a text din col�ul stanga jos �i apas� tasta Enter/Return pentru a-l trimite. Mesajele tuturor utilizatorilor se vor derula �n fereastra de chat.<br />
<?php if (C_NO_SWEAR == "1") echo("�ine�i cont c� \"�njur�turile\" vor fi �nlocuite cu simboluri arbitrare de tipul \"@#$%\"."); ?>
<P>
Po�i schimba culoarea textului afi�at aleg�nd o alt� culoare din lista de culori din dreapta c�su�ei pentru introducerea textului. Anumite culori (ro�u, albastru) pot fi rezervate numai utilizatorilor cu drepturi speciale (administratori, moderatori).
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Explicarea listei de utilizatori (nu �i pentru fereastra tip popup):</B></A></FONT>
<P>
<OL>
	Au fost definite dou� reguli de baz� pentru lista de utilizatori:<br />
	<LI>o mic� imagine reprezent�nd sexul (b�iat sau fat�) este afi�at� �naintea poreclei unui utilizator �nregistrat (ap�s�nd pe acea imagine va lansa comanda <A HREF="#whois">whois popup</A>, deschiz�nd un popup cu informa�ii despre profilul utilizatorului respectiv), �n timp ce utilizatorii ne�nregistra�i, vor avea doar un spa�iu �naintea poreclei;<br />
	<LI>porecla administratorului sau a moderatorilor va fi afi�at� cu caractere italice <I>(�nclinate)</I>.
</OL>
<P><I>Spre exemplificare</I>, �n imaginea de mai jos po�i �n�elege urm�toarele:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas este administrator sau unul dintre moderatorii camerei phpMyChat;<br /><br />
		<LI>alien (de sex necunoscut), Jezek2 �i Caridad sunt utilizatori �nregistra�i, f�r� "extra power" pentru camera phpMyChat;<br /><br />
		<LI>lolo este un simplu utilizator ne�nregistrat (vizitator, guest).
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>P�r�sirea unei camere de chat:</B></A></FONT>
<P>
Pentru a p�r�si camera, f� click pe "Ie�ire". Po�i face acela�i lucru utiliz�nd comenzile de mai jos �n c�su�a pentru mesaje (acest lucru poate fi util mai ales pentru cazul �n care mouse-ul nu r�spunde la comenzi):<br />
/exit<br>
/bye<br>
/quit<br>
Oricare dintre aceste comenzi pot fi completate cu un mesaj pe care dori�i s� �l trimite�i �naintea ie�irii din camer�.
<I>Exemplu :</I> /quit La revedere!
<P>
va trimite mesajul "La revedere!" pentru a fi citit de c�tre ceilal�i participan�i, iar apoi te va scoate din camer�.

<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Cum afli cine e pe chat, f�r� a te loga:</B></A></FONT>
<P>
Po�i ap�sa pe link-ul din pagina de start care arat� num�rul de utilizatori conecta�i pe chat, sau, dac� ai intrat deja �n camera de chat, apas� pe imaginea <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="L_DETACH"> din col�ul dreapta-sus (sub Ie�ire) pentru a deschide o fereastr� separat� ce va afi�a lista utilizatorilor conectati �i camerele �n care se afl� ace�tia, actualizat� aproape �n timp real.<br />
Titlul acestei pagini con�ine poreclele utilizatorilor, dac� sunt mai pu�in de trei; dac� sunt mai mul�i, titlul va con�ine num�rul utilizatorilor �i camerele deschise.
<P>
Ap�s�nd pe imaginea <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="L_BEEP"> din partea de sus a acestui popup va activa/dezactiva sunetele de �n�tiin�are la intrarea unui nou utilizator �n camer�.
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Customizing the Chat View:</B></A></FONT>
<P>
There are many different ways to customize the look of the Chat. To change settings, simply type the appropriate command into your text box and press the Enter/Return key.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>The <B>Clear command</B> allows you to clean the main chat screen and display the last 5 messages sent on your screen.<br>Type "/clear" without quotes.
		<P>
		<?php
	}
	else
	{
		?>
		<LI>The <B>Order command</B> allows you to toggle between having new messages appear at the top of the screen or at the bottom.<br>Type "/order" without quotes.
		<P>
		<?php
	}
	?>
	<LI>The <B>Notify command</B> allows you to toggle on or off the option of seeing the notices when other users enter or exit the chat room. By default this option is <?php echo(C_NOTIFY ? "on" : "off"); ?> and the notices <?php echo(C_NOTIFY ? "will" : "won't"); ?> be seen.<br>Type "/notify" without quotes.
	<P>
	<LI>The <B>Timestamp command</B> allows you to toggle on or off the option of seeing the time the message was posted before each message and the server time in the status bar. By default this option is <?php echo(C_SHOW_TIMESTAMP ? "on" : "off"); ?>.<br>Type "/timestamp" without quotes.
	<P>
	<LI>The <B>Refresh command</B> allows you to adjust the rate at which the posted message are refreshed on your screen. The default rate is currently <?php echo(C_MSG_REFRESH); ?> seconds. To change the rate type "/refresh n" without quotes where n is the time in seconds of the new refresh rate.
	<P>
	<I>For example:</I> /refresh 5
	<P>
	will change the rate to 5 seconds. *Beware, if n is set to less than 3, the refresh is reset not to refresh at all (usefull when you want to read lots of old messages without being disturbed)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
		<LI>The <B>Show command</B> allows you to adjust the number of messages viewable on your screen. To change the default number, type "/show n" without quotes where n is the number of viewable messages.
		<P>
		<I>For example:</I> /show 50
		<P>
		will cause the 50 newest messages to be viewable on your screen. If all of the messages cannot be displayed within the message box, a scroll bar will appear on the right side of the message box.</UL>
		<?php
	}
	else
	{
		?>
		<LI>The <B>Show and Last commands</B> allow you to clean the screen and display the last <I>n</I> messages sent on your screen. Type "/show n" or "/last n" without quotes where n is the number of viewable messages.
		<P>
		<I>For example:</I> /show 50 or /last 50
		<P>
		will clean the message frame and cause the 50 newest messages to be viewable on your screen. If all of the messages cannot be displayed within the message box, a scroll bar will appear on the right side of the message box.</UL>
		<?php
	}
	?>
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Features and Commands</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Help command:</B></A></FONT>
<P>
Once inside a chat room, you can lauch a help popup by clicking on the <IMG SRC="images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="Help"> image that sits just before the message box. You can also type the <B>"/help" or "/?" commands</B> in the message box.
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_NUM_AVATARS != 0) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars" id="avatars"><B>Avatars:</B></A></FONT>
<P> Avatars are graphic image icons that represent chatters. Only registered
  users may change their avatar. Registered users may open their Profile (see
  /PROFILE command) and click on the avatar image to select from a menu of images,
  or to input a URL to a graphic image available anywhere on the internet. Images
  should be browser-viewable (.gif, .jpg, etc. ) 32 x 32 pixel graphic files
  for best display.
<P>Clicking on a person't
    avatar in the message display area places their nick name in the message
  input area so that you can let them know that your message is addressed to
  them.
    Clicking on another user's avatar on  the user's list will
  bring up the /whois information display for that user.
Clicking on your own avatar will invoke the /profile command, if you are registered.
If you are not registered, clicking on your own (system default) avatar will
bring up an alert to encourage you to register.<P ALIGN="right"><A HREF="#top">Back to the top</A></P>
<P>
<?php
}
?>
<!-- Avatar System End. -->
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
	<FONT SIZE="+1"><A NAME="smilies"><B>Smilies:</B></A></FONT>
	<P>You may have graphical smilies inside your messages. See bellow the code you have to type into a message to obtain each one of these similes.
	<P>
	<I>For example</I>, sending the text "Hi Jack :)" without quote will display the message Hi Jack <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> in the main frame.
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
	}
	unset($ResultTbl);
	?>
	</TABLE>
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<P>
	<hr />
	<?php
}

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Text Formatting:</B></A></FONT>
	<P>
	Text can be bolded, italicized or underlined by encasing the applicable sections of your text with either the &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; or &LT;U&GT; &LT;/U&GT HTML tags.
	<P>
	<I>For example</I>, &LT;B&GT;this text&LT;/B&GT; will produce <B>this text</B>.
	<P>
	To create a hyperlink for an e-mail address or URL, type the address (without any HTML tags). The hyperlink will be created automatically.
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<P>
	<P>
	<hr />
	<?php
}
?>

<!-- Color Input Box mod by Ciprian start -->
<P>
<FONT SIZE="+1"><A NAME="colors"><B><?php echo(L_COL_TUT); ?></B></A></FONT>
<P>
<b><?php echo(L_COL_HELP_SUB1); ?></b><br /><?php echo(L_COL_HELP_P1); ?><br /><?php echo(L_COLOR_HEAD_SETTINGS); ?><br /><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("Administrator"); elseif ($CookieStatus == "m") echo("Moderator"); elseif ($CookieStatus == "u") echo("Guest (Normal)"); else echo("Registered (Normal)");?></b>.<br /><br />
</P>
<P>
<b><?php echo(L_COL_HELP_SUB2); ?></b><br /><?php echo(L_COL_HELP_P2); ?>
</P>
<P>
<b><?php echo(L_COL_HELP_SUB3); ?></b><br /><?php echo(L_COL_HELP_P3); ?><br /><br /><center><?php echo(COLOR_LIST); ?></center><br /><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Back to the top</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Invite someone to join your current chat room:</B></A></FONT>
<P>
You can use the <B>invite command</B> to invite an user to join the room you are chatting in.
<P>
<I>For example:</I> /invite Jack
<P>
will send a private message to Jack suggesting him to join you in your current chat room. This message contains the name of the target room and this name appears as a link.
<P>
Note that you can put more than one username in the invite command (eg "/invite Jack,Helen,Alf"). They must be splitted by comma (,) without spaces.
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Changing rooms:</B></A></FONT>
<P>
The list to the right of the screen provides a list of chat rooms and the users who are currently in that room. To leave the room you are in and move into one of those rooms, simply click once on the name of that room. Empty rooms do not appear on this list. You may move into an empty room by typing the <B>command "/join #roomname"</B> without quotes.
<P>
<I>For example:</I> /join #RedRoom
<P>
will move you into the RedRoom.
<?php
if (C_VERSION == "2")
{
	echo(C_REQUIRE_REGISTER == "0" ? "<P>If you're a registered user, you" : "<br /><P>You");
	?>
	 may also create a new room with this same command. But then you have to specify its type: 0 stands for private, 1 for public (default value).
	<P>
	<I>For example:</I> /join 0 #MyRoom
	<P>
	will create a new private room (assuming a public one has not already been created with that name) called MyRoom and move you into it.
	<P>
	Room's name cannot contain comma or backslash (\).<?php if (C_NO_SWEAR == "1") echo(" It can no more contains \"swear words\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Modifying his own profile inside the chat:</B></FONT>
<P>
The <B>Profile command</B> creates a separate pop-up window in which you can edit your user profile and modify it except your nick and password (you have to use the link at the start page to do this).<br>Type /profile
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Recalling the last message or command you have submitted:</B></FONT>
<P>
The <B>! command</B> recalls the last message or command you have submitted.<br>Type /!
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Responding to a specific user:</B></FONT>
<P>
Clicking once on the name of another user from the list (to the right of the screen) will cause their "username>" to appear in your text box. This feature allows you to easily direct a public message to a user, perhaps in response to something he or she has posted above.
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Private messages:</B></A></FONT>
<P>
To send a private message to another user currently in your chat room, type the <B>command "/msg username messagetext" or "/to username messagetext"</B> without quotes.
<P>
<I>For example, where Jack is the username:</I> /msg Jack Hi there, how are you?
<P>
The message will appear to Jack and yourself, but no other users will see the message.
<P>
Note that clicking on the nick of a message sender in the main frame will automatically add this command to the input field for messages.
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Actions:</B></A></FONT>
<P>
To describe what you're doing you can use the <B>command "/me action"</B> without quotes.
<P>
<I>For example:</I> If Jack sends the message "/me is smoking a cigarette" the message frame will shown "<B>* Jack</B> is smoking a cigarette".
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignoring other users:</B></A></FONT>
<P>
To ignore all of the posts by another user, type the <B>command "/ignore username"</B> without quotes.
<P>
<I>For example:</I> /ignore Jack
<P>
From that time onward, no messages by the user Jack will display on your screen.
<P>
To have a list of the users whose messages are ignored, just type the <B>command "/ignore"</B> without quotes.
<P>
To resume display of message by an ignored user, type the <B>command "/ignore - username"</B> without quotes where "-" is a hyphen. <P>
<P>
<I>For example:</I> /ignore - Jack
<P>
Now all the messages by Jack posted during the current chat session will be displayed on your screen, including those messages posted by Jack before you typed this command.
If you don't specify an username after the hyphen, your "ignored list" will be cleaned.
<P>
Note that you can put more than one username in the ignore command (eg "/ignore Jack,Helen,Alf" or "/ignore - Jack,Alf"). They must be splitted by comma (,) without spaces.
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Getting information about other Users:</B></A></FONT>
<P>
To see public information about another user, type the <B>command "/whois username"</B> without quotes.
<P>
<I>For Example:</I> /whois Jack
<P>
where 'Jack' is the username. This command will create a separate pop-up window that will display the publically available information about that user.
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Save messages:</B></A></FONT>
	<P>
	To export messages (notification ones excluded) to a local HTML file, type the <B>command "/save n"</B> without quotes.
	<P>
	<I>For Example:</I> /save 5
	<P>
	where '5' is the number of messages to save. If n is not specified, all available messages sent to the current room will be taken into account.
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<P>
	<hr />
	<?php
}
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Commands for the adminstrator and/or moderators only</U></B></A></FONT>

<P>
<FONT SIZE="+1"><A NAME="announce"><B>Send an announcement:</B></A></FONT>
<P>
The administrator may send an announcement to all users whatever the the room they are chatting into with the <B>announce command</B>.
<P>
<I>For example: /announce The chat system is going down for maintenance tonight at 8pm.</I>
<P>
There is another useful announcement like command for roleplaying chats; the administrator or moderators in a room may also send an announcement to all users in current room or all the rooms with the <B>room command</B>.
<P>
<I>For example: /room The meeting starts at 15 pm.</I> or <I>/room * The meeting starts at 15 pm in the Staff room.</I>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Kicking an user:</B></FONT>
<P>
Moderators can kick an user and the administrator can kick an user or a moderator with the <B>kick command</B>. Except for the administrator, the user to be kicked must be in the current room.
<P>
<I>For example</I>, if Jack is the name of the user to kick away:<I> /kick Jack</I> or <I>/kick Jack reason of kicking</I> The "reason of kicking" can be any text e.g. "for spamming!"
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Banish a user:</B></A></FONT>
	<P>
	Moderators can banish an user and the administrator can banish an user or a moderator with the <B>ban command</B>.<br />
	The administrator can banish an user from another room than the one he is chatting into. He can also banish an user forever and from the chat as a whole with the '<B>&nbsp;*&nbsp;</B>' setting that must be inserted before the nick of the user to be banished.
	<P>
	<I>For example</I>, if Jack is the name of the user to banish: <I>/ban Jack</I> or <I>/ban * Jack</I>
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Promote/Demote a user to/from moderator:</B></A></FONT>
<P>
Moderators and the administrator can promote an other user to moderator with the <B>promote command</B>.
<P>
<I>For example</I>, if Jack is the name of the user to promote: <I>/promote Jack</I>
<P>
Only the administrator can access the opposite feature (reduce a moderator to simple user) at a dedicated page. There is no command to do it.
<P>
<I>For example</I>, if Jack is the name of the moderator to demote: <I>/demote Jack</I> or <I>/demote * Jack</I> (will demote him from current or all the rooms).
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
</BODY>
</HTML>
<?php
?>