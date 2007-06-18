<?php
// File : french/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Translation by Loïc Chapeaux <lolo@phpheaven.net>
// Updates, corrections and additions for the Plus version by Leloup <leloup@le-loup.info> and Christophe Luke <christophe.lucsky@gmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>)
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

// error messages
define("L_ERR_USR_11", "Réservé à l'administrateur.");
define("L_ERR_USR_13", "Pour créér votre propre salon vous devez etre enregisré.");
define("L_ERR_USR_16", "Seul ces caracteres speciaux son autorisé:\\n".$REG_CHARS_ALLOWED."\\nEspace, virgule ou backslashes (\\) ne sont pas autorisé.\\nVérifiez la syntaxe.");
define("L_ERR_USR_17", "Ce salon n'existe pas est vous n'etes pas abilité pour en créér un.");
define("L_ERR_USR_19", "Vous ne pouvez etre dans plus d'un salon à la fois.");
define("L_ERR_USR_22", "Cette commande n'est pas accessible depuis \\nl'explorateur que vous utilisez (IE engine).");
define("L_ERR_USR_27", "Vous ne pouvez pas vous parler en privéà vous meme.\\nFaites ça dans votre crane...\\nEssayez plutot un autre pseudo");
define("L_ERR_ROM_1", "Le nom des salons ne peu contenir des virgules ou des backslashes (\\).");
define("L_ERR_ROM_2", "Un mot interdit a été trouvé dans le nom du salon que vous essayez de créér.");
define("L_ERR_ROM_3", "Ce salon existe deja en tant que salon publique.");
define("L_ERR_ROM_4", "Nom de salon invalide.");

// input frame
define("L_BAD_CMD", "Ce n'est pas une commande valide!");
define("L_ADMIN", "%s est deja administrateur!");
define("L_IS_MODERATOR", "%s est deja moderateur!");
define("L_NO_MODERATOR", "Seul le moderateur de ce salon peut utiliser cette commande.");
define("L_NONEXIST_USER", "%s n'est pas dans le salon en cour.");
define("L_NONREG_USER", "%s n'est pas enregistré.");
define("L_NONREG_USER_IP", "Son IP est: %s.");
define("L_NO_KICKED", "%s est moderateur ou administrateur et ne peut etre Kické.");
define("L_NO_BANISHED", "%s est moderateur ou administrateur et ne peut etre Banis.");
define("L_SVR_TIME", "Heure du serveur: ");
define("L_NO_SAVE", "Aucun messages à sauvegarder!");
define("L_NO_ADMIN", "Seul l'administrateur peu utiliser cette commande.");
define("L_NO_REG_USER", "Vous devez etre enregistré sur ce chat pour utiliser cette commande.");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s n'est pas moderateur.");
define("L_ERR_IS_ADMIN", "%s est l'administrateur!\\nVous ne pouvez pas changer ses fonctions.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "Le bot n'est pas present dans ce salon!");
define("BOT_START_ERROR", "Le bot est deja present dans ce salon!");
define("BOT_DISABLED_ERROR", "Le bot a été désactivé du paneau d'administration!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "Vous devez choisir combien de dés vous vouler lancer\\n(Choisissez un nombre entre 1 et ".MAX_ROLLS.").\\nSaisissez seulement /dice tout les ".MAX_ROLLS." dés.");
define("DICE2_WRONG", "La seconde valeur doit etre entre 1 et ".MAX_ROLLS.".\\nLaisser vide pour utiliser tout les ".MAX_ROLLS." dés.\\n(e.g. /".MAX_DICES."d ou /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "La premiere valeur doit etre entre 1 et ".MAX_DICES.".\\n(e.g. /".MAX_DICES."d ou /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "La seconde valeur doit etre entre 1 et ".MAX_ROLLS.".\\nLaisser vide pour utiliser tout les ".MAX_ROLLS." dés.\\n(e.g. /d50 ou /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s n'est pas en ligne en ce momment.");
define("L_PRIV_NOT_ONLINE", "%s n'est pas en ligne en ce momment,\\nmais il recevra votre message des qu'il se loggera.");
define("L_PRIV_NOT_INROOM", "%s n'est pas dans ce salon.\\nSi vous voulez envoyer un PV à cet utilisateur,\\nutiliser la commande: /wisp %s message.");
define("L_PRIV_AWAY", "%s est away,\\nmais il recevra votre message\\ndes qu'il serra de retour.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Seul l'administratuer peu utiliser la couleur ".COLOR_CA."!\\n\\nVotre derniere couleur serra remis en ".COLOR_CM."!\\n\\nveuillez en choisir une autre.");
define("COL_ERROR_BOX_USRA", "Seul l'administratuer peu utiliser la couleur ".COLOR_CA."!\\n\\nN'essayez pas d'utiliser ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ou ".COLOR_CM1.".\\n\\nC'est réservé aux utilisateurs avec pouvoir!\\n\\nVotre derniere couleur serra remis en ".COLOR_CD."!\\n\\nVeuillez en choisir une autre.");
define("COL_ERROR_BOX_USRM", "Vous devez etre Moderateur pour utiliser la couleur ".COLOR_CM."!\\n\\nN'essayez pas d'utiliser ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nC'est réservé aux utilisateurs avec pouvoir!\\n\\nVotre derniere couleur serra remis en ".COLOR_CD."!\\n\\nVeuillez en choisir une autre.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Chuchotement (Message privé)\\na été désactivé sur ce chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "La taille de la police de caractaire ne peu etre que\\nnule (pour reseter) ou entre 7 et 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Lu"); //Lundi
define("L_TUE", "Ma"); //Mardi
define("L_WED", "Me"); //Mercredi
define("L_THU", "Je"); //Jeudi
define("L_FRI", "Ve"); //Vendredi
define("L_SAT", "Sa"); //Samedi
define("L_SUN", "Di"); //Dimanche
?>