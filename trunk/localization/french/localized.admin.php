<?php
// File : french/localized.admin.php - plus version (26.08.2008 - rev.14)
// Original file by Loďc Chapeaux <lolo@phpheaven.net> & Dean Collins <joelford@pacbell.net>
// Translation for Plus version by Pierre Liget <sourceforge@pliget.freesurf.fr> 10.12.2007
// Updates, corrections and additions for the Plus version by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administration %s");
define("A_MENU_1", "Utilisateurs inscrits");
define("A_MENU_11", "Utilisateur enregistré");
define("A_MENU_2", "Utilisateurs exclus");
define("A_MENU_21", "Utilisateur exclus");
define("A_MENU_3", "Purger les salons");
define("A_MENU_4", "Envoi de mails");
define("A_MENU_5", "Configuration");
define("A_MENU_6", "Chat extras");
define("A_MENU_7", "Rechercher");
define("A_MENU_8", "Connexions");
define("A_MENU_9", "Log archive");
define("A_LOGOUT", "Quitter");

// Frame for registered users
define("A_SHEET1_1", "Liste des utilisateurs inscrits et leurs permissions");
define("A_SHEET1_2", "Nom d’utilisateur");
define("A_SHEET1_3", "Permissions");
define("A_SHEET1_4", "Modérateur pour les salons");
define("A_SHEET1_5", "La liste des salons pour lesquels l’utilisateur est modérateur est séparée par des virgules (,) sans espace.");
define("A_SHEET1_6", "Supprimer les profils sélectionnés");
define("A_SHEET1_7", "Modifier");
define("A_SHEET1_8", "Il n’y a aucun utilisateur inscrit excepté vous-même.");
define("A_SHEET1_9", "Exclure les profils utilisateur sélectionnés");
define("A_SHEET1_10", "Allez maintenant sur la page des ’".A_MENU_2."’ pour affiner vos choix.");
define("A_SHEET1_11", "Dernière connexion");
define("A_SHEET1_12", "Raison de l’exclusion (facultatif)");
define("A_SHEET1_13", "Salons autorisés");
define("A_SHEET1_14", "Tous sans restriction");
define("A_SHEET1_15", "Tous avec restriction");
define("A_SHEET1_16", "Les restrictions du salon spécifié doivent également être activées dans le menu ’".A_MENU_5."’.");
define("A_USER", "Utilisateur");
define("A_MODER", "Modérateur");
define("A_TOPMOD", "Modérateur avec pouvoir");
define("A_ADMIN", "Administrateur");
define("A_PAGE_CNT", "Page %s de %s");

// Frame for banished users
define("A_SHEET2_1", "Liste des utilisateurs exclus et salons concernés");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Salons concernés");
define("A_SHEET2_4", "Jusqu’à");
define("A_SHEET2_5", "sans limite");
define("A_SHEET2_6", "Les noms de salon sont séparés par des virgules sans espace (,) if there are less than 4, else the ’<B>*</B>’ sign banish from all rooms.");
define("A_SHEET2_7", "Révoquer l’exclusion pour les utilisateurs sélectionnés");
define("A_SHEET2_8", "Il n’y a pas d’utilisateurs exclus.");
define("A_SHEET2_9", "Raison (facultatif)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Liste des salons existants");
define("A_SHEET3_2", "Purger un salon qui n’est pas le salon par défaut supprime les privilèges modérateur pour ce salon.");
define("A_SHEET3_3", "Purger les salons sélectionnés");
define("A_SHEET3_4", "Il n’y pas de salon à purger.");
define("A_SHEET3_5", "Vous n’avez pas fait de sélection. S’il vous plaît choisir au moins une chambre à partir de la liste ci-dessous.");

// Frame for sending mails
define("A_SHEET4_0", "Vous n’avez pas saisi d’e-mail pour l’administrateur dans l’onglet de ’".A_MENU_5."’.");
define("A_SHEET4_1", "Envoyer des e-mails");
define("A_SHEET4_2", "A:");
define("A_SHEET4_3", "Tout sélectionner");
define("A_SHEET4_4", "Sujet:");
define("A_SHEET4_5", "Message:");
define("A_SHEET4_6", "Envoyer maintenant!");
define("A_SHEET4_7", "Tous les e-mails ont été envoyés.");
define("A_SHEET4_8", "Erreur interne lors de l’envoi des e-mails.");
define("A_SHEET4_9", "Adresse(s), sujet ou message manquant!");
define("A_SHEET4_10", "Ajouter des emails, séparés par des virgules sans espace (,)");
define("A_SHEET4_11", "Signature");
define("A_SHEET4_12", "Tout déselectionner");

