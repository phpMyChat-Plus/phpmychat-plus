<?php
// File : dutch/localized.tutorial.php - plus version (09.09.2007 - rev.7)
// Original translation for the Plus version by Bert Moorlag <berbia@hotmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

//require("./config/config.lib.php");
require("./lib/index.lib.php");
if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Nederlands - Handleiding voor <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Handleiding voor <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</FONT><br /><I>&copy; 2007<?php echo((date(Y)>"2007") ? "-".date(Y) : ""); ?> - Vertaling door Bert Moorlag - Vlissingen, Nederland</I></B></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Inhoud: </FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Kies een taal</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Login naar Chat</A><br />
<A HREF="#register" CLASS="topLink">Registreren</A><br />
<A HREF="#modProfile" CLASS="topLink">Wijzig<?php if (C_SHOW_DEL_PROF) echo("/verwijder"); ?> Mijn profiel</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Maak een kamer</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink"> Status van verbinding </A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Een bericht verzenden</A><br />
<A HREF="#users_list" CLASS="topLink">Gebruikerslijst gebruiken </A><br />
<A HREF="#exit" CLASS="topLink">De Chatroom verlaten</A><br />
<A HREF="#users_popup" CLASS="topLink">Wie is op de Chat, zonder ingelogd te zijn?</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Aanpassen van de Chat</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Kenmerken en opdrachten:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">Help</A><br />
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
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Smilies</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#text" CLASS="topLink">Tekst veranderen</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Een gebruiker uitnodigen voor jou chatroom</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">Veranderen van kamer</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeprofile" CLASS="topLink">Je eigen profiel aanpassen</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#recall" CLASS="topLink">Terug halen van de laatste commando</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#respond" CLASS="topLink">Reageren op een bepaalde gebruiker</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Privé berichten</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS="topLink">Actie</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Negeer andere gebruikers</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">Gebruikers informatie</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#save" CLASS="topLink">Berichten bewaren</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Commando’s alleen voor administrator en/of moderators:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Verstuur een bekendmaking</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#kick" CLASS="topLink">Een gebruiker kicken</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#banish" CLASS="topLink">Een gebruiker bannen</A><br />
	<?php
};
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#promote" CLASS="topLink">Promoot/Degradeer een gebruiker:</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Kies een taal:</B></A></FONT>
	<P>
	Je kan een taal kiezen tussen degene die <?php echo(APP_NAME); ?> vertaald zijn, door op het vlaggetje te klikken op de startpagina. In onderstaand voorbeeld. selecteert een gebruiker de Franse taal:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Vlaggen voor taal selectie">
	<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Login naar chat:</B></A></FONT>
