<?php
// File : german/localized.tutorial.php - plus version (17.09.2006 - rev.3)
// Original translation by Michael Schoening <m.schoening@ticketboy.de> & Reinhard Hofmann <e9625556@student.tuwien.ac.at>
// Updates, corrections and additions for the Plus version by Alexander Eisele <xaex@mail.ru>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// Get the names and values for vars sent by the script that called this one
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Deutsche Anleitung f�r<?php echo(APP_NAME." - ".APP_VERSION); ?></TITLE>
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

<P><A NAME="top"></P>
<TABLE BORDER="5" CELLPADDING="5">
<TR>
	<TD><FONT SIZE="+2">Inhalt des Tutorials</FONT></TD>
</TR>
</TABLE><br />

<P CLASS="redText">
Achtung: Netscape-Benutzer m�ssen ihre Sprache als Standardcodierung definieren, sonst wird jedes Nachrichtenzeichen durch '?' ersetzt.<br />
Dies kann so eingestellt werden: Anzeige/Zeichensatz/Auto-Detect ihre Sprache, dann Anzeige/Zeichensatz/StandardSetzen.
</P>

<?php
if (C_MULTI_LANG == "1")
{
	?>
	<A HREF="#language" CLASS="topLink">Sprachauswahl</A><br />
	<?php
};
?>
<A HREF="#login" CLASS="topLink">Einloggen im Chat</A><br />
<A HREF="#register" CLASS="topLink">Registrierung</A><br />
<A HREF="#modProfile" CLASS="topLink">Modifizieren<?php if (C_SHOW_DEL_PROF == "1") echo("/L�schen"); ?> Deines Profils</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Raum erstellen</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Verbindungsstatus</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Nachricht senden</A><br />
<A HREF="#users_list" CLASS="topLink">Die Benutzerliste</A><br />
<A HREF="#exit" CLASS="topLink">Chatraum verlassen</A><br />
<A HREF="#users_popup" CLASS="topLink">Wissen wer chattet ohne eingeloggt zu sein</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Anpassen der Chatansicht</A><br />
<P>
<A HREF="#commands" CLASS="topLink">M�glichkeiten und Befehle:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">Hilfe Befehl</A><br />
<?php
if (C_USE_SMILIES == "1")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Grafische Smilies</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#text" CLASS="topLink">Textformatierung</A><br />
	<?php
};
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Einen Benutzer in Deinen derzeitigen Raum einladen</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">Von einen Chatraum in den anderen wechseln</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Private Nachrichten</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS"topLink">Aktionen</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Andere Benutzer ignorieren</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">Informationen �ber andere Benutzer bekommen</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#save" CLASS="topLink">Nachrichten speichern</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Spezielle Befehle f�r Moderatoren und/oder den Administrator:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Sende eine Mitteilung</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#kick" CLASS="topLink">Benutzer rauswerfen</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#banish" CLASS="topLink">Einen Benutzer verbannen</A><br />
	<?php
};
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#promote" CLASS="topLink">Einen Benutzer zum Moderator ernennen</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG == "1")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Sprachauswahl:</B></A></FONT>
	<P>
	Du kannst eine Sprache w�hlen in die <?php echo(APP_NAME); ?> �bersetzt wurde, einfach durch klicken auf eine der Fahnen auf der Startseite. Im folgenden Beispiel wurde franz�sisch gew�hlt:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Fahnen zur Benutzerauswahl">
	<br /><P ALIGN="right"><A HREF="#top">Zur�ck nach oben</A></P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Login:</B></A></FONT>
