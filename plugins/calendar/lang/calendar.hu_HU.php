<?php
# hu_HU translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Hungarian
# Translator: Jácint Zsuzsanna <jacint.zsuzsanna@yahoo.com>
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "Nap");
define("L_MONTH", "Hónap");
define("L_YEAR", "Év");
define("L_PREV", "Előző");
define("L_NEXT", "Következő");
define("L_REF_CAL", "Naptár frissítése...");
define("L_CHK_VAL", "Ellenőrizd az értéket");
define("L_SEL_LANG", "Válassz nyelvet");
define("L_SEL_ICON", "Válassz ikont");
define("L_SEL_DATE", "Válassz dátumot");
define("L_ERR_SEL", "A választásod nem érvényes");
define("L_NOT_ALLOWED", "Ezt a dátumot nem lehet kiválasztani");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "január");
define("L_FEB", "február");
define("L_MAR", "március");
define("L_APR", "április");
define("L_MAY", "május");
define("L_JUN", "június");
define("L_JUL", "július");
define("L_AUG", "augusztus");
define("L_SEP", "szeptember");
define("L_OCT", "október");
define("L_NOV", "november");
define("L_DEC", "december");
// Months Short Names
define("L_S_JAN", "jan.");
define("L_S_FEB", "febr.");
define("L_S_MAR", "márc.");
define("L_S_APR", "ápr.");
define("L_S_MAY", "máj.");
define("L_S_JUN", "jún.");
define("L_S_JUL", "júl.");
define("L_S_AUG", "aug.");
define("L_S_SEP", "szept.");
define("L_S_OCT", "okt.");
define("L_S_NOV", "nov.");
define("L_S_DEC", "dec.");
// Week days Long Names
define("L_MON", "hétfő");
define("L_TUE", "kedd");
define("L_WED", "szerda");
define("L_THU", "csütörtök");
define("L_FRI", "péntek");
define("L_SAT", "szombat");
define("L_SUN", "vasárnap");
// Week days Short Names
define("L_S_MON", "H");
define("L_S_TUE", "K");
define("L_S_WED", "Sze");
define("L_S_THU", "Cs");
define("L_S_FRI", "P");
define("L_S_SAT", "Szo");
define("L_S_SUN", "V");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%Y. %B %d.");

// Set the HU specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "hun_hun.UTF-8", "hungarian.UTF-8", "hungarian");
} else {
setlocale(LC_ALL, "hu_HU.UTF-8", "hu_HU.UTF-8@euro", "hun_hun.UTF-8", "hungarian.UTF-8", "hun.UTF-8", "hu.UTF-8"); // For HU formats
}
?>