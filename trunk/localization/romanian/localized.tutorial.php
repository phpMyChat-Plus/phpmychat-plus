<?php
// File : romanian/localized.tutorial.php - plus version (26.08.2008 - rev.10)
//Translated and updated to Plus version by Ciprian Murariu <ciprianm@yahoo.com>

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	}
}

require("./lib/index.lib.php");
if (file_exists("./localization/".$L."/localized.cmds.php")) require("./localization/".$L."/localized.cmds.php");
if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Tutorial în limba română a <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Tutorial în limba română a <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</FONT><br /><I>&copy; 2005<?php echo((date('Y')>"2005") ? "-".date('Y') : ""); ?> - Traducerea şi adaptarea de <a href="mailto:ciprianmp@yahoo.com?subject=phpMyChat%20Plus%20translation" onMouseOver="window.status='<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>.'; return true;" title="<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>" target=_blank>Ciprian Murariu</a> - Bucureşti, România.</I></B></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></A></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Cuprinsul acestui tutorial</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Alegerea limbii</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Logarea la Chat</A><br />
<A HREF="#register" CLASS="topLink">Înregistrarea</A><br />
<A HREF="#modProfile" CLASS="topLink">Modificarea<?php if (C_SHOW_DEL_PROF) echo("/ştergerea"); ?> profilului propriu</A><br />
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
	<A HREF="#connection_state" CLASS="topLink">Explicarea stării conexiunii</A><br />
	<?php
}
?>
<A HREF="#sending" CLASS="topLink">Trimiterea Mesajelor</A><br />
<A HREF="#users_list" CLASS="topLink">Explicarea Listei de Utilizatori</A><br />
<A HREF="#exit" CLASS="topLink">Părăsirea unei Camere de chat</A><br />
<A HREF="#users_popup" CLASS="topLink">Cum afli cine e pe chat, fără a te loga</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Personalizarea aspectului Camerei de Chat</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Opţiuni şi Comenzi:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">Comanda Ajutor</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">Avatar-uri</A><br />
<?php
}
?>
<!-- Avatar System End.  -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">Zâmbete grafice (Emoticons, Smilies)</A><br />
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
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">Invitarea unui utilizator să intre în camera ta de chat</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">Trecerea dintr-o cameră de chat într-alta</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">Modificarea profilului propriu</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">Reutilizarea ultimei comenzi sau ultimului mesaj transmis</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">Adresarea către un anumit utilizator în chat</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">Mesaje Private</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">Acţiuni</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">Ignorarea altor Utilizatori</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">Aflarea datelor publice ale Utilizatorilor</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">Salvarea mesajelor</A><br />
	<?php
}
?>
<P>
<A HREF="#moderator" CLASS="topLink">Comenzi speciale numai pentru moderatori şi/sau administrator:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">Trimiterea unui anunţ</A><br />
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
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Alegerea limbii:</B></A></FONT>
	<P>
	Poţi alege una dintre limbile în care <?php echo(APP_NAME); ?> a fost tradus, apăsând pe unul dintre steagurile de pe prima pagină. În exemplul de mai jos, un utilizator îşi selecteaza limba Franceză:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Steaguri pentru selectarea limbii" TITLE="Steaguri pentru selectarea limbii">
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Logarea la chat:</B></A></FONT>
<P>
Dacă te-ai înregistrat deja, pur şi simplu introdu-ţi porecla şi parola. Apoi selectează în ce cameră de chat ai vrea să intri şi apasă butonul ’<?php echo(L_SET_14); ?>’.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
	<P>
	Altfel, va trebui să te <A HREF="#register">înregistrezi</A> mai întâi.
	<?php
}
else
{
	?>
	<P>
	Altfel poţi să te <A HREF="#register">înregistrezi</A> mai întâi sau să intri pe Chat cu porecla aleasă, numai că nu ţi se va rezerva acea poreclă (un alt utilizator va putea folosi aceeaşi poreclă după ce vei ieşi de pe Chat).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Pentru înregistrare:</B></A></FONT>
<P>
Dacă nu te-ai înregistrat deja<?php if (!C_REQUIRE_REGISTER) echo(" şi vrei să o faci"); ?>, alege opţiunea Înregistrează-te. Va apărea o mică fereastră pop-up.
<P>
<UL>
	<LI>Mai întâi, alege-ţi o poreclă<?php if (!C_EMAIL_PASWD) echo(" şi o parolă"); ?> în câmpurile (căsuţele) corespunzătoare. Porecla aleasă va fi numele cu care vei fi arătat în mod automat pe chat. Nu poate conţine spaţii, virgule sau backslash-uri (\).
<?php if (C_NO_SWEAR) echo(" Nu este permisă utilizarea \"cuvintelor obscene\"."); ?>
	<LI>Apoi, introdu-ţi prenumele, numele de familie şi adresa de email. Pentru a te putea înregistra pe chat, aceste informaţii sunt obligatorii. Informaţia privind sexul este opţională (deşi, în funcţie de această alegere, o mică imagine te va particulariza pe chat ca băiat sau fată).
	<LI>Dacă ai o pagină personală, poţi să introduci URL-ul pentru a fi vizitată şi de către ceilalţi utilizatori.
	<LI>Câmpul Limba poate ajuta pe ceilalti în discuţiile viitoare cu tine. Ei vor şti în ce limbă să ţi se adreseze.
	<LI>În cele din urmă, dacă vrei ca ceilalţi participanţi să-ţi cunoască adresa de email, bifează căsuţa de lângă expresia "<?php echo(L_REG_33); ?>". Dacă nu vrei să-ţi fie cunoscut emailul, lasă căsuţa nebifată.
	<LI>Apoi, apasă butonul <?php echo(L_REG_3); ?> şi contul îţi va fi creat. În funcţie de setările serverului, este posibil să trebuiască să aştepţi aprobarea contului de către Administrator. Oricum, vei primi un email de înştiinţare cu instrucţiuni pentru paşii următori. Pentru a te opri fără să te înregistrezi, apasă <?php echo(L_REG_25); ?>.
</UL>
<P>
<A NAME="modProfile"></A>Bineînţeles, utilizatorii care s-au înregistrat îşi vor putea modifica<?php if (C_SHOW_DEL_PROF) echo("/şterge"); ?> profilul personal apăsând pe <?php echo((!C_SHOW_DEL_PROF ? "butonul corespunzător" : "butoanele corespunzătoare")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Pentru a crea o cameră:</B></A></FONT>
	<P>
	Numai utilizatorii înregistraţi pot crea camere. Camerele private vor putea fi accesate numai de către utilizatorii care cunosc numele camerei şi nu vor fi văzuţi decât de către participanţii din camera respectivă.<br />
	<P>
	Numele camerei nu poate conţine virgule sau backslash-uri (\).<?php if (C_NO_SWEAR) echo(" Nu este permisă utilizarea \"cuvintelor obscene\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<P>
	<hr />
	<?php
}
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Explicarea stării conexiunii:</B></A></FONT>
	<P>
	Un semn reprezentând starea conexiunii tale este afişat în colţul din dreapta sus al ecranului. Poate arăta în trei feluri:
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Fără conexiune" TITLE="Fără conexiune"> când nu e nevoie de nicio conexiune;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Conectat" TITLE="Conectat"> când e stabilită o conexiune;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Conectare eşuată" TITLE="Conectare eşuată"> când conexiunea a eşuat.
	</UL>
	<P>
	În cel de-al treilea caz, apăsarea "butonului" roşu va lansa o nouă încercare de conectare (refresh).
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Trimiterea mesajelor:</B></A></FONT>
<P>
Pentru a afişa un mesaj în camera de chat, tastează textul în căsuţa text din colţul stanga jos şi apasă tasta Enter/Return pentru a-l trimite. Mesajele tuturor utilizatorilor se vor derula în fereastra de chat.<br />
<?php if (C_NO_SWEAR) echo("Ţineţi cont că \"înjurăturile\" vor fi înlocuite cu simboluri arbitrare de tipul \"@#$%\"."); ?>
<P>
Poţi schimba culoarea textului afişat alegând o altă culoare din lista de culori din dreapta căsuţei pentru introducerea textului. Anumite culori (roşu, albastru) pot fi rezervate numai utilizatorilor cu drepturi speciale (administratori, moderatori).
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Explicarea listei de utilizatori (nu şi pentru fereastra tip popup):</B></A></FONT>
<P>
<OL>
	Au fost definite două reguli de bază pentru lista de utilizatori:<br />
	<LI>o mică imagine reprezentând sexul (băiat sau fată) este afişată înaintea poreclei unui utilizator înregistrat (apăsând pe acea imagine va lansa comanda <A HREF="#whois">/whois</A>, deschizând un popup cu informaţii despre profilul utilizatorului respectiv), în timp ce utilizatorii neînregistraţi, vor avea doar un spaţiu înaintea poreclei;<br />
	<LI>porecla administratorului sau a moderatorilor va fi afişată cu caractere italice <I>(înclinate)</I>.
</OL>
<P><I>Spre exemplificare</I>, în imaginea de mai jos poţi înţelege următoarele:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="listă utilizatori" TITLE="listă utilizatori">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas este administrator sau unul dintre moderatorii camerei phpMyChat;<br /><br />
		<LI>alien (de sex necunoscut), Jezek2 şi Caridad sunt utilizatori înregistraţi, fără "extra power" pentru camera phpMyChat;<br /><br />
		<LI>lolo este un simplu utilizator neînregistrat (vizitator, guest).
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Părăsirea unei camere de chat:</B></A></FONT>
<P>
Pentru a părăsi camera, fă click pe <?php echo (EXIT_LINK_TYPE) ? "imaginea <img src='localization/$L/images/exitdoor.gif' border=0 alt='".L_EXIT."' title='".L_EXIT."'>" : 'link-ul "'.L_EXIT.'"'; ?>. Poţi face acelaşi lucru utilizând comenzile de mai jos în căsuţa pentru mesaje (acest lucru poate fi util mai ales pentru cazul în care mouse-ul nu răspunde la comenzi):<br />
/exit<br />
/bye<br />
/quit<br />
<?php echo(L_CMD_QUIT != "" && L_CMD_QUIT != "L_CMD_QUIT" ? "* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_QUIT)."</span>")."<br />" : ""); ?>

Oricare dintre aceste comenzi pot fi completate cu un mesaj pe care doriţi să îl trimiteţi înaintea ieşirii din cameră.
<I>Exemplu :</I> /quit La revedere!
<P>
va trimite mesajul "La revedere!" pentru a fi citit de către ceilalţi participanţi, iar apoi te va scoate din cameră.

<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Cum afli cine e pe chat, fără a te loga:</B></A></FONT>
<P>
Poţi apăsa pe link-ul din pagina de start care arată numărul de utilizatori conectaţi pe chat, sau, dacă ai intrat deja în camera de chat, apasă pe imaginea <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_DETACH ?>" TITLE="<?php echo L_DETACH ?>"> din colţul dreapta-sus (sub Ieşire) pentru a deschide o fereastră separată ce va afişa lista utilizatorilor conectati şi camerele în care se află aceştia, actualizată aproape în timp real.<br />
Titlul acestei pagini conţine poreclele utilizatorilor, dacă sunt mai puţin de trei; dacă sunt mai mulţi, titlul va conţine numărul utilizatorilor şi camerele deschise.
<P>
Apăsând pe imaginea <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_BEEP ?>" TITLE="<?php echo L_BEEP ?>"> din partea de sus a acestui popup va activa/dezactiva sunetele de înştiinţare la intrarea unui nou utilizator în cameră.
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Personalizarea aspectului Camerei de Chat:</B></A></FONT>
<P>
Sunt mai multe moduri de a personaliza aspectul cmerei de Chat. Pentru a schimba aceste setări, scrie comanda corespunzătoare în căsuţa text şi apoi apasă tasta Enter/Return.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI><B>Comanda Clear</B> îţi permite să cureţi ecranul de mesaje şi să vezi numai ultimele 5.<br />Scrie "/clear" fără ghilimele.
<?php echo(L_CMD_CLEAR != "" && L_CMD_CLEAR != "L_CMD_CLEAR" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_CLEAR)."</span>") : ""); ?>
		<P>
		<?php
	}
	else
	{
		?>
		<LI><B>Comanda Order</B> > îţi permite să afişezi mesajele noi în partea de sus sau în partea de jos a ecranului.<br />Scrie "/order" fără ghilimele.
<?php echo(L_CMD_ORDER != "" && L_CMD_ORDER != "L_CMD_ORDER" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_ORDER)."</span>") : ""); ?>
		<P>
		<?php
	}
	?>
	<LI><B>Comanda Notify</B> îţi permite să activezi sau să dezactivezi opţiunea de a-ţi fi afişate mesajele referitoare la intrarea sau ieşirea celorlalţi utilizatori din cameră. Implicit, această opţiune este <?php echo(C_NOTIFY ? "activată" : "dezactivată"); ?> iar anunţurile respective <?php echo(C_NOTIFY ? "" : "nu"); ?> vor fi afişate.<br />Scrie "/notify" fără ghilimele.
