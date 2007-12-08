<?php
// File : german/localized.tutorial.php - to be updated to plus version (09.09.2007 - rev.7)
// Original translation by Michael Schoening <m.schoening@ticketboy.de> & Reinhard Hofmann <e9625556@student.tuwien.ac.at>
// Updates, corrections and additions for the Plus version by Alexander Eisele <xaex@xaex.de> && Thomas Pschernig <tpsde1970@aol.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	}
}

require("./lib/index.lib.php");
if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Deutsche Anleitung für<?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Deutsche Anleitung für <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</B></FONT></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Inhalt des Tutorials</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Sprachauswahl</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Einloggen im Chat</A><br />
<A HREF="#register" CLASS="topLink">Registrierung</A><br />
<A HREF="#modProfile" CLASS="topLink">Modifizieren<?php if (C_SHOW_DEL_PROF) echo("/Löschen"); ?> Deines Profils</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Raum erstellen</A><br />
	<?php
}
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Verbindungsstatus</A><br />
	<?php
}
?>
<A HREF="#sending" CLASS="topLink">Nachricht senden</A><br />
<A HREF="#users_list" CLASS="topLink">Die Benutzerliste</A><br />
<A HREF="#exit" CLASS="topLink">Chatraum verlassen</A><br />
<A HREF="#users_popup" CLASS="topLink">Wissen wer chattet ohne eingeloggt zu sein</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Anpassen der Chatansicht</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Möglichkeiten und Befehle:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">Hilfe Befehl</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">Avatar</A><br />
<?php
}
?>
<!-- Avatar System End.  -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Grafische Smilies</A><br />
	<?php
}
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#text" CLASS="topLink">Textformatierung</A><br />
	<?php
}
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Einen Benutzer in Deinen derzeitigen Raum einladen</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">Von einen Chatraum in den anderen wechseln</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeprofile" CLASS="topLink">Das eigene Profil im Chat ändern</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#recall" CLASS="topLink">Erneutes Aufrufen der letzten Nachricht oder des letzten Befehles</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#respond" CLASS="topLink">Einem speziellen Benutzer antworten</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Private Nachrichten</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS="topLink">Aktionen</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Andere Benutzer ignorieren</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">Informationen über andere Benutzer bekommen</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#save" CLASS="topLink">Nachrichten speichern</A><br />
	<?php
}
?>
<P>
<A HREF="#moderator" CLASS="topLink">Spezielle Befehle für Moderatoren und/oder den Administrator:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Sende eine Mitteilung</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#kick" CLASS="topLink">Benutzer rauswerfen</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#banish" CLASS="topLink">Einen Benutzer verbannen</A><br />
	<?php
}
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#promote" CLASS="topLink">Einen Benutzer zum Moderator ernennen</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Sprachauswahl:</B></A></FONT>
	<P>
	Du kannst eine Sprache wählen in die <?php echo(APP_NAME); ?> übersetzt wurde, einfach durch klicken auf eine der Fahnen auf der Startseite. Im folgenden Beispiel wurde französisch gewählt:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Fahnen zur Benutzerauswahl">
	<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Login:</B></A></FONT>
