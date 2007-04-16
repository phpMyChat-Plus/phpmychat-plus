<?php
// File : french/localized.chat.php - plus version (14.04.2007 - rev.17)
// Translation by Lo�c Chapeaux <lolo@phpheaven.net>
// Updates, corrections and additions for the Plus version by Leloup <leloup@le-loup.info> and Christophe Luke <christophe.lucsky@gmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>)

// extra header for Charset
$Charset = "iso-8859-1";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Les Messages sont effac�s apr�s");
define("L_WEL_2", "et les usagers inactifs apr�s");

define("L_CUR_1", "Il y a");
define("L_CUR_1a", "actuellement");
define("L_CUR_1b", "actuellement");
define("L_CUR_2", "sur le chat");
define("L_CUR_3", "Utilisateurs actuellement dans le salon");
define("L_CUR_4", "utilisateurs dans des salons priv�");
define("L_CUR_5", "utilisateurs qui espionnent actuellement<br>(monitoring this page):");

define("L_SET_1", "S&prime;il vous plait deffinissez ...");
define("L_SET_2", "votre pseudo");
define("L_SET_3", "le nombre de messages � afficher");
define("L_SET_4", "le timeout avant chaque update");
define("L_SET_5", "Choisissez un salon ...");
define("L_SET_6", "salon public par d�faut");
define("L_SET_7", "Faites votre choix ...");
define("L_SET_8", "salon priv� cr�� par un utilisatteur");
define("L_SET_9", "cr��r votre propre salon");
define("L_SET_10", "public");
define("L_SET_11", "priv�");
define("L_SET_12", "");
define("L_SET_13", "Enfin");
define("L_SET_14", "chatez");
define("L_SET_15", "salon priv� par d�faut");
define("L_SET_16", "salon priv� cr�� par un utilisateur");
define("L_SET_17", "Choisissez votre avatar");
define("L_SET_18", "Ajouter dans vos favoris en appuyant sur \"CTRL +D\".");

define("L_SRC", "se trouve gratuitement sur");

define("L_SECS", "seconds");
define("L_MIN", "minute");
define("L_MINS", "minutes");
define("L_HOUR", "heur");
define("L_HOURS", "heures");

// registration stuff:
define("L_REG_1", "votre mot de passe");
define("L_REG_2", "Gestion de compte");
define("L_REG_3", "Enregistrement");
define("L_REG_4", "Editez votre profil");
define("L_REG_5", "Effacer l&prime;utilisateur");
define("L_REG_6", "enregistrement de l&prime;utilisateur");
define("L_REG_7", "seulement si vous etes enregistr�");
define("L_REG_8", "votre e-mail");
define("L_REG_9", "Vous avec �t� correctement enregistr�.");
define("L_REG_10", "Retour");
define("L_REG_11", "Editer");
define("L_REG_12", "Modifier les informations Utilisateur");
define("L_REG_13", "effacer un utilisateur");
define("L_REG_14", "Login");
define("L_REG_15", "Log In");
define("L_REG_16", "Changer");
define("L_REG_17", "Votre porofile a �t� correctement modifi�.");
define("L_REG_18", "Vous avez �t� eject� du salon par le moderateur du salon.");
define("L_REG_18a", "Vous avez �t� eject� du salon par le moderateur du salon.<br>Raison: %s");
define("L_REG_19", "Voulez vous vraiment �tre supprim�?");
define("L_REG_20", "Oui");
define("L_REG_21", "Vous avez �t� correctement supprim�.");
define("L_REG_22", "Non");
define("L_REG_25", "Fermer");
define("L_REG_30", "Pr�nom");
define("L_REG_31", "Nom");
define("L_REG_32", "WEB");
define("L_REG_33", "montrer l&prime;e-mail dans les informations publiques");
define("L_REG_34", "Editer le profil Utilisateur");
define("L_REG_35", "Administration");
define("L_REG_36", "Localisation/Pays");
define("L_REG_37", "Les champs avec un <span class=\"error\">*</span> doivent etre complet�s.");
define("L_REG_39", "Le salon dans le quel vous trouvez a �t� supprim� par l&prime;administrateur.");
define("L_REG_45", "genre");
define("L_REG_46", "masculin");
define("L_REG_47", "femminin");
define("L_REG_48", "indetermin�");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Vos parametres pour acceder au Chat");
define("L_EMAIL_VAL_2", "Bienvenue sur notre chat.");
define("L_EMAIL_VAL_Err", "Erreur interne, veuillez contacter l&prime;administrateur: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Votre mot de passe a �t� envoy� � votre adresse e-mail.<br>vous pouvez changer votre mot de passe, sur la page de login en editant votre profil.");

