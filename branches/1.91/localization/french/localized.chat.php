<?php
// File : french/localized.chat.php - plus version (27.05.2007 - rev.19)
// Translation by Loïc Chapeaux <lolo@phpheaven.net>
// Updates, corrections and additions for the Plus version by Leloup <leloup@le-loup.info> and Christophe Luke <christophe.lucsky@gmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>)

// extra header for Charset
$Charset = "utf-8";
require("localized.chatjs.php");

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutoriel");

define("L_WEL_1", "Les Messages sont effac&eacute;s apr&egrave;s");
define("L_WEL_2", "et les usagers inactifs apr&egrave;s");

define("L_CUR_1", "Il y a");
define("L_CUR_1a", "actuellement");
define("L_CUR_1b", "actuellement");
define("L_CUR_2", "sur le chat");
define("L_CUR_3", "Utilisateurs actuellement dans le salon");
define("L_CUR_4", "utilisateurs dans des salons priv&eacute;");
define("L_CUR_5", "utilisateurs qui espionnent actuellement<br />(monitoring this page):");

define("L_SET_1", "S&#39;il vous plait deffinissez ...");
define("L_SET_2", "votre pseudo");
define("L_SET_3", "le nombre de messages &agrave; afficher");
define("L_SET_4", "le timeout avant chaque update");
define("L_SET_5", "Choisissez un salon ...");
define("L_SET_6", "salon public par d&eacute;faut");
define("L_SET_7", "Faites votre choix ...");
define("L_SET_8", "salon priv&eacute; cr&eacute;&eacute; par un utilisatteur");
define("L_SET_9", "cr&eacute;&eacute;r votre propre salon");
define("L_SET_10", "public");
define("L_SET_11", "priv&eacute;");
define("L_SET_12", "");
define("L_SET_13", "Enfin");
define("L_SET_14", "chatez");
define("L_SET_15", "salon priv&eacute; par d&eacute;faut");
define("L_SET_16", "salon priv&eacute; cr&eacute;&eacute; par un utilisateur");
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
define("L_REG_5", "Effacer l&#39;utilisateur");
define("L_REG_6", "enregistrement de l&#39;utilisateur");
define("L_REG_7", "seulement si vous etes enregistr&eacute;");
define("L_REG_8", "votre e-mail");
define("L_REG_9", "Vous avec &eacute;t&eacute; correctement enregistr&eacute;.");
define("L_REG_10", "Retour");
define("L_REG_11", "Editer");
define("L_REG_12", "Modifier les informations Utilisateur");
define("L_REG_13", "effacer un utilisateur");
define("L_REG_14", "Login");
define("L_REG_15", "Log In");
define("L_REG_16", "Changer");
define("L_REG_17", "Votre porofile a &eacute;t&eacute; correctement modifi&eacute;.");
define("L_REG_18", "Vous avez &eacute;t&eacute; eject&eacute; du salon par le moderateur du salon.");
define("L_REG_18a", "Vous avez &eacute;t&eacute; eject&eacute; du salon par le moderateur du salon.<br />Raison: %s");
define("L_REG_19", "Voulez vous vraiment &ecirc;tre supprim&eacute;?");
define("L_REG_20", "Oui");
define("L_REG_21", "Vous avez &eacute;t&eacute; correctement supprim&eacute;.");
define("L_REG_22", "Non");
define("L_REG_25", "Fermer");
define("L_REG_30", "Pr&eacute;nom");
define("L_REG_31", "Nom");
define("L_REG_32", "WEB");
define("L_REG_33", "montrer l&#39;e-mail dans les informations publiques");
define("L_REG_34", "Editer le profil Utilisateur");
define("L_REG_35", "Administration");
define("L_REG_36", "Localisation/Pays");
define("L_REG_37", "Les champs avec un <span class=\"error\">*</span> doivent etre complet&eacute;s.");
define("L_REG_39", "Le salon dans le quel vous trouvez a &eacute;t&eacute; supprim&eacute; par l&#39;administrateur.");
define("L_REG_45", "Genre");
define("L_REG_46", "masculin");
define("L_REG_47", "femminin");
define("L_REG_48", "indetermin&eacute;");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Vos parametres pour acceder au Chat");
define("L_EMAIL_VAL_2", "Bienvenue sur notre chat.");
define("L_EMAIL_VAL_Err", "Erreur interne, veuillez contacter l&#39;administrateur: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Votre mot de passe a &eacute;t&eacute; envoy&eacute; &agrave; votre adresse e-mail.<br />vous pouvez changer votre mot de passe, sur la page de login en editant votre profil.");