<P>
Wenn Du bereits registriert bist, gib einfach Deinen Usernamen und Dein Passwort ein. Dann w�hle, welchen Chatraum Du betreten willst und dr�cke auf den Chat-Knopf.<br />
<?php
if (C_REQUIRE_REGISTER == "1")
{
	?>
	<P>
	Ansonsten mu�t Du Dich zuerst  <A HREF="#register">registrieren</A> .
	<?php
}
else
{
	?>
	<P>
	Oder Du kannst Dich <A HREF="#register">registrieren</A> oder einfach einen Raum betreten. Allerdings wird Dein Benutzername dann nicht reserviert (und andere Nutzer k�nnen diesen Namen benutzen, wenn Du die Seiten verl��t).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Zur�ck nach oben</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Um Dich zu registrieren:</B></A></FONT>
<P>
Wenn Du noch nicht registriert bist <?php if (C_REQUIRE_REGISTER == "0") echo("und es tun willst"); ?>, w�hle bitte die Registrierungsoption. Ein kleines Popup-Fenster wird erscheinen.
<P>
<UL>
	<LI>W�hle zun�chst einen Benutzernamen<?php if (!C_EMAIL_PASWD) echo(" und ein Passwort"); ?> durch Eingabe in die jeweiligen Felder. Der Benutzername ist der Name, der im Chatraum erscheinen wird. Er darf keine Leerzeichen, Kommata oder R�ckstriche enthalten(\).
<?php if (C_NO_SWEAR == "1") echo(" Es d�rfen keine \"verbotenen Worte\" enthalten sein."); ?>
	<LI>Dann f�lle die Felder Vorname, Nachname, und E-Mail-Adresse aus. Um Deinen Namen f�r den Chat zu registrieren, m�ssen alle diese Angaben gemacht werden. Du kannst die Geschlechtsauswahl �berspringen.
	<LI>Falls Du eine Homepage hast, gib diese in das daf�r vorgesehene Feld ein.
	<LI>Gib an, welche Sprache Du bevorzugt sprichst (als Hilfe f�r andere Nutzer).
	<LI>Willst Du, dass andere Deine Mailadresse lesen k�nnen? Dann w�hle das bitte aus.
	<LI>Dr�cke den Registrieren-Knopf und Du bist fertig. Willst Du Dich doch nicht registrieren, dr�cke den Stop-Knopf.
</UL>
<P>
<A NAME="modProfile"></A>Nat�rlich kannst Du als registrierter Nutzer selber jederzeit Dein Profil �ndern<?php if (C_SHOW_DEL_PROF == "1") echo("/l�schen"); ?>. Klicke einfach auf den <?php echo((C_SHOW_DEL_PROF == "0" ? "Link" : "Link")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Um einen Chatraum zu erstellen:</B></A></FONT>
	<P>
	Registrierte Benutzer k�nnen R�ume erstellen. Privatr�ume k�nnen nur von Nutzern erreicht werden, die deren Namen kennen. Du wirst niemals angezeigt, nur denen die in diesem Raum selber sind.<br />
	<P>
	Raumnamen d�rfen keine Kommata oder R�ckstriche enthalten (\).<?php if (C_NO_SWEAR == "1") echo(" Es d�rfen keine \"verbotenen Worte\" enthalten sein."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Verbindungsstatus:</B></A></FONT>
	<P>
	Das Zeichen rechts oben repr�sentiert Deinen Verbindungsstatus. Es kann drei Farben annehmen :
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Keine Verbindung"> wenn keine Verbindung n�tig ist;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Verbindung"> wenn eine Verbindung aufgebaut wird;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Verbindung fehlgeschlagen"> wenn kein Verbindungsaufbau m�glich ist.
	</UL>
	<P>
	Im letzten Fall kann durch klicken auf den roten "Knopf" versucht werden, die Verbindung wieder herzustellen.
	<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Nachrichten senden:</B></A></FONT>
<P>
Um eine Nachricht im Chatraum zu ver�ffentlichen, tippe diese in das Feld unten links und dr�cke Enter/Return um sie zu senden. Die Nachrichten aller kannst Du im Chatfenster sehen.<br />
<?php if (C_NO_SWEAR == "1") echo("Beachte, da� \"verbotene Worte\" aus der Nachricht entfernt werden."); ?>
<P>
Du kannst die Farbe Deiner Nachrichten durch Auswahl einer neuen Farbe rechts von der Texteingabe �ndern. Einfach auf die neue Farbe klicken.
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Benutzerliste (nicht Popup-Fenster):</B></A></FONT>
<P>
<OL>
	Zwei Regeln gelten f�r die Benutzerliste:<br />
	<!-- To update
	<LI>ein kleines Zeichen (<IMG SRC="images/whoisOff.gif" WIDTH=5 HEIGHT=9 BORDER=0 ALT="Whois">) wird vor registrierten Benutzernamen angezeigt und beim Klicken darauf erscheint ein <A HREF="#whois">WhoIs Popup</A> f�r diesen Benutzer, w�hrend unregistrierte Bnutzer nur ein Minuszeichen vor ihrem Namen haben;<br />
	-->
	<LI>a little icon that shows gender is displayed before the nick of a registered user (clicking on it will launch the <A HREF="#whois">whois popup</A> for this user), while unregistered users have nothing but blank spaces displayed before their nick;<br />
	<LI>der Benutzername von Moderatoren/Administrator ist kursiv geschrieben.
</OL>
<P><I>Zum Beispiel</I>, kannst Du aus dem Bild unten erkennen, dass:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="Benutzerliste">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas Administrator oder Moderator des Raumes ist;<br /><br />
		<!-- To update
		<LI>lolo und Jezek2 normale registrierte Benutzer sind;<br />
		<LI>Mary ein normaler unregistrierter Benutzer ist.
		-->
		<LI>alien (whose gender is unknown), Jezek2 and Caridad are registered users with no extra "power" for the phpMyChat room;<br /><br />
		<LI>lolo is a simple unregistered user.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="exit"><B>Chatraum verlassen:</B></A></FONT>
<P>
Um den Chat zu verlassen, klicke auf "Exit" oben rechts. Alternativ kannst Du folgenden Befehle benutzen, die Du einfach im Texteingabefeld eingibst:<br />
/exit<BR>
/bye<BR>
/quit<br>
Die Befehle k�nnen noch durch eine Nachricht erg�nzt werden, die du einfach nach dem Befehl dahinter eintippst..
<I>Beispiel:</I> /quit Bis bald!
<P>
sendet diese Nachricht "Bis bald!" im Chatfenster. Danach wirst Du automatisch abgemeldet.

<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Wissen wer chattet ohne eingeloggt zu sein:</B></A></FONT>
<P>
Du kannst auf den Link klicken, der Dir auf der Startseite die Anzahl der Benutzer momentan anzeigt. Wenn Du chattest, klicke auf das Bild  <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Benutzerliste"> in der oberen rechten Ecke des Bilder um ein Fenster zu �ffnen, da� Dir alle Benutzer und die R�ume in denen sie sich befinden anzeigt.<br />
<P>
Beim klick auf das  <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Piep">Bild am oberen Rand dieses Fensters stellt die Benachrichtigung bei neuen Nutzern an oder aus.
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<hr />
<P>
<FONT SIZE="+1"><A NAME="customize"><B>Anpassen der Chatansicht:</B></A></FONT>
<P>
Es gibt verschiedene Methoden, die Chatansicht zu �ndern. Um die Vorgaben zu �ndern, tippe den gew�nschten Befehl in das Nachrichtenfeld und dr�cke Enter/Return.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>Der <B>Clear Befehl</B> erlaubt Dir, das Hauptfenster zu l�schen und die letzten 5 Nachrichten anzuzeigen.<BR>Tippe "/clear" ohne Anf�hrungszeichen.
		<P>
		<?php
	}
	else
	{
		?>
		<LI>Der <B>Order Befehl</B> erlaubt es Dir inzustellen, ob neue Nachrichten obenhalb oder unterhalb der anderen Nachrichten erscheinen.<BR>Tippe "/order" ohne Anf�hrungszeichen.
		<P>
		<?php
	};
	?>
	<LI>Der <B>Notify Befehl</B> erlaubt die Einstellung, ob Du die Anzeige �ber das Betreten oder Verlassen neuer User in den Raum sehen kannst. Standardm��ig ist die Option <?php echo(C_NOTIFY ? "on" : "off"); ?>  und die Benachrichtigung <?php echo(C_NOTIFY ? "will" : "won't"); ?> gesehen.<BR>Tippe "/notify" ohne Anf�hrungszeichen.
	<P>
	<LI>Mit dem <B>Timestamp Befehl</B> Kannst Du die Zeit vor einer Nachricht an oder abschaltenr. Vorgabe ist <?php echo(C_SHOW_TIMESTAMP ? "on" : "off"); ?>.<BR>Tippe "/timestamp" ohne Anf�hrungszeichen.
	<P>
	<LI>Der <B>Refresh Befehl</B> stellt die Zeit ein, in der Nachrichten auf dem Bildschirm aktualisiert werden. Vorgabe hier sind <?php echo(C_MSG_REFRESH); ?> Sekunden Um die Wiederholrate zu �ndern tippe "/refresh n" ohne Anf�hrungszeichen, wobei n die Anzahl Sekunden angibt.
	<P>
	<I>Beispiel:</I> /refresh 5
	<P>
	�ndert die Rate auf 5 Sekunden. *Vorsicht, wenn n kleiner als 3 ist, wir die Wiederholrate auf 0 gesetzt  (n�tzlich, wenn Du viele Nachrichten lesen willst, ohne gest�rt zu werden)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
		<LI>Der <B>Show Befehl</B> erlaubt die Einstellung der maximal zul�ssigen Nachrichten pro Seite. Um die Vorgabe zu �ndern tippe "/show n" ohne Anf�hrungszeichen wobei n die Anzahl der sichtbaren Nachrichten darstellt..
		<P>
		<I>Zum Beispiel:</I> /show 50
		<P>
		l��t maximal 50 Nachrichten pro Seite zu.Sollten diese nicht alle sichtbar sein, so kannst Du mit dem Scrollbalken am Fensterrand scrollen.</UL>
		<?php
	}
	else
	{
		?>
		<LI>Die <B>Show und Last Befehle</B> erlauben das L�schen des Bildschirms und das lesen der letzten <I>n</I> Nachrichten die gesendet wurden. Tippe "/show n" oder "/last n" ohne Anf�hrungszeichen wobei N die Anzahl der sichbaren Nachrichten ist.
		<P>
		<I>Beispiel:</I> /show 50 or /last 50
		<P>
		l�scht das Nachrichtenfenster und zeigt die 50 neuesten Nachrichten an. Auch hier erscheint ein Scrollbalken, wenn die Anzahl der Nachrichten nicht in die Ansicht pa�t.</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
	<P>
</UL>
<hr />
<hr />
<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>M�glichkeiten und Befehle</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Help Befehl:</B></A></FONT>
<P>
Wenn Du im Chatraum bist, kannst Du auf das  <IMG SRC="images/helpOff.gif" WIDTH=15 HEIGHT=15 BORDER=0 ALT="?"> Zeichen vor der Nachrichteneingabe klicken. Du kannst auch den  <B>"/help" oder "/?" Befehl</B> eingeben (ohne Anf�hrungszeichen).
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><B>Smilies:</B></A></FONT>
	<P>Du kannst grafische Smilies in Deinen Nachrichten benutzen. Schau Dir die einzelnen M�glichkeiten unten an.
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
	<P>
	<I>Zum Beispiel</I> ergibt folgende Nachricht: "Hi Jack :)" ohne Anf�hrungszeichen folgende Nachricht: Hi Jack <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> im Nachrichtenfenster.
	<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Textformatierung:</B></A></FONT>
	<P>
	Text kann sein: fett, schr�ggestellt oder unterstrichen durch einschlie�en des Textes mit entweder den  &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; oder &LT;U&GT; &LT;/U&GT HTML tags.
	<P>
	<I>Beispiel:</I> &LT;B&GT;dieser Text&LT;/B&GT; gibt aus <B>dieser Text</B>.
	<P>
	Um einen Internet-Link zu erzeugen, tippe einfach die eMail oder die URL ein (ohne HTML Formatierung). Der Link wird automatisch erzeugt.
	<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
	<P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="invite"><B>Einen Benutzer in den derzeitigen Raum einladen:</B></A></FONT>
<P>
Du kannst den <B>invite Befehl</B> benutzen um einem Benutzer vorzuschlagen, in Deinen Raum zu wechseln.
<P>
<I>Zum Beispiel:</I> /invite Jack
<P>
schickt eine private Einladungs-Nachricht an Jack. Diese Nachricht enth�lt den Namen des Zielraumes als Link.
<P>
Beachte, dass mehr als ein Benutzername angegeben werden kann (z.B. "/invite Jack,Helen,Alf"). Diese m�ssen durch Kommata (,) ohne Abst�nde angegeben werden.
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Raumwechsel:</B></A></FONT>
<P>
Die Liste auf der Rechten Seite zeigt Chatr�ume und Benutzer an. Um den aktuellen Raum zu verlassen und in einen neuen zu wechslen, klicke einfach auf dessen Namen. Leere R�ume erscheinen nicht in der Liste. Du kannst auch den <B>Befehl "/join #Raumname"</B> ohne Anf�hrungszeichen eingeben.
<P>
<I>Beispiel:</I> /join #RedRoom
<P>
f�hrt Dich zu RedRoom.
<?php
if (C_VERSION == "2")
{
	echo(C_REQUIRE_REGISTER == "0" ? "<P>Wenn Du ein registrierter Benutzer bist, kannst Du" : "<br /><P>Du");
	?>
	 mit dem selben Befehl auch einen neuen Raum aufmachen. Du mu�t angeben, welchen Typ dieser hat: 0 steht f�r privat, 1 f�r �ffentlich (Vorgabewert).
	<P>
	<I>Beispiel:</I> /join 0 #MeinRaum
	<P>
	er�ffnet einen Privatraum mit dem Namen (nur wenn kein gleichlautender �ffentlicher besteht) und wechselt Dich dorthin.
	<P>
	Raumnamen d�rfen keine Kommata oder R�ckstriche enthalten(\).<?php if (C_NO_SWEAR == "1") echo(" Es d�rfen keine \"verbotenen Worte\" enthalten sein."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><B>Das eigene Profil im Chat �ndern:</B></FONT>
<P>
Der <B>Profile Befehl</B> �ffnet ein separates Fenster in dem Du Dein Profil �ndern kannst - au�er Nutzername und Passwort  (das geht nur von der Startseite aus.).<BR>Tippe /profile
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><B>Erneutes Aufrufen der letzten Nachricht oder des letzten Befehles:</B></FONT>
<P>
Der <B>! Befehl</B> ruft die letzte Eingabe erneut auf.<BR>Tippe /!
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><B>Einem speziellen Benutzer antworten:</B></FONT>
<P>
Wenn Du auf den gew�nschten Usernamen klickst (in der Liste rechts) erscheint "username>" im Eingabefeld. Damit ist es f�r den angesprochenen einfacher, sich auch angesprochen zu f�hlen. Diese Nachricht k�nnen ALLE lesen, sie ist nicht geheim.
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="private"><B>Private Nachrichten:</B></A></FONT>
<P>
Um eine private Nachricht an einen Benutzer in Deinem Ruam zu schicken, tippen den <B>Befehl "/msg Benutzername Nachrichtentext" oder "/to Benutzername Nachrichtentext"</B> ohne Anf�hrungszeichen.
<P>
<I>Zum Beispiel, wenn Jack der Benutzername ist:</I> /msg Jack Wie geht es Dir?
<P>
Die Nachricht erscheint bei Dir und Jack, aber nicht bei den anderen.
<P>
Beachte, dass durch klicken auf den Sendernamen einer Nachricht automatisch dieser Befehl ins Eingabefeld geschrieben wird.
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Aktionen:</B></A></FONT>
<P>
Um zu beschreiben, was Du grade tust, kannst Du den <B>Befehl "/me Tat"</B> ohne Anf�hrungszeichen eingeben.
<P>
<I>For example:</I> If Jack sends the message "/me is smoking a cigarette" the message frame will shown "<B>* Jack</B>" is smoking a cigarette".
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Andere Benutzer ignorieren:</B></A></FONT>
<P>
Um die Nachrichten anderer zu ignorieren nutze den <B>Befehl "/ignore username"</B> ohne Anf�hrungszeichen.
<P>
<I>Beispiel:</I> /ignore Jack
<P>
Von nun an erscheinen die Nachrichten von Jack nicht mehr auf Deinem Bildschirm.
<P>
Um eine Liste von Nutzern zu sehen, die Du ignorierst, nutze den <B>Befehl "/ignore"</B> ohne Anf�hrungszeichen.
<P>
Um den Nutzer nicht mehr zu ignorieren tippe den <B>Befehl "/ignore - username"</B> ohne Anf�hrungszeichen ein, wobei "-" ein Minuszeichen ist. <P>
<P>
<I>Beispiel:</I> /ignore - Jack
<P>
Nun werden wieder alle Nachrichten von Jack angezeigt, inklusive der Nachrichten, die er w�hrend Deiner Ignoranz eingegeben hat.
L��t Du einen Namen nach dem Minuszeichen weg, werden alle wieder normal angezeigt.
<P>
Beachte, dass Du mehrere Benutzernamen angeben kannst (z.B. "/ignore Jack,Helen,Alf" oder "/ignore - Jack,Alf"). Diese m�ssen durch Kommata (,) ohne Abst�nde getrennt werden.
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Nutzerinformationen bekommen:</B></A></FONT>
<P>
Tippe den <B>Befehl "/whois username"</B>ohne Anf�hrungszeichen, um Informationen �ber den Nutzer zu bekommen.
<P>
<I>Beispiel:</I> /whois Jack
<P>
Ein Popup-Fenster erscheint, in dem die Informationen �ber Jack stehen.
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Nachrichten speichern:</B></A></FONT>
	<P>
	Um Nachrichten in ein lokales HTML-File zu exportieren (Benachrichtigungen ausgeschlossen) , tippe den <B>Befehl "/save n"</B> ohne Anf�hrungszeichen.
	<P>
	<I>Beispiel:</I> /save 5
	<P>
	wobei 5 die Zahl der zu speichernden Nachrichten ist. Wird n nicht angegeben, werden alle Nachrichten des aktuellen Raumes gepeichert.
	<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />
<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Befehle nur f�r Moderatoren und/oder Administratoren</U></B></A></FONT>

<P>
<FONT SIZE="+1"><A NAME="announce"><B>Mitteilung senden:</B></A></FONT>
<P>
Der Administrator kann an alle eine Nachricht senden, egal wo Du Dich befindest, mit dem <B>announce Befehl</B>.
<P>
<I>Beispiel:</I> /announce Das Chatsystem wird wegen �berarbeitung um 5 Uhr heruntergefahren .</I>
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
Es gibt einen weiteren n&uuml;tzlichen Ansagebefehl; Der Administrator oder die Moderatoren k&ouml;nnen an alle User im Raum oder allen R&auml;umen eine Ansage schicken mit dem Befehl <B>room</B>.
<P>
<I>Zum Beispiel: /room Das Treffen findet um 15 Uhr statt.</I> oder <I>/room * Das Treffen findet um 15 Uhr im Personal-Raum.</I>
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="kick"><B>Benutzer rauswerfen:</B></FONT>
<P>
Moderatoren k�nnen Benutzer und der Administrator kann Nutzer oder Moderatoren mit dem <B>kick Befehl</B> rauswerfen. Moderatoren m�ssen dazu im selben Raum wie der rauszuwerfende Benutzer sein.
<P>
<I>Zum Beispiel</I>, wenn Jack der Name des Users ist, der gekickt werden sollte:  <I>/kick Jack</I> oder <I>/kick Jack Grund des Verweises</I> Der Grund des Rauswurfs k&ouml;nnte z.b. "wegen Spam" sein.!
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Benutzer verbannen:</B></A></FONT>
	<P>
	Moderatoren k�nnen Benutzer verbannen, der Administrator kann zus�tzlich Moderatoren verbannen mit dem <B>ban Befehl</B>.<br />
	Der Administrator kann auch Benutzer anderer R�ume verbannen, wahlweise auch dauerhaft vom gesamten Chat mit der '<B>&nbsp;*&nbsp;</B>' Einstellung vor dem zu verbannenden Benutzernamen.
	<P>
	<I>Zum Beispiel</I>, wenn Jack der zu verbannende Benutzer ist : <I>/ban Jack</I> oder <I>/ban * Jack</I>
	<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Ernennen/Degradieren eines Users zum/vom Moderator:</B></A></FONT>
<P>
Moderatoren und Administratoren k�nnen andere Benutzer mit dem <B>promote Befehl</B> zu Moderatoren ernennen.
<P>
<I>Beispiel: /promote Jack</I>
<P>
Nur ein Administrator ist berechtigt dem Moderator die Rechte zu entziehen mit Hilfe des <B>demote Befehls</B>.
<P>
<I>Zum Beispiel</I>, wenn Jack der Name des Moderators ist, der degradiert werden sollte: <I>/demote Jack</I> oder <I>/demote * Jack</I> (entzieht Moderatorrechte in diesem Raum oder allen R&auml;umen).
<br /><P ALIGN="right"><A HREF="#top">Zur�ck zum Anfang</A></P>
<P>
</BODY>
</HTML>
<?php
?>