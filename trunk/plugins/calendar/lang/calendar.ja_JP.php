<?php
# ja_JP translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Japanese
# Translator:  Dendeke <konchakka211@yahoo.co.jp>
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "日");
define("L_MONTH", "月");
define("L_YEAR", "年");
define("L_PREV", "前");
define("L_NEXT", "次");
define("L_REF_CAL", "カレンダーの更新...");
define("L_CHK_VAL", "値の確認");
define("L_SEL_LANG", "言語の選択");
define("L_SEL_ICON", "アイコンの選択");
define("L_SEL_DATE", "日付の選択");
define("L_ERR_SEL", "選択が間違っています");
define("L_NOT_ALLOWED", "その日付は選択できません");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "0");

// Months Long Names
define("L_JAN", "1月");
define("L_FEB", "2月");
define("L_MAR", "3月");
define("L_APR", "4月");
define("L_MAY", "5月");
define("L_JUN", "6月");
define("L_JUL", "7月");
define("L_AUG", "8月");
define("L_SEP", "9月");
define("L_OCT", "10月");
define("L_NOV", "11月");
define("L_DEC", "12月");
// Months Short Names
define("L_S_JAN", "1月");
define("L_S_FEB", "2月");
define("L_S_MAR", "3月");
define("L_S_APR", "4月");
define("L_S_MAY", "5月");
define("L_S_JUN", "6月");
define("L_S_JUL", "7月");
define("L_S_AUG", "8月");
define("L_S_SEP", "9月");
define("L_S_OCT", "10月");
define("L_S_NOV", "11月");
define("L_S_DEC", "12月");
// Week days Long Names
define("L_MON", "月");
define("L_TUE", "火");
define("L_WED", "水");
define("L_THU", "木");
define("L_FRI", "金");
define("L_SAT", "土");
define("L_SUN", "日");
// Week days Short Names
define("L_S_MON", "月");
define("L_S_TUE", "火");
define("L_S_WED", "水");
define("L_S_THU", "木");
define("L_S_FRI", "金");
define("L_S_SAT", "土");
define("L_S_SUN", "日");

define("WIN_DEFAULT", "Shift_JIS");
define("L_CAL_FORMAT", "%Y年%B%d日");

// Set the JP specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "japanese.UTF-8", "japanese", "ja_JP.UTF-8");
} else {
setlocale(LC_ALL, "ja_JP.utf8", "ja_JP.UTF-8", "ja_JP", "ja", "japanese", "jpn");
}
?>