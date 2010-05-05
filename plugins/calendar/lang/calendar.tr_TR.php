<?php
# tr_TR translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Turkish
# Translator: Volkan Övün <vovun@hotmail.com>
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "Gün");
define("L_MONTH", "Ay");
define("L_YEAR", "Yıl");
define("L_PREV", "Önceki");
define("L_NEXT", "Sonraki");
define("L_REF_CAL", "Takvimi Yenile...");
define("L_CHK_VAL", "Seçilmiş tarihi kontrol et");
define("L_SEL_LANG", "Dil Seçimi");
define("L_SEL_ICON", "İkon Seçimi");
define("L_SEL_DATE", "Tarih Seçimi");
define("L_ERR_SEL", "Geçersiz bir seçim yeptınız");
define("L_NOT_ALLOWED", "Bu tarihin seçilmesine izin verilmiyor");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Ocak");
define("L_FEB", "Şubat");
define("L_MAR", "Mart");
define("L_APR", "Nisan");
define("L_MAY", "Mayıs");
define("L_JUN", "Haziran");
define("L_JUL", "Temmuz");
define("L_AUG", "Ağustos");
define("L_SEP", "Eylül");
define("L_OCT", "Ekim");
define("L_NOV", "Kasım");
define("L_DEC", "Aralık");
// Months Short Names
define("L_S_JAN", "Oca");
define("L_S_FEB", "Şub");
define("L_S_MAR", "Mar");
define("L_S_APR", "Nis");
define("L_S_MAY", "May");
define("L_S_JUN", "Haz");
define("L_S_JUL", "Tem");
define("L_S_AUG", "Ağu");
define("L_S_SEP", "Eyl");
define("L_S_OCT", "Eki");
define("L_S_NOV", "Kas");
define("L_S_DEC", "Ara");
// Week days Long Names
define("L_MON", "Pazartesi");
define("L_TUE", "Salı");
define("L_WED", "Çarşamba");
define("L_THU", "Perşembe");
define("L_FRI", "Cuma");
define("L_SAT", "Cumartesi");
define("L_SUN", "Pazar");
// Week days Short Names
define("L_S_MON", "Pzt");
define("L_S_TUE", "Salı");
define("L_S_WED", "Çar");
define("L_S_THU", "Per");
define("L_S_FRI", "Cum");
define("L_S_SAT", "Cmt");
define("L_S_SUN", "Paz");

// Windows encoding
define("WIN_DEFAULT", "windows-1254");

// Set the TR specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "turkish.UTF-8", "turkish");
} else {
setlocale(LC_ALL, "tr_TR.UTF-8", "turkish.UTF-8");
}
?>