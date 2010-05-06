<?php
# da_DK translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Danish
# Translator: Bente Feldballe
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "Dato");
define("L_MONTH", "Måned");
define("L_YEAR", "År");
define("L_PREV", "Forrige");
define("L_NEXT", "Næste");
define("L_REF_CAL", "Opdatér kalender...");
define("L_CHK_VAL", "Tjek værdi");
define("L_SEL_LANG", "Vælg sprog");
define("L_SEL_ICON", "Vælg ikon");
define("L_SEL_DATE", "Vælg dato");
define("L_ERR_SEL", "Ugyldigt valg");
define("L_NOT_ALLOWED", "Du kan ikke vælge denne dato");

// Set the first day of the week in your language
define("FIRST_DAY", "1"); // 1 for Monday, 0 for Sunday

// Months Long Names
define("L_JAN", "Januar");
define("L_FEB", "Februar");
define("L_MAR", "Marts");
define("L_APR", "April");
define("L_MAY", "Maj");
define("L_JUN", "Juni");
define("L_JUL", "Juli");
define("L_AUG", "August");
define("L_SEP", "September");
define("L_OCT", "Oktober");
define("L_NOV", "November");
define("L_DEC", "December");
// Months Short Names
define("L_S_JAN", "Jan.");
define("L_S_FEB", "Feb.");
define("L_S_MAR", "Mrs.");
define("L_S_APR", "Apr.");
define("L_S_MAY", "Maj");
define("L_S_JUN", "Juni");
define("L_S_JUL", "Juli");
define("L_S_AUG", "Aug.");
define("L_S_SEP", "Sept.");
define("L_S_OCT", "Okt.");
define("L_S_NOV", "Nov.");
define("L_S_DEC", "Dec.");
// Week days Long Names
define("L_MON", "Mandag");
define("L_TUE", "Tirsdag");
define("L_WED", "Onsdag");
define("L_THU", "Torsdag");
define("L_FRI", "Fredag");
define("L_SAT", "Lørdag");
define("L_SUN", "Søndag");
// Week days Short Names
define("L_S_MON", "Ma");
define("L_S_TUE", "Ti");
define("L_S_WED", "On");
define("L_S_THU", "To");
define("L_S_FRI", "Fr");
define("L_S_SAT", "Lø");
define("L_S_SUN", "Sø");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d. %B %Y");

// Set the DK specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "danish.UTF-8", "danish"); // For DK formats
} else {
setlocale(LC_ALL, "da_DK.UTF-8", "da_DK.UTF-8@euro", "dnk.UTF-8", "dnk.UTF-8"); // For DK formats
}
?>