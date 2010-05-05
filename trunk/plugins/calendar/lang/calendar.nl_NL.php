<?php
# nl_NL translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Dutch
# Translator: Bert Moorlag <berbia@hotmail.com>
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "Dag");
define("L_MONTH", "Maand");
define("L_YEAR", "Jaar");
define("L_PREV", "Vorige");
define("L_NEXT", "Volgende");
define("L_REF_CAL", "Kalender Vernieuwen...");
define("L_CHK_VAL", "Controleer datum");
define("L_SEL_LANG", "Selecteer Taal");
define("L_SEL_ICON", "Selecteer Icoon");
define("L_SEL_DATE", "Selecteer Datum");
define("L_ERR_SEL", "Dit is geen geldige selectie");
define("L_NOT_ALLOWED", "Dit is geen geldige datum");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Januari");
define("L_FEB", "Februari");
define("L_MAR", "Maart");
define("L_APR", "April");
define("L_MAY", "Mei");
define("L_JUN", "Juni");
define("L_JUL", "Juli");
define("L_AUG", "Augustus");
define("L_SEP", "September");
define("L_OCT", "Oktober");
define("L_NOV", "November");
define("L_DEC", "December");
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Feb");
define("L_S_MAR", "Mrt");
define("L_S_APR", "Apr");
define("L_S_MAY", "Mei");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Aug");
define("L_S_SEP", "Sep");
define("L_S_OCT", "Okt");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dec");
// Week days Long Names
define("L_MON", "Maandag");
define("L_TUE", "Dinsdag");
define("L_WED", "Woensdag");
define("L_THU", "Donderdag");
define("L_FRI", "Vrijdag");
define("L_SAT", "Zaterdag");
define("L_SUN", "Zondag");
// Week days Short Names
define("L_S_MON", "Ma");
define("L_S_TUE", "Di");
define("L_S_WED", "Wo");
define("L_S_THU", "Do");
define("L_S_FRI", "Vr");
define("L_S_SAT", "Za");
define("L_S_SUN", "Zo");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");

// Set the NL specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "dutch.UTF-8", "dutch");
} else {
setlocale(LC_ALL, "nl_NL.UTF-8", "nl_NL.UTF-8@euro", "nld_nld.UTF-8", "nld.UTF-8");
}
?>