﻿<?php
# el_GR translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.3
# Language: Greek / Ελληνικά (in your lang)
# Translator: Kostas Filios
# Last file update: 04.04.2011

// Class strings localization
define("L_DAY", "Ημέρα");
define("L_MONTH", "Μήνας");
define("L_YEAR", "Χρόνος");
define("L_PREV", "Προηγούμενο");
define("L_NEXT", "Επόμενο");
define("L_REF_CAL", "Επαναφόρτωση ημερολογίου...");
define("L_CHK_VAL", "Έλενξε την τιμή");
define("L_SEL_LANG", "Επέλεξε γλώσσα");
define("L_SEL_ICON", "Επέλεξε εικονίδιο");
define("L_SEL_DATE", "Επέλεξε ημέρα");
define("L_ERR_SEL", "Λάθος επιλογή");
define("L_NOT_ALLOWED", "Δεν επιτρέπετε η επιλογή αυτής της ημέρας");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Ιανουάριος");
define("L_FEB", "Φεβρουάριος");
define("L_MAR", "Μάρτιος");
define("L_APR", "Απρίλιος");
define("L_MAY", "Μάιος");
define("L_JUN", "Ιούνιος");
define("L_JUL", "Ιούλιος");
define("L_AUG", "Αύγουστος");
define("L_SEP", "Σεπτέμβρης");
define("L_OCT", "Οκτώμβρης");
define("L_NOV", "Νοέμβρης");
define("L_DEC", "Δεκέμβρης");
// Months Short Names
define("L_S_JAN", "Ιαν");
define("L_S_FEB", "Φεβ");
define("L_S_MAR", "Μαρ");
define("L_S_APR", "Απρ");
define("L_S_MAY", "Μάι");
define("L_S_JUN", "Ιουν");
define("L_S_JUL", "Ιουλ");
define("L_S_AUG", "Αυγ");
define("L_S_SEP", "Σεπ");
define("L_S_OCT", "Οκτ");
define("L_S_NOV", "Νοε");
define("L_S_DEC", "Δεκ");
// Week days Long Names
define("L_MON", "Δευτέρα");
define("L_TUE", "Τρίτη");
define("L_WED", "Τετάρτη");
define("L_THU", "Πέμπτη");
define("L_FRI", "Παρασκευή");
define("L_SAT", "Σαββάτο");
define("L_SUN", "Κυριακή");
// Week days Short Names
define("L_S_MON", "Δευ");
define("L_S_TUE", "Τρι");
define("L_S_WED", "Τετ");
define("L_S_THU", "Πεμ");
define("L_S_FRI", "Παρ");
define("L_S_SAT", "Σαβ");
define("L_S_SUN", "Κυρ");

// Windows encoding
define("WIN_DEFAULT", "windows-1253");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "el_GR"); // en_US format of your language

// Set the XX specific date/time format; ENGLISH EXAMPLE:
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "ell-ath.UTF-8", "ell-ath", "Greek-athens.UTF-8", "Greek.UTF-8", "Greek");
} else {
setlocale(LC_ALL, "el_GR.UTF-8", "ell.UTF-8", "athens.UTF-8", "ell_ell.UTF-8", "Greek-ath.UTF-8");
}
?>