<?php
// File : french/localized.tutorial.php - plus version (02.05.2007 - rev.4)
// Original translation by Loic Chapeaux <lolo@phpheaven.net>
// Updates, corrections and additions for the Plus version by Leloup <leloup@le-loup.info> and Christophe Luke <christophe.lucsky@gmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>)

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Color Input Box mod by Ciprian - you MUST delete this line if you uninstall this mod
require("./config/config.lib.php");
require("./lib/index.lib.php");
if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Tutoriel en fran&ccedil;ais pour <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Tutoriel en fran&ccedil;ais pour <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</B></FONT></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Table des mati&egrave;res</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Choisir sa langue</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Entrer dans un salon de discussion</A><br />
<A HREF="#register" CLASS="topLink">S&#39;enregistrer</A><br />
<A HREF="#modProfile" CLASS="topLink">Modifier<?php if (C_SHOW_DEL_PROF) echo("/deleting"); ?> son profil</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Cr&eacute;er un salon de discussion</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">D&eacute;tecter les erreurs de connexion</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Envoyer un message</A><br />
<A HREF="#users_list" CLASS="topLink">Les informations pr&eacute;sent&eacute;es dans la liste des utilisateurs</A><br />
<A HREF="#exit" CLASS="topLink">Quitter un salon de discussion</A><br />
<A HREF="#users_popup" CLASS="topLink">Savoir qui est connect&eacute; sans l&#39;&ecirc;tre soi-m&ecirc;me</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Modifier les param&egrave;tres d&#39;affichage</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Fonctionnalit&eacute;s et commandes :</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">Aide en ligne</A><br />
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
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Emoticons graphiques</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#text" CLASS="topLink">Mise en forme du texte</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Sugg&eacute;rer &agrave; utilisateur de venir dans le salon que vous occupez</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">Changer de salon de discussion</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Messages priv&eacute;s</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS="topLink">Actions</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Ignorer les messages d&#39;autres utilisateurs</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">Afficher les informations relatives &agrave; un autre utilisateur</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#save" CLASS="topLink">Sauvegarder les messages</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Commandes r&eacute;serv&eacute;es aux mod&eacute;rateurs et/ou &agrave; l&#39;administrateur :</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Poster une annonce g&eacute;n&eacute;rale</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#kick" CLASS="topLink">Ejecter un utilisateur</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#banish" CLASS="topLink">Bannir un utilisateur</A><br />
	<?php
};
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#promote" CLASS="topLink">Promouvoir ou Degrader un utilisateur &agrave; la fonction moderateur:</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Choisir sa langue :</B></A></FONT>
	<P>
	Vous pouvez choisir la langue &agrave; utiliser parmi celles dans lesquelles <?php echo(APP_NAME); ?> a &eacute;t&eacute; traduit en cliquant sur le drapeau correspondant de la page d&#39;accueil. Dans l&#39;exemple ci-dessous, un utilisateur choisit le fran&ccedil;ais :
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Drapeau de s&eacute;lection de langue">
	<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Entrer dans un salon de discussion :</B></A></FONT>