// admin stuff
define("L_ADM_1", "%s n&#39;est plus moderateur pour ce salon.");
define("L_ADM_2", "Vous n&#39;etes plus un utilisateur enregistr&eacute;.");

// error messages
define("L_ERR_USR_1", "Ce pseudo est deja utilis&eacute; veuillez en choisir un autre.");
define("L_ERR_USR_2", "Vous devez choisir un pseudo.");
define("L_ERR_USR_3", "Ce pseudo est celui d&#39;un utilisateur enregistr&eacute;.<br />Veuillez saisir votre mot de passe ou choisissez un autre pseudo.");
define("L_ERR_USR_4", "Vous avez saisi un mauvais mot de passe.");
define("L_ERR_USR_5", "Vous devez saisir votre pseudo.");
define("L_ERR_USR_6", "Vous devez saisir votre mot de passe.");
define("L_ERR_USR_7", "Vous devez saisir votre e-mail.");
define("L_ERR_USR_8", "Vous devez taper une adresse e-mail valide.");
define("L_ERR_USR_9", "Ce pseudo est deja utilis&eacute;.");
define("L_ERR_USR_10", "Mauvais pseudo ou mot de passe.");
define("L_ERR_USR_12", "Vous etes l&#39;administrateur, aussi vous ne pouvez pas etre supprim&eacute;.");
define("L_ERR_USR_14", "Vous devez etre enregistrer avant de pouvoir chatter.");
define("L_ERR_USR_15", "Vous devez saisir votre nom complet.");
define("L_ERR_USR_16a", "Seul ces caracteres speciaux son autoris&eacute;:<br />".$REG_CHARS_ALLOWED."<br />Espace, virgule ou backslashes (\\) ne sont pas autoris&eacute;. V&eacute;rifiez la syntaxe.");
define("L_ERR_USR_18", "Un mot interdit a &eacute;t&eacute; detect&eacute; dans votre pseudo.");
define("L_ERR_USR_20", "Vous avez &eacute;t&eacute; banis de ce salon ou du Chat.");
define("L_ERR_USR_20a", "Vous avez &eacute;t&eacute; banis de ce salon ou du Chat.<br />Raison: %s");
define("L_ERR_USR_21", "Vous n&#39;avec pas &eacute;t&eacute; actif durant les ".C_USR_DEL." minutes,<br />dufait vous avez &eacute;t&eacute; sortis du salon.");
define("L_ERR_USR_23", "Pour acceder &agrave; un salon priv&eacute; vous devez etre enregistr&eacute;.");
define("L_ERR_USR_24", "Pour cr&eacute;&eacute;r votre porpre salon priv&eacute; vous devez etre enregistr&eacute;.");
define("L_ERR_USR_25", "Seul l&#39;administrateur peu utiliser ".$COLORNAME." la couleur!<br />n&#39;essayez pas d&#39;utiliser ".COLOR_CA.", ".COLOR_CAS.", ".COLOR_CM." ou ".COLOR_CMS." (ou leur codes HEX correspondant).<br />Ils sont r&eacute;serv&egrave; aux utilisateur avec pouvoir!");
define("L_ERR_USR_26", "Seul l&#39;administrateur ou les moderateurspeuvent utiliser ".$COLORNAME." color!<br />n&#39;essayez pas d&#39;utiliser ".COLOR_CA.", ".COLOR_CAS.", ".COLOR_CM." ou ".COLOR_CMS." (ou leur codes HEX correspondant).<br />ils sont r&eacute;serv&egrave; aux utilisateurs avec pouvoir!");