<P>
Als je al bent geregistreert, log in door je gebruikersnaam en wachtwoord in te voeren. Selecteer daarna de chat room die je binnen wilt gaan en klik op de ’<?php echo(L_SET_14); ?>’ knop.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Anders <A HREF="#register">registreer</A> eerst.
	<?php
}
else
{
	?>
<P>
	Of <A HREF="#register">registreer</A> eerst of ga direct een kamer binnen. Je nickname word dan niet voor jou gereserveerd (een ander kan deze dus ook gebruiken, zodra je bent uitgelogd).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Registreren:</B></A></FONT>
<P>
Als je nog niet hebt geregistreert<?php if (!C_REQUIRE_REGISTER) echo(" en je wilt dit"); ?>, kies de registratie optie. Een klein pop-up venster zal verschijnen.
<P>
<UL>
	<LI>Stap 1, bedenk een gebruikersnaam<?php if (!C_EMAIL_PASWD) echo(" en een paswoord"); ?> voor jezelf door deze in de bijbehorende vakken te typen. De gekozen gebruikersnaam is de naam die automatisch wordt vertoond in de chat room. Je mag geen spaties, komma’s of backslashes (\) gebruiken.
<?php if (C_NO_SWEAR) echo(" Geen \"vloek woorden\"."); ?>
	<LI>Stap 2, Vul je voornaam, achternaam en je emailadres in. Om geregistreerd te kunnen chatten, moet dit worden ingevuld. Het geslacht is optineel, om in te vullen.
	<LI>Als je een eigen website hebt, mag je de URL ook invullen.
	<LI>Het taal veld, kan handig zijn voor andere gebruikers om te kunnen chatten. Ze weten dan welke taal(en) je spreekt.
	<LI>Als laatste, wanneer je wilt dat anderen je emailadres kunnen zien, vink dan "laat e-mail zien" aan. Anders laat deze leeg.
	<LI>Dan, klik op de Registreer knop en je account wordt gemaakt. Mocht je tussentijds willen stoppen met registreren, klik op de sluit knop.
</UL>
<P>
<a name="modProfile"></a>Merk op, geregistreerde gebruikers kunnen hun eigen <?php if (C_SHOW_DEL_PROF) echo("profiel"); ?> verwijderen/bewerken door te klikken op de bijpassende <?php echo((!C_SHOW_DEL_PROF ? "link" : "links")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Maak een kamer :</B></A></FONT>
	<P>
	Alleen geregistreerde gebruikers kunnen een eigen kamer maken. In een prive kamer kunnen alleen gebruikers toegang krijgen die hun naam weten, deze komt niet in beeld, behalve voor degene die daar in zitten.<br />
	<P>
	De naam van een kamer mag geen komma of een backslash (\) bevatten.<?php if (C_NO_SWEAR) echo(" Wat niet mag zijn \"vloekwoorden\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Status van verbinding:</B></A></FONT>
	<P>
	Een teken van je verbinding status wordt getoond boven in de rechter hoek van het beeldscherm. Er zijn drie vormen :
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Geen verbinding nodig"> wanneer er geen verbinding vereist is ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Verbinden"> als er geprobeert wordt om verbinding te krijgen ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Verbinding mislukt"> wanneer een verbinding mislukt is.
	</UL>
	<P>
	In het derde geval, klik op de rode &quot;knop&quot; en er wordt opnieuw getracht verbinding te krijgen.
	<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Een bericht verzenden :</B></A></FONT>
<P>
Om een bericht te posten in een chat room, typ de tekst in het venster, links onder en daarna Enter om te verzenden. Berichten van alle gebruiken rollen naar beneden in de chat box.<br />
<?php if (C_NO_SWEAR) echo("Merk op \"vloekwoorden\" worden verwijderd uit berichten."); ?>
<P>
Je kan de tekst kleuren van je bericht veranderen, door een andere kleur te kiezen, aan de rechterkant van het venster.
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Gebruikerslijst gebruiken (niet voor gebruikers popup venster):</B></A></FONT>
<P>
<OL>
	Twee basis regels zijn bepalend voor de gebruikerslijst:<br />
	<LI>Een icoon dat het geslacht laat zien, staat voor de nick van een geregistreerde gebruiker (klik daarop en er opent een <A HREF="#whois">whois popup</A> van deze gebruiker), niet geregistreerde gebruikers hebben alleen lege velden;<br />
 <LI>De nick van de admistrator of moderator zijn cursief geschreven.
</OL>
<P><I>Voorbeeld</I>, uit onderstaand snapshot kun je opmerken dat:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="Gebruikers lijst">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas is de admin of een moderator van phpMyChat room;<br /><br />
		<LI>alien (geslacht onbekend), Jezek2 en Caridad zijn geregistreerde gebruikers zonder extra "rechten" voor phpMyChat room;<br /><br />
		<LI>lolo is een niet geregistreerde gebruiker.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>De chatroom verlaten :</B></A></FONT>
<P>
Je kan de chat verlaten door eenvoudig op de "Exit" te klikken. Ook kan je een commando in je tekst venster schrijven:<br />
/exit<br />
/bye<br />
/quit<br />
Deze commando’s kan je samen met een bericht schrijven, voordat je de chat verlaat.
<I>Voorbeeld :</I> /quit Tot de volgende keer!
<P>
Het bericht is dan &quot;Tot de volgende keer!&quot; en daarna wordt je uitgelogd.

<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Wie is op de chat, zonder ingelogd te zijn:</B></A></FONT>
<P>
Je kan op de link klikken, wat aangeeft hoeveel gebruikers zijn ingelogd (startpagina), of als je aan het chatten bent op het plaatje <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_DETACH ?>"> klikken, rechts-boven in beeld, en er opent een venster met alle gebruikers, en de kamer waar ze zich bevinden.<br />
De titel van dit venster omvat de gebruikersnamen, wanneer er minder dan drie zijn.
<P>
Door op dit <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_BEEP ?>"> plaatje te klikken zal het geluid aan/uit zetten wanneer er een gebruiker te chat binnenkomt. <br />
<P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Aanpassen van de Chat :</B></A></FONT>
<P>
Er zijn verschillende manieren om het beeld van de Chat te veranderen. Om deze instellingen te veranderen, typ de desbetreffende commando in het tekst venster en druk op Enter.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>De <B>Clear command</B> laat je het beeld schoonmaken en laat de laatste 5 berichten in beeld.<br />Typ "/clear" zonder de &quot;.
		<P>
		<?php
	}
	else
	{
		?>
		<LI>De <B>Order command</B> zet de de nieuwste berichten boven of onderaan het scherm.<br />Typ "/order" zonder de &quot;
	<P>
		<?php
	};
	?>
	<LI>De <B>Notify command</B> kan je aan/uit zetten, deze laat zien wanneer gebruikers een chatroom in of uit gaan. Standaard is deze optie <?php echo(C_NOTIFY ? "aan" : "uit"); ?> en de mededeling <?php echo(C_NOTIFY ? "wel" : "niet"); ?> te zien.<br />Typ "/notify" zonder de &quot;
	<P>
	<LI>De <B>Timestamp command</B> laat bij de berichten de tijd van posten zien. Deze kan je aan/uit zetten. Standaard staat deze op <?php echo(C_SHOW_TIMESTAMP ? "aan" : "uit"); ?>.<br />Typ "/timestamp" zonder de &quot;
	<P>
	<LI>De <B>Refresh command</B> gebruik je wanneer je het scherm met berichten wilt verversen. Standaard is dit <?php echo(C_MSG_REFRESH); ?> seconden. Om dit te veranderen typ "/refresh n" zonder de &quot;, waarvoor n staat voor het aantal seconden om te verversen.
	<P>
	<I>Bijvoorbeeld:</I> /refresh 5
	<P>
	dit vernieuwd de pagina met 5 seconden. *Let op, als n minder dan 3 seconden is, het vernieuwen is gereset maar niet voor alles (gemakkelijk als je oude berichten wilt lezen zonder gestoort te worden)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI>De <B>Show command</B> om het aantal berichten in te stellen, welke zichtbaar zijn. Om dit te veranderen, typ "/show n" zonder de &quot;, waarvoor n staat voor het aantal.
		<P>
		<I>Bijvoorbeeld:</I> /show 50
		<P>
		Deze laat nu de 50 nieuwste berichten op je scherm zien. Wanneer dit niet in het venster past, zie je een scrollbar aan de rechterkant.</UL>
		<?php
	}
	else
	{
		?>
		<LI>De <B>Show and Last commands</B> laat je het scherm wissen en de laatste n berichten zien. Typ "/show n" or "/last n" zonder de &quot;, waarvoor n staat voor het aantal berichten die je wilt zien.
		<P>
		<I>Bijvoorbeeld:</I> /show 50 or /last 50
		<P>
		Deze wist het berichten venster en laat de 50 nieuwste berichten zien. Wanneer deze niet past in het venster, zie je een scrollbar aan de rechterkant van het venster.</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
	 <P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Kenmerken en Opdrachten</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Help commando:</B></A></FONT>
<P>
Als je in een chatroom zit, kan je de helpfunctie oproepen, door op het <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> te klikken, wat zich voor het berichten venster bevindt. Je kan ook <B>"/help" of "/?" commando</B> te typen in het berichten venster.
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatars:</B></A></FONT>
<P>Avatars zijn afbeeldingen hoe de gebruiker zich voor stelt. Alleen geregistreerde gebruikers kunnen hun avatar veranderen. Geregistreerde gebruikers kunnen hun Profiel openen (zie /profile command) klik daarna op de avatar afbeelding of een andere avatar te kunnen selecteren uit de keuze menu, of om een URL in te vullen, deze moet dan wel publiekelijk zijn op het internet(dus niet met een paswoord beveiligde site). De afbeelding moet geschikt zijn voor browsers (.gif, .jpg, etc. ) en de grootte 32 x 32 pixel is het beste formaat om te laten zien.
<P>Door op iemand zijn avatar te klikken, zal er een gebruikers profiel pop-up venster verschijnen (zie <A HREF="#whois">/whois command</A>).
Op je eigen avatar klikken in de gebruikerslijst krijg je automatisch de /profile command oproepen, mits je geregistreerd bent.
Ben je niet geregistreerd, klik dan op je eigen avatar (default) zal een bericht laten verschijnen om je aan te moedigen toch te laten registreren.
  <P ALIGN="right"><A HREF="#top">Naar boven</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><B>Smilies:</B></A></FONT>
	<P>Je kan diverse smilies in je bericht toevoegen. Kijk onder voor de code(s) die je moet intypen bij je bericht.
	<P>
	<I>Bijvoorbeeld</I>, verzend de tekst "Hi Jack :)" zonder &quot; en het volgende verschijnt Hi Jack <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> in het hoofd venster.
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
	<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Tekst Veranderen:</B></A></FONT>
	<P>
	Tekst kan je vet maken, cursief of onderstrapen door de volgende tags te gebruiken, &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; or &LT;U&GT; &LT;/U&GT HTML tags.
	<P>
	<I>Bijvoorbeeld</I>, &LT;B&GT;deze tekst&LT;/B&GT; zal dit laten zien <B>deze tekst</B>.
	<P>
	Om een hyperlink te maken voor een e-mail adres of een URL, typ de adres (zonder HTML tags). De hyperlink maakt deze automatisch.
	<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
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
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Een gebruiker uitnodigen voor jou chatroom:</B></A></FONT>
<P>
Je kan met het <B>invite command</B> iemand uitnodigen om deel te nemen in de kamer waar jij aan het chatten bent.
<P>
<I>Bijvoorbeeld:</I> /invite Jack
<P>
zal een prive bericht zenden naar Jack om hem uit te nodigingen om naar jou kamer te gaan. Dit bericht geeft de naam van de kamer aan en zet tevens een link naar de kamer.
<P>
Merk op dat je meer dan 1 naam in deze commando kan zetten (eg "/invite Jack,Helen,Alf"). Ze moeten wel worden gescheiden door een komma, zonder spaties.
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Veranderen van kamer :</B></A></FONT>
<P>
De lijst aan de rechterkant van het scherm, laat een lijst zien van beschikbare chatrooms en de gebruikers wie in de kamers zich bevinden. Om een kamer te verlaten waar je in zit, klik simpelweg op de naam van jou gewenste kamer. Lege kamers staan niet in deze lijst. Je kan in een lege kamer door het volgende commando te typen <B>command "/join #roomname"</B> zonder &quot;.
<P>
<I>Bijvoorbeeld:</I> /join #RedRoom
<P>
dan kom je in de RedRoom.
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Als je een geregistreerde gebruiker bent, dan" : "<br /><P>Jij");
	?>
	 kan dan zelf een kamer creëeren met dezelfde commando. Maar dan moet je deze kamer specificeren met: 0 staat voor privé, 1 voor iedereen (standaard).
	<P>
	<I>Bijvoorbeeld:</I> /join 0 #MyRoom
	<P>
	creëert een privé kamer (vanuit gegaan dat er niet al een publieke kamer met dezelfde naam is gemaakt) genaamd MyRoom en zet jou daarin.
	<P>
	Namen van een kamer mogen geen komma of een backslash (\) bevatten.<?php if (C_NO_SWEAR) echo(" Verboden woorden zijn \"vloekwoorden\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>Je eigen profiel aanpassen:</B></FONT>
<P>
De <B>Profile command</B> zorgt ervoor dat er een popup venster wordt geopend waar je eigen profiel kan zien en bijwerken, behalve je nicknaam en paswoord (dit kan je doen via de link op de startpagina).<br />Typ /profile
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>Terug halen van de laatste commando:</B></FONT>
<P>
Met de <B> ! command</B> kan je de laatste commando, die je ingevoerd hebt, terug halen.<br />Typ /!
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>Reageren op een bepaalde gebruiker:</B></FONT>
<P>
Door op een bepaalde naam van een gebruiker te klikken (rechts van het scherm) zal zijn gebruikersnaam in jou tekst venster verschijnen. Deze mogelijkheid staat je toe om gemakkelijk een publieke boodschap voor de gebruiker te posten, misschien als reactie op wat hij heeft geschreven.
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Privé berichten:</B></A></FONT>
<P>
Om een privé bericht te verzenden naar een gebruiker in jou chatroom, typ het commando <B> "/msg username messagetext" of "/to username messagetext"</B> zonder &quot;.
<P>
<I>Bijvoorbeeld, wanneer Jack een gebruiker is:</I> /msg Jack Hallo, hoe gaat het met je?
<P>
het bericht zal alleen zichtbaar zijn voor Jack en jij, en niet voor de andere gebruikers.
<P>
Merk op dat wanneer je op een nick klikt of een bericht in het hoofdscherm, dat de privé commando automatisch wordt toegepast.
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Actie:</B></A></FONT>
<P>
Om aan te geven wat er gebeurt met het commando <B> "/me action"</B> zonder &quot;.
<P>
<I>Bijvoorbeeld:</I> Wanneer Jack een bericht verstuurt "/me is koffie aan het drinken" zal er in beeld verschijnen "<B>* Jack</B> is koffie aan het drinken".
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Gebruikers negeren:</B></A></FONT>
<P>
Om berichten van een bepaalde gebruiker te negeren typ het commando <B>"/ignore username"</B> zonder &quot;.
<P>
<I>Bijvoorbeeld:</I> /ignore Jack
<P>
Vanaf het bevestigen van deze commando, zal er geen berichten meer van Jack op je scherm verschijnen.
<P>
Om te kijken welke gebruikers je op negeren hebt gezet, typ het commando <B>"/ignore"</B> zonder ".
<P>
Om dit te herstellen, typ het commando <B>"/ignore - username"</B> zonder &quot; maar wel met -
<P>
<I>Bijvoorbeeld:</I> /ignore - Jack
<P>
Nu zullen de berichten die Jack verzend weer in beeld verschijnen, inclusief de berichten vanaf het moment dat je Jack op ignore hebt gezet.
 Wanneer je na de - geen gebruikersnaam invult, word je hele negeerlijst geleegd.
<P>
Merk op dat je meer dan 1 naam tegelijk kan invoeren ("/ignore Jack,Helen,Alf" or "/ignore - Jack,Alf"). De namen moeten worden gescheiden door een komma zonder spaties.
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Informatie over gebruikers:</B></A></FONT>
<P>
Om publieke informatie te zien van een gebruiker, typ het commando <B>"/whois username"</B> zonder &quot;.
<P>
<I>Bijvoorbeeld:</I> /whois Jack
<P>
 ’Jack’ is de gebruikersnaam. Deze commando zal een nieuwe venster openen, waarin de gebruikers gegevens staan van de gebruiker. Test het met je eigen naam om te zien hoe jou profiel eruit zal zien, zoals anderen die krijgen te zien als ze deze commando invoeren.
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Berichten bewaren:</B></A></FONT>
	<P>
	Om berichten te exporteren naar een HTML bestand, typ het commando <B>"/save n"</B> zonder &quot;.
	<P>
	<I>Bijvoorbeeld:</I> /save 5
	<P>
	Het getal ’5’ is het aantal berichten die je wilt opslaan. Als je niet het aantal vermeld, zal er geen beschikbare berichten worden opgeslagen in je account.
	<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Commando’s alleen voor adminstrator en/of moderators </U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Verstuur een bekendmaking:</B></A></FONT>
<P>
De administrator kan een algemene bericht maken voor alle kamers, waardoor alle gebruikers, die ingelogd zijn, bereikt worden met de <B>announce commando</B>.
<P>
<I>Bijvoorbeeld: /announce De chat is wegens onderhoud, tot 19.00 uur niet beschikbaar.</I>
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
Er is nog een nuttige bekendmaking als commando voor een beheer in kamer; de administrator of moderators in een kamer kunnen ook een bekendmaking naar alle gebruikers in dezelfde kamer versturen, met het commando <B>room</B>.
<P>
<I>Bijvoorbeeld: /room De bijeenkomst begint om 15.00 uur.</I> of <I>/room * De bijeenkomst begint om 15.00 uur in de Modkamer.</I>
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
<hr />

 <P>
 <FONT SIZE="+1"><A NAME="kick"><B>Een gebruiker kicken:</B></A></FONT>
 <P>
 Moderators kunnen een gebruiker kicken en de administrator kan een gebruiker en een moderator kicken met het commando <B>kick</B>. behalve voor de administrator, moet de gebruiker die wordt gekickt in dezelfde kamer zijn.
 <P>
 <I>Bijvoorbeeld</I>, Als Jack de gebruikersnaam is om te worden gekickt: <I>/kick Jack</I> of <I>/kick Jack reden voor kicking</I> de reden voor kicking kan je alles typen b.v. "for spamming!"
 <br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
 <P>
 <hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Een gebruiker bannen:</B></A></FONT>
	<P>
	Moderators kunnen een gebruiker verbannen en de administrator kan gebruikers en een moderator verbannen met het commando <B>ban</B>.<br />
	De administrator kan ook een gebruiker verbannen die in een andere kamer zit te chatten. Hij kan besluiten om deze gebruiker te bannen voor altijd of voor gedurende de chat in zijn geheel met de ’<B>*</B>’ instelling dat voor de nicknaam geplaatst moet worden.
	<P>
	<I>Bijvoorbeeld</I>, Jack is de gebruikersnaam om te bannen: <I>/ban Jack</I> of <I>/ban * Jack</I>
	<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Bevorder/Degradeer een gebruiker:</B></A></FONT>
<P>
Moderators en de administrator kunnen gebruikers bevorderen naar moderator met het commando <B>promote</B>.
<P>
<I>Bijvoorbeeld</I>, Jack is de gebruikersnaam om te bevorderen: <I>/promote Jack</I>
<P>
Alleen de administrator kan iemand degraderen (van moderator naar gebruiker) met het commando <B>demote.</B>.
<P>
<I>Bijvoorbeeld</I>, Jack is de gebruikersnaam van de moderator om te degraderen: <I>/demote Jack</I> of <I>/demote * Jack</I> (deze degradeert in huidige kamer of voor alle kamers).
<br /><P ALIGN="right"><A HREF="#top">Naar boven</A></P>
<P>
</BODY>
</HTML>
<?php
?>