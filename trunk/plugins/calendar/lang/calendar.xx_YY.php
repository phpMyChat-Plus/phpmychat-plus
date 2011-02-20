<?php
# xx_YY translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.2
# Language: Lang_name / Orig_name (in your lang) // ex: Romanian / Română
# Translator: YourName <email@...>
# Last file update: xx.xx.201x

// Class strings localization
define("L_DAY", "Day");
define("L_MONTH", "Month");
define("L_YEAR", "Year");
define("L_PREV", "Previous");
define("L_NEXT", "Next");
define("L_REF_CAL", "Refreshing Calendar...");
define("L_CHK_VAL", "Check the value");
define("L_SEL_LANG", "Select Language");
define("L_SEL_ICON", "Select Icon");
define("L_SEL_DATE", "Select Date");
define("L_ERR_SEL", "Your selection is not valid");
define("L_NOT_ALLOWED", "This date is not allowed to be selected");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "0");

// Months Long Names
define("L_JAN", "January");
define("L_FEB", "February");
define("L_MAR", "March");
define("L_APR", "April");
define("L_MAY", "May");
define("L_JUN", "June");
define("L_JUL", "July");
define("L_AUG", "August");
define("L_SEP", "September");
define("L_OCT", "October");
define("L_NOV", "November");
define("L_DEC", "December");
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Feb");
define("L_S_MAR", "Mar");
define("L_S_APR", "Apr");
define("L_S_MAY", "May");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Aug");
define("L_S_SEP", "Sep");
define("L_S_OCT", "Oct");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dec");
// Week days Long Names
define("L_MON", "Monday");
define("L_TUE", "Tuesday");
define("L_WED", "Wednesday");
define("L_THU", "Thursday");
define("L_FRI", "Friday");
define("L_SAT", "Saturday");
define("L_SUN", "Sunday");
// Week days Short Names
define("L_S_MON", "Mon");
define("L_S_TUE", "Tue");
define("L_S_WED", "Wed");
define("L_S_THU", "Thu");
define("L_S_FRI", "Fri");
define("L_S_SAT", "Sat");
define("L_S_SUN", "Sun");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "xx_XX"); // en_US format of your language

// Set the XX specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "eng-usa.UTF-8", "eng-usa", "English-usa.UTF-8");
} else {
setlocale(LC_ALL, "en_US.UTF-8", "enu.UTF-8", "usa.UTF-8", "enu_enu.UTF-8", "English-usa.UTF-8");
}
?>