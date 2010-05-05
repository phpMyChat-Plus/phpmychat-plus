<?php
# sr_CS translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Serbian Latin
# Translator: Vedran Vučić <vedran.vucic@gnulinuxcentar.org>
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "Day");
define("L_MONTH", "Month");
define("L_YEAR", "Year");
define("L_PREV", "Previous");
define("L_NEXT", "Sledeći");
define("L_REF_CAL", "Refreshing Calendar...");
define("L_SEL_LANG", "Select Language");
define("L_SEL_ICON", "Select Icon");
define("L_SEL_DATE", "Select Date");
define("L_ERR_SEL", "Your selection is not valid");
define("L_NOT_ALLOWED", "This date is not allowed to be selected");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Januar");
define("L_FEB", "Februar");
define("L_MAR", "Mart");
define("L_APR", "April");
define("L_MAY", "Maj");
define("L_JUN", "Jun");
define("L_JUL", "Jul");
define("L_AUG", "Avgust");
define("L_SEP", "Septembar");
define("L_OCT", "Oktobar");
define("L_NOV", "Novembar");
define("L_DEC", "Decembar");
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Feb");
define("L_S_MAR", "Mar");
define("L_S_APR", "Apr");
define("L_S_MAY", "Maj");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Avg");
define("L_S_SEP", "Sep");
define("L_S_OCT", "Okt");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dec");
// Week days Long Names
define("L_MON", "Ponedeljak");
define("L_TUE", "Utorak");
define("L_WED", "Srijeda");
define("L_THU", "Četvrtak");
define("L_FRI", "Petak");
define("L_SAT", "Subota");
define("L_SUN", "Nedelja");
// Week days Short Names
define("L_S_MON", "Pon");
define("L_S_TUE", "Uto");
define("L_S_WED", "Sri");
define("L_S_THU", "Čet");
define("L_S_FRI", "Pet");
define("L_S_SAT", "Sub");
define("L_S_SUN", "Ned");

// Windows encoding
define("WIN_DEFAULT", "windows-1250");
define("L_FORMAT", "%d. %B %Y");

// Set the SR specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "serbian.UTF-8", "serbian");
} else {
setlocale(LC_ALL, "sr_CS.UTF-8", "sr.UTF-8", "serbian.UTF-8", "srl.UTF-8", "srp_srp.UTF-8"); // For SR formats
}
?>