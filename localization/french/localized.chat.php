<?php
// File : french/localized.chat.php - plus version (20.03.2009 - rev.44)
// Translation for Plus version by Pierre Liget <sourceforge@pliget.freesurf.fr> 10.12.2007
// Updates, corrections and additions for the Plus version by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutoriel");

define("L_WEL_1", "Les messages sont effacés après %s %s");
define("L_WEL_2", "et les utilisateurs inactifs après %s %s");

define("L_CUR_1", "Il y a");
define("L_CUR_1a", "actuellement");
define("L_CUR_1b", "actuellement");
define("L_CUR_2", "sur le chat");
define("L_CUR_3", "Utilisateurs actuellement sur le chat");
define("L_CUR_4", "utilisateurs sur les salons privés");
define("L_CUR_5", "Utilisateurs en train de lire les messages<br />(regardant cette page):");

define("L_SET_1", "Merci de remplir les champs suivants ...");
define("L_SET_2", "Nom d’utilisateur");
define("L_SET_3", "le nombre de messages à afficher");
define("L_SET_4", "le délai entre chaque mise à jour");
define("L_SET_5", "Sélectionner un salon de discussion ...");
define("L_SET_6", "Salons publics par défaut");
define("L_SET_7", "Faites votre choix ...");
define("L_SET_8", "Salons publics créés par les utilisateurs");
define("L_SET_9", "Créez votre propre salon");
define("L_SET_10", "public");
define("L_SET_11", "privé");
define("L_SET_12", ""); // salon
define("L_SET_13", "Et accédez au");
define("L_SET_14", "chat");
define("L_SET_15", "Salons privés par défaut");
define("L_SET_16", "Salons privés créés par les utilisateurs");
define("L_SET_17", "Sélectionnez votre avatar");
define("L_SET_18", "Pour créer un raccourci de cette page: appuyez sur \"Ctrl+D\".");
define("L_SET_19", "Me rappeler");

define("L_SRC", "est disponible gratuitement sur");

define("L_SECS", "secondes");
define("L_MIN", "minute");
define("L_MINS", "minutes");
define("L_HOUR", "heure");
define("L_HOURS", "heures");

// registration stuff:
define("L_REG_1", "Mot de passe");
define("L_REG_2", "Gestion des comptes");
define("L_REG_3", "Créer votre compte");
define("L_REG_4", "Editez votre profil");
define("L_REG_5", "Supprimer votre compte");
define("L_REG_6", "Inscription d’un utilisateur");
define("L_REG_7", "seulement si vous êtes inscrit");
define("L_REG_8", "E-mail");
define("L_REG_9", "Vous avez été inscrit avec succès.");
define("L_REG_10", "Retour");
define("L_REG_11", "Editer");
define("L_REG_12", "Modifier les données utilisateur");
define("L_REG_13", "Suppression de l’utilisateur");
define("L_REG_14", "Login");
define("L_REG_15", "Connexion");
define("L_REG_16", "Modifier");
define("L_REG_17", "Votre profil a été mis à jour avec succès.");
define("L_REG_18", "Vous avez été exclu du salon de discussion par un modérateur de ce salon.");
define("L_REG_18a", "Vous avez été exclu du salon de discussion par un modérateur de ce salon.<br />Raison: %s");
define("L_REG_19", "Etes-vous sûr de vouloir supprimer votre compte?");
define("L_REG_20", "Oui");
define("L_REG_21", "Votre compte a été supprimé avec succès.");
define("L_REG_22", "Non");
define("L_REG_25", "Fermer");
define("L_REG_30", "Prénom");
define("L_REG_31", "Nom");
define("L_REG_32", "WEB");
define("L_REG_33", "montrer votre e-mail aux autres utilisateurs");
define("L_REG_34", "Edition du profil utilisateur");
define("L_REG_35", "Administration");
define("L_REG_36", "Localisation/Pays");
define("L_REG_37", "Les champs signalés par un <span class=\"error\">*</span> sont obligatoires.");
define("L_REG_39", "Le salon où vous étiez a été supprimé par l’administrateur.");
define("L_REG_43", "Confidentiel");
define("L_REG_44", "Couple");
define("L_REG_45", "Sexe");
define("L_REG_46", "Homme");
define("L_REG_47", "Femme");
define("L_REG_48", "Non spécifié");
define("L_REG_49", "Vous devez vous inscrire!");
define("L_REG_50", "Les inscriptions sont momentanément suspendues!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Vos données d’authentification pour entrer sur le chat");
define("L_EMAIL_VAL_2", "Bienvenue sur notre serveur de chat.");
define("L_EMAIL_VAL_Err", "Erreur interne, merci de contacter l’administrateur: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Votre mot de passe vous a été envoyé à votre adresse e-mail.<br />Vous pouvez changer votre mot de passe sur la page de login dans la rubrique \"".L_REG_4."\.");
define("L_EMAIL_VAL_PENDING_Done", "Vos données d’inscription ont été transmises pour vérification.");
define("L_EMAIL_VAL_PENDING_Done1", "Vous allez recevoir votre mot de passe, une fois que votre inscription aura été validée par l’Administrateur.");
define("L_EMAIL_VAL_3", "Votre inscription est en attente de validation pour %s");
define("L_EMAIL_VAL_31", "Félicitations! Votre inscription a été vérifiée et validée!");
define("L_EMAIL_VAL_32", "Voici vos informations d’inscription à %s à l’adresse %s:"); //chat name at chaturl
define("L_EMAIL_VAL_4", "Vous venez d’inscrire ce compte à %s à l’adresse %s:"); //chat name at chaturl
define("L_EMAIL_VAL_41", "Vous venez de modifier des informations importantes du compte %s à %s (compte concerné: %s)."); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "Les informations de votre compte - %s - pour le chat %s"); //username - chatname
define("L_EMAIL_VAL_51", "Les informations mises à jour pour votre compte - %s - pour %s"); //username - chatname
define("L_EMAIL_VAL_6", "Inscrit le %s");
define("L_EMAIL_VAL_61", "Mis à jour le %s");
define("L_EMAIL_VAL_7", "Ci-dessous les informations de votre compte %s modifié:"); //username
define("L_EMAIL_VAL_8", "Gardez cette adresse email pour de futurs échanges.\nVeuillez la conserver précieusement et ne la diffusez à personne.\nMerci de nous avoir rejoints! Amusez-vous bien!");
define("L_EMAIL_VAL_81", "Vous pouvez changer votre mot de passe sur la page de login dans la rubrique \"".L_REG_4."\.");

// admin stuff
define("L_ADM_1", "%s n’est plus modérateur pour ce salon.");
define("L_ADM_2", "Vous n’êtes plus inscrit.");

