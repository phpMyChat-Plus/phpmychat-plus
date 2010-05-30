<?php
# fr_FR translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: French
# Translator: Pierre Liget <sourceforge@pliget.freesurf.fr>
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "Jour");
define("L_MONTH", "Mois");
define("L_YEAR", "Année");
define("L_PREV", "Précédent");
define("L_NEXT", "Suivant");
define("L_REF_CAL", "Actualisation du calendrier en cours ...");
define("L_CHK_VAL", "Vérifiez la valeur");
define("L_SEL_LANG", "Sélection de la langue");
define("L_SEL_ICON", "Sélection de l’icône");
define("L_SEL_DATE", "Sélection de la date");
define("L_ERR_SEL", "La sélection n’est pas valide");
define("L_NOT_ALLOWED", "Cette date ne peut pas être sélectionnée");
 
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

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "fr_FR");

// Set the FR specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "fra_fra.UTF-8", "french.UTF-8", "french");
} else {
setlocale(LC_ALL, "fr_FR.UTF-8", "fr.UTF-8", "fr_FR.UTF-8@euro"); // For French formats
}
?>