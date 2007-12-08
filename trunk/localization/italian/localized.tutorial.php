<?php
// File : italian/localized.tutorial.php - plus version (09.09.2007 - rev.7)
// Original translation by Marco Borrini <marco.borrini@tradimento.it> & Bartolotta Gioachino <developers@rockitalia.com> & Silvia M. Carrassi <silvia@ladysilvia.net> & Daniele <danybec@tin.it>
// Updates, corrections and additions for the Plus version by Mike Mikius <mikiusss@yahoo.com>
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
<TITLE>Guida in italiano per <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Guida in italiano per <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</FONT><br /><I>&copy; 2007<?php echo((date(Y)>"2007") ? "-".date(Y) : ""); ?> - Traduzione di <a href="mailto:rinodeniro@hotmail.com?subject=Italian%20phpMyChat%20Plus%20translation" onMouseOver="window.status='<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>.'; return true;" title="<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>" target=_blank>Michele Ferro</a> - Foggia, Italia.</I></B></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Contenuti di questa Guida</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Scegliere una lingua</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Entrare nella chat</A><br />
<A HREF="#register" CLASS="topLink">Registrarsi</A><br />
<A HREF="#modProfile" CLASS="topLink">Modificare<?php if (C_SHOW_DEL_PROF) echo("/eliminare"); ?> il proprio profilo</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Creare una stanza</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Comprendere lo stato di connessione</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Mandare un messaggio</A><br />
<A HREF="#users_list" CLASS="topLink">Comprendere la lista degli utenti</A><br />
<A HREF="#exit" CLASS="topLink">Lasciare la stanza di chat</A><br />
<A HREF="#users_popup" CLASS="topLink">Sapere chi sta chattando senza essere collegati</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Personalizzare la vista della chat</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Caratteristiche e comandi:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">Comando Aiuto</A><br />
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
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Smilies grafici</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#text" CLASS="topLink">Formattazione del testo</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Invitare un utente ad entrare nella tua attuale stanza chat</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">Cambiare da una stanza chat ad un’altra</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeprofile" CLASS="topLink">Modificare il proprio profilo all’interno della chat</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#recall" CLASS="topLink">Richiamare l’ultimo messaggio o comando che avete inviato</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#respond" CLASS="topLink">Rispondere ad un utente specifico</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Messaggi privati</A><BR>
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS="topLink">Azioni</A><BR>
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Ignorare altri utenti</A><BR>
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">Ottenere informazioni pubbliche sugli altri utenti</A><BR>
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#save" CLASS="topLink">Salvare i messaggi</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Comandi speciali per i moderatori e/o l’amministratore:</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Mandare un avviso</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#kick" CLASS="topLink">Cacciare un utente</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#banish" CLASS="topLink">Espellere un utente</A><br />
	<?php
};
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#promote" CLASS="topLink">Promuovere/degradare un utente e moderatore</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Scegliere una lingua:</B></A></FONT>
	<P>
	Potete scegliere una lingua tra le quali <?php echo(APP_NAME); ?> e’ stato tradotto cliccando su una delle bandierine nella pagina iniziale. Nell’esempio qui sotto, un utente ha scelto la lingua francese:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Bandiere per la scelta della lingua">
	<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Entrata:</B></A></FONT>