<P>
Wenn Du bereits registriert bist, gib einfach Deinen Usernamen und Dein Passwort ein. Dann wähle, welchen Chatraum Du betreten willst und drücke auf den '<?php echo(L_SET_14); ?>' Knopf.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
	<P>
	Ansonsten mußt Du Dich zuerst  <A HREF="#register">registrieren</A> .
	<?php
}
else
{
	?>
	<P>
	Oder Du kannst Dich <A HREF="#register">registrieren</A> oder einfach einen Raum betreten. Allerdings wird Dein Benutzername dann nicht reserviert (und andere Nutzer können diesen Namen benutzen, wenn Du die Seiten verläßt).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Um Dich zu registrieren:</B></A></FONT>
<P>
Wenn Du noch nicht registriert bist<?php if (!C_REQUIRE_REGISTER) echo(" und es tun willst"); ?>, wähle bitte die Registrierungsoption. Ein kleines Popup-Fenster wird erscheinen.
<P>
<UL>
	<LI>Wähle zunächst einen Benutzernamen<?php if (!C_EMAIL_PASWD) echo(" und ein Passwort"); ?> durch Eingabe in die jeweiligen Felder. Der Benutzername ist der Name, der im Chatraum erscheinen wird. Er darf keine Leerzeichen, Kommata oder Rückstriche enthalten(\).
<?php if (C_NO_SWEAR) echo(" Es dürfen keine \"verbotenen Worte\" enthalten sein."); ?>
	<LI>Dann fülle die Felder Vorname, Nachname, und E-Mail-Adresse aus. Um Deinen Namen für den Chat zu registrieren, müssen alle diese Angaben gemacht werden. Du kannst die Geschlechtsauswahl überspringen.
	<LI>Falls Du eine Homepage hast, gib diese in das dafür vorgesehene Feld ein.
	<LI>Gib an, welche Sprache Du bevorzugt sprichst (als Hilfe für andere Nutzer).
	<LI>Willst Du, dass andere Deine Mailadresse lesen können? Dann wähle das bitte aus.
	<LI>Drücke den Registrieren-Knopf und Du bist fertig. Willst Du Dich doch nicht registrieren, drücke den Stop-Knopf.
</UL>
<P>
<A NAME="modProfile"></A>Natürlich kannst Du als registrierter Nutzer selber jederzeit Dein Profil ändern<?php if (C_SHOW_DEL_PROF) echo("/löschen"); ?>. Klicke einfach auf den <?php echo((!C_SHOW_DEL_PROF ? "Link" : "Link")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Um einen Chatraum zu erstellen:</B></A></FONT>
	<P>
	Registrierte Benutzer können Räume erstellen. Privaträume können nur von Nutzern erreicht werden, die deren Namen kennen. Du wirst niemals angezeigt, nur denen die in diesem Raum selber sind.<br />
	<P>
	Raumnamen dürfen keine Kommata oder Rückstriche enthalten (\).<?php if (C_NO_SWEAR) echo(" Es dürfen keine \"verbotenen Worte\" enthalten sein."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
	<P>
	<hr />
	<?php
}
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Verbindungsstatus:</B></A></FONT>
	<P>
	Das Zeichen rechts oben repräsentiert Deinen Verbindungsstatus. Es kann drei Farben annehmen :
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Keine Verbindung"> wenn keine Verbindung nötig ist;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Verbindung"> wenn eine Verbindung aufgebaut wird;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Verbindung fehlgeschlagen"> wenn kein Verbindungsaufbau möglich ist.
	</UL>
	<P>
	Im letzten Fall kann durch klicken auf den roten "Knopf" versucht werden, die Verbindung wieder herzustellen.
	<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
	<P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Nachrichten senden:</B></A></FONT>
<P>
Um eine Nachricht im Chatraum zu veröffentlichen, tippe diese in das Feld unten links und drücke Enter/Return um sie zu senden. Die Nachrichten aller kannst Du im Chatfenster sehen.<br />
<?php if (C_NO_SWEAR) echo("Beachte, daß \"verbotene Worte\" aus der Nachricht entfernt werden."); ?>
<P>
Du kannst die Farbe Deiner Nachrichten durch Auswahl einer neuen Farbe rechts von der Texteingabe ändern. Einfach auf die neue Farbe klicken.
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Benutzerliste (nicht Popup-Fenster):</B></A></FONT>
<P>
<OL>
	Zwei Regeln gelten für die Benutzerliste:<br />
	<LI>ein kleines Zeichen, das das Geschlecht des registrierten Mitgliedes anzeigt, wird vor dem Mitgliedsnamen angezeigt (wenn Sie auf dieses klicken, wird das <A HREF="#whois">WhoIs Popup</A> für das Mitglied gezeigt), während unregistrierte Mitglieder nur Leerzeichen vor ihrem Mitgliednamen haben;<br />
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
		<LI>alien (whose gender is unknown), Jezek2 and Caridad are registered users with no extra "power" for the phpMyChat room;<br /><br />
		<LI>lolo is a simple unregistered user.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="exit"><B>Chatraum verlassen:</B></A></FONT>
<P>
Um den Chat zu verlassen, klicke auf "Exit" oben rechts. Alternativ kannst Du folgenden Befehle benutzen, die Du einfach im Texteingabefeld eingibst:<br />
/exit<br />
/bye<br />
/quit<br />
Die Befehle können noch durch eine Nachricht ergänzt werden, die du einfach nach dem Befehl dahinter eintippst..
<I>Beispiel:</I> /quit Bis bald!
<P>
sendet diese Nachricht "Bis bald!" im Chatfenster. Danach wirst Du automatisch abgemeldet.

<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Wissen wer chattet ohne eingeloggt zu sein:</B></A></FONT>
<P>
Du kannst auf den Link klicken, der Dir auf der Startseite die Anzahl der Benutzer momentan anzeigt. Wenn Du chattest, klicke auf das Bild  <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_DETACH ?>"> in der oberen rechten Ecke des Bilder um ein Fenster zu öffnen, daß Dir alle Benutzer und die Räume in denen sie sich befinden anzeigt.<br />
<P>
Beim klick auf das  <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_BEEP ?>">Bild am oberen Rand dieses Fensters stellt die Benachrichtigung bei neuen Nutzern an oder aus.
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />
<hr />
<P>
<FONT SIZE="+1"><A NAME="customize"><B>Anpassen der Chatansicht:</B></A></FONT>
<P>
Es gibt verschiedene Methoden, die Chatansicht zu ändern. Um die Vorgaben zu ändern, tippe den gewünschten Befehl in das Nachrichtenfeld und drücke Enter/Return.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>Der <B>Clear Befehl</B> erlaubt Dir, das Hauptfenster zu löschen und die letzten 5 Nachrichten anzuzeigen.<br />Tippe "/clear" ohne Anführungszeichen.
		<P>
		<?php
	}
	else
	{
		?>
		<LI>Der <B>Order Befehl</B> erlaubt es Dir inzustellen, ob neue Nachrichten obenhalb oder unterhalb der anderen Nachrichten erscheinen.<br />Tippe "/order" ohne Anführungszeichen.
		<P>
		<?php
	}
	?>
	<LI>Der <B>Notify Befehl</B> erlaubt die Einstellung, ob Du die Anzeige über das Betreten oder Verlassen neuer User in den Raum sehen kannst. Standardmäßig ist die Option <?php echo(C_NOTIFY ? "on" : "off"); ?>  und die Benachrichtigung <?php echo(C_NOTIFY ? "will" : "won't"); ?> gesehen.<br />Tippe "/notify" ohne Anführungszeichen.
	<P>
	<LI>Mit dem <B>Timestamp Befehl</B> Kannst Du die Zeit vor einer Nachricht an oder abschaltenr. Vorgabe ist <?php echo(C_SHOW_TIMESTAMP ? "on" : "off"); ?>.<br />Tippe "/timestamp" ohne Anführungszeichen.
	<P>
	<LI>Der <B>Refresh Befehl</B> stellt die Zeit ein, in der Nachrichten auf dem Bildschirm aktualisiert werden. Vorgabe hier sind <?php echo(C_MSG_REFRESH); ?> Sekunden Um die Wiederholrate zu ändern tippe "/refresh n" ohne Anführungszeichen, wobei n die Anzahl Sekunden angibt.
	<P>
	<I>Beispiel:</I> /refresh 5
	<P>
	ändert die Rate auf 5 Sekunden. *Vorsicht, wenn n kleiner als 3 ist, wir die Wiederholrate auf 0 gesetzt  (nützlich, wenn Du viele Nachrichten lesen willst, ohne gestört zu werden)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
		<LI>Der <B>Show Befehl</B> erlaubt die Einstellung der maximal zulässigen Nachrichten pro Seite. Um die Vorgabe zu ändern tippe "/show n" ohne Anführungszeichen wobei n die Anzahl der sichtbaren Nachrichten darstellt..
		<P>
		<I>Zum Beispiel:</I> /show 50
		<P>
		läßt maximal 50 Nachrichten pro Seite zu.Sollten diese nicht alle sichtbar sein, so kannst Du mit dem Scrollbalken am Fensterrand scrollen.</UL>
		<?php
	}
	else
	{
		?>
		<LI>Die <B>Show und Last Befehle</B> erlauben das Löschen des Bildschirms und das lesen der letzten <I>n</I> Nachrichten die gesendet wurden. Tippe "/show n" oder "/last n" ohne Anführungszeichen wobei N die Anzahl der sichbaren Nachrichten ist.
		<P>
		<I>Beispiel:</I> /show 50 or /last 50
		<P>
		löscht das Nachrichtenfenster und zeigt die 50 neuesten Nachrichten an. Auch hier erscheint ein Scrollbalken, wenn die Anzahl der Nachrichten nicht in die Ansicht paßt.</UL>
		<?php
	}
	?>
	<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
	<P>
