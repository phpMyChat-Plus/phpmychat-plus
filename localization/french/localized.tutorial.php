<?php
// File : french/localized.tutorial.php - plus version (10.04.2008 - rev.9)
// Translation for Plus version by Pierre Liget <sourceforge@pliget.freesurf.fr> 10.12.2007
// Updates, corrections and additions for the Plus version by Ciprian Murariu <ciprianmp@yahoo.com>
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
<TITLE>Tutoriel Français pour <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
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
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Tutoriel en Français pour <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</B></FONT></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></A></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Contenu de ce Tutoriel</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Choisir une langue</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Se connecter au Chat</A><br />
<A HREF="#register" CLASS="topLink">S’inscrire</A><br />
<A HREF="#modProfile" CLASS="topLink">Modifier<?php if (C_SHOW_DEL_PROF) echo("/supprimer"); ?> votre profil</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Créer un salon</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Comprendre l’état de connexion</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Poster un message</A><br />
<A HREF="#users_list" CLASS="topLink">Comprendre la liste des utilisateurs</A><br />
<A HREF="#exit" CLASS="topLink">Se déconnecter du chat</A><br />
<A HREF="#users_popup" CLASS="topLink">Savoir qui est connecté au chat sans être soi-même connecté</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Personnaliser l’affichage du chat</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Fonctionnalités et commandes :</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">Commande d’aide</A><br />
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
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">Smileys graphiques</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">Formatage du texte</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">Inviter un utilisateur à se connecter sur votre salon actuel</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">Passer d’un salon à un autre</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">Modifier votre profil à partir du Chat</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">Rappeler le dernier message ou la dernière commande que vous avez posté</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">Répondre à un utilisateur en particulier</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">Messages privés</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">Actions</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">Ignorer les messages de certains utilisateurs</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">Voir les informations publiques sur d’autres utilisateurs.</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">Sauvegarder les messages</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Commandes spéciales pour les modérateurs et/ou l’administrateur :</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">Poster une annonce</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">Ejecter un utilisateur</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">Exclure un utilisateur</A><br />
	<?php
};
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">Promouvoir/révoquer un utilisateur au/du rôle de modérateur :</A><br />
<P>
<hr />
<hr />


<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Choisir une langue :</B></A></FONT>
	<P>
	Vous pouvez choisir une langue parmi celles qui ont été traduites dans <?php echo(APP_NAME); ?> en cliquant sur un des drapeaux sur la page de connexion. Dans l’exemple ci-dessous, un utilisateur choisit la langue française :
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Flags for language selection">
	<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Se connecter :</B></A></FONT>