// error messages
define("L_ERR_USR_1", "Ce nom d’utilisateur est déjà utilisé. Merci d’en choisir un autre.");
define("L_ERR_USR_2", "Vous devez choisir un nom d’utilisateur.");
define("L_ERR_USR_3", "Ce nom d’utilisateur est inscrit.<br />Merci de saisir votre mot de passe ou de choisir un autre nom d’utilisateur.");
define("L_ERR_USR_4", "Vous avez saisi un mot de passe erroné.");
define("L_ERR_USR_5", "Vous devez saisir votre nom d’utilisateur.");
define("L_ERR_USR_6", "Vous devez saisir votre mot de passe.");
define("L_ERR_USR_7", "Vous devez saisir votre e-mail.");
define("L_ERR_USR_8", "Vous devez saisir une adresse e-mail valide.");
define("L_ERR_USR_9", "Ce nom d’utilisateur est déjà utilisé.");
define("L_ERR_USR_10", "Nom d’utilisateur ou mot de passe erroné.");
define("L_ERR_USR_11", "Vous devez être administrateur.");
define("L_ERR_USR_12", "Vous êtes administrateur, votre compte ne peut pas être supprimé.");
define("L_ERR_USR_13", "Pour créer votre propre salon, vous devez êtes inscrit.");
define("L_ERR_USR_14", "Vous devez être inscrit avant de vous connecter au chat.");
define("L_ERR_USR_15", "Vous devez saisir votre nom complet.");
define("L_ERR_USR_16", "Seuls les caractères spéciaux suivants sont autorisés:\\n".$REG_CHARS_ALLOWED."\\nLes espaces, virgules ou anti-slash (\\) ne sont pas autorisés.\\nVérifiez la syntaxe.");
define("L_ERR_USR_16a", "Seuls les caractères spéciaux suivants sont autorisés:<br />".$REG_CHARS_ALLOWED."<br />Les espaces, virgules ou anti-slash (\\) ne sont pas autorisés. Vérifiez la syntaxe.");
define("L_ERR_USR_17", "Ce salon n’existe pas, et vous n’êtes pas autorisé à en créer un.");
define("L_ERR_USR_18", "Un mot interdit a été détecté dans votre nom d’utilisateur.");
define("L_ERR_USR_19", "Vous ne pouvez pas être sur plus d’un salon à la fois.");
define("L_ERR_USR_20", "Vous avez été exclu de ce salon ou du chat.");
define("L_ERR_USR_20a", "Vous avez été exclu de ce salon ou du chat.<br />Raison: %s");
define("L_ERR_USR_21", "Vous êtes inactif depuis les ".C_USR_DEL." denières minutes,<br />vous avez été déconnecté du salon.");
define("L_ERR_USR_22", "Cette commande n’est pas disponible pour\\nle navigateur que vous utilisez (Internet Explorer).");
define("L_ERR_USR_23", "Pour vous connecter à un salon privé, vous devez être inscrit.");
define("L_ERR_USR_24", "Pour créer votre propre salon privé, vous devez être inscrit.");
define("L_ERR_USR_25", "Seul l’administrateur peut utiliser la couleur ".$COLORNAME."!<br />Vous ne pouvez pas utiliser les couleurs ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ou ".COLOR_CM1.".<br />Elles sont réservées aux modérateurs ou administrateurs!");
define("L_ERR_USR_26", "Seuls les administrateurs et les modérateurs peuvent utiliser les couleurs ".$COLORNAME."!<br />Vous ne pouvez pas utiliser les couleurs ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ou ".COLOR_CM1.".<br />Elles sont réservées aux modérateurs ou administrateurs!");
define("L_ERR_USR_27", "Vous ne pouvez pas discuter en privé avec vous-même.\\nFaites ça dans votre tête s’il vous plait...\\nOu sélectionnez un nom d’utilisateur différent.");
define("L_ERR_USR_28", "Votre accès à salon %s a été limité!<br />Merci d’en choisir un autre.");
define("L_ERR_ROM_1", "Le nom d’un salon ne peut pas comporter des virgules ou des anti-slash (\\).");
define("L_ERR_ROM_2", "Un mot interdit a été détecté dans le nom du salon que vous voulez créer.");
define("L_ERR_ROM_3", "Ce salon existe déjà en tant que salon public.");
define("L_ERR_ROM_4", "Nom de salon invalide.");

// users frame or popup
define("L_EXIT", "Sortir du Chat");
define("L_DETACH", "Ouvrir la liste des utilisateurs connectés dans une autre fenêtre");
define("L_EXPCOL_ALL", "Développer/Réduire Tout");
define("L_CONN_STATE", "Actualiser l’état de connexion");
define("L_CHAT", "Chat");
define("L_USER", "utilisateur");
define("L_USERS", "utilisateurs");
define("L_LURKER", "lecteur");
define("L_LURKERS", "lecteurs");
define("L_NO_USER", "Pas d’utilisateur connecté");
define("L_ROOM", "salon");
define("L_ROOMS", "salons");
define("L_EXPCOL", "Développer/Réduire la liste des salons");
define("L_BEEP", "Activer/désactiver le bip à la connexion utilisateur");
define("L_PROFILE", "Afficher le profil");
define("L_NO_PROFILE", "Pas de profil");

// input frame
define("L_HLP", "Aide");
define("L_MODERATOR", "%s est maintenant modérateur pour ce salon.");
define("L_KICKED", "%s a été éjecté avec succès.");
define("L_KICKED_REASON", "%s a été éjecté avec succès. (Raison: %s)");
define("L_KICKED_ALL", "Tous les été éjecté avec succès.");
define("L_KICKED_ALL_REASON", "Tous les été éjecté avec succès. (Raison: %s)");
define("L_BANISHED", "%s a été exclu avec succès.");
define("L_BANISHED_REASON", "%s a été exclu avec succès. (Raison: %s)");
define("L_ANNOUNCE", "ANNONCE");
define("L_INVITE", "%s demande que vous le/la rejoigniez dans le salon <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a>.");
define("L_INVITE_REG", "Vous devez être inscrit pour vous connecter à ce salon.");
define("L_INVITE_DONE", "Votre invitation a été envoyée à %s.");
define("L_OK", "Poster");
define("L_BUZZ", "Galerie sons");
define("L_BAD_CMD", "Cette commande n’est pas valide!");
define("L_ADMIN", "%s est déjà administrateur!");
define("L_IS_MODERATOR", "%s est déjà modérateur!");
define("L_NO_MODERATOR", "Seul un modérateur peut utiliser cette commande.");
define("L_NONEXIST_USER", "%s n’est pas dans le salon courant.");
define("L_NONREG_USER", "%s n’est pas inscrit.");
define("L_NONREG_USER_IP", "Son adresse IP est: %s.");
define("L_NO_KICKED", "%s est un modérateur ou un administrateur et ne peut être éjecté.");
define("L_NO_BANISHED", "%s est un modérateur ou un administrateur et ne peut être exclu.");
define("L_SVR_TIME", "Heure du serveur: ");
define("L_NO_SAVE", "Aucun message à sauvegarder!");
define("L_NO_ADMIN", "Seul l’administrateur peut utiliser cette commande.");
define("L_NO_REG_USER", "Vous devez être inscrit sur ce chat pour utiliser cette commande.");

