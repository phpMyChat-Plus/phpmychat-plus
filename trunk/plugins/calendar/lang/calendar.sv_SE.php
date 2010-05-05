<?php
# sv_SE translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Swedish
# Translator: Fimpen Högström <fimpen@relative-work.se>
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "Dag");
define("L_MONTH", "Månad");
define("L_YEAR", "År");
define("L_PREV", "Föregående");
define("L_NEXT", "Nästa");
define("L_REF_CAL", "Uppfriskande Kalender...");
define("L_SEL_LANG", "Välj språk");
define("L_SEL_ICON", "Välj ikon");
define("L_SEL_DATE", "Välj datum");
define("L_ERR_SEL", "Ditt val är inte giltig");
define("L_NOT_ALLOWED", "Detta datum får inte väljas");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Januari");
define("L_FEB", "Februari");
define("L_MAR", "Mars");
define("L_APR", "April");
define("L_MAY", "Maj");
define("L_JUN", "Juni");
define("L_JUL", "Juli");
define("L_AUG", "Augusti");
define("L_SEP", "September");
define("L_OCT", "Oktober");
define("L_NOV", "November");
define("L_DEC", "December");
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Feb");
define("L_S_MAR", "Mar");
define("L_S_APR", "Apr");
define("L_S_MAY", "Maj");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Aug");
define("L_S_SEP", "Sep");
define("L_S_OCT", "Okt");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dec");
// Week days Long Names
define("L_MON", "Måndag");
define("L_TUE", "Tisdag");
define("L_WED", "Onsdag");
define("L_THU", "Torsdag");
define("L_FRI", "Fredag");
define("L_SAT", "Lördag");
define("L_SUN", "Söndag");
// Week days Short Names
define("L_S_MON", "Må");
define("L_S_TUE", "Ti");
define("L_S_WED", "On");
define("L_S_THU", "To");
define("L_S_FRI", "Fr");
define("L_S_SAT", "Lö");
define("L_S_SUN", "Sö");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");

// Set the SV specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "sve.UTF-8", "swedish.UTF-8", "swedish");
} else {
setlocale(LC_ALL, "sv_SE.UTF-8", "sv_SE.UTF-8@euro", "swedish.UTF-8", "sve.UTF-8", "sv.UTF-8", "sve_sve.UTF-8");
}
?>