// users frame or popup
define("L_EXIT", "Exit Chat");
define("L_DETACH", "Detach Users list");
define("L_EXPCOL_ALL", "Ouvrir/Fermer tout");
define("L_CONN_STATE", "Rafrechir l&#39;etat de la connexion");
define("L_CHAT", "Chat");
define("L_USER", "utilisateur");
define("L_USERS", "utilisateurs");
define("L_LURKER", "espion");
define("L_LURKERS", "espions");
define("L_NO_USER", "Pas d&#39;utilisateur");
define("L_ROOM", "salon");
define("L_ROOMS", "salons");
define("L_EXPCOL", "Ouvrir/Fermer salon");
define("L_BEEP", "Beep/pas de beep &agrave; l&#39;arriv&eacute; d&#39;un utilisateur");
define("L_PROFILE", "Afficher le profil");
define("L_NO_PROFILE", "Pas de profil");

// input frame
define("L_HLP", "Aide");
define("L_MODERATOR", "%s est maintenant moderateur de ce salon.");
define("L_KICKED", "%s &agrave; &eacute;t&eacute; Kick&eacute; avec succes.");
define("L_KICKED_REASON", "%s &agrave; &eacute;t&eacute; Kick&eacute; avec succes. (Raison: %s)");
define("L_BANISHED", "%s &agrave; &eacute;t&eacute; Banis avec succes.");
define("L_BANISHED_REASON", "%s &agrave; &eacute;t&eacute; Banis avec succes. (Raison: %s)");
define("L_ANNOUNCE", "ANNOUNCE");
define("L_INVITE", " %s Vous propose de le rejoindre sur le salon <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> .");
define("L_INVITE_REG", " Vous devez etre enregistr&eacute; pour acceder a ce salon .");
define("L_INVITE_DONE", "Votre invitation a &eacute;t&eacute; envoy&eacute; &agrave; %s.");
define("L_OK", "Send");
define("L_BUZZ", "Galerie des Buzzs");