<P>
Si vous êtes déjà inscrit, entrez simplement votre nom d’utilisateur et votre mot de passe. Sélectionnez ensuite le salon dans lequel vous voulez entrer et cliquez sur le bouton ’<?php echo(L_SET_14); ?>’.<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Sinon, vous devez tout d’abord vous <A HREF="#register">inscrire</A>.
	<?php
}
else
{
	?>
<P>
	Sinon vous pouvez vous <A HREF="#register">inscrire</A> ou plus simplement vous connecter à un salon mais votre pseudo ne vous sera pas réservé (un autre utilisateur pourra prendre votre pseudo une fois que vous vous serez déconnecté).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>S’inscrire :</B></A></FONT>
<P>
Si vous n’êtes pas encore inscrit<?php if (!C_REQUIRE_REGISTER) echo(" et que vous désirez vous inscrire"); ?>, veuillez cliquer sur le lien d’inscription. Une boîte de dialogue s’affichera.
<P>
<UL>
	<LI>En premier lieu, créez un nom d’utilisateur<?php if (!C_EMAIL_PASWD) echo(" et un mot de passe"); ?> en les saisissant dans les boîtes de dialogue appropriées. Le nom d’utilisateur que vous choisissez sera le même que celui qui sera affiché automatiquement sur les différentes pages du chat. Il ne peut pas contenir d’espace, de virgule ou d’anti-slash (\).
<?php if (C_NO_SWEAR) echo(" Il ne peut pas contenir de \"mots injurieux\"."); ?>
	<LI>Deuxièmement, saisissez votre prénom, nom, et votre adresse e-mail. Pour vous inscrire au Chat, l’ensemble de ces informations est nécessaire. L’information concernant le sexe est facultative.
	<LI>Si vous avez un site Web, vous pouvez indiquer son URL d’accès.
	<LI>Précisez les langues que vous parlez pour faciliter les échanges avec les autres utilisateurs. Ils sauront quelles langues vous comprenez.
	<LI>Enfin, si vous souhaitez que votre adresse e-mail soit visible par les autres participants, sélectionnez la case à cocher à côté de "montrer votre e-mail aux autres utilisateurs". Si vous ne souhaitez pas diffuser votre adresse e-mail, laissez la case décochée.
	<LI>Cliquer finalement sur le bouton "<?php echo(L_REG_3); ?>". En fonction du paramétrage effectué par l’Administrateur, vous pouvez avoir à attendre la validation de l’Administrateur. Quoiqu’il en soit, vous recevrez un mail qui vous indiquera la marche à suivre le cas échéant. Vous pouvez interrompre à tout moment le processus d’inscription en cliquant sur le bouton "<?php echo(L_REG_25); ?>".
</UL>
<P>
<A NAME="modProfile"></A>Bien entendu, les utilisateurs inscrits pourront modifier<?php if (C_SHOW_DEL_PROF) echo("/supprimer"); ?> leur profil en cliquant sur <?php echo((!C_SHOW_DEL_PROF ? "le lien approprié" : "les liens appropriés")); ?>.<br />
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Création d’un salon :</B></A></FONT>
	<P>
	Seuls les utilisateurs inscrits peuvent créer des salons. Les salons privés peuvent être accédés seulement par les utilisateurs qui connaissent son nom et ne seront jamais divulgués sauf pour les utilisateurs qui y sont connectés.
	<br />
	<P>
	Les noms de salon ne peuvent pas contenir de virgule ou d’anti-slash (\).<?php if (C_NO_SWEAR) echo(" Ils ne peuvent pas non plus contenir des \"mots injurieux\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Comprendre l’état de connexion :</B></A></FONT>
	<P>
	Un témoin signale l’état de votre connexion, il est situé en haut à droite de l’écran. Il peut apparaitre sous 3 formes différentes :
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Pas de connexion"> lorsqu’aucune connexion n’est requise ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="En cours de connexion"> lorsque le processus de connexion est en cours ;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="La connexion a échoué"> lorsque la connexion a échoué.
	</UL>
	<P>
	Dans le troisième cas, le fait de cliquer sur le témoin "rouge" va déclencher une nouvelle tentative de connexion.
	<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Poster des messages :</B></A></FONT>
<P>
Pour poster un message dans un des salons du Chat, tapez votre texte dans la zone de saisie réservée à cet effet en bas à gauche de l’écran, puis terminez par "Entrée/Retour chariot" pour valider. Les messages de l’ensemble des utilisateurs défilent dans le cadre principal du Chat.<br />
<?php if (C_NO_SWEAR) echo("Note that \"swear words\" are skipped from messages."); ?>
<P>
Vous pouvez changer la couleur du texte de vos messages en choisissant une nouvelle couleur dans la liste déroulante à droite de la zone de saisie des messages.
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Comprendre la liste des utilisateurs (cadre à droite des messages) :</B></A></FONT>
<P>
<OL>
	Deux règles de base sont définies pour la liste des utilisateurs :<br />
	<LI>une petite icône indique le sexe de l’utilisateur juste devant son pseudo (en cliquant sur cette icône, on affiche une fenêtre <A HREF="#whois">popup "whois"</A> pour cet utilisateur), tandis que les utilisateurs non-enregistrés n’ont rien d’autre qu’un espace vide devant leur pseudo;<br />
	<LI>le pseudo de l’administrateur ou d’un modérateur est affiché en italique.
</OL>
<P><I>Par exemple</I>, de la copie d’écran ci-dessous, on peut en déduire que :
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="liste des utilisateurs">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas est administrateur ou l’un des modérateurs du salon courant;<br /><br />
		<LI>alien (dont le sexe est inconnu), Jezek2 et Caridad sont des utilisateurs inscrits sans privilège particulier pour le salon courant;<br /><br />
		<LI>lolo est un simple utilisateur non-inscrit.
	</UL>
	</TD>
</TR>
</TABLE>
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Quitter le Chat :</B></A></FONT>
<P>
Pour sortir du Chat, cliquez sur <?php echo (EXIT_LINK_TYPE) ? "l’image <img src='localization/$L/images/exitdoor.gif' border=0 alt='".L_EXIT."'>" : 'le lien "'.L_EXIT.'"'; ?>. Vous pouvez aussi taper l’une des commandes suivantes dans la zone de saisie des messages :<br />
/exit<br />
/bye<br />
/quit<br />
Ces commandes peuvent être complétées par un message qui sera affiché juste avant votre déconnexion du Chat.<br />
<I>Par exemple :</I> /quit A bientôt!
<P>
va afficher le message "A bientôt!" dans le cadre des messages et vous déconnectera.

<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Connaitre les utilisateurs connectés sans l’être soi-même :</B></A></FONT>
<P>
Sur la page d’accueil, vous pouvez cliquer sur le lien représenté par le nombre d’utilisateurs connectés ou, si vous êtes déjà connecté, cliquez sur l’image <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_DETACH ?>"> en haut à droite de l’écran pour ouvrir une nouvelle fenêtre qui affichera la liste des utilisateurs connectés, ainsi que les salons dans lesquels ils sont connectés en quasi temps réel.<br />
Le titre de cette fenêtre est composé des noms des utilisateurs connectés s’il y en a moins de trois, et sinon du nombre d’utilisateurs connectés et de salons ouverts.
<P>
En cliquant sur l’icône <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo L_BEEP ?>"> en haut de cette fenêtre, vous activerez/désactiverez l’alerte sonore à la connexion d’un utilisateur sur le Chat.
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />
<hr />


<P>
<FONT SIZE="+1"><A NAME="customize"><B>Personnaliser l’affichage du Chat :</B></A></FONT>
<P>
Il y a plusieurs façons de personnaliser l’apparence du Chat. Pour changer le paramétrage, tapez simplement la commande appropriée dans la zone de saisie des messages et tapez "Entrée".
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>La commande <B>Clear</B> vous permet d’effacer le cadre principal du Chat et d’afficher les 5 derniers messages postés.<br />Tapez "/clear" sans les guillemets.
		<P>
		<?php
	}
	else
	{
		?>
		<LI>La commande <B>Order</B> vous permet de modifier l’ordre d’affichage des messages, les nouveaux messages apparaissant soit en haut ou en bas du cadre des messages.<br />Tapez "/order" sans les guillemets.
		<P>
		<?php
	};
	?>
	<LI>La commande <B>Notify</B> permet d’afficher ou de faire disparaitre les messages de notification d’entrée ou sortie des utilisateurs du Chat. Par défaut cette option est <?php echo(C_NOTIFY ? "activée" : "désactivée"); ?> et les notifications <?php echo(C_NOTIFY ? "seront" : "ne seront pas"); ?> affichées.<br />Tapez "/notify" sans les guillemets.
	<P>
	<LI>La commande <B>Timestamp</B> vous permet d’activer ou de désactiver l’option d’affichage des heures où les messages ont été postés devant chaque message, ainsi que l’heure du serveur dans la barre d’état. Par défaut cette option est <?php echo(C_SHOW_TIMESTAMP ? "activée" : "désactivée"); ?>.<br />Tapez "/timestamp" sans les guillemets.
	<P>
	<LI>La commande <B>Refresh</B> permet d’ajuster le délai d’actualisation du cadre des messages postés. Le délai actuel est de <?php echo(C_MSG_REFRESH); ?> secondes. Pour le modifier, tapez "/refresh n" sans les guillemets où n est le nombre de secondes entre deux actualisations.
	<P>
	<I>Par exemple :</I> /refresh 5
	<P>
	va porter la valeur du délai à 5 secondes. *Attention, si n est inférieur à 3, il n’y a plus d’actualisation du tout (utile si vous voulez lire un grand nombre d’anciens messages sans être perturbé par l’actualisation du cadre)!*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI>La commande <B>Show</B> permet de définir le nombre de messages à afficher dans le cadre principal des messages. Pour modifier la valeur par défaut, taper "/show n" sans les guillemets où n est le nombre de messages à afficher.
		<P>
		<I>Par exemple :</I> /show 50
		<P>
		va provoquer l’affichage des 50 derniers messages les plus récents. Si tous les messages ne peuvent pas être affichés dans la partie visible du cadre, une barre de défilement apparaitra sur la droite de la zone des messages.</UL>
		<?php
	}
	else
	{
		?>
		<LI>Les commandes <B>Show et Last</B> permettent d’effacer les messages du cadre principal et d’afficher les <I>n</I> derniers messages postés. Tapez "/show n" ou "/last n" sans les guillemets où n est le nombre de messages à afficher.
		<P>
		<I>Par exemple:</I> /show 50 ou /last 50
		<P>
		effacera le cadre des messages et affichera sur votre écran les 50 derniers messages postés. Si tous les messages ne peuvent pas être affichés dans la partie visible du cadre, une barre de défilement apparaitra sur la droite de la zone des messages.</UL>
		<?php
	};
	?>
	<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
	<P>