<?php echo(L_CMD_NOTIFY != "" && L_CMD_NOTIFY != "L_CMD_NOTIFY" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_NOTIFY)."</span>") : ""); ?>
	<P>
	<LI><B>Comanda Timestamp</B> îţi permite să activezi sau să dezactivezi opţiunea de a-ţi fi afişat ora la care un mesaj a fost postat (în faţa mesajului respectiv) şi timpul pe server în bara de stare. Implicit, această opţiune este <?php echo(C_SHOW_TIMESTAMP ? "activată" : "dezactivată"); ?>.<br />Scrie "/timestamp" fără ghilimele.
<?php echo(L_CMD_TIMESTAMP != "" && L_CMD_TIMESTAMP != "L_CMD_TIMESTAMP" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_TIMESTAMP)."</span>") : ""); ?>
	<P>
	<LI><B>Comanda Refresh sau Reload</B> îţi permite să ajustezi rata de reîncărcare (reîmprospătare) pe ecran a mesajelor postate. Rata implicită este setată la <?php echo(C_MSG_REFRESH); ?> secunde. Pentru a o schimba, scrie "/refresh n" sau "/reload n" fără ghilimele, unde n este timpul în secunde al noii rate de reîncărcare.
	<P>
	<I>De exemplu:</I> /refresh 5
	<P>
	va schimba rata de reîncărcare la 5 secunde. *Atenţie, dacă n este setat la mai puţin de 3, reîncărcarea va fi oprită complet (ar putea fi util atunci când vrei să citeşti foarte multe mesaje vechi, fără a fi întrerupt de reîncărcarea paginii)!*
