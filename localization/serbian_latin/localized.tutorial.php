<?php
// File : serbian_latin/localized.tutorial.php - plus version (26.08.2008 - rev.10)
// Original translation by Vedran Vučić <vedran.vucic@gnulinuxcentar.org>
// Do not use ' but use ’ instead (utf-8 edit bug)

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
<TITLE>Srpski Tutorijal za <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Srpski Tutorijal za <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</FONT><br /><I>&copy; 2008<?php echo((date('Y')>"2008") ? "-".date('Y') : ""); ?> - Preveo <a href="mailto: vedran.vucic@gnulinuxcentar.org?subject=phpMyChat%20Plus%20translation" onMouseOver="window.status='<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>.'; return true;" title="<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>" target=_blank>Vedran Vučić</a> - Beograd, Serbia.</I></B></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></A></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Sadržaj</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Odaberite jezik</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Prijavljivanje u čet</A><br />
<A HREF="#register" CLASS="topLink">Registrovanje</A><br />
<A HREF="#modProfile" CLASS="topLink">Modifikovanje<?php if (C_SHOW_DEL_PROF) echo("/brisanje"); ?>vaš profil</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Kreiranje sobe</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Razumevanje stanja konekcije</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Slanje poruke</A><br />
<A HREF="#users_list" CLASS="topLink">Razumevanje liste korisnika</A><br />
<A HREF="#exit" CLASS="topLink">Napuštanje sobe za čet</A><br />
<A HREF="#users_popup" CLASS="topLink">Saznanje o tome ko četuje bez prethodnog prijavljivanja</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Podešavanje prikaza četa</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Svojstva i komande:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">Komanda za pomoć</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">Avatari</A><br />
<?php
}
?>
<!-- Avatar System End. -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">Grafički smeško</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">Formatiranje teksta</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">Pozivanje korisnika da se priključi trenutnoj sobi za čet</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">Prelazak iz jedne čet sobe u drugu</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">Izmena vašeg profila unutar četa</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">Ponovno pozivanje poslednje poruke ili komande</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">Odgovaranje određenom korisniku</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">Privatne Poruke</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">Akcije</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">Ignorisanje drugih korisnika</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">Dobijanje javne informacije o drugim korisnicima</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">Sačuvaj poruku</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Specijalne komande za moderatore i/ili administratore:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">Pošaljite obaveštenje</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">Izbacivanje korisnika</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">Zabrana korisnika</A><br />
	<?php
};
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">Promovisanje/Opoziv korisnika na/sa statusa moderatora</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Izbor jezika:</B></A></FONT>
	<P>
	Možete da odaberete jezik između onih na koje je učinjen<?php echo(APP_NAME); ?> prevod klikom na jednu od zastava na početnoj strani. U ovom primeru, korisnik odabire francuski jezik:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Zastave za odabiranje jezika">
	<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<!-- Hint: Use a Ctrl+H and find/replace "Povratak na vrh" with your expression in this entire document -->
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Prijavljivanje:</B></A></FONT>
<P>
Ako ste se već registrovali jednostavno se prijavite upisivanjem vašeg korisničkog imena i lozinke. Nakon toga odaberite sobu za čet u koju bi hteli da uđete i pritisnite ’<?php echo(L_SET_14); ?>’ dugme.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	U suprotnom, morate da se <A HREF="#register">registrujete</A> pre svega.
	<?php
}
else
{
	?>
<P>
	U suprotnom se <A HREF="#register">registrujte</A> najpre ili uđite u sobu, ali vaš nadimak neće biti rezervisan (drugi korisnik može da ima isti nadimak nakon što se vi odjavite).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Registracija:</B></A></FONT>
<P>
Ako se niste registrovali<?php if (!C_REQUIRE_REGISTER) echo(" a želeli bi "); ?>, molimo vas da odaberete opciju registracije. Mali iskačući prozor će da se pojavi.
<P>
<UL>
	<LI>Najpre kreirajte korisničko ime<?php if (!C_EMAIL_PASWD) echo(" i lozinku"); ?> za sebe tako što ćete da ih upišete u odgovarajuća polja. Korisničko ime koje odaberete je ime koje će se automatski pojaviti u sobi za čet. To ime nemože da sadrži razmake, zapete ili kose linije.(\).
<?php if (C_NO_SWEAR) echo(" Nemože da sadrži \"psovke\"."); ?>
	<LI>Zatim, unesite vaše ime, prezime, i vašu email adresu. Da bi se registrovali za čet morate sve ove informacije da unesete. Informacija o rodu nije neophodna.
	<LI>Ako imate vaš sajt, možete da unesete URL u ovo polje.
	<LI>Polje za jezik može da pomogne korisnike u budućim diskusijama. Tako će saznati koji jezik(e) vi razumete.
	<LI>Na kraju, ako želite da vašu email adresu vide drugi korisnici, označite kutiju odmah pored "<?php echo(L_REG_33); ?>". Ako želite da se vaša e-mail adresa ne vidi istavite tu kutiju neoznačenom.
	<LI>Tada, pritisnite <?php echo(L_REG_3); ?> dugme ivaš nalog će biti kreiran. Ovisno o podešavanjima koje je postavio administrator možda ćete morati da čekate na administratorovo odobrenje. U svakom slučaju, dobit ćete poruku sa daljnjim instrukcijama. Ako u bilo kojem trenutku želite da se zaustavite bez registracije pritisnite, <?php echo(L_REG_25); ?> dugme.
</UL>
<P>
<A NAME="modProfile"></A>Naravno, registrovani korisnici će moći da izmene<?php if (C_SHOW_DEL_PROF) echo("/izbriši"); ?> svoj sopstveni profil klikom na <?php echo((!C_SHOW_DEL_PROF ? "veza" : "veze")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Kreiranje sobe:</B></A></FONT>
	<P>
	Registrovani korisnici mogu da kreiraju sobe. Privatne sobe mogu biti dostupne samo za one koji znaju njihovo ime, jer one neće biti prikazane osim za one korisnike koji su u toj sobi.<br />
	<P>
	Ime sobe nemože da sadrži zapetu ili kosu liniju (\).<?php if (C_NO_SWEAR) echo(" Nemože da sadrži \"psovke\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Razumevanje stanja povezanosti:</B></A></FONT>
	<P>
	Znak koji predstavlja stanje povezanosti je prikazan na vrhu-desno vašeg ekrana. On može imati tri oblika:
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Nema povezanosti"> kada povezanost nije zahtevana;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Povezivanje u toku"> kada je povezivanje u toku;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Povezivanje neuspešno"> kad povezivanje nije uspelo.
	</UL>
	<P>
	U trećem slučaju, klikom na crveno "dugme" će pokrenuti novi pokušaj za spajanem.
	<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Slanje poruka:</B></A></FONT>
<P>
Da bi poslali poruku u sobu za čet upišite vaš tekst u polje u donjem levom uglu i pritisnite Enter/Return taster. Poruke od svih korisnika mogu da se pregledavaju u čet polju.<br />
<?php if (C_NO_SWEAR) echo("Obratite pažnju da su \"psovke\" preskočene u porukama."); ?>
<P>
Možete da promenite boju unesenog teksta odabirajući boje iz liste izbora boja desno od polja.
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Razumevanje liste korisnika (nije zakorisnički iskačući prozor):</B></A></FONT>
<P>
<OL>
	Dva osnovna pravila su definisana za listu korisnika:<br />
	<LI>mala sličica koja prikazuje rod je prikazana pre nadimkaregistrovanohgh korisnika (klikom na nju pokrećemo <A HREF="#whois">ko je iskačući prozor</A> za tog korisnika), dok neregistrovani korisnici nemaju ništa osim praznog prostora prikazanog ispred njihovog nadimka;<br />
	<LI>nadimak administratora ili moderatora je u kurzivu.
</OL>
<P><I>Na primer</I>, iz donjeg prikaza možete da zaključite da:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="lista korisnika">
	</TD>
	<TD>
	<UL>
		<LI>Svetlana je administratorka ili jedna od moderatorki u phpMyChat sobi;<br /><br />
		<LI>stranac (čiji rod je nepoznat), Nikola2 i Ana su registrovani korisnici bez dodatnih "moći" za phpMyChat sobu;<br /><br />
		<LI>Lola je jednostavno, neregistrovana korisnica.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Napuštanje čet sobe:</B></A></FONT>
<P>
Da bi izašli iz četa, kliknite jednom na <?php echo (EXIT_LINK_TYPE) ? "<img src='localization/$L/images/exitdoor.gif' border=0 alt='".L_EXIT."'> slika" : '"'.L_EXIT.'" veza'; ?>, u desnom gornjem uglu sobe. Alternativno, možete da u polje z aupisivanje teksta upišete jednu od sledećih komandi:<br />
/exit<br />
/bye<br />
/quit<br />
Ove komande mogu biti izvršene zajedno sa tekstom poruke koju saopštite pre napuštanja čet sobe.
<I>Na primer :</I> /quit Uskoro se vidimo!
<P>
če poslati poruku "Uskoro se vidimo!" u glavnom okviru i odjaviti vas.

<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Saznanje o tome ko četuje bez prethodnog prijavljivanja:</B></A></FONT>
<P>
Možete da kliknete na vezu koja pokazuje broj povezanih korisnika na početnoj strani, ili, ako četujete, klik na sliku <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo (L_DETACH); ?>"> u gornjem desnom uglu ekrana da bi otvorili poseban prozor koji će prikazati listu povezanih korisnika, sobe u kojima se nalaze, u skoro realnom vremenu.<br />
Nazslov ovog prozora sadrži korisnička imena, ako ih je manje od tri,broj korisnika i otvorenih soba.
<P>
Klikom na <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo( L_BEEP); ?>"> sličicu na vrhu ovog iskačućeg prozora će omogućiti/onemogućiti zvučni signal prilikom ulaska korisnika.
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Podešavanje prikaza četa:</B></A></FONT>
<P>
Ima mnogo načina da se podesi izgled četa. Da bi promenili podešavanja upišite odgovarajuću komandu u polje za tekst i pritisnite Enter/Return taster.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>Ova <B>Clear komanda</B> omogućava da očistite glavni čet ekran i da prikažete poslednjih 5 poruka poslatih na vaš ekran.<br />Upišite "/clear" bez navodnika.
		<P>
		<?php
	}
	else
	{
		?>
		<LI>Ova <B>Order komanda</B> omogućava da promenite redosled pojavljivanja poruka na vrhu odnosno na dnu ekrana.<br />Upišite "/order" bez navodnika.
		<P>
		<?php
	};
	?>
	<LI>Ova <B>Notify komanda</B> omogućava da uključite ili isključite opciju da viđenja obaveštenja koja se pojavljuju kad neko ulazi ili izlazi iz čet sobe. Pretpostavljeno je da <?php echo(C_NOTIFY ? "uklj." : "isklj."); ?> i obaveštenja <?php echo(C_NOTIFY ? "će" : "neće"); ?> biti vidljiva.<br />Upišite "/notify" bez navodnika.
	<P>
	<LI>Ova <B>Timestamp komanda</B> omogućava da uključite iliisključite opciju da vidite vreme upisivanja poruke kao i serversko vreme u status traci. Pretpostavljeno je da je ova opcija <?php echo(C_SHOW_TIMESTAMP ? "uklj." : "isklj."); ?>.<br />Upišite "/timestamp" bez navodnika.
	<P>
	<LI>Ova <B>Refresh komanda</B> omogućava da podesite interval u kojem je nakon kojeg se poruke ponovo učitavaju na ekranu. Pretpostavljeni interval je <?php echo(C_MSG_REFRESH); ?> sekundi. Ako hoćete da promenite ovaj interval upišite "/refresh n" bez navodnika gde je n broj sekundi za novi interval ponovnog čitavanja strane.
	<P>
	<I>Na primer:</I> /refresh 5
	<P>
	če promeniti interval na 5 sekundi. *Obratite pažnju da ako je n manje od 3 ekran se neće uopšte ponovo učitavati (ovo je korisno kada želite da čitate dosta starih poruka bez želje da vas ponovno učitavanje strane ometa.)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI>Ova <B>Show komanda</B> omogućava da odredite broj poruka koje će se videti na ekranu. Ako želite da promenite pretpostavljeni broj upišite "/show n" bez navodnika gde je n broj vidljivih poruka.
		<P>
		<I>Na primer:</I> /show 50
		<P>
		će da omogući da se 50 poslednjih poruka vidi na vašem ekranu. Ako nemogu sve poruke da se vide odjednom na ekranu sa desne strane će se pojaviti traka za pregledavanje.</UL>
		<?php
	}
	else
	{
		?>
		<LI>Ove <B>Show i Last komande</B> omogućavaju da očistite ekran i prikažete poslednjih <I>n</I> poruka na vašem ekranu. Upišite "/show n" ili "/last n" bez navodnika, gde je n broj vidljivih poruka.
		<P>
		<I>Na primer:</I> /show 50 ili /last 50
		<P>
		će da očisti okvir za poruke i učiniti vidljivim poslednjih 50 poruka na vašem ekranu. Ako nemogu sve poruke da se vide odjednom na ekranu sa desne strane će se pojaviti traka za pregledavanje.</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Svojstva i komande</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Komanda za pomoć:</B></A></FONT>
<P>
Za vreme boravka u sobi za čet možete da pokrenete iskačući prozor klikom na <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> sliku koja je smeštena ispred polja za poruke. Takođe, možete da upišete <B>"/help" ili "/?" komande</B> u polju za poruke.
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatari:</B></A></FONT>
<P>Avatari su sličice koje predstavljau osobe koje četuju. Samo registrovani korisnici mogu da promene svoj avatar. Registrovani korisnici mogu da otvore svoj Profil (vidite <A HREF="#changeprofile">/profile</A> komandu) i klikom na avatar sliku odabrati sa menija slika ili upisati URL koji vodi na sliku dostupnu bilo gde na internetu (samo slike koje su javno dostupne, ne sa sajtova koji su zaštićeni lozinkom). SLike trebaju d abudu vidljive brauzerom (.gif, .jpg, etc. ) 32 x 32 piksela datoteke su najbolje za prikazivanje.
<P>Klikom na nečiji avatar u okviru za poruke će se otvoriti iskačući okvir sa profilom te osobe (vidite <A HREF="#whois">/whois</A> komandu).
Klikom na avatar listi korisnika će da izvrši /profile komandu, ako ste registrovani.
Ako niste registrovani, klikom na vaš (sistemom pretpostavljeni) avatar će otvoriti podestnik da vas ohrabri da sa registrujete.
<P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><B>Smeško:</B></A></FONT>
	<P>Možete da imate grafičkog smeška unutar vaše poruke. Pogledajte niže kod koji treba d aupišete da bi se pojavio neki od nekoliko vrsta smeška. 
	<P>
	<I>Na primer</I>, slanjem teksta "Hi Jack :)" bez navodnika će pokazati poruku<B>Zdravo Džek</B> <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> u glavnom okviru.
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
	<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Formatiranje teksta:</B></A></FONT>
	<P>
	Tekst može da bude podebljan, kurziv ili podvučen označavanjem delova vašeg teksta bilo kojim od &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; ili &LT;U&GT; &LT;/U&GT HTML tagova.
	<P>
	<I>Na primer</I>, &LT;B&GT;ovaj tekst&LT;/B&GT; će proizvesti <B>ovaj tekst</B>.
	<P>
	Da bi kreirali hipervezu za e-mail addresu ili URL, upišite adresu (bez HTML tagova). Hiperveza će automatski da se kreira. 
	<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
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
<br /><P ALIGN="right"><A HREF="#top">Back to the top</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Pozovite nekog da vam se pridruži u vašoj sobi za čet:</B></A></FONT>
<P>
Možete da koristite <B>invite komandu</B> da pozovete korisnika da dođe u sobu u kojoj sada četujete. 
<P>
<I>Na primer:</I> /invite Ksenija
<P>
će poslati privatnu poruku Kseniji i sugerisati joj da vam se pridruži u sobi u kojoj sada četujete. Ova poruke sadrži u sebi ime ciljne sobe a ovo ime se pojavljuje kao veza.
<P>
Obratite pažnju da možete da pozovete više korisnika sa ovom komandom. (npr. "/invite Zdravko,Helena,Ksenija"). imena moraju biti razdvojena zapetom (,) bez razmaka.
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Promena soba:</B></A></FONT>
<P>
Na desnom delu ekrana je lista koja pokazuje čet soba i korisnika koji su trenutno u tim sobama. Akoželite da napustite sobu u kojoj se trenutno nalazite i da odete u jednu od drugih soba kliknite na ime sobe u koju želite da uđete. Prazne sobe se ne pojavljuju na listi. Možete da odete u praznu sobu upisivanjem komande <B>komanda "/join #ime sobe"</B> bez navodnika.
<P>
<I>Na primer:</I> /join #Crvena Soba
<P>
će vas premestiti u sobu koja se zove "Crvena Soba".
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Ako ste registrovan korisnik vi" : "<br /><P>Vi");
	?>
	 možete da kreirate novu sobu koristeći istu komandu. Ali tom prilikom morate da odredite tip sobe: 0 je privatna, 1 javna (pretpostavljena vrednost).
	<P>
	<I>Na primer:</I> /join 0 #Moja Soba
	<P>
	će kreirati novu privatnu sobu (pretpostavljajući da nije javna soba sa istim imenom pre kreirana) nazvanu "Moja Soba" i premestiti vas u nju.
	<P>
	Ime sobe nemože da sadrži zapete ili kose linije (\).<?php if (C_NO_SWEAR) echo(" Nemože da sadrži \"psovke\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>Podešavanje vlastitog profila unutar četa:</B></FONT>
<P>
Ova <B>Profile komanda</B> kreira odvojen iskačući prozor u kojem možete da uredite vaš korisnički profil i podesiti ga osim nadimka i lozinke (morate da upotrebite vezu na početnoj strani da bi to uradili).<br />Upišite /profile
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>Ponovno pozivanje poslednje poruke ili komande:</B></FONT>
<P>
Ova <B>! komanda</B> poziva poslednju poruku ili komandu koju ste upisali.<br />Upišite /!
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>Odgovaranje posebnom korisniku:</B></FONT>
<P>
Ako jednom kliknete na ime korisnika (na desnoj strani ekrana) to "korisničko ime>" će da se pojaviu vašem polju za tekst. Ovo svojstvo omogućava da lako usmerite javnu poruku nekom korisniku, na primer kaoodgovor na korisnikovo postavljeno pitanje.
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Privatne poruke:</B></A></FONT>
<P>
Ako želite da pošaljete privatnu poruku nekom korisniku koji je trenutno u vašoj čet sobi napišite <B>komandu "/msg korisničkoime tekst poruke" ili "/to korisničko ime tekst poruke"</B> bez navodnika.
<P>
<I>Na primer, ako je Goran korisničko ime:</I> /msg Goran Zdravo, kako si? 
<P>
Poruka će se pojaviti Goranu i vama, ali drugi korisnici neće videti tu poruku.
<P>
Kad se omogući PM svojstvo, moguće je poslati šaptanja korisniku u drugoj sobi koristeći <B>komandu "/wisp korisničko ime poruka tekst"</B> bez navodnika.
<P>
<?php
if (!C_PRIV_POPUP)
{
?>
Klikom na nadimak pošiljaoca poruke u glavnom okviru automatski će da doda  /to ili /wisp komandu na mesto za unos za poruke. 
<?php
}
else
{
?>
Klikom na nadimak korisnika u listi korisnika na desnoj strani automatski će da se otvori privatni iskačući prozor  očekujući da upišete tekst i pritisnuti ENTER da bi poslali poruku. Odgovori koje dobijete će biti automatski otovreni u iskačućim prozorima. 
<?php
}
?>
<P>
Napomena: Kad se omoguće PM iskačući prozori (u podešavanjima za ćaskanje i vašem vlastitom profilu), moći ćete da vidite sve PM dok niste bili na vezi od vašeg poslednjeg puta kad ste bili na vezi ili dok ste postavili "odsutan"; sve te poruke će se otvoriti u odvojenim iskačućem prozoru; možete odgovoriti na njih iz istog prozora.
Ova PM mogućnost je pristupačna samo registrovanim korisnicima. 
<P>
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php echo("a) ENABLE_PM = <b>".(C_ENABLE_PM == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) PRIV_POPUP = <b>".(C_PRIV_POPUP == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Akcije:</B></A></FONT>
<P>
Da bi opidsali šta radite <B>komanda "/me akcija"</B> bez navodnika. 
<P>
<I>Na primer:</I> Ako Milena pošalje poruku "/me pijem kafu" okvir za poruke će pokazati "<B>* Milena</B> pijem kafu".
<P>
Kao varijacija ove komande postoji <B>/mr komanda</B> koja postavlja rodnu oznaku ispred korisničkog imena.
<P>
<I>Na primer:</I> Ako Ivana pošalje poruku "/mr sluša muziku" okvir za poruke če pokazati "<B><?php echo(L_HELP_MS); ?> Ivana</B> sluša muziku".
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorisanje korisnika:</B></A></FONT>
<P>
Ako želite da ignorišete poruke koje je poslao drugi korisnik upišite <B>komandu "/ignore korisničkoime"</B> bez navodnih znakova.
<P>
<I>Na primer:</I> /ignore Marko
<P>
Od tog trenutka, nijedna poruka koju je napisao korisnik Marko neće bitinapisana na vašem ekranu.
<P>
Ako želite da vidite listu korisnika čije su poruke ignorisane napišite <B>komandu "/ignore"</B> bez navodnika.
<P>
Ako želite da prekinete da ignorišete poruke nekog korisnika, upišite <B>komandu "/ignore - korisničkoime"</B> bez navodnika, gde "-" je crtica (minus znak).<P>
<P>
<I>Na primer:</I> /ignore - Marko
<P>
Sada će sve poruke koje je Marko napisao u čet sesiji biti prikazane na vašem ekranu, uključujući one poruke koje je Marko napisao pre nego što ste napisaliovu komandu.<br />
Ako ne odredite posebno korisničko ime nakon minus znaka vaša lista ignorisanih korisnika će biti očišćena. 
<P>
Obratite pažnju da možete da stavite više od jednog korisničkog imena u ignore komandu. (npr. "/ignore Marko,Sanja,Darko" ili "/ignore - Sanja,Darko"). One moraju biti razdvojene zapetom (,) bez razmaka.
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Dobijanje informacija o korisnicima:</B></A></FONT>
<P>
Ako želite da vidite javnu informaciju o korisniku, upišite <B>komandu "/whois korisničkoime"</B> bez navodnika.
<P>
<I>Na primer:</I> /whois Siniša
<P>
gde je ’Siniša’ korisničko ime. Ova komanda će kreirati odvojeni iskačući prozor koji će prikazati javno dostupnu informaciju o tom korisniku. Možete da upotrebite na svom imenu da proverite kako je vaš profil prikazan drugim korisnicma koji upotrebe istu komandu. .
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Sačuvaj poruke:</B></A></FONT>
	<P>
	Da bi izvezli poruke (bez obaveštenja) u lokalnu HTML datoteku, upišite <B>komandu "/save n"</B> bez navodnih znakova.
	<P>
	<I>Na primer:</I> /save 5
	<P>
	gde je ’5’ broj poruka koje treba sačuvati.Ako n nije određen, sve dostupne poruke koje se trenutno nalaze u čet sobi će biti uzete u obzir.
	<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Komande za administratore i/ili moderatore</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Slanje obaveštenja:</B></A></FONT>
<P>
Administrator može pošalje obaveštenje u celom sistemu u svim sobama koje će dospeti do svih korisnika koji su trenutno prijavljeni <B>announce komandom</B>.
<P>
<I>Na primer: /announce Čet sistem neće zbog održavanja raditi večeras od 8 sati.</I>
<P>
Postoji joše jedna korisna komanda koja liči na komandu za obaveštenja, koja se koristi kod četova gde se igraju razne uloge; administrator ili moderatori u sobi mogu poslati obaveštenje svim korisnicima u nekoj sobi pomoću <B>room komande</B>.
<P>
<I>Na primer: /room Sastanak počinje u 15 časova.</I> ili <I>/room * Sastanak počinje u 15 časova u sobi za zaposlene.</I>
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Izbacivanje korisnika:</B></FONT>
<P>
Moderatori mogu izbaciti korisnika, a administrator može da izbaci korisnika ili moderatoa <B>kick komandom</B>. Sa izuzetkom administratora, korisnik koji treba d abude izbačen mora biti u sobi iz koje ga se želi izbaciti.
<P>
<I>Na primer</I>, ako je ime korisnika kojeg treba izbaciti Stevan: <I>/kick Stevan</I> ili <I>/kick Stevan razlog izbacivanja</I>. "razlog izbacivanja" može biti bilo koji tekst npr. "zbog spamovanja!"
<P>
Ako se * opcija upotrebi (<I>/kick * <?php echo(L_HELP_REASON); ?></I>), komanda će da izbaci iz ćaskanja sve korisnike bez moći (samo gosti i registrovani korisnici). Ovo je veoma korisno kada konekcija servera ima probleme i kad svi korisnici trebaju da ponovo učitaju svoje ćaskanje. U drugom slučaju, <I><?php echo(L_HELP_REASON); ?></I> se preporučuje da se korisnicma objasni zašto su bili izbačeni.
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Zabrana korisnika:</B></A></FONT>
	<P>
	Moderatori mogu zabraniti korisnika dok administrator može zabraniti korisnika i moderatora pomoću <B>ban komande</B>.<br />
	Administrator može da zabrani korisnika iz druge sobe osim one u kojoj trenutno diskutuje. On može da zabrani korisnika zauvek i iz svih četova sa ’<B>*</B>’ podešavanjem pre nadimka korisnika koji treba da bude zabranjen.
	<P>
	<I>Na primer</I>, ako je MIhajlo ime korisnika koji treba da se zabrani: <I>/ban Mihajlo</I>, <I>/ban * Mihajlo</I>, <I>/ban Mihajlo razlog zabrane</I> ili <I>/ban * Mihajlo razlog zabrane</I>. "razlog zabrane" može da bude bilo koji tekst npr. "zbog spamovanja!"
	<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Promovisanje/Opoziv korisnika na/sa status(a) moderatora:</B></A></FONT>
<P>
Moderatori i administrator mogu da promovišu nekog korisnika u status moderatora pomoću <B>promote komande</B>.
<P>
<I>Na primer</I>, ako je Mihajlo ime korisnika za promociju: <I>/promote MIhajlo</I>
<P>
Samo administrator može učiniti suprotno (opozvati moderatora na nivo običnog korisnika) koristeći <B>demote komandu</B>.
<P>
<I>Na primer</I>, iako je Mihajlo ime moderatora koji treba da se opozove: <I>/demote Mihajlo</I> or <I>/demote * Mihajlo</I> (će ga opozvati iz trenutne sobe odnosno svih soba u drugom slučaju).
<br /><P ALIGN="right"><A HREF="#top">Povratak na vrh</A></P>
<P>
</BODY>
</HTML>
<?php
?>