// Frame for configuration
define("A_SHEET5_0", "Votre version installée est %s");
define("A_SHEET5_1", "Il y a une nouvelle version disponible (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Chat Extras désactivés") ;
define("A_REFRESH_MSG", "Actualiser les Messages") ;
define("A_MSG_DEL", "Suppr") ;
define("A_POST_TIME", "Posté le") ;
define("A_FROM_TO", "De › A") ;
define("A_FROM", "De") ;
define("A_CHTEX_ROOM", "Salon") ;
define("A_CHTEX_MSG", "Message") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Logs des connexions IP de %s");
define("A_CHAT_LOGS_2", "L’archivage du Chat a été désactivé");
define("A_CHAT_LOGS_3", "Ouvrir le log des adresses IP du Chat");
define("A_CHAT_LOGS_4", "Réinitialiser le fichier de logs des adresses IP du Chat");
define("A_CHAT_LOGS_5", "Cela va archiver et réinitialiser le fichier\\nde logs des adresses IP du Chat !\\n");
define("A_CHAT_LOGS_6", "Archives complètes des logs du Chat");
define("A_CHAT_LOGS_7", "Afficher la page des archives publiques du Chat");
define("A_CHAT_LOGS_8", "Ceci va effacer tous les fichiers et les répertoires\\nprésents dans le répertoire %s!\\n"); // year
define("A_CHAT_LOGS_9", "Effacer tous les logs %s"); // year
define("A_CHAT_LOGS_10", "Effacer l’année");
define("A_CHAT_LOGS_11", "Ceci va effacer tous les fichiers\\nprésents dans le répertoire %s!\\n"); // month/year
define("A_CHAT_LOGS_12", "(seulement ceux qui sont publics)");
define("A_CHAT_LOGS_13", "Effacer le mois");
define("A_CHAT_LOGS_14", "Ceci va effacer le fichier %s!\\n"); // day.php file
define("A_CHAT_LOGS_15", "Effacer ce log");
define("A_CHAT_LOGS_16", "Lire le log %s"); // day month year
define("A_CHAT_LOGS_17", "Archives des logs publiques du Chat");
define("A_CHAT_LOGS_18", "(seulement ceux qui sont publics)");
define("A_CHAT_LOGS_19", "\\nOpération non réversible...\\nEtes-vous sûr?");
define("A_CHAT_LOGS_20", "Afficher la page des archives complètes du Chat");
define("A_CHAT_LOGS_21", "Revenir en haut de la page");
define("A_CHAT_LOGS_22", "Fichier de log archivé");
define("A_CHAT_LOGS_23", "Généré le %s"); // Generated on "date"
define("A_CHAT_LOGS_24", "Compresser toutes les logs du %s dans une archive zippée"); // date
define("A_CHAT_LOGS_25", "Cette action va générer un fichier zip avec toutes les logs\\nstockées dans le répertoire %s !\\n"); // month/year
define("A_CHAT_LOGS_26", "\\nÊtes-vous sûr?");
define("A_CHAT_LOGS_27", "Archives Zip");
define("A_CHAT_LOGS_28", "Télécharger %s");
define("A_CHAT_LOGS_29", "Supprimer cette archive Zip");
define("A_CHAT_LOGS_30", "Archives des adresses IP");
define("A_CHAT_LOGS_31", "Taille totale %s %s");
define("A_CHAT_LOGS_32", "Fichier");
define("A_CHAT_LOGS_33", "Dossier");
define("A_CHAT_LOGS_34", "%s supprimé avec succès: %s");
define("A_CHAT_LOGS_35", "%s créé avec succès: %s");
define("A_CHAT_LOGS_36", "%s n’existe pas: %s");
define("A_CHAT_LOGS_37", "%s n’a pas pu être supprimé: %s");
define("A_CHAT_LOGS_38", "%s n’a pas pu être créé: %s");
define("A_CHAT_LOGS_39", "%s protégé en écriture: %s");
define("A_CHAT_LOGS_40", "Des erreurs se sont produites pendant la sauvegarde du fichier: %s"); // filename

//Admin Search Page
define("A_SEARCH_1", "Rechercher sur le Chat");
define("A_SEARCH_2", "Toutes les catégories");
define("A_SEARCH_3", "Noms");
define("A_SEARCH_4", "Adresse IP");
define("A_SEARCH_5", "Permissions");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Sexe");
define("A_SEARCH_8", "Description");
define("A_SEARCH_9", "Liens");
define("A_SEARCH_10", "Rechercher");
define("A_SEARCH_11", "Pour la catégorie Permissions, les options sont <b>ad</b>, <b>mod</b> ou <b>u</b>.");
define("A_SEARCH_12", "Pour la catégorie Sexe, les options sont <b>0</b> pour non-spécifié, <b>1</b> pour Masculin, <b>2</b> pour Féminin, ou <b>3</b> pour Couple.");
define("A_SEARCH_13", "Nom d’utilisteur");
define("A_SEARCH_14", "Prénom");
define("A_SEARCH_15", "Nom");
define("A_SEARCH_16", "Pays");
define("A_SEARCH_18", "Permission");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Sexe");
define("A_SEARCH_21", "Expression recherchée");
define("A_SEARCH_22", "Rechercher par");
define("A_SEARCH_23", "Veuillez fournir une expression de recherche et réessayez");
define("A_SEARCH_24", "Aucune donnée ne correspond à vos critères. Veuillez reformuler votre recherche.");
define("A_SEARCH_25", "Modérer cet utilisateur");

// Connected users Page
define("A_LURKING_1", "Utilisateurs connectés et \"rôdeurs\" (Lurking)") ;
define("A_LURKING_2", "Lurking désactivé.") ;
?>