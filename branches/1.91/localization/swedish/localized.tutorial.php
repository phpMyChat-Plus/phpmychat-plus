<?php
// File : swedish/localized.tutorial.php - plus version (02.05.2007 - rev.4)
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
<TITLE>Svensk Handledning f&ouml;r <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Svensk Handledning f&ouml;r <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</B></FONT></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Inneh&aring;ll av denna Handledning</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Val av spr&aring;k</A><br />
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
	<A HREF="#connection_state" CLASS="topLink">F&ouml;rst&aring; kontakt/anslutnings tillst&aring;nd/status</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">S&auml;nder Meddelande</A><br />
<A HREF="#users_list" CLASS="topLink">F&ouml;rst&aring; anv&auml;ndare lista</A><br />
<A HREF="#exit" CLASS="topLink">L&auml;mna chatt rum/kanal</A><br />
<A HREF="#users_popup" CLASS="topLink">Veta vilka &auml;r och chattar utan att logga in sj&auml;lv</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Finjustera Chatt utseende</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Finesser och Kommandon:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">Hj&auml;lp kommando</A><br />
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
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Grafisk smilies/sinnestillst&aring;nd</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#text" CLASS="topLink">Text Formatering</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Inbjudan till anv&auml;ndare att komma med till din/er nuvarande chatt rum</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">&Auml;ndring fr&aring;n en chatt rum till annan</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Privat Meddelanden</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS="topLink">H&auml;ndelser</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Ignorera/ nonchalera andra Anv&auml;ndare</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">F&aring; &Ouml;ppen Upplysningar om andra Anv&auml;ndare</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#save" CLASS="topLink">Spara meddelanden</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Speciella kommandon f&ouml;r ordningsm&auml;n och/eller administrat&ouml;r:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Skicka tillk&auml;nnagivande</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#kick" CLASS="topLink">F&ouml;rvisning av anv&auml;ndare</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#banish" CLASS="topLink">F&ouml;rvisa en anv&auml;ndare</A><br />
	<?php
};
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#promote" CLASS="topLink">Befordra/Upph&ouml;ja/S&auml;nka ner status f&ouml;r en anv&auml;ndare till/from ordningsman:</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Val av spr&aring;k:</B></A></FONT>
	<P>
	Du kan v&auml;lj spr&aring;k bland de d&auml;r vilka <?php echo(APP_NAME); ?> har blivit &ouml;versatta klicka en av flaggor p&aring; starta sidan. I exempel h&auml;r, anv&auml;ndare v&auml;ljer franska som spr&aring;k:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Flaggor f&ouml;r spr&aring;k val">
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Inloggning:</B></A></FONT>
<P>
Om du har redan registrerat, helt enkelt logga in, skriv din anv&auml;ndarnamn och l&ouml;senord. Sedan v&auml;lj vilken chatt rum du vill komma till, tryck '<?php echo(L_SET_14); ?>' knapp.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Annat fall du m&aring;ste <A HREF="#register">registrera</A> f&ouml;rst.
	<?php
}
else
{
	?>
<P>
	Eller du kan <A HREF="#register">registrera</A> eller helt enkelt skriva in dig i ett publika rum men din nicknamn/aliasnamn,namnet kommer inte att vara reserverade (andra anv&auml;ndare kan/f&aring;r anv&auml;nda samma nicknamn efter du har loggat ut).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Till Registrering:</B></A></FONT>
<P>
Om du har inte &auml;nnu registrerat<?php if (!C_REQUIRE_REGISTER) echo(" och skulle vilja "); ?>, v&auml;nligen v&auml;lj registrering val. Litet pop-up f&ouml;nster kommer att framtr&auml;da.
<P>
<UL>
	<LI>F&ouml;rst, skapa anv&auml;ndarnamn<?php if (!C_EMAIL_PASWD) echo(" och l&ouml;senord"); ?> f&ouml;r dig sj&auml;lv genom att, skriva det in till r&auml;tt f&auml;llt. Anv&auml;ndarnamn du v&auml;ljer &auml;r det nicknamn som kommer att vara automatiskt visade in i chat rum. Den kan inte inneh&aring;lla mellanrum, kommatecken eller snest&auml;rkbak&aring;t (\).
<?php if (C_NO_SWEAR) echo(" Den f&aring;r inte inneh&aring;lla \"sv&auml;r ord\"."); ?>
	<LI>Andra, v&auml;nligen skrivin ditt f&ouml;rnamn, efternamn, och din e-post adress. F&ouml;r att registrera till chat, allt denna upplysningar m&aring;ste vara f&ouml;rsedd. k&ouml;n/genus upplysningar &auml;r valfri.
	<LI>Om du har hemsida, du kan/f&aring;r skriva in URL till f&auml;lltet.
	<LI>Spr&aring;k f&auml;lt kan hj&auml;lpa andra anv&auml;ndare i framtida diskussioner. De kommer att veta vilken spr&aring;k(er) du/ni f&ouml;rst&aring;.
	<LI>Slutligen, om du &ouml;nskar/vill till&aring;ta din e-post adress till vara visad av andra deltagare, v&auml;nligen kontrollera l&auml;nk n&auml;sta till att "visa e-post i &ouml;ppen upplysningar". Om du vill inte att din e-post address skall vara visningsbara, l&auml;mna ruta omarkerad.
	<LI>Sedan, tryck Registrera knapp och ditt konto kommer att skapas. Om du &ouml;nskar stoppa vid n&auml;r som helst, utan registrera, tryck St&auml;ng knapp.
</UL>
<P>
<A NAME="modProfile"></A>Naturligtvis, registrerade anv&auml;ndare kan modifieras sitt profil senare<?php if (C_SHOW_DEL_PROF) echo("/ta bort"); ?> genom att klicka p&aring; r&auml;tt sorts <?php echo((!C_SHOW_DEL_PROF ? "l&auml;nk" : "l&auml;nkar")); ?>.<br />
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
	Registrerade anv&auml;ndare kan skapa rum. Privat rums kan bara vara &aring;tkomliga av anv&auml;ndare som vet deras namn och kommer aldrig att vara visad utom f&ouml;r anv&auml;ndare som &auml;r inne.<br />
	<P>
	Roms namn f&aring;r inte inneh&aring;lla kommatecken eller omv&auml;nt snedtecken (\).<?php if (C_NO_SWEAR) echo(" Det f&aring;r inte heller inneh&aring;lla \"sv&auml;r ord\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>F&ouml;rst&aring; kontakt/anslutnings tillst&aring;nd/status:</B></A></FONT>
	<P>
	En bild visar din kontakt status, &auml;r synlig vid top-h&ouml;ger h&ouml;rn av bildsk&auml;rmen. Den har f&aring;r tre former :
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Ingen kontakt"> n&auml;r ingen kontakt &auml;r n&ouml;dv&auml;ndig ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Anknytande"> n&auml;r anslutning &auml;r inkommande ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Anslutning misslyckades"> n&auml;r anslutning misslyckades.
	</UL>
	<P>
	I tredje fall, att klicka p&aring; r&ouml;d "knapp" kommer att starta en ny anslutnings f&ouml;rs&ouml;k.
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>S&auml;nder meddelanden:</B></A></FONT>
<P>
Att posta ett meddelande till chatt rum, skriva din text intill texten ruta i l&auml;gre v&auml;nster h&ouml;rn och tryck Enter/Return tangent till att skicka det. Meddelanden fr&aring;n alla anv&auml;ndare bl&auml;ddra i chatt box.<br />
<?php if (C_NO_SWEAR) echo("Notera att \"sv&auml;r ord\" &auml;r borttagen fr&aring;n meddelanden."); ?>
<P>
Du f&aring;r &auml;ndra f&auml;rg av texten av din meddelanden, v&auml;lj ny f&auml;rg fr&aring;n dropmenun till h&ouml;ger av text box/inmatnings f&auml;llt.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>F&ouml;rst&aring; anv&auml;ndare lista (inte f&ouml;r anv&auml;ndare popup f&ouml;nster):</B></A></FONT>
<P>
<OL>
	Tv&aring; grund regler &aring;r definierade f&ouml;r anv&auml;ndar lista:<br />
	<LI>en liten icon som visar k&ouml;n/genus &auml;r visad f&ouml;re nicknamn av registrerat anv&auml;ndare (klickande p&aring; den kommer att starta <A HREF="#whois">vem &auml;r popup</A> f&ouml;r denna anv&auml;ndare), medan oregistrerad anv&auml;ndare har ingenting, men uttrycksl&ouml;s mellanrum visas f&ouml;re deras nicknamn;<br />
	<LI>nicknamn av administrat&ouml;r eller ordningsman &auml;r kursiverad.
</OL>
<P><I>F&ouml;r exempel</I>, fr&aring;n sammans&auml;ttning nedan kan du avg&ouml;ra anv&auml;ndarens status:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="anv&auml;ndar lista">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas &auml;r administrat&ouml;r eller ordningsm&auml;n av phpMyChat rum;<br /><br />
		<LI>alien (vems k&ouml;n/genus &auml;r ok&auml;nt), Jezek2 och Caridad &auml;r registrerade anv&auml;ndare med inga extra "krafter" f&ouml;r phpMyChat rum;<br /><br />
		<LI>lolo &auml;r en enkel oregistrerad anv&auml;ndare.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>L&auml;mna chatt rum:</B></A></FONT>
<P>
Att g&aring; ur chatt, helt enkelt klicka en g&aring;ng p&aring; "Sluta chatta". Alternativt, du f&aring;r skriva en av f&ouml;ljande kommandon in till inmatnings f&auml;llt:<br />
/exit<br />
/bye<br />
/quit<br />
Dessa kommandon kan/f&aring;r kompleteras med meddelande att skickas innan du l&auml;mnar chatt rum.
<I>F&ouml;r exempel :</I> /quit CU snart!
<P>
kommer att skicka meddelande "CU snart!" i start ram och loggar dig ut.

<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Att Veta vem som &auml;r och chattar utan att vara inloggad :</B></A></FONT>
<P>
Du kan klicka p&aring; l&auml;nk d&auml;r det visar nummer/antal av anslutna anv&auml;ndare vid starta sida, eller, om du &auml;r chatting, klicka p&aring; bilden <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Anv&auml;ndare popup"> vid top-h&ouml;ger av bildsk&auml;rmen att &ouml;ppna ett oberoende f&ouml;nster det kommer att visa lista av kopplad anv&auml;ndare, och rum de &auml;r i, i n&auml;ra riktig/real tid.<br />
Titel av detta f&ouml;nster inneh&aring;ller anv&auml;ndanamn, om de &auml;r mindre &auml;n tre,i annat fall antal anv&auml;ndare och aktiva rum(s) .
<P>
Klickande p&aring; <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Ljud"> ikon vid topp av denna popup kommer att ljud p&aring;/st&auml;nga av ljud vid anv&auml;ndarens intr&auml;de.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Finjustering chatt utseende:</B></A></FONT>
<P>
D&auml;r finns m&aring;nga flera v&auml;gar f&ouml;r att finjustera utseendet av chatt rummet. Att &auml;ndra inst&auml;llningar, helt enkelt skriva r&auml;tt sorts kommando intill inmatningsf&auml;llt och trycka Enter/Return tangent.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI> <B>Clear kommando</B> till&aring;ter dig reng&ouml;ra main chatt bildsk&auml;rmen och visa f&ouml;reg&aring;ende 5 meddelanden s&auml;nd p&aring; din bildsk&auml;rmen.<br />Skriv "/clear" utan citationstecken.
		<P>
		<?php
	}
	else
	{
		?>
		<LI> <B>Order kommando</B> till&aring;ter dig v&auml;xla mellan nya meddelanden framtr&auml;da vid topp av bildsk&auml;rmen eller vid botten.<br />Skriv "/order" utan citationstecken.
		<P>
		<?php
	};
	?>
	<LI> <B>Notify kommando</B> till&aring;ter dig v&auml;xla till eller fr&aring;n valm&ouml;jlighet av seende notiser n&auml;r andra anv&auml;ndare skrivin sig eller g&aring; ur chatt rum. Som default denna valm&ouml;jlighet &auml;r <?php echo(C_NOTIFY ? "on" : "fr&aring;n"); ?> och notiser <?php echo(C_NOTIFY ? "kommer att" : "kommer inte att"); ?> att ses.<br />Skriva "/notify" utan citationstecken.
	<P>
	<LI> <B>Timestamp kommando</B> till&aring;ter dig v&auml;xla till eller fr&aring;n val av seende tids meddelande som var avs&auml;nd f&ouml;re/innan varje meddelande och server tid i status raden. som default denna valm&ouml;jlighet &auml;r <?php echo(C_SHOW_TIMESTAMP ? "till" : "fr&aring;n"); ?>.<br />Skriva "/timestamp" utan citationstecken.
	<P>
	<LI> <B>Refresh kommando</B> till&aring;ter dig att justera v&auml;rde vid vilken avs&auml;nd meddelande &auml;r uppdaterad p&aring; din bildsk&auml;rmen. Som default v&auml;rde &auml;r f&ouml;rn&auml;rvarande <?php echo(C_MSG_REFRESH); ?> sekunder. Att &auml;ndra v&auml;rde skriva "/refresh n" utan citationstecken d&auml;r n &auml;r tid i sekunder av ny uppdaterings v&auml;rde.
	<P>
	<I>F&ouml;r exempel:</I> /refresh 5
	<P>
	kommer att &auml;ndra v&auml;rde till 5 seconds. *Var f&ouml;rsiktig, om n &auml;r mindre &auml;n 3, uppdatering &auml;r &aring;terst&auml;llt till uppdatera inte vid allt (anv&auml;ndbar n&auml;r du vill l&auml;sa massor av gammal meddelanden utan att st&ouml;ra/f&ouml;rvirra)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI> <B>Show kommando</B> till&aring;ter dig att justera antalet meddelanden visningsbara p&aring; din bildsk&auml;rmen. Att &auml;ndra default nummer/antal, skriv "/show n" utan citationstecken d&auml;r n &auml;r nummer/antal av visningsbara meddelanden.
		<P>
		<I>F&ouml;r exempel:</I> /show 50
		<P>
		kommer att gj&ouml;ra de 50 nyaste meddelanden att vara visningsbara p&aring; din bildsk&auml;rmen. Om alla meddelanden inte rymms inom meddelande boxens ramar, en vertikalrulnings kommer att framtr&auml;da p&aring; h&ouml;ger sidan av meddelande box.</UL>
		<?php
	}
	else
	{
		?>
		<LI> <B>Show och Last kommandon</B> till&aring;ta dig reng&ouml;ra bildsk&auml;rmen och visa senaste <I>n</I> meddelanden s&auml;ndt till din bildsk&auml;rmen. Skriv "/show n" eller "/last n" utan citationstecken d&auml;r n &auml;r antalet visningsbara meddelanden.
		<P>
		<I>F&ouml;r exempel:</I> /show 50 or /last 50
		<P>
		kommer att reng&ouml;ra meddelande ram och orsaka att 50 nyaste meddelanden kommer att vara visningsbara p&aring; din bildsk&auml;rmen. Om alla meddelanden kan inte vara visad inom meddelande ram, en bl&auml;ddra raden kommer att framtr&auml;da p&aring; h&ouml;ger sidan av meddelande box.</UL>
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

<FONT SIZE="+1"><A NAME="help"><B>Hj&auml;lp kommando:</B></A></FONT>
<P>
N&auml;r du &auml;r inne i ett chat rum,kan du ta fram hj&auml;lp popup att klicka p&aring; <IMG SRC="images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="Hj&auml;lp"> bild som sitter f&ouml;re inmatningsf&auml;llt. Du kan &auml;ven skriva <B>"/help" eller "/?" kommandon</B> i inmatningsf&auml;llt.
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
<P>Clicking on a person's avatar in the message frame will popup up that person's profile (see <A HREF="#whois">/whois command</A>).
Clicking on your own avatar on the user's list  will invoke the /profile command, if you are registered.
If you are not registered, clicking on your own (system's default) avatar will bring up an alert to encourage you to register.
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
	<P>Du kan har grafiska smilies inne i din meddelanden. Se h&auml;r nere kod du kan skriva intill meddelande en f&ouml;r var och en similes.
	<P>
	<I>F&ouml;r exempel</I>, skriv texten "Hej Jack :)" utan citationstecken meddelande som visas= Hej Jack <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> i chatt f&ouml;nster.
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
	<I>F&ouml;r exempel</I>, &LT;B&GT;detta text&LT;/B&GT; kommer att producera <B>detta text</B>.
	<P>
	Att skapa hyperlink f&ouml;r e-post adress eller URL, skriv adress (utan n&aring;gra HTML taggs). Hyperlink kommer att skapas automatiskt.
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
<b><?php echo(L_COL_HELP_SUB3); ?></b><br /><?php echo(L_COLOR_HEAD_SETTINGS); ?><br /><?php if (COLOR_FILTERS) echo(L_COLOR_HEAD_SETTINGSa."<br />"); ?><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("Administrat&ouml;r"); elseif ($CookieStatus == "m") echo("ordningsman"); elseif ($CookieStatus == "u") echo("G&auml;st (Normal)"); else echo("Registerade (Normal)");?></b><br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Bjudain n&aring;gon att komma med till ditt nuvarande chatt rum:</B></A></FONT>
<P>
Du kan anv&auml;nda <B>invite command</B> att bjuda in en anv&auml;ndare till rum d&auml;r du chattar.
<P>
<I>F&ouml;r exempel:</I> /invite Jack
<P>
kommer att skicka privat meddelande till Jack, ger f&ouml;rslag att han kommer med till din nuvarande chatt rum. Denna meddelande inneh&aring;ller namn av m&aring;l rum och denna namn framtr&auml;der som en l&auml;nk.
<P>
Notera att du kan har mer &auml;n en anv&auml;ndarnamn i inbjuda kommandot (expl. "/invite Jack,Helen,Alf"). De m&aring;ste vara separerad med kommatecken (,) utan mellanrum.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>&Auml;ndring av rum:</B></A></FONT>
<P>
Lista till h&ouml;ger av bildsk&auml;rmen f&ouml;rser en lista av chatt rums och anv&auml;ndare som &auml;r f&ouml;rn&auml;rvarande i dessa rum. Att l&auml;mna rum du &auml;r i och flytta till en av dessa rum, helt enkelt klicka en g&aring;ng p&aring; namnet p&aring; det rum. Tomma rums framtr&auml;da inte p&aring; denna lista. Du kan/f&aring;r flytta till ett tom rum du skriver <B>kommandot "/join #rumsnamn"</B> utan citationstecken.
<P>
<I>F&ouml;r exempel:</I> /join #RedRoom
<P>
kommer att flytta dig till RedRoom.
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Om du &auml;r registrerat anv&auml;ndare, du" : "<br /><P>Du");
	?>
	 kan/f&aring;r &auml;ven skapa ny rum med samma kommando. Men d&aring; m&aring;ste du specifiera dennes type: 0 st&aring;r f&ouml;r privat, 1 f&ouml;r &ouml;ppen/publika (start v&auml;rde).
	<P>
	<I>For example:</I> /join 0 #MyRoom
	<P>
	kommer att skapa ett nytt privat rum (antagande, har inte redan skapats med det namn) kallad MyRoom och flytta dig till det.
	<P>
	Roms namn f&aring;r inte inneh&aring;lla kommatecken eller omv&auml;nt snedtecken (\).<?php if (C_NO_SWEAR) echo(" Den f&aring;r icke inneh&aring;lla \"sv&auml;r ord\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Modifiera din egen profil inne i chat:</B></FONT>
<P>
<B>Profil kommando</B> skapar ett separat popup f&ouml;nster i vilken du kan redigera din anv&auml;ndare profil och modifiera den f&ouml;rutom ditt nicknamn och l&ouml;senord (du m&aring;ste anv&auml;nda l&auml;nk vid starta sida till g&ouml;r/g&ouml;ra denna/detta).<br />Type /profile
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>&Aring;terkalla f&ouml;reg&aring;ende meddelande eller kommando du har framlaggt:</B></FONT>
<P>
<B>! kommando</B> &aring;terkallar f&ouml;reg&aring;ende meddelande eller kommando du har framlaggt.<br />Skriv /!
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Ge svar till en specifik anv&auml;ndare:</B></FONT>
<P>
Klicka en g&aring;ng p&aring; namn av annan anv&auml;ndare fr&aring;n listan (till h&ouml;ger av bildsk&auml;rmen) kommer att lagga deras "anv&auml;ndarnamn>" till din inmatningsf&auml;llt. Denna finess till&aring;ter dig att med l&auml;tthet direkt &ouml;ppen meddelande till en anv&auml;ndare, kanske i svaret till n&aring;gonting han eller hon har avs&auml;nd ovan.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Privat meddelanden:</B></A></FONT>
<P>
Att skicka privat meddelande till annan anv&auml;ndare f&ouml;rn&auml;rvarande i ditt chatt rum, skriv <B>kommando "/msg anv&auml;ndarnamn meddelande text" eller "/to anv&auml;ndarnamn meddelande text"</B> utan citationstecken.
<P>
<I>F&ouml;r exempel, d&auml;r Jack &auml;r anv&auml;ndarnamn:</I> /msg Jack Hejsan , hur &auml;r det?
<P>
Meddelande kommer att framtr&auml;da till Jack och dig sj&auml;lv, men inga andra anv&auml;ndare kommer att se meddelande.
<P>
Notera att klickande p&aring; nicknamn av en meddelande avs&auml;ndare i meddelande ram kommer att automatiskt l&auml;gga till denna kommando till inmatningsf&auml;lt f&ouml;r meddelanden.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Actions:</B></A></FONT>
<P>
Att beskriva vad du h&aring;ller p&aring; du kan anv&auml;nda <B>kommando "/me action"</B> utan citationstecken.
<P>
<I>For example:</I> Om Jack s&auml;nder meddelande "/me &auml;r och dricker kaffe" i meddelande ram kommer det att visas "<B>* Jack</B> &auml;r och driker kaffe".
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorera andra anv&auml;ndare:</B></A></FONT>
<P>
Att ignorera allt posts fr&aring;n andra anv&auml;ndare, skriv <B>kommando "/ignore anv&auml;ndarnamn"</B> utan citationstecken.
<P>
<I>F&ouml;r exempel:</I> /ignore Jack
<P>
Fr&aring;n detta tidpunkt p&aring; denna avdelning, inga meddelanden av anv&auml;ndaren Jack kommer att visas p&aring; din bildsk&auml;rm.
<P>
Att lista anv&auml;ndare vems meddelanden &auml;r ignorerade, bara skriv <B>kommando "/ignore"</B> utan citationstecken.
<P>
Att &aring;tervisa meddelande av en ignorerade anv&auml;ndare,skriv <B>kommandot "/ignore - anv&auml;ndarnamn"</B> utan citationstecken d&auml;r "-" &auml;r en bindestreck. <P>
<P>
<I>F&ouml;r exempel:</I> /ignore - Jack
<P>
Nu kommer alla meddelanden av Jack avs&auml;nd under nuvarande chat session kommer att visas p&aring; din bildsk&auml;rm, inkluderande de d&auml;r meddelanden avs&auml;nd av Jack F&ouml;re du skrev denna kommando.
 Om du inte specifiera en anv&auml;ndarnamn efter bindestreck, ditt "ignorerade lista" kommer att vara rensade.
<P>
Notera detta, du kan placera mer &auml;n en anv&auml;ndarnamn i ignorera kommando (eg "/ignore Jack,Helen,Alf" eller "/ignore - Jack,Alf"). De m&aring;ste vara separerad med kommatecken (,) utan mellanrum.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>F&aring; upplysningar om Anv&auml;ndare:</B></A></FONT>
<P>
Att se &ouml;ppen upplysningar om en anv&auml;ndare, skriv <B>kommando "/whois anv&auml;ndarnamn"</B> utan citationstecken.
<P>
<I>F&ouml;r Exempel:</I> /whois Jack
<P>
D&auml;r &#39;Jack&#39; &auml;r anv&auml;ndarnamn. Denna kommando kommer att skapa ett separat pop-up f&ouml;nster som kommer att visa publicerade tillg&auml;nglig upplysningar om denna anv&auml;ndare. Anv&auml;nd ditt eget namn att checka hur din profil info visas f&ouml;r andra anv&auml;ndare med samma kommando.
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
	Att exportera meddelanden (underr&auml;ttelser borttagen) till en lokala HTML fil, skriv <B>kommando "/save n"</B> utan citationstecken.
	<P>
	<I>F&ouml;r Exempel:</I> /save 5
	<P>
	D&auml;r &#39;5&#39; &auml;r antal meddelanden som ska sparas. Om n &auml;r inte specifierat, alla tillg&auml;ngliga meddelanden s&auml;nd till nuvarande rum kommer att tas med i ber&auml;kning.
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Kommandon bara f&ouml;r adminstrat&ouml;r och ordningsm&auml;n </U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Skicka en tillk&auml;nnagivande:</B></A></FONT>
<P>
Administrat&ouml;r kan/f&aring;r g&ouml;ra system tillk&auml;nnagivande till alla rum och n&aring; alla anv&auml;ndare f&ouml;rn&auml;rvarande inloggad med <B>announce kommando</B>.
<P>
<I>F&ouml;r exempel: /announce Chatt systemet kommer att g&aring; ner f&ouml;r sk&ouml;tsel ikv&auml;ll vid 20:00.</I>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
D&auml;r &auml;r annan anv&auml;ndbar tillk&auml;nnagivande kommando f&ouml;r rollsspel chats; administrat&ouml;r eller ordningsm&auml;n i ett rum kan/f&aring;r &auml;ven skicka ett tillk&auml;nnagivande till alla anv&auml;ndare i nuvarande rum eller alla rums med <B>room kommando</B>.
<P>
<I>F&ouml;r exempel: /room m&ouml;te startar vid 15:00.</I> eller <I>/room * m&ouml;te startar vid 15:00 i Stab rum.</I>
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Sparka ut en anv&auml;ndare:</B></FONT>
<P>
Ordningsm&auml;n kan sparka en anv&auml;ndare och administrat&ouml;r kan sparka en anv&auml;ndare eller en ordningsman med <B>kick kommando</B>. Utom administrat&ouml;r, anv&auml;ndaren som ska sparkar m&aring;ste vara i nuvarande rum.
<P>
<I>F&ouml;r exempel</I>, om Jack &auml;r namn av anv&auml;ndaren att sparka bort:</I> /kick Jack</I>.
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>F&ouml;rvisa en anv&auml;ndare:</B></A></FONT>
	<P>
	Ordningsm&auml;n och administrat&ouml;r kan f&ouml;rvisa en anv&auml;ndare eller en ordningsman med <B>ban kommando</B>.<br />
	Administrat&ouml;r kan f&ouml;rvisa en anv&auml;ndare fr&aring;n annan rum &auml;n han/hon &auml;r chattandes i. Han kan &auml;ven f&ouml;rvisa en anv&auml;ndare f&ouml;r alltid och fr&aring;n chat med kommandot &#39;<B>&nbsp;*&nbsp;</B>&#39; * m&aring;ste vara infogad f&ouml;re anv&auml;ndarens nicknamn att bli f&ouml;rdriven.
	<P>
	<I>F&ouml;r exempel</I>, om Jack &auml;r namn av anv&auml;ndaren att f&ouml;rvisa: <I>/ban Jack</I> eller <I>/ban * Jack</I>
	<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Befordra/S&auml;nka ner en anv&auml;ndare till/fr&aring;n ordningsman:</B></A></FONT>
<P>
Ordningsm&auml;n och administrat&ouml;r kan befordra/upph&ouml;ja andra anv&auml;ndare till ordningsman med <B>promote kommando</B>.
<P>
<I>F&ouml;r exempel</I>, om Jack &auml;r namn av anv&auml;ndaren att befordra: <I>/promote Jack</I>
<P>
Bara administrat&ouml;r har tillg&aring;ng f&ouml;r motsattsen (s&auml;nka en ordningsman till enkel anv&auml;ndare) att anv&auml;nda <B>demote kommando</B>.
<P>
<I>F&ouml;r exempel</I>, om Jack &auml;r namn av ordningsman att s&auml;nka ner: <I>/demote Jack</I> eller <I>/demote * Jack</I> (kommer att s&auml;nka ner honom fr&aring;n nuvarande eller alla rum).
<br /><P ALIGN="right"><A HREF="#top">Tillbaka till topp</A></P>
<P>
</BODY>
</HTML>
<?php
?>