<?php
// File : swedish/localized.tutorial.php - plus version (26.08.2008 - rev.10)
// Original translation for Plus version by Heikki <heikki@yttervik.be>
// Additions and corrections by Fimpen Högström <fimpen@relative-work.se>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

require("./lib/index.lib.php");
if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Svensk Handledning för <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo(${Charset}); ?>">
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Svensk Handledning för <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</B></FONT></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></A></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Innehåll av denna Handledning</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Val av språk</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Logga in till chatt</A><br />
<A HREF="#register" CLASS="topLink">Registering</A><br />
<A HREF="#modProfile" CLASS="topLink">Modifiera<?php if (C_SHOW_DEL_PROF) echo("/borttagande"); ?> din profil</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Skapande av rum</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Förstå kontakt/anslutningstillstånd/status</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Sänder Meddelande</A><br />
<A HREF="#users_list" CLASS="topLink">Förstå användar listan</A><br />
<A HREF="#exit" CLASS="topLink">Lämna chatt rum/kanal</A><br />
<A HREF="#users_popup" CLASS="topLink">För att se vem/vilka som är inne och chattar utan att logga in själv</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Finjustera Chatt utseendet</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Finesser och Kommandon:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">Hjälp kommandot</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">Avatars</A><br />
<?php
}
?>
<!-- Avatar System End. -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">Grafisk smilies/sinnestillstånd</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">Text Formateringen</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">Inbjudan till användare att komma med till ditt/ert nuvarande chatt rum</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">Ändring från ett chatt rum till annan</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">Modifiera din egen profil inne i chatten</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">Återkalla föregående meddelande eller kommando du har framlagt</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">Ge svar till en specifik användare</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">Privat Meddelanden</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">Händelser</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">Ignorera/ nonchalera andra användare</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">Få öppna upplysningar om andra användare</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">Spara meddelanden</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Speciella kommandon för moderator och/eller administratörer:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">Skicka tillkännagivande</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">Förvisning av användare</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">Förvisa en användare</A><br />
	<?php
};
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">Befordra/Upphöja/Sänka ner status för en användare till/från moderator:</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Val av språk:</B></A></FONT>
	<P>
	Du kan välj språk bland de här nedan vilket <?php echo(APP_NAME); ?> har blivit översatt till, klicka på en av flaggorna på starta sidan. Som exempel här, väljer användaren franska som språk:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Flaggor för språk val">
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Inloggning:</B></A></FONT>
<P>
Om du redan har registrerat dig, skriv ditt användarnamn och lösenord helt enkelt för att logga in. Sedan väljer du vilken chatt rum du vill komma till, tryck ’<?php echo(L_SET_14); ?>’ knappen.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	I fall du måste <A HREF="#register">registrera</A> dig först.
	<?php
}
else
{
	?>
<P>
	Annars kan du <A HREF="#register">registrera</A> eller helt enkelt skriva in dig i ett publikt rum med ditt nicknamn/aliasnamn, namnet kommer inte att vara reserverade (andra användare kan/får använda samma nicknamn efter du har loggat ut).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Till Registrering:</B></A></FONT>
<P>
Om du inte har registrerat dig ännu <?php if (!C_REQUIRE_REGISTER) echo("och skulle vilja"); ?>, vänligen välj registrerings val. Ett litet pop-up fönster kommer att framträda.
<P>
<UL>
	<LI>Först, skapa ett användarnamn<?php if (!C_EMAIL_PASWD) echo(" och lösenord"); ?> för dig själv genom att, skriva det in det i respektive fält. Användarnamnet du väljer är det nicknamn som kommer att vara automatiskt visande inne i chattrummet. Det kan inte innehålla mellanrum, kommatecken eller bakvänt snedsträck (\).
<?php if (C_NO_SWEAR) echo(" Den får inte innehålla \"svär ord\"."); ?>
	<LI>Andra, vänligen skriv in ditt förnamn, efternamn, och din e-post adress. För att registrera dig i chatten, är dessa upplysningar obligatoriska. kön/genus upplysningar är valfritt.
	<LI>Om du har hemsida, kan/får du skriva in URL’n till fältet.
	<LI>Språk fält kan hjälpa andra användare i framtida diskussioner. De kommer att veta vilket/vilka språk du/ni förstår.
	<LI>Slutligen, om du önskar/vill tillåta din e-post adress till vara synlig för andra deltagare, vänligen kontrollera denna är ibockad för att "visa e-post i öppna upplysningar". Om du inte vill att din e-post adress skall vara visningsbar, lämna rutan obockad.
	<LI>Sedan, tryck <?php echo(L_REG_3); ?> knappen och ditt konto kommer att skapas. Beroende på hur saker är inställt så måste du kanske vänta på Admin´s godkänande. Hur som helst så kommer du få ett mail med vidare instruktioner. Om du önskar avbryta när som helst, utan att registrera dig, tryck på <?php echo(L_REG_25); ?> knappen.
</UL>
<P>
<A NAME="modProfile"></A>Naturligtvis, kan registrerade användare modifiera sin profil senare<?php if (C_SHOW_DEL_PROF) echo("/ta bort"); ?> genom att klicka på rätt sorts <?php echo((!C_SHOW_DEL_PROF ? "länk" : "länkar")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Att skapa ett rum:</B></A></FONT>
	<P>
	Registrerade användare kan skapa rum. Privat rum kan bara vara åtkomliga av användare som vet deras namn och kommer aldrig att vara synliga utom för användare som är inne i de privata rummen.<br />
	<P>
	Rumsnamnet får inte innehålla kommatecken eller bakvänt snedsträck (\).<?php if (C_NO_SWEAR) echo(" Det får inte heller innehålla \"svär ord\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Förstå kontakt/anslutningstillstånd/status:</B></A></FONT>
	<P>
	En bild som visar din kontakt status, är synlig högst uppe i övre högra hörnet av bildskärmen. Den lilla plutten kan anta tre färger :
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Ingen kontakt"> när ingen kontakt är nödvändig ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Anknytande"> när anslutning är inkommande ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Anslutning misslyckades"> när anslutning misslyckades.
	</UL>
	<P>
	Om den blir röd kan du klicka på den röda "plutten" så kommer ett nytt anslutningsförsök att starta.
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Sända meddelanden:</B></A></FONT>
<P>
Att posta ett meddelande till chatt rum, skriv din text i textrutan i lägre vänster hörnet och tryck Enter/Return tangent för att skicka det. Meddelanden från alla användare hamnar i själva chattfönstret, vilket går att bläddra i chatt.<br />
<?php if (C_NO_SWEAR) echo("Notera att \"svär ord\" blir borttagna från meddelanden."); ?>
<P>
Du får ändra färg på texten av dina meddelanden, välj ny färg från dropmenyn till höger om textbox/inmatningsfältet.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Förstå användar listan (inte att förväxla med användar popup fönstret):</B></A></FONT>
<P>
<OL>
	Två grund regler är definierade för användar listan:<br />
	<LI>en liten ikon som visar kön/genus är synlig före nicknamnet av registrerat användare (klickande på den kommer att starta <A HREF="#whois">vem är popup</A> för denna användare), medan oregistrerad användare har ett tomt uttryckslös mellanrum strax före deras nicknamn;<br />
	<LI>nicknamn av administratör eller moderator är kursiverad.
</OL>
<P><I>Som exempel</I>, från sammansättning nedan kan du avgöra användarnas status:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="användar lista">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas är administratör eller moderator av phpMyChat rum vilket framgår av att namnet-nicket är i kursiv stil;<br /><br />
		<LI>alien (vars kön/genus är okänt), Jezek2 och Caridad är registrerade användare men utan "auktorites behörighet" för phpMyChat rum;<br /><br />
		<LI>lolo är en enkel oregistrerad användare.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Lämna chatt rum/kanal:</B></A></FONT>
<P>
För att gå ur chatten, klicka helt enkelt en gång på <?php echo (EXIT_LINK_TYPE) ? "<img src='localization/$L/images/exitdoor.gif' border=0 alt='".L_EXIT."'> bild" : '"'.L_EXIT.'" länk'; ?>. Alternativt, du får skriva en av följande kommandon i inmatningsfältet:<br />
/exit<br />
/bye<br />
/quit<br />
Dessa kommandon kan/får kompleteras med meddelande som skickas innan du lämnar chatt rummet.
<I>Som exempel :</I> /quit Vi ses snart!
<P>
kommer att skicka meddelande "Vi ses snart!" i chattrutan och loggar ut dig.

<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>För att se vem/vilka som är inne och chattar utan att behöva logga in:</B></A></FONT>
<P>
Du kan klicka på länken som visar nummer/antalet anslutna användare ovanför flaggorna på logginfönstret, eller om du redan är inloggad i chatten, klicka på bilden <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_DETACH ?>"> som är synlig högst uppe i övre högra hörnet av bildskärmen. För att öppna ett oberoende fönster som kommer att visa en lista av de uppkopplad användare, och de rum de är i, i nära på riktig/real tid.<br />
Titel på detta fönster innehåller användarnamn om de är mindre än tre, i annat fall antalet användare och aktiva rum.
<P>
Klickande på <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_BEEP ?>"> ikonen överst i denna popup kommer att stänga av/på ljudeffekt vid användares inträde.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Finjustering av chatt utseendet:</B></A></FONT>
<P>
Där finns många olika vägar för att finjustera utseendet av chatt rummet. För att ändra inställningar, skriv helt enkelt rätt sorts kommandon i inmatningsfältet och trycka Enter/Return tangenten.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
	<LI> <B>Clear kommandot</B> tillåter dig rensa huvudfönstret i chatten och bildskärmen kommer visa föregående 5 meddelanden skrivna på din bildskärm.
		<P>
		<?php
	}
	else
	{
		?>
	<LI> <B>Order kommandot</B> tillåter dig växla mellan om nya meddelanden skall framträda uppifrån eller nerefrån på din bildskärm.<br />Skriv "/order" utan citationstecken.
		<P>
		<?php
	};
	?>
	<LI> <B>Notify kommandot</B> tillåter dig slå till eller från möjligheten av att bli underrättad om när andra användare kommer in eller går ur chattrummet. Som default detta kommandot ställt i läge <?php echo(C_NOTIFY ? "PÅ" : "AV"); ?> och du <?php echo(C_NOTIFY ? "kommer att" : "kommer inte att"); ?> bli underrättad av ljudsignal.<br />Skriv "/notify" utan citationstecken för att växla mellan av och på.
	<P>
	<LI> <B>Timestamp kommandot</B> tillåter dig slå till eller från möjligheten att få en  tidsnotering när varje meddelande skrivits in, före/innan varje meddelande kommer servertid att visas före varje chattrad. Som default är denna valmöjlighet påslagen <?php echo(C_SHOW_TIMESTAMP ? "till" : "från"); ?>.<br />Skriv "/timestamp" utan citationstecken för att växla mellan av och på.
	<P>
	<LI> <B>Refresh kommandot</B> tillåter dig att justera med vilket tidsintervall din bildskärm kommer att uppdateras, för att få in nyskrivna meddelanden på. Som default värde är förnärvarande <?php echo(C_MSG_REFRESH); ?> sekunder. För att ändra värde skriv "/refresh n" utan citationstecken där n är tid i sekunder för ny uppdateringsintervall.
	<P>
	<I>Som exempel:</I> /refresh 5
	<P>
	kommer att ändra värde till 5 sekunder. *OBS* *Var försiktig, om n är mindre än 3, kommer uppdateringen att upphöra helt (användbart när du vill läsa massor av gammal meddelanden utan att bli störd/förvirrad)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI><B>Show kommandot</B> tillåter dig att justera antalet meddelanden som visas på din bildskärm. För att ändra default nummer/antal, skriv "/show n" utan citationstecken där n är nummer/antal av visningsbara meddelanden (vilket innebär att du kan se meddelande skrivna till och med innan du ens loggade in).
		<P>
		<I>Som exempel:</I> /show 50
		<P>
		kommer att göra de 50 senast skrivna meddelanden synliga för dig på din bildskärm. Om alla meddelanden inte ryms i chattfönstret, kommer en vertikal rulllist (scrollbar) att framträda på höger sidan av chattfönstret.</UL>
		<?php
	}
	else
	{
		?>
		<LI><B>Show och Last kommandona</B> tillåter dig rensa bildskärmen och visa de senast skrivna <I>n</I> meddelanden som sänts till din bildskärm. Skriv "/show n" eller "/last n" utan citationstecken där n är antalet visningsbara meddelanden.
		<P>
		<I>Som exempel:</I> /show 50 or /last 50
		<P>
		kommer att rensa chattfönstret och inhämta de 50 senast skrivna meddelanden som kommer att bli synliga på din bildskärm. Om alla meddelanden inte ryms i chattfönstret, kommer en vertikal rulllist (scrollbar) att framträda på höger sidan av chattfönstret </UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Finesser och Kommandon</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Hjälp kommandot:</B></A></FONT>
<P>
När du är inne i ett chat rum kan du ta fram en hjälp-popup genom att klicka på <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> ikonen som sitter före inmatningsfältet. Du kan även skriva <B>"/help"</B> eller <B>"/?" kommandona</B> i inmatningsfältet.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatars:</B></A></FONT>
<P>Avatars är små bildikoner som man kan koppla till sin chattperson eller till sitt nick. Endast registrerade användare kan ändra sin bild. Registrerade användare öppnar sin Profilinställning genom kommandot <A HREF="#changeprofile">/profile</A> sen klickar du på avatar image för att välja en bild från menyn av bilder, eller så skriver du in en url till en grafisk bild var som kan finnas var som helst på internet (endast publikt tillgängliga bilder utom lösenordsskyddade sajter dock). Bilderna skall vara webläsarkompatibla (.gif, .jpg, etc.) I 32 k 32 pixlar stora blir bästa resultatet.
<P> Att klicka på en persons bild kommer att visa dennes profile (samma som kommandot <A HREF="#whois">/whois</A>).
Klickar du på din egen bild I användarlistan så är det desamma som att använda /profile kommandot om du är registrerad. Om du inte är registerad och klickar på dig själv (systemets default) så kommer du uppmanas att registrera dig.
 <P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
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
	<P>Du kan har grafiska smilies inne i dina meddelanden. Se här nere kortkommandona du kan skriva i meddelande för var och en av respektive similes.
	<P>
	<I>Som exempel</I>, skriv texten "Hej Jack :)" utan citationstecken meddelandet som visas= Hej Jack <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> i chattfönstret.
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
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Text Formateringen:</B></A></FONT>
	<P>
	Text kan vara fet, kursiverad eller understruken med htmlkod taggar &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; eller &LT;U&GT; &LT;/U&GT HTML tags.
	<P>
	<I>Som exempel</I>, &LT;B&GT;detta text&LT;/B&GT; kommer att producera <B>detta text</B>.
	<P>
	Att skapa hyperlänkar för e-post adress eller URL’er, skriv bara adressen (utan några HTML taggs). Hyperlänken kommer att skapas automatiskt.
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
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
<b><?php echo(L_COL_HELP_SUB3); ?></b><br />
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php if (COLOR_FILTERS) echo("a) COLOR_FILTERS = <b>".(COLOR_FILTERS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".(COLOR_ALLOW_GUESTS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />c) COLOR_NAMES = <b>".(COLOR_NAMES == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<?php if (COLOR_FILTERS) echo("<u>".L_COLOR_HEAD_SETTINGSa."</u> ".L_WHOIS_ADMIN." = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, ".L_WHOIS_MODERS." = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, ".L_WHOIS_OTHERS." = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>."); else echo("<u>".L_COLOR_HEAD_SETTINGSb."</u> <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.") ?><br />
<u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("<font color=".COLOR_CA.">".L_WHOIS_ADMIN); elseif ($CookieStatus == "t") echo("<font color=".COLOR_CA.">".L_WHOIS_TOPMOD); elseif ($CookieStatus == "m") echo("<font color=".COLOR_CM.">".L_WHOIS_MODER); else echo("<font color=".COLOR_CD.">".L_WHOIS_GUEST); echo("</font>");?></b>.<br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Bjuda in någon att komma med till ditt nuvarande chatt rum:</B></A></FONT>
<P>
Du kan använda <B>invite kommandot</B> för att bjuda in en användare till det rum där du chattar.
<P>
<I>Som exempel:</I> /invite Jack
<P>
kommer att skicka ett privat meddelande till Jack, med förslaget att han kommer med till ditt nuvarande chatt rum. Detta meddelande innehåller namn på rumsförslaget och dennes namn framträder som en länk.
<P>
Notera att du kan har mer än ett användarnamn i inbjudan, kommandot (expl. "/invite Jack,Helen,Alf"). De måste vara separerad med kommatecken (,) utan mellanrum.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Ändring av rum:</B></A></FONT>
<P>
Listan till höger om chattfönstret visar både en lista av chatt rum och användare som är för närvarande i dessa rum. Att lämna det rum du är i och flytta till ett av dessa rum, klicka en gång på rumsnamnet bara. Tomma rum framträda inte på denna lista. Du kan/får flytta till ett tom rum, du skriver <B>kommandot "/join #rums namn"</B> utan citationstecken.
<P>
<I>Som exempel:</I> /join #Red Room
<P>
kommer att flytta dig till "Red Room".
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P> Om du är en registerad användare kan du:" : "<br /><P>Du");
	?>
	 kan även skapa ett nytt rum med detta kommandot. Men då måste du specificera dess type: 0 står för privat, 1 står för öppet/publikt (start värde).
	<P>
	<I>Som example:</I> /join 0 #My Room
	<P>
	kommer att skapa ett nytt privat rum (under förutsättning att inte ett redan har skapats med det namnet) kallat "My Room" och flytta dig till det.
	<P>
	Rumsnamnet får inte innehålla kommatecken eller bakvänt snedstreck (\).<?php if (C_NO_SWEAR) echo(" Den får inte innehålla \"svär ord\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>Modifiera din egen profil inne i chatten:</B></FONT>
<P>
<B>Profil kommandot</B> skapar ett separat popup fönster i vilken du kan redigera din användarprofil och modifiera den förutom ditt nicknamn och lösenord (du måste använda länk på logg in sidan för göra denna ändring).<br />Skriv /profile
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>Återkalla föregående meddelande eller kommando du har skrivit:</B></FONT>
<P>
<B>! kommandot</B> återkallar föregående meddelande eller kommando du har skrivit.<br />Skriv /!
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>Ge svar till en specifik användare:</B></FONT>
<P>
Klicka en gång på namnet av annan användare från listan (till höger av bildskärmen) så kommer deras "användarnamn>" att läggas till i ditt inmatningsfält (detta är INTE samma som ett privat skrivet meddelande då raden startar med ”/to användarnamn”). Denna finess tillåter dig att med lätthet direkt öppna en dialog till en specifik användare, kanske som svar till någonting han eller hon har skrivit tidigare.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Privat Meddelanden:</B></A></FONT>
<P>
Att skicka privat meddelande till en annan användare närvarande i ditt chatt rum, skriv <B>kommandot "/msg användarnamn meddelandetext" eller "/to användarnamn meddelandetext"</B> utan citationstecken.
<P>
<I>Som exempel, där Jack är användarnamnet:</I> /msg Jack Hejsan , hur är det?
<P>
Meddelande kommer att framträda till Jack och dig själv, men inga andra användare kommer att se meddelandet.
<P>
När “Privata meddelande” är påslaget så är det även möjligt att skicka en viskning till användare I rum annat än det du själv är genom att använda <B>Kommandot "/wisp användarnamn meddelande"</B> utan cituationstecken.
<P>
<?php
if (!C_PRIV_POPUP)
{
?>
Klicka på namnet av en avsändare, I huvudrutan så kommer automatiskt kommandot /to eller /wisp att läggas till på textradens början.
<?php
}
else
{
?>
Genom att klicka på en användares namn I huvudfönstret kommer automatiskt öppna ett popupfönster som väntar på inmatning av din text, Avsluta med att klicka på Enter. Svaren kommer automatiskt öppna ett nytt popupfönster.
<?php
}
?>
<P>
Notera att: När popupfönstret för privata meddelande är påslaget (I både chattinställningar och din privata profil),  kommer du att få alla privat skrivna meddelande sen du var inloggad sist, eller sen du sist tagit “Away”.  Alla nya offline-meddelande som skickats till ditt namn kommer att öppna i popupfönster, du kan svara på dem I detta fönster ett efter ett.
Detta offline förfarande är bara möjligt för registrerade användare.
<P>
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php echo("a) ENABLE_PM = <b>".(C_ENABLE_PM == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) PRIV_POPUP = <b>".(C_PRIV_POPUP == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Actions:</B></A></FONT>
<P>
För att beskriva vad du håller på med du kan använda <B>kommandot "/me "</B> utan citationstecken.
<P>
<I>Som example:</I> Om Jack sänder meddelandet "/me är och dricker kaffe" så kommer i chattfönstret visas "<B>* Jack</B> är och driker kaffe".
<P>
En variant på detta kommando är <B>/mr kommando</B> vilket gör att du får med använarens kön med kommandot framför använarnamnet.
<P>
<I>Som exempel:</I> Om Jack skickar ett meddelande "/mr tittar på TV" meddelanderutan kommer att visa "<B>* <?php echo(L_HELP_MR); ?> Jack</B> tittar på TV".
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorera andra användare:</B></A></FONT>
<P>
För att ignorera alla meddelande skrivna av andra användare, skriv <B>kommandot "/ignore användarnamn"</B> utan citationstecken.
<P>
<I>Som exempel:</I> /ignore Jack
<P>
Från denna tidpunkt under denna inloggning, kommer inga meddelanden av användaren Jack att visas på din bildskärm.
<P>
För att lista vilka användare du för närvarande ignorerar meddelanden från, bara skriv <B>kommandot "/ignore"</B> utan citationstecken och utan något namn.
<P>
För att åter börja visa meddelanden från en ignorerad användare, skriv <B>kommandot "/ignore - användarnamn"</B> utan citationstecken där "-" är ett bindestreck eller minustecken. <P>
<P>
<I>Som exempel:</I> /ignore - Jack
<P>
Nu kommer alla meddelanden av Jack åter börja synas för dig under nuvarande chat session på din bildskärm, inkluderat de där meddelanden som Jack skrivit innan du skrev detta kommando.
 Om du inte specifiera ett användarnamn efter bindestrecket, så kommer din "ignorerade lista" att popa upp.
<P>
Notera detta, du kan placera mer än ett användarnamn i ignorera kommandot (t ex "/ignore Jack,Helen,Alf" eller "/ignore - Jack,Alf"). De måste vara separerade med kommatecken (,) utan mellanrum.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Få information om användare:</B></A></FONT>
<P>
För att se öppna upplysningar om en användare, skriv <B>kommandot "/whois användarnamnet"</B> utan citationstecken.
<P>
<I>Som Exempel:</I> /whois Jack
<P>
Där ’Jack’ är användarnamnet. Detta kommando kommer att skapa ett separat pop-up fönster som kommer att visa publicerade tillgänglig upplysningar om denna användare. Använd ditt eget namn för att kolla hur din egen profil info visas för andra användare med samma kommando.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Spara meddelanden:</B></A></FONT>
	<P>
	För att exportera meddelanden (in och utloggnings noteringarna borttagna) till en lokala HTML fil, skriv <B>kommandot "/save n"</B> utan citationstecken.
	<P>
	<I>Som Exempel:</I> /save 5
	<P>
	Där ’5’ är antal meddelanden som ska sparas. Om n inte specificerats, alla tillgängliga meddelanden från nuvarande rum kommer att tas med i nerladdningen.
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />

<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Kommandon som bara är för adminstratörer och moderatorer </U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Skicka ett allmänt utrop:</B></A></FONT>
<P>
Administratören/er kan/får göra system utrop till alla rum och nå alla för närvarande inloggad användare med <B>announce kommandon</B>.
<P>
<I>Som exempel: /announce Chatt systemet kommer att gå ner för skötsel ikväll vid 20:00 (man kan dessutom ge utropet ett fast namn som Viktigt Meddelande!! T ex).</I>
<P>
Ett annat användbart utropskommando för olika syften som är för både administratörer och moderatorer i ett eller flera rum är <B>room kommandot</B>.
<P>
<I>Som exempel: /room mötet startar vid 15:00.</I> eller <I>/room * mötet startar vid 15:00 i Staff rummet.</I>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Sparka ut en användare:</B></FONT>
<P>
Moderatorer kan sparka en användare och administratörer kan sparka en användare och/eller en moderator med <B>kick kommandot</B>. Administratörer går inte att kicka ut, användaren som ska sparkas måste vara i nuvarande rum.
<P>
<I>Som exempel</I>, om Jack är namnet på användaren som skall sparkas ut:</I> /kick Jack</I>.
<P>
Om * används så kommer kommandot (<I>/kick * <?php echo(L_HELP_REASON); ?></I>) att kicka ut alla användare utan Admin och Moderatorstatus (endast gäster och registrerade användare alltså). Detta är användbart om servern har kopplingssvårigheter till databasen och alla användare behöver logga in igen. I det andra fallet så är <I><?php echo(L_HELP_REASON); ?></I> att rekomendera så användarna förstår varför de blivit utslängda.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Förvisa en användare:</B></A></FONT>
	<P>
	Moderatorer och administratörer kan förvisa en användare eller en moderator med <B>ban kommandot</B>.<br />
	Administratören kan förvisa en användare från annant rum än han/hon själv är inne i. Han kan även förvisa en användare för alltid och från chatten med kommandot, "<B>*</B>" måste vara infogad före användarens nicknamn för att denne skall bli fördriven.
	<P>
	<I>Som exempel</I>, om Jack är namnet på användaren som skall stängas av: <I>/ban Jack</I> eller <I>/ban * Jack</I>
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Befordra/Sänka ner en användare till/från moderator:</B></A></FONT>
<P>
Moderator och administratör kan befordra/upphöja andra användare till moderator med <B>promote kommandot</B>.
<P>
<I>Som exempel</I>, om Jack är namnet på användaren att befordra: <I>/promote Jack</I>
<P>
Bara administratören har tillgång för motsatsen (sänka en moderator till vanlig användare) att använda <B>demote kommandot</B>.
<P>
<I>Som exempel</I>, om Jack är namnet på den moderator som skall att sänkas ner: <I>/demote Jack</I> eller <I>/demote * Jack</I> (kommer att sänka ner honom från nuvarande eller alla rum).
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
</BODY>
</HTML>
<?php
?>