// admin stuff
define("L_ADM_1", "%s n&prime;est plus moderateur pour ce salon.");
define("L_ADM_2", "vous n&prime;etes plus un utilisateur enregistr�.");

// error messages
define("L_ERR_USR_1", "Ce pseudo est deja utilis� veuillez en choisir un autre.");
define("L_ERR_USR_2", "Vous devez choisir un pseudo.");
define("L_ERR_USR_3", "Ce pseudo est celui d&prime;un utilisateur enregistr�.<br>Veuillez saisir votre mot de passe ou choisissez un autre pseudo.");
define("L_ERR_USR_4", "Vous avez saisi un mauvais mot de passe.");
define("L_ERR_USR_5", "Vous devez saisir votre pseudo.");
define("L_ERR_USR_6", "Vous devez saisir votre mot de passe.");
define("L_ERR_USR_7", "Vous devez saisir votre e-mail.");
define("L_ERR_USR_8", "Vous devez taper une adresse e-mail valide.");
define("L_ERR_USR_9", "Ce pseudo est deja utilis�.");
define("L_ERR_USR_10", "Mauvais pseudo ou mot de passe.");
define("L_ERR_USR_11", "R�serv� � l&prime;administrateur.");
define("L_ERR_USR_12", "Vous etes l&prime;administrateur, aussi vous ne pouvez pas etre supprim�.");
define("L_ERR_USR_13", "Pour cr��r votre propre salon vous devez etre enregisr�.");
define("L_ERR_USR_14", "Vous devez etre enregistrer avant de pouvoir chatter.");
define("L_ERR_USR_15", "Vous devez saisir votre nom complet.");
define("L_ERR_USR_16", "Seul ces caracteres speciaux son autoris�:\\n".$REG_CHARS_ALLOWED."\\nEspace, virgule ou backslashes (\\) ne sont pas autoris�.\\nV�rifiez la syntaxe.");
define("L_ERR_USR_16a", "Seul ces caracteres speciaux son autoris�:<br />".$REG_CHARS_ALLOWED."<br />Espace, virgule ou backslashes (\\) ne sont pas autoris�. V�rifiez la syntaxe.");
define("L_ERR_USR_17", "Ce salon n&prime;existe pas est vous n&prime;etes pas abilit� pour en cr��r un.");
define("L_ERR_USR_18", "Un mot interdit a �t� detect� dans votre pseudo.");
define("L_ERR_USR_19", "Vous ne pouvez etre dans plus d&prime;un salon � la fois.");
define("L_ERR_USR_20", "Vous avez �t� banis de ce salon ou du Chat.");
define("L_ERR_USR_20a", "Vous avez �t� banis de ce salon ou du Chat.<br>Raison: %s");
define("L_ERR_USR_21", "Vous n&prime;avec pas �t� actif durant les ".C_USR_DEL." minutes,<br>dufait vous avez �t� sortis du salon.");
define("L_ERR_USR_22", "Cette commande n&prime;est pas accessible depuis \\nl&prime;explorateur que vous utilisez (IE engine).");
define("L_ERR_USR_23", "Pour acceder � un salon priv� vous devez etre enregistr�.");
define("L_ERR_USR_24", "Pour cr��r votre porpre salon priv� vous devez etre enregistr�.");
define("L_ERR_USR_25", "seul l' administrateur peu utiliser ".$COLORNAME." la couleur!<br>n&prime;essayez pas d&prime;utiliser ".COLOR_CA.", ".COLOR_CAS.", ".COLOR_CM." ou ".COLOR_CMS." (ou leur codes HEX correspondant).<br>Ils sont r�serv� aux utilisateur avec pouvoir!");
define("L_ERR_USR_26", "Seul l&prime;administrateur ou les moderateurspeuvent utiliser ".$COLORNAME." color!<br>n&prime;essayez pas d&prime;utiliser ".COLOR_CA.", ".COLOR_CAS.", ".COLOR_CM." ou ".COLOR_CMS." (ou leur codes HEX correspondant).<br>ils sont r�serv� aux utilisateurs avec pouvoir!");
define("L_ERR_USR_27", "Vous ne pouvez pas vous parler en priv�� vous meme.\\nFaites �a dans votre crane...\\nEssayez plutot un autre pseudo");
define("L_ERR_ROM_1", "Le nom des salons ne peu contenir des virgules ou des backslashes (\\).");
define("L_ERR_ROM_2", "Un mot interdit a �t� trouv� dans le nom du salon que vous essayez de cr��r.");
define("L_ERR_ROM_3", "Ce salon existe deja en tant que salon publique.");
define("L_ERR_ROM_4", "Nom de salon invalide.");