</UL>
<hr />
<hr />


<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Fonctionnalités et Commandes</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Commande d’aide :</B></A></FONT>
<P>
Une fois connecté à un salon, vous pouvez afficher une fenêtre d’aide en cliquant sur l’image <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> située juste à gauche de la zone de saisie des messages. Vous pouvez aussi taper les commandes <B>"/help" ou "/?"</B> dans la zone de saisie des messages.
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatars :</B></A></FONT>
<P>Les Avatars sont des petites icônes qui représentent chacun des usagers du Chat. Seuls les utilisateurs inscrits peuvent changer leur avatar. Pour ce faire, ils doivent ouvrir la fenêtre d’édition de leur profil (voir la commande <A HREF="#changeprofile">/profile</A>) et cliquer sur l’image définie comme avatar pour en choisir une nouvelle dans une liste, ou pour saisir une URL pointant vers une image disponible n’importe où sur internet (seules les images accessibles de façon publique, elles ne doivent pas être protégées par un mot de passe). Le format des images doit être lisible par les navigateurs internet (.gif, .jpg, etc. ) avec une taille de 32 x 32 pixel pour un meilleur affichage.
<P>En cliquant sur l’avatar d’un usager dans le cadre des messages, vous ferez apparaitre une fenêtre contenant son profil (voir la commande <A HREF="#whois">/whois</A>).
En cliquant sur votre propre avatar dans la liste des utilisateurs, vous ouvrirez la fenêtre d’édition de votre profil, si vous êtes inscrit (voir aussi commande /profile).
Si vous n’êtes pas inscrit, cliquer sur votre propre avatar (défini par défaut au niveau du système) provoquera l’affichage d’une alerte vous encourageant à vous inscrire.
  <P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
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
	<P>Vous pouvez insérer des smilies dans vos messages. Ci-dessous, vous trouverez les codes à saisir pour obtenir l’un des smilies.
	<P>
	<I>Par exemple</I>, en postant le texte "Salut Jack :)" sans les guillemets, vous afficherez le message Salut Jack <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)"> dans le cadre principal du Chat.
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
	<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Formater le Texte :</B></A></FONT>
	<P>
	Le texte des messages peut être formaté en gras, italique ou souligné en encadrant le texte désiré entre les balises HTML &LT;B&GT; &LT;/B&GT;, &LT;I&GT; &LT;/I&GT; ou &LT;U&GT; &LT;/U&GT;.
	<P>
	<I>Par exemple</I>, &LT;B&GT;ce texte&LT;/B&GT; affichera <B>ce texte</B>.
	<P>
	Pour créer un hyperlien pour une adresse e-mail ou une URL, tapez simplement l’adresse (sans aucune balise HTML). L’hyperlien sera généré automatiquement.
	<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
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
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Inviter quelqu’un à se joindre au salon courant :</B></A></FONT>
<P>
Utilisez la commande <B>invite</B> pour inviter un utilisateur à se joindre au salon dans lequel vous vous trouvez.
<P>
<I>Par exemple:</I> /invite Jack
<P>
va envoyer un message privé à Jack lui suggérant de se joindre à vous dans le salon où vous vous trouvez. Ce message contiendra le nom du salon cible et son nom apparaitra sous forme d’hyperlien.
<P>
Noter que vous pouvez insérer plus d’un nom d’utilisateur en paramètre de la commande invite (ex. "/invite Jack,Helen,Alf"). Les noms doivent être séparés par des virgules (,) sans espaces.
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Changer de salon :</B></A></FONT>
<P>
La liste sur la droite de l’écran fournit la liste des salons et les utilisateurs qui y sont actuellement connectés. Pour quitter le salon sur lequel vous êtes connecté et accéder à l’un des autres salons, cliquez juste une fois sur le nom du salon désiré. Les salons où personne n’est connecté n’apparaitront pas dans cette liste. Vous pouvez vous connecter à un salon vide en tapant la commande <B>"/join #nom du salon"</B> sans les guillemets.
<P>
<I>Par exemple:</I> /join #Salon Rouge
<P>
vous connectera au salon "Salon Rouge".
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Si vous êtes un utilisateur inscrit, vous" : "<br /><P>Vous");
	?>
	 pouvez aussi créer un nouveau salon avec cette même commande. Mais dans ce cas, vous devez spécifier son type : 0 pour un salon privé, 1 pour un salon public (valeur par défaut).
	<P>
	<I>Par exemple:</I> /join 0 #Mon Salon
	<P>
	va créer un nouveau salon privé (en supposant qu’un salon public du même nom n’existe pas déjà) nommé "Mon Salon" et vous connecter à ce salon.
	<P>
	Le nom d’un salon ne peut pas contenir de virgule ou d’anti-slash (\).<?php if (C_NO_SWEAR) echo(" Il ne peut pas non plus contenir de \"mots injurieux\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>Modifier votre profil à partir du chat :</B></FONT>
<P>
La commande <B>Profile</B> ouvre une nouvelle fenêtre qui va vous permettre d’afficher votre profil d’utilisateur et de le modifier excepté votre pseudo et votre mot de passe (pour cela utilisez le lien sur la page d’accueil).<br />Tapez /profile
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>Rappeler le dernier message ou la dernière commande que vous avez tapé :</B></FONT>
<P>
La commande <B>! (point d’exclamation)</B> rappelle le dernier message ou la dernière commande que vous avez tapé.<br />Tapez /!
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>Répondre à un utilisateur en particulier :</B></FONT>
<P>
En cliquant sur le nom d’un autre utilisateur dans la liste (dans le cadre à droite de l’écran) vous verrez apparaitre "utilisateur>" dans la zone de saisie des messages. Cette fonction permet de cibler facilement un utilisateur avec un message public, peut-être en réponse à un message qu’il ou elle a posté auparavant.
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Messages privés :</B></A></FONT>
<P>
Pour envoyer un message privé à un autre utilisateur connecté au salon dans lequel vous vous trouvez, tapez la commande <B>"/msg utilisateur messagetexte" ou "/to utilisateur messagetexte"</B> sans les guillemets.
<P>
<I>Par exemple, un message adressé à Jack :</I> /msg Jack Salut, comment ça va?
<P>
Le message apparaitra sur l’écran de Jack et le vôtre, mais aucun autre utilisateur ne le verra.
<P>
Quand la fonction PM (Message Privé) est activée, il est aussi possible d’envoyer un message privé (ou murmure) à un utilisateur dans un autre salon, en utilisant la <B>commande "/wisp nomutilisateur message texte"</B> sans les double-quotes.
<P>
<?php
if (C_PRIV_POPUP)
{
?>
En cliquant sur le pseudo d’un utilsateur devant un message du cadre principal, vous ferez apparaître automatiquement la commande /to ou /wisp correspondante dans le champs de saisie des messages.
<?php
}
else
{
?>
En cliquant sur le pseudo dans la liste des utilisateurs en haut à droite, vous ferez apparaître automatiquement une fenêtre pop-up pour saisir un message privé. Vous recevrez les réponses dans de nouvelles fenêtres.
<?php
}
?>
<P>
Note: quand les pop-up de messages privés (PM) sont activés (dans les paramètres du chat et de votre profil), vous avez la possibilité de ré-afficher tous les messages privés que vous avez reçus depuis votre dernière connexion au chat ou depuis votre dernière commande "away"; tous les messages privés s’afficheront dans une nouvelle fenêtre; vous pouvez y répondre un à un depuis la même fenêtre.
Cette fonction n’est disponible que pour les utilisateurs inscrits.
<P>
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php echo("a) ENABLE_PM = <b>".(C_ENABLE_PM == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) PRIV_POPUP = <b>".(C_PRIV_POPUP == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Décrire ses Actions:</B></A></FONT>
<P>
Pour décrire ce que vous êtes en train de faire, utilisez la commande <B>"/me action"</B> sans les guillemets.
<P>
<I>Par exemple:</I> Si Jack poste le message "/me est en train de boire un café", le cadre principal des messages affichera "<B>* Jack</B> est en train de boire un café".
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorer les messages des autres utilisateurs :</B></A></FONT>
<P>
Pour empêcher l’affichage des messages postés par un autre utilisateur, tapez la commande <B>"/ignore username"</B> sans les guillemets.
<P>
<I>Par exemple:</I> /ignore Jack
<P>
Dès lors, aucun des messages que Jack enverra ne s’affichera sur votre écran.
<P>
Pour avoir la liste des utilisateurs dont les messages sont ignorés, tapez la commande <B>"/ignore"</B> sans les guillemets.
<P>
Pour reprendre l’affichage des messages pour un utilisateur ignoré, tapez la commande <B>"/ignore - utilisateur"</B> sans les guillemets où "-" est un tiret. <P>
<P>
<I>Par exemple:</I> /ignore - Jack
<P>
Dès lors, les messages postés par Jack seront affichés sur votre écran pour votre session courante du Chat, y compris les messages postés par Jack avant que vous ne tapiez cette commande.
 Si aucun nom d’utilisateur n’est spécifié après le tiret "-", vous verrez à nouveau tous les utilisateurs que vous aviez décidé d’ignorer.
<P>
Vous pouvez saisir plusieurs noms d’utilisateur en paramètre cette commande  (ex. "/ignore Jack,Helen,Alf" ou "/ignore - Jack,Alf"). Ils doivent être séparés par des virgules (,) sans espace.
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Afficher des informations concernant les utilisateurs :</B></A></FONT>
<P>
Pour visualiser les données publiques d’un utilisateur, tapez la commande <B>"/whois nom_utilisateur"</B> sans les guillemets.
<P>
<I>Par Exemple:</I> /whois Jack
<P>
où ’Jack’ est le nom d’utilisateur. Cette commande va ouvrir une nouvelle fenêtre où seront affichées les informations publiques disponibles concernant cet utilisateur. Exécutez cette commande avec votre propre nom d’utilisateur pour vérifier quelles sont les informations publiques publiées vous concernant.
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Sauvegarder des messages :</B></A></FONT>
	<P>
	Pour exporter des messages (notifications exclues) vers un fichier HTML en local sur votre poste, tapez la commande <B>"/save n"</B> sans les guillemets.
	<P>
	<I>Par Exemple:</I> /save 5
	<P>
	où ’5’ est le nombre de messages à enregistrer. Si n n’est pas précisé, tous les messages affichés dans le salon courant seront pris en compte.
	<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Commandes pour les administrateurs et/ou modérateurs uniquement</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Poster une annonce générale :</B></A></FONT>
<P>
L’administrateur peut envoyer une annonce générale à l’ensemble des salons et atteindre ainsi tous les utilisateurs actuellement connectés grâce à la commande <B>announce</B>.
<P>
<I>Par exemple: /announce Le système qui héberge le chat va être arrêté pour des raisons de maintenance ce soir à partir de 20h.</I>
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
Il y a une autre commande d’annonce utile pour les forums de discussions dits à "jeu de rôle"; l’administrateur ou les modérateurs d’un salon peuvent envoyer une annonce à tous les utilisateurs du salon courant ou de tous les salons avec la commande <B>room</B>.
<P>
<I>Par exemple: /room La réunion commence à 15h.</I> ou <I>/room * La réunion commence à 15h dans le salon Staff.</I>
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Ejecter un utilisateur :</B></FONT>
<P>
Les modérateurs peuvent éjecter un utilisateur et l’administrateur peut éjecter un utilisateur ou un modérateur avec la commande <B>kick</B>. Hormis pour l’administrateur, l’utilisateur à éjecter doit être dans le salon courant.
<P>
<I>Par exemple</I>, si Jack est le nom de l’utilisateur à éjecter du Chat : <I>/kick Jack</I> ou <I>/kick Jack raison de l’éjection</I>. La "raison de l’éjection" peut être n’importe quel texte, ex. "pour spam !"
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Exclure un utilisateur :</B></A></FONT>
	<P>
	Les modérateurs peuvent exclure un utilisateur et l’administrateur peut exclure un utilisateur ou un modérateur grâce à la commande <B>ban</B>.<br />
	L’administrateur peut exclure un utilisateur à partir d’un salon différent de celui dans lequel il se trouve. Par ailleurs, il peut exclure un utilisateur pour toujours et pour l’ensemble du Chat en utilisant le paramètre ’<B>*</B>’ qu’il doit insérer avant le pseudo de l’utilisateur à exclure.
	<P>
	<I>Par exemple</I>, si Jack est le nom de l’utilisateur à exclure du Chat : <I>/ban Jack</I>, <I>/ban * Jack</I>, <I>/ban Jack raison de l’exclusion</I> ou <I>/ban * Jack raison de l’exclusion</I>. La "raison de l’exclusion" peut être n’importe quel texte, par ex. "pour spam!"
	<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Promouvoir/révoquer un utilisateur au/du rôle de modérateur :</B></A></FONT>
<P>
Les modérateurs et l’administrateur peuvent attribuer le privilège de modérateur aux autres utilisateurs grâce à la commande <B>promote</B>.
<P>
<I>Par exemple</I>, si Jack est le nom de l’utilisateur à promouvoir : <I>/promote Jack</I>
<P>
Seul l’administrateur peut révoquer un privilège (de modérateur à simple utilisateur) avec la commande <B>demote</B>.
<P>
<I>Par example</I>, si Jack est le nom du modérateur à révoquer :<I>/demote Jack</I> ou <I>/demote * Jack</I> (révoque les privilèges de Jack du salon courant ou de tous les salons).
<br /><P ALIGN="right"><A HREF="#top">Retour en haut de la page</A></P>
<P>
</BODY>
</HTML>
<?php
?>
