<?php
// File : french/localized.tutorial.php - plus version
// Translation by Lo�c Chapeaux <lolo@phpheaven.net>
// Updates, corrections and additions for the Plus version by Leloup <leloup@le-loup.info>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>)

// Get the names and values for vars sent by the script that called this one
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

// Color Input Box mod by Ciprian - you MUST delete this line if you uninstall this mod
require("./config/config.lib.php");
require("./lib/index.lib.php");
if (isset($HTTP_COOKIE_VARS["CookieStatus"])) $CookieStatus = $HTTP_COOKIE_VARS["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Tutoriel en fran�ais pour <?php echo(APP_NAME." - ".APP_VERSION); ?></TITLE>
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
<!-- Remove this � in translation files -->
<?php
if(isset($NoTranslation)) echo($NoTranslation."\n");
?>
<!-- End of the � to be removed in translation files -->

<P><A NAME="top"></P>
<TABLE BORDER="5" CELLPADDING="5">
<TR>
	<TD><FONT SIZE="+2">Table des mati�res</FONT></TD>
</TR>
</TABLE><br />

<P CLASS="redText">
Attention : les utilisateurs de Netscape doivent d�finir leur langue comme encodage par d�faut sinon chacun des caract�res des messages risque d'appara�tre sous forme de '?'.<br />
Pour faire cela : Afficher/Encodage/votre langue, puis Afficher/Encodage/Definir le jeu de caract�res par d�faut.
</P>

<?php
if (C_MULTI_LANG == "1")
{
	?>
	<A HREF="#language" CLASS="topLink">Choisir sa langue</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Entrer dans un salon de discussion</A><br />
<A HREF="#register" CLASS="topLink">S'enregistrer</A><br />
<A HREF="#modProfile" CLASS="topLink">Modifier<?php if (C_SHOW_DEL_PROF == "1") echo("/deleting"); ?> son profil</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Cr�er un salon de discussion</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">D�tecter les erreurs de connexion</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Envoyer un message</A><br />
<A HREF="#users_list" CLASS="topLink">Les informations pr�sent�es dans la liste des utilisateurs</A><br />
<A HREF="#exit" CLASS="topLink">Quitter un salon de discussion</A><br />
<A HREF="#users_popup" CLASS="topLink">Savoir qui est connect� sans l'�tre soi-m�me</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Modifier les param�tres d'affichage</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Fonctionnalit�s et commandes :</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#help" CLASS="topLink">Aide en ligne</A><br />
<?php
if (C_USE_SMILIES == "1")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#smilies" CLASS="topLink">Emoticons graphiques</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#text" CLASS="topLink">Mise en forme du texte/A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp&nbsp&nbsp&nbsp<A HREF="#invite" CLASS="topLink">Sugg�rer � utilisateur de venir dans le salon que vous occupez</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#changeroom" CLASS="topLink">Changer de salon de discussion</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#private" CLASS="topLink">Messages priv�s</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#actions" CLASS="topLink">Actions</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#ignore" CLASS="topLink">Ignorer les messages d'autres utilisateurs</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#whois" CLASS="topLink">Afficher les informations relatives � un autre utilisateur</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#save" CLASS="topLink">Sauvegarder les messages</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Commandes r�serv�es aux mod�rateurs et/ou � l'administrateur :</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#announce" CLASS="topLink">Poster une annonce g�n�rale</A><br />
&nbsp&nbsp&nbsp&nbsp<A HREF="#kick" CLASS="topLink">Ejecter un utilisateur</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp&nbsp&nbsp&nbsp<A HREF="#banish" CLASS="topLink">Bannir un utilisateur</A><br />
	<?php
};
?>
&nbsp&nbsp&nbsp&nbsp<A HREF="#promote" CLASS="topLink">Promouvoir ou Degrader un utilisateur � la fonction moderateur:</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG == "1")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Choisir sa langue :</B></A></FONT>
	<P>
	Vous pouvez choisir la langue � utiliser parmi celles dans lesquelles <?php echo(APP_NAME); ?> a �t� traduit en cliquant sur le drapeau correspondant de la page d'accueil. Dans l'exemple ci-dessous, un utilisateur choisit le fran�ais :
	<P ALIGN="center">
	<IMG SRC="file:///K|/CHAT/phpmychat1_9/phpMyChat-Plus_1.90_fixed/plus/localization/english/images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Drapeau de s�lection de langue">
	<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>>Entrer dans un salon de discussion :</B></A></FONT>