// help popup
define("L_HELP_TIT_1", "Smilies");
define("L_HELP_TIT_2", "Format du texte pour les messages");
define("L_HELP_FMT_1", "Vous pouvez utiliser du gras, italic ou soulign&eacute; dans les messages en encadrant la partie du texte de vos messages avec l&#39;une ou l&#39;autre des balises suivantes &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; or &lt;U&gt; &lt;/U&gt; .<br />PAr exemple, &lt;B&gt;this text&lt;/B&gt; donne <B>this text</B>.");
define("L_HELP_FMT_2", "Pour cr&eacute;&eacute;r des Hyperliens (pour les e-mail ou URL) dans vos messages, tapez simplement les differantes adresses dans la fenetre de saisie, l&#39;hypertexte serra automatiquement g&eacute;n&eacute;r&eacute;.");
define("L_HELP_TIT_3", "Commandes");
define("L_HELP_NOTE", "Toutes les commandes doivent &eacute;tre saisies en Anglais!");
define("L_HELP_USR", "utilisateur");
define("L_HELP_MSG", "message");
define("L_HELP_ROOM", "salon");
define("L_HELP_BUZZ", "~nom_du_son");
define("L_HELP_REASON", "la raison");
define("L_HELP_CMD_0", "{} represente une donn&eacute;e obligatoire, [] represente une donn&eacute;e facultative.");
define("L_HELP_CMD_1a", "Selectionner le nombre de messages &agrave; afficher. Le minimum ainsi que la valeur par d&eacute;faut est de 5.");
define("L_HELP_CMD_1b", "Rafrechir la fenetre des messaages et afficher les n derniers messages. Le minimum ainsi que la valeur par d&eacute;faut est de 5.");
define("L_HELP_CMD_2a", "Modifier le delais de rafrechissement de la liste des messages (en secondes).<br />Si n n&#39;est pas sp&eacute;cifi&eacute; ou inferieur &agrave; 3, le choix sera fait entre pas de rafrechissement et 10s de rafrechissement.");
define("L_HELP_CMD_2b", "Modifier le delais de rafrechissement de la liste utilisateurs et des messages (en secondes).<br />Si n n&#39;est pas sp&eacute;cifi&eacute; ou inferieur &agrave; 3, le choix sera fait entre pas de rafrechissement et 10s de rafrechissement.");
define("L_HELP_CMD_3", "Changer l&#39;ordre des messages (pas dispo dans tout les explorateurs).");
define("L_HELP_CMD_4", "Joindre un autre salon, le cr&eacute;&eacute;r si il n&#39;existe pas et si vous y etes autoris&eacute;.<br />n est egale &agrave; 0 pour les salons priv&eacute; et &agrave; 1 pour les publique, Le choix par d&eacute;faut etant de 1 si cella n&#39;a pas &eacute;t&eacute; sp&eacute;cifi&eacute;.");
define("L_HELP_CMD_5", "Quiter le salon apres avoir affich&eacute; un message optionnel.");
define("L_HELP_CMD_6", "Eviter d&#39;afficher un message &agrave; un utilisateur si son pseudo a &eacute;t&eacute; sp&eacute;cifi&eacute;.<br />Desselectionner le pseudo en retapant la commande mais en faisant pr&eacute;c&eacute;der le pseudo d&#39;un - (exemple: /ignore - pseudo).<br />Sans Pseudo, Cette commande ouvre un pops up qui affiche les pseudo &agrave; ignorer.");
define("L_HELP_CMD_7", "Biss (commande ou message).");
define("L_HELP_CMD_8", "Montrer/Cacher l&#39;heure devant les messages.");
define("L_HELP_CMD_9", "Kicker un utilisateur du chat. Cette commande peut uniquement etre utilis&eacute; par un moderateur.");
define("L_HELP_CMD_10", "Envoyer un message priv&eacute; &agrave; un utilisateur (Les autres ne le vois pas).");
define("L_HELP_CMD_11", "Afficher les informations sur l&#39;utilisateur sp&eacute;cifi&eacute;.");
define("L_HELP_CMD_12", "Ouvrir un pop up pour editer le profil d&#39;un utilisateur.");
define("L_HELP_CMD_13", "Bascule entre les usagers entrant ou sortant du salon en cour.");
define("L_HELP_CMD_14", "Permet a l&#39;administratuer ou au moderateur de promouvoir un utilisateur en tant que moderateur dans le salon.");
define("L_HELP_CMD_15", "Netoyer la fenetre de messages pour n&#39;afficher que les 5 derniers.");
define("L_HELP_CMD_16", "Sauvegarder les n derniers messages (notifications excluses) dans un fichier HTML. Si n n&#39;est pas specifi&eacute;, tout les messages disponible seront pris en compte.");
define("L_HELP_CMD_17", "Permet a l&#39;administrateur de faire des annonces &agrave; tout les usagers dans tout les salons.");
define("L_HELP_CMD_18", "Invite un utilisateur a vous rejoindre dan sle salon o&ucirc; vous vous trouvez.");
define("L_HELP_CMD_19", "Permet aux moderateurs d&#39;un salon ou l&#39;administrateur de \"Banir\" un utilisateur d&#39;un salon pour un temps defini par l&#39;administrateur.<br />Ce dernier peut Banir un utilisateur d&#39;un autre salon que celui dans lequel il se trouve et &agrave; utiliser &#39;<B>&nbsp;*&nbsp;</B>&#39; l&#39;option\"Pour toujours\" pour un utilisateur sur la totalit&eacute; du chat.");
define("L_HELP_CMD_20", "Decrivez ce que vous faites sans vous siter vous m&ecirc;me.");
define("L_HELP_CMD_21", "Anounce le salon et les usager qui souhaitent vous envoyer un message<br /> pendant que vous etes loin (away) de votre ordi. Lorsque vous revenez a votre ordi, pianotez simplement sur le clavier pour chatter.");
define("L_HELP_CMD_22", "Envoyez un son ( buzz ) et un message optionnel dans le salon en cours.<br />- Utilisation:<br />- Ancienne Utilisation: \"/buzz\" ou \"/buzz message &agrave; afficher\" - Cela joue le son par d&eacute;faut deffini par dans le panneau d&#39;administration;<br />- Utilisation ettendu: \"/buzz ~nom_du_son\" or \"/buzz ~nom_du_son message &agrave; afficher\" - &ccedil;a joue le fichier nom_du_son.wav du dossier plus/sounds; notez que le signe \"~\" au debut du second therme , qui est le nom du fichier son, sans l&#39;extantion .wav (seul les extention .wav sont autoris&eacute;).<br />Par d&eacute;faut c&#39;est une commande de moderateur ou administrateur.");
define("L_HELP_CMD_23", "Envoyer un <i>chuchotement</i> (message private). Le message va trouver la destination, sans tenir compte du salon ou se trouve l&#39;utilisateur. si l&#39;utilisateur est absent ou \"away\"vous en serrez averti.");
define("L_HELP_CMD_24", "Utilisation: la commande {topic} doit contenir au minimum 2 mots.<br />Cette commande change le topic du salon en cours. n&#39;essayez pas d&#39;ecraser le Topic des autres utilisateurs. Utilisez un Topic interessant.<br />Par d&eacute;faut c&#39;est une commande de moderateur ou administrateur.<br />Utilisez la commande \"/topic top reset\" pour revenir au Topic par d&eacute;faut.");
define("L_HELP_CMD_25", "Un jeux de D&eacute;s pour tirer des nombres au hasar.<br />Utilisation: /dice ou /dice [n];<br />n peut prendre n&#39;importe quel valeur <b>entre 1 et %s</b> (cela repr&eacute;sente le numbre de d&eacute;s jou&eacute;). Si aucun numbre de d&eacute;s n&#39;est choisis, Par d&eacute;faut il serra lanc&eacute; le numbre de d&eacute;s maximum.");
define("L_HELP_CMD_26", "C&#39;est une version plus complexe de la commande /dice .<br />Utilisation: /{n1}d[n2] ou /{n1}d;<br />n1 peut prendre n&#39;importe quel valeur <b>entre 1 et %s</b> (cela represente le nombre de d&eacute;s lanc&eacute;).<br />n2 peut prendre n&#39;importe quel valeur <b>entre 1 et %s</b> (cela represente le nombre de d&eacute;s jou&eacute; &agrave; chaque lanc&eacute;).");
define("L_HELP_CMD_27", "Cela surligne les messages d&#39;un utilisateur sp&eacute;cifique, pour une lecture plus facile au milieu de la convessation.<br />Utilisation: /high {utilisateur} ou clikez sur le petit <img src=./images/highlightOff.gif> carr&eacute; &agrave; droite des noms des utilisateur dans la liste sur la droite");
define("L_HELP_CMD_28", "Cela permet d&#39;envoyer <i>une simple image</i> comme un message.<br />utilisation: L&#39;image doit etre sur internet et librement accessible. N&#39;utilisez pas des pages qui necessitent un mot de passe.<br />Le lien complet de l&#39;image doit etre saisi! E.g.<b>/img&nbsp;http://www.dlukic.com/chat/gray_wolf.jpg</b><br />Extention autoris&eacute;es: .jpg .bmp .gif .png. le lien est \"case sensitive\"!<br />EXP: saisissez /img un espace et copiez l&#39;URL dans le champ; pour avoir l&#39;URL d&#39;une image d&#39;une page web, quand vous clikez droit sur l&#39;image, allez dans propri&eacute;t&eacute;s, surlignez l&#39;URL en entieret faites un copier/coller apr&eacute;s le /img<br />n&#39;utilisez pas d&#39;images en provenance de votre PC: cela va juste arreter la fenetre du chat!!!");
define("L_HELP_CMD_29", "La seconde commandes permetra aux administrateurs ou moderateursd&#39;un salon encours de d&eacute;grade un autre utilisateur enregistr&eacute; qui avait &eacute;t&eacute; Promu moderateur pour ce m&ecirc;me room.<br />l&#39;option * degradera un utilisateur de tout les salons.");
define("L_HELP_CMD_30", "La seconde commande fait la m&ecirc;me chose que /me mais il montrera le genre de l&#39;utilisateur<br />i.e. * Mr Leloup regarde la T&eacute;l&eacute; ou Mrs Jamie est heureuse.");
define("L_HELP_CMD_31", "Change l&#39;ordre d&#39;affichage de laliste des Utilisateurs: par heure d&#39;arriver ou alphabetique.");
define("L_HELP_CMD_32", "c&#39;est une troisieme (jeux de role) version du jeux de d&eacute;s.<br />Utilisation: /d{n1}[tn2] ou /d{n1};<br />n1 peut prendre n&#39;importe quel valeur <b>entre 1 et 100</b> (represente le nombre de faces par d&eacute;s).<br />n2 peut prendre n&#39;importe quel valeur <b>entre 1 et %s</b> (cela represente le nombre de d&eacute;s jou&eacute; &agrave; chaque lanc&eacute;).");
define("L_HELP_CMD_33", "Change la taille des police de caractaires des messages dans la fenetre de dialogue (valeurs autoris&eacute;: <b>entre 7 et 15</b>); la commande /size remet la taille par d&eacute;faut (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Netiquette du chat");
define("L_HELP_ETIQ_2", "Ce chat n&#39;est pas un Chat Caramail ou Love@Lycos, Nous souhaitons avoir une communaut&eacute; paisible, sympatique et agr&eacute;able, Aussi, S&#39;il vous plait veuilez adh&eacute;rer aux r&eacute;gles suivantes. Si vous n&#39;arrivez pas &agrave; vous conformer a ses regles de simple politesse, un de nos moderateurs risque de vous ejecter du Chat.<br /><br />Merci,");
define("L_HELP_ETIQ_3", "Netiquette du Chat");
define("L_HELP_ETIQ_4", "Ne &quot;Spamez&quot; pas le chat en saisissant des phrases incomprehensible ou des lettres au hasard.</li>
<li>N&#39;utilisez pas des caractaires aLtERnatIF.</li>
<li>Utilisez les Majuscules avec moderation, elle sont utiliser pour signifier que l&#39;on crie.</li>
<li>Gardez en memoire que les Utilisateurs peuvent venir de n&#39;importe quel coin du monde, et, probablement, vous rencontrerez des gens de differente provenance. S&#39;il vous plait soyez gentil et polis avec eux.</li>
<li>Ne soyez pas injurieux avec les autres utilisateurs. Dans tous les cas , veuillez ne pas utliser d&#39;Injures ou autres Gros mot.</li>
<li>N&#39;appellez pas les autres utilisateur par leur vrai Nom, il risquent de ne pas aprecier.Utilisez plutôt leur Pseudo.");

// messages frame
define("L_NO_MSG", "Il n&#39;y a actuellement aucun messages...");
define("L_TODAY_DWN", "Les messages post&eacute;s Aujourd&#39;hui commencent en dessous");
define("L_TODAY_UP", "Les messages post&eacute;s Hier commencent en dessous");

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
define("L_IGNOR_TIT", "Ignor&eacute;");
define("L_IGNOR_NON", "Pas d&#39;utilisateur Ignor&eacute;");

// whois popup
define("L_WHOIS_ADMIN", "Administrateur");
define("L_WHOIS_MODER", "Moderateur");
define("L_WHOIS_USER", "Utilisateur");
define("L_WHOIS_GUEST", "Invit&eacute;");
define("L_WHOIS_REG", "Enregistr&eacute;");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s se joint &agrave; notre agr&eacute;able assembl&eacute;e" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s se joint &agrave; notre agr&eacute;able assembl&eacute;e");
define("L_ENTER_ROM_NOSOUND", "%s entre dans le salon");
define("L_EXIT_ROM", "%s nous a l&agrave;chement abandonn&eacute;");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s a &eacute;t&eacute; automatiquement &eacute;ject&eacute; du salon &agrave; cause d&#39;une trop longue innactivit&eacute;");
define("L_CLOSED_ROM", "%s a ferm&eacute; son explorateur");