<P>
Si vous vous &ecirc;tes d&eacute;j&agrave; enregistr&eacute;, il vous suffit d&#39;inscrire votre nom d&#39;utilisateur et votre mot de passe dans les champs idoines. S&eacute;lectionnez ensuite un salon de discussion et cliquez sur le bouton '<?php echo(L_SET_14); ?>'.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Sinon vous devez commencer par vous <A HREF="#register">enregistrer</A>.
	<?php
}
else
{
	?>
<P>
	Sinon vous pouvez commencer par vous <A HREF="#register">enregistrer</A> ou simplement choisir un pseudo et un salon de discussion. Dans ce dernier cas votre pseudo ne sera pas r&eacute;serv&eacute; (d&#39;autres utilisateurs pourront s&#39;en servir une fois que vous vous serez d&eacute;connect&eacute;s).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>S&#39;enregistrer :</B></A></FONT>
<P>
Si vous n&#39;&ecirc;tes pas encore enregistr&eacute;<?php if (!C_REQUIRE_REGISTER) echo(" et que vouliez le faire"); ?>, cliquez sur le lien correspondant &agrave; cela sur la page d&#39;accueil. Une petite fen&ecirc;tre appara&icirc;tra.
<P>
<UL>
	<LI>Choisissez d&#39;abord votre pseudo<?php if (!C_EMAIL_PASWD) echo(" et votre mot de passe"); ?>. Votre pseudo est le nom d&#39;utilisateur qui vous identifiera au sein des salons de discussions auxquels vous participerez. Il ne peut contenir ni caract&egrave;re espace, ni virgule, ni anti-slash (\).
<?php if (C_NO_SWEAR) echo(" Il ne pourra pas non plus contenir de \"gros mots\"."); ?>
	<LI>Entrez ensuite vos nom, pr&eacute;nom et adresse e-mail. Sans ces informations l&#39;enregistrement de votre profil vous sera refus&eacute;. L&#39;information concernant votre sexe est facultative.
	<LI>Si vous disposez d&#39;un site web personnel, vous pouvez en indiquer l&#39;adresse.
	<LI>L&#39;information concernant les langues que vous parlez pourra &ecirc;tre utile aux autres utilisateurs : il seront ainsi &agrave; m&ecirc;me de savoir dans quelle(s) langue(s) vous &ecirc;tes en mesure de les comprendre.
	<LI>Enfin, en cochant la case correspondante vous pouvez choisir de rendre votre adresse e-mail visible pour les utilisateurs qui consulteront votre profil. Si vous pr&eacute;f&eacute;rez que cette information reste cach&eacute;e, laissez la case vierge.
	<LI>Il ne vous reste plus alors qu&#39;&agrave; cliquer sur le bouton "S&#39;enregistrer" et votre profil sera cr&eacute;&eacute;. Pour sortir du processus d&#39;enregistrement, vous pouvez cliquer sur le bouton "Fermer" &agrave; tout moment.
</UL>
<P>
<A NAME="modProfile"></A>Bien &eacute;videmment, un utilisateur enregistr&eacute; peut modifier<?php if (C_SHOW_DEL_PROF) echo("/delete"); ?> son profil en cliquant sur <?php echo((!C_SHOW_DEL_PROF ? "le lien correspondant" : "les liens correspondants")); ?> de la page d&#39;accueil.<br />
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Cr&eacute;er un salon de discussion :</B></A></FONT>
	<P>
	Un utilisateur enregistr&eacute; peut cr&eacute;er son propre salon de discussion. S&#39;il le d&eacute;clare de type priv&eacute;, seul un utilisateur en connaissant le nom (il en aura &eacute;t&eacute; inform&eacute; par ailleurs) pourra y acc&eacute;der car ce nom n&#39;appara&icirc;tra nulle part, sauf pour ceux des utilisateurs qui discuteront dans ce m&ecirc;me salon.<br />
	<P>
	Le nom d&#39;un salon ne peut contenir ni virgule, ni anti-slash (\).<?php if (C_NO_SWEAR) echo(" Il ne peut pas plus comprendre de \"gros mots\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>D&eacute;tecter les erreurs de connexion :</B></A></FONT>
	<P>
	En haut &agrave; droite de votre &eacute;cran est affich&eacute; un sigle r&eacute;sumant l&#39;&eacute;tat des connexions. Il peut prendre trois formes :
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Pas de connexion"> lorsqu&#39;aucune connexion n&#39;est requise ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connexion en cours"> lorsqu&#39;une tentative de connexion est en cours ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Echec"> lorsqu&#39;une tentative de connexion a &eacute;chou&eacute;.
	</UL>
	<P>
	Dans le dernier de ces trois cas de figure, cliquer sur le "bouton" rouge r&eacute;-engagera une tentative de connexion.
	<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Envoyer un message :</B></A></FONT>
<P>
Pour envoyer un message, tapez votre texte dans la boite situ&eacute; en bas et &agrave; gauche de votre &eacute;cran, puis pressez le bouton "OK" ou tapez sur la touche "Entr&eacute;e" de votre clavier. Les messages qui ont &eacute;t&eacute;s envoy&eacute;s sont affich&eacute;s dans le fen&ecirc;tre principale.<br />
<?php if (C_NO_SWEAR) echo("Notez que les \"gros mots\" contenus dans vos messages seront remplac&eacute;s par une suite de caract&egrave;res d&eacute;finie par l&#39;administrateur."); ?>
<P>
Vous pouvez choisir la couleur dans laquelle seront affich&eacute;s vos messages &agrave; l&#39;aide de la liste disponible &agrave; droite de la "boite &agrave; messages".
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Les informations pr&eacute;sent&eacute;es dans la liste des utilisateurs :</B></A></FONT>
<P>
<OL>
	Deux r&egrave;gles de base ont &eacute;t&eacute; d&eacute;finies pour la liste des utilisateurs :<br />
	<LI>une petite ic&ocirc;ne est affich&eacute;e devant le pseudo d&#39;un utilisateur enregistr&eacute; et d&eacute;finit son genre (cliquer sur cette ic&ocirc;ne activera la <A HREF="#whois">fen&ecirc;tre affichant le profil</A> de cet utilisateur), alors que c&#39;est une espace vide qui pr&eacute;c&egrave;de le pseudo des utilisateurs non-enregistr&eacute;s;<br />
	<LI>le pseudo de l&#39;administrateur et ceux des mod&eacute;rateurs sont affich&eacute;s en italique.
</OL>
<P><I>Par exemple</I>, de la capture d&#39;&eacute;cran ci-dessous on peut conclure que :
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas est l&#39;administrateur ou bien l&#39;un des mod&eacute;rateurs du salon "phpMyChat";<br /><br />
		<LI>alien (de genre inconnu), Jezek2 et Caridad sont des utilisateurs enregistr&eacute;s sans pouvoirs particuliers dans le salon "phpMyChat";<br /><br />
		<LI>lolo est un simple utilisateur non-enregistr&eacute;.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Quitter un salon de discussion :</B></A></FONT>
<P>
Pour sortir d&#39;un salon de discussion, cliquez simplement sur le lien affich&eacute; &agrave; cet effet en haut et &agrave; droite de votre &eacute;cran. Vous pouvez encore utiliser l&#39;une des trois commandes suivantes en la tapant dans la "boite &agrave; messages" :<br />
/exit<br />
/bye<br />
/quit<br />
<P>
Ces commandes peuvent &ecirc;tre assorties d&#39;un message qui sera affich&eacute; avant votre d&eacute;part.
<P>
<I>Par exemple :</I> /quit A bient&ocirc;t !
<P>
affichera le message "A bient&ocirc;t !" puis vous renverra sur la page d&#39;accueil.

<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Savoir qui est connect&eacute; sans l&#39;&ecirc;tre soi-m&ecirc;me :</B></A></FONT>
<P>
En cliquant sur le lien affichant le nombre d&#39;utilisateurs de la page d&#39;accueil ou bien, une fois dans une salon, sur l&#39;ic&ocirc;ne <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Users popup"> en haut et &agrave; droite de votre &eacute;cran ,vous ouvrirez une petite fen&ecirc;tre ind&eacute;pendante pr&eacute;sentant la liste des utilisateurs connect&eacute;s et des salons dans lesquels ils sont pr&eacute;sents en temps presque r&eacute;&eacute;l.<br />
Vous noterez que le titre de cette fen&ecirc;tre est compos&eacute; des pseudos des utilisateurs connect&eacute;s s&#39;ils sont moins de trois, de leur nombre ainsi que de celui des salons ouverts sinon.
<P>
Dans cette m&ecirc;me fen&ecirc;tre, cliquer sur l&#39;ic&ocirc;ne <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Signal sonore"> vous permettra d&#39;activer ou de d&eacute;sactiver le syst&egrave;me de notification sonore &agrave; l&#39;arriv&eacute;e d&#39;un nouvel utilisateur.
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Modifier les param&egrave;tres d&#39;affichage :</B></A></FONT>
<P>
Il est de multiples fa&ccedil;ons de modifier les param&egrave;tres d&#39;affichage. Il vous suffit d&#39;entrer la commande appropri&eacute;e dans la "boite &agrave; message".
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>La <B>commande Clear</B> permet de r&eacute;initialiser le cadre des messages en ne conservant que les 5 derniers d&#39;entre eux.<br />Tapez "/clear" sans les guillemets.
		<P>
		<?php
	}
	else
	{
		?>
		<LI>La <B>commande Order</B> inverse l&#39;ordre d&#39;affichage des messages (des plus r&eacute;cents en haut aux plus r&eacute;cents en bas et vice versa).<br />Tapez "/order" sans les guillemets.
		<P>
		<?php
	};
	?>
	<LI>La <B>commande Notify</B> vous permet de choisir s&#39;il faut afficher ou pas les notifications concernant l&#39;entr&eacute;e et la sortie des utilisateurs dans le salon courant. Par d&eacute;faut cette option est <?php echo(C_NOTIFY ? "activ&eacute;e" : "d&eacute;sactiv&eacute;e"); ?> et les notifications <?php echo(C_NOTIFY ? "sont" : "ne sont pas"); ?> affich&eacute;es.<br />Tapez "/notify" sans les guillemets.
	<P>
	<LI>La <B>commande Timestamp</B> active ou supprime l&#39;affichage de l&#39;heure &agrave; laquelle les messages ont &eacute;t&eacute; post&eacute;s ainsi que l&#39;heure serveur dans la barre des t&acirc;ches. Par d&eacute;faut cette option est <?php echo(C_SHOW_TIMESTAMP ? "activ&eacute;e" : "d&eacute;sactiv&eacute;e"); ?>.<br />Tapez "/timestamp" sans les guillemets.
	<P>
	<LI>La <B>commande Refresh</B> permet de modifier le d&eacute;lai de rafra&icirc;chissement du cadre contenant les messages. La valeur par d&eacute;faut est de <?php echo(C_MSG_REFRESH); ?> secondes. Pour la modifier, tapez "/refresh n" sans les guillemets o&ugrave; n est le d&eacute;lai qui vous convient exprim&eacute; en secondes.
	<P>
	<I>Par exemple :</I> /refresh 5
	<P>
	provoquera un rafra&icirc;chissement du cadre contenant les messages toutes les 5 secondes. *Attention, si n est inf&eacute;rieur &agrave; 3 ou non sp&eacute;cifi&eacute;, plus aucun rafra&icirc;chissement n&#39;est assur&eacute; (ce qui permet de consulter un longue liste de messages sans &ecirc;tre perturb&eacute; par des rechargements, par exemple) !*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI>La <B>commande Show</B> d&eacute;finit le nombre de messages &agrave; afficher dans la fen&ecirc;tre principale. Pour modifier cette valeur, tapez "/show n" sans les guillemets o&ugrave; n correspond au nombre des messages d&eacute;sir&eacute;s.
		<P>
		<I>Par exemple :</I> /show 50
		<P>
		affichera les 50 messages les plus r&eacute;cents. S&#39;ils ne tiennent pas tous dans le cadre d&eacute;di&eacute; &agrave; l&#39;affichage des messages, une barre de d&eacute;placement appara&icirc;tra &agrave; la droite de celui-ci.</UL>
		<?php
	}
	else
	{
		?>
		<LI>Les <B>commandes Show et Last</B> provoquent une r&eacute;initialisation de l&#39;&eacute;cran et l&#39;affichage d&#39;un nombre d&eacute;fini de messages parmi les derniers re&ccedil;us. Tapez "/show n" ou "/last n" sans les guillemets o&ugrave; n correspond au nombre des messages &agrave; afficher.
		<P>
		<I>Par exemple :</I> /show 50 or /last 50
		<P>
		effacera l&#39;&eacute;cran avant d&#39;afficher les 50 derniers messages publi&eacute;s dans le salon courant. S&#39;ils ne tiennent pas tous dans le cadre d&eacute;di&eacute; &agrave; l&#39;affichage des messages, une barre de d&eacute;placement appara&icirc;tra &agrave; la droite de celui-ci.</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Fonctionnalit&eacute;s et commandes</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Aide en ligne :</B></A></FONT>
<P>
Une fois entr&eacute; dans un salon de discussion, vous pourrez obtenir de l&#39;aide en cliquant sur l&#39;image <IMG SRC="images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="Aide"> qui est plac&eacute;e &agrave; gauche de la "boite &agrave; messages". Vous pourrez encore utiliser les <B>commandes "/help" ou "/?"</B> &agrave; cet effet.
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
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
  <P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
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
	<FONT SIZE="+1"><A NAME="smilies"><B>Emoticons :</B></A></FONT>
	<P>Vos messages peuvent &ecirc;tre agr&eacute;ment&eacute;s d&#39;&eacute;moticons graphiques. Vous trouverez ci-apr&egrave;s les codes qu&#39;il faut utiliser dans vos messages pour obtenir chacun de ces &eacute;moticons lors de l&#39;affichage dans le cadre d&eacute;di&eacute;.
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
	<I>Par exemple</I>, en tapant le texte "Salut Coco :)" sans les guillemets, le message "Salut Coco <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> (sans guillemets) sera affich&eacute; dans le cadre principal.
	<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Mises en forme du texte des messages :</B></A></FONT>
	<P>
	Vos messages peuvent contenir du texte en gras, en italique ou soulign&eacute;. Pour ce faire il vous suffit d&#39;encadrer la section concern&eacute;e par les balises HTML &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; ou &lt;U&gt; &lt;/U&gt;.
	<P>
	<I>Par exemple</I>, en tapant &lt;B&gt;ce texte&lt;/B&gt; vous obtiendrez <B>ce texte</B>.
	<P>
	Pour obtenir des hyperliens (URL ou e-mail) tapez simplement l&#39;adresse en question dans votre message sans aucune balise. Elle sera automatiquement trait&eacute;e.
	<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
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
<b><?php echo(L_COL_HELP_SUB3); ?></b><br /><?php echo(L_COLOR_HEAD_SETTINGS); ?><br /><?php if (COLOR_FILTERS) echo(L_COLOR_HEAD_SETTINGSa."<br />"); ?><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("Administrateur"); elseif ($CookieStatus == "m") echo("Moderateur"); elseif ($CookieStatus == "u") echo("Invit&eacute; (Normal)"); else echo("Enregister&eacute; (Normal)");?></b><br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Sugg&eacute;rer &agrave; utilisateur de venir dans le salon que vous occupez :</B></A></FONT>
<P>
Vous pouvez avoir recours &agrave; la <B>commande invite</B> pour inciter un utilisateur &agrave; vous rejoindre dans votre salon de discussion courant.
<P>
<I>Par exemple :</I> /invite Coco
<P>
enverra un message priv&eacute; &agrave; Coco lui sugg&eacute;rant de venir discuter dans le salon que vous occupez. Ce message contiendra le nom de ce salon sous forme d&#39;hyperlien.
<P>
Notez que vous pouvez mettre plusieurs noms &agrave; la suite pour cette commande ("/invite Coco,H&eacute;l&egrave;ne,Alf"). Ils doivent alors &ecirc;tre s&eacute;par&eacute;s par une virgule sans espace.
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Changer de salon de discussion :</B></A></FONT>
<P>
La liste affich&eacute;e &agrave; droite de l&#39;&eacute;cran correspond &agrave; la liste des salons ouverts et des utilisateurs qui y sont pr&eacute;sents. Pour quitter votre salon de discussion et vous rendre imm&eacute;diatement dans l&#39;un de ceux qui sont affich&eacute;s, cliquez simplement une fois sur le nom de ce dernier. Les salons vides d&#39;occupants n&#39;apparaissant pas dans la liste, il vous faudra faire appel &agrave; la <B>commande "/join #nom_de_salon"</B> (sans guillemets) pour vous y rendre sans passer par la page d&#39;accueil.
<P>
<I>Par exemple :</I> /join #Salon_1
<P>
vous transportera dans le Salon_1.
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Si vous &ecirc;tes un utilisateur enregistr&eacute;, vous" : "<P>Vous");
	?>
	 pouvez aussi cr&eacute;er un nouveau salon &agrave; l&#39;aide de cette m&ecirc;me commande. Mais il vous faudra alors pr&eacute;ciser la nature de ce salon : 0 pour un salon priv&eacute;, 1 pour un salon public (valeur par d&eacute;faut).
	<P>
	<I>Par exemple :</I> /join 0 #MonSalon
	<P>
	cr&eacute;era le salon priv&eacute; MonSalon (&agrave; condition qu&#39;aucun salon public de m&ecirc;me nom n&#39;existe d&eacute;j&agrave;) et vous y transf&egrave;rera.
	<P>
	Le nom d&#39;un salon ne peut contenir ni virgule, ni anti-slash (\).<?php if (C_NO_SWEAR) echo(" Il ne peut pas plus comprendre de \"gros mots\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Modifier son profil une fois entr&eacute; dans un salon :</B></FONT>
<P>
La <B>commande Profile</B> affichera une petite fen&ecirc;tre dans laquelle vous pourrez modifier votre profil de fa&ccedil;on limit&eacute;e : votre pseudo et votre mot de passe ne pourront en aucun cas &ecirc;tre concern&eacute;s (utilisez le lien sur la page d&#39;accueil pour ce faire).<br />Tapez "/profile" sans guillemets.
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Rappeler le dernier message envoy&eacute; ou la derni&egrave;re commande ex&eacute;cut&eacute;e :</B></FONT>
<P>
La <B>commande !</B> ins&egrave;re dans la "boite &agrave; message" le dernier texte qui y a &eacute;t&eacute; entr&eacute;, qu&#39;il s&#39;agisse d&#39;une commande ou d&#39;un message.<br />Tapez "/!" sans guillemets.
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>R&eacute;pondre &agrave; un utilisateur en particulier :</B></FONT>
<P>
Cliquer une fois sur le nom d&#39;un utilisateur apparaissant dans la liste situ&eacute;e &agrave; droite de votre &eacute;cran ins&egrave;rera son nom dans la "boite &agrave; message". Ceci permet d&#39;indiquer que le message que vous envoyez s&#39;adresse particuli&egrave;rement &agrave; lui, par example.
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Messages priv&eacute;s :</B></A></FONT>
<P>
Pour faire parvenir un message priv&eacute; &agrave; un utilisateur pr&eacute;sent dans le m&ecirc;me salon que vous, tapez la <B>commande "/msg pseudo texte_du_message" ou "/to pseudo texte_du_message"</B> sans les guillemets.
<P>
<I>Par exemple, si Coco est le nom de l&#39;utilisateur auquel le message priv&eacute; est destin&eacute; :</I> /msg Coco Bonjour, comment vas-tu ?
<P>
Le message "Bonjour, comment vas-tu ?" (sans les guillemets) ne sera visible que de Coco et de vous.
<P>
Notez qu&#39;en cliquant sur le nom d&#39;un exp&eacute;diteur dans le cadre principal, cette commande sera automatiquement ins&eacute;r&eacute;e dans le champ d&#39;entr&eacute;e des messages.
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Actions :</B></A></FONT>
<P>
Pour envoyer un message d&eacute;crivant ce que vous &ecirc;tes en train de faire vous pouvez avoir recours &agrave; la <B>command "/me action"</B> sans guillemets.
<P>
<I>Par exemple :</I> si Nicolas tape "/me boit un caf&eacute;" le message "<B>* Nicolas</B> boit un caf&eacute;" sera affich&eacute; dans le cadre des messages.
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorer les messages d&#39;autres utilisateurs :</B></A></FONT>
<P>
Pour ne pas voir s&#39;afficher les messages provenant d&#39;un utilisateur particulier, utilisez la <B>commande "/ignore pseudo"</B> sans guillemets.
<P>
<I>Par exemple :</I> /ignore Coco
<P>
D&egrave;s lors, aucun des messages que Coco enverra ne seront affich&eacute; dans le cadre principal du chat.
<P>
Pour visualiser l&#39;ensemble des utilisateurs dont les messages sont ignor&eacute;s, tapez simplement la <B>commande "/ignore"</B> sans guillemets ni param&egrave;tre additionnel : une petite fen&ecirc;tre ind&eacute;pendante listant l&#39;ensemble de ces utilisateurs "ignor&eacute;s" s&#39;affichera.
<P>
Pour afficher &agrave; nouveau les messages d&#39;un utilisateur qui &eacute;tait pr&eacute;c&eacute;demment ignor&eacute;, tapez la <B>commande "/ignore - pseudo"</B> sans guillemets o&ugrave; "-" est un trait d&#39;union ou le sigle math&eacute;matique "moins".
<P>
<I>Par exemple :</I> /ignore - Coco
<P>
Tous les messages en provenance de Coco seront affich&eacute;s &agrave; nouveau, y compris ceux qui avaient &eacute;t&eacute; envoy&eacute;s avant que vous ayez tap&eacute; la commande.
Si vous ne sp&eacute;cifiez pas de pseudo apr&egrave;s le trait d&#39;union, la liste des utilisateurs ignor&eacute;s sera vid&eacute;e.
<P>
Notez que vous pouvez mettre plusieurs noms &agrave; la suite pour cette commande ("/ignore Coco,H&eacute;l&egrave;ne,Alf" ou "/ignore - Coco,Alf" par exemple). Ils doivent alors &ecirc;tre s&eacute;par&eacute;s par une virgule sans espace.
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Afficher les informations relatives &agrave; un autre utilisateur :</B></A></FONT>
<P>
Pour visualiser le profil d&#39;un autre utilisateur, tapez la <B>commande "/whois pseudo"</B> sans guillemets.
<P>
<I>Par exemple :</I> /whois Coco
<P>
o&ugrave; &#39;Coco&#39; est le pseudo de l&#39;utilisateur. Cette commande provoquera l&#39;affichage d&#39;une petite fen&ecirc;tre contenant les informations disponibles pour l&#39;utilisateur Coco s&#39;il s&#39;agit d&#39;un utilisateur enregistr&eacute;.
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Sauvegarder les messages :</B></A></FONT>
	<P>
	Pour r&eacute;cup&eacute;rer sur votre disque un fichier HTML contenant les messages (hors notifications) publi&eacute;s dans le salon courant, ayez recours &agrave; la <B>commande "/save n"</B> sans guillemets.
	<P>
	<I>Par exemple :</I> /save 5
	<P>
	o&ugrave; &#39;5&#39; est le nombre de messages &agrave; sauvegarder. Si n n&#39;est pas sp&eacute;cifi&eacute;, tous les messages disponibles seront pris en compte.
	<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Commandes r&eacute;serv&eacute;es aux mod&eacute;rateurs et/ou &agrave; l&#39;administrateur</U></B></A></FONT>

<P>
<FONT SIZE="+1"><A NAME="announce"><B>Poster une annonce g&eacute;n&eacute;rale :</B></A></FONT>
<P>
L&#39;administrateur peut envoyer un message qui sera visible par tous les utilisateurs connect&eacute;s quelque soit le salon dans lequel ils discutent gr&acirc;ce &agrave; la <B>commande announce</B>.
<P>
<I>Par exemple : /announce Mise &agrave; jour du chat &agrave; 20h00 ce soir, risque de perturbations.</I>
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
Il y a une autre commande d&#39;annonce utilisable pour le jeux de role en particulier; Les administrateurs ou moderateurs d&#39;un salon peuvent aussi envoyer une annonce &agrave; tout les Utilistateurs du salon couran avec la commande <B>room command</B>.
<P>
<I>Par exemple: /room La partie commance &agrave; 15h00.</I> ou <I>/room * La partie commance &agrave; 15h00 dans le sallon principale.</I>
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Kicker (Ejecter) un utilisateur :</B></FONT>
<P>
Un mod&eacute;rateur peut &eacute;jecter un utilisateur et l&#39;administrateur peut faire de m&ecirc;me pour un mod&eacute;rateur ou un utilisateur &agrave; l&#39;aide de la <B>commande kick</B>. Seul l&#39;administrateur peut ejecter un utilisateur qui ne discute pas dans le m&ecirc;me salon que lui.
<P>
<I>Par exemple</I>, si Coco est le pseudo de l&#39;utilisateur &agrave; &eacute;jecter :</I> /kick Coco</I>
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Bannir un utilisateur :</B></A></FONT>
	<P>
	Un mod&eacute;rateur peut bannir un utilisateur et l&#39;administrateur peut faire de m&ecirc;me pour un mod&eacute;rateur ou un utilisateur &agrave; l&#39;aide de la <B>commande ban</B>.<br />
	Seul l&#39;administrateur peut bannir un utilisateur qui ne discute pas dans le m&ecirc;me salon que lui; il peut aussi bannir un utilisateur "&agrave; jamais" du chat (tous salons confondus) un ins&eacute;rant le param&egrave;tre &#39;<B>&nbsp;*&nbsp;</B>&#39; avant le pseudo de ce dernier.
	<P>
	<I>Par exemple</I>, si Coco est le pseudo de l&#39;utilisateur &agrave; bannir : <I>/ban Coco</I> ou <I>/ban * Coco</I>
	<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Promote/Demote a user to/from moderator :</B></A></FONT>
<P>
Il est possible pour l&#39;administrateur ou un mod&eacute;rateur de transformer un simple utilisateur en mod&eacute;rateur pour le salon courant &agrave; l&#39;aide de la <B>commande promote</B>.
<P>
<I>Par exemple</I>, si Coco est le pseudo de l&#39;utilisateur &agrave; "promouvoir" :<I> /promote Coco</I>
<P>
L&#39;op&eacute;ration inverse (r&eacute;duire un mod&eacute;rateur au statut d&#39;utilisateur) using the <B>commande demote</B>.
<P>
<I>Par exemple</I>, si Jack est le pseudo de mod&eacute;rateur &agrave; demote: <I>/demote Jack</I> or <I>/demote * Jack</I> (will demote him from current or all the rooms).
<br /><P ALIGN="right"><A HREF="#top">D&eacute;but de la page</A></P>
<P>


</BODY>
</HTML>