</UL>
<hr />
<hr />
<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Möglichkeiten und Befehle</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Hilfe Befehl:</B></A></FONT>
<P>
Wenn Du im Chatraum bist, kannst Du auf das  <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> Zeichen vor der Nachrichteneingabe klicken. Du kannst auch den  <B>"/help" oder "/?" Befehl</B> eingeben (ohne Anführungszeichen).
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatar:</B></A></FONT>
<P>Avataras sind graphische Bildikonen, die chattern darstellen. Nur zugelassene Benutzer können ihren Avatara ändern. Zugelassene Benutzer können ihr Profil öffnen (/profile Befehl sehen) und das Avatarabild an klicken, um es von einem Menü von Bildern vorzuwählen, oder ein URL zu einem graphischen Bild überall einzugeben, das im Internet vorhanden ist (die nur Bilder öffentlich zugänglich, nicht Kennwort geschützte Aufstellungsorte). Bilder sollten Datenbanksuchroutine-sichtbar (.gif, .jpg, etc.) sein. 32 x 32 große Pixels sind für die graphische Anzeige die beste.
<P>Klicke auf den avatar einer person.Es öffnet sich ein Popup mit dem profil der person. (siehe <A HREF="#whois">/whois Befehl</A>).
Klicke auf deinem eigenen Avatar von der Liste des Benutzers was den /profile Befehl hervorruft, wenn du registriert bist.
Wenn du nicht registriert warst, klickst auf dich Selbst (Rückstellung des Systems) gibt der Avatar einen hinweis aus dich zu Registrieren.
  <P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><B>Grafische Smilies:</B></A></FONT>
	<P>Du kannst grafische Smilies in Deinen Nachrichten benutzen. Schau Dir die einzelnen Möglichkeiten unten an.
	<P>
	<I>Zum Beispiel</I> ergibt folgende Nachricht: "Hi Jack :)" ohne Anführungszeichen folgende Nachricht: Hi Jack <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> im Nachrichtenfenster.
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
	<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
	<P>
	<hr />
	<?php
}

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Textformatierung:</B></A></FONT>
	<P>
	Text kann sein: fett, schräggestellt oder unterstrichen durch einschließen des Textes mit entweder den  &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; oder &LT;U&GT; &LT;/U&GT HTML tags.
	<P>
	<I>Beispiel:</I> &LT;B&GT;dieser Text&LT;/B&GT; gibt aus <B>dieser Text</B>.
	<P>
	Um einen Internet-Link zu erzeugen, tippe einfach die eMail oder die URL ein (ohne HTML Formatierung). Der Link wird automatisch erzeugt.
	<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
	<P>
	<P>
	<hr />
	<?php
}
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
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Einen Benutzer in den derzeitigen Raum einladen:</B></A></FONT>
<P>
Du kannst den <B>invite Befehl</B> benutzen um einem Benutzer vorzuschlagen, in Deinen Raum zu wechseln.
<P>
<I>Zum Beispiel:</I> /invite Jack
<P>
schickt eine private Einladungs-Nachricht an Jack. Diese Nachricht enthält den Namen des Zielraumes als Link.
<P>
Beachte, dass mehr als ein Benutzername angegeben werden kann (z.B. "/invite Jack,Helen,Alf"). Diese müssen durch Kommata (,) ohne Abstände angegeben werden.
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Raumwechsel:</B></A></FONT>
<P>
Die Liste auf der Rechten Seite zeigt Chaträume und Benutzer an. Um den aktuellen Raum zu verlassen und in einen neuen zu wechslen, klicke einfach auf dessen Namen. Leere Räume erscheinen nicht in der Liste. Du kannst auch den <B>Befehl "/join #Raumname"</B> ohne Anführungszeichen eingeben.
<P>
<I>Beispiel:</I> /join #RedRoom
<P>
führt Dich zu RedRoom.
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Wenn Du ein registrierter Benutzer bist, kannst Du" : "<br /><P>Du");
	?>
	 mit dem selben Befehl auch einen neuen Raum aufmachen. Du mußt angeben, welchen Typ dieser hat: 0 steht für privat, 1 für öffentlich (Vorgabewert).
	<P>
	<I>Beispiel:</I> /join 0 #MeinRaum
	<P>
	eröffnet einen Privatraum mit dem Namen (nur wenn kein gleichlautender öffentlicher besteht) und wechselt Dich dorthin.
	<P>
	Raumnamen dürfen keine Kommata oder Rückstriche enthalten(\).<?php if (C_NO_SWEAR) echo(" Es dürfen keine \"verbotenen Worte\" enthalten sein."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>Das eigene Profil im Chat ändern:</B></FONT>
<P>
Der <B>Profile Befehl</B> öffnet ein separates Fenster in dem Du Dein Profil ändern kannst - außer Nutzername und Passwort  (das geht nur von der Startseite aus.).<br />Tippe /profile
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="recall"><B>Erneutes Aufrufen der letzten Nachricht oder des letzten Befehles:</B></FONT>
<P>
Der <B>! Befehl</B> ruft die letzte Eingabe erneut auf.<br />Tippe /!
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="respond"><B>Einem speziellen Benutzer antworten:</B></FONT>
<P>
Wenn Du auf den gewünschten Usernamen klickst (in der Liste rechts) erscheint "username>" im Eingabefeld. Damit ist es für den angesprochenen einfacher, sich auch angesprochen zu fühlen. Diese Nachricht können ALLE lesen, sie ist nicht geheim.
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="private"><B>Private Nachrichten:</B></A></FONT>
<P>
Um eine private Nachricht an einen Benutzer in Deinem Ruam zu schicken, tippen den <B>Befehl "/msg Benutzername Nachrichtentext" oder "/to Benutzername Nachrichtentext"</B> ohne Anführungszeichen.
<P>
<I>Zum Beispiel, wenn Jack der Benutzername ist:</I> /msg Jack Wie geht es Dir?
<P>
Die Nachricht erscheint bei Dir und Jack, aber nicht bei den anderen.
<P>
Beachte, dass durch klicken auf den Sendernamen einer Nachricht automatisch dieser Befehl ins Eingabefeld geschrieben wird.
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Aktionen:</B></A></FONT>
<P>
Um zu beschreiben, was Du grade tust, kannst Du den <B>Befehl "/me Tat"</B> ohne Anführungszeichen eingeben.
<P>
<I>For example:</I> If Jack sends the message "/me is smoking a cigarette" the message frame will shown "<B>* Jack</B>" is smoking a cigarette".
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Andere Benutzer ignorieren:</B></A></FONT>
<P>
Um die Nachrichten anderer zu ignorieren nutze den <B>Befehl "/ignore username"</B> ohne Anführungszeichen.
<P>
<I>Beispiel:</I> /ignore Jack
<P>
Von nun an erscheinen die Nachrichten von Jack nicht mehr auf Deinem Bildschirm.
<P>
Um eine Liste von Nutzern zu sehen, die Du ignorierst, nutze den <B>Befehl "/ignore"</B> ohne Anführungszeichen.
<P>
Um den Nutzer nicht mehr zu ignorieren tippe den <B>Befehl "/ignore - username"</B> ohne Anführungszeichen ein, wobei "-" ein Minuszeichen ist. <P>
<P>
<I>Beispiel:</I> /ignore - Jack
<P>
Nun werden wieder alle Nachrichten von Jack angezeigt, inklusive der Nachrichten, die er während Deiner Ignoranz eingegeben hat.
Läßt Du einen Namen nach dem Minuszeichen weg, werden alle wieder normal angezeigt.
<P>
Beachte, dass Du mehrere Benutzernamen angeben kannst (z.B. "/ignore Jack,Helen,Alf" oder "/ignore - Jack,Alf"). Diese müssen durch Kommata (,) ohne Abstände getrennt werden.
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Nutzerinformationen bekommen:</B></A></FONT>
<P>
Tippe den <B>Befehl "/whois username"</B>ohne Anführungszeichen, um Informationen über den Nutzer zu bekommen.
<P>
<I>Beispiel:</I> /whois Jack
<P>
Ein Popup-Fenster erscheint, in dem die Informationen über Jack stehen.
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Nachrichten speichern:</B></A></FONT>
	<P>
	Um Nachrichten in ein lokales HTML-File zu exportieren (Benachrichtigungen ausgeschlossen) , tippe den <B>Befehl "/save n"</B> ohne Anführungszeichen.
	<P>
	<I>Beispiel:</I> /save 5
	<P>
	wobei 5 die Zahl der zu speichernden Nachrichten ist. Wird n nicht angegeben, werden alle Nachrichten des aktuellen Raumes gepeichert.
	<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
	<P>
	<hr />
	<?php
}
?>
<hr />
<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Befehle nur für Moderatoren und/oder Administratoren</U></B></A></FONT>