<P>
Se vi siete già registrati, potete semplicemente Entrare inserendo il vostro nome utente e la password. Dopo selezionate la stanza di chat dove vorreste entrare per poi premere il bottone ’<?php echo(L_SET_14); ?>’.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Altrimenti dovrete <A HREF="#register">registrarvi</A> per prima cosa.
	<?php
}
else
{
	?>
<P>
	Altrimenti potrete <A HREF="#register">registrarvi</A> prima oppure entrare semplicemente in una stanza ma il vostro nome utente non verrà riservato (un altro utente potrà utilizzare lo stesso username una volta che vi sarete scollegati).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Per registrarsi:</B></A></FONT>
<P>
Se non siete ancora registrati<?php if (!C_REQUIRE_REGISTER) echo(" e volete farlo"); ?>, prego scegliete l’opzione di registrazione. Apparirà una piccola finestra pop-up.
<P>
<UL>
	<LI>Primo, create uno pseudonimo<?php if (!C_EMAIL_PASWD) echo(" e una password"); ?> per voi digitandolo nello spazio appropriato. Lo pseudonimo che sceglierete sarà il nome che comparirà automaticamente nella chat. Non può contenere spazi, virgole o backslash (\).
<?php if (C_NO_SWEAR) echo(" Non può contenere \"parole vietate\"."); ?>
	<LI>Secondo, inserite il vostro nome, cognome e il vostro indirizzo email. Per far in modo che ci si registri alla chat, tutte queste informazioni devono essere fornite. Potete non specificare il vostro sesso.
	<LI>Se avete una homepage, potete inserire l’URL in questo campo..
	<LI>Il campo della lingua può aiutare altri utenti in future discussioni: essi sapranno quale lingue voi potere capire.
	<LI>Infine, se volete permettere che la vostra email sia visibile dagli altri partecipanti della stanza di chat, potete spuntare la casellina di fianco a "mostra l’email nelle informazioni pubbliche". Se non
desiderate che sia visibile il vostro indirizzo email, lasciate la casella non spuntata.
	<LI>Dopo, premete il bottone Registrati e verrà creato il vostro account. Se volete interrompere la registrazione in qualunque momento, premete il tasto Chiudi.
</UL>
<P>
<A NAME="modProfile"></A>Ovviamente, gli utenti registrati saranno in grado di modificare<?php if (C_SHOW_DEL_PROF) echo("/cancellare"); ?> il proprio profilo personale cliccando sugli appropriati <?php echo((C_SHOW_DEL_PROF == "0" ? "link" : "links")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Per creare una stanza:</B></A></FONT>
	<P>
	Gli utenti registrati possono creare stanze. Quelle private potranno essere visitate solo dagli utenti che conoscono il loro nome e non saranno mai visulaizzate eccetto per gli utenti che ci stanno dentro..<br />
	<P>
	I nomi di stanze non possono contenere virgole o backslash (\).<?php if (C_NO_SWEAR) echo(" Non possono poi contenere \"parole vietate\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Comprendere lo stato di connessione:</B></A></FONT>
	<P>
	Un segnale che rappresenta lo stato della vostra connessione è situato all’angolo destro in alto dello schermo. Può essere di tre forme:
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Nessuna connessione"> Quando non è richiesta una connessione ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connessione in corso"> Quando c’è una connessione in corso ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connessione fallita"> Quando fallisce una connessione.
	</UL>
	<P>
	Nel terzo caso, cliccando sul pulsante "rosso" lancerà un nuovo tentativo di connessione.
	<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Inviare messaggi:</B></A></FONT>
<P>
Per inviare un messaggio nella stanza di chat, digitate il vostro testo nel campo nell’angolo inferiore a sinistra e poi premete il tasto Invio per inviarlo. I messaggi di tutti gli utenti scrolleranno nella zona dell chat.<br />
<?php if (C_NO_SWEAR) echo("Fate attenzione che le \"parole vietate\" non saranno visualizzate."); ?>
<P>
Potete cambiare il colore del testo del vostro messaggio scegliendo un nuovo colore dalla lista delle scelte alla destra del campo invio testo.
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Comprendere la lista degli utenti (non per la finestra popup degli utenti):</B></A></FONT>
<P>
<OL>
	Sono state definite due aggiunte per la lista degli utenti:<br />
	<LI>una piccola icona e’ visualizzata prima del nickname di un utente registrato (e cliccando su esso si fara’ partire la <A HREF="#whois">finestra popup</A> per questo utente), mentre gli utenti non registrati avranno solamente un segno ’-’ prima del loro nickname;<br />
	<LI>il nome utente di un amministratore o di un moderatore e’ in corsivo.
</OL>
<P><I>Per esempio</I>, dall’immagine di qui sotto potere capire che:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas e’ l’amministratore o uno dei moderatori dell’area phpMyChat;<br /><br />
		<LI>alien (il cui genere è sconosciuto), Jezek2 e Caridad sono utenti registrati senza alcun privilegio extra per la stanza phpMyChat;<br /><br />
		<LI>lolo è semplicemente un utente non registrato.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Uscire dall’area di chat:</B></A></FONT>
<P>
Per uscire dalla chat, cliccate semplicemente su "Esci". Oppure potete inserire uno dei seguenti comandi nel vostra casella di testo:<br />
/exit<br />
/bye<br />
/quit<br />
Questi comandi possono essere completati con un messaggio da inviare prima che voi lasciate la stanza di chat.
<I>Per esempio :</I> /quit arrivederci!
<P>
invierà il messaggio "arrivederci!" nel frame principale dopodichè si uscirà.

<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Conoscere chi sta chattando senza essere collegati:</B></A></FONT>
<P>
Potete cliccare sul collegamento che mostra il numero di utenti collegati alla pagina iniziale o, se state chattando, sull’immagine <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_DETACH ?>"> nell’angolo alto a destra dello schermo per aprire una finestra indipendente che mostrerà la lista degli utenti collegati e le stanze in cui stanno in tempo quasi reale.<br />
Il titolo della finestra contiene i nomi utente se sono meno di tre, altrimenti il numero degli utenti e le stanze attive.
<P>
Cliccando sull’icona <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_BEEP ?>"> sopra questo popup abiliterò/disabiliterà l’uso di suoni per l’entrata degli utenti.
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Personalizzare la visualizzazione della chat:</B></A></FONT>
<P>
Ci sono molti differenti modi di personalizzare l’aspetto della chat. Per cambiare le impostazioni, digitate semplicemente il comando appropriato nel vostro campo testo e premete il tasto "Invio".
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>Il <B>comando Clear</B> vi permette di pulire lo schermo principale della chat e di visualizzare gli ultimi 5 messaggi inviati sullo schermo.<br />Digiate "/clear" senza virgolette.
		<P>
		<?php
	}
	else
	{
		?>
		<LI>Il <B>comando Order</B> vi permette di far visualizzare i nuovi messaggi all’inizio dello schermo o alla fine.<br />Digitate "/order" senza virgolette.
		<P>
		<?php
	};
	?>
	<LI>Il <B>comando Notify</B> vi permette di abilitare/disabilitare l’opzione con cui si possono vedere i messaggi di notifica quando gli altri utenti entrano/escono dalla stanza della chat. Di base questa opzione è <?php echo(C_NOTIFY ? "abilitata" : "disabilitata"); ?> e le notifiche <?php echo(C_NOTIFY ? "saranno" : "non saranno"); ?> viste.<br />Digitate "/notify" senza virgolette.
	<P>
	<LI>Il <B>comando Timestamp</B> vi permette di abilitare/disabilitare l’opzione con cui viene visualizzato l’ora del messaggio che viene postato prima di ogni messaggio e l’ora del server nella barra di stato. Di norma questa opzione è <?php echo(C_SHOW_TIMESTAMP ? "abilitata" : "disabilitata"); ?>.<br />Digitate "/timestamp" senza virgolette.
	<P>
	<LI>Il <B>comando Refresh</B> vi permette di aggiustare il ritmo con cui i messaggi digitati sono ri-visualizzati sul vostro schermo. Il ritmo standard è correntemente di <?php echo(C_MSG_REFRESH); ?> secondi. Per cambiare il ritmo digitate "/refresh n" senza virgolette dove n è il tempo in secondi del nuovo ritmo di ri-visualizzazione.
	<P>
	<I>Per esempio:</I> /refresh 5
	<P>
	cambierà il ritmo a 5 secondi. *Attenzione, se n è settato a meno di 3 secondi, la ri-visualizzazione viene resettata proprio per non fare la ri-visualizzazione (utile se volete leggere molti messaggi senza essere disturbati)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
		<LI>Il <B>comando Show</B> vi permette di aggiustare il numero di messaggi visualizzabili sul vostro schermo. per cambiare il valore di base, digitate "/show n" senza virgolette dove n è il numero di messaggi da visualizzare.
		<P>
		<I>Per esempio:</I> /show 50
		<P>
		farà in modo che i 50 messaggi piů nuovi siano visibili sul vostro schermo. Se tutti i messaggi non possono essere visualizzari dentro la finestra della chat, apparirà una barra di scorrimento sul lato destro della schermata dei messaggi.</UL>
		<?php
	}
	else
	{
		?>
		<LI>I <B> comandi Show e Last</B> vi permettono di ripulire lo schermo e di visualizzare gli ultimi <I>n</I> messaggi inviati sul vostro schermo. Digitate /show n" o "/last n" senza virgolette dove n è il numero di messaggi da visualizzare.
		<P>
		<I>Per esempio:</I> /show 50 o /last 50
		<P>
		ripulirerà il frame dei messaggi e farà in modo che i 50 messaggi piů nuovi siano visibili sul vostro schermo. Se tutti i messaggi non potranno essere visualizzati all’interno della schermata dei messaggi, apparirà una barra di scorrimento sul lato destro di quest’ultima.</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Caratteristiche e Comandi</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Comando Aiuto</B></A></FONT>
<P>
Una volta all’interno di una stanza di chat, potete avviare il popup di aiuto cliccando sull’immagine <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> che si trova appena prima del frame di invio messaggi. Potete anche digitare i <B>comandi "/help" o "/?"</B> nel campo invio messaggi.
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatars:</B></A></FONT>
<P>Avatars sono icone di immagini grafiche che rappresentano gli utenti. Solo utenti registrati possono cambiare il loro avatar. Gli utenti registrati possono aprire il loro profilo (vedi il comando /profile ) e clickare sull’immagine dell’avatar per selezionarlo da un menu di immagini, oppure immetterlo da un URL che punta su un’immagine grafica idonea in qualsiasi posto della rete (solo immagini con accesso pubblico, siti senza protezione password). Le immagini dovrebbero essere visibili dai browser (.gif, .jpg, etc. ) con formato 32 x 32 pixel per la migliroe visualizzazione.
<P>Clickando sull’avatar di una persona nella sezione dei messaggi, aprirà una finestra pop up con il profilo della persona (vedi il comando <A HREF="#whois">/whois</A>).
Clickando sul proprio avatar nella lista utenti richiamerà il comando /profile , se sei registrato.
Se non sei registrato, clickando sul proprio avatar (è di default), aprirà un avviso per incoraggiarti a registrarti.
 <P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
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
	<P>Potete avere dei simpatici smilies dentro i vostri messaggi. Guaradte sotto il codice che dovete inserire nel messaggio per ottenere uno di questi smiles.
	<P>
	<I>Per esempio</I>, inviando il teso, "Hi Jack :)" senza virgolette verra’ visualizzato il messaggio Hi Jack <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> nel frame principale.
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
	<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Formattazione di testo:</B></A></FONT>
	<P>
	Il testo puo’ essere in grassetto, corsivo o sottolineato delimitando la sezioni di testo da applicare con i tag HTML &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; or &LT;U&GT; &LT;/U&GT.
	<P>
	<I>Per esempio</I>, &LT;B&GT;questo testo&LT;/B&GT; produrrà <B>questo testo</B>.
	<P>
	Per creare un collegamento ipertestuale per un indirizzo email o un URL, digitate l’indirizzo (senza alcun tag HTML). Il collegamento ipertestuale verrà creato automaticamente.
	<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
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
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Invitare un utente ad entrare nella tua attuale stanza chat:</B></A></FONT>
<P>
Potete usare il <B>comando invite</B> per suggerire ad un utente di partecipare all’area dove state chattando.
<P>
<I>Per esempio:</I> /invite Jack
<P>
inviera’ un messaggio provato a Jack invitandolo ad unirvi con voi nella vostra area di chat corrente. Questo messaggio contiene il nome della area di chat e questo nome apparira’ come un link.
<P>
Notate che potete inserire più di un nomeutente nel comando /invite (per es. "/invite Jack,Helen,Alf"). Essi devono essere divisi da una virgola (,) senza spazi.
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Cambiare da una stanza chat ad un’altra:</B></A></FONT>
<P>
L’elenco sulla destra dello schermo fornisce una lista delle stanze di chat e gli utenti che stanno correntemente in quella stanza. Per lasciare una stanza per spostarsi in una di queste, cliccate semplicemente sul nome di quella stanza. Le stanze vuote non appaiono sulal lista. Potete anche spostarvi in una stanza vuota digitando <B>comando "/join #nomestanza"</B> senza virgolette.
<P>
<I>Per esempio:</I> /join #RedRoom
<P>
vi porterà in RedRoom.
<?php
if (C_VERSION == 2)
{
	echo(!C_REQUIRE_REGISTER ? "<P>Se siete un utente registrato, voi" : "<br /><P>Voi");
	?>
	 potete anche creare una nuova stanza con lo stesso commando. Ma dopo dovrete specificarne il tipo: 0 sta per privata,1 per pubblica (valore di norma).
	<P>
	<I>Per esempio:</I> /join 0 #MiaStanza
	<P>
	creerà una nuova stanza privata (dando per scontato che una pubblica con lo stesso nome non sia già stata creata) chiamata MiaStanza e vi porterà all’interno di essa.
	<P>
	I nomi di stanze non possono contenere spazi o backslash (\).<?php if (C_NO_SWEAR) echo(" Non può contenere parole vietate."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>Modificare il proprio profilo all’interno della chat:</B></FONT>
<P>
Il <B>comando Profile</B> crea una finestra pop-up separata nella quale è possibile modificare il proprio profilo utente e modificare tranne che per il cotro nome utente e password (dovrete usare il link all’inizio della pagina d’ingresso.<br />Digitate /profile
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>Richiamare l’ultimo messaggio o comando che avete inviato:</B></FONT>
<P>
Il <B>comando !</b> richiama l’ultimo messaggio o comando che avete inviato.<br />Digitate /!
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>Rispondere ad un utente specifico:</B></FONT>
<P>
Cliccando una volta sul nome di un utente nella vostra stanza chat (alla destra dello schermo) farà che appaia "nomeutente>" nel vostro campo invio messaggi. Questa caratteristica permette di dirigere facilmente un messaggio pubblico ad un utente, forse in risposta a qualcosa che egli/lei aveva postatao sopra.
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Messaggi privati:</B></A></FONT>
<P>
Per inviare un messaggio privato ad un altro utente nella vostra stanza, digitate il <B>comando "/msg nomeutente testomessaggio" oppure "/to nomeutente testomessaggio"</B> senza apici.
<P>
<I>Per esempio, dove Jack è il nome utente:</I> /msg Jack Io sono qua, come stai?
<P>
Il messaggio apparirà a Jack e a voi stessi, ma nessun altro utente lo vedrà.
<P>
Osservate che cliccando su un nick di qualcuno che ha scritto nel frame principale, verrà aggiunto automaticamente questo comando nel campo invio messaggi.
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Azioni:</B></A></FONT>
<P>
Per descrivere cosa stai facendo potete usare il <B>comando "/me action"</B> senza virgolette.
<P>
<I>Per esempio:</I> Se Jack manda il messaggio "/me sta bevendo una tazza di caffè" il messaggio che comparirà sarà "<B>* Jack</B> sta bevendo una tazza di caffè".
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorare altri utenti:</B></A></FONT>
<P>
Per ignorare tutti i messaggi di un altro utente, digitate il <B>comando "/ignore nomeutente"</B> senza virgolette.
<P>
<I>Per esempio:</I> /ignore Jack
<P>
Da questo momento in poi, nessun messaggio proveninete dall’utente Jack sarà visualizzato sullo schermo.
<P>
Per avere la liste degli utenti i cui messaggi sono ignorati, basta che digitate il <B>comando "/ignore"</B> senza virgolette.
<P>
Per ripristinare la visualizzazione dei mesaggi di un utente ignorato, digitate il <B>comando "/ignore - nomeutente"</B> senza virgolette dove ’-’ è un trattino.<P>
<P>
<I>Per esempio:</I> /ignore - Jack
<P>
Adesso tutti i messaggi di Jack postati durante la sessione corrente di chat saranno visualizzati sul vostro schermo, inclusi quelli digitati prima di questo messaggio.
Se non specificate un nomeutente dopo hyphen, la vostra ’lista degli ignorati’ sarà ripulita.
<P>
Notate che potete inserire più di un nomeutente nel comando /ignore (per es. "/ignore Jack,Helen,Alf" oppure "/ignore - Jack,Alf"). Essi devono essere divisi da una virgola (,) senza spazi.
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Ottenere informazioni sugli altri utenti:</B></A></FONT>
<P>
Per vedere informazioni pubbliche su un altro utente, digitate il <B>comando "/whois nomeutente"</B> senza virgolette.
<P>
<I>Per esempio:</I> /whois Jack
<P>
dove ’Jack’ è il nome utente. Questo comando creererà una finestra popup separata che mostrerà le informazioni pubblicamente disponibili per quel utente.
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Salvare i messaggi:</B></A></FONT>
	<P>
	Per esportare i messaggi (messaggi di notifica esclusi) su un file HTML locale, digitate il <B>comando "/save n"</B> senza virgolette.
	<P>
	<I>Per esempio:</I> /save 5
	<P>
	dove ’5’ è il numero di messaggi da salvare. Se n non è specificato, tutti i messaggi disponibili inviati nella stanza corrente saranno presi in considerazione.
	<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Comandi solo per l’amministratore e/o moderatori</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Invia un annuncio:</B></A></FONT>
<P>
L’amministratore può inviare un annuncio a tutti gli altri utenti in qualunque stanza essi stiano chattando con il <B>comando announce</B>.
<P>
<I>Per esempio:</I> /announce La chat sarà disattivata per manutenzione stasera alle 20.00.</I>
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
C’è un altro utile comando per annuncio da atteggiare nelle chat; l’amministratore o il moderatori nella stanza può anche inviare un annuncio a tutti gli utenti della stanza corrente o tutte le stanze con il <B>comando room</B>.
<P>
<I>Per esempio: /room L’incontro inizia alle 15 di pomeriggio.</I> or <I>/room * L’incontro inizia alle 15 di pomeriggio nella stanza Staff.</I>
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Cacciare un utente:</B></FONT>
<P>
I moderatori possono cacciare un utente, mentre l’amministratore può cacciare un utente o un moderatore con il <B>comando kick</B>. A parte l’amministratore, l’utente da allontanare deve stare nella stanza corrente.
<P>
<I>Per esempio, se Jack è il nome dell’utente da cacciare via:</I> /kick Jack</I> o <I>/kick Jack motivo della scalciata</I>. Il "motivo della scalciata" può essere qualsiasi testo e.g. "per spamming".
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Espellere un utente:</B></A></FONT>
	<P>
	I Moderatori possono espellere un utente e l’amministratore può espellere un utente o un moderatore con il comando <b>ban</b>.<BR>
	L’amministratore può bandire un utente da un altra area nella quale stà chattando. Può anche bandire per sempre un utente e dall’area dove si trova e dalla chat intera utilizzando l’asterisco "<B>*</B>" che deve essere inserito prima del nick dell’utente che si vuole espellere.
	<P>
	<I>Per esempio</I>, se Jack è il nome dell’utente da espellere: <I>/ban Jack</I>, <I>/ban * Jack</I>, <I>/ban Jack motivo dell’espulsione</I> o <I>/ban * Jack motivo dell’espulsione</I>. Il "motivo dell’espulsione" può essere qualsiasi testo e.g. "per spamming".
	<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Promuovere/degradare un utente e moderatore:</B></A></FONT>
<P>
Moderatori e amministratori possono promuovere un altro utente a moderatore con il <B>comando promote</B>.
<P>
<I>Per esempio</I>, se Jack è il nome dell’utente da promuovere:<I> /promote Jack</I>
<P>
Solo l’amministratore può accedere al comando opposto (ridurre un moderatore a semplice utente) usando il <B>comando demote</B>.
<P>
<I>Per esempio</I>, se Jack è il nome del moderatore da degradare: <I>/demote Jack</I> o <I>/demote * Jack</I> (lo degraderà dalla stanza corrente o tutte le stanze).
<br /><P ALIGN="right"><A HREF="#top">Torna all’inizio</A></P>
<P>
</BODY>
</HTML>
<?php
?>