<?php echo(L_CMD_REFRESH != "" && L_CMD_REFRESH != "L_CMD_REFRESH" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_REFRESH)."</span>") : ""); ?>
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
		<LI><B>Comanda Show</B> îţi permite să alegi câte mesaje să ai afişate pe ecran la un moment dat. Pentru a schimba numărul implicit, scrie "/show n" fără ghilimele, unde n este numărul de mesaje vizibile.
		<P>
		<I>De exemplu:</I> /show 50
		<P>
		îţi va afişa pe ecran ultimele 50 de mesaje. Dacă nu toate mesajele încap în fereastra de pe ecran, o bară verticală de navigare va apărea în partea dreapta a ferestrei.</UL>
<?php echo(L_CMD_SHOW != "" && L_CMD_SHOW != "L_CMD_SHOW" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_SHOW)."</span>") : ""); ?>
		<?php
	}
	else
	{
		?>
		<LI><B>Comenzile Show şi Last</B> îţi permit să cureţi ecranul şi să afişezi pe ecran numai ultimele <I>n</I> mesaje. Scrie "/show n" sau "/last n" fără ghilimele, unde n numărul mesajelor de afişat.
		<P>
		<I>De exemplu:</I> /show 50 sau /last 50
		<P>
		vor curăţa ecranul şi vor afişa numai ultimele 50 de mesaje. Dacă nu toate mesajele încap în fereastra de pe ecran, o bară verticală de navigare va apărea în partea dreapta a ferestrei.
<?php echo(L_CMD_SHOW != "" && L_CMD_SHOW != "L_CMD_SHOW" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_SHOW)."</span>") : ""); ?></UL>
		<?php
	}
	?>
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<hr />