// users frame or popup
define("L_EXIT", "Exit Chat");
define("L_DETACH", "Detach Users list");
define("L_EXPCOL_ALL", "Ouvrir/Fermer tout");
define("L_CONN_STATE", "Rafrechir l&prime;etat de la connexion");
define("L_CHAT", "Chat");
define("L_USER", "utilisateur");
define("L_USERS", "utilisateurs");
define("L_LURKER", "espion");
define("L_LURKERS", "espions");
define("L_NO_USER", "Pas d&prime;utilisateur");
define("L_ROOM", "salon");
define("L_ROOMS", "salons");
define("L_EXPCOL", "Ouvrir/Fermer salon");
define("L_BEEP", "Beep/pas de beep � l&prime;arriv� d&prime;un utilisateur");
define("L_profil", "Afficher le profil");
define("L_NO_profil", "Pas de profil");

// input frame
define("L_HLP", "Aide");
define("L_BAD_CMD", "Ce n&prime;est pas une commande valide!");
define("L_ADMIN", "%s est deja administrateur!");
define("L_IS_MODERATOR", "%s est deja moderateur!");
define("L_NO_MODERATOR", "seul le moderateur de ce salon peut utiliser cette commande.");
define("L_MODERATOR", "%s est maintenant moderateur de ce salon.");
define("L_NONEXIST_USER", "%s Dans le salon en cour.");
define("L_NONREG_USER", "%s n&prime;est pas enregistr�.");
define("L_NONREG_USER_IP", "son IP est: %s.");
define("L_NO_KICKED", "%s est moderateur ou administrateur et ne peut etre Kick�.");
define("L_KICKED", "%s � �t� Kick� avec succes.");
define("L_KICKED_REASON", "%s � �t� Kick� avec succes. (Raison: %s)");
define("L_NO_BANISHED", "%s est moderateur ou administrateur et ne peut etre Banis.");
define("L_BANISHED", "%s � �t� Banis avec succes.");
define("L_BANISHED_REASON", "%s � �t� Banis avec succes. (Raison: %s)");
define("L_SVR_TIME", "Heure du serveur: ");
define("L_NO_SAVE", "Aucun messages � sauvegarder!");
define("L_NO_ADMIN", "Seul l&prime;administrateur peu utiliser cette commande.");
define("L_NO_REG_USER", "Vous devez etre enregistr� sur ce chat pour utiliser cette commande.");
define("L_ANNOUNCE", "ANNOUNCE");
define("L_INVITE", " %s Vous propose de le rejoindre sur le salon <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> .");
define("L_INVITE_REG", " Vous devez etre enregistr� pour acceder a ce salon .");
define("L_INVITE_DONE", "Votre invitation a �t� envoy� � %s.");
define("L_OK", "Send");
define("L_BUZZ", "Galerie des Buzzs");