// help popup
define("L_HELP_TIT_1", "Smilies");
define("L_HELP_TIT_2", "Format du texte des messages");
define("L_HELP_FMT_1", "Vous pouvez mettre le texte en gras, italique ou souligné en utilisant les balises HTML &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; ou &lt;U&gt; &lt;/U&gt;.<br />Par exemple, &lt;B&gt;ce texte&lt;/B&gt; apparaitra de cette façon <B>ce texte</B>.");
define("L_HELP_FMT_2", "Pour créer un hyperlien (e-mail ou URL) dans votre message, tapez simplement l’adresse correspondante sans aucune balise supplémentaire. L’hyperlien sera créé automatiquement.");
define("L_HELP_TIT_3", "Commandes");
define("L_HELP_NOTE", "Toutes les commandes doivent être utilisées en anglais!");
define("L_HELP_MSG", "message");
define("L_HELP_MSGS", "messages");
define("L_HELP_ROOM", "salon");
define("L_HELP_BUZZ", "~sonnom");
define("L_HELP_BUZZ1", "Dring..."); //alert, sound alert, ring, whirr
define("L_HELP_REASON", "la raison");
define("L_HELP_MR", "M. %s");
define("L_HELP_MS", "Mme %s");
define("L_HELP_CMD_0", "{} représente un paramètre obligatoire, [] un paramètre optionnel.");
define("L_HELP_CMD_1a", "Définit le nombre de messages à afficher. Par défaut et au minimum, il y en a 5.");
define("L_HELP_CMD_1b", "Actualise le cadre des messages et affiche les n derniers messages. Par défaut et au minimum, il y en a 5.");
define("L_HELP_CMD_2a", "Modifier le délai d’actualisation des messages (en secondes).<br />Si n n’est pas spécifié ou est inférieur à 3, bascule entre pas d’actualisation et actualisation toutes les 10 secondes.");
define("L_HELP_CMD_2b", "Modifier le délai d’actualisation de la liste des utilisateurs et des messages (en secondes).<br />Si n n’est pas spécifié ou est inférieur à 3, bascule entre pas d’actualisation et actualisation toutes les 10 secondes.");
define("L_HELP_CMD_3", "Inverse l’ordre des messages (pas dans tous les navigateurs).");
define("L_HELP_CMD_4", "Se connecter à un autre salon, en le créant s’il n’existe pas et que vous y êtes autorisé.<br />n égale 0 pour un salon privé et 1 pour un salon public (1 par défaut).");
define("L_HELP_CMD_5", "Quitte le chat en affichant un message optionnel.");
define("L_HELP_CMD_6", "Ignore l’affichage des messages d’un utilisateur si le pseudo existe.<br />Autorise l’affichage des messages d’un utilisateur lorsque le pseudo et \"-\" sont spécifiés, pour tous les utilisateurs lorsque \"-\" est spécifié seul.<br />Sans option, cette commande affiche une fenêtre avec tous les utilisateurs ignorés.");
define("L_HELP_CMD_7", "Rappelle le dernier texte posté (commande ou message).");
define("L_HELP_CMD_8", "Affiche/Cache l’heure devant les messages.");
define("L_HELP_CMD_9", "Ejecte un utilisateur du chat. Cette commande est réservée aux modérateurs du salon ou à un administrateur.<br />De façon optionnelle, [".L_HELP_REASON."] affiche la raison de la déconnexion (texte libre).<br />Si l’option * est utilisée, tous les utilisateurs sans pouvoirs seront éjectés.");
define("L_HELP_CMD_10", "Envoie un message privé à l’utilisateur spécifié (les autres utilisateurs ne le verront pas).");
define("L_HELP_CMD_11", "Affiche les informations pour l’utilisateur spécifié.");
define("L_HELP_CMD_12", "Affiche la fenêtre d’édition du profil de l’utilisateur.");
define("L_HELP_CMD_13", "Bascule l’affichage des notifications d’entrée/sortie des utilisateurs du salon courant.");
define("L_HELP_CMD_14", "Permet à un administrateur ou un modérateur du salon courant de promouvoir modérateur de ce même salon un autre utilisateur inscrit.");
define("L_HELP_CMD_15", "Efface le cadre des messages et affiche les 5 derniers messages.");
define("L_HELP_CMD_16", "Enregistrer les n derniers messages dans un fichier HTML (notifications exclues). Si n n’est pas précisé, tous les messages disponibles seront pris en compte.");
define("L_HELP_CMD_17", "Permet à l’administrateur d’envoyer une annonce à tous les utilisateurs dans tous les salons.");
define("L_HELP_CMD_18", "Invite un utilisateur d’un autre salon à venir vous rejoindre dans le vôtre.");
define("L_HELP_CMD_19", "Permet au(x) modérateur(s) d’un salon ou à l’administrateur d’exclure un utilisateur du salon pour une durée définie par l’administrateur.<br />Ce dernier peut exclure un utilisateur d’un salon différent de celui où il se trouve et utiliser le caractère \"*\" pour exclure un utilisateur définitivement de l’ensembmle du chat.<br />De façon optionnelle, [".L_HELP_REASON."] affiche la raison de l’exclusion (n’importe quel texte).");
define("L_HELP_CMD_20", "Utilisez cette commande pour indiquer ce que vous faites sans avoir à saisir votre nom d’utilisateur.");
define("L_HELP_CMD_21", "Affiche dans le salon et aux utilisateurs qui vous envoient des messages<br /> que vous vous êtes éloigné de l’ordinateur. Pour indiquer que vous êtes de retour sur le chat, postez simplement un nouveau message.");
define("L_HELP_CMD_22", "Envoie un bip sonore sur le salon courant avec un message optionnel.<br />- Usage:<br />- ancien usage: \"/buzz\" ou \"/buzz message à afficher\" - joue le son par défaut défini dans le panneau d’administration;<br />- usage étendu: \"/buzz ~fichier_son\" ou \"/buzz ~fichier_son message à afficher\" - joue le fichier de son fichier_son.wav dans le répertoire plus/sounds; n’oubliez pas le caractère \"~\" devant le début du premier paramètre qui est le nom du fichier son sans l’extension .wav (seules les extensions .wav sont prises en compte).<br />Par défaut, c’est une commande réservée aux modérateurs et à l’administrateur.");
define("L_HELP_CMD_23", "Envoie un <i>murmure</i> (message privé) à un utilisateur donné. Le message sera reçu par le destinataire quelque soit le salon où il se trouve. Si l’utilisateur destinataire n’est pas connecté ou s’est déclaré \"éloigné\" (away), vous serez averti.");
define("L_HELP_CMD_24", "Cette commande modifie le sujet du salon courant. Essayez de ne pas choisir un sujet déjà utilisé. Choisissez des sujets pertinents.<br />Par défaut, cette commande est réservée aux modérateurs et à l’administrateur.<br />La commande \"/topic reset\" modifie le sujet du salon à sa valeur par défaut.<br />La commande \"/topic * {}\" et \"/topic * reset\" a le même effet mais sur l’ensemble des salons (assignation d’un nouveau sujet ou réinitialisation à la valeur par défaut).");
define("L_HELP_CMD_25", "Un jeu de dés à tirage aléatoire.<br />Usage: /dice ou /dice [n];<br />n peut prendre n’importe quelle valeur <b>entre 1 et %s</b> (représente le nombre de dés). Si aucun nombre n’est précisé, le nombre maximum par défaut de dés est utilisé.");
define("L_HELP_CMD_26", "Version plus évoluée de la commande /dice.<br />Usage: /{n1}d[n2] ou /{n1}d;<br />n1 peut prendre n’importe quelle valeur <b>entre 1 et %s</b> (représente le nombre de dés par lancer).<br />n2 peut prendre n’importe quelle valeur <b>entre 1 et %s</b> (représente le nombre de faces par dé).");
define("L_HELP_CMD_27", "Surligne les messages de utilisateur spécifié pour faciliter la lecture de messages dans la conversation.<br />Usage: /high {utilisateur} ou cliquez sur le petit <img src=./images/highlightOff.gif> carré sur la droite du nom d’utilisateur (dans la liste des salons/utilisateurs)");
define("L_HELP_CMD_28", "Permet de poster une <i>image</i> dans un message.<br />Usage: l’image doit être présente sur internet et accessible librement par n’importe qui. N’utilisez pas d’URL dont l’accès nécessite une authentification.<br />L’intégralité du lien doit être saisi! Ex: <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Extensions reconnues: .jpg .bmp .gif .png. Le lien est sensible à la casse!<br />CONSEIL: tapez /img suivi d’un espace et collez l’URL dans la boîte de dialogue qui apparait; pour récupérer l’URL d’une image dans une page web, faites un clic-droit sur l’image, allez dans les propriétés, puis sélectionnez toute l’URL (parfois il faut actionner un peu la barre de défilement) et copiez/collez après la commande /img<br />N’utilisez pas d’images présentes sur votre ordinateur: elles n’apparaitraient pas sur le chat!!!");
define("L_HELP_CMD_29", "La deuxième commande permet à l’administrateur ou aux modérateurs du salon courant de révoquer un utilisateur qui avait été précédemment promu modérateur pour ce même salon.<br />L’option * révoque l’utilisateur de tous les salons.");
define("L_HELP_CMD_30", "La deuxième commande fait la même chose que /me mais en affichant en plus votre sexe<br />E.g. * ".sprintf(L_HELP_MR, "Ciprian")." regarde la télé ou * ".sprintf(L_HELP_MS, "Dana")." est contente.");
define("L_HELP_CMD_31", "Change l’ordre de tri de la liste des utilisateurs: par heure de connexion au chat ou par ordre alphabétique.");
define("L_HELP_CMD_32", "C’est une troisième version du jeu de dés.<br />Usage: /d{n1}[tn2] ou /d{n1};<br />n1 peut prendre n’importe quelle valeur <b>entre 1 et 100</b> (représente le nombre de faces par dé).<br />n2 peut prendre n’importe quelle valeur <b>entre 1 et %s</b> (représente le nombre de dés par lancer).");
define("L_HELP_CMD_33", "Modifie la taille des caractères des messages du chat (valeurs autorisées pour n: <b>entre 7 et 15</b>); la commande /size remet la taille par défaut (<b>".$FontSize."</b>).");
define("L_HELP_CMD_34", "Permet à un utilisateur de spécifier l’orientation du texte d’un message (ltr,gàd = de gauche à droite; rtl,dàg = de droite à gauche).");
define("L_HELP_CMD_35", "Cela permet de poster <i>un fichier vidéo</i> ou <i>audio</i> dans un petit lecteur  Flash.<br />Usage: coller l’URL de la source à poster! Ex. <b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />Vous devez avoir installé Shockwave Flash Player sur votre système. Attention, le lien est sensible à la casse des caractères!<br />Conseil: tapez /video suivi par un espace et collez l’URL dans le champ de saisie.");
define("L_HELP_CMD_35a", "La seconde commande ne fonctionne qu’avec youtube.com en tant que source vidéo.<br />Ex. <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b>");
define("L_HELP_CMD_36", "Cela permet de poster <i>une vidéo youtube</i> dans un petit lecteur Flash.<br />Usage: collez l’URL de la source à poster! Ex. <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />.<b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />Vous devez avoir installé Shockwave Flash Player sur votre système. Attention, le lien est sensible à la casse des caractères!<br />Conseil: tapez /tube suivi par un espace et collez l’URL dans le champ de saisie.");
define("L_HELP_CMD_VAR", "Synonymes (variantes): %s"); // a list of English and/or translated alternatives for each command, provided in help.
define("L_HELP_ETIQ_1", "Etiquette du Chat");
define("L_HELP_ETIQ_2", "Notre chat aimerait conserver sa communauté conviviale et amusante, merci de respecter les directives suivantes. Si vous n’observez pas ces règles, l’un de nos modérateurs vous exclura du chat.<br /><br />Merci,");
define("L_HELP_ETIQ_3", "Directives de l’Etiquette de notre Chat");
define("L_HELP_ETIQ_4", "<li>Ne pas \"spammer\" le chat en tapant des lettres sans aucun sens ou de façon aléatoire.</li>
<li>N’aLtErnEz pas la casse des caractères.</li>
<li>Faites un usage modéré des mots en majuscule, cela étant considéré comme si vous hurliez.</li>
<li>Gardez en tête que les utilisateurs du chat peuvent être n’importe où dans le monde, et, très probablement, vous rencontrerez des gens de croyances différentes. Merci d’être aimable et respectueux avec ces personnes.</li>
<li>Ne proférez pas de propos diffamatoires envers les autres utilisateurs. En bref, essayez de ne pas proférer des injures et/ou des mots grossiers.</li>
<li>N’appelez pas les autres membres du chat par leur véritable nom, ils peuvent ne pas apprécier. Utilisez plutôt leur pseudo.</li>");

// messages frame
define("L_NO_MSG", "Il n’y a actuellement aucun message ...");
define("L_TODAY_DWN", "Les messages postés aujourd’hui commencent ci-dessous");
define("L_TODAY_UP", "Les messages postés hier commencent ci-dessous");

// message colors
$TextColors = array("Noir" => "#000000",
				"Rouge" => "#FF0000",
				"Vert" => "#009900",
				"Bleu" => "#0000FF",
				"Pourpre" => "#9900FF",
				"Rouge foncé" => "#990000",
				"Vert foncé" => "#006600",
				"Bleu foncé" => "#000099",
				"Marron" => "#996633",
				"Bleu Aqua" => "#006699",
				"Carotte" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Ignoré");
define("L_IGNOR_NON", "Pas d’utilisateur ignoré");

// whois popup
define("L_WHOIS_ADMIN", "Administrateur");
define("L_WHOIS_OWNER", "Propriétaire");
define("L_WHOIS_TOPMOD", "Top Moderateur");
define("L_WHOIS_MODER", "Moderateur");
define("L_WHOIS_MODERS", "Modérateurs");
define("L_WHOIS_OTHERS", "Autres utilisateurs");
define("L_WHOIS_USER", "Utilisateur");
define("L_WHOIS_GUEST", "Invité");
define("L_WHOIS_REG", "Inscrit");
define("L_WHOIS_BOT", "Robot");

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s entre dans ce salon.");
define("L_EXIT_ROM", "%s sort de ce salon.");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s a été automatiquement déconnecté de ce salon pour cause d’inactivité.");
define("L_CLOSED_ROM", "%s a fermé son navigateur.");

// Text for /away command notification string:
define("L_AWAY", "%s s’est éloigné de son ordinateur...");
define("L_BACK", "%s est de retour!");

// Quick Menu mod
define("L_QUICK", "Menu Rapide");

// Topic Banner mod
define("L_TOPIC", "a défini le sujet du salon à : ");
define("L_TOPIC_RESET", "a réinitialisé le sujet du salon");
define("L_HELP_TOP", "au moins 2 mots pour le sujet du salon");
define("L_BANNER_WELCOME", "Bienvenue sur %s!");
define("L_BANNER_TOPIC", "Sujet :");
define("L_DEFAULT_TOPIC_1", "Sujet par défaut. Editer localization/_owner/owner.php pour le modifier!");

// Img cmd mod
define("L_PIC", "Image postée par");
define("L_PIC_RESIZED", "Redimensionnée à");
define("L_HELP_IMG", "chemin complet de l’image qui doit être postée");
define("L_NO_IMAGE", "Ce n’est pas une adresse valide pour une image publique distante.\\nVeuillez réessayer!");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s n’est plus modérateur pour tous les salons de ce chat.");
define("L_IS_NO_MODERATOR", "%s n’est pas modérateur.");
define("L_ERR_IS_ADMIN", "%s est administrateur!\\nVous ne pouvez pas changer ses permissions.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "Commandes supplémentaires disponibles:");
define("INFO_MODS", "Fonctions/Modes supplémentaires disponibles:");
define("INFO_BOT", "Notre robot disponible est:");

// Profile mod
define("L_PRO_1", "Langues parlées");
define("L_PRO_1a", "Langue");
define("L_PRO_2", "URL favorite 1");
define("L_PRO_3", "URL favorite 2");
define("L_PRO_4", "Description");
define("L_PRO_5", "URL de votre photo");
define("L_PRO_6", "Couleur de nom/texte");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "URL invalide ou hôte inexistant.");
define("L_TITLE_AV", "Votre avatar actuel: ");
define("L_CHG_AV", "Cliquez sur \"".L_REG_16."\" dans le formulaire d’édition de votre profil<br />pour enregistrer votre avatar.");
define("L_SEL_NEW_AV", "Sélectionnez un nouvel avatar");
define("L_EX_AV", "exemple");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Tapez l’URL, puis Entrée pour visualiser)");
define("L_CANCEL", "Annuler");
define("L_AVA_REG", "Vous devez être inscrit\\npour modifier l’image de votre avatar");
define("L_SEL_NEW_AV_CONFIRM", "Ce formulaire n’a pas été validé.\\nSi vous accédez maintenant aux avatars, vous allez perdre\\ntoutes les modifications effectuées jusqu’ici!\\n\\nÊtes-vous sûr?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "Astuce: Notre robot est actif de façon publique pour ce salon. Pour commencer à parler au robot, tapez <b>hello ".C_BOT_NAME."</b>. Pour terminer la conversation, tapez : <b>bye ".C_BOT_NAME."</b>. (en privé : /to <b>".C_BOT_NAME."</b> Message)"); //faites attention à ce que votre traduction ne soit pas trop longue, le texte doit tenir en une ligne dans la bannière (sous le sujet du salon)
define("BOT_PRIV_TIPS", "Astuce: Notre robot est actif de façon publique dans le salon %s. Vous pouvez dialoguer uniquement en privé en cliquant sur son nom et en <i>murmurant</i>. (commande: /wisp <b>".C_BOT_NAME."</b> Message)"); //faites attention à ce que votre traduction ne soit pas trop longue, le texte doit tenir en une ligne dans la bannière (sous le sujet du salon)
define("BOT_PRIVONLY_TIPS", "Astuce: Notre robot n’est pas actif de façon publique. Vous pouvez dialoguer uniquement en privé en cliquant sur son nom. (commandes: /to <b>".C_BOT_NAME."</b> Message ou /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Le robot n’est pas actif sur ce salon!");
define("BOT_START_ERROR", "Le robot est déjà actif sur ce salon!");
define("BOT_DISABLED_ERROR", "Le robot a été désactivé par l’administrateur!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "lance les dés, voici les résultats :");
define("DICE_WRONG", "Vous devez sélectionner le nombre de dés que vous voulez lancer\\n(Choisissez un nombre entre 1 et ".MAX_ROLLS.").\\nTapez simplement /dice pour lancer les ".MAX_ROLLS." dés.");
define("DICE2_WRONG", "Le deuxième paramètre doit être entre 1 et ".MAX_ROLLS.".\\nLaisser à vide pour utiliser les ".MAX_ROLLS." dés\\n(e.g. /".MAX_DICES."d ou /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Le premier paramètre doit être entre 1 et ".MAX_DICES.".\\n(ex. /".MAX_DICES."d ou /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Le premier paramètre (d) doit être entre 1 et 100.\\nLe deuxième paramètre (t) doit être entre 1 et ".MAX_ROLLS.".\\nnLaisser à vide pour utiliser les ".MAX_ROLLS." dés\\n(ex. /d50 ou /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "ouvre la boîte de dialogue pour les messages privés");
define("L_REG_POPUP_NOTE", "Vous devez désactiver la fonction de blocage de pop-up<br />de votre navigateur pource site!");
define("L_PRIV_POST_MSG", "Envoie un message privé!");
define("L_PRIV_MSG", "Un nouveau message privé est arrivé!");
define("L_PRIV_MSGS", "%s nouveau messages privé est arrivé!");
define("L_PRIV_MSGSa", "Voici les 10 premiers messages!<br />Cliquer sur le lien plus bas pour voir la suite.");
define("L_PRIV_MSG1", "De:");
define("L_PRIV_MSG2", "Salon:");
define("L_PRIV_MSG3", "A:");
define("L_PRIV_MSG4", "Message:");
define("L_PRIV_MSG5", "Posté:");
define("L_PRIV_REPLY", "Répondre");
define("L_PRIV_READ", "Cliquez sur le bouton ’".L_REG_25."’ pour marquer comme lus tous les messages!");
define("L_PRIV_POPUP", "Vous pouvez désactiver/ré-activer cette fonction de popup<br />en éditant votre");
define("L_PRIV_POPUP1", "Profil</a> (pour les utilisateurs inscrits uniquement)");
define("L_NOT_ONLINE", "%s n’est pas connecté actuellement.");
define("L_PRIV_NOT_ONLINE", "%s n’est pas connecté actuellement,\\nmais recevra votre message à sa prochaine connexion.");
define("L_PRIV_NOT_INROOM", "%s n’est pas dans ce salon.\\nSi vous voulez lui envoyer un message privé,\\nutilisez la commande: /wisp %s message.");
define("L_PRIV_AWAY", "%s s’est déclaré éloigné de son ordinateur,\\nmais il recevra votre message\\ndès son retour.");
define("PM_DISABLED_ERROR", "Le Murmure (messages privés)\na été désactivé sur ce chat.");
define("L_NEXT_PAGE", "Aller à la page suivante");
define("L_NEXT_READ", "Lire les %s suivants"); // message / 10 messages
define("L_ROOM_ALL", "Tous les salons");
define("L_PRIV_NO_MSGS", "Aucun message privé reçu");
define("L_PRIV_READ_MSG", "1 message privé reçu"); //singular
define("L_PRIV_READ_MSGS", "%s messages privés reçus"); //plural
define("L_PRIV_MSGS_NEW", "Nouveau"); //singular form
define("L_PRIV_MSGS_READ", "Lu"); //singular form
define("L_PRIV_MSG6", "Statut:");
define("L_PRIV_RELOAD", "Actualiser");
define("L_PRIV_MARK_ALL", "Marquer comme Lu");
define("L_PRIV_MARK_SEL", "Marquer la sélection comme Lu");
define("L_PRIV_REMOVE", "Supprimer les messages sélectionnés"); // or selected
define("L_PRIV_PM", "(privé)");
define("L_PRIV_WISP", "(murmure)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "Activé");
define("L_DISABLED", "Désactiv");
define("L_COLOR_HEAD_SETTINGS", "Paramètres actuels sur ce serveur:");
define("L_COLOR_HEAD_SETTINGSa", "Couleurs par défaut:");
define("L_COLOR_HEAD_SETTINGSb", "Couleur par défaut:");
define("L_COL_HELP_TITLE", "Palette de couleurs");
define("L_COL_HELP_SUB1", "Usage:");
define("L_COL_HELP_P1", "Vous pouvez sélectionner vos propres couleurs par défaut en éditant votre profil (même couleur que celle de votre nom d’utilisateur). Vous aurez toujours la possibilité de choisir une autre couleur. Pour revenir à votre couleur par défaut, vous devez la ré-appliquer (Null) - elle est en première position dans la liste déroulante.");
define("L_COL_HELP_SUB2", "Conseil:");
define("L_COL_HELP_P2", "<u>Palette de couleurs</u><br />Selon les possibilités de votre navigateur/OS, il est possible que certaines couleurs n’apparaissent pas. Seuls les 16 noms de couleurs suivants sont supportés par les standards W3C HTML 4.0 :");
define("L_COL_HELP_P2a", "Si un utilisateur se plaint de ne pas voir la couleur que vous avez sélectionnée, cela signifie qu’il utilise probablement une ancienne version de navigateur.");
define("L_COL_HELP_SUB3", "Paramètres définis sur ce chat :");
define("L_COL_HELP_P3", "<u>Usage des couleurs selon le niveau d’habilitation</u>:<br />1. l’Administrateur peut utiliser n’importe quelle couleur.<br />La couleur par défaut pour l’administrateur est le <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Les Moderateurs peuvent utiliser toutes les couleurs sauf le <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> et le <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />La couleur par défaut pour les modérateurs est le <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Les autres utilisateurs peuvent utiliser toutes les couleurs sauf le <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, le <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, le <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> et le <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "La couleur par défaut est le <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Point technique</u>: ces couleurs ont été définies par l’administrateur.<br />Si l’affichage n’est pas bon ou si vous n’aimez pas les couleurs par défaut, vous pouvez contacter l’administrateur en premier lieu, et non pas les autres utilisateurs de votre salon. :-)");
define("L_COL_HELP_USER_STATUS", "Votre statut");
define("L_COL_TUT", "Utilisation de texte en couleur sur le chat");
define("L_NULL", "Aucun");
define("L_NULL_F", "Aucune"); // feminine word, if it's the case
define("L_ROOM_COLOR", "couleur du salon");
define("L_PRO_COLOR", "couleur du profil");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Seul l’administrateur peut utiliser le ".COLOR_CA."!\\n\\nVotre couleur de texte a été réinitialisée à ".COLOR_CM."!\\n\\nMerci de choisir une autre couleur.");
define("COL_ERROR_BOX_USRA", "Seul l’administrateur peut utiliser le ".COLOR_CA."!\\n\\nN’essayez pas d’utiliser le ".COLOR_CA.", le ".COLOR_CA1.", le ".COLOR_CM." ou le ".COLOR_CM1.".\\n\\nCes couleurs sont réservées aux utilisateurs avec pouvoir!\\n\\nVotre couleur de texte a été réinitialisée à ".COLOR_CD."!\\n\\nMerci de choisir une autre couleur.");
define("COL_ERROR_BOX_USRM", "Vous devez être modérateur pour utiliser le ".COLOR_CM."!\\n\\nN’essayez pas d’utiliser le ".COLOR_CA.", le ".COLOR_CA1.", le ".COLOR_CM." ou le ".COLOR_CM1.".\\n\\nCes couleurs sont réservées aux utilisateurs avec pouvoir!\\n\\nVotre couleur de texte a été réinitialisée à ".COLOR_CD."!\\n\\nMerci de choisir une autre couleur.");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "Bienvenue sur notre chat. Merci de respecter l’Etiquette de ce chat: <I>essayez d’être aimable et poli</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Les paramètres de ce chat viennent d’être modifiés. Pour éviter les dysfonctionnements, merci de réactualiser votre navigateur (tapez la touche F5 ou bien déconnectez/reconnectez-vous).");

//Size command error by Ciprian
define("L_ERR_SIZE", "Les valeurs possibles de la taille de caractère sont \\n\"null\" (pour réinitialiser à la valeur par défaut) ou entre 7 et 15");

// Password reset form by Ciprian
define("L_PASS_0", "Changer votre mot de passe");
define("L_PASS_1", "Question secrète");
define("L_PASS_2", "Quelle était votre première voiture?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "Le nom de votre premier animal?"); //  (de compagnie) Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "Quelle est votre boisson préférée?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "Quelle est votre date de naissance?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "Réponse secrète");
define("L_PASS_7", "Changer votre mot de passe");
define("L_PASS_8", "Votre mot de passe a été changé avec succès.");
define("L_PASS_9", "Votre nouveau mot de passe pour accéder au chat");
define("L_PASS_10", "Votre nouveau mot de passe pour accéder au chat: %s");
define("L_PASS_11", "Bienvenue de retour sur notre chat!");
define("L_PASS_12", "Choisissez votre question ...");
define("L_ERR_PASS_1", "Nom d’utilisateur incorrect. Utilisez le vôtre.");
define("L_ERR_PASS_2", "E-mail invalide. Essayez encore!");
define("L_ERR_PASS_3", "Question secrète incorrecte.<br />Répondez à celle indiquée ci-dessous!");
define("L_ERR_PASS_4", "Réponse secrète invalide. Essayez encore!");
define("L_ERR_PASS_5", "Vous n’avez pas saisi vos informations personnelles.");
define("L_ERR_PASS_6", "Vous n’avez pas encore saisi vos informations personnelles.<br />Vous ne pouvez pas utiliser ce formulaire. Contactez l’administrateur!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s a été promu administrateur de ce chat.");
define("L_ADM_4", "%s n’est plus administrateur de ce chat.");

// Open Schedule by Ciprian
define("L_DAILY", "Quotidien");
define("L_ALWAYS", "toujours");
define("L_OPEN", "Ouvert");
define("L_CLOSED", "Fermé");
define("L_OPEN_PUB", "OUVERT AU PUBLIC");
define("L_CLOSED_PUB", "FERME AU PUBLIC");

// Links popup page by Alex
define("L_LINKS_1", "Liens postés");
define("L_LINKS_2", "Ici, vous pouvez accéder aux liens postés");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Cliquer ici %s %s");
define("L_CLICK", "Cliquer ici %s");
define("L_LINKS_3", "pour ouvrir le lien");
define("L_LINKS_4", "pour aller sur le site de l’auteur");
define("L_LINKS_5", "pour insérer ce smiley");
define("L_LINKS_6", "pour contacter");
define("L_LINKS_7", "pour visiter le site phpMyChat");
define("L_LINKS_8", "pour vous joindre au Groupe phpMyChat");
define("L_LINKS_9", "pour envoyer votre retour sur phpMyChat");
define("L_LINKS_10", "pour télécharger phpMyChat Plus");
define("L_LINKS_11", "pour voir qui est présent actuellement sur le chat");
define("L_LINKS_12", "pour aller à la page de connexion du Chat");
define("L_LINKS_13", "pour jouer ce son"); // can also be translated as "to play this sound"
define("L_LINKS_14", "pour utiliser cette commande");
define("L_LINKS_15", "pour ouvrir");
define("L_LINKS_16", "Galerie de Smiley");
define("L_LINKS_17", "pour trier par ordre croissant");
define("L_LINKS_18", "pour trier par ordre décroissant");
define("L_LINKS_19", "pour définir/modifier votre Gravatar");
define("L_SWITCH", "Basculer en"); // E.g. "Switch to Italian" (Country Flags mouseover / Language switching)
define("L_SELECTED", "sélectionné"); // E.g. "French - selected" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", "sélectionnée"); // feminine word, if it's the case
define("L_NOT_SELECTED", "non sélectionné");
define("L_NOT_SELECTED_F", "non sélectionnée"); // feminine word, if it's the case
define("L_EMAIL_1", "pour envoyer un e-mail");
define("L_FULLSIZE_PIC", "pour ouvrir cette image dans sa taille originale");
define("L_PRIVACY", "pour lire notre Politique de Confidentialité"); //Click here to…
define("L_AUTHOR", "l’auteur"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "le développeur de ce chat"); //same here
define("L_OWNER", "le propriétaire de ce chat"); //same here
define("L_TRANSLATOR", "le traducteur"); //same here

// Counter on login
define("L_VISITOR_REPORT", "... visiteurs depuis %s");

// Status bar messages
define("L_JOIN_ROOM", "Se connecter à ce salon");
define("L_USE_NAME", "Utiliser ce pseudo");
define("L_USE_NAME1", "S’adresser à cet utilisateur");
define("L_WHSP", "Murmurer");
define("L_SEND_WHSP", "Envoyer un murmure");
define("L_SEND_PM_1", "Envoyer un message privé");
define("L_SEND_PM_2", "Envoyer un message privé");
define("L_HIGHLIGHT", "Surligner/Dé-Surligner");
define("L_HIGHLIGHT_SB", "Surligner/Dé-Surligner les messages de cet utilisateur");

//Lurking frame popup
define("L_LURKING_2", "Page de Lurking");
define("L_LURKING_3", "est en train de lire la page de lurking");
define("L_LURKING_4", "connecté le");
define("L_LURKING_5", "Inconnu");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Options supplémentaires");
define("L_ARCHIVE", "Ouvrir une archive");
define("L_SOUNDFIX_IE_1", "Correctif son pour IE");
define("L_SOUNDFIX_IE_2", "Télécharger un correctif son pour IE");
define("L_LURKING_1", "Ouvrir la page des rôdeurs (lurking)");
define("L_REG_BRB", "Je serai bientôt de retour (vous devez d’abord vous enregistrer)");
define("L_DEL_BYE", "ne m’attendez pas");
define("L_EXTRA_PRIV1", "Messages lus"); // keep it short
define("L_EXTRA_PRIV2", "Nouveaux messages"); // keep it short

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Janvier");
define("L_FEB", "Février");
define("L_MAR", "Mars");
define("L_APR", "Avril");
define("L_MAY", "Mai");
define("L_JUN", "Juin");
define("L_JUL", "Juillet");
define("L_AUG", "Août");
define("L_SEP", "Septembre");
define("L_OCT", "Octobre");
define("L_NOV", "Novembre");
define("L_DEC", "Décembre");
// Months Short Names
define("L_S_JAN", "Janv.");
define("L_S_FEB", "Févr.");
define("L_S_MAR", "Mars");
define("L_S_APR", "Avr.");
define("L_S_MAY", "Mai");
define("L_S_JUN", "Juin");
define("L_S_JUL", "Juil.");
define("L_S_AUG", "Août");
define("L_S_SEP", "Sept.");
define("L_S_OCT", "Oct.");
define("L_S_NOV", "Nov.");
define("L_S_DEC", "Déc.");
// Week days Long Names
define("L_MON", "Lundi");
define("L_TUE", "Mardi");
define("L_WED", "Mercredi");
define("L_THU", "Jeudi");
define("L_FRI", "Vendredi");
define("L_SAT", "Samedi");
define("L_SUN", "Dimanche");
// Week days Short Names
define("L_S_MON", "Lun.");
define("L_S_TUE", "Mar.");
define("L_S_WED", "Mer.");
define("L_S_THU", "Jeu.");
define("L_S_FRI", "Ven.");
define("L_S_SAT", "Sam.");
define("L_S_SUN", "Dim.");

// Localized date format
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "fra_fra.UTF-8", "french.UTF-8", "french");
} else {
setlocale(LC_ALL, "fr_FR.UTF-8", "fr.UTF-8", "fr_FR.UTF-8@euro"); // For French formats
}
define("L_LANG", "fr_FR");
define("ISO_DEFAULT", "iso-8859-1");
define("WIN_DEFAULT", "windows-1252");
define("L_SHORT_DATE", "%Y-%m-%d"); //Change this to your local desired date only format (keep the short form)
define("L_LONG_DATE", "%A, %d %B %Y"); //Change this to your local desired date only format (keep the long form)
define("L_SHORT_DATETIME", "%Y-%m-%d %H:%M:%S"); //Change this to your local desired date&time format (keep the short form)
define("L_LONG_DATETIME", "%A, %d %B %Y %H:%M:%S"); //Change this to your local desired date&time format (keep the long form)
define("L_CAL_FORMAT", "%d %B %Y"); // Calendar format

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN", "utilisateurs sont sur le ".LOGIN_LINK."chat</A> actuellement.");
define("USERS_LOGIN", "1 utilisateur est sur le ".LOGIN_LINK."chat</A> actuellement.");
define("NO_USER", "Personne sur le ".LOGIN_LINK."chat</A> actuellement.");
define("L_PRIV_REPLY_LOGIN", "Connectez-vous au chat si vous voulez ".LOGIN_LINK."poster une réponse</A> à l’un des nouveaux messages privés ci-dessous");
// Language names
define("L_LANG_AR", "Espagnol Argentin");
define("L_LANG_BG", "Bulgare - Cyrillique");
define("L_LANG_BR", "Portugais Brésilien");
define("L_LANG_CZ", "Tchèque");
define("L_LANG_DA", "Danois");
define("L_LANG_EN", "Anglais"); // for admin panel only
define("L_LANG_ENUK", "Anglais UK"); // for UK formats and flags
define("L_LANG_ENUS", "Anglais US"); // for US formats and flags
define("L_LANG_ES", "Espagnol");
define("L_LANG_FR", "Français");
define("L_LANG_DE", "Allemand");
define("L_LANG_FA", "Perse (Farsi)");
define("L_LANG_GR", "Grec");
define("L_LANG_HE", "Hébreu");
define("L_LANG_HI", "Hindi");
define("L_LANG_HU", "Hongrois");
define("L_LANG_ID", "Indonésien");
define("L_LANG_IT", "Italien");
define("L_LANG_JA", "Japonais (Kanji)");
define("L_LANG_KA", "Géorgien");
define("L_LANG_NE", "Népalais");
define("L_LANG_NL", "Néerlandais");
define("L_LANG_RO", "Roumain");
define("L_LANG_SRL", "Serbe - Latin");
define("L_LANG_SRC", "Serbe - Cyrillique");
define("L_LANG_SK", "Slovaque");
define("L_LANG_SV", "Suédois");
define("L_LANG_TR", "Turque");
define("L_LANG_UR", "Ourdou"); //spoken in Pakistan
define("L_LANG_VI", "Vietnamien");

// Ghost mode by Ciprian
define("L_GHOST", "Fantôme");
define("L_SUPER_GHOST", "Super Fantôme");

// Skins preview page
define("L_SKINS_TITLE", "Prévisualisation des thèmes");
define("L_SKINS_TITLE1", "Prévisualisation des thèmes %s à %s"); // Skins 1 to 4 preview
define("L_SKINS_AV", "Thèmes disponibles");
define("L_SKINS_NONAV", "Il n’y a aucun style défini dans le répertoire \"skins\"");
define("L_SKINS_COPY", "&copy; %s Thème par %s");

// Swap image titles by Ciprian
define("L_GEN_ICON", "Icône du genre (masculin/féminin)");

// Ghost mode by Ciprian
define("L_GHOST", "Fantômas");
define("L_SUPER_GHOST", "Super Fantômas");
define("L_NO_GHOST", "Visible");

// Sorting options by Ciprian
define("L_ASC", "Croissant");
define("L_DESC", "Décroissant");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "Nombre total de visites"); // number of logins (returning visits) to chat

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "utiliser le Gravatar");

// Uploader mod by Ciprian - 11.08.2008
define("L_UPLOAD", "Téléchargements %s"); // Upload Image, Upload Sound or Upload File
define("L_UPLOAD_IMG", "Image"); // used to upload Avatars and /img command
define("L_UPLOAD_SND", "Son"); // used to upload Buzz sounds
define("L_UPLOAD_FLS", "Fichiers"); // used to upload multiple files at once
define("L_UPLOAD_SUCCESS", "Le fichier %s a été uploadé avec succès sous %s."); // original filename, destination filename
define("L_FILES_TITLE", "Gestion des téléchargements");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "Restreint");
define ( "L_RESTRICTED_ROM", "%s a été limité à partir de cette salon avec succès.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "Se connecter avec un identifiant OpenID");
define("L_OPID_REG", "Importer son profil OpenID");

// Support buttons
define("L_SUPP_WARN", "Vous avez choisi de contribuer au développement libre de\\n".APP_NAME." en faisant un don à l’auteur.\\nMerci pour votre encouragement!\\n\\nNote: le bénéficiaire n’est pas le propriétaire de ce chat.\\nVeuillez saisir le montant sur la page suivante.\\n\\nContinuer?");
define("L_SUPP_ALT", "Encouragez grâce à PayPal le développement de  ".APP_NAME." - c’est Rapide, Gratuit et Sécurisé!");

// Video & Audio & Youtube cmds (Embevi & YouTube player class) – same approach as in // Img cmd mod section!
define("L_AUDIO", "Fichier audio posté par");
define("L_VIDEO", "Vidéo postée par");
define("L_HELP_VIDEO", "chemin complet de la vidéo ou du son à poster");
define("L_NO_VIDEO", "Cette URL ne peut pas être insérée.\\nCe n’est pas une URL valide d’une source publique d’une vidéo ou d’un son.\\nEssayez encore!");
define("L_ORIG_VIDEO", "pour ouvrir le site de la source d’origine");
	
// Birthday mod - by Ciprian
define("L_PRO_7", "Date de naissance");
define("L_PRO_8", "publier la date de naissance en information publique");
define("L_PRO_9", "montrer l’âge en information publique ");	
define("L_PRO_10", "Age");
define("L_PRO_11", "%1\$d ans, %2\$d mois et %3\$d jours"); //you can also change the order here, but 1 stands for years, 2 for months and 3 for days
define("L_DOB_TIT_1", "Liste des anniversaires");
$L_DOB_SUBJ = "Bon Anniversaire %s!";
?>