<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Opţiuni şi Comenzi</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Comanda Ajutor:</B></A></FONT>
<P>
Odată intrat în camera de chat, poţi deschide o pagină de ajutor apăsând pe imaginea <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> ce se găseşte chiar înainte de căsuţa de mesaje. Acelaşi lucru se poate face şi folosind comenzile <B>"/help" sau "/?"</B> în căsuţa de mesaje.
<?php echo(L_CMD_HELP != "" && L_CMD_HELP != "L_CMD_HELP" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_HELP)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatar-uri:</B></A></FONT>
<P>Avatar-urile sunt imagini grafice care reprezintă utilizatorii. Numai utilizatorii înregistraţi îşi pot alege un avatar personal. Aceştia pot să-şi deschidă Profilul (vezi comanda <A HREF="#changeprofile">/profile</A> pentru mai multe detalii) şi, apăsând pe imaginea avatar, să îşi selecteze avatar-ul dorit dintr-o listă sau prin adăugarea unui link către o imagine disponibilă pe internet (numai imagini accesibile public, nu cele de pe site-uri protejate prin parolă). Imaginile trebuie să fie vizibile în browsere (.gif, .jpg, .png, etc.) - recomandat 32 x 32 pixeli pentru cea mai bună afişare.
<P>Apăsând pe avatar-ul cuiva în zona de mesaje, se va deschide o pagină popup cu profilul acelei persoane (vezi comanda <A HREF="#whois">/whois</A> pentru mai multe detalii).
Apăsând pe propriul tău avatar - în lista de utilizatori din zona din dreapta, va fi invocată comanda /profile (numai dacă eşti înregistrat), permiţându-ţi să îţi editezi profilul.
Dacă nu eşti înregistrat, apăsând pe avatar-ul tău (cel implicit pentru vizitatori) îţi va fi afişat un mesaj cu recomandarea de a te înregistra.
<P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><B>Zâmbete grafice (Emoticons, Smilies):</B></A></FONT>
	<P>Poţi adăuga zâmbete grafice în mesajele tale. Mai găseşti codul pe care trebuie să-l tastezi în cadrul unui mesaj pentru a obţine fiecare din zâmbetele de mai jos.
	<P>
	<I>De exemplu</I>, trimiţând mesajul "Salut Daniele :)" fără ghilimele, va fi afişat mesajul Salut Daniele <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)" TITLE=":)"> în fereastra de mesaje.
	<P ALIGN="center">
	<TABLE BORDER=0 CELLPADDING=3 CELLSPACING=5>
	<?php
	$i = 0;
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
	<FONT SIZE="+1"><A NAME="text"><B>Formatarea Textului:</B></A></FONT>
	<P>
	Text-ul poate fi îngroşat, înclinat sau subliniat, prin încadrarea textului dorit între tag-urile HTML: &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; sau, respectiv, &LT;U&GT; &LT;/U&GT.
	<P>
	<I>De exemplu</I>, &LT;B&GT;acest text&LT;/B&GT; va produce <B>acest text</B>.
	<P>
	<B>Comanda /ltr sau /rtl</B>: <?php echo(L_HELP_CMD_34.((L_CMD_LTR != "" && L_CMD_LTR != "L_CMD_LTR") || (L_CMD_RTL != "" && L_CMD_RTL != "L_CMD_RTL") ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>".(L_CMD_LTR != "" && L_CMD_LTR != "L_CMD_LTR" ? "/".str_replace(","," /",L_CMD_LTR)." " : "").(L_CMD_RTL != "" && L_CMD_RTL != "L_CMD_RTL" ? "/".str_replace(","," /",L_CMD_RTL) : "")."</span>") : "")); ?>
	<P>
	<I>De exemplu</I>, /ltr acest text va produce "<BDO dir="ltr">acest text</BDO>", iar /rtl acest text va produce "<BDO dir="rtl">acest text</BDO>".
	<P>
	Pentru a crea o hyper-legătură (link) pentru o adresă de email sau adresă WEB, pur şi simplu tastează adresa (fără niciun tag HTML). Hyper-legătura va fi creată în mod automat.
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
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
<b><?php echo(L_COL_HELP_SUB3); ?></b><br />
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php if (COLOR_FILTERS) echo("a) COLOR_FILTERS = <b>".(COLOR_FILTERS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".(COLOR_ALLOW_GUESTS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />c) COLOR_NAMES = <b>".(COLOR_NAMES == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<?php if (COLOR_FILTERS) echo("<u>".L_COLOR_HEAD_SETTINGSa."</u> ".L_WHOIS_ADMIN." = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, ".L_WHOIS_MODERS." = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, ".L_WHOIS_OTHERS." = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>."); else echo("<u>".L_COLOR_HEAD_SETTINGSb."</u> <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.") ?><br />
<u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("<font color=".COLOR_CA.">".L_WHOIS_ADMIN); elseif ($CookieStatus == "t") echo("<font color=".COLOR_CA.">".L_WHOIS_TOPMOD); elseif ($CookieStatus == "m") echo("<font color=".COLOR_CM.">".L_WHOIS_MODER); else echo("<font color=".COLOR_CD.">".L_WHOIS_GUEST); echo("</font>");?></b>.<br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Invitarea unui utilizator să intre în camera ta de chat:</B></A></FONT>
<P>
Poţi folosi <B>comanda invite</B> pentru a invita un utilizator să intre în camera în care te găseşti.
<P>
<I>De exemplu:</I> /invite Jack
<P>
va trimite lui Jack un mesaj privat, sugerându-i să vină şi el în camera ta de chat. Acest mesaj va conţine numele camerei ţintă şi va fi formatat ca un link.This message contains the name of the target room and this name appears as a link.
<P>
Ţine cont că poţi adăuga mai multe nume prin această comandă, invitând mai mulţi utilizatori în camera ta (ex: "/invite Jack,Helen,Alf"). Numele trebuie despărţite prin virgulă (,) fără spaţii.
<?php echo(L_CMD_INVITE != "" && L_CMD_INVITE != "L_CMD_INVITE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_INVITE)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Trecerea dintr-o cameră de chat într-alta:</B></A></FONT>
<P>
Lista din zona din dreapta oferă o listă a tuturor camerelor disponibile, precum şi utilizatorii care se găsesc la un moment dat în fiecare cameră. Pentru a părăsi camera în care eşti şi a intra într-o altă cameră, apasă pur şi simplu pe numele noii camere. Camerele goale nu apar în această listă. Te poţi muta într-o cameră goală folosind <B>comanda "/join #nume cameră"</B>, fără ghilimele.
<P>
<I>De exemplu:</I> /join #Camera Roşie
<P>
te va muta în "Camera Roşie".
<?php
if (C_VERSION == "2")
{
	?>
<br /><P>Totodată,<?PHP	echo(!C_REQUIRE_REGISTER ? " dacă eşti înregistrat, " : " "); ?>
	poţi să creezi o nouă cameră folosind aceeaşi comandă. Pentru aceasta, va trebui să specifici tipul camerei: 0 pentru cameră privată, 1 pentru cameră publică (valoarea implicită dacă nu se specifică tipul).
	<P>
	<I>De exemplu:</I> /join 0 #Camera Mea
	<P>
	va crea o cameră privată nouă numită "Camera Mea" (considerând că nu există deja una publică cu acelaşi nume) şi te va muta automat în această nouă cameră.
	<P>
	Numele camerei nu poate conţine virgule sau backslash (\).<?php if (C_NO_SWEAR) echo(" Nu este permisă utilizarea \"cuvintelor obscene\"."); ?>
	<?php
}
?>
<?php echo(L_CMD_JOIN != "" && L_CMD_JOIN != "L_CMD_JOIN" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_JOIN)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><a name="changeprofile"><B>Modificarea profilului propriu:</B></FONT>
<P>
<B>Comanda Profile</B> va deschide o fereastră separată (pop-up) în care vei putea să-ţi modifici profilul de utilizator, cu excepţia numelui (poreclei) şi parolei (acestea pot fi modificate numai folosind link-ul din pagina de start - fără a fi logat pe chat).<br />Scrie "/profile" fără ghilimele.
<?php echo(L_CMD_PROFILE != "" && L_CMD_PROFILE != "L_CMD_PROFILE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_PROFILE)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><a name="recall"><B>Reutilizarea ultimei comenzi sau ultimului mesaj transmis:</B></FONT>
<P>
<B>Comanda ! sau Recall</B> va readuce în căsuţa de mesaje ultimul mesaj trimis sau ultima comandă folosită.<br />Scrie "/!" sau "/recall" fără ghilimele.
<?php echo(L_CMD_RECALL != "" && L_CMD_RECALL != "L_CMD_RECALL" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_RECALL)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><a name="respond"><B>Adresarea către un anumit utilizator în chat:</B></FONT>
<P>
Apăsând pe numele unui utilizator din lista din dreapta ecranului, în căsuţa de mesaje va apărea automat "nume_utilizator>". Această facilitate îţi permite să te adresezi (public) cu uşurinţă unui anumit utilizator, spre exemplu ca un răspuns la ceva postat de acesta mai devreme.
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Mesaje Private:</B></A></FONT>
<P>
Pentu a trimite un mesaj privat către un utilizator din camera în care te afli, foloseşte <B>comanda "/msg nume_utilizator textul mesajului" sau "/to nume_utilizator textul mesajului"</B> fără ghilimele.
<P>
<I>De exemplu, dacă Jack este numele utilizatorului:</I> /msg Jack Salutare, ce mai faci?
<P>
Mesajul va putea fi citit numai de către tine şi Jack şi de niciun alt utilizator.
<?php echo(L_CMD_MSG != "" && L_CMD_MSG != "L_CMD_MSG" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_MSG)."</span>") : ""); ?>
<P>
Dacă opţiunea MP (Mesagerie Privată) este activată, poţi de asemenea să trimiţi şoapte (whispers) către un utilizator aflat într-o altă cameră, folosind <B>comanda "/wisp nume_utilizator textul mesajului"</B> fără ghilimele.<?php echo(L_CMD_WISP != "" && L_CMD_WISP != "L_CMD_WISP" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_WISP)."</span>") : ""); ?>
<P>
<?php
if (!C_PRIV_POPUP)
{
?>
Apăsând pe numele unui utilizator în ecranul principal de mesaje, comanda corespunzătoare /to sau /wisp va fi adaugată în mod automat în căsuţa de scriere a mesajelor.
<?php
}
else
{
?>
Apăsând pe numele unui utilizator din lista din dreapta ecranului, se va deschide automat un fereastră pop-up în care vei putea scrie mesajul urmat de tasta ENTER pentru atrimite mesajul privat. Răspunsurile pe care le vei primi, se vor deschide de aseenea într-o fereastră separată.
<?php
}
?>
<P>
Notă: When PM pop-ups are enabled (in both chat settings and your own profile), you'll be able to review all the off-line PMs you received since last time you logged in to chat or while you set "away"; all the new off-line PMs addressed to you will open in a pop-up window; you may reply to them one by one from the same window.
This PM off-line feature is available only for registered users.
<P>
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php echo("a) ENABLE_PM = <b>".(C_ENABLE_PM == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) PRIV_POPUP = <b>".(C_PRIV_POPUP == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Acţiuni:</B></A></FONT>
<P>
To describe what you're doing you can use the <B>command "/me action"</B> fără ghilimele.
<P>
<I>For example:</I> If Jack sends the message "/me is drinking a coffee" the message frame will show "<B>* Jack</B> is drinking a coffee".
<?php echo(L_CMD_ME != "" && L_CMD_ME != "L_CMD_ME" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_ME)."</span>") : ""); ?>
<P>
As a variation to this command, there is the <B>/mr command</B> available, which will also put the gender title in front of the username.
<P>
<I>For example:</I> If Jack sends the message "/mr is watching TV" the message frame will show "<B>* <?php echo(sprintf(L_HELP_MR, "Jack")); ?></B> is watching TV".
<?php echo(L_CMD_MR != "" && L_CMD_MR != "L_CMD_MR" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_MR)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorarea altor Utilizatori:</B></A></FONT>
<P>
To ignore all of the posts by another user, type the <B>command "/ignore username"</B> fără ghilimele.
<P>
<I>For example:</I> /ignore Jack
<P>
From that time onward, no messages by the user Jack will display on your screen.
<P>
To have a list of the users whose messages are ignored, scrie <B>comanda "/ignore"</B> fără ghilimele.
<P>
To resume display of message by an ignored user, scrie <B>comanda "/ignore - nume_utilizator"</B> fără ghilimele, unde "-" este tasta minus. <P>
<P>
<I>For example:</I> /ignore - Jack
<P>
Now all the messages by Jack posted during the current chat session will be displayed on your screen, including those messages posted by Jack before you typed this command.<br />
If you don't specify a username after the hyphen, your "ignored list" will be cleaned.
<P>
Note that you can put more than one username in the ignore command (eg "/ignore Jack,Helen,Alf" or "/ignore - Jack,Alf"). They must be splitted by comma (,) without spaces.
<?php echo(L_CMD_IGNORE != "" && L_CMD_IGNORE != "L_CMD_IGNORE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_IGNORE)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="whois"><B>Aflarea datelor publice ale Utilizatorilor:</B></A></FONT>
<P>
To see public information about a user, type the <B>command "/whois username"</B> fără ghilimele.
<P>
<I>For Example:</I> /whois Jack
<P>
where ’Jack’ is the username. This command will create a separate pop-up window that will display the publicly available information about that user. Use your own name to check out how your profile info is displayed to other users using the same command.
<?php echo(L_CMD_WHOIS != "" && L_CMD_WHOIS != "L_CMD_WHOIS" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_WHOIS)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Salvarea mesajelor:</B></A></FONT>
	<P>
	To export messages (notification ones excluded) to a local HTML file, type the <B>command "/save n"</B> or <B>"/export n"</B>fără ghilimele.
	<P>
	<I>For Example:</I> /save 5
	<P>
	where ’5’ is the number of messages to save. If n is not specified, all available messages sent to the current room will be taken into account.
<?php echo(L_CMD_SAVE != "" && L_CMD_SAVE != "L_CMD_SAVE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_SAVE)."</span>") : ""); ?>
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<P>
	<hr />
	<?php
}
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Comenzi speciale numai pentru moderatori şi/sau administrator</U></B></A></FONT>

<P>
<FONT SIZE="+1"><A NAME="announce"><B>Trimiterea unui anunţ:</B></A></FONT>
<P>
The administrator may make a system wide announcement to all the rooms and reach all the users currently login with the <B>announce command</B>.
<P>
<I>For example: /announce The chat system is going down for maintenance tonight at 8pm.</I>
<?php echo(L_CMD_ANNOUNCE != "" && L_CMD_ANNOUNCE != "L_CMD_ANNOUNCE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_ANNOUNCE)."</span>") : ""); ?>
<P>
There is another useful announcement like command for role-playing chats; the administrator or moderators in a room may also send an announcement to all users in current room or all the rooms with the <B>room command</B>.
<P>
<I>For example: /room The meeting starts at 15 pm.</I> or <I>/room * The meeting starts at 15 pm in the Staff room.</I>
<?php echo(L_CMD_ROOM != "" && L_CMD_ROOM != "L_CMD_ROOM" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_ROOM)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="kick"><B>Eliminarea unui Utilizator:</B></FONT>
<P>
Moderators can kick a user and the administrator can kick a user or a moderator with the <B>kick</B> or <B>boot command</B>. Except for the administrator, the user to be kicked must be in the current room.
<P>
<I>For example</I>, if Jack is the name of the user to kick away:<I> /kick Jack</I> or <I>/kick Jack reason of kicking</I>. The "reason of kicking" can be any text e.g. "for spamming!"
<P>
Dacă este folosită opţiunea * (<I>/kick * <?php echo(L_HELP_REASON); ?></I>), aceasta va elimina din camera de chat toţi utilizatorii obişnuiţi (nu şi moderatorii sau adminii). Aceasta este util atunci când sunt probleme de conectare la server, fiind necesar ca toţi utilizatorii să reîncarce chat-ul prin relogare. În acest caz, se recomandă ca <I><?php echo(L_HELP_REASON); ?></I> să fie precizat, pentru ca utilizatorul să ştie de ce a fost eliminat din cameră.
<?php echo(L_CMD_KICK != "" && L_CMD_KICK != "L_CMD_KICK" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_KICK)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Blocarea unui Utilizator:</B></A></FONT>
	<P>
	Moderators can banish a user and the administrator can banish a user or a moderator with the <B>ban command</B>.<br />
	The administrator can banish a user from another room than the one he is chatting into. He can also banish a user forever and from the chat as a whole with the ’<B>*</B>’ setting that must be inserted before the nick of the user to be banished.
	<P>
	<I>For example</I>, if Jack is the name of the user to banish: <I>/ban Jack</I>, <I>/ban * Jack</I>, <I>/ban Jack reason of banning</I> or <I>/ban * Jack reason of banning</I>. The "reason of banning" can be any text e.g. "for spamming!"
<?php echo(L_CMD_BAN != "" && L_CMD_BAN != "L_CMD_BAN" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_BAN)."</span>") : ""); ?>
	<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
	<P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Promovarea/demiterea unui utilizator ca moderator:</B></A></FONT>
<P>
Moderators and the administrator can promote an other user to moderator with the <B>promote command</B>.
<P>
<I>For example</I>, if Jack is the name of the user to promote: <I>/promote Jack</I>
<?php echo(L_CMD_PROMOTE != "" && L_CMD_PROMOTE != "L_CMD_PROMOTE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_PROMOTE)."</span>") : ""); ?>
<P>
Only the administrator can access the opposite feature (reduce a moderator to simple user) using the <B>demote command</B>.
<P>
<I>For example</I>, if Jack is the name of the moderator to demote: <I>/demote Jack</I> or <I>/demote * Jack</I> (will demote him from current or all the rooms).
<?php echo(L_CMD_DEMOTE != "" && L_CMD_DEMOTE != "L_CMD_DEMOTE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_DEMOTE)."</span>") : ""); ?>
<br /><P ALIGN="right"><A HREF="#top">Sus la Cuprins</A></P>
<P>
</BODY>
</HTML>
<?php
?>