// help popup
define("L_HELP_TIT_1", "Smilies");
define("L_HELP_TIT_2", "Format du texte pour les messages");
define("L_HELP_FMT_1", "Vous pouvez utiliser du gras, italic ou soulign� dans les messages en encadrant la partie du texte de vos messages avec l'une ou l&prime;autre des balises suivantes &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; or &lt;U&gt; &lt;/U&gt; .<br>PAr exemple, &lt;B&gt;this text&lt;/B&gt; donne <B>this text</B>.");
define("L_HELP_FMT_2", "Pour cr��r des Hyperliens (pour les e-mail ou URL) dans vos messages, tapez simplement les differantes adresses dans la fenetre de saisie, l&prime;hypertexte serra automatiquement g�n�r�.");
define("L_HELP_TIT_3", "Commandes");
define("L_HELP_NOTE", "Toutes les commandes doivent �tre saisies en Anglais!");
define("L_HELP_USR", "utilisateur");
define("L_HELP_MSG", "message");
define("L_HELP_ROOM", "salon");
define("L_HELP_BUZZ", "~soundname");
define("L_HELP_REASON", "la raison");
define("L_HELP_CMD_0", "{} represente une donn�e obligatoire, [] represente une donn�e facultative.");
define("L_HELP_CMD_1a", "Selectionner le nombre de messages � afficher. Le minimum ainsi que la valeur par d�faut est de 5.");
define("L_HELP_CMD_1b", "Rafrechir la fenetre des messaages et afficher les n derniers messages. Le minimum ainsi que la valeur par d�faut est de 5.");
define("L_HELP_CMD_2a", "Modifier le delais de rafrechissement de la liste des messages (en secondes).<br>Si n n&prime;est pas sp�cifi� ou inferieur � 3, le choix sera fait entre pas de rafrechissement et 10s de rafrechissement.");
define("L_HELP_CMD_2b", "Modifier le delais de rafrechissement de la liste utilisateurs et des messages (en secondes).<br>Si n n&prime;est pas sp�cifi� ou inferieur � 3, le choix sera fait entre pas de rafrechissement et 10s de rafrechissement.");
define("L_HELP_CMD_3", "Changer l&prime;ordre des messages (pas dispo dans tout les explorateurs).");
define("L_HELP_CMD_4", "Joindre un autre salon, le cr��r si il n&prime;existe pas et si vous y etes autoris�.<br>n est egale � 0 pour les salons priv� et � 1 pour les publique, Le choix par d�faut etant de 1 si cella n&prime;a pas �t� sp�cifi�.");
define("L_HELP_CMD_5", "Quiter le salon apres avoir affich� un message optionnel.");
define("L_HELP_CMD_6", "Eviter d&prime;afficher un message � un utilisateur si son pseudo a �t� sp�cifi�.<br>Desselectionner le pseudo en retapant la commande mais en faisant pr�c�der le pseudo d&prime;un - (exemple: /ignore - pseudo).<br>Sans Pseudo, Cette commande ouvre un pops up qui affiche les pseudo � ignorer.");
define("L_HELP_CMD_7", "Biss (commande ou message).");
define("L_HELP_CMD_8", "Montrer/Cacher l&prime;heure devant les messages.");
define("L_HELP_CMD_9", "Kicker un utilisateur du chat. Cette commande peut uniquement etre utilis� par un moderateur.");
define("L_HELP_CMD_10", "Envoyer un message priv� � un utilisateur (Les autres ne le vois pas).");
define("L_HELP_CMD_11", "Afficher les informations sur l&prime;utilisateur sp�cifi�.");
define("L_HELP_CMD_12", "Ouvrir un pop up pour editer le profil d&prime;un utilisateur.");
define("L_HELP_CMD_13", "Bascule entre les usagers entrant ou sortant du salon en cour.");
define("L_HELP_CMD_14", "Permet a l&prime;administratuer ou au moderateur de promouvoir un utilisateur en tant que moderateur dans le salon.");
define("L_HELP_CMD_15", "Netoyer la fenetre de messages pour n&prime;afficher que les 5 derniers.");
define("L_HELP_CMD_16", "Sauvegarder les n derniers messages (notifications excluses) dans un fichier HTML. Si n n&prime;est pas specifi�, tout les messages disponible seront pris en compte.");
define("L_HELP_CMD_17", "Permet a l&prime;administrateur de faire des annonces � tout les usagers dans tout les salons.");
define("L_HELP_CMD_18", "Invite un utilisateur a vous rejoindre dan sle salon o� vous vous trouvez.");
define("L_HELP_CMD_19", "Permet aux moderateurs d&prime;un salon ou l&prime;administrateur de \"Banir\" un utilisateur d&prime;un salon pour un temps defini par l&prime;administrateur.<br>Ce dernier peut Banir un utilisateur d&prime;un autre salon que celui dans lequel il se trouve et � utiliser '<B>&nbsp;*&nbsp;</B>' l&prime;option\"Pour toujours\" pour un utilisateur sur la totalit� du chat.");
define("L_HELP_CMD_20", "Decrivez ce que vous faites sans vous siter vous m�me.");
define("L_HELP_CMD_21", "Anounce le salon et les usager qui souhaitent vous envoyer un message<br> pendant que vous etes loin (away) de votre ordi. Lorsque vous revenez a votre ordi, pianotez simplement sur le clavier pour chatter.");
define("L_HELP_CMD_22", "envoyez un son ( buzz ) et un message optionnel dans le salon en cours.<br />- Utilisation:<br />- Ancienne Utilisation: \"/buzz\" ou \"/buzz message � afficher\" - Cela joue le son par d�faut deffini par dans le panneau d&prime;administration;<br />- Utilisation ettendu: \"/buzz ~nom_du_son\" or \"/buzz ~nom_du_son message � afficher\" - �a joue le fichier nom_du_son.wav du dossier plus/sounds; notez que le signe \"~\" au debut du second therme , qui est le nom du fichier son, sans l&prime;extantion .wav (seul les extention .wav sont autoris�).<br>Par d�faut c&prime;est une commande de moderateur ou administrateur.");
define("L_HELP_CMD_23", "Envoyer un <i>chuchotement</i> (message private). Le message va trouver la destination, sans tenir compte du salon ou se trouve l&prime;utilisateur. si l&prime;utilisateur est absent ou \"away\"vous en serrez averti.");
define("L_HELP_CMD_24", "Utilisation: la commande {topic} doit contenir au minimum 2 mots.<br>Cette commande change le topic du salon en cours. n&prime;essayez pas d'ecraser le Topic des autres utilisateurs. Utilisez un Topic interessant.<br>Par d�faut c&prime;est une commande de moderateur ou administrateur.<br>Utilisez la commande \"/topic top reset\" pour revenir au Topic par d�faut.");
define("L_HELP_CMD_25", "Un jeux de D�s pour tirer des nombres au hasar.<br>Utilisation: /dice ou /dice [n];<br>n peut prendre n&prime;importe quel valeur <b>entre 1 et %s</b> (cela repr�sente le numbre de d�s jou�). Si aucun numbre de d�s n&prime;est choisis, Par d�faut il serra lanc� le numbre de d�s maximum.");
define("L_HELP_CMD_26", "c&prime;est une version plus complexe de la commande /dice .<br>Utilisation: /{n1}d[n2] ou /{n1}d;<br>n1 peut prendre n&prime;importe quel valeur <b>entre 1 et %s</b> (cela represente le nombre de d�s lanc�).<br>n2 peut prendre n&prime;importe quel valeur <b>entre 1 et %s</b> (cela represente le nombre de d�s jou� � chaque lanc�).");
define("L_HELP_CMD_27", "Cela surligne les messages d&prime;un utilisateur sp�cifique, pour une lecture plus facile au milieu de la convessation.<br>Utilisation: /high {utilisateur} ou clikez sur le petit <img src=./images/highlightOff.gif> carr� � droite des noms des utilisateur dans la liste sur la droite");
define("L_HELP_CMD_28", "Cela permet d'envoyer <i>une simple image</i> comme un message.<br>utilisation: L'image doit etre sur internet et librement accessible. N'utilisez pas des pages qui necessitent un mot de passe.<br>Le lien complet de l'image doit etre saisi! E.g.<b>/img&nbsp;http://www.dlukic.com/chat/gray_wolf.jpg</b><br>Extention autoris�es: .jpg .bmp .gif .png. le lien est \"case sensitive\"!<br>EXP: saisissez /img un espace et copiez l' URL dans le champ; pour avoir l' URL d&prime;une image d&prime;une page web, quand vous clikez droit sur l'image, allez dans propri�t�s, surlignez l'URL en entieret faites un copier/coller apr�s le /img<br>n'utilisez pas d'images en provenance de votre PC: cela va juste arreter la fenetre du chat!!!");
define("L_HELP_CMD_29", "La seconde commandes permetra aux administrateurs ou moderateursd&prime;un salon encours de d�grade un autre utilisateur enregistr� qui avait �t� Promu moderateur pour ce m�me room.<br>l&prime;option * degradera un utilisateur de tout les salons.");
define("L_HELP_CMD_30", "La seconde commande fait la m�me chose que /me mais il montrera le genre de l&prime;utilisateur<br>i.e. * Mr Leloup regarde la T�l� ou Mrs Jamie est heureuse.");
define("L_HELP_CMD_31", "Change l&prime;ordre d&prime;affichage de laliste des Utilisateurs: par heure d&prime;arriver ou alphabetique.");
define("L_HELP_CMD_32", "c&prime;est une troisieme (jeux de role) version du jeux de d�s.<br>Utilisation: /d{n1}[tn2] ou /d{n1};<br>n1 peut prendre n&prime;importe quel valeur <b>entre 1 et 100</b> (represente le nombre de faces par d�s).<br>n2 peut prendre n&prime;importe quel valeur <b>entre 1 et %s</b> (cela represente le nombre de d�s jou� � chaque lanc�).");
define("L_HELP_CMD_33", "Change la taille des police de caractaires des messages dans la fenetre de dialogue (valeurs autoris�: <b>entre 7 et 15</b>); la commande /size remet la taille par d�faut (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Netiquette du chat");
define("L_HELP_ETIQ_2", "Ce chat n&prime;est pas un Chat Caramail ou Love@Lycos, Nous souhaitons avoir une communaut� paisible, sympatique et agr�able, Aussi, S&prime;il vous plait veuilez adh�rer aux r�gles suivantes. Si vous n&prime;arrivez pas � vous conformer a ses regles de simple politesse, un de nos moderateurs risque de vous ejecter du Chat.<br /><br>Merci,");
define("L_HELP_ETIQ_3", "Netiquette du Chat");
define("L_HELP_ETIQ_4", "Ne &quot;Spamez&quot; pas le chat en saisissant des phrases incomprehensible ou des lettres au hasard.</li><li>N'utilisez pas des caractaires aLtERnatIF</li><li>Utilisez les Majuscules avec moderation, elle sont utiliser pour signifier que l&prime;on crie</li><li>Gardez en memoire que les Utilisateurs peuvent venir de n&prime;importe quel coin du monde, et, probablement, vous rencontrerez des gens de differente provenance. S&prime;il vous plait soyez gentil et polis avec eux.</li><li>Ne soyez pas injurieux avec les autres utilisateurs. Dans tous les cas , veuillez ne pas utliser d' Injures ou autres Gros mot</li><li>n&prime;appellez pas les autres utilisateur par leur vrai Nom, il risquent de ne pas aprecier.Utilisez plut�t leur Pseudo.");

