<?php
# mk_MK translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Localized version of PHP-Calendar, DatePicker Calendar class: http://ciprianmp.com/scripts/calendar/
# Version: 3.70
# Language: Macedonian / Македонски
# Translator: Миле Ѓоргиев <milegorgiev@yahoo.com>
# Last file update: 04.07.2013

// Class strings localization
define("L_DAY", "Ден");
define("L_MONTH", "Месец");
define("L_YEAR", "Година");
define("L_TODAY", "Денес");
define("L_PREV", "Претходен");
define("L_NEXT", "Нареден");
define("L_REF_CAL", "Календарот се вчитува...");
define("L_CHK_VAL", "Провери ја вредноста");
define("L_SEL_LANG", "Избери јазик");
define("L_SEL_ICON", "Избери икона");
define("L_SEL_DATE", "Избери датум");
define("L_ERR_SEL", "Вашиот избор не е валиден");
define("L_NOT_ALLOWED", "Овој датум не е дозволен да биде избран");
define("L_DATE_BEFORE", "Одберете датум пред %s");
define("L_DATE_AFTER", "Одберете датум после %s");
define("L_DATE_BETWEEN", "Одберете датум помеѓу\\n%s and %s");
define("L_WEEK_HDR", ""); // Optional Short Name for the column header showing the current Week number (W or CW in English - max 2 letters)
define("L_UNSET", "Ресетирај");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday ... 6 for Saturday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Јануари");
define("L_FEB", "Февруари");
define("L_MAR", "Март");
define("L_APR", "Април");
define("L_MAY", "Мај");
define("L_JUN", "Јуни");
define("L_JUL", "Јули");
define("L_AUG", "Август");
define("L_SEP", "Септември");
define("L_OCT", "Октомври");
define("L_NOV", "Ноември");
define("L_DEC", "Декември");
// Months Short Names
define("L_S_JAN", "Јан");
define("L_S_FEB", "Фев");
define("L_S_MAR", "Мар");
define("L_S_APR", "Апр");
define("L_S_MAY", "Мај");
define("L_S_JUN", "Јун");
define("L_S_JUL", "Јул");
define("L_S_AUG", "Авг");
define("L_S_SEP", "Сеп");
define("L_S_OCT", "Окт");
define("L_S_NOV", "Ное");
define("L_S_DEC", "Дек");
// Week days Long Names
define("L_MON", "Понеделник");
define("L_TUE", "Вторник");
define("L_WED", "Среда");
define("L_THU", "Четврток");
define("L_FRI", "Петок");
define("L_SAT", "Сабота");
define("L_SUN", "Недела");
// Week days Short Names
define("L_S_MON", "Пон");
define("L_S_TUE", "Вто");
define("L_S_WED", "Сре");
define("L_S_THU", "Чет");
define("L_S_FRI", "Пет");
define("L_S_SAT", "Саб");
define("L_S_SUN", "Нед");

// Windows encoding
define("WIN_DEFAULT", "windows-1251");
define("L_CAL_FORMAT", "%d %B %Y г.");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "mk_MK"); // en_US format of your language

// Set the MK specific date/time format; ENGLISH EXAMPLE:
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "mac.UTF-8", "mkd.UTF-8", "mk-MK.UTF-8", "Macedonian.UTF-8");
} else {
setlocale(LC_ALL, "mk_MK.UTF-8", "mk.UTF-8", "Macedonian.UTF-8");
}
?>