<P>
Si vous vous �tes d�j� enregistr�, il vous suffit d'inscrire votre nom d'utilisateur et votre mot de passe dans les champs idoines. S�lectionnez ensuite un salon de discussion et cliquez sur le bouton "Discuter....<br />
<?php
if (C_REQUIRE_REGISTER == "1")
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
	Sinon vous pouvez commencer par vous <A HREF="#register">enregistrer</A> ou simplement choisir un pseudo et un salon de discussion. Dans ce dernier cas votre pseudo ne sera pas r�serv� (d'autres utilisateurs pourront s'en servir une fois que vous vous serez d�connect�s).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>S'enregistrer :</B></A></FONT>
<P>
Si vous n'�tes pas encore enregistr� <?php if (C_REQUIRE_REGISTER == "0") echo("et que vouliez le faire"); ?>, cliquez sur le lien correspondant � cela sur la page d'accueil. Une petite fen�tre appara�tra.
<P>
<UL>
	<LI>Choisissez d'abord votre pseudo<?php if (!C_EMAIL_PASWD) echo(" et votre mot de passe"); ?>. Votre pseudo est le nom d'utilisateur qui vous identifiera au sein des salons de discussions auxquels vous participerez. Il ne peut contenir ni caract�re espace, ni virgule, ni anti-slash (\).
<?php if (C_NO_SWEAR == "1") echo(" Il ne pourra pas non plus contenir de \"gros mots\"."); ?>
	<LI>Entrez ensuite vos nom, pr�nom et adresse e-mail. Sans ces informations l'enregistrement de votre profil vous sera refus�. L'information concernant votre sexe est facultative.
	<LI>Si vous disposez d'un site web personnel, vous pouvez en indiquer l'adresse.
	<LI>L'information concernant les langues que vous parlez pourra �tre utile aux autres utilisateurs : il seront ainsi � m�me de savoir dans quelle(s) langue(s) vous �tes en mesure de les comprendre.
	<LI>Enfin, en cochant la case correspondante vous pouvez choisir de rendre votre adresse e-mail visible pour les utilisateurs qui consulteront votre profil. Si vous pr�f�rez que cette information reste cach�e, laissez la case vierge.
	<LI>Il ne vous reste plus alors qu'� cliquer sur le bouton "S'enregistrer" et votre profil sera cr��. Pour sortir du processus d'enregistrement, vous pouvez cliquer sur le bouton "Fermer" � tout moment.
</UL>
<P>
<A NAME="modProfile"></A>Bien �videmment, un utilisateur enregistr� peut modifier<?php if (C_SHOW_DEL_PROF == "1") echo("/delete"); ?> son profil en cliquant sur <?php echo((C_SHOW_DEL_PROF == "0" ? "le lien correspondant" : "les liens correspondants")); ?> de la page d'accueil.<br />
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Cr�er un salon de discussion :</B></A></FONT>
	<P>
	Un utilisateur enregistr� peut cr�er son propre salon de discussion. S'il le d�clare de type priv�, seul un utilisateur en connaissant le nom (il en aura �t� inform� par ailleurs) pourra y acc�der car ce nom n'appara�tra nulle part, sauf pour ceux des utilisateurs qui discuteront dans ce m�me salon.<br />
	<P>
	Le nom d'un salon ne peut contenir ni virgule, ni anti-slash (\).<?php if (C_NO_SWEAR == "1") echo(" Il ne peut pas plus comprendre de \"gros mots\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>D�tecter les erreurs de connexion :</B></A></FONT>
	<P>
	En haut � droite de votre �cran est affich� un sigle r�sumant l'�tat des connexions. Il peut prendre trois formes :
	<P>
	<UL>
		<LI><IMG SRC="file:///K|/CHAT/phpmychat1_9/phpMyChat-Plus_1.90_fixed/plus/localization/english/images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Pas de connexion"> lorsqu'aucune connexion n'est requise ;
		<LI><IMG SRC="file:///K|/CHAT/phpmychat1_9/phpMyChat-Plus_1.90_fixed/plus/localization/english/images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Connexion en cours"> lorsqu'une tentative de connexion est en cours ;
		<LI><IMG SRC="file:///K|/CHAT/phpmychat1_9/phpMyChat-Plus_1.90_fixed/plus/localization/english/images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Echec"> lorsqu'une tentative de connexion a �chou�.
	</UL>
	<P>
	Dans le dernier de ces trois cas de figure, cliquer sur le "bouton" rouge r�-engagera une tentative de connexion.
	<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Envoyer un message:</B></A></FONT>
