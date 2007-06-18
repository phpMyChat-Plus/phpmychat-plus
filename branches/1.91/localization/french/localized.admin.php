<?php
// File : french/localized.admin.php - plus version (11.06.2007 - rev.9)
// Translation by Loïc Chapeaux <lolo@phpheaven.net>
// Updates, corrections and additions for the Plus version by Leloup <leloup@le-loup.info> and Christophe Luke <christophe.lucsky@gmail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>)

// extra header for charset
$Charset = "iso-8859-1";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administration pour %s");
define("A_MENU_1", "Utilisateurs enregistrés");
define("A_MENU_2", "Utilisateurs bannis");
define("A_MENU_3", "Effacer le salon");
define("A_MENU_4", "Envoyer des mails");
define("A_MENU_5", "Configuration");
define("A_MENU_6", "Chat extras");
define("A_MENU_7", "Recherches");
define("A_MENU_8", "Connections");
define("A_MENU_9", "Log archive");

// Frame for registered users
define("A_SHEET1_1", "Liste des Utilisateurs enregistrés et de leurs permissions");
define("A_SHEET1_2", "Pseudo");
define("A_SHEET1_3", "Permissions");
define("A_SHEET1_4", "Salons Modérés");
define("A_SHEET1_5", "Les salons modérés sont sépare par des virgules (,) sans espace.");
define("A_SHEET1_6", "Supprimer les profiles cochés");
define("A_SHEET1_7", "Modifier");
define("A_SHEET1_8", "Il n'y a pas d'utilisateur enregistre e part pour meme.");
define("A_SHEET1_9", "Bannir les profils sélectionnés");
define("A_SHEET1_10", "Maintenant il vous faut aller dans la feuille des Utilisateurs Bannis pour redéfinir vos choix.");
define("A_SHEET1_11", "Dernier connecte");
define("A_SHEET1_12", "Raison du Bannissement (optionnel)");
define("A_USER", "Utilisateur");
define("A_MODER", "Modérateur");
define("A_ADMIN", "Administrateur");
define("A_PAGE_CNT", "Page %s de %s");

// Frame for banished users
define("A_SHEET2_1", "Liste des Utilisateurs bannis et des salons concernés");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Salons concerné");
define("A_SHEET2_4", "Jusqu'a");
define("A_SHEET2_5", "sans fin");
define("A_SHEET2_6", "Les salons sont sépare par des virgules (,) si ils sont moins de 4, sinon le '<B>&nbsp;*&nbsp;</B>' signe<br />bannis de tout les salons.");
define("A_SHEET2_7", "Supprimer le Bannissement des Utilisateurs coche(s)");
define("A_SHEET2_8", "Il n'y a pas d'Utilisateur Bannis.");
define("A_SHEET2_9", "Raison (optionnel)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Liste des salons existant");
define("A_SHEET3_2", "Effacer les salons \"non-default\" va également supprimer le statut des<br />modérateurs pour ces Salons.");
define("A_SHEET3_3", "Effacer les salons sélectionnes");
define("A_SHEET3_4", "Il n'y a pas de salon e effacer.");

// Frame for sending mails
define("A_SHEET4_0", "Vous n'avez pas defini l'e-mail de l'admin dans la table de Configuration.");
define("A_SHEET4_1", "Envoyer des e-mails");
define("A_SHEET4_2", "A :");
define("A_SHEET4_3", "Tout Sélectionner");
define("A_SHEET4_4", "Subject:");
define("A_SHEET4_5", "Message:");
define("A_SHEET4_6", "Lancer l'envois");
define("A_SHEET4_7", "Tout les e-mails ont été envoyés.");
define("A_SHEET4_8", "Erreur interne durant l'envois des mails.");
define("A_SHEET4_9", "Destinataire(s), subject ou message ont été oublie!");

// Frame for configuration
define("A_SHEET5_0", "La version de phpMyChat-Plus installé est %s");
define("A_SHEET5_1", "Il y a une nouvelle version de prete (%s)!");
?>