// messages frame
define("L_NO_MSG", "Il n&prime;y a actuellement aucun messages...");
define("L_TODAY_DWN", "Les messages post�s Aujourd'hui commencent en dessous");
define("L_TODAY_UP", "Les messages post�s Hier commencent en dessous");

// message colors
$TextColors = array(	"Noir" => "#000000",
				"Rouge vif" => "#FF0000",
				"Rouge" => "#990000",
				"Vert vif" => "#009900",
				"Vert" => "#006600",
				"Bleu vif" => "#0000FF",
				"Bleu lagon" => "#006699",
				"Bleu" => "#000099",
				"Violet" => "#9900FF",
				"Marron" => "#996633",
				"Carotte" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Ignor�");
define("L_IGNOR_NON", "Pas d&prime;utilisateur Ignor�");

// whois popup
define("L_WHOIS_ADMIN", "Administrateur");
define("L_WHOIS_MODER", "Moderateur");
define("L_WHOIS_USER", "Utilisateur");
define("L_WHOIS_GUEST", "Invit�");
define("L_WHOIS_REG", "Enregistr�");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s se joint � notre agr�able assembl�e" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s se joint � notre agr�able assembl�e");
define("L_ENTER_ROM_NOSOUND", "%s entre dans le salon");
define("L_EXIT_ROM", "%s nous a l�chement abandonn�");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s a �t� automatiquement �ject� du salon � cause d&prime;une trop longue innactivit�");
define("L_CLOSED_ROM", "%s a ferm� son explorateur");