<P>
Pour envoyer un message, tapez votre texte dans la boite situ� en bas et � gauche de votre �cran, puis pressez le bouton "OK" ou tapez sur la touche "Entr�e" de votre clavier. Les messages qui ont �t�s envoy�s sont affich�s dans le fen�tre principale.<br />
<?php if (C_NO_SWEAR == "1") echo("Notez que les \"gros mots\" contenus dans vos messages seront remplac�s par une suite de caract�res d�finie par l'administrateur."); ?>
<P>
Vous pouvez choisir la couleur dans laquelle seront affich�s vos messages � l'aide de la liste disponible � droite de la "boite � messages".
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Les informations pr�sent�es dans la liste des utilisateurs :</B></A></FONT>
<P>
<OL>
	Deux r�gles de base ont �t� d�finies pour la liste des utilisateurs:<br />
	<LI>une petite ic�ne est affich�e devant le pseudo d'un utilisateur enregistr� et d�finit son genre (cliquer sur cette ic�ne activera la <A HREF="#whois">fen�tre affichant le profil</A> de cet utilisateur), alors que c'est une espace vide qui pr�c�de le pseudo des utilisateurs non-enregistr�s&nbsp;;<br />
	<LI>le pseudo de l'administrateur et ceux des mod�rateurs sont affich�s en italique.
</OL>
<P><I>Par exemple</I>, de la capture d'�cran ci-dessous on peut conclure que:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="file:///K|/CHAT/phpmychat1_9/phpMyChat-Plus_1.90_fixed/plus/localization/english/images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="users list">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas est l'administrateur ou bien l'un des mod�rateurs du salon "phpMyChat"&nbsp;;<br /><br />
		<LI>alien (de genre inconnu), Jezek2 et Caridad sont des utilisateurs enregistr�s sans pouvoirs particuliers dans le salon "phpMyChat"&nbsp;;<br /><br />
		<LI>lolo est un simple utilisateur non-enregistr�.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Quitter un salon de discussion :</B></A></FONT>
<P>
Pour sortir d'un salon de discussion, cliquez simplement sur le lien affich� � cet effet en haut et � droite de votre �cran. Vous pouvez encore utiliser l'une des trois commandes suivantes en la tapant dans la "boite � messages" :<br />
/exit<BR>
/bye<BR>
/quit
<P>
Ces commandes peuvent �tre assorties d'un message qui sera affich� avant votre d�part.
<P>
<I>Par exemple :</I> /quit A bient�t !
<P>
affichera le message "A bient�t !" puis vous renverra sur la page d'accueil.