<P>
<FONT SIZE="+1"><A NAME="announce"><B>Mitteilung senden:</B></A></FONT>
<P>
Der Administrator kann an alle eine Nachricht senden, egal wo Du Dich befindest, mit dem <B>announce Befehl</B>.
<P>
<I>Beispiel:</I> /announce Das Chatsystem wird wegen Überarbeitung um 5 Uhr heruntergefahren .</I>
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
Es gibt einen weiteren nützlichen Ansagebefehl; Der Administrator oder die Moderatoren können an alle User im Raum oder allen Räumen eine Ansage schicken mit dem Befehl <B>room</B>.
<P>
<I>Zum Beispiel: /room Das Treffen findet um 15 Uhr statt.</I> oder <I>/room * Das Treffen findet um 15 Uhr im Personal-Raum.</I>
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="kick"><B>Benutzer rauswerfen:</B></FONT>
<P>
Moderatoren können Benutzer und der Administrator kann Nutzer oder Moderatoren mit dem <B>kick Befehl</B> rauswerfen. Moderatoren müssen dazu im selben Raum wie der rauszuwerfende Benutzer sein.
<P>
<I>Zum Beispiel</I>, wenn Jack der Name des Users ist, der gekickt werden sollte:  <I>/kick Jack</I> oder <I>/kick Jack Grund des Verweises</I> Der Grund des Rauswurfs könnte z.b. "wegen Spam" sein.!
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Benutzer verbannen:</B></A></FONT>
	<P>
	Moderatoren können Benutzer verbannen, der Administrator kann zusätzlich Moderatoren verbannen mit dem <B>ban Befehl</B>.<br />
	Der Administrator kann auch Benutzer anderer Räume verbannen, wahlweise auch dauerhaft vom gesamten Chat mit der "<B>*</B>" Einstellung vor dem zu verbannenden Benutzernamen.
	<P>
	<I>Zum Beispiel</I>, wenn Jack der zu verbannende Benutzer ist : <I>/ban Jack</I> oder <I>/ban * Jack</I>
	<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
	<P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Ernennen/Degradieren eines Users zum/vom Moderator:</B></A></FONT>
<P>
Moderatoren und Administratoren können andere Benutzer mit dem <B>promote Befehl</B> zu Moderatoren ernennen.
<P>
<I>Beispiel: /promote Jack</I>
<P>
Nur ein Administrator ist berechtigt dem Moderator die Rechte zu entziehen mit Hilfe des <B>demote Befehls</B>.
<P>
<I>Zum Beispiel</I>, wenn Jack der Name des Moderators ist, der degradiert werden sollte: <I>/demote Jack</I> oder <I>/demote * Jack</I> (entzieht Moderatorrechte in diesem Raum oder allen Räumen).
<br /><P ALIGN="right"><A HREF="#top">Zurück zum Anfang</A></P>
<P>
</BODY>
</HTML>
<?php
?>