// Text for /away command notification string:
define("L_AWAY", "%s est Away");
define("L_BACK", "%s est de retour!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**** Menu rapide ****");//&nbsp; means one blank space. this will center align the title of the drop list."

// Topic Banner mod
define("L_TOPIC", " a chang� le TOPIC en:");
define("L_TOPIC_RESET", " a reset� TOPIC");
define("L_HELP_TOP", "il faut au minimum 2 mots dans le topic");

// Img cmd mod
define("L_PIC", "Images envoy� par");
define("L_PIC_RESIZED", "Redimentionn� en");
define("L_HELP_IMG", "chemin complet de l&prime;image � afficher");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s n&prime;est pas moderateur.");
define("L_IS_NO_MOD_ALL", "%s n&prime;est plus moderateur d&prime;aucun salon du chat.");
define("L_ERR_IS_ADMIN", "%s est l&prime;administrateur!\\nVous ne pouvez pas changer ses fonctions.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra Commandes disponibles:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra Rubriques/Mods disponibles:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Notre bot est: </span><u>".C_BOT_NAME."</u>.");

// profil mod
define("L_PRO_1", "Langues parl�es");
define("L_PRO_2", "Lien pr�f�r� 1");
define("L_PRO_3", "Lien pr�f�r� 2");
define("L_PRO_4", "Description");
define("L_PRO_5", "URL d&prime;image");
define("L_PRO_6", "Votre nom couleur");