<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Savoir qui est connect� sans l'�tre soi-m�me :</B></A></FONT>
<P>
En cliquant sur le lien affichant le nombre d'utilisateurs de la page d'accueil ou bien, une fois dans une salon, sur l'ic�ne <IMG SRC="file:///K|/CHAT/phpmychat1_9/phpMyChat-Plus_1.90_fixed/plus/localization/english/images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Users popup">  en haut et � droite de votre �cran ,vous ouvrirez une petite fen�tre ind�pendante pr�sentant la liste des utilisateurs connect�s et des salons dans lesquels ils sont pr�sents en temps presque r��l.<br />
Vous noterez que le titre de cette fen�tre est compos� des pseudos des utilisateurs connect�s s'ils sont moins de trois, de leur nombre ainsi que de celui des salons ouverts sinon.
<P>
Dans cette m�me fen�tre, cliquer sur l'ic�ne <IMG SRC="file:///K|/CHAT/phpmychat1_9/phpMyChat-Plus_1.90_fixed/plus/localization/english/images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Signal sonore"> vous permettra d'activer ou de d�sactiver le syst�me de notification sonore � l'arriv�e d'un nouvel utilisateur.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Modifier les param�tres d'affichage :</B></A></FONT>
<P>
Il est de multiples fa�ons de modifier les param�tres d'affichage. Il vous suffit d'entrer la commande appropri�e dans la "boite � message".
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>La <B>commande Clear</B> permet de r�initialiser le cadre des messages en ne conservant que les 5 derniers d'entre eux.<BR>Tapez "/clear" sans les guillemets.
		<P>
		<?php
	}
	else
	{
		?>
		<LI>La <B>commande Order</B> inverse l'ordre d'affichage des messages (des plus r�cents en haut aux plus r�cents en bas et vice versa).<BR>Tapez "/order" sans les guillemets.
		<P>
		<?php
	};
	?>
	<LI>La <B>commande Notify</B> vous permet de choisir s'il faut afficher ou pas les notifications concernant l'entr�e et la sortie des utilisateurs dans le salon courant. Par d�faut cette option est <?php echo(C_NOTIFY ? "activ�e" : "d�sactiv�e"); ?> et les notifications <?php echo(C_NOTIFY ? "sont" : "ne sont pas"); ?> affich�es.<BR>Tapez "/notify" sans les guillemets.
	<P>
	<LI>La <B>commande Timestamp</B> active ou supprime l'affichage de l'heure � laquelle les messages ont �t� post�s ainsi que l'heure serveur dans la barre des t�ches. Par d�faut cette option est <?php echo(C_SHOW_TIMESTAMP ? "activ�e" : "d�sactiv�e"); ?>.<BR>Tapez "/timestamp" sans les guillemets.
	<P>
	<LI>La <B>commande Refresh</B> permet de modifier le d�lai de rafra�chissement du cadre contenant les messages. La valeur par d�faut est de <?php echo(C_MSG_REFRESH); ?> secondes. Pour la modifier, tapez "/refresh n" sans les guillemets o� n est le d�lai qui vous convient exprim� en secondes.
	<P>
	<I>Par exemple :</I> /refresh 5
	<P>
	provoquera un rafra�chissement du cadre contenant les messages toutes les 5 secondes. *Attention, si n est inf�rieur � 3 ou non sp�cifi�, plus aucun rafra�chissement n'est assur� (ce qui permet de consulter un longue liste de messages sans �tre perturb� par des rechargements, par exemple) !*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
  <LI>La <B>commande Show</B> d�finit le nombre de messages � afficher dans la fen�tre principale. Pour modifier cette valeur, tapez "/show n" sans les guillemets o� n correspond au nombre des messages d�sir�s.
		<P>
		<I>Par exemple :</I> /show 50
		<P>
		affichera les 50 messages les plus r�cents. S'ils ne tiennent pas tous dans le cadre d�di� � l'affichage des messages, une barre de d�placement appara�tra � la droite de celui-ci.</UL>
		<?php
	}
	else
	{
		?>
		<LI>Les <B>commandes Show et Last</B> provoquent une r�initialisation de l'�cran et l'affichage d'un nombre d�fini de messages parmi les derniers re�us. Tapez "/show n" ou "/last n" sans les guillemets o� n correspond au nombre des messages � afficher.
		<P>
		<I>Par exemple :</I> /show 50 or /last 50
		<P>
		effacera l'�cran avant d'afficher les 50 derniers messages publi�s dans le salon courant. S'ils ne tiennent pas tous dans le cadre d�di� � l'affichage des messages, une barre de d�placement appara�tra � la droite de celui-ci.</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Fonctionnalit�s et commandes</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Aide en ligne :</B></A></FONT>
<P>
Une fois entr� dans un salon de discussion, vous pourrez obtenir de l'aide en cliquant sur l'image <IMG SRC="file:///K|/CHAT/phpmychat1_9/phpMyChat-Plus_1.90_fixed/plus/localization/english/images/helpOff.gif" WIDTH=15 HEIGHT=15 BORDER=0 ALT="?"> qui est plac�e � gauche de la "boite � messages". Vous pourrez encore utiliser les <B>commandes "/help" ou "/?"</B> � cet effet.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<P>
<hr />

<?php
if (C_USE_SMILIES == "1")
{
	include("./lib/smilies.lib.php");
	$Nb = count($SmiliesTbl);
	$ResultTbl = Array();
	DisplaySmilies($ResultTbl,$SmiliesTbl,$Nb,"tutorial");
	unset($SmiliesTbl);
	?>
	<FONT SIZE="+1"><A NAME="smilies"><B>Emoticons :</B></A></FONT>
	<P>Vos messages peuvent �tre agr�ment�s d'�moticons graphiques. Vous trouverez ci-apr�s les codes qu'il faut utiliser dans vos messages pour obtenir chacun de ces �moticons lors de l'affichage dans le cadre d�di�.
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
	<I>Par exemple</I>, en tapant le texte "Salut Coco :)" sans les guillemets, le message "Salut Coco <IMG SRC="file:///K|/CHAT/phpmychat1_9/phpMyChat-Plus_1.90_fixed/plus/localization/english/images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> (sans guillemets) sera affich� dans le cadre principal.
	<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Mises en forme du texte des messages :</B></A></FONT>
	<P>
	Vos messages peuvent contenir du texte en gras, en italique ou soulign�. Pour ce faire il vous suffit d'encadrer la section concern�e par les balises HTML &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; ou &lt;U&gt; &lt;/U&gt;.
	<P>
	<I>Par exemple</I>, en tapant &lt;B&gt;ce texte&lt;/B&gt; vous obtiendrez <B>ce texte</B>.
	<P>
	Pour obtenir des hyperliens (URL ou e-mail) tapez simplement l'adresse en question dans votre message sans aucune balise. Elle sera automatiquement trait�e.
	<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
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
<b><?php echo(L_COL_HELP_SUB3); ?></b><br /><?php echo(L_COLOR_HEAD_SETTINGS); ?><br /><?php if (COLOR_FILTERS == 1) echo(L_COLOR_HEAD_SETTINGSa."<br />"); ?><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("Administrateur"); elseif ($CookieStatus == "m") echo("Moderateur"); elseif ($CookieStatus == "u") echo("Invit� (Normal)"); else echo("Enregister� (Normal)");?></b><br /><?php if (COLOR_FILTERS == 1) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Sugg�rer � utilisateur de venir dans le salon que vous occupez :</B></A></FONT>
<P>
Vous pouvez avoir recours � la <B>commande invite</B> pour inciter un utilisateur � vous rejoindre dans votre salon de discussion courant.
<P>
<I>Par exemple :</I> /invite Coco
<P>
enverra un message priv� � Coco lui sugg�rant de venir discuter dans le salon que vous occupez. Ce message contiendra le nom de ce salon sous forme d'hyperlien.
<P>
Notez que vous pouvez mettre plusieurs noms � la suite pour cette commande ("/invite Coco,H�l�ne,Alf"). Ils doivent alors �tre s�par�s par une virgule sans espace.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Changer de salon de discussion :</B></A></FONT>
<P>
La liste affich�e � droite de l'�cran correspond � la liste des salons ouverts et des utilisateurs qui y sont pr�sents. Pour quitter votre salon de discussion et vous rendre imm�diatement dans l'un de ceux qui sont affich�s, cliquez simplement une fois sur le nom de ce dernier. Les salons vides d'occupants n'apparaissant pas dans la liste, il vous faudra faire appel � la <B>commande "/join #nom_de_salon"</B> (sans guillemets) pour vous y rendre sans passer par la page d'accueil.
<P>
<I>Par exemple :</I> /join #Salon_1
<P>
vous transportera dans le Salon_1.
<?php
if (C_VERSION == "2")
{
	echo(C_REQUIRE_REGISTER == "0" ? "<P>Si vous �tes un utilisateur enregistr�, vous" : "<P>Vous");
	?>
	 pouvez aussi cr�er un nouveau salon � l'aide de cette m�me commande. Mais il vous faudra alors pr�ciser la nature de ce salon : 0 pour un salon priv�, 1 pour un salon public (valeur par d�faut).
	<P>
	<I>Par exemple :</I> /join 0 #MonSalon
	<P>
	cr�era le salon priv� MonSalon (� condition qu'aucun salon public de m�me nom n'existe d�j�) et vous y transf�rera.
	<P>
	Le nom d'un salon ne peut contenir ni virgule, ni anti-slash (\).<?php if (C_NO_SWEAR == "1") echo(" Il ne peut pas plus comprendre de \"gros mots\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>MModifier son profil une fois entr� dans un salon :</B></FONT>
<P>
La <B>commande Profile</B> affichera une petite fen�tre dans laquelle vous pourrez modifier votre profil de fa�on limit�e : votre pseudo et votre mot de passe ne pourront en aucun cas �tre concern�s (utilisez le lien sur la page d'accueil pour ce faire).<BR>Tapez "/profile" sans guillemets.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>Rappeler le dernier message envoy� ou la derni�re commande ex�cut�e :</B></FONT>
<P>
La <B>commande !</B> ins�re dans la "boite � message" le dernier texte qui y a �t� entr�, qu'il s'agisse d'une commande ou d'un message.<BR>Tapez "/!" sans guillemets.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><B>R�pondre � un utilisateur en particulier :</B></FONT>
<P>
Cliquer une fois sur le nom d'un utilisateur apparaissant dans la liste situ�e � droite de votre �cran ins�rera son nom dans la "boite � message". Ceci permet d'indiquer que le message que vous envoyez s'adresse particuli�rement � lui, par example.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Messages priv�s :</B></A></FONT>
<P>
Pour faire parvenir un message priv� � un utilisateur pr�sent dans le m�me salon que vous, tapez la <B>commande "/msg pseudo texte_du_message" ou "/to pseudo texte_du_message"</B> sans les guillemets.
<P>
<I>Par exemple, si Coco est le nom de l'utilisateur auquel le message priv� est destin� :</I> /msg Coco Bonjour, comment vas-tu ?
<P>
Le message "Bonjour, comment vas-tu ?" (sans les guillemets) ne sera visible que de Coco et de vous.
<P>
Notez qu'en cliquant sur le nom d'un exp�diteur dans le cadre principal, cette commande sera automatiquement ins�r�e dans le champ d'entr�e des messages.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Actions :</B></A></FONT>
<P>
Pour envoyer un message d�crivant ce que vous �tes en train de faire vous pouvez avoir recours � la <B>command "/me action"</B> sans guillemets.
<P>
<I>Par exemple :</I> si Nicolas tape "/me boit un caf�" le message "<B>* Nicolas</B> boit un caf�" sera affich� dans le cadre des messages.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorer les messages d'autres utilisateurs :</B></A></FONT>
<P>
Pour ne pas voir s'afficher les messages provenant d'un utilisateur particulier, utilisez la <B>commande "/ignore pseudo"</B> sans guillemets.
<P>
<I>Par exemple :</I> /ignore Coco
<P>
D�s lors, aucun des messages que Coco enverra ne seront affich� dans le cadre principal du chat.
<P>
Pour visualiser l'ensemble des utilisateurs dont les messages sont ignor�s, tapez simplement la <B>commande "/ignore"</B> sans guillemets ni param�tre additionnel : une petite fen�tre ind�pendante listant l'ensemble de ces utilisateurs "ignor�s" s'affichera.
<P>
Pour afficher � nouveau les messages d'un utilisateur qui �tait pr�c�demment ignor�, tapez la <B>commande "/ignore - pseudo"</B> sans guillemets o� "-" est un trait d'union ou le sigle math�matique "moins".
<P>
<I>Par exemple :</I> /ignore - Coco
<P>
Tous les messages en provenance de Coco seront affich�s � nouveau, y compris ceux qui avaient �t� envoy�s avant que vous ayez tap� la commande.
Si vous ne sp�cifiez pas de pseudo apr�s le trait d'union, la liste des utilisateurs ignor�s sera vid�e.
<P>
Notez que vous pouvez mettre plusieurs noms � la suite pour cette commande ("/ignore Coco,H�l�ne,Alf" ou "/ignore - Coco,Alf" par exemple). Ils doivent alors �tre s�par�s par une virgule sans espace.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Afficher les informations relatives � un autre utilisateur :</B></A></FONT>
<P>
Pour visualiser le profil d'un autre utilisateur, tapez la <B>commande "/whois pseudo"</B> sans guillemets.
<P>
<I>Par exemple :</I> /whois Coco
<P>
o� 'Coco' est le pseudo de l'utilisateur. Cette commande provoquera l'affichage d'une petite fen�tre contenant les informations disponibles pour l'utilisateur Coco s'il s'agit d'un utilisateur enregistr�.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Sauvegarder les messages :</B></A></FONT>
	<P>
	Pour r�cup�rer sur votre disque un fichier HTML contenant les messages (hors notifications) publi�s dans le salon courant, ayez recours � la <B>commande "/save n"</B> sans guillemets.
	<P>
	<I>Par exemple :</I> /save 5
	<P>
	o� '5' est le nombre de messages � sauvegarder. Si n n'est pas sp�cifi�, tous les messages disponibles seront pris en compte.
	<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Commandes r�serv�es aux mod�rateurs et/ou � l'administrateur</U></B></A></FONT>

<P>
<FONT SIZE="+1"><A NAME="announce"><B>Poster une annonce g�n�rale :</B></A></FONT>
<P>
L'administrateur peut envoyer un message qui sera visible par tous les utilisateurs connect�s quelque soit le salon dans lequel ils discutent gr�ce � la <B>commande announce</B>.
<P>
<I>Par exemple : /announce Mise � jour du chat � 20h00 ce soir, risque de perturbations.</I>
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
Il y a une autre commande d'annonce utilisable pour le jeux de role en particulier; Les administrateurs ou moderateurs d'un salon peuvent aussi envoyer une annonce � tout les Utilistateurs du salon couran avec la commande <B>room command</B>.
<P>
<I>Par exemple: /room La partie commance � 15h00.</I> ou <I>/room * La partie commance � 15h00 dans le sallon principale.</I>
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Kicker (Ejecter) un utilisateur :</B></FONT>
<P>
Un mod�rateur peut �jecter un utilisateur et l'administrateur peut faire de m�me pour un mod�rateur ou un utilisateur � l'aide de la <B>commande kick</B>. Seul l'administrateur peut ejecter un utilisateur qui ne discute pas dans le m�me salon que lui.
<P>
<I>Par exemple</I>, si Coco est le pseudo de l'utilisateur � �jecter :</I> /kick Coco</I>
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Bannir un utilisateur :</B></A></FONT>
	<P>
	Un mod�rateur peut bannir un utilisateur et l'administrateur peut faire de m�me pour un mod�rateur ou un utilisateur � l'aide de la <B>commande ban</B>.<br />
	Seul l'administrateur peut bannir un utilisateur qui ne discute pas dans le m�me salon que lui; il peut aussi bannir un utilisateur "� jamais" du chat (tous salons confondus) un ins�rant le param�tre '<B>&nbsp;*&nbsp;</B>' avant le pseudo de ce dernier.
	<P>
	<I>Par exemple</I>, si Coco est le pseudo de l'utilisateur � bannir : <I>/ban Coco</I> ou <I>/ban * Coco</I>
	<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Faire acc�der un utilisateur au statut de mod�rateur :</B></A></FONT>
<P>
Il est possible pour l'administrateur ou un mod�rateur de transformer un simple utilisateur en mod�rateur pour le salon courant � l'aide de la <B>commande promote</B>.
<P>
<I>Par exemple</I>, si Coco est le pseudo de l'utilisateur � "promouvoir" :<I> /promote Coco</I>
<P>
L'op�ration inverse (r�duire un mod�rateur au statut d'utilisateur) n'est accessible qu'� l'administrateur via une page sp�cifique. Il n'existe pas de commande pour ce faire.
<br /><P ALIGN="right"><A HREF="#top">D�but de la page</A></P>
<P>


</BODY>
</HTML>