// Text for /away command notification string:
define("L_AWAY", "%s est Away");
define("L_BACK", "%s est de retour!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Menu rapide *****");//&nbsp; means one blank space. this will center align the title of the drop list."

// Topic Banner mod
define("L_TOPIC", " a chang&eacute; le TOPIC en:");
define("L_TOPIC_RESET", " a reset&eacute; TOPIC");
define("L_HELP_TOP", "il faut au minimum 2 mots dans le topic");

// Img cmd mod
define("L_PIC", "Images envoy&eacute; par");
define("L_PIC_RESIZED", "Redimentionn&eacute; en");
define("L_HELP_IMG", "chemin complet de l&#39;image &agrave; afficher");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s n&#39;est plus moderateur d&#39;aucun salon du chat.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra Commandes disponibles:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra Rubriques/Mods disponibles:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Notre bot est: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "Langues parl&eacute;es");
define("L_PRO_2", "Lien pr&eacute;f&eacute;r&eacute; 1");
define("L_PRO_3", "Lien pr&eacute;f&eacute;r&eacute; 2");
define("L_PRO_4", "Description");
define("L_PRO_5", "URL d&#39;image");
define("L_PRO_6", "Votre nom couleur");

// Avatar mod
define("L_ERR_AV", "URL invalide ou serveur inexistant.");
define("L_TITLE_AV", "Votre avatar actuel: ");
define("L_CHG_AV", "Clickez &#39;Change&#39; dans le formulaire de profil<br />pour stocker votre avatar.");
define("L_SEL_NEW_AV", "Selectionner un nouvel Avatar");
define("L_EX_AV", "(example: http://mysite/images/mypic.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Enter URL, ensuite tapez ENTER pour visualiser)");
define("L_CANCEL", "Abandonner");
define("L_CLICK", "Clickez ici");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Le bot du chat est publiquement actif dans ce salon. Pour commancer a parler avec lui/elle tapez <b>hello ".C_BOT_NAME.'</b>. Pour metre fin tapez: <b>bye '.C_BOT_NAME.'</b>. (priv&eacute;): /to <b>'.C_BOT_NAME.'</b> Message)'); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)"
define("BOT_PRIV_TIPS", "TIPS: Le bot du chat est publiquement actif dans le salon ".$R." . Vous pouvez seulement parler avec lui en Priv&eacute;, en chuchottant . (command: /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)"
define("BOT_PRIVONLY_TIPS", "TIPS: Le bot du chat est publiquement actif. Vous pouvez seulement parler avec lui en Priv&eacute;. (commands: /to <b>".C_BOT_NAME."</b> Message or /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)"

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "lande d&eacute;s, le resultat est:");

// Log mod by Ciprian
define("L_ARCHIVE", "Ouvre les archives");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Ouvre un popup pour les messages priv&eacute;");
define("L_PRIV_POST_MSG", "Envoyer un message priv&eacute;!");
define("L_PRIV_MSG", "Nouveau message priv&eacute; re&ccedil;u!");
define("L_PRIV_MSGS", "nouveau messages priv&eacute; re&ccedil;u!");
define("L_PRIV_MSGSa", "Ici sont les 10 premiers messages!<br />Utiliser le bouton du lien pour voir le reste.");
define("L_PRIV_MSG1", "De:");
define("L_PRIV_MSG2", "Salon:");
define("L_PRIV_MSG3", "A:");
define("L_PRIV_MSG4", "Message:");
define("L_PRIV_MSG5", "Post&eacute;:");
define("L_PRIV_REPLY", "Repondre");
define("L_PRIV_READ", "Apuyer sur le bouton de fermeture pour marquer tout les messages comme lu!");
define("L_PRIV_POPUP", " Vous pouvez d&eacute;sactiver/r&eacute;-activer n&#39;importe quand ce popup de caracteristiques<br />en editant votre <a href=\"#\" onClick=\"window.parent.runCmd('profile',''); return false;\" onMouseOver=\"window.status='Change your settings.'; return true\">Profil</a> (seulement pour les utilisateur enregistr&eacute;s)");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Actif" : "Inactif"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Actif" : "Inactif"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Parametre couran sur ce serveur</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Couleur par d&eacute;faut</u>: Administrateur = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderateurs = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Utilisateurs = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Couleur par d&eacute;faut</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Chooser de Couleur");
define("L_COL_HELP_SUB1", "Utilisation:");
define("L_COL_HELP_P1", "You can select your own default color by editing your profile (the same color as your username color). You'll still be able to use any other color. To change back to your default color from a random used one, you have to choose once the default color (Null) - it is the first one in the select list.");
define("L_COL_HELP_SUB2", "Allusion:");
define("L_COL_HELP_P2", "<u>Tranche de Couleur</u><br />Cela depend des capacit&eacute;es de votre explorateur/OS, il est possible que certaines couleurs ne soient pas trancrites. Suel 16 nom de couleurs sont suport&eacute; par W3C HTML 4.0 standard:");
define("L_COL_HELP_P2a", "Si un utilisateur pretend ne pas voir votre couleur, c&#39;est qu&#39;il utilise probablement un ancien explorateur.");
define("L_COL_HELP_SUB3", "Param&eacute;trage deffini sur ce chat:");
define("L_COL_HELP_P3", "<u>Utilisation des Couleurs selon le grade</u>:<br />1. L&#39;administrateur peut les utiliser toutes.<br />La couleur par d&eacute;faut pour l&#39;admin est <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Les Moderateurs peuvent les utiliser toutes sauf <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> et <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />La couleur par d&eacute;faut des Moderateurs est <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Les autres Utilisateurs peuvent utiliser toutes les couleurs sauf <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> et <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "La couleur par d&eacute;faut est <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Conseil technique</u>: Ces couleurs sont definis par l&#39;administrateur dans le paneau d&#39;administration .<br />Si qqch ne fonctionne pas correctement, ou si il y a qqch que vous n&#39;aimez pas, a propos de la couleur par d&eacute;faut, contactez l&#39;<b>administrateur</b> en premier, et pas les autres utilisateur du salon. :-)");
define("L_COL_HELP_USER_STATUS", "Votre status");
define("L_COL_TUT", "Utilisez le code texte des couleurs");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","les utilisateurs ".LOGIN_LINK."chattent</A> en ce momment.</td></tr>");
define("USERS_LOGIN","1 l&#39;utilisateur ".LOGIN_LINK."chatt</A> en ce momment.</td></tr>");
define("NO_USER","Personne ne ".LOGIN_LINK."chatt</A> en ce momment.</td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Bienvenue sur le chat du loup. Veuillez suivre la Nettiquette: <I>Et restez calme en toutes circonstances</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Bienvenue sur le chat du loup. Veuillez suivre la Nettiquette: <I>Et restez calme en toutes circonstances</I>.");
define("WELCOME_MSG_NOSOUND", "Bienvenue sur le chat du loup. Veuillez suivre la Nettiquette: <I>Et restez calme en toutes circonstances</I>.");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Le parametrage de ce serveur viens juste d&#39;etre modifie. pour prevenir des malfonctions, S&#39;il vous plais, relancez votre navigateur (Appuyez sur la touche F5 ou Sortez et r&eacute;entrez sur le chat).");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Options supplementaire");
?>