// Avatar mod
define("L_ERR_AV", "URL invalide ou serveur inexistant.");
define("L_TITLE_AV", "Votre avatar actuel: ");
define("L_CHG_AV", "Clickez 'Change' dans le formulaire de profil<br>pour stocker votre avatar.");
define("L_SEL_NEW_AV", "Selectionner un nouvel Avatar");
define("L_EX_AV", "(example: http://mysite/images/mypic.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Enter URL, ensuite tapez ENTER pour visualiser)");
define("L_CANCEL", "Abandonner");
define("L_CLICK", "Clickez ici");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: le bot du chat est publiquement actif dans ce salon. Pour commancer a parler avec lui/elle tapez <b>hello ".C_BOT_NAME.'</b>. Pour metre fin tapez: <b>bye '.C_BOT_NAME.'</b>. (priv�(PV): /to <b>'.C_BOT_NAME.'</b> Message)'); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)"
define("BOT_PRIV_TIPS", "TIPS: le bot du chat est publiquement actif dans le salon ".$R." . Vous pouvez seulement parler avec lui en Priv�, en chuchottant . (command: /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)"
define("BOT_PRIVONLY_TIPS", "TIPS: le bot du chat est publiquement actif. Vous pouvez seulement parler avec lui en Priv�. (commands: /to <b>".C_BOT_NAME."</b> Message or /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)"
define("BOT_STOP_ERROR", "Le bot n&prime;est pas present dans ce salon!");
define("BOT_START_ERROR", "Le bot est deja present dans ce salon!");
define("BOT_DISABLED_ERROR", "Le bot a �t� d�sactiv� du paneau d&prime;administration!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "lande d�s, le resultat est:");
define("DICE_WRONG", "Vous devez choisir combien de d�s vous vouler lancer\\n(Choisissez un nombre entre 1 et ".MAX_ROLLS.').\\nsaisissez seulement /dice tout les '.MAX_ROLLS.' d�s.');
define("DICE2_WRONG", "la seconde valeur doit etre entre 1 et ".MAX_ROLLS.'.\\nlaisser vide pour utiliser tout les '.MAX_ROLLS.' d�s\\n(e.g. /'.MAX_DICES.'d ou /'.MAX_DICES.'d'.MAX_ROLLS.').');
define("DICE2_WRONG1", "La premiere valeur doit etre entre 1 et ".MAX_DICES.'.\\n(e.g. /'.MAX_DICES.'d ou /'.MAX_DICES.'d'.MAX_ROLLS.').');
define("DICE3_WRONG", "la seconde valeur doit etre entre 1 et ".MAX_ROLLS.'.\\nlaisser vide pour utiliser tout les '.MAX_ROLLS.' d�s\\n(e.g. /d50 ou /d100t'.MAX_ROLLS.').');

// Log mod by Ciprian
define("L_ARCHIVE", "Ouvre les archives");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Ouvre un popup pour les messages priv�");
define("L_PRIV_POST_MSG", "Envoyer un message priv�!");
define("L_PRIV_MSG", "Nouveau message priv� re�u!");
define("L_PRIV_MSGS", "nouveau messages priv� re�u!");
define("L_PRIV_MSGSa", "Ici sont les 10 premiers messages!<br>Utiliser le bouton du lien pour voir le reste.");
define("L_PRIV_MSG1", "De:");
define("L_PRIV_MSG2", "Salon:");
define("L_PRIV_MSG3", "A:");
define("L_PRIV_MSG4", "Message:");
define("L_PRIV_MSG5", "Post�&nbsp;:");
define("L_PRIV_REPLY", "Repondre");
define("L_PRIV_READ", "Apuyer sur le bouton de fermeture pour marquer tout les messages comme lu!");
define("L_PRIV_POPUP", " Vous pouvez d�sactiver/r�-activer n&prime;importe quand ce popup de caracteristiques<br>en editant votre profil (seulement pour les utilisateur enregistr�s)");
define("L_NOT_ONLINE", "%s n&prime;est pas en ligne en ce momment.");
define("L_PRIV_NOT_ONLINE", "%s n&prime;est pas en ligne en ce momment,\\nmais il recevra votre message des qu&prime;il se loggera.");
define("L_PRIV_NOT_INROOM", "%s n&prime;est pas dans ce salon.\\nSi vous voulez envoyer un PV � cet utilisateur,\\nutiliser la commande: /wisp %s message.");
define("L_PRIV_AWAY", "%s est away,\\nmais il recevra votre message\\ndes qu&prime;il serra de retour.");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Actif" : "Inactif"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Actif" : "Inactif"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Parametre couran sur ce serveur</u>:<br>a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br>b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Couleur par d�faut</u>: Administrateur = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderateurs = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Utilisateurs = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Couleur par d�faut</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Chooser de Couleur");
define("L_COL_HELP_SUB1", "Utilisation:");
define("L_COL_HELP_P1", "You can select your own default color by editing your profile (the same color as your username color). You'll still be able to use any other color. To change back to your default color from a random used one, you have to chose once the default color (Null) - it is the first one in the select list.");
define("L_COL_HELP_SUB2", "Allusion:");
define("L_COL_HELP_P2", "<u>Tranche de Couleur</u><br>Cela depend des capacit�es de votre explorateur/OS, il est possible que certaines couleurs ne soient pas trancrites. Suel 16 nom de couleurs sont suport� par W3C HTML 4.0 standard:");
define("L_COL_HELP_P2a", "Si un utilisateur pretend ne pas voir votre couleur, c&prime;est qu&prime;il utilise probablement un ancien explorateur.");
define("L_COL_HELP_SUB3", "Param�trage deffini sur ce chat:");
define("L_COL_HELP_P3", "<u>Utilisation des Couleurs selon le grade</u>:<br>1. L&prime;administrateur peut les utiliser toutes.<br>La couleur par d�faut pour l&prime;admin est <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br>2. Les Moderateurs peuvent les utiliser toutes sauf <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> et <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br>La couleur par d�faut des Moderateurs est <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br>3. Les autres Utilisateurs peuvent utiliser toutes les couleurs sauf <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> et <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "La couleur par d�faut est <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Conseil technique</u>: Ces couleurs sont definis par l&prime;administrateur dans le paneau d&prime;administration .<br>Si qqch ne fonctionne pas correctement, ou si il y a qqch que vous n&prime;aimez pas, a propos de la couleur par d�faut, contactez l'<b>administrateur</b> en premier, et pas les autres utilisateur du salon. :-)");
define("L_COL_HELP_USER_STATUS", "Votre status");
define("L_COL_TUT", "Utilisez le code texte des couleurs");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Seul l&prime;administratuer peu utiliser la couleur ".COLOR_CA."!\\n\\nVotre derniere couleur serra remis en ".COLOR_CM."!\\n\\nveuillez en choisir une autre.");
define("COL_ERROR_BOX_USRA", "Seul l&prime;administratuer peu utiliser la couleur ".COLOR_CA."!\\n\\nn&prime;essayez pas d&prime;utiliser ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ou ".COLOR_CM1.".\\n\\nC&prime;est r�serv� aux utilisateurs avec pouvoir!\\n\\nVotre derniere couleur serra remis en ".COLOR_CD."!\\n\\nVeuillez en choisir une autre.");
define("COL_ERROR_BOX_USRM", "Vous devez etre Moderateur pour utiliser la couleur ".COLOR_CM."!\\n\\nn&prime;essayez pas d&prime;utiliser ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nC&prime;est r�serv� aux utilisateurs avec pouvoir!\\n\\nVotre derniere couleur serra remis en ".COLOR_CD."!\\n\\nVeuillez en choisir une autre.");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","Les utilisateurs ".LOGIN_LINK."chattent</A> en ce momment.</td></tr>");
define("USERS_LOGIN","1 l&prime;utilisateur ".LOGIN_LINK."chatt</A> en ce momment.</td></tr>");
define("NO_USER","Personne ne ".LOGIN_LINK."chatt</A> en ce momment.</td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Bienvenue sur le chat du loup. Veuillez suivre la Nettiquette: <I>Et restez calme en toutes circonstances</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Bienvenue sur le chat du loup. Veuillez suivre la Nettiquette: <I>Et restez calme en toutes circonstances</I>.");
define("WELCOME_MSG_NOSOUND", "Bienvenue sur le chat du loup. Veuillez suivre la Nettiquette: <I>Et restez calme en toutes circonstances</I>.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Chuchotement (Message priv�)\\na �t� d�sactiv� sur ce chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "La taille de la police de caractaire ne peu etre que\\nnule (pour reseter) ou entre 7 et 15");

// Send alert to users in chat when avatar enabled/disabled in admin panel
define("L_RELOAD_CHAT", "Le parametrage de ce serveur viens juste d'etre modifie. pour prevenir des malfonctions, S&prime;il vous plais, relancez votre navigateur (Appuyez sur la touche F5 ou Sortez et r�entrez sur le chat).");

// Week days for status worldtime by Ciprian
define("L_MON", "Lu"); //Lundi
define("L_TUE", "Ma"); //Mardi
define("L_WED", "Me"); //Mercredi
define("L_THU", "Je"); //Jeudi
define("L_FRI", "Ve"); //Vendredi
define("L_SAT", "Sa"); //Samedi
define("L_SUN", "Di"); //Dimanche

// Extra options by Ciprian
define("L_EXTRA_OPT", "Options supplementaire");
?>