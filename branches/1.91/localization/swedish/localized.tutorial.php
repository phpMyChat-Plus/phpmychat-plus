<?php
// File : swedish/localized.tutorial.php - plus version (10.07.2007 - rev.6)
// Original file by Heikki <heikki@yttervik.be>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

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
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
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
<P><A NAME="top"></P>
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
	<A HREF="#connection_state" CLASS="topLink">Förstå kontakt/anslutnings tillstånd/status</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Sänder Meddelande</A><br />
<A HREF="#users_list" CLASS="topLink">Förstå användare lista</A><br />
<A HREF="#exit" CLASS="topLink">Lämna chatt rum/kanal</A><br />
<A HREF="#users_popup" CLASS="topLink">Veta vilka är och chattar utan att logga in själv</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Finjustera Chatt utseende</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Finesser och Kommandon:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">Hjälp kommando</A><br />
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
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">Grafisk smilies/sinnestillstånd</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">Text Formatering</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">Inbjudan till användare att komma med till din/er nuvarande chatt rum</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">Ändring från en chatt rum till annan</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">Privat Meddelanden</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">Händelser</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">Ignorera/ nonchalera andra Användare</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">Få Öppen Upplysningar om andra Användare</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">Spara meddelanden</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Speciella kommandon för ordningsmän och/eller administratör:</A><br />
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
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">Befordra/Upphöja/Sänka ner status för en användare till/from ordningsman:</A><br />
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
	Du kan välj språk bland de där vilka <?php echo(APP_NAME); ?> har blivit översatta klicka en av flaggor på starta sidan. I exempel här, användare väljer franska som språk:
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
Om du har redan registrerat, helt enkelt logga in, skriv din användarnamn och lösenord. Sedan välj vilken chatt rum du vill komma till, tryck ’<?php echo(L_SET_14); ?>’ knapp.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Annat fall du måste <A HREF="#register">registrera</A> först.
	<?php
}
else
{
	?>
<P>
	Eller du kan <A HREF="#register">registrera</A> eller helt enkelt skriva in dig i ett publika rum men din nicknamn/aliasnamn,namnet kommer inte att vara reserverade (andra användare kan/får använda samma nicknamn efter du har loggat ut).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Till Registrering:</B></A></FONT>
<P>
Om du har inte ännu registrerat<?php if (!C_REQUIRE_REGISTER) echo(" och skulle vilja "); ?>, vänligen välj registrering val. Litet pop-up fönster kommer att framträda.
<P>
<UL>
	<LI>Först, skapa användarnamn<?php if (!C_EMAIL_PASWD) echo(" och lösenord"); ?> för dig själv genom att, skriva det in till rätt fällt. Användarnamn du väljer är det nicknamn som kommer att vara automatiskt visade in i chat rum. Den kan inte innehålla mellanrum, kommatecken eller snestärkbakåt (\).
<?php if (C_NO_SWEAR) echo(" Den får inte innehålla \"svär ord\"."); ?>
	<LI>Andra, vänligen skrivin ditt förnamn, efternamn, och din e-post adress. För att registrera till chat, allt denna upplysningar måste vara försedd. kön/genus upplysningar är valfri.
	<LI>Om du har hemsida, du kan/får skriva in URL till fälltet.
	<LI>Språk fält kan hjälpa andra användare i framtida diskussioner. De kommer att veta vilken språk(er) du/ni förstå.
	<LI>Slutligen, om du önskar/vill tillåta din e-post adress till vara visad av andra deltagare, vänligen kontrollera länk nästa till att "visa e-post i öppen upplysningar". Om du vill inte att din e-post address skall vara visningsbara, lämna ruta omarkerad.
	<LI>Sedan, tryck Registrera knapp och ditt konto kommer att skapas. Om du önskar stoppa vid när som helst, utan registrera, tryck Stäng knapp.
</UL>
<P>
<A NAME="modProfile"></A>Naturligtvis, registrerade användare kan modifieras sitt profil senare<?php if (C_SHOW_DEL_PROF) echo("/ta bort"); ?> genom att klicka på rätt sorts <?php echo((!C_SHOW_DEL_PROF ? "länk" : "länkar")); ?>.<br />
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
	Registrerade användare kan skapa rum. Privat rums kan bara vara åtkomliga av användare som vet deras namn och kommer aldrig att vara visad utom för användare som är inne.<br />
	<P>
	Roms namn får inte innehålla kommatecken eller omvänt snedtecken (\).<?php if (C_NO_SWEAR) echo(" Det får inte heller innehålla \"svär ord\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Förstå kontakt/anslutnings tillstånd/status:</B></A></FONT>
	<P>
	En bild visar din kontakt status, är synlig vid top-höger hörn av bildskärmen. Den har får tre former :
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Ingen kontakt"> när ingen kontakt är nödvändig ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Anknytande"> när anslutning är inkommande ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Anslutning misslyckades"> när anslutning misslyckades.
	</UL>
	<P>
	I tredje fall, att klicka på röd "knapp" kommer att starta en ny anslutnings försök.
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Sänder meddelanden:</B></A></FONT>
<P>
Att posta ett meddelande till chatt rum, skriva din text intill texten ruta i lägre vänster hörn och tryck Enter/Return tangent till att skicka det. Meddelanden från alla användare bläddra i chatt box.<br />
<?php if (C_NO_SWEAR) echo("Notera att \"svär ord\" är borttagen från meddelanden."); ?>
<P>
Du får ändra färg av texten av din meddelanden, välj ny färg från dropmenun till höger av text box/inmatnings fällt.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Förstå användare lista (inte för användare popup fönster):</B></A></FONT>
<P>
<OL>
	Två grund regler år definierade för användar lista:<br />
	<LI>en liten icon som visar kön/genus är visad före nicknamn av registrerat användare (klickande på den kommer att starta <A HREF="#whois">vem är popup</A> för denna användare), medan oregistrerad användare har ingenting, men uttryckslös mellanrum visas före deras nicknamn;<br />
	<LI>nicknamn av administratör eller ordningsman är kursiverad.
</OL>
<P><I>För exempel</I>, från sammansättning nedan kan du avgöra användarens status:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="användar lista">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas är administratör eller ordningsmän av phpMyChat rum;<br /><br />
		<LI>alien (vems kön/genus är okänt), Jezek2 och Caridad är registrerade användare med inga extra "krafter" för phpMyChat rum;<br /><br />
		<LI>lolo är en enkel oregistrerad användare.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Lämna chatt rum:</B></A></FONT>
<P>
Att gå ur chatt, helt enkelt klicka en gång på "Sluta chatta". Alternativt, du får skriva en av följande kommandon in till inmatnings fällt:<br />
/exit<br />
/bye<br />
/quit<br />
Dessa kommandon kan/får kompleteras med meddelande att skickas innan du lämnar chatt rum.
<I>För exempel :</I> /quit CU snart!
<P>
kommer att skicka meddelande "CU snart!" i start ram och loggar dig ut.

<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Att Veta vem som är och chattar utan att vara inloggad :</B></A></FONT>
<P>
Du kan klicka på länk där det visar nummer/antal av anslutna användare vid starta sida, eller, om du är chatting, klicka på bilden <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Användare popup"> vid top-höger av bildskärmen att öppna ett oberoende fönster det kommer att visa lista av kopplad användare, och rum de är i, i nära riktig/real tid.<br />
Titel av detta fönster innehåller användanamn, om de är mindre än tre,i annat fall antal användare och aktiva rum(s) .
<P>
Klickande på <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Ljud"> ikon vid topp av denna popup kommer att ljud på/stänga av ljud vid användarens inträde.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Finjustering chatt utseende:</B></A></FONT>
<P>
Där finns många flera vägar för att finjustera utseendet av chatt rummet. Att ändra inställningar, helt enkelt skriva rätt sorts kommando intill inmatningsfällt och trycka Enter/Return tangent.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI> <B>Clear kommando</B> tillåter dig rengöra main chatt bildskärmen och visa föregående 5 meddelanden sänd på din bildskärmen.<br />Skriv "/clear" utan citationstecken.
		<P>
		<?php
	}
	else
	{
		?>
		<LI> <B>Order kommando</B> tillåter dig växla mellan nya meddelanden framträda vid topp av bildskärmen eller vid botten.<br />Skriv "/order" utan citationstecken.
		<P>
		<?php
	};
	?>
	<LI> <B>Notify kommando</B> tillåter dig växla till eller från valmöjlighet av seende notiser när andra användare skrivin sig eller gå ur chatt rum. Som default denna valmöjlighet är <?php echo(C_NOTIFY ? "on" : "från"); ?> och notiser <?php echo(C_NOTIFY ? "kommer att" : "kommer inte att"); ?> att ses.<br />Skriva "/notify" utan citationstecken.
	<P>
	<LI> <B>Timestamp kommando</B> tillåter dig växla till eller från val av seende tids meddelande som var avsänd före/innan varje meddelande och server tid i status raden. som default denna valmöjlighet är <?php echo(C_SHOW_TIMESTAMP ? "till" : "från"); ?>.<br />Skriva "/timestamp" utan citationstecken.
	<P>
	<LI> <B>Refresh kommando</B> tillåter dig att justera värde vid vilken avsänd meddelande är uppdaterad på din bildskärmen. Som default värde är förnärvarande <?php echo(C_MSG_REFRESH); ?> sekunder. Att ändra värde skriva "/refresh n" utan citationstecken där n är tid i sekunder av ny uppdaterings värde.
	<P>
	<I>För exempel:</I> /refresh 5
	<P>
	kommer att ändra värde till 5 seconds. *Var försiktig, om n är mindre än 3, uppdatering är återställt till uppdatera inte vid allt (användbar när du vill läsa massor av gammal meddelanden utan att störa/förvirra)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI> <B>Show kommando</B> tillåter dig att justera antalet meddelanden visningsbara på din bildskärmen. Att ändra default nummer/antal, skriv "/show n" utan citationstecken där n är nummer/antal av visningsbara meddelanden.
		<P>
		<I>För exempel:</I> /show 50
		<P>
		kommer att gjöra de 50 nyaste meddelanden att vara visningsbara på din bildskärmen. Om alla meddelanden inte rymms inom meddelande boxens ramar, en vertikalrulnings kommer att framträda på höger sidan av meddelande box.</UL>
		<?php
	}
	else
	{
		?>
		<LI> <B>Show och Last kommandon</B> tillåta dig rengöra bildskärmen och visa senaste <I>n</I> meddelanden sändt till din bildskärmen. Skriv "/show n" eller "/last n" utan citationstecken där n är antalet visningsbara meddelanden.
		<P>
		<I>För exempel:</I> /show 50 or /last 50
		<P>
		kommer att rengöra meddelande ram och orsaka att 50 nyaste meddelanden kommer att vara visningsbara på din bildskärmen. Om alla meddelanden kan inte vara visad inom meddelande ram, en bläddra raden kommer att framträda på höger sidan av meddelande box.</UL>
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

<FONT SIZE="+1"><A NAME="help"><B>Hjälp kommando:</B></A></FONT>
<P>
När du är inne i ett chat rum,kan du ta fram hjälp popup att klicka på <IMG SRC="images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="Hjälp"> bild som sitter före inmatningsfällt. Du kan även skriva <B>"/help" eller "/?" kommandon</B> i inmatningsfällt.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatars:</B></A></FONT>
<P>Avatars are graphic image icons that represent chatters. Only registered users may change their avatar. Registered users may open their Profile (see /profile command) and click on the avatar image to select it from a menu of images, or to input a URL to a graphic image available anywhere on the internet (only images publicly accessible, not password protected sites). Images should be browser-viewable (.gif, .jpg, etc. ) 32 x 32 pixel graphic files for best display.
<P>Clicking on a person’s avatar in the message frame will popup up that person’s profile (see <A HREF="#whois">/whois command</A>).
Clicking on your own avatar on the user’s list  will invoke the /profile command, if you are registered.
If you are not registered, clicking on your own (system’s default) avatar will bring up an alert to encourage you to register.
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
	<P>Du kan har grafiska smilies inne i din meddelanden. Se här nere kod du kan skriva intill meddelande en för var och en similes.
	<P>
	<I>För exempel</I>, skriv texten "Hej Jack :)" utan citationstecken meddelande som visas= Hej Jack <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> i chatt fönster.
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
	<FONT SIZE="+1"><A NAME="text"><B>Text Formaterande:</B></A></FONT>
	<P>
	Text kan vara fet, kursiverad eller understruken med htmlkod taggar &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; eller &LT;U&GT; &LT;/U&GT HTML tags.
	<P>
	<I>För exempel</I>, &LT;B&GT;detta text&LT;/B&GT; kommer att producera <B>detta text</B>.
	<P>
	Att skapa hyperlink för e-post adress eller URL, skriv adress (utan några HTML taggs). Hyperlink kommer att skapas automatiskt.
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
<b><?php echo(L_COL_HELP_SUB3); ?></b><br /><?php echo(L_COLOR_HEAD_SETTINGS); ?><br /><?php if (COLOR_FILTERS) echo(L_COLOR_HEAD_SETTINGSa."<br />"); ?><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("Administratör"); elseif ($CookieStatus == "m") echo("ordningsman"); elseif ($CookieStatus == "u") echo("Gäst (Normal)"); else echo("Registerade (Normal)");?></b><br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Bjudain någon att komma med till ditt nuvarande chatt rum:</B></A></FONT>
<P>
Du kan använda <B>invite command</B> att bjuda in en användare till rum där du chattar.
<P>
<I>För exempel:</I> /invite Jack
<P>
kommer att skicka privat meddelande till Jack, ger förslag att han kommer med till din nuvarande chatt rum. Denna meddelande innehåller namn av mål rum och denna namn framträder som en länk.
<P>
Notera att du kan har mer än en användarnamn i inbjuda kommandot (expl. "/invite Jack,Helen,Alf"). De måste vara separerad med kommatecken (,) utan mellanrum.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Ändring av rum:</B></A></FONT>
<P>
Lista till höger av bildskärmen förser en lista av chatt rums och användare som är förnärvarande i dessa rum. Att lämna rum du är i och flytta till en av dessa rum, helt enkelt klicka en gång på namnet på det rum. Tomma rums framträda inte på denna lista. Du kan/får flytta till ett tom rum du skriver <B>kommandot "/join #rumsnamn"</B> utan citationstecken.
<P>
<I>För exempel:</I> /join #RedRoom
<P>
kommer att flytta dig till RedRoom.
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Om du är registrerat användare, du" : "<br /><P>Du");
	?>
	 kan/får även skapa ny rum med samma kommando. Men då måste du specifiera dennes type: 0 står för privat, 1 för öppen/publika (start värde).
	<P>
	<I>For example:</I> /join 0 #MyRoom
	<P>
	kommer att skapa ett nytt privat rum (antagande, har inte redan skapats med det namn) kallad MyRoom och flytta dig till det.
	<P>
	Roms namn får inte innehålla kommatecken eller omvänt snedtecken (\).<?php if (C_NO_SWEAR) echo(" Den får icke innehålla \"svär ord\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Modifiera din egen profil inne i chat:</B></FONT>
<P>
<B>Profil kommando</B> skapar ett separat popup fönster i vilken du kan redigera din användare profil och modifiera den förutom ditt nicknamn och lösenord (du måste använda länk vid starta sida till gör/göra denna/detta).<br />Type /profile
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Återkalla föregående meddelande eller kommando du har framlaggt:</B></FONT>
<P>
<B>! kommando</B> återkallar föregående meddelande eller kommando du har framlaggt.<br />Skriv /!
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Ge svar till en specifik användare:</B></FONT>
<P>
Klicka en gång på namn av annan användare från listan (till höger av bildskärmen) kommer att lagga deras "användarnamn>" till din inmatningsfällt. Denna finess tillåter dig att med lätthet direkt öppen meddelande till en användare, kanske i svaret till någonting han eller hon har avsänd ovan.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Privat meddelanden:</B></A></FONT>
<P>
Att skicka privat meddelande till annan användare förnärvarande i ditt chatt rum, skriv <B>kommando "/msg användarnamn meddelande text" eller "/to användarnamn meddelande text"</B> utan citationstecken.
<P>
<I>För exempel, där Jack är användarnamn:</I> /msg Jack Hejsan , hur är det?
<P>
Meddelande kommer att framträda till Jack och dig själv, men inga andra användare kommer att se meddelande.
<P>
Notera att klickande på nicknamn av en meddelande avsändare i meddelande ram kommer att automatiskt lägga till denna kommando till inmatningsfält för meddelanden.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Actions:</B></A></FONT>
<P>
Att beskriva vad du håller på du kan använda <B>kommando "/me action"</B> utan citationstecken.
<P>
<I>For example:</I> Om Jack sänder meddelande "/me är och dricker kaffe" i meddelande ram kommer det att visas "<B>* Jack</B> är och driker kaffe".
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorera andra användare:</B></A></FONT>
<P>
Att ignorera allt posts från andra användare, skriv <B>kommando "/ignore användarnamn"</B> utan citationstecken.
<P>
<I>För exempel:</I> /ignore Jack
<P>
Från detta tidpunkt på denna avdelning, inga meddelanden av användaren Jack kommer att visas på din bildskärm.
<P>
Att lista användare vems meddelanden är ignorerade, bara skriv <B>kommando "/ignore"</B> utan citationstecken.
<P>
Att återvisa meddelande av en ignorerade användare,skriv <B>kommandot "/ignore - användarnamn"</B> utan citationstecken där "-" är en bindestreck. <P>
<P>
<I>För exempel:</I> /ignore - Jack
<P>
Nu kommer alla meddelanden av Jack avsänd under nuvarande chat session kommer att visas på din bildskärm, inkluderande de där meddelanden avsänd av Jack Före du skrev denna kommando.
 Om du inte specifiera en användarnamn efter bindestreck, ditt "ignorerade lista" kommer att vara rensade.
<P>
Notera detta, du kan placera mer än en användarnamn i ignorera kommando (eg "/ignore Jack,Helen,Alf" eller "/ignore - Jack,Alf"). De måste vara separerad med kommatecken (,) utan mellanrum.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Få upplysningar om Användare:</B></A></FONT>
<P>
Att se öppen upplysningar om en användare, skriv <B>kommando "/whois användarnamn"</B> utan citationstecken.
<P>
<I>För Exempel:</I> /whois Jack
<P>
Där ’Jack’ är användarnamn. Denna kommando kommer att skapa ett separat pop-up fönster som kommer att visa publicerade tillgänglig upplysningar om denna användare. Använd ditt eget namn att checka hur din profil info visas för andra användare med samma kommando.
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
	Att exportera meddelanden (underrättelser borttagen) till en lokala HTML fil, skriv <B>kommando "/save n"</B> utan citationstecken.
	<P>
	<I>För Exempel:</I> /save 5
	<P>
	Där ’5’ är antal meddelanden som ska sparas. Om n är inte specifierat, alla tillgängliga meddelanden sänd till nuvarande rum kommer att tas med i beräkning.
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Kommandon bara för adminstratör och ordningsmän </U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Skicka en tillkännagivande:</B></A></FONT>
<P>
Administratör kan/får göra system tillkännagivande till alla rum och nå alla användare förnärvarande inloggad med <B>announce kommando</B>.
<P>
<I>För exempel: /announce Chatt systemet kommer att gå ner för skötsel ikväll vid 20:00.</I>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
Där är annan användbar tillkännagivande kommando för rollsspel chats; administratör eller ordningsmän i ett rum kan/får även skicka ett tillkännagivande till alla användare i nuvarande rum eller alla rums med <B>room kommando</B>.
<P>
<I>För exempel: /room möte startar vid 15:00.</I> eller <I>/room * möte startar vid 15:00 i Stab rum.</I>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Sparka ut en användare:</B></FONT>
<P>
Ordningsmän kan sparka en användare och administratör kan sparka en användare eller en ordningsman med <B>kick kommando</B>. Utom administratör, användaren som ska sparkar måste vara i nuvarande rum.
<P>
<I>För exempel</I>, om Jack är namn av användaren att sparka bort:</I> /kick Jack</I>.
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
	Ordningsmän och administratör kan förvisa en användare eller en ordningsman med <B>ban kommando</B>.<br />
	Administratör kan förvisa en användare från annan rum än han/hon är chattandes i. Han kan även förvisa en användare för alltid och från chat med kommandot "<B>*</B>" måste vara infogad före användarens nicknamn att bli fördriven.
	<P>
	<I>För exempel</I>, om Jack är namn av användaren att förvisa: <I>/ban Jack</I> eller <I>/ban * Jack</I>
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Befordra/Sänka ner en användare till/från ordningsman:</B></A></FONT>
<P>
Ordningsmän och administratör kan befordra/upphöja andra användare till ordningsman med <B>promote kommando</B>.
<P>
<I>För exempel</I>, om Jack är namn av användaren att befordra: <I>/promote Jack</I>
<P>
Bara administratör har tillgång för motsattsen (sänka en ordningsman till enkel användare) att använda <B>demote kommando</B>.
<P>
<I>För exempel</I>, om Jack är namn av ordningsman att sänka ner: <I>/demote Jack</I> eller <I>/demote * Jack</I> (kommer att sänka ner honom från nuvarande eller alla rum).
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
</BODY>
</HTML>
<?php
?>