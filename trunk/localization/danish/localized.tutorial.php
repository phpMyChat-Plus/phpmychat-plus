<?php
// File : danish/localized.tutorial.php - plus version (26.08.2008 - rev.10)
// Original translation by Kenneth Kristiansen <kk@linuxfreak.adsl.dk>
// Updates, corrections and additions for the Plus version by Bente Feldballe
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
<TITLE>Dansk Tutorial for <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Dansk Tutorial for <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</FONT><br /><I>&copy; 2008<?php echo((date('Y')>"2008") ? "-".date('Y') : ""); ?> - Oversat af Bente Feldballe - Århus, Danmark.</I></B></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></A></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Indholdet i denne tutorial</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Sådan vælger du sprog</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Sådan logger du ind på chatten</A><br />
<A HREF="#register" CLASS="topLink">Registering</A><br />
<A HREF="#modProfile" CLASS="topLink">Sådan ændrer<?php if (C_SHOW_DEL_PROF) echo("/sletter"); ?> du din profil</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Sådan opretter du et chatrum</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink"> Sådan aflæser du din tilslutningsstatus</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Sådan poster du i chatten</A><br />
<A HREF="#users_list" CLASS="topLink">Sådan læses brugerlisten</A><br />
<A HREF="#exit" CLASS="topLink">Sådan logger du ud af chatten</A><br />
<A HREF="#users_popup" CLASS="topLink">Sådan tjekker du hvem der chatter, før du logger ind</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Sådan tilpasser du chatvinduet</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Funktioner og kommandoer:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">Kommandoen Hjælp</A><br />
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
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">Smilies</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">Tekstformattering</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">Sådan inviterer du en bruger til at slutte sig til dig i det aktuelle chatrum</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">Sådan skifter du fra et chatrum til et andet</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">Sådan ændrer du din profil på chatten</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">Sådan genkalder du den seneste post eller kommando, du sendte</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">Sådan svarer du en enkelt bruger</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">Private meddelelser</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">Handlinger</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">Sådan ignorerer du andre brugere</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">Sådan finder du tilgængelige oplysninger om andre brugere</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">Sådan gemmer du poster</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Særlige kommandoer for moderatorer og/eller administrator:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">Sådan udsender du en bekendtgørelse</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">Sådan sparker du en bruger ud</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">Sådan forviser du en bruger</A><br />
	<?php
};
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">Forfremmelse/degradering af en bruger til/fra moderator:</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B> Sådan vælger du sprog:</B></A></FONT>
	<P>
	Du kan vælge dit foretrukne sprog blandt de sprog, <?php echo(APP_NAME); ?> indtil videre er oversat til. Klik på flaget for det ønskede sprog på chattens startside. I eksemplet herunder vælger brugeren sproget fransk:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Flag til sprogvalg ">
	<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<!-- Hint: Use a Ctrl+H and find/replace "Back to the top" with your expression in this entire document -->
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Log-in:</B></A></FONT>
<P>
Hvis du allerede er registreret, skal du blot logge ind ved at indtaste dit brugernavn og password. Dernæst vælger du det ønskede chatrum og trykker på knappen ’<?php echo(L_SET_14); ?>’.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Ellers skal du <A HREF="#register">registrere</A> dig først.
	<?php
}
else
{
	?>
<P>
	Du kan enten <A HREF="#register">registrere</A> dig først eller blot indtaste et brugernavn og vælge det chatrum, du vil deltage i. Hvis du ikke er registreret, er dit brugernavn det heller ikke (en anden person kan efterfølgende logge sig ind med samme brugernavn, når du har logget ud).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B> Registrering:</B></A></FONT>
<P>
Hvis du endnu ikke er registreret <?php if (!C_REQUIRE_REGISTER) echo("men gerne vil"); ?>, skal du vælge punktet Registrér. Et lille pop-up vindue vises på skærmen.
<P>
<UL>
	<LI>Først vælger du et brugernavn <?php if (!C_EMAIL_PASWD) echo(" og et password"); ?> ved at indtaste det ønskede i de respektive formularfelter. Det brugernavn, du vælger, er det navn, der automatisk vises i chatten. Brugernavnet må ikke indeholde mellemrum, komma eller backslash (\).
<?php if (C_NO_SWEAR) echo(" Brugernavnet må ikke indeholde \"bandeord\"."); ?>
	<LI>Som andet punkt skal du indtaste dit fornavn, efternavn og din e-mail-adresse. For at kunne registrere dig som bruger i chatten, skal disse felter være udfyldt. Det er frivilligt, om du vil oplyse køn.
	<LI>Hvis du har en hjemmeside, kan du indtaste din URL i boksen.
	<LI>Sprogfeltet kan hjælpe andre brugere i fremtidige diskussioner. Udfra boksen kan de se, hvilke(t) sprog du forstår.
	<LI>Til sidst skal du tage stilling til, om din e-mail-adresse må kunne ses af andre deltagere på chatten. Markér boksen ved siden af "vis e-mail i tilgængelige oplysninger". Hvis du ikke ønsker, at din e-mail-adresse kan ses, skal du lade være at sætte markering i boksen.
	<LI>Herefter trykker du blot på knappen <?php echo(L_REG_3); ?>, hvorefter din brugerkonto oprettes. Afhængigt af Administrators opsætning af chatten kan du komme ud for, at du skal vente på godkendelse fra Administrator. Under alle omstændigheder modtager du en e-mail med yderligere oplysninger. Hvis du fortryder og vil afbryde registreringen, kan du når som helst trykke på knappen <?php echo(L_REG_25); ?>.
</UL>
<P>
<A NAME="modProfile"></A>Selvfølgelig kan registrerede brugere ændre <?php if (C_SHOW_DEL_PROF) echo("/slette"); ?> deres egen profil ved at klikke på det relevante <?php echo((!C_SHOW_DEL_PROF ? "link" : "link")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B> Sådan opretter du et chatrum:</B></A></FONT>
	<P>
	Registrerede brugere kan oprette chatrum. Private chatrum kan kun tilgås af brugere, der kender rummets navn, og vil aldrig blive vist for andre end de brugere, der befinder sig i det pågældende chatrum.<br />
	<P>
	Navnet på chatrummet må ikke indeholde komma eller backslash (\).<?php if (C_NO_SWEAR) echo(" Det må ikke indeholde \"bandeord\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Sådan aflæser du din tilslutningsstatus:</B></A></FONT>
	<P>
	Et ikon i øverste højre hjørne af skærmbilledet angiver din tilslutningsstatus. Ikonet kan vise tre forskellige statustyper:
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Tilslutning ok"> når din tilslutning er i orden og du er på;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Tilslutter"> når en tilslutning er i gang;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Tilslutning mislykkedes"> når der ikke kunne oprettes forbindelse.
	</UL>
	<P>
	I det tredie tilfælde vil et klik på de røde "knap" starte et nyt forsøg på at oprette forbindelse.
	<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Sådan poster du i chatten:</B></A></FONT>
<P>
Hvis du vil poste en meddelelse i chatten, skal du indtaste din meddelelse i tekstboksen i nederste venstre hjørne af skærmbilledet og dernæst trykke på knappen Send eller Enter for at sende. Poster fra alle brugere ruller ned/op over skærmen efterhånden som de postes.<br />
<?php if (C_NO_SWEAR) echo("Bemærk at \"bandeord\" udelades fra poster."); ?>
<P>
Du kan ændre din tekstfarve ved at vælge en ny farve i listen med tilgængelige farver til højre for tekstboksen.
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B> Sådan læses brugerlisten (gælder ikke pop-up vinduet med brugeroplysninger):</B></A></FONT>
<P>
<OL>
	Der gælder to grundregler for brugerlisten:<br />
	<LI>Et lille ikon med angivelse af køn vises ud for brugernavnet på de registrerede brugere (hvis du klikker på det, åbnes <A HREF="#whois">whois pop-up vinduet</A> for den pågældende bruger), hvorimod uregistrerede brugere ikke har andet end et blankt rum foran brugernavnet;<br />
	<LI>Administrators og moderator(er)s brugernavne vises i kursiv.
</OL>
<P><I>For eksempel:</I> fra skærmdumpet herunder kan du udlede at:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="brugerliste">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas er chattens admin eller en af moderatorerne for det pågældende phpMyChat rum;<br /><br />
		<LI>alien (hvis køn er ukendt), Jezek2 og Caridad er registrerede brugere uden ekstra "bemyndigelse" i det pågældende phpMyChat rum;<br /><br />
		<LI>lolo er en ikke-registreret bruger.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Sådan logger du ud af chatten:</B></A></FONT>
<P>
Når du vil afslutte chatten, skal du blot klikke en gang på <?php echo (EXIT_LINK_TYPE) ? "<img src='localization/$L/images/exitdoor.gif' border=0 alt='".L_EXIT."'> knappen" : '"'.L_EXIT.'" Afslut'; ?>, i øverste højre hjørne af skærmbilledet. Alternativt kan du indtaste en af følgende kommandoer i din tekstboks:<br />
/exit<br />
/bye<br />
/quit<br />
Disse kommandoer kan efterfølges af en meddelelse, der skal sendes, inden du forlader chatten.
<I>For eksempel vil kommandoen:</I> /quit Vi ses snart!
<P>
poste meddelelsen "Vi ses snart!" i chatvinduet og dernæst logge dig ud af chatten.

<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Sådan tjekker du hvem der chatter, før du logger ind:</B></A></FONT>
<P>
Du kan klikke på linket på startsiden, der viser antallet af tilsluttede brugere. Hvis du allerede er i chatten, kan du klikke på linket <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo (L_DETACH); ?>"> i øverste højre hjørne af skærmbilledet for at åbne et separat vindue, der viser en liste over alle tilsluttede brugere og hvilke chatrum, de befinder sig i. Listen føres i nær realtid.<br />
Dette vindue indeholder brugernavnene, hvis der er færre end tre, antallet af brugere og andre chatrum med folk i.
<P>
Hvis du klikker på ikonet<IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo( L_BEEP); ?>"> øverst i dette pop-up vindue, kan du aktivere/deaktivere afspilning af beep, når en ny bruger slutter sig til chatten.
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Sådan tilpasser du chatvinduet:</B></A></FONT>
<P>
Der er mange forskellige muligheder for at tilpasse, hvordan chatten skal se ud. Du kan ændre disse indstillinger ved simpelthen at indtaste den tilhørende kommando i tekstboksen og trykke på knappen Send eller Enter.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI><B>Kommandoen Clear</B> kan bruges, hvis du vil rydde chatvinduet og kun vise de seneste 5 poster på skærmen.<br />Tast "/clear" uden citationstegn.
		<P>
		<?php
	}
	else
	{
		?>
		<LI><B>Kommandoen Order</B> lader dig vælge, om du vil vise de nyeste poster øverst eller nederst på skærmen.<br />Tast "/order" uden citationstegn.
		<P>
		<?php
	};
	?>
	<LI><B>Kommandoen Notify</B> lader dig vælge, om du vil have vist en notits, når en anden bruger slutter sig til eller forlader chatten. Som standard er dette punkt slået <?php echo(C_NOTIFY ? "til" : "fra"); ?> og notitserne <?php echo(C_NOTIFY ? "vil" : "vil ikke"); ?> blive vist.<br />Tast "/notify" uden citationstegn.
	<P>
	<LI><B>Kommandoen Timestamp</B> lader dig vælge, om du vil have vist tidspunktet for posten foran alle poster i chatvinduet, samt om du vil se oplysning om servertid  på statusbjælken. Som standard er dette punkt slået <?php echo(C_SHOW_TIMESTAMP ? "til" : "fra"); ?>.<br />Tast "/timestamp" uden citationstegn.
	<P>
	<LI><B>Kommandoen Refresh</B> lader dig ændre opdateringshastigheden for de poster, der vises på skærmen. Som standard er opdateringshastigheden indstillet til <?php echo(C_MSG_REFRESH); ?> sekunder. Hvis du vil ændre dette, skal du taste "/refresh n" uden citationstegn, hvor n står for det antal sekunder, du ønsker at indsætte som opdateringshastighed.
	<P>
	<I>For eksempel:</I> /refresh 5
	<P>
	vil ændre opdateringshastigheden til 5 sekunder. *Pas på, for hvis n indstilles til mindre end 3, vil opdatering af skærmen blive slået helt fra (dette kan være nyttigt, hvis du vil gennemlæse en masse gamle poster uden at blive forstyrret)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI><B>Kommandoen Show</B> lader dig ændre antallet af poster, der skal vises på skærmen. Hvis du vil ændre standardantallet, skal du taste "/show n" uden citationstegn, hvor n angiver antallet af poster, der skal vises.
		<P>
		<I>For eksempel vil kommandoen:</I> /show 50
		<P>
		kalde de seneste 50 poster frem på skærmen. Hvis det ønskede antal poster ikke kan vises på et skærmbillede, vises en rulleskakt i højre side af chatvinduet, så du kan søge tilbage.</UL>
		<?php
	}
	else
	{
		?>
		<LI>Kommandoerne <B>Show</B> og <B>Last</B> lader dig rense skærmen og vise de seneste <I>n</I> poster på skærmen. Tast "/show n" eller "/last n" uden citationstegn, hvor n angiver antallet af poster, der skal vises.
		<P>
		<I>For eksempel vil kommandoen:</I> /show 50 eller /last 50
		<P>
		rense chatvinduet og lade de seneste 50 poster være tilgængelige på din skærm. Hvis det ønskede antal poster ikke kan vises på et skærmbillede, vises en rulleskakt i højre side af chatvinduet, så du kan søge tilbage.</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Funktioner og kommandoer</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Kommandoen Hjælp:</B></A></FONT>
<P>
Fra selve chatten kan du åbne et pop-up vindue med hjælp og vejledning. Klik på ikonet <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> , der befinder sig lige til venstre for tekstboksen. Du kan også indtaste kommandoen <B>"/help" eller "/?" </B>i tekstboksen.
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatars:</B></A></FONT>
<P>Et avatar er et grafisk ikon, der repræsenterer den enkelte deltager i chatten. Kun registrerede brugere kan ændre deres avatar. En registreret bruger kan åbne sin profil (se kommandoen <A HREF="#changeprofile">/profile</A>) og klikke på det aktuelle avatar. Herefter åbnes en menu med tilgængelige avatar billedfiler, som du kan vælge fra, eller du kan indtaste den fulde URL til en grafikfil, der befinder sig et andet sted på internettet (du kan kun anvende billeder, der er almindeligt tilgængelige, ikke billeder fra en side, der er password-beskyttet). Billedfilen skal være i et format, som browseren kan håndtere (.gif, .jpg, o.s.v.) Billedfiler på 32 x 32 pixel giver det bedste resultat.
<P>Hvis du klikker på en anden brugers avatar, åbnes et pop-up vindue med den pågældende brugers profil (se kommandoen <A HREF="#whois">/whois</A>).
Hvis du klikker på dit eget avatar i brugerlisten, aktiveres kommandoen /profile, såfremt du er registreret bruger.
Hvis du ikke er registreret som bruger, vil et klik på dit avatar (chattens standard-avatar) åbne en prompt, der opfordrer dig til at lade dig registrere som bruger.
  <P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
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
	<P>Du kan anvende smilies i dine poster. Herunder finder du den kode, der skal indtastes for at anvende de forskellige tilgængelige smilies.
	<P>
	<I>Hvis du for eksempel</I> sender teksten "Hej Jack :)" uden citationstegn, vil meddelelsen i chatvinduet se ud som følger: <B>Hej Jack</B> <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)">.
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
	<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Tekstformattering:</B></A></FONT>
	<P>
	Du kan anvende fed, kursiv eller understreget tekst i dine poster. Det sker ved at omslutte den relevante del af teksten med et sæt af følgende HTML tags: &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; eller &LT;U&GT; &LT;/U&GT.
	<P>
	<I>For eksempel</I> vil indtastning af &LT;B&GT;denne tekst&LT;/B&GT; give <B>denne tekst</B>.
	<P>
	Hvis du vil oprette et hyperlink til en e-mail-adresse eller en URL, skal du blot indtaste adressen (uden HTML tags). Hyperlinket oprettes automatisk.
	<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
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
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Sådan inviterer du en bruger til at slutte sig til dig i det aktuelle chatrum:</B></A></FONT>
<P>
Du kan anvende  <B>kommandoen invite </B>, hvis du vil invitere en anden bruger til at slutte sig til dig i det chatrum, hvor du er.
<P>
<I>For eksempel vil kommandoen:</I> /invite Jack
<P>
sende en privat meddelelse til Jack med opfordring til, at han slutter sig til dig i dit aktuelle chatrum. Denne meddelelse indeholder navnet på det relevante chatrum, og navnet vises som et link, han blot kan klikke på.
<P>
Bemærk: Du kan indsætte flere end et brugernavn i kommandoen invite (f.eks. "/invite Jack,Helen,Alf"). Brugernavnene skal være adskilt af komma (,) men uden mellemrum.
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Sådan skifter du fra et chatrum til et andet:</B></A></FONT>
<P>
Listen i højre side af skærmen viser de eksisterende chatrum og de brugere, der p.t. befinder sig i det aktuelle chatrum. Hvis du vil forlade chatrummet og gå ind i et af de andre chatrum, skal du blot klikke på rummets navn. Tomme rum vises ikke på denne liste. Du kan gå ind i et tomt chatrum ved at indtaste <B>kommandoen "/join #rummets navn"</B> uden citationstegn.
<P>
<I>Hvis du for eksempel indtaster:</I> /join #Red Room
<P>
flyttes du til det valgte "Red Room".
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Hvis du er registreret som bruger, kan du" : "<br /><P>Du kan");
	?>
	 også oprette et nyt chatrum med samme kommando. Men i så fald skal du desuden specificere, hvilken type chatrum, du vil oprette: 0 står for privat, 1 for offentligt (standardværdi).
	<P>
	<I>Hvis du for eksempel indtaster:</I> /join 0 #My Room
	<P>
	oprettes et nyt privat chatrum kaldet "My Room" (forudsat at et offentligt chaturm med samme navn ikke allerede er oprettet), og du flyttes til det oprettede chatrum.
	<P>
	Rummets navn kan ikke indeholde komma eller backslash (\).<?php if (C_NO_SWEAR) echo(" Navnet må heller ikke indeholde \"bandeord\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>Sådan ændrer du din profil på chatten:</B></FONT>
<P>
<B>Kommandoen Profile</B> åbner et separat pop-up vindue, hvor du kan redigere din brugerprofil, undtagen dit brugernavn og password (hvis du vil ændre disse, skal du bruge linket på startsiden).<br />Tast /profile
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>Sådan genkalder du den seneste post eller kommando, du sendte:</B></FONT>
<P>
<B>Kommandoen !</B> genkalder den sidste post eller kommando, du sendte.<br />Tast /!
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>Sådan svarer du en enkelt bruger:</B></FONT>
<P>
Hvis du klikker på navnet på en anden bruger i listen (i højre side af skærmbilledet), vil denne brugers "brugernavn>" vises i din tekstboks. Denne funktion gør det muligt at rette en offentlig kommentar direkte til den valgte bruger, evt. som svar på noget, han eller hun postede tidligere.
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Private meddelelser:</B></A></FONT>
<P>
Hvis du vil sende en privat meddelelse til en anden bruger, der befinder sig i det samme chatrum, skal du indtaste <B>kommandoen "/msg brugernavn tekstbesked" eller "/to brugernavn tekstbesked"</B> uden citationstegn.
<P>
<I>For eksempel, hvis Jack er brugernavn for den, du vil skrive til:</I> /msg Jack Hej, hvordan går det?
<P>
Beskeden kan ses af Jack og af dig selv, men de andre brugere vil ikke kunne se den.
<P>
Når funktionen private meddelelser er slået til, er det også muligt at sende en privat besked til en bruger i et andet rum ved hjælp af <B>kommandoen "/wisp brugernavn tekstbesked"</B> uden anførselstegn.
<P>
<?php
if (C_PRIV_POPUP)
{
?>
Hvis du klikker på en brugers brugernavn i hovedvinduet, vil kommandoen /to eller /wisp automatisk blive indsat i begyndelsen af linjen i indtastningsfeltet.
<?php
}
else
{
?>
Hvis du klikker på en brugers brugernavn i listen til højre, vil et privat pop-up-vindue automatisk blive åbnet, således at du kan indtaste din besked og trykke på knappen ENTER for at sende meddelelsen. De svar, du modtager, åbnes ligeledes automatisk i nye vinduer.
<?php
}
?>
<P>
Bemærk: Hvis pop-up er slået til for private meddelelser (både i indstillingerne for chatten og i din egen profil), vil du kunne få adgang til alle de private meddelelser, du har modtaget siden du sidst besøgte chatten, eller som er sendt mens du har været "away"; alle nye off-line private meddelelser addresseret til dig vil blive åbnet i et pop-up-vindue, når du logger ind, således at du kan besvare dem alle en for en fra det samme vindue.
Funktionen private off-line meddelelser er kun tilgængelig for registrerede brugere.
<P>
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php echo("a) ENABLE_PM = <b>".(C_ENABLE_PM == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) PRIV_POPUP = <b>".(C_PRIV_POPUP == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Handlinger:</B></A></FONT>
<P>
Hvis du vil fortælle, hvad du foretager dig, kan du anvende <B>kommandoen "/me handling"</B> uden citationstegn.
<P>
<I>For eksempel:</I> Hvis Jack sender beskeden "/me drikker kaffe", vil beskeden i chatvinduet se ud som følger: "<B>* Jack</B> drikker kaffe".
<P>
Som en variant af denne kommando findes også <B>kommandoen /mr </B>, der samtidig sætter en kønsbestemt titel foran brugernavnet.
<P>
<I>For eksempel:</I> Hvis Jack sender beskeden "/mr ser TV", vil beskeden i chatvinduet se ud som følger: "<B>* <?php echo(L_HELP_MR); ?> Jack</B> ser TV".
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B> Sådan ignorerer du andre brugere:</B></A></FONT>
<P>
Hvis du vil ignorere alle poster fra en anden bruger, skal du indtaste <B>kommandoen "/ignore brugernavn"</B> uden citationstegn.
<P>
<I>For eksempel:</I> /ignore Jack
<P>
Fra det tidspunkt og fremefter vil ingen poster skrevet af brugeren Jack blive vist på din skærm.
<P>
Hvis du vil se en liste over de brugere, der ignoreres, skal du blot indtaste <B>kommandoen "/ignore"</B> uden citationstegn.
<P>
Hvis du vil genoptage visningen af poster fra en ignoreret bruger, skal du indtaste <B>kommandoen "/ignore - brugernavn"</B> uden citationstegn, hvor "-" er en bindestreg (et minustegn).<P>
<P>
<I>For eksempel:</I> /ignore - Jack
<P>
Herefter vil alle poster fra brugeren Jack i den aktuelle chatsession blive vist på din skærm, inklusive poster fra Jack skrevet før, du indtastede denne kommando.<br />
Hvis du ikke angiver et brugernavn efter bindestregen, vil din "liste over ignorerede brugere" blive nulstillet.
<P>
Bemærk, at du kan indsætte flere end ét brugernavn i kommandoen ignore (f.eks. "/ignore Jack,Helen,Alf" eller "/ignore - Jack,Alf"). Der skal være komma (,) mellem brugernavnene, men intet mellemrum.
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B> Sådan finder du tilgængelige oplysninger om andre brugere:</B></A></FONT>
<P>
Hvis du vil se de tilgængelige oplysninger om en bruger, skal du indtaste <B>kommandoen "/whois brugernavn"</B> uden citationstegn.
<P>
<I>For eksempel:</I> /whois Jack
<P>
hvor ’Jack’ er brugernavnet. Denne kommando åbner et separat pop-up vindue med de tilgængelige oplysninger om den valgte bruger. Prøv at indtaste dit eget brugernavn, hvis du vil se, hvordan dine profiloplysninger vises for andre, der indtaster samme kommando.
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B> Sådan gemmer du poster:</B></A></FONT>
	<P>
	Hvis du vil eksportere poster (undtagen kommentarposter) til en lokal HTML-fil, skal du indtaste <B>kommandoen "/save n"</B> med citationstegn omkring.
	<P>
	<I>For Eksempel:</I> /save 5
	<P>
	hvor ’5’ er det antal poster, som du vil gemme. Hvis du ikke har indsat en værdi for n, gemmes alle tilgængelige poster i det aktuelle chatrum.
	<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U> Særlige kommandoer for moderatorer og/eller administrator:
</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B> Sådan udsender du en bekendtgørelse:</B></A></FONT>
<P>
Administrator kan udsende en bekendtgørelse til alle chatrum på en gang og dermed nå alle brugere, der er logget ind på chatten på tidspunktet for bekendtgørelsen. Dette gøres med <B>kommandoen announce </B>.
<P>
<I>For eksempel: /announce Chatten lukkes ned p.g.a. vedligeholdelse i aften klokken 8.</I>
<P>
Der findes en anden nyttig kommando til udsendelse af bekendtgørelser i en rollespilsorienteret chat; administrator eller moderatorer i et chatrum kan sende en bekendtgørelse til alle brugere i det aktuelle chatrum eller til alle brugere i alle rum med <B>kommandoen room </B>.
<P>
<I>For eksempel: /room Mødet begynder klokken 15.</I> eller <I>/room * Mødet begynder klokken 15 i personalerummet.</I>
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B> Sådan sparker du en bruger ud:</B></FONT>
<P>
En moderator kan sparke en anden bruger ud, og administrator kan sparke en bruger eller en moderator ud med <B>kommandoen kick</B>. Administrator kan sparke en bruger ud fra et hvilket som helst chatrum, en moderator skal være i samme chatrum som brugeren.
<P>
Hvis, <I>for eksempel</I>, Jack er navnet på den bruger, du vil sparke ud: <I>/kick Jack</I> eller <I>/kick Jack grunden til, at Jack sparkes ud </I>. "Grunden til, at Jack sparkes ud" kan være en tekst efter eget valg, f.eks. "for spam!"
<P>
Hvis du vælger mulighed * (<I>/kick * <?php echo(L_HELP_REASON); ?></I>), vil kommandoen sparke alle brugere uden bemyndigelse ud af chatten (gælder kun gæster og registrerede brugere). Denne funktion er nyttig, hvis der er problemer med serverforbindelsen, og alle tilstedeværende skal genindlæse chatten. I dette andet tilfælde anbefales det at give en <I><?php echo(L_HELP_REASON); ?></I>, således at brugerne ved, hvorfor de sparkes ud.
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B> Sådan forviser du en bruger:</B></A></FONT>
	<P>
	En moderator kan forvise en bruger, og administrator kan forvise en bruger eller en moderator med <B>kommandoen ban</B>.<br />
	Administrator kan forvise en bruger fra et andet chatrum end det, administrator selv befinder sig i på tidspunktet. Administrator kan også forvise en bruger for altid og fra chatten som helhed ved at indsætte en ’<B>*</B>’ foran brugernavnet på den bruger, der skal forvises.
	<P>
	Hvis, <I>for eksempel</I>, Jack er navnet på den bruger, du vil forvise: <I>/ban Jack</I>, <I>/ban * Jack</I>, <I>/ban Jack grunden til forvisningen</I> eller <I>/ban * Jack grunden til forvisningen </I>. "Grunden til forvisningen" kan være en tekst efter eget valg, f.eks. "for spam!"
	<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B> Forfremmelse/degradering af en bruger til/fra moderator:</B></A></FONT>
<P>
Moderatorer og administrator kan forfremme en anden bruger til moderator med <B>kommandoen promote</B>.
<P>
Hvis, <I>for eksempel</I>, Jack er navnet på den bruger, du vil forfremme: <I>/promote Jack</I>
<P>
Kun administrator har adgang til den modsatte handling (at degradere en moderator til almindelig bruger) ved hjælp af <B>kommandoen demote</B>.
<P>
Hvis, <I>for eksempel</I>, Jack er navnet på den bruger, du vil degradere: <I>/demote Jack</I> eller <I>/demote * Jack</I> (dette vil degradere ham i det aktuelle chatrum eller i hele chatten).
<br /><P ALIGN="right"><A HREF="#top">Tilbage til toppen</A></P>
<P>
</BODY>
</